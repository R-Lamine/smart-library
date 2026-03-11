<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        // Plus tard, on passera des stats (nombre de livres, etc.)
        return view('dashboard');
    }
}