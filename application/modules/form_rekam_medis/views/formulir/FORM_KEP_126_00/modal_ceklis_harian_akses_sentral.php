<!-- <style type="text/css">td {border: solid 1px;}</style> -->
<!-- Modal Entri -->
<div class="modal fade" id="modal_chas" role="dialog" data-backdrop="static" aria-labelledby="modal-resume-keperawatan-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
    <div class="modal-content">
      <div class="modal-header">
        <div class="title">
          <h5 class="modal-title bold" id="modal_chas_title">CEKLIS HARIAN AKSES SENTRAL</h5>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'id=form_chas class="form-horizontal"') ?>
          <input type="hidden" name="chas_id" id="chas_id">
          <input type="hidden" name="id_layanan_pendaftaran" id="chas_id_layanan_pendaftaran">
          <input type="hidden" name="id_pendaftaran" id="chas_id_pendaftaran">
          <input type="hidden" name="id_pasien" id="chas_id_pasien">
          <input type="hidden" name="bed" id="chas_bed">
          <input type="hidden" name="action" id="action_chas">

          <!-- header -->
          <div class="row">
            <div class="col-lg-6">
              <div class="table-responsive">
                <table class="table table-sm table-striped">
                  <tr>
                    <td width="20%" class="bold">Nama Pasien</td>
                    <td wdith="80%">: <span id="chas_nama_pasien"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">No. RM</td>
                    <td>: <span id="chas_no_rm"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">Tanggal Lahir</td>
                    <td>: <span id="chas_tanggal_lahir"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">Jenis Kelamin</td>
                    <td>: <span id="chas_jenis_kelamin"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">Alamat</td>
                    <td>: <span id="chas_alamat"></span></td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="table-responsive">
                <table class="table table-sm table-striped">
                  <tr>
                    <td width="30%" class="bold">Ruang Rawat/Unit Kerja</td>
                    <td wdith="70%">: <span id="chas_bed"></span></td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <div class="wflg_logo_alergi">
                        <img src="<?= resource_url() ?>images/diagnosa/alergi.jpg" alt="wflg_logo_alergi" class="img-thumbnail rounded" width="20%">
                        <!-- logo pasien alergi -->
                      </div>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <!-- end header -->

          <!-- content -->
          <div class="row">
            <div class="col-lg-12">
              <div class="widget-body" id="data_chas">
                <div id="chas_buka_tutup">
                </div>
                <table class="table table-no-border table-sm table-striped" id="table_chas">
                  <thead>
                    <tr>
                      <th class="text-center">No</th>
                      <th class="text-center">Tanggal</th>
                      <th class="text-center">Nama Perawat Pagi</th>
                      <th class="text-center">Nama Perawat Sore</th>
                      <th class="text-center">Nama Perawat Malam</th>
                      <th class="text-center">Petugas</th>
                      <th class="text-center" id='chas_alat'>ALAT</th>
                    </tr>
                  </thead>
                  <tbody class="body-table">
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- end content -->
        <?= form_close() ?>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" onclick="cetakResepKacaMata()" id="btn_cetak_lo"><i class="fas fa-print mr-1"></i>Print</button> -->
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
        <button type="button" class="btn btn-info" onclick="konfirmasiSimpanEntriChas()" id="btn_simpan_chas"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Entri -->

