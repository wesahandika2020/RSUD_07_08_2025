<!-- <style type="text/css">td {border: solid 1px;}</style> -->
<!-- Modal Entri Keperawatan -->
<div class="modal fade" id="modal_entri_keperawatan_rm" role="dialog" data-backdrop="static" aria-labelledby="modal-resume-keperawatan-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
    <div class="modal-content">
      <div class="modal-header">
        <div class="title">
          <h5 class="modal-title bold" id="modal_entri_keperawatan_rm">BUKTI VISITE DOKTER</h5>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'id=form_entri_keperawatan class="form-horizontal"') ?>
        <input type="hidden" name="id_layanan_pendaftaran" id="ek_id_layanan_pendaftaran">
        <input type="hidden" name="id_pendaftaran" id="ek-id-pendaftaran">
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
            <!-- <div class="card-body"> -->
              <!-- form pengkajian resume keperawatan -->

              <!-- Bukti Visit Dokter-->
              <div class="form-data-bukti-visit-dokter">
                <!-- <h5 class="center"><b>BUKTI VISITE DOKTER</b></h5> -->
                <table class="table table-no-border table-sm table-striped">
                  <tr>
                    <td colspan="3">
                    </td>
                  </tr>
                </table>

                <!-- <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                  <tr>
                    <td colspan="3" class="center bold td-dark">
                      <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-bukti-visit-dokter"><i class="fas fa-expand mr-1"></i>Expand</button>BUKTI VISIT DOKTER
                    </td>
                  </tr>
                </table> -->

                <div class="mt-2" id="data-bukti-visit-dokter">
                  <table class="table table-no-border table-sm table-striped">
                    <tr>
                      <td>
                        Tanggal dan Waktu Visit Dokter
                      </td>
                      <td>
                        :
                      </td>
                      <td>
                        <input type="text" name="tanggal_waktu_visit" id="tangal-waktu-visit" class="custom-form clear-input d-inline-block col-lg-4 ml-2" placeholder="dd/mm/yyyy hh:ii">

                      </td>
                    </tr>
                    <tr>
                      <td>
                        Nama Dokter Visit
                      </td>
                      <td>
                        :
                      </td>
                      <td>
                        <input type="text" name="dokter_visit" id="nama-dokter-visit" class="select2c-input ml-2">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Keterangan Visit
                      </td>
                      <td>
                        :
                      </td>
                      <td>
                        <textarea name="ket_bukti_visit" id="ket-bukti-visit" class="form-control col-lg-4 ml-2" rows="2"></textarea>
                      </td>
                    </tr>
                    <td>
                      <button type="button" title="Tambah Visit" class="btn btn-info" onclick="tambahDataVisit()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Data
                        Visit</button>
                    </td>
                    </tr>
                  </table>
                  <hr>
                  <table class="table table-no-border table-sm table-striped" id="tabel-data-visit">
                    <thead class="thead-theme">
                      <tr>
                        <th class="center" rowspan="2"><b>No</b></th>
                        <th class="center" rowspan="2"><b>Tanggal dan Waktu Visit</b></th>
                        <th class="center" colspan="1"><b>Nama Dokter</b></th>
                        <th class="center" rowspan="2"><b>Keterangan Visit</b></th>
                        <th class="center" rowspan="1"><b>Petugas</b></th>
                        <th class="center" rowspan="2"></th>
                      </tr>
                    </thead>
                    <tbody> </tbody>
                  </table>
                </div>
              </div>
              <!-- End Bukti Visit Dokter-->

              <!-- end content -->
              <?= form_close() ?>
            <!-- </div> -->
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

<!-- Modal Edit Catatan Tindakan Keperawatan -->
<div id="modal-edit-catatan-tindakan" class="modal fade" role="dialog">
  <div class="modal-dialog" style="max-width: 45%">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Catatan Tindakan Keperawatan</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'role=form class=form-horizontal id=form-edit-catatan-tindakan'); ?>
        <input type="hidden" name="id" id="id-catatan-tindakan">
        <table class="table table-no-border table-sm table-striped">
          <tr>
            <td>
              Kegiatan
            </td>
            <td>
              :
            </td>
            <td>
              <div id="edit-catatan-tindakan">
                <!-- <input type="text" name="keg_tindakan_keperawatan" id="ek-catatan-tindakan" class="select2c-input ml-2"> -->
                <input type="text" name="catatan_tindakan_keperawatan" id="ek-edit-catatan-tindakan" class="select2c-input ml-2">
              </div>
              <div id="edit-tindakan-manual">
                <input type="text" name="catatan_tindakan_keperawatan_manual" id="ek-edit-catatan-tindakan-manual" class="custom-form clear-input d-inline-block col-lg-8 ml-2" placeholder="Masukan kegiatan manual">
              </div>
              <div>
                <input type="checkbox" name="catatan_cek_tindakan_manual" id="ek-edit-cek-tindakan-manual" class=" ml-2">
                <label for="ek-edit-cek-tindakan-manual" style="vertical-align: text-bottom;">Input Kegiatan Manual</label>
              </div>


            </td>
          </tr>
          <tr>
            <td width="15%">
              Keterangan Catatan
            </td>
            <td width="1%">
              :
            </td>
            <td width="84%">
              <input type="text" name="ek_keterangan_catatan" id="ek-edit-keterangan-catatan" class="custom-form clear-input d-inline-block col-lg-4 ml-2 disabled" placeholder=".......................">
            </td>
          </tr>
          <tr>
            <td>
              Hari/Tanggal
            </td>
            <td>
              :
            </td>
            <td>
              <input type="text" name="ek_tanggal_catatan_tindakan" id="ek-edit-tanggal-catatan-tindakan" class="custom-form clear-input d-inline-block col-lg-3 ml-2" placeholder="dd/mm/yyyy">
            </td>
          </tr>
          <tr>
            <td class="center bold" colspan="3">
              DINAS PAGI
            </td>
            <td>

            </td>
            <td>
            </td>
          </tr>
          <tr>
            <td width="15%">Bismillahirrahmanirrahim</td>
            <td width="1%">:</td>
            <td width="84%">
              <div class="input-group">
                <input type="checkbox" name="ek_bismillah_pagi" id="ek-edit-bismillah-pagi" class="mr-1 ml-2">
              </div>
            </td>
          </tr>
          <tr>
            <td width="15%">Ceklist</td>
            <td width="1%">:</td>
            <td width="84%">
              <div class="input-group">
                <input type="checkbox" name="ek_cek_pagi" id="ek-edit-cek-pagi" class="mr-1 ml-2">
              </div>
            </td>
          </tr>
          <tr>
            <td width="15%">Jam</td>
            <td width="1%">:</td>
            <td width="84%">
              <div class="input-group">
                <input type="text" name="ek_jam_pagi" id="ek-edit-jam-pagi" class="custom-form clear-input d-inline-block col-lg-2 ml-2">
              </div>
            </td>
          </tr>
          <tr>
            <td width="15%">Paraf</td>
            <td width="1%">:</td>
            <td width="84%">
              <div class="input-group">
                <input type="checkbox" name="ek_paraf_pagi" id="ek-edit-paraf-pagi" class="mr-1 ml-2">
              </div>
            </td>
          </tr>
          <tr>
            <td width="15%">Perawat</td>
            <td width="1%">:</td>
            <td width="84%">
              <div class="input-group">
                <input type="text" name="ek_perawat_tindakan_pagi" id="ek-edit-perawat-tindakan-pagi" class="select2c-input ml-2">
              </div>
            </td>
          </tr>
          <tr>
            <td width="15%">Alhamdulillahirobbil'alamin</td>
            <td width="1%">:</td>
            <td width="84%">
              <div class="input-group">
                <input type="checkbox" name="ek_hamdalah_pagi" id="ek-edit-hamdalah-pagi" class="mr-1 ml-2">
              </div>
            </td>
          </tr>
          <tr>
            <td class="center bold" colspan="3">
              DINAS SORE
            </td>
            <td>

            </td>
            <td>
            </td>
          </tr>
          <tr>
            <td width="15%">Bismillahirrahmanirrahim</td>
            <td width="1%">:</td>
            <td width="84%">
              <div class="input-group">
                <input type="checkbox" name="ek_bismillah_sore" id="ek-edit-bismillah-sore" class="mr-1 ml-2">
              </div>
            </td>
          </tr>
          <tr>
            <td width="15%">Ceklist</td>
            <td width="1%">:</td>
            <td width="84%">
              <div class="input-group">
                <input type="checkbox" name="ek_cek_sore" id="ek-edit-cek-sore" class="mr-1 ml-2">
              </div>
            </td>
          </tr>
          <tr>
            <td width="15%">Jam</td>
            <td width="1%">:</td>
            <td width="84%">
              <div class="input-group">
                <input type="text" name="ek_jam_sore" id="ek-edit-jam-sore" class="custom-form clear-input d-inline-block col-lg-2 ml-2">
              </div>
            </td>
          </tr>
          <tr>
            <td width="15%">Paraf</td>
            <td width="1%">:</td>
            <td width="84%">
              <div class="input-group">
                <input type="checkbox" name="ek_paraf_sore" id="ek-edit-paraf-sore" class="mr-1 ml-2">
              </div>
            </td>
          </tr>
          <tr>
            <td width="15%">Perawat</td>
            <td width="1%">:</td>
            <td width="84%">
              <div class="input-group">
                <input type="text" name="ek_perawat_tindakan_sore" id="ek-edit-perawat-tindakan-sore" class="select2c-input ml-2">
              </div>
            </td>
          </tr>
          <tr>
            <td width="15%">Alhamdulillahirobbil'alamin</td>
            <td width="1%">:</td>
            <td width="84%">
              <div class="input-group">
                <input type="checkbox" name="ek_hamdalah_sore" id="ek-edit-hamdalah-sore" class="mr-1 ml-2">
              </div>
            </td>
          </tr>
          <tr>
            <td class="center bold" colspan="3">
              DINAS MALAM
            </td>
            <td>

            </td>
            <td>
            </td>
          </tr>
          <tr>
            <td width="15%">Bismillahirrahmanirrahim</td>
            <td width="1%">:</td>
            <td width="84%">
              <div class="input-group">
                <input type="checkbox" name="ek_bismillah_malam" id="ek-edit-bismillah-malam" class="mr-1 ml-2">
              </div>
            </td>
          </tr>
          <tr>
            <td width="15%">Ceklist</td>
            <td width="1%">:</td>
            <td width="84%">
              <div class="input-group">
                <input type="checkbox" name="ek_cek_malam" id="ek-edit-cek-malam" class="mr-1 ml-2">
              </div>
            </td>
          </tr>
          <tr>
            <td width="15%">Jam</td>
            <td width="1%">:</td>
            <td width="84%">
              <div class="input-group">
                <input type="text" name="ek_jam_malam" id="ek-edit-jam-malam" class="custom-form clear-input d-inline-block col-lg-2 ml-2">
              </div>
            </td>
          </tr>
          <tr>
            <td width="15%">Paraf</td>
            <td width="1%">:</td>
            <td width="84%">
              <div class="input-group">
                <input type="checkbox" name="ek_paraf_malam" id="ek-edit-paraf-malam" class="mr-1 ml-2">
              </div>
            </td>
          </tr>
          <tr>
            <td width="15%">Perawat</td>
            <td width="1%">:</td>
            <td width="84%">
              <div class="input-group">
                <input type="text" name="ek_perawat_tindakan_malam" id="ek-edit-perawat-tindakan-malam" class="select2c-input ml-2">
              </div>
            </td>
          </tr>
          <tr>
            <td width="15%">Alhamdulillahirobbil'alamin</td>
            <td width="1%">:</td>
            <td width="84%">
              <div class="input-group">
                <input type="checkbox" name="ek_hamdalah_malam" id="ek-edit-hamdalah-malam" class="mr-1 ml-2"><input type="hidden" name="user_account" value="<?= $this->session->userdata("id_translucent") ?>"><input type="hidden" name="updated_date" value="<?= date("Y-m-d H:i:s") ?>">
              </div>
            </td>
          </tr>
        </table>
        <hr>
        <?= form_close(); ?>
      </div>
      <div class="modal-footer" id="update-catatan-tdkn">
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- End Modal Edit Catatan Tindakan Keperawatan -->

