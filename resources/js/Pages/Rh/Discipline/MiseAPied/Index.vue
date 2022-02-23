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
            <div class="row clearfix">
					<div v-for="miseAPied in miseAPieds.data" :key="miseAPied.id" class="col-lg-3 col-md-6 col-sm-12 mb-20">
						<div class="da-card">
							<div class="da-card-photo">
								<img :src="baseUrl+'vendors/images/mise_a_pied.png'" alt="">
								<div class="da-overlay da-slide-left">
									<div class="da-social">
										<ul class="clearfix">
											<li><a :href="route('mise-a-pied.show', miseAPied)"><i class="icon-copy ion-eye"></i></a></li>
											<li><a><i class="icon-copy ion-ios-cloud-download-outline"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="da-card-content border">
								<h5 class="h5 mb-2">Motif : {{ miseAPied.discipline.motif }}</h5>
								<h6 class="h6 mb-3 font-bold">Concerné : {{ miseAPied.discipline.employe.nom_emp }}</h6>
                                <h6 class="h6 mb-3">Durée : {{ miseAPied.date_effet+' au '+miseAPied.date_reprise }}</h6>
								<p class="mb-0"></p>
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
  props: ["user", "miseAPieds"],

setup() {
    const state = reactive({

      form: {
        collaborateur: "",
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
    this.state.form.employe = this.user.nom+' '+this.user.prenom
    // alert(this.state.form.employe)
  },

  methods: {
    setFile(e){
      this.state.form.fichier = e.target.files[0];
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
