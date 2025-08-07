<div id="modal-ubah-cara-bayar" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width:500px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-search-label">Ubah Cara Bayar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-ubah-cara-bayar role=form class=form-horizontal') ?>
                <div class="form-group row tight">
                    <label for="cara-bayar" class="col-md-3 col-form-label">Cara Bayar</label>
                    <div class="col-md-9">
						<?= form_dropdown('cara_bayar', $cara_bayar, array(), 'id=cara-bayar class=form-control') ?>
                    </div>
				</div>
				<div class="form-group row tight penjamin-group">
                    <label for="penjamin" class="col-md-3 col-form-label">Penjamin</label>
                    <div class="col-md-9">
                        <input type="text" name="penjamin" id="penjamin" class="selecr2-input" placeholder="Pilih Penjamin">
                    </div>
                </div>
				<div class="form-group row tight no-asuransi-field">
                    <label for="no-polish" class="col-md-3 col-form-label">No. Polish</label>
                    <div class="col-md-9">
                        <input type="text" name="no_polish_penjamin" id="no-polish-penjamin" class="form-control" placeholder="Pilih Penjamin">
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simanUbahCaraBayar()"><i class="fas fa-search mr-1"></i>Ubah</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
	$(function() {
		$('.penjamin-group, .no-asuransi-field').hide()
		$('#cara-bayar').change(function() {
			jenisPenjamin = $(this).val()
			$('#no-polish-penjamin, #penjamin').val('')
			$('#s2id_penjamin a .select2-chosen').html('Pilih Penjamin')
			if ($(this).val() !== 'Tunai') {
				$('.penjamin-group, .no-asuransi-field').show()
				if (($(this).val() === 'Karyawan') | ($(this).val() === 'Gratis')) {
					$('.no-asuransi-field').hide()
				}
			} else {
				$('.penjamin-group, .no-asuransi-field').hide()
			}
		})
		$('#penjamin').change(function() {
			let no_rm = $('#no-rm-detail').html()
			let id_penjamin = $(this).val()
			if ((no_rm !== '') && (id_penjamin !== '')) {
				getNopolishPasien(no_rm, id_penjamin, '#no-polish-penjamins');
			}
		})
		$('#penjamin').select2({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/penjamin_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function (term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						jenis: jenisPenjamin,
						page: page, // page number
					};
				},
				results: function (data, page) {
					var more = (page * 20) < data.total; // whether or not there are more results available
		
					// notice we return the value of more so Select2 knows if more results can be loaded
					return {results: data.data, more: more};
				}
			},
			formatResult: function(data){
				var markup = data.nama;
				return markup;
			}, 
			formatSelection: function(data){
				return data.nama;
			}
		})
	})
	function ubahCaraBayar() {
		resetDataPenjamin()
		$('#modal-ubah-cara-bayar').modal('show')
	}

	function getNopolishPasien(no_rm, id_penjamin, element) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('pasien/api/pasien/get_nopolish_pasien') ?>/id/' + no_rm + '/penjamin/' + id_penjamin,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $(element).val(data.no_polish);
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
	}
	
	function resetDataPenjamin () {
		$('#no-polish-penjamin, #penjamin, #cara-bayar').val('')
		$('#s2id_penjamin a .select2-chosen').html('Pilih Penjamin')
		$('.penjamin-group, .no-asuransi-field').hide()
	}

	function simanUbahCaraBayar() {
		let id_pendaftaran = $('#id-pendaftaran').val()
		swal.fire({
			title: 'Konfirmasi',
			html: "Apakah anda benar yakin akan megubah cara bayar ?",
			icon: 'question',
			showCancelButton: true,
			buttonsStyling: true,
			confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Ya',
			cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'POST',
					url: '<?= base_url('keuangan/api/keuangan/simpan_ubah_cara_bayar') ?>/id_pendaftaran/' + id_pendaftaran,
					data: $('#form-ubah-cara-bayar').serialize(),
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						showLoader()
					},
					success: function(data) {
						if (data.status) {
							messageCustom('Berhasil mengubah cara bayar', 'Success')
							$('#modal-ubah-cara-bayar').modal('hide')
							$('#modal-detail-rekap-billing').modal('hide')
							getListRekapBilling($('#page-now').val())
						} else {
							swalAlert('warning', 'Ubah Cara Bayar', data.message)
						}
					},
					complete: function() {
						hideLoader()
					},
					error: function(e) {
						messageCustom('Gagal melakukan ubah cara bayar', 'Error')
					}
				})
			}
		})
	}
</script>