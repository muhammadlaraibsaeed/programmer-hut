<script setup>
  import { router, useForm } from '@inertiajs/vue3';
  import { defineProps } from 'vue';
  import {useToast} from 'vue-toast-notification';
  import 'vue-toast-notification/dist/theme-sugar.css';
  // Define props
  const props = defineProps({
    title: {
      type: String,
      required: true,
      default: 'Hello Vue!'
    },
    formType: {
      type: String,
      required: true
    },
    companies :{
      type: Object,
      required:true
    },
    employee:{
      type:Object,
    }
  });
  const employeeLength = props?.employee ? Object.keys(props.employee).length : 0;

  let companyFields = {
  fname: employeeLength!=0 ? props?.employee?.fname :null,
  lname: employeeLength!=0 ? props?.employee?.lname :null,
  company_id: employeeLength!=0 ? props?.employee?.company_id :null,
  email: employeeLength!=0 ? props?.employee?.email :null ,
  phone: employeeLength!=0 ? props?.employee?.phone :null
};

var form = useForm(companyFields);
const submit = () => {
    let expression =  props.formType;
    console.log(expression);
    const employeeData = {
            fname: form.fname,
            lname: form.lname,
            company_id: form.company_id,
            email: form.email,
            phone: form.phone,
        };
   switch (expression) {
    case "employeeCreated":
          form.post(route('employees.store'),{
            onSuccess: () => {
              const $toast = useToast();
              let instance = $toast.success('Employee SuccessFully Created');
              setTimeout(() => {
                router.get(route('employees.index'))
              }, 2000);

            },
          })
        break;
    case "employeeUpdated":
          employeeData['_method'] = "PUT";
        
          router.post(route('employees.update',{'employee':props.employee.id}),employeeData,{
            onSuccess: ()=> {
              const $toast = useToast();
              let instance = $toast.success('Employee SuccessFully Updated');
              setTimeout(() => {
                router.get(route('employees.index'))
              }, 2000);

            },
          });;
        break;
    // Add more cases as needed
    default:
        // Code to execute if expression doesn't match any case
        break;
}

};

const handleIndex = ()=>{
  router.get(route('employees.index'))
}



</script>

<template>
  <div>
    <!-- Back Button -->
    <button class="mt-8 mx-8 p-2 bg-black text-white rounded hover:bg-gray-800 transition" @click="handleIndex">
      Back
    </button>
    <!-- Title Button in Center -->
    <div class="text-center mt-4">
      <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
        {{ title }}
      </button>
    </div>
  </div>

  <!-- Form Section -->
  <div class="m-8">
    <form @submit.prevent="submit">
      <!-- First Name Field -->
      <div class="mb-4">
        <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
        <input
          v-model="form.fname"
          id="fname"
          type="text"
          class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
          
        />
        <span v-if="form.errors.fname" class="text-red-500 text-sm">{{ form.errors.fname }}</span>
      </div>

      <!-- Last Name Field -->
      <div class="mb-4">
        <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
        <input
          v-model="form.lname"
          id="lname"
          type="text"
          class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
          
        />
        <span v-if="form.errors.lname" class="text-red-500 text-sm">{{ form.errors.lname }}</span>
      </div>

      <!-- Company Name Dropdown -->
      <div class="mb-4">
        <label for="company_id" class="block text-sm font-medium text-gray-700">Company Name</label>
        <select
          v-model="form.company_id"
          id="company_id"
          class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
      
        >
          <option disabled value="">Please select a company</option>
          <option v-for="company in companies" :key="company.id" :value="company.id">{{ company.name }}</option>
        </select>
        <span v-if="form.errors.company_id" class="text-red-500 text-sm">{{ form.errors.company_id }}</span>
      </div>

      <!-- Email Field -->
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input
          v-model="form.email"
          id="email"
          type="email"
          class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
          
        />
        <span v-if="form.errors.email" class="text-red-500 text-sm">{{ form.errors.email }}</span>
      </div>

      <!-- Phone Field -->
      <div class="mb-4">
        <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
        <input
          v-model="form.phone"
          id="phone"
          type="tel"
          class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
          
        />
        <span v-if="form.errors.phone" class="text-red-500 text-sm">{{ form.errors.phone }}</span>
      </div>

      <!-- Submit Button -->
      <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
        Submit
      </button>
    </form>
  </div>
  {{ console.log(form.errors) }}
</template>