<!-- Modal Terapi Pulang -->
<div id="modal-edit-terapi-pulang" class="modal fade" role="dialog">
  <div class="modal-dialog" style="max-width: 45%">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Terapi Pulang</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'role=form class=form-horizontal id=form-edit-terapi-pulang'); ?>
        <input type="hidden" name="id" id="id-terapi-pulang">
        <table class="table table-no-border table-sm table-striped">
          <tr>
            <td width="2%"></td>
            <td><b>Obat</b></td>
            <td>:</td>
            <td>
              <div class="input-group">
                <input type="text" name="obat" class="select2c-input clear-input d-inline-block" id="barang-auto-edit">
              </div>
            </td>
          </tr>
          <tr>
            <td></td>
            <td><b>Jumlah</b></td>
            <td>:</td>
            <td>
              <div class="input-group">
                <input type="number" min="0" name="jumlah_obat" class="custom-form clear-input d-inline-block col-lg-4" id="jumlah-obat-edit">
              </div>
            </td>
          </tr>
          <tr>
            <td></td>
            <td><b>Dosis</b></td>
            <td>:</td>
            <td>
              <div class="input-group">
                <input type="text" name="dosis" id="dosis-edit" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Dosis...">
              </div>
            </td>
          </tr>
          <tr>
            <td></td>
            <td><b>Frekuensi</b></td>
            <td>:</td>
            <td>
              <div class="input-group">
                <input type="text" name="frekuensi" id="frekuensi-edit" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Frekuensi...">
              </div>
            </td>
          </tr>
          <tr>
            <td></td>
            <td><b>Cara Pemberian</b></td>
            <td>:</td>
            <td>
              <div class="input-group">
                <input type="text" name="cara_pemberian" id="cara-pemberian-edit" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Cara Pemberian...">
              </div>
            </td>
          </tr>
          <tr>
            <td></td>
            <td><b>Jam Pemberian</b></td>
            <td>:</td>
            <td>
              <div class="input-group">
                <input type="text" name="ek_jam_pemberian" id="ek-jam-pemberian-edit" class="custom-form clear-input d-inline-block col-lg-5 mr-1">

                <input type="text" name="ek_jam_pemberian_satu" id="ek-jam-pemberian-satu-edit" class="custom-form clear-input d-inline-block col-lg-5 ml-2">

                <input type="text" name="ek_jam_pemberian_dua" id="ek-jam-pemberian-dua-edit" class="custom-form clear-input d-inline-block col-lg-5 ml-2">

                <input type="text" name="ek_jam_pemberian_tiga" id="ek-jam-pemberian-tiga-edit" class="custom-form clear-input d-inline-block col-lg-5 ml-2">

                <input type="text" name="ek_jam_pemberian_empat" id="ek-jam-pemberian-empat-edit" class="custom-form clear-input d-inline-block col-lg-5 ml-2">

                <input type="text" name="ek_jam_pemberian_lima" id="ek-jam-pemberian-lima-edit" class="custom-form clear-input d-inline-block col-lg-5 ml-2">
              </div>
            </td>
          </tr>
          <tr>
            <td></td>
            <td><b>Petunjuk Khusus</b></td>
            <td>:</td>
            <td>
              <div class="input-group">
                <input type="text" name="petunjuk_khusus" id="petunjuk-khusus-edit" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Petunjuk Khusus...">
                <input type="hidden" name="user_account" value="<?= $this->session->userdata("id_translucent") ?>"><input type="hidden" name="created_date" value="<?= date("Y-m-d H:i:s") ?>">
              </div>
            </td>
          </tr>
          <td></td>
        </table>
        <hr>


        <?= form_close(); ?>
      </div>
      <div class="modal-footer" id="update-terapi-plg">

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- End Modal Edit Terapi Pulang -->

<!-- Modal Edit Kontrol Kembali -->
<div id="modal-edit-kontrol-kembali" class="modal fade" role="dialog">
  <div class="modal-dialog" style="max-width: 45%">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Kontrol Kembali</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'role=form class=form-horizontal id=form-edit-kontrol-kembali'); ?>
        <input type="hidden" name="id" id="id-kontrol-kembali">
        <table class="table table-no-border table-sm table-striped">
          <tr>
            <td width="2%"></td>
            <td width="15%"><b>Tanggal Kontrol</b></td>
            <td width="2%">:</td>
            <td>
              <div class="input-group">
                <input type="text" name="ek_kontrol_dokter" id="ek-kontrol-dokter-edit" class="custom-form clear-input d-inline-block col-lg-6">
                <input type="hidden" name="user_account" value="<?= $this->session->userdata("id_translucent") ?>">
              </div>
            </td>
          </tr>
          <tr>
            <td></td>
            <td><b>Nama Dokter</b></td>
            <td>:</td>
            <td>
              <div class="input-group">
                <input type="text" name="ek_nama_dokter" id="ek-nama-dokter-edit" class="select2c-input clear-input d-inline-block"><input type="hidden" name="created_date" value="<?= date("Y-m-d H:i:s") ?>">
              </div>
            </td>
          </tr>
        </table>
        <hr>
        <?= form_close(); ?>
      </div>
      <div class="modal-footer" id="update-kontrol-kbl">
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- End Modal Edit Kontrol Kembali -->

<!-- Modal Edit Masalah Keperawatan -->
<div id="modal-edit-masalah-rawat" class="modal fade" role="dialog">
  <div class="modal-dialog" style="max-width: 45%">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Masalah Keperawatan</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'role=form class=form-horizontal id=form-edit-masalah-rawat'); ?>
        <input type="hidden" name="id" id="id-masalah-rawat">
        <table class="table table-no-border table-sm table-striped">
          <tr>
            <td></td>
            <td><b>Masalah Keperawatan</b></td>
            <td>:</td>
            <td>
              <div class="input-group">
                <input type="text" name="masalah_keperawatan" id="ek-masalah-keperawatan-edit" class="select2c-input clear-input d-inline-block"><input type="hidden" name="user_masalah" value="<?= $this->session->userdata("id_translucent") ?>"><input type="hidden" name="waktu_masalah" value="<?= date("Y-m-d H:i:s") ?>">
              </div>
            </td>
          </tr>
          <tr>
            <td width="2%"></td>
            <td width="15%"><b>Tanggal Mulai</b></td>
            <td width="2%">:</td>
            <td>
              <div class="input-group">
                <input type="text" name="edit_tanggal_mulai" id="ek-tanggal-mulai-edit" class="custom-form clear-input d-inline-block col-lg-6">
              </div>
            </td>
          </tr>
          <tr>
            <td width="2%"></td>
            <td width="15%"><b>Tanggal Selesai</b></td>
            <td width="2%">:</td>
            <td>
              <div class="input-group">
                <input type="text" name="edit_tanggal_selesai" id="ek-tanggal-selesai-edit" class="custom-form clear-input d-inline-block col-lg-6">
              </div>
            </td>
          </tr>
        </table>
        <hr>
        <?= form_close(); ?>
      </div>
      <div class="modal-footer" id="update-masalah-kprwtn">
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- End Modal Edit Kontrol Kembali -->

<!-- Modal Edit Upaya Pencegahan Risiko Jatuh Pasien Dewasa -->
<div id="modal-edit-upaya-pencegahan-risiko-jatuh-pasien-dewasa" class="modal fade" role="dialog">
  <div class="modal-dialog" style="max-width: 80%">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Upaya Pencegahan Risiko Jatuh Pasien Dewasa</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'role=form class=form-horizontal id=form-edit-upaya-pencegahan-risiko-jatuh-pasien-dewasa'); ?>
        <input type="hidden" name="id" id="id-upaya-pencegahan-risiko-jatuh-pasien-dewasa">
        <div class="from-group">
          <label for="uprjpd-tanggal-pengkajian">Tanggal Tindakan Pencegahan : </label>
          <input type="text" name="uprjpd_tanggal_pengkajian" id="uprjpd-edit-tanggal-pengkajian" class="custom-form clear-input d-inline-block col-lg-3 ml-2" placeholder="dd/mm/yyyy">
        </div>
        <hr>
        <hr>
        <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-uprjpd">
          <thead>
            <tr>
              <th class="center" rowspan="2"><b>Tindakan Pencegahan</b></th>
              <th class="center" colspan="2">Pagi</th>
              <th class="center" colspan="2">Siang</th>
              <th class="center" colspan="3">Malam</th>
            </tr>
            <tr>
              <th class="center">Hand Over</th>
              <th class="center">Jam 10</th>
              <th class="center">Hand Over</th>
              <th class="center">Jam 18</th>
              <th class="center">Hand Over</th>
              <th class="center">Jam 23</th>
              <th class="center">Jam 4</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="8" class="bold text-uppercase">Risiko Rendah/Sedang</td>
            </tr>
            <tr>
              <td>Bel berfungsi dan mudah dijangkau</td>
              <td class="center"><input type="checkbox" name="uprjpd_bel_p_ho" id="uprjpd-edit-bel-p-ho">
              </td>
              <td class="center"><input type="checkbox" name="uprjpd_bel_p_10" id="uprjpd-edit-bel-p-10">
              </td>
              <td class="center"><input type="checkbox" name="uprjpd_bel_s_ho" id="uprjpd-edit-bel-s-ho">
              </td>
              <td class="center"><input type="checkbox" name="uprjpd_bel_s_18" id="uprjpd-edit-bel-s-18">
              </td>
              <td class="center"><input type="checkbox" name="uprjpd_bel_m_ho" id="uprjpd-edit-bel-m-ho">
              </td>
              <td class="center"><input type="checkbox" name="uprjpd_bel_m_23" id="uprjpd-edit-bel-m-23">
              </td>
              <td class="center"><input type="checkbox" name="uprjpd_bel_m_4" id="uprjpd-edit-bel-m-4">
              </td>
            </tr>
            <tr>
              <td>Roda tempat tidur terkunci</td>
              <td class="center"><input type="checkbox" name="uprjpd_roda_p_ho" id="uprjpd-edit-roda-p-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpd_roda_p_10" id="uprjpd-edit-roda-p-10"></td>
              <td class="center"><input type="checkbox" name="uprjpd_roda_s_ho" id="uprjpd-edit-roda-s-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpd_roda_s_18" id="uprjpd-edit-roda-s-18"></td>
              <td class="center"><input type="checkbox" name="uprjpd_roda_m_ho" id="uprjpd-edit-roda-m-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpd_roda_m_23" id="uprjpd-edit-roda-m-23"></td>
              <td class="center"><input type="checkbox" name="uprjpd_roda_m_4" id="uprjpd-edit-roda-m-4">
              </td>
            </tr>
            <tr>
              <td>Posisikan tempat tidur pada posisi terendah</td>
              <td class="center"><input type="checkbox" name="uprjpd_ptt_p_ho" id="uprjpd-edit-ptt-p-ho">
              </td>
              <td class="center"><input type="checkbox" name="uprjpd_ptt_p_10" id="uprjpd-edit-ptt-p-10">
              </td>
              <td class="center"><input type="checkbox" name="uprjpd_ptt_s_ho" id="uprjpd-edit-ptt-s-ho">
              </td>
              <td class="center"><input type="checkbox" name="uprjpd_ptt_s_18" id="uprjpd-edit-ptt-s-18">
              </td>
              <td class="center"><input type="checkbox" name="uprjpd_ptt_m_ho" id="uprjpd-edit-ptt-m-ho">
              </td>
              <td class="center"><input type="checkbox" name="uprjpd_ptt_m_23" id="uprjpd-edit-ptt-m-23">
              </td>
              <td class="center"><input type="checkbox" name="uprjpd_ptt_m_4" id="uprjpd-edit-ptt-m-4">
              </td>
            </tr>
            <tr>
              <td>Pagar pengaman tempat tidur dinaikan</td>
              <td class="center"><input type="checkbox" name="uprjpd_ppt_p_ho" id="uprjpd-edit-ppt-p-ho">
              </td>
              <td class="center"><input type="checkbox" name="uprjpd_ppt_p_10" id="uprjpd-edit-ppt-p-10">
              </td>
              <td class="center"><input type="checkbox" name="uprjpd_ppt_s_ho" id="uprjpd-edit-ppt-s-ho">
              </td>
              <td class="center"><input type="checkbox" name="uprjpd_ppt_s_18" id="uprjpd-edit-ppt-s-18">
              </td>
              <td class="center"><input type="checkbox" name="uprjpd_ppt_m_ho" id="uprjpd-edit-ppt-m-ho">
              </td>
              <td class="center"><input type="checkbox" name="uprjpd_ppt_m_23" id="uprjpd-edit-ppt-m-23">
              </td>
              <td class="center"><input type="checkbox" name="uprjpd_ppt_m_4" id="uprjpd-edit-ppt-m-4">
              </td>
            </tr>
            <tr>
              <td>Penerang cukup</td>
              <td class="center"><input type="checkbox" name="uprjpd_penerangan_p_ho" id="uprjpd-edit-penerangan-p-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpd_penerangan_p_10" id="uprjpd-edit-penerangan-p-10"></td>
              <td class="center"><input type="checkbox" name="uprjpd_penerangan_s_ho" id="uprjpd-edit-penerangan-s-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpd_penerangan_s_18" id="uprjpd-edit-penerangan-s-18"></td>
              <td class="center"><input type="checkbox" name="uprjpd_penerangan_m_ho" id="uprjpd-edit-penerangan-m-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpd_penerangan_m_23" id="uprjpd-edit-penerangan-m-23"></td>
              <td class="center"><input type="checkbox" name="uprjpd_penerangan_m_4" id="uprjpd-edit-penerangan-m-4"></td>
            </tr>
            <tr>
              <td>Pastikan alas kaki yang tidak licin untuk pasien yang dapat berjalan</td>
              <td class="center"><input type="checkbox" name="uprjpd_alas_p_ho" id="uprjpd-edit-alas-p-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpd_alas_p_10" id="uprjpd-edit-alas-p-10"></td>
              <td class="center"><input type="checkbox" name="uprjpd_alas_s_ho" id="uprjpd-edit-alas-s-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpd_alas_s_18" id="uprjpd-edit-alas-s-18"></td>
              <td class="center"><input type="checkbox" name="uprjpd_alas_m_ho" id="uprjpd-edit-alas-m-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpd_alas_m_23" id="uprjpd-edit-alas-m-23"></td>
              <td class="center"><input type="checkbox" name="uprjpd_alas_m_4" id="uprjpd-edit-alas-m-4">
              </td>
            </tr>
            <tr>
              <td>Lantai kering dan tidak licin</td>
              <td class="center"><input type="checkbox" name="uprjpd_lantai_p_ho" id="uprjpd-edit-lantai-p-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpd_lantai_p_10" id="uprjpd-edit-lantai-p-10"></td>
              <td class="center"><input type="checkbox" name="uprjpd_lantai_s_ho" id="uprjpd-edit-lantai-s-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpd_lantai_s_18" id="uprjpd-edit-lantai-s-18"></td>
              <td class="center"><input type="checkbox" name="uprjpd_lantai_m_ho" id="uprjpd-edit-lantai-m-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpd_lantai_m_23" id="uprjpd-edit-lantai-m-23"></td>
              <td class="center"><input type="checkbox" name="uprjpd_lantai_m_4" id="uprjpd-edit-lantai-m-4"></td>
            </tr>
            <tr>
              <td>Dekatkan alat-alat pasien</td>
              <td class="center"><input type="checkbox" name="uprjpd_alat_p_ho" id="uprjpd-edit-alat-p-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpd_alat_p_10" id="uprjpd-edit-alat-p-10"></td>
              <td class="center"><input type="checkbox" name="uprjpd_alat_s_ho" id="uprjpd-edit-alat-s-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpd_alat_s_18" id="uprjpd-edit-alat-s-18"></td>
              <td class="center"><input type="checkbox" name="uprjpd_alat_m_ho" id="uprjpd-edit-alat-m-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpd_alat_m_23" id="uprjpd-edit-alat-m-23"></td>
              <td class="center"><input type="checkbox" name="uprjpd_alat_m_4" id="uprjpd-edit-alat-m-4">
              </td>
            </tr>
            <tr>
              <td>Edukasi pasien tentang efek samping obat yang diberikan</td>
              <td class="center"><input type="checkbox" name="uprjpd_edukasi_p_ho" id="uprjpd-edit-edukasi-p-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpd_edukasi_p_10" id="uprjpd-edit-edukasi-p-10"></td>
              <td class="center"><input type="checkbox" name="uprjpd_edukasi_s_ho" id="uprjpd-edit-edukasi-s-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpd_edukasi_s_18" id="uprjpd-edit-edukasi-s-18"></td>
              <td class="center"><input type="checkbox" name="uprjpd_edukasi_m_ho" id="uprjpd-edit-edukasi-m-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpd_edukasi_m_23" id="uprjpd-edit-edukasi-m-23"></td>
              <td class="center"><input type="checkbox" name="uprjpd_edukasi_m_4" id="uprjpd-edit-edukasi-m-4"></td>
            </tr>
            <tr>
              <td>Tidak meninggalkan pasien di kamar mandi saat menggunakan commode</td>
              <td class="center"><input type="checkbox" name="uprjpd_commode_p_ho" id="uprjpd-edit-commode-p-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpd_commode_p_10" id="uprjpd-edit-commode-p-10"></td>
              <td class="center"><input type="checkbox" name="uprjpd_commode_s_ho" id="uprjpd-edit-commode-s-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpd_commode_s_18" id="uprjpd-edit-commode-s-18"></td>
              <td class="center"><input type="checkbox" name="uprjpd_commode_m_ho" id="uprjpd-edit-commode-m-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpd_commode_m_23" id="uprjpd-edit-commode-m-23"></td>
              <td class="center"><input type="checkbox" name="uprjpd_commode_m_4" id="uprjpd-edit-commode-m-4"></td>
            </tr>
            <tr>
              <td colspan="8" class="bold text-uppercase">Risiko Tinggi</td>
            </tr>
            <tr>
              <td>Pasang gelang khusus (Warna Kuning)</td>
              <td class="center"><input type="checkbox" name="uprjpd_gelang_p_ho" id="uprjpd-edit-gelang-p-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpd_gelang_p_10" id="uprjpd-edit-gelang-p-10"></td>
              <td class="center"><input type="checkbox" name="uprjpd_gelang_s_ho" id="uprjpd-edit-gelang-s-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpd_gelang_s_18" id="uprjpd-edit-gelang-s-18"></td>
              <td class="center"><input type="checkbox" name="uprjpd_gelang_m_ho" id="uprjpd-edit-gelang-m-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpd_gelang_m_23" id="uprjpd-edit-gelang-m-23"></td>
              <td class="center"><input type="checkbox" name="uprjpd_gelang_m_4" id="uprjpd-edit-gelang-m-4"></td>
            </tr>
            <tr>
              <td>Tempatkan pasien di kamar yang paling dekat dengan Nurse Station (jika memungkinkan)
              </td>
              <td class="center"><input type="checkbox" name="uprjpd_station_p_ho" id="uprjpd-edit-station-p-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpd_station_p_10" id="uprjpd-edit-station-p-10"></td>
              <td class="center"><input type="checkbox" name="uprjpd_station_s_ho" id="uprjpd-edit-station-s-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpd_station_s_18" id="uprjpd-edit-station-s-18"></td>
              <td class="center"><input type="checkbox" name="uprjpd_station_m_ho" id="uprjpd-edit-station-m-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpd_station_m_23" id="uprjpd-edit-station-m-23"></td>
              <td class="center"><input type="checkbox" name="uprjpd_station_m_4" id="uprjpd-edit-station-m-4"></td>
            </tr>
            <tr>
              <td class="bold">Paraf</td>
              <td class="center"><input type="checkbox" name="uprjpd_paraf_p_ho" id="uprjpd-edit-paraf-p-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpd_paraf_p_10" id="uprjpd-edit-paraf-p-10"></td>
              <td class="center"><input type="checkbox" name="uprjpd_paraf_s_ho" id="uprjpd-edit-paraf-s-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpd_paraf_s_18" id="uprjpd-edit-paraf-s-18"></td>
              <td class="center"><input type="checkbox" name="uprjpd_paraf_m_ho" id="uprjpd-edit-paraf-m-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpd_paraf_m_23" id="uprjpd-edit-paraf-m-23"></td>
              <td class="center"><input type="checkbox" name="uprjpd_paraf_m_4" id="uprjpd-edit-paraf-m-4"></td>
            </tr>
            <tr>
              <td class="bold">Perawat</td>
              <td colspan="2">
                <div class="input-group">
                  <input type="text" name="uprjpd_perawat_p" id="uprjpd-edit-perawat-p" class="select2c-input ml-2">
                </div>
              </td>
              <td colspan="2">
                <div class="input-group">
                  <input type="text" name="uprjpd_perawat_s" id="uprjpd-edit-perawat-s" class="select2c-input ml-2">
                </div>
              </td>
              <td colspan="3">
                <div class="input-group">
                  <input type="text" name="uprjpd_perawat_m" id="uprjpd-edit-perawat-m" class="select2c-input ml-2">
                </div>
              </td>
            </tr>
          </tbody>
        </table>
        <hr>
        <?= form_close(); ?>
      </div>
      <div class="modal-footer" id="update-uprjpd">
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- End Modal Edit Upaya Pencegahan Risiko Jatuh Pasien Dewasa -->

