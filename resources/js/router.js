import Vue from 'vue'
import VueRouter from 'vue-router'

import Dashboard from './components/panel/dashboard/DashboardComponent.vue'
import StudentData from './components/panel/dashboard/StudentDataComponent.vue'
import ApplyThesis from './components/panel/dashboard/ApplyThesisComponent.vue'
import ApplicationList from './components/panel/dashboard/ApplicationListComponent.vue'
import ApplicationSingleComponent from './components/panel/dashboard/ApplicationSingleComponent.vue'
import MyApplicationSingleComponent from './components/panel/dashboard/MyApplicationSingleComponent.vue'
import ViewPdf from './components/panel/dashboard/ViewPDFComponent.vue'
import BantuanComponent from './components/panel/dashboard/BantuanComponent.vue'
import StudentDataSingle from './components/panel/dashboard/StudentDataSingleComponent.vue'

Vue.use(VueRouter)

const router = new VueRouter({
	mode: "history",
	routes : [
		{
			path: '/panel',
			name: 'panel-route',
			components: {
				default : Dashboard
			}
		},
		{
			path: '/panel/student-data',
			name: 'panel-student-data-route',
			components: {
				default : StudentData
			}
		},
		{
			path: '/panel/apply-thesis',
			name: 'panel-thesis-data-route',
			components: {
				default : ApplyThesis
			}
		},
		{
			path: '/panel/my-thesis-application-single/:id',
			name: 'panel-my-thesis-single-data-route',
			components: {
				default : MyApplicationSingleComponent
			}
		},
		{
			path: '/panel/thesis-application',
			name: 'panel-thesis-list-data-route',
			components: {
				default : ApplicationList
			}
		},
		{
			path: '/panel/thesis-application-single/:id',
			name: 'panel-thesis-single-data-route',
			components: {
				default : ApplicationSingleComponent
			}
		},
		{
			path: '/panel/view-pdf/:id',
			name: 'panel-view-pdf-route',
			components: {
				default : ViewPdf
			}
		},
		{
			path: '/panel/bantuan',
			name: 'panel-bantuan',
			components: {
				default : BantuanComponent
			}
		},
		{
			path: '/panel/student-data-single/:id',
			name: 'panel-student-data-single-route',
			components: {
				default : StudentDataSingle
			}
		},
	]
})

export default router