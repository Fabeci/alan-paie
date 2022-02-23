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
                      <li class="breadcrumb-item active" aria-current="page">Les licenciements</li>
                    </ol>
                  </nav>
                </div>
                <div class="col-md-6 col-sm-6">
                  <dropdown-menu></dropdown-menu>
                </div>
              </div>
            </div>
            <div class="pd-20 card-box">
              <div class="tab">
                <ul class="nav nav-tabs customtab" role="tablist">
                  <li class="nav-item">
                    <a
                      class="nav-link active"
                      data-toggle="tab"
                      href="#home2"
                      role="tab"
                      aria-selected="true"
                    >Licenciements personnels</a>
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link"
                      data-toggle="tab"
                      href="#profile2"
                      role="tab"
                      aria-selected="false"
                    >Licenciements économiques</a>
                  </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="home2" role="tabpanel">
                    <div
                      class="pd-20"
                    >
                    <table class="table hover data-table-export nowrap">
                        <thead>
                        <tr>
                            <th class="table-plus datatable-nosort">Identifiant</th>
                            <th>Libelle</th>
                            <th class="datatable-nosort">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr v-for="licenciementPersonnel in licenciementPersonnels" :key="licenciementPersonnel.id">
                                <td>{{ 'N '+licenciementPersonnel.id }}</td>
                                <td><a :href="route('licenciement.pdf.previewPersonnel', licenciementPersonnel.id)" target="_target">{{ 'Avis_de_licenciement_personnel_de_'+licenciementPersonnel.licenciement.employe.nom_emp+'_'+licenciementPersonnel.licenciement.employe.prenom_emp+'_le_'+licenciementPersonnel.licenciement.created_at }}</a></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="profile2" role="tabpanel">
                    <div
                      class="pd-20"
                    >
                    <table class="table hover data-table-export nowrap">
                        <thead>
                        <tr>
                            <th class="table-plus datatable-nosort">Identifiant</th>
                            <th>Libelle</th>
                            <th class="datatable-nosort">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr v-for="licenciementEconomique in licenciementEconomiques" :key="licenciementEconomique.id">
                                <td>{{ 'N '+licenciementEconomique.id }}</td>
                                <td><a :href="route('licenciement.pdf.previewEconomique', licenciementEconomique.id)" target="_target">{{ 'Avis_de_licenciement_economique_de_'+licenciementEconomique.licenciement.employe.nom_emp+' '+licenciementEconomique.licenciement.employe.prenom_emp+'_le_'+licenciementEconomique.licenciement.created_at }}</a></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
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
  props: ["user", "licenciementPersonnels", "licenciementEconomiques"],

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
        motifs: []
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
        libelle: ""
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

    listeAvertissements() {
      this.$inertia.get("/rh/discipline/avertissement", {
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
