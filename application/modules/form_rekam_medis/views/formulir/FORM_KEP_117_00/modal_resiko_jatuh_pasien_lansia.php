<!-- Modal Entri Keperawatan -->
<div class="modal fade" id="modal_entri_keperawatan_rm" role="dialog" data-backdrop="static" aria-labelledby="modal-resume-keperawatan-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold" id="modal_entri_keperawatan_rm">PENGKAJIAN ULANG DAN PEMANTAUAN RISIKO JATUH PASIEN LANSIA</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_entri_keperawatan_lansia class="form-horizontal"') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="ek_id_layanan_pendaftaran">
                <input type="hidden" name="id_pendaftaran" id="ek-id-pendaftaran">
                <input type="hidden" name="id_bed" id="ek-id-bed">
                <input type="hidden" name="ek_id_pasien" id="ek_id_pasien">
                <input type="hidden" name="ek_jenis_layanan" value="Rawat Inap" id="ek-jenis-layanan">
				<input type="hidden" name="action" id="action">

                <input type="hidden" name="id_users" id="ek-id-users" <?php $nama = $this->session->userdata('nama'); $nama_js = json_encode($nama); ?> value=<?php echo $nama_js; ?>>

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
                <!-- end header -->

                <!-- content -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-body">
                            <div class="form-resiko-jatuh-pasien">
                                <table class="table table-no-border table-sm table-striped">
                                    <tr>
                                        <td colspan="3">
                                            <button class="btn btn-info btn-xs mr-1 float-left" type="button" id="pur-btn-expand-all"><i class="fas fa-fw fa-expand mr-1"></i>Expand All</button>
                                            <button class="btn btn-warning btn-xs mr-1 float-left" type="button" id="pur-btn-collapse-all"><i class="fas fa-fw fa-compress mr-1"></i>Collapse All</button>
                                        </td>
                                    </tr>
                                </table>

                                <!--PENGKAJIAN ULANG RISIKO JATUH PASIEN LANSIA-->
                                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                    <tr>
                                        <td colspan="3" class="center bold td-dark">
                                            <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-pengkajian-ulang-risiko-jatuh-pasien-lansia"><i class="fas fa-expand mr-1"></i>Expand
                                            </button>
                                            PENGKAJIAN ULANG RISIKO JATUH PASIEN LANSIA
                                        </td>
                                    </tr>
                                </table>

                                <div class="collapse multi-collapse mt-2" id="data-pengkajian-ulang-risiko-jatuh-pasien-lansia">
                                    <div class="col-lg">
                                        <div id="buka-tutup-purjpl">
                                        </div>
                                        <div class="card">
                                            <table class="table table-sm table-striped table-bordered" id="tabel-purjpl">
                                                <thead style="background-color: #B0C4DE;">
                                                    <tr>
                                                        <th class="center"><b>No</b></th>
                                                        <th class="center"><b>Tanggal</b></th>
                                                        <th class="center"><b>paraf</b></th>
                                                        <th class="center"><b>Nama Perawat</b></th>
                                                        <th class="center"><b>Jumlah Skor</b></th>
                                                        <th class="center"><b>Petugas</b></th>
                                                        <th class="center"><b>Alat</b></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card">
                                            <table class="table table-sm table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2"><b>Keterangan :</b></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 10%">0-5</td>
                                                        <td style="width: 90%"> Risiko rendah</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 10%">6-16</td>
                                                        <td style="width: 90%"> Risiko sedang</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 10%">17-30</td>
                                                        <td style="width: 90%"> Risiko tinggi</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">
                                                            * Pasien Risiko jatuh rendah/sedang <b>tidak perlu pengkajian ulang</b> kecuali ada perubahan kondisi :
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">
                                                        &nbsp;&nbsp;&nbsp;penurunan kesadaran, post operasi, minum obat berefek
                                                            sedasi, transfer ke unit lain atau pasien mengalami jatuh saat dirawat di RS.
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                                <!--END PENGKAJIAN ULANG RISIKO JATUH PASIEN LANSIA-->

                                <!--UPAYA PENCEGAHAN RISIKO JATUH PASIEN LANSIA-->
                                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                    <tr>
                                        <td colspan="3" class="center bold td-dark">
                                            <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-upaya-pencegahan-risiko-jatuh-pasien-lansia"><i class="fas fa-expand mr-1"></i>Expand
                                            </button>
                                            UPAYA PENCEGAHAN RISIKO JATUH PASIEN LANSIA
                                        </td>
                                    </tr>
                                </table>

                                <div class="collapse multi-collapse mt-2" id="data-upaya-pencegahan-risiko-jatuh-pasien-lansia">
                                    <div class="col-lg">
                                        <div id="buka-tutup-uprjpl">
                                        </div>
                                        <div class="card">
                                            <!-- <table class="table table-no-border table-sm table-striped" id="tabel-uprjpl">
                                                <thead> -->
                                            <table class="table table-sm table-striped table-bordered" id="tabel-uprjpl">
                                                <thead style="background-color: #B0C4DE;">
                                                    <tr>
                                                        <th class="center"><b>No</b></th>
                                                        <th class="center"><b>Tanggal</b></th>
                                                        <th class="center"><b>Nama Perawat Pagi</b></th>
                                                        <th class="center"><b>Nama Perawat Siang</b></th>
                                                        <th class="center"><b>Nama Perawat Malam</b></th>
                                                        <th class="center"><b>Petugas</b></th>
                                                        <th class="center" colspan="2"><b>Alat</b></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="body-table">

                                                </tbody>
                                            </table>
                                            <table class="table table-no-border table-sm table-striped" style="margin-top:15px">
                                                <tr>
                                                    <td>
                                                        <span> Catatan : Untuk Resiko Sedang jatuh (6-16) Lakukan juga pedoman pencegahan untuk resiko rendah</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            Untuk Resiko Tinggi jatuh (17-30) Lakukan semua pedoman pencegahan untuk resiko jatuh</span>
                                                    </td>
                                                </tr>
                                            </table>
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
                <button id="btn-simpan" type="button" class="btn btn-info" onclick="konfirmasiSimpanEntriLansia()"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
            </div>
        </div>
    </div>
