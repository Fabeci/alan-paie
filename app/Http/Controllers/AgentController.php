<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \Inertia\Inertia::render('Agent/Liste',[
            'agents' => Agent::with('fonction', 'college', 'departement', 'departement.direction', 'departement.direction.division')->paginate(4),
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

        return Redirect::route('agent.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return \Inertia\Inertia::render('Agent/Edit',[
            'agent' => Agent::where('id', $id)->with('fonction', 'college', 'departement', 'departement.direction', 'departement.direction.division')->first(),
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
    
        $agent = Agent::findOrFail($id);

        $agent->matricule = $request->input('matricule');
        $agent->nom = $request->input('nom');
        $agent->prenom = $request->input('prenom');
        $agent->email = $request->input('email');
        $agent->fonction_id = $request->input('fonction_id');
        $agent->departement_id = $request->input('departement_id');
        $agent->college_id = $request->input('college_id');

        $agent->save();

        return Redirect::route('agent.index');
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
