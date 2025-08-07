<!-- s -->
<!-- Modal CKP -->
<div class="modal fade" id="modal_form_ckp" role="dialog" data-backdrop="static" aria-labelledby="modal-resume-operasi-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width:90%">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold" id="modal_form_ckp">FORM OPERASI</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_entri_ckp_kamar_operasi class=form-horizontal') ?>
                    <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-ckp">
                    <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-ckp">
                    <input type="hidden" name="id_pasien" id="id-pasien-ckp">
                    <input type="hidden" name="id_ckp" id="id-ckp">
                    <!-- <input type="hidden" name="id_data_catatan_perioperatif_g" id="id_data_catatan_perioperatif_g"> -->
                    <input type="hidden" name="dateInput" id="dateInput">
                    <input type="hidden" name="id_user" id="id-user"value="<?= $this->session->userdata('id_translucent') ?>">


                    <!-- header -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="table-responsive">
                                <table class="table table-sm table-striped">
                                    <tr>
                                        <td width="20%" class="bold">Nama Pasien</td>
                                        <td wdith="80%">: <span id="nama-pasien-ckp"></span></td>
                                    </tr>
                                    <tr>
                                        <td class="bold">No. RM</td>
                                        <td>: <span id="no-rm-ckp"></span></td>
                                    </tr>
                                    <tr>
                                        <td class="bold">Tanggal Lahir</td>
                                        <td>: <span id="tanggal-lahir-ckp"></span></td>
                                    </tr>
                                    <tr>
                                        <td class="bold">Jenis Kelamin</td>
                                        <td>: <span id="jenis-kelamin-ckp"></span></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="table-responsive">
                                <table class="table table-sm table-striped">
                                    <tr>
                                        <td width="30%" class="bold">Ruang Rawat/Unit Kerja</td>
                                        <td wdith="70%">: <span id="bed-ckp"></span></td>
                                    </tr>
                                    <tr>
                                        <td class="bold">Agama</td>
                                        <td>: <span id="agama-ckp"></span></td>
                                    </tr>
                                    <tr>
                                        <td class="bold">Alamat</td>
                                        <td>: <span id="alamat-ckp"></span></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end header -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="widget-body">
                                <div id="wizard-operasi">
                                    <ol>
                                        <li>ENTRI CATATAN</li>
                                        <li>DATA CATATAN</li>
                                    </ol>

                                    <!-- FORM CATATAN KEPERAWATAN PERIOPERATIF AWAL  disabled-->
                                    <div class="form-data-catatan-keperawatan-perioperatif">
                                        <h5 class="center"><b>CATATAN KEPERAWATAN PERIOPERATIF</b></h5>
                                        <table class="table table-no-border table-sm table-striped">
                                            <tr>
                                                <td colspan="3">
                                                    <button class="btn btn-info btn-xs mr-1 float-left" type="button" id="ckp-btn-expand-all"><i class="fas fa-fw fa-expand mr-1"></i>Expand All</button>
                                                    <button class="btn btn-warning btn-xs mr-1 float-left" type="button" id="ckp-btn-collapse-all"><i class="fas fa-fw fa-compress mr-1"></i>Collapse All</button>
                                                </td>
                                            </tr>
                                           
                                        </table>

                                        <!-- CATATAN KEPERAWATAN PRA OPERATIF/Pre-operative nursing record(Diisi oleh perawat ruangan)AWAL -->
                                        <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                            <tr>
                                                <td colspan="3" class="center bold td-dark">
                                                    <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-catatan-keperawatan-perioperatif"><i class="fas fa-expand mr-1"></i>Expand</button>A. CATATAN KEPERAWATAN PRA OPERATIF/Pre-operative nursing record (Diisi oleh perawat ruangan)
                                                </td>
                                            </tr>
                                        </table>

                                        <div class="collapse multi-collapse mt-2" id="data-catatan-keperawatan-perioperatif">
                                            <table class="table table-no-border table-sm table-striped">
                                                <tr>
                                                    <td class="bold" width="16%">1. Tanda-tanda Vital</td>
                                                    <td class="bold" width="1%">:</td>
                                                    <!-- <td width="83%"> -->
                                                    <td>
                                                        Suhu <input type="text" name="suhu_ckp_1" id="suhu-ckp-1" class="custom-form clear-input d-inline-block col-lg-5" placeholder="">&#8451;
                                                    </td>
                                                    <td>
                                                        Nadi <input type="text" name="suhu_ckp_2" id="suhu-ckp-2" class="custom-form clear-input d-inline-block col-lg-5" placeholder="">x/mnt
                                                    </td>
                                                    <td>
                                                        RR <input type="text" name="suhu_ckp_3" id="suhu-ckp-3" class="custom-form clear-input d-inline-block col-lg-5" placeholder="">x/mnt
                                                    </td>
                                                    <td>
                                                        TD <input type="text" name="suhu_ckp_4" id="suhu-ckp-4" class="custom-form clear-input d-inline-block col-lg-5" placeholder="">mmHg
                                                    </td>
                                                    <td>
                                                        Skor Nyeri <input type="text" name="suhu_ckp_5" id="suhu-ckp-5" class="custom-form clear-input d-inline-block col-lg-5" placeholder="">
                                                    </td>
                                                    <td>
                                                        BB <input type="text" name="suhu_ckp_6" id="suhu-ckp-6" class="custom-form clear-input d-inline-block col-lg-5" placeholder="">kg
                                                    </td>
                                                    <td>
                                                        TB <input type="text" name="suhu_ckp_7" id="suhu-ckp-7" class="custom-form clear-input d-inline-block col-lg-5" placeholder="T badan">cm
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="bold" width="16%">2. Status Mental</td>
                                                    <td class="bold" width="1%">:</td>
                                                    <td>
                                                        <input type="checkbox" name="status_mental_ckp_1" id="status-mental-ckp-1" value="1" class="mr-1">CM
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="status_mental_ckp_2" id="status-mental-ckp-2" value="1" class="mr-1">Apatis
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="status_mental_ckp_3" id="status-mental-ckp-3" value="1" class="mr-1">Samnolen
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="status_mental_ckp_4" id="status-mental-ckp-4" value="1" class="mr-1">Sopor
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="status_mental_ckp_5" id="status-mental-ckp-5" value="1" class="mr-1">Koma
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="bold" width="16%">3. Riwayat Penyakit</td>
                                                    <td class="bold" width="1%">:</td>
                                                    <td>
                                                        <input type="radio" name="riwayat_penyakit_ckp_1" id="riwayat-penyakit-ckp-1" value="0" class="mr-1">Tidak
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="riwayat_penyakit_ckp_1" id="riwayat-penyakit-ckp-2" value="1" class="mr-1 ml-2">Ya
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="riwayat_penyakit_ckp_3" id="riwayat-penyakit-ckp-3" value="asma" class="mr-1">Asma
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="riwayat_penyakit_ckp_4" id="riwayat-penyakit-ckp-4" value="dm" class="mr-1 ml-2">DM
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="riwayat_penyakit_ckp_5" id="riwayat-penyakit-ckp-5" value="cardiovascular" class="mr-1 ml-2">Cardiovascular
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="bold" width="16%"></td>
                                                    <td class="bold" width="1%"></td>
                                                    <td>
                                                        <input type="checkbox" name="riwayat_penyakit_ckp_6" id="riwayat-penyakit-ckp-6" value="kanker" class="mr-1">Kanker
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="riwayat_penyakit_ckp_7" id="riwayat-penyakit-ckp-7" value="thalasemia" class="mr-1 ml-2">Thalasemia
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="riwayat_penyakit_ckp_8" id="riwayat-penyakit-ckp-8" value="lain - lain" class="mr-1 ml-2">lain - lain
                                                    </td>
                                                    <td>
                                                        <input type="text" name="riwayat_penyakit_ckp_9" id="riwayat-penyakit-ckp-9" class="custom-form clear-input d-inline-block col-lg-10" placeholder="Sebutkan">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="bold" width="16%">4. Pengobatan saat ini</td>
                                                    <td class="bold" width="1%">:</td>
                                                    <td>
                                                        <input type="text" name="pengobatan_saat_ini_ckp" id="pengobatan-saat-ini-ckp" class="custom-form clear-input d-inline-block col-lg-10" placeholder="Sebutkan">

                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="bold" width="16%">5. Operasi Sebelumnya</td>
                                                    <td class="bold" width="1%">:</td>
                                                    <td>
                                                        <input type="text" name="operasi_sebelumnya_ckp" id="operasi-sebelumnya-ckp" class="custom-form clear-input d-inline-block col-lg-10" placeholder="Sebutkan">

                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="bold" width="16%">6. Alergi</td>
                                                    <td class="bold" width="1%">:</td>
                                                    <td>
                                                        <input type="radio" name="alergi_ckp" id="alergi-ckp-1" value="0" class="mr-1">Tidak
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="alergi_ckp" id="alergi-ckp-2" value="1" class="mr-1 ml-2">Ya,
                                                    </td>
                                                    <td colspan="2">
                                                        Sebutkan <input type="text" name="alergi_ckp_3" id="alergi-ckp-3" class="custom-form clear-input d-inline-block col-lg-8" placeholder="Sebutkan ">&nbsp;&nbsp;
                                                    </td>
                                                    <td colspan="2">
                                                        Reaksi <input type="text" name="alergi_ckp_4" id="alergi-ckp-4" class="custom-form clear-input d-inline-block col-lg-8" placeholder="Sebutkan">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="bold" width="16%">7. Gol.Darah</td>
                                                    <td class="bold" width="1%">:</td>
                                                    <td colspan="2">
                                                        <input type="text" name="gol_darah_ckp_1" id="gol-darah-ckp-1" class="custom-form clear-input d-inline-block col-lg-8" placeholder="Sebutkan lainya">
                                                    </td>
                                                    <td colspan="2">
                                                        Rhesus : <input type="text" name="gol_darah_ckp_2" id="gol-darah-ckp-2" class="custom-form clear-input d-inline-block col-lg-8" placeholder="Sebutkan">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="bold" width="16%">8. Standar Kewaspadaan</td>
                                                    <td class="bold" width="1%">:</td>
                                                    <td colspan="2">
                                                        <input type="text" name="standar_kewaspadaan_ckp_1" id="standar-kewaspadaan-ckp-1" class="custom-form clear-input d-inline-block col-lg-8" placeholder="Sebutkan">
                                                    </td>
                                                    <td colspan="2">
                                                        Diagnosis : <input type="text" name="standar_kewaspadaan_ckp_2" id="standar-kewaspadaan-ckp-2" class="custom-form clear-input d-inline-block col-lg-8" placeholder="Sebutkan">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="bold" width="16%">9. Rencana Tindakan/Operasi</td>
                                                    <td class="bold" width="1%">:</td>
                                                    <td>
                                                        <input type="text" name="rencana_tindakan_operasi_ckp" id="rencana-tindakan-operasi-ckp" class="custom-form clear-input d-inline-block col-lg-8" placeholder="Sebutkan">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="bold" width="16%">10. Rencana Perawatan Pasca Operasi</td>
                                                    <td class="bold" width="1%">:</td>
                                                    <td>
                                                        <input type="text" name="rencana_perawatan_pasca_operasi_ckp" id="rencana-perawatan-pasca-operasi-ckp" class="custom-form clear-input d-inline-block col-lg-12" placeholder="Sebutkan">
                                                    </td>
                                                </tr>
                                            </table>
                                            <table class="table table-no-border table-sm table-striped">
                                                <tr>
                                                    <td class="bold" width="16%">11. Dokter Operator</td>
                                                    <td class="bold" width="1%">:</td>
                                                    <td>
                                                        <input type="text" name="dokter_operator_ckp" id="dokter-operator-ckp" class="select2c-input ml-2">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- CATATAN KEPERAWATAN PRA OPERATIF/Pre-operative nursing record(Diisi oleh perawat ruangan)AKHIR -->


                                        <!-- CEKLIST PERSIAPAN OPERASI/Pre-operative cheklist(Diisi oleh perawat ruangan dan perawat kamar bedah) AWAL -->
                                        <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                            <tr>
                                                <td colspan="3" class="center bold td-dark">
                                                    <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-ceklist-persiapan-operasi"><i class="fas fa-expand mr-1"></i>Expand</button>B. CEKLIST PERSIAPAN OPERASI/Pre-operative checklist (diisi oleh perawat ruangan dan perawat kamar bedah)
                                                </td>
                                            </tr>
                                        </table>

                                        <div class="collapse multi-collapse mt-2" id="data-ceklist-persiapan-operasi">
                                            <table class="table table-no-border table-sm table-striped">
                                                <table>
                                                    <tr>
                                                        <td class="bold" width="16%">Beri Tanda</td>
                                                        <td class="bold" width="1%">:</td>
                                                        <td class="bold" width="10%">&#9745 Ya</td>
                                                        <td class="bold" width="10%">X Tidak</td>
                                                        <td class="bold" width="10%"> A/N Tidak Menggunakan</td>
                                                        <td width="53%"></td>
                                                    </tr>
                                                </table>

                                                <tr>
                                                    <td width="100%">
                                                        <table class="table table-sm table-striped table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th class="center" colspan="9"><b></b></th>
                                                                </tr>
                                                                <tr>
                                                                    <th width="25%"><b>I. VERIFIKASI PASIEN</b></th>
                                                                    <th width="18%" class="center"><b>Ruangan</b></th>
                                                                    <th width="18%" class="center"><b>Ruang Penerimaan</b></th>
                                                                    <th width="18%" class="center"><b>OT</b></th>
                                                                    <th width="18%" class="center"><b>Keterangan</b></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1. Periksa identitas pasien</td>
                                                                    <td class="center"><input type="checkbox" name="verifikasi_pasien_1" id="verifikasi-pasien-1" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="verifikasi_pasien_2" id="verifikasi-pasien-2" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="verifikasi_pasien_3" id="verifikasi-pasien-3" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="text" name="verifikasi_pasien_4" id="verifikasi-pasien-4" class="custom-form clear-input">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2. Periksa gelang identitas / gelang operasi / gelang alergi</td>
                                                                    <td class="center"><input type="checkbox" name="verifikasi_pasien_5" id="verifikasi-pasien-5" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="verifikasi_pasien_6" id="verifikasi-pasien-6" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="verifikasi_pasien_7" id="verifikasi-pasien-7" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="text" name="verifikasi_pasien_8" id="verifikasi-pasien-8" class="custom-form clear-input">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3. Surat pengantar operasi</td>
                                                                    <td class="center"><input type="checkbox" name="verifikasi_pasien_9" id="verifikasi-pasien-9" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="verifikasi_pasien_10" id="verifikasi-pasien-10" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="verifikasi_pasien_11" id="verifikasi-pasien-11" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="text" name="verifikasi_pasien_12" id="verifikasi-pasien-12" class="custom-form clear-input">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>4. Jenis dan lokasi pembedahan dipastikan bersama pasien</td>
                                                                    <td class="center"><input type="checkbox" name="verifikasi_pasien_13" id="verifikasi-pasien-13" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="verifikasi_pasien_14" id="verifikasi-pasien-14" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="verifikasi_pasien_15" id="verifikasi-pasien-15" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="text" name="verifikasi_pasien_16" id="verifikasi-pasien-16" class="custom-form clear-input">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>5. Masalah bahasa / komunikasi</td>
                                                                    <td class="center"><input type="checkbox" name="verifikasi_pasien_17" id="verifikasi-pasien-17" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="verifikasi_pasien_18" id="verifikasi-pasien-18" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="verifikasi_pasien_19" id="verifikasi-pasien-19" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="text" name="verifikasi_pasien_20" id="verifikasi-pasien-20" class="custom-form clear-input">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>6. Periksa kelengkapan persetujuan pembedahan</td>
                                                                    <td class="center"><input type="checkbox" name="verifikasi_pasien_21" id="verifikasi-pasien-21" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="verifikasi_pasien_22" id="verifikasi-pasien-22" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="verifikasi_pasien_23" id="verifikasi-pasien-23" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="text" name="verifikasi_pasien_24" id="verifikasi-pasien-24" class="custom-form clear-input">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>7. Periksa kelengkapan persetujuan anastesi</td>
                                                                    <td class="center"><input type="checkbox" name="verifikasi_pasien_25" id="verifikasi-pasien-25" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="verifikasi_pasien_26" id="verifikasi-pasien-26" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="verifikasi_pasien_27" id="verifikasi-pasien-27" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="text" name="verifikasi_pasien_28" id="verifikasi-pasien-28" class="custom-form clear-input">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>8. Periksa kelengkapan resume medis (rawat inap & rawat jalan)</td>
                                                                    <td class="center"><input type="checkbox" name="verifikasi_pasien_29" id="verifikasi-pasien-29" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="verifikasi_pasien_30" id="verifikasi-pasien-30" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="verifikasi_pasien_31" id="verifikasi-pasien-31" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="text" name="verifikasi_pasien_32" id="verifikasi-pasien-32" class="custom-form clear-input">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>9. Periksa kelengkapan X-ray/CT-Scan/MRI/EKG/angiografi/Echo)</td>
                                                                    <td class="center"><input type="checkbox" name="verifikasi_pasien_33" id="verifikasi-pasien-33" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="verifikasi_pasien_34" id="verifikasi-pasien-34" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="verifikasi_pasien_35" id="verifikasi-pasien-35" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="text" name="verifikasi_pasien_36" id="verifikasi-pasien-36" class="custom-form clear-input">
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>

                                                <!-- BATAS  -->
                                                <tr>
                                                    <td width="100%">
                                                        <table class="table table-sm table-striped table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th class="center" colspan="9"><b></b></th>
                                                                </tr>
                                                                <tr>
                                                                    <th width="25%"><b>II. PERSIAPAN FISIK PASIEN</b></th>
                                                                    <th width="18%" class="center"><b>Ruangan</b></th>
                                                                    <th width="18%" class="center"><b>Ruang Penerimaan</b></th>
                                                                    <th width="18%" class="center"><b>OT</b></th>
                                                                    <th width="18%" class="center"><b>Keterangan</b></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1. Puasa / makan dan minum terakhir</td>
                                                                    <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_1" id="persiapan-fisik-pasien-1" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_2" id="persiapan-fisik-pasien-2" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_3" id="persiapan-fisik-pasien-3" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="text" name="persiapan_fisik_pasien_4" id="persiapan-fisik-pasien-4" class="custom-form clear-input">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2. Prostase luar dilepaskan (gigi palsu, lensa kontak)</td>
                                                                    <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_5" id="persiapan-fisik-pasien-5" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_6" id="persiapan-fisik-pasien-6" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_7" id="persiapan-fisik-pasien-7" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="text" name="persiapan_fisik_pasien_8" id="persiapan-fisik-pasien-8" class="custom-form clear-input">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3. Menggunakan prostase dalam (pacemaker, implan, prostase panggul / bahu. VO shunt)</td>
                                                                    <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_9" id="persiapan-fisik-pasien-9" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_10" id="persiapan-fisik-pasien-10" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_11" id="persiapan-fisik-pasien-11" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="text" name="persiapan_fisik_pasien_12" id="persiapan-fisik-pasien-12" class="custom-form clear-input">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>4. Penjepit rambut / cat kuku / perhiasan dilepaskan</td>
                                                                    <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_13" id="persiapan-fisik-pasien-13" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_14" id="persiapan-fisik-pasien-14" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_15" id="persiapan-fisik-pasien-15" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="text" name="persiapan_fisik_pasien_16" id="persiapan-fisik-pasien-16" class="custom-form clear-input">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>5. Persiapan kulit (Mandi Chlorhexidine 2% / Cukur)</td>
                                                                    <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_17" id="persiapan-fisik-pasien-17" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_18" id="persiapan-fisik-pasien-18" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_19" id="persiapan-fisik-pasien-19" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="text" name="persiapan_fisik_pasien_20" id="persiapan-fisik-pasien-20" class="custom-form clear-input">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>6. Pengosongan kandungan kemih / clysma</td>
                                                                    <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_21" id="persiapan-fisik-pasien-21" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_22" id="persiapan-fisik-pasien-22" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_23" id="persiapan-fisik-pasien-23" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="text" name="persiapan_fisik_pasien_24" id="persiapan-fisik-pasien-24" class="custom-form clear-input">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>7. Memastikan persediaan darah</td>
                                                                    <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_25" id="persiapan-fisik-pasien-25" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_26" id="persiapan-fisik-pasien-26" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_27" id="persiapan-fisik-pasien-27" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="text" name="persiapan_fisik_pasien_28" id="persiapan-fisik-pasien-28" class="custom-form clear-input">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>8. Alat bantu : (kaca mata, alat bantu dengar) disimpan</td>
                                                                    <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_29" id="persiapan-fisik-pasien-29" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_30" id="persiapan-fisik-pasien-30" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_31" id="persiapan-fisik-pasien-31" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="text" name="persiapan_fisik_pasien_32" id="persiapan-fisik-pasien-32" class="custom-form clear-input">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>9. Obat yang disertakan</td>
                                                                    <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_33" id="persiapan-fisik-pasien-33" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_34" id="persiapan-fisik-pasien-34" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_35" id="persiapan-fisik-pasien-35" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="text" name="persiapan_fisik_pasien_36" id="persiapan-fisik-pasien-36" class="custom-form clear-input">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>10. Obat terakhir yang diberikan</td>
                                                                    <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_37" id="persiapan-fisik-pasien-37" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_38" id="persiapan-fisik-pasien-38" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_39" id="persiapan-fisik-pasien-39" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="text" name="persiapan_fisik_pasien_40" id="persiapan-fisik-pasien-40" class="custom-form clear-input">
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>11. Vaskuler askes (cimino) IV Line No
                                                                        <input type="text" name="persiapan_fisik_pasien_41" id="persiapan-fisik-pasien-41" class="custom-form clear-input d-inline-block col-lg-2 mx-1" placeholder="nomor">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_42" id="persiapan-fisik-pasien-42" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_43" id="persiapan-fisik-pasien-43" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_44" id="persiapan-fisik-pasien-44" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="text" name="persiapan_fisik_pasien_45" id="persiapan-fisik-pasien-45" class="custom-form clear-input">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>12. Pemeriksaan DJJ (Denyut Jantung Janin)</td>
                                                                    <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_46" id="persiapan-fisik-pasien-46" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_47" id="persiapan-fisik-pasien-47" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="checkbox" name="persiapan_fisik_pasien_48" id="persiapan-fisik-pasien-48" value="1" class="mr-1">
                                                                    </td>
                                                                    <td class="center"><input type="text" name="persiapan_fisik_pasien_49" id="persiapan-fisik-pasien-49" class="custom-form clear-input">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>Diperiksa oleh :</b></td>
                                                                    <td class="center"><b>Perawat Ruangan</b></td>
                                                                    <td class="center"><input type="text" name="perawat_ruangan_pfp" id="perawat-ruangan-pfp" class="select2c-input ml-2">
                                                                    </td>
                                                                    <td class="center"><b>Jam</b> <input type="text" name="jam_pfp" id="jam-pfp" class="custom-form clear-input d-inline-block col-lg-4 ml-1" placeholder="isi jam"></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td class="center"><b>Perawat Penerima OT</b></td>
                                                                    <td class="center"><input type="text" name="perawat_penerima_ot_ppo" id="perawat-penerima-ot-ppo" class="select2c-input ml-2">
                                                                    </td>
                                                                    <td class="center"><b>Jam</b><input type="text" name="jam_ppo" id="jam-ppo" class="custom-form clear-input d-inline-block col-lg-4 ml-1" placeholder="isi jam"></td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <!-- BATAS -->
                                                <tr>
                                                    <td width="100%">
                                                        <table class="table table-sm table-striped table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th class="center" colspan="9"><b></b></th>
                                                                </tr>
                                                                <tr>
                                                                    <th width="25%"><b>III. PERSIAPAN Lain-Lain</b></th>
                                                                    <th width="18%" class="center"></th>
                                                                    <th width="18%" class="center"></th>
                                                                    <th width="18%" class="center"></th>
                                                                    <th width="18%" class="center"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1. Site Marking</td>
                                                                    <td class="center"><input type="radio" name="site_marketing" id="site-marketing-1" class="mr-1" value="1">Ya
                                                                    </td>
                                                                    <td class="center"> <input type="radio" name="site_marketing" id="site-marketing-2" class="mr-1" value="0">Tidak
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td class="center"><b>Perawat OT</b></td>
                                                                    <td class="center"><input type="text" name="perawat_ot_po" id="perawat-ot-po" class="select2c-input ml-2">
                                                                    </td>
                                                                    <td class="center"><b>Tanggal & Jam</b><input type="text" name="jam_tanggal_po" id="jam-tanggal-po" class="custom-form clear-input d-inline-block col-lg-6 ml-1" placeholder="isi tanggal & jam"></td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- CEKLIST PERSIAPAN OPERASI/Pre-operative cheklist(Diisi oleh perawat ruangan dan perawat kamar bedah) AKHIR -->

                                        <!-- ASUHAN KEPERAWATN AWAL -->
                                        <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                            <tr>
                                                <td colspan="3" class="center bold td-dark">
                                                    <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-assuhan-keperawatan-1"><i class="fas fa-expand mr-1"></i>Expand</button>ASUHAN KEPERAWATAN
                                                </td>
                                            </tr>
                                        </table>

                                        <div class="collapse multi-collapse mt-2" id="data-assuhan-keperawatan-1">
                                            <table class="table table-no-border table-sm table-striped">
                                                <tr>
                                                    <td width="100%">
                                                        <table class="table table-sm table-striped table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th class="center" colspan="9"><b></b></th>
                                                                </tr>
                                                                <tr>
                                                                    <th width="33%"></th>
                                                                    <td widtd="33%" class="center"><b>ASUHAN KEPERAWATAN</b></td>
                                                                    <th width="33%"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="center"><b>MASALAH KEPERAWATAN</b></td>
                                                                    <td class="center"><b>INTERVENSI KEPERAWATAN</b></td>
                                                                    <td class="center"><b>EVALUASI</b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_1" id="asuhan-keperawatan-ak-1" value="1" class="mr-1">
                                                                        ansietas berhubungan dengan
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_2" id="asuhan-keperawatan-ak-2" value="1" class="mr-1">
                                                                        Identifikasi saat tingkat ansietas berubah (mis,kondisi,waktu,stresor)
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_3" id="asuhan-keperawatan-ak-3" value="1" class="mr-1">
                                                                        Verbalisasi kebingungan menurun
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_4" id="asuhan-keperawatan-ak-4" value="1" class="mr-1">
                                                                        Krisis situasional
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_5" id="asuhan-keperawatan-ak-5" value="1" class="mr-1">
                                                                        Monitor tanda-tanda cemas
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_6" id="asuhan-keperawatan-ak-6" value="1" class="mr-1">
                                                                        Verbalisasi khawatir akibat kondisi yang dihadapi menurun
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_7" id="asuhan-keperawatan-ak-7" value="1" class="mr-1">
                                                                        Kebutuhan tidak terpenuhi
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_8" id="asuhan-keperawatan-ak-8" value="1" class="mr-1">
                                                                        Ciptakan suasana terapeutik untuk menumbuhkan kepercayaan
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_9" id="asuhan-keperawatan-ak-9" value="1" class="mr-1">
                                                                        Perilaku gelisah menurun
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_10" id="asuhan-keperawatan-ak-10" value="1" class="mr-1">
                                                                        Krisis maturasional
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_11" id="asuhan-keperawatan-ak-11" value="1" class="mr-1">
                                                                        Temani pasien untuk meningkatkan keselamatan dan mengurangi rasa takut
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_12" id="asuhan-keperawatan-ak-12" value="1" class="mr-1">
                                                                        Perilaku tegang menurun
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_13" id="asuhan-keperawatan-ak-13" value="1" class="mr-1">
                                                                        Ancaman terhadap konsep diri
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_14" id="asuhan-keperawatan-ak-14" value="1" class="mr-1">
                                                                        Pahami situasi yang membuat ansietas
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_15" id="asuhan-keperawatan-ak-15" value="1" class="mr-1">
                                                                        Keluhan pusing
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_16" id="asuhan-keperawatan-ak-16" value="1" class="mr-1">
                                                                        Ancaman terhadap kematian
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_17" id="asuhan-keperawatan-ak-17" value="1" class="mr-1">
                                                                        Dengarkan dengan penuh perhatian
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_18" id="asuhan-keperawatan-ak-18" value="1" class="mr-1">
                                                                        Anoreksia
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_19" id="asuhan-keperawatan-ak-19" value="1" class="mr-1">
                                                                        Kekhawatiran mengalami kegagalan
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_20" id="asuhan-keperawatan-ak-20" value="1" class="mr-1">
                                                                        Gunakan pendekatan yang tenang dan meyakinkan
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_21" id="asuhan-keperawatan-ak-21" value="1" class="mr-1">
                                                                        Frekuensi nadi menurun
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_22" id="asuhan-keperawatan-ak-22" value="1" class="mr-1">
                                                                        Disfungsi sistem keluarga
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_23" id="asuhan-keperawatan-ak-23" value="1" class="mr-1">
                                                                        Informasi secara faktual mengenai diagnosis pengobatan dan prognosis
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_24" id="asuhan-keperawatan-ak-24" value="1" class="mr-1">
                                                                        Tekanan darah menurun
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_25" id="asuhan-keperawatan-ak-25" value="1" class="mr-1">
                                                                        Hubungan orang tua anak tidak memuaskan
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_26" id="asuhan-keperawatan-ak-26" value="1" class="mr-1">
                                                                        Jelaskan prosedur, termasuk sensasi yang mungkin dialami
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_27" id="asuhan-keperawatan-ak-27" value="1" class="mr-1">
                                                                        Diaforesis menurun
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_28" id="asuhan-keperawatan-ak-28" value="1" class="mr-1">
                                                                        Penyalahgunaan zat
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_29" id="asuhan-keperawatan-ak-29" value="1" class="mr-1">
                                                                        Anjurkan keluarga untuk tetap bersama pasien, jika perlu
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_30" id="asuhan-keperawatan-ak-30" value="1" class="mr-1">
                                                                        Tremor menurun
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_31" id="asuhan-keperawatan-ak-31" value="1" class="mr-1">
                                                                        Terpapar bahaya lingkungan (mis,toksin,dll)
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_32" id="asuhan-keperawatan-ak-32" value="1" class="mr-1">
                                                                        Latih kegiatan mengalihkan
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_33" id="asuhan-keperawatan-ak-33" value="1" class="mr-1">
                                                                        Perilaku sesuai anjuran meningkat
                                                                    </td>
                                                                </tr>

                                                                <!-- BARU -->
                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_58" id="asuhan-keperawatan-ak-58" value="1" class="mr-1">
                                                                        Kurang terpapar informasi
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_34" id="asuhan-keperawatan-ak-34" value="1" class="mr-1">
                                                                        Defisit pengetahuan
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_35" id="asuhan-keperawatan-ak-35" value="1" class="mr-1">
                                                                        Latih Teknik relaksasi
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_36" id="asuhan-keperawatan-ak-36" value="1" class="mr-1">
                                                                        Verbalisasi minat dalam belajar meningkat
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_37" id="asuhan-keperawatan-ak-37" value="1" class="mr-1">
                                                                        Keterbatasan kognitif
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_38" id="asuhan-keperawatan-ak-38" value="1" class="mr-1">
                                                                        Identifikasi masalah kesehatan individu dan keluarga
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_39" id="asuhan-keperawatan-ak-39" value="1" class="mr-1">
                                                                        Kemampuan menjelaskan tentang satu topik meningkat
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_40" id="asuhan-keperawatan-ak-40" value="1" class="mr-1">
                                                                        Gangguan fungsi kognitif
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_41" id="asuhan-keperawatan-ak-41" value="1" class="mr-1">
                                                                        Identifikasi insiatif individu dan keluarga
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_42" id="asuhan-keperawatan-ak-42" value="1" class="mr-1">
                                                                        Perilaku sesuai dengan pengetahuan meningkat
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_43" id="asuhan-keperawatan-ak-43" value="1" class="mr-1">
                                                                        Kekeliruan mengikuti anjuran
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_44" id="asuhan-keperawatan-ak-44" value="1" class="mr-1">
                                                                        Jelaskan tentang prosedur tindakan
                                                                    </td>
                                                                    <td></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_45" id="asuhan-keperawatan-ak-45" value="1" class="mr-1">
                                                                        Kurang terpapar informasi
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_46" id="asuhan-keperawatan-ak-46" value="1" class="mr-1">
                                                                        Libatkan kolega / teman
                                                                    </td>
                                                                    <td></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_47" id="asuhan-keperawatan-ak-47" value="1" class="mr-1">
                                                                        Kurang minat dalam belajar
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_48" id="asuhan-keperawatan-ak-48" value="1" class="mr-1">
                                                                        Beri kesempatan pasien untuk bertanya
                                                                    </td>
                                                                    <td></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_49" id="asuhan-keperawatan-ak-49" value="1" class="mr-1">
                                                                        Kurang mampu mengingat
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_50" id="asuhan-keperawatan-ak-50" value="1" class="mr-1">
                                                                        <input type="text" name="asuhan_keperawatan_ak_51" id="asuhan-keperawatan-ak-51" class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                    <td></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_52" id="asuhan-keperawatan-ak-52" value="1" class="mr-1">
                                                                        Ketidaktahuan menemukan sumber informasi
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_53" id="asuhan-keperawatan-ak-53" value="1" class="mr-1">
                                                                        kolaborasi pemberian obat anti ansietas, jika perlu
                                                                    </td>
                                                                </tr>                                      

                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_54" id="asuhan-keperawatan-ak-54" value="1" class="mr-1">
                                                                        <input type="text" name="asuhan_keperawatan_ak_55" id="asuhan-keperawatan-ak-55" class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatan_ak_56" id="asuhan-keperawatan-ak-56" value="1" class="mr-1">
                                                                        <input type="text" name="asuhan_keperawatan_ak_57" id="asuhan-keperawatan-ak-57" class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                    <td>
                                                                </tr>

                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="center"><b>Perawat Asisten</b></td>
                                                                    <td class="center"><b>Perawat Anastesi </b></td>
                                                                    <td class="center"><b>Perawat Kamar Bedah</b></td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="center"><input type="text" name="perawwat_ruangan_pr" id="perawwat-ruangan-pr" class="select2c-input ml-2">
                                                                    </td>
                                                                    <td class="center"><input type="text" name="perawwat_anastesi_pa" id="perawwat-anastesi-pa" class="select2c-input ml-2">
                                                                    </td>
                                                                    <td class="center"><input type="text" name="perawwat_kamar_bedah" id="perawwat-kamar-bedah" class="select2c-input ml-2">
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- ASUHAN KEPERAWATN AKHIR -->

                                        <!-- CATATAN KEPERAWATAN INTRA OPERASI AWAL -->
                                        <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                            <tr>
                                                <td colspan="3" class="center bold td-dark">
                                                    <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-catatan-keperawatan-intra-operasi"><i class="fas fa-expand mr-1"></i>Expand</button>CATATAN KEPERAWATAN INTRA OPERASI : Diisi lengkap oleh staf perawat Kamar Operasi
                                                </td>
                                            </tr>
                                        </table>

                                        <div class="collapse multi-collapse mt-2" id="data-catatan-keperawatan-intra-operasi">
                                            <table class="table table-no-border table-sm table-striped">
                                                <table>
                                                    <tr>
                                                        <td class="bold" width="15%">1. Time Out</td>
                                                        <td class="bold" width="15%">

                                                            <input type="radio" name="time_out_ckio_1" id="time-out-ckio-1" value="1" class="mr-1">Ya
                                                        </td>
                                                        <td class="bold" width="15%"> Jam<input type="text" name="time_out_ckio_2" id="time-out-ckio-2" class="custom-form clear-input d-inline-block col-lg-4 ml-1" placeholder="isi jam"></td>
                                                        <td class="bold" width="15%"><input type="radio" name="time_out_ckio_1" id="time-out-ckio-3" value="0" class="mr-1">Tidak</td>
                                                        <td class="bold" width="15%"></td>
                                                        <td class="bold" width="15%"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold" width="15%">2. Cek ketersediaan peralatan & fungsinya,</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold" width="15%"></td>
                                                        <td class="bold" width="15%">a.Instrument</td>
                                                        <td class="bold" width="15%"><input type="radio" name="time_out_ckio_4" id="time-out-ckio-4" class="mr-1" value="1">Ya</td>
                                                        <td class="bold" width="15%"> Jam<input type="text" name="time_out_ckio_5" id="time-out-ckio-5" class="custom-form clear-input d-inline-block col-lg-4 ml-1" placeholder="isi jam"></td>
                                                        <td class="bold" width="15%"><input type="radio" name="time_out_ckio_4" id="time-out-ckio-6" class="mr-1" value="0">Tidak</td>
                                                        <td class="bold" width="15%"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold" width="15%"></td>
                                                        <td class="bold" width="15%">b.Protese / Implant</td>
                                                        <td class="bold" width="15%"><input type="radio" name="time_out_ckio_7" id="time-out-ckio-7" class="mr-1" value="1">Ya</td>
                                                        <td class="bold" width="15%"> Jam<input type="text" name="time_out_ckio_8" id="time-out-ckio-8" class="custom-form clear-input d-inline-block col-lg-4 ml-1" placeholder="isi jam"></td>
                                                        <td class="bold" width="15%"><input type="radio" name="time_out_ckio_7" id="time-out-ckio-9" class="mr-1" value="0">Tidak</td>
                                                        <td class="bold" width="15%"></td>
                                                    </tr>
                                                </table>
                                                <tr>
                                                    <td width="100%">
                                                        <table class="table table-sm table-striped table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th class="center" colspan="9"><b></b></th>
                                                                </tr>
                                                                <tr>
                                                                    <td widtd="25%"> Mulai Jam : <input type="text" name="time_out_ckio_10" id="time-out-ckio-10" class="custom-form clear-input d-inline-block col-lg-2 ml-1" placeholder="masukan jam"></td>
                                                                    <td widtd="25%"></td>
                                                                    <td widtd="25%">Selesai Jam : <input type="text" name="time_out_ckio_11" id="time-out-ckio-11" class="custom-form clear-input d-inline-block col-lg-2 ml-1" placeholder="masukan jam"></td>
                                                                    <td widtd="25%"></td>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                        <!-- BATAS -->
                                                        <table class="table table-sm table-striped table-bordered">
                                                            <tr>
                                                                <td width="25%">1. Dilakukan Operasi</td>
                                                                <td width="1%">:</td>
                                                                <td>
                                                                    <input type="text" name="catatan_keperawatan_intra_operasi_1" id="catatan-keperawatan-intra-operasi-1" class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td width="25%">2. Tipe Operasi</td>
                                                                <td width="1%">:</td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_2" id="catatan-keperawatan-intra-operasi-2" value="1" class="mr-1">Elektif
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_3" id="catatan-keperawatan-intra-operasi-3" value="1" class="mr-1">Darurat
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_4" id="catatan-keperawatan-intra-operasi-4" value="1" class="mr-1">Operasi sehari
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%">3. Tipe Pembiusan</td>
                                                                <td width="1%">:</td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_5" id="catatan-keperawatan-intra-operasi-5" value="1" class="mr-1">Umum
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_6" id="catatan-keperawatan-intra-operasi-6" value="1" class="mr-1 ">Lokal
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_7" id="catatan-keperawatan-intra-operasi-7" value="1" class="mr-1 ">Regional
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%">4. Tingkat kesadaran waktu masuk kamar operasi</td>
                                                                <td width="1%">:</td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_8" id="catatan-keperawatan-intra-operasi-8" value="1" class="mr-1">Terjaga
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_9" id="catatan-keperawatan-intra-operasi-9" value="1" class="mr-1 ">Mudah dibangunkan
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_10" id="catatan-keperawatan-intra-operasi-10" value="1" class="mr-1 ">Lain - lain
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="catatan_keperawatan_intra_operasi_11" id="catatan-keperawatan-intra-operasi-11" class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan" disabled>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%">5. Status emosi waktu masuk kamar operasi</td>
                                                                <td width="1%">:</td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_12" id="catatan-keperawatan-intra-operasi-12" value="1" class="mr-1">Rileks
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_13" id="catatan-keperawatan-intra-operasi-13" value="1" class="mr-1 ">Gelisah
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_14" id="catatan-keperawatan-intra-operasi-14" value="1" class="mr-1 ">Tidak ada respon
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%">6. Posisi kanula intravena</td>
                                                                <td width="1%">:</td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_15" id="catatan-keperawatan-intra-operasi-15" value="1" class="mr-1">Ta Ki/Ka
                                                                </td>
                                                                <!-- <td>
                                                                    <input type="radio" name="catatan_keperawatan_intra_operasi_16" id="catatan-keperawatan-intra-operasi-16" class="mr-1" value="kiri">Kiri
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="catatan_keperawatan_intra_operasi_16" id="catatan-keperawatan-intra-operasi-17" class="mr-1" value="kanan">Kanan
                                                                </td> -->
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_18" id="catatan-keperawatan-intra-operasi-18" value="1" class="mr-1 ">Ka.Ki/Ka
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_21" id="catatan-keperawatan-intra-operasi-21" value="1" class="mr-1">Atrial line
                                                                </td>
                                                                <!-- <td>
                                                                    <input type="radio" name="catatan_keperawatan_intra_operasi_19" id="catatan-keperawatan-intra-operasi-19" class="mr-1" value="1">Kiri
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="catatan_keperawatan_intra_operasi_19" id="catatan-keperawatan-intra-operasi-20" class="mr-1" value="2">Kanan
                                                                </td> -->
                                                            </tr>
                                                            <tr>
                                                                <td width="25%"></td>
                                                                <td width="1%"></td>
                                                               
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_22" id="catatan-keperawatan-intra-operasi-22" value="1" class="mr-1 ">CVP
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_23" id="catatan-keperawatan-intra-operasi-23" value="1" class="mr-1 ">Lain - lain
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="catatan_keperawatan_intra_operasi_24" id="catatan-keperawatan-intra-operasi-24" class="custom-form clear-input d-inline-block col-lg-8 ml-1" placeholder="sebutkan" disabled>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%">7. Posisi Operasi (diawasi oleh
                                                                    <input type="text" name="catatan_keperawatan_intra_operasi_25" id="catatan-keperawatan-intra-operasi-25" class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan">
                                                                </td>
                                                                <td width="1%">:</td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_26" id="catatan-keperawatan-intra-operasi-26" value="1" class="mr-1">Telentang
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_27" id="catatan-keperawatan-intra-operasi-27" value="1" class="mr-1 ">Lithtotomy
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_28" id="catatan-keperawatan-intra-operasi-28" value="1" class="mr-1 ">Tengkurap
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%"></td>
                                                                <td width="1%"></td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_29" id="catatan-keperawatan-intra-operasi-29" value="1" class="mr-1">Lateral Ki.Ka
                                                                </td>
                                                                <!-- <td>
                                                                    <input type="radio" name="catatan_keperawatan_intra_operasi_30" id="catatan-keperawatan-intra-operasi-30" class="mr-1" value="1">Kiri
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="catatan_keperawatan_intra_operasi_30" id="catatan-keperawatan-intra-operasi-31" class="mr-1" value="2">Kanan
                                                                </td> -->
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_32" id="catatan-keperawatan-intra-operasi-32" value="1" class="mr-1 ">Lain - lain
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="catatan_keperawatan_intra_operasi_33" id="catatan-keperawatan-intra-operasi-33" class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan" disabled>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%">8. Posisi lengan</td>
                                                                <td width="1%">:</td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_34" id="catatan-keperawatan-intra-operasi-34" value="1" class="mr-1">Lengan terentang Ki/Ka
                                                                </td>
                                                                <!-- <td>
                                                                    <input type="radio" name="catatan_keperawatan_intra_operasi_35" id="catatan-keperawatan-intra-operasi-35" class="mr-1" value="1">Kiri
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="catatan_keperawatan_intra_operasi_35" id="catatan-keperawatan-intra-operasi-36" class="mr-1" value="2">Kanan
                                                                </td> -->
                                                            </tr>
                                                            <tr>
                                                                <td width="25%"></td>
                                                                <td width="1%"></td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_37" id="catatan-keperawatan-intra-operasi-37" value="1" class="mr-1">Lengan terlipat Ki/Ka
                                                                </td>
                                                                <!-- <td>
                                                                    <input type="radio" name="catatan_keperawatan_intra_operasi_38" id="catatan-keperawatan-intra-operasi-38" class="mr-1" value="1">Kiri
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="catatan_keperawatan_intra_operasi_38" id="catatan-keperawatan-intra-operasi-39" class="mr-1" value="2">Kanan
                                                                </td> -->
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_40" id="catatan-keperawatan-intra-operasi-40" value="1" class="mr-1 ">Lain - lain
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="catatan_keperawatan_intra_operasi_41" id="catatan-keperawatan-intra-operasi-41" class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan" disabled>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%">9. Posisi alat bantu yang digunakan </td>
                                                                <td width="1%">:</td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_42" id="catatan-keperawatan-intra-operasi-42" value="1" class="mr-1">Papan lengan penyanggah
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_43" id="catatan-keperawatan-intra-operasi-43" value="1" class="mr-1 ">Papan lengan
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_44" id="catatan-keperawatan-intra-operasi-44" value="1" class="mr-1 ">Lain - lain
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="catatan_keperawatan_intra_operasi_45" id="catatan-keperawatan-intra-operasi-45" class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan" disabled>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%">10. Memakai kateter urine</td>
                                                                <td width="1%">:</td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_46" id="catatan-keperawatan-intra-operasi-46" value="1" class="mr-1">Tidak
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_47" id="catatan-keperawatan-intra-operasi-47" value="1" class="mr-1 ">Dalam K.O
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_48" id="catatan-keperawatan-intra-operasi-48" value="1" class="mr-1 ">Diruangan
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_49" id="catatan-keperawatan-intra-operasi-49" value="1" class="mr-1 ">Ke Urimeter
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%"></td>
                                                                <td width="1%"></td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_50" id="catatan-keperawatan-intra-operasi-50" value="1" class="mr-1">Kantong urine tertutup
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_51" id="catatan-keperawatan-intra-operasi-51" value="1" class="mr-1 ">Ke Traksi
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_52" id="catatan-keperawatan-intra-operasi-52" value="1" class="mr-1 ">Dijepit
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%">11. Persiapan kulit</td>
                                                                <td width="1%">:</td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_53" id="catatan-keperawatan-intra-operasi-53" value="1" class="mr-1">Chlorhexidine/spirit 70%
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_54" id="catatan-keperawatan-intra-operasi-54" value="1" class="mr-1 ">Povidon-lodin
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%"></td>
                                                                <td width="1%"></td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_55" id="catatan-keperawatan-intra-operasi-55" value="1" class="mr-1">Chlorhexidine aquaeosous 0,1
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_56" id="catatan-keperawatan-intra-operasi-56" value="1" class="mr-1 ">Hibiscrub
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%">12. Pemakaian Diathermi lokasi dari dipersive elaktroda (dipasang oleh
                                                                    <input type="text" name="catatan_keperawatan_intra_operasi_57" id="catatan-keperawatan-intra-operasi-57" class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan">
                                                                </td>
                                                                <td width="1%">:</td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_58" id="catatan-keperawatan-intra-operasi-58" value="1" class="mr-1">Tidak
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_59" id="catatan-keperawatan-intra-operasi-59" value="1" class="mr-1 ">Monopolar
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_60" id="catatan-keperawatan-intra-operasi-60" value="1" class="mr-1 ">Bokong Ki/Ka
                                                                </td>
                                                                <!-- <td>
                                                                    <input type="radio" name="catatan_keperawatan_intra_operasi_61" id="catatan-keperawatan-intra-operasi-61" class="mr-1" value="1">Kiri
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="catatan_keperawatan_intra_operasi_61" id="catatan-keperawatan-intra-operasi-62" class="mr-1" value="2">Kanan
                                                                </td> -->
                                                            </tr>
                                                            <tr>
                                                                <td width="25%"></td>
                                                                <td width="1%">:</td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_63" id="catatan-keperawatan-intra-operasi-63" value="1" class="mr-1">Paha Ki/Ka
                                                                </td>
                                                                <!-- <td>
                                                                    <input type="radio" name="catatan_keperawatan_intra_operasi_64" id="catatan-keperawatan-intra-operasi-64" class="mr-1" value="1">Kiri
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="catatan_keperawatan_intra_operasi_64" id="catatan-keperawatan-intra-operasi-65" class="mr-1" value="2">Kanan
                                                                </td> -->
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_66" id="catatan-keperawatan-intra-operasi-66" value="1" class="mr-1 ">Lain - lain
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="catatan_keperawatan_intra_operasi_67" id="catatan-keperawatan-intra-operasi-67" class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan" disabled>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%">Pemeriksaan kondisi kulit sebelum operasi (Kode Unit Elekrosugical
                                                                    <input type="text" name="catatan_keperawatan_intra_operasi_68" id="catatan-keperawatan-intra-operasi-68" class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan">
                                                                </td>
                                                                <td width="1%">:</td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_69" id="catatan-keperawatan-intra-operasi-69" value="1" class="mr-1">Utuh
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_70" id="catatan-keperawatan-intra-operasi-70" value="1" class="mr-1 ">Menggelembung
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_71" id="catatan-keperawatan-intra-operasi-71" value="1" class="mr-1 ">Lain - lain
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="catatan_keperawatan_intra_operasi_72" id="catatan-keperawatan-intra-operasi-72" class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan" disabled>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%"></td>
                                                                <td width="1%"></td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_73" id="catatan-keperawatan-intra-operasi-73" value="1" class="mr-1">Utuh
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_74" id="catatan-keperawatan-intra-operasi-74" value="1" class="mr-1 ">Menggelembung
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_75" id="catatan-keperawatan-intra-operasi-75" value="1" class="mr-1 ">Lain - lain
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="catatan_keperawatan_intra_operasi_76" id="catatan-keperawatan-intra-operasi-76" class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan" disabled>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%">13. Unit pemanas / Pendingin OP (Kode unit <input type="text" name="catatan_keperawatan_intra_operasi_77" id="catatan-keperawatan-intra-operasi-77" class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan"></td>
                                                                <td width="1%">:</td>
                                                                <td>
                                                                    <input type="radio" name="catatan_keperawatan_intra_operasi_78" id="catatan-keperawatan-intra-operasi-78" class="mr-1" value="1">Ya
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="catatan_keperawatan_intra_operasi_78" id="catatan-keperawatan-intra-operasi-79" class="mr-1" value="0">Tidak
                                                                </td>
                                                                <td>
                                                                    Pengaturan <input type="text" name="catatan_keperawatan_intra_operasi_92" id="catatan-keperawatan-intra-operasi-92" class="custom-form clear-input d-inline-block col-lg-5 ml-1"> ℃
                                                                </td>
                                                                <td>
                                                                    Jam mulai <input type="text" name="catatan_keperawatan_intra_operasi_93" id="catatan-keperawatan-intra-operasi-93" class="custom-form clear-input d-inline-block col-lg-7 ml-1">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%">14. Pemakaian Tourniquet</td>
                                                                <td width="1%">:</td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_80" id="catatan-keperawatan-intra-operasi-80" value="1" class="mr-1">Lengan Kanan
                                                                </td>
                                                                <td>
                                                                    Jam mulai <input type="text" name="catatan_keperawatan_intra_operasi_81" id="catatan-keperawatan-intra-operasi-81" class="custom-form clear-input d-inline-block col-lg-7 ml-1" placeholder="isi jam" disabled>
                                                                </td>
                                                                <td>
                                                                    Tekanan<input type="text" name="catatan_keperawatan_intra_operasi_82" id="catatan-keperawatan-intra-operasi-82" class="custom-form clear-input d-inline-block col-lg-7 ml-1" placeholder="sebutkan" disabled>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%"></td>
                                                                <td width="1%"></td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_83" id="catatan-keperawatan-intra-operasi-83" value="1" class="mr-1">Lengan Kiri
                                                                </td>
                                                                <td>
                                                                    Jam mulai <input type="text" name="catatan_keperawatan_intra_operasi_84" id="catatan-keperawatan-intra-operasi-84" class="custom-form clear-input d-inline-block col-lg-7 ml-1" placeholder="isi jam" disabled>
                                                                </td>
                                                                <td>
                                                                    Tekanan<input type="text" name="catatan_keperawatan_intra_operasi_85" id="catatan-keperawatan-intra-operasi-85" class="custom-form clear-input d-inline-block col-lg-7 ml-1" placeholder="sebutkan" disabled>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%"></td>
                                                                <td width="1%"></td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_86" id="catatan-keperawatan-intra-operasi-86" value="1" class="mr-1">Paha Kanan
                                                                </td>
                                                                <td>
                                                                    Jam mulai <input type="text" name="catatan_keperawatan_intra_operasi_87" id="catatan-keperawatan-intra-operasi-87" class="custom-form clear-input d-inline-block col-lg-7 ml-1" placeholder="isi jam" disabled>
                                                                </td>
                                                                <td>
                                                                    Tekanan<input type="text" name="catatan_keperawatan_intra_operasi_88" id="catatan-keperawatan-intra-operasi-88" class="custom-form clear-input d-inline-block col-lg-7 ml-1" placeholder="sebutkan" disabled>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%"></td>
                                                                <td width="1%"></td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_operasi_89" id="catatan-keperawatan-intra-operasi-89" value="1" class="mr-1">Paha Kiri
                                                                </td>
                                                                <td>
                                                                    Jam mulai <input type="text" name="catatan_keperawatan_intra_operasi_90" id="catatan-keperawatan-intra-operasi-90" class="custom-form clear-input d-inline-block col-lg-7 ml-1" placeholder="isi jam" disabled>
                                                                </td>
                                                                <td>
                                                                    Tekanan<input type="text" name="catatan_keperawatan_intra_operasi_91" id="catatan-keperawatan-intra-operasi-91" class="custom-form clear-input d-inline-block col-lg-7 ml-1" placeholder="sebutkan" disabled>
                                                                </td>
                                                            </tr>
                                                            <!-- BATASS -->
                                                            <tr>
                                                                <td width="25%">15. Pemakaian laser (Diawasi oleh <input type="text" name="catatan_keperawatan_intra_op_1" id="catatan-keperawatan-intra-op-1" class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan"></td>
                                                                <td width="1%">:</td>
                                                                <td> Kode Model
                                                                    <input type="text" name="catatan_keperawatan_intra_op_2" id="catatan-keperawatan-intra-op-2" class="custom-form clear-input d-inline-block col-lg-6 ml-1" placeholder="sebutkan">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%">16. Pemakaian implant</td>
                                                                <td width="1%">:</td>
                                                                <td>
                                                                    <input type="text" name="catatan_keperawatan_intra_op_3" id="catatan-keperawatan-intra-op-3" class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%">17. Pemakaian Drain</td>
                                                                <td width="1%">:</td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_op_4" id="catatan-keperawatan-intra-op-4" value="1" class="mr-1">Redivak
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_op_5" id="catatan-keperawatan-intra-op-5" value="1" class="mr-1 ">Yeates
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%">18. Irigasi luka</td>
                                                                <td width="1%">:</td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_op_6" id="catatan-keperawatan-intra-op-6" value="1" class="mr-1">Sodium Cloride 0,9%
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_op_7" id="catatan-keperawatan-intra-op-7" value="1" class="mr-1 ">Haemovac
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_op_8" id="catatan-keperawatan-intra-op-8" value="1" class="mr-1 ">Corrugated
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%"></td>
                                                                <td width="1%"></td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_op_9" id="catatan-keperawatan-intra-op-9" value="1" class="mr-1">Hydrogen Peroxide
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_op_10" id="catatan-keperawatan-intra-op-10" value="1" class="mr-1 ">Thoracic
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_op_11" id="catatan-keperawatan-intra-op-11" value="1" class="mr-1 ">Lain - lain
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="catatan_keperawatan_intra_op_12" id="catatan-keperawatan-intra-op-12" class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan" disabled>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td width="25%">19. Pemakaian Cairan</td>
                                                                <td width="1%">:</td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_op_13" id="catatan-keperawatan-intra-op-13" value="1" class="mr-1">Antibiotic Spray
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_op_14" id="catatan-keperawatan-intra-op-14" value="1" class="mr-1 ">Antibiotic
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_op_15" id="catatan-keperawatan-intra-op-15" value="1" class="mr-1 ">Glicine
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="catatan_keperawatan_intra_op_16" id="catatan-keperawatan-intra-op-16" class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan">
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td width="25%"></td>
                                                                <td width="1%"></td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_op_17" id="catatan-keperawatan-intra-op-17" value="1" class="mr-1">Air untuk irigasi
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="catatan_keperawatan_intra_op_18" id="catatan-keperawatan-intra-op-18" class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan">
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_op_19" id="catatan-keperawatan-intra-op-19" value="1" class="mr-1 ">Lain - lain
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="catatan_keperawatan_intra_op_20" id="catatan-keperawatan-intra-op-20" class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan" disabled>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%"></td>
                                                                <td width="1%"></td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_op_21" id="catatan-keperawatan-intra-op-21" value="1" class="mr-1">BSS Solution
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_op_22" id="catatan-keperawatan-intra-op-22" value="1" class="mr-1 ">Sodium Cholorid 0,9%
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="catatan_keperawatan_intra_op_23" id="catatan-keperawatan-intra-op-23" class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan">
                                                                </td>
                                                                <td>
                                                                    ltr/<input type="text" name="catatan_keperawatan_intra_op_24" id="catatan-keperawatan-intra-op-24" class="custom-form clear-input d-inline-block col-lg-8 ml-1" placeholder="sebutkan">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%"></td>
                                                                <td width="1%"></td>
                                                             
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_op_26" id="catatan-keperawatan-intra-op-26" value="1" class="mr-1 ">Lain - lain
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="catatan_keperawatan_intra_op_27" id="catatan-keperawatan-intra-op-27" class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan" disabled>
                                                                </td>
                                                                <td>
                                                                    ltr/<input type="text" name="catatan_keperawatan_intra_op_25" id="catatan-keperawatan-intra-op-25" class="custom-form clear-input d-inline-block col-lg-8 ml-1" placeholder="sebutkan">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%"></td>
                                                                <td width="1%"></td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_op_28" id="catatan-keperawatan-intra-op-28" value="1" class="mr-1">Tidak Ada
                                                                </td>
                                                                <td>
                                                                    ltr/<input type="text" name="catatan_keperawatan_intra_op_29" id="catatan-keperawatan-intra-op-29" class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan">
                                                                </td>
                                                               
                                                            </tr>


                                                            <tr>
                                                                <td width="25%">20. Alat - alat terbungkus</td>
                                                                <td width="1%">:</td>
                                                                <td>
                                                                    Jenis:<input type="text" name="catatan_keperawatan_intra_op_30" id="catatan-keperawatan-intra-op-30" class="custom-form clear-input d-inline-block col-lg-8 ml-1" placeholder="sebutkan">
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_op_31" id="catatan-keperawatan-intra-op-31" value="1" class="mr-1">Ada
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_op_32" id="catatan-keperawatan-intra-op-32" value="1" class="mr-1">Tidak Ada
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_op_33" id="catatan-keperawatan-intra-op-33" value="1" class="mr-1 ">Lain - lain
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="catatan_keperawatan_intra_op_34" id="catatan-keperawatan-intra-op-34" class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan" disabled>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%">21. Balutan</td>
                                                                <td width="1%">:</td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_op_35" id="catatan-keperawatan-intra-op-35" value="1" class="mr-1">Histology
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="catatan_keperawatan_intra_op_36" id="catatan-keperawatan-intra-op-36" class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan">
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_op_37" id="catatan-keperawatan-intra-op-37" value="1" class="mr-1 ">Pressure
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_op_38" id="catatan-keperawatan-intra-op-38" value="1" class="mr-1 ">Jenis
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%"></td>
                                                                <td width="1%"></td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_op_39" id="catatan-keperawatan-intra-op-39" value="1" class="mr-1">Cytology
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="catatan_keperawatan_intra_op_40" id="catatan-keperawatan-intra-op-40" class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan">
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_op_41" id="catatan-keperawatan-intra-op-41" value="1" class="mr-1 ">Kultur
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="catatan_keperawatan_intra_op_42" id="catatan-keperawatan-intra-op-42" class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%"></td>
                                                                <td width="1%"></td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_op_43" id="catatan-keperawatan-intra-op-43" value="1" class="mr-1">Prozen Section
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="catatan_keperawatan_intra_op_44" id="catatan-keperawatan-intra-op-44" value="1" class="mr-1 ">Lain - lain
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="catatan_keperawatan_intra_op_45" id="catatan-keperawatan-intra-op-45" class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan" disabled>
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="catatan_keperawatan_intra_op_46" id="catatan-keperawatan-intra-op-46" class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan" disabled>
                                                                </td>
                                                            </tr>
                                                            <tr></tr>
                                                            <tr></tr>
                                                            <tr></tr>
                                                            <tr>
                                                                <td width="25%">Spesimen untuk pasien</td>
                                                                <td width="1%">:</td>
                                                                <td>
                                                                    Jumlah Total Jaringan / Cairan Pemeriksaan<input type="text" name="catatan_keperawatan_intra_op_47" id="catatan-keperawatan-intra-op-47" class="custom-form clear-input d-inline-block col-lg-3 ml-1" placeholder="sebutkan">
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td width="25%"></td>
                                                                <td width="1%"></td>
                                                                <td>
                                                                    Jenis dari Jaringan<input type="text" name="catatan_keperawatan_intra_op_48" id="catatan-keperawatan-intra-op-48" class="custom-form clear-input d-inline-block col-lg-8 ml-1" placeholder="sebutkan">
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td width="25%"></td>
                                                                <td width="1%"></td>
                                                                <td>
                                                                    Jumlah Jaringan<input type="text" name="catatan_keperawatan_intra_op_49" id="catatan-keperawatan-intra-op-49" class="custom-form clear-input d-inline-block col-lg-8 ml-1" placeholder="sebutkan">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%">Keterangan</td>
                                                                <td width="1%">:</td>
                                                                <td>
                                                                    <input type="text" name="catatan_keperawatan_intra_op_50" id="catatan-keperawatan-intra-op-50" class="custom-form clear-input d-inline-block col-lg-10 ml-1" placeholder="sebutkan">
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td width="25%">Tanggal & Jam :<input type="text" name="tanggal_jam_ckio" id="tanggal-jam-ckio" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="dd/mm/yyyy hh:ii"></td>
                                                                <td width="1%"></td>
                                                                <td></td>
                                                            </tr>

                                                        </table>
                                                        <table class="table table-no-border table-sm table-striped">
                                                            <tr>
                                                                <td width="30%">Perawat Instrument <input type="text" name="perawat_instrument_1" id="perawat-instrument-1" class="select2c-input ml-2"></td>
                                                                <td width="30%">Perawat Asisten <input type="text" name="perawat_instrument_2" id="perawat-instrument-2" class="select2c-input ml-2"></td>
                                                                <td width="30%"></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- CATATAN KEPERAWATAN INTRA OPERASI AWAL  -->

                                        <!-- ASUHAN KEPERAWATN AWAL ke 2-->
                                        <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                            <tr>
                                                <td colspan="3" class="center bold td-dark">
                                                    <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-assuhan-keperawatan-2"><i class="fas fa-expand mr-1"></i>Expand</button>ASUHAN KEPERAWATAN
                                                </td>
                                            </tr>
                                        </table>

                                        <div class="collapse multi-collapse mt-2" id="data-assuhan-keperawatan-2">
                                            <table class="table table-no-border table-sm table-striped">
                                                <tr>
                                                    <td width="100%">
                                                        <table class="table table-sm table-striped table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th class="center" colspan="9"><b></b></th>
                                                                </tr>
                                                                <tr>
                                                                    <th width="33%"></th>
                                                                    <td widtd="33%" class="center"><b>ASUHAN KEPERAWATAN</b></td>
                                                                    <th width="33%"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="center"><b>MASALAH KEPERAWATAN</b></td>
                                                                    <td class="center"><b>INTERVENSI KEPERAWATAN</b></td>
                                                                    <td class="center"><b>EVALUASI</b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_1" id="asuhan-keperawatannnnn-ak-1" value="1" class="mr-1">
                                                                        Bersihan jalan nafas tidak efektif
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_2" id="asuhan-keperawatannnnn-ak-2" value="1" class="mr-1">
                                                                        Monitor pola nafas
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_3" id="asuhan-keperawatannnnn-ak-3" value="1" class="mr-1">
                                                                        Dispnea menurun
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_4" id="asuhan-keperawatannnnn-ak-4" value="1" class="mr-1">
                                                                        Hipersekresi jalan nafas
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_5" id="asuhan-keperawatannnnn-ak-5" value="1" class="mr-1">
                                                                        Monitor bunyi nafas
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_6" id="asuhan-keperawatannnnn-ak-6" value="1" class="mr-1">
                                                                        Wheezing menurun
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_7" id="asuhan-keperawatannnnn-ak-7" value="1" class="mr-1">
                                                                        Disfungsi neuromuskuler
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_8" id="asuhan-keperawatannnnn-ak-8" value="1" class="mr-1">
                                                                        Monitor sesuai oksigen
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_9" id="asuhan-keperawatannnnn-ak-9" value="1" class="mr-1">
                                                                        Sianosis menurun
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_10" id="asuhan-keperawatannnnn-ak-10" value="1" class="mr-1">
                                                                        Adanya jalan nafas buatan
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_11" id="asuhan-keperawatannnnn-ak-11" value="1" class="mr-1">
                                                                        Pertahankan kepatenan jalan nafas
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_12" id="asuhan-keperawatannnnn-ak-12" value="1" class="mr-1">
                                                                        Frekuensi nafas membaik
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_13" id="asuhan-keperawatannnnn-ak-13" value="1" class="mr-1">
                                                                        Efek agen farmakologis (mis.Anestesi)
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_14" id="asuhan-keperawatannnnn-ak-14" value="1" class="mr-1">
                                                                        Lakukan penghisap lendir dari 15 detik
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_15" id="asuhan-keperawatannnnn-ak-15" value="1" class="mr-1">
                                                                        Pola nafas membaik
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_16" id="asuhan-keperawatannnnn-ak-16" value="1" class="mr-1">
                                                                        <input type="text" name="asuhan_keperawatannnnn_ak_17" id="asuhan-keperawatannnnn-ak-17" class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_18" id="asuhan-keperawatannnnn-ak-18" value="1" class="mr-1">
                                                                        Berikan oksigen jika perlu
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_19" id="asuhan-keperawatannnnn-ak-19" value="1" class="mr-1">
                                                                        <input type="text" name="asuhan_keperawatannnnn_ak_20" id="asuhan-keperawatannnnn-ak-20" class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_21" id="asuhan-keperawatannnnn-ak-21" value="1" class="mr-1">
                                                                        Resiko perdarahan
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_22" id="asuhan-keperawatannnnn-ak-22" value="1" class="mr-1">
                                                                        <input type="text" name="asuhan_keperawatannnnn_ak_23" id="asuhan-keperawatannnnn-ak-23" class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_24" id="asuhan-keperawatannnnn-ak-24" value="1" class="mr-1">
                                                                        Kelembapan membran mukosa meningkat
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_25" id="asuhan-keperawatannnnn-ak-25" value="1" class="mr-1">
                                                                        Aneurisma
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_26" id="asuhan-keperawatannnnn-ak-26" value="1" class="mr-1">
                                                                        Monitor tanda dan gejala perdarahan
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_27" id="asuhan-keperawatannnnn-ak-27" value="1" class="mr-1">
                                                                        Kelembapan kulit meningkat
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_28" id="asuhan-keperawatannnnn-ak-28" value="1" class="mr-1">
                                                                        Gangguan koagulasi
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_29" id="asuhan-keperawatannnnn-ak-29" value="1" class="mr-1">
                                                                        Monitor tanda - tanda vital
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_30" id="asuhan-keperawatannnnn-ak-30" value="1" class="mr-1">
                                                                        Hemoptisis menurun
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_31" id="asuhan-keperawatannnnn-ak-31" value="1" class="mr-1">
                                                                        Efek agen farmakologis
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_32" id="asuhan-keperawatannnnn-ak-32" value="1" class="mr-1">
                                                                        Pertahankan bedrest selama perdarahan
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_33" id="asuhan-keperawatannnnn-ak-33" value="1" class="mr-1">
                                                                        Perdarahan pasca operasi menurun
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_34" id="asuhan-keperawatannnnn-ak-34" value="1" class="mr-1">
                                                                        Tindakan pembedahan
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_35" id="asuhan-keperawatannnnn-ak-35" value="1" class="mr-1">
                                                                        Kolaborasi pemberian obat pengontrol perdarahan
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_36" id="asuhan-keperawatannnnn-ak-36" value="1" class="mr-1">
                                                                        Tekanan darah membaik
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_37" id="asuhan-keperawatannnnn-ak-37" value="1" class="mr-1">
                                                                        Trauma
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_38" id="asuhan-keperawatannnnn-ak-38" value="1" class="mr-1">
                                                                        Kolaborasi pemberian produk darah
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_39" id="asuhan-keperawatannnnn-ak-39" value="1" class="mr-1">
                                                                        Denyut nadi apikal membaik
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_40" id="asuhan-keperawatannnnn-ak-40" value="1" class="mr-1">
                                                                        <input type="text" name="asuhan_keperawatannnnn_ak_41" id="asuhan-keperawatannnnn-ak-41" class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_42" id="asuhan-keperawatannnnn-ak-42" value="1" class="mr-1">
                                                                        <input type="text" name="asuhan_keperawatannnnn_ak_43" id="asuhan-keperawatannnnn-ak-43" class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_44" id="asuhan-keperawatannnnn-ak-44" value="1" class="mr-1">
                                                                        Kekuatan nadi meningkat
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_45" id="asuhan-keperawatannnnn-ak-45" value="1" class="mr-1">
                                                                        Resiko syok
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_46" id="asuhan-keperawatannnnn-ak-46" value="1" class="mr-1">
                                                                        Monitor status kardiopulmonal
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_47" id="asuhan-keperawatannnnn-ak-47" value="1" class="mr-1">
                                                                        Output urin meningkat
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_48" id="asuhan-keperawatannnnn-ak-48" value="1" class="mr-1">
                                                                        Hipoksemia
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_49" id="asuhan-keperawatannnnn-ak-49" value="1" class="mr-1">
                                                                        Monitor status oksigenasi
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_50" id="asuhan-keperawatannnnn-ak-50" value="1" class="mr-1">
                                                                        Tingkat kesadaran meningkat
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_51" id="asuhan-keperawatannnnn-ak-51" value="1" class="mr-1">
                                                                        Hipoksia
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_52" id="asuhan-keperawatannnnn-ak-52" value="1" class="mr-1">
                                                                        Monitor status cairan
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_53" id="asuhan-keperawatannnnn-ak-53" value="1" class="mr-1">
                                                                        Saturasi oksigen meningkat
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_54" id="asuhan-keperawatannnnn-ak-54" value="1" class="mr-1">
                                                                        Hipotensi
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_55" id="asuhan-keperawatannnnn-ak-55" value="1" class="mr-1">
                                                                        Monitor tingkat kesadaran
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_56" id="asuhan-keperawatannnnn-ak-56" value="1" class="mr-1">
                                                                        Tekanan darah membaik
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_57" id="asuhan-keperawatannnnn-ak-57" value="1" class="mr-1">
                                                                        Kekurangan volume cairan
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_58" id="asuhan-keperawatannnnn-ak-58" value="1" class="mr-1">
                                                                        Persiapkan intubasi, jika perlu
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_59" id="asuhan-keperawatannnnn-ak-59" value="1" class="mr-1">
                                                                        Frekuensi nadi membaik
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_60" id="asuhan-keperawatannnnn-ak-60" value="1" class="mr-1">
                                                                        Sepsis
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_61" id="asuhan-keperawatannnnn-ak-61" value="1" class="mr-1">
                                                                        Kolaborasi pemberian IV
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_62" id="asuhan-keperawatannnnn-ak-62" value="1" class="mr-1">
                                                                        <input type="text" name="asuhan_keperawatannnnn_ak_63" id="asuhan-keperawatannnnn-ak-63" class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_64" id="asuhan-keperawatannnnn-ak-64" value="1" class="mr-1">
                                                                        SIRS
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_65" id="asuhan-keperawatannnnn-ak-65" value="1" class="mr-1">
                                                                        Kolaborasi pemberian transfusi darah
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_66" id="asuhan-keperawatannnnn-ak-66" value="1" class="mr-1">
                                                                        Kebersihan tangan meningkat
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_67" id="asuhan-keperawatannnnn-ak-67" value="1" class="mr-1">
                                                                        <input type="text" name="asuhan_keperawatannnnn_ak_68" id="asuhan-keperawatannnnn-ak-68" class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_69" id="asuhan-keperawatannnnn-ak-69" value="1" class="mr-1">
                                                                        <input type="text" name="asuhan_keperawatannnnn_ak_70" id="asuhan-keperawatannnnn-ak-70" class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_71" id="asuhan-keperawatannnnn-ak-71" value="1" class="mr-1">
                                                                        Demam menurun
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_72" id="asuhan-keperawatannnnn-ak-72" value="1" class="mr-1">
                                                                        Resiko infeksi
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_73" id="asuhan-keperawatannnnn-ak-73" value="1" class="mr-1">
                                                                        Monitor tanda dan gejala lokal dan sistematik
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_74" id="asuhan-keperawatannnnn-ak-74" value="1" class="mr-1">
                                                                        Kemerahan menurun
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_75" id="asuhan-keperawatannnnn-ak-75" value="1" class="mr-1">
                                                                        Efek prosedur invasif
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_76" id="asuhan-keperawatannnnn-ak-76" value="1" class="mr-1">
                                                                        Cuci tangan 5 moment
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_77" id="asuhan-keperawatannnnn-ak-77" value="1" class="mr-1">
                                                                        Nyeri menurun
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_78" id="asuhan-keperawatannnnn-ak-78" value="1" class="mr-1">
                                                                        Peningkatan paparan organisme patogen lingkungan
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_79" id="asuhan-keperawatannnnn-ak-79" value="1" class="mr-1">
                                                                        Pertahankan tehnik aseptik pada pasien beresiko tinggi
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_80" id="asuhan-keperawatannnnn-ak-80" value="1" class="mr-1">
                                                                        Bengkak menurun
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_81" id="asuhan-keperawatannnnn-ak-81" value="1" class="mr-1">
                                                                        <input type="text" name="asuhan_keperawatannnnn_ak_82" id="asuhan-keperawatannnnn-ak-82" class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_83" id="asuhan-keperawatannnnn-ak-83" value="1" class="mr-1">
                                                                        Lakukan desinfeksi daerah yang akan dilakukan operasi dengan desinfektan
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_84" id="asuhan-keperawatannnnn-ak-84" value="1" class="mr-1">
                                                                        Kadar sel darah putih membaik
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_85" id="asuhan-keperawatannnnn-ak-85" value="1" class="mr-1">
                                                                        Nausea
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_86" id="asuhan-keperawatannnnn-ak-86" value="1" class="mr-1">
                                                                        <input type="text" name="asuhan_keperawatannnnn_ak_87" id="asuhan-keperawatannnnn-ak-87" class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_88" id="asuhan-keperawatannnnn-ak-88" value="1" class="mr-1">
                                                                        <input type="text" name="asuhan_keperawatannnnn_ak_89" id="asuhan-keperawatannnnn-ak-89" class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_90" id="asuhan-keperawatannnnn-ak-90" value="1" class="mr-1">
                                                                        Mengeluh mual
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_91" id="asuhan-keperawatannnnn-ak-91" value="1" class="mr-1">
                                                                        Identifikasi mual
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_92" id="asuhan-keperawatannnnn-ak-92" value="1" class="mr-1">
                                                                        Keluhan mual menurun
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_93" id="asuhan-keperawatannnnn-ak-93" value="1" class="mr-1">
                                                                        Merasa ingin muntah
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_94" id="asuhan-keperawatannnnn-ak-94" value="1" class="mr-1">
                                                                        Identifikasi karakteristik muntah
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_95" id="asuhan-keperawatannnnn-ak-95" value="1" class="mr-1">
                                                                        Perasaan ingin muntah menurun
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_96" id="asuhan-keperawatannnnn-ak-96" value="1" class="mr-1">
                                                                        Diaforesis
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_97" id="asuhan-keperawatannnnn-ak-97" value="1" class="mr-1">
                                                                        Monitor mual
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_98" id="asuhan-keperawatannnnn-ak-98" value="1" class="mr-1">
                                                                        <input type="text" name="asuhan_keperawatannnnn_ak_99" id="asuhan-keperawatannnnn-ak-99" class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_100" id="asuhan-keperawatannnnn-ak-100" value="1" class="mr-1">
                                                                        <input type="text" name="asuhan_keperawatannnnn_ak_101" id="asuhan-keperawatannnnn-ak-101" class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_102" id="asuhan-keperawatannnnn-ak-102" value="1" class="mr-1">
                                                                        Bersihkan mulut dan hidung
                                                                    </td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_103" id="asuhan-keperawatannnnn-ak-103" value="1" class="mr-1">
                                                                        Atur posisi untuk mencegah aspirasi
                                                                    </td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_104" id="asuhan-keperawatannnnn-ak-104" value="1" class="mr-1">
                                                                        Kolaborasi pemberian antiemetik
                                                                    </td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td><input type="checkbox" name="asuhan_keperawatannnnn_ak_105" id="asuhan-keperawatannnnn-ak-105" value="1" class="mr-1">
                                                                        <input type="text" name="asuhan_keperawatannnnn_ak_106" id="asuhan-keperawatannnnn-ak-106" class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                    <td></td>
                                                                </tr>

                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="center"><b>Perawat Asisten</b></td>
                                                                    <td class="center"><b>Perawat Anastesi </b></td>
                                                                    <td class="center"><b>Perawat Kamar Bedah</b></td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="center"><input type="text" name="perawwat_ruangan_prr" id="perawwat-ruangan-prr" class="select2c-input ml-2">
                                                                    </td>
                                                                    <td class="center"><input type="text" name="perawwat_anastesi_paa" id="perawwat-anastesi-paa" class="select2c-input ml-2">
                                                                    </td>
                                                                    <td class="center"><input type="text" name="perawwat_kamar_bedahh" id="perawwat-kamar-bedahh" class="select2c-input ml-2">
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- ASUHAN KEPERAWATN AKHIR KE 2-->

                                        <!--  CATATAN KEPERAWATAN SESUDAH OPERASI Post-Operative Nursing Record (Diisi oleh staf Perawat Ruang Pulih Sadar) AWAL -->
                                        <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                            <tr>
                                                <td colspan="3" class="center bold td-dark">
                                                    <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-catatan-keperawatan-sesudah-operasi"><i class="fas fa-expand mr-1"></i>Expand</button>C. CATATAN KEPERAWATAN SESUDAH OPERASI Post-Operative Nursing Record (Diisi oleh staf Perawat Ruang Pulih Sadar)
                                                </td>
                                            </tr>
                                        </table>

                                        <div class="collapse multi-collapse mt-2" id="data-catatan-keperawatan-sesudah-operasi">
                                            <table class="table table-no-border table-sm table-striped">
                                                <tr>
                                                    <td width="100%">
                                                        <table class="table table-sm table-striped table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th class="center" colspan="9"><b></b></th>
                                                                </tr>
                                                                <tr>
                                                                    <td widtd="25%">Ruang Pulih Sadar : &nbsp;&nbsp;<input type="checkbox" name="catatan_keperawatan_sesudah_operasi_1" id="catatan-keperawatan-sesudah-operasi-1" value="1" class="mr-1">
                                                                    </td>
                                                                    <td widtd="25%"> Masuk Jam : <input type="text" name="catatan_keperawatan_sesudah_operasi_2" id="catatan-keperawatan-sesudah-operasi-2" class="custom-form clear-input d-inline-block col-lg-2 ml-2" placeholder="isi jam">
                                                                    </td>
                                                                    <td widtd="25%">Ruang Pulih Sadar : &nbsp;&nbsp;<input type="checkbox" name="catatan_keperawatan_sesudah_operasi_3" id="catatan-keperawatan-sesudah-operasi-3" value="1" class="mr-1">
                                                                    </td>
                                                                    <td widtd="25%"> Kembali langsung ke Ruangan/ICU : <input type="text" name="catatan_keperawatan_sesudah_operasi_4" id="catatan-keperawatan-sesudah-operasi-4" class="custom-form clear-input d-inline-block col-lg-2 ml-1">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td widtd="25%"></td>
                                                                    <td widtd="25%">Keluar Jam : <input type="text" name="catatan_keperawatan_sesudah_operasi_5" id="catatan-keperawatan-sesudah-operasi-5" class="custom-form clear-input d-inline-block col-lg-2 ml-1" placeholder="isi jam">
                                                                    </td>
                                                                    <td widtd="25%"></td>
                                                                    <td widtd="25%"></td>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                        <table class="table table-sm table-striped table-bordered">
                                                            <tr>
                                                                <td width="25%">1. Keadaan Umum</td>
                                                                <td width="1%">:</td>
                                                                <td width="74%">
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_1" id="catatan-keperawatan-sesudah-op-1" value="1" class="mr-1">Memuaskan
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_2" id="catatan-keperawatan-sesudah-op-2" value="1" class="mr-1 ml-4">Jelek

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%">2. Status mental</td>
                                                                <td width="1%">:</td>
                                                                <td width="74%">
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_3" id="catatan-keperawatan-sesudah-op-3" value="1" class="mr-1">Terjaga
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_4" id="catatan-keperawatan-sesudah-op-4" value="1" class="mr-1 ml-4">Mudah dibangunkan
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_5" id="catatan-keperawatan-sesudah-op-5" value="1" class="mr-1 ml-4">Tidak ada respon
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%">3. Jalan nafas</td>
                                                                <td width="1%">:</td>
                                                                <td width="74%">
                                                                    <!-- <input type="checkbox" name="catatan_keperawatan_sesudah_op_6" id="catatan-keperawatan-sesudah-op-6" value="1" class="mr-1">Datang -->

                                                                    Datang <input type="text" name="catatan_keperawatan_sesudah_op_6" id="catatan-keperawatan-sesudah-op-6" class="custom-form clear-input d-inline-block col-lg-1 ml-1">

                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_7" id="catatan-keperawatan-sesudah-op-7" value="1" class="mr-1 ml-4">Tidak
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_8" id="catatan-keperawatan-sesudah-op-8" value="1" class="mr-1 ml-4">Oral
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_9" id="catatan-keperawatan-sesudah-op-9" value="1" class="mr-1 ml-4">Nasal
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_10" id="catatan-keperawatan-sesudah-op-10" value="1" class="mr-1 ml-4">Lain - lain
                                                                    <input type="text" name="catatan_keperawatan_sesudah_op_11" id="catatan-keperawatan-sesudah-op-11" class="custom-form clear-input d-inline-block col-lg-2 ml-1" placeholder="Sebutkan" disabled>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%"></td>
                                                                <td width="1%"></td>
                                                                <td width="74%">
                                                                    <!-- <input type="checkbox" name="catatan_keperawatan_sesudah_op_12" id="catatan-keperawatan-sesudah-op-12" value="1" class="mr-1">Keluar -->

                                                                    Keluar <input type="text" name="catatan_keperawatan_sesudah_op_12" id="catatan-keperawatan-sesudah-op-12" class="custom-form clear-input d-inline-block col-lg-1 ml-1">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%">4. Terapi Oksigen <input type="text" name="catatan_keperawatan_sesudah_op_13" id="catatan-keperawatan-sesudah-op-13" class="custom-form clear-input d-inline-block col-lg-4 ml-1"> Lpm</td>
                                                                <td width="1%">:</td>
                                                                <td width="74%">
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_14" id="catatan-keperawatan-sesudah-op-14" value="1" class="mr-1">Tidak
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_15" id="catatan-keperawatan-sesudah-op-15" value="1" class="mr-1 ml-4">Oral
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_16" id="catatan-keperawatan-sesudah-op-16" value="1" class="mr-1 ml-4">Nasal
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_17" id="catatan-keperawatan-sesudah-op-17" value="1" class="mr-1 ml-4">Lain - lain
                                                                    <input type="text" name="catatan_keperawatan_sesudah_op_18" id="catatan-keperawatan-sesudah-op-18" class="custom-form clear-input d-inline-block col-lg-2 ml-1" placeholder="Sebutkan" disabled>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%">5. Kulit / Skin</td>
                                                                <td width="1%">:</td>
                                                                <td width="74%">
                                                                    <!-- <input type="checkbox" name="catatan_keperawatan_sesudah_op_19" id="catatan-keperawatan-sesudah-op-19" value="1" class="mr-1">Datang -->

                                                                    Datang <input type="text" name="catatan_keperawatan_sesudah_op_19" id="catatan-keperawatan-sesudah-op-19" class="custom-form clear-input d-inline-block col-lg-1 ml-1">


                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_20" id="catatan-keperawatan-sesudah-op-20" value="1" class="mr-1 ml-4">Kering
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_21" id="catatan-keperawatan-sesudah-op-21" value="1" class="mr-1 ml-4">Lembab*
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_22" id="catatan-keperawatan-sesudah-op-22" value="1" class="mr-1 ml-4">Merah muda*
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_23" id="catatan-keperawatan-sesudah-op-23" value="1" class="mr-1 ml-4">Kebiru-biruan
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_24" id="catatan-keperawatan-sesudah-op-24" value="1" class="mr-1 ml-4">Hangat
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_25" id="catatan-keperawatan-sesudah-op-25" value="1" class="mr-1 ml-4">Dingin
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_26" id="catatan-keperawatan-sesudah-op-26" value="1" class="mr-1 ml-4">Lain - lain
                                                                    <input type="text" name="catatan_keperawatan_sesudah_op_27" id="catatan-keperawatan-sesudah-op-27" class="custom-form clear-input d-inline-block col-lg-1 ml-1" placeholder="Sebutkan" disabled>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%"></td>
                                                                <td width="1%"></td>
                                                                <td width="74%">
                                                                    <!-- <input type="checkbox" name="catatan_keperawatan_sesudah_op_28" id="catatan-keperawatan-sesudah-op-28" value="1" class="mr-1">Keluar -->

                                                                    Keluar <input type="text" name="catatan_keperawatan_sesudah_op_28" id="catatan-keperawatan-sesudah-op-28" class="custom-form clear-input d-inline-block col-lg-1 ml-1">


                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_29" id="catatan-keperawatan-sesudah-op-29" value="1" class="mr-1 ml-4">Kering
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_30" id="catatan-keperawatan-sesudah-op-30" value="1" class="mr-1 ml-4">Lembab*
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_31" id="catatan-keperawatan-sesudah-op-31" value="1" class="mr-1 ml-4">Merah muda*
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_32" id="catatan-keperawatan-sesudah-op-32" value="1" class="mr-1 ml-4">Kebiru-biruan
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_33" id="catatan-keperawatan-sesudah-op-33" value="1" class="mr-1 ml-4">Hangat
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_34" id="catatan-keperawatan-sesudah-op-34" value="1" class="mr-1 ml-4">Dingin
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_35" id="catatan-keperawatan-sesudah-op-35" value="1" class="mr-1 ml-4">Lain - lain
                                                                    <input type="text" name="catatan_keperawatan_sesudah_op_36" id="catatan-keperawatan-sesudah-op-36" class="custom-form clear-input d-inline-block col-lg-1 ml-1" placeholder="Sebutkan" disabled>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%">6. Sirkulasi anggota badan</td>
                                                                <td width="1%">:</td>
                                                                <td width="74%">
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_37" id="catatan-keperawatan-sesudah-op-37" value="1" class="mr-1">Merah muda
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_38" id="catatan-keperawatan-sesudah-op-38" value="1" class="mr-1 ml-4">Kebiru-biruan
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%">7. Posisi Pasien</td>
                                                                <td width="1%">:</td>
                                                                <td width="74%">
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_39" id="catatan-keperawatan-sesudah-op-39" value="1" class="mr-1">Lateral Ki.Ka&nbsp;&nbsp;&nbsp;
                                                                    <input type="radio" name="catatan_keperawatan_sesudah_op_40" id="catatan-keperawatan-sesudah-op-40" class="mr-1" value="1">Kiri&nbsp;&nbsp;&nbsp;
                                                                    <input type="radio" name="catatan_keperawatan_sesudah_op_40" id="catatan-keperawatan-sesudah-op-41" class="mr-1" value="2">Kanan
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_42" id="catatan-keperawatan-sesudah-op-42" value="1" class="mr-1 ml-4">Tersenggah
                                                                    <input type="checkbox" name="catatan_keperawatan_sesudah_op_43" id="catatan-keperawatan-sesudah-op-43" value="1" class="mr-1 ml-4">Lain - lain
                                                                    <input type="text" name="catatan_keperawatan_sesudah_op_44" id="catatan-keperawatan-sesudah-op-44" class="custom-form clear-input d-inline-block col-lg-2 ml-1" placeholder="Sebutkan" disabled>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!--  CATATAN KEPERAWATAN SESUDAH OPERASI Post-Operative Nursing Record (Diisi oleh staf Perawat Ruang Pulih Sadar) AKHIR -->

                                        <!--  CEKLIS PERSIAPAN OPERASI/Pre-Operative Nursing record(Diisi oleh Perawat Ruangan dan Perawat Kamar Bedah) AWAL -->
                                        <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                            <tr>
                                                <td colspan="3" class="center bold td-dark">
                                                    <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-ceklis-persiapan-operasi"><i class="fas fa-expand mr-1"></i>Expand</button>D. CEKLIS PERSIAPAN OPERASI/Pre-Operative Nursing record(Diisi oleh Perawat Ruangan dan Perawat Kamar Bedah)
                                                </td>
                                            </tr>
                                        </table>

                                        <div class="collapse multi-collapse mt-2" id="data-ceklis-persiapan-operasi"> <br>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                    </table>
                                                    <table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
                                                        <thead>
                                                            <tr>
                                                                <th width="10%" class="center"><b>Nadi</b></th>
                                                                <th width="10%" class="center"><b>Waktu Masuk</b></th>
                                                                <th width="10%" class="center"><b>Waktu Keluar</b></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td width="10%" class="center">Teratur</td>
                                                                <td width="10%" class="center"><input type="checkbox" name="ceklis_persiapan_operasi_1" id="ceklis-persiapan-operasi-1" value="1" class="mr-1"></td>
                                                                <td width="10%" class="center"><input type="checkbox" name="ceklis_persiapan_operasi_2" id="ceklis-persiapan-operasi-2" value="1" class="mr-1"></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="10%" class="center">Tidak Teratur</td>
                                                                <td width="10%" class="center"><input type="checkbox" name="ceklis_persiapan_operasi_3" id="ceklis-persiapan-operasi-3" value="1" class="mr-1"></td>
                                                                <td width="10%" class="center"><input type="checkbox" name="ceklis_persiapan_operasi_4" id="ceklis-persiapan-operasi-4" value="1" class="mr-1"></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="10%" class="center">Lemah</td>
                                                                <td width="10%" class="center"><input type="checkbox" name="ceklis_persiapan_operasi_5" id="ceklis-persiapan-operasi-5" value="1" class="mr-1"></td>
                                                                <td width="10%" class="center"><input type="checkbox" name="ceklis_persiapan_operasi_6" id="ceklis-persiapan-operasi-6" value="1" class="mr-1"></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="10%" class="center">Thready</td>
                                                                <td width="10%" class="center"><input type="checkbox" name="ceklis_persiapan_operasi_7" id="ceklis-persiapan-operasi-7" value="1" class="mr-1"></td>
                                                                <td width="10%" class="center"><input type="checkbox" name="ceklis_persiapan_operasi_8" id="ceklis-persiapan-operasi-8" value="1" class="mr-1"></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="10%" class="center">Normal</td>
                                                                <td width="10%" class="center"><input type="checkbox" name="ceklis_persiapan_operasi_9" id="ceklis-persiapan-operasi-9" value="1" class="mr-1"></td>
                                                                <td width="10%" class="center"><input type="checkbox" name="ceklis_persiapan_operasi_10" id="ceklis-persiapan-operasi-10" value="1" class="mr-1"></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="10%" class="center"><input type="text" name="ceklis_persiapan_operasi_11" id="ceklis-persiapan-operasi-11" class="custom-form clear-input d-inline-block col-lg-6"></td>
                                                                <td width="10%" class="center"><input type="checkbox" name="ceklis_persiapan_operasi_12" id="ceklis-persiapan-operasi-12" value="1" class="mr-1"></td>
                                                                <td width="10%" class="center"><input type="checkbox" name="ceklis_persiapan_operasi_13" id="ceklis-persiapan-operasi-13" value="1" class="mr-1"></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="10%" class="center"><input type="text" name="ceklis_persiapan_operasi_14" id="ceklis-persiapan-operasi-14" class="custom-form clear-input d-inline-block col-lg-6"></td>
                                                                <td width="10%" class="center"><input type="checkbox" name="ceklis_persiapan_operasi_15" id="ceklis-persiapan-operasi-15" value="1" class="mr-1"></td>
                                                                <td width="10%" class="center"><input type="checkbox" name="ceklis_persiapan_operasi_16" id="ceklis-persiapan-operasi-16" value="1" class="mr-1"></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="10%" class="center"></td>
                                                                <td width="10%" class="center"></td>
                                                                <td width="10%" class="center"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-lg-6">
                                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                    </table>
                                                    <table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
                                                        <thead>
                                                            <tr>
                                                                <th width="10%" class="center"><b>Nadi</b></th>
                                                                <th width="10%" class="center"><b>Waktu Masuk</b></th>
                                                                <th width="10%" class="center"><b>Waktu Keluar</b></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td width="10%" class="center">Teratur</td>
                                                                <td width="10%" class="center"><input type="checkbox" name="ceklis_persiapan_operasii_1" id="ceklis-persiapan-operasii-1" value="1" class="mr-1"></td>
                                                                <td width="10%" class="center"><input type="checkbox" name="ceklis_persiapan_operasii_2" id="ceklis-persiapan-operasii-2" value="1" class="mr-1"></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="10%" class="center">Tidak Teratur</td>
                                                                <td width="10%" class="center"><input type="checkbox" name="ceklis_persiapan_operasii_3" id="ceklis-persiapan-operasii-3" value="1" class="mr-1"></td>
                                                                <td width="10%" class="center"><input type="checkbox" name="ceklis_persiapan_operasii_4" id="ceklis-persiapan-operasii-4" value="1" class="mr-1"></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="10%" class="center">Lemah</td>
                                                                <td width="10%" class="center"><input type="checkbox" name="ceklis_persiapan_operasii_5" id="ceklis-persiapan-operasii-5" value="1" class="mr-1"></td>
                                                                <td width="10%" class="center"><input type="checkbox" name="ceklis_persiapan_operasii_6" id="ceklis-persiapan-operasii-6" value="1" class="mr-1"></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="10%" class="center">Thready</td>
                                                                <td width="10%" class="center"><input type="checkbox" name="ceklis_persiapan_operasii_7" id="ceklis-persiapan-operasii-7" value="1" class="mr-1"></td>
                                                                <td width="10%" class="center"><input type="checkbox" name="ceklis_persiapan_operasii_8" id="ceklis-persiapan-operasii-8" value="1" class="mr-1"></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="10%" class="center">Normal</td>
                                                                <td width="10%" class="center"><input type="checkbox" name="ceklis_persiapan_operasii_9" id="ceklis-persiapan-operasii-9" value="1" class="mr-1"></td>
                                                                <td width="10%" class="center"><input type="checkbox" name="ceklis_persiapan_operasii_10" id="ceklis-persiapan-operasii-10" value="1" class="mr-1"></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="10%" class="center"><input type="text" name="ceklis_persiapan_operasii_11" id="ceklis-persiapan-operasii-11" class="custom-form clear-input d-inline-block col-lg-6"></td>
                                                                <td width="10%" class="center"><input type="checkbox" name="ceklis_persiapan_operasii_12" id="ceklis-persiapan-operasii-12" value="1" class="mr-1"></td>
                                                                <td width="10%" class="center"><input type="checkbox" name="ceklis_persiapan_operasii_13" id="ceklis-persiapan-operasii-13" value="1" class="mr-1"></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="10%" class="center"><input type="text" name="ceklis_persiapan_operasii_14" id="ceklis-persiapan-operasii-14" class="custom-form clear-input d-inline-block col-lg-6"></td>
                                                                <td width="10%" class="center"><input type="checkbox" name="ceklis_persiapan_operasii_15" id="ceklis-persiapan-operasii-15" value="1" class="mr-1"></td>
                                                                <td width="10%" class="center"><input type="checkbox" name="ceklis_persiapan_operasii_16" id="ceklis-persiapan-operasii-16" value="1" class="mr-1"></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="10%" class="center"></td>
                                                                <td width="10%" class="center"></td>
                                                                <td width="10%" class="center"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-lg-6">
                                                    <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                    </table>
                                                    <table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
                                                        <thead>
                                                            <tr>
                                                                <th width="10%" class="center"><b>Jam / Time</b></th>
                                                                <th width="10%" class="center"><b>Cairan Infus / Infusion Fluid</b></th>
                                                                <th width="10%" class="center"><b>Jumlah / Amount</b></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td width="10%" class="center"><input type="text" name="ceklis_persiapan_operasiii_1" id="ceklis-persiapan-operasiii-1" class="custom-form clear-input d-inline-block col-lg-6" placeholder="masukan jam"></td>
                                                                <td width="10%" class="center"><input type="text" name="ceklis_persiapan_operasiii_2" id="ceklis-persiapan-operasiii-2" class="custom-form clear-input d-inline-block col-lg-6"></td>
                                                                <td width="10%" class="center"><input type="text" name="ceklis_persiapan_operasiii_3" id="ceklis-persiapan-operasiii-3" class="custom-form clear-input d-inline-block col-lg-6"></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="10%" class="center"><input type="text" name="ceklis_persiapan_operasiii_4" id="ceklis-persiapan-operasiii-4" class="custom-form clear-input d-inline-block col-lg-6" placeholder="masukan jam"></td>
                                                                <td width="10%" class="center"><input type="text" name="ceklis_persiapan_operasiii_5" id="ceklis-persiapan-operasiii-5" class="custom-form clear-input d-inline-block col-lg-6"></td>
                                                                <td width="10%" class="center"><input type="text" name="ceklis_persiapan_operasiii_6" id="ceklis-persiapan-operasiii-6" class="custom-form clear-input d-inline-block col-lg-6"></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="10%" class="center"><input type="text" name="ceklis_persiapan_operasiii_7" id="ceklis-persiapan-operasiii-7" class="custom-form clear-input d-inline-block col-lg-6" placeholder="masukan jam"></td>
                                                                <td width="10%" class="center"><input type="text" name="ceklis_persiapan_operasiii_8" id="ceklis-persiapan-operasiii-8" class="custom-form clear-input d-inline-block col-lg-6"></td>
                                                                <td width="10%" class="center"><input type="text" name="ceklis_persiapan_operasiii_9" id="ceklis-persiapan-operasiii-9" class="custom-form clear-input d-inline-block col-lg-6"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- GRAFIK -->
                                                <div class="col-lg-6">
                                                    <div style="background-color: white; padding: .3rem; border-radius: 10px; margin-bottom: .5rem" aria-label="Ini adalah grafik :*">
                                                        <div class="card-body">
                                                            <div id="grafik_ckp"></div>
                                                            <div style="display: flex;justify-content: center;">
                                                                <button type="button" class="btn btn-info btn-xs mr-1 float-left" id="btn-reset-ckp">Reset</button>
                                                                <input type="hidden" id="data-chart-ckp">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <table class="table table-sm table-striped table-bordered">
                                                        <tr>
                                                            <td width="10%" class="center">Suhu</td>
                                                            <td width="10%"><input type="number" name="suhu_ckp" id="suhu-ckp" class="custom-form clear-input d-inline-block col-lg-10"></td>
                                                            <td width="10%" class="center">T Darah</td>
                                                            <td width="10%"><input type="number" name="darah_ckp" id="darah-ckp" class="custom-form clear-input d-inline-block col-lg-10"></td>
                                                            <td width="10%" class="center">S Oksigen</td>
                                                            <td width="10%"><input type="number" name="oksigen_ckp" id="oksigen-ckp" class="custom-form clear-input d-inline-block col-lg-10"></td>
                                                            <td width="10%" class="center">Jam</td>
                                                            <td width="10%"><input type="text" name="jam_ckp" id="jam-ckp" class="custom-form clear-input d-inline-block col-lg-10"></td>
                                                            <td>
                                                                <button type="button" class="btn btn-info btn-xs mr-1 float-left" id="btn-ckp-chart">Tambah</button>
                                                            </td>

                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <table class="table table-sm table-striped table-bordered" <tr>
                                                <td width="2%"></td>
                                                <td width="15%">8. Keterangan</td>
                                                <td width="2%">:</td>
                                                <td colspan="2">
                                                    <textarea name="keterangan_cpo" id="keterangan-cpo" rows="3" class="form-control clear-input" placeholder="keterangan"></textarea>
                                                </td>
                                                </tr>
                                            </table>
                                            <br>
                                            <table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
                                                <thead>
                                                    <tr>
                                                        <td width="50%">Jam Pemberitahuan Perawat Ruangan <input type="text" name="jam_cpo_1" id="jam-cpo-1" class="custom-form clear-input d-inline-block col-lg-3" placeholder="masukan jam"></td>
                                                        <td width="50%">Jam Perawat Datang <input type="text" name="jam_cpo_2" id="jam-cpo-2" class="custom-form clear-input d-inline-block col-lg-3" placeholder="masukan jam"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="50%">Nama Perawat Ruangan <input type="text" name="perawat_cpo" id="perawat-cpo" class="select2c-input ml-2"></td>
                                                        <td width="50%">Barang yang di kembalikan melalui Perawat Ruangan <input type="text" name="barang_cpo" id="barang-cpo" class="custom-form clear-input d-inline-block col-lg-2" placeholder="Sebutkan"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="50%">Perawat Ruangan Pulih <input type="text" name="perawatt_cpo" id="perawatt-cpo" class="select2c-input ml-2"></td>
                                                        <td width="50%">Tanggal & Jam <input type="text" name="jam_tanggal_cpo" id="jam-tanggal-cpo" class="custom-form clear-input d-inline-block col-lg-3" placeholder="masukan tgl & jam"></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <!--  CEKLIS PERSIAPAN OPERASI/Pre-Operative Nursing record(Diisi oleh Perawat Ruangan dan Perawat Kamar Bedah) AKHIR -->

                                        <!-- ASUHAN KEPERAWATN AWAL ke 3-->
                                        <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                            <tr>
                                                <td colspan="3" class="center bold td-dark">
                                                    <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-assuhan-keperawatan-3"><i class="fas fa-expand mr-1"></i>Expand</button>ASUHAN KEPERAWATAN
                                                </td>
                                            </tr>
                                        </table>
                                        
                                        <div class="collapse multi-collapse mt-2" id="data-assuhan-keperawatan-3">
                                            <table class="table table-no-border table-sm table-striped">
                                                <tr>
                                                    <td width="100%">
                                                        <table class="table table-sm table-striped table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th class="center" colspan="9"><b></b></th>
                                                                </tr>
                                                                <tr>
                                                                    <th width="33%"></th>
                                                                    <td widtd="33%" class="center"><b>ASUHAN KEPERAWATAN</b></td>
                                                                    <th width="33%"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="center"><b>MASALAH KEPERAWATAN</b></td>
                                                                    <td class="center"><b>INTERVENSI KEPERAWATAN</b></td>
                                                                    <td class="center"><b>EVALUASI</b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_1" id="asssuhan-keperawatannnnn-ak-1" value="1" class="mr-1">
                                                                        Bersihan jalan nafas tidak efektif
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_2" id="asssuhan-keperawatannnnn-ak-2" value="1" class="mr-1">
                                                                        Monitor pola nafas
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_3" id="asssuhan-keperawatannnnn-ak-3" value="1" class="mr-1">
                                                                        Dispnea menurun
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_4" id="asssuhan-keperawatannnnn-ak-4" value="1" class="mr-1">
                                                                        Hipersekresi jalan nafas
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_5" id="asssuhan-keperawatannnnn-ak-5" value="1" class="mr-1">
                                                                        Monitor bunyi nafas
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_6" id="asssuhan-keperawatannnnn-ak-6" value="1" class="mr-1">
                                                                        Wheezing menurun
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_7" id="asssuhan-keperawatannnnn-ak-7" value="1" class="mr-1">
                                                                        Disfungsi neuromuskuler
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_8" id="asssuhan-keperawatannnnn-ak-8" value="1" class="mr-1">
                                                                        Monitor saturasi oksigen
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_9" id="asssuhan-keperawatannnnn-ak-9" value="1" class="mr-1">
                                                                        Sianosis menurun
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_10" id="asssuhan-keperawatannnnn-ak-10" value="1" class="mr-1">
                                                                        Adanya jalan nafas buatan
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_11" id="asssuhan-keperawatannnnn-ak-11" value="1" class="mr-1">
                                                                        Pertahankan kepatenan jalan nafas
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_12" id="asssuhan-keperawatannnnn-ak-12" value="1" class="mr-1">
                                                                        Frekuensi nafas membaik
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_13" id="asssuhan-keperawatannnnn-ak-13" value="1" class="mr-1">
                                                                        Efek agen farmakologis (mis.Anastesi)
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_14" id="asssuhan-keperawatannnnn-ak-14" value="1" class="mr-1">
                                                                        Lakukan penghisap lendir dari 15 detik
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_15" id="asssuhan-keperawatannnnn-ak-15" value="1" class="mr-1">
                                                                        Pola nafas membaik
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_16" id="asssuhan-keperawatannnnn-ak-16" value="1" class="mr-1">
                                                                        <input type="text" name="asssuhan_keperawatannnnn_ak_17" id="asssuhan-keperawatannnnn-ak-17" class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_18" id="asssuhan-keperawatannnnn-ak-18" value="1" class="mr-1">
                                                                        Berikan oksigen jika perlu
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_19" id="asssuhan-keperawatannnnn-ak-19" value="1" class="mr-1">
                                                                        <input type="text" name="asssuhan_keperawatannnnn_ak_20" id="asssuhan-keperawatannnnn-ak-20" class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_21" id="asssuhan-keperawatannnnn-ak-21" value="1" class="mr-1">
                                                                        Resiko Perdarahan
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_22" id="asssuhan-keperawatannnnn-ak-22" value="1" class="mr-1">
                                                                        <input type="text" name="asssuhan_keperawatannnnn_ak_23" id="asssuhan-keperawatannnnn-ak-23" class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_24" id="asssuhan-keperawatannnnn-ak-24" value="1" class="mr-1">
                                                                        Kelembapan membran mukosa meningkat
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_25" id="asssuhan-keperawatannnnn-ak-25" value="1" class="mr-1">
                                                                        Aunerisma
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_26" id="asssuhan-keperawatannnnn-ak-26" value="1" class="mr-1">
                                                                        Monitor tanda dan gejala perdarahan
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_27" id="asssuhan-keperawatannnnn-ak-27" value="1" class="mr-1">
                                                                        Kelembapan kulit meningkat
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_28" id="asssuhan-keperawatannnnn-ak-28" value="1" class="mr-1">
                                                                        Gangguan Koagulasi
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_29" id="asssuhan-keperawatannnnn-ak-29" value="1" class="mr-1">
                                                                        Monitor tanda - tanda vital
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_30" id="asssuhan-keperawatannnnn-ak-30" value="1" class="mr-1">
                                                                        Hemoptisis menurun
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_31" id="asssuhan-keperawatannnnn-ak-31" value="1" class="mr-1">
                                                                        Efek Agen Farmakologis
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_32" id="asssuhan-keperawatannnnn-ak-32" value="1" class="mr-1">
                                                                        Pertahankan bedrest selama perdarahan
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_33" id="asssuhan-keperawatannnnn-ak-33" value="1" class="mr-1">
                                                                        Perdarahan pasca operasi menurun
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_34" id="asssuhan-keperawatannnnn-ak-34" value="1" class="mr-1">
                                                                        Tindakan pembedahan
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_35" id="asssuhan-keperawatannnnn-ak-35" value="1" class="mr-1">
                                                                        Batasi tindakan invasif
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_36" id="asssuhan-keperawatannnnn-ak-36" value="1" class="mr-1">
                                                                        Tekanan darah membaik
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_37" id="asssuhan-keperawatannnnn-ak-37" value="1" class="mr-1">
                                                                        Trauma
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_38" id="asssuhan-keperawatannnnn-ak-38" value="1" class="mr-1">
                                                                        Kolaborasi pemberian obat pengontrol perdarahan
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_39" id="asssuhan-keperawatannnnn-ak-39" value="1" class="mr-1">
                                                                        Denyut nadi apikal membaik
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_40" id="asssuhan-keperawatannnnn-ak-40" value="1" class="mr-1">
                                                                        <input type="text" name="asssuhan_keperawatannnnn_ak_41" id="asssuhan-keperawatannnnn-ak-41" class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_42" id="asssuhan-keperawatannnnn-ak-42" value="1" class="mr-1">
                                                                        Kolaborasi pemberian produk darah
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_43" id="asssuhan-keperawatannnnn-ak-43" value="1" class="mr-1">
                                                                        <input type="text" name="asssuhan_keperawatannnnn_ak_44" id="asssuhan-keperawatannnnn-ak-44" class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_45" id="asssuhan-keperawatannnnn-ak-45" value="1" class="mr-1">
                                                                        Nyeri akut
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_46" id="asssuhan-keperawatannnnn-ak-46" value="1" class="mr-1">
                                                                        <input type="text" name="asssuhan_keperawatannnnn_ak_47" id="asssuhan-keperawatannnnn-ak-47" class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_48" id="asssuhan-keperawatannnnn-ak-48" value="1" class="mr-1">
                                                                        Keluhan nyeri menurun
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_49" id="asssuhan-keperawatannnnn-ak-49" value="1" class="mr-1">
                                                                        Agen cedera fisik (prosedur operasi)
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_50" id="asssuhan-keperawatannnnn-ak-50" value="1" class="mr-1">
                                                                        Identifikasi skala nyeri
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_51" id="asssuhan-keperawatannnnn-ak-51" value="1" class="mr-1">
                                                                        Meringis menurun
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_52" id="asssuhan-keperawatannnnn-ak-52" value="1" class="mr-1">
                                                                        <input type="text" name="asssuhan_keperawatannnnn_ak_53" id="asssuhan-keperawatannnnn-ak-53" class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_54" id="asssuhan-keperawatannnnn-ak-54" value="1" class="mr-1">
                                                                        Identifikasi respon nyeri
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_55" id="asssuhan-keperawatannnnn-ak-55" value="1" class="mr-1">
                                                                        Gelisah menurun
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_56" id="asssuhan-keperawatannnnn-ak-56" value="1" class="mr-1">
                                                                        Hipotermia
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_57" id="asssuhan-keperawatannnnn-ak-57" value="1" class="mr-1">
                                                                        Berikan terapi komplementer
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_58" id="asssuhan-keperawatannnnn-ak-58" value="1" class="mr-1">
                                                                        Frekuensi nadi membaik
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_59" id="asssuhan-keperawatannnnn-ak-59" value="1" class="mr-1">
                                                                        Terpapar suhu lingkungan rendah
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_60" id="asssuhan-keperawatannnnn-ak-60" value="1" class="mr-1">
                                                                        Kolaborasi pemberian analgetik, jika perlu
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_61" id="asssuhan-keperawatannnnn-ak-61" value="1" class="mr-1">
                                                                        <input type="text" name="asssuhan_keperawatannnnn_ak_62" id="asssuhan-keperawatannnnn-ak-62" class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_63" id="asssuhan-keperawatannnnn-ak-63" value="1" class="mr-1">
                                                                        Efek agen farmokologis (anestesi)
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_64" id="asssuhan-keperawatannnnn-ak-64" value="1" class="mr-1">
                                                                        <input type="text" name="asssuhan_keperawatannnnn_ak_65" id="asssuhan-keperawatannnnn-ak-65" class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_66" id="asssuhan-keperawatannnnn-ak-66" value="1" class="mr-1">
                                                                        Menggigil menurun
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_67" id="asssuhan-keperawatannnnn-ak-67" value="1" class="mr-1">
                                                                        <input type="text" name="asssuhan_keperawatannnnn_ak_68" id="asssuhan-keperawatannnnn-ak-68" class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_69" id="asssuhan-keperawatannnnn-ak-69" value="1" class="mr-1">
                                                                        Observasi TTV
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_70" id="asssuhan-keperawatannnnn-ak-70" value="1" class="mr-1">
                                                                        Suhu tubuh membaik
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_71" id="asssuhan-keperawatannnnn-ak-71" value="1" class="mr-1">
                                                                        Gangguan mobilisasi fisik
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_72" id="asssuhan-keperawatannnnn-ak-72" value="1" class="mr-1">
                                                                        Beri selimut tebal
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_73" id="asssuhan-keperawatannnnn-ak-73" value="1" class="mr-1">
                                                                        Suhu kulit membaik
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_74" id="asssuhan-keperawatannnnn-ak-74" value="1" class="mr-1">
                                                                        Gangguan muskoloskletal
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_75" id="asssuhan-keperawatannnnn-ak-75" value="1" class="mr-1">
                                                                        Pasang pemanas
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_76" id="asssuhan-keperawatannnnn-ak-76" value="1" class="mr-1">
                                                                        <input type="text" name="asssuhan_keperawatannnnn_ak_77" id="asssuhan-keperawatannnnn-ak-77" class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_78" id="asssuhan-keperawatannnnn-ak-78" value="1" class="mr-1">
                                                                        Efek agen farmakologis
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_79" id="asssuhan-keperawatannnnn-ak-79" value="1" class="mr-1">
                                                                        <input type="text" name="asssuhan_keperawatannnnn_ak_80" id="asssuhan-keperawatannnnn-ak-80" class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_81" id="asssuhan-keperawatannnnn-ak-81" value="1" class="mr-1">
                                                                        Pergerakan ekstermitas meningkat
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_82" id="asssuhan-keperawatannnnn-ak-82" value="1" class="mr-1">
                                                                        Nyeri
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_83" id="asssuhan-keperawatannnnn-ak-83" value="1" class="mr-1">
                                                                        Identifikasi adanya nyeri
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_84" id="asssuhan-keperawatannnnn-ak-84" value="1" class="mr-1">
                                                                        Kekuatan otot meningkat
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_85" id="asssuhan-keperawatannnnn-ak-85" value="1" class="mr-1">
                                                                        <input type="text" name="asssuhan_keperawatannnnn_ak_86" id="asssuhan-keperawatannnnn-ak-86" class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_87" id="asssuhan-keperawatannnnn-ak-87" value="1" class="mr-1">
                                                                        Identifikasi toleransi fisik melakukan pergerakan
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_88" id="asssuhan-keperawatannnnn-ak-88" value="1" class="mr-1">
                                                                        Rentang gerak meningkat
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_89" id="asssuhan-keperawatannnnn-ak-89" value="1" class="mr-1">
                                                                        Nausea
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_90" id="asssuhan-keperawatannnnn-ak-90" value="1" class="mr-1">
                                                                        Anjurkan mobilisasi dini
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_91" id="asssuhan-keperawatannnnn-ak-91" value="1" class="mr-1">
                                                                        <input type="text" name="asssuhan_keperawatannnnn_ak_92" id="asssuhan-keperawatannnnn-ak-92" class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_93" id="asssuhan-keperawatannnnn-ak-93" value="1" class="mr-1">
                                                                        Mengeluh mual
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_94" id="asssuhan-keperawatannnnn-ak-94" value="1" class="mr-1">
                                                                        Anjurkan mobilisasi sederhana yang harus dilakukan
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_95" id="asssuhan-keperawatannnnn-ak-95" value="1" class="mr-1">
                                                                        Keluhan mual menurun
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_96" id="asssuhan-keperawatannnnn-ak-96" value="1" class="mr-1">
                                                                        Merasa ingin muntah
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_97" id="asssuhan-keperawatannnnn-ak-97" value="1" class="mr-1">
                                                                        <input type="text" name="asssuhan_keperawatannnnn_ak_98" id="asssuhan-keperawatannnnn-ak-98" class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_99" id="asssuhan-keperawatannnnn-ak-99" value="1" class="mr-1">
                                                                        Perasaan ingin muntah menurun
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_100" id="asssuhan-keperawatannnnn-ak-100" value="1" class="mr-1">
                                                                        Diaforesis
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_101" id="asssuhan-keperawatannnnn-ak-101" value="1" class="mr-1">
                                                                        Identifikasi mual
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_102" id="asssuhan-keperawatannnnn-ak-102" value="1" class="mr-1">
                                                                        <input type="text" name="asssuhan_keperawatannnnn_ak_103" id="asssuhan-keperawatannnnn-ak-103" class="custom-form clear-input d-inline-block col-lg-8">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_104" id="asssuhan-keperawatannnnn-ak-104" value="1" class="mr-1">
                                                                        <input type="text" name="asssuhan_keperawatannnnn_ak_105" id="asssuhan-keperawatannnnn-ak-105" class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_106" id="asssuhan-keperawatannnnn-ak-106" value="1" class="mr-1">
                                                                        Identifikasi karakteristik muntah
                                                                    </td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_107" id="asssuhan-keperawatannnnn-ak-107" value="1" class="mr-1">
                                                                        Monitor mual
                                                                    </td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_108" id="asssuhan-keperawatannnnn-ak-108" value="1" class="mr-1">
                                                                        Bersihkan mulut dan hidung
                                                                    </td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_109" id="asssuhan-keperawatannnnn-ak-109" value="1" class="mr-1">
                                                                        Atur posisi untuk mencegah aspirasi
                                                                    </td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_110" id="asssuhan-keperawatannnnn-ak-110" value="1" class="mr-1">
                                                                        Kolaborasi pemberian antiemetik
                                                                    </td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td><input type="checkbox" name="asssuhan_keperawatannnnn_ak_111" id="asssuhan-keperawatannnnn-ak-111" value="1" class="mr-1">
                                                                        <input type="text" name="asssuhan_keperawatannnnn_ak_112" id="asssuhan-keperawatannnnn-ak-112" class="custom-form clear-input d-inline-block col-lg-8 ml-1">
                                                                    </td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>

                                                                <!-- <tr>
                                                                    <td class="center"><b>Perawat Asisten</b></td>
                                                                    <td class="center"><b>Perawat Anastesi </b></td>
                                                                    <td class="center"><b>Perawat Kamar Bedah</b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="center"><input type="text" name="perawwat_ruangan_prrr" id="perawwat-ruangan-prrr" class="select2c-input ml-2">
                                                                    </td>
                                                                    <td class="center"><input type="text" name="perawwat_anastesi_paaa" id="perawwat-anastesi-paaa" class="select2c-input ml-2">
                                                                    </td>
                                                                    <td class="center"><input type="text" name="perawwat_kamar_bedahhh" id="perawwat-kamar-bedahhh" class="select2c-input ml-2">
                                                                    </td>
                                                                </tr> -->
                                                            </tbody>
                                                        </table>
                                                        <table class="table table-no-border table-sm table-striped">
                                                            <tr>
                                                                <td class="center"><b>Perawat Sirkuler</b></td>
                                                                <td class="center"><b>Perawat Asisten</b></td>
                                                                <td class="center"><b>Perawat Anastesi </b></td>
                                                                <td class="center"><b>Perawat Kamar Bedah</b></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center">
                                                                    <input type="text" name="perawwat_ruangan_sirkuler" id="perawwat-ruangan-sirkuler" class="select2c-input ml-2">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="perawwat_ruangan_prrr" id="perawwat-ruangan-prrr" class="select2c-input ml-2">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="perawwat_anastesi_paaa" id="perawwat-anastesi-paaa" class="select2c-input ml-2">
                                                                </td>
                                                                <td class="center">
                                                                    <input type="text" name="perawwat_kamar_bedahhh" id="perawwat-kamar-bedahhh" class="select2c-input ml-2">
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- ASUHAN KEPERAWATN AKHIR KE 3-->
                                    </div>
                                    <!-- FORM CATATAN KEPERAWATAN PERIOPERATIF AWAL -->

                                    <!-- table catatan data WESA -->
                                    <div class="form-catatan-data-perioperatif">
                                        <input type="hidden" name="id_data_catatan_perioperatift" id="id_data_catatan_perioperatift">
                                        <input type="hidden" name="cdp_id_layanan_pendaftaran" id="cdp_id_layanan_pendaftaran">

                                        <div class="row">
                                        <div class="col-lg-12">
                                        <div class="card">
                                            <table class="table table-sm table-striped table-bordered color-table info-table" id="table-catatan-perioperatif">
                                                <thead>
                                                    <tr>
                                                        <th class="center" width="1%">No.</th>
                                                        <th class="center" width="15%">Tanggal</th>
                                                        <th class="center" width="15%">Petugas</th>
                                                        <th class="center" width="15%">Alat</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="body-table">
                                                </tbody>
                                            </table>
                                            <div id="cpt-pagination" class="float-left"></div>
                                            <div id="cpt-summary" class="float-right text-sm"></div>
                                        </div> 
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                    </div>                   
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
                <button id="btn-simpan" type="button" class="btn btn-info" onclick="konfirmasiSimpanEntriCkp()"><span><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</span></button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal CKP -->