</div>




<!-- Modal Edit Pengkajian Ulang Risiko Jatuh Pasien Lansia -->
<div id="modal-edit-pengkajian-ulang-risiko-jatuh-pasien-lansia" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 75%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Pengkajian Ulang Risiko Jatuh Pasien Lansia</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-edit-pengkajian-ulang-risiko-jatuh-pasien-lansia'); ?>
                <input type="hidden" name="id" id="id-pengkajian-ulang-risiko-jatuh-pasien-lansia">
                <table class="table table-no-border table-sm table-striped">
                    <tr>
                        <td>
                            Tanggal Pengkajian
                        </td>
                        <td>
                            :
                        </td>
                        <td>
                            <input type="text" name="purjpl_tanggal_pengkajian" id="purjpl-edit-tanggal-pengkajian" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="dd/mm/yyyy">
                        </td>
                    </tr>
                </table>
                <hr>
                <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-purjpl">
                    <thead>
                        <tr>
                            <th width="5%" class="center">no</th>
                            <th width="15%" class="center"><b>Parameter</b></th>
                            <th width="60%" class="center"><b>Skrining</b></th>
                            <th width="10%" class="center"><b>Jawaban</b></th>
                            <th width="10%" class="center"><b>Skor</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="center" rowspan="2">1</td>
                            <td rowspan="2"><input type="hidden" id="purjpl-edit-riwayat-jatuh">Riwayat Jatuh</td>
                            <td>
                                <input type="hidden" id="purjpl-edit-pasien-datang-karena-jatuh">Apakah pasien datang ke
                                RS karena jatuh?
                            </td>
                            <td class="center">
                                <input type="radio" name="purjpl_pasien_datang_karena_jatuh" id="purjpl-edit-pasien-datang-karena-jatuht-1" value="6" class="mr-1" onchange="calcscorepurjpl()">
                                Ya
                                <input type="radio" name="purjpl_pasien_datang_karena_jatuh" id="purjpl-edit-pasien-datang-karena-jatuht-2" value="0" class="mr-1" onchange="calcscorepurjpl()">
                                Tidak
                            </td>
                            <td rowspan="2">
                                Salah satu jawaban ya = 6
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="hidden" id="purjpl-edit-jatuh-2-bulan-terakhir">Jika tidak, apakah pasien
                                mengalami jatuh dalam 2 bulan terakhir?
                            </td>
                            <td class="center">
                                <input type="radio" name="purjpl_jatuh_2_bulan_terakhir" id="purjpl-edit-jatuh-2-bulan-terakhir-1" value="6" class="mr-1" onchange="calcscorepurjpl()">
                                Ya
                                <input type="radio" name="purjpl_jatuh_2_bulan_terakhir" id="purjpl-edit-jatuh-2-bulan-terakhir-2" value="0" class="mr-1" onchange="calcscorepurjpl()">
                                Tidak
                            </td>
                        </tr>
                        <tr>
                            <td class="center" rowspan="3">2</td>
                            <td rowspan="3"><input type="hidden" id="purjpl-edit-mental">Status Mental</td>
                            <td>
                                <input type="hidden" id="purjpl-edit-pasien-delirium">Apakah pasien delirium? (Tidak
                                dapat membuat keputusan, pola pikir tidak terorganisir, gangguan daya ingat)
                            </td>
                            <td class="center">
                                <input type="radio" name="purjpl_pasien_delirium" id="purjpl-edit-pasien-delirium-1" value="14" class="mr-1" onchange="calcscorepurjpl()">
                                Ya
                                <input type="radio" name="purjpl_pasien_delirium" id="purjpl-edit-pasien-delirium-2" value="0" class="mr-1" onchange="calcscorepurjpl()">
                                Tidak
                            </td>
                            <td rowspan="3">
                                Salah satu jawaban ya = 14
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="hidden" id="purjpl-edit-pasien-disorientasi">Apakah pasien disorientasi?
                                (salah menyebutkan waktu, tempat atau orang)
                            </td>
                            <td class="center">
                                <input type="radio" name="purjpl_pasien_disorientasi" id="purjpl-edit-pasien-disorientasi-1" value="14" class="mr-1" onchange="calcscorepurjpl()">
                                Ya
                                <input type="radio" name="purjpl_pasien_disorientasi" id="purjpl-edit-pasien-disorientasi-2" value="0" class="mr-1" onchange="calcscorepurjpl()">
                                Tidak
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="hidden" id="purjpl-edit-pasien-agitasi">Apakah pasien mengalami agitasi?
                                (ketakutan, gelisah, dan cemas)
                            </td>
                            <td class="center">
                                <input type="radio" name="purjpl_pasien_agitasi" id="purjpl-edit-pasien-agitasi-1" value="14" class="mr-1" onchange="calcscorepurjpl()">
                                Ya
                                <input type="radio" name="purjpl_pasien_agitasi" id="purjpl-edit-pasien-agitasi-2" value="0" class="mr-1" onchange="calcscorepurjpl()">
                                Tidak
                            </td>
                        </tr>
                        <tr>
                            <td class="center" rowspan="3">3</td>
                            <td rowspan="3"><input type="hidden" id="purjpl-edit-penglihatan">Penglihatan</td>
                            <td>
                                <input type="hidden" id="purjpl-edit-pasien-kacamata">Apakah pasien memakai kacamata?
                            </td>
                            <td class="center">
                                <input type="radio" name="purjpl_pasien_kacamata" id="purjpl-edit-pasien-kacamata-1" value="1" class="mr-1" onchange="calcscorepurjpl()">
                                Ya
                                <input type="radio" name="purjpl_pasien_kacamata" id="purjpl-edit-pasien-kacamata-2" value="0" class="mr-1" onchange="calcscorepurjpl()">
                                Tidak
                            </td>
                            <td rowspan="3">
                                Salah satu jawaban ya = 1
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="hidden" id="purjpl-edit-pasien-buram">Apakah pasien mengeluh adanya
                                penglihatan buram?
                            </td>
                            <td class="center">
                                <input type="radio" name="purjpl_pasien_buram" id="purjpl-edit-pasien-buram-1" value="1" class="mr-1" onchange="calcscorepurjpl()">
                                Ya
                                <input type="radio" name="purjpl_pasien_buram" id="purjpl-edit-pasien-buram-2" value="0" class="mr-1" onchange="calcscorepurjpl()">
                                Tidak
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="hidden" id="purjpl-edit-pasien-glaukoma">Apakah pasien mempunyai glaukoma?
                                Katarak / degenerasi makula?
                            </td>
                            <td class="center">
                                <input type="radio" name="purjpl_pasien_glaukoma" id="purjpl-edit-pasien-glaukoma-1" value="1" class="mr-1" onchange="calcscorepurjpl()">
                                Ya
                                <input type="radio" name="purjpl_pasien_glaukoma" id="purjpl-edit-pasien-glaukoma-2" value="0" class="mr-1" onchange="calcscorepurjpl()">
                                Tidak
                            </td>
                        </tr>
                        <tr>
                            <td class="center">4</td>
                            <td><input type="hidden" id="purjpl-edit-berkemih">Kebiasaan Berkemih</td>
                            <td>
                                <input type="hidden" id="purjpl-edit-pasien-berkemih">Apakah terdapat perunbahan
                                perilaku berkemih? (frekuensi, urgensi, inkontinensia, nokturia)
                            </td>
                            <td class="center">
                                <input type="radio" name="purjpl_pasien_berkemih" id="purjpl-edit-pasien-berkemih-1" value="2" class="mr-1" onchange="calcscorepurjpl()">
                                Ya
                                <input type="radio" name="purjpl_pasien_berkemih" id="purjpl-edit-pasien-berkemih-2" value="0" class="mr-1" onchange="calcscorepurjpl()">
                                Tidak
                            </td>
                            <td>
                                Salah satu jawaban ya = 2
                            </td>
                        </tr>
                        <tr>
                            <td class="center" rowspan="4">5</td>
                            <td rowspan="4"><input type="hidden" id="purjpl-edit-transfer">Transfer (dari tempat tidur
                                ke kursi dan kembali lagi ketempat tidur)</td>
                            <td>
                                <input type="hidden" id="purjpl-edit-pasien-mandirit">Mandiri (boleh memakai alat bantu jalan)
                            </td>
                            <td class="center">
                                <input type="radio" name="purjpl_pasien_mandirit" id="purjpl-edit-pasien-mandirit-0" value="0" class="mr-1" onchange="calcscorepurjpl()">
                                0
                            </td>
                            <td rowspan="8">
                                <div style="display: flex;flex-direction: column;">
                                    Jumlah nilai transfer dan mobilitas jika
                                    <span>nilai total 0 - 3 = 0</span>
                                    <span>nilai total 4 - 6 = 7</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Memerlukan sedikit bantuan (1 orang) / dalam pengawasan
                            </td>
                            <td class="center">
                                <input type="radio" name="purjpl_pasien_mandirit" id="purjpl-edit-pasien-mandirit-1" value="1" class="mr-1" onchange="calcscorepurjpl()">
                                1
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Memerlukan bantuan yang nyata (2 orang)
                            </td>
                            <td class="center">
                                <input type="radio" name="purjpl_pasien_mandirit" id="purjpl-edit-pasien-mandirit-2" value="2" class="mr-1" onchange="calcscorepurjpl()">
                                2
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tidak dapat duduk dengan seimbang, perlu bantuan total
                            </td>
                            <td class="center">
                                <input type="radio" name="purjpl_pasien_mandirit" id="purjpl-edit-pasien-mandirit-3" value="3" class="mr-1" onchange="calcscorepurjpl()">
                                3
                            </td>
                        </tr>
                        <tr>
                            <td class="center" rowspan="4">6</td>
                            <td rowspan="4">Mobilitas</td>
                            <td>
                                <input type="hidden" id="purjpl-pasien-m-mandiri">Mandiri (boleh memakai alat bantu jalan)
                            </td>
                            <td class="center">
                                <input type="radio" name="purjpl_pasien_m_mandiri" id="purjpl-edit-pasien-m-mandiri-0" value="0" class="mr-1" onchange="calcscorepurjpl()">
                                0
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Memerlukan sedikit bantuan 1 orang (verbal/fisik)
                            </td>
                            <td class="center">
                                <input type="radio" name="purjpl_pasien_m_mandiri" id="purjpl-edit-pasien-m-mandiri-1" value="1" class="mr-1" onchange="calcscorepurjpl()">
                                1
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Menggunakan kursi roda
                            </td>
                            <td class="center">
                                <input type="radio" name="purjpl_pasien_m_mandiri" id="purjpl-edit-pasien-m-mandiri-2" value="2" class="mr-1" onchange="calcscorepurjpl()">
                                2
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Imobilisasi
                            </td>
                            <td class="center">
                                <input type="radio" name="purjpl_pasien_m_mandiri" id="purjpl-edit-pasien-m-mandiri-3" value="3" class="mr-1" onchange="calcscorepurjpl()">
                                3
                            </td>
                        </tr>


                        <tr>
                            <td colspan="3" class="bold">JUMLAH SKOR</td>
                            <td colspan="2" class="center"><input type="number" min="0" name="purjpl_jumlah_skor" id="purjpl-edit-jumlah-skor" class="custom-form clear-input center" placeholder="Jumlah" value="0" readonly></td>
                        </tr>
                        <tr>
                            <td class="bold">Paraf</td>
                            <td colspan="2"><input type="checkbox" name="purjpl_paraf" id="purjpl-edit-paraf" aria-label="Checkbox for paraf" /></td>
                        </tr>
                        <tr>
                            <td class="bold">Perawat</td>
                            <td colspan="5">
                                <div class="input-group">
                                    <input type="text" name="purjpl_perawat" id="purjpl-edit-perawat" class="select2c-input ml-2">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer" id="update-purjpl">
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Edit Pengkajian Ulang Risiko Jatuh Pasien Lansia -->


