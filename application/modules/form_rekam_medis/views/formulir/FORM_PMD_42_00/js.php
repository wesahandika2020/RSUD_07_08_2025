<script>
    $(function() {

        // transfer pasien
        let currentDate = new Date();
        $('#mpp_tanggal_1, #mpp_tanggal_2, #mpp_tanggal_3').datetimepicker({
            format: 'DD/MM/YYYY HH:mm',
            pickSecond: false,
            pick12HourFormat: false,
            // maxDate: new Date(currentDate.getFullYear(), currentDate.getMonth() + 2, 0),
            maxDate: new Date(),
            beforeShow: function(i) {
                if ($(i).attr('readonly')) {
                    return false;
                }
            }
        });

        $('#mpp_dokter').select2c({
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
                return data.nama;
            }
        });


        $('#mpp_petugas_1, #mpp_petugas_2, #mpp_petugas_3').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        jenis: $('#c_profesi').val(),
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
                var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
                return markup;
            },
            formatSelection: function(data) {
                return data.nama;
            }
        });

        function getNoBed(id_kamar) {
            $.ajax({
                type: 'GET',
                url: '<?= base_url("bed/api/bed/get_no_bed") ?>/' + id_kamar,
                cache: false,
                dataType: 'JSON',
                success: function(data) {
                    if (data !== null) {
                        $('#no-bed').val(data.no_bed);
                    } else {
                        $('#no-bed').val('');
                    }

                    syams_validation_remove('#no-bed');
                },
                error: function(e) {
                    accessFailed(e.status);
                }
            });
        }

    })

    function timerzmysql(waktu) {
        var tm = waktu.split(':');
        return tm[0] + ':' + tm[1];
    }

    function resetFormMPP() {
        $('#mpp_id, #mpp_id_layanan_pendaftaran, #mpp_id_pendaftaran, #mpp_id_pasien, #mpp_id_bed, #mpp_id_users, #mpp_nama_pasien, #mpp_no_rm, #mpp_tanggal_lahir, #mpp_jenis_kelamin, #alamat, #mpp_bed, #mpp_tanggal_1, #mpp_tanggal_2, #mpp_tanggal_3, #mpp_petugas_1, #mpp_petugas_2, #mpp_petugas_3, #mpp_dokter').val('');

        $('#mpp_usia_1_ya, #mpp_usia_1_tidak, #mpp_usia_2_ya, #mpp_usia_2_tidak, #mpp_usia_3_ya, #mpp_usia_3_tidak, #mpp_resiko_1_ya, #mpp_resiko_1_tidak, #mpp_resiko_2_ya, #mpp_resiko_2_tidak, #mpp_resiko_3_ya, #mpp_resiko_3_tidak, #mpp_komplain_1_ya, #mpp_komplain_1_tidak, #mpp_komplain_2_ya, #mpp_komplain_2_tidak, #mpp_komplain_3_ya, #mpp_komplain_3_tidak, #mpp_kronis_1_ya, #mpp_kronis_1_tidak, #mpp_kronis_2_ya, #mpp_kronis_2_tidak, #mpp_kronis_3_ya, #mpp_kronis_3_tidak, #mpp_adl_1_ya, #mpp_adl_1_tidak, #mpp_adl_2_ya, #mpp_adl_2_tidak, #mpp_adl_3_ya, #mpp_adl_3_tidak, #mpp_peralatan_1_ya, #mpp_peralatan_1_tidak, #mpp_peralatan_2_ya, #mpp_peralatan_2_tidak, #mpp_peralatan_3_ya, #mpp_peralatan_3_tidak, #mpp_mental_1_ya, #mpp_mental_1_tidak, #mpp_mental_2_ya, #mpp_mental_2_tidak, #mpp_mental_3_ya, #mpp_mental_3_tidak, #mpp_igd_1_ya, #mpp_igd_1_tidak, #mpp_igd_2_ya, #mpp_igd_2_tidak, #mpp_igd_3_ya, #mpp_igd_3_tidak, #mpp_asuhan_1_ya, #mpp_asuhan_1_tidak, #mpp_asuhan_2_ya, #mpp_asuhan_2_tidak, #mpp_asuhan_3_ya, #mpp_asuhan_3_tidak, #mpp_pembiayaan_1_ya, #mpp_pembiayaan_1_tidak, #mpp_pembiayaan_2_ya, #mpp_pembiayaan_2_tidak, #mpp_pembiayaan_3_ya, #mpp_pembiayaan_3_tidak, #mpp_kasus_1_ya, #mpp_kasus_1_tidak, #mpp_kasus_2_ya, #mpp_kasus_2_tidak, #mpp_kasus_3_ya, #mpp_kasus_3_tidak, #mpp_pemulangan_1_ya, #mpp_pemulangan_1_tidak, #mpp_pemulangan_2_ya, #mpp_pemulangan_2_tidak, #mpp_pemulangan_3_ya, #mpp_pemulangan_3_tidak').prop('checked', false);

        $('#s2id_mpp_petugas_1 a .select2c-chosen, #s2id_mpp_petugas_2 a .select2c-chosen, #s2id_mpp_petugas_3 a .select2c-chosen, #s2id_mpp_dokter a .select2c-chosen').html('');
    }

    function tambahFORM_PMD_42_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';

        resetFormMPP();
        tambahFormMPP(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function lihatFORM_PMD_42_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';

        // entriMPP(layanan.id_pendaftaran, layanan.id, bed, action);
        resetFormMPP();
        entriMPP(layanan.id_pendaftaran, layanan.id, bed, action);
        
        setTimeout(function() {
            $('#hapus-transfer').hide();
        }, 1500);
        setTimeout(function() {
            $('#edit-transfer').hide();
        }, 1500);


    }

    function editFORM_PMD_42_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';

        resetFormMPP();
        entriMPP(layanan.id_pendaftaran, layanan.id, bed, action);
        setTimeout(function() {
            $('#detail-transfer').hide();
        }, 1500);
    }

    function tambahFormMPP(id_pendaftaran, id_layanan_pendaftaran, bed, action) {
        // $('#wizard-transfer-group').bwizard('show', '0');
        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        var profesi = '<?= $this->session->userdata('profesinadis') ?>';
        if (groupAccount == 'Admin') {
            profesi = 'Perawat';
        }
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_data_entri_keperawatan") ?>/id/' + id_pendaftaran +
                '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {
                // data pasien
                $('#mpp_id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#mpp_id_pendaftaran').val(id_pendaftaran);
                $('#mpp_id_bed, #mpp_bed').val(bed).text(bed);
                if (data.pasien !== null) {
                    $('#id_pasien, #mpp_no_rm').val(data.pasien.id_pasien).text(data.pasien.id_pasien);
                    $('#mpp_nama_pasien').text(data.pasien.nama);
                    $('#mpp_tanggal_lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data
                        .pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) +
                        ')'));
                    $('#mpp_jenis_kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' :
                        'Perempuan'));

                    if (data.pasien.alergi !== null) {
                        $('#mpp_riwayat_alergi').val(data.pasien.alergi).attr('readonly', true)
                    };
                    $('#mpp_alamat').text(data.pasien.alamat);
                }

                $('.mpp_logo_alergi').hide();
                if (data.profil !== null) {
                    // status profil pasien
                    if (data.profil.is_alergi == 'Ya') {
                        $('.logo-alergi').show();
                    }
                }
                
                $('#modal_mpp').modal('show');
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                accessFailed(e.status);
            },
        });
    }

    function entriMPP(id_pendaftaran, id_layanan_pendaftaran, bed, action) {
        $('#btn-simpan').hide();

        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        var profesi = '<?= $this->session->userdata('profesinadis') ?>';
        if (groupAccount == 'Admin') {
            profesi = 'Perawat';
        }

        if (action !== 'lihat' ) {
            $('#btn-simpan').show();
        } else {
            $('#btn-simpan').hide();
        }

        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_data_entri_keperawatan") ?>/id/' + id_pendaftaran +
                '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {

                $('#mpp_id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#mpp_id_pendaftaran').val(id_pendaftaran);
                $('#mpp_id_bed, #mpp_bed').val(bed).text(bed);

                if (data.pasien !== null) {
                    $('#id_pasien, #mpp_no_rm').val(data.pasien.id_pasien).text(data.pasien.id_pasien);
                    $('#mpp_nama_pasien').text(data.pasien.nama);
                    $('#mpp_tanggal_lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#mpp_jenis_kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));

                    if (data.pasien.alergi !== null) {
                        $('#mpp_riwayat_alergi').val(data.pasien.alergi).attr('readonly', true)
                    };
                    $('#mpp_alamat').text(data.pasien.alamat);
                }

                $('.mpp_logo_alergi').hide();
                if (data.profil !== null) {
                    // status profil pasien
                    if (data.profil.is_alergi == 'Ya') {
                        $('.logo-alergi').show();
                    }
                }

                // SKRINING KEBUTUHAN MANAJER PELAYANAN PASIEN (MPP)
                let mpp = data.mpp;
                if (mpp != null) {
                    $('#mpp_id').val(mpp.id);
                    let dateFields = ['#mpp_tanggal_1', '#mpp_tanggal_2', '#mpp_tanggal_3'];

                    dateFields.forEach((field, index) => {
                        let mppDate = mpp[`mpp_tanggal_${index + 1}`];
                        let fieldValue = mppDate !== null ? datetimefmysql(mppDate) : null;
                        $(field).val(fieldValue);
                    });

                    // $('#mpp_tanggal_1').val(datetimefmysql(mpp.mpp_tanggal_1));
                    // $('#mpp_tanggal_2').val(datetimefmysql(mpp.mpp_tanggal_2));
                    // $('#mpp_tanggal_3').val(datetimefmysql(mpp.mpp_tanggal_3));

                    let usiaCheckboxes = ['1', '2', '3'];
                    usiaCheckboxes.forEach((checkbox) => {
                        if (mpp[`mpp_usia_${checkbox}`] === '1') {
                            $(`#mpp_usia_${checkbox}_ya`).prop('checked', true).change();
                        }
                        if (mpp[`mpp_usia_${checkbox}`] === '2') {
                            $(`#mpp_usia_${checkbox}_tidak`).prop('checked', true).change();
                        }
                    });

                    let resikoCheckboxes = ['1', '2', '3'];
                    resikoCheckboxes.forEach((checkbox) => {
                        if (mpp[`mpp_resiko_${checkbox}`] === '1') {
                            $(`#mpp_resiko_${checkbox}_ya`).prop('checked', true).change();
                        }
                        if (mpp[`mpp_resiko_${checkbox}`] === '2') {
                            $(`#mpp_resiko_${checkbox}_tidak`).prop('checked', true).change();
                        }
                    });

                    let komplainCheckboxes = ['1', '2', '3'];
                    komplainCheckboxes.forEach((checkbox) => {
                        if (mpp[`mpp_komplain_${checkbox}`] === '1') {
                            $(`#mpp_komplain_${checkbox}_ya`).prop('checked', true).change();
                        }
                        if (mpp[`mpp_komplain_${checkbox}`] === '2') {
                            $(`#mpp_komplain_${checkbox}_tidak`).prop('checked', true).change();
                        }
                    });

                    let kronisCheckboxes = ['1', '2', '3'];
                    kronisCheckboxes.forEach((checkbox) => {
                        if (mpp[`mpp_kronis_${checkbox}`] === '1') {
                            $(`#mpp_kronis_${checkbox}_ya`).prop('checked', true).change();
                        }
                        if (mpp[`mpp_kronis_${checkbox}`] === '2') {
                            $(`#mpp_kronis_${checkbox}_tidak`).prop('checked', true).change();
                        }
                    });

                    let adlCheckboxes = ['1', '2', '3'];
                    adlCheckboxes.forEach((checkbox) => {
                        if (mpp[`mpp_adl_${checkbox}`] === '1') {
                            $(`#mpp_adl_${checkbox}_ya`).prop('checked', true).change();
                        }
                        if (mpp[`mpp_adl_${checkbox}`] === '2') {
                            $(`#mpp_adl_${checkbox}_tidak`).prop('checked', true).change();
                        }
                    });

                    let peralatanCheckboxes = ['1', '2', '3'];
                    peralatanCheckboxes.forEach((checkbox) => {
                        if (mpp[`mpp_peralatan_${checkbox}`] === '1') {
                            $(`#mpp_peralatan_${checkbox}_ya`).prop('checked', true).change();
                        }
                        if (mpp[`mpp_peralatan_${checkbox}`] === '2') {
                            $(`#mpp_peralatan_${checkbox}_tidak`).prop('checked', true).change();
                        }
                    });

                    let mentalCheckboxes = ['1', '2', '3'];
                    mentalCheckboxes.forEach((checkbox) => {
                        if (mpp[`mpp_mental_${checkbox}`] === '1') {
                            $(`#mpp_mental_${checkbox}_ya`).prop('checked', true).change();
                        }
                        if (mpp[`mpp_mental_${checkbox}`] === '2') {
                            $(`#mpp_mental_${checkbox}_tidak`).prop('checked', true).change();
                        }
                    });

                    let igdCheckboxes = ['1', '2', '3'];
                    igdCheckboxes.forEach((checkbox) => {
                        if (mpp[`mpp_igd_${checkbox}`] === '1') {
                            $(`#mpp_igd_${checkbox}_ya`).prop('checked', true).change();
                        }
                        if (mpp[`mpp_igd_${checkbox}`] === '2') {
                            $(`#mpp_igd_${checkbox}_tidak`).prop('checked', true).change();
                        }
                    });

                    let asuhanCheckboxes = ['1', '2', '3'];
                    asuhanCheckboxes.forEach((checkbox) => {
                        if (mpp[`mpp_asuhan_${checkbox}`] === '1') {
                            $(`#mpp_asuhan_${checkbox}_ya`).prop('checked', true).change();
                        }
                        if (mpp[`mpp_asuhan_${checkbox}`] === '2') {
                            $(`#mpp_asuhan_${checkbox}_tidak`).prop('checked', true).change();
                        }
                    });

                    let pembiayaanCheckboxes = ['1', '2', '3'];
                    pembiayaanCheckboxes.forEach((checkbox) => {
                        if (mpp[`mpp_pembiayaan_${checkbox}`] === '1') {
                            $(`#mpp_pembiayaan_${checkbox}_ya`).prop('checked', true).change();
                        }
                        if (mpp[`mpp_pembiayaan_${checkbox}`] === '2') {
                            $(`#mpp_pembiayaan_${checkbox}_tidak`).prop('checked', true).change();
                        }
                    });

                    let kasusCheckboxes = ['1', '2', '3'];
                    kasusCheckboxes.forEach((checkbox) => {
                        if (mpp[`mpp_kasus_${checkbox}`] === '1') {
                            $(`#mpp_kasus_${checkbox}_ya`).prop('checked', true).change();
                        }
                        if (mpp[`mpp_kasus_${checkbox}`] === '2') {
                            $(`#mpp_kasus_${checkbox}_tidak`).prop('checked', true).change();
                        }
                    });

                    let pemulanganCheckboxes = ['1', '2', '3'];
                    pemulanganCheckboxes.forEach((checkbox) => {
                        if (mpp[`mpp_pemulangan_${checkbox}`] === '1') {
                            $(`#mpp_pemulangan_${checkbox}_ya`).prop('checked', true).change();
                        }
                        if (mpp[`mpp_pemulangan_${checkbox}`] === '2') {
                            $(`#mpp_pemulangan_${checkbox}_tidak`).prop('checked', true).change();
                        }
                    });

                    let parafCheckboxes = ['1', '2', '3', 'dokter'];
                    parafCheckboxes.forEach((checkbox) => {
                        if (mpp[`mpp_paraf_${checkbox}`] === '1') {
                            $(`#mpp_paraf_${checkbox}`).prop('checked', true).change();
                        }
                    });

                    $('#mpp_petugas_1').val(mpp.mpp_petugas_1);
                    $('#s2id_mpp_petugas_1 a .select2c-chosen').html(mpp.nama_petugas_1);

                    $('#mpp_petugas_2').val(mpp.mpp_petugas_2);
                    $('#s2id_mpp_petugas_2 a .select2c-chosen').html(mpp.nama_petugas_2);

                    $('#mpp_petugas_3').val(mpp.mpp_petugas_3);
                    $('#s2id_mpp_petugas_3 a .select2c-chosen').html(mpp.nama_petugas_3);

                    $('#mpp_dokter').val(mpp.mpp_dokter);
                    $('#s2id_mpp_dokter a .select2c-chosen').html(mpp.nama_dokter);

                }

                $('#modal_mpp').modal('show');
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                accessFailed(e.status);
            },
        });
    }

    function konfirmasiSimpanEntriMPP() {

        swal.fire({
            title: 'Simpan Entri Keperawatan',
            text: "Apakah anda yakin akan menyimpan Form SKRINING KEBUTUHAN MANAJER PELAYANAN PASIEN (MPP) Ini?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
            cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                simpanEntriMPP();
            }
        })

    }

    function simpanEntriMPP() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url("form_rekam_medis/api/entri_keperawatan/simpan_mpp") ?>',
            data: $('#form_entri_keperawatan').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.respon !== null) {
                    if (data.respon.show !== null) {
                        $('#wizard_form_resume').bwizard('show', data.respon.show);
                        if (data.respon.add_show !== undefined) {
                            $('#wizard-resume-group').bwizard('show', data.respon.add_show);
                            if (data.respon.id !== undefined) {
                                $(data.respon.id).addClass('show');
                            }
                        } else {
                            if (data.respon.id !== undefined) {
                                $(data.respon.id).addClass('show');
                            }
                        }

                        if (data.respon.status === false) {
                            bootbox.dialog({
                                message: data.respon.message,
                                title: "Penyimpanan Data Gagal",
                                buttons: {
                                    batal: {
                                        label: '<i class=" fas fa-times-circle"></i> Close',
                                        className: "btn-danger",
                                        callback: function() {
                                        }
                                    }
                                }
                            });
                        }
                    }
                } else {
                    $('input[name=csrf_syam]').val(data.token);
                    if (data.status) {
                        messageAddSuccess();
                        $('#modal_mpp').modal('hide');
                        showListForm($('#mpp_id_pendaftaran').val(), $('#mpp_id_layanan_pendaftaran').val(), $('#mpp_id_pasien').val());
                    } else {
                        messageAddFailed();
                    }
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageAddFailed();
            }
        });
    }

    function cekDateTime(id, form) {
        // ekspresi reguler untuk mencocokkan format tanggal yang dibutuhkan

        re = /^(\d{1,2})[-\/](\d{1,2})[-\/](\d{4})$/;
        if (form != '') {

            if (regs = form.match(re)) {
                // nilai hari antara 1 s.d 31
                if (regs[1] < 1 || regs[1] > 31) {
                    alert("Nilai tidak valid untuk hari: " + regs[1]);
                    syams_validation(id, 'Format Tanggal tidak sesuai');
                    return false;
                }
                // nilai bulan antara 1 s.d 12
                if (regs[2] < 1 || regs[2] > 12) {
                    alert("Nilai tidak valid untuk bulan: " + regs[2]);
                    syams_validation(id, 'Format Tanggal tidak sesuai');
                    return false;
                }
                // nilai tahun antara 2000 s.d sekarang
                if (regs[3] < ((new Date()).getFullYear()) - 1 || regs[3] > ((new Date()).getFullYear()) + 1) {
                    alert("Nilai tidak valid untuk tahun: " + regs[3] + " - harus antara " + (((new Date()).getFullYear()) -
                        1) + " dan " + (((new Date()).getFullYear()) + 1));
                    syams_validation(id, 'Format Tanggal tidak sesuai');
                    return false;
                }

            } else {

                syams_validation(id, 'Format Tanggal tidak sesuai');
                return false;

            }
        }

    }


</script>