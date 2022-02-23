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
                    <h4>Avertissement</h4>
                  </div>
                  <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="index.html">Tableau de bord</a>
                      </li>
                      <li class="breadcrumb-item">
                        <a href="index.html">discipline</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">explication</li>
                    </ol>
                  </nav>
                </div>
                <div class="col-md-6 col-sm-6">
                  <dropdown-menu></dropdown-menu>
                </div>
              </div>
            </div>
            <div class="pd-20 card-box mb-10">
              <div class="row mb-8 border-b">
                  <div class="btn-list mb-2">
                    <button type="button" class="btn rounded-0" data-bgcolor="#3b5998" data-color="#ffffff"><i class="icon-copy fi-page-pdf"></i></button>
                    <button type="button" class="btn rounded-0" data-bgcolor="#3b5998" data-color="#ffffff"><i class="icon-copy fi-print"></i></button>
                  </div>
              </div>
              <form>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Collaborateurs</label>
                      <input
                        v-model="avertissement.disciplines[0].employe.nom_emp"
                        class="form-control h-10 text-sm border-0"
                        type="text"
                        placeholder=""
                        disabled
                      />
                      <!-- <span v-if="v$.form.$error" class="text-red-600">{{ v$.form.$errors[0].$message }}</span> -->
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Motif </label>
                      <input
                        v-model="avertissement.disciplines[0].motif"
                        class="form-control h-10 text-sm border-0"
                        type="text"
                        disabled
                      />
                      <!-- <span v-if="v$.form.$error" class="text-red-600">{{ v$.form.$errors[0].$message }}</span> -->
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Services</label>
                      <input
                        v-model="avertissement.disciplines[0].service.libelle"
                        class="form-control h-10 text-sm border-0"
                        type="text"
                        placeholder=""
                        disabled
                      />
                      <!-- <span v-if="v$.form.$error" class="text-red-600">{{ v$.form.$errors[0].$message }}</span> -->
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Postes</label>
                      <input
                        v-model="avertissement.disciplines[0].poste.libelle"
                        class="form-control h-10 text-sm border-0"
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
                      <label>Superieur hiérarchique</label>
                      <input
                      v-model="avertissement.disciplines[0].service.employe.nom_emp"
                        class="form-control h-10 text-sm border-0"
                        type="text"
                        disabled
                      />
                      <!-- <span v-if="v$.form.nom_emp.$error" class="text-red-600">{{ v$.form.nom_emp.$errors[0].$message }}</span> -->
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>pièce jointe :</label>
                      <input
                        class="form-control h-10 text-sm border-0" 
                        type="file" 
                        placeholder=""
                        @change="setFile"
                      />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <label class="weight-600">Signature des composantes</label>
                    <div class="custom-control custom-checkbox mb-5">
                      <input type="checkbox" class="custom-control-input" id="customCheck1">
                      <label class="custom-control-label" for="customCheck1">Cocher pour appliquer votre signature</label>
                    </div>
                     <!-- <div class="custom-control custom-checkbox mb-5">
                      <input type="checkbox" class="custom-control-input" id="customCheck1">
                      <label class="custom-control-label" for="customCheck1">Cocher pour appliquer votre signature</label>
                    </div>
                     <div class="custom-control custom-checkbox mb-5">
                      <input type="checkbox" class="custom-control-input" id="customCheck1">
                      <label class="custom-control-label" for="customCheck1">Cocher pour appliquer votre signature</label>
                    </div> -->
                  </div>
                </div>
                <div class="btn-list">
                  <a @click="listeAvertissements" class="btn btn-sm text-white bg-black rounded-0">
                    <i class="icon-copy ion-ios-list-outline"></i> Liste
                  </a>
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
  props: ["user", "avertissement"],

setup() {
    const state = reactive({
      isExplain: false,
      form: {
        collaborateur: '',
        motif: '',
        service: "",
        poste: "",
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
    // this.state.form.employe = this.user.nom+' '+this.user.prenom

    // this.state.form.collaborateur = this.avertissement.disciplines[0].employe.nom_emp+' '+avertissement.disciplines[0].employe.prenom_emp
    this.state.form.motif = this.avertissement.disciplines[0].motif
    this.state.form.service = this.avertissement.disciplines[0].service.libelle
    this.state.form.poste = this.avertissement.disciplines[0].poste.libelle
    // alert(this.state.form.employe)
  },

  methods: {
    setFile(e){
      this.state.form.fichier = e.target.files[0];
    },

    explication(){
        this.state.isExplain = true
    },

    nouvelAvertissement(){
      this.$inertia.get("/rh/discipline/avertissement/create", {
          onSuccess: () => { 
            
          },
          onError: errors => {
            this.state.errors =
              "L'adresse email que vous avez renseignée existe déjà. Veuillez entrer une autre adresse email ou connectez-vous si vous avez déjà un compte.";
          }
        });
    },

    nouvelleMiseAPied(){
      this.$inertia.get("/rh/discipline/mise-a-pied/create", {
          onSuccess: () => { 
            
          },
          onError: errors => {
            this.state.errors =
              "L'adresse email que vous avez renseignée existe déjà. Veuillez entrer une autre adresse email ou connectez-vous si vous avez déjà un compte.";
          }
        });
    },

    nouvelleDemandeExplication(){
      this.$inertia.get("/rh/discipline/demande-explication/create", {
          onSuccess: () => { 
            
          },
          onError: errors => {
            this.state.errors =
              "L'adresse email que vous avez renseignée existe déjà. Veuillez entrer une autre adresse email ou connectez-vous si vous avez déjà un compte.";
          }
        });
    },

    nouvelBlame(){
      this.$inertia.get("/rh/discipline/blame/create", {
          onSuccess: () => { 
            
          },
          onError: errors => {
            this.state.errors =
              "L'adresse email que vous avez renseignée existe déjà. Veuillez entrer une autre adresse email ou connectez-vous si vous avez déjà un compte.";
          }
        });
    },

    //Liste

    listeAvertissements(){
      this.$inertia.get("/rh/discipline/avertissement", {
          onSuccess: () => { 
            
          },
          onError: errors => {
            this.state.errors =
              "L'adresse email que vous avez renseignée existe déjà. Veuillez entrer une autre adresse email ou connectez-vous si vous avez déjà un compte.";
          }
        });
    },

    submit(){
      let data = new FormData();

      data.append("collaborateur", this.state.form.collaborateur);
      data.append("motif", this.state.form.motif);
      data.append("service", this.state.form.service);
      data.append("poste", this.state.form.poste);
      data.append("fichier", this.state.form.fichier);

      this.$inertia.post("/rh/discipline/avertissement", this.state.form, {
          onSuccess: () => { 
            // this.reset();
            toastr.success("L'avertissement a été envoyé au collaborateur !!");
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
