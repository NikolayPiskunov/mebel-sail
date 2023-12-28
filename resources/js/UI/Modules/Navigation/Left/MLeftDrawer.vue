<script setup lang="ts">
import {ref} from "vue";
import {NavigationItem} from "@/Contracts/Base/navigation";
import {router} from "@inertiajs/vue3";

defineProps<{
  open: boolean,
  items: NavigationItem[]
}>()

function goTo(url: string) {
  router.get(url);
}

const miniState = ref(true);

</script>

<template>
  <q-drawer
    :model-value="open"
    side="left"
    behavior="desktop"
    :mini="miniState"
    @mouseover="miniState = false"
    @mouseout="miniState = true"
    mini-to-overlay
    bordered
    elevated
  >
    <q-scroll-area class="fit">
      <q-list padding>
        <q-item
          clickable
          v-ripple
          v-for="(item, key) in items"
          @click="goTo(route(item.route))"
          preserve-scroll
          :key="key"
          :active="item.isActive"
        >
          <q-item-section avatar>
            <q-icon :name="item.icon"/>
          </q-item-section>

          <q-item-section>
            {{ item.label }}
          </q-item-section>
        </q-item>
      </q-list>
    </q-scroll-area>
  </q-drawer>
</template>
