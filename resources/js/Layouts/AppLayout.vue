<script setup lang="ts">
import MMainLayout from "@/UI/Layouts/MMainLayout.vue";
import MHeader from "@/UI/Modules/Navigation/Top/MHeader.vue";
import MLeftDrawer from "@/UI/Modules/Navigation/Left/MLeftDrawer.vue";
import {ref} from "vue";
import useAuth from "@/Utils/Auth/useAuth";
import {usePage} from "@inertiajs/vue3";


const openLeftDrawer = ref(true);
function toggleLeftDrawer() {
  openLeftDrawer.value = !openLeftDrawer.value;
}

const {navigation} = usePage<PageProps>().props;
const leftDrawer = navigation.left_drawer;

const {useLogout} = useAuth();

function logout() {
  useLogout();
}

</script>

<template>
  <m-main-layout>
    <template #header>
      <m-header
        @toggle-left-drawer="toggleLeftDrawer"
        @logout="logout"
      />
    </template>

    <template #left-drawer>
      <m-left-drawer :open="openLeftDrawer" :items="leftDrawer"/>
    </template>
    <slot></slot>
  </m-main-layout>
</template>
