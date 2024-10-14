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
    <label :for="'a_'+props.qid.id" class="block text-md  font-bold leading-6 text-gray-900">{{props.qid.question_details.title}}</label>
    <div class="relative mt-2 rounded-md ">
      <input type="email" v-model="store.fields['a_'+props.qid.id]" name="email" :id="'a_'+props.qid.id" class="ml-2 bg-gray-100 block w-2/4 rounded-md border-0 py-1.5 pr-1 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="you@example.com" aria-invalid="true" aria-describedby="email-error" />
      <InputError :message="$page.props.errors['a_'+props.qid.id]" class="mt-2" />
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