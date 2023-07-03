<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =  [
            'barangs' => Barang::all(),
        ];
        
        return view('barang.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'kategoris' => Kategori::all()
        ];
        return view('barang.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $barang = new Barang();
        $barang->nama = $request->nama;
        $barang->id_kategori = $request->id_kategori;
        $barang->save();
        return redirect(route('barang.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'barang'=> Barang::find($id),
            'kategoris'=> Kategori::all()
        ];
        return view('barang.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $barang = Barang::find($id);
        $barang->nama = $request->nama;
        $barang->id_kategori = $request->id_kategori;
        $barang->save();
        return redirect(route('barang.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::find($id);
        $barang->delete();
        return redirect(route('barang.index'));
    }
}
