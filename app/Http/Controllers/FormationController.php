<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \Inertia\Inertia::render('Formation/Liste',[
            'formations' => Formation::with('nature', 'salle', 'organisme')->paginate(4),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \Inertia\Inertia::render('Formation/Nouveau');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formation = new formation;
        $formation->code = $request->input('code');
        $formation->intitule = $request->input('intitule');
        $formation->nature_id = $request->input('nature');

        if($request->isAgent){
            $formation->agent_id = $request->input('agent');
        }
        else{
            $formation->organisme_id = $request->input('organisme');
        }

        $formation->lieu = $request->input('lieu');
        $formation->salle_id = $request->input('salle');
        $formation->date_debut = $request->input('date_debut');
        $formation->date_fin = $request->input('date_fin');
        $formation->heure_debut = $request->input('heure_debut');
        $formation->heure_fin = $request->input('heure_fin');
        $formation->description = $request->input('description');
        $formation->user_id = Auth::user()->id;

        $formation->save();

        return Redirect::route('formation.index');
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
        return \Inertia\Inertia::render('Formation/Edit',[
            'formation' => Formation::where('id', $id)->with('nature', 'salle', 'organisme')->first(),
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
        $formation = Formation::findOrFail($id);

        $formation->code = $request->input('code');
        $formation->intitule = $request->input('intitule');
        $formation->nature_id = $request->input('nature_id');

        if($request->isAgent){
            $formation->agent_id = $request->input('agent_id');
        }
        else{
            $formation->organisme_id = $request->input('organisme_id');
        }

        $formation->lieu = $request->input('lieu');
        $formation->salle_id = $request->input('salle_id');
        $formation->date_debut = $request->input('date_debut');
        $formation->date_fin = $request->input('date_fin');
        $formation->heure_debut = $request->input('heure_debut');
        $formation->heure_fin = $request->input('heure_fin');
        $formation->description = $request->input('description');
        $formation->user_id = Auth::user()->id;

        $formation->save();

        return Redirect::route('formation.index');
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
