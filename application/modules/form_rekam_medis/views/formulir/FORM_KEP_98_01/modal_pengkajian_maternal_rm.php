<!-- // PIM + -->
<!-- <script>
    $(function() {
        $('#wizard-maternal').bwizard()

        $('.btn_expand_all').click(function() {
            $('.collapse').addClass('show')
        })

        $('.btn_collapse_all').click(function() {
            $('.collapse').removeClass('show')
        })

        $('#pm-waktu-kajian, #pm-waktu-kontraksi, #pm-waktu-bidan, #pm-waktu-dpjp').datetimepicker({
            format: 'DD/MM/YYYY HH:mm',
            pickSecond: false,
            pick12HourFormat: false,
            maxDate: new Date(),
            beforeShow: function(i) {
                if ($(i).attr('readonly')) {
                    return false
                }
            }
        })

        $('#pm-waktu-partus-1, #pm-waktu-partus-2, #pm-waktu-partus-3, #pm-waktu-partus-4, #pm-waktu-partus-5, #pm-waktu-partus-6, #pm-tanggal-lab, #pm-tanggal-cgt').datetimepicker({
            format: 'DD/MM/YYYY',
            pickSecond: false,
            pick12HourFormat: false,
            maxDate: new Date(),
            beforeShow: function(i) {
                if ($(i).attr('readonly')) {
                    return false
                }
            }
        })

        $('#pm-waktu-lendir, #pm-waktu-ketuban, #pm-waktu-makan, #pm-waktu-minum, #pm-waktu-bak, #pm-waktu-bab').datetimepicker({
            format: 'HH:mm',
            maxDate: new Date(),
            beforeShow: function(i) {
                if ($(i).attr('readonly')) {
                    return false;
                }
            }
        });

        $('[name="pm_diperoleh"]').change(function() {
            if ($(this).val() == '3') {
                $('#pm-diperoleh-sebutkan').prop('disabled', false)
            } else {
                $('#pm-diperoleh-sebutkan').val('').prop('disabled', true)
            }
        })

        $('#pm-kontraksi').click(function() {
            if ($(this).is(':checked')) {
                $('#pm-waktu-kontraksi').prop('disabled', false)
            } else {
                $('#pm-waktu-kontraksi').val('').prop('disabled', true)
            }
        })

        $('#pm-lendir').click(function() {
            if ($(this).is(':checked')) {
                $('#pm-waktu-lendir').prop('disabled', false)
            } else {
                $('#pm-waktu-lendir').val('').prop('disabled', true)
            }
        })

        $('#pm-ketuban').click(function() {
            if ($(this).is(':checked')) {
                $('#pm-waktu-ketuban, #pm-warna-ketuban').prop('disabled', false)
            } else {
                $('#pm-waktu-ketuban, #pm-warna-ketuban').val('').prop('disabled', true)
            }
        })

        $('#pm-darah').click(function() {
            if ($(this).is(':checked')) {
                $('#pm-darah-sebutkan').prop('disabled', false)
            } else {
                $('#pm-darah-sebutkan').val('').prop('disabled', true)
            }
        })

        $('#pm-lainnya').click(function() {
            if ($(this).is(':checked')) {
                $('#pm-lainnya-sebutkan').prop('disabled', false)
            } else {
                $('#pm-lainnya-sebutkan').val('').prop('disabled', true)
            }
        })

        $('#pm-hamil-muda-lain').click(function() {
            if ($(this).is(":checked")) {
                $('#pm-hamil-muda-sebutkan').prop('disabled', false);
            } else {
                $('#pm-hamil-muda-sebutkan').val('');
                $('#pm-hamil-muda-sebutkan').prop('disabled', true);
            }
        });

        $('#pm-hamil-tua-lain').click(function() {
            if ($(this).is(":checked")) {
                $('#pm-hamil-tua-sebutkan').prop('disabled', false);
            } else {
                $('#pm-hamil-tua-sebutkan').val('');
                $('#pm-hamil-tua-sebutkan').prop('disabled', true);
            }
        });

        $('#pm-umur-menarche').click(function() {
            if ($(this).is(':checked')) {
                $('#pm-umur-menarche-sebutkan, #pm-lama-haid, #pm-pembalut').prop('disabled', false)
            } else {
                $('#pm-umur-menarche-sebutkan, #pm-lama-haid, #pm-pembalut').val('').prop('disabled', true)
            }
        })

        $('#pm-penyakit-lain').click(function() {
            if ($(this).is(':checked')) {
                $('#pm-penyakit-sebutkan').prop('disabled', false)
            } else {
                $('#pm-penyakit-sebutkan').val('').prop('disabled', true)
            }
        })

        $('#pm-luka-lain').click(function() {
            if ($(this).is(':checked')) {
                $('#pm-luka-sebutkan').prop('disabled', false)
            } else {
                $('#pm-luka-sebutkan').val('').prop('disabled', true)
            }
        })

        $('#pm-leopold-1-lain').click(function() {
            if ($(this).is(":checked")) {
                $('#pm-leopold-1-sebutkan').prop('disabled', false);
            } else {
                $('#pm-leopold-1-sebutkan').val('');
                $('#pm-leopold-1-sebutkan').prop('disabled', true);
            }
        });

        $('#pm-leopold-2-lain').click(function() {
            if ($(this).is(":checked")) {
                $('#pm-leopold-2-sebutkan').prop('disabled', false);
            } else {
                $('#pm-leopold-2-sebutkan').val('');
                $('#pm-leopold-2-sebutkan').prop('disabled', true);
            }
        });

        $('#pm-leopold-3-lain').click(function() {
            if ($(this).is(":checked")) {
                $('#pm-leopold-3-sebutkan').prop('disabled', false);
            } else {
                $('#pm-leopold-3-sebutkan').val('');
                $('#pm-leopold-3-sebutkan').prop('disabled', true);
            }
        });

        $('[name="pm_vulva"]').change(function() {
            if ($(this).val() == '2') {
                $('#pm-vulva-sebutkan').prop('disabled', false)
            } else {
                $('#pm-vulva-sebutkan').val('').prop('disabled', true)
            }
        })

        $('#pm-pengeluaran-ketuban').click(function() {
            if ($(this).is(':checked')) {
                $('#pm-pengeluaran-ketuban-warna').prop('disabled', false)
            } else {
                $('#pm-pengeluaran-ketuban-warna').val('').prop('disabled', true)
            }
        })

        $('#pm-pengeluaran-darah').click(function() {
            if ($(this).is(':checked')) {
                $('#pm-pengeluaran-darah-sebanyak').prop('disabled', false)
            } else {
                $('#pm-pengeluaran-darah-sebanyak').val('').prop('disabled', true)
            }
        })

        $('#pm-pengeluaran-lain').click(function() {
            if ($(this).is(':checked')) {
                $('#pm-pengeluaran-sebutkan').prop('disabled', false)
            } else {
                $('#pm-pengeluaran-sebutkan').val('').prop('disabled', true)
            }
        })

        $('[name="pm_introitus"]').change(function() {
            if ($(this).val() == '2') {
                $('#pm-introitus-sebutkan').prop('disabled', false)
            } else {
                $('#pm-introitus-sebutkan').val('').prop('disabled', true)
            }
        })

        $('[name="pm_porsio"]').change(function() {
            if ($(this).val() == '2') {
                $('#pm-porsio-sebutkan').prop('disabled', false)
            } else {
                $('#pm-porsio-sebutkan').val('').prop('disabled', true)
            }
        })
        $('[name="pm_pembukaan_ketuban"]').change(function() {
            if ($(this).val() == '1') {
                $('#pm-pembukaan-ketuban-warna').prop('disabled', false)
            } else {
                $('#pm-pembukaan-ketuban-warna').val('').prop('disabled', true)
            }
        })

        $('#pm-kursi-roda').click(function() {
            if ($(this).is(":checked")) {
                $('#pm-kursi-roda-ya').prop('disabled', false);
                $('#pm-kursi-roda-ya').prop('checked', true).change();
            } else {
                $('#pm-kursi-roda-ya').prop('checked', false).change();;
                $('#pm-kursi-roda-ya').prop('disabled', true);
            }
        });

        $('#pm-kruk').click(function() {
            if ($(this).is(":checked")) {
                $('#pm-kruk-ya').prop('disabled', false);
                $('#pm-kruk-ya').prop('checked', true).change();
            } else {
                $('#pm-kruk-ya').prop('checked', false).change();;
                $('#pm-kruk-ya').prop('disabled', true);
            }
        });


        $('#pm-pegangan').click(function() {
            if ($(this).is(":checked")) {
                $('#pm-pegangan-ya').prop('disabled', false);
                $('#pm-pegangan-ya').prop('checked', true).change();
            } else {
                $('#pm-pegangan-ya').prop('checked', false).change();;
                $('#pm-pegangan-ya').prop('disabled', true);
            }
        });


        $('#pm-imobilisasi').click(function() {
            if ($(this).is(":checked")) {
                $('#pm-imobilisasi-ya').prop('disabled', false);
                $('#pm-imobilisasi-ya').prop('checked', true).change();
            } else {
                $('#pm-imobilisasi-ya').prop('checked', false).change();;
                $('#pm-imobilisasi-ya').prop('disabled', true);
            }
        });


        $('#pm-lemah').click(function() {
            if ($(this).is(":checked")) {
                $('#pm-lemah-ya').prop('disabled', false);
                $('#pm-lemah-ya').prop('checked', true).change();
            } else {
                $('#pm-lemah-ya').prop('checked', false).change();;
                $('#pm-lemah-ya').prop('disabled', true);
            }
        });


        $('#pm-terganggu').click(function() {
            if ($(this).is(":checked")) {
                $('#pm-terganggu-ya').prop('disabled', false);
                $('#pm-terganggu-ya').prop('checked', true).change();
            } else {
                $('#pm-terganggu-ya').prop('checked', false).change();;
                $('#pm-terganggu-ya').prop('disabled', true);
            }
        });


        $('#pm-kemampuan').click(function() {
            if ($(this).is(":checked")) {
                $('#pm-kemampuan-ya').prop('disabled', false);
                $('#pm-kemampuan-ya').prop('checked', true).change();
            } else {
                $('#pm-kemampuan-ya').prop('checked', false).change();;
                $('#pm-kemampuan-ya').prop('disabled', true);
            }
        });

        $('#pm-lupa').click(function() {
            if ($(this).is(":checked")) {
                $('#pm-lupa-ya').prop('disabled', false);
                $('#pm-lupa-ya').prop('checked', true).change();
            } else {
                $('#pm-lupa-ya').prop('checked', false).change();;
                $('#pm-lupa-ya').prop('disabled', true);
            }
        });

        $('[name="pm_alergi"]').change(function() {
            if ($(this).val() == '3') {
                $('#pm-alergi-obat, #pm-alergi-makan, #pm-alergi-obat-reaksi, #pm-alergi-makan-reaksi, #pm-alergi-lain, #pm-alergi-lain-reaksi').prop('disabled', false)
            } else {
                $('#pm-alergi-obat, #pm-alergi-makan, #pm-alergi-obat-reaksi, #pm-alergi-makan-reaksi, #pm-alergi-lain, #pm-alergi-lain-reaksi').val('').prop('disabled', true)
            }
        })

        $('[name="pm_berat_badan"]').change(function() {
            if ($(this).val() == '2') {
                $('#pm-berat-badan-kg').prop('disabled', false)
            } else {
                $('#pm-berat-badan-kg').val('').prop('disabled', true)
            }
        })

        $('#pm-berat-badan-lain').click(function() {
            if ($(this).is(":checked")) {
                $('#pm-berat-badan-sebutkan').prop('disabled', false);
            } else {
                $('#pm-berat-badan-sebutkan').val('');
                $('#pm-berat-badan-sebutkan').prop('disabled', true);
            }
        });

        $('[name="pm_fungsional"]').change(function() {
            if ($(this).val() == '3') {
                $('#pm-fungsional-sebutkan').prop('disabled', false)
            } else {
                $('#pm-fungsional-sebutkan').val('').prop('disabled', true)
            }
        })

        $('[name="pm_psikologis"]').change(function() {
            if ($(this).val() == '6') {
                $('#pm-psikologis-sebutkan').prop('disabled', false)
            } else {
                $('#pm-psikologis-sebutkan').val('').prop('disabled', true)
            }
        })

        $('[name="pm_mental"]').change(function() {
            if ($(this).val() == '2') {
                $('#pm-mental-sebutkan').prop('disabled', false)
            } else {
                $('#pm-mental-sebutkan').val('').prop('disabled', true)
            }
        })

        $('[name="pm_bayar"]').change(function() {
            if ($(this).val() == '3') {
                $('#pm-bayar-asuransi').prop('disabled', false)
            } else {
                $('#pm-bayar-asuransi').val('').prop('disabled', true)
            }
        })

        $('#pm-bayar-lain').click(function() {
            if ($(this).is(":checked")) {
                $('#pm-bayar-sebutkan').prop('disabled', false);
            } else {
                $('#pm-bayar-sebutkan').val('');
                $('#pm-bayar-sebutkan').prop('disabled', true);
            }
        });

        $('[name="pm_ibadah"]').change(function() {
            if ($(this).val() == '3') {
                $('#pm-ibadah-sebutkan').prop('disabled', false)
            } else {
                $('#pm-ibadah-sebutkan').val('').prop('disabled', true)
            }
        })

        $('#pm-kebutuhan-lain').click(function() {
            if ($(this).is(':checked')) {
                $('#pm-kebutuhan-sebutkan').prop('disabled', false)
            } else {
                $('#pm-kebutuhan-sebutkan').val('').prop('disabled', true)
            }
        })

        $('#pm-asuhan-lain').click(function() {
            if ($(this).is(':checked')) {
                $('#pm-asuhan-sebutkan').prop('disabled', false)
            } else {
                $('#pm-asuhan-sebutkan').val('').prop('disabled', true)
            }
        })



        $('.cgs').on('keyup', function() {
            let sum = 0
            $('.cgs').each(function() {
                sum += Number($(this).val());
            });
            $('#pm-cgs-total').val(sum);
        })

        // SKALA EARLY WARNING MEOWS & NEWS
        $('.skalameowst').change(function() {
            hitungSkalaEarlyMeowst()
        })

        $('.skalanewso').change(function() {
            hitungSkalaEarlyNewso()
        })

        $('#pm-bidan').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        jenis: 15,
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
        })

        $('#pm-dpjp').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
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
        })

    })

    function lihatFORM_KEP_98_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let action = 'lihat';
        entriPengkajianMaternal(layanan.id_pendaftaran, layanan.id, action);
    }

    function editFORM_KEP_98_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let action = 'edit';
        entriPengkajianMaternal(layanan.id_pendaftaran, layanan.id, action);
    }

    function tambahFORM_KEP_98_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let action = 'tambah';
        entriPengkajianMaternal(layanan.id_pendaftaran, layanan.id, action);
    }


    function entriPengkajianMaternal(id_pendaftaran, id_layanan_pendaftaran, action) {
        // $('#modal_pengkajian_maternal_rm').modal('show')
        $('#wizard-maternal').bwizard('show', '0')

        $('#btn_simpant').hide();

        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        var profesi = '<?= $this->session->userdata('profesi_nadis') ?>';
        if (groupAccount == 'Admin') {
            profesi = 'Perawat';
        }

        // yang lama
        // if (action !== 'lihat' && profesi == 'Dokter Umum' | profesi == 'Dokter Spesialis' | profesi == 'Bidan' | profesi == 'Perawat' | profesi == 'Fisioterapis' | profesi == 'Nutrisionis') {

        // terbaru
        if (action !== 'lihat') {
            $('#btn_simpant').show();
        } else {
            $('#btn_simpant').hide();
        }

        $.ajax({
            type: 'GET',
            url: '<?= base_url("pemeriksaan_igd/api/pemeriksaan_igd/get_data_pengkajian_maternal") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {
                resetFormPengkajianAwalIGD()
                $('#id_layanan_pendaftaran').val(id_layanan_pendaftaran)
                // $('#id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#id_pendaftaran').val(id_pendaftaran);

                if (data.pasien !== null) {
                    $('#id_pasien').val(data.pasien.id_pasien)
                    $('#pm-pasien-nama').text(data.pasien.nama)
                    $('#pm-pasien-no-rm').text(data.pasien.no_rm)
                    $('#pm-pasien-tanggal-lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'))
                    $('#pm-pasien-jenis-kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'))
                }

                if (data.maternal != null) {
                    showKajianMaternal(data.maternal)
                }

                $('#modal_pengkajian_maternal_rm').modal('show')
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                accessFailed(e.status)
            },
        })
    }

    // PIM +
    function showKajianMaternal(data) {
        $('#id_pengkajian_maternal').val(data.id)
        // $('#id_pengkajian_maternal').val(data.id)
        $('#pm-waktu-kajian').val(data.pm_waktu_kajian)
        $('#pm-waktu-bidan').val(data.pm_waktu_bidan)
        $('#pm-waktu-dpjp').val(data.pm_waktu_dpjp)
        if (data.pm_diperoleh === '1') {
            $('#pm-diperoleh-pasien').prop('checked', true).change()
        }
        if (data.pm_diperoleh === '2') {
            $('#pm-diperoleh-keluarga').prop('checked', true).change()
        }
        if (data.pm_diperoleh === '3') {
            $('#pm-diperoleh-lain').prop('checked', true).change()
        }
        $('#pm-diperoleh-sebutkan').val(data.pm_diperoleh_sebutkan)
        if (data.pm_cara_masuk === '1') {
            $('#pm-cara-masuk-jalan').prop('checked', true).change()
        }
        $('#pm-diperoleh-sebutkan').val(data.pm_diperoleh_sebutkan)
        if (data.pm_cara_masuk === '2') {
            $('#pm-cara-masuk-kursi').prop('checked', true).change()
        }
        if (data.pm_cara_masuk === '3') {
            $('#pm-cara-masuk-bantuan').prop('checked', true).change()
        }
        if (data.pm_cara_masuk === '4') {
            $('#pm-cara-masuk-Brangkar').prop('checked', true).change()
        }

        // PEMERIKSAAN KELUHAN UTAMA
        $('#pm-keluhan-utama').val(data.pm_keluhan_utama)

        if (data.pm_kontraksi === '1') {
            $('#pm-kontraksi').prop('checked', true).change()
            $('#pm-waktu-kontraksi').prop('disabled', false).change()
        }
        $('#pm-waktu-kontraksi').val(data.pm_waktu_kontraksi)

        if (data.pm_lendir === '1') {
            $('#pm-lendir').prop('checked', true).change()
            $('#pm-waktu-lendir').prop('disabled', false).change()
        }
        $('#pm-waktu-lendir').val(data.pm_waktu_lendir)

        if (data.pm_ketuban === '1') {
            $('#pm-ketuban').prop('checked', true).change()
            $('#pm-waktu-ketuban').prop('disabled', false).change()
            $('#pm-warna-ketuban').prop('disabled', false).change()
        }
        $('#pm-waktu-ketuban').val(data.pm_waktu_ketuban)
        $('#pm-warna-ketuban').val(data.pm_warna_ketuban)

        if (data.pm_darah === '1') {
            $('#pm-darah').prop('checked', true).change()
            $('#pm-darah-sebutkan').prop('disabled', false).change()
        }
        $('#pm-darah-sebutkan').val(data.pm_darah_sebutkan)

        if (data.pm_lainnya === '1') {
            $('#pm-lainnya').prop('checked', true).change()
            $('#pm-lainnya-sebutkan').prop('disabled', false).change()
        }
        $('#pm-lainnya-sebutkan').val(data.pm_lainnya_sebutkan)

        // RIWAYAT PENYAKIT SEKARANG
        if (data.pm_hamil_muda !== null) {
            $('#pm-hamil-muda-mual ').prop('checked', true)
        }
        if (data.pm_hamil_muda_muntah !== null) {
            $('#pm-hamil-muda-muntah ').prop('checked', true)
        }
        if (data.pm_hamil_muda_pendarahan !== null) {
            $('#pm-hamil-muda-pendarahan ').prop('checked', true)
        }
        if (data.pm_hamil_muda_lain !== null) {
            $('#pm-hamil-muda-lain ').prop('checked', true)
        }


        $('#pm-hamil-muda-sebutkan').val(data.pm_hamil_muda_sebutkan)

        if (data.pm_hamil_tua !== null) {
            $('#pm-hamil-tua-pusing ').prop('checked', true)
        }
        if (data.pm_hamil_tua_kepala !== null) {
            $('#pm-hamil-tua-sakit-kepala').prop('checked', true)
        }
        if (data.pm_hamil_tua_pendarahan !== null) {
            $('#pm-hamil-tua-pendarahan ').prop('checked', true)
        }
        if (data.pm_hamil_tua_lain !== null) {
            $('#pm-hamil-tua-lain ').prop('checked', true)
        }

        $('#pm-hamil-tua-sebutkan').val(data.pm_hamil_tua_sebutkan)

        $('#pm-anc-x').val(data.pm_anc_x)
        $('#pm-anc-lokasi').val(data.pm_anc_lokasi)

        if (data.pm_anc !== null) {
            $('#pm-anc-teratur ').prop('checked', true)
        }
        if (data.pm_anc_tidak_teratur !== null) {
            $('#pm-anc-tidak-teratur').prop('checked', true)
        }
        if (data.pm_anc_imunisasi !== null) {
            $('#pm-anc-imunisasi').prop('checked', true)
        }

        // RIWAYAT KEHAMILAN PERSALINAN DAN NIFAS YANG LALU
        $('#pm-nifas-g').val(data.pm_nifas_g)
        $('#pm-nifas-p').val(data.pm_nifas_p)
        $('#pm-nifas-a').val(data.pm_nifas_a)
        $('#pm-nifas-hidup').val(data.pm_nifas_hidup)

        $('#pm-waktu-partus-1').val(data.pm_waktu_partus_1)
        $('#pm-tempat-partus-1').val(data.pm_tempat_partus_1)
        $('#pm-umur-hamil-1').val(data.pm_umur_hamil_1)
        $('#pm-jenis-persalinan-1').val(data.pm_jenis_persalinan_1)
        $('#pm-penolong-persalinan-1').val(data.pm_penolong_persalinan_1)
        $('#pm-penyulit-1').val(data.pm_penyulit_1)
        $('#pm-nifas-1').val(data.pm_nifas_1)
        $('#pm-kelamin-1').val(data.pm_kelamin_1)
        $('#pm-keadaan-1').val(data.pm_keadaan_1)

        $('#pm-waktu-partus-2').val(data.pm_waktu_partus_2)
        $('#pm-tempat-partus-2').val(data.pm_tempat_partus_2)
        $('#pm-umur-hamil-2').val(data.pm_umur_hamil_2)
        $('#pm-jenis-persalinan-2').val(data.pm_jenis_persalinan_2)
        $('#pm-penolong-persalinan-2').val(data.pm_penolong_persalinan_2)
        $('#pm-penyulit-2').val(data.pm_penyulit_2)
        $('#pm-nifas-2').val(data.pm_nifas_2)
        $('#pm-kelamin-2').val(data.pm_kelamin_2)
        $('#pm-keadaan-2').val(data.pm_keadaan_2)

        $('#pm-waktu-partus-3').val(data.pm_waktu_partus_3)
        $('#pm-tempat-partus-3').val(data.pm_tempat_partus_3)
        $('#pm-umur-hamil-3').val(data.pm_umur_hamil_3)
        $('#pm-jenis-persalinan-3').val(data.pm_jenis_persalinan_3)
        $('#pm-penolong-persalinan-3').val(data.pm_penolong_persalinan_3)
        $('#pm-penyulit-3').val(data.pm_penyulit_3)
        $('#pm-nifas-3').val(data.pm_nifas_3)
        $('#pm-kelamin-3').val(data.pm_kelamin_3)
        $('#pm-keadaan-3').val(data.pm_keadaan_3)

        $('#pm-waktu-partus-4').val(data.pm_waktu_partus_4)
        $('#pm-tempat-partus-4').val(data.pm_tempat_partus_4)
        $('#pm-umur-hamil-4').val(data.pm_umur_hamil_4)
        $('#pm-jenis-persalinan-4').val(data.pm_jenis_persalinan_4)
        $('#pm-penolong-persalinan-4').val(data.pm_penolong_persalinan_4)
        $('#pm-penyulit-4').val(data.pm_penyulit_4)
        $('#pm-nifas-4').val(data.pm_nifas_4)
        $('#pm-kelamin-4').val(data.pm_kelamin_4)
        $('#pm-keadaan-4').val(data.pm_keadaan_4)

        $('#pm-waktu-partus-5').val(data.pm_waktu_partus_5)
        $('#pm-tempat-partus-5').val(data.pm_tempat_partus_5)
        $('#pm-umur-hamil-5').val(data.pm_umur_hamil_5)
        $('#pm-jenis-persalinan-5').val(data.pm_jenis_persalinan_5)
        $('#pm-penolong-persalinan-5').val(data.pm_penolong_persalinan_5)
        $('#pm-penyulit-5').val(data.pm_penyulit_5)
        $('#pm-nifas-5').val(data.pm_nifas_5)
        $('#pm-kelamin-5').val(data.pm_kelamin_5)
        $('#pm-keadaan-5').val(data.pm_keadaan_5)

        $('#pm-waktu-partus-6').val(data.pm_waktu_partus_6)
        $('#pm-tempat-partus-6').val(data.pm_tempat_partus_6)
        $('#pm-umur-hamil-6').val(data.pm_umur_hamil_6)
        $('#pm-jenis-persalinan-6').val(data.pm_jenis_persalinan_6)
        $('#pm-penolong-persalinan-6').val(data.pm_penolong_persalinan_6)
        $('#pm-penyulit-6').val(data.pm_penyulit_6)
        $('#pm-nifas-6').val(data.pm_nifas_6)
        $('#pm-kelamin-6').val(data.pm_kelamin_6)
        $('#pm-keadaan-6').val(data.pm_keadaan_6)

        // RIWAYAT MENSTRUASI
        if (data.pm_umur_menarche === '1') {
            $('#pm-umur-menarche').prop('checked', true).change()
            $('#pm-umur-menarche-sebutkan').prop('disabled', false).change()
            $('#pm-lama-haid').prop('disabled', false).change()
            $('#pm-pembalut').prop('disabled', false).change()
        }
        $('#pm-umur-menarche-sebutkan').val(data.pm_umur_menarche_sebutkan)
        $('#pm-lama-haid').val(data.pm_lama_haid)
        $('#pm-pembalut').val(data.pm_pembalut)
        if (data.pm_dismenorroe === '1') {
            $('#pm-dismenorroe').prop('checked', true).change()
        }
        if (data.pm_spoting === '1') {
            $('#pm-spoting').prop('checked', true).change()
        }
        if (data.pm_menorrhagia === '1') {
            $('#pm-menorrhagia').prop('checked', true).change()
        }
        if (data.pmm_metrorhagia === '1') {
            $('#pmm-metrorhagia').prop('checked', true).change()
        }
        if (data.pm_menstrual === '1') {
            $('#pm-menstrual').prop('checked', true).change()
        }
        $('#pm-hpht').val(data.pm_hpht)
        $('#pm-taksiran').val(data.pm_taksiran)
        if (data.pm_asma === '1') {
            $('#pm-asma').prop('checked', true).change()
        }
        if (data.pm_hipertensi === '1') {
            $('#pm-hipertensi').prop('checked', true).change()
        }
        if (data.pm_jantung === '1') {
            $('#pm-jantung').prop('checked', true).change()
        }
        if (data.pm_diabetes === '1') {
            $('#pm-diabetes').prop('checked', true).change()
        }
        if (data.pm_penyakit_lain === '1') {
            $('#pm-penyakit-lain').prop('checked', true).change()
            $('#pm-penyakit-sebutkan').prop('disabled', false).change()
        }
        $('#pm-penyakit-sebutkan').val(data.pm_penyakit_lain_sebutkan)
        if (data.pm_kesadaran === '1') {
            $('#pm-kesadaran-cm').prop('checked', true).change()
        }
        if (data.pm_kesadaran === '2') {
            $('#pm-kesadaran-apatis').prop('checked', true).change()
        }
        if (data.pm_kesadaran === '3') {
            $('#pm-kesadaran-samnolen').prop('checked', true).change()
        }
        if (data.pm_kesadaran === '4') {
            $('#pm-kesadaran-sopor').prop('checked', true).change()
        }
        if (data.pm_kesadaran === '5') {
            $('#pm-kesadaran-koma').prop('checked', true).change()
        }
        $('#pm-sistolik').val(data.pm_sistolik)
        $('#pm-suhu-sistolik').val(data.pm_suhu_sistolik)
        $('#pm-diastolik').val(data.pm_diastolik)
        // $('#pm-suhu-diastolik').val(data.pm_suhu_diastolik)
        $('#pm-cgs-e').val(data.pm_cgs_e)
        $('#pm-cgs-m').val(data.pm_cgs_m)
        $('#pm-cgs-v').val(data.pm_cgs_v)
        $('#pm-cgs-total').val(data.pm_cgs_total)
        $('#pm-spo2').val(data.pm_spo2)
        $('#pm-frekuensi-nadi').val(data.pm_frekuensi_nadi)
        $('#pm-frekuensi-nafas').val(data.pm_frekuensi_nafas)

        // PEMERIKSAAN KEBIDANAN DAN KANDUNGAN
        if (data.pm_membesar === '1') {
            $('#pm-membesar').prop('checked', true).change()
        }
        if (data.pm_melebar === '1') {
            $('#pm-melebar').prop('checked', true).change()
        }
        if (data.pm_pelebaran === '1') {
            $('#pm-pelebaran').prop('checked', true).change()
        }
        if (data.pm_linea_alba === '1') {
            $('#pm-linea-alba').prop('checked', true).change()
        }
        if (data.pm_linea_nigra === '1') {
            $('#pm-linea-nigra').prop('checked', true).change()
        }
        if (data.pm_striae_livide === '1') {
            $('#pm-striae-livide').prop('checked', true).change()
        }
        if (data.pm_striae_albican === '1') {
            $('#pm-striae-albican').prop('checked', true).change()
        }
        if (data.pm_luka === '1') {
            $('#pm-luka').prop('checked', true).change()
        }
        if (data.pm_luka_lain === '1') {
            $('#pm-luka-lain').prop('checked', true).change()
            $('#pm-luka-sebutkan').prop('disabled', false).change()
        }
        $('#pm-luka-sebutkan').val(data.pm_luka_lain_sebutkan)
        $('#pm-tfu').val(data.pm_tfu)

        if (data.pm_leopold_1 !== null) {
            $('#pm-leopold-1-kepala').prop('checked', true)
        }
        if (data.pm_leopold_bokong !== null) {
            $('#pm-leopold-1-bokong').prop('checked', true)
        }
        if (data.pm_leopold_lain !== null) {
            $('#pm-leopold-1-lain').prop('checked', true)
        }

        $('#pm-leopold-1-sebutkan').val(data.pm_leopold_1_sebutkan)

        if (data.pm_leopold_2 !== null) {
            $('#pm-leopold-2-punggung-kanan').prop('checked', true)
        }
        if (data.pm_leopold_punggung !== null) {
            $('#pm-leopold-2-punggung-kiri').prop('checked', true)
        }
        if (data.pm_leopold_lainn !== null) {
            $('#pm-leopold-2-lain').prop('checked', true)
        }

        $('#pm-leopold-2-sebutkan').val(data.pm_leopold_2_sebutkan)

        if (data.pm_leopold_3 !== null) {
            $('#pm-leopold-3-kepala').prop('checked', true)
        }
        if (data.pm_leopold_bokonggg !== null) {
            $('#pm-leopold-3-bokong').prop('checked', true)
        }
        if (data.pm_leopold_lainnn !== null) {
            $('#pm-leopold-3-lain').prop('checked', true)
        }

        $('#pm-leopold-3-sebutkan').val(data.pm_leopold_3_sebutkan)

        if (data.pm_leopold_4 !== null) {
            $('#pm-leopold-4-kepala').prop('checked', true)
        }
        if (data.pm_leopold_bokongggg !== null) {
            $('#pm-leopold-4-bokong').prop('checked', true)
        }

        $('#pm-janin-masuk').val(data.pm_janin_masuk)
        $('#pm-taksiran-janin').val(data.pm_taksiran_janin)
        $('#pm-djj-x').val(data.pm_djj_x)
        if (data.pm_djj === '1') {
            $('#pm-djj-teratur').prop('checked', true).change()
        }
        if (data.pm_djj === '2') {
            $('#pm-djj-tidak-teratur').prop('checked', true).change()
        }
        if (data.pm_djj === '3') {
            $('#pm-djj-tidak-terdengar').prop('checked', true).change()
        }
        $('#pm-gerak-janin').val(data.pm_gerak_janin)
        $('#pm-his-x').val(data.pm_his_x)
        $('#pm-his-detik').val(data.pm_his_detik)
        $('#pm-his-kekuatan').val(data.pm_his_kekuatan)
        if (data.pm_vulva === '1') {
            $('#pm-vulva-normal').prop('checked', true).change()
        }
        if (data.pm_vulva === '2') {
            $('#pm-vulva-lain').prop('checked', true).change()
            $('#pm-vulva-sebutkan').prop('disabled', false).change()
        }
        $('#pm-vulva-sebutkan').val(data.pm_vulva_sebutkan)
        if (data.pm_pengeluaran_lendir === '1') {
            $('#pm-pengeluaran-lendir').prop('checked', true).change()
        }
        if (data.pm_pengeluaran_ketuban === '1') {
            $('#pm-pengeluaran-ketuban').prop('checked', true).change()
            $('#pm-pengeluaran-ketuban-warna').prop('disabled', false).change()
        }
        $('#pm-pengeluaran-ketuban-warna').val(data.pm_pengeluaran_ketuban_warna)
        if (data.pm_pengeluaran_flex === '1') {
            $('#pm-pengeluaran-flex').prop('checked', true).change()
        }
        if (data.pm_pengeluaran_darah === '1') {
            $('#pm-pengeluaran-darah').prop('checked', true).change()
            $('#pm-pengeluaran-darah-sebanyak').prop('disabled', false).change()
        }
        $('#pm-pengeluaran-darah-sebanyak').val(data.pm_pengeluaran_darah_sebanyak)
        if (data.pm_pengeluaran_lain === '1') {
            $('#pm-pengeluaran-lain').prop('checked', true).change()
            $('#pm-pengeluaran-sebutkan').prop('disabled', false).change()
        }
        $('#pm-pengeluaran-sebutkan').val(data.pm_pengeluaran_lain_sebutkan)
        if (data.pm_introitus === '1') {
            $('#pm-introitus-benjolan').prop('checked', true).change()
        }
        if (data.pm_introitus === '2') {
            $('#pm-introitus-lain').prop('checked', true).change()
            $('#pm-introitus-sebutkan').prop('disabled', false).change()
        }
        $('#pm-introitus-sebutkan').val(data.pm_introitus_sebutkan)
        if (data.pm_porsio === '1') {
            $('#pm-porsio-benjolan').prop('checked', true).change()
        }
        if (data.pm_porsio === '2') {
            $('#pm-porsio-lain').prop('checked', true).change()
            $('#pm-porsio-sebutkan').prop('disabled', false).change()
        }



        $('#pm-porsio-sebutkan').val(data.pm_porsio_sebutkan)
        $('#pm-pembukaan').val(data.pm_pembukaan)



        if (data.pm_pembukaan_ketuban === '0') {
            $('#pm-pembukaan-utuh').prop('checked', true).change()
        }
        if (data.pm_pembukaan_ketuban === '1') {
            $('#pm-pembukaan-pecah').prop('checked', true).change()
            $('#pm-pembukaan-ketuban-warna').prop('disabled', false).change()
        }
        $('#pm-pembukaan-ketuban-warna').val(data.pm_pembukaan_ketuban_warna)
        $('#pm-hodge').val(data.pm_hodge)
        $('#pm-uuk').val(data.pm_uuk)
        $('#pm-moulage').val(data.pm_moulage)
        if (data.pm_nyeri_porsio === '1') {
            $('#pm-nyeri-ya').prop('checked', true).change()
        }
        if (data.pm_nyeri_porsio === '2') {
            $('#pm-nyeri-tidak').prop('checked', true).change()
        }

        // PENILAIAN RESIKO JATUH
        if (data.pm_jatuh === '25') {
            $('#pm-jatuh-ya').prop('checked', true).change()
        }
        if (data.pm_jatuh === '0') {
            $('#pm-jatuh-tidak').prop('checked', true).change()
        }
        if (data.pm_diagnosis === '15') {
            $('#pm-diagnosis-ya').prop('checked', true).change()
        }
        if (data.pm_diagnosis === '0') {
            $('#pm-diagnosis-tidak').prop('checked', true).change()
        }
        if (data.pm_kursi_roda === '1') {
            $('#pm-kursi-roda').prop('checked', true).change()
            $('#pm-kursi-roda-ya').prop('disabled', false).change()
        }
        if (data.pm_kursi_roda_ya === '0') {
            $('#pm-kursi-roda-ya').prop('checked', true).change()
        }
        if (data.pm_kruk === '1') {
            $('#pm-kruk').prop('checked', true).change()
            $('#pm-kruk-ya').prop('disabled', false).change()
        }
        if (data.pm_kruk_ya === '15') {
            $('#pm-kruk-ya').prop('checked', true).change()
        }
        if (data.pm_pegangan === '1') {
            $('#pm-pegangan').prop('checked', true).change()
            $('#pm-pegangan-ya').prop('disabled', false).change()
        }
        if (data.pm_pegangan_ya === '30') {
            $('#pm-pegangan-ya').prop('checked', true).change()
        }
        if (data.pm_heparin === '20') {
            $('#pm-heparin-ya').prop('checked', true).change()
        }
        if (data.pm_heparin === '0') {
            $('#pm-heparin-tidak').prop('checked', true).change()
        }
        if (data.pm_imobilisasi === '1') {
            $('#pm-imobilisasi').prop('checked', true).change()
            $('#pm-imobilisasi-ya').prop('disabled', false).change()
        }
        if (data.pm_imobilisasi_ya === '0') {
            $('#pm-imobilisasi-ya').prop('checked', true).change()
        }
        if (data.pm_lemah === '1') {
            $('#pm-lemah').prop('checked', true).change()
            $('#pm-lemah-ya').prop('disabled', false).change()
        }
        if (data.pm_lemah_ya === '10') {
            $('#pm-lemah-ya').prop('checked', true).change()
        }
        if (data.pm_terganggu === '1') {
            $('#pm-terganggu').prop('checked', true).change()
            $('#pm-terganggu-ya').prop('disabled', false).change()
        }
        if (data.pm_terganggu_ya === '20') {
            $('#pm-terganggu-ya').prop('checked', true).change()
        }
        if (data.pm_kemampuan === '1') {
            $('#pm-kemampuan').prop('checked', true).change()
            $('#pm-kemampuan-ya').prop('disabled', false).change()
        }
        if (data.pm_kemampuan_ya === '0') {
            $('#pm-kemampuan-ya').prop('checked', true).change()
        }
        if (data.pm_lupa === '1') {
            $('#pm-lupa').prop('checked', true).change()
            $('#pm-lupa-ya').prop('disabled', false).change()
        }
        if (data.pm_lupa_ya === '15') {
            $('#pm-lupa-ya').prop('checked', true).change()
        }
        $('#pm-jumlah-skor').val(data.pm_jumlah_skor)

        // PENILAIAN TINGKAT NYERI
        $('#pm-skala-nyeri').val(data.pm_skala_nyeri)
        $('#pm-kualitas-nyeri').val(data.pm_kualitas_nyeri)
        $('#pm-frekuensi-nyeri').val(data.pm_frekuensi_nyeri)
        $('#pm-pemberat-nyeri').val(data.pm_pemberat_nyeri)
        $('#pm-lama-nyeri').val(data.pm_lama_nyeri)
        $('#pm-pengurang-nyeri').val(data.pm_pengurang_nyeri)

        // RIWAYAT ALERGI
        if (data.pm_alergi === '1') {
            $('#pm-alergi-tidak').prop('checked', true).change()
        }
        if (data.pm_alergi === '2') {
            $('#pm-alergi-tidak-tahu').prop('checked', true).change()
        }
        if (data.pm_alergi === '3') {
            $('#pm-alergi-ya').prop('checked', true).change()
        }
        $('#pm-alergi-obat').val(data.pm_alergi_obat)
        $('#pm-alergi-obat-reaksi').val(data.pm_alergi_obat_reaksi)
        $('#pm-alergi-makan').val(data.pm_alergi_makan)
        $('#pm-alergi-makan-reaksi').val(data.pm_alergi_makan_reaksi)
        $('#pm-alergi-lain').val(data.pm_alergi_lain)
        $('#pm-alergi-lain-reaksi').val(data.pm_alergi_lain_reaksi)
        $('#pm-alergi-obat-konsumsi').val(data.pm_alergi_obat_konsumsi)

        // STATUS NUTRISI
        if (data.pm_berat_badan === '1') {
            $('#pm-berat-badan-tidak').prop('checked', true).change()
        }
        if (data.pm_berat_badan === '2') {
            $('#pm-berat-badan-ya').prop('checked', true).change()
        }
        $('#pm-berat-badan-kg').val(data.pm_berat_badan_kg)

        if (data.pm_berat_badan_t !== null) {
            $('#pm-berat-badan-lain ').prop('checked', true)
        }

        $('#pm-berat-badan-sebutkan').val(data.pm_berat_badan_sebutkan)

        // STATUS FUNGSIONAL
        if (data.pm_fungsional === '1') {
            $('#pm-fungsional-mandiri').prop('checked', true).change()
        }
        if (data.pm_fungsional === '2') {
            $('#pm-fungsional-bantuan').prop('checked', true).change()
        }
        if (data.pm_fungsional === '3') {
            $('#pm-fungsional-ketergantungan').prop('checked', true).change()
        }
        $('#pm-fungsional-sebutkan').val(data.pm_fungsional_sebutkan)

        // PSIKOSOSIAL EKONOMI
        if (data.pm_psikologis === '1') {
            $('#pm-psikologis-cemas').prop('checked', true).change()
        }
        if (data.pm_psikologis === '2') {
            $('#pm-psikologis-takut').prop('checked', true).change()
        }
        if (data.pm_psikologis === '3') {
            $('#pm-psikologis-marah').prop('checked', true).change()
        }
        if (data.pm_psikologis === '4') {
            $('#pm-psikologis-sedih').prop('checked', true).change()
        }
        if (data.pm_psikologis === '5') {
            $('#pm-psikologis-bunuh').prop('checked', true).change()
        }
        if (data.pm_psikologis === '6') {
            $('#pm-psikologis-lain').prop('checked', true).change()
        }
        $('#pm-psikologis-sebutkan').val(data.pm_psikologis_sebutkan)
        if (data.pm_mental === '1') {
            $('#pm-mental-sadar').prop('checked', true).change()
        }
        if (data.pm_mental === '2') {
            $('#pm-mental-masalah').prop('checked', true).change()
        }
        $('#pm-mental-sebutkan').val(data.pm_mental_sebutkan)
        if (data.pm_mental === '3') {
            $('#pm-mental-kekerasan').prop('checked', true).change()
        }
        if (data.pm_pekerjaan === '1') {
            $('#pm-pekerjaan-wiraswasta').prop('checked', true).change()
        }
        if (data.pm_pekerjaan === '2') {
            $('#pm-pekerjaan-pegawai-swasta').prop('checked', true).change()
        }
        if (data.pm_pekerjaan === '3') {
            $('#pm-pekerjaan-pns').prop('checked', true).change()
        }
        if (data.pm_pekerjaan === '4') {
            $('#pm-pekerjaan-pensiunan').prop('checked', true).change()
        }
        if (data.pm_pekerjaan === '5') {
            $('#pm-pekerjaan-pengangguran').prop('checked', true).change()
        }
        if (data.pm_bayar === '1') {
            $('#pm-bayar-sendiri').prop('checked', true).change()
        }
        if (data.pm_bayar === '2') {
            $('#pm-bayar-bpjs').prop('checked', true).change()
        }
        if (data.pm_bayar === '3') {
            $('#pm-bayar-pns').prop('checked', true).change()
        }
        $('#pm-bayar-asuransi').val(data.pm_bayar_asuransi_sebutkan)

        if (data.pm_bayar_t !== null) {
            $('#pm-bayar-lain ').prop('checked', true)
        }

        $('#pm-bayar-sebutkan').val(data.pm_bayar_sebutkan)

        // PENGKAJIAN SPIRITUAL
        $('#pm-keagamaan').val(data.pm_keagamaan)
        if (data.pm_ibadah === '1') {
            $('#pm-ibadah-baligh').prop('checked', true).change()
        }
        if (data.pm_ibadah === '2') {
            $('#pm-ibadah-belum').prop('checked', true).change()
        }
        if (data.pm_ibadah === '3') {
            $('#pm-ibadah-lain').prop('checked', true).change()
        }
        $('#pm-ibadah-sebutkan').val(data.pm_ibadah_sebutkan)
        if (data.pm_thaharoh === '1') {
            $('#pm-thaharoh-wudhu').prop('checked', true).change()
        }
        if (data.pm_thaharoh === '2') {
            $('#pm-thaharoh-tayamum').prop('checked', true).change()
        }
        if (data.pm_sholat === '1') {
            $('#pm-sholat-berdiri').prop('checked', true).change()
        }
        if (data.pm_sholat === '2') {
            $('#pm-sholat-duduk').prop('checked', true).change()
        }
        if (data.pm_sholat === '3') {
            $('#pm-sholat-berbaring').prop('checked', true).change()
        }

        // KEBUTUHAN BIOLOGIS
        $('#pm-banyak-makan').val(data.pm_banyak_makan)
        $('#pm-waktu-makan').val(data.pm_waktu_makan)
        $('#pm-banyak-minum').val(data.pm_banyak_minum)
        $('#pm-waktu-minum').val(data.pm_waktu_minum)
        $('#pm-banyak-bak').val(data.pm_banyak_bak)
        $('#pm-waktu-bak').val(data.pm_waktu_bak)
        $('#pm-banyak-bab').val(data.pm_banyak_bab)
        $('#pm-waktu-bab').val(data.pm_waktu_bab)
        $('#pm-sex').val(data.pm_sex)

        // SKALA EARLY WARNING SYSTEM (EWS)
        if (data.sews_respirasit == '3_1') {
            $('#skalameowst-1-1').prop('checked', true).change()
        }
        if (data.sews_respirasit == '0_2') {
            $('#skalameowst-1-2').prop('checked', true).change()
        }
        if (data.sews_respirasit == '2_3') {
            $('#skalameowst-1-3').prop('checked', true).change()
        }
        if (data.sews_respirasit == '3_4') {
            $('#skalameowst-1-4').prop('checked', true).change()
        }
        if (data.sews_saturasit == '3_1') {
            $('#skalameowst-2-1').prop('checked', true).change()
        }
        if (data.sews_saturasit == '2_2') {
            $('#skalameowst-2-2').prop('checked', true).change()
        }
        if (data.sews_saturasit == '0_3') {
            $('#skalameowst-2-3').prop('checked', true).change()
        }
        if (data.sews_o2t == '2_1') {
            $('#skalameowst-3-1').prop('checked', true).change()
        }
        if (data.sews_o2t == '0_2') {
            $('#skalameowst-3-2').prop('checked', true).change()
        }
        if (data.sews_suhut == '3_1') {
            $('#skalameowst-4-1').prop('checked', true).change()
        }
        if (data.sews_suhut == '0_2') {
            $('#skalameowst-4-2').prop('checked', true).change()
        }
        if (data.sews_suhut == '2_3') {
            $('#skalameowst-4-3').prop('checked', true).change()
        }
        if (data.sews_suhut == '3_4') {
            $('#skalameowst-4-4').prop('checked', true).change()
        }
        if (data.sews_td_sintolikt == '3_1') {
            $('#skalameowst-5-1').prop('checked', true).change()
        }
        if (data.sews_td_sintolikt == '0_2') {
            $('#skalameowst-5-2').prop('checked', true).change()
        }
        if (data.sews_td_sintolikt == '1_3') {
            $('#skalameowst-5-3').prop('checked', true).change()
        }
        if (data.sews_td_sintolikt == '2_4') {
            $('#skalameowst-5-4').prop('checked', true).change()
        }
        if (data.sews_td_sintolikt == '3_5') {
            $('#skalameowst-5-5').prop('checked', true).change()
        }
        if (data.sews_td_diastolikt == '0_1') {
            $('#skalameowst-6-1').prop('checked', true).change()
        }
        if (data.sews_td_diastolikt == '1_2') {
            $('#skalameowst-6-2').prop('checked', true).change()
        }
        if (data.sews_td_diastolikt == '2_3') {
            $('#skalameowst-6-3').prop('checked', true).change()
        }
        if (data.sews_td_diastolikt == '3_4') {
            $('#skalameowst-6-4').prop('checked', true).change()
        }
        if (data.sews_nadit == '3_1') {
            $('#skalameowst-7-1').prop('checked', true).change()
        }
        if (data.sews_nadit == '2_2') {
            $('#skalameowst-7-2').prop('checked', true).change()
        }
        if (data.sews_nadit == '0_3') {
            $('#skalameowst-7-3').prop('checked', true).change()
        }
        if (data.sews_nadit == '1_4') {
            $('#skalameowst-7-4').prop('checked', true).change()
        }
        if (data.sews_nadit == '2_5') {
            $('#skalameowst-7-5').prop('checked', true).change()
        }
        if (data.sews_nadit == '3_6') {
            $('#skalameowst-7-6').prop('checked', true).change()
        }
        if (data.sews_kesadarant == '0_1') {
            $('#skalameowst-8-1').prop('checked', true).change()
        }
        if (data.sews_kesadarant == '3_2') {
            $('#skalameowst-8-2').prop('checked', true).change()
        }
        if (data.sews_nyerit == '0_1') {}
        if (data.sews_nyerit == '3_2') {
            $('#skalameowst-9-2').prop('checked', true).change()
        }
        if (data.sews_pengeluwarant == '0_1') {
            $('#skalameowst-10-1').prop('checked', true).change()
        }
        if (data.sews_pengeluwarant == '3_2') {
            $('#skalameowst-10-2').prop('checked', true).change()
        }
        if (data.sews_proteint == '2_1') {
            $('#skalameowst-11-1').prop('checked', true).change()
        }
        if (data.sews_proteint == '3_2') {
            $('#skalameowst-11-2').prop('checked', true).change()
        }
        if (data.pm_meows === 'Putih') {
            $('#total-skalameowst-1').prop('checked', true).change()
        }
        if (data.pm_meows === 'Hijau') {
            $('#total-skalameowst-2').prop('checked', true).change()
        }
        if (data.pm_meows === 'Kuning') {
            $('#total-skalameowst-3').prop('checked', true).change()
        }
        if (data.pm_meows === 'Merah') {
            $('#total-skalameowst-4').prop('checked', true).change()
        }

        //  MEOWS
        var skala_early = [data.sews_respirasit, data.sews_saturasit, data.sews_o2t, data
            .sews_suhut, data.sews_td_sintolikt, data.sews_td_diastolikt, data.sews_nadit, data
            .sews_kesadarant, data.sews_nyerit, data.sews_pengeluwarant, data.sews_proteint
        ];
        for (let i = 0; i <= skala_early.length; i++) {
            for (let j = 1; j <= 8; j++) {
                var z = i + 1;
                if (skala_early[i] === $('#skalameowst-' + z + '-' + j).val()) {
                    $('#skalameowst-' + z + '-' + j).prop('checked', true).change()
                }
            }
        }

        // NEWS
        if (data.sews_laju_respirasio == '3_1') {
            $('#skalanewso-1-1').prop('checked', true).change()
        }
        if (data.sews_laju_respirasio == '1_2') {
            $('#skalanewso-1-2').prop('checked', true).change()
        }
        if (data.sews_laju_respirasio == '0_3') {
            $('#skalanewso-1-3').prop('checked', true).change()
        }
        if (data.sews_laju_respirasio == '2_4') {
            $('#skalanewso-1-4').prop('checked', true).change()
        }
        if (data.sews_laju_respirasio == '3_5') {
            $('#skalanewso-1-5').prop('checked', true).change()
        }
        if (data.sews_laju_respirasio == 'bk_6') {
            $('#skalanewso-1-6').prop('checked', true).change()
        }
        if (data.sews_saturasio == '3_1') {
            $('#skalanewso-2-1').prop('checked', true).change()
        }
        if (data.sews_saturasio == '2_2') {
            $('#skalanewso-2-2').prop('checked', true).change()
        }
        if (data.sews_saturasio == '1_3') {
            $('#skalanewso-2-3').prop('checked', true).change()
        }
        if (data.sews_saturasio == '0_4') {
            $('#skalanewso-2-4').prop('checked', true).change()
        }
        if (data.sews_suplemeno == '2_1') {
            $('#skalanewso-3-1').prop('checked', true).change()
        }
        if (data.sews_suplemeno == '0_2') {
            $('#skalanewso-3-2').prop('checked', true).change()
        }
        if (data.sews_temperaturo == '3_1') {
            $('#skalanewso-4-1').prop('checked', true).change()
        }
        if (data.sews_temperaturo == '1_2') {
            $('#skalanewso-4-2').prop('checked', true).change()
        }
        if (data.sews_temperaturo == '0_3') {
            $('#skalanewso-4-3').prop('checked', true).change()
        }
        if (data.sews_temperaturo == '1_4') {
            $('#skalanewso-4-4').prop('checked', true).change()
        }
        if (data.sews_temperaturo == '2_5') {
            $('#skalanewso-4-5').prop('checked', true).change()
        }
        if (data.sews_tdso == '3_1') {
            $('#skalanewso-5-1').prop('checked', true).change()
        }
        if (data.sews_tdso == '1_2') {
            $('#skalanewso-5-2').prop('checked', true).change()
        }
        if (data.sews_tdso == '0_3') {
            $('#skalanewso-5-3').prop('checked', true).change()
        }
        if (data.sews_tdso == '1_4') {
            $('#skalanewso-5-4').prop('checked', true).change()
        }
        if (data.sews_tdso == '2_5') {
            $('#skalanewso-5-5').prop('checked', true).change()
        }
        if (data.sews_tdso == '3_6') {
            $('#skalanewso-5-6').prop('checked', true).change()
        }
        if (data.sews_tdso == 'bk_7') {
            $('#skalanewso-5-7').prop('checked', true).change()
        }
        if (data.sews_laju_jantungo == '3_1') {
            $('#skalanewso-6-1').prop('checked', true).change()
        }
        if (data.sews_laju_jantungo == '0_2') {
            $('#skalanewso-6-2').prop('checked', true).change()
        }
        if (data.sews_laju_jantungo == '1_3') {
            $('#skalanewso-6-3').prop('checked', true).change()
        }
        if (data.sews_laju_jantungo == '2_4') {
            $('#skalanewso-6-4').prop('checked', true).change()
        }
        if (data.sews_laju_jantungo == '3_5') {
            $('#skalanewso-6-5').prop('checked', true).change()
        }
        if (data.sews_laju_jantungo == 'bk_6') {
            $('#skalanewso-6-6').prop('checked', true).change()
        }
        if (data.sews_kesadarano == '0_1') {
            $('#skalanewso-7-1').prop('checked', true).change()
        }
        if (data.sews_kesadarano == '3_2') {
            $('#skalanewso-7-2').prop('checked', true).change()
        }
        if (data.sews_kesadarano == 'bk_3') {
            $('#skalanewso-7-3').prop('checked', true).change()
        }
        if (data.pm_news === 'Putih') {
            $('#total-skalanewso-1').prop('checked', true).change()
        }
        if (data.pm_news === 'Hijau') {
            $('#total-skalanewso-2').prop('checked', true).change()
        }
        if (data.pm_news === 'Kuning') {
            $('#total-skalanewso-3').prop('checked', true).change()
        }
        if (data.pm_news === 'Merah') {
            $('#total-skalanewso-4').prop('checked', true).change()
        }


        // NEWS
        var skala_early = [data.sews_laju_respirasio, data.sews_saturasio, data.sews_suplemeno, data
            .sews_temperaturo, data.sews_tdso, data.sews_laju_jantungo, data.sews_kesadarano
        ];
        for (let i = 0; i <= skala_early.length; i++) {
            for (let j = 1; j <= 8; j++) {
                var z = i + 1;
                if (skala_early[i] === $('#skalanewso-' + z + '-' + j).val()) {
                    $('#skalanewso-' + z + '-' + j).prop('checked', true).change()
                }
            }
        }

        // DATA PENUNJANG
        $('#pm-tanggal-lab').val(data.pm_tanggal_lab)
        $('#pm-hasil-lab').val(data.pm_hasil_lab)
        $('#pm-tanggal-cgt').val(data.pm_tanggal_cgt)
        $('#pm-hasil-cgt').val(data.pm_hasil_cgt)
        $('#pm-penunjang-lain').val(data.pm_penunjang_lain)

        // ASSESMEN KEBIDANAN
        if (data.pm_infeksi === '1') {
            $('#pm-infeksi').prop('checked', true).change()
        }
        if (data.pm_pendarahan === '1') {
            $('#pm-pendarahan').prop('checked', true).change()
        }
        if (data.pm_nausea === '1') {
            $('#pm-nausea').prop('checked', true).change()
        }
        if (data.pm_gawat_jalan === '1') {
            $('#pm-gawat-jalan').prop('checked', true).change()
        }
        if (data.pm_anxietas === '1') {
            $('#pm-anxietas').prop('checked', true).change()
        }
        if (data.pm_nyeri_melahirkan === '1') {
            $('#pm-pm_nyeri_melahirkan').prop('checked', true).change()
        }
        if (data.pm_pola_nafas === '1') {
            $('#pm-pola-nafas').prop('checked', true).change()
        }
        if (data.pm_kebutuhan_lain === '1') {
            $('#pm-kebutuhan-lain').prop('checked', true).change()
        }
        $('#pm-kebutuhan-sebutkan').val(data.pm_kebutuhan_sebutkan)

        // RENCANA ASUHAN KEBIDANAN
        if (data.pm_asuhan_jelaskan === '1') {
            $('#pm-asuhan-jelaskan').prop('checked', true).change()
        }
        if (data.pm_asuhan_laporkan === '1') {
            $('#pm-asuhan-laporkan').prop('checked', true).change()
        }
        if (data.pm_asuhan_fasilitas === '1') {
            $('#pm-asuhan-fasilitas').prop('checked', true).change()
        }
        if (data.pm_asuhan_masalah === '1') {
            $('#pm-asuhan-masalah').prop('checked', true).change()
        }
        if (data.pm_asuhan_observasi === '1') {
            $('#pm-asuhan-observasi').prop('checked', true).change()
        }
        if (data.pm_asuhan_edukasi === '1') {
            $('#pm-asuhan-edukasi').prop('checked', true).change()
        }
        if (data.pm_asuhan_lain === '1') {
            $('#pm-asuhan-lain').prop('checked', true).change()
            $('#pm-asuhan-sebutkan').prop('disabled', false).change()
        }
        $('#pm-asuhan-sebutkan').val(data.pm_asuhan_sebutkan)


        if (data.pm_bidan !== null) {
            $('#pm-bidan').select2c('readonly', true)
        }
        $('#pm-bidan').val(data.pm_bidan)
        $('#s2id_pm-bidan a .select2c-chosen').html(data.nama_bidan)


        if (data.pm_dpjp !== null) {
            $('#pm-dpjp').select2c('readonly', true)
            $('#pm-dpjp').val(data.pm_dpjp)
            $('#s2id_pm-dpjp a .select2c-chosen').html(data.nama_dpjp)
        }


        // Bidan maternal signature
        if (data.pm_paraf_bidan === '1') {
            $('#pm-paraf-bidan').prop('checked', true)
            $('#pm-paraf-bidan').hide()
            $('#pm-paraf-bidan-verified').show()
        } else {
            $('#pm-paraf-bidan').prop('checked', false)
            $('#pm-paraf-bidan').show()
            $('#pm-paraf-bidan-verified').hide()
        }

        // DPJP maternal signature
        if (data.pm_paraf_dpjp === '1') {
            $('#pm-paraf-dpjp').prop('checked', true)
            $('#pm-paraf-dpjp').hide()
            $('#pm-paraf-dpjp-verified').show()
        } else {
            $('#pm-paraf-dpjp').prop('checked', false)
            $('#pm-paraf-dpjp').show()
            $('#pm-paraf-dpjp-verified').hide()
        }
    }

    function hitungSkoreMaternal() {
        var score = 0;
        $("input[name='pm_jatuh']:checked").each(function() {
            if ($(this).val() == '25') {
                score += parseInt(25)
            } else if ($(this).val() == '0') {
                score += parseInt(0)
            }
        })
        $("input[name='pm_diagnosis']:checked").each(function() {
            if ($(this).val() == '15') {
                score += parseInt(15)
            } else if ($(this).val() == '0') {
                score += parseInt(0)
            }
        })
        $("input[name='pm_kursi_roda_ya']:checked").each(function() {
            if ($(this).val() == '0') {
                score += parseInt(0)
            }
        })
        $("input[name='pm_kruk_ya']:checked").each(function() {
            if ($(this).val() == '15') {
                score += parseInt(15)
            }
        })
        $("input[name='pm_pegangan_ya']:checked").each(function() {
            if ($(this).val() == '30') {
                score += parseInt(30)
            }
        })
        $("input[name='pm_heparin']:checked").each(function() {
            if ($(this).val() == '20') {
                score += parseInt(20)
            } else if ($(this).val() == '0') {
                score += parseInt(0)
            }
        })
        $("input[name='pm_imobilisasi_ya']:checked").each(function() {
            if ($(this).val() == '0') {
                score += parseInt(0)
            }
        })
        $("input[name='pm_lemah_ya']:checked").each(function() {
            if ($(this).val() == '10') {
                score += parseInt(10)
            }
        })
        $("input[name='pm_terganggu_ya']:checked").each(function() {
            if ($(this).val() == '20') {
                score += parseInt(20)
            }
        })
        $("input[name='pm_kemampuan_ya']:checked").each(function() {
            if ($(this).val() == '0') {
                score += parseInt(0)
            }
        })
        $("input[name='pm_lupa_ya']:checked").each(function() {
            if ($(this).val() == '15') {
                score += parseInt(15)
            }
        })

        $("input[name='pm_jumlah_skor']").val(score)
    }

    function resetFormPengkajianAwalIGD() {
        $('.collapse').removeClass('show')
        $('#form-pengkajian-maternal')[0].reset()
        $('.disabled').prop('disabled', true)
        $('.checked').prop('checked', false)

        // $('#pm-bidan').val('')
        $('#s2id_pm-bidan a .select2c-chosen').html('Pilih Bidan')
        // $('#pm-dpjp').val('')
        $('#s2id_pm-dpjp a .select2c-chosen').html('Pilih dokter DPJP')

        $('#pm-paraf-bidan').show()
        $('#pm-paraf-bidan-verified').hide()
        $('#pm-paraf-dpjp').show()
        $('#pm-paraf-dpjp-verified').hide()

        $('#pm-bidan, #pm-dpjp').select2c('readonly', false);


    }

    function konfirmasiPengkajianMaternal() {
        var stop = false;
        if ($('#pm-waktu-kajian').val() === '') {
            syams_validation('#pm-waktu-kajian', 'Kolom waktu pengkajian harus diisi!');
            $('#pm-waktu-kajian').focus();
            $('#pm-waktu-kajian').val('');
            $('#wizard-maternal').bwizard('show', '0');
            stop = true;
        } else if ($('#pm-waktu-bidan').val() === '') {
            syams_validation('#pm-waktu-bidan', 'Kolom waktu bidan harus diisi!');
            $('#pm-waktu-bidan').focus();
            $('#pm-waktu-bidan').val('');
            $('#wizard-maternal').bwizard('show', '0');
            stop = true;
        } else if ($('#pm-bidan').val() === '') {
            syams_validation('#pm-bidan', 'Bidan harus diisi!');
            $('#pm-bidan').val('')
            $('#s2id_pm-bidan a .select2c-chosen').html('')
            $('#wizard-maternal').bwizard('show', '0');
            stop = true;
        }
        if (stop) {
            return false;
        }

        var id_pengkajian_maternal = $('#id_pengkajian_maternal').val()
        if (id_pengkajian_maternal) {
            var text = 'Apakah anda yakin ingin mengupdate data ini ?';
            var btnTextConfirm = 'Update';
        } else {
            text = 'Apakah anda yakin ingin menyimpan data ini ?';
            btnTextConfirm = 'Simpan';
        }

        swal.fire({
            title: 'Konfirmasi ?',
            html: text,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-save mr-1"></i>' + btnTextConfirm,
            cancelButtonText: '<i class="fas fa-time-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                simpanPengkajianMaternal()
            }
        })
    }

    function simpanPengkajianMaternal() {

        var id_layanan_pendaftaran = $('#id_layanan_pendaftaran').val();

        $.ajax({
            type: 'POST',

            url: '<?= base_url("pemeriksaan_igd/api/pemeriksaan_igd/simpan_pengkajian_maternal") ?>',
            data: $('#form-pengkajian-maternal').serialize() + '&id_layanan_pendaftaran=' + id_layanan_pendaftaran,

            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {
                if (data.status) {
                    messageCustom(data.message, 'Success')
                } else {
                    messageCustom(data.message, 'Error')
                }

                $('#modal_pengkajian_maternal_rm').modal('hide')
                showListForm($('#id_pendaftaran').val(), $('#id_layanan_pendaftaran').val(), $('#id_pasien').val());

            },
            complete: function(data) {
                hideLoader()
            },
            error: function(e) {
                messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error')
            }
        })
    }

    // MEOWS
    function hitungSkalaEarlyMeowst() {
        var total = 0;
        // looping vertical
        for (let i = 1; i <= 11; i++) {
            // looping horizontal
            var sub_total = 0
            for (let j = 1; j <= 11; j++) {
                var value = 0;
                if ($('#skalameowst-' + i + '-' + j).is(':checked')) {
                    var getNilai = $('#skalameowst-' + i + '-' + j).val()
                    value = getNilai.split('-', 1)
                    if (value[0] === 'bk') {
                        value = 8;
                    }
                }
                sub_total = sub_total + parseInt(value)
            }
            total = total + parseInt(sub_total)
        }
        if (total == 0) {
            $('#total-skalameowst-1').prop('checked', true)
        } else if (total >= 1 && total <= 4) {
            $('#total-skalameowst-2').prop('checked', true)
        } else if (total >= 5 && total <= 6) {
            $('#total-skalameowst-3').prop('checked', true)
        } else if (total >= 7) {
            $('#total-skalameowst-4').prop('checked', true)
        }
    }

    // NEWS
    function hitungSkalaEarlyNewso() {
        var total = 0;
        // looping vertical
        for (let i = 1; i <= 7; i++) {
            // looping horizontal
            var sub_total = 0
            for (let j = 1; j <= 7; j++) {
                var value = 0;
                if ($('#skalanewso-' + i + '-' + j).is(':checked')) {
                    var getNilai = $('#skalanewso-' + i + '-' + j).val()
                    value = getNilai.split('-', 1)
                    if (value[0] === 'bk') {
                        value = 7;
                    }
                }
                sub_total = sub_total + parseInt(value)
            }
            total = total + parseInt(sub_total)
        }
        if (total == 0) {
            $('#total-skalanewso-1').prop('checked', true)
        } else if (total >= 1 && total <= 4) {
            $('#total-skalanewso-2').prop('checked', true)
        } else if (total >= 5 && total <= 6) {
            $('#total-skalanewso-3').prop('checked', true)
        } else if (total >= 7) {
            $('#total-skalanewso-4').prop('checked', true)
        }
    }
