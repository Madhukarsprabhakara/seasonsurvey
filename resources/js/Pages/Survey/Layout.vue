<template>
    <div class="bg-sky-100 h-full py-12">
        <div class="max-w-5xl  mx-auto sm:px-6 lg:px-8"> 
        	<div class="bg-white border-2 sm:rounded-lg ">
        		<LanguageSelection />
	            <Title />
	            <div class="max-w-4xl mt-4 ml-4 mr-4 py-4">
	            	<!--v-for pages  -->
	            	<form @submit.prevent="submit">
	            	<div v-for="page in $page.props.event.pages">
	            		
	            		<div v-for="qid in page.question_ids">
	            			
	            			<div v-if="qid.question">
	            				<!-- {{qid.question}} -->
	            				<div v-if="qid.question.conditional_logic">
	            					<component v-if="evaluateExpression(qid.question.conditional_logic, store)" :is="componentMap[qid.question.question_type.html_code]" :qid="qid.question" :key="qid.question.question_uuid" ></component>
	            					
	            				</div>
	            				<div v-else>
	            					<component	 :is="componentMap[qid.question.question_type.html_code]" :qid="qid.question" :key="qid.question.question_uuid" ></component>
	            				</div>	

	            			</div>
	            			
	            			
	            			
			            	
	            		</div>
	            		
	            	</div>
	            	<button type="submit" :disabled="store.form.processing" class="inline-flex items-center gap-x-1.5 rounded-md bg-teal-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-teal-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-600">
					    Submit
					    <CheckCircleIcon class="-mr-0.5 h-5 w-5" aria-hidden="true" />
					 </button>
					 
	            	</form>
	            	<InputError v-if="JSON.stringify($page.props.errors)!== '{}'" message="Please correct the errors mentioned above." class="mt-2" />
	        	</div>
        	</div>
        </div>
    </div>
   <!--  </AppLayout> -->
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
	const store = useSurveyStore()

	const componentMap = {
	    Numericbox: NumericBox,
	    Commentfield: CommentField,
	    Radiohorizontal: RadioHorizontal,
	    Radiovertical: RadioVertical,
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