<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    // menampilkan halaman index

    public function index()
    {
        $layanans = Layanan::get();
        return view('front.index', compact('layanans'));
    }
}
