<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataGuru = Guru::get();
        return view('pages.guru.index', compact('dataGuru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.guru.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'email' => 'required|email|unique:guru,email',
            'telepon' => 'unique:guru,telepon|numeric'
        ]);

        $image = $request->file('foto');
        $image->storeAs('public/assets/img/guru/', $image->hashName());

        Guru::create([
            'foto' => $image->hashName(),
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'telepon' => $request->telepon
        ]);

        return redirect()->route('guru.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(Guru $guru)
    {
        return view('pages.guru.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama' => 'string',
            'alamat' => 'string',
            'email' => 'email',
            'telepon' => 'numeric'
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $foto->storeAs('public/assets/img/guru', $foto->hashName());

            Storage::delete('public/assets/img/guru/' . $guru->foto);

            $guru->update([
                'foto' => $foto->hashName(),
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'telepon' => $request->telepon
            ]);
        } else {
            $guru->update([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'telepon' => $request->telepon
            ]);
        }

        return redirect()->route('guru.index')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $guru)
    {
        Storage::delete('public/assets/img/guru/' . $guru->foto);
        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'Data berhasil dihapus!');
    }
}
