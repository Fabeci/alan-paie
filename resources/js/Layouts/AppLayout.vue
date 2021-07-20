<template>
  <div>
    <div class="header">
      <div class="header-left">
        <div class="menu-icon dw dw-menu"></div>
        <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
        <div class="header-search">
          <form>
            <div class="form-group mb-0">
              <i class="dw dw-search2 search-icon"></i>
              <input type="text" class="form-control search-input h-10 text-sm" placeholder="Rechercher ici ...." />
              <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                  <i class="ion-arrow-down-c"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">From</label>
                    <div class="col-sm-12 col-md-10">
                      <input class="form-control form-control-sm form-control-line" type="text" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">To</label>
                    <div class="col-sm-12 col-md-10">
                      <input class="form-control form-control-sm form-control-line" type="text" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Subject</label>
                    <div class="col-sm-12 col-md-10">
                      <input class="form-control form-control-sm form-control-line" type="text" />
                    </div>
                  </div>
                  <div class="text-right">
                    <button class="btn btn-primary">Rechercher</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="header-right">
        <div class="dashboard-setting user-notification">
          <div class="dropdown">
            <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
              <i class="dw dw-settings2"></i>
            </a>
          </div>
        </div>
        <div class="user-notification">
          <div class="dropdown">
            <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
              <i class="icon-copy dw dw-notification"></i>
              <span class="badge notification-active"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="notification-list mx-h-350 customscroll">
                <ul>
                  <li>
                    <a href="#">
                      <img :src="this.baseUrl+'vendors/images/img.jpg'" alt />
                      <h3>John Doe</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <img :src="this.baseUrl+'vendors/images/photo1.jpg'" alt />
                      <h3>Lea R. Frith</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <img :src="this.baseUrl+'vendors/images/photo2.jpg'" alt />
                      <h3>Erik L. Richards</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <img :src="this.baseUrl+'vendors/images/photo3.jpg'" alt />
                      <h3>John Doe</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <img :src="this.baseUrl+'vendors/images/photo4.jpg'" alt />
                      <h3>Renee I. Hansen</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <img :src="this.baseUrl+'vendors/images/img.jpg'" alt />
                      <h3>Vicki M. Coleman</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="user-info-dropdown">
          <div class="dropdown">
            <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
              <span class="user-icon">
                <img  v-if="user.profile_photo_path != null" :src="this.baseUrl2+user.profile_photo_path" alt/>
                <img  v-if="user.profile_photo_path == null" :src="this.baseUrl2+'images_profils/avatar-male.png'" alt/>
              </span>
              <span class="user-name mr-2">{{ user.name }}</span>
              <i class="icon-copy fa fa-circle text-green-600" aria-hidden="true"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
              <a class="dropdown-item" href="profile.html">
                <i class="dw dw-user1"></i> Profil
              </a>
              <a class="dropdown-item" href="profile.html">
                <i class="dw dw-settings2"></i> Paramètre
              </a>
              <a class="dropdown-item" href="faq.html">
                <i class="dw dw-help"></i> Aide
              </a>
              <button @click.prevent="logout" class="dropdown-item">
                <i class="dw dw-logout"></i> Déconnexion
              </button>
            </div>
          </div>
        </div>
        
      </div>
    </div>

    <div class="left-side-bar">
      <div class="brand-logo mb-3">
        <a href="index.html">
          <img :src="this.baseUrl+'vendors/images/logo.png'" alt class="dark-logo" />
          <img :src="this.baseUrl+'vendors/images/logo.png'" alt class="light-logo" />
          <span class="ml-5 text-blue-800 text-4xl">ALÀN</span>
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
          <i class="ion-close-round"></i>
        </div>
      </div>
      <div class="menu-block customscroll">
        <div class="sidebar-menu">
          <ul id="accordion-menu">
            <li class="dropdown">
              <a href="/dashboard" class="dropdown-toggle no-arrow">
                <span class="micon dw dw-house-1"></span>
                <span class="mtext">Tableau de bord</span>
              </a>
            </li>
            <li class="dropdown">
              <a :href="route('employe.index')" class="dropdown-toggle no-arrow">
                <span class="micon dw dw-user1"></span>
                <span class="mtext">Gestion de RH</span>
              </a>
            </li>
            <li class="dropdown">
              <a href="javascript:;" class="dropdown-toggle no-arrow">
                <span class="micon dw dw-library"></span>
                <span class="mtext">Gestion de paie</span>
              </a>
            </li>
            <li>
              <a href="calendar.html" class="dropdown-toggle no-arrow">
                <span class="micon dw dw-calendar1"></span>
                <span class="mtext">Bibliothèque</span>
              </a>
            </li>
            <li class="dropdown">
              <a href="javascript:;" class="dropdown-toggle no-arrow">
                <span class="micon dw dw-user2"></span>
                <span class="mtext">Utilisateurs</span>
              </a>
            </li>
            <li class="dropdown">
              <a :href="route('societe.index')" class="dropdown-toggle no-arrow">
                <span class="micon dw dw-settings2"></span>
                <span class="mtext">Paramètres</span>
              </a>
            </li>
            <li class="dropdown">
              <a href="javascript:;" class="dropdown-toggle no-arrow">
                <span class="micon dw dw-analytics-21"></span>
                <span class="mtext">Statistiques</span>
              </a>
            </li>
            
            <li>
              <a href="chat.html" class="dropdown-toggle no-arrow">
                <span class="micon dw dw-chat3"></span>
                <span class="mtext">Chat</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="mobile-menu-overlay"></div>
  </div>
</template>

<script>
import JetApplicationMark from "@/Jetstream/ApplicationMark";
import JetBanner from "@/Jetstream/Banner";
import JetDropdown from "@/Jetstream/Dropdown";
import JetDropdownLink from "@/Jetstream/DropdownLink";
import JetNavLink from "@/Jetstream/NavLink";
import JetResponsiveNavLink from "@/Jetstream/ResponsiveNavLink";

export default {
  components: {
    JetApplicationMark,
    JetBanner,
    JetDropdown,
    JetDropdownLink,
    JetNavLink,
    JetResponsiveNavLink
  },

  props: {
    user:Object
  },

  data() {
    return {
      showingNavigationDropdown: false,
      user: this.user
    };
  },

  computed: {
    baseUrl(){
        var getUrl = window.location;
        var baseUrl = getUrl .protocol + "//" + getUrl.host + "/template/";
        return baseUrl;
    },
    
    baseUrl2(){
        var getUrl = window.location;
        var baseUrl = getUrl .protocol + "//" + getUrl.host + "/storage/";
        return baseUrl;
    }
  },

  mounted(){
    
  },

  methods: {
    switchToTeam(team) {
      this.$inertia.put(
        route("current-team.update"),
        {
          team_id: team.id
        },
        {
          preserveState: false
        }
      );
    },

    logout() {
      this.$inertia.post(route("logout"));
    }
  }
};
</script>
