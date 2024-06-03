<script setup lang="ts">
import AppLayout from "@/Layouts/AppLayout.vue";
import {router} from "@inertiajs/vue3";
import {computed, ref} from "vue";
import CreateOrderModal from "@/Pages/Orders/Modals/CreateOrderModal.vue";

defineOptions({ layout: AppLayout })

const props = defineProps<{
  orders: Object[],
  columns: Column[],
  row_id: string,
  page: number,
  per_page: number,
  count: number,
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

const pagination = ref({
  sortBy: 'desc',
  descending: false,
  rowsPerPage: props.per_page,
})

const pageValue = computed({
  get() {
    return props.page;
  },
  set(value) {
    router.get(route(route().current()), {page: value}, {
      preserveScroll: true
    })
  }
});

const pagesNumber = computed(() => Math.ceil(props.count / pagination.value.rowsPerPage));

const pageHandler = () => {
  console.log(route().current());
}

const showCreateModal = ref(false);
</script>

<template>
  <div class="row">
    <div class="col">Orders</div>
    <div class="col">
      <q-btn @click="showCreateModal=true">New order</q-btn>
    </div>
  </div>
  <div class="q-pa-md">
    <q-table
      :grid="$q.screen.xs"
      :rows="orders"
      :columns="columns"
      :row="row_id"
      :pagination="pagination"
      bordered
      hide-pagination
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

    <div class="row justify-center q-mt-md">
      <q-pagination
        v-model="pageValue"
        color="grey-8"
        :max="pagesNumber"
      />
    </div>
  </div>
  <CreateOrderModal v-model="showCreateModal"/>
</template>
