<!-- Modal Entri Keperawatan -->
<div class="modal fade" id="modal_catatan_pemberian_obat" role="dialog" data-backdrop="static" aria-labelledby="modal-resume-keperawatan-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
    <div class="modal-content">
      <div class="modal-header">
        <div class="title">
          <h5 class="modal-title bold" id="modal_catatan_pemberian_obat">Catatan Pemberian Dan Pemantauan Obat</h5>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'id=form_entri_catatan_pemberian_obat class="form-horizontal"') ?>
        <input type="hidden" name="id_layanan_pendaftaran" id="ek_id_layanan_pendaftaran">
        <input type="hidden" name="id_pendaftaran" id="ek-id-pendaftaran">
        <input type="hidden" name="id_bed" id="ek-id-bed">
        <input type="hidden" name="ek_id_pasien" id="ek_id_pasien">
        <input type="hidden" name="ek_jenis_layanan" value="Rawat Inap" id="ek-jenis-layanan">
        <input type="hidden" name="id_users" id="ek-id-users" <?php $nama = $this->session->userdata('nama'); $nama_js = json_encode($nama); ?> value=<?php echo $nama_js; ?>>

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

              <!-- CPDPO Catatan Pemberian Dan Pemantauan Obat AWAL-->
              <div class="form-catatan-pemberian-dan-pemantauan-obat">
                <table class="table table-no-border table-sm table-striped">
                  <tr>
                    <td colspan="3">
                      <button class="btn btn-info btn-xs mr-1 float-left" type="button" id="cpdpo_btn_expand_all"><i class="fas fa-fw fa-expand mr-1"></i>Expand All</button>
                      <button class="btn btn-warning btn-xs mr-1 float-left" type="button" id="cpdpo_btn_collapse_all"><i class="fas fa-fw fa-compress mr-1"></i>Collapse All</button>
                    </td>
                  </tr>
                </table>

                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                  <tr>
                    <td colspan="3" class="center bold td-dark">
                      <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-riwayat-pemakaian-obat"><i class="fas fa-expand mr-1"></i>Expand</button>Riwayat Pemakaian Obat
                    </td>
                  </tr>
                </table>
                <div class="collapse multi-collapse mt-2" id="data-riwayat-pemakaian-obat">
                  <div class="col-lg">
                    <div id="buka-tutup-rpo">
                    </div>
                    <div class="card">
                      <table class="table table-sm table-striped table-bordered" id="tabel-rpo">
                        <thead style="background-color: #B0C4DE;">
                          <tr>
                            <th class="center"><b>No</b></th>
                            <th class="center"><b>Alergi</b></th>
                            <th class="center"><b>Sebutkan</b></th>
                            <th class="center"><b>Nama Obat</b></th>
                            <th class="center"><b>Rute</b></th>
                            <th class="center"><b>Dosis</b></th>
                            <th class="center"><b>Frekuensi</b></th>
                            <th class="center"><b>Tanggal Mulai</b></th>
                            <th class="center"><b>TT Dokter</b></th>
                            <th class="center"><b>Tanggal Stop</b></th>
                            <th class="center"><b>TT Dokter</b></th>
                            <th class="center"><b>Efek Samping Obat</b></th>
                            <th class="center"><b>Review Farmasi</b></th>
                            <th class="center"><b>Petugas</b></th>
                            <th class="center" colspan="2"><b>Alat</b></th>
                          </tr>
                        </thead>
                        <tbody class="body-table">
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                
                <!-- // ILLIS -->
                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                  <tr>
                    <td colspan="3" class="center bold td-dark">
                      <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-riwayat-pemakaian-obat-infus"><i class="fas fa-expand mr-1"></i>Expand</button> Infus Lain-lain Inhalasi Suppositoria
                    </td>
                  </tr>
                </table>
                <div class="collapse multi-collapse mt-2" id="data-riwayat-pemakaian-obat-infus">
                  <div class="col-lg">
                    <div id="buka-tutup-rpo-infus">
                    </div>
                    <div class="card">
                      <table class="table table-sm table-striped table-bordered" id="tabel-rpo-infus">
                        <thead style="background-color: #B0C4DE;">
                          <tr>
                            <th class="center"><b>No</b></th>
                            <th class="center"><b>Alergi</b></th>
                            <th class="center"><b>Sebutkan</b></th>
                            <th class="center"><b>Nama Obat</b></th>
                            <th class="center"><b>Rute</b></th>
                            <th class="center"><b>Dosis</b></th>
                            <th class="center"><b>Frekuensi</b></th>
                            <th class="center"><b>Tanggal Mulai</b></th>
                            <th class="center"><b>TT Dokter</b></th>
                            <th class="center"><b>Tanggal Stop</b></th>
                            <th class="center"><b>TT Dokter</b></th>
                            <th class="center"><b>Efek Samping Obat</b></th>
                            <th class="center"><b>Review Farmasi</b></th>
                            <th class="center"><b>Petugas</b></th>
                            <th class="center" colspan="2"><b>Alat</b></th>
                          </tr>
                        </thead>
                        <tbody class="body-table">
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

                <!-- // WPT -->
                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                  <tr>
                    <td colspan="3" class="center bold td-dark">
                      <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#waktu-pemberian-tanggal"><i class="fas fa-expand mr-1"></i>Expand</button>Waktu Pemberian/Tulis, Tanggal, Jam, Nama Perawat, Nama dan Paraf Pasien atau Keluarga
                    </td>
                  </tr>
                </table>
                <div class="collapse multi-collapse mt-2" id="waktu-pemberian-tanggal">
                  <div class="col-lg">
                    <div id="buka-tutup-wpt">
                    </div>
                    <div class="card">
                      <table class="table table-sm table-striped table-bordered" id="tabel-wpt">
                        <thead style="background-color: #B0C4DE;">
                          <tr>
                            <th class="center"><b>No</b></th>
                            <th class="center"><b>Tanggal</b></th>
                            <th class="center"><b>Hari Ke</b></th>
                            <th class="center"><b>Jam</b></th>
                            <th class="center"><b>Perawat</b></th>
                            <th class="center"><b>Pasien / Keluarga</b></th>
                            <th class="center"><b>Pagi</b></th>
                            <th class="center"><b>Siang</b></th>
                            <th class="center"><b>Sore</b></th>
                            <th class="center"><b>Malam</b></th>
                            <th class="center"><b>Petugas</b></th>
                            <th class="center" colspan="2"><b>Alat</b></th>
                          </tr>
                        </thead>
                        <tbody class="body-table">
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

                <!-- // IWPT -->
                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                  <tr>
                    <td colspan="3" class="center bold td-dark">
                      <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#waktu-pemberian-tanggal-infus"><i class="fas fa-expand mr-1"></i>Expand</button>Infus Lain-lain Inhalasi Suppositoria
                    </td>
                  </tr>
                </table>
                <div class="collapse multi-collapse mt-2" id="waktu-pemberian-tanggal-infus">
                  <div class="col-lg">
                    <div id="buka-tutup-wpt-infus">
                    </div>
                    <div class="card">
                      <table class="table table-sm table-striped table-bordered" id="tabel-wpt-infus">
                        <thead style="background-color: #B0C4DE;">
                          <tr>
                            <th class="center"><b>No</b></th>
                            <th class="center"><b>Tanggal</b></th>
                            <th class="center"><b>Hari Ke</b></th>
                            <th class="center"><b>Jam</b></th>
                            <th class="center"><b>Perawat</b></th>
                            <th class="center"><b>Pasien / Keluarga</b></th>
                            <th class="center"><b>Pagi</b></th>
                            <th class="center"><b>Siang</b></th>
                            <th class="center"><b>Sore</b></th>
                            <th class="center"><b>Malam</b></th>
                            <th class="center"><b>Petugas</b></th>
                            <th class="center" colspan="2"><b>Alat</b></th>
                          </tr>
                        </thead>
                        <tbody class="body-table">
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End CPDPO Catatan Pemberian Dan Pemantauan Obat AWAL-->

              <!-- end content -->
              <?= form_close() ?>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
        <button id="btn-simpan" type="button" class="btn btn-info" onclick="konfirmasiSimpanCatatanPemberianDanPemantauanObat()"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Entri Keperawatan -->