</script> -->



<!-- Modal -->
<!-- IGD -->
<!-- <div class="modal fade" id="modal_pengkajian_maternal_rm" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold">PENGKAJIAN IGD MATERNAL</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-pengkajian-maternal class="form-horizontal"') ?>
                <input type="hidden" name="id_pendaftaran" id="id_pendaftaran">
                <input type="hidden" name="id_layanan_pendaftaran" id="id_layanan_pendaftaran">
                <input type="hidden" name="id_pasien" id="id_pasien">
                <input type="hidden" name="id" id="id_pengkajian_maternal">
                <?= $this->session->userdata('nama') ?>
                <input type="hidden" name="id_user_maternal" value="<?= $this->session->userdata("id_translucent") ?>">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="20%" class="bold">Nama Pasien</td>
                                    <td wdith="80%">: <span id="pm-pasien-nama"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">No. RM</td>
                                    <td>: <span id="pm-pasien-no-rm"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Tanggal Lahir</td>
                                    <td>: <span id="pm-pasien-tanggal-lahir"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Jenis Kelamin</td>
                                    <td>: <span id="pm-pasien-jenis-kelamin"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6"></div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="wizard-maternal">
                                <ol>
                                    <li>Pengkajian Kebidanan <i class="bold"><small>(Diisi Oleh Bidan)</small></i>
                                </ol>
                                <div class="form-data-pengkajian-dokter">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card p-2">
                                                <h5 class="center"><b>PENGKAJIAN IGD MATERNAL</b></h5>
                                                <table class="table table-no-border table-sm table-striped">
                                                    <tr>
                                                        <td width="10%">Tanggal dan Jam</td>
                                                        <td width="1%">:</td>
                                                        <td colspan="4">
                                                            <input type="text" name="pm_waktu_kajian" id="pm-waktu-kajian" class="custom-form clear-input d-inline-block col-lg-2" placeholder="dd/mm/yyyy hh:mm">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%">Informasi diperoleh dari</td>
                                                        <td wdith="1%">:</td>
                                                        <td width="15%">
                                                            <input type="radio" name="pm_diperoleh" id="pm-diperoleh-pasien" value="1" class="mr-1">Pasien
                                                        </td>
                                                        <td width="15%">
                                                            <input type="radio" name="pm_diperoleh" id="pm-diperoleh-keluarga" value="2" class="mr-1">Keluarga
                                                        </td>
                                                        <td colspan="2">
                                                            <input type="radio" name="pm_diperoleh" id="pm-diperoleh-lain" value="3" class="mr-1">Lain-lain, Sebutkan
                                                            <input type="text" name="pm_diperoleh_sebutkan" id="pm-diperoleh-sebutkan" class="custom-form clear-input d-inline-block col-lg-8 disabled">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%">Cara Masuk</td>
                                                        <td wdith="1%">:</td>
                                                        <td width="15%">
                                                            <input type="radio" name="pm_cara_masuk" id="pm-cara-masuk-jalan" value="1" class="mr-1">Jalan tanpa bantuan
                                                        </td>
                                                        <td width="15%">
                                                            <input type="radio" name="pm_cara_masuk" id="pm-cara-masuk-kursi" value="2" class="mr-1">Kursi roda
                                                        </td>
                                                        <td width="15%">
                                                            <input type="radio" name="pm_cara_masuk" id="pm-cara-masuk-bantuan" value="3" class="mr-1">Jalan dengan bantuan
                                                        </td>
                                                        <td width="15%">
                                                            <input type="radio" name="pm_cara_masuk" id="pm-cara-masuk-Brangkar" value="4" class="mr-1">Brangkar
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">
                                                            <button class="btn btn-info btn-xs mr-1 float-left btn_expand_all" type="button"><i class="fas fa-fw fa-expand mr-1"></i>Expand All</button>
                                                            <button class="btn btn-warning btn-xs mr-1 float-left btn_collapse_all" type="button"><i class="fas fa-fw fa-compress mr-1"></i>Collapse All</button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#keluhan-utama">
                                                            <iclass="fas fa-expand mr-1">
                                                                </iclass=>Expand
                                                        </button>KELUHAN UTAMA
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="keluhan-utama">
                                                <div class="card p-2" style="margin-top:-15px">
                                                    <table class="table table-no-border table-sm table-striped">
                                                        <tr>
                                                            <td colspan="2">
                                                                <textarea name="pm_keluhan_utama" id="pm-keluhan-utama" rows="3" class="form-control clear-input" placeholder="Keluhan Utama"></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="50%">
                                                                <input type="checkbox" name="pm_kontraksi" id="pm-kontraksi" value="1" class="mr-1">Mules-mules/kontraksi, mulai tanggal & jam
                                                                <input type="text" name="pm_waktu_kontraksi" id="pm-waktu-kontraksi" class="custom-form clear-input d-inline-block col-lg-2 disabled" placeholder="dd/mm/yyyy hh:mm">
                                                            </td>
                                                            <td width="50%">
                                                                <input type="checkbox" name="pm_lendir" id="pm-lendir" value="1" class="mr-1">Keluar lendir darah, sejak jam
                                                                <input type="text" name="pm_waktu_lendir" id="pm-waktu-lendir" class="custom-form clear-input d-inline-block col-lg-1 disabled" placeholder="hh:mm">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="50%">
                                                                <input type="checkbox" name="pm_ketuban" id="pm-ketuban" value="1" class="mr-1">Keluar air ketuban, sejak jam
                                                                <input type="text" name="pm_waktu_ketuban" id="pm-waktu-ketuban" class="custom-form clear-input d-inline-block col-lg-1 disabled" placeholder="hh:mm"> warna
                                                                <input type="text" name="pm_warna_ketuban" id="pm-warna-ketuban" class="custom-form clear-input d-inline-block col-lg-3 disabled">
                                                            </td>
                                                            <td width="50%">
                                                                <input type="checkbox" name="pm_darah" id="pm-darah" value="1" class="mr-1">Darah
                                                                <input type="text" name="pm_darah_sebutkan" id="pm-darah-sebutkan" class="custom-form clear-input d-inline-block col-lg-3 disabled">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <input type="checkbox" name="pm_lainnya" id="pm-lainnya" value="1" class="mr-1">Lain-lain, sebutkan
                                                                <input type="text" name="pm_lainnya_sebutkan" id="pm-lainnya-sebutkan" class="custom-form clear-input d-inline-block col-lg-3 disabled">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#penyakit-sekarang">
                                                            <iclass="fas fa-expand mr-1">
                                                                </iclass=>Expand
                                                        </button>RIWAYAT PENYAKIT SEKARANG
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="penyakit-sekarang">
                                                <div class="card p-2" style="margin-top:-15px">
                                                    <table class="table table-no-border table-sm table-striped">
                                                        <tr>
                                                            <td width="7%">Hamil muda</td>
                                                            <td width="15%">
                                                                :<input type="checkbox" name="pm_hamil_muda" id="pm-hamil-muda-mual" value="1" class="ml-2 mr-1">Mual
                                                            </td>
                                                            <td width="15%">
                                                                <input type="checkbox" name="pm_hamil_muda_muntah" id="pm-hamil-muda-muntah" value="1" class="mr-1">Muntah
                                                            </td>
                                                            <td width="15%">
                                                                <input type="checkbox" name="pm_hamil_muda_pendarahan" id="pm-hamil-muda-pendarahan" value="1" class="mr-1">Perdarahan
                                                            </td>
                                                            <td colspan="2">
                                                                <input type="checkbox" name="pm_hamil_muda_lain" id="pm-hamil-muda-lain" value="1" class="mr-1">Lain-lain, sebutkan
                                                                <input type="text" name="pm_hamil_muda_sebutkan" id="pm-hamil-muda-sebutkan" class="custom-form clear-input d-inline-block col-lg-7 disabled">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="7%">Hamil Tua</td>
                                                            <td width="15%">
                                                                :<input type="checkbox" name="pm_hamil_tua" id="pm-hamil-tua-pusing" value="1" class="ml-2 mr-1">Pusing
                                                            </td>
                                                            <td width="15%">
                                                                <input type="checkbox" name="pm_hamil_tua_kepala" id="pm-hamil-tua-sakit-kepala" value="1" class="mr-1">Sakit kepala
                                                            </td>
                                                            <td width="15%">
                                                                <input type="checkbox" name="pm_hamil_tua_pendarahan" id="pm-hamil-tua-pendarahan" value="1" class="mr-1">Perdarahan
                                                            </td>
                                                            <td colspan="2">
                                                                <input type="checkbox" name="pm_hamil_tua_lain" id="pm-hamil-tua-lain" value="1" class="mr-1">Lain-lain, sebutkan
                                                                <input type="text" name="pm_hamil_tua_sebutkan" id="pm-hamil-tua-sebutkan" class="custom-form clear-input d-inline-block col-lg-7 disabled">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="7%">ANC</td>
                                                            <td colspan="2">
                                                                :<input type="number" name="pm_anc_x" id="pm-anc-x" class="custom-form clear-input d-inline-block col-lg-2 ml-2 mr-1">X, di
                                                                <input type="text" name="pm_anc_lokasi" id="pm-anc-lokasi" class="custom-form clear-input d-inline-block col-lg-7 ml-1">
                                                            </td>
                                                            <td width="15%">
                                                                <input type="checkbox" name="pm_anc" id="pm-anc-teratur" value="1" class="mr-1">Teratur
                                                            </td>
                                                            <td width="15%">
                                                                <input type="checkbox" name="pm_anc_tidak_teratur" id="pm-anc-tidak-teratur" value="1" class="mr-1">Tidak teratur
                                                            </td>
                                                            <td width="15%">
                                                                <input type="checkbox" name="pm_anc_imunisasi" id="pm-anc-imunisasi" value="1" class="mr-1">Imunisasi TT
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>


                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#riwayat-kehamilan">
                                                            <iclass="fas fa-expand mr-1">
                                                                </iclass=>Expand
                                                        </button>RIWAYAT KEHAMILAN PERSALINAN DAN NIFAS YANG LALU
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="riwayat-kehamilan">
                                                <div class="card p-2" style="margin-top:-15px">
                                                    <table class="table table-no-border table-sm table-striped">
                                                        <tr>
                                                            <td>
                                                                G<input type="text" name="pm_nifas_g" id="pm-nifas-g" class="custom-form clear-input d-inline-block col-lg-1 ml-1 mr-2">
                                                                P<input type="text" name="pm_nifas_p" id="pm-nifas-p" class="custom-form clear-input d-inline-block col-lg-1 ml-1 mr-2">
                                                                A<input type="text" name="pm_nifas_a" id="pm-nifas-a" class="custom-form clear-input d-inline-block col-lg-1 ml-1 mr-4">
                                                                Hidup :<input type="text" name="pm_nifas_hidup" id="pm-nifas-hidup" class="custom-form clear-input d-inline-block col-lg-2 ml-1">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table class="table table-bordered table-sm table-striped" style="margin-top: -15px;">
                                                        <thead>
                                                            <tr>
                                                                <th class="center">No</th>
                                                                <th class="center">Tgl Tahun Partus</th>
                                                                <th class="center">Tempat Partus</th>
                                                                <th class="center">Umur Hamil</th>
                                                                <th class="center">Jenis Persalinan</th>
                                                                <th class="center">Penolong Persalinan</th>
                                                                <th class="center">Penyulit</th>
                                                                <th class="center">Nifas</th>
                                                                <th class="center">Kelamin/BB</th>
                                                                <th class="center">Keadaan Anak Sekarang</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="center">1</td>
                                                                <td><input type="text" name="pm_waktu_partus_1" id="pm-waktu-partus-1" class="custom-form clear-input d-inline-block" placeholder="dd/mm/yyyy"></td>
                                                                <td><input type="text" name="pm_tempat_partus_1" id="pm-tempat-partus-1" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_umur_hamil_1" id="pm-umur-hamil-1" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_jenis_persalinan_1" id="pm-jenis-persalinan-1" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_penolong_persalinan_1" id="pm-penolong-persalinan-1" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_penyulit_1" id="pm-penyulit-1" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_nifas_1" id="pm-nifas-1" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_kelamin_1" id="pm-kelamin-1" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_keadaan_1" id="pm-keadaan-1" class="custom-form clear-input d-inline-block"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center">2</td>
                                                                <td><input type="text" name="pm_waktu_partus_2" id="pm-waktu-partus-2" class="custom-form clear-input d-inline-block" placeholder="dd/mm/yyyy"></td>
                                                                <td><input type="text" name="pm_tempat_partus_2" id="pm-tempat-partus-2" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_umur_hamil_2" id="pm-umur-hamil-2" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_jenis_persalinan_2" id="pm-jenis-persalinan-2" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_penolong_persalinan_2" id="pm-penolong-persalinan-2" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_penyulit_2" id="pm-penyulit-2" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_nifas_2" id="pm-nifas-2" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_kelamin_2" id="pm-kelamin-2" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_keadaan_2" id="pm-keadaan-2" class="custom-form clear-input d-inline-block"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center">3</td>
                                                                <td><input type="text" name="pm_waktu_partus_3" id="pm-waktu-partus-3" class="custom-form clear-input d-inline-block" placeholder="dd/mm/yyyy"></td>
                                                                <td><input type="text" name="pm_tempat_partus_3" id="pm-tempat-partus-3" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_umur_hamil_3" id="pm-umur-hamil-3" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_jenis_persalinan_3" id="pm-jenis-persalinan-3" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_penolong_persalinan_3" id="pm-penolong-persalinan-3" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_penyulit_3" id="pm-penyulit-3" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_nifas_3" id="pm-nifas-3" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_kelamin_3" id="pm-kelamin-3" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_keadaan_3" id="pm-keadaan-3" class="custom-form clear-input d-inline-block"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center">4</td>
                                                                <td><input type="text" name="pm_waktu_partus_4" id="pm-waktu-partus-4" class="custom-form clear-input d-inline-block" placeholder="dd/mm/yyyy"></td>
                                                                <td><input type="text" name="pm_tempat_partus_4" id="pm-tempat-partus-4" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_umur_hamil_4" id="pm-umur-hamil-4" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_jenis_persalinan_4" id="pm-jenis-persalinan-4" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_penolong_persalinan_4" id="pm-penolong-persalinan-4" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_penyulit_4" id="pm-penyulit-4" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_nifas_4" id="pm-nifas-4" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_kelamin_4" id="pm-kelamin-4" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_keadaan_4" id="pm-keadaan-4" class="custom-form clear-input d-inline-block"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center">5</td>
                                                                <td><input type="text" name="pm_waktu_partus_5" id="pm-waktu-partus-5" class="custom-form clear-input d-inline-block" placeholder="dd/mm/yyyy"></td>
                                                                <td><input type="text" name="pm_tempat_partus_5" id="pm-tempat-partus-5" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_umur_hamil_5" id="pm-umur-hamil-5" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_jenis_persalinan_5" id="pm-jenis-persalinan-5" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_penolong_persalinan_5" id="pm-penolong-persalinan-5" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_penyulit_5" id="pm-penyulit-5" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_nifas_5" id="pm-nifas-5" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_kelamin_5" id="pm-kelamin-5" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_keadaan_5" id="pm-keadaan-5" class="custom-form clear-input d-inline-block"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="center">6</td>
                                                                <td><input type="text" name="pm_waktu_partus_6" id="pm-waktu-partus-6" class="custom-form clear-input d-inline-block" placeholder="dd/mm/yyyy"></td>
                                                                <td><input type="text" name="pm_tempat_partus_6" id="pm-tempat-partus-6" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_umur_hamil_6" id="pm-umur-hamil-6" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_jenis_persalinan_6" id="pm-jenis-persalinan-6" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_penolong_persalinan_6" id="pm-penolong-persalinan-6" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_penyulit_6" id="pm-penyulit-6" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_nifas_6" id="pm-nifas-6" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_kelamin_6" id="pm-kelamin-6" class="custom-form clear-input d-inline-block"></td>
                                                                <td><input type="text" name="pm_keadaan_6" id="pm-keadaan-6" class="custom-form clear-input d-inline-block"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#riwayat-menstruasi">
                                                            <iclass="fas fa-expand mr-1">
                                                                </iclass=>Expand
                                                        </button>RIWAYAT MENSTRUASI
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="riwayat-menstruasi">
                                                <div class="card p-2" style="margin-top:-15px">
                                                    <table class="table table-no-border table-sm table-striped">
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="pm_umur_menarche" id="pm-umur-menarche" value="1" class="mr-1">Umur Menarche
                                                                <input type="number" name="pm_umur_menarche_sebutkan" id="pm-umur-menarche-sebutkan" class="custom-form clear-input d-inline-block col-lg-1 mx-1 disabled">th, lamanya haid
                                                                <input type="number" name="pm_lama_haid" id="pm-lama-haid" class="custom-form clear-input d-inline-block col-lg-1 mx-1 disabled">hari, banyaknya
                                                                <input type="number" name="pm_pembalut" id="pm-pembalut" class="custom-form clear-input d-inline-block col-lg-1 mx-1 disabled">pembalut/hari
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="pm_dismenorroe" id="pm-dismenorroe" value="1" class="mr-1">Dismenorroe
                                                                <input type="checkbox" name="pm_spoting" id="pm-spoting" value="1" class="ml-2 mr-1">Spoting
                                                                <input type="checkbox" name="pm_menorrhagia" id="pm-menorrhagia" value="1" class="ml-2 mr-1">Menorrhagia
                                                                <input type="checkbox" name="pmm_metrorhagia" id="pmm-metrorhagia" value="1" class="ml-2 mr-1">Metrorhagia
                                                                <input type="checkbox" name="pm_menstrual" id="pm-menstrual" value="1" class="ml-2 mr-1">Pre Menstrual Syndrome
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Hari Pertama Haid Terakhir (HPHT) : <input type="text" name="pm_hpht" id="pm-hpht" class="custom-form clear-input d-inline-block col-lg-2 ml-1 mr-2">
                                                                Taksiran Persalinan (TP) <input type="text" name="pm_taksiran" id="pm-taksiran" class="custom-form clear-input d-inline-block col-lg-2 ml-1">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#riwayat-penyakit-keluarga">
                                                            <iclass="fas fa-expand mr-1">
                                                                </iclass=>Expand
                                                        </button>RIWAYAT PENYAKIT KELUARGA
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="riwayat-penyakit-keluarga">
                                                <div class="card p-2" style="margin-top:-15px">
                                                    <table class="table table-no-border table-sm table-striped">
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="pm_asma" id="pm-asma" value="1" class="mr-1">Asma
                                                                <input type="checkbox" name="pm_hipertensi" id="pm-hipertensi" value="1" class="ml-3 mr-1">Hipertensi
                                                                <input type="checkbox" name="pm_jantung" id="pm-jantung" value="1" class="ml-3 mr-1">Jantung
                                                                <input type="checkbox" name="pm_diabetes" id="pm-diabetes" value="1" class="ml-3 mr-1">Diabetes
                                                                <input type="checkbox" name="pm_penyakit_lain" id="pm-penyakit-lain" value="1" class="ml-3 mr-1">Lain-lain, sebutkan
                                                                <input type="text" name="pm_penyakit_lain_sebutkan" id="pm-penyakit-sebutkan" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#tanda-vital">
                                                            <iclass="fas fa-expand mr-1">
                                                                </iclass=>Expand
                                                        </button>PEMERIKSAAN FISIK DAN TANDA-TANDA VITAL
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="tanda-vital">
                                                <div class="card p-2" style="margin-top:-15px">
                                                    <table class="table table-no-border table-sm table-striped">
                                                        <tr>
                                                            <td width="10%">Kesadaran</td>
                                                            <td colspan="2">
                                                                : <input type="radio" name="pm_kesadaran" id="pm-kesadaran-cm" value="1" class="ml-2 mr-1">CM
                                                                <input type="radio" name="pm_kesadaran" id="pm-kesadaran-apatis" value="2" class="ml-3 mr-1">Apatis
                                                                <input type="radio" name="pm_kesadaran" id="pm-kesadaran-samnolen" value="3" class="ml-3 mr-1">Samnolen
                                                                <input type="radio" name="pm_kesadaran" id="pm-kesadaran-sopor" value="4" class="ml-3 mr-1">Sopor
                                                                <input type="radio" name="pm_kesadaran" id="pm-kesadaran-koma" value="5" class="ml-3 mr-1">Koma
                                                            </td>
                                                            <td width="10%">
                                                                Sistolik
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="number" name="pm_sistolik" id="pm-sistolik" class="custom-form clear-input d-inline-block col-lg-2 mx-1">mmHg, Suhu
                                                                <input type="number" name="pm_suhu_sistolik" id="pm-suhu-sistolik" class="custom-form clear-input d-inline-block col-lg-2 mx-1">℃
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%">GCS</td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                E = <input type="text" name="pm_cgs_e" id="pm-cgs-e" class="custom-form clear-input d-inline-block col-lg-1 cgs" onkeypress="return hanyaAngka(event)">
                                                                M = <input typevent="text" name="pm_cgs_m" id="pm-cgs-m" class="custom-form clear-input d-inline-block col-lg-1 cgs" onkeypress="return hanyaAngka(event)">
                                                                V = <input type="teventxt" name="pm_cgs_v" id="pm-cgs-v" class="custom-form clear-input d-inline-block col-lg-1 cgs" onkeypress="return hanyaAngka(event)">
                                                                Total = <input type="text" name="pm_cgs_total" id="pm-cgs-total" class="custom-form clear-input d-inline-block col-lg-1 ml-3" placeholder="0" readonly>
                                                            </td>
                                                            <td width="10%">
                                                                Diastolik
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="number" name="pm_diastolik" id="pm-diastolik" class="custom-form clear-input d-inline-block col-lg-2 mx-1">mmHg
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%">SpO2</td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="number" name="pm_spo2" id="pm-spo2" class="custom-form clear-input d-inline-block col-lg-2 mx-1">
                                                            </td>
                                                            <td width="10%">
                                                                Frekuensi Nadi
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="number" name="pm_frekuensi_nadi" id="pm-frekuensi-nadi" class="custom-form clear-input d-inline-block col-lg-2 mx-1">x/mnt
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3"></td>
                                                            <td width="10%">
                                                                Frekuensi Nafas
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="number" name="pm_frekuensi_nafas" id="pm-frekuensi-nafas" class="custom-form clear-input d-inline-block col-lg-2 mx-1">x/mnt
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#pemeriksaan-kandungan">
                                                            <iclass="fas fa-expand mr-1">
                                                                </iclass=>Expand
                                                        </button>PEMERIKSAAN KEBIDANAN DAN KANDUNGAN
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="pemeriksaan-kandungan">
                                                <div class="card p-2" style="margin-top:-15px">
                                                    <table class="table table-no-border table-sm table-striped">
                                                        <tr rowspan="2">
                                                            <td width="10%" class="bold" rowspan="2">
                                                                Inspeksi Abdomen
                                                            </td>
                                                            <td width="1%" rowspan="2">
                                                                :
                                                            </td>
                                                            <td colspan="4">
                                                                <input type="checkbox" name="pm_membesar" id="pm-membesar" value="1" class="mr-1">Membesar dengan arah memanjang
                                                                <input type="checkbox" name="pm_melebar" id="pm-melebar" value="1" class="ml-3 mr-1">Melebar
                                                                <input type="checkbox" name="pm_pelebaran" id="pm-pelebaran" value="1" class="ml-3 mr-1">Pelebaran vena
                                                                <input type="checkbox" name="pm_linea_alba" id="pm-linea-alba" value="1" class="ml-3 mr-1">Linea alba
                                                                <input type="checkbox" name="pm_linea_nigra" id="pm-linea-nigra" value="1" class="ml-3 mr-1">Linea nigra
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4">
                                                                <input type="checkbox" name="pm_striae_livide" id="pm-striae-livide" value="1" class="mr-1">Striae livide
                                                                <input type="checkbox" name="pm_striae_albican" id="pm-striae-albican" value="1" class="ml-3 mr-1">Striae albican
                                                                <input type="checkbox" name="pm_luka" id="pm-luka" value="1" class="ml-3 mr-1">Luka bekas operasi
                                                                <input type="checkbox" name="pm_luka_lain" id="pm-luka-lain" value="1" class="ml-3 mr-1">Lain-lain, sebutkan
                                                                <input type="text" name="pm_luka_lain_sebutkan" id="pm-luka-sebutkan" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%" class="bold" rowspan="6">
                                                                Palpasi
                                                            </td>
                                                            <td width="1%" rowspan="6">
                                                                :
                                                            </td>
                                                            <td width="10%">
                                                                Leopold I
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                TFU :<input type="text" name="pm_tfu" id="pm-tfu" class="custom-form clear-input d-inline-block col-lg-1 mx-1">cm, Teraba :
                                                                <input type="checkbox" name="pm_leopold_1" id="pm-leopold-1-kepala" value="1" class="mx-1">Kepala
                                                                <input type="checkbox" name="pm_leopold_bokong" id="pm-leopold-1-bokong" value="1" class="ml-3 mr-1">Bokong
                                                                <input type="checkbox" name="pm_leopold_lain" id="pm-leopold-1-lain" value="1" class="ml-3 mr-1">Lain-lain, sebutkan
                                                                <input type="text" name="pm_leopold_1_sebutkan" id="pm-leopold-1-sebutkan" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%">
                                                                Leopold II
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                Teraba :
                                                                <input type="checkbox" name="pm_leopold_2" id="pm-leopold-2-punggung-kanan" value="1" class="mx-1">Punggung Kanan
                                                                <input type="checkbox" name="pm_leopold_punggung" id="pm-leopold-2-punggung-kiri" value="1" class="ml-3 mr-1">Punggung kiri
                                                                <input type="checkbox" name="pm_leopold_lainn" id="pm-leopold-2-lain" value="1" class="ml-3 mr-1">Lain-lain, sebutkan
                                                                <input type="text" name="pm_leopold_2_sebutkan" id="pm-leopold-2-sebutkan" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%">
                                                                Leopold III
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                Bagiah terbawah janin; Teraba :
                                                                <input type="checkbox" name="pm_leopold_3" id="pm-leopold-3-kepala" value="1" class="mx-1">Kepala
                                                                <input type="checkbox" name="pm_leopold_bokonggg" id="pm-leopold-3-bokong" value="1" class="ml-3 mr-1">Bokong
                                                                <input type="checkbox" name="pm_leopold_lainnn" id="pm-leopold-3-lain" value="1" class="ml-3 mr-1">Lain-lain, sebutkan
                                                                <input type="text" name="pm_leopold_3_sebutkan" id="pm-leopold-3-sebutkan" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%">
                                                                Leopold IV
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="checkbox" name="pm_leopold_4" id="pm-leopold-4-kepala" value="1" class="mx-1">Konvergen
                                                                <input type="checkbox" name="pm_leopold_bokongggg" id="pm-leopold-4-bokong" value="1" class="ml-3 mr-1">Divergen
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">Bagian terbawah janin masuk panggul <input type="text" name="pm_janin_masuk" id="pm-janin-masuk" class="custom-form clear-input d-inline-block col-lg-1 mx-1">bagian</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">Taksiran berat janin : <input type="number" name="pm_taksiran_janin" id="pm-taksiran-janin" class="custom-form clear-input d-inline-block col-lg-1 mx-1">gram</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%" class="bold">
                                                                Auskultasi
                                                            </td>
                                                            <td width="1%">
                                                                :
                                                            </td>
                                                            <td colspan="4">
                                                                DJJ : <input type="number" name="pm_djj_x" id="pm-djj-x" class="custom-form clear-input d-inline-block col-lg-1 mx-1">x / menit,
                                                                <input type="radio" name="pm_djj" id="pm-djj-teratur" value="1" class="mx-1">Teratur
                                                                <input type="radio" name="pm_djj" id="pm-djj-tidak-teratur" value="2" class="ml-3 mr-1">Tidak teratur
                                                                <input type="radio" name="pm_djj" id="pm-djj-tidak-terdengar" value="3" class="ml-3 mr-1">Tidak terdengar
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%" class="bold">
                                                                Gerak Janin
                                                            </td>
                                                            <td width="1%">
                                                                :
                                                            </td>
                                                            <td colspan="4">
                                                                <input type="number" name="pm_gerak_janin" id="pm-gerak-janin" class="custom-form clear-input d-inline-block col-lg-1 mx-1">x / 30 menit
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%" class="bold">
                                                                His / kontraksi
                                                            </td>
                                                            <td width="1%">
                                                                :
                                                            </td>
                                                            <td colspan="4">
                                                                <input type="number" name="pm_his_x" id="pm-his-x" class="custom-form clear-input d-inline-block col-lg-1 mx-1">x dalam 10 menit, lamanya
                                                                <input type="number" name="pm_his_detik" id="pm-his-detik" class="custom-form clear-input d-inline-block col-lg-1 mx-1">detik, kekuatan
                                                                <input type="text" name="pm_his_kekuatan" id="pm-his-kekuatan" class="custom-form clear-input d-inline-block col-lg-1 mx-1">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%" class="bold" rowspan="3">
                                                                Inspeksi vagina
                                                            </td>
                                                            <td width="1%" rowspan="3">
                                                                :
                                                            </td>
                                                            <td width="20%">
                                                                Vulva / vagina
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="radio" name="pm_vulva" id="pm-vulva-normal" value="1" class="mx-1">Normal
                                                                <input type="radio" name="pm_vulva" id="pm-vulva-lain" value="2" class="ml-3 mr-1">Lain-lain, sebutkan
                                                                <input type="text" name="pm_vulva_sebutkan" id="pm-vulva-sebutkan" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                                Pengeluaran
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="checkbox" name="pm_pengeluaran_lendir" id="pm-pengeluaran-lendir" value="1" class="mx-1">Lendir darah
                                                                <input type="checkbox" name="pm_pengeluaran_ketuban" id="pm-pengeluaran-ketuban" value="1" class="ml-3 mr-1">Air ketuban, warna
                                                                <input type="text" name="pm_pengeluaran_ketuban_warna" id="pm-pengeluaran-ketuban-warna" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                                <input type="checkbox" name="pm_pengeluaran_flex" id="pm-pengeluaran-flex" value="1" class="ml-3 mr-1">Flek Darah
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"></td>
                                                            <td>
                                                                <input type="checkbox" name="pm_pengeluaran_darah" id="pm-pengeluaran-darah" value="1" class="ml-1 mr-1">Darah segar, sebanyak
                                                                <input type="text" name="pm_pengeluaran_darah_sebanyak" id="pm-pengeluaran-darah-sebanyak" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                                <input type="checkbox" name="pm_pengeluaran_lain" id="pm-pengeluaran-lain" value="1" class="ml-3 mr-1">Lain-lain, sebutkan
                                                                <input type="text" name="pm_pengeluaran_lain_sebutkan" id="pm-pengeluaran-sebutkan" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%" class="bold" rowspan="6">
                                                                Pemeriksaan dalam
                                                            </td>
                                                            <td width="1%" rowspan="6">
                                                                :
                                                            </td>
                                                            <td width="20%">
                                                                Introitus vagina
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="radio" name="pm_introitus" id="pm-introitus-benjolan" value="1" class="mx-1">Teraba benjolan
                                                                <input type="radio" name="pm_introitus" id="pm-introitus-lain" value="2" class="ml-3 mr-1">Lain-lain, sebutkan
                                                                <input type="text" name="pm_introitus_sebutkan" id="pm-introitus-sebutkan" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                                Porsio
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="radio" name="pm_porsio" id="pm-porsio-benjolan" value="1" class="mx-1">Tipis
                                                                <input type="radio" name="pm_porsio" id="pm-porsio-lain" value="2" class="ml-3 mr-1">Lain-lain, sebutkan
                                                                <input type="text" name="pm_porsio_sebutkan" id="pm-porsio-sebutkan" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                                Pembukaan
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="text" name="pm_pembukaan" id="pm-pembukaan" class="custom-form clear-input d-inline-block col-lg-3">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                                Ketuban
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="radio" name="pm_pembukaan_ketuban" id="pm-pembukaan-utuh" value="0" class="mx-1">Utuh
                                                                <input type="radio" name="pm_pembukaan_ketuban" id="pm-pembukaan-pecah" value="1" class="ml-3 mr-1">Pecah, warna
                                                                <input type="text" name="pm_pembukaan_ketuban_warna" id="pm-pembukaan-ketuban-warna" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                                Penurunan bagian terendah di Hodge
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="text" name="pm_hodge" id="pm-hodge" class="custom-form clear-input d-inline-block col-lg-1 ml-1 mr-4">
                                                                UUK :<input type="text" name="pm_uuk" id="pm-uuk" class="custom-form clear-input d-inline-block col-lg-1 ml-1 mr-4">
                                                                Moulage :<input type="text" name="pm_moulage" id="pm-moulage" class="custom-form clear-input d-inline-block col-lg-1 ml-1">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                                Nyeri goyang porsio
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="radio" name="pm_nyeri_porsio" id="pm-nyeri-ya" value="1" class="mx-1">Ada
                                                                <input type="radio" name="pm_nyeri_porsio" id="pm-nyeri-tidak" value="2" class="ml-3 mr-1">Tidak
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#pm-resiko-jatuh">
                                                            <iclass="fas fa-expand mr-1">
                                                                </iclass=>Expand
                                                        </button>PENILAIAN RESIKO JATUH
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2 col-lg-6" id="pm-resiko-jatuh" style="margin-left:-10px">
                                                <div class="card p-2" style="margin-top:-15px">
                                                    <table class="table table-bordered table-sm">
                                                        <thead class="table-info">
                                                            <tr class="center">
                                                                <th>
                                                                    PARAMETER
                                                                </th>
                                                                <th width="15%">
                                                                    Nilai
                                                                </th>
                                                                <th width="10%">
                                                                    Skor
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td rowspan="2">RIwayat Jatuh dalan waktu 3 bulan sebab apapun</td>
                                                                <td>
                                                                    <input type="radio" name="pm_jatuh" id="pm-jatuh-ya" value="25" class="mr-1" onchange="hitungSkoreMaternal()">Ya
                                                                </td>
                                                                <td class="center">25</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="radio" name="pm_jatuh" id="pm-jatuh-tidak" value="0" class="mr-1" onchange="hitungSkoreMaternal()">Tidak
                                                                </td>
                                                                <td class="center">0</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="2">Diagnosis Sekunder (≥2 Diagnosis Medis)</td>
                                                                <td>
                                                                    <input type="radio" name="pm_diagnosis" id="pm-diagnosis-ya" value="15" class="mr-1" onchange="hitungSkoreMaternal()">Ya
                                                                </td>
                                                                <td class="center">15</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="radio" name="pm_diagnosis" id="pm-diagnosis-tidak" value="0" class="mr-1" onchange="hitungSkoreMaternal()">Tidak
                                                                </td>
                                                                <td class="center">0</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Alat bantu jalan</td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="checkbox" name="pm_kursi_roda" id="pm-kursi-roda" value="1" class="mr-1">Tidak ada/kursi roda
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="pm_kursi_roda_ya" id="pm-kursi-roda-ya" value="0" class="mr-1 disabled" onchange="hitungSkoreMaternal()">Ya
                                                                </td>
                                                                <td class="center">0</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="Checkbox" name="pm_kruk" id="pm-kruk" value="1" class="mr-1">Kruk/Tongkat/Walker
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="pm_kruk_ya" id="pm-kruk-ya" value="15" class="mr-1 disabled" onchange="hitungSkoreMaternal()">Ya
                                                                </td>
                                                                <td class="center">15</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="Checkbox" name="pm_pegangan" id="pm-pegangan" value="1" class="mr-1">Berpegangan pada benda-benda disekitar/furniture
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="pm_pegangan_ya" id="pm-pegangan-ya" value="30" class="mr-1 disabled" onchange="hitungSkoreMaternal()">Ya
                                                                </td>
                                                                <td class="center">30</td>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="2">Terpasang infus/Heparin lock</td>
                                                                <td>
                                                                    <input type="radio" name="pm_heparin" id="pm-heparin-ya" value="20" class="mr-1" onchange="hitungSkoreMaternal()">Ya
                                                                </td>
                                                                <td class="center">20</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="radio" name="pm_heparin" id="pm-heparin-tidak" value="0" class="mr-1" onchange="hitungSkoreMaternal()">Tidak
                                                                </td>
                                                                <td class="center">0</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3">Cara berjalan atau berpisah</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="Checkbox" name="pm_imobilisasi" id="pm-imobilisasi" value="1" class="mr-1">Normal/bedrest/imobilisasi
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="pm_imobilisasi_ya" id="pm-imobilisasi-ya" value="0" class="mr-1 disabled" onchange="hitungSkoreMaternal()">Ya
                                                                </td>
                                                                <td class="center">0</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="Checkbox" name="pm_lemah" id="pm-lemah" value="1" class="mr-1">Lemah
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="pm_lemah_ya" id="pm-lemah-ya" value="10" class="mr-1 disabled" onchange="hitungSkoreMaternal()">Ya
                                                                </td>
                                                                <td class="center">10</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="Checkbox" name="pm_terganggu" id="pm-terganggu" value="1" class="mr-1">Terganggu
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="pm_terganggu_ya" id="pm-terganggu-ya" value="20" class="mr-1 disabled" onchange="hitungSkoreMaternal()">Ya
                                                                </td>
                                                                <td class="center">20</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Status mental</td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="Checkbox" name="pm_kemampuan" id="pm-kemampuan" value="1" class="mr-1">Sadar dengan kemampuan diri sendiri
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="pm_kemampuan_ya" id="pm-kemampuan-ya" value="0" class="mr-1 disabled" onchange="hitungSkoreMaternal()">Ya
                                                                </td>
                                                                <td class="center">0</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="Checkbox" name="pm_lupa" id="pm-lupa" value="1" class="mr-1">Sering lupa akan keterbatasan yang dimiliki
                                                                </td>
                                                                <td>
                                                                    <input type="Checkbox" name="pm_lupa_ya" id="pm-lupa-ya" value="15" class="mr-1 disabled" onchange="hitungSkoreMaternal()">Ya
                                                                </td>
                                                                <td class="center">15</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2" class="bold">JUMLAH SKOR</td>
                                                                <td class="center">
                                                                    <input type="number" name="pm_jumlah_skor" id="pm-jumlah-skor" class="custom-form clear-input d-inline-block" readonly placeholder="0">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <p class="ml-1">Ket : Tidak Beresiko : 0-24, Resiko Rendah : 25-50, Resiko Tinggi : ≥ 51</p>
                                                </div>
                                            </div>

                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#pm-tingkat-nyeri">
                                                            <iclass="fas fa-expand mr-1">
                                                                </iclass=>Expand
                                                        </button>PENILAIAN TINGKAT NYERI
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="pm-tingkat-nyeri">
                                                <div class="card p-2" style="margin-top:-15px">
                                                    <table class="table table-no-border table-sm table-striped">
                                                        <tr>
                                                            <td class="bold" width="10%">Skala Nyeri</td>
                                                            <td class="bold" wdith="1%">:</td>
                                                            <td class="pr-3"><input type="text" name="pm_skala_nyeri" id="pm-skala-nyeri" class="custom-form clear-input" placeholder="Masukkan skala nyeri"></td>
                                                            <td class="bold pl-2" width="20%">Kualitas Nyeri</td>
                                                            <td class="bold" width="1%">:</td>
                                                            <td><input type="text" name="pm_kualitas_nyeri" id="pm-kualitas-nyeri" class="custom-form clear-input" placeholder="Masukkan kualitas nyeri"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bold">Frekuensi Nyeri</td>
                                                            <td class="bold">:</td>
                                                            <td class="pr-3"><input type="text" name="pm_frekuensi_nyeri" id="pm-frekuensi-nyeri" class="custom-form clear-input" placeholder="Masukkan frekuensi nyeri"></td>
                                                            <td class="bold pl-2">Faktor - Faktor yang Memperberat Nyeri</td>
                                                            <td class="bold">:</td>
                                                            <td><input type="text" name="pm_pemberat_nyeri" id="pm-pemberat-nyeri" class="custom-form clear-input" placeholder="Masukkan Faktor Memperberat nyeri"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bold">Lama Nyeri</td>
                                                            <td class="bold">:</td>
                                                            <td class="pr-3"><input type="text" name="pm_lama_nyeri" id="pm-lama-nyeri" class="custom-form clear-input" placeholder="Masukkan lama nyeri"></td>
                                                            <td class="bold pl-2">Faktor - Faktor yang Mengurangi Nyeri</td>
                                                            <td class="bold">:</td>
                                                            <td><input type="text" name="pm_pengurang_nyeri" id="pm-pengurang-nyeri" class="custom-form clear-input" placeholder="Masukkan Faktor Mengurangi nyeri"></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#pm-riwayat-alergi">
                                                            <iclass="fas fa-expand mr-1">
                                                                </iclass=>Expand
                                                        </button>RIWAYAT ALERGI
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="pm-riwayat-alergi">
                                                <div class="card p-2" style="margin-top:-15px">
                                                    <table class="table table-no-border table-sm table-striped">
                                                        <tr>
                                                            <td rowspan="4">
                                                                <input type="radio" name="pm_alergi" id="pm-alergi-tidak" value="1" class="mr-1">Tidak
                                                            </td>
                                                            <td rowspan="4">
                                                                <input type="radio" name="pm_alergi" id="pm-alergi-tidak-tahu" value="2" class="mr-1">Tidak tahu
                                                            </td>
                                                            <td colspan="4">
                                                                <input type="radio" name="pm_alergi" id="pm-alergi-ya" value="3" class="mr-1">Ya
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Alergi obat
                                                            </td>
                                                            <td>
                                                                <input type="text" name="pm_alergi_obat" id="pm-alergi-obat" class="custom-form clear-input d-inline-block disabled">
                                                            </td>
                                                            <td class="right">
                                                                Reaksi
                                                            </td>
                                                            <td>
                                                                <input type="text" name="pm_alergi_obat_reaksi" id="pm-alergi-obat-reaksi" class="custom-form clear-input d-inline-block disabled">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Alergi Makanan
                                                            </td>
                                                            <td>
                                                                <input type="text" name="pm_alergi_makan" id="pm-alergi-makan" class="custom-form clear-input d-inline-block disabled">
                                                            </td>
                                                            <td class="right">
                                                                Reaksi
                                                            </td>
                                                            <td>
                                                                <input type="text" name="pm_alergi_makan_reaksi" id="pm-alergi-makan-reaksi" class="custom-form clear-input d-inline-block disabled">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Lain-lain
                                                            </td>
                                                            <td>
                                                                <input type="text" name="pm_alergi_lain" id="pm-alergi-lain" class="custom-form clear-input d-inline-block disabled">
                                                            </td>
                                                            <td class="right">
                                                                Reaksi
                                                            </td>
                                                            <td>
                                                                <input type="text" name="pm_alergi_lain_reaksi" id="pm-alergi-lain-reaksi" class="custom-form clear-input d-inline-block disabled">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="6">
                                                                <i>(BIla ada alergi segera pasang gelang merah dan tulis nama obat/makanan)</i>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="6">
                                                                <b>Obat yang masih dikonsumsi :</b><input type="text" name="pm_alergi_obat_konsumsi" id="pm-alergi-obat-konsumsi" class="custom-form clear-input d-inline-block col-lg-5 ml-1">
                                                            </td>
                                                        </tr>

                                                    </table>
                                                </div>
                                            </div>

                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#pm-status-nutrisi">
                                                            <iclass="fas fa-expand mr-1">
                                                                </iclass=>Expand
                                                        </button>STATUS NUTRISI
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="pm-status-nutrisi">
                                                <div class="card p-2" style="margin-top:-15px">
                                                    <table class="table table-no-border table-sm table-striped">
                                                        <tr>
                                                            <td>
                                                                Adakah penurunan berat badan :
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="radio" name="pm_berat_badan" id="pm-berat-badan-tidak" value="1" class="mr-1">Tidak
                                                                <input type="radio" name="pm_berat_badan" id="pm-berat-badan-ya" value="2" class="ml-3 mr-1">Ya,
                                                                <input type="number" name="pm_berat_badan_kg" id="pm-berat-badan-kg" class="custom-form clear-input d-inline-block col-lg-1 mx-1 disabled">kg
                                                                <input type="checkbox" name="pm_berat_badan_t" id="pm-berat-badan-lain" value="1" class="ml-3 mr-1">Lain-lain, sebutkan
                                                                <input type="text" name="pm_berat_badan_sebutkan" id="pm-berat-badan-sebutkan" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#pm-status-fungsional">
                                                            <iclass="fas fa-expand mr-1">
                                                                </iclass=>Expand
                                                        </button>STATUS FUNGSIONAL
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="pm-status-fungsional">
                                                <div class="card p-2" style="margin-top:-15px">
                                                    <table class="table table-no-border table-sm table-striped">
                                                        <tr>
                                                            <td>
                                                                <input type="radio" name="pm_fungsional" id="pm-fungsional-mandiri" value="1" class="mr-1">Mandiri
                                                                <input type="radio" name="pm_fungsional" id="pm-fungsional-bantuan" value="2" class="ml-3 mr-1">Perlu bantuan
                                                                <input type="radio" name="pm_fungsional" id="pm-fungsional-ketergantungan" value="3" class="ml-3 mr-1">Ketergantungan total, dilaporkan ke dokter pukul
                                                                <input type="text" name="pm_fungsional_sebutkan" id="pm-fungsional-sebutkan" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#pm-psikososial">
                                                            <iclass="fas fa-expand mr-1">
                                                                </iclass=>Expand
                                                        </button>PSIKOSOSIAL EKONOMI
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="pm-psikososial">
                                                <div class="card p-2" style="margin-top:-15px">
                                                    <table class="table table-no-border table-sm table-striped">
                                                        <tr>
                                                            <td width="10%">
                                                                Status Psikologis
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="radio" name="pm_psikologis" id="pm-psikologis-cemas" value="1" class="ml-1 mr-1">Cemas
                                                                <input type="radio" name="pm_psikologis" id="pm-psikologis-takut" value="2" class="ml-3 mr-1">Takut
                                                                <input type="radio" name="pm_psikologis" id="pm-psikologis-marah" value="3" class="ml-3 mr-1">Marah
                                                                <input type="radio" name="pm_psikologis" id="pm-psikologis-sedih" value="4" class="ml-3 mr-1">Sedih
                                                                <input type="radio" name="pm_psikologis" id="pm-psikologis-bunuh" value="5" class="ml-3 mr-1">Kecenderungan bunuh diri
                                                                <input type="radio" name="pm_psikologis" id="pm-psikologis-lain" value="6" class="ml-3 mr-1">Lain-lain, sebutkan
                                                                <input type="text" name="pm_psikologis_sebutkan" id="pm-psikologis-sebutkan" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%">
                                                                Status Mental
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="radio" name="pm_mental" id="pm-mental-sadar" value="1" class="ml-1 mr-1">Sadar dan orientasi baik
                                                                <input type="radio" name="pm_mental" id="pm-mental-masalah" value="2" class="ml-3 mr-1">Ada masalah perilaku, sebutkan
                                                                <input type="text" name="pm_mental_sebutkan" id="pm-mental-sebutkan" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                                <input type="radio" name="pm_mental" id="pm-mental-kekerasan" value="3" class="ml-3 mr-1">Perilaku kekerasan yang dialami pasien sebelumnya
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">
                                                                Status Ekonomi dan Sosial
                                                            </td>
                                                        </tr>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%">
                                                                Pekerjaan
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="radio" name="pm_pekerjaan" id="pm-pekerjaan-wiraswasta" value="1" class="ml-1 mr-1">Wiraswasta
                                                                <input type="radio" name="pm_pekerjaan" id="pm-pekerjaan-pegawai-swasta" value="2" class="ml-3 mr-1">Pegawai swasta
                                                                <input type="radio" name="pm_pekerjaan" id="pm-pekerjaan-pns" value="3" class="ml-3 mr-1">PNS
                                                                <input type="radio" name="pm_pekerjaan" id="pm-pekerjaan-pensiunan" value="4" class="ml-3 mr-1">Pensiunan
                                                                <input type="radio" name="pm_pekerjaan" id="pm-pekerjaan-pengangguran" value="5" class="ml-3 mr-1">Tidak Bekerja
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%">
                                                                Cara pembayaran
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="radio" name="pm_bayar" id="pm-bayar-sendiri" value="1" class="ml-1 mr-1">Biaya Sendiri
                                                                <input type="radio" name="pm_bayar" id="pm-bayar-bpjs" value="2" class="ml-3 mr-1">BPJS
                                                                <input type="radio" name="pm_bayar" id="pm-bayar-pns" value="3" class="ml-3 mr-1">Asuransi, sebutkan
                                                                <input type="text" name="pm_bayar_asuransi_sebutkan" id="pm-bayar-asuransi" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                                <input type="checkbox" name="pm_bayar_t" id="pm-bayar-lain" value="1" class="ml-3 mr-1">Lain-lain, sebutkan
                                                                <input type="text" name="pm_bayar_sebutkan" id="pm-bayar-sebutkan" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#pm-spiritual">
                                                            <iclass="fas fa-expand mr-1">
                                                                </iclass=>Expand
                                                        </button>PENGKAJIAN SPIRITUAL
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="pm-spiritual">
                                                <div class="card p-2" style="margin-top:-15px">
                                                    <table class="table table-no-border table-sm table-striped">
                                                        <tr>
                                                            <td colspan="5">
                                                                Kegiatan keagamaan yang bisa dilakukan :
                                                                <input type="text" name="pm_keagamaan" id="pm-keagamaan" class="custom-form clear-input d-inline-block col-lg-3 ml-1">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="5">
                                                                Kemampuan beribadah
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%">
                                                                Wajib Ibadah
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="radio" name="pm_ibadah" id="pm-ibadah-baligh" value="1" class="ml-1 mr-1">Baligh
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="pm_ibadah" id="pm-ibadah-belum" value="2" class="ml-1 mr-1">Belum Baligh
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="pm_ibadah" id="pm-ibadah-lain" value="3" class="ml-3 mr-1">Halangan Lain, sebutkan
                                                                <input type="text" name="pm_ibadah_sebutkan" id="pm-ibadah-sebutkan" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%">
                                                                Thaharoh
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="radio" name="pm_thaharoh" id="pm-thaharoh-wudhu" value="1" class="ml-1 mr-1">Berwudhu
                                                            </td>
                                                            <td colspan="2">
                                                                <input type="radio" name="pm_thaharoh" id="pm-thaharoh-tayamum" value="1" class="ml-1 mr-1">Tayamum
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%">
                                                                Sholat
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="radio" name="pm_sholat" id="pm-sholat-berdiri" value="1" class="ml-1 mr-1">Berdiri
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="pm_sholat" id="pm-sholat-duduk" value="2" class="ml-1 mr-1">Duduk
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="pm_sholat" id="pm-sholat-berbaring" value="3" class="ml-3 mr-1">Berbaring
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#pm-biologis">
                                                            <iclass="fas fa-expand mr-1">
                                                                </iclass=>Expand
                                                        </button>KEBUTUHAN BIOLOGIS
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="pm-biologis">
                                                <div class="card p-2" style="margin-top:-15px">
                                                    <table class="table table-no-border table-sm table-striped">
                                                        <tr>
                                                            <td width="20%">
                                                                Pola Makan
                                                            </td>
                                                            <td width="1%">:</td>
                                                            <td>
                                                                <input type="number" name="pm_banyak_makan" id="pm-banyak-makan" class="custom-form clear-input d-inline-block col-lg-1 mr-1">x / hari, terakhir jam
                                                                <input type="text" name="pm_waktu_makan" id="pm-waktu-makan" class="custom-form clear-input d-inline-block col-lg-1" placeholder="hh:mm">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Pola Minum
                                                            </td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="number" name="pm_banyak_minum" id="pm-banyak-minum" class="custom-form clear-input d-inline-block col-lg-1 mr-1">x / hari, terakhir jam
                                                                <input type="text" name="pm_waktu_minum" id="pm-waktu-minum" class="custom-form clear-input d-inline-block col-lg-1" placeholder="hh:mm">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="2">
                                                                Pola Eliminasi
                                                            </td>
                                                            <td rowspan="2">:</td>
                                                            <td>
                                                                BAK &nbsp;<input type="number" name="pm_banyak_bak" id="pm-banyak-bak" class="custom-form clear-input d-inline-block col-lg-1 mr-1">x / hari, terakhir jam
                                                                <input type="text" name="pm_waktu_bak" id="pm-waktu-bak" class="custom-form clear-input d-inline-block col-lg-1" placeholder="hh:mm">
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                BAB &nbsp;<input type="number" name="pm_banyak_bab" id="pm-banyak-bab" class="custom-form clear-input d-inline-block col-lg-1 mr-1">x / hari, terakhir jam
                                                                <input type="text" name="pm_waktu_bab" id="pm-waktu-bab" class="custom-form clear-input d-inline-block col-lg-1" placeholder="hh:mm">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Hubungan Seksual terakhir
                                                            </td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" name="pm_sex" id="pm-sex" class="custom-form clear-input d-inline-block col-lg-3">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#pm-skala-early">
                                                            <iclass="fas fa-expand mr-1">
                                                                </iclass=>Expand
                                                        </button>SKALA EARLY WARNING SYSTEM (EWS)
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="pm-skala-early">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="card p-2" style="margin-top:-15px">
                                                            <table class="table table-bordered table-sm">
                                                                <thead class="table-info">
                                                                    <tr class="center">
                                                                        <th colspan="8">
                                                                            MEOWS
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <th width="15%"><b>Parameter</b></th>
                                                                        <th width="10%" class="center"><b>3</b></th>
                                                                        <th width="10%" class="center"><b>2</b></th>
                                                                        <th width="10%" class="center"><b>1</b></th>
                                                                        <th width="10%" class="center"><b>0</b></th>
                                                                        <th width="10%" class="center"><b>1</b></th>
                                                                        <th width="10%" class="center"><b>2</b></th>
                                                                        <th width="10%" class="center"><b>3</b></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Respirasi</td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_respirasit" id="skalameowst-1-1" value="3_1" class="mr-1 skalameowst">&#60;12
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_respirasit" id="skalameowst-1-2" value="0_2" class="mr-1 skalameowst ">12-20
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_respirasit" id="skalameowst-1-3" value="2_3" class="mr-1 skalameowst ">21-25
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_respirasit" id="skalameowst-1-4" value="3_4" class="mr-1 skalameowst ">&#62;25
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Saturasi</td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_saturasit" id="skalameowst-2-1" value="3_1" class="mr-1 skalameowst ">&#60;92
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_saturasit" id="skalameowst-2-2" value="2_2" class="mr-1 skalameowst ">92-95
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_saturasit" id="skalameowst-2-3" value="0_3" class="mr-1 skalameowst ">&#62;95
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> O₂</td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_o2t" id="skalameowst-3-1" value="2_1" class="mr-1 skalameowst ">Ya
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_o2t" id="skalameowst-3-2" value="0_2" class="mr-1 skalameowst ">Tidak
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Suhu</td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_suhut" id="skalameowst-4-1" value="3_1" class="mr-1 skalameowst ">&#60;36
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_suhut" id="skalameowst-4-2" value="0_2" class="mr-1 skalameowst ">36.1-37.2
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_suhut" id="skalameowst-4-3" value="2_3" class="mr-1 skalameowst ">37.5-37.7
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_suhut" id="skalameowst-4-4" value="3_4" class="mr-1 skalameowst ">&#62;37.7
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>TD Sistolik</td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_td_sintolikt" id="skalameowst-5-1" value="3_1" class="mr-1 skalameowst ">&#60;90
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_td_sintolikt" id="skalameowst-5-2" value="0_2" class="mr-1 skalameowst ">90-140
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_td_sintolikt" id="skalameowst-5-3" value="1_3" class="mr-1 skalameowst ">141-150
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_td_sintolikt" id="skalameowst-5-4" value="2_4" class="mr-1 skalameowst ">151-160
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_td_sintolikt" id="skalameowst-5-5" value="3_5" class="mr-1 skalameowst ">&#62;160
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>TD diastolik</td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_td_diastolikt" id="skalameowst-6-1" value="0_1" class="mr-1 skalameowst ">60-90
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_td_diastolikt" id="skalameowst-6-2" value="1_2" class="mr-1 skalameowst ">91-100
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_td_diastolikt" id="skalameowst-6-3" value="2_3" class="mr-1 skalameowst ">101-110
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_td_diastolikt" id="skalameowst-6-4" value="3_4" class="mr-1 skalameowst ">&#62;110
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Nadi</td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_nadit" id="skalameowst-7-1" value="3_1" class="mr-1 skalameowst ">&#60;50
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_nadit" id="skalameowst-7-2" value="2_2" class="mr-1 skalameowst ">50-60
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_nadit" id="skalameowst-7-3" value="0_3" class="mr-1 skalameowst ">61-100
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_nadit" id="skalameowst-7-4" value="1_4" class="mr-1 skalameowst ">101-110
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_nadit" id="skalameowst-7-5" value="2_5" class="mr-1 skalameowst ">111-120
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_nadit" id="skalameowst-7-6" value="3_6" class="mr-1 skalameowst ">&#62;120
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Kesadaran</td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_kesadarant" id="skalameowst-8-1" value="0_1" class="mr-1 skalameowst ">A
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_kesadarant" id="skalameowst-8-2" value="3_2" class="mr-1 skalameowst ">V,P/U
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Nyeri</td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_nyerit" id="skalameowst-9-1" value="0_1" class="mr-1 skalameowst ">Normal
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_nyerit" id="skalameowst-9-2" value="3_2" class="mr-1 skalameowst ">Abnormal
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Pengeluaran/Lochea</td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_pengeluwarant" id="skalameowst-10-1" value="0_1" class="mr-1 skalameowst ">Normal
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_pengeluwarant" id="skalameowst-10-2" value="3_2" class="mr-1 skalameowst ">Abnormal
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Protein urin</td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_proteint" id="skalameowst-11-1" value="2_1" class="mr-1 skalameowst ">+
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_proteint" id="skalameowst-11-2" value="3_2" class="mr-1 skalameowst ">&#62;++
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2"><b>TOTAL</b></td>
                                                                        <td colspan="7">
                                                                            <input type="radio" name="pm_meows" id="total-skalameowst-1" class="mr-1" value="Putih"><i class="fas fa-fw fa-square" style="color: white"></i><b>Putih (0)</b>
                                                                            <input type="radio" name="pm_meows" id="total-skalameowst-2" class="mr-1 ml-3" value="Hijau"><i class="fas fa-fw fa-square" style="color: green"></i><b>Hijau (1-4)</b>
                                                                            <input type="radio" name="pm_meows" id="total-skalameowst-3" class="mr-1 ml-3" value="Kuning"><i class="fas fa-fw fa-square" style="color: yellow"></i><b>Kuning(5-6/skor 3 pd 1 prameter)</b>
                                                                            <input type="radio" name="pm_meows" id="total-skalameowst-4" class="mr-1 ml-3" value="Merah"><i class="fas fa-fw fa-square" style="color: red"></i><b>Merah(≥7)</b>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="card p-2" style="margin-top:-15px">
                                                            <table class="table table-bordered table-sm">
                                                                <thead class="table-info">
                                                                    <tr class="center">
                                                                        <th colspan="10">
                                                                            NEWS
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <th width="5%" class="center"><b>No.</b></th>
                                                                        <th width="15%"><b>Parameter Fisiologis</b></th>
                                                                        <th width="10%" class="center"><b>3</b></th>
                                                                        <th width="10%" class="center"><b>2</b></th>
                                                                        <th width="10%" class="center"><b>1</b></th>
                                                                        <th width="10%" class="center"><b>0</b></th>
                                                                        <th width="10%" class="center"><b>1</b></th>
                                                                        <th width="10%" class="center"><b>2</b></th>
                                                                        <th width="10%" class="center"><b>3</b></th>
                                                                        <th width="10%" class="center"><b>Blue kriteria</b></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="center">1.</td>
                                                                        <td>Laju respirasi / menit</td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_laju_respirasio" id="skalanewso-1-1" value="3_1" class="mr-1 skalanewso">6-8
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_laju_respirasio" id="skalanewso-1-2" value="1_2" class="mr-1 skalanewso ">9-11
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_laju_respirasio" id="skalanewso-1-3" value="0_3" class="mr-1 skalanewso ">12-20
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_laju_respirasio" id="skalanewso-1-4" value="2_4" class="mr-1 skalanewso ">21-24
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_laju_respirasio" id="skalanewso-1-5" value="3_5" class="mr-1 skalanewso ">25-34
                                                                        </td>
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_laju_respirasio" id="skalanewso-1-6" value="bk_6" class="mr-1 skalanewso ">&#8804;5/&#8805;35
                                                                        </td>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="center">2.</td>
                                                                        <td>Saturasi O₂ (%)</td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_saturasio" id="skalanewso-2-1" value="3_1" class="mr-1 skalanewso "> ≤91
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_saturasio" id="skalanewso-2-2" value="2_2" class="mr-1 skalanewso ">92-93
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_saturasio" id="skalanewso-2-3" value="1_3" class="mr-1 skalanewso ">94-95
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_saturasio" id="skalanewso-2-4" value="0_4" class="mr-1 skalanewso "> ≥96
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="center">3.</td>
                                                                        <td>Suplemen O₂</td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_suplemeno" id="skalanewso-3-1" value="2_1" class="mr-1 skalanewso ">Ya
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_suplemeno" id="skalanewso-3-2" value="0_2" class="mr-1 skalanewso ">Tidak
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td class="center">4.</td>
                                                                        <td>Temperatur (°C)</td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_temperaturo" id="skalanewso-4-1" value="3_1" class="mr-1 skalanewso "> ≤35
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_temperaturo" id="skalanewso-4-2" value="1_2" class="mr-1 skalanewso ">35.1-36
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_temperaturo" id="skalanewso-4-3" value="0_3" class="mr-1 skalanewso ">36.1-38
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_temperaturo" id="skalanewso-4-4" value="1_4" class="mr-1 skalanewso ">38.1-39
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_temperaturo" id="skalanewso-4-5" value="2_5" class="mr-1 skalanewso "> ≥39
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="center">5.</td>
                                                                        <td>TDS (mmHG)</td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_tdso" id="skalanewso-5-1" value="3_1" class="mr-1 skalanewso ">71-90
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_tdso" id="skalanewso-5-2" value="1_2" class="mr-1 skalanewso ">91-100
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_tdso" id="skalanewso-5-3" value="0_3" class="mr-1 skalanewso ">101-110
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_tdso" id="skalanewso-5-4" value="1_4" class="mr-1 skalanewso ">111-180
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_tdso" id="skalanewso-5-5" value="2_5" class="mr-1 skalanewso ">181-220
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_tdso" id="skalanewso-5-6" value="3_6" class="mr-1 skalanewso "> ≥221
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_tdso" id="skalanewso-5-7" value="bk_7" class="mr-1 skalanewso "> ≤70
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="center">6.</td>
                                                                        <td>Laju jantung/menit</td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_laju_jantungo" id="skalanewso-6-1" value="3_1" class="mr-1 skalanewso ">41-50
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_laju_jantungo" id="skalanewso-6-2" value="0_2" class="mr-1 skalanewso ">51-90
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_laju_jantungo" id="skalanewso-6-3" value="1_3" class="mr-1 skalanewso ">91-110
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_laju_jantungo" id="skalanewso-6-4" value="2_4" class="mr-1 skalanewso ">111-130
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_laju_jantungo" id="skalanewso-6-5" value="3_5" class="mr-1 skalanewso ">131-140
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_laju_jantungo" id="skalanewso-6-6" value="bk_6" class="mr-1 skalanewso ">&#8804;40/&#8805;140
                                                                        </td>

                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="center">7.</td>
                                                                        <td>Kesadaran</td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_kesadarano" id="skalanewso-7-1" value="0_1" class="mr-1 skalanewso "> A
                                                                        </td>
                                                                        <td class="center"></td>
                                                                        <td class="center"></td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_kesadarano" id="skalanewso-7-2" value="3_2" class="mr-1 skalanewso ">V & P
                                                                        </td>
                                                                        <td class="center">
                                                                            <input type="radio" name="sews_kesadarano" id="skalanewso-7-3" value="bk_3" class="mr-1 skalanewso ">U
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2"><b>TOTAL = </b></td>
                                                                        <td colspan="8">
                                                                            <input type="radio" name="pm_news" id="total-skalanewso-1" class="mr-1" value="Putih"><i class="fas fa-fw fa-square" style="color: white"></i><b>Putih (0)</b>
                                                                            <input type="radio" name="pm_news" id="total-skalanewso-2" class="mr-1 ml-3" value="Hijau"><i class="fas fa-fw fa-square" style="color: green"></i><b>Hijau (1-4)</b>
                                                                            <input type="radio" name="pm_news" id="total-skalanewso-3" class="mr-1 ml-3" value="Kuning"><i class="fas fa-fw fa-square" style="color: yellow"></i><b>Kuning (5-6)</b>
                                                                            <input type="radio" name="pm_news" id="total-skalanewso-4" class="mr-1 ml-3" value="Merah"><i class="fas fa-fw fa-square" style="color: red"></i><b>Merah (≥7/1 Parameter Blue Kriteria)</b>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <p class="ml-1">Keterangan :</p>
                                                        <p class="ml-1">A = Alert (sadar penuh), V = Verbal (respon dengan rangsang suara), P=\ = Pain (respon dengan rangsang nyeri), U = Unrespon</p>
                                                        <p></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#pm-data-penunjang">
                                                            <iclass="fas fa-expand mr-1">
                                                                </iclass=>Expand
                                                        </button>DATA PENUNJANG
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="pm-data-penunjang">
                                                <div class="card p-2" style="margin-top:-15px">
                                                    <table class="table table-no-border table-sm table-striped">
                                                        <tr>
                                                            <td>
                                                                Pemeriksaan Laboratorium, tanggal
                                                                <input type="text" name="pm_tanggal_lab" id="pm-tanggal-lab" class="custom-form clear-input d-inline-block col-lg-1 mx-1" placeholder="dd/mm/yy"> Hasil :
                                                                <input type="text" name="pm_hasil_lab" id="pm-hasil-lab" class="custom-form clear-input d-inline-block col-lg-3 ml-1">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Pemeriksaan Cardiotokografi (CTG), tanggal
                                                                <input type="text" name="pm_tanggal_cgt" id="pm-tanggal-cgt" class="custom-form clear-input d-inline-block col-lg-1 mx-1" placeholder="dd/mm/yy"> Hasil :
                                                                <input type="text" name="pm_hasil_cgt" id="pm-hasil-cgt" class="custom-form clear-input d-inline-block col-lg-3 ml-1">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Lain-lain, sebutkan
                                                                <input type="text" name="pm_penunjang_lain" id="pm-penunjang-lain" class="custom-form clear-input d-inline-block col-lg-3 ml-1">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#pm-assesmen-kebidanan">
                                                            <iclass="fas fa-expand mr-1">
                                                                </iclass=>Expand
                                                        </button>ASSESMEN KEBIDANAN
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="pm-assesmen-kebidanan">
                                                <div class="card p-2" style="margin-top:-15px">
                                                    <table class="table table-no-border table-sm table-striped">
                                                        <tr>
                                                            <td>
                                                                Masalah & kebutuhan :
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="pm_infeksi" id="pm-infeksi" value="1" class="mr-1">Resiko infeksi
                                                                <input type="checkbox" name="pm_pendarahan" id="pm-pendarahan" value="1" class="ml-3 mr-1">Resiko perdarahan
                                                                <input type="checkbox" name="pm_nausea" id="pm-nausea" value="1" class="ml-3 mr-1">Nausea
                                                                <input type="checkbox" name="pm_gawat_jalan" id="pm-gawat-jalan" value="1" class="ml-3 mr-1">Resiko gawat janin
                                                                <input type="checkbox" name="pm_anxietas" id="pm-anxietas" value="1" class="ml-3 mr-1">Anxietas
                                                                <input type="checkbox" name="pm_nyeri_melahirkan" id="pm-pm_nyeri_melahirkan" value="1" class="ml-3 mr-1">Nyeri akut/kronis/melahirkan*
                                                                <input type="checkbox" name="pm_pola_nafas" id="pm-pola-nafas" value="1" class="ml-3 mr-1">Pola nafas tidak efektif
                                                                <input type="checkbox" name="pm_kebutuhan_lain" id="pm-kebutuhan-lain" value="1" class="ml-3 mr-1">Lain-lain, sebutkan
                                                                <input type="text" name="pm_kebutuhan_sebutkan" id="pm-kebutuhan-sebutkan" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#pm-asuhan-kebidanan">
                                                            <iclass="fas fa-expand mr-1">
                                                                </iclass=>Expand
                                                        </button>RENCANA ASUHAN KEBIDANAN
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="pm-asuhan-kebidanan">
                                                <div class="card p-2" style="margin-top:-15px">
                                                    <table class="table table-no-border table-sm table-striped">
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="pm_asuhan_jelaskan" id="pm-asuhan-jelaskan" value="1" class="mr-1">Jelaskan hasil pemeriksaan kepada pasien dan keluarga
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="pm_asuhan_laporkan" id="pm-asuhan-laporkan" value="1" class="mr-1">Laporkan hasil pemeriksaan kepada DPJP untuk penanganan selanjutnya
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="pm_asuhan_fasilitas" id="pm-asuhan-fasilitas" value="1" class="mr-1">Fasilitasi surat informed consent
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="pm_asuhan_masalah" id="pm-asuhan-masalah" value="1" class="mr-1">Lakukan asuhan kebidanan sesuai masalah dan kebutuhan
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="pm_asuhan_observasi" id="pm-asuhan-observasi" value="1" class="mr-1">Lakukan observasi persalinan
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="pm_asuhan_edukasi" id="pm-asuhan-edukasi" value="1" class="mr-1">Lakukan edukasi kepada pasien
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="pm_asuhan_lain" id="pm-asuhan-lain" value="1" class="mr-1">Lain-lain, sebutkan
                                                                <input type="text" name="pm_asuhan_sebutkan" id="pm-asuhan-sebutkan" class="custom-form clear-input d-inline-block col-lg-3 ml-1 disabled">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="card p-2" style="margin-top:-15px">
                                                <table class="table table-no-border table-sm table-striped">
                                                    <tr>
                                                        <td colspan="6" class="td-dark"><b></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%">
                                                            Tanggal & Jam
                                                        </td>
                                                        <td width="1%">:</td>
                                                        <td>
                                                            <input type="text" name="pm_waktu_bidan" id="pm-waktu-bidan" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="Masukkan tanggal & jam">
                                                        </td>
                                                        <td width="10%">
                                                            Tanggal & Jam
                                                        </td>
                                                        <td width="1%">:</td>
                                                        <td>
                                                            <input type="text" name="pm_waktu_dpjp" id="pm-waktu-dpjp" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="Masukkan tanggal & jam">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%">
                                                            Nama Bidan
                                                        </td>
                                                        <td width="1%">:</td>
                                                        <td>
                                                            <input type="text" name="pm_bidan" id="pm-bidan" class="select2c-input ml-2">
                                                        </td>
                                                        <td width="10%">
                                                            Dokter Verifikasi DPJP
                                                        </td>
                                                        <td width="1%">:</td>
                                                        <td>
                                                            <input type="text" name="pm_dpjp" id="pm-dpjp" class="select2c-input ml-2">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="center">
                                                            Tanda Tangan Bidan
                                                        </td>
                                                        <td colspan="3" class="center">
                                                            Verifikasi DPJP dan Tanda Tangan
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="center">
                                                            <input type="checkbox" name="pm_paraf_bidan" id="pm-paraf-bidan" value="1" class="custom-form col-lg-1 mx-auto">
                                                            <?= digitalSignature('pm-paraf-bidan-verified') ?>
                                                        </td>
                                                        <td colspan="3" class="center">
                                                            <input type="checkbox" name="pm_paraf_dpjp" id="pm-paraf-dpjp" value="1" class="custom-form col-lg-1 mx-auto">
                                                            <?= digitalSignature('pm-paraf-dpjp-verified') ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info" onclick="konfirmasiPengkajianMaternal()" id="btn_simpant"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
            </div>
        </div>
    </div>
</div> -->
<!-- End Modal -->