<script>
    function lihatFORM_PMD_31_00(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
		let action = 'lihat';

		cetakRingkasanRiwayatMasukDanKeluar(layanan.id_pendaftaran, layanan.id, bed, action);
	}

	function editFORM_PMD_31_00(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
		let action = 'edit';

		cetakRingkasanRiwayatMasukDanKeluar(layanan.id_pendaftaran, layanan.id, bed, action);
	}

	function tambahFORM_PMD_31_00(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
		let action = 'tambah';

		cetakRingkasanRiwayatMasukDanKeluar(layanan.id_pendaftaran, layanan.id, bed, action);
	}

    function cetakRingkasanRiwayatMasukDanKeluar(id_pendaftaran, id_layanan_pendaftaran, bed, action) {
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
            success: function(response) {
                const data = response.ringkasan_riwayat_masuk_dan_keluar;
                // Set all values first
                resetModalRingkasanRiwayatMasukDanKeluar();
                $('#id-layanan-pendaftaran-form-mrrmdk-rm').val(id_layanan_pendaftaran);
                $('#indikasi').val(data.indikasi)
                $('#keterangan-khusus-rm').val(data.keterangan_khusus)

                for (let i = 0; i < 4; i++) {
                    if (data[`dpjp_utama_${i+1}`] !== null && data[`dpjp_utama_${i+1}`] !== undefined) {
                        const htmlDpjpUtama = `
						<div id="dinamic1${i}" style="vertical-align:middle !important" class="dinamic1 nadis dpjp-utama">
							<input type="text" name="dpjp_utama[]" id="dpjp-utama${i}" class="mb-2">
							<button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeDPJPUtamaRm(${i})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
						</div>`

                        $('#dpjp-utama').append(htmlDpjpUtama)
                        $('#dpjp-utama' + i).val(data[`dpjp_utama_${i+1}`])
                        $('#dpjp-utama' + i).select2c({
                            ajax: {
                                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                                dataType: 'json',
                                quietMillis: 100,
                                data: function(term, page) { // page is the one-based page number tracked by Select2
                                    return {
                                        q: term, //search term
                                        jenis: '1',
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
                                var markup = '<b>' + data.nama + '</b> <br/>' + data.spesialisasi;
                                return markup;
                            },
                            formatSelection: function(data) {
                                return data.nama;
                            },
                        })

                        $(`#s2id_dpjp-utama${i} a .select2c-chosen`).html(data[`nama_dpjp_utama_${i+1}`])
                    }
                }

                for (let i = 0; i < 4; i++) {
                    if (data[`dpjp_tambahan_${i+1}`] !== null && data[`dpjp_tambahan_${i+1}`] !== undefined) {
                        const htmlDpdpTambahan = `
						<div id="dinamic2${i}" style="vertical-align:middle !important" class="dinamic2 nadis dpjp-tambahan">
							<input type="text" name="dpjp_tambahan[]" id="dpjp-tambahan${i}" class="mb-2">
							<button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeDPJPTambahanRm(${i})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
						</div>`

                        $('#dpjp-tambahan').append(htmlDpdpTambahan)
                        $('#dpjp-tambahan' + i).val(data[`dpjp_tambahan_${i+1}`])
                        $('#dpjp-tambahan' + i).select2c({
                            ajax: {
                                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                                dataType: 'json',
                                quietMillis: 100,
                                data: function(term, page) { // page is the one-based page number tracked by Select2
                                    return {
                                        q: term, //search term
                                        jenis: '1',
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
                                var markup = '<b>' + data.nama + '</b> <br/>' + data.spesialisasi;
                                return markup;
                            },
                            formatSelection: function(data) {
                                return data.nama;
                            }
                        })

                        $(`#s2id_dpjp-tambahan${i} a .select2c-chosen`).html(data[`nama_dpjp_tambahan_${i+1}`])
                    }
                }

                for (let i = 0; i < 4; i++) {
                    console.log(data[`tgl_alih_rawat_${i+1}`])
                    if (data[`tgl_alih_rawat_${i+1}`] !== null && data[`tgl_alih_rawat_${i+1}`] !== undefined) {
                        const html = `
						<div id="dinamic3${i}" style="display: flex; gap: 1rem;" class="dinamic3 nadis tgl-alih-rawat">
							<input type="text" name="tgl_alih_rawat[]" id="tgl-alih-rawat${i}" class="mb-2 custom-form col-lg-3" value="${datefmysql(data[`tgl_alih_rawat_${i+1}`])}">
							<button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeTglAlihRawatRm(${i})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
						</div>`

                        $('#tgl-alih-rawat').append(html)
                        $('#tgl-alih-rawat' + i).datepicker({
                            format: 'dd/mm/yyyy',
                            endDate: new Date(),
                        }).on('changeDate', function() {
                            $(this).datepicker('hide')
                        });
                    }
                }

                $('#modal-cetak-ringkasan-riwayat-masuk-dan-keluar-rm').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

	function tambahDPJPUtamaRm() {
		let i = $('.dpjp-utama').length;
		let html = /* html */ `
			<div id="dinamic1${i}" style="vertical-align:middle !important" class="dinamic1 nadis dpjp-utama">
				<input type="text" name="dpjp_utama[]" id="dpjp-utama${i}" class="mb-2">
				<button type="button" class="btn btn-danger btn-xs mb-2" onclick="RmRm(${i})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
			</div>
		`;

		if (i > 3) return;

		$('#dpjp-utama').append(html)
		$('#dpjp-utama' + i).select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function (term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						jenis: '1',
						page: page, // page number
					};
				},
				results: function (data, page) {
					var more = (page * 20) < data.total; // whether or not there are more results available

					// notice we return the value of more so Select2 knows if more results can be loaded
					return {results: data.data, more: more};
				}
			},
			formatResult: function (data) {
				var markup = '<b>' + data.nama + '</b> <br/>' + data.spesialisasi;
				return markup;
			},
			formatSelection: function (data) {
				return data.nama;
			}
		})
	}

	function RmRm(i) {
		$('#dinamic1' + i).remove()
		var jml = $('.dpjp-utama').length;
		var urut = 0;
		for (j = 0; j <= jml - 1; j++) {
			$('.dinamic1:eq(' + urut + ')').attr('id', 'dinamic1' + j)
			$('.dinamic1:eq(' + urut + ')').children('.dpjap-utama').attr('id', 'dpjp-utama' + j)
			$('.dinamic1:eq(' + urut + ')').children('button').attr('onclick', 'RmRm(' + j + ')')
			urut++;
		}
	}

	function tambahDPJPTambahanRm() {
		let i = $('.dpjp-tambahan').length;
		let html = /* html */ `
			<div id="dinamic2${i}" style="vertical-align:middle !important" class="dinamic2 nadis dpjp-tambahan">
				<input type="text" name="dpjp_tambahan[]" id="dpjp-tambahan${i}" class="mb-2">
				<button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeDPJPTambahanRm(${i})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
			</div>
		`;

		if (i > 3) return;

		$('#dpjp-tambahan').append(html)
		$('#dpjp-tambahan' + i).select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function (term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						jenis: '1',
						page: page, // page number
					};
				},
				results: function (data, page) {
					var more = (page * 20) < data.total; // whether or not there are more results available

					// notice we return the value of more so Select2 knows if more results can be loaded
					return {results: data.data, more: more};
				}
			},
			formatResult: function (data) {
				var markup = '<b>' + data.nama + '</b> <br/>' + data.spesialisasi;
				return markup;
			},
			formatSelection: function (data) {
				return data.nama;
			}
		})
	}

	function removeDPJPTambahanRm(i) {
		$('#dinamic2' + i).remove()
		var jml = $('.dpjp-tambahan').length;
		var urut = 0;
		for (j = 0; j <= jml - 1; j++) {
			$('.dinamic2:eq(' + urut + ')').attr('id', 'dinamic2' + j)
			$('.dinamic2:eq(' + urut + ')').children('.dpjap-utama').attr('id', 'dpjp-tambahan' + j)
			$('.dinamic2:eq(' + urut + ')').children('button').attr('onclick', 'removeDPJPTambahanRm(' + j + ')')
			urut++;
		}
	}

	function tambahTglAlihRawatRm() {
		let i = $('.tgl-alih-rawat').length;
		let html = /* html */ `
			<div id="dinamic3${i}" style="display: flex; gap: 1rem;" class="dinamic3 nadis tgl-alih-rawat">
				<input type="text" name="tgl_alih_rawat[]" id="tgl-alih-rawat${i}" class="mb-2 custom-form col-lg-3">
				<button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeTglAlihRawatRm(${i})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
			</div>
		`;

		if (i > 3) return;

		$('#tgl-alih-rawat').append(html)
		$('#tgl-alih-rawat' + i).val('<?= date('d/m/Y') ?>');
		$('#tgl-alih-rawat' + i).datepicker({
			format: 'dd/mm/yyyy',
			endDate: new Date(),
		}).on('changeDate', function () {
			$(this).datepicker('hide')
		});
	}

	function removeTglAlihRawatRm(i) {
		$('#dinamic3' + i).remove()
		var jml = $('.tgl-alih-rawat').length;
		var urut = 0;
		for (j = 0; j <= jml - 1; j++) {
			$('.dinamic3:eq(' + urut + ')').attr('id', 'dinamic3' + j)
			$('.dinamic3:eq(' + urut + ')').children('.dpjap-utama').attr('id', 'tgl-alih-rawat' + j)
			$('.dinamic3:eq(' + urut + ')').children('button').attr('onclick', 'removeTglAlihRawatRm(' + j + ')')
			urut++;
		}
	}

    function resetModalRingkasanRiwayatMasukDanKeluar() {
        $('#indikasi').val('')
        $('#keterangan-khusus').val('')
        $('#dpjp-utama').empty()
        $('#dpjp-tambahan').empty()
        $('#tgl-alih-rawat').empty()
    }

    function simpanRingkasanRiwayatMasukDanKeluarRm() {
		var id = $('#id-layanan-pendaftaran-form-mrrmdk-rm').val();

		$.ajax({
			type: 'POST',
			url: '<?= base_url( "pendaftaran_poli/api/pendaftaran_poli/simpan_ringkasan_riwayat_masuk_dan_keluar" ) ?>',
			data: $('#form-cetak-ringkasan-eiwaayt-masuk-dan-keluar-rm').serialize(),
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

					window.open('<?= base_url( 'pendaftaran_poli/cetak_ringkasan_riwayat_masuk_dan_keluar/' ) ?>' + id, 'Cetak Ringkasan Riwayat Masuk dan Keluar', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
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