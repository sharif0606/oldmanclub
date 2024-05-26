<?php

namespace App\Http\Controllers\Backend\Nfc;

use App\Http\Controllers\Controller;
use App\Models\Backend\NfcField;
use Exception;
use Illuminate\Http\Request;

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
        return view('backend.nfc-field.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $nfcField = new NfcField;
            $nfcField->name = $request->name;
            $nfcField->icon = $request->icon;
            $nfcField->status = $request->status;
            $nfcField->created_by = currentUserId();
            if($nfcField->save()){
                $this->notice::success('Data Successfully saved');
                return redirect()->route('nfc_field.index');
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
        return view('backend.nfc-field.edit',compact('nfcField'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $nfcField = NfcField::findOrFail(encryptor('decrypt',$id));
            $nfcField->name = $request->name;
            $nfcField->icon = $request->icon;
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