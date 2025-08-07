<!-- // PAPAK --> 
<div class="modal fade" id="modal_pengkajian_pasien_akhir_kehidupan" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold" id="modal_pengkajian_pasien_akhir_kehidupan">FORM PENGKAJIAN PASIEN AKHIR KEHIDUPAN</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_entri_keperawatan_papak class=form-horizontal') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-papak">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-papak">
                <input type="hidden" name="id_pasien" id="id-pasien-papak">
                <input type="hidden" name="id_papak" id="id-papak">
                <input type="hidden" name="id_user" id="id-user"value="<?= $this->session->userdata('id_translucent') ?>">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="20%" class="bold">Nama Pasien</td>
                                    <td wdith="80%">: <span id="nama-pasien-papak"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">No. RM</td>
                                    <td>: <span id="no-papak"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Tanggal Lahir</td>
                                    <td>: <span id="tanggal-lahir-papak"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Jenis Kelamin</td>
                                    <td>: <span id="jenis-kelamin-papak"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="30%" class="bold">Unit Kerja</td>
                                    <td wdith="70%">: <span id="bed-papak"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="wizard-keperawatan-papak">
                                <div class="form-pengkajian-keperawatan-papak">
                                    <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="bold" style="background-color: blue; color: white;"> PENGKAJIAN KEPERAWATAN<i class="bold"><small> (Diisi Oleh Perawat)</small></i></td>
                                        </tr>
                                    </table> 
                                    <table class="table table-no-border table-sm table-striped">
                                        <tr>
                                            <table class="table table-no-border table-sm table-striped">
                                                
                                                <tr>
                                                    <td width="20%" class="bold">Tanggal / Jam Masuk</td>
                                                    <td wdith="1%" class="bold">:</td>
                                                    <td width="79%">
                                                         <span id="tgl-masuk-papak"></span></td>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="bold">Tanggal / Jam Pengkajian</td>
                                                    <td class="bold">:</td>
                                                    <td>
                                                        <input type="text" name="tgl_pengkajian_papak"id="tgl-pengkajian-papak" class="custom-form clear-input d-inline-block col-lg-2"
                                                            placeholder="dd/mm/yyyy hh:ii">
                                                    </td>
                                                </tr>
                                            </table>
                                        </tr>
                                        <tr>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                        <tr>
                                                            <td colspan="6" style="font-weight: bold;">1. Gejala Seperti Mau Muntah Dan Kesulitan Bernafas</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="6" style="padding-left: 20px; font-weight: bold;">
                                                                Kegawatan pernafasan :
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="6" style="padding-left: 20px;">
                                                                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px 30px;">
                                                                    <label><input type="checkbox" name="kegawatan_papak_1" id="kegawatan-papak-1" value="1" class="mr-1"> Dyspnoe</label>
                                                                    <label><input type="checkbox" name="kegawatan_papak_2" id="kegawatan-papak-2" value="1" class="mr-1"> Nafas tak teratur</label>
                                                                    <label><input type="checkbox" name="kegawatan_papak_3" id="kegawatan-papak-3" value="1" class="mr-1"> Ada sekret</label>
                                                                    
                                                                    <label><input type="checkbox" name="kegawatan_papak_4" id="kegawatan-papak-4" value="1" class="mr-1"> Nafas cepat dan dangkal</label>
                                                                    <label><input type="checkbox" name="kegawatan_papak_5" id="kegawatan-papak-5" value="1" class="mr-1"> Nafas melalui mulut</label>
                                                                    <label><input type="checkbox" name="kegawatan_papak_6" id="kegawatan-papak-6" value="1" class="mr-1"> SpO₂&lt; normal</label>
                                                                    
                                                                    <label><input type="checkbox" name="kegawatan_papak_7" id="kegawatan-papak-7" value="1" class="mr-1"> Nafas lambat</label>
                                                                    <label><input type="checkbox" name="kegawatan_papak_8" id="kegawatan-papak-8" value="1" class="mr-1"> Mukosa oral kering</label>
                                                                    <label><input type="checkbox" name="kegawatan_papak_9" id="kegawatan-papak-9" value="1" class="mr-1"> T.A.K</label>
                                                                </div>
                                                            </td>
                                                        </tr>                                           
                                                    </table>
                                                </div>
                                                <div class="col-lg-6">
                                                    <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                        <tr>
                                                            <td colspan="6" style="font-weight: bold; visibility: hidden;">gg</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="6" style="padding-left: 20px; font-weight: bold;">
                                                                Kehilangan Tonus otot :
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="90%" style="padding-left: 20px;">
                                                                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px 30px;">
                                                                    <label><input type="checkbox" name="kehilangan_papak_1" id="kehilangan-papak-1" value="1" class="mr-1"> Mual</label>
                                                                    <label><input type="checkbox" name="kehilangan_papak_2" id="kehilangan-papak-2" value="1" class="mr-1"> Sulit menelan</label>
                                                                    <label><input type="checkbox" name="kehilangan_papak_3" id="kehilangan-papak-3" value="1" class="mr-1"> Inkontinensia alvi</label>

                                                                    <label><input type="checkbox" name="kehilangan_papak_4" id="kehilangan-papak-4" value="1" class="mr-1"> Penurunan Pergerakan tubuh</label>
                                                                    <label><input type="checkbox" name="kehilangan_papak_5" id="kehilangan-papak-5" value="1" class="mr-1"> Distensi Abdomen</label>
                                                                    <label><input type="checkbox" name="kehilangan_papak_6" id="kehilangan-papak-6" value="1" class="mr-1"> T.A.K</label>

                                                                    <label><input type="checkbox" name="kehilangan_papak_7" id="kehilangan-papak-7" value="1" class="mr-1"> Sulit Berbicara</label>
                                                                    <label><input type="checkbox" name="kehilangan_papak_8" id="kehilangan-papak-8" value="1" class="mr-1"> Inkontinensia Urine</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                        <tr>
                                                            <td colspan="6" style="padding-left: 20px; font-weight: bold;">
                                                                Perlambatan Sirkulasi :
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="6" style="padding-left: 20px;">
                                                                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px 50px;">
                                                                    <label style="display: inline-block; white-space: normal; width: 230px;">
                                                                        <input type="checkbox" name="perlambatan_papak_1" id="perlambatan-papak-1" value="1" class="mr-1">
                                                                        Bercak dan sianosis pada ekstremitas
                                                                    </label>

                                                                    <label><input type="checkbox" name="perlambatan_papak_2" id="perlambatan-papak-2" value="1" class="mr-1"> Gelisah</label>
                                                                    <label><input type="checkbox" name="perlambatan_papak_3" id="perlambatan-papak-3" value="1" class="mr-1"> Lemas</label>
                                                                    
                                                                    <label><input type="checkbox" name="perlambatan_papak_4" id="perlambatan-papak-4" value="1" class="mr-1"> Kulit dingin dan berkeringat</label>
                                                                    <label><input type="checkbox" name="perlambatan_papak_5" id="perlambatan-papak-5" value="1" class="mr-1"> Tekanan Darah menurun</label>
                                                                    <label><input type="checkbox" name="perlambatan_papak_6" id="perlambatan-papak-6" value="1" class="mr-1"> Nadi lambat dan lemah</label>
                                                                    
                                                                    <label><input type="checkbox" name="perlambatan_papak_7" id="perlambatan-papak-7" value="1" class="mr-1"> T.A.K</label>
                                                                </div>
                                                            </td>
                                                        </tr>                                           
                                                    </table>
                                                </div>
                                                <div class="col-lg-6">
                                                    <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                        <tr>
                                                            <td colspan="6" style="padding-left: 20px; font-weight: bold;">
                                                                Nyeri :
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="90%" style="padding-left: 20px;">
                                                                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px 30px;">
                                                                    <label><input type="checkbox" name="penilaian_papak_5" id="penilaian-papak-5" value="1" class="mr-1"> Tidak</label>
                                                                    <label><input type="checkbox" name="penilaian_papak_6" id="penilaian-papak-6" value="1" class="mr-1"> Ya</label>

                                                                    <label>Lokasi &nbsp;<input type="text" name="penilaian_papak_8"id="penilaian-papak-8"class="custom-form clear-input d-inline-block col-lg-10"readonly></label>
                                                                    <label>Skala &nbsp;<input type="text" name="penilaian_papak_9"id="penilaian-papak-9"class="custom-form clear-input d-inline-block col-lg-10"readonly></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                        <tr>
                                                            <td colspan="6" style="font-weight: bold;">2. Faktor-faktor yang meningkatkan dan membangkitkan gejala fisik</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="90%" style="padding-left: 20px;">
                                                                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px 30px;">
                                                                    <label><input type="checkbox" name="faktor_papak_1" id="faktor-papak-1" value="1" class="mr-1"> Melakukan aktivitas fisik </label>
                                                                    <label><input type="checkbox" name="faktor_papak_2" id="faktor-papak-2" value="1" class="mr-1"> Pindah posisi</label>
                                                                    <label>
                                                                        <input type="checkbox" name="faktor_papak_3" id="faktor-papak-3" value="1" class="mr-1"> lain-lain &nbsp;&nbsp;
                                                                        <input type="text" name="faktor_papak_4"id="faktor-papak-4"class="custom-form clear-input d-inline-block col-lg-10"readonly>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                        <tr>
                                                            <td colspan="6" style="font-weight: bold;">3. Manajemen Gejala saat ini dan respon pasien</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="6" style="padding-left: 20px; font-weight: bold;">
                                                                Masalah Keperawatan :
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="6" style="padding-left: 20px;">
                                                                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px 30px;">
                                                                    <label><input type="checkbox" name="manajemen_papak_1" id="manajemen-papak-1" value="1" class="mr-1"> Mual</label>
                                                                    <label><input type="checkbox" name="manajemen_papak_2" id="manajemen-papak-2" value="1" class="mr-1"> Pola napas tidak efektif</label>
                                                                    <label><input type="checkbox" name="manajemen_papak_3" id="manajemen-papak-3" value="1" class="mr-1"> Bersihan jalan tidak efektif</label>
                                                                    
                                                                    <label><input type="checkbox" name="manajemen_papak_4" id="manajemen-papak-4" value="1" class="mr-1"> Perubahan persepsi sensori</label>
                                                                    <label><input type="checkbox" name="manajemen_papak_5" id="manajemen-papak-5" value="1" class="mr-1"> Konstipasi</label>
                                                                    <label><input type="checkbox" name="manajemen_papak_6" id="manajemen-papak-6" value="1" class="mr-1"> Defisit perawatan diri</label>
                                                                    
                                                                    <label><input type="checkbox" name="manajemen_papak_7" id="manajemen-papak-7" value="1" class="mr-1"> Nyeri akut</label>
                                                                    <label><input type="checkbox" name="manajemen_papak_8" id="manajemen-papak-8" value="1" class="mr-1"> Nyeri Kronis</label>
                                                                </div>
                                                            </td>
                                                        </tr>                                           
                                                    </table>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                        <tr>
                                                            <td colspan="10" style="font-weight: bold;">4. Orientasi Spiritual Pasien Dan Keluarga</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="90%" style="padding-left: 20px;">
                                                                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px 30px;">
                                                                    <label> Apakah perlu pelayanan spiritual ? &nbsp;<input type="radio" name="orintasi_papak_1" id="orintasi-papak-1" value="1" class="mr-1"> Tidak</label>
                                                                    <label>
                                                                        <input type="radio" name="orintasi_papak_1" id="orintasi-papak-2" value="2" class="mr-1"> Ya, &nbsp; Oleh :
                                                                        <input type="text" name="orintasi_papak_3"id="orintasi-papak-3"class="custom-form clear-input d-inline-block col-lg-10"readonly>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                        <tr>
                                                            <td colspan="10" style="font-weight: bold;">5. Urusan dan Kebutuhan Spiritual pasien dan keluarga seperti putus asa, penderitaan, rasa bersalah</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="90%" style="padding-left: 20px;">
                                                                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px 30px;">
                                                                    <label> Perlu di doakan &nbsp; : <input type="radio" name="urusan_papak_1" id="urusan-papak-1" value="1" class="mr-1"> Tidak</label>
                                                                    <label>
                                                                        <input type="radio" name="urusan_papak_1" id="urusan-papak-2" value="2" class="mr-1"> Ya, &nbsp; Oleh :
                                                                        <input type="text" name="urusan_papak_7"id="urusan-papak-7"class="custom-form clear-input d-inline-block col-lg-10"readonly>
                                                                    </label>

                                                                    <label> Perlu bimbingan rohani &nbsp; : <input type="radio" name="urusan_papak_3" id="urusan-papak-3" value="1" class="mr-1"> Tidak</label>
                                                                    <label>
                                                                        <input type="radio" name="urusan_papak_3" id="urusan-papak-4" value="2" class="mr-1"> Ya, &nbsp; Oleh :
                                                                        <input type="text" name="urusan_papak_8"id="urusan-papak-8"class="custom-form clear-input d-inline-block col-lg-10"readonly>
                                                                    </label>

                                                                    <label> Perlu pendampingan rohani &nbsp; : <input type="radio" name="urusan_papak_5" id="urusan-papak-5" value="1" class="mr-1"> Tidak</label>
                                                                    <label>
                                                                        <input type="radio" name="urusan_papak_5" id="urusan-papak-6" value="2" class="mr-1"> Ya, &nbsp; Oleh :
                                                                        <input type="text" name="urusan_papak_9"id="urusan-papak-9"class="custom-form clear-input d-inline-block col-lg-10"readonly>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                        <tr>
                                                            <td colspan="10" style="font-weight: bold;">6. Status Psikologis Pasien dan Keluarga</td>
                                                        </tr>
                                                            <tr>
                                                            <td colspan="6" style="padding-left: 20px; font-weight: bold;">
                                                                Apakah ada orang yang ingin dihubungi saat ?
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="90%" style="padding-left: 20px;">
                                                                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px 30px;">
                                                                    <label> Ya,
                                                                        <input type="checkbox" name="psikologis_papak_1" id="psikologis-papak-1" value="1" class="mr-1">
                                                                        Siapa <input type="text" name="psikologis_papak_2"id="psikologis-papak-2"class="custom-form clear-input d-inline-block col-lg-10"readonly>
                                                                    </label>
                                                                    <label> Hubungan dengan pasien sebagai <input type="text" name="psikologis_papak_3"id="psikologis-papak-3"class="custom-form clear-input d-inline-block col-lg-8"readonly></label>

                                                                    <label> Dimana <input type="text" name="psikologis_papak_4"id="psikologis-papak-4"class="custom-form clear-input d-inline-block col-lg-10"readonly></label>
                                                                    <label> No. Telpon/HP <input type="text" name="psikologis_papak_5"id="psikologis-papak-5"class="custom-form clear-input d-inline-block col-lg-10"readonly></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                            <tr>
                                                            <td colspan="6" style="padding-left: 20px; font-weight: bold;">
                                                                Bagaimana rencana perawatan selanjutya ?
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="90%" style="padding-left: 20px;">
                                                                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px 30px;">
                                                                        <label>
                                                                        <input type="checkbox" name="psikologis_papak_6" id="psikologis-papak-6" value="1" class="mr-1"> Tetap dirawat di RS 
                                                                    </label>
                                                                </div>
                                                                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px 30px;">
                                                                        <label>
                                                                        <input type="checkbox" name="psikologis_papak_7" id="psikologis-papak-7" value="2" class="mr-1"> Dirawat di rumah
                                                                    </label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                            <tr>
                                                            <td colspan="8" style="padding-left: 20px; font-weight: bold;">
                                                                Apakah lingkungan rumah sudah disiapkan ?
                                                                    <input type="radio" name="psikologis_papak_8" id="psikologis-papak-8" value="1" class="mr-1"> Ya 
                                                                    &nbsp;&nbsp;
                                                                    <input type="radio" name="psikologis_papak_8" id="psikologis-papak-9" value="2" class="mr-1"> Tidak
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="90%" style="padding-left: 20px;">
                                                                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px 30px;">
                                                                    <label> Jika ya, apakah ada yang mampu merawat pasien di rumah ? </label>
                                                                    <label> 
                                                                        <input type="radio" name="psikologis_papak_10" id="psikologis-papak-10" value="1" class="mr-1"> Ya,
                                                                        Oleh <input type="text" name="psikologis_papak_11"id="psikologis-papak-11"class="custom-form clear-input d-inline-block col-lg-7"readonly>
                                                                        <input type="radio" name="psikologis_papak_10" id="psikologis-papak-12" value="2" class="mr-1"> Tidak
                                                                    </label>
                                                                </div>

                                                                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px 30px;">
                                                                    <label> Jika tidak, apakah perlu difasilitasi RS (Home Care) ? </label>
                                                                    <label> 
                                                                        <input type="radio" name="psikologis_papak_13" id="psikologis-papak-13" value="1" class="mr-1"> Ya, &nbsp;&nbsp;
                                                                        <input type="radio" name="psikologis_papak_13" id="psikologis-papak-14" value="2" class="mr-1"> Tidak
                                                                    </label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                            <tr>
                                                            <td colspan="8" style="padding-left: 20px; font-weight: bold;">
                                                                Reaksi pasien atas penyakitnya :
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="90%" style="padding-left: 20px;">
                                                                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px 30px;">
                                                                    <label> <input type="checkbox" name="reaksi_pasien_papak_1" id="reaksi-pasien-papak-1" value="1" class="mr-1"> Menyangkal</label>
                                                                    <label> <input type="checkbox" name="reaksi_pasien_papak_2" id="reaksi-pasien-papak-2" value="1" class="mr-1"> Sedih / menangis</label>

                                                                    <label> <input type="checkbox" name="reaksi_pasien_papak_3" id="reaksi-pasien-papak-3" value="1" class="mr-1"> Marah</label>
                                                                    <label> <input type="checkbox" name="reaksi_pasien_papak_4" id="reaksi-pasien-papak-4" value="1" class="mr-1"> Rasa bersalah</label>

                                                                    <label> <input type="checkbox" name="reaksi_pasien_papak_5" id="reaksi-pasien-papak-5" value="1" class="mr-1"> Takut</label>
                                                                    <label> <input type="checkbox" name="reaksi_pasien_papak_6" id="reaksi-pasien-papak-6" value="1" class="mr-1"> Ketidak berdayaan</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="col-lg-6">
                                                    <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                            <tr>
                                                            <td colspan="8" style="padding-left: 20px; font-weight: bold;">
                                                                Masalah Keperawatan :
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="90%" style="padding-left: 20px;">
                                                                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px 30px;">
                                                                    <label> <input type="checkbox" name="mp_papak_1" id="mp-papak-1" value="1" class="mr-1"> Ansietas, Kematian</label>
                                                                    <label> <input type="checkbox" name="mp_papak_2" id="mp-papak-2" value="1" class="mr-1"> Distres Spiritual</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                            <tr>
                                                            <td colspan="8" style="padding-left: 20px; font-weight: bold;">
                                                                Reaksi keluarga atas penyakit pasien : 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="90%" style="padding-left: 20px;">
                                                                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px 30px;"> 
                                                                    <label><input type="checkbox" name="reaksi_keluarga_papak_1" id="reaksi-keluarga-papak-1" value="1" class="mr-1"> Marah</label>                                                                       
                                                                    <label><input type="checkbox" name="reaksi_keluarga_papak_2" id="reaksi-keluarga-papak-2" value="1" class="mr-1"> Letih/lelah</label>                                                                   
                                                                    <label><input type="checkbox" name="reaksi_keluarga_papak_3" id="reaksi-keluarga-papak-3" value="1" class="mr-1"> Gangguan tidur</label>                                                      
                                                                    <label><input type="checkbox" name="reaksi_keluarga_papak_4" id="reaksi-keluarga-papak-4" value="1" class="mr-1"> Rasa bersalah</label>                                             
                                                                    <label><input type="checkbox" name="reaksi_keluarga_papak_5" id="reaksi-keluarga-papak-5" value="1" class="mr-1"> Penurunan Konsentrasi</label>             
                                                                    <label><input type="checkbox" name="reaksi_keluarga_papak_6" id="reaksi-keluarga-papak-6" value="1" class="mr-1"> Perubahan kebiasaan pola komunikasi</label>                                                   
                                                                    <label><input type="checkbox" name="reaksi_keluarga_papak_7" id="reaksi-keluarga-papak-7" value="1" class="mr-1"> Ketidakmampuan memenuhi peran yang diharapkan </label>                                     
                                                                    <label><input type="checkbox" name="reaksi_keluarga_papak_8" id="reaksi-keluarga-papak-8" value="1" class="mr-1"> Keluarga kurang berkomunikasi dengan pasien</label>                   
                                                                    <label><input type="checkbox" name="reaksi_keluarga_papak_9" id="reaksi-keluarga-papak-9" value="1" class="mr-1"> Keluarga kurang berpartisipasi membuat keputusan dalam perawatan pasien</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </tr>                      
                                        <tr>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                            <tr>
                                                            <td colspan="8" style="padding-left: 20px; font-weight: bold;">
                                                                Masalah Keperawatan : 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="90%" style="padding-left: 20px;">
                                                                <div style="display: grid; grid-template-columns: repeat(1, 1fr); gap: 10px 30px;"> 
                                                                    <label><input type="checkbox" name="masalah_kep_papak_8" id="masalah-kep-papak-8" value="1" class="mr-1"> Perubahan proses keluarga</label>                                                                       
                                                                    <label><input type="checkbox" name="masalah_kep_papak_13" id="masalah-kep-papak-13" value="1" class="mr-1"> Koping individu tidak efektif</label>                                                                   
                                                                    <label><input type="checkbox" name="masalah_kep_papak_16" id="masalah-kep-papak-16" value="1" class="mr-1"> Distress spiritual</label>                                                      
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                        <tr>
                                                            <td colspan="10" style="font-weight: bold;">7. Kebutuhan dukungan atau kelonggaran pelayanan bagi pasien, keluarga dan pemberi pelayanan lain</td>
                                                        </tr>
                                                            <tr>
                                                            <td colspan="6" style="padding-left: 20px; font-weight: bold;">
                                                                Apakah ada orang yang ingin dihubungi saat ?
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="90%" style="padding-left: 20px;">
                                                                <div style="display: grid; grid-template-columns: repeat(1, 1fr); gap: 10px 30px;">
                                                                    <label><input type="checkbox" name="kebutuhan_papak_1" id="kebutuhan-papak-1" value="1" class="mr-1"> Pasien perlu didampingi keluarga</label>
                                                                    <label><input type="checkbox" name="kebutuhan_papak_2" id="kebutuhan-papak-2" value="1" class="mr-1"> Keluarga dapat mengunjungi pasien di luar waktu berkunjung</label>
                                                                    <label><input type="checkbox" name="kebutuhan_papak_3" id="kebutuhan-papak-3" value="1" class="mr-1"> Sahabat dapat mengunjungi pasien di luar waktu berkunjung</label>
                                                                    <label>
                                                                        <input type="checkbox" name="kebutuhan_papak_4" id="kebutuhan-papak-4" value="1" class="mr-1">
                                                                        <input type="text" name="kebutuhan_papak_5"id="kebutuhan-papak-5"class="custom-form clear-input d-inline-block col-lg-10"readonly>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                        <tr>
                                                            <td colspan="10" style="font-weight: bold;">8. Apakah ada kebutuhan akan alternatif atau tingkat pelayanan lain</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="90%" style="padding-left: 20px;">
                                                                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px 30px;">
                                                                    <label><input type="checkbox" name="apakah_papak_1" id="apakah-papak-1" value="1" class="mr-1"> Tidak</label>
                                                                    <label><input type="checkbox" name="apakah_papak_2" id="apakah-papak-2" value="1" class="mr-1"> Autopsi</label>

                                                                    <label>
                                                                        <input type="checkbox" name="apakah_papak_3" id="apakah-papak-3" value="1" class="mr-1"> Donasi Organ :
                                                                        <input type="text" name="apakah_papak_4"id="apakah-papak-4"class="custom-form clear-input d-inline-block col-lg-10"readonly>
                                                                    </label>
                                                                    <label>
                                                                        <input type="checkbox" name="apakah_papak_5" id="apakah-papak-5" value="1" class="mr-1">
                                                                        <input type="text" name="apakah_papak_6"id="apakah-papak-6"class="custom-form clear-input d-inline-block col-lg-10"readonly>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                        <tr>
                                                            <td colspan="10" style="font-weight: bold;">9. Faktor resiko bagi keluarga yang ditinggalkan</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="90%" style="padding-left: 20px;">
                                                                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px 30px;">
                                                                    <label><input type="checkbox" name="bagi_papak_1" id="bagi-papak-1" value="1" class="mr-1"> Marah</label>
                                                                    <label><input type="checkbox" name="bagi_papak_2" id="bagi-papak-2" value="1" class="mr-1"> Letih/lelah</label>
                                                                    <label><input type="checkbox" name="bagi_papak_3" id="bagi-papak-3" value="1" class="mr-1"> Depresi</label>
                                                                    <label><input type="checkbox" name="bagi_papak_4" id="bagi-papak-4" value="1" class="mr-1"> Gangguan tidur</label>
                                                                    <label><input type="checkbox" name="bagi_papak_5" id="bagi-papak-5" value="1" class="mr-1"> Rasa bersalah</label>
                                                                    <label><input type="checkbox" name="bagi_papak_6" id="bagi-papak-6" value="1" class="mr-1"> Sedih/menangis</label>
                                                                    <label><input type="checkbox" name="bagi_papak_7" id="bagi-papak-7" value="1" class="mr-1"> Perubahan kebiasaan pola komunikasi</label>
                                                                    <label><input type="checkbox" name="bagi_papak_8" id="bagi-papak-8" value="1" class="mr-1"> Penurunan konsentrasi</label>        
                                                                    <label><input type="checkbox" name="bagi_papak_9" id="bagi-papak-9" value="1" class="mr-1"> Ketidak mampuan memenuhi peran yang diharapkan</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                            <tr>
                                                            <td colspan="6" style="padding-left: 20px; font-weight: bold;">
                                                                Masalah Keperawatan :
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="90%" style="padding-left: 20px;">
                                                                <div style="display: grid; grid-template-columns: repeat(1, 1fr); gap: 10px 30px;">
                                                                    <label><input type="checkbox" name="mpn_papak_1" id="mpn-papak-1" value="1" class="mr-1"> Koping individu tidak efektif</label>
                                                                    <label><input type="checkbox" name="mpn_papak_2" id="mpn-papak-2" value="1" class="mr-1"> Distress Spiritual</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center td-dark"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" class="center"><b>YANG MELAKUKAN PENGKAJIAN</b></td>
                                                </tr>
                                                <tr>
                                                    <td class="center" width="30%">
                                                        <b>Tanggal & Jam :</b>  <input type="text" name="tanggal_jam_perawat_papak"
                                                            id="tanggal-jam-perawat-papak"
                                                            class="custom-form clear-input d-inline-block col-lg-5 ml-2"
                                                            value="<?= date('d/m/Y H:i') ?>"
                                                            placeholder="Masukkan tanggal & jam">
                                                    </td>
                                                    <td class="center" width="30%">
                                                        <b>Nama Perawat :</b> <input type="text" name="perawat_papak" id="perawat-papak"
                                                            class="select2c-input ml-2">
                                                    </td>
                                                    <td class="center" width="30%">
                                                        <b>Tanda Tangan Perawat :</b>  
                                                        <p>
                                                        <div class="center">
                                                            <input type="checkbox" name="ttd_perawat_papak" id="ttd-perawat-papak"
                                                                value="1" class="custom-form col-lg-1 mx-auto">
                                                            <?= digitalSignature('ttd_perawat_papak_verified') ?>
                                                        </div>
                                                    </td>
                                                </tr>                                          
                                            </table>  
                                        </tr>     
                                    </table>                       
                                </div>
                                <?= form_close() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
                <button id="btn-simpan"  type="button" class="btn btn-info" onclick="konfirmasiSimpanFormPengkajianPasienAkhirKehidupan()"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
            </div>
        </div>
    </div>
</div>