<!-- // MCOP -->
<div class="modal fade" id="modal_catatan_operan_perawat" role="dialog" data-backdrop="static" aria-labelledby="modal-resume-keperawatan-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
    <div class="modal-content">
      <div class="modal-header">
        <div class="title">
          <h5 class="modal-title bold" id="modal_catatan_operan_perawat">CATATAN OPERAN PERAWAT</h5>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'id=form_entri_catatan_operan_perawat class="form-horizontal"') ?>
        <input type="hidden" name="id_layanan_pendaftaran" id="ek_id_layanan_pendaftaran">
        <input type="hidden" name="id_pendaftaran" id="ek-id-pendaftaran">
        <input type="hidden" name="id_bed" id="ek-id-bed">
        <input type="hidden" name="ek_id_pasien" id="ek_id_pasien">
        <input type="hidden" name="ek_jenis_layanan" value="Rawat Inap" id="ek-jenis-layanan">
        <input type="hidden" name="id_users" id="ek-id-users" <?php $nama = $this->session->userdata('nama');
                                                              $nama_js = json_encode($nama); ?> value=<?php echo $nama_js; ?>>

        <!-- KHusus yang ini jangan di hapus X ttd Wesa -->
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

            <!-- Form Catatan Operan Perawat -->
            <div class="catatan-operan-perawat">
              <div class="row">
                <div class="col-lg-12">
                  <table class="table table-sm table-striped" style="margin-top: -15px">
                    <tr>
                      <td width="100%">
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="form-asesment">
                <div class="row">
                  <div class="col-lg-12">


                    <!-- <table class="table table-sm table-striped" style="margin-top: -15px">
                      <tr>
                        <td width="2%"><b></b></td>
                        <td width="15%"><b>Diagnosa Medis Pasien :</b></td>
                        <td width="70%">
                          <input type="text" name="operan_diagnosa_keperawatan" id="operan-diagnosa-keperawatan" class="custom-form clear-input col-lg-6 ">
                        </td>
                      </tr>
                    </table> -->
                    <br>
                    <!-- <div class="col-lg-12" style="margin-top: -15px; border: 2px solid blue;"> -->
                    <div class="col-lg-12" style="margin-top: -15px; border: 2px solid green;">
                      <table class="table table-sm table-striped" style="margin-top: -15px">
                      <tr>
                        <td width="2%"><b></b></td>
                        <td width="15%"><b>Diagnosa Medis Pasien :</b></td>
                        <td width="70%">
                          <input type="text" name="operan_diagnosa_keperawatan" id="operan-diagnosa-keperawatan" class="custom-form clear-input col-lg-6 ">
                        </td>
                      </tr>
                        <tr>
                          <td width="2%" style="font-weight: bold; color: green; font-size: 1.2em;"><b>A.</b></td>
                          <td width="20%" style="font-weight: bold; color: green; font-size: 1.2em;"><b>RENCANA PAGI :</b></td>
                          <td width="78%"></td>
                        </tr>
                      </table>
                      <table class="table table-sm table-striped" style="margin-top: -15px">
                        <tr>
                          <td width="4%"></td>
                          <td>Dokter DPJP Utama</td>
                          <td>:</td>
                          <td><input type="text" name="dpjp_utama_pagi" id="dpjp-utama-pagi" class="select2c-input ml-2">
                          </td>
                          <td>Dokter Konsulen</td>
                          <td>:</td>
                          <td><input type="text" name="konsulen_pagi" id="konsulen-pagi" class="select2c-input ml-2">
                          </td>
                        </tr>
                        <tr>
                          <td width="4%"></td>
                          <td>Tanggal dan Waktu</td>
                          <td>:</td>
                          <td><input type="text" class="custom-form clear-input d-inline-block col-lg-6 ml-2" name="tanggal_waktu_pagi" id="tanggal-waktu-pagi" placeholder="DD/MM/YYYY HH:mm"></td>
                          <td>Diagnosis Keperawatan</td>
                          <td>:</td>
                          <td>
                            <textarea name="diagnosa_keperawatan_pagi" id="diagnosa-keperawatan-pagi" class="form-control visitasi-input" rows="2"></textarea>
                          </td>
                        </tr>
                        <tr>
                          <td width="4%"></td>
                          <td>Infus</td>
                          <td>:</td>
                          <td>
                            <textarea name="infus_pagi" id="infus-pagi" class="form-control visitasi-input" rows="2"></textarea>
                          </td>
                          <td>Rencana Tindakan</td>
                          <td>:</td>
                          <td>
                            <textarea name="rencana_tindakan_pagi" id="rencana-tindakan-pagi" class="form-control visitasi-input" rows="2"></textarea>
                          </td>
                        </tr>
                        <tr>
                          <td width="4%"></td>
                          <td>Perawat Yang Mengoverkan</td>
                          <td>:</td>
                          <td><input type="text" name="perawat_mengover_pagi" id="perawat-mengover-pagi" class="select2c-input ml-2"></td>
                          <td>Perawat Yang Menerima</td>
                          <td>:</td>
                          <td><input type="text" name="perawat_menerima_pagi" id="perawat-menerima-pagi" class="select2c-input ml-2">
                          </td>
                        </tr>
                        <tr>
                          <td colspan="8" style="text-align: center;">
                              <p class="page__number marquee-text" style="margin: 0;">
                                  <span style="font-weight: bold; color: black; font-size: 1.1em;">
                                      HARAP DI 📢 PERHATIAN!!! ⚡ 
                                  </span>
                                  <span style="font-weight: bold; color: green; font-size: 1.1em;">
                                  Sebelum KONFIRMASI 📥 pastikan klik TAMBAH CATATAN PAGI 📝dulu yaa~~~!👨‍⚕️👩‍⚕️
                                  </span>
                              </p>
                          </td>
                        </tr>
                        <tr>
                          <td width="4%"></td>
                          <td><button type="button" title="Tambah Catatan Operan" class="btn btn-info" onclick="tambahRencanaPagi()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah
                              Catatan Pagi</button></td>
                          <td></td>
                          <td></td>
                        </tr>                   
                      </table>
                      <table class="table table-sm table-striped table-bordered" id="table-catatan-operan-perawat-pagi">
                        <thead class="thead-theme">
                          <tr>
                            <th class="center" rowspan="2">No</th>
                            <th class="center" colspan="2">Dokter</th>
                            <th class="center" rowspan="2">Diagnosa Keperawatan</th>
                            <th class="center" rowspan="2">Tanggal dan Waktu</th>
                            <th class="center" rowspan="2">Rencana Tindakan</th>
                            <th class="center" rowspan="2">Infus</th>
                            <th class="center" colspan="2">Petugas</th>
                            <!-- <th class="center" rowspan="2">User</th> -->
                            <th class="center" rowspan="2">Alat</th>
                          </tr>
                          <tr>
                            <th class="center">DPJP Utama</th>
                            <th class="center">Konsulen</th>
                            <th class="center">Petugas Mengover</th>
                            <th class="center">Petugas Menerima</th>
                          </tr>
                        </thead>
                        <tbody></tbody>
                      </table>
                    </div>
                    <br><br>

                    <div class="col-lg-12" style="margin-top: -15px; border: 2px solid purple;">
                      <table class="table table-sm table-striped" style="margin-top: -15px">
                        <tr>
                          <td width="2%" style="font-weight: bold; color: purple; font-size: 1.2em;"><b>B.</b></td>
                          <td width="20%" style="font-weight: bold; color: purple; font-size: 1.2em;"><b>RENCANA SORE :</b></td>
                          <td width="78%"></td>
                        </tr>
                      </table>
                      <table class="table table-sm table-striped" style="margin-top: -15px">
                        <tr>
                          <td width="4%"></td>
                          <td>Dokter DPJP Utama</td>
                          <td>:</td>
                          <td><input type="text" name="dokter_dpjp_sore" id="dokter-dpjp-sore" class="select2c-input ml-2">
                          </td>
                          <td>Dokter Konsulen</td>
                          <td>:</td>
                          <td><input type="text" name="konsulen_sore" id="konsulen-sore" class="select2c-input ml-2">
                          </td>
                        </tr>
                        <tr>
                          <td width="4%"></td>
                          <td>Tanggal dan Waktu</td>
                          <td>:</td>
                          <td><input type="text" class="custom-form clear-input d-inline-block col-lg-6 ml-2" name="tanggal_waktu_sore" id="tanggal-waktu-sore" placeholder="DD/MM/YYYY HH:mm"></td>
                          <td>Diagnosis Keperawatan</td>
                          <td>:</td>
                          <td>
                              <textarea name="diagnosa_keperawatan_sore" id="diagnosa-keperawatan-sore" class="form-control visitasi-input" rows="2"></textarea>
                          </td>
                        </tr>
                        <tr>
                          <td width="4%"></td>
                          <td>Infus</td>
                          <td>:</td>
                          <td>
                              <textarea name="infus_sore" id="infus-sore" class="form-control visitasi-input" rows="2"></textarea>
                          </td>
                          <td>Rencana Tindakan</td>
                          <td>:</td>
                          <td>
                              <textarea name="rencana_tindakan_sore" id="rencana-tindakan-sore" class="form-control visitasi-input" rows="2"></textarea>
                          </td>
                        </tr>
                        <tr>
                          <td width="4%"></td>
                          <td>Perawat Yang Mengoverkan</td>
                          <td>:</td>
                          <td><input type="text" name="perawat_mengover_sore" id="perawat-mengover-sore" class="select2c-input ml-2"></td>
                          <td>Perawat Yang Menerima</td>
                          <td>:</td>
                          <td><input type="text" name="perawat_menerima_sore" id="perawat-menerima-sore" class="select2c-input ml-2">
                          </td>
                        </tr>
                        <tr>
                          <td colspan="8" style="text-align: center;">
                              <p class="page__number marquee-text" style="margin: 0;">
                                  <span style="font-weight: bold; color: black; font-size: 1.1em;">
                                      HARAP DI 📢 PERHATIAN!!! ⚡ 
                                  </span>
                                  <span style="font-weight: bold; color: purple; font-size: 1.1em;">
                                  Sebelum KONFIRMASI 📥 pastikan klik TAMBAH CATATAN SORE 📝dulu yaa~~~!👨‍⚕️👩‍⚕️
                                  </span>
                              </p>
                          </td>
                        </tr>
                        <tr>
                          <td width="4%"></td>
                          <td><button type="button" title="Tambah Catatan Operan" class="btn btn-info" onclick="tambahRencanaSore()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah
                              Catatan Sore</button></td>
                          <td></td>
                          <td></td>
                        </tr>
                      </table>
                      <table class="table table-sm table-striped table-bordered" id="table-catatan-operan-perawat-sore">
                        <thead class="thead-theme">
                          <tr>
                            <th class="center" rowspan="2">No</th>
                            <th class="center" colspan="2">Dokter</th>
                            <th class="center" rowspan="2">Diagnosa Keperawatan</th>
                            <th class="center" rowspan="2">Tanggal dan Waktu</th>
                            <th class="center" rowspan="2">Rencana Tindakan</th>
                            <th class="center" rowspan="2">Infus</th>
                            <th class="center" colspan="2">Petugas</th>
                            <!-- <th class="center" rowspan="2">User</th> -->
                            <th class="center" rowspan="2">Alat</th>
                          </tr>
                          <tr>
                            <th class="center">DPJP Utama</th>
                            <th class="center">Konsulen</th>
                            <th class="center">Petugas Mengover</th>
                            <th class="center">Petugas Menerima</th>
                          </tr>
                        </thead>
                        <tbody></tbody>
                      </table>
                    </div>
                    <br><br>

                    <div class="col-lg-12" style="margin-top: -15px; border: 2px solid red;">
                      <table class="table table-sm table-striped" style="margin-top: -15px">
                        <tr>
                          <td width="2%" style="font-weight: bold; color: red; font-size: 1.2em;"><b>C.</b></td>
                          <td width="20%" style="font-weight: bold; color: red; font-size: 1.2em;"><b>RENCANA MALAM :</b></td>
                          <td width="78%"></td>
                        </tr>
                      </table>
                      <table class="table table-sm table-striped" style="margin-top: -15px">
                        <tr>
                          <td width="4%"></td>
                          <td>Dokter DPJP Utama</td>
                          <td>:</td>
                          <td><input type="text" name="dokter_dpjp_malam" id="dokter-dpjp-malam" class="select2c-input ml-2">
                          </td>
                          <td>Dokter Konsulen</td>
                          <td>:</td>
                          <td><input type="text" name="konsulen_malam" id="konsulen-malam" class="select2c-input ml-2">
                          </td>
                        </tr>
                        <tr>
                          <td width="4%"></td>
                          <td>Tanggal dan Waktu</td>
                          <td>:</td>
                          <td><input type="text" class="custom-form clear-input d-inline-block col-lg-6 ml-2" name="tanggal_waktu_malam" id="tanggal-waktu-malam" placeholder="DD/MM/YYYY HH:mm"></td>
                          <td>Diagnosis Keperawatan</td>
                          <td>:</td>
                          <td>
                              <textarea name="diagnosa_keperawatan_malam" id="diagnosa-keperawatan-malam" class="form-control visitasi-input" rows="2"></textarea>
                          </td>
                        </tr>
                        <tr>
                          <td width="4%"></td>
                          <td>Infus</td>
                          <td>:</td>
                          <td>
                              <textarea name="infus_malam" id="infus-malam" class="form-control visitasi-input" rows="2"></textarea>
                          </td>
                          <td>Rencana Tindakan</td>
                          <td>:</td>
                          <td>
                              <textarea name="rencana_tindakan_malam" id="rencana-tindakan-malam" class="form-control visitasi-input" rows="2"></textarea>
                          </td>
                        </tr>
                        <tr>
                          <td width="4%"></td>
                          <td>Perawat Yang Mengoverkan</td>
                          <td>:</td>
                          <td><input type="text" name="perawat_mengover_malam" id="perawat-mengover-malam" class="select2c-input ml-2"></td>
                          <td>Perawat Yang Menerima</td>
                          <td>:</td>
                          <td><input type="text" name="perawat_menerima_malam" id="perawat-menerima-malam" class="select2c-input ml-2">
                          </td>
                        </tr>
                        <tr>
                          <td colspan="8" style="text-align: center;">
                              <p class="page__number marquee-text" style="margin: 0;">
                                  <span style="font-weight: bold; color: black; font-size: 1.1em;">
                                      HARAP DI 📢 PERHATIAN!!! ⚡ 
                                  </span>
                                  <span style="font-weight: bold; color: red; font-size: 1.1em;">
                                  Sebelum KONFIRMASI 📥 pastikan klik TAMBAH CATATAN MALAM 📝dulu yaa~~~!👨‍⚕️👩‍⚕️
                                  </span>
                              </p>
                          </td>
                        </tr>
                        <tr>
                          <td width="4%"></td>
                          <td><button type="button" title="Tambah Catatan Operan" class="btn btn-info" onclick="tambahRencanaMalam()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah
                              Catatan Malam</button></td>
                          <td></td>
                          <td></td>
                        </tr>
                      </table>
                      <table class="table table-sm table-striped table-bordered" id="table-catatan-operan-perawat-malam">
                        <thead class="thead-theme">
                          <tr>
                            <th class="center" rowspan="2">No</th>
                            <th class="center" colspan="2">Dokter</th>
                            <th class="center" rowspan="2">Diagnosa Keperawatan</th>
                            <th class="center" rowspan="2">Tanggal dan Waktu</th>
                            <th class="center" rowspan="2">Rencana Tindakan</th>
                            <th class="center" rowspan="2">Infus</th>
                            <th class="center" colspan="2">Petugas</th>
                            <!-- <th class="center" rowspan="2">User</th> -->
                            <th class="center" rowspan="2">Alat</th>
                          </tr>
                          <tr>
                            <th class="center">DPJP Utama</th>
                            <th class="center">Konsulen</th>
                            <th class="center">Petugas Mengover</th>
                            <th class="center">Petugas Menerima</th>
                          </tr>
                        </thead>
                        <tbody></tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?= form_close() ?>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
        <button id="btn-simpan" type="button" class="btn btn-info" onclick="konfirmasiSimpanEntriCatatanOperanPerawat()"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
      </div>
    </div>
  </div>