<!-- Modal Edit Pengkajian Ulang Resiko Jatuh Pasien Anak -->
<div id="modal-edit-pengkajian-ulang-resiko-jatuh-pasien-anak" class="modal fade" role="dialog">
  <div class="modal-dialog" style="max-width: 45%">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Pengkajian Ulang Resiko Jatuh Pasien Anak</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'role=form class=form-horizontal id=form-edit-pengkajian-ulang-resiko-jatuh-pasien-anak'); ?>
        <input type="hidden" name="id" id="id-pengkajian-ulang-resiko-jatuh-pasien-anak">
        <table class="table table-no-border table-sm table-striped">
          <tr>
            <td>
              Tanggal Pengkajian
            </td>
            <td>
              :
            </td>
            <td>
              <input type="text" name="purjpa_tanggal_pengkajian" id="purjpa-edit-tanggal-pengkajian" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="dd/mm/yyyy">
            </td>
          </tr>
        </table>
        <hr>
        <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-purjpa">
          <thead>
            <tr>
              <th width="20%" class="center"><b>Parameter</b></th>
              <th width="60%" class="center"><b>Kriteria</b></th>
              <th width="20%" class="center"><b>Skor</b></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td rowspan="4"><input type="hidden" id="purjpa-edit-umur">Umur</td>
              <td>
                <input type="radio" name="purjpa_umur" id="purjpa-edit-umur-4" value="4" class="mr-1" onchange="calcscorepurjpa()">
                Dibawah 3 tahun
              </td>
              <td class="center">4</td>
            </tr>
            <tr>
              <td><input type="radio" name="purjpa_umur" id="purjpa-edit-umur-3" value="3" class="mr-1" onchange="calcscorepurjpa()">3-7 tahun</td>
              <td class="center">3</td>
            </tr>
            <tr>
              <td><input type="radio" name="purjpa_umur" id="purjpa-edit-umur-2" value="2" class="mr-1" onchange="calcscorepurjpa()">7-13 tahun</td>
              <td class="center">2</td>
            </tr>
            <tr>
              <td><input type="radio" name="purjpa_umur" id="purjpa-edit-umur-1" value="1" class="mr-1" onchange="calcscorepurjpa()">>13 tahun</td>
              <td class="center">1</td>
            </tr>
            <tr>
              <td rowspan="2"><input type="hidden" id="purjpa-edit-jenis-kelamin">Jenis
                kelamin</td>
              <td><input type="radio" name="purjpa_jenis_kelamin" id="purjpa_jenis_kelamin-2" value="2" class="mr-1" onchange="calcscorepurjpa()">Laki-laki</td>
              <td class="center">2</td>
            </tr>
            <tr>
              <td><input type="radio" name="purjpa_jenis_kelamin" id="purjpa_jenis_kelamin-1" value="1" class="mr-1" onchange="calcscorepurjpa()">perempuan</td>
              <td class="center">1</td>
            </tr>
            <tr>
              <td rowspan="4"><input type="hidden" id="purjpa-edit-diagnosis">Diagnosis
              </td>
              <td><input type="radio" name="purjpa_diagnosis" id="purjpa-edit-diagnosis-4" value="4" class="mr-1 disabled" onchange="calcscorepurjpa()">Kelainan
                Neurologi
              </td>
              <td class="center">4</td>
            </tr>
            <tr>
              <td><input type="radio" name="purjpa_diagnosis" id="purjpa-edit-diagnosis-3" value="3" class="mr-1" onchange="calcscorepurjpa()">Respiratori,
                dehidrasi, anemia,
                anoreksia, syncope
              </td>
              <td class="center">3</td>
            </tr>
            <tr>
              <td><input type="radio" name="purjpa_diagnosis" id="purjpa-edit-diagnosis-2" value="2" class="mr-1" onchange="calcscorepurjpa()">Perilaku</td>
              <td class="center">2</td>
            </tr>
            <tr>
              <td><input type="radio" name="purjpa_diagnosis" id="purjpa-edit-diagnosis-1" value="1" class="mr-1" onchange="calcscorepurjpa()">Lain-lain</td>
              <td class="center">1</td>
            </tr>
            <tr>
              <td rowspan="3"><input type="hidden" id="purjpa-edit-gangguan-kognitif">Ganguan
                kognitif</td>
              <td><input type="radio" name="purjpa_gangguan_kognitif" id="purjpa-edit-gangguan-kognitif-3" value="3" class="mr-1 disabled" onchange="calcscorepurjpa()">Keterbatasan
                daya pikir
              </td>
              <td class="center">3</td>
            </tr>
            <tr>
              <td><input type="radio" name="purjpa_ganguan_kognitif" id="purjpa-edit-gangguan-kognitif-2" value="2" class="mr-1" onchange="calcscorepurjpa()">Pelupa,
                berkurangnya
                orientasi sekitar
              </td>
              <td class="center">2</td>
            </tr>
            <tr>
              <td><input type="radio" name="purjpa_ganguan_kognitif" id="purjpa-edit-gangguan-kognitif-1" value="1" class="mr-1" onchange="calcscorepurjpa()">Dapat
                menggunakan
                daya pikir tanpa hambatan
              </td>
              <td class="center">1</td>
            </tr>
            <tr>
              <td rowspan="4"><input type="hidden" id="purjpa-edit-faktor-lingkungan">Faktor
                lingkungan</td>
              <td><input type="radio" name="purjpa_faktor_lingkungan" id="purjpa-edit-faktor-lingkungan-4" value="4" class="mr-1 disabled" onchange="calcscorepurjpa()">Riwayat
                jatuh atau bayi/balita yang ditempatkan di tempat tidur
              </td>
              <td class="center">4</td>
            </tr>
            <tr>
              <td><input type="radio" name="purjpa_faktor_lingkungan" id="purjpa-edit-faktor-lingkungan-3" value="3" class="mr-1" onchange="calcscorepurjpa()">Pasien
                menggunakan
                alat bantu atau bayi/balita dalam ayunan
              </td>
              <td class="center">3</td>
            </tr>
            <tr>
              <td><input type="radio" name="purjpa_faktor_lingkungan" id="purjpa-edit-faktor-lingkungan-2" value="2" class="mr-1" onchange="calcscorepurjpa()">Pasien di
                tempat
                tidur standar
              </td>
              <td class="center">2</td>
            </tr>
            <tr>
              <td><input type="radio" name="purjpa_faktor_lingkungan" id="purjpa-edit-faktor-lingkungan-1" value="1" class="mr-1" onchange="calcscorepurjpa()">Area pasien
                rawat
                jalan
              </td>
              <td class="center">1</td>
            </tr>
            <tr>
              <td rowspan="3"><input type="hidden" id="purjpa-edit-respon-pembedahan">Respon
                terhadap pembedahan, seedasi dan anastesi</td>
              <td><input type="radio" name="purjpa_respon_pembedahan" id="purjpa-edit-respon-pembedahan-3" value="3" class="mr-1 disabled" onchange="calcscorepurjpa()">Dalam
                24
                jam
              </td>
              <td class="center">3</td>
            </tr>
            <tr>
              <td><input type="radio" name="purjpa_respon_pembedahan" id="purjpa-edit-respon-pembedahan-2" value="2" class="mr-1" onchange="calcscorepurjpa()">Dalam 48 jam
              </td>
              <td class="center">2</td>
            </tr>
            <tr>
              <td><input type="radio" name="purjpa_respon_pembedahan" id="purjpa-edit-respon-pembedahan-1" value="1" class="mr-1" onchange="calcscorepurjpa()">Lebih dari 48
                jam/
                tidak ada respon
              </td>
              <td class="center">1</td>
            </tr>
            <tr>
              <td rowspan="3"><input type="hidden" id="purjpa-edit-penggunaan-obat">Penggunaan
                obat-obatan</td>
              <td><input type="radio" name="purjpa_penggunaan_obat" id="purjpa-edit-penggunaan-obat-3" value="3" class="mr-1 disabled" onchange="calcscorepurjpa()">Penggunaan
                bersamaan sedative barbiturate, anti depresan,diuretic, narkotik
              </td>
              <td class="center">3</td>
            </tr>
            <tr>
              <td><input type="radio" name="purjpa_penggunaan_obat" id="purjpa-edit-penggunaan-obat-2" value="2" class="mr-1" onchange="calcscorepurjpa()">Salah satu dari
                obat
                diatas
              </td>
              <td class="center">2</td>
            </tr>
            <tr>
              <td><input type="radio" name="purjpa_penggunaan_obat" id="purjpa-edit-penggunaan-obat-1" value="1" class="mr-1" onchange="calcscorepurjpa()">Obat-obatan
                lainya/tanpa
                obat
              </td>
              <td class="center">1</td>
            </tr>
            <tr>
              <td colspan="2" class="bold">JUMLAH SKOR</td>
              <td class="center"><input type="number" min="0" name="purjpa_jumlah_skor" id="purjpa-edit-jumlah-skor" class="custom-form clear-input center" placeholder="Jumlah" value="0" readonly></td>
            </tr>
            <tr>
              <td class="bold">Paraf</td>
              <td colspan="2"><input type="checkbox" id="purjpa-edit-paraf" name="purjpa_paraf" aria-label="Checkbox for paraf" value="1" />
              </td>
            </tr>
            <tr>
              <td class="bold">Perawat</td>
              <td colspan="2">
                <div class="input-group">
                  <input type="text" name="purjpa_perawat" id="purjpa-edit-perawat" class="select2c-input ml-2">
                </div>
              </td>
            </tr>
          </tbody>
        </table>
        <hr>
        <?= form_close(); ?>
      </div>
      <div class="modal-footer" id="update-purjpa">
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- End Modal Edit Pengkajian Ulang Resiko Jatuh Pasien Anak -->

