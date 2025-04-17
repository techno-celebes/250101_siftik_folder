<template>
	<div class="wrapper">
	    <div class="container input-data">
			<div class="row">
				<div class="col-12">
					<div class="alert alert-primary" role="alert" v-if="application.sk_status == 1">
						<h3>SK Sedang Diproses</h3>
					</div>
					<div class="alert alert-info" role="alert" v-if="application.sk_status == 2">
						<h3>SK Siap Diambil</h3>
					</div>
				</div>
			</div>
			<div class="row">
	    		<div class="col-12 table-responsive">
			    	<table class="table">
			    		<thead class="thead-dark">
				    		<tr>
				    			<th>No</th>
				    			<th>Nama</th>
				    			<th>Status</th>
				    			<th>Tindakan</th>
				    		</tr>
			    		</thead>
			    		<tbody class="single-thesis-table">
							<!-- Skripsi -->
							<tr v-if="application.permintaan == 1">
			    				<td>Judul Skripsi</td>
			    				<td>{{ application.thesis_title }}</td>
			    				<td>
			    					<span v-if="application.thesis_title_status == 0 || application.thesis_title_status == null" class="badge badge-secondary" href="#">Belum Diperiksa</span>
			    					<span v-if="application.thesis_title_status == 1" class="badge badge-primary" href="#">Valid</span>
			    					<span v-if="application.thesis_title_status == 2" class="badge badge-danger" href="#">Tidak Valid</span>
									<p v-if="application.thesis_title_status == 2">
										<!-- <span>catatan disini</span> -->
									</p>
								</td>
								<td><a href="#" data-bs-toggle="modal" data-bs-target="#thesis-title">Update</a></td>
			    			</tr>
							<tr>
			    				<td>No. Telp</td>
			    				<td>{{ application.no_telp }}</td>
			    				<td>
			    					<span v-if="application.telp_status == 0 || application.telp_status == null" class="badge badge-secondary" href="#">Belum Diperiksa</span>
			    					<span v-if="application.telp_status == 1" class="badge badge-primary" href="#">Valid</span>
			    					<span v-if="application.telp_status == 2" class="badge badge-danger" href="#">Tidak Valid</span>
									<p v-if="application.telp_status == 2">
										<!-- <span>catatan disini</span> -->
									</p>
			    				</td>
								<td><a href="#" data-bs-toggle="modal" data-bs-target="#proof-of-telp" v-if="application.telp_status != 1">Update</a></td>
			    			</tr>
							<tr v-if="application.permintaan >= 1 && application.permintaan <= 3">
			    				<td>Email</td>
			    				<td>{{ application.email_nec }}</td>
			    				<td>
			    					<span v-if="application.email_status == 0 || application.email_status == null" class="badge badge-secondary" href="#">Belum Diperiksa</span>
			    					<span v-if="application.email_status == 1" class="badge badge-primary" href="#">Valid</span>
			    					<span v-if="application.email_status == 2" class="badge badge-danger" href="#">Tidak Valid</span>
									<p v-if="application.email_status == 2">
										<!-- <span>catatan disini</span> -->
									</p>
			    				</td>
								<td><a href="#" data-bs-toggle="modal" data-bs-target="#proof-of-email" v-if="application.email_status != 1">Update</a></td>
			    			</tr>
							<tr v-if="application.permintaan >= 1 && application.permintaan <= 3">
			    				<td>Alamat</td>
			    				<td>{{ application.address }}</td>
			    				<td>
			    					<span v-if="application.address_status == 0 || application.address_status == null" class="badge badge-secondary" href="#">Belum Diperiksa</span>
			    					<span v-if="application.address_status == 1" class="badge badge-primary" href="#">Valid</span>
			    					<span v-if="application.address_status == 2" class="badge badge-danger" href="#">Tidak Valid</span>
									<p v-if="application.address_status == 2">
										<!-- <span>catatan disini</span> -->
									</p>
			    				</td>
								<td><a href="#" data-bs-toggle="modal" data-bs-target="#proof-of-alamat" v-if="application.alamat_status != 1">Update</a></td>
			    			</tr>
			    			<tr v-if="application.permintaan == 1">
			    				<td>KK</td>
			    				<td>{{ application.proof_of_kk }}</td>
			    				<td>
			    					<span v-if="application.kk_status == 0 || application.kk_status == null" class="badge badge-secondary" href="#">Belum Diperiksa</span>
			    					<span v-if="application.kk_status == 1" class="badge badge-primary" href="#">Valid</span>
			    					<span v-if="application.kk_status == 2" class="badge badge-danger" href="#">Tidak Valid</span>
									<p v-if="application.kk_status == 2">
										<!-- <span>catatan disini</span> -->
									</p>
			    				</td>
								<td><a href="#" data-bs-toggle="modal" data-bs-target="#proof-of-kk" v-if="application.kk_status != 1">Update</a></td>
			    			</tr>
			    			<tr v-if="application.permintaan == 1">
			    				<td>KTP</td>
			    				<td>{{ application.proof_of_ktp }}</td>
			    				<td>
			    					<span v-if="application.ktp_status == 0 || application.ktp_status == null" class="badge badge-secondary" href="#">Belum Diperiksa</span>
			    					<span v-if="application.ktp_status == 1" class="badge badge-primary" href="#">Valid</span>
			    					<span v-if="application.ktp_status == 2" class="badge badge-danger" href="#">Tidak Valid</span>
									<p v-if="application.ktp_status == 2">
										<!-- <span>catatan disini</span> -->
									</p>
			    				</td>
								<td><a href="#" data-bs-toggle="modal" data-bs-target="#proof-of-ktp" v-if="application.ktp_status != 1">Update</a></td>
			    			</tr>
			    			<tr v-if="application.permintaan == 1">
			    				<td>Surat Bebas Plagiasi</td>
			    				<td>{{ application.proof_of_sbp }}</td>
			    				<td>
			    					<span v-if="application.sbp_status == 0 || application.sbp_status == null" class="badge badge-secondary" href="#">Belum Diperiksa</span>
			    					<span v-if="application.sbp_status == 1" class="badge badge-primary" href="#">Valid</span>
			    					<span v-if="application.sbp_status == 2" class="badge badge-danger" href="#">Tidak Valid</span>
									<p v-if="application.sbp_status == 2">
										<!-- <span>catatan disini</span> -->
									</p>
			    				</td>
			    				<td><a href="#" data-bs-toggle="modal" data-bs-target="#proof-of-sbp" v-if="application.sbp_status != 1">Update</a></td>
			    			</tr>
			    			<tr v-if="application.permintaan == 1">
			    				<td>Transkrip Nilai</td>
			    				<td>{{ application.proof_of_transkrip }}</td>
			    				<td>
			    					<span v-if="application.transkrip_status == 0 || application.transkrip_status == null" class="badge badge-secondary" href="#">Belum Diperiksa</span>
			    					<span v-if="application.transkrip_status == 1" class="badge badge-primary" href="#">Valid</span>
			    					<span v-if="application.transkrip_status == 2" class="badge badge-danger" href="#">Tidak Valid</span>
									<p v-if="application.transkrip_status == 2">
										<!-- <span>catatan disini</span> -->
									</p>
			    				</td>
			    				<td><a href="#" data-bs-toggle="modal" data-bs-target="#proof-of-transkrip" v-if="application.transkrip_status != 1">Update</a></td>
			    			</tr>
			    			<tr v-if="application.permintaan == 1">
			    				<td>Pas Foto (Warna Latar Merah : Ganjil, Biru : Genap)</td>
			    				<td>{{ application.proof_of_pas_foto }}</td>
			    				<td>
			    					<span v-if="application.pas_foto_status == 0 || application.pas_foto_status == null" class="badge badge-secondary" href="#">Belum Diperiksa</span>
			    					<span v-if="application.pas_foto_status == 1" class="badge badge-primary" href="#">Valid</span>
			    					<span v-if="application.pas_foto_status == 2" class="badge badge-danger" href="#">Tidak Valid</span>
									<p v-if="application.pas_foto_status == 2">
										<!-- <span>catatan disini</span> -->
									</p>
			    				</td>
			    				<td><a href="#" data-bs-toggle="modal" data-bs-target="#proof-of-pas-foto" v-if="application.pas_foto_status != 1">Update</a></td>
			    			</tr>
			    			<tr v-if="application.permintaan == 1">
			    				<td>Sertifikat OPAK</td>
			    				<td>{{ application.proof_of_sertif_opak }}</td>
			    				<td>
			    					<span v-if="application.sertif_opak_status == 0 || application.sertif_opak_status == null" class="badge badge-secondary" href="#">Belum Diperiksa</span>
			    					<span v-if="application.sertif_opak_status == 1" class="badge badge-primary" href="#">Valid</span>
			    					<span v-if="application.sertif_opak_status == 2" class="badge badge-danger" href="#">Tidak Valid</span>
									<p v-if="application.sertif_opak_status == 2">
										<!-- <span>catatan disini</span> -->
									</p>
			    				</td>
			    				<td><a href="#" data-bs-toggle="modal" data-bs-target="#proof-of-sertif-opak" v-if="application.sertif_opak_status != 1">Update</a></td>
			    			</tr>
			    			<tr v-if="application.permintaan == 1">
			    				<td>Kartu Bimbingan Skripsi</td>
			    				<td>{{ application.proof_of_kartu_bim }}</td>
			    				<td>
			    					<span v-if="application.kartu_bim_status == 0 || application.kartu_bim_status == null" class="badge badge-secondary" href="#">Belum Diperiksa</span>
			    					<span v-if="application.kartu_bim_status == 1" class="badge badge-primary" href="#">Valid</span>
			    					<span v-if="application.kartu_bim_status == 2" class="badge badge-danger" href="#">Tidak Valid</span>
									<p v-if="application.kartu_bim_status == 2">
										<!-- <span>catatan disini</span> -->
									</p>
			    				</td>
			    				<td><a href="#" data-bs-toggle="modal" data-bs-target="#proof-of-kartu-bim" v-if="application.kartu_bim_status != 1">Update</a></td>
			    			</tr>
							<tr v-if="application.permintaan == 1">
			    				<td>Bukti Pembayaran SPP Terakhir</td>
			    				<td>{{ application.proof_of_fc_slip_spp }}</td>
			    				<td>
			    					<span v-if="application.fc_slip_spp_status == 0 || application.fc_slip_spp_status == null" class="badge badge-secondary" href="#">Belum Diperiksa</span>
			    					<span v-if="application.fc_slip_spp_status == 1" class="badge badge-primary" href="#">Valid</span>
			    					<span v-if="application.fc_slip_spp_status == 2" class="badge badge-danger" href="#">Tidak Valid</span>
									<p v-if="application.fc_slip_spp_status == 2">
										<!-- <span>catatan disini</span> -->
									</p>
			    				</td>
			    				<td><a href="#" data-bs-toggle="modal" data-bs-target="#proof-of-fc-spp" v-if="application.fc_slip_spp_status != 1">Update</a></td>
			    			</tr>
							<tr v-if="application.permintaan == 1">
			    				<td>Kartu Hadir Seminar Proposal</td>
			    				<td>{{ application.proof_of_kartu_hadir }}</td>
			    				<td>
			    					<span v-if="application.kartu_hadir_status == 0 || application.kartu_hadir_status == null" class="badge badge-secondary" href="#">Belum Diperiksa</span>
			    					<span v-if="application.kartu_hadir_status == 1" class="badge badge-primary" href="#">Valid</span>
			    					<span v-if="application.kartu_hadir_status == 2" class="badge badge-danger" href="#">Tidak Valid</span>
									<p v-if="application.kartu_hadir_status == 2">
										<!-- <span>catatan disini</span> -->
									</p>
			    				</td>
			    				<td><a href="#" data-bs-toggle="modal" data-bs-target="#proof-of-kartu-hadir" v-if="application.kartu_hadir_status != 1">Update</a></td>
			    			</tr>
							<tr v-if="application.permintaan == 1">
			    				<td>Persetujuan Pembimbing Skripsi</td>
			    				<td>{{ application.proof_of_pers_skrip }}</td>
			    				<td>
			    					<span v-if="application.pers_skrip_status == 0 || application.pers_skrip_status == null" class="badge badge-secondary" href="#">Belum Diperiksa</span>
			    					<span v-if="application.pers_skrip_status == 1" class="badge badge-primary" href="#">Valid</span>
			    					<span v-if="application.pers_skrip_status == 2" class="badge badge-danger" href="#">Tidak Valid</span>
									<p v-if="application.pers_skrip_status == 2">
										<!-- <span>catatan disini</span> -->
									</p>
			    				</td>
			    				<td><a href="#" data-bs-toggle="modal" data-bs-target="#proof-of-pers-skrip" v-if="application.pers_skrip_status != 1">Update</a></td>
			    			</tr>
			    			<tr v-if="application.permintaan == 1">
			    				<td>Korespondensi Jurnal</td>
			    				<td>{{ application.proof_of_journal_correspondent }}</td>
			    				<td>
			    					<span v-if="application.journal_correspondent_status == 0 || application.journal_correspondent_status == null" class="badge badge-secondary" href="#">Belum Diperiksa</span>
			    					<span v-if="application.journal_correspondent_status == 1" class="badge badge-primary" href="#">Valid</span>
			    					<span v-if="application.journal_correspondent_status == 2" class="badge badge-danger" href="#">Tidak Valid</span>
									<p v-if="application.journal_correspondent_status == 2">
										<!-- <span>catatan disini</span> -->
									</p>
			    				</td>
								<td><a href="#" data-bs-toggle="modal" data-bs-target="#proof-of-journal-correspondent" v-if="application.journal_correspondent_status != 1">Update</a></td>
			    			</tr>
			    			<tr v-if="application.permintaan == 1">
			    				<td>Bukti Artikel Terpublikasi</td>
			    				<td>{{ application.proof_of_loa }}</td>
			    				<td>
			    					<span v-if="application.loa_status == 0 || application.loa_status == null" class="badge badge-secondary" href="#">Belum Diperiksa</span>
			    					<span v-if="application.loa_status == 1" class="badge badge-primary" href="#">Valid</span>
			    					<span v-if="application.loa_status == 2" class="badge badge-danger" href="#">Tidak Valid</span>
									<p v-if="application.loa_status == 2">
										<!-- <span>catatan disini</span> -->
									</p>
			    				</td>
								<td><a href="#" data-bs-toggle="modal" data-bs-target="#proof-of-loa" v-if="application.loa_status != 1">Update</a></td>
			    			</tr>
							<tr v-if="application.permintaan == 1">
			    				<td>Pembimbing 1</td>
			    				<td>{{ application.proof_of_ppwpro }}</td>
			    				<td>
			    					<span v-if="application.ppwpro_status == 0 || application.ppwpro_status == null" class="badge badge-secondary" href="#">Belum Diperiksa</span>
			    					<span v-if="application.ppwpro_status == 1" class="badge badge-primary" href="#">Valid</span>
			    					<span v-if="application.ppwpro_status == 2" class="badge badge-danger" href="#">Tidak Valid</span>
									<p v-if="application.ppwpro_status == 2">
										<!-- <span>catatan disini</span> -->
									</p>
								</td>
			    				<td><a href="#" data-bs-toggle="modal" data-bs-target="#proof-of-pembi1" v-if="application.ppwpro_status != 1">Update</a></td>
			    			</tr>
							<tr v-if="application.permintaan == 1">
			    				<td>Pembimbing 2</td>
			    				<td>{{ application.proof_of_ppwpro_nd }}</td>
			    				<td>
			    					<span v-if="application.ppwpro_nd_status == 0 || application.ppwpro_nd_status == null" class="badge badge-secondary" href="#">Belum Diperiksa</span>
			    					<span v-if="application.ppwpro_nd_status == 1" class="badge badge-primary" href="#">Valid</span>
			    					<span v-if="application.ppwpro_nd_status == 2" class="badge badge-danger" href="#">Tidak Valid</span>
									<p v-if="application.ppwpro_nd_status == 2">
										<!-- <span>catatan disini</span> -->
									</p>
								</td>
			    				<td><a href="#" data-bs-toggle="modal" data-bs-target="#proof-of-pembi2" v-if="application.ppwpro_status != 1">Update</a></td>
			    			</tr>
							<tr v-if="application.permintaan == 1">
			    				<td>Penguji Utama 1</td>
			    				<td>{{ application.proof_of_examiner }}</td>
			    				<td>
			    					<span v-if="application.examiner_status == 0 || application.examiner_status == null" class="badge badge-secondary" href="#">Belum Diperiksa</span>
			    					<span v-if="application.examiner_status == 1" class="badge badge-primary" href="#">Valid</span>
			    					<span v-if="application.examiner_status == 2" class="badge badge-danger" href="#">Tidak Valid</span>
									<p v-if="application.examiner_status == 2">
										<!-- <span>catatan disini</span> -->
									</p>
								</td>
								<td></td>
			    			</tr>
							<tr v-if="application.permintaan == 1">
			    				<td>Penguji Utama 2 Waktu Proposal</td>
			    				<td>{{ application.proof_of_examiner_nd }}</td>
			    				<td>
			    					<span v-if="application.examiner_nd_status == 0 || application.examiner_nd_status == null" class="badge badge-secondary" href="#">Belum Diperiksa</span>
			    					<span v-if="application.examiner_nd_status == 1" class="badge badge-primary" href="#">Valid</span>
			    					<span v-if="application.examiner_nd_status == 2" class="badge badge-danger" href="#">Tidak Valid</span>
									<p v-if="application.examiner_nd_status == 2">
										<!-- <span>catatan disini</span> -->
									</p>
								</td>
			    				<td><a href="#" data-bs-toggle="modal" data-bs-target="#proof-of-penguji2" v-if="application.ppwpro_status != 1">Update</a></td>
			    			</tr>

							<!-- Proposal -->
							<tr v-if="application.permintaan == 2">
			    				<td>Judul Proposal</td>
			    				<td>{{ application.thesis_title }}</td>
			    				<td>
			    					<span v-if="application.thesis_title_status == 0 || application.thesis_title_status == null" class="badge badge-secondary" href="#">Belum Diperiksa</span>
			    					<span v-if="application.thesis_title_status == 1" class="badge badge-primary" href="#">Valid</span>
			    					<span v-if="application.thesis_title_status == 2" class="badge badge-danger" href="#">Tidak Valid</span>
									<p v-if="application.thesis_title_status == 2">
										<!-- <span>catatan disini</span> -->
									</p>
			    				</td>
								<td><a href="#" data-bs-toggle="modal" data-bs-target="#thesis-title" v-if="application.thesis_title_status != 1">Update</a></td>
			    			</tr>
							<tr v-if="application.permintaan == 2">
			    				<td>Kartu Bimbingan Proposal</td>
			    				<td>{{ application.proof_of_kbp }}</td>
			    				<td>
			    					<span v-if="application.kbp_status == 0 || application.kbp_status == null" class="badge badge-secondary" href="#">Belum Diperiksa</span>
			    					<span v-if="application.kbp_status == 1" class="badge badge-primary" href="#">Valid</span>
			    					<span v-if="application.kbp_status == 2" class="badge badge-danger" href="#">Tidak Valid</span>
									<p v-if="application.kbp_status == 2">
										<!-- <span>catatan disini</span> -->
									</p>
			    				</td>
			    				<td><a href="#" data-bs-toggle="modal" data-bs-target="#proof-of-kbp" v-if="application.kbp_status != 1">Update</a></td>
			    			</tr>
							<tr v-if="application.permintaan == 2">
			    				<td>Kartu Hadir Seminar Proposal</td>
			    				<td>{{ application.proof_of_kartu_hadir }}</td>
			    				<td>
			    					<span v-if="application.kartu_hadir_status == 0 || application.kartu_hadir_status == null" class="badge badge-secondary" href="#">Belum Diperiksa</span>
			    					<span v-if="application.kartu_hadir_status == 1" class="badge badge-primary" href="#">Valid</span>
			    					<span v-if="application.kartu_hadir_status == 2" class="badge badge-danger" href="#">Tidak Valid</span>
									<p v-if="application.kartu_hadir_status == 2">
										<!-- <span>catatan disini</span> -->
									</p>
			    				</td>
			    				<td><a href="#" data-bs-toggle="modal" data-bs-target="#proof-of-kartu-hadir" v-if="application.kartu_hadir_status != 1">Update</a></td>
			    			</tr>
							<tr v-if="application.permintaan == 2">
			    				<td>Bukti Pembayaran SPP Terakhir</td>
			    				<td>{{ application.proof_of_fc_slip_spp}}</td>
			    				<td>
			    					<span v-if="application.fc_slip_spp_status == 0 || application.fc_slip_spp_status == null" class="badge badge-secondary" href="#">Belum Diperiksa</span>
			    					<span v-if="application.fc_slip_spp_status == 1" class="badge badge-primary" href="#">Valid</span>
			    					<span v-if="application.fc_slip_spp_status == 2" class="badge badge-danger" href="#">Tidak Valid</span>
									<p v-if="application.fc_slip_spp_status == 2">
										<!-- <span>catatan disini</span> -->
									</p>
			    				</td>
			    				<td><a href="#" data-bs-toggle="modal" data-bs-target="#proof-of-fc-spp" v-if="application.fc_slip_spp_status != 1">Update</a></td>
			    			</tr>
							<tr v-if="application.permintaan == 2">
			    				<td>Persetujuan Pembimbing</td>
			    				<td>{{ application.proof_of_persetuju_pem }}</td>
			    				<td>
			    					<span v-if="application.persetuju_pem_status == 0 || application.persetuju_pem_status == null" class="badge badge-secondary" href="#">Belum Diperiksa</span>
			    					<span v-if="application.persetuju_pem_status == 1" class="badge badge-primary" href="#">Valid</span>
			    					<span v-if="application.persetuju_pem_status == 2" class="badge badge-danger" href="#">Tidak Valid</span>
									<p v-if="application.persetuju_pem_status == 2">
										<!-- <span>catatan disini</span> -->
									</p>
			    				</td>
			    				<td><a href="#" data-bs-toggle="modal" data-bs-target="#proof-of-perpem" v-if="application.persetuju_pem_status != 1">Update</a></td>
			    			</tr>
							<tr v-if="application.permintaan == 2">
			    				<td>Pas Foto (Warna Latar Merah : Ganjil, Biru : Genap)</td>
			    				<td>{{ application.proof_of_pas_foto }}</td>
			    				<td>
			    					<span v-if="application.pas_foto_status == 0 || application.pas_foto_status == null" class="badge badge-secondary" href="#">Belum Diperiksa</span>
			    					<span v-if="application.pas_foto_status == 1" class="badge badge-primary" href="#">Valid</span>
			    					<span v-if="application.pas_foto_status == 2" class="badge badge-danger" href="#">Tidak Valid</span>
									<p v-if="application.pas_foto_status == 2">
										<!-- <span>catatan disini</span> -->
									</p>
			    				</td>
			    				<td><a href="#" data-bs-toggle="modal" data-bs-target="#proof-of-pas-foto" v-if="application.pas_foto_status != 1">Update</a></td>
			    			</tr>
							<tr v-if="application.permintaan == 2">
			    				<td>Pembimbing 1</td>
			    				<td>{{ application.proof_of_ppwpro }}</td>
			    				<td>
			    					<span v-if="application.ppwpro_status == 0 || application.ppwpro_status == null" class="badge badge-secondary" href="#">Belum Diperiksa</span>
			    					<span v-if="application.ppwpro_status == 1" class="badge badge-primary" href="#">Valid</span>
			    					<span v-if="application.ppwpro_status == 2" class="badge badge-danger" href="#">Tidak Valid</span>
									<p v-if="application.ppwpro_status == 2">
										<!-- <span>catatan disini</span> -->
									</p>
								</td>
			    				<td><a href="#" data-bs-toggle="modal" data-bs-target="#proof-of-pembi1" v-if="application.ppwpro_status != 1">Update</a></td>
			    			</tr>
							<tr v-if="application.permintaan == 2">
			    				<td>Pembimbing 2</td>
			    				<td>{{ application.proof_of_ppwpro }}</td>
			    				<td>
			    					<span v-if="application.ppwpro_status == 0 || application.ppwpro_status == null" class="badge badge-secondary" href="#">Belum Diperiksa</span>
			    					<span v-if="application.ppwpro_status == 1" class="badge badge-primary" href="#">Valid</span>
			    					<span v-if="application.ppwpro_status == 2" class="badge badge-danger" href="#">Tidak Valid</span>
									<p v-if="application.ppwpro_status == 2">
										<!-- <span>catatan disini</span> -->
									</p>
								</td>
			    				<td><a href="#" data-bs-toggle="modal" data-bs-target="#proof-of-pembi2" v-if="application.ppwpro_status != 1">Update</a></td>
			    			</tr>

							<!-- Komprehensif -->
							<tr v-if="application.permintaan == 3">
			    				<td>Judul Komprehensif</td>
			    				<td>{{ application.thesis_title }}</td>
			    				<td>
			    					<span v-if="application.thesis_title_status == 0 || application.thesis_title_status == null" class="badge badge-secondary" href="#">Belum Diperiksa</span>
			    					<span v-if="application.thesis_title_status == 1" class="badge badge-primary" href="#">Valid</span>
			    					<span v-if="application.thesis_title_status == 2" class="badge badge-danger" href="#">Tidak Valid</span>
									<p v-if="application.thesis_title_status == 2">
										<!-- <span>catatan disini</span> -->
									</p>
			    				</td>
								<td><a href="#" data-bs-toggle="modal" data-bs-target="#thesis-title" v-if="application.thesis_title_status != 1">Update</a></td>
			    			</tr>
							<tr v-if="application.permintaan == 3">
			    				<td>Sertifikat KKN</td>
			    				<td>{{ application.proof_of_sertif_kkn }}</td>
			    				<td>
			    					<span v-if="application.sertif_kkn_status == 0 || application.sertif_kkn_status == null" class="badge badge-secondary" href="#">Belum Diperiksa</span>
			    					<span v-if="application.sertif_kkn_status == 1" class="badge badge-primary" href="#">Valid</span>
			    					<span v-if="application.sertif_kkn_status == 2" class="badge badge-danger" href="#">Tidak Valid</span>
									<p v-if="application.sertif_kkn_status == 2">
										<!-- <span>catatan disini</span> -->
									</p>
			    				</td>
			    				<td><a href="#" data-bs-toggle="modal" data-bs-target="#proof-of-kkn">Update</a></td>
			    			</tr>
							<tr v-if="application.permintaan == 3">
			    				<td>Transkrip Nilai</td>
			    				<td>{{ application.proof_of_transkrip}}</td>
			    				<td>
			    					<span v-if="application.transkrip_status == 0 || application.transkrip_status == null" class="badge badge-secondary" href="#">Belum Diperiksa</span>
			    					<span v-if="application.transkrip_status == 1" class="badge badge-primary" href="#">Valid</span>
			    					<span v-if="application.transkrip_status == 2" class="badge badge-danger" href="#">Tidak Valid</span>
									<p v-if="application.transkrip_status == 2">
										<!-- <span>catatan disini</span> -->
									</p>
			    				</td>
			    				<td><a href="#" data-bs-toggle="modal" data-bs-target="#proof-of-transkrip">Update</a></td>
			    			</tr>
							<tr v-if="application.permintaan == 3">
			    				<td>Seminar Proposal</td>
			    				<td>{{ application.proof_of_fc_kartuhadir }}</td>
			    				<td>
			    					<span v-if="application.fc_kartuhadir_status == 0 || application.fc_kartuhadir_status == null" class="badge badge-secondary" href="#">Belum Diperiksa</span>
			    					<span v-if="application.fc_kartuhadir_status == 1" class="badge badge-primary" href="#">Valid</span>
			    					<span v-if="application.fc_kartuhadir_status == 2" class="badge badge-danger" href="#">Tidak Valid</span>
									<p v-if="application.fc_kartuhadir_status == 2">
										<!-- <span>catatan disini</span> -->
									</p>
			    				</td>
			    				<td><a href="#" data-bs-toggle="modal" data-bs-target="#proof-of-fc-kartu">Update</a></td>
			    			</tr>
							<tr v-if="application.permintaan == 3">
			    				<td>Bukti Pembayaran SPP Terakhir</td>
			    				<td>{{ application.proof_of_fc_slip_spp}}</td>
			    				<td>
			    					<span v-if="application.fc_slip_spp_status == 0 || application.fc_slip_spp_status == null" class="badge badge-secondary" href="#">Belum Diperiksa</span>
			    					<span v-if="application.fc_slip_spp_status == 1" class="badge badge-primary" href="#">Valid</span>
			    					<span v-if="application.fc_slip_spp_status == 2" class="badge badge-danger" href="#">Tidak Valid</span>
									<p v-if="application.fc_slip_spp_status == 2">
										<!-- <span>catatan disini</span> -->
									</p>
			    				</td>
			    				<td><a href="#" data-bs-toggle="modal" data-bs-target="#proof-of-fc-spp">Update</a></td>
			    			</tr>
							<tr v-if="application.permintaan == 3">
			    				<td>Pas Foto (Warna Latar Merah : Ganjil, Biru : Genap)</td>
			    				<td>{{ application.proof_of_pas_foto }}</td>
			    				<td>
			    					<span v-if="application.pas_foto_status == 0 || application.pas_foto_status == null" class="badge badge-secondary" href="#">Belum Diperiksa</span>
			    					<span v-if="application.pas_foto_status == 1" class="badge badge-primary" href="#">Valid</span>
			    					<span v-if="application.pas_foto_status == 2" class="badge badge-danger" href="#">Tidak Valid</span>
									<p v-if="application.pas_foto_status == 2">
										<!-- <span>catatan disini</span> -->
									</p>
			    				</td>
			    				<td><a href="#" data-bs-toggle="modal" data-bs-target="#proof-of-pas-foto">Update</a></td>
			    			</tr>
							<tr v-if="application.permintaan == 3">
			    				<td>Penguji 1 {{ prodi_mks[0].prodi_mk_name ?? "-" }}</td>
			    				<td>{{ application.proof_of_compr_examiner_1 }}</td>
			    				<td>
								</td>
								<td></td>
			    			</tr>
							<tr v-if="application.permintaan == 3">
			    				<td>Penguji 2 {{ prodi_mks[1].prodi_mk_name ?? "-" }}</td>
			    				<td>{{ application.proof_of_compr_examiner_2 }}</td>
								<td></td>
								<td></td>
			    			</tr>
							<tr v-if="application.permintaan == 3">
			    				<td>Penguji 3 {{ prodi_mks[2].prodi_mk_name ?? "-" }}</td>
			    				<td>{{ application.proof_of_compr_examiner_3 }}</td>
			    				<td>
								</td>
								<td></td>
			    			</tr>
			    		</tbody>
			    	</table>
	    		</div>
	    	</div>
	    </div>

		<!-- Modal Skripsi -->
		<div class="modal fade" id="thesis-title" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Judul Skripsi</label>
		                		<input type="text" class="form-control" v-model="application.thesis_title">
		                	</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_application_thesis_title">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>

		<div class="modal fade" id="proof-of-telp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>No. Telp</label>
		                		<input type="text" class="form-control" v-model="application.no_telp">
		                	</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_application_no_telp">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>

		<div class="modal fade" id="proof-of-email" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
		                		<input type="text" class="form-control"  v-model="application.email_nec">
		                	</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_application_email">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>

		<div class="modal fade" id="proof-of-alamat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Alamat</label>
		                		<input type="text" class="form-control"  v-model="application.address">
		                	</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_application_address">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>

		<div class="modal fade" id="proof-of-kk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>KK <i>(Maks 2MB dengan format PDF)</i></label>
		                		<input type="file" class="form-control" @change="handleFileChangeKK">
		                	</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close-kk btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_application_thesis_kk">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>
        <div class="modal fade" id="proof-of-ktp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>KTP <i>(Maks 2MB dengan format PDF)</i></label>
		                		<input type="file" class="form-control" @change="handleFileChangeKTP">
		                	</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close-ktp btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_application_thesis_ktp">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>

        <div class="modal fade" id="proof-of-sbp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Surat Bebas Plagiasi <i>(Maks 2MB dengan format PDF)</i></label>
		                		<input type="file" class="form-control" @change="handleFileChangeSBP">
		                	</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close-sbp btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_application_thesis_sbp">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>

		<div class="modal fade" id="proof-of-transkrip" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Transkrip Nilai <i>(Maks 2MB dengan format PDF)</i></label>
		                		<input type="file" class="form-control" @change="handleFileChangeTN">
		                	</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close-transkrip btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_application_thesis_transkrip">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>

		<div class="modal fade" id="proof-of-pas-foto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Pas Foto <i>(Maks 2MB dengan format PDF)</i></label>
		                		<input type="file" class="form-control" @change="handleFileChangePF">
		                	</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close-pas-foto btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_application_thesis_pas_foto">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>

		<div class="modal fade" id="proof-of-journal-correspondent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Korepondensi Jurnal</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Korespondensi Jurnal <i>(Maks 2MB dengan format PDF)</i></label>
		                		<input type="file" class="form-control" @change="handleFileChangeKorespondensiJurnal">
		                	</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close-korespondensi-journal btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_application_thesis_korespondensi_jurnal">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>

		<div class="modal fade" id="proof-of-loa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">LOA</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Bukti Jurnal Terpublikasi <i>(Maks 2MB dengan format PDF)</i></label>
		                		<input type="file" class="form-control" @change="handleFileChangeLOA">
		                	</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close-loa btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_application_thesis_loa">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>

		<div class="modal fade" id="proof-of-sertif-opak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Sertifikat OPAK <i>(Maks 2MB dengan format PDF)</i></label>
		                		<input type="file" class="form-control" @change="handleFileChangeSO">
		                	</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close-sertif-opak btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_application_thesis_sertif_opak">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>

		<div class="modal fade" id="proof-of-kartu-bim" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Kartu Bimbingan Skripsi <i>(Maks 2MB dengan format PDF)</i></label>
		                		<input type="file" class="form-control" @change="handleFileChangeKBS">
		                	</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close-kartu-bim btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_application_thesis_kartu_bim">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>

		<div class="modal fade" id="proof-of-kartu-hadir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Kartu Hadir Seminar Proposal <i>(Maks 2MB dengan format PDF)</i></label>
		                		<input type="file" class="form-control" @change="handleFileChangeKHSPS">
		                	</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close-kartu-hadir btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_application_thesis_kartu_hadir">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>

		<div class="modal fade" id="proof-of-pers-skrip" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Persetujuan Pembimbing Skripsi <i>(Maks 2MB dengan format PDF)</i></label>
		                		<input type="file" class="form-control" @change="handleFileChangePerPem">
		                	</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close-pers-skrip btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_application_thesis_pers_skrip">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>

		<div class="modal fade" id="proof-of-pembi1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Pembimbing 1</label>
								<input type="text" class="form-control" v-model="application.proof_of_ppwpro">
		                	</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close-pembi1 btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_application_pembimbing1">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>

		<div class="modal fade" id="proof-of-pembi2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Pembimbing 2</label>
								<input type="text" class="form-control" v-model="application.proof_of_ppwpro_nd">
		                	</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close-pembi2 btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_application_pembimbing2">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>


		<div class="modal fade" id="proof-of-penguji2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Penguji Utama 2 Waktu Proposal</label>
								<input type="text" class="form-control" v-model="application.proof_of_examiner_nd">
		                	</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close-penguji2 btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_application_penguji2">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>

		<!-- Modal Proposal -->
		<div class="modal fade" id="proof-of-kbp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Kartu Bimbingan Proposal <i>(Maks 2MB dengan format PDF)</i></label>
		                		<input type="file" class="form-control" @change="handleFileChangeKBP">
		                	</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close-kbp btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_application_thesis_kbp">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>

		<div class="modal fade" id="proof-of-fc-kartu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Seminar Proposal <i>(Maks 2MB dengan format PDF)</i></label>
		                		<input type="file" class="form-control" @change="handleFileChangeFKH">
		                	</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close-seminar-proposal btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_application_thesis_fc_kartuhadir">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>

		<div class="modal fade" id="proof-of-fc-spp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Bukti Pembayaran SPP Terakhir <i>(Maks 2MB dengan format PDF)</i></label>
		                		<input type="file" class="form-control" @change="handleFileChangeFSS">
		                	</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close-fc-slip-spp btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_application_thesis_fc_slip_spp">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>

		<div class="modal fade" id="proof-of-perpem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Persetujuan Pembimbing <i>(Maks 2MB dengan format PDF)</i></label>
		                		<input type="file" class="form-control" @change="handleFileChangePerPem">
		                	</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close-perpem btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_application_thesis_persetuju_pem">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>

		<div class="modal fade" id="proof-of-kkn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Sertifikat KKN <i>(Maks 2MB dengan format PDF)</i></label>
		                		<input type="file" class="form-control" @change="handleFileChangeKKN">
		                	</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close-kkn btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_application_thesis_sertif_kkn">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>
		<!-- Modal -->
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
	    		user: {},
    			page_mode : 1,
    			mode : "normal",
    			page_application : 1,
				prodi_mks : [],
				selectedFileTelp : {},
				selectedFileEmail : {},
				selectedFileAlamat : {},
				selectedFileKK : {},
				selectedFileKTP : {},
				selectedFileSBP : {},
				selectedFileTN: {},
				selectedFilePF : {},
				selectedFileSO : {},
				selectedFileKHSPS : {},
				selectedFilePPS : {},
				selectedFilePP : {},
				selectedFilePPWPRO : {},
				selectedFileKBP : {},
				selectedFileLOA : {},
				selectedFileKorespondensiJurnal : {},
				selectedFileKBS : {},
				selectedFileFKH : {},
				selectedFileFSS : {},
				selectedFilePerPem : {},
				selectedFileKKN : {},
    			mahasiswa_baru : {},
    			endpoint_insert_application : "/f-panel/insert-application",
    			endpoint_read_single_application : "/f-panel/read-single-application",
    			endpoint_update_application_user_title : "/f-panel/update-application-user-title",
				endpoint_update_application_user_loa : "/f-panel/update-application-loa",
				endpoint_update_application_user_korespondensi_jurnal : "/f-panel/update-application-journal-correspondent",
				endpoint_update_application_no_telp : "/f-panel/update-application-phone-number",
				endpoint_update_application_email : "/f-panel/update-application-email",
				endpoint_update_application_address : "/f-panel/update-application-address",
				endpoint_update_application_user_sks : "/f-panel/update-application-user-sks",
    			endpoint_update_application_user_kk : "/f-panel/update-application-user-kk",
				endpoint_update_application_user_degree : "/f-panel/update-application-user-degree",
    			endpoint_update_application_user_payment : "/f-panel/update-application-user-payment",
    			endpoint_update_application_user_kajur : "/f-panel/update-application-user-kajur",
				endpoint_update_application_user_telp : "/f-panel/update-application-user-telp",
				endpoint_update_application_user_email : "/f-panel/update-application-user-email",
				endpoint_update_application_user_alamat : "/f-panel/update-application-user-alamat",
				endpoint_update_application_user_kk : "/f-panel/update-application-user-kk",
				endpoint_update_application_user_ktp : "/f-panel/update-application-ktp",
				endpoint_update_application_user_sbp : "/f-panel/update-application-sbp",
				endpoint_update_application_user_transkrip : "/f-panel/update-application-transkrip",
				endpoint_update_application_user_pas_foto : "/f-panel/update-application-pas-foto",
				endpoint_update_application_user_sertif_opak : "/f-panel/update-application-sertif-opak",
				endpoint_update_application_user_kartu_bim : "/f-panel/update-application-kartu-bim",
				endpoint_update_application_user_kartu_hadir : "/f-panel/update-application-kartu-hadir",
				endpoint_update_application_user_pers_skrip : "/f-panel/update-application-pers-skrip",
				endpoint_update_application_user_ppwpro : "/f-panel/update-application-ppwpro",
				endpoint_update_application_user_pem_propo : "/f-panel/update-application-pem-propo",
				endpoint_update_application_user_kbp : "/f-panel/update-application-kbp",
				endpoint_update_application_user_fc_kartuhadir : "/f-panel/update-application-fc-kartuhadir",
				endpoint_update_application_user_fc_slip_spp : "/f-panel/update-application-fc-slip-spp",
				endpoint_update_application_user_persetuju_pem : "/f-panel/update-application-persetuju-pem",
				endpoint_update_application_user_sertif_kkn : "/f-panel/update-application-sertif-kkn",
				endpoint_update_application_pembimbing1 : "/f-panel/update-application-ppwpro",
				endpoint_update_application_pembimbing2 : "/f-panel/update-application-ppwpro-nd",
				endpoint_update_application_penguji2 : "/f-panel/update-application-examiner-nd",
    			search_application : {},
    			application : {
					no_telp: '',
					email: '',
					address: '',
					proof_of_kk: '',
					proof_of_ktp: '',
					proof_of_sbp: '',
					proof_of_loa: '',
					proof_of_korespondensi_jurnal: '',
					proof_of_transkrip: '',
					proof_of_pas_foto: '',
					proof_of_sertif_opak: '',
					proof_of_kartu_bim: '',
					proof_of_kartu_hadir: '',
					proof_of_pers_skrip: '',
					proof_of_penguji_propo: '',
					proof_of_pem_propo: '',
					proof_of_kbp: '',
					proof_of_fc_kartuhadir: '',
					proof_of_fc_slip_spp: '',
					proof_of_ppwpro : "",
					proof_of_persetuju_pem: '',
					proof_of_sertif_kkn: '',
					proof_of_pembi1 : '',
					proof_of_pembi2 : '',
					proof_of_penguji2 : '',
    			},
    			selectedFile : null,
    		};
    	},
		methods:{
		    handleFileChange(event) {
		      this.selectedFileKajur = event.target.files[0];
		    },
			handleFileChangeTelp(event) {
		      this.selectedFileTelp = event.target.files[0];
		    },
			handleFileChangeEmail(event) {
		      this.selectedFileEmail = event.target.files[0];
		    },
			handleFileChangeAlamat(event) {
		      this.selectedFileAlamat = event.target.files[0];
		    },
			handleFileChangeKK(event) {
		      this.selectedFileKK = event.target.files[0];
		    },
			handleFileChangeKTP(event) {
		      this.selectedFileKTP = event.target.files[0];
		    },
			handleFileChangeSBP(event) {
		      this.selectedFileSBP = event.target.files[0];
		    },
			handleFileChangeTN(event) {
		      this.selectedFileTN = event.target.files[0];
		    },
			handleFileChangePF(event) {
		      this.selectedFilePF = event.target.files[0];
		    },
			handleFileChangeSO(event) {
		      this.selectedFileSO = event.target.files[0];
		    },
			handleFileChangeKBS(event) {
		      this.selectedFileKBS = event.target.files[0];
		    },
			handleFileChangeKBP(event) {
		      this.selectedFileKBP = event.target.files[0];
		    },
			handleFileChangeLOA(event){
				this.selectedFileLOA = event.target.files[0];
			},
			handleFileChangeKorespondensiJurnal(event){
				this.selectedFileKorespondensiJurnal = event.target.files[0];
			},
			handleFileChangeKHSPS(event) {
		      this.selectedFileKHSPS = event.target.files[0];
		    },
			handleFileChangePPS(event) {
		      this.selectedFilePPS = event.target.files[0];
		    },
			handleFileChangeSC(event) {
		      this.selectedFileSC = event.target.files[0];
		    },
			handleFileChangePP(event) {
		      this.selectedFilePP = event.target.files[0];
		    },
			handleFileChangePWP(event) {
		      this.selectedFilePWP = event.target.files[0];
		    },
			handleFileChangeFKH(event) {
		      this.selectedFileFKH = event.target.files[0];
		    },
			handleFileChangeFSS(event) {
		      this.selectedFileFSS = event.target.files[0];
		    },
			handleFileChangePerPem(event) {
		      this.selectedFilePerPem = event.target.files[0];
		    },
			handleFileChangeKKN(event) {
		      this.selectedFileKKN = event.target.files[0];
		    },
			handleFileChangeNSMK(event) {
		      this.selectedFileKSMK = event.target.files[0];
		    },
			getProofOfSksUrl() {
				if (this.application.proof_of_sks) {
					return '/storage/uploads/' + this.application.proof_of_sks;
				}
				return null;
			},
			update_application_thesis_title(){
    			axios.post(this.endpoint_update_application_user_title, this.application)
    			.then(({data}) => {
    				this.fetch();
    				$(".update-validity-close").click();
    			});
			},
			update_application_no_telp(){
    			axios.post(this.endpoint_update_application_no_telp, this.application)
    			.then(({data}) => {
    				this.fetch();
    				$(".update-validity-close").click();
    			});
			},
			update_application_address(){
    			axios.post(this.endpoint_update_application_address, this.application)
    			.then(({data}) => {
    				this.fetch();
    				$(".update-validity-close").click();
    			});
			},
			update_application_email(){
    			axios.post(this.endpoint_update_application_email, this.application)
    			.then(({data}) => {
    				this.fetch();
    				$(".update-validity-close").click();
    			});
			},
			update_application_pembimbing1(){
    			axios.post(this.endpoint_update_application_pembimbing1, this.application)
    			.then(({data}) => {
    				this.fetch();
    				$(".update-validity-close-pembi1").click();
    			});
			},
			update_application_pembimbing2(){
    			axios.post(this.endpoint_update_application_pembimbing2, this.application)
    			.then(({data}) => {
    				this.fetch();
    				$(".update-validity-close-pembi2").click();
    			});
			},
			update_application_penguji2(){
    			axios.post(this.endpoint_update_application_penguji2, this.application)
    			.then(({data}) => {
    				this.fetch();
    				$(".update-validity-close").click();
    			});
			},
			update_application_thesis_kk(){
				let formData = new FormData();
		    	formData.append('proof_of_kk', this.selectedFileKK);
  		    	formData.append('application_id',this.$route.params.id)
				
				console.log(formData);

				axios.post(this.endpoint_update_application_user_kk, formData)
				.then(response => {
					console.log('File uploaded successfully', response);
					this.fetch();
					$(".update-validity-close-kk").click();
				})
				.catch(error => {
					console.error('Error uploading file', error);
				});
			},
			update_application_thesis_sks(){
		      let formData = new FormData();
		      formData.append('proof_of_sks', this.selectedFileSks);
  		      formData.append('application_id',this.$route.params.id)

		      console.log(formData);

		      axios.post(this.endpoint_update_application_user_sks, formData)
		        .then(response => {
		          console.log('File uploaded successfully', response);
		          this.fetch();
		          $(".update-validity-close-sks").click();
		        })
		        .catch(error => {
		          console.error('Error uploading file', error);
		        });
			},
			update_application_thesis_payment(){
		      let formData = new FormData();
		      formData.append('proof_of_payment', this.selectedFilePayment);
  		      formData.append('application_id',this.$route.params.id)

		      console.log(formData);

		      axios.post(this.endpoint_update_application_user_payment, formData)
		        .then(response => {
		          this.fetch();
		          $(".update-validity-close-payment").click();
		          console.log('File uploaded successfully', response);
		        })
		        .catch(error => {
		          console.error('Error uploading file', error);
		        });
			},
			update_application_thesis_degree(){
		      let formData = new FormData();
		      formData.append('proof_of_degree', this.selectedFileDegree);
  		      formData.append('application_id',this.$route.params.id)

		      console.log(formData);

		      axios.post(this.endpoint_update_application_user_degree, formData)
		        .then(response => {
		          this.fetch();
		          $(".update-validity-close-degree").click();
		          console.log('File uploaded successfully', response);
		        })
		        .catch(error => {
		          console.error('Error uploading file', error);
		        });
			},
			update_application_thesis_kajur(){
		      let formData = new FormData();
		      formData.append('proof_of_kajur', this.selectedFileKajur);
  		      formData.append('application_id',this.$route.params.id)

		      console.log(formData);

		      axios.post(this.endpoint_update_application_user_kajur, formData)
		        .then(response => {
		          this.fetch();
		          $(".update-validity-close-kajur").click();
		          console.log('File uploaded successfully', response);
		        })
		        .catch(error => {
		          console.error('Error uploading file', error);
		        });
			},
			update_application_thesis_telp(){
		      let formData = new FormData();
		      formData.append('proof_of_telp', this.selectedFileTelp);
  		      formData.append('application_id',this.$route.params.id)

		      console.log(formData);

		      axios.post(this.endpoint_update_application_user_telp, formData)
		        .then(response => {
		          this.fetch();
		          $(".update-validity-close-telp").click();
		          console.log('File uploaded successfully', response);
		        })
		        .catch(error => {
		          console.error('Error uploading file', error);
		        });
			},
			update_application_thesis_email(){
		      let formData = new FormData();
		      formData.append('proof_of_email', this.selectedFileEmail);
  		      formData.append('application_id',this.$route.params.id)

		      console.log(formData);

		      axios.post(this.endpoint_update_application_user_email, formData)
		        .then(response => {
		          this.fetch();
		          $(".update-validity-close-email").click();
		          console.log('File uploaded successfully', response);
		        })
		        .catch(error => {
		          console.error('Error uploading file', error);
		        });
			},
			update_application_thesis_alamat(){
		      let formData = new FormData();
		      formData.append('proof_of_alamat', this.selectedFileAlamat);
  		      formData.append('application_id',this.$route.params.id)

		      console.log(formData);

		      axios.post(this.endpoint_update_application_user_alamat, formData)
		        .then(response => {
		          this.fetch();
		          $(".update-validity-close-alamat").click();
		          console.log('File uploaded successfully', response);
		        })
		        .catch(error => {
		          console.error('Error uploading file', error);
		        });
			},
			update_application_thesis_ktp(){
		      let formData = new FormData();
		      formData.append('proof_of_ktp', this.selectedFileKTP);
  		      formData.append('application_id',this.$route.params.id)

		      console.log(formData);

		      axios.post(this.endpoint_update_application_user_ktp, formData)
		        .then(response => {
		          this.fetch();
		          $(".update-validity-close-ktp").click();
		          console.log('File uploaded successfully', response);
		        })
		        .catch(error => {
		          console.error('Error uploading file', error);
		        });
			},
			update_application_thesis_sbp(){
		      let formData = new FormData();
		      formData.append('proof_of_sbp', this.selectedFileSBP);
  		      formData.append('application_id',this.$route.params.id)

		      console.log(formData);

		      axios.post(this.endpoint_update_application_user_sbp, formData)
		        .then(response => {
		          this.fetch();
		          $(".update-validity-close-sbp").click();
		          console.log('File uploaded successfully', response);
		        })
		        .catch(error => {
		          console.error('Error uploading file', error);
		        });
			},
			update_application_thesis_transkrip(){
		      let formData = new FormData();
		      formData.append('proof_of_transkrip', this.selectedFileTN);
  		      formData.append('application_id',this.$route.params.id)

		      console.log(formData);

		      axios.post(this.endpoint_update_application_user_transkrip, formData)
		        .then(response => {
		          this.fetch();
		          $(".update-validity-close-transkrip").click();
		          console.log('File uploaded successfully', response);
		        })
		        .catch(error => {
		          console.error('Error uploading file', error);
		        });
			},
			update_application_thesis_pas_foto(){
		      let formData = new FormData();
		      formData.append('proof_of_pas_foto', this.selectedFilePF);
  		      formData.append('application_id',this.$route.params.id)

		      console.log(formData);

		      axios.post(this.endpoint_update_application_user_pas_foto, formData)
		        .then(response => {
		          this.fetch();
		          $(".update-validity-close-pas-foto").click();
		          console.log('File uploaded successfully', response);
		        })
		        .catch(error => {
		          console.error('Error uploading file', error);
		        });
			},
			update_application_thesis_loa(){
		      let formData = new FormData();
		      formData.append('proof_of_loa', this.selectedFileLOA);
  		      formData.append('application_id',this.$route.params.id)

		      console.log(formData);

		      axios.post(this.endpoint_update_application_user_loa, formData)
		        .then(response => {
		          this.fetch();
		          $(".update-validity-close-loa").click();
		          console.log('File uploaded successfully', response);
		        })
		        .catch(error => {
		          console.error('Error uploading file', error);
		        });
			},
			update_application_thesis_korespondensi_jurnal(){
		      let formData = new FormData();
		      formData.append('proof_of_journal_correspondent', this.selectedFileKorespondensiJurnal);
  		      formData.append('application_id',this.$route.params.id)

		      console.log(formData);

		      axios.post(this.endpoint_update_application_user_korespondensi_jurnal, formData)
		        .then(response => {
		          this.fetch();
		          $(".update-validity-close-korespondensi-journal").click();
		          console.log('File uploaded successfully', response);
		        })
		        .catch(error => {
		          console.error('Error uploading file', error);
		        });
			},
			update_application_thesis_sertif_opak(){
		      let formData = new FormData();
		      formData.append('proof_of_sertif_opak', this.selectedFileSO);
  		      formData.append('application_id',this.$route.params.id)

		      console.log(formData);

		      axios.post(this.endpoint_update_application_user_sertif_opak, formData)
		        .then(response => {
		          this.fetch();
		          $(".update-validity-close-sertif-opak").click();
		          console.log('File uploaded successfully', response);
		        })
		        .catch(error => {
		          console.error('Error uploading file', error);
		        });
			},
			update_application_thesis_kartu_bim(){
		      let formData = new FormData();
		      formData.append('proof_of_kartu_bim', this.selectedFileKBS);
  		      formData.append('application_id',this.$route.params.id)

		      console.log(formData);

		      axios.post(this.endpoint_update_application_user_kartu_bim, formData)
		        .then(response => {
		          this.fetch();
		          $(".update-validity-close-kartu-bim").click();
		          console.log('File uploaded successfully', response);
		        })
		        .catch(error => {
		          console.error('Error uploading file', error);
		        });
			},
			update_application_thesis_kartu_hadir(){
		      let formData = new FormData();
		      formData.append('proof_of_kartu_hadir', this.selectedFileKHSPS);
  		      formData.append('application_id',this.$route.params.id)

		      console.log(this.selectedFileKHSPS);

		      axios.post(this.endpoint_update_application_user_kartu_hadir, formData)
		        .then(response => {
		          this.fetch();
		          $(".update-validity-close-kartu-hadir").click();
		          console.log('File uploaded successfully', response);
		        })
		        .catch(error => {
		          console.error('Error uploading file', error);
		        });
			},
			update_application_thesis_pers_skrip(){
		      let formData = new FormData();
		      formData.append('proof_of_pers_skrip', this.selectedFilePerPem);
  		      formData.append('application_id',this.$route.params.id)

		      console.log(formData);

		      axios.post(this.endpoint_update_application_user_pers_skrip, formData)
		        .then(response => {
		          this.fetch();
				  alert("CNOISN")
		          $(".update-validity-close-pers-skrip").click();
		          console.log('File uploaded successfully', response);
		        })
		        .catch(error => {
		          console.error('Error uploading file', error);
		        });
			},
			update_application_thesis_penguji_propo(){
		      let formData = new FormData();
		      formData.append('proof_of_penguji_propo', this.selectedFilePP);
  		      formData.append('application_id',this.$route.params.id)

		      console.log(formData);

		      axios.post(this.endpoint_update_application_user_penguji_propo, formData)
		        .then(response => {
		          this.fetch();
		          $(".update-validity-close-penguji-propo").click();
		          console.log('File uploaded successfully', response);
		        })
		        .catch(error => {
		          console.error('Error uploading file', error);
		        });
			},
			update_application_thesis_pem_propo(){
		      let formData = new FormData();
		      formData.append('proof_of_pem_propo', this.selectedFilePWP);
  		      formData.append('application_id',this.$route.params.id)

		      console.log(formData);

		      axios.post(this.endpoint_update_application_user_pem_propo, formData)
		        .then(response => {
		          this.fetch();
		          $(".update-validity-close-pem-propo").click();
		          console.log('File uploaded successfully', response);
		        })
		        .catch(error => {
		          console.error('Error uploading file', error);
		        });
			},
			update_application_thesis_kbp(){
		      let formData = new FormData();
		      formData.append('proof_of_kbp', this.selectedFileKBP);
  		      formData.append('application_id',this.$route.params.id)

		      console.log(formData);

		      axios.post(this.endpoint_update_application_user_kbp, formData)
		        .then(response => {
		          this.fetch();
		          $(".update-validity-close-kbp").click();
		          console.log('File uploaded successfully', response);
		        })
		        .catch(error => {
		          console.error('Error uploading file', error);
		        });
			},
			update_application_thesis_fc_kartuhadir(){
		      let formData = new FormData();
		      formData.append('proof_of_fc_kartuhadir', this.selectedFileFKH);
  		      formData.append('application_id',this.$route.params.id)

		      console.log(formData);

		      axios.post(this.endpoint_update_application_user_fc_kartuhadir, formData)
		        .then(response => {
		          this.fetch();
		          $(".update-validity-close-seminar-proposal").click();
		          console.log('File uploaded successfully', response);
		        })
		        .catch(error => {
		          console.error('Error uploading file', error);
		        });
			},
			update_application_thesis_fc_slip_spp(){
		      let formData = new FormData();
		      formData.append('proof_of_fc_slip_spp', this.selectedFileFSS);
  		      formData.append('application_id',this.$route.params.id)

		      console.log(formData);

		      axios.post(this.endpoint_update_application_user_fc_slip_spp, formData)
		        .then(response => {
		          this.fetch();
		          $(".update-validity-close-fc-slip-spp").click();
		          console.log('File uploaded successfully', response);
		        })
		        .catch(error => {
		          console.error('Error uploading file', error);
		        });
			},
			update_application_thesis_persetuju_pem(){
		      let formData = new FormData();
		      formData.append('proof_of_persetuju_pem', this.selectedFilePerPem);
  		      formData.append('application_id',this.$route.params.id)

				console.log(this.selectedFilePerPem);

		      axios.post(this.endpoint_update_application_user_persetuju_pem, formData)
		        .then(response => {
		          this.fetch();
		          $(".update-validity-close-perpem").click();
		          console.log('File uploaded successfully', response);
		        })
		        .catch(error => {
		          console.error('Error uploading file', error);
		        });
			},
			update_application_thesis_sertif_kkn(){
		      let formData = new FormData();
		      formData.append('proof_of_sertif_kkn', this.selectedFileKKN);
  		      formData.append('application_id',this.$route.params.id)

		      console.log(formData);

		      axios.post(this.endpoint_update_application_user_sertif_kkn, formData)
		        .then(response => {
		          this.fetch();
		          $(".update-validity-close-kkn").click();
		          console.log('File uploaded successfully', response);
		        })
		        .catch(error => {
		          console.error('Error uploading file', error);
		        });
			},
    		fetch(){
    			this.search_application.application_id = this.$route.params.id;
    			axios.post(this.endpoint_read_single_application, this.search_application)
    			.then(({data}) => {
					if(data.user_detail.prodi){
						this.prodi_mks = data.user_detail.prodi.prodi_mks;
					}else{
						this.prodi_mks = [];
					}

    				this.application = data;
    			});
    		},
		},
        mounted() {
        	this.user = window.authUser
        	this.fetch();
        }
    }
</script>
