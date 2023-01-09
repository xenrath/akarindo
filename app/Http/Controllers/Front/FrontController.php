<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $layanans = Layanan::get();
        return view('front.index', compact('layanans'));
    }

    public function login()
    {
        return view('front.login');
    }
}
