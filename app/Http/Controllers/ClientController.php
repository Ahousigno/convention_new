<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return view('client.accueil');
    }
    public function presentation()
    {
        return view('client.presentation');
    }
    public function demande_partenariat()
    {
        return view('client.partenariat');
    }
    public function mediatheque()
    {
        return view('client.mediatheque');
    }
    public function demande_convention()
    {
        return view('client.convention');
    }
}