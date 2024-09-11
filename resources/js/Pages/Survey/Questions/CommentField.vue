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
    <label :for="props.qid.id" class="block text-md font-bold leading-6 text-gray-900">{{props.qid.question_details.title}}</label>
    <div class="mt-2">
      <textarea rows="5" v-model="store.fields['a_'+props.qid.id]" name="props.qid.id" :id="props.qid.id" class="ml-2 block w-3/4 bg-gray-100 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
      <InputError :message="$page.props.errors['a_'+props.qid.id]" class="mt-2" />
    </div>
  </div>
</template>
<script setup>
import { ref, watch } from 'vue'
import { useSurveyStore } from '@/Pages/Store/surveyStore';
import InputError from '@/Components/InputError.vue';
const props = defineProps(['qid'])
const text = ref('')
const store = useSurveyStore()

watch(
      () => store.fields['a_'+props.qid.id],
      (newField) => {
      store.addFormFields('a_'+props.qid.id, `${newField}`)
        
      },
      { deep: true }
    )
</script>