<!-- modal Edit -->
<div id="modal_edit_chas" class="modal fade" role="dialog">
  <div class="modal-dialog" style="max-width: 80%">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit CEKLIS HARIAN AKSES SENTRAL</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body edit_data_chas">
        <?= form_open('', 'id=form_edit_chas class=form-horizontal '); ?>
          <input type="hidden" name="chas_id" id="edit_chas_id">
          <input type="hidden" name="id_pendaftaran" id="edit_chas_id_pendaftaran">
          <input type="hidden" name="id_layanan_pendaftaran" id="edit_chas_id_layanan_pendaftaran">
          <table class="table table-sm table-borderless table-striped" style="margin-top: -15px; border: none;">
            <tr>
              <td width="20%">Jenis Pemasangan</td>
              <td width="1%">:</td>
              <td width="10%"><input type="checkbox" name="edit_chas_Pemasangan_picc" id="edit_chas_Pemasangan_picc" value="1"> PICC</td>
              <td width="10%"><input type="checkbox" name="edit_chas_Pemasangan_cdl" id="edit_chas_Pemasangan_cdl" value="1"> CDL</td>
              <td width="10%"><input type="checkbox" name="edit_chas_Pemasangan_cvc" id="edit_chas_Pemasangan_cvc" value="1"> CVC</td>
              <td width="10%"><input type="checkbox" name="edit_chas_Pemasangan_uac" id="edit_chas_Pemasangan_uac" value="1"> UAC</td>
              <td width="10%"><input type="checkbox" name="edit_chas_Pemasangan_uvc" id="edit_chas_Pemasangan_uvc" value="1"> UVC</td>
            </tr>
            <tr>
              <td>Jenis Kateter</td>
              <td>:</td=>
              <td><input type="checkbox" name="edit_chas_kateter_premicath" id="edit_chas_kateter_premicath" value="1"> Premicath</td>
              <td><input type="checkbox" name="edit_chas_kateter_nutriline" id="edit_chas_kateter_nutriline" value="1"> Nutriline Twin Flow</td>
              <td><input type="checkbox" name="edit_chas_kateter_doble" id="edit_chas_kateter_doble" value="1"> Double Lumen</td>
              <td><input type="checkbox" name="edit_chas_kateter_triple" id="edit_chas_kateter_triple" value="1"> Triple Lumen</td>
              <td></td>
            </tr>
            <tr>
              <td>Tanggal Pemasangan</td>
              <td>:</td>
              <td colspan="5"><input type="text" name="edit_chas_tgl_pemasangan" id="edit_chas_tgl_pemasangan" class="custom-form clear-input d-inline-block col-lg-2" placeholder="dd/mm/yyyy"></td>
            </tr>
            <tr>
              <td>Lokasi Pemasangan Kateter</td>
              <td>:</td>
              <td colspan="5"><input type="text" name="edit_chas_lokasi" id="edit_chas_lokasi" class="custom-form clear-input d-inline-block col-lg-2"></td>
            </tr>
            <tr>
              <td>Batas Kateter Pada kulit</td>
              <td>:</td>
              <td colspan="5"><input type="number" name="edit_chas_batas" id="edit_chas_batas" class="custom-form clear-input d-inline-block col-lg-2"> Cm</td>
            </tr>
          </table>
          <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="table_edit_chas">
            <thead>
              <tr>
                <th class="text-center" rowspan="3" width="3%">No</th>
                <th class="text-center" rowspan="3">KETERANGAN</th>
                <th class="text-left" colspan="6">Tanggal : <input type="text" name="edit_chas_tgl" id="edit_chas_tgl" class="custom-form clear-input d-inline-block col-lg-2"></th>
              </tr>
              <tr>
                <th class="text-center" colspan="2">PAGI</th>
                <th class="text-center" colspan="2">SORE</th>
                <th class="text-center" colspan="2">MALAM</th>
              </tr>
              <tr>
                <th class="text-center" width="12%">YA</th>
                <th class="text-center" width="12%">TIDAK</th>
                <th class="text-center" width="12%">YA</th>
                <th class="text-center" width="12%">TIDAK</th>
                <th class="text-center" width="12%">YA</th>
                <th class="text-center" width="12%">TIDAK</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td rowspan="8" class="text-center"><b>1</b></td>
                <td colspan="7"><b>KLINIS PASIEN</b></td>
              </tr>
              <tr>
                <td>Alert</td>
                <td class="text-center"><input type="radio" name="edit_chas_alert_pagi" id="edit_chas_alert_pagi_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_alert_pagi" id="edit_chas_alert_pagi_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_alert_sore" id="edit_chas_alert_sore_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_alert_sore" id="edit_chas_alert_sore_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_alert_malam" id="edit_chas_alert_malam_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_alert_malam" id="edit_chas_alert_malam_tidak" value="2"></td>
              </tr>
              <tr>
                <td>Verbal</td>
                <td class="text-center"><input type="radio" name="edit_chas_verbal_pagi" id="edit_chas_verbal_pagi_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_verbal_pagi" id="edit_chas_verbal_pagi_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_verbal_sore" id="edit_chas_verbal_sore_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_verbal_sore" id="edit_chas_verbal_sore_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_verbal_malam" id="edit_chas_verbal_malam_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_verbal_malam" id="edit_chas_verbal_malam_tidak" value="2"></td>
              </tr>
              <tr>
                <td>Pain</td>
                <td class="text-center"><input type="radio" name="edit_chas_pain_pagi" id="edit_chas_pain_pagi_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_pain_pagi" id="edit_chas_pain_pagi_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_pain_sore" id="edit_chas_pain_sore_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_pain_sore" id="edit_chas_pain_sore_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_pain_malam" id="edit_chas_pain_malam_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_pain_malam" id="edit_chas_pain_malam_tidak" value="2"></td>
              </tr>
              <tr>
                <td>Unrespon</td>
                <td class="text-center"><input type="radio" name="edit_chas_unrespon_pagi" id="edit_chas_unrespon_pagi_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_unrespon_pagi" id="edit_chas_unrespon_pagi_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_unrespon_sore" id="edit_chas_unrespon_sore_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_unrespon_sore" id="edit_chas_unrespon_sore_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_unrespon_malam" id="edit_chas_unrespon_malam_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_unrespon_malam" id="edit_chas_unrespon_malam_tidak" value="2"></td>
              </tr>
              <tr>
                <td>Demam</td>
                <td class="text-center"><input type="radio" name="edit_chas_demam_pagi" id="edit_chas_demam_pagi_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_demam_pagi" id="edit_chas_demam_pagi_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_demam_sore" id="edit_chas_demam_sore_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_demam_sore" id="edit_chas_demam_sore_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_demam_malam" id="edit_chas_demam_malam_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_demam_malam" id="edit_chas_demam_malam_tidak" value="2"></td>
              </tr>
              <tr>
                <td>Takikardi</td>
                <td class="text-center"><input type="radio" name="edit_chas_takikardi_pagi" id="edit_chas_takikardi_pagi_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_takikardi_pagi" id="edit_chas_takikardi_pagi_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_takikardi_sore" id="edit_chas_takikardi_sore_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_takikardi_sore" id="edit_chas_takikardi_sore_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_takikardi_malam" id="edit_chas_takikardi_malam_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_takikardi_malam" id="edit_chas_takikardi_malam_tidak" value="2"></td>
              </tr>
              <tr>
                <td>Takipnoe</td>
                <td class="text-center"><input type="radio" name="edit_chas_takipnoe_pagi" id="edit_chas_takipnoe_pagi_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_takipnoe_pagi" id="edit_chas_takipnoe_pagi_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_takipnoe_sore" id="edit_chas_takipnoe_sore_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_takipnoe_sore" id="edit_chas_takipnoe_sore_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_takipnoe_malam" id="edit_chas_takipnoe_malam_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_takipnoe_malam" id="edit_chas_takipnoe_malam_tidak" value="2"></td>
              </tr>
              <tr>
                <td rowspan="5" class="text-center"><b>2</b></td>
                <td colspan="7"><b>KATETER</b></td>
              </tr>
              <tr>
                <td>Kateter Tertekuk</td>
                <td class="text-center"><input type="radio" name="edit_chas_tertekuk_pagi" id="edit_chas_tertekuk_pagi_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_tertekuk_pagi" id="edit_chas_tertekuk_pagi_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_tertekuk_sore" id="edit_chas_tertekuk_sore_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_tertekuk_sore" id="edit_chas_tertekuk_sore_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_tertekuk_malam" id="edit_chas_tertekuk_malam_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_tertekuk_malam" id="edit_chas_tertekuk_malam_tidak" value="2"></td>
              </tr>
              <tr>
                <td>Kateter Rembes/Bocor</td>
                <td class="text-center"><input type="radio" name="edit_chas_rembes_pagi" id="edit_chas_rembes_pagi_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_rembes_pagi" id="edit_chas_rembes_pagi_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_rembes_sore" id="edit_chas_rembes_sore_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_rembes_sore" id="edit_chas_rembes_sore_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_rembes_malam" id="edit_chas_rembes_malam_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_rembes_malam" id="edit_chas_rembes_malam_tidak" value="2"></td>
              </tr>
              <tr>
                <td>Adakah Aliran Balik</td>
                <td class="text-center"><input type="radio" name="edit_chas_aliran_pagi" id="edit_chas_aliran_pagi_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_aliran_pagi" id="edit_chas_aliran_pagi_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_aliran_sore" id="edit_chas_aliran_sore_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_aliran_sore" id="edit_chas_aliran_sore_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_aliran_malam" id="edit_chas_aliran_malam_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_aliran_malam" id="edit_chas_aliran_malam_tidak" value="2"></td>
              </tr>
              <tr>
                <td>Sumbatan Kateter</td>
                <td class="text-center"><input type="radio" name="edit_chas_sumbatan_pagi" id="edit_chas_sumbatan_pagi_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_sumbatan_pagi" id="edit_chas_sumbatan_pagi_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_sumbatan_sore" id="edit_chas_sumbatan_sore_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_sumbatan_sore" id="edit_chas_sumbatan_sore_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_sumbatan_malam" id="edit_chas_sumbatan_malam_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_sumbatan_malam" id="edit_chas_sumbatan_malam_tidak" value="2"></td>
              </tr>
              <tr>
                <td rowspan="6" class="text-center"><b>3</b></td>
                <td colspan="7"><b>KONDISI KULIT AREA INSERSI</b></td>
              </tr>
              <tr>
                <td>Kemerahan</td>
                <td class="text-center"><input type="radio" name="edit_chas_kemerahan_pagi" id="edit_chas_kemerahan_pagi_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_kemerahan_pagi" id="edit_chas_kemerahan_pagi_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_kemerahan_sore" id="edit_chas_kemerahan_sore_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_kemerahan_sore" id="edit_chas_kemerahan_sore_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_kemerahan_malam" id="edit_chas_kemerahan_malam_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_kemerahan_malam" id="edit_chas_kemerahan_malam_tidak" value="2"></td>
              </tr>
              <tr>
                <td>Bengkak</td>
                <td class="text-center"><input type="radio" name="edit_chas_bengkak_pagi" id="edit_chas_bengkak_pagi_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_bengkak_pagi" id="edit_chas_bengkak_pagi_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_bengkak_sore" id="edit_chas_bengkak_sore_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_bengkak_sore" id="edit_chas_bengkak_sore_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_bengkak_malam" id="edit_chas_bengkak_malam_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_bengkak_malam" id="edit_chas_bengkak_malam_tidak" value="2"></td>
              </tr>
              <tr>
                <td>Nyeri</td>
                <td class="text-center"><input type="radio" name="edit_chas_nyeri_pagi" id="edit_chas_nyeri_pagi_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_nyeri_pagi" id="edit_chas_nyeri_pagi_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_nyeri_sore" id="edit_chas_nyeri_sore_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_nyeri_sore" id="edit_chas_nyeri_sore_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_nyeri_malam" id="edit_chas_nyeri_malam_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_nyeri_malam" id="edit_chas_nyeri_malam_tidak" value="2"></td>
              </tr>
              <tr>
                <td>Vena Mengeras</td>
                <td class="text-center"><input type="radio" name="edit_chas_vena_pagi" id="edit_chas_vena_pagi_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_vena_pagi" id="edit_chas_vena_pagi_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_vena_sore" id="edit_chas_vena_sore_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_vena_sore" id="edit_chas_vena_sore_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_vena_malam" id="edit_chas_vena_malam_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_vena_malam" id="edit_chas_vena_malam_tidak" value="2"></td>
              </tr>
              <tr>
                <td>Timbul Pus</td>
                <td class="text-center"><input type="radio" name="edit_chas_pus_pagi" id="edit_chas_pus_pagi_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_pus_pagi" id="edit_chas_pus_pagi_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_pus_sore" id="edit_chas_pus_sore_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_pus_sore" id="edit_chas_pus_sore_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_pus_malam" id="edit_chas_pus_malam_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_pus_malam" id="edit_chas_pus_malam_tidak" value="2"></td>
              </tr>
              <tr>
                <td rowspan="5" class="text-center"><b>4</b></td>
                <td colspan="7"><b>DRESSING</b></td>
              </tr>
              <tr>
                <td>Terfikasi Baik</td>
                <td class="text-center"><input type="radio" name="edit_chas_terfikasi_pagi" id="edit_chas_terfikasi_pagi_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_terfikasi_pagi" id="edit_chas_terfikasi_pagi_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_terfikasi_sore" id="edit_chas_terfikasi_sore_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_terfikasi_sore" id="edit_chas_terfikasi_sore_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_terfikasi_malam" id="edit_chas_terfikasi_malam_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_terfikasi_malam" id="edit_chas_terfikasi_malam_tidak" value="2"></td>
              </tr>
              <tr>
                <td>Darah</td>
                <td class="text-center"><input type="radio" name="edit_chas_darah_pagi" id="edit_chas_darah_pagi_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_darah_pagi" id="edit_chas_darah_pagi_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_darah_sore" id="edit_chas_darah_sore_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_darah_sore" id="edit_chas_darah_sore_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_darah_malam" id="edit_chas_darah_malam_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_darah_malam" id="edit_chas_darah_malam_tidak" value="2"></td>
              </tr>
              <tr>
                <td>Kotor</td>
                <td class="text-center"><input type="radio" name="edit_chas_kotor_pagi" id="edit_chas_kotor_pagi_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_kotor_pagi" id="edit_chas_kotor_pagi_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_kotor_sore" id="edit_chas_kotor_sore_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_kotor_sore" id="edit_chas_kotor_sore_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_kotor_malam" id="edit_chas_kotor_malam_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_kotor_malam" id="edit_chas_kotor_malam_tidak" value="2"></td>
              </tr>
              <tr>
                <td>Basah</td>
                <td class="text-center"><input type="radio" name="edit_chas_basah_pagi" id="edit_chas_basah_pagi_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_basah_pagi" id="edit_chas_basah_pagi_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_basah_sore" id="edit_chas_basah_sore_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_basah_sore" id="edit_chas_basah_sore_tidak" value="2"></td>
                <td class="text-center"><input type="radio" name="edit_chas_basah_malam" id="edit_chas_basah_malam_ya" value="1"></td>
                <td class="text-center"><input type="radio" name="edit_chas_basah_malam" id="edit_chas_basah_malam_tidak" value="2"></td>
              </tr>
              <tr>
                <td colspan="2"><b>TINDAKAN</b></td>
                <td colspan="2"><textarea name="edit_chas_tindakan_pagi" id="edit_chas_tindakan_pagi" class="form-control"></textarea></td>
                <td colspan="2"><textarea name="edit_chas_tindakan_sore" id="edit_chas_tindakan_sore" class="form-control"></textarea></td>
                <td colspan="2"><textarea name="edit_chas_tindakan_malam" id="edit_chas_tindakan_malam" class="form-control"></textarea></td>
              </tr>
              <tr>
                  <td colspan="2"><b>Nama Perawat</b></td>
                  <td colspan="2"><input type="text" name="edit_chas_perawat_pagi" id="edit_chas_perawat_pagi" class="select2c-input"></td>
                  <td colspan="2"><input type="text" name="edit_chas_perawat_sore" id="edit_chas_perawat_sore" class="select2c-input"></td>
                  <td colspan="2"><input type="text" name="edit_chas_perawat_malam" id="edit_chas_perawat_malam" class="select2c-input"></td>
              </tr>
            </tbody>
          </table>
        <?= form_close(); ?>
      </div>
      <div class="modal-footer" id="update_lo">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
        <button type="button" title="Update Data" class="btn btn-info" onclick="updateChas()"><i class="fas fa-fw fa-save mr-1"></i>Update Data</button>
      </div>
    </div>
  </div>