<!-- Modal Edit Upaya Pencegahan Risiko Jatuh Pasien Lansia -->
<div id="modal-edit-upaya-pencegahan-risiko-jatuh-pasien-lansia" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Upaya Pencegahan Risiko Jatuh Pasien Lansia</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-edit-upaya-pencegahan-risiko-jatuh-pasien-lansia'); ?>
                <input type="hidden" name="id" id="id-upaya-pencegahan-risiko-jatuh-pasien-lansia">
                <div class="from-group">
                    <label for="uprjpl-tanggal-pengkajian">Tanggal Tindakan Pencegahan : </label>
                    <input type="text" name="uprjpl_tanggal_pengkajian" id="uprjpl-edit-tanggal-pengkajian" class="custom-form clear-input d-inline-block col-lg-3 ml-2" placeholder="dd/mm/yyyy">
                </div>
                <hr>
                <hr>
                <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-uprjpl">
                    <thead>
                        <tr>
                            <th class="center" rowspan="2"><b>Tindakan Pencegahan</b></th>
                            <th class="center" colspan="2">Pagi</th>
                            <th class="center" colspan="2">Siang</th>
                            <th class="center" colspan="3">Malam</th>
                        </tr>
                        <tr>
                            <th class="center">Hand Over</th>
                            <th class="center">Jam 10</th>
                            <th class="center">Hand Over</th>
                            <th class="center">Jam 18</th>
                            <th class="center">Hand Over</th>
                            <th class="center">Jam 23</th>
                            <th class="center">Jam 4</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="8" class="bold text-uppercase">Risiko Rendah/Sedang</td>
                        </tr>
                        <tr>
                            <td>Bel berfungsi dan mudah dijangkau</td>
                            <td class="center"><input type="checkbox" name="uprjpl_bel_p_ho" id="uprjpl-edit-bel-p-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="uprjpl_bel_p_10" id="uprjpl-edit-bel-p-10">
                            </td>
                            <td class="center"><input type="checkbox" name="uprjpl_bel_s_ho" id="uprjpl-edit-bel-s-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="uprjpl_bel_s_18" id="uprjpl-edit-bel-s-18">
                            </td>
                            <td class="center"><input type="checkbox" name="uprjpl_bel_m_ho" id="uprjpl-edit-bel-m-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="uprjpl_bel_m_23" id="uprjpl-edit-bel-m-23">
                            </td>
                            <td class="center"><input type="checkbox" name="uprjpl_bel_m_4" id="uprjpl-edit-bel-m-4">
                            </td>
                        </tr>
                        <tr>
                            <td>Roda tempat tidur terkunci</td>
                            <td class="center"><input type="checkbox" name="uprjpl_roda_p_ho" id="uprjpl-edit-roda-p-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_roda_p_10" id="uprjpl-edit-roda-p-10"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_roda_s_ho" id="uprjpl-edit-roda-s-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_roda_s_18" id="uprjpl-edit-roda-s-18"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_roda_m_ho" id="uprjpl-edit-roda-m-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_roda_m_23" id="uprjpl-edit-roda-m-23"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_roda_m_4" id="uprjpl-edit-roda-m-4">
                            </td>
                        </tr>
                        <tr>
                            <td>Posisikan tempat tidur pada posisi terendah</td>
                            <td class="center"><input type="checkbox" name="uprjpl_ptt_p_ho" id="uprjpl-edit-ptt-p-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="uprjpl_ptt_p_10" id="uprjpl-edit-ptt-p-10">
                            </td>
                            <td class="center"><input type="checkbox" name="uprjpl_ptt_s_ho" id="uprjpl-edit-ptt-s-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="uprjpl_ptt_s_18" id="uprjpl-edit-ptt-s-18">
                            </td>
                            <td class="center"><input type="checkbox" name="uprjpl_ptt_m_ho" id="uprjpl-edit-ptt-m-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="uprjpl_ptt_m_23" id="uprjpl-edit-ptt-m-23">
                            </td>
                            <td class="center"><input type="checkbox" name="uprjpl_ptt_m_4" id="uprjpl-edit-ptt-m-4">
                            </td>
                        </tr>
                        <tr>
                            <td>Pagar pengaman tempat tidur dinaikan</td>
                            <td class="center"><input type="checkbox" name="uprjpl_ppt_p_ho" id="uprjpl-edit-ppt-p-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="uprjpl_ppt_p_10" id="uprjpl-edit-ppt-p-10">
                            </td>
                            <td class="center"><input type="checkbox" name="uprjpl_ppt_s_ho" id="uprjpl-edit-ppt-s-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="uprjpl_ppt_s_18" id="uprjpl-edit-ppt-s-18">
                            </td>
                            <td class="center"><input type="checkbox" name="uprjpl_ppt_m_ho" id="uprjpl-edit-ppt-m-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="uprjpl_ppt_m_23" id="uprjpl-edit-ppt-m-23">
                            </td>
                            <td class="center"><input type="checkbox" name="uprjpl_ppt_m_4" id="uprjpl-edit-ppt-m-4">
                            </td>
                        </tr>
                        <tr>
                            <td>Penerangan cukup</td>
                            <td class="center"><input type="checkbox" name="uprjpl_penerangan_p_ho" id="uprjpl-edit-penerangan-p-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_penerangan_p_10" id="uprjpl-edit-penerangan-p-10"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_penerangan_s_ho" id="uprjpl-edit-penerangan-s-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_penerangan_s_18" id="uprjpl-edit-penerangan-s-18"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_penerangan_m_ho" id="uprjpl-edit-penerangan-m-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_penerangan_m_23" id="uprjpl-edit-penerangan-m-23"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_penerangan_m_4" id="uprjpl-edit-penerangan-m-4"></td>
                        </tr>
                        <tr>
                            <td>Pastikan alas kaki yang tidak licin untuk pasien yang dapat berjalan</td>
                            <td class="center"><input type="checkbox" name="uprjpl_alas_p_ho" id="uprjpl-edit-alas-p-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_alas_p_10" id="uprjpl-edit-alas-p-10"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_alas_s_ho" id="uprjpl-edit-alas-s-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_alas_s_18" id="uprjpl-edit-alas-s-18"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_alas_m_ho" id="uprjpl-edit-alas-m-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_alas_m_23" id="uprjpl-edit-alas-m-23"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_alas_m_4" id="uprjpl-edit-alas-m-4">
                            </td>
                        </tr>
                        <tr>
                            <td>Lantai kering dan tidak licin</td>
                            <td class="center"><input type="checkbox" name="uprjpl_lantai_p_ho" id="uprjpl-edit-lantai-p-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_lantai_p_10" id="uprjpl-edit-lantai-p-10"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_lantai_s_ho" id="uprjpl-edit-lantai-s-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_lantai_s_18" id="uprjpl-edit-lantai-s-18"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_lantai_m_ho" id="uprjpl-edit-lantai-m-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_lantai_m_23" id="uprjpl-edit-lantai-m-23"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_lantai_m_4" id="uprjpl-edit-lantai-m-4"></td>
                        </tr>
                        <tr>
                            <td colspan="8" class="bold text-uppercase">Risiko Sedang</td>
                        </tr>
                        <tr>
                            <td>Dekatkan alat-alat pasien</td>
                            <td class="center"><input type="checkbox" name="uprjpl_alat_p_ho" id="uprjpl-edit-alat-p-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_alat_p_10" id="uprjpl-edit-alat-p-10"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_alat_s_ho" id="uprjpl-edit-alat-s-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_alat_s_18" id="uprjpl-edit-alat-s-18"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_alat_m_ho" id="uprjpl-edit-alat-m-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_alat_m_23" id="uprjpl-edit-alat-m-23"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_alat_m_4" id="uprjpl-edit-alat-m-4">
                            </td>
                        </tr>
                        <tr>
                            <td>Edukasi pasien tentang efek samping obat yang diberikan</td>
                            <td class="center"><input type="checkbox" name="uprjpl_edukasi_p_ho" id="uprjpl-edit-edukasi-p-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_edukasi_p_10" id="uprjpl-edit-edukasi-p-10"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_edukasi_s_ho" id="uprjpl-edit-edukasi-s-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_edukasi_s_18" id="uprjpl-edit-edukasi-s-18"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_edukasi_m_ho" id="uprjpl-edit-edukasi-m-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_edukasi_m_23" id="uprjpl-edit-edukasi-m-23"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_edukasi_m_4" id="uprjpl-edit-edukasi-m-4"></td>
                        </tr>
                        <tr>
                            <td>Tidak meninggalkan pasien di kamar mandi saat menggunakan commode</td>
                            <td class="center"><input type="checkbox" name="uprjpl_commode_p_ho" id="uprjpl-edit-commode-p-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_commode_p_10" id="uprjpl-edit-commode-p-10"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_commode_s_ho" id="uprjpl-edit-commode-s-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_commode_s_18" id="uprjpl-edit-commode-s-18"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_commode_m_ho" id="uprjpl-edit-commode-m-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_commode_m_23" id="uprjpl-edit-commode-m-23"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_commode_m_4" id="uprjpl-edit-commode-m-4"></td>
                        </tr>
                        <tr>
                            <td colspan="8" class="bold text-uppercase">Risiko Tinggi</td>
                        </tr>
                        <tr>
                            <td>Pasang gelang khusus (Warna Kuning)</td>
                            <td class="center"><input type="checkbox" name="uprjpl_gelang_p_ho" id="uprjpl-edit-gelang-p-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_gelang_p_10" id="uprjpl-edit-gelang-p-10"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_gelang_s_ho" id="uprjpl-edit-gelang-s-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_gelang_s_18" id="uprjpl-edit-gelang-s-18"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_gelang_m_ho" id="uprjpl-edit-gelang-m-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_gelang_m_23" id="uprjpl-edit-gelang-m-23"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_gelang_m_4" id="uprjpl-edit-gelang-m-4"></td>
                        </tr>
                        <tr>
                            <td>Tempatkan pasien di kamar yang paling dekat dengan Nurse Station (jika memungkinkan)
                            </td>
                            <td class="center"><input type="checkbox" name="uprjpl_station_p_ho" id="uprjpl-edit-station-p-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_station_p_10" id="uprjpl-edit-station-p-10"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_station_s_ho" id="uprjpl-edit-station-s-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_station_s_18" id="uprjpl-edit-station-s-18"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_station_m_ho" id="uprjpl-edit-station-m-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_station_m_23" id="uprjpl-edit-station-m-23"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_station_m_4" id="uprjpl-edit-station-m-4"></td>
                        </tr>
                        <tr>
                            <td class="bold">Paraf</td>
                            <td class="center"><input type="checkbox" name="uprjpl_paraf_p_ho" id="uprjpl-edit-paraf-p-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_paraf_p_10" id="uprjpl-edit-paraf-p-10"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_paraf_s_ho" id="uprjpl-edit-paraf-s-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_paraf_s_18" id="uprjpl-edit-paraf-s-18"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_paraf_m_ho" id="uprjpl-edit-paraf-m-ho"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_paraf_m_23" id="uprjpl-edit-paraf-m-23"></td>
                            <td class="center"><input type="checkbox" name="uprjpl_paraf_m_4" id="uprjpl-edit-paraf-m-4"></td>
                        </tr>
                        <tr>
                            <td class="bold">Perawat</td>
                            <td colspan="2">
                                <div class="input-group">
                                    <input type="text" name="uprjpl_perawat_p" id="uprjpl-edit-perawat-p" class="select2c-input ml-2">
                                </div>
                            </td>
                            <td colspan="2">
                                <div class="input-group">
                                    <input type="text" name="uprjpl_perawat_s" id="uprjpl-edit-perawat-s" class="select2c-input ml-2">
                                </div>
                            </td>
                            <td colspan="3">
                                <div class="input-group">
                                    <input type="text" name="uprjpl_perawat_m" id="uprjpl-edit-perawat-m" class="select2c-input ml-2">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer" id="update-uprjpl">
            </div>
        </div>
    </div>
</div>
<!-- End Modal Edit Upaya Pencegahan Risiko Jatuh Pasien Lansia -->