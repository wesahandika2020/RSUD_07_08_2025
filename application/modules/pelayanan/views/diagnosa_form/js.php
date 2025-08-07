<script>
    $(function() {
        $('#golongan-sebab-sakit').select2c({
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

        $('#golongan-sebab-sakit').change(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
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

    function setPrimerDiagnosa(obj, elem) {
        $('.hiddenprimer').val('Sekunder');
        $('.checkprimer').prop('checked', false);
        $('#' + elem).val('Utama');
        $(obj).prop('checked', true);
    }

    function addDiagnosa() {
        const layanan = $('#jenis-layanan').val();
        const listLayanan = ['Rawat Inap', 'Intensive Care', 'Hemodialisa']
        if ($('#diagnosa-manual').val() === '1') {
            if ($('#golongan-sebab-sakit-lain').val() === '') {
                syams_validation('#golongan-sebab-sakit-lain', 'Kolom diagnosa harus diisi.');
                $('#wizard-form').bwizard('show', '2');
                return false;
            }

            if ($('#golongan-sebab-sakit-lain').val().trim().length <= 2) {
                syams_validation('#golongan-sebab-sakit-lain', 'Kolom diagnosa harus lebih dari 3 karakter');
                return false;
            }

        } else {
            if ($('#golongan-sebab-sakit').val() === '') {
                syams_validation('#golongan-sebab-sakit', 'Kolom diagnosa harus diisi.');
                $('#wizard-form').bwizard('show', '2');
                return false;
            }
        }

        if ($('#dokter').val() === '') {
            syams_validation('#dokter', 'Kolom dokter harus diisi.');
            $('#wizard-form').bwizard('show', '1');
            return false;
        }

        if ($('#jenis_kasus').val() === '') {
            syams_validation('#jenis_kasus', 'Jenis kasus harus dipilih.');
            return false;
        }

        var html = '';
        var numberDiagnosa = $('.number-diag').length;
        var diagnosaManual = $('#diagnosa-manual').val();
        var dokter = $('#s2id_dokter a .select2c-chosen').html();
        var id_dokter = $('#dokter').val();
        var golonganSebabSakit = $('#s2id_golongan-sebab-sakit a .select2c-chosen').html();
        var kodeDiagnosa = golonganSebabSakit.substr(0, 3);
        var golonganSebabSakitLain = $('#golongan-sebab-sakit-lain').val();
        var id_gol_sebab_sakit = $('#golongan-sebab-sakit').val();
        var diagnosaKlinik = $('#diagnosa-klinik').val();
        var jenisKasus = $('#jenis_kasus').val();
        var diagnosaBanding = $("input[name='diagnosa_banding[]']").map(function() {
            return $(this).val();
        }).get();
        var diagnosaAkhir = $('#diagnosa-akhir').val();
        var penyebabKematian = $('#penyebab-kematian').val();

        var idhid = 'primerdiag' + numberDiagnosa;
        var valPrimer = 'Sekunder';
        var checkPrimer = '';
        if (numberDiagnosa === 0) {
            valPrimer = 'Utama';
            checkPrimer = 'checked';
        }

        // Kondisi diagnosa tidak terpilih otiomatis UTAMA untuk Hemodialisa
        if ($('#jenis-layanan').val() === 'Hemodialisa') {
            var valPrimer = 'Sekunder';
            var checkPrimer = '';
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
                <td class="number-diag center">
                    <input type="hidden" name="id_diag[]" value="">${(++numberDiagnosa)}
                    <input type="hidden" name="kode_diag[]" value="${kodeDiagnosa}">
                </td>
                <td>
                    
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
                    <input type="checkbox" class="checkprimer" ${!listLayanan.includes(layanan) ? checkPrimer : ''} onchange="return setPrimerDiagnosa(this, '${idhid}')">
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

        $('#table-diagnosa tbody').append(html);
        $('#diagnosa-manual').val('');

        $('#golongan-sebab-sakit-lain').val('');
        $('#golongan-sebab-sakit').val('');
        $('#s2id_golongan-sebab-sakit a .select2c-chosen').html('');

        $('#diagnosa-banding').val('');
        $('.copy1').remove();
        $('.copy2').remove();
        $('.copy3').remove();
        $('.copy4').remove();

        $('#diagnosa-klinik').val('');
        $('#jenis_kasus').val('');
        $('#diagnosa-akhir').val('');
        $('#penyebab-kematian').val('');

        $('.golongan-sebab-sakit-lain').hide();
        $('.golongan-sebab-sakit-lain').val('');
        $('.golongan-sebab-sakit').show();

        $('#diagnosa-manual, #diagnosa-akhir, #penyebab-kematian').prop('checked', false);
        syams_validation_remove('.select2c-input, .custom-form');
    }

    function removeList(el) {
        var parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
    }

    function showDiagnosa(data) {
        $('#table-diagnosa tbody').empty();
        if (data !== null) {
            var valPrimer = 'Sekunder';
            var jenisKasus = '';
            $.each(data, function(i, v) {
                if (v.prioritas == 'Utama') {
                    checkPrimer = 'checked';
                    valPrimer = 'Utama';
                } else {
                    checkPrimer = '';
                    valPrimer = 'Sekunder';
                }

                if (v.jenis_kasus == 1 && v.jenis_kasus != null) {
                    jenisKasus = 'Baru';
                } else if (v.jenis_kasus == 0 && v.jenis_kasus != null) {
                    jenisKasus = 'Lama';
                } else {
                    jenisKasus = '';
                }

                let number = $('.number-diag').length;
                let kodeDiagnosa = '';
                let diagnosa = '';
                let num = (++i);
                let waktu = v.waktu;
                let dokter = v.dokter;
                let diagnosa_klinis = (v.diagnosa_klinis == 1) ? 'Ya' : 'Tidak';
                let check_prioritas = '';
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
                    jenisKasus = `<s> ${jenisKasus} </s>`
                    diagnosa_banding = `<s> ${diagnosa_banding} </s>`
                    diagnosa_akhir = `<s> ${diagnosa_akhir} </s>`
                    penyebab_kematian = `<s> ${penyebab_kematian} </s>`
                    button_hapus = `disabled`
                }
                // ** INI PUNYA TABLE DIAGNOSA, REVISI RAJAL
                var idhid = 'primerdiag' + number;
                let html = /* html */ `
                    <tr>
                        <td class="number-diag center">
                            <input type="hidden" name="id_diag[]" value="${v.id}"> ${num}
                            <input type="hidden" name="kode_diag[]" value="${kodeDiagnosa}">
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
                            <input type="checkbox" ${check_prioritas} class="checkprimer" ${checkPrimer} onchange="return setPrimerDiagnosa(this, '${idhid}')">
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
                            <button type="button" ${button_hapus} class="btn btn-secondary btn-xxs" onclick="hapusDiagnosa(this, ${v.id})">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                `;

                $('#table-diagnosa tbody').append(html);
            });

        }
    }

    function showDiagnosaRuangLain(data) {
        $('#table-diagnosa-ruang-lain tbody').empty();
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

                // let number_ = $('.number-diag').length;
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
                        <button type="button" class="btn btn-secondary btn-xxs" onclick="hapusDiagnosa(this, ${v.id})">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
            `;

                $('#table-diagnosa-ruang-lain tbody').append(html);
            });

        }
    }

    function hapusDiagnosa(obj, id) {
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