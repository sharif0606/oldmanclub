<?php

namespace App\Http\Controllers\Backend\Printingservice;

use App\Http\Controllers\Controller;
use App\Models\Backend\PrintingService;
use App\Models\Backend\PrintingServiceImage;
use Illuminate\Http\Request;
use DB;

class PrintingServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PrintingService::with('featuredImage')->paginate(10);
        return view('backend.print_service.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.print_service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        try{
            DB::beginTransaction();
            $print_service = new PrintingService;
            $print_service->service_name = $request->service_name;
            $print_service->service_details = $request->service_details;
            $print_service->qty = $request->qty;
            $print_service->price = $request->price;
            $print_service->created_by = currentUserId();
            if($print_service->save()){
                $print_image = new PrintingServiceImage;
                $print_image->printing_service_id = $print_service->id;
                if($request->hasFile('image')){
                    $imageName = rand(111,999).'.'.$request->image->extension();
                    $request->image->move(public_path('uploads/printimages'),$imageName);
                    $print_image->image=$imageName;
                }
                $print_image->is_featured = true; 
                $print_image->created_by = currentUserId();
                $print_image->save();
                DB::commit();  
            }
            $this->notice::success('Data Successfully saved');
            return redirect()->route('print_service.index');
                
        }catch(Exception $e){
            dd($e);
            $this->notice::error('Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $print_service = PrintingService::findOrFail(encryptor('decrypt', $id));
        $print_image = PrintingServiceImage::where('printing_service_id', $print_service->id)->get();
        return view('backend.print_service.show', compact('print_image', 'print_service'));

    }

    public function uploadfile($id){
        $print_service = PrintingService::findOrFail(encryptor('decrypt',$id));
        return view('backend.print_service.upload',compact('print_service'));
    }

    public function uploadfile_store(Request $request, $id){
        try {
            $print_service = PrintingService::findOrFail(encryptor('decrypt', $id));
            $files = $request->file('image');
            $is_featured_values = $request->input('is_featured', []); // Get is_featured values from the request or an empty array

            // Update existing featured item to false
            $existing_featured_item = PrintingServiceImage::where('printing_service_id', $print_service->id)
                ->where('is_featured', true)
                ->first();
            
            if ($existing_featured_item) {
                $existing_featured_item->update(['is_featured' => false]);
            }

            foreach ($files as $index => $file) {
                $print_image = new PrintingServiceImage;
                $print_image->printing_service_id  = $print_service->id;
                if ($file->isValid()) {
                    $imageName = rand(111, 999) . time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('uploads/printimages'), $imageName);
                    $print_image->image = $imageName;
                }
                // Check if is_featured value exists for the current index
                $is_featured = isset($is_featured_values[$index]) ? $is_featured_values[$index] : false;

                $print_image->is_featured = $is_featured;
                $print_image->created_by = currentUserId();

                if ($print_image->save()) {
                    $this->notice::success('Data Successfully saved');
                } else {
                    $this->notice::error('Failed to save data');
                }
            }

            return redirect()->route('print_service.index');

        } catch (Exception $e) {
            $this->notice::error('Please try again');
            return redirect()->back()->withInput();
        }

    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $print_service = PrintingService::findOrFail(encryptor('decrypt',$id));
        $print_image = PrintingServiceImage::where('printing_service_id', $print_service->id)->get();
        return view('backend.print_service.edit',compact('print_service','print_image'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            // Find the printing service to edit
            $print_service = PrintingService::findOrFail(encryptor('decrypt', $id));

            // Update printing service details
            $print_service->service_name = $request->service_name;
            $print_service->service_details = $request->service_details;
            $print_service->qty = $request->qty;
            $print_service->price = $request->price;
            $print_service->updated_by = currentUserId();
            $print_service->save();

            // Check if there's an existing featured image
            $existing_featured_image = PrintingServiceImage::where('printing_service_id', $print_service->id)
                ->where('is_featured', true)
                ->first();

            // If there's an existing featured image and the checkbox is checked
            if ($existing_featured_image && $request->has('is_featured')) {
                // Update the existing featured image's is_featured to false
                $existing_featured_image->update(['is_featured' => false]);
            }

            // Update or create the associated printing service image
            $print_image = PrintingServiceImage::where('printing_service_id', $print_service->id)->firstOrNew([]);

            // Handle the image upload
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $imageName = rand(111, 999) . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/printimages'), $imageName);
                $print_image->image = $imageName;
            }

            // Set is_featured based on checkbox value
            $print_image->is_featured = $request->is_featured; // Adjust as needed
            
            $print_image->created_by = currentUserId();
            $print_image->save();

            DB::commit(); // Commit the transaction

            $this->notice::success('Data Successfully saved');
            return redirect()->route('print_service.index');

        } catch (Exception $e) {
            DB::rollBack(); // Rollback the transaction in case of an error
            $this->notice::error('Please try again');
            return redirect()->back()->withInput();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $print_service = PrintingService::findOrFail(encryptor('decrypt',$id));
        if($print_service->delete()){
            $this->notice::success('Data successfully Deleted');
            return redirect()->route('print_service.index');
        }
    }
}
