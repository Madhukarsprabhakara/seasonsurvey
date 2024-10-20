	<template>
		<FieldsHeader />
		<div v-if="$page.props.survey_questions.pages.length>0" class="mt-6">
		

			
			    <draggable 
			    v-model="question_list" 
			    group="people" 
			    @start="drag=true" 
			    @end="drag=false" 
			    item-key="id" @change="onChange">
			    <template #item="{element, index}">
			      
				    <div class="mb-8 cursor-move">
				    	
				      <component v-if="$page.props.edit_question_id!=element.question.id" :is="componentMap[element.question.question_type.html_code]" :qid="element.question" :key="element.question.question_uuid" ></component>
				      
				      <component v-else :is="componenteMap[$page.props.edit_question_type['html_code_edit']]" :qid="element.question" :key="element.question.question_uuid" ></component>
				      
				    </div>
			    </template>

			  </draggable>
			  
			  



			

		
		</div>
</template>

<script setup>
import { ref, computed, onMounted, watch } from 'vue';
import { CheckCircleIcon } from '@heroicons/vue/20/solid'
import { useForm, usePage } from '@inertiajs/vue3';             
import Welcome from '@/Components/Welcome.vue';
import Form from '@/Pages/Validate/Form.vue';
import LanguageSelection from '@/Pages/Survey/LanguageSelection.vue';
import Title from '@/Pages/Survey/Title.vue';
import CommentField from '@/Pages/Forms/Fieldtypes/CommentField.vue';
import DropdownSingle from '@/Pages/Forms/Fieldtypes/DropdownSingle.vue';
import NumericBox from '@/Pages/Forms/Fieldtypes/NumericBox.vue';
import RadioHorizontal from '@/Pages/Forms/Fieldtypes/RadioHorizontal.vue';
import RadioVertical from '@/Pages/Forms/Fieldtypes/RadioVertical.vue';
import Attachment from '@/Pages/Forms/Fieldtypes/Attachment.vue';
import TextBox from '@/Pages/Forms/Fieldtypes/TextBox.vue';
import EmailAddress from '@/Pages/Forms/Fieldtypes/EmailAddress.vue';

import CommentFielde from '@/Pages/Forms/Createeditfields/CommentFielde.vue';
// import DropdownSinglee from '@/Pages/Forms/Createeditfields/DropdownSinglee.vue';
import NumericBoxe from '@/Pages/Forms/Createeditfields/NumericBoxe.vue';
// import RadioHorizontale from '@/Pages/Forms/Createeditfields/RadioHorizontale.vue';
import RadioVerticale from '@/Pages/Forms/Createeditfields/RadioVerticale.vue';
// import Attachmente from '@/Pages/Forms/Createeditfields/Attachmente.vue';
import TextBoxe from '@/Pages/Forms/Createeditfields/TextBoxe.vue';
import EmailAddresse from '@/Pages/Forms/Createeditfields/EmailAddresse.vue';

import { useSurveyStore } from '@/Pages/Store/surveyStore';
import InputError from '@/Components/InputError.vue';
import FieldsHeader from '@/Pages/Forms/Partials/FieldsHeader.vue';
import draggable from 'vuedraggable';
import axios from 'axios';
	const store = useSurveyStore()

	const question_list = ref(usePage().props.survey_questions.pages[0].question_ids);
	watch(() => usePage().props.survey_questions.pages[0].question_ids, (newQuestionIds) => {
	  question_list.value = newQuestionIds
	})
	const componentMap = {
	    Numericbox: NumericBox,
	    Commentfield: CommentField,
	    Radiohorizontal: RadioHorizontal,
	    Attachment: Attachment,
	    Textbox: TextBox,
	    Emailaddress: EmailAddress,
	    Radiovertical: RadioVertical,

	 }
	 const componenteMap = {
	    Numericboxe: NumericBoxe,
	    Commentfielde: CommentFielde,
	    // Radiohorizontale: RadioHorizontale,
	    // Attachmente: Attachmente,
	    Radioverticale: RadioVerticale,
	    Textboxe: TextBoxe,
	    Emailaddresse: EmailAddresse,
	 }
	 
	 function submit() {
	  store.form.post('/storesurvey', {
	  	preserveScroll: true,
	  	_method: 'put',

	  })
	}
	 onMounted(() => {
	 	//console.log("mounted")
	  	//console.log(question_list.value)
     })
	  
	 function onChange(evt) {
	 	
	 	const data = [];
	 	question_list.value.forEach((item, index) => {
	 		
	 		item.order_no=index+1
	 		data.push({
		        order_no: index+1,
		        id: item.id,
		        user_id: item.user_id,
		        team_id: item.team_id,
		        survey_id: item.survey_id,
		        language_id: item.language_id,
		        question_id: item.question_id,
		        survey_page_id: item.survey_page_id
		    });
		    
	 	});
	 	
	 	axios.put('/questionorder/'+usePage().props.survey_questions.id, data)
		  .then(response => {
		    // Handle the response
		    
		  })
		  .catch(error => {
		    // Handle any errors
		    console.error(error);
		  });
	 	

	 }
	 
</script>