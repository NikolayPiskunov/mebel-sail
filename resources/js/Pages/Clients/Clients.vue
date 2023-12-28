<script setup lang="ts">
import AppLayout from "@/Layouts/AppLayout.vue";

defineProps<{
  list: Object[],
}>()

defineOptions({ layout: AppLayout })

</script>

<template>
    <pre>
      {{list}}
    </pre>
</template>

<style scoped>

</style>

