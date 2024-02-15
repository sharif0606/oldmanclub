<?php

namespace App\Http\Controllers\Backend\Printingservice;

use App\Http\Controllers\Controller;
use App\Models\Backend\PrintingServiceImage;
use App\Models\Backend\PrintingService;
use Illuminate\Http\Request;

class PrintingServiceImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PrintingServiceImage::paginate(10);
        return view('backend.print_service_image.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $print_service = PrintingService::get();
        return view('backend.print_service_image.create',compact('print_service'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $files = $request->file('image');
            $is_featured_values = $request->input('is_featured', []); // Get is_featured values from the request or an empty array

            $existing_featured_item = PrintingServiceImage::where('printing_service_id', $request->printing_service_id)
                    ->where('is_featured', true)
                    ->first();
            if ($existing_featured_item) {
                    $existing_featured_item->update(['is_featured' => false]);
            }

            foreach ($files as $index => $file) {
                $print_image = new PrintingServiceImage;
                $print_image->printing_service_id  = $request->printing_service_id;

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

            return redirect()->route('print_service_image.index');

        } catch (Exception $e) {
            $this->notice::error('Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $print_service = PrintingService::get();
        $print_image = PrintingServiceImage::findOrFail(encryptor('decrypt', $id));
        return view('backend.print_service_image.edit', compact('print_image', 'print_service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $print_image = PrintingServiceImage::findOrFail(encryptor('decrypt', $id));

            // Find any existing items that are currently marked as featured for the same printing_service_id
            $existing_featured_items = PrintingServiceImage::where('printing_service_id', $request->printing_service_id)
                ->where('is_featured', true)
                ->get();
            
            // Update the is_featured status of the existing featured items if they exist
            foreach ($existing_featured_items as $existing_featured_item) {
                $existing_featured_item->update(['is_featured' => false]);
            }

            $print_image->printing_service_id = $request->printing_service_id;
            
            // Process multiple images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $file) {
                    $imageName = rand(111, 999) . time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('uploads/printimages'), $imageName);
                    
                    // Create a new PrintingServiceImage for each image
                    $new_print_image = new PrintingServiceImage();
                    $new_print_image->printing_service_id = $request->printing_service_id;
                    $new_print_image->image = $imageName;
                    
                    // Determine if the image should be marked as featured
                    $is_featured = $request->has('is_featured') && in_array($file->getClientOriginalName(), $request->is_featured);
                    $new_print_image->is_featured = $is_featured;
                    $new_print_image->created_by = currentUserId();
                    $new_print_image->save();
                }
            }

            $print_image->updated_by = currentUserId();
            
            if ($print_image->save()) {
                $this->notice::success('Data Successfully saved');
                return redirect()->route('print_service_image.index');
            }
        } catch (Exception $e) {
            $this->notice::error('Please try again');
            return redirect()->back()->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $print_image = PrintingServiceImage::findOrFail(encryptor('decrypt',$id));
        if($print_image->delete()){
            $this->notice::success('Data successfully Deleted');
            return redirect()->route('print_service_image.index');
        }
    }
}
