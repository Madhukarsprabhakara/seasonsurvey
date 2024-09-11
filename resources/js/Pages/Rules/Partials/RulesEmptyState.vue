<template>
  <div class="mt-4 text-center">
    
    
    <p class="mt-1 text-sm text-gray-500">No rules created in this group yet.</p>
    <div class="mt-2">

     <NavLink :href="route('rules.create', {'rule_group_id': props.rulegroup, 'question_uuid' : props.question.question_uuid})" :active="route().current('rules.create', {'rule_group_id':props.rulegroup, 'question_uuid' : props.question.question_uuid})" preserve-scroll> 
	      <button type="button" class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
	        <PlusIcon class="-ml-0.5 mr-1.5 h-5 w-5" aria-hidden="true" />
	        Create a new rule
	      </button>
  
  	</NavLink>
    </div>
  </div>
</template>

<script setup>
import { PlusIcon } from '@heroicons/vue/20/solid'
import NavLink from '@/Components/NavLink.vue';
const props = defineProps(['rulegroup', 'question'])
</script>