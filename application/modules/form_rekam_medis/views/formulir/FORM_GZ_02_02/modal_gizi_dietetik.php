<!-- <style type="text/css">td {border: solid 1px;}</style> -->
<!-- Modal Entri Keperawatan -->
<div class="modal fade" id="modal_gizi_dietetik" role="dialog" data-backdrop="static" aria-labelledby="modal-resume-keperawatan-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
    <div class="modal-content">
      <div class="modal-header">
        <div class="title">
          <h5 class="modal-title bold" id="modal_gizi_dietetik_title">FORMULIR ASUHAN GIZI DAN DIETETIK</h5>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'id=form_gizi_dietetik class="form-horizontal"') ?>
          <input type="hidden" name="id_gd" id="gd_id">
          <input type="hidden" name="id_pendaftaran" id="gd_id_pendaftaran">
          <input type="hidden" name="id_layanan_pendaftaran" id="gd_id_layanan_pendaftaran">
          <input type="hidden" name="id_pasien" id="gd_id_pasien">
          <input type="hidden" name="id_users" value="<?= $this->session->userdata("id_translucent") ?>">
          <input type="hidden" name="action" id="action_gd">

          <!-- header -->
          <div class="row">
            <div class="col-lg-6">
              <div class="table-responsive">
                <table class="table table-sm table-striped">
                  <tr>
                    <td width="20%" class="bold">Nama Pasien</td>
                    <td wdith="80%">: <span id="gd_nama_pasien"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">No. RM</td>
                    <td>: <span id="gd_no_rm"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">Tanggal Lahir</td>
                    <td>: <span id="gd_tanggal_lahir"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">Jenis Kelamin</td>
                    <td>: <span id="gd_jenis_kelamin"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">Alamat</td>
                    <td>: <span id="gd_alamat"></span></td>
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
                    <td width="20%">Diagnosa Medis : </td>
                    <td><input type="text" id="gd_medis" name="gd_medis" class="custom-form clear-input d-inline-block col-lg-3"></td>
                  </tr>
                  <tr>
                    <td colspan="2"><b>1. Risiko malnutrisi berdasarkan hasil skrining gizi oleh perawat, kondisi pasien termasuk kategori :</b></td>
                  </tr>
                  <tr>
                    <td width="20%" class="pl-4">Risiko ringan (Nilai MST 0-1)</td>
                    <td><input type="radio" name="gd_risiko" id="gd_risiko_ringan" value="1"></td>
                  </tr>	
                  <tr>
                    <td width="20%" class="pl-4">Risiko sedang (Nilai MST ≥ 2-3)</td>
                    <td><input type="radio" name="gd_risiko" id="gd_risiko_sedang" value="2"></td>
                  </tr>	
                  <tr>
                    <td width="20%" class="pl-4">Risiko tinggi (Nilai MST 4-5)</td>
                    <td><input type="radio" name="gd_risiko" id="gd_risiko_tinggi" value="3"></td>
                  </tr>	
                  <tr>
                    <td colspan="2"><b>2. Mempunyai kondisi khusus :</b></td>
                  </tr>
                  <tr>
                    <td width="20%" class="pl-4">Ya</td>
                    <td><input type="radio" name="gd_kondisi" id="gd_kondisi_ya" value="1"></td>
                  </tr>
                  <tr>
                    <td width="20%" class="pl-4">Tidak</td>
                    <td><input type="radio" name="gd_kondisi" id="gd_kondisi_tidak" value="2"></td>
                  </tr>
                  <tr>
                    <td colspan="2"><b>3. Alergi Makan :</b></td>
                  </tr>
                  <tr>
                    <td width="20%" class="pl-4">Telur</td>
                    <td><input type="radio" name="gd_alergi" id="gd_alergi_telur" value="1"></td>
                  </tr>
                  <tr>
                    <td width="20%" class="pl-4">Susu sapi dan produk olahannya</td>
                    <td><input type="radio" name="gd_alergi" id="gd_alergi_sapi" value="2"></td>
                  </tr>
                  <tr>
                    <td width="20%" class="pl-4">Kacang kedelai/tanah</td>
                    <td><input type="radio" name="gd_alergi" id="gd_alergi_kacang" value="3"></td>
                  </tr>
                  <tr>
                    <td width="20%" class="pl-4">Gluten/gandum</td>
                    <td><input type="radio" name="gd_alergi" id="gd_alergi_gandum" value="4"></td>
                  </tr>
                  <tr>
                    <td width="20%" class="pl-4">Udang</td>
                    <td><input type="radio" name="gd_alergi" id="gd_alergi_udang" value="5"></td>
                  </tr>
                  <tr>
                    <td width="20%" class="pl-4">Ikan</td>
                    <td><input type="radio" name="gd_alergi" id="gd_alergi_ikan" value="6"></td>
                  </tr>
                  <tr>
                    <td width="20%" class="pl-4">Hazelnut/almond</td>
                    <td><input type="radio" name="gd_alergi" id="gd_alergi_almond" value="7"></td>
                  </tr>
                  <tr>
                    <td width="20%" class="pl-4">Lainnya </td>
                    <td><input type="text" id="gd_alergi_lainnya" name="gd_alergi_lainnya" class="custom-form clear-input d-inline-block col-lg-3"></td>
                  </tr>
                  <tr>
                    <td colspan="2"><b>4. Preskripsi diet :</b></td>
                  </tr>
                  <tr>
                    <td width="20%" class="pl-4">Makanan biasa</td>
                    <td><input type="radio" name="gd_makanan" id="gd_makanan_biasa" value="1"></td>
                  </tr>
                  <tr>
                    <td width="20%" class="pl-4">Diet khusus</td>
                    <td><input type="radio" name="gd_makanan" id="gd_makanan_diet" value="2"></td>
                  </tr>
                  <tr>
                    <td colspan="2"><b>5. Tindak lanjut :</b></td>
                  </tr>
                  <tr>
                    <td width="20%" class="pl-4">Pelu asuhan gizi (Lanjut ke asesmen gizi)</td>
                    <td><input type="radio" name="gd_asuhan" id="gd_asuhan_perlu" value="1"></td>
                  </tr>
                  <tr>
                    <td width="20%" class="pl-4">Belum perlu asuhan gizi</td>
                    <td><input type="radio" name="gd_asuhan" id="gd_asuhan_tidak" value="2"></td>
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
                    <th colspan="6"><b>Antropometri</b></th>
                  </tr>
                  <tr>
                    <td width="15%" class="pl-3">BB</td>
                    <td width="1%">:</td>
                    <td><input type="text" id="gd_bb" name="gd_bb" class="custom-form clear-input d-inline-block col-lg-2"> kg</td>
                    <td width="15%" class="pl-3">Bila BB tidak dapat ditimbang, LILA</td>
                    <td width="1%">:</td>
                    <td><input type="text" id="gd_lila" name="gd_lila" class="custom-form clear-input d-inline-block col-lg-2"> cm</td>
                  </tr>
                  <tr>
                    <td width="15%" class="pl-3">TB</td>
                    <td width="1%">:</td>
                    <td><input type="text" id="gd_tb" name="gd_tb" class="custom-form clear-input d-inline-block col-lg-2"> cm</td>
                    <td width="15%" class="pl-3">Bila TB tidak dapat diukur, Tilut</td>
                    <td width="1%">:</td>
                    <td><input type="text" id="gd_tilut" name="gd_tilut" class="custom-form clear-input d-inline-block col-lg-2"> cm</td>
                  </tr>
                  <tr>
                    <td class="pl-3">IMT</td>
                    <td width="1%">:</td>
                    <td><input type="text" id="gd_imt" name="gd_imt" class="custom-form clear-input d-inline-block col-lg-2"> kg/m²</td>
                    <td colspan="3"></td>
                  </tr>
                  <tr>
                    <td class="pl-3">Status gizi</td>
                    <td width="1%">:</td>
                    <td colspan="4">
                      <input type="text" id="gd_status_gizi" name="gd_status_gizi" class="custom-form clear-input d-inline-block col-lg-3">
                    </td>
                  </tr>
                  <tr>
                    <th colspan="6"><b>Dalam 1 bulan terakhir</b></th>
                  </tr>
                  <tr>
                    <td class="pl-3" colspan="3">1. Kesulitan Makan</td>
                    <td colspan="3">
                      <input type="radio" name="gd_kesulitan" id="gd_kesulitan_ya" value="1"> Ya
                      <input type="radio" name="gd_kesulitan" id="gd_kesulitan_tidak" value="2" class="ml-3"> Tidak
                    </td>
                  </tr>
                  <tr>
                    <td class="pl-3" colspan="6">2. Makan lebih sedikit dari biasanya</td>
                  </tr>
                  <tr>
                    <td class="pl-5" colspan="3">≺ 1/2 porsi dari biasanya </td>
                    <td colspan="3">
                      <input type="radio" name="gd_setengah" id="gd_setengah_ya" value="1"> Ya
                      <input type="radio" name="gd_setengah" id="gd_setengah_tidak" value="2" class="ml-3"> Tidak
                    </td>
                  </tr>
                  <tr>
                    <td class="pl-5" colspan="3">1/2 - 3/4 porsi dari biasanya </td>
                    <td colspan="3">
                      <input type="radio" name="gd_tigaperempat" id="gd_tigaperempat_ya" value="1"> Ya
                      <input type="radio" name="gd_tigaperempat" id="gd_tigaperempat_tidak" value="2" class="ml-3"> Tidak
                    </td>
                  </tr>
                  <tr>
                    <td class="pl-3" colspan="3">3. Penurunan nafsu makan yang mempengaruhi asupan</td>
                    <td colspan="3">
                      <input type="radio" name="gd_penurunan" id="gd_penurunan_ya" value="1"> Ya
                      <input type="radio" name="gd_penurunan" id="gd_penurunan_tidak" value="2" class="ml-3"> Tidak
                    </td>
                  </tr>
                  <tr>
                    <td class="pl-3" colspan="3">4. Perubahan rasa kecap</td>
                    <td colspan="3">
                      <input type="radio" name="gd_perubahan" id="gd_perubahan_ya" value="1"> Ya
                      <input type="radio" name="gd_perubahan" id="gd_perubahan_tidak" value="2" class="ml-3"> Tidak
                    </td>
                  </tr>
                  <tr>
                    <td class="pl-3" colspan="3">5. Mual</td>
                    <td colspan="3">
                      <input type="radio" name="gd_mual" id="gd_mual_ya" value="1"> Ya
                      <input type="radio" name="gd_mual" id="gd_mual_tidak" value="2" class="ml-3"> Tidak
                    </td>
                  </tr>
                  <tr>
                    <td class="pl-3" colspan="3">6. Muntah</td>
                    <td colspan="3">
                      <input type="radio" name="gd_muntah" id="gd_muntah_ya" value="1"> Ya
                      <input type="radio" name="gd_muntah" id="gd_muntah_tidak" value="2" class="ml-3"> Tidak
                    </td>
                  </tr>
                  <tr>
                    <td class="pl-3" colspan="3">7. Gangguan / kesulitan mengunyah dan atau menelan</td>
                    <td colspan="3">
                      <input type="radio" name="gd_gangguan" id="gd_gangguan_ya" value="1"> Ya
                      <input type="radio" name="gd_gangguan" id="gd_gangguan_tidak" value="2" class="ml-3"> Tidak
                    </td>
                  </tr>
                  <tr>
                    <td class="pl-3" colspan="3">8. Perlu bantuan saat makan / minum</td>
                    <td colspan="3">
                      <input type="radio" name="gd_perlu" id="gd_perlu_ya" value="1"> Ya
                      <input type="radio" name="gd_perlu" id="gd_perlu_tidak" value="2" class="ml-3"> Tidak
                    </td>
                  </tr>
                  <tr>
                    <td class="pl-3" colspan="3">9. Sering kali melewatkan waktu makan</td>
                    <td colspan="3">
                      <input type="radio" name="gd_sering" id="gd_sering_ya" value="1"> Ya
                      <input type="radio" name="gd_sering" id="gd_sering_tidak" value="2" class="ml-3"> Tidak
                    </td>
                  </tr>
                  <tr>
                    <td class="pl-3" colspan="3">10. Masalah dnegan gigi geligi</td>
                    <td colspan="3">
                      <input type="radio" name="gd_masalah" id="gd_masalah_ya" value="1"> Ya
                      <input type="radio" name="gd_masalah" id="gd_masalah_tidak" value="2" class="ml-3"> Tidak
                    </td>
                  </tr>
                    <td class="pl-3" colspan="3">11. Diare</td>
                    <td colspan="3">
                      <input type="radio" name="gd_diare" id="gd_diare_ya" value="1"> Ya
                      <input type="radio" name="gd_diare" id="gd_diare_tidak" value="2" class="ml-3"> Tidak
                    </td>
                  </tr>
                  </tr>
                    <td class="pl-3" colspan="3">12. Konstipati</td>
                    <td colspan="3">
                      <input type="radio" name="gd_konstipati" id="gd_konstipati_ya" value="1"> Ya
                      <input type="radio" name="gd_konstipati" id="gd_konstipati_tidak" value="2" class="ml-3"> Tidak
                    </td>
                  </tr>
                  </tr>
                    <td class="pl-3" colspan="3">13. Pendarahn</td>
                    <td colspan="3">
                      <input type="radio" name="gd_pendarahan" id="gd_pendarahan_ya" value="1"> Ya
                      <input type="radio" name="gd_pendarahan" id="gd_pendarahan_tidak" value="2" class="ml-3"> Tidak
                    </td>
                  </tr>
                  </tr>
                    <td class="pl-3" colspan="3">14. Banyak bersendawa</td>
                    <td colspan="3">
                      <input type="radio" name="gd_bersendawa" id="gd_bersendawa_ya" value="1"> Ya
                      <input type="radio" name="gd_bersendawa" id="gd_bersendawa_tidak" value="2" class="ml-3"> Tidak
                    </td>
                  </tr>
                  </tr>
                    <td class="pl-3" colspan="3">15. Alergi makan / intoleransi terhadap makanan</td>
                    <td colspan="3">
                      <input type="radio" name="gd_intoleransi" id="gd_intoleransi_ya" value="1"> Ya
                      <input type="radio" name="gd_intoleransi" id="gd_intoleransi_tidak" value="2" class="ml-3"> Tidak
                    </td>
                  </tr>
                  </tr>
                    <td class="pl-3" colspan="3">16. Menjalani diet tertentu</td>
                    <td colspan="3">
                      <input type="radio" name="gd_diet" id="gd_diet_ya" value="1"> Ya
                      <input type="radio" name="gd_diet" id="gd_diet_tidak" value="2" class="ml-3"> Tidak
                    </td>
                  </tr>
                  </tr>
                    <td class="pl-3" colspan="3">17. Makan menggunakan NGT</td>
                    <td colspan="3">
                      <input type="radio" name="gd_ngt" id="gd_ngt_ya" value="1"> Ya
                      <input type="radio" name="gd_ngt" id="gd_ngt_tidak" value="2" class="ml-3"> Tidak
                    </td>
                  </tr>
                  </tr>
                    <td class="pl-3" colspan="3">18. Merasa lemah / tidak bertenaga</td>
                    <td colspan="3">
                      <input type="radio" name="gd_lemah" id="gd_lemah_ya" value="1"> Ya
                      <input type="radio" name="gd_lemah" id="gd_lemah_tidak" value="2" class="ml-3"> Tidak
                    </td>
                  </tr>
                  </tr>
                    <td class="pl-3" colspan="3">19. Dirawat di RS dalam jangka setahun terakhir</td>
                    <td colspan="3">
                      <input type="radio" name="gd_dirawat" id="gd_dirawat_ya" value="1"> Ya
                      <input type="radio" name="gd_dirawat" id="gd_dirawat_tidak" value="2" class="ml-3"> Tidak
                    </td>
                  </tr>
                  <tr>
                    <td class="pl-3" colspan="6">20. Penurunan BB</td>
                  </tr>
                  <tr>
                    <td class="pl-5" colspan="3">Lebih dari 3 kg dalam 1 bulan terakhir</td>
                    <td colspan="3">
                      <input type="radio" name="gd_tigakg" id="gd_tigakg_ya" value="1"> Ya
                      <input type="radio" name="gd_tigakg" id="gd_tigakg_tidak" value="2" class="ml-3"> Tidak
                    </td>
                  </tr>
                  <tr>
                    <td class="pl-5" colspan="3">Lebih dari 6 kg dalam 1 bulan terakhir</td>
                    <td colspan="3">
                      <input type="radio" name="gd_enamkg" id="gd_enamkg_ya" value="1"> Ya
                      <input type="radio" name="gd_enamkg" id="gd_enamkg_tidak" value="2" class="ml-3"> Tidak
                    </td>
                  </tr>
                  <tr>
                    <td class="pl-3" colspan="6">21. 
                      <input type="radio" name="gd_penyakit" id="gd_penyakit_keganasan" value="1" class="ml-2"> Penyakit keganasan 
                      <input type="radio" name="gd_penyakit" id="gd_penyakit_kronis" value="2" class="ml-3"> Infeksi kronis 
                      <input type="radio" name="gd_penyakit" id="gd_penyakit_bakar" value="3" class="ml-3"> Luka bakar 
                      <input type="radio" name="gd_penyakit" id="gd_penyakit_kepala" value="4" class="ml-3"> Cidera kepala 
                      <input type="radio" name="gd_penyakit" id="gd_penyakit_ginjal" value="5" class="ml-3"> Gagal ginjal, DM, lainnya
                      <input type="text" name="gd_penyakit_lainnya" id="gd_penyakit_lainnya" class="custom-form clear-input d-inline-block col-lg-3">
                    </td>
                  </tr>
                  <tr>
                    <td colspan="6" class="pl-3">22. Data penunjang lainnya / Laboratorium</td>
                  </tr>
                  <tr>
                    <td colspan="6" class="text-center pl-5"><textarea name="gd_laboratorium" id="gd_laboratorium" class="custom-textarea" rows="5"></textarea></td>
                  </tr>
                  <tr>
                    <td colspan="6" class="pl-3">23. Klinis / Fisik</td>
                  </tr>
                  <tr>
                    <td colspan="6" class="text-center pl-5"><textarea name="gd_klinis" id="gd_klinis" class="custom-textarea" rows="5"></textarea></td>
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
                    <td><textarea name="gd_problem" id="gd_problem" class="form-control" rows="10"></textarea></td>
                    <td><textarea name="gd_etiologi" id="gd_etiologi" class="form-control" rows="10"></textarea></td>
                    <td><textarea name="gd_gejala" id="gd_gejala" class="form-control" rows="10"></textarea></td>
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
                    <th colspan="6"><b>Preskripsi Diet : </b><input type="text" name="gd_preskripsi" id="gd_preskripsi" class="custom-form clear-input d-inline-block col-lg-3"></th>
                  </tr>
                  <tr>
                    <td width="10%" class="pl-3">Energi</td>
                    <td width="1%">:</td>
                    <td><input type="text" name="gd_energi" id="gd_energi" class="custom-form clear-input d-inline-block col-lg-6"></td>
                    <td width="10%">Makanan Cair</td>
                    <td width="1%">:</td>
                    <td><input type="radio" name="gd_jenis_makanan" id="gd_makanan_cair" value="1"></td>
                  </tr>
                  <tr>
                    <td width="10%" class="pl-3">Lemak</td>
                    <td width="1%">:</td>
                    <td><input type="text" name="gd_lemak" id="gd_lemak" class="custom-form clear-input d-inline-block col-lg-6"></td>
                    <td width="10%">Makanan Lunak</td>
                    <td width="1%">:</td>
                    <td><input type="radio" name="gd_jenis_makanan" id="gd_makanan_lunak" value="2"></td>
                  </tr>
                  <tr>
                    <td width="10%" class="pl-3">Protein</td>
                    <td width="1%">:</td>
                    <td><input type="text" name="gd_protein" id="gd_protein" class="custom-form clear-input d-inline-block col-lg-6"></td>
                    <td width="10%">Makanan Saring</td>
                    <td width="1%">:</td>
                    <td><input type="radio" name="gd_jenis_makanan" id="gd_jenis_makanan_saring" value="3"></td>
                  </tr>
                  <tr>
                    <td width="10%" class="pl-3">Karbohidrat</td>
                    <td width="1%">:</td>
                    <td><input type="text" name="gd_karbohidrat" id="gd_karbohidrat" class="custom-form clear-input d-inline-block col-lg-6"></td>
                    <td width="10%">Makanan Biasa</td>
                    <td width="1%">:</td>
                    <td><input type="radio" name="gd_jenis_makanan" id="gd_jenis_makanan_biasa" value="4"></td>
                  </tr>
                  <tr>
                    <td width="10%" class="pl-3">Cairan</td>
                    <td width="1%">:</td>
                    <td><input type="text" name="gd_cairan" id="gd_cairan" class="custom-form clear-input d-inline-block col-lg-6"></td>
                    <td width="10%">Route Diet</td>
                    <td width="1%">:</td>
                    <td><input type="text" name="gd_route" id="gd_route" class="custom-form clear-input d-inline-block col-lg-6"></td>
                  </tr>
                  <tr>
                    <td width="10%" class="pl-3"></td>
                    <td width="1%"></td>
                    <td></td>
                    <td width="10%">Oral</td>
                    <td width="1%">:</td>
                    <td><input type="radio" name="gd_cara_makan" id="gd_cara_makan_oral" value="1"></td>
                  </tr>
                  <tr>
                    <td width="10%" class="pl-3"></td>
                    <td width="1%"></td>
                    <td></td>
                    <td width="10%">NGT</td>
                    <td width="1%">:</td>
                    <td><input type="radio" name="gd_cara_makan" id="gd_cara_makan_ngt" value="2"></td>
                  </tr>
                  <tr>
                    <td width="10%" class="pl-3"></td>
                    <td width="1%"></td>
                    <td></td>
                    <td width="10%">Frekuensi</td>
                    <td width="1%">:</td>
                    <td><input type="text" name="gd_frekuensi" id="gd_frekuensi" class="custom-form clear-input d-inline-block col-lg-6"></td>
                  </tr>
                </tbody>
              </table>
              <table class="table table-sm table-striped">
                <thead>
                  <tr>
                    <th class="center bg-dark text-light"><b>MONITORING DAN EVALUASI</b></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><textarea name="gd_monitoring" id="gd_monitoring" class="form-control" rows="5"></textarea></td>
                  </tr>
                </tbody>
              </table>
              <table class="table table-sm table-striped">
                <tbody>
                  <tr>
                    <td width="33%" class="center">
                      Tanggal & Jam <input type="text" name="gd_tgl_petugas" id="gd_tgl_petugas" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="dd/mm/yyyy hh:mm">
                    </td>
                    <td width="33%">
                    </td>
                    <td width="33%" class="center"></td>
                  </tr>
                  <tr>
                    <td class="center">Dietisien / Nutrisionist</td>
                    <td class="center">Dokter</td>
                    <td class="center"></td>
                  </tr>
                  <tr>
                    <td class="center"><input type="text" name="gd_petugas" id="gd_petugas" class="select2c-input ml-2"></td>
                    <td class="center"><input type="text" name="gd_dokter" id="gd_dokter" class="select2c-input ml-2"></td>
                    <td class="center"></td>

                  </tr>
                  <tr>
                    <td class="center">Tanda Tangan</td>
                    <td class="center">Tanda Tangan</td>
                    <td class="center"></td>
                  </tr>
                  <tr>
                    <td class="center">
                      <input type="checkbox" name="gd_ttd" id="gd_ttd" value="1" class="custom-form col-lg-1 mx-auto">
                    </td>
                    <td class="center">
                      <input type="checkbox" name="gd_ttd_dokter" id="gd_ttd_dokter" value="1" class="custom-form col-lg-1 mx-auto">
                    </td>
                    <td class="center">
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="col-lg-12" style="margin-bottom: 10px;display: flex;justify-content: flex-end;">              
              <button type="button" class="btn btn-info mr-1" onclick="konfirmasiSimpanEntriGd()" id="btn_simpan_gd"><i class="fas fa-fw fa-plus mr-1"></i>Konfirmasi</button>
              <button type="button" class="btn btn-secondary" id="btn_reset_gd"><i class="fas fa-history mr-1"></i>Reset Form</button>                    
            </div>
            <div class="col-lg-12">
              <div class="table-responsive">
                <table id="table-dietetik" class="table table-hover table-striped table-sm color-table info-table">
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
