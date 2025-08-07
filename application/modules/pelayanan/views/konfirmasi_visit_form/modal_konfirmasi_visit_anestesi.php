<style>
	.icon-confirm {
		text-align: center !important;
		font-size: 70pt;
		color: #c9dae1;
		padding-top: 10px;
	}

	.button-confirm-visit {
		text-align: center !important;
		/* padding-top: 10px; */
		margin-bottom: 15px;
	}

	.text-color-gray {
		color: #595959;
	}

	.color-button-grey {
		background-color: #a1a1a1;
		color: #ffff;
		border-color: #a1a1a1;
	}

	.color-button-grey:hover {
		background-color: #aaa;
		color: #ffff;
		border-color: #aaa;
	}

	/* .color-button-grey :hover {
	} */
</style>

<script>
	function simpanVisitAnestesi() {
		$.ajax({
			type: 'PUT',
			url: '<?= base_url('pelayanan/api/pelayanan/simpan_visit_anestesi') ?>',
			data: $('#form-visit-anestesi').serialize(),
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				if (data.status === false) {
					messageCustom(data.message, 'Error');
				} else {
					messageCustom(data.message, 'Success');
					$('#konfirmasi-visit-anestesi').modal('hide');
					getListPemeriksaan(1);
					KonfirmDetailPemeriksaan(0, $('#visit_id_pendaftaran').val(), $('#visit_id_layanan').val(), 1, $('#visit_bed').val());
				}

			},
			error: function(e) {
				messageCustom('Terjadi Kesalahan Sistem', 'Error');
			}
		})
	}
</script>

<!-- Modal -->
<div class="modal fade" id="konfirmasi-visit-anestesi" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="konfirmasi-visit-anestesi" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<h1 class="text-center icon-confirm"><i class="far fa-question-circle"></i></h1>
				<h1 class="text-center text-color-gray"><b>Konfirmasi</b></h1>
				<p class="text-center text-color-gray">Apakah Dokter ingin melakukan visit?</p><br>
				<?= form_open('', 'id=form-visit-anestesi class=form-horizontal') ?>
				<input type="hidden" id="id_layanan_pendaftaran_visit" name="id_layanan_pendaftaran_visit">
				<input type="hidden" id="id_dokter_visit" name="id_dokter_visit">
				<input type="hidden" id="visit_id_pendaftaran">
				<input type="hidden" id="visit_id_layanan">
				<input type="hidden" id="visit_bed">
				<?= form_close() ?>
				<div class="button-confirm-visit">
					<button type="button" class="btn color-button-grey" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Batal </button>
					<button type="button" class="btn btn-info" onclick="simpanVisitAnestesi()"><i class="fas fa-fw fa-save mr-1"></i>Ya! </button>
				</div>
			</div>
		</div>
	</div>
</div>