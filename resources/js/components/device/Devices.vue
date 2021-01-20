<!--
 <template>
  <div>
    <h1>Devices</h1>
    <div class="row">
      <div class="col-md-10"></div>
      <div class="col-md-2">
        <router-link :to="{ name: 'add_device' }" class="btn btn-primary"
          >Add Device</router-link
        >
      </div>
    </div>
    <br />

    <table class="table table-hover">
      <thead>
        <tr>
          <th>Name</th>
          <th>Model</th>
          <th>Producer</th>
          <th>Functions</th>
          <th>Actions</th>  
        </tr>
      </thead>
      <tbody>
        <tr v-for="device in devices" :key="device.id">
          <td>{{ device.name }}</td>
          <td>{{ device.model }}</td>
          <td>{{ device.producer }}</td>
          <td>{{ device.functions }}</td>
          <td>
            <router-link
              :to="{ name: 'edit_device', params: { id: device.id } }"
              class="btn btn-primary"
              >Edit</router-link>
            <button
              class="btn btn-danger"
              @click.prevent="deleteDevice(device.id)"
            >
              Delete
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      devices: [],
    };
  },
  created() {
    this.axios.get("http://localhost:8000/api/devices").then((response) => {
      this.devices = response.data;
    });
  },
  methods: {
    deleteDevice(id) {
      this.axios
        .delete(`http://localhost:8000/api/device/delete/${id}`)
        .then((response) => {
          let i = this.devices.map((item) => item.id).indexOf(id); // find index of your object
          this.devices.splice(i, 1);
        });
    },
  },
};
</script>

-->

<template>
  <div id="app">
    <h1>Devices</h1>
    <div class="row">
      <div class="col-md-10"></div>
      <div class="col-md-2">
        <router-link :to="{ name: 'add_device' }" class="btn btn-primary"
          >Add Device</router-link
        >
      </div>
    </div>
    <br />
    <vue-bootstrap4-table :rows="devices" :columns="columns" :config="config">
    </vue-bootstrap4-table>
  </div>
</template>

<script>
import VueBootstrap4Table from "vue-bootstrap4-table";

export default {
  name: "App",
  data: function () {
    return {
      devices: [],
      columns: [
        {
          label: "Name",
          name: "name",
          filter: {
            type: "simple",
            placeholder: "Device name",
          },
          sort: true,
        },
        {
          label: "Model",
          name: "model",
          filter: {
            type: "simple",
            placeholder: "Enter model",
          },
          sort: true,
        },
        {
          label: "Producer",
          name: "producer",
          sort: true,
        },
        {
          label: "Functions",
          name: "functions",
        },
        {
          label: "Actions",
          name: "actions",
        },
      ],
      config: {
        checkbox_rows: false,
        rows_selectable: true,
        card_title: "List of devices",
      },
    };
  },
  created() {
    this.axios.get("http://localhost:8000/api/devices").then((response) => {
      this.devices = response.data;
    });
  },
  methods: {
    deleteDevice(id) {
      this.axios
        .delete(`http://localhost:8000/api/device/delete/${id}`)
        .then((response) => {
          let i = this.devices.map((item) => item.id).indexOf(id); // find index of your object
          this.devices.splice(i, 1);
        });
    },
  },
  components: {
    VueBootstrap4Table,
  },
};
</script>