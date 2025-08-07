
<!-- Modal Entri Keperawatan // CTKN -->
<div class="modal fade" id="modal_nurse_note" role="dialog" data-backdrop="static" aria-labelledby="modal-resume-keperawatan-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
    <div class="modal-content">
      <div class="modal-header">
        <div class="title">
          <h5 class="modal-title bold" id="modal_nurse_note">CATATAN TINDAKAN KEPERAWATAN / NURSE NOTE</h5>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'id=form_entri_catatan_tindakan_keperawatan_nursenote class="form-horizontal"') ?>
        <input type="hidden" name="id_layanan_pendaftaran" id="ek_id_layanan_pendaftaran">
        <input type="hidden" name="id_pendaftaran" id="ek-id-pendaftaran">
        <input type="hidden" name="id_bed" id="ek-id-bed">
        <input type="hidden" name="ek_id_pasien" id="ek_id_pasien">
        <input type="hidden" name="ek_jenis_layanan" value="Rawat Inap" id="ek-jenis-layanan">
        <input type="hidden" name="id_users" id="ek-id-users"value="<?= $this->session->userdata('id_translucent') ?>">
        
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
        <div class="row">
          <div class="col-lg-12">
            <div class="card-body">


              <!-- Catatan Tindakan Keperawatan / Nurse Note-->
              <div class="form-catatan-tindakan-keperawatan">
                <table class="table table-no-border table-sm table-striped">
                  <tr>
                    <td colspan="3">
                      <button class="btn btn-info btn-xs mr-1 float-left" type="button" id="ctk_btn_expand_all"><i class="fas fa-fw fa-expand mr-1"></i>Expand All</button>
                      <button class="btn btn-warning btn-xs mr-1 float-left" type="button" id="ctk_btn_collapse_all"><i class="fas fa-fw fa-compress mr-1"></i>Collapse All</button>
                    </td>
                  </tr>
                </table>
                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                  <tr>
                    <td colspan="3" class="center bold td-dark">
                      <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#nurse-note"><i class="fas fa-expand mr-1"></i>Expand</button>KEGIATAN TINDAKAN
                      KEPERAWATAN
                    </td>
                  </tr>
                </table>
                <div class="collapse multi-collapse mt-2" id="nurse-note">
                  <table class="table table-no-border table-sm table-striped">
                    <tr>
                      <td>Kegiatan</td>
                      <td>:</td>
                      <td>
                        <div id="catatan-tindakan">
                          <input type="text" name="keg_tindakan_keperawatan" id="ek-catatan-tindakan" class="select2c-input ml-2">
                        </div>
                        <div id="tindakan-manual">
                          <input type="text" name="keg_tindakan_keperawatan_manual" id="ek-catatan-tindakan-manual" class="custom-form clear-input d-inline-block col-lg-3 ml-2" placeholder="Masukan kegiatan manual">
                        </div>
                        <div>
                          <input type="checkbox" name="keg_cek_tindakan_manual" id="ek-cek-tindakan-manual" class=" ml-2">
                          <label for="ek-cek-tindakan-manual" style="vertical-align: text-bottom;">Input Kegiatan Manual</label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td width="15%">Keterangan Catatan</td>
                      <td width="1%">:</td>
                      <td width="84%">
                        <input type="text" name="ek_keterangan_catatan" id="ek-keterangan-catatan" class="custom-form clear-input d-inline-block col-lg-3 ml-2 disabled" placeholder=".......................">
                      </td>
                    </tr>
                    <tr>
                      <td>Hari/Tanggal</td>
                      <td>:</td>
                      <td>
                        <input type="text" name="ek_tanggal_catatan_tindakan" id="ek-tanggal-catatan-tindakan" class="custom-form clear-input d-inline-block col-lg-1 ml-2" placeholder="dd/mm/yyyy">
                      </td>
                    </tr>
                    <table class="table table-sm table-striped table-bordered">
                      <thead>
                        <tr style="background-color: #f0f0f0;">
                          <th style="width: 15%; font-weight: bold;">Aksi Perawatan 🩺💖</th>
                          <th class="center" style="background-color: #FFD700; color: Olive; font-size: 20px;">DINAS PAGI 📝📋</th>
                          <th class="center" style="background-color: #00BFFF; color: Olive; font-size: 20px;">DINAS SORE 👨‍⚕️👩‍⚕️</th>
                          <th class="center" style="background-color: #40E0D0; color: Olive; font-size: 20px;">DINAS MALAM 🏥💉</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th>BISMILLAHIRRAHMANIRRAHIM<br><div style="text-align: center; font-size: 12px;">( بِسْمِ ٱللّٰهِ ٱلرَّحْمَٰنِ ٱلرَّحِيمِ  )</div></th>
                          <td><input type="checkbox" name="ek_bismillah_pagi" id="ek-bismillah-pagi" value="1" class="mr-1 ml-2" style="transform: scale(1.2);"></td>
                          <td><input type="checkbox" name="ek_bismillah_sore" id="ek-bismillah-sore" value="1" class="mr-1 ml-2" style="transform: scale(1.2);"></td>
                          <td><input type="checkbox" name="ek_bismillah_malam" id="ek-bismillah-malam" value="1" class="mr-1 ml-2" style="transform: scale(1.2);"></td>
                        </tr>
                        <tr>
                          <th>CEKLIST</th>
                          <td><input type="checkbox" name="ek_cek_pagi" id="ek-cek-pagi" value="1" class="mr-1 ml-2" style="transform: scale(1.2);"></td>
                          <td><input type="checkbox" name="ek_cek_sore" id="ek-cek-sore" value="1" class="mr-1 ml-2" style="transform: scale(1.2);"></td>
                          <td><input type="checkbox" name="ek_cek_malam" id="ek-cek-malam" value="1" class="mr-1 ml-2" style="transform: scale(1.2);"></td>
                        </tr>
                        <tr>
                          <th>JAM</th>
                          <td><input type="text" name="ek_jam_pagi" id="ek-jam-pagi" class="custom-form clear-input d-inline-block col-lg-2 ml-2"></td>
                          <td><input type="text" name="ek_jam_sore" id="ek-jam-sore" class="custom-form clear-input d-inline-block col-lg-2 ml-2"></td>
                          <td><input type="text" name="ek_jam_malam" id="ek-jam-malam" class="custom-form clear-input d-inline-block col-lg-2 ml-2"></td>
                        </tr>
                        <tr>
                          <th>PARAF</th>
                          <td><input type="checkbox" name="ek_paraf_pagi" id="ek-paraf-pagi" value="1" class="mr-1 ml-2" style="transform: scale(1.2);"></td>
                          <td><input type="checkbox" name="ek_paraf_sore" id="ek-paraf-sore" value="1" class="mr-1 ml-2" style="transform: scale(1.2);"></td>
                          <td><input type="checkbox" name="ek_paraf_malam" id="ek-paraf-malam" value="1" class="mr-1 ml-2" style="transform: scale(1.2);"></td>
                        </tr>
                        <tr>
                          <th>PERAWAT/BIDAN</th>
                          <td><input type="text" name="ek_perawat_tindakan_pagi" id="ek-perawat-tindakan-pagi" class="select2c-input ml-2"></td>
                          <td><input type="text" name="ek_perawat_tindakan_sore" id="ek-perawat-tindakan-sore" class="select2c-input ml-2"></td>
                          <td><input type="text" name="ek_perawat_tindakan_malam" id="ek-perawat-tindakan-malam" class="select2c-input ml-2"></td>
                        </tr>
                        <tr>
                          <th>ALHAMDULILLAHHIROBBIL'ALAMIN<br><div style="text-align: center; font-size: 12px;">( ٱلْـحَمْدُ لِلّٰهِ رَبِّ ٱلْعَٰلَمِينَ )</div></th>
                          <td><input type="checkbox" name="ek_hamdalah_pagi" id="ek-hamdalah-pagi" value="1" class="mr-1 ml-2" style="transform: scale(1.2);"></td>
                          <td><input type="checkbox" name="ek_hamdalah_sore" id="ek-hamdalah-sore" value="1" class="mr-1 ml-2" style="transform: scale(1.2);"></td>
                          <td><input type="checkbox" name="ek_hamdalah_malam" id="ek-hamdalah-malam" value="1" class="mr-1 ml-2" style="transform: scale(1.2);"></td>
                        </tr>
                      </tbody>
                    </table>
                    <tr>
                      <td>
                        <button type="button" title="Tambah Catatan" class="btn btn-info" onclick="tambahCatatanTindakan()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Catatan
                          Tindakan</button>
                      </td>
                    </tr>
                  </table>
                  <hr>
                  <table class="table table-sm table-striped table-bordered" id="tabel-catatan-tindakan-keperawatan">
                    <thead style="background-color: #B0C4DE;">
                      <tr>
                        <th class="center" rowspan="2"><b>No</b></th>
                        <th class="center" rowspan="2"><b>Kegiatan</b></th>
                        <th class="center" rowspan="2"><b>Keterangan</b></th>
                        <th class="center" rowspan="2"><b>Tanggal</b></th>
                        <th class="center" rowspan="2" style="writing-mode: vertical-rl; -moz-transform: rotate(180deg); -webkit-transform: rotate(180deg); -o-transform: rotate(180deg); -ms-transform: rotate(180deg); transform: rotate(180deg);">
                          Bismillahirrohmanirrohim </th>
                        <th class="center" colspan="4" style="color: Navy; font-size: 30px; text-align: center;"><b>Pagi</b></th>

                        <th class="center" rowspan="2" style="writing-mode: vertical-rl; -moz-transform: rotate(180deg); -webkit-transform: rotate(180deg); -o-transform: rotate(180deg); -ms-transform: rotate(180deg); transform: rotate(180deg);">
                          Alhamdulillahirobbil'alamin</th>
                        <th class="center" rowspan="2" style="writing-mode: vertical-rl; -moz-transform: rotate(180deg); -webkit-transform: rotate(180deg); -o-transform: rotate(180deg); -ms-transform: rotate(180deg); transform: rotate(180deg);">
                          Bismillahirrohmanirrohim</th>
                        <th class="center" colspan="4" style="color: Purple; font-size: 30px; text-align: center;"><b>Sore</b></th>
                        <th class="center" rowspan="2" style="writing-mode: vertical-rl; -moz-transform: rotate(180deg); -webkit-transform: rotate(180deg); -o-transform: rotate(180deg); -ms-transform: rotate(180deg); transform: rotate(180deg);">
                          Alhamdulillahirobbil'alamin</th>
                        <th class="center" rowspan="2" style="writing-mode: vertical-rl; -moz-transform: rotate(180deg); -webkit-transform: rotate(180deg); -o-transform: rotate(180deg); -ms-transform: rotate(180deg); transform: rotate(180deg);">
                          Bismillahirrohmanirrohim</th>
                        <th class="center" colspan="4" style="color: Red; font-size: 30px; text-align: center;"><b>Malam</b></th>
                        <th class="center" rowspan="2" style="writing-mode: vertical-rl; -moz-transform: rotate(180deg); -webkit-transform: rotate(180deg); -o-transform: rotate(180deg); -ms-transform: rotate(180deg); transform: rotate(180deg);">
                          Alhamdulillahirobbil'alamin</th>
                        <th width="6%" class="center" rowspan="2"><b></b>Alat</th>
                      </tr>
                      <tr>
                        <th class="center"><span style="color: Navy;">(✔)</span></th> 
                        <th class="center">Jam</th>
                        <th class="center">paraf</th>
                        <th class="center">Nama Perawat</th>
                        <th class="center"><span style="color: Purple;">(✔)</span></th>
                        <th class="center">Jam</th>
                        <th class="center">paraf</th>
                        <th class="center">Nama Perawat</th>
                        <th class="center"><span style="color: Red;">(✔)</span></th>
                        <th class="center">Jam</th>
                        <th class="center">paraf</th>
                        <th class="center">Nama Perawat</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                  </table>
                </div>
              </div>
              <?= form_close() ?>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
        <button id="btn-simpan" type="button" class="btn btn-info" onclick="konfirmasiSimpanCatatanTindakanKeperawatanNursenote()"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Entri Keperawatan -->

