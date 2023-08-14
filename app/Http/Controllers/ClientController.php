<?php

namespace App\Http\Controllers;

use App\Models\Demandepartenariat;
use App\Models\Validation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Mail;

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
        $partenaires = Validation::all(); 
        return view('client.mediatheque' , compact('partenaires'));
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
            'exemple_convention' => 'nullable',

        ]);
        $partenariat = new Demandepartenariat();
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

        if ($request->exemple_convention) {
            $doc_lm = $request->exemple_convention;
            $lm_name = time() . '.' . $doc_lm->getClientOriginalName();
            $doc_lm->move(public_path("docs/images/lms"), $lm_name);
            $partenariat->exemple_convention = $lm_name;
        }

        $recipient = ['georgette.assemian@uvci.edu.ci',  'signo.aviet@uvci.edu.ci', 'dg@uvci.edu.ci']; //Emails des destinataires
        $mail_data = [
            'recipient' => $recipient, //Emails des autres services et du postulant de l'évènement
            'fromEmail' => $partenariat->email,
            'fromName' => $partenariat->libelle_structure,
            "subject" => "Demande de partenariat",
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
        return view('client.all_partenariats');
    }
}
