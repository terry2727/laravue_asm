<template>
  <v-app id="inspire">
    <div class="col-md-10"></div>
    <div class="col-md-2">
      <router-link :to="{ name: 'add_device' }" class="btn btn-primary"
        >Add Device</router-link
      >
    </div>

    <v-card>
      <v-card-title>
        Nutrition
        <v-spacer></v-spacer>
        <v-text-field
          v-model="search"
          append-icon="mdi-magnify"
          label="Search"
          single-line
          hide-details
        ></v-text-field>
      </v-card-title>
      <v-data-table :headers="headers" :items="desserts" :search="search">
        <template v-slot:item.actions="{ item }">
          <router-link
            :to="{ name: 'edit_device', params: { id: item.id } }"
            class="btn btn-primary"
            >Edit</router-link
          >
          <button class="btn btn-danger" @click.prevent="deleteDevice(item.id)">
            Delete
          </button>
        </template>
      </v-data-table>
    </v-card>
  </v-app>
</template>

<script>
export default {
  data: () => ({
    dialog: false,
    dialogDelete: false,
    headers: [
      {
        text: "Name",
        align: "start",
        sortable: false,
        value: "name",
      },
      { text: "Model", value: "model" },
      { text: "Producer", value: "producer" },
      { text: "Functions", value: "functions" },
      // { text: "Protein (g)", value: "protein" },
      { text: "Actions", value: "actions", sortable: false },
    ],
    desserts: [],
    editedIndex: -1,
    editedItem: {
      name: "",
      model: 0,
      producer: 0,
      functions: 0,
    },
  }),

  computed: {
    formTitle() {
      return this.editedIndex === -1 ? "New Item" : "Edit Item";
    },
  },

  watch: {
    dialog(val) {
      val || this.close();
    },
    dialogDelete(val) {
      val || this.closeDelete();
    },
  },

  created() {
    this.initialize();
  },

  methods: {
    initialize() {
      this.axios.get("http://localhost:8000/api/devices").then((response) => {
        this.desserts = response.data;
      });
    },

    deleteDevice(id) {
      this.axios
        .delete(`http://localhost:8000/api/device/delete/${id}`)
        .then((response) => {
          let i = this.desserts.map((item) => item.id).indexOf(id); // find index of your object
          this.desserts.splice(i, 1);
        });
    },
    editItem(item) {
      this.editedIndex = this.desserts.indexOf(item);
      this.editedItem = Object.assign({}, item);
      this.dialog = true;
    },

    deleteItem(item) {
      this.editedIndex = this.desserts.indexOf(item);
      this.editedItem = Object.assign({}, item);
      this.dialogDelete = true;
    },

    deleteItemConfirm() {
      this.desserts.splice(this.editedIndex, 1);
      this.closeDelete();
    },

    close() {
      this.dialog = false;
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem);
        this.editedIndex = -1;
      });
    },

    closeDelete() {
      this.dialogDelete = false;
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem);
        this.editedIndex = -1;
      });
    },

    save() {
      if (this.editedIndex > -1) {
        Object.assign(this.desserts[this.editedIndex], this.editedItem);
      } else {
        this.desserts.push(this.editedItem);
      }
      this.close();
    },
  },
};
</script>