<template>
	<AppLayout title="Rules">
		<RuleLayout>
			<template #left>
        		
        		<div class="text-xs  font-semibold leading-6 text-gray-400">Form Fields</div>
        		<div class="text-small  font-semibold leading-6 text-gray-400">{{$page.props.survey_questions.survey_detail.title}} </div>
        		<QuestionselectPanel />
        		
      		</template>
      		<template #main>
      			
      			<!-- <RulesInstructions v-if="!$page.props.rule_group"/> -->
      			<CreateGroupForm v-if="!$page.props.rule_group"/>
      			<div v-if="$page.props.rule_group">
      				
      				<div>
      					
      					<Rules />
      				</div>
      			</div>
      		
            </template>    
                
                
			<template #right>
        		<!--<p>This is the right column content.</p>-->
      		</template>
		</RuleLayout>
	</AppLayout>
</template>

<script setup>
	import AppLayout from '@/Layouts/AppLayout.vue';
	import RuleLayout from '@/Pages/Rules/RuleLayout.vue';
	import QuestionselectPanel from '@/Pages/Rules/Partials/QuestionselectPanel.vue';
	import RulesInstructions from '@/Pages/Rules/Partials/RulesInstructions.vue';
	import Rule from '@/Pages/Rules/Partials/Rule.vue';
	import Rules from '@/Pages/Rules/Partials/Rules.vue';
	import CreateGroupForm from '@/Pages/Rules/Partials/CreateGroupForm.vue';
	import NavLink from '@/Components/NavLink.vue';
	
</script>