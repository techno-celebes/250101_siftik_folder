<template>
	<div class="wrapper">
	    <div class="container input-data">
	    	<div class="row">
	    		<div class="col-12 table-responsive">
			    	<table class="table">
			    		<thead class="thead-dark">
				    		<tr>
				    			<th>No</th>
				    			<th>Nama</th>
				    			<th>Status</th>
				    		</tr>
			    		</thead>
			    		<tbody class="single-thesis-table">
			    			<tr>
			    				<td>Nama</td>
			    				<td>{{ application.name }}</td>
			    				<td>-</td>
			    			</tr>
			    			<tr>
			    				<td>NIM</td>
			    				<td>{{ application.username }}</td>
			    				<td>-</td>
			    			</tr>
			    			<tr>
			    				<td>Jurusan</td>
			    				<td>{{ application?.user_detail?.prodi?.prodi_name ?? "-" }}</td>
			    				<td>-</td>
			    			</tr>
							<tr>
			    				<td>Jenis Permohonan</td>
								<td><b>
										<span v-if="application.permintaan == 1">Skripsi</span>
										<span v-if="application.permintaan == 2">Proposal</span>
										<span v-if="application.permintaan == 3">Komprehensif</span>
									</b>
								</td>
			    				<td>-</td>
			    			</tr>
			    			<tr>
			    				<td>Email</td>
			    				<td>{{ application.email_nec }}</td>
			    				<td>
			    					<a v-if="application.email_status == 0 || application.email_status == null" class="badge badge-secondary" href="#" data-bs-target="#proof-of-email" data-bs-toggle="modal">Belum Diperiksa</a>
			    					<a v-if="application.email_status == 1" class="badge badge-primary" href="#" data-bs-target="#proof-of-email" data-bs-toggle="modal">Valid</a>
			    					<a v-if="application.email_status == 2" class="badge badge-danger" href="#" data-bs-target="#proof-of-email" data-bs-toggle="modal">Tidak Valid</a>
			    				</td>
			    			</tr>
							<tr>
			    				<td>No. Telp</td>
			    				<td>{{ application.no_telp }}</td>
			    				<td>
			    					<a v-if="application.telp_status == 0 || application.telp_status == null" class="badge badge-secondary" href="#" data-bs-target="#proof-of-telp" data-bs-toggle="modal">Belum Diperiksa</a>
			    					<a v-if="application.telp_status == 1" class="badge badge-primary" href="#" data-bs-target="#proof-of-telp" data-bs-toggle="modal">Valid</a>
			    					<a v-if="application.telp_status == 2" class="badge badge-danger" href="#" data-bs-target="#proof-of-telp" data-bs-toggle="modal">Tidak Valid</a>
			    				</td>
			    			</tr>
			    			<tr>
			    				<td>Alamat</td>
			    				<td>{{ application.address }}</td>
			    				<td>
			    					<a v-if="application.address_status == 0 || application.address_status == null" class="badge badge-secondary" href="#" data-bs-target="#proof-of-address" data-bs-toggle="modal">Belum Diperiksa</a>
			    					<a v-if="application.address_status == 1" class="badge badge-primary" href="#" data-bs-target="#proof-of-address" data-bs-toggle="modal">Valid</a>
			    					<a v-if="application.address_status == 2" class="badge badge-danger" href="#" data-bs-target="#proof-of-address" data-bs-toggle="modal">Tidak Valid</a>
			    				</td>
			    			</tr>
							<tr>
			    				<td>Judul</td>
			    				<td>{{ application.thesis_title }}</td>
			    				<td>
			    					<a v-if="application.thesis_title_status == 0 || application.thesis_title_status == null" class="badge badge-secondary" href="#" data-bs-target="#proof-of-title" data-bs-toggle="modal">Belum Diperiksa</a>
			    					<a v-if="application.thesis_title_status == 1" class="badge badge-primary" href="#" data-bs-target="#proof-of-title" data-bs-toggle="modal">Valid</a>
			    					<a v-if="application.thesis_title_status == 2" class="badge badge-danger" href="#" data-bs-target="#proof-of-title" data-bs-toggle="modal">Tidak Valid</a>
			    				</td>
			    			</tr>
			    			<tr v-if="application.permintaan == 9">
			    				<td>Bukti SKS Telah Memenuhi</td>
			    				<td><router-link :to="{ name:'panel-view-pdf-route', params: { 'id': application.proof_of_sks }}" target="_blank">{{ application.proof_of_sks }}</router-link></td>
			    				<td>
			    					<a v-if="application.sks_status == 0" class="badge badge-secondary" href="#" data-bs-target="#proof-of-sks" data-bs-toggle="modal">Belum Diperiksa</a>
			    					<a v-if="application.sks_status == 1" class="badge badge-primary" href="#" data-bs-target="#proof-of-sks" data-bs-toggle="modal">Valid</a>
			    					<a v-if="application.sks_status == 2" class="badge badge-danger" href="#" data-bs-target="#proof-of-sks" data-bs-toggle="modal">Tidak Valid</a>
			    				</td>
			    			</tr>
			    			<tr v-if="application.permintaan == 9">
			    				<td>Bukti Ijazah</td>
			    				<td><router-link :to="{ name:'panel-view-pdf-route', params: { 'id': application.proof_of_degree }}" target="_blank">{{ application.proof_of_degree }}</router-link></td>
			    				<td>
			    					<a v-if="application.degree_status == 0  || application.degree_status == null" class="badge badge-secondary" href="#" data-bs-target="#proof-of-degree" data-bs-toggle="modal">{{ application.degree_status_string }}</a>
			    					<a v-if="application.degree_status == 1" class="badge badge-primary" href="#" data-bs-target="#proof-of-degree" data-bs-toggle="modal">{{ application.degree_status_string }}</a>
			    					<a v-if="application.degree_status == 2" class="badge badge-danger" href="#" data-bs-target="#proof-of-degree" data-bs-toggle="modal">{{ application.degree_status_string }}</a>
			    				</td>
			    			</tr>
							<tr v-if="application.permintaan == 1">
			    				<td>KK</td>
			    				<td><router-link :to="{ name:'panel-view-pdf-route', params: { 'id': application.proof_of_kk }}" target="_blank">{{ application.proof_of_kk }}</router-link></td>
			    				<td>
			    					<a v-if="application.kk_status == 0 || application.kk_status == null" class="badge badge-secondary" href="#" data-bs-target="#proof-of-kk" data-bs-toggle="modal">Belum Diperiksa</a>
			    					<a v-if="application.kk_status == 1" class="badge badge-primary" href="#" data-bs-target="#proof-of-kk" data-bs-toggle="modal">Valid</a>
			    					<a v-if="application.kk_status == 2" class="badge badge-danger" href="#" data-bs-target="#proof-of-kk" data-bs-toggle="modal">Tidak Valid</a>
			    				</td>
			    			</tr>
			    			<tr v-if="application.permintaan == 1">
			    				<td>KTP</td>
			    				<td><router-link :to="{ name:'panel-view-pdf-route', params: { 'id': application.proof_of_ktp }}" target="_blank">{{ application.proof_of_ktp }}</router-link></td>
			    				<td>
			    					<a v-if="application.ktp_status == 0 || application.ktp_status == null" class="badge badge-secondary" href="#" data-bs-target="#proof-of-ktp" data-bs-toggle="modal">Belum Diperiksa</a>
			    					<a v-if="application.ktp_status == 1" class="badge badge-primary" href="#" data-bs-target="#proof-of-ktp" data-bs-toggle="modal">Valid</a>
			    					<a v-if="application.ktp_status == 2" class="badge badge-danger" href="#" data-bs-target="#proof-of-ktp" data-bs-toggle="modal">Tidak Valid</a>
			    				</td>
			    			</tr>
			    			<tr v-if="application.permintaan == 1">
			    				<td>Surat Bebas Plagiasi</td>
			    				<td><router-link :to="{ name:'panel-view-pdf-route', params: { 'id': application.proof_of_sbp }}" target="_blank">{{ application.proof_of_sbp }}</router-link></td>
			    				<td>
			    					<a v-if="application.sbp_status == 0 || application.sbp_status == null" class="badge badge-secondary" href="#" data-bs-target="#proof-of-sbp" data-bs-toggle="modal">Belum Diperiksa</a>
			    					<a v-if="application.sbp_status == 1" class="badge badge-primary" href="#" data-bs-target="#proof-of-sbp" data-bs-toggle="modal">Valid</a>
			    					<a v-if="application.sbp_status == 2" class="badge badge-danger" href="#" data-bs-target="#proof-of-sbp" data-bs-toggle="modal">Tidak Valid</a>
			    				</td>
			    			</tr>
			    			<tr v-if="application.permintaan == 1">
			    				<td>Transkrip Nilai</td>
			    				<td><router-link :to="{ name:'panel-view-pdf-route', params: { 'id': application.proof_of_transkrip }}" target="_blank">{{ application.proof_of_transkrip }}</router-link></td>
			    				<td>
			    					<a v-if="application.transkrip_status == 0 || application.transkrip_status == null" class="badge badge-secondary" href="#" data-bs-target="#proof-of-transkrip" data-bs-toggle="modal">Belum Diperiksa</a>
			    					<a v-if="application.transkrip_status == 1" class="badge badge-primary" href="#" data-bs-target="#proof-of-transkrip" data-bs-toggle="modal">Valid</a>
			    					<a v-if="application.transkrip_status == 2" class="badge badge-danger" href="#" data-bs-target="#proof-of-transkrip" data-bs-toggle="modal">Tidak Valid</a>
			    				</td>
			    			</tr>
			    			<tr v-if="application.permintaan == 1">
			    				<td>Pas Foto (Warna Latar Merah : Ganjil, Biru : Genap)</td>
			    				<td><router-link :to="{ name:'panel-view-pdf-route', params: { 'id': application.proof_of_pas_foto }}" target="_blank">{{ application.proof_of_pas_foto }}</router-link></td>
			    				<td>
			    					<a v-if="application.pas_foto_status == 0 || application.pas_foto_status == null" class="badge badge-secondary" href="#" data-bs-target="#proof-of-pas-foto" data-bs-toggle="modal">Belum Diperiksa</a>
			    					<a v-if="application.pas_foto_status == 1" class="badge badge-primary" href="#" data-bs-target="#proof-of-pas-foto" data-bs-toggle="modal">Valid</a>
			    					<a v-if="application.pas_foto_status == 2" class="badge badge-danger" href="#" data-bs-target="#proof-of-pas-foto" data-bs-toggle="modal">Tidak Valid</a>
			    				</td>
			    			</tr>
			    			<tr v-if="application.permintaan == 1">
			    				<td>Sertifikat OPAK</td>
			    				<td><router-link :to="{ name:'panel-view-pdf-route', params: { 'id': application.proof_of_sertif_opak }}" target="_blank">{{ application.proof_of_sertif_opak }}</router-link></td>
			    				<td>
			    					<a v-if="application.sertif_opak_status == 0 || application.sertif_opak_status == null" class="badge badge-secondary" href="#" data-bs-target="#proof-of-sertif-opak" data-bs-toggle="modal">Belum Diperiksa</a>
			    					<a v-if="application.sertif_opak_status == 1" class="badge badge-primary" href="#" data-bs-target="#proof-of-sertif-opak" data-bs-toggle="modal">Valid</a>
			    					<a v-if="application.sertif_opak_status == 2" class="badge badge-danger" href="#" data-bs-target="#proof-of-sertif-opak" data-bs-toggle="modal">Tidak Valid</a>
			    				</td>
			    			</tr>
			    			<tr v-if="application.permintaan == 1">
			    				<td>Kartu Bimbingan Skripsi
									<!-- <tr v-if="application.kartu_bim_status = 2">
										<td>Catatan disini</td>
									</tr> -->
									
								</td>
			    				<td><router-link :to="{ name:'panel-view-pdf-route', params: { 'id': application.proof_of_kartu_bim }}" target="_blank">{{ application.proof_of_kartu_bim }}</router-link></td>
			    				<td>
			    					<a v-if="application.kartu_bim_status == 0 || application.kartu_bim_status == null" class="badge badge-secondary" href="#" data-bs-target="#proof-of-kartu-bim-skr" data-bs-toggle="modal">Belum Diperiksa</a>
			    					<a v-if="application.kartu_bim_status == 1" class="badge badge-primary" href="#" data-bs-target="#proof-of-kartu-bim-skr" data-bs-toggle="modal">Valid</a>
			    					<a v-if="application.kartu_bim_status == 2" class="badge badge-danger" href="#" data-bs-target="#proof-of-kartu-bim-skr" data-bs-toggle="modal">Tidak Valid</a>
			    				</td>
								
			    			</tr>
							<tr v-if="application.permintaan == 1">
			    				<td>Kartu Hadir Seminar Proposal</td>
			    				<td><router-link :to="{ name:'panel-view-pdf-route', params: { 'id': application.proof_of_kartu_hadir }}" target="_blank">{{ application.proof_of_kartu_hadir }}</router-link></td>
			    				<td>
			    					<a v-if="application.kartu_hadir_status == 0 || application.kartu_hadir_status == null" class="badge badge-secondary" href="#" data-bs-target="#proof-of-khsp" data-bs-toggle="modal">Belum Diperiksa</a>
			    					<a v-if="application.kartu_hadir_status == 1" class="badge badge-primary" href="#" data-bs-target="#proof-of-khsp" data-bs-toggle="modal">Valid</a>
			    					<a v-if="application.kartu_hadir_status == 2" class="badge badge-danger" href="#" data-bs-target="#proof-of-khsp" data-bs-toggle="modal">Tidak Valid</a>
			    				</td>
			    			</tr>
							<tr v-if="application.permintaan == 1">
			    				<td>Bukti Pembayaran SPP Terakhir</td>
			    				<td><router-link :to="{ name:'panel-view-pdf-route', params: { 'id': application.proof_of_fc_slip_spp }}" target="_blank">{{ application.proof_of_fc_slip_spp }}</router-link></td>
			    				<td>
			    					<a v-if="application.fc_slip_spp_status == 0 || application.fc_slip_spp_status == null" class="badge badge-secondary" href="#" data-bs-target="#proof-of-fc-slip-spp" data-bs-toggle="modal">Belum Diperiksa</a>
			    					<a v-if="application.fc_slip_spp_status == 1" class="badge badge-primary" href="#" data-bs-target="#proof-of-fc-slip-spp" data-bs-toggle="modal">Valid</a>
			    					<a v-if="application.fc_slip_spp_status == 2" class="badge badge-danger" href="#" data-bs-target="#proof-of-fc-slip-spp" data-bs-toggle="modal">Tidak Valid</a>
			    				</td>
			    			</tr>
							<tr v-if="application.permintaan == 1">
			    				<td>Persetujuan Pembimbing Skripsi</td>
			    				<td><router-link :to="{ name:'panel-view-pdf-route', params: { 'id': application.proof_of_pers_skrip }}" target="_blank">{{ application.proof_of_pers_skrip }}</router-link></td>
			    				<td>
			    					<a v-if="application.pers_skrip_status == 0 || application.pers_skrip_status == null" class="badge badge-secondary" href="#" data-bs-target="#proof-of-per-pem-skri" data-bs-toggle="modal">Belum Diperiksa</a>
			    					<a v-if="application.pers_skrip_status == 1" class="badge badge-primary" href="#" data-bs-target="#proof-of-per-pem-skri" data-bs-toggle="modal">Valid</a>
			    					<a v-if="application.pers_skrip_status == 2" class="badge badge-danger" href="#" data-bs-target="#proof-of-per-pem-skri" data-bs-toggle="modal">Tidak Valid</a>
			    				</td>
			    			</tr>
							<tr v-if="application.permintaan == 1">
			    				<td>Bukti Artikel Terpublikasi / LOA</td>
			    				<td><router-link :to="{ name:'panel-view-pdf-route', params: { 'id': application.proof_of_loa }}" target="_blank">{{ application.proof_of_loa }}</router-link></td>
			    				<td>
			    					<a v-if="application.loa_status == 0 || application.pers_skrip_status == null" class="badge badge-secondary" href="#" data-bs-target="#proof-of-loa" data-bs-toggle="modal">Belum Diperiksa</a>
			    					<a v-if="application.loa_status == 1" class="badge badge-primary" href="#" data-bs-target="#proof-of-loa" data-bs-toggle="modal">Valid</a>
			    					<a v-if="application.loa_status == 2" class="badge badge-danger" href="#" data-bs-target="#proof-of-loa" data-bs-toggle="modal">Tidak Valid</a>
			    				</td>
			    			</tr>
							<tr v-if="application.permintaan == 1">
			    				<td>Korespondensi Jurnal</td>
			    				<td><router-link :to="{ name:'panel-view-pdf-route', params: { 'id': application.proof_of_journal_correspondent }}" target="_blank">{{ application.proof_of_journal_correspondent }}</router-link></td>
			    				<td>
			    					<a v-if="application.journal_correspondent_status == 0 || application.pers_skrip_status == null" class="badge badge-secondary" href="#" data-bs-target="#proof-of-journal-correspondent" data-bs-toggle="modal">Belum Diperiksa</a>
			    					<a v-if="application.journal_correspondent_status == 1" class="badge badge-primary" href="#" data-bs-target="#proof-of-journal-correspondent" data-bs-toggle="modal">Valid</a>
			    					<a v-if="application.journal_correspondent_status == 2" class="badge badge-danger" href="#" data-bs-target="#proof-of-journal-correspondent" data-bs-toggle="modal">Tidak Valid</a>
			    				</td>
			    			</tr>
							<tr v-if="application.permintaan == 1">
			    				<td>Pembimbing 1</td>
			    				<td>{{ application.proof_of_ppwpro }}</td>
			    				<td>
			    					<a v-if="application.ppwpro_status == 0 || application.ppwpro_status == null" class="badge badge-secondary" href="#" data-bs-target="#proof-of-pembi1" data-bs-toggle="modal">Belum Diperiksa</a>
			    					<a v-if="application.ppwpro_status == 1" class="badge badge-primary" href="#" data-bs-target="#proof-of-ppwpro" data-bs-toggle="modal">Valid</a>
			    					<a v-if="application.ppwpro_status == 2" class="badge badge-danger" href="#" data-bs-target="#proof-of-ppwpro" data-bs-toggle="modal">Tidak Valid</a>
								</td>
			    			</tr>
							<tr v-if="application.permintaan == 1">
			    				<td>Pembimbing 2</td>
			    				<td>{{ application.proof_of_ppwpro_nd }}</td>
			    				<td>
			    					<a v-if="application.ppwpro_nd_status == 0 || application.ppwpro_nd_status == null" class="badge badge-secondary" href="#" data-bs-target="#proof-of-pembi2" data-bs-toggle="modal">Belum Diperiksa</a>
			    					<a v-if="application.ppwpro_nd_status == 1" class="badge badge-primary" href="#" data-bs-target="#proof-of-ppwpro" data-bs-toggle="modal">Valid</a>
			    					<a v-if="application.ppwpro_nd_status == 2" class="badge badge-danger" href="#" data-bs-target="#proof-of-ppwpro" data-bs-toggle="modal">Tidak Valid</a>
								</td>
			    			</tr>
							<tr v-if="application.permintaan == 1">
			    				<td><a href="#" data-bs-toggle="modal" data-bs-target="#proof-of-penguji-utama-1">Penguji Utama 1</a></td>
			    				<td>{{ application.proof_of_examiner }}</td>
								<td>-</td>
			    			</tr>
							<tr v-if="application.permintaan == 1">
			    				<td>Penguji Utama 2 Waktu Proposal</td>
			    				<td>{{ application.proof_of_examiner_nd }}</td>
			    				<td>
			    					<a v-if="application.examiner_nd_status == 0 || application.examiner_nd_status == null" class="badge badge-secondary" href="#" data-bs-target="#proof-of-penguji2" data-bs-toggle="modal">Belum Diperiksa</a>
			    					<a v-if="application.examiner_nd_status == 1" class="badge badge-primary" href="#" data-bs-target="#proof-of-ppwpro" data-bs-toggle="modal">Valid</a>
			    					<a v-if="application.examiner_nd_status == 2" class="badge badge-danger" href="#" data-bs-target="#proof-of-ppwpro" data-bs-toggle="modal">Tidak Valid</a>
								</td>
			    			</tr>

							<!-- Proposal -->
			    			<tr v-if="application.permintaan == 2">
			    				<td>Surat Bebas Plagiasi</td>
			    				<td><router-link :to="{ name:'panel-view-pdf-route', params: { 'id': application.proof_of_sbp }}" target="_blank">{{ application.proof_of_sbp }}</router-link></td>
			    				<td>
			    					<a v-if="application.sbp_status == 0 || application.sbp_status == null" class="badge badge-secondary" href="#" data-bs-target="#proof-of-sbp" data-bs-toggle="modal">Belum Diperiksa</a>
			    					<a v-if="application.sbp_status == 1" class="badge badge-primary" href="#" data-bs-target="#proof-of-sbp" data-bs-toggle="modal">Valid</a>
			    					<a v-if="application.sbp_status == 2" class="badge badge-danger" href="#" data-bs-target="#proof-of-sbp" data-bs-toggle="modal">Tidak Valid</a>
			    				</td>
			    			</tr>
							<tr v-if="application.permintaan == 2">
			    				<td>Kartu Bimbingan Proposal</td>
			    				<td><router-link :to="{ name:'panel-view-pdf-route', params: { 'id': application.proof_of_kbp }}" target="_blank">{{ application.proof_of_kbp }}</router-link></td>
			    				<td>
			    					<a v-if="application.kbp_status == 0 || application.kbp_status == null" class="badge badge-secondary" href="#" data-bs-target="#proof-of-kbp" data-bs-toggle="modal">Belum Diperiksa</a>
			    					<a v-if="application.kbp_status == 1" class="badge badge-primary" href="#" data-bs-target="#proof-of-kbp" data-bs-toggle="modal">Valid</a>
			    					<a v-if="application.kbp_status == 2" class="badge badge-danger" href="#" data-bs-target="#proof-of-kbp" data-bs-toggle="modal">Tidak Valid</a>
			    				</td>
			    			</tr>
							<tr v-if="application.permintaan == 2">
			    				<td>Kartu Hadir Seminar Proposal</td>
			    				<td><router-link :to="{ name:'panel-view-pdf-route', params: { 'id': application.proof_of_kartu_hadir }}" target="_blank">{{ application.proof_of_kartu_hadir }}</router-link></td>
			    				<td>
			    					<a v-if="application.kartu_hadir_status == 0 || application.kartu_hadir_status == null" class="badge badge-secondary" href="#" data-bs-target="#proof-of-khsp" data-bs-toggle="modal">Belum Diperiksa</a>
			    					<a v-if="application.kartu_hadir_status == 1" class="badge badge-primary" href="#" data-bs-target="#proof-of-khsp" data-bs-toggle="modal">Valid</a>
			    					<a v-if="application.kartu_hadir_status == 2" class="badge badge-danger" href="#" data-bs-target="#proof-of-khsp" data-bs-toggle="modal">Tidak Valid</a>
			    				</td>
			    			</tr>
							<tr v-if="application.permintaan == 2">
			    				<td>Bukti Pembayaran SPP Terakhir</td>
			    				<td><router-link :to="{ name:'panel-view-pdf-route', params: { 'id': application.proof_of_fc_slip_spp }}" target="_blank">{{ application.proof_of_fc_slip_spp }}</router-link></td>
			    				<td>
			    					<a v-if="application.fc_slip_spp_status == 0 || application.fc_slip_spp_status == null" class="badge badge-secondary" href="#" data-bs-target="#proof-of-fc-slip-spp" data-bs-toggle="modal">Belum Diperiksa</a>
			    					<a v-if="application.fc_slip_spp_status == 1" class="badge badge-primary" href="#" data-bs-target="#proof-of-fc-slip-spp" data-bs-toggle="modal">Valid</a>
			    					<a v-if="application.fc_slip_spp_status == 2" class="badge badge-danger" href="#" data-bs-target="#proof-of-fc-slip-spp" data-bs-toggle="modal">Tidak Valid</a>
			    				</td>
			    			</tr>
							<tr v-if="application.permintaan == 2">
			    				<td>Persetujuan Pembimbing</td>
			    				<td><router-link :to="{ name:'panel-view-pdf-route', params: { 'id': application.proof_of_persetuju_pem }}" target="_blank">{{ application.proof_of_persetuju_pem }}</router-link></td>
			    				<td>
			    					<a v-if="application.persetuju_pem_status == 0 || application.persetuju_pem_status == null" class="badge badge-secondary" href="#" data-bs-target="#proof-of-persetuju-pem" data-bs-toggle="modal">Belum Diperiksa</a>
			    					<a v-if="application.persetuju_pem_status == 1" class="badge badge-primary" href="#" data-bs-target="#proof-of-persetuju-pem" data-bs-toggle="modal">Valid</a>
			    					<a v-if="application.persetuju_pem_status == 2" class="badge badge-danger" href="#" data-bs-target="#proof-of-persetuju-pem" data-bs-toggle="modal">Tidak Valid</a>
			    				</td>
			    			</tr>
							<tr v-if="application.permintaan == 2">
			    				<td>Pembimbing 1</td>
			    				<td>{{ application.proof_of_ppwpro }}</td>
			    				<td>
			    					<a v-if="application.ppwpro_status == 0 || application.ppwpro_status == null" class="badge badge-secondary" href="#" data-bs-target="#proof-of-pembi1" data-bs-toggle="modal">Belum Diperiksa</a>
			    					<a v-if="application.ppwpro_status == 1" class="badge badge-primary" href="#" data-bs-target="#proof-of-ppwpro" data-bs-toggle="modal">Valid</a>
			    					<a v-if="application.ppwpro_status == 2" class="badge badge-danger" href="#" data-bs-target="#proof-of-ppwpro" data-bs-toggle="modal">Tidak Valid</a>
								</td>
			    			</tr>
							<tr v-if="application.permintaan == 2">
			    				<td>Pembimbing 2</td>
			    				<td>{{ application.proof_of_ppwpro }}</td>
			    				<td>
			    					<a v-if="application.ppwpro_status == 0 || application.ppwpro_status == null" class="badge badge-secondary" href="#" data-bs-target="#proof-of-pembi2" data-bs-toggle="modal">Belum Diperiksa</a>
			    					<a v-if="application.ppwpro_status == 1" class="badge badge-primary" href="#" data-bs-target="#proof-of-ppwpro" data-bs-toggle="modal">Valid</a>
			    					<a v-if="application.ppwpro_status == 2" class="badge badge-danger" href="#" data-bs-target="#proof-of-ppwpro" data-bs-toggle="modal">Tidak Valid</a>
								</td>
			    			</tr>

							<!-- Komprehensif -->
							<tr v-if="application.permintaan == 3">
			    				<td>Sertifikat KKN</td>
			    				<td><router-link :to="{ name:'panel-view-pdf-route', params: { 'id': application.proof_of_sertif_kkn }}" target="_blank">{{ application.proof_of_sertif_kkn }}</router-link></td>
			    				<td>
			    					<a v-if="application.sertif_kkn_status == 0 || application.sertif_kkn_status == null" class="badge badge-secondary" href="#" data-bs-target="#proof-of-kkn" data-bs-toggle="modal">Belum Diperiksa</a>
			    					<a v-if="application.sertif_kkn_status == 1" class="badge badge-primary" href="#" data-bs-target="#proof-of-kkn" data-bs-toggle="modal">Valid</a>
			    					<a v-if="application.sertif_kkn_status == 2" class="badge badge-danger" href="#" data-bs-target="#proof-of-kkn" data-bs-toggle="modal">Tidak Valid</a>
			    				</td>
			    			</tr>
							<tr v-if="application.permintaan == 3">
			    				<td>Transkrip Nilai</td>
			    				<td><router-link :to="{ name:'panel-view-pdf-route', params: { 'id': application.proof_of_transkrip }}" target="_blank">{{ application.proof_of_transkrip }}</router-link></td>
			    				<td>
			    					<a v-if="application.transkrip_status == 0 || application.transkrip_status == null" class="badge badge-secondary" href="#" data-bs-target="#proof-of-transkrip" data-bs-toggle="modal">Belum Diperiksa</a>
			    					<a v-if="application.transkrip_status == 1" class="badge badge-primary" href="#" data-bs-target="#proof-of-transkrip" data-bs-toggle="modal">Valid</a>
			    					<a v-if="application.transkrip_status == 2" class="badge badge-danger" href="#" data-bs-target="#proof-of-transkrip" data-bs-toggle="modal">Tidak Valid</a>
			    				</td>
			    			</tr>
							<tr v-if="application.permintaan == 3">
			    				<td>Seminar Proposal</td>
			    				<td><router-link :to="{ name:'panel-view-pdf-route', params: { 'id': application.proof_of_fc_kartuhadir }}" target="_blank">{{ application.proof_of_fc_kartuhadir }}</router-link></td>
			    				<td>
			    					<a v-if="application.fc_kartuhadir_status == 0 || application.fc_kartuhadir_status == null" class="badge badge-secondary" href="#" data-bs-target="#proof-of-fc-kartu-hadir" data-bs-toggle="modal">Belum Diperiksa</a>
			    					<a v-if="application.fc_kartuhadir_status == 1" class="badge badge-primary" href="#" data-bs-target="#proof-of-fc-kartu-hadir" data-bs-toggle="modal">Valid</a>
			    					<a v-if="application.fc_kartuhadir_status == 2" class="badge badge-danger" href="#" data-bs-target="#proof-of-fc-kartu-hadir" data-bs-toggle="modal">Tidak Valid</a>
			    				</td>
			    			</tr>
							<tr v-if="application.permintaan == 3">
			    				<td>Bukti Pembayaran SPP Terakhir</td>
			    				<td><router-link :to="{ name:'panel-view-pdf-route', params: { 'id': application.proof_of_fc_slip_spp }}" target="_blank">{{ application.proof_of_fc_slip_spp }}</router-link></td>
			    				<td>
			    					<a v-if="application.fc_slip_spp_status == 0 || application.fc_slip_spp_status == null" class="badge badge-secondary" href="#" data-bs-target="#proof-of-fc-slip-spp" data-bs-toggle="modal">Belum Diperiksa</a>
			    					<a v-if="application.fc_slip_spp_status == 1" class="badge badge-primary" href="#"  data-bs-target="#proof-of-fc-slip-spp" data-bs-toggle="modal">Valid</a>
			    					<a v-if="application.fc_slip_spp_status == 2" class="badge badge-danger" href="#"  data-bs-target="#proof-of-fc-slip-spp" data-bs-toggle="modal">Tidak Valid</a>
			    				</td>
			    			</tr>
							<tr v-if="application.permintaan == 3">
			    				<td>Pas Foto (Warna Latar Merah : Ganjil, Biru : Genap)</td>
			    				<td><router-link :to="{ name:'panel-view-pdf-route', params: { 'id': application.proof_of_pas_foto }}" target="_blank">{{ application.proof_of_pas_foto }}</router-link></td>
			    				<td>
			    					<a v-if="application.pas_foto_status == 0 || application.pas_foto_status == null" class="badge badge-secondary" href="#" data-bs-target="#proof-of-pas-foto" data-bs-toggle="modal">Belum Diperiksa</a>
			    					<a v-if="application.pas_foto_status == 1" class="badge badge-primary" href="#" data-bs-target="#proof-of-pas-foto" data-bs-toggle="modal">Valid</a>
			    					<a v-if="application.pas_foto_status == 2" class="badge badge-danger" href="#" data-bs-target="#proof-of-pas-foto" data-bs-toggle="modal">Tidak Valid</a>
			    				</td>
			    			</tr>
							<tr v-if="application.permintaan == 3">
			    				<td><a href="#" data-bs-toggle="modal" data-bs-target="#proof-of-penguji-kompr-1">Penguji 1 {{ prodi_mks[0].prodi_mk_name ?? "-" }}</a></td>
			    				<td>{{ application.proof_of_compr_examiner_1 }}</td>
			    				<td>
									-
								</td>
			    			</tr>
							<tr v-if="application.permintaan == 3">
			    				<td><a href="#" data-bs-toggle="modal" data-bs-target="#proof-of-penguji-kompr-2">Penguji 2 {{ prodi_mks[1].prodi_mk_name ?? "-" }}</a></td>
			    				<td>{{ application.proof_of_compr_examiner_2 }}</td>
			    				<td>
									-
								</td>
			    			</tr>
							<tr v-if="application.permintaan == 3">
			    				<td><a href="#" data-bs-toggle="modal" data-bs-target="#proof-of-penguji-kompr-3">Penguji 3 {{ prodi_mks[2].prodi_mk_name ?? "-" }}</a></td>
			    				<td>{{ application.proof_of_compr_examiner_3 }}</td>
			    				<td>
									-
								</td>
			    			</tr>
							<tr>
			    				<td colspan="2">Status Permohonan</td>
			    				<td>
			    					<a v-if="application.general_status == 0" class="badge badge-secondary" href="#" data-bs-target="#proof-of-general-status" data-bs-toggle="modal">Belum Diperiksa</a>
			    					<a v-if="application.general_status == 1" class="badge badge-primary" href="#" data-bs-target="#proof-of-general-status" data-bs-toggle="modal">Valid</a>
			    					<a v-if="application.general_status == 2" class="badge badge-danger" href="#" data-bs-target="#proof-of-general-status" data-bs-toggle="modal">Tidak Valid</a>
			    				</td>
			    			</tr>
							<tr>
			    				<td colspan="2">Status SK</td>
			    				<td>
			    					<a v-if="application.sk_status == 0" class="badge badge-secondary" href="#" data-bs-target="#proof-of-sk" data-bs-toggle="modal">Belum ada SK</a>
			    					<a v-if="application.sk_status == 1" class="badge badge-info" href="#" data-bs-target="#proof-of-sk" data-bs-toggle="modal">Proses Menunggu SK</a>
			    					<a v-if="application.sk_status == 2" class="badge badge-primary" href="#" data-bs-target="#proof-of-sk" data-bs-toggle="modal">SK Telah jadi</a>
			    				</td>
			    			</tr>
						</tbody>
			    	</table>
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
		                		<label>Sertifikat KKN</label>
		                		<select class="form-control text-dark" v-model="application.sertif_kkn_status">
		                			<option value="1">Valid</option>
		                			<option value="2">Tidak Valid</option>
		                		</select>
		                	</div>
							<div class="col-12 form-group">
								<label>Catatan</label>
								<textarea class="form-control" rows="2" placeholder="Masukkan catatan (jika file tidak valid)"></textarea>
							</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_validity">Save changes</button>
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
		                		<label>No Telpon</label>
		                		<select class="form-control text-dark" v-model="application.telp_status">
		                			<option value="1">Valid</option>
		                			<option value="2">Tidak Valid</option>
		                		</select>
		                	</div>
							<div class="col-12 form-group">
								<label>Catatan</label>
								<textarea class="form-control" rows="2" placeholder="Masukkan catatan (jika file tidak valid)"></textarea>
							</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_validity">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>
		<div class="modal fade" id="proof-of-title" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Judul</label>
		                		<select class="form-control text-dark" v-model="application.thesis_title_status">
		                			<option value="1">Valid</option>
		                			<option value="2">Tidak Valid</option>
		                		</select>
		                	</div>
							<div class="col-12 form-group">
								<label>Catatan</label>
								<textarea class="form-control" rows="2" placeholder="Masukkan catatan (jika file tidak valid)"></textarea>
							</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_validity">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>
		<div class="modal fade" id="proof-of-address" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
		                		<select class="form-control text-dark" v-model="application.address_status">
		                			<option value="1">Valid</option>
		                			<option value="2">Tidak Valid</option>
		                		</select>
		                	</div>
							<div class="col-12 form-group">
								<label>Catatan</label>
								<textarea class="form-control" rows="2" placeholder="Masukkan catatan (jika file tidak valid)"></textarea>
							</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_validity">Save changes</button>
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
		                		<select class="form-control text-dark" v-model="application.email_status">
		                			<option value="1">Valid</option>
		                			<option value="2">Tidak Valid</option>
		                		</select>
		                	</div>
							<div class="col-12 form-group">
								<label>Catatan</label>
								<textarea class="form-control" rows="2" placeholder="Masukkan catatan (jika file tidak valid)"></textarea>
							</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_validity">Save changes</button>
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
		                		<label>KK</label>
		                		<select class="form-control text-dark" v-model="application.kk_status">
		                			<option value="1">Valid</option>
		                			<option value="2">Tidak Valid</option>
		                		</select>
		                	</div>
							<div class="col-12 form-group">
								<label>Catatan</label>
								<textarea class="form-control" rows="2" placeholder="Masukkan catatan (jika file tidak valid)"></textarea>
							</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_validity">Save changes</button>
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
		                		<label>KTP</label>
		                		<select class="form-control text-dark" v-model="application.ktp_status">
		                			<option value="1">Valid</option>
		                			<option value="2">Tidak Valid</option>
		                		</select>
		                	</div>
							<div class="col-12 form-group">
								<label>Catatan</label>
								<textarea class="form-control" rows="2" placeholder="Masukkan catatan (jika file tidak valid)"></textarea>
							</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_validity">Save changes</button>
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
		                		<label>Surat Bebas Plagiasi</label>
		                		<select class="form-control text-dark" v-model="application.sbp_status">
		                			<option value="1">Valid</option>
		                			<option value="2">Tidak Valid</option>
		                		</select>
		                	</div>
							<div class="col-12 form-group">
								<label>Catatan</label>
								<textarea class="form-control" rows="2" placeholder="Masukkan catatan (jika file tidak valid)"></textarea>
							</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_validity">Save changes</button>
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
		                		<label>Transkrip Nilai</label>
		                		<select class="form-control text-dark" v-model="application.transkrip_status">
		                			<option value="1">Valid</option>
		                			<option value="2">Tidak Valid</option>
		                		</select>
		                	</div>
							<div class="col-12 form-group">
								<label>Catatan</label>
								<textarea class="form-control" rows="2" placeholder="Masukkan catatan (jika file tidak valid)"></textarea>
							</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_validity">Save changes</button>
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
		                		<label>Pas Foto</label>
		                		<select class="form-control text-dark" v-model="application.pas_foto_status">
		                			<option value="1">Valid</option>
		                			<option value="2">Tidak Valid</option>
		                		</select>
		                	</div>
							<div class="col-12 form-group">
								<label>Catatan</label>
								<textarea class="form-control" rows="2" placeholder="Masukkan catatan (jika file tidak valid)"></textarea>
							</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_validity">Save changes</button>
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
		                		<label>Sertifikat OPAK</label>
		                		<select class="form-control text-dark" v-model="application.sertif_opak_status">
		                			<option value="1">Valid</option>
		                			<option value="2">Tidak Valid</option>
		                		</select>
		                	</div>
							<div class="col-12 form-group">
								<label>Catatan</label>
								<textarea class="form-control" rows="2" placeholder="Masukkan catatan (jika file tidak valid)"></textarea>
							</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_validity">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>
		<div class="modal fade" id="proof-of-loa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Bukti Artikel Terpublikasi</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Bukti Artikel Terpublikasi</label>
		                		<select class="form-control text-dark" v-model="application.loa_status">
		                			<option value="1">Valid</option>
		                			<option value="2">Tidak Valid</option>
		                		</select>
		                	</div>
							<div class="col-12 form-group">
								<label>Catatan</label>
								<textarea class="form-control" rows="2" placeholder="Masukkan catatan (jika file tidak valid)"></textarea>
							</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_validity">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>
		<div class="modal fade" id="proof-of-journal-correspondent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Korespondensi Jurnal</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Korespondensi Jurnal</label>
		                		<select class="form-control text-dark" v-model="application.journal_correspondent_status">
		                			<option value="1">Valid</option>
		                			<option value="2">Tidak Valid</option>
		                		</select>
		                	</div>
							<div class="col-12 form-group">
								<label>Catatan</label>
								<textarea class="form-control" rows="2" placeholder="Masukkan catatan (jika file tidak valid)"></textarea>
							</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_validity">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>
		<div class="modal fade" id="proof-of-kartu-bim-skr" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Kartu Bimbingan Skripsi</label>
		                		<select class="form-control text-dark" v-model="application.kartu_bim_status">
		                			<option value="1">Valid</option>
		                			<option value="2">Tidak Valid</option>
		                		</select>
		                	</div>
							<div class="col-12 form-group">
								<label>Catatan</label>
								<textarea class="form-control" rows="2" placeholder="Masukkan catatan (jika file tidak valid)"></textarea>
							</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_validity">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>
		<div class="modal fade" id="proof-of-khsp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Kartu Hadir Seminar Proposal</label>
		                		<select class="form-control text-dark" v-model="application.kartu_hadir_status">
		                			<option value="1">Valid</option>
		                			<option value="2">Tidak Valid</option>
		                		</select>
		                	</div>
							<div class="col-12 form-group">
								<label>Catatan</label>
								<textarea class="form-control" rows="2" placeholder="Masukkan catatan (jika file tidak valid)"></textarea>
							</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_validity">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>
		<div class="modal fade" id="proof-of-per-pem-skri" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Persetujuan Pembimbing Skripsi</label>
		                		<select class="form-control text-dark" v-model="application.pers_skrip_status">
		                			<option value="1">Valid</option>
		                			<option value="2">Tidak Valid</option>
		                		</select>
		                	</div>
							<div class="col-12 form-group">
								<label>Catatan</label>
								<textarea class="form-control" rows="2" placeholder="Masukkan catatan (jika file tidak valid)"></textarea>
							</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_validity">Save changes</button>
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
		                		<select class="form-control text-dark" v-model="application.ppwpro_status">
		                			<option value="1">Valid</option>
		                			<option value="2">Tidak Valid</option>
		                		</select>
		                	</div>
							<div class="col-12 form-group">
								<label>Catatan</label>
								<textarea class="form-control" rows="2" placeholder="Masukkan catatan (jika file tidak valid)"></textarea>
							</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_validity">Save changes</button>
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
		                		<label>Pembimbing 1</label>
		                		<select class="form-control text-dark" v-model="application.ppwpro_status">
		                			<option value="1">Valid</option>
		                			<option value="2">Tidak Valid</option>
		                		</select>
		                	</div>
							<div class="col-12 form-group">
								<label>Catatan</label>
								<textarea class="form-control" rows="2" placeholder="Masukkan catatan (jika file tidak valid)"></textarea>
							</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_validity">Save changes</button>
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
		                		<label>Pembimbing 1</label>
		                		<select class="form-control text-dark" v-model="application.ppwpro_status">
		                			<option value="1">Valid</option>
		                			<option value="2">Tidak Valid</option>
		                		</select>
		                	</div>
							<div class="col-12 form-group">
								<label>Catatan</label>
								<textarea class="form-control" rows="2" placeholder="Masukkan catatan (jika file tidak valid)"></textarea>
							</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_validity">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>
		<div class="modal fade" id="proof-of-pengMSI" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Penguji 1 {{ prodi_mks[0].prodi_mk_name ?? "-" }}</label>
		                		<select class="form-control text-dark" v-model="application.ppwpro_status">
		                			<option value="1">Valid</option>
		                			<option value="2">Tidak Valid</option>
		                		</select>
		                	</div>
							<div class="col-12 form-group">
								<label>Catatan</label>
								<textarea class="form-control" rows="2" placeholder="Masukkan catatan (jika file tidak valid)"></textarea>
							</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_validity">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>
		<div class="modal fade" id="proof-of-pengDEI" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Penguji 2 {{ prodi_mks[1].prodi_mk_name ?? "-" }}</label>
		                		<select class="form-control text-dark" v-model="application.ppwpro_status">
		                			<option value="1">Valid</option>
		                			<option value="2">Tidak Valid</option>
		                		</select>
		                	</div>
							<div class="col-12 form-group">
								<label>Catatan</label>
								<textarea class="form-control" rows="2" placeholder="Masukkan catatan (jika file tidak valid)"></textarea>
							</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_validity">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>
		<div class="modal fade" id="proof-of-pengLKB" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Penguji 3 {{ prodi_mks[2].prodi_mk_name ?? "-" }}</label>
		                		<select class="form-control text-dark" v-model="application.ppwpro_status">
		                			<option value="1">Valid</option>
		                			<option value="2">Tidak Valid</option>
		                		</select>
		                	</div>
							<div class="col-12 form-group">
								<label>Catatan</label>
								<textarea class="form-control" rows="2" placeholder="Masukkan catatan (jika file tidak valid)"></textarea>
							</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_validity">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>
		<div class="modal fade" id="proof-of-general-status" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Status Permohonan</label>
		                		<select class="form-control text-dark" v-model="application.general_status">
		                			<option value="1">Valid</option>
		                			<option value="2">Tidak Valid</option>
		                		</select>
		                	</div>
							<div class="col-12 form-group">
								<label>Catatan</label>
								<textarea class="form-control" rows="2" placeholder="Masukkan catatan (jika file tidak valid)"></textarea>
							</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_validity">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>
		<div class="modal fade" id="proof-of-sk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Status SK</label>
		                		<select class="form-control text-dark" v-model="application.sk_status">
		                			<option value="0">Belum ada SK</option>
									<option value="1">Proses menunggu SK</option>
		                			<option value="2">SK Telah Jadi</option>
		                		</select>
		                	</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_validity">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>
		<!-- UNTUK PROPOSAL -->
		<div class="modal fade" id="proof-of-pem-propo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Pembimbing Waktu Proposal</label>
		                		<select class="form-control text-dark" v-model="application.pem_propo_status">
		                			<option value="1">Valid</option>
		                			<option value="2">Tidak Valid</option>
		                		</select>
		                	</div>
							<div class="col-12 form-group">
								<label>Catatan</label>
								<textarea class="form-control" rows="2" placeholder="Masukkan catatan (jika file tidak valid)"></textarea>
							</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_validity">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>
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
		                		<label>Kartu Bimbingan Proposal</label>
		                		<select class="form-control text-dark" v-model="application.kbp_status">
		                			<option value="1">Valid</option>
		                			<option value="2">Tidak Valid</option>
		                		</select>
		                	</div>
							<div class="col-12 form-group">
								<label>Catatan</label>
								<textarea class="form-control" rows="2" placeholder="Masukkan catatan (jika file tidak valid)"></textarea>
							</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_validity">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>
		<div class="modal fade" id="proof-of-fc-kartu-hadir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Seminar Proposal</label>
		                		<select class="form-control text-dark" v-model="application.fc_kartuhadir_status">
		                			<option value="1">Valid</option>
		                			<option value="2">Tidak Valid</option>
		                		</select>
		                	</div>
							<div class="col-12 form-group">
								<label>Catatan</label>
								<textarea class="form-control" rows="2" placeholder="Masukkan catatan (jika file tidak valid)"></textarea>
							</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_validity">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>
		<div class="modal fade" id="proof-of-fc-slip-spp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Bukti Pembayaran SPP Terakhir</label>
		                		<select class="form-control text-dark" v-model="application.fc_slip_spp_status">
		                			<option value="1">Valid</option>
		                			<option value="2">Tidak Valid</option>
		                		</select>
		                	</div>
							<div class="col-12 form-group">
								<label>Catatan</label>
								<textarea class="form-control" rows="2" placeholder="Masukkan catatan (jika file tidak valid)"></textarea>
							</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_validity">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>
		<div class="modal fade" id="proof-of-persetuju-pem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Persetujuan Pembimbing</label>
		                		<select class="form-control text-dark" v-model="application.persetuju_pem_status">
		                			<option value="1">Valid</option>
		                			<option value="2">Tidak Valid</option>
		                		</select>
		                	</div>
							<div class="col-12 form-group">
								<label>Catatan</label>
								<textarea class="form-control" rows="2" placeholder="Masukkan catatan (jika file tidak valid)"></textarea>
							</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_validity">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>
		<div class="modal fade" id="proof-of-penguji-utama-1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Penguji Utama 1</label>
								<input type="text" class="form-control" v-model="application.proof_of_examiner">
		                	</div>
							<div class="col-12 form-group">
								<label>Catatan</label>
								<textarea class="form-control" rows="2" placeholder="Masukkan catatan (jika file tidak valid)"></textarea>
							</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_validity">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>
		<div class="modal fade" id="proof-of-penguji-kompr-1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Penguji 1 {{ prodi_mks[0].prodi_mk_name ?? "-" }}</label>
								<input type="text" class="form-control" v-model="application.proof_of_compr_examiner_1">
		                	</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_validity">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>
		<div class="modal fade" id="proof-of-penguji-kompr-2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Penguji 2 {{ prodi_mks[1].prodi_mk_name ?? "-" }}</label>
								<input type="text" class="form-control" v-model="application.proof_of_compr_examiner_2">
		                	</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_validity">Save changes</button>
		            </div>
		        </div>
		    </div>
		</div>
		<div class="modal fade" id="proof-of-penguji-kompr-3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                	<div class="col-12 form-group">
		                		<label>Penguji 3 {{ prodi_mks[2].prodi_mk_name ?? "-" }}</label>
								<input type="text" class="form-control" v-model="application.proof_of_compr_examiner_3">
		                	</div>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="update-validity-close btn btn-secondary" data-bs-dismiss="modal">Close</button>
		                <button type="button" class="btn btn-primary" v-on:click="update_validity">Save changes</button>
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
				prodi_mks : [],
	    		user: {},
    			page_mode : 1,
    			mode : "normal",
    			page_application : 1,
    			mahasiswa_baru : {},
    			endpoint_insert_application : "/f-panel/insert-application",
    			endpoint_read_single_application : "/f-panel/read-single-application",
    			endpoint_update_application : "/f-panel/update-application",
    			search_application : {},
    			application : {
					proof_of_sks: '',
    			},
    			selectedFile : null,
    		};
    	},
		methods:{
		    handleFileChange(event) {
		      this.selectedFile = event.target.files[0];
		    },
			getProofOfSksUrl() {
				if (this.application.proof_of_sks) {
					return '/storage/uploads/' + this.application.proof_of_sks;
				}
				return null;
			},
			update_validity(){
    			axios.post(this.endpoint_update_application, this.application)
    			.then(({data}) => {
					console.log(data);
    				this.fetch();
    				$(".update-validity-close").click();
    			});
			},
    		fetch(){
    			this.search_application.application_id = this.$route.params.id;
    			axios.post(this.endpoint_read_single_application, this.search_application)
    			.then(({data}) => {
					console.log(data);
    				this.application = data;
					if(data.user_detail.prodi){
						this.prodi_mks = data.user_detail.prodi.prodi_mks;
					}else{
						this.prodi_mks = [];
					}

    			});
    		},
		},
        mounted() {
        	this.user = window.authUser
        	this.fetch();
        }
    }
</script>
