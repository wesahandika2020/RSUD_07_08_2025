
<div class="modal fade" id="modal_rencana_asuhan_keperawatan" role="dialog" data-backdrop="static" aria-labelledby="modal-resume-keperawatan-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold" id="modal_rencana_asuhan_keperawatan">RENCANA ASUHAN KEPERAWATAN</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_entri_rencana_asuhan_keperawatan class="form-horizontal"') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="ek_id_layanan_pendaftaran">
                <input type="hidden" name="id_pendaftaran" id="ek-id-pendaftaran">
                <input type="hidden" name="id_bed" id="ek-id-bed">
                <input type="hidden" name="ek_id_pasien" id="ek_id_pasien">
                <input type="hidden" name="ek_jenis_layanan" value="Rawat Inap" id="ek-jenis-layanan">
                <input type="hidden" name="id_users" id="ek-id-users" <?php $nama = $this->session->userdata('nama');
                                                                        $nama_js = json_encode($nama); ?> value=<?php echo $nama_js; ?>>

                <!-- header -->
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

                            <div class="form-data-asuhan-keperawatan">
                                <table class="table table-no-border table-sm table-striped">
                                    <tr>
                                        <td colspan="3">
                                            <button class="btn btn-info btn-xs mr-1 float-left" type="button" id="ak_btn_expand_all"><i class="fas fa-fw fa-expand mr-1"></i>Expand All</button>
                                            <button class="btn btn-warning btn-xs mr-1 float-left" type="button" id="ak_btn_collapse_all"><i class="fas fa-fw fa-compress mr-1"></i>Collapse All</button>
                                        </td>
                                    </tr>
                                </table>

                                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                    <tr>
                                        <td colspan="3" class="center bold td-dark">
                                            <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-asuhan-keperawatan"><i class="fas fa-expand mr-1"></i>Expand</button>MASALAH
                                            KEPERAWATAN
                                        </td>
                                    </tr>
                                </table>

                                <div class="collapse multi-collapse mt-2" id="data-asuhan-keperawatan">
                                    <table class="table table-no-border table-sm table-striped">
                                        <tr>
                                            <td>
                                                Masalah Keperawatan
                                            </td>
                                            <td>
                                                :
                                            </td>
                                            <td>
                                                <input type="text" name="ek_masalah_keperawatan" id="ek-masalah-keperawatan" class="select2c-input ml-2">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Tanggal Mulai
                                            </td>
                                            <td>
                                                :
                                            </td>
                                            <td>
                                                <input type="text" name="tanggal_mulai" id="ek-tanggal-mulai" class="custom-form clear-input d-inline-block col-lg-2 ml-2" placeholder="dd/mm/yyyy hh:ii">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Tanggal Selesai
                                            </td>
                                            <td>
                                                :
                                            </td>
                                            <td>
                                                <input type="text" name="tanggal_selesai" id="ek-tanggal-selesai" class="custom-form clear-input d-inline-block col-lg-2 ml-2" placeholder="dd/mm/yyyy hh:ii">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button type="button" title="Tambah Diagnosa" class="btn btn-info" onclick="tambahDiagnosa()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah
                                                    Diagnosis</button>
                                            </td>
                                        </tr>
                                    </table>
                                    <hr>
                                    <table class="table table-sm table-striped table-bordered" id="tabel-masalah-keperawatan">
                                        <thead style="background-color:#ADD8E6;">
                                            <tr>
                                                <th class="center" rowspan="2"><b>No</b></th>
                                                <th class="center" rowspan="2"><b>Masalah Keperawatan</b></th>
                                                <th class="center" colspan="2"><b>Tanggal Masalah</b></th>
                                                <th class="center" rowspan="2"><b>Petugas</b></th>
                                                <th class="center" rowspan="2">Alat</th>
                                            </tr>
                                            <tr>
                                                <th class="center">Mulai</th>
                                                <th class="center">Selesai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>

                                <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                    <tr>
                                        <td colspan="3" class="center bold td-dark">
                                            <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#rencana-tindakan-keperawatan"><i class="fas fa-expand mr-1"></i>Expand</button>RENCANA TINDAKAN
                                            KEPERAWATAN
                                        </td>
                                    </tr>
                                </table>

                                <div class="collapse multi-collapse mt-2" id="rencana-tindakan-keperawatan">
                                    <table class="table table-no-border table-sm table-striped">
                                        <tr>
                                            <td class="bold" width="15%">Rencana Tindakan Keperawatan</td>
                                            <td class="bold" width="1%">:</td>
                                            <td width="84%">
                                                <input type="text" name="rencana_tindakan" id="ek-rencana-tindakan" class="select2c-input ml-2">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold" width="15%">Tindakan Keperawatan Lainnya</td>
                                            <td class="bold" width="1%">:</td>
                                            <td width="84%">
                                                <input type="text" name="rencana_tindakan_lainya" id="rencana-tindakan-lainya" class="custom-form clear-input d-inline-block col-lg-5 ml-2 disabled" placeholder=".......................">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold" width="15%">Keterangan</td>
                                            <td class="bold" width="1%">:</td>
                                            <td width="84%">
                                                <input type="text" name="ek_keterangan_tambahan" id="ek-keterangan-tambahan" class="custom-form clear-input d-inline-block col-lg-5 ml-2 disabled" placeholder=".......................">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold" width="15%">Jam Tindakan</td>
                                            <td class="bold" width="1%">:</td>
                                            <td width="84%">
                                                <input type="text" name="jam_tindakan" id="jam-tindakan" class="custom-form clear-input d-inline-block col-lg-1 ml-2" placeholder="hh:ii">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold" width="15%">Tanggal Tindakan</td>
                                            <td class="bold" width="1%">:</td>
                                            <td width="84%">
                                                <input type="text" name="tanggal_tindakan" id="ek-tanggal-tindakan-satu" class="custom-form clear-input d-inline-block col-lg-1 ml-2" placeholder="dd/mm/yyyy">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold" width="15%">Waktu</td>
                                            <td class="bold" width="1%">:</td>
                                            <td width="84%">
                                                <div class="input-group">
                                                    <input type="checkbox" name="waktu_pagi" id="ek-waktu-pagi" value="1" class="mr-1 ml-2">Pagi
                                                    <input type="checkbox" name="waktu_siang" id="ek-waktu-siang" value="1" class="mr-1 ml-4">Siang
                                                    <input type="checkbox" name="waktu_malam" id="ek-waktu-malam" value="1" class="mr-1 ml-4">Malam
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- <tr>
                                            <td class="bold" width="15%">Jam</td>
                                            <td class="bold" width="1%">:</td>
                                            <td width="84%">
                                                <input type="text" name="jam_tindakan" id="jam-tindakan" class="custom-form clear-input d-inline-block col-lg-1 ml-2" placeholder="hh:ii">
                                            </td>
                                        </tr> -->
                                 
                                        <tr>
                                            <td>
                                                <button type="button" title="Tambah Rencana" class="btn btn-info" onclick="tambahRTINDK()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah
                                                    Rencana</button>
                                            </td>
                                        </tr>
                                    </table>
                                    <hr>
                                    <table class="table table-sm table-striped table-bordered" id="tabel-ek-rencana-tindakan">
                                        <thead style="background-color:#ADD8E6;">
                                            <tr>
                                                <th class="center" rowspan="3">No</th>
                                                <th class="center" rowspan="3">Jam</th>
                                                <th class="center" rowspan="3">Tanggal</th>
                                                <!-- <th class="center" rowspan="3">Jam</th> -->
                                                <th class="center" rowspan="3">Rencana Tindakan Keperawatan</th>
                                                <th class="center" rowspan="3">Tindakan Keperawatan Lainnya</th>
                                                <th class="center" rowspan="3">Keterangan</th>
                                                <th class="center" colspan="3" style="color: black; font-size: 12px; text-align: center;">Waktu</th>
                                                <th class="center" rowspan="3">Petugas</th>
                                                <th class="center" rowspan="3">Alat</th>
                                            </tr>
                                            <tr>
                                                <th class="center" style="color: Navy; font-size: 12px; text-align: center;">Pagi</th>
                                                <th class="center" style="color: Purple; font-size: 12px; text-align: center;">Siang</th>
                                                <th class="center" style="color: Red; font-size: 12px; text-align: center;">Malam</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
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
                <button id="btn-simpan" type="button" class="btn btn-info" onclick="konfirmasiSimpanRencanaAsuhanKeperawatan()"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Entri Keperawatan -->



