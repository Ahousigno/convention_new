<?php

namespace App\Http\Controllers;

use Laracasts\Flash\Flash;
use App\Models\Demandepartenariat;
use Exception;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

class AdminController extends Controller
{
    public function index()
    {
        $data['demande_attente'] = Demandepartenariat::all();

        return view('admin.dashboard')->with($data);
    }

    public function demande_attente(Request $request)
    {

        $partenariats = Demandepartenariat::paginate('30')->sortByDesc('created_at')->all();
        // return view('admin.users.index')->with('users', $users);
        // $partenariats = DB::table('Demandepartenariats')->select('*')->paginate('10')->orderByDesc('created_at')->get();
        return view('admin.partenariat.demande_attente', compact('partenariats'));
        // $data['i'] = 1;
        // $data['partenariat'] = Demandepartenariat::orderByDesc('created_at')->get();
        // return view('admin.partenariat.demande_attente')->with($data);
    }

    public function edit_attente($id)
    {
        $partenariat = DemandePartenariat::find($id);
        return view('admin.partenariat.edit_demande', compact('partenariat'));
    }

    public function edit_update(Request $request)
    {
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
        // if ($partenariat->can_be_partner == 'OUI') {
        //     $this->validate($request, [
        //         'motif_rejet' => ['required', 'max:600']
        //     ]);
        //     $partenariat = Demandepartenariat::first();
        //     $partenariat->can_be_partner == 'NON';
        //     $partenariat->motif_rejet = $request->motif_rejet;
        //     $partenariat->update();
        //     return back()->with("success",  "Demande rejetée!");
        // } elseif ($partenariat->can_be_partner == 'NON') {
        //     $this->validate($request, [
        //         'drive' => ['required', 'max:600']
        //     ]);
        //     $partenariat = Demandepartenariat::first();
        //     $partenariat->can_be_partner == 'OUI';
        //     $partenariat->drive = $request->linkDriveModal;
        //     $partenariat->save();
        //     return view('client.partenariat')->with("success", "demande acceptée!");

        //     return back()->with("success",  "Demande acceptée!");
        // } else {
        //     return back()->with("error",  "Definissez l'égibilité de la demande!");
        // }
        $partenariat->update();

        return back();
    }


    public function motif_modal(Request $request)
    {
        $this->validate($request, [
            'motif_rejet' => ['required', 'max:600']
        ]);
        $partenariat = Demandepartenariat::first();
        $partenariat->can_be_partner == 'NON';
        $partenariat->motif_rejet = $request->motif_rejet;
        $partenariat->update();
        // Alert::success('Succès', 'L\'évènement a bien été réfusé !');
        // $recipient = ['secretariat@uvci.edu.ci', 'georgette.assemian@uvci.edu.ci', 'medias@uvci.edu.ci', 'signo.aviet@uvci.edu.ci', 'patrimoine@uvci.edu.ci', 'dg@uvci.edu.ci',  $event->user->email]; //Emails des destinataires
        // $mail_data = [
        //     'recipient' => $recipient, //Emails des autres services et du postulant de l'évènement
        //     'fromEmail' => Auth::user()['email'],
        //     'fromName' => Auth::user()['name'] . ' ' . Auth::user()['pname'],
        //     "subject" => "Validation des évènements",
        //     "motifRejet" => $request->motif,
        //     "event_name" => $event->nom,
        // ];
        // Mail::send('admin.subdirector.emails.rejectEvent', $mail_data, function ($message) use ($mail_data) {
        //     $message->to($mail_data['recipient'])
        //         ->from($mail_data['fromEmail'], $mail_data['fromName'])
        //         ->subject($mail_data['subject']);
        // });
        return back()->with("success",  "Demande rejetée!");
    }

    public function drive_modal(Request $request)
    {
        $this->validate($request, [
            'drive' => ['required', 'max:600']
        ]);
        $partenariat = Demandepartenariat::first();
        $partenariat->can_be_partner == 'OUI';
        $partenariat->drive = $request->linkDriveModal;
        $partenariat->save();
        return view('client.partenariat.edit_demande')->with("success", "demande acceptée!");
    }
}
