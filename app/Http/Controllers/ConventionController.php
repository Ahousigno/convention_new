<?php

namespace App\Http\Controllers;

use App\Models\Convention;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ConventionController extends Controller
{
    public function save_demande_convention(Request $request){
        $this->validate(
            $request,
            [
                'nom' => 'required',
                'emailuvci' => 'required',
                'contact' => 'nullable',
                'convention' => 'required',
                'objet' => 'required',
            ]
        );
        //dd($request->all());
        $convention = $request->all();
        Convention::create($convention);
        return back()->with('success', 'Votre demande de convention est bien enregistrée !');
    }


    /** Demande convention **/
    public function show_demande_convention(){
        $demande_conventions = Convention::all();
        return view('admin.convention.index', compact('demande_conventions'));
    }

    public function valider(Request $request, $id)
    {
        $convention = Convention::find($id);
        $convention->motif_rejet = null;
        $convention->status = 'validé';
        $convention->update();

        $body = "Votre convention <b> $convention->convention </b> a été validé avec succès !";

        Mail::send('emails.convention.valider',['body'=>$body], function($message) use ($convention){
            $message->from('noreply@uvci.edu.ci','Plateforme Partenariat');
            $message->to('ibsoro27@gmail.com','')
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

        Mail::send('emails.convention.valider',['body'=>$body], function($message) use ($convention){
            $message->from('noreply@uvci.edu.ci','Plateforme Partenariat');
            $message->to('ibsoro27@gmail.com','')
                ->subject('Validation de convention');
        });

        return back()->with('success', 'Convention refusé');
    }

}
