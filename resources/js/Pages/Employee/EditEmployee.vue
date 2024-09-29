<script setup>
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { defineProps } from 'vue';
  import FormEmployee from './Partials/FormEmployee.vue';
  // Define props
  const props = defineProps({
    title: {
      type: String,
      required: true,
      default: 'Hello Vue!'
    },
    status: {
      type: String,
      required: true
    },
    companies :{
      type: Object,
      required:true
    },
    employee:{
        type:Object
    }
  });
</script>

<template>
  <AuthenticatedLayout>
    
    <FormEmployee
      formType="employeeUpdated"
      title="Update Employee"
      :companies="companies"
      :employee="employee"
    /> 

  </AuthenticatedLayout>
</template>