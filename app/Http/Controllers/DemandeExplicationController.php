<?php

namespace App\Http\Controllers;

use App\Models\DemandeExplication;
use App\Models\Discipline;
use App\Models\Employe;
use App\Models\Poste;
use App\Models\Service;
use DateTime;
use Illuminate\Http\Request;

class DemandeExplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $demandeExplications = DemandeExplication::with('discipline', 'discipline.employe')->paginate(5);

        return \Inertia\Inertia::render('Rh/Discipline/DemandeExplication/Index', [
            'demandeExplications' => $demandeExplications
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \Inertia\Inertia::render('Rh/Discipline/DemandeExplication/Create', [
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
        $demandeExplication = new DemandeExplication;

        $demandeExplication->date = new DateTime();

        $demandeExplication->save();

        $discipline = new Discipline([
            "motif" => $request->input('motif'),
            "employe_id" => $request->input('collaborateur'),
            "service_id" => $request->input('service'),
            "poste_id" => $request->input('poste'),
            "fichier" => $request->file('fichier') ? $request->file('fichier')->store('fichier_discipline', 'public') : Null
        ]);

        $demandeExplication->disciplines()->save($discipline);

        return redirect()->route('demande-explication.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $demandeExplication = DemandeExplication::where('id', $id)->with('discipline', 'discipline.employe', 'disciplines.service', 'disciplines.poste', 'disciplines.service.employe')->first();
        return \Inertia\Inertia::render('Rh/Discipline/DemandeExplication/Show', [
            'demandeExplication' => $demandeExplication
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

    public function getServiceAndPoste(Request $request){

        $service = Service::where('id', $request->input('service'))->with('employe')->first();
        $collaborateurs = Employe::where('service_id', $request->input('service'))->get();
        $postes = Poste::where('service_id', $request->input('service'))->with('service', 'service.employe')->get();

        // dd($service);
        return response()->json([
            "collaborateurs" => $collaborateurs,
            "postes" => $postes,
            "chef" => !empty($service->employe) ? $service->employe : '',
        ]);
    }
}
