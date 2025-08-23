<!-- // MRMERM -->
<script>
    $(function() {
        $('#mcu-tanggal-surat').datetimepicker({
            format: 'DD/MM/YYYY',
            pickSecond: false,
            pick12HourFormat: false,
            maxDate: new Date(),
            beforeShow: function(i) {
                if ($(i).attr('readonly')) {
                    return false;
                }
            }
        });

        $('#mcu-dokter').select2c({
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
                $('#dokter-informasi').val(data.id);
                return data.nama;
            }
        });

    })

    function lihatFORM_MCU_21_00(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'lihat';
		cetakResumeMedis(layanan.id_pendaftaran, layanan.id, action);
	}

	function editFORM_MCU_21_00(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'edit';
		cetakResumeMedis(layanan.id_pendaftaran, layanan.id, action);
	}

	function tambahFORM_MCU_21_00(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'tambah';
		cetakResumeMedis(layanan.id_pendaftaran, layanan.id, action);
	}

    // url: '<!?= base_url('medical_check_up/api/medical_check_up/form_rekam_medis') ?>/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
                // $('#id-pendaftaran-mcu').val(id);





    function cetakResumeMedis(id_pendaftaran, id_layanan_pendaftaran) {
        $('#modal_resume_medis_erm').modal('show');
        resetFormData();
        $.ajax({
            type: 'GET',


            url: '<?= base_url('medical_check_up/api/medical_check_up/form_rekam_medis') ?>/id/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,

            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // Set all values first

                if (data.data_resume_medis.tinggi_badan && data.data_resume_medis.berat_badan) {
                    var tinggi_badan_dalam_meter = data.data_resume_medis.tinggi_badan / 100;
                    var bmi = data.data_resume_medis.berat_badan / (tinggi_badan_dalam_meter * tinggi_badan_dalam_meter);
                    $('#mcu-bmi').val(bmi.toFixed(4));
                } else {
                    $('#mcu-bmi').val('');
                }

                // Set values in modal
                $('#id-layanan-pendaftaran-mcu').val(id_layanan_pendaftaran);

                $('#id-pendaftaran-mcu').val(id_pendaftaran);


                $('#modal_resume_medis_erm_title').html(
                    `<b>Form Resume Medical Check Up</b> | No. RM: ${data.pendaftaran_detail.pasien.id_pasien}, Nama: ${data.pendaftaran_detail.pasien.nama}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data.pendaftaran_detail.pasien.telp}</b></i>`
                );
                $('#mcu-nama-pasien').val(data.pendaftaran_detail.pasien.nama);
                $('#mcu-jenis-kelamin').val(data.pendaftaran_detail.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan');
                $('#mcu-tanggal-lahir').val(datefmysql(data.pendaftaran_detail.pasien.tanggal_lahir));
                $('#mcu-alamat').val(data.pendaftaran_detail.pasien.alamat);
                $('#mcu-pekerjaan').val(data.pendaftaran_detail.pasien.pekerjaan);
                $('#mcu-keperluan').val(data.data_resume_medis.keperluan);
                $('#mcu-ksi').val(data.data_resume_medis.keluhan_utama);
                $('#mcu-rpd').val(data.data_resume_medis.riwayat_penyakit_dahulu);
                $('#mcu-rpk').val(data.data_resume_medis.riwayat_penyakit_keluarga);
                $('#mcu-tinggi-badan').val(data.data_resume_medis.tinggi_badan);
                $('#mcu-berat-badan').val(data.data_resume_medis.berat_badan);
                $('#mcu-tensi-sistolik').val(data.data_resume_medis.tensi_sistolik);
                $('#mcu-tensi-diastolik').val(data.data_resume_medis.tensi_diastolik);
                $('#mcu-nadi').val(data.data_resume_medis.nadi);
                $('#mcu-rr').val(data.data_resume_medis.rr);
                $('#mcu-kepala').val(data.data_resume_medis.kepala);
                $('#mcu-kulit').val(data.data_resume_medis.kulit_kelamin);
                $('#mcu-mata').val(data.data_resume_medis.mata);
                $('#mcu-persepsi-warna').val(data.data_resume_medis.mcu_persepsi_warna);
                $('#mcu-jauh-od').val(data.data_resume_medis.mcu_jauh_od);
                $('#mcu-jauh-os').val(data.data_resume_medis.mcu_jauh_os);
                $('#mcu-dekat-od').val(data.data_resume_medis.mcu_dekat_od);
                $('#mcu-dekat-os').val(data.data_resume_medis.mcu_dekat_os);
                $('#mcu-konjungtiva').val(data.data_resume_medis.mcu_konjungtiva);
                $('#mcu-sklera').val(data.data_resume_medis.mcu_sklera);
                $('#mcu-komea').val(data.data_resume_medis.mcu_komea);
                $('#mcu-telinga').val(data.data_resume_medis.telinga);
                $('#mcu-hidung').val(data.data_resume_medis.hidung);
                $('#mcu-tenggorokan').val(data.data_resume_medis.tenggorok);
                $('#mcu-gdm').val(data.data_resume_medis.mcu_gdm);
                $('#mcu-leher').val(data.data_resume_medis.leher);
                $('#mcu-dada').val(data.data_resume_medis.thorax);
                $('#mcu-jantung').val(data.data_resume_medis.mcu_jantung);
                $('#mcu-paru').val(data.data_resume_medis.pulmo);
                $('#mcu-abdomen').val(data.data_resume_medis.abdomen);
                $('#mcu-anggota-gerak').val(data.data_resume_medis.ekstrimitas);
                $('#mcu-pemeriksaan-penunjang').val(data.data_resume_medis.pemeriksaan_penunjang);
                $('#mcu-kesimpulan').val(data.data_resume_medis.kritik);
                $('#mcu-saran').val(data.data_resume_medis.saran);
                $('#mcu-status-kesehatan').val(data.data_resume_medis.mcu_status_kesehatan);
                $('#mcu-status-kesehatan').val(data.data_resume_medis.mcu_status_kesehatan);
                $('#mcu-dokter').val(data.data_resume_medis.mcu_dokter);
                $('#mcu-dokter-nik').val(data.data_resume_medis.nip_dokter);
                $('#s2id_mcu-dokter a .select2c-chosen').html(data.data_resume_medis.nama_dokter);
                $('#mcu-tanggal-surat').val(datefmysql(data.data_resume_medis.mcu_tanggal_surat));
                $('#modal_resume_medis_erm').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });

    }



            // url: '<!?= base_url('medical_check_up/api/medical_check_up/form_rekam_medis') ?>/id/' + id + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,





        // function cetakResumeMedis(id_pendaftaran, id_layanan_pendaftaran) {
        //     $('#modal_resume_medis_erm').modal('show');
        //     resetFormData();

        //     // ==== GET dari API MCU ====
        //     $.ajax({
        //         type: 'GET',
        //         url: '<?= base_url("medical_check_up/api/medical_check_up/form_rekam_medis") ?>/id/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
        //         cache: false,
        //         dataType: 'JSON',
        //         beforeSend: function() {
        //             showLoader();
        //         },
        //         success: function(data) {
        //             // === logika lama kamu di sini (set value form MCU) ===
        //             if (data.data_resume_medis.tinggi_badan && data.data_resume_medis.berat_badan) {
        //                 var tinggi_badan_dlm_meter = data.data_resume_medis.tinggi_badan / 100;
        //                 var bmi = data.data_resume_medis.berat_badan / (tinggi_badan_dlm_meter * tinggi_badan_dlm_meter);
        //                 $('#mcu-bmi').val(bmi.toFixed(4));
        //             } else {
        //                 $('#mcu-bmi').val('');
        //             }

        //             $('#id-layanan-pendaftaran-mcu').val(id_layanan_pendaftaran);
        //             $('#id-pendaftaran-mcu').val(id_pendaftaran);

        //             // $('#modal-resume-medis-title').html(
        //             //     `<b>Form Resume Medical Check Up</b> | No. RM: ${data.pendaftaran_detail.pasien.id_pasien}, Nama: ${data.pendaftaran_detail.pasien.nama}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data.pendaftaran_detail.pasien.telp}</b></i>`
        //             // );

        //             $('#mcu-nama-pasien').val(data.pendaftaran_detail.pasien.nama);
        //             $('#mcu-jenis-kelamin').val(data.pendaftaran_detail.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan');
        //             $('#mcu-tanggal-lahir').val(datefmysql(data.pendaftaran_detail.pasien.tanggal_lahir));
        //             $('#mcu-alamat').val(data.pendaftaran_detail.pasien.alamat);
        //             $('#mcu-pekerjaan').val(data.pendaftaran_detail.pasien.pekerjaan);
        //             $('#mcu-keperluan').val(data.data_resume_medis.keperluan);
        //             $('#mcu-ksi').val(data.data_resume_medis.keluhan_utama);
        //             $('#mcu-rpd').val(data.data_resume_medis.riwayat_penyakit_dahulu);
        //             $('#mcu-rpk').val(data.data_resume_medis.riwayat_penyakit_keluarga);
        //             $('#mcu-tinggi-badan').val(data.data_resume_medis.tinggi_badan);
        //             $('#mcu-berat-badan').val(data.data_resume_medis.berat_badan);
        //             $('#mcu-tensi-sistolik').val(data.data_resume_medis.tensi_sistolik);
        //             $('#mcu-tensi-diastolik').val(data.data_resume_medis.tensi_diastolik);
        //             $('#mcu-nadi').val(data.data_resume_medis.nadi);
        //             $('#mcu-rr').val(data.data_resume_medis.rr);
        //             $('#mcu-kepala').val(data.data_resume_medis.kepala);
        //             $('#mcu-kulit').val(data.data_resume_medis.kulit_kelamin);
        //             $('#mcu-mata').val(data.data_resume_medis.mata);
        //             $('#mcu-persepsi-warna').val(data.data_resume_medis.mcu_persepsi_warna);
        //             $('#mcu-jauh-od').val(data.data_resume_medis.mcu_jauh_od);
        //             $('#mcu-jauh-os').val(data.data_resume_medis.mcu_jauh_os);
        //             $('#mcu-dekat-od').val(data.data_resume_medis.mcu_dekat_od);
        //             $('#mcu-dekat-os').val(data.data_resume_medis.mcu_dekat_os);
        //             $('#mcu-konjungtiva').val(data.data_resume_medis.mcu_konjungtiva);
        //             $('#mcu-sklera').val(data.data_resume_medis.mcu_sklera);
        //             $('#mcu-komea').val(data.data_resume_medis.mcu_komea);
        //             $('#mcu-telinga').val(data.data_resume_medis.telinga);
        //             $('#mcu-hidung').val(data.data_resume_medis.hidung);
        //             $('#mcu-tenggorokan').val(data.data_resume_medis.tenggorok);
        //             $('#mcu-gdm').val(data.data_resume_medis.mcu_gdm);
        //             $('#mcu-leher').val(data.data_resume_medis.leher);
        //             $('#mcu-dada').val(data.data_resume_medis.thorax);
        //             $('#mcu-jantung').val(data.data_resume_medis.mcu_jantung);
        //             $('#mcu-paru').val(data.data_resume_medis.pulmo);
        //             $('#mcu-abdomen').val(data.data_resume_medis.abdomen);
        //             $('#mcu-anggota-gerak').val(data.data_resume_medis.ekstrimitas);
        //             $('#mcu-pemeriksaan-penunjang').val(data.data_resume_medis.pemeriksaan_penunjang);
        //             $('#mcu-kesimpulan').val(data.data_resume_medis.kritik);
        //             $('#mcu-saran').val(data.data_resume_medis.saran);
        //             $('#mcu-status-kesehatan').val(data.data_resume_medis.mcu_status_kesehatan);
        //             $('#mcu-status-kesehatan').val(data.data_resume_medis.mcu_status_kesehatan);
        //             $('#mcu-dokter').val(data.data_resume_medis.mcu_dokter);
        //             $('#mcu-dokter-nik').val(data.data_resume_medis.nip_dokter);
        //             $('#s2id_mcu-dokter a .select2c-chosen').html(data.data_resume_medis.nama_dokter);
        //             $('#mcu-tanggal-surat').val(datefmysql(data.data_resume_medis.mcu_tanggal_surat));
        //             $('#modal_resume_medis_erm').modal('show');
                    
        //             // dst... isi field MCU lainnya
        //         },
        //         complete: function() {
        //             hideLoader();
        //         },
        //         error: function(e) {
        //             accessFailed(e.status);
        //         }
        //     });

        //     // ==== GET dari API Pelayanan ====
        //     $.ajax({
        //         type: 'GET',
        //         url: '<?= base_url("pelayanan/api/pelayanan/get_data_entri_keperawatan") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
        //         cache: false,
        //         dataType: 'JSON',
        //         success: function(data) {
        //             if (data.pasien !== null) {
        //                  $('#modal-resume-medis-title').html(
        //                 `<b>Form Resume Medical Check Up</b> | No. RM: ${data.pasien.id_pasien}, Nama: ${data.pasien.nama}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data.pasien.telp}</b></i>`
        //             );
        //             }
        //         },
        //         error: function(e) {
        //             console.error("Gagal load data pelayanan", e);
        //         }
        //     });

        // }





















    function simpanMcu() {
        if ($('#mcu-tanggal-surat').val() === '') {
            syams_validation('#mcu-tanggal-surat', 'Tanggal harus diisi.');
            return false;
        } else {
            syams_validation_remove('#mcu-tanggal-surat');
        }

        if ($('#mcu-dokter').val() === '') {
            syams_validation('#mcu-dokter', 'Nama Dokter belum diisi.');
            return false;
        } else {
            syams_validation_remove('#mcu-dokter');
        }
        var id = $('#id-layanan-pendaftaran-mcu').val();
        $.ajax({
            type: 'POST',
            url: '<?= base_url("medical_check_up/api/medical_check_up/simpan_mcu") ?>',
            data: $('#resume-medis-erm').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status) {
                    messageCustom(data.message, 'Success');

                    var dWidth = $(window).width();
                    var dHeight = $(window).height();
                    var x = screen.width / 2 - dWidth / 2;
                    var y = screen.height / 2 - dHeight / 2;

                    $('#modal_resume_medis_erm').modal('hide');

                    window.open('<?= base_url('medical_check_up/cetak_surat_hrm/') ?>' + id,
                        'Cetak Surat Hasil Resume Medical Check Up', 'width=' + dWidth + ', height=' +
                        dHeight +
                        ', left=' + x + ', top=' + y);
                } else {
                    messageCustom(data.message, 'Error');
                }
            },
            complete: function(data) {
                hideLoader();
            },
            error: function(e) {
                messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
            }
        });
    }




    function resetFormData() {
        // form search
        $('#tanggal-awal, #tanggal-akhir').val('<?= date('d/m/Y') ?>');
        $('#layanan, #no-register-search, #no-rm-search, #nik-search, #nama-search').val('');

        $('.custom-textarea, .custom-form').val('');
        $('.select2-chosen').html('');
        $('#unit').val('314');
        $('#s2id_unit a .select2c-chosen').html('Medical Check Up');
        $('#table-diagnosa tbody, #table-tindakan tbody').empty();

        // validasi
        syams_validation_remove('.validasi-input');
        syams_validation_remove('.select2-input');

        //anamnesis
        $('#id-anamnesa-asli, #id-anamnesa-pilih').val('');
        $('#s2id_listanamnesa a .select2c-chosen').html('');

        // resume medis
        $('#mcu-no-surat, #mcu-tahun-surat, #mcu-nama-pasien, #mcu-jenis-kelamin, #mcu-tanggal-lahir, #mcu-alamat, #mcu-pekerjaan, #mcu-keperluan, #mcu-ksi, #mcu-rpd, #mcu-rpk, #mcu-tinggi-badan, #mcu-berat-badan, #mcu-bmi,#mcu-tensi-sistolik, #mcu-tensi-diastolik, #mcu-nadi, #mcu-rr, #mcu-kepala, #mcu-kulit, #mcu-mata, #mcu-persepsi-warna, #mcu-jauh-od, #mcu-jauh-os, #mcu-dekat-od, #mcu-dekat-os, #mcu-konjungtiva, #mcu-sklera, #mcu-komea, #mcu-telinga, #mcu-hidung, #mcu-tenggorokan, #mcu-gdm, #mcu-leher, #mcu-dada, #mcu-paru, #mcu-abdomen, #mcu-anggota-gerak, #mcu-pemeriksaan-penunjang, #mcu-kesimpulan, #mcu-saran, #mcu-status-kesehatan, #mcu-dokter, #mcu-dokter-nik')
            .val('');

        $('#s2id_mcu-dokter a .select2c-chosen').html('');
        $('#mcu-tanggal-surat').val('<?= date('d/m/Y') ?>');
    }




















</script>