<template>

  <div class="mx-auto flex w-full items-start gap-x-8 px-4  sm:px-6 lg:px-8 bg-white">


    <aside class="w-1/2 top-8 hidden  px-2 py-2    shrink-0  lg:block ">
      <slot name="rule"></slot>
    </aside>

    <main class="flex-1 top-8 w-1/2  sticky">
      <slot name="result"/>
    </main>


    
  </div>
</template>

<script setup>
import CreateRuleHeader from '@/Pages/Rules/Partials/CreateRuleHeader.vue';
</script>


