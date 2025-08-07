<!-- Modal Pemeriksaan -->
<script>
    $('#dokter-diagnosa-resume').select2c({
        ajax: {
            url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
            dataType: 'json',
            quietMillis: 100,
            data: function(term, page) { // page is the one-based page number tracked by Select2
                return {
                    q: term, //search term
                    page: page, // page number
                    jenis: $('#profesi').val(),
                };
            },
            results: function(data, page) {
                var more = (page * 20) < data.total; // whether or not there are more results available

                // notice we return the value of more so Select2 knows if more results can be loaded
                return {
                    results: data.data,
                    more: more
                };
            }
        },
        formatResult: function(data) {
            var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
            return markup;
        },
        formatSelection: function(data) {
            return data.nama;
        }
    });
</script>
<div id="modal-pemeriksaan-resume" class="modal fade" role="dialog" data-backdrop="static" aria-labelledby="modal-pemeriksaan-resume-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 98%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-pemeriksaan-resume-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-pemeriksaan-resume role=form class="form-horizontal form-custom"') ?>
                <!-- Input Hidden Form -->
                <input type="hidden" name="id_pasien" id="id-pasien-resume">
                <input type="hidden" name="id_layanan" id="id-layanan-resume">
                <input type="hidden" name="jenis_layanan" value="Intensive Care" id="jenis-layanan">
                <input type="hidden" id="tindaklanjut-resume">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="wizard-form">

                                <!-- Form Diagnosa -->
                                <div class="form-diagnosa">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="col-lg-6">
                                                <div class="form-group row tight">
                                                    <label class="col-lg-4 col-form-label">Pasien</label>
                                                    <div class="col-lg-8">
                                                        <span id="identitas-pasien-diagnosa-resume"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row tight">
                                                    <label for="dokter-diagnosa-resume" class="col-lg-4 col-form-label">Dokter</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" name="dokter_diagnosa" class="select2c-input" id="dokter-diagnosa-resume">
                                                    </div>
                                                </div>
                                                <div class="form-group row tight">
                                                    <label for="diagnosa-manual" class="col-lg-4 col-form-label"></label>
                                                    <div class="col-lg-8">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="diagnosa_manual" class="form-check-input" id="diagnosa-manual-resume">
                                                            <label class="form-check-label" for="diagnosa-manual-resume">Diagnosis Manual</label>
                                                        </div>
                                                        <!--    <div class="custom-control custom-checkbox m-t-5">
																<input type="checkbox" name="diagnosa_manual" class="custom-control-input" id="diagnosa-manual">
																<label class="custom-control-label" for="diagnosa-manual">Diagnosa Manual</label>
															</div> -->
                                                    </div>
                                                </div>
                                                <div class="form-group row tight golongan-sebab-sakit-resume">
                                                    <label for="golongan-sebab-sakit-resume" class="col-lg-4 col-form-label-custom">Diagnosis</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" name="golongan_sebab_sakit" id="golongan-sebab-sakit-resume" class="select2c-input">
                                                    </div>
                                                </div>
                                                <div class="form-group row tight golongan-sebab-sakit-lain-resume">
                                                    <label for="golongan-sebab-sakit-lain-resume" class="col-lg-4 col-form-label-custom">Diagnosis</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" name="golongan_sebab_sakit_lain" id="golongan-sebab-sakit-lain-resume" class="custom-form validasi-input">
                                                    </div>
                                                </div>
                                                <!-- <div class="form-group row tight">
													<label for="diagnosa-klinik" class="col-lg-4 col-form-label-custom">Diagnosis Klinis</label>
													<div class="col-lg-8">
														<div class="form-check">
															<input type="checkbox" name="diagnosa_klinik" class="form-check-input" id="diagnosa-klinik">
															<label class="form-check-label" for="diagnosa-klinik">Ya</label>
														</div>
														<div class="custom-control custom-checkbox">
															<input type="checkbox" name="diagnosa_klinik" class="custom-control-input" id="diagnosa-klinik">
															<label class="custom-control-label" for="diagnosa-klinik">Ya</label>
														</div>
													</div>
												</div> -->
                                                <!-- <div class="form-group row tight">
                                                    <label for="prioritas" class="col-lg-4 col-form-label-custom">Prioritas</label>
                                                    <div class="col-lg-4">
                                                        <?= form_dropdown('prioritas', array('Utama' => 'Utama', 'Sekunder' => 'Sekunder'), array(), 'id=prioritas class=custom-form') ?>
                                                    </div>
                                                </div> -->
                                                <div class="form-group row tight">
                                                    <label for="jenis-kasus-resume" class="col-lg-4 col-form-label-custom">Jenis Kasus</label>
                                                    <div class="col-lg-4">
                                                        <?= form_dropdown('jenis_kasus', array('' => 'Pilih', '1' => 'Baru', '0' => 'Lama'), array(), 'id=jenis-kasus-resume class=custom-form') ?>
                                                    </div>
                                                </div>

                                                <div class="form-group row tight">
                                                    <label class="col-lg-4 col-form-label-custom"></label>
                                                    <div class="col-lg-8">
                                                        <a href="#" class="copy btn btn-primary btn-xxs" id="btn-tambah-diagnosa-banding" rel=".diagnosa-banding"><i class="fas fa-plus-circle mr-2"></i>Tambah Diagnosis Banding</a>
                                                    </div>
                                                </div>
                                                <div class="form-group row tight diagnosa-banding-resume">
                                                    <label for="diagnosa-banding-resume" class="col-lg-4 col-form-label-custom">Diagnosis Banding</label>
                                                    <div class="col-lg-7">
                                                        <input type="text" name="diagnosa_banding[]" id="diagnosa-banding-resume" class="custom-form validasi-input">
                                                    </div>
                                                </div>
                                                <div class="form-group row tight">
                                                    <label for="diagnosa-akhir-resume" class="col-lg-4 col-form-label-custom">Diagnosis Akhir</label>
                                                    <div class="col-lg-8">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="diagnosa_akhir" class="form-check-input" id="diagnosa-akhir-resume">
                                                            <label class="form-check-label" for="diagnosa-akhir-resume">Ya</label>
                                                        </div>
                                                        <!-- <div class="custom-control custom-checkbox">
															<input type="checkbox" name="diagnosa_akhir" class="custom-control-input" id="diagnosa-akhir">
															<label class="custom-control-label" for="diagnosa-akhir">Ya</label>
														</div> -->
                                                    </div>
                                                </div>
                                                <div class="form-group row tight">
                                                    <label for="penyebab-kematian-resume" class="col-lg-4 col-form-label-custom">Penyebab Kematian</label>
                                                    <div class="col-lg-8">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="penyebab_kematian" class="form-check-input" id="penyebab-kematian-resume">
                                                            <label class="form-check-label" for="penyebab-kematian-resume">Ya</label>
                                                        </div>
                                                        <!-- <div class="custom-control custom-checkbox">
															<input type="checkbox" name="penyebab_kematian" class="custom-control-input" id="penyebab-kematian">
															<label class="custom-control-label" for="penyebab-kematian">Ya</label>
														</div> -->
                                                    </div>
                                                </div>
                                                <div class="form-group row tight">
                                                    <label class="col-lg-4 col-form-label-custom"></label>
                                                    <div class="col-lg-8">
                                                        <button type="button" title="tambah diagnosa" onclick="addDiagnosaIcareResume()" class="btn btn-info"><i class="fas fa-arrow-circle-down mr-2"></i>Tambah Diagnosis</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <table class="table table-hover table-striped table-sm color-table info-table" id="table-diagnosa-resume">
                                                <thead class="thead-theme">
                                                    <tr>
                                                        <th class="center">Show Resume</th>
                                                        <th>Waktu</th>
                                                        <th>Dokter</th>
                                                        <!-- <th>Manual</th> -->
                                                        <th>Diagnosis</th>
                                                        <th>Klinik</th>
                                                        <th class="center">Prioritas</th>
                                                        <th class="center">Jenis Kasus</th>
                                                        <th>Diagnosis Banding</th>
                                                        <th>Diagnosis Akhir</th>
                                                        <th>Penyabab Kematian</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Form Diagnosa -->

                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpanPemeriksaanResume()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>