<!-- Modal Edit Masalah Keperawatan -->
<div id="modal-edit-masalah-rawat" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 45%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Masalah Keperawatan</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-edit-masalah-rawat'); ?>
                <input type="hidden" name="id" id="id-masalah-rawat">
                <table class="table table-no-border table-sm table-striped">
                    <tr>
                        <td></td>
                        <td><b>Masalah Keperawatan</b></td>
                        <td>:</td>
                        <td>
                            <div class="input-group">
                                <input type="text" name="masalah_keperawatan" id="ek-masalah-keperawatan-edit" class="select2c-input clear-input d-inline-block"><input type="hidden" name="user_masalah" value="<?= $this->session->userdata("id_translucent") ?>"><input type="hidden" name="waktu_masalah" value="<?= date("Y-m-d H:i:s") ?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td width="2%"></td>
                        <td width="15%"><b>Tanggal Mulai</b></td>
                        <td width="2%">:</td>
                        <td>
                            <div class="input-group">
                                <input type="text" name="edit_tanggal_mulai" id="ek-tanggal-mulai-edit" class="custom-form clear-input d-inline-block col-lg-6">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td width="2%"></td>
                        <td width="15%"><b>Tanggal Selesai</b></td>
                        <td width="2%">:</td>
                        <td>
                            <div class="input-group">
                                <input type="text" name="edit_tanggal_selesai" id="ek-tanggal-selesai-edit" class="custom-form clear-input d-inline-block col-lg-6">
                            </div>
                        </td>
                    </tr>
                </table>
                <hr>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer" id="update-masalah-kprwtn">
            </div>
        </div>
    </div>
</div>
