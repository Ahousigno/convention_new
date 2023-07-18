<?php

namespace App\Http\Controllers;

use App\Mail\SendDriveMail;
use App\Mail\SendMotifMail;
use App\Models\Article;
use App\Models\Categorie;
use Laracasts\Flash\Flash;
use App\Models\Demandepartenariat;
use App\Models\Validation;
use Exception;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

class AdminController extends Controller
{
    public function index()
    {
        $data['demande_attente'] = Demandepartenariat::all();

        return view('admin.dashboard')->with($data);
    }

    public function demande_attente()
    {
        $partenariats = Demandepartenariat::paginate('10')->where('can_be_partner', null)->sortByDesc('created_at')->all();
        return view('admin.partenariat.demande_attente', compact('partenariats'));
    }

    public function edit_attente($id)
    {
        $partenariat = DemandePartenariat::find($id);
        return view('admin.partenariat.edit_demande', compact('partenariat'));
    }

    public function edit_update(Request $request)
    {
        if ($request->can_be_partner == 'NON') {
            $demande = Demandepartenariat::find($request->id);
            $demande->reject = 1;
            $demande->motif = $request->motif;
            Mail::send(new SendMotifMail($request->all()));
            $demande->update();
            return back()->with('success', "Demande de rejet a bien été transmi");
        }
        $request->validate([
            'nom' => 'required',
            'prenoms' => 'required',
            'email' => 'required',
            'contact_tel' => 'required',
            'libelle_structure' => 'required',
            'logo' => 'nullable',
            'situation_geo' => 'required',
            'motif' => 'required',
            'exemple_convention' => 'nullable',
        ]);
        $partenariat = Demandepartenariat::find($request->id);
        $partenariat->nom = $request->nom;
        $partenariat->email = $request->email;
        $partenariat->prenoms = $request->prenoms;
        $partenariat->contact_tel = $request->contact_tel;
        $partenariat->drive = $request->drive;
        $partenariat->can_be_partner = $request->can_be_partner;
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
        $partenariat->update();

        Mail::send(new SendDriveMail($request->all()));

        return back()->with("success", "lien du drive à bien été envoyé !");
    }
    public function demande_attente_delete(Demandepartenariat $partenariat)
    {
        $partenariat->delete();
        return view('admin.partenariat.demande_attente');
    }

    public function motif_modal(Request $request)
    {

        $this->validate($request, [
            'motif_rejet' => ['required', 'max:600']
        ]);
        $partenariat = Demandepartenariat::first();
        // $partenariat->can_be_partner == 'NON';
        $partenariat->motif_rejet = $request->motif_rejet;

        $recipient = [$partenariat->email]; //Emails des destinataires
        $mail_data = [
            'recipient' => $recipient, //Emails des autres services et du postulant de l'évènement
            'fromEmail' => Auth::user()['email'],
            'fromName' => Auth::user()['name'] . ' ' . Auth::user()['pname'],
            "subject" => "Validation de partenariat",
            "motifRejet" => $request->motif_rejet,
        ];
        Mail::send('email.rejet', $mail_data, function ($message) use ($mail_data) {
            $message->to($mail_data['recipient'])
                ->from($mail_data['fromEmail'], $mail_data['fromName'])
                ->subject($mail_data['subject']);
        });
        $partenariat->update();
        return back()->with("success",  "Demande rejetée!");
    }

    public function drive_modal(Request $request)
    {
        $this->validate($request, [
            'drive' => ['required', 'max:600']
        ]);
        $partenariat = Demandepartenariat::first();
        $partenariat->can_be_partner == 'OUI';
        $partenariat->drive = $request->drive;

        $recipient = [$partenariat->email]; //Emails des destinataires
        $mail_data = [
            'recipient' => $recipient, //
            'fromEmail' => Auth::user()['email'],
            'fromName' => Auth::user()['name'] . ' ' . Auth::user()['pname'],
            "subject" => "Validation de partenariat",
            "motifvalide" => $request->drive,
        ];
        Mail::send('email.valide', $mail_data, function ($message) use ($mail_data) {
            $message->to($mail_data['recipient'])
                ->from($mail_data['fromEmail'], $mail_data['fromName'])
                ->subject($mail_data['subject']);
        });

        $partenariat->update();
        return view('admin.validation.encours')->with("success", "demande acceptée!");
    }
    //partie validation
    public function validation_encours()
    {
        $categories = Categorie::all();
        $partenaires = DB::table('demandepartenariats')->select('*')
            ->where('can_be_partner', 'OUI')
            ->where('drive', '!=', null)
            ->orderBy('created_at', 'desc')
            ->paginate('10');
        return view('admin.validation.encours', compact('partenaires', 'categories'));
    }