<!-- Modal Edit Catatan Tindakan Keperawatan -->
<div id="modal-edit-catatan-tindakan" class="modal fade" role="dialog">
  <div class="modal-dialog" style="max-width: 75%">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" style="background-color: #7FFF00; color: black; font-size: 30px;">Edit Catatan Tindakan Keperawatan</h4>  
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
                <input type="text" name="ek_catatan_tindakan_keperawatan" id="ek-edit-catatan-tindakan" class="select2c-input ml-2">

              </div>
              <div id="edit-tindakan-manual">
                <input type="text" name="ek_catatan_tindakan_keperawatan_manual" id="ek-edit-catatan-tindakan-manual" class="custom-form clear-input d-inline-block col-lg-8 ml-2" placeholder="Masukan kegiatan manual">
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
          <table class="table table-sm table-striped table-bordered">
            <thead>
              <tr style="background-color: #f0f0f0;">
                <th style="width: 15%;">Item</th>
                <th class="center" style="background-color: #FFD700; color: Olive; font-size: 20px;">DINAS PAGI 😊</th>
                <th class="center" style="background-color: #00BFFF; color: Olive; font-size: 20px;">DINAS SORE 😊</th>
                <th class="center" style="background-color: #40E0D0; color: Olive; font-size: 20px;">DINAS MALAM 😊</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>BISMILLAHIRRAHMANIRRAHIM</th>
                <td><input type="checkbox" name="ek_bismillah_pagi" id="ek-edit-bismillah-pagi" class="mr-1 ml-2" style="transform: scale(1.2);"></td>
                <td><input type="checkbox" name="ek_bismillah_sore" id="ek-edit-bismillah-sore" class="mr-1 ml-2" style="transform: scale(1.2);"></td>
                <td><input type="checkbox" name="ek_bismillah_malam" id="ek-edit-bismillah-malam" class="mr-1 ml-2" style="transform: scale(1.2);"></td>
              </tr>
              <tr>
                <th>CEKLIST</th>
                <td><input type="checkbox" name="ek_cek_pagi" id="ek-edit-cek-pagi" class="mr-1 ml-2" style="transform: scale(1.2);"></td>
                <td><input type="checkbox" name="ek_cek_sore" id="ek-edit-cek-sore" class="mr-1 ml-2" style="transform: scale(1.2);"></td>
                <td><input type="checkbox" name="ek_cek_malam" id="ek-edit-cek-malam" class="mr-1 ml-2" style="transform: scale(1.2);"></td>
              </tr>
              <tr>
                <th>JAM</th>
                <td><input type="text" name="ek_jam_pagi" id="ek-edit-jam-pagi" class="custom-form clear-input d-inline-block col-lg-2 ml-2"></td>
                <td><input type="text" name="ek_jam_sore" id="ek-edit-jam-sore" class="custom-form clear-input d-inline-block col-lg-2 ml-2"></td>
                <td><input type="text" name="ek_jam_malam" id="ek-edit-jam-malam" class="custom-form clear-input d-inline-block col-lg-2 ml-2"></td>
              </tr>
              <tr>
                <th>PARAF</th>
                <td><input type="checkbox" name="ek_paraf_pagi" id="ek-edit-paraf-pagi" class="mr-1 ml-2" style="transform: scale(1.2);"></td>
                <td><input type="checkbox" name="ek_paraf_sore" id="ek-edit-paraf-sore" class="mr-1 ml-2" style="transform: scale(1.2);"></td>
                <td><input type="checkbox" name="ek_paraf_malam" id="ek-edit-paraf-malam" class="mr-1 ml-2" style="transform: scale(1.2);"></td>
              </tr>
              <tr>
                <th>PERAWAT/BIDAN</th>
                <td><input type="text" name="ek_perawat_tindakan_pagi" id="ek-edit-perawat-tindakan-pagi" class="select2c-input ml-2"></td>
                <td><input type="text" name="ek_perawat_tindakan_sore" id="ek-edit-perawat-tindakan-sore" class="select2c-input ml-2"></td>
                <td><input type="text" name="ek_perawat_tindakan_malam" id="ek-edit-perawat-tindakan-malam" class="select2c-input ml-2"></td>
              </tr>
              <tr>
                <th>ALHAMDULILLAHHIROBBIL'ALAMIN</th>
                <td><input type="checkbox" name="ek_hamdalah_pagi" id="ek-edit-hamdalah-pagi" class="mr-1 ml-2" style="transform: scale(1.2);"></td>
                <td><input type="checkbox" name="ek_hamdalah_sore" id="ek-edit-hamdalah-sore" class="mr-1 ml-2" style="transform: scale(1.2);"></td>
                <td><input type="checkbox" name="ek_hamdalah_malam" id="ek-edit-hamdalah-malam" class="mr-1 ml-2" style="transform: scale(1.2);"></td>
              </tr>
            </tbody>
          </table>
        </table>
        <hr>
        <?= form_close(); ?>
      </div>
      <div class="modal-footer" id="update-catatan-tdkn">
      </div>
    </div>
  </div>
</div>
<!-- End Modal Edit Catatan Tindakan Keperawatan -->