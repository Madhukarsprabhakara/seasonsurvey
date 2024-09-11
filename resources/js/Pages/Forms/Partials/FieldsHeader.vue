<template>
  <div class="border-b border-gray-200 pb-5 sm:flex sm:items-center sm:justify-between">
    <h3 class="text-base font-semibold leading-6 text-gray-900">{{$page.props.survey_questions.survey_detail.title}}</h3>
    <div class="mt-3 sm:ml-4 sm:mt-0">
      <button type="button" class="inline-flex items-center rounded-md bg-teal-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-teal-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-600">New Question</button>
    </div>
  </div>
</template>
