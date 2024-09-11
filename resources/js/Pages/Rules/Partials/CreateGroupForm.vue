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
<form @submit.prevent="storeGroupName">
  <div class="px-4 py-4  bg-gray-100 border-2">
    <label for="groupname" class="block text-sm font-medium leading-6 text-gray-900">Rule Group Name</label>
    <div class="mt-2">
      <input type="text" name="name" v-model="form.name" id="groupname" autocomplete="groupname" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"  aria-describedby="email-description" required/>
    </div>
    <p class="mt-2 text-sm text-gray-500" id="email-description">e.g. Summary and application status group</p>
    <div class="mt-4 flex items-center justify-end gap-x-6">
      <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
      <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
    </div>
  </div>
</form>
</template>


<script setup>
import { ref, computed, onMounted } from 'vue';
import { CheckCircleIcon } from '@heroicons/vue/20/solid'
import { useForm, usePage } from '@inertiajs/vue3'; 
const name = ref(null)
const survey_id = ref(null)
const question_id = ref(null)
function storeGroupName() {
	  form.post(route('groups.store'), {
	  	preserveScroll: true,

	  })
	}
const form = useForm({
    name: '',
    survey_id: usePage().props.survey_questions.id,
    question_id: usePage().props.question.id
    
});
</script>