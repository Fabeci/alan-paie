<template>
  <div id="wrapper">
    <app-layout :user="user"></app-layout>
    <div class="main-container">
      <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
          <div class="container pd-0">
            <div class="page-header">
              <div class="row">
                <div class="col-md-7 col-sm-4">
                  <div class="title">
                    <h4>
                      <i class="icon-copy fa fa-plus-circle" aria-hidden="true"></i> 
                      Nouveau contrat
                    </h4>
                  </div>
                  <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="index.html">Tableau de bord</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">nouveau contrat</li>
                    </ol>
                  </nav>
                </div>
                
                <div class="col-md-4">
                  <div class="dropdown">
                      <a class="btn btn-secondary dropdown-toggle rounded-0" href="#" role="button" data-toggle="dropdown">
                        <i class="icon-copy fa fa-eye" aria-hidden="true"></i>
                        Prévisualisation
                      </a>
                      <div class="dropdown-menu dropdown-menu-right rounded-0">
                        <button class="btn dropdown-item hover:text-white hover:bg-gray-500" @click.prevent="apercuContratPdf" target="_bank">
                          <i class="icon-copy fa fa-file-pdf-o" aria-hidden="true"></i> 
                          Format en pdf
                        </button>
                        <a class="dropdown-item hover:text-white hover:bg-gray-500" href="#">
                          <i class="icon-copy fa fa-print" aria-hidden="true"></i>
                            Imprimer
                        </a>
                      </div>
                    </div>
                </div>
                <div class="col-md-1">
                  <div class="dropdown">
                      <a class="btn btn-secondary rounded-0 text-right" href="#" role="button" data-toggle="dropdown">
                        <i class="icon-copy fa fa-ellipsis-v" aria-hidden="true"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right rounded-0">
                        <a class="dropdown-item hover:text-white hover:bg-gray-500" :href="route('employe.index')">
                          <i class="icon-copy fa fa-id-card-o" aria-hidden="true"></i> Employes
                        </a>
                        <a class="dropdown-item hover:text-white hover:bg-gray-500" href="#">
                          <i class="icon-copy fa fa-calendar-check-o" aria-hidden="true"></i> Pointage
                        </a>
                        <a class="dropdown-item hover:text-white hover:bg-gray-500" href="#">
                          <i class="icon-copy fa fa-calendar-plus-o" aria-hidden="true"></i> Congés
                        </a>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>

          <div class="pd-20 card-box mb-10">
            <div class="tab">
              <ul class="nav nav-tabs customtab" role="tablist">
                <li class="nav-item">
                  <a
                    class="nav-link active"
                    data-toggle="tab"
                    href="#employe"
                    role="tab"
                    aria-selected="true"
                  >Employé</a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    data-toggle="tab"
                    href="#contrat"
                    role="tab"
                    aria-selected="false"
                  >Contrat</a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    data-toggle="tab"
                    href="#avantages"
                    role="tab"
                    aria-selected="false"
                  >Primes & indemnités</a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    data-toggle="tab"
                    href="#articles"
                    role="tab"
                    aria-selected="false"
                  >Articles</a>
                </li>
              </ul>
              <form action="/file-upload" class="mb-5">
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="employe" role="tabpanel">
                    <div class="pd-20">
                      <div class="row">
                        <div class="col-sm-12 text-center">
                          <label>Photo de profil</label>
                          <div class="avatar-wrapper-logo">
                            <img class="photo" :src="state.defaultImage" />
                            <div class="photo-upload-button">
                              <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                            </div>
                            <input
                              class="photo-upload"
                              @change="setPhoto"
                              ref="photo"
                              type="file"
                              accept="image/*"
                            />
                          </div>
                          <!-- <span v-if="v$.form.photo.$error" class="text-red-600">{{ v$.form.logo.$errors[0].$message }}</span> -->
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Nom</label>
                            <input
                              v-model="state.form.nom_emp"
                              class="form-control h-10 text-sm"
                              type="text"
                              placeholder="Entrez le nom"
                            />
                            <span v-if="v$.form.nom_emp.$error" class="text-red-600">{{ v$.form.nom_emp.$errors[0].$message }}</span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Prenom</label>
                            <input
                              v-model="state.form.prenom_emp"
                              class="form-control"
                              type="text"
                              placeholder="Entrez le nom"
                            />
                            <span v-if="v$.form.prenom_emp.$error" class="text-red-600">{{ v$.form.prenom_emp.$errors[0].$message }}</span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Date de naissance</label>
                            <input
                              class="form-control"
                              type="date"
                              v-model="state.form.datenaiss_emp"
                              placeholder="Entrez la date de debut du contrat"
                            />
                            <span v-if="v$.form.$error" class="text-red-600">{{ v$.form.$errors[0].$message }}</span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Sexe</label>
                            <select
                              class="form-control"
                              style="width: 100%;"
                              v-model="state.form.sexe_emp"
                              @change="changeDefaultImage(state.form.sexe_emp)"
                            >
                              <optgroup label="Selectionnez le sexe">
                                <option selected value="M">Masculin</option>
                                <option value="F">Feminin</option>
                              </optgroup>
                            </select>
                            <span v-if="v$.form.$error" class="text-red-600">{{ v$.form.$errors[0].$message }}</span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Boîte postale</label>
                            <input
                              v-model="state.form.bp_emp"
                              class="form-control"
                              type="text"
                              placeholder="Entrez le nom"
                            />
                            <span v-if="v$.form.bp_emp.$error" class="text-red-600">{{ v$.form.bp_emp.$errors[0].$message }}</span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>NIF</label>
                            <input
                              v-model="state.form.nif_emp"
                              class="form-control"
                              type="text"
                              placeholder="Entrez le nom"
                            />
                            <span v-if="v$.form.nif_emp.$error" class="text-red-600">{{ v$.form.nif_emp.$errors[0].$message }}</span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Nationalité</label>
                            <select
                              class="custom-select form-control"
                              style="width: 100%;"
                              v-model="state.form.nationalite_emp"
                            >
                              <optgroup label="Selectionnez le type du contrat">
                                <option
                                  v-for="nationalite in nationalites"
                                  :key="nationalite.id"
                                  :value="nationalite.id"
                                >{{ nationalite.libelle }}</option>
                              </optgroup>
                            </select>
                            <span v-if="v$.form.nationalite_emp.$error" class="text-red-600">{{ v$.form.nationalite_emp.$errors[0].$message }}</span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Ville</label>
                            <input
                              class="form-control"
                              type="text"
                              placeholder="Entrez la ville"
                              v-model="state.form.ville_emp"
                            />
                            <span v-if="v$.form.ville_emp.$error" class="text-red-600">{{ v$.form.ville_emp.$errors[0].$message }}</span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Téléphone</label>
                            <input
                              class="form-control"
                              type="phone"
                              placeholder="Entrez le numero de téléphone"
                              v-model="state.form.telephone_emp"
                            />
                            <span v-if="v$.form.telephone_emp.$error" class="text-red-600">{{ v$.form.telephone_emp.$errors[0].$message }}</span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Situation matr.</label>
                            <select
                              value
                              class="custom-select form-control"
                              style="width: 100%;"
                              v-model="state.form.situation_emp"
                            >
                              <optgroup label="Selectionnez le type du contrat">
                                <option value="1">Celibataire</option>
                                <option value="2">Marié(e)</option>
                                <option value="3">Veuf(ve)</option>
                                <option value="4">Divorcé(e)</option>
                              </optgroup>
                            </select>
                            <span v-if="v$.form.situation_emp.$error" class="text-red-600">{{ v$.form.situation_emp.$errors[0].$message }}</span>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6 col-sm-12">
                          <div class="custom-control custom-checkbox">
                            <a
                              type="button"
                              class="btn btn-secondary btn-sm text-white"
                              data-toggle="modal"
                              data-target="#Medium-modal"
                            >Des enfants..</a>
                          </div>
                        </div>
                        <div class="col-md-6" v-if="state.form.situation_emp == 3">
                          <div class="form-group">
                            <label>Date de decès</label>
                            <input
                              class="form-control"
                              type="date"
                              placeholder="Entrez la date de decès"
                              v-model="state.form.datedeath"
                            />
                          </div>
                        </div>
                      </div>
                      <div class="alert alert-info alert-dismissible fade show mt-3" role="alert">
                        Scannez vos
                        <strong>initiales</strong> et celles de l'employé ansi que vos
                        <strong>signatures</strong> et televersez-les .
                      </div>
                      <div class="row mt-3">
                        <div class="col-md-6 text-center">
                          <label>Initiales du dirigeant</label>
                          <div class="avatar-wrapper">
                              <img 
                                class="initiales-pic" 
                                :src="baseUrl+'vendors/images/initiales.jpg'" />
                              <div class="initiales-upload-button">
                                <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                              </div>
                              <input 
                                class="initiales-upload"
                                @change="setInitiales" 
                                ref="initiales" 
                                type="file" 
                                accept="image/*"
                              />
                          </div>
                        </div>
                        <div class="col-md-6 text-center">
                          <div class="form-group">
                            <label>Signature de l'employé</label>
                            <div class="avatar-wrapper">
                              <img 
                                class="signature-pic" 
                                :src="baseUrl+'vendors/images/default.png'" />
                              <div class="signature-upload-button">
                                <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                              </div>
                              <input 
                                class="signature-upload" 
                                @change="setSignature" 
                                ref="signature" 
                                type="file" 
                                accept="image/*"
                              />
                            </div>  
                          </div>
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Email</label>
                            <input
                              class="form-control"
                              type="text"
                              placeholder="Entrez l'adresse email"
                              v-model="state.form.email_emp"
                            />
                            <span v-if="v$.form.email_emp.$error" class="text-red-600">{{ v$.form.email_emp.$errors[0].$message }}</span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Profil</label>
                            <select
                              class="form-control custom-select"
                              style="width: 100%;"
                              v-model="state.form.profil"
                            >
                              <optgroup label="Selectionnez le sexe">
                                <option
                                  v-for="profil in profils"
                                  :key="profil.id"
                                  :value="profil.id"
                                >{{ profil.libelle }}</option>
                              </optgroup>
                            </select>
                            <span v-if="v$.form.$error" class="text-red-600">{{ v$.form.$errors[0].$message }}</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="contrat" role="tabpanel">
                    <div class="pd-20">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Libellé</label>
                            <input
                              class="form-control"
                              type="text"
                              placeholder="Entrez le libellé du contrat"
                              v-model="state.form.contrat"
                            />
                            <span v-if="v$.form.contrat.$error" class="text-red-600">{{ v$.form.contrat.$errors[0].$message }}</span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Type du contrat</label>
                            <select
                              class="custom-select form-control"
                              style="width: 100%;"
                              v-model="state.form.type_contrat"
                              @change="changeArticleTypeContrat(state.form.type_contrat)"
                            >
                              <optgroup label="Selectionnez le type du contrat">
                                <option
                                  v-for="typeContrat in typeContrats"
                                  :key="typeContrat.id"
                                  :value="typeContrat.id"
                                >{{ typeContrat.libelle }}</option>
                              </optgroup>
                            </select>
                            <span v-if="v$.form.type_contrat.$error" class="text-red-600">{{ v$.form.type_contrat.$errors[0].$message }}</span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Poste</label>
                            <select
                              class="custom-select form-control"
                              style="width: 100%;"
                              v-model="state.form.poste"
                            >
                              <optgroup label="Selectionnez le poste">
                                <option
                                  v-for="poste in postes"
                                  :key="poste.id"
                                  :value="poste.id"
                                >{{ poste.libelle }}</option>
                              </optgroup>
                            </select>
                            <span v-if="v$.form.poste.$error" class="text-red-600">{{ v$.form.poste.$errors[0].$message }}</span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Classification</label>
                            <select
                              value
                              class="custom-select form-control"
                              style="width: 100%;"
                              v-model="state.form.classification_emp"
                            >
                              <optgroup value label="Selectionnez la classification">
                                <option
                                  v-for="classification in classifications"
                                  :key="classification.id"
                                  :value="classification.id"
                                >{{ classification.libelle }}</option>
                              </optgroup>
                            </select>
                            <span v-if="v$.form.classification_emp.$error" class="text-red-600">{{ v$.form.classification_emp.$errors[0].$message }}</span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Date debut</label>
                            <input
                              class="form-control"
                              type="date"
                              placeholder="Entrez la date de debut du contrat"
                              v-model="state.form.date_debut"
                            />
                            <span v-if="v$.form.date_debut.$error" class="text-red-600">{{ v$.form.date_debut.$errors[0].$message }}</span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Date fin</label>
                            <input
                              class="form-control"
                              type="date"
                              placeholder="Entrez la date de fin du contrat"
                              v-model="state.form.date_fin"
                            />
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Contrat resilié, date de cessation</label>
                            <input
                              class="form-control"
                              type="date"
                              placeholder="Entrez la date de debut du contrat"
                              v-model="state.form.cessation"
                            />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Salaire base</label>
                            <input
                              class="form-control"
                              type="text"
                              placeholder="Entrez la date de fin du contrat"
                              v-model="state.form.salaire_base"
                            />
                            <span v-if="v$.form.salaire_base.$error" class="text-red-600">{{ v$.form.salaire_base.$errors[0].$message }}</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="avantages" role="tabpanel">
                    <div class="pd-20">
                      <h5 class="mb-10 mt-2 text-blue-400">- Avantages en nature</h5>
                      <div
                        v-if="state.form.avantages_nature.length == 0"
                        class="alert alert-info alert-dismissible fade show"
                        role="alert"
                      >
                        Vous n'avez ajouté aucun
                        <strong>avantage en nature</strong> dans le contrat. Cliquez sur
                        <strong>+</strong> pour les ajouter ou
                        <strong>-</strong> pour les retirer.
                      </div>
                      <div
                        class="row"
                        v-for="(avantage, index) in state.form.avantages_nature"
                        :key="index"
                      >
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Avantages {{ index + 1 }}</label>
                            <select
                              class="custom-select form-control"
                              style="width: 100%;"
                              v-model="state.form.avantages_nature[index].libelle"
                              @change="changeAvantagesNatureListe(index, state.form.avantages_nature[index].libelle)"
                            >
                              <optgroup label="Selectionnez un avantage">
                                <option v-for="avantage in state.avantages_nature_data[index]" :key="avantage.id" :value="avantage.id">{{ avantage.libelle }}</option>
                              </optgroup>
                            </select>
                            <span v-if="v$.form.avantages_nature.$error" class="text-red-600">
                                {{ v$.form.avantages_nature.$errors[0].$message }}
                            </span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Valeur</label>
                            <input
                              class="form-control"
                              type="text"
                              placeholder="Entrez la date de fin du contrat"
                              v-model="state.form.avantages_nature[index].value"
                            />
                            <span v-if="v$.form.avantages_nature.$error" class="text-red-600">{{ v$.form.avantages_nature.$errors[0].$message }}</span>
                          </div>
                        </div>
                      </div>
                      <div class="btn-group mb-15">
                        <button
                          @click.prevent="addAvantagesNature"
                          type="button"
                          class="btn btn-outline-primary mr-2 rounded-none"
                        >
                          <i class="fa fa-plus"></i>
                        </button>
                        <button
                          @click.prevent="removeAvantagesNature"
                          v-if="state.form.avantages_nature.length > 0"
                          type="button"
                          class="btn btn-outline-danger rounded-none"
                        >
                          <i class="fa fa-minus"></i>
                        </button>
                      </div>
                      <h5 class="mb-10 mt-2 text-blue-400">- Avantages en numeraire</h5>
                      <div
                        v-if="state.form.avantages_numeraire.length == 0"
                        class="alert alert-info alert-dismissible fade show"
                        role="alert"
                      >
                        Vous n'avez ajouté aucun
                        <strong>avantage en numeraire</strong> dans le contrat. Cliquez sur
                        <strong>+</strong> pour les ajouter ou
                        <strong>-</strong> pour les retirer.
                      </div>
                      <div
                        class="row"
                        v-for="(avantage, index) in state.form.avantages_numeraire"
                        :key="index"
                      >
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Avantages</label>
                            <select 
                              class="custom-select form-control" 
                              style="width: 100%;"
                              v-model="state.form.avantages_numeraire[index].libelle"
                              @change="changeAvantagesNumeraireListe(index, state.form.avantages_numeraire[index].libelle)"
                            >
                              <optgroup label="Selectionnez un avantage">
                                  <option v-for="avantage in state.avantages_numeraire_data[index]" :key="avantage.id" :value="avantage.id">{{ avantage.libelle }}</option>
                              </optgroup>
                            </select>
                            <span v-if="v$.form.avantages_numeraire.$error" class="text-red-600">{{ v$.form.avantages_numeraire.$errors[0].$message }}</span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label>Valeur</label>
                          <div class="input-group">
                            <input
                              class="form-control"
                              type="text"
                              placeholder="Entrez la date de fin du contrat"
                              v-model="state.form.avantages_numeraire[index].value"
                            />
                            <div class="input-group-append custom">
                              <sapn class="input-group-text">
                                <i class="icon-copy fa fa-percent" aria-hidden="true"></i>
                              </sapn>
                            </div>
                            <span v-if="v$.form.avantages_numeraire.$error" class="text-red-600">{{ v$.form.avantages_numeraire.$errors[0].$message }}</span>
                          </div>
                        </div>
                      </div>
                      <div class="btn-group mb-15">
                        <button
                          @click.prevent="addAvantagesNumeraire"
                          type="button"
                          class="btn btn-outline-primary mr-2 rounded-none"
                        >
                          <i class="fa fa-plus"></i>
                        </button>
                        <button
                          @click.prevent="removeAvantagesNumeraire"
                          v-if="state.form.avantages_numeraire.length > 0"
                          type="button"
                          class="btn btn-outline-danger rounded-none"
                        >
                          <i class="fa fa-minus"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="articles" role="tabpanel">
                    <div class="pd-20">
                      <div class="row" v-for="(article, index) in state.form.articles" :key="index">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Position № {{ state.form.articles[index].position }}</label>
                              <input
                                v-model="state.form.articles[index].position"
                                class="form-control font-bold"
                                type="number"
                                :min="index == 0 ? '1' : state.form.articles[index-1].position + 1"
                                placeholder="Entrez la position"
                              />
                              <span v-if="v$.form.articles.$error" class="text-red-600">{{ v$.form.articles.$errors[0].$message }}</span>
                            </div>
                          </div>
                          <div class="col-md-8">
                            <div class="form-group">
                              <label>Titre de l'article {{ state.form.articles[index].position }}</label>
                              <input
                                v-model="state.form.articles[index].titre"
                                class="form-control font-bold"
                                type="text"
                                placeholder="Entrez le nom"
                              />
                              <span v-if="v$.form.articles.$error" class="text-red-600">{{ v$.form.articles.$errors[0].$message }}</span>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group html-editor">
                              <label>Contenu de l'article {{ state.form.articles[index].position }}</label>
                              <textarea
                                class="textarea_editor form-control border-radius-0"
                                placeholder="Entrez le contenu de l'article"
                                v-model="state.form.articles[index].contenu"
                              ></textarea>
                              <span v-if="v$.form.articles.$error" class="text-red-600">{{ v$.form.articles.$errors[0].$message }}</span>
                            </div>
                          </div>
                      </div>
                      <div class="btn-group mb-15">
                        <button
                          @click.prevent="addArticles"
                          type="button"
                          class="btn btn-outline-primary mr-2 rounded-none"
                        >
                          <i class="fa fa-plus"></i>
                        </button>
                        <button
                          @click.prevent="removeArticles"
                          v-if="state.form.articles.length > 0"
                          type="button"
                          class="btn btn-outline-danger rounded-none"
                        >
                          <i class="fa fa-minus"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="btn-list">
                  <a :href="route('contrat.create')" @click.prevent="submit" class="btn btn-info rounded-0">
                    <i class="fa fa-check"></i> Enregistrer
                  </a>
                  <button type="button" class="btn btn-warning rounded-0">
                    <i class="fas fa-fresh"></i> Annuler
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <app-footer></app-footer>

        <modal-enfant @enfants="enfantsEventMethod"></modal-enfant>
      </div>
    </div>
  </div>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Welcome from "@/Jetstream/Welcome";
