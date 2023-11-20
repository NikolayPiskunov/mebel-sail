<script setup lang="ts">

const props = defineProps<{
  modelValue: String,
  title: String,
  type: 'email' | 'password' | 'text'
}>()

const emit = defineEmits<{
  (event: 'update:modelValue', payload: string): void;
}>();

function updateValue(value) {
  emit('update:modelValue', value);
}
</script>


<template>
  <q-input
    :model-value="modelValue"
    :type="type"
    :label="title"
    outlined
    @update:model-value="updateValue"
  />
</template>

