<!-- <style type="text/css">td {border: solid 1px;}</style> -->
<!-- Modal Entri Keperawatan -->
<div class="modal fade" id="modal_entri_keperawatan_rm" role="dialog" data-backdrop="static" aria-labelledby="modal-resume-keperawatan-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
    <div class="modal-content">
      <div class="modal-header">
        <div class="title">
          <h5 class="modal-title bold" id="modal_entri_keperawatan_rm">SURGICAL SAFETY CHEKLIST DI LUAR KAMAR OPERASI</h5>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'id=form_entri_keperawatan class="form-horizontal"') ?>
        <input type="hidden" name="id_layanan_pendaftaran" id="ek_id_layanan_pendaftaran">
        <input type="hidden" name="id_pendaftaran" id="ek_id_pendaftaran">
        <input type="hidden" name="id_bed" id="ek-id-bed">
        <input type="hidden" name="ek_id_pasien" id="ek_id_pasien">
        <input type="hidden" name="ek_jenis_layanan" value="Rawat Inap" id="ek-jenis-layanan">
        <input type="hidden" name="id_users" id="ek-id-users" <?php $nama = $this->session->userdata('nama');
                                                              $nama_js = json_encode($nama); ?> value=<?php echo $nama_js; ?>>

        <!-- // APBT -->
        <input type="hidden" name="id_apbt" id="id-apbt">


        <input type="hidden" name="id_dpjp_utama_pagi_hidden" id="id-dpjp-utama-pagi-hidden">
        <input type="hidden" name="id_dokter_dpjp_sore_hidden" id="id-dokter-dpjp-sore-hidden">
        <input type="hidden" name="id_dokter_dpjp_malam_hidden" id="id-dokter-dpjp-malam-hidden">
        <input type="hidden" name="id_perawat_mengover_pagi_hidden" id="id-perawat-mengover-pagi-hidden">
        <input type="hidden" name="id_perawat_menerima_pagi_hidden" id="id-perawat-menerima-sore-hidden">
        <input type="hidden" name="id_perawat_mengover_sore_hidden" id="id-perawat-mengover-sore-hidden">
        <input type="hidden" name="id_perawat_menerima_sore_hidden" id="id-perawat-menerima-sore-hidden">
        <input type="hidden" name="id_perawat_mengover_malam_hidden" id="id-perawat-menover-malam-hidden">
        <input type="hidden" name="id_perawat_penerima_malam_hidden" id="id-perawat-menerima-malam-hidden">

        <!-- header -->
        <div class="row">
          <div class="col-lg-6">
            <div class="table-responsive">
              <table class="table table-sm table-striped">
                <tr>
                  <td width="20%" class="bold">Nama Pasien</td>
                  <td wdith="80%">: <span id="ek_pasien_nama"></span></td>
                </tr>
                <tr>
                  <td class="bold">No. RM</td>
                  <td>: <span id="ek_pasien_no_rm"></span></td>
                </tr>
                <tr>
                  <td class="bold">Tanggal Lahir</td>
                  <td>: <span id="ek_pasien_tanggal_lahir"></span></td>
                </tr>
                <tr>
                  <td class="bold">Jenis Kelamin</td>
                  <td>: <span id="ek_pasien_jenis_kelamin"></span></td>
                </tr>
                <tr>
                  <td class="bold">Alamat</td>
                  <td>: <span id="ek_pasien_alamat"></span></td>
                </tr>
              </table>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="table-responsive">
              <table class="table table-sm table-striped">
                <tr>
                  <td width="30%" class="bold">Ruang Rawat/Unit Kerja</td>
                  <td wdith="70%">: <span id="ek_bed"></span></td>
                </tr>
                <tr>
                  <td colspan="2">
                    <div class="ek-logo-pasien-alergi">
                      <img src="<?= resource_url() ?>images/diagnosa/alergi.jpg" alt="ek-logo-pasien-alergi" class="img-thumbnail rounded" width="20%">
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
            <div class="card-body">
              <!-- form pengkajian resume keperawatan -->

              <!-- Form Surgical Safety Ceklis -->
              <div id="data-surgical-safety-ceklis">
                <div id="buka-tutup-surgical-safety-ceklis">
                </div>
                <div class="col-lg">
                  <table class="table table-no-border table-sm table-striped" id="tabel-surgical-safety-ceklis">
                    <thead class="text-center">
                      <tr>
                        <th rowspan="2">
                          No
                        </th>
                        <th rowspan="2">
                          Tanggal
                        </th>
                        <th colspan="3">
                          <b>SIGN IN</b>
                        </th>
                        <th colspan="4">
                          <b>TIME OUT</b>
                        </th>
                        <th colspan="3">
                          <b>SIGN OUT</b>
                        </th>
                        <th rowspan="2">
                          Petugas
                        </th>
                        <th rowspan="2">
                          
                        </th>
                      </tr>
                      <tr>
                        <th>
                          Jam
                        </th>
                        <th>
                          Perawat/Bidan
                        </th>
                        <th>
                          Dokter Anestesi
                        </th>
                        <th>
                          Jam
                        </th>
                        <th>
                          Operator
                        </th>
                        <th>
                          Dokter Anestesi
                        </th>
                        <th>
                          Perawat/Bidan
                        </th>
                        <th>
                          Jam
                        </th>
                        <th>
                          Operator
                        </th>
                        <th>
                          Dokter Anestesi
                        </th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
              <!-- End Form Surgical Safety Ceklis -->

              <!-- end content -->
              <?= form_close() ?>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
        <button id="btn-simpan" type="button" class="btn btn-info" onclick="konfirmasiSimpanEntriKeperawatan()"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Entri Keperawatan -->

<!-- Modal Detail SURGICAL SAFETY CEKLIS LUAR KAMAR OPERASI -->
<div id="modal-detail-surgical-safety-ceklis" class="modal fade" role="dialog">
  <div class="modal-dialog" style="max-width: 90%">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">SURGICAL SAFETY CEKLIS LUAR KAMAR OPERASI</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body" id="detail_surgical_safety_luar_kamar">
      </div>
      <div class="modal-footer" id="detail_dko">
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- End Detail SURGICAL SAFETY CEKLIS -->

<!-- Modal Edit SURGICAL SAFETY CEKLIS -->
<div id="modal-edit-surgical-safety-ceklis" class="modal fade" role="dialog" data-backdrop="static" aria-labelledby="modal-resume-keperawatan-label" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 90%">
  <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">EDIT SURGICAL SAFETY CEKLIS LUAR KAMAR OPERASI</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <?= form_open('', 'role=form class=form-horizontal id=form-edit-surgical-luar-kamar'); ?>
      <input type="hidden" name="user_dko" value="<?= $this->session->userdata("id_translucent") ?>">
      <input type="hidden" name="id" id="id-surgical-safety-ceklis">
      <div class="modal-body" id="edit_surgical_safety_luar_kamar">
      </div>
      <div class="modal-footer" id="edit_dko">
      </div>
      <?= form_close() ?>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- End Modal Edit SURGICAL SAFETY CEKLIS -->
