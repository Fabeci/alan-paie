<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\PreavisRetraite;
use Illuminate\Http\Request;

class RetraiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \Inertia\Inertia::render('Rh/Rupture/Retraite/Index', [
            'preavisRetraites' => PreavisRetraite::with('employe')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \Inertia\Inertia::render('Rh/Rupture/Retraite/Create', [
            'collaborateurs' => Employe::all(),
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
        // dd($request->all());
        $preavisRetraite = new PreavisRetraite;

        $preavisRetraite->age_limite = 60;
        $preavisRetraite->date_debut = $request->input('dateDebut');
        $preavisRetraite->date_fin = $request->input('dateFin');
        $preavisRetraite->employe_id = $request->input('collaborateur');
        $preavisRetraite->save();

        return \Inertia\Inertia::render('Rh/Rupture/Retraite/Index');
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

    public function preview($id)
    {
        $preavisRetraite = PreavisRetraite::where('id', $id)->with('employe')->first();

        return view('ruptures.preavisRetraite.pdf.preview', compact('preavisRetraite'));
    }
}
