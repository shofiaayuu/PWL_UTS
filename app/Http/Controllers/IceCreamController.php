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
            ->with('ice', $ice);
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
        // Melakukan validasi data
        $request->validate([
            'kode_barang' => 'required|string|max:10|unique:ice_cream,kode_barang',
            'nama_ice' => 'required|string|max:50',
            'harga' => 'required',
            'gambar' => 'required|max:2048',//validasi untuk file gambar(images)
            'qty' => 'required|date',
        ]);
    
        // Mengambil file gambar dari form input
        $gambar = $request->file('gambar');
    
        // Memeriksa apakah file gambar ada
        if ($gambar) {
            // Mengatur nama file gambar
            $namaFile = time() . '.' . $gambar->getClientOriginalExtension();
    
            // Menyimpan file gambar ke folder public/images
            $gambar->move(public_path('images'), $namaFile);
    
            // Membuat data baru dalam database
            $data = new Ice_CreamModel();
            $data->kode_barang = $request->input('kode_barang');
            $data->nama_ice = $request->input('nama_ice');
            $data->harga = $request->input('harga');
            $data->gambar = $namaFile; // Menyimpan nama file gambar dalam database
            $data->qty = $request->input('qty');
            $data->save();
    
            // Jika data berhasil ditambahkan, akan kembali ke halaman utama
            return redirect('/ice_cream')
                ->with('success', 'Ice Cream Berhasil Ditambahkan');
        }
    //     } else {
    //         // Jika file gambar tidak ada, kembali ke halaman sebelumnya dengan error message
    //         return redirect()->back()
    //             ->with('error', 'Gagal mengupload gambar. Harap pilih file gambar yang valid.');
    //     }
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
    public function edit($id)
    {
        $ice_cream = Ice_CreamModel::find($id);
        return view('ice_cream.create_ice_cream')
            ->with('ice',$ice_cream)
            ->with('url_form',url('/ice_cream/'.$id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ice_Cream  $ice_Cream
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //Melakukan validasi data
        $request->validate([
            'kode_barang' => 'required|string|max:10|unique:ice_cream,kode_barang,',
            'nama_ice' => 'required|string|max:50',
            'harga' => 'required',
            'gambar' => 'required|max:2048',//validasi untuk file gambar(images)
            'qty' => 'required|date',
        ]);

        $data = Ice_CreamModel::where('id', '=', $id)->update($request->except(['_token','_method']));
        return redirect('ice_cream')
            ->with('success','Ice Cream Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ice_Cream  $ice_Cream
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ice_CreamModel::where('id', '=', $id)->delete();
        return redirect('ice_cream')
            ->with('success', 'Ice Cream Berhasil Dihapus');
    }
}
