<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    // menampilkan halaman index faq

    public function index()
    {
        $faqs = Faq::get();
        return view('client.faq.index', compact('faqs'));
    }
}
