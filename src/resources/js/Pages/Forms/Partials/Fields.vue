<template>
  <div>
  	<FieldsHeader />
    <ul v-if="$page.props.survey_questions.pages.length>0" role="list" class="divide-y divide-gray-100">
      <li v-for="question in $page.props.survey_questions.pages[0].question_ids" :key="question.id" class="flex items-center justify-between gap-x-6 py-5">
        <div class="flex min-w-0 gap-x-4">
          
          <div class="min-w-0 flex-auto">
            
            <p class="mt-1 text-wrap text-sm leading-5 text-gray-500">{{ question.question.question_details.title }}</p>
          </div>
        </div>
        
        <NavLink :href="route('qrules.index', {'global_id': $page.props.survey_questions.global_id, 'question_uuid' : question.question.question_uuid})" :active="route().current('qrules.index', {'global_id':$page.props.survey_questions.global_id, 'question_uuid' : question.question.question_uuid})">
              <span class="rounded-full bg-white px-2.5 py-1 text-xs font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Rules</span>
          </NavLink>
      </li>
    </ul>
    
  </div>
</template>

<script setup>
import FieldsHeader from '@/Pages/Forms/Partials/FieldsHeader.vue';
import NavLink from '@/Components/NavLink.vue';
const people = [
  {
    name: 'Leslie Alexander',
    email: 'leslie.alexander@example.com',
    imageUrl:
      'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
    href: '#',
  },
  {
    name: 'Michael Foster',
    email: 'michael.foster@example.com',
    imageUrl:
      'https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
    href: '#',
  },
  {
    name: 'Dries Vincent',
    email: 'dries.vincent@example.com',
    imageUrl:
      'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
    href: '#',
  },
  {
    name: 'Lindsay Walton',
    email: 'lindsay.walton@example.com',
    imageUrl:
      'https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
    href: '#',
  },
  {
    name: 'Courtney Henry',
    email: 'courtney.henry@example.com',
    imageUrl:
      'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
    href: '#',
  },
  {
    name: 'Tom Cook',
    email: 'tom.cook@example.com',
    imageUrl:
      'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
    href: '#',
  },
]
</script>