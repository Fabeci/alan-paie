<template>
<div id="wrapper">
  <app-layout :user="user"></app-layout>
  <div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="container pd-0">
					<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="title">
									<h4>Les employés de l'entreprise</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="index.html">Tableau de bord</a></li>
										<li class="breadcrumb-item active" aria-current="page">employés</li>
									</ol>
								</nav>
							</div>
                            <div class="col-md-6 col-sm-6">
                                <div class="btn-list">
									<a :href="route('contrat.create')" class="btn btn-secondary rounded-0"><i class="fa fa-plus"></i> Contrat</a>
									<button type="button" class="btn btn-secondary rounded-0"><i class="fas fa-calendar-week"></i> Pointage</button>
									<button type="button" class="btn btn-secondary rounded-0"><i class="fa fa-calendar"></i> Congés</button>
									<button type="button" class="btn btn-secondary">Danger</button>
								</div>
                            </div>
						</div>
					</div>
					<div class="contact-directory-list">
						<ul class="row">
							<li v-for="employe in employesData" :key="employe.id" class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
								<div class="contact-directory-box rounded-3">
									<div class="contact-dire-info text-center">
										<div class="contact-avatar">
											<span>
												<img :src="this.baseUrl2+employe.photo_emp" alt="">
											</span>
										</div>
										<div class="contact-name">
											<h4>{{ employe.nom_emp+' '+employe.prenom_emp }}</h4>
											<p>{{ employe.service.libelle }}</p>
											<div class="work text-success"><i class="ion-android-person"></i> {{ employe.profil.libelle }}</div>
										</div>
										<div class="contact-skill">
											<span v-for="(contrat, index) in employe.contrats" :key="contrat.id" class="badge badge-pill"><span v-if="index < 3">{{ contrat.type_contrat.code }}</span></span>
											<span v-if="employe.contrats.length - 3 > 0" class="badge badge-pill badge-primary">+ {{ employe.contrats.length - 3}}</span>
										</div>
										<div class="profile-sort-desc">
											Lorem ipsum dolor sit amet, consectetur adipisicing magna aliqua.
										</div>
									</div>
									<div class="p-3 row">
										<div class="col-sm-4 pb-2 p-3 bg-gray-600 hover:bg-green-800 text-center">
											<a href="#" class="text-white">
												<i class="fa fa-edit"></i>
											</a>
										</div>
										<div class="col-sm-4 pb-2 p-3 bg-gray-600 hover:bg-red-800 text-center">
											<a href="#" class="text-white">
												<i class="fa fa-trash"></i>
											</a>
										</div>
										<div class="col-sm-4 pb-2 p-3 bg-gray-600 hover:bg-blue-800 text-center">
											<a :href="route('employe.show', employe)" class="text-white">
												<i class="icon-copy fa fa-id-badge" aria-hidden="true"></i>
											</a>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<app-footer></app-footer>
		</div>
	</div>
</div>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Welcome from "@/Jetstream/Welcome";
import AppFooter from "@/Layouts/AppFooter";

export default {
	props: ['user', "employes"],

     data() {
    return {
	  showingNavigationDropdown: false,
	  user: this.user,
	  employesData: this.employes
    };
  },

  computed: {
    baseUrl(){
        var getUrl = window.location;
        var baseUrl = getUrl .protocol + "//" + getUrl.host + "/template/";
        return baseUrl;
	},
	
	baseUrl2(){
        var getUrl = window.location;
        var baseUrl = getUrl .protocol + "//" + getUrl.host + "/storage/";
        return baseUrl;
    }
  },
  components: {
    AppLayout,
    AppFooter,
    Welcome
  },
  
};
</script>
