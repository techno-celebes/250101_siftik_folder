<template>
    <div class="wrapper">
        <div class="container input-data">
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <td>No</td>
                                <td>Nama</td>
                                <td>Tindakan</td>
                            </tr>
                        </thead>
                        <tbody class="single-thesis-data">
                            <tr>
                                <td>Nama Mahasiswa</td>
                                <td>{{ student_data.name }}</td>
                                <td><a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#student_name">Update</a></td>
                            </tr>
                            <tr>
                                <td>NIM</td>
                                <td>{{ student_data.username }}</td>
                                <td><a href="#" class="text-decoration-none"  data-bs-toggle="modal" data-bs-target="#student_nim">Update</a></td>
                            </tr>
                            <tr>
                                <td>Jurusan</td>
                                <td>{{ student_data?.prodi?.prodi_name ?? "-"  }}</td>
                                <td><a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#student_prodi">Update</a></td>
                            </tr>
							<tr>
                                <td>Password</td>
                                <td>***************</td>
                                <td><a href="#" class="text-decoration-none"  data-bs-toggle="modal" data-bs-target="#student_pw">Update</a></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ student_data.email }}</td>
                                <td><a href="#" class="text-decoration-none"  data-bs-toggle="modal" data-bs-target="#student_email">Update</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="modal fade" id="student_name" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Nama</label>
		                		<input type="text" class="form-control" v-model="student_data.name">
		                	</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close-name btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_student_name">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>

        <div class="modal fade" id="student_nim" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>NIM</label>
		                		<input type="text" class="form-control" v-model="student_data.username">
		                	</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close-username btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_student_nim">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>
		
        <div class="modal fade" id="student_prodi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Jurusan</label>
								<select class="form-select"  v-model="student_data.prodi_id">
									<option v-for="j in jurusan" :value="j.prodi_id">{{ j.prodi_name }}</option>
								</select>
		                	</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close-prodi btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_student_prodi">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>
        <div class="modal fade" id="student_pw" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Password</label>
		                		<input type="text" class="form-control" v-model="student_data.new_password">
		                	</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close-password btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_student_password">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>
        <div class="modal fade" id="student_email" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Email</label>
		                		<input type="text" class="form-control" v-model="student_data.email">
		                	</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close-email btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_student_email">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>
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
				jurusan : [],
    			page_application : 1,
                endpoint_get_single_students : "/f-panel/get-student-single",
                endpoint_update_student_name : "/f-panel/update-student-name",
				endpoint_get_all_prodi : "/f-panel/get-prodi",
                endpoint_update_student_username : "/f-panel/update-student-username",
                endpoint_update_student_prodi : "/f-panel/update-student-prodi",
				endpoint_update_student_password : "/f-panel/update-student-password",
                endpoint_update_student_email : "/f-panel/update-student-email",
                student_data : {
					prodi : {},
				},
    		};
    	},
		methods:{
            update_student_prodi(){
				console.log(this.student_data);
                axios.post(this.endpoint_update_student_prodi, this.student_data)
    			.then(({data}) => {
    				this.get_student_single();
    				$(".update-validity-close-prodi").click();
    			});
            },
			update_student_name(){
                axios.post(this.endpoint_update_student_name, this.student_data)
    			.then(({data}) => {
    				this.get_student_single();
    				$(".update-validity-close-name").click();
    			});
            },
            update_student_nim(){
                axios.post(this.endpoint_update_student_username, this.student_data)
    			.then(({data}) => {
    				this.get_student_single();
    				$(".update-validity-close-username").click();
    			});
            },
            update_student_password(){
				console.log(this.student_data);
				axios.post(this.endpoint_update_student_password, this.student_data)
    			.then(({data}) => {
    				this.get_student_single();
    				$(".update-validity-close-password").click();
    			});
            },
            update_student_email(){
                axios.post(this.endpoint_update_student_email, this.student_data)
    			.then(({data}) => {
    				this.get_student_single();
    				$(".update-validity-close-email").click();
    			});
            },
		    get_student_single() {
		        this.mode = "loading";
				var send_data = {};
				send_data.user_id = this.$route.params.id;
		        axios.post(this.endpoint_get_single_students, send_data)
		            .then(({data}) => {
		                this.mode = "normal";
		                if (data['error'] === undefined) {
		                    this.student_data = data
		                } else {
		                    this.$swal("Error", data.message, "error");
		                    console.log(data);
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
			this.get_student_single();
			this.get_all_prodi();
        }
    }
</script>