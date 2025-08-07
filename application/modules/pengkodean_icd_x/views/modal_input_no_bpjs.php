<!-- Modal input-bpjs -->
<div id="modal-input-bpjs" class="modal fade" role="dialog">
	<div class="modal-dialog" style="max-width: 650px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-input-bpjs-label">Input Nomor BPJS</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-input-bpjs role=form class=form-horizontal') ?>
				<input name="id" type="hidden" id="id-pendaftaran-input-bpjs" />
				<input name="id_layanan" type="hidden" id="id-layanan-input-bpjs" />

				<div class="form-group row tight">
					<label for="no-kartu-input-bpjs" class="col-3 col-form-label">No. Peserta BPJS</label>
					<div class="col">
						<input type="text" name="no_kartu" id="no-kartu-input-bpjs" class="form-control" value="">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="no-sep-input-bpjs" class="col-3 col-form-label">No. SEP</label>
					<div class="col">
						<input type="text" name="no_sep" id="no-sep-input-bpjs" class="form-control" value="">
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info waves-effect" id="simpan-input-bpjs"><i class="fas fa-save mr-1"></i>Simpan</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal input-bpjs -->


<script>
	$(function() {
		let id_noBpjs = $('#id-pendaftaran-input-bpjs').val();
		let id_layanan_noBpjs = $('#id-layanan-input-bpjs').val();

		$('#simpan-input-bpjs').click(function() {
			if ($('#no-kartu-input-bpjs').val() == "") {
				syams_validation('#no-kartu-input-bpjs', 'No. Peserta BPJS harus diisi...');
				return false;
			} else {
				syams_validation_remove('#no-kartu-input-bpjs');
			}

			if ($('#no-sep-input-bpjs').val() == "") {
				syams_validation('#no-sep-input-bpjs', 'No. SEP harus diisi...');
				return false;
			} else {
				syams_validation_remove('#no-sep-input-bpjs');
			}

			simpanInputNoBPJS(id_noBpjs, id_layanan_noBpjs);
		});


	});

	function inputNoBPJS(id, id_layanan) {
		$('#no-kartu-input-bpjs').val('')
		$('#no-sep-input-bpjs').val('')
		// resetFormEklaim();
		$('#id-pendaftaran-input-bpjs').val(id);
		$('#id-layanan-input-bpjs').val(id_layanan);

		$('#modal-input-bpjs').modal('show');
	}

	function simpanInputNoBPJS(id, id_layanan) {
		var id_pendaftaran = $('#id-pendaftaran-eclaim').val();
		var id_layanan_pendaftaran = $('#id-pendaftaran-eclaim').val();

		$.ajax({
			type: 'POST',
			url: '<?= base_url("pengkodean_icd_x/api/pengkodean_icd_x/simpan_input_nomor_peserta") ?>',
			data: $('#form-input-bpjs').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				getListDataKunjunganPasien($('#page-now-kunjungan-pasien').val());
				if (data.status) {
					messageCustom(data.message, 'Success');
					$('#modal-input-bpjs').modal('hide');

				} else {
					messageCustom(data.message, 'Error');
				}
			},
			complete: function(data) {
				hideLoader();
			},
			error: function(e) {
				messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
			}
		});
	}
</script>