import AppFooter from "@/Layouts/AppFooter";
import ModalEnfant from "@/Pages/Rh/Contrat/ModalEnfant";

import { reactive, computed } from "vue";
import useVuelidate from "@vuelidate/core";
import {
  required,
  requiredIf,
  email,
  minLength,
  maxLength,
  alphaNum,
  numeric,
  helpers
} from "@vuelidate/validators";

export default {
  props: ["user", "nationalites", "typeContrats", "articleTypeContrats", "postes", "classifications", "profils", "avantages_nature", 'avantages_numeraire', 'cities'],

  setup() {
    const state = reactive({
      showingNavigationDropdown: false,

      defaultImage: "http://localhost:8000/storage/images_profils/avatar-male.png",
      avantages_nature_data: [{}],
      avantages_numeraire_data: [{}],

      form: {
        photo: "",
        nom_emp: "",
        prenom_emp: "",
        sexe_emp: "",
        email_emp: "",
        datenaiss_emp: "",
        telephone_emp: "",
        classification_emp: "",
        nif_emp: "",
        bp_emp: "",
        nationalite_emp: "",
        ville_emp: "",
        profil: "",
        situation_emp: "",
        initiales: "",
        signature: "",
        has_child: false,
        nb_enfant: 0,

        is_deceased: false,
        datedeath: "",
        employeur_conj: "",
        contrat: "",
        type_contrat: "",
        date_debut: "",
        date_fin: "",
        cessation: "",
        salaire_base: "",
        service: "",
        poste: "",
        file: "",
        avantages_nature: [],
        avantages_numeraire_data: [],
        avantages_numeraire: [],
        articles: [],
        enfants: [],
        data: [],
      }
    });

    const requiredIf = (value) => value == '3';

    const rules = computed(() => {
      return {
        
        form: {
          nom_emp: {
            required: helpers.withMessage("Ce champ est obligatoire", required)
          },
          prenom_emp: {
            required: helpers.withMessage("Ce champ est obligatoire", required)
          },
          sexe_emp: {
            required: helpers.withMessage("Ce champ est obligatoire", required)
          },
          email_emp: {
            required: helpers.withMessage("Ce champ est obligatoire", required),
            email: helpers.withMessage("Veuillez entrer une adresse email valide", email)
          },
          datenaiss_emp: {
            required: helpers.withMessage("Ce champ est obligatoire", required)
          },
          telephone_emp: {
            required: helpers.withMessage("Ce champ est obligatoire", required)
          },
          classification_emp: {
            required: helpers.withMessage("Ce champ est obligatoire", required)
          },
          nif_emp: {
            required: helpers.withMessage("Ce champ est obligatoire", required)
          },
          bp_emp: {
            required: helpers.withMessage("Ce champ est obligatoire", required)
          },
          nationalite_emp: {
            required: helpers.withMessage("Ce champ est obligatoire", required)
          },
          ville_emp: {
            required: helpers.withMessage("Ce champ est obligatoire", required)
          },

          situation_emp: {
            required: helpers.withMessage("Ce champ est obligatoire", required)
          },
          contrat: {
            required: helpers.withMessage("Ce champ est obligatoire", required)
          },
          type_contrat: {
            required: helpers.withMessage("Ce champ est obligatoire", required)
          },
          date_debut: {
            required: helpers.withMessage("Ce champ est obligatoire", required)
          },
          salaire_base: {
            required: helpers.withMessage("Ce champ est obligatoire", required)
          },
          poste: {
            required: helpers.withMessage("Ce champ est obligatoire", required)
          },
          avantages_nature: [{
            libelle: {
              required: helpers.withMessage("Ce champ est obligatoire", required)
            },
            value: {
              required: helpers.withMessage("Ce champ est obligatoire", required)
            },
          }],
          avantages_numeraire: {

          },
          articles: {

          },
          
        }
      };
    });

    const v$ = useVuelidate(rules, state);

    return { state, v$ };
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
    }
  },

  methods: {
    submit() {
      let data = new FormData();
      let nb_enfant = this.state.form.enfants.length;

      data.append("photo_emp", this.state.form.photo);
      data.append("avantages_nature", this.state.form.avantages_nature);
      data.append("avantages_numeraire", this.state.form.avantages_numeraire);
      data.append("articles", this.state.form.articles);
      data.append("enfants", this.state.form.enfants);

      this.state.form.data = data;

      // this.v$.$validate();


      // if (!this.v$.$error) {
        this.$inertia.post("/rh/contrat", this.state.form, {
          onSuccess: () => { 
            this.reset();
            this.state.form.enfants = [],
            toastr.success("La création de l'employé et de son contrat  s'est effectuée avec succès !!");
          },
          onError: errors => {
            this.state.errors =
              "L'adresse email que vous avez renseignée existe déjà. Veuillez entrer une autre adresse email ou connectez-vous si vous avez déjà un compte.";
          }
        });
      // } else {
      // }
    },

    apercuContratPdf(){
      this.$inertia.post("/rh/contrat/pdf/apercu", this.state.form, {
        onSuccess: () => { 
          
        },
        onError: errors => {
          
        }
      });
    },

    changeArticleTypeContrat(id){
      axios.get("/rh/contrat/articles/type-contrat/"+id,).then((res) => {
        
          this.state.form.articles = []
          res.data.articleTypeContrats.forEach((element) => {

          this.state.form.articles.push({
            id: element.pivot.article_id,
            position: element.pivot.position,
            titre: element.titre,
            contenu: element.pivot.contenu
          });
        })
      })
    },

    changeAvantagesNatureListe(index, value){
      let i = 0
      let k =0

      this.state.avantages_nature_data[index+1] = []
      let new_avantages_nature_data = []

      new_avantages_nature_data.push(this.state.avantages_nature_data[index])

      new_avantages_nature_data.forEach((element) => {
        for(i; i < 11; i++){
          if(element[i].id != value){
            this.state.avantages_nature_data[index+1][k] = element[i]
            k++
          }
        }
      });
    },

    changeAvantagesNumeraireListe(index, value){
      let i = 0
      let k =0

      this.state.avantages_numeraire_data[index+1] = []
      let new_avantages_numeraire_data = []

      new_avantages_numeraire_data.push(this.state.avantages_numeraire_data[index])

      new_avantages_numeraire_data.forEach((element) => {
        for(i; i < 11; i++){
          if(element[i].id != value){
            this.state.avantages_numeraire_data[index+1][k] = element[i]
            k++
          }
        }
      });
    },

    changeDefaultImage(sexe) {
      if (sexe == "M") {
        this.state.defaultImage = "http://localhost:8000/storage/images_profils/avatar-male.png";
      } else {
        this.state.defaultImage = "http://localhost:8000/storage/images_profils/avatar-female.png";
      }
    },

    enfantsEventMethod(enfants){
      this.state.form.enfants = []
      enfants.forEach((element) => {
        this.state.form.enfants.push({
          nom_enfant: element.nom_enfant,
          prenom_enfant: element.prenom_enfant,
          datenaiss_enfant: element.datenaiss_enfant
        });
      })
      
    },

    setPhoto(e) {
      this.state.form.photo = e.target.files[0];
    },

    setSignature(e) {
      this.state.form.signature = e.target.files[0];
    },

    setInitiales(e) {
      this.state.form.initiales = e.target.files[0];
    },

    addAvantagesNature() {
      this.state.form.avantages_nature.push({
        id: '',
        libelle: '',
        value: 0
      });
    },

    addAvantagesNumeraire() {
      this.state.form.avantages_numeraire.push({
        id: '',
        libelle: '',
        value: 0
      });
    },

    removeAvantagesNature() {
      this.state.form.avantages_nature.pop();
    },

    removeAvantagesNumeraire() {
      this.state.form.avantages_numeraire.pop();
    },

    addArticles() {
      this.state.form.articles.push({
        id: '',
        titre: '',
        contenu: ''
      });
    },

    removeArticles() {
      this.state.form.articles.pop();
    }
  },

  mounted() {
    let i = 0
    this.avantages_nature.forEach((element) => {
      this.state.avantages_nature_data[0][i] = element;
      i++
    });

    let j = 0
    this.avantages_numeraire.forEach((element) => {
      this.state.avantages_numeraire_data[0][j] = element;
      j++
    });

    this.articleTypeContrats.forEach((element) => {
      this.state.form.articles.push({
        id: element.pivot.article_id,
        position: element.pivot.position,
        titre: element.titre,
        contenu: element.pivot.contenu
      });

    })
    
  },

  components: {
    AppLayout,
    Welcome,
    AppFooter,
    ModalEnfant
  }
};
</script>

