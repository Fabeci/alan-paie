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
                    <h4>Demande de congés</h4>
                  </div>
                  <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="index.html">Tableau de bord</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">conges</li>
                    </ol>
                  </nav>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="dropdown">
                        <a
                          class="btn btn-secondary dropdown-toggle rounded-0"
                          href="#"
                          role="button"
                          data-toggle="dropdown"
                        >
                          <i class="icon-copy ion-toggle-filled"></i>
                          Interruption
                        </a>
                        <div class="dropdown-menu dropdown-menu-right rounded-0">
                          <a
                            class="btn dropdown-item hover:text-white hover:bg-gray-500"
                            :href="route('conge.index')"
                          >
                            <i class="icon-copy ion-ios-list-outline"></i>
                            Liste de tous les congés
                          </a>
                          <button
                            class="btn dropdown-item hover:text-white hover:bg-gray-500"
                            @click.prevent="apercuContratPdf"
                            target="_bank"
                          >
                            <i class="icon-copy ion-ios-alarm-outline"></i>
                            Congés annuels
                          </button>
                          <button
                            class="btn dropdown-item hover:text-white hover:bg-gray-500"
                            @click.prevent="apercuContratPdf"
                            target="_bank"
                          >
                            <i class="icon-copy ion-ios-alarm-outline"></i>
                            Congés de paternité / maternité
                          </button>
                          <button
                            class="btn dropdown-item hover:text-white hover:bg-gray-500"
                            @click.prevent="apercuContratPdf"
                            target="_bank"
                          >
                            <i class="icon-copy ion-ios-alarm-outline"></i>
                            Congés maladie
                          </button>
                          <button
                            class="btn dropdown-item hover:text-white hover:bg-gray-500"
                            @click.prevent="apercuContratPdf"
                            target="_bank"
                          >
                            <i class="icon-copy ion-ios-alarm-outline"></i>
                            Congés sans solde
                          </button>
                          <button
                            class="btn dropdown-item hover:text-white hover:bg-gray-500"
                            @click.prevent="apercuContratPdf"
                            target="_bank"
                          >
                            <i class="icon-copy ion-ios-timer-outline"></i>
                            Missions
                          </button>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="dropdown">
                        <a
                          class="btn btn-secondary dropdown-toggle rounded-0"
                          href="#"
                          role="button"
                          data-toggle="dropdown"
                        >
                          <i class="icon-copy ion-pinpoint"></i>
                          Discipline
                        </a>
                        <div class="dropdown-menu dropdown-menu-right rounded-0">
                          <button
                            class="btn dropdown-item hover:text-white hover:bg-gray-500"
                            @click.prevent="apercuContratPdf"
                            target="_bank"
                          >
                            <i class="icon-copy fa fa-file-pdf-o" aria-hidden="true"></i>
                            Demandes d'explication
                          </button>
                          <button
                            class="btn dropdown-item hover:text-white hover:bg-gray-500"
                            @click.prevent="apercuContratPdf"
                            target="_bank"
                          >
                            <span class="icon-copy ti-alert"></span>
                            Avertissements
                          </button>
                          <button
                            class="btn dropdown-item hover:text-white hover:bg-gray-500"
                            @click.prevent="apercuContratPdf"
                            target="_bank"
                          >
                            <i class="icon-copy fa fa-file-pdf-o" aria-hidden="true"></i>
                            Blâmes
                          </button>
                          <button
                            class="btn dropdown-item hover:text-white hover:bg-gray-500"
                            @click.prevent="apercuContratPdf"
                            target="_bank"
                          >
                            <i class="icon-copy fa fa-file-pdf-o" aria-hidden="true"></i>
                            Mises à pied
                          </button>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="dropdown">
                        <a
                          class="btn btn-secondary dropdown-toggle rounded-0"
                          href="#"
                          role="button"
                          data-toggle="dropdown"
                        >
                          <i class="icon-copy ion-close-circled"></i>
                          Rupture
                        </a>
                        <div class="dropdown-menu dropdown-menu-right rounded-0">
                          <button
                            class="btn dropdown-item hover:text-white hover:bg-gray-500"
                            @click.prevent="apercuContratPdf"
                            target="_bank"
                          >Fin de CDD</button>
                          <button
                            class="btn dropdown-item hover:text-white hover:bg-gray-500"
                            @click.prevent="apercuContratPdf"
                            target="_bank"
                          >Fin de stage</button>
                          <button
                            class="btn dropdown-item hover:text-white hover:bg-gray-500"
                            @click.prevent="apercuContratPdf"
                            target="_bank"
                          >Demission</button>
                          <button
                            class="btn dropdown-item hover:text-white hover:bg-gray-500"
                            @click.prevent="apercuContratPdf"
                            target="_bank"
                          >Licenciement</button>
                          <button
                            class="btn dropdown-item hover:text-white hover:bg-gray-500"
                            @click.prevent="apercuContratPdf"
                            target="_bank"
                          >Depart à la retraite</button>
                          <button
                            class="btn dropdown-item hover:text-white hover:bg-gray-500"
                            @click.prevent="apercuContratPdf"
                            target="_bank"
                          >Decès</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="btn-list">
									<a :href="route('contrat.create')" class="btn btn-secondary rounded-0"><i class="fa fa-plus"></i> Contrat</a>
									<button type="button" class="btn btn-secondary rounded-0"><i class="fas fa-calendar-week"></i> Pointage</button>
									<button type="button" class="btn btn-secondary rounded-0"><i class="fa fa-calendar"></i> Congés</button>
									<button type="button" class="btn btn-secondary">Danger</button>
                  </div>-->
                </div>
              </div>
            </div>
            <div class="pd-20 card-box mb-10">
              <form>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Type de congé</label>
                      <select 
                        class="form-control h-10 text-sm" 
                        style="width: 100%;"
                        v-model="state.form.type_conge"
                      >
                        <optgroup label="Selectionnez le sexe">
                          <option v-for="typeConge in typeConges" :key="typeConge.id" :value="typeConge.id">{{ typeConge.libelle }}</option>
                        </optgroup>
                      </select>
                      <!-- <span v-if="v$.form.$error" class="text-red-600">{{ v$.form.$errors[0].$message }}</span> -->
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Collaborateur </label>
                      <input
                        v-model="state.form.employe"
                        class="form-control h-10 text-sm"
                        type="text"
                        placeholder=""
                        disabled
                      />
                      <!-- <span v-if="v$.form.$error" class="text-red-600">{{ v$.form.$errors[0].$message }}</span> -->
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Date de debut</label>
                      <input
                        v-model="state.form.date_debut"
                        class="form-control h-10 text-sm"
                        type="date"
                        placeholder="Entrez la date de debut"
                      />
                      <!-- <span v-if="v$.form.nom_emp.$error" class="text-red-600">{{ v$.form.nom_emp.$errors[0].$message }}</span> -->
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Date de fin</label>
                      <input
                        v-model="state.form.date_fin"
                        class="form-control h-10 text-sm" 
                        type="date" 
                        placeholder="Entrez la date de fin" />
                      <!-- <span v-if="v$.form.prenom_emp.$error" class="text-red-600">{{ v$.form.prenom_emp.$errors[0].$message }}</span> -->
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>pièce jointe :</label>
                      <input
                        class="form-control h-10 text-sm" 
                        type="file" 
                        placeholder=""
                        @change="setFile"
                      />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Approbateurs</label>
                      <select
                        v-model="state.form.approbateurs"
                        class="selectpicker h-10 text-sm form-control" 
                        data-size="5" 
                        multiple="multiple" 
                        style="width: 100%;"
                      >
                        <optgroup label="Selectionnez les approbateurs">
                          <option v-for="user in users" :key="user.id" :value="user.id">{{ user.nom+' '+user.prenom }}</option>
                        </optgroup>
                      </select>
                      <!-- <span v-if="v$.form.prenom_emp.$error" class="text-red-600">{{ v$.form.prenom_emp.$errors[0].$message }}</span> -->
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Description :</label>
                      <textarea 
                        class="form-control text-sm"
                        v-model="state.form.description"
                      >
                      </textarea>
                    </div>
                  </div>
                </div>
                <div class="btn-list">
                  <a :href="route('conge.index')" class="btn btn-sm text-white bg-black rounded-0">
                    <i class="icon-copy fi-arrow-left"></i> Retour
                  </a>
                  <a @click.prevent="submit" class="btn btn-primary text-white btn-sm rounded-0">
                    <i class="icon-copy fi-checkbox"></i> Enregistrer
                  </a>
                  <button type="button" class="btn btn-sm btn-danger rounded-0">
                    <i class="icon-copy fi-x-circle"></i> Annuler
                  </button>
                </div>
              </form>
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
  props: ["user", "users", "employes", "typeConges"],

