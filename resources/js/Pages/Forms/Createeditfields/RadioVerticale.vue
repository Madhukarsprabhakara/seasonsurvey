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
           <div class="relative mt-2" contenteditable="true">
              <input type="text" name="title" v-model="form.title" id="title" class="peer break-words text-wrap block w-full border-0 bg-gray-50 py-1.5 text-gray-900 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Question title" />
              <div class="absolute inset-x-0 bottom-0 border-t border-gray-300 peer-focus:border-t-2 peer-focus:border-teal-500" aria-hidden="true" autofocus/>
            </div>
          </div>
          <div class="mt-4 space-y-3">
            <draggable 
              v-model="notificationMethods" 
              group="people" 
              @start="drag=true" 
              @end="drag=false" 
              item-key="id" @change="onChange">
              <template #item="{element, index}">
                <div  @mouseover="isHovering = true" @mouseleave="isHovering = false" class="cursor-move flex items-center">
                  
                  <input v-model="form.question_options" :id="element.id" name="notification-method" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label  :for="element.id" class="ml-3 block text-sm font-medium leading-6 mt-2 text-gray-900"><input type="text" name="title" v-model="element.title" id="title" class="peer block w-full border-0 bg-gray-50 py-1.5 text-gray-900 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Question title" /> </label>

                        <svg  @click="popOption(index)" v-if="isHovering" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 size-4">
                          <path stroke-linecap="round"  stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                  

                </div>
               </template>

            </draggable>
            <button  type="button" @click="pushOption" class="ml-4 rounded bg-yellow-600 px-2 py-1 text-xs font-semibold text-white shadow-sm hover:bg-yellow-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-600">Add option</button>
            
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

import { useForm, usePage } from '@inertiajs/vue3'; 
import CreateFieldsLayout from '@/Pages/Forms/Createeditfields/CreateFieldsLayout.vue';
import draggable from 'vuedraggable';
import NavLink from '@/Components/NavLink.vue';
import { ref, watch } from 'vue';
import axios from 'axios';

function storeQuestion() {
    form.put(route('questions.update', {'question': usePage().props.edit_question_id}), {
      preserveScroll: true,

    })
  }
const isHovering=ref()
const notificationMethods = ref([
  
]);
const index=ref();
const form = useForm({
    title: '',
    id:'',
    question_options: '',
    
});
form.id = usePage().props.edit_question_id;
form.title = usePage().props.question.title;
form.question_options=notificationMethods.value;

watch(() => notificationMethods.value, (newQuestionIds) => {
    form.question_options = newQuestionIds
  })

function onChange(evt) {
  //console.log(evt)
}
function pushOption()
{
  //create the option
  //get saved option data
  //push it into the array
  const data=[];
  
  index.value=notificationMethods.value.length+1;
  data.push({question_id: usePage().props.question.id,survey_id:usePage().props.question.survey_id, team_id: usePage().props.question.team_id,order_no: index.value, title: 'Untitled option '+index.value, 'language_id': 1});

  axios.post('/questionoption/', data)
      .then(response => {
        // Handle the response
        
        notificationMethods.value.push(response.data[0]);
        
      })
      .catch(error => {
        // Handle any errors
        console.error(error);
      });

  
}
function popOption(indexToRemove)
{
  
  notificationMethods.value.splice(indexToRemove, 1); 
}
</script>