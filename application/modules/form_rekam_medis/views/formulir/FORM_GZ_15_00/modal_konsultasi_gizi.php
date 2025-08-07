<!-- <style type="text/css">td {border: solid 1px;}</style> -->
<!-- Modal Entri Keperawatan -->
<div class="modal fade" id="modal_konsultasi_gizi" role="dialog" data-backdrop="static" aria-labelledby="modal-resume-keperawatan-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
    <div class="modal-content">
      <div class="modal-header">
        <div class="title">
          <h5 class="modal-title bold" id="modal_konsultasi_gizi_title">FORMULIR KONSULTASI GIZI</h5>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'id=form_konsultasi_gizi class="form-horizontal"') ?>
          <input type="hidden" name="kg_id" id="kg_id">
          <input type="hidden" name="id_layanan_pendaftaran" id="kg_id_layanan_pendaftaran">
          <input type="hidden" name="id_pendaftaran" id="kg_id_pendaftaran">
          <input type="hidden" name="id_pasien" id="kg_id_pasien">
          <input type="hidden" name="id_users" value="<?= $this->session->userdata("id_translucent") ?>">
          <input type="hidden" name="action" id="action_kg">

          <!-- header -->
          <div class="row">
            <div class="col-lg-6">
              <div class="table-responsive">
                <table class="table table-sm table-striped">
                  <tr>
                    <td width="20%" class="bold">Nama Pasien</td>
                    <td wdith="80%">: <span id="kg_nama_pasien"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">No. RM</td>
                    <td>: <span id="kg_no_rm"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">Tanggal Lahir</td>
                    <td>: <span id="kg_tanggal_lahir"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">Jenis Kelamin</td>
                    <td>: <span id="kg_jenis_kelamin"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">Alamat</td>
                    <td>: <span id="kg_alamat"></span></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <!-- end header -->

          <!-- content -->
          <div class="row">
            <div class="col-lg-12">
              <table class="table table-sm table-striped">
                <tbody>
                  <tr>
                    <td colspan="9" class="pl-3">a. Antropometri</td>
                  </tr>
                  <tr>
                    <td width="5%" class="pl-3">BB</td>
                    <td width="1%">:</td>
                    <td><input type="text" id="kg_bb" name="kg_bb" class="custom-form clear-input d-inline-block col-lg-3"> kg</td>
                    <td width="5%" class="pl-3">LLA</td>
                    <td width="1%">:</td>
                    <td><input type="text" id="kg_lla" name="kg_lla" class="custom-form clear-input d-inline-block col-lg-3"> cm</td>
                    <td width="10%" class="pl-3">Perubahan BB</td>
                    <td width="1%">:</td>
                    <td><input type="text" id="kg_pbb" name="kg_pbb" class="custom-form clear-input d-inline-block col-lg-10"></td>
                  </tr>
                  <tr>
                    <td class="pl-3">TB</td>
                    <td>:</td>
                    <td><input type="text" id="kg_tb" name="kg_tb" class="custom-form clear-input d-inline-block col-lg-3"> cm</td>
                    <td class="pl-3">IMT</td>
                    <td>:</td>
                    <td><input type="text" id="kg_imt" name="kg_imt" class="custom-form clear-input d-inline-block col-lg-3"> kg/m²</td>
                    <td colspan="3"></td>
                  </tr>
                  <tr>
                    <td colspan="9" class="pl-3">b. Biokimia</td>
                  </tr>
                  <tr>
                    <td colspan="9" class="text-center pl-5"><textarea name="kg_biokimia" id="kg_biokimia" class="custom-textarea" rows="5"></textarea></td>
                  </tr>
                  <tr>
                    <td colspan="9" class="pl-3">c. Fisik / Klinik</td>
                  </tr>
                  <tr>
                    <td colspan="9" class="text-center pl-5"><textarea name="kg_klinis" id="kg_klinis" class="custom-textarea" rows="5"></textarea></td>
                  </tr>
                  <tr>
                    <td colspan="9" class="pl-3">d. Riwayat Gizi</td>
                  </tr>
                  <tr>
                    <td colspan="9" class="text-center pl-5"><textarea name="kg_gizi" id="kg_gizi" class="custom-textarea" rows="5"></textarea></td>
                  </tr>
                  <tr>
                    <td colspan="9" class="pl-3">e. Riwayat Personal</td>
                  </tr>
                  <tr>
                    <td colspan="9" class="text-center pl-5"><textarea name="kg_personal" id="kg_personal" class="custom-textarea" rows="5"></textarea></td>
                  </tr>
                  <tr>
                    <th colspan="9"><b>Diagnosis Gizi</b></th>
                  </tr>
                  <tr>
                    <td colspan="9" class="text-center pl-5"><textarea name="kg_diagnosis" id="kg_diagnosis" class="custom-textarea" rows="5"></textarea></td>
                  </tr>
                  <tr>
                    <th colspan="9"><b>Intervensi Gizi</b></th>
                  </tr>
                  <tr>
                    <td colspan="9" class="pl-3">a. Tujuan</td>
                  </tr>
                  <tr>
                    <td colspan="9" class="text-center pl-5"><textarea name="kg_tujuan" id="kg_tujuan" class="custom-textarea" rows="5"></textarea></td>
                  </tr>
                  <tr>
                    <td colspan="9" class="pl-3">b. Intervensi</td>
                  </tr>
                  <tr>
                    <td colspan="9" class="text-center pl-5"><textarea name="kg_intervensi" id="kg_intervensi" class="custom-textarea" rows="5"></textarea></td>
                  </tr>
                  <tr>
                    <td colspan="9" class="pl-3">c. Konseling Giz / Edukasi</td>
                  </tr>
                  <tr>
                    <td colspan="9" class="text-center pl-5"><textarea name="kg_konseling" id="kg_konseling" class="custom-textarea" rows="5"></textarea></td>
                  </tr>
                  <tr>
                    <th colspan="9"><b>Rencana Monitoring dan Evaluasi Gizi</b></th>
                  </tr>
                  <tr>
                    <td colspan="9" class="text-center pl-5"><textarea name="kg_evaluasi" id="kg_evaluasi" class="custom-textarea" rows="5"></textarea></td>
                  </tr>
                </tbody>
              </table>
              <table class="table table-sm table-striped">
                <tbody>
                  <tr>
                    <td width="33%" class="center">
                      Tanggal & Jam <input type="text" name="kg_tgl_petugas" id="kg_tgl_petugas" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="dd/mm/yyyy hh:mm">
                    </td>
                    <td width="33%">
                    </td>
                    <td width="33%" class="center"></td>
                  </tr>
                  <tr>
                    <td class="center">Dietisien / Nutrisionist</td>
                    <td></td>
                    <td class="center">Pasien</td>
                  </tr>
                  <tr>
                    <td class="center"><input type="text" name="kg_petugas" id="kg_petugas" class="select2c-input ml-2"></td>
                    <td class="center"><input type="text" name="kg_dokter" id="kg_dokter" class="select2c-input ml-2"></td>
                    <td class="center"><span id="kg_nama_pasien_2"></span></td>

                  </tr>
                  <tr>
                    <td class="center">Tanda Tangan</td>
                    <td class="center">Tanda Tangan</td>
                    <td class="center"></td>
                  </tr>
                  <tr>
                    <td class="center">
                      <input type="checkbox" name="kg_ttd" id="kg_ttd" value="1" class="custom-form col-lg-1 mx-auto">
                    </td>
                    <td class="center">
                      <input type="checkbox" name="kg_ttd_dokter" id="kg_ttd_dokter" value="1" class="custom-form col-lg-1 mx-auto">
                    </td>
                    <td class="center">
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="col-lg-12" style="margin-bottom: 10px;display: flex;justify-content: flex-end;">              
              <button type="button" class="btn btn-info mr-1" onclick="konfirmasiSimpanEntriKg()" id="btn_simpan_gd"><i class="fas fa-fw fa-plus mr-1"></i>Konfirmasi</button>
              <button type="button" class="btn btn-secondary" id="btn_reset_kg"><i class="fas fa-history mr-1"></i>Reset Form</button>                    
            </div>
            <div class="col-lg-12">
              <div class="table-responsive">
                <table id="table-konsultasi" class="table table-hover table-striped table-sm color-table info-table">
                  <thead>
                    <tr>
                      <th class="center">No</th>
                      <th class="center">Tanggal</th>
                      <th class="left">Dokter</th>
                      <th class="left">Dietisien / Nutrisionist</th>
                      <th class="center">Tanggal Buat</th>
                      <th class="left">Petugas</th>
                      <th class="right"></th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
            </div>
          </div>
          
          <!-- end content -->
        <?= form_close() ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Entri Keperawatan -->
