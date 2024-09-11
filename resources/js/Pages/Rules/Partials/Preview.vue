<template>
  <!--<button type="button" class="relative block w-full rounded-lg border-2 border-dashed border-gray-300 p-12 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
    
    <span class="mt-2 block text-sm font-semibold text-gray-900"><li>Rule preview will display here once you write the rules and click on the "Preview" button.</li> <li>The rule will be applied only on one of the records.</li></span>
  </button>-->
  <PreviewTable />
</template>
<script setup>
import PreviewTable from '@/Pages/Rules/Partials/PreviewTable.vue';
</script>