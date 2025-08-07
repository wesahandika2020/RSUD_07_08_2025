<script>
    $(function() {
        $('#golongan-sebab-sakit-resume').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/golongan_sebab_sakit_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
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
                var kode_icdx = (data.kode_icdx_rinci !== null || data.kode_icdx_rinci !== '') ? (data.kode_icdx_rinci + ' - ') : '';

                var markup = '<b>' + kode_icdx + '</b>' + data.nama + '<br/><i>' + data.nama_idn + '</i>';
                return markup;
            },
            formatSelection: function(data) {
                return data.kode_icdx_rinci + ' | ' + data.nama;
            }
        });

        // Copy Field Diagnosa Banding
        var removeLink = ' <a class="remove btn btn-danger btn-xxs" style="height:20px;" href="#" onclick="$(this).parent().slideUp(function(){ $(this).remove() }); return false"><i class="fas fa-trash-alt"></i></a>';
        $('a.copy').relCopy({
            limit: 5,
            append: removeLink
        });
        // End Copy Field Diagnosa Banding

        $('#golongan-sebab-sakit-resume').change(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        // diagnosa akhir
        $('#diagnosa-akhir-resume').change(function() {
            $('#diagnosa-akhir-resume').each(function() {
                let val = this.type == "checkbox" ? +this.checked : this.value;
                $('#diagnosa-akhir-resume').val(val);
            });
        });

        // penyebab kematian
        $('#penyebab-kematian-resume').change(function() {
            $('#penyebab-kematian-resume').each(function() {
                let val = this.type == "checkbox" ? +this.checked : this.value;
                $('#penyebab-kematian-resume').val(val);
            });
        });
    });

    function checkIsPrimer() {
        if ($('.hiddenprimer').length > 0) {
            var stop = true;
            $('.hiddenprimer').each(function(i, v) {
                if ($(v).val() === 'Utama') {
                    stop = false;
                }
            });
            return stop;
        } else {
            return false;
        }
    }

    function setPrimerDiagnosaResume(obj, elem) {
        $('.hiddenprimer').val('Sekunder');
        $('.checkprimer').prop('checked', false);
        $('#' + elem).val('Utama');
        $(obj).prop('checked', true);
    }

    function setIsResume(obj, elem) {
        if ($('#' + elem).val() == '1') {
            $('#' + elem).prop('checked', false);
            $('#' + elem).val('0');
        } else {
            $(obj).prop('checked', true);
            $('#' + elem).val('1');
        }
    }

    function detailPemeriksaanResume(ini, id_pendaftaran, id_layanan, bed) {
        $('#wizard-form').bwizard('show', ini);

        setTanggalPencarian();

        $('#id-layanan-resume').val(id_layanan);
        $('#id-pendaftaran-pasien-resume').val(id_pendaftaran);
        // $('#id-dftr-hemodialisis').val(id_pendaftaran);
        // $('#id-dftr-dpmp').val(id_pendaftaran);

        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/diagnosa_resume/get_diagnosa_id_pendaftaran") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                let umur = '';
                let kelamin = '';
                let pasien = data.pasien;
                let layanan = data.layanan;
                // let anamnesa = data.anamnesa[0];

                if (pasien !== null) {
                    if (pasien.kelamin == 'L') {
                        kelamin = 'Laki - laki';
                    } else {
                        kelamin = 'Perempuan';
                    }

                    if (pasien.tanggal_lahir !== null) {
                        umur = hitungUmur(pasien.tanggal_lahir) + ' (' + datefmysql(pasien.tanggal_lahir) + ')';
                    }

                    $('#id-pasien-resume').val(pasien.id_pasien);
                    $('#nama-detail-resume').html(pasien.nama);
                    $('#no-rm-detail-resume').html(pasien.id_pasien);
                    $('#no-register-detail-resume').html(pasien.no_register);
                    $('#kelamin-detail-resume').html(kelamin);
                    $('#umur-detail-resume').html(umur);
                    $('#agama-detail-resume').html(pasien.agama);
                    $('#telp-detail-resume').html(pasien.telp);
                    $('#alamat-detail-resume').html(pasien.alamat);
                    $('#alergi-detail-resume').html(pasien.alergi);
                    $('#alergi-resume').val(pasien.alergi);
                    $('#no-ktp-pasien-resume').val(pasien.no_identitas);
                    $('#tgl-lahir-resume').val(pasien.tanggal_lahir);

                }

                // diagnosa
                $('#prioritas').val('Utama');
                if (data.diagnosa.length > 0) {
                    showDiagnosaResume(data.diagnosa);
                } else {
                    $('#table-diagnosa-resume tbody').empty();
                }

                $('#modal-pemeriksaan-resume').modal('show');
                $('#modal-pemeriksaan-resume-label').html('Form Edit Diagnosa');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {

            }
        });
    }

    function KonfirmDetailPemeriksaanResume(ini, id_pendaftaran, id_layanan, visit_anestesi, bed) {
        user = '<?= $_SESSION['account_group'] ?>';
        $('#modal-resume-medis').modal('hide');
        if (visit_anestesi === 0 & user === 'Dokter Anestesi') {
            $('#id_layanan_pendaftaran_visit').val(id_layanan);
            $('#id_dokter_visit').val('<?= $this->session->userdata("id_translucent") ?>');
            $('#ini').val(ini);
            $('#visit_id_pendaftaran').val(id_pendaftaran);
            $('#visit_id_layanan').val(id_layanan);
            $('#visit_bed').val(bed);

            $('#konfirmasi-visit-anestesi-resume').modal('show');

        } else {
            detailPemeriksaanResume(ini, id_pendaftaran, id_layanan, bed);
        }
    }

    function konfirmasiSimpanPemeriksaanResume() {
        swal.fire({
            title: 'Simpan Perubahan',
            text: "Apakah anda yakin akan melakukan perubahan Diagnosis ?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
            cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                simpanDataPemeriksaanResume();
            }
        })
    }

    function simpanDataPemeriksaanResume() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/simpan_edit_diagnosa") ?>',
            data: $('#form-pemeriksaan-resume').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                if (data.status) {
                    messageEditSuccess();
                    $('#modal-pemeriksaan-resume').modal('hide');
                    $('.modal-backdrop').addClass('hide');

                    let id_pendaftaran = $('#id-pendaftaran-pasien-resume').val();

                    let id_layanan = $('#id-layanan-resume').val();
                    let id_pasien = $('#id-pasien-resume').val();

                    if ($('#action').val() == 'tambah') {
                        tambahFormulirBaru('FORM_REM_01_01', id_pendaftaran, id_layanan, id_pasien)
                    } else if (($('#action').val() == 'edit')) {
                        editFormulir('FORM_REM_01_01', id_pendaftaran, id_layanan, id_pasien)
                    }
                    // getListPemeriksaan(1);
                } else {
                    messageEditFailed();
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    function addDiagnosaResume() {
        const layanan = $('#jenis-layanan').val();
        const listLayanan = ['Rawat Inap', 'Intensive Care', 'Hemodialisa']

        if ($('#dokter-diagnosa-resume').val() === '') {
            syams_validation('#dokter-diagnosa-resume', 'Kolom dokter harus diisi.');
            $('#wizard-form').bwizard('show', '1');
            return false;
        }

        if ($('#diagnosa-manual-resume').val() === '1') {
            if ($('#golongan-sebab-sakit-lain-resume').val() === '') {
                syams_validation('#golongan-sebab-sakit-lain-resume', 'Kolom diagnosa harus diisi.');
                $('#wizard-form').bwizard('show', '2');
                return false;
            }

            if ($('#golongan-sebab-sakit-lain-resume').val().trim().length <= 2) {
                syams_validation('#golongan-sebab-sakit-lain-resume', 'Kolom diagnosa harus lebih dari 3 karakter');
                return false;
            }

        } else {
            if ($('#golongan-sebab-sakit-resume').val() === '') {
                syams_validation('#golongan-sebab-sakit-resume', 'Kolom diagnosa harus diisi.');
                $('#wizard-form').bwizard('show', '2');
                return false;
            }
        }

        if ($('#jenis_kasus_resume').val() === '') {
            syams_validation('#jenis_kasus_resume', 'Jenis kasus harus dipilih.');
            return false;
        }

        var html = '';
        var numberDiagnosa = $('.number-diag-resume').length;
        var diagnosaManual = $('#diagnosa-manual-resume').val();
        var dokter = $('#s2id_dokter-diagnosa-resume a .select2c-chosen').html();
        var id_dokter = $('#dokter-diagnosa-resume').val();
        var golonganSebabSakit = $('#s2id_golongan-sebab-sakit-resume a .select2c-chosen').html();
        var kodeDiagnosa = golonganSebabSakit.substr(0, 3);
        var golonganSebabSakitLain = $('#golongan-sebab-sakit-lain-resume').val();
        var id_gol_sebab_sakit = $('#golongan-sebab-sakit-resume').val();
        var diagnosaKlinik = $('#diagnosa-klinik').val();
        var jenisKasus = $('#jenis_kasus_resume').val();
        var diagnosaBanding = $("input[name='diagnosa_banding[]']").map(function() {
            return $(this).val();
        }).get();
        var diagnosaAkhir = $('#diagnosa-akhir-resume').val();
        var penyebabKematian = $('#penyebab-kematian-resume').val();

        var idhid = 'primerdiag' + numberDiagnosa;
        var idResume = 'diagIsResume' + numberDiagnosa;
        var valPrimer = 'Sekunder';
        var valResume = '1';
        var checkPrimer = '';
        var checkResume = 'checked';
        if (numberDiagnosa === 0) {
            valPrimer = 'Utama';
            checkPrimer = 'checked';
        }

        // Kondisi diagnosa tidak terpilih otiomatis UTAMA untuk Hemodialisa
        if ($('#jenis-layanan').val() === 'Hemodialisa') {
            var valPrimer = 'Sekunder';
            var checkPrimer = '';
            var valResume = '0';
            var checkResume = '';
        }

        var jenisKasusLabel = '';
        if (jenisKasus == 1) {
            jenisKasusLabel = 'Baru';
        } else {
            jenisKasusLabel = 'Lama';
        }

        // alert(kodeDiagnosa);

        var diagnosa = '';
        if (diagnosaManual == 1) {
            diagnosa = `<input type="hidden" name="gol_sebab_sakit_lain[]" value="${golonganSebabSakitLain}">${golonganSebabSakitLain}
                        <input type="hidden" name="id_golongan_sebab_sakit[]" value>`;
        } else {
            diagnosa = `<input type="hidden" name="gol_sebab_sakit_lain[]" value="${golonganSebabSakitLain}">
                        <input type="hidden" name="id_golongan_sebab_sakit[]" value="${id_gol_sebab_sakit}">${golonganSebabSakit}`;
        }

        html = /* html */ `
            <tr>
                <td class="number-diag-resume center">
                    <input type="hidden" name="id_diag[]" value="">
                    <input type="hidden" name="kode_diag[]" value="${kodeDiagnosa}">
                    <input type="hidden" name="is_resume[]" id="${idResume}" value="${valResume}">
                    <input type="checkbox" ${checkResume} onchange="return setIsResume(this, '${idResume}')">
                </td>
                <td>
                    <?= date('Y-m-d H:i:s') ?>
                </td>
                <td>
                    <input type="hidden" name="dokter_diag[]" value="${id_dokter}">${dokter}
                </td>
                <td>
                    <input type="hidden" name="diag_manual[]" value="${diagnosaManual}">
                    ${diagnosa}
                </td>
                <td>
                    <input type="hidden" name="diag_klinis[]" value="${diagnosaKlinik}">${(diagnosaKlinik == 1) ? 'Ya' : 'Tidak' }
                </td>
                <td class="center">
                    <input type="hidden" class="hiddenprimer" name="prioritas[]" id="${idhid}" value="${valPrimer}">
                    <input type="checkbox" class="checkprimer" ${!listLayanan.includes(layanan) ? checkPrimer : ''} onchange="return setPrimerDiagnosaResume(this, '${idhid}')">
                </td>
                <td class="center">
                    <input type="hidden" name="jenis_kasus[]" value="${jenisKasus}"> ${(jenisKasusLabel)}
                </td>
                <td>
                    <input type="hidden" name="diag_banding[]" value="${diagnosaBanding}"> ${(diagnosaBanding)}
                </td>
                <td>
                    <input type="hidden" name="diag_akhir[]" value="${diagnosaAkhir}">${(diagnosaAkhir == 1) ? 'Ya' : 'Tidak' }
                </td>
                <td>
                    <input type="hidden" name="sebab_kematian[]" value="${penyebabKematian}">${(penyebabKematian == 1) ? 'Ya' : 'Tidak' }
                </td>
                <td class="right">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
        `;

        $('#table-diagnosa-resume tbody').append(html);
        $('#diagnosa-manual-resume').val('');

        $('#golongan-sebab-sakit-lain-resume').val('');
        $('#golongan-sebab-sakit-resume').val('');
        $('#s2id_golongan-sebab-sakit a .select2c-chosen').html('');

        $('#diagnosa-banding').val('');
        $('.copy1').remove();
        $('.copy2').remove();
        $('.copy3').remove();
        $('.copy4').remove();

        $('#diagnosa-klinik').val('');
        $('#jenis_kasus_resume').val('');
        $('#diagnosa-akhir-resume').val('');
        $('#penyebab-kematian-resume').val('');

        $('.golongan-sebab-sakit-lain-resume').hide();
        $('.golongan-sebab-sakit-lain-resume').val('');
        $('.golongan-sebab-sakit-resume').show();

        $('#diagnosa-manual-resume, #diagnosa-akhir-resume, #penyebab-kematian-resume').prop('checked', false);
        syams_validation_remove('.select2c-input, .custom-form');
    }

    function removeList(el) {
        var parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
    }

    function showDiagnosaResume(data) {
        $('#table-diagnosa-resume tbody').empty();
        if (data !== null) {
            var valPrimer = 'Sekunder';
            var valResume = '0';
            var jenisKasus = '';
            $.each(data, function(i, v) {
                if (v.prioritas == 'Utama') {
                    checkPrimer = 'checked';
                    valPrimer = 'Utama';
                } else {
                    checkPrimer = '';
                    valPrimer = 'Sekunder';
                }

                // Diagnosa Resume Pendaftaran
                if (v.is_resume == '1') {
                    checkResume = 'checked';
                    valResume = '1';
                } else {
                    checkResume = '';
                    valResume = '0';
                }

                if (v.jenis_kasus == 1 && v.jenis_kasus != null) {
                    jenisKasus = 'Baru';
                } else if (v.jenis_kasus == 0 && v.jenis_kasus != null) {
                    jenisKasus = 'Lama';
                } else {
                    jenisKasus = '';
                }

                let number = $('.number-diag-resume').length;
                let kodeDiagnosa = '';
                let diagnosa = '';
                let num = (++i);
                let waktu = v.waktu;
                let dokter = v.dokter;
                let diagnosa_klinis = (v.diagnosa_klinis == 1) ? 'Ya' : 'Tidak';
                let check_prioritas = '';
                let check_resume = '';
                let diagnosa_banding = v.diagnosa_banding;
                let diagnosa_akhir = (v.diagnosa_akhir == 1) ? 'Ya' : 'Tidak';
                let penyebab_kematian = (v.penyebab_kematian == 1) ? 'Ya' : 'Tidak';
                let button_hapus = '';

                if (v.diagnosa_manual == 1) {
                    diagnosa = `<input type="hidden" name="gol_sebab_sakit_lain[]" value> ${((v.golongan_sebab_sakit_lain !== null) ? v.golongan_sebab_sakit_lain : '')}
                                <input type="hidden" name="id_golongan_sebab_sakit[]" value>`;
                } else {
                    diagnosa = `<input type="hidden" name="id_golongan_sebab_sakit[]" value> ${((v.golongan_sebab_sakit !== null) ? v.golongan_sebab_sakit : '')}
                                <input type="hidden" name="gol_sebab_sakit_lain[]" value> ${((v.golongan_sebab_sakit_lain !== null) ? v.golongan_sebab_sakit_lain : '')}`;
                    kodeDiagnosa = v.golongan_sebab_sakit.substr(0, 3);
                }

                if (v.log != '0') {
                    num = `<s> ${num} </s>`
                    waktu = `<s> ${waktu} </s>`
                    dokter = `<s> ${dokter} </s>`
                    diagnosa = `<s> ${diagnosa} </s>`
                    diagnosa_klinis = `<s> ${diagnosa_klinis} </s>`
                    check_prioritas = `disabled`
                    check_resume = `disabled`
                    jenisKasus = `<s> ${jenisKasus} </s>`
                    diagnosa_banding = `<s> ${diagnosa_banding} </s>`
                    diagnosa_akhir = `<s> ${diagnosa_akhir} </s>`
                    penyebab_kematian = `<s> ${penyebab_kematian} </s>`
                    button_hapus = `disabled`
                }
                // ** INI PUNYA TABLE DIAGNOSA, REVISI RAJAL
                var idhid = 'primerdiag' + number;
                var idResume = 'diagIsResume' + number;
                let html = /* html */ `
                    <tr>
                        <td class="number-diag-resume center">
                            <input type="hidden" name="id_diag[]" value="${v.id}">
                            <input type="hidden" name="kode_diag[]" value="${kodeDiagnosa}">
                            <input type="hidden" name="is_resume[]" id="${idResume}" value="${valResume}">
                            <input type="checkbox" ${check_resume} ${checkResume} onchange="return setIsResume(this, '${idResume}')">
                        </td>
						<td>
                            <input type="hidden" name="waktu_diag[]" value="${v.waktu}">${waktu}
                        </td>
                        <td class="nowrap">
                            <input type="hidden" name="dokter_diag[]" value="${v.id_dokter}">${dokter}
                        </td>
                        <td>
                            <input type="hidden" name="diag_manual[]" value="${v.diagnosa_manual}">
                            ${diagnosa}
                        </td>
                        <td>
                            <input type="hidden" name="diag_klinis[]" value="${v.diagnosa_klinis}">${diagnosa_klinis}
                        </td>
                        <td class="center">
                            <input type="hidden" class="hiddenprimer" name="prioritas[]" id="${idhid}" value="${valPrimer}">
                            <input type="checkbox" ${check_prioritas} class="checkprimer" ${checkPrimer} onchange="return setPrimerDiagnosaResume(this, '${idhid}')">
                        </td>
                        <td class="center">
                            <input type="hidden" name="jenis_kasus[]" value="${(v.jenis_kasus !== null ? v.jenis_kasus : '')}"> ${jenisKasus}
                        </td>
                        <td>
                            <input type="hidden" name="diag_banding[]" value="${v.diagnosa_banding}"> ${(diagnosa_banding)}
                        </td>
                        <td>
                            <input type="hidden" name="diag_akhir[]" value="${v.diagnosa_akhir}">${diagnosa_akhir}
                        </td>
                        <td>
                            <input type="hidden" name="sebab_kematian[]" value="${v.penyebab_kematian}">${penyebab_kematian}
                        </td>
                        <td align="right">
                            <button type="button" ${button_hapus} class="btn btn-secondary btn-xxs" onclick="hapusDiagnosaResume(this, ${v.id})">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                `;

                $('#table-diagnosa-resume tbody').append(html);
            });

        }
    }

    function showDiagnosaRuangLain(data) {
        $('#table-diagnosa-resume-ruang-lain tbody').empty();
        if (data !== null) {
            var valPrimer_ = 'Sekunder';
            var jenisKasus_ = '';
            $.each(data, function(i, v) {
                if (v.prioritas == 'Utama') {
                    checkPrimer_ = 'checked';
                    valPrimer_ = 'Utama';
                } else {
                    checkPrimer_ = '';
                    valPrimer_ = 'Sekunder';
                }

                if (v.jenis_kasus == 1 && v.jenis_kasus != null) {
                    jenisKasus_ = 'Baru';
                } else if (v.jenis_kasus == 0 && v.jenis_kasus != null) {
                    jenisKasus_ = 'Lama';
                } else {
                    jenisKasus_ = '';
                }

                // let number_ = $('.number-diag-resume').length;
                let kodeDiagnosa_ = '';
                let diagnosa_ = '';
                let num_ = (++i);
                let waktu_ = v.waktu;
                let dokter_ = v.dokter;
                let diagnosa_klinis_ = (v.diagnosa_klinis == 1) ? 'Ya' : 'Tidak';
                let check_prioritas_ = 'disabled';
                let diagnosa_banding_ = v.diagnosa_banding;
                let diagnosa_akhir_ = (v.diagnosa_akhir == 1) ? 'Ya' : 'Tidak';
                let penyebab_kematian_ = (v.penyebab_kematian == 1) ? 'Ya' : 'Tidak';

                if (v.diagnosa_manual == 1) {
                    diagnosa_ = `<input type="hidden" name="gol_sebab_sakit_lain[]" value> ${((v.golongan_sebab_sakit_lain !== null) ? v.golongan_sebab_sakit_lain : '')}
                            <input type="hidden" name="id_golongan_sebab_sakit[]" value>`;
                } else {
                    diagnosa_ = `<input type="hidden" name="id_golongan_sebab_sakit[]" value> ${((v.golongan_sebab_sakit !== null) ? v.golongan_sebab_sakit : '')}
                            <input type="hidden" name="gol_sebab_sakit_lain[]" value> ${((v.golongan_sebab_sakit_lain !== null) ? v.golongan_sebab_sakit_lain : '')}`;
                    kodeDiagnosa_ = v.golongan_sebab_sakit.substr(0, 3);
                }
                // ** INI PUNYA TABLE DIAGNOSA, REVISI RAJAL

                let html = /* html */ `
                <tr>
                    <td class="center"><i>${num_}</i></td>
                    <td><i>${waktu_}</i></td>
                    <td class="nowrap"><i>${dokter_}</i></td>
                    <td><i>${diagnosa_} <br><b>${v.diagnosa_asal}</b></i></td>
                    <td><i>${diagnosa_klinis_}</i></td>
                    <td class="center">
                        <input type="hidden" class="hiddenprimer" >
                        <input type="checkbox" ${check_prioritas_} class="checkprimer" ${checkPrimer_}>
                    </td>
                    <td class="center"><i> ${jenisKasus_}</i></td>
                    <td><i> ${(diagnosa_banding_)}</i></td>
                    <td><i>${diagnosa_akhir_}</i></td>
                    <td><i>${penyebab_kematian_}</i></td>
                    <td align="right">
                        <button type="button" class="btn btn-secondary btn-xxs" onclick="hapusDiagnosaResume(this, ${v.id})">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
            `;

                $('#table-diagnosa-resume-ruang-lain tbody').append(html);
            });

        }
    }

    function hapusDiagnosaResume(obj, id) {
        bootbox.dialog({
            message: "Anda yakin akan menghapus data ini?",
            title: "Hapus Data",
            buttons: {
                batal: {
                    label: '<i class="fas fa-window-close"></i> Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                hapus: {
                    label: '<i class="fas fa-trash-alt"></i>  Hapus',
                    className: "btn-info",
                    callback: function() {
                        $.ajax({
                            type: 'DELETE',
                            url: '<?= base_url("pelayanan/api/pelayanan/hapus_diagnosa_pemeriksaan") ?>/' + id,
                            cache: false,
                            dataType: 'json',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    removeList(obj);
                                } else {
                                    customAlert('Hapus Diagnosa', data.message);
                                }
                            },
                            error: function(e) {
                                messageDeleteFailed();
                            }
                        });
                    }
                }
            }
        });
    }
</script>