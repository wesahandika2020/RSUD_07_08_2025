<style>
    .text-bold td {
        font-weight: bold;
    }
</style>

<div id="modal-hasil-pemeriksaan-mcu" class="modal fade" role="dialog" data-backdrop="static" aria-labelledby="modal-search-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 95%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Entri Hasil Pemeriksaan MCU</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-hasil-pemeriksaan role=form class="form-horizontal form-custom"') ?>
                <!-- Input Hidden Form -->
                <input type="hidden" name="id_pasien_hpmcu" id="id-pasien-hpmcu">
                <input type="hidden" name="id_layanan_hpmcu" id="id-layanan-hpmcu">
                <input type="hidden" name="id_pendaftaran_hpmcu" id="id-pendaftaran-hpmcu">
                <input type="hidden" name="id_hpmcu" id="id-hpmcu">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <table width="100%" class="table table-sm table-detail table-striped text-bold">
                                <tr>
                                    <td width="17%">Tanggal MCU</td>
                                    <td width="1%">:</td>
                                    <td id="tanggal-mcu-hpmcu" width="82%">2024-10-10</td>
                                </tr>
                                <tr>
                                    <td colspan="3">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td width="17%">Nama Lengkap</td>
                                    <td width="1%">:</td>
                                    <td id="nama-lengkap-hpmcu" width="82%">WESA AL MASIH</td>
                                </tr>
                                <tr>
                                    <td width="17%">Tanggal Lahir</td>
                                    <td width="1%">:</td>
                                    <td id="tanggal-lahir-hpmcu" width="82%">1992-10-10</td>
                                </tr>
                                <tr>
                                    <td width="17%">Nomor RM</td>
                                    <td width="1%">:</td>
                                    <td id="no-rm-hpmcu" width="82%">00014045</td>
                                </tr>
                                <tr>
                                    <td width="17%">Dokter</td>
                                    <td width="1%">:</td>
                                    <td id="no-rm-hpmcu" width="82%">
                                        <input class="select2c-input" type="text" name="dokter_sksi" id="dokter-sksi">
                                    </td>
                                </tr>
                            </table>
                            <div id="wizard-form-1">
                                <!-- Tab bwizard -->
                                <ol>
                                    <li>Status Kesahatan Saat Ini</li>
                                    <li>Analisa Umum Resiko Kesehatan</li>
                                    <li>Kesimpulan dan Saran</li>
                                </ol>

                                <!-- Data bwizard -->
                                <!-- Data Status Kesehatan -->
                                <div class="form-status-kesehatan">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h5 class="center"><b>STATUS KESEHATAN PASIEN SAAT INI</b></h5>
                                            <hr>

                                            <div class="form-group mt-5 row">
                                                <label for="guarantor-sksi" class="col-2 col-form-label">Guarantor</label>
                                                <div class="col-10">
                                                    <input class="form-control" type="text" name="guarantor_sksi" id="guarantor-sksi">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="golongan-darah-sksi" class="col-2 col-form-label">Golongan Darah</label>
                                                <div class="col-10">
                                                    <input class="form-control" type="text" name="golongan_darah_sksi" id="golongan-darah-sksi">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="riwayat-alergi-sksi" class="col-2 col-form-label">Riwayat Alergi</label>
                                                <div class="col-10">
                                                    <input class="form-control" type="text" name="riwayat_alergi_sksi" id="riwayat-alergi-sksi">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="masalah-medis-sksi" class="col-2 col-form-label">Masalah Kondisi Medis</label>
                                                <div class="col-10">
                                                    <input class="form-control" type="text" name="masalah_medis_sksi" id="masalah-medis-sksi">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="riwayat-obat-sksi" class="col-2 col-form-label">Riwayat Konsumsi Obat, vitamin, suplemen dan Herbal saat ini</label>
                                                <div class="col-10">
                                                    <textarea rows="3" class="form-control" name="riwayat_obat_sksi" id="riwayat-obat-sksi"></textarea>
                                                    <!-- <input class="form-control" type="text" name="riwayat_obat_sksi" id="riwayat-obat-sksi"> -->
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="riwayat-penyakit-dahulu-sksi" class="col-2 col-form-label">Riwayat Penyakit Dahulu</label>
                                                <div class="col-10">
                                                    <textarea rows="3" class="form-control" name="riwayat_penyakit_dahulu_sksi" id="riwayat-penyakit-dahulu-sksi"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="riwayat-penyakit-sksi" class="col-2 col-form-label">Riwayat Penyakit Keluarga</label>
                                                <div class="col-10">
                                                    <textarea rows="3" class="form-control" name="riwayat_penyakit_sksi" id="riwayat-penyakit-sksi"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label style="background-color: darkgray;" for="riwayat-sksi" class="col-12 col-form-label">Yang dihubungi saat darurat</label>
                                            </div>
                                            <div class="form-group row ml-5">
                                                <label for="nama-pjwb-sksi" class="col-2 col-form-label">Nama</label>
                                                <div class="col-10">
                                                    <input class="form-control" type="text" name="nama_pjwb_sksi" id="nama-pjwb-sksi">
                                                </div>
                                            </div>
                                            <div class="form-group row ml-5">
                                                <label for="hubungan-pjwb-sksi" class="col-2 col-form-label">Hubungan</label>
                                                <div class="col-10">
                                                    <input class="form-control" type="text" name="hubungan_pjwb_sksi" id="hubungan-pjwb-sksi">
                                                </div>
                                            </div>
                                            <div class="form-group row ml-5">
                                                <label for="telp-pjwb-sksi" class="col-2 col-form-label">Telpon</label>
                                                <div class="col-10">
                                                    <input class="form-control" type="text" name="telp_pjwb_sksi" id="telp-pjwb-sksi">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- End Status Kesehatan -->

                                <!-- Form Analisa Umum  -->
                                <div class="form-analisa-umum">
                                    <!-- <input type="hidden" name="id_anamnesa_asli" id="id-anamnesa-asli"> -->
                                    <!-- <input type="hidden" name="id_anamnesa_pilih" id="id-anamnesa-pilih"> -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h5 class="center"><b>ANALISA UMUM RESIKO KESEHATAN PASIEN</b></h5>
                                            <hr>

                                            <div class="form-group mt-5 row">
                                                <label for="guarantor-hpmcu" class="col-2 col-form-label">Faktor Klinis</label>
                                                <div class="col-10">
                                                    <table id="table-faktor-klinis" class="table-sm table-detail table-striped" width="50%">
                                                        <tbody></tbody>
                                                    </table>
                                                    <div class="row">
                                                        <div class="col-sm-3 nopadding">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="pemeriksaan_aurk" name="pemeriksaan_aurk" value="" placeholder="Pemeriksaan">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3 nopadding">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="hasil_klinis_aurk" name="hasil_klinis_aurk" value="" placeholder="Hasil">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 nopadding">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="keterangan_klinis_aurk" name="keterangan_klinis_aurk" value="" placeholder="Keterangan">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <button class="btn btn-success" type="button" onclick="tambah_faktor_klinis();"><i class="fa fa-plus"></i> Tambah Faktor Klinis</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Detail Faktor Klinis -->
                                                    <div id="detail_faktor_klinis"></div>
                                                    <div class="row">
                                                        <div class="col-sm-1 nopadding">
                                                        </div>
                                                        <div class="col-sm-3 nopadding">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="detail_pemeriksaan_aurk" name="detail_pemeriksaan_aurk[]" value="" placeholder="Pemeriksaan">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3 nopadding">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="detail_hasil_klinis_aurk" name="detail_hasil_klinis_aurk[]" value="" placeholder="Hasil">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3 nopadding">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="detail_keterangan_klinis_aurk" name="detail_keterangan_klinis_aurk[]" value="" placeholder="Keterangan">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2 nopadding">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-success" type="button" onclick="tambah_detail_fk();"><i class="fa fa-plus"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="riwayat-penyakit-aurk" class="col-2 col-form-label">Riwayat Penyakit Saat ini</label>
                                                <div class="col-10">
                                                    <textarea rows="3" class="form-control" name="riwayat_penyakit_aurk" id="riwayat-penyakit-aurk"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="obatan-aurk" class="col-2 col-form-label">Obat-obatan</label>
                                                <div class="col-10">
                                                    <textarea rows="3" class="form-control" name="obatan_aurk" id="obatan-aurk"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="vaksinasi-aurk" class="col-2 col-form-label">Vaksinasi</label>
                                                <div class="col-10">
                                                    <textarea rows="3" class="form-control" name="vaksinasi_aurk" id="vaksinasi-aurk"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-2 col-form-label">Gaya Hidup</label>
                                                <div class="col-10">
                                                    <div class="form-group row ml-5">
                                                        <label for="is_olahraga_aurk" class="col-2 col-form-label">Olahraga</label>
                                                        <div class="col-10">
                                                            <input class="form-control" type="text" name="is_olahraga_aurk" id="is_olahraga_aurk">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row ml-5">
                                                        <label for="is_merokok_aurk" class="col-2 col-form-label">Merokok</label>
                                                        <div class="col-10">
                                                            <input class="form-control" type="text" name="is_merokok_aurk" id="is_merokok_aurk">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row ml-5">
                                                        <label for="is_alkohol_aurk" class="col-2 col-form-label">Alkohol</label>
                                                        <div class="col-10">
                                                            <input class="form-control" type="text" name="is_alkohol_aurk" id="is_alkohol_aurk">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row ml-5">
                                                        <label for="is_zat_adiktif_aurk" class="col-2 col-form-label">Zat Adiktif Obat</label>
                                                        <div class="col-10">
                                                            <input class="form-control" type="text" name="is_zat_adiktif_aurk" id="is_zat_adiktif_aurk">
                                                        </div>
                                                    </div>

                                                    <!-- <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="is_olahraga_aurk" value="0" id="is_olahraga_aurk">
                                                        <label class="custom-control-label" for="is_olahraga_aurk">Olahraga</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="is_merokok_aurk" value="0" id="is_merokok_aurk">
                                                        <label class="custom-control-label" for="is_merokok_aurk">Merokok</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="is_alkohol_aurk" value="0" id="is_alkohol_aurk">
                                                        <label class="custom-control-label" for="is_alkohol_aurk">Alkohol</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="is_zat_adiktif_aurk" value="0" id="is_zat_adiktif_aurk">
                                                        <label class="custom-control-label" for="is_zat_adiktif_aurk">Obat Zat Adiktif</label>
                                                    </div> -->
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- End Form Analisa Umum -->

                                <!-- Form Kesimpulan Saran -->
                                <div class="form-kesimpulan-saran">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h5 class="center"><b>KESIMPULAN & SARAN</b></h5>
                                            <hr>

                                            <div class="form-group mt-5 row">
                                                <label for="treadmil-kds" class="col-2 col-form-label">Treadmil</label>
                                                <div class="col-10">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="treadmil-ya" name="treadmil_kds" value="1" class="custom-control-input">
                                                        <label class="custom-control-label" for="treadmil-ya">Terlampir</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="treadmil-tidak" name="treadmil_kds" value="0" class="custom-control-input">
                                                        <label class="custom-control-label" for="treadmil-tidak">Tidak Terlampir</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="kesimpulan-kds" class="col-2 col-form-label">Kesimpulan</label>
                                                <div class="col-10">
                                                    <textarea id="kesimpulan-kds" name="kesimpulan_kds"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="saran-kds" class="col-2 col-form-label">Saran</label>
                                                <div class="col-10">
                                                    <textarea id="saran-kds" name="saran_kds"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- End Form Kesimpulan Saran -->


                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <div id="btn-simpan-hpmcu"></div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>

