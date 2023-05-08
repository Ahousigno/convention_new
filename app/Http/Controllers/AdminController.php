<?php

namespace App\Http\Controllers;

use Laracasts\Flash\Flash;
use App\Models\Demandepartenariat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function edit_attente($id = null)
    {
        if ($id != null) {
            $data['demande_attente'] = DemandePartenariat::find($id);
            // $data['add_update'] = route('admin.demande_attentes_update', $id);
        }
        return view('admin.partenariat.edit_demande')->with($data);
    }

    //     public function be_partener(Request $request)
    //   {
    //     $this->validate(
    //       $request,
    //       [
    //         'be_partener' => 'required',
    //       ]
    //     );
    //     $attribute = [
    //       'be_partener' => trim($request->be_partener),
    //     ];
    //     DB::beginTransaction();
    //     try {
    //       $a = Partenaire::find($request->partenaire_id);
    //       $b = $a->update($attribute);
    //       DB::commit();
    //       flash('Opération effectuée avec succès !')->success();
    //       return redirect()->route('admin.partenaires');
    //     } catch (Exception $exception) {
    //       DB::rollBack();
    //       flash($exception->getMessage())->error();
    //       return redirect()->route('admin.partenaires');
    //     }


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
