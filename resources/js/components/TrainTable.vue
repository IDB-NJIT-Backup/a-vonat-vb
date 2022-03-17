<template>
  <h1>
    <span>TrainTable</span>
    <button class="btn btn-primary" @click="onClickNew()">+ New</button>
  </h1>
  <table class="table table-striped">
    <thead>
    <tr>
      <th>manufacturer</th>
      <th>model</th>
      <th>year</th>
      <th>type</th>
      <th>carries</th>
      <th></th>
    </tr>
    </thead>
    <tbody>
    <tr v-for="t of trains">
      <td>{{ t.manufacturer }}</td>
      <td>{{ t.model }}</td>
      <td>{{ t.year }}</td>
      <td>{{ t.type }}</td>
      <td>{{ t.carries }}</td>
      <td>
        <div class="actions">
          <button class="btn btn-outline-primary" @click="train = t">Edit</button>
          <button class="btn btn-outline-danger" @click="onClickDelete(t)">Delete</button>
        </div>
      </td>
    </tr>
    </tbody>
  </table>

  <TrainData
      :save-fn="onClickSave"
      :delete-fn="onClickDelete"
      v-if="train" :train="train"
      @close="train = null">
  </TrainData>

  <div v-if="isBusy" class="spinner-wrapper">
    <div class="spinner-border text-primary m-auto p-5" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
  </div>
</template>

<script>
import {TrainController} from "../controllers/train.controller";
import {TrainModel} from "../models/train.model";
import TrainData from "./TrainData";

export default {
  name: 'TrainTable',
  components: {
    TrainData
  },
  data() {
    return {
      controller: TrainController.getInstance(),
      isBusy: false,
      trains: [],
      train: null
    }
  },
  created() {
    this.fetchTrains();
  },
  methods: {
    async fetchTrains() {
      this.isBusy = true;

      this.trains = (await this.controller.read())?.data;

      this.isBusy = false;
    },
    onClickNew() {
      this.train = new TrainModel();
    },
    async onClickDelete(train) {
      this.isBusy = true;

      await this.controller.delete(train.id);

      this.isBusy = false;

      this.fetchTrains();
    },
    async onClickSave(train) {
      const {id, ...data} = train;

      for (const key in data) {
        if (!data[key]) return;
      }

      const action = id ? 'update' : 'create';

      this.isBusy = true;

      switch (action) {
        case 'create':
          await this.controller.create(data);

          this.train = null;

          break;
        case 'update':
          await this.controller.update(id, data);
          break;
      }

      this.isBusy = false;

      this.fetchTrains();
    }
  }
}
</script>

<style scoped>
h1 {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

th, td {
  vertical-align: middle;
  text-align: center;
}

.spinner-wrapper {
  background: rgba(255, 255, 255, .5);
  display: flex;
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 10000;
}

.actions {
  display: flex;
  gap: .5rem;
}
</style>