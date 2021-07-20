<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgentController extends Controller
{
    /*
     INSERT INTO `colleges` (`id`, `libelle`, `description`, `created_at`, `updated_at`) 
		VALUES (NULL, 'Agent d\'exécution 1', NULL, NULL, NULL), 
      (NULL, 'Agent d\'exécution 2', NULL, NULL, NULL),
      (NULL, 'Agent de maîtrise', NULL, NULL, NULL);
      
      
      INSERT INTO `fonctions` (`id`, `libelle`, `description`, `created_at`, `updated_at`) 
      VALUES (NULL, 'Développeur', NULL, NULL, NULL), 
      (NULL, 'Technicien Electricité', NULL, NULL, NULL);
      
      INSERT INTO `divisions` (`id`, `nom`, `description`, `created_at`, `updated_at`) 
      VALUES (NULL, 'Division 1', NULL, NULL, NULL), 
      (NULL, 'Division 2', NULL, NULL, NULL);
      
      INSERT INTO `directions` (`id`, `nom`, `description`, `created_at`, `updated_at`, `division_id`) 
      VALUES (NULL, 'DRH', NULL, NULL, NULL, '1'), 
      (NULL, 'Direction Générale', NULL, NULL, NULL, '2');
      
      
      INSERT INTO `departements` (`id`, `libelle`, `description`, `created_at`, `updated_at`, `direction_id`) 
      VALUES (NULL, 'Informatique', NULL, NULL, NULL, '1'), 
      (NULL, 'Ressources Humaines', NULL, NULL, NULL, '2');
      
      INSERT INTO `salles` (`id`, `nom`, `description`, `created_at`, `updated_at`) 
      VALUES (NULL, 'INFO 1', NULL, NULL, NULL), (NULL, 'INFO 2', NULL, NULL, NULL);
      
      INSERT INTO `natures` (`id`, `libelle`, `description`, `created_at`, `updated_at`) 
      VALUES (NULL, 'Production et transport d\'électricité', NULL, NULL, NULL), 
      (NULL, 'Distribution électricité', NULL, NULL, NULL);
      
      INSERT INTO `organismes` (`id`, `nom`, `description`, `created_at`, `updated_at`) 
      VALUES (NULL, 'PNUD', NULL, NULL, NULL), 
      (NULL, 'FONTECSYS', NULL, NULL, NULL);
      */
    
    public function index()
    {
        return \Inertia\Inertia::render('Agent/Liste',[
            'agents' => Agent::with('fonction', 'college', 'departement', 'departement.division', 'departement.division.direction')->paginate(4),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \Inertia\Inertia::render('Agent/Nouveau');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $agent = new Agent;
        $agent->matricule = $request->input('matricule');
        $agent->nom = $request->input('nom');
        $agent->prenom = $request->input('prenom');
        $agent->email = $request->input('email');
        $agent->fonction_id = $request->input('fonction');
        $agent->departement_id = $request->input('departement');
        $agent->college_id = $request->input('college');

        $agent->save();

        return \Inertia\Inertia::render('Agent/Liste');
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
        $agent = Agent::findOrFail($id);

        return \Inertia\Inertia::render('Agent/Edit',[
            'agent' => $agent->with('fonction', 'college', 'departement', 'departement.division', 'departement.division.direction')->paginate(),
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
}
