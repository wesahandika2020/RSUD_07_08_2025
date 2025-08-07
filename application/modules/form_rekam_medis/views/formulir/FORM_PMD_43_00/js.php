<script>    // SPPPMK PERBAIKAN

    $(function() {		
        $('#dokterspppmk').select2c({
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

        $('#tanggalspppmk, #umurttlspppmk').datetimepicker({
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

		$('#btn_reset').on('click', function() {
			resetFormSPPPMK();
		});

	})

    function lihatFORM_PMD_43_00(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'lihat';
		entriSppmk(layanan.id_pendaftaran, layanan.id, action);
	}

	function editFORM_PMD_43_00(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'edit';
		entriSppmk(layanan.id_pendaftaran, layanan.id, action);
	}

	function tambahFORM_PMD_43_00(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'tambah';
		entriSppmk(layanan.id_pendaftaran, layanan.id, action);
	}

    function entriSppmk(id_pendaftaran, id_layanan_pendaftaran, action) {
		resetFormSPPPMK();

		$('#btn_simpan').hide();
		$('#action-sppmk').val(action);

		var groupAccount = '<?= $this->session->userdata('account_group') ?>';
		var profesi = '<?= $this->session->userdata('profesinadis') ?>';
		if (groupAccount == 'Admin') {
			profesi = 'Perawat';
		}

		if (action !== 'lihat') {
			$('#btn_simpan, #btn_reset').show();
			$('.form-surat-pernyataan-persetujuan-pmk ').show();
		} else {
			$('#btn_simpan, #btn_reset').hide();
			$('.form-surat-pernyataan-persetujuan-pmk ').hide();
		}
		tableListSppmk(id_pendaftaran, id_layanan_pendaftaran);
	}

    function tableListSppmk(id_pendaftaran, id_layanan_pendaftaran) {
		$('#table-list-spppmk tbody').empty(); // Bersihkan tabel sebelum rendering ulang
		$('#btn_update_spppmk').hide(); // menyembuyikan btnupdate
		syams_validation_remove('#tanggalspppmk, #umurttlspppmk, #dokterspppmk');

		$.ajax({
			type: 'GET',
			url: '<?= base_url('rekam_medis/api/rekam_medis/get_surat_pernyataan_persetujuan_pmk') ?>/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {				
				console.log(data);
				resetFormSPPPMK();
				$('#modal_surat_pernyataan_persetujuan_pmk_title').html(`<b>FORM  SURAT KUASA PEMBERIAN INFORMASI MEDIS </b>`);
				$('#id-pendaftaran-spppmk').val(id_pendaftaran);
				$('#id-layanan-pendaftaran-spppmk').val(id_layanan_pendaftaran);
				$('#id-pasien-spppmk').val(data.pendaftaran_detail.pasien.id_pasien);   

                $('input[type=radio][name=is_pasien]').change(function () {
					// Periksa kondisi
					if (this.value == 1) {
						// Set nilai input dengan nama pasien
						$('#namaspppmk').val(data.pendaftaran_detail.pasien.nama_pjwb); // Pastikan data ini tersedia
						$('#jkpenangungjawabspppmk').val(data.pendaftaran_detail.pasien.kelamin_pjwb); // Pastikan data ini tersedia
                        let tglLahirStrh = data.pendaftaran_detail.pasien.tgl_lahir_pjwb;

                        if (tglLahirStrh) {
                            let [day, month, year] = tglLahirStrh.includes('/')
                                ? tglLahirStrh.split('/').map(Number)
                                : tglLahirStrh.split('-').reverse().map(Number); // fallback yyyy-mm-dd

                            let birthDate = new Date(year, month - 1, day);
                            let today = new Date();

                            let age = today.getFullYear() - birthDate.getFullYear();

                            // Koreksi jika belum ulang tahun tahun ini
                            if (
                                today.getMonth() < birthDate.getMonth() ||
                                (today.getMonth() === birthDate.getMonth() && today.getDate() < birthDate.getDate())
                            ) {
                                age--;
                            }

                            // Format ulang tanggal lahir ke dd/mm/yyyy
                            let formattedDate = `${String(day).padStart(2, '0')}/${String(month).padStart(2, '0')}/${year}`;

                            $('#umurttlspppmk').val(`${age} tahun (${formattedDate})`);
                        }


						$('#nikspppmk').val(data.pendaftaran_detail.pasien.no_identitas); // Pastikan data ini tersedia
                        
						// $('#alamatspppmk').val(
						// 	`${data.pendaftaran_detail.pasien.alamat} RT. ${data.pendaftaran_detail.pasien.no_rt} / RW. ${data.pendaftaran_detail.pasien.no_rw}, Kel. ${data.pendaftaran_detail.pasien.kelurahan}, Kec. ${data.pendaftaran_detail.pasien.kecamatan}, ${data.pendaftaran_detail.pasien.kabupaten}, Prop. ${data.pendaftaran_detail.pasien.provinsi}`
						// );

						$('#alamatspppmk').val(data.pendaftaran_detail.pasien.alamat); // Pastikan data ini tersedia


						$('#notelponspppmk').val(data.pendaftaran_detail.pasien.telp); // Pastikan data ini tersedia
			

						// Disabled input fields
						$("#namaspppmk").prop("disabled", true);
						$("#jkpenangungjawabspppmk").prop("disabled", true);
						$("#umurttlspppmk").prop("disabled", true);
						$("#nikspppmk").prop("disabled", true);
						$("#alamatspppmk").prop("disabled", true);
						$("#notelponspppmk").prop("disabled", true);
					} else if (this.value == 0) {
						// Reset nilai input
						$('#namaspppmk').val('');
						$('#jkpenangungjawabspppmk').val('');
						$('#umurttlspppmk').val('');
						$('#nikspppmk').val('');
						$('#alamatspppmk').val('');
						$('#notelponspppmk').val('');

						// Enable input fields
						$("#namaspppmk").prop("disabled", false);
						$("#jkpenangungjawabspppmk").prop("disabled", false);
						$("#umurttlspppmk").prop("disabled", false);
						$("#nikspppmk").prop("disabled", false);
						$("#alamatspppmk").prop("disabled", false);
						$("#notelponspppmk").prop("disabled", false);
					}
				});

                
                $('#namapasienspppmk').text(data.pendaftaran_detail.pasien.nama);
				$('#jkspppmk').text(data.pendaftaran_detail.pasien.kelamin);

                let tglLahirStrg = data.pendaftaran_detail.pasien.tanggal_lahir;
                let tempatLahir = data.pendaftaran_detail.pasien.tempat_lahir || '';

                if (tglLahirStrg) {
                    let [day, month, year] = tglLahirStrg.includes('/')
                        ? tglLahirStrg.split('/').map(Number)
                        : tglLahirStrg.split('-').reverse().map(Number); // fallback kalau formatnya yyyy-mm-dd

                    let birthDate = new Date(year, month - 1, day);
                    let today = new Date();

                    let years = today.getFullYear() - birthDate.getFullYear();
                    let months = today.getMonth() - birthDate.getMonth();
                    let days = today.getDate() - birthDate.getDate();

                    if (days < 0) {
                        months--;
                        // Ambil jumlah hari di bulan sebelumnya
                        let lastMonth = new Date(today.getFullYear(), today.getMonth(), 0);
                        days += lastMonth.getDate();
                    }

                    if (months < 0) {
                        years--;
                        months += 12;
                    }

                    // Format tanggal lahir ke dd/mm/yyyy
                    let formattedDate = `${String(day).padStart(2, '0')}/${String(month).padStart(2, '0')}/${year}`;

                    // Gabungkan semua output
                    let output = `${years} tahun ${months} bulan ${days} hari`;
                    if (tempatLahir) {
                        output += `, ${tempatLahir.toUpperCase()} ${formattedDate}`;
                    } else {
                        output += ` ${formattedDate}`;
                    }

                    $('#umurttlpspppmk').text(output);
                }

				if (data.list_surat_pernyataan_persetujuan_penolakan_medis_khusus.length !== 0) {
					var numberData = 1;
					// let aksiButton = action;

                    $.each(data.list_surat_pernyataan_persetujuan_penolakan_medis_khusus, function(i, v) {
						let btnEditSuratPernyataanPenolakan = '';
						let btnHapusSuratPernyataanPenolakan = '';

						if ($('#action-spppmk').val() !== 'lihat') {
							btnEditSuratPernyataanPenolakan = `<button type="button" class="btn btn-success btn-xs" onclick="editSuratPersetujuanPmk(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-edit mr-1"></i>Edit</button>`;
							btnHapusSuratPernyataanPenolakan = `<button type="button" class="btn btn-danger btn-xs" onclick="hapusSuratPersetujuanPmk(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>`;
						}

						let html = /* html */ `
							<tr>
								<td class="center">${numberData++}</td>
								<td class="center">${v.tanggalspppmk ? datefmysql(v.tanggalspppmk) : '-'}</td>
                                <td class="center">${data.pendaftaran_detail.pasien.nama}</td>  
                                <td class="center">
									${v.namaspppmk ? v.namaspppmk : data.pendaftaran_detail?.pasien?.nama_pjwb || ''}
								</td>
                                <td class="center">${v.nama_dokter ? v.nama_dokter : '-'}</td>
                                <td class="center">${v.nama_user ? v.nama_user : '-'}</td>
								<td class="center">
									<button type="button" class="btn btn-info btn-xs" onclick="cetakSuratPersetujuanPmk(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-print mr-1"></i>Print</button>
									${btnEditSuratPernyataanPenolakan}
									${btnHapusSuratPernyataanPenolakan}
								</td>
							</tr>
						`;
						$('#table-list-spppmk tbody').append(html)
					})
				}

				$('#modal_surat_pernyataan_persetujuan_pmk').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

    function simpanSuratPernyataanPersetujuanpmk() {
		if ($('#dokterspppmk').val() === '') {
            syams_validation('#dokterspppmk', 'Dokter harus diisi.');
            return false;
        } else {
            syams_validation_remove('#dokterspppmk');
        }

		if ($('#tanggalspppmk').val() === '') {
            syams_validation('#tanggalspppmk', 'Tanggal Belum diisi.');
            return false;
        } else {
            syams_validation_remove('#tanggalspppmk');
        }

		var id_pendaftaran = $('#id-pendaftaran-spppmk').val();
		var id_layanan_pendaftaran = $('#id-layanan-pendaftaran-spppmk').val();

		$.ajax({
			type: 'POST',
			url: '<?= base_url("rekam_medis/api/rekam_medis/simpan_surat_pernyataan_persetujuan_pmk") ?>',
			data: $('#form-surat-pernyataan-persetujuan-pmk ').serialize(),
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
					tableListSppmk(id_pendaftaran, id_layanan_pendaftaran);
					showListForm($('#id-pendaftaran-spppmk').val(), $('#id-layanan-pendaftaran-spppmk').val(), $('#id-pasien-spppmk').val());
				} else {
					messageCustom(data.message, 'Error');
				}
			},
			complete: function(data) {
				hideLoader();
			},
			error: function(e) {
				// messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
				messageCustom('Terjadi Kesalahan : '+ e.statusText +' ('+e.status+')', 'Error');
			}
		});
	}

    function editSuratPersetujuanPmk(id_kmppps, id_pendaftaran, id_layanan_pendaftaran) {
		$('#btn_update_spppmk').removeClass('hide').show();
        $.ajax({
            type: 'GET',
            url: '<?= base_url('rekam_medis/api/rekam_medis/get_edit_surat_pernyataan_persetujuan_pmk') ?>/id/' + id_kmppps + '/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // console.log(data);
                resetFormSPPPMK();
                $('#id-spppmk').val(id_kmppps);
                $('#id-pendaftaran-spppmk').val(id_pendaftaran);
                $('#id-layanan-pendaftaran-spppmk').val(id_layanan_pendaftaran);
                $('#id-pasien-spppmk').val(data.pendaftaran_detail.pasien.id_pasien);

                if (data.edit_surat_pernyataan_persetujuan_penolakan_medis_khusus) {
                    $('#id-spppmk').val(data.edit_surat_pernyataan_persetujuan_penolakan_medis_khusus.id);

					// SENGAJA PAKEK YANG INI SOLANYA UDAH MENTOK DI BAGIAN DISABLE ATAU TARIKAN DATANYA GA NEMU
                    if (data.edit_surat_pernyataan_persetujuan_penolakan_medis_khusus.is_pasien === '1') {
                        document.getElementById("is-pasien-spppmk-ya").checked = true;
                        $( "#namaspppmk" ).prop( "disabled", true );					
                        $( "#jkpenangungjawabspppmk" ).prop( "disabled", true );					
                        $( "#umurttlspppmk" ).prop( "disabled", true );					
                        $( "#nikspppmk" ).prop( "disabled", true );					
                        $( "#alamatspppmk" ).prop( "disabled", true );					
                        $( "#notelponspppmk" ).prop( "disabled", true );	
                    } else if (data.edit_surat_pernyataan_persetujuan_penolakan_medis_khusus.is_pasien === '0') {
                        document.getElementById("is-pasien-spppmk-tidak").checked = true;
                        $( "#namaspppmk" ).prop( "disabled", false );					
                        $( "#jkpenangungjawabspppmk" ).prop( "disabled", false );					
                        $( "#umurttlspppmk" ).prop( "disabled", false );					
                        $( "#nikspppmk" ).prop( "disabled", false );					
                        $( "#alamatspppmk" ).prop( "disabled", false );					
                        $( "#notelponspppmk" ).prop( "disabled", false );	
                    }	

                    $('#namaspppmk').val(data.edit_surat_pernyataan_persetujuan_penolakan_medis_khusus.namaspppmk);
                    $('#jkpenangungjawabspppmk').val(data.edit_surat_pernyataan_persetujuan_penolakan_medis_khusus.jkpenangungjawabspppmk);
					$('#umurttlspppmk').val(datefmysql(data.edit_surat_pernyataan_persetujuan_penolakan_medis_khusus.umurttlspppmk));
                    $('#nikspppmk').val(data.edit_surat_pernyataan_persetujuan_penolakan_medis_khusus.nikspppmk);
                    $('#alamatspppmk').val(data.edit_surat_pernyataan_persetujuan_penolakan_medis_khusus.alamatspppmk);
                    $('#notelponspppmk').val(data.edit_surat_pernyataan_persetujuan_penolakan_medis_khusus.notelponspppmk);


                    if (data.edit_surat_pernyataan_persetujuan_penolakan_medis_khusus.sayasendirispppmk === 'saya sendiri') {
                        document.getElementById("sayasendirispppmk").checked = true;
                    }
                    if (data.edit_surat_pernyataan_persetujuan_penolakan_medis_khusus.sebagaiorangtuaspppmk === 'sebagai orang tua') {
                        document.getElementById("sebagaiorangtuaspppmk").checked = true;
                    }
                    if (data.edit_surat_pernyataan_persetujuan_penolakan_medis_khusus.keluargaspppmk === 'keluarga') {
                        document.getElementById("keluargaspppmk").checked = true;
                    }
                    if (data.edit_surat_pernyataan_persetujuan_penolakan_medis_khusus.walispppmk === 'wali dari') {
                        document.getElementById("walispppmk").checked = true;
                    }
                    $('#darispppmk').val(data.edit_surat_pernyataan_persetujuan_penolakan_medis_khusus.darispppmk);

                    if (data.edit_surat_pernyataan_persetujuan_penolakan_medis_khusus.setujuspppmk === 'SETUJU') {
                        document.getElementById("setujuspppmk").checked = true;
                    }
                    if (data.edit_surat_pernyataan_persetujuan_penolakan_medis_khusus.menolakspppmk === 'MENOLAK') {
                        document.getElementById("menolakspppmk").checked = true;
                    }

                    $('#pmitujuanspppmk').val(data.edit_surat_pernyataan_persetujuan_penolakan_medis_khusus.pmitujuanspppmk);
					$('#tanggalspppmk').val(datefmysql(data.edit_surat_pernyataan_persetujuan_penolakan_medis_khusus.tanggalspppmk));

                    $('#dokterspppmk').val(data.edit_surat_pernyataan_persetujuan_penolakan_medis_khusus.dokterspppmk);
                    $('#s2id_dokterspppmk a .select2c-chosen').html(data.edit_surat_pernyataan_persetujuan_penolakan_medis_khusus.nama_dokter);         
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

    function hapusSuratPersetujuanPmk(id_spppmk, id_pendaftaran, id_layanan_pendaftaran) {
		bootbox.dialog({
			message: "Anda yakin akan manghapus Data ini?",
			title: "Hapus Data",
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
								type: 'POST',
								url: '<?= base_url("rekam_medis/api/rekam_medis/hapus_surat_pernyataan_persetujuan_pmk") ?>',
								data: {
									id: id_spppmk
								},
								cache: false,
								dataType: 'JSON',
								beforeSend: function() {
									showLoader();
								},
								success: function(data) {
									if (data.status) {
										messageCustom(data.message, 'Success');
										tableListSppmk(id_pendaftaran, id_layanan_pendaftaran);

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

    function cetakSuratPersetujuanPmk(id_spppmk, id_pendaftaran, id_layanan_pendaftaran) {
        window.open('<?= base_url('rekam_medis/cetak_surat_pernyataan_persetujuan_pmk/') ?>' + id_spppmk + '/' + id_pendaftaran + '/' + id_layanan_pendaftaran, 'Cetak Surat Pernyataan Persetujuan', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
    }

    function resetFormSPPPMK() {
        $('#form-surat-pernyataan-persetujuan-pmk')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false); 
		$('#dokterspppmk').val('');
		$('#s2id_dokterspppmk a .select2c-chosen').html('Silahkan Pilih..');
		$('#id-spppmk').val('');
		$('#id-pendaftaran-spppmk').val('');
		$('#id-layanan-pendaftaran-spppmk').val('');
		$('#id-pasien-spppmk').val('');
	}

</script>