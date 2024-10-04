	<template>
	<FieldsHeader />
	<div v-if="$page.props.survey_questions.pages.length>0" class="mt-6">
		<div v-for="page in $page.props.survey_questions.pages">

			<div v-for="qid in page.question_ids">

				<div class="mb-8">
					<component  :is="componentMap[qid.question.question_type.html_code]" :qid="qid.question" :key="qid.question.question_uuid" ></component>
				</div>

					

			</div>




			

		</div>
	</div>
	</template>

<script setup>
import { ref, computed, onMounted } from 'vue';
import { CheckCircleIcon } from '@heroicons/vue/20/solid'
import { useForm, usePage } from '@inertiajs/vue3';             
import Welcome from '@/Components/Welcome.vue';
import Form from '@/Pages/Validate/Form.vue';
import LanguageSelection from '@/Pages/Survey/LanguageSelection.vue';
import Title from '@/Pages/Survey/Title.vue';
import CommentField from '@/Pages/Survey/Questions/CommentField.vue';
import DropdownSingle from '@/Pages/Survey/Questions/DropdownSingle.vue';
import NumericBox from '@/Pages/Survey/Questions/NumericBox.vue';
import RadioHorizontal from '@/Pages/Survey/Questions/RadioHorizontal.vue';
import RadioVertical from '@/Pages/Survey/Questions/RadioVertical.vue';
import Attachment from '@/Pages/Survey/Questions/Attachment.vue';
import TextBox from '@/Pages/Survey/Questions/TextBox.vue';
import EmailAddress from '@/Pages/Survey/Questions/EmailAddress.vue';
import { useSurveyStore } from '@/Pages/Store/surveyStore';
import InputError from '@/Components/InputError.vue';
import FieldsHeader from '@/Pages/Forms/Partials/FieldsHeader.vue';
	const store = useSurveyStore()

	const componentMap = {
	    Numericbox: NumericBox,
	    Commentfield: CommentField,
	    Radiohorizontal: RadioHorizontal,
	    Attachment: Attachment,
	    Textbox: TextBox,
	    Emailaddress: EmailAddress,
	 }
	 
	 function submit() {
	  store.form.post('/storesurvey', {
	  	preserveScroll: true,
	  	_method: 'put',

	  })
	}
	 store.form = useForm(
        store.fields,
        
      )
	 
	  onMounted(() => {
	  	for (let item of usePage().props.event.pages) {
	  		// console.log(item)
	      for (let sub_item of item.question_ids)
	      {
	      	if (sub_item.question)
	      	{
	      		// console.log(sub_item.question.question_uuid)
	      		//store.addSkipMap(sub_item.question.question_uuid, null)
	      		
	      	
	      		if (!sub_item.question.conditional_logic)
	      		{
	      			store.addFormFields('a_'+sub_item.question.id, '')
	      		}
	      			
	      		
	      		
	      		//console.log(form['4d03dda3-332a-44e2-94fa-02df1029cc77'])
	      		//form.fields.push({sub_item.question.question_uuid: null})
	      		
	      	}
	      	
	      }
	    }
	    
	  	// console.log(store.fields['4d03dda3-332a-44e2-94fa-02df1029cc77'])
      	//store.addSkipMap(props.qid.question_uuid, null)
     })
	 function evaluateExpression(expression, store) {
	 	  const truthCondt=Function('"use strict";return (' + expression + ')')()['rule']
	 	  return eval(truthCondt)
		  
	 }
</script>