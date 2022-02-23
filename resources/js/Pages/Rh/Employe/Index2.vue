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
									<h4>Gestion de carrières</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="index.html">Tableau de bord</a></li>
										<li class="breadcrumb-item active" aria-current="page">carrières</li>
									</ol>
								</nav>
							</div>
                            <div class="col-md-6 col-sm-6">
								<dropdown-menu></dropdown-menu>
                            </div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-6 col-md-6 col-sm-12 mb-3">
							<div class="pd-20 card-box text-center height-100-p">
								<h5 class="pt-2 h5 mb-3">Tableau</h5>
								<div class="max-width-200 mx-auto">
									<button  class="btn btn-secondary rounded-0" disabled>
										Voir la liste
									</button>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 mb-3">
							<div class="pd-20 card-box text-center height-100-p">
								<h5 class="pt-2 h5 mb-3">Carte</h5>
								<div class="max-width-200 mx-auto">
									<a class="btn btn-secondary rounded-0" :href="route('employe.index')">
										Voir la liste
									</a>
								</div>
							</div>
						</div>
					</div>	
					<div class="pd-20 card-box mb-10">
              <table class="table hover data-table-export nowrap">
                <thead>
                  <tr>
                    <th class="table-plus datatable-nosort">Matricule</th>
                    <th>noms</th>
                    <th>Prenoms</th>
                    <th>Services</th>
                    <th>Emails</th>
                    <th>Profils</th>
                    <th>Entreprises</th>
                    <th>Téléphone</th>
                    <th class="datatable-nosort">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="employe in employes.data" :key="employe.id">
                    <td class="table-plus">{{ employe.matri_emp }}</td>
                    <td>{{ employe.nom_emp }}</td>
					<td>{{ employe.prenom_emp }}</td>
                    <td>{{ employe.service.libelle }}</td>
                    <td>{{ employe.email }}</td>
                    <td>{{ employe.profil.code }}</td>
                    <td>{{ employe.entreprise.nom_commercial }}</td>
                    <td>{{ employe.telephone_emp }}</td>
                    <td>
                      <div class="dropdown">
                        <a
                          class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                          href="#"
                          role="button"
                          data-toggle="dropdown"
                        >
                          <i class="dw dw-more"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                          <a class="dropdown-item" :href="route('employe.show', employe.id)">
                            <i class="dw dw-eye"></i> Voir
                          </a>
                          <a class="dropdown-item" :href="route('employe.edit', employe.id)">
                            <i class="dw dw-edit2 text-blue"></i> Editer
                          </a>
                          <a class="dropdown-item" :href="route('employe.show', employe)">
                            <i class="dw dw-delete-3 text-red-400"></i> Suppr.
                          </a>
                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#Medium-modal">
                            <i class="dw dw-check text-green-600"></i> Appr.
                          </a>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
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
import DropdownMenu from "@/Layouts/DropdownMenu";

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
    Welcome,
    DropdownMenu
  },
  
};
</script>
