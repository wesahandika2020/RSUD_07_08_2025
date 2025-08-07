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

                                <!-- Penanda Operasi -->
                                <div class="form-penanda-lokasi-operasi">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table class="table table-sm table-striped" style="margin-top: -15px">
                                                <thead>
                                                    <tr>
                                                        <th colspan="7">
                                                            <h5 class="center"><b>PENANDAAN LOKASI OPERASI</b></h5>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td width="5%">Prosedur</td>
                                                        <td width="1%">:</td>
                                                        <td width="25%"><input type="text" name="plo_prosedur" id="plo-prosedur" class="custom-form col-lg-12"></td>
                                                        <td width="10%"></td>
                                                        <td width="5%">Tanggal</td>
                                                        <td width="1%">:</td>
                                                        <td width="25%"><input type="text" name="plo_tanggal" id="plo-tanggal" class="custom-form col-lg-3" placeholder="dd/mm/yyyy"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="center" colspan="3" id="lokasi-operasi">
                                                            <h4>Berilah tanda pada lokasi yang akan dioperasi</h4>
                                                            <canvas id="plo-gambar" name="plo_gambar" width="700" height="800" disabled></canvas>
                                                            <button type="button" id="btn-hapus-canvas-plo" class="btn btn-secondary col-lg-6" onclick="clearCanvasPlo()"><i class="fas fa-trash mr-2"></i>Clear Canvas</button>
                                                        </td>
                                                        <td></td>
                                                        <td colspan="3" class="center" id="hasil-lokasi-operasi">
                                                            <h4>Hasil</h4>
                                                            <img id="gambar-plo" src="" width="700" height="800">
                                                            <!-- <button type="button" id="btn-edit-canvas-plo" class="btn btn-secondary col-lg-6" onclick="editCanvasPlo()"><i class="fas fa-edit mr-2"></i>Edit</button> -->
                                                            <input type="hidden" name="gambar_lama" id="gambar-lama">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="7">Saya menyatakan lokasi yang telah ditetapkan pada diagram adalah benar</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Pasien</td>
                                                        <td>:</td>
                                                        <td><span id="nama-pasien-2"></span></td>
                                                        <td></td>
                                                        <td>Nama Dokter</td>
                                                        <td>:</td>
                                                        <td><input type="text" name="plo_dokter" id="plo-dokter" class="select2c-input"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal & Jam</td>
                                                        <td>:</td>
                                                        <td><input type="text" name="plo_tanggal_pasien" id="plo-tanggal-pasien" class="custom-form col-lg-4" placeholder="dd/mm/yyyy hh:mm">
                                                        </td>
                                                        <td></td>
                                                        <td>Tanggal & Jam</td>
                                                        <td>:</td>
                                                        <td><input type="text" name="plo_tanggal_dokter" id="plo-tanggal-dokter" class="custom-form col-lg-4" placeholder="dd/mm/yyyy hh:mm"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Penanda Operasi -->

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