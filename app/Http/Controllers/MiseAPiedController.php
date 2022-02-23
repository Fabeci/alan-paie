<?php

namespace App\Http\Controllers;

use App\Models\Poste;
use App\Models\Employe;
use App\Models\Service;
use App\Models\MiseAPied;
use App\Models\Discipline;
use Illuminate\Http\Request;

class MiseAPiedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $miseAPieds = MiseAPied::with('discipline', 'discipline.employe')->paginate(5);

        return \Inertia\Inertia::render('Rh/Discipline/MiseAPied/Index', [
            'miseAPieds' => $miseAPieds
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \Inertia\Inertia::render('Rh/Discipline/MiseAPied/Create', [
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
        $miseApied = new MiseAPied;
        $miseApied->date_effet = $request->input('datePriseEffet');
        $miseApied->date_reprise = $request->input('dateReprise');
        $miseApied->duree = $miseApied->NumberDays($request->input('datePriseEffet'), $request->input('dateReprise'));

        $miseApied->save();

        $discipline = new Discipline([
            "motif" => $request->input('motif'),
            "employe_id" => $request->input('collaborateur'),
            "service_id" => $request->input('service'),
            "poste_id" => $request->input('poste'),
            "fichier" => $request->file('fichier') ? $request->file('fichier')->store('fichier_discipline', 'public') : Null
        ]);

        $miseApied->disciplines()->save($discipline);

        return redirect()->route('mise-a-pied.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $miseAPieds = MiseAPied::where('id', $id)->with('discipline', 'discipline.employe', 'disciplines.service', 'disciplines.poste')->first();
        return \Inertia\Inertia::render('Rh/Discipline/MiseAPied/Show', [
            'miseAPieds' => $miseAPieds
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
