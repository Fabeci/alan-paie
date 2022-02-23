<?php

namespace App\Http\Controllers;

use App\Models\Poste;
use App\Models\Employe;
use App\Models\Service;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Discipline;
use Illuminate\Http\Request;
use App\Models\Avertissement;

class AvertissementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $avertissements = Avertissement::with('discipline', 'discipline.employe')->paginate(5);

        return \Inertia\Inertia::render('Rh/Discipline/Avertissement/Index', [
            'avertissements' => $avertissements
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \Inertia\Inertia::render('Rh/Discipline/Avertissement/Create', [
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
        $avertissement = new Avertissement;

        // dd($request->file('fichier'));
        $avertissement->save();

        $discipline = new Discipline([
            "motif" => $request->input('motif'),
            "employe_id" => $request->input('collaborateur'),
            "service_id" => $request->input('service'),
            "poste_id" => $request->input('poste'),
        ]);

        $avertissement->disciplines()->save($discipline);

        return redirect()->route('avertissement.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $avertissement = Avertissement::where('id', $id)->with('discipline', 'discipline.employe', 'disciplines.service', 'disciplines.poste', 'disciplines.service.employe')->first();
        return \Inertia\Inertia::render('Rh/Discipline/Avertissement/Show', [
            'avertissement' => $avertissement
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

    public function preview($id)
    {
        $avertissement = Avertissement::where('id', $id)->with('discipline', 'discipline.employe', 'discipline.employe.nationalite', 'discipline.service', 'discipline.poste', 'discipline.service.employe')->first();
        return view('avertissements.pdf.preview', compact('avertissement'));
    }

    public function generatePDF($id)
    {
        $avertissement = Avertissement::where('id', $id)->with('discipline', 'discipline.employe', 'discipline.service', 'discipline.poste', 'discipline.service.employe')->first();

        // dd($avertissement);

        $pdf = PDF::loadView('avertissements.pdf.preview', $avertissement);    
        return $pdf->download('avertissement.pdf');
    }
}
