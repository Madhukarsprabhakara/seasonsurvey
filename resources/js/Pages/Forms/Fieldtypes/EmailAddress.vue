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
  <div class="mb-6">
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
      for="email" 
      class="block text-md font-bold leading-6 text-gray-900"
    >
      Email
    </label>
  </div>
  <div class="relative mt-2 rounded-md">
    <input 
      type="email" 
      v-model="store.fields['a_'+props.qid.id]" 
      name="email" 
      id="email" 
      class="ml-2 bg-gray-100 block w-2/4 rounded-md border-0 py-1.5 pr-1 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" 
      placeholder="you@example.com" 
      aria-invalid="true" 
      aria-describedby="email-error"
    />
    <InputError 
      :message="$page.props.errors['a_'+props.qid.id]" 
      class="mt-2"
    />
  </div>
</div>
</template>

<script setup>
import { useSurveyStore } from '@/Pages/Store/surveyStore';
import { QuestionMarkCircleIcon, ExclamationCircleIcon } from '@heroicons/vue/20/solid'
import { ref, watch } from 'vue'
import InputError from '@/Components/InputError.vue';
const props = defineProps(['qid'])
const store = useSurveyStore()


watch(
      () => store.fields['a_'+props.qid.id],
      (newField) => {
      store.addFormFields('a_'+props.qid.id, `${newField}`)
        
      },
      { deep: true }
    )
</script>