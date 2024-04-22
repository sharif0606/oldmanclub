<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Backend\Admin\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::all();
        return view('backend.coupon.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:coupons',
            'type' => 'required',
            'value' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required',
            'max_uses' => 'required'
        ]);

        // Create a new coupon
        Coupon::create($request->all());

        // Redirect to the index page with success message
        return redirect()->route('coupon.index')->with('success', 'Coupon created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('backend.coupon.edit', compact('coupon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $coupon = Coupon::findOrFail(encryptor('decrypt',$id));
        return view('backend.coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $coupon = Coupon::findOrFail(encryptor('decrypt',$id));
        $coupon->code = $request->code;
        $coupon->type = $request->type;
        $coupon->value = $request->value;
        $coupon->start_date = $request->start_date;
        $coupon->end_date = $request->end_date;
        $coupon->status = $request->status;
        $coupon->max_uses = $request->max_uses;
        if($coupon->save()){
            return redirect()->route('coupon.index')->with('success', 'Coupon updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $coupon = Coupon::findOrFail(encryptor('decrypt',$id));
        $coupon->delete();

        // Redirect to the index page with success message
        return redirect()->route('coupon.index')->with('success', 'Coupon deleted successfully.');
    }
}
