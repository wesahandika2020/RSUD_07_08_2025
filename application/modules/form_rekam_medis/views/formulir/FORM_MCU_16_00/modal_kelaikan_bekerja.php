<!-- <style type="text/css">td {border: solid 1px;}</style> -->
<!-- Modal Entri Keperawatan -->
<div class="modal fade" id="modal_mcu_16_00" role="dialog" data-backdrop="static" aria-labelledby="modal-resume-keperawatan-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
    <div class="modal-content">
      <div class="modal-header">
        <div class="title">
          <h5 class="modal-title bold" id="modal_mcu_16_00_title">SERTIFIKAT KELAIKAN BEKERJA</h5>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'id=form_mcu_16_00 class="form-horizontal"') ?>
          <input type="hidden" name="kb_id" id="kb_id">
          <input type="hidden" name="id_layanan_pendaftaran" id="kb_id_layanan_pendaftaran">
          <input type="hidden" name="id_pendaftaran" id="kb_id_pendaftaran">
          <input type="hidden" name="id_pasien" id="kb_id_pasien">
          <input type="hidden" name="id_bed" id="kb_id_bed">
          <input type="hidden" name="id_users" id="kb_id_users"
          <input type="hidden" name="action" id="kb_action">

          <!-- header -->
          <div class="row">
            <div class="col-lg-6">
              <div class="table-responsive">
                <table class="table table-sm table-striped">
                  <tr>
                    <td width="20%" class="bold">Nama Pasien</td>
                    <td wdith="80%">: <span id="kb_nama_pasien"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">No. RM</td>
                    <td>: <span id="kb_no_rm"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">Tanggal Lahir</td>
                    <td>: <span id="kb_tanggal_lahir"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">Jenis Kelamin</td>
                    <td>: <span id="kb_jenis_kelamin"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">Alamat</td>
                    <td>: <span id="kb_alamat"></span></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <!-- end header -->

          <!-- content -->
          <div class="row">
            <div class="col-lg-12">
              <div class="widget-body">
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
          <!-- end content -->
        <?= form_close() ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="cetakKelaikanBekerja()" id="kb_btn_cetak"><i class="fas fa-print mr-1"></i>Print</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
        <button type="button" class="btn btn-info" onclick="konfirmasiSimpanEntriKb()" id="kb_btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Entri Keperawatan -->
