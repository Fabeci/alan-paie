<?php

namespace App\Http\Controllers;

use App\Models\Dirigeant;
use App\Models\Employe;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function preview(Request $request)
    {
        $user = Auth()->user();

        $dirigeant_id = $user->userable_id;
        // $entreprise_id = $user->entreprise_id;

        $dirigeant = Dirigeant::findOrFail($dirigeant_id)->first();

        // dd($dirigeant->signature);


        // dd($user->entreprise_id);
        $data = array();

        $data['nom_emp'] = $request->input('nom_emp');
        $data['prenom_emp'] = $request->input('prenom_emp');
        $data['datenaiss_emp'] = $request->input('datenaiss_emp');
        $data['bp_emp'] = $request->input('bp_emp');
        $data['articles'] = $request->input('articles');
        $data['signature'] = $dirigeant->signature;
        $data['initiales'] = $dirigeant->initiales;

        // foreach($data['articles'] as $d){dump($d);}
        // dd($data);
        // dd(Employe::findOrFail(1));
        return view('contrats.pdf.preview', compact('data'));
    }

    public function generatePDF(Request $request)
    {
        $data = array();

        $data['nom_emp'] = $request->input('nom_emp');
        $data['prenom_emp'] = $request->input('prenom_emp');

        $pdf = PDF::loadView('contrats.pdf.preview', $data);    
        return $pdf->download('demo.pdf');
    }
}
