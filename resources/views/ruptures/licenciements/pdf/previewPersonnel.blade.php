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
                        <h3><strong>{{$licenciementPersonnel->licenciement->employe->nom_emp.' '.$licenciementPersonnel->licenciement->employe->prenom_emp}}</strong></h3>
                        <strong>Matricule {{$licenciementPersonnel->licenciement->employe->matri_emp }} /Service {{$licenciementPersonnel->licenciement->employe->service->libelle }}</strong><br/><br/>
                        
                        <strong>Madame / Monsieur,</strong><br/>
                        <div>Par courrier en date du <strong>{{$licenciementPersonnel->licenciement->date_courrier }}</strong>, nous vous avons convoqué à un entretien préalable destiné à discuter de l’éventualité du licenciement envisagé à votre égard.</div><br/><br/><br/>
                        <div>Au cours de l’entretien préalable, qui s’est déroulé en date <strong>{{$licenciementPersonnel->licenciement->date_courrier }}</strong>, nous vous avons fait part du/des motif(s) du licenciement envisagé à savoir :</div><br/>
                        <div>
                            @foreach($licenciementPersonnel->licenciement->motifs as $motif)
                            <strong>-    {{ $motif->libelle }}</strong><br/>
                            @endforeach
                        </div><br/><br/>
                        <div>
                            Nous avons pris note des explications que vous nous avez donné pour justifier vos actes et avons relevé que votre responsabilité a été clairement engagée ici. 
                            Vos explications ne sont pas des lors à éviter le licenciement. De toute évidence, votre comportement anti professionnel est en violation
                            flagrante avec notre règlement intérieur en ses articles : 12 et 13 et est de nature à nuire aux intérêts de notre société. 
                            La gravité des faits qui vous sont reprochés rend impossible votre maintien dans l’entreprise.<br/>
                            Par conséquent, nous vous informons par la présente que nous mettons fin à nos obligations contractuelles pour <strong>{{$licenciementPersonnel->nature }}</strong> 
                            à compter du <strong>{{$licenciementPersonnel->date_effet }}</strong><br/><br/>
                            A ce titre, nous vous prions de bien vouloir vous rapprocher de notre service compétent <strong>{{$licenciementPersonnel->service->libelle }}</strong> 
                            le <strong>{{$licenciementPersonnel->date_retrait }}</strong> afin de récupérer votre certificat de travail et percevoir votre solde de tout compte.<br/><br/>
                        </div><br/><br/>

                        <div>Nous vous prions de recevoir, Monsieur, l’assurance de notre considération distinguée.</div><br/><br/><br/>
                        
                        
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