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

    // public function be_partener(Request $request)
    // {
    //     $this->validate(
    //         $request,
    //         [
    //             'be_partener' => 'required',
    //         ]
    //     );
    //     $attribute = [
    //         'be_partener' => trim($request->be_partener),
    //     ];
    //     DB::beginTransaction();
    //     try {
    //         $a = Demandepartenariat::find($request->partenaire_id);
    //         $b = $a->update($attribute);
    //         DB::commit();
    //         //   flash('Opération effectuée avec succès !')->success();
    //         return redirect()->route('admin.partenaires');
    //     } catch (Exception $exception) {
    //         DB::rollBack();
    //         // flash($exception->getMessage())->error();
    //         return redirect()->route('admin.partenariat.edit_demande');
    //     }
    // }

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


    // public function motif_modal(Request $request)
    // {
    //     $this->validate($request, [
    //         'motif_rejet' => ['required', 'max:600']
    //     ]);
    //     $partenariat = Demandepartenariat::first();
    //     $partenariat->can_be_partner == 'NON';
    //     $partenariat->motif_rejet = $request->motif_rejet;
    //     $partenariat->update();
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
    //     return back()->with("success",  "Demande rejetée!");
    // }

    // public function drive_modal(Request $request)
    // {
    //     $this->validate($request, [
    //         'drive' => ['required', 'max:600']
    //     ]);
    //     $partenariat = Demandepartenariat::first();
    //     $partenariat->can_be_partner == 'OUI';
    //     $partenariat->drive = $request->linkDriveModal;
    //     $partenariat->save();
    //     return view('client.partenariat')->with("success", "demande acceptée!");

    //     return back()->with("success",  "Demande acceptée!");
    // }

    // public function edit_update(Request $request)
    // {
    //   if ($request->can_be_partner != null) {
    //     if ($request->can_be_partner == 'NON') {
    //       $demande_attente = DemandePartenariat::find($request->id);
    //       $data = [
    //         'motif' => $request->motif_rejet ??  '',
    //         'email' => $demande_attente->email,
    //         'nom' => $demande_attente->nom ?? '',
    //         'libelle_structure' => $demande_attente->libelle_structure
    //       ];
    //       Mail::to($demande_attente->email)->send(new SendMotif($data));
    //       DemandeRejete::create([
    //         'logo'  => $demande_attente->logo,
    //         'structure'  => $demande_attente->libelle_structure,
    //         'nom'  => $demande_attente->nom,
    //         'contact'  => $demande_attente->contact_tel,
    //         'email'  => $demande_attente->email,
    //         'demand_partenariat_id' => $demande_attente->id
    //       ]);
    //       $demande_attente->delete();
    //       flash("Demande de partenariat refusée avec succès ! ");
    //       return redirect(Route('demande_attentes'));
    //     }
    //     $attribute['can_be_partner'] = $request->can_be_partner;
    //     try {
    //       $demande_attente = DemandePartenariat::find($request->id);
    //       $data = [
    //         'drive' => $request->linkDriveModal ??  '',
    //         'email' => $demande_attente->email ?? '',
    //         'nom' => $demande_attente->nom ?? '',
    //         'libelle_structure' => $demande_attente->libelle_structure
    //       ];

    // Mail::to($demande_attente->emaill)->send(new SendDriveLink($data));
    // demande en attente approuvé vont dans Validation en cours pour attach de convention...
    //       DemandValidation::create(array_merge($demande_attente->toArray(), ['demand_partenariat_id' => $demande_attente->id, 'uuid' => Self::generateUuid()]));
    //       $demande_attente->delete();
    //       flash('Demande de partenariat accepté avec success !')->success();
    //       return redirect(route('demande_attentes'));
    //     } catch (Exception $exception) {
    //       DB::rollBack();
    //       flash($exception->getMessage())->error();
    //       return redirect()->route('demande_attentes');
    //     }
    //   }
    //   return redirect()->back();
    // }

    // public function demand_refresh(Request $request)
    // {
    //   $demand =  DemandeRejete::findOrFail($request->id);
    //   $demand->delete();
    //   DemandePartenariat::withTrashed()->find($demand->demand_partenariat_id)->restore();
    //   flash("demande retablie avec success ! ")->success();
    //   return redirect()->back();
    // }

    // public function demand_validation_delete(Request $request)
    // {
    //   $demand =  DemandValidation::findOrFail($request->id);
    //   $demand->delete();
    //   DemandePartenariat::withTrashed()->find($demand->demand_partenariat_id)->restore();
    //   flash("demande supprimé avec succès !  ")->success();
    //   return redirect()->back();
    // }



    // public function edit_apdate(Request $request)
    // {
    //     if ($request->can_be_partner != null) {
    //         if ($request->can_be_partner == 'NON') {
    //             $demande_attente = DemandePartenariat::find($request->id);
    //             $data = [
    //                 'motif' => $request->motif_rejet ??  '',
    //                 'email' => $demande_attente->email,
    //                 'nom' => $demande_attente->nom ?? '',
    //                 'libelle_structure' => $demande_attente->libelle_structure
    //             ];
    //             Mail::to($demande_attente->email)->send(new SendMotif($data));
    //             DemandeRejete::create([
    //                 'logo'  => $demande_attente->logo,
    //                 'structure'  => $demande_attente->libelle_structure,
    //                 'nom'  => $demande_attente->nom,
    //                 'contact'  => $demande_attente->contact_tel,
    //                 'email'  => $demande_attente->email,
    //                 'demand_partenariat_id' => $demande_attente->id
    //             ]);
    //             $demande_attente->delete();
    //             flash("Demande de partenariat refusée avec succès ! ");
    //             return redirect(Route('demande_attentes'));
    //         }
    //         $attribute['can_be_partner'] = $request->can_be_partner;
    //         try {
    //             $demande_attente = DemandePartenariat::find($request->id);
    //             $data = [
    //                 'drive' => $request->linkDriveModal ??  '',
    //                 'email' => $demande_attente->email ?? '',
    //                 'nom' => $demande_attente->nom ?? '',
    //                 'libelle_structure' => $demande_attente->libelle_structure
    //             ];

    //             // Mail::to($demande_attente->emaill)->send(new SendDriveLink($data));
    //             // demande en attente approuvé vont dans Validation en cours pour attach de convention...
    //             //   DemandValidation::create(array_merge($demande_attente->toArray(), ['demand_partenariat_id' => $demande_attente->id, 'uuid' => Self::generateUuid()]));
    //             $demande_attente->delete();
    //             flash('Demande de partenariat accepté avec success !')->success();
    //             return redirect(route('demande_attentes'));
    //         } catch (Exception $exception) {
    //             DB::rollBack();
    //             Flash($exception->getMessage())->error();
    //             //   return redirect()->route('demande_attentes');
    //         }
    //     }
    //     return redirect()->back();
    // }
}
