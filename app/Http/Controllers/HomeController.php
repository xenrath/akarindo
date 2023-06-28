<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Tiket;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->isAdmin()) {
            return redirect('admin');
        } elseif (auth()->user()->isCS()) {
            return redirect('cs');
        } elseif (auth()->user()->isTeknisi()) {
            return redirect('teknisi');
        } elseif (auth()->user()->isClient()) {
            return redirect('client');
        } elseif (!auth()->user()->isClient()) {
            return redirect('client/nonaktif')
                ->with('error_title', 'Akun Anda sudah tidak aktif!')
                ->with('error_description', 'Silahkan hubungi customer service untuk mengaktifkannya.');
        }
    }
}
