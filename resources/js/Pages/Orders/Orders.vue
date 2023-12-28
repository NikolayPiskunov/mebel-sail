<script setup lang="ts">
import AppLayout from "@/Layouts/AppLayout.vue";

defineProps<{
  list: Object[],
}>()

defineOptions({ layout: AppLayout })

interface Column {
  name: string,
  label: string,
  field: string,
  align?: "left" | "right" | "center",
  required?: boolean,
  sortable?: boolean,
}

const columns: Column[] = [
  { name: 'actions', label: 'Действия', field: 'actions', align: 'center' },
  {
    name: 'id',
    required: true,
    label: 'ID',
    align: 'left',
    field: 'id',
    sortable: true
  },
  { name: 'title', align: 'center', label: 'Заголовок', field: 'title', sortable: true },
  { name: 'price', label: 'Цена', field: 'price', sortable: true, align: 'center'  },
  { name: 'deadline', label: 'Крайний срок', field: 'deadline', align: 'center'  },

]

</script>

<template>
  <div class="q-pa-md">
    <q-table
      :grid="$q.screen.xs"
      :rows="list"
      :columns="columns"
      row="id"
      bordered
    >
      <template v-slot:body-cell-actions="props">
        <q-td :props="props">
          <div class="q-pa-md q-gutter-sm">
            <q-btn round color="primary" icon="edit" size="sm"/>
            <q-btn round color="negative" icon="delete" size="sm"/>
          </div>
        </q-td>
      </template>
    </q-table>
  </div>
</template>
