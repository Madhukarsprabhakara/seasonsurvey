<style>
	@import 'datatables.net-dt';
	@import 'datatables.net-buttons-dt';
</style>
<template>
<AppLayout title="Rules">
	<!--<div class="mx-auto  w-full  gap-x-8 px-4 py-4 sm:px-6 lg:px-8 bg-white">
		<p>test</p>
	</div>-->
	<DataLayout>
	<template #left>
			<!--<p>left</p>-->
			
		</template>
		<template #main>

			<DataTable
		      :columns="columns"
		      :options="options"
		      :ajax="data_url"
		      class="row-border hover cell-border stripe compact"
		      width="100%"
		    >
      <thead>
        <tr>
          <th v-for="header in $page.props.table_header" class="text-pretty">{{header}}</th>
          <!-- <th>Position</th>
          <th>Office</th>
          <th>Extn.</th>
          <th>Start date</th>
          <th>Salary</th> -->
        </tr>
      </thead>
      
    </DataTable>
		</template>
		<!-- <template #right>
			
		</template> -->
	</DataLayout>
</AppLayout>
</template>

<script setup lang="ts">
import AppLayout from '@/Layouts/AppLayout.vue';
import DataLayout from '@/Pages/Forms/Data/DataLayout.vue';
import DataTable from 'datatables.net-vue3';
import { useForm, usePage } from '@inertiajs/vue3';
import DataTablesLib from 'datatables.net';
// import 'datatables.net-dt/css/jquery.dataTables.css';
import 'datatables.net-buttons/js/buttons.html5';
import 'datatables.net-select';
import 'datatables.net-responsive';
import 'datatables.net-buttons';
import jszip from 'jszip';
import pdfmake from 'pdfmake';

DataTable.use(DataTablesLib);
// DataTablesLib.Buttons.jszip(jszip);
// DataTablesLib.Buttons.pdfMake(pdfmake);


// const columns = [
//   { data: 'Please tell us about the creative project that you plan to develop through the Creatives For Our future program, and whqt you aim to achieve by the end of the program (April 2026) - please include tangible goal/outcome' },
//   { data: 'position' },
//   { data: 'office' },
//   { data: 'extn' },
//   { data: 'start_date' },
//   { data: 'salary' },
// ];
const columns = usePage().props.columns;
const data_url='/sd/'+usePage().props.survey_id
const options = {
  dom: 'Bftip',
  select: true,
  scrollX: true,
  scrollCollapse: true,
  scrollY: '400px',
  stateSave: true,
  paging: false,
  ordering: false,

};
</script>
