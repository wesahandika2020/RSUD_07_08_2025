<script>
	var jenisTindakan = '';
	var kelasTindakan = '';

	$(function() {
		$('#tindakan-radiologi').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/tarif_pelayanan_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) { // page is the one-based page number tracked by Select2

                    return {
                        q: term, //search term
                        jenis_pemeriksaan: 'Pelayanan Radiologi',
                        jenis_tindakan: jenisTindakan,
                        kelas: kelasTindakan,
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
                var total = data.total;
                var kelas = (data.kelas !== null)?((', kelas ')+data.kelas):'';
                
                var markup = '<b>'+data.layanan+'</b> <br/>'+data.jenis+', '+data.bobot+kelas+'<br/>'+numberToCurrency(total);
                return markup;
            }, 
            formatSelection: function(data){
                $('#tarif-tindakan-radiologi').val(data.total);
                var kelas = (data.kelas !== null)?(', kelas ')+data.kelas:'';
                return data.layanan+', '+data.jenis+', '+data.bobot+kelas
            }
        });
	})

	function tambahRequestRadiologi() {
		if($('#asal-layanan').text() === 'Radiologi '){
			$('#modal-item-radiologi').modal('show');
			$('#tindakan-radiologi, #tarif-tindakan-radiologi').val('');
			$('#s2id_tindakan-radiologi a .select2-chosen').html('');
			$('#table-item-radiologi tbody').empty();
		} else {
            swalAlert('warning', 'Validasi', 'Silahkan konsultasi dokter untuk menambah tindakan.');
                        return false;
		}
	}

	function pushItemRadiologi() {
		let stop = false;
		let is_cito = 'tidak';
		let checked = '';
		if ($('#is-cito-radiologi').is(':checked')) {
			checked = '&checkmark;';
			is_cito = 'ya';
		}

		if ($('#tindakan-radiologi').val() === '') {
			syams_validation('#tindakan-radiologi', 'Kolom pemeriksaaan harus dipilih.');
			stop = true;
		}

		if (stop) {
			return false;
		}

		let number = $('.number-tindakan-radiologi').length;
		let tindakan = $('#s2id_tindakan-radiologi a .select2-chosen').html();
		let id_tindakan = $('#tindakan-radiologi').val();
		let tarif = $('#tarif-tindakan-radiologi').val();

		if (tarif === '') {
			tarif = 0;
		}

		let html = /* html */ `
			<tr>
				<td class="number-tindakan-radiologi center">${++number}</td>
				<td><input type="hidden" name="tindakan_radiologi[]" value="${id_tindakan}">${tindakan}</td>
				<td class="right">${numberToCurrency(tarif)}</td>
				<td class="center"><input type="hidden" name="cito[]" value="${is_cito}">${checked}</td>
				<td class="right aksi">
					<button type="button" class="btn btn-secondary btn-xs" onclick="removeList(this)"><i class="fas fa-trash-alt mr-1"></i></button>
				</td>
			</tr>
		`;

		$('#table-item-radiologi tbody').append(html);
		$('#tindakan-radiologi, #tarif-tindakan-radiologi').val('');
		$('#s2id_tindakan-radiologi a .select2-chosen').html('');
		$('#is-cito-radiologi').prop('checked', false);
	}

	function removeList(object) {
		var parent = object.parentNode.parentNode;
		parent.parentNode.removeChild(parent);
	}

	function konfirmasiSimpanRequestRadiologi() {
		let id_radiologi = $('#id-radiologi').val();
		if (id_radiologi === '') {
			messageCustom('Terjadi kesalah pada aplikasi', 'Error');
		} else {
			Swal.fire({
				title: 'Konfirmasi Simpan Request',
				html: "Apakah anda yakin ingin menyimpan <br> data permintaan request radiologi ini ?",
				icon: 'question',
				showCancelButton: true,
				confirmButtonText: '<i class="fas fa-save mr-1"></i>Simpan',
				cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
				reverseButtons: true
			}).then((result) => {
				if (result.value) {
					simpanRequestRadiologi(id_radiologi);
				}
			})
		}
	}

	function simpanRequestRadiologi(id_radiologi) {
		$.ajax({
			type: 'POST',
			url: '<?= base_url("hasil_radiologi/api/hasil_radiologi/simpan_item_pemeriksaan_radiologi") ?>',
			data: $('#form-item-radiologi').serialize() + '&id_radiologi=' + id_radiologi,
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				let statusTransaction = 'Error';
				if (data.status === true) {
					statusTransaction = 'Success';
				}

				messageCustom(data.message, statusTransaction);
				$('input[type=checkbox]').prop('checked', false);
				$('#modal-item-radiologi').modal('hide');
				$('#modal-detail-pemeriksaan').modal('hide');
			}, 
			error: function(e) {
				messageCustom('Gagal tambah item pemeriksaan radiologi', 'Error');
			}
		})
	}
</script>

<div id="modal-item-radiologi" class="modal fade">
	<div class="modal-dialog" style="max-width:60%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Item Pemeriksaan Radiologi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-item-radiologi role=form class=form-horizontal') ?>
				<input type="hidden" name="tarif_tindakan" id="tarif-tindakan-radiologi">
				<div class="form-group row tight">
                    <label class="col-lg-3 col-form-label">Pemeriksaan</label>
                    <div class="col-lg-7">
                        <input type="text" name="tindakan" class="select2-input" id="tindakan-radiologi">
                    </div>
				</div>
				<div class="form-group row tight">
                    <label class="col-lg-3 col-form-label">Cito</label>
                    <div class="col-lg-1" style="flex: 0 0 5.33333%;">
                        <input type="checkbox" name="is_cito" class="form-control" id="is-cito-radiologi">
                    </div>
				</div>
				<div class="form-group row tight">
                    <label class="col-lg-3 col-form-label"></label>
                    <div class="col-lg-6">
                        <button type="button" class="btn btn-info" onclick="pushItemRadiologi()"><i class="fas fa-plus-circle mr-1"></i>Tambah</button>
                    </div>
				</div>
				<table class="table table-sm table-striped table-hover color-table info-table" id="table-item-radiologi">
					<thead>
						<tr>
							<th width="5%">No.</th>
							<th width="75%">Pemeriksaan</th>
							<th width="15%" class="right">Tarif</th>
							<th width="5%" class="center">Cito</th>
							<th width="5%"></th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
				
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
                <button type="button" class="btn btn-info" onclick="konfirmasiSimpanRequestRadiologi()"><i class="fas fa-save mr-1"></i>Simpan</button>
			</div>
		</div>
	</div>
</div>