<!-- Modal Edit Upaya Pencegahan Risiko Jatuh Pasien Anak -->
<div id="modal-edit-upaya-pencegahan-risiko-jatuh-pasien-anak" class="modal fade" role="dialog">
  <div class="modal-dialog" style="max-width: 80%">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Upaya Pencegahan Risiko Jatuh Pasien Anak</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'role=form class=form-horizontal id=form-edit-upaya-pencegahan-risiko-jatuh-pasien-anak'); ?>
        <input type="hidden" name="id" id="id-upaya-pencegahan-risiko-jatuh-pasien-anak">
        <div class="from-group">
          <label for="uprjpa-tanggal-pengkajian">Tanggal Tindakan Pencegahan : </label>
          <input type="text" name="uprjpa_tanggal_pengkajian" id="uprjpa-edit-tanggal-pengkajian" class="custom-form clear-input d-inline-block col-lg-3 ml-2" placeholder="dd/mm/yyyy">
        </div>
        <hr>
        <hr>
        <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-uprjpa">
          <thead>
            <tr>
              <th class="center" rowspan="2"><b>Tindakan Pencegahan</b></th>
              <th class="center" colspan="2">Pagi</th>
              <th class="center" colspan="2">Siang</th>
              <th class="center" colspan="3">Malam</th>
            </tr>
            <tr>
              <th class="center">Hand Over</th>
              <th class="center">Jam 10</th>
              <th class="center">Hand Over</th>
              <th class="center">Jam 18</th>
              <th class="center">Hand Over</th>
              <th class="center">Jam 23</th>
              <th class="center">Jam 4</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="8" class="bold text-uppercase">Risiko Rendah/Sedang</td>
            </tr>
            <tr>
              <td>Bel berfungsi dan mudah dijangkau</td>
              <td class="center"><input type="checkbox" name="uprjpa_bel_p_ho" id="uprjpa-edit-bel-p-ho">
              </td>
              <td class="center"><input type="checkbox" name="uprjpa_bel_p_10" id="uprjpa-edit-bel-p-10">
              </td>
              <td class="center"><input type="checkbox" name="uprjpa_bel_s_ho" id="uprjpa-edit-bel-s-ho">
              </td>
              <td class="center"><input type="checkbox" name="uprjpa_bel_s_18" id="uprjpa-edit-bel-s-18">
              </td>
              <td class="center"><input type="checkbox" name="uprjpa_bel_m_ho" id="uprjpa-edit-bel-m-ho">
              </td>
              <td class="center"><input type="checkbox" name="uprjpa_bel_m_23" id="uprjpa-edit-bel-m-23">
              </td>
              <td class="center"><input type="checkbox" name="uprjpa_bel_m_4" id="uprjpa-edit-bel-m-4">
              </td>
            </tr>
            <tr>
              <td>Roda tempat tidur terkunci</td>
              <td class="center"><input type="checkbox" name="uprjpa_roda_p_ho" id="uprjpa-edit-roda-p-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpa_roda_p_10" id="uprjpa-edit-roda-p-10"></td>
              <td class="center"><input type="checkbox" name="uprjpa_roda_s_ho" id="uprjpa-edit-roda-s-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpa_roda_s_18" id="uprjpa-edit-roda-s-18"></td>
              <td class="center"><input type="checkbox" name="uprjpa_roda_m_ho" id="uprjpa-edit-roda-m-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpa_roda_m_23" id="uprjpa-edit-roda-m-23"></td>
              <td class="center"><input type="checkbox" name="uprjpa_roda_m_4" id="uprjpa-edit-roda-m-4">
              </td>
            </tr>
            <tr>
              <td>Posisikan tempat tidur pada posisi terendah</td>
              <td class="center"><input type="checkbox" name="uprjpa_ptt_p_ho" id="uprjpa-edit-ptt-p-ho">
              </td>
              <td class="center"><input type="checkbox" name="uprjpa_ptt_p_10" id="uprjpa-edit-ptt-p-10">
              </td>
              <td class="center"><input type="checkbox" name="uprjpa_ptt_s_ho" id="uprjpa-edit-ptt-s-ho">
              </td>
              <td class="center"><input type="checkbox" name="uprjpa_ptt_s_18" id="uprjpa-edit-ptt-s-18">
              </td>
              <td class="center"><input type="checkbox" name="uprjpa_ptt_m_ho" id="uprjpa-edit-ptt-m-ho">
              </td>
              <td class="center"><input type="checkbox" name="uprjpa_ptt_m_23" id="uprjpa-edit-ptt-m-23">
              </td>
              <td class="center"><input type="checkbox" name="uprjpa_ptt_m_4" id="uprjpa-edit-ptt-m-4">
              </td>
            </tr>
            <tr>
              <td>Pagar pengaman tempat tidur dinaikan</td>
              <td class="center"><input type="checkbox" name="uprjpa_ppt_p_ho" id="uprjpa-edit-ppt-p-ho">
              </td>
              <td class="center"><input type="checkbox" name="uprjpa_ppt_p_10" id="uprjpa-edit-ppt-p-10">
              </td>
              <td class="center"><input type="checkbox" name="uprjpa_ppt_s_ho" id="uprjpa-edit-ppt-s-ho">
              </td>
              <td class="center"><input type="checkbox" name="uprjpa_ppt_s_18" id="uprjpa-edit-ppt-s-18">
              </td>
              <td class="center"><input type="checkbox" name="uprjpa_ppt_m_ho" id="uprjpa-edit-ppt-m-ho">
              </td>
              <td class="center"><input type="checkbox" name="uprjpa_ppt_m_23" id="uprjpa-edit-ppt-m-23">
              </td>
              <td class="center"><input type="checkbox" name="uprjpa_ppt_m_4" id="uprjpa-edit-ppt-m-4">
              </td>
            </tr>
            <tr>
              <td>Penerang cukup</td>
              <td class="center"><input type="checkbox" name="uprjpa_penerangan_p_ho" id="uprjpa-edit-penerangan-p-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpa_penerangan_p_10" id="uprjpa-edit-penerangan-p-10"></td>
              <td class="center"><input type="checkbox" name="uprjpa_penerangan_s_ho" id="uprjpa-edit-penerangan-s-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpa_penerangan_s_18" id="uprjpa-edit-penerangan-s-18"></td>
              <td class="center"><input type="checkbox" name="uprjpa_penerangan_m_ho" id="uprjpa-edit-penerangan-m-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpa_penerangan_m_23" id="uprjpa-edit-penerangan-m-23"></td>
              <td class="center"><input type="checkbox" name="uprjpa_penerangan_m_4" id="uprjpa-edit-penerangan-m-4"></td>
            </tr>
            <tr>
              <td>Pastikan alas kaki yang tidak licin untuk pasien yang dapat berjalan</td>
              <td class="center"><input type="checkbox" name="uprjpa_alas_p_ho" id="uprjpa-edit-alas-p-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpa_alas_p_10" id="uprjpa-edit-alas-p-10"></td>
              <td class="center"><input type="checkbox" name="uprjpa_alas_s_ho" id="uprjpa-edit-alas-s-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpa_alas_s_18" id="uprjpa-edit-alas-s-18"></td>
              <td class="center"><input type="checkbox" name="uprjpa_alas_m_ho" id="uprjpa-edit-alas-m-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpa_alas_m_23" id="uprjpa-edit-alas-m-23"></td>
              <td class="center"><input type="checkbox" name="uprjpa_alas_m_4" id="uprjpa-edit-alas-m-4">
              </td>
            </tr>
            <tr>
              <td>Lantai kering dan tidak licin</td>
              <td class="center"><input type="checkbox" name="uprjpa_lantai_p_ho" id="uprjpa-edit-lantai-p-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpa_lantai_p_10" id="uprjpa-edit-lantai-p-10"></td>
              <td class="center"><input type="checkbox" name="uprjpa_lantai_s_ho" id="uprjpa-edit-lantai-s-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpa_lantai_s_18" id="uprjpa-edit-lantai-s-18"></td>
              <td class="center"><input type="checkbox" name="uprjpa_lantai_m_ho" id="uprjpa-edit-lantai-m-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpa_lantai_m_23" id="uprjpa-edit-lantai-m-23"></td>
              <td class="center"><input type="checkbox" name="uprjpa_lantai_m_4" id="uprjpa-edit-lantai-m-4"></td>
            </tr>
            <tr>
              <td>Dekatkan alat-alat pasien</td>
              <td class="center"><input type="checkbox" name="uprjpa_alat_p_ho" id="uprjpa-edit-alat-p-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpa_alat_p_10" id="uprjpa-edit-alat-p-10"></td>
              <td class="center"><input type="checkbox" name="uprjpa_alat_s_ho" id="uprjpa-edit-alat-s-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpa_alat_s_18" id="uprjpa-edit-alat-s-18"></td>
              <td class="center"><input type="checkbox" name="uprjpa_alat_m_ho" id="uprjpa-edit-alat-m-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpa_alat_m_23" id="uprjpa-edit-alat-m-23"></td>
              <td class="center"><input type="checkbox" name="uprjpa_alat_m_4" id="uprjpa-edit-alat-m-4">
              </td>
            </tr>
            <tr>
              <td>Edukasi pasien tentang efek samping obat yang diberikan</td>
              <td class="center"><input type="checkbox" name="uprjpa_edukasi_p_ho" id="uprjpa-edit-edukasi-p-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpa_edukasi_p_10" id="uprjpa-edit-edukasi-p-10"></td>
              <td class="center"><input type="checkbox" name="uprjpa_edukasi_s_ho" id="uprjpa-edit-edukasi-s-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpa_edukasi_s_18" id="uprjpa-edit-edukasi-s-18"></td>
              <td class="center"><input type="checkbox" name="uprjpa_edukasi_m_ho" id="uprjpa-edit-edukasi-m-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpa_edukasi_m_23" id="uprjpa-edit-edukasi-m-23"></td>
              <td class="center"><input type="checkbox" name="uprjpa_edukasi_m_4" id="uprjpa-edit-edukasi-m-4"></td>
            </tr>
            <tr>
              <td>Tidak meninggalkan pasien di kamar mandi saat menggunakan commode</td>
              <td class="center"><input type="checkbox" name="uprjpa_commode_p_ho" id="uprjpa-edit-commode-p-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpa_commode_p_10" id="uprjpa-edit-commode-p-10"></td>
              <td class="center"><input type="checkbox" name="uprjpa_commode_s_ho" id="uprjpa-edit-commode-s-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpa_commode_s_18" id="uprjpa-edit-commode-s-18"></td>
              <td class="center"><input type="checkbox" name="uprjpa_commode_m_ho" id="uprjpa-edit-commode-m-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpa_commode_m_23" id="uprjpa-edit-commode-m-23"></td>
              <td class="center"><input type="checkbox" name="uprjpa_commode_m_4" id="uprjpa-edit-commode-m-4"></td>
            </tr>
            <tr>
              <td colspan="8" class="bold text-uppercase">Risiko Tinggi</td>
            </tr>
            <tr>
              <td>Pasang gelang khusus (Warna Kuning)</td>
              <td class="center"><input type="checkbox" name="uprjpa_gelang_p_ho" id="uprjpa-edit-gelang-p-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpa_gelang_p_10" id="uprjpa-edit-gelang-p-10"></td>
              <td class="center"><input type="checkbox" name="uprjpa_gelang_s_ho" id="uprjpa-edit-gelang-s-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpa_gelang_s_18" id="uprjpa-edit-gelang-s-18"></td>
              <td class="center"><input type="checkbox" name="uprjpa_gelang_m_ho" id="uprjpa-edit-gelang-m-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpa_gelang_m_23" id="uprjpa-edit-gelang-m-23"></td>
              <td class="center"><input type="checkbox" name="uprjpa_gelang_m_4" id="uprjpa-edit-gelang-m-4"></td>
            </tr>
            <tr>
              <td>Tempatkan pasien di kamar yang paling dekat dengan Nurse Station (jika memungkinkan)
              </td>
              <td class="center"><input type="checkbox" name="uprjpa_station_p_ho" id="uprjpa-edit-station-p-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpa_station_p_10" id="uprjpa-edit-station-p-10"></td>
              <td class="center"><input type="checkbox" name="uprjpa_station_s_ho" id="uprjpa-edit-station-s-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpa_station_s_18" id="uprjpa-edit-station-s-18"></td>
              <td class="center"><input type="checkbox" name="uprjpa_station_m_ho" id="uprjpa-edit-station-m-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpa_station_m_23" id="uprjpa-edit-station-m-23"></td>
              <td class="center"><input type="checkbox" name="uprjpa_station_m_4" id="uprjpa-edit-station-m-4"></td>
            </tr>
            <tr>
              <td class="bold">Paraf</td>
              <td class="center"><input type="checkbox" name="uprjpa_paraf_p_ho" id="uprjpa-edit-paraf-p-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpa_paraf_p_10" id="uprjpa-edit-paraf-p-10"></td>
              <td class="center"><input type="checkbox" name="uprjpa_paraf_s_ho" id="uprjpa-edit-paraf-s-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpa_paraf_s_18" id="uprjpa-edit-paraf-s-18"></td>
              <td class="center"><input type="checkbox" name="uprjpa_paraf_m_ho" id="uprjpa-edit-paraf-m-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpa_paraf_m_23" id="uprjpa-edit-paraf-m-23"></td>
              <td class="center"><input type="checkbox" name="uprjpa_paraf_m_4" id="uprjpa-edit-paraf-m-4"></td>
            </tr>
            <tr>
              <td class="bold">Perawat</td>
              <td colspan="2">
                <div class="input-group">
                  <input type="text" name="uprjpa_perawat_p" id="uprjpa-edit-perawat-p" class="select2c-input ml-2">
                </div>
              </td>
              <td colspan="2">
                <div class="input-group">
                  <input type="text" name="uprjpa_perawat_s" id="uprjpa-edit-perawat-s" class="select2c-input ml-2">
                </div>
              </td>
              <td colspan="3">
                <div class="input-group">
                  <input type="text" name="uprjpa_perawat_m" id="uprjpa-edit-perawat-m" class="select2c-input ml-2">
                </div>
              </td>
            </tr>
          </tbody>
        </table>
        <hr>
        <?= form_close(); ?>
      </div>
      <div class="modal-footer" id="update-uprjpa">
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- End Modal Edit Upaya Pencegahan Risiko Jatuh Pasien Anak -->