    public function validation_store(Request $request)
    {

        $request->validate([
            'nom_convention' => ['required'],
            'categorie_id' => 'required',
            'date_debut' => ['required'],
            'date_fin' => ['required'],
            'file_convention' => ['required'],
            'image_convention' => ['required'],
        ]);
        $partenaire = new Validation();
        $partenaire->nom_convention = $request->nom_convention;
        $partenaire->date_debut = $request->date_debut;
        $partenaire->date_fin = $request->date_fin;
        if ($request->file_convention) {
            $doc_lm = $request->file_convention;
            $lm_name = time() . '.' . $doc_lm->getClientOriginalName();
            $doc_lm->move(public_path("docs/images/lms"), $lm_name);
            $partenaire->file_convention = $lm_name;
        }

        if ($request->image_convention) {
            $doc_lm = $request->image_convention;
            $lm_name = time() . '.' . $doc_lm->getClientOriginalName();
            $doc_lm->move(public_path("docs/images/lms"), $lm_name);
            $partenaire->image_convention = $lm_name;
        }
        $partenaire->save();
        return redirect()->route("admin.validation.partenaire")->with("partenariat confirmé!");
    }

    public function partenaire()
    {
        $validations = DB::table('validations')->select('*')
            ->where('validated', '1')
            ->orderBy('created_at', 'desc')
            ->paginate('10');
        return view('admin.validation.partenaire', compact('validations'));
    }


    //categorie

    public function categorie()
    {
        $categories = DB::table('categories')->select('*')
            ->orderBy('created_at', 'desc')
            ->paginate('10');
        return view('admin.categorie.create', compact('categories'));
    }

    public function categorie_save(Request $request)
    {
        $request->validate([
            'libelle_categorie' => ['required'],
        ]);
        $categorie =  new Categorie();
        $categorie->libelle_categorie = $request->libelle_categorie;
        $categorie->save();
        return view('admin.categorie.create')->with("success", "categorie enregistrée");
    }

    public function categorie_edit($id = null)
    {
        $categorie = null;
        if ($id == null) {
            $categorie = new categorie();
        } else {
            $categorie = Categorie::find($id);
        }
        return view('admin.categorie.edit', compact('categorie'));
    }
    public function categorie_update(Request $request)
    {
        $request->validate([
            'libelle_categorie' => ['required'],
        ]);
        if ($request->id) {
            $categorie = Categorie::find($request->id);
            $categorie->libelle_categorie = $request->libelle_categorie;
            $categorie->update();
            return view('admin.categorie.edit', compact('categorie'))->with("success", "catégorie bien modifié");
        }
        $categorie = Categorie::create($request->all());
        return redirect(route('admin.categorie.create'))->with("success", "Categorie bien créer");
    }

    public function categorie_delete(Request $request)
    {
        $categorie = Categorie::find($request->id);
        Categorie::destroy($categorie->id);
        $categorie->save();
        return back()->with("success",  "categorie supprimée avec succès!");
    }


    //articles

    public function article_base()
    {
        $articles = DB::table('articles')->select('*')
            ->orderBy('created_at', 'desc')
            ->paginate('10');
        return view('admin.article.base', compact('articles'));
    }
    public function article_add()
    {
        return view('admin.article.add');
    }

    public function article_save(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'ordre' => ['required'],
            'article' => ['required'],
        ]);
        $article =  new Article();
        $article->name = $request->name;
        $article->ordre = $request->ordre;
        $article->article = $request->article;
        $article->save();
        return view('admin.article.base')->with("success", "article ajouté");
    }

    public function article_edit($id)
    {
        $article = Article::find($id);
        return view('admin.article.base', compact('article'));
    }
    public function article_update(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'ordre' => ['required'],
            'article' => ['required'],
        ]);
        $article =  new Article();
        $article->name = $request->name;
        $article->ordre = $request->ordre;
        $article->article = $request->article;
        $article->update();
        return view('admin.article.base')->with("success", "article mis à jour");
    }

    public function article_delete(Article $article)
    {

        $article->delete();

        return back()->with("success",  "article supprimé avec succès!");
    }
}