
<!-- // AAAS_BARU -->
<div class="modal fade" id="modal_assesment_anestesi_sedasi" data-backdrop="static">
  <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
    <div class="modal-content">
      <div class="modal-header">
        <div class="title">
          <h5 class="modal-title bold" id="modal_assesment_anestesi_sedasi">ASSESMEN AWAL ANESTESI/SEDASI</h5>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'id=form_entri_operasi_aaasB class=form-horizontal') ?>
        <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-aaasB">
        <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-aaasB">
        <input type="hidden" name="id_aaasB" id="id-aaasB">
        <input type="hidden" name="id_pasien" id="id-pasien-aaasB">
        <input type="hidden" name="id_user" id="id-user"value="<?= $this->session->userdata('id_translucent') ?>">

        <!-- header -->
        <div class="row">
          <div class="col-lg-6">
            <div class="table-responsive">
              <table class="table table-sm table-striped">
                <tr>
                  <td width="20%" class="bold">Nama Pasien</td>
                  <td wdith="80%">: <span id="nama-pasien-aaasB"></span></td>
                </tr>
                <tr>
                  <td class="bold">No. RM</td>
                  <td>: <span id="no-aaasB"></span></td>
                </tr>
                <tr>
                  <td class="bold">Tanggal Lahir</td>
                  <td>: <span id="tanggal-lahir-aaasB"></span></td>
                </tr>
                <tr>
                  <td class="bold">Jenis Kelamin</td>
                  <td>: <span id="jenis-kelamin-aaasB"></span></td>
                </tr>
                <tr>
                  <td class="bold">Alamat</td>
                  <td>: <span id="alamat-aaasB"></span></td>
                </tr>
              </table>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="table-responsive">
              <table class="table table-sm table-striped">
                <tr>
                  <td width="30%" class="bold">Ruang Rawat/Unit Kerja</td>
                  <td wdith="70%">: <span id="bed-aaasB"></span></td>
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

        <div class="row">
          <div class="col-lg-12">
            <div class="card-body">

              <div class="form-asessmentt-awal-anestesi-sedasi">
                  <div class="row">
                      <div class="col-lg-12">
                          <table class="table table-sm table-striped" style="margin-top: -15px">
                              <tr>
                                  <td width="100%">
                                      <h5 class="center"><b>ASSESMEN AWAL ANESTESI/SEDASI</b></h5>
                                  </td>
                              </tr>
                          </table>
                      </div>
                  </div>
                  <div class="form-asesmentt">
                      <div class="row">
                          <div class="col-lg-6">
                              <table class="table table-sm table-striped" style="margin-top: -15px">
                                  <tr>
                                      <td></td>
                                      <td><b>Diagnosis Pra Operasi/Tindakan</b></td>
                                      <td>:</td>
                                      <td>
                                          <div class="input-group">
                                              <input type="text" name="aaas_diagnosis"
                                                  id="aaas-diagnosis"
                                                  class="custom-form clear-input d-inline-block col-lg-12"
                                                  placeholder="Diagnosis...">
                                          </div>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td><b>Rencana Operasi Tindakan</b></td>
                                      <td>:</td>
                                      <td>
                                          <div class="input-group">
                                              <input type="text" name="aaas_rot" id="aaas-rot"
                                                  class="custom-form clear-input d-inline-block col-lg-12"
                                                  placeholder="Rencana/Tndakan Operasi">
                                          </div>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td width="2%"></td>
                                      <td><b>Operator</b></td>
                                      <td>:</td>
                                      <td>
                                          <input type="text" name="aaas_perawat" id="aaas-perawat"
                                              class="select2c-input">
                                      </td>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td width="2%"></td>
                                      <td class="bold">Anamnesa dari</td>
                                      <td>:</td>
                                      <td>
                                          <div class="input-group">
                                              <input type="radio" name="aaas_anamnesa"
                                                  id="aaas-anamnesa-1" value="Pasien"
                                                  class="mr-1"> Pasien
                                              <input type="radio" name="aaas_anamnesa"
                                                  id="aaas-anamnesa-2" value="Keluarga"
                                                  class="mr-1 ml-2">Keluarga
                                              <input type="radio" name="aaas_anamnesa"
                                                  id="aaas-anamnesa-3" value="Lainnya"
                                                  class="mr-1 ml-2"> Lainnya
                                              <input type="text" name="aaas_anamnesa_4"
                                                  id="aaas-anamnesa-4"
                                                  class="custom-form clear-input d-inline-block col-lg-10"
                                                  placeholder="Jelaskan...">
                                          </div>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td width="2%"></td>
                                      <td class="bold">Riwayat Anestesi</td>
                                      <td>:</td>
                                      <td>
                                          <div class="input-group">
                                              <input type="radio" name="aaas_riwayat_anestesi"
                                                  id="aaas-riwayat-anestesi-1" value="Normal"
                                                  class="mr-1"> Ada
                                              <input type="radio" name="aaas_riwayat_anestesi"
                                                  id="aaas-riwayat-anestesi-2" value="Kering"
                                                  class="mr-1 ml-2">Tidak Ada
                                              <input type="radio" name="aaas_riwayat_anestesi"
                                                  id="aaas-riwayat-anestesi-3"
                                                  value="Ada cairan dari luka" class="mr-1 ml-2">
                                              Sebutkan, jika ada
                                              <input type="text" name="aaas_riwayat_anestesi_4"
                                                  id="aaas-riwayat-anestesi-4"
                                                  class="custom-form clear-input d-inline-block col-lg-10"
                                                  placeholder="Jelaskan...">
                                          </div>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td width="2%"></td>
                                      <td class="bold">Komplikasi</td>
                                      <td>:</td>
                                      <td>
                                          <div class="input-group">
                                              <input type="radio" name="aaas_komplikasi"
                                                  id="aaas-komplikasi-1" value="Normal"
                                                  class="mr-1"> Ada
                                              <input type="radio" name="aaas_komplikasi"
                                                  id="aaas-komplikasi-2" value="Kering"
                                                  class="mr-1 ml-2">Tidak Ada
                                              <input type="radio" name="aaas_komplikasi"
                                                  id="aaas-komplikasi-3"
                                                  value="Ada cairan dari luka" class="mr-1 ml-2">
                                              Sebutkan, jika ada
                                              <input type="text" name="aaas_komplikasi_4"
                                                  id="aaas-komplikasi-4"
                                                  class="custom-form clear-input d-inline-block col-lg-10"
                                                  placeholder="Jelaskan...">
                                          </div>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td><b>Obat yang sedang dikonsumsi</b></td>
                                      <td>:</td>
                                      <td>
                                          <div class="input-group">
                                              <input type="text" name="aaas_konsumsi_obat"
                                                  id="aaas-konsumsi-obat"
                                                  class="custom-form clear-input d-inline-block col-lg-12"
                                                  placeholder="Obat yang sedang dikonsumsi">
                                          </div>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td width="2%"></td>
                                      <td class="bold">Riwayat Alergi</td>
                                      <td>:</td>
                                      <td>
                                          <div class="input-group">
                                              <input type="radio" name="aaas_riwayat_alergi"
                                                  id="aaas-riwayat-alergi-1" value="Normal" class="mr-1">
                                              Ada
                                              <input type="radio" name="aaas_riwayat_alergi"
                                                  id="aaas-riwayat-alergi-2" value="Kering"
                                                  class="mr-1 ml-2">Tidak Ada
                                              <input type="radio" name="aaas_riwayat_alergi"
                                                  id="aaas-riwayat-alergi-3"
                                                  value="Ada cairan dari luka" class="mr-1 ml-2">
                                              Sebutkan, jika ada
                                              <input type="text" name="aaas_riwayat_alergi_4"
                                                  id="aaas-riwayat-alergi-4"
                                                  class="custom-form clear-input d-inline-block col-lg-10"
                                                  placeholder="Jelaskan...">
                                          </div>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td><b>Tanda Vital</b></td>
                                      <td>:</td>
                                      <td>
                                          <div class="input-group">
                                              <input type="text" name="aaas_tanda"
                                                  id="aaas-tanda"
                                                  class="custom-form clear-input d-inline-block col-lg-12"
                                                  placeholder="tanda vital">
                                          </div>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td width="2%"></td>
                                      <td class="bold">Berat Badan</td>
                                      <td>:</td>
                                      <td>
                                          <div class="input-group">
                                              <input type="text" name="aaas_berat_1" id="aaas-berat-1"
                                                  class="custom-form clear-input d-inline-block col-lg-3"
                                                  placeholder="BB">
                                              <div class="input-group-append">
                                                  <span class="input-group-custom">Kg</span>
                                              </div>
                                          </div>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td width="2%"></td>
                                      <td class="bold">Tinggi Badan</td>
                                      <td>:</td>
                                      <td>
                                          <div class="input-group">
                                              <input type="text" name="aaas_berat_2" id="aaas-berat-2"
                                                  class="custom-form clear-input d-inline-block col-lg-3"
                                                  placeholder="Tinggi Badan">
                                              <div class="input-group-append">
                                                  <span class="input-group-custom">CM</span>
                                              </div>
                                          </div>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td width="2%"></td>
                                      <td class="bold">TD</td>
                                      <td>:</td>
                                      <td>
                                          <div class="input-group">
                                              <input type="text" name="aaas_berat_3" id="aaas-berat-3"
                                                  class="custom-form clear-input d-inline-block col-lg-3"
                                                  placeholder="TD">
                                              <div class="input-group-append">
                                                  <span class="input-group-custom">mmHg</span>
                                              </div>
                                          </div>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td width="2%"></td>
                                      <td class="bold">RR</td>
                                      <td>:</td>
                                      <td>
                                          <div class="input-group">
                                              <input type="text" name="aaas_berat_4" id="aaas-berat-4"
                                                  class="custom-form clear-input d-inline-block col-lg-3"
                                                  placeholder="RR">
                                              <div class="input-group-append">
                                                  <span class="input-group-custom">X/mnt</span>
                                              </div>
                                          </div>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td width="2%"></td>
                                      <td class="bold">Nadi</td>
                                      <td>:</td>
                                      <td>
                                          <div class="input-group">
                                              <input type="text" name="aaas_berat_5" id="aaas-berat-5"
                                                  class="custom-form clear-input d-inline-block col-lg-3"
                                                  placeholder="nadi">
                                              <div class="input-group-append">
                                                  <span class="input-group-custom">X/mnt</span>
                                              </div>
                                          </div>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td width="2%"></td>
                                      <td class="bold">Suhu</td>
                                      <td>:</td>
                                      <td>
                                          <div class="input-group">
                                              <input type="text" name="aaas_berat_6" id="aaas-berat-6"
                                                  class="custom-form clear-input d-inline-block col-lg-3"
                                                  placeholder="suhu">
                                              <div class="input-group-append">
                                                  <span class="input-group-custom">&#8451;</span>
                                              </div>
                                          </div>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td width="2%"></td>
                                      <td class="bold">Skor Nyeri</td>
                                      <td>:</td>
                                      <td>
                                          <div class="input-group">
                                              <input type="radio" name="aaas_skor_nyeri"
                                                  id="aaas-skor-nyeri-1" value="1" class="mr-1">1
                                              <input type="radio" name="aaas_skor_nyeri"
                                                  id="aaas-skor-nyeri-2" value="2"
                                                  class="mr-1 ml-2">2
                                              <input type="radio" name="aaas_skor_nyeri"
                                                  id="aaas-skor-nyeri-3" value="3"
                                                  class="mr-1 ml-2">3
                                              <input type="radio" name="aaas_skor_nyeri"
                                                  id="aaas-skor-nyeri-4" value="4"
                                                  class="mr-1 ml-2">4
                                              <input type="radio" name="aaas_skor_nyeri"
                                                  id="aaas-skor-nyeri-5" value="5"
                                                  class="mr-1 ml-2">5
                                              <input type="radio" name="aaas_skor_nyeri"
                                                  id="aaas-skor-nyeri-6" value="6"
                                                  class="mr-1 ml-2">6
                                              <input type="radio" name="aaas_skor_nyeri"
                                                  id="aaas-skor-nyeri-8" value="8"
                                                  class="mr-1 ml-2">8
                                              <input type="radio" name="aaas_skor_nyeri"
                                                  id="aaas-skor-nyeri-9" value="9"
                                                  class="mr-1 ml-2">9
                                              <input type="radio" name="aaas_skor_nyeri"
                                                  id="aaas-skor-nyeri-10" value="10"
                                                  class="mr-1 ml-2">10
                                          </div>
                                      </td>
                                  </tr>
                              </table>
                          </div>
                          <div class="col-lg-6">
                              <table class="table table-sm table-striped" style="margin-top: -15px">
                                  <tr>
                                      <td class="center"><b>Evaluasi Jalan Nafas</b></td>
                                  </tr>
                              </table>
                              <table class="table table-sm table-striped" style="margin-top: -15px">
                                  <tr>
                                      <td><b>Bebas</b></td>
                                      <td>:</td>
                                      <td>
                                          <input type="radio" name="aaas_evaluasi_1"
                                              id="aaas-evaluasi-1" value="0" class="mr-1"
                                              checked>Tidak
                                          <input type="radio" name="aaas_evaluasi_1"
                                              id="aaas-evaluasi-2" value="1"
                                              class="mr-1 ml-2">Ya
                                      </td>
                                  </tr>
                                  <tr>
                                      <td><b>Protrusi Mandibula</b></td>
                                      <td>:</td>
                                      <td>
                                          <input type="radio" name="aaas_evaluasi_3"
                                              id="aaas-evaluasi-3" value="0" class="mr-1"
                                              checked>Tidak
                                          <input type="radio" name="aaas_evaluasi_3"
                                              id="aaas-evaluasi-4" value="1" class="mr-1 ml-2">Ya
                                      </td>
                                  </tr>
                                  <tr>
                                      <td><b>Buka Mulut</b></td>
                                      <td>:</td>
                                      <td>
                                          <input type="radio" name="aaas_evaluasi_5"
                                              id="aaas-evaluasi-5" value="0" class="mr-1"
                                              checked>Tidak
                                          <input type="radio" name="aaas_evaluasi_5"
                                              id="aaas-evaluasi-6" value="1"
                                              class="mr-1 ml-2">Normal
                                          <input type="text" name="aaas_evaluasi_7"
                                              id="aaas-evaluasi-7"
                                              class="custom-form clear-input d-inline-block col-lg-5"
                                              placeholder="Cm">
                                      </td>
                                  </tr>
                                  <tr>
                                      <td><b>Jarak Mentohyoid</b></td>
                                      <td>:</td>
                                      <td>
                                          <input type="radio" name="aaas_evaluasi_8"
                                              id="aaas-evaluasi-8" value="0" class="mr-1"
                                              checked>Tidak
                                          <input type="radio" name="aaas_evaluasi_8"
                                              id="aaas-evaluasi-9" value="1"
                                              class="mr-1 ml-2">Normal
                                          <input type="text" name="aaas_evaluasi_10"
                                              id="aaas-evaluasi-10"
                                              class="custom-form clear-input d-inline-block col-lg-5"
                                              placeholder="Cm">
                                      </td>
                                  </tr>
                                  <tr>
                                      <td><b>Jarak Hyothyroid</b></td>
                                      <td>:</td>
                                      <td>
                                          <input type="radio" name="aaas_evaluasi_11"
                                              id="aaas-evaluasi-11" value="0" class="mr-1"
                                              checked>Tidak
                                          <input type="radio" name="aaas_evaluasi_11"
                                              id="aaas-evaluasi-12" value="1"
                                              class="mr-1 ml-2">Normal
                                          <input type="text" name="aaas_evaluasi_13"
                                              id="aaas-evaluasi-13"
                                              class="custom-form clear-input d-inline-block col-lg-5"
                                              placeholder="Cm">
                                      </td>
                                  </tr>
                                  <tr>
                                      <td><b>Leher</b></td>
                                      <td>:</td>
                                      <td>
                                          <input type="radio" name="aaas_evaluasi_14"
                                              id="aaas-evaluasi-14" value="0" class="mr-1"
                                              checked>Tidak
                                          <input type="radio" name="aaas_evaluasi_14"
                                              id="aaas-evaluasi-15" value="1"
                                              class="mr-1 ml-2">Pendek
                                      </td>
                                  </tr>
                                  <tr>
                                      <td><b>Gerak Leher</b></td>
                                      <td>:</td>
                                      <td>
                                          <input type="radio" name="aaas_evaluasi_16"
                                              id="aaas-evaluasi-16" value="0"
                                              class="mr-1" checked>Tidak
                                          <input type="radio" name="aaas_evaluasi_16"
                                              id="aaas-evaluasi-17" value="1"
                                              class="mr-1 ml-2">Bebas
                                      </td>
                                  </tr>
                                  <tr>
                                      <td><b>Mallamapathy</b></td>
                                      <td>:</td>
                                      <td>
                                          <div class="input-group">
                                              <input type="radio" name="aaas_evaluasi_18"
                                                  id="aaas-evaluasi-18" value="1" class="mr-1">I
                                              <input type="radio" name="aaas_evaluasi_18"
                                                  id="aaas-evaluasi-19" value="2"
                                                  class="mr-1 ml-2">II
                                              <input type="radio" name="aaas_evaluasi_18"
                                                  id="aaas-evaluasi-20" value="3"
                                                  class="mr-1 ml-2">II
                                              <input type="radio" name="aaas_evaluasi_18"
                                                  id="aaas-evaluasi-21" value="4"
                                                  class="mr-1 ml-2">IV
                                          </div>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td><b>Obesitas</b></td>
                                      <td>:</td>
                                      <td>
                                          <input type="radio" name="aaas_evaluasi_22"
                                              id="aaas-evaluasi-22" value="0" class="mr-1"
                                              checked>Tidak
                                          <input type="radio" name="aaas_evaluasi_22"
                                              id="aaas-evaluasi-23" value="1"
                                              class="mr-1 ml-2">Ya
                                      </td>
                                  </tr>
                                  <tr>
                                      <td><b>Massa</b></td>
                                      <td>:</td>
                                      <td>
                                          <input type="radio" name="aaas_evaluasi_24"
                                              id="aaas-evaluasi-24" value="0" class="mr-1"
                                              checked>Tidak
                                          <input type="radio" name="aaas_evaluasi_24"
                                              id="aaas-evaluasi-25" value="1"
                                              class="mr-1 ml-2">Ya
                                      </td>
                                  </tr>
                                  <tr>
                                      <td><b>Gigi Palsu</b></td>
                                      <td>:</td>
                                      <td>
                                          <input type="radio" name="aaas_evaluasi_26"
                                              id="aaas-evaluasi-26" value="0"
                                              class="mr-1" checked>Tidak
                                          <input type="radio" name="aaas_evaluasi_26"
                                              id="aaas-evaluasi-27" value="1"
                                              class="mr-1 ml-2">Ya
                                      </td>
                                  </tr>
                                  <tr>
                                      <td><b>Sulit Ventilasi</b></td>
                                      <td>:</td>
                                      <td>
                                          <input type="radio" name="aaas_evaluasi_28"
                                              id="aaas-evaluasi-28" value="0"
                                              class="mr-1" checked>Tidak
                                          <input type="radio" name="aaas_evaluasi_28"
                                              id="aaas-evaluasi-29" value="1"
                                              class="mr-1 ml-2">Ya
                                      </td>
                                  </tr>
                              </table>
                          </div>
                      <div class="col-lg-6">
                              <table class="table table-no-border table-sm table-striped"
                                  style="margin-top:-15px">
                                  <tr>
                                      <td colspan="3" class="center bold td-dark">
                                          <button class="btn btn-info btn-xs mr-1 float-left"
                                              type="button" data-toggle="collapse"
                                              data-target="#funggsi-sistem-organ"><i
                                                  class="fas fa-expand mr-1"></i>Expand</button>FUNGSI
                                          SISTEM ORGAN
                                      </td>
                                  </tr>
                              </table>
                              <div class="collapse multi-collapse mt-2" id="funggsi-sistem-organ">
                                  <div class="row">
                                      <div class="col-lg-12">
                                          <table class="table table-sm table-striped"
                                              style="margin-top: -15px">
                                              <tr>
                                                  <td class="center"><b>PERNAFASAN</b></td>
                                              </tr>
                                          </table>
                                          <table class="table table-sm table-striped"
                                              style="margin-top: -15px">
                                              <tr>
                                                  <td width="1%">
                                                      <div class="input-group">
                                                          <input type="checkbox" name="aaas_pernafasan_1"
                                                              id="aaas-pernafasan-1" value="1"
                                                              class="mr-1">Asma
                                                      </div>
                                                  </td>
                                                  <td width="1%">
                                                      <input type="checkbox"
                                                          name="aaas_pernafasan_2"
                                                          id="aaas-pernafasan-2" value="1"
                                                          class="mr-1">Batuk Produktif
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td width="1%">
                                                      <div class="input-group">
                                                          <input type="checkbox" name="aaas_pernafasan_3"
                                                              id="aaas-pernafasan-3" value="1"
                                                              class="mr-1">Bronchitis
                                                      </div>
                                                  </td>
                                                  <td width="1%">
                                                      <input type="checkbox" name="aaas_pernafasan_4"
                                                          id="aaas-pernafasan-4" value="1" class="mr-1">ISPA
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td width="1%">
                                                      <div class="input-group">
                                                          <input type="checkbox" name="aaas_pernafasan_5"
                                                              id="aaas-pernafasan-5" value="1"
                                                              class="mr-1">Dyspnea
                                                      </div>
                                                  </td>
                                                  <td width="1%">
                                                      <input type="checkbox" name="aaas_pernafasan_6"
                                                          id="aaas-pernafasan-6" value="1" class="mr-1">PPOK
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td width="1%">
                                                      <div class="input-group">
                                                          <input type="checkbox"
                                                              name="aaas_pernafasan_7"
                                                              id="aaas-pernafasan-7" value="1"
                                                              class="mr-1">Orthopnea
                                                      </div>
                                                  </td>
                                                  <td width="1%">
                                                      <input type="checkbox" name="aaas_pernafasan_8"
                                                          id="aaas-pernafasan-8" value="1"
                                                          class="mr-1">Tuberkulosis
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td width="1%">
                                                      <div class="input-group">
                                                          <input type="checkbox" name="aaas_pernafasan_9"
                                                              id="aaas-pernafasan-9" value="1"
                                                              class="mr-1">Pneumonia
                                                      </div>
                                                  </td>
                                                  <td width="1%">
                                                      <input type="checkbox" name="aaas_pernafasan_10"
                                                          id="aaas-pernafasan-10" value="1"
                                                          class="mr-1">Efusi Pleura
                                                  </td>
                                              </tr>

                                              <tr>
                                                  <td width="1%"> 
                                                    <input type="checkbox" name="aaas_pernafasan_12"id="aaas-pernafasan-12" value="1"class="mr-1"> Lainnya
                                                  </td>
                                                  <td width="1%">
                                                      <input type="text" name="aaas_pernafasan_11" id="aaas-pernafasan-11"class="custom-form clear-input d-inline-block col-lg-10">
                                                  </td>
                                              </tr>
                                          </table>

                                          <table class="table table-sm table-striped"
                                              style="margin-top: -15px">
                                              <tr>
                                                  <td class="center"><b>KARDIOVASKULAR</b></td>
                                              </tr>
                                          </table>
                                          <table class="table table-sm table-striped"
                                              style="margin-top: -15px">
                                              <tr>
                                                  <td width="1%">
                                                      <div class="input-group">
                                                          <input type="checkbox" name="aaas_kardiovaskular_1"
                                                              id="aaas-kardiovaskular-1" value="1"
                                                              class="mr-1">Angina
                                                      </div>
                                                  </td>
                                                  <td width="1%">
                                                      <input type="checkbox" name="aaas_kardiovaskular_2" id="aaas-kardiovaskular-2"
                                                          value="1" class="mr-1">HT
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td width="1%">
                                                      <div class="input-group">
                                                          <input type="checkbox" name="aaas_kardiovaskular_3"
                                                              id="aaas-kardiovaskular-3" value="1"
                                                              class="mr-1">Pancamaker
                                                      </div>
                                                  </td>
                                                  <td width="1%">
                                                      <input type="checkbox" name="aaas_kardiovaskular_4"
                                                          id="aaas-kardiovaskular-4" value="1" class="mr-1">PJK
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td width="1%">
                                                      <div class="input-group">
                                                          <input type="checkbox" name="aaas_kardiovaskular_5"
                                                              id="aaas-kardiovaskular-5" value="1"
                                                              class="mr-1">Disritmia
                                                      </div>
                                                  </td>
                                                  <td width="1%">
                                                      <input type="checkbox" name="aaas_kardiovaskular_6"
                                                          id="aaas-kardiovaskular-6" value="1" class="mr-1">PJR
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td width="1%">
                                                      <div class="input-group">
                                                          <input type="checkbox"
                                                              name="aaas_kardiovaskular_7"
                                                              id="aaas-kardiovaskular-7" value="1"
                                                              class="mr-1">Limitasi Aktivitas
                                                      </div>
                                                  </td>
                                                  <td width="1%">
                                                      <input type="checkbox" name="aaas_kardiovaskular_8"
                                                          id="aaas-kardiovaskular-8" value="1" class="mr-1">CHD
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td width="1%">
                                                      <div class="input-group">
                                                          <input type="checkbox"
                                                              name="aaas_kardiovaskular_9"
                                                              id="aaas-kardiovaskular-9" value="1"
                                                              class="mr-1">Penyakit Jantung Katup
                                                      </div>
                                                  </td>
                                                  <td width="1%">
                                                      <input type="checkbox" name="aaas_kardiovaskular_10"
                                                          id="aaas-kardiovaskular-10" value="1"
                                                          class="mr-1">Murmur
                                                  </td>
                                              </tr>

                                              <tr>
                                                  <td width="1%"> 
                                                    <input type="checkbox" name="aaas_kardiovaskular_12"id="aaas-kardiovaskular-12" value="1"class="mr-1"> Lainnya
                                                  </td>
                                                  <td width="1%">
                                                      <input type="text" name="aaas_kardiovaskular_11" id="aaas-kardiovaskular-11"class="custom-form clear-input d-inline-block col-lg-10">
                                                  </td>
                                              </tr>
                                          </table>


                                          <table class="table table-sm table-striped"
                                              style="margin-top: -15px">
                                              <tr>
                                                  <td class="center"><b>NEURO / MASKULOSKELETAL</b>
                                                  </td>
                                              </tr>
                                          </table>
                                          <table class="table table-sm table-striped"
                                              style="margin-top: -15px">
                                              <tr>
                                                  <td width="1%">
                                                      <div class="input-group">
                                                          <input type="checkbox"
                                                              name="aaas_neuro_1"
                                                              id="aaas-neuro-1" value="1"
                                                              class="mr-1">Kelemahan Otot
                                                      </div>
                                                  </td>
                                                  <td width="1%">
                                                      <input type="checkbox" name="aaas_neuro_2"
                                                          id="aaas-neuro-2" value="1"
                                                          class="mr-1">Stroke
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td width="1%">
                                                      <div class="input-group">
                                                          <input type="checkbox"
                                                              name="aaas_neuro_3"
                                                              id="aaas-neuro-3" value="1"
                                                              class="mr-1">Keluhan Punggung
                                                      </div>
                                                  </td>
                                                  <td width="1%">
                                                      <input type="checkbox" name="aaas_neuro_4"
                                                          id="aaas-neuro-4" value="1"
                                                          class="mr-1">Kejang
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td width="1%">
                                                      <div class="input-group">
                                                          <input type="checkbox"
                                                              name="aaas_neuro_5"
                                                              id="aaas-neuro-5" value="1"
                                                              class="mr-1">Nyeri Kepala
                                                      </div>
                                                  </td>
                                                  <td width="1%">
                                                      <input type="checkbox" name="aaas_neuro_6"
                                                          id="aaas-neuro-6" value="1"
                                                          class="mr-1">Epilepsi
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td width="1%">
                                                      <div class="input-group">
                                                          <input type="checkbox"
                                                              name="aaas_neuro_7"
                                                              id="aaas-neuro-7" value="1"
                                                              class="mr-1">Penurunan Kesadaran
                                                      </div>
                                                  </td>
                                                  <td width="1%">
                                                      <input type="checkbox" name="aaas_neuro_8"
                                                          id="aaas-neuro-8" value="1" class="mr-1">SOP
                                                  </td>
                                              </tr>                                           
                                              <tr>
                                                  <td width="1%"> 
                                                    <input type="checkbox" name="aaas_neuro_10"id="aaas-neuro-10" value="1"class="mr-1"> Lainnya
                                                  </td>
                                                  <td width="1%">
                                                      <input type="text" name="aaas_neuro_9" id="aaas-neuro-9"class="custom-form clear-input d-inline-block col-lg-10">
                                                  </td>
                                              </tr>
                                          </table>


                                          <table class="table table-sm table-striped"
                                              style="margin-top: -15px">
                                              <tr>
                                                  <td class="center"><b>RENAL / ENDOKRIN</b></td>
                                              </tr>
                                          </table>
                                          <table class="table table-sm table-striped"
                                              style="margin-top: -15px">
                                              <tr>
                                                  <td width="1%">
                                                      <div class="input-group">
                                                          <input type="checkbox" name="aaas_renal_1"
                                                              id="aaas-renal-1" value="1" class="mr-1">DM

                                                      </div>
                                                  </td>
                                                  <td width="1%">
                                                      <input type="checkbox" name="aaas_renal_2"
                                                          id="aaas-renal-2" value="1"
                                                          class="mr-1">Peny Thiroid
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td width="1%">
                                                      <div class="input-group">
                                                          <input type="checkbox"
                                                              name="aaas_renal_3"
                                                              id="aaas-renal-3" value="1"
                                                              class="mr-1">Penyakit Gigi

                                                      </div>
                                                  </td>
                                                  <td width="1%">
                                                      <input type="checkbox" name="aaas_renal_4"
                                                          id="aaas-renal-4" value="1"
                                                          class="mr-1">Penyakit Lain
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td width="1%"> 
                                                    <input type="checkbox" name="aaas_renal_6"id="aaas-renal-6" value="1"class="mr-1"> Lainnya
                                                  </td>
                                                  <td width="1%">
                                                      <input type="text" name="aaas_renal_5" id="aaas-renal-5"class="custom-form clear-input d-inline-block col-lg-10">
                                                  </td>
                                              </tr>
                                          </table>





                                          <table class="table table-sm table-striped"
                                              style="margin-top: -15px">
                                              <tr>
                                                  <td class="center"><b>HEPATO / GASTROINTETINAL</b>
                                                  </td>
                                              </tr>
                                          </table>
                                          <table class="table table-sm table-striped"
                                              style="margin-top: -15px">
                                              <tr>
                                                  <td width="1%">
                                                      <div class="input-group">
                                                          <input type="checkbox"
                                                              name="aaas_hepato_1"
                                                              id="aaas-hepato-1" value="1"
                                                              class="mr-1">Obstruksi Usus
                                                      </div>
                                                  </td>
                                                  <td width="1%">
                                                      <input type="checkbox" name="aaas_hepato_2"
                                                          id="aaas-hepato-2" value="1"
                                                          class="mr-1">Sirosis
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td width="1%">
                                                      <div class="input-group">
                                                          <input type="checkbox" name="aaas_hepato_3"
                                                              id="aaas-hepato-3" value="1"
                                                              class="mr-1">Hepatitis/Ikterus
                                                      </div>
                                                  </td>
                                                  <td width="1%">
                                                      <input type="checkbox" name="aaas_hepato_4"
                                                          id="aaas-hepato-4" value="1"
                                                          class="mr-1">Tukak Peptik
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td width="1%">
                                                      <div class="input-group">
                                                          <input type="checkbox" name="aaas_hepato_5"
                                                              id="aaas-hepato-5" value="1"
                                                              class="mr-1">Hiatal Hernia/Refluks
                                                      </div>
                                                  </td>
                                                  <td width="1%">
                                                      <input type="checkbox" name="aaas_hepato_6"
                                                          id="aaas-hepato-6" value="1" class="mr-1">Mual /
                                                      Muntah
                                                  </td>
                                              </tr>
                                              <tr>
                                                <td width="1%"> 
                                                    <input type="checkbox" name="aaas_hepato_8"id="aaas-hepato-8" value="1"class="mr-1"> Lainnya
                                                  </td>
                                                  <td width="1%">
                                                      <input type="text" name="aaas_hepato_7" id="aaas-hepato-7"class="custom-form clear-input d-inline-block col-lg-10">
                                                  </td>
                                              </tr>
                                          </table>


                                          <table class="table table-sm table-striped"
                                              style="margin-top: -15px">
                                              <tr>
                                                  <td class="center"><b>LAIN - LAIN</b></td>
                                              </tr>
                                          </table>
                                          <table class="table table-sm table-striped"
                                              style="margin-top: -15px">
                                              <tr>
                                                  <td width="1%">
                                                      <div class="input-group">
                                                          <input type="checkbox" name="aaas_lain_1"
                                                              id="aaas-lain-1" value="1"
                                                              class="mr-1">Hemofilia
                                                      </div>
                                                  </td>
                                                  <td width="1%">
                                                      <input type="checkbox" name="aaas_lain_2"
                                                          id="aaas-lain-2" value="1"
                                                          class="mr-1">Anemia
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td width="1%">
                                                      <div class="input-group">
                                                          <input type="checkbox"
                                                              name="aaas_lain_3"
                                                              id="aaas-lain-3" value="1"
                                                              class="mr-1">Bleeding Tendencies
                                                      </div>
                                                  </td>
                                                  <td width="1%">
                                                      <input type="checkbox" name="aaas_lain_4"
                                                          id="aaas-lain-4" value="1" class="mr-1">Hamil
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td width="1%">
                                                      <div class="input-group">
                                                          <input type="checkbox"
                                                              name="aaas_lain_5"
                                                              id="aaas-lain-5" value="1"
                                                              class="mr-1">Antikoagula
                                                      </div>
                                                  </td>
                                                  <td width="1%">
                                                      <input type="checkbox" name="aaas_lain_6"
                                                          id="aaas-lain-6" value="1"
                                                          class="mr-1">Kanker
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td width="1%">
                                                      <div class="input-group">
                                                          <input type="checkbox"
                                                              name="aaas_lain_7"
                                                              id="aaas-lain-7" value="1"
                                                              class="mr-1">Riwayat Transfusi
                                                      </div>
                                                  </td>
                                                  <td width="1%">
                                                      <input type="checkbox" name="aaas_lain_8"
                                                          id="aaas-lain-8" value="1"
                                                          class="mr-1">Geriatri
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td width="1%">
                                                      <div class="input-group">
                                                          <input type="checkbox"
                                                              name="aaas_lain_9"
                                                              id="aaas-lain-9" value="1"
                                                              class="mr-1">Imunosupresan
                                                      </div>
                                                  </td>
                                                  <td width="1%">
                                                      <input type="checkbox" name="aaas_lain_10"
                                                          id="aaas-lain-10" value="1"
                                                          class="mr-1">Dehidrasi
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td width="1%">
                                                      <div class="input-group">
                                                          <input type="checkbox" name="aaas_lain_11"
                                                              id="aaas-lain-11" value="1"
                                                              class="mr-1">Neonatus/Pediatri
                                                      </div>
                                                  </td>
                                                  <td width="1%">
                                                      <input type="checkbox" name="aaas_lain_13"id="aaas-lain-13" value="1"class="mr-1"> Lainnya
                                                      <input type="text" name="aaas_lain_12" id="aaas-lain-12"class="custom-form clear-input d-inline-block col-lg-8">
                                                  </td>
                                              </tr>
                                              <!-- <tr>
                                                  <td width="1%"></td>
                                                  <td width="1%">
                                                      Lainnya
                                                      <input type="text" name="aaas_lain_12" id="aaas-lain-12"class="custom-form clear-input d-inline-block col-lg-10">
                                                  </td>
                                              </tr> -->
                                          </table>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <table class="table table-no-border table-sm table-striped"
                                  style="margin-top:-15px">
                                  <tr>
                                      <td colspan="3" class="center bold td-dark">
                                          <button class="btn btn-info btn-xs mr-1 float-left"
                                              type="button" data-toggle="collapse"
                                              data-target="#pemerikksaan-labolatorium"><i
                                                  class="fas fa-expand mr-1"></i>Expand</button>
                                          PEMERIKSAAN LABORATORIUM
                                      </td>
                                  </tr>
                              </table>
                              <div class="collapse multi-collapse mt-2" id="pemerikksaan-labolatorium">
                                  <div class="row">
                                      <div class="col-lg-12">
                                          <table class="table table-sm table-striped"
                                              style="margin-top: -15px">
                                              <tr>
                                                  <td class="center"><b>HEMATOLOGI</b></td>
                                              </tr>
                                          </table>
                                          <table class="table table-no-border table-sm table-striped"
                                              style="margin-top: -15px">
                                              <tr>
                                                  <td class="bold">HB</td>
                                                  <td class="bold">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_hematologi_1" id="aaas-hematologi-1"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="HB">
                                                      </div>
                                                  </td>
                                                  <td class="bold">Leukosit</td>
                                                  <td class="bold">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_hematologi_2"
                                                              id="aaas-hematologi-2"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="Leukosit">
                                                      </div>
                                                  </td>
                                                  <td class="bold">PPT</td>
                                                  <td class="bold">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_hematologi_3"
                                                              id="aaas-hematologi-3"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="PPT">
                                                      </div>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td class="bold">HCt</td>
                                                  <td class="bold">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_hematologi_4"
                                                              id="aaas-hematologi-4"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="HCt">
                                                      </div>
                                                  </td>
                                                  <td class="bold">Trombosit</td>
                                                  <td class="bold">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_hematologi_5"
                                                              id="aaas-hematologi-5"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="Trombosit">
                                                      </div>
                                                  </td>
                                                  <td class="bold">Appt</td>
                                                  <td class="bold">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_hematologi_6"
                                                              id="aaas-hematologi-6"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="Appt">
                                                      </div>
                                                  </td>
                                              </tr>
                                          </table>
                                          <table class="table table-sm table-striped"
                                              style="margin-top: -15px">
                                              <tr>
                                                  <td class="center"><b>SERUM ELEKTROLIT</b></td>
                                              </tr>
                                          </table>
                                          <table class="table table-no-border table-sm table-striped"
                                              style="margin-top: -15px">
                                              <tr>
                                                  <td class="bold">NA</td>
                                                  <td class="bold">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_serum_1" id="aaas-serum-1"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="NA">
                                                      </div>
                                                  </td>
                                                  <td class="bold">K</td>
                                                  <td class="bold">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_serum_2" id="aaas-serum-2"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="K">
                                                      </div>
                                                  </td>
                                                  <td class="bold">CA</td>
                                                  <td class="bold">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_serum_3" id="aaas-serum-3"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="PPT">
                                                      </div>
                                                  </td>
                                                  <td class="bold">CL</td>
                                                  <td class="bold">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_serum_4" id="aaas-serum-4"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="CL">
                                                      </div>
                                                  </td>
                                              </tr>
                                          </table>
                                          </table>
                                          <table class="table table-sm table-striped"
                                              style="margin-top: -15px">
                                              <tr>
                                                  <td class="center"><b>Fungsi Hati</b></td>
                                              </tr>
                                          </table>
                                          <table class="table table-no-border table-sm table-striped"
                                              style="margin-top: -15px">
                                              <tr>
                                                  <td class="bold">SGOT</td>
                                                  <td class="bold">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_fungsi_1" id="aaas-fungsi-1"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="SGOT">
                                                      </div>
                                                  </td>
                                                  <td class="bold">Bil. Direc</td>
                                                  <td class="bold">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_fungsi_2"
                                                              id="aaas-fungsi-2"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="Bil. Direc">
                                                      </div>
                                                  </td>
                                                  <td class="bold">HBs Ag</td>
                                                  <td class="bold">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_fungsi_3"
                                                              id="aaas-fungsi-3"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="HBs Ag">
                                                      </div>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td class="bold">SGPT</td>
                                                  <td class="bold">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_fungsi_4"
                                                              id="aaas-fungsi-4"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="SGPT">
                                                      </div>
                                                  </td>
                                                  <td class="bold">Bil.Indirec</td>
                                                  <td class="bold">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_fungsi_5"
                                                              id="aaas-fungsi-5"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="Bil.Indirec">
                                                      </div>
                                                  </td>
                                                  <td class="bold">AntiHCV</td>
                                                  <td class="bold">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_fungsi_6"
                                                              id="aaas-fungsi-6"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="AntiHCV">
                                                      </div>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td class="bold">Albumin</td>
                                                  <td class="bold">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_fungsi_7"
                                                              id="aaas-fungsi-7"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="Albumin">
                                                      </div>
                                                  </td>
                                                  <td class="bold">Bil.Tot</td>
                                                  <td class="bold">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_fungsi_8"
                                                              id="aaas-fungsi-8"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="Bil.Tot">
                                                      </div>
                                                  </td>                                                                   
                                              </tr>
                                          </table>
                                          <table class="table table-sm table-striped"
                                              style="margin-top: -15px">
                                              <tr>
                                                  <td class="center"><b>FUNGSI GINJAL</b></td>
                                              </tr>
                                          </table>
                                          <table class="table table-no-border table-sm table-striped"
                                              style="margin-top: -15px">
                                              <tr>
                                                  <td class="bold">Ureum</td>
                                                  <td class="bold">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_ginjal_1"
                                                              id="aaas-ginjal-1"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="Ureum">
                                                      </div>
                                                  </td>
                                                  <td class="bold">Creatinin</td>
                                                  <td class="bold">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_ginjal_2"
                                                              id="aaas-ginjal-2"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="Creatinin">
                                                      </div>
                                                  </td>
                                              </tr>
                                          </table>
                                          </table>
                                          <table class="table table-sm table-striped"
                                              style="margin-top: -15px">
                                              <tr>
                                                  <td class="center"><b>ENDOKRIN</b></td>
                                              </tr>
                                          </table>
                                          <table class="table table-no-border table-sm table-striped"
                                              style="margin-top: -15px">
                                              <tr>
                                                  <td class="bold">GDA</td>
                                                  <td class="bold">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_edokorin_1"
                                                              id="aaas-edokorin-1"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="GDA">
                                                      </div>
                                                  </td>
                                                  <td class="bold">T3</td>
                                                  <td class="bold">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_edokorin_2" id="aaas-edokorin-2"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="T3">
                                                      </div>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td class="bold">GDP</td>
                                                  <td class="bold">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_edokorin_3"
                                                              id="aaas-edokorin-3"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="GDP">
                                                      </div>
                                                  </td>
                                                  <td class="bold">T4</td>
                                                  <td class="bold">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_edokorin_4" id="aaas-edokorin-4"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="T4">
                                                      </div>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td class="bold">GD 2 Jam PP</td>
                                                  <td class="bold">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_edokorin_5"
                                                              id="aaas-edokorin-5"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="GD 2">
                                                      </div>
                                                  </td>
                                                  <td class="bold">TSHS</td>
                                                  <td class="bold">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_edokorin_6"
                                                              id="aaas-edokorin-6"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="TSHS">
                                                      </div>
                                                  </td>
                                              </tr>
                                          </table>
                                          <table class="table table-sm table-striped"
                                              style="margin-top: -15px">
                                              <tr>
                                                  <td class="center"><b>AGD</b></td>
                                              </tr>
                                          </table>
                                          <table class="table table-no-border table-sm table-striped"
                                              style="margin-top: -15px">
                                              <tr>
                                                  <td class="bold">pH</td>
                                                  <td class="bold">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_agd_1"
                                                              id="aaas-agd-1"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="pH">
                                                      </div>
                                                  </td>
                                                  <td class="bold">pCo2</td>
                                                  <td class="bold">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_agd_2"
                                                              id="aaas-agd-2"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="pCo2">
                                                      </div>
                                                  </td>
                                                  <td class="bold">pO2</td>
                                                  <td class="bold">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_agd_3"
                                                              id="aaas-agd-3"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="pO2">
                                                      </div>
                                                  </td>
                                                  <td class="bold">BE</td>
                                                  <td class="bold">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_agd_4" id="aaas-agd-4"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="BE">
                                                      </div>
                                                  </td>
                                                  <td class="bold">SpO2</td>
                                                  <td class="bold">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_agd_5"
                                                              id="aaas-agd-5"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="SpO2">
                                                      </div>
                                                  </td>
                                              </tr>
                                          </table>
                                          </table>
                                          <table class="table table-sm table-striped"
                                              style="margin-top: -15px">
                                              <tr>
                                                  <td class="center"><b>PEMERIKSAN PENUNJANG</b></td>
                                              </tr>
                                          </table>
                                          <table class="table table-no-border table-sm table-striped"
                                              style="margin-top: -15px">
                                              <tr>
                                                  <td class="bold">EKG</td>
                                                  <td class="bold">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_pemeriksaan_1"
                                                              id="aaas-pemeriksaan-1"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="EKG">
                                                      </div>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td class="bold">X-Ray</td>
                                                  <td class="bold">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_pemeriksaan_2"
                                                              id="aaas-pemeriksaan-2"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="X-Ray">
                                                      </div>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td class="bold">Echocardiograph</td>
                                                  <td class="bold">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text"
                                                              name="aaas_pemeriksaan_3"
                                                              id="aaas-pemeriksaan-3"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="Echocardiograph">
                                                      </div>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td class="bold">CT-Scan</td>
                                                  <td class="bold">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_pemeriksaan_4"
                                                              id="aaas-pemeriksaan-4"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="CT-Scan">
                                                      </div>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td class="bold">Faal Paru</td>
                                                  <td class="bold">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_pemeriksaan_5"
                                                              id="aaas-pemeriksaan-5"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="Faal Paru">
                                                      </div>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td class="bold">Lain-lain</td>
                                                  <td class="bold">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_pemeriksaan_6"
                                                              id="aaas-pemeriksaan-6"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="Lain-lain">
                                                      </div>
                                                  </td>
                                              </tr>
                                          </table>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-12">
                              <table class="table table-no-border table-sm table-striped"
                                  style="margin-top:-15px">
                                  <tr>
                                      <td colspan="3" class="center bold td-dark">
                                          <button class="btn btn-info btn-xs mr-1 float-left"
                                              type="button" data-toggle="collapse"
                                              data-target="#data-perenccanaan-anestesi-sedasi"><i
                                                  class="fas fa-expand mr-1"></i>Expand</button>PERENCANAAN
                                          ANESTESI SEDASI
                                      </td>
                                  </tr>
                              </table>
                              <div class="collapse multi-collapse mt-2"
                                  id="data-perenccanaan-anestesi-sedasi">
                                  <div class="row">
                                      <div class="col-lg-6">
                                          <table class="table table-sm table-striped"
                                              style="margin-top: -15px">
                                              <tr>
                                                  <td class="center"><b>TEKNIK ANESTESI DAN SEDASI</b>
                                                  </td>
                                              </tr>
                                          </table>
                                          <table class="table table-sm table-striped"
                                              style="margin-top: -15px">
                                              <tr>
                                                  <td> <input type="checkbox" name="baru_1"id="baru-1" value="1"class="mr-1"> Sedasi</td>
                                                  <td>:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_sedasi"
                                                              id="aaas-sedasi"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="Sedasi">
                                                      </div>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td> <input type="checkbox" name="baru_2"id="baru-2" value="1"class="mr-1"> GA</td>
                                                  <td>:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_ga" id="aaas-ga"
                                                              class="custom-form clear-input d-inline-block mr-1 ml-2"
                                                              placeholder="GA">
                                                      </div>
                                                  </td>
                                              </tr>






                                              <tr>
                                                  <td><input type="checkbox" name="baru_3"id="baru-3" value="1"class="mr-1"> Regional</td>
                                                  <td width="1%">:</td>
                                                  <td width="20%">
                                                      <div class="input-group">
                                                          <input type="checkbox" name="aaas_regional_1"
                                                              id="aaas-regional-1" value="Spinal"
                                                              class="mr-1">Spinal
                                                      </div>
                                                  </td>
                                                  <td width="20%">
                                                      <div class="input-group">
                                                          <input type="checkbox" name="aaas_regional_2"
                                                              id="aaas-regional-2" value="Epidural"
                                                              class="mr-1">Epidural
                                                      </div>
                                                  </td>
                                                  <td width="20%">
                                                      <div class="input-group">
                                                          <input type="checkbox" name="aaas_regional_3"
                                                              id="aaas-regional-3" value="Kaudal"
                                                              class="mr-1">Kaudal
                                                      </div>
                                                  </td>
                                                  <td width="20%">
                                                      <div class="input-group">
                                                          <input type="checkbox" name="aaas_regional_4"
                                                              id="aaas-regional-4"
                                                              value="Block Prifer" class="mr-1">Block
                                                          Prifer
                                                      </div>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td> <input type="checkbox" name="baru_4"id="baru-4" value="1"class="mr-1"> Teknik Khusus</td>
                                                  <td width="1%">:</td>
                                                  <td width="20%">
                                                      <div class="input-group">
                                                          <input type="checkbox" name="aaas_teknik_1"
                                                              id="aaas-teknik-1" value="Hipotensi"
                                                              class="mr-1">Hipotensi
                                                      </div>
                                                  </td>
                                                  <td width="20%">
                                                      <div class="input-group">
                                                          <input type="checkbox" name="aaas_teknik_2"
                                                              id="aaas-teknik-2"
                                                              value="Ventilasi satu Paru"
                                                              class="mr-1">Ventilasi satu Paru
                                                      </div>
                                                  </td>
                                                  <td width="20%">
                                                      <div class="input-group">
                                                          <input type="checkbox" name="aaas_teknik_3"
                                                              id="aaas-teknik-3" value="TCI"
                                                              class="mr-1">TCI
                                                      </div>
                                                  </td>
                                                  <td width="20%">
                                                      <div class="input-group">
                                                          <input type="checkbox" name="aaas_teknik_4"
                                                              id="aaas-teknik-4" value="1"
                                                              class="mr-1">Lain-lain
                                                          <input type="text"
                                                              name="aaas_teknik_5"
                                                              id="aaas-teknik-5"
                                                              class="custom-form clear-input d-inline-block col-lg-12"
                                                              placeholder=".......................">
                                                      </div>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td>Monitoring</td>
                                                  <td width="1%">:</td>
                                                  <td width="20%">
                                                      <div class="input-group">
                                                          <input type="checkbox" name="aaas_monitoring_1"
                                                              id="aaas-monitoring-1" value="EKG Lead"
                                                              class="mr-1">EKG Lead
                                                      </div>
                                                  </td>
                                                  <td width="20%">
                                                      <div class="input-group">
                                                          <input type="checkbox" name="aaas_monitoring_2"
                                                              id="aaas-monitoring-2" value="SpO2"
                                                              class="mr-1">SpO2
                                                      </div>
                                                  </td>
                                                  <td width="20%">
                                                      <div class="input-group">
                                                          <input type="checkbox" name="aaas_monitoring_3"
                                                              id="aaas-monitoring-3" value="NIBP"
                                                              class="mr-1">NIBP
                                                      </div>
                                                  </td>
                                                  <td width="20%">
                                                      <div class="input-group">
                                                          <input type="checkbox" name="aaas_monitoring_4"
                                                              id="aaas-monitoring-4" value="Temp"
                                                              class="mr-1">Temp
                                                      </div>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td></td>
                                                  <td width="1%"></td>
                                                  <td width="20%">
                                                      <div class="input-group">
                                                          <input type="checkbox" name="aaas_monitoring_5"
                                                              id="aaas-monitoring-5" value="CVP"
                                                              class="mr-1">CVP
                                                      </div>
                                                  </td>
                                                  <td width="20%">
                                                      <div class="input-group">
                                                          <input type="checkbox" name="aaas_monitoring_6"
                                                              id="aaas-monitoring-6" value="Arteri Line"
                                                              class="mr-1">Arteri Line
                                                      </div>
                                                  </td>
                                                  <td width="20%">
                                                      <div class="input-group">
                                                          <input type="checkbox" name="aaas_monitoring_7"
                                                              id="aaas-monitoring-7" value="ELCO2"
                                                              class="mr-1">ELCO2
                                                      </div>
                                                  </td>
                                                  <td width="20%">
                                                      <div class="input-group">
                                                          <input type="checkbox" name="aaas_monitoring_8"
                                                              id="aaas-monitoring-8" value="BIS"
                                                              class="mr-1">BIS
                                                      </div>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td></td>
                                                  <td width="1%"></td>
                                                  <td width="20%">
                                                      <div class="input-group">
                                                          <input type="checkbox" name="aaas_monitoring_9"
                                                              id="aaas-monitoring-9" value="1"
                                                              class="mr-1">Lain-lain
                                                          <input type="text"
                                                              name="aaas_monitoring_10"
                                                              id="aaas-monitoring-10"
                                                              class="custom-form clear-input d-inline-block col-lg-5 ml-2 disabled"
                                                              placeholder=".......................">
                                                      </div>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td>Alat Khusus</td>
                                                  <td width="1%">:</td>
                                                  <td width="20%">
                                                      <div class="input-group">
                                                          <input type="checkbox" name="aaas_alat_1"
                                                              id="aaas-alat-1"
                                                              value="Bronchoscopy"
                                                              class="mr-1">Bronchoscopy
                                                      </div>
                                                  </td>
                                                  <td width="20%">
                                                      <div class="input-group">
                                                          <input type="checkbox" name="aaas_alat_1"
                                                              id="aaas-alat-2" value="Glidecsope"
                                                              class="mr-1">Glidecsope
                                                      </div>
                                                  </td>
                                                  <td width="20%">
                                                      <div class="input-group">
                                                          <input type="checkbox" name="aaas_alat_1"
                                                              id="aaas-alat-3" value="USG"
                                                              class="mr-1">USG
                                                      </div>
                                                  </td>
                                                  <td width="20%">
                                                      <div class="input-group">
                                                          <input type="checkbox" name="aaas_alat_1"id="aaas-alat-4" value="1"class="mr-1">Lain-lain
                                                          <input type="text"
                                                              name="aaas_alat_5"
                                                              id="aaas-alat-5"
                                                              class="custom-form clear-input d-inline-block col-lg-12"
                                                              placeholder=".......................">
                                                      </div>
                                                  </td>
                                              </tr>






                                              <tr>
                                                  <td>Perawatan Pasca Anestesi</td>
                                                  <td width="1%">:</td>
                                                  <td width="20%">
                                                      <div class="input-group">
                                                          <input type="radio"
                                                              name="aaas_pasca_1"
                                                              id="aaas-pasca-1" value="Rawat Inap"
                                                              class="mr-1">Rawat Inap
                                                      </div>
                                                  </td>
                                                  <td width="20%">
                                                      <div class="input-group">
                                                          <input type="radio"
                                                              name="aaas_pasca_1"
                                                              id="aaas-pasca-2" value="Rawat Jalan"
                                                              class="mr-1">Rawat Jalan
                                                      </div>
                                                  </td>
                                                  <td width="20%">
                                                      <div class="input-group">
                                                          <input type="radio"
                                                              name="aaas_pasca_1"
                                                              id="aaas-pasca-3"
                                                              value="Rawat Khusus" class="mr-1">Rawat
                                                          Khusus
                                                      </div>
                                                  </td>
                                                  <td width="20%">
                                                      <div class="input-group">
                                                          <input type="radio"
                                                              name="aaas_pasca_1"
                                                              id="aaas-pasca-4" value="ICU"
                                                              class="mr-1">ICU
                                                      </div>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td></td>
                                                  <td width="1%"></td>
                                                  <td width="20%">
                                                      <div class="input-group">
                                                          <input type="radio"
                                                              name="aaas_pasca_1"
                                                              id="aaas-pasca-5" value="HCU"
                                                              class="mr-1">HCU
                                                      </div>
                                                  </td>
                                                  <td width="20%">
                                                      <div class="input-group">
                                                          <input type="radio"
                                                              name="aaas_pasca_1"
                                                              id="aaas-pasca-6" value="APS"
                                                              class="mr-1">APS
                                                      </div>
                                                  </td>
                                                  <td width="20%">
                                                      <div class="input-group">
                                                          <input type="radio" name="aaas_pasca_1"
                                                              id="aaas-pasca-7" value="1"
                                                              class="mr-1">Lain-lain
                                                      </div>
                                                  </td>
                                                  <td width="20%">
                                                      <div class="input-group">
                                                          <input type="text"
                                                              name="aaas_pasca_8"
                                                              id="aaas-pasca-8"
                                                              class="custom-form clear-input d-inline-block col-lg-10"
                                                              placeholder=".......................">
                                                      </div>
                                                  </td>
                                              </tr>
                                          </table>
                                          <table class="table table-sm table-striped"
                                              style="margin-top: -15px">
                                              <tr>
                                                  <td class="center"><b>KESIMPULAN ASSESMEN AWAL
                                                          ANESTESI/SEDASI</b></td>
                                              </tr>
                                          </table>
                                          <table class="table table-sm table-striped"
                                              style="margin-top: -15px">
                                              <tr>
                                                  <td>PS ASA</td>
                                                  <td width="1%">:</td>
                                                  <td width="15%">
                                                      <div class="input-group">
                                                          <input type="radio" name="aaas_ps_1"
                                                              id="aaas-ps-1" value="1"
                                                              class="mr-1">1
                                                      </div>
                                                  </td>
                                                  <td width="15%">
                                                      <div class="input-group">
                                                          <input type="radio" name="aaas_ps_1"
                                                              id="aaas-ps-2" value="2"
                                                              class="mr-1">2
                                                      </div>
                                                  </td>
                                                  <td width="15%">
                                                      <div class="input-group">
                                                          <input type="radio" name="aaas_ps_1"
                                                              id="aaas-ps-3" value="3"
                                                              class="mr-1">3
                                                      </div>
                                                  </td>
                                                  <td width="15%">
                                                      <div class="input-group">
                                                          <input type="radio" name="aaas_ps_1"
                                                              id="aaas-ps-4" value="4"
                                                              class="mr-1">4
                                                      </div>
                                                  </td>
                                                  <td width="15%">
                                                      <div class="input-group">
                                                          <input type="radio" name="aaas_ps_1"
                                                              id="aaas-ps-5" value="5"
                                                              class="mr-1">5
                                                      </div>
                                                  </td>
                                                  <td width="15%">
                                                      <div class="input-group">
                                                          <input type="radio" name="aaas_ps_1"
                                                              id="aaas-ps-6" value="6"
                                                              class="mr-1">E
                                                      </div>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td>Penyulit</td>
                                                  <td width="1%">:</td>
                                                  <td colspan="6">
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_penyulit"
                                                              id="aaas-penyulit"
                                                              class="custom-form clear-input d-inline-block col-lg-12"
                                                              placeholder="Penyulit">
                                                      </div>
                                                  </td>
                                              </tr>
                                          </table>
                                      </div>
                                      <div class="col-lg-6">
                                          <table class="table table-sm table-striped"
                                              style="margin-top: -15px">
                                              <tr>
                                                  <td class="center"><b>PERSIAPAN PRA ANESTESI</b>
                                                  </td>
                                              </tr>
                                          </table>
                                          <table class="table table-sm table-striped"
                                              style="margin-top: -15px">
                                              <tr>
                                                  <td width="20%"><b>Puasa</b></td>
                                                  <td width="1%">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_puasa"
                                                              id="aaas-puasa"
                                                              class="custom-form clear-input d-inline-block col-lg-12"
                                                              placeholder="Puasa">
                                                      </div>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td width="20%"><b>Premedikal</b></td>
                                                  <td width="1%">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_premedikal"
                                                              id="aaas-premedikal"
                                                              class="custom-form clear-input d-inline-block col-lg-12"
                                                              placeholder="Premedikal">
                                                      </div>
                                                  </td>
                                              </tr>
                                          </table>
                                          <table class="table table-sm table-striped"
                                              style="margin-top: -15px">
                                              <tr>
                                                  <td class="center"><b>CATATAN PRA ANESTESI</b></td>
                                              </tr>
                                          </table>
                                          <table class="table table-sm table-striped"
                                              style="margin-top: -15px">
                                              <tr>
                                                  <td width="20%"><b>Catatan</b></td>
                                                  <td width="1%">:</td>
                                                  <td>
                                                      <div class="input-group">
                                                          <input type="text" name="aaas_catatan"
                                                              id="aaas-catatan"
                                                              class="custom-form clear-input d-inline-block col-lg-12"
                                                              placeholder="Catatan Pra Anestesi">
                                                      </div>
                                                  </td>
                                              </tr>
                                          </table>
                                          <table class="table table-sm table-striped"
                                              style="margin-top: -15px">
                                              <tr>
                                                  <td class="center"><b>PEMERIKSA PASIEN</b></td>
                                              </tr>
                                          </table>
                                          <table class="table table-sm table-striped"
                                              style="margin-top: -15px">
                                              <tr>
                                                  <td width="20%"><b>Tanggal & Jam</b></td>
                                                  <td width="1%">:</td>
                                                  <td colspan="2">
                                                      <div class="input-group">
                                                          <input type="text"
                                                              name="aaas_tanggal_pemeriksaan_pasien"
                                                              id="aaas-tanggal-pemeriksaan-pasien"
                                                              class="custom-form clear-input d-inline-block col-lg-5"
                                                              placeholder="dd/mm/yyyy hh:ii">
                                                      </div>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td width="20%"><b>Pemeriksa</b></td>
                                                  <td width="1%">:</td>
                                                  <td colspan="2">
                                                      <div class="input-group">
                                                          <input type="text"
                                                              name="aaas_pemeriksa_asesmen_anestesi"
                                                              id="aaas-pemeriksa-asesmen-anestesi"
                                                              class="select2c-input">
                                                      </div>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td width="20%"></td>
                                                  <td width="1%"></td>
                                                  <td width="44%"></td>
                                                  <td class="center">
                                                      <input type="checkbox" name="aaas_pemeriksa"
                                                          id="aaas-pemeriksa" value="1">
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td width="20%"></td>
                                                  <td width="1%"></td>
                                                  <td width="44%"></td>
                                                  <td class="center">
                                                      Nama Jelas & Tanda Tangan
                                                  </td>
                                              </tr>
                                          </table>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <?= form_close() ?>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
        <button id="btn-simpan" type="button" class="btn btn-info" onclick="konfirmasiSimpanAsesmentAwalAnestesiSedasi()"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
      </div>
    </div>
  </div>
</div>