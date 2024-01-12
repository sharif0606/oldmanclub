<?php

namespace App\Http\Controllers\Backend\Website\LLcHeroSection;

use App\Models\Backend\Website\LLcservice\LlcPricing;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LlcPricingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $llcpricing = LlcPricing::get();
        return view('backend.website.llcpricing.index',compact('llcpricing'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.website.llcpricing.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $llcpricing = new LlcPricing;
            $llcpricing->llcpricing_plan = $request->llcpricing_plan;
            $llcpricing->llcprice = $request->llcprice;
            $llcpricing->llcpricing_package = $request->llcpricing_package;
            $llcpricing->llcpricingfeature_list = explode(', ', $request->llcpricingfeature_list);
            if($llcpricing->save()){
                $this->notice::success('LLc hero Successfully Saved');
                return redirect()->route('llcpricing.index');
            }
        }catch(Exception $e){
            //dd($e);
            $this->notice::error('Something Wrong! Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(LlcPricing $llcPricing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $llcpricing = LlcPricing::findOrFail(encryptor('decrypt',$id));
        return view('backend.website.llcpricing.edit',compact('llcpricing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $llcpricing = LlcPricing::findOrFail(encryptor('decrypt',$id));
            $llcpricing->llcpricing_plan = $request->llcpricing_plan;
            $llcpricing->llcprice = $request->llcprice;
            $llcpricing->llcpricing_package = $request->llcpricing_package;
            $llcpricing->llcpricingfeature_list = explode(',' , $request->llcpricingfeature_list);
            if($llcpricing->save()){
                $this->notice::success('LLc hero Successfully Saved');
                return redirect()->route('llcpricing.index');
            }
        }catch(Exception $e){
            //dd($e);
            $this->notice::error('Something Wrong! Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $llcpricing = LlcPricing::findOrFail(encryptor('decrypt',$id));
        if($llcpricing->delete()){
            $this->notice::success('LLc hero Successfully Deleted');
            return redirect()->route('llcpricing.index');
        }
    }
}
