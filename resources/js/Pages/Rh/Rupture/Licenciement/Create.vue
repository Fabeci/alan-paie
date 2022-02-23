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
                    <h4>Licenciement</h4>
                  </div>
                  <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="index.html">Tableau de bord</a>
                      </li>
                      <li class="breadcrumb-item">
                        <a href="index.html">rupture</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">licenciement {{ state.form.isPersonnel ? 'personnel' : 'économique' }} </li>
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
                  <div class="col-md-6">
                    <div class="custom-control custom-checkbox mb-5">
                      <input type="checkbox" v-model="state.form.isPersonnel" class="custom-control-input" id="customCheck1">
                      <label class="custom-control-label" for="customCheck1">Motif Personnel</label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Collaborateur</label>
                      <select
                        class="form-control h-10 text-sm"
                        style="width: 100%;"
                        v-model="state.form.collaborateur"
                        @change="selectService"
                      >
                        <optgroup label="Selectionnez le sexe">
                          <option
                            v-for="collaborateur in collaborateurs"
                            :key="collaborateur.id"
                            :value="collaborateur.id"
                          >{{ collaborateur.nom_emp+' '+collaborateur.prenom_emp }}</option>
                        </optgroup>
                      </select>
                      <!-- <span v-if="v$.form.$error" class="text-red-600">{{ v$.form.$errors[0].$message }}</span> -->
                    </div>
                  </div>

                  <div v-if="state.form.isPersonnel" class="col-md-6">
                    <div class="form-group">
                      <label>Nature de la faute</label>
                      <input
                        v-model="state.form.nature"
                        class="form-control h-10 text-sm"
                        type="text"
                        placeholder
                      />
                      <!-- <span v-if="v$.form.$error" class="text-red-600">{{ v$.form.$errors[0].$message }}</span> -->
                    </div>
                  </div>

                  <div v-else class="col-md-6">
                    <div class="form-group">
                      <label>Date de l'accord</label>
                      <input
                        v-model="state.form.dateAccord"
                        class="form-control h-10 text-sm"
                        type="date"
                        placeholder
                      />
                      <!-- <span v-if="v$.form.$error" class="text-red-600">{{ v$.form.$errors[0].$message }}</span> -->
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Date du courier</label>
                      <input
                        v-model="state.form.dateCourrier"
                        class="form-control h-10 text-sm"
                        type="date"
                        placeholder
                      />
                      <!-- <span v-if="v$.form.$error" class="text-red-600">{{ v$.form.$errors[0].$message }}</span> -->
                    </div>
                  </div>

                  <div class="col-md-6" v-if="state.form.isPersonnel">
                    <div class="form-group">
                      <label>Date effet</label>
                      <input
                        v-model="state.form.datePriseEffet"
                        class="form-control h-10 text-sm"
                        type="date"
                        placeholder
                      />
                      <!-- <span v-if="v$.form.$error" class="text-red-600">{{ v$.form.$errors[0].$message }}</span> -->
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6" v-if="state.form.isPersonnel">
                    <div class="form-group">
                      <label>Date retrait</label>
                      <input
                        v-model="state.form.dateRetrait"
                        class="form-control h-10 text-sm"
                        type="date"
                        placeholder
                      />
                      <!-- <span v-if="v$.form.$error" class="text-red-600">{{ v$.form.$errors[0].$message }}</span> -->
                    </div>
                  </div>

                  <div v-if="state.form.isPersonnel" class="col-md-6">
                    <div class="form-group">
                      <label>Services compétents</label>
                      <select
                        class="form-control h-10 text-sm"
                        style="width: 100%;"
                        v-model="state.form.service"
                        @change="selectService"
                      >
                        <optgroup label="Selectionnez le sexe">
                          <option
                            v-for="service in services"
                            :key="service.id"
                            :value="service.id"
                          >{{ service.libelle }}</option>
                        </optgroup>
                      </select>
                      <!-- <span v-if="v$.form.$error" class="text-red-600">{{ v$.form.$errors[0].$message }}</span> -->
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6" v-for="(motif, index) in state.form.motifs" :key="index">
                    <div class="form-group">
                      <label>Motif {{ index + 1 }}</label>
                      <input
                        v-model="state.form.motifs[index].libelle"
                        class="form-control h-10 text-sm"
                        type="text"
                        placeholder
                      />
                      <!-- <span v-if="v$.form.$error" class="text-red-600">{{ v$.form.$errors[0].$message }}</span> -->
                    </div>
                  </div>
                </div>
                  <div class="btn-group mb-15">
                        <button
                          @click.prevent="addMotifs"
                          type="button"
                          class="btn btn-outline-primary mr-2 rounded-none"
                        >
                          <i class="fa fa-plus"></i>
                        </button>
                        <button
                          @click.prevent="removeMotifs"
                          v-if="state.form.motifs.length > 0"
                          type="button"
                          class="btn btn-outline-danger rounded-none"
                        >
                          <i class="fa fa-minus"></i>
                        </button>
                      </div>

                <div class="btn-list">
                  <a @click="listeLicenciements" class="btn btn-sm text-white bg-black rounded-0">
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
      user: "",

      form: {
        isPersonnel: true,
        collaborateur: "",
        nature: "",
        dateCourrier: "",
        dateAccord: "",
        datePriseEffet: "",
        dateRetrait: "",
        service: "",
        motifs: [],
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

    addMotifs() {
      this.state.form.motifs.push({
        libelle: '',
      });
    },

    removeMotifs() {
      this.state.form.motifs.pop();
    },

    selectService() {
      axios
        .post("/rh/discipline/demande-explication/collaborateur-service", {
          service: this.state.form.service
        })
        .then(res => {
          this.state.postes = res.data.postes;
          this.state.collaborateurs = res.data.collaborateurs;
          this.state.user = res.data.chef.nom_emp;
        })
        .catch(function(error) {});
    },

    nouvelAvertissement() {
      this.$inertia.get("/rh/discipline/avertissement/create", {
        onSuccess: () => {},
        onError: errors => {
          this.state.errors =
            "L'adresse email que vous avez renseignée existe déjà. Veuillez entrer une autre adresse email ou connectez-vous si vous avez déjà un compte.";
        }
      });
    },

    nouvelleMiseAPied() {
      this.$inertia.get("/rh/discipline/mise-a-pied/create", {
        onSuccess: () => {},
        onError: errors => {
          this.state.errors =
            "L'adresse email que vous avez renseignée existe déjà. Veuillez entrer une autre adresse email ou connectez-vous si vous avez déjà un compte.";
        }
      });
    },

    nouvelleDemandeExplication() {
      this.$inertia.get("/rh/discipline/demande-explication/create", {
        onSuccess: () => {},
        onError: errors => {
          this.state.errors =
            "L'adresse email que vous avez renseignée existe déjà. Veuillez entrer une autre adresse email ou connectez-vous si vous avez déjà un compte.";
        }
      });
    },

    nouvelBlame() {
      this.$inertia.get("/rh/discipline/blame/create", {
        onSuccess: () => {},
        onError: errors => {
          this.state.errors =
            "L'adresse email que vous avez renseignée existe déjà. Veuillez entrer une autre adresse email ou connectez-vous si vous avez déjà un compte.";
        }
      });
    },

    //Liste

    listeLicenciements() {
      this.$inertia.get("/rh/licenciement", {
        onSuccess: () => {},
        onError: errors => {
          this.state.errors =
            "L'adresse email que vous avez renseignée existe déjà. Veuillez entrer une autre adresse email ou connectez-vous si vous avez déjà un compte.";
        }
      });
    },

    resetForm() {
      (this.state.collaborateurs = []),
        (this.state.postes = []),
        (this.state.user = ""),
        (this.state.form.collaborateur = ""),
        (this.state.form.motif = ""),
        (this.state.form.service = ""),
        (this.state.form.poste = ""),
        (this.state.form.fichier = ""),
        (this.state.form.datePriseEffet = ""),
        (this.state.form.dateReprise = "");
    },

    submit() {
      let data = new FormData();

      data.append("collaborateur", this.state.form.collaborateur);
      data.append("motifs", this.state.form.motifs);
      data.append("dateAccord", this.state.form.dateAccord);
      data.append("datePriseEffet", this.state.form.datePriseEffet);
      data.append("dateRetrait", this.state.form.dateRetrait);
      data.append("service", this.state.form.service);
      data.append("isPersonnel", this.state.form.isPersonnel);
      data.append("nature", this.state.form.nature);

      this.$inertia.post("/rh/licenciement", this.state.form, {
        onSuccess: () => {
          // this.reset();
          toastr.success("Le licenciement a été envoyé au collaborateur !!");
          this.resetForm();
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
