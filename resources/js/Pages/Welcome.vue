<template>
  <div class="bg-bienvenue">
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
      <div class="container">
        <div class="row bg-gray-700 py-3 text-white  text-center">
            <div class="col-sm-10 text-4xl font-bold font-serif">
                Binvenue dans votre application <strong class="text-5xl text-red-600">alàn</strong>
            </div>
            <div class="col-sm-2">
                <div class="input-group mb-0 mt-3">
                    <a 
                      :href="route('entreprise.create')" 
                      class="btn bg-gray-700 text-white btn-sm btn-block"
                    >
                      Continuer 
                    <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
            <span class="col-sm-12 mt-2">Une application de gestion de ressources humaines et de paie parametrable et facile d'utilisation.</span>
        </div>
        <div class="row align-items-center">
          <div class="col-sm-12 col-lg-12 mt-10">
            <center>
            <img :src="this.baseUrl+'vendors/images/logo-accueil.png'" alt />
            </center>
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
              alert("okkk")
              this.form.reset("password")
          }
        });
    },

    societe(){
      this.$inertia.get("/societe");
    }
  }
};
</script>
