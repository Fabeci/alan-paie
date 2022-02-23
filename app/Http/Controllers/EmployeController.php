<?php

namespace App\Http\Controllers;

use App\Models\Poste;
use App\Models\Profil;
use App\Models\Contrat;
use App\Models\Employe;
use App\Models\Retenue;
use App\Models\Service;
use App\Models\Avantage;
use App\Models\Nationalite;
use App\Models\Type_contrat;
use Illuminate\Http\Request;
use App\Models\Classification;
use Illuminate\Support\Facades\Redirect;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $employes = Employe::with("nationalite", "service", "entreprise", "contrats", "contrats.typeContrat","profil", "enfants")->get();

        return \Inertia\Inertia::render('Rh/Employe/Index',[
                'employes' => $employes,
        ]);

        // $nationalites = Nationalite::all();
        // $type_contrats = Type_contrat::all();
        // $services = Service::all();
        // $postes = Poste::all();
        // $classifications = Classification::all();
        // $profils = Profil::all();
        // $avantages = Avantage::all();
        // $employes = Employe::with('nationalite', 'service', 'profil', 'entreprise','contrats','contrats.type_contrat','contrats.avantages', 'contrats.poste')->paginate(8);

        // return \Inertia\Inertia::render('RH/Employe/Liste',[
        //     'nationalites' => $nationalites,
        //     'type_contrats' => $type_contrats,
        //     'services' => $services,
        //     'postes' => $postes,
        //     'classifications' => $classifications,
        //     'profils' => $profils,
        //     'avantages' => $avantages,
        //     'employes' => $employes
        // ]);
        return \Inertia\Inertia::render('Rh/Employe/Index');
    }

    public function listeTableau()
    {   
        $employes = Employe::with("nationalite", "service", "entreprise", "contrats", "contrats.typeContrat","profil", "enfants")->paginate(10);

        return \Inertia\Inertia::render('Rh/Employe/Index2',[
                'employes' => $employes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nationalites = Nationalite::all();
        $type_contrats = Type_contrat::all();
        $services = Service::all();
        $postes = Poste::all();
        $classifications = Classification::all();
        $profils = Profil::all();
        $avantages = Avantage::all();
        $employes = Employe::all();
        $retenues = Retenue::all();

        return \Inertia\Inertia::render('RH/Employe/Nouveau',[
            'nationalites' => $nationalites,
            'type_contrats' => $type_contrats,
            'services' => $services,
            'postes' => $postes,
            'classifications' => $classifications,
            'profils' => $profils,
            'avantages' => $avantages,
            'employes' => $employes,
            'retenues' => $retenues,
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
        $employe->matri_emp = 'MAT-0001';
        $employe->nom_emp = $request->input('nom_emp');
        $employe->prenom_emp = $request->input('prenom_emp');
        $employe->sexe_emp = $request->input('sexe_emp');
        $employe->email = $request->input('email');
        $employe->password = $request->input('password');
        $employe->password_conf = $request->input('password_conf');
        $employe->datenaiss_emp = $request->input('datenaiss_emp');
        $employe->telephone_emp = $request->input('telephone_emp');
        $employe->service_id = $request->input('service');
        $employe->nif_emp = $request->input('nif_emp');
        $employe->bp_emp = $request->input('bp_emp');
        $employe->nationalite_id = $request->input('nationalite_emp');
        $employe->ville_emp = $request->input('ville_emp');
        $employe->quartier_emp = $request->input('quartier_emp');
        $employe->situation_emp = $request->input('situation_emp');
        $employe->entreprise_id = 1;
        $employe->profil_id = 1;


        if(in_array($request->input('situation_emp'), [2,3])){
            $employe->nom_conj = $request->input('nom_conj');
            $employe->prenom_conj = $request->input('prenom_conj');
            $employe->nif_conj = $request->input('nif_conj');
            $employe->datenaiss_conj = $request->input('datenaiss_conj');
            $employe->telephone_conj = $request->input('telephone_conj');
            $employe->profession_conj = $request->input('profession_conj');
            $employe->ville_conj = $request->input('ville_conj');
            $employe->bp_conj = $request->input('bp_conj');
            $employe->is_deceased = $request->input('is_deceased');

            if($request->input('is_deceased')){
                $employe->date_deces_conj = $request->input('datedeath');
            }

        }
        
        $employe->save();

        foreach($request->input('retenues') as $retenue){
            if(!is_null($retenue['libelle'])){
                
                if($retenue['fixed_or_percentage']){
                    $employe->retenues()->attach([$retenue['libelle'] => ['valeur_salariale' => $retenue['value'], 'matricule' => $retenue['matricule']]]);
                }else{
                    $employe->retenues()->attach([$retenue['libelle'] => ['taux_salarial' => $retenue['value'], 'matricule' => $retenue['matricule']]]);
                }
            }
        }

        $contrat = new Contrat;
        $contrat->libelle = $request->input('contrat');
        $contrat->type_contrat_id = $request->input('type_contrat');
        $contrat->classification_id = $request->input('classification_emp');
        $contrat->poste_id = $request->input('poste');
        $contrat->date_debut = $request->input('date_debut');
        $contrat->date_fin = $request->input('date_fin');
        $contrat->cessation = $request->input('cessation');
        $contrat->salaire_base = $request->input('salaire_base');
        $contrat->employe_id = $employe->id;

        $contrat->save();

        foreach($request->input('avantages') as $avantage){

            if(!is_null($avantage['libelle'])){
                if($avantage['fixed_or_percentage']){
                    $contrat->avantages()->attach([$avantage['libelle'] => ['valeur' => $avantage['value']]]);
                }else{
                    $contrat->avantages()->attach([$avantage['libelle'] => ['taux' => $avantage['value']]]);
                }
            }
        }

        return Redirect::route('employe.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employe $employe)
    {
        $employe = Employe::with('nationalite', 'service', 'service.postes', 'entreprise', 'profil','enfants', 'contrats.classification', 'contrats.poste', 'contrats', 'contrats.avantages', 'contrats.typeContrat')->findOrFail($employe->id);
        // dd($employe);
        return \Inertia\Inertia::render('Rh/Employe/Show',[
            'employe' => $employe,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nationalites = Nationalite::all();
        $type_contrats = Type_contrat::all();
        $services = Service::all();
        $postes = Poste::all();
        $classifications = Classification::all();
        $profils = Profil::all();
        $avantages = Avantage::all();

        return \Inertia\Inertia::render('RH/Employe/Modifier',[
            'nationalites' => $nationalites,
            'type_contrats' => $type_contrats,
            'services' => $services,
            'postes' => $postes,
            'classifications' => $classifications,
            'profils' => $profils,
            'avantages' => $avantages,
            'employe' => Employe::where('id', $id)->with('nationalite', 'service', 'profil', 'entreprise','contrats','contrats.type_contrat','contrats.avantages', 'contrats.poste')->first(),
        ]);
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

    public function getServiceAndPoste($id){
        dd("okkk");
    }
}
