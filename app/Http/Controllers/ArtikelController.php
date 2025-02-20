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
        return view('back.artikel.index');
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
    

}
