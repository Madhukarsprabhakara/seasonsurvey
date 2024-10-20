<template>
<AppLayout title="Rules">
	<!--<div class="mx-auto  w-full  gap-x-8 px-4 py-4 sm:px-6 lg:px-8 bg-white">
		<p>test</p>
	</div>-->
	<FormsLayout>
	<template #left>
			<!--<p>left</p>-->
			
		</template>
		<template #main>
			<CreateForm />
			<FormsList />
			
		</template>
		<template #right>
			
		</template>
	</FormsLayout>
</AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import FormsLayout from '@/Pages/Forms/FormsLayout.vue';
import FormsList from '@/Pages/Forms/Partials/FormsList.vue';
import CreateForm from '@/Pages/Forms/Partials/CreateForm.vue';

</script>