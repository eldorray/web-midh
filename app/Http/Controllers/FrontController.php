<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $heroes = \App\Models\Hero::where('is_active', true)->first();
        $features = \App\Models\Feature::all();
        $visiMisis = \App\Models\VisiMisi::all();
        return view('front.index', compact('heroes', 'features', 'visiMisis'));
    }
}
