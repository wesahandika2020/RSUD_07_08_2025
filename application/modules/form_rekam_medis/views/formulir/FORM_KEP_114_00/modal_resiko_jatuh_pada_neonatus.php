<!-- // UPRJPN -->
<div class="modal fade" id="modal_resiko_jatuh_pada_neonatus" role="dialog" data-backdrop="static" aria-labelledby="modal-resume-keperawatan-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold" id="modal_resiko_jatuh_pada_neonatus">PEMANTAUAN PASIEN RESIKO JATUH PADA NEONATUS</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_entri_keperawatan class="form-horizontal"') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="ek_id_layanan_pendaftaran">
                <input type="hidden" name="id_pendaftaran" id="ek-id-pendaftaran">
                <input type="hidden" name="id_bed" id="ek-id-bed">
                <input type="hidden" name="ek_id_pasien" id="ek_id_pasien">
                <input type="hidden" name="ek_jenis_layanan" value="Rawat Inap" id="ek-jenis-layanan">
                <input type="hidden" name="id_users" id="ek-id-users" <?php $nama = $this->session->userdata('nama'); $nama_js = json_encode($nama); ?> value=<?php echo $nama_js; ?>>

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
                <!-- end header -->

                <!-- content -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-body">
                            <div class="form-resiko-jatuh-pasien">
                                <div class="mt-2" id="data-upaya-pencegahan-risiko-jatuh-pada-neonatus">
                                    <div class="col-lg">
                                        <div id="buka-tutup-uprjpn">
                                        </div>
                                        <div class="card">
                                            <table class="table table-sm table-striped table-bordered" id="tabel-uprjpn">
                                                <thead style="background-color:rgb(141, 185, 243);">
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
                <button id="btn-simpan" type="button" class="btn btn-info" onclick="konfirmasiSimpanEntriResikoJatuhPadaNeonatus()"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Entri Keperawatan -->




<!-- EDIT UPRJPN -->
<div id="modal-edit-upaya-pencegahan-risiko-jatuh-pada-neonatus" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Upaya Pencegahan Risiko Jatuh Pada Neonatus</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-edit-upaya-pencegahan-risiko-jatuh-pada-neonatus'); ?>
                <input type="hidden" name="id" id="id-upaya-pencegahan-risiko-jatuh-pada-neonatus">
                <div class="from-group">
                    <label for="uprjpn-tanggal-pengkajian">Tanggal Tindakan Pencegahan : </label>
                    <input type="text" name="uprjpn_tanggal_pengkajian" id="uprjpn-edit-tanggal-pengkajian" class="custom-form clear-input d-inline-block col-lg-3 ml-2" placeholder="dd/mm/yyyy">
                </div>
                <hr>
                <hr>
                <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-uprjpn">
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
                            <td colspan="8" class="bold text-uppercase"></td>
                        </tr>
                        <tr>
                            <td>Posisi tanda Risiko jatuh tetap ada/terpasang</td>
                            <td class="center"><input type="checkbox" name="terpasang_p_ho" id="terpasang-edit-p-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="terpasang_p_10" id="terpasang-edit-p-10">
                            </td>
                            <td class="center"><input type="checkbox" name="terpasang_s_ho" id="terpasang-edit-s-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="terpasang_s_18" id="terpasang-edit-s-18">
                            </td>
                            <td class="center"><input type="checkbox" name="terpasang_m_ho" id="terpasang-edit-m-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="terpasang_m_23" id="terpasang-edit-m-23">
                            </td>
                            <td class="center"><input type="checkbox" name="terpasang_m_4" id="terpasang-edit-m-4">
                            </td>
                        </tr>
                        <tr>
                            <td>Pastikan roda box/incubator pada posisi terkunci</td>
                            <td class="center"><input type="checkbox" name="terkunci_p_ho" id="terkunci-edit-p-ho"></td>
                            <td class="center"><input type="checkbox" name="terkunci_p_10" id="terkunci-edit-p-10"></td>
                            <td class="center"><input type="checkbox" name="terkunci_s_ho" id="terkunci-edit-s-ho"></td>
                            <td class="center"><input type="checkbox" name="terkunci_s_18" id="terkunci-edit-s-18"></td>
                            <td class="center"><input type="checkbox" name="terkunci_m_ho" id="terkunci-edit-m-ho"></td>
                            <td class="center"><input type="checkbox" name="terkunci_m_23" id="terkunci-edit-m-23"></td>
                            <td class="center"><input type="checkbox" name="terkunci_m_4" id="terkunci-edit-m-4">
                            </td>
                        </tr>
                        <tr>
                            <td>Pastikan pintu inkubator tertutup bila tidak ada tindakan</td>
                            <td class="center"><input type="checkbox" name="tindakan_p_ho" id="tindakan-edit-p-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="tindakan_p_10" id="tindakan-edit-p-10">
                            </td>
                            <td class="center"><input type="checkbox" name="tindakan_s_ho" id="tindakan-edit-s-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="tindakan_s_18" id="tindakan-edit-s-18">
                            </td>
                            <td class="center"><input type="checkbox" name="tindakan_m_ho" id="tindakan-edit-m-ho">
                            </td>
                            <td class="center"><input type="checkbox" name="tindakan_m_23" id="tindakan-edit-m-23">
                            </td>
                            <td class="center"><input type="checkbox" name="tindakan_m_4" id="tindakan-edit-m-4">
                            </td>
                        </tr>

                        <tr>
                            <td class="bold">Paraf</td>
                            <td class="center"><input type="checkbox" name="paraff_p_ho" id="paraff-edit-p-ho"></td>
                            <td class="center"><input type="checkbox" name="paraff_p_10" id="paraff-edit-p-10"></td>
                            <td class="center"><input type="checkbox" name="paraff_s_ho" id="paraff-edit-s-ho"></td>
                            <td class="center"><input type="checkbox" name="paraff_s_18" id="paraff-edit-s-18"></td>
                            <td class="center"><input type="checkbox" name="paraff_m_ho" id="paraff-edit-m-ho"></td>
                            <td class="center"><input type="checkbox" name="paraff_m_23" id="paraff-edit-m-23"></td>
                            <td class="center"><input type="checkbox" name="paraff_m_4" id="paraff-edit-m-4"></td>
                        </tr>
                        <tr>
                            <td class="bold">Perawat</td>
                            <td colspan="2">
                                <div class="input-group">
                                    <input type="text" name="perawat_1" id="perawat-edit-1" class="select2c-input ml-2">
                                </div>
                            </td>
                            <td colspan="2">
                                <div class="input-group">
                                    <input type="text" name="perawat_2" id="perawat-edit-2" class="select2c-input ml-2">
                                </div>
                            </td>
                            <td colspan="3">
                                <div class="input-group">
                                    <input type="text" name="perawat_3" id="perawat-edit-3" class="select2c-input ml-2">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer" id="update-uprjpn">
            </div>
        </div>
    </div>
</div>