<style>
.avatar-wrapper {
  position: relative;
  height: 200px;
  width: 200px;
  margin: 10px auto;
  border-radius: 0%;
  text-align: center;
  overflow: hidden;
  box-shadow: 1px 1px 15px -5px black;
  transition: all 0.3s ease;
}

.avatar-wrapper-logo {
  position: relative;
  height: 200px;
  width: 200px;
  margin: 10px auto;
  border-radius: 50%;
  text-align: center;
  overflow: hidden;
  box-shadow: 1px 1px 15px -5px black;
  transition: all 0.3s ease;
}

.avatar-wrapper:hover {
  transform: scale(1.05);
  cursor: pointer;
}
.avatar-wrapper:hover .profile-pic {
  opacity: 0.5;
}
.profile-pic {
  height: 100%;
  width: 100%;
  transition: all 0.3s ease;
}
.profile-pic:after {
  font-family: FontAwesome;
  content: "\f007";
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  position: absolute;
  font-size: 100px;
  background: #ecf0f1;
  color: #34495e;
  text-align: center;
}
.upload-button {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
}
.fa-arrow-circle-up {
  position: absolute;
  font-size: 234px;
  top: -17px;
  left: 0;
  text-align: center;
  opacity: 0;
  transition: all 0.3s ease;
  color: #34495e;
}
.fa-arrow-circle-up:hover .fa-arrow-circle-up {
  opacity: 0.9;
}
</style>
