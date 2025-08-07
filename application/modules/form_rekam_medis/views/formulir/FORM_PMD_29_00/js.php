<!-- // FMPP -->
<script>
    $(function() {

		$('#ctk_btn_expand_all').click(function() {
            $('.multi-collapse').addClass('show');
        });


        $('#ctk_btn_collapse_all').click(function() {
            $('.multi-collapse').removeClass('show');
        }); 

		$('#btn_reset_fmpp').on('click', function() {
			resetFmpp_formOnly();
		});
		
		// let currentDate = new Date();
		$('#fmpp_tanggal_a, #fmpp_tanggal_b, #dfmpp_tanggal_a, #dfmpp_tanggal_b').datetimepicker({
            format: 'DD/MM/YYYY HH:mm',
            pickSecond: false,
            pick12HourFormat: false,
			// maxDate: new Date(currentDate.getFullYear(), currentDate.getMonth() + 2, 0),
            maxDate: new Date(),
            beforeShow: function(i) { if ($(i).attr('readonly')) { return false; } }
        });

		// NAMA PERAWAT
		$('#fmpp_petugas_a, #fmpp_petugas_b, #dfmpp_petugas_a, #dfmpp_petugas_b').select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term,
					page) { // page is the one-based page number tracked by Select2
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


    })

    function timerzmysql(waktu) {
        var tm = waktu.split(':');
        return tm[0] + ':' + tm[1];
    }

    function resetFmpp() {
        $('#form_fmpp')[0].reset();
    }

	function resetFmpp_formOnly() {
		let action		   = $('#action_fmpp').val();
		let id_pasien 	   = $('#id_pasien_fmpp').val();
		let id_pendaftaran = $('#fmmp_id_pendaftaran').val();
		let id_layanan_pendaftaran = $('#fmmp_id_layanan_pendaftaran').val();

        $('#form_fmpp')[0].reset();
		$('#action_fmpp').val(action);
		$('#fmmp_id_pasien').val(id_pasien).text(id_pasien);
		$('#fmmp_id_pendaftaran').val(id_pendaftaran);
		$('#fmmp_id_layanan_pendaftaran').val(id_layanan_pendaftaran);
		$('#fmpp_petugas_a').val('');
		$('#s2id_fmpp_petugas_a a .select2c-chosen').empty();
		$('#fmpp_petugas_b').val('');
		$('#s2id_fmpp_petugas_b a .select2c-chosen').empty();

		$('#dfmpp_id_a').val('');
        $('#form_edit_fmpp_a')[0].reset();
		$('#action_dfmpp_a').val(action);
		$('#dfmmp_id_pasien_a').val(id_pasien).text(id_pasien);
		$('#dfmmp_id_pendaftaran_a').val(id_pendaftaran);
		$('#dfmmp_id_layanan_pendaftaran_a').val(id_layanan_pendaftaran);
		$('#dfmpp_petugas_a').val('');
		$('#s2id_dfmpp_petugas_a a .select2c-chosen').empty();

		$('#dfmpp_id_b').val('');
        $('#form_edit_fmpp_b')[0].reset();
		$('#action_dfmpp_b').val(action);
		$('#dfmmp_id_pasien_b').val(id_pasien).text(id_pasien);
		$('#dfmmp_id_pendaftaran_b').val(id_pendaftaran);
		$('#dfmmp_id_layanan_pendaftaran_b').val(id_layanan_pendaftaran);
		$('#dfmpp_petugas_b').val('');
		$('#s2id_dfmpp_petugas_b a .select2c-chosen').empty();
    }

    function tambahFORM_PMD_29_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';

        resetFmpp();
        entriFmpp(layanan.id_pendaftaran, layanan.id, bed, action);

    }

    function lihatFORM_PMD_29_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';

        resetFmpp();
        entriFmpp(layanan.id_pendaftaran, layanan.id, bed, action);
        
    }

    function editFORM_PMD_29_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';

        resetFmpp();
        entriFmpp(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function entriFmpp(id_pendaftaran, id_layanan_pendaftaran, bed, action) {

        $('#btn_simpan_fmpp').hide();
        $('#action_fmpp').val(action);

        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        var profesi = '<?= $this->session->userdata('profesinadis') ?>';
        if (groupAccount == 'Admin') {
            profesi = 'Perawat';
        }

        if (action !== 'lihat') {
			$('#btn_simpan_fmpp').show();
		} else {
			$('#btn_simpan_fmpp').hide();
		}

        if (action !== 'tambah') {
			$('#btn_cetak_fmpp').show();
		} else {
			$('#btn_cetak_fmpp').hide();
		}

        $.ajax({
			type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_layanan_pendaftaran_detail") ?>/id/' + id_pendaftaran +'/id_layanan/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {

				// Set all values first
				resetFmpp();
				$('#action_fmpp').val(action);
                $('#id_layanan_pendaftaran_fmpp').val(id_layanan_pendaftaran);
                $('#id_pendaftaran_fmpp').val(id_pendaftaran);
                if (data.pasien !== null) {
                    $('#id_pasien_fmpp, #fmpp_no_rm').val(data.pasien.id_pasien).text(data.pasien.id_pasien);
                    $('#fmpp_nama_pasien, #fmpp_nama_pasien_2').text(data.pasien.nama);
                    $('#fmpp_tanggal_lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#fmpp_jenis_kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                    $('#fmpp_alamat').text(data.pasien.alamat);
                }

				list_data_fmpp(id_pendaftaran, id_layanan_pendaftaran, action);
                

				$('#modal_fmpp').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
    }

	function list_data_fmpp(id_pendaftaran, id_layanan_pendaftaran, action) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("form_rekam_medis/api/entri_keperawatan/get_fmpp/") ?>' + id_pendaftaran + '/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				
				$('#fmpp_table_a tbody').empty();
				$('#fmpp_table_b tbody').empty();

				if (data.fmpp.length !== 0) {
					var numberDataA = 1; // Nomor urut untuk tabel A
					var numberDataB = 1; // Nomor urut untuk tabel B

				$.each(data.fmpp, function (i, v) {
					
					// Memperbarui #id_fmpp dengan id dari iterasi pertama
					if (i === 0) {
						$('#id_fmpp').val(v.id);
					}
					let btnEditFmpp = '';
					let btnHapusFmpp = '';
					
					// Membuat tombol hapus untuk setiap iterasi
					if (action !== 'lihat') {
						btnEditFmpp = `<button type="button" class="btn btn-success btn-xs" onclick="editFmpp(${v.id})"><i class="fas fa-edit"></i> Edit</button>`;
						btnHapusFmpp = `<button type="button" class="btn btn-danger btn-xs" onclick="hapusFmpp(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>`;
					}
					
					
					// Menampilkan data untuk fmpp_tanggal_a
					if (v.fmpp_tanggal_a !== null) {
						let htmlA = /* html */ `
							<tr>
								<td class="center">${numberDataA++}</td>
								<td class="center">${datetimefmysql(v.fmpp_tanggal_a)}</td>
								<td>${v.fmpp_catatan_a}</td>
								<td class="center">${v.nama_nadis_a}</td>
								<td class="center">${btnEditFmpp} ${btnHapusFmpp}</td>
							</tr>
						`;
						$('#fmpp_table_a tbody').append(htmlA);
					}
					
					// Menampilkan data untuk fmpp_tanggal_b
					if (v.fmpp_tanggal_b !== null) {
						let htmlB = /* html */ `
							<tr>
								<td class="center">${numberDataB++}</td>
								<td class="center">${datetimefmysql(v.fmpp_tanggal_b)}</td>
								<td>${v.fmpp_catatan_b}</td>
								<td class="center">${v.nama_nadis_b}</td>
								<td class="center">${btnEditFmpp} ${btnHapusFmpp}</td>
							</tr>
						`;
						$('#fmpp_table_b tbody').append(htmlB);
					}
				});


				}
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

	function tambahFmppA() {
		if ($('#fmpp_tanggal_a').val() === '') {
			syams_validation('#fmpp_tanggal_a', 'Tanggal harus diisi.');
			return false;
		}
		syams_validation_remove('#fmpp_tanggal_a');

		if ($('#fmpp_catatan_a').val() === '') {
			syams_validation('#fmpp_catatan_a', 'Catatan harus diisi.');
			return false;
		}
		syams_validation_remove('#fmpp_catatan_a');

		if ($('#fmpp_petugas_a').val() === '') {
			syams_validation('#fmpp_petugas_a', 'Petugas harus diisi.');
			return false;
		}
		syams_validation_remove('#fmpp_petugas_a');

		let html = '';
		let fmpp_tanggal_a = $('#fmpp_tanggal_a').val();
		let fmpp_catatan_a = $('#fmpp_catatan_a').val();
		let id_fmpp_petugas_a = $('#fmpp_petugas_a').val();
		let fmpp_petugas_a = $('#s2id_fmpp_petugas_a a .select2c-chosen').html();
		let accountGroup = "<?= $this->session->userdata('account_group') ?>";

		// Ambil jumlah baris tabel untuk menentukan nomor berikutnya
		let numberFmpp = $('#fmpp_table_a tbody tr').length + 1;

		let button_hapus = `
			<td align="center">
				<button type="button" class="btn btn-secondary btn-xxs" onclick="hapusBarisA(this)">
					<i class="fas fa-trash-alt"></i>
				</button>
			</td>
		`;

		html = /* html */ `
			<tr class="row-in-${numberFmpp}">
				<td class="number-fmpp" align="center">${numberFmpp}</td>
				<td align="center">
					<input type="hidden" name="fmpp_tanggal_a[]" value="${fmpp_tanggal_a}">${fmpp_tanggal_a}
				</td>
				<td align="center">
					<input type="hidden" name="fmpp_catatan_a[]" value="${fmpp_catatan_a}">${fmpp_catatan_a}
				</td>
				<td align="center">
					<input type="hidden" name="fmpp_petugas_a[]" value="${id_fmpp_petugas_a}">${fmpp_petugas_a}
				</td>
				${button_hapus}
			</tr>
		`;

		$('#fmpp_table_a tbody').append(html);
		resetFmpp_formOnly();
	}

	function tambahFmppB() {
		if ($('#fmpp_tanggal_b').val() === '') {
			syams_validation('#fmpp_tanggal_b', 'Tanggal harus diisi.');
			return false;
		}
		syams_validation_remove('#fmpp_tanggal_b');

		if ($('#fmpp_catatan_b').val() === '') {
			syams_validation('#fmpp_catatan_b', 'Catatan harus diisi.');
			return false;
		}
		syams_validation_remove('#fmpp_catatan_b');

		if ($('#fmpp_petugas_b').val() === '') {
			syams_validation('#fmpp_petugas_b', 'Petugas harus diisi.');
			return false;
		}
		syams_validation_remove('#fmpp_petugas_b');

		let html = '';
		let fmpp_tanggal_b = $('#fmpp_tanggal_b').val();
		let fmpp_catatan_b = $('#fmpp_catatan_b').val();
		let id_fmpp_petugas_b = $('#fmpp_petugas_b').val();
		let fmpp_petugas_b = $('#s2id_fmpp_petugas_b a .select2c-chosen').html();
		let accountGroup = "<?= $this->session->userdata('account_group') ?>";

		// Ambil jumlah baris tabel untuk menentukan nomor berikutnya
		let numberFmpp = $('#fmpp_table_b tbody tr').length + 1;

		let button_hapus = `
			<td align="center">
				<button type="button" class="btn btn-secondary btn-xxs" onclick="hapusBarisB(this)">
					<i class="fas fa-trash-alt"></i>
				</button>
			</td>
		`;

		html = /* html */ `
			<tr class="row-in-${numberFmpp}">
				<td class="number-fmpp" align="center">${numberFmpp}</td>
				<td align="center">
					<input type="hidden" name="fmpp_tanggal_b[]" value="${fmpp_tanggal_b}">${fmpp_tanggal_b}
				</td>
				<td align="center">
					<input type="hidden" name="fmpp_catatan_b[]" value="${fmpp_catatan_b}">${fmpp_catatan_b}
				</td>
				<td align="center">
					<input type="hidden" name="fmpp_petugas_b[]" value="${id_fmpp_petugas_b}">${fmpp_petugas_b}
				</td>
				${button_hapus}
			</tr>
		`;

		$('#fmpp_table_b tbody').append(html);
		resetFmpp_formOnly();
	}

	function konfirmasiSimpanEntriFmpp() {
		
		let text = '';
		let btnText = '';

		if ($('#id_fmpp').length > 0 && $('#id_fmpp').val() === '') {
			text = 'menyimpan';
			btnText = 'Simpan';
		} else {
			text = 'mengubah';
			btnText = 'Ubah';
		}

		const hasDataA = $('#fmpp_table_a tbody').find('tr').length > 0;
		const hasDataB = $('#fmpp_table_b tbody').find('tr').length > 0;

		if (hasDataA || hasDataB) {
			Swal.fire({
				title: `${btnText} Form`,
				text: `Apakah anda yakin akan ${text} Formulir Manajer Pelayanan Pasien?`,
				icon: 'question',
				showCancelButton: true,
				confirmButtonText: `<i class="fas fa-fw fa-save mr-1"></i>${btnText}`,
				cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
				reverseButtons: true
			}).then((result) => {
				if (result.value) {
					simpanEntriFmpp();
				}
			}) ;
		} else {
			Swal.fire({
				title: 'Tidak Ada Data!',
				text: 'Silakan tambahkan data sebelum menyimpan.',
				icon: 'warning',
				confirmButtonText: 'OK'
			});
		}
	}

    function simpanEntriFmpp() {

		var id_layanan_pendaftaran = $('#id_layanan_pendaftaran_fmpp').val();
        var id_pendaftaran = $('#id_pendaftaran_fmpp').val();
        var id_pasien = $('#id_pasien_fmpp').val();		

        $.ajax({
            type: 'POST',
            url: '<?= base_url("form_rekam_medis/api/entri_keperawatan/simpan_fmpp") ?>',
            data: $('#form_fmpp').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status) {
					messageCustom(data.message, 'Success');
					$('#modal_fmpp').modal('hide');
					showListForm(id_pendaftaran, id_layanan_pendaftaran, id_pasien);
				} else {
					messageCustom(data.message, 'Error');
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

	function hapusFmpp(id, id_pendaftaran, id_layanan_pendaftaran) {
		let action = 'edit';			
		bootbox.dialog({
			message: "Anda yakin akan manghapus data ini?",
			title: "Hapus Formulir Manajer Pelayanan Pasien",
			buttons: {
				batal: {
					label: '<i class="fas fa-fw fa-window-close"></i> Batal',
					className: "btn-secondary",
					callback: function() {
					}
				},
				masuk: {
					label: '<i class="fas fa-fw fa-trash"></i> Hapus',
					className: "btn-danger",
					callback: function(result) {
						if (result) {
							$.ajax({
                            type: 'DELETE',
                            url: '<?= base_url("form_rekam_medis/api/entri_keperawatan/hapus_fmpp") ?>/' + id,
								cache: false,
								dataType: 'JSON',
								beforeSend: function() {
									showLoader();
								},
								success: function(data) {
									if (data.status) {
										messageCustom(data.message, 'Success');
										list_data_fmpp(id_pendaftaran, id_layanan_pendaftaran, action);
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
					}
				}
			}
		});
	}

	function hapusBarisA(element) {
		// Hapus baris berdasarkan elemen tombol yang diklik
		$(element).closest('tr').remove();

		// Update ulang nomor baris di tabel
		$('#fmpp_table_a tbody tr').each(function(index) {
			// Nomor baris diperbarui sesuai urutan (dimulai dari 1)
			$(this).find('.number-fmpp').text(index + 1);
		});
	}

	function hapusBarisB(element) {
		// Hapus baris berdasarkan elemen tombol yang diklik
		$(element).closest('tr').remove();

		// Update ulang nomor baris di tabel
		$('#fmpp_table_b tbody tr').each(function(index) {
			// Nomor baris diperbarui sesuai urutan (dimulai dari 1)
			$(this).find('.number-fmpp').text(index + 1);
		});
	}

	function editFmpp(id) {

		$.ajax({
			type: 'GET',
			url: '<?= base_url("form_rekam_medis/api/entri_keperawatan/get_fmpp_byid") ?>/' + id,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {				
				resetFmpp_formOnly();				
                let f = data.fmpp;

				// form a
				if(f != null && f.fmpp_tanggal_a !== null){
					$('#dfmpp_id_a').val(f.id);
					$('#dfmmp_id_pendaftaran_a').val(f.id_pendaftaran);
					$('#dfmmp_id_layanan_pendaftaran_a').val(f.id_layanan_pendaftaran);
					$('#dfmmp_id_pasien_a').val(f.id_pasien);
					$('#dfmpp_tanggal_a').val(datetimefmysql(f.fmpp_tanggal_a));
					$('#dfmpp_catatan_a').val(f.fmpp_catatan_a);
					$('#dfmpp_petugas_a').val(f.fmpp_petugas_a);
					$('#s2id_dfmpp_petugas_a a .select2c-chosen').html(f.nama_nadis_a);

					$('#modal_edit_fmpp_a').modal('show');
				}
				// form b
				if (f != null && f.fmpp_tanggal_b !== null) {
					$('#dfmpp_id_b').val(f.id);
					$('#dfmmp_id_pendaftaran_b').val(f.id_pendaftaran);
					$('#dfmmp_id_layanan_pendaftaran_b').val(f.id_layanan_pendaftaran);
					$('#dfmmp_id_pasien_b').val(f.id_pasien);
					$('#dfmpp_tanggal_b').val(datetimefmysql(f.fmpp_tanggal_b));
					$('#dfmpp_catatan_b').val(f.fmpp_catatan_b);
					$('#dfmpp_petugas_b').val(f.fmpp_petugas_b);
					$('#s2id_dfmpp_petugas_b a .select2c-chosen').html(f.nama_nadis_b);

					$('#modal_edit_fmpp_b').modal('show');
				}
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});

	}

    function updateFmpp() {

		var id_layanan_pendaftaran = $('#id_layanan_pendaftaran_fmpp').val();
        var id_pendaftaran = $('#id_pendaftaran_fmpp').val();
        var id_pasien = $('#id_pasien_fmpp').val();	
		var action_a = $('#action_dfmpp_a').val();
		var action_b = $('#action_dfmpp_b').val();	
        var action = action_a ? action_a : action_b;
		// console.log($('#form_edit_fmpp_a').serialize() + '&' + $('#form_edit_fmpp_b').serialize());

        $.ajax({
			type: 'POST',
			url: '<?= base_url("form_rekam_medis/api/entri_keperawatan/update_fmpp") ?>',
			data: $('#form_edit_fmpp_a').serialize() + '&' + $('#form_edit_fmpp_b').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				if (data.status) {
					messageCustom(data.message, 'Success');
					$('#modal_edit_fmpp_a').modal('hide');
					$('#modal_edit_fmpp_b').modal('hide');
					list_data_fmpp(id_pendaftaran, id_layanan_pendaftaran, action);
				} else {
					messageCustom(data.message, 'Error');
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
</script>