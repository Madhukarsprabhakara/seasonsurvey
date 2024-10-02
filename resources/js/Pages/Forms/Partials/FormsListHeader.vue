<template>
  <div class="pb-5 flex sm:flex border-b justify-start">
    
    <div class="mt-3  sm:mt-0">
      <NavLink  :href="route('forms.create')" :active="route().current('forms.create')" preserve-scroll> 
          <button type="button" class="rounded bg-teal-600 px-2 py-1 text-xs font-semibold text-white shadow-sm hover:bg-teal-500  ">
            <!-- <PlusIcon class="-ml-0.5 mr-1.5 h-5 w-5" aria-hidden="true" /> -->
            Add another rule
          </button>
    
      </NavLink>
    </div>
  </div>
</template>
<script setup>
import NavLink from '@/Components/NavLink.vue';
</script>
