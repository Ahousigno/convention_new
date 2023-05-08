<?php

namespace App\Http\Controllers;

use App\Models\Demandepartenariat;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Flash;


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

    public function mediatheque()
    {
        return view('client.mediatheque');
    }
    public function demande_convention()
    {
        return view('client.convention');
    }


    public function demande_partenariat(Request $request)
    {
        return view('client.partenariat');
    }

    public function store(Request $request)
    {
        if ($request->check != 'OUI') {
            // flash("Veuillez accepter les termes et conditions.")->success();
            // redirect()->route('client.partenariat');
            return view('client.partenariat')->with("success", "Veuillez accepter les termes de confidentialités!");
        }

        $request->validate([
            'nom' => ['required'],
            'prenoms' => ['required'],
            'email' => ['required'],
            'contact_tel' => ['required'],
            'libelle_structure' => ['required'],
            'logo' => ['nullable'],
            'situation_geo' => ['required'],
            'motif' => ['required'],
            'exemple_convention' => ['nullable'],
        ]);
        $partenariat = new Demandepartenariat();
        $partenariat->nom = $request->nom;
        $partenariat->email = $request->email;
        $partenariat->prenoms = $request->prenoms;
        $partenariat->contact_tel = $request->contact_tel;
        $partenariat->motif = $request->motif;
        $partenariat->situation_geo = $request->situation_geo;
        $partenariat->libelle_structure = $request->libelle_structure;

        // $partenariat = $request->all();
        if ($request->hasFile('logo')) {
            $validator = Validator::make($request->all(), [
                'logo' => 'required|max:2000',
            ])->validate();
            $logo = $request->logo;
            $piece_name = '/source_recru/logo/logo_' . $logo->getClientOriginalExtension();
            $logo->move('source_recru/logo/', $piece_name);
            $partenariat['logo'] = $piece_name;
        }

        if ($request->hasFile('exemple_convention')) {
            $validator = Validator::make($request->all(), [
                'exemple_convention' => 'required|max:5000',
            ])->validate();
            $exemple_convention = $request->exemple_convention;
            $piece_name = '/source_recru/exemple_convention/exemple_convention_' . $exemple_convention->getClientOriginalExtension();
            $exemple_convention->move('source_recru/exemple_convention/', $piece_name);
            $partenariat['exemple_convention'] = $piece_name;
        }
        // if ($request->photo) {
        //     $doc_lm = $request->photo;
        //     $lm_name = time() . '.' . $doc_lm->getClientOriginalName();
        //     $doc_lm->move(public_path("docs/images/lms"), $lm_name);
        //     $user->photo = $lm_name;

        $partenariat->save();
        // Alert::success('succes', "nouvel agent ajouté!");
        return view('client.partenariat')->with("success", "demande soumise avec succès!");
    }
}