<!-- Modal Edit Pengkajian Ulang Risiko Jatuh Pasien Lansia -->
<div id="modal-edit-pengkajian-ulang-risiko-jatuh-pasien-lansia" class="modal fade" role="dialog">
  <div class="modal-dialog" style="max-width: 75%">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Pengkajian Ulang Risiko Jatuh Pasien Lansia</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'role=form class=form-horizontal id=form-edit-pengkajian-ulang-risiko-jatuh-pasien-lansia'); ?>
        <input type="hidden" name="id" id="id-pengkajian-ulang-risiko-jatuh-pasien-lansia">
        <table class="table table-no-border table-sm table-striped">
          <tr>
            <td>
              Tanggal Pengkajian
            </td>
            <td>
              :
            </td>
            <td>
              <input type="text" name="purjpl_tanggal_pengkajian" id="purjpl-edit-tanggal-pengkajian" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="dd/mm/yyyy">
            </td>
          </tr>
        </table>
        <hr>
        <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-purjpl">
          <thead>
            <tr>
              <th width="5%" class="center">no</th>
              <th width="15%" class="center"><b>Parameter</b></th>
              <th width="60%" class="center"><b>Skrining</b></th>
              <th width="10%" class="center"><b>Jawaban</b></th>
              <th width="10%" class="center"><b>Skor</b></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="center" rowspan="2">1</td>
              <td rowspan="2"><input type="hidden" id="purjpl-edit-riwayat-jatuh">Riwayat Jatuh</td>
              <td>
                <input type="hidden" id="purjpl-edit-pasien-datang-karena-jatuh">Apakah pasien datang ke
                RS karena jatuh?
              </td>
              <td class="center">
                <input type="radio" name="purjpl_pasien_datang_karena_jatuh" id="purjpl-edit-pasien-datang-karena-jatuh-1" value="6" class="mr-1" onchange="calcscorepurjpl()">
                Ya
                <input type="radio" name="purjpl_pasien_datang_karena_jatuh" id="purjpl-edit-pasien-datang-karena-jatuh-2" value="0" class="mr-1" onchange="calcscorepurjpl()">
                Tidak
              </td>
              <td rowspan="2">
                Salah satu jawaban ya = 6
              </td>
            </tr>
            <tr>
              <td>
                <input type="hidden" id="purjpl-edit-jatuh-2-bulan-terakhir">Jika tidak, apakah pasien
                mengalami jatuh dalam 2 bulan terakhir?
              </td>
              <td class="center">
                <input type="radio" name="purjpl_jatuh_2_bulan_terakhir" id="purjpl-edit-jatuh-2-bulan-terakhir-1" value="6" class="mr-1" onchange="calcscorepurjpl()">
                Ya
                <input type="radio" name="purjpl_jatuh_2_bulan_terakhir" id="purjpl-edit-jatuh-2-bulan-terakhir-2" value="0" class="mr-1" onchange="calcscorepurjpl()">
                Tidak
              </td>
            </tr>
            <tr>
              <td class="center" rowspan="3">2</td>
              <td rowspan="3"><input type="hidden" id="purjpl-edit-mental">Status Mental</td>
              <td>
                <input type="hidden" id="purjpl-edit-pasien-delirium">Apakah pasien delirium? (Tidak
                dapat membuat keputusan, pola pikir tidak terorganisir, gangguan daya ingat)
              </td>
              <td class="center">
                <input type="radio" name="purjpl_pasien_delirium" id="purjpl-edit-pasien-delirium-1" value="14" class="mr-1" onchange="calcscorepurjpl()">
                Ya
                <input type="radio" name="purjpl_pasien_delirium" id="purjpl-edit-pasien-delirium-2" value="0" class="mr-1" onchange="calcscorepurjpl()">
                Tidak
              </td>
              <td rowspan="3">
                Salah satu jawaban ya = 14
              </td>
            </tr>
            <tr>
              <td>
                <input type="hidden" id="purjpl-edit-pasien-disorientasi">Apakah pasien disorientasi?
                (salah menyebutkan waktu, tempat atau orang)
              </td>
              <td class="center">
                <input type="radio" name="purjpl_pasien_disorientasi" id="purjpl-edit-pasien-disorientasi-1" value="14" class="mr-1" onchange="calcscorepurjpl()">
                Ya
                <input type="radio" name="purjpl_pasien_disorientasi" id="purjpl-edit-pasien-disorientasi-2" value="0" class="mr-1" onchange="calcscorepurjpl()">
                Tidak
              </td>
            </tr>
            <tr>
              <td>
                <input type="hidden" id="purjpl-edit-pasien-agitasi">Apakah pasien mengalami agitasi?
                (ketakutan, gelisah, dan cemas)
              </td>
              <td class="center">
                <input type="radio" name="purjpl_pasien_agitasi" id="purjpl-edit-pasien-agitasi-1" value="14" class="mr-1" onchange="calcscorepurjpl()">
                Ya
                <input type="radio" name="purjpl_pasien_agitasi" id="purjpl-edit-pasien-agitasi-2" value="0" class="mr-1" onchange="calcscorepurjpl()">
                Tidak
              </td>
            </tr>
            <tr>
              <td class="center" rowspan="3">3</td>
              <td rowspan="3"><input type="hidden" id="purjpl-edit-penglihatan">Penglihatan</td>
              <td>
                <input type="hidden" id="purjpl-edit-pasien-kacamata">Apakah pasien memakai kacamata?
              </td>
              <td class="center">
                <input type="radio" name="purjpl_pasien_kacamata" id="purjpl-edit-pasien-kacamata-1" value="1" class="mr-1" onchange="calcscorepurjpl()">
                Ya
                <input type="radio" name="purjpl_pasien_kacamata" id="purjpl-edit-pasien-kacamata-2" value="0" class="mr-1" onchange="calcscorepurjpl()">
                Tidak
              </td>
              <td rowspan="3">
                Salah satu jawaban ya = 1
              </td>
            </tr>
            <tr>
              <td>
                <input type="hidden" id="purjpl-edit-pasien-buram">Apakah pasien mengeluh adanya
                penegelihatan buram?
              </td>
              <td class="center">
                <input type="radio" name="purjpl_pasien_buram" id="purjpl-edit-pasien-buram-1" value="1" class="mr-1" onchange="calcscorepurjpl()">
                Ya
                <input type="radio" name="purjpl_pasien_buram" id="purjpl-edit-pasien-buram-2" value="0" class="mr-1" onchange="calcscorepurjpl()">
                Tidak
              </td>
            </tr>
            <tr>
              <td>
                <input type="hidden" id="purjpl-edit-pasien-glaukoma">Apakah pasien mempunyai glaukoma?
                Katarak / degenerasi makula?
              </td>
              <td class="center">
                <input type="radio" name="purjpl_pasien_glaukoma" id="purjpl-edit-pasien-glaukoma-1" value="1" class="mr-1" onchange="calcscorepurjpl()">
                Ya
                <input type="radio" name="purjpl_pasien_glaukoma" id="purjpl-edit-pasien-glaukoma-2" value="0" class="mr-1" onchange="calcscorepurjpl()">
                Tidak
              </td>
            </tr>
            <tr>
              <td class="center">4</td>
              <td><input type="hidden" id="purjpl-edit-berkemih">Kebiasaan Berkemih</td>
              <td>
                <input type="hidden" id="purjpl-edit-pasien-berkemih">Apakah terdapat perunbahan
                perilaku berkemih? (frekuensi, urgensi, inkonteinensia, nokturia)
              </td>
              <td class="center">
                <input type="radio" name="purjpl_pasien_berkemih" id="purjpl-edit-pasien-berkemih-1" value="2" class="mr-1" onchange="calcscorepurjpl()">
                Ya
                <input type="radio" name="purjpl_pasien_berkemih" id="purjpl-edit-pasien-berkemih-2" value="0" class="mr-1" onchange="calcscorepurjpl()">
                Tidak
              </td>
              <td>
                Salah satu jawaban ya = 2
              </td>
            </tr>
            <tr>
              <td class="center" rowspan="4">5</td>
              <td rowspan="4"><input type="hidden" id="purjpl-edit-transfer">Transfer (dari tempat tidur
                ke kursi dan kembali lagi ketempat tidur)</td>
              <td>
                <input type="hidden" id="purjpl-edit-mandiri">Mandiri (boleh memakai alat bantu jalan)
              </td>
              <td class="center">
                <input type="checkbox" name="purjpl_pasien_mandiri" id="purjpl-edit-pasien-mandiri" value="0" class="mr-1" onchange="calcscorepurjpl()">
                0
              </td>
              <td rowspan="8">
                <div style="display: flex;flex-direction: column;">
                  Jumlah nilai transfer dan mobilitas jika
                  <span>nilai total 0 - 3 = 0</span>
                  <span>nilai total 4 - 6 = 7</span>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <input type="hidden" id="purjpl-edit-sedikit-bantuan">Memerlukan sedikit bantuan (1
                orang) / dalam pengawasan
              </td>
              <td class="center">
                <input type="checkbox" name="purjpl_pasien_sedikit_bantuan" id="purjpl-edit-pasien-sedikit-bantuan" value="1" class="mr-1" onchange="calcscorepurjpl()">
                1
              </td>
            </tr>
            <tr>
              <td>
                <input type="hidden" id="purjpl-edit-bantuan-nyata">Memerlukan bantuan yang nyata (2
                orang)
              </td>
              <td class="center">
                <input type="checkbox" name="purjpl_pasien_bantuan_nyata" id="purjpl-edit-pasien-bantuan-nyata" value="2" class="mr-1" onchange="calcscorepurjpl()">
                2
              </td>
            </tr>
            <tr>
              <td>
                <input type="hidden" id="purjpl-edit-bantuan-total">Tidak dapat duduk dengan seimbang,
                perlu bantuan total
              </td>
              <td class="center">
                <input type="checkbox" name="purjpl_pasien_bantuan_total" id="purjpl-edit-pasien-bantuan-total" value="3" class="mr-1" onchange="calcscorepurjpl()">
                3
              </td>
            </tr>
            <tr>
              <td class="center" rowspan="4">6</td>
              <td rowspan="4"><input type="hidden" id="purjpl-edit-mobilitas">Mobilitas</td>
              <td>
                <input type="hidden" id="purjpl-edit-m-mandiri">Mandiri (boleh memakai alat bantu jalan)
              </td>
              <td class="center">
                <input type="checkbox" name="purjpl_pasien_m_mandiri" id="purjpl-edit-pasien-m-mandiri" value="0" class="mr-1" onchange="calcscorepurjpl()">
                0
              </td>
            </tr>
            <tr>
              <td>
                <input type="hidden" id="purjpl-edit-m-sedikit-bantuan">Memerlukan sedikit bantuan 1
                orang (verbal/fisik)
              </td>
              <td class="center">
                <input type="checkbox" name="purjpl_pasien_m_sedikit_bantuan" id="purjpl-edit-pasien-m-sedikit-bantuan" value="1" class="mr-1" onchange="calcscorepurjpl()">
                1
              </td>
            </tr>
            <tr>
              <td>
                <input type="hidden" id="purjpl-edit-kursi-roda">Menggunakan kursi roda
              </td>
              <td class="center">
                <input type="checkbox" name="purjpl_pasien_kursi_roda" id="purjpl-edit-pasien-kursi-roda" value="2" class="mr-1" onchange="calcscorepurjpl()">
                2
              </td>
            </tr>
            <tr>
              <td>
                <input type="hidden" id="purjpl-edit-imobilisasi">Imobilisasi
              </td>
              <td class="center">
                <input type="checkbox" name="purjpl_pasien_imobilisasi" id="purjpl-edit-pasien-imobilisasi" value="3" class="mr-1" onchange="calcscorepurjpl()">
                3
              </td>
            </tr>
            <tr>
              <td colspan="3" class="bold">JUMLAH SKOR</td>
              <td colspan="2" class="center"><input type="number" min="0" name="purjpl_jumlah_skor" id="purjpl-edit-jumlah-skor" class="custom-form clear-input center" placeholder="Jumlah" value="0" readonly></td>
            </tr>
            <tr>
              <td class="bold">Paraf</td>
              <td colspan="2"><input type="checkbox" name="purjpl_paraf" id="purjpl-edit-paraf" aria-label="Checkbox for paraf" /></td>
            </tr>
            <tr>
              <td class="bold">Perawat</td>
              <td colspan="5">
                <div class="input-group">
                  <input type="text" name="purjpl_perawat" id="purjpl-edit-perawat" class="select2c-input ml-2">
                </div>
              </td>
            </tr>
          </tbody>
        </table>
        <hr>
        <?= form_close(); ?>
      </div>
      <div class="modal-footer" id="update-purjpl">
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- End Modal Edit Pengkajian Ulang Risiko Jatuh Pasien Lansia -->

