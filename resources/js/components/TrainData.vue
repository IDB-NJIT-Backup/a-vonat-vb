<template>
  <div class="modal-backdrop">
    <div style="display: block" class="modal" tabindex="-1" @click="$emit('close')">
      <div class="modal-dialog modal-dialog-centered" @click="$event.stopPropagation()">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">TrainData</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    @click="$emit('close')"></button>
          </div>
          <div class="modal-body">

            <form class="was-validated">
              <div class="mb-3">
                <label for="manufacturer" class="form-label">Manufacturer</label>
                <input required type="text" class="form-control" id="manufacturer" v-model="trainData.manufacturer">
              </div>

              <div class="mb-3">
                <label for="model" class="form-label">Model</label>
                <input required type="text" class="form-control" id="model" v-model="trainData.model">
              </div>

              <div class="mb-3">
                <label for="year" class="form-label">Year</label>
                <input required type="number" class="form-control" id="year" v-model="trainData.year">
              </div>

              <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <input required type="text" class="form-control" id="type" v-model="trainData.type">
              </div>

              <div class="mb-3">
                <label for="carries" class="form-label">Carries</label>
                <input required type="text" class="form-control" id="carries" v-model="trainData.carries">
              </div>
            </form>

          </div>
          <div class="modal-footer">
            <div>
              <button v-if="trainData.id" class="btn btn-danger" @click="deleteFn(trainData)">Delete</button>
            </div>
            <div>
              <button class="btn btn-primary" @click="saveFn(trainData)">Save changes</button>
              <button class="btn btn-secondary" @click="$emit('close')">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {TrainModel} from "../models/train.model";

export default {
  name: 'TrainData',
  props: {
    train: TrainModel,
    saveFn: Function,
    deleteFn: Function
  },
  data() {
    return {
      trainData: {}
    }
  },
  created() {
    Object.assign(this.trainData, this.train);
  }
}
</script>

<style scoped>
.modal-backdrop {
  background: rgba(0, 0, 0, .5);
}

.modal-footer {
  justify-content: space-between;
}

.modal-footer > div {
  display: flex;
  gap: .5rem;
}
</style>