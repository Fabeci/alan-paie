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
                    <h4>Mise à pied</h4>
                  </div>
                  <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="index.html">Tableau de bord</a>
                      </li>
                      <li class="breadcrumb-item">
                        <a href="index.html">discipline</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">mise à pied</li>
                    </ol>
                  </nav>
                </div>
                <div class="col-md-6 col-sm-6">
                  <dropdown-menu></dropdown-menu>
                </div>
              </div>
            </div>
            <div class="pd-20 card-box mb-10">
              <form>
                <div class="row">
                    <div class="col-md-4">
                    <div class="form-group">
                      <label>Motif </label>
                      <input
                        v-model="state.form.motif"
                        class="form-control h-10 text-sm"
                        type="text"
                        placeholder=""
                      />
                      <!-- <span v-if="v$.form.$error" class="text-red-600">{{ v$.form.$errors[0].$message }}</span> -->
                    </div>
                  </div>
                  
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Services</label>
                      <select 
                        class="form-control h-10 text-sm" 
                        style="width: 100%;"
                        v-model="state.form.service"
                        @change="selectService"
                      >
                        <optgroup label="Selectionnez le sexe">
                         <option v-for="service in services" :key="service.id" :value="service.id">{{ service.libelle }}</option>
                        </optgroup>
                      </select>
                      <!-- <span v-if="v$.form.$error" class="text-red-600">{{ v$.form.$errors[0].$message }}</span> -->
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Postes</label>
                      <select 
                        class="form-control h-10 text-sm" 
                        style="width: 100%;"
                        v-model="state.form.poste"
                      >
                        <optgroup label="Selectionnez le sexe">
                          <option v-for="poste in state.postes" :key="poste.id" :value="poste.id">{{ poste.libelle }}</option>
                        </optgroup>
                      </select>
                      <!-- <span v-if="v$.form.$error" class="text-red-600">{{ v$.form.$errors[0].$message }}</span> -->
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Collaborateurs</label>
                      <select 
                        class="form-control h-10 text-sm" 
                        style="width: 100%;"
                        v-model="state.form.collaborateur"
                      >
                        <optgroup label="Selectionnez le sexe">
                          <option v-for="collaborateur in state.collaborateurs" :key="collaborateur.id" :value="collaborateur.id">{{ collaborateur.nom_emp+' '+collaborateur.prenom_emp }}</option>
                        </optgroup>
                      </select>
                      <!-- <span v-if="v$.form.$error" class="text-red-600">{{ v$.form.$errors[0].$message }}</span> -->
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Superieur hiérarchique</label>
                      <input
                        v-model="state.user"
                        class="form-control h-10 text-sm"
                        type="text"
                        disabled
                      />
                      <!-- <span v-if="v$.form.nom_emp.$error" class="text-red-600">{{ v$.form.nom_emp.$errors[0].$message }}</span> -->
                    </div>
                  </div>
                  <div class="col-md-4">
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
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                        <label>Date de prise d'effet</label>
                        <input
                            v-model="state.form.datePriseEffet"
                            class="form-control h-10 text-sm"
                            type="date"
                            placeholder=""
                            
                        />
                      <!-- <span v-if="v$.form.nom_emp.$error" class="text-red-600">{{ v$.form.nom_emp.$errors[0].$message }}</span> -->
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Date de reprise</label>
                      <input
                        v-model="state.form.dateReprise"
                        class="form-control h-10 text-sm"
                        type="date"
                        placeholder=""
                        
                      />
                      <!-- <span v-if="v$.form.nom_emp.$error" class="text-red-600">{{ v$.form.nom_emp.$errors[0].$message }}</span> -->
                    </div>
                  </div>
                  <div class="col-md-4">
                        <div class="form-group">
                        <label>Durée</label>
                        <input
                            v-model="state.form.date_debut"
                            class="form-control h-10 text-sm"
                            type="text"
                            placeholder="0 j"
                            disabled
                            
                        />
                      <!-- <span v-if="v$.form.nom_emp.$error" class="text-red-600">{{ v$.form.nom_emp.$errors[0].$message }}</span> -->
                    </div>
                  </div>
                </div>
                
                <div class="btn-list">
                  <a :href="route('mise-a-pied.index')" class="btn btn-sm text-white bg-black rounded-0">
                    <i class="icon-copy ion-ios-list-outline"></i> Liste
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
import DropdownMenu from "@/Layouts/DropdownMenu";
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
  props: ["user", "collaborateurs", "services", "postes"],

setup() {
    const state = reactive({
      collaborateurs: [],
      postes: [],
      user: '',

      form: {
        collaborateur: "",
        motif: '',
        service: "",
        poste: "",
        fichier: "",
        datePriseEffet: "",
        dateReprise: ""
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

    selectService(){
      axios.post("/rh/discipline/demande-explication/collaborateur-service", { service : this.state.form.service })
      .then((res) => {
        
        this.state.postes = res.data.postes;
        this.state.collaborateurs = res.data.collaborateurs;
        this.state.user = res.data.chef ? res.data.chef.nom_emp: '';
      })
      .catch(function (error) {

      });
    },

    resetForm(){

      this.state.collaborateurs = [],
      this.state.postes = [],
      this.state.user = '',

      this.state.form.collaborateur = "",
      this.state.form.motif = '',
      this.state.form.service = "",
      this.state.form.poste = "",
      this.state.form.fichier = "",
      this.state.form.datePriseEffet = "",
      this.state.form.dateReprise = ""
    },

    submit(){
      let data = new FormData();

      data.append("collaborateur", this.state.form.collaborateur);
      data.append("motif", this.state.form.motif);
      data.append("service", this.state.form.service);
      data.append("poste", this.state.form.poste);
      data.append("fichier", this.state.form.fichier);
      data.append("poste", this.state.form.datePriseEffet);
      data.append("fichier", this.state.form.dateReprise);

      this.$inertia.post("/rh/discipline/mise-a-pied", this.state.form, {
          onSuccess: () => {
            toastr.success("La mise à pied a été enregistré avec succès !!");
            this.resetForm()
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
    Welcome,
    DropdownMenu
  }
};
</script>
