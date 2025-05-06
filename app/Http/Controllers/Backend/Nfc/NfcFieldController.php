<?php

namespace App\Http\Controllers\Backend\Nfc;

use App\Http\Controllers\Controller;
use App\Models\Backend\NfcField;
use Exception;
use Illuminate\Http\Request;
use Nette\Utils\Validators;

class NfcFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=NfcField::paginate(10);
        return view('backend.nfc-field.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // '1 => Most Popular, 2 => Social, 3 => Communication, 4 => Payment, 5 => Video, 6=> Music, 7=> Design, 8=> Gaming, 9=> Other'
        // '1 => text, 2=> file 3=> textarea 4=>date'
        $type = [
            '1' => 'Text',
            '2' => 'Svg',
            '3' => 'File'
        ];
        $categories = [
            '1' => 'Most Popular',
            '2' => 'Social',
            '3' => 'Communication',
            '4' => 'Payment',
            '5' => 'Video',
            '6' => 'Music',
            '7' => 'Design',
            '8' => 'Gaming',
            '9' => 'Other',
        ];
        return view('backend.nfc-field.create',
            compact('type', 'categories')
        );
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:nfc_fields,name'
        ]);
        $icon = $request->icon;
        if ($request->type == 3) {
            if ($request->hasFile('iconPic')) {
                $imageName = rand(111, 999) . time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/icons'), $imageName);
                $icon = 'uploads/icons/' . $imageName;
            }
        } elseif ($request->type == 2) {
            $icon = $request->svg_icon;
        }
        try{
            $nfcField = new NfcField;
            $nfcField->name = $request->name;
            $nfcField->icon = $icon;
            $nfcField->link = $request->link;
            $nfcField->type = $request->type;
            $nfcField->category = $request->category;
            $nfcField->status = $request->status;
            $nfcField->created_by = currentUserId();
            if($nfcField->save()){
                $this->notice::success('Data Successfully saved');
                return redirect()->route('nfc_field.index');
            }
        }catch(Exception $e){
            dd($e);
            $this->notice::error('Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(NfcField $nfcField)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $nfcField = NfcField::findOrFail(encryptor('decrypt',$id));
        $type = [
            '1' => 'text',
            '2' => 'svg',
            '3' => 'file'
        ];
        $categories = [
            '1' => 'Most Popular',
            '2' => 'Social',
            '3' => 'Communication',
            '4' => 'Payment',
            '5' => 'Video',
            '6' => 'Music',
            '7' => 'Design',
            '8' => 'Gaming',
            '9' => 'Other',
        ];
        return view('backend.nfc-field.edit', compact('nfcField', 'type', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $request->validate([
                'name' => 'required|unique:nfc_fields,name,' . $id
            ]);
            $icon = $request->icon;
            if ($request->type == 3) {
                if ($request->hasFile('iconPic')) {
                    $imageName = rand(111, 999) . time() . '.' . $request->image->extension();
                    $request->image->move(public_path('uploads/icons'), $imageName);
                    $icon = 'uploads/icons/' . $imageName;
                }
            } elseif ($request->type == 2) {
                $icon = $request->svg_icon;
            }
            $nfcField = NfcField::findOrFail(encryptor('decrypt',$id));
            $nfcField->name = $request->name;
            $nfcField->icon = $icon;
            $nfcField->link = $request->link;
            $nfcField->type = $request->type;
            $nfcField->category = $request->category;
            $nfcField->status = $request->status;
            $nfcField->updated_by = currentUserId();
            if($nfcField->save()){
                $this->notice::success('Data Successfully Updated');
                return redirect()->route('nfc_field.index');
            }
        }catch(Exception $e){
            //dd($e);
            $this->notice::error('Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $nfcField = NfcField::findOrFail(encryptor('decrypt',$id));
        if($nfcField->delete()){
            $this->notice::success('Data successfully Deleted');
            return redirect()->route('nfc_field.index');
        }
    }
}
