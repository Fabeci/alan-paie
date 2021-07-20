<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Avantage;
use App\Models\City;
use App\Models\User;
use App\Models\Poste;
use App\Models\Profil;
use App\Models\Employe;
use App\Models\Dirigeant;
use App\Models\Nationalite;
use App\Models\TypeContrat;
use Illuminate\Http\Request;
use App\Models\Classification;
use App\Models\Contrat;
use App\Models\Enfant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ContratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeContrat = TypeContrat::find(TypeContrat::first()->id);
        $articleTypeContrats = $typeContrat->articles;

        return \Inertia\Inertia::render('Rh/Contrat/Create', [
            "avantages_nature" => Avantage::with('typeAvantage')->where('type_avantage_id', 1)->get(),
            "avantages_numeraire" => Avantage::with('typeAvantage')->where('type_avantage_id', 2)->get(),
            "nationalites" => Nationalite::all(),
            "typeContrats" => TypeContrat::all(),
            "articleTypeContrats" => $articleTypeContrats,
            "postes" => Poste::all(),
            "classifications" => Classification::all(),
            "profils" => Profil::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employe = new Employe;

        // dd($request->all());

        $employes = $employe->orderBy('id', 'desc')->first();

        // dd($employes);

        empty($employes) ? $id = 1 : $id = $employes->id + 1;

        $matri_emp = Employe::getMatricule($id);
        
        empty($request->file('photo_emp')) ? $photo = 'images_profils/avatar-male.png' : $photo = $request->file('photo_emp')->store('images_profils', 'public');
        empty($request->file('signature_emp')) ? $signature = 'images_profils/avatar-male.png' : $signature = $request->file('signature_emp')->store('images_signatures', 'public');
        empty($request->file('initiales_emp')) ? $initiales = 'images_profils/avatar-male.png' : $initiales = $request->file('initiales_emp')->store('images_initiales', 'public');
        // $request->file('signature')->store('images_signatures', 'public')
        $employe->matri_emp = $matri_emp;
        $employe->nom_emp = $request->input('nom_emp');
        $employe->prenom_emp = $request->input('prenom_emp');
        $employe->sexe_emp = $request->input('sexe_emp');
        $employe->email = $request->input('email_emp'); 
        $employe->password = Hash::make('password');
        $employe->password_conf = Hash::make('password');
        $employe->datenaiss_emp = $request->input('datenaiss_emp');
        $employe->telephone_emp = $request->input('telephone_emp');
        $employe->nif_emp = $request->input('nif_emp');
        $employe->bp_emp = $request->input('bp_emp');
        $employe->ville_emp = $request->input('ville_emp');
        $employe->photo_emp = $photo;
        $employe->situation_emp = $request->input('situation_emp');
        $employe->initiales_emp = $initiales;
        $employe->signature_emp = $signature;
        $employe->nb_enfant = $request->input('nb_enfant');
        $employe->date_deces_conj = $request->input('date_deces_conj');
        $employe->entreprise_id = 1;
        $employe->profil_id = $request->input('profil');
        $employe->service_id = 1;
        $employe->nationalite_id = $request->input('nationalite_emp');

        // dd($employe);
        $employe->save();

        $user = new User([
            "nom" => $request->input('prenom_emp'),
            "prenom" => $request->input('prenom_emp'),
            "email" => $request->input('email_emp'),
            "password" => Hash::make('password'),
            "profile_photo_path" => $photo,
            "profil_id" => $request->input('profil'),
            "entreprise_id" =>Auth()->user()->entreprise_id,
        ]);

        $employe->users()->save($user);

        $contrat = new Contrat;
        
        $contrat->libelle = $request->input('contrat');
        $contrat->date_debut = $request->input('date_debut');
        $contrat->date_fin = $request->input('date_fin');
        $contrat->cessation = $request->input('cessation');
        $contrat->salaire_base = $request->input('salaire_base'); 
        $contrat->fichier = $request->input('fichier');
        $contrat->type_contrat_id = $request->input('type_contrat');
        $contrat->classification_id = $request->input('classification_emp');
        $contrat->poste_id = $request->input('poste');
        $contrat->employe_id = $employe->id;
        
        $contrat->save();

        $typeContrat = TypeContrat::find($request->input('type_contrat'));

        $typeContrat->articles()->detach();

        foreach($request->articles as $article){
            if(! $article['id']){
                $newArt = Article::create(['titre' => $article['titre']]);
                $typeContrat->articles()->attach(array($newArt->id => array('position' => $article['position'], 'contenu' => $article['contenu'])));
            }else{
                $typeContrat->articles()->attach(array($article['id'] => array('position' => $article['position'], 'contenu' => $article['contenu'])));
            }
              
        }

        // dd($contrat);

        $contrat->avantages()->detach();

        foreach($request->input('avantages_nature') as $avantage_nature){

            if(! is_null($avantage_nature['libelle']) && $avantage_nature['value'] != 0){
                $contrat->avantages()->attach([$avantage_nature['libelle'] => ['valeur' => $avantage_nature['value']]]);
            }
        }

        foreach($request->input('avantages_numeraire') as $avantage_numeraire){

            if(! is_null($avantage_numeraire['libelle']) && $avantage_numeraire['value'] != 0){
                $contrat->avantages()->attach([$avantage_numeraire['libelle'] => ['valeur' => $avantage_numeraire['value']]]);
            }
        }


        foreach($request->input('enfants') as $enfant){
                
            if(! is_null($enfant['datenaiss_enfant'])){
                $newEnfant = new Enfant;
                $newEnfant->nom_enfant = $enfant['nom_enfant'];
                $newEnfant->prenom_enfant = $enfant['prenom_enfant'];
                $newEnfant->datenaiss_enfant = $enfant['datenaiss_enfant'];
                $newEnfant->employe_id = $employe->id;
                $newEnfant->save();
            }
        }

        return redirect()->route('contrat.create');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function articleParTypeContrat($id){

        $typeContrat = TypeContrat::find($id);
        $articleTypeContrats = $typeContrat->articles;

        return response()->json([
            "nationalites" => Nationalite::all(),
            "typeContrats" => TypeContrat::all(),
            "articleTypeContrats" => $articleTypeContrats,
            "postes" => Poste::all(),
            "classifications" => Classification::all(),
        ]);
    }
}
