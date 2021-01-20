<template>
  <div>
    <h3 class="text-center">Edit App User</h3>
    <div class="row">
      <div class="col-md-6">
        <form @submit.prevent="updateAppUser">
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

          <button type="submit" class="btn btn-primary">Update</button>
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
  created() {
    this.axios
      .get(`http://localhost:8000/api/appuser/edit/${this.$route.params.id}`)
      .then((response) => {
        this.appuser = response.data;
        // console.log(response.data);
      });
  },
  methods: {
    updateAppUser() {
      this.axios
        .post(
          `http://localhost:8000/api/appuser/update/${this.$route.params.id}`,
          this.appuser
        )
        .then((response) => {
          this.$router.push({ name: "home" });
        });
    },
  },
};
</script>