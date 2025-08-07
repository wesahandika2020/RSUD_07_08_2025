<!-- <style type="text/css">td {border: solid 1px;}</style> -->
<!-- Modal Entri Keperawatan -->
<div class="modal fade" id="modal_entri_keperawatan_rm" role="dialog" data-backdrop="static" aria-labelledby="modal-resume-keperawatan-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
    <div class="modal-content">
      <div class="modal-header">
        <div class="title">
          <h5 class="modal-title bold" id="modal_entri_keperawatan_rm">SURVEILANS INFEKSI RUMAH SAKIT</h5>
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
            <div class="card-body">
              <!-- form pengkajian resume keperawatan -->

              <!-- Surveilans Infeksi Rumah Sakit-->
              <div class="form-surveilans-infeksi-rs">
                <div class="row">
                  <div class="col-lg-12">
                    <table class="table table-sm table-striped" style="margin-top: -15px">
                      <tr>
                        <td width="100%">
                          <!-- <h5 class="center"><b>SURVEILANS INFEKSI RUMAH SAKIT</b></h5> -->
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="form-surveilans">
                  <div class="row">
                    <div class="col-lg-6">
                      <table class="table table-sm table-striped" style="margin-top: -15px">
                        <tr>
                          <td width="2%"><b>A.</b></td>
                          <td width="55%"><b>TEMPAT DI RAWAT :</b></td>
                          <td width="43%"></td>
                        </tr>
                      </table>
                      <table class="table table-sm table-striped" style="margin-top: -15px">
                        <tr>
                          <td width="4%"></td>
                          <td>Ruang</td>
                          <td>:</td>
                          <td>
                            <!--<input type="text" name="sirs_ruang" id="sirs-ruang-rawat" class="clear-input d-inline-block ml-2">-->
                            <input type="text" name="sirs_ruang" id="sirs-ruang-rawat-text" class="custom-form clear-input d-inline-block col-lg-8 ml-2">
                          </td>
                        </tr>
                        <tr>
                          <td width="4%"></td>
                          <td>Tanggal Mulai</td>
                          <td>:</td>
                          <td><input type="text" class="custom-form clear-input d-inline-block col-lg-5 ml-2" name="sirs_tanggal_mulai" id="sirs-tanggal-mulai" placeholder="dd/mm/yyyy"></td>
                        </tr>
                        <tr>
                          <td width="4%"></td>
                          <td>Tanggal Selesai</td>
                          <td>:</td>
                          <td><input type="text" class="custom-form clear-input d-inline-block col-lg-5 ml-2" name="sirs_tanggal_selesai" id="sirs-tanggal-selesai" placeholder="dd/mm/yyyy"></td>
                        </tr>
                        <tr>
                          <td width="4%"></td>
                          <td><button type="button" title="Tambah Ruang" class="btn btn-info" onclick="tambahRuangRawat()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah
                              Ruang</button></td>
                          <td></td>
                          <td></td>
                        </tr>
                      </table>
                      <table class="table table-hover table-striped table-sm color-table info-table" id="table-ruang-rawat">
                        <thead class="thead-theme">
                          <tr>
                            <th class="center">No</th>
                            <?php if ($this->session->userdata('account_group') === 'Admin') : ?>
                              <th class="center">Waktu</th>
                              <th class="center">Ruang</th>
                            <?php else : ?>
                              <th class="center"><b>Ruang</b></th>
                            <?php endif ?>
                            <th class="center">Tanggal Mulai</th>
                            <th class="center">Tanggal Selesai</th>
                            <?php if ($this->session->userdata('account_group') === 'Admin') : ?>
                              <th class="center">Petugas</th>
                            <?php else : ?>
                            <?php endif ?>
                            <th class="center"></th>
                          </tr>
                        </thead>
                        <tbody></tbody>
                      </table>
                    </div>
                    <div class="col-lg-6">

                      <table class="table table-sm table-striped" style="margin-top: -15px">
                        <tr>
                          <td width="2%"><b>B.</b></td>
                          <td width="10%"><b>DIAGNOSIS :</b></td>
                          <td width="88%">
                            <div class="form-group tight">
                              <textarea name="sirs_diagnosis_masuk" id="sirs-diagnosis-masuk" class="form-control" rows="4"></textarea>
                            </div>
                          </td>
                        </tr>
                      </table>

                    </div>
                    <div class="col-lg-12">
                      <table class="table table-sm table-striped" style="margin-top: -15px">
                        <tr>
                          <td width="2%"><b>C.</b></td>
                          <td width="20%"><b>PEMASANGAN ALAT :</b></td>
                          <td width="78%"></td>
                        </tr>
                      </table>
                      <table class="table table-sm table-striped" style="margin-top: -15px">
                        <tr>
                          <td width="4%"></td>
                          <td>Tindakan</td>
                          <td>:</td>
                          <td><input type="text" name="pasang_sirs_tindakan" id="sirs-tindakan" class="clear-input d-inline-block ml-2"></td>
                          <td>Lokasi</td>
                          <td>:</td>
                          <td><input type="text" name="sirs_lokasi" id="sirs-lokasi" class="custom-form clear-input d-inline-block col-lg-8 ml-2">
                          </td>

                        </tr>
                        <tr>
                          <td width="4%"></td>
                          <td>Tanggal Pasang</td>
                          <td>:</td>
                          <td><input type="text" class="custom-form clear-input d-inline-block col-lg-5 ml-2" name="sirs_tanggal_pasang" id="sirs-tanggal-pasang" placeholder="dd/mm/yyyy"></td>
                          <td>Tanggal Lepas</td>
                          <td>:</td>
                          <td><input type="text" class="custom-form clear-input d-inline-block col-lg-5 ml-2" name="sirs_tanggal_lepas" id="sirs-tanggal-lepas" placeholder="dd/mm/yyyy"></td>
                        </tr>
                        <tr>
                          <td width="4%"></td>
                          <td>Alasan Pasang</td>
                          <td>:</td>
                          <td>
                            <div class="form-group tight">
                              <textarea name="sirs_alasan_pasang" id="sirs-alasan-pasang" class="form-control clear-input d-inline-block col-lg-8 ml-2" rows="4"></textarea>
                            </div>
                          </td>
                          <td>Alasan Lepas</td>
                          <td>:</td>
                          <td>
                            <div class="form-group tight">
                              <textarea name="sirs_alasan_lepas" id="sirs-alasan-lepas" class="form-control clear-input d-inline-block col-lg-8 ml-2" rows="4"></textarea>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td width="4%"></td>
                          <td>Nama Jelas Pemasang Alat</td>
                          <td>:</td>
                          <td>
                            <div class="form-group tight">
                              <input type="text" name="sirs_perawat_pasang" id="sirs-perawat-pasang" class="select2c-input ml-2">
                            </div>
                          </td>
                          <td>Nama Jelas Pelepas Alat</td>
                          <td>:</td>
                          <td>
                            <div class="form-group tight">
                              <input type="text" name="sirs_perawat_lepas" id="sirs-perawat-lepas" class="select2c-input ml-2">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td width="4%"></td>
                          <td><button type="button" title="Tambah Alat" class="btn btn-info" onclick="tambahPemasanganAlat()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah
                              Alat</button></td>
                          <td></td>
                          <td></td>
                        </tr>
                      </table>
                      <table class="table table-hover table-striped table-sm color-table info-table" id="table-pemasangan-alat">
                        <thead class="thead-theme">
                          <tr>
                            <th class="center" rowspan="2">No</th>
                            <?php if ($this->session->userdata('account_group') === 'Admin') : ?>
                              <th class="center" rowspan="2">Waktu</th>
                              <th class="center" rowspan="2">Tindakan</th>
                            <?php else : ?>
                              <th class="center" rowspan="2"><b>Tindakan</b></th>
                            <?php endif ?>
                            <th class="center" colspan="4">Pasang</th>
                            <th class="center" colspan="3">Lepas</th>
                            <?php if ($this->session->userdata('account_group') === 'Admin') : ?>
                              <th class="center" rowspan="2">Petugas</th>
                            <?php endif ?>
                            <th class="center" rowspan="2"></th>
                          </tr>
                          <tr>
                            <th class="center">Tanggal</th>
                            <th class="center">Lokasi</th>
                            <th class="center">Alasan</th>
                            <th class="center">Nama Jelas</th>
                            <th class="center">Tanggal</th>
                            <th class="center">Alasan</th>
                            <th class="center">Nama Jelas</th>
                          </tr>
                        </thead>
                        <tbody></tbody>
                      </table>
                      <table class="table table-no-border table-sm table-striped" style="margin-top:15px">
                        <tr>
                          <td>
                            <span class="bold">Catatan</span><br>
                            <span class="ml-3">IV Catheter lama pemasangan 3 hari; Urine
                              Catheter lama pemasangan 7 hari (silicon 1
                              bulan)</span><br>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <span class="bold">Kriteria Plebitis :</span><br>
                            <span class="ml-3">0 : tidak ada tanda plebitis</span><br>
                            <span class="ml-3">1 : Merah atau sakit bila
                              ditekan</span><br>
                            <span class="ml-3">2 : Merah, sakit bila ditekan
                              oedema</span>
                          </td>
                          <td>
                            <span class="ml-3"></span><br>
                            <span class="ml-3">3 : Merah, sakit bila ditekan oedema dan
                              vena mengeras</span><br>
                            <span class="ml-3">4 : Merah, sakit bila ditekan oedema,
                              vena mengeras dan timbul pus</span>
                          </td>
                        </tr>
                      </table>
                    </div>
                    <div class="col-lg-6">
                      <table class="table table-sm table-striped" style="margin-top: -15px">
                        <tr>
                          <td width="2%"><b>D.</b></td>
                          <td width="55%"><b>PETANDA INFEKSI :</b></td>
                          <td width="43%"></td>
                        </tr>
                      </table>
                      <table class="table table-sm table-striped" style="margin-top: -15px">
                        <tr>
                          <td width="2%"></td>
                          <td width="4%">1.</td>
                          <td>HbsAg</td>
                          <td>:</td>
                          <td>
                            <div class="input-group">
                              <input type="radio" name="hbsag" id="hbsag-positif" value="Positif" class="mr-1">Positif
                              <input type="radio" name="hbsag" id="hbsag-negatif" value="Negatif" class="mr-1 ml-2">Negatif
                              <input type="radio" name="hbsag" id="hbsag-periksa" value="Tidak Diperiksa" class="mr-1 ml-2">Tidak
                              Diperiksa
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td width="2%"></td>
                          <td width="4%">2.</td>
                          <td>AntiHCV</td>
                          <td>:</td>
                          <td>
                            <div class="input-group">
                              <input type="radio" name="antihcv" id="antihcv-positif" value="Positif" class="mr-1">Positif
                              <input type="radio" name="antihcv" id="antihcv-negatif" value="Negatif" class="mr-1 ml-2">Negatif
                              <input type="radio" name="antihcv" id="antihcv-periksa" value="Tidak Diperiksa" class="mr-1 ml-2">Tidak
                              Diperiksa
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td width="2%"></td>
                          <td width="4%">3.</td>
                          <td>Anti HIV</td>
                          <td>:</td>
                          <td>
                            <div class="input-group">
                              <input type="radio" name="antihiv" id="antihiv-positif" value="Positif" class="mr-1">Positif
                              <input type="radio" name="antihiv" id="antihiv-negatif" value="Negatif" class="mr-1 ml-2">Negatif
                              <input type="radio" name="antihiv" id="antihiv-periksa" value="Tidak Diperiksa" class="mr-1 ml-2">Tidak
                              Diperiksa
                            </div>
                          </td>
                        </tr>
                      </table>

                    </div>
                    <div class="col-lg-12">
                      <table class="table table-sm table-striped" style="margin-top: -15px">
                        <tr>
                          <td width="2%"><b>E.</b></td>
                          <td width="55%"><b>TINDAKAN/OPERASI :</b></td>
                          <td width="43%"></td>
                        </tr>
                        <tr>
                          <td width="2%"></td>
                          <td width="55%">Kasus Bedah :</b></td>
                          <td width="43%"></td>
                        </tr>
                      </table>
                      <table class="table table-sm table-striped" style="margin-top: -15px">
                        <tr>
                          <td width="2%">

                          </td>
                          <td>
                            <div class="input-group">
                              <input type="checkbox" name="t_op_ortopedi" id="t-op-ortopedi" value="1" class="mr-1">Ortopedi
                              <input type="checkbox" name="t_op_digestive" id="t-op-digestive" value="1" class="mr-1 ml-2">Digestive
                              <input type="checkbox" name="t_op_plastik" id="t-op-plastik" value="1" class="mr-1 ml-2">Plastik
                              <input type="checkbox" name="t_op_tumor" id="t-op-tumor" value="1" class="mr-1 ml-2">Tumor
                              <input type="checkbox" name="t_op_urologi" id="t-op-urologi" value="1" class="mr-1 ml-2">Urologi
                              <input type="checkbox" name="t_op_tht" id="t-op-tht" value="1" class="mr-1 ml-2">THT
                            </div>
                          </td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td width="2%">

                          </td>
                          <td>
                            <div class="input-group">
                              <input type="checkbox" name="t_op_anak" id="t-op-anak" value="1" class="mr-1">Anak
                              <input type="checkbox" name="t_op_gilut" id="t-op-gilut" value="1" class="mr-1 ml-2">Gilut
                              <input type="checkbox" name="t_op_vaskuler" id="t-op-vaskuler" value="1" class="mr-1 ml-2">Vaskuler
                              <input type="checkbox" name="t_op_saraf" id="t-op-saraf" value="1" class="mr-1 ml-2">Saraf
                              <input type="checkbox" name="t_op_mata" id="t-op-mata" value="1" class="mr-1 ml-2">Mata
                              <input type="checkbox" name="t_op_thorax" id="t-op-thorax" value="1" class="mr-1 ml-2">Thorax
                            </div>
                          </td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td width="2%">

                          </td>
                          <td>
                            <div class="input-group">
                              <input type="checkbox" name="t_op_obgyn" id="t-op-obgyn" value="1" class="mr-1">Obgyn
                              <input type="checkbox" name="t_op_lain" id="t-op-lain" value="1" class="mr-1 ml-2">Lain - lain
                              <input type="text" name="sm_top_lain" id="sm-top-lain" class="custom-form clear-input d-inline-block col-lg-3 ml-2 disabled" placeholder=".......................">
                            </div>
                          </td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>

                      </table>
                      <table class="table table-sm table-striped" style="margin-top: -15px">
                        <tr>
                          <td width="2%"><b></b></td>
                          <td width="55%">
                            <b>Diagnosis Operasi :</b>
                            <input type="text" name="sirs_diagnosis_operasi" id="sirs-diagnosis-operasi" class="custom-form clear-input d-inline-block col-lg-8 ml-2">
                          </td>
                          <td width="43%"></td>
                        </tr>
                      </table>
                      <table class="table table-sm table-striped" style="margin-top: -15px">
                        <tr>
                          <td width="2%"></td>
                          <td>a.</td>
                          <td>Tanggal</td>
                          <td>:</td>
                          <td>
                            <input type="text" class="custom-form clear-input d-inline-block col-lg-3" name="sirs_tanggal_diagnosis" id="sirs-tanggal-diagnosis" placeholder="dd/mm/yyyy">
                          </td>
                          <td></td>
                          <td>Lama Operasi</td>
                          <td>:</td>
                          <td>
                            <div class="input-group">

                              <input type="text" name="sirs_jam" id="sirs-jam" class="custom-form clear-input d-inline-block col-lg-3" placeholder="Jam" onkeypress="return hanyaAngka(event)">
                              <div class="input-group-append">
                                <span class="input-group-custom">jam</span>
                              </div>
                              <input type="text" name="sirs_menit" id="sirs-menit" class="custom-form clear-input d-inline-block col-lg-3" placeholder="Menit" onkeypress="return hanyaAngka(event)">
                              <div class="input-group-append">
                                <span class="input-group-custom">Menit</span>
                              </div>
                            </div>
                          </td>
                          <td></td>
                        </tr>
                        <tr>
                          <td width="2%"></td>
                          <td></td>
                          <td>Dipasang Drain</td>
                          <td>:</td>
                          <td>
                            <div class="input-group">
                              <input type="radio" name="sirs_drain" id="sirs-drain-ya" value="Positif" class="mr-1">Ya
                              <input type="radio" name="sirs_drain" id="sirs-drain-tidak" value="Negatif" class="mr-1 ml-2">Tidak
                            </div>
                          </td>
                          <td></td>
                          <td>Asa Score</td>
                          <td>:</td>
                          <td>
                            <div class="input-group">
                              <input type="radio" name="sirs_asascore" id="sirs-asascore-satu" value="1" class="mr-1">1
                              <input type="radio" name="sirs_asascore" id="sirs-asascore-dua" value="2" class="mr-1 ml-2">2
                              <input type="radio" name="sirs_asascore" id="sirs-asascore-tiga" value="3" class="mr-1 ml-2">3
                              <input type="radio" name="sirs_asascore" id="sirs-asascore-empat" value="4" class="mr-1 ml-2">4
                              <input type="radio" name="sirs_asascore" id="sirs-asascore-lima" value="5" class="mr-1 ml-2">5
                            </div>
                          </td>
                          <td></td>
                        </tr>
                        <tr>
                          <td width="2%"></td>
                          <td></td>
                          <td>Jenis Operasi</td>
                          <td>:</td>
                          <td>
                            <div class="input-group">
                              <input type="radio" name="sirs_jenis_operasi" id="sirs-jenis-operasi-bersih" value="Bersih" class="mr-1">Bersih
                              <input type="radio" name="sirs_jenis_operasi" id="sirs-jenis-operasi-bersihcemar" value="Bersih Tercemar" class="mr-1 ml-2">Bersih
                              Tercemar
                              <input type="radio" name="sirs_jenis_operasi" id="sirs-jenis-operasi-cemar" value="Tercemar" class="mr-1 ml-2">Tercemar
                              <input type="radio" name="sirs_jenis_operasi" id="sirs-jenis-operasi-kotor" value="Kotor" class="mr-1 ml-2">Kotor
                            </div>
                          </td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td width="2%"></td>
                          <td></td>
                          <td>Tindakan Operasi</td>
                          <td>:</td>
                          <td>
                            <div class="input-group">
                              <input type="radio" name="sirs_tindakan_operasi" id="sirs-tindakan-operasi-cito" value="Cito" class="mr-1">Cito
                              <input type="radio" name="sirs_tindakan_operasi" id="sirs-tindakan-operasi-elektif" value="Elektif" class="mr-1 ml-2">Elektif
                            </div>
                          </td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td width="2%"></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td>
                            <div class="input-group">
                              <input type="radio" name="sirs_antibiotik" id="sirs-antibiotik" value="1" class="mr-1">Antibiotik Profilaksis
                              <input type="text" name="sirs_antibiotik_profilaksis" id="sirs-antibiotik-profilaksis" class="custom-form clear-input d-inline-block col-lg-8 ml-2 disabled" placeholder="...........">
                            </div>
                          </td>
                          <td></td>
                          <td>Dosis</td>
                          <td>:</td>
                          <td>
                            <input type="text" name="sirs_dosis_antibiotik" id="sirs-dosis-antibiotik" class="custom-form clear-input d-inline-block col-lg-8 disabled" placeholder="Dosis...">
                          </td>
                          <td></td>
                        </tr>
                        <tr>
                          <td width="2%"></td>
                          <td></td>
                          <td>Waktu Pemberian</td>
                          <td>:</td>
                          <td>
                            <div class="input-group">
                              <input type="radio" name="sirs_waktu_pemberian" id="sirs-waktu-preoperasi" value="preoperasi" class="mr-1">Preoperasi
                              <input type="radio" name="sirs_waktu_pemberian" id="sirs-waktu-selama" value="selama" class="mr-1 ml-2">Selama
                              <input type="radio" name="sirs_waktu_pemberian" id="sirs-waktu-sesudah" value="sesudah operasi" class="mr-1 ml-2">Sesudah operasi
                            </div>
                          </td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                      </table>
                      <table class="table table-sm table-striped" style="margin-top: -15px">
                        <tr>
                          <td width="2%"></td>
                          <td>b.</td>
                          <td>Tanggal</td>
                          <td>:</td>
                          <td>
                            <input type="text" class="custom-form clear-input d-inline-block col-lg-3" name="sirs_tanggal_diagnosis_satu" id="sirs-tanggal-diagnosis-satu" placeholder="dd/mm/yyyy">
                          </td>
                          <td></td>
                          <td>Lama Operasi</td>
                          <td>:</td>
                          <td>
                            <div class="input-group">

                              <input type="text" name="sirs_jam_satu" id="sirs-jam-satu" class="custom-form clear-input d-inline-block col-lg-3" placeholder="Jam" onkeypress="return hanyaAngka(event)">
                              <div class="input-group-append">
                                <span class="input-group-custom">jam</span>
                              </div>
                              <input type="text" name="sirs_menit_satu" id="sirs-menit-satu" class="custom-form clear-input d-inline-block col-lg-3" placeholder="Menit" onkeypress="return hanyaAngka(event)">
                              <div class="input-group-append">
                                <span class="input-group-custom">Menit</span>
                              </div>
                            </div>
                          </td>
                          <td></td>
                        </tr>
                        <tr>
                          <td width="2%"></td>
                          <td></td>
                          <td>Dipasang Drain</td>
                          <td>:</td>
                          <td>
                            <div class="input-group">
                              <input type="radio" name="sirs_drain_satu" id="sirs-drain-satu-ya" value="Positif" class="mr-1">Ya
                              <input type="radio" name="sirs_drain_satu" id="sirs-drain-satu-tidak" value="Negatif" class="mr-1 ml-2">Tidak
                            </div>
                          </td>
                          <td></td>
                          <td>Asa Score</td>
                          <td>:</td>
                          <td>
                            <div class="input-group">
                              <input type="radio" name="sirs_asascore_satu" id="sirs-asascore-satu-satu" value="1" class="mr-1">1
                              <input type="radio" name="sirs_asascore_satu" id="sirs-asascore-dua-satu" value="2" class="mr-1 ml-2">2
                              <input type="radio" name="sirs_asascore_satu" id="sirs-asascore-tiga-satu" value="3" class="mr-1 ml-2">3
                              <input type="radio" name="sirs_asascore_satu" id="sirs-asascore-empat-satu" value="4" class="mr-1 ml-2">4
                              <input type="radio" name="sirs_asascore_satu" id="sirs-asascore-lima-satu" value="5" class="mr-1 ml-2">5
                            </div>
                          </td>
                          <td></td>
                        </tr>
                        <tr>
                          <td width="2%"></td>
                          <td></td>
                          <td>Jenis Operasi</td>
                          <td>:</td>
                          <td>
                            <div class="input-group">
                              <input type="radio" name="sirs_jenis_operasi_satu" id="sirs-jenis-operasi-bersih-satu" value="Bersih" class="mr-1">Bersih
                              <input type="radio" name="sirs_jenis_operasi_satu" id="sirs-jenis-operasi-bersihcemar-satu" value="Bersih Tercemar" class="mr-1 ml-2">Bersih
                              Tercemar
                              <input type="radio" name="sirs_jenis_operasi_satu" id="sirs-jenis-operasi-cemar-satu" value="Tercemar" class="mr-1 ml-2">Tercemar
                              <input type="radio" name="sirs_jenis_operasi_satu" id="sirs-jenis-operasi-kotor-satu" value="Kotor" class="mr-1 ml-2">Kotor
                            </div>
                          </td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td width="2%"></td>
                          <td></td>
                          <td>Tindakan Operasi</td>
                          <td>:</td>
                          <td>
                            <div class="input-group">
                              <input type="radio" name="sirs_tindakan_operasi_satu" id="sirs-tindakan-operasi-cito-satu" value="Cito" class="mr-1">Cito
                              <input type="radio" name="sirs_tindakan_operasi_satu" id="sirs-tindakan-operasi-elektif-satu" value="Elektif" class="mr-1 ml-2">Elektif
                            </div>
                          </td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td width="2%"></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td>
                            <div class="input-group">
                              <input type="radio" name="sirs_antibiotik_satu" id="sirs-antibiotik-satu" value="1" class="mr-1">Antibiotik Profilaksis
                              <input type="text" name="sirs_antibiotik_profilaksis_satu" id="sirs-antibiotik-profilaksis-satu" class="custom-form clear-input d-inline-block col-lg-8 ml-2 disabled" placeholder="...........">
                            </div>
                          </td>
                          <td></td>
                          <td>Dosis</td>
                          <td>:</td>
                          <td>
                            <input type="text" name="sirs_dosis_antibiotik_satu" id="sirs-dosis-antibiotik-satu" class="custom-form clear-input d-inline-block col-lg-8 disabled" placeholder="Dosis...">
                          </td>
                          <td></td>
                        </tr>
                        <tr>
                          <td width="2%"></td>
                          <td></td>
                          <td>Waktu Pemberian</td>
                          <td>:</td>
                          <td>
                            <div class="input-group">
                              <input type="radio" name="sirs_waktu_pemberian_satu" id="sirs-waktu-preoperasi-satu" value="preoperasi" class="mr-1">Preoperasi
                              <input type="radio" name="sirs_waktu_pemberian_satu" id="sirs-waktu-selama-satu" value="selama" class="mr-1 ml-2">Selama
                              <input type="radio" name="sirs_waktu_pemberian_satu" id="sirs-waktu-sesudah-satu" value="sesudah operasi" class="mr-1 ml-2">Sesudah operasi
                            </div>
                          </td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                      </table>
                      <table class="table table-sm table-striped" style="margin-top: -15px">
                        <tr>
                          <td width="2%"><b>F.</b></td>
                          <td width="55%"><b>ANTIBIOTIKA</b></td>
                          <td width="43%"></td>
                        </tr>
                      </table>
                      <table class="table table-sm table-striped" style="margin-top: -15px">
                        <tr>
                          <td width="2%"></td>
                          <td width="2%"></td>
                          <td width="10.4%">Pemakaian Antibiotika</td>
                          <td width="1.5%">:</td>
                          <td width="10%">
                            <div class="input-group" id="sirs-antibiotika-msg">
                              <input type="radio" name="sirs_pemakaian_antibiotika" id="sirs-antibiotika-ya" value="ada" class="mr-1">Ada
                              <input type="radio" name="sirs_pemakaian_antibiotika" id="sirs-antibiotika-tidak" value="tidak ada" class="mr-1 ml-2">Tidak Ada
                            </div>
                          </td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                      </table>
                      <table class="table table-sm table-striped" style="margin-top: -15px">
                        <tr>
                          <td width="4%"></td>
                          <td width="10.4%">Nama Antibiotika</td>
                          <td width="1.5%">:</td>
                          <td><input type="text" name="f_sirs_nama_antibiotika" id="sirs-nama-antibiotika" class="select2c-input clear-input d-inline-block"></td>
                          <td>Dosis</td>
                          <td>:</td>
                          <td><input type="text" name="sirs_dosis_antibiotika" id="sirs-dosis-antibiotika" class="custom-form clear-input d-inline-block col-lg-8">
                          </td>

                        </tr>
                        <tr>
                          <td width="4%"></td>
                          <td>Tanggal Pemberian</td>
                          <td>:</td>
                          <td><input type="text" class="custom-form clear-input d-inline-block mr-1 col-lg-5" name="sirs_tanggal_pemberian_antibiotik" id="sirs-tanggal-antibiotik" placeholder="dd/mm/yyyy">
                          </td>
                          <td>Tanggal Selesai</td>
                          <td>:</td>
                          <td><input type="text" class="custom-form clear-input d-inline-block col-lg-5" name="sirs_tanggal_selesai_antibiotik" id="sirs-antibiotik-selesai" placeholder="dd/mm/yyyy">
                          </td>
                        </tr>
                        <tr>
                          <td width="4%"></td>
                          <td>Teknik Pemberian</td>
                          <td>:</td>
                          <td>
                            <div class="input-group" id="sirs-teknik-pemberian">
                              <input type="radio" name="sirs_teknik_pemberian" id="sirs-teknik-im" value="IM" class="mr-1">IM
                              <input type="radio" name="sirs_teknik_pemberian" id="sirs-teknik-iv" value="IV" class="mr-1 ml-2">IV
                              <input type="radio" name="sirs_teknik_pemberian" id="sirs-teknik-oral" value="Oral" class="mr-1 ml-2">Oral
                              <input type="radio" name="sirs_teknik_pemberian" id="sirs-teknik-drip" value="Drip" class="mr-1 ml-2">Drip
                              <input type="radio" name="sirs_teknik_pemberian" id="sirs-teknik-sup" value="Sup" class="mr-1 ml-2">Sup
                              <input type="radio" name="sirs_teknik_pemberian" id="sirs-teknik-lokal" value="Lokal" class="mr-1 ml-2">Lokal
                            </div>
                          </td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td width="4%"></td>
                          <td><button type="button" title="Tambah Alat" class="btn btn-info" onclick="tambahPemakaianAntibiotik()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah
                              Antibiotika</button></td>
                          <td></td>
                          <td></td>
                        </tr>
                      </table>
                      <table class="table table-hover table-striped table-sm color-table info-table" id="table-pemakaian-antibiotika">
                        <thead class="thead-theme">
                          <tr>
                            <th class="center">No</th>
                            <?php if ($this->session->userdata('account_group') === 'Admin') : ?>
                              <th class="center">Waktu</th>
                              <th class="center">Nama Antibiotika</th>
                            <?php else : ?>
                              <th class="center"><b>Nama Antibiotika</b></th>
                            <?php endif ?>
                            <th class="center">Dosis</th>
                            <th class="center">Tanggal Pemberian</th>
                            <th class="center">Tanggal Selesai</th>
                            <?php if ($this->session->userdata('account_group') === 'Admin') : ?>
                              <th class="center">Teknik Pemberian</th>
                              <th class="center">Petugas</th>
                            <?php else : ?>
                              <th class="center">Teknik Pemberian</th>
                            <?php endif ?>
                            <th class="center"></th>
                          </tr>
                        </thead>
                        <tbody></tbody>
                      </table>
                      <table class="table table-sm table-striped" style="margin-top: -15px">
                        <tr>
                          <td width="2%"><b>G.</b></td>
                          <td width="12.4%"><b>TIRAH BARING TOTAL</b></td>
                          <td width="1.5%"><b>:</b></td>
                          <td width="10%">
                            <div class="input-group">
                              <input type="radio" name="sirs_tirah_baring" id="sirs-tirah-ya" value="ya" class="mr-1">Ya
                              <input type="radio" name="sirs_tirah_baring" id="sirs-tirah-tidak" value="tidak" class="mr-1 ml-2" checked>Tidak
                            </div>
                          </td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                      </table>
                      <table class="table table-sm table-striped" style="margin-top: -15px">
                        <tr>
                          <td width="2%"><b>H.</b></td>
                          <td width="55%"><b>KOMPLIKASI DAN INFEKSI HAIS</b></td>
                          <td width="43%"></td>
                        </tr>
                      </table>
                      <table class="table table-sm table-striped" style="margin-top: -15px">
                        <tr>
                          <td width="2%"></td>
                          <td width="2%">1.</td>
                          <td width="4%">IDO</td>
                          <td width="1.5%">:</td>
                          <td width="10%">
                            <div class="input-group">
                              <input type="radio" name="sirs_ido" id="sirs-ada-ido" value="ada" class="mr-1">Ada
                              <input type="radio" name="sirs_ido" id="sirs-tidak-ido" value="tidak ada" class="mr-1 ml-2" checked>Tidak Ada
                            </div>
                          </td>
                          <td width="1%"></td>
                          <td width="4%">Hari Ke</td>
                          <td width="1.5%">:</td>
                          <td width="6%">
                            <input type="text" name="sirs_komplikasi_ido" id="sirs-komplikasi-ido" class="custom-form clear-input d-inline-block mr-1 col-lg-5 ml-2 disabled">
                          </td>
                          <td width="1%"></td>
                          <td width="8%">Tgl/Hasil Kultur</td>
                          <td width="1.5%">:</td>
                          <td width="10%">
                            <input type="text" name="sirs_kultur_ido" id="sirs-kultur-ido" class="custom-form clear-input d-inline-block mr-1 col-lg-8 ml-2 disabled">
                          </td>
                          <td width="47.5%"></td>
                        </tr>
                        <tr>
                          <td width="2%"></td>
                          <td width="2%">2.</td>
                          <td width="4%">IAD</td>
                          <td width="1.5%">:</td>
                          <td width="10%">
                            <div class="input-group">
                              <input type="radio" name="sirs_iad" id="sirs-ada-iad" value="ada" class="mr-1">Ada
                              <input type="radio" name="sirs_iad" id="sirs-tidak-iad" value="tidak ada" class="mr-1 ml-2" checked>Tidak Ada
                            </div>
                          </td>
                          <td width="1%"></td>
                          <td width="4%">Hari Ke</td>
                          <td width="1.5%">:</td>
                          <td width="6%">
                            <input type="text" name="sirs_komplikasi_iad" id="sirs-komplikasi-iad" class="custom-form clear-input d-inline-block mr-1 col-lg-5 ml-2 disabled">
                          </td>
                          <td width="1%"></td>
                          <td width="8%">Tgl/Hasil Kultur</td>
                          <td width="1.5%">:</td>
                          <td width="10%">
                            <input type="text" name="sirs_kultur_iad" id="sirs-kultur-iad" class="custom-form clear-input d-inline-block mr-1 col-lg-8 ml-2 disabled">
                          </td>
                          <td width="47.5%"></td>
                        </tr>
                        <tr>
                          <td width="2%"></td>
                          <td width="2%">3.</td>
                          <td width="4%">ISK</td>
                          <td width="1.5%">:</td>
                          <td width="10%">
                            <div class="input-group">
                              <input type="radio" name="sirs_isk" id="sirs-ada-isk" value="ada" class="mr-1">Ada
                              <input type="radio" name="sirs_isk" id="sirs-tidak-isk" value="tidak ada" class="mr-1 ml-2" checked>Tidak Ada
                            </div>
                          </td>
                          <td width="1%"></td>
                          <td width="4%">Hari Ke</td>
                          <td width="1.5%">:</td>
                          <td width="6%">
                            <input type="text" name="sirs_komplikasi_isk" id="sirs-komplikasi-isk" class="custom-form clear-input d-inline-block mr-1 col-lg-5 ml-2 disabled">
                          </td>
                          <td width="1%"></td>
                          <td width="8%">Tgl/Hasil Kultur</td>
                          <td width="1.5%">:</td>
                          <td width="10%">
                            <input type="text" name="sirs_kultur_isk" id="sirs-kultur-isk" class="custom-form clear-input d-inline-block mr-1 col-lg-8 ml-2 disabled">
                          </td>
                          <td width="47.5%"></td>
                        </tr>
                        <tr>
                          <td width="2%"></td>
                          <td width="2%">4.</td>
                          <td width="4%">HAP</td>
                          <td width="1.5%">:</td>
                          <td width="10%">
                            <div class="input-group">
                              <input type="radio" name="sirs_hap" id="sirs-ada-hap" value="ada" class="mr-1">Ada
                              <input type="radio" name="sirs_hap" id="sirs-tidak-hap" value="tidak ada" class="mr-1 ml-2" checked>Tidak Ada
                            </div>
                          </td>
                          <td width="1%"></td>
                          <td width="4%">Hari Ke</td>
                          <td width="1.5%">:</td>
                          <td width="6%">
                            <input type="text" name="sirs_komplikasi_hap" id="sirs-komplikasi-hap" class="custom-form clear-input d-inline-block mr-1 col-lg-5 ml-2 disabled">
                          </td>
                          <td width="1%"></td>
                          <td width="8%">Tgl/Hasil Kultur</td>
                          <td width="1.5%">:</td>
                          <td width="10%">
                            <input type="text" name="sirs_kultur_hap" id="sirs-kultur-hap" class="custom-form clear-input d-inline-block mr-1 col-lg-8 ml-2 disabled">
                          </td>
                          <td width="47.5%"></td>
                        </tr>
                        <tr>
                          <td width="2%"></td>
                          <td width="2%">5.</td>
                          <td width="4%">VAP</td>
                          <td width="1.5%">:</td>
                          <td width="10%">
                            <div class="input-group">
                              <input type="radio" name="sirs_vap" id="sirs-ada-vap" value="ada" class="mr-1">Ada
                              <input type="radio" name="sirs_vap" id="sirs-tidak-vap" value="tidak ada" class="mr-1 ml-2" checked>Tidak Ada
                            </div>
                          </td>
                          <td width="1%"></td>
                          <td width="4%">Hari Ke</td>
                          <td width="1.5%">:</td>
                          <td width="6%">
                            <input type="text" name="sirs_komplikasi_vap" id="sirs-komplikasi-vap" class="custom-form clear-input d-inline-block mr-1 col-lg-5 ml-2 disabled">
                          </td>
                          <td width="1%"></td>
                          <td width="8%">Tgl/Hasil Kultur</td>
                          <td width="1.5%">:</td>
                          <td width="10%">
                            <input type="text" name="sirs_kultur_vap" id="sirs-kultur-vap" class="custom-form clear-input d-inline-block mr-1 col-lg-8 ml-2 disabled">
                          </td>
                          <td width="47.5%"></td>
                        </tr>
                        <tr>
                          <td width="2%"></td>
                          <td width="2%">6.</td>
                          <td width="4%">Plebitis</td>
                          <td width="1.5%">:</td>
                          <td width="10%">
                            <div class="input-group">
                              <input type="radio" name="sirs_plebitis" id="sirs-ada-plebitis" value="ada" class="mr-1">Ada
                              <input type="radio" name="sirs_plebitis" id="sirs-tidak-plebitis" value="tidak ada" class="mr-1 ml-2" checked>Tidak Ada
                            </div>
                          </td>
                          <td width="1%"></td>
                          <td width="4%">Hari Ke</td>
                          <td width="1.5%">:</td>
                          <td width="6%">
                            <input type="text" name="sirs_komplikasi_plebitis" id="sirs-komplikasi-plebitis" class="custom-form clear-input d-inline-block mr-1 col-lg-5 ml-2 disabled">
                          </td>
                          <td width="1%"></td>
                          <td width="8%">Tgl/Hasil Kultur</td>
                          <td width="1.5%">:</td>
                          <td width="10%">
                            <input type="text" name="sirs_kultur_plebitis" id="sirs-kultur-plebitis" class="custom-form clear-input d-inline-block mr-1 col-lg-8 ml-2 disabled">
                          </td>
                          <td width="47.5%"></td>
                        </tr>
                        <tr>
                          <td width="2%"></td>
                          <td width="2%">7.</td>
                          <td width="4%">Dekubitus</td>
                          <td width="1.5%">:</td>
                          <td width="10%">
                            <div class="input-group">
                              <input type="radio" name="sirs_dekubitus" id="sirs-ada-dekubitus" value="ada" class="mr-1">Ada
                              <input type="radio" name="sirs_dekubitus" id="sirs-tidak-dekubitus" value="tidak ada" class="mr-1 ml-2" checked>Tidak Ada
                            </div>
                          </td>
                          <td width="1%"></td>
                          <td width="4%">Hari Ke</td>
                          <td width="1.5%">:</td>
                          <td width="6%">
                            <input type="text" name="sirs_komplikasi_dekubitus" id="sirs-komplikasi-dekubitus" class="custom-form clear-input d-inline-block mr-1 col-lg-5 ml-2 disabled">
                          </td>
                          <td width="1%"></td>
                          <td width="8%">Tgl/Hasil Kultur</td>
                          <td width="1.5%">:</td>
                          <td width="10%">
                            <input type="text" name="sirs_kultur_dekubitus" id="sirs-kultur-dekubitus" class="custom-form clear-input d-inline-block mr-1 col-lg-8 ml-2 disabled">
                          </td>
                          <td width="47.5%"></td>
                        </tr>
                        <tr>
                          <td width="2%"></td>
                          <td width="2%">8.</td>
                          <td width="4%">Lain - lain</td>
                          <td width="1.5%">:</td>
                          <td width="10%">
                            <div class="input-group">
                              <input type="radio" name="sirs_lain" id="sirs-ada-lain" value="ada" class="mr-1">Ada
                              <input type="radio" name="sirs_lain" id="sirs-tidak-lain" value="tidak ada" class="mr-1 ml-2" checked>Tidak Ada
                            </div>
                          </td>
                          <td width="1%"></td>
                          <td width="4%">Hari Ke</td>
                          <td width="1.5%">:</td>
                          <td width="6%">
                            <input type="text" name="sirs_komplikasi_lain" id="sirs-komplikasi-lain" class="custom-form clear-input d-inline-block mr-1 col-lg-5 ml-2 disabled">
                          </td>
                          <td width="1%"></td>
                          <td width="8%">Tgl/Hasil Kultur</td>
                          <td width="1.5%">:</td>
                          <td width="10%">
                            <input type="text" name="sirs_kultur_lain" id="sirs-kultur-lain" class="custom-form clear-input d-inline-block mr-1 col-lg-8 ml-2 disabled">
                          </td>
                          <td width="47.5%"></td>
                        </tr>
                      </table>
                      <table class="table table-sm table-striped" style="margin-top: -15px">
                        <tr>
                          <td width="2%"><b>I.</b></td>
                          <td width="12.5%"><b>Pasien Keluar RS/Pindah/Meninggal</b></td>
                          <td width="1.5%"><b>:</b></td>
                          <td width="16%">
                            <div class="input-group">
                              <input type="radio" name="sirs_keluar_rs" id="sirs-keluar-rs" value="keluar" class="mr-1">Keluar RS
                              <input type="radio" name="sirs_keluar_rs" id="sirs-keluar-pindah" value="pindah" class="mr-1 ml-2">Pindah
                              <input type="radio" name="sirs_keluar_rs" id="sirs-keluar-meninggal" value="meninggal" class="mr-1 ml-2">Meninggal
                            </div>
                          </td>
                          <td width="1%"></td>
                          <td width="8%">Tanggal Keluar
                          </td>
                          <td width="1.5%">:</td>
                          <td width="10%"><input type="text" class="custom-form clear-input d-inline-block mr-1 col-lg-8 ml-2" name="sirs_tanggal_keluars" id="sirs-tanggal-keluars" placeholder="dd/mm/yyyy"></td>
                          <td width="24.45%"></td>
                          <td width="24.45%"></td>
                        </tr>
                        <tr>
                          <td width="2%"></td>
                          <td width="12.5%">Sebab Keluar</td>
                          <td width="1.5%">:</td>
                          <td width="16%">
                            <input type="text" name="sirs_sebab_keluar" id="sirs-sebab-keluar" class="custom-form clear-input d-inline-block col-lg-8">
                          </td>
                          <td width="1%"></td>
                          <td width="8%"></td>
                          <td width="1.5%"></td>
                          <td width="10%"></td>
                          <td width="24.45%"></td>
                          <td width="24.45%"></td>
                        </tr>
                        <tr>
                          <td width="2%"></td>
                          <td width="12.5%">Diagnosis Akhir</td>
                          <td width="1.5%">:</td>
                          <td width="16%">
                            <input type="text" name="sirs_diagnosis_akhir" id="sirs-diagnosis-akhir" class="custom-form clear-input d-inline-block col-lg-8">
                          </td>
                          <td width="1%"></td>
                          <td width="8%"></td>
                          <td width="1.5%"></td>
                          <td width="10%"></td>
                          <td width="24.45%"></td>
                          <td width="24.45%"></td>
                        </tr>
                      </table>
                      <table class="table table-sm table-striped" style="margin-top: -15px">
                        <tr>
                          <td width="7%"><b><u>Catatan :</u></b></td>
                          <td width="1.5%"></td>
                          <td width="91.5%"></td>
                        </tr>
                      </table>
                      <table class="table table-sm table-striped" style="margin-top: -15px">
                        <tr>
                          <td width="0.5%"></td>
                          <td width="1.5%">1.</td>
                          <td width="98%">Formulir ini harus ada pada Rekam Medis Pasien
                          </td>
                        </tr>
                        <tr>
                          <td width="0.5%"></td>
                          <td width="1.5%">2.</td>
                          <td width="98%">Diisi oleh perawat yang bertanggung jawab pasien
                            tersebut</td>
                        </tr>
                        <tr>
                          <td width="0.5%"></td>
                          <td width="1.5%">2.</td>
                          <td width="98%">Diisi oleh perawat yang bertanggung jawab pasien
                            tersebut</td>
                        </tr>
                        <tr>
                          <td width="0.5%"></td>
                          <td width="1.5%">3.</td>
                          <td width="98%">Diperiksa oleh IPCN-Link</td>
                        </tr>
                        <tr>
                          <td width="0.5%"></td>
                          <td width="1.5%">4.</td>
                          <td width="98%">Setelah pasien pulang lembar ke-1 dikirim /
                            dikumpulkan ke Komite PPI</td>
                        </tr>
                      </table>
                    </div>

                  </div>
                  <div class="row">
                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                      <tr>
                        <td colspan="3" class="center td-dark"></td>
                      </tr>
                      <tr>
                        <td width="33%" class="center">
                          Tanggal & Jam <input type="text" name="surveilans_tanggal_ttd_perawat" id="surveilans-tanggal-ttd-perawat" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="dd/mm/yyyy hh:ii">
                        </td>
                        <td width="33%">
                        </td>
                        <td width="33%" class="center">
                          Tanggal & Jam <input type="text" name="surveilans_tanggal_ttd_ipcn" id="surveilans-tanggal-ttd-ipcn" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="dd/mm/yyyy hh:ii">
                        </td>
                      </tr>
                      <tr>
                        <td class="center">Perawat,</td>
                        <td></td>
                        <td class="center">IPCN-Link</td>
                      </tr>
                      <tr>
                        <td class="center"><input type="text" name="surveilans_perawat" id="surveilans-perawat" class="select2c-input ml-2"></td>
                        <td></td>
                        <td class="center"><input type="text" name="surveilans_ipcn" id="surveilans-ipcn" class="select2c-input ml-2"></td>
                      </tr>
                      <tr>
                        <td class="center">
                          Nama Jelas & Tanda Tangan
                        </td>
                        <td class="center">
                        </td>
                        <td class="center">
                          Nama Jelas & Tanda Tangan
                        </td>
                      </tr>
                      <tr>
                        <td class="center">
                          <input type="checkbox" name="surveilans_petugas" id="surveilans-ttd-petugas" value="1" class="custom-form col-lg-1 mx-auto">
                          <?= digitalSignature('surveilans_ttd_petugas_verified') ?>
                        </td>
                        <td class="center">
                        </td>
                        <td class="center">
                          <input type="checkbox" name="surveilans_ipcn_link" id="surveilans-ipcn-link" value="1" class="custom-form col-lg-1 mx-auto">
                          <?= digitalSignature('surveilans_ttd_ipcnlink_verified') ?>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              <!-- End Surveilans Infeksi Rumah Sakit-->

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

