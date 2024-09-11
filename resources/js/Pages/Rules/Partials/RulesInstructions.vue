<template>
<div class="rounded-md bg-yellow-50 p-4">
      			<div class="flex">
      				<div class="flex-shrink-0">
      					<ExclamationTriangleIcon class="h-5 w-5 text-yellow-400" aria-hidden="true" />
      				</div>
      				<div class="ml-3">
      					<h3 class="text-sm font-medium text-yellow-800">Rules creation tips</h3>
      					<div class="mt-2 text-sm text-yellow-700">
      						<ul role="list" class="list-disc space-y-1 pl-5">
      							<li>You start by creating a rule group.</li>
      							<li>Rule groups are a just a set of rules that apply on a question.</li>
      							<li>You can have one or more rules for each question in your forms.</li>
      							<!-- <li>Multiple rules apply in the order they appear on this screen.</li> -->
      							<li>Each rule applies on the data and the result of applying each rule are stored in a new field.</li>

      						</ul>
      						<p class="mt-2 font-bold">Example</p>
      						<p> You can have 2 rules for a question, like so</p>
      						<p class="mt-2">Rule 1: "Give me a summary of the positive feedback in the response"</p>
      						<p class="mt-1">Rule 2: "Identify themes from the summary text"</p>
      						<p class="mt-2 font-medium">Result from both the rules get stored on two separate fields in your data table.</p>
      						<button type="button" class="mt-2 rounded-md bg-yellow-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-yellow-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Got it</button>
      					</div>
      				</div>
      			</div>
      		</div>

</template>
<script setup>
import { ExclamationTriangleIcon } from '@heroicons/vue/20/solid'


</script>