<!-- Modal Edit Upaya Pencegahan Risiko Jatuh Pasien Lansia -->
<div id="modal-edit-upaya-pencegahan-risiko-jatuh-pasien-lansia" class="modal fade" role="dialog">
  <div class="modal-dialog" style="max-width: 80%">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Upaya Pencegahan Risiko Jatuh Pasien Lansia</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'role=form class=form-horizontal id=form-edit-upaya-pencegahan-risiko-jatuh-pasien-lansia'); ?>
        <input type="hidden" name="id" id="id-upaya-pencegahan-risiko-jatuh-pasien-lansia">
        <div class="from-group">
          <label for="uprjpl-tanggal-pengkajian">Tanggal Tindakan Pencegahan : </label>
          <input type="text" name="uprjpl_tanggal_pengkajian" id="uprjpl-edit-tanggal-pengkajian" class="custom-form clear-input d-inline-block col-lg-3 ml-2" placeholder="dd/mm/yyyy">
        </div>
        <hr>
        <hr>
        <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-uprjpl">
          <thead>
            <tr>
              <th class="center" rowspan="2"><b>Tindakan Pencegahan</b></th>
              <th class="center" colspan="2">Pagi</th>
              <th class="center" colspan="2">Siang</th>
              <th class="center" colspan="3">Malam</th>
            </tr>
            <tr>
              <th class="center">Hand Over</th>
              <th class="center">Jam 10</th>
              <th class="center">Hand Over</th>
              <th class="center">Jam 18</th>
              <th class="center">Hand Over</th>
              <th class="center">Jam 23</th>
              <th class="center">Jam 4</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="8" class="bold text-uppercase">Risiko Rendah/Sedang</td>
            </tr>
            <tr>
              <td>Bel berfungsi dan mudah dijangkau</td>
              <td class="center"><input type="checkbox" name="uprjpl_bel_p_ho" id="uprjpl-edit-bel-p-ho">
              </td>
              <td class="center"><input type="checkbox" name="uprjpl_bel_p_10" id="uprjpl-edit-bel-p-10">
              </td>
              <td class="center"><input type="checkbox" name="uprjpl_bel_s_ho" id="uprjpl-edit-bel-s-ho">
              </td>
              <td class="center"><input type="checkbox" name="uprjpl_bel_s_18" id="uprjpl-edit-bel-s-18">
              </td>
              <td class="center"><input type="checkbox" name="uprjpl_bel_m_ho" id="uprjpl-edit-bel-m-ho">
              </td>
              <td class="center"><input type="checkbox" name="uprjpl_bel_m_23" id="uprjpl-edit-bel-m-23">
              </td>
              <td class="center"><input type="checkbox" name="uprjpl_bel_m_4" id="uprjpl-edit-bel-m-4">
              </td>
            </tr>
            <tr>
              <td>Roda tempat tidur terkunci</td>
              <td class="center"><input type="checkbox" name="uprjpl_roda_p_ho" id="uprjpl-edit-roda-p-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpl_roda_p_10" id="uprjpl-edit-roda-p-10"></td>
              <td class="center"><input type="checkbox" name="uprjpl_roda_s_ho" id="uprjpl-edit-roda-s-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpl_roda_s_18" id="uprjpl-edit-roda-s-18"></td>
              <td class="center"><input type="checkbox" name="uprjpl_roda_m_ho" id="uprjpl-edit-roda-m-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpl_roda_m_23" id="uprjpl-edit-roda-m-23"></td>
              <td class="center"><input type="checkbox" name="uprjpl_roda_m_4" id="uprjpl-edit-roda-m-4">
              </td>
            </tr>
            <tr>
              <td>Posisikan tempat tidur pada posisi terendah</td>
              <td class="center"><input type="checkbox" name="uprjpl_ptt_p_ho" id="uprjpl-edit-ptt-p-ho">
              </td>
              <td class="center"><input type="checkbox" name="uprjpl_ptt_p_10" id="uprjpl-edit-ptt-p-10">
              </td>
              <td class="center"><input type="checkbox" name="uprjpl_ptt_s_ho" id="uprjpl-edit-ptt-s-ho">
              </td>
              <td class="center"><input type="checkbox" name="uprjpl_ptt_s_18" id="uprjpl-edit-ptt-s-18">
              </td>
              <td class="center"><input type="checkbox" name="uprjpl_ptt_m_ho" id="uprjpl-edit-ptt-m-ho">
              </td>
              <td class="center"><input type="checkbox" name="uprjpl_ptt_m_23" id="uprjpl-edit-ptt-m-23">
              </td>
              <td class="center"><input type="checkbox" name="uprjpl_ptt_m_4" id="uprjpl-edit-ptt-m-4">
              </td>
            </tr>
            <tr>
              <td>Pagar pengaman tempat tidur dinaikan</td>
              <td class="center"><input type="checkbox" name="uprjpl_ppt_p_ho" id="uprjpl-edit-ppt-p-ho">
              </td>
              <td class="center"><input type="checkbox" name="uprjpl_ppt_p_10" id="uprjpl-edit-ppt-p-10">
              </td>
              <td class="center"><input type="checkbox" name="uprjpl_ppt_s_ho" id="uprjpl-edit-ppt-s-ho">
              </td>
              <td class="center"><input type="checkbox" name="uprjpl_ppt_s_18" id="uprjpl-edit-ppt-s-18">
              </td>
              <td class="center"><input type="checkbox" name="uprjpl_ppt_m_ho" id="uprjpl-edit-ppt-m-ho">
              </td>
              <td class="center"><input type="checkbox" name="uprjpl_ppt_m_23" id="uprjpl-edit-ppt-m-23">
              </td>
              <td class="center"><input type="checkbox" name="uprjpl_ppt_m_4" id="uprjpl-edit-ppt-m-4">
              </td>
            </tr>
            <tr>
              <td>Penerang cukup</td>
              <td class="center"><input type="checkbox" name="uprjpl_penerangan_p_ho" id="uprjpl-edit-penerangan-p-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpl_penerangan_p_10" id="uprjpl-edit-penerangan-p-10"></td>
              <td class="center"><input type="checkbox" name="uprjpl_penerangan_s_ho" id="uprjpl-edit-penerangan-s-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpl_penerangan_s_18" id="uprjpl-edit-penerangan-s-18"></td>
              <td class="center"><input type="checkbox" name="uprjpl_penerangan_m_ho" id="uprjpl-edit-penerangan-m-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpl_penerangan_m_23" id="uprjpl-edit-penerangan-m-23"></td>
              <td class="center"><input type="checkbox" name="uprjpl_penerangan_m_4" id="uprjpl-edit-penerangan-m-4"></td>
            </tr>
            <tr>
              <td>Pastikan alas kaki yang tidak licin untuk pasien yang dapat berjalan</td>
              <td class="center"><input type="checkbox" name="uprjpl_alas_p_ho" id="uprjpl-edit-alas-p-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpl_alas_p_10" id="uprjpl-edit-alas-p-10"></td>
              <td class="center"><input type="checkbox" name="uprjpl_alas_s_ho" id="uprjpl-edit-alas-s-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpl_alas_s_18" id="uprjpl-edit-alas-s-18"></td>
              <td class="center"><input type="checkbox" name="uprjpl_alas_m_ho" id="uprjpl-edit-alas-m-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpl_alas_m_23" id="uprjpl-edit-alas-m-23"></td>
              <td class="center"><input type="checkbox" name="uprjpl_alas_m_4" id="uprjpl-edit-alas-m-4">
              </td>
            </tr>
            <tr>
              <td>Lantai kering dan tidak licin</td>
              <td class="center"><input type="checkbox" name="uprjpl_lantai_p_ho" id="uprjpl-edit-lantai-p-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpl_lantai_p_10" id="uprjpl-edit-lantai-p-10"></td>
              <td class="center"><input type="checkbox" name="uprjpl_lantai_s_ho" id="uprjpl-edit-lantai-s-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpl_lantai_s_18" id="uprjpl-edit-lantai-s-18"></td>
              <td class="center"><input type="checkbox" name="uprjpl_lantai_m_ho" id="uprjpl-edit-lantai-m-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpl_lantai_m_23" id="uprjpl-edit-lantai-m-23"></td>
              <td class="center"><input type="checkbox" name="uprjpl_lantai_m_4" id="uprjpl-edit-lantai-m-4"></td>
            </tr>
            <tr>
              <td>Dekatkan alat-alat pasien</td>
              <td class="center"><input type="checkbox" name="uprjpl_alat_p_ho" id="uprjpl-edit-alat-p-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpl_alat_p_10" id="uprjpl-edit-alat-p-10"></td>
              <td class="center"><input type="checkbox" name="uprjpl_alat_s_ho" id="uprjpl-edit-alat-s-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpl_alat_s_18" id="uprjpl-edit-alat-s-18"></td>
              <td class="center"><input type="checkbox" name="uprjpl_alat_m_ho" id="uprjpl-edit-alat-m-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpl_alat_m_23" id="uprjpl-edit-alat-m-23"></td>
              <td class="center"><input type="checkbox" name="uprjpl_alat_m_4" id="uprjpl-edit-alat-m-4">
              </td>
            </tr>
            <tr>
              <td>Edukasi pasien tentang efek samping obat yang diberikan</td>
              <td class="center"><input type="checkbox" name="uprjpl_edukasi_p_ho" id="uprjpl-edit-edukasi-p-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpl_edukasi_p_10" id="uprjpl-edit-edukasi-p-10"></td>
              <td class="center"><input type="checkbox" name="uprjpl_edukasi_s_ho" id="uprjpl-edit-edukasi-s-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpl_edukasi_s_18" id="uprjpl-edit-edukasi-s-18"></td>
              <td class="center"><input type="checkbox" name="uprjpl_edukasi_m_ho" id="uprjpl-edit-edukasi-m-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpl_edukasi_m_23" id="uprjpl-edit-edukasi-m-23"></td>
              <td class="center"><input type="checkbox" name="uprjpl_edukasi_m_4" id="uprjpl-edit-edukasi-m-4"></td>
            </tr>
            <tr>
              <td>Tidak meninggalkan pasien di kamar mandi saat menggunakan commode</td>
              <td class="center"><input type="checkbox" name="uprjpl_commode_p_ho" id="uprjpl-edit-commode-p-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpl_commode_p_10" id="uprjpl-edit-commode-p-10"></td>
              <td class="center"><input type="checkbox" name="uprjpl_commode_s_ho" id="uprjpl-edit-commode-s-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpl_commode_s_18" id="uprjpl-edit-commode-s-18"></td>
              <td class="center"><input type="checkbox" name="uprjpl_commode_m_ho" id="uprjpl-edit-commode-m-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpl_commode_m_23" id="uprjpl-edit-commode-m-23"></td>
              <td class="center"><input type="checkbox" name="uprjpl_commode_m_4" id="uprjpl-edit-commode-m-4"></td>
            </tr>
            <tr>
              <td colspan="8" class="bold text-uppercase">Risiko Tinggi</td>
            </tr>
            <tr>
              <td>Pasang gelang khusus (Warna Kuning)</td>
              <td class="center"><input type="checkbox" name="uprjpl_gelang_p_ho" id="uprjpl-edit-gelang-p-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpl_gelang_p_10" id="uprjpl-edit-gelang-p-10"></td>
              <td class="center"><input type="checkbox" name="uprjpl_gelang_s_ho" id="uprjpl-edit-gelang-s-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpl_gelang_s_18" id="uprjpl-edit-gelang-s-18"></td>
              <td class="center"><input type="checkbox" name="uprjpl_gelang_m_ho" id="uprjpl-edit-gelang-m-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpl_gelang_m_23" id="uprjpl-edit-gelang-m-23"></td>
              <td class="center"><input type="checkbox" name="uprjpl_gelang_m_4" id="uprjpl-edit-gelang-m-4"></td>
            </tr>
            <tr>
              <td>Tempatkan pasien di kamar yang paling dekat dengan Nurse Station (jika memungkinkan)
              </td>
              <td class="center"><input type="checkbox" name="uprjpl_station_p_ho" id="uprjpl-edit-station-p-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpl_station_p_10" id="uprjpl-edit-station-p-10"></td>
              <td class="center"><input type="checkbox" name="uprjpl_station_s_ho" id="uprjpl-edit-station-s-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpl_station_s_18" id="uprjpl-edit-station-s-18"></td>
              <td class="center"><input type="checkbox" name="uprjpl_station_m_ho" id="uprjpl-edit-station-m-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpl_station_m_23" id="uprjpl-edit-station-m-23"></td>
              <td class="center"><input type="checkbox" name="uprjpl_station_m_4" id="uprjpl-edit-station-m-4"></td>
            </tr>
            <tr>
              <td class="bold">Paraf</td>
              <td class="center"><input type="checkbox" name="uprjpl_paraf_p_ho" id="uprjpl-edit-paraf-p-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpl_paraf_p_10" id="uprjpl-edit-paraf-p-10"></td>
              <td class="center"><input type="checkbox" name="uprjpl_paraf_s_ho" id="uprjpl-edit-paraf-s-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpl_paraf_s_18" id="uprjpl-edit-paraf-s-18"></td>
              <td class="center"><input type="checkbox" name="uprjpl_paraf_m_ho" id="uprjpl-edit-paraf-m-ho"></td>
              <td class="center"><input type="checkbox" name="uprjpl_paraf_m_23" id="uprjpl-edit-paraf-m-23"></td>
              <td class="center"><input type="checkbox" name="uprjpl_paraf_m_4" id="uprjpl-edit-paraf-m-4"></td>
            </tr>
            <tr>
              <td class="bold">Perawat</td>
              <td colspan="2">
                <div class="input-group">
                  <input type="text" name="uprjpl_perawat_p" id="uprjpl-edit-perawat-p" class="select2c-input ml-2">
                </div>
              </td>
              <td colspan="2">
                <div class="input-group">
                  <input type="text" name="uprjpl_perawat_s" id="uprjpl-edit-perawat-s" class="select2c-input ml-2">
                </div>
              </td>
              <td colspan="3">
                <div class="input-group">
                  <input type="text" name="uprjpl_perawat_m" id="uprjpl-edit-perawat-m" class="select2c-input ml-2">
                </div>
              </td>
            </tr>
          </tbody>
        </table>
        <hr>
        <?= form_close(); ?>
      </div>
      <div class="modal-footer" id="update-uprjpl">
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- End Modal Edit Upaya Pencegahan Risiko Jatuh Pasien Lansia -->

