<template>
  <div class="inline-flex rounded-md shadow-sm">
    <button type="button" class="inline-flex items-center rounded-l-md bg-teal-600 px-3 py-2 text-sm font-semibold text-white  ">New Question</button>
    <Menu as="div" class="relative -ml-px block">
      <MenuButton class="relative inline-flex items-center rounded-r-md hover:bg-teal-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-600 bg-teal-600 px-2 py-2 text-white ring-1 ring-inset ring-gray-300  focus:z-10">
        <span class="sr-only">Open options</span>
        <ChevronDownIcon class="h-5 w-5" aria-hidden="true" />
      </MenuButton>
      <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
        <MenuItems class="absolute right-0 z-10 -mr-1 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
          <div class="py-1">
            <MenuItem v-for="questiontype in questiontypes" :key="questiontype.id" v-slot="{ active }">
              <Link :href="route('questions.create', {'survey': $page.props.survey_questions.id, 'question_type': questiontype.id})" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">{{ questiontype.title }}</Link>
            </MenuItem>
          </div>
        </MenuItems>
      </transition>
    </Menu>
  </div>
</template>

<script setup>
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { ChevronDownIcon } from '@heroicons/vue/20/solid'
import { ref, computed, onMounted } from 'vue';
import { usePage, Link } from '@inertiajs/vue3';

import axios from 'axios';
const questiontypes = ref([])
onMounted(() => {
    axios.get('/questiontypes')
      .then(response => {
        
        questiontypes.value=response.data
      })
      .catch(error => {
        console.error(error);
      });  
})
</script>