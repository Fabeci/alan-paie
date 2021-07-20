<template>
  <div id="wrapper">
    <app-layout :user="user"></app-layout>
    <div class="main-container">
      <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
          <div class="container pd-0">
            <div class="page-header">
              <div class="row">
                <div class="col-md-12 col-sm-12">
                  <div class="title">
                    <h4>Paramètre de l'application</h4>
                  </div>
                  <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="index.html">Tableau de bord</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">paramètres</li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
            <div class="pd-20 card-box">
              <div class="tab">
                <div class="row clearfix">
                  <div class="col-md-3 col-sm-12">
                    <ul class="nav flex-column nav-pills vtabs" role="tablist">
                      <li class="nav-item">
                        <a
                          class="nav-link active"
                          data-toggle="tab"
                          href="#home7"
                          role="tab"
                          aria-selected="true"
                        >
                          <i class="fa fa-home"></i>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a
                          class="nav-link"
                          data-toggle="tab"
                          href="#profile7"
                          role="tab"
                          aria-selected="false"
                        >
                          <i class="fa fa-users"></i>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a
                          class="nav-link"
                          data-toggle="tab"
                          href="#contact7"
                          role="tab"
                          aria-selected="false"
                        >
                          <i class="fa fa-envelope-o"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="col-md-9 col-sm-12">
                    <div class="tab-content">
                      <div class="tab-pane fade show active" id="home7" role="tabpanel">
                        <div
                          class="pd-20"
                        >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                      </div>
                      <div class="tab-pane fade" id="profile7" role="tabpanel">
                        <div
                          class="pd-20"
                        >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                      </div>
                      <div class="tab-pane fade" id="contact7" role="tabpanel">
                        <div
                          class="pd-20"
                        >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                      </div>
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

export default {
  data() {
    return {
      showingNavigationDropdown: false
    };
  },

  computed: {
    baseUrl() {
      var getUrl = window.location;
      var baseUrl = getUrl.protocol + "//" + getUrl.host + "/template/";
      return baseUrl;
    }
  },
  components: {
    AppLayout,
    AppFooter,
    Welcome
  }
};
</script>
