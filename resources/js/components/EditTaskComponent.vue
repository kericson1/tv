<template>
  <div>
      <!-- Button trigger modal -->


<!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Modification de tâche</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form>
            <div class="form-group">
                    <label for="name">Nom</label>
                <input type="text" name="name" id="name" class="form-control" v-model="tasktoedit.name">
            </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="button" class="btn btn-primary">Mettre à jour</button>
        </div>
        </div>
    </div>
    </div>
  </div>
  <!-- Button trigger modal -->
</template>
<script>
export default {
    props: ['tasktoedit']
   
};
</script>