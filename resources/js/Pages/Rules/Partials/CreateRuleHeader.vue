<template>
  <div class="flex">
    <div class="mr-4 flex-shrink-0">
    
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
		  <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
		</svg>


    </div>
    <div>
      <h4 class="text-lg font-bold">{{$page.props.question.rule_group.name}}</h4>
      <p class="mt-1">{{$page.props.question.question_details.title}}</p>
    </div>
  </div>
</template>
<script setup>
import NavLink from '@/Components/NavLink.vue';
import { ExclamationTriangleIcon } from '@heroicons/vue/20/solid'
</script>
