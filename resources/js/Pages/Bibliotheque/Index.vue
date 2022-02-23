<template>
  <div id="wrapper">
    <app-layout :user="user"></app-layout>
    <div class="main-container">
      <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
          <div class="container pd-0">
            <div class="page-header">
              <div class="row">
                <div class="col-md-12 col-sm-12">
                  <div class="title">
                    <h4>Bibliothèque</h4>
                  </div>
                  <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="index.html">Tableau de bord</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">bibliothèque</li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
            <div class="pd-20 card-box">
              <div class="tab">
								<ul class="nav nav-tabs customtab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#primesindemnites" role="tab" aria-selected="true">Primes & Indemnités</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#classifications" role="tab" aria-selected="false">Classifications</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#contrats" role="tab" aria-selected="false">Contrats</a>
									</li>
                  <li class="nav-item">
									 	<a class="nav-link" data-toggle="tab" href="#nationalités" role="tab" aria-selected="false">Nationalités</a>
									</li>
                  <li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#sanctions" role="tab" aria-selected="false">Sanctions</a>
									</li>
                  <li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#disponibilités" role="tab" aria-selected="false">Disponibilités</a>
									</li>
                  <li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#retenues" role="tab" aria-selected="false">Retenues sal.</a>
									</li>
                  <li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#lexiques" role="tab" aria-selected="false">Lexiques</a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade show active" id="primesindemnites" role="tabpanel">
										<div class="pd-20">
											<table v-for="(Typeavantage, index) in avantages" :key="Typeavantage.id" class="table table-bordered mb-20">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Primes & Indemnités</th>
                            <th scope="col">Typologies</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="(avantage, i) in Typeavantage" :key="avantage.id">
                              <th scope="row">{{ i+1 }}</th>
                              <th scope="row">{{ avantage.libelle }}</th>
                              <th scope="row">{{ index }}</th>
                          </tr>
                        </tbody>
                      </table>
										</div>
									</div>
									<div class="tab-pane fade" id="classifications" role="tabpanel">
										<div class="pd-20">
                      <table class="table table-bordered mb-20">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Primes & Indemnités</th>
                            <th scope="col">Typologies</th>
                            <th scope="col">Codes</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="(classification, index) in classifications" :key="classification.id" >
                              <th scope="row">{{ index+1 }}</th>
                              <th scope="row">{{ classification.libelle }}</th>
                              <th scope="row">{{ classification.type_classification.libelle }}</th>
                               <th scope="row">{{ classification.type_classification.code }}</th>
                          </tr>
                        </tbody>
                      </table>
										</div>
									</div>
									<div class="tab-pane fade" id="contrats" role="tabpanel">
										<div class="pd-20">
                      <table class="table table-bordered mb-20">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Contrats</th>
                            <th scope="col">Typologies</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="(typeContrat, index) in typeContrats" :key="typeContrat.id" >
                              <th scope="row">{{ index+1 }}</th>
                              <th scope="row">{{ typeContrat.code }}</th>
                              <th scope="row">{{ typeContrat.libelle }}</th>
                          </tr>
                        </tbody>
                      </table>
										</div>
									</div>
                  <div class="tab-pane fade" id="nationalités" role="tabpanel">
										<div class="pd-20">
                      <table class="table table-bordered mb-20">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Codes</th>
                            <th scope="col">Libelles</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="(nationalite, index) in nationalites" :key="nationalite.id" >
                              <th scope="row">{{ index+1 }}</th>
                              <th scope="row">{{ nationalite.code }}</th>
                              <th scope="row">{{ nationalite.libelle }}</th>
                          </tr>
                        </tbody>
                      </table>
										</div>
									</div>
                  <div class="tab-pane fade" id="sanctions" role="tabpanel">
										<div class="pd-20">
											Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
										</div>
									</div>
                  <div class="tab-pane fade" id="disponibilités" role="tabpanel">
										<div class="pd-20">
											Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
										</div>
									</div>
                  <div class="tab-pane fade" id="retenues" role="tabpanel">
										<div class="pd-20">
											Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
										</div>
									</div>
                  <div class="tab-pane fade" id="lexiques" role="tabpanel">
										<div class="pd-20">
											Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
										</div>
									</div>
								</div>
							</div>
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
import Logiciel from "@/Pages/Parametre/Logiciel/Logiciel";

export default {
  props: ['user', 'avantages', 'classifications', 'typeContrats', 'nationalites'],
  
  data() {
    return {
      showingNavigationDropdown: false
    };
  },

  computed: {
    baseUrl() {
      var getUrl = window.location;
      var baseUrl = getUrl.protocol + "//" + getUrl.host + "/template/";
      return baseUrl;
    }
  },
  components: {
    AppLayout,
    AppFooter,
    Welcome,
    Logiciel
  }
};
</script>
