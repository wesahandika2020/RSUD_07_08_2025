<script>
    $(function() {

        let currentDate = new Date();
        $('#rkm_tanggal').datetimepicker({
            format: 'DD/MM/YYYY',
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

        // DOKTER
        $('#rkm_dokter').select2c({
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

    })

    function timerzmysql(waktu) {
        var tm = waktu.split(':');
        return tm[0] + ':' + tm[1];
    }

    function resetRkm() {
        $('#rkm_kiri_jauh_Spher, #rkm_kiri_jauh_Cyl, #rkm_kiri_jauh_Axis, #rkm_kiri_jauh_Prism, #rkm_kiri_jauh_bas, #rkm_kanan_jauh_Spher, #rkm_kanan_jauh_Cyl, #rkm_kanan_jauh_Axis, #rkm_kanan_jauh_Prism, #rkm_kanan_jauh_bas, #rkm_jauh_pupil, #rkm_kiri_dekat_Spher, #rkm_kiri_dekat_Cyl, #rkm_kiri_dekat_Axis, #rkm_kiri_dekat_Prism, #rkm_kiri_dekat_bas, #rkm_kanan_dekat_Spher, #rkm_kanan_dekat_Cyl, #rkm_kanan_dekat_Axis, #rkm_kanan_dekat_Prism, #rkm_kanan_dekat_bas, #rkm_dekat_pupil, #rkm_tanggal, #rkm_dokter').val('');

        $('#rkm_paraf_dokter').prop('checked', false);

        $('#s2id_rkm_dokter a .select2c-chosen').html('');
    }

    function tambahFORM_PMD_19_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';

        resetRkm();
        entriRkm(layanan.id_pendaftaran, layanan.id, bed, action);

    }

    function lihatFORM_PMD_19_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';

        resetRkm();
        entriRkm(layanan.id_pendaftaran, layanan.id, bed, action);
        
    }

    function editFORM_PMD_19_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';

        resetRkm();
        entriRkm(layanan.id_pendaftaran, layanan.id, bed, action);

    }

    function entriRkm(id_pendaftaran, id_layanan_pendaftaran, bed, action) {

        $('#btn_simpan_rkm').hide();
        $('#action_rkm').val(action);

        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        var profesi = '<?= $this->session->userdata('profesinadis') ?>';
        if (groupAccount == 'Admin') {
            profesi = 'Perawat';
        }

        if (action !== 'lihat') {
			$('#btn_simpan_rkm').show();
		} else {
			$('#btn_simpan_rkm').hide();
		}

        $.ajax({
			type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_data_entri_keperawatan") ?>/id/' + id_pendaftaran +'/id_layanan/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {

				// Set all values first
				resetRkm();
                $('#rkm_id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#rkm_id_pendaftaran').val(id_pendaftaran);
                if (data.pasien !== null) {
                    $('#rkm_id_pasien, #rkm_no_rm').val(data.pasien.id_pasien).text(data.pasien.id_pasien);
                    $('#rkm_nama_pasien').text(data.pasien.nama);
                    $('#rkm_tanggal_lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#rkm_jenis_kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                    $('#rkm_alamat').text(data.pasien.alamat);
                }

                // Resep Kaca MAta
                let rkm = data.rkm;
                if (rkm !== null) {
                    $('#rkm_id').val(rkm.id);

                    $('#rkm_kiri_jauh_Spher').val(rkm.rkm_kiri_jauh_Spher);
                    $('#rkm_kiri_jauh_cyl').val(rkm.rkm_kiri_jauh_cyl);
                    $('#rkm_kiri_jauh_axis').val(rkm.rkm_kiri_jauh_axis);
                    $('#rkm_kiri_jauh_prism').val(rkm.rkm_kiri_jauh_prism);
                    $('#rkm_kiri_jauh_bas').val(rkm.rkm_kiri_jauh_bas);
                    $('#rkm_kanan_jauh_Spher').val(rkm.rkm_kanan_jauh_Spher);
                    $('#rkm_kanan_jauh_cyl').val(rkm.rkm_kanan_jauh_cyl);
                    $('#rkm_kanan_jauh_axis').val(rkm.rkm_kanan_jauh_axis);
                    $('#rkm_kanan_jauh_prism').val(rkm.rkm_kanan_jauh_prism);
                    $('#rkm_kanan_jauh_bas').val(rkm.rkm_kanan_jauh_bas);
                    $('#rkm_jauh_pupil').val(rkm.rkm_jauh_pupil);
                    $('#rkm_kiri_dekat_Spher').val(rkm.rkm_kiri_dekat_Spher);
                    $('#rkm_kiri_dekat_cyl').val(rkm.rkm_kiri_dekat_cyl);
                    $('#rkm_kiri_dekat_axis').val(rkm.rkm_kiri_dekat_axis);
                    $('#rkm_kiri_dekat_prism').val(rkm.rkm_kiri_dekat_prism);
                    $('#rkm_kiri_dekat_bas').val(rkm.rkm_kiri_dekat_bas);
                    $('#rkm_kanan_dekat_Spher').val(rkm.rkm_kanan_dekat_Spher);
                    $('#rkm_kanan_dekat_cyl').val(rkm.rkm_kanan_dekat_cyl);
                    $('#rkm_kanan_dekat_axis').val(rkm.rkm_kanan_dekat_axis);
                    $('#rkm_kanan_dekat_prism').val(rkm.rkm_kanan_dekat_prism);
                    $('#rkm_kanan_dekat_bas').val(rkm.rkm_kanan_dekat_bas);
                    $('#rkm_dekat_pupil').val(rkm.rkm_dekat_pupil);

                    $('#rkm_tanggal').val((rkm.rkm_tanggal !== null ? datefmysql(rkm.rkm_tanggal) : ''));
                    if (rkm.rkm_paraf_dokter == 1) {
                        $('#rkm_paraf_dokter').prop('checked', true).change();
                    }
                    $('#rkm_dokter').val(rkm.rkm_dokter);
                    $('#s2id_rkm_dokter a .select2c-chosen').html(rkm.nama_dokter);
                }

				$('#modal_resep_kaca_mata').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});

    }

    function konfirmasiSimpanEntriRkm() {
        var stop = false;

        if ($('#rkm_tanggal').val() === '') {
            syams_validation('#rkm_tanggal', 'Nama tindakan harus diisi!');
            stop = true;
        }

        if ($('#rkm_dokter').val() === '') {
            syams_validation('#rkm_dokter', 'Dokter harus diisi!');
            stop = true;
        }

        if ($('#rkm_tanggal').val() !== '' && $('#rkm_dokter').val() !== '') {
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
                    simpanEntriRkm();
                }
            })
        }
    }

    function simpanEntriRkm() {

		var id_layanan_pendaftaran = $('#rkm_id_layanan_pendaftaran').val();
        var id_pendaftaran = $('#rkm_id_pendaftaran').val();

        $.ajax({
            type: 'POST',
            url: '<?= base_url("form_rekam_medis/api/entri_keperawatan/simpan_rkm") ?>',
            data: $('#form_resep_kaca_mata').serialize(),
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
                        $('#modal_resep_kaca_mata').modal('hide');
                        resetRkm();
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

	function cetakResepKacaMata() {
        let rkm_id = $('#rkm_id').val();
        let id_layanan_pendaftaran = $('#rkm_id_layanan_pendaftaran').val();
        let id_pendaftaran = $('#rkm_id_pendaftaran').val();
		window.open('<?= base_url('form_rekam_medis/cetak_resep_kaca_mata/') ?>' + rkm_id + '/' + id_pendaftaran + '/' + id_layanan_pendaftaran, 'Cetak Resep Kaca Mata', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);

	}


</script>