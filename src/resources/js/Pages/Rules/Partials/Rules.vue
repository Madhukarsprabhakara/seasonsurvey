<template>
  <div class="border-2  py-5 ">
    <div class="flex space-x-3">
      <div class="flex-shrink-0">
        
      </div>
      
      <div class="min-w-0 flex-1">
      	<p class="text-xs text-gray-500">
          Rule group
        </p>
        <p class="text-sm font-semibold text-gray-900">
          <a href="#" class="hover:underline">{{$page.props.rule_group.name}}</a>
        </p>
        
      </div>

      <div class="flex flex-shrink-0 self-center">
      	<NavLink v-if="$page.props.rule_group.rules.length>0" :href="route('rules.create', {'rule_group_id': $page.props.rule_group.id, 'question_uuid' : $page.props.question.question_uuid})" :active="route().current('rules.create', {'rule_group_id':$page.props.rule_group.id, 'question_uuid' : $page.props.question.question_uuid})" preserve-scroll> 
		      <button type="button" class="rounded bg-teal-600 px-2 py-1 text-xs font-semibold text-white shadow-sm hover:bg-teal-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-600">
		        <!-- <PlusIcon class="-ml-0.5 mr-1.5 h-5 w-5" aria-hidden="true" /> -->
		        Add another rule
		      </button>
	  
	  	</NavLink>
        <Menu as="div" class="relative inline-block text-left">
          <div>
            <MenuButton class=" flex items-center rounded-full p-2 text-gray-400 hover:text-gray-600">
              <span class="sr-only">Open options</span>
              <EllipsisVerticalIcon class="h-5 w-5" aria-hidden="true" />
            </MenuButton>
          </div>

          <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
            <MenuItems class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
              <div class="py-1">
                <MenuItem v-slot="{ active }">
                  <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'flex px-4 py-2 text-sm']">
                    <PencilIcon class="mr-3 h-5 w-5 text-gray-400" aria-hidden="true" />
                    <span>Edit</span>
                  </a>
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
    <RulesEmptyState v-if="$page.props.rule_group.rules.length==0" :rulegroup="$page.props.rule_group.id" :question="$page.props.question"/>
    <Rule v-for="rule in $page.props.rule_group.rules" :key="rule.id" :data="rule"/>
  </div>
</template>

<script setup>
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { CodeBracketIcon, EllipsisVerticalIcon, FlagIcon, StarIcon, PencilIcon, TrashIcon } from '@heroicons/vue/20/solid'
import Rule from '@/Pages/Rules/Partials/Rule.vue';
import RulesEmptyState from '@/Pages/Rules/Partials/RulesEmptyState.vue';
import { PlusIcon } from '@heroicons/vue/20/solid'
import NavLink from '@/Components/NavLink.vue';
</script>