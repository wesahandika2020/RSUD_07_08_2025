<script>
	$(function() {
		// $('[name="tanggal_kontrol"]').datepicker({
		// 	format: 'dd/mm/yyyy',
		// 	startDate: new Date()
		// }).on('changeDate', function() {
		// 	$(this).datepicker('hide');
		// });

		$('[name="poli_auto"]').select2({
			width: '100%',
			placeholder: 'Pilih Poli Tujuan',
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/spesialisasi_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
					};
				},
				results: function(data, page) {
					var more = (page * 20) < data.total; // whether or not there are more results available

					// notice we return the value of more so Select2 knows if more results can be loaded
					return {
						results: data.data,
						more: more
					};
				}
			},
			formatResult: function(data) {
				var kode = '';
				if (data.kode !== '') {
					kode = '<b>' + data.kode + '</b> - ';
				};
				var markup = kode + data.nama;
				return markup;
			},
			formatSelection: function(data) {
				return data.nama;
			}
		});
	})

	function pembuatanSuratKontrol(id_pendaftaran, id_layanan_pendaftaran) {
		$('[name="id_pendaftaran"]').val(id_pendaftaran);
		$('[name="id_layanan_pendaftaran"]').val(id_layanan_pendaftaran);
		$('[name="poli_auto"]').select2("readonly", false);
		$('#btn_cetak_surat_kontrol').hide();
		$('#btn_simpan_surat_kontrol').show();

		getJadwalDokter(id_layanan_pendaftaran)

		$.ajax({
			type: 'GET',
			url: '<?= base_url("intensive_care/api/intensive_care/get_surat_kontrol") ?>/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				if (data.surat !== null) {
					$('[name="id_surat_kontrol"]').val(data.surat.id);
					$('[name="tanggal_kontrol"]').val(datefmysql(data.surat.tanggal)).attr('readonly', true);
					if (data.surat.id_spesialisasi !== null) {
						$('[name="poli_auto"]').val(data.surat.id_spesialisasi);
						$('#s2id_poli_auto a .select2-chosen').html(data.surat.poli);

						$('[name="poli_auto"]').select2("readonly", true);
					}

					$('#btn_cetak_surat_kontrol').show();
					$('#btn_cetak_surat_kontrol').attr('onclick', 'cetakSuratKontrol(' + data.surat.id + ', ' + data.surat.id_pendaftaran + ', ' + data.surat.id_layanan_pendaftaran + ')');
					$('#btn_simpan_surat_kontrol').hide();
				}

				$('#modal_surat_kontrol').modal('show');
			},
			error: function(e) {
				accessFailed(e.status);
			}
		})
	}

	function getJadwalDokter(id_layanan_pendaftaran) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("intensive_care/api/intensive_care/get_jadwal_dokter") ?>/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				if (data.jadwal_dokter.length > 0) {
					$('input[name="tanggal_kontrol"]').val(datefmysql(data.jadwal_dokter[0]))
					$('[name="tanggal_kontrol"]').datepicker({
						format: 'dd/mm/yyyy',
						beforeShowDay: function(date) {
							const year = date.toLocaleString('default', {
								year: 'numeric',
							})
							const month = date.toLocaleString('default', {
								month: '2-digit',
							})
							const day = date.toLocaleString('default', {
								day: '2-digit',
							})
							const ymd = year + '-' + month + '-' + day

							if ($.inArray(ymd, data.jadwal_dokter) !== -1) {
								return {
									enabled: true,
								}
							} else {
								return {
									enabled: false,
								}
							}
						},
						daysOfWeekDisabled: [0],
					}).on('changeDate', function() {
						$(this).datepicker('hide')
					})
				} else {
					swalAlert('info', 'Info', 'Jadwal dokter tidak ditemukan. Silahkan hubungi Pelayanan Medik untuk segera mengisi jadwal')
				}

				if (data.poli_dokter !== null) {
					$('#poli_auto').val(data.poli_dokter.id)
					$('#s2id_poli_auto a .select2-chosen').val(data.poli_dokter.nama)
				}
			},
			error: function(e) {
				accessFailed(e.status)
			},
		})
	}

	function simpanSuratKontrol() {
		if ($('[name="tanggal_kontrol"]').val() === '') {
			syams_validation('[name="tanggal_kontrol"]', 'Kolom tanggal kontrol wajib diisi.');
			return false;
		}
		if ($('[name="poli_auto"]').val() === '') {
			syams_validation('[name="poli_auto"]', 'Silahkan pilih poli yang dituju.');
			return false;
		}

		$.ajax({
			type: 'POST',
			url: '<?= base_url("rawat_inap/api/rawat_inap/simpan_surat_kontrol") ?>',
			data: $('#form_surat_kontrol').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				if (data.status === false) {
					messageCustom(data.message, 'Error');
				} else {
					messageCustom(data.message, 'Success');
					$('#modal_surat_kontrol').modal('hide');
				}
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				messageCustom('Terjadi Kesalahan, Gagal menyimpan data.', 'Error');
			}
		});
	}

	function cetakSuratKontrol(id, id_pendaftaran, id_layanan_pendaftaran) {
		window.open('<?= base_url() ?>rawat_inap/printing_surat_kontrol?id=' + id + '&id_pendaftaran=' + id_pendaftaran + '&id_layanan_pendaftaran=' + id_layanan_pendaftaran, 'Cetak Surat Kontrol', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}
</script>
<!-- Modal -->
<div class="modal fade" id="modal_surat_kontrol" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">PEMBUATAN SURAT KONTROL</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form_surat_kontrol class=form-horizontal') ?>
				<input type="hidden" name="id_pendaftaran">
				<input type="hidden" name="id_surat_kontrol">
				<input type="hidden" name="id_layanan_pendaftaran">
				<div class="form-group row tight">
					<label class="col-lg-3 col-form-label">Tanggal</label>
					<div class="col-lg-6">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-fw fa-calendar-alt"></i></span>
							</div>
							<input type="text" class="form-control" name="tanggal_kontrol">
						</div>
					</div>
				</div>
				<div class="form-group row tight">
					<label class="col-lg-3 col-form-label">Poli Yang Dituju</label>
					<div class="col-lg-9">
						<input type="text" name="poli_auto" id="poli_auto" class="select2-input">
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Batal</button>
				<button type="button" class="btn btn-success" id="btn_cetak_surat_kontrol"><i class="fas fa-fw fa-print mr-1"></i>Print Surat</button>
				<button type="button" class="btn btn-info" id="btn_simpan_surat_kontrol" onclick="simpanSuratKontrol()"><i class="fas fa-fw fa-save mr-1"></i>Simpan</button>
			</div>
		</div>
	</div>
</div>