<!DOCTYPE html>
<html>

<head>
    <title>Contrat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<style type="text/css">
    h2 {
        text-align: center;
        font-size: 22px;
        margin-bottom: 50px;
    }

    body {
        background: #f2f2f2;
    }

    .section {
        margin-top: 30px;
        padding: 50px;
        background: #fff;
    }

    .pdf-btn {
        margin-top: 30px;
    }
</style>

<body>
    <div class="container">
        <div class="col-md-8 section offset-md-2">
            <div class="panel panel-primary">
                <div class="row">
                    <div class="col-sm-4">
                        <a href="index.html">
                            <img src="{{ asset('template/vendors/images/logo-accueil.png') }}" height="100" width="100" alt class="dark-logo" />
                        </a>
                    </div>
                    <div class="col-sm-6" style="background-color: black;">
                        <strong>
                            <h2 style="color:white;padding:10px">Avis de licenciement</h2>
                        </strong>

                    </div>

                </div>

                <div class="panel-body">
                    <div>
                    <h3><strong>{{$licenciementEconomique->licenciement->employe->nom_emp.' '.$licenciementEconomique->licenciement->employe->prenom_emp}}</strong></h3>
                        <strong>Matricule {{$licenciementEconomique->licenciement->employe->matri_emp }} /Service {{$licenciementEconomique->licenciement->employe->service->libelle }}</strong><br/><br/>
                        
                        <strong>Madame / Monsieur,</strong><br/>
                        <div>Par courrier en date du <strong>{{$licenciementEconomique->licenciement->date_courrier }}</strong>, nous vous avons convoqué à un entretien préalable destiné à discuter de l’éventualité du licenciement envisagé à votre égard.</div><br/><br/><br/>
                        <div>Au cours de l’entretien préalable, qui s’est déroulé en date <strong>{{$licenciementEconomique->licenciement->date_courrier }}</strong>, nous vous avons fait part du/des motif(s) du licenciement économique envisagé à savoir :</div><br/>
                        <div>
                            @foreach($licenciementEconomique->licenciement->motifs as $motif)
                            <strong>-    {{ $motif->libelle }}</strong><br/>
                            @endforeach
                        </div><br/><br/>
                        <div>
                            Conformément à l'article 56 du Code de Travail, votre licenciément a été autorisé par l'Inspecteur du Travail en date de .<br/>
                            Nous regrettons l'indisponibilité d'un poste de reclassement, nous ayant donné l'opportunité devotre maintien dans notre société.
                        </div><br/><br/>
                        
                        
                        <strong>Associé-Gérant</strong><br/>
                        <strong> Mba<br/><br/>
                        <div>Bitam le 22 août 2021</div>
                    </div>
                </div><br /><br>
                <footer>
                    <div class="row" style="text-align: center; margin-left: 2px; margin-right: 2px">
                        <div class="col-sm-6">
                            <div class="">L’Employeur</div><br />
                            <div class="brand-logo mb-3">
                                <a href="index.html">

                                </a>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="">Le Travailleur</div><br />
                            <div class="brand-logo mb-3">
                                <a href="index.html">

                                </a>
                            </div>
                        </div>
                    </div>
                </footer>

            </div>
        </div>
    </div>
</body>

</html>