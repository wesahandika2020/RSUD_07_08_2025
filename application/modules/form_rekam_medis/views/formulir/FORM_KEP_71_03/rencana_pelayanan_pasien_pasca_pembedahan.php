<!-- s -->
<!-- Modal Entri Operasi -->
<div class="modal fade" id="modal-form-operasi" role="dialog" data-backdrop="static" aria-labelledby="modal-resume-operasi-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width:90%">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold" id="modal-form-operasi">FORM OPERASI</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_entri_operasi class=form-horizontal') ?>
                <input type="hidden" name="id_operasi" id="id-operasi">
                <input type="hidden" name="id_layanan_pendaftaran" id="ok-id-layanan-pendaftaran">
                <input type="hidden" name="id_pendaftaran" id="ok-id-pendaftaran">
                <input type="hidden" name="id_pasien" id="ok-id-pasien">
                <input type="hidden" name="id_ok" id="id-ok">
                <input type="hidden" name="id_users" id="ek-id-users" <?php $nama = $this->session->userdata('nama');
                                                                        $nama_js = json_encode($nama); ?> value=<?php echo $nama_js; ?>>
                <!-- RPPPP -->
                <input type="hidden" name="id_rpppp" id="id-rpppp"> <!-- //FORM-KEP-71-03 -->
                <!-- CKP -->
                <input type="hidden" name="id_ckp" id="id-ckp"> <!-- //FORM-KEP-24-01 -->
                <!-- AAAS -->
                <input type="hidden" name="id_aaas" id="id-aaas"> <!-- //Rausahh -->
                <!-- APB -->
                <input type="hidden" name="id_apb" id="id-apb"> <!-- //Rausahhh -->
                <!-- CPKJI -->
                <input type="hidden" name="id_cpkji" id="id-cpkji"> <!-- //FORM-PMD-14-01 -->
                <!-- PLO -->
                <input type="hidden" name="id" id="id-plo"> <!-- //FORM-KEP-16-00 -->

                <!-- header -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="20%" class="bold">Nama Pasien</td>
                                    <td wdith="80%">: <span id="nama-pasien"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">No. RM</td>
                                    <td>: <span id="no-rm"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Tanggal Lahir</td>
                                    <td>: <span id="tanggal-lahir"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Jenis Kelamin</td>
                                    <td>: <span id="jenis-kelamin"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="30%" class="bold">Ruang Rawat/Unit Kerja</td>
                                    <td wdith="70%">: <span id="bed"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Agama</td>
                                    <td>: <span id="agama"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Alamat</td>
                                    <td>: <span id="alamat"></span></td>
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
                            <!-- form pengkajian resume keperawatan -->
                            <div id="wizard-operasi">

                                <!-- FORM RPPPP AWAL -->
                                <div class="form-rencana-pelayanan-pasien-pasca-pembedahan">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table class="table table-sm table-striped" style="margin-top: -15px">
                                                <tr>
                                                    <td width="100%">
                                                        <h5 class="center"><b>RENCANA PELAYANAN PASIEN PASCA PEMBEDAHAN</b></h5>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-rencana-pelayanan">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <table class="table table-sm table-striped" style="margin-top: -15px">
                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"><b>Tanggal / Jam</b></td>
                                                        <td width="2%">:</td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input type="text" name="tanggal_rpppp" id="tanggal-rpppp" class="custom-form clear-input d-inline-block col-lg-3" placeholder="isi tanggal">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <b>Hari :</b> <input type="text" name="hari_rpppp" id="hari-rpppp" class="custom-form clear-input d-inline-block col-lg-5" placeholder="isi hari">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"><b>DIAGNOSIS KERJA</b></td>
                                                        <td width="2%">:</td>
                                                        <td colspan="2">
                                                            <textarea name="diagnosis_kerja" id="diagnosis-kerja" rows="3" class="form-control clear-input" placeholder="diagnosis kerja"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"><b>Masalah/Kebutuhan (Prioritas)</b></td>
                                                        <td width="2%">:</td>
                                                        <td colspan="2">
                                                            <textarea name="masalah_kebutuhan_prioritas" id="masalah-kebutuhan-prioritas" rows="3" class="form-control clear-input" placeholder="masalah kebutuhan "></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"><b>Kewaspadaan</b></td>
                                                        <td width="2%">:</td>
                                                        <td>
                                                            <input type="checkbox" name="kewaspadaan_1" id="kewaspadaan-1" value="1" class="mr-1">Standar
                                                            <input type="checkbox" name="kewaspadaan_2" id="kewaspadaan-2" value="1" class="mr-1 ml-2">Airbone
                                                            <input type="checkbox" name="kewaspadaan_3" id="kewaspadaan-3" value="1" class="mr-1 ml-2">Kontak
                                                            <input type="checkbox" name="kewaspadaan_4" id="kewaspadaan-4" value="1" class="mr-1 ml-2">Droplet
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"><b>Tim Dokter</b></td>
                                                        <td width="2%">:</td>
                                                        <td>
                                                            <input type="checkbox" name="tim_dokter" id="tim-dokter" value="1" class="mr-1">DPJP :
                                                            <input type="text" name="tim_dpjp" id="tim-dpjp" class="select2c-input ml-2">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"><b></b></td>
                                                        <td width="2%"></td>
                                                        <td colspan="2"> <br>
                                                            <input type="checkbox" name="tim_perawat" id="tim-perawat" value="1" class="mr-1">Tim :
                                                            <input type="text" name="tim_perawat_1" id="tim-perawatt-1" class="select2c-input ">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"><b></b></td>
                                                        <td width="2%"></td>
                                                        <td colspan="2"><br>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input type="text" name="tim_perawat_2" id="tim-perawatt-2" class="select2c-input ">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"><b></b></td>
                                                        <td width="2%"></td>
                                                        <td colspan="2"><br>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input type="text" name="tim_perawat_3" id="tim-perawatt-3" class="select2c-input ">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"><b>Pemeriksaan</b></td>
                                                        <td width="2%">:</td>
                                                        <td>
                                                            <input type="checkbox" name="pemeriksaan_1" id="pemeriksaan-1" value="1" class="mr-1">Laboratorium
                                                            <input type="checkbox" name="pemeriksaan_2" id="pemeriksaan-2" value="1" class="mr-1 ml-2">Radiologi
                                                            <input type="text" name="pemeriksaan_3" id="pemeriksaan-3" class="custom-form clear-input d-inline-block col-lg-6 mx-1" placeholder="Sebutkan">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"><b>Prosedur / Tindakan</b></td>
                                                        <td width="2%">:</td>
                                                        <td colspan="2">
                                                            <textarea name="prosedur_tindakan" id="prosedur-tindakan" rows="3" class="form-control clear-input" placeholder="prosedur / tindakan"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"><b>Nutrisi</b></td>
                                                        <td width="2%">:</td>
                                                        <td>
                                                            Diet<input type="text" name="nutrisi_1" id="nutrisi-1" class="custom-form clear-input d-inline-block col-lg-5 mx-1" placeholder="Sebutkan">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"></td>
                                                        <td width="2%"></td>
                                                        <td>
                                                            Batasan Cairan :<input type="text" name="nutrisi_2" id="nutrisi-2" class="custom-form clear-input d-inline-block col-lg-5 mx-1" placeholder="Sebutkan">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"></td>
                                                        <td width="2%"></td>
                                                        <td>
                                                            <input type="radio" name="nutrisi_3" id="nutrisi-3" class="mr-1" value="0" checked>Tidak
                                                            <input type="radio" name="nutrisi_3" id="nutrisi-4" class="mr-1 ml-2" value="1">Ya,
                                                            <input type="text" name="nutrisi_5" id="nutrisi-5" class="custom-form clear-input d-inline-block col-lg-4 mx-1" placeholder="Sebutkan" disabled>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"><b>Aktivitas</b></td>
                                                        <td width="2%">:</td>
                                                        <td>
                                                            <input type="checkbox" name="aktivitas_1" id="aktivitas-1" value="1" class="mr-1">Tirah baring total
                                                            <input type="checkbox" name="aktivitas_2" id="aktivitas-2" value="1" class="mr-1 ml-2">Tirah baring persial
                                                            <input type="checkbox" name="aktivitas_3" id="aktivitas-3" value="1" class="mr-1 ml-2">Mandiri
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"><b>Pengobatan</b></td>
                                                        <td width="2%">:</td>
                                                        <td>
                                                            <input type="checkbox" name="pengobatann_1" id="pengobatann-1" value="1" class="mr-1">Sesuai IMR
                                                            <input type="checkbox" name="pengobatann_2" id="pengobatann-2" value="1" class="mr-1 ml-2">Revisi Pengobatan
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"></td>
                                                        <td width="2%"></td>
                                                        <td colspan="2">
                                                            <textarea name="pengobatann_3" id="pengobatann-3" rows="3" class="form-control clear-input" placeholder="pengobatan"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"><b>Keperawatan</b></td>
                                                        <td width="2%">:</td>
                                                        <td>
                                                            <input type="checkbox" name="keperawwatan_1" id="keperawwatan-1" value="1" class="mr-1">Obvervasi Asuhan Keperawatan
                                                            <input type="checkbox" name="keperawwatan_2" id="keperawwatan-2" value="1" class="mr-1 ml-2">Prosedur Keperawatan
                                                            <input type="checkbox" name="keperawwatan_3" id="keperawwatan-3" value="1" class="mr-1 ml-2">Pendidikam Kesehatan
                                                            <input type="checkbox" name="keperawwatan_4" id="keperawwatan-4" value="1" class="mr-1 ml-2">Kaloborasi dengan medis
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"><b>Tindakan Rehabilitas Medik</b></td>
                                                        <td width="2%">:</td>
                                                        <td>
                                                            <input type="radio" name="tindakan_rehabilitan_medik" id="tindakan-rehabilitan-medik-1" class="mr-1" value="0" checked>Tidak
                                                            <input type="radio" name="tindakan_rehabilitan_medik" id="tindakan-rehabilitan-medik-2" class="mr-1 ml-2" value="1">Ya,
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"><b>Konsultasi</b></td>
                                                        <td width="2%">:</td>
                                                        <td colspan="2">
                                                            <textarea name="konsultasi_rpppp" id="konsultasi-rpppp" rows="3" class="form-control clear-input" placeholder="konsultasi"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"><b>Sasaran</b></td>
                                                        <td width="2%">:</td>
                                                        <td colspan="2">
                                                            <textarea name="sasaran_rpppp" id="sasaran-rpppp" rows="3" class="form-control clear-input" placeholder="sasaran"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"><b>Planing</b></td>
                                                        <td width="2%">:</td>
                                                        <td colspan="2">
                                                            <textarea name="planing_rpppp" id="planing-rpppp" rows="3" class="form-control clear-input" placeholder="planing"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"><b></b></td>
                                                        <td width="2%"></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"><b></b></td>
                                                        <td width="2%"></td>
                                                        <td>
                                                            <b> ( Nama Jelas & Paraf Dokter ) </b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"><b></b></td>
                                                        <td width="2%"></td>
                                                        <td>
                                                            <input type="checkbox" name="nama_jelas_rpppp" id="nama-jelas-rpppp" value="1" class="mr-1">
                                                            <input type="text" name="paraf_dokter_rpppp" id="paraf-dokter-rpppp" class="select2c-input ml-2">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Form RPPPP AKHIR -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
                <button id="btn-simpan" type="button" class="btn btn-info" onclick="konfirmasiSimpanEntriOperasi()"><span><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</span></button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Entri Operasi -->