</div>
<!-- End COP -->

<!-- EDIT PAGI -->
<div id="modal-edit-cop-pagi" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="font-weight: bold; color: green; font-size: 1.5em;">Edit Catatan Rencana Pagi</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-edit-cop-pagi'); ?>
                <input type="hidden" name="id" id="id-cop-pagi">
                <div class="from-group">
                </div>
                <hr>

                  <table class="table table-sm table-striped" style="margin-top: -15px">
                    <tr>
                      <td width="2%"><b></b></td>
                      <td width="15%"><b>Diagnosa Medis Pasien :</b></td>
                      <td width="70%">
                        <input type="text" name="operan_diagnosa_keperawatan" id="edit-operan-diagnosa-keperawatan" class="custom-form clear-input col-lg-6 ">
                      </td>
                    </tr>
                  </table>
                  <table class="table table-sm table-striped" style="margin-top: -15px">
                    <tr>
                      <td width="2%"><b>A.</b></td>
                      <td width="20%"><b>RENCANA PAGI :</b></td>
                      <td width="78%"></td>
                    </tr>
                  </table>

                  <table class="table table-sm table-striped" style="margin-top: -15px">
                    <tr>
                      <td width="4%"></td>
                      <td>Dokter DPJP Utama</td>
                      <td>:</td>
                      <td><input type="text" name="dpjp_utama_pagi" id="edit-dpjp-utama-pagi" class="select2c-input ml-2">
                      </td>
                      <td>Dokter Konsulen</td>
                      <td>:</td>
                      <td><input type="text" name="konsulen_pagi" id="edit-konsulen-pagi" class="select2c-input ml-2">
                      </td>
                    </tr>
                    <tr>
                      <td width="4%"></td>
                      <td>Tanggal dan Waktu</td>
                      <td>:</td>
                      <td><input type="text" class="custom-form clear-input d-inline-block col-lg-6 ml-2" name="tanggal_waktu_pagi" id="edit-tanggal-waktu-pagi" placeholder="DD/MM/YYYY HH:mm"></td>
                      <td>Diagnosis Keperawatan</td>
                      <td>:</td>
                      <td>
                          <textarea name="diagnosa_keperawatan_pagi" id="edit-diagnosa-keperawatan-pagi" class="form-control visitasi-input" rows="2"></textarea>
                      </td>
                    </tr>
                    <tr>
                      <td width="4%"></td>
                      <td>Infus</td>
                      <td>:</td>
                      <td>
                          <textarea name="infus_pagi" id="edit-infus-pagi" class="form-control visitasi-input" rows="2"></textarea>
                      </td>
                      <td>Rencana Tindakan</td>
                      <td>:</td>
                      <td>
                          <textarea name="rencana_tindakan_pagi" id="edit-rencana-tindakan-pagi" class="form-control visitasi-input" rows="2"></textarea>
                      </td>
                    </tr>
                    <tr>
                      <td width="4%"></td>
                      <td>Perawat Yang Mengoverkan</td>
                      <td>:</td>
                      <td><input type="text" name="perawat_mengover_pagi" id="edit-perawat-mengover-pagi" class="select2c-input ml-2"></td>
                      <td>Perawat Yang Menerima</td>
                      <td>:</td>
                      <td><input type="text" name="perawat_menerima_pagi" id="edit-perawat-menerima-pagi" class="select2c-input ml-2">
                      </td>
                    </tr>
                  </table>


                <hr>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer" id="update-cop-pagi">
            </div>
        </div>
    </div>
