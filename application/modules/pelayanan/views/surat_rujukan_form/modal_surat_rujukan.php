<script>
	function pembuatanSuratRujukan(id_pendaftaran, id_layanan_pendaftaran, nama_dokter = '') {
		$('[name="id_pendaftaran"]').val(id_pendaftaran);
		$('[name="id_layanan_pendaftaran"]').val(id_layanan_pendaftaran);
		$('[name="dokter"]').val(nama_dokter);

		$('#modal_surat_rujukan').modal('show');
	}

	function cetakSuratRujukan() {
		window.open('<?php echo base_url("pelayanan/printing_surat_rujukan") ?>?' + $('#form_surat_rujukan').serialize(),'Cetak Surat Rujukan','width='+dWidth+', height='+dHeight+', left='+x+',top='+y);
	}

</script>

<!-- Modal -->
<div class="modal fade" id="modal_surat_rujukan">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">PEMBUATAN SURAT RUJUKAN</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form_surat_rujukan class=form-horizontal') ?>
				<input type="hidden" name="id_pendaftaran">
				<input type="hidden" name="id_layanan_pendaftaran">
				<div class="form-group row tight">
					<label class="col-lg-3 col-label-form">Dokter</label>
					<div class="col-lg-9">
						<input type="text" name="dokter" class="form-control" placeholder="Nama dokter yang dituju">
					</div>
				</div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Batal</button>
				<button type="button" class="btn btn-success" onclick="cetakSuratRujukan()"><i class="fas fa-fw fa-print mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>