<!-- UPRJPN -->
<!-- Modal Edit Upaya Pencegahan Risiko Jatuh Pada Neonatus -->
<div id="modal-edit-upaya-pencegahan-risiko-jatuh-pada-neonatus" class="modal fade" role="dialog">
  <div class="modal-dialog" style="max-width: 80%">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Upaya Pencegahan Risiko Jatuh Pada Neonatus</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'role=form class=form-horizontal id=form-edit-upaya-pencegahan-risiko-jatuh-pada-neonatus'); ?>
        <input type="hidden" name="id" id="id-upaya-pencegahan-risiko-jatuh-pada-neonatus">
        <div class="from-group">
          <label for="uprjpn-tanggal-pengkajian">Tanggal Tindakan Pencegahan : </label>
          <input type="text" name="uprjpn_tanggal_pengkajian" id="uprjpn-edit-tanggal-pengkajian" class="custom-form clear-input d-inline-block col-lg-3 ml-2" placeholder="dd/mm/yyyy">
        </div>
        <hr>
        <hr>
        <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-uprjpn">
          <thead>
            <tr>
              <th class="center" rowspan="2"><b>Tindakan Pencegahan</b></th>
              <th class="center" colspan="2">Pagi</th>
              <th class="center" colspan="2">Siang</th>
              <th class="center" colspan="3">Malam</th>
            </tr>
            <tr>
              <th class="center">Hand Over</th>
              <th class="center">Jam 10</th>
              <th class="center">Hand Over</th>
              <th class="center">Jam 18</th>
              <th class="center">Hand Over</th>
              <th class="center">Jam 23</th>
              <th class="center">Jam 4</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="8" class="bold text-uppercase"></td>
            </tr>
            <tr>
              <td>Posisi tanda Risiko jatuh tetap ada/terpasang</td>
              <td class="center"><input type="checkbox" name="terpasang_p_ho" id="terpasang-edit-p-ho">
              </td>
              <td class="center"><input type="checkbox" name="terpasang_p_10" id="terpasang-edit-p-10">
              </td>
              <td class="center"><input type="checkbox" name="terpasang_s_ho" id="terpasang-edit-s-ho">
              </td>
              <td class="center"><input type="checkbox" name="terpasang_s_18" id="terpasang-edit-s-18">
              </td>
              <td class="center"><input type="checkbox" name="terpasang_m_ho" id="terpasang-edit-m-ho">
              </td>
              <td class="center"><input type="checkbox" name="terpasang_m_23" id="terpasang-edit-m-23">
              </td>
              <td class="center"><input type="checkbox" name="terpasang_m_4" id="terpasang-edit-m-4">
              </td>
            </tr>
            <tr>
              <td>Pastikan roda box/incubator pada posisi terkunci</td>
              <td class="center"><input type="checkbox" name="terkunci_p_ho" id="terkunci-edit-p-ho"></td>
              <td class="center"><input type="checkbox" name="terkunci_p_10" id="terkunci-edit-p-10"></td>
              <td class="center"><input type="checkbox" name="terkunci_s_ho" id="terkunci-edit-s-ho"></td>
              <td class="center"><input type="checkbox" name="terkunci_s_18" id="terkunci-edit-s-18"></td>
              <td class="center"><input type="checkbox" name="terkunci_m_ho" id="terkunci-edit-m-ho"></td>
              <td class="center"><input type="checkbox" name="terkunci_m_23" id="terkunci-edit-m-23"></td>
              <td class="center"><input type="checkbox" name="terkunci_m_4" id="terkunci-edit-m-4">
              </td>
            </tr>
            <tr>
              <td>Pastikan pintu inkubator tertutup bila tidak ada tindakan</td>
              <td class="center"><input type="checkbox" name="tindakan_p_ho" id="tindakan-edit-p-ho">
              </td>
              <td class="center"><input type="checkbox" name="tindakan_p_10" id="tindakan-edit-p-10">
              </td>
              <td class="center"><input type="checkbox" name="tindakan_s_ho" id="tindakan-edit-s-ho">
              </td>
              <td class="center"><input type="checkbox" name="tindakan_s_18" id="tindakan-edit-s-18">
              </td>
              <td class="center"><input type="checkbox" name="tindakan_m_ho" id="tindakan-edit-m-ho">
              </td>
              <td class="center"><input type="checkbox" name="tindakan_m_23" id="tindakan-edit-m-23">
              </td>
              <td class="center"><input type="checkbox" name="tindakan_m_4" id="tindakan-edit-m-4">
              </td>
            </tr>

            <tr>
              <td class="bold">Paraf</td>
              <td class="center"><input type="checkbox" name="paraff_p_ho" id="paraff-edit-p-ho"></td>
              <td class="center"><input type="checkbox" name="paraff_p_10" id="paraff-edit-p-10"></td>
              <td class="center"><input type="checkbox" name="paraff_s_ho" id="paraff-edit-s-ho"></td>
              <td class="center"><input type="checkbox" name="paraff_s_18" id="paraff-edit-s-18"></td>
              <td class="center"><input type="checkbox" name="paraff_m_ho" id="paraff-edit-m-ho"></td>
              <td class="center"><input type="checkbox" name="paraff_m_23" id="paraff-edit-m-23"></td>
              <td class="center"><input type="checkbox" name="paraff_m_4" id="paraff-edit-m-4"></td>
            </tr>
            <tr>
              <td class="bold">Perawat</td>
              <td colspan="2">
                <div class="input-group">
                  <input type="text" name="perawat_1" id="perawat-edit-1" class="select2c-input ml-2">
                </div>
              </td>
              <td colspan="2">
                <div class="input-group">
                  <input type="text" name="perawat_2" id="perawat-edit-2" class="select2c-input ml-2">
                </div>
              </td>
              <td colspan="3">
                <div class="input-group">
                  <input type="text" name="perawat_3" id="perawat-edit-3" class="select2c-input ml-2">
                </div>
              </td>
            </tr>
          </tbody>
        </table>
        <hr>
        <?= form_close(); ?>
      </div>
      <div class="modal-footer" id="update-uprjpn">
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- End Modal Edit Upaya Pencegahan Risiko Jatuh Pada Neonatus -->

<!-- // CPDPO  -->
<div id="modal-edit-riwayat-pemakaian-obat" class="modal fade" role="dialog">
  <div class="modal-dialog" style="max-width: 80%">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Riwayat Pemakaian Obat</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'role=form class=form-horizontal id=form-edit-riwayat-pemakaian-obat'); ?>
        <input type="hidden" name="id" id="id-riwayat-pemakaian-obat">
        <div class="from-group">
          <label for="rpo-alergi">Alergi : </label>
          <input type="radio" name="alergii" id="alergii-2-edit" class="mr-1 ml-4" value="0" checked> Tidak,
          <input type="radio" name="alergii" id="alergii-1-edit" class="mr-1" value="1">Ya
          <input type="text" name="alergii_ob" id="alergii-3-edit" class="custom-form clear-input d-inline-block col-lg-3 ml-2" placeholder="sebutkan">
        </div>
        <hr>
        <hr>
        <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-rpo">
          <thead>
            <tr>
              <th class="center"></th>
              <th class="center"></th>
              <th class="center"></th>
              <th class="center"></th>
              <th class="center" colspan="2">Mulai</th>
              <th class="center" colspan="2">Stop</th>
              <th class="center"></th>
              <th class="center"></th>
            </tr>
            <tr>
              <th class="center">Nama Obat</th>
              <th class="center">Rute</th>
              <th class="center">Dosis</th>
              <th class="center">Frekuensi</th>
              <th class="center">Tanggal</th>
              <th class="center">Dokter</th>
              <th class="center">Tanggal</th>
              <th class="center">Dokter</th>
              <th class="center">Efek Samping Obat</th>
              <th class="center">Review Farmasi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="10" class="bold text-uppercase"></td>
            </tr>
            <tr>
              <td class="center"><input type="text" name="nama_obat_rpo" id="nama-obat-rpo-edit" class="select2c-input ml-2"></td>
              <td class="center"><input type="text" name="rute_rpo" id="rute-rpo-edit" class="custom-form clear-input d-inline-block col-lg-10"></td>
              <td class="center"><input type="text" name="dosis_rpo" id="dosis-rpo-edit" class="custom-form clear-input d-inline-block col-lg-10"></td>
              <td class="center"><input type="text" name="frekuensi_rpo" id="frekuensi-rpo-edit" class="custom-form clear-input d-inline-block col-lg-10"></td>
              <td class="center"><input type="text" name="tanggal_rpo" id="tanggal-rpo-edit" class="custom-form clear-input d-inline-block col-lg-10"></td>
              <td class="center"><input type="text" name="dokter_1_rpo" id="dokter-1-rpo-edit" class="select2c-input ml-2"></td>
              <td class="center"><input type="text" name="tangggal_rpo" id="tangggal-rpo-edit" class="custom-form clear-input d-inline-block col-lg-10"></td>
              <td class="center"><input type="text" name="dokter_2_rpo" id="dokter-2-rpo-edit" class="select2c-input ml-2"></td>
              <td class="center"><input type="text" name="eso_rpo" id="eso-rpo-edit" class="custom-form clear-input d-inline-block col-lg-10"></td>
              <td class="center"><input type="text" name="r_farmasi_rpo" id="r-farmasi-rpo-edit" class="custom-form clear-input d-inline-block col-lg-10"></td>
            </tr>
          </tbody>
        </table>
        <hr>
        <?= form_close(); ?>
      </div>
      <div class="modal-footer" id="update-rpo">
      </div>
    </div>
  </div>
</div>

