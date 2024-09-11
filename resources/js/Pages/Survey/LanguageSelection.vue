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
  <div class="mt-4 mr-4 mb-4 ml-4 sm:flex sm:items-center  sm:justify-end justify-end">
   	
    <select id="location" v-model="selected" name="location" class="mt-2 block w-2/5 sm:w-1/5 md:w-1/5 rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
      <option v-for="language in $page.props.event.languages" :value="language.language_detail.id">{{language.language_detail.title}}</option>
      
    </select>
  </div>
</template>

<script setup>
import { BarsArrowUpIcon, ChevronDownIcon, MagnifyingGlassIcon } from '@heroicons/vue/20/solid'
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { ref, watch } from 'vue'
import { usePage } from '@inertiajs/vue3'

const page = usePage()
const selected = ref(page.props.selected_language)

watch(selected, (newPicked) => {
 
window.location=route('surveys.show', {'global_id' : page.props.event.global_id, 'lang': selected.value});
// selected=route().params['lang']
})
</script>