<!-- // CPDPO  -->
<div id="modal-edit-riwayat-pemakaian-obat" class="modal fade" role="dialog">
  <div class="modal-dialog" style="max-width: 80%">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h4 class="modal-title">Edit Riwayat Pemakaian Obat</h4> -->
        <h4 class="modal-title" style="color:rgb(123, 13, 226);">Edit Riwayat Pemakaian Obat</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'role=form class=form-horizontal id=form-edit-riwayat-pemakaian-obat'); ?>
        <input type="hidden" name="id" id="id-riwayat-pemakaian-obat">
        <div class="table-responsive">
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
                  <td class="center"><input type="text" name="rute_rpo" id="rute-rpo-edit" class="custom-form clear-input d-inline-block" style="width: 100px;"></td>
                  <td class="center"><input type="text" name="dosis_rpo" id="dosis-rpo-edit" class="custom-form clear-input d-inline-block" style="width: 100px;"></td>
                  <td class="center"><input type="text" name="frekuensi_rpo" id="frekuensi-rpo-edit" class="custom-form clear-input d-inline-block" style="width: 100px;"></td>
                  <td class="center"><input type="text" name="tanggal_rpo" id="tanggal-rpo-edit" class="custom-form clear-input d-inline-block" style="width: 100px;"></td>                     
                  <td class="center"><input type="text" name="dokter_1_rpo" id="dokter-1-rpo-edit" class="select2c-input ml-2"></td>            
                  <td class="center"><input type="text" name="tangggal_rpo" id="tangggal-rpo-edit" class="custom-form clear-input d-inline-block" style="width: 100px;"></td>
                  <td class="center"><input type="text" name="dokter_2_rpo" id="dokter-2-rpo-edit" class="select2c-input ml-2"></td>
                  <td class="center"><input type="text" name="eso_rpo" id="eso-rpo-edit" class="custom-form clear-input d-inline-block" style="width: 100px;"></td>
                  <td class="center"><input type="text" name="r_farmasi_rpo" id="r-farmasi-rpo-edit" class="custom-form clear-input d-inline-block" style="width: 100px;"></td>
                </tr>
              </tbody>
            </table>
          </div>
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
        <h4 class="modal-title" style="color:rgb(123, 13, 226);">Edit Infus Lain-lain Inhalasi Suppositoria</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'role=form class=form-horizontal id=form-edit-riwayat-pemakaian-obat-infus'); ?>
        <input type="hidden" name="id" id="id-riwayat-pemakaian-obat-infus">
        <div class="table-responsive">
          <div class="from-group">
            <label for="rpo-alergi">Alergi : </label>
            <input type="radio" name="alergiii" id="alergiii-2-edit" class="mr-1 ml-4" value="0" checked> Tidak,
            <input type="radio" name="alergiii" id="alergiii-1-edit" class="mr-1" value="1">Ya
            <input type="text" name="alergii_obb" id="alergiii-3-edit" class="custom-form clear-input d-inline-block col-lg-3 ml-2" placeholder="sebutkan">
          </div>
          <hr>
          <hr>
            <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-rpo-infus">
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
                    <td class="center"><input type="text" name="nama_obat_rpoo" id="nama-obat-rpoo-edit"class="select2c-input ml-2"></td>
                    <td class="center"><input type="text" name="rute_rpoo" id="rute-rpoo-edit" class="custom-form clear-input d-inline-block" style="width: 100px;"></td>
                    <td class="center"><input type="text" name="dosis_rpoo" id="dosis-rpoo-edit" class="custom-form clear-input d-inline-block" style="width: 100px;"></td>
                    <td class="center"><input type="text" name="frekuensi_rpoo" id="frekuensi-rpoo-edit" class="custom-form clear-input d-inline-block" style="width: 100px;"></td>
                    <td class="center"><input type="text" name="tanggal_rpoo" id="tanggal-rpoo-edit" class="custom-form clear-input d-inline-block" style="width: 100px;"></td>
                    <td class="center"><input type="text" name="dokter_1_rpoo" id="dokter-1-rpoo-edit"class="select2c-input ml-2"></td>
                    <td class="center"><input type="text" name="tangggal_rpoo" id="tangggal-rpoo-edit" class="custom-form clear-input d-inline-block" style="width: 100px;"></td>
                    <td class="center"><input type="text" name="dokter_2_rpoo" id="dokter-2-rpoo-edit"class="select2c-input ml-2"></td>
                    <td class="center"><input type="text" name="eso_rpoo" id="eso-rpoo-edit" class="custom-form clear-input d-inline-block" style="width: 100px;"></td>
                    <td class="center"><input type="text" name="r_farmasi_rpoo" id="r-farmasi-rpoo-edit" class="custom-form clear-input d-inline-block" style="width: 100px;"></td>
                </tr>
              </tbody>
            </table>
          </div>
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
        <h4 class="modal-title" style="color:rgb(123, 13, 226);">Edit Waktu Pemberian Tanggal</h4>
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
        <h4 class="modal-title" style="color:rgb(123, 13, 226);">Edit Infus Lain-lain Inhalasi Suppositoria</h4>
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
