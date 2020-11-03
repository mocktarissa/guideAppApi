<?php

namespace App\Http\Controllers;

use App\Models\Poi;
use App\Models\QrCode;
use Illuminate\Http\Request;

class QrCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $poi = Poi::where('company_id', $request->company)->get();
        return view('/qrcode/create', ['company' => $request->company, 'poi' => $poi]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $qrcode = new QrCode();
        $qrcode->poi_id = $request->poi_id;
        $qrcode->value = $request->value;
        // $qrcode->url = $request->url;
        $qrcode->save();
        return redirect()->route('qrcode.index')
            ->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QrCode  $qrCode
     * @return \Illuminate\Http\Response
     */
    public function show(QrCode $qrCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QrCode  $qrCode
     * @return \Illuminate\Http\Response
     */
    public function edit(QrCode $qrCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QrCode  $qrCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QrCode $qrCode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QrCode  $qrCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(QrCode $qrCode)
    {
        //
    }
}