</div>


<!-- EDIT SORE -->
<div id="modal-edit-cop-sore" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="font-weight: bold; color: purple; font-size: 1.5em;">Edit Catatan Rencana Sore</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-edit-cop-sore'); ?>
                <input type="hidden" name="id" id="id-cop-sore">
                <div class="from-group">
                </div>
                <hr>
                  <table class="table table-sm table-striped" style="margin-top: -15px">
                    <tr>
                      <td width="2%"><b>B.</b></td>
                      <td width="20%"><b>RENCANA SORE :</b></td>
                      <td width="78%"></td>
                    </tr>
                  </table>

                  <table class="table table-sm table-striped" style="margin-top: -15px">
                    <tr>
                      <td width="4%"></td>
                      <td>Dokter DPJP Utama</td>
                      <td>:</td>
                      <td><input type="text" name="dokter_dpjp_sore" id="edit-dokter-dpjp-sore" class="select2c-input ml-2">
                      </td>
                      <td>Dokter Konsulen</td>
                      <td>:</td>
                      <td><input type="text" name="konsulen_sore" id="edit-konsulen-sore" class="select2c-input ml-2">
                      </td>
                    </tr>
                    <tr>
                      <td width="4%"></td>
                      <td>Tanggal dan Waktu</td>
                      <td>:</td>
                      <td><input type="text" class="custom-form clear-input d-inline-block col-lg-6 ml-2" name="tanggal_waktu_sore" id="edit-tanggal-waktu-sore" placeholder="DD/MM/YYYY HH:mm"></td>
                      <td>Diagnosis Keperawatan</td>
                      <td>:</td>
                      <td>
                          <textarea name="diagnosa_keperawatan_sore" id="edit-diagnosa-keperawatan-sore" class="form-control visitasi-input" rows="2"></textarea>
                      </td>
                    </tr>
                    <tr>
                      <td width="4%"></td>
                      <td>Infus</td>
                      <td>:</td>
                      <td>
                          <textarea name="infus_sore" id="edit-infus-sore" class="form-control visitasi-input" rows="2"></textarea>
                      </td>
                      <td>Rencana Tindakan</td>
                      <td>:</td>
                      <td>
                          <textarea name="rencana_tindakan_sore" id="edit-rencana-tindakan-sore" class="form-control visitasi-input" rows="2"></textarea>
                      </td>
                    </tr>
                    <tr>
                      <td width="4%"></td>
                      <td>Perawat Yang Mengoverkan</td>
                      <td>:</td>
                      <td><input type="text" name="perawat_mengover_sore" id="edit-perawat-mengover-sore" class="select2c-input ml-2"></td>
                      <td>Perawat Yang Menerima</td>
                      <td>:</td>
                      <td><input type="text" name="perawat_menerima_sore" id="edit-perawat-menerima-sore" class="select2c-input ml-2">
                      </td>
                    </tr>
                  </table>
                <hr>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer" id="update-cop-sore">
            </div>
        </div>
    </div>
