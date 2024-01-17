<script setup lang="ts">
import AppLayout from "@/Layouts/AppLayout.vue";

defineOptions({ layout: AppLayout })

defineProps<{
  orders: Object[],
  columns: Column[],
  row_id: string
}>()

interface Column {
  name: string,
  label: string,
  field: string,
  align?: "left" | "right" | "center",
  required?: boolean,
  sortable?: boolean,
}

function rowClick(row: any) {
  console.log(row);
}

</script>

<template>
  <div class="q-pa-md">
    <q-table
      :grid="$q.screen.xs"
      :rows="orders"
      :columns="columns"
      :row="row_id"
      bordered
    >
      <template v-slot:body-cell-actions="props">
        <q-td :props="props">
          <div class="q-gutter-sm">
            <q-btn round outline color="primary" icon="edit" size="sm" @click="rowClick(props)"/>
            <q-btn round outline color="negative" icon="delete" size="sm"/>
          </div>
        </q-td>
      </template>
    </q-table>
  </div>
</template>
