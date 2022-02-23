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
                            :href="route('conge.create')"
                          >
                            <i class="icon-copy ion-ios-plus-outline"></i>
                            Nouveau congé
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
                </div>
              </div>
            </div>
            <div class="pd-20 card-box mb-10">
              <table class="table hover data-table-export nowrap">
                <thead>
                  <tr>
                    <th class="table-plus datatable-nosort">Matricule</th>
                    <th>Collab.</th>
                    <th>approbat.</th>
                    <th>Type conge</th>
                    <th>Date debut</th>
                    <th>Date fin</th>
                    <th>Durée</th>
                    <th>Statut</th>
                    <th class="datatable-nosort">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="conge in conges.data" :key="conge.id">
                    <td class="table-plus">{{ conge.id }}</td>
                    <td>{{ conge.user.nom+' '+conge.user.prenom }}</td>
                    <td>
                        <span class="text-center" v-for="user in conge.users" :key="user.id">
                            <i class="dw dw-user m-2" data-container="body" data-toggle="popover" data-placement="top" :data-content="user.nom+' '+user.prenom" title="Approbateur"></i>
                        </span>
                    </td>
                    <td>{{ conge.type_conge.libelle }}</td>
                    <td>{{ conge.date_debut }}</td>
                    <td>{{ conge.date_fin }}</td>
                    <td>{{conge.duree }} {{ conge.duree >1 ?' jours' : 'jour' }}</td>
                    <td>{{ conge.statut }}</td>
                    <td>
                      <div class="dropdown">
                        <a
                          class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                          href="#"
                          role="button"
                          data-toggle="dropdown"
                        >
                          <i class="dw dw-more"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                          <a class="dropdown-item" href="#">
                            <i class="dw dw-eye"></i> Voir
                          </a>
                          <a class="dropdown-item" :href="route('conge.edit', conge.id)">
                            <i class="dw dw-edit2 text-blue"></i> Editer
                          </a>
                          <a class="dropdown-item" :href="route('conge.show', conge)">
                            <i class="dw dw-delete-3 text-red-400"></i> Suppr.
                          </a>
                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#Medium-modal">
                            <i class="dw dw-check text-green-600"></i> Appr.
                          </a>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <app-footer></app-footer>
      </div>
      
      <modal-approbateurs :congeApp="congeApp"></modal-approbateurs>
    </div>
  </div>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Welcome from "@/Jetstream/Welcome";
import AppFooter from "@/Layouts/AppFooter";
import ModalApprobateurs from "@/Pages/Rh/Conge/ModalApprobateurs";
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
  props: ["user", "users", "employes", "type_conge", "conges"],

  setup() {
    const state = reactive({
      congeApp: '',
      form: {
        type_conge: "",
        employe: "",
        date_debut: "",
        date_fin: "",
        fichier: "",
        approbateurs: [],
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
    console.log(this.state.form.type_conge);
  },

  methods: {
    setFile(e) {
      this.state.form.fichier = e.target.files[0];
    },

    congeApprouve(conge){
        this.state.congeApp = conge
        console.log(conge)
    },

    deleteConge(){

        alert(id)
        // axios.delete("/rh/conge/"+id,).then((res) => {
        //     toastr.success("La demande de congé a été supprimée avec succès !!");
        // })
    }
  },

  components: {
    AppLayout,
    AppFooter,
    Welcome,
    ModalApprobateurs
  }
};
</script>

