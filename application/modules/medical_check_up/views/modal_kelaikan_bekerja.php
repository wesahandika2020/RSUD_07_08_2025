<script>
  // SKB 

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

    $('#dokter-sepesialis-skb').select2c({
      ajax: {
        url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
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
        var markup = '<b>' + data.nama + '</b><br/><i>' + data.spesialisasi + '</i>';
        return markup;
      },
      formatSelection: function(data) {
        return data.nama;
      }
    });


  function simpanKelaikanBekerja() {
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

    var id_layanan_pendaftaran = $('#id-layanan-pendaftaran-skb').val();

      $.ajax({
          type: 'POST',
          url: '<?= base_url("medical_check_up/api/medical_check_up/simpan_kelalaian_bekerja") ?>',
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
                  $('#modal_kelaikan_bekerja').modal('hide');
                  window.open('<?= base_url('medical_check_up/cetak_kelaikan_bekerja/') ?>' + id_layanan_pendaftaran,
                      'Cetak Sertifikat Kelaikan Bekerja', 'width=' + dWidth + ', height=' +
                      dHeight +
                      ', left=' + x + ', top=' + y);
              } else {
                  messageCustom(data.message, 'Error');
              }
          },
          complete: function(data) {
              hideLoader();
          },
          error: function(e) {
              // messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
          messageCustom('Terjadi Kesalahan : '+ e.statusText +' ('+e.status+')', 'Error');

          }
      });
  } 

</script>


<!-- // SKB -->
<div class="modal fade" id="modal_kelaikan_bekerja" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 id="modal_kelaikan_bekerja_title"></h5>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form_skb class="form-horizontal"') ?>
        <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-skb">
        <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-skb">
        <input type="hidden" name="id_user" id="id-user"value="<?= $this->session->userdata('id_translucent') ?>"> 	
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
                      <!-- <td>
                        <span class="bold">dr. Sri Roslina, MKK,SpOk</span>
                      </td> -->
                      <td>
                        <input type="text" name="dokter_sepesialis_skb" id="dokter-sepesialis-skb" class="select2c-input ml-2"></td>
                      </td>
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
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i
						class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info" onclick="simpanKelaikanBekerja()"
					id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal Form SKB -->


