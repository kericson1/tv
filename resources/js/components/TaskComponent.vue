<template>
  <div class="container mt-5">
    <div class="form-row mb-3">
      <div class="col-row">
        <input
          type="text"
          class="form-control"
          @keyup="searchtask"
          v-model="q"
          placeholder="Rechercher une tâche"
        />
      </div>
    </div>
    <div class="mb-3">
      <add-task @task-added="refresh"></add-task>
    </div>
    <ul class="list-group">
      <li
        class="list-group-item d-fex justify-content-end align-items-center"
        v-for="task in tasks.data"
        :key="task.id"
      >
        <a href="#">{{ task.name }}</a>
        <span class="float-right">
          <a href="#"
            data-toggle="modal"
            data-target="#editModal"
            @click="getTask(task.id)"
          >
		  <i class="bi bi-pencil-square text-primary" style="font-size: 25px;"></i>
          </a>
          <a href="#"
            @click="deleteTask(task.id)"
          >
            <i class="bi bi-trash text-danger" style="font-size: 25px;"></i>
          </a>
        </span>
      </li>
      <edit-task
        v-bind:tasktoedit="tasktoedit"
        @task-updated="refresh"
      ></edit-task>
    </ul>
    <pagination
      :data="tasks"
      @pagination-change-page="getResults"
      class="mt-5"
    ></pagination>
  </div>
</template>

<script>
export default {
  data() {
    return {
      tasks: {},
      tasktoedit: "",
      q: "",
    };
  },
  methods: {
    getResults(page = 1) {
      axios.get("/taskslist?page=" + page).then((response) => {
        this.tasks = response.data;
      });
    },
    getTask(id) {
      axios
        .get("/task/edit/" + id)
        .then((response) => (this.tasktoedit = response.data))
        .catch((error) => console.log(error));
    },
    deleteTask(id) {
      axios
        .delete("/task/" + id)
        .then((response) => (this.tasks = response.data))
        .catch((error) => console.log(error));
    },
    searchtask() {
      if (this.q.length > 3) {
        axios
          .get("/taskslist/" + this.q)
          .then((response) => (this.tasks = response.data))
          .catch((error) => console.log(error));
      } else {
        axios
          .get("/taskslist/")
          .then((response) => (this.tasks = response.data))
          .catch((error) => console.log(error));
      }
    },
    refresh(tasks) {
      this.tasks = tasks.data;
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