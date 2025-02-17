<script setup lang="ts">

import {computed} from "vue";
import {useForm} from "@inertiajs/vue3";

const props = defineProps<{
  modelValue: boolean,
}>();

const emit = defineEmits(['update:modelValue']);

const show = computed({
  get() {
    return props.modelValue;
  },
  set(value) {
    emit('update:modelValue', value);
  }
})

const form = useForm({
  title: '',
  description: '',
  price: 0,
  deadline: new Date().toLocaleDateString(),
});

const closeModal = () => {
  form.reset();
  show.value = false;
}

const submit = () => {
  form.post(
    route('orders.store'),
    {
      onSuccess: () => {
        closeModal();
      }
    }
  )
}

const formClear = () => {
  form.reset();
  form.clearErrors();
}

</script>

<template>
  <q-dialog v-model="show" :persistent="form.processing" @update:model-value="formClear">
    <q-card style="min-width: 350px">
      <q-card-section>
        <div class="text-h6">New order</div>
      </q-card-section>

      <q-card-section class="q-pt-none q-gutter-md">
        <q-input
          v-model="form.title"
          label="Title"
          outlined
          :error="!!form.errors.title"
          :error-message="form.errors.title"
          @update:model-value="form.clearErrors('title')"
        />
        <q-input
          v-model="form.description"
          label="Description"
          type="textarea"
          outlined
          :error="!!form.errors.description"
          :error-message="form.errors.description"
          @update:model-value="form.clearErrors('description')"
        />
        <q-input
          v-model="form.price"
          label="Price"
          outlined
          :error="!!form.errors.price"
          :error-message="form.errors.price"
          @update:model-value="form.clearErrors('price')"
        />
        <div>
          <q-input
            v-model="form.deadline"
            outlined
            :error="!!form.errors.deadline"
            :error-message="form.errors.deadline"
            @update:model-value="form.clearErrors('deadline')"
          >
            <template v-slot:prepend>
              <q-icon name="event" class="cursor-pointer">
                <q-popup-proxy cover transition-show="scale" transition-hide="scale">
                  <q-date v-model="form.deadline" mask="DD.MM.YYYY HH:mm">
                    <div class="row items-center justify-end">
                      <q-btn v-close-popup label="Ok" color="primary" flat />
                    </div>
                  </q-date>
                </q-popup-proxy>
              </q-icon>
            </template>

            <template v-slot:append>
              <q-icon name="access_time" class="cursor-pointer">
                <q-popup-proxy cover transition-show="scale" transition-hide="scale">
                  <q-time v-model="form.deadline" mask="DD.MM.YYYY HH:mm" format24h>
                    <div class="row items-center justify-end">
                      <q-btn v-close-popup label="Ok" color="primary" flat />
                    </div>
                  </q-time>
                </q-popup-proxy>
              </q-icon>
            </template>
          </q-input>
        </div>
      </q-card-section>

      <q-card-actions align="right" class="text-primary">
        <q-btn flat label="Cancel" :disable="form.processing" @click="closeModal"/>
        <q-btn flat label="Save" :disable="form.processing" @click="submit"/>
      </q-card-actions>
    </q-card>
  </q-dialog>
</template>
