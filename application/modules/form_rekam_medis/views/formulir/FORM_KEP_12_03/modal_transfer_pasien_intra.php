<!-- <style type="text/css">td {border: solid 1px;}</style> -->
<!-- Modal Entri Keperawatan -->
<div class="modal fade" id="modal_entri_keperawatan_rm" role="dialog" data-backdrop="static" aria-labelledby="modal-resume-keperawatan-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
    <div class="modal-content">
      <div class="modal-header">
        <div class="title">
          <h5 class="modal-title bold" id="modal_entri_keperawatan_rm">TRANSFER PASIEN INTRA RUMAH SAKIT</h5>
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

              <!-- TRANSFER PASIEN INTRA RUMAH SAKIT -->
              <div class="form-transfer-pasien-intra-rs">
                <div class="row">
                  <div class="col-lg-12">
                    <!-- <h5 class="center"><b>TRANSFER PASIEN INTRA RUMAH SAKIT</b></h5> -->
                    <table class="table table-sm table-striped" style="margin-top: -15px">
                      <tr>
                        <td colspan="3">
                          <button class="btn btn-info btn-xs mr-1 float-left" type="button" id="tf_btn_expand_all"><i class="fas fa-fw fa-expand mr-1"></i>Expand
                            All</button>
                          <button class="btn btn-warning btn-xs mr-1 float-left" type="button" id="tf_btn_collapse_all"><i class="fas fa-fw fa-compress mr-1"></i>Collapse
                            All</button>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="box-well shadow">
                      <div class="widget-body">
                        <div id="wizard-transfer-group">
                          <ol>
                            <li>ENTRI TRANSFER</li>
                            <li>DATA TRANSFER</li>
                          </ol>
                          <div class="form-transfer-pasien-rs">
                            <div class="row">
                              <div class="col-lg-12">
                                <table class="table table-sm table-striped" style="margin-top: -15px">
                                  <tr>
                                    <td width="1%"></td>
                                    <td width="15%"><b>Tanggal dan Jam Masuk</b></td>
                                    <td width="1%">:</td>
                                    <td width="25%">
                                      <div class="input-group">
                                        <input type="text" name="tpi_tanggal_masuk" id="tpi_tanggal_masuk" class="custom-form clear-input d-inline-block col-lg-11" placeholder="dd/mm/yyyy hh:ii">
                                      </div>
                                    </td>
                                    <td width="1%"></td>
                                    <td width="15%"><b>Tanggal dan Jam Pindah </b></td>
                                    <td width="1%">:</td>
                                    <td width="45%">
                                      <div class="input-group">
                                        <input type="text" name="tpi_tanggal_pindah" id="tpi_tanggal_pindah" class="custom-form clear-input d-inline-block col-lg-6" placeholder="dd/mm/yyyy hh:ii">
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td></td>
                                    <td><b>Ruang Asal</b></td>
                                    <td>:</td>
                                    <td>
                                      <div class="input-group">
                                        <input type="text" name="tpi_ruang_asal" id="tpi_ruang_asal" class="custom-form clear-input d-inline-block col-lg-11" placeholder="Ruang Asal Pasien">
                                      </div>
                                    </td>
                                    <td></td>
                                    <td><b>Tujuan Ruang Rawat Selanjutnya</b></td>
                                    <td>:</td>
                                    <td>
                                      <div class="input-group">
                                        <input type="text" name="tpi_ruang_tujuan" id="tpi_ruang_tujuan" class="custom-form clear-input d-inline-block col-lg-6" placeholder="Tujuan Ruang Selanjutnya">
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td></td>
                                    <td><b>Diagnosis Utama</b></td>
                                    <td>:</td>
                                    <td>
                                      <div class="input-group">
                                        <textarea name="tpi_diagnosis_utama" id="tpi_diagnosis_utama" class="form-control clear-input d-inline-block col-lg-11" rows="2"></textarea>
                                      </div>
                                    </td>
                                    <td></td>
                                    <td><b>Diagnosis Sekunder</b></td>
                                    <td>:</td>
                                    <td>
                                      <div class="input-group">
                                        <textarea name="tpi_diagnosis_sekunder" id="tpi_diagnosis_sekunder" class="form-control clear-input d-inline-block col-lg-6" rows="2"></textarea>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td></td>
                                    <td><b>DPJP</b></td>
                                    <td>:</td>
                                    <td>
                                      <div class="input-group">
                                        <input type="text" name="tpi_dpjp" id="tpi_dpjp" class="select2c-input">
                                      </div>
                                    </td>
                                    <td></td>
                                    <td><b>Kewaspadaan</b></td>
                                    <td>:</td>
                                    <td>
                                      <div class="input-group">
                                        <input type="radio" name="tpi_kewaspadaan" id="tpi_kewaspadaan_precaution" value="1" class="mr-1"> Precaution standar
                                        <input type="radio" name="tpi_kewaspadaan" id="tpi_kewaspadaan_contac" value="2" class="mr-1 ml-2">Contac
                                        <input type="radio" name="tpi_kewaspadaan" id="tpi_kewaspadaan_airbone" value="3" class="mr-1 ml-2">Airbone
                                        <input type="radio" name="tpi_kewaspadaan" id="tpi_kewaspadaan_droplet" value="4" class="mr-1 ml-2">Droplet
                                        <input type="radio" name="tpi_kewaspadaan" id="tpi_kewaspadaan_lain" value="5" class="mr-1 ml-2">Lainnya
                                        <input type="text" name="tpi_riwayat_kewaspadan" id="tpi_riwayat_kewaspadan" class="custom-form clear-input d-inline-block col-lg-3 ml-2" disabled placeholder="Jelaskan...">
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td></td>
                                    <td><b>Indikasi Masuk RS</b></td>
                                    <td>:</td>
                                    <td>
                                      <div class="input-group">
                                        <input type="text" name="tpi_indikasi_masuk_rs" id="tpi_indikasi_masuk_rs" class="custom-form clear-input d-inline-block col-lg-11" placeholder="Indikasi Masuk RS">
                                      </div>
                                    </td>
                                    <td></td>
                                    <td><b>Riwayat Kesehatan</b></td>
                                    <td>:</td>
                                    <td>
                                      <div class="input-group">
                                        <input type="text" name="tpi_riwayat_kesehatan" id="tpi_riwayat_kesehatan" class="custom-form clear-input d-inline-block col-lg-6" placeholder="Riwayat Kesehatan">
                                      </div>
                                    </td>
                                  </tr>
                                </table>
                              </div>
                              
                              <!-- PEMERIKSAAN FISIK DAN TANDA-TANDA VITAL -->
                              <div class="col-lg-12">
                                <table class="table table-sm table-striped" style="margin-top: -15px">
                                  <tr>
                                    <td colspan="3" class="center bold td-dark">
                                      <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-pemeriksaan-fisik-transfer"><i class="fas fa-expand mr-1"></i>Expand</button>PEMERIKSAAN FISIK DAN TANDA-TANDA VITAL
                                    </td>
                                  </tr>
                                </table>
                                <div class="collapse multi-collapse mt-2" id="data-pemeriksaan-fisik-transfer">
                                  <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                    <tr>
                                      <td width="16%" class="bold">Kesadaran</td>
                                      <td wdith="1%" class="bold">:</td>
                                      <td>
                                        <div class="input-group">
                                          <input type="checkbox" name="tpi_pf_composmentis" id="tpi_pf_composmentis" value="1" class="mr-1">Composmentis
                                          <input type="checkbox" name="tpi_pf_apatis" id="tpi_pf_apatis" value="1" class="mr-1 ml-3">Apatis
                                          <input type="checkbox" name="tpi_pf_samnolen" id="tpi_pf_samnolen" value="1" class="mr-1 ml-3">Samnolen
                                          <input type="checkbox" name="tpi_pf_sopor" id="tpi_pf_sopor" value="1" class="mr-1 ml-3">Sopor
                                          <input type="checkbox" name="tpi_pf_koma" id="tpi_pf_koma" value="1" class="mr-1 ml-3">Koma
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="bold">GCS</td>
                                      <td class="bold">:</td>
                                      <td>
                                        <div class="input-group">
                                          <span>
                                            E <input type="text" name="tpi_pf_gcs_e" id="tpi_pf_gcs_e" class="tpi_pf_gcs custom-form clear-input d-inline-block col-lg-1 mr-2" onkeypress="return hanyaAngka(event)">
                                            M <input type="text" name="tpi_pf_gcs_m" id="tpi_pf_gcs_m" class="tpi_pf_gcs custom-form clear-input d-inline-block col-lg-1 mr-2" onkeypress="return hanyaAngka(event)">
                                            V <input type="text" name="tpi_pf_gcs_v" id="tpi_pf_gcs_v" class="tpi_pf_gcs custom-form clear-input d-inline-block col-lg-1 mr-2" onkeypress="return hanyaAngka(event)">
                                            Total <input type="text" name="tpi_pf_gcs_total" id="tpi_pf_gcs_total" class="custom-form clear-input d-inline-block col-lg-2" readonly>
                                          </span>
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="bold">Afgar Score</td>
                                      <td class="bold">:</td>
                                      <td>
                                        <div class="input-group">
                                          <input type="text" name="tpi_pf_afgar_score" id="tpi_pf_afgar_score" class="custom-form clear-input d-inline-block col-lg-3">
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="bold">DJJ</td>
                                      <td class="bold">:</td>
                                      <td>
                                        <div class="input-group">
                                          <input type="text" name="tpi_pf_djj" id="tpi_pf_djj" class="custom-form clear-input d-inline-block col-lg-3">
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="bold">Tekanan Darah</td>
                                      <td class="bold">:</td>
                                      <td>
                                        <div class="input-group">
                                          <input type="text" name="tpi_pf_tensi_sis" id="tpi_pf_tensi_sis" class="custom-form clear-input d-inline-block col-lg-1" placeholder="Sistolik" onkeypress="return hanyaAngka(event)">
                                          <div class="input-group-append">
                                            <span class="input-group-custom">/</span>
                                          </div>
                                          <input type="text" name="tpi_pf_tensi_dis" id="tpi_pf_tensi_dis" class="custom-form clear-input d-inline-block col-lg-1" placeholder="Diastolik" onkeypress="return hanyaAngka(event)">
                                          <div class="input-group-append">
                                            <span class="input-group-custom">mmHg</span>
                                          </div>
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="bold">Suhu</td>
                                      <td class="bold">:</td>
                                      <td>
                                        <div class="input-group">
                                          <input type="text" name="tpi_pf_suhu" id="tpi_pf_suhu" class="custom-form clear-input d-inline-block col-lg-2" placeholder="Suhu" onkeypress="return hanyaAngka(event)">
                                          <div class="input-group-append">
                                            <span class="input-group-custom">&#8451;</span>
                                          </div>
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="bold">Nadi</td>
                                      <td class="bold">:</td>
                                      <td>
                                        <div class="input-group">
                                          <input type="text" name="tpi_pf_nadi" id="tpi_pf_nadi" class="custom-form clear-input d-inline-block col-lg-2" placeholder="Nadi" onkeypress="return hanyaAngka(event)">
                                          <div class="input-group-append">
                                            <span class="input-group-custom">x/mnt</span>
                                          </div>
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="bold">RR</td>
                                      <td class="bold">:</td>
                                      <td>
                                        <div class="input-group">
                                          <input type="text" name="tpi_pf_nafas" id="tpi_pf_nafas" class="custom-form clear-input d-inline-block col-lg-2" placeholder="RR" onkeypress="return hanyaAngka(event)">
                                          <div class="input-group-append">
                                            <span class="input-group-custom">x/mnt</span>
                                          </div>
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="bold">Pupil/Reflek Cahaya</td>
                                      <td class="bold">:</td>
                                      <td>
                                        <div class="input-group">
                                          <input type="text" name="tpi_pf_pupil_1" id="tpi_pf_pupil_1" class="custom-form clear-input d-inline-block col-lg-1" onkeypress="return hanyaAngka(event)">
                                          <div class="input-group-append">
                                            <span class="input-group-custom">mm/</span>
                                          </div>
                                          <input type="text" name="tpi_pf_pupil_2" id="tpi_pf_pupil_2" class="custom-form clear-input d-inline-block col-lg-1" onkeypress="return hanyaAngka(event)">
                                          <div class="input-group-append">
                                            <span class="input-group-custom">mm,</span>
                                          </div>
                                          <input type="text" name="tpi_pf_pupil_3" id="tpi_pf_pupil_3" class="custom-form clear-input d-inline-block col-lg-1" onkeypress="return hanyaAngka(event)">
                                          <div class="input-group-append">
                                            <span class="input-group-custom">/</span>
                                          </div>
                                          <input type="text" name="tpi_pf_pupil_4" id="tpi_pf_pupil_4" class="custom-form clear-input d-inline-block col-lg-1" onkeypress="return hanyaAngka(event)">
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="bold">Alergi</td>
                                      <td class="bold">:</td>
                                      <td>
                                        <div class="input-group">
                                          <span>
                                            <input type="radio" name="tpi_pf_alergi" id="tpi_pf_alergi_tidak" value="0" class="mr-1">Tidak
                                            <input type="radio" name="tpi_pf_alergi" id="tpi_pf_alergi_ya" value="1" class="mr-1 ml-2">Ya
                                            <input type="text" name="tpi_pf_riwayat_alergi" id="tpi_pf_riwayat_alergi" class="custom-form clear-input d-inline-block col-lg-4" disabled placeholder="Sebutkan">
                                          </span>
                                          </div>
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="bold">Skala Nyeri</td>
                                      <td class="bold">:</td>
                                      <td>
                                        <div class="input-group">
                                          <span>
                                            <input type="radio" name="tpi_pf_skala_nyeri_pasien" id="tpi_pf_skala_nyeri_pasien_tidak" value="0" class="mr-1">Tidak
                                            <input type="radio" name="tpi_pf_skala_nyeri_pasien" id="tpi_pf_skala_nyeri_pasien_ya" value="1" class="mr-1 ml-2">Ya
                                            <input type="text" name="tpi_pf_riwayat_nyeri_pasien" id="tpi_pf_riwayat_nyeri_pasien" class="custom-form clear-input d-inline-block col-lg-4" disabled placeholder="Skor Nyeri">
                                          </span>
                                          </div>
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="bold">Resiko Jatuh</td>
                                      <td class="bold">:</td>
                                      <td>
                                        <div class="input-group">
                                          <span>
                                            <input type="radio" name="tpi_pf_resiko_jatuh_pasien" id="tpi_pf_resiko_jatuh_pasien_tidak" value="0" class="mr-1">Tidak
                                            <input type="radio" name="tpi_pf_resiko_jatuh_pasien" id="tpi_pf_resiko_jatuh_pasien_ya" value="1" class="mr-1 ml-2">Ya
                                            <input type="text" name="tpi_pf_riwayat_resiko_jatuh_pasien" id="tpi_pf_riwayat_resiko_jatuh_pasien" class="custom-form clear-input d-inline-block col-lg-4" disabled placeholder="Ringan/Sedang/Berat">
                                          </span>
                                          </div>
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="bold">Mobilisasi</td>
                                      <td class="bold">:</td>
                                      <td>
                                        <div class="input-group">
                                          <span>
                                            <input type="radio" name="tpi_pf_mobilisasi_pasien" id="tpi_pf_mobilisasi_pasien_jalan" value="0" class="mr-1">Jalan
                                            <input type="radio" name="tpi_pf_mobilisasi_pasien" id="tpi_pf_mobilisasi_pasien_duduk" value="1" class="mr-1 ml-2">Duduk
                                            <input type="radio" name="tpi_pf_mobilisasi_pasien" id="tpi_pf_mobilisasi_pasien_tirah_barang" value="2" class="mr-1 ml-2">Tirah Barang
                                          </span>
                                          </div>
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="bold">Mobilisasi Saat Transfer</td>
                                      <td class="bold">:</td>
                                      <td>
                                        <div class="input-group">
                                          <span>
                                            <input type="radio" name="tpi_pf_mobilisasi_pasien_transfer" id="tpi_pf_mobilisasi_pasien_transfer_mandiri" value="0" class="mr-1">Mandiri
                                            <input type="radio" name="tpi_pf_mobilisasi_pasien_transfer" id="tpi_pf_mobilisasi_pasien_transfer_dibantu_sebagian" value="1" class="mr-1 ml-2">Dibantu Sebagian
                                            <input type="radio" name="tpi_pf_mobilisasi_pasien_transfer" id="tpi_pf_mobilisasi_pasien_transfer_tirah_diabantu_penuh" value="2" class="mr-1 ml-2">Dibantu Penuh
                                          </span>
                                          </div>
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="bold">Resiko Dekubitus</td>
                                      <td class="bold">:</td>
                                      <td>
                                        <div class="input-group">
                                          <span>
                                            <input type="radio" name="tpi_pf_resiko_dekubitus_pasien" id="tpi_pf_resiko_dekubitus_pasien_tidak" value="0" class="mr-1">Tidak
                                            <input type="radio" name="tpi_pf_resiko_dekubitus_pasien" id="tpi_pf_resiko_dekubitus_pasien_ya" value="1" class="mr-1 ml-2">Ya
                                            <input type="text" name="tpi_pf_riwayat_resiko_dekubitus_pasien" id="tpi_pf_riwayat_resiko_dekubitus_pasien" class="custom-form clear-input d-inline-block col-lg-4" disabled placeholder="Jelaskan..">
                                          </span>
                                          </div>
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="bold">Pasien Memakai Peralatan Medis</td>
                                      <td class="bold">:</td>
                                      <td>
                                        <div class="input-group">
                                          <input type="checkbox" name="tpi_pf_infus" id="tpi_pf_infus" value="1" class="mr-1">Infus
                                          <input type="text" name="tpi_pf_tanggal_infus" id="tpi_pf_tanggal_infus" class="custom-form clear-input d-inline-block col-lg-1 ml-1" disabled placeholder="dd/mm/yy">
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td colspan="2"></td>
                                      <td>
                                        <div class="input-group">
                                          <input type="checkbox" name="tpi_pf_ngt_pasien" id="tpi_pf_ngt_pasien" value="1" class="mr-1">NGT
                                          <input type="text" name="tpi_pf_tanggal_ngt" id="tpi_pf_tanggal_ngt" class="custom-form clear-input d-inline-block col-lg-1 ml-1" disabled placeholder="dd/mm/yy">    
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td colspan="2"></td>
                                      <td>
                                        <div class="input-group">
                                          <input type="checkbox" name="tpi_pf_ett" id="tpi_pf_ett" value="1" class="mr-1">ETT
                                          <input type="text" name="tpi_pf_tanggal_ett" id="tpi_pf_tanggal_ett" class="custom-form clear-input d-inline-block col-lg-1 ml-1" disabled placeholder="dd/mm/yy">
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td colspan="2"></td>
                                      <td>
                                        <div class="input-group">
                                          <input type="checkbox" name="tpi_pf_cdl" id="tpi_pf_cdl" value="1" class="mr-1">CDL
                                          <input type="text" name="tpi_pf_tanggal_cdl" id="tpi_pf_tanggal_cdl" class="custom-form clear-input d-inline-block col-lg-1 ml-1" disabled placeholder="dd/mm/yy">
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td colspan="2"></td>
                                      <td>
                                        <div class="input-group">
                                          <input type="checkbox" name="tpi_pf_cvc" id="tpi_pf_cvc" value="1" class="mr-1">CVC
                                          <input type="text" name="tpi_pf_tanggal_cvc" id="tpi_pf_tanggal_cvc" class="custom-form clear-input d-inline-block col-lg-1 ml-1" disabled placeholder="dd/mm/yy">
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td colspan="2"></td>
                                      <td>
                                        <div class="input-group">
                                          <input type="checkbox" name="tpi_pf_dc" id="tpi_pf_dc" value="1" class="mr-1">DC
                                          <input type="text" name="tpi_pf_tanggal_dc" id="tpi_pf_tanggal_dc" class="custom-form clear-input d-inline-block col-lg-1 ml-1" disabled placeholder="dd/mm/yy">
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td colspan="2"></td>
                                      <td>
                                        <div class="input-group">
                                          <input type="checkbox" name="tpi_pf_lain" id="tpi_pf_lain" value="1" class="mr-1">Lain-lain
                                          <input type="text" name="tpi_pf_tanggal_lain" id="tpi_pf_tanggal_lain" class="custom-form clear-input d-inline-block col-lg-1 ml-1" disabled placeholder="dd/mm/yy">
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td colspan="2"></td>
                                      <td>
                                        <div class="input-group">
                                            <input type="checkbox" name="tpi_pf_oksigen" id="tpi_pf_oksigen" value="1" class="mr-1">Oksigen
                                            <input type="text" name="tpi_pf_keterangan_oksigen" id="tpi_pf_keterangan_oksigen" class="custom-form clear-input d-inline-block col-lg-1 ml-1" disabled onkeypress="return hanyaAngka(event)"><span class="input-group-custom">lpm</span>
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td colspan="2"></td>
                                      <td>
                                        <div class="input-group">
                                          <input type="checkbox" name="tpi_pf_pump" id="tpi_pf_pump" value="1" class="mr-1">Pump
                                          <input type="checkbox" name="tpi_pf_bidai" id="tpi_pf_bidai" value="1" class="mr-1 ml-2">Bidai
                                        </div>
                                      </td>
                                    </tr>
                                  </table>
                                </div>
                              </div>
                              
                              <!-- PEMBERIAN THERAPHY -->
                              <div class="col-lg-12">
                                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                  <tr>
                                    <td colspan="3" class="center bold td-dark">
                                      <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-pemberian-therapy"><i class="fas fa-expand mr-1"></i>Expand</button>PEMBERIAN THERAPHY
                                    </td>
                                  </tr>
                                </table>
                                <div class="collapse multi-collapse mt-2" id="data-pemberian-therapy">
                                  <div class="row">
                                    <div class="col-lg-12">
                                      <table class="table table-sm table-striped" style="margin-top: -15px">
                                        <tr>
                                          <td width="1%"></td>
                                          <td width="15%"><b>Infus</b></td>
                                          <td width="1%"><b>:</b></td>
                                          <td>
                                            <div class="form-group tight">
                                              <textarea name="tpi_pt_infus" id="tpi_pt_infus" class="form-control clear-input d-inline-block col-lg-8 ml-2" rows="2"></textarea>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td></td>
                                          <td><b>Obat-obatan</b></td>
                                          <td><b>:</b></td>
                                          <td>
                                            <div class="form-group tight">
                                              <textarea name="tpi_pt_obat" id="tpi_pt_obat" class="form-control clear-input d-inline-block col-lg-8 ml-2" rows="3" placeholder="Jelaskan penggunaan obat.."></textarea>
                                            </div>
                                          </td>
                                        </tr>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              
                              <!-- PEMERIKSAAN PENUNJANG -->
                              <div class="col-lg-12">
                                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                  <tr>
                                    <td colspan="3" class="center bold td-dark">
                                      <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-pemeriksaan-penunjang"><i class="fas fa-expand mr-1"></i>Expand</button>PEMERIKSAAN
                                      PENUNJANG
                                    </td>
                                  </tr>
                                </table>
                                <div class="collapse multi-collapse mt-2" id="data-pemeriksaan-penunjang">
                                  <div class="row">
                                    <div class="col-lg-12">
                                      <table class="table table-sm table-striped" style="margin-top: -15px">
                                        <tr>
                                          <td width="1%">
                                          </td>
                                          <td>
                                            <div class="input-group">
                                              <input type="checkbox" name="tpi_pp_labolatorium" id="tpi_pp_labolatorium" value="1" class="mr-1">Laboratorium
                                              <input type="text" name="tpi_pp_ket_labolatorium" id="tpi_pp_ket_labolatorium" class="custom-form clear-input d-inline-block col-lg-8 ml-2" disabled>
                                            </div>
                                          </td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td>
                                            <div class="input-group">
                                              <input type="checkbox" name="tpi_pp_radiologi" id="tpi_pp_radiologi" value="1" class="mr-1 ml-2">Radiologi
                                              <input type="text" name="tpi_pp_ket_radiologi" id="tpi_pp_ket_radiologi" class="custom-form clear-input d-inline-block col-lg-8 ml-2" disabled>
                                          </td>
                                          <td></td>
                                          <td></td>
                                          <td></td>

                                          <td>
                                            <div class="input-group">
                                              <input type="checkbox" name="tpi_pp_lainnya" id="tpi_pp_lainnya" value="1" class="mr-1 ml-2">Lain-Lainnya
                                              <input type="text" name="tpi_pp_ket_lainnya" id="tpi_pp_ket_lainnya" class="custom-form clear-input d-inline-block col-lg-8 ml-2" disabled>
                                          </td>
                                        </tr>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <!-- TINDAKAN MEDIS YANG SUDAH DILAKUKAN -->
                              <div class="col-lg-12">
                                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                  <tr>
                                    <td colspan="3" class="center bold td-dark">
                                      <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-tindakan-medis-tf"><i class="fas fa-expand mr-1"></i>Expand</button>TINDAKAN
                                      MEDIS YANG SUDAH DILAKUKAN
                                    </td>
                                  </tr>
                                </table>
                                <div class="collapse multi-collapse mt-2" id="data-tindakan-medis-tf">
                                  <div class="row">
                                    <div class="col-lg-12">
                                      <table class="table table-sm table-striped" style="margin-top: -15px">
                                        <tr>
                                          <td>
                                            <textarea name="tpi_tm_tindakan_medis" id="tpi_tm_tindakan_medis" rows="2" class="form-control clear-input" placeholder="Tuliskan tindakan medis yang sudah dilakukan terhadap pasien"></textarea>
                                          </td>
                                        </tr>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <!-- RENCANA TINDAKAN -->
                              <div class="col-lg-12">
                                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                  <tr>
                                    <td colspan="3" class="center bold td-dark">
                                      <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-rencana-tindakan-tf"><i class="fas fa-expand mr-1"></i>Expand</button>RENCANA TINDAKAN
                                    </td>
                                  </tr>
                                </table>
                                <div class="collapse multi-collapse mt-2" id="data-rencana-tindakan-tf">
                                  <div class="row">
                                    <div class="col-lg-12">
                                      <table class="table table-sm table-striped" style="margin-top: -15px">
                                        <tr>
                                          <td>
                                            <textarea name="tpi_tm_rencana_tindakan" id="tpi_tm_rencana_tindakan" rows="2" class="form-control clear-input" placeholder="Tuliskan rencana tindakan yang akan dilakukan terhadap pasien"></textarea>
                                          </td>
                                        </tr>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <!-- KONDISI PASIEN -->
                              <div class="col-lg-12">
                                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                  <tr>
                                    <td colspan="3" class="center bold td-dark">
                                      <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-kondisi-pasien-tf"><i class="fas fa-expand mr-1"></i>Expand</button>KONDISI
                                      PASIEN
                                    </td>
                                  </tr>
                                </table>
                                <div class="collapse multi-collapse mt-2" id="data-kondisi-pasien-tf">
                                  <div class="row">
                                    <div class="col-lg-6">
                                      <table class="table table-sm table-striped" style="margin-top: -15px">
                                        <tr>
                                          <td class="center"><b>SEBELUM TRANSFER</b></td>
                                        </tr>
                                      </table>
                                      <table class="table table-sm table-striped" style="margin-top: -15px">
                                        <tr>
                                          <td width="1%"></td>
                                          <td width="25%" class="bold">Kesadaran</td>
                                          <td wdith="1%" class="bold">:</td>
                                          <td>
                                            <div class="input-group">
                                              <input type="checkbox" name="tpi_kp_sebelum_composmentis" id="tpi_kp_sebelum_composmentis" value="1" class="mr-1">Composmentis
                                              <input type="checkbox" name="tpi_kp_sebelum_apatis" id="tpi_kp_sebelum_apatis" value="1" class="mr-1 ml-2">Apatis
                                              <input type="checkbox" name="tpi_kp_sebelum_samnolen" id="tpi_kp_sebelum_samnolen" value="1" class="mr-1 ml-2">Samnolen
                                              <input type="checkbox" name="tpi_kp_sebelum_sopor" id="tpi_kp_sebelum_sopor" value="1" class="mr-1 ml-2">Sopor
                                              <input type="checkbox" name="tpi_kp_sebelum_koma" id="tpi_kp_sebelum_koma" value="1" class="mr-1 ml-2">Koma
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td width="1%"></td>
                                          <td width="25%" class="bold">GCS</td>
                                          <td wdith="1%" class="bold">:</td>
                                          <td>
                                            <div class="input-group">
                                              E <input type="text" name="tpi_kp_sebelum_gcs_e" id="tpi_kp_sebelum_gcs_e" class="tpi_kp_gcs custom-form clear-input d-inline-block col-lg-1 ml-1 mr-2" onkeypress="return hanyaAngka(event)">
                                              M <input type="text" name="tpi_kp_sebelum_gcs_m" id="tpi_kp_sebelum_gcs_m" class="tpi_kp_gcs custom-form clear-input d-inline-block col-lg-1 ml-1 mr-2" onkeypress="return hanyaAngka(event)">
                                              V <input type="text" name="tpi_kp_sebelum_gcs_v" id="tpi_kp_sebelum_gcs_v" class="tpi_kp_gcs custom-form clear-input d-inline-block col-lg-1 ml-1 mr-2" onkeypress="return hanyaAngka(event)">
                                              Total <input type="text" name="tpi_kp_sebelum_gcs_total" id="tpi_kp_sebelum_gcs_total" class="custom-form clear-input d-inline-block col-lg-2 ml-1" readonly>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td width="1%"></td>
                                          <td width="25%" class="bold">Catatan</td>
                                          <td wdith="1%" class="bold">:</td>
                                          <td>
                                            <div class="input-group">
                                              <textarea name="tpi_kp_sebelum_catatan" id="tpi_kp_sebelum_catatan" rows="2" class="form-control clear-input col-lg-10" placeholder="Catatan Pasien"></textarea>
                                            </div>
                                          </td>
                                        </tr>
                                      </table>
                                      <table class="table table-sm table-striped" style="margin-top: -15px">
                                        <tr>
                                          <td class="center"><b>PASIEN SELAMA PERJALANAN</b>
                                          </td>
                                        </tr>
                                      </table>
                                      <table class="table table-sm table-striped" style="margin-top: -15px">
                                        <tr>
                                          <td width="1%"></td>
                                          <td width="25%" class="bold">Masalah Selama Transfer</td>
                                          <td wdith="1%" class="bold">:</td>
                                          <td>
                                            <div class="input-group">
                                              <textarea name="tpi_kp_perjalanan_masalah_selama_trasnfer" id="tpi_kp_perjalanan_masalah_selama_trasnfer" rows="2" class="form-control clear-input col-lg-10"></textarea>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td width="1%"></td>
                                          <td width="25%" class="bold">Penanganan Masalah Yang Terjadi</td>
                                          <td wdith="1%" class="bold">:</td>
                                          <td>
                                            <div class="input-group">
                                              <textarea name="tpi_kp_perjalanan_penanganan_masalah" id="tpi_kp_perjalanan_penanganan_masalah" rows="2" class="form-control clear-input col-lg-10"></textarea>
                                            </div>
                                          </td>
                                        </tr>
                                      </table>
                                    </div>
                                    <div class="col-lg-6">
                                      <table class="table table-sm table-striped" style="margin-top: -15px">
                                        <tr>
                                          <td class="center"><b>SUDAH TRANSFER</b></td>
                                        </tr>
                                      </table>
                                      <table class="table table-sm table-striped" style="margin-top: -15px">
                                        <tr>
                                          <td width="1%"></td>
                                          <td width="25%" class="bold">Kesadaran</td>
                                          <td wdith="1%" class="bold">:</td>
                                          <td>
                                            <div class="input-group">
                                              <input type="checkbox" name="tpi_kp_sudah_composmentis" id="tpi_kp_sudah_composmentis" value="1" class="mr-1">Composmentis
                                              <input type="checkbox" name="tpi_kp_sudah_apatis" id="tpi_kp_sudah_apatis" value="1" class="mr-1 ml-2">Apatis
                                              <input type="checkbox" name="tpi_kp_sudah_samnolen" id="tpi_kp_sudah_samnolen" value="1" class="mr-1 ml-2">Samnolen
                                              <input type="checkbox" name="tpi_kp_sudah_sopor" id="tpi_kp_sudah_sopor" value="1" class="mr-1 ml-2">Sopor
                                              <input type="checkbox" name="tpi_kp_sudah_koma" id="tpi_kp_sudah_koma" value="1" class="mr-1 ml-2">Koma
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td width="1%"></td>
                                          <td width="25%" class="bold">GCS</td>
                                          <td wdith="1%" class="bold">:</td>
                                          <td>
                                            <div class="input-group">
                                              E <input type="text" name="tpi_kp_sudah_gcs_e" id="tpi_kp_sudah_gcs_e" class="tpi_kp_sudah_gcs custom-form clear-input d-inline-block col-lg-1 ml-1 mr-2" onkeypress="return hanyaAngka(event)">
                                              M <input type="text" name="tpi_kp_sudah_gcs_m" id="tpi_kp_sudah_gcs_m" class="tpi_kp_sudah_gcs custom-form clear-input d-inline-block col-lg-1 ml-1 mr-2" onkeypress="return hanyaAngka(event)">
                                              V <input type="text" name="tpi_kp_sudah_gcs_v" id="tpi_kp_sudah_gcs_v" class="tpi_kp_sudah_gcs custom-form clear-input d-inline-block col-lg-1 ml-1 mr-2" onkeypress="return hanyaAngka(event)">
                                              Total <input type="text" name="tpi_kp_sudah_gcs_total" id="tpi_kp_sudah_gcs_total" class="custom-form clear-input d-inline-block col-lg-2 ml-1" readonly>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td width="1%"></td>
                                          <td width="25%" class="bold">Tekanan Darah</td>
                                          <td wdith="1%" class="bold">:</td>
                                          <td>
                                            <div class="input-group">
                                              <input type="text" name="tpi_kp_sudah_tensi_sis" id="tpi_kp_sudah_tensi_sis" class="custom-form clear-input d-inline-block col-lg-3" placeholder="Sistolik" onkeypress="return hanyaAngka(event)">
                                              <span>/</span>
                                              <input type="text" name="tpi_kp_sudah_tensi_dis" id="tpi_kp_sudah_tensi_dis" class="custom-form clear-input d-inline-block col-lg-3" placeholder="Diastolik" onkeypress="return hanyaAngka(event)">
                                              <div class="input-group-append">
                                                <span class="input-group-custom">mmHg</span>
                                              </div>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td width="2%"></td>
                                          <td width="15%" class="bold">Suhu</td>
                                          <td width="1%" class="bold">:</td>
                                          <td>
                                            <div class="input-group">
                                              <input type="text" name="tpi_kp_sudah_suhu" id="tpi_kp_sudah_suhu" class="custom-form clear-input d-inline-block col-lg-3" placeholder="Suhu" onkeypress="return hanyaAngka(event)">
                                              <div class="input-group-append">
                                                <span class="input-group-custom">&#8451;</span>
                                              </div>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td width="1%"></td>
                                          <td width="25%" class="bold">Nadi</td>
                                          <td class="bold">:</td>
                                          <td>
                                            <div class="input-group">
                                              <input type="text" name="tpi_kp_sudah_nadi" id="tpi_kp_sudah_nadi" class="custom-form clear-input d-inline-block col-lg-3" placeholder="Nadi" onkeypress="return hanyaAngka(event)">
                                              <div class="input-group-append">
                                                <span class="input-group-custom">x/mnt</span>
                                              </div>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td width="1%"></td>
                                          <td width="25%" class="bold">RR</td>
                                          <td width="1%" class="bold">:</td>
                                          <td>
                                            <div class="input-group">
                                              <input type="text" name="tpi_kp_sudah_pernafasan" id="tpi_kp_sudah_pernafasan" class="custom-form clear-input d-inline-block col-lg-3" placeholder="RR" onkeypress="return hanyaAngka(event)">
                                              <div class="input-group-append">
                                                <span class="input-group-custom">x/mnt</span>
                                              </div>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td width="2%"></td>
                                          <td width="15%" class="bold">Kondisi Pasien</td>
                                          <td width="1%" class="bold">:</td>
                                          <td>
                                            <div class="input-group">
                                              <input type="radio" name="tpi_kp_sudah_kondisi_pasien" id="tpi_kp_sudah_kondisi_pasien_memburuk" value="0" class="mr-1">Memburuk
                                              <input type="radio" name="tpi_kp_sudah_kondisi_pasien" id="tpi_kp_sudah_kondisi_pasien_stabil" value="1" class="mr-1 ml-2">Stabil
                                              <input type="radio" name="tpi_kp_sudah_kondisi_pasien" id="tpi_kp_sudah_kondisi_pasien_tidak_berubah" value="2" class="mr-1 ml-2">Tidak Ada Perubahan
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td width="2%"></td>
                                          <td width="15%" class="bold">Nama Obat</td>
                                          <td wdith="1%" class="bold">:</td>
                                          <td>
                                            <div class="input-group">
                                              <input type="radio" name="tpi_kp_sudah_nama_obat" id="tpi_kp_sudah_nama_obat_komplit" value="0" class="mr-1">Komplit
                                              <input type="radio" name="tpi_kp_sudah_nama_obat" id="tpi_kp_sudah_nama_obat_lainnya" value="1" class="mr-1 ml-2">Lain-lain
                                              <input type="text" name="tpi_kp_sudah_ket_nama_obat" id="tpi_kp_sudah_ket_nama_obat" class="custom-form clear-input d-inline-block col-lg-4 ml-1" disabled placeholder="Lain-lain">
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td width="2%"></td>
                                          <td width="15%" class="bold">Pemeriksaan Penunjang</td>
                                          <td wdith="1%" class="bold">:</td>
                                          <td>
                                            <div class="input-group">
                                              <input type="radio" name="tpi_kp_sudah_pemeriksaan_penunjang" id="tpi_kp_sudah_pemeriksaan_penunjang_komplit" value="0" class="mr-1">Komplit
                                              <input type="radio" name="tpi_kp_sudah_pemeriksaan_penunjang" id="tpi_kp_sudah_pemeriksaan_penunjang_lainnya" value="1" class="mr-1 ml-2">Lain-lain
                                              <input type="text" name="tpi_kp_sudah_ket_pemeriksaan_penunjang" id="tpi_kp_sudah_ket_pemeriksaan_penunjang" class="custom-form clear-input d-inline-block col-lg-4 ml-1" disabled placeholder="Lain-lain">
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td width="1%"></td>
                                          <td width="25%" class="bold">Catatan Penting</td>
                                          <td wdith="1%" class="bold">:</td>
                                          <td>
                                            <div class="input-group">
                                              <textarea name="tpi_kp_sudah_catatan_penting" id="tpi_kp_sudah_catatan_penting" rows="2" class="form-control clear-input col-lg-10" placeholder="Tuliskan catatan penting tentang pasien"></textarea>
                                            </div>
                                          </td>
                                        </tr>
                                      </table>
                                    </div>
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                      <tr>
                                        <td colspan="3" class="center td-dark"></td>
                                      </tr>
                                      <tr>
                                        <td width="33%" class="center">Tanggal & Jam
                                          <input type="text" name="tpi_kp_waktu_ttd_petugas_tf" id="tpi_kp_waktu_ttd_petugas_tf" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="dd/mm/yyyy hh:ii">
                                        </td>
                                        <td width="33%">
                                        </td>
                                        <td width="33%" class="center">Tanggal & Jam
                                          <input type="text" name="tpi_kp_waktu_ttd_petugas_penerima" id="tpi_kp_waktu_ttd_petugas_penerima" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="dd/mm/yyyy hh:ii">
                                        </td>
                                      </tr>
                                      <tr>
                                        <td class="center">Petugas Yang Melakukan Transfer,</td>
                                        <td></td>
                                        <td class="center">Petugas Yang Menerima,</td>
                                      </tr>
                                      <tr>
                                        <td class="center"><input type="text" name="tpi_kp_petugas_tansfer" id="tpi_kp_petugas_tansfer" class="select2c-input ml-2"></td>
                                        <td></td>
                                        <td class="center"><input type="text" name="tpi_kp_petugas_terima_transfer" id="tpi_kp_petugas_terima_transfer" class="select2c-input ml-2"></td>
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
                                          <input type="checkbox" name="tpi_kp_ttd_petugas_transfer" id="tpi_kp_ttd_petugas_transfer" value="1" class="custom-form col-lg-1 mx-auto">
                                        </td>
                                        <td class="center">
                                        </td>
                                        <td class="center">
                                          <input type="checkbox" name="tpi_kp_ttd_petugas_terima_transfer" id="tpi_kp_ttd_petugas_terima_transfer" value="1" class="custom-form col-lg-1 mx-auto">
                                        </td>
                                      </tr>
                                    </table>
                                  </div>
                                </div>
                              </div>

                              <!-- KONDISI PASIEN SESUDAH TINDAKAN -->
                              <div class="col-lg-12">
                                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                  <tr>
                                    <td colspan="3" class="center bold td-dark">
                                      <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-kondisi-pasien-setelah-tindakan"><i class="fas fa-expand mr-1"></i>Expand</button>KONDISI PASIEN SESUDAH TINDAKAN
                                    </td>
                                  </tr>
                                </table>
                                <div class="collapse multi-collapse mt-2" id="data-kondisi-pasien-setelah-tindakan">
                                  <div class="row">
                                    <div class="col-lg-6">
                                      <table class="table table-sm table-striped" style="margin-top: -15px">
                                        <tr>
                                          <td class="center"><b>SEBELUM TRANSFER</b></td>
                                        </tr>
                                      </table>
                                      <table class="table table-sm table-striped" style="margin-top: -15px">
                                        <tr>
                                          <td width="1%"></td>
                                          <td width="25%" class="bold">Kesadaran</td>
                                          <td wdith="1%" class="bold">:</td>
                                          <td>
                                            <div class="input-group">
                                              <input type="checkbox" name="tpi_st_sebelum_composmentis" id="tpi_st_sebelum_composmentis" value="1" class="mr-1">Composmentis
                                              <input type="checkbox" name="tpi_st_sebelum_apatis" id="tpi_st_sebelum_apatis" value="1" class="mr-1 ml-2">Apatis
                                              <input type="checkbox" name="tpi_st_sebelum_samnolen" id="tpi_st_sebelum_samnolen" value="1" class="mr-1 ml-2">Samnolen
                                              <input type="checkbox" name="tpi_st_sebelum_sopor" id="tpi_st_sebelum_sopor" value="1" class="mr-1 ml-2">Sopor
                                              <input type="checkbox" name="tpi_st_sebelum_koma" id="tpi_st_sebelum_koma" value="1" class="mr-1 ml-2">Koma
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td width="1%"></td>
                                          <td width="25%" class="bold">GCS</td>
                                          <td wdith="1%" class="bold">:</td>
                                          <td>
                                            <div class="input-group">
                                              E <input type="text" name="tpi_st_sebelum_gcs_e" id="tpi_st_sebelum_gcs_e" class="tpi_st_gcs custom-form clear-input d-inline-block col-lg-1 ml-1 mr-2" onkeypress="return hanyaAngka(event)">
                                              M <input type="text" name="tpi_st_sebelum_gcs_m" id="tpi_st_sebelum_gcs_m" class="tpi_st_gcs custom-form clear-input d-inline-block col-lg-1 ml-1 mr-2" onkeypress="return hanyaAngka(event)">
                                              V <input type="text" name="tpi_st_sebelum_gcs_v" id="tpi_st_sebelum_gcs_v" class="tpi_st_gcs custom-form clear-input d-inline-block col-lg-1 ml-1 mr-2" onkeypress="return hanyaAngka(event)">
                                              Total <input type="text" name="tpi_st_sebelum_gcs_total" id="tpi_st_sebelum_gcs_total" class="custom-form clear-input d-inline-block col-lg-2 ml-1" readonly>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td width="1%"></td>
                                          <td width="25%" class="bold">Tekanan Darah</td>
                                          <td wdith="1%" class="bold">:</td>
                                          <td>
                                            <div class="input-group">
                                              <input type="text" name="tpi_st_sebelum_tensi_sis" id="tpi_st_sebelum_tensi_sis" class="custom-form clear-input d-inline-block col-lg-3" placeholder="Sistolik" onkeypress="return hanyaAngka(event)">
                                              <span>/</span>
                                              <input type="text" name="tpi_st_sebelum_tensi_dis" id="tpi_st_sebelum_tensi_dis" class="custom-form clear-input d-inline-block col-lg-3" placeholder="Diastolik" onkeypress="return hanyaAngka(event)">
                                              <div class="input-group-append">
                                                <span class="input-group-custom">mmHg</span>
                                              </div>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td width="2%"></td>
                                          <td width="15%" class="bold">Suhu</td>
                                          <td width="1%" class="bold">:</td>
                                          <td>
                                            <div class="input-group">
                                              <input type="text" name="tpi_st_sebelum_suhu" id="tpi_st_sebelum_suhu" class="custom-form clear-input d-inline-block col-lg-3" placeholder="Suhu" onkeypress="return hanyaAngka(event)">
                                              <div class="input-group-append">
                                                <span class="input-group-custom">&#8451;</span>
                                              </div>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td width="1%"></td>
                                          <td width="25%" class="bold">Nadi</td>
                                          <td class="bold">:</td>
                                          <td>
                                            <div class="input-group">
                                              <input type="text" name="tpi_st_sebelum_nadi" id="tpi_st_sebelum_nadi" class="custom-form clear-input d-inline-block col-lg-3" placeholder="Nadi" onkeypress="return hanyaAngka(event)">
                                              <div class="input-group-append">
                                                <span class="input-group-custom">x/mnt</span>
                                              </div>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td width="1%"></td>
                                          <td width="25%" class="bold">RR</td>
                                          <td width="1%" class="bold">:</td>
                                          <td>
                                            <div class="input-group">
                                              <input type="text" name="tpi_st_sebelum_pernafasan" id="tpi_st_sebelum_pernafasan" class="custom-form clear-input d-inline-block col-lg-3" placeholder="RR" onkeypress="return hanyaAngka(event)">
                                              <div class="input-group-append">
                                                <span class="input-group-custom">x/mnt</span>
                                              </div>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td width="1%"></td>
                                          <td width="25%" class="bold">Catatan</td>
                                          <td wdith="1%" class="bold">:</td>
                                          <td>
                                            <div class="input-group">
                                              <textarea name="tpi_st_sebelum_catatan" id="tpi_st_sebelum_catatan" rows="2" class="form-control clear-input col-lg-10" placeholder="Catatan Pasien"></textarea>
                                            </div>
                                          </td>
                                        </tr>
                                      </table>
                                      <table class="table table-sm table-striped" style="margin-top: -15px">
                                        <tr>
                                          <td class="center"><b>PASIEN SELAMA PERJALANAN</b>
                                          </td>
                                        </tr>
                                      </table>
                                      <table class="table table-sm table-striped" style="margin-top: -15px">
                                        <tr>
                                          <td width="1%"></td>
                                          <td width="25%" class="bold">Masalah Selama Transfer</td>
                                          <td wdith="1%" class="bold">:</td>
                                          <td>
                                            <div class="input-group">
                                              <textarea name="tpi_st_perjalanan_masalah_selama_transfer" id="tpi_st_perjalanan_masalah_selama_transfer" rows="2" class="form-control clear-input col-lg-10"></textarea>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td width="1%"></td>
                                          <td width="25%" class="bold">Penanganan Masalah Yang Terjadi</td>
                                          <td wdith="1%" class="bold">:</td>
                                          <td>
                                            <div class="input-group">
                                              <textarea name="tpi_st_perjalanan_penanganan_masalah" id="tpi_st_perjalanan_penanganan_masalah" rows="2" class="form-control clear-input col-lg-10"></textarea>
                                            </div>
                                          </td>
                                        </tr>
                                      </table>
                                    </div>
                                    <div class="col-lg-6">
                                      <table class="table table-sm table-striped" style="margin-top: -15px">
                                        <tr>
                                          <td class="center"><b>SUDAH TRANSFER</b></td>
                                        </tr>
                                      </table>
                                      <table class="table table-sm table-striped" style="margin-top: -15px">
                                        <tr>
                                          <td width="1%"></td>
                                          <td width="25%" class="bold">Kesadaran</td>
                                          <td wdith="1%" class="bold">:</td>
                                          <td>
                                            <div class="input-group">
                                              <input type="checkbox" name="tpi_st_sudah_composmentis" id="tpi_st_sudah_composmentis" value="1" class="mr-1">Composmentis
                                              <input type="checkbox" name="tpi_st_sudah_apatis" id="tpi_st_sudah_apatis" value="1" class="mr-1 ml-2">Apatis
                                              <input type="checkbox" name="tpi_st_sudah_samnolen" id="tpi_st_sudah_samnolen" value="1" class="mr-1 ml-2">Samnolen
                                              <input type="checkbox" name="tpi_st_sudah_sopor" id="tpi_st_sudah_sopor" value="1" class="mr-1 ml-2">Sopor
                                              <input type="checkbox" name="tpi_st_sudah_koma" id="tpi_st_sudah_koma" value="1" class="mr-1 ml-2">Koma
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td width="1%"></td>
                                          <td width="25%" class="bold">GCS</td>
                                          <td wdith="1%" class="bold">:</td>
                                          <td>
                                            <div class="input-group">
                                              E <input type="text" name="tpi_st_sudah_gcs_e" id="tpi_st_sudah_gcs_e" class="tpi_st_sudah_gcs custom-form clear-input d-inline-block col-lg-1 ml-1 mr-2" onkeypress="return hanyaAngka(event)">
                                              M <input type="text" name="tpi_st_sudah_gcs_m" id="tpi_st_sudah_gcs_m" class="tpi_st_sudah_gcs custom-form clear-input d-inline-block col-lg-1 ml-1 mr-2" onkeypress="return hanyaAngka(event)">
                                              V <input type="text" name="tpi_st_sudah_gcs_v" id="tpi_st_sudah_gcs_v" class="tpi_st_sudah_gcs custom-form clear-input d-inline-block col-lg-1 ml-1 mr-2" onkeypress="return hanyaAngka(event)">
                                              Total <input type="text" name="tpi_st_sudah_gcs_total" id="tpi_st_sudah_gcs_total" class="custom-form clear-input d-inline-block col-lg-2 ml-1" readonly>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td width="1%"></td>
                                          <td width="25%" class="bold">Tekanan Darah</td>
                                          <td wdith="1%" class="bold">:</td>
                                          <td>
                                            <div class="input-group">
                                              <input type="text" name="tpi_st_sudah_tensi_sis" id="tpi_st_sudah_tensi_sis" class="custom-form clear-input d-inline-block col-lg-3" placeholder="Sistolik" onkeypress="return hanyaAngka(event)">
                                              <span>/</span>
                                              <input type="text" name="tpi_st_sudah_tensi_dis" id="tpi_st_sudah_tensi_dis" class="custom-form clear-input d-inline-block col-lg-3" placeholder="Diastolik" onkeypress="return hanyaAngka(event)">
                                              <div class="input-group-append">
                                                <span class="input-group-custom">mmHg</span>
                                              </div>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td width="2%"></td>
                                          <td width="15%" class="bold">Suhu</td>
                                          <td width="1%" class="bold">:</td>
                                          <td>
                                            <div class="input-group">
                                              <input type="text" name="tpi_st_sudah_suhu" id="tpi_st_sudah_suhu" class="custom-form clear-input d-inline-block col-lg-3" placeholder="Suhu" onkeypress="return hanyaAngka(event)">
                                              <div class="input-group-append">
                                                <span class="input-group-custom">&#8451;</span>
                                              </div>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td width="1%"></td>
                                          <td width="25%" class="bold">Nadi</td>
                                          <td class="bold">:</td>
                                          <td>
                                            <div class="input-group">
                                              <input type="text" name="tpi_st_sudah_nadi" id="tpi_st_sudah_nadi" class="custom-form clear-input d-inline-block col-lg-3" placeholder="Nadi" onkeypress="return hanyaAngka(event)">
                                              <div class="input-group-append">
                                                <span class="input-group-custom">x/mnt</span>
                                              </div>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td width="1%"></td>
                                          <td width="25%" class="bold">RR</td>
                                          <td width="1%" class="bold">:</td>
                                          <td>
                                            <div class="input-group">
                                              <input type="text" name="tpi_st_sudah_pernafasan" id="tpi_st_sudah_pernafasan" class="custom-form clear-input d-inline-block col-lg-3" placeholder="RR" onkeypress="return hanyaAngka(event)">
                                              <div class="input-group-append">
                                                <span class="input-group-custom">x/mnt</span>
                                              </div>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td width="2%"></td>
                                          <td width="15%" class="bold">Kondisi Pasien</td>
                                          <td width="1%" class="bold">:</td>
                                          <td>
                                            <div class="input-group">
                                              <input type="radio" name="tpi_st_sudah_kondisi_pasien" id="tpi_st_sudah_kondisi_pasien_memburuk" value="0" class="mr-1">Memburuk
                                              <input type="radio" name="tpi_st_sudah_kondisi_pasien" id="tpi_st_sudah_kondisi_pasien_stabil" value="1" class="mr-1 ml-2">Stabil
                                              <input type="radio" name="tpi_st_sudah_kondisi_pasien" id="tpi_st_sudah_kondisi_pasien_tidak_berubah" value="2" class="mr-1 ml-2">Tidak Ada Perubahan
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td width="2%"></td>
                                          <td width="15%" class="bold">Nama Obat</td>
                                          <td wdith="1%" class="bold">:</td>
                                          <td>
                                            <div class="input-group">
                                              <input type="radio" name="tpi_st_sudah_nama_obat" id="tpi_st_sudah_nama_obat_komplit" value="0" class="mr-1">Komplit
                                              <input type="radio" name="tpi_st_sudah_nama_obat" id="tpi_st_sudah_nama_obat_lainnya" value="1" class="mr-1 ml-2">Lain-lain
                                              <input type="text" name="tpi_st_sudah_ket_nama_obat" id="tpi_st_sudah_ket_nama_obat" class="custom-form clear-input d-inline-block col-lg-4 ml-1" disabled placeholder="Lain-lain">
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td width="2%"></td>
                                          <td width="15%" class="bold">Pemeriksaan Penunjang</td>
                                          <td wdith="1%" class="bold">:</td>
                                          <td>
                                            <div class="input-group">
                                              <input type="radio" name="tpi_st_sudah_pemeriksaan_penunjang" id="tpi_st_sudah_pemeriksaan_penunjang_komplit" value="0" class="mr-1">Komplit
                                              <input type="radio" name="tpi_st_sudah_pemeriksaan_penunjang" id="tpi_st_sudah_pemeriksaan_penunjang_lainnya" value="1" class="mr-1 ml-2">Lain-lain
                                              <input type="text" name="tpi_st_sudah_ket_pemeriksaan_penunjang" id="tpi_st_sudah_ket_pemeriksaan_penunjang" class="custom-form clear-input d-inline-block col-lg-4 ml-1" disabled placeholder="Lain-lain">
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td width="1%"></td>
                                          <td width="25%" class="bold">Catatan Penting</td>
                                          <td wdith="1%" class="bold">:</td>
                                          <td>
                                            <div class="input-group">
                                              <textarea name="tpi_st_sudah_catatan_penting" id="tpi_st_sudah_catatan_penting" rows="2" class="form-control clear-input col-lg-10" placeholder="Tuliskan catatan penting tentang pasien"></textarea>
                                            </div>
                                          </td>
                                        </tr>
                                      </table>
                                    </div>
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                      <tr>
                                        <td colspan="3" class="center td-dark"></td>
                                      </tr>
                                      <tr>
                                        <td width="33%" class="center">Tanggal & Jam
                                          <input type="text" name="tpi_st_waktu_ttd_petugas_tf" id="tpi_st_waktu_ttd_petugas_tf" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="dd/mm/yyyy hh:ii">
                                        </td>
                                        <td width="33%">
                                        </td>
                                        <td width="33%" class="center">Tanggal & Jam
                                          <input type="text" name="tpi_st_waktu_ttd_petugas_penerima" id="tpi_st_waktu_ttd_petugas_penerima" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="dd/mm/yyyy hh:ii">
                                        </td>
                                      </tr>
                                      <tr>
                                        <td class="center">Petugas Yang Melakukan Transfer,</td>
                                        <td></td>
                                        <td class="center">Petugas Yang Menerima,</td>
                                      </tr>
                                      <tr>
                                        <td class="center"><input type="text" name="tpi_st_petugas_tansfer" id="tpi_st_petugas_tansfer" class="select2c-input ml-2"></td>
                                        <td></td>
                                        <td class="center"><input type="text" name="tpi_st_petugas_terima_transfer" id="tpi_st_petugas_terima_transfer" class="select2c-input ml-2"></td>
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
                                          <input type="checkbox" name="tpi_st_ttd_petugas_transfer" id="tpi_st_ttd_petugas_transfer" value="1" class="custom-form col-lg-1 mx-auto">
                                        </td>
                                        <td class="center">
                                        </td>
                                        <td class="center">
                                          <input type="checkbox" name="tpi_st_ttd_petugas_terima_transfer" id="tpi_st_ttd_petugas_terima_transfer" value="1" class="custom-form col-lg-1 mx-auto">
                                        </td>
                                      </tr>
                                    </table>
                                  </div>
                                </div>
                              </div>

                            </div>
                          </div>

                          <!-- table data transfer pasien -->
                          <div class="form-transfer-data">
                            <input type="hidden" name="id_transfer" id="id_transfer">
                            <input type="hidden" name="tpi_id_layanan_pendaftaran" id="tpi_id_layanan_pendaftaran">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="row mb-2">
                                  <div class="col d-flex justify-content-start">
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="tpi-img-calendar"><i class="fas fa-fw fa-calendar-alt"></i></span>
                                      </div>
                                      <input type="text" name="waktu_search" id="tpi-waktu-search" class="form-control col-lg-4" placeholder="Pencarian Tanggal">
                                    </div>
                                  </div>
                                  <div class="col d-flex justify-content-end">
                                    <div class="custom-search">
                                      <input type="text" class="search-query-white" onkeyup="getListTransferPasien($('#ek-id-pendaftaran').val(), 1)" id="tpi-keyword" placeholder="Pencarian ...">
                                      <button type="button"><span class="fas fa-search" aria-hidden="true"></span></button>
                                    </div>
                                  </div>
                                </div>
                                <table class="table table-sm table-striped table-bordered color-table info-table" id="table-transfer-pasien">
                                  <thead>
                                      <tr>
                                      <th class="center" width="1%">No.</th>
                                      <th class="center" width="15%">Waktu Transfer</th>
                                      <th class="center" width="15%">Ruangan Awal</th>
                                      <th class="center" width="15%">Petugas Transfer</th>
                                      <th class="center" width="15%">Waktu Terima</th>
                                      <th class="center" width="15%">Ruangan Tujuan</th>
                                      <th class="center" width="15%">Petugas Terima</th>
                                      <th class="center" width="16%">
                                      </th>
                                    </tr>
                                    </thead>
                                  <tbody></tbody>
                                </table>
                                <div id="tpi-pagination" class="float-left"></div>
                                <div id="tpi-summary" class="float-right text-sm">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- END TRANSFER PASIEN INTRA RUMAH SAKIT -->

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
