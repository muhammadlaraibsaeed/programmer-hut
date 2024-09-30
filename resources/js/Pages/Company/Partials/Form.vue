
<script setup>
import { router, useForm } from '@inertiajs/vue3';
import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

// Props

const props = defineProps({
  formType: {
    type: String,
    required: true
  },
  title: {
    type: String,
    required: true
  },
  company: {
    type: String,
  }
});

const companyLength = props?.company ? Object.keys(props.company).length : 0;


// Initialize form data using useForm from Inertia.js
let companyFields = {
  name: companyLength!=0 ? props.company.name :null,
  email: companyLength!=0 ? props.company.email :null,
  logo: companyLength!=0 ? props.company.logo :null,
  website_link: companyLength!=0 ? props.company.website_link :null
};

var form = useForm(companyFields);


// Function to handle form submission
const submit = () => {
    let expression =  props.formType;
    const CompanyData = {
            name: form.name,
            email: form.email,
            logo: form.logo,
            website_link: form.website_link,
        };
   switch (expression) {
    case "companyCreated":
          form.post(route('companies.store'),{
            onSuccess: () => {
              const $toast = useToast();
              let instance = $toast.success('Company SuccessFully Created');
              setTimeout(() => {
                router.get(route('companies.index'))
              }, 2000);

            },
          })
        break;
    case "companyUpdated":
          CompanyData['_method'] = "PUT";
          router.post(route('companies.update',{'company':props.company.id}),CompanyData,{
            onSuccess: ()=> {
              const $toast = useToast();
              let instance = $toast.success('Company SuccessFully Updated');
              setTimeout(() => {
                router.get(route('companies.index'))
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

function handleIndex() {
  router.get(route('companies.index'));
}

const handleFileUpload = (event)=>{
  const fileUrl =  event.target.files[0];
  form.logo = fileUrl;
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
      <!-- Name Field -->
      <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
        <input
          v-model="form.name"
          id="name"
          type="text"
          class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
          
        />
        <span v-if="form.errors.name" class="text-red-500 text-sm">{{ form.errors.name }}</span>
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

      <!-- Logo Upload Field (Optional) -->
      <div class="mb-4">
        <label for="logo" class="block text-sm font-medium text-gray-700">Logo</label>
        <input
          v-on:change="handleFileUpload"
          id="logo"
          type="file"
          class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
        />
        <span v-if="form.errors.logo" class="text-red-500 text-sm">{{ form.errors.logo }}</span>
      </div>

      <!-- Website Link Field (Optional) -->
      <div class="mb-4">
        <label for="website_link" class="block text-sm font-medium text-gray-700">Website Link</label>
        <input
          v-model="form.website_link"
          id="website_link"
          type="url"
          class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
        />
        <span v-if="form.errors.website_link" class="text-red-500 text-sm">{{ errors.website_link }}</span>
      </div>

      <!-- Submit Button -->
      <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
        Submit
      </button>
    </form>
  </div>
</template>