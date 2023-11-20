<script setup>
import QAuthLayout from "@/UI/Layouts/MAuthLayout.vue";
</script>

<template>
  <QAuthLayout>
    <div class="min-h-screen flex flex-col justify-center items-center">
      <div class="w-full sm:max-w-md mt-6  bg-white overflow-hidden">
        <slot></slot>
      </div>
    </div>
  </QAuthLayout>
</template>


