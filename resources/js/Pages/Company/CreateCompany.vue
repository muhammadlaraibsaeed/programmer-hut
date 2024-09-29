<script setup>
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { defineProps } from 'vue';
  import Form from './Partials/Form.vue';
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
    }
  });
</script>

<template>
  <AuthenticatedLayout>
    <Form 
      formType="companyCreated"
      title="Create Company"
/>
  </AuthenticatedLayout>
</template>

<style scoped>
  h1 {
    color: #42b983;
  }
</style>