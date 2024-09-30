<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import { reactive } from 'vue'
// Define a method
    const companyIndex = () => {
        router.get(route('companies.index')); 
    };
    
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                    <h1 class="text-center text-3xl p-6 text-gray-900 dark:text-gray-100"><strong>Mini CRM</strong></h1>
                    <!-- <div @click="companyIndex" class="cursor-pointer">Show Message</div> -->
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>s    