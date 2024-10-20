<template>
	<AppLayout title="Folders">
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                SkipLogic
            </h2>
        </template> -->

        <div class="bg-gray-50 py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            	
                <div class="bg-white overflow-hidden shadow-xl px-5 py-5 sm:rounded-lg">
                  <Form /> 
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
	import AppLayout from '@/Layouts/AppLayout.vue';
	import Welcome from '@/Components/Welcome.vue';
	import Form from '@/Pages/Validate/Form.vue';
</script>