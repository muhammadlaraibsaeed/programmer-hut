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
    }
  });
</script>

<template>
  <AuthenticatedLayout>
    <FormEmployee
      formType="employeeCreated"
      title="Create Employee"
      :companies="companies"
    />
  </AuthenticatedLayout>
</template>

<style scoped>
  h1 {
    color: #42b983;
  }
</style>