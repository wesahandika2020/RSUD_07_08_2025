<!-- <style type="text/css">td {border: solid 1px;}</style> -->
<!-- Modal Entri Keperawatan -->
<div class="modal fade" id="modal_gizi_anak" role="dialog" data-backdrop="static" aria-labelledby="modal-resume-keperawatan-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
    <div class="modal-content">
      <div class="modal-header">
        <div class="title">
          <h5 class="modal-title bold" id="modal_gizi_anak_title">FORMULIR ASUHAN GIZI ANAK</h5>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'id=form_gizi_anak class="form-horizontal"') ?>
          <input type="hidden" name="id_ga" id="ga_id">
          <input type="hidden" name="id_pendaftaran" id="ga_id_pendaftaran">
          <input type="hidden" name="id_layanan_pendaftaran" id="ga_id_layanan_pendaftaran">
          <input type="hidden" name="id_pasien" id="ga_id_pasien">
          <input type="hidden" name="id_users" value="<?= $this->session->userdata("id_translucent") ?>">
          <input type="hidden" name="action" id="action_ga">

          <!-- header -->
          <div class="row">
            <div class="col-lg-6">
              <div class="table-responsive">
                <table class="table table-sm table-striped">
                  <tr>
                    <td width="20%" class="bold">Nama Pasien</td>
                    <td wdith="80%">: <span id="ga_nama_pasien"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">No. RM</td>
                    <td>: <span id="ga_no_rm"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">Tanggal Lahir</td>
                    <td>: <span id="ga_tanggal_lahir"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">Jenis Kelamin</td>
                    <td>: <span id="ga_jenis_kelamin"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">Alamat</td>
                    <td>: <span id="ga_alamat"></span></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <!-- end header -->

          <!-- content -->									
          <div class="row">
            <div class="col-lg-12">
              <table class="table table-sm table-striped">
                <tbody>
                  <tr>
                    <td width="15%">Ruang/kelas</td>
                    <td>
                      <input type="hidden" name="ga_ruang" id="ga_ruang">
                      <span id="ga_ruang1"></span>
                    </td>
                  </tr>
                  <tr>
                    <td width="15%">Tanggal Masuk</td>
                    <td><input type="text" id="ga_tgl_masuk" name="ga_tgl_masuk" class="custom-form clear-input d-inline-block col-lg-1" placeholder="dd/mm/yyyy"></td>
                  </tr>
                  <tr>
                    <td width="15%">Tanggal Skrining</td>
                    <td><input type="text" id="ga_tgl_skrining" name="ga_tgl_skrining" class="custom-form clear-input d-inline-block col-lg-1" placeholder="dd/mm/yyyy"></td>
                  </tr>
                  <tr>
                    <td width="15%">Usia</td>
                    <td>
                      <input type="hidden" name="ga_usia" id="ga_usia">
                      <span id="ga_usia1"></span>
                    </td>
                  </tr>
                  <tr>
                    <td width="15%">diagnosa Medis</td>
                    <td><input type="text" id="ga_diagnosa_medis" name="ga_diagnosa_medis" class="custom-form clear-input d-inline-block col-lg-3"></td>
                  </tr>
                  <tr>
                    <td colspan="2"><b>Risiko malnutrisi berdasarkan hasil skrining gizi oleh perawat, kondisi pasien termasuk kategori :</b></td>
                  </tr>
                  <tr>
                    <td width="15%" class="pl-3">Risiko rendah (Total skor 0)</td>
                    <td><input type="radio" name="ga_risiko" id="ga_risiko_rendah" value="1"></td>
                  </tr>
                  <tr>
                    <td width="15%" class="pl-3">Risiko sedang (Total skor 1 - 3)</td>
                    <td><input type="radio" name="ga_risiko" id="ga_risiko_sedang" value="2"></td>
                  </tr>
                  <tr>
                    <td width="15%" class="pl-3">Risiko berat (Total skor 4 - 5)</td>
                    <td><input type="radio" name="ga_risiko" id="ga_risiko_tinggi" value="3"></td>
                  </tr>
                </tbody>
              </table>
              <table class="table table-sm table-striped">
                <thead>
                  <tr>
                    <th class="text-center bg-dark text-light" colspan="9"><b>ASESMEN GIZI</b></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th colspan="9"><b>Antropometri</b></th>
                  </tr>
                  <tr>
                    <td class="pl-3" width="10%">BB</td>
                    <td width="1%">:</td>
                    <td><input type="text" id="ga_bb" name="ga_bb" class="custom-form clear-input d-inline-block col-lg-2"> kg</td>
                    <td width="10%">BB/U</td>
                    <td width="1%">:</td>
                    <td><input type="text" id="ga_bbu" name="ga_bbu" class="custom-form clear-input d-inline-block col-lg-6"></td>
                    <td width="5%">kesan</td>
                    <td width="1%">:</td>
                    <td rowspan="4"><textarea name="ga_kesan" id="ga_kesan" class="form-control" rows="5"></textarea></td>
                  </tr>
                  <tr>
                    <td class="pl-3" width="10%">PB atau TB</td>
                    <td width="1%">:</td>
                    <td><input type="text" id="ga_pb" name="ga_pb" class="custom-form clear-input d-inline-block col-lg-2"> cm</td>
                    <td width="10%">PB/U atau TB/U/U</td>
                    <td width="1%">:</td>
                    <td><input type="text" id="ga_pbu" name="ga_pbu" class="custom-form clear-input d-inline-block col-lg-6"></td>
                    <td colspan="2"></td>
                  </tr>
                  <tr>
                    <td class="pl-3" width="10%">BBI</td>
                    <td width="1%">:</td>
                    <td><input type="text" id="ga_bbi" name="ga_bbi" class="custom-form clear-input d-inline-block col-lg-2"> kg</td>
                    <td width="10%">BB/PB atau BB/TB</td>
                    <td width="1%">:</td>
                    <td><input type="text" id="ga_bbpb" name="ga_bbpb" class="custom-form clear-input d-inline-block col-lg-6"></td>
                    <td colspan="2"></td>
                  </tr>
                  <tr>
                    <td class="pl-3" width="5%">LLA</td>
                    <td width="1%">:</td>
                    <td><input type="text" id="ga_lla" name="ga_lla" class="custom-form clear-input d-inline-block col-lg-2"> cm</td>
                    <td width="5%">HA</td>
                    <td width="1%">:</td>
                    <td><input type="text" id="ga_ha" name="ga_ha" class="custom-form clear-input d-inline-block col-lg-6"></td>
                    <td colspan="2"></td>
                  </tr>
                  <tr>
                    <th colspan="9"><b>Biokimia</b></th>
                  </tr>
                  <tr>
                    <th colspan="9" class="text-center pl-3"><textarea name="ga_biokimia" id="ga_biokimia" class="custom-textarea" rows="4"></textarea></th>
                  </tr>
                  <tr>
                    <th colspan="9"><b>Klinis / Fisik</b></th>
                  </tr>
                  <tr>
                    <th colspan="9" class="text-center pl-3"><textarea name="ga_klinis" id="ga_klinis" class="custom-textarea" rows="4"></textarea></th>
                  </tr>
                </tbody>
              </table>
              <table class="table table-sm table-striped" style="margin-top: -17px;">
                <tbody>
                  <tr>
                    <th colspan="7"><b>Riwayat Gizi</b></th>
                  </tr>
                  <tr>
                    <td class="pl-3"><b>Alergi Makan :</b></td>
                    <td></td>
                    <td><b>Ya</b></td>
                    <td><b>Tidak</b></td>
                    <td></td>
                    <td><b>Ya</b></td>
                    <td><b>Tidak</b></td>
                  </tr>
                  <tr>
                    <td width="4%"></td>
                    <td width="10%">Telur</td>
                    <td width="2%"><input type="radio" name="ga_telur" id="ga_telur_ya" value="1"></td>
                    <td width="10%"><input type="radio" name="ga_telur" id="ga_telur_tidak" value="2"></td>
                    <td width="5%">Udang</td>
                    <td width="2%"><input type="radio" name="ga_udang" id="ga_udang_ya" value="1"></td>
                    <td width="10%"><input type="radio" name="ga_udang" id="ga_udang_tidak" value="2"></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>Susu sapi dan produk olahannya</td>
                    <td><input type="radio" name="ga_sapi" id="ga_sapi_ya" value="1"></td>
                    <td><input type="radio" name="ga_sapi" id="ga_sapi_tidak" value="2"></td>
                    <td>Ikan</td>
                    <td><input type="radio" name="ga_ikan" id="ga_ikan_ya" value="1"></td>
                    <td><input type="radio" name="ga_ikan" id="ga_ikan_tidak" value="2"></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>Kacang kedelai/tanah</td>
                    <td><input type="radio" name="ga_kedelai" id="ga_kedelai_ya" value="1"></td>
                    <td><input type="radio" name="ga_kedelai" id="ga_kedelai_tidak" value="2"></td>
                    <td>Hazelnut/almond</td>
                    <td><input type="radio" name="ga_almond" id="ga_almond_ya" value="1"></td>
                    <td><input type="radio" name="ga_almond" id="ga_almond_tidak" value="2"></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>Gluten/gandum</td>
                    <td><input type="radio" name="ga_gandum" id="ga_gandum_ya" value="1"></td>
                    <td><input type="radio" name="ga_gandum" id="ga_gandum_tidak" value="2"></td>
                    <td>Lainnya </td>
                    <td colspan="2"><input type="text" id="ga_alergi_lainnya" name="ga_alergi_lainnya" class="custom-form clear-input d-inline-block"></td>
                  </tr>
                  <tr>
                    <td class="pl-3"><b>Pola Makan  :</b></td>
                    <td colspan="6"> <textarea name="ga_pola_makan" id="ga_pola_makan" class="custom-textarea" rows="4"></textarea></td>
                  </tr>
                </tbody>
              </table>
              <table class="table table-sm table-striped" style="margin-top: -17px;">
                <tbody>
                  <tr>
                    <th colspan="2"><b>Tindak Lanjut</b></th>
                  </tr>
                  <tr>
                    <td width="15%" class="pl-3">Perlu Asuhan Gizi Lanjut</td>
                    <td><input type="radio" name="ga_tindak" id="ga_tindak_perlu" value="1"></td>
                  </tr>
                  <tr>
                    <td width="15%" class="pl-3">Belum Perlu Asuhan Gizi Lanjut</td>
                    <td><input type="radio" name="ga_tindak" id="ga_tindak_tidak" value="2"></td>
                  </tr>
                </tbody>
              </table>
              <table class="table table-sm table-striped">
                <thead>
                  <tr>
                    <th colspan="3" class="center bg-dark text-light"><b>DIAGNOSIS GIZI</b></th>
                  </tr>
                  <tr>
                    <th class="center"><b>PROBLEM</b></th>
                    <th class="center"><b>ETIOLOGI</b></th>
                    <th class="center"><b>TANDA/GEJALA</b></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><textarea name="ga_problem" id="ga_problem" class="form-control" rows="10"></textarea></td>
                    <td><textarea name="ga_etiologi" id="ga_etiologi" class="form-control" rows="10"></textarea></td>
                    <td><textarea name="ga_gejala" id="ga_gejala" class="form-control" rows="10"></textarea></td>
                  </tr>
                </tbody>
              </table>
              <table class="table table-sm table-striped">
                <thead>
                  <tr>
                    <th class="text-center bg-dark text-light" colspan="6"><b>INTERVENSI GIZI</b></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th colspan="6"><b>Preskripsi Diet : </b><input type="text" id="ga_preskripsi" name="ga_preskripsi" class="custom-form clear-input d-inline-block col-lg-3"></th>
                  </tr>
                  <tr>
                    <td width="10%" class="pl-3">Energi</td>
                    <td width="1%">:</td>
                    <td><input type="text" id="ga_energi" name="ga_energi" class="custom-form clear-input d-inline-block col-lg-6"></td>
                    <td width="10%">Makanan Cair</td>
                    <td width="1%">:</td>
                    <td><input type="radio" name="ga_makanan" id="ga_makanan_cair" value="1"></td>
                  </tr>
                  <tr>
                    <td width="10%" class="pl-3">Lemak</td>
                    <td width="1%">:</td>
                    <td><input type="text" id="ga_lemak" name="ga_lemak" class="custom-form clear-input d-inline-block col-lg-6"></td>
                    <td width="10%">Makanan Lunak</td>
                    <td width="1%">:</td>
                    <td><input type="radio" name="ga_makanan" id="ga_makanan_lunak" value="2"></td>
                  </tr>
                  <tr>
                    <td width="10%" class="pl-3">Protein</td>
                    <td width="1%">:</td>
                    <td><input type="text" id="ga_protein" name="ga_protein" class="custom-form clear-input d-inline-block col-lg-6"></td>
                    <td width="10%">Makanan Saring</td>
                    <td width="1%">:</td>
                    <td><input type="radio" name="ga_makanan" id="ga_makanan_saring" value="3"></td>
                  </tr>
                  <tr>
                    <td width="10%" class="pl-3">Karbohidrat</td>
                    <td width="1%">:</td>
                    <td><input type="text" id="ga_karbohidrat" name="ga_karbohidrat" class="custom-form clear-input d-inline-block col-lg-6"></td>
                    <td width="10%">Makanan Biasa</td>
                    <td width="1%">:</td>
                    <td><input type="radio" name="ga_makanan" id="ga_makanan_biasa" value="4"></td>
                  </tr>
                  <tr>
                    <td width="10%" class="pl-3">Cairan</td>
                    <td width="1%">:</td>
                    <td><input type="text" id="ga_cairan" name="ga_cairan" class="custom-form clear-input d-inline-block col-lg-6"></td>
                    <td width="10%">Route Diet</td>
                    <td width="1%">:</td>
                    <td><input type="text" id="ga_route" name="ga_route" class="custom-form clear-input d-inline-block col-lg-6"></td>
                  </tr>
                  <tr>
                    <td width="10%" class="pl-3"></td>
                    <td width="1%"></td>
                    <td></td>
                    <td width="10%">Oral</td>
                    <td width="1%">:</td>
                    <td><input type="radio" name="ga_cara_makan" id="ga_cara_makan_oral" value="1"></td>
                  </tr>
                  <tr>
                    <td width="10%" class="pl-3"></td>
                    <td width="1%"></td>
                    <td></td>
                    <td width="10%">NGT</td>
                    <td width="1%">:</td>
                    <td><input type="radio" name="ga_cara_makan" id="ga_cara_makan_ngt" value="2"></td>
                  </tr>
                  <tr>
                    <td width="10%" class="pl-3"></td>
                    <td width="1%"></td>
                    <td></td>
                    <td width="10%">Frekuensi</td>
                    <td width="1%">:</td>
                    <td><input type="text" id="ga_frekuensi" name="ga_frekuensi" class="custom-form clear-input d-inline-block col-lg-6"></td>
                  </tr>
                </tbody>
              </table>
              <table class="table table-sm table-striped">
                <thead>
                  <tr>
                    <th class="center bg-dark text-light"><b>RENCANA MONITORING DAN EVALUASI</b></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><textarea name="ga_monitoring" id="ga_monitoring" class="form-control" rows="10"></textarea></td>
                  </tr>
                </tbody>
              </table>
              <table class="table table-sm table-striped">
                <thead>
                  <tr>
                    <th class="text-center bg-dark text-light" colspan="5"><b>MONITORING DAN EVALUASI</b></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th width="15%">Tanggal Monev</th>
                    <td width="20%"><input type="text" id="ga_tgl_monev_1" name="ga_tgl_monev_1" class="custom-form clear-input d-inline-block col-lg-6" placeholder="dd/mm/yyyy"></td>
                    <td width="20%"><input type="text" id="ga_tgl_monev_2" name="ga_tgl_monev_2" class="custom-form clear-input d-inline-block col-lg-6" placeholder="dd/mm/yyyy"></td>
                    <td width="20%"><input type="text" id="ga_tgl_monev_3" name="ga_tgl_monev_3" class="custom-form clear-input d-inline-block col-lg-6" placeholder="dd/mm/yyyy"></td>
                    <td width="20%"><input type="text" id="ga_tgl_monev_4" name="ga_tgl_monev_4" class="custom-form clear-input d-inline-block col-lg-6" placeholder="dd/mm/yyyy"></td>
                  </tr>
                  <tr>
                    <th width="15%">Antropometri</th>
                    <td width="20%"><textarea name="ga_antropometri_1" id="ga_antropometri_1" class="form-control" rows="3"></textarea></td>
                    <td width="20%"><textarea name="ga_antropometri_2" id="ga_antropometri_2" class="form-control" rows="3"></textarea></td>
                    <td width="20%"><textarea name="ga_antropometri_3" id="ga_antropometri_3" class="form-control" rows="3"></textarea></td>
                    <td width="20%"><textarea name="ga_antropometri_4" id="ga_antropometri_4" class="form-control" rows="3"></textarea></td>
                  </tr>
                  <tr>
                    <th width="15%">Biokimia</th>
                    <td width="20%"><textarea name="ga_biokimia_1" id="ga_biokimia_1" class="form-control" rows="3"></textarea></td>
                    <td width="20%"><textarea name="ga_biokimia_2" id="ga_biokimia_2" class="form-control" rows="3"></textarea></td>
                    <td width="20%"><textarea name="ga_biokimia_3" id="ga_biokimia_3" class="form-control" rows="3"></textarea></td>
                    <td width="20%"><textarea name="ga_biokimia_4" id="ga_biokimia_4" class="form-control" rows="3"></textarea></td>
                  </tr>
                  <tr>
                    <th width="15%">Klinis / Fisik</th>
                    <td width="20%"><textarea name="ga_klinis_1" id="ga_klinis_1" class="form-control" rows="3"></textarea></td>
                    <td width="20%"><textarea name="ga_klinis_2" id="ga_klinis_2" class="form-control" rows="3"></textarea></td>
                    <td width="20%"><textarea name="ga_klinis_3" id="ga_klinis_3" class="form-control" rows="3"></textarea></td>
                    <td width="20%"><textarea name="ga_klinis_4" id="ga_klinis_4" class="form-control" rows="3"></textarea></td>
                  </tr>
                  <tr>
                    <th width="15%">Asupan makan</th>
                    <td width="20%"><textarea name="ga_asupan_1" id="ga_asupan_1" class="form-control" rows="3"></textarea></td>
                    <td width="20%"><textarea name="ga_asupan_2" id="ga_asupan_2" class="form-control" rows="3"></textarea></td>
                    <td width="20%"><textarea name="ga_asupan_3" id="ga_asupan_3" class="form-control" rows="3"></textarea></td>
                    <td width="20%"><textarea name="ga_asupan_4" id="ga_asupan_4" class="form-control" rows="3"></textarea></td>
                  </tr>
                  <tr>
                    <th width="15%"><input type="text" id="ga_monitoring_lain" name="ga_monitoring_lain" class="custom-form clear-input d-inline-block"></th>
                    <td width="20%"><textarea name="ga_monitoring_lain_1" id="ga_monitoring_lain_1" class="form-control" rows="3"></textarea></td>
                    <td width="20%"><textarea name="ga_monitoring_lain_2" id="ga_monitoring_lain_2" class="form-control" rows="3"></textarea></td>
                    <td width="20%"><textarea name="ga_monitoring_lain_3" id="ga_monitoring_lain_3" class="form-control" rows="3"></textarea></td>
                    <td width="20%"><textarea name="ga_monitoring_lain_4" id="ga_monitoring_lain_4" class="form-control" rows="3"></textarea></td>
                  </tr>
                </tbody>
              </table>
              <table class="table table-sm table-striped">
                <tbody>
                  <tr>
                    <td width="33%" class="center">
                      Tanggal & Jam <input type="text" name="ga_tgl_petugas" id="ga_tgl_petugas" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="dd/mm/yyyy hh:mm">
                    </td>
                    <td width="33%">
                    </td>
                    <td width="33%" class="center"></td>
                  </tr>
                  <tr>
                    <td class="center">Dietisien / Nutrisionist</td>
                    <td class="center">Dokter</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="center"><input type="text" name="ga_petugas" id="ga_petugas" class="select2c-input ml-2"></td>
                    <td class="center"><input type="text" name="ga_dokter" id="ga_dokter" class="select2c-input ml-2"></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="center">Tanda Tangan</td>
                    <td class="center">Tanda Tangan</td>
                    <td class="center"></td>
                  </tr>
                  <tr>
                    <td class="center">
                      <input type="checkbox" name="ga_ttd" id="ga_ttd" value="1" class="custom-form col-lg-1 mx-auto">
                    </td>
                    <td class="center">
                      <input type="checkbox" name="ga_ttd_dokter" id="ga_ttd_dokter" value="1" class="custom-form col-lg-1 mx-auto">
                    </td>
                    <td class="center">
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="col-lg-12" style="margin-bottom: 10px;display: flex;justify-content: flex-end;">              
              <button type="button" class="btn btn-info mr-1" onclick="konfirmasiSimpanEntriGa()" id="btn_simpan_ga"><i class="fas fa-fw fa-plus mr-1"></i>Konfirmasi</button>
              <button type="button" class="btn btn-secondary" id="btn_reset_ga"><i class="fas fa-history mr-1"></i>Reset Form</button>                    
            </div>
            <div class="col-lg-12">
              <div class="table-responsive">
                <table id="table-gizianak" class="table table-hover table-striped table-sm color-table info-table">
                  <thead>
                    <tr>
                      <th class="center">No</th>
                      <th class="center">Tanggal</th>
                      <th class="left">Diagnosa Medis</th>
                      <th class="left">Dokter</th>
                      <th class="left">Dietisien / Nutrisionist</th>
                      <th class="center">Tanggal Buat</th>
                      <th class="left">Petugas</th>
                      <th class="right"></th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- end content -->
        <?= form_close() ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Entri Keperawatan -->
