<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('back.kategori.index', compact('kategori'));
    }

    public function edit(string $id)
    {
        $kategori = Kategori::find($id);
        return view('back.kategori.edit', compact('kategori'));
    }

    public function create()
    {
        return view('back.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|min:4|unique:kategoris,nama_kategori',
        ]);

        $kategori = Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori),
        ]);



        return redirect()->route('kategori.index')->with(['success'=>'data berhasil tersimpan']);
    }

    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_kategori);

        $kategori = Kategori::findOrFail($id);
        $kategori->update($data);

        return redirect()->route('kategori.index')->with(['success'=>'data berhasil terupdate']);
    }
}
