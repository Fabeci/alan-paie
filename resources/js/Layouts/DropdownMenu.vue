<template>
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
          >
            <i class="icon-copy ion-ios-alarm-outline"></i>
            Congés annuels
          </button>
          <button
            class="btn dropdown-item hover:text-white hover:bg-gray-500"
            @click.prevent="apercuContratPdf"
          >
            <i class="icon-copy ion-ios-alarm-outline"></i>
            Congés de paternité / maternité
          </button>
          <button
            class="btn dropdown-item hover:text-white hover:bg-gray-500"
            @click.prevent="apercuContratPdf"
          >
            <i class="icon-copy ion-ios-alarm-outline"></i>
            Congés maladie
          </button>
          <button
            class="btn dropdown-item hover:text-white hover:bg-gray-500"
            @click.prevent="apercuContratPdf"
          >
            <i class="icon-copy ion-ios-alarm-outline"></i>
            Congés sans solde
          </button>
          <button
            class="btn dropdown-item hover:text-white hover:bg-gray-500"
            @click.prevent="apercuContratPdf"
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
          <a
            class="btn dropdown-item hover:text-white hover:bg-gray-500"
            @click="nouvelleDemandeExplication"
          >
            <i class="icon-copy fa fa-file-pdf-o" aria-hidden="true"></i>
            Demandes d'explication
          </a>
          <a
            class="btn dropdown-item hover:text-white hover:bg-gray-500"
            @click="nouvelAvertissement"
          >
            <span class="icon-copy ti-alert"></span>
            Avertissements
          </a>
          <a class="btn dropdown-item hover:text-white hover:bg-gray-500" @click="nouvelBlame">
            <i class="icon-copy fa fa-file-pdf-o" aria-hidden="true"></i>
            Blâmes
          </a>
          <a
            class="btn dropdown-item hover:text-white hover:bg-gray-500"
            @click="nouvelleMiseAPied"
          >
            <i class="icon-copy fa fa-file-pdf-o" aria-hidden="true"></i>
            Mises à pied
          </a>
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
          >Fin de CDD</button>
          <button
            class="btn dropdown-item hover:text-white hover:bg-gray-500"
            @click.prevent="apercuContratPdf"
          >Fin de stage</button>
          <button
            class="btn dropdown-item hover:text-white hover:bg-gray-500"
            @click.prevent="apercuContratPdf"
          >Demission</button>
          <a
            class="btn dropdown-item hover:text-white hover:bg-gray-500"
            @click="nouveauLicenciement"
          >Licenciement</a>
          <a
            class="btn dropdown-item hover:text-white hover:bg-gray-500"
            @click="nouvelleRetraite"
          >Depart à la retraite</a>
          <a
            class="btn dropdown-item hover:text-white hover:bg-gray-500"
            :href="route('conge.index')"
          >Decès</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    methods:{
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

    nouveauLicenciement(){
      this.$inertia.get("/rh/licenciement/create", {
          onSuccess: () => { 
            
          },
          onError: errors => {
            this.state.errors =
              "L'adresse email que vous avez renseignée existe déjà. Veuillez entrer une autre adresse email ou connectez-vous si vous avez déjà un compte.";
          }
        });
    },

    nouvelleRetraite(){
      this.$inertia.get("/rh/preavis-retraite/create", {
          onSuccess: () => { 
            
          },
          onError: errors => {
            this.state.errors =
              "L'adresse email que vous avez renseignée existe déjà. Veuillez entrer une autre adresse email ou connectez-vous si vous avez déjà un compte.";
          }
        });
    },

  }
}
</script>