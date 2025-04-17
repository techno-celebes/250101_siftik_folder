<template>
	<div class="wrapper">
	    <div class="container input-data">
	    	<div class="row tambah-mahasiswa">
	    		<div class="col-12">
	    			<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-student">Tambah Mahasiswa</button>
	    		</div>
	    	</div>
			<div class="row">
				<div class="col-md-4">
	    			<div class="form-group">
	    				<label>NIM</label>
	    				<input type="text" class="form-control" v-model="search_student.username">
	    			</div>
	    		</div>
	    		<div class="col-md-4">
	    			<div class="form-group">
	    				<label>Nama</label>
	    				<input type="text" class="form-control" v-model="search_student.name">
	    			</div>
	    		</div>
			</div>
	    	<div class="row">
	    		<div class="col-12">
	    			<button class="btn btn-primary cari-appliant" v-on:click="get_all_students">Cari</button>
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
				    			<th>Action</th>
				    		</tr>
			    		</thead>
			    		<tbody>
						<tr v-for="(item,index) in student_raw.data">
		                    <td>{{ index+1 }}</td>
							<td><router-link :to="{ name:'panel-student-data-single-route', params: { 'id': item.id }}">{{ item.username }}</router-link></td>
		                    <td>{{ item.name }}</td>
		                    <td>
		                    </td>
		                </tr>
			    		</tbody>
			    	</table>
	    		</div>
	    	</div>
        	<div class="col-12 pagination-wrapper">
				<pagination :data="student_raw" :limit="2" @pagination-change-page="get_all_students"></pagination>
        	</div>
	    </div>
		<!-- Modal -->
		<div class="modal fade" id="add-student" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Nama Mahasiswa</label>
		                		<input type="text" class="form-control" v-model="mahasiswa_baru.name">
		                	</div>
		                	<div class="col-12 form-group">
		                		<label>NIM</label>
		                		<input type="text" class="form-control" v-model="mahasiswa_baru.username">
		                	</div>
		                	<div class="col-12 form-group">
		                		<label>Jurusan</label>
								<select class="form-select"  v-model="mahasiswa_baru.prodi_id">
									<option v-for="j in jurusan" :value="j.prodi_id">{{ j.prodi_name }}</option>
								</select>
		                	</div>
		                	<div class="col-12 form-group">
		                		<label>Password</label>
		                		<input type="text" class="form-control" v-model="mahasiswa_baru.password">
		                	</div>
							<div class="col-12 form-group">
		                		<label>Email</label>
		                		<input type="text" class="form-control" v-model="mahasiswa_baru.email">
		                	</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="close-modal-insert-student btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="add_students">Save changes</button>
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
    			page_mode : 1,
    			mode : "normal",
    			mahasiswa_baru : {},
    			endpoint_get_all_students : "/f-panel/get-student",
    			endpoint_get_all_prodi : "/f-panel/get-prodi",
				endpoint_insert_student : "/f-panel/insert-student",
    			page_pbi_pusat : 1,
    			search_student : {},
    			student_raw : {},
				jurusan : [],
    		};
    	},
		methods: {
		    add_students() {
		        console.log(this.mahasiswa_baru);
		        this.mode = "loading";
		        axios.post(this.endpoint_insert_student, this.mahasiswa_baru)
		            .then(({data}) => {
		                let errorMessages = [];
		                if (data.error) {
		                    for (let key in data.error) {
		                        if (data.error.hasOwnProperty(key)) {
		                            errorMessages = errorMessages.concat(data.error[key]);
		                        }
		                    }
		                }

		                if (errorMessages.length > 0) {
		                    const errorMessage = errorMessages.join('\n');
		                    this.$swal("Error", errorMessage, "error");
		                } else {
		                    this.get_all_students();
		                }
		                if (data['error'] === undefined) {
		                    console.log(data);

		                } else {

		                    console.log(data);
		                }
		            })
		    },
		    get_all_students(page = 1) {
		        this.mode = "loading";
		        this.page_pbi_pusat = page;
		        axios.post(this.endpoint_get_all_students + "?page=" + page, this.search_student)
		            .then(({
		                data
		            }) => {
		                this.mode = "normal";
		                if (data['error'] === undefined) {
		                    console.log(data);
		                    this.student_raw = data
		                } else {
		                    this.$swal("Error", data.message, "error");
		                    console.log(data);
		                    alert("SNDSNIUDSN")
		                }
		                $(".close-modal-insert-student").click();
		            });
		    },
		    get_all_prodi(page = 1) {
		        this.mode = "loading";
		        this.page_pbi_pusat = page;
		        axios.post(this.endpoint_get_all_prodi)
		            .then(({
		                data
		            }) => {
		                this.mode = "normal";
		                if (data['error'] === undefined) {
		                    console.log(data);
		                    this.jurusan = data
		                } else {
		                    this.$swal("Error", data.message, "error");
		                    console.log(data);
		                }
		                $(".close-modal-insert-student").click();
		            });
		    }
		},
        mounted() {
        	this.get_all_students();
        	this.get_all_prodi();
		}
    }
</script>
