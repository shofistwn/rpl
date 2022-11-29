<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ArtikelController extends Controller
{
    public function index()
    {
        $dataArtikel = Artikel::orderBy('id', 'desc')->get();
        return view('pages.artikel.index', compact('dataArtikel'));
    }

    public function search(Request $request)
    {
        $judul = $request->judul;

        $dataArtikel = Artikel::where('judul', 'like', "%" . $judul . "%")
            ->paginate(6);

        return view('pages.artikel.index', compact('dataArtikel'));
    }

    public function category($kategori)
    {
        $dataArtikel = Artikel::where('kategori', 'like', "%" . $kategori . "%")
            ->paginate(6);

        return view('pages.artikel.index', compact('dataArtikel'));
    }

    public function create()
    {
        return view('pages.artikel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul' => 'required',
            'kategori' => 'string',
            'isi' => 'string',
        ]);

        $foto = $request->file('foto');
        $namaFoto = time() . $foto->hashName();
        $foto->storeAs('public/artikel', $namaFoto);

        Artikel::create([
            'user_id' => auth()->user()->id,
            'foto' => $namaFoto,
            'judul' => $request->judul,
            'slug' => $request->judul,
            'kategori' => $request->kategori,
            'isi' => $request->isi,
        ]);

        Alert::success('Berhasil!', 'Artikel Berhasil Ditambahkan');

        return redirect()->route('artikel.index');
    }

    public function show($slug)
    {
        $artikel = Artikel::where('slug', $slug)->with('user')->first();
        return view('pages.artikel.show', compact('artikel'));
    }

    public function edit(Artikel $artikel)
    {
        return view('pages.artikel.edit', compact('artikel'));
    }

    public function update(Request $request, Artikel $artikel)
    {
        $request->validate([
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul' => 'required',
            'kategori' => 'string',
            'isi' => 'string',
        ]);

        if ($request->file('foto') == "") {
            $artikel->update([
                'user_id' => auth()->user()->id,
                'judul' => $request->judul,
                'slug' => $request->judul,
                'kategori' => $request->kategori,
                'isi' => $request->isi,
            ]);
        } else {
            Storage::disk('local')->delete('public/public/artikel/' . $artikel->foto);

            $foto = $request->file('foto');
            $namaFoto = time() . $foto->hashName();
            $foto->storeAs('public/artikel', $namaFoto);

            $artikel->update([
                'user_id' => auth()->user()->id,
                'foto' => $namaFoto,
                'judul' => $request->judul,
                'slug' => $request->judul,
                'kategori' => $request->kategori,
                'isi' => $request->isi,
            ]);
        }

        Alert::success('Berhasil!', 'Artikel Berhasil Diedit');

        return redirect()->route('artikel.index');
    }

    public function destroy(Artikel $artikel)
    {
        Storage::disk('local')->delete('public/public/artikel/' . $artikel->foto);
        $artikel->delete();

        Alert::success('Berhasil!', 'Artikel Berhasil Dihapus');

        return redirect()->back();
    }
}
