<template>
  <form @submit.prevent="updateRule">
    <div class="space-y-12 border-2 bg-gray-50 px-4 py-4">
      <div class=" pb-2">
        <p class="mt-1 text-sm leading-6 text-gray-600">You are creating a rule for the above mentioned rule group and question.</p>

        
      </div>

      <div class=" ">
        

        <div class="mt-10 grid grid-cols-1 gap-x-6  sm:grid-cols-6">
          <div class="sm:col-span-3">
            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Rule name</label>
            <div class="mt-2">
              <input type="text" name="name" v-model="form.name" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
            </div>
          </div>

          <!-- <div class="sm:col-span-3">
            <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Field name</label>
            <div class="mt-2">
              <input type="text" name="column" v-model="form.column" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
            </div>
            <p class="mt-1 text-sm leading-6 text-gray-600">New field where the output of the rules will be stored.</p>
          </div> -->

          <div class=" col-span-full mt-4">
            <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Your rules below</label>
            <div class="mt-2">
            	<pre>
              		<textarea id="about" name="rule" v-model="form.rule" rows="7" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
              	</pre>
          	
            </div>
            <p class="mt-1 text-sm leading-6 text-gray-600">This is where you put in the rules. Checkout this example.</p>
          </div>
 
        </div>
      </div>
      	<!-- {{form.isDirty}} -->
    	<div class="mt-6 flex items-center justify-end gap-x-6">
	      <!-- <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Save</button> -->
	      <svg v-if="form.processing" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="animate-spin size-6">
			  <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
			</svg>

	      <button type="submit" :disabled="form.processing" class=" rounded-md bg-teal-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-teal-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-600">Update and Preview</button>
	    </div>
	    </div>

    
  </form>
</template>

<script setup>
import { PhotoIcon, UserCircleIcon, CheckCircleIcon } from '@heroicons/vue/24/solid'
import { useForm, usePage } from '@inertiajs/vue3'; 
import { ref, computed, onMounted } from 'vue';
const form = useForm({
    name: usePage().props.rule.name,
    column:usePage().props.rule.column,
    rule: usePage().props.rule.rule,
    survey_id: usePage().props.survey_id,
    question_id: usePage().props.question.id,
    rule_group_id: usePage().props.question.rule_group.id,
    sort_order: usePage().props.rule.sort_order,
});

onMounted(() => {
	console.log(usePage().props.preview_data.processed_data)	  	
})
// const name = ref(null)
// const column = ref(null)
// const rule = ref(form.rule)
// const survey_id = ref(null)
// const question_id = ref(null)
function updateRule() {
	  form.put(route('rules.update', {rule: usePage().props.rule.id }), {
	  	preserveScroll: true,

	  })
	}


</script>