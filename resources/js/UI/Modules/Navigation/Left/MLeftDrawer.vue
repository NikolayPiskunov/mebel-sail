<script setup lang="ts">
import {ref} from "vue";
import {NavigationItem} from "@/Contracts/Base/navigation";

defineProps<{
  open: boolean,
  items: NavigationItem[]
}>()

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
          :href="route(item.route)"
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
