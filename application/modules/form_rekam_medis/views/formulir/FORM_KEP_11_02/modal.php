<div class="modal fade" id="modal_edukasi_rm" role="dialog" data-backdrop="static" aria-labelledby="modal-resume-keperawatan-label" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width:95%">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title bold" id="modal_pengkajian_awal">FORM EPKT</h5>
					<h6 class="modal-title text-muted"><small>(Edukasi Pasien dan Keluarga Terintegrasi)</small></h6>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
            <div class="modal-body">
				<?= form_open('', 'id=form_edukasi_rm class=form-horizontal') ?>
				<input type="hidden" name="id_layanan_pendaftaran" id="edu_id_layanan_pendaftaran_rm">
				<input type="hidden" name="id" id="edu_id_rm">
				<!-- header -->
				<div class="row">
					<div class="col-lg-6">
						<div class="table-responsive">
							<table class="table table-sm table-striped">
								<tr>
									<td width="20%" class="bold">Nama Pasien</td>
									<td wdith="80%">: <span id="edu_pasien_nama_rm"></span></td>
								</tr>
								<tr>
									<td class="bold">Tanggal Lahir</td>
									<td>: <span id="edu_pasien_tanggal_lahir_rm"></span></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="table-responsive">
							<table class="table table-sm table-striped">
								<tr>
									<td width="30%" class="bold">No. RM</td>
									<td wdith="70%">: <span id="edu_pasien_no_rm_rm"></span></td>
								</tr>
								<tr>
									<td class="bold">Jenis Kelamin</td>
									<td>: <span id="edu_pasien_jenis_kelamin_rm"></span></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="col-lg-12">
						<h5 class="center"><b>FORMULIR EDUKASI PASIEN DAN KELUARGA TERINTEGRASI</b></h5>
						<table class="table table-sm table-striped table-no-border">
							<tr>
								<td colspan="3" class="bold td-dark">PERSIAPAN EDUKASI/BELAJAR</td>
							</tr>
							<tr>
								<td width="20%" class="bold"><span class="ml-4">Kesediaan Menerima Informasi</span></td>
								<td width="1%" class="bold">:</td>
								<td width="79%">
									<input type="radio" name="sedia_menerima_informasi" id="edu_sedia_menerima_informasi_ya_rm" value="1" class="disabled mr-1" checked><label for="edu_sedia_menerima_informasi_ya">Ya</label>
									<input type="radio" name="sedia_menerima_informasi" id="edu_sedia_menerima_informasi_tidak_rm" value="0" class="disabled mr-1 ml-3"><label for="edu_sedia_menerima_informasi_tidak">Tidak</label>
								</td>
							</tr>
							<tr>
								<td class="bold"><span class="ml-4">Bahasa</span></td>
								<td class="bold">:</td>
								<td>
									<input type="radio" name="bahasa" id="edu_bahasa_ind_rm" value="Indonesia" class="disabled mr-1" checked><label for="edu_bahasa_ind">Indonesia</label>
									<input type="radio" name="bahasa" id="edu_bahasa_ing_rm" value="Inggris" class="disabled mr-1 ml-3"><label for="edu_bahasa_ing">Inggris</label>
									<input type="radio" name="bahasa" id="edu_bahasa_lain_rm" value="Lain-lain" class="disabled mr-1 ml-3"><label for="edu_bahasa_lain">Lain-lain</label>

									<input type="text" name="bahasa_lain" id="edu_ket_bahasa_lain_rm" class="custom-form disabled-input col-lg-4 d-inline-block ml-3" placeholder="Masukkan Bahasa Lain" disabled>
									<input type="text" name="daerah" id="edu_daerah_rm" class="custom-form disabled-input col-lg-4 d-inline-block" placeholder="Masukkan Daerah">
								</td>
							</tr>
							<tr>
								<td class="bold"><span class="ml-4">Kebutuhan Penterjemah</span></td>
								<td class="bold">:</td>
								<td>
									<input type="radio" name="kebutuhan_penterjemah" id="edu_kebutuhan_penterjemah_ya_rm" value="1" class="disabled mr-1"><label for="edu_kebutuhan_penterjemah_ya">Ya</label>
									<input type="radio" name="kebutuhan_penterjemah" id="edu_kebutuhan_penterjemah_tidak_rm" value="0" class="disabled mr-1 ml-3" checked><label for="edu_kebutuhan_penterjemah_tidak">Tidak</label>
								</td>
							</tr>
							<tr>
								<td class="bold"><span class="ml-4">Pendidikan Pasien</span></td>
								<td class="bold">:</td>
								<td>
									<span id="edu_pendidikan_pasien_rm"></span>
								</td>
							</tr>
							<tr>
								<td class="bold"><span class="ml-4">Baca dan Tulis</span></td>
								<td class="bold">:</td>
								<td>
									<input type="radio" name="baca_tulis" id="edu_baca_tulis_baik_rm" value="Baik" class="disabled mr-1" checked><label for="edu_baca_tulis_baik">Baik</label>
									<input type="radio" name="baca_tulis" id="edu_baca_tulis_kurang_rm" value="Kurang" class="disabled mr-1 ml-3"><label for="edu_baca_tulis_kurang">Kurang</label>
								</td>
							</tr>
							<tr>
								<td class="bold"><span class="ml-4">Pilihan Tipe Pembelajaran</span></td>
								<td class="bold">:</td>
								<td>
									<input type="radio" name="tipe_belajar" id="edu_tipe_belajar_verbal_rm" value="Verbal" class="disabled mr-1" checked><label for="edu_tipe_belajar_verbal">Verbal</label>
									<input type="radio" name="tipe_belajar" id="edu_tipe_belajar_tulisan_rm" value="Tulisan" class="disabled mr-1 ml-3"><label for="edu_tipe_belajar_tulisan">Tulisan</label>
								</td>
							</tr>
							<tr>
								<td class="bold"><span class="ml-4">Hambatan Edukasi</span></td>
								<td class="bold">:</td>
								<td>
									<input type="radio" name="hambatan_edukasi" id="edu_hambatan_edukasi_tidak_ada_rm" value="Tidak Ada" class="disabled mr-1" checked><label for="edu_hambatan_edukasi_tidak_ada_rm">Tidak Ada</label>
									<input type="radio" name="hambatan_edukasi" id="edu_hambatan_edukasi_penglihatan_terganggu_rm" value="Penglihatan Terganggu" class="disabled mr-1 ml-3"><label for="edu_hambatan_edukasi_penglihatan_terganggu_rm">Penglihatan Terganggu</label>
									<input type="radio" name="hambatan_edukasi" id="edu_hambatan_edukasi_bahasa_rm" value="Bahasa" class="disabled mr-1 ml-3"><label for="edu_hambatan_edukasi_bahasa_rm">Bahasa</label>
									<input type="radio" name="hambatan_edukasi" id="edu_hambatan_edukasi_lain_rm" value="Lain-lain" class="disabled mr-1 ml-3"><label for="edu_hambatan_edukasi_lain_rm">Lain-lain</label>
									<input type="text" name="hambatan_edukasi_lain" id="edu_ket_hambatan_edukasi_lain_rm" class="custom-form disabled-input col-lg-4 d-inline-block ml-3" placeholder="Masukkan Hambatan Edukasi Lain" disabled>
								</td>
							</tr>
							<tr>
								<td colspan="3" class="bold td-dark">PERENCANAAN EDUKASI</td>
							</tr>
							<tr>
								<td colspan="3">
									<input type="checkbox" name="perencanaan_edukasi[]" value="Administrasi" class="perencanaan_edukasi mr-1">Administrasi
									<input type="checkbox" name="perencanaan_edukasi[]" value="Penyakit" class="perencanaan_edukasi mr-1 ml-3">Penyakit
									<input type="checkbox" name="perencanaan_edukasi[]" value="Penggunaan Obat" class="perencanaan_edukasi mr-1 ml-3">Penggunaan Obat
									<input type="checkbox" name="perencanaan_edukasi[]" value="Peralatan Medis" class="perencanaan_edukasi mr-1 ml-3">Peralatan Medis
									<input type="checkbox" name="perencanaan_edukasi[]" value="Diet/Gizi" class="perencanaan_edukasi mr-1 ml-3">Diet/Gizi
									<input type="checkbox" name="perencanaan_edukasi[]" value="Rehabilitasi Medik" class="perencanaan_edukasi mr-1 ml-3">Rehabilitasi Medik
									<input type="checkbox" name="perencanaan_edukasi[]" value="Pelayanan Spiritual" class="perencanaan_edukasi mr-1 ml-3">Pelayanan Spiritual
								</td>
							</tr>
							<tr>
								<td colspan="3"></td>
							</tr>
						</table>
						<table class="table table-striped table-sm">
							<tr>
								<td colspan="7" class="td-dark">ENTRI EDUKASI</td>
							</tr>
							<tr>
								<td class="bold">Topik Edukasi</td>
								<td class="bold">:</td>
								<td colspan="5"><input type="text" name="topik_edukasi" id="edu_topik_edukasi_rm" class="select2c-input"></td>
							</tr>
							<tr class="ket_topik_edukasi">
								<td class="bold"></td>
								<td class="bold"></td>
								<td colspan="5">
									<span class="bold" style="font-style:oblique" id="edu_label_ket_topik_edukasi_rm"></span>
									<span class="text_input_ket_topik_edukasi"><input type="text" name="ket_topik_edukasi" id="edu_ket_topik_edukasi_rm" class="custom-form col-lg-6 ml-2 d-inline-block"></span>
								</td>
							</tr>
							<tr>
								<td width="20%" class="bold">Tanggal Edukasi</td>
								<td width="1%" class="bold">:</td>
								<td width="24%"><input type="text" name="tanggal_edukasi" id="edu_tanggal_edukasi_rm" class="custom-form col-lg-4 valid-input" value="<?= date('d/m/Y') ?>"></td>
								<td width="3%"></td>
								<td width="15%" class="bold">Tingkat Pemahaman Awal</td>
								<td width="1%" class="bold">:</td>
								<td width="36%">
									<input type="radio" name="tingkat_pemahaman_awal" id="edu_tingkat_pemahaman_awal_1_rm" value="Hal Baru" class="mr-1"><label for="edu_tingkat_pemahaman_awal_1_rm">Hal Baru</label>
									<input type="radio" name="tingkat_pemahaman_awal" id="edu_tingkat_pemahaman_awal_2_rm" value="Edukasi Ulang" class="mr-1 ml-3"><label for="edu_tingkat_pemahaman_awal_2_rm">Edukasi Ulang</label>
								</td>
							</tr>
							<tr>
								<td class="bold">Nama Sasaran Edukasi</td>
								<td class="bold">:</td>
								<td>
									<input type="text" name="nama_keluarga" id="edu_nama_keluarga_rm" class="custom-form col-lg valid-input" placeholder="Masukkan Nama Sasaran Edukasi">
								</td>
								<td></td>
								<td class="bold">Metoda Edukasi</td>
								<td class="bold">:</td>
								<td>
									<input type="radio" name="metoda_edukasi" id="edu_metoda_edukasi_1_rm" value="Lisan" class="mr-1"><label for="edu_metoda_edukasi_1_rm">Lisan</label>
									<input type="radio" name="metoda_edukasi" id="edu_metoda_edukasi_2_rm" value="Demonstrasi" class="mr-1 ml-3"><label for="edu_metoda_edukasi_2_rm">Demonstrasi</label>
								</td>
							</tr>
							<tr>
								<td class="bold">Status Hubungan dg Pasien</td>
								<td class="bold">:</td>
								<td><input type="text" name="status_hubungan" id="edu_status_hubungan_rm" class="custom-form col-lg valid-input" placeholder="Masukkan Status Hubungan dengan Pasien"></td>
								<td></td>
								<td class="bold">Media Edukasi</td>
								<td class="bold">:</td>
								<td>
									<input type="radio" name="media_edukasi" id="edu_media_edukasi_1_rm" value="Leaflet" class="mr-1"><label for="edu_media_edukasi_1_rm">Leaflet</label>
									<input type="radio" name="media_edukasi" id="edu_media_edukasi_2_rm" value="Boklet" class="mr-1 ml-2"><label for="edu_media_edukasi_2_rm">Boklet</label>
									<input type="radio" name="media_edukasi" id="edu_media_edukasi_3_rm" value="Lembar Balik" class="mr-1 ml-2"><label for="edu_media_edukasi_3_rm">Lembar Balik</label>
									<input type="radio" name="media_edukasi" id="edu_media_edukasi_4_rm" value="Audio Visual" class="mr-1 ml-2"><label for="edu_media_edukasi_4_rm">Audio Visual</label>
									<input type="radio" name="media_edukasi" id="edu_media_edukasi_5_rm" value="Non Media" class="mr-1 ml-2"><label for="edu_media_edukasi_5_rm">Non Media</label>
								</td>
							</tr>
							<tr>
								<td class="bold">Edukator</td>
								<td class="bold">:</td>
								<td><input type="text" name="edukator" id="edu_edukator_rm" class="select2c-input"></td>
								<td></td>
								<td class="bold">Evaluasi</td>
								<td class="bold">:</td>
								<td>
									<input type="radio" name="evaluasi" id="edu_evaluasi_1_rm" value="Sudah Mengerti" class="mr-1"><label for="edu_evaluasi_1_rm">Sudah Mengerti</label>
									<input type="radio" name="evaluasi" id="edu_evaluasi_2_rm" value="Re-Demonstrasi" class="mr-1 ml-2"><label for="edu_evaluasi_2_rm">Re-Demonstrasi</label>
									<input type="radio" name="evaluasi" id="edu_evaluasi_3_rm" value="Re-Edukasi" class="mr-1 ml-2"><label for="edu_evaluasi_3_rm">Re-Edukasi</label>
								</td>
							</tr>
							<tr>
								<td colspan="3"></td>
								<td></td>
								<td class="bold">Tanggal Re-Edukasi</td>
								<td class="bold">:</td>
								<td>
									<input type="text" name="tanggal_re_edukasi" id="edu_tanggal_re_edukasi_rm" class="custom-form col-lg-4 valid-input">
								</td>
							</tr>
							<tr>
								<td class="bold">Tanda Tangan Keluarga/Pasien</td>
								<td class="bold">:</td>
								<td>
									<div>
										<canvas id="signature-pasien-rm" name="signature_pasien" width="300" height="200" disabled style="background-color: white; border: 1px solid black;"></canvas>
									</div>
									<button id="clear-signature-pasien-rm" class="btn btn-info" type="button">Hapus Tanda Tangan</button>
								</td>
								<td></td>
								<td class="bold">Tanda Tangan Edukator</td>
								<td class="bold">:</td>
								<td>
									<div>
										<canvas id="signature-edukator-rm" name="signature_edukator" width="300" height="200" disabled style="background-color: white; border: 1px solid black;"></canvas>
									</div>
									<button id="clear-signature-edukator-rm" class="btn btn-info" type="button">Hapus Tanda Tangan</button>
								</td>
							</tr>
							<tr>
								<td colspan="3">
									<button type="button" class="btn btn-info btn-xs" onclick="addEdukasi()"><i class="fas fa-fw fa-arrow-circle-down mr-1"></i>Tambahkan Edukasi</button>
									<button type="button" class="btn btn-success btn-xs" id="btn_print_edu_rm"><i class="fas fa-fw fa-print mr-1"></i>Print Form Edukasi</button>
								</td>
								<td></td>
							</tr>
						</table>

						<div class="table-responsive">
							<table class="table table-bordered table-striped table-sm color-table info-table" id="table_edukasi_rm">
								<thead>
									<tr>
										<th class="bold center" rowspan="2" width="3%"></th>
										<th class="bold center" rowspan="2" width="25%">Kebutuhan Edukasi<br>Topik Edukasi</th>
										<th class="bold center" rowspan="2" width="10%">Tanggal Edukasi</th>
										<th class="bold center" colspan="2">Sasaran Edukasi</th>
										<th class="bold center" colspan="2">Edukator</th>
										<th class="bold center" rowspan="2" width="10%">Tingkat Pemahaman Awal</th>
										<th class="bold center" rowspan="2" width="10%">Metoda Edukasi</th>
										<th class="bold center" rowspan="2" width="10%">Media Edukasi</th>
										<th class="bold center" rowspan="2" width="10%">Evaluasi</th>
										<th class="bold center" rowspan="2" width="10%">Tanggal Re-Edukasi</th>
										<th class="bold center" rowspan="2" width="5%"></th>
									</tr>
									<tr>
										<th class="bold center" width="10%">Nama & Hubungan dengan Pasien</th>
										<th class="bold center" width="10%">TTD</th>
										<th class="bold center" width="10%">Nama</th>
										<th class="bold center" width="10%">TTD</th>
									</tr>
								</thead>
								<tbody></tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- end header -->
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
				<button id="btn-simpan" type="button" class="btn btn-info" onclick="simpanEdukasiRm()"><span id="btn_edukasi"><i class="fas fa-fw fa-save mr-1"></i>Simpan</span></button>
			</div>
		</div>
	</div>
</div>