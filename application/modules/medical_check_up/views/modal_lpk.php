<!-- Modal FormModal Form SKSehat -->
<div class="modal fade" id="modal_lpk" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 id="modal_lpk_title"></h5>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form_lpk class="form-horizontal"') ?>
				<input type="hidden" name="id_layanan_pendaftaran" id="lpk_id_layanan_pendaftaran">
				<input type="hidden" name="id_pendaftaran" id="lpk_id_pendaftaran">
        <input type="hidden" name="lpk_id" id="lpk_id">
        <input type="hidden" name="id_pasien" id="lpk_id_pasien">
        <input type="hidden" name="id_users" id="lpk_id_users">

				<!-- content -->
				<div class="row">
					<div class="col-lg-12">
						<div class="widget-body">
              <table class="table table-no-border table-sm table-striped">
                <tr>
                  <td class="bold" width="1%">I</td>
                  <td class="bold" width="25%" colspan="3">RIWAYAT KESEHATAN PRIBADI</td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Apakah Anda pernah dirawat di rumah sakit ?</td>
                  <td width="1%">:</td>
                  <td class="d-flex">
                    <input type="radio" name="lpk_dirawat" id="lpk_dirawat_ya"  value="1" class="mr-1">Ya
                    <input type="radio" name="lpk_dirawat" id="lpk_dirawat_tidak" value="0" class="mr-1 ml-2">Tidak
                    <input type="text" name="lpk_dirawat_ket" id="lpk_dirawat_ket" class="custom-form col-lg-6 ml-2">
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Apakah Anda pernah kecelakaan ?</td>
                  <td width="1%">:</td>
                  <td class="d-flex">
                    <input type="radio" name="lpk_kecelakaan" id="lpk_kecelakaan_ya"  value="1" class="mr-1">Ya
                    <input type="radio" name="lpk_kecelakaan" id="lpk_kecelakaan_tidak" value="0" class="mr-1 ml-2">Tidak
                    <input type="text" name="lpk_kecelakaan_ket" id="lpk_kecelakaan_ket" class="custom-form col-lg-6 ml-2">
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Apakah Anda pernah batuk darah / batuk berdarah ?</td>
                  <td width="1%">:</td>
                  <td class="d-flex">
                    <input type="radio" name="lpk_batuk" id="lpk_batuk_ya"  value="1" class="mr-1">Ya
                    <input type="radio" name="lpk_batuk" id="lpk_batuk_tidak" value="0" class="mr-1 ml-2">Tidak
                    <input type="text" name="lpk_batuk_ket" id="lpk_batuk_ket" class="custom-form col-lg-6 ml-2">
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Apakah Anda pernah sakit dada ?</td>
                  <td width="1%">:</td>
                  <td class="d-flex">
                    <input type="radio" name="lpk_dada" id="lpk_dada_ya"  value="1" class="mr-1">Ya
                    <input type="radio" name="lpk_dada" id="lpk_dada_tidak" value="0" class="mr-1 ml-2">Tidak
                    <input type="text" name="lpk_dada_ket" id="lpk_dada_ket" class="custom-form col-lg-6 ml-2">
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Apakah Anda pernah sakit kuning ?</td>
                  <td width="1%">:</td>
                  <td class="d-flex">
                    <input type="radio" name="lpk_kuning" id="lpk_kuning_ya"  value="1" class="mr-1">Ya
                    <input type="radio" name="lpk_kuning" id="lpk_kuning_tidak" value="0" class="mr-1 ml-2">Tidak
                    <input type="text" name="lpk_kuning_ket" id="lpk_kuning_ket" class="custom-form col-lg-6 ml-2">
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Apakah Anda pernah pingsan mendadak ?</td>
                  <td width="1%">:</td>
                  <td class="d-flex">
                    <input type="radio" name="lpk_pingsan" id="lpk_pingsan_ya"  value="1" class="mr-1">Ya
                    <input type="radio" name="lpk_pingsan" id="lpk_pingsan_tidak" value="0" class="mr-1 ml-2">Tidak
                    <input type="text" name="lpk_pingsan_ket" id="lpk_pingsan_ket" class="custom-form col-lg-6 ml-2">
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Apakah Anda pernah kejang-kejang ?</td>
                  <td width="1%">:</td>
                  <td class="d-flex">
                    <input type="radio" name="lpk_kejang" id="lpk_kejang_ya"  value="1" class="mr-1">Ya
                    <input type="radio" name="lpk_kejang" id="lpk_kejang_tidak" value="0" class="mr-1 ml-2">Tidak
                    <input type="text" name="lpk_kejang_ket" id="lpk_kejang_ket" class="custom-form col-lg-6 ml-2">
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Apakah Anda pernah muntah darah ?</td>
                  <td width="1%">:</td>
                  <td class="d-flex">
                    <input type="radio" name="lpk_muntah" id="lpk_muntah_ya"  value="1" class="mr-1">Ya
                    <input type="radio" name="lpk_muntah" id="lpk_muntah_tidak" value="0" class="mr-1 ml-2">Tidak
                    <input type="text" name="lpk_muntah_ket" id="lpk_muntah_ket" class="custom-form col-lg-6 ml-2">
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Apakah Anda pernah sakit ulu hati ?</td>
                  <td width="1%">:</td>
                  <td class="d-flex">
                    <input type="radio" name="lpk_hati" id="lpk_hati_ya"  value="1" class="mr-1">Ya
                    <input type="radio" name="lpk_hati" id="lpk_hati_tidak" value="0" class="mr-1 ml-2">Tidak
                    <input type="text" name="lpk_hati_ket" id="lpk_hati_ket" class="custom-form col-lg-6 ml-2">
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Apakah Anda pernah sakit kencing batu ?</td>
                  <td width="1%">:</td>
                  <td class="d-flex">
                    <input type="radio" name="lpk_batu" id="lpk_batu_ya"  value="1" class="mr-1">Ya
                    <input type="radio" name="lpk_batu" id="lpk_batu_tidak" value="0" class="mr-1 ml-2">Tidak
                    <input type="text" name="lpk_batu_ket" id="lpk_batu_ket" class="custom-form col-lg-6 ml-2">
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Apakah Anda pernah sakit kencing nanah ?</td>
                  <td width="1%">:</td>
                  <td class="d-flex">
                    <input type="radio" name="lpk_nanah" id="lpk_nanah_ya"  value="1" class="mr-1">Ya
                    <input type="radio" name="lpk_nanah" id="lpk_nanah_tidak" value="0" class="mr-1 ml-2">Tidak
                    <input type="text" name="lpk_nanah_ket" id="lpk_nanah_ket" class="custom-form col-lg-6 ml-2">
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Apakah Anda pernah punya riwayat ambien ?</td>
                  <td width="1%">:</td>
                  <td class="d-flex">
                    <input type="radio" name="lpk_ambien" id="lpk_ambien_ya"  value="1" class="mr-1">Ya
                    <input type="radio" name="lpk_ambien" id="lpk_ambien_tidak" value="0" class="mr-1 ml-2">Tidak
                    <input type="text" name="lpk_ambien_ket" id="lpk_ambien_ket" class="custom-form col-lg-6 ml-2">
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Apakah buang air besar Anda berdarah ?</td>
                  <td width="1%">:</td>
                  <td class="d-flex">
                    <input type="radio" name="lpk_buang" id="lpk_buang_ya"  value="1" class="mr-1">Ya
                    <input type="radio" name="lpk_buang" id="lpk_buang_tidak" value="0" class="mr-1 ml-2">Tidak
                    <input type="text" name="lpk_buang_ket" id="lpk_buang_ket" class="custom-form col-lg-6 ml-2">
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Apakah Anda kecanduan narkotik ?</td>
                  <td width="1%">:</td>
                  <td class="d-flex">
                    <input type="radio" name="lpk_narkotik" id="lpk_narkotik_ya"  value="1" class="mr-1">Ya
                    <input type="radio" name="lpk_narkotik" id="lpk_narkotik_tidak" value="0" class="mr-1 ml-2">Tidak
                    <input type="text" name="lpk_narkotik_ket" id="lpk_narkotik_ket" class="custom-form col-lg-6 ml-2">
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Apakah Anda pernah kencing darah ?</td>
                  <td width="1%">:</td>
                  <td class="d-flex">
                    <input type="radio" name="lpk_darah" id="lpk_darah_ya"  value="1" class="mr-1">Ya
                    <input type="radio" name="lpk_darah" id="lpk_darah_tidak" value="0" class="mr-1 ml-2">Tidak
                    <input type="text" name="lpk_darah_ket" id="lpk_darah_ket" class="custom-form col-lg-6 ml-2">
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Apakah Anda pernah sakit jantung ?</td>
                  <td width="1%">:</td>
                  <td class="d-flex">
                    <input type="radio" name="lpk_jantung" id="lpk_jantung_ya"  value="1" class="mr-1">Ya
                    <input type="radio" name="lpk_jantung" id="lpk_jantung_tidak" value="0" class="mr-1 ml-2">Tidak
                    <input type="text" name="lpk_jantung_ket" id="lpk_jantung_ket" class="custom-form col-lg-6 ml-2">
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Apakah Anda pernah terserang asma ?</td>
                  <td width="1%">:</td>
                  <td class="d-flex">
                    <input type="radio" name="lpk_asma" id="lpk_asma_ya"  value="1" class="mr-1">Ya
                    <input type="radio" name="lpk_asma" id="lpk_asma_tidak" value="0" class="mr-1 ml-2">Tidak
                    <input type="text" name="lpk_asma_ket" id="lpk_asma_ket" class="custom-form col-lg-6 ml-2">
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Apakah Anda pernah terserang malaria ?</td>
                  <td width="1%">:</td>
                  <td class="d-flex">
                    <input type="radio" name="lpk_malaria" id="lpk_malaria_ya"  value="1" class="mr-1">Ya
                    <input type="radio" name="lpk_malaria" id="lpk_malaria_tidak" value="0" class="mr-1 ml-2">Tidak
                    <input type="text" name="lpk_malaria_ket" id="lpk_malaria_ket" class="custom-form col-lg-6 ml-2">
                  </td>
                </tr>
                <tr>
                  <td class="bold" width="1%">II</td>
                  <td class="bold" width="25%" colspan="3">RIWAYAT KESEHATAN KELUARGA</td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Apakah di keluarga Anda ada yang menderita kelainan jiwa ?</td>
                  <td width="1%">:</td>
                  <td class="d-flex">
                    <input type="radio" name="lpk_jiwa" id="lpk_jiwa_ya"  value="1" class="mr-1">Ya
                    <input type="radio" name="lpk_jiwa" id="lpk_jiwa_tidak" value="0" class="mr-1 ml-2">Tidak
                    <input type="text" name="lpk_jiwa_ket" id="lpk_jiwa_ket" class="custom-form col-lg-6 ml-2">
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Apakah Bapak/Ibu Anda penderita kencing manis ?</td>
                  <td width="1%">:</td>
                  <td class="d-flex">
                    <input type="radio" name="lpk_manis" id="lpk_manis_ya"  value="1" class="mr-1">Ya
                    <input type="radio" name="lpk_manis" id="lpk_manis_tidak" value="0" class="mr-1 ml-2">Tidak
                    <input type="text" name="lpk_manis_ket" id="lpk_manis_ket" class="custom-form col-lg-6 ml-2">
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Apakah Bapak/Ibu Anda penderita hipertensi ?</td>
                  <td width="1%">:</td>
                  <td class="d-flex">
                    <input type="radio" name="lpk_hipertensi" id="lpk_hipertensi_ya"  value="1" class="mr-1">Ya
                    <input type="radio" name="lpk_hipertensi" id="lpk_hipertensi_tidak" value="0" class="mr-1 ml-2">Tidak
                    <input type="text" name="lpk_hipertensi_ket" id="lpk_hipertensi_ket" class="custom-form col-lg-6 ml-2">
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Apakah Bapak/Ibu Anda penderita penyakit jantung ?</td>
                  <td width="1%">:</td>
                  <td class="d-flex">
                    <input type="radio" name="lpk_penyakit" id="lpk_penyakit_ya"  value="1" class="mr-1">Ya
                    <input type="radio" name="lpk_penyakit" id="lpk_penyakit_tidak" value="0" class="mr-1 ml-2">Tidak
                    <input type="text" name="lpk_penyakit_ket" id="lpk_penyakit_ket" class="custom-form col-lg-6 ml-2">
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Apakah Bapak/Ibu Anda penderita stroke ?</td>
                  <td width="1%">:</td>
                  <td class="d-flex">
                    <input type="radio" name="lpk_stroke" id="lpk_stroke_ya"  value="1" class="mr-1">Ya
                    <input type="radio" name="lpk_stroke" id="lpk_stroke_tidak" value="0" class="mr-1 ml-2">Tidak
                    <input type="text" name="lpk_stroke_ket" id="lpk_stroke_ket" class="custom-form col-lg-6 ml-2">
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Apakah Saudara Anda ada yang cacat bawaan ?</td>
                  <td width="1%">:</td>
                  <td class="d-flex">
                    <input type="radio" name="lpk_cacat" id="lpk_cacat_ya"  value="1" class="mr-1">Ya
                    <input type="radio" name="lpk_cacat" id="lpk_cacat_tidak" value="0" class="mr-1 ml-2">Tidak
                    <input type="text" name="lpk_cacat_ket" id="lpk_cacat_ket" class="custom-form col-lg-6 ml-2">
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td class="bold" width="25%">Tanggal</td>
                  <td width="1%">:</td>
                  <td class="d-flex">
                    <input type="text" name="lpk_tanggal" id="lpk_tanggal" class="custom-form clear-input d-inline-block col-lg-2" placeholder="dd/mm/yyyy">
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td class="bold" width="25%">Dokter Pemeriksa</td>
                  <td width="1%">:</td>
                  <td class="d-flex">
                    <input type="text" name="lpk_dokter" id="lpk_dokter" class="select2c-input">
                  </td>
                </tr>
              </table>
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
      $('#lpk_tanggal').datetimepicker({
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

      // DOKTER
      $('#lpk_dokter').select2c({
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
                  var more = (page * 20) < data
                      .total; // whether or not there are more results available

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

    })

  function cetakKelaikanBekerja() {

    var lpk_id = $('#lpk_id').val();
    var id_layanan_pendaftaran = $('#lpk_id_layanan_pendaftaran').val();
    var id_pendaftaran = $('#lpk_id_pendaftaran').val();

    if ($('#lpk_tanggal').val() === '') {
        syams_validation('#lpk_tanggal', 'Field harus diisi!');
        return false;
    } else {
        syams_validation_remove('#lpk_tanggal');
    }
    if ($('#lpk_dokter').val() === '') {
        syams_validation('#lpk_dokter', 'Field harus diisi!');
        return false;
    } else {
        syams_validation_remove('#lpk_dokter');
    }

		$.ajax({
			type: 'POST',
			url: '<?= base_url("medical_check_up/api/medical_check_up/simpan_lpk") ?>',
			data: $('#form_lpk').serialize(),
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

					$('#modal_lpk').modal('hide');

          if (lpk_id !== '') {
            window.open('<?= base_url('medical_check_up/cetak_laporan_pemeriksaan_kesehatan/') ?>' + lpk_id + '/' + id_pendaftaran + '/' + id_layanan_pendaftaran, 'Cetak Laporan Pemeriksaan Kesehatan', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
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