</div>


<!-- EDIT MALAM -->
<div id="modal-edit-cop-malam" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="font-weight: bold; color: red; font-size: 1.5em;">Edit Catatan Rencana Malam</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-edit-cop-malam'); ?>
                <input type="hidden" name="id" id="id-cop-malam">
                <div class="from-group">
                </div>
                <hr>
                  <table class="table table-sm table-striped" style="margin-top: -15px">
                    <tr>
                      <td width="2%"><b>C.</b></td>
                      <td width="20%"><b>RENCANA MALAM :</b></td>
                      <td width="78%"></td>
                    </tr>
                  </table>

                  <table class="table table-sm table-striped" style="margin-top: -15px">
                    <tr>
                      <td width="4%"></td>
                      <td>Dokter DPJP Utama</td>
                      <td>:</td>
                      <td><input type="text" name="dokter_dpjp_malam" id="edit-dokter-dpjp-malam" class="select2c-input ml-2">
                      </td>
                      <td>Dokter Konsulen</td>
                      <td>:</td>
                      <td><input type="text" name="konsulen_malam" id="edit-konsulen-malam" class="select2c-input ml-2">
                      </td>
                    </tr>
                    <tr>
                      <td width="4%"></td>
                      <td>Tanggal dan Waktu</td>
                      <td>:</td>
                      <td><input type="text" class="custom-form clear-input d-inline-block col-lg-6 ml-2" name="tanggal_waktu_malam" id="edit-tanggal-waktu-malam" placeholder="DD/MM/YYYY HH:mm"></td>
                      <td>Diagnosis Keperawatan</td>
                      <td>:</td>
                      <td>
                          <textarea name="diagnosa_keperawatan_malam" id="edit-diagnosa-keperawatan-malam" class="form-control visitasi-input" rows="2"></textarea>
                      </td>
                    </tr>
                    <tr>
                      <td width="4%"></td>
                      <td>Infus</td>
                      <td>:</td>
                      <td>
                          <textarea name="infus_malam" id="edit-infus-malam" class="form-control visitasi-input" rows="2"></textarea>
                      </td>
                      <td>Rencana Tindakan</td>
                      <td>:</td>
                      <td>
                          <textarea name="rencana_tindakan_malam" id="edit-rencana-tindakan-malam" class="form-control visitasi-input" rows="2"></textarea>
                      </td>
                    </tr>
                    <tr>
                      <td width="4%"></td>
                      <td>Perawat Yang Mengoverkan</td>
                      <td>:</td>
                      <td><input type="text" name="perawat_mengover_malam" id="edit-perawat-mengover-malam" class="select2c-input ml-2"></td>
                      <td>Perawat Yang Menerima</td>
                      <td>:</td>
                      <td><input type="text" name="perawat_menerima_malam" id="edit-perawat-menerima-malam" class="select2c-input ml-2">
                      </td>
                    </tr>
                  </table>
                <hr>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer" id="update-cop-malam">
            </div>
        </div>
    </div>
</div>
