<?php

namespace App\Http\Controllers\Api\Web\User;

use App\Models\Backend\DesignCard;
use App\Models\User\Client;
use App\Models\User\Post;
use App\Models\Backend\NfcCard;
use App\Models\Backend\NfcField;
use App\Models\Backend\NfcDesign;
use App\Models\Backend\NfcInformation;
use App\Models\User\Country;
use App\Models\Backend\NfcVirtualBackgroundCategory;
use App\Models\Backend\NfcVirtualBackground;
use App\Models\User\Follow;

use Illuminate\Database\QueryException;

use App\Http\Controllers\Api\BaseController;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Mail;
use Illuminate\Support\Facades\Auth;

class NfcCardController extends BaseController
{
    public function nfc_field()
    {
        $nfc_field = NfcField::all();
        return $this->sendResponse($nfc_field, 'Nfc Field fetched successfully');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        // Start the database transaction
        DB::beginTransaction();
        try {

            $request->validate([
                'last_name' => 'required|string',
                'first_name' => 'required|string',
                'card_name' => 'required|string|max:255',
            ], [
                'first_name.required' => 'First name is required.',
                'last_name.required' => 'Last name is required.',
                'card_name.required' => 'Card name is required.',
            ]);

            $nfc = new NfcCard;
            $nfc->client_id = Auth::user()->id;
            $nfc->card_name = $request->card_name;
            $nfc->card_type = $request->card_type?$request->card_type:1;
            $nfc->created_by = Auth::user()->id;
            if ($nfc->save()) {

                /* Insert Data To Nfc Information */
                $nfc_info = new NfcInformation;
                $nfc_info->first_name = $request->first_name;
                $nfc_info->middle_name = $request->middle_name;
                $nfc_info->last_name = $request->last_name;
                if ($request->hasFile('profile')) {
                    $profileImageName = rand(111, 999) . time() . '.' . $request->profile->extension();
                    $request->profile->move(public_path('uploads/client/'), $profileImageName);
                    $nfc_info->image = $profileImageName;
                }

                $nfc_info->nfc_card_id = $nfc->id;
                $nfc_info->prefix = $request->prefix;
                $nfc_info->suffix = $request->suffix;
                $nfc_info->preferred_name = $request->preferred_name;
                $nfc_info->maiden_name = $request->maiden_name;
                $nfc_info->accreditations = $request->accreditations;
                $nfc_info->pronoun = $request->pronoun;
                $nfc_info->title = $request->title;
                $nfc_info->department = $request->department;
                $nfc_info->company = $request->company;
                $nfc_info->headline = $request->headline;
                $nfc_info->created_by = Auth::user()->id;
                $nfc_info->save();

                /* Insert Data To Nfc Design */
                $nfc_design = new NfcDesign;
                $nfc_design->nfc_card_id = $nfc->id;
                $nfc_design->design_card_id = $request->design_card_id?$request->design_card_id:1;
                if ($request->hasFile('logo')) {
                    $imageName = rand(111, 999) . time() . '.' . $request->logo->extension();
                    $request->logo->move(
                        public_path('uploads/cards/'),
                        $imageName
                    );
                    $nfc_design->logo = $imageName;
                }
                $nfc_design->created_by = Auth::user()->id;
                $nfc_design->save();

                /* badges image update */
                if ($request->hasFile('badge_images')) {
                    $badges = $request->file('badge_images');
                    foreach ($badges as $key => $badge) {
                        $badgeImageName = rand(111, 999) . time() . '.' . $badge->extension();
                        $badge->move(public_path('uploads/cards/badges'), $badgeImageName);
                        DB::table("nfc_card_badges")->insert([
                            'nfc_card_id' => $nfc->id,
                            'badge_image' => $badgeImageName,
                        ]);
                    }
                }

                // Retrieve the new data from the request
                $nfcFieldIds = $request->input('nfc_id');
                $nfcFieldUsernames = $request->input('nfc_user_name');
                $nfcFieldLabels = $request->input('nfc_label');
                $nfcFieldDisplaynames = $request->input('display_name');

                if ($nfcFieldIds) {
                    $nfcFieldData = [];

                    foreach ($nfcFieldIds as $index => $nfcFieldId) {
                        $nfcFieldData[$nfcFieldId] = [
                            'field_value' => $nfcFieldUsernames[$index] ?? null,
                            'display_text' => $nfcFieldDisplaynames[$index] ?? null,
                            'label' => $nfcFieldLabels[$index] ?? null,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }

                    // Insert data into pivot table using DB::table()->insert() manually
                    foreach ($nfcFieldData as $fieldId => $data) {
                        DB::table('nfc_card_nfc_field')->insert([
                            'nfc_card_id' => $nfc->id,
                            'nfc_field_id' => $fieldId,
                            'field_value' => $data['field_value'],
                            'label' => $data['label'],
                            'display_text' => $data['display_text'],
                            'created_at' => $data['created_at'],
                            'updated_at' => $data['updated_at'],
                        ]);
                    }

                    // OR use sync if you've defined the relationship
                    // $nfc->nfcFields()->sync($nfcFieldData);
                }


                // Commit the transaction if all operations are successful
                DB::commit();

                return $this->sendResponse([], 'Nfc Card Successfully Created');
            }
        } catch (Exception $e) {
            // If an exception occurs, rollback the transaction
            DB::rollback();
            
            // Check if it's a validation exception
            if ($e instanceof \Illuminate\Validation\ValidationException) {
                $errorMessages = [];
                foreach ($e->errors() as $field => $messages) {
                    foreach ($messages as $message) {
                        $errorMessages[] = $message;
                    }
                }
                return $this->sendError('Validation failed', $errorMessages);
            }
            
            // For other types of exceptions
            return $this->sendError('Something went wrong! Please try again', [$e->getMessage()]);
        }
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $currentUserId = Auth::user()->id;
        $nfc_card = NfcCard::with(['client', 'card_design', 'nfcFields','nfc_info'])->where('client_id', $currentUserId)->where('id', $id)->first();
        return $this->sendResponse(['nfc_card' => $nfc_card], 'Nfc card fetched successfully');
    }

    /**
     * Show the form for editing the slpecified resource.
     */
    public function edit($id)
    {
        $currentUserId = Auth::user()->id;
        $client = Client::find($currentUserId);
        $nfc_card = NfcCard::where('client_id', $currentUserId)->where('id', $id)->first();
        $nfc_info = NfcInformation::where('created_by', $currentUserId)->where('nfc_card_id', $id)->first();
        $postCount = Post::where('client_id', $currentUserId)->count();
        $categories = [
            '1' => 'Most Popular',
            '2' => 'Social',
            '3' => 'Communication',
            '4' => 'Conferencing',
            '5' => 'Payment',
            '6' => 'Video',
            '7' => 'Music',
            '8' => 'Design',
            '9' => 'Gaming',
            '10' => 'Other',
        ];

        return $this->sendResponse(['id' => $id, 'categories' => $categories, 'nfc_card' => $nfc_card, 'nfc_info' => $nfc_info, 'client' => $client, 'postCount' => $postCount], 'Nfc card fetched successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $currentUserId = Auth::user()->id;

            // Find the NFC card by decrypting the ID
            $nfc_card = NfcCard::where('client_id', Auth::user()->id)->where('id', $id)->first();
            $nfc_card->card_name = $request->card_name;
            $nfc_card->card_type = $request->card_type;
            //$nfc_card->updated_by = currentUserId();

            /* Update Data From Nfc Design */
            $nfc_design = NfcDesign::where('nfc_card_id', $nfc_card->id)->first();
            $nfc_design->design_card_id = $request->design_card_id;
            $nfc_design->color = $request->display_nfc_color;
            if ($request->hasFile('logo')) {
                $imageName = rand(111, 999) . time() . '.' . $request->logo->extension();
                $request->logo->move(
                    public_path('uploads/cards/'),
                    $imageName
                );
                $nfc_design->logo = $imageName;
            }
            $nfc_design->updated_by = $currentUserId;
            $nfc_design->save();

            /* badges image update */
            if ($request->hasFile('badge_images')) {
                $badges = $request->file('badge_images');
                DB::table("nfc_card_badges")->where('nfc_card_id', $nfc_card->id)->delete();
                foreach ($badges as $key => $badge) {
                    $badgeImageName = rand(111, 999) . time() . '.' . $badge->extension();
                    $badge->move(public_path('uploads/cards/badges'), $badgeImageName);
                    DB::table("nfc_card_badges")->insert([
                        'nfc_card_id' => encryptor('decrypt', $id),
                        'badge_image' => $badgeImageName,
                    ]);
                }
            }


            /* Update Data From Nfc Information */
            $nfc_info = NfcInformation::where('nfc_card_id', $nfc_card->id)->first();
            $nfc_info->first_name = $request->first_name;
            $nfc_info->middle_name = $request->middle_name;
            $nfc_info->last_name = $request->last_name;
            if ($request->hasFile('profile')) {
                $profileImageName = rand(111, 999) . time() . '.' . $request->profile->extension();
                $request->profile->move(public_path('uploads/client/'), $profileImageName);
                $nfc_info->image = $profileImageName;
            }
            $nfc_info->prefix = $request->prefix;
            $nfc_info->suffix = $request->suffix;
            $nfc_info->preferred_name = $request->preferred_name;
            $nfc_info->maiden_name = $request->maiden_name;
            $nfc_info->accreditations = $request->accreditations;
            $nfc_info->pronoun = $request->pronoun;
            $nfc_info->title = $request->title;
            $nfc_info->department = $request->department;
            $nfc_info->company = $request->company;
            $nfc_info->headline = $request->headline;
            $nfc_info->updated_by = $currentUserId;
            $nfc_info->save();

            // Retrieve the existing pivot data associated with the NFC card
            $existingPivotData = $nfc_card->nfcFields()->pluck('field_value', 'nfc_field_id')->toArray();
            // dd($existingPivotData);

            // Retrieve the new data from the request
            $nfcFieldIds = $request->input('nfc_id');
            $nfcFieldUsernames = $request->input('nfc_user_name');
            $nfcFieldDisplaynames = $request->input('display_name');
            $nfcFieldLabels = $request->input('nfc_label');

            if ($nfcFieldIds) {
                $nfcFieldIds = array_values(array_unique($nfcFieldIds));
                $nfcFieldData = [];

                foreach ($nfcFieldIds as $index => $nfcFieldId) {
                    if (!isset($nfcFieldData[$nfcFieldId])) {
                        $nfcFieldData[$nfcFieldId] = [
                            'field_value' => $nfcFieldUsernames[$index] ?? null,
                            'display_text' => $nfcFieldDisplaynames[$index] ?? null,
                            'label' => $nfcFieldLabels[$index] ?? null,
                        ];
                    }
                }


                // Synchronize the relationship, deleting any records not included in the new data
                $nfc_card->nfcFields()->sync($nfcFieldData);
            }

            // Save the NFC card
            $nfc_card->save();

            // Commit the transaction if all operations are successful
            DB::commit();
            return $this->sendResponse([], 'Nfc Card Successfully Updated');
        } catch (Exception $e) {
            DB::rollback();
            
            // Check if it's a validation exception
            if ($e instanceof \Illuminate\Validation\ValidationException) {
                $errorMessages = [];
                foreach ($e->errors() as $field => $messages) {
                    foreach ($messages as $message) {
                        $errorMessages[] = $message;
                    }
                }
                return $this->sendError('Validation failed', $errorMessages);
            }
            
            // For other types of exceptions
            return $this->sendError('Something went wrong! Please try again', [$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id)
    {
        $currentUserId = Auth::user()->id;
        $nfc_card = NfcCard::where('client_id', $currentUserId)->where('id', $id)->first();
        DB::beginTransaction();

        try {
            // Delete pivot table records
            DB::table('nfc_card_nfc_field')->where('nfc_card_id', $nfc_card->id)->delete();

            // Delete related NFC design
            NfcDesign::where('nfc_card_id', $nfc_card->id)->delete();

            // Delete related NFC information FIRST
            NfcInformation::where('nfc_card_id', $nfc_card->id)->delete();

            // Then delete the NFC card
            $nfc_card->delete();

            DB::commit();
            return $this->sendResponse([], 'Nfc Card Successfully Deleted');

        } catch(QueryException $e) {
            DB::rollback();
            // dd($e); // For debugging

            $errorMessages = [];
            foreach ($e->errors() as $field => $messages) {
                foreach ($messages as $message) {
                    $errorMessages[] = $message;
                }
            }
            return $this->sendError('Something went wrong', $errorMessages);
        }
    }

    public function save_contact($id)
    {
        $currentUserId = Auth::user()->id;
        $nfc_card = NfcCard::with(['client', 'nfc_info'])->where('client_id', $currentUserId)->where('id', $id)->first();
        // Initialize an empty vCard string
        $vCard = "BEGIN:VCARD\r\n";
        $vCard .= "VERSION:3.0\r\n";
        if ($nfc_card->client->fname || $nfc_card->client->middle_name || $nfc_card->client->last_name)
            $file_name = $nfc_card->client->fname . " " . $nfc_card->client->middle_name .  " " . $nfc_card->client->last_name . ".vcf";
        else
            $file_name =  'contact.vcf';

        // Initialize an empty vCard string
        $vCard = "BEGIN:VCARD\r\n";
        $vCard .= "VERSION:3.0\r\n";
        // Loop through each NFC card and create a vCard entry for each

        $vCard .= "FN:" . $nfc_card->client->fname . "\r\n";
        $vCard .= "UID:" . uniqid() . "\r\n"; // Generate a unique identifier
        $vCard .= "N:" . $nfc_card->client->fname . " " . $nfc_card->client->middle_name .  " " . $nfc_card->client->last_name  . "\r\n";
        $vCard .= "EMAIL:" . $nfc_card->client->email . "\r\n";
        $vCard .= "TEL;TYPE=CELL:" . $nfc_card->client->contact_no . "\r\n";
        if ($nfc_card->client?->image)
            $filePath = asset('public/uploads/client/' . $nfc_card->client?->image);
        else
            $filePath =  asset('public/images/download.jpg');
        // Read image file and encode it to base64
        $imageData = base64_encode(file_get_contents($filePath));

        // Get the image file extension
        $imageExtension = pathinfo($filePath, PATHINFO_EXTENSION);

        $vCard .= "PHOTO;TYPE=" . $imageExtension . ";ENCODING=BASE64:" . $imageData . "\r\n";
        $vCard .= "END:VCARD\r\n";


        // Set headers for vCard file
        $headers = [
            'Content-Type' => 'text/vcard',
            'Content-Disposition' => 'attachment; filename="' . $file_name . '"',
        ];

        // Return vCard as a response
        return response()->streamDownload(function () use ($vCard) {
            echo $vCard;
        }, $file_name, $headers);
    }

    public function email($id)
    {
        $currentUserId = Auth::user()->id;
        $client = Client::find($currentUserId);
        $nfc_cards = NfcCard::with(['client', 'card_design', 'nfcFields'])->where('client_id', $currentUserId)->paginate(10);
        $nfc_card = NfcCard::where('client_id', $currentUserId)->where('id', $id)->first();
        return $this->sendResponse(['nfc_card' => $nfc_card, 'client' => $client, 'nfc_cards' => $nfc_cards], 'Nfc card fetched successfully');
    }
    public function virtual_background($id)
    {
        $currentUserId = Auth::user()->id;
        $client = Client::find($currentUserId);
        $nfc_cards = NfcCard::with(['client', 'card_design', 'nfcFields'])->where('client_id', $currentUserId)->paginate(10);
        $nfc_card = NfcCard::where('client_id', $currentUserId)->where('id', $id)->first();
        $nfc_virtual_categories = NfcVirtualBackgroundCategory::with('backgrounds')->get();
        $nfc_virtual_background = NfcVirtualBackground::first();
        return $this->sendResponse(['nfc_card' => $nfc_card, 'client' => $client, 'nfc_cards' => $nfc_cards, 'nfc_virtual_categories' => $nfc_virtual_categories, 'nfc_virtual_background' => $nfc_virtual_background], 'Nfc card fetched successfully');
    }

    public function duplicate($id)
    {
        // Start the transaction
        DB::beginTransaction();

        try {
            $currentUserId = Auth::user()->id;
            $originalNfcCard  = NfcCard::with(['nfc_info', 'nfcFields', 'card_design','badges'])->where('client_id', $currentUserId)->where('id', $id)->first();
            $newNfcCard = $originalNfcCard->replicate();
            $newNfcCard->card_name = $originalNfcCard->card_name . " " . "copy";
            $newNfcCard->save();


            // Duplicate and update related NfcField records through the pivot table
            foreach ($originalNfcCard->nfcFields as $nfcField) {
                $newNfcCard->nfcFields()->attach($nfcField->id, [
                    'nfc_field_id' => $nfcField->pivot->nfc_field_id,
                    'field_value' => $nfcField->pivot->field_value,
                    'nfc_card_id' => $newNfcCard->id, // Ensure the new nfccard_id is set in the pivot table
                ]);
            }

            // Duplicate and update related NfcInformation records

                $newNfcInformation = $originalNfcCard->nfc_info->replicate();
                $newNfcInformation->nfc_card_id = $newNfcCard->id; // Update the foreign key
                $newNfcInformation->save();


            // Duplicate and update related NfcField records through the pivot table
            foreach ($originalNfcCard->nfcFields as $nfcField) {
                $newNfcCard->nfcFields()->attach($nfcField->id, [
                    'nfc_field_id' => $nfcField->pivot->nfc_field_id,
                    'field_value' => $nfcField->pivot->field_value,
                    'nfc_card_id' => $newNfcCard->id, // Ensure the new nfccard_id is set in the pivot table
                ]);
            }

            // Duplicate and update related Nfc Card Design records
            $nfcCardDesign = $originalNfcCard->card_design->replicate();
            $nfcCardDesign->nfc_card_id = $newNfcCard->id; // Update the foreign key
            $nfcCardDesign->save();

            // Commit the transaction
            DB::commit();
            $nfc_cards = NfcCard::with(['client', 'card_design', 'nfcFields'])->where('client_id', $currentUserId)->paginate(10);
            $client = Client::find($currentUserId);
            $post = Post::where('client_id', $currentUserId)->get();
            $followers = Follow::where('following_id', $currentUserId)->orderBy('id', 'desc')->take(4)->get();
            $friend_list = Follow::where('following_id', $currentUserId)
                ->orderBy('id', 'desc')
                ->pluck('follower_id');
            $online_active_users = Client::whereIn('id', $friend_list)
                ->where('is_online', true) // Check if the user is online
                ->get();
            return $this->sendResponse(['nfc_cards' => $nfc_cards, 'client' => $client, 'post' => $post, 'followers' => $followers, 'online_active_users' => $online_active_users], 'Nfc card fetched successfully');
        } catch (\Exception $e) {
            // Rollback the transaction if an error occurs
            DB::rollBack();
            $errorMessages = [];
            foreach ($e->errors() as $field => $messages) {
                foreach ($messages as $message) {
                    $errorMessages[] = $message;
                }
            }
            return $this->sendError('Something went wrong', $errorMessages);
        }
    }

    public function upload(Request $request)
    {
        if($request->hasFile('image')) {
            $path = $request->file('image')->store('public/images');
            $url = Storage::url($path);

            return response()->json(['url' => $url]);
        }

        return response()->json(['error' => 'No image uploaded'], 400);
    }

    public function card_send_via_email(Request $request){
        $currentUserId = Auth::user()->id;
        $client = Client::find($currentUserId);
        $nfc_card = NfcCard::where('client_id', $currentUserId)->where('id', $request->id)->first();
        Mail::send('user.nfc-card.pdf', ['nfc_card' => $nfc_card,'client' => $client], function($message) use($request){
            $message->from('oldclubman@quickpicker.xyz', 'Old Man Club');
            $message->to($request->email);
            $message->subject('NFC Card');
        });
        return $this->sendResponse([], 'Nfc Card Send Successfully');
    }
    public function upload_own_image(Request $request){
        if($request->hasFile('profile')){
            $imageName = rand(111,999).'.'.$request->image->extension();
            $request->image->move(public_path('uploads/virtual_background'), $imageName);
        }
    }

    public function get_nfc_design(){
        $nfc_design = DesignCard::all();
        return $this->sendResponse(['nfc_design' => $nfc_design], 'Nfc design fetched successfully');
    }
}