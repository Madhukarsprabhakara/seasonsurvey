<template>
  <div class="pb-5 flex sm:flex border-b justify-start">
    
    <div class="mt-3  sm:mt-0">
      <NavLink  :href="route('forms.create')" :active="route().current('forms.create')" preserve-scroll> 
          <button type="button" class="inline-flex items-center rounded-md bg-teal-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-teal-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-600">
            <!-- <PlusIcon class="-ml-0.5 mr-1.5 h-5 w-5" aria-hidden="true" /> -->
            Create a Survey
          </button>
    
      </NavLink>
    </div>
  </div>
</template>
<script setup>
import NavLink from '@/Components/NavLink.vue';
</script>
