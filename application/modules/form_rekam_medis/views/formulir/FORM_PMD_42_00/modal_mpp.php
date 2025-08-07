<!-- <style type="text/css">td {border: solid 1px;}</style> -->
<!-- Modal Entri Keperawatan -->
<div class="modal fade" id="modal_mpp" role="dialog" data-backdrop="static" aria-labelledby="modal-resume-keperawatan-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
    <div class="modal-content">
      <div class="modal-header">
        <div class="title">
          <h5 class="modal-title bold" id="modal_mpp_title">SKRINING KEBUTUHAN MANAJER PELAYANAN PASIEN (MPP)</h5>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'id=form_entri_keperawatan class="form-horizontal"') ?>
        <input type="hidden" name="mpp_id" id="mpp_id">
        <input type="hidden" name="id_layanan_pendaftaran" id="mpp_id_layanan_pendaftaran">
        <input type="hidden" name="id_pendaftaran" id="mpp_id_pendaftaran">
        <input type="hidden" name="id_pasien" id="mpp_id_pasien">
        <input type="hidden" name="id_bed" id="mpp_id_bed">
        <input type="hidden" name="id_users" id="mpp_id_users"
          <?php $nama = $this->session->userdata('nama');
          $nama_js = json_encode($nama); ?> value=<?php echo $nama_js; ?>
        >

        <!-- header -->
        <div class="row">
          <div class="col-lg-6">
            <div class="table-responsive">
              <table class="table table-sm table-striped">
                <tr>
                  <td width="20%" class="bold">Nama Pasien</td>
                  <td wdith="80%">: <span id="mpp_nama_pasien"></span></td>
                </tr>
                <tr>
                  <td class="bold">No. RM</td>
                  <td>: <span id="mpp_no_rm"></span></td>
                </tr>
                <tr>
                  <td class="bold">Tanggal Lahir</td>
                  <td>: <span id="mpp_tanggal_lahir"></span></td>
                </tr>
                <tr>
                  <td class="bold">Jenis Kelamin</td>
                  <td>: <span id="mpp_jenis_kelamin"></span></td>
                </tr>
                <tr>
                  <td class="bold">Alamat</td>
                  <td>: <span id="mpp_alamat"></span></td>
                </tr>
              </table>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="table-responsive">
              <table class="table table-sm table-striped">
                <tr>
                  <td width="30%" class="bold">Ruang Rawat/Unit Kerja</td>
                  <td wdith="70%">: <span id="mpp_bed"></span></td>
                </tr>
                <tr>
                  <td colspan="2">
                    <div class="mpp_logo_alergi">
                      <img src="<?= resource_url() ?>images/diagnosa/alergi.jpg" alt="mpp_logo_alergi" class="img-thumbnail rounded" width="20%">
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

              <!-- SKRINING KEBUTUHAN MANAJER PELAYANAN PASIEN (MPP) -->
              <div class="form-transfer-pasien-intra-rs">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="box-well shadow">
                      <div class="widget-body">
                        <div class="form-transfer-pasien-rs">
                          <div class="row">
                            <div class="col-lg-12">
                              <table class="table table-no-border table-sm table-striped">
                                <thead>
                                  <tr>
                                    <th rowspan="3">No</th>
                                    <th rowspan="3" class="text-center">KRITERIA</th>
                                    <th colspan="2" class="text-center">Sejak awal MRS</th>
                                    <th colspan="4" class="text-center">Saat perawatan</th>
                                  </tr>
                                  <tr>
                                    <th colspan="2" class="text-center">Tanggal & jam : <br><input type="text" name="mpp_tanggal_1" id="mpp_tanggal_1" class="custom-form clear-input d-inline-block col-lg-6" placeholder="dd/mm/yyyy hh:ii"></th>
                                    <th colspan="2" class="text-center">Tanggal & jam : <br><input type="text" name="mpp_tanggal_2" id="mpp_tanggal_2" class="custom-form clear-input d-inline-block col-lg-6" placeholder="dd/mm/yyyy hh:ii"></th>
                                    <th colspan="2" class="text-center">Tanggal & jam : <br><input type="text" name="mpp_tanggal_3" id="mpp_tanggal_3" class="custom-form clear-input d-inline-block col-lg-6" placeholder="dd/mm/yyyy hh:ii"></th>
                                  </tr>
                                  <tr>
                                    <th class="text-center">ya</th>
                                    <th class="text-center">tidak</th>
                                    <th class="text-center">ya</th>
                                    <th class="text-center">tidak</th>
                                    <th class="text-center">ya</th>
                                    <th class="text-center">tidak</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>1</td>
                                    <td>Usia</td>
                                    <td class="text-center"><input type="radio" name="mpp_usia_1" id="mpp_usia_1_ya" value="1"></td>
                                    <td class="text-center"><input type="radio" name="mpp_usia_1" id="mpp_usia_1_tidak" value="2"></td>
                                    <td class="text-center"><input type="radio" name="mpp_usia_2" id="mpp_usia_2_ya" value="1"></td>
                                    <td class="text-center"><input type="radio" name="mpp_usia_2" id="mpp_usia_2_tidak" value="2"></td>
                                    <td class="text-center"><input type="radio" name="mpp_usia_3" id="mpp_usia_3_ya" value="1"></td>
                                    <td class="text-center"><input type="radio" name="mpp_usia_3" id="mpp_usia_3_tidak" value="2"></td>
                                  </tr>
                                  <tr>
                                    <td>2</td>
                                    <td>Pasien dengan resiko tinggi</td>
                                    <td class="text-center"><input type="radio" name="mpp_resiko_1" id="mpp_resiko_1_ya" value="1"></td>
                                    <td class="text-center"><input type="radio" name="mpp_resiko_1" id="mpp_resiko_1_tidak" value="2"></td>
                                    <td class="text-center"><input type="radio" name="mpp_resiko_2" id="mpp_resiko_2_ya" value="1"></td>
                                    <td class="text-center"><input type="radio" name="mpp_resiko_2" id="mpp_resiko_2_tidak" value="2"></td>
                                    <td class="text-center"><input type="radio" name="mpp_resiko_3" id="mpp_resiko_3_ya" value="1"></td>
                                    <td class="text-center"><input type="radio" name="mpp_resiko_3" id="mpp_resiko_3_tidak" value="2"></td>
                                  </tr>
                                  <tr>
                                    <td>3</td>
                                    <td>Potensi komplain tinggi</td>
                                    <td class="text-center"><input type="radio" name="mpp_komplain_1" id="mpp_komplain_1_ya" value="1"></td>
                                    <td class="text-center"><input type="radio" name="mpp_komplain_1" id="mpp_komplain_1_tidak" value="2"></td>
                                    <td class="text-center"><input type="radio" name="mpp_komplain_2" id="mpp_komplain_2_ya" value="1"></td>
                                    <td class="text-center"><input type="radio" name="mpp_komplain_2" id="mpp_komplain_2_tidak" value="2"></td>
                                    <td class="text-center"><input type="radio" name="mpp_komplain_3" id="mpp_komplain_3_ya" value="1"></td>
                                    <td class="text-center"><input type="radio" name="mpp_komplain_3" id="mpp_komplain_3_tidak" value="2"></td>
                                  </tr>
                                  <tr>
                                    <td>4</td>
                                    <td>Kasus dengan penyakit kronis, katastropik, terminal</td>
                                    <td class="text-center"><input type="radio" name="mpp_kronis_1" id="mpp_kronis_1_ya" value="1"></td>
                                    <td class="text-center"><input type="radio" name="mpp_kronis_1" id="mpp_kronis_1_tidak" value="2"></td>
                                    <td class="text-center"><input type="radio" name="mpp_kronis_2" id="mpp_kronis_2_ya" value="1"></td>
                                    <td class="text-center"><input type="radio" name="mpp_kronis_2" id="mpp_kronis_2_tidak" value="2"></td>
                                    <td class="text-center"><input type="radio" name="mpp_kronis_3" id="mpp_kronis_3_ya" value="1"></td>
                                    <td class="text-center"><input type="radio" name="mpp_kronis_3" id="mpp_kronis_3_tidak" value="2"></td>
                                  </tr>
                                  <tr>
                                    <td>5</td>
                                    <td>Status fungsional rendah, kebutuhan bantuan ADL (<i>Activity Daily Living</i>)</td>
                                    <td class="text-center"><input type="radio" name="mpp_adl_1" id="mpp_adl_1_ya" value="1"></td>
                                    <td class="text-center"><input type="radio" name="mpp_adl_1" id="mpp_adl_1_tidak" value="2"></td>
                                    <td class="text-center"><input type="radio" name="mpp_adl_2" id="mpp_adl_2_ya" value="1"></td>
                                    <td class="text-center"><input type="radio" name="mpp_adl_2" id="mpp_adl_2_tidak" value="2"></td>
                                    <td class="text-center"><input type="radio" name="mpp_adl_3" id="mpp_adl_3_ya" value="1"></td>
                                    <td class="text-center"><input type="radio" name="mpp_adl_3" id="mpp_adl_3_tidak" value="2"></td>
                                  </tr>
                                  <tr>
                                    <td>6</td>
                                    <td>Pasien dengan riwayat penggunaan peralatan medis di masa lalu</td>
                                    <td class="text-center"><input type="radio" name="mpp_peralatan_1" id="mpp_peralatan_1_ya" value="1"></td>
                                    <td class="text-center"><input type="radio" name="mpp_peralatan_1" id="mpp_peralatan_1_tidak" value="2"></td>
                                    <td class="text-center"><input type="radio" name="mpp_peralatan_2" id="mpp_peralatan_2_ya" value="1"></td>
                                    <td class="text-center"><input type="radio" name="mpp_peralatan_2" id="mpp_peralatan_2_tidak" value="2"></td>
                                    <td class="text-center"><input type="radio" name="mpp_peralatan_3" id="mpp_peralatan_3_ya" value="1"></td>
                                    <td class="text-center"><input type="radio" name="mpp_peralatan_3" id="mpp_peralatan_3_tidak" value="2"></td>
                                  </tr>
                                  <tr>
                                    <td>7</td>
                                    <td>Pasien dengan riwayat gangguan mental, upaya bunuh diri, krisis keluarga, isu sosial a.l terlantar, tinggal sendiri, narkoba</td>
                                    <td class="text-center"><input type="radio" name="mpp_mental_1" id="mpp_mental_1_ya" value="1"></td>
                                    <td class="text-center"><input type="radio" name="mpp_mental_1" id="mpp_mental_1_tidak" value="2"></td>
                                    <td class="text-center"><input type="radio" name="mpp_mental_2" id="mpp_mental_2_ya" value="1"></td>
                                    <td class="text-center"><input type="radio" name="mpp_mental_2" id="mpp_mental_2_tidak" value="2"></td>
                                    <td class="text-center"><input type="radio" name="mpp_mental_3" id="mpp_mental_3_ya" value="1"></td>
                                    <td class="text-center"><input type="radio" name="mpp_mental_3" id="mpp_mental_3_tidak" value="2"></td>
                                  </tr>
                                  <tr>
                                    <td>8</td>
                                    <td>Pasien sering masuk IGD, readmisi rumah sakti</td>
                                    <td class="text-center"><input type="radio" name="mpp_igd_1" id="mpp_igd_1_ya" value="1"></td>
                                    <td class="text-center"><input type="radio" name="mpp_igd_1" id="mpp_igd_1_tidak" value="2"></td>
                                    <td class="text-center"><input type="radio" name="mpp_igd_2" id="mpp_igd_2_ya" value="1"></td>
                                    <td class="text-center"><input type="radio" name="mpp_igd_2" id="mpp_igd_2_tidak" value="2"></td>
                                    <td class="text-center"><input type="radio" name="mpp_igd_3" id="mpp_igd_3_ya" value="1"></td>
                                    <td class="text-center"><input type="radio" name="mpp_igd_3" id="mpp_igd_3_tidak" value="2"></td>
                                  </tr>
                                  <tr>
                                    <td>9</td>
                                    <td>Perkiraan asuhan dengan biaya tinggi</td>
                                    <td class="text-center"><input type="radio" name="mpp_asuhan_1" id="mpp_asuhan_1_ya" value="1"></td>
                                    <td class="text-center"><input type="radio" name="mpp_asuhan_1" id="mpp_asuhan_1_tidak" value="2"></td>
                                    <td class="text-center"><input type="radio" name="mpp_asuhan_2" id="mpp_asuhan_2_ya" value="1"></td>
                                    <td class="text-center"><input type="radio" name="mpp_asuhan_2" id="mpp_asuhan_2_tidak" value="2"></td>
                                    <td class="text-center"><input type="radio" name="mpp_asuhan_3" id="mpp_asuhan_3_ya" value="1"></td>
                                    <td class="text-center"><input type="radio" name="mpp_asuhan_3" id="mpp_asuhan_3_tidak" value="2"></td>
                                  </tr>
                                  <tr>
                                    <td>10</td>
                                    <td>Kemungkinan sistem pembiayaan yang komplek, adanya masalah finansial</td>
                                    <td class="text-center"><input type="radio" name="mpp_pembiayaan_1" id="mpp_pembiayaan_1_ya" value="1"></td>
                                    <td class="text-center"><input type="radio" name="mpp_pembiayaan_1" id="mpp_pembiayaan_1_tidak" value="2"></td>
                                    <td class="text-center"><input type="radio" name="mpp_pembiayaan_2" id="mpp_pembiayaan_2_ya" value="1"></td>
                                    <td class="text-center"><input type="radio" name="mpp_pembiayaan_2" id="mpp_pembiayaan_2_tidak" value="2"></td>
                                    <td class="text-center"><input type="radio" name="mpp_pembiayaan_3" id="mpp_pembiayaan_3_ya" value="1"></td>
                                    <td class="text-center"><input type="radio" name="mpp_pembiayaan_3" id="mpp_pembiayaan_3_tidak" value="2"></td>
                                  </tr>
                                  <tr>
                                    <td>11</td>
                                    <td>Kasus yang melebihi rata-rata lama dirawat</td>
                                    <td class="text-center"><input type="radio" name="mpp_kasus_1" id="mpp_kasus_1_ya" value="1"></td>
                                    <td class="text-center"><input type="radio" name="mpp_kasus_1" id="mpp_kasus_1_tidak" value="2"></td>
                                    <td class="text-center"><input type="radio" name="mpp_kasus_2" id="mpp_kasus_2_ya" value="1"></td>
                                    <td class="text-center"><input type="radio" name="mpp_kasus_2" id="mpp_kasus_2_tidak" value="2"></td>
                                    <td class="text-center"><input type="radio" name="mpp_kasus_3" id="mpp_kasus_3_ya" value="1"></td>
                                    <td class="text-center"><input type="radio" name="mpp_kasus_3" id="mpp_kasus_3_tidak" value="2"></td>
                                  </tr>
                                  <tr>
                                    <td>12</td>
                                    <td>Kasus yang diidentifikasi rencana pemulangannya penting/beresiko atau yang membutuhkan kontinuitas pelayanan</td>
                                    <td class="text-center"><input type="radio" name="mpp_pemulangan_1" id="mpp_pemulangan_1_ya" value="1"></td>
                                    <td class="text-center"><input type="radio" name="mpp_pemulangan_1" id="mpp_pemulangan_1_tidak" value="2"></td>
                                    <td class="text-center"><input type="radio" name="mpp_pemulangan_2" id="mpp_pemulangan_2_ya" value="1"></td>
                                    <td class="text-center"><input type="radio" name="mpp_pemulangan_2" id="mpp_pemulangan_2_tidak" value="2"></td>
                                    <td class="text-center"><input type="radio" name="mpp_pemulangan_3" id="mpp_pemulangan_3_ya" value="1"></td>
                                    <td class="text-center"><input type="radio" name="mpp_pemulangan_3" id="mpp_pemulangan_3_tidak" value="2"></td>
                                  </tr>
                                  <tr>
                                    <td colspan="2">Paraf</td>
                                    <td colspan="2" class="text-center"><input type="checkbox" name="mpp_paraf_1" id="mpp_paraf_1" value="1"></td>
                                    <td colspan="2" class="text-center"><input type="checkbox" name="mpp_paraf_2" id="mpp_paraf_2" value="1"></td>
                                    <td colspan="2" class="text-center"><input type="checkbox" name="mpp_paraf_3" id="mpp_paraf_3" value="1"></td>
                                  </tr>
                                  <tr>
                                    <td colspan="2">Nama Petugas</td>
                                    <td colspan="2" class="text-center"><input type="text" name="mpp_petugas_1" id="mpp_petugas_1" class="select2c-input"></td>
                                    <td colspan="2" class="text-center"><input type="text" name="mpp_petugas_2" id="mpp_petugas_2" class="select2c-input"></td>
                                    <td colspan="2" class="text-center"><input type="text" name="mpp_petugas_3" id="mpp_petugas_3" class="select2c-input"></td>
                                  </tr>
                                  <tr>
                                    <td colspan="2">Paraf</td>
                                    <td colspan="2" class="text-center"><input type="checkbox" name="mpp_paraf_dokter" id="mpp_paraf_dokter" value="1"></td>
                                    <td colspan="4" class="text-center"></td>
                                  </tr>
                                  <tr>
                                    <td colspan="2">Dokter DPJP</td>
                                    <td colspan="2" class="text-center"><input type="text" name="mpp_dokter" id="mpp_dokter" class="select2c-input"></td>
                                    <td colspan="4" class="text-center"></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- END SKRINING KEBUTUHAN MANAJER PELAYANAN PASIEN (MPP) -->

              <!-- end content -->
              <?= form_close() ?>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
        <button id="btn-simpan" type="button" class="btn btn-info" onclick="konfirmasiSimpanEntriMPP()"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Entri Keperawatan -->
