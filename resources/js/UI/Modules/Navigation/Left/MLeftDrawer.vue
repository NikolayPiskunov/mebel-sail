<script setup lang="ts">
import {ref} from "vue";

defineProps<{
  open: Boolean
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
        <q-item clickable v-ripple>
          <q-item-section avatar>
            <q-icon name="inbox" />
          </q-item-section>

          <q-item-section>
            Inbox
          </q-item-section>
        </q-item>

        <q-item active clickable v-ripple>
          <q-item-section avatar>
            <q-icon name="star" />
          </q-item-section>

          <q-item-section>
            Star
          </q-item-section>
        </q-item>

        <q-item clickable v-ripple>
          <q-item-section avatar>
            <q-icon name="send" />
          </q-item-section>

          <q-item-section>
            Send
          </q-item-section>
        </q-item>

        <q-separator />

        <q-item clickable v-ripple>
          <q-item-section avatar>
            <q-icon name="drafts" />
          </q-item-section>

          <q-item-section>
            Drafts
          </q-item-section>
        </q-item>
      </q-list>
    </q-scroll-area>
  </q-drawer>
</template>
