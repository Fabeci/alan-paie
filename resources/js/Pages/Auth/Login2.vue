<template>
  <div>
    <div class="login-header box-shadow bg-gray-500 text-white">
      <div class="container-fluid d-flex justify-content-between align-items-center">
        <div class="brand-logo">
          <a href="login.html">
            <img :src="this.baseUrl+'vendors/images/logo.png'" alt />
          </a>
        </div>
        <div class="login-menu">
          <ul>
            <li>
              <a class="text-white" :href="route('entreprise.create')">Créer votre société</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 col-lg-7">
            <img :src="this.baseUrl+'vendors/images/login-page-img.png'" alt />
          </div>
          <div class="col-md-6 col-lg-5">
            <div class="login-box bg-white box-shadow border-radius-10">
              <div class="login-title">
                <h2 class="text-center text-primary">Connectez-vous</h2>
              </div>
              <form @submit.prevent="submit">
                <div class="select-role">
                  <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn active">
                      <input type="radio" name="options" id="admin" />
                      <div class="icon">
                        <img :src="this.baseUrl+'vendors/images/briefcase.svg'" class="svg" alt />
                      </div>
                      <span>Je suis</span>
                      Gerant(e)
                    </label>
                    <label class="btn">
                      <input type="radio" name="options" id="user" />
                      <div class="icon">
                        <img :src="this.baseUrl+'vendors/images/person.svg'" class="svg" alt />
                      </div>
                      <span>Je suis</span>
                      Employé(e)
                    </label>
                  </div>
                </div>
                <div class="input-group custom">
                  <input 
                    type="text" 
                    class="form-control form-control-lg" 
                    placeholder="Adresse email" 
                    v-model="form.email"
                    required
                    />
                  <div class="input-group-append custom">
                    <span class="input-group-text">
                      <i class="icon-copy dw dw-email1"></i>
                    </span>
                  </div>
                </div>
                <div class="input-group custom">
                  <input
                    type="password"
                    class="form-control form-control-lg"
                    placeholder="**********"
                    v-model="form.password"
                    
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
                      <a href="forgot-password.html">Mot de passe oublié</a>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="input-group mb-0">
                      <button type="submit" class="btn btn-primary btn-lg btn-block">Connexion</button>
                    </div>
                    <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">Ou</div>
                    <div class="input-group mb-0">
                      <a
                        :href="route('entreprise.create')"
                        class="btn btn-outline-primary btn-lg btn-block"
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

  data() {
    return {
      form: this.$inertia.form({
        email: "",
        password: "",
        remember: false
      })
    };
  },

  computed: {
    baseUrl() {
      var getUrl = window.location;
      var baseUrl = getUrl.protocol + "//" + getUrl.host + "/template/";
      return baseUrl;
    }
  },

  methods: {
    submit() {
      this.form
        .transform(data => ({
          ...data,
          
          remember: this.form.remember ? "on" : ""
        }))
        .post(this.route("login"), {
            
          onFinish: () => {
              this.form.reset("password")
          }
        });
    },

    // societe(){
    //   this.$inertia.get("/societe");
    // }
  }
};
</script>
