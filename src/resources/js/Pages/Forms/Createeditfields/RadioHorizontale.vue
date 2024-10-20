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
      class="text-md font-bold text-gray-900"
    >
      {{ props.qid.question_details.title }}
    </label>
  </div>
  <fieldset class="mt-2">
    <legend class="sr-only">Notification method</legend>
    <div class="space-y-4 ml-2 sm:flex sm:items-center sm:space-x-10 sm:space-y-0">
      <div 
        v-for="option_id in props.qid.question_option_ids" 
        key="option_id.id" 
        class="flex items-center"
      >
        <input 
          :id="'s_'+option_id.id" 
          :name="option_id.id" 
          v-model="store.fields['a_'+props.qid.id]" 
          :value="option_id.option_detail.question_option_id" 
          key="option_id.id" 
          type="radio" 
          class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600"
        />
        <label 
          :for="'s_'+option_id.id" 
          class="ml-3 block text-sm font-normal leading-6 text-gray-700"
        >
          {{ option_id.option_detail.title }}
        </label>
      </div>
    </div>
    <InputError 
      :message="$page.props.errors['a_'+props.qid.id]" 
      class="mt-2"
    />
  </fieldset>
</div>
</template>

<script setup>
import { ref, watch } from 'vue'
import { useSurveyStore } from '@/Pages/Store/surveyStore'
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