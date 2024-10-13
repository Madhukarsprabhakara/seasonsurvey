
<template>
  <div class="bg-white px-4 py-2 sm:px-6 border-2 border-teal-500">
    <div class="flex space-x-3 px-2 py-2 ">
      
      <div class="min-w-0 flex-1">
        
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
    <main class="flex-1 top-8 w-full">
      <slot name="main"/>
    </main>
  </div>
</template>

<script setup>
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { CodeBracketIcon, EllipsisVerticalIcon, FlagIcon, TrashIcon } from '@heroicons/vue/20/solid'
</script>


