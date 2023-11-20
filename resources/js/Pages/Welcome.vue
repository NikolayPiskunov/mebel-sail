<script setup>
import {Head, Link} from '@inertiajs/vue3';

</script>

<template>
  <Head title="Welcome"/>
  Welcome
  <Link :href="route('login')">Login</Link>
</template>
