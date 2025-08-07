<!-- Modal FormModal Form SKSehat -->
<div class="modal fade" id="modal_skb" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 id="modal_skb_title"></h5>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form_skb class="form-horizontal"') ?>
				<input type="hidden" name="id_layanan_pendaftaran" id="kb_id_layanan_pendaftaran">
				<input type="hidden" name="id_pendaftaran" id="kb_id_pendaftaran">
        <input type="hidden" name="kb_id" id="kb_id">
        <input type="hidden" name="id_pasien" id="kb_id_pasien">
        <input type="hidden" name="id_users" id="kb_id_users">

				<!-- content -->
				<div class="row">
					<div class="col-lg-12">
						<div class="widget-body">
							<div id="wizard_form_ranap">
								<div class="form_skb">
                  <table class="table table-no-border table-sm table-striped">
                    <tr>
                      <td class="bold" width="15%">NOMOR SERTIFIKAT</td>
                      <td class="bold" width="1%">:</td>
                      <td class="d-flex">
                        <input type="number" name="kb_nomor_1" id="kb_nomor_1" class="custom-form col-lg-1 mr-2">/
                        <input type="number" name="kb_nomor_2" id="kb_nomor_2" class="custom-form col-lg-1 mx-2"> - MCU - RSUDKT / <span class="ml-1" id="tahun_sekarang"></span>
                        <input type="hidden" name="kb_notif" id="kb_notif" class="custom-form col-lg-1 mx-2" disabled>
                      </td>
                    </tr>
                    
                    <tr>
                      <td class="bold" width="15%">PERMINTAAN DARI</td>
                      <td class="bold" width="1%">:</td>
                      <td>
                        <input type="text" name="kb_permintaan_dari" id="kb_permintaan_dari" class="custom-form clear-input d-inline-block col-lg-4">
                      </td>
                    </tr>
                    
                    <tr>
                      <td class="bold" width="15%">NOMOR</td>
                      <td class="bold" width="1%">:</td>
                      <td>
                        <input type="text" name="kb_permintaan_nomor" id="kb_permintaan_nomor" class="custom-form clear-input d-inline-block col-lg-4">
                      </td>
                    </tr>
                    
                    <tr>
                      <td class="bold" width="15%">TANGGAL PEMERIKSAAN</td>
                      <td class="bold" width="1%">:</td>
                      <td>
                        <input type="text" name="kb_permintaan_tanggal" id="kb_permintaan_tanggal" class="custom-form clear-input d-inline-block col-lg-1" placeholder="dd/mm/yyyy">
                      </td>
                    </tr>
                    
                    <tr>
                      <td class="bold" width="15%">KETERANGAN</td>
                      <td class="bold" width="1%">:</td>
                      <td>
                        <textarea name="kb_keterangan" id="kb_keterangan" class="form-control clear-input d-inline-block col-lg-12" rows="4"></textarea>
                        <!-- <input type="text" name="kb_keterangan" id="kb_keterangan" class="custom-form clear-input d-inline-block col-lg-1" placeholder="dd/mm/yyyy"> -->
                      </td>
                    </tr>
                    
                    <tr>
                      <td class="bold" width="15%">TANGGAL</td>
                      <td class="bold" width="1%">:</td>
                      <td>
                        <input type="text" name="kb_tanggal" id="kb_tanggal" class="custom-form clear-input d-inline-block col-lg-1" placeholder="dd/mm/yyyy">
                      </td>
                    </tr>

                    <tr>
                      <td class="bold" width="15%">DOKTER SPESIALIS</td>
                      <td class="bold" width="1%">:</td>
                      <td>
                        <span class="bold">dr. Sri Roslina, MKK,SpOk</span>
                      </td>
                    </tr>
                    
                    <!-- <tr>
                      <td colspan="9"></td>
                      <td colspan="3" class="text-center">Dokter Spesialis</td>
                    </tr>
                    <tr>
                      <td colspan="9"></td>
                      <td colspan="3" class="text-center"><input type="checkbox" name="rkm_paraf_dokter" id="rkm_paraf_dokter" value="1"></td>
                    </tr>
                    <tr>
                      <td colspan="9"></td>
                      <td colspan="3" class="text-center"><input type="text" name="rkm_dokter" id="rkm_dokter" class="select2c-input"></td>
                    </tr> -->
                  </table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end content -->
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i
						class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info" onclick="cetakKelaikanBekerja()"
					id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal Form SKSehat -->

<script>

    $(function() {
      var tahunSekarang = new Date().getFullYear();
      document.getElementById('tahun_sekarang').innerText = tahunSekarang;


      let currentDate = new Date();
      $('#kb_permintaan_tanggal, #kb_tanggal').datetimepicker({
          format: 'DD/MM/YYYY',
          pickSecond: false,
          pick12HourFormat: false,
          // maxDate: new Date(currentDate.getFullYear(), currentDate.getMonth() + 2, 0),
          maxDate: new Date(),
          beforeShow: function(i) {
              if ($(i).attr('readonly')) {
                  return false;
              }
          }
      });

    })

  function cetakKelaikanBekerja() {

    var kb_id = $('#kb_id').val();
    var id_layanan_pendaftaran = $('#kb_id_layanan_pendaftaran').val();
    var id_pendaftaran = $('#kb_id_pendaftaran').val();

    if ($('#kb_nomor_1').val() === '') {
        syams_validation('#kb_notif', 'Field harus diisi!');
        return false;
    } else {
        syams_validation_remove('#kb_notif');
    }

    if ($('#kb_nomor_2').val() === '') {
        syams_validation('#kb_notif', 'Field harus diisi!');
        return false;
    } else {
        syams_validation_remove('#kb_notif');
    }

    if ($('#kb_permintaan_dari').val() === '') {
        syams_validation('#kb_permintaan_dari', 'Field harus diisi!');
        return false;
    } else {
        syams_validation_remove('#kb_permintaan_dari');
    }

    if ($('#kb_permintaan_nomor').val() === '') {
        syams_validation('#kb_permintaan_nomor', 'Field harus diisi!');
        return false;
    } else {
        syams_validation_remove('#kb_permintaan_nomor');
    }

    if ($('#kb_permintaan_tanggal').val() === '') {
        syams_validation('#kb_permintaan_tanggal', 'Field harus diisi!');
        return false;
    } else {
        syams_validation_remove('#kb_permintaan_tanggal');
    }

    if ($('#kb_keterangan').val() === '') {
        syams_validation('#kb_keterangan', 'Field harus diisi!');
        return false;
    } else {
        syams_validation_remove('#kb_keterangan');
    }

    if ($('#kb_tanggal').val() === '') {
        syams_validation('#kb_tanggal', 'Field harus diisi!');
        return false;
    } else {
        syams_validation_remove('#kb_tanggal');
    }

		$.ajax({
			type: 'POST',
			url: '<?= base_url("form_rekam_medis/api/entri_keperawatan/simpan_kb") ?>',
			data: $('#form_skb').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {

				if (data.status) {
					messageCustom(data.message, 'Success');

					var dWidth = $(window).width();
					var dHeight = $(window).height();
					var x = screen.width / 2 - dWidth / 2;
					var y = screen.height / 2 - dHeight / 2;

					$('#modal_skb').modal('hide');
          if (kb_id !== '') {
            window.open('<?= base_url('medical_check_up/cetak_kelaikan_bekerja/') ?>' + kb_id + '/' + id_pendaftaran + '/' + id_layanan_pendaftaran, 'Cetak Sertifikat Kelaikan Bekerja', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
          }
          
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

