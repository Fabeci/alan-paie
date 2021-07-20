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
                      <li class="breadcrumb-item">
                        <a href="index.html">Tableau de bord</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">employés</li>
                    </ol>
                  </nav>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="btn-list">
                    <a :href="route('contrat.create')" class="btn btn-secondary rounded-0">
                      <i class="fa fa-plus"></i> Contrat
                    </a>
                    <button type="button" class="btn btn-secondary rounded-0">
                      <i class="fas fa-calendar-week"></i> Pointage
                    </button>
                    <button type="button" class="btn btn-secondary rounded-0">
                      <i class="fa fa-calendar"></i> Congés
                    </button>
                    <button type="button" class="btn btn-secondary">Danger</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
                <div class="pd-20 card-box height-100-p">
					<h5
                    class="text-center h5 mb-0 border-b"
                  >
				  {{ employeData.entreprise.nom_commercial.toUpperCase() }}
				  </h5>
                  <div class="profile-photo">
                    <a
                      href="modal"
                      data-toggle="modal"
                      :data-target="'#modal-'+employeData.id"
                      class="edit-avatar hover:text-2xl"
                    >
					  <i class="icon-copy fi-arrows-out"></i>
                    </a>
                    <img :src="this.baseUrl2+employeData.photo_emp" alt class="avatar-photo" />
                    <div
                      class="modal fade"
                      :id="'modal-'+employeData.id"
                      tabindex="-1"
                      role="dialog"
                      aria-labelledby="modalLabel"
                      aria-hidden="true"
                    >
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-body pd-5">
                            <div class="img-container">
                              <img
                                id="image"
                                :src="this.baseUrl2+employeData.photo_emp"
                                alt="Picture"
                              />
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button
                              type="button"
                              class="btn btn-danger rounded-0 text-xl hover:text-sm"
                              data-dismiss="modal"
                            >
                              <i class="icon-copy fi-arrows-in"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <h5
                    class="text-center h5 mb-0 border-t"
                  >
				  {{ employeData.nom_emp.toUpperCase()+' '+employeData.prenom_emp.toUpperCase() }}
				  </h5>
                  <h6 class="text-center text-red-700 font-bold h6 mb-0">{{ employeData.matri_emp }}</h6>
                  <p class="text-center text-muted font-14">{{ employeData.service.libelle }}</p>
                  <div class="profile-info">
                    <h5 class="mb-3 h5 text-red-400">
                      <i class="icon-copy fa fa-info-circle"></i>
                      Informations personnelles
                    </h5>
                    <ul>
                      <div class="mb-2 font-serif">
                        <div class="text-gray-700 font-bold">
                          <i class="icon-copy fi-mail"></i>
                          Adresse email :
                        </div>
                        {{ employeData.email }}
                      </div>
                      <div class="mb-2">
                        <div class="text-gray-700 font-bold">
                          <i class="icon-copy fi-telephone"></i>
                          Téléphone :
                        </div>
                        {{ employeData.telephone_emp }}
                      </div>
                      <div class="mb-2">
                        <div class="text-gray-700 font-bold">Nationalité :</div>
                        {{ employeData.nationalite.libelle }}
                      </div>
                      <div class="mb-2">
                        <div class="text-gray-700 font-bold">Ville :</div>
                        {{ employeData.ville_emp }}
                      </div>
                      <div class="mb-2">
                        <div class="text-gray-700 font-bold">Address:</div>1807 Holden Street
                        <br />San Diego, CA 92115
                      </div>
                    </ul>
                  </div>
                  <div class="profile-social">
                    <h5 class="mb-3 h5 text-red-400">
                      <i class="icon-copy fi-torsos-all"></i>
                      Enfant{{ employeData.enfants.length > 1 ? 's' : ''}} ({{ employeData.enfants.length }})
                    </h5>
                    <ul class="clearfix">
                      <li v-for="enfant in employeData.enfants" :key="enfant.id">
                        <a
                          href="#"
                          class="btn rounded-full"
                          data-bgcolor="#3b5998"
                          data-color="#ffffff"
                          data-toggle="modal"
                          :data-target="'#modal-'+employeData.matri_emp+enfant.id"
                        >
                          <i class="icon-copy fa fa-child" aria-hidden="true"></i>
                        </a>
                        <div
                          class="modal fade"
                          :id="'modal-'+employeData.matri_emp+enfant.id"
                          tabindex="-1"
                          role="dialog"
                          aria-labelledby="modalLabel"
                          aria-hidden="true"
                        >
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div
                                class="modal-header font-bold"
                              >L'ENFANT DE L'EMPLOYE {{ employeData.nom_emp.toUpperCase()+' '+employeData.prenom_emp.toUpperCase() }}</div>
                              <div class="modal-body pd-5">
                                <div class="profile-info">
                                  <div>
                                    <div>
                                      <span>
                                        <i class="icon-copy fi-torso mr-3"></i>
                                        Nom : {{ enfant.nom_enfant }}
                                      </span>
                                    </div>
                                    <div>
                                      <span>
                                        <i class="icon-copy fi-torso mr-3"></i>
                                        Prenom : {{ enfant.prenom_enfant }}
                                      </span>
                                    </div>
                                    <div>
                                      <span>
                                        <i class="icon-copy fi-calendar mr-3"></i>
                                        Date de naissance : {{ enfant.datenaiss_enfant }}
                                      </span>
                                    </div>
                                    <div>
                                      <span>
                                        <!-- Age : {{ this.getAge }} -->
                                      </span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button
                                  type="button"
                                  class="btn btn-danger rounded-0 text-2xl"
                                  data-dismiss="modal"
                                >
                                  <i class="icon-copy fi-x"></i>
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <div class="profile-skills">
                    <h5 class="mb-3 h5 text-red-400">
                      <i class="icon-copy ion-clipboard"></i>
                      Contrat{{ employeData.contrats.length > 1 ? 's' : ''}} ({{ employeData.contrats.length }})
                    </h5>
                    <div
                      class="text-gray-700"
                      v-for="contrat in employeData.contrats"
                      :key="contrat.id"
                    >
                      <h6 class="mb-5 font-14">{{ contrat.type_contrat.libelle }}</h6>
                      <div class="progress mb-8" style="height: 15px;">
                        <div
                          class="bg-gray-700 progress-bar"
                          role="progressbar"
                          style="width: 100%"
                          aria-valuenow="0"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        >
                          <a
                            href="#"
                            class="btn text-white text-xs"
                            data-toggle="modal"
                            :data-target="'#modal-'+employeData.matri_emp+contrat.date_debut+contrat.id"
                          >Afficher</a>
                        </div>
                      </div>
                      <div
                        class="modal fade"
                        :id="'modal-'+employeData.matri_emp+contrat.date_debut+contrat.id"
                        tabindex="-1"
                        role="dialog"
                        aria-labelledby="modalLabel"
                        aria-hidden="true"
                      >
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div
                              class="modal-header font-bold"
                            >LE CONTRAT DE L'EMPLOYE {{ employeData.nom_emp.toUpperCase()+' '+employeData.prenom_emp.toUpperCase() }}</div>
                            <div class="modal-body pd-5">
                              <div class="pd-20 card-box">
                                <h4
                                  class="mb-30 h4 text-truncate"
                                >{{ contrat.libelle }} ({{ contrat.type_contrat.libelle }})</h4>
                                <dl class="row ml-3">
                                  <dt class="col-sm-4">Date de debut :</dt>
                                  <dd class="col-sm-8">
                                    <span>{{ contrat.date_debut }}</span>
                                  </dd>

                                  <dt class="col-sm-4">Date de fin :</dt>
                                  <dd class="col-sm-8">
                                    <span
                                      v-if="contrat.date_fin !== null && contrat.date_fin!=='' ? contrat.date_fin : 'En cours..'"
                                    ></span>
                                  </dd>

                                  <dt class="col-sm-4">Salaire de base :</dt>
                                  <dd class="col-sm-8">
                                    <span>{{ contrat.salaire_base }}</span>
                                  </dd>

                                  <dt class="col-sm-4 text-truncate">Service :</dt>
                                  <dd class="col-sm-8">
                                    <span>
                                      <span>{{ employeData.service.libelle }}</span>
                                    </span>
                                  </dd>

                                  <dt class="col-sm-4 text-truncate">Poste :</dt>
                                  <dd class="col-sm-8">
                                    <span>{{ contrat.poste.libelle }}</span>
                                  </dd>
                                  <dt class="col-sm-4 text-truncate">Classification</dt>
                                  <dd class="col-sm-8">
                                    <span>
                                      <span>{{ contrat.classification.libelle }}</span>
                                    </span>
                                  </dd>

                                  <h5
                                    class="col-sm-12 mb-5 mt-2 h5 text-truncate"
                                  >Primes & indemnités</h5>

                                  <ul>
                                    <li v-for="(avantage, index) in contrat.avantages" :key="avantage.id">
									<div class="row ml-3">
                                      <dt class="col-sm-10 text-truncate">{{ index+1+' - '+avantage.libelle }}</dt>
                                      <dd
                                        class="col-sm-2"
                                      >
									  <span>{{ avantage.pivot.valeur }}</span>
									  </dd>
									</div>
                                    </li>
                                  </ul>

                                  <!-- <dt class="col-sm-4">Nesting</dt>
                                  <dd class="col-sm-8">
                                    <dl class="row">
                                      <dt class="col-sm-4">Nested definition list</dt>
                                      <dd
                                        class="col-sm-8"
                                      >Aenean posuere, tortor sed cursus feugiat, nunc augue blandit nunc.</dd>
                                    </dl>
                                  </dd>-->
                                </dl>
                              </div>
                            </div>
							 <div class="modal-footer">
								 <button
                                  type="button"
                                  class="btn btn-default rounded-0 text-2xl hover:text-blue-700"
                                >
                                  <i class="icon-copy ion-archive"></i>
                                </button>
								 <button
                                  type="button"
                                  class="btn btn-default rounded-0 text-2xl hover:text-blue-700"
                                >
                                  <i class="icon-copy fi-print"></i>
                                </button>
                                <button
                                  type="button"
                                  class="btn btn-danger rounded-0 text-2xl"
                                  data-dismiss="modal"
                                >
                                  <i class="icon-copy fi-x"></i>
                                </button>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
                <div class="card-box height-100-p overflow-hidden">
                  <div class="profile-tab height-100-p">
                    <div class="tab height-100-p">
                      <ul class="nav nav-tabs customtab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" data-toggle="tab" href="#timeline" role="tab">
                            <i class="icon-copy ion-clock"></i>
                            Chronologie des activités
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#tasks" role="tab">
                            <i class="icon-copy ion-person-stalker"></i>
                            Collegues
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#setting" role="tab">
                            <i class="icon-copy ion-edit"></i>
                            Mise à jour
                          </a>
                        </li>
                      </ul>
                      <div class="tab-content">
                        <!-- Timeline Tab start -->
                        <div class="tab-pane fade show active" id="timeline" role="tabpanel">
                          <div class="pd-20">
                            <div class="profile-timeline">
                              <div class="timeline-month">
                                <h5>August, 2020</h5>
                              </div>
                              <div class="profile-timeline-list">
                                <ul>
                                  <li>
                                    <div class="date">12 Aug</div>
                                    <div class="task-name">
                                      <i class="ion-android-alarm-clock"></i> Task Added
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    <div class="task-time">09:30 am</div>
                                  </li>
                                  <li>
                                    <div class="date">10 Aug</div>
                                    <div class="task-name">
                                      <i class="ion-ios-chatboxes"></i> Task Added
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    <div class="task-time">09:30 am</div>
                                  </li>
                                  <li>
                                    <div class="date">10 Aug</div>
                                    <div class="task-name">
                                      <i class="ion-ios-clock"></i> Event Added
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    <div class="task-time">09:30 am</div>
                                  </li>
                                  <li>
                                    <div class="date">10 Aug</div>
                                    <div class="task-name">
                                      <i class="ion-ios-clock"></i> Event Added
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    <div class="task-time">09:30 am</div>
                                  </li>
                                </ul>
                              </div>
                              <div class="timeline-month">
                                <h5>July, 2020</h5>
                              </div>
                              <div class="profile-timeline-list">
                                <ul>
                                  <li>
                                    <div class="date">12 July</div>
                                    <div class="task-name">
                                      <i class="ion-android-alarm-clock"></i> Task Added
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    <div class="task-time">09:30 am</div>
                                  </li>
                                  <li>
                                    <div class="date">10 July</div>
                                    <div class="task-name">
                                      <i class="ion-ios-chatboxes"></i> Task Added
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    <div class="task-time">09:30 am</div>
                                  </li>
                                </ul>
                              </div>
                              <div class="timeline-month">
                                <h5>June, 2020</h5>
                              </div>
                              <div class="profile-timeline-list">
                                <ul>
                                  <li>
                                    <div class="date">12 June</div>
                                    <div class="task-name">
                                      <i class="ion-android-alarm-clock"></i> Task Added
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    <div class="task-time">09:30 am</div>
                                  </li>
                                  <li>
                                    <div class="date">10 June</div>
                                    <div class="task-name">
                                      <i class="ion-ios-chatboxes"></i> Task Added
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    <div class="task-time">09:30 am</div>
                                  </li>
                                  <li>
                                    <div class="date">10 June</div>
                                    <div class="task-name">
                                      <i class="ion-ios-clock"></i> Event Added
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    <div class="task-time">09:30 am</div>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Timeline Tab End -->
                        <!-- Tasks Tab start -->
                        <div class="tab-pane fade" id="tasks" role="tabpanel">
                          <div class="pd-20 profile-task-wrap">
                            <div class="container pd-0">
                              <!-- Open Task start -->
                              <div class="task-title row align-items-center">
                                <div class="col-md-8 col-sm-12">
                                  <h5>Open Tasks (4 Left)</h5>
                                </div>
                                <div class="col-md-4 col-sm-12 text-right">
                                  <a
                                    href="task-add"
                                    data-toggle="modal"
                                    data-target="#task-add"
                                    class="bg-light-blue btn text-blue weight-500"
                                  >
                                    <i class="ion-plus-round"></i> Add
                                  </a>
                                </div>
                              </div>
                              <div class="profile-task-list pb-30">
                                <ul>
                                  <li>
                                    <div class="custom-control custom-checkbox mb-5">
                                      <input
                                        type="checkbox"
                                        class="custom-control-input"
                                        id="task-1"
                                      />
                                      <label class="custom-control-label" for="task-1"></label>
                                    </div>
                                    <div class="task-type">Email</div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id ea earum.
                                    <div class="task-assign">
                                      Assigned to Ferdinand M.
                                      <div class="due-date">
                                        due date
                                        <span>22 February 2019</span>
                                      </div>
                                    </div>
                                  </li>
                                  <li>
                                    <div class="custom-control custom-checkbox mb-5">
                                      <input
                                        type="checkbox"
                                        class="custom-control-input"
                                        id="task-2"
                                      />
                                      <label class="custom-control-label" for="task-2"></label>
                                    </div>
                                    <div class="task-type">Email</div>Lorem ipsum dolor sit amet.
                                    <div class="task-assign">
                                      Assigned to Ferdinand M.
                                      <div class="due-date">
                                        due date
                                        <span>22 February 2019</span>
                                      </div>
                                    </div>
                                  </li>
                                  <li>
                                    <div class="custom-control custom-checkbox mb-5">
                                      <input
                                        type="checkbox"
                                        class="custom-control-input"
                                        id="task-3"
                                      />
                                      <label class="custom-control-label" for="task-3"></label>
                                    </div>
                                    <div class="task-type">Email</div>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    <div class="task-assign">
                                      Assigned to Ferdinand M.
                                      <div class="due-date">
                                        due date
                                        <span>22 February 2019</span>
                                      </div>
                                    </div>
                                  </li>
                                  <li>
                                    <div class="custom-control custom-checkbox mb-5">
                                      <input
                                        type="checkbox"
                                        class="custom-control-input"
                                        id="task-4"
                                      />
                                      <label class="custom-control-label" for="task-4"></label>
                                    </div>
                                    <div class="task-type">Email</div>Lorem ipsum dolor sit amet. Id ea earum.
                                    <div class="task-assign">
                                      Assigned to Ferdinand M.
                                      <div class="due-date">
                                        due date
                                        <span>22 February 2019</span>
                                      </div>
                                    </div>
                                  </li>
                                </ul>
                              </div>
                              <!-- Open Task End -->
                              <!-- Close Task start -->
                              <div class="task-title row align-items-center">
                                <div class="col-md-12 col-sm-12">
                                  <h5>Closed Tasks</h5>
                                </div>
                              </div>
                              <div class="profile-task-list close-tasks">
                                <ul>
                                  <li>
                                    <div class="custom-control custom-checkbox mb-5">
                                      <input
                                        type="checkbox"
                                        class="custom-control-input"
                                        id="task-close-1"
                                        checked
                                        disabled
                                      />
                                      <label class="custom-control-label" for="task-close-1"></label>
                                    </div>
                                    <div class="task-type">Email</div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id ea earum.
                                    <div class="task-assign">
                                      Assigned to Ferdinand M.
                                      <div class="due-date">
                                        due date
                                        <span>22 February 2018</span>
                                      </div>
                                    </div>
                                  </li>
                                  <li>
                                    <div class="custom-control custom-checkbox mb-5">
                                      <input
                                        type="checkbox"
                                        class="custom-control-input"
                                        id="task-close-2"
                                        checked
                                        disabled
                                      />
                                      <label class="custom-control-label" for="task-close-2"></label>
                                    </div>
                                    <div class="task-type">Email</div>Lorem ipsum dolor sit amet.
                                    <div class="task-assign">
                                      Assigned to Ferdinand M.
                                      <div class="due-date">
                                        due date
                                        <span>22 February 2018</span>
                                      </div>
                                    </div>
                                  </li>
                                  <li>
                                    <div class="custom-control custom-checkbox mb-5">
                                      <input
                                        type="checkbox"
                                        class="custom-control-input"
                                        id="task-close-3"
                                        checked
                                        disabled
                                      />
                                      <label class="custom-control-label" for="task-close-3"></label>
                                    </div>
                                    <div class="task-type">Email</div>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    <div class="task-assign">
                                      Assigned to Ferdinand M.
                                      <div class="due-date">
                                        due date
                                        <span>22 February 2018</span>
                                      </div>
                                    </div>
                                  </li>
                                  <li>
                                    <div class="custom-control custom-checkbox mb-5">
                                      <input
                                        type="checkbox"
                                        class="custom-control-input"
                                        id="task-close-4"
                                        checked
                                        disabled
                                      />
                                      <label class="custom-control-label" for="task-close-4"></label>
                                    </div>
                                    <div class="task-type">Email</div>Lorem ipsum dolor sit amet. Id ea earum.
                                    <div class="task-assign">
                                      Assigned to Ferdinand M.
                                      <div class="due-date">
                                        due date
                                        <span>22 February 2018</span>
                                      </div>
                                    </div>
                                  </li>
                                </ul>
                              </div>
                              <!-- Close Task start -->
                              <!-- add task popup start -->
                              <div
                                class="modal fade customscroll"
                                id="task-add"
                                tabindex="-1"
                                role="dialog"
                              >
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLongTitle">Tasks Add</h5>
                                      <button
                                        type="button"
                                        class="close"
                                        data-dismiss="modal"
                                        aria-label="Close"
                                        data-toggle="tooltip"
                                        data-placement="bottom"
                                        title
                                        data-original-title="Close Modal"
                                      >
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body pd-0">
                                      <div class="task-list-form">
                                        <ul>
                                          <li>
                                            <form>
                                              <div class="form-group row">
                                                <label class="col-md-4">Task Type</label>
                                                <div class="col-md-8">
                                                  <input type="text" class="form-control" />
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label class="col-md-4">Task Message</label>
                                                <div class="col-md-8">
                                                  <textarea class="form-control"></textarea>
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label class="col-md-4">Assigned to</label>
                                                <div class="col-md-8">
                                                  <select
                                                    class="selectpicker form-control"
                                                    data-style="btn-outline-primary"
                                                    title="Not Chosen"
                                                    multiple
                                                    data-selected-text-format="count"
                                                    data-count-selected-text="{0} people selected"
                                                  >
                                                    <option>Ferdinand M.</option>
                                                    <option>Don H. Rabon</option>
                                                    <option>Ann P. Harris</option>
                                                    <option>Katie D. Verdin</option>
                                                    <option>Christopher S. Fulghum</option>
                                                    <option>Matthew C. Porter</option>
                                                  </select>
                                                </div>
                                              </div>
                                              <div class="form-group row mb-0">
                                                <label class="col-md-4">Due Date</label>
                                                <div class="col-md-8">
                                                  <input
                                                    type="text"
                                                    class="form-control date-picker"
                                                  />
                                                </div>
                                              </div>
                                            </form>
                                          </li>
                                          <li>
                                            <a
                                              href="javascript:;"
                                              class="remove-task"
                                              data-toggle="tooltip"
                                              data-placement="bottom"
                                              title
                                              data-original-title="Remove Task"
                                            >
                                              <i class="ion-minus-circled"></i>
                                            </a>
                                            <form>
                                              <div class="form-group row">
                                                <label class="col-md-4">Task Type</label>
                                                <div class="col-md-8">
                                                  <input type="text" class="form-control" />
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label class="col-md-4">Task Message</label>
                                                <div class="col-md-8">
                                                  <textarea class="form-control"></textarea>
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label class="col-md-4">Assigned to</label>
                                                <div class="col-md-8">
                                                  <select
                                                    class="selectpicker form-control"
                                                    data-style="btn-outline-primary"
                                                    title="Not Chosen"
                                                    multiple
                                                    data-selected-text-format="count"
                                                    data-count-selected-text="{0} people selected"
                                                  >
                                                    <option>Ferdinand M.</option>
                                                    <option>Don H. Rabon</option>
                                                    <option>Ann P. Harris</option>
                                                    <option>Katie D. Verdin</option>
                                                    <option>Christopher S. Fulghum</option>
                                                    <option>Matthew C. Porter</option>
                                                  </select>
                                                </div>
                                              </div>
                                              <div class="form-group row mb-0">
                                                <label class="col-md-4">Due Date</label>
                                                <div class="col-md-8">
                                                  <input
                                                    type="text"
                                                    class="form-control date-picker"
                                                  />
                                                </div>
                                              </div>
                                            </form>
                                          </li>
                                        </ul>
                                      </div>
                                      <div class="add-more-task">
                                        <a
                                          href="#"
                                          data-toggle="tooltip"
                                          data-placement="bottom"
                                          title
                                          data-original-title="Add Task"
                                        >
                                          <i class="ion-plus-circled"></i> Add More Task
                                        </a>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-primary">Add</button>
                                      <button
                                        type="button"
                                        class="btn btn-secondary"
                                        data-dismiss="modal"
                                      >Close</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- add task popup End -->
                            </div>
                          </div>
                        </div>
                        <!-- Tasks Tab End -->
                        <!-- Setting Tab start -->
                        <div class="tab-pane fade height-100-p" id="setting" role="tabpanel">
                          <div class="profile-setting">
                            <form>
                              <ul class="profile-edit-list row">
                                <li class="weight-500 col-md-6">
                                  <h4
                                    class="text-red-400 h5 mb-5"
                                  >Modifier vos paramètres personnels</h4>
                                  <div class="form-group">
                                    <label>Full Name</label>
                                    <input class="form-control form-control-lg" type="text" />
                                  </div>
                                  <div class="form-group">
                                    <label>Title</label>
                                    <input class="form-control form-control-lg" type="text" />
                                  </div>
                                  <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control form-control-lg" type="email" />
                                  </div>
                                  <div class="form-group">
                                    <label>Date of birth</label>
                                    <input
                                      class="form-control form-control-lg date-picker"
                                      type="text"
                                    />
                                  </div>
                                  <div class="form-group">
                                    <label>Gender</label>
                                    <div class="d-flex">
                                      <div class="custom-control custom-radio mb-5 mr-20">
                                        <input
                                          type="radio"
                                          id="customRadio4"
                                          name="customRadio"
                                          class="custom-control-input"
                                        />
                                        <label
                                          class="custom-control-label weight-400"
                                          for="customRadio4"
                                        >Male</label>
                                      </div>
                                      <div class="custom-control custom-radio mb-5">
                                        <input
                                          type="radio"
                                          id="customRadio5"
                                          name="customRadio"
                                          class="custom-control-input"
                                        />
                                        <label
                                          class="custom-control-label weight-400"
                                          for="customRadio5"
                                        >Female</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label>Country</label>
                                    <select
                                      class="selectpicker form-control form-control-lg"
                                      data-style="btn-outline-secondary btn-lg"
                                      title="Not Chosen"
                                    >
                                      <option>United States</option>
                                      <option>India</option>
                                      <option>United Kingdom</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label>State/Province/Region</label>
                                    <input class="form-control form-control-lg" type="text" />
                                  </div>
                                  <div class="form-group">
                                    <label>Postal Code</label>
                                    <input class="form-control form-control-lg" type="text" />
                                  </div>
                                  <div class="form-group">
                                    <label>Phone Number</label>
                                    <input class="form-control form-control-lg" type="text" />
                                  </div>
                                  <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control"></textarea>
                                  </div>
                                  <div class="form-group">
                                    <label>Visa Card Number</label>
                                    <input class="form-control form-control-lg" type="text" />
                                  </div>
                                  <div class="form-group">
                                    <label>Paypal ID</label>
                                    <input class="form-control form-control-lg" type="text" />
                                  </div>
                                  <div class="form-group">
                                    <div class="custom-control custom-checkbox mb-5">
                                      <input
                                        type="checkbox"
                                        class="custom-control-input"
                                        id="customCheck1-1"
                                      />
                                      <label
                                        class="custom-control-label weight-400"
                                        for="customCheck1-1"
                                      >I agree to receive notification emails</label>
                                    </div>
                                  </div>
                                  <div class="form-group mb-0">
                                    <input
                                      type="submit"
                                      class="btn btn-primary"
                                      value="Update Information"
                                    />
                                  </div>
                                </li>
                                <li class="weight-500 col-md-6">
                                  <h4 class="text-red-400 h5 mb-4">Modifier votre mot de passe</h4>
                                  <div class="form-group">
                                    <label>Facebook URL:</label>
                                    <input
                                      class="form-control form-control-lg"
                                      type="text"
                                      placeholder="Paste your link here"
                                    />
                                  </div>
                                  <div class="form-group">
                                    <label>Twitter URL:</label>
                                    <input
                                      class="form-control form-control-lg"
                                      type="text"
                                      placeholder="Paste your link here"
                                    />
                                  </div>
                                  <div class="form-group">
                                    <label>Linkedin URL:</label>
                                    <input
                                      class="form-control form-control-lg"
                                      type="text"
                                      placeholder="Paste your link here"
                                    />
                                  </div>
                                  <div class="form-group">
                                    <label>Instagram URL:</label>
                                    <input
                                      class="form-control form-control-lg"
                                      type="text"
                                      placeholder="Paste your link here"
                                    />
                                  </div>
                                  <div class="form-group">
                                    <label>Dribbble URL:</label>
                                    <input
                                      class="form-control form-control-lg"
                                      type="text"
                                      placeholder="Paste your link here"
                                    />
                                  </div>
                                  <div class="form-group">
                                    <label>Dropbox URL:</label>
                                    <input
                                      class="form-control form-control-lg"
                                      type="text"
                                      placeholder="Paste your link here"
                                    />
                                  </div>
                                  <div class="form-group">
                                    <label>Google-plus URL:</label>
                                    <input
                                      class="form-control form-control-lg"
                                      type="text"
                                      placeholder="Paste your link here"
                                    />
                                  </div>
                                  <div class="form-group">
                                    <label>Pinterest URL:</label>
                                    <input
                                      class="form-control form-control-lg"
                                      type="text"
                                      placeholder="Paste your link here"
                                    />
                                  </div>
                                  <div class="form-group">
                                    <label>Skype URL:</label>
                                    <input
                                      class="form-control form-control-lg"
                                      type="text"
                                      placeholder="Paste your link here"
                                    />
                                  </div>
                                  <div class="form-group">
                                    <label>Vine URL:</label>
                                    <input
                                      class="form-control form-control-lg"
                                      type="text"
                                      placeholder="Paste your link here"
                                    />
                                  </div>
                                  <div class="form-group mb-0">
                                    <input
                                      type="submit"
                                      class="btn btn-primary"
                                      value="Save & Update"
                                    />
                                  </div>
                                </li>
                              </ul>
                            </form>
                          </div>
                        </div>
                        <!-- Setting Tab End -->
                      </div>
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

export default {
  props: ["user", "employe"],

  data() {
    return {
      showingNavigationDropdown: false,
      user: this.user,
      employeData: this.employe
    };
  },

  computed: {
    baseUrl() {
      var getUrl = window.location;
      var baseUrl = getUrl.protocol + "//" + getUrl.host + "/template/";
      return baseUrl;
    },

    baseUrl2() {
      var getUrl = window.location;
      var baseUrl = getUrl.protocol + "//" + getUrl.host + "/storage/";
      return baseUrl;
    },

    calculateAge() {
      let currentDate = new Date();
      let birthDate = new Date("1995/11/28");
      let difference = currentDate - birthDate;
      let age = Math.floor(difference / 31557600000);
      return age;
    },

    getAge(date) {
      var diff = Date.now() - date.getTime();
      var age = new Date(diff);
      alert(Math.abs(age.getUTCFullYear() - 1970));
      return Math.abs(age.getUTCFullYear() - 1970);
    }
  },
  method: {},
  components: {
    AppLayout,
    AppFooter,
    Welcome
  }
};
</script>
