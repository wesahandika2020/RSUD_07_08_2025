<!-- Modal -->
<div class="modal fade" id="modal-perioperatif-pra" data-backdrop="static">
	<div class="modal-dialog" style="min-width:80%">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title bold">FORM CATATAN KEPERAWATAN PRA OPERATIF</h5>
					<h6 class="modal-title text-muted"><small><em>Pre-operative nursing record (Diisi oleh perawat ruangan)</small></em></h6>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php echo form_open('', 'id=form-perioperatif class=form-horizontal') ?>
				<input type="hidden" name="id_jadwal_operasi">
				<div class="table-responsive">
					<table class="table table-sm table-striped">
						<tr>
							<td class="center" colspan="9"><b>DIISI OLEH PERAWAT RUANGAN</b></td>
						</tr>
						<tr>
							<td class="center" colspan="9"></td>
						</tr>
						<tr>
							<td width="20%" style="vertical-align:middle">1. Tanda Tanda Vital</td>
							<td width="1%" style="vertical-align:middle">:</td>
							<td width="11%">
								Suhu : <input type="text" name="suhu" id="po_suhu" class="custom-form center clear-input d-inline-block" placeholder="..." onkeypress="return hanyaAngka(event)" style="width:50px">
							</td>
							<td width="11%">
								Nadi : <input type="text" name="nadi" id="po_nadi" class="custom-form center clear-input d-inline-block" placeholder="..." onkeypress="return hanyaAngka(event)" style="width:50px">
							</td>
							<td width="11%">
								RR : <input type="text" name="rr" id="po_rr" class="custom-form center clear-input d-inline-block" placeholder="..." onkeypress="return hanyaAngka(event)" style="width:50px">
							</td>
							<td width="11%">
								TD : <input type="text" name="nadi" id="po_nadi" class="custom-form center clear-input d-inline-block" placeholder="..." onkeypress="return hanyaAngka(event)" style="width:50px">
							</td>
							<td width="11%">
								Nyeri : <input type="text" name="nyeri" id="po_nyeri" class="custom-form center clear-input d-inline-block" placeholder="..." onkeypress="return hanyaAngka(event)" style="width:50px">
							</td>
							<td width="11%">
								BB : <input type="text" name="bb" id="po_bb" class="custom-form center clear-input d-inline-block" placeholder="..." onkeypress="return hanyaAngka(event)" style="width:50px">
							</td>
							<td width="11%">
								TB : <input type="text" name="tb" id="po_tb" class="custom-form center clear-input d-inline-block" placeholder="..." onkeypress="return hanyaAngka(event)" style="width:50px">
							</td>
						</tr>
						<tr>
							<td>2. Status Mentel</td>
							<td>:</td>
							<td colspan="7">
								<input type="checkbox" name="composmentis" id="po_composmentis" value="1" class="mr-1">Composmentis
								<input type="checkbox" name="apatis" id="po_apatis" value="1" class="mr-1 ml-3">Apatis
								<input type="checkbox" name="samnolen" id="po_samnolen" value="1" class="mr-1 ml-3">Samnolen
								<input type="checkbox" name="sopor" id="po_sopor" value="1" class="mr-1 ml-3">Sopor
								<input type="checkbox" name="koma" id="po_koma" value="1" class="mr-1 ml-3">Koma
							</td>
						</tr>
						<tr>
							<td>3. Riwayat Penyakit</td>
							<td>:</td>
							<td colspan="7">
								<input type="radio" name="riwayat_penyakit" value="0" class="mr-1" checked>Tidak
								<input type="radio" name="riwayat_penyakit" value="1" class="mr-1 ml-3">Ya,
								<input type="checkbox" name="rp_asma" id="rp_asma" value="1" class="mr-1 ml-3">asma
								<input type="checkbox" name="dm" id="rp_dm" value="1" class="mr-1 ml-3">DM
								<input type="checkbox" name="cardiovascular" id="rp_cardiovascular" value="1" class="mr-1 ml-3">Cardiovascular
								<input type="checkbox" name="kanker" id="rp_kanker" value="1" class="mr-1 ml-3">Kanker
								<input type="checkbox" name="thalasemia" id="rp_thalasemia" value="1" class="mr-1 ml-3">Thalasemia
								<input type="checkbox" name="rp_lain" id="rp_lain" value="1" class="mr-1 ml-3">Lain-lain
								<input type="text" name="ket_lain" id="rpt_lain_input" class="custom-form clear-input d-inline-block col-lg-3 disabled" placeholder="Masukkan Riwayat Penyakit">
							</td>
						</tr>
						<tr>
							<td>4. Pengobatan Saat Ini</td>
							<td>:</td>
							<td colspan="7"><input type="text" name="pengobatan_now" id="pengobatan_now" class="custom-form col-lg-6 clear-input d-inline-block" placeholder="..."></td>
						</tr>
						<tr>
							<td>5. Operasi Sebelumnya</td>
							<td>:</td>
							<td colspan="7"><input type="text" name="operasi_before" id="operasi_before" class="custom-form col-lg-6 clear-input d-inline-block" placeholder="..."></td>
						</tr>
						<tr>
							<td>6. Alergi</td>
							<td>:</td>
							<td colspan="7">
								<input type="radio" name="alergi" value="0" class="mr-1" checked>Tidak
								<input type="radio" name="alergi" value="1" class="mr-1 ml-3">Ya,
								<span class="mr-2">Sebutkan</span><input type="text" name="ket_alergi" id="ket_alergi" class="custom-form col-lg-4 clear-input d-inline-block" disabled placeholder="...">
								<span class="mr-2 ml-3">Reaksi</span><input type="text" name="ket_alergi_reaksi" id="ket_alergi_reaksi" class="custom-form col-lg-4 clear-input d-inline-block" disabled placeholder="...">
							</td>
						</tr>
					</table>
				</div>
				<?php echo form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
				<button type="button" class="btn btn-info"><i class="fas fa-save mr-1"></i>Simpan</button>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('pelayanan/perioperatif_form/js') ?>