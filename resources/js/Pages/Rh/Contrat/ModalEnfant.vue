<template>
  <div
    class="modal fade"
    id="Medium-modal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="myLargeModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <form>
            <div class="modal-header">
              <h4 class="modal-title" id="myLargeModalLabel">Ajout des enfants ({{ form.enfants.length }})</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div 
                class="row"
                v-for="(enfant, index) in form.enfants"
                :key="index"
                >
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Nom</label>
                      <input v-model="form.enfants[index].nom_enfant" class="form-control h-8 text-xs" type="text" placeholder="Entrez le nom" />
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Prenom</label>
                      <input v-model="form.enfants[index].prenom_enfant" class="form-control h-8 text-xs" type="text" placeholder="Entrez le prenom" />
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Date naissance</label>
                      <input
                        class="form-control h-8 text-xs"
                        type="date"
                        v-model="form.enfants[index].datenaiss_enfant"
                        placeholder="Entrez la date de naissance"
                      />
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button @click.prevent="addChildren" type="button" class="btn btn-outline-info btn-sm">
                <i class="fa fa-plus"></i>
              </button>
              <button @click.prevent="removeChildren" type="button" class="btn btn-outline-info btn-sm">
                <i class="fa fa-remove"></i>
              </button>
              <button @click.prevent="submitChildren" type="button" class="btn btn-primary btn-sm" data-dismiss="modal">
                <i class="fa fa-check"></i>
                Ok
              </button>
            </div>
          </form>
        </div> 
    </div>
  </div>
</template>

<script>
export default {
    emits: ['enfants'],

    data() {
      return {
        form: {
          enfants: [],
        }
      }
    },

    methods: {

      addChildren(){

        this.form.enfants.push({
          nom_enfant: '',
          prenom_enfant: '',
          datenaiss_enfant: ''
        });
      },

      submitChildren(){
        this.$emit('enfants', this.form.enfants);
        this.form.enfants = []
      }
      
    },

    mounted(){
      
    },
    
    removeChildren(){
      this.form.enfants.pop();
    },
}
</script>