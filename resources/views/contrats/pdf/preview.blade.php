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
                <div class="panel-heading font-serif">
                    <strong><h2 style="text-decoration: underline">CONTRAT DE TRAVAIL</h2></strong>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="mb-8">Entre les soussignés :</div><br/><br/>
                            <div>La Société <strong>Technostructure Consulting Sarl</strong></div>
                            <div>Sise au Haut de Gue-Gue, derrière la Mairie</div>
                            <div>BP : {{ $data['bp_emp'] }}</div>
                            <div>Dûment représentée par son gérant <strong>{{ $data['nom_emp'].' '.$data['prenom_emp'] }}</strong></div>
                            <div>Agissant au nom de cette dernière, </div>
                            <div>Dénommée dans le présent contrat par « L’Employeur »</div>
                            <div>D’une part</div><br/><br/>
                        </div>
                        <div class="col-sm-4"></div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-6">
                            <div>Et</div>
                            <div>Mademoiselle OYANE NZE Jacquie Famisha</div>
                            <div>Né le {{ $data['datenaiss_emp'] }}</div>
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
                        @foreach($data['articles'] as $article)
                        <div class="row">
                            <div class="col-sm-12"><strong> {{ 'Article '.$article['position'] }} : {{ $article['titre'] }}</strong></div><br><br/>
                            <div class="col-sm-12">{{ $article['contenu'] }}</div>
                        </div><br/><br/><br/>
                        @endforeach
                    </div>
                </div><br/><br>
                <footer>
                    <div class="row" style="text-align: center; margin-left: 2px; margin-right: 2px">
                        <div class="col-sm-6">
                            <div class="">L’Employeur</div><br/>
                            <div class="brand-logo mb-3">
                                <a href="index.html">
                                    <img src="{{ asset('storage').'/'.$data['signature'] }}" width="200px" height="150px" alt class="dark-logo" />
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="">Le Travailleur</div><br/>
                        <div class="brand-logo mb-3">
                                <a href="index.html">
                                    <img src="{{ asset('storage').'/'.$data['initiales'] }}" width="200px" height="150px" alt class="dark-logo" />
                                </a>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- <div class="text-center pdf-btn">
                  <a href="{{ route('contrat.pdf.generate') }}" class="btn btn-primary">Generate PDF</a>
                </div> -->
            </div>
        </div>
    </div>
</body>
</html>