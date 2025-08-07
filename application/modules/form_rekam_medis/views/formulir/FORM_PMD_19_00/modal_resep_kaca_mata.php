<!-- <style type="text/css">td {border: solid 1px;}</style> -->
<!-- Modal Entri Keperawatan -->
<div class="modal fade" id="modal_resep_kaca_mata" role="dialog" data-backdrop="static" aria-labelledby="modal-resume-keperawatan-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
    <div class="modal-content">
      <div class="modal-header">
        <div class="title">
          <h5 class="modal-title bold" id="modal_resep_kaca_mata_title">RESEP KACA MATA</h5>
          <h6 class="modal-title bold" id="modal_resep_kaca_mata_title">Monofocus / Bifocus</h6>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'id=form_resep_kaca_mata class="form-horizontal"') ?>
          <input type="hidden" name="rkm_id" id="rkm_id">
          <input type="hidden" name="id_layanan_pendaftaran" id="rkm_id_layanan_pendaftaran">
          <input type="hidden" name="id_pendaftaran" id="rkm_id_pendaftaran">
          <input type="hidden" name="id_pasien" id="rkm_id_pasien">
          <input type="hidden" name="id_bed" id="rkm_id_bed">
          <input type="hidden" name="id_users" id="rkm_id_users"
          <input type="hidden" name="action" id="action_rkm">

          <!-- header -->
          <div class="row">
            <div class="col-lg-6">
              <div class="table-responsive">
                <table class="table table-sm table-striped">
                  <tr>
                    <td width="20%" class="bold">Nama Pasien</td>
                    <td wdith="80%">: <span id="rkm_nama_pasien"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">No. RM</td>
                    <td>: <span id="rkm_no_rm"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">Tanggal Lahir</td>
                    <td>: <span id="rkm_tanggal_lahir"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">Jenis Kelamin</td>
                    <td>: <span id="rkm_jenis_kelamin"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">Alamat</td>
                    <td>: <span id="rkm_alamat"></span></td>
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
                    <td class="text-center"><img src="<?= resource_url() ?>images/attributes/resep kacamata putih (1).png" width="500"></td>
                  </tr>
                </table>
                <table class="table table-no-border table-sm table-striped">
                  <tr>
                    <td class="text-center"></td>
                    <td class="text-center">Spher</td>
                    <td class="text-center">Cyl</td>
                    <td class="text-center">Axis</td>
                    <td class="text-center">Prism</td>
                    <td class="text-center">Bas</td>
                    <td class="text-center">Spher</td>
                    <td class="text-center">Cyl</td>
                    <td class="text-center">Axis</td>
                    <td class="text-center">Prism</td>
                    <td class="text-center">Bas</td>
                    <td class="text-center">Jarak Pupil</td>
                  </tr>
                  <tr>
                    <td class="text-center">Jauh</td>
                    <td class="text-center"><input type="text" name="rkm_kiri_jauh_Spher" id="rkm_kiri_jauh_Spher" class="custom-form clear-input d-inline-block col-lg-12"></td>
                    <td class="text-center"><input type="text" name="rkm_kiri_jauh_cyl" id="rkm_kiri_jauh_cyl" class="custom-form clear-input d-inline-block col-lg-12"></td>
                    <td class="text-center"><input type="text" name="rkm_kiri_jauh_axis" id="rkm_kiri_jauh_axis" class="custom-form clear-input d-inline-block col-lg-12"></td>
                    <td class="text-center"><input type="text" name="rkm_kiri_jauh_prism" id="rkm_kiri_jauh_prism" class="custom-form clear-input d-inline-block col-lg-12"></td>
                    <td class="text-center"><input type="text" name="rkm_kiri_jauh_bas" id="rkm_kiri_jauh_bas" class="custom-form clear-input d-inline-block col-lg-12"></td>
                    <td class="text-center"><input type="text" name="rkm_kanan_jauh_Spher" id="rkm_kanan_jauh_Spher" class="custom-form clear-input d-inline-block col-lg-12"></td>
                    <td class="text-center"><input type="text" name="rkm_kanan_jauh_cyl" id="rkm_kanan_jauh_cyl" class="custom-form clear-input d-inline-block col-lg-12"></td>
                    <td class="text-center"><input type="text" name="rkm_kanan_jauh_axis" id="rkm_kanan_jauh_axis" class="custom-form clear-input d-inline-block col-lg-12"></td>
                    <td class="text-center"><input type="text" name="rkm_kanan_jauh_prism" id="rkm_kanan_jauh_prism" class="custom-form clear-input d-inline-block col-lg-12"></td>
                    <td class="text-center"><input type="text" name="rkm_kanan_jauh_bas" id="rkm_kanan_jauh_bas" class="custom-form clear-input d-inline-block col-lg-12"></td>
                    <td class="text-center"><input type="text" name="rkm_jauh_pupil" id="rkm_jauh_pupil" class="custom-form clear-input d-inline-block col-lg-12"></td>
                  </tr>
                  <tr>
                    <td class="text-center">Dekat</td>
                    <td class="text-center"><input type="text" name="rkm_kiri_dekat_Spher" id="rkm_kiri_dekat_Spher" class="custom-form clear-input d-inline-block col-lg-12"></td>
                    <td class="text-center"><input type="text" name="rkm_kiri_dekat_cyl" id="rkm_kiri_dekat_cyl" class="custom-form clear-input d-inline-block col-lg-12"></td>
                    <td class="text-center"><input type="text" name="rkm_kiri_dekat_axis" id="rkm_kiri_dekat_axis" class="custom-form clear-input d-inline-block col-lg-12"></td>
                    <td class="text-center"><input type="text" name="rkm_kiri_dekat_prism" id="rkm_kiri_dekat_prism" class="custom-form clear-input d-inline-block col-lg-12"></td>
                    <td class="text-center"><input type="text" name="rkm_kiri_dekat_bas" id="rkm_kiri_dekat_bas" class="custom-form clear-input d-inline-block col-lg-12"></td>
                    <td class="text-center"><input type="text" name="rkm_kanan_dekat_Spher" id="rkm_kanan_dekat_Spher" class="custom-form clear-input d-inline-block col-lg-12"></td>
                    <td class="text-center"><input type="text" name="rkm_kanan_dekat_cyl" id="rkm_kanan_dekat_cyl" class="custom-form clear-input d-inline-block col-lg-12"></td>
                    <td class="text-center"><input type="text" name="rkm_kanan_dekat_axis" id="rkm_kanan_dekat_axis" class="custom-form clear-input d-inline-block col-lg-12"></td>
                    <td class="text-center"><input type="text" name="rkm_kanan_dekat_prism" id="rkm_kanan_dekat_prism" class="custom-form clear-input d-inline-block col-lg-12"></td>
                    <td class="text-center"><input type="text" name="rkm_kanan_dekat_bas" id="rkm_kanan_dekat_bas" class="custom-form clear-input d-inline-block col-lg-12"></td>
                    <td class="text-center"><input type="text" name="rkm_dekat_pupil" id="rkm_dekat_pupil" class="custom-form clear-input d-inline-block col-lg-12"></td>
                  </tr>
                  <tr>
                    <td colspan="9"></td>
                    <td colspan="3" class="text-center"><input type="text" name="rkm_tanggal" id="rkm_tanggal" class="custom-form clear-input d-inline-block col-lg-6" placeholder="dd/mm/yyyy"></td>
                  </tr>  
                  <tr>
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
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <!-- end content -->
        <?= form_close() ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="cetakResepKacaMata()" id="btn_cetak_rkm"><i class="fas fa-print mr-1"></i>Print</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
        <button type="button" class="btn btn-info" onclick="konfirmasiSimpanEntriRkm()" id="btn_simpan_rkm"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Entri Keperawatan -->
