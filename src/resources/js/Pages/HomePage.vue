<template>
  <Head title="Home" />
  <div class="bg-white">
    

    <div class="relative isolate px-6 pt-1 lg:px-8">
      <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
        <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" />
      </div>
      <div class="mx-auto max-w-2xl py-10 sm:py-12 lg:py-12">
        <div class="hidden sm:mb-8 sm:flex sm:justify-center">
          <div class="relative rounded-full px-3 py-1 text-smleading-6 text-gray-600 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
            We are launching soon! <!-- <a href="#" class="font-semibold text-indigo-600"><span class="absolute inset-0" aria-hidden="true" />Read more <span aria-hidden="true">&rarr;</span></a> -->
          </div>
        </div>
        <div class="text-center">
          <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Survey platform with qualitative data analysis capabilities!</h1>
          <p class="mt-6 text-lg leading-8 text-gray-600">Collect PDFs, docs and open-ended responses from survey takers? Use multiple tools and spend weeks to extract insights from these sources? Stop. This is not just a better way to collect data but a radically different one that will turn those months and weeks into minutes. Survey platform with fantastic qualitative data analysis capabilities</p>
          <div class="mt-10 flex items-center justify-center gap-x-6">
            <!-- <a href="#" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Get started</a> -->
            <a href="https://github.com/Madhukarsprabhakara/seasonsurvey" target="_blank" class="text-sm font-semibold leading-6 text-gray-900">Try open-source<span aria-hidden="true"></span></a>
          </div>
        </div>
      </div>
      <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
        <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" />
      </div>
    </div>
      <div class="bg-white py-24 sm:py-32">
   
    </div>
  </div>
</template>

<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue'
import { Dialog, DialogPanel } from '@headlessui/vue'
import { Bars3Icon, XMarkIcon, InboxIcon, TrashIcon, UsersIcon } from '@heroicons/vue/24/outline'

const navigation = [
  { name: 'Product', href: '#' },
  { name: 'Features', href: '#' },
  { name: 'Marketplace', href: '#' },
  { name: 'Company', href: '#' },
]

const mobileMenuOpen = ref(false)
const features = [
  {
    name: 'Unlimited inboxes',
    description:
      'Non quo aperiam repellendus quas est est. Eos aut dolore aut ut sit nesciunt. Ex tempora quia. Sit nobis consequatur dolores incidunt.',
    href: '#',
    icon: InboxIcon,
  },
  {
    name: 'Manage team members',
    description:
      'Vero eum voluptatem aliquid nostrum voluptatem. Vitae esse natus. Earum nihil deserunt eos quasi cupiditate. A inventore et molestiae natus.',
    href: '#',
    icon: UsersIcon,
  },
  {
    name: 'Spam report',
    description:
      'Et quod quaerat dolorem quaerat architecto aliquam accusantium. Ex adipisci et doloremque autem quia quam. Quis eos molestiae at iure impedit.',
    href: '#',
    icon: TrashIcon,
  },
]
const steps = [
  { id: 'Step 1', name: 'Job details', href: '#', status: 'complete' },
  { id: 'Step 2', name: 'Application form', href: '#', status: 'current' },
  { id: 'Step 3', name: 'Preview', href: '#', status: 'upcoming' },
]
</script>