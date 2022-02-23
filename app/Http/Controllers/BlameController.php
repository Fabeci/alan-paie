<?php

namespace App\Http\Controllers;

use App\Models\Blame;
use App\Models\Poste;
use App\Models\Employe;
use App\Models\Service;
use App\Models\Discipline;
use Illuminate\Http\Request;
use App\Models\Avertissement;

class BlameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blames = Blame::with('discipline', 'discipline.employe')->paginate(5);

        return \Inertia\Inertia::render('Rh/Discipline/Blame/Index', [
            'blames' => $blames
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \Inertia\Inertia::render('Rh/Discipline/Blame/Create', [
            'collaborateurs' => Employe::all(),
            'services' => Service::all(),
            'postes' => Poste::all()
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
        $blame = new Blame;

        $blame->save();

        $discipline = new Discipline([
            "motif" => $request->input('motif'),
            "employe_id" => $request->input('collaborateur'),
            "service_id" => $request->input('service'),
            "poste_id" => $request->input('poste'),
            "fichier" => $request->file('fichier') ? $request->file('fichier')->store('fichier_discipline', 'public') : Null
        ]);

        $blame->disciplines()->save($discipline);

        return redirect()->route('blame.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blames = Blame::where('id', $id)->with('discipline', 'discipline.employe', 'disciplines.service', 'disciplines.poste')->first();
        return \Inertia\Inertia::render('Rh/Discipline/Blame/Show', [
            'blames' => $blames
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
