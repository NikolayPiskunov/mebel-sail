<script setup lang="ts">
const emit = defineEmits<{
  (e: 'toggle-left-drawer'): void,
  (e: 'logout'): void,
}>()

</script>

<template>
  <q-header reveal elevated class="bg-primary text-white">
    <q-toolbar>
      <q-btn dense flat round icon="menu" @click="emit('toggle-left-drawer')" />

      <q-toolbar-title>
        <q-avatar>
          <img src="https://cdn.quasar.dev/logo-v2/svg/logo-mono-white.svg">
        </q-avatar>
        It's My First App
      </q-toolbar-title>

      <q-btn flat round dense icon="logout" @click="emit('logout')"/>
    </q-toolbar>
  </q-header>
</template>
