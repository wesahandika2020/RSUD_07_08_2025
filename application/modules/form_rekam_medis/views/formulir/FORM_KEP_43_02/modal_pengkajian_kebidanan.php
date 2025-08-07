<!-- Modal -->
<!-- // PAKDK-->
<div class="modal fade" id="modal_pengkajian_kebidanan" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold" id="modal_pengkajian_kebidanan">FORM PENGKAJIAN AWAL KEBIDANAN DAN
                        KANDUNGAN</h5>
                    <h6 class="modal-title text-muted"><small>(Dilengkapi dalam waktu 24 jam pertama pasien masuk ruang
                            rawat inap)</small></h6>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_pengkajian_awal_kebidanan class="form-horizontal"') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-kebidanan">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran">
                <input type="hidden" name="id_pasien" id="id-pasien-kebidanan">
                <input type="hidden" name="id_kajian_kebidanan" id="id-kajian-kebidanan">
                <input type="hidden" name="id_kajian_medis_kebidanan" id="id-kajian-medis-kebidanan">
                <input type="hidden" name="id_user" id="id-user"
                    value="<?= $this->session->userdata('id_translucent') ?>">

                <!-- header -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="20%" class="bold">Nama Pasien</td>
                                    <td wdith="80%">: <span id="nama-pasien-kebidanan"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">No. RM</td>
                                    <td>: <span id="norm-pasien"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Tanggal Lahir</td>
                                    <td>: <span id="ttl-pasien"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Jenis Kelamin</td>
                                    <td>: <span id="jk-pasien"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="30%" class="bold">Ruang Rawat/Unit Kerja</td>
                                    <td wdith="70%">: <span id="kebidanan-bed"></span></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="logo-pasien-alergi">
                                            <img src="<?= resource_url() ?>images/diagnosa/alergi.jpg"
                                                alt="logo-pasien-alergi" class="img-thumbnail rounded" width="20%">
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
                        <div class="widget-body">
                            <div id="bwizard_pengkajian_kebidanan">
                                <ol>
                                    <li>Pengkajian Kebidanan <i class="bold"><small>(Diisi Oleh Bidan)</small></i></li>
                                    <li>Pengkajian Medis <i class="bold"><small>(Diisi Oleh Dokter)</small></i></li>
                                </ol>
                                <!-- Data Pengkajian Perawat-->
                                <div class="form-data-pengkajian-kebidanan">
                                    <table class="table table-no-border table-sm table-striped">
                                        <tr>
                                            <td colspan="3">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"id="btn-expand-all-kebidanan"><i
                                                        class="fas fa-fw fa-expand mr-1"></i>Expand All</button>
                                                <button class="btn btn-warning btn-xs mr-1 float-left" type="button"id="btn-collapse-all-kebidanan"><i
                                                        class="fas fa-fw fa-compress mr-1"></i>Collapse All</button>
                                                <span id="desclaimer_history_kebidanan"style="color:red; font-style:italic;"></span><button
                                                    class="btn btn-success btn-xs mr-1 float-left" type="button"id="btn_history_logs_kebidanan"><i
                                                    class="fas fa-fw fa-history mr-1"></i>Show History Logs
                                                    Kebidanan</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20%" class="bold">Tanggal / Jam Masuk</td>
                                            <td wdith="1%" class="bold">:</td>
                                            <td width="79%"><input type="text" name="waktu_masuk_kebidanan"
                                                id="waktu-masuk-kebidanan" class="custom-form clear-input col-lg-2"readonly></td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Tanggal / Jam Pengkajian</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="text" name="waktu_kajian_kebidanan"id="waktu-kajian-kebidanan" class="custom-form clear-input d-inline-block col-lg-2"value="<?= date('d/m/Y H:i') ?>"
                                                    placeholder="Masukkan tanggal & jam">
                                                <!-- <input type="text" name="waktu_kajian_kebidanan"id="waktu-kajian-kebidanan" class="custom-form clear-input col-lg-2"value="<!?= date('d/m/Y H:i') ?>"> -->
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Agama</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="checkbox" name="agama_pasien" id="agama-islam-pasien"value="Islam" class="mr-1" disabled>Islam
                                                <input type="checkbox" name="agama_pasien" id="agama-kristen-pasien"value="Kristen" class="mr-1 ml-2" disabled>Kristen
                                                <input type="checkbox" name="agama_pasien" id="agama-hindu-pasien"value="Hindu" class="mr-1 ml-2" disabled>Hindu
                                                <input type="checkbox" name="agama_pasien" id="agama-katholik-pasien"value="Katholik" class="mr-1 ml-2" disabled>Katholik
                                                <input type="checkbox" name="agama_pasien" id="agama-buddha-pasien"value="Buddha" class="mr-1 ml-2" disabled>Buddha
                                                <input type="radio" name="agama_pasien" id="agama_pasien_lain"value="Lain" class="mr-1 ml-2" disabled>Lainnya
                                                <input type="text" name="agama_pasien" id="agama-lain-input-pasien"class="custom-form clear-input d-inline-block col-lg-4 ml-1"
                                                    placeholder="Masukkan agama lain" disabled>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Pendidikan</td>
                                            <td class="bold">:</td>
                                            <td><input type="text" name="pendidikan_kebidanan"
                                                id="pendidikan_pasien_kebidanan" class="custom-form col-lg-3"placeholder="Masukkan pendidikan" disabled></td>
                                        </tr>
                                        </tr>
                                        <tr>
                                            <td class="bold">Cara Masuk RS</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="checkbox" name="cara_masuk_pasien"id="cara-masuk-irj-pasien" value="IRJ" class="mr-1" disabled>IRJ
                                                <input type="checkbox" name="cara_masuk_pasien"id="cara-masuk-igd-pasien" value="IGD" class="mr-1 ml-2"disabled>IGD
                                                <input type="checkbox" name="cara_masuk_pasien"id="cara-masuk-lain-pasien" value="Lain-lain" class="mr-1 ml-2"disabled>Lain-lain
                                                <input type="text" name="cara_masuk_pasien"id="cara-masuk-lain-lain-pasien"class="custom-form clear-input d-inline-block col-lg-4"
                                                    placeholder="Masukkan cara masuk RS" disabled>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Tiba Diruangan Rawat dengan Cara</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="radio" name="cara_tiba_diruangan_pasien"id="cara-tiba-diruangan-pasien-jalan" value="Jalan" class="mr-1">Jalan
                                                <input type="radio" name="cara_tiba_diruangan_pasien"id="cara-tiba-diruangan-pasien-brankar" value="Brankar"class="mr-1 ml-2">Brankar
                                                <input type="radio" name="cara_tiba_diruangan_pasien"id="cara-tiba-diruangan-kursi-roda" value="KursiRoda"class="mr-1 ml-2">Kursi Roda
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Rujukan</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="checkbox" name="rujukan_pasien_1"id="rujukan-pasien-rs" value="Rs" class="mr-1">Rs
                                                <input type="text" name="rujukan_pasien_2" id="rujukan-pasien-rss" class="custom-form clear-input d-inline-block col-lg-2"placeholder="Sebutkan"disabled>

                                                <input type="checkbox" name="rujukan_pasien_3"id="rujukan-pasien-puskesmas" value="Puskesmas" class="mr-1 ml-2">Puskesmas
                                                <input type="text" name="rujukan_pasien_4" id="rujukan-pasien-puskesmass" class="custom-form clear-input d-inline-block col-lg-2"placeholder="Sebutkan"disabled>

                                                <input type="checkbox" name="rujukan_pasien_5"id="rujukan-pasien-bidan" value="Bidan" class="mr-1 ml-2">Bidan
                                                <input type="text" name="rujukan_pasien_6" id="rujukan-pasien-bidann" class="custom-form clear-input d-inline-block col-lg-2"placeholder="Sebutkan"disabled>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold"></td>
                                            <td class="bold"></td>
                                            <td>
                                                <input type="checkbox" name="rujukan_pasien_7"id="rujukan-pasien-tidak" value="Tidak ada Rujukan" class="mr-1">Tidak ada Rujukan
                                                <input type="checkbox" name="rujukan_pasien_8"id="rujukan-pasien-lain" value="lain-lain" class="mr-1 ml-2">lain-lain
                                                <input type="text" name="rujukan_pasienl" id="rujukan-pasien-lainl" class="custom-form clear-input d-inline-block col-lg-3"
                                                    placeholder="Sebutkan lainya"disabled>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Informasi Diperoleh Dari</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="radio" name="informasi_pasien" id="informasi-pasien"value="Pasien" class="mr-1">Pasien
                                                <input type="radio" name="informasi_pasien" id="informasi-kluwarga"value="Keluarga" class="mr-1 ml-2">Keluarga
                                                <input type="radio" name="informasi_pasien" id="informasi-lain" value="lain-lain" class="mr-1 ml-2">lain - lain
                                                <input type="text" name="informasi_pasienn" id="informasi-sebutkan"class="custom-form clear-input d-inline-block col-lg-4"
                                                    placeholder="Sebutkan lainya" disabled>
                                            </td>
                                        </tr>

                                        <!-- KELUHAN UTAMA AWAL -->
                                        <table class="table table-no-border table-sm table-striped"
                                            style="margin-top:-15px">
                                            <tr>
                                                <td colspan="3" class="center bold td-dark">
                                                    <button class="btn btn-info btn-xs mr-1 float-left" type="button"data-toggle="collapse"
                                                        data-target="#data-keluhan-utama-kebidanan"><i class="fas fa-expand mr-1"></i>Expand</button>KELUHAN UTAMA
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="collapse multi-collapse" id="data-keluhan-utama-kebidanan">
                                            <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                <tr>
                                                    <td width="33%"><input type="checkbox" name="keluhan_utama_keb_1"id="keluhan-utama-keb-1" class="mr-1"
                                                        value="1">Mules-mules/kontraksi</td>
                                                    <td>
                                                        Jam <input type="text" name="keluhan_utama_keb_2" id="keluhan-utama-keb-2"class="custom-form clear-input d-inline-block col-lg-5"
                                                        placeholder="Masukan jam">
                                                    </td>
                                                    <td>
                                                        Tanggal <input type="text" name="keluhan_utama_keb_3"id="keluhan-utama-keb-3"
                                                            class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="Masukan tanggal">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="33%"><input type="checkbox" name="keluhan_utama_keb_4"
                                                            id="keluhan-utama-keb-4" class="mr-1" value="1">Keluar air ketuban</td>
                                                    <td>
                                                        Jam <input type="text" name="keluhan_utama_keb_5" id="keluhan-utama-keb-5"class="custom-form clear-input d-inline-block col-lg-5 ml-2"
                                                            placeholder="Masukan jam">
                                                    </td>
                                                    <td>
                                                        Warna <input type="text" name="keluhan_utama_keb_6" id="keluhan-utama-keb-6" class="custom-form clear-input d-inline-block col-lg-5 ml-2"
                                                            placeholder="sebutkan">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="33%"><input type="checkbox" name="keluhan_utama_keb_7"
                                                        id="keluhan-utama-keb-7" class="mr-1" value="1">Keluar lendir darah
                                                    </td>
                                                    <td>
                                                        Jam <input type="text" name="keluhan_utama_keb_8" id="keluhan-utama-keb-8"class="custom-form clear-input d-inline-block col-lg-5 ml-2"
                                                            placeholder="Masukan jam">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="33%"><input type="checkbox" name="keluhan_utama_keb_9"
                                                            id="keluhan-utama-keb-9" class="mr-1" value="1">Darah
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="33%"><input type="checkbox" name="keluhan_utama_keb_10"
                                                            id="keluhan-utama-keb-10" class="mr-1" value="1">Lain-lain
                                                    </td>
                                                    <!-- <td>
                                                        Sebutkan <input type="text" name="keluhan_utama_keb_11"
                                                            id="keluhan-utama-keb-11"
                                                            class="custom-form clear-input d-inline-block col-lg-6 "
                                                            placeholder="sebutkan" disabled>
                                                    </td> -->
                                                    
                                                    <td>
                                                    Sebutkan <textarea name="keluhan_utama_keb_11"id="keluhan-utama-keb-11" rows="5"class="form-control clear-input"disabled></textarea>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- KELUHAN UTAMA AKHIR -->

                                        <!-- RIWAYAT KEHAMILAN SEKARANG AWAL -->
                                        <table class="table table-no-border table-sm table-striped"
                                            style="margin-top:-15px">
                                            <tr>
                                                <td colspan="3" class="center bold td-dark">
                                                    <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                        data-toggle="collapse" data-target="#data-riwayat-kehamilan"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>RIWAYAT
                                                    KEHAMILAN SEKARANG
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="collapse multi-collapse mt-2" id="data-riwayat-kehamilan">
                                            <table class="table table-no-border table-sm table-striped"
                                                style="margin-top:-15px">
                                                <tr>
                                                    <td class="bold">Hamil Muda</td>
                                                    <td class="bold">:</td>
                                                    <td>
                                                        <input type="checkbox" name="hamil_muda_1" id="hamil-muda-1"
                                                            value="1" class="mr-1">Mual
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="hamil_muda_2" id="hamil-muda-2"
                                                            value="1" class="mr-1 ml-2">Muntah
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="hamil_muda_3" id="hamil-muda-3"
                                                            value="1" class="mr-1 ml-2">Perdarahan
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="hamil_muda_4" id="hamil-muda-4"
                                                            value="1" class="mr-1 ml-2">Lain-lain
                                                    </td>
                                                    <td>
                                                        <input type="text" name="hamil_lain_lain" id="hamil-lain-lain"
                                                            class="custom-form clear-input d-inline-block"
                                                            placeholder="Masukkan hamil kehamilan lain" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="bold">Hamil Tua</td>
                                                    <td class="bold">:</td>
                                                    <td>
                                                        <input type="checkbox" name="hamil_tua_1" id="hamil-tua-1"
                                                            value="1" class="mr-1">Pusing
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="hamil_tua_2" id="hamil-tua-2"
                                                            value="1" class="mr-1 ml-2">Sakit
                                                        Kepala
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="hamil_tua_3" id="hamil-tua-3"
                                                            value="1" class="mr-1 ml-2">Perdarahan
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="hamil_tua_4" id="hamil-tua-4"
                                                            value="1" class="mr-1 ml-2">Lain-lain
                                                    </td>
                                                    <td>
                                                        <input type="text" name="hamil_lain_5" id="hamil-lain-5"
                                                            class="custom-form clear-input d-inline-block"
                                                            placeholder="Masukkan hamil kehamilan lain" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="bold">ANC</td>
                                                    <td class="bold">:</td>
                                                    <td>
                                                        <input type="text" name="anc_1" id="anc-1"
                                                            class="custom-form clear-input d-inline-block col-lg-5 ml-2"
                                                            placeholder="silahkan di isi"> x
                                                    </td>
                                                    <td>
                                                        di<input type="text" name="anc_2" id="anc-2"
                                                            class="custom-form clear-input d-inline-block col-lg-10 ml-2"
                                                            placeholder="silahkan di isi">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="anc_3" id="anc-3" value="1"
                                                            class="mr-1 ml-2">Teratur
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="anc_4" id="anc-4" value="1"
                                                            class="mr-1 ml-2">Tidak teratur
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="anc_5" id="anc-5" value="1"
                                                            class="mr-1 ml-2">Imunisasi TT
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        G<input type="text" name="g_riwayat" id="g-riwayat"
                                                            class="custom-form clear-input d-inline-block col-lg-6 ml-2"
                                                            placeholder="silahkan di isi">
                                                    </td>
                                                    <td colspan="2">
                                                        P<input type="text" name="p_riwayat" id="p-riwayat"
                                                            class="custom-form clear-input d-inline-block col-lg-6 ml-2"
                                                            placeholder="silahkan di isi">
                                                    </td>
                                                    <td>
                                                        A<input type="text" name="a_riwayat" id="a-riwayat"
                                                            class="custom-form clear-input d-inline-block col-lg-6 ml-2"
                                                            placeholder="silahkan di isi">
                                                    </td>
                                                    <td colspan="3">
                                                        Usia Kehamilan :<input type="text" name="usia_kehamilan"
                                                            id="usia-kehamilan"
                                                            class="custom-form clear-input d-inline-block col-lg-7 ml-1"
                                                            placeholder="sebutkan">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        Hari Pertama Haid Terakhir (HPHT) :<input type="text"
                                                            name="hari_pertama_haid" id="hari-pertama-haid"
                                                            class="custom-form clear-input d-inline-block col-lg-6 ml-1"
                                                            placeholder="masukan tanggal ( hpht )">
                                                    </td>
                                                    <td colspan="3">
                                                        Taksiran Persalinan (TP) :<input type="text"
                                                            name="taksiran_persalinan" id="taksiran-persalinan"
                                                            class="custom-form clear-input d-inline-block col-lg-6 ml-1"
                                                            placeholder="masukan tanggal ( tp )">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- RIWAYAT KEHAMILAN SEKARANG AKHIR -->

                                        <!-- RIWAYAT KESEHATAN AWAL -->
                                        <table class="table table-no-border table-sm table-striped"
                                            style="margin-top:-15px">
                                            <tr>
                                                <td colspan="3" class="center bold td-dark">
                                                    <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                        data-toggle="collapse" data-target="#data-riwayat-kesehatan"><i
                                                            class="fas fa-expand mr-1"></i>Expand</button>RIWAYAT
                                                    KESEHATAN
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="collapse multi-collapse mt-2" id="data-riwayat-kesehatan">
                                            <table class="table table-no-border table-sm table-striped"
                                                style="margin-top:-15px">
                                                <tr>
                                                    <th rowspan="2">Riwayat Menstruasi :</th>
                                                    <td colspan="9">
                                                        <input type="checkbox" name="riwayat_menstruasi_1"
                                                            id="riwayat-menstruasi-1" value="1" class="mr-1">Umur
                                                        Menarche :
                                                        <input type="text" name="riwayat_menstruasi_2"
                                                            id="riwayat-menstruasi-2"
                                                            class="custom-form clear-input d-inline-block col-lg-1 mx-1"
                                                            placeholder="Sebutkan">tahun,
                                                        lamanya haid : <input type="text" name="riwayat_menstruasi_3"
                                                            id="riwayat-menstruasi-3"
                                                            class="custom-form clear-input d-inline-block col-lg-1 mx-1"
                                                            placeholder="Sebutkan">hari,
                                                        Banyaknya : <input type="text" name="riwayat_menstruasi_4"
                                                            id="riwayat-menstruasi-4"
                                                            class="custom-form clear-input d-inline-block col-lg-1 mx-1"
                                                            placeholder="Sebutkan"> pembalut/hari
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">
                                                        <input type="checkbox" name="riwayat_menstruasi_5"
                                                            id="riwayat-menstruasi-5" value="1" class="mr-1">
                                                        Dismenorroe
                                                        <input type="checkbox" name="riwayat_menstruasi_6"
                                                            id="riwayat-menstruasi-6" value="1" class="mr-1 ml-5">
                                                        Spoting
                                                        <input type="checkbox" name="riwayat_menstruasi_7"
                                                            id="riwayat-menstruasi-7" value="1" class="mr-1 ml-5">
                                                        Menorrhagia
                                                        <input type="checkbox" name="riwayat_menstruasi_8"
                                                            id="riwayat-menstruasi-8" value="1" class="mr-1 ml-5">
                                                        Metrorhagia
                                                        <input type="checkbox" name="riwayat_menstruasi_9"
                                                            id="riwayat-menstruasi-9" value="1" class="mr-1 ml-5"> Pre
                                                        Menstruasi Syndrome
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th rowspan="2">Riwayat Perkawinan :</th>
                                                    <td colspan="9">
                                                        Menikah :<input type="text" name="riwayat_perkawinan_1"
                                                            id="riwayat-perkawinan-1"
                                                            class="custom-form clear-input d-inline-block col-lg-1 ml-1"
                                                            placeholder="Sebutkan"> kali,

                                                        <input type="checkbox" name="riwayat_perkawinan_2"
                                                            id="riwayat-perkawinan-2" value="1" class="mr-1 ml-4">Usia
                                                        Pernikahan l :

                                                        <input type="text" name="riwayat_perkawinan_3"
                                                            id="riwayat-perkawinan-3"
                                                            class="custom-form clear-input d-inline-block col-lg-1 ml-1"
                                                            placeholder="Sebutkan"> tahun,

                                                        <input type="checkbox" name="riwayat_perkawinan_4"
                                                            id="riwayat-perkawinan-4" value="1" class="mr-1 ml-4"> Masih
                                                        menikah

                                                        <input type="checkbox" name="riwayat_perkawinan_5"
                                                            id="riwayat-perkawinan-5" value="1" class="mr-1 ml-4"> Cerai

                                                        <input type="checkbox" name="riwayat_perkawinan_6"
                                                            id="riwayat-perkawinan-6" value="1" class="mr-1 ml-4">
                                                        Meninggal
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">
                                                        <input type="checkbox" name="riwayat_perkawinan_7"
                                                            id="riwayat-perkawinan-7" value="1" class="mr-1"
                                                            style="margin-left: 187px;">Usia
                                                        Pernikahan ll
                                                        :
                                                        <input type="text" name="riwayat_perkawinan_8"
                                                            id="riwayat-perkawinan-8"
                                                            class="custom-form clear-input d-inline-block col-lg-1 ml-1"
                                                            placeholder="Sebutkan"> tahun,

                                                        <input type="checkbox" name="riwayat_perkawinan_9"
                                                            id="riwayat-perkawinan-9" value="1" class="mr-1 ml-4">
                                                        Masih
                                                        menikah

                                                        <input type="checkbox" name="riwayat_perkawinan_10"
                                                            id="riwayat-perkawinan-10" value="1" class="mr-1 ml-4">
                                                        Cerai

                                                        <input type="checkbox" name="riwayat_perkawinan_11"
                                                            id="riwayat-perkawinan-11" value="1" class="mr-1 ml-4">
                                                        Meninggal
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th rowspan="3">Riwayat Penyakit Operasi:</th>
                                                    <td colspan="9">
                                                        <input type="checkbox" name="riwayat_penyakit_oprasi_1"
                                                            id="riwayat-penyakit-oprasi-1" value="1" class="mr-1"> Asma

                                                        <input type="checkbox" name="riwayat_penyakit_oprasi_2"
                                                            id="riwayat-penyakit-oprasi-2" value="1" class="mr-1 ml-4">
                                                        Hipertensi

                                                        <input type="checkbox" name="riwayat_penyakit_oprasi_3"
                                                            id="riwayat-penyakit-oprasi-3" value="1" class="mr-1 ml-4">
                                                        Jantung

                                                        <input type="checkbox" name="riwayat_penyakit_oprasi_4"
                                                            id="riwayat-penyakit-oprasi-4" value="1" class="mr-1 ml-4">
                                                        Diabetes

                                                        <input type="checkbox" name="riwayat_penyakit_oprasi_5"
                                                            id="riwayat-penyakit-oprasi-5" value="1" class="mr-1 ml-4">
                                                        Hepatitis

                                                        <input type="checkbox" name="riwayat_penyakit_oprasi_6"
                                                            id="riwayat-penyakit-oprasi-6" value="1" class="mr-1 ml-4">
                                                        Ginjal

                                                        <input type="checkbox" name="riwayat_penyakit_oprasi_7"
                                                            id="riwayat-penyakit-oprasi-7" value="1" class="mr-1 ml-4">
                                                        TBC

                                                        <input type="checkbox" name="riwayat_penyakit_oprasi_8"
                                                            id="riwayat-penyakit-oprasi-8" value="1" class="mr-1 ml-4">
                                                        Stroke

                                                        <input type="checkbox" name="riwayat_penyakit_oprasi_9"
                                                            id="riwayat-penyakit-oprasi-9" value="1" class="mr-1 ml-4">
                                                        <input type="text" name="riwayat_penyakit_oprasi_10"
                                                            id="riwayat-penyakit-oprasi-10"
                                                            class="custom-form clear-input d-inline-block col-lg-2 "
                                                            placeholder="Sebutkan" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">
                                                        Pernah dirawat : <input type="radio"
                                                            name="riwayat_penyakit_oprasi_11"
                                                            id="riwayat-penyakit-oprasi-11" class=" mx-1" value="0">
                                                        Tidak
                                                        <input type="radio" name="riwayat_penyakit_oprasi_11"
                                                            id="riwayat-penyakit-oprasi-12" class="mr-1" value="1"> Ya,

                                                        Kapan :<input type="text" name="riwayat_penyakit_oprasi_13"
                                                            id="riwayat-penyakit-oprasi-13"
                                                            class="custom-form clear-input d-inline-block col-lg-2 mx-1"
                                                            placeholder="Sebutkan" disabled>
                                                        Dimana <input type="text" name="riwayat_penyakit_oprasi_14"
                                                            id="riwayat-penyakit-oprasi-14"
                                                            class="custom-form clear-input d-inline-block col-lg-2 mx-1"
                                                            placeholder="Sebutkan" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">
                                                        Pernah operasi : <input type="radio"
                                                            name="riwayat_penyakit_oprasi"
                                                            id="riwayat-penyakit-oprasi-15" class=" mx-1" value="0">
                                                        Tidak
                                                        <input type="radio" name="riwayat_penyakit_oprasi"
                                                            id="riwayat-penyakit-oprasi-16" class="mr-1" value="1"> Ya,
                                                        Kapan :<input type="text" name="riwayat_penyakit_oprasi_17"
                                                            id="riwayat-penyakit-oprasi-17"
                                                            class="custom-form clear-input d-inline-block col-lg-2 mx-1"
                                                            placeholder="Sebutkan" disabled>
                                                        Dimana <input type="text" name="riwayat_penyakit_oprasi_18"
                                                            id="riwayat-penyakit-oprasi-18"
                                                            class="custom-form clear-input d-inline-block col-lg-2 mx-1"
                                                            placeholder="Sebutkan" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th> Obat yang masih di konsumsi : </th>
                                                    <td colspan="9">
                                                        <input type="text" name="rk_obat_dikosumsi"
                                                        id="rk-obat-dikosumsi"
                                                        class="custom-form clear-input d-inline-block col-lg-9 mx-1"placeholder="Sebutkan">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Membawa obat dari luar:</th>
                                                    <td colspan="9">
                                                        <input type="radio" name="membawa_obat_1" id="membawa-obat-1"
                                                            class=" mr-1" value="0"> Tidak
                                                        <input type="radio" name="membawa_obat_1" id="membawa-obat-2"
                                                            class=" mx-1 mr-1" value="1"> Ya (jika ya, lapor farmasi
                                                        untuk rekonsiliasi obat)
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Terapi Komplementari :</th>
                                                    <td colspan="9">
                                                        <input type="checkbox" name="terapi_komplementari_1"
                                                            id="terapi-komplementari-1" value="1" class=" mr-1">Jamu
                                                        <input type="text" name="terapi_komplementari_2"
                                                            id="terapi-komplementari-2"
                                                            class="custom-form clear-input d-inline-block col-lg-2 mx-1"
                                                            placeholder="Sebutkan">
                                                        <input type="checkbox" name="terapi_komplementari_3"
                                                            id="terapi-komplementari-3" value="1" class="mx-1">
                                                        Akupuncture
                                                        <input type="checkbox" name="terapi_komplementari_4"
                                                            id="terapi-komplementari-4" value="1" class="mx-1"> Pijat
                                                        <input type="checkbox" name="terapi_komplementari_5"
                                                            id="terapi-komplementari-5" value="1" class="mx-1"> Lain
                                                        -lain :
                                                        <input type="text" name="terapi_komplementari_6"
                                                            id="terapi-komplementari-6"
                                                            class="custom-form clear-input d-inline-block col-lg-2 mx-1 "
                                                            placeholder="Sebutkan" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th rowspan="2">Riwayat penyakit keluarga :</th>
                                                    <td colspan="9">
                                                        <input type="checkbox" name="riwayat_penyakit_kluwarga_1"
                                                            id="riwayat-penyakit-kluwarga-1" value="1" class="mr-1">
                                                        Asma
                                                        <input type=checkbox name="riwayat_penyakit_kluwarga_2"
                                                            id="riwayat-penyakit-kluwarga-2" value="1"
                                                            class="mr-1 ml-4"> Hipertensi
                                                        <input type="checkbox" name="riwayat_penyakit_kluwarga_3"
                                                            id="riwayat-penyakit-kluwarga-3" value="1"
                                                            class="mr-1 ml-4"> Jantung
                                                        <input type="checkbox" name="riwayat_penyakit_kluwarga_4"
                                                            id="riwayat-penyakit-kluwarga-4" value="1"
                                                            class="mr-1 ml-4"> Diabetes
                                                        <input type="checkbox" name="riwayat_penyakit_kluwarga_5"
                                                            id="riwayat-penyakit-kluwarga-5" value="1"
                                                            class="mr-1 ml-4"> Hepatitis
                                                        <input type="checkbox" name="riwayat_penyakit_kluwarga_6"
                                                            id="riwayat-penyakit-kluwarga-6" value="1"
                                                            class="mr-1 ml-4"> Ginjal
                                                        <input type="checkbox" name="riwayat_penyakit_kluwarga_7"
                                                            id="riwayat-penyakit-kluwarga-7" value="1"
                                                            class="mr-1 ml-4"> TBC
                                                        <input type="checkbox" name="riwayat_penyakit_kluwarga_8"
                                                            id="riwayat-penyakit-kluwarga-8" value="1"
                                                            class="mr-1 ml-4"> Stroke
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">
                                                        <input type="checkbox" name="riwayat_penyakit_kluwarga_9"
                                                            id="riwayat-penyakit-kluwarga-9" value="1" class="mr-1 ">
                                                        Epilepsi
                                                        <input type="checkbox" name="riwayat_penyakit_kluwarga_10"
                                                            id="riwayat-penyakit-kluwarga-10" value="1"
                                                            class="mr-1 ml-4"> Hamil kembar
                                                        <input type="checkbox" name="riwayat_penyakit_kluwarga_11"
                                                            id="riwayat-penyakit-kluwarga-11" value="1"
                                                            class="mr-1 ml-4"> Penyakit jiwa
                                                        <input type="checkbox" name="riwayat_penyakit_kluwarga_12"
                                                            id="riwayat-penyakit-kluwarga-12" value="1"
                                                            class="mr-1 ml-4"> Alergi
                                                        <input type="checkbox" name="riwayat_penyakit_kluwarga_13"
                                                            id="riwayat-penyakit-kluwarga-13" value="1"
                                                            class="mr-1 ml-4"> Kanker
                                                        <input type="checkbox" name="riwayat_penyakit_kluwarga_14"
                                                            id="riwayat-penyakit-kluwarga-14" value="1"
                                                            class="mr-1 ml-4"> Lain-lain
                                                        <input type="text" name="riwayat_penyakit_kluwarga_15"
                                                            id="riwayat-penyakit-kluwarga-15"
                                                            class="custom-form clear-input d-inline-block col-lg-2 "
                                                            placeholder="Sebutkan" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th rowspan="2">Riwayat keluarga berencana :</th>
                                                    <td colspan="9">
                                                        <input type="checkbox" name="riwayat_kel_berencana_1"
                                                            id="riwayat-kel-berencana-1" value="1" class="mr-1"> Suntik
                                                        <input type="checkbox" name="riwayat_kel_berencana_2"
                                                            id="riwayat-kel-berencana-2" value="1" class="mr-1 ml-4">
                                                        Pil
                                                        <input type="checkbox" name="riwayat_kel_berencana_3"
                                                            id="riwayat-kel-berencana-3" value="1" class="mr-1 ml-4">
                                                        AKDR
                                                        <input type="checkbox" name="riwayat_kel_berencana_4"
                                                            id="riwayat-kel-berencana-4" value="1" class="mr-1 ml-4">
                                                        MOW
                                                        <input type="checkbox" name="riwayat_kel_berencana_5"
                                                            id="riwayat-kel-berencana-5" value="1" class="mr-1 ml-4">
                                                        Lain - lain
                                                        <input type="text" name="riwayat_kel_berencana_6"
                                                            id="riwayat-kel-berencana-6"
                                                            class="custom-form clear-input d-inline-block col-lg-2 ml-2 "
                                                            placeholder="Sebutkan" disabled>
                                                        Lamanya<input type="text" name="riwayat_kel_berencana_7"
                                                            id="riwayat-kel-berencana-7"
                                                            class="custom-form clear-input d-inline-block col-lg-2 ml-2"
                                                            placeholder="Silahkan isi">Tahun
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">
                                                        Komplikasi KB :<input type="checkbox"
                                                            name="riwayat_kel_berencana_8" id="riwayat-kel-berencana-8"
                                                            value="1" class="mr-1 ml-2">
                                                        Perdarahan
                                                        <input type="checkbox" name="riwayat_kel_berencana_9"
                                                            id="riwayat-kel-berencana-9" value="1" class="mr-1 ml-4">
                                                        PID/Radang Panggul
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th rowspan="2">Riwayat Ginekologi :</th>
                                                    <td colspan="9">
                                                        <input type="checkbox" name="riwayat_ginekologi_1"
                                                            id="riwayat-ginekologi-1" value="1" class="mr-1">
                                                        Infertilitas
                                                        <input type="checkbox" name="riwayat_ginekologi_2"
                                                            id="riwayat-ginekologi-2" value="1" class="mr-1 ml-4">
                                                        Infeksi
                                                        Virus
                                                        <input type="checkbox" name="riwayat_ginekologi_3"
                                                            id="riwayat-ginekologi-3" value="1" class="mr-1 ml-4"> PMS
                                                        <input type="checkbox" name="riwayat_ginekologi_4"
                                                            id="riwayat-ginekologi-4" value="1" class="mr-1 ml-4">
                                                        Cervicitis Kronis
                                                        <input type="checkbox" name="riwayat_ginekologi_5"
                                                            id="riwayat-ginekologi-5" value="1" class="mr-1 ml-4">
                                                        Endometriotis
                                                        <input type="checkbox" name="riwayat_ginekologi_6"
                                                            id="riwayat-ginekologi-6" value="1" class="mr-1 ml-4"> Mioma
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">
                                                        <input type="checkbox" name="riwayat_ginekologi_7"
                                                            id="riwayat-ginekologi-7" value="1" class="mr-1"> Polip
                                                        Cervix
                                                        <input type="checkbox" name="riwayat_ginekologi_8"
                                                            id="riwayat-ginekologi-8" value="1" class="mr-1 ml-4">
                                                        Kanker kandungan
                                                        <input type="checkbox" name="riwayat_ginekologi_9"
                                                            id="riwayat-ginekologi-9" value="1" class="mr-1 ml-4">
                                                        Perkosaan
                                                        <input type="checkbox" name="riwayat_ginekologi_10"
                                                            id="riwayat-ginekologi-10" value="1" class="mr-1 ml-4">
                                                        Operasi Kandungan
                                                        <input type="checkbox" name="riwayat_ginekologi_11"
                                                            id="riwayat-ginekologi-11" value="1" class=" mx-1 ml-4">
                                                        lain-lain
                                                        <input type="text" name="riwayat_ginekologi_12"
                                                            id="riwayat-ginekologi-12"
                                                            class="custom-form clear-input d-inline-block col-lg-2 ml-1 "
                                                            placeholder="Sebutkan" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th rowspan="4">Riwayat Alergi :</th>
                                                    <td colspan="9">
                                                        <input type="radio" name="riwayat_alergi_1"
                                                            id="riwayat-alergi-1" class="mr-1" value="1"> Tidak
                                                        <input type="radio" name="riwayat_alergi_1"
                                                            id="riwayat-alergi-2" class="mr-1 ml-4" value="0">
                                                        Tidak
                                                        Tahu
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">
                                                        <input type="checkbox" name="riwayat_alergi_3"
                                                            id="riwayat-alergi-3" value="1" class="mr-1"> Ya, Alergi
                                                        Obat
                                                        <input type="text" name="riwayat_alergi_4" id="riwayat-alergi-4"
                                                            class="custom-form clear-input d-inline-block col-lg-2 mx-1"
                                                            placeholder="Sebutkan" disabled>
                                                        Reaksi <input type="text" name="riwayat_alergi_5"
                                                            id="riwayat-alergi-5"
                                                            class="custom-form clear-input d-inline-block col-lg-2 mx-1"
                                                            placeholder="Sebutkan" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">
                                                        Alergi Makan <input type="text" name="riwayat_alergi_6"
                                                            id="riwayat-alergi-6"
                                                            class="custom-form clear-input d-inline-block col-lg-2 mx-1"
                                                            placeholder="Sebutkan" disabled>
                                                        Reaksi <input type="text" name="riwayat_alergi_7"
                                                            id="riwayat-alergi-7"
                                                            class="custom-form clear-input d-inline-block col-lg-2 mx-"
                                                            placeholder="Sebutkan" disabled>
                                                        Lain - lain, <input type="text" name="riwayat_alergi_8"
                                                            id="riwayat-alergi-8"
                                                            class="custom-form clear-input d-inline-block col-lg-2 mx-1 "
                                                            placeholder="Sebutkan" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>(Bila ada alergi segera pasang gelang merah dan tulis nama obat
                                                        / makan)</th>
                                                </tr>
                                                <tr>
                                                    <th rowspan="2">Riwayat tranfusi darah :</th>
                                                    <td colspan="9">
                                                        <input type="checkbox" name="riwayat_tranfusi_darah_1"
                                                            id="riwayat-tranfusi-darah-1" value="1" class="mr-1"> Tidak
                                                        pernah
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">
                                                        <input type="checkbox" name="riwayat_tranfusi_darah_2"
                                                            id="riwayat-tranfusi-darah-2" value="1" class="mr-1"> Pernah,
                                                        reaksi alergi:
                                                        <input type="radio" name="riwayat_tranfusi_darah_3"
                                                            id="riwayat-tranfusi-darah-3" class="mr-1 ml-4" value="0">
                                                        Tidak
                                                        <input type="radio" name="riwayat_tranfusi_darah_3"
                                                            id="riwayat-tranfusi-darah-4" class="mr-1 ml-4" value="1">
                                                        Ya,
                                                        Sebutkan reaksi alergi<input type="text"
                                                            name="riwayat_tranfusi_darah_5"
                                                            id="riwayat-tranfusi-darah-5"
                                                            class="custom-form clear-input d-inline-block col-lg-2 mx-1 "
                                                            placeholder="Sebutkan" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th rowspan="2">Kebiasaan :</th>
                                                    <td colspan="9">
                                                        <input type="checkbox" name="kebiasaan_1" id="kebiasaan-1"
                                                            value="1" class="mr-1"> Merokok,
                                                        <input type="text" name="kebiasaan_2" id="kebiasaan-2"
                                                            class="custom-form clear-input d-inline-block col-lg-2 mx-1"
                                                            placeholder="Sebutkan" disabled>Batang/hari
                                                        <input type="checkbox" name="kebiasaan_3" id="kebiasaan-3"
                                                            value="1" class="mr-1 ml-4"> Obat
                                                        tidur/Narkoba
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">
                                                        <input type="checkbox" name="kebiasaan_4" id="kebiasaan-4"
                                                            value="1" class="mr-1"> Alkohol,
                                                        <input type="text" name="kebiasaan_5" id="kebiasaan-5"
                                                            class="custom-form clear-input d-inline-block col-lg-2 mx-1"
                                                            placeholder="Sebutkan" disabled>Gelas/hari
                                                        <input type="checkbox" name="kebiasaan_6" id="kebiasaan-6"
                                                            value="1" class="mr-1 ml-4"> Olah Raga
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th rowspan="4">Status Psikologis :</th>
                                                    <td colspan="9">
                                                        <input type="checkbox" name="status_psikologis_1"
                                                            id="status-psikologis-1" value="1" class="mr-1"> Denial
                                                        (Menolak/tidak percaya)
                                                        <input type="checkbox" name="status_psikologis_2"
                                                            id="status-psikologis-2" value="1" class="mr-1 ml-4"> Anger
                                                        (Marah)
                                                        <input type="checkbox" name="status_psikologis_3"
                                                            id="status-psikologis-3" value="1" class="mr-1 ml-4">
                                                        Bergaining (Tawar Menawar)
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">
                                                        <input type="checkbox" name="status_psikologis_4"
                                                            id="status-psikologis-4" value="1" class="mr-1"> Depresi
                                                        <input type="checkbox" name="status_psikologis_5"
                                                            id="status-psikologis-5" value="1" class="mr-1 ml-4">
                                                        Menerima
                                                        (Acception)
                                                        <input type="checkbox" name="status_psikologis_6"
                                                            id="status-psikologis-6" value="1" class="mr-1 ml-4">
                                                        Tidak semangat
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">
                                                        <input type="checkbox" name="status_psikologis_7"
                                                            id="status-psikologis-7" value="1" class="mr-1"> Sulit tidur
                                                        <input type="checkbox" name="status_psikologis_8"
                                                            id="status-psikologis-8" value="1" class="mr-1 ml-4"> Sulit
                                                        Berbicara
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">
                                                        <input type="checkbox" name="status_psikologis_9"
                                                            id="status-psikologis-9" value="1" class="mr-1"> Merasa
                                                        bersalah &nbsp; &nbsp;
                                                        &nbsp; &nbsp;

                                                        Pendamping persalinan yang diinginkan (bila pasien hamil)
                                                        :<input type="text" name="status_psikologis_10"
                                                            id="status-psikologis-10"
                                                            class="custom-form clear-input d-inline-block col-lg-2 mr-2 ml-1  "
                                                            placeholder="Sebutkan">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th rowspan="2">Status Mental :</th>
                                                    <td colspan="9">
                                                        <input type="checkbox" name="status_mental_1"
                                                            id="status-mental-1" value="1" class="mr-1"> Sadar dan
                                                        orientasi baik
                                                        <input type="checkbox" name="status_mental_2"
                                                            id="status-mental-2" value="1" class="mr-1 ml-4"> Ada
                                                        masalah perilaku,
                                                        sebutkan <input type="text" name="status_mental_3"
                                                            id="status-mental-3"
                                                            class="custom-form clear-input d-inline-block col-lg-2 mr-2 ml-1 "
                                                            placeholder="Sebutkan" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">
                                                        <input type="checkbox" name="status_mental_4"
                                                            id="status-mental-4" value="1" class="mr-1"> Perilaku
                                                        kekerasan yang dialami
                                                        pasien
                                                        sebelumnya, <input type="text" name="status_mental_5"
                                                            id="status-mental-5"
                                                            class="custom-form clear-input d-inline-block col-lg-2 mr-2 ml-1 "
                                                            placeholder="Sebutkan" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th rowspan="3">Kebutuhan biologis :</th>
                                                    <td colspan="9">
                                                        Pola makan : <input type="text" name="kebutuhan_biologis_1"
                                                            id="kebutuhan-biologis-1"
                                                            class="custom-form clear-input d-inline-block col-lg-1 mr-1"
                                                            placeholder="Sebutkan"> x/hari
                                                        terakhir jam <input type="text" name="kebutuhan_biologis_2"
                                                            id="kebutuhan-biologis-2"
                                                            class="custom-form clear-input d-inline-block col-lg-1 mr-2 ml-1"
                                                            placeholder="Masukan jam">
                                                        Pola eliminasi : BAK <input type="text"
                                                            name="kebutuhan_biologis_3" id="kebutuhan-biologis-3"
                                                            class="custom-form clear-input d-inline-block col-lg-1 mr-2 ml-1"
                                                            placeholder="Sebutkan"> x/hari
                                                        terakhir jam <input type="text" name="kebutuhan_biologis_4"
                                                            id="kebutuhan-biologis-4"
                                                            class="custom-form clear-input d-inline-block col-lg-1 mr-2 ml-1"
                                                            placeholder="Masukan jam">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">
                                                        Pola minum : <input type="text" name="kebutuhan_biologis_5"
                                                            id="kebutuhan-biologis-5"
                                                            class="custom-form clear-input d-inline-block col-lg-1 ml-1"
                                                            placeholder="Sebutkan"> x/hari
                                                        terakhir jam <input type="text" name="kebutuhan_biologis_6"
                                                            id="kebutuhan-biologis-6"
                                                            class="custom-form clear-input d-inline-block col-lg-1 mr-2 ml-1"
                                                            placeholder="Masukan jam">
                                                        BAB <input type="text" name="kebutuhan_biologis_7"
                                                            id="kebutuhan-biologis-7"
                                                            class="custom-form clear-input d-inline-block col-lg-1 mr-2 ml-1"
                                                            placeholder="Sebutkan"> x/hari
                                                        terakhir jam <input type="text" name="kebutuhan_biologis_8"
                                                            id="kebutuhan-biologis-8"
                                                            class="custom-form clear-input d-inline-block col-lg-1 mr-2 ml-1"
                                                            placeholder="Masukan jam">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">
                                                        Hubungan seksual terakhir : <input type="text"
                                                            name="kebutuhan_biologis_9" id="kebutuhan-biologis-9"
                                                            class="custom-form clear-input d-inline-block col-lg-1 mr-2 ml-1 "
                                                            placeholder="Sebutkan">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th rowspan="4">Kebutuhan sosial :</th>
                                                    <td colspan="9">
                                                        Status pernikahan : <input type="checkbox"
                                                            name="kebutuhan_sosial_1" id="kebutuhan-sosial-1" value="1"
                                                            class="mr-1">
                                                        Menikah
                                                        <input type="checkbox" name="kebutuhan_sosial_2"
                                                            id="kebutuhan-sosial-2" value="1" class="mr-1 ml-4"> Belum
                                                        menikah
                                                        <input type="checkbox" name="kebutuhan_sosial_3"
                                                            id="kebutuhan-sosial-3" value="1" class="mr-1 ml-4"> Janda
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">
                                                        Keluarga : &nbsp;&nbsp;&nbsp;<input type="checkbox"
                                                            name="kebutuhan_sosial_4" id="kebutuhan-sosial-4" value="1"
                                                            class="mr-1">
                                                        Tinggal serumah
                                                        <input type="checkbox" name="kebutuhan_sosial_5"
                                                            id="kebutuhan-sosial-5" value="1" class="mr-1 ml-4">
                                                        Tinggal sendiri
                                                        <input type="checkbox" name="kebutuhan_sosial_6"
                                                            id="kebutuhan-sosial-6" value="1" class="mr-1 ml-4"> lain -
                                                        lain
                                                        <input type="text" name="kebutuhan_sosial_7"
                                                            id="kebutuhan-sosial-7"
                                                            class="custom-form clear-input d-inline-block col-lg-1 mr-2 ml-1 "
                                                            placeholder="Sebutkan" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">
                                                        Hubungan pasien dan anggota keluarga : &nbsp;&nbsp;&nbsp;<input
                                                            type="radio" name="kebutuhan_sosial_8"
                                                            id="kebutuhan-sosial-8" class="mr-1" value="1">
                                                        Baik
                                                        <input type="radio" name="kebutuhan_sosial_8"
                                                            id="kebutuhan-sosial-9" class="mr-1 ml-4" value="0">
                                                        Tidak
                                                        baik
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">
                                                        Sosial suport : &nbsp;&nbsp;&nbsp;<input type="checkbox"
                                                            name="kebutuhan_sosial_10" id="kebutuhan-sosial-10"
                                                            value="1" class="mr-1">
                                                        Suami
                                                        <input type="checkbox" name="kebutuhan_sosial_11"
                                                            id="kebutuhan-sosial-11" value="1" class="mr-1 ml-4"> Orang
                                                        tua
                                                        <input type="checkbox" name="kebutuhan_sosial_12"
                                                            id="kebutuhan-sosial-12" value="1" class="mr-1 ml-4"> Mertua
                                                        <input type="checkbox" name="kebutuhan_sosial_13"
                                                            id="kebutuhan-sosial-13" value="1" class="mr-1 ml-4">
                                                        keluarga
                                                        Lain
                                                        <input type="text" name="kebutuhan_sosial_14"
                                                            id="kebutuhan-sosial-14"
                                                            class="custom-form clear-input d-inline-block col-lg-1 mr-2 ml-1"
                                                            placeholder="Sebutkan" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th rowspan="2"> Status Ekonomi :</th>
                                                    <td colspan="9">
                                                        Pekerjaan : &nbsp;&nbsp;&nbsp;<input type="checkbox"
                                                            name="status_ekonomi_1" id="status-ekonomi-1" value="1"
                                                            class="mr-1">
                                                        Wiraswasta
                                                        <input type="checkbox" name="status_ekonomi_2"
                                                            id="status-ekonomi-2" value="1" class="mr-1 ml-4"> Pegawai
                                                        Swasta
                                                        <input type="checkbox" name="status_ekonomi_3"
                                                            id="status-ekonomi-3" value="1" class="mr-1 ml-4"> PNS
                                                        <input type="checkbox" name="status_ekonomi_4"
                                                            id="status-ekonomi-4" value="1" class="mr-1 ml-4"> Tidak
                                                        bekerja
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">
                                                        Cara pembayaran : &nbsp;&nbsp;&nbsp;<input type="checkbox"
                                                            name="status_ekonomi_5" id="status-ekonomi-5" value="1"
                                                            class="mr-1">
                                                        Biaya sendiri
                                                        <input type="checkbox" name="status_ekonomi_6"
                                                            id="status-ekonomi-6" value="1" class="mr-1 ml-4"> BPJS
                                                        <input type="checkbox" name="status_ekonomi_7"
                                                            id="status-ekonomi-7" value="1" class="mr-1 ml-4"> Asuransi
                                                        <input type="checkbox" name="status_ekonomi_8"
                                                            id="status-ekonomi-8" value="1" class="mr-1 ml-4"> lain -
                                                        lain
                                                        <input type="text" name="status_ekonomi_9" id="status-ekonomi-9"
                                                            class="custom-form clear-input d-inline-block col-lg-1 mr-2 ml-1 "
                                                            placeholder="Sebutkan" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th rowspan="3">Status nilai-nilai kepercayaan</th>
                                                    <td colspan="9">
                                                        Keyakinan : &nbsp;&nbsp;&nbsp;<input type="radio"
                                                            name="status_nn_kepercayaan_1" id="status-nn-kepercayaan-1"
                                                            class="mr-1" value="0">
                                                        Tidak ada
                                                        <input type="radio" name="status_nn_kepercayaan_1"
                                                            id="status-nn-kepercayaan-2" class="mr-1 ml-4" value="1">
                                                        Ada,
                                                        Sebutkan <input type="text" name="status_nn_kepercayaan_3"
                                                            id="status-nn-kepercayaan-3"
                                                            class="custom-form clear-input d-inline-block col-lg-1 mr-2 ml-1"
                                                            placeholder="Sebutkan" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">
                                                        Nilai-nilai kepercayaan : &nbsp;&nbsp;&nbsp;<input type="radio"
                                                            name="status_nn_kepercayaan_4" id="status-nn-kepercayaan-4"
                                                            class="mr-1" value="0"> Tidak
                                                        ada
                                                        <input type="radio" name="status_nn_kepercayaan_4"
                                                            id="status-nn-kepercayaan-5" class="mr-1 ml-4" value="1">
                                                        Ada,
                                                        Sebutkan <input type="text" name="status_nn_kepercayaan_6"
                                                            id="status-nn-kepercayaan-6"
                                                            class="custom-form clear-input d-inline-block col-lg-1 mr-2 ml-1"
                                                            placeholder="Sebutkan" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">
                                                        Kegiatan Keagamaan yang bisa dilakukan :
                                                        &nbsp;&nbsp;&nbsp;<input type="text"
                                                            name="status_nn_kepercayaan_7" id="status-nn-kepercayaan-7"
                                                            class="custom-form clear-input d-inline-block col-lg-1 ml-1 "
                                                            placeholder="Sebutkan">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th rowspan="3"> Spiritual :</th>
                                                    <td colspan="9">
                                                        Kemampuan beribadah : <br> <br>
                                                        Wajib ibadah : &nbsp;&nbsp;&nbsp;<input type="checkbox"
                                                            name="spiritual_1" id="spiritual-1" value="1" class="mr-1">
                                                        Baligh
                                                        <input type="checkbox" name="spiritual_2" id="spiritual-2"
                                                            value="1" class="mr-1 ml-4"> Belum
                                                        Baligh
                                                        <input type="checkbox" name="spiritual_3" id="spiritual-3"
                                                            value="1" class="mr-1 ml-4">
                                                        Halangan Lain
                                                        <input type="text" name="spiritual_4" id="spiritual-4"
                                                            class="custom-form clear-input d-inline-block col-lg-1 mr-2 ml-1 "
                                                            placeholder="Sebutkan" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">
                                                        Thaharoh : &nbsp;&nbsp;&nbsp;<input type="checkbox"
                                                            name="spiritual_5" id="spiritual-5" value="1" class="mr-1">
                                                        Berwudhu
                                                        <input type="checkbox" name="spiritual_6" id="spiritual-6"
                                                            value="1" class="mr-1 ml-4"> Tayamum
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">
                                                        Sholat : &nbsp;&nbsp;&nbsp;<input type="checkbox"
                                                            name="spiritual_7" id="spiritual-7" value="1" class="mr-1">
                                                        Berdiri
                                                        <input type="checkbox" name="spiritual_8" id="spiritual-8"
                                                            value="1" class="mr-1 ml-4"> Duduk
                                                        <input type="checkbox" name="spiritual_9" id="spiritual-9"
                                                            value="1" class="mr-1 ml-4">
                                                        Berbaring
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th rowspan="7"> Budaya :</th>
                                                    <td colspan="9">
                                                        Nilai budaya yang terkait dengan penyebab penyakit/masalah
                                                        kesehatan adalah : <br> <br>
                                                        <input type="checkbox" name="budaya_1" id="budaya-1" value="1"
                                                            class="mr-1"> Hukuman
                                                        <input type="checkbox" name="budaya_2" id="budaya-2" value="1"
                                                            class="mr-1 ml-4"> Ujian
                                                        <input type="checkbox" name="budaya_3" id="budaya-3" value="1"
                                                            class="mr-1 ml-4"> Kesalahan
                                                        <input type="checkbox" name="budaya_4" id="budaya-4" value="1"
                                                            class="mr-1 ml-4"> Takdir
                                                        <input type="checkbox" name="budaya_5" id="budaya-5" value="1"
                                                            class="mr-1 ml-4"> Buatan orang lain
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">
                                                        Kebiasaan pasien saat sakit(Pola aktivitas dan istirahat)
                                                        :<input type="text" name="budaya_6" id="budaya-6"
                                                            class="custom-form clear-input d-inline-block col-lg-1 ml-1"
                                                            placeholder="Sebutkan">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">
                                                        Pola Komunikasi : <input type="checkbox" name="budaya_7"
                                                            id="budaya-7" value="1" class="mr-1 ml-4"> Normal
                                                        <input type="checkbox" name="budaya_8" id="budaya-8" value="1"
                                                            class="mr-1 ml-4"> Introvert
                                                        <input type="checkbox" name="budaya_9" id="budaya-9" value="1"
                                                            class="mr-1 ml-4"> Extrovert
                                                        <input type="checkbox" name="budaya_10" id="budaya-10" value="1"
                                                            class="mr-1 ml-4"> Lain-lain
                                                        <input type="text" name="budaya_11" id="budaya-11"
                                                            class="custom-form clear-input d-inline-block col-lg-1 mr-2 ml-1 "
                                                            placeholder="Sebutkan" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">
                                                        Pola Makan : &nbsp;&nbsp;&nbsp;<input type="radio"
                                                            name="budaya_12" id="budaya-12" class="mr-1" value="1">
                                                        Sehat
                                                        <input type="radio" name="budaya_12" id="budaya-13"
                                                            class="mr-1 ml-4" value="0"> Tidak
                                                        sehat,
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">
                                                        Makanan Pokok : &nbsp;&nbsp;&nbsp;<input type="radio"
                                                            name="budaya_14" id="budaya-14" value="1" class="mr-1"
                                                            value="1">
                                                        Nasi
                                                        <input type="radio" name="budaya_14" id="budaya-15"
                                                            class="mr-1 ml-4" value="1"> Selain nasi
                                                        <input type="text" name="budaya_16" id="budaya-16"
                                                            class="custom-form clear-input d-inline-block col-lg-1 mr-2 ml-1"
                                                            placeholder="Sebutkan" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">
                                                        Pantang Makanan : &nbsp;&nbsp;&nbsp;<input type="radio"
                                                            name="budaya_17" id="budaya-17" class="mr-1" value="1">Tidak
                                                        <input type="radio" name="budaya_17" id="budaya-18"
                                                            class="mr-1 ml-4" value="1"> Ya,
                                                        <input type="text" name="budaya_19" id="budaya-19"
                                                            class="custom-form clear-input d-inline-block col-lg-1 mr-2 ml-1 "
                                                            placeholder="Sebutkan" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9">
                                                        Konsumsi makanan dari luar : &nbsp;&nbsp;&nbsp;<input
                                                            type="radio" name="budaya_20" id="budaya-20" class="mr-1"
                                                            value="0">Tidak
                                                        <input type="radio" name="budaya_20" id="budaya-21"
                                                            class="mr-1 ml-4" value="1"> Ya,
                                                        <input type="text" name="budaya_22" id="budaya-22"
                                                            class="custom-form clear-input d-inline-block col-lg-1 mr-2 ml-1 "
                                                            placeholder="Sebutkan" disabled>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </table>
                                        <!-- RIWAYAT KESEHATAN AKHIR -->

                                    <!-- IDENTIFIKASI KEBUTUHAN BELAJAR / EDUKASI AWAL -->                                   
                                    <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse"
                                                    data-target="#data-identifikasi-kebutuhan-belajar-edukasi"><i
                                                        class="fas fa-expand mr-1"></i>Expand</button>IDENTIFIKASI
                                                KEBUTUHAN BELAJAR / EDUKASI
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2"
                                        id="data-identifikasi-kebutuhan-belajar-edukasi">
                                        <table class="table table-no-border table-sm table-striped"
                                            style="margin-top:-15px">
                                            <tr>
                                                <td width="15%" class="bold">Kewarganegaraan</td>
                                                <td wdith="1%" class="bold">:</td>
                                                <td width="39%">
                                                    <input type="radio" name="kewarganegaraan_pasien"id="kewarganegaraan-pasien-wni" value="1" class="mr-1">WNI
                                                    <input type="radio" name="kewarganegaraan_pasien"id="kewarganegaraan-pasien-wna" value="0" class="mr-1 ml-2">WNA
                                                </td>
                                                <td></td>
                                                <td width="30%">Pemahaman tentang penyakit dan perawatan</td>
                                                <td width="1%"></td>
                                                <td width="19%">
                                                    <input type="radio" name="pemahaman_pasien"id="pt-penyakit-perawatan-pasien-tidak" value="0" class="mr-1">Tidak
                                                    <input type="radio" name="pemahaman_pasien"id="pt-penyakit-perawatan-pasien-ya" value="1"class="mr-1 ml-2">Ya
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Suku Bangsa</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <input type="text" name="suku_bangsa_pasien" id="suku-bangsa-pasien"class="custom-form clear-input"placeholder="Masukkan suku bangsa">
                                                </td>
                                                <td></td>
                                                <td>Pemahaman tentang pengobatan</td>
                                                <td></td>
                                                <td>
                                                    <input type="radio" name="pt_pengobatan_pasien"id="pt-pengobatan-pasien-tidak" value="0" class="mr-1">Tidak
                                                    <input type="radio" name="pt_pengobatan_pasien"id="pt-pengobatan-pasien-ya" value="1" class="mr-1 ml-2">Ya
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Bicara</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <input type="radio" name="bicara_pasien" id="bicara-pasien-normal"value="0" class="mr-1">Normal
                                                    <input type="radio" name="bicara_pasien" id="bicara-pasien-gangguan"value="1" class="mr-1 ml-2">Gangguan Bicara, Jelaskan
                                                    <input type="text" name="bicara_pasien_1" id="bicara-input-pasien"class="custom-form clear-input d-inline-block col-lg-5 "placeholder="Jelaskan" disabled>
                                                </td>
                                                <td></td>
                                                <td>Pemahaman tentang nutrisi diet/gizi</td>
                                                <td></td>
                                                <td>
                                                    <input type="radio" name="pt_nutrisi"id="pt-nutrisi-diet-pasien-tidak" value="0" class="mr-1">Tidak
                                                    <input type="radio" name="pt_nutrisi" id="pt-nutrisi-diet-pasien-ya" value="1" class="mr-1 ml-2">Ya
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Perlu Penterjemah</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <input type="radio" name="perlu_penterjemah"id="perlu-penterjemah-pasien-idak" value="0" class="mr-1">Tidak
                                                    <input type="radio" name="perlu_penterjemah"id="perlu-penterjemah-pasien-ya" value="1" class="mr-1 ml-2">Ya, Bahasa
                                                    <input type="text" name="perlu_penterjemah_1"id="perlu-penterjemah-pasien-input"class="custom-form clear-input d-inline-block col-lg-5 "
                                                        placeholder="Masukkan Bahasa" disabled>
                                                </td>
                                                <td></td>
                                                <td>Pemahaman tentang spiritual</td>
                                                <td></td>
                                                <td>
                                                    <input type="radio" name="pt_spiritual"id="pt-spiritual-pasien-tidak" value="0" class="mr-1">Tidak
                                                    <input type="radio" name="pt_spiritual" id="pt-spiritual-pasien-ya"value="1" class="mr-1 ml-2">Ya
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Bahasa Isyarat</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <input type="radio" name="bahasa_isyarat"id="bahasa-isyarat-pasien-tidak" value="0" class="mr-1">Tidak
                                                    <input type="radio" name="bahasa_isyarat"id="bahasa-isyarat-pasien-ya" value="1" class="mr-1 ml-2">Ya
                                                </td>
                                                <td></td>
                                                <td>Pemahaman tentang peralatan medis</td>
                                                <td></td>
                                                <td>
                                                    <input type="radio" name="pt_peralatan"id="pt-peralatan-medis-pasien-tidak" value="0" class="mr-1">Tidak
                                                    <input type="radio" name="pt_peralatan"id="pt-peralatan-medis-pasien-ya" value="1" class="mr-1 ml-2">Ya
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold"></td>
                                                <td class="bold"></td>
                                                <td></td>
                                                <td></td>
                                                <td>Pemahaman tentang rehab medik</td>
                                                <td></td>
                                                <td>
                                                    <input type="radio" name="pt_rehab" id="pt-rehab-medik-pasien-tidak"value="0" class="mr-1">Tidak
                                                    <input type="radio" name="pt_rehab" id="pt-rehab-medik-pasien-ya"value="1" class="mr-1 ml-2">Ya
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold"></td>
                                                <td class="bold"></td>
                                                <td></td>
                                                <td></td>
                                                <td>Pemahaman tentang manajemen nyeri</td>
                                                <td></td>
                                                <td>
                                                    <input type="radio" name="pt_manajemen"id="pt_manajemen-nyeri-pasien-tidak" value="0" class="mr-1">Tidak
                                                    <input type="radio" name="pt_manajemen" id="pt-manajemen-nyeri-pasien-ya" value="1" class="mr-1 ml-2">Ya
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <!-- IDENTIFIKASI KEBUTUHAN BELAJAR / EDUKASI AKHIR -->


                                    <!-- HAMBATAN UNTUK MENERIMA EDUKASI AWAL -->
                                    <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse"
                                                    data-target="#data-hambatan-untuk-menerima-edukasi"><i
                                                        class="fas fa-expand mr-1"></i>Expand</button>HAMBATAN UNTUK
                                                MENERIMA EDUKASI
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-hambatan-untuk-menerima-edukasi">
                                        <table class="table table-sm table-striped" style="margin-top: -15px">
                                            <tr>
                                                <td width="25%"><input type="checkbox" name="hambatan_keb_1"
                                                        id="hambatan-keb-1" class="mr-1" value="1">Tidak ada
                                                </td>
                                                <td width="25%"><input type="checkbox" name="hambatan_keb_2"
                                                        id="hambatan-keb-2" class="mr-1" value="1">Ada
                                                    gangguan penglihatan
                                                </td>
                                                <td width="25%"><input type="checkbox" name="hambatan_keb_3"
                                                        id="hambatan-keb-3" class="mr-1" value="1">Ada
                                                    gangguan pendengaran
                                                </td>
                                                <td width="25%"><input type="checkbox" name="hambatan_keb_4"
                                                        id="hambatan-keb-4" class="mr-1" value="1">Buta huruf
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="25%"><input type="checkbox" name="hambatan_keb_5"
                                                        id="hambatan-keb-5" class="mr-1" value="1">Ada ganguan
                                                    emosi
                                                </td>
                                                <td width="25%"><input type="checkbox" name="hambatan_keb_6"
                                                        id="hambatan-keb-6" class="mr-1" value="1">Ada gangguan
                                                    fisik
                                                </td>
                                                <td width="25%"><input type="checkbox" name="hambatan_keb_7"
                                                        id="hambatan-keb-7" class="mr-1" value="1">Ada
                                                    gangguan kognitif
                                                </td>
                                                <td width="25%"><input type="checkbox"
                                                        name="hambatan_keb_8"
                                                        id="hambatan-keb-8" class="mr-1"
                                                        value="1">Keterbatasan Motifasi
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="30%"><input type="checkbox" name="hambatan_keb_9"
                                                        id="hambatan-keb-9" class="mr-1" value="1">Ada keterbatasan
                                                    dalam hal budaya/Spiritual/Agama
                                                </td>
                                                <td width="30%"><input type="checkbox" name="hambatan_keb_10"
                                                        id="hambatan-keb-10" class="mr-1" value="1">Ada keterbatasan
                                                    dalam berbahasa
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <!-- HAMBATAN UNTUK MENERIMA EDUKASI AKHIR -->

                                    <!-- PEMERIKSAAN KEBIDANAN DAN KANDUNGAN AWAL -->
                                    <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse"
                                                    data-target="#data-pemeriksaan-kebidanan-kandungan"><i
                                                        class="fas fa-expand mr-1"></i>Expand</button>PEMERIKSAAN
                                                KEBIDANAN DAN KANDUNGAN
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-pemeriksaan-kebidanan-kandungan">
                                        <table class="table table-no-border table-sm table-striped"
                                            style="margin-top:-15px">
                                            <tr>
                                                <th rowspan="2">Inspeksi abdomen : </th>
                                                <td colspan="9">
                                                    <input type="checkbox" name="infeksi_abdomen_1"
                                                        id="infeksi-abdomen-1" value="1" class="mr-1"> Membesar dengan
                                                    arah memanjang
                                                    <input type="checkbox" name="infeksi_abdomen_2"
                                                        id="infeksi-abdomen-2" value="1" class="mr-1 ml-5"> Melebar
                                                    <input type="checkbox" name="infeksi_abdomen_3"
                                                        id="infeksi-abdomen-3" value="1" class="mr-1 ml-5"> Pelebaran
                                                    vena
                                                    <input type="checkbox" name="infeksi_abdomen_4"
                                                        id="infeksi-abdomen-4" value="1" class="mr-1 ml-5"> Linea alba
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="9">
                                                    <input type="checkbox" name="infeksi_abdomen_5"
                                                        id="infeksi-abdomen-5" value="1" class="mr-1"> Linea nigra
                                                    <input type="checkbox" name="infeksi_abdomen_6"
                                                        id="infeksi-abdomen-6" value="1" class="mr-1 ml-5"> Striae
                                                    livide
                                                    <input type="checkbox" name="infeksi_abdomen_7"
                                                        id="infeksi-abdomen-7" value="1" class="mr-1 ml-5"> Striae
                                                    albican
                                                    <input type="checkbox" name="infeksi_abdomen_8"
                                                        id="infeksi-abdomen-8" value="1" class="mr-1 ml-5"> Luka bekas
                                                    operasi
                                                    <input type="checkbox" name="infeksi_abdomen_9"
                                                        id="infeksi-abdomen-9" value="1" class=" mx-1 ml-5"> lain-lain
                                                    <input type="text" name="infeksi_abdomen_10" id="infeksi-abdomen-10"
                                                        class="custom-form clear-input d-inline-block col-lg-2 ml-1 "
                                                        placeholder="Sebutkan" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th rowspan="6">Palpasi : </th>
                                                <td colspan="9">
                                                    Leopold I : TFU : <input type="text" name="palpasi_1" id="palpasi-1"
                                                        class="custom-form clear-input d-inline-block col-lg-1 mr-1"
                                                        placeholder="Sebutkan"> cm,&nbsp;&nbsp;&nbsp; Teraba
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    : <input type="checkbox" name="palpasi_2" id="palpasi-2" value="1"
                                                        class="mr-1 ml-5">Kepala

                                                    <input type="checkbox" name="palpasi_3" id="palpasi-3" value="1"
                                                        class="mr-1 ml-5"> Bokong
                                                    <input type="checkbox" name="palpasi_4" id="palpasi-4" value="1"
                                                        class="mr-1 ml-5">Lain - lain
                                                    <input type="text" name="palpasi_5" id="palpasi-5"
                                                        class="custom-form clear-input d-inline-block col-lg-2 ml-1 "
                                                        placeholder="Sebutkan" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="9">
                                                    Leopold II : Teraba : <input type="checkbox" name="palpasi_6"
                                                        id="palpasi-6" value="1" class=" mr-1"> Punggung
                                                    kanan
                                                    <input type="checkbox" name="palpasi_7" id="palpasi-7" value="1"
                                                        class="mr-1 ml-5">Punggung
                                                    kiri
                                                    <input type="checkbox" name="palpasi_8" id="palpasi-8" value="1"
                                                        class="mr-1 ml-5">Lain - lain
                                                    <input type="text" name="palpasi_9" id="palpasi-9"
                                                        class="custom-form clear-input d-inline-block col-lg-2 ml-1 "
                                                        placeholder="Sebutkan" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="9">
                                                    Leopold III : Bagian terbawah janin ; Teraba <input type="checkbox"
                                                        name="palpasi_10" id="palpasi-10" value="1" class=" mr-1">
                                                    Kepala
                                                    :<input type="checkbox" name="palpasi_11" id="palpasi-11" value="1"
                                                        class="mr-1 ml-5">Bokong
                                                    <input type="checkbox" name="palpasi_12" id="palpasi-12" value="1"
                                                        class="mr-1 ml-5">Lain - lain
                                                    <input type="text" name="palpasi_13" id="palpasi-13"
                                                        class="custom-form clear-input d-inline-block col-lg-2 ml-1 "
                                                        placeholder="Sebutkan" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="9">
                                                    Leopold IV : <input type="checkbox" name="palpasi_14"
                                                        id="palpasi-14" value="1" class="mr-1">Konvergen
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="checkbox" name="palpasi_15" id="palpasi-15" value="1"
                                                        class="mr-1 ml-5">Divergen
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="9">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    Bagian terbawah janin masuk panggul
                                                    : <input type="text" name="palpasi_16" id="palpasi-16"
                                                        class="custom-form clear-input d-inline-block col-lg-1 mr-1"
                                                        placeholder="Sebutkan"> bagian.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="9">
                                                    Taksiran berat janin
                                                    : <input type="text" name="palpasi_17" id="palpasi-17"
                                                        class="custom-form clear-input d-inline-block col-lg-1 mr-1"
                                                        placeholder="Sebutkan"> gram
                                                </td>
                                            </tr>
                                            <tr>
                                                <th rowspan="1">Auskultasi : </th>
                                                <td colspan="9">
                                                    DJJ : <input type="text" name="auskultasi_1" id="auskultasi-1"
                                                        class="custom-form clear-input d-inline-block col-lg-1 mr-1"
                                                        placeholder="Sebutkan"> x / menit,
                                                    : <input type="checkbox" name="auskultasi_2" id="auskultasi-2"
                                                        value="1" class="mr-1 ml-5">Teratur

                                                    <input type="checkbox" name="auskultasi_3" id="auskultasi-3"
                                                        value="1" class="mr-1 ml-5"> Tidak
                                                    teratur
                                                    <input type="checkbox" name="auskultasi_4" id="auskultasi-4"
                                                        value="1" class="mr-1 ml-5">Tidak terdengar
                                                </td>
                                            </tr>
                                            <tr>
                                                <th rowspan="1">Gerak Janin : </th>
                                                <td colspan="9">
                                                    <input type="text" name="gerak_janin" id="gerak-janin"
                                                        class="custom-form clear-input d-inline-block col-lg-1 mr-1"
                                                        placeholder="Sebutkan"> x / 30 menit,
                                                </td>
                                            </tr>
                                            <tr>
                                                <th rowspan="1">His / kontraksi : </th>
                                                <td colspan="9">
                                                    <input type="text" name="his_konteraksi_1" id="his-konteraksi-1"
                                                        class="custom-form clear-input d-inline-block col-lg-1 mr-1"
                                                        placeholder="Sebutkan"> x dalam 10 menit,&nbsp;&nbsp;&nbsp;
                                                    lamanya <input type="text" name="his_konteraksi_2"
                                                        id="his-konteraksi-2"
                                                        class="custom-form clear-input d-inline-block col-lg-1 mr-1 ml-2"
                                                        placeholder="Sebutkan"> detik, &nbsp;&nbsp;&nbsp;
                                                    kekuatan <input type="text" name="his_konteraksi_3"
                                                        id="his-konteraksi-3"
                                                        class="custom-form clear-input d-inline-block col-lg-1 mr-1 ml-2"
                                                        placeholder="Sebutkan">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th rowspan="5">Pemeriksaan dalam : </th>
                                                <td colspan="9">
                                                    Introitus vagina &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" name="pemeriksaan_dalam_1"
                                                        id="pemeriksaan-dalam-1" value="1" class=" mr-1"> Normal
                                                    <input type="checkbox" name="pemeriksaan_dalam_2"
                                                        id="pemeriksaan-dalam-2" value="1" class="mr-1 ml-5">Teraba
                                                    benjolan
                                                    <input type="checkbox" name="pemeriksaan_dalam_3"
                                                        id="pemeriksaan-dalam-3" value="1" class="mr-1 ml-5">Lain - lain
                                                    <input type="text" name="pemeriksaan_dalam_4"
                                                        id="pemeriksaan-dalam-4"
                                                        class="custom-form clear-input d-inline-block col-lg-2 ml-1 "
                                                        placeholder="Sebutkan" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="9">
                                                    Persio &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;<input
                                                        type="checkbox" name="pemeriksaan_dalam_5"
                                                        id="pemeriksaan-dalam-5" value="1" class=" mr-1"> Tebal
                                                    <input type="checkbox" name="pemeriksaan_dalam_6"
                                                        id="pemeriksaan-dalam-6" value="1" class="mr-1 ml-5">Tipis
                                                    <input type="checkbox" name="pemeriksaan_dalam_7"
                                                        id="pemeriksaan-dalam-7" value="1" class="mr-1 ml-5">Lain - lain
                                                    <input type="text" name="pemeriksaan_dalam_8"
                                                        id="pemeriksaan-dalam-8"
                                                        class="custom-form clear-input d-inline-block col-lg-2 ml-1 "
                                                        placeholder="Sebutkan" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="9">
                                                    Pembukaan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;<input
                                                        type="text" name="pemeriksaan_dalam_9" id="pemeriksaan-dalam-9"
                                                        class="custom-form clear-input d-inline-block col-lg-1 mr-1"
                                                        placeholder="Sebutkan"> cm
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="9">
                                                    Ketuban &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;<input
                                                        type="checkbox" name="pemeriksaan_dalam_10"
                                                        id="pemeriksaan-dalam-10" value="1" class=" mr-1"> : Utuh
                                                    <input type="checkbox" name="pemeriksaan_dalam_11"
                                                        id="pemeriksaan-dalam-11" value="1" class="mr-1 ml-5">Pecah
                                                    warna,<input type="text" name="pemeriksaan_dalam_12"
                                                        id="pemeriksaan-dalam-12"
                                                        class="custom-form clear-input d-inline-block col-lg-1 ml-1"
                                                        placeholder="Sebutkan" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="9">
                                                    Nyeri goyang Persio &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
                                                    &nbsp;&nbsp;&nbsp;<input type="radio" name="pemeriksaan_dalam_13"
                                                        id="pemeriksaan-dalam-13" class=" mr-1" value="1"> Ada
                                                    <input type="radio" name="pemeriksaan_dalam_13"
                                                        id="pemeriksaan-dalam-14" class="mr-1 ml-3" value="0">
                                                    Tidak
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <!-- PEMERIKSAAN KEBIDANAN DAN KANDUNGAN AKHIR -->
                                  
                                    <!-- PENILAIAN KEMAMPUAN FUNGSIONAL(INDEX BARTHEL) AWAL -->
                                    <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse"
                                                    data-target="#data-penilaian-kemampuan-fungsional-kebidanan"><i
                                                        class="fas fa-expand mr-1"></i>Expand</button>PENILAIAN
                                                KEMAMPUAN FUNGSIONAL <i>(Indeks Barthel)</i>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2"id="data-penilaian-kemampuan-fungsional-kebidanan">
                                        <table class="table table-no-border table-sm table-striped"
                                            style="margin-top:-15px">
                                            <tr>
                                                <td width="90%" class="bold center">Aktifitas Yang Dinilai</td>
                                                <td width="10%" class="bold center">Nilai</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="bold">Makan</span><br>
                                                    <input type="radio" name="pkf_makan" id="pkf-makan-1" value="0"
                                                        class="mr-1 calc_pkf">0 : Tidak Mampu<br>
                                                    <input type="radio" name="pkf_makan" id="pkf-makan-2" value="5"
                                                        class="mr-1 calc_pkf">5 : Dibantu (makan dipotong-potong
                                                    dahulu)<br>
                                                    <input type="radio" name="pkf_makan" id="pkf-makan-3" value="10"
                                                        class="mr-1 calc_pkf">10 : Mandiri<br>
                                                </td>
                                                <td><input type="number" name="nilai_pkf_makan" id="nilai-pkf-makan"
                                                        class="custom-form center clear-input sub_total_nilai_pkf_kebidanan sub_total_nilai_pkf_kebidanan_0"
                                                        min="0" placeholder="Nilai" readonly></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="bold">Mandi</span><br>
                                                    <input type="radio" name="pkf_mandi" id="pkf-mandi-1" value="0"
                                                        class="mr-1 calc_pkf">0 : Dibantu<br>
                                                    <input type="radio" name="pkf_mandi" id="pkf-mandi-2" value="5"
                                                        class="mr-1 calc_pkf">5 : Mandiri (menggunakan shower)<br>
                                                </td>
                                                <td><input type="number" name="nilai_pkf_mandi" id="nilai-pkf-mandi"
                                                        class="custom-form center clear-input sub_total_nilai_pkf_kebidanan sub_total_nilai_pkf_kebidanan_1"
                                                        min="0" placeholder="Nilai" readonly></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="bold">Personal Hygiene (Cuci Muka, Menyisir Rambut,
                                                        Bercukur Jenggot, Gosok Gigi)</span><br>
                                                    <input type="radio" name="pkf_personal" id="pkf-personal-1"
                                                        value="0" class="mr-1 calc_pkf">0 : Dibantu<br>
                                                    <input type="radio" name="pkf_personal" id="pkf-personal-2"
                                                        value="5" class="mr-1 calc_pkf">5 : Mandiri<br>
                                                </td>
                                                <td><input type="number" name="nilai_pkf_personal"
                                                        id="nilai-pkf-personal"
                                                        class="custom-form center clear-input sub_total_nilai_pkf_kebidanan sub_total_nilai_pkf_kebidanan_2"
                                                        min="0" placeholder="Nilai" readonly></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="bold">Berpakaian (Termasuk Mengenakan
                                                        Sepatu)</span><br>
                                                    <input type="radio" name="pkf_berpakaian" id="pkf-berpakaian-1"
                                                        value="0" class="mr-1 calc_pkf">0 : Dibantu Seluruhnya<br>
                                                    <input type="radio" name="pkf_berpakaian" id="pkf-berpakaian-2"
                                                        value="5" class="mr-1 calc_pkf">5 : Dibantu Sebagian<br>
                                                    <input type="radio" name="pkf_berpakaian" id="pkf-berpakaian-3"
                                                        value="10" class="mr-1 calc_pkf">10 : Mandiri (Termasuk
                                                    Mengancing Baju, Memakai Tali Sepatu dan Resleting)<br>
                                                </td>
                                                <td><input type="number" name="nilai_pkf_berpakaian"
                                                        id="nilai-pkf-berpakaian"
                                                        class="custom-form center clear-input sub_total_nilai_pkf_kebidanan sub_total_nilai_pkf_kebidanan_3"
                                                        min="0" placeholder="Nilai" readonly></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="bold">Buang Air Besar (BAB)</span><br>
                                                    <input type="radio" name="pkf_bab" id="pkf-bab-1" value="0"
                                                        class="mr-1 calc_pkf">0 : Tidak Dapat Mengontrol (perlu
                                                    diberikan enema)<br>
                                                    <input type="radio" name="pkf_bab" id="pkf-bab-2" value="5"
                                                        class="mr-1 calc_pkf">5 : Kadang Mengalami Kecelakaan<br>
                                                    <input type="radio" name="pkf_bab" id="pkf-bab-3" value="10"
                                                        class="mr-1 calc_pkf">10 : Mampu Mengontrol BAB<br>
                                                </td>
                                                <td><input type="number" name="nilai_pkf_bab" id="nilai-pkf-bab"
                                                        class="custom-form center clear-input sub_total_nilai_pkf_kebidanan sub_total_nilai_pkf_kebidanan_4"
                                                        min="0" placeholder="Nilai" readonly></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="bold">Buar Air Kecil (BAK)</span><br>
                                                    <input type="radio" name="pkf_bak" id="pkf-bak-1" value="0"
                                                        class="mr-1 calc_pkf">0 : Tidak Dapat Mengontrol BAK dan
                                                    Menggunakan Kateter<br>
                                                    <input type="radio" name="pkf_bak" id="pkf-bak-2" value="5"
                                                        class="mr-1 calc_pkf">5 : Kadang Mengalami Kecelakaan<br>
                                                    <input type="radio" name="pkf_bak" id="pkf-bak-3" value="10"
                                                        class="mr-1 calc_pkf">10 : Mampu Mengontrol BAK<br>
                                                </td>
                                                <td><input type="number" name="nilai_pkf_bak" id="nilai-pkf-bak"
                                                        class="custom-form center clear-input sub_total_nilai_pkf_kebidanan sub_total_nilai_pkf_kebidanan_5"
                                                        min="0" placeholder="Nilai" readonly></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="bold">Berpindah (Dari Tempat Tidur ke Kursi dan
                                                        Sebaliknya)</span><br>
                                                    <input type="radio" name="pkf_berpindah" id="pkf-berpindah-1"
                                                        value="0" class="mr-1 calc_pkf">0 : Tidak Ada Keseimbangan Untuk
                                                    Duduk<br>
                                                    <input type="radio" name="pkf_berpindah" id="pkf-berpindah-2"
                                                        value="5" class="mr-1 calc_pkf">5 : Dibantu Satu atau Dua Orang
                                                    dan Bisa Duduk<br>
                                                    <input type="radio" name="pkf_berpindah" id="pkf-berpindah-3"
                                                        value="10" class="mr-1 calc_pkf">10 : Dibantu (Lisan atau
                                                    Fisik)<br>
                                                    <input type="radio" name="pkf_berpindah" id="pkf-berpindah-4"
                                                        value="15" class="mr-1 calc_pkf">15 : Mandiri<br>
                                                </td>
                                                <td><input type="number" name="nilai_pkf_berpindah"
                                                        id="nilai-pkf-berpindah"
                                                        class="custom-form center clear-input sub_total_nilai_pkf_kebidanan sub_total_nilai_pkf_kebidanan_6"
                                                        min="0" placeholder="Nilai" readonly></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="bold">Toiletting (Masuk Keluar Toilet
                                                        Sendiri)</span><br>
                                                    <input type="radio" name="pkf_toiletting" id="pkf-toiletting-1"
                                                        value="0" class="mr-1 calc_pkf">0 : Dibantu Seluruhnya<br>
                                                    <input type="radio" name="pkf_toiletting" id="pkf-toiletting-2"
                                                        value="5" class="mr-1 calc_pkf">5 : Dibantu Sebagian<br>
                                                    <input type="radio" name="pkf_toiletting" id="pkf-toiletting-3"
                                                        value="10" class="mr-1 calc_pkf">10 : Mandiri (melepas atau
                                                    memakai pakaian, menyiram WC, membersihkan organ kelamin)<br>
                                                </td>
                                                <td><input type="number" name="nilai_pkf_toiletting"
                                                        id="nilai-pkf-toiletting"
                                                        class="custom-form center clear-input sub_total_nilai_pkf_kebidanan sub_total_nilai_pkf_kebidanan_7"
                                                        min="0" placeholder="Nilai" readonly></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="bold">Mobilisasi (Berjalan di Permukaan
                                                        Datar)</span><br>
                                                    <input type="radio" name="pkf_mobilisasi" id="pkf-mobilisasi-1"
                                                        value="0" class="mr-1 calc_pkf">0 : Tidak Dapat Berjalan<br>
                                                    <input type="radio" name="pkf_mobilisasi" id="pkf-mobilisasi-2"
                                                        value="5" class="mr-1 calc_pkf">5 : Menggunakan Kursi Roda<br>
                                                    <input type="radio" name="pkf_mobilisasi" id="pkf-mobilisasi-3"
                                                        value="10" class="mr-1 calc_pkf">10 : Berjalan dengan Bantuan
                                                    Satu Orang<br>
                                                    <input type="radio" name="pkf_mobilisasi" id="pkf-mobilisasi-4"
                                                        value="15" class="mr-1 calc_pkf">15 : Mandiri<br>
                                                </td>
                                                <td><input type="number" name="nilai_pkf_mobilisasi"
                                                        id="nilai-pkf-mobilisasi"
                                                        class="custom-form center clear-input sub_total_nilai_pkf_kebidanan sub_total_nilai_pkf_kebidanan_8"
                                                        min="0" placeholder="Nilai" readonly></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="bold">Naik dan Turun Tangga</span><br>
                                                    <input type="radio" name="pkf_naikturuntangga"
                                                        id="pkf-naikturuntangga-1" value="0" class="mr-1 calc_pkf">0 :
                                                    Tidak Mampu<br>
                                                    <input type="radio" name="pkf_naikturuntangga"
                                                        id="pkf-naikturuntangga-2" value="5" class="mr-1 calc_pkf">5 :
                                                    Dibantu Menggunakan Tongkat<br>
                                                    <input type="radio" name="pkf_naikturuntangga"
                                                        id="pkf-naikturuntangga-3" value="10" class="mr-1 calc_pkf">10 :
                                                    Mandiri<br>
                                                </td>
                                                <td><input type="number" name="nilai_pkf_naikturuntangga"
                                                        id="nilai-pkf-naikturuntangga"
                                                        class="custom-form center clear-input sub_total_nilai_pkf_kebidanan sub_total_nilai_pkf_kebidanan_9"
                                                        min="0" placeholder="Nilai" readonly></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                            </tr>
                                            <tr>
                                                <td class="bold">JUMLAH SKOR</td>
                                                <td><input type="number" name="total_nilai_pkf" id="total-nilai-pkf"
                                                        class="custom-form center clear-input" min="0" value="0"
                                                        placeholder="Nilai" readonly></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <span class="bold">Keterangan :</span><br>
                                                    <span class="ml-4">0 - 20 : Ketergantungan Penuh</span><br>
                                                    <span class="ml-4">21 - 62 : Ketergantungan Berat</span><br>
                                                    <span class="ml-4">62 - 90 : Ketergantungan Sedang</span><br>
                                                    <span class="ml-4">91 - 99 : Ketergantungan Ringan</span><br>
                                                    <span class="ml-4">100 : Mandiri</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <!-- PENILAIAN KEMAMPUAN FUNGSIONAL(INDEX BARTHEL) AKHIR -->

                                    <!-- SKRINING NUTRISI(MST Modifikasi) AWAL -->
                                    <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse"
                                                    data-target="#data-skrining-nutrisi-kandungan"><i
                                                        class="fas fa-expand mr-1"></i>Expand</button>SKRINING NUTRISI
                                                <i>(/MST Modifikasi)</i>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-skrining-nutrisi-kandungan">
                                        <table class="table table-no-border table-sm table-striped"
                                            style="margin-top:-15px">
                                            <tr>
                                                <td class="center bold">Indikator Penilaian Nutrisi</td>
                                                <td class="center bold">Penilaian</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="bold">Apakah pasien mengalami penurunan berat
                                                    badan yang tidak direncanakan / tidak disengaja dalam 6 bulan
                                                    terakhir</td>
                                            </tr>
                                            <tr>
                                                <td width="90%"><input type="radio" name="sn_penurunan_bb" id="sn-tidak"
                                                        class="mr-1" value="1" onchange="calcscore()">Tidak</td>
                                                <td>Skor 0</td>
                                            </tr>
                                            <tr>
                                                <td><input type="radio" name="sn_penurunan_bb" id="sn-tidak-yakin"
                                                        class="mr-1" value="2" onchange="calcscore()">Tidak Yakin</td>
                                                <td>Skor 2</td>
                                            </tr>
                                            <tr>
                                                <td><input type="radio" name="sn_penurunan_bb" id="sn-ya" class="mr-1"
                                                        value="3" onchange="calcscore()">Ya, ada penurunan BB sebanyak
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr class="sn_penurunan_bb_area">
                                                <td style="padding-left: 20px;"><input type="radio"
                                                        name="sn_penurunan_bb_on" id="sn-pbb-1-1" class="mr-1" value="1"
                                                        onchange="calcscore()">1 - 5 Kg</td>
                                                <td>Skor 1</td>
                                            </tr>
                                            <tr class="sn_penurunan_bb_area">
                                                <td style="padding-left: 20px;"><input type="radio"
                                                        name="sn_penurunan_bb_on" id="sn-pbb-2-2" class="mr-1" value="2"
                                                        onchange="calcscore()">6 - 10 Kg</td>
                                                <td>Skor 2</td>
                                            </tr>
                                            <tr class="sn_penurunan_bb_area">
                                                <td style="padding-left: 20px;"><input type="radio"
                                                        name="sn_penurunan_bb_on" id="sn-pbb-3-3" class="mr-1" value="3"
                                                        onchange="calcscore()">11 - 15 Kg</td>
                                                <td>Skor 3</td>
                                            </tr>
                                            <tr class="sn_penurunan_bb_area">
                                                <td style="padding-left: 20px;"><input type="radio"
                                                        name="sn_penurunan_bb_on" id="sn-pbb-4-4" class="mr-1" value="4"
                                                        onchange="calcscore()">> 15 Kg</td>
                                                <td>Skor 4</td>
                                            </tr>
                                            <tr class="sn_penurunan_bb_area">
                                                <td style="padding-left: 20px;"><input type="radio"
                                                        name="sn_penurunan_bb_on" id="sn-pbb-5-5" class="mr-1" value="5"
                                                        onchange="calcscore()">Tidak tahu berapa Kg penurunannya</td>
                                                <td>Skor 2</td>
                                            </tr>
                                            <tr style="border-bottom: 1px solid black;">
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="bold">Apakah asupan makan pasien berkurang karena
                                                    penurunan nafsu makan (atau karena kesulitan menerima makanan) ?
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input type="radio" name="sn_asupan_makan"
                                                        id="sn-asupan-makan-tidak" class="mr-1" value="0"
                                                        onchange="calcscore()">Tidak</td>
                                                <td>Skor 0</td>
                                            </tr>
                                            <tr>
                                                <td><input type="radio" name="sn_asupan_makan" id="sn-asupan-makan-ya"
                                                        class="mr-1" value="1" onchange="calcscore()">Ya</td>
                                                <td>Skor 1</td>
                                            </tr>
                                            <tr style="border-top: 1px solid black; border-bottom: 1px solid black;">
                                                <td><b>Total Skor Skrining MST (Malnutrition Screening Tool)</b></td>
                                                <td><input type="number" name="sn_total" id="sn-total"
                                                        class="custom-form" value="0" readonly></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Jika skor ≥ 2 : pasien mengalami resiko gizi kurang,
                                                    (dilaporkan ke dokter jaga ruangan / DPJP untuk konfirmasi ke
                                                    dietisin)</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Jika skor < 2 dengan jenis penyakit tertentu,
                                                        (dilaporkan ke dokter jaga ruangan / DPJP untuk konfirmasi ke
                                                        dietisin)</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <!-- SKRINING NUTRISI(MST Modifikasi) AKHIR -->

                                    <!-- PENILAIAN TINGKAT NYERI DAN RESIKO JATUH DEWASA AWAL -->
                                    <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse"
                                                    data-target="#data-penilaian-tingkat-nyeri-dan-resiko-jatuh-dewasa-kebidanan"><i
                                                        class="fas fa-expand mr-1"></i>Expand</button>PENILAIAN TINGKAT
                                                NYERI DAN RESIKO JATUH DEWASA</i>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2"id="data-penilaian-tingkat-nyeri-dan-resiko-jatuh-dewasa-kebidanan">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px">
                                                    <tr>
                                                        <td colspan="3" class="bold center">Penilaian Tingkat Nyeri</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3"><img
                                                                src="<?= resource_url() ?>images/attributes/pain-measurement-scale-hd.png"
                                                                alt="Pain Measurement Scale"
                                                                class="img-fluid mx-auto d-block rounded shadow"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="20%" class="bold">Keterangan</td>
                                                        <td width="1%" class="bold">:</td>
                                                        <td width="69%">
                                                            <input type="radio" name="keterangan_kebidanan_1"
                                                                id="keterangan-kebidanan-1" value="Ringan"
                                                                class="mr-1">Ringan : 1 - 3
                                                            <input type="radio" name="keterangan_kebidanan_1"
                                                                id="keterangan-kebidanan-2" value="Sedang"
                                                                class="mr-1">Sedang : 4 - 6
                                                            <input type="radio" name="keterangan_kebidanan_1"
                                                                id="keterangan-kebidanan-3" value="Berat"
                                                                class="mr-1">Berat : 7 - 10
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Nyeri Hilang, Bila</td>
                                                        <td class="bold">:</td>
                                                        <td>
                                                            <input type="checkbox" name="nyeri_hilang_kebidanan_1"
                                                                id="nyeri-hilang-kebidanan-1" value="1"
                                                                class="mr-1">Minum Obat
                                                            <input type="checkbox" name="nyeri_hilang_kebidanan_2"
                                                                id="nyeri-hilang-kebidanan-2" value="1"
                                                                class="mr-1 ml-2">Mendengarkan Musik
                                                            <input type="checkbox" name="nyeri_hilang_kebidanan_3"
                                                                id="nyeri-hilang-kebidanan-3" value="1"
                                                                class="mr-1 ml-2">Istirahat
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <input type="checkbox" name="nyeri_hilang_kebidanan_4"
                                                                id="nyeri-hilang-kebidanan-4" value="1"
                                                                class="mr-1">Berubah
                                                            Posisi / Tidur
                                                            <input type="checkbox" name="nyeri_hilang_kebidanan_5"
                                                                id="nyeri-hilang-kebidanan-5" value="1"
                                                                class="mr-1 ml-2">Lain-lain
                                                            <input type="text" name="nyeri_hilang_kebidanan_6"
                                                                id="nyeri-hilang-kebidanan-6"
                                                                class="custom-form clear-input d-inline-block col-lg-4 ml-2 disabled"
                                                                placeholder="Masukkan lain - lain">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-lg-6">
                                                <table class="table table-no-border table-sm table-striped"
                                                    style="margin-top:-15px">
                                                    <td colspan="3" class="bold center">Penilaian Resiko Jatuh
                                                        Dewasa</td>
                                                    </tr>
                                                </table>
                                                <table class="table table-sm table-striped table-bordered"
                                                    style="margin-top: -15px">
                                                    <thead>
                                                        <tr>
                                                            <th width="60%" class="center"><b>Parameter</b></th>
                                                            <th width="20%" class="center"><b>Nilai</b></th>
                                                            <th width="20%" class="center"><b>Skor</b></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td rowspan="2">Riwayat jatuh dalam waktu 3 bulan sebab
                                                                apapun</td>
                                                            <td><input type="radio" name="prjd_riwayat_jatuh_kebidanan"
                                                                    id="prjd-riwayat-jatuh-kebidanan-ya" value="25"
                                                                    class="mr-1" onchange="calcscorepjd()">Ya</td>
                                                            <td class="center">25</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="prjd_riwayat_jatuh_kebidanan"
                                                                    id="prjd-riwayat-jatuh-kebidanan-tidak" value="0"
                                                                    class="mr-1" onchange="calcscorepjd()">Tidak
                                                            </td>
                                                            <td class="center">0</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="2">Diagnosis Sekunder (≥2 Diagnosis Medis)</td>
                                                            <td><input type="radio"
                                                                    name="prjd_diagnosis_sekunder_kebidanan"
                                                                    id="prjd-diagnosis-sekunder-kebidanan-ya" value="15"
                                                                    class="mr-1" onchange="calcscorepjd()">Ya</td>
                                                            <td class="center">15</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio"
                                                                    name="prjd_diagnosis_sekunder_kebidanan"
                                                                    id="prjd-diagnosis-sekunder-kebidanan-tidak"
                                                                    value="0" class="mr-1" onchange="calcscorepjd()">Tidak
                                                            </td>
                                                            <td class="center">0</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">Alat Bantu Jalan</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="checkbox"
                                                                    name="alat_bantu_jalan_kebidanan_1"
                                                                    id="alat-bantu-jalan-kebidanan-1" value="1"
                                                                    class="mr-1">Tidak
                                                                Ada / Kursi Roda</td>
                                                            <td><input type="radio"
                                                                    name="alat_bantu_jalan_1_kebidanan_ya"
                                                                    id="alat-bantu-jalan-1-kebidanan-ya" value="0"
                                                                    class="mr-1 disabled" onchange="calcscorepjd()">Ya
                                                            </td>
                                                            <td class="center">0</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="checkbox"
                                                                    name="alat_bantu_jalan_kebidanan_2"
                                                                    id="alat-bantu-jalan-kebidanan-2" value="1"
                                                                    class="mr-1">Kruk
                                                                / Tongkat / Walker</td>
                                                            <td><input type="radio"
                                                                    name="alat_bantu_jalan_2_kebidanan_ya"
                                                                    id="alat-bantu-jalan-2-kebidanan-ya" value="15"
                                                                    class="mr-1 disabled" onchange="calcscorepjd()">Ya
                                                            </td>
                                                            <td class="center">15</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="checkbox"
                                                                    name="alat_bantu_jalan_kebidanan_3"
                                                                    id="alat-bantu-jalan-kebidanan-3" value="1"
                                                                    class="mr-1">Berpegangan pada benda-benda disekitar
                                                                / Furniture</td>
                                                            <td><input type="radio"
                                                                    name="alat_bantu_jalan_3_kebidanan_ya"
                                                                    id="alat-bantu-jalan-3-kebidanan-ya" value="30"
                                                                    class="mr-1 disabled" onchange="calcscorepjd()">Ya
                                                            </td>
                                                            <td class="center">30</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="2">Terpasang Infus / Heparin Lock</td>
                                                            <td><input type="radio"
                                                                    name="prjd_terpasang_infus_kebidanan"
                                                                    id="prjd-terpasang-infus-kebidanan-ya" value="20"
                                                                    class="mr-1" onchange="calcscorepjd()">Ya</td>
                                                            <td class="center">20</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio"
                                                                    name="prjd_terpasang_infus_kebidanan"
                                                                    id="prjd-terpasang-infus-kebidanan-tidak" value="0"
                                                                    class="mr-1" onchange="calcscorepjd()">Tidak
                                                            </td>
                                                            <td class="center">0</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">Cara Berjalan atau Berpindah</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="checkbox" name="cara_berjalan_kebidanan_1"
                                                                    id="cara-berjalan-kebidanan-1" value="1"
                                                                    class="mr-1">Normal /
                                                                Bedrest / Imobilisasi</td>
                                                            <td><input type="radio" name="cara_berjalan_1_kebidanan_ya"
                                                                    id="cara-berjalan-1-kebidanan-ya" value="0"
                                                                    class="mr-1 disabled" onchange="calcscorepjd()">Ya
                                                            </td>
                                                            <td class="center">0</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="checkbox" name="cara_berjalan_kebidanan_2"
                                                                    id="cara-berjalan-kebidanan-2" value="1"
                                                                    class="mr-1">Lemah
                                                            </td>
                                                            <td><input type="radio" name="cara_berjalan_2_kebidanan_ya"
                                                                    id="cara-berjalan-2-kebidanan-ya" value="10"
                                                                    class="mr-1 disabled" onchange="calcscorepjd()">Ya
                                                            </td>
                                                            <td class="center">10</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="checkbox" name="cara_berjalan_kebidanan_3"
                                                                    id="cara-berjalan-kebidanan-3" value="1"
                                                                    class="mr-1">Terganggu</td>
                                                            <td><input type="radio" name="cara_berjalan_3_kebidanan_ya"
                                                                    id="cara-berjalan-3-kebidanan-ya" value="20"
                                                                    class="mr-1 disabled" onchange="calcscorepjd()">Ya
                                                            </td>
                                                            <td class="center">20</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">Status Mental</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="checkbox" name="status_mental_kebidanan_1"
                                                                    id="status-mental-kebidanan-1" value="1"
                                                                    class="mr-1">Sadar
                                                                Akan Kemampuan Diri Sendiri</td>
                                                            <td><input type="radio" name="status_mental_1_kebidanan_ya"
                                                                    id="status-mental-1-kebidanan-ya" value="0"
                                                                    class="mr-1 disabled" onchange="calcscorepjd()">Ya
                                                            </td>
                                                            <td class="center">0</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="checkbox" name="status_mental_kebidanan_2"
                                                                    id="status-mental-kebidanan-2" value="1"
                                                                    class="mr-1">Sering
                                                                Lupa akan Keterbatasan Yang dimiliki</td>
                                                            <td><input type="radio" name="status_mental_2_kebidanan_ya"
                                                                    id="status-mental-2-kebidanan-ya" value="15"
                                                                    class="mr-1 disabled" onchange="calcscorepjd()">Ya
                                                            </td>
                                                            <td class="center">15</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" class="bold">JUMLAH SKOR</td>
                                                            <td class="center"><input type="number" min="0"
                                                                    name="prjd_jumlah_skor_kebidanan"
                                                                    id="prjd-jumlah-skor-kebidanan"
                                                                    class="custom-form clear-input center"
                                                                    placeholder="Jumlah" value="0" readonly></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table class="table table-no-border table-sm table-striped"style="margin-top:15px">
                                                    <tr>
                                                        <td>
                                                            <span class="bold">Keterangan</span><br>
                                                            <span class="ml-3">Tidak Beresiko : 0 - 24</span><br>
                                                            <span class="ml-3">Resiko Rendah : 25 - 50</span><br>
                                                            <span class="ml-3">Resiko Tinggi : ≥ 51</span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- PENILAIAN TINGKAT NYERI DAN RESIKO JATUH DEWASA AKHIR -->

                                    <!-- SKRINING PASIEN AKHIR KEHIDUPAN AWAL -->
                                    <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"data-toggle="collapse"
                                                    data-target="#data-skrining-pasien-akhir-kehidupan"><i
                                                    class="fas fa-expand mr-1"></i>Expand</button>SKRINING PASIEN AKHIR KEHIDUPAN
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-skrining-pasien-akhir-kehidupan">
                                        <table class="table table-sm table-striped table-bordered"
                                            style="margin-top: -15px">
                                            <thead>
                                                <tr>
                                                    <th width="5%" class="center"><b>No.</b></th>
                                                    <th width="75%" class="center"><b>Kriteria</b></th>
                                                    <th width="10%" class="center"><b>Ya</b></th>
                                                    <th width="10%" class="center"><b>Tidak</b></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="center">1.</td>
                                                    <td>Usia lebih dari 80 tahun</td>
                                                    <td class="center"><input type="radio" name="spak_1_kebidanan_ya"
                                                            id="spak-1-kebidanan-ya" value="1"></td>
                                                    <td class="center"><input type="radio" name="spak_1_kebidanan_ya"
                                                            id="spak-1-kebidanan-tidak" value="0"></td>
                                                </tr>
                                                <tr>
                                                    <td class="center">2.</td>
                                                    <td>Pasien mengalami gagal nafas</td>
                                                    <td class="center"><input type="radio" name="spak_2_kebidanan_ya"
                                                            id="spak-2-kebidanan-ya" value="1"></td>
                                                    <td class="center"><input type="radio" name="spak_2_kebidanan_ya"
                                                            id="spak-2-kebidanan-tidak" value="0"></td>
                                                </tr>
                                                <tr>
                                                    <td class="center">3.</td>
                                                    <td>Pasien mengalami sepsis</td>
                                                    <td class="center"><input type="radio" name="spak_3_kebidanan_ya"
                                                            id="spak-3-kebidanan-ya" value="1"></td>
                                                    <td class="center"><input type="radio" name="spak_3_kebidanan_ya"
                                                            id="spak-3-kebidanan-tidak" value="0"></td>
                                                </tr>
                                                <tr>
                                                    <td class="center">4.</td>
                                                    <td>Pasien mengalami gagal organ multiple</td>
                                                    <td class="center"><input type="radio" name="spak_4_kebidanan_ya"
                                                            id="spak-4-kebidanan-ya" value="1"></td>
                                                    <td class="center"><input type="radio" name="spak_4_kebidanan_ya"
                                                            id="spak-4-kebidanan-tidak" value="0"></td>
                                                </tr>
                                                <tr>
                                                    <td class="center">5.</td>
                                                    <td>Pasien dengan karsinoma stadium 4</td>
                                                    <td class="center"><input type="radio" name="spak_5_kebidanan_ya"
                                                            id="spak-5-kebidanan-ya" value="1"></td>
                                                    <td class="center"><input type="radio" name="spak_5_kebidanan_ya"
                                                            id="spak-5-kebidanan-tidak" value="0"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4"><b><i>Bila mana pasien memenuhi setidaknya tiga dari
                                                        kondisi tersebut, maka dilakukan pelayanan pasien akhir kehidupan</b></i></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- SKRINING PASIEN AKHIR KEHIDUPAN  AKHIR -->

                                    <!-- PEMERIKSAAN FISIK DAN TANDA TANDA VITAL AWAL -->
                                    <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse" data-target="#data-pemeriksaan-fisik"><i
                                                        class="fas fa-expand mr-1"></i>Expand</button>PEMERIKSAAN FISIK
                                                DAN TANDA-TANDA VITAL
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-pemeriksaan-fisik">
                                        <table class="table table-no-border table-sm table-striped"
                                            style="margin-top:-15px">
                                            <tr>
                                                <td width="20%" class="bold">Kesadaran</td>
                                                <td wdith="1%" class="bold">:</td>
                                                <td width="39%">
                                                    <input type="checkbox" name="kesadaran_1" id="kesadaran-1" value="1"
                                                        class="mr-1">Composmentis
                                                    <input type="checkbox" name="kesadaran_2" id="kesadaran-2" value="1"
                                                        class="mr-1 ml-2">Apatis
                                                    <input type="checkbox" name="kesadaran_3" id="kesadaran-3" value="1"
                                                        class="mr-1 ml-2">Sopor
                                                    <input type="checkbox" name="kesadaran_4" id="kesadaran-4" value="1"
                                                        class="mr-1 ml-2">Koma
                                                </td>
                                                <td></td>
                                                <td width="15%"></td>
                                                <td width="1%"></td>
                                                <td width="39%"></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <span class="bold">GCS :
                                                        E <input type="text" name="gcs_e" id="gcs-e"
                                                            class="custom-form clear-input d-inline-block col-lg-1 gcsw"
                                                            placeholder="" onkeypress="return hanyaAngka(event)">
                                                        M <input typevent="text" name="gcs_m" id="gcs-m"
                                                            class="custom-form clear-input d-inline-block col-lg-1 gcsw"
                                                            placeholder="" onkeypress="return hanyaAngka(event)">
                                                        V <input type="text" name="gcs_v" id="gcs-v"
                                                            class="custom-form clear-input d-inline-block col-lg-1 gcsw"
                                                            placeholder="" onkeypress="return hanyaAngka(event)">
                                                        Total : <input type="text" name="gsc_total" id="gsc-total"
                                                            class="custom-form clear-input d-inline-block col-lg-1 ml-3"
                                                            placeholder="0">
                                                    </span>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Tekanan Darah</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" name="tekanan_darah_1" id="tekanan-darah-1"
                                                            class="custom-form clear-input d-inline-block col-lg-2"
                                                            placeholder="Sistolik"
                                                            onkeypress="return hanyaAngka(event)">
                                                        <span>/</span>
                                                        <input type="text" name="tekanan_darah_2" id="tekanan-darah-2"
                                                            class="custom-form clear-input d-inline-block col-lg-2"
                                                            placeholder="Diastolik"
                                                            onkeypress="return hanyaAngka(event)">
                                                        <div class="input-group-append">
                                                            <span class="input-group-custom">MmHg</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td class="bold">Suhu</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" name="tekanan_darah_3" id="tekanan-darah-3"
                                                            class="custom-form clear-input d-inline-block col-lg-3"
                                                            placeholder="Suhu" onkeypress="return hanyaAngka(event)">
                                                        <div class="input-group-append">
                                                            <span class="input-group-custom">&#8451;</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Frekuensi Nadi</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" name="frekuensi_nadi_1" id="frekuensi-nadi-1"
                                                            class="custom-form clear-input d-inline-block col-lg-2"
                                                            placeholder="Nadi" onkeypress="return hanyaAngka(event)">
                                                        <div class="input-group-append">
                                                            <span class="input-group-custom">x/mnt</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td class="bold">Frekuensi Nafas</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" name="frekuensi_nadi_2" id="frekuensi-nadi-2"
                                                            class="custom-form clear-input d-inline-block col-lg-3"
                                                            placeholder="Nafas" onkeypress="return hanyaAngka(event)">
                                                        <div class="input-group-append">
                                                            <span class="input-group-custom">x/mnt</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Berat Badan</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" name="berat_badan_1" id="berat-badan-1"
                                                            class="custom-form clear-input d-inline-block col-lg-2"
                                                            placeholder="Berat Badan"
                                                            onkeypress="return hanyaAngka(event)">
                                                        <div class="input-group-append">
                                                            <span class="input-group-custom">Kg</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td class="bold">Tinggi Badan</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" name="berat_badan_2" id="berat-badan-2"
                                                            class="custom-form clear-input d-inline-block col-lg-3"
                                                            placeholder="Tinggi Badan"
                                                            onkeypress="return hanyaAngka(event)">
                                                        <div class="input-group-append">
                                                            <span class="input-group-custom">cm</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <td></td>
                                            <td></td>
                                            <tr>
                                                <td width="20%" class="bold">Mata</td>
                                                <td wdith="1%" class="bold">:</td>
                                                <td width="50%">
                                                    <input type="checkbox" name="mata_1" id="mata-1" value="1"
                                                        class="mr-1">Pandangan
                                                    kabur
                                                    <input type="checkbox" name="mata_2" id="mata-2" value="1"
                                                        class="mr-1 ml-2">Penglihatan ganda
                                                    <input type="checkbox" name="mata_3" id="mata-3" value="1"
                                                        class="mr-1 ml-2">Sclera
                                                    ikterik
                                                    <input type="checkbox" name="mata_4" id="mata-4" value="1"
                                                        class="mr-1 ml-2">Konjungtiva
                                                    pucat
                                                </td>
                                            </tr>
                                            <td></td>
                                            <td></td>
                                            <tr>
                                                <td width="20%" class="bold">Dada dan Aksila</td>
                                                <td wdith="1%" class="bold">:</td>
                                                <td width="50%">
                                                    <input type="checkbox" name="dada_askila_1" id="dada-askila-1"
                                                        value="1" class="mr-1">Mammae simetris
                                                    <input type="checkbox" name="dada_askila_2" id="dada-askila-2"
                                                        value="1" class="mr-1 ml-2">Mammae
                                                    asimetris
                                                    <input type="checkbox" name="dada_askila_3" id="dada-askila-3"
                                                        value="1" class="mr-1 ml-2">Areola
                                                    hiperpigmentasi
                                                    <input type="checkbox" name="dada_askila_4" id="dada-askila-4"
                                                        value="1" class="mr-1 ml-2">Puting susu
                                                    menonjol
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="20%" class="bold"></td>
                                                <td wdith="1%" class="bold">:</td>
                                                <td width="50%">
                                                    <input type="checkbox" name="dada_askila_5" id="dada-askila-5"
                                                        value="1" class="mr-1">Tumor
                                                    <input type="checkbox" name="dada_askila_6" id="dada-askila-6"
                                                        value="1" class="mr-1 ml-2">Kolostrum
                                                </td>
                                            </tr>
                                            <td></td>
                                            <td></td>
                                            <tr>
                                                <td width="20%" class="bold">Ekstremitas</td>
                                                <td wdith="1%" class="bold">:</td>
                                                <td width="50%">
                                                    <input type="checkbox" name="ekstremitas_1" id="ekstremitas-1"
                                                        value="1" class="mr-1">Tungkai simetris
                                                    <input type="checkbox" name="ekstremitas_2" id="ekstremitas-2"
                                                        value="1" class="mr-1 ml-2">Tungkai
                                                    asimetris
                                                    <input type="checkbox" name="ekstremitas_3" id="ekstremitas-3"
                                                        value="1" class="mr-1 ml-2">Oedema
                                                    <input type="checkbox" name="ekstremitas_4" id="ekstremitas-4"
                                                        value="1" class="mr-1 ml-2">Refleks
                                                    Patelia : + / -
                                                </td>
                                            </tr>
                                            <td></td>
                                            <td></td>
                                            <tr>
                                                <td width="20%" class="bold">Sistem pernafasan</td>
                                                <td wdith="1%" class="bold">:</td>
                                                <td width="50%">
                                                    <input type="checkbox" name="sistem_pernafasan_1"
                                                        id="sistem-pernafasan-1" value="1" class="mr-1">Dyspneu
                                                    <input type="checkbox" name="sistem_pernafasan_2"
                                                        id="sistem-pernafasan-2" value="1" class="mr-1 ml-2">Orthopneu
                                                    <input type="checkbox" name="sistem_pernafasan_3"
                                                        id="sistem-pernafasan-3" value="1" class="mr-1 ml-2">Thacypneu
                                                    <input type="checkbox" name="sistem_pernafasan_4"
                                                        id="sistem-pernafasan-4" value="1" class="mr-1 ml-2">Wheezing
                                                    <input type="checkbox" name="sistem_pernafasan_5"
                                                        id="sistem-pernafasan-5" value="1" class="mr-1 ml-2">Batuk
                                                    <input type="checkbox" name="sistem_pernafasan_6"
                                                        id="sistem-pernafasan-6" value="1" class="mr-1 ml-2">Batuk
                                                    darah

                                                </td>
                                            </tr>
                                            <td></td>
                                            <td></td>
                                            <tr>
                                                <td width="20%" class="bold"></td>
                                                <td wdith="1%" class="bold">:</td>
                                                <td width="50%">
                                                    <input type="checkbox" name="sistem_pernafasan_7"
                                                        id="sistem-pernafasan-7" value="1" class="mr-1">Sputum
                                                    <input type="checkbox" name="sistem_pernafasan_8"
                                                        id="sistem-pernafasan-8" value="1" class="mr-1">Nyeri dada
                                                    <input type="checkbox" name="sistem_pernafasan_9"
                                                        id="sistem-pernafasan-9" value="1" class="mr-1 ml-2">Keringat
                                                    malam
                                                </td>
                                            </tr>
                                            <td></td>
                                            <td></td>
                                            <tr>
                                                <td width="20%" class="bold">Sistem Kardiovaskuler</td>
                                                <td wdith="1%" class="bold">:</td>
                                                <td width="50%">
                                                    Warna kulit : <input type="checkbox" name="sistem_kardiovaskuler_1"
                                                        id="sistem-kardiovaskuler-1" value="1" class="mr-1">Normal
                                                    <input type="checkbox" name="sistem_kardiovaskuler_2"
                                                        id="sistem-kardiovaskuler-2" value="1"
                                                        class="mr-1 ml-2">Kemerahan
                                                    <input type="checkbox" name="sistem_kardiovaskuler_3"
                                                        id="sistem-kardiovaskuler-3" value="1" class="mr-1 ml-2">Sianosis
                                                    <input type="checkbox" name="sistem_kardiovaskuler_4"
                                                        id="sistem-kardiovaskuler-4" value="1" class="mr-1 ml-2">Pucat
                                                </td>
                                            </tr>
                                            <td></td>
                                            <td></td>
                                            <tr>
                                                <td width="20%" class="bold"></td>
                                                <td wdith="1%" class="bold">:</td>
                                                <td width="50%">
                                                    Nyeri dada : <input type="radio" name="sistem_kardiovaskuler_5"
                                                        id="sistem-kardiovaskuler-5" class="mr-1" value="0">Tidak
                                                    <input type="radio" name="sistem_kardiovaskuler_5"
                                                        id="sistem-kardiovaskuler-6" class="mr-1 ml-2" value="1">Ya,
                                                    Sebutkan <input type="text" name="sistem_kardiovaskuler_7"
                                                        id="sistem-kardiovaskuler-7"
                                                        class="custom-form clear-input d-inline-block col-lg-2 ml-1 "
                                                        placeholder="Sebutkan" disabled>
                                                </td>
                                            </tr>
                                            <td></td>
                                            <td></td>
                                            <tr>
                                                <td width="20%" class="bold"></td>
                                                <td wdith="1%" class="bold">:</td>
                                                <td width="50%">
                                                    Denyut nadi : <input type="radio" name="sistem_kardiovaskuler_8"
                                                        id="sistem-kardiovaskuler-8" class="mr-1" value="0">Tidak Teratur
                                                    <input type="radio" name="sistem_kardiovaskuler_8"
                                                        id="sistem-kardiovaskuler-9" class="mr-1 ml-2" value="1">Teratur
                                                </td>
                                            </tr>
                                            <td></td>
                                            <td></td>
                                            <tr>
                                                <td width="20%" class="bold"></td>
                                                <td wdith="1%" class="bold">:</td>
                                                <td width="50%">
                                                    Sirkulasi : <input type="checkbox" name="sistem_kardiovaskuler_10"
                                                        id="sistem-kardiovaskuler-10" value="1" class="mr-1">Akral
                                                    hangat
                                                    <input type="checkbox" name="sistem_kardiovaskuler_11"
                                                        id="sistem-kardiovaskuler-11" value="1" class="mr-1 ml-2">Akral
                                                    dingin
                                                    <input type="checkbox" name="sistem_kardiovaskuler_12"
                                                        id="sistem-kardiovaskuler-12" value="1" class="mr-1 ml-2">Rasa
                                                    kebas
                                                </td>
                                            </tr>
                                            <td></td>
                                            <td></td>
                                            <tr>
                                                <td width="20%" class="bold"></td>
                                                <td wdith="1%" class="bold">:</td>
                                                <td width="50%">
                                                    Pulsasi : <input type="checkbox" name="sistem_kardiovaskuler_13"
                                                        id="sistem-kardiovaskuler-13" value="1" class="mr-1">Kuat
                                                    <input type="checkbox" name="sistem_kardiovaskuler_14"
                                                        id="sistem-kardiovaskuler-14" value="1" class="mr-1 ml-2">Lemah
                                                    <input type="checkbox" name="sistem_kardiovaskuler_15"
                                                        id="sistem-kardiovaskuler-15" value="1" class="mr-1 ml-2">Lain -lain
                                                    <input type="text" name="sistem_kardiovaskuler_16"
                                                        id="sistem-kardiovaskuler-16"
                                                        class="custom-form clear-input d-inline-block col-lg-2 ml-1 "
                                                        placeholder="Sebutkan" disabled>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <!-- PEMERIKSAAN FISIK DAN TANDA TANDA VITAL AKHIR -->

                                    <!-- SKALA EARLY WARNING SYSTEM(EWS) AWAL -->
                                    <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse"
                                                    data-target="#data-skala-early-warning-system"><i
                                                        class="fas fa-expand mr-1"></i>Expand</button>SKALA EARLY
                                                WARNING SYSTEM (EWS)
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-skala-early-warning-system">
                                        <table class="table table-sm" style="margin-top: -15px">
                                            <tr>
                                                <td width="75%">
                                                    <table class="table table-sm table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th class="center" colspan="9"><b>MEOWS</b></th>
                                                            </tr>
                                                            <tr>
                                                                <th width="5%" class="center"><b>No.</b></th>
                                                                <th width="15%"><b>Parameter</b></th>
                                                                <th width="10%" class="center"><b>3</b></th>
                                                                <th width="10%" class="center"><b>2</b></th>
                                                                <th width="10%" class="center"><b>1</b></th>
                                                                <th width="10%" class="center"><b>0</b></th>
                                                                <th width="10%" class="center"><b>1</b></th>
                                                                <th width="10%" class="center"><b>2</b></th>
                                                                <th width="10%" class="center"><b>3</b></th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="center">1.</td>
                                                                <td>Respirasi</td>
                                                                <td class="center"><input type="radio" name="respirasi"
                                                                        id="skalameows-1-1" value="3_1"
                                                                        class="mr-1 skalameows">
                                                                        &#60;12
                                                                </td>
                                                                <td class="center"></td>
                                                                <td class="center"></td>
                                                                <td class="center"><input type="radio" name="respirasi"
                                                                        id="skalameows-1-2" value="0_2"
                                                                        class="mr-1 skalameows ">12-20
                                                                </td>
                                                                <td class="center"></td>
                                                                <td class="center"><input type="radio" name="respirasi"
                                                                        id="skalameows-1-3" value="2_3"
                                                                        class="mr-1 skalameows ">21-25
                                                                </td>
                                                                <td class="center"><input type="radio" name="respirasi"
                                                                        id="skalameows-1-4" value="3_4"
                                                                        class="mr-1 skalameows ">&#62;25
                                                                </td>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center">2.</td>
                                                                <td>Saturasi</td>
                                                                <td class="center"><input type="radio" name="saturasi"
                                                                        id="skalameows-2-1" value="3_1" class="mr-1 skalameows ">&#60;92
                                                                </td>
                                                                <td class="center"><input type="radio" name="saturasi"
                                                                        id="skalameows-2-2" value="2_2" class="mr-1 skalameows ">92-95
                                                                </td>
                                                                <td class="center"></td>
                                                                <td class="center"><input type="radio" name="saturasi"
                                                                        id="skalameows-2-3" value="0_3" class="mr-1 skalameows ">&#62;95
                                                                </td>
                                                                <td class="center"></td>
                                                                <td class="center"></td>
                                                                <td class="center"></td>

                                                            </tr>
                                                            <tr>
                                                                <td class="center">3.</td>
                                                                <td> O₂</td>
                                                                <td class="center"></td>
                                                                <td class="center"><input type="radio" name="o2" id="skalameows-3-1"
                                                                        value="2_1" class="mr-1 skalameows ">Ya</td>
                                                                <td class="center"></td>
                                                                <td class="center"><input type="radio" name="o2" id="skalameows-3-2"
                                                                        value="0_2" class="mr-1 skalameows ">Tidak</td>
                                                                <td class="center"></td>
                                                                <td class="center"></td>
                                                                <td class="center"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center">4.</td>
                                                                <td>Suhu</td>
                                                                <td class="center"><input type="radio" name="suhu" id="skalameows-4-1"
                                                                        value="3_1" class="mr-1 skalameows ">&#60;36
                                                                </td>
                                                                <td class="center"></td>
                                                                <td class="center"></td>
                                                                <td class="center"><input type="radio" name="suhu" id="skalameows-4-2"
                                                                        value="0_2" class="mr-1 skalameows ">36.1-37.2
                                                                </td>
                                                                <td class="center"></td>
                                                                <td class="center"><input type="radio" name="suhu" id="skalameows-4-3"
                                                                        value="2_3" class="mr-1 skalameows ">37.5-37.7
                                                                </td>
                                                                <td class="center"><input type="radio" name="suhu" id="skalameows-4-4"
                                                                        value="3_4" class="mr-1 skalameows ">&#62;37.7
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center">5.</td>
                                                                <td>TD Sistolik</td>
                                                                <td class="center"><input type="radio" name="sintolik"
                                                                        id="skalameows-5-1" value="3_1" class="mr-1 skalameows ">&#60;90
                                                                </td>
                                                                <td class="center"></td>
                                                                <td class="center"></td>
                                                                <td class="center"><input type="radio" name="sintolik"
                                                                        id="skalameows-5-2" value="0_2" class="mr-1 skalameows ">90-140
                                                                </td>
                                                                <td class="center"><input type="radio" name="sintolik"
                                                                        id="skalameows-5-3" value="1_3" class="mr-1 skalameows ">141-150
                                                                </td>
                                                                <td class="center"><input type="radio" name="sintolik"
                                                                        id="skalameows-5-4" value="2_4" class="mr-1 skalameows ">151-160
                                                                </td>
                                                                <td class="center"><input type="radio" name="sintolik"
                                                                        id="skalameows-5-5" value="3_5"
                                                                        class="mr-1 skalameows ">&#62;160</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center">6.</td>
                                                                <td>TD diastolik</td>
                                                                <td class="center"></td>
                                                                <td class="center"></td>
                                                                <td class="center"></td>
                                                                <td class="center"><input type="radio" name="diastolik"
                                                                        id="skalameows-6-1" value="0_1" class="mr-1 skalameows ">60-90
                                                                </td>
                                                                <td class="center"><input type="radio" name="diastolik"
                                                                        id="skalameows-6-2" value="1_2" class="mr-1 skalameows ">91-100
                                                                </td>
                                                                <td class="center"><input type="radio" name="diastolik"
                                                                        id="skalameows-6-3" value="2_3" class="mr-1 skalameows ">101-110
                                                                </td>
                                                                <td class="center"><input type="radio" name="diastolik"
                                                                        id="skalameows-6-4" value="3_4"
                                                                        class="mr-1 skalameows ">&#62;110
                                                                </td>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center">7.</td>
                                                                <td>Nadi</td>
                                                                <td class="center"><input type="radio" name="nadi" id="skalameows-7-1"
                                                                        value="3_1" class="mr-1 skalameows ">&#60;50
                                                                </td>
                                                                <td class="center"><input type="radio" name="nadi" id="skalameows-7-2"
                                                                        value="2_2" class="mr-1 skalameows ">50-60</td>
                                                                <td class="center"></td>
                                                                <td class="center"><input type="radio" name="nadi" id="skalameows-7-3"
                                                                        value="0_3" class="mr-1 skalameows ">61-100
                                                                </td>
                                                                <td class="center"><input type="radio" name="nadi" id="skalameows-7-4"
                                                                        value="1_4" class="mr-1 skalameows ">101-110
                                                                </td>
                                                                <td class="center"><input type="radio" name="nadi" id="skalameows-7-5"
                                                                        value="2_5" class="mr-1 skalameows ">111-120
                                                                </td>
                                                                <td class="center"><input type="radio" name="nadi" id="skalameows-7-6"
                                                                        value="3_6" class="mr-1 skalameows ">&#62;120
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center">8.</td>
                                                                <td>Kesadaran</td>
                                                                <td class="center"></td>
                                                                <td class="center"></td>
                                                                <td class="center"></td>
                                                                <td class="center"><input type="radio" name="kesadaran"
                                                                        id="skalameows-8-1" value="0_1" class="mr-1 skalameows ">A</td>
                                                                <td class="center"></td>
                                                                <td class="center"></td>
                                                                <td class="center"><input type="radio" name="kesadaran"
                                                                        id="skalameows-8-2" value="3_2" class="mr-1 skalameows ">V,P/U
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center">9.</td>
                                                                <td>Nyeri</td>
                                                                <td class="center"></td>
                                                                <td class="center"></td>
                                                                <td class="center"></td>
                                                                <td class="center"><input type="radio" name="nyeri_11"
                                                                        id="skalameows-9-1" value="0_1" class="mr-1 skalameows ">Normal
                                                                </td>
                                                                <td class="center"></td>
                                                                <td class="center"></td>
                                                                <td class="center"><input type="radio" name="nyeri_11"
                                                                        id="skalameows-9-2" value="3_2"
                                                                        class="mr-1 skalameows ">Abnormal
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center">10.</td>
                                                                <td>Pengeluaran/Lochea</td>
                                                                <td class="center"></td>
                                                                <td class="center"></td>
                                                                <td class="center"></td>
                                                                <td class="center"><input type="radio" name="pengeluwaran_11"
                                                                        id="skalameows-10-1" value="0_1" class="mr-1 skalameows ">Normal
                                                                </td>
                                                                <td class="center"></td>
                                                                <td class="center"></td>
                                                                <td class="center"><input type="radio" name="pengeluwaran_11"
                                                                        id="skalameows-10-2" value="3_2"
                                                                        class="mr-1 skalameows ">Abnormal
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center">11.</td>
                                                                <td>Protein urin</td>
                                                                <td class="center"></td>
                                                                <td class="center"></td>
                                                                <td class="center"></td>
                                                                <td class="center"></td>
                                                                <td class="center"></td>
                                                                <td class="center"><input type="radio" name="protein"
                                                                        id="skalameows-11-1" value="2_1" class="mr-1 skalameows ">+
                                                                </td>
                                                                <td class="center"><input type="radio" name="protein"
                                                                        id="skalameows-11-2" value="3_2"
                                                                        class="mr-1 skalameows ">&#62;++
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="10"></td>
                                                            <tr>
                                                                <td colspan="2"><b>TOTAL</b></td>
                                                                <td colspan="8">
                                                                    <input type="radio" name="total_skalameows" id="total-skalameows-1"
                                                                        class="mr-1" value="Putih"><i class="fas fa-fw fa-square"
                                                                        style="color: white"></i><b>Putih (0)</b>
                                                                    <input type="radio" name="total_skalameows" id="total-skalameows-2"
                                                                        class="mr-1 ml-3" value="Hijau"><i class="fas fa-fw fa-square"
                                                                        style="color: green"></i><b>Hijau (1-4)</b>
                                                                    <input type="radio" name="total_skalameows" id="total-skalameows-3"
                                                                        class="mr-1 ml-3" value="Kuning"><i class="fas fa-fw fa-square"
                                                                        style="color: yellow"></i><b>Kuning
                                                                        (5-6/skor 3 pd 1 prameter)</b>
                                                                    <input type="radio" name="total_skalameows" id="total-skalameows-4"
                                                                        class="mr-1 ml-3" value="Merah"><i class="fas fa-fw fa-square"
                                                                        style="color: red"></i><b>Merah(≥7)</b>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="25%" style="vertical-align: top !important;">
                                                    <span class="bold">Keterangan :</span><br>
                                                    <span>A = Alert (Sadar Penuh)</span><br>
                                                    <span>V = Verbal (Respon dengan Rangsang Suara)</span><br>
                                                    <span>P = Pain (Respon dengan Rangsang Nyeri)</span><br>
                                                    <span>U = Unrespon</span>
                                                </td>
                                            </tr>
                                        </table>
                                        <hr>
                                        <table class="table table-sm table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="center" colspan="9"><b>NEWS</b></th>
                                                </tr>
                                                <tr>
                                                    <th width="5%" class="center"><b>No.</b></th>
                                                    <th width="15%"><b>Parameter Fisiologis</b></th>
                                                    <th width="10%" class="center"><b>3</b></th>
                                                    <th width="10%" class="center"><b>2</b></th>
                                                    <th width="10%" class="center"><b>1</b></th>
                                                    <th width="10%" class="center"><b>0</b></th>
                                                    <th width="10%" class="center"><b>1</b></th>
                                                    <th width="10%" class="center"><b>2</b></th>
                                                    <th width="10%" class="center"><b>3</b></th>
                                                    <th width="10%" class="center"><b>Blue kriteria</b></th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="center">1.</td>
                                                    <td>Laju respirasi / menit</td>
                                                    <td class="center"><input type="radio" name="laju_respirasi"
                                                            id="skalanews-1-1" value="3_1" class="mr-1 skalanews">6-8
                                                    </td>
                                                    <td class="center"></td>
                                                    <td class="center"><input type="radio" name="laju_respirasi"
                                                            id="skalanews-1-2" value="1_2" class="mr-1 skalanews ">9-11
                                                    </td>
                                                    <td class="center"><input type="radio" name="laju_respirasi"
                                                            id="skalanews-1-3" value="0_3" class="mr-1 skalanews ">12-20
                                                    </td>
                                                    <td class="center"></td>
                                                    <td class="center"><input type="radio" name="laju_respirasi"
                                                            id="skalanews-1-4" value="2_4" class="mr-1 skalanews ">21-24
                                                    </td>
                                                    <td class="center"><input type="radio" name="laju_respirasi"
                                                            id="skalanews-1-5" value="3_5" class="mr-1 skalanews ">25-34
                                                    </td>
                                                    </td>
                                                    <td class="center"><input type="radio" name="laju_respirasi"
                                                            id="skalanews-1-6" value="bk_6"
                                                            class="mr-1 skalanews ">&#8804;5/&#8805;35</td>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="center">2.</td>
                                                    <td>Saturasi O₂ (%)</td>
                                                    <td class="center"><input type="radio" name="saturasi_1"
                                                            id="skalanews-2-1" value="3_1" class="mr-1 skalanews "> ≤91
                                                    </td>
                                                    <td class="center"><input type="radio" name="saturasi_1"
                                                            id="skalanews-2-2" value="2_2" class="mr-1 skalanews ">92-93
                                                    </td>
                                                    <td class="center"><input type="radio" name="saturasi_1"
                                                            id="skalanews-2-3" value="1_3" class="mr-1 skalanews ">94-95
                                                    </td>
                                                    <td class="center"><input type="radio" name="saturasi_1"
                                                            id="skalanews-2-4" value="0_4" class="mr-1 skalanews "> ≥96
                                                    </td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>

                                                </tr>
                                                <tr>
                                                    <td class="center">3.</td>
                                                    <td>Suplemen O₂</td>
                                                    <td class="center"></td>
                                                    <td class="center"><input type="radio" name="suplemen"
                                                            id="skalanews-3-1" value="2_1" class="mr-1 skalanews ">Ya
                                                    </td>
                                                    <td class="center"></td>
                                                    <td class="center"><input type="radio" name="suplemen"
                                                            id="skalanews-3-2" value="0_2" class="mr-1 skalanews ">Tidak
                                                    </td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>

                                                </tr>
                                                <tr>
                                                    <td class="center">4.</td>
                                                    <td>Temperatur (°C)</td>
                                                    <td class="center"><input type="radio" name="temperatur"
                                                            id="skalanews-4-1" value="3_1" class="mr-1 skalanews "> ≤35
                                                    </td>
                                                    <td class="center"></td>

                                                    <td class="center"><input type="radio" name="temperatur"
                                                            id="skalanews-4-2" value="1_2"
                                                            class="mr-1 skalanews ">35.1-36
                                                    </td>
                                                    <td class="center"><input type="radio" name="temperatur"
                                                            id="skalanews-4-3" value="0_3"
                                                            class="mr-1 skalanews ">36.1-38
                                                    </td>

                                                    <td class="center"><input type="radio" name="temperatur"
                                                            id="skalanews-4-4" value="1_4"
                                                            class="mr-1 skalanews ">38.1-39
                                                    </td>
                                                    <td class="center"><input type="radio" name="temperatur"
                                                            id="skalanews-4-5" value="2_5" class="mr-1 skalanews "> ≥39
                                                    </td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>

                                                </tr>
                                                <tr>
                                                    <td class="center">5.</td>
                                                    <td>TDS (mmHG)</td>
                                                    <td class="center"><input type="radio" name="tds" id="skalanews-5-1"
                                                            value="3_1" class="mr-1 skalanews ">71-90</td>
                                                    <td class="center"><input type="radio" name="tds" id="skalanews-5-2"
                                                            value="1_2" class="mr-1 skalanews ">91-100</td>
                                                    <td class="center"><input type="radio" name="tds" id="skalanews-5-3"
                                                            value="0_3" class="mr-1 skalanews ">101-110</td>
                                                    <td class="center"><input type="radio" name="tds" id="skalanews-5-4"
                                                            value="1_4" class="mr-1 skalanews ">111-180</td>
                                                    <td class="center"><input type="radio" name="tds" id="skalanews-5-5"
                                                            value="2_5" class="mr-1 skalanews ">181-220</td>
                                                    <td class="center"></td>
                                                    <td class="center"><input type="radio" name="tds" id="skalanews-5-6"
                                                            value="3_6" class="mr-1 skalanews "> ≥221</td>
                                                    <td class="center"><input type="radio" name="tds" id="skalanews-5-7"
                                                            value="bk_7" class="mr-1 skalanews "> ≤70</td>
                                                </tr>
                                                <tr>
                                                    <td class="center">6.</td>
                                                    <td>Laju jantung/menit</td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                    <td class="center"><input type="radio" name="laju_jantung"
                                                            id="skalanews-6-1" value="3_1" class="mr-1 skalanews ">41-50
                                                    </td>
                                                    <td class="center"><input type="radio" name="laju_jantung"
                                                            id="skalanews-6-2" value="0_2" class="mr-1 skalanews ">51-90
                                                    </td>
                                                    <td class="center"><input type="radio" name="laju_jantung"
                                                            id="skalanews-6-3" value="1_3"
                                                            class="mr-1 skalanews ">91-110
                                                    </td>
                                                    <td class="center"><input type="radio" name="laju_jantung"
                                                            id="skalanews-6-4" value="2_4"
                                                            class="mr-1 skalanews ">111-130
                                                    </td>
                                                    <td class="center"><input type="radio" name="laju_jantung"
                                                            id="skalanews-6-5" value="3_5"
                                                            class="mr-1 skalanews ">131-140
                                                    </td>
                                                    <td class="center"><input type="radio" name="laju_jantung"
                                                            id="skalanews-6-6" value="bk_6"
                                                            class="mr-1 skalanews ">&#8804;40/&#8805;140
                                                    </td>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="center">7.</td>
                                                    <td>Kesadaran</td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                    <td class="center"><input type="radio" name="kesadaran_1"
                                                            id="skalanews-7-1" value="0_1" class="mr-1 skalanews "> A
                                                    </td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                    <td class="center"><input type="radio" name="kesadaran_1"
                                                            id="skalanews-7-2" value="3_2" class="mr-1 skalanews ">V & P
                                                    </td>
                                                    </td>
                                                    <td class="center"><input type="radio" name="kesadaran_1"
                                                            id="skalanews-7-3" value="bk_3" class="mr-1 skalanews ">U
                                                    </td>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="10"></td>
                                                </tr>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"><b>TOTAL</b></td>
                                                    <td colspan="8">
                                                        <input type="radio" name="total_skalanews"
                                                            id="total-skalanews-1" class="mr-1" value="Putih"><i
                                                            class="fas fa-fw fa-square"
                                                            style="color: white"></i><b>Putih (0)</b>
                                                        <input type="radio" name="total_skalanews"
                                                            id="total-skalanews-2" class="mr-1 ml-3" value="Hijau"><i
                                                            class="fas fa-fw fa-square"
                                                            style="color: green"></i><b>Hijau (1-4)</b>
                                                        <input type="radio" name="total_skalanews"
                                                            id="total-skalanews-3" class="mr-1 ml-3" value="Kuning"><i
                                                            class="fas fa-fw fa-square"
                                                            style="color: yellow"></i><b>Kuning (5-6)</b>
                                                        <input type="radio" name="total_skalanews"
                                                            id="total-skalanews-4" class="mr-1 ml-3" value="Merah"><i
                                                            class="fas fa-fw fa-square" style="color: red"></i><b>Merah
                                                            (≥7/1 Parameter Blue Kriteria)</b>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- SKALA EARLY WARNING SYSTEM(EWS) AKHIR -->

                                    <!-- DATA PENUNJANG AWAL -->
                                    <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse"
                                                    data-target="#data-data-penunjang-kebidanan"><i
                                                        class="fas fa-expand mr-1"></i>Expand</button> DATA
                                                PENUNJANG
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse" id="data-data-penunjang-kebidanan">
                                        <table class="table table-no-border table-sm table-striped"
                                            style="margin-top:-15px">
                                            <tr>
                                                <td class="bold">A. Pemeriksaan Laboratorium, tanggal :
                                                    <input type="text" name="tanggal_pemeriksaan_lab_kebidanan_1"
                                                        id="tanggal-pemeriksaan-lab-kebidanan"
                                                        class="custom-form clear-input col-lg-3 d-inline-block"
                                                        placeholder="Masukan tanggal laboratorim">
                                                    <span class=" bold ml-2">Hasil : </span><input type="text"
                                                        name="hasil_pemeriksaan_labo_kebidanan_2"
                                                        id="hasil-pemeriksaan-labo-kebidanan"
                                                        class="custom-form clear-input col-lg-3 d-inline-block"
                                                        placeholder="Masukan Hasil Pemeriksaan">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">B. Pemeriksaan Cardiotokografi (CTG), tanggal :

                                                    <input type="text" name="tanggal_pemeriksaan_rad_kebidanan_3"
                                                        id="tanggal-pemeriksaan-rad-kebidanan"
                                                        class="custom-form clear-input col-lg-3 d-inline-block"
                                                        placeholder="Masukan tanggal cardiotokografi">
                                                    <span class=" bold ml-2">Hasil : </span><input type="text"
                                                        name="hasil_pemeriksaan_rad_kebidanan_4"
                                                        id="hasil-pemeriksaan-rad-kebidanan"
                                                        class="custom-form clear-input col-lg-3 d-inline-block"
                                                        placeholder="Masukan Hasil Pemeriksaan">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold">C. Lain-lain :
                                                    <input type="text" name="penunjang_lain_kebidanan_5"
                                                        id="penunjang-lain-kebidanan"
                                                        class="custom-form clear-input col-lg-3 d-inline-block"
                                                        placeholder="Masukan Pemeriksaan Lainnya">
                                            </tr>
                                        </table>
                                    </div>
                                    <!--  DATA PENUNJANG AKHIR -->

                                    <!-- POPULASI KHUSUS(ISI SESUAI KEBUTUHAN PASIEN) AWAL -->
                                    <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse"
                                                    data-target="#data-populasi-khusus-kebidanan"><i
                                                        class="fas fa-expand mr-1"></i>Expand</button>POPULASI KHUSUS
                                                (ISI SESUAI KEBUTUHAN PASIEN)
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-populasi-khusus-kebidanan">
                                        <table class="table table-sm table-striped" style="margin-top: -15px">
                                            <tr>
                                                <td><b>A.</b></td>
                                                <td><b>Penyakit Menular</b></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>1. Pasien mengetahui penyakit saat ini</td>
                                                <td>
                                                    <input type="radio" name="pk_penyakit_menular_1"
                                                        id="pk-penyakit-menular-1" value="1"
                                                        class="mr-1">Tahu
                                                    <input type="radio" name="pk_penyakit_menular_1"
                                                        id="pk-penyakit-menular-2" value="0"
                                                        class="mr-1 ml-4">Tidak
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>2. Sumber informasi tentang penyakit diperoleh dari</td>
                                                <td>
                                                    <input type="checkbox" name="pk_penyakit_menular_3"
                                                        id="pk-penyakit-menular-3" value="1" class="mr-1">Dokter
                                                    <input type="checkbox" name="pk_penyakit_menular_4"
                                                        id="pk-penyakit-menular-4" value="1" class="mr-1 ml-2">Perawat
                                                    <input type="checkbox" name="pk_penyakit_menular_5"
                                                        id="pk-penyakit-menular-5" value="1"
                                                        class="mr-1 ml-2">Keluarga
                                                    <input type="checkbox" name="pk_penyakit_menular_6"
                                                        id="pk-penyakit-menular-6" value="1" class="mr-1 ml-2">Lain-lain
                                                    <input type="text" name="pk_penyakit_menular_7"
                                                        id="pk-penyakit-menular-7"
                                                        class="custom-form clear-input d-inline-block col-lg-4 ml-2 "
                                                        placeholder="Masukkan lain-lain" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>3. Menerima informasi jangka waktu pengobatan</td>
                                                <td>
                                                    <input type="radio" name="pk_penyakit_menular_8"
                                                        id="pk-penyakit-menular-8" value="1"
                                                        class="mr-1">Ya
                                                    <input type="text" name="pk_penyakit_menular_9"
                                                        id="pk-penyakit-menular-9"
                                                        class="custom-form clear-input d-inline-block col-lg-6 ml-2"
                                                        placeholder="Minggu/Bulan/Tahun" disabled>
                                                    <input type="radio" name="pk_penyakit_menular_8"
                                                        id="pk-penyakit-menular-10" value="0"
                                                        class="mr-1 ml-4">Tidak
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>4. Melakukan pemeriksaan rutin</td>
                                                <td>
                                                    <input type="radio" name="pk_penyakit_menular_11"
                                                        id="pk-penyakit-menular-11" value="0"
                                                        class="mr-1">Tidak
                                                    <input type="radio" name="pk_penyakit_menular_11"
                                                        id="pk-penyakit-menular-12" value="1"
                                                        class="mr-1 ml-4">Ya
                                                    <input type="text" name="pk_penyakit_menular_13"
                                                        id="pk-penyakit-menular-13"
                                                        class="custom-form clear-input d-inline-block col-lg-6 ml-2" placeholder="............" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>5. Cara Penularan</td>
                                                <td>
                                                    <input type="checkbox" name="pk_penyakit_menular_14"
                                                        id="pk-penyakit-menular-14" value="1" class="mr-1">Airbone
                                                    <input type="checkbox" name="pk_penyakit_menular_15"
                                                        id="pk-penyakit-menular-15" value="1" class="mr-1 ml-2">Droplet
                                                    <input type="checkbox" name="pk_penyakit_menular_16"
                                                        id="pk-penyakit-menular-16" value="1"
                                                        class="mr-1 ml-2">Kontak Langsung
                                                    <input type="checkbox" name="pk_penyakit_menular_17"
                                                        id="pk-penyakit-menular-17" value="1"
                                                        class="mr-1 ml-2">Cairan
                                                    Tubuh
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>6. Penyakit Penyerta</td>
                                                <td>
                                                    <input type="radio" name="pk_penyakit_menular_18"
                                                        id="pk-penyakit-menular-18" value="0"
                                                        class="mr-1">Tidak
                                                    <input type="radio" name="pk_penyakit_menular_18"
                                                        id="pk-penyakit-menular-19" value="1"
                                                        class="mr-1 ml-4">Ya
                                                    <input type="text" name="pk_penyakit_menular_20"
                                                        id="pk-penyakit-menular-20"
                                                        class="custom-form clear-input d-inline-block col-lg-6 ml-2"placeholder="............" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>B.</b></td>
                                                <td><b>Penyakit Penurunan Daya Tahan Tubuh</b></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>1. Pasien mengetahui penyakit saat ini</td>
                                                <td>
                                                    <input type="radio" name="pk_penyakit_pdtt_1_kebidanan"
                                                        id="pk-penyakit-pdtt-1-kebidanan-ya" value="1" class="mr-1">Tahu
                                                    <input type="radio" name="pk_penyakit_pdtt_1_kebidanan"
                                                        id="pk-penyakit-pdtt-1-kebidanan-tidak" value="0"
                                                        class="mr-1 ml-4">Tidak
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>2. Sumber informasi tentang penyakit diperoleh dari</td>
                                                <td>
                                                    <input type="checkbox" name="pk_pdtt_dokter_kebidanan"
                                                        id="pk-pdtt-dokter-kebidanan" value="1" class="mr-1">Dokter
                                                    <input type="checkbox" name="pk_pdtt_perawat_kebidanan"
                                                        id="pk-pdtt-perawat-kebidanan" value="1"
                                                        class="mr-1 ml-2">Perawat
                                                    <input type="checkbox" name="pk_pdtt_keluarga_kebidanan"
                                                        id="pk-pdtt-keluarga-kebidanan" value="1"
                                                        class="mr-1 ml-2">Keluarga
                                                    <input type="checkbox" name="pk_pdtt_lain_kebidanan"
                                                        id="pk-pdtt-lain-kebidanan" value="1"
                                                        class="mr-1 ml-2">Lain-lain
                                                    <input type="text" name="pk_pdtt_lain_kebidanan_input"
                                                        id="pk-pdtt-lain-kebidanan-input"
                                                        class="custom-form clear-input d-inline-block col-lg-4 ml-2 "
                                                        placeholder="Masukkan lain-lain" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>3. Menerima informasi jangka waktu pengobatan</td>
                                                <td>
                                                    <input type="radio" name="pk_penyakit_pdtt_3_kebidanan"
                                                        id="pk-penyakit-pdtt-3-kebidanan-ya" value="1" class="mr-1">Ya
                                                    <input type="text" name="pk_penyakit_pdtt_3_kebidanan_input"
                                                        id="pk-penyakit-pdtt-3-kebidanan-input"
                                                        class="custom-form clear-input d-inline-block col-lg-6 ml-2 disabled"
                                                        placeholder="Minggu/Bulan/Tahun" disabled>
                                                    <input type="radio" name="pk_penyakit_pdtt_3_kebidanan"
                                                        id="pk-penyakit-pdtt-3-kebidanan-tidak" value="0"
                                                        class="mr-1 ml-4">Tidak
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>4. Melakukan pemeriksaan rutin</td>
                                                <td>
                                                    <input type="radio" name="pk_penyakit_pdtt_4_kebidanan"
                                                        id="pk-penyakit-pdtt-4-kebidanan-tidak" value="0" class="mr-1">Tidak
                                                    <input type="radio" name="pk_penyakit_pdtt_4_kebidanan"
                                                        id="pk-penyakit-pdtt-4-kebidanan-ya" value="1"
                                                        class="mr-1 ml-4">Ya
                                                    <input type="text" name="pk_penyakit_pdtt_4_kebidanan_input"
                                                        id="pk-penyakit-pdtt-4-kebidanan-input"
                                                        class="custom-form clear-input d-inline-block col-lg-6 ml-2 disabled"
                                                        disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>5. Penyakit Penyerta</td>
                                                <td>
                                                    <input type="radio" name="pk_penyakit_pdtt_5_kebidanan"
                                                        id="pk-penyakit-pdtt-5-kebidanan-tidak" value="0" class="mr-1">Tidak
                                                    <input type="radio" name="pk_penyakit_pdtt_5_kebidanan"
                                                        id="pk-penyakit-pdtt-5-kebidanan-ya" value="1"
                                                        class="mr-1 ml-4">Ya
                                                    <input type="text" name="pk_penyakit_pdtt_5_kebidanan_input"
                                                        id="pk-penyakit-pdtt-5-kebidanan-input"
                                                        class="custom-form clear-input d-inline-block col-lg-6 ml-2 disabled"
                                                        disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>C.</b></td>
                                                <td><b>Kesehatan Jiwa</b></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Pernah mengalami gangguan jiwa sebelumnya</td>
                                                <td>
                                                    <input type="radio" name="pk_kesehatan_jiwa_1_kebidanan"
                                                        id="pk-kesehatan-jiwa-1-kebidanan-tidak" value="0" class="mr-1">Tidak
                                                    <input type="radio" name="pk_kesehatan_jiwa_1_kebidanan"
                                                        id="pk-kesehatan-jiwa-1-kebidanan-ya" value="1"
                                                        class="mr-1 ml-4">Ya
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Riwayat pengobatan sebelumnya</td>
                                                <td>
                                                    <input type="radio" name="pk_kesehatan_jiwa_2_kebidanan"
                                                        id="pk-kesehatan-jiwa-2-kebidanan-tidak" value="0" class="mr-1">Tidak
                                                    <input type="radio" name="pk_kesehatan_jiwa_2_kebidanan"
                                                        id="pk-kesehatan-jiwa-2-kebidanan-ya" value="1"
                                                        class="mr-1 ml-4">Ya
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Adakah anggota keluarga yang mengalami gangguan jiwa serupa</td>
                                                <td>
                                                    <input type="radio" name="pk_kesehatan_jiwa_3_kebidanan"
                                                        id="pk-kesehatan-jiwa-3-kebidanan-tidak" value="0" class="mr-1">Tidak
                                                    <input type="radio" name="pk_kesehatan_jiwa_3_kebidanan"
                                                        id="pk-kesehatan-jiwa-3-kebidanan-ya" value="1"
                                                        class="mr-1 ml-4">Ya
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Apakah pasien bisa merawat dirinya sendiri</td>
                                                <td>
                                                    <input type="radio" name="pk_kesehatan_jiwa_4_kebidanan"
                                                        id="pk-kesehatan-jiwa-4-kebidanan-tidak" value="0" class="mr-1">Tidak
                                                    <input type="radio" name="pk_kesehatan_jiwa_4_kebidanan"
                                                        id="pk-kesehatan-jiwa-4-kebidanan-ya" value="1"
                                                        class="mr-1 ml-4">Ya
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Apakah pasien dapat berkomunikasi dengan baik</td>
                                                <td>
                                                    <input type="radio" name="pk_kesehatan_jiwa_5_kebidanan"
                                                        id="pk-kesehatan-jiwa-5-kebidanan-tidak" value="0" class="mr-1">Tidak
                                                    <input type="radio" name="pk_kesehatan_jiwa_5_kebidanan"
                                                        id="pk-kesehatan-jiwa-5-kebidanan-ya" value="1"
                                                        class="mr-1 ml-4">Ya
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Apakah bicara pasien dapat dipahami oleh perawat / dokter</td>
                                                <td>
                                                    <input type="radio" name="pk_kesehatan_jiwa_6_kebidanan"
                                                        id="pk-kesehatan-jiwa-6-kebidanan-tidak" value="0" class="mr-1">Tidak
                                                    <input type="radio" name="pk_kesehatan_jiwa_6_kebidanan"
                                                        id="pk-kesehatan-jiwa-6-kebidanan-ya" value="1"
                                                        class="mr-1 ml-4">Ya
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Adakah resiko mencederai diri sendiri</td>
                                                <td>
                                                    <input type="radio" name="pk_kesehatan_jiwa_7_kebidanan"
                                                        id="pk-kesehatan-jiwa-7-kebidanan-tidak" value="0" class="mr-1">Tidak
                                                    <input type="radio" name="pk_kesehatan_jiwa_7_kebidanan"
                                                        id="pk-kesehatan-jiwa-7-kebidanan-ya" value="1"
                                                        class="mr-1 ml-4">Ya
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Adakah resiko mencederai orang lain</td>
                                                <td>
                                                    <input type="radio" name="pk_kesehatan_jiwa_8_kebidanan"
                                                        id="pk-kesehatan-jiwa-8-kebidanan-tidak" value="0" class="mr-1">Tidak
                                                    <input type="radio" name="pk_kesehatan_jiwa_8_kebidanan"
                                                        id="pk-kesehatan-jiwa-8-kebidanan-ya" value="1"
                                                        class="mr-1 ml-4">Ya
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Apakah pasien dapat memahami instruksi dokter atau perawat dengan
                                                    baik</td>
                                                <td>
                                                    <input type="radio" name="pk_kesehatan_jiwa_9_kebidanan"
                                                        id="pk-kesehatan-jiwa-9-kebidanan-tidak" value="0" class="mr-1">Tidak
                                                    <input type="radio" name="pk_kesehatan_jiwa_9_kebidanan"
                                                        id="pk-kesehatan-jiwa-9-kebidanan-ya" value="1"
                                                        class="mr-1 ml-4">Ya
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>D.</b></td>
                                                <td><b>Pasien Yang Mengalami Kekerasan / Penganiayaan</b></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Apakah anda mengalami kekerasan / penganiayaan</td>
                                                <td>
                                                    <input type="radio" name="pk_pasien_kekerasan_1_kebidanan"
                                                        id="pk-pasien-kekerasan-1-kebidanan-ya" value="1"
                                                        class="mr-1">Ya
                                                    <input type="radio" name="pk_pasien_kekerasan_1_kebidanan"
                                                        id="pk-pasien-kekerasan-1-kebidanan-tidak" value="0"
                                                        class="mr-1 ml-4"checked>Tidak
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Jenis Kekerasan / Penganiayaan Yang dialami</td>
                                                <td>
                                                    <input type="text" name="pk_pasien_kekerasan_2_kebidanan"
                                                        id="pk-pasien-kekerasan-2-kebidanan"
                                                        class="custom-form clear-input d-inline-block col-lg-8"
                                                        placeholder="jelaskan" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Sudah berapa lama mengalami kekerasan / penganiayaan</td>
                                                <td>
                                                    <input type="text" name="pk_pasien_kekerasan_3_kebidanan"
                                                        id="pk-pasien-kekerasan-3-kebidanan"
                                                        class="custom-form clear-input d-inline-block col-lg-8"
                                                        placeholder="jelaskan" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Seberapa sering anda mengalami kekerasan / penganiayaan</td>
                                                <td>
                                                    <input type="text" name="pk_pasien_kekerasan_4_kebidanan"
                                                        id="pk-pasien-kekerasan-4-kebidanan"
                                                        class="custom-form clear-input d-inline-block col-lg-8"
                                                        placeholder="jelaskan" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Siapa yang melakukan kekerasan / penganiayaan</td>
                                                <td>
                                                    <input type="text" name="pk_pasien_kekerasan_5_kebidanan"
                                                        id="pk-pasien-kekerasan-5-kebidanan"
                                                        class="custom-form clear-input d-inline-block col-lg-8"
                                                        placeholder="jelaskan" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Apakah korban memerlukan pendampingan</td>
                                                <td>
                                                    <input type="radio" name="pk_pasien_kekerasan_6_kebidanan"
                                                        id="pk-pasien-kekerasan-6-kebidanan-ya" value="1"
                                                        class="mr-1">Ya
                                                    <input type="radio" name="pk_pasien_kekerasan_6_kebidanan"
                                                        id="pk-pasien-kekerasan-6-kebidanan-tidak" value="0"
                                                        class="mr-1 ml-4">Tidak
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>E.</b></td>
                                                <td><b>Pasien Diduga Ketergantungan Obat dan Alkohol</b></td>
                                                <td>
                                                    <input type="radio" name="pk_pasien_ketergantungan_obat_kebidanan"
                                                        id="pk-pasien-ketergantungan-obat-kebidanan-ya" value="1"
                                                        class="mr-1">Ya
                                                    <input type="radio" name="pk_pasien_ketergantungan_obat_kebidanan"
                                                        id="pk-pasien-ketergantungan-obat-kebidanan-tidak" value="0"
                                                         class="mr-1 ml-4">Tidak
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    Jika Ya, Sebutkan<input type="text"
                                                        name="pk_pasien_ketergantungan_obat_input_kebidanan"
                                                        id="pk-pasien-ketergantungan-obat-input-kebidanan"
                                                        class="custom-form clear-input d-inline-block col-lg-6 ml-4 "
                                                        placeholder="Sebutkan" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    Lama Ketergantungan<input type="text"
                                                        name="pk_pasien_lama_ketergantungan_obat_input_kebidanan"
                                                        id="pk-pasien-lama-ketergantungan-obat-input-kebidanan"
                                                        class="custom-form clear-input d-inline-block col-lg-6 ml-4 "
                                                        placeholder="Lama Ketergantungan" disabled>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>





                                    <!-- <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse"
                                                    data-target="#data-populasi-khusus-kebidanan"><i
                                                        class="fas fa-expand mr-1"></i>Expand</button>POPULASI KHUSUS
                                                (ISI SESUAI KEBUTUHAN PASIEN)
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-populasi-khusus-kebidanan">
                                        <table class="table table-sm table-striped" style="margin-top: -15px">
                                            <tr>
                                                <td><b>A.</b></td>
                                                <td><b>Penyakit Menular</b></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>1. Pasien mengetahui penyakit saat ini</td>
                                                <td>
                                                    <input type="radio" name="pk_penyakit_menular_1"
                                                        id="pk-penyakit-menular-1" value="1"
                                                        class="mr-1">Tahu
                                                    <input type="radio" name="pk_penyakit_menular_1"
                                                        id="pk-penyakit-menular-2" value="0"
                                                        class="mr-1 ml-4">Tidak
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>2. Sumber informasi tentang penyakit diperoleh dari</td>
                                                <td>
                                                    <input type="checkbox" name="pk_penyakit_menular_3"
                                                        id="pk-penyakit-menular-3" value="1" class="mr-1">Dokter
                                                    <input type="checkbox" name="pk_penyakit_menular_4"
                                                        id="pk-penyakit-menular-4" value="1" class="mr-1 ml-2">Perawat
                                                    <input type="checkbox" name="pk_penyakit_menular_5"
                                                        id="pk-penyakit-menular-5" value="1"
                                                        class="mr-1 ml-2">Keluarga
                                                    <input type="checkbox" name="pk_penyakit_menular_6"
                                                        id="pk-penyakit-menular-6" value="1" class="mr-1 ml-2">Lain-lain
                                                    <input type="text" name="pk_penyakit_menular_7"
                                                        id="pk-penyakit-menular-7"
                                                        class="custom-form clear-input d-inline-block col-lg-4 ml-2 "
                                                        placeholder="Masukkan lain-lain" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>3. Menerima informasi jangka waktu pengobatan</td>
                                                <td>
                                                    <input type="radio" name="pk_penyakit_menular_8"
                                                        id="pk-penyakit-menular-8" value="1"
                                                        class="mr-1">Ya
                                                    <input type="text" name="pk_penyakit_menular_9"
                                                        id="pk-penyakit-menular-9"
                                                        class="custom-form clear-input d-inline-block col-lg-6 ml-2"
                                                        placeholder="Minggu/Bulan/Tahun" disabled>
                                                    <input type="radio" name="pk_penyakit_menular_8"
                                                        id="pk-penyakit-menular-10" value="0"
                                                        class="mr-1 ml-4">Tidak
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>4. Melakukan pemeriksaan rutin</td>
                                                <td>
                                                    <input type="radio" name="pk_penyakit_menular_11"
                                                        id="pk-penyakit-menular-11" value="0"
                                                        class="mr-1">Tidak
                                                    <input type="radio" name="pk_penyakit_menular_11"
                                                        id="pk-penyakit-menular-12" value="1"
                                                        class="mr-1 ml-4">Ya
                                                    <input type="text" name="pk_penyakit_menular_13"
                                                        id="pk-penyakit-menular-13"
                                                        class="custom-form clear-input d-inline-block col-lg-6 ml-2" placeholder="............" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>5. Cara Penularan</td>
                                                <td>
                                                    <input type="checkbox" name="pk_penyakit_menular_14"
                                                        id="pk-penyakit-menular-14" value="1" class="mr-1">Airbone
                                                    <input type="checkbox" name="pk_penyakit_menular_15"
                                                        id="pk-penyakit-menular-15" value="1" class="mr-1 ml-2">Droplet
                                                    <input type="checkbox" name="pk_penyakit_menular_16"
                                                        id="pk-penyakit-menular-16" value="1"
                                                        class="mr-1 ml-2">Kontak Langsung
                                                    <input type="checkbox" name="pk_penyakit_menular_17"
                                                        id="pk-penyakit-menular-17" value="1"
                                                        class="mr-1 ml-2">Cairan
                                                    Tubuh
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>6. Penyakit Penyerta</td>
                                                <td>
                                                    <input type="radio" name="pk_penyakit_menular_18"
                                                        id="pk-penyakit-menular-18" value="0"
                                                        class="mr-1">Tidak
                                                    <input type="radio" name="pk_penyakit_menular_18"
                                                        id="pk-penyakit-menular-19" value="1"
                                                        class="mr-1 ml-4">Ya
                                                    <input type="text" name="pk_penyakit_menular_20"
                                                        id="pk-penyakit-menular-20"
                                                        class="custom-form clear-input d-inline-block col-lg-6 ml-2"placeholder="............" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>B.</b></td>
                                                <td><b>Penyakit Penurunan Daya Tahan Tubuh</b></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>1. Pasien mengetahui penyakit saat ini</td>
                                                <td>
                                                    <input type="radio" name="pk_penyakit_penurunan_1"
                                                        id="pk-penyakit-penurunan-1" value="1" class="mr-1">Tahu
                                                    <input type="radio" name="pk_penyakit_penurunan_1"
                                                        id="pk-penyakit-penurunan-2" value="0"
                                                        class="mr-1 ml-4">Tidak
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>2. Sumber informasi tentang penyakit diperoleh dari</td>
                                                <td>
                                                    <input type="checkbox" name="pk_penyakit_penurunan_3"
                                                        id="pk-penyakit-penurunan-3" value="1" class="mr-1">Dokter
                                                    <input type="checkbox" name="pk_penyakit_penurunan_4"
                                                        id="pk-penyakit-penurunan-4" value="1"
                                                        class="mr-1 ml-2">Perawat
                                                    <input type="checkbox" name="pk_penyakit_penurunan_5"
                                                        id="pk-penyakit-penurunan-5" value="1"
                                                        class="mr-1 ml-2">Keluarga
                                                    <input type="checkbox" name="pk_penyakit_penurunan_6"
                                                        id="pk-penyakit-penurunan-6" value="1"
                                                        class="mr-1 ml-2">Lain-lain
                                                    <input type="text" name="pk_penyakit_penurunan_7"
                                                        id="pk-penyakit-penurunan-7"
                                                        class="custom-form clear-input d-inline-block col-lg-4 ml-2 "
                                                        placeholder="Masukkan lain-lain" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>3. Menerima informasi jangka waktu pengobatan</td>
                                                <td>
                                                    <input type="radio" name="pk_penyakit_penurunan_8"
                                                        id="pk-penyakit-penurunan-8" value="1" class="mr-1">Ya
                                                    <input type="text" name="pk_penyakit_penurunan_9"
                                                        id="pk-penyakit-penurunan-9"
                                                        class="custom-form clear-input d-inline-block col-lg-6 ml-2"
                                                        placeholder="Minggu/Bulan/Tahun" disabled>
                                                    <input type="radio" name="pk_penyakit_penurunan_8"
                                                        id="pk-penyakit-penurunan-10" value="0"
                                                        class="mr-1 ml-4">Tidak
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>4. Melakukan pemeriksaan rutin</td>
                                                <td>
                                                    <input type="radio" name="pk_penyakit_penurunan_11"
                                                        id="pk-penyakit-penurunan-11" value="0" class="mr-1">Tidak
                                                    <input type="radio" name="pk_penyakit_penurunan_11"
                                                        id="pk-penyakit-penurunan-12" value="1"
                                                        class="mr-1 ml-4">Ya
                                                    <input type="text" name="pk_penyakit_penurunan_13"
                                                        id="pk-penyakit-penurunan-13"
                                                        class="custom-form clear-input d-inline-block col-lg-6 ml-2" placeholder="............" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>5. Penyakit Penyerta</td>
                                                <td>
                                                    <input type="radio" name="pk_penyakit_penurunan_14"
                                                        id="pk-penyakit-penurunan-14" value="0" class="mr-1">Tidak
                                                    <input type="radio" name="pk_penyakit_penurunan_14"
                                                        id="pk-penyakit-penurunan-15" value="1"
                                                        class="mr-1 ml-4">Ya
                                                    <input type="text" name="pk_penyakit_penurunan_16"
                                                        id="pk-penyakit-penurunan-16"
                                                        class="custom-form clear-input d-inline-block col-lg-6 ml-2" placeholder="............" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>C.</b></td>
                                                <td><b>Kesehatan Jiwa</b></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Pernah mengalami gangguan jiwa sebelumnya</td>
                                                <td>
                                                    <input type="radio" name="pk_kesehatan_jiwa_1"
                                                        id="pk-kesehatan-jiwa-1" value="0" class="mr-1">Tidak
                                                    <input type="radio" name="pk_kesehatan_jiwa_1"
                                                        id="pk-kesehatan-jiwa-2" value="1"
                                                        class="mr-1 ml-4">Ya
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Riwayat pengobatan sebelumnya</td>
                                                <td>
                                                    <input type="radio" name="pk_kesehatan_jiwa_3"
                                                        id="pk-kesehatan-jiwa-3" value="0" class="mr-1">Tidak
                                                    <input type="radio" name="pk_kesehatan_jiwa_3"
                                                        id="pk-kesehatan-jiwa-4" value="1"
                                                        class="mr-1 ml-4">Ya
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Adakah anggota keluarga yang mengalami gangguan jiwa serupa</td>
                                                <td>
                                                    <input type="radio" name="pk_kesehatan_jiwa_5"
                                                        id="pk-kesehatan-jiwa-5" value="0" class="mr-1" >Tidak
                                                    <input type="radio" name="pk_kesehatan_jiwa_5"
                                                        id="pk-kesehatan-jiwa-6" value="1"
                                                        class="mr-1 ml-4">Ya
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Apakah pasien bisa merawat dirinya sendiri</td>
                                                <td>
                                                    <input type="radio" name="pk_kesehatan_jiwa_7"
                                                        id="pk-kesehatan-jiwa-7" value="0" class="mr-1">Tidak
                                                    <input type="radio" name="pk_kesehatan_jiwa_7"
                                                        id="pk-kesehatan-jiwa-8" value="1"
                                                        class="mr-1 ml-4">Ya
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Apakah pasien dapat berkomunikasi dengan baik</td>
                                                <td>
                                                    <input type="radio" name="pk_kesehatan_jiwa_9"
                                                        id="pk-kesehatan-jiwa-9" value="0" class="mr-1">Tidak
                                                    <input type="radio" name="pk_kesehatan_jiwa_9"
                                                        id="pk-kesehatan-jiwa-10" value="1"
                                                        class="mr-1 ml-4">Ya
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Apakah bicara pasien dapat dipahami oleh perawat / dokter</td>
                                                <td>
                                                    <input type="radio" name="pk_kesehatan_jiwa_11"
                                                        id="pk-kesehatan-jiwa-11" value="0" class="mr-1">Tidak
                                                    <input type="radio" name="pk_kesehatan_jiwa_11"
                                                        id="pk-kesehatan-jiwa-12" value="1"
                                                        class="mr-1 ml-4">Ya
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Adakah resiko mencederai diri sendiri</td>
                                                <td>
                                                    <input type="radio" name="pk_kesehatan_jiwa_13"
                                                        id="pk-kesehatan-jiwa-13" value="0" class="mr-1">Tidak
                                                    <input type="radio" name="pk_kesehatan_jiwa_13"
                                                        id="pk-kesehatan-jiwa-14" value="1"
                                                        class="mr-1 ml-4">Ya
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Adakah resiko mencederai orang lain</td>
                                                <td>
                                                    <input type="radio" name="pk_kesehatan_jiwa_15"
                                                        id="pk-kesehatan-jiwa-15" value="0" class="mr-1">Tidak
                                                    <input type="radio" name="pk_kesehatan_jiwa_15"
                                                        id="pk-kesehatan-jiwa-16" value="1"
                                                        class="mr-1 ml-4">Ya
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Apakah pasien dapat memahami instruksi dokter atau perawat dengan
                                                    baik</td>
                                                <td>
                                                    <input type="radio" name="pk_kesehatan_jiwa_17"
                                                        id="pk-kesehatan-jiwa-17" value="0" class="mr-1">Tidak
                                                    <input type="radio" name="pk_kesehatan_jiwa_17"
                                                        id="pk-kesehatan-jiwa-18" value="1"
                                                        class="mr-1 ml-4">Ya
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>D.</b></td>
                                                <td><b>Pasien Yang Mengalami Kekerasan / Penganiayaan</b></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Apakah anda mengalami kekerasan / penganiayaan</td>
                                                <td>
                                                    <input type="radio" name="pk_pasien_yang_1"
                                                        id="pk-pasien-yang-1" value="1"
                                                        class="mr-1">Ya
                                                    <input type="radio" name="pk_pasien_yang_1"
                                                        id="pk-pasien-yang-2" value="0"
                                                        class="mr-1 ml-4">Tidak
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Jenis Kekerasan / Penganiayaan Yang dialami</td>
                                                <td>
                                                    <input type="text" name="pk_pasien_yang_3"
                                                        id="pk-pasien-yang-3"
                                                        class="custom-form clear-input d-inline-block col-lg-8"
                                                        placeholder="jelaskan" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Sudah berapa lama mengalami kekerasan / penganiayaan</td>
                                                <td>
                                                    <input type="text" name="pk_pasien_yang_4"
                                                        id="pk-pasien-yang-4"
                                                        class="custom-form clear-input d-inline-block col-lg-8"
                                                        placeholder="jelaskan" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Seberapa sering anda mengalami kekerasan / penganiayaan</td>
                                                <td>
                                                    <input type="text" name="pk_pasien_yang_5"
                                                        id="pk-pasien-yang-5"
                                                        class="custom-form clear-input d-inline-block col-lg-8"
                                                        placeholder="jelaskan" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Siapa yang melakukan kekerasan / penganiayaan</td>
                                                <td>
                                                    <input type="text" name="pk_pasien_yang_6"
                                                        id="pk-pasien-yang-6"
                                                        class="custom-form clear-input d-inline-block col-lg-8"
                                                        placeholder="jelaskan" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Apakah korban memerlukan pendampingan</td>
                                                <td>
                                                    <input type="radio" name="pk_pasien_yang_7"
                                                        id="pk-pasien-yang-7" value="1"
                                                        class="mr-1">Ya
                                                    <input type="radio" name="pk_pasien_yang_7"
                                                        id="pk-pasien-yang-8" value="0"
                                                        class="mr-1 ml-4">Tidak
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><b>E.</b></td>
                                                <td><b>Pasien Diduga Ketergantungan Obat dan Alkohol</b></td>
                                                <td>
                                                    <input type="radio" name="pk_pasien_diduga_1"
                                                        id="pk-pasien-diduga-1" value="1"
                                                        class="mr-1">Ya
                                                    <input type="radio" name="pk_pasien_diduga_1"
                                                        id="pk-pasien-diduga-2" value="0"
                                                        class="mr-1 ml-4">Tidak
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    Jika Ya, Sebutkan<input type="text"
                                                        name="pk_pasien_diduga_3"
                                                        id="pk-pasien-diduga-3"
                                                        class="custom-form clear-input d-inline-block col-lg-6 ml-4 "
                                                        placeholder="Sebutkan" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    Lama Ketergantungan<input type="text"
                                                        name="pk_pasien_diduga_4"
                                                        id="pk-pasien-diduga-4"
                                                        class="custom-form clear-input d-inline-block col-lg-6 ml-4 "
                                                        placeholder="Lama Ketergantungan" disabled>
                                                </td>
                                            </tr>
                                        </table>
                                    </div> -->
                                    <!-- POPULASI KHUSUS(ISI SESUAI KEBUTUHAN PASIEN) AKHIR -->



                                    <!-- ASSESMEN KEBIDANAN AWAL -->
                                    <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse" data-target="#data-asesmen-kebidanan"><i
                                                        class="fas fa-expand mr-1"></i>Expand</button>ASSESMEN
                                                KEBIDANAN
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-asesmen-kebidanan">
                                        <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                            <th colspan="2"><b>Masalah & Kebutuhan : </b></th>
                                            </tr>
                                            <tbody>
                                                <tr>
                                                    <th class="center" width="25%"></th>
                                                    <th class="center" width="25%"></th>
                                                    <th class="center" width="25%"></th>
                                                    <th class="center" width="25%"></th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" name="masalah_resiko_infeksi"
                                                            id="masalah-resiko-infeksi" value="1" class="mr-1"> Resiko
                                                        infeksi
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="masalah_anxietas"
                                                            id="masalah-anxietas" value="1" class="mr-1 ml-4"> Anxietas
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" name="masalah_resiko_perdarahan"
                                                            id="masalah-resiko-perdarahan" value="1" class="mr-1">
                                                        Resiko perdarahan
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="masalah_nyeri" id="masalah-nyeri"
                                                            value="1" class="mr-1 ml-4"> Nyeri akut/kronis/melahirkan*
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <input type="checkbox" name="masalah_nausea" id="masalah-nausea"
                                                            value="1" class="mr-1"> Nausea
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="masalah_pola_nafas"
                                                            id="masalah-pola-nafas" value="1" class="mr-1 ml-4"> Pola
                                                        nafas tidak efektif
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <input type="checkbox" name="masalah_resiko_gawat"
                                                            id="masalah-resiko-gawat" value="1" class="mr-1"> Resiko
                                                        gawat janin
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="masalah_lain" id="masalah-lain"
                                                            value="1" class="mr-1 ml-4"> Lain-lain
                                                        <input type="text" name="masalah_lainl" id="masalah-lainl"
                                                            class="custom-form clear-input d-inline-block col-lg-5 mx-1 "
                                                            placeholder="Sebutkan" disabled>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--  ASSESMEN KEBIDANAN AKHIR -->

                                    <!-- RENCANA ASUHAN KEBIDANAN AWAL -->
                                    <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"data-toggle="collapse"
                                                    data-target="#data-rencana-asuhan-kebidanan"><i
                                                    class="fas fa-expand mr-1"></i>Expand</button>RENCANA ASUHAN KEBIDANAN
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-rencana-asuhan-kebidanan">
                                        <table class="table table-no-border table-sm table-striped"
                                            style="margin-top:-15px">
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="rencana_jelaskan" id="rencana-jelaskan"
                                                        value="1" class="mr-1"> Jelaskan
                                                    hasil pemeriksaan kepada pasien dan keluarga
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="rencana_laporkan" id="rencana-laporkan"
                                                        value="1" class="mr-1"> Laporkan
                                                    hasil pemeriksaan kepada DPJP untuk penanganan selanjutnya
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="rencana_fasilitas"
                                                        id="rencana-fasilitas" value="1" class="mr-1"> Fasilitasi
                                                    surat informed consent
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="rencana_asuhan" id="rencana-asuhan"
                                                        value="1" class="mr-1"> Lakukan
                                                    asuhan kebidanan sesuai masalah dan kebutuhan
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="rencana_lakukan" id="rencana-lakukan"
                                                        value="1" class="mr-1"> Lakukan
                                                    obvervasi persalinan
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="rencana_lakukan_edukasi"
                                                        id="rencana-lakukan-edukasi" value="1" class="mr-1"> Lakukan
                                                    edukasi kepada pasien
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="rencana_lain" id="rencana-lain"
                                                        value="1" class="mr-1"> Lain-lain
                                                    <input type="text" name="rencana_lainl" id="rencana-lainl"
                                                        class="custom-form clear-input d-inline-block col-lg-2 mx-1 "
                                                        placeholder="Sebutkan" disabled>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <!-- RENCANA ASUHAN KEBIDANAN AKHIR -->

                                    <!-- PERENCANAAN PULANG/DISCHARGE PLANING AWAL -->
                                    <table class="table table-no-border table-sm table-striped"
                                        style="margin-top:-15px">
                                        <tr>
                                            <td colspan="3" class="center bold td-dark">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    data-toggle="collapse"
                                                    data-target="#data-perencanaan-pulang-kebidanan"><i
                                                        class="fas fa-expand mr-1"></i>Expand</button>PERENCANAAN PULANG
                                                / DISCHARGE PLANNING
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="collapse multi-collapse mt-2" id="data-perencanaan-pulang-kebidanan">
                                        <table class="table table-sm table-striped" style="margin-top: -15px">
                                            <tr>
                                                <td width="50%"><b>Kriteria Discharge Planning :</b></td>
                                                <td width="50%"></td>
                                            </tr>
                                            <tr>
                                                <td>1. Umur > 65 Tahun</td>
                                                <td>
                                                    <input type="radio" name="discharge_planning_kebidanan_1"
                                                        id="discharge-planning-1-kebidanan-ya" class="mr-1" value="1">Ya
                                                    <input type="radio" name="discharge_planning_kebidanan_1"
                                                        id="discharge-planning-1-kebidanan-tidak" class="mr-1 ml-2"
                                                        value="0">Tidak
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2. Keterbatasan Mobilitas</td>
                                                <td>
                                                    <input type="radio" name="discharge_planning_kebidanan_2"
                                                        id="discharge-planning-2-kebidanan-ya" class="mr-1" value="1">Ya
                                                    <input type="radio" name="discharge_planning_kebidanan_2"
                                                        id="discharge-planning-2-kebidanan-tidak" class="mr-1 ml-2"
                                                        value="0">Tidak
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3. Perawatan / Pengobatan Lanjutan</td>
                                                <td>
                                                    <input type="radio" name="discharge_planning_kebidanan_3"
                                                        id="discharge-planning-3-kebidanan-ya" class="mr-1" value="1">Ya
                                                    <input type="radio" name="discharge_planning_kebidanan_3"
                                                        id="discharge-planning-3-kebidanan-tidak" class="mr-1 ml-2"
                                                        value="0">Tidak
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4. Bantuan Untuk Melanjutkan Aktifitas Sehari-hari</td>
                                                <td>
                                                    <input type="radio" name="discharge_planning_kebidanan_4"
                                                        id="discharge-planning-4-kebidanan-ya" class="mr-1" value="1">Ya
                                                    <input type="radio" name="discharge_planning_kebidanan_4"
                                                        id="discharge-planning-4-kebidanan-tidak" class="mr-1 ml-2"
                                                        value="0">Tidak
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Bila salah satu jawaban "Ya" dari kriteria perencanaan
                                                    pulang diatas, maka akan dilanjutkan dengan perencanaan pulang
                                                    sebagai berikut :</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="kriteria_discharge_kebidanan_1"
                                                        id="kriteria-discharge-kebidanan-1" class="mr-1"
                                                        value="1">Perawatan Diri
                                                    (Mandi, BAB, BAK)</td>
                                                <td><input type="checkbox" name="kriteria_discharge_kebidanan_2"
                                                        id="kriteria-discharge-kebidanan-2" class="mr-1"
                                                        value="1">Bantuan Medis /
                                                    Perawatan di rumah (Homecare)</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="kriteria_discharge_kebidanan_3"
                                                        id="kriteria-discharge-kebidanan-3" class="mr-1"
                                                        value="1">Pemantauan
                                                    Pemberian Obat</td>
                                                <td><input type="checkbox" name="kriteria_discharge_kebidanan_4"
                                                        id="kriteria-discharge-kebidanan-4" class="mr-1"
                                                        value="1">Latihan Fisik
                                                    Lanjutan</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="kriteria_discharge_kebidanan_5"
                                                        id="kriteria-discharge-kebidanan-5" class="mr-1"
                                                        value="1">Pendampingan
                                                    Tenaga Khusus Dirumah</td>
                                                <td><input type="checkbox" name="kriteria_discharge_kebidanan_6"
                                                        id="kriteria-discharge-kebidanan-6" class="mr-1"
                                                        value="1">Pemantauan Diet
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="kriteria_discharge_kebidanan_7"
                                                        id="kriteria-discharge-kebidanan-7" class="mr-1"
                                                        value="1">Bantuan Untuk
                                                    Melakukan Aktifitas Fisik</td>
                                                <td><input type="checkbox" name="kriteria_discharge_kebidanan_8"
                                                        id="kriteria-discharge-kebidanan-8" class="mr-1"
                                                        value="1">Perawatan Luka
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>(Kursi Roda, Alat Bantu Jalan)</td>
                                                <td>
                                                    <input type="checkbox" name="kriteria_discharge_kebidanan_9"
                                                        id="kriteria-discharge-kebidanan-9" class="mr-1"
                                                        value="1">Lain-lain
                                                    <input type="text" name="kriteria_discharge_kebidanan_10"
                                                        id="kriteria-discharge-kebidanan-10"
                                                        class="custom-form clear-input d-inline-block col-lg-6 "
                                                        placeholder="Masukkan lain - lain" disabled>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <!-- PERENCANAAN PULANG/DISCHARGE PLANING AKHIR -->

                                    <!-- YANG MELAKUKAN PENGKAJIAN AWAL -->
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td colspan="2" class="center td-dark"></td>
                                        </tr>
                                        <tr>
                                            <td width="50%">
                                                Tanggal & Jam : <input type="text" name="tanggal_jam_bidan"
                                                    id="tanggal-jam-bidan"
                                                    class="custom-form clear-input d-inline-block col-lg-5 ml-2"
                                                    value="<?= date('d/m/Y H:i') ?>"
                                                    placeholder="Masukkan tanggal & jam">
                                            </td>
                                            <td width="50%">
                                                Tanggal & Jam : <input type="text" name="tanggal_jam_dokter_keb"
                                                    id="tanggal-jam-dokter-keb"
                                                    class="custom-form clear-input d-inline-block col-lg-5 ml-2"
                                                    placeholder="Masukkan tanggal & jam">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama Bidan : <input type="text" name="id_bidan" id="id-bidan"
                                                    class="select2c-input ml-2"></td>
                                            <td>Dokter Pengkajian : <input type="text" name="id_dokter" id="id-dokter"
                                                    class="select2c-input ml-2"></td>
                                        </tr>
                                        <tr>
                                            <td class="center">
                                                Tanda Tangan Bidan
                                            </td>
                                            <td class="center">
                                                Verifikasi DPJP dan Tanda Tangan
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="center">
                                                    <input type="checkbox" name="ttd_bidan" id="ttd-bidan"
                                                        value="1" class="custom-form col-lg-1 mx-auto">
                                                    <?= digitalSignature('ttd_kebidanan_verified') ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="center">
                                                    <input type="checkbox" name="ttd_dokter"
                                                        id="ttd-dokter" value="1"
                                                        class="custom-form col-lg-1 mx-auto">
                                                    <?= digitalSignature('ttd_dokter_verified') ?>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <!--YANG MELAKUKAN PENGKAJIAN AKHIR -->


                                <!-- DATA PENGKAJIAN MEDIS KEBIDANAN-->
                                <div class="form-data-pengkajian-dokter-kebidanan">


                                    <table class="table table-no-border table-sm table-striped">
                                        <tr>
                                            <td width="20%" class="bold">Waktu Pengkajian</td>
                                            <td width="1%" class="bold">:</td>
                                            <td width="79%">
                                                <input type="text" name="waktu_kajian_medis_bidan"id="waktu-kajian-medis-bidan"
                                                    class="custom-form clear-input col-lg-2"value="<?= date('d/m/Y H:i') ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="td-dark"><b>ANAMNESIS</b></td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Keluhan Utama</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <textarea name="keluhan_utama_medis_kebidanan"id="keluhan-utama-medis-kebidanan" rows="4"
                                                    class="form-control clear-input"placeholder="Keluhan Utama"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Riwayat Penyakit Sekarang</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <textarea name="rps_medis_kebidanan" id="rps-medis-kebidanan" rows="4"
                                                    class="form-control clear-input"placeholder="Riwayat Penyakit Sekarang"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Riwayat Penyakit Terdahulu</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <textarea name="rpt_medis_kebidanan" id="rpt-medis-kebidanan" rows="4"
                                                    class="form-control clear-input"placeholder="Riwayat Penyakit Terdahulu"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Pengobatan</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <textarea name="pengobatan_medis_kebidanan"id="pengobatan-medis-kebidanan" rows="4"
                                                    class="form-control clear-input"placeholder="Pengobatan"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Riwayat Alergi</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <textarea name="riwayat_alergi_kebidanan" id="riwayat-alergi-kebidanan"
                                                    rows="4" class="form-control clear-input"placeholder="Riwayat Alergi"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Riwayat Penyakit Keluarga</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="radio" name="rpk_medis_kebidanan"id="rpk-medis-kebidanan-tidak" value="0" class="mr-1"checked>Tidak
                                                <input type="radio" name="rpk_medis_kebidanan"id="rpk-medis-kebidanan-ya" value="1" class="mr-1 ml-2">Ya,
                                                <input type="checkbox" name="rpk_medis_kebidanan_asma"id="rpk-medis-kebidanan-asma" value="1" class="mr-1 ml-4"disabled>Asma
                                                <input type="checkbox" name="rpk_medis_kebidanan_dm"id="rpk-medis-kebidanan-dm" value="1" class="mr-1 ml-2" disabled>DM
                                                <input type="checkbox" name="rpk_medis_kebidanan_cardiovascular"id="rpk-medis-kebidanan-cardiovascular" value="1" class="mr-1 ml-2"disabled>Cardiovascular
                                                <input type="checkbox" name="rpk_medis_kebidanan_kanker"id="rpk-medis-kebidanan-kanker" value="1" class="mr-1 ml-2"disabled>kanker
                                                <input type="checkbox" name="rpk_medis_kebidanan_thalasemia"id="rpk-medis-kebidanan-thalasemia" value="1" class="mr-1 ml-2"disabled>Thalasemia
                                                <input type="checkbox" name="rpk_medis_kebidanan_lain"id="rpk-medis-kebidanan-lain" value="1" class="mr-1 ml-2"disabled>lain
                                                <input type="text" name="rpk_medis_kebidanan_lain_input"id="rpk-medis-kebidanan-lain-input"class="custom-form clear-input col-lg-4 d-inline-block mr-2"placeholder="Masukkan lain - lain">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold" colspan="3">Riwayat Pekerjaan, Sosial Ekonomi, Kejiwaan dan Kebiasaan :</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><i>(termasuk riwayat perkawinan, obstetri, imunisasi tumbuh kembang)</i></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <div id="riwayat_field_bidan"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold td-dark" colspan="3">PEMERIKSAAN FISIK</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Tekanan Darah</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="text" name="tekanan_darah_kebidanan_1"id="tekanan-darah-kebidanan-1"class="custom-form clear-input d-inline-block col-lg-1"
                                                    placeholder="Sistolik" onkeypress="return hanyaAngka(event)">
                                                <input type="text" name="tekanan_darah_kebidanan_2"id="tekanan-darah-kebidanan-2"class="custom-form clear-input d-inline-block col-lg-1"
                                                    placeholder="Diastolik" onkeypress="return hanyaAngka(event)"> MmHg &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                                    Suhu : <input type="text" name="tekanan_darah_kebidanan_3" id="tekanan-darah-kebidanan-3"class="custom-form clear-input d-inline-block col-lg-1"
                                                    placeholder="Suhu" onkeypress="return hanyaAngka(event)"> &#8451
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Frekuensi Nadi</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="text" name="frekuensi_nadi_kebidanan_1"id="frekuensi-nadi-kebidanan-1"class="custom-form clear-input d-inline-block col-lg-1"
                                                    placeholder="Diastolik" onkeypress="return hanyaAngka(event)"> x/mnt
                                                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;

                                                Frekuensi Nafas : <input type="text" name="frekuensi_nadi_kebidanan_2"id="frekuensi-nadi-kebidanan-2"class="custom-form clear-input d-inline-block col-lg-1"
                                                    placeholder="Suhu" onkeypress="return hanyaAngka(event)"> x/mnt
                                            </td>
                                        <tr>
                                            <td class="bold">Kesadaran</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="checkbox" name="composmentis_medis_kebidanan"id="composmentis-medis-kebidanan" value="1"class="mr-1">Composmentis
                                                <input type="checkbox" name="apatis_medis_kebidanan"id="apatis-medis-kebidanan" value="1" class="mr-1 ml-2">Apatis
                                                <input type="checkbox" name="samnolen_medis_kebidanan"id="samnolen-medis-kebidanan" value="1" class="mr-1 ml-2">Samnolen
                                                <input type="checkbox" name="sopor_medis_kebidanan"id="sopor-medis-kebidanan" value="1" class="mr-1 ml-2">Sopor
                                                <input type="checkbox" name="koma_medis_kebidanan"id="koma-medis-kebidanan" value="1" class="mr-1 ml-2">Koma
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Kepala</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="radio" name="pf_kepala_kebidanan"id="pf-kepala-kebidanan-tidak" value="Normal" class="mr-1">Normal
                                                <input type="radio" name="pf_kepala_kebidanan"id="pf-kepala-kebidanan-ya" value="Abnormal"class="mr-1 ml-2">Abnormal
                                                <input type="text" name="ket_pf_kepala_kebidanan"id="ket-pf-kepala-kebidanan"class="custom-form clear-input col-lg-6 d-inline-block ml-4"placeholder="Keterangan">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Mata</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="radio" name="pf_mata_kebidanan"id="pf-mata-kebidanan-tidak" value="Normal" class="mr-1">Normal
                                                <input type="radio" name="pf_mata_kebidanan" id="pf-mata-kebidanan-ya"value="Abnormal" class="mr-1 ml-2">Abnormal
                                                <input type="text" name="ket_pf_mata_kebidanan" id="ket-pf-mata-kebidanan"class="custom-form clear-input col-lg-6 d-inline-block ml-4"placeholder="Keterangan">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Hidung</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="radio" name="pf_hidung_kebidanan"id="pf-hidung-kebidanan-tidak" value="Normal" class="mr-1">Normal
                                                <input type="radio" name="pf_hidung_kebidanan"id="pf-hidung-kebidanan-ya" value="Abnormal"class="mr-1 ml-2">Abnormal
                                                <input type="text" name="ket_pf_hidung_kebidanan"id="ket-pf-hidung-kebidanan" class="custom-form clear-input col-lg-6 d-inline-block ml-4"placeholder="Keterangan">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Gigi dan Mulut</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="radio" name="pf_gigi_mulut_kebidanan"id="pf-gigi-mulut-kebidanan-tidak" value="Normal"class="mr-1">Normal
                                                <input type="radio" name="pf_gigi_mulut_kebidanan"id="pf-gigi-mulut-kebidanan-ya" value="Abnormal"class="mr-1 ml-2">Abnormal
                                                <input type="text" name="ket_pf_gigi_mulut_kebidanan"id="ket-pf-gigi-mulut-kebidanan"class="custom-form clear-input col-lg-6 d-inline-block ml-4"placeholder="Keterangan">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Tenggorokan</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="radio" name="pf_tenggorokan_kebidanan"id="pf-tenggorokan-kebidanan-tidak" value="Normal"class="mr-1">Normal
                                                <input type="radio" name="pf_tenggorokan_kebidanan"id="pf-tenggorokan-kebidanan-ya" value="Abnormal"class="mr-1 ml-2">Abnormal
                                                <input type="text" name="ket_pf_tenggorokan_kebidanan"id="ket-pf-tenggorokan-kebidanan"class="custom-form clear-input col-lg-6 d-inline-block ml-4"placeholder="Keterangan">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Telinga</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="radio" name="pf_telinga_kebidanan"id="pf-telinga-kebidanan-tidak" value="Normal" class="mr-1">Normal
                                                <input type="radio" name="pf_telinga_kebidanan"id="pf-telinga-kebidanan-ya" value="Abnormal"class="mr-1 ml-2">Abnormal
                                                <input type="text" name="ket_pf_telinga_kebidanan"id="ket-pf-telinga-kebidanan"class="custom-form clear-input col-lg-6 d-inline-block ml-4"placeholder="Keterangan">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Leher</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="radio" name="pf_leher_kebidanan"id="pf-leher-kebidanan-tidak" value="Normal" class="mr-1">Normal
                                                <input type="radio" name="pf_leher_kebidanan" id="pf-leher-kebidanan-ya"value="Abnormal" class="mr-1 ml-2">Abnormal
                                                <input type="text" name="ket_pf_leher_kebidanan"id="ket-pf-leher-kebidanan"class="custom-form clear-input col-lg-6 d-inline-block ml-4"placeholder="Keterangan">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Thorax</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="radio" name="pf_thorax_kebidanan"id="pf-thorax-kebidanan-tidak" value="Normal" class="mr-1">Normal
                                                <input type="radio" name="pf_thorax_kebidanan"id="pf-thorax-kebidanan-ya" value="Abnormal"class="mr-1 ml-2">Abnormal
                                                <input type="text" name="ket_pf_thorax_kebidanan"id="ket-pf-thorax-kebidanan"class="custom-form clear-input col-lg-6 d-inline-block ml-4"placeholder="Keterangan">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Jantung</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="radio" name="pf_jantung_kebidanan"id="pf-jantung-kebidanan-tidak" value="Normal" class="mr-1">Normal
                                                <input type="radio" name="pf_jantung_kebidanan"id="pf-jantung-kebidanan-ya" value="Abnormal"class="mr-1 ml-2">Abnormal
                                                <input type="text" name="ket_pf_jantung_kebidanan"id="ket-pf-jantung-kebidanan"class="custom-form clear-input col-lg-6 d-inline-block ml-4"placeholder="Keterangan">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Paru</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="radio" name="pf_paru_kebidanan"id="pf-paru-kebidanan-tidak" value="Normal" class="mr-1">Normal
                                                <input type="radio" name="pf_paru_kebidanan" id="pf-paru-kebidanan-ya"value="Abnormal" class="mr-1 ml-2">Abnormal
                                                <input type="text" name="ket_pf_paru_kebidanan"id="ket-pf-paru-kebidanan"class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Abdomen</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="radio" name="pf_abdomen_kebidanan"id="pf-abdomen-kebidanan-tidak" value="Normal" class="mr-1">Normal
                                                <input type="radio" name="pf_abdomen_kebidanan"id="pf-abdomen-kebidanan-ya" value="Abnormal"class="mr-1 ml-2">Abnormal
                                                <input type="text" name="ket_pf_abdomen_kebidanan"id="ket-pf-abdomen-kebidanan"class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Genitalia dan Anus</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="radio" name="pf_genitalia_kebidanan"id="pf-genitalia-kebidanan-tidak" value="Normal" class="mr-1">Normal
                                                <input type="radio" name="pf_genitalia_kebidanan" id="pf-genitalia-kebidanan-ya" value="Abnormal"class="mr-1 ml-2">Abnormal
                                                <input type="text" name="ket_pf_genitalia_kebidanan"id="ket-pf-genitalia-kebidanan"class="custom-form clear-input col-lg-6 d-inline-block ml-4"placeholder="Keterangan">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Ekstermitas</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="radio" name="pf_ekstermitas_kebidanan"id="pf-ekstermitas-kebidanan-tidak" value="Normal"class="mr-1">Normal
                                                <input type="radio" name="pf_ekstermitas_kebidanan"id="pf-ekstermitas-kebidanan-ya" value="Abnormal"class="mr-1 ml-2">Abnormal
                                                <input type="text" name="ket_pf_ekstermitas_kebidanan"id="ket-pf-ekstermitas-kebidanan"class="custom-form clear-input col-lg-6 d-inline-block ml-4"placeholder="Keterangan">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Kulit</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="radio" name="pf_kulit_kebidanan"id="pf-kulit-kebidanan-tidak" value="Normal" class="mr-1">Normal
                                                <input type="radio" name="pf_kulit_kebidanan" id="pf-kulit-kebidanan-ya"value="Abnormal" class="mr-1 ml-2">Abnormal
                                                <input type="text" name="ket_pf_kulit_kebidanan" id="ket-pf-kulit-kebidanan"class="custom-form clear-input col-lg-6 d-inline-block ml-4"placeholder="Keterangan">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="bold td-dark">HASIL PEMERIKSAAN PENUNJANG</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Laboratorium</td>
                                            <td class="bold">:</td>
                                            <td><div id="hasil_laboratorium_bidan"></div></td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Radiologi</td>
                                            <td class="bold">:</td>
                                            <td><div id="hasil_radiologi_bidan"></div></td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Penunjang Lain</td>
                                            <td class="bold">:</td>
                                            <td><div id="hasil_penunjang_lain_bidan"></div></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="bold td-dark">DIAGNOSA AWAL</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><div id="diagnosa_awal_medis_bidan"></div></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="bold td-dark">TATA LAKSANA</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">1. Rencana Edukasi</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <textarea name="rd_bidan" id="rd-bidan" rows="4" class="form-control clear-input" placeholder="Rencana Edukasi"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">2. Rencana Pemeriksaan Penunjang</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <textarea name="rpp_bidan" id="rpp-bidan" rows="4" class="form-control clear-input" placeholder="Rencana Pemeriksaan Penunjang"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">3. Rencana Terapi</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <textarea name="rt_bidan" id="rt-bidan" rows="4" class="form-control clear-input" placeholder="Rencana Terapi"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">4. Rencana Konsultasi</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <textarea name="rk_bidan" id="rk-bidan" rows="4" class="form-control clear-input" placeholder="Rencana Konsultasi"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">5. Rencana Pulang <i><small>Discharge Planning</small></i></td>
                                            <td class="bold">:</td>
                                            <td>
                                                <b>Perkiraan Lama Rawat : </b><input type="text" name="rp_bidan_1" id="rk-bidan-1" class="custom-form col-lg-4 d-inline-block"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="checkbox" name="rp_bidan_2" id="rk-bidan-2" value="1" class="mr-1">
                                                <b class="ml-1">Sudah Bisa Ditetapkan : </b><input type="text" name="rp_bidan_3" id="rk-bidan-3" class="custom-form col-lg-2 d-inline-block">&nbsp;Hari
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold"></td>
                                            <td class="bold"></td>
                                            <td>
                                                <b>Belum Bisa Ditetapkan Karena : </b><input type="text" name="rp_bidan_4" id="rk-bidan-4" class="custom-form col-lg-4 d-inline-block">
                                                <b class="ml-5">Rencana Tanggal Pulang : </b><input type="text" name="rp_bidan_5" id="rk-bidan-5" class="custom-form col-lg-2 d-inline-block"placeholder="Masukan tanggal">
                                            </td>
                                        </tr>
                                    </table>


                                    <!-- <table class="table table-no-border table-sm table-striped">
                                        <tr>
                                            <td width="20%" class="bold">Waktu Pengkajian</td>
                                            <td width="1%" class="bold">:</td>
                                            <td width="79%">
                                                <input type="text" name="waktu_kajian_medis_bidan" id="waktu-kajian-medis-bidan" class="custom-form clear-input col-lg-2" value="<?= date('d/m/Y H:i') ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="td-dark"><b>ANAMNESIS</b></td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Keluhan Utama</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <textarea name="keluhan_utama_medis_bidan" id="keluhan-utama-medis-bidan" rows="4" class="form-control clear-input" placeholder="Keluhan Utama"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Riwayat Penyakit Sekarang</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <textarea name="rps_medis_bidan" id="rps-medis-bidan" rows="4" class="form-control clear-input" placeholder="Riwayat Penyakit Sekarang"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Riwayat Penyakit Dahulu</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <textarea name="rpd_medis_bidan" id="rpd-medis-bidan" rows="4" class="form-control clear-input" placeholder="Riwayat Penyakit Terdahulu"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Pengobatan</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <textarea name="pengobatan_medis_bidan" id="pengobatan-medis-bidan" rows="4" class="form-control clear-input" placeholder="Pengobatan"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Riwayat Alergi</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <textarea name="riwayat_alergi_bidan" id="riwayat-alergi-bidan" rows="4" class="form-control clear-input" placeholder="Riwayat Alergi"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Riwayat Penyakit Keluarga</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="radio" name="rpk_medis_bidan_1" id="rpk-medis-bidan-1" value="0" class="mr-1" checked>Tidak
                                                <input type="radio" name="rpk_medis_bidan_1" id="rpk-medis-bidan-2" value="1" class="mr-1 ml-2">Ya, 
                                                <input type="checkbox" name="rpk_medis_bidan_3" id="rpk-medis-bidan-3" value="1" class="mr-1 ml-4" disabled>Asma
                                                <input type="checkbox" name="rpk_medis_bidan_4" id="rpk-medis-bidan-4" value="1" class="mr-1 ml-2" disabled>DM
                                                <input type="checkbox" name="rpk_medis_bidan_5" id="rpk-medis-bidan-5" value="1" class="mr-1 ml-2" disabled>Cardiovascular
                                                <input type="checkbox" name="rpk_medis_bidan_6" id="rpk-medis-bidan-6" value="1" class="mr-1 ml-2" disabled>kanker
                                                <input type="checkbox" name="rpk_medis_bidan_7" id="rpk-medis-bidan-7" value="1" class="mr-1 ml-2" disabled>Thalasemia
                                                <input type="checkbox" name="rpk_medis_bidan_8" id="rpk-medis-bidan-8" value="1" class="mr-1 ml-2" disabled>lain
                                                <input type="text" name="rpk_medis_bidan_9" id="rpk-medis-bidan-9" class="custom-form clear-input col-lg-4 d-inline-block mr-2" placeholder="Masukkan lain - lain">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold" colspan="3">Riwayat Pekerjaan, Sosial Ekonomi, Kejiwaan dan Kebiasaan :</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><i>(termasuk riwayat perkawinan, obstetri, imunisasi tumbuh kembang)</i></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><div id="riwayat_field_bidan"></div></td>
                                        </tr>
                                        <tr>
                                            <td class="bold td-dark" colspan="3">PEMERIKSAAN FISIK</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Tekanan Darah</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="text" name="td_medis_bidan_1"id="td-medis-bidan-1"class="custom-form clear-input d-inline-block col-lg-1"
                                                    placeholder="Sistolik" onkeypress="return hanyaAngka(event)">
                                                <input type="text" name="td_medis_bidan_2"id="td-medis-bidan-2"class="custom-form clear-input d-inline-block col-lg-1"
                                                    placeholder="Diastolik" onkeypress="return hanyaAngka(event)"> MmHg
                                                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                                Suhu : <input type="text" name="td_medis_bidan_3"id="td-medis-bidan-3"class="custom-form clear-input d-inline-block col-lg-1"
                                                    placeholder="Suhu" onkeypress="return hanyaAngka(event)"> &#8451
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Frekuensi Nadi</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="text" name="td_medis_bidan_4"id="td-medis-bidan-4"class="custom-form clear-input d-inline-block col-lg-1"
                                                    placeholder="Diastolik" onkeypress="return hanyaAngka(event)"> x/mnt
                                                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;

                                                Frekuensi Nafas : <input type="text" name="td_medis_bidan_5"id="td-medis-bidan-5"class="custom-form clear-input d-inline-block col-lg-1"
                                                    placeholder="Suhu" onkeypress="return hanyaAngka(event)"> x/mnt
                                            </td>
                                        <tr>
                                        <tr>
                                            <td class="bold">Kesadaran</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="checkbox" name="kesadaran_medis_1" id="kesadaran-medis-1" value="1" class="mr-1">Composmentis
                                                <input type="checkbox" name="kesadaran_medis_2" id="kesadaran-medis-2" value="1" class="mr-1 ml-2">Apatis
                                                <input type="checkbox" name="kesadaran_medis_3" id="kesadaran-medis-3" value="1" class="mr-1 ml-2">Samnolen
                                                <input type="checkbox" name="kesadaran_medis_4" id="kesadaran-medis-4" value="1" class="mr-1 ml-2">Sopor
                                                <input type="checkbox" name="kesadaran_medis_5" id="kesadaran-medis-5" value="1" class="mr-1 ml-2">Koma
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Kepala</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="radio" name="pfm_kepala_1" id="pfm-kepala-1" value="1" class="mr-1">Normal
                                                <input type="radio" name="pfm_kepala_1" id="pfm-kepala-2" value="2" class="mr-1 ml-2">Abnormal
                                                <input type="text" name="pfm_kepala_3" id="pfm-kepala-3" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Mata</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="radio" name="pfm_kepala_4" id="pfm-kepala-4" value="1" class="mr-1">Normal
                                                <input type="radio" name="pfm_kepala_4" id="pfm-kepala-5" value="2" class="mr-1 ml-2">Abnormal
                                                <input type="text" name="pfm_kepala_6" id="pfm-kepala-6" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Hidung</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="radio" name="pfm_kepala_7" id="pfm-kepala-7" value="1" class="mr-1">Normal
                                                <input type="radio" name="pfm_kepala_7" id="pfm-kepala-8" value="2" class="mr-1 ml-2">Abnormal
                                                <input type="text" name="pfm_kepala_9" id="pfm-kepala-9" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Gigi dan Mulut</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="radio" name="pfm_kepala_10" id="pfm-kepala-10" value="1" class="mr-1">Normal
                                                <input type="radio" name="pfm_kepala_10" id="pfm-kepala-11" value="2" class="mr-1 ml-2">Abnormal
                                                <input type="text" name="pfm_kepala_12" id="pfm-kepala-12" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Tenggorokan</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="radio" name="pfm_kepala_13" id="pfm-kepala-13" value="1" class="mr-1">Normal
                                                <input type="radio" name="pfm_kepala_13" id="pfm-kepala-14" value="2" class="mr-1 ml-2">Abnormal
                                                <input type="text" name="pfm_kepala_15" id="pfm-kepala-15" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Telinga</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="radio" name="pfm_kepala_16" id="pfm-kepala-16" value="1" class="mr-1">Normal
                                                <input type="radio" name="pfm_kepala_16" id="pfm-kepala-17" value="2" class="mr-1 ml-2">Abnormal
                                                <input type="text" name="pfm_kepala_18" id="pfm-kepala-18" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Leher</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="radio" name="pfm_kepala_19" id="pfm-kepala-19" value="1" class="mr-1">Normal
                                                <input type="radio" name="pfm_kepala_19" id="pfm-kepala-20" value="2" class="mr-1 ml-2">Abnormal
                                                <input type="text" name="pfm_kepala_21" id="pfm-kepala-21" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Thorax</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="radio" name="pfm_kepala_22" id="pfm-kepala-22" value="1" class="mr-1">Normal
                                                <input type="radio" name="pfm_kepala_22" id="pfm-kepala-23" value="2" class="mr-1 ml-2">Abnormal
                                                <input type="text" name="pfm_kepala_24" id="pfm-kepala-24" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Jantung</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="radio" name="pfm_kepala_25" id="pfm-kepala-25" value="1" class="mr-1">Normal
                                                <input type="radio" name="pfm_kepala_25" id="pfm-kepala-26" value="2" class="mr-1 ml-2">Abnormal
                                                <input type="text" name="pfm_kepala_27" id="pfm-kepala-27" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Paru</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="radio" name="pfm_kepala_28" id="pfm-kepala-28" value="1" class="mr-1">Normal
                                                <input type="radio" name="pfm_kepala_28" id="pfm-kepala-29" value="2" class="mr-1 ml-2">Abnormal
                                                <input type="text" name="pfm_kepala_30" id="pfm-kepala-30" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Abdomen</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="radio" name="pfm_kepala_31" id="pfm-kepala-31" value="1" class="mr-1">Normal
                                                <input type="radio" name="pfm_kepala_31" id="pfm-kepala-32" value="2" class="mr-1 ml-2">Abnormal
                                                <input type="text" name="pfm_kepala_33" id="pfm-kepala-33" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Genitalia dan Anus</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="radio" name="pfm_kepala_34" id="pfm-kepala-34" value="1" class="mr-1">Normal
                                                <input type="radio" name="pfm_kepala_34" id="pfm-kepala-35" value="2" class="mr-1 ml-2">Abnormal
                                                <input type="text" name="pfm_kepala_36" id="pfm-kepala-36" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Ekstermitas</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="radio" name="pfm_kepala_37" id="pfm-kepala-37" value="1" class="mr-1">Normal
                                                <input type="radio" name="pfm_kepala_37" id="pfm-kepala-38" value="2" class="mr-1 ml-2">Abnormal
                                                <input type="text" name="pfm_kepala_39" id="pfm-kepala-39" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Kulit</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <input type="radio" name="pfm_kepala_40" id="pfm-kepala-40" value="1" class="mr-1">Normal
                                                <input type="radio" name="pfm_kepala_40" id="pfm-kepala-41" value="2" class="mr-1 ml-2">Abnormal
                                                <input type="text" name="pfm_kepala_42" id="pfm-kepala-42" class="custom-form clear-input col-lg-6 d-inline-block ml-4" placeholder="Keterangan">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="3" class="bold td-dark">HASIL PEMERIKSAAN PENUNJANG</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Laboratorium</td>
                                            <td class="bold">:</td>
                                            <td><div id="hasil_laboratorium_bidan"></div></td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Radiologi</td>
                                            <td class="bold">:</td>
                                            <td><div id="hasil_radiologi_bidan"></div></td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Penunjang Lain</td>
                                            <td class="bold">:</td>
                                            <td><div id="hasil_penunjang_lain_bidan"></div></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="bold td-dark">DIAGNOSA AWAL</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><div id="diagnosa_awal_medis_bidan"></div></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="bold td-dark">TATA LAKSANA</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">1. Rencana Edukasi</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <textarea name="rd_bidan" id="rd-bidan" rows="4" class="form-control clear-input" placeholder="Rencana Edukasi"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">2. Rencana Pemeriksaan Penunjang</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <textarea name="rpp_bidan" id="rpp-bidan" rows="4" class="form-control clear-input" placeholder="Rencana Pemeriksaan Penunjang"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">3. Rencana Terapi</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <textarea name="rt_bidan" id="rt-bidan" rows="4" class="form-control clear-input" placeholder="Rencana Terapi"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">4. Rencana Konsultasi</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <textarea name="rk_bidan" id="rk-bidan" rows="4" class="form-control clear-input" placeholder="Rencana Konsultasi"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">5. Rencana Pulang <i><small>Discharge Planning</small></i></td>
                                            <td class="bold">:</td>
                                            <td>
                                                <b>Perkiraan Lama Rawat : </b><input type="text" name="rp_bidan_1" id="rk-bidan-1" class="custom-form col-lg-4 d-inline-block"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="checkbox" name="rp_bidan_2" id="rk-bidan-2" value="1" class="mr-1">
                                                <b class="ml-1">Sudah Bisa Ditetapkan : </b><input type="text" name="rp_bidan_3" id="rk-bidan-3" class="custom-form col-lg-2 d-inline-block">&nbsp;Hari
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold"></td>
                                            <td class="bold"></td>
                                            <td>
                                                <b>Belum Bisa Ditetapkan Karena : </b><input type="text" name="rp_bidan_4" id="rk-bidan-4" class="custom-form col-lg-4 d-inline-block">
                                                <b class="ml-5">Rencana Tanggal Pulang : </b><input type="text" name="rp_bidan_5" id="rk-bidan-5" class="custom-form col-lg-2 d-inline-block"placeholder="Masukan tanggal">
                                            </td>
                                        </tr>
                                    </table> -->


                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                        <tr>
                                            <td colspan="2" class="center td-dark"></td>
                                        </tr>
                                        <tr>
                                            <td width="50%">
                                                Tanggal & Jam <input type="text" name="tgl_medis_dpjp" id="tgl-medis-dpjp" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="dd/mm/yyyy hh:ii">
                                            </td>
                                            <td width="50%">
                                                Tanggal & Jam <input type="text" name="tgl_medis_dokter" id="tgl-medis-dokter" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="dd/mm/yyyy hh:ii">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>DPJP <input type="text" name="ttd_medis_dpjp" id="ttd-medis-dpjp" class="select2c-input ml-2"></td>
                                            <td>Dokter Pengkajian <input type="text" name="ttd_medis_dokter" id="ttd-medis-dokter" class="select2c-input ml-2"></td>
                                        </tr>
                                        <tr>
                                            <td class="center">
                                                Tanda Tangan DPJP	
                                            </td>
                                            <td class="center">
                                                Tanda Tangan Dokter Yang Melakukan Pengkajian
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="center">
                                                    <input type="checkbox" name="ceklis_dpjp" id="ceklis-dpjp" value="1" class="custom-form col-lg-1 mx-auto">
                                                    <?= digitalSignature('ceklis_dpjp_verified') ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="center">
                                                    <input type="checkbox" name="ceklis_dokter" id="ceklis-dokter" value="1" class="custom-form col-lg-1 mx-auto">
                                                    <?= digitalSignature('ceklis_dokter_verified') ?>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                        class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info"
                    onclick="konfirmasiSimpanPengkajianAwalKebidananDanKandungan()" id="btn-simpan"><i
                        class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL LOG HISTORY KEBIDANAN AWAL-->