<script>
    $(document).ready(function() {
        // select2 dokter
        $('#dokter-sksi').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                    };
                },
                results: function(data, page) {
                    var more = (page * 20) < data
                        .total; // whether or not there are more results available

                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {
                        results: data.data,
                        more: more
                    };
                }
            },
            formatResult: function(data) {
                var markup = '<b>' + data.nama + '</b><br/><i>' + data.spesialisasi + '</i>';
                return markup;
            },
            formatSelection: function(data) {
                $('#s2id_dokter_diagnosa a .select2c-chosen, #s2id_operator a .select2c-chosen, #dokter-detail, #s2id_dokter_rujuk a .select2c-chosen, #s2id_dokter_rujuk_rad a .select2c-chosen')
                    .html(data.nama);
                $('#operator, #id-dokter-detail, #dokter_rujuk, #dokter_rujuk_rad').val(data.id);
                return data.nama;
            }
        });

        $('#kesimpulan-kds').summernote({
            height: 200,
            focus: true,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
            ],
            callbacks: {
                onPaste: function(e) {
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text')

                    e.preventDefault()

                    // Firefox fix
                    setTimeout(function() {
                        document.execCommand('insertText', false, bufferText)
                    }, 10)
                },
            },
        })

        $('#saran-kds').summernote({
            height: 200,
            focus: true,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
            ],
            callbacks: {
                onPaste: function(e) {
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text')

                    e.preventDefault()

                    // Firefox fix
                    setTimeout(function() {
                        document.execCommand('insertText', false, bufferText)
                    }, 10)
                },
            },
        });


        // $('#is_olahraga_aurk').change(function() {
        //     setCheckbox('#is_olahraga_aurk', $(this).val());
        // });
        // $('#is_merokok_aurk').change(function() {
        //     setCheckbox('#is_merokok_aurk', $(this).val());
        // });
        // $('#is_alkohol_aurk').change(function() {
        //     setCheckbox('#is_alkohol_aurk', $(this).val());
        // });
        // $('#is_zat_adiktif_aurk').change(function() {
        //     setCheckbox('#is_zat_adiktif_aurk', $(this).val());
        // });

    });

    var roomDetail = 1;

    function resetForm() {
        $('#s2id_dokter-sksi a .select2c-chosen').html("dr. ANGGI SAPUTRI");
        $('#dokter-sksi').val("42")
        $('#detail_faktor_klinis').children().remove();
        $('#pemeriksaan_aurk').val("")
        $('#hasil_klinis_aurk').val("")
        $('#keterangan_klinis_aurk').val("")
        $('#detail_pemeriksaan_aurk').val("")
        $('#detail_hasil_klinis_aurk').val("")
        $('#detail_keterangan_klinis_aurk').val("")

        syams_validation_remove('#detail_pemeriksaan_aurk, #pemeriksaan_aurk');

        $('#id-hpmcu, #guarantor-sksi, #golongan-darah-sksi, #riwayat-alergi-sksi').val("")
        $('#masalah-medis-sksi, #riwayat-obat-sksi, #riwayat-penyakit-dahulu-sksi, #riwayat-penyakit-sksi, #nama-pjwb-sksi').val("")
        $('#hubungan-pjwb-sksi, #telp-pjwb-sksi, #riwayat-penyakit-aurk, #obatan-aurk, #vaksinasi-aurk').val("")

        // $('#is_olahraga_aurk').prop('checked', false);
        // $('#is_merokok_aurk').prop('checked', false);
        // $('#is_alkohol_aurk').prop('checked', false);
        // $('#is_zat_adiktif_aurk').prop('checked', false);
        // $('#is_olahraga_aurk, #is_merokok_aurk, #is_alkohol_aurk, #is_zat_adiktif_aurk').val(0);
        $('#is_olahraga_aurk, #is_merokok_aurk, #is_alkohol_aurk, #is_zat_adiktif_aurk').val("");

        $('#treadmil-ya').prop('checked', false);
        $('#treadmil-tidak').prop('checked', true);

        // Isi otomatis saat inisialisasi
        var kesimpulanContent = `
                <ol>
                    <li>
                        Keluhan kesehatan: Tidak Ada
                        <ul>
                            <li> </li>
                        </ul>
                    </li>
                    <br>
                    <li>
                        Hasil pemeriksaan fisik: 
                        <ul>
                            <li>Tanda-tanda vital:&nbsp;</li>
                            <li>Status nutrisi:&nbsp;</li>
                            <li>Tajam penglihatan:&nbsp;</li>
                            <li>Status lokalis:&nbsp;</li>
                        </ul>
                    </li>
                    <br>
                    <li>
                        Hasil pemeriksaan laboratorium: 
                        <ul>
                            <li>Hema Rutin:&nbsp;</li>
                            <li>Urin Lengkap:&nbsp;</li>
                            <li>Fungsi hati (SGPT):&nbsp;</li>
                            <li>Fungsi ginjal (Kreatinin Darah):&nbsp;</li>
                            <li>Gula darah sewaktu:&nbsp;</li>
                            <li>Tes Narkoba (Amphetamine, Marijuana, Morphine): Negatif / Positif </li>
                        </ul>
                    </li>
                    <br>
                    <li>
                        Hasil pemeriksaan Rontgen Thoraks: 
                        <ul>
                            <li> </li>
                        </ul>
                    </li>
                    <br>
                    <li>
                        Hasil pemeriksaan Dokter Spesialis Okupasi: 
                        <ul>
                            <li>Terlampir / Tidak Ada</li>
                        </ul>
                    </li>
                    <br>
                    <li>
                        Hasil Treadmil: 
                        <ul>
                            <li>Terlampir / Tidak Ada</li>
                        </ul>
                    </li>
                </ol>
            `;

        $('#kesimpulan-kds').summernote('code', kesimpulanContent);

        var saranContent = `
                <ol>
                    <li></li>
                    <li></li>
                </ol>
            `;

        $('#saran-kds').summernote('code', saranContent);
    }


    function setCheckbox(checkboxId, value) {
        if (value === '0') {
            $(checkboxId).prop('checked', true).val('1');
        } else if (value === '1') {
            $(checkboxId).prop('checked', false).val('0');
        }
    }

    function hasilPemeriksaanMCU(id_pendaftaran, id_layanan, id_pasien, p) {
        resetForm()
        $('#wizard-form-1').bwizard('show', '0');
        $('#btn-simpan-hpmcu').empty();
        $('#btn-print-hpmcu').empty();

        $.ajax({
            type: 'GET',
            url: '<?= base_url("medical_check_up/api/hasil_pemeriksaan_mcu/hasil_pemeriksaan_mcu") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan,
            cache: false,
            // data: $('#form_search').serialize() + '&layanan=' + $('#layanan').val() + filter_dokter,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                let pasien = data.pasien;
                let layanan = data.layanan;
                let hpmcu = data.hasil_pemeriksaan_mcu;
                let gform = data.questionnaire_mcu;

                $('#id-pasien-hpmcu').val(id_pasien)
                $('#id-layanan-hpmcu').val(id_layanan)
                $('#id-pendaftaran-hpmcu').val(id_pendaftaran)

                $('#tanggal-mcu-hpmcu').html(layanan.tanggal_layanan.substring(0, 10))
                $('#nama-lengkap-hpmcu').html(pasien.nama)
                $('#tanggal-lahir-hpmcu').html(pasien.tanggal_lahir)
                $('#no-rm-hpmcu').html(pasien.id_pasien)

                getFaktorKlinis(id_pendaftaran);

                if (hpmcu === null && gform !== null) {
                    // $('#is_olahraga_aurk, #is_merokok_aurk, #is_alkohol_aurk, #is_zat_adiktif_aurk').prop('checked', false).val(0);
                    let rpd = gform.riwayat_penyakit_dahulu;
                    let rpd_lainnya = gform.riwayat_lain;
                    let rpd_all = 'Tidak Ada';
                    // if ((rpd_lainnya.toLowerCase() === 'tidak ada' || rpd_lainnya === '-') && rpd_lainnya.length < 9) {
                    if ((rpd_lainnya.toLowerCase() === 'tidak ada' || rpd_lainnya === '-')) {
                        rpd_lainnya = "";
                    }

                    if (rpd !== "" && rpd_lainnya !== "") {
                        rpd_all = rpd + ', Riwayat Penyakit Dahulu Lainnya (' + rpd_lainnya + ')';
                    } else if (rpd == "" && rpd_lainnya == "") {
                        rpd_all = 'Tidak Ada';
                    } else {
                        rpd_all = rpd + rpd_lainnya;
                    }

                    $('#guarantor-sksi').val(gform.jenis_asuransi + ' (' + gform.nama_asuransi + ')')
                    $('#golongan-darah-sksi').val(gform.gol_darah + ' Rhesus ' + gform.rhesus)
                    $('#masalah-medis-sksi').val(gform.riwayat_keluhan_saat_ini)
                    $('#riwayat-alergi-sksi').val(gform.riwayat_alergi ?? 'Tidak Ada')
                    $('#riwayat-obat-sksi').val(gform.obat_obatan)
                    $('#riwayat-penyakit-dahulu-sksi').val(rpd_all);
                    $('#riwayat-penyakit-sksi').val(gform.riwayat_penyakit_keluarga)

                    $('#nama-pjwb-sksi').val(gform.nama_pjwb)
                    $('#hubungan-pjwb-sksi').val(gform.hubungan_pjwb)
                    $('#telp-pjwb-sksi').val(gform.no_pjwb)

                    $('#riwayat-penyakit-aurk').val(gform.riwayat_penyakit_saat_ini)
                    $('#obatan-aurk').val(gform.obat_obatan)
                    $('#vaksinasi-aurk').val(gform.vaksinasi)

                    $('#is_olahraga_aurk').val(gform.olahraga);
                    $('#is_merokok_aurk').val(gform.status_merokok);
                    $('#is_alkohol_aurk').val(gform.status_minum_alkohol);
                    $('#is_zat_adiktif_aurk').val(gform.zat_adiktif_obat);

                } else if (hpmcu == null) {

                    // $('#is_olahraga_aurk, #is_merokok_aurk, #is_alkohol_aurk, #is_zat_adiktif_aurk').prop('checked', false).val(0);
                    $('#golongan-darah-sksi').val(pasien.gol_darah)
                    $('#riwayat-alergi-sksi').val(pasien.alergi)
                    $('#nama-pjwb-sksi').val(pasien.nama_pjwb)
                    $('#hubungan-pjwb-sksi').val(pasien.hubungan_pjwb)
                    $('#telp-pjwb-sksi').val(pasien.telp_pjwb)

                } else {
                    $('#id-hpmcu').val(hpmcu.id)
                    $('#guarantor-sksi').val(hpmcu.guarantor)
                    $('#golongan-darah-sksi').val(hpmcu.golongan_darah)
                    $('#riwayat-alergi-sksi').val(hpmcu.riwayat_alergi)
                    $('#masalah-medis-sksi').val(hpmcu.masalah_kondisi_medis)
                    $('#riwayat-obat-sksi').val(hpmcu.riwayat_konsumsi_obat)
                    $('#riwayat-penyakit-dahulu-sksi').val(hpmcu.riwayat_penyakit_dahulu)
                    $('#riwayat-penyakit-sksi').val(hpmcu.riwayat_penyakit_keluarga)
                    $('#nama-pjwb-sksi').val(hpmcu.nama_pjwb)
                    $('#hubungan-pjwb-sksi').val(hpmcu.hubungan_pjwb)
                    $('#telp-pjwb-sksi').val(hpmcu.telp_pjwb)
                    $('#riwayat-penyakit-aurk').val(hpmcu.riwayat_penyakit_saat_ini)
                    $('#obatan-aurk').val(hpmcu.obat_obatan)
                    $('#vaksinasi-aurk').val(hpmcu.vaksinasi)

                    $('#is_olahraga_aurk').val(hpmcu.olahraga);
                    $('#is_merokok_aurk').val(hpmcu.merokok);
                    $('#is_alkohol_aurk').val(hpmcu.alkohol);
                    $('#is_zat_adiktif_aurk').val(hpmcu.zat_adiktif);

                    if (hpmcu.treadmil == '1') {
                        $('#treadmil-ya').prop('checked', true);
                    }
                    if (hpmcu.treadmil == '0') {
                        $('#treadmil-tidak').prop('checked', true);
                    }

                    $('#kesimpulan-kds').summernote('code', hpmcu.kesimpulan);
                    $('#saran-kds').summernote('code', hpmcu.saran);

                    $('#s2id_dokter-sksi a .select2c-chosen').html(hpmcu.nama_dokter);
                    $('#dokter-sksi').val(hpmcu.id_dokter)

                    // $('input[name="treadmil_kds"]:checked').val(hpmcu.treadmil);
                }

                let btnSimpanHPMCU = "";
                let btnPrintHPMCU = "";
                if ($('#id-hpmcu').val() !== "") {
                    btnSimpanHPMCU = `<button type="button" class="btn btn-dark waves-effect m-r-5" onclick="saveHasilPemeriksaanMCU()"><i class="far fa-save"></i> Update</button>`;
                    btnPrintHPMCU = `<button type="button" class="btn btn-info waves-effect" onclick="cetakHasilMCU('${id_pendaftaran}', '${id_layanan}', '${id_pasien}', '${p}')"><i class="mdi mdi-printer m-r-5"></i> Cetak Hasil Pemeriksaan MCU</button>`;
                } else {
                    btnSimpanHPMCU = `<button type="button" class="btn btn-info waves-effect" onclick="saveHasilPemeriksaanMCU()"><i class="fas fa-save"></i> Simpan</button>`;
                }
                $('#btn-simpan-hpmcu').append(btnSimpanHPMCU + btnPrintHPMCU);

                // $('#wizard-form-1').bwizard('show', '0');
                $('#modal-hasil-pemeriksaan-mcu').modal('show');

                // $.each(data.data, function(i, v) {


                // });

            },
            complete: function() {
                hideLoader();
                // $('#modal-search').modal('hide')
            },
            error: function(e) {
                messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
            }
        })
    }

    function saveHasilPemeriksaanMCU() {
        // if (!pemeriksaan) {
        //     syams_validation('#pemeriksaan_aurk', 'Detail Pemeriksaan harus diinput.');
        //     return false;
        // }

        $.ajax({
            type: 'POST',
            url: '<?= base_url('medical_check_up/api/hasil_pemeriksaan_mcu/simpan_hasil_pemeriksaan_mcu') ?>',
            data: $('#form-hasil-pemeriksaan').serialize(),
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status) {
                    messageCustom(data.message, 'Success');

                    // $('#wizard-form-1').bwizard('show', '1');
                    hasilPemeriksaanMCU($('#id-pendaftaran-hpmcu').val(), $('#id-layanan-hpmcu').val(), $('#id-pasien-hpmcu').val(), $('#page_now').val())
                } else {
                    messageCustom(data.message, 'Error');
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT.', 'Error');
            }
        });
    }

    function tambah_faktor_klinis() {

        var pemeriksaan = document.getElementById('pemeriksaan_aurk').value;
        if (!pemeriksaan) {
            syams_validation('#pemeriksaan_aurk', 'Detail Pemeriksaan harus diinput.');
            return false;
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url('medical_check_up/api/hasil_pemeriksaan_mcu/simpan_faktor_klinis_mcu') ?>',
            data: $('#form-hasil-pemeriksaan').serialize(),
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status) {

                    $('#detail_faktor_klinis').children().remove();
                    $('#pemeriksaan_aurk').val("")
                    $('#hasil_klinis_aurk').val("")
                    $('#keterangan_klinis_aurk').val("")
                    $('#detail_pemeriksaan_aurk').val("")
                    $('#detail_hasil_klinis_aurk').val("")
                    $('#detail_keterangan_klinis_aurk').val("")

                    getFaktorKlinis($('#id-pendaftaran-hpmcu').val());
                    messageCustom(data.message, 'Success');

                } else {
                    messageCustom(data.message, 'Error');
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT.', 'Error');
            }
        });
    }

    function konfirmasiHapusFaktorKlinis(id) {
        // console.log($id);
        Swal.fire({
            title: 'Hapus Data Faktor Klinis!',
            text: "Apakah anda yakin ingin menghapus data ini ?",
            icon: 'warning',
            allowOutsideClick: false,
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
            confirmButtonText: '<i class="fas fa-trash mr-1"></i>Hapus',
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url('medical_check_up/api/hasil_pemeriksaan_mcu/hapus_faktor_klinis_mcu') ?>',
                    data: {
                        id: id
                    },
                    dataType: 'JSON',
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(data) {
                        if (data.status) {
                            getFaktorKlinis($('#id-pendaftaran-hpmcu').val());
                            messageCustom(data.message, 'Success');

                        } else {
                            messageCustom(data.message, 'Error');
                        }
                    },
                    complete: function() {
                        hideLoader();
                    },
                    error: function(e) {
                        messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT.', 'Error');
                    }
                });
            }
        });
    }

    // function hapusFaktorKlinis($id) {
    //     $.ajax({
    //         type: 'POST',
    //         url: '<?= base_url('medical_check_up/api/hasil_pemeriksaan_mcu/hapus_faktor_klinis_mcu') ?>',
    //         data: {
    //             id: id
    //         },
    //         dataType: 'JSON',
    //         beforeSend: function() {
    //             showLoader();
    //         },
    //         success: function(data) {
    //             if (data.status) {
    //                 messageCustom(data.message, 'Success');

    //             } else {
    //                 messageCustom(data.message, 'Error');
    //             }
    //         },
    //         complete: function() {
    //             hideLoader();
    //         },
    //         error: function(e) {
    //             messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT.', 'Error');
    //         }
    //     });
    // }

    function getFaktorKlinis(id_pendaftaran) {
        $('#table-faktor-klinis tbody').empty();

        $.ajax({
            type: 'GET',
            url: '<?= base_url("medical_check_up/api/hasil_pemeriksaan_mcu/faktor_klinis") ?>/id/' + id_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                let faktor_klinis = data.faktor_klinis;
                let html = ``;

                if (faktor_klinis.length != 0) {
                    $.each(faktor_klinis, function(i, v) {
                        html += /* html */ `
                        <tr>
                            <td width="35%">${v.pemeriksaan}</td>
                            <td width="20%">${v.hasil}</td>
                            <td width="35%">${v.keterangan}</td>
                            <td width="10%"><button type="button" onclick="konfirmasiHapusFaktorKlinis(${v.id})" class="btn btn-danger btn-rounded"><i class="fas fa-trash"></i></button></td>
                        </tr>`;

                        $.each(v.detail, function(ind, val) {
                            html += `
                            <tr>
                                <td style="padding-left: 30px;" width="35%">${val.detail_pemeriksaan}</td>
                                <td width="20%">${val.detail_hasil}</td>
                                <td width="35%">${val.detail_keterangan}</td>
                                <td width="10%"></td>
                            </tr>
                        `;
                        });
                    });

                    $('#table-faktor-klinis tbody').append(html);
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
            }
        });
    }

    function tambah_detail_fk() {
        roomDetail++;

        // Ambil data dari input pertama sebelum menambah field baru
        var detail_pemeriksaan = document.getElementById('detail_pemeriksaan_aurk').value;
        var detail_hasil = document.getElementById('detail_hasil_klinis_aurk').value;
        var detail_keterangan = document.getElementById('detail_keterangan_klinis_aurk').value;

        // Pastikan semua field diisi sebelum menambah field baru
        if (!detail_pemeriksaan) {
            syams_validation('#detail_pemeriksaan_aurk', 'Detail Pemeriksaan harus diinput.');
            return false;
        }

        // Buat baris baru
        var objTo = document.getElementById('detail_faktor_klinis');
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "row removeclass-detail" + roomDetail);

        divtest.innerHTML =
            '<div class="col-sm-1 nopadding">' +
            '</div>' +
            '<div class="col-sm-3 nopadding">' +
            '   <div class="form-group">' +
            '       <input type="text" class="form-control" name="detail_pemeriksaan_aurk[]" value="' + detail_pemeriksaan + '" placeholder="Pemeriksaan">' +
            '   </div>' +
            '</div>' +
            '<div class="col-sm-3 nopadding">' +
            '   <div class="form-group">' +
            '       <input type="text" class="form-control" name="detail_hasil_klinis_aurk[]" value="' + detail_hasil + '" placeholder="Hasil">' +
            '   </div>' +
            '</div>' +
            '<div class="col-sm-3 nopadding">' +
            '   <div class="form-group">' +
            '       <input type="text" class="form-control" name="detail_keterangan_klinis_aurk[]" value="' + detail_keterangan + '" placeholder="Keterangan">' +
            '   </div>' +
            '</div>' +
            '<div class="col-sm-2 nopadding">' +
            '   <div class="form-group">' +
            '       <div class="input-group">' +
            '           <div class="input-group-append">' +
            '               <button class="btn btn-danger" type="button" onclick="remove_detail_fk(' + roomDetail + ');">' +
            '               <i class="fa fa-minus"></i></button>' +
            '           </div>' +
            '       </div>' +
            '   </div>' +
            '</div>';

        objTo.appendChild(divtest);

        // Reset field input pertama untuk input baru
        syams_validation_remove('#detail_pemeriksaan_aurk');
        document.getElementById('detail_pemeriksaan_aurk').value = "";
        document.getElementById('detail_hasil_klinis_aurk').value = "";
        document.getElementById('detail_keterangan_klinis_aurk').value = "";
    }

    function remove_detail_fk(rid) {
        document.querySelector('.removeclass-detail' + rid).remove();
    }
</script>