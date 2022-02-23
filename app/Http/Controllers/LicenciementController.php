<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Service;
use App\Models\Licenciement;
use App\Models\LicenciementEconomique;
use Illuminate\Http\Request;
use App\Models\LicenciementPersonnel;
use App\Models\Motif;

class LicenciementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return \Inertia\Inertia::render('Rh/Rupture/Licenciement/Index', [
            'licenciementPersonnels' => LicenciementPersonnel::with('service', 'licenciement', 'licenciement.motifs', 'licenciement.employe', 'licenciement.employe.service')->get(),
            'licenciementEconomiques' => LicenciementEconomique::with('service', 'licenciement', 'licenciement.motifs', 'licenciement.employe', 'licenciement.employe.service')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \Inertia\Inertia::render('Rh/Rupture/Licenciement/Create', [
            'collaborateurs' => Employe::all(),
            'services' => Service::all(),
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
        if($request->isPersonnel){
            $licenciementPersonnel = new LicenciementPersonnel;

            $licenciementPersonnel->nature = $request->input('nature');
            $licenciementPersonnel->date_effet = $request->input('datePriseEffet');
            $licenciementPersonnel->date_retrait = $request->input('dateRetrait');
            $licenciementPersonnel->service_id = $request->input('service');
            $licenciementPersonnel->date_retrait = $request->input('dateRetrait');
            $licenciementPersonnel->save();

            $licenciement = new Licenciement;

            $licenciement->date_courrier = $request->input('dateCourrier');
            $licenciement->employe_id = $request->input('collaborateur');
            $licenciementPersonnel->licenciement()->save($licenciement);
 
        }else{
            $licenciementEconomique = new LicenciementEconomique;

            $licenciementEconomique->date_accord = $request->input('dateAccord');
            // $licenciementEconomique->date_retrait = $request->input('dateRetrait');
            $licenciementEconomique->save();

            $licenciement = new Licenciement;

            $licenciement->date_courrier = $request->input('dateCourrier');
            $licenciement->employe_id = $request->input('collaborateur');
            $licenciementEconomique->licenciement()->save($licenciement);
        }

        foreach($request->input('motifs') as $motif){
            
            $newMotif = new Motif([
                "libelle" => $motif['libelle'],
            ]);

            $newMotif->save();

            if(!is_null($motif['libelle'])){
                $licenciement->motifs()->attach([$newMotif->id]);
            }
        }

        return \Inertia\Inertia::render('Rh/Rupture/Licenciement/Create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return \Inertia\Inertia::render('Rh/Rupture/Licenciement/Show');
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

    public function previewPersonnel($id)
    {
        $licenciementPersonnel = LicenciementPersonnel::where('id', $id)->with('service', 'licenciement', 'licenciement.motifs','licenciement.employe', 'licenciement.employe.service')->first();

        return view('ruptures.licenciements.pdf.previewPersonnel', compact('licenciementPersonnel'));
    }

    public function previewEconomique($id)
    {
        $licenciementEconomique = LicenciementEconomique::where('id', $id)->with('service', 'licenciement','licenciement.employe', 'licenciement.employe.service')->first();

        return view('ruptures.licenciements.pdf.previewEconomique', compact('licenciementEconomique'));
    }
}