<div class="modal fade" id="modal_history_logs_kebidanan" tabindex="-1">
    <div class="modal-dialog" style="max-width:90%">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">History Logs Pengkajian Awal Pasien Kebidanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <h6><b>Kajian Medis <i>(Dokter)</i></b></h6>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover color-table info-table"id="table_kajian_medis_kebidanan">
                                <thead>
                                    <tr>
                                        <th class="nowrap">No.</th>
                                        <th class="nowrap">Tgl Ubah</th>
                                        <th class="nowrap">User</th>
                                        <th class="nowrap">Keluhan Utama</th>
                                        <th class="nowrap">Riwayat Penyakit Sekarang</th>
                                        <th class="nowrap">Riwayat Penyakit Terdahulu</th>
                                        <th class="nowrap">Pengobatan</th>
                                        <th class="nowrap">Riwayat Alergi</th>
                                        <th class="nowrap">Hasil Laboratorium</th>
                                        <th class="nowrap">Hasil Radiologi</th>
                                        <th class="nowrap">Hasil Penunjang Lain</th>
                                        <th class="nowrap">Diagnosa Awal</th>
                                        <th class="nowrap">Rencana Edukasi</th>
                                        <th class="nowrap">Rencana Pemeriksaan Penunjang</th>
                                        <th class="nowrap">Rencana Terapi</th>
                                        <th class="nowrap">Rencana Konsultasi</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                        class="fas fa-times-circle mr-1"></i>Keluar</button>
            </div>
        </div>
    </div>
</div>
<!-- MODAL LOG HISTORY KEBIDANAN AKHIR-->