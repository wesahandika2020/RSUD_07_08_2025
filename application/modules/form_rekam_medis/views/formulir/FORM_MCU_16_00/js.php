<script>
    $(function() {

        var tahunSekarang = new Date().getFullYear();
        document.getElementById('tahun_sekarang').innerText = tahunSekarang;

        let currentDate = new Date();
        $('#kb_permintaan_tanggal, #kb_tanggal').datetimepicker({
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

        // // DOKTER
        // $('#kb_dokter').select2c({
        //     ajax: {
        //         url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
        //         dataType: 'json',
        //         quietMillis: 100,
        //         data: function(term, page) { // page is the one-based page number tracked by Select2
        //             return {
        //                 q: term, //search term
        //                 page: page, // page number
        //             };
        //         },
        //         results: function(data, page) {
        //             var more = (page * 20) < data
        //                 .total; // whether or not there are more results available

        //             // notice we return the value of more so Select2 knows if more results can be loaded
        //             return {
        //                 results: data.data,
        //                 more: more
        //             };
        //         }
        //     },
        //     formatResult: function(data) {
        //         var markup = '<b>' + data.nama + '</b><br/><i>' + data.spesialisasi + '</i>';
        //         return markup;
        //     },
        //     formatSelection: function(data) {
        //         return data.nama;
        //     }
        // });

    })

    function resetKb() {
        $('#kb_nomor_1, #kb_nomor_2, #kb_permintaan_dari, #kb_permintaan_nomor, #kb_permintaan_tanggal, #kb_keterangan, #kb_tanggal').val('');

    }

    function tambahFORM_MCU_16_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';

        resetKb();
        entriKb(layanan.id_pendaftaran, layanan.id, bed, action);

    }

    function lihatFORM_MCU_16_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';

        resetKb();
        entriKb(layanan.id_pendaftaran, layanan.id, bed, action);
        
    }

    function editFORM_MCU_16_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';

        resetKb();
        entriKb(layanan.id_pendaftaran, layanan.id, bed, action);

    }

    function entriKb(id_pendaftaran, id_layanan_pendaftaran, bed, action) {

        $('#kb_btn_simpan').hide();
        $('#kb_action').val(action);

        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        var profesi = '<?= $this->session->userdata('profesinadis') ?>';
        if (groupAccount == 'Admin') {
            profesi = 'Perawat';
        }

        if (action !== 'lihat') {
			$('#kb_btn_simpan').show();
		} else {
			$('#kb_btn_simpan').hide();
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
				resetKb();
                $('#kb_id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#kb_id_pendaftaran').val(id_pendaftaran);
                if (data.pasien !== null) {
                    $('#kb_id_pasien, #kb_no_rm').val(data.pasien.id_pasien).text(data.pasien.id_pasien);
                    $('#kb_nama_pasien').text(data.pasien.nama);
                    $('#kb_tanggal_lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#kb_jenis_kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                    $('#kb_alamat').text(data.pasien.alamat);
                }

                // sertifikat kelaikan bekerja
                let kb = data.kb;
                if (kb !== null) {
                    $('#kb_id').val(kb.id);
                    $('#kb_nomor_1').val(kb.kb_nomor_1);
                    $('#kb_nomor_2').val(kb.kb_nomor_1);
                    $('#kb_permintaan_dari').val(kb.kb_permintaan_dari);
                    $('#kb_permintaan_nomor').val(kb.kb_permintaan_nomor);
                    $('#kb_permintaan_tanggal').val((kb.kb_permintaan_tanggal !== null ? datefmysql(kb.kb_permintaan_tanggal) : ''));
                    $('#kb_keterangan').val(kb.kb_keterangan);
                    $('#kb_tanggal').val((kb.kb_tanggal !== null ? datefmysql(kb.kb_tanggal) : ''));
                }

				$('#modal_mcu_16_00').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});

    }

    function konfirmasiSimpanEntriKb() {

        if ($('#kb_nomor_1').val() === '') {
            syams_validation('#kb_notif', 'Field harus diisi!');
            return false;
        } else {
            syams_validation_remove('#kb_notif');
        }

        if ($('#kb_nomor_2').val() === '') {
            syams_validation('#kb_notif', 'Field harus diisi!');
            return false;
        } else {
            syams_validation_remove('#kb_notif');
        }

        if ($('#kb_permintaan_dari').val() === '') {
            syams_validation('#kb_permintaan_dari', 'Field harus diisi!');
            return false;
        } else {
            syams_validation_remove('#kb_permintaan_dari');
        }

        if ($('#kb_permintaan_nomor').val() === '') {
            syams_validation('#kb_permintaan_nomor', 'Field harus diisi!');
            return false;
        } else {
            syams_validation_remove('#kb_permintaan_nomor');
        }

        if ($('#kb_permintaan_tanggal').val() === '') {
            syams_validation('#kb_permintaan_tanggal', 'Field harus diisi!');
            return false;
        } else {
            syams_validation_remove('#kb_permintaan_tanggal');
        }

        if ($('#kb_keterangan').val() === '') {
            syams_validation('#kb_keterangan', 'Field harus diisi!');
            return false;
        } else {
            syams_validation_remove('#kb_keterangan');
        }

        if ($('#kb_tanggal').val() === '') {
            syams_validation('#kb_tanggal', 'Field harus diisi!');
            return false;
        } else {
            syams_validation_remove('#kb_tanggal');
        }

        if ($('#kb_tanggal').val() !== '') {
            swal.fire({
                title: 'Simpan Entri Keperawatan',
                text: "Apakah anda yakin akan menyimpan?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
                cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    simpanEntriKb();
                }
            })
        }
    }

    function simpanEntriKb() {

		var id_layanan_pendaftaran = $('#kb_id_layanan_pendaftaran').val();
        var id_pendaftaran = $('#kb_id_pendaftaran').val();

        $.ajax({
            type: 'POST',
            url: '<?= base_url("form_rekam_medis/api/entri_keperawatan/simpan_kb") ?>',
            data: $('#form_mcu_16_00').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.respon !== null) {
                    if (data.respon.show !== null) {
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
                        $('#modal_mcu_16_00').modal('hide');
                        resetKb();
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

	function cetakKelaikanBekerja() {
        let kb_id = $('#kb_id').val();
        let id_layanan_pendaftaran = $('#kb_id_layanan_pendaftaran').val();
        let id_pendaftaran = $('#kb_id_pendaftaran').val();
        if (kb_id !== '') {
            window.open('<?= base_url('form_rekam_medis/cetak_kelaikan_bekerja/') ?>' + kb_id + '/' + id_pendaftaran + '/' + id_layanan_pendaftaran, 'Cetak Sertifikat Kelaikan Bekerja', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
        }
	}


</script>