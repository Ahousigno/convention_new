<?php

namespace App\Http\Controllers;

use App\Models\Convention;
use App\Models\Validation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ConventionController extends Controller
{
    public function save_demande_convention(Request $request)
    {

        // $this->validate(
        //     $request,
        //     [
        //         'nom' => 'required',
        //         'emailuvci' => 'required',
        //         'convention' => 'required',
        //         'objet' => 'required',
        //     ]
        // );
        //dd($request->all());
        // $convention = $request->all();
        // Convention::create($convention);
        if ($request->check != 'OUI') {
            // flash("Veuillez accepter les termes et conditions.")->success();
            // redirect()->route('client.partenariat');
            return back()->with("error", "Veuillez accepter les termes de confidentialités!");
        }
        $convention = new Convention();
        $convention->nom = $request->nom;
        $convention->emailuvci = $request->emailuvci;
        $convention->contact = $request->contact;
        $convention->objet = $request->objet;
        $convention->convention = $request->convention;
        $convention->save();
        return back()->with('success', 'Votre demande de convention est bien enregistrée !');
    }


    /** Demande convention **/
    public function show_demande_convention()
    {
        $demande_conventions = Convention::orderBy('created_at', 'desc')->get();
        return view('admin.convention.index', compact('demande_conventions'));
    }

    public function valider(Request $request, $id)
    {

        $convention = Convention::find($id);
        $convention->motif_rejet = null;
        $convention->status = 'validé';
        $convention->update();
        $validation = Validation::where('nom_convention', $convention->convention)->first();
        $path = 'docs/images/lms/' . $validation->file_convention;
        $body = "Votre demande de convention <b> $convention->convention </b> a été validée avec succès ! Vous pouvez télecharger ci-dessous la convention";

        $recipient = [$convention->emailuvci];
        $mail_data = [
            'recipient' => $recipient,
            'fromEmail' => Auth::user()['email'],
            'fromName' => Auth::user()['name'] . ' ' . Auth::user()['pname'],
            "subject" => "Validation de convention",
        ];
        Mail::send('emails.convention.valider', ['body' => $body, 'path' => $path], function ($message) use ($mail_data) {
            $message->to($mail_data['recipient'])
                ->from($mail_data['fromEmail'], $mail_data['fromName'])
                ->subject($mail_data['subject']);
        });

        return back()->with('success', 'Convention validé');
    }

    public function refuser(Request $request, $id)
    {
        $convention = Convention::find($id);
        $convention->motif_rejet = $request->motif;
        $convention->status = 'refusé';
        $convention->update();

        $body = "Votre demande de convention <b> $convention->convention </b> a été refusée ! <br>
                Voici les motifs de rejet : <b>$request->motif</b>";
        $recipient = [$convention->emailuvci]; //Emails des destinataires
        $mail_data = [
            'recipient' => $recipient,
            'fromEmail' => Auth::user()['email'],
            'fromName' => Auth::user()['name'] . ' ' . Auth::user()['pname'],
            "subject" => "Validation de convention",
            "motifRejet" => $request->motif_rejet,
        ];
        Mail::send('emails.convention.rejet', ['body' => $body], function ($message) use ($mail_data) {
            $message->to($mail_data['recipient'])
                ->from($mail_data['fromEmail'], $mail_data['fromName'])
                ->subject($mail_data['subject']);
        });
        return back()->with('success', 'Convention refusé');
    }
}
