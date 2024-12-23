<?php

namespace App\Http\Controllers;

use App\Models\About;

class AboutController extends Controller
{
    public function index()
    {
        // Ambil semua data dari model About
        $abouts = About::all();

        // Kirim data ke view about.blade.php
        return view('about', compact('abouts'));
    }
}
