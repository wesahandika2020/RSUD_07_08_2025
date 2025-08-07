<script>
	function tambahDPJPUtama() {
		let i = $('.dpjp-utama').length;
		let html = /* html */ `
			<div id="dinamic1${i}" style="vertical-align:middle !important" class="dinamic1 nadis dpjp-utama">
				<input type="text" name="dpjp_utama[]" id="dpjp-utama${i}" class="mb-2">
				<button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeDPJPUtama(${i})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
			</div>
		`;

		if (i > 3) return;

		$('#dpjp-utama').append(html)
		$('#dpjp-utama' + i).select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function (term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						jenis: '1',
						page: page, // page number
					};
				},
				results: function (data, page) {
					var more = (page * 20) < data.total; // whether or not there are more results available

					// notice we return the value of more so Select2 knows if more results can be loaded
					return {results: data.data, more: more};
				}
			},
			formatResult: function (data) {
				var markup = '<b>' + data.nama + '</b> <br/>' + data.spesialisasi;
				return markup;
			},
			formatSelection: function (data) {
				return data.nama;
			}
		})
	}

	function removeDPJPUtama(i) {
		$('#dinamic1' + i).remove()
		var jml = $('.dpjp-utama').length;
		var urut = 0;
		for (j = 0; j <= jml - 1; j++) {
			$('.dinamic1:eq(' + urut + ')').attr('id', 'dinamic1' + j)
			$('.dinamic1:eq(' + urut + ')').children('.dpjap-utama').attr('id', 'dpjp-utama' + j)
			$('.dinamic1:eq(' + urut + ')').children('button').attr('onclick', 'removeDPJPUtama(' + j + ')')
			urut++;
		}
	}

	function tambahDPJPTambahan() {
		let i = $('.dpjp-tambahan').length;
		let html = /* html */ `
			<div id="dinamic2${i}" style="vertical-align:middle !important" class="dinamic2 nadis dpjp-tambahan">
				<input type="text" name="dpjp_tambahan[]" id="dpjp-tambahan${i}" class="mb-2">
				<button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeDPJPTambahan(${i})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
			</div>
		`;

		if (i > 3) return;

		$('#dpjp-tambahan').append(html)
		$('#dpjp-tambahan' + i).select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function (term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						jenis: '1',
						page: page, // page number
					};
				},
				results: function (data, page) {
					var more = (page * 20) < data.total; // whether or not there are more results available

					// notice we return the value of more so Select2 knows if more results can be loaded
					return {results: data.data, more: more};
				}
			},
			formatResult: function (data) {
				var markup = '<b>' + data.nama + '</b> <br/>' + data.spesialisasi;
				return markup;
			},
			formatSelection: function (data) {
				return data.nama;
			}
		})
	}

	function removeDPJPTambahan(i) {
		$('#dinamic2' + i).remove()
		var jml = $('.dpjp-tambahan').length;
		var urut = 0;
		for (j = 0; j <= jml - 1; j++) {
			$('.dinamic2:eq(' + urut + ')').attr('id', 'dinamic2' + j)
			$('.dinamic2:eq(' + urut + ')').children('.dpjap-utama').attr('id', 'dpjp-tambahan' + j)
			$('.dinamic2:eq(' + urut + ')').children('button').attr('onclick', 'removeDPJPTambahan(' + j + ')')
			urut++;
		}
	}

	function tambahTglAlihRawat() {
		let i = $('.tgl-alih-rawat').length;
		let html = /* html */ `
			<div id="dinamic3${i}" style="display: flex; gap: 1rem;" class="dinamic3 nadis tgl-alih-rawat">
				<input type="text" name="tgl_alih_rawat[]" id="tgl-alih-rawat${i}" class="mb-2 custom-form col-lg-3">
				<button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeTglAlihRawat(${i})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
			</div>
		`;

		if (i > 3) return;

		$('#tgl-alih-rawat').append(html)
		$('#tgl-alih-rawat' + i).val('<?= date('d/m/Y') ?>');
		$('#tgl-alih-rawat' + i).datepicker({
			format: 'dd/mm/yyyy',
			endDate: new Date(),
		}).on('changeDate', function () {
			$(this).datepicker('hide')
		});
	}

	function removeTglAlihRawat(i) {
		$('#dinamic3' + i).remove()
		var jml = $('.tgl-alih-rawat').length;
		var urut = 0;
		for (j = 0; j <= jml - 1; j++) {
			$('.dinamic3:eq(' + urut + ')').attr('id', 'dinamic3' + j)
			$('.dinamic3:eq(' + urut + ')').children('.dpjap-utama').attr('id', 'tgl-alih-rawat' + j)
			$('.dinamic3:eq(' + urut + ')').children('button').attr('onclick', 'removeTglAlihRawat(' + j + ')')
			urut++;
		}
	}

	function simpanRingkasanRiwayatMasukDanKeluar() {
		var id = $('#id-layanan-pendaftaran-form-mrrmdk').val();

		$.ajax({
			type: 'POST',
			url: '<?= base_url( "pendaftaran_poli/api/pendaftaran_poli/simpan_ringkasan_riwayat_masuk_dan_keluar" ) ?>',
			data: $('#form-cetak-ringkasan-eiwaayt-masuk-dan-keluar').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function () {
				showLoader();
			},
			success: function (data) {
				if (data.status) {
					messageCustom(data.message, 'Success');

					var dWidth = $(window).width();
					var dHeight = $(window).height();
					var x = screen.width / 2 - dWidth / 2;
					var y = screen.height / 2 - dHeight / 2;

					$('#modal-persetujuan-tindakan-operasi').modal('hide');

					window.open('<?= base_url( 'pendaftaran_poli/cetak_ringkasan_riwayat_masuk_dan_keluar/' ) ?>' + id, 'Cetak Ringkasan Riwayat Masuk dan Keluar', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
				} else {
					messageCustom(data.message, 'Error');
				}
			},
			complete: function (data) {
				hideLoader();
			},
			error: function (e) {
				messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
			}
		});
	}
</script>

<!-- Modal Cetak Ringkasan Riwayat Masuk dan Keluar -->
<div id="modal-cetak-ringkasan-riwayat-masuk-dan-keluar" class="modal fade" role="dialog"
	 aria-labelledby="modal-cetak-ringkasan-riwayat-masuk-dan-keluar_label" aria-hidden="true">
	<div class="modal-dialog" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-cetak-ringkasan-riwayat-masuk-dan-keluar-label"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-cetak-ringkasan-eiwaayt-masuk-dan-keluar class="form-horizontal"') ?>
				<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-form-mrrmdk">

				<div class="row">
					<div class="col-lg-12">
						<div class="widget-body">
							<div id="wizard_form_ranap">
								<div class="form-cetak-ringkasan-eiwaayt-masuk-dan-keluar">

									<table class="table table-no-border table-sm table-striped">
										<tr>
											<td class="bold">Indikasi masuk Rawat Inap</td>
											<td>
												<input type="text" name="indikasi" class="custom-form" id="indikasi">
											</td>
										</tr>
										<tr>
											<td class="bold">Keterangan Khusus (Bila ada)</td>
											<td>
												<textarea name="keterangan_khusus" id="keterangan-khusus" class="form-control reset-field" placeholder="Keterangan"></textarea>
											</td>
										</tr>
										<tr>
											<td class="bold">DPJP Utama</td>
											<td class="bold">DPJP Tambahan</td>
										</tr>
										<tr>
											<td>
												<div id="dpjp-utama"></div>
												<div id="dpjp-utama-hide" style="display:none"></div>
												<button type="button" class="btn btn-info btn-xs" onclick="tambahDPJPUtama()"><i class="fas fa-plus-circle mr-1"></i>Tambah DPJP Utama</button>
											</td>
											<td>
												<div id="dpjp-tambahan"></div>
												<div id="dpjp-tambahan-hide" style="display:none"></div>
												<button type="button" class="btn btn-info btn-xs" onclick="tambahDPJPTambahan()"><i class="fas fa-plus-circle mr-1"></i>Tambah DPJP Tambahan</button>
											</td>
										</tr>
										<tr>
											<td class="bold">Tanggal Alih Rawat</td>
											<td></td>
										</tr>
										<tr>
											<td>
												<div id="tgl-alih-rawat"></div>
												<div id="tgl-alih-rawat-hide" style="display:none"></div>
												<button type="button" class="btn btn-info btn-xs" onclick="tambahTglAlihRawat()"><i class="fas fa-plus-circle mr-1"></i>Tambah Tanggal Alih Rawat
												</button>
											</td>
											<td></td>
										</tr>
									</table>

								</div>
							</div>
						</div>
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i
							class="fas fa-window-close"></i> Keluar
				</button>
				<button type="button" class="btn btn-info" onclick="simpanRingkasanRiwayatMasukDanKeluar()" id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Cetak Ringkasan Riwayat Masuk dan Keluar -->
