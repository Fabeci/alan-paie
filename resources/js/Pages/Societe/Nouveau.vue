<template>
  <div class="bg-image">
    <div class="login-header box-shadow bg-gray-700 text-white">
      <div class="container-fluid d-flex justify-content-between align-items-center">
        <div class="brand-logo">
          <a href="login.html">
            <img :src="this.baseUrl+'vendors/images/logo.png'" alt />
          </a>
        </div>
        <div><strong class="text-5xl text-red-600">alàn</strong></div>
        <div class="login-menu">
          <ul> 
            <li>
              <a class="text-white text-sm" :href="route('login')">
                <span class="icon-copy ti-lock"></span>
                CONNEXION
              </a>
            </li>
          </ul>
        </div>
      </div> 
    </div>
    <div class="pd-20 card-box mb-5 lg:mr-40 sm:mr-20 md:mr-10 xs:mr-5 lg:ml-40 sm:ml-20 md:ml-10 xs:ml-5 mt-4">
      <div class="clearfix mb-4">
        <h4 class="text-blue-800 h4 border-b text-center">CREATION DE VOTRE SOCIETE</h4>
        
      </div>
      <div v-if="state.errors != null" class="bg-red-200 p-2 mb-3 ">
        <span class="text-justify"> {{ state.errors }}</span>
      </div>
      <div 
        class="text-green-500 text-juustify" 
        v-if="password"
      >
        Un compte d'utilisateur a été créé. 
        L'adresse email est celle que vous aviez renseigné et le mot de passe est 
        <strong>{{ password }}</strong>
      </div>
      <div class="wizard-content">
        <form class="tab-wizard wizard-circle wizard">
          <h5 class="bg-gray-400 text-white m-2 p-2 text-center text-lg">Informations de création</h5>
          <section>
            <div class="row">
              <div class="col-sm-6 text-center">
                  <label>Logo de l'entreprise 
                  </label>
                  <span class="text-red-500"> (*) </span>
                  <div class="avatar-wrapper">
                    <img 
                      class="logo-pic" 
                      :src="baseUrl+'vendors/images/logo-image.png'" 
                    />
                    <div class="logo-upload-button">
                      <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                    </div>
                    <input 
                      class="logo-upload"
                      :class="{'border-red-600': this.v$.form.logo.$error }"
                      @change="setLogo" 
                      ref="logo" 
                      type="file"
                      accept="image/*"
                    />
                  </div>
                  <span v-if="v$.form.logo.$error" class="text-red-600">{{ v$.form.logo.$errors[0].$message }}</span>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Raison sociale </label>
                  <span class="text-red-500"> (*) </span>
                  <input 
                    type="text"
                    class="form-control text-sm"
                    :class="{'border-red-600': this.v$.form.nom_commercial.$error }" 
                    v-model="state.form.nom_commercial" placeholder="Entrez le nom commercial de l'entreprise"
                  />
                  <span v-if="v$.form.nom_commercial.$error" class="text-red-600">{{ v$.form.nom_commercial.$errors[0].$message }}</span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Secteur d'activités </label>
                  <span class="text-red-500"> (*) </span>
                  <select 
                    class="custom-select form-control text-sm"
                    :class="{'border-red-600': this.v$.form.secteur_activite.$error }" 
                    v-model="state.form.secteur_activite"
                  >
                    <optgroup label="Selectionnez le secteur d'activité">
                      <option v-for="secteurActivite in secteurActivites" :key="secteurActivite.id" :value="secteurActivite.id">{{ secteurActivite.libelle }}</option>
                    </optgroup>
                  </select>
                  <span v-if="v$.form.secteur_activite.$error" class="text-red-600">{{ v$.form.secteur_activite.$errors[0].$message }}</span>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Activité</label>
                  <span class="text-red-500"> (*) </span>
                  <input
                    type="text"
                    class="form-control text-sm"
                    :class="{'border-red-600': this.v$.form.activite.$error }" 
                    placeholder="Entrez votre activité"
                    v-model="state.form.activite"
                  />
                  <span v-if="v$.form.activite.$error" class="text-red-600">{{ v$.form.activite.$errors[0].$message }}</span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Forme juridique </label>
                  <span class="text-red-500"> (*) </span>
                  <select 
                    class="custom-select form-control text-sm"
                    :class="{'border-red-600': this.v$.form.forme_juridique.$error }" 
                    v-model="state.form.forme_juridique"
                  >
                    <optgroup value label="Selectionnez la forme juridique">
                      <option  selected v-for="formeJuridique in formeJuridiques" :key="formeJuridique.id" :value="formeJuridique.id">{{ formeJuridique.libelle }}</option>
                    </optgroup>
                  </select>
                  <span v-if="v$.form.forme_juridique.$error" class="text-red-600">{{ v$.form.forme_juridique.$errors[0].$message }}</span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>N d'identification </label>
                  <span class="text-red-500"> (*) </span>
                  <input
                    type="text"
                    class="form-control text-sm"
                    :class="{'border-red-600': this.v$.form.numero_identification.$error }" 
                    placeholder="Entrez votre activité"
                    v-model="state.form.numero_identification"
                  />
                  <span v-if="v$.form.numero_identification.$error" class="text-red-600">{{ v$.form.numero_identification.$errors[0].$message }}</span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Date de création </label>
                  <span class="text-red-500"> (*) </span>
                  <input
                    type="date"
                    class="form-control text-sm"
                    :class="{'border-red-600': this.v$.form.date_creation.$error }" 
                    placeholder="Select Date"
                    v-model="state.form.date_creation"
                  />
                  <span v-if="v$.form.date_creation.$error" class="text-red-600">{{ v$.form.date_creation.$errors[0].$message }}</span>
                </div>
              </div>
            </div>
          </section>
          <!-- Step 2 -->
          <h5
            class="bg-gray-400 text-white p-2 text-center text-lg"
          >Informations sur la localisation</h5>
          <section>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Pays </label>
                  <span class="text-red-500"> (*) </span>
                  <select 
                    v-model="state.form.pays" 
                    @change="selectCities(state.form.pays)"
                    class="custom-select form-control text-sm"
                    :class="{'border-red-600': this.v$.form.pays.$error }" 
                  >
                    <optgroup value label="Selectionnez le pays">
                      <option v-for="country in countries" :key="country.id" :value="country.id" selected>{{  country.name+' ( '+country.iso_code3+' )' }}</option>
                    </optgroup>
                  </select>
                  <span v-if="v$.form.pays.$error" class="text-red-600">{{ v$.form.pays.$errors[0].$message }}</span>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Ville </label>
                  <span class="text-red-500"> (*) </span>
                  <select 
                    class="custom-select form-control text-sm" 
                    :class="{'border-red-600': this.v$.form.ville.$error }" 
                    v-model="state.form.ville"
                  >
                    <optgroup value label="Selectionnez la ville">
                    <option v-for="city in state.country.state_city" :key="city.id" :value="city.id" selected>{{  city.name }}</option>
                    </optgroup>
                  </select>
                  <span v-if="v$.form.ville.$error" class="text-red-600">{{ v$.form.ville.$errors[0].$message }}</span>
                </div>
              </div>
              
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Complement </label>
                  <span class="text-red-500"> (*) </span>
                  <input 
                    v-model="state.form.complement" 
                    type="text" 
                    class="form-control text-sm" 
                    :class="{'border-red-600': this.v$.form.complement.$error }" 
                    placeholder="Rue de Champ De Gaulle" 
                  />
                  <span v-if="v$.form.complement.$error" class="text-red-600">{{ v$.form.complement.$errors[0].$message }}</span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Boîte postale </label>
                  <span class="text-red-500"> (*) </span>
                  <input 
                    type="text" 
                    class="form-control text-sm"
                    :class="{'border-red-600': this.v$.form.bp.$error }" 
                    placeholder="BP: 2263" 
                    v-model="state.form.bp" 
                  />
                  <span v-if="v$.form.bp.$error" class="text-red-600">{{ v$.form.bp.$errors[0].$message }}</span>
                </div>
              </div>
            </div>
          </section>
          <!-- Step 3 -->
          <h5
            class="bg-gray-400 text-white mb-3 p-2 text-center text-lg"
          >Informations sur les contacts</h5>
          <section>
            <div class="row">
              <div class="col-md-6">
                <span v-if="v$.form.email.$error" class="text-red-600">{{ v$.form.email.$errors[0].$message }}</span>
                <span class="text-red-500"> (*) </span>
                <div class="input-group ">
                  <input 
                    type="email" 
                    class="form-control text-sm"
                    :class="{'border-red-600': this.v$.form.email.$error }" 
                    v-model="state.form.email" 
                    placeholder="Adresse email"
                  />
                  <div class="input-group-append custom">
                    <span class="input-group-text">
                      <i class="icon-copy dw dw-email1"></i>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <span v-if="v$.form.telephone.$error" class="text-red-600">{{ v$.form.telephone.$errors[0].$message }}</span>
                <span class="text-red-500"> (*) </span>
                <div class="input-group">
                  <input 
                    type="text" 
                    class="form-control text-sm"
                    :class="{'border-red-600': this.v$.form.telephone.$error }" 
                    v-model="state.form.telephone" 
                    placeholder="Téléphone"
                  />
                  <div class="input-group-append custom">
                    <span class="input-group-text">
                      <i class="fa fa-phone"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="input-group">
                  <input type="text" class="form-control text-sm" v-model="state.form.facebook" placeholder="Compte facebook"/>
                  <div class="input-group-append custom">
                    <span class="input-group-text">
                      <i class="fa fa-facebook"></i>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="input-group">
                  <input type="text" class="form-control text-sm" v-model="state.form.linkedin" placeholder="Compte linkedin"/>
                  <div class="input-group-append custom">
                    <span class="input-group-text">
                      <i class="fa fa-linkedin"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="input-group">
                  <input type="email" class="form-control text-sm" v-model="state.form.youtube" placeholder="Compte youtube"/>
                  <div class="input-group-append custom">
                    <span class="input-group-text">
                      <i class="fa fa-youtube"></i>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="input-group">
                  <input type="text" class="form-control text-sm" v-model="state.form.instagram" placeholder="Compte instagram"/>
                  <div class="input-group-append custom">
                    <span class="input-group-text">
                      <i class="fa fa-instagram"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="input-group">
                  <input type="email" class="form-control text-sm" v-model="state.form.twitter" placeholder="Compte twitter"/>
                  <div class="input-group-append custom">
                    <span class="input-group-text">
                      <i class="fa fa-twitter"></i>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="input-group">
                  <input type="text" class="form-control text-sm" v-model="state.form.telegram" placeholder="Compte telegram"/>
                  <div class="input-group-append custom">
                    <span class="input-group-text">
                      <i class="fa fa-telegram"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Description :</label>
                  <textarea class="form-control text-sm" v-model="state.form.description"></textarea>
                </div>
              </div>
            </div>
          </section>

          <section>
            <h5
              class="bg-gray-400 text-white mb-3 p-2 text-center text-lg"
            >Informations sur le dirigeant de l'entreprise</h5>
            <div class="alert alert-info alert-dismissible fade show mt-3" role="alert">
              Scannez vos
              <strong>initiales</strong> et votre
              <strong>signature</strong> et televersez-les en cliquant respectivement sur les images.
            </div>
            <div class="row">
              <div class="col-md-6">
                <span v-if="v$.form.nom_dirigeant.$error" class="text-red-600">{{ v$.form.nom_dirigeant.$errors[0].$message }}</span>
                <span class="text-red-500"> (*) </span>
                <div class="input-group">
                  <input 
                    type="text" 
                    class="form-control text-sm"
                    :class="{'border-red-600': this.v$.form.nom_dirigeant.$error }"
                    v-model="state.form.nom_dirigeant" 
                    placeholder="Nom du dirigeant"
                  />
                  <div class="input-group-append custom">
                    <span class="input-group-text">
                      <i class="fa fa-user"></i>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <span v-if="v$.form.prenom_dirigeant.$error" class="text-red-600">{{ v$.form.prenom_dirigeant.$errors[0].$message }}</span>
                <span class="text-red-500"> (*) </span>
                <div class="input-group">
                  <input 
                    type="text" 
                    class="form-control text-sm"
                    :class="{'border-red-600': this.v$.form.prenom_dirigeant.$error }"
                    v-model="state.form.prenom_dirigeant" 
                    placeholder="Preom du dirigeant"
                  />
                  <div class="input-group-append custom">
                    <span class="input-group-text">
                      <i class="fa fa-user"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Date de naissance </label>
                  <span class="text-red-500"> (*) </span>
                  <input
                    type="date"
                    class="form-control text-sm"
                    :class="{'border-red-600': this.v$.form.datenaiss_dirigeant.$error }" 
                    placeholder="Entrez votre activité"
                    v-model="state.form.datenaiss_dirigeant"
                  />
                  <span v-if="v$.form.datenaiss_dirigeant.$error" class="text-red-600">{{ v$.form.datenaiss_dirigeant.$errors[0].$message }}</span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Sexe </label>
                  <span class="text-red-500"> (*) </span>
                  <select 
                    class="custom-select form-control text-sm"
                    :class="{'border-red-600': this.v$.form.sexe_dirigeant.$error }" 
                    v-model="state.form.sexe_dirigeant"
                  >
                    <optgroup value label="Selectionnez la forme juridique">
                      <option  selected value="M">Masculin</option>
                      <option  selected value="F">Feminin</option>
                    </optgroup>
                  </select>
                  <span v-if="v$.form.sexe_dirigeant.$error" class="text-red-600">{{ v$.form.sexe_dirigeant.$errors[0].$message }}</span>
                </div>
              </div>
            </div>
            <div class="row mt-3 mb-3">
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
                      @change="setInitiiales" 
                      ref="initiales" 
                      type="file" 
                      accept="image/*"
                    />
                </div>
              </div>
              <div class="col-md-6 text-center">
                <div class="form-group">
                  <label>Signature du dirigeant</label>
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
            <div class="row border-t mt-2 pt-3">
              <div class="col-xs-6 col-md-4 col-sm-3 col-lg-3">
                <button 
                  type="button" 
                  @click.prevent="submit"
                  :class="{' cursor-not-allowed ': this.v$.$error }"
                  class="text-sm btn btn-info btn-md px-4 mr-2 raduis-0"
                  :disabled="this.v$.$error"
                >
                  <i class="fa fa-check"></i> Créer la société
                </button>
              </div>
              <div class="col-xs-6 col-md-4 col-sm-3 col-lg-3">
                <button type="button" class="text-sm btn btn-danger btn-md px-4">
                  <i class="fa fa-remove"></i> Annuler la création
                </button>
              </div>
            </div>
          </section>
        </form>
      </div>
    </div>
    <div class="login-header box-shadow bg-gray-700 text-white mt-10 p-2">
      <div class="align-items-center">
        <div class="text-center">
          <div><strong class="text-5xl text-red-600">alàn</strong></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { reactive, computed } from 'vue'
