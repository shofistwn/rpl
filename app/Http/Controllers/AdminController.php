<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Guru;
use App\Models\Loker;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('pages.admin.index');
    }

    public function guru()
    {
        $dataGuru = Guru::orderBy('id', 'DESC')->with('user')->get();
        return view('pages.admin.guru', compact('dataGuru'));
    }

    public function artikel()
    {
        $dataArtikel = Artikel::orderBy('id', 'DESC')->with('user')->get();
        return view('pages.admin.artikel', compact('dataArtikel'));
    }

    public function loker()
    {
        $dataLoker = Loker::orderBy('id', 'DESC')->with('user')->get();
        return view('pages.admin.loker', compact('dataLoker'));
    }
}
