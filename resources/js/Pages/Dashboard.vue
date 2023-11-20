<script setup>
import {router} from "@inertiajs/vue3";

const logout = () => {
  router.post(route('logout'));
};
</script>

<template>
    Dashboard
    <q-btn @click="logout">Logout</q-btn>
</template>
