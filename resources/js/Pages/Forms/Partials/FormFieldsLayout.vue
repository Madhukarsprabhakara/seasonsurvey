<template>
  <div class="mx-auto flex w-full items-start gap-x-8 px-4 py-10 sm:px-6 lg:px-8 bg-white">
    <aside class="w-3/12 top-8 hidden  w-2/12 shrink-0  lg:block "> <!--bg-gray-50 px-2 py-2 border-2 -->
      <slot name="leftq"></slot>
    </aside>

    <main class="flex-1 top-8 w-6/12  sticky">
      <slot name="questions"/>
    </main>


    <aside class="sticky w-3/12 top-8 hidden shrink-0 xl:block">
      <slot name="rightq"></slot>
    </aside>
  </div>
</template>

<script setup>

</script>


