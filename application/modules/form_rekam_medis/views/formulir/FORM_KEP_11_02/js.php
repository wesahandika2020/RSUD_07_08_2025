<script>
	var dWidth = $(window).width();
	var dHeight = $(window).height();
	var x = screen.width / 2 - dWidth / 2;
	var y = screen.height / 2 - dHeight / 2;

	
	var canvas1 = $('#signature-pasien-rm')[0];
	var canvas2 = $('#signature-edukator-rm')[0];

	ttdCanvas(canvas1);
	ttdCanvas(canvas2);

	function ttdCanvas(canvas){
		var context = canvas.getContext('2d');
		var isCanvasChanged = false;

		var isDrawing = false;
		var lastX = 0;
		var lastY = 0;
		var color = "black";
		var lineWidth = 2;
		var img = new Image();
		img.onload = function() {
			// Menggambar gambar sebagai latar belakang
			context.drawImage(img, 0, 0, canvas.width, canvas.height);
		}

		canvas.addEventListener("mousedown", function(e) {
			isDrawing = true;
			lastX = e.offsetX;
			lastY = e.offsetY;
		});

		canvas.addEventListener("mousemove", function(e) {
			if (isDrawing) {
				context.beginPath();
				context.moveTo(lastX, lastY);
				context.lineTo(e.offsetX, e.offsetY);
				context.strokeStyle = color;
				context.lineWidth = lineWidth;
				context.stroke();
				lastX = e.offsetX;
				lastY = e.offsetY;
				isCanvasChanged = true; // Mengubah status perubahan canvas menjadi true
			}
		});

		canvas.addEventListener("mouseup", function(e) {
			isDrawing = false;
		});


		canvas.addEventListener("mouseleave", function(e) {
			isDrawing = false;
		});

		// Touch Events
		canvas.addEventListener("touchstart", function(e) {
			isDrawing = true;
			var touch = e.touches[0];
			lastX = touch.clientX - canvas.getBoundingClientRect().left;
			lastY = touch.clientY - canvas.getBoundingClientRect().top;
		});

		canvas.addEventListener("touchmove", function(e) {
			e.preventDefault();
			if (isDrawing) {
				var touch = e.touches[0];
				context.beginPath();
				context.moveTo(lastX, lastY);
				context.lineTo(touch.clientX - canvas.getBoundingClientRect().left, touch.clientY - canvas.getBoundingClientRect().top);
				context.strokeStyle = color;
				context.lineWidth = lineWidth;
				context.stroke();
				lastX = touch.clientX - canvas.getBoundingClientRect().left;
				lastY = touch.clientY - canvas.getBoundingClientRect().top;
				isCanvasChanged = true;
			}
		});

		canvas.addEventListener("touchend", function(e) {
			isDrawing = false;
		});
	}

	function clearSignatureTtdPasien(){
		var canvas = $('#signature-pasien-rm')[0];
		var context = canvas.getContext('2d');
		var img = new Image();
		context.clearRect(0, 0, canvas.width, canvas.height);
		context.drawImage(img, 0, 0, canvas.width, canvas.height);
	}

	function clearSignatureTtdEdukator(){
		var canvas = $('#signature-edukator-rm')[0];
		var context = canvas.getContext('2d');
		var img = new Image();
		context.clearRect(0, 0, canvas.width, canvas.height);
		context.drawImage(img, 0, 0, canvas.width, canvas.height);
	}

	$('#clear-signature-pasien-rm, #clear-signature-edukator-rm').click(function() {
		if($(this).attr('id') == 'clear-signature-pasien-rm'){
			clearSignatureTtdPasien();
		}else{
			clearSignatureTtdEdukator();
		}
	});

	$(function() {
		$('input[name="bahasa"]').change(function() {
			if ($(this).val() == 'Lain-lain') {
				$('#edu_ket_bahasa_lain_rm').prop('disabled', false);
			} else {
				$('#edu_ket_bahasa_lain_rm').val('');
				$('#edu_ket_bahasa_lain_rm').prop('disabled', true);
			}
		});

		$('input[name="hambatan_edukasi"]').change(function() {
			if ($(this).val() == 'Lain-lain') {
				$('#edu_ket_hambatan_edukasi_lain_rm').prop('disabled', false);
			} else {
				$('#edu_ket_hambatan_edukasi_lain_rm').val('');
				$('#edu_ket_hambatan_edukasi_lain_rm').prop('disabled', true);
			}
		});

		$('input[name="evaluasi"]').change(function() {
			if ($(this).val() == 'Re-Edukasi') {
				$('#edu_tanggal_re_edukasi_rm').prop('disabled', false);
			} else {
				$('#edu_tanggal_re_edukasi_rm').val('');
				$('#edu_tanggal_re_edukasi_rm').prop('disabled', true);
			}
		});

		// hide class ket_topik_edukasi
		$('.ket_topik_edukasi').hide();
		$('.text_input_ket_topik_edukasi').hide();
		$('#edu_topik_edukasi_rm').select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/topik_edukasi_auto') ?>",
				dataType: 'JSON',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
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
				var markup = data.nama;
				return markup;
			},
			formatSelection: function(data) {
				// jika keterangan tidak null show ket_topik_edukasi
				if (data.keterangan !== null) {
					$('.ket_topik_edukasi').show();
					$('#edu_label_ket_topik_edukasi_rm').html(data.keterangan);
					if (data.text_input == 1) {
						$('.text_input_ket_topik_edukasi').show();
					} else {
						$('.text_input_ket_topik_edukasi').hide();
					}
				}

				return data.nama;
			}
		});

		$('#edu_tanggal_edukasi_rm, #edu_tanggal_re_edukasi_rm').datepicker({
			format: 'dd/mm/yyyy',
			endDate: new Date()
		}).on('changeDate', function() {
			$(this).datepicker('hide');
		});

		$('#edu_edukator_rm').select2c({
			ajax: {
				url: "<?= base_url('pendaftaran_igd/api/pendaftaran_igd/pegawai_pendaftaran_igd') ?>",
				dataType: 'json',
				quietMillis: 100,
				allowClear: true,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
						jenis: '',
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
				var markup = '<b>' + data.nama + '</b>';
				return markup;
			},
			formatSelection: function(data) {
				return data.nama;
			}
		});

		// $('#edu_edukator_rm')
		// 	.select2c({
		// 	ajax: {
		// 		url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
		// 		dataType: 'json',
		// 		quietMillis: 100,
		// 		data: function(term,
		// 			page) { // page is the one-based page number tracked by Select2
		// 			return {
		// 				q: term, //search term
		// 				page: page, // page number
		// 				jenis: $('#c_profesi').val(),
		// 			};
		// 		},
		// 		results: function(data, page) {
		// 			var more = (page * 20) < data
		// 				.total; // whether or not there are more results available

		// 			// notice we return the value of more so Select2 knows if more results can be loaded
		// 			return {
		// 				results: data.data,
		// 				more: more
		// 			};
		// 		}
		// 	},
		// 	formatResult: function(data) {
		// 		var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
		// 		return markup;
		// 	},
		// 	formatSelection: function(data) {
		// 		return data.nama;
		// 	}
		// });



		$('.valid-input').keyup(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this);
			}
		})

		$('.valid-input').change(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this);
			}
		})
	});

	function lihatFORM_KEP_11_02(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
		let action = 'lihat';

		entriKeperawatan(layanan.id_pendaftaran, layanan.id, bed, action);
	}

	function editFORM_KEP_11_02(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
		let action = 'edit';

		entriKeperawatan(layanan.id_pendaftaran, layanan.id, bed, action);
	}

	function tambahFORM_KEP_11_02(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
		let action = 'tambah';

		entriKeperawatan(layanan.id_pendaftaran, layanan.id, bed, action);
	}

	function entriKeperawatan(id_pendaftaran, id_layanan_pendaftaran, bed, action) {
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
				$('#edu_id_layanan_pendaftaran_rm').val(id_layanan_pendaftaran);
				if (data.pasien !== null) {
					$('#edu_pasien_nama_rm').text(data.pasien.nama);
					$('#edu_pasien_no_rm_rm').text(data.pasien.no_rm);
					$('#edu_pasien_tanggal_lahir_rm').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
					$('#edu_pasien_jenis_kelamin_rm').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
					$('#edu_pendidikan_pasien_rm').text(data.pasien.pendidikan)
				}

				if (data.edukasi !== null) {
					$('#edu_id_rm').val(data.edukasi.id);
					if (data.edukasi.id !== null) {
						$('.disabled').attr('disabled', true);
					}

					if (data.edukasi.sedia_menerima_info == '0') {
						$('#edu_sedia_menerima_informasi_tidak_rm').prop('checked', true)
					} else if (data.edukasi.sedia_menerima_info == '1') {
						$('#edu_sedia_menerima_informasi_ya_rm').prop('checked', true)
					}

					if (data.edukasi.bahasa == 'Indonesia') {
						$('#edu_bahasa_ind_rm_rm').prop('checked', true);
						$('#edu_ket_bahasa_lain_rm').val('');
					} else if (data.edukasi.bahasa == 'Inggris') {
						$('#edu_bahasa_ing_rm').prop('checked', true);
						$('#edu_ket_bahasa_lain_rm').val('');
					} else if (data.edukasi.bahasa == 'Lain-lain') {
						$('#edu_bahasa_lain_rm').prop('checked', true);
						$('#edu_ket_bahasa_lain_rm').val(data.edukasi.ket_bahasa_lain);
					}

					$('#edu_daerah').val(data.edukasi.ket_bahasa_daerah);

					if (data.edukasi.butuh_penterjemah == '0') {
						$('#edu_kebutuhan_penterjemah_tidak_rm').prop('checked', true)
					} else if (data.edukasi.butuh_penterjemah == '1') {
						$('#edu_kebutuhan_penterjemah_ya_rm').prop('checked', true)
					}

					if (data.edukasi.baca_tulis == 'Baik') {
						$('#edu_baca_tulis_baik_rm').prop('checked', true)
					} else if (data.edukasi.baca_tulis == 'Kurang') {
						$('#edu_baca_tulis_kurang_rm').prop('checked', true)
					}

					if (data.edukasi.tipe_pembelajaran == 'Tulisan') {
						$('#edu_tipe_belajar_tulisan_rm').prop('checked', true)
					} else if (data.edukasi.tipe_pembelajaran == 'Verbal') {
						$('#edu_tipe_belajar_verbal_rm').prop('checked', true)
					}

					if (data.edukasi.hambatan_edukasi == 'Tidak Ada') {
						$('#edu_hambatan_edukasi_tidak_ada_rm').prop('checked', true);
					} else if (data.edukasi.hambatan_edukasi == 'Penglihatan Terganggu') {
						$('#edu_hambatan_edukasi_penglihatan_terganggu_rm').prop('checked', true);
					} else if (data.edukasi.hambatan_edukasi == 'Bahasa') {
						$('#edu_hambatan_edukasi_bahasa_rm').prop('checked', true);
					} else if (data.edukasi.hambatan_edukasi == 'Lain-lain') {
						$('#edu_hambatan_edukasi_lain_rm').prop('checked', true);
						$('#edu_ket_hambatan_edukasi_lain_rm').val(data.edukasi.ket_hambatan_edukasi)
					}

					// perencanaan edukasi
					if (data.edukasi.perencanaan_edukasi != null) {
						var str = data.edukasi.perencanaan_edukasi;
						var values = str.split(', ');
						$('.perencanaan_edukasi').each(function(j) {
							if ($.inArray($(this).val(), values) == -1) {
								$(this).prop('checked', false);
							} else {
								$(this).prop('checked', true);
							}
						})
					}

					$('#btn_print_edu_rm').hide();
					console.log(data.edukasi.detail.length)
					if (data.edukasi.detail.length > 0) {
						$('#btn_print_edu_rm').show().attr('onclick', 'printEdukasi(' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ')');
						showDataDetailEdukasiRm(data.edukasi.detail);
					}

				}

                $('#modal_edukasi_rm').modal('show');
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                accessFailed(e.status);
            },
        });
    }

	function showDataDetailEdukasiRm(data) {
		if (data !== null) {
			$.each(data, function(i, v) {
				var numb_edu = $('.numb_edu').length;
				var html = /* html */ `
					<tr>
						<td class="numb_edu center">
							<input type="hidden" name="id_edu[]" value="${v.id}">${(++numb_edu)}
							<input type="hidden" name="id_topik_edu[]" value="${v.id_topik_edukasi}">
						</td>
						<td>
							<span class="bold">${v.topik_edukasi}</span><br>
							<input type="hidden" name="ket_topik_edu[]" value="${v.ket_topik_edukasi}"><em>${v.keterangan} : ${v.ket_topik_edukasi}</em>
						</td>
						<td class="center">
							<input type="hidden" name="tanggal_edu[]" value="${v.tanggal_edukasi}">${datefmysql(v.tanggal_edukasi)}
						</td>
						<td class="nowrap center">
							<input type="hidden" name="nama_keluarga_edu[]" value="${v.nama_keluarga}">${v.nama_keluarga}<br>
							<input type="hidden" name="status_hubungan_edu[]" value="${v.status_hubungan}"><em>(${v.status_hubungan})</em>
						</td>
						<td class="center">
							<img src="<?= base_url("resources/images/form_epkt/") ?>${v.ttd_keluarga}" width="100px"/>
							<input type="hidden" name="ttd_keluarga_edu[]" value="${v.ttd_keluarga}">
						</td>
						<td class="nowrap center">
							<input type="hidden" name="id_edukator_edu[]" value="${v.id_edukator}">${v.edukator}
						</td>
						<td class="center">
							<img src="<?= base_url("resources/images/form_epkt/") ?>${v.ttd_edukator}" width="100px"/>
							<input type="hidden" name="ttd_edukator_edu[]" value="${v.ttd_edukator}">
						</td>
						<td class="nowrap">
							<input type="hidden" name="pemahaman_awal_edu[]" value="${v.tingkat_pemahaman_awal}">${v.tingkat_pemahaman_awal}
						</td>
						<td class="nowrap">
							<input type="hidden" name="metoda_edu[]" value="${v.metoda_edukasi}">${v.metoda_edukasi}
						</td>
						<td class="nowrap">
							<input type="hidden" name="media_edu[]" value="${v.media_edukasi}">${v.media_edukasi}
						</td>
						<td class="nowrap">
							<input type="hidden" name="evaluasi_edu[]" value="${v.evaluasi}">${v.evaluasi}
						</td>
						<td class="center nowrap">
							<input type="hidden" name="tanggal_re_edu[]" value="${v.tanggal_re_edukasi}">${(v.tanggal_re_edukasi !== null ? datefmysql(v.tanggal_edukasi) : '-')}
						</td>
						<td>
							<button type="button" class="btn btn-secondary btn-xxs" onclick="deleteEdukasi(this, ${v.id})">
								<i class="fas fa-trash-alt"></i>
							</button>
						</td>
					</tr>
				`;

				$('#table_edukasi_rm tbody').append(html);
			});

		}
	}

	function deleteEdukasi(obj, id) {
		swal.fire({
			title: 'Konfirmasi',
			html: "<em>Data yang sudah tersimpan tidak bisa diubah</em><br>Apakah data yang anda masukkan sudah benar ?",
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-save mr-1"></i>Ya, Simpan',
			cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
			reverseButtons: true,
			allowOutsideClick: false
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'DELETE',
					url: '<?= base_url("pelayanan/api/pelayanan/hapus_edukasi") ?>/' + id,
					cache: false,
					dataType: 'json',
					success: function(data) {
						if (data.status) {
							messageCustom(data.message, 'Success');
							removeEdukasi(obj);
						} else {
							messageCustom(data.message, 'Error');
						}
					},
					error: function(e) {
						messageDeleteFailed();
					}
				});
			}
		})
	}

	function removeEdukasi(el) {
		var parent = el.parentNode.parentNode;
		parent.parentNode.removeChild(parent);
	}

	function printEdukasi(id_pendaftaran, id_layanan_pendaftaran) {
		window.open('<?= base_url() ?>pendaftaran_igd/printing_edukasi/' + id_pendaftaran + '/' + id_layanan_pendaftaran, 'Cetak Form Edukasi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}



	function addEdukasi() {
		var numb_edu = $('.numb_edu').length;
		// var id_topik_edukasi = $('#edu_topik_edukasi_rm').val();
		// var label_topik_edukasi = $('#s2id_edu_topik_edukasi a .select2c-chosen_rm').html();
		var id_topik_edukasi = $('#edu_topik_edukasi_rm').val();
		var label_topik_edukasi = $('#s2id_edu_topik_edukasi_rm a .select2c-chosen').html();

		var ket_topik_edukasi = $('#edu_ket_topik_edukasi_rm').val();
		var tanggal_edukasi = $('#edu_tanggal_edukasi_rm').val();
		var nama_sasaran = $('#edu_nama_keluarga_rm').val();
		var status_hubungan = $('#edu_status_hubungan_rm').val();
		var id_edukator = $('#edu_edukator_rm').val();
		var label_edukator = $('#s2id_edu_edukator_rm a .select2c-chosen').html();
		var tingkat_pemahaman_awal = (typeof $('input[name="tingkat_pemahaman_awal"]:checked').val() !== 'undefined' ? $('input[name="tingkat_pemahaman_awal"]:checked').val() : '');
		var metoda_edukasi = (typeof $('input[name="metoda_edukasi"]:checked').val() !== 'undefined' ? $('input[name="metoda_edukasi"]:checked').val() : '');
		var media_edukasi = (typeof $('input[name="media_edukasi"]:checked').val() !== 'undefined' ? $('input[name="media_edukasi"]:checked').val() : '');
		var evaluasi = (typeof $('input[name="evaluasi"]:checked').val() !== 'undefined' ? $('input[name="evaluasi"]:checked').val() : '');
		var tanggal_re_edukasi = $('#edu_tanggal_re_edukasi_rm').val();
		const signaturePasien = $('#signature-pasien-rm')[0].toDataURL('image/png');
		const signatureEdukator = $('#signature-edukator-rm')[0].toDataURL('image/png');

		if (id_topik_edukasi == '') {
			syams_validation('#edu_topik_edukasi_rm', 'Topik edukasi pilih terlebih dahulu!');
			return false;
		}

		if (tanggal_edukasi == '') {
			syams_validation('#edu_tanggal_edukasi_rm', 'Tanggal edukasi harus diisi!');
			return false;
		}

		if (nama_sasaran == '') {
			syams_validation('#edu_nama_keluarga_rm', 'Nama sasaran edukasi harus diisi!');
			return false;
		}

		if (status_hubungan == '') {
			syams_validation('#edu_status_hubungan_rm', 'Status hubungan harus diisi!');
			return false;
		}

		if (id_edukator == '') {
			syams_validation('#edu_edukator_rm', 'Edukator harus dipilih!');
			return false;
		}

		if (evaluasi == 'Re-Edukasi') {
			if (tanggal_re_edukasi == '') {
				syams_validation('#edu_tanggal_re_edukasi_rm', 'Tanggal re-edukasi harus diisi!');
				return false;
			}
		} else {
			syams_validation_remove('#edu_tanggal_re_edukasi_rm');
		}
		var html = /* html */ `
			<tr>
				<td class="numb_edu center">
                    <input type="hidden" name="id_edu[]" value="">
                    <input type="hidden" name="id_topik_edu[]" value="${id_topik_edukasi}">${(++numb_edu)}
                </td>
				<td>
					<span class="bold">${label_topik_edukasi}</span><br>
					<input type="hidden" name="ket_topik_edu[]" value="${ket_topik_edukasi}">${ket_topik_edukasi}
				</td>
				<td class="center">
					<input type="hidden" name="tanggal_edu[]" value="${date2mysql(tanggal_edukasi)}">${tanggal_edukasi}
				</td>
				<td class="nowrap center">
					<input type="hidden" name="nama_keluarga_edu[]" value="${nama_sasaran}">${nama_sasaran}<br>
					<input type="hidden" name="status_hubungan_edu[]" value="${status_hubungan}"><em>(${status_hubungan})</em>
				</td>
				<td class="center">
					<img src="${signaturePasien}" alt="tandatangan-pasien" width="100px"/>
					<input type="hidden" name="ttd_keluarga_edu[]" value="${signaturePasien}">
				</td>
				<td class="nowrap center">
					<input type="hidden" name="id_edukator_edu[]" value="${id_edukator}">${label_edukator}
				</td>
				<td class="center">
					<img src="${signatureEdukator}" alt="tandatangan-edukator" width="100px"/>
					<input type="hidden" name="ttd_edukator_edu[]" value="${signatureEdukator}">
				</td>
				<td class="nowrap">
					<input type="hidden" name="pemahaman_awal_edu[]" value="${tingkat_pemahaman_awal}">${tingkat_pemahaman_awal}
				</td>
				<td class="nowrap">
					<input type="hidden" name="metoda_edu[]" value="${metoda_edukasi}">${metoda_edukasi}
				</td>
				<td class="nowrap">
					<input type="hidden" name="media_edu[]" value="${media_edukasi}">${media_edukasi}
				</td>
				<td class="nowrap">
					<input type="hidden" name="evaluasi_edu[]" value="${evaluasi}">${evaluasi}
				</td>
				<td class="center nowrap">
					<input type="hidden" name="tanggal_re_edu[]" value="${( tanggal_re_edukasi !== '' ? date2mysql(tanggal_re_edukasi) : '')}">${tanggal_re_edukasi}
				</td>
				<td>
					<button type="button" class="btn btn-secondary btn-xxs" onclick="removeEdukasi(this)">
						<i class="fas fa-trash-alt"></i>
					</button>
				</td>
			</tr>
		`;

		$('#table_edukasi_rm tbody').append(html);
		$('#edu_topik_edukasi_rm, #edu_ket_topik_edukasi_rm, #edu_tanggal_edukasi_rm, #edu_nama_keluarga_rm, #edu_status_hubungan_rm, #edu_edukator_rm, #edu_tanggal_re_edukasi_rm').val('');
		$('input[name="tingkat_pemahaman_awal"]').prop('checked', false);
		$('input[name="metoda_edukasi"]').prop('checked', false);
		$('input[name="media_edukasi"]').prop('checked', false);
		$('input[name="evaluasi"]').prop('checked', false);
		$('#s2id_edu_topik_edukasi_rm a .select2c-chosen').html('Pilih Topik Edukasi');
		$('#s2id_edu_edukator_rm a .select2c-chosen').html('Pilih Edukator');
		$('.ket_topik_edukasi').hide();
		clearSignatureTtdPasien()
		clearSignatureTtdEdukator()
	}

	function simpanEdukasiRm() {
		var stop = false;
		// if($("[name='sedia_menerima_informasi']").not(":checked")) {
		// 	swalAlert('warning', 'Validasi', 'Ketersediaan menerima informasi harus dipilih!');
		// 	stop = true;
		// }

		if (stop) {
			return false;
		}

		if ($('.numb_edu').length < 1) {
			swalAlert('warning', 'Validasi', 'Edukasi pasien harus diisi!');
			return false;
		}

		swal.fire({
			title: 'Konfirmasi',
			html: "<em>Data yang sudah tersimpan tidak bisa diubah</em><br>Apakah data yang anda masukkan sudah benar ?",
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-save mr-1"></i>Ya, Simpan',
			cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
			reverseButtons: true,
			allowOutsideClick: false
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'POST',
					url: '<?= base_url("pelayanan/api/pelayanan/simpan_edukasi") ?>',
					data: $('#form_edukasi_rm').serialize(),
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						showLoader();
					},
					success: function(data) {
						if (data.status === false) {
							if (data.alert === 'info') {
								swalAlert('warning', 'Informasi', data.message);
							} else {
								messageCustom(data.message, 'Error');
							}
						} else {
							messageCustom(data.message, 'Success');
							$('#modal_edukasi_rm').modal('hide');
						}

					},
					complete: function() {
						hideLoader();
					},
					error: function(e) {
						messageCustom('Terjadi Kesalahan, Silahkan Coba Beberapa Saat Lagi', 'Error');
					}
				});
			}
		})
	}
</script>
