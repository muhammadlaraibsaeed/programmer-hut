<script setup>
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { defineProps } from 'vue';
  import TableEmployee from './Partials/TableEmployee.vue';
  import { router } from '@inertiajs/vue3'
  // Define props
  const props = defineProps({
    title: {
      type: String,
      required: true,
      default: 'Employee Listing ..'
    },
    status: {
      type: String,
      required: true
    },
    employees:{
      type: Object
    }
  });

  const handleCreate = ()=>{
    router.get(route('employees.create'));
  }
</script>

<template>
  <AuthenticatedLayout>
    <div @click="handleCreate" class="text-end m-8">
        <button
          class="text-white bg-black rounded 	 p-3 "
        >Create Employee</button>
    </div>
    
      <TableEmployee
        :employees="employees"
      />
  </AuthenticatedLayout>
</template>

<style scoped>
  h1 {
    color: #42b983;
  }
</style>