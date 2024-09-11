<template>
	 <div class="col-span-full ">
            <label for="cover-photo" class="block text-md font-bold leading-6 text-gray-900">{{props.qid.question_details.title}}</label>
            <div class="mt-2 flex justify-center rounded-lg border border-dashed bg-gray-100 border-gray-900/25 px-6 py-10">
              <div class="text-center">
                <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                </svg>
                <div class=" mt-4 flex text-sm leading-6 text-gray-600">
                  <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                    <span>Upload a file</span>
                    <input id="file-upload" :name="'file_upload_'+store.fields[props.qid.id]" @input="store.fields[props.qid.id] = $event.target.files[0]" type="file" class="sr-only">
                    <progress v-if="store.form.progress" :value="store.form.progress.percentage" max="100">
				      {{ store.form.progress.percentage }}%
				    </progress>
                  </label>
                  <p class="pl-1">(Only one file)</p>
                </div>
                <p class="text-xs leading-5 text-gray-600">PDF files up to 10MB</p>
              </div>
            </div>
          </div>
</template>

<script setup>
import { ref, watch } from 'vue'
import { useSurveyStore } from '@/Pages/Store/surveyStore';
const props = defineProps(['qid'])
const text = ref('')
const store = useSurveyStore()

watch(
      () => store.fields[props.qid.id],
      (newField) => {
      store.addFormFields('file_upload_'+props.qid.id, `${newField}`)
        
      },
      { deep: true }
    )
</script>