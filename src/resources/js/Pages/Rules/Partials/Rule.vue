<template>
  <div class="bg-white border-2 mx-4 px-2 mt-4 py-5 sm:px-6">
    <div class="flex space-x-3">
      
      <div class="min-w-0 flex-1">
      	<p class="text-xs text-gray-500">
          Rule {{props.data.sort_order}}
        </p>
        <p class="text-sm mt-1 font-semibold text-gray-900">
          <a href="#" class="hover:underline">{{props.data.name}}</a>
        </p>
        <p class="text-sm text-gray-500">
          
        </p>
      </div>

      <div class="flex flex-shrink-0 self-center">
        <Menu as="div" class="relative inline-block text-left">
          <div>
            <MenuButton class="-m-2 flex items-center rounded-full p-2 text-gray-400 hover:text-gray-600">
              <span class="sr-only">Open options</span>
              <EllipsisVerticalIcon class="h-5 w-5" aria-hidden="true" />
            </MenuButton>
          </div>

          <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
            <MenuItems class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
              <div class="py-1">
                <MenuItem v-slot="{ active }">
                  <NavLink :href="route('rules.edit',{'rule' : props.data.id})" class="active ":class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'flex px-4 py-2 text-sm']">
                    <PencilIcon class="mr-3 h-5 w-5 text-gray-400" aria-hidden="true" />
                    <span>Edit</span>
                  </NavLink>
                  
                </MenuItem>
                <MenuItem v-slot="{ active }">
                  <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'flex px-4 py-2 text-sm']">
                    <TrashIcon class="mr-3 h-5 w-5 text-gray-400" aria-hidden="true" />
                    <span>Delete</span>
                  </a>
                </MenuItem>
                
              </div>
            </MenuItems>
          </transition>
        </Menu>
      </div>
    </div>
    <article class="prose mt-3 whitespace-pre-line ">
      	<p class="text-sm truncate  text-gray-500 ">{{props.data.rule}}</p>
    </article>
  </div>
</template>

<script setup>
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { CodeBracketIcon, EllipsisVerticalIcon, FlagIcon, StarIcon, PencilIcon, TrashIcon } from '@heroicons/vue/20/solid'
import NavLink from '@/Components/NavLink.vue';
const props = defineProps(['data'])

</script>