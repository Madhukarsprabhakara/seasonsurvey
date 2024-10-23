<!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<template>
    
    
    <FieldLayout :question="props.qid">
      <template #question>
           <div class="flex items-center">
            <svg 
              xmlns="http://www.w3.org/2000/svg" 
              fill="none" 
              viewBox="0 0 24 24" 
              stroke-width="1.5" 
              stroke="currentColor" 
              class="size-3 mr-2"
            >
              <path 
                stroke-linecap="round" 
                stroke-linejoin="round" 
                d="M9 9V4.5M9 9H4.5M9 9 3.75 3.75M9 15v4.5M9 15H4.5M9 15l-5.25 5.25M15 9h4.5M15 9V4.5M15 9l5.25-5.25M15 15h4.5M15 15v4.5m0-4.5 5.25 5.25"
              />
            </svg>
            <label 
              
              class="block text-md font-bold leading-6 text-gray-900"
            >
              {{props.qid.question_details.title}}
            </label>
          </div>
            
            <div v-if="props.qid.question_option_ids.length>0" class="mt-6 space-y-3">
              <div v-for="option in props.qid.question_option_ids" :key="option.id" class="flex items-center">
                <input :id="option.id" name="notification-method" type="radio"  class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                <label :for="option.id" class="ml-3 block text-sm font-medium leading-6 text-gray-900">{{ option.title }}</label>
              </div>
            </div>
             
      </template>
    </FieldLayout>

 
  


    
  
</template>

<script setup>
import FieldLayout from '@/Pages/Forms/Partials/FieldLayout.vue';

import { EnvelopeIcon, PhoneIcon } from '@heroicons/vue/20/solid'
const props = defineProps(['qid'])
const options = props.qid.question_option_ids
</script>