import useVuelidate from '@vuelidate/core'
import { required, email, minLength, maxLength, alphaNum, numeric, helpers } from '@vuelidate/validators'

export default {
  props: [
    "formeJuridiques",
    "secteurActivites",
    "password",
    'countries',
    'cities'
  ],

  setup () {
    
    const state = reactive({
      error: null,
      country: [],

      form: {
        logo: '',
        nom_commercial: '',
        secteur_activite: '',
        activite: '',
        forme_juridique: '',
        numero_identification: '',
        date_creation: '',
        initiales: '',
        signature: '',
        ville: '',
        pays: '',
        complement: '',
        bp: '',
        email: '',
        telephone: '',
        facebook: '',
        linkedin: '',
        youtube: '',
        instagram: '',
        twitter: '',
        telegram: '',
        descriptin: '',
        nom_dirigeant: '',
        prenom_dirigeant: '',
        datenaiss_dirigeant: '',
        sexe_dirigeant: '',
      }
    })

    // const minValue(val){ return new Date(val) < new Date() };

    const minValuefunction = (value) => new Date(value) < new Date();
    const minValueDateNaissance = (value) => new Date(value) < new Date();

    const rules = computed( () => {
      return {
        form: {
          logo: { 
            required: helpers.withMessage('Ce champ est obligatoire', required) 
          },
          nom_commercial: { 
            required: helpers.withMessage('Ce champ est obligatoire', required),
          },
          secteur_activite: { 
            required: helpers.withMessage('Ce champ est obligatoire', required) 
          },
          activite: { 
            required: helpers.withMessage('Ce champ est obligatoire', required), 
            minLength: helpers.withMessage('Veuillez entrer au moins 3 caractères', minLength(3)),
          },
          forme_juridique: { 
            required: helpers.withMessage('Ce champ est obligatoire', required) 
          },
          numero_identification: { 
            required: helpers.withMessage('Ce champ est obligatoire', required),
          },
          date_creation: { 
            required: helpers.withMessage('Ce champ est obligatoire', required),
            minValue: helpers.withMessage("Entrez une date plus petite que celle d'aujourd'hui", minValuefunction),
          },
          ville: { 
            required: helpers.withMessage('Ce champ est obligatoire', required)
          },
          pays: { 
            required: helpers.withMessage('Ce champ est obligatoire', required)
          },
          complement: {
            required: helpers.withMessage('Ce champ est obligatoire', required),
          },
          bp: { 
            required: helpers.withMessage('Ce champ est obligatoire', required), 
            numeric 
          },
          email: { 
            required: helpers.withMessage('Ce champ est obligatoire', required),
            email: helpers.withMessage('Veuillez entrer une adresse email valide', email)
          },
          telephone: { 
            required: helpers.withMessage('Ce champ est obligatoire', required),
            numeric: helpers.withMessage('Veuillez entrer une valeur numerique', numeric)
          },
          nom_dirigeant: { 
            required: helpers.withMessage('Ce champ est obligatoire', required),
            minLength: helpers.withMessage('Le nom doit comporter au moins 2 caractères', minLength(2))
          },
          prenom_dirigeant: { 
            required: helpers.withMessage('Ce champ est obligatoire', required),
            minLength: helpers.withMessage('Le prenom doit comporter au moins 2 caractères', minLength(2))
          },
          sexe_dirigeant: { 
            required: helpers.withMessage('Ce champ est obligatoire', required)
          },
          datenaiss_dirigeant: { 
            required: helpers.withMessage('Ce champ est obligatoire', required),
            minValue: helpers.withMessage("Le dirigeant doit avoir au moins 18 ans", minValueDateNaissance),
          },
        }
      }
    })

    const v$ = useVuelidate(rules, state)

    return { state, v$ }
  },

  

  components: {

  },

  computed: {
    baseUrl() {
      var getUrl = window.location;
      var baseUrl = getUrl.protocol + "//" + getUrl.host + "/template/";
      return baseUrl;
    }
  },

  methods: {
    reset(){

        this.state.logo = '' 
        this.state.nom_commercial = ''
        this.state.secteur_activite = ''
        this.state.activite = '' 
        this.state.forme_juridique = ''
        this.state.numero_identification = '' 
        this.state.date_creation = ''
        this.state.ville = '' 
        this.state.pays = ''
        this.state.complement = '' 
        this.state.bp = ''
        this.state.email = '' 
        this.state.telephone = ''
        this.state.facebook = '' 
        this.state.linkedin = ''
        this.state.youtube = ''
        this.state.instagram = ''
        this.state.twitter = ''
        this.state.telegram = ''
        this.state.description = ''
        this.state.nom_dirigeant = ''
        this.state.prenom_dirigeant = ''
        this.state.sexe_dirigeant = ''
        this.state.datenaiss_dirigeant = ''
        this.state.initailes = ''
        this.state.signature = ''
    },

    submit() {

      let data = new FormData();

      data.append("nom_commercial", this.state.form.nom_commercial);
      data.append("secteur_activite", this.state.form.secteur_activite);
      data.append("activite", this.state.form.activite);
      data.append("forme_juridique", this.state.form.forme_juridique);
      data.append("numero_identification", this.state.form.numero_identification);
      data.append("date_creation", this.state.form.date_creation);
      data.append("ville", this.state.form.ville);
      data.append("pays", this.state.form.pays);
      data.append("complement", this.state.form.complement);
      data.append("bp", this.state.form.bp);
      data.append("email", this.state.form.email);
      data.append("telephone", this.state.form.telephone);
      data.append("facebook", this.state.form.facebook);
      data.append("linkedin", this.state.form.linkedin);
      data.append("youtube", this.state.form.youtube);
      data.append("instagram", this.state.form.instagram);
      data.append("twitter", this.state.form.twitter);
      data.append("telegram", this.state.form.telegram);
      data.append("logo", this.state.form.logo);
      data.append("initiales", this.state.form.initiales);
      data.append("signature", this.state.form.signature);
      data.append("nom_dirigeant", this.state.form.nom_dirigeant);
      data.append("prenom_dirigeant", this.state.form.prenom_dirigeant);
      data.append("datenaiss_dirigeant", this.state.form.datenaiss_dirigeant);
      data.append("sexe_dirigeant", this.state.form.sexe_dirigeant);


      this.v$.$validate()

      if(!this.v$.$error){
        this.$inertia.post("/entreprise", data, {
        onSuccess: () => {
            this.reset()
            toastr.success("L'enregistrement de la société s'est effectué avec succès !!")
        },
        onError: (errors) =>{
          this.state.errors = "L'adresse email que vous avez renseignée existe déjà. Veuillez entrer une autre adresse email ou connectez-vous si vous avez déjà un compte."
        }
      });
      }else{
        
      }
    },

    setInitiiales(e){
      this.state.form.initiales = e.target.files[0];
    },
    setSignature(e){
      this.state.form.signature = e.target.files[0];
    },
    setLogo(e){
      this.state.form.logo = e.target.files[0];
    },

    selectCities(idPays){
      alert(idPays)
      axios.get("/entreprise/create/country/"+idPays,).then((res) => {
        
        
        this.state.country = res.data.cities;
      })
    }
  },

  mounted(){
    
  }
};
</script>
<style>
.avatar-wrapper{
	position: relative;
	height: 200px;
	width: 200px;
	margin: 10px auto;
	border-radius: 0%;
	overflow: hidden;
	box-shadow: 1px 1px 15px -5px black;
	transition: all .3s ease;
}
.avatar-wrapper:hover{
  transform: scale(1.05);
  cursor: pointer;
}
.avatar-wrapper:hover .profile-pic{
  opacity: .5;
}
.profile-pic {
  height: 100%;
  width: 100%;
  transition: all .3s ease;
}
.profile-pic:after{
  font-family: FontAwesome;
  content: "\f007";
  top: 0; left: 0;
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
  top: 0; left: 0;
  height: 100%;
  width: 100%;
}
.fa-arrow-circle-up{
  position: absolute;
  font-size: 234px;
  top: -17px;
  left: 0;
  text-align: center;
  opacity: 0;
  transition: all .3s ease;
  color: #34495e;
}
.fa-arrow-circle-up:hover .fa-arrow-circle-up{
  opacity: .9;
}
</style>
