<template>
  <div class="border-2 border-gray-200 bg-white px-4 py-5 sm:px-6">
    <div class="-ml-4 -mt-4 mb-4 flex flex-wrap items-center justify-between sm:flex-nowrap">
      <div class="ml-4 mt-4">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            
          </div>
          <div class="ml-4">
            
          </div>
        </div>
      </div>
      <div class="ml-4 mt-4 flex flex-shrink-0">
        

        <NavLink  v-if="props.question.question_type_id==1" :href="route('qrules.index', {'global_id': $page.props.survey_questions.global_id, 'question_uuid' : props.question.question_uuid})" :active="route().current('qrules.index', {'global_id':$page.props.survey_questions.global_id, 'question_uuid' : props.question.question_uuid})"  preserve-scroll> 
          <button type="button" class="rounded bg-yellow-200 px-2 py-1 text-xs font-semibold text-gray-900 shadow-sm hover:bg-yellow-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-600">Set AI Rules</button>
          
        </NavLink>
        
        <!-- <button type="button" class="relative ml-3 inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
          <EnvelopeIcon class="-ml-0.5 mr-1.5 h-5 w-5 text-gray-400" aria-hidden="true" />
          <span>Email</span>
        </button> -->
      </div>
    </div>
    <main>
      <slot name="question"/>
    </main>
  </div>
</template>

<script setup>
import { EnvelopeIcon, PhoneIcon } from '@heroicons/vue/20/solid'
import NavLink from '@/Components/NavLink.vue';
const props = defineProps(['question'])
</script>