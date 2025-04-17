<template>
	<div class="wrapper">
	    <div class="container input-data">
	    	<div class="row tambah-application-skripsi">
	    		<div class="col-12">
	    			<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-application">Tambah Permintaan</button>
	    		</div>
	    	</div>
	    	<div class="row">
	    		<div class="col-12 table-responsive">
			    	<table class="table">
			    		<thead class="thead-dark">
				    		<tr>
				    			<th>No</th>
				    			<th>Nama</th>
				    			<th>Judul</th>
				    			<th>Jenis</th>
								<th>Waktu Upload</th>
				    			<th>Status Permohonan</th>
				    			<th>Status SK</th>
								<th>Action</th>
				    		</tr>
			    		</thead>
			    		<tbody>
						<tr v-for="(item,index) in application_list">
		                    <td>{{ index+1 }}</td>
		                    <td><router-link :to="{ name:'panel-my-thesis-single-data-route', params: { 'id': item.application_id }}">{{ item.name }}</router-link></td>
		                    <td>{{ item.thesis_title }}</td>
		                    <td>
								<span v-if="item.permintaan == 1">Skripsi</span>
								<span v-if="item.permintaan == 2">Proposal</span>
								<span v-if="item.permintaan == 3">Komprehensif</span>
							</td>
							<td>-</td>
		                    <td>{{ item.general_status_string }}</td>
		                    <td>
								<span v-if="item.sk_status == 0">SK Belum terbit</span>
								<span v-if="item.sk_status == 1">Proses Pembuatan SK</span>
								<span v-if="item.sk_status == 2">SK Siap Diambil</span>
							</td>
							<td>
		                    </td>
		                </tr>
			    		</tbody>
			    	</table>
	    		</div>
	    	</div>
	    </div>
		<!-- Modal -->
		<div class="modal fade" id="add-application" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-lg">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Tambah Permintaan</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label class="fs-6">Nama Mahasiswa</label>
		                		<input type="text" class="form-control" v-model="user.name" disabled>
		                	</div>
		                	<div class="col-12 form-group">
		                		<label class="fs-6">NIM</label>
		                		<input type="text" class="form-control" v-model="user.username" disabled>
		                	</div>
		                	<div class="col-12 form-group">
		                		<label class="fs-6">Type Permintaan</label>
								<select class="form-select" aria-label="Default select example" v-model="permintaan">
  									<option value="0" selected>---</option>
									<option value="1">Skripsi</option>
									<option value="2">Proposal</option>
									<option value="3">Komprehensif</option>
								</select>
		                	</div>
							<div class="col-12 form-group">
								<label class="fs-6">Judul Permintaan <span class="text-danger">*</span></label>
								<textarea class="form-control" placeholder="Masukkan judul permintaan/pengajuan" required v-model="thesis_title"></textarea>
							</div>

							<!-- Skripsi -->
							<div class="col-12 form-group" v-if="permintaan == 1 || permintaan == 2 || permintaan == 3">
		                		<label class="fs-6">No. Telp <span class="text-danger">*</span></label>
		                		<input type="text" class="form-control" v-model="selectedPhoneNumber" placeholder="Masukkan no. telp" />
		                	</div>
							<div class="col-12 form-group" v-if="permintaan == 1 || permintaan == 2 || permintaan == 3">
		                		<label class="fs-6">Email <span class="text-danger">*</span></label>
		                		<input type="text" class="form-control" v-model="selectedEmail" placeholder="Masukkan email"/>
		                	</div>
							<div class="col-12 form-group" v-if="permintaan == 1 || permintaan == 2 || permintaan == 3">
		                		<label class="fs-6">Alamat <span class="text-danger">*</span></label>
		                		<input type="text" class="form-control" v-model="selectedAddress" placeholder="Masukkan alamat"/>
		                	</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="close-modal-insert-application btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="uploadFile">Submit</button>
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

	import axios from 'axios'

    export default {
		components: {
			Autocomplete
		},
    	data(){
    		return{
	    		user: {},
    			page_mode : 1,
				permintaan : 0,
    			mode : "normal",
    			page_application : 1,
    			mahasiswa_baru : {},
    			endpoint_insert_application : "/f-panel/insert-application",
    			endpoint_read_all_my_applications : "/f-panel/get-my-applications",
    			search_application : {},
    			application_raw : {},
    			selectedFile : null,
				selectedAddress : "",
				selectedPhoneNumber : "",
				selectedEmail : "",
				selectedPpwpro : "",
				selectedPembi1 : "",
				selectedPembi2 : "",
				selectedPenguji1 : "",
				selectedPenguji2 : "",
				selectedPengMSI : "",
				selectedPengDEI : "",
				selectedPengLKB : "",
				selectedFileKK : null,
				selectedFileKTP : null,
				selectedFileSBP : null,
				selectedFileTN : null,
				selectedFilePF : null,
				selectedFileSO : null,
				selectedFileKBS : null,
				selectedFileKBP : null,
				selectedFileKHSPS : null,
				selectedFilePPS : null,
				selectedFilePP : null,
				selectedFileFKH : null,
				selectedFileFSS : null,
				selectedFilePerPem : null,
				selectedFileKKN : null,
    			thesis_title : "",
    			application_list : [],
    		};
    	},
		methods:{
		    handleFileChange(event) {
		      this.selectedFile = event.target.files[0];
		    },
			handleFileChangeKK(event){
				this.selectedFileKK = event.target.files[0];
			},
			handleFileChangeKTP(event){
				this.selectedFileKTP = event.target.files[0];
			},
			handleFileChangeSBP(event){
				this.selectedFileSBP = event.target.files[0];
			},
			handleFileChangeTN(event){
				this.selectedFileTN = event.target.files[0];
			},
			handleFileChangePF(event){
				this.selectedFilePF = event.target.files[0];
			},
			handleFileChangeSO(event){
				this.selectedFileSO = event.target.files[0];
			},
			handleFileChangeKBS(event){
				this.selectedFileKBS = event.target.files[0];
			},
			handleFileChangeKBP(event){
				this.selectedFileKBP = event.target.files[0];
			},
			handleFileChangeKHSPS(event){
				this.selectedFileKHSPS = event.target.files[0];
			},
			handleFileChangePPS(event){
				this.selectedFilePPS = event.target.files[0];
			},
			handleFileChangePP(event){
				this.selectedFilePP = event.target.files[0];
			},
			handleFileChangeFKH(event){
				this.selectedFileFKH = event.target.files[0];
			},
			handleFileChangeFSS(event){
				this.selectedFileFSS = event.target.files[0];
			},
			handleFileChangePerPem(event){
				this.selectedFilePerPem = event.target.files[0];
			},
			handleFileChangeKKN(event){
				this.selectedFileKKN = event.target.files[0];
			},
    		get_all_applications(page=1){
    			axios.post(this.endpoint_read_all_my_applications)
    			.then(({data}) => {
    				console.log(data);
					this.mode = "normal";
    				this.application_list = data;
    			});
    		},

		    uploadFile() {
					this.mode = "loading";
		      let formData = new FormData();
		      formData.append('thesis_title',this.thesis_title)
			  formData.append("permintaan",this.permintaan)

			  if(this.permintaan == 1){
				if (this.selectedPpwpro) {
				formData.append('proof_of_ppwpro', this.selectedPpwpro);
				}
				if (this.selectedPhoneNumber) {
				formData.append('no_telp', this.selectedPhoneNumber);
				}
				if (this.selectedEmail) {
				formData.append('email_nec', this.selectedEmail);
				}
				if (this.selectedAddress) {
				formData.append('address', this.selectedAddress);
				}
				if (this.selectedFileKK) {
				formData.append('proof_of_kartu_kel', this.selectedFileKK);
				}

				if (this.selectedFileKTP) {
				formData.append('proof_of_ktp', this.selectedFileKTP);
				}

				if (this.selectedFileSBP) {
				formData.append('proof_of_sbp', this.selectedFileSBP);
				}

				if (this.selectedFileTN) {
				formData.append('proof_of_transkrip', this.selectedFileTN);
				}

				if (this.selectedFilePF) {
				formData.append('proof_of_pas_foto', this.selectedFilePF);
				}

				if (this.selectedFileSO) {
				formData.append('proof_of_sertif_opak', this.selectedFileSO);
				}

				if (this.selectedFileKBS) {
				formData.append('proof_of_kartu_bim', this.selectedFileKBS);
				}

				if (this.selectedFileFSS) {
				formData.append('proof_of_fc_slip_spp', this.selectedFileFSS);
				}

				if (this.selectedFileKHSPS) {
				formData.append('proof_of_kartu_hadir', this.selectedFileKHSPS);
				}

				if (this.selectedFilePPS) {
				formData.append('proof_of_pers_skrip', this.selectedFilePPS);
				}

				if (this.selectedPembi1) {
				formData.append('proof_of_ppwpro', this.selectedPembi1);
				}

				if (this.selectedPembi2) {
				formData.append('proof_of_ppwpro_nd', this.selectedPembi2);
				}

				if (this.selectedPenguji2) {
				formData.append('proof_of_examiner_nd', this.selectedPenguji2);
				}
			  }

			  if(this.permintaan == 2){
				if (this.selectedPhoneNumber) {
				formData.append('no_telp', this.selectedPhoneNumber);
				}
				if (this.selectedEmail) {
				formData.append('email_nec', this.selectedEmail);
				}
				if (this.selectedAddress) {
				formData.append('address', this.selectedAddress);
				}
				if (this.selectedFileKBP) {
				formData.append('proof_of_kbp', this.selectedFileKBP);
				}
				if (this.selectedFileFKH) {
				formData.append('proof_of_fc_kartuhadir', this.selectedFileFKH);
				}
				if (this.selectedFileFSS) {
				formData.append('proof_of_fc_slip_spp', this.selectedFileFSS);
				}
				if (this.selectedFilePerPem) {
				formData.append('proof_of_persetuju_pem', this.selectedFilePerPem);
				}
				if (this.selectedFilePF) {
				formData.append('proof_of_pas_foto', this.selectedFilePF);
				}
			  }

			  if(this.permintaan == 3){
				if (this.selectedPhoneNumber) {
				formData.append('no_telp', this.selectedPhoneNumber);
				}
				if (this.selectedEmail) {
				formData.append('email_nec', this.selectedEmail);
				}
				if (this.selectedAddress) {
				formData.append('address', this.selectedAddress);
				}
				if (this.selectedFileKKN) {
				formData.append('proof_of_sertif_kkn', this.selectedFileKKN);
				}
				if (this.selectedFileTN) {
				formData.append('proof_of_transkrip', this.selectedFileTN);
				}

				if (this.selectedFileKBS) {
				formData.append('proof_of_kartu_bim', this.selectedFileKBS);
				}

				if (this.selectedFileKBP) {
				formData.append('proof_of_kbp', this.selectedFileKBP);
				}

				if (this.selectedFileFKH) {
				formData.append('proof_of_fc_kartuhadir', this.selectedFileFKH);
				}

				if (this.selectedFileFSS) {
				formData.append('proof_of_fc_slip_spp', this.selectedFileFSS);
				}

				if (this.selectedFilePF) {
				formData.append('proof_of_pas_foto', this.selectedFilePF);
				}

			  }

		      axios.post(this.endpoint_insert_application, formData)
		        .then(response => {
				  console.log('File uploaded successfully', response);
				  this.alertUpload()
				  $(".close-modal-insert-application").click();
		        })
		        .catch(error => {
					Vue.swal('Permintaan gagal ditambahkan. Pastikan data wajib (yang diberi tanda bintang) telah lengkap');
					this.mode = "normal"
		        });
		    },

			alertUpload() {
				this.mode = "loading";
				Vue.swal('Permintaan Ditambahkan');
				this.mode = "normal";
				this.get_all_applications();
			},
		},
        mounted() {
        	this.user = window.authUser;
        	this.get_all_applications();
        }
    };
</script>
