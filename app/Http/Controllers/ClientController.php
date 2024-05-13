<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Convention;
use App\Models\Demandepartenariat;
use App\Models\Validation;
use App\Models\Activite;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class ClientController extends Controller
{
    public function index()
    {
        // $partenariats = Demandepartenariat::take('4');
        $partners  = Validation::where('validated', '1')->take('6')->get();
        $partenaires = Validation::all();
        $categories = Categorie::all();
        $activite = Activite::count();

        return view('client.accueil', compact('partenaires', 'categories', 'partners'));
    }
    public function presentation()
    {
        return view('client.presentation');
    }
    public function confidence()
    {
        return view('client.confidentialite');
    }

    public function mediatheque()
    {
        $partenaires = Validation::all();
        return view('client.mediatheque', compact('partenaires'));
    }
    
    public function demande_convention()
    {

        // $partenaires = Validation::all();
        $conventions = Validation::pluck('nom_convention');

        return view('client.convention', compact('conventions'));
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
            return back()->with("error", "Veuillez accepter les termes de confidentialités!");
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
            'exemple_convention' => 'nullable',

        ]);
        $partenariat = new Demandepartenariat();
        $partenariat->continent = $request->continent;
        $partenariat->pays = $request->pays;
        $partenariat->ville = $request->ville;
        $partenariat->decret = $request->decret;
        $partenariat->status = $request->status;
        $partenariat->site = $request->site;
        $partenariat->nom = $request->nom;
        $partenariat->email = $request->email;
        $partenariat->prenoms = $request->prenoms;
        $partenariat->contact_tel = $request->contact_tel;
        $partenariat->motif = $request->motif;
        $partenariat->situation_geo = $request->situation_geo;
        $partenariat->libelle_structure = $request->libelle_structure;

        if ($request->logo) {
            $doc_lm = $request->logo;
            $lm_name = time() . '.' . $doc_lm->getClientOriginalName();
            $doc_lm->move(public_path("docs/images/lms"), $lm_name);
            $partenariat->logo = $lm_name;
        }
        if ($request->regime) {
            $doc_lm = $request->regime;
            $lm_name = time() . '.' . $doc_lm->getClientOriginalName();
            $doc_lm->move(public_path("docs/images/lms"), $lm_name);
            $partenariat->regime = $lm_name;
        }
        if ($request->exemple_convention) {
            $doc_lm = $request->exemple_convention;
            $lm_name = time() . '.' . $doc_lm->getClientOriginalName();
            $doc_lm->move(public_path("docs/images/lms"), $lm_name);
            $partenariat->exemple_convention = $lm_name;
        }

        $recipient = ['georgette.assemian@uvci.edu.ci',  'signo.aviet@uvci.edu.ci', 'dg@uvci.edu.ci', 'julie.kadio@uvci.edu.ci']; //Emails des destinataires
        $mail_data = [
            'recipient' => $recipient, //Emails des autres services et du postulant de l'évènement
            'fromEmail' => $partenariat->email,
            'fromName' => $partenariat->libelle_structure,
            "subject" => "Demande de partenariat",
            "demande" => $partenariat->libelle_structure,
            // "createdByName" => Auth::user()['name'],
            // "createdByEmail" => Auth::user()['email'],
        ];
        Mail::send('emails.partenariat', $mail_data, function ($message) use ($mail_data) {
            $message->to($mail_data['recipient'])
                ->from($mail_data['fromEmail'], $mail_data['fromName'])
                ->subject($mail_data['subject']);
        });

        $partenariat->save();

        return view('client.partenariat')->with("success", "demande soumise avec succès!");
    }

    public function all_partenariats()
    {
        $partenariats = Validation::where('validated', '1')->get();
        return view('client.all_partenariats', compact('partenariats'));
    }

    public function tres_dynamique()
    {

        $partenaires  = Validation::all();
        $partenaireWithMaxActivites = $partenaires->filter(function ($partenaire) {
            return $partenaire->activites->count() >= 5;
        });
        return view('client.tres_dynamique', compact('partenaireWithMaxActivites'));
    }
    public function dynamique()
    {
        $partenaires  = Validation::all();
        $partenaireWithMoyenActivites = $partenaires->filter(function ($partenaire) {

            return $partenaire->activites->count() < 5 && $partenaire->activites->count() >= 3;
        });

        return view('client.dynamique', compact('partenaireWithMoyenActivites'));
    }
    public function moins_dynamique()
    {
        $partenaires  = Validation::all();
        $partenaireWithLowActivites = $partenaires->filter(function ($partenaire) {
            return $partenaire->activites->count() < 3;
        });
        return view('client.moins_dynamique', compact('partenaireWithLowActivites'));
    }
    public function infos($id)
    {
        $partenaireWithMoyenActivite = Validation::where('id', $id)->first();
        $demande = new Demandepartenariat();
        $categorie = new Categorie();
        return view('client.info', compact('partenaireWithMoyenActivite', 'demande', 'categorie'));
    }


    public function rang()
    {

        $partenaires = Validation::all();
        // $activite = Activite::count();

        return view('client.rang', compact('partenaires'));
    }

    public function tres_dynamique()
    {

        $partenaires  = Validation::all();
        $partenaireWithMaxActivites = $partenaires->filter(function ($partenaire) {
            return $partenaire->activites->count() >= 5;
        });
        return view('client.tres_dynamique', compact('partenaireWithMaxActivites'));
    }
    public function dynamique()
    {
        $partenaires  = Validation::all();
        $partenaireWithMoyenActivites = $partenaires->filter(function ($partenaire) {

            return $partenaire->activites->count() < 5 && $partenaire->activites->count() >= 3;
        });

        return view('client.dynamique', compact('partenaireWithMoyenActivites'));
    }
    public function moins_dynamique()
    {
        $partenaires  = Validation::all();
        $partenaireWithLowActivites = $partenaires->filter(function ($partenaire) {
            return $partenaire->activites->count() < 3;
        });
        return view('client.moins_dynamique', compact('partenaireWithLowActivites'));
    }
    public function infos($id)
    {
        $partenaireWithMoyenActivite = Validation::where('id', $id)->first();
        $demande = new Demandepartenariat();
        $categorie = new Categorie();
        return view('client.info', compact('partenaireWithMoyenActivite', 'demande', 'categorie'));
    }


    public function rang()
    {

        $partenaires = Validation::all();
        // $activite = Activite::count();

        return view('client.rang', compact('partenaires'));
    }
}