</div>

<!-- End Modal Edit -->

<!-- Modal Detail -->
<div id="modal_detail_chas" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">DETAIL CEKLIS HARIAN AKSES SENTRAL</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body detail_data_chas">
              <input type="hidden" name="chas_id" id="detail_chas_id">
              <input type="hidden" name="id_pendaftaran" id="detail_chas_id_pendaftaran">
              <input type="hidden" name="id_layanan_pendaftaran" id="detail_chas_id_layanan_pendaftaran">
              <table class="table table-sm table-borderless table-striped" style="margin-top: -15px; border: none;">
                <tr>
                  <td width="20%">Jenis Pemasangan</td>
                  <td width="1%">:</td>
                  <td width="10%"><span id="detail_chas_Pemasangan_picc"></td>
                  <td width="10%"><span id="detail_chas_Pemasangan_cdl"></td>
                  <td width="10%"><span id="detail_chas_Pemasangan_cvc"></td>
                  <td width="10%"><span id="detail_chas_Pemasangan_uac"></td>
                  <td width="10%"><span id="detail_chas_Pemasangan_uvc"></td>
                </tr>
                <tr>
                  <td>Jenis Kateter</td>
                  <td>:</td=>
                  <td><span id="detail_chas_kateter_premicath"></td>
                  <td><span id="detail_chas_kateter_nutriline"></td>
                  <td><span id="detail_chas_kateter_doble"></td>
                  <td><span id="detail_chas_kateter_triple"></td>
                  <td></td>
                </tr>
                <tr>
                  <td>Tanggal Pemasangan</td>
                  <td>:</td>
                  <td colspan="5"><span id="detail_chas_tgl_pemasangan"></span></td>
                </tr>
                <tr>
                  <td>Lokasi Pemasangan Kateter</td>
                  <td>:</td>
                  <td colspan="5"><span id="detail_chas_lokasi"></td>
                </tr>
                <tr>
                  <td>Batas Kateter Pada kulit</td>
                  <td>:</td>
                  <td colspan="5"><span id="detail_chas_batas"> Cm</td>
                </tr>
              </table>
              <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="table_detail_chas">
                <thead>
                  <tr>
                      <th class="text-center" rowspan="3" width="3%">No</th>
                      <th class="text-center" rowspan="3">KETERANGAN</th>
                      <th class="text-left" colspan="6">Tanggal : <span id="detail_chas_tgl"></span></th>
                  </tr>
                  <tr>
                      <th class="text-center" colspan="2">PAGI</th>
                      <th class="text-center" colspan="2">SORE</th>
                      <th class="text-center" colspan="2">MALAM</th>
                  </tr>
                  <tr>
                      <th class="text-center" width="12%">YA</th>
                      <th class="text-center" width="12%">TIDAK</th>
                      <th class="text-center" width="12%">YA</th>
                      <th class="text-center" width="12%">TIDAK</th>
                      <th class="text-center" width="12%">YA</th>
                      <th class="text-center" width="12%">TIDAK</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                      <td rowspan="8" class="text-center"><b>1</b></td>
                      <td colspan="7"><b>KLINIS PASIEN</b></td>
                  </tr>
                  <tr>
                    <td>Alert</td>
                    <td class="text-center"><span id="detail_chas_alert_pagi_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_alert_pagi_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_alert_sore_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_alert_sore_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_alert_malam_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_alert_malam_tidak"></span></td>
                  </tr>
                  <tr>
                    <td>Verbal</td>
                    <td class="text-center"><span id="detail_chas_verbal_pagi_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_verbal_pagi_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_verbal_sore_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_verbal_sore_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_verbal_malam_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_verbal_malam_tidak"></span></td>
                  </tr>
                  <tr>
                    <td>Pain</td>
                    <td class="text-center"><span id="detail_chas_pain_pagi_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_pain_pagi_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_pain_sore_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_pain_sore_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_pain_malam_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_pain_malam_tidak"></span></td>
                  </tr>
                  <tr>
                    <td>Unrespon</td>
                    <td class="text-center"><span id="detail_chas_unrespon_pagi_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_unrespon_pagi_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_unrespon_sore_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_unrespon_sore_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_unrespon_malam_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_unrespon_malam_tidak"></span></td>
                  </tr>
                  <tr>
                    <td>Demam</td>
                    <td class="text-center"><span id="detail_chas_demam_pagi_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_demam_pagi_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_demam_sore_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_demam_sore_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_demam_malam_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_demam_malam_tidak"></span></td>
                  </tr>
                  <tr>
                    <td>Takikardi</td>
                    <td class="text-center"><span id="detail_chas_takikardi_pagi_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_takikardi_pagi_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_takikardi_sore_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_takikardi_sore_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_takikardi_malam_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_takikardi_malam_tidak"></span></td>
                  </tr>
                  <tr>
                    <td>Takipnoe</td>
                    <td class="text-center"><span id="detail_chas_takipnoe_pagi_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_takipnoe_pagi_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_takipnoe_sore_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_takipnoe_sore_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_takipnoe_malam_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_takipnoe_malam_tidak"></span></td>
                  </tr>
                  <tr>
                      <td rowspan="5" class="text-center"><b>2</b></td>
                      <td colspan="7"><b>KATETER</b></td>
                  </tr>
                  <tr>
                    <td>Kateter Tertekuk</td>
                    <td class="text-center"><span id="detail_chas_tertekuk_pagi_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_tertekuk_pagi_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_tertekuk_sore_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_tertekuk_sore_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_tertekuk_malam_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_tertekuk_malam_tidak"></span></td>
                  </tr>
                  <tr>
                    <td>Kateter Rembes/Bocor</td>
                    <td class="text-center"><span id="detail_chas_rembes_pagi_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_rembes_pagi_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_rembes_sore_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_rembes_sore_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_rembes_malam_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_rembes_malam_tidak"></span></td>
                  </tr>
                  <tr>
                    <td>Adakah Aliran Balik</td>
                    <td class="text-center"><span id="detail_chas_aliran_pagi_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_aliran_pagi_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_aliran_sore_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_aliran_sore_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_aliran_malam_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_aliran_malam_tidak"></span></td>
                  </tr>
                  <tr>
                    <td>Sumbatan Kateter</td>
                    <td class="text-center"><span id="detail_chas_sumbatan_pagi_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_sumbatan_pagi_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_sumbatan_sore_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_sumbatan_sore_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_sumbatan_malam_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_sumbatan_malam_tidak"></span></td>
                  </tr>
                  <tr>
                      <td rowspan="6" class="text-center"><b>3</b></td>
                      <td colspan="7"><b>KONDISI KULIT AREA INSERSI</b></td>
                  </tr>
                  <tr>
                    <td>Kemerahan</td>
                    <td class="text-center"><span id="detail_chas_kemerahan_pagi_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_kemerahan_pagi_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_kemerahan_sore_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_kemerahan_sore_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_kemerahan_malam_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_kemerahan_malam_tidak"></span></td>
                  </tr>
                  <tr>
                    <td>Bengkak</td>
                    <td class="text-center"><span id="detail_chas_bengkak_pagi_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_bengkak_pagi_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_bengkak_sore_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_bengkak_sore_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_bengkak_malam_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_bengkak_malam_tidak"></span></td>
                  </tr>
                  <tr>
                    <td>Nyeri</td>
                    <td class="text-center"><span id="detail_chas_nyeri_pagi_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_nyeri_pagi_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_nyeri_sore_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_nyeri_sore_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_nyeri_malam_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_nyeri_malam_tidak"></span></td>
                  </tr>
                  <tr>
                    <td>Vena Mengeras</td>
                    <td class="text-center"><span id="detail_chas_vena_pagi_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_vena_pagi_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_vena_sore_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_vena_sore_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_vena_malam_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_vena_malam_tidak"></span></td>
                  </tr>
                  <tr>
                    <td>Timbul Pus</td>
                    <td class="text-center"><span id="detail_chas_pus_pagi_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_pus_pagi_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_pus_sore_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_pus_sore_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_pus_malam_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_pus_malam_tidak"></span></td>
                  </tr>
                  <tr>
                      <td rowspan="5" class="text-center"><b>4</b></td>
                      <td colspan="7"><b>DRESSING</b></td>
                  </tr>
                  <tr>
                    <td>Terfikasi Baik</td>
                    <td class="text-center"><span id="detail_chas_terfikasi_pagi_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_terfikasi_pagi_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_terfikasi_sore_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_terfikasi_sore_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_terfikasi_malam_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_terfikasi_malam_tidak"></span></td>
                  </tr>
                  <tr>
                    <td>Darah</td>
                    <td class="text-center"><span id="detail_chas_darah_pagi_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_darah_pagi_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_darah_sore_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_darah_sore_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_darah_malam_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_darah_malam_tidak"></span></td>
                  </tr>
                  <tr>
                    <td>Kotor</td>
                    <td class="text-center"><span id="detail_chas_kotor_pagi_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_kotor_pagi_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_kotor_sore_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_kotor_sore_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_kotor_malam_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_kotor_malam_tidak"></span></td>
                  </tr>
                  <tr>
                    <td>Basah</td>
                    <td class="text-center"><span id="detail_chas_basah_pagi_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_basah_pagi_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_basah_sore_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_basah_sore_tidak"></span></td>
                    <td class="text-center"><span id="detail_chas_basah_malam_ya"></span></td>
                    <td class="text-center"><span id="detail_chas_basah_malam_tidak"></span></td>
                  <tr>
                    <td colspan="2"><b>TINDAKAN</b></td>
                    <td colspan="2"><span id="detail_chas_tindakan_pagi"></td>
                    <td colspan="2"><span id="detail_chas_tindakan_sore"></td>
                    <td colspan="2"><span id="detail_chas_tindakan_malam"></td>
                  </tr>
                  <tr>
                    <td colspan="2"><b>Nama Perawat</b></td>
                    <td colspan="2"><span id="detail_chas_perawat_pagi"></td>
                    <td colspan="2"><span id="detail_chas_perawat_sore"></td>
                    <td colspan="2"><span id="detail_chas_perawat_malam"></td>
                  </tr>
                </tbody>
              </table>
              <hr>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Detail -->