<?php

namespace App\Http\Controllers;

use Laracasts\Flash\Flash;
use App\Models\Demandepartenariat;
use Exception;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $data['demande_attente'] = Demandepartenariat::all();

        return view('admin.dashboard')->with($data);
    }

    public function demande_attente(Request $request)
    {

        $partenariats = Demandepartenariat::paginate('10')->sortByDesc('created_at')->all();
        // return view('admin.users.index')->with('users', $users);
        // $partenariats = DB::table('Demandepartenariats')->select('*')->paginate('10')->orderByDesc('created_at')->get();
        return view('admin.partenariat.demande_attente', compact('partenariats'));
        // $data['i'] = 1;
        // $data['partenariat'] = Demandepartenariat::orderByDesc('created_at')->get();
        // return view('admin.partenariat.demande_attente')->with($data);
    }

    public function edit_attente($id)
    {
        $demande_attente = DemandePartenariat::find($id);
        return view('admin.partenariat.edit_demande', compact('demande_attente'));
    }

    public function be_partener(Request $request)
    {
        $this->validate(
            $request,
            [
                'be_partener' => 'required',
            ]
        );
        $attribute = [
            'be_partener' => trim($request->be_partener),
        ];
        DB::beginTransaction();
        try {
            $a = Demandepartenariat::find($request->partenaire_id);
            $b = $a->update($attribute);
            DB::commit();
            //   flash('Opération effectuée avec succès !')->success();
            return redirect()->route('admin.partenaires');
        } catch (Exception $exception) {
            DB::rollBack();
            // flash($exception->getMessage())->error();
            return redirect()->route('admin.partenariat.edit_demande');
        }
    }

    public function edit_update(Request $request)
    {
        //     @if($request->can_be_partner != null  && == 'NON');

        //     @else($request->can_be_partner != null  && == 'OUI')

        // @endif
        $request->validate([
            'nom' => ['required'],
            'prenoms' => ['required'],
            'email' => ['required'],
            'contact_tel' => ['required'],
            'libelle_structure' => ['required'],
            'logo' => ['nullable'],
            'situation_geo' => ['required'],
            'motif' => ['required'],
            'exemple_convention' => ['required'],
        ]);
        $partenariat = new Demandepartenariat();
        $partenariat->nom = $request->nom;
        $partenariat->email = $request->email;
        $partenariat->prenoms = $request->prenoms;
        $partenariat->contact_tel = $request->contact_tel;
        $partenariat->motif = $request->motif;
        $partenariat->situation_geo = $request->situation_geo;
        $partenariat->libelle_structure = $request->libelle_structure;

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
            $exemple_convention->move('source_recru/logo/', $piece_name);
            $partenariat['exemple_convention'] = $piece_name;
        }

        $partenariat->save();

        return view('admin.partenariat.edit_demande')->with("success", "demande soumise avec succès!");
    }


    public function motif_modal(Request $request)
    {
        $this->validate($request, [
            'motif_rejet' => ['required', 'max:600']
        ]);
        $demande_attente = Demandepartenariat::first();
        $demande_attente->can_be_partner == 'NON';
        $demande_attente->motif_rejet = $request->motif_rejet;
        $demande_attente->update();
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
        $demande_attente = Demandepartenariat::first();
        $demande_attente->can_be_partner == 'OUI';
        $demande_attente->drive = $request->linkDriveModal;
        $demande_attente->update();
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
        return back()->with("success",  "Demande acceptée!");
    }

    // public function demande_attentes_save(Request $request)
    // {
    //   if ($request->can_be_partner != null) {
    //     if ($request->can_be_partner == 'NON') {
    //       $demande = DemandePartenariat::find($request->id);
    //       $data = [
    //         'motif' => $request->motif_rejet ??  '',
    //         'email' => $demande->email,
    //         'nom' => $demande->nom ?? '',
    //         'libelle_structure' => $demande->libelle_structure
    //       ];
    //       Mail::to($demande->email)->send(new SendMotif($data));
    //       DemandeRejete::create([
    //         'logo'  => $demande->logo,
    //         'structure'  => $demande->libelle_structure,
    //         'nom'  => $demande->nom,
    //         'contact'  => $demande->contact_tel,
    //         'email'  => $demande->email,
    //         'demand_partenariat_id' => $demande->id
    //       ]);
    //       $demande->delete();
    //       flash("Demande de partenariat refusée avec succès ! ");
    //       return redirect(Route('demande_attentes'));
    //     }
    //     $attribute['can_be_partner'] = $request->can_be_partner;
    //     try {
    //       $demande = DemandePartenariat::find($request->id);
    //       $data = [
    //         'drive' => $request->linkDriveModal ??  '',
    //         'email' => $demande->email ?? '',
    //         'nom' => $demande->nom ?? '',
    //         'libelle_structure' => $demande->libelle_structure
    //       ];

    // Mail::to($demande->emaill)->send(new SendDriveLink($data));
    // demande en attente approuvé vont dans Validation en cours pour attach de convention...
    //       DemandValidation::create(array_merge($demande->toArray(), ['demand_partenariat_id' => $demande->id, 'uuid' => Self::generateUuid()]));
    //       $demande->delete();
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
    //   if ($request->can_be_partner != null) {
    //     if ($request->can_be_partner == 'NON') {
    //       $demande = DemandePartenariat::find($request->id);
    //       $data = [
    //         'motif' => $request->motif_rejet ??  '',
    //         'email' => $demande->email,
    //         'nom' => $demande->nom ?? '',
    //         'libelle_structure' => $demande->libelle_structure
    //       ];
    //       Mail::to($demande->email)->send(new SendMotif($data));
    //       DemandeRejete::create([
    //         'logo'  => $demande->logo,
    //         'structure'  => $demande->libelle_structure,
    //         'nom'  => $demande->nom,
    //         'contact'  => $demande->contact_tel,
    //         'email'  => $demande->email,
    //         'demand_partenariat_id' => $demande->id
    //       ]);
    //       $demande->delete();
    //       flash("Demande de partenariat refusée avec succès ! ");
    //       return redirect(Route('demande_attentes'));
    //     }
    //     $attribute['can_be_partner'] = $request->can_be_partner;
    //     try {
    //       $demande = DemandePartenariat::find($request->id);
    //       $data = [
    //         'drive' => $request->linkDriveModal ??  '',
    //         'email' => $demande->email ?? '',
    //         'nom' => $demande->nom ?? '',
    //         'libelle_structure' => $demande->libelle_structure
    //       ];

    //       // Mail::to($demande->emaill)->send(new SendDriveLink($data));
    //       // demande en attente approuvé vont dans Validation en cours pour attach de convention...
    //       DemandValidation::create(array_merge($demande->toArray(), ['demand_partenariat_id' => $demande->id, 'uuid' => Self::generateUuid()]));
    //       $demande->delete();
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


}
