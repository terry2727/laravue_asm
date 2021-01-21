<template>
  <div>
    <h1>Edit Post</h1>
    <form @submit.prevent="updateAppUser">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Name:</label>
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
            <input type="text" class="form-control" v-model="appuser.phonenumber" />
          </div>
        </div>
      </div>

      <br />
      <div class="form-group">
        <button class="btn btn-primary">Update</button>
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
  created() {
    this.axios
      .get(`http://localhost:8000/api/appuser/edit/${this.$route.params.id}`)
      .then((response) => {
        this.appuser = response.data.data;
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