setup() {
    const state = reactive({

      form: {
        type_conge: "",
        employe: '',
        date_debut: "",
        date_fin: "",
        fichier: "",
        approbateurs: [],
        description: ""
      }
    });

    const requiredIf = (value) => value == '3';

    const rules = computed(() => {
      return {
        
        form: {
          type_conge: {
            required: helpers.withMessage("Ce champ est obligatoire", required)
          },
          employe: {
            required: helpers.withMessage("Ce champ est obligatoire", required)
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

  mounted(){
    this.state.form.employe = this.user.nom+' '+this.user.prenom
    // alert(this.state.form.employe)
  },

  methods: {
    setFile(e){
      this.state.form.fichier = e.target.files[0];
    },
    submit(){
      let data = new FormData();

      data.append("type_contrat", this.state.form.type_contrat);
      data.append("employe", this.state.form.employe);
      data.append("date_debut", this.state.form.date_debut);
      data.append("date_fin", this.state.form.date_fin);
      data.append("approbateurs", this.state.form.approbateurs);
      data.append("fichier", this.state.form.fichier);
      data.append("description", this.state.form.description);

      this.$inertia.post("/rh/conge", this.state.form, {
          onSuccess: () => { 
            // this.reset();
            toastr.success("La demande de congé s'est effectuée avec succès !!");
          },
          onError: errors => {
            this.state.errors =
              "L'adresse email que vous avez renseignée existe déjà. Veuillez entrer une autre adresse email ou connectez-vous si vous avez déjà un compte.";
          }
        });
    }
  },

  components: {
    AppLayout,
    AppFooter,
    Welcome
  }
};
</script>
