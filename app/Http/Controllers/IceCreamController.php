<?php

namespace App\Http\Controllers;

use App\Models\Ice_Cream;
use App\Models\Ice_CreamModel;
use Illuminate\Http\Request;

class IceCreamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ice = Ice_CreamModel::all();
        return view('ice_cream.ice_cream')
            ->with('ice',$ice);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ice_cream.create_ice_cream')
            ->with('url_form',url('/ice_cream'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Melakukan validasi data
        $request->validate([
            'kode_barang' => 'required|string|max:10|unique:ice_cream,kode_barang,',
            'nama_ice' => 'required|string|max:50',
            'harga' => 'required|',
            'gambar' => 'required|string|max:50',
            'qty' => 'required|date',
        ]);

       $data = Ice_CreamModel::create($request->except(['_token']));

        //jika data berhasil ditambahkan, akan kembali ke halaman utama 
        return redirect('/ice_cream')
            ->with('success','Ice Cream Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ice_Cream  $ice_Cream
     * @return \Illuminate\Http\Response
     */
    public function show(Ice_CreamModel $ice_Cream)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ice_Cream  $ice_Cream
     * @return \Illuminate\Http\Response
     */
    public function edit(Ice_CreamModel $ice_Cream)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ice_Cream  $ice_Cream
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ice_CreamModel $ice_Cream)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ice_Cream  $ice_Cream
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ice_CreamModel $ice_Cream)
    {
        //
    }
}
