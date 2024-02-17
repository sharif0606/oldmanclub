<?php

namespace App\Http\Controllers\Backend\Printingservice;

use App\Http\Controllers\Controller;
use App\Models\Backend\PrintingService;
use App\Models\Backend\PrintingServiceImage;
use Illuminate\Http\Request;

class PrintingServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PrintingService::paginate(10);
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
        try{
            $print_service = new PrintingService;
            $print_service->service_name = $request->service_name;
            $print_service->service_details = $request->service_details;
            $print_service->qty = $request->qty;
            $print_service->price = $request->price;
            $print_service->created_by = currentUserId();
            if($print_service->save()){
                $this->notice::success('Data Successfully saved');
                return redirect()->route('print_service.index');
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
    public function show($id)
    {
        $print_service = PrintingService::findOrFail(encryptor('decrypt', $id));
        $print_image = PrintingServiceImage::where('printing_service_id', $print_service->id)->get();
        return view('backend.print_service.show', compact('print_image', 'print_service'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $print_service = PrintingService::findOrFail(encryptor('decrypt',$id));
        return view('backend.print_service.edit',compact('print_service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $print_service = PrintingService::findOrFail(encryptor('decrypt',$id));
            $print_service->service_name = $request->service_name;
            $print_service->service_details = $request->service_details;
            $print_service->qty = $request->qty;
            $print_service->price = $request->price;
            $print_service->updated_by = currentUserId();
            if($print_service->save()){
                $this->notice::success('Data Successfully saved');
                return redirect()->route('print_service.index');
            }
        }catch(Exception $e){
            dd($e);
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
    public function addTocart(){
        
    }
}
