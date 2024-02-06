<?php

namespace App\Http\Controllers\Backend\Nfc;

use App\Http\Controllers\Controller;
use App\Models\Backend\DesignCard;
use Illuminate\Http\Request;

class DesignCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DesignCard::paginate(10);
        return view('backend.design_card.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.design_card.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $data = new DesignCard;
            $data->design_name = $request->design_name;
            $data->template_id = $request->template_id;
            if($request->hasFile('image')){
                $imageName = rand(111,999).time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/cards'), $imageName);
                $data->image=$imageName;
            }
            $data->created_by = currentUserId();
            if($data->save()){
                $this->notice::success('Data Successfully saved');
                return redirect()->route('design_card.index');
            }
        }catch(Exception $e){
            //dd($e);
            $this->notice::error('Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(DesignCard $designCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $design_card = DesignCard::findOrFail(encryptor('decrypt',$id));
        return view('backend.design_card.edit',compact('design_card'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $designcard = DesignCard::findOrFail(encryptor('decrypt',$id));
            $designcard->design_name = $request->design_name;
            $designcard->template_id = $request->template_id;
            if($request->hasFile('image')){
                $imageName = rand(111,999).time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/cards'), $imageName);
                $designcard->image=$imageName;
            }
            $designcard->updated_by = currentUserId();
            if($designcard->save()){
                $this->notice::success('Data Successfully Updated');
                return redirect()->route('design_card.index');
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
        $designcard = DesignCard::findOrFail(encryptor('decrypt',$id));
        if($designcard->delete()){
            $this->notice::success('Data successfully Deleted');
            return redirect()->route('design_card.index');
        }
    }
}
