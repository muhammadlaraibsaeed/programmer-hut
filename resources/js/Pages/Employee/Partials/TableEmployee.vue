<script setup>
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { defineProps } from 'vue';
  import { Head, router } from '@inertiajs/vue3';
  import Pagination from '@/Components/Pagination .vue';
  // Define props
  const props = defineProps({
    title: {
      type: String,
      required: true,
      default: 'Hello Vue!'
    },
    employees: {
      type: String,
      required: true
    }
  });

  const employeeEdit  = (employeeId) => {
        router.get(route('employees.edit',{'employee':employeeId})); 
    };

    const employeeDelete = (employeeId) => {
      router.delete(route('employees.destroy', { "employee": employeeId }));
    }
  
</script>

<template>
    <div class="overflow-x-auto m-8">
    <table class="min-w-full bg-white">
      <thead>
        <tr class="w-full bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
          <th class="py-3 px-6 text-left">Name</th>
          <th class="py-3 px-6 text-left">Email</th>
          <th class="py-3 px-6 text-left">Phone</th>
          <th class="py-3 px-6 text-left">Company Name</th>
          <th class="py-3 px-6 text-left">Action</th>
        </tr>
      </thead>
      <tbody class="text-gray-600 text-sm font-light">
        <tr v-for="employee in employees.data" :key="employee.id" class="border-b border-gray-200 hover:bg-gray-100">
          <td class="py-3 px-6"> {{ `${employee.name == null ? employee.fname + employee.lname : employee.name }`  }}</td>
          <td class="py-3 px-6">{{ employee?.email }}</td>
          <td class="py-3 px-6">{{ employee?.phone }}</td>
          <td class="py-3 px-6">{{ employee?.company?.name }}</td>
          <td class="grid grid-cols-2 gap-4 place-content-center h-20">
            <span class="cursor-pointer" @click="employeeDelete(employee.id)">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
              </svg>
            </span>
            <span class="cursor-pointer" @click="employeeEdit(employee.id)">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
              </svg>
            </span>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <Pagination :pagination="employees" />

</template>

<style scoped>
  h1 {
    color: #42b983;
  }
</style>