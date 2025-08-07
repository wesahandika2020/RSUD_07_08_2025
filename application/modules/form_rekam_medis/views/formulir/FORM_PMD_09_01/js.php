<script>
    function lihatFORM_PMD_09_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;

        let action = 'lihat';
        // window.open('<?= base_url('rawat_inap/cetak_surat_kenal_lahir/') ?>' + pasien.id, 'Cetak Surat Kenal Lahir', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
        window.open('<?= base_url('rawat_inap/cetak_surat_peryataan_pulang_rawat_atas_permintaan_sendiri/') ?>' + pasien.id, 'Cetak Surat Peryataan Pulang Rawat Atas Permintaan Sendiri', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
    }

    function editFORM_PMD_09_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;

        let action = 'edit';
        cetakSuratPeryataanPulangRawatAtasPermintaanSendiriERM(layanan.id_pendaftaran, layanan.id, action);
    }

    function tambahFORM_PMD_09_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;

        let action = 'tambah';
        cetakSuratPeryataanPulangRawatAtasPermintaanSendiriERM(layanan.id_pendaftaran, layanan.id, action);
    }

    // SPPRAPS WH  
    function cetakSuratPeryataanPulangRawatAtasPermintaanSendiriERM(id_pendaftaran, id_layanan, action) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('rawat_inap/api/rawat_inap/check_surat_peryataan_pulang_rawat_atas_permintaan_sendiri') ?>/id/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // Reset all values first
                let pasien = data.pasien;
                let layanan = data.layanan;
                let data_sppraps = data.data_sppraps;

                resetModalSuratPeryataanPulangRawatAtasPermintaanSendiriERM();
                $('#modal-surat-peryataan-pulang-rawat-atas-permintaan-sendiri-title').html(
                    `<b>Form Surat Peryataan Pulang Rawat Atas Permintaan Sendiri</b> | No. RM: ${pasien.no_rm}, Nama: ${pasien.nama}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${pasien.telp}</b></i>`
                );

                $('#id-pendaftaran-sppraps').val(id_pendaftaran);
                $('#id-layanan-pendaftaran-sppraps').val(id_layanan);
                $('#id-pasien-sppraps').val(pasien.id_pasien);

                document.getElementById("ya-sppraps-1").checked = true;
                document.getElementById("diri-sppraps-1").checked = true;
                // Disabled fields
                $("#nama-sppraps").prop("disabled", true);
                $("#tgl-lahir-sppraps").prop("disabled", true);
                $("#tahun-sppraps").prop("disabled", true);
                $("#jenis-kelamin-tahun-sppraps-1").prop("disabled", true);
                $("#jenis-kelamin-tahun-sppraps-2").prop("disabled", true);
                $("#alamat-sppraps").prop("disabled", true);
                $("#rt-sppraps").prop("disabled", true);
                $("#rw-sppraps").prop("disabled", true);
                $("#kelurahan-sppraps").prop("disabled", true);
                $("#kecamatan-sppraps").prop("disabled", true);
                $("#kota-sppraps").prop("disabled", true);
                $("#nomor-ktp-sppraps").prop("disabled", true);
                $('#nomor-tlp-sppraps').prop("disabled", true);

                $("#nama-sppraps1").prop("readonly", true);
                $("#nomor-rekam-sppraps").prop("readonly", true);
                $("#tgl-lahir-sppraps1").prop("readonly", true);
                $("#tahun-sppraps1").prop("readonly", true);
                $("#jenis-kelamin-tahun-sppraps-11").prop("readonly", true);
                $("#jenis-kelamin-tahun-sppraps-12").prop("readonly", true);

                $("#nama-sppraps1").val(pasien.nama);
                $("#nomor-rekam-sppraps").val(pasien.no_rm);
                $("#tgl-lahir-sppraps1").val(pasien.tanggal_lahir);

                let tglLahir = hitungUmur(pasien.tanggal_lahir);
                let index = tglLahir.indexOf("Tahun");
                let umurTahun = tglLahir.substring(0, index).trim();
                $("#tahun-sppraps1").val(umurTahun);
                // $("#jenis-kelamin-tahun-sppraps-11").val();
                // $("#jenis-kelamin-tahun-sppraps-12").val();

                if (pasien.kelamin == 'L') {
                    document.getElementById("jenis-kelamin-tahun-sppraps-11").checked = true;
                } else if (pasien.kelamin == 'P') {
                    document.getElementById("jenis-kelamin-tahun-sppraps-12").checked = true;
                }

                $('#ttd-dokter-sppraps').val(layanan.id_dokter_dpjp ?? layanan.id_dokter_dpjp_ic);
                $('#s2id_ttd-dokter-sppraps a .select2c-chosen').html(layanan.dokter_dpjp ?? layanan.dokter_dpjp_ic);
                $('#kelas-sppraps').val(layanan.id_bangsal ?? layanan.id_bangsal_ic);
                $('#s2id_kelas-sppraps a .select2c-chosen').html(layanan.bangsal ?? layanan.bangsal_ic);
                $('#dokter-sppraps').val(layanan.id_dokter_dpjp ?? layanan.id_dokter_dpjp_ic);
                $('#s2id_dokter-sppraps a .select2c-chosen').html(layanan.dokter_dpjp ?? layanan.dokter_dpjp_ic);
                $("#ttd-pasien-sppraps").val(pasien.nama);

                if (data_sppraps !== null) {
                    $('#nama-sppraps').val(data_sppraps.nama_sppraps);
                    $('#tgl-lahir-sppraps').val(data_sppraps.tgl_lahir_sppraps);
                    $('#tahun-sppraps').val(data_sppraps.tahun_sppraps);
                    $('#alamat-sppraps').val(data_sppraps.alamat_sppraps);
                    $('#rt-sppraps').val(data_sppraps.rt_sppraps);
                    $('#rw-sppraps').val(data_sppraps.rw_sppraps);
                    $('#kelurahan-sppraps').val(data_sppraps.kelurahan_sppraps);
                    $('#kecamatan-sppraps').val(data_sppraps.kecamatan_sppraps);
                    $('#kota-sppraps').val(data_sppraps.kota_sppraps);
                    $('#nomor-ktp-sppraps').val(data_sppraps.nomor_ktp_sppraps);
                    $('#nomor-tlp-sppraps').val(data_sppraps.nomor_tlp_sppraps);
                    if (data_sppraps.ya_sppraps === '1') {
                        document.getElementById("ya-sppraps-1").checked = true;
                        // Disabled fields
                        $("#nama-sppraps").prop("disabled", true);
                        $("#tgl-lahir-sppraps").prop("disabled", true);
                        $("#tahun-sppraps").prop("disabled", true);
                        $("#jenis-kelamin-tahun-sppraps-1").prop("disabled", true);
                        $("#jenis-kelamin-tahun-sppraps-2").prop("disabled", true);
                        $("#alamat-sppraps").prop("disabled", true);
                        $("#rt-sppraps").prop("disabled", true);
                        $("#rw-sppraps").prop("disabled", true);
                        $("#kelurahan-sppraps").prop("disabled", true);
                        $("#kecamatan-sppraps").prop("disabled", true);
                        $("#kota-sppraps").prop("disabled", true);
                        $("#nomor-ktp-sppraps").prop("disabled", true);
                        $("#nomor-tlp-sppraps").prop("disabled", true);
                    } else if (data_sppraps.ya_sppraps === '0') {
                        document.getElementById("tidak-sppraps-2").checked = true;
                        // Undisabled fields
                        $("#nama-sppraps").prop("disabled", false);
                        $("#tgl-lahir-sppraps").prop("disabled", false);
                        $("#tahun-sppraps").prop("disabled", false);
                        $("#jenis-kelamin-tahun-sppraps-1").prop("disabled", false);
                        $("#jenis-kelamin-tahun-sppraps-2").prop("disabled", false);
                        $("#alamat-sppraps").prop("disabled", false);
                        $("#rt-sppraps").prop("disabled", false);
                        $("#rw-sppraps").prop("disabled", false);
                        $("#kelurahan-sppraps").prop("disabled", false);
                        $("#kecamatan-sppraps").prop("disabled", false);
                        $("#kota-sppraps").prop("disabled", false);
                        $("#nomor-ktp-sppraps").prop("disabled", false);
                        $("#nomor-tlp-sppraps").prop("disabled", false);
                    }
                    if (data_sppraps.jenis_kelamin_tahun_sppraps == 'L') {
                        document.getElementById("jenis-kelamin-tahun-sppraps-1").checked = true;
                    } else if (data_sppraps.jenis_kelamin_tahun_sppraps == 'P') {
                        document.getElementById("jenis-kelamin-tahun-sppraps-2").checked = true;
                    }
                    $('#nama-sppraps1').val(data_sppraps.nama_sppraps1);
                    $('#nomor-rekam-sppraps').val(data_sppraps.nomor_rekam_sppraps);
                    $('#tgl-lahir-sppraps1').val(data_sppraps.tgl_lahir_sppraps1);
                    $('#tahun-sppraps1').val(data_sppraps.tahun_sppraps1);

                    $('#kelas-sppraps').val(data_sppraps.kelas_sppraps);
                    $('#s2id_kelas-sppraps a .select2c-chosen').html(data_sppraps.nama_bangsal);

                    // console.log(data_sppraps.nama_bangsal);

                    $('#alasanaps-sppraps').val(data_sppraps.alasanaps_sppraps);


                    $('#dokter-sppraps').val(data_sppraps.dokter_sppraps);
                    $('#s2id_dokter-sppraps a .select2c-chosen').html(data_sppraps.dokter_1);
                    $('#tanggal-dokter-sppraps').val((data_sppraps.tanggal_dokter_sppraps !== null ? datetimefmysql(data_sppraps.tanggal_dokter_sppraps) : ''));
                    $('#ttd-dokter-sppraps').val(data_sppraps.ttd_dokter_sppraps);
                    $('#s2id_ttd-dokter-sppraps a .select2c-chosen').html(data_sppraps.dokter_2);
                    if (data_sppraps.ceklis_ttd_dokter_sppraps === '1') {
                        document.getElementById("ceklis-ttd-dokter-sppraps").checked = true;
                    }
                    $('#ttd-pasien-sppraps').val(data_sppraps.ttd_pasien_sppraps);
                    if (data_sppraps.ceklis_ttd_pasien_sppraps === '1') {
                        document.getElementById("ceklis-ttd-pasien-sppraps").checked = true;
                    }
                    if (data_sppraps.diri_sppraps === '1') {
                        document.getElementById("diri-sppraps-1").checked = true;
                        // Disabled fields
                        $("#nama-sppraps1").prop("readonly", true);
                        $("#nomor-rekam-sppraps").prop("readonly", true);
                        $("#tgl-lahir-sppraps1").prop("readonly", true);
                        $("#tahun-sppraps1").prop("readonly", true);
                        $("#jenis-kelamin-tahun-sppraps-11").prop("readonly", true);
                        $("#jenis-kelamin-tahun-sppraps-12").prop("readonly", true);
                        // $( "#kelas-sppraps" ).prop( "readonly", true );
                    } else if (data_sppraps.diri_sppraps === '2') {
                        document.getElementById("diri-sppraps-2").checked = true;
                        document.getElementById("diri-sppraps-3").checked = true;
                        document.getElementById("diri-sppraps-4").checked = true;
                        document.getElementById("diri-sppraps-5").checked = true;
                        document.getElementById("diri-sppraps-6").checked = true;
                        document.getElementById("diri-sppraps-7").checked = true;
                        // Undisabled fields
                        $("#nama-sppraps1").prop("readonly", false);
                        $("#nomor-rekam-sppraps").prop("readonly", false);
                        $("#tgl-lahir-sppraps1").prop("readonly", false);
                        $("#tahun-sppraps1").prop("readonly", false);
                        $("#jenis-kelamin-tahun-sppraps-11").prop("readonly", false);
                        $("#jenis-kelamin-tahun-sppraps-12").prop("readonly", false);
                        // $( "#kelas-sppraps" ).prop( "disabled", false );
                    }
                    if (data_sppraps.diri_sppraps == 2) {
                        document.getElementById("diri-sppraps-2").checked = true;
                    } else if (data_sppraps.diri_sppraps == 3) {
                        document.getElementById("diri-sppraps-3").checked = true;
                    }
                    if (data_sppraps.diri_sppraps == 4) {
                        document.getElementById("diri-sppraps-4").checked = true;
                    } else if (data_sppraps.diri_sppraps == 5) {
                        document.getElementById("diri-sppraps-5").checked = true;
                    }
                    if (data_sppraps.diri_sppraps == 6) {
                        document.getElementById("diri-sppraps-6").checked = true;
                    } else if (data_sppraps.diri_sppraps == 7) {
                        document.getElementById("diri-sppraps-7").checked = true;
                    }
                    if (data_sppraps.jenis_kelamin_tahun_sppraps1 == 'L') {
                        document.getElementById("jenis-kelamin-tahun-sppraps-11").checked = true;
                    } else if (data_sppraps.jenis_kelamin_tahun_sppraps1 == 'P') {
                        document.getElementById("jenis-kelamin-tahun-sppraps-12").checked = true;
                    }
                }

                // On change for radio button is pasien 1
                $('input[type=radio][name=ya_sppraps]').change(function() {
                    // Conditions
                    if (this.value === '1') {
                        // Set fields to empty string
                        $('#nama-sppraps').val('');
                        $('#tgl-lahir-sppraps').val('');
                        $('#tahun-sppraps').val('');
                        document.getElementById("jenis-kelamin-tahun-sppraps-1").checked = false;
                        document.getElementById("jenis-kelamin-tahun-sppraps-2").checked = false;
                        $('#alamat-sppraps').val('');
                        $('#rt-sppraps').val('');
                        $('#rw-sppraps').val('');
                        $('#kelurahan-sppraps').val('');
                        $('#kecamatan-sppraps').val('');
                        $('#kota-sppraps').val('');
                        $('#nomor-ktp-sppraps').val('');
                        $('#nomor-tlp-sppraps').val('');

                        // Disabled fields
                        $("#nama-sppraps").prop("disabled", true);
                        $("#tgl-lahir-sppraps").prop("disabled", true);
                        $("#tahun-sppraps").prop("disabled", true);
                        $("#jenis-kelamin-tahun-sppraps-1").prop("disabled", true);
                        $("#jenis-kelamin-tahun-sppraps-2").prop("disabled", true);
                        $("#alamat-sppraps").prop("disabled", true);
                        $("#rt-sppraps").prop("disabled", true);
                        $("#rw-sppraps").prop("disabled", true);
                        $("#kelurahan-sppraps").prop("disabled", true);
                        $("#kecamatan-sppraps").prop("disabled", true);
                        $("#kota-sppraps").prop("disabled", true);
                        $("#nomor-ktp-sppraps").prop("disabled", true);
                        $("#nomor-tlp-sppraps").prop("disabled", true);

                        $("#ttd-pasien-sppraps").val(pasien.nama);
                        document.getElementById("diri-sppraps-1").checked = true;
                    } else if (this.value === '0') {
                        // Undisabled fields
                        $("#nama-sppraps").prop("disabled", false);
                        $("#tgl-lahir-sppraps").prop("disabled", false);
                        $("#tahun-sppraps").prop("disabled", false);
                        $("#jenis-kelamin-tahun-sppraps-1").prop("disabled", false);
                        $("#jenis-kelamin-tahun-sppraps-2").prop("disabled", false);
                        $("#alamat-sppraps").prop("disabled", false);
                        $("#rt-sppraps").prop("disabled", false);
                        $("#rw-sppraps").prop("disabled", false);
                        $("#kelurahan-sppraps").prop("disabled", false);
                        $("#kecamatan-sppraps").prop("disabled", false);
                        $("#kota-sppraps").prop("disabled", false);
                        $("#nomor-ktp-sppraps").prop("disabled", false);
                        $("#nomor-tlp-sppraps").prop("disabled", false);

                        $("#ttd-pasien-sppraps").val('');
                        $('#nama-sppraps').keyup(function() {
                            $("#ttd-pasien-sppraps").val($('#nama-sppraps').val());
                        });

                        $('#tgl-lahir-sppraps').change(function() {
                            let dateString = $('#tgl-lahir-sppraps').val();

                            let parts = dateString.split('/');
                            let day = parseInt(parts[0], 10);
                            let month = parseInt(parts[1], 10) - 1; 
                            let year = parseInt(parts[2], 10);
                            
                            let givenDate = new Date(year, month, day);
                            let today = new Date();
                            let diffYears = today.getFullYear() - givenDate.getFullYear();
                            if (today.getMonth() < givenDate.getMonth() || (today.getMonth() === givenDate.getMonth() && today.getDate() < givenDate.getDate())) {
                                diffYears--;
                            }

                            $("#tahun-sppraps").val(diffYears);
                        });
                        document.getElementById("diri-sppraps-7").checked = true;
                    }
                });

                $('#modal_surat_peryataan_pulang_rawat_atas_permintaan_sendiri').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }


    // SPPRAPS WH  
    function resetModalSuratPeryataanPulangRawatAtasPermintaanSendiriERM() {
        $('#id-layanan-pendaftaran-sppraps').val('');
        // Unchecked fields
        $('#nama-sppraps').val('');
        $('#tgl-lahir-sppraps').val('');
        $('#tahun-sppraps').val('');
        $('#alamat-sppraps').val('');
        $('#rt-sppraps').val('');
        $('#rw-sppraps').val('');
        $('#kelurahan-sppraps').val('');
        $('#kecamatan-sppraps').val('');
        $('#kota-sppraps').val('');
        $('#nomor-ktp-sppraps').val('');
        $('#nomor-tlp-sppraps').val('');
        $('#nama-sppraps1').val('');
        $('#nomor-rekam-sppraps').val('');
        $('#tgl-lahir-sppraps1').val('');
        $('#tahun-sppraps1').val('');
        $('#kelas-sppraps').val('');
        $('#s2id_kelas-sppraps a .select2c-chosen').html('Silahkan Pilih Ruangan');
        $('#dokter-sppraps').val('');
        $('#s2id_dokter-sppraps a .select2c-chosen').html('Silahkan Pilih Dokter');
        $('#tanggal-dokter-sppraps').val('');
        $('#ttd-dokter-sppraps').val('');
        $('#s2id_ttd-dokter-sppraps a .select2c-chosen').html('Silahkan Pilih Dokter');
        $('#ttd-pasien-sppraps').val('');

        document.getElementById("ya-sppraps-1").checked = false;
        document.getElementById("tidak-sppraps-2").checked = false;
        document.getElementById("jenis-kelamin-tahun-sppraps-1").checked = false;
        document.getElementById("jenis-kelamin-tahun-sppraps-2").checked = false;
        document.getElementById("diri-sppraps-1").checked = false;
        document.getElementById("diri-sppraps-2").checked = false;
        document.getElementById("diri-sppraps-3").checked = false;
        document.getElementById("diri-sppraps-4").checked = false;
        document.getElementById("diri-sppraps-5").checked = false;
        document.getElementById("diri-sppraps-6").checked = false;
        document.getElementById("diri-sppraps-7").checked = false;
        document.getElementById("jenis-kelamin-tahun-sppraps-11").checked = false;
        document.getElementById("jenis-kelamin-tahun-sppraps-12").checked = false;
        document.getElementById("ceklis-ttd-dokter-sppraps").checked = false;
        document.getElementById("ceklis-ttd-pasien-sppraps").checked = false;

        $("#nama-sppraps").prop("disabled", false);
        $("#tgl-lahir-sppraps").prop("disabled", false);
        $("#tahun-sppraps").prop("disabled", false);
        $("#jenis-kelamin-tahun-sppraps-1").prop("disabled", false);
        $("#jenis-kelamin-tahun-sppraps-2").prop("disabled", false);
        $("#alamat-sppraps").prop("disabled", false);
        $("#rt-sppraps").prop("disabled", false);
        $("#rw-sppraps").prop("disabled", false);
        $("#kelurahan-sppraps").prop("disabled", false);
        $("#kecamatan-sppraps").prop("disabled", false);
        $("#kota-sppraps").prop("disabled", false);
        $("#nomor-ktp-sppraps").prop("disabled", false);
        $("#nomor-tlp-sppraps").prop("disabled", false);
        $("#nama-sppraps1").prop("disabled", false);
        $("#nomor-rekam-sppraps").prop("disabled", false);
        $("#tgl-lahir-sppraps1").prop("disabled", false);
        $("#tahun-sppraps1").prop("disabled", false);
        $("#jenis-kelamin-tahun-sppraps-11").prop("disabled", false);
        $("#jenis-kelamin-tahun-sppraps-12").prop("disabled", false);
        // $( "#kelas-sppraps" ).prop( "disabled", false );

        $('#alasanaps-sppraps').val('');


    }
</script>