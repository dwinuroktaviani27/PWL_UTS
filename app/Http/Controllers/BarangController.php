<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $barangs = \App\Models\Barang::all();
        return view('barang.index',['barangs' => $barangs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barang = New Barang;
        $barang->kode_barang = $request->kode_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->kategori_barang = $request->kategori_barang;
        $barang->harga = $request->harga;
        $barang->qty = $request->qty;

        $barang->save();
        return redirect('/barang')->with('status', 'Data Barang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_barang)
    {
        $barangs = Barang::find($id_barang); 
        return view('barang.edit',['barangs' => $barangs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($kode_barang)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit 
        $barangs = Barang::find($kode_barang); 
        return view('barang.edit',['barangs' => $barangs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kode_barang)
    {
        $barang = New Barang;
        $barang->kode_barang = $request->kode_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->kategori_barang = $request->kategori_barang;
        $barang->harga = $request->harga;
        $barang->qty = $request->qty;

        $barang->update();
        return redirect('/barang')->with('status', 'Data Barang berhasil diupdate');

        // $request->validate([ 
        //     'kode_barang' => 'required', 
        //     'nama_barang' => 'required', 
        //     'kategori_barang' => 'required', 
        //     'harga' => 'required', 
        //     'qty' => 'required', ]); //fungsi eloquent untuk mengupdate data inputan kita 
        //     Barang::find($kode_barang)->update($request->all()); //jika data berhasil diupdate, akan kembali ke halaman utama 
        //     return redirect()->route('barang.index') ->with('success', 'Data Barang Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_barang)
    {
        //fungsi eloquent untuk menghapus data 
        Barang::find($id_barang)->delete(); 
        return redirect()->route('barang.index') -> with('success', 'Data Barang Berhasil Dihapus');
    }
}
