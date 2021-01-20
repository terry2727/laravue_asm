<template>
  <div>
    <h1>Edit Device</h1>
    <form @submit.prevent="updateDevice">
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
        <button class="btn btn-primary">Update</button>
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
  created() {
    this.axios
      .get(`http://localhost:8000/api/device/edit/${this.$route.params.id}`)
      .then((response) => {
        this.device = response.data;
        // console.log(response.data);
      });
  },
  methods: {
    updateDevice() {
      this.axios
        .post(
          `http://localhost:8000/api/device/update/${this.$route.params.id}`,
          this.device
        )
        .then((response) => {
          this.$router.push({ name: "devices" });
        });
    },
  },
};
</script>