<!-- Modal Edit Pemasangan Alat -->
<div class="modal fade" id="modal_edit_pemasangan_alat" role="dialog" data-backdrop="static" aria-labelledby="modal-resume-keperawatan-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" style="max-width: 50%;">
    <div class="modal-content">
      <div class="modal-header">
        <div class="title">
          <h5 class="modal-title bold" id="modal_edit_pemasangan_alat">Edit Pemasangan Alat</h5>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-edit-pemasangan-alat">
          <input type="hidden" name="sirs_edit_id" id="sirs-edit-id">
          <table class="table table-sm table-striped" style="margin-top: -15px">
            <tr>
              <td width="4%"></td>
              <td>Tindakan</td>
              <td>:</td>
              <td><input type="text" name="pasang_sirs_tindakan_edit" id="sirs-tindakan-edit" class="clear-input d-inline-block ml-2"></td>
              <td>Lokasi</td>
              <td>:</td>
              <td><input type="text" name="sirs_lokasi_edit" id="sirs-lokasi-edit" class="custom-form clear-input d-inline-block col-lg-8 ml-2">
              </td>

            </tr>
            <tr>
              <td width="4%"></td>
              <td>Tanggal Pasang</td>
              <td>:</td>
              <td><input type="text" class="custom-form clear-input d-inline-block col-lg-5 ml-2" name="sirs_tanggal_pasang_edit" id="sirs-tanggal-pasang-edit" placeholder="dd/mm/yyyy"></td>
              <td>Tanggal Lepas</td>
              <td>:</td>
              <td><input type="text" class="custom-form clear-input d-inline-block col-lg-5 ml-2" name="sirs_tanggal_lepas_edit" id="sirs-tanggal-lepas-edit" placeholder="dd/mm/yyyy"></td>
            </tr>
            <tr>
              <td width="4%"></td>
              <td>Alasan Pasang</td>
              <td>:</td>
              <td>
                <div class="form-group tight">
                  <textarea name="sirs_alasan_pasang_edit" id="sirs-alasan-pasang-edit" class="form-control clear-input d-inline-block col-lg-8 ml-2" rows="4"></textarea>
                </div>
              </td>
              <td>Alasan Lepas</td>
              <td>:</td>
              <td>
                <div class="form-group tight">
                  <textarea name="sirs_alasan_lepas_edit" id="sirs-alasan-lepas-edit" class="form-control clear-input d-inline-block col-lg-8 ml-2" rows="4"></textarea>
                </div>
              </td>
            </tr>
            <tr>
              <td width="4%"></td>
              <td>Nama Jelas Pemasang Alat</td>
              <td>:</td>
              <td>
                <div class="form-group tight">
                  <input type="text" name="sirs_perawat_pasang_edit" id="sirs-perawat-pasang-edit" class="select2c-input ml-2">
                </div>
              </td>
              <td>Nama Jelas Pelepas Alat</td>
              <td>:</td>
              <td>
                <div class="form-group tight">
                  <input type="text" name="sirs_perawat_lepas_edit" id="sirs-perawat-lepas-edit" class="select2c-input ml-2">
                </div>
              </td>
            </tr>
          </table>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Batal</button>
        <button id="btn-simpan" type="button" class="btn btn-info" onclick="simpanEditDataPasang()"><i class="fas fa-fw fa-save mr-1"></i>Edit</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Edit Pemasangan Alat -->