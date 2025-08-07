<!-- // FLISUB -->
<div class="modal fade" id="modal_fli" role="dialog" data-backdrop="static" aria-labelledby="modal_fli_label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
    <div class="modal-content">
      <div class="modal-header">
        <div class="title">
          <h5 class="modal-title bold" id="modal_ffmpp_title">FORMULIR LAPORAN INSIDEN KE SUB KOMITE KESELAMATAN PASIEN</h5>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'id=form_fli class="form-horizontal"') ?>
          <input type="hidden" name="id_fli" id="id_fli">
          <input type="hidden" name="id_pendaftaran" id="id_pendaftaran_fli">
          <input type="hidden" name="id_layanan_pendaftaran" id="id_layanan_pendaftaran_fli">
          <input type="hidden" name="id_pasien" id="id_pasien_fli">
          <input type="hidden" name="id_users" value="<?= $this->session->userdata("id_translucent") ?>">
          <input type="hidden" name="action" id="action_fli">

          <div class="row">
            <div class="col-lg-6">
              <div class="table-responsive">
                <table class="table table-sm table-striped">
                  <tr>
                    <td width="20%" class="bold">Nama Pasien</td>
                    <td wdith="80%">: <span id="fli_nama_pasien"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">No. RM</td>
                    <td>: <span id="fli_no_rm"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">Tempat Layanan</td>
                    <td>: <span id="fli_tempat_layanan"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">Tanggal Lahir</td>
                    <td>: <span id="fli_tanggal_lahir"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">Jenis Kelamin</td>
                    <td>: <span id="fli_jenis_kelamin"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">Alamat</td>
                    <td>: <span id="fli_alamat"></span></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- form -->
              <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                <tr>
                  <td colspan="3" class="center bold td-dark">
                    LAPORAN INSIDEN (INTERNAL)
                  </td>
                </tr>
              </table>

              <table class="table table-no-border table-sm table-striped">
                <tr>
                  <td class="bold" width="1%">I.</td>
                  <td class="bold" width="25%" colspan="3">Data Pasien</td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Nama</td>
                  <td width="1%">:</td>
                  <td><input type="text" name="fli_nama" id="fli_nama" class="custom-form clear-input d-inline-block col-lg-3 ml-2"></td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">No MR</td>
                  <td width="1%">:</td>
                  <td><input type="number" name="fli_no_rm" id="fli_no_rm" class="custom-form clear-input d-inline-block col-lg-3 ml-2"></td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Ruangan</td>
                  <td width="1%">:</td>
                  <td><input type="text" name="fli_ruangan" id="fli_ruangan" class="custom-form clear-input d-inline-block col-lg-3 ml-2"></td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Umur</td>
                  <td width="1%">:</td>
                  <td><input type="text" name="fli_umur" id="fli_umur" class="custom-form clear-input d-inline-block col-lg-3 ml-2"></td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Jenis Kelamin</td>
                  <td width="1%">:</td>
                  <td>
                    <input type="radio" name="fli_jenis_kelamin" id="fli_jenis_kelamin_1" value="1" class="mr-1 ml-2">Laki-laki
                    <input type="radio" name="fli_jenis_kelamin" id="fli_jenis_kelamin_2" value="2" class="mr-1 ml-2">Perempuan 
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Penanggung biaya pasien</td>
                  <td width="1%">:</td>
                  <td>
                    <select name="fli_biaya" id="fli_biaya" class="custom-form col-lg-3 ml-2">
                      <option value="">Pilih ...</option>
                      <option value="1">Pribadi</option>
                      <option value="2">Asuransi Swasta</option>
                      <option value="3">ASKES Pemerintah</option>
                      <option value="4">Perusahaan</option>
                      <option value="5">JAMKESMAS</option>
                      <option value="6">JAMKESDA</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Tanggal Dan Jam Masuk</td>
                  <td width="1%">:</td>
                  <td><input type="text" name="fli_tanggal" id="fli_tanggal" class="custom-form clear-input d-inline-block col-lg-3 ml-2" placeholder="dd/mm/yyyy hhh:mm"></td>
                </tr>
                <tr>
                  <td class="bold" width="1%">II.</td>
                  <td class="bold" colspan="3">RINCIAN KEJADIAN</td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Tanggal Dan Waktu Insiden</td>
                  <td width="1%">:</td>
                  <td><input type="text" name="fli_tanggal_insiden" id="fli_tanggal_insiden" class="custom-form clear-input d-inline-block col-lg-3 ml-2" placeholder="dd/mm/yyyy hhh:mm"></td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Insiden</td>
                  <td width="1%">:</td>
                  <td><input type="text" name="fli_insiden" id="fli_insiden" class="custom-form clear-input d-inline-block col-lg-3 ml-2"></td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">kronologi Insiden</td>
                  <td width="1%">:</td>
                  <td><textarea name="fli_kronologi" id="fli_kronologi" class="form-control col-lg-6 ml-2" rows="5"></textarea></td>
                </tr>
                <!-- <tr>
                  <td></td>
                  <td width="25%">Jenis Insiden</td>
                  <td width="1%">:</td>
                  <td>
                    <input type="radio" name="fli_jenis_insiden" id="fli_jenis_insiden_1" value="1" class="mr-1 ml-2">Kejadian Nyaris Cedera / KNC (Near miss)
                    <input type="radio" name="fli_jenis_insiden" id="fli_jenis_insiden_2" value="2" class="mr-1 ml-2">Kejadian Tidak cedera / KTC (No Harm)
                    <input type="radio" name="fli_jenis_insiden" id="fli_jenis_insiden_3" value="3" class="mr-1 ml-2">Kejadian Tidak diharapkan / KTD (Adverse Event) / Kejadian Sentinel (Sentinel Event)
                  </td>
                </tr> -->
                <!-- <tr>
                  <td></td>
                  <td width="25%">Orang Pertama Yang Melaporkan Insiden</td>
                  <td width="1%">:</td>
                  <td>
                    <input type="radio" name="fli_lapor" id="fli_lapor_1" value="1" class="mr-1 ml-2">Karyawan : Dokter / Perawat / Petugas lainnya
                    <input type="radio" name="fli_lapor" id="fli_lapor_2" value="2" class="mr-1 ml-2">Pasien
                    <input type="radio" name="fli_lapor" id="fli_lapor_3" value="3" class="mr-1 ml-2">Keluarga / Pendamping pasien
                    <input type="radio" name="fli_lapor" id="fli_lapor_4" value="4" class="mr-1 ml-2">Pengunjung
                    <input type="radio" name="fli_lapor" id="fli_lapor_5" value="5" class="mr-1 ml-2">Lain-lain
                  </td>
                </tr> -->
                <tr>
                  <td></td>
                  <td width="25%">Jenis Insiden</td>
                  <td width="1%">:</td>
                  <td>
                    <select name="fli_jenis_insiden" id="fli_jenis_insiden" class="custom-form col-lg-3 ml-2">
                      <option value="">Pilih ...</option>
                      <option value="1">Kejadian Nyaris Cedera / KNC (Near miss)</option>
                      <option value="2">Kejadian Tidak cedera / KTC (No Harm)</option>
                      <option value="3">Kejadian Tidak diharapkan / KTD (Adverse Event) / Kejadian Sentinel (Sentinel Event)</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Orang Pertama Yang Melaporkan Insiden</td>
                  <td width="1%">:</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <select name="fli_lapor" id="fli_lapor" class="custom-form col-lg-3 mx-2">
                        <option value="">Pilih ...</option>
                        <option value="1">Karyawan: Dokter / Perawat / Petugas lainnya</option>
                        <option value="2">Pasien</option>
                        <option value="3">Keluarga / Pendamping pasien</option>
                        <option value="4">Pengunjung</option>
                        <option value="5">Lain-lain</option>
                      </select>
                      <input type="text"  name="fli_lapor_keterangan"  id="fli_lapor_keterangan"  class="custom-form col-lg-3" placeholder="Keterangan" disabled>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Insiden terjadi pada</td>
                  <td width="1%">:</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <select name="fli_terjadi" id="fli_terjadi" class="custom-form col-lg-3 mx-2">
                        <option value="">Pilih ...</option>
                        <option value="1">Pasien</option>
                        <option value="2">Lain-lain</option>
                      </select>
                      <input type="text"  name="fli_terjadi_keterangan"  id="fli_terjadi_keterangan"  class="custom-form col-lg-3" placeholder="Keterangan" disabled>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Insiden menyangkut pasien</td>
                  <td width="1%">:</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <select name="fli_menyangkut" id="fli_menyangkut" class="custom-form col-lg-3 mx-2">
                        <option value="">Pilih ...</option>
                        <option value="1">Pasien rawat inap</option>
                        <option value="2">Pasien rawat jalan</option>
                        <option value="3">Pasien UGD</option>
                        <option value="4">Lain-lain</option>
                      </select>
                      <input type="text"  name="fli_menyangkut_keterangan"  id="fli_menyangkut_keterangan"  class="custom-form col-lg-3" placeholder="Keterangan" disabled>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Tempat Insiden</td>
                  <td width="1%">:</td>
                  <td><input type="text" name="fli_tempat" id="fli_tempat" class="custom-form clear-input d-inline-block col-lg-3 ml-2"></td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Insiden terjadi pada pasien : (sesuai kasus penyakit / spesialisasi)</td>
                  <td width="1%">:</td>
                  <td>
                    <input type="checkbox" name="fli_penyakit_dalam" id="fli_penyakit_dalam" class="ml-2 mr-1" value="1"> Penyakit Dalam dan Subspesialisasinya
                    <input type="checkbox" name="fli_penyakit_anak" id="fli_penyakit_anak" class="ml-2 mr-1" value="1"> Anak dan Subspesialisasinya
                    <input type="checkbox" name="fli_penyakit_bedah" id="fli_penyakit_bedah" class="ml-2 mr-1" value="1"> Bedah dan Subspesialisasinya
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%"></td>
                  <td width="1%"></td>
                  <td>
                    <input type="checkbox" name="fli_penyakit_obstetri" id="fli_penyakit_obstetri" class="ml-2 mr-1" value="1"> Obstetri Gynekologi dan Subspesialisasinya
                    <input type="checkbox" name="fli_penyakit_tht" id="fli_penyakit_tht" class="ml-2 mr-1" value="1"> THT dan Subspesialisasinya
                    <input type="checkbox" name="fli_penyakit_mata" id="fli_penyakit_mata" class="ml-2 mr-1" value="1"> Mata dan Subspesialisasinya
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%"></td>
                  <td width="1%"></td>
                  <td>
                    <input type="checkbox" name="fli_penyakit_syaraf" id="fli_penyakit_syaraf" class="ml-2 mr-1" value="1"> Saraf dan Subspesialisasinya
                    <input type="checkbox" name="fli_penyakit_anastesi" id="fli_penyakit_anastesi" class="ml-2 mr-1" value="1"> Anastesi dan Subspesialisasinya
                    <input type="checkbox" name="fli_penyakit_kulit" id="fli_penyakit_kulit" class="ml-2 mr-1" value="1"> Kulit & Kelamin dan Subspesialisasinya
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%"></td>
                  <td width="1%"></td>
                  <td>
                    <input type="checkbox" name="fli_penyakit_jantung" id="fli_penyakit_jantung" class="ml-2 mr-1" value="1"> Jantung dan Subspesialisasinya
                    <input type="checkbox" name="fli_penyakit_paru" id="fli_penyakit_paru" class="ml-2 mr-1" value="1"> Paru dan Subspesialisasinya
                    <input type="checkbox" name="fli_penyakit_jiwa" id="fli_penyakit_jiwa" class="ml-2 mr-1" value="1"> Jiwa dan Subspesialisasinya
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%"></td>
                  <td width="1%"></td>
                  <td>
                    <input type="text"  name="fli_penyakit_keterangan"  id="fli_penyakit_keterangan"  class="custom-form col-lg-3 ml-2" placeholder="Lain-lain">
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Unit / Departemen terkait yang menyebabkan insiden</td>
                  <td width="1%">:</td>
                  <td><input type="text" name="fli_unit" id="fli_unit" class="custom-form clear-input d-inline-block col-lg-3 ml-2"></td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Akibat Insiden Terhadap Pasien</td>
                  <td width="1%">:</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <select name="fli_akibat" id="fli_akibat" class="custom-form col-lg-3 mx-2">
                        <option value="">Pilih ...</option>
                        <option value="1">Kematian</option>
                        <option value="2">Cedera Irreversibel / Cedera Berat</option>
                        <option value="3">Cedera Reversibel / Cedera Sedang</option>
                        <option value="4">Cedera Ringan</option>
                        <option value="5">Tidak ada cedera</option>
                      </select>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Tindakan yang dilakukan segera setelah kejadian, dan hasilnya </td>
                  <td width="1%">:</td>
                  <td><textarea name="fli_tindakan" id="fli_tindakan" class="form-control col-lg-6 ml-2" rows="5"></textarea></td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Tindakan dilakukan oleh</td>
                  <td width="1%">:</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <input type="checkbox" name="fli_tindakan_tim" id="fli_tindakan_tim" class="ml-2 mr-1" value="1"> Tim : terdiri dari
                      <input type="text"  name="fli_tindakan_tim_keterangan"  id="fli_tindakan_tim_keterangan"  class="custom-form col-lg-3 ml-2" placeholder="Keterangan" disabled>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%"></td>
                  <td width="1%"></td>
                  <td>
                    <input type="checkbox" name="fli_tindakan_dokter" id="fli_tindakan_dokter" class="ml-2 mr-1" value="1"> Dokter
                    <input type="checkbox" name="fli_tindakan_perawat" id="fli_tindakan_perawat" class="ml-2 mr-1" value="1"> Perawat
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%"></td>
                  <td width="1%"></td>
                  <td>
                    <div class="d-flex align-items-center">
                      <input type="checkbox" name="fli_tindakan_petugas_lainnya" id="fli_tindakan_petugas_lainnya" class="ml-2 mr-1" value="1"> Lainnya
                      <input type="text"  name="fli_tindakan_petugas_lainnya_keterangan"  id="fli_tindakan_petugas_lainnya_keterangan"  class="custom-form col-lg-3 ml-2" placeholder="Keterangan" disabled>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%"><b>Apakah kejadian yang sama pernah terjadi di Unit Kerja lain*</b></td>
                  <td width="1%">:</td>
                  <td>
                    <input type="radio" name="fli_kejadian" id="fli_kejadian_1" value="1" class="mr-1 ml-2">Ya
                    <input type="radio" name="fli_kejadian" id="fli_kejadian_2" value="2" class="mr-1 ml-2">Tidak 
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%"></td>
                  <td width="1%"></td>
                  <td><span class="ml-2">Apabila ya, isi bagian dibawah ini.</span></td>
                </tr>
                <tr>
                  <td></td>
                  <td width="25%">Kapan ? dan Langkah / tindakan apa yang telah diambil pada Unit kerja tersebut untuk mencegah terulangnya kejadian yang sama</td>
                  <td width="1%">:</td>
                  <td>
                    <textarea name="fli_keterangan_kejadian" id="fli_keterangan_kejadian" class="form-control col-lg-6 ml-2" rows="5" disabled></textarea>
                  </td>
                </tr>
                <tr>
                  <td width="1%"></td>
                  <td width="25%"><b>Grading Risiko Kejadian*</b> (Diisi oleh atasan pelapor)</td>
                  <td width="1%">:</td>
                  <td>
                    <select name="fli_grading" id="fli_grading" class="custom-form col-lg-3 ml-2">
                      <option value="">Pilih ...</option>
                      <option value="1">BIRU</option>
                      <option value="2">HIJAU</option>
                      <option value="3">KUNING</option>
                      <option value="4">MERAH</option>
                    </select>
                  </td>
                </tr>
              </table>

              <table class="table table-no-border table-sm table-striped">
                <tr>
                  <td class="center">Pembuat Laporan</td>
                  <td class="center">Penerima Laporan</td>
                </tr>
                <tr>
                  <td class="center"><input type="text" name="fli_pelapor" id="fli_pelapor" class="select2c-input"></td>
                  <td class="center"><input type="text" name="fli_penerima" id="fli_penerima" class="select2c-input"></td>
                </tr>
                <tr>
                  <td class="center"><input type="checkbox" name="fli_ttd_pelapor" id="fli_ttd_pelapor" value="1" class="custom-form col-lg-1 mx-auto" value="1"></td>
                  <td class="center"><input type="checkbox" name="fli_ttd_penerima" id="fli_ttd_penerima" value="1" class="custom-form col-lg-1 mx-auto" value="1"></td>
                </tr>
                <tr>
                  <td class="center"><input type="text" name="fli_tanggal_pelapor" id="fli_tanggal_pelapor" class="custom-form clear-input d-inline-block col-lg-2" placeholder="dd/mm/yyyy"></td>
                  <td class="center"><input type="text" name="fli_tanggal_penerima" id="fli_tanggal_penerima" class="custom-form clear-input d-inline-block col-lg-2" placeholder="dd/mm/yyyy"></td>
                </tr>
              </table>

            </div>
          </div>
        <?= form_close() ?>
      </div>
      <div class="modal-footer">
        <button id="btn_simpan_fli" type="button" class="btn btn-info" onclick="konfirmasiSimpanFLi()"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
      </div>
    </div>
  </div>
</div>

