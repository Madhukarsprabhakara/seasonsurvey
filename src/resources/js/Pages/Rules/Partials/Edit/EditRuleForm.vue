<template>
<AppLayout title="Rules">
	<div class="mx-auto  w-full  gap-x-8 px-4 py-4 sm:px-6 lg:px-8 bg-white">
		<CreateRuleHeader />
	</div>
	<CreateRuleLayout>

		<template #rule>

			<EditPreviewRule />
		</template>
		<template #result>
			<Preview />
		</template>
	</CreateRuleLayout>
</AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import CreateRuleLayout from '@/Pages/Rules/Partials/CreateRuleLayout.vue';
import CreateRuleHeader from '@/Pages/Rules/Partials/CreateRuleHeader.vue';
import EditPreviewRule from '@/Pages/Rules/Partials/Edit/EditPreviewRule.vue';
import Preview from '@/Pages/Rules/Partials/Preview.vue';

</script>