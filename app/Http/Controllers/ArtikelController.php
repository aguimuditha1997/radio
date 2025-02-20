<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Support\Str;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::all();
        return view('back.artikel.index', compact('artikel'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('back.artikel.create',compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'body' => 'required|string',
            'kategori_id' => 'required|exists:kategori,id',
            'status' => 'required|in:published,draft',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        Artikel::create([
            'judul_artikel' => $request->judul_artikel,
            'slug' => Str::slug($request->judul_artikel),
            'body' => $request->body,
            'kategori_id' => $request->kategori_id,
            'status' => $request->status,
            'gambar_artikel' => $request->gambar_artikel,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('artikel.index')->with(['success'=>'Data Berhasil Tersimpan']);
    }

    public function edit(string $id)
    {
        $artikel = Artikel::find($id);
        $kategori = Kategori::all();
        return view('back.artikel.edit', compact('artikel','kategori'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'judul_artikel'=>'required',
                'body'=>'required',
                'gambar_artikel'=>'image|mimes:jpeg,jpg,png|max:10240'
            ],
            [
                'judul_artikel.required'=>'judul wajib diisi',
                'body.required'=>'body wajib diisi',
                'gambar_artikel.image'=>'hanya gambar yang di perbolehkan',
                'gambar_artikel.mimes'=>'Ekstensi yang di perbolehkan hanya JPEG, JPG, dan PNG',
                'gambar_artikel.max'=>'ukuran maksimum untuk gambar adalah 10MB',

            ]

        );

        $artikel = Artikel::findOrFail($id);

        $data=[
            'judul_artikel'=>$request->judul_artikel,
            'body'=>$request->body,
            'nama_kategori'=>$request->nama_kategori,
            'status'=>$request->status,
            'user_id' => Auth::id(),
        ];

        dd($data);


        $artikel->update($data);


        return redirect()->route('artikel.index')->with('success', 'Data Berhasil Disimpan');
    }


}
