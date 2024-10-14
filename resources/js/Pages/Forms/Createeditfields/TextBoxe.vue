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
    <CreateFieldsLayout>
      <template #main>

        <form @submit.prevent="storeQuestion">
          <div class="mb-2">
          <!-- <label for="account-number" class="block text-md  font-bold leading-6 text-gray-900">{{props.qid.question_details.title}}</label> -->
          <div>
        
    <!-- <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label> -->
           <div class="relative mt-2">
              <input type="text" name="title" v-model="form.title" id="title" class="peer block w-full border-0 bg-gray-50 py-1.5 text-gray-900 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Question title" />
              <div class="absolute inset-x-0 bottom-0 border-t border-gray-300 peer-focus:border-t-2 peer-focus:border-teal-500" aria-hidden="true" autofocus/>
            </div>
          </div>
          <div class="relative mt-4 rounded-md ">
            <input type="text" name="text" id="text" class="block w-full rounded-md border-0 py-1.5 pr-10 text-red-900 ring-1 ring-inset ring-red-300 placeholder:text-red-300 focus:ring-2 focus:ring-inset focus:ring-red-500 sm:text-sm sm:leading-6" placeholder="" value="" aria-invalid="true"  />
            
          </div>
          <div class="mt-6 flex items-center justify-end gap-x-6">
      
            <NavLink  :href="route('forms.fields', {'survey': $page.props.survey_questions.id})"  preserve-scroll> 
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900  ">
                  <!-- <PlusIcon class="-ml-0.5 mr-1.5 h-5 w-5" aria-hidden="true" /> -->
                  Cancel
                </button>
          
            </NavLink>
            <button type="submit" class="rounded-md bg-teal-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-teal-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-600">Save</button>
          </div>
        </div>
      </form>
      </template>
    </CreateFieldsLayout>
  </div>
</template>

<script setup>

import { QuestionMarkCircleIcon } from '@heroicons/vue/20/solid'
import { ref, watch } from 'vue'
import InputError from '@/Components/InputError.vue';
import CreateFieldsLayout from '@/Pages/Forms/Createeditfields/CreateFieldsLayout.vue';
import NavLink from '@/Components/NavLink.vue';
import { useForm, usePage } from '@inertiajs/vue3'; 

function storeQuestion() {
    form.put(route('questions.update', {'question': usePage().props.edit_question_id}), {
      preserveScroll: true,

    })
  }

const form = useForm({
    title: '',
    id:'',
    
});
form.id = usePage().props.edit_question_id;
form.title = usePage().props.question.title;

</script>