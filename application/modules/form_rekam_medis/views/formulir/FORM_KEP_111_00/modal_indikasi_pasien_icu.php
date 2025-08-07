<!-- // IPI -->
<!-- <script>
</script> -->

<!-- Modal -->
<div class="modal fade" id="modal_indikasi_pasien_masuk_icu_ipi" role="dialog" data-backdrop="static" aria-labelledby="modal-resume-keperawatan-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 id="modal-indikasi-pasien-masuk-icu-title"></h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=indikasi-pasien-masuk-icu class="form-horizontal"') ?>
                <input type="hidden" name="id" id="id-indikasi-pasien-masuk-icu">
                <input type="hidden" name="id_pendaftaran_pasien_masuk_icu" id="id-pendaftaran-indikasi-pasien-masuk-icu">
                <input type="hidden" name="id_layanan_pendaftaran_pasien_masuk_icu" id="id-layanan-pendaftaran-indikasi-pasien-masuk-icu">
                <input type="hidden" name="id_pasien_pasien_masuk_icu" id="id-pasien-indikasi-pasien-masuk-icu">
                <input type="hidden" name="id_user" id="id-user"value="<?= $this->session->userdata('id_translucent') ?>">  

                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="wizard_form_ranap">
                                <div class="indikasi-pasien-masuk-icu">
                                    <table class="table table-sm table-striped table-bordered">
                                        <tr>
                                            <td width="10%"><b>Nama</td>
                                            <td class="center" width="1%"><b>:</td>
                                            <td width="50%"><span id="namapasien-ipi"></span></td>
                                        </tr>
                                        <tr>
                                            <td width="10%"><b>Diagnosa Pasien</td>
                                            <td class="center" width="1%"><b>:</td>
                                            <td width="50%">
                                                <span id="diagnosa-last"></span>
                                                <input type="hidden" name="diagnosa_pasien_icu" id="diagnosa-pasien-indikasi-icu" rows="3" class="form-control clear-input" placeholder="Tuliskan diagnosa pasien"></input>
                                            </td>

                                        </tr>

                                        </tr>
                                        <tr>
                                            <td width="10%"><b>Ruangan Asal</td>
                                            <td class="center" width="1%"><b>:</td>
                                            <td width="50%"><span id="ruangasal-ipi"></span></td>
                                        </tr>
                                        <tr>
                                            <td width="10%"><b>Tanggal</td>
                                            <td class="center" width="1%"><b>:</td>
                                            <td width="50%"><input type="text" name="tanggal_ipi" id="tanggal-ipi" class="custom-form clear-input d-inline-block col-lg-1" placeholder="dd/mm/yyyy"></td>
                                        </tr>
                                        <tr>
                                            <td width="10%"><button type="button" class="btn btn-info" onclick="tabelIndikasiTamBahan()" id="btn-ipi"><i class="fas fa-fw fa-plus mr-1"></i>Tambah Form Indikasi</button></td>
                                            <td width="1%"></td>
                                            <td width="50%"></td>
                                        </tr>
                                    </table>
                                    <table class="table table-sm table-striped table-bordered" id="table-indikasi-wesa">
                                        <thead class="text-center"> 
                                            <tr>
                                                <td class="center" style="background-color: #B0E0E6; color: black;"><b>No</td>
                                                <td class="center" style="background-color: #B0E0E6; color: black;"><b>Tanggal</td>
                                                <td class="center" style="background-color: #B0E0E6; color: black;"><b>Nama Pasien</td>
                                                <td class="center" style="background-color: #B0E0E6; color: black;"><b>Diagnosa Pasien</td>
                                                <td class="center" style="background-color: #B0E0E6; color: black;"><b>Ruangan Asal</td>
                                                <td class="center" style="background-color: #B0E0E6; color: black;"><b>Petugas</td>                                               
                                                <td class="center" colspan="2" style="background-color: #B0E0E6; color: black;"><b>Alat</b></td>
                                            </tr>                                        
                                        </thead>
                                        <tbody class="body-table">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->


                                     