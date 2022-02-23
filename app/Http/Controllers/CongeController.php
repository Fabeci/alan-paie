<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Conge;
use App\Models\Employe;
use App\Models\TypeConge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CongeController extends Controller
{
    public function index()
    {
        
        return \Inertia\Inertia::render('Rh/Conge/Index', [
            'users' => User::all(),
            'employes' => Employe::all(),
            'conges' => Conge::with('users', 'user', 'employe', 'type_conge')->paginate(10)
        ]);
    }

    public function create()
    {
        return \Inertia\Inertia::render('Rh/Conge/Create', [
            'users' => User::all(),
            'employes' => Employe::all(),
            'typeConges' => TypeConge::all()
        ]);
    }

    public function store(Request $request)
    {
        $conge = new Conge;

        // dd($request->input('date_debut'));
        $duree = $conge->NumberDaysWithoutWeek($request->input('date_debut'), $request->input('date_fin'));

        $conge->date_debut = $request->input('date_debut');
        $conge->date_fin = $request->input('date_fin');
        $conge->duree = $duree;
        $conge->statut = "En attente";
        $conge->fichier = empty($request->file('fichier')) ? null : $request->file('fichier')->store('fichiers_conges', 'public');
        
        $conge->type_conge_id = $request->input('type_conge');
        $conge->user_id = Auth()->User()->id;
        $conge->description = $request->input('description');
        
        $conge->save();

        $conge->users()->detach();

        foreach($request->input('approbateurs') as $approbateur){
            $conge->users()->attach($approbateur);
        }

        return redirect()->route('conge.create');
    }

    public function edit($id)
    {
        // dd($id);
        // dd();
        return \Inertia\Inertia::render('Rh/Conge/Edit', [
            'users' => User::all(),
            'employes' => Employe::all(),
            'typeConges' => TypeConge::all(),
            'conge' => conge::with('type_conge', 'employe', 'users')->findOrFail($id)
        ]);
    }

    public function update(Conge $conge, Request $request)
    {

        $conge->date_debut = $request->input('date_debut');
        $conge->date_fin = $request->input('date_fin');
        $conge->statut = "En attente";
        $conge->fichier = empty($request->file('fichier')) ? $conge->fichier : $request->file('fichier')->store('fichiers_conges', 'public');
        
        $conge->type_conge_id = empty($request->input('type_conge')) ? $conge->type_conge_id : $request->input('type_conge');
        $conge->user_id = Auth()->User()->id;
        $conge->description = $request->input('description');

        $conge->save();

        $conge->users()->detach();

        foreach($request->input('approbateurs') as $approbateur){
            $conge->users()->attach($approbateur);
        }

        return response()->json([
            'users' => User::all(),
            'employes' => Employe::all(),
            'typeConges' => TypeConge::all()
        ]);
    }

    public function show($id){
        dd("show");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
        $conge = Conge::findOrFail($id);

        $conge->delete();

        return redirect()->route('conge.index');
    }
}
