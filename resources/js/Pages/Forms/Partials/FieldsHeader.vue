<template>
  <div class="border-b border-gray-200 pb-5 sm:flex sm:items-center sm:justify-between">
    <h3 class="text-base font-semibold leading-6 text-gray-900">{{$page.props.survey_questions.survey_detail.title}}</h3>
    <CreateField />
  </div>
</template>



<script setup>
import CreateField from '@/Pages/Forms/Partials/CreateField.vue';

</script>
