<template>
<AppLayout title="Rules">
	<!--<div class="mx-auto  w-full  gap-x-8 px-4 py-4 sm:px-6 lg:px-8 bg-white">
		<p>test</p>
	</div>-->
	<FormFieldsLayout>
		<template #leftq>
				
				
		</template>
		<template #questions>
				<!-- <FormsList /> -->
			<Fields />
		</template>
		<template #rightq>
				
		</template>
	</FormFieldsLayout>
</AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import FormFieldsLayout from '@/Pages/Forms/Partials/FormFieldsLayout.vue';
import FormsList from '@/Pages/Forms/Partials/FormsList.vue';
import Fields from '@/Pages/Forms/Partials/Fields.vue';

</script>