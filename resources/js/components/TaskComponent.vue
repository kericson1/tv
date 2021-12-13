<template name="component-name">
  <div class="container mt-5">
      <div class="mb-3">
          <add-task @task-added="refresh"></add-task>
      </div>
    <ul class="list-group">
      <li class="list-group-item" v-for="task in tasks.data" :key="task.id">
        <a href="#">{{ task.name }}</a>
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#editModal" @click="getTask(task.id)">
            Modifier
        </button>
        <edit-task v-bind:tasktoedit="tasktoedit"></edit-task>
      </li>
    </ul>
    <pagination :data="tasks" @pagination-change-page="getResults" class="mt-5"></pagination>
  </div>
</template>

<script>
export default {
  data() {
    return {
      tasks: {},
      tasktoedit: ''
    };
  },
  methods: {
    getResults(page = 1) {
      axios.get("/taskslist?page=" + page)
      .then((response) => {
        this.tasks = response.data;
      });
    },
    getTask(id){
        axios.get('/task/edit/'+id)
        .then(response => this.tasktoedit = response.data)
        .catch(error => console.log(error));
    }
    ,
    refresh(tasks) {
        this.tasks = tasks.data
    },
  },
  created() {
    axios
      .get("/taskslist")
      .then((response) => (this.tasks = response.data))
      .catch((error) => console.log(error));
  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>