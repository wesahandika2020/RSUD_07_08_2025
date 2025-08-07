<script>
    var nomer = 1;
    $(function() {

        nomer++;

        $("#wizard_form_resume").bwizard();
        $("#wizard-resume-group").bwizard();
        $("#wizard-transfer-group").bwizard();

        // transfer pasien
        let currentDate = new Date();
        $('#tpi_tanggal_masuk, #tpi_tanggal_pindah').datetimepicker({
            format: 'DD/MM/YYYY HH:mm',
            pickSecond: false,
            pick12HourFormat: false,
            maxDate: new Date(currentDate.getFullYear(), currentDate.getMonth() + 2, 0),
            beforeShow: function(i) {
                if ($(i).attr('readonly')) {
                    return false;
                }
            }
        });

        $('#tpi_dpjp').select2c({
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

        $('#tf_btn_expand_all').click(function() {
            $('.multi-collapse').addClass('show');
        });

        $('#tf_btn_collapse_all').click(function() {
            $('.multi-collapse').removeClass('show');
        });

        // transfer pasien
        // PEMERIKSAAN FISIK DAN TANDA-TANDA VITAL
        $('#tpi_pf_tanggal_infus, #tpi_pf_tanggal_ngt, #tpi_pf_tanggal_ett, #tpi_pf_tanggal_cdl, #tpi_pf_tanggal_cvc, #tpi_pf_tanggal_dc, #tpi_pf_tanggal_lain').datetimepicker({
            format: 'DD/MM/YYYY',
            maxDate: new Date(),
            beforeShow: function(i) {
                if ($(i).attr('readonly')) {
                    return false;
                }
            }
        });

        // GCS
        $('.tpi_pf_gcs').on('keyup', function() {
            let sum = 0
            $('.tpi_pf_gcs').each(function() {
                sum += Number($(this).val());
            });
            $('#tpi_pf_gcs_total').val(sum);
        })

        $('#tpi_pf_infus').click(function() {
            if ($(this).is(':checked')) {
                $('#tpi_pf_tanggal_infus').prop('disabled', false)
            } else {
                $('#tpi_pf_tanggal_infus').val('').prop('disabled', true)
            }
        });

        $('#tpi_pf_ngt_pasien').click(function() {
            if ($(this).is(':checked')) {
                $('#tpi_pf_tanggal_ngt').prop('disabled', false)
            } else {
                $('#tpi_pf_tanggal_ngt').val('').prop('disabled', true)
            }
        });

        $('#tpi_pf_ett').click(function() {
            if ($(this).is(':checked')) {
                $('#tpi_pf_tanggal_ett').prop('disabled', false)
            } else {
                $('#tpi_pf_tanggal_ett').val('').prop('disabled', true)
            }
        });

        $('#tpi_pf_cvc').click(function() {
            if ($(this).is(':checked')) {
                $('#tpi_pf_tanggal_cvc').prop('disabled', false)
            } else {
                $('#tpi_pf_tanggal_cvc').val('').prop('disabled', true)
            }
        });
        
        $('#tpi_pf_dc').click(function() {
            if ($(this).is(':checked')) {
                $('#tpi_pf_tanggal_dc').prop('disabled', false)
            } else {
                $('#tpi_pf_tanggal_dc').val('').prop('disabled', true)
            }
        });
        
        $('#tpi_pf_lain').click(function() {
            if ($(this).is(':checked')) {
                $('#tpi_pf_tanggal_lain').prop('disabled', false)
            } else {
                $('#tpi_pf_tanggal_lain').val('').prop('disabled', true)
            }
        });

        $('#tpi_pf_cdl').click(function() {
            if ($(this).is(':checked')) {
                $('#tpi_pf_tanggal_cdl').prop('disabled', false)
            } else {
                $('#tpi_pf_tanggal_cdl').val('').prop('disabled', true)
            }
        });

        $('#tpi_pf_oksigen').click(function() {
            if ($(this).is(':checked')) {
                $('#tpi_pf_keterangan_oksigen').prop('disabled', false)
            } else {
                $('#tpi_pf_keterangan_oksigen').val('').prop('disabled', true)
            }
        });

        $('input[type=radio][name=tpi_kewaspadaan]').change(function() {
            if (this.value == '5') {
                $('#tpi_riwayat_kewaspadan').prop('disabled', false);
            } else {
                $('#tpi_riwayat_kewaspadan').val('');
                $('#tpi_riwayat_kewaspadan').prop('disabled', true);
            }
        });

        $('input[type=radio][name=tpi_pf_alergi]').change(function() {
            if (this.value == '1') {
                $('#tpi_pf_riwayat_alergi').prop('disabled', false);
            } else {
                $('#tpi_pf_riwayat_alergi').val('');
                $('#tpi_pf_riwayat_alergi').prop('disabled', true);
            }
        });

        $('input[type=radio][name=tpi_pf_skala_nyeri_pasien]').change(function() {
            if (this.value == '1') {
                $('#tpi_pf_riwayat_nyeri_pasien').prop('disabled', false);
            } else {
                $('#tpi_pf_riwayat_nyeri_pasien').val('');
                $('#tpi_pf_riwayat_nyeri_pasien').prop('disabled', true);
            }
        });

        $('input[type=radio][name=tpi_pf_resiko_jatuh_pasien]').change(function() {
            if (this.value == '1') {
                $('#tpi_pf_riwayat_resiko_jatuh_pasien').prop('disabled', false);
            } else {
                $('#tpi_pf_riwayat_resiko_jatuh_pasien').val('');
                $('#tpi_pf_riwayat_resiko_jatuh_pasien').prop('disabled', true);
            }
        });

        $('input[type=radio][name=tpi_pf_resiko_dekubitus_pasien]').change(function() {
            if (this.value == '1') {
                $('#tpi_pf_riwayat_resiko_dekubitus_pasien').prop('disabled', false);
            } else {
                $('#tpi_pf_riwayat_resiko_dekubitus_pasien').val('');
                $('#tpi_pf_riwayat_resiko_dekubitus_pasien').prop('disabled', true);
            }
        });

        // transfer pasien
        // Pemeriksaan Penunjang
        $('#tpi_pp_labolatorium').click(function() {
            if ($(this).is(':checked')) {
                $('#tpi_pp_ket_labolatorium').prop('disabled', false)
            } else {
                $('#tpi_pp_ket_labolatorium').val('').prop('disabled', true)
            }
        });
        
        $('#tpi_pp_radiologi').click(function() {
            if ($(this).is(':checked')) {
                $('#tpi_pp_ket_radiologi').prop('disabled', false)
            } else {
                $('#tpi_pp_ket_radiologi').val('').prop('disabled', true)
            }
        });
        
        $('#tpi_pp_lainnya').click(function() {
            if ($(this).is(':checked')) {
                $('#tpi_pp_ket_lainnya').prop('disabled', false)
            } else {
                $('#tpi_pp_ket_lainnya').val('').prop('disabled', true)
            }
        });

        // transfer pasien
        // Kondisi Pasien
        $('#tpi_kp_waktu_ttd_petugas_tf, #tpi_kp_waktu_ttd_petugas_penerima').datetimepicker({
            format: 'DD/MM/YYYY HH:mm',
            pickSecond: false,
            pick12HourFormat: false,
            maxDate: new Date(currentDate.getFullYear(), currentDate.getMonth() + 2, 0),
            beforeShow: function(i) {
                if ($(i).attr('readonly')) {
                    return false;
                }
            }
        });

        $('#tpi_kp_petugas_tansfer, #tpi_kp_petugas_terima_transfer').select2c({
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

        $('.tpi_kp_gcs').on('keyup', function() {
            let sum = 0
            $('.tpi_kp_gcs').each(function() {
                sum += Number($(this).val());
            });
            $('#tpi_kp_sebelum_gcs_total').val(sum);
        })
        
        $('.tpi_kp_sudah_gcs').on('keyup', function() {
            let sum = 0
            $('.tpi_kp_sudah_gcs').each(function() {
                sum += Number($(this).val());
            });
            $('#tpi_kp_sudah_gcs_total').val(sum);
        })

        $('input[type=radio][name=tpi_kp_sudah_nama_obat]').change(function() {
            if (this.value == 1) {
                $('#tpi_kp_sudah_ket_nama_obat').prop('disabled', false);
            } else {
                $('#tpi_kp_sudah_ket_nama_obat').val('');
                $('#tpi_kp_sudah_ket_nama_obat').prop('disabled', true);
            }
        });

        $('input[type=radio][name=tpi_kp_sudah_pemeriksaan_penunjang]').change(function() {
            if (this.value == 1) {
                $('#tpi_kp_sudah_ket_pemeriksaan_penunjang').prop('disabled', false);
            } else {
                $('#tpi_kp_sudah_ket_pemeriksaan_penunjang').val('');
                $('#tpi_kp_sudah_ket_pemeriksaan_penunjang').prop('disabled', true);
            }
        });


        // transfer pasien
        // Kondisi Pasien Setelah Tindakan
        $('#tpi_st_waktu_ttd_petugas_tf, #tpi_st_waktu_ttd_petugas_penerima').datetimepicker({
            format: 'DD/MM/YYYY HH:mm',
            pickSecond: false,
            pick12HourFormat: false,
            maxDate: new Date(currentDate.getFullYear(), currentDate.getMonth() + 2, 0),
            beforeShow: function(i) {
                if ($(i).attr('readonly')) {
                    return false;
                }
            }
        });

        $('#tpi_st_petugas_tansfer, #tpi_st_petugas_terima_transfer').select2c({
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

        $('.tpi_st_gcs').on('keyup', function() {
            let sum = 0
            $('.tpi_st_gcs').each(function() {
                sum += Number($(this).val());
            });
            $('#tpi_st_sebelum_gcs_total').val(sum);
        })
        
        $('.tpi_st_sudah_gcs').on('keyup', function() {
            let sum = 0
            $('.tpi_st_sudah_gcs').each(function() {
                sum += Number($(this).val());
            });
            $('#tpi_st_sudah_gcs_total').val(sum);
        })

        $('input[type=radio][name=tpi_st_sudah_nama_obat]').change(function() {
            if (this.value == 1) {
                $('#tpi_st_sudah_ket_nama_obat').prop('disabled', false);
            } else {
                $('#tpi_st_sudah_ket_nama_obat').val('');
                $('#tpi_st_sudah_ket_nama_obat').prop('disabled', true);
            }
        });

        $('input[type=radio][name=tpi_st_sudah_pemeriksaan_penunjang]').change(function() {
            if (this.value == 1) {
                $('#tpi_st_sudah_ket_pemeriksaan_penunjang').prop('disabled', false);
            } else {
                $('#tpi_st_sudah_ket_pemeriksaan_penunjang').val('');
                $('#tpi_st_sudah_ket_pemeriksaan_penunjang').prop('disabled', true);
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

    function lihatFORM_KEP_12_03(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';

        // entriKeperawatan(layanan.id_pendaftaran, layanan.id, bed, action);
        resetFormTransfer();
        entriKeperawatan(layanan.id_pendaftaran, layanan.id, bed, action);
        
        setTimeout(function() {
            $('#hapus-transfer').hide();
        }, 1500);
        setTimeout(function() {
            $('#edit-transfer').hide();
        }, 1500);


    }

    function editFORM_KEP_12_03(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';

        resetFormTransfer();
        entriKeperawatan(layanan.id_pendaftaran, layanan.id, bed, action);
        setTimeout(function() {
            $('#detail-transfer').hide();
        }, 1500);
    }

    function tambahFORM_KEP_12_03(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';

        resetFormTransfer();
        tambahFormTransfer(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function entriKeperawatan(id_pendaftaran, id_layanan_pendaftaran, bed, action) {
        $('#wizard_form_resume').bwizard('show', '0');

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

                $('#tpi-waktu-search').change(function() {
                    getListTransferPasien($('#ek-id-pendaftaran').val(), bed, 1);
                });

                resetFormTransfer();
                getListTransferPasien(id_pendaftaran, bed, 1);

                $('#ek_id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#ek-id-pendaftaran').val(id_pendaftaran);
                $('#ek-id-bed').val(bed);



                if (data.pasien !== null) {
                    $('#ek_id_pasien').val(data.pasien.id_pasien);
                    $('#ek_pasien_nama').text(data.pasien.nama);
                    $('#ek_pasien_no_rm').text(data.pasien.no_rm);
                    $('#ek_pasien_tanggal_lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data
                        .pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) +
                        ')'));
                    $('#ek_pasien_jenis_kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' :
                        'Perempuan'));

                    if (data.pasien.alergi !== null) {
                        $('#ek_riwayat_alergi').val(data.pasien.alergi).attr('readonly', true)
                    };
                    $('#ek_pasien_alamat').text(data.pasien.alamat);
                }

                //TRANSFER PASIEN INTRA RUMAH SAKIT
                let transfer_pasien_intra_rumah_sakit = data.transfer_pasien_intra_rumah_sakit;
                if (transfer_pasien_intra_rumah_sakit != null) {
                    $('#tanggal_masuk_pasien_tf').val(transfer_pasien_intra_rumah_sakit.tanggal_waktu_masuk);
                    $('#tanggal_pindah_pasien_tf').val(transfer_pasien_intra_rumah_sakit.tanggal_waktu_pindah);
                    $('#ruangan_asal_pasien').val(transfer_pasien_intra_rumah_sakit.ruang_asal);
                    $('#tpi_tujuan_ruang_rawat').val(transfer_pasien_intra_rumah_sakit.tujuan_ruang_selanjutnya);
                    $('#tpi_diagnosis_utama').val(transfer_pasien_intra_rumah_sakit.diagnosis_utama);
                    $('#tpi_diagnosis_sekunder').val(transfer_pasien_intra_rumah_sakit.diagnosis_sekunder);
                    $('#tpi_dpjp').val(transfer_pasien_intra_rumah_sakit.id_dpjp);
                    $('#tpi_indikasi_masuk_rs').val(transfer_pasien_intra_rumah_sakit.indikasi_masuk);
                    $('#tpi_riwayat_kesehatan').val(transfer_pasien_intra_rumah_sakit.riwayat_kesehatan);
                    $('#tpi_tensi_sis').val(transfer_pasien_intra_rumah_sakit.kewaspadaan);
                    $('#tensi_dis').val(transfer_pasien_intra_rumah_sakit.kewaspadaan_lain);
                    $('#kesadaran').val(transfer_pasien_intra_rumah_sakit.kesadaran);

                    $('#tpi_suhu').val(transfer_pasien_intra_rumah_sakit.gcs);
                    $('#tpi_nadi').val(transfer_pasien_intra_rumah_sakit.gcs);
                    $('#tpi_nadi').val(transfer_pasien_intra_rumah_sakit.gcs);
                    $('#tpi_tinggi_badan').val(transfer_pasien_intra_rumah_sakit.gcs);
                    $('#tpi_berat_badan').val(transfer_pasien_intra_rumah_sakit.gcs);
                    $('#keadaan-umum-tpi-pasien').val(transfer_pasien_intra_rumah_sakit.gcs);
                    $('#tpi-infus').val(transfer_pasien_intra_rumah_sakit.pemberian_therapi_infus);
                    $('#tpi-obat').val(transfer_pasien_intra_rumah_sakit.pemberian_terapi_obat);
                    $('#tindakan_medis_pasien_tpi').val(transfer_pasien_intra_rumah_sakit.catatan_tindak_medis);
                    $('#keadaan-umum-tpi').val(transfer_pasien_intra_rumah_sakit.keadaan_umum_pasien_sebelum);
                    $('#kesadaran_kondisi_pasien_sebelum').val(transfer_pasien_intra_rumah_sakit
                        .kesadaran_kondisi_pasien_sebelum);
                    $('#tpi-catatan').val(transfer_pasien_intra_rumah_sakit.catatan_sebelum);
                    $('#tpi-masalah-transfer-pasien').val(transfer_pasien_intra_rumah_sakit
                        .masalah_transfer_sebelum);
                    $('#tpi-penanganan-masalah').val(transfer_pasien_intra_rumah_sakit
                        .penanganan_masalah_sebelum);
                    $('#tpi-keadaan-umum-setelah-tf').val(transfer_pasien_intra_rumah_sakit
                        .kedaan_umum_sesudah);
                    $('#kesadaran_pasien_sudah_transfer').val(transfer_pasien_intra_rumah_sakit
                        .kesadaran_pasien_sudah_transfer);

                    //Kewaspadaan
                    if (transfer_pasien_intra_rumah_sakit.kewaspadaan === 'Precaution standar') {
                        $('#tpi_precaution_standar').prop('checked', true).change()
                    }
                    if (transfer_pasien_intra_rumah_sakit.kewaspadaan === 'Contac') {
                        $('#tpi_contact').prop('checked', true).change()
                    }
                    if (transfer_pasien_intra_rumah_sakit.kewaspadaan === 'Airbone') {
                        $('#tpi_airbone').prop('checked', true).change()
                    }
                    if (transfer_pasien_intra_rumah_sakit.kewaspadaan === 'Droplet') {
                        $('#tpi_droplet').prop('checked', true).change()
                    }

                    if (assesmen_anestesi_sedasi.tas_perawatan_anestesi === 'Lainnya') {

                        $('#tpi_kewaspadaan_lain').prop('checked', true).change();
                        $('#tpi_riwayat_kewaspadan').val(transfer_pasien_intra_rumah_sakit.kewaspadaan).attr(
                            'disabled', false);

                    }

                    // Alergi
                    if (transfer_pasien_intra_rumah_sakit.alergi == 'Ya') {
                        $('#alergi-tpi-pasien-ya').prop('checked', true);
                        $('#alergi-tpi-pasien-riwayat').val(transfer_pasien_intra_rumah_sakit
                            .riwayat_alergi_lain);
                        $('#alergi-tpi-pasien-riwayat').attr('disabled', false);
                    } else if (transfer_pasien_intra_rumah_sakit.alergi == 'Tidak') {
                        $('#alergi-tpi-pasien-tidak').prop('checked', true);
                    }

                    //Skala Nyeri
                    if (transfer_pasien_intra_rumah_sakit.skala_nyeri == 'Ya') {
                        $('#skala_nyeri_pasien_tpi_ya').prop('checked', true);
                        $('#riwayat_nyeri_pasien_tpi').val(transfer_pasien_intra_rumah_sakit.skala_nyeri_lain);
                        $('#riwayat_nyeri_pasien_tpi').attr('disabled', false);
                    } else if (transfer_pasien_intra_rumah_sakit.skala_nyeri == 'Tidak') {
                        $('#skala_nyeri_pasien_tpi_tidak').prop('checked', true);
                    }

                    //Resiko Jatuh 
                    if (transfer_pasien_intra_rumah_sakit.resiko_jatuh == 'Ya') {
                        $('#resiko_jatuh_pasien_tpi_ya').prop('checked', true);
                        $('#riwayat_resiko_jatuh_pasien_tpi').val(transfer_pasien_intra_rumah_sakit
                            .ket_resiko_jatuh);
                        $('#riwayat_resiko_jatuh_pasien_tpi').attr('disabled', false);
                    } else if (transfer_pasien_intra_rumah_sakit.resiko_jatuh == 'Tidak') {
                        $('#resiko_jatuh_pasien_tpi_tidak').prop('checked', true);
                    }

                    //Mobilisasi
                    if (transfer_pasien_intra_rumah_sakit.mobilisasi_pasien === 'Jalan') {
                        $('#mobilisasi_pasien_tpi_jalan').prop('checked', true).change()
                    }
                    if (transfer_pasien_intra_rumah_sakit.mobilisasi_pasien === 'Duduk') {
                        $('#mobilisasi_pasien_tpi_duduk').prop('checked', true).change()
                    }
                    if (transfer_pasien_intra_rumah_sakit.mobilisasi_pasien === 'Tirah Barang') {
                        $('#mobilisasi_pasien_tpi_tirah_barang').prop('checked', true).change()
                    }

                    // Mobilisasi Saat Transfer
                    if (transfer_pasien_intra_rumah_sakit.mobilisasi_transfer === 'Mandiri') {
                        $('#mobilisasi_pasien_tpi_mandiri').prop('checked', true).change()
                    }
                    if (transfer_pasien_intra_rumah_sakit.mobilisasi_transfer === 'Dibantu Sebagian') {
                        $('#mobilisasi_pasien_tpi_dibantu_sebagian').prop('checked', true).change()
                    }
                    if (transfer_pasien_intra_rumah_sakit.mobilisasi_transfer === 'Dibantu Penuh') {
                        $('#mobilisasi_pasien_tpi_tirah_diabantu_penuh').prop('checked', true).change()
                    }

                    // Resiko Dekubitus
                    if (transfer_pasien_intra_rumah_sakit.resiko_dekubitus == 'Ya') {
                        $('#resiko_dekubitus_pasien_tpi_ya').prop('checked', true);
                        $('#riwayat_resiko_dekubitus_pasien_tpi').val(transfer_pasien_intra_rumah_sakit
                            .ket_resiko_dekubitus);
                        $('#riwayat_resiko_dekubitus_pasien_tpi').attr('disabled', false);
                    } else if (transfer_pasien_intra_rumah_sakit.resiko_dekubitus == 'Tidak') {
                        $('#resiko_dekubitus_pasien_tpi_tidak').prop('checked', true);
                    }

                    //Pasien Memakai Peralatan Medis
                    if (transfer_pasien_intra_rumah_sakit.peralatan_medis_infus == 'Infus') {
                        $('#infus_pasien_tpi').prop('checked', true);
                        $('#tpi-tanggal-infus').val(transfer_pasien_intra_rumah_sakit.tanggal_pemasangan_infus);
                        $('#tpi-tanggal-infus').attr('disabled', false);
                    }

                    if (transfer_pasien_intra_rumah_sakit.peralatan_medis_ngt == 'NGT') {
                        $('#ngt_pasien_tf').prop('checked', true);
                        $('#tpi-tanggal-ngt').val(transfer_pasien_intra_rumah_sakit.tanggal_ngt);
                        $('#tpi-tanggal-ngt').attr('disabled', false);
                    }

                    if (transfer_pasien_intra_rumah_sakit.peralatan_medis_ett == 'ETT') {
                        $('#ett_pasien_tf').prop('checked', true);
                        $('#tpi-tanggal-ett').val(transfer_pasien_intra_rumah_sakit.tanggal_ett);
                        $('#tpi-tanggal-ett').attr('disabled', false);
                    }

                    if (transfer_pasien_intra_rumah_sakit.peralatan_medis_cvc == 'ETT') {
                        $('#cvc_pasien_tf').prop('checked', true);
                        $('#tpi-tanggal-cvc').val(transfer_pasien_intra_rumah_sakit.tanggal_cvc);
                        $('#tpi-tanggal-cvc').attr('disabled', false);
                    }

                    if (transfer_pasien_intra_rumah_sakit.perlatan_medis_dc == 'ETT') {
                        $('#dc_pasien_tf').prop('checked', true);
                        $('#tpi-tanggal-dc').val(transfer_pasien_intra_rumah_sakit.tanggal_dc);
                        $('#tpi-tanggal-dc').attr('disabled', false);
                    }

                    if (transfer_pasien_intra_rumah_sakit.peralatan_medis_lain == 'ETT') {
                        $('#lainnya_tf').prop('checked', true);
                        $('#tpi-tanggal-lain').val(transfer_pasien_intra_rumah_sakit.tanggal_lain);
                        $('#tpi-tanggal-lain').attr('disabled', false);
                    }

                    if (transfer_pasien_intra_rumah_sakit.peralatan_medis === 'Pump') {
                        $('#tpi_pump').prop('checked', true).change()
                    }
                    if (transfer_pasien_intra_rumah_sakit.peralatan_medis === 'Bidai') {
                        $('#tpi_bidai').prop('checked', true).change()
                    }

                    //Pemeriksaan Penunjang
                    if (transfer_pasien_intra_rumah_sakit.penunjang_labolatorium == 'Labolatorium') {
                        $('#tpi-labolatorium').prop('checked', true);
                        $('#tpi-lab-lain').val(transfer_pasien_intra_rumah_sakit.ket_penunjang_lab);
                        $('#tpi-lab-lain').attr('disabled', false);
                    }

                    if (transfer_pasien_intra_rumah_sakit.penunjang_radiologi == 'Radiologi') {
                        $('#tpi-radiologi').prop('checked', true);
                        $('#tpi-rad-lain').val(transfer_pasien_intra_rumah_sakit.ket_penunjang_rad);
                        $('#tpi-rad-lain').attr('disabled', false);
                    }

                    if (transfer_pasien_intra_rumah_sakit.penunjang_lain == 'Penunjang Lain') {
                        $('#tpi-penunjang-lainnya').prop('checked', true);
                        $('#tpi-riwayat-penunjang-lain').val(transfer_pasien_intra_rumah_sakit
                            .ket_penunjang_lain);
                        $('#tpi-riwayat-penunjang-lain').attr('disabled', false);
                    }

                }

                $('#ek_bed').text(bed);

                $('.ek-logo-pasien-alergi').hide();
                if (data.profil !== null) {
                    // status profil pasien
                    if (data.profil.is_alergi == 'Ya') {
                        $('.ek-logo-pasien-alergi').show();
                    }
                }

                $('#modal_entri_keperawatan_rm').modal('show');
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                accessFailed(e.status);
            },
        });
    }

    function konfirmasiSimpanEntriKeperawatan() {

        swal.fire({
            title: 'Simpan Entri Keperawatan',
            text: "Apakah anda yakin akan menyimpan Form Transfer Pasien Intra Rumah Sakit Ini?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
            cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                simpanEntriKeperawatan();
            }
        })

      
    }

    function simpanEntriKeperawatan() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url("form_rekam_medis/api/entri_keperawatan/simpan_transfer_pasien_intra") ?>',
            data: $('#form_entri_keperawatan').serialize(),
            // data: $('#form_entri_keperawatan').serialize() + '&grafik_mp=' + $('#data-chart-mp').val(),
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
                        $('#modal_entri_keperawatan_rm').modal('hide');
                        showListForm($('#ek-id-pendaftaran').val(), $('#ek_id_layanan_pendaftaran').val(), $('#ek_id_pasien').val());
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

    // transfer pasien intra rumah sakit

    function tambahFormTransfer(id_pendaftaran, id_layanan_pendaftaran, bed, action) {
        $('#wizard-transfer-group').bwizard('show', '0');
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
                $('#ek_id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#ek-id-pendaftaran').val(id_pendaftaran);
                $('#ek-id-bed').val(bed);
                if (data.pasien !== null) {
                    $('#ek_id_pasien').val(data.pasien.id_pasien);
                    $('#ek_pasien_nama').text(data.pasien.nama);
                    $('#ek_pasien_no_rm').text(data.pasien.no_rm);
                    $('#ek_pasien_tanggal_lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data
                        .pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) +
                        ')'));
                    $('#ek_pasien_jenis_kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' :
                        'Perempuan'));

                    if (data.pasien.alergi !== null) {
                        $('#ek_riwayat_alergi').val(data.pasien.alergi).attr('readonly', true)
                    };
                    $('#ek_pasien_alamat').text(data.pasien.alamat);
                }
                $('#ek_bed').text(bed);
                $('.ek-logo-pasien-alergi').hide();
                if (data.profil !== null) {
                    // status profil pasien
                    if (data.profil.is_alergi == 'Ya') {
                        $('.ek-logo-pasien-alergi').show();
                    }
                }
                $('#modal_entri_keperawatan_rm').modal('show');
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                accessFailed(e.status);
            },
        });
    }





    function getListTransferPasien (id_pendaftaran, bed, page) {
        $('#wizard-transfer-group').bwizard('show', '1');
        let accountGroup = "<?= $this->session->userdata('account_group') ?>";

        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_list_transfer_pasien") ?>/page/' + page +
                '/id_pendaftaran/' + id_pendaftaran,
            data: 'keyword=' + $('#tpi-keyword').val() + '&waktu=' + $('#tpi-waktu-search').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((page - 1) & (data.data.length === 0)) {
                    getListTransferPasien('', bed, page - 1);
                    return false;
                }

                $('#tpi-pagination').html(pagination2(data.jumlah, data.limit, data.page, 1));
                $('#tpi-summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

                $('#table-transfer-pasien tbody').empty();

                $.each(data.data, function(i, v) {

                    let no = ((i + 1) + ((data.page - 1) * data.limit));

                    let selPetugas = '';
                    let idEkLayanan = $('#ek_id_layanan_pendaftaran').val();
                    let butHapus = '';
                    if (v.id_layanan_pendaftaran === idEkLayanan) {
                        butHapus =
                            `<button id="hapus-transfer" type="button" class="btn btn-secondary btn-xs" onclick="hapusTransfer(this, ${v.id_transfer})" ><i class="fas fa-fw fa-trash-alt mr-1"></i>Hapus</button>`;
                    } else {
                        butHapus = '';
                    }

                    let html = /* html */ `
                        <tr>
                            <td class="center">${no}</td>
                            <td class="center">${((v.tpi_kp_waktu_ttd_petugas_tf !== null) ? datetime2date(v.tpi_kp_waktu_ttd_petugas_tf) : '')}</td>
                            <td class="center">${((v.tpi_ruang_asal !== null) ? v.tpi_ruang_asal : '')}</td>
                            <td class="center">${((v.nama_petugas_transer !== null) ? v.nama_petugas_transer : '')}</td>
                            <td class="center">${((v.tpi_kp_waktu_ttd_petugas_penerima !== null) ? datetime2date(v.tpi_kp_waktu_ttd_petugas_penerima) : '')}</td>
                            <td class="center">${((v.tpi_ruang_tujuan !== null) ? v.tpi_ruang_tujuan : '')}</td>
                            <td class="center">${((v.nama_petugas_penerima_transfer !== null) ? v.nama_petugas_penerima_transfer : '')}</td>
                            <td class="right aksi">
                                <button id="detail-transfer" type="button" class="btn btn-secondary btn-xxs" onclick="detailTransfer(${v.id_transfer})"><i class="fas fa-eye m-r-5"></i>Lihat Transfer</button>
                                <button id="edit-transfer" type="button" class="btn btn-secondary btn-xxs" onclick="editTransfer(${v.id_transfer})"><i class="fas fa-edit m-r-5"></i>Edit Transfer</button>
                                ${butHapus}
                            </td>
                        </tr>
                    `;
                    // let html = /* html */ ``;

                    $('#table-transfer-pasien tbody').append(html);

                })


            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed('Gagal mendapatkan data!');
            }
        });
    }

    function detailTransfer(id) {
        $('#wizard-transfer-group').bwizard('show', '0');

        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_detail_transfer") ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {
                $('#id_transfer').val(data.data.id_transfer);
                $('#tpi_id_layanan_pendaftaran').val(data.data.id_layanan_pendaftaran);

                if (data !== null) {
                    $('#tpi_tanggal_masuk').val(data.data.tpi_tanggal_masuk !== null ? datetimefmysql(data.data.tpi_tanggal_masuk) : "");
                    $('#tpi_tanggal_pindah').val(data.data.tpi_tanggal_pindah !== null ? datetimefmysql(data.data.tpi_tanggal_pindah) : "");
                    $('#tpi_ruang_asal').val(data.data.tpi_ruang_asal);
                    $('#tpi_ruang_tujuan').val(data.data.tpi_ruang_tujuan);
                    $('#tpi_diagnosis_utama').val(data.data.tpi_diagnosis_utama);
                    $('#tpi_diagnosis_sekunder').val(data.data.tpi_diagnosis_sekunder);
                    $('#tpi_dpjp').val(data.data.tpi_dpjp);
                    $('#s2id_tpi_dpjp a .select2c-chosen').html(data.data.nama_dpjp);
                    $('#tpi_riwayat_kewaspadan').val(data.data.tpi_riwayat_kewaspadan);
                    $('#tpi_indikasi_masuk_rs').val(data.data.tpi_indikasi_masuk_rs);
                    $('#tpi_riwayat_kesehatan').val(data.data.tpi_riwayat_kesehatan);
                    $('#tpi_pf_gcs_e').val(data.data.tpi_pf_gcs_e);
                    $('#tpi_pf_gcs_m').val(data.data.tpi_pf_gcs_m);
                    $('#tpi_pf_gcs_v').val(data.data.tpi_pf_gcs_v);
                    $('#tpi_pf_gcs_total').val(data.data.tpi_pf_gcs_total);
                    $('#tpi_pf_afgar_score').val(data.data.tpi_pf_afgar_score);
                    $('#tpi_pf_djj').val(data.data.tpi_pf_djj);
                    $('#tpi_pf_tensi_sis').val(data.data.tpi_pf_tensi_sis);
                    $('#tpi_pf_tensi_dis').val(data.data.tpi_pf_tensi_dis);
                    $('#tpi_pf_suhu').val(data.data.tpi_pf_suhu);
                    $('#tpi_pf_nadi').val(data.data.tpi_pf_nadi);
                    $('#tpi_pf_nafas').val(data.data.tpi_pf_nafas);
                    $('#tpi_pf_pupil_1').val(data.data.tpi_pf_pupil_1);
                    $('#tpi_pf_pupil_2').val(data.data.tpi_pf_pupil_2);
                    $('#tpi_pf_pupil_3').val(data.data.tpi_pf_pupil_3);
                    $('#tpi_pf_pupil_4').val(data.data.tpi_pf_pupil_4);
                    $('#tpi_pf_tinggi_badan').val(data.data.tpi_pf_tinggi_badan);
                    $('#tpi_pf_berat_badan').val(data.data.tpi_pf_berat_badan);
                    $('#tpi_pf_keadaan_umum').val(data.data.tpi_pf_keadaan_umum);
                    $('#tpi_pf_riwayat_alergi').val(data.data.tpi_pf_riwayat_alergi);
                    $('#tpi_pf_riwayat_nyeri_pasien').val(data.data.tpi_pf_riwayat_nyeri_pasien);
                    $('#tpi_pf_riwayat_resiko_jatuh_pasien').val(data.data.tpi_pf_riwayat_resiko_jatuh_pasien);
                    $('#tpi_pf_riwayat_resiko_dekubitus_pasien').val(data.data.tpi_pf_riwayat_resiko_dekubitus_pasien);
                    $('#tpi_pf_tanggal_infus').val(data.data.tpi_pf_tanggal_infus !== null ? datefmysql(data.data.tpi_pf_tanggal_infus) : "");
                    $('#tpi_pf_tanggal_ngt').val(data.data.tpi_pf_tanggal_ngt !== null ? datefmysql(data.data.tpi_pf_tanggal_ngt) : "");
                    $('#tpi_pf_tanggal_ett').val(data.data.tpi_pf_tanggal_ett !== null ? datefmysql(data.data.tpi_pf_tanggal_ett) : "");
                    $('#tpi_pf_tanggal_cvc').val(data.data.tpi_pf_tanggal_cvc !== null ? datefmysql(data.data.tpi_pf_tanggal_cvc) : "");
                    $('#tpi_pf_tanggal_dc').val(data.data.tpi_pf_tanggal_dc !== null ? datefmysql(data.data.tpi_pf_tanggal_dc) : "");
                    $('#tpi_pf_tanggal_lain').val(data.data.tpi_pf_tanggal_lain !== null ? datefmysql(data.data.tpi_pf_tanggal_lain) : "");
                    $('#tpi_pf_tanggal_cdl').val(data.data.tpi_pf_tanggal_cdl !== null ? datefmysql(data.data.tpi_pf_tanggal_cdl) : "");
                    $('#tpi_pf_keterangan_oksigen').val(data.data.tpi_pf_keterangan_oksigen);
                    $('#tpi_pt_infus').val(data.data.tpi_pt_infus);
                    $('#tpi_pt_obat').val(data.data.tpi_pt_obat);
                    $('#tpi_pp_ket_labolatorium').val(data.data.tpi_pp_ket_labolatorium);
                    $('#tpi_pp_ket_radiologi').val(data.data.tpi_pp_ket_radiologi);
                    $('#tpi_pp_ket_lainnya').val(data.data.tpi_pp_ket_lainnya);
                    $('#tpi_tm_tindakan_medis').val(data.data.tpi_tm_tindakan_medis);
                    $('#tpi_tm_rencana_tindakan').val(data.data.tpi_tm_rencana_tindakan);
                    $('#tpi_kp_sebelum_keadaan_umum').val(data.data.tpi_kp_sebelum_keadaan_umum);
                    $('#tpi_kp_sebelum_gcs_e').val(data.data.tpi_kp_sebelum_gcs_e);
                    $('#tpi_kp_sebelum_gcs_m').val(data.data.tpi_kp_sebelum_gcs_m);
                    $('#tpi_kp_sebelum_gcs_v').val(data.data.tpi_kp_sebelum_gcs_v);
                    $('#tpi_kp_sebelum_gcs_total').val(data.data.tpi_kp_sebelum_gcs_total);
                    $('#tpi_kp_sebelum_catatan').val(data.data.tpi_kp_sebelum_catatan);
                    $('#tpi_kp_perjalanan_masalah_selama_trasnfer').val(data.data.tpi_kp_perjalanan_masalah_selama_trasnfer);
                    $('#tpi_kp_perjalanan_penanganan_masalah').val(data.data.tpi_kp_perjalanan_penanganan_masalah);
                    $('#tpi_kp_sudah_keadaan_umum').val(data.data.tpi_kp_sudah_keadaan_umum);
                    $('#tpi_kp_sudah_gcs_e').val(data.data.tpi_kp_sudah_gcs_e);
                    $('#tpi_kp_sudah_gcs_m').val(data.data.tpi_kp_sudah_gcs_m);
                    $('#tpi_kp_sudah_gcs_v').val(data.data.tpi_kp_sudah_gcs_v);
                    $('#tpi_kp_sudah_gcs_total').val(data.data.tpi_kp_sudah_gcs_total);
                    $('#tpi_kp_sudah_tensi_sis').val(data.data.tpi_kp_sudah_tensi_sis);
                    $('#tpi_kp_sudah_tensi_dis').val(data.data.tpi_kp_sudah_tensi_dis);
                    $('#tpi_kp_sudah_nadi').val(data.data.tpi_kp_sudah_nadi);
                    $('#tpi_kp_sudah_pernafasan').val(data.data.tpi_kp_sudah_pernafasan);
                    $('#tpi_kp_sudah_suhu').val(data.data.tpi_kp_sudah_suhu);
                    $('#tpi_kp_sudah_ket_nama_obat').val(data.data.tpi_kp_sudah_ket_nama_obat);
                    $('#tpi_kp_sudah_ket_pemeriksaan_penunjang').val(data.data.tpi_kp_sudah_ket_pemeriksaan_penunjang);
                    $('#tpi_kp_sudah_catatan_penting').val(data.data.tpi_kp_sudah_catatan_penting);
                    $('#tpi_kp_waktu_ttd_petugas_tf').val(data.data.tpi_kp_waktu_ttd_petugas_tf !== null ? datetimefmysql(data.data.tpi_kp_waktu_ttd_petugas_tf) : "");
                    $('#tpi_kp_waktu_ttd_petugas_penerima').val(data.data.tpi_kp_waktu_ttd_petugas_penerima !== null ? datetimefmysql(data.data.tpi_kp_waktu_ttd_petugas_penerima) : "");
                    $('#tpi_kp_petugas_tansfer').val(data.data.tpi_kp_petugas_tansfer);
                    $('#s2id_tpi_kp_petugas_tansfer a .select2c-chosen').html(data.data.nama_kp_petugas_tansfer);
                    $('#tpi_kp_petugas_terima_transfer').val(data.data.tpi_kp_petugas_terima_transfer);
                    $('#s2id_tpi_kp_petugas_terima_transfer a .select2c-chosen').html(data.data.nama_kp_petugas_terima_transfer);
                    $('#tpi_st_sebelum_keadaan_umum').val(data.data.tpi_st_sebelum_keadaan_umum);
                    $('#tpi_st_sebelum_gcs_e').val(data.data.tpi_st_sebelum_gcs_e);
                    $('#tpi_st_sebelum_gcs_m').val(data.data.tpi_st_sebelum_gcs_m);
                    $('#tpi_st_sebelum_gcs_v').val(data.data.tpi_st_sebelum_gcs_v);
                    $('#tpi_st_sebelum_gcs_total').val(data.data.tpi_st_sebelum_gcs_total);
                    $('#tpi_st_sebelum_tensi_sis').val(data.data.tpi_st_sebelum_tensi_sis);
                    $('#tpi_st_sebelum_tensi_dis').val(data.data.tpi_st_sebelum_tensi_dis);
                    $('#tpi_st_sebelum_nadi').val(data.data.tpi_st_sebelum_nadi);
                    $('#tpi_st_sebelum_pernafasan').val(data.data.tpi_st_sebelum_pernafasan);
                    $('#tpi_st_sebelum_suhu').val(data.data.tpi_st_sebelum_suhu);
                    $('#tpi_st_sebelum_catatan').val(data.data.tpi_st_sebelum_catatan);
                    $('#tpi_st_perjalanan_masalah_selama_transfer').val(data.data.tpi_st_perjalanan_masalah_selama_transfer);
                    $('#tpi_st_perjalanan_penanganan_masalah').val(data.data.tpi_st_perjalanan_penanganan_masalah);
                    $('#tpi_st_sudah_keadaan_umum').val(data.data.tpi_st_sudah_keadaan_umum);
                    $('#tpi_st_sudah_gcs_e').val(data.data.tpi_st_sudah_gcs_e);
                    $('#tpi_st_sudah_gcs_m').val(data.data.tpi_st_sudah_gcs_m);
                    $('#tpi_st_sudah_gcs_v').val(data.data.tpi_st_sudah_gcs_v);
                    $('#tpi_st_sudah_gcs_total').val(data.data.tpi_st_sudah_gcs_total);
                    $('#tpi_st_sudah_tensi_sis').val(data.data.tpi_st_sudah_tensi_sis);
                    $('#tpi_st_sudah_tensi_dis').val(data.data.tpi_st_sudah_tensi_dis);
                    $('#tpi_st_sudah_nadi').val(data.data.tpi_st_sudah_nadi);
                    $('#tpi_st_sudah_pernafasan').val(data.data.tpi_st_sudah_pernafasan);
                    $('#tpi_st_sudah_suhu').val(data.data.tpi_st_sudah_suhu);
                    $('#tpi_st_sudah_ket_nama_obat').val(data.data.tpi_st_sudah_ket_nama_obat);
                    $('#tpi_st_sudah_ket_pemeriksaan_penunjang').val(data.data.tpi_st_sudah_ket_pemeriksaan_penunjang);
                    $('#tpi_st_sudah_catatan_penting').val(data.data.tpi_st_sudah_catatan_penting);
                    $('#tpi_st_waktu_ttd_petugas_tf').val(data.data.tpi_st_waktu_ttd_petugas_tf !== null ? datetimefmysql(data.data.tpi_st_waktu_ttd_petugas_tf) : "");
                    $('#tpi_st_waktu_ttd_petugas_penerima').val(data.data.tpi_st_waktu_ttd_petugas_penerima !== null ? datetimefmysql(data.data.tpi_st_waktu_ttd_petugas_penerima) : "");
                    $('#tpi_st_petugas_tansfer').val(data.data.tpi_st_petugas_tansfer);
                    $('#s2id_tpi_st_petugas_tansfer a .select2c-chosen').html(data.data.nama_st_petugas_tansfer);
                    $('#tpi_st_petugas_terima_transfer').val(data.data.tpi_st_petugas_terima_transfer);
                    $('#s2id_tpi_st_petugas_terima_transfer a .select2c-chosen').html(data.data.nama_st_petugas_terima_transfer);

                    // checkbox
                    const checkboxesToCheck = [
                        'tpi_pf_composmentis',
                        'tpi_pf_apatis',
                        'tpi_pf_samnolen',
                        'tpi_pf_sopor',
                        'tpi_pf_koma',
                        'tpi_pf_infus',
                        'tpi_pf_ngt_pasien',
                        'tpi_pf_ett',
                        'tpi_pf_cvc',
                        'tpi_pf_dc',
                        'tpi_pf_cdl',
                        'tpi_pf_oksigen',
                        'tpi_pf_lain',
                        'tpi_pf_pump',
                        'tpi_pf_bidai',
                        'tpi_pp_labolatorium',
                        'tpi_pp_radiologi',
                        'tpi_pp_lainnya',
                        'tpi_kp_sebelum_composmentis',
                        'tpi_kp_sebelum_apatis',
                        'tpi_kp_sebelum_samnolen',
                        'tpi_kp_sebelum_sopor',
                        'tpi_kp_sebelum_koma',
                        'tpi_kp_sudah_composmentis',
                        'tpi_kp_sudah_apatis',
                        'tpi_kp_sudah_samnolen',
                        'tpi_kp_sudah_sopor',
                        'tpi_kp_sudah_koma',
                        'tpi_kp_ttd_petugas_transfer',
                        'tpi_kp_ttd_petugas_terima_transfer',
                        'tpi_st_sebelum_composmentis',
                        'tpi_st_sebelum_apatis',
                        'tpi_st_sebelum_samnolen',
                        'tpi_st_sebelum_sopor',
                        'tpi_st_sebelum_koma',
                        'tpi_st_sudah_composmentis',
                        'tpi_st_sudah_apatis',
                        'tpi_st_sudah_samnolen',
                        'tpi_st_sudah_sopor',
                        'tpi_st_sudah_koma',
                        'tpi_st_ttd_petugas_transfer',
                        'tpi_st_ttd_petugas_terima_transfer',
                    ];

                    for (const checkboxID of checkboxesToCheck) {
                        if (data.data[checkboxID] === '1') {
                            $(`#${checkboxID}`).prop('checked', true).change();
                        }
                    }


                    //radio
                    if (data.data.tpi_kewaspadaan === '1') {
                        $('#tpi_kewaspadaan_precaution').prop('checked', true).change()
                    }
                    if (data.data.tpi_kewaspadaan === '2') {
                        $('#tpi_kewaspadaan_contac').prop('checked', true).change()
                    }
                    if (data.data.tpi_kewaspadaan === '3') {
                        $('#tpi_kewaspadaan_airbone').prop('checked', true).change()
                    }
                    if (data.data.tpi_kewaspadaan === '4') {
                        $('#tpi_kewaspadaan_droplet').prop('checked', true).change()
                    }
                    if (data.data.tpi_kewaspadaan === '5') {
                        $('#tpi_kewaspadaan_lain').prop('checked', true).change()
                    }

                    if (data.data.tpi_pf_alergi === '0') {
                        $('#tpi_pf_alergi_tidak').prop('checked', true).change()
                    }
                    if (data.data.tpi_pf_alergi === '1') {
                        $('#tpi_pf_alergi_ya').prop('checked', true).change()
                    }
                    
                    if (data.data.tpi_pf_skala_nyeri_pasien === '0') {
                        $('#tpi_pf_skala_nyeri_pasien_tidak').prop('checked', true).change()
                    }
                    if (data.data.tpi_pf_skala_nyeri_pasien === '1') {
                        $('#tpi_pf_skala_nyeri_pasien_ya').prop('checked', true).change()
                    }
                    
                    if (data.data.tpi_pf_resiko_jatuh_pasien === '0') {
                        $('#tpi_pf_resiko_jatuh_pasien_tidak').prop('checked', true).change()
                    }
                    if (data.data.tpi_pf_resiko_jatuh_pasien === '1') {
                        $('#tpi_pf_resiko_jatuh_pasien_ya').prop('checked', true).change()
                    }

                    if (data.data.tpi_pf_mobilisasi_pasien === '0') {
                        $('#tpi_pf_mobilisasi_pasien_jalan').prop('checked', true).change()
                    }
                    if (data.data.tpi_pf_mobilisasi_pasien === '1') {
                        $('#tpi_pf_mobilisasi_pasien_duduk').prop('checked', true).change()
                    }
                    if (data.data.tpi_pf_mobilisasi_pasien === '2') {
                        $('#tpi_pf_mobilisasi_pasien_tirah_barang').prop('checked', true).change()
                    }

                    if (data.data.tpi_pf_mobilisasi_pasien_transfer === '0') {
                        $('#tpi_pf_mobilisasi_pasien_transfer_mandiri').prop('checked', true).change()
                    }
                    if (data.data.tpi_pf_mobilisasi_pasien_transfer === '1') {
                        $('#tpi_pf_mobilisasi_pasien_transfer_dibantu_sebagian').prop('checked', true).change()
                    }
                    if (data.data.tpi_pf_mobilisasi_pasien_transfer === '2') {
                        $('#tpi_pf_mobilisasi_pasien_transfer_tirah_diabantu_penuh').prop('checked', true).change()
                    }
                    
                    if (data.data.tpi_pf_resiko_dekubitus_pasien === '0') {
                        $('#tpi_pf_resiko_dekubitus_pasien_tidak').prop('checked', true).change()
                    }
                    if (data.data.tpi_pf_resiko_dekubitus_pasien === '1') {
                        $('#tpi_pf_resiko_dekubitus_pasien_ya').prop('checked', true).change()
                    }
                    
                    if (data.data.tpi_kp_sudah_kondisi_pasien === '0') {
                        $('#tpi_kp_sudah_kondisi_pasien_memburuk').prop('checked', true).change()
                    }
                    if (data.data.tpi_kp_sudah_kondisi_pasien === '1') {
                        $('#tpi_kp_sudah_kondisi_pasien_stabil').prop('checked', true).change()
                    }
                    if (data.data.tpi_kp_sudah_kondisi_pasien === '2') {
                        $('#tpi_kp_sudah_kondisi_pasien_tidak_berubah').prop('checked', true).change()
                    }

                    if (data.data.tpi_kp_sudah_nama_obat === '0') {
                        $('#tpi_kp_sudah_nama_obat_komplit').prop('checked', true).change()
                    }
                    if (data.data.tpi_kp_sudah_nama_obat === '1') {
                        $('#tpi_kp_sudah_nama_obat_lainnya').prop('checked', true).change()
                    }

                    if (data.data.tpi_kp_sudah_pemeriksaan_penunjang === '0') {
                        $('#tpi_kp_sudah_pemeriksaan_penunjang_komplit').prop('checked', true).change()
                    }
                    if (data.data.tpi_kp_sudah_pemeriksaan_penunjang === '1') {
                        $('#tpi_kp_sudah_pemeriksaan_penunjang_lainnya').prop('checked', true).change()
                    }

                    if (data.data.tpi_st_sudah_kondisi_pasien === '0') {
                        $('#tpi_st_sudah_kondisi_pasien_memburuk').prop('checked', true).change()
                    }
                    if (data.data.tpi_st_sudah_kondisi_pasien === '1') {
                        $('#tpi_st_sudah_kondisi_pasien_stabil').prop('checked', true).change()
                    }
                    if (data.data.tpi_st_sudah_kondisi_pasien === '2') {
                        $('#tpi_st_sudah_kondisi_pasien_tidak_berubah').prop('checked', true).change()
                    }

                    if (data.data.tpi_st_sudah_nama_obat === '0') {
                        $('#tpi_st_sudah_nama_obat_komplit').prop('checked', true).change()
                    }
                    if (data.data.tpi_st_sudah_nama_obat === '1') {
                        $('#tpi_st_sudah_nama_obat_lainnya').prop('checked', true).change()
                    }

                    if (data.data.tpi_st_sudah_pemeriksaan_penunjang === '0') {
                        $('#tpi_st_sudah_pemeriksaan_penunjang_komplit').prop('checked', true).change()
                    }
                    if (data.data.tpi_st_sudah_pemeriksaan_penunjang === '1') {
                        $('#tpi_st_sudah_pemeriksaan_penunjang_lainnya').prop('checked', true).change()
                    }

                    $("[id^='tpi_']").attr('disabled', true);
                    $('#tpi_dpjp, #tpi_kp_petugas_tansfer, #tpi_kp_petugas_terima_transfer, #tpi_st_petugas_tansfer, #tpi_st_petugas_terima_transfer').select2c('readonly', true);
                }

            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                accessFailed(e.status);
            },
        });

    }

    function editTransfer(id) {
        $('#wizard-transfer-group').bwizard('show', '0');

        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_detail_transfer") ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {
                $('#id_transfer').val(data.data.id_transfer);
                $('#tpi_id_layanan_pendaftaran').val(data.data.id_layanan_pendaftaran);

                if (data !== null) {
                    $('#tpi_tanggal_masuk').val(data.data.tpi_tanggal_masuk !== null ? datetimefmysql(data.data.tpi_tanggal_masuk) : "");
                    $('#tpi_tanggal_pindah').val(data.data.tpi_tanggal_pindah !== null ? datetimefmysql(data.data.tpi_tanggal_pindah) : "");
                    $('#tpi_ruang_asal').val(data.data.tpi_ruang_asal);
                    $('#tpi_ruang_tujuan').val(data.data.tpi_ruang_tujuan);
                    $('#tpi_diagnosis_utama').val(data.data.tpi_diagnosis_utama);
                    $('#tpi_diagnosis_sekunder').val(data.data.tpi_diagnosis_sekunder);
                    $('#tpi_dpjp').val(data.data.tpi_dpjp);
                    $('#s2id_tpi_dpjp a .select2c-chosen').html(data.data.nama_dpjp);
                    $('#tpi_riwayat_kewaspadan').val(data.data.tpi_riwayat_kewaspadan);
                    $('#tpi_indikasi_masuk_rs').val(data.data.tpi_indikasi_masuk_rs);
                    $('#tpi_riwayat_kesehatan').val(data.data.tpi_riwayat_kesehatan);
                    $('#tpi_pf_gcs_e').val(data.data.tpi_pf_gcs_e);
                    $('#tpi_pf_gcs_m').val(data.data.tpi_pf_gcs_m);
                    $('#tpi_pf_gcs_v').val(data.data.tpi_pf_gcs_v);
                    $('#tpi_pf_gcs_total').val(data.data.tpi_pf_gcs_total);
                    $('#tpi_pf_afgar_score').val(data.data.tpi_pf_afgar_score);
                    $('#tpi_pf_djj').val(data.data.tpi_pf_djj);
                    $('#tpi_pf_tensi_sis').val(data.data.tpi_pf_tensi_sis);
                    $('#tpi_pf_tensi_dis').val(data.data.tpi_pf_tensi_dis);
                    $('#tpi_pf_suhu').val(data.data.tpi_pf_suhu);
                    $('#tpi_pf_nadi').val(data.data.tpi_pf_nadi);
                    $('#tpi_pf_nafas').val(data.data.tpi_pf_nafas);
                    $('#tpi_pf_pupil_1').val(data.data.tpi_pf_pupil_1);
                    $('#tpi_pf_pupil_2').val(data.data.tpi_pf_pupil_2);
                    $('#tpi_pf_pupil_3').val(data.data.tpi_pf_pupil_3);
                    $('#tpi_pf_pupil_4').val(data.data.tpi_pf_pupil_4);
                    $('#tpi_pf_tinggi_badan').val(data.data.tpi_pf_tinggi_badan);
                    $('#tpi_pf_berat_badan').val(data.data.tpi_pf_berat_badan);
                    $('#tpi_pf_keadaan_umum').val(data.data.tpi_pf_keadaan_umum);
                    $('#tpi_pf_riwayat_alergi').val(data.data.tpi_pf_riwayat_alergi);
                    $('#tpi_pf_riwayat_nyeri_pasien').val(data.data.tpi_pf_riwayat_nyeri_pasien);
                    $('#tpi_pf_riwayat_resiko_jatuh_pasien').val(data.data.tpi_pf_riwayat_resiko_jatuh_pasien);
                    $('#tpi_pf_riwayat_resiko_dekubitus_pasien').val(data.data.tpi_pf_riwayat_resiko_dekubitus_pasien);
                    $('#tpi_pf_tanggal_infus').val(data.data.tpi_pf_tanggal_infus !== null ? datefmysql(data.data.tpi_pf_tanggal_infus) : "");
                    $('#tpi_pf_tanggal_ngt').val(data.data.tpi_pf_tanggal_ngt !== null ? datefmysql(data.data.tpi_pf_tanggal_ngt) : "");
                    $('#tpi_pf_tanggal_ett').val(data.data.tpi_pf_tanggal_ett !== null ? datefmysql(data.data.tpi_pf_tanggal_ett) : "");
                    $('#tpi_pf_tanggal_cvc').val(data.data.tpi_pf_tanggal_cvc !== null ? datefmysql(data.data.tpi_pf_tanggal_cvc) : "");
                    $('#tpi_pf_tanggal_dc').val(data.data.tpi_pf_tanggal_dc !== null ? datefmysql(data.data.tpi_pf_tanggal_dc) : "");
                    $('#tpi_pf_tanggal_lain').val(data.data.tpi_pf_tanggal_lain !== null ? datefmysql(data.data.tpi_pf_tanggal_lain) : "");
                    $('#tpi_pf_tanggal_cdl').val(data.data.tpi_pf_tanggal_cdl !== null ? datefmysql(data.data.tpi_pf_tanggal_cdl) : "");
                    $('#tpi_pf_keterangan_oksigen').val(data.data.tpi_pf_keterangan_oksigen);
                    $('#tpi_pt_infus').val(data.data.tpi_pt_infus);
                    $('#tpi_pt_obat').val(data.data.tpi_pt_obat);
                    $('#tpi_pp_ket_labolatorium').val(data.data.tpi_pp_ket_labolatorium);
                    $('#tpi_pp_ket_radiologi').val(data.data.tpi_pp_ket_radiologi);
                    $('#tpi_pp_ket_lainnya').val(data.data.tpi_pp_ket_lainnya);
                    $('#tpi_tm_tindakan_medis').val(data.data.tpi_tm_tindakan_medis);
                    $('#tpi_tm_rencana_tindakan').val(data.data.tpi_tm_rencana_tindakan);
                    $('#tpi_kp_sebelum_keadaan_umum').val(data.data.tpi_kp_sebelum_keadaan_umum);
                    $('#tpi_kp_sebelum_gcs_e').val(data.data.tpi_kp_sebelum_gcs_e);
                    $('#tpi_kp_sebelum_gcs_m').val(data.data.tpi_kp_sebelum_gcs_m);
                    $('#tpi_kp_sebelum_gcs_v').val(data.data.tpi_kp_sebelum_gcs_v);
                    $('#tpi_kp_sebelum_gcs_total').val(data.data.tpi_kp_sebelum_gcs_total);
                    $('#tpi_kp_sebelum_catatan').val(data.data.tpi_kp_sebelum_catatan);
                    $('#tpi_kp_perjalanan_masalah_selama_trasnfer').val(data.data.tpi_kp_perjalanan_masalah_selama_trasnfer);
                    $('#tpi_kp_perjalanan_penanganan_masalah').val(data.data.tpi_kp_perjalanan_penanganan_masalah);
                    $('#tpi_kp_sudah_keadaan_umum').val(data.data.tpi_kp_sudah_keadaan_umum);
                    $('#tpi_kp_sudah_gcs_e').val(data.data.tpi_kp_sudah_gcs_e);
                    $('#tpi_kp_sudah_gcs_m').val(data.data.tpi_kp_sudah_gcs_m);
                    $('#tpi_kp_sudah_gcs_v').val(data.data.tpi_kp_sudah_gcs_v);
                    $('#tpi_kp_sudah_gcs_total').val(data.data.tpi_kp_sudah_gcs_total);
                    $('#tpi_kp_sudah_tensi_sis').val(data.data.tpi_kp_sudah_tensi_sis);
                    $('#tpi_kp_sudah_tensi_dis').val(data.data.tpi_kp_sudah_tensi_dis);
                    $('#tpi_kp_sudah_nadi').val(data.data.tpi_kp_sudah_nadi);
                    $('#tpi_kp_sudah_pernafasan').val(data.data.tpi_kp_sudah_pernafasan);
                    $('#tpi_kp_sudah_suhu').val(data.data.tpi_kp_sudah_suhu);
                    $('#tpi_kp_sudah_ket_nama_obat').val(data.data.tpi_kp_sudah_ket_nama_obat);
                    $('#tpi_kp_sudah_ket_pemeriksaan_penunjang').val(data.data.tpi_kp_sudah_ket_pemeriksaan_penunjang);
                    $('#tpi_kp_sudah_catatan_penting').val(data.data.tpi_kp_sudah_catatan_penting);
                    $('#tpi_kp_waktu_ttd_petugas_tf').val(data.data.tpi_kp_waktu_ttd_petugas_tf !== null ? datetimefmysql(data.data.tpi_kp_waktu_ttd_petugas_tf) : "");
                    $('#tpi_kp_waktu_ttd_petugas_penerima').val(data.data.tpi_kp_waktu_ttd_petugas_penerima !== null ? datetimefmysql(data.data.tpi_kp_waktu_ttd_petugas_penerima) : "");
                    $('#tpi_kp_petugas_tansfer').val(data.data.tpi_kp_petugas_tansfer);
                    $('#s2id_tpi_kp_petugas_tansfer a .select2c-chosen').html(data.data.nama_kp_petugas_tansfer);
                    $('#tpi_kp_petugas_terima_transfer').val(data.data.tpi_kp_petugas_terima_transfer);
                    $('#s2id_tpi_kp_petugas_terima_transfer a .select2c-chosen').html(data.data.nama_kp_petugas_terima_transfer);
                    $('#tpi_st_sebelum_keadaan_umum').val(data.data.tpi_st_sebelum_keadaan_umum);
                    $('#tpi_st_sebelum_gcs_e').val(data.data.tpi_st_sebelum_gcs_e);
                    $('#tpi_st_sebelum_gcs_m').val(data.data.tpi_st_sebelum_gcs_m);
                    $('#tpi_st_sebelum_gcs_v').val(data.data.tpi_st_sebelum_gcs_v);
                    $('#tpi_st_sebelum_gcs_total').val(data.data.tpi_st_sebelum_gcs_total);
                    $('#tpi_st_sebelum_tensi_sis').val(data.data.tpi_st_sebelum_tensi_sis);
                    $('#tpi_st_sebelum_tensi_dis').val(data.data.tpi_st_sebelum_tensi_dis);
                    $('#tpi_st_sebelum_nadi').val(data.data.tpi_st_sebelum_nadi);
                    $('#tpi_st_sebelum_pernafasan').val(data.data.tpi_st_sebelum_pernafasan);
                    $('#tpi_st_sebelum_suhu').val(data.data.tpi_st_sebelum_suhu);
                    $('#tpi_st_sebelum_catatan').val(data.data.tpi_st_sebelum_catatan);
                    $('#tpi_st_perjalanan_masalah_selama_transfer').val(data.data.tpi_st_perjalanan_masalah_selama_transfer);
                    $('#tpi_st_perjalanan_penanganan_masalah').val(data.data.tpi_st_perjalanan_penanganan_masalah);
                    $('#tpi_st_sudah_keadaan_umum').val(data.data.tpi_st_sudah_keadaan_umum);
                    $('#tpi_st_sudah_gcs_e').val(data.data.tpi_st_sudah_gcs_e);
                    $('#tpi_st_sudah_gcs_m').val(data.data.tpi_st_sudah_gcs_m);
                    $('#tpi_st_sudah_gcs_v').val(data.data.tpi_st_sudah_gcs_v);
                    $('#tpi_st_sudah_gcs_total').val(data.data.tpi_st_sudah_gcs_total);
                    $('#tpi_st_sudah_tensi_sis').val(data.data.tpi_st_sudah_tensi_sis);
                    $('#tpi_st_sudah_tensi_dis').val(data.data.tpi_st_sudah_tensi_dis);
                    $('#tpi_st_sudah_nadi').val(data.data.tpi_st_sudah_nadi);
                    $('#tpi_st_sudah_pernafasan').val(data.data.tpi_st_sudah_pernafasan);
                    $('#tpi_st_sudah_suhu').val(data.data.tpi_st_sudah_suhu);
                    $('#tpi_st_sudah_ket_nama_obat').val(data.data.tpi_st_sudah_ket_nama_obat);
                    $('#tpi_st_sudah_ket_pemeriksaan_penunjang').val(data.data.tpi_st_sudah_ket_pemeriksaan_penunjang);
                    $('#tpi_st_sudah_catatan_penting').val(data.data.tpi_st_sudah_catatan_penting);
                    $('#tpi_st_waktu_ttd_petugas_tf').val(data.data.tpi_st_waktu_ttd_petugas_tf !== null ? datetimefmysql(data.data.tpi_st_waktu_ttd_petugas_tf) : "");
                    $('#tpi_st_waktu_ttd_petugas_penerima').val(data.data.tpi_st_waktu_ttd_petugas_penerima !== null ? datetimefmysql(data.data.tpi_st_waktu_ttd_petugas_penerima) : "");
                    $('#tpi_st_petugas_tansfer').val(data.data.tpi_st_petugas_tansfer);
                    $('#s2id_tpi_st_petugas_tansfer a .select2c-chosen').html(data.data.nama_st_petugas_tansfer);
                    $('#tpi_st_petugas_terima_transfer').val(data.data.tpi_st_petugas_terima_transfer);
                    $('#s2id_tpi_st_petugas_terima_transfer a .select2c-chosen').html(data.data.nama_st_petugas_terima_transfer);

                    // checkbox
                    const checkboxesToCheck = [
                        'tpi_pf_composmentis',
                        'tpi_pf_apatis',
                        'tpi_pf_samnolen',
                        'tpi_pf_sopor',
                        'tpi_pf_koma',
                        'tpi_pf_infus',
                        'tpi_pf_ngt_pasien',
                        'tpi_pf_ett',
                        'tpi_pf_cvc',
                        'tpi_pf_dc',
                        'tpi_pf_cdl',
                        'tpi_pf_oksigen',
                        'tpi_pf_lain',
                        'tpi_pf_pump',
                        'tpi_pf_bidai',
                        'tpi_pp_labolatorium',
                        'tpi_pp_radiologi',
                        'tpi_pp_lainnya',
                        'tpi_kp_sebelum_composmentis',
                        'tpi_kp_sebelum_apatis',
                        'tpi_kp_sebelum_samnolen',
                        'tpi_kp_sebelum_sopor',
                        'tpi_kp_sebelum_koma',
                        'tpi_kp_sudah_composmentis',
                        'tpi_kp_sudah_apatis',
                        'tpi_kp_sudah_samnolen',
                        'tpi_kp_sudah_sopor',
                        'tpi_kp_sudah_koma',
                        'tpi_kp_ttd_petugas_transfer',
                        'tpi_kp_ttd_petugas_terima_transfer',
                        'tpi_st_sebelum_composmentis',
                        'tpi_st_sebelum_apatis',
                        'tpi_st_sebelum_samnolen',
                        'tpi_st_sebelum_sopor',
                        'tpi_st_sebelum_koma',
                        'tpi_st_sudah_composmentis',
                        'tpi_st_sudah_apatis',
                        'tpi_st_sudah_samnolen',
                        'tpi_st_sudah_sopor',
                        'tpi_st_sudah_koma',
                        'tpi_st_ttd_petugas_transfer',
                        'tpi_st_ttd_petugas_terima_transfer',
                    ];

                    for (const checkboxID of checkboxesToCheck) {
                        if (data.data[checkboxID] === '1') {
                            $(`#${checkboxID}`).prop('checked', true).change();
                        }
                    }


                    //radio
                    if (data.data.tpi_kewaspadaan === '1') {
                        $('#tpi_kewaspadaan_precaution').prop('checked', true).change()
                    }
                    if (data.data.tpi_kewaspadaan === '2') {
                        $('#tpi_kewaspadaan_contac').prop('checked', true).change()
                    }
                    if (data.data.tpi_kewaspadaan === '3') {
                        $('#tpi_kewaspadaan_airbone').prop('checked', true).change()
                    }
                    if (data.data.tpi_kewaspadaan === '4') {
                        $('#tpi_kewaspadaan_droplet').prop('checked', true).change()
                    }
                    if (data.data.tpi_kewaspadaan === '5') {
                        $('#tpi_kewaspadaan_lain').prop('checked', true).change()
                    }

                    if (data.data.tpi_pf_alergi === '0') {
                        $('#tpi_pf_alergi_tidak').prop('checked', true).change()
                    }
                    if (data.data.tpi_pf_alergi === '1') {
                        $('#tpi_pf_alergi_ya').prop('checked', true).change()
                    }
                    
                    if (data.data.tpi_pf_skala_nyeri_pasien === '0') {
                        $('#tpi_pf_skala_nyeri_pasien_tidak').prop('checked', true).change()
                    }
                    if (data.data.tpi_pf_skala_nyeri_pasien === '1') {
                        $('#tpi_pf_skala_nyeri_pasien_ya').prop('checked', true).change()
                    }
                    
                    if (data.data.tpi_pf_resiko_jatuh_pasien === '0') {
                        $('#tpi_pf_resiko_jatuh_pasien_tidak').prop('checked', true).change()
                    }
                    if (data.data.tpi_pf_resiko_jatuh_pasien === '1') {
                        $('#tpi_pf_resiko_jatuh_pasien_ya').prop('checked', true).change()
                    }

                    if (data.data.tpi_pf_mobilisasi_pasien === '0') {
                        $('#tpi_pf_mobilisasi_pasien_jalan').prop('checked', true).change()
                    }
                    if (data.data.tpi_pf_mobilisasi_pasien === '1') {
                        $('#tpi_pf_mobilisasi_pasien_duduk').prop('checked', true).change()
                    }
                    if (data.data.tpi_pf_mobilisasi_pasien === '2') {
                        $('#tpi_pf_mobilisasi_pasien_tirah_barang').prop('checked', true).change()
                    }

                    if (data.data.tpi_pf_mobilisasi_pasien_transfer === '0') {
                        $('#tpi_pf_mobilisasi_pasien_transfer_mandiri').prop('checked', true).change()
                    }
                    if (data.data.tpi_pf_mobilisasi_pasien_transfer === '1') {
                        $('#tpi_pf_mobilisasi_pasien_transfer_dibantu_sebagian').prop('checked', true).change()
                    }
                    if (data.data.tpi_pf_mobilisasi_pasien_transfer === '2') {
                        $('#tpi_pf_mobilisasi_pasien_transfer_tirah_diabantu_penuh').prop('checked', true).change()
                    }
                    
                    if (data.data.tpi_pf_resiko_dekubitus_pasien === '0') {
                        $('#tpi_pf_resiko_dekubitus_pasien_tidak').prop('checked', true).change()
                    }
                    if (data.data.tpi_pf_resiko_dekubitus_pasien === '1') {
                        $('#tpi_pf_resiko_dekubitus_pasien_ya').prop('checked', true).change()
                    }
                    
                    if (data.data.tpi_kp_sudah_kondisi_pasien === '0') {
                        $('#tpi_kp_sudah_kondisi_pasien_memburuk').prop('checked', true).change()
                    }
                    if (data.data.tpi_kp_sudah_kondisi_pasien === '1') {
                        $('#tpi_kp_sudah_kondisi_pasien_stabil').prop('checked', true).change()
                    }
                    if (data.data.tpi_kp_sudah_kondisi_pasien === '2') {
                        $('#tpi_kp_sudah_kondisi_pasien_tidak_berubah').prop('checked', true).change()
                    }

                    if (data.data.tpi_kp_sudah_nama_obat === '0') {
                        $('#tpi_kp_sudah_nama_obat_komplit').prop('checked', true).change()
                    }
                    if (data.data.tpi_kp_sudah_nama_obat === '1') {
                        $('#tpi_kp_sudah_nama_obat_lainnya').prop('checked', true).change()
                    }

                    if (data.data.tpi_kp_sudah_pemeriksaan_penunjang === '0') {
                        $('#tpi_kp_sudah_pemeriksaan_penunjang_komplit').prop('checked', true).change()
                    }
                    if (data.data.tpi_kp_sudah_pemeriksaan_penunjang === '1') {
                        $('#tpi_kp_sudah_pemeriksaan_penunjang_lainnya').prop('checked', true).change()
                    }

                    if (data.data.tpi_st_sudah_kondisi_pasien === '0') {
                        $('#tpi_st_sudah_kondisi_pasien_memburuk').prop('checked', true).change()
                    }
                    if (data.data.tpi_st_sudah_kondisi_pasien === '1') {
                        $('#tpi_st_sudah_kondisi_pasien_stabil').prop('checked', true).change()
                    }
                    if (data.data.tpi_st_sudah_kondisi_pasien === '2') {
                        $('#tpi_st_sudah_kondisi_pasien_tidak_berubah').prop('checked', true).change()
                    }

                    if (data.data.tpi_st_sudah_nama_obat === '0') {
                        $('#tpi_st_sudah_nama_obat_komplit').prop('checked', true).change()
                    }
                    if (data.data.tpi_st_sudah_nama_obat === '1') {
                        $('#tpi_st_sudah_nama_obat_lainnya').prop('checked', true).change()
                    }

                    if (data.data.tpi_st_sudah_pemeriksaan_penunjang === '0') {
                        $('#tpi_st_sudah_pemeriksaan_penunjang_komplit').prop('checked', true).change()
                    }
                    if (data.data.tpi_st_sudah_pemeriksaan_penunjang === '1') {
                        $('#tpi_st_sudah_pemeriksaan_penunjang_lainnya').prop('checked', true).change()
                    }

                    $("[id^='tpi_']").attr('disabled', false);
                    $('#tpi_dpjp, #tpi_kp_petugas_tansfer, #tpi_kp_petugas_terima_transfer, #tpi_st_petugas_tansfer, #tpi_st_petugas_terima_transfer').select2c('readonly', false);
                }

            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                accessFailed(e.status);
            },
        });

    }

    function resetFormTransfer() {

        $('#id_transfer, #tpi_tanggal_masuk, #tpi_tanggal_pindah, #tpi_ruang_asal, #tpi_ruang_tujuan, #tpi_diagnosis_utama, #tpi_diagnosis_sekunder, #tpi_dpjp, #tpi_riwayat_kewaspadan, #tpi_indikasi_masuk_rs, #tpi_riwayat_kesehatan, #tpi_pf_gcs_e, #tpi_pf_gcs_m, #tpi_pf_gcs_v, #tpi_pf_tensi_sis, #tpi_pf_tensi_dis, #tpi_pf_suhu, #tpi_pf_nadi, #tpi_pf_nafas, #tpi_pf_tinggi_badan, #tpi_pf_berat_badan, #tpi_pf_keadaan_umum, #tpi_pf_riwayat_alergi, #tpi_pf_riwayat_nyeri_pasien, #tpi_pf_riwayat_resiko_jatuh_pasien, #tpi_pf_riwayat_resiko_dekubitus_pasien, #tpi_pf_tanggal_infus, #tpi_pf_tanggal_ngt, #tpi_pf_tanggal_ett, #tpi_pf_tanggal_cvc, #tpi_pf_tanggal_dc, #tpi_pf_tanggal_lain, #tpi_pt_infus, #tpi_pt_obat, #tpi_pp_ket_labolatorium, #tpi_pp_ket_radiologi, #tpi_pp_ket_lainnya, #tpi_tm_tindakan_medis, #tpi_tm_rencana_tindakan, #tpi_kp_sebelum_keadaan_umum, #tpi_kp_sebelum_gcs_e, #tpi_kp_sebelum_gcs_m, #tpi_kp_sebelum_gcs_v, #tpi_kp_sebelum_gcs_total, #tpi_kp_sebelum_catatan, #tpi_kp_perjalanan_masalah_selama_trasnfer, #tpi_kp_perjalanan_penanganan_masalah, #tpi_kp_sudah_keadaan_umum, #tpi_kp_sudah_gcs_e, #tpi_kp_sudah_gcs_m, #tpi_kp_sudah_gcs_v, #tpi_kp_sudah_gcs_total, #tpi_kp_sudah_tensi_sis, #tpi_kp_sudah_tensi_dis, #tpi_kp_sudah_nadi, #tpi_kp_sudah_st_pernafasan, #tpi_kp_sudah_st_suhu,  #tpi_kp_sudah_ket_nama_obat, #tpi_kp_sudah_ket_pemeriksaan_penunjang, #tpi_kp_sudah_catatan_penting, #tpi_kp_waktu_ttd_petugas_tf, #tpi_kp_waktu_ttd_petugas_penerima, #tpi_kp_petugas_tansfer, #tpi_kp_petugas_terima_transfer, #tpi_st_sebelum_keadaan_umum, #tpi_st_sebelum_gcs_e, #tpi_st_sebelum_gcs_m, #tpi_st_sebelum_gcs_v, #tpi_st_sebelum_gcs_total, #tpi_st_sebelum_catatan, #tpi_st_perjalanan_masalah_selama_transfer, #tpi_st_perjalanan_penanganan_masalah,#tpi_st_sudah_keadaan_umum, #tpi_st_sudah_gcs_e, #tpi_st_sudah_gcs_m, #tpi_st_sudah_gcs_v, #tpi_st_sudah_gcs_total, #tpi_st_sudah_tensi_sis, #tpi_st_sudah_tensi_dis, #tpi_st_sudah_st_nadi, #tpi_st_sudah_st_pernafasan, #tpi_st_sudah_st_suhu, #tpi_st_sudah_ket_nama_obat, #tpi_st_sudah_ket_pemeriksaan_penunjang, #tpi_st_sudah_catatan_penting, #tpi_st_waktu_ttd_petugas_tf, #tpi_st_waktu_ttd_petugas_penerima, #tpi_st_petugas_tansfer, #tpi_st_petugas_terima_transfer').val('');

        $('#tpi_kewaspadaan_precaution, #tpi_kewaspadaan_contac, #tpi_kewaspadaan_airbone, #tpi_kewaspadaan_droplet, #tpi_kewaspadaan_lain, #tpi_pf_alergi_tidak, #tpi_pf_alergi_ya, #tpi_pf_skala_nyeri_pasien_tidak, #tpi_pf_skala_nyeri_pasien_ya, #tpi_pf_resiko_jatuh_pasien_tidak, #resiko_jatuh_pasien_ya, #tpi_pf_mobilisasi_pasien_jalan, #tpi_pf_mobilisasi_pasien_duduk, #tpi_pf_mobilisasi_pasien_tirah_barang, #tpi_pf_mobilisasi_pasien_transfer_mandiri, #tpi_pf_mobilisasi_pasien_transfer_dibantu_sebagian, #tpi_pf_mobilisasi_pasien_transfer_tirah_diabantu_penuh, #tpi_pf_resiko_dekubitus_pasien_tidak, #tpi_pf_resiko_dekubitus_pasien_ya, #tpi_kp_sudah_nama_obat_komplit, #tpi_kp_sudah_nama_obat_lainnya, #tpi_kp_sudah_pemeriksaan_penunjang_komplit, #tpi_kp_sudah_pemeriksaan_penunjang_lainnya,#tpi_st_sudah_nama_obat_komplit, #tpi_st_sudah_nama_obat_lainnya, #tpi_st_sudah_pemeriksaan_penunjang_komplit, #tpi_st_sudah_pemeriksaan_penunjang_lainnya, #tpi_pf_composmentis, #tpi_pf_apatis, #tpi_pf_samnolen, #tpi_pf_sopor, #tpi_pf_koma, #tpi_pf_infus, #tpi_pf_ngt_pasien, #tpi_pf_ett, #tpi_pf_cvc, #tpi_pf_dc, #tpi_pf_lain, #tpi_pf_pump, #tpi_pf_bidai, #tpi_pp_labolatorium, #tpi_pp_radiologi, #tpi_pp_lainnya, #tpi_kp_sebelum_composmentis, #tpi_kp_sebelum_apatis, #tpi_kp_sebelum_samnolen, #tpi_kp_sebelum_sopor, #tpi_kp_sebelum_koma, #tpi_kp_sudah_composmentis, #tpi_kp_sudah_apatis, #tpi_kp_sudah_samnolen, #tpi_kp_sudah_sopor, #tpi_kp_sudah_koma, #tpi_kp_sudah_memburuk, #tpi_kp_sudah_stabil, #tpi_kp_sudah_tidak_berubah, #tpi_kp_ttd_petugas_transfer, #tpi_kp_ttd_petugas_terima_transfer,#tpi_st_sebelum_composmentis, #tpi_st_sebelum_apatis, #tpi_st_sebelum_samnolen, #tpi_st_sebelum_sopor, #tpi_st_sebelum_koma, #tpi_st_sudah_composmentis, #tpi_st_sudah_apatis, #tpi_st_sudah_samnolen, #tpi_st_sudah_sopor, #tpi_st_sudah_koma, #tpi_st_sudah_memburuk, #tpi_st_sudah_stabil, #tpi_st_sudah_tidak_berubah, #tpi_st_ttd_petugas_transfer, #tpi_st_ttd_petugas_terima_transfer, #tpi_pf_resiko_jatuh_pasien_ya, #tpi_st_sudah_kondisi_pasien_memburuk').prop('checked', false);

        $('#s2id_tpi_dpjp a .select2c-chosen, #s2id_tpi_kp_petugas_tansfer a .select2c-chosen, #s2id_tpi_kp_petugas_terima_transfer a .select2c-chosen, #s2id_tpi_st_petugas_tansfer a .select2c-chosen, #s2id_tpi_st_petugas_terima_transfer a .select2c-chosen').html('');
    }

    function hapusTransfer(obj, id) {

        bootbox.dialog({
            message: "Anda yakin akan menghapus data ini?",
            title: "Hapus Data",
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                hapus: {
                    label: '<i class="fas fa-trash-alt mr-1"></i>Hapus',
                    className: "btn-info",
                    callback: function() {
                        $.ajax({
                            type: 'DELETE',
                            url: '<?= base_url("pelayanan/api/pelayanan/hapus_transfer") ?>/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    removeList(obj);
                                } else {
                                    customAlert('Hapus Transfer Pasien Intra Rumah Sakit', data.message);
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