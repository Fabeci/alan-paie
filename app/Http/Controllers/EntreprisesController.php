<?php

namespace App\Http\Controllers;

use App\Models\Pays;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Dirigeant;
use App\Models\Entreprise;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\FormeJuridique;
use App\Models\SecteurActivite;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\EntrepriseRequest;
use App\Models\City;
use App\Models\Country;
use Illuminate\Support\Facades\Validator;

class EntreprisesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Inertia::render('Societe/Nouveau');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $secteurActivites = SecteurActivite::all();
        $formeJuridiques = FormeJuridique::all();
        $countries =  Country::all();
        
        return Inertia::render('Societe/Nouveau',[
            'secteurActivites' => $secteurActivites,
            'formeJuridiques' => $formeJuridiques,
            'countries' => $countries,
            'cities' => [],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EntrepriseRequest $request)
    {

        $entreprise = new Entreprise;

        $dirigeant = new Dirigeant;

        $dirigeant->nom = $request->input('nom_dirigeant');
        $dirigeant->prenom = $request->input('prenom_dirigeant');
        $dirigeant->sexe = $request->input('sexe_dirigeant');
        $dirigeant->datenaiss = $request->input('datenaiss_dirigeant');
        $dirigeant->signature = $request->file('signature') ? $request->file('signature')->store('images_signatures', 'public') : 'template/vendors/images/default.png';
        $dirigeant->initiales = $request->file('initiales') ? $request->file('initiales')->store('images_initiales', 'public') : 'template/vendors/images/default.png';

        $dirigeant->save();

        $entreprise->nom_commercial = $request->input('nom_commercial');
        $entreprise->activite = $request->input('activite');
        $entreprise->forme_juridique_id = $request->input('forme_juridique');
        $entreprise->numero_identification = $request->input('numero_identification');
        $entreprise->date_creation = $request->input('date_creation');
        $entreprise->ville = $request->input('ville');
        $entreprise->country_id = $request->input('pays');
        $entreprise->complement = $request->input('complement');
        $entreprise->bp = $request->input('bp');
        $entreprise->email = $request->input('email');
        $entreprise->telephone = $request->input('telephone');
        $entreprise->secteur_activite_id = $request->input('secteur_activite');
        $entreprise->facebook = $request->input('facebook');
        $entreprise->linkedin = $request->input('linkedin');
        $entreprise->youtube = $request->input('youtube');
        $entreprise->instagram = $request->input('instagram');
        $entreprise->twitter = $request->input('twitter');
        $entreprise->telegram = $request->input('telegram');
        $entreprise->logo = $request->file('logo') ? $request->file('logo')->store('images_logos', 'public') : 'template/vendors/images/default.png';
        $entreprise->dirigeant_id = $dirigeant->id;

        $entreprise->save();
        
        $password = Str::random(10);

        $user = new User([
            "nom" => $request->input('nom_dirigeant'),
            "prenom" => $request->input('prenom_dirigeant'),
            "email" => $request->input('email'),
            "password" => Hash::make('password'),
            "profile_photo_path" => $request->file('logo') ? $request->file('logo')->store('images_profils', 'public') : 'template/vendors/images/default.png',
            "profil_id" => 2,
            "entreprise_id" => $entreprise->id,
        ]);

        $dirigeant->users()->save($user);

        
        return Inertia::render('Societe/Nouveau',[
            'password' => 'password',
        ]);


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
}
