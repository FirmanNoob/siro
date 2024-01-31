<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $pelatihan = Pelatihan::all();
        return view('tampilanDepan', compact('pelatihan'));
    }

    public function pelatihan_detail($id)
    {
        $pelatihan = Pelatihan::find($id);
        return view('tampilanDetail', compact('pelatihan'));
    }

    public function about()
    {
        return view('about');
    }
}
