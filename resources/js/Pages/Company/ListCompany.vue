<script setup>
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { defineProps } from 'vue';
  import TableCompany from './Partials/TableCompany.vue';
  import { router } from '@inertiajs/vue3'

  // Define props
  const props = defineProps({
    companies: {
      type: Object,
    }
  });

  // function
function handleCreate() {
  router.get(route('companies.create'));
}

</script>

<template>
  <AuthenticatedLayout>
     <div @click="handleCreate" class="text-end m-3">
        <button
          class="text-white bg-black rounded 	 p-3 "
        >Create Company</button>
     </div>
     <div class="m-4">
        <TableCompany :companies="companies" />
     </div>
</AuthenticatedLayout>
</template>

<style scoped>
  h1 {
    color: #42b983;
  }
</style>