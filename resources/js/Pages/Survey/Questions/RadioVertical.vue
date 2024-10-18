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
    <label class="text-md font-bold text-gray-900">{{props.qid.question_details.title}}</label>
    
      <div class="mt-2 ml-2 space-y-2">
        <div v-for="option_id in props.qid.question_option_ids" key="option_id.id" class="flex items-center">
          <input :id="'s_'+option_id.id" :name="option_id.id" v-model="store.fields['a_'+props.qid.id]"  :value="option_id.option_detail.question_option_id" key="option_id.id" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
          <label :for="'s_'+option_id.id" class="ml-3 block text-sm font-normal leading-6 text-gray-900">{{ option_id.option_detail.title }}</label>
        </div>
      </div>
   
  </div>
</template>

<script setup>
import { ref, watch } from 'vue'
import { useSurveyStore } from '@/Pages/Store/surveyStore'
import InputError from '@/Components/InputError.vue';
const props = defineProps(['qid'])
const store = useSurveyStore()
const notificationMethods = [
  { id: 'email', title: 'Email' },
  { id: 'sms', title: 'Phone (SMS)' },
  { id: 'push', title: 'Push notification' },
]
watch(
      () => store.fields['a_'+props.qid.id],
      (newField) => {
      store.addFormFields('a_'+props.qid.id, `${newField}`)
        
      },
      { deep: true }
    )
</script>