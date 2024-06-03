<script setup lang="ts">
import AppLayout from "@/Layouts/AppLayout.vue";
import {useForm} from "@inertiajs/vue3";
defineOptions({layout: AppLayout})

interface Order {
  id: number,
  title: string,
  description: string,
  price: Number,
  deadline: Date
}

const props = defineProps<{
  order: Order,
}>()


const form = useForm({
  title: props.order.title,
  description: props.order.description,
  price: props.order.price,
  deadline: props.order.deadline,
})

const submit = () => {
  form.put(
    route('orders.update', {order: props.order.id}),
    {

    },
  )
}

</script>

<template>
  <div class="row">
    <div class="col">
      <h2>Редактирование</h2>
    </div>
  </div>
  <div class="row">
    <q-form class="col-6 q-gutter-md" @submit.prevent="submit">
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
                <q-date v-model="form.deadline" mask="YYYY-MM-DD HH:mm">
                  <div class="row items-center justify-end">
                    <q-btn v-close-popup label="Close" color="primary" flat />
                  </div>
                </q-date>
              </q-popup-proxy>
            </q-icon>
          </template>

          <template v-slot:append>
            <q-icon name="access_time" class="cursor-pointer">
              <q-popup-proxy cover transition-show="scale" transition-hide="scale">
                <q-time v-model="form.deadline" mask="YYYY-MM-DD HH:mm" format24h>
                  <div class="row items-center justify-end">
                    <q-btn v-close-popup label="Close" color="primary" flat />
                  </div>
                </q-time>
              </q-popup-proxy>
            </q-icon>
          </template>
        </q-input>
      </div>

      <q-btn type="submit" :disable="form.processing">Submit</q-btn>
      <span v-if="form.recentlySuccessful">Saved</span>
    </q-form>
  </div>
</template>
