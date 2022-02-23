<template>
  <div class="bg-image">
    <div class="login-header box-shadow bg-gray-700 text-white font-serif">
      <div class="container-fluid d-flex justify-content-between align-items-center">
        <div class="brand-logo">
          <a href="login.html">
            <img :src="this.baseUrl+'vendors/images/logo.png'" alt />
          </a>
        </div>
        <div ><strong class="text-5xl text-red-600">alàn</strong></div>
        <div class="login-menu">
          <ul>
            <li>
              <a class="text-white text-sm" :href="route('entreprise.create')">
                <i class="icon-copy fa fa-plus" aria-hidden="true"></i>
                NOUVELLE SOCIETE</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 col-lg-7">
            <!-- <img :src="this.baseUrl+'vendors/images/bg-login.png'" alt /> -->
          </div>
          <div class="col-md-6 col-lg-5">
            <div class="login-box bg-white box-shadow border-radius-10">
              <div class="login-title">
                <h2 class="text-center text-blue-800 font-serif">Connectez-vous</h2>
              </div>
              <div v-if="state.error != null" class="bg-red-200 p-2 mb-3 ">
                <span class="text-justify"> {{ state.error }}</span>
              </div>
              <form @submit.prevent="submit">
                <div class="select-role mt-3">
                  <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn active">
                      <input type="radio" name="options" id="admin" />
                      <div class="icon text-blue-800">
                        <img :src="this.baseUrl+'vendors/images/briefcase.svg'" class="svg text-blue-800" alt />
                      </div>
                      <span>Je suis</span>
                      Gerant(e)
                    </label>
                    <label class="btn">
                      <input type="radio" name="options" id="user" />
                      <div class="icon">
                        <img :src="this.baseUrl+'vendors/images/person.svg'" class="svg text-blue-800" alt />
                      </div>
                      <span>Je suis</span>
                      Employé(e)
                    </label>
                  </div>
                </div>
                <span v-if="v$.form.email.$error" class="text-red-600">{{ v$.form.email.$errors[0].$message }}</span>
                <div class="input-group custom">
                  <input 
                    type="text" 
                    class="form-control form-control-lg" 
                    placeholder="Adresse email" 
                    v-model="state.form.email"
                    />
                  <div class="input-group-append custom">
                    <span class="input-group-text">
                      <i class="icon-copy dw dw-email1"></i>
                    </span>
                  </div>
                </div>
                <span v-if="v$.form.password.$error" class="text-red-600">{{ v$.form.password.$errors[0].$message }}</span>

                <div class="input-group custom">
                  <input
                    type="password"
                    class="form-control form-control-lg"
                    placeholder="**********"
                    v-model="state.form.password"
                    
                  />
                  <div class="input-group-append custom">
                    <span class="input-group-text">
                      <i class="dw dw-padlock1"></i>
                    </span>
                  </div>
                </div>
                <div class="row pb-30">
                  <div class="col-6">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck1" />
                      <label class="custom-control-label" for="customCheck1">Se souvenir</label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="forgot-password">
                      <a :href="route('password.email')">Mot de passe oublié</a>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="input-group mb-0">
                      <button type="submit" class="btn bg-blue-900 font-serif text-white btn-md btn-block">Connexion</button>
                    </div>
                    <div class="font-16 weight-900 text-blue-800 pt-2 pb-2 text-center" data-color="#125">Ou</div>
                    <div class="input-group mb-0">
                      <a
                        :href="route('entreprise.create')"
                        class="btn btn-outline-info btn-md btn-block"
                      >Créer votre société</a>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import JetAuthenticationCard from "@/Jetstream/AuthenticationCard";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo";
import JetButton from "@/Jetstream/Button";
import JetInput from "@/Jetstream/Input";
import JetCheckbox from "@/Jetstream/Checkbox";
import JetLabel from "@/Jetstream/Label";
import JetValidationErrors from "@/Jetstream/ValidationErrors";

import { reactive, computed } from 'vue'
import useVuelidate from '@vuelidate/core'
import { required, email, minLength, maxLength, alphaNum, numeric, helpers } from '@vuelidate/validators'

export default {
  components: {
    JetAuthenticationCard,
    JetAuthenticationCardLogo,
    JetButton,
    JetInput,
    JetCheckbox,
    JetLabel,
    JetValidationErrors
  },

  props: {
    canResetPassword: Boolean,
    status: String
  },

  setup () {
    
    const state = reactive({
      form: {
        email: "",
        password: "",
        remember: false,
      },
      error: null
    })

    const rules = computed( () => {
      return {
        form: {
          email: { 
            required: helpers.withMessage('Ce champ est obligatoire', required),
            email: helpers.withMessage('Veuillez entrer une adresse email valide', email)
          },
          password: { 
            required: helpers.withMessage('Ce champ est obligatoire', required),
          },
        }
      }
    })

    const v$ = useVuelidate(rules, state)

    return { state, v$ }
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
      this.state.email = ''
      this.state.password = ''
      this.state.remember = false
    },

    submit() {

      this.v$.$validate()

      if(!this.v$.$error){
        this.$inertia.post("/login", this.state.form, {
        onSuccess: () => {
            this.reset()
            toastr.success("Bienvenue dans votre application alàn, une application de gestion de ressources humaines et de paie. ")
        },
        onError: (errors) =>{
          this.state.error = "Il semble que le mot de passe et l'adresse email que vous avez saisis ne soient pas corrects. Si vous avez oublié votre mot de passe, cliquez sur le lien 'Mot de passe oublié' "
        }
      });
      }else{

      }
    },
  }
};
</script>
