<script setup>
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { defineProps } from 'vue';
  import Form from './Partials/Form.vue';
  // Define props
  const props = defineProps({
    company:{
        type:Object,
        required:true
    }

  });
</script>

<template>
  <AuthenticatedLayout>
    <Form 
      formType="companyUpdated"
      title="Update Company"
      :company="props.company"
    />
  </AuthenticatedLayout>
</template>

<style scoped>
  h1 {
    color: #42b983;
  }
</style>