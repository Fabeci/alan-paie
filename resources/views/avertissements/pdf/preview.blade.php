<!DOCTYPE html>
<html>
<head>
    <title>Contrat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<style type="text/css">
    h2{
        text-align: center;
        font-size:22px;
        margin-bottom:50px;
    }
    body{
        background:#f2f2f2;
    }
    .section{
        margin-top:30px;
        padding:50px;
        background:#fff;
    }
    .pdf-btn{
        margin-top:30px;
    }
</style>    
<body>
    <div class="container">
        <div class="col-md-8 section offset-md-2">
            <div class="panel panel-primary">
                <div class="brand-logo mb-3">
                    <a href="index.html">
                        <img src="{{ asset('template/vendors/images/logo.png') }}" alt class="dark-logo" />
                    </a>
                </div>
                <!-- <div class="panel-heading font-serif">
                    <strong><h2 style="text-decoration: underline">CONTRAT DE TRAVAIL</h2></strong>
                </div> -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <div><strong>{{ $avertissement->discipline->employe->nom_emp.' '.$avertissement->discipline->employe->prenom_emp }}</strong></div>
                            <div>{{ $avertissement->discipline->poste->libelle }}</div>
                            <div>{{ $avertissement->discipline->employe->ville_emp }}</div>
                            <div>BP : {{ $avertissement->discipline->employe->bp_emp }}</div><br/><br/>
                        </div>
                        <div class="col-sm-4"></div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-6">
                            <div>Et</div>
                            <div>Mademoiselle OYANE NZE Jacquie Famisha</div>
                            <div>Né le </div>
                            <div>De nationalité Gabonaise</div>
                            <div>Détentrice du Passeport N°15GA85672 </div>
                            <div>Délivrée le 26 septembre 2016 Libreville</div><br/><br/>

                            <div>Ci-après désigné le « Travailleur », d’autre part</div><br/><br/>
                        </div>
                    </div>
                    <div class="row">
                        <div> Il a été convenu l’accord dont la teneur suit :</div>
                    </div><br>

                    <div class="main-div font-serif text-md">
                       
                    </div>
                </div><br/><br>
                <footer>
                    <div class="row" style="text-align: center; margin-left: 2px; margin-right: 2px">
                        <div class="col-sm-6">
                            <div class="">L’Employeur</div><br/>
                            <div class="brand-logo mb-3">
                                <a href="index.html">
                                    
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="">Le Travailleur</div><br/>
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