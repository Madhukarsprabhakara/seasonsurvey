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
  <div>
    <label class="block text-sm font-medium leading-6 text-gray-900">{{props.qid.question_details.title}}</label>
    <div class="relative mt-2 rounded-md shadow-sm">
      <input 
      type="text" 
      
      class="ml-2 bg-gray-100 block w-2/4 rounded-md border-0 py-1.5 pr-1 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" 
      placeholder="you@example.com" 
      aria-invalid="true" 
      aria-describedby="email-error"
    />
      
    </div>
    
  </div>
</template>

<script setup>
import { ExclamationCircleIcon } from '@heroicons/vue/20/solid'
const props = defineProps(['qid'])
</script>