<template>
	<div class="wrapper">
	    <div class="container input-data">
	    	<div class="row">
	    		<div class="col-md-4">
	    			<div class="form-group">
	    				<label>NIM</label>
	    				<input type="text" class="form-control" v-model="search_application.username">
	    			</div>
	    		</div>
	    		<div class="col-md-4">
	    			<div class="form-group">
	    				<label>Nama</label>
	    				<input type="text" class="form-control" v-model="search_application.name">
	    			</div>
	    		</div>
	    		<div class="col-md-4">
	    			<div class="form-group">
	    				<label>Status</label>
	    				<select class="form-control" v-model="search_application.status">
	    					<option value="-1">Semua Status</option>
	    					<option value="0">Belum Diperiksa</option>
							<option value="1">Diterima</option>
	    					<option value="2">Ditolak</option>
	    				</select>
	    			</div>
	    		</div>
	    	</div>
	    	<div class="row">
	    		<div class="col-12">
	    			<button class="btn btn-primary cari-appliant" v-on:click="get_all_applications">Cari</button>
	    		</div>
	    	</div>
	    	<div class="row">
	    		<div class="col-12 table-responsive">
			    	<table class="table">
			    		<thead class="thead-dark">
				    		<tr>
				    			<th>No</th>
				    			<th>Nama</th>
				    			<th>NIM</th>
				    			<th>Jenis Permohonan</th>
								<th>Status</th>
								<th>Action</th>
				    		</tr>
			    		</thead>
			    		<tbody>
						<tr v-for="(item,index) in application_raw.data">
		                    <td>{{ index+1 }}</td>
		                    <td><router-link :to="{ name:'panel-thesis-single-data-route', params: { 'id': item.application_id }}">{{ item.name }}</router-link></td>
		                    <td>{{ item.username }}</td>
		                    <td>
								<span v-if="item.permintaan == 1">Skripsi</span>
								<span v-if="item.permintaan == 2">Proposal</span>
								<span v-if="item.permintaan == 3">Komprehensif</span>
							</td>
							<td>{{ item.general_status_string }}</td>
							<td>
								<a href="#" class="badge badge-danger text-decoration-none" data-bs-target="#proof-of-delete" data-bs-toggle="modal" v-on:click="delete_apps_tempor(item.application_id)">Hapus</a>
							</td>
		                </tr>
			    		</tbody>
			    	</table>
	    		</div>
	    	</div>
        	<div class="col-12 pagination-wrapper">
        	</div>
				<pagination :data="application_raw" :limit="2" @pagination-change-page="get_all_applications"></pagination>
	    </div>
		<!-- Modal -->
		<div class="modal fade" id="proof-of-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Hapus Permohonan ini?</label>
		                	</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="btn btn-secondary close-modal-delete-apps" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="delete_application">Hapus</button>
		            </div>
		        </div>
		    </div>
		</div>
		<Transition name="fuduts">
            <div v-if="mode === 'loading'" class="loading-wrapper text-center">
                <div class="spinner-wrapper">
                    <div class="spinner-border text-light" style="width: 5rem; height: 5rem;"></div>
                </div>
            </div>
        </Transition>
	</div>
</template>

<script>
	import Autocomplete from '@trevoreyre/autocomplete-vue'

	import '@trevoreyre/autocomplete-vue/dist/style.css'
    
    export default {
		components: {
			Autocomplete
		},
    	data(){
    		return{
				application_yang_dihapus : 0,
    			page_mode : 1,
    			mode : "normal",
    			endpoint_get_all_aplications : "/f-panel/get-all-applications",
    			endpoint_delete_application : "/f-panel/delete-application",
				page_pbi_pusat : 1,
    			search_application : {},
    			application_raw : {},
				delete_app : {},
    		};
    	},
		methods:{
			delete_apps_tempor(id){
				this.application_yang_dihapus = id
			},
			delete_application(){
				this.mode = "loading";
				this.delete_app.application_id = this.application_yang_dihapus;
				axios.post(this.endpoint_delete_application,this.delete_app)
				.then(({data}) => {
					$(".close-modal-delete-apps").click();
					this.$swal("Application is deleted successfully");
					this.get_all_applications();
				})
			},
    		get_all_applications(page=1){
			    this.mode = "loading";
			    this.page_pbi_pusat = page;
				axios.post(this.endpoint_get_all_aplications+"?page="+page,this.search_application)
    			.then(({data}) => {
				    this.mode = "normal";
    				if(data['error'] === undefined){
    					console.log(data);
	    				this.application_raw = data
    				}else{
    					console.log(data);
    				}
    			});
    		},
		},
        mounted() {
        	this.get_all_applications();
        }
    }
</script>
