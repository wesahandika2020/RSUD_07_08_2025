<script>
	function showExpertiseTemplate() {
		$('#table-expertise tbody').empty();
		let id_layanan = $('#id-layanan-radiologi').val();
		let id_dokter_penanggung_jawab = $('#dokter-auto').val();
		$.ajax({
			type: 'GET',
			url: '<?= base_url("expertise/api/expertise/get_template_expertise") ?>',
			data: 'id_layanan=' + id_layanan + '&id_dokter=' + id_dokter_penanggung_jawab,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				$.each(data, function(i, v) {
					let html = /* html */ `
						<tr>
							<td class="center">${i + 1}</td>
							<td>${v.layanan}</td>
							<td>${v.dokter}</td>
							<td>${v.keterangan}</td>
							<td>${v.expertise}</td>
							<td class="right aksi">
								<button type="button" class="btn btn-secondary btn-xs" onclick="selectExpertise(${v.id})"><i class="fas fa-check-circle mr-1"></i>Pilih</button>
							</td>
						</tr>
					`;

					$('#table-expertise tbody').append(html);
				});

				$('#modal-expertise').modal('show');
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				swalAlert('error', e.status, e.statusText);
			},
		});
	}

	function selectExpertise(id) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("expertise/api/expertise/get_expertise_by_id") ?>/id/' + id,
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				$('#hasil-field').summernote('code', data.data.expertise);
				$('#modal-expertise').modal('hide');
			},
		});
	}

	function konfirmasiSimpanExpertise() {
		bootbox.dialog({
			message: /* html */ `
				<div class="row">
					<div class="col-lg-12">
						<form class="form-horizontal" id="form-simpan-expertise">
							<div class="form-group row tight">
								<label class="col-lg-3 col-form-label">Keterangan</label>
								<div class="col-lg-9">
									<input name="keterangan_expertise" id="keterangan-expertise" class="form-control" placeholder="Keterangan">
								</div>
							</div>
						</form>
					</div>
				</div>
			`,
			title: "Simpan Expertise",
			buttons: {
				batal: {
					label: '<i class="fas fa-times-circle mr-1"></i>Batal',
					className: "btn-secondary",
					callback: function() {}
				},
				simpan: {
					label: '<i class="fas fa-save mr-1"></i>Simpan',
					className: "btn-info",
					callback: function() {
						let keterangan = $('#keterangan-expertise').val();
						simpanExpertise(keterangan);
					}
				}
			}
		});
	}

	function simpanExpertise(keterangan) {
		let expertise = $('#hasil-field').summernote('code');
		let id_layanan = $('#id-layanan-radiologi').val();
		let id_dokter_penanggung_jawab = $('#dokter-auto').val();

		if ((id_layanan !== '') | (id_dokter_penanggung_jawab !== '')) {
			$.ajax({
				type: 'POST',
				url: '<?= base_url("expertise/api/expertise/simpan_data_expertise") ?>',
				data: "layanan=" + id_layanan + "&dokter=" + id_dokter_penanggung_jawab + "&expertise=" + expertise + "&keterangan=" + keterangan,
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if (data.status === false) {
						messageAddFailed();
					} else {
						messageAddSuccess();
					}
				},
				complete: function() {
					hideLoader()
				},
				error: function(e) {
					swalAlert('error', e.status, e.statusText);
				},
			});
		} else {
			swalAlert('error', 'Error', 'Terjadi Kesalahan simpan expertise');
		}
	}
	
</script>

<div id="modal-expertise" class="modal fade modal-scroll">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width:70%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Template Expertise</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			</div>
			<div class="modal-body">
				<table class="table table-sm table-striped table-hover color-table info-table" id="table-expertise">
					<thead>
						<tr>
							<th width="5%" class="center">No.</th>
							<th width="20%">Nama Layanan</th>
							<th width="20%">Dokter</th>
							<th width="10%">Keterangan</th>
							<th width="40%">Expertise</th>
							<th width="5%"></th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
			</div>
		</div>
	</div>
</div>