<!-- // ILLIS  -->
<div id="modal-edit-riwayat-pemakaian-obat-infus" class="modal fade" role="dialog">
  <div class="modal-dialog" style="max-width: 80%">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Infus Lain-lain Inhalasi Suppositoria</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'role=form class=form-horizontal id=form-edit-riwayat-pemakaian-obat-infus'); ?>
        <input type="hidden" name="id" id="id-riwayat-pemakaian-obat-infus">
        <div class="from-group">
          <label for="rpo-alergi">Alergi : </label>
          <input type="radio" name="alergiii" id="alergiii-2-edit" class="mr-1 ml-4" value="0" checked> Tidak,
          <input type="radio" name="alergiii" id="alergiii-1-edit" class="mr-1" value="1">Ya
          <input type="text" name="alergii_obb" id="alergiii-3-edit" class="custom-form clear-input d-inline-block col-lg-3 ml-2" placeholder="sebutkan">
        </div>
        <hr>
        <hr>
        <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-rpo">
          <thead>
            <tr>
              <th class="center"></th>
              <th class="center"></th>
              <th class="center"></th>
              <th class="center"></th>
              <th class="center" colspan="2">Mulai</th>
              <th class="center" colspan="2">Stop</th>
              <th class="center"></th>
              <th class="center"></th>
            </tr>
            <tr>
              <th class="center">Nama Obat</th>
              <th class="center">Rute</th>
              <th class="center">Dosis</th>
              <th class="center">Frekuensi</th>
              <th class="center">Tanggal</th>
              <th class="center">Dokter</th>
              <th class="center">Tanggal</th>
              <th class="center">Dokter</th>
              <th class="center">Efek Samping Obat</th>
              <th class="center">Review Farmasi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="10"><b>INFUS (LAIN - LAIN : INHALASI, SUPPOSITORIA)</b>
            </tr>
            <tr>
              <td class="center"><input type="text" name="nama_obat_rpoo" id="nama-obat-rpoo-edit" class="select2c-input ml-2"></td>
              <td class="center"><input type="text" name="rute_rpoo" id="rute-rpoo-edit" class="custom-form clear-input d-inline-block col-lg-10"></td>
              <td class="center"><input type="text" name="dosis_rpoo" id="dosis-rpoo-edit" class="custom-form clear-input d-inline-block col-lg-10"></td>
              <td class="center"><input type="text" name="frekuensi_rpoo" id="frekuensi-rpoo-edit" class="custom-form clear-input d-inline-block col-lg-10"></td>
              <td class="center"><input type="text" name="tanggal_rpoo" id="tanggal-rpoo-edit" class="custom-form clear-input d-inline-block col-lg-10"></td>
              <td class="center"><input type="text" name="dokter_1_rpoo" id="dokter-1-rpoo-edit" class="select2c-input ml-2"></td>
              <td class="center"><input type="text" name="tangggal_rpoo" id="tangggal-rpoo-edit" class="custom-form clear-input d-inline-block col-lg-10"></td>
              <td class="center"><input type="text" name="dokter_2_rpoo" id="dokter-2-rpoo-edit" class="select2c-input ml-2"></td>
              <td class="center"><input type="text" name="eso_rpoo" id="eso-rpoo-edit" class="custom-form clear-input d-inline-block col-lg-10"></td>
              <td class="center"><input type="text" name="r_farmasi_rpoo" id="r-farmasi-rpoo-edit" class="custom-form clear-input d-inline-block col-lg-10"></td>
            </tr>
          </tbody>
        </table>
        <hr>
        <?= form_close(); ?>
      </div>
      <div class="modal-footer" id="update-rpo-infus">
      </div>
    </div>
  </div>
</div>

<!-- // WPT -->
<div id="modal-edit-waktu-pemberian-tanggal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="max-width: 80%">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Waktu Pemberian Tanggal</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'role=form class=form-horizontal id=form-edit-waktu-pemberian-tanggal'); ?>
        <input type="hidden" name="id" id="id-waktu-pemberian-tanggal">
        <div class="from-group">
        </div>
        <hr>
        <hr>
        <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-wpt">
          <thead>
            <tr>
              <th class="center">Tanggal</th>
              <th class="center">Hari Ke</th>
              <th class="center">Jam</th>
              <th class="center">Perawat</th>
              <th class="center">Pasien / Keluarga</th>
              <th class="center">Pagi</th>
              <th class="center">Siang</th>
              <th class="center">Sore</th>
              <th class="center">Malam</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="10" class="bold text-uppercase"></td>
            </tr>
            <tr>
              <td class="center"><input type="text" name="tanggal_wpt" id="tanggal-wpt-edit" class="custom-form clear-input d-inline-block col-lg-10"></td>
              <td class="center"><input type="text" name="hari_wpt" id="hari-wpt-edit" class="custom-form clear-input d-inline-block col-lg-10"></td>
              <td class="center"><input type="text" name="jam_wpt" id="jam-wpt-edit" class="custom-form clear-input d-inline-block col-lg-10"></td>
              <td class="center"><input type="text" name="perawat_1_wpt" id="perawat-1-wpt-edit" class="select2c-input ml-2"></td>
              <td class="center"><input type="text" name="pasien_keluarga_wpt" id="pasien-keluarga-wpt-edit" class="custom-form clear-input d-inline-block col-lg-10"></td>
              <td class="center"><input type="checkbox" name="pagi_wpt" id="pagi-wpt-edit"></td>
              <td class="center"><input type="checkbox" name="siang_wpt" id="siang-wpt-edit"></td>
              <td class="center"><input type="checkbox" name="sore_wpt" id="sore-wpt-edit"></td>
              <td class="center"><input type="checkbox" name="malam_wpt" id="malam-wpt-edit"></td>
            </tr>
          </tbody>
        </table>
        <hr>
        <?= form_close(); ?>
      </div>
      <div class="modal-footer" id="update-wpt">
      </div>
    </div>
  </div>
</div>

<!-- // IWPT -->
<div id="modal-edit-waktu-pemberian-tanggal-infus" class="modal fade" role="dialog">
  <div class="modal-dialog" style="max-width: 80%">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Infus Lain-lain Inhalasi Suppositoria</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'role=form class=form-horizontal id=form-edit-waktu-pemberian-tanggal-infus'); ?>
        <input type="hidden" name="id" id="id-waktu-pemberian-tanggal-infus">
        <div class="from-group">
        </div>
        <hr>
        <hr>
        <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-wpt-infus">
          <thead>
            <tr>
              <th class="center">Tanggal</th>
              <th class="center">Hari Ke</th>
              <th class="center">Jam</th>
              <th class="center">Perawat</th>
              <th class="center">Pasien / Keluarga</th>
              <th class="center">Pagi</th>
              <th class="center">Siang</th>
              <th class="center">Sore</th>
              <th class="center">Malam</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="10" class="bold text-uppercase"></td>
            </tr>
            <tr>
              <td class="center"><input type="text" name="tanggal_wptt" id="tanggal-wptt-edit" class="custom-form clear-input d-inline-block col-lg-10"></td>
              <td class="center"><input type="text" name="hari_wptt" id="hari-wptt-edit" class="custom-form clear-input d-inline-block col-lg-10"></td>
              <td class="center"><input type="text" name="jam_wptt" id="jam-wptt-edit" class="custom-form clear-input d-inline-block col-lg-10"></td>
              <td class="center"><input type="text" name="perawat_2_wptt" id="perawat-2-wptt-edit" class="select2c-input ml-2"></td>
              <td class="center"><input type="text" name="pasien_keluarga_wptt" id="pasien-keluarga-wptt-edit" class="custom-form clear-input d-inline-block col-lg-10"></td>
              <td class="center"><input type="checkbox" name="pagi_wptt" id="pagi-wptt-edit"></td>
              <td class="center"><input type="checkbox" name="siang_wptt" id="siang-wptt-edit"></td>
              <td class="center"><input type="checkbox" name="sore_wptt" id="sore-wptt-edit"></td>
              <td class="center"><input type="checkbox" name="malam_wptt" id="malam-wptt-edit"></td>
            </tr>
          </tbody>
        </table>
        <hr>
        <?= form_close(); ?>
      </div>
      <div class="modal-footer" id="update-wpt-infus">
      </div>
    </div>
  </div>
</div>

<!-- // PKN -->
<div id="modal-edit-pengawasan-khusus-neonatus" class="modal fade" role="dialog">
  <div class="modal-dialog" style="max-width: 85%">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Pengawasan Khusus Neonatus</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'role=form class=form-horizontal id=form-edit-pengawasan-khusus-neonatus'); ?>
        <input type="hidden" name="id" id="id-pengawasan-khusus-neonatus">
        <div class="from-group">
        </div>
        <hr>
        <hr>
        <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-pkn">
          <thead>
            <tr>
              <th class="center">Bb<b></th>
              <th class="center">Lp<b></th>
              <th class="center">Tanggal<b></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="2" class="bold text-uppercase"></td>
            </tr>
            <tr>
              <td class="center"><input type="text" name="bb_pkn" id="bb-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="lp_pkn" id="lp-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="tgl_pkn" id="tgl-pkn-edit" class="custom-form clear-input d-inline-block col-lg-10"></td>
            </tr>
          </tbody>
          <thead>
            <tr>
              <th class="center"><b>Jam</b></th>
              <th class="center"><b>Kesadaran</b></th>
              <th class="center"><b>Pasien</b></th>
              <th class="center"><b>Inkubator</b></th>
              <th class="center"><b>Nadi</b></th>
              <th class="center"><b>RRt</b></th>
              <th class="center"><b>Modus</b></th>
              <th class="center"><b>Peep Cm H20</b></th>
              <th class="center"><b>Buble</b></th>
              <th class="center"><b>Fio2</b></th>
              <th class="center"><b>Sp02</b></th>
              <th class="center"><b>Flow</b></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="12" class="bold text-uppercase"></td>
            </tr>
            <tr>
              <td class="center"><input type="text" name="jam_pkn" id="jam-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="kesadaran_pkn" id="kesadaran-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="pasien_pkn" id="pasien-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="inkubator_pkn" id="inkubator-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="nadi_pkn" id="nadi-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="rr_pkn" id="rr-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="modus_pkn" id="modus-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="peep_pkn" id="peep-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="buble_pkn" id="buble-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="fio2_pkn" id="fio2-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="spo2_pkn" id="spo2-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="flow_pkn" id="flow-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
            </tr>
          </tbody>
          <thead>
            <tr>
              <th class="center"><b>Air</b></th>
              <th class="center"><b>Suhu</b></th>
              <th class="center"><b>Line 1</b></th>
              <th class="center"><b>Line 2</b></th>
              <th class="center"><b>Plebitis</b></th>
              <th class="center"><b>Oral</b></th>
              <th class="center"><b>Jml</b></th>
              <th class="center"><b>Muntah</b></th>
              <th class="center"><b>Residu</b></th>
              <th class="center"><b>BAK</b></th>
              <th class="center"><b>BAB</b></th>
              <th class="center"><b>Foto Therapy</b></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="12" class="bold text-uppercase"></td>
            </tr>
            <tr>
              <td class="center"><input type="text" name="air_pkn" id="air-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="suhu_pkn" id="suhu-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="line1_pkn" id="line1-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="line2_pkn" id="line2-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="plebitis_pkn" id="plebitis-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="oral_pkn" id="oral-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="jml_pkn" id="jml-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="muntah_pkn" id="muntah-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="residu_pkn" id="residu-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="bak_pkn" id="bak-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="bab_pkn" id="bab-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
              <td class="center"><input type="text" name="foto_therapy_pkn" id="foto-therapy-pkn-edit" class="custom-form clear-input d-inline-block col-lg-8"></td>
            </tr>
          </tbody>
        </table>
        <table>
          <thead>
            <tr>
              <th class="center"><b>Obat</b></th>
              <th class="center"><b>Perawat</b></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="2" class="bold text-uppercase"></td>
            </tr>
            <tr>
              <td class="center"><input type="text" name="obat_pkn" id="obat-pkn-edit" class="select2c-input ml-2"></td>
              <td class="center"><input type="text" name="perawat_pkn" id="perawat-pkn-edit" class="select2c-input ml-2"></td>
            </tr>
          </tbody>
        </table>
        <hr>
        <?= form_close(); ?>
      </div>
      <div class="modal-footer" id="update-pkn">
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- // PKN AKHIR -->

<!-- Modal Detail SURGICAL SAFETY CEKLIS -->
<div id="modal-detail-surgical-safety-ceklis" class="modal fade" role="dialog">
  <div class="modal-dialog" style="max-width: 90%">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">SURGICAL SAFETY CEKLIS</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
        <table class="table table-no-border table-sm table-striped" id="table-detail-surgical-safety-ceklis">
          <thead class="text-center">
            <tr>
              <th colspan="2">
                <h4>sign in</h4>
              </th>
              <th colspan="2">
                <h4>time out</h4>
              </th>
              <th colspan="2">
                <h4>sign out</h4>
              </th>
            </tr>
            <tr>
              <th colspan="2">(sebelum induksi Anestesi)</th>
              <th colspan="2">(sebelum insisi kulit)</th>
              <th colspan="2">(sebelum pasien keluar kamar operasi)</th>
            </tr>
          </thead>
        </table>
      </div>
      <div class="modal-footer" id="detail-ssc">
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
        <h4 class="modal-title">Edit Surggical Safety Cekli</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'role=form class=form-horizontal id=form-edit-surgical-safety-ceklis'); ?>
        <?= $this->session->userdata('nama') ?>
        <input type="hidden" name="user_surgical_safety_ceklis" value="<?= $this->session->userdata("id_translucent") ?>">
        <input type="hidden" name="id" id="id-surgical-safety-ceklis">
        <table class="table table-no-border table-sm table-striped" id="table-edit-surgical-safety-ceklis" style="margin-bottom: 10rem;">
          <thead class="text-center">
            <tr>
              <th colspan="2">
                <h4>sign in</h4>
              </th>
              <th colspan="2">
                <h4>time out</h4>
              </th>
              <th colspan="2">
                <h4>sign out</h4>
              </th>
            </tr>
            <tr>
              <th colspan="2">(sebelum induksi Anestesi)</th>
              <th colspan="2">(sebelum insisi kulit)</th>
              <th colspan="2">(sebelum pasien keluar kamar operasi)</th>
            </tr>
          </thead>
        </table>
      </div>
      <div class="modal-footer" id="update-ssc">
      </div>
      <?= form_close() ?>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- End Modal Edit SURGICAL SAFETY CEKLIS -->