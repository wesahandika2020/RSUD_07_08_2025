<script>
    // KPEGD PERBAIKAN

    $('#danlainkpegd').click(function() {
        // Tidak ada pengondisian, hanya memastikan #geriatri-pppk-3 aktif
        $('#danlainlainkpegd').prop('readonly', false);
    });

    $(function() {		
        $('#doktertriasekpegd').select2c({
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

        $('#tanggalkpegd').datetimepicker({
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
			resetFormKPEGD();
		});

	})

    function lihatFORM_REM_28_02(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'lihat';
		entriKpegd(layanan.id_pendaftaran, layanan.id, action);
	}

	function editFORM_REM_28_02(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'edit';
		entriKpegd(layanan.id_pendaftaran, layanan.id, action);
	}

	function tambahFORM_REM_28_02(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let action = 'tambah';
		entriKpegd(layanan.id_pendaftaran, layanan.id, action);
	}

    function entriKpegd(id_pendaftaran, id_layanan_pendaftaran, action) {
		resetFormKPEGD();

		$('#btn_simpan').hide();
		$('#action-kpegd').val(action);

		var groupAccount = '<?= $this->session->userdata('account_group') ?>';
		var profesi = '<?= $this->session->userdata('profesinadis') ?>';
		if (groupAccount == 'Admin') {
			profesi = 'Perawat';
		}

		if (action !== 'lihat') {
			$('#btn_simpan, #btn_reset').show();
			$('.form-keterangan-pasien-emergency ').show();
		} else {
			$('#btn_simpan, #btn_reset').hide();
			$('.form-keterangan-pasien-emergency ').hide();
		}
		tableListKpegd(id_pendaftaran, id_layanan_pendaftaran);
	}

    function tableListKpegd(id_pendaftaran, id_layanan_pendaftaran) {
		$('#table-list-kpegd tbody').empty(); // Bersihkan tabel sebelum rendering ulang
		$('#btn_update_kpegd').hide(); // menyembuyikan btnupdate
		syams_validation_remove('#tanggalkpegd, #doktertriasekpegd');

		$.ajax({
			type: 'GET',
			url: '<?= base_url('rekam_medis/api/rekam_medis/get_keterangan_pasien_emergency') ?>/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {				
				// console.log(data);
				resetFormKPEGD();
				$('#modal_keterangan_pasien_emergency_title').html(`<b>FORM  KETERANGAN PASIEN EMERGENCY / GAWAT DARURAT </b>`);
				$('#id-pendaftaran-kpegd').val(id_pendaftaran);
				$('#id-layanan-pendaftaran-kpegd').val(id_layanan_pendaftaran);
				$('#id-pasien-kpegd').val(data.pendaftaran_detail.pasien.id_pasien);       
                $('#namapasienkpegd').text(data.pendaftaran_detail.pasien.nama);

                const diagUtamaRm = [...data.diagnosa_utama, ...data.ds_manual_utama]
                    .sort((a, b) => b.id_layanan_pendaftaran - a.id_layanan_pendaftaran)[0]?.nama;
                $('#diagnosamasuk').html(diagUtamaRm);


                // INI NGELUARIN SEMUA DIAGNOSA
                // const semuaDiagnosa = [
                // ...data.diagnosa_utama,
                // ...data.ds_manual_utama,
                // ...data.diagnosa_sekunder,
                // ...data.ds_manual_sekunder
                // ];
                // // Sort dulu kalau mau berdasarkan id_layanan_pendaftaran, dari terbaru
                // semuaDiagnosa.sort((a, b) => b.id_layanan_pendaftaran - a.id_layanan_pendaftaran);
                // // Ambil semua nama, dan tampilkan sebagai list HTML
                // // const htmlDiagnosa = semuaDiagnosa.map(d => `<li>${d.nama}</li>`).join('');
                // // $('#diagnosamasuk').html(`<ul>${htmlDiagnosa}</ul>`);
                // const htmlDiagnosa = semuaDiagnosa.map(d => d.nama).join('<br>');
                // $('#diagnosamasuk').html(htmlDiagnosa);




                // Gabung diagnosa utama dan sekunder  INI JUGA JANGAN DI HAPUS IKEHH
                // const diagnosaUtama = [...data.diagnosa_utama, ...data.ds_manual_utama]
                // .sort((a, b) => b.id_layanan_pendaftaran - a.id_layanan_pendaftaran);

                // const diagnosaSekunder = [...data.diagnosa_sekunder, ...data.ds_manual_sekunder]
                // .sort((a, b) => b.id_layanan_pendaftaran - a.id_layanan_pendaftaran);

                // // Ubah ke HTML
                // const htmlUtama = diagnosaUtama.map(d => `<li>${d.nama}</li>`).join('');
                // const htmlSekunder = diagnosaSekunder.map(d => `<li>${d.nama}</li>`).join('');

                // // Gabungkan dengan judul
                // const htmlGabung = `
                // <strong>🩺 Diagnosa Utama:</strong>
                // <ul>${htmlUtama || '<li><em>Belum ada</em></li>'}</ul>
                // <strong>🩺 Diagnosa Sekunder:</strong>
                // <ul>${htmlSekunder || '<li><em>Belum ada</em></li>'}</ul>
                // `;

                // $('#diagnosamasuk').html(htmlGabung);


				if (data.list_keterangan_pasien_emergency.length !== 0) {
					var numberData = 1;
					// let aksiButton = action;

                    $.each(data.list_keterangan_pasien_emergency, function(i, v) {
						let btnEditKeteranganPasienEmergency = '';
						let btnHapusKeteranganPasienEmergency = '';

						if ($('#action-kpegd').val() !== 'lihat') {
							btnEditKeteranganPasienEmergency = `<button type="button" class="btn btn-success btn-xs" onclick="editKeteranganPasienEmergency(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-edit mr-1"></i>Edit</button>`;
							btnHapusKeteranganPasienEmergency = `<button type="button" class="btn btn-danger btn-xs" onclick="hapusKeteranganPasienEmergency(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>`;
						}

						let html = /* html */ `
							<tr>
								<td class="center">${numberData++}</td>
								<td class="center">${v.tanggalkpegd ? datefmysql(v.tanggalkpegd) : '-'}</td>
                                <td class="center">${data.pendaftaran_detail.pasien.nama}</td>  
                                <td class="center">${v.nama_dokter ? v.nama_dokter : '-'}</td>
                                <td class="center">${v.nama_user ? v.nama_user : '-'}</td>
								<td class="center">
									<button type="button" class="btn btn-info btn-xs" onclick="cetakKeteranganPasienEmergency(${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran})"><i class="fas fa-print mr-1"></i>Print</button>
									${btnEditKeteranganPasienEmergency}
									${btnHapusKeteranganPasienEmergency}
								</td>
							</tr>
						`;
						$('#table-list-kpegd tbody').append(html)
					})
				}

				$('#modal_keterangan_pasien_emergency').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

    function simpanSuratKeteranganPasienEmergency() {
		if ($('#doktertriasekpegd').val() === '') {
            syams_validation('#doktertriasekpegd', 'Dokter harus diisi.');
            return false;
        } else {
            syams_validation_remove('#doktertriasekpegd');
        }

		if ($('#tanggalkpegd').val() === '') {
            syams_validation('#tanggalkpegd', 'Tanggal Belum diisi.');
            return false;
        } else {
            syams_validation_remove('#tanggalkpegd');
        }

		var id_pendaftaran = $('#id-pendaftaran-kpegd').val();
		var id_layanan_pendaftaran = $('#id-layanan-pendaftaran-kpegd').val();

		$.ajax({
			type: 'POST',
			url: '<?= base_url("rekam_medis/api/rekam_medis/simpan_keterangan_pasien_emergency") ?>',
			data: $('#form-keterangan-pasien-emergency').serialize(),
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
					tableListKpegd(id_pendaftaran, id_layanan_pendaftaran);
					showListForm($('#id-pendaftaran-kpegd').val(), $('#id-layanan-pendaftaran-kpegd').val(), $('#id-pasien-kpegd').val());
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

    function editKeteranganPasienEmergency(id_dgepk, id_pendaftaran, id_layanan_pendaftaran) { 
		$('#btn_update_kpegd').removeClass('hide').show();
        $.ajax({
            type: 'GET',
            url: '<?= base_url('rekam_medis/api/rekam_medis/get_edit_keterangan_pasien_emergency') ?>/id/' + id_dgepk + '/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // console.log(data);
                resetFormKPEGD();
                $('#id-kpegd').val(id_dgepk);
                $('#id-pendaftaran-kpegd').val(id_pendaftaran);
                $('#id-layanan-pendaftaran-kpegd').val(id_layanan_pendaftaran);
                $('#id-pasien-kpegd').val(data.pendaftaran_detail.pasien.id_pasien);

                if (data.edit_list_keterangan_pasien_emergency) {
                    $('#id-kpegd').val(data.edit_list_keterangan_pasien_emergency.id);

                    if (data.edit_list_keterangan_pasien_emergency.bpjskpegd === '1') {
                        document.getElementById("bpjskpegd").checked = true;
                    }
                    if (data.edit_list_keterangan_pasien_emergency.umumkpegd === '1') {
                        document.getElementById("umumkpegd").checked = true;
                    }
                    if (data.edit_list_keterangan_pasien_emergency.lainkpegd === '1') {
                        document.getElementById("lainkpegd").checked = true;
                    }

                    $('#doktertriasekpegd').val(data.edit_list_keterangan_pasien_emergency.doktertriasekpegd);
                    $('#s2id_doktertriasekpegd a .select2c-chosen').html(data.edit_list_keterangan_pasien_emergency.nama_dokter);   

                    if (data.edit_list_keterangan_pasien_emergency.gawatdaruratkpegd === '1') {
                        document.getElementById("gawatdaruratkpegd").checked = true;
                    }

                    if (data.edit_list_keterangan_pasien_emergency.tgawatdaruratkpegd === '1') {
                        document.getElementById("tgawatdaruratkpegd").checked = true;
                    }

                    if (data.edit_list_keterangan_pasien_emergency.datangsendirikpegd === '1') {
                        document.getElementById("datangsendirikpegd").checked = true;
                    }
                    if (data.edit_list_keterangan_pasien_emergency.klinikkpegd === '1') {
                        document.getElementById("klinikkpegd").checked = true;
                    }
                    if (data.edit_list_keterangan_pasien_emergency.puskesmaskpegd === '1') {
                        document.getElementById("puskesmaskpegd").checked = true;
                    }
                    if (data.edit_list_keterangan_pasien_emergency.rslainkpegd === '1') {
                        document.getElementById("rslainkpegd").checked = true;
                    }
                    if (data.edit_list_keterangan_pasien_emergency.danlainkpegd === '1') {
                        document.getElementById("danlainkpegd").checked = true;
                    }

                    $('#danlainlainkpegd').val(data.edit_list_keterangan_pasien_emergency.danlainlainkpegd);
					$('#tanggalkpegd').val(datefmysql(data.edit_list_keterangan_pasien_emergency.tanggalkpegd));         
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

    function hapusKeteranganPasienEmergency(id_kpegd, id_pendaftaran, id_layanan_pendaftaran) {
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
								url: '<?= base_url("rekam_medis/api/rekam_medis/hapus_keterangan_pasien_emergency") ?>',
								data: {
									id: id_kpegd
								},
								cache: false,
								dataType: 'JSON',
								beforeSend: function() {
									showLoader();
								},
								success: function(data) {
									if (data.status) {
										messageCustom(data.message, 'Success');
										tableListKpegd(id_pendaftaran, id_layanan_pendaftaran);

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

    function cetakKeteranganPasienEmergency(id_kpegd, id_pendaftaran, id_layanan_pendaftaran) {
        window.open('<?= base_url('rekam_medis/cetak_keterangan_pasien_emergency/') ?>' + id_kpegd + '/' + id_pendaftaran + '/' + id_layanan_pendaftaran, 'Cetak Keterangan Emergency', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
    }

    function resetFormKPEGD() {
        $('#form-keterangan-pasien-emergency')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false);    
        $('#doktertriasekpegd').val('');
		$('#s2id_doktertriasekpegd a .select2c-chosen').html('Pilih Dokter');   
        $('#id-kpegd').val('');
		$('#id-pendaftaran-kpegd').val('');
		$('#id-layanan-pendaftaran-kpegd').val('');
		$('#id-pasien-kpegd').val('');  
    }
</script>