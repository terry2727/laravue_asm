<template>
  <div>
    <h1>Create New Device</h1>
    <form @submit.prevent="addDevice" method="POST">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Name:</label>
            <input type="text" class="form-control" v-model="device.name" />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Model:</label>
            <input type="text" class="form-control" v-model="device.model" />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Producer:</label>
            <input type="text" class="form-control" v-model="device.producer" />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Functions:</label>
            <input
              type="text"
              class="form-control"
              v-model="device.functions"
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
      device: {},
    };
  },
  methods: {
    addDevice() {
      this.axios
        .post("http://localhost:8000/api/device/add", this.device)
        .then(
          (response) => this.$router.push({ name: "devices" })
          // console.log(response.data)
        )
        .catch((error) => console.log(error))
        .finally(() => (this.loading = false));
    },
  },
};
</script>