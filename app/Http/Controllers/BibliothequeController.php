<?php

namespace App\Http\Controllers;

use App\Models\Avantage;
use App\Models\Classification;
use App\Models\Nationalite;
use App\Models\TypeContrat;
use Illuminate\Http\Request;

class BibliothequeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $avantages = Avantage::with('typeAvantage')->get()->groupBy('typeAvantage.libelle');
        $classifications = Classification::with('typeClassification')->get();
        // $avantages = Avantage::with('typeAvantage')->get();
        $nationalites = Nationalite::all();
        $typeContrats = TypeContrat::all();
        
        return \Inertia\Inertia::render('Bibliotheque/Index', [
           'avantages' => $avantages,
           'classifications' => $classifications,
           'typeContrats' => $typeContrats,
           'nationalites' => $nationalites
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
