<!-- // LEMBAR OBSERVASI -->
<div class="modal fade" id="modal_lembar_observasi" role="dialog" data-backdrop="static" aria-labelledby="modal-resume-keperawatan-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" style="max-width: 95%;">
    <div class="modal-content">
      <div class="modal-header">
        <div class="title">
          <h5 class="modal-title bold" id="modal_lembar_observasi_title">LEMBAR OBSERVASI</h5>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'id=form_lembar_observasi class="form-horizontal"') ?>
          <input type="hidden" name="lo_id" id="lo_id">
          <input type="hidden" name="id_layanan_pendaftaran" id="lo_id_layanan_pendaftaran">
          <input type="hidden" name="id_pendaftaran" id="lo_id_pendaftaran">
          <input type="hidden" name="id_pasien" id="lo_id_pasien">
          <input type="hidden" name="bed" id="lo_bed">
          <input type="hidden" name="action" id="action_lo">

          <!-- header -->
          <div class="row">
            <div class="col-lg-6">
              <div class="table-responsive">
                <table class="table table-sm table-striped">
                  <tr>
                    <td width="20%" class="bold">Nama Pasien</td>
                    <td wdith="80%">: <span id="lo_nama_pasien"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">No. RM</td>
                    <td>: <span id="lo_no_rm"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">Tanggal Lahir</td>
                    <td>: <span id="lo_tanggal_lahir"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">Jenis Kelamin</td>
                    <td>: <span id="lo_jenis_kelamin"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">Alamat</td>
                    <td>: <span id="lo_alamat"></span></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <!-- end header -->

          <!-- content -->
          <div class="row">
            <div class="col-lg-12">
              <div class="widget-body" id="data_lo">
                <div id="lo_buka_tutup">
                </div>
                  <table class="table table-sm table-striped table-bordered"id="tabel_lo">
                    <thead style="background-color:rgba(221, 228, 238, 1);">
                      <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Tanggal & jam</th>
                        <th class="text-center">TD</th>
                        <th class="text-center">N</th>
                        <th class="text-center">R</th>
                        <th class="text-center">S</th>
                        <th class="text-center">SAT</th>
                        <th class="text-center">DJJ</th>
                        <th class="text-center">HIS</th>
                        <th class="text-center">TFU</th>
                        <th class="text-center">KONTRAKSI UTERUS</th>
                        <th class="text-center">PERDARAHAN</th>
                        <th class="text-center">URIN</th>
                        <th class="text-center">KETERANGAN</th>
                        <th class="text-center">PETUGAS</th>
                        <th class="text-center" id='lo_alat'>ALAT</th>
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
        <button type="button" class="btn btn-info" onclick="konfirmasiSimpanEntriLo()" id="btn_simpan_lo"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Entri Keperawatan -->

