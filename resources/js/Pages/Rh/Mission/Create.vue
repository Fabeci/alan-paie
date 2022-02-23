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
                    <h4>Demande de missions</h4>
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
                      <label>Motif de mission</label>
                      <input
                        v-model="state.form.date_debut"
                        class="form-control h-10 text-sm"
                        type="text"
                        placeholder="Entrez le motif de la mission"
                      />
                      <!-- <span v-if="v$.form.nom_emp.$error" class="text-red-600">{{ v$.form.nom_emp.$errors[0].$message }}</span> -->
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Participants</label>
                      <select
                        v-model="state.form.approbateurs"
                        class="selectpicker h-10 text-sm form-control"
                        data-size="5"
                        multiple="multiple"
                        style="width: 100%;"
                      >
                        <optgroup label="Selectionnez les participants">
                          <option
                            selected
                            v-for="user in users"
                            :key="user.id"
                            :value="user.id"
                          >{{ user.nom+' '+user.prenom }}</option>
                        </optgroup>
                      </select>
                      <!-- <span v-if="v$.form.$error" class="text-red-600">{{ v$.form.$errors[0].$message }}</span> -->
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Responsable</label>
                      <select
                        v-model="state.form.responsable"
                        class="selectpicker h-10 text-sm form-control"
                        style="width: 100%;"
                      >
                        <optgroup label="Selectionnez un responsable">
                          <option
                            selected
                            v-for="user in users"
                            :key="user.id"
                            :value="user.id"
                          >{{ user.nom+' '+user.prenom }}</option>
                        </optgroup>
                      </select>
                      <!-- <span v-if="v$.form.nom_emp.$error" class="text-red-600">{{ v$.form.nom_emp.$errors[0].$message }}</span> -->
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
                        placeholder="Entrez la date de fin"
                      />
                      <!-- <span v-if="v$.form.prenom_emp.$error" class="text-red-600">{{ v$.form.prenom_emp.$errors[0].$message }}</span> -->
                    </div>
                  </div>
                </div>
                <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Pays </label>
                  <span class="text-red-500"> (*) </span>
                  <select 
                    v-model="state.form.pays" 
                    @change="selectCities(state.form.pays)"
                    class="custom-select form-control text-sm"
                  >
                    <optgroup value label="Selectionnez le pays">
                      <option v-for="country in countries" :key="country.id" :value="country.id" selected>{{  country.name+' ( '+country.iso_code3+' )' }}</option>
                    </optgroup>
                  </select>
                  <!-- <span v-if="v$.form.pays.$error" class="text-red-600">{{ v$.form.pays.$errors[0].$message }}</span> -->
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Ville </label>
                  <span class="text-red-500"> (*) </span>
                  <select 
                    class="custom-select form-control text-sm"  
                    v-model="state.form.ville"
                  >
                    <optgroup value label="Selectionnez la ville">
                    <option v-for="city in state.country.state_city" :key="city.id" :value="city.id" selected>{{  city.name }}</option>
                    </optgroup>
                  </select>
                  <!-- <span v-if="v$.form.ville.$error" class="text-red-600">{{ v$.form.ville.$errors[0].$message }}</span> -->
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
                        placeholder
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
                          <option
                            v-for="user in users"
                            :key="user.id"
                            :value="user.id"
                          >{{ user.nom+' '+user.prenom }}</option>
                        </optgroup>
                      </select>
                      <!-- <span v-if="v$.form.prenom_emp.$error" class="text-red-600">{{ v$.form.prenom_emp.$errors[0].$message }}</span> -->
                    </div>
                  </div>
                </div>
                <div
                    v-if="state.form.fraisMissions.length == 0"
                    class="alert alert-info alert-dismissible fade show"
                    role="alert"
                    >
                    Vous n'avez ajouté aucun
                    <strong>frais  de mission</strong>. Cliquez sur
                    <strong>+</strong> pour les ajouter ou
                    <strong>-</strong> pour les retirer.
                </div>
                <div 
                    class=""
                     v-if="state.form.fraisMissions.length > 0"
                >
                <div 
                    class="row border p-3"
                    v-for="(fraisMission, index) in state.form.fraisMissions"
                    :key="index"
                >
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Frais de mission</label>
                      <select
                        v-model="state.form.fraisMissions[index].libelle"
                        class="h-10 text-sm form-control"
                        style="width: 100%;"
                      >
                        <optgroup label="Selectionnez un frais">
                          <option
                            v-for="user in users"
                            :key="user.id"
                            :value="user.id"
                          >{{ user.nom+' '+user.prenom }}</option>
                        </optgroup>
                      </select>
                      <!-- <span v-if="v$.form.prenom_emp.$error" class="text-red-600">{{ v$.form.prenom_emp.$errors[0].$message }}</span> -->
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Montant :</label>
                      <input
                        class="form-control h-10 text-sm"
                        type="number"
                        placeholder="Entrez le montant"
                        v-model="state.form.fraisMissions[index].montant"
                        @tap="editMontantTotal()"
                      />
                    </div>
                  </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="font-bold">Montant total : {{ state.form.montant_total }} F CFA</div>
                  </div>
                </div>
                <div class="btn-group mb-15 mt-2">
                    <a
                        @click.prevent="addfraisMissions(index)"
                        type="button"
                        class="btn btn-outline-primary mr-2 rounded-none btn-sm"
                    >
                        <span class="icon-copy ti-plus"></span>
                    </a>
                    <a
                        @click.prevent="removefraisMissions"
                        v-if="state.form.fraisMissions.length > 0"
                        type="button"
                        class="btn btn-outline-danger rounded-none btn-sm"
                    >
                        <span class="icon-copy ti-minus"></span>
                    </a>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Description :</label>
                      <textarea class="form-control text-sm" v-model="state.form.description"></textarea>
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
  props: ["user", "users", "employes", "typeConges",'countries', 'cities'],

  setup() {
    const state = reactive({
        
      country: [],
      form: {
        type_conge: "",
        employe: "",
        date_debut: "",
        date_fin: "",
        fichier: "",
        approbateurs: [],
        responsable: '',
        ville: '',
        pays: '',
        fraisMissions: [{id: '', libelle: '', montant: 0}],
        montant_total: 0,
        description: ""
      }
    });

    const requiredIf = value => value == "3";

    const rules = computed(() => {
      return {
        form: {
          type_conge: {
            required: helpers.withMessage("Ce champ est obligatoire", required)
          },
          employe: {
            required: helpers.withMessage("Ce champ est obligatoire", required)
          }
        }
      };
    });

    const v$ = useVuelidate(rules, state);

    return { state, v$ };
  },

  computed: {
    editMontantTotal(){
        // alert(this.state.form.fraisMissions.length)
        // for(var i = 0; i < this.state.form.fraisMissions.length; i++){
        //     if(index == i){
        //         this.state.form.montant_total = this.state.form.montant_total + parseInt(this.state.form.fraisMissions[i])
        //     }
        // }
        var i = 0;
        this.state.form.fraisMissions.forEach(element => {
            alert(i)
            if(index == i){
                this.state.form.montant_total = this.state.form.montant_total + parseInt(element.montant)
            }
            i++
      });
    },
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

  mounted() {
    this.state.form.employe = this.user.nom + " " + this.user.prenom;
    // alert(this.state.form.employe)
  },

  methods: {
    setFile(e) {
      this.state.form.fichier = e.target.files[0];
    },

    selectCities(idPays){
      axios.get("/entreprise/create/country/"+idPays,).then((res) => {
        
        this.state.country = res.data.cities;
      })
    },

    addfraisMissions(index) {
      this.state.form.fraisMissions.push({
        id: '',
        libelle: '',
        montant: 0
      });
    },

    removefraisMissions() {
      this.state.form.fraisMissions.pop();
    },

    submit() {
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
