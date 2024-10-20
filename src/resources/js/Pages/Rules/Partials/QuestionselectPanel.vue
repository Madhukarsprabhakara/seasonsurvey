<template>
	<div >
		<!-- {{$page.props.survey_questions.pages[0]}} -->
		<ul role="list" class="divide-y divide-gray-100">
			<li v-for="question in $page.props.survey_questions.pages[0].question_ids" class="flex items-center justify-between gap-x-6 py-5">
				<div class="min-w-0">
					<div class="flex items-start gap-x-3">
						<!-- {{question.question.question_uuid}} -->
						<NavLink :href="route('qrules.index', {'global_id': $page.props.survey_questions.global_id, 'question_uuid' : question.question.question_uuid})" :active="route().current('qrules.index', {'global_id':$page.props.survey_questions.global_id, 'question_uuid' : question.question.question_uuid})" preserve-scroll> 
							<span class="text-sm font-light leading-6 text-gray-900">
								{{question.question.question_details.title}}
							</span>
						</NavLink>
						<!-- <p class="text-sm font-light leading-6 text-gray-900">Please tell us about the creative project that you plan to develop through the Creatives For Our future program, and whqt you aim to achieve by the end of the program (April 2026) - please include tangible goal/outcome</p> -->

						<!-- <p class="mt-0.5 whitespace-nowrap rounded-md bg-green-50 px-1.5 py-0.5 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Rules set</p> -->
					</div>
					<div class="mt-1 flex items-center gap-x-2 text-xs leading-5 text-gray-500">
				        <!-- <p class="whitespace-nowrap">Due on <time datetime="2023-03-17T00:00Z">March 17, 2023</time></p>
				        <svg viewBox="0 0 2 2" class="h-0.5 w-0.5 fill-current">
				          <circle cx="1" cy="1" r="1" />
				      </svg> -->
				      <!-- <p class="truncate">Created by Leslie Alexander</p> -->
				      <div v-if="question.question.rule_group">
				      	<p v-if="question.question.rule_group.rules.length >0 " class="mt-0.5 whitespace-nowrap rounded-md bg-green-50 px-1.5 py-0.5 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Edit Rules</p>
				      	<p v-else class="mt-0.5 whitespace-nowrap rounded-md bg-red-50 px-1.5 py-0.5 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/20">Set Rules</p>
				  	  </div>
				  	  <p v-else class="mt-0.5 whitespace-nowrap rounded-md bg-red-50 px-1.5 py-0.5 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/20">Set Rules</p>
				  </div>
				</div>

			</li>
		</ul>
	</div>
</template>

<script setup>
import NavLink from '@/Components/NavLink.vue';
</script>