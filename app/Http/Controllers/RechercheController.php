<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use App\Models\Categorie;
use App\Models\Demandepartenariat;
use App\Models\Validation;
use Illuminate\Http\Request;

class RechercheController extends Controller
{
    public function search(Request $request)
    {
        $data['partners'] = Validation::where('validated', '1')->take('6')->get();
        $data['categories'] = Categorie::all();
        $data['activite'] = Activite::count();
        $mot = $request->mot;
        $data['searchs'] = Demandepartenariat::where('libelle_structure', 'LIKE', '%' . $mot . '%')
            ->orwhere('continent', 'LIKE', '%' . $mot . '%')
            ->orwhere('pays', 'LIKE', '%' . $mot . '%')
            ->orwhere('situation_geo', 'LIKE', '%' . $mot . '%')
            ->orwhere('ville', 'LIKE', '%' . $mot . '%')
            ->orwhere('decret', 'LIKE', '%' . $mot . '%')
            ->orwhere('prenoms', 'LIKE', '%' . $mot . '%')
            ->orwhere('nom', 'LIKE', '%' . $mot . '%')
            ->orwhere('site', 'LIKE', '%' . $mot . '%')
            ->get();
        $data['partenaires'] = Demandepartenariat::all();
        return view('client.recherche')->with($data);
    }
}
