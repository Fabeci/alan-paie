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
              <h4 class="modal-title" id="myLargeModalLabel">Approbateurs ({{ form.enfants.length }})</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Service</th>
                    <th scope="row">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <th scope="row">1</th>
                    <th scope="row">1</th>
                    <th scope="row">
                      <a @click.prevent="addChildren" type="button" class="btn btn-outline-success text-green-600 btn-sm rounded-0">
                        <i class="icon-copy fi-checkbox"></i> A approuver
                      </a>
                    </th>
                  </tr>
                </tbody>
              </table>
							
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
                <i class="fa fa-remove"></i> Quitter
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