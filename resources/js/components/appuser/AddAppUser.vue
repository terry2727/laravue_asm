<template>
  <div>
    <h1>Create New User</h1>
    <form @submit.prevent="addAppUser" method="POST">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>User Name:</label>
            <input type="text" class="form-control" v-model="appuser.name" />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Address:</label>
            <input type="text" class="form-control" v-model="appuser.address" />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Phone:</label>
            <input
              type="text"
              class="form-control"
              v-model="appuser.phonenumber"
            />
          </div>
        </div>
      </div>
      <br />
      <div class="form-group">
        <button class="btn btn-primary">Add</button>
      </div>
    </form>
  </div>
</template>
 
<script>
export default {
  data() {
    return {
      appuser: {},
    };
  },
  methods: {
    addAppUser() {
      this.axios
        .post("http://localhost:8000/api/appuser/add", this.appuser)
        .then(
          (response) => this.$router.push({ name: "home" })
          // console.log(response.data)
        )
        .catch((error) => console.log(error))
        .finally(() => (this.loading = false));
    },
  },
};
</script>