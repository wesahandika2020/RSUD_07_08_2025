<script>
    function lihatFORM_REM_29_03(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
		let action = 'lihat';

		cetakPasienUmum(layanan.id_pendaftaran, layanan.id, bed, action);
	}

	function editFORM_REM_29_03(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
		let action = 'edit';

		cetakPasienUmum(layanan.id_pendaftaran, layanan.id, bed, action);
	}

	function tambahFORM_REM_29_03(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
		let action = 'tambah';

		cetakPasienUmum(layanan.id_pendaftaran, layanan.id, bed, action);
	}

    // All Provinsi
    function getProvinsi(no_prop = null, nama_prop = null) {
        $.ajax({
            url: '<?= base_url('opendata/api/opendata/get_provinsi') ?>',
            type: 'GET',
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                let html = '';
                html += '<option value="">Pilih Provinsi</option>';
                $.each(data.data, function(i, v) {
                    html += '<option value="' + v.NO_PROP + '">' + v.NAMA_PROP + '</option>';
                });

                $('#provinsi-mpu-rm').html(html);

                if (no_prop) {
                    $('#provinsi-mpu-rm').val(no_prop);
                }

                if (nama_prop) {
                    $('#nama_provinsi').val(nama_prop);
                }
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    // All Kabupaten
    function getKabupaten(no_prop, no_kab = null, nama_kab = null) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('opendata/api/opendata/get_list_kabupaten') ?>/no_prop/' + no_prop,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                let html = '';
                html += '<option value="">Pilih Kabupaten</option>';
                $.each(data.data, function(i, v) {
                    html += '<option value="' + v.NO_KAB + '">' + v.NAMA_KAB + '</option>';
                });

                $('#kabupaten-mpu-rm').html(html);

                if (no_kab) {
                    $('#kabupaten-mpu-rm').val(no_kab);
                }

                if (nama_kab) {
                    $('#nama_kabupaten').val(nama_kab);
                }
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    // All Kecamatan
    function getKecamatan(no_prop, no_kab, no_kec = null, nama_kec = null) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('opendata/api/opendata/get_list_kecamatan') ?>/no_prop/' + no_prop + '/no_kab/' + no_kab,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                let html = '';
                html += '<option value="">Pilih Kecamatan</option>';
                $.each(data.data, function(i, v) {
                    html += '<option value="' + v.NO_KEC + '">' + v.NAMA_KEC + '</option>';
                });

                $('#kecamatan-mpu-rm').html(html);

                if (no_kec) {
                    $('#kecamatan-mpu-rm').val(no_kec);
                }

                if (nama_kec) {
                    $('#nama_kecamatan').val(nama_kec);
                }
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    // All Kelurahan
    function getKelurahan(no_prop, no_kab, no_kec, no_kel = null, nama_kel = null) {
        $.ajax({
            url: '<?= base_url('opendata/api/opendata/get_list_kelurahan') ?>/no_prop/' + no_prop + '/no_kab/' + no_kab + '/no_kec/' + no_kec,
            type: 'GET',
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                let html = '';
                html += '<option value="">Pilih Kelurahan</option>';
                $.each(data.data, function(i, v) {
                    html += '<option value="' + v.NO_KEL + '">' + v.NAMA_KEL + '</option>';
                });

                $('#kelurahan-mpu-rm').html(html);

                if (no_kel) {
                    $('#kelurahan-mpu-rm').val(no_kel);
                }

                if (nama_kel) {
                    $('#nama_kelurahan').val(nama_kel);
                }
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function cetakPasienUmum(id_pendaftaran, id_layanan_pendaftaran, bed, action) {
        $('#btn-simpan').hide();

        var groupAccount = '<?= $this->session->userdata('account_group') ?>';

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
				const pasien = data.pasien
                const persetjuanUmum = data?.persetujuan_umum

                // Set all values first
                resetModalPersetujuanUmum()

                $('#modal-persetujuan-umum-title').html(
                    `<b>Form Persetujuan Umum</b> | No. RM: ${pasien.no_rm}, Nama: ${pasien.nama}`,
                )

                $('#id-layanan-pendaftaran-form-mpu-rm').val(id_layanan_pendaftaran)
                $('#is-pasien-tidak-mpu-rm').click()

                if (persetjuanUmum?.is_pasien === '1') {
                    document.getElementById('is-pasien-ya-mpu-rm').checked = true
                    // Disabled fields
                    $('#nama-keluarga-mpu-rm').prop('disabled', true)
                    $('#tanggal-lahir-mpu-rm').prop('disabled', true)
                    $('#laki-laki-mpu-rm').prop('disabled', true)
                    $('#perempuan-mpu-rm').prop('disabled', true)
                    $('#alamat-form-rekam-medis-mpu-rm').prop('disabled', true)
                    $('#hubungan-keluarga-mpu-rm').prop('disabled', true)
                    $('#no-rt-mpu-rm').prop('disabled', true)
                    $('#no-rw-mpu-rm').prop('disabled', true)
                    $('#provinsi-mpu-rm').prop('disabled', true)
                    $('#kabupaten-mpu-rm').prop('disabled', true)
                    $('#kecamatan-mpu-rm').prop('disabled', true)
                    $('#kelurahan-mpu-rm').prop('disabled', true)
                    $('#no-ktp-mpu-rm').prop('disabled', true)
                    $('#no-hp-mpu-rm').prop('disabled', true)
                } else if (persetjuanUmum?.is_pasien === '0') {
                    document.getElementById('is-pasien-tidak-mpu-rm').checked = true
                    // Undisabled fields
                    $('#nama-keluarga-mpu-rm').prop('disabled', false)
                    $('#tanggal-lahir-mpu-rm').prop('disabled', false)
                    $('#laki-laki-mpu-rm').prop('disabled', false)
                    $('#perempuan-mpu-rm').prop('disabled', false)
                    $('#alamat-form-rekam-medis-mpu-rm   ').prop('disabled', false)
                    $('#hubungan-keluarga-mpu-rm').prop('disabled', false)
                    $('#no-rt-mpu-rm').prop('disabled', false)
                    $('#no-rw-mpu-rm').prop('disabled', false)
                    $('#provinsi-mpu-rm').prop('disabled', false)
                    $('#kabupaten-mpu-rm').prop('disabled', false)
                    $('#kecamatan-mpu-rm').prop('disabled', false)
                    $('#kelurahan-mpu-rm').prop('disabled', false)
                    $('#no-ktp-mpu-rm').prop('disabled', false)
                    $('#no-hp-mpu-rm').prop('disabled', false)

                    $('#nama-keluarga-mpu-rm').val(persetjuanUmum.nama_keluarga)
                    $('#tanggal-lahir-mpu-rm').val(datefmysql(persetjuanUmum.tanggal_lahir))
                    $('#alamat-form-rekam-medis-mpu-rm').val(persetjuanUmum.alamat)
                    $('#hubungan-keluarga-mpu-rm').val(persetjuanUmum.hubungan_keluarga)
                    $('#no-rt-mpu-rm').val(persetjuanUmum.no_rt)
                    $('#no-rw-mpu-rm').val(persetjuanUmum.no_rw)
                    getProvinsi()
                    if (persetjuanUmum.provinsi) {
                        getKabupaten(persetjuanUmum.provinsi)
                    }
                    if (persetjuanUmum.provinsi && persetjuanUmum.kota) {
                        getKecamatan(persetjuanUmum.provinsi, persetjuanUmum.kota)
                    }
                    if (persetjuanUmum.provinsi && persetjuanUmum.kota && persetjuanUmum.kecamatan) {
                        getKelurahan(persetjuanUmum.provinsi, persetjuanUmum.kota, persetjuanUmum.kecamatan)
                    }
                
                    setTimeout(() => {
                        $('#provinsi-mpu-rm').val(persetjuanUmum.provinsi).click()
                        $('#kabupaten-mpu-rm').val(persetjuanUmum.kota).click()
                        $('#kecamatan-mpu-rm').val(persetjuanUmum.kecamatan).click()
                        $('#kelurahan-mpu-rm').val(persetjuanUmum.kelurahan).click()
                    }, 500)
                    $('#no-ktp-mpu-rm').val(persetjuanUmum.no_identitas)
                    $('#no-hp-mpu-rm').val(persetjuanUmum.no_hp)
                }

                if (pasien?.kelamin_pasien == 'L' || persetjuanUmum?.kelamin_pjwb == 'L') {
                    document.getElementById('laki-laki-mpu-rm').checked = true
                } else if (pasien?.kelamin_pasien == 'P' || persetjuanUmum?.kelamin_pjwb == 'P') {
                    document.getElementById('perempuan-mpu-rm').checked = true
                }

                $('#modal-persetujuan-umum-rm').modal('show')  
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                accessFailed(e.status);
            },
        });
    }

    function resetModalPersetujuanUmum() {
        // Set default fields
        $('input[type="text"]').val('');

        // Unchecked fields
        $('input[type="radio"]').prop('checked', false);

        // Undisabled fields
        $("#nama-keluarga-mpu,#tanggal-lahir-mpu,#laki-laki-mpu,#perempuan-mpu,#alamat-form-rekam-medis-mpu,#hubungan-keluarga-mpu,#no-rt-mpu,#no-rw-mpu,#provinsi,#kabupaten,#kecamatan,#kelurahan").prop("disabled", false);
    }

    function simpanPersetujuanUmum() {
		var id = $('#id-layanan-pendaftaran-form-mpu-rm').val();

		$.ajax({
			type: 'POST',
			url: '<?= base_url( "pendaftaran_poli/api/pendaftaran_poli/simpan_persetujuan_umum" ) ?>',
			data: $('#form-persetujuan-umum-rm').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function () {
				showLoader();
			},
			success: function (data) {
				if (data.status) {
					messageCustom(data.message, 'Success');

					var dWidth = $(window).width();
					var dHeight = $(window).height();
					var x = screen.width / 2 - dWidth / 2;
					var y = screen.height / 2 - dHeight / 2;

					$('#modal-persetujuan-tindakan-operasi').modal('hide');

					window.open('<?= base_url( 'pendaftaran_poli/cetak_persetujuan_umum/' ) ?>' + id, 'Cetak Persetujuan Umum', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
				} else {
					messageCustom(data.message, 'Error');
				}
			},
			complete: function (data) {
				hideLoader();
			},
			error: function (e) {
				messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
			}
		});
	}

</script>