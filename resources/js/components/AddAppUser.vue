<template>
  <div>
    <h3 class="text-center">Add App User</h3>
    <div class="row">
      <div class="col-md-6">
        <form @submit.prevent="addAppUser">
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" v-model="appuser.name" />
          </div>
          <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" v-model="appuser.address" />
          </div>
          <div class="form-group">
            <label>Phone</label>
            <input
              type="text"
              class="form-control"
              v-model="appuser.phonenumber"
            />
          </div>

          <button type="submit" class="btn btn-primary">Add App User</button>
        </form>
      </div>
    </div>
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