<!-- // PRR -->
<div id="modal_edit_lembar_observasi" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-success" style="font-size: 30px;">Edit Lembar Observasi</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body edit_data_lo">
                <?= form_open('', 'id=form_edit_lembar_observasi class=form-horizontal '); ?>
                  <input type="hidden" name="lo_id" id="edit_lo_id">
                  <input type="hidden" name="id_pendaftaran" id="edit_lo_id_pendaftaran">
                  <input type="hidden" name="id_layanan_pendaftaran" id="edit_lo_id_layanan_pendaftaran">
                  <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-pr">
                    <thead style="background-color:rgba(238, 160, 243, 1);">
                        <tr>
                          <th width="7%" class="text-center">Tanggal & jam</th>
                          <th width="5%" class="text-center">TD</th>
                          <th width="4%" class="text-center">N</th>
                          <th width="4%" class="text-center">R</th>
                          <th width="4%" class="text-center">S</th>
                          <th width="4%" class="text-center">SAT</th>
                          <th width="7%" class="text-center">DJJ</th>
                          <th width="7%" class="text-center">HIS</th>
                          <th width="4%" class="text-center">TFU</th>
                          <th width="9%" class="text-center">KONTRAKSI UTERUS</th>
                          <th width="7%" class="text-center">PERDARAHAN</th>
                          <th width="4%" class="text-center">URIN</th>
                          <th width="10%" class="text-center">KETERANGAN</th>
                      </tr>
                    </thead>
                    <tbody>
                        <!-- <tr>
                            <td><input type="text" name="edit_lo_tgl" id="edit_lo_tgl" class="custom-form clear-input d-inline-block col-lg-12"></td>
                            <td><input type="text" name="edit_lo_td" id="edit_lo_td" class="custom-form clear-input d-inline-block col-lg-12"></td>
                            <td><input type="text" name="edit_lo_n" id="edit_lo_n" class="custom-form clear-input d-inline-block col-lg-12"></td>
                            <td><input type="text" name="edit_lo_r" id="edit_lo_r" class="custom-form clear-input d-inline-block col-lg-12"></td>
                            <td><input type="text" name="edit_lo_s"  id="edit_lo_s" class="custom-form clear-input d-inline-block col-lg-12"></td>
                            <td><input type="text" name="edit_lo_sat" id="edit_lo_sat" class="custom-form clear-input d-inline-block col-lg-12"></td>
                            <td><input type="text" name="edit_lo_djj" id="edit_lo_djj" class="custom-form clear-input d-inline-block col-lg-12"></td>
                            <td><input type="text" name="edit_lo_his" id="edit_lo_his" class="custom-form clear-input d-inline-block col-lg-12"></td>
                            <td><input type="text" name="edit_lo_tfu" id="edit_lo_tfu" class="custom-form clear-input d-inline-block col-lg-12"></td>
                            <td><input type="text" name="edit_lo_kontraksi" id="edit_lo_kontraksi" class="custom-form clear-input d-inline-block col-lg-12"></td>
                            <td><input type="text" name="edit_lo_perdarahan" id="edit_lo_perdarahan" class="custom-form clear-input d-inline-block col-lg-12"></td>
                            <td><input type="text" name="edit_lo_urin" id="edit_lo_urin" class="custom-form clear-input d-inline-block col-lg-12"></td>
                            <td><input type="text" name="edit_lo_ket" id="edit_lo_ket" class="custom-form clear-input d-inline-block col-lg-12"></td>
                        </tr> -->
                        
                        <tr>
                            <td><input type="text" name="edit_lo_tgl" id="edit_lo_tgl" class="custom-form clear-input d-inline-block col-lg-12"></td>
                            <td><input type="text" name="edit_lo_td" id="edit_lo_td" class="custom-form clear-input d-inline-block col-lg-12"></td>
                            <td><input type="text" name="edit_lo_n" id="edit_lo_n" class="custom-form clear-input d-inline-block col-lg-12"></td>
                            <td><input type="text" name="edit_lo_r" id="edit_lo_r" class="custom-form clear-input d-inline-block col-lg-12"></td>
                            <td><input type="text" name="edit_lo_s"  id="edit_lo_s" class="custom-form clear-input d-inline-block col-lg-12"></td>
                            <td><input type="text" name="edit_lo_sat" id="edit_lo_sat" class="custom-form clear-input d-inline-block col-lg-12"></td>
                            <td><textarea name="edit_lo_djj" id="edit_lo_djj" class="form-control clear-input" rows="2"></textarea></td>
                            <td><textarea name="edit_lo_his" id="edit_lo_his" class="form-control clear-input" rows="2"></textarea></td>
                            <td><input type="text" name="edit_lo_tfu" id="edit_lo_tfu" class="custom-form clear-input d-inline-block col-lg-12"></td>
                            <td><textarea name="edit_lo_kontraksi" id="edit_lo_kontraksi" class="form-control clear-input" rows="2"></textarea></td>
                            <td><textarea name="edit_lo_perdarahan" id="edit_lo_perdarahan" class="form-control clear-input" rows="2"></textarea></td>
                            <td><input type="text" name="edit_lo_urin" id="edit_lo_urin" class="custom-form clear-input d-inline-block col-lg-12"></td>
                            <td><textarea name="edit_lo_ket" id="edit_lo_ket" class="form-control clear-input" rows="2"></textarea></td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer" id="update_lo">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
              <button type="button" title="Update Data" class="btn btn-info" onclick="updateLo()"><i class="fas fa-fw fa-save mr-1"></i>Update Data</button>
            </div>
        </div>
    </div>
</div>