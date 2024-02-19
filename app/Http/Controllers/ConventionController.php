<?php

namespace App\Http\Controllers;

use App\Models\Convention;
use App\Models\Validation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

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
        $body = "Votre convention <b> $convention->convention </b> a été validé avec succès ! Vous pouvez télecharger ci-dessous la convention";

        Mail::send('emails.convention.valider', ['body' => $body, 'path' => $path], function ($message) use ($convention) {
            $message->from('noreply@uvci.edu.ci', 'Plateforme Partenariat');
            $message->to('ibsoro27@gmail.com', '')
                ->subject('Validation de convention');
        });

        return back()->with('success', 'Convention validé');
    }

    public function refuser(Request $request, $id)
    {
        $convention = Convention::find($id);
        $convention->motif_rejet = $request->motif;
        $convention->status = 'refusé';
        $convention->update();

        $body = "Votre convention <b> $convention->convention </b> a été refusé ! <br>
                Voici les motifs de rejet : <b>$request->motif</b>";

        Mail::send('emails.convention.rejet', ['body' => $body], function ($message) use ($convention) {
            $message->from('noreply@uvci.edu.ci', 'Plateforme Partenariat');
            $message->to('ibsoro27@gmail.com', '')
                ->subject('Validation de convention');
        });

        return back()->with('success', 'Convention refusé');
    }
}
