<template>
  <div>
      <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Créer une tache
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Creation de tâche</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
           <div class="form-group">
                <label for="name">Nom</label>
            <input type="text" name="name" id="name" class="form-control" v-model="name">
           </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary" @click="storetask">Enregistrer</button>
      </div>
    </div>
  </div>
</div>
  </div>
  <!-- Button trigger modal -->
</template>
<script>
export default {
    data() {
        return {
           name: '' 
        }
        
    },
    methods:{
        storetask() {
            axios.post('/addtask', {name: this.name})
            .then(response => this.$emit('task-added', response))
            .catch(error => console.log(error));
        }
    }
};
</script>