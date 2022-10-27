<?php

namespace App\Http\Controllers;

use App\Models\Loker;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LokerController extends Controller
{
    public function index()
    {
        $dataLoker = Loker::orderBy('id', 'DESC')->paginate(9);
        return view('pages.loker.index', compact('dataLoker'));
    }
    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul' => 'required',
            'kategori' => 'string',
            'isi' => 'string',
        ]);

        $isi = $request->isi;
        $dom = new \DomDocument();
        $dom->loadHtml($isi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('imageFile');

        foreach ($imageFile as $item => $image) {
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imgeData = base64_decode($data);
            $image_name = "/upload/" . time() . $item . '.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $imgeData);

            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
        }

        $foto = $request->file('foto');
        $namaFoto = time() . $foto->hashName();
        $foto->storeAs('public/loker', $namaFoto);

        Loker::create([
            'user_id' => auth()->user()->id,
            'foto' => $namaFoto,
            'judul' => $request->judul,
            'slug' => $request->judul,
            'kategori' => $request->kategori,
            'isi' => $dom->saveHTML(),
        ]);

        Alert::success('Berhasil!', 'Artikel Berhasil Ditambahkan');

        return redirect()->route('artikel.index');
    }
    
    public function show(Loker $loker)
    {
        //
    }
    
    public function edit(Loker $loker)
    {
        //
    }
    
    public function update(Request $request, Loker $loker)
    {
        //
    }

    public function destroy(Loker $loker)
    {
        //
    }
}
