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
        try{
            $print_image = new PrintingServiceImage;
            $print_image->printing_service_id  = $request->printing_service_id;
            if ($request->hasFile('image')) {
                $imageName = rand(111,999) . time() . '.' .$request->image->extension();
                $request->image->move(public_path('uploads/printimages'), $imageName);
                $print_image->image = $imageName;
            }
            if ($request->has('is_featured')) {
                $print_image->is_featured = $request->is_featured;
            } else {
                $print_image->is_featured = false;
            }
            $print_image->created_by = currentUserId();
            if($print_image->save()){
                $this->notice::success('Data Successfully saved');
                return redirect()->route('print_service_image.index');
            }
            
        } catch(Exception $e) {
            // dd($e);
            $this->notice::error('Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PrintingServiceImage $printingServiceImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $print_service = PrintingService::get();
        $print_image = PrintingServiceImage::findOrFail(encryptor('decrypt',$id));
        return view('backend.print_service_image.edit',compact('print_image','print_service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $print_image = PrintingServiceImage::findOrFail(encryptor('decrypt',$id));

            // Find any existing item that is currently marked as featured for the same printing_service_id
            $existing_featured_item = PrintingServiceImage::where('printing_service_id', $request->printing_service_id)
                ->where('is_featured', true)
                ->first();
            
            // Update the is_featured status of the existing featured item if it exists
            if ($existing_featured_item) {
                $existing_featured_item->update(['is_featured' => false]);
            }
            $print_image->printing_service_id  = $request->printing_service_id;
            if ($request->hasFile('image')) {
                $imageName = rand(111,999) . time() . '.' .$request->image->extension();
                $request->image->move(public_path('uploads/printimages'), $imageName);
                $print_image->image = $imageName;
            }
            if ($request->has('is_featured')) {
                $print_image->is_featured = $request->is_featured;
            } else {
                $print_image->is_featured = false;
            }
            $print_image->updated_by = currentUserId();
            if($print_image->save()){
                $this->notice::success('Data Successfully saved');
                return redirect()->route('print_service_image.index');
            }
            
        } catch(Exception $e) {
            // dd($e);
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
