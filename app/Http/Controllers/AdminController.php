<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FilmDescription;

class AdminController extends Controller
{
    public function index()
    {    $films = FilmDescription::all();

        // La page admin.blade.php
        return view('admin');
    }

    
}
