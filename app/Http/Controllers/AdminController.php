<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('pages.admin.index');
    }

    public function artikel()
    {
        $dataArtikel = Artikel::orderBy('id', 'DESC')->with('user')->get();
        return view('pages.admin.artikel', compact('dataArtikel'));
    }
}
