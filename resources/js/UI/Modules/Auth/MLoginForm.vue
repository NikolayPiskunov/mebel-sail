<script setup lang="ts">
defineProps<{
  submitText:String,
  title: String
}>()

const emit = defineEmits<{
  (e: 'submit'): void,
}>()

function submit(){
  emit('submit')
}
</script>

<template>
  <q-card class="q-pa-lg q-pb-xl shadow-4">
    <q-form class="q-gutter-lg" @submit="submit">
      <h1 class="text-h5 text-center">{{ title }}</h1>
      <slot name="inputs"></slot>

      <div class="row justify-between">
        <q-btn type="submit" color="primary">{{ submitText }}</q-btn>
        <slot name="actions"></slot>
      </div>
    </q-form>
  </q-card>
</template>
