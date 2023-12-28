<script setup lang="ts">
import AppLayout from "@/Layouts/AppLayout.vue";

defineProps<{
  list: Object[],
}>()

</script>

<template>
  <app-layout>
    <pre>
      {{list}}
    </pre>

  </app-layout>
</template>

<style scoped>

</style>
