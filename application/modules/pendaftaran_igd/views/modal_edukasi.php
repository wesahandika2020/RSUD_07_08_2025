<script>
	var dWidth = $(window).width();
	var dHeight = $(window).height();
	var x = screen.width / 2 - dWidth / 2;
	var y = screen.height / 2 - dHeight / 2;

	var canvas1 = $('#signature-pasien')[0];
	var canvas2 = $('#signature-edukator')[0];

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
		var canvas = $('#signature-pasien')[0];
		var context = canvas.getContext('2d');
		var img = new Image();
		context.clearRect(0, 0, canvas.width, canvas.height);
		context.drawImage(img, 0, 0, canvas.width, canvas.height);
	}

	function clearSignatureTtdEdukator(){
		var canvas = $('#signature-edukator')[0];
		var context = canvas.getContext('2d');
		var img = new Image();
		context.clearRect(0, 0, canvas.width, canvas.height);
		context.drawImage(img, 0, 0, canvas.width, canvas.height);
	}

	$('#clear-signature-pasien, #clear-signature-edukator').click(function() {
		if($(this).attr('id') == 'clear-signature-pasien'){
			clearSignatureTtdPasien();
		}else{
			clearSignatureTtdEdukator();
		}
	});

	$(function() {
		$('input[name="bahasa"]').change(function() {
			if ($(this).val() == 'Lain-lain') {
				$('#edu_ket_bahasa_lain').prop('disabled', false);
			} else {
				$('#edu_ket_bahasa_lain').val('');
				$('#edu_ket_bahasa_lain').prop('disabled', true);
			}
		});

		$('input[name="hambatan_edukasi"]').change(function() {
			if ($(this).val() == 'Lain-lain') {
				$('#edu_ket_hambatan_edukasi_lain').prop('disabled', false);
			} else {
				$('#edu_ket_hambatan_edukasi_lain').val('');
				$('#edu_ket_hambatan_edukasi_lain').prop('disabled', true);
			}
		});

		$('input[name="evaluasi"]').change(function() {
			if ($(this).val() == 'Re-Edukasi') {
				$('#edu_tanggal_re_edukasi').prop('disabled', false);
			} else {
				$('#edu_tanggal_re_edukasi').val('');
				$('#edu_tanggal_re_edukasi').prop('disabled', true);
			}
		});

		// hide class ket_topik_edukasi
		$('.ket_topik_edukasi').hide();
		$('.text_input_ket_topik_edukasi').hide();
		$('#edu_topik_edukasi').select2c({
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
					$('#edu_label_ket_topik_edukasi').html(data.keterangan);
					if (data.text_input == 1) {
						$('.text_input_ket_topik_edukasi').show();
					} else {
						$('.text_input_ket_topik_edukasi').hide();
					}
				}

				return data.nama;
			}
		});

		$('#edu_tanggal_edukasi, #edu_tanggal_re_edukasi').datepicker({
			format: 'dd/mm/yyyy',
			endDate: new Date()
		}).on('changeDate', function() {
			$(this).datepicker('hide');
		});

		$('#edu_edukator').select2c({
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

	function resetFormEdukasi() {
		$('#form_edukasi')[0].reset();
		$('#edu_id').val('');
		$('#edu_tanggal_edukasi').val('<?= date('d/m/Y') ?>');
		$('#s2id_edu_topik_edukasi a .select2c-chosen').html('Pilih Topik Edukasi');
		$('#s2id_edu_edukator a .select2c-chosen').html('Pilih Edukator');
		$('#text_input_ket_topik_edukasi').html('');

		$('.disabled').attr('disabled', false);
		$('#table_edukasi tbody').empty();
	}

	function entriEdukasiIgd(id_pendaftaran, id_layanan_pendaftaran) {
		resetFormEdukasi();
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pendaftaran_igd/api/pendaftaran_igd/get_edukasi_pasien") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran + '/tipe/edukasi',
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				$('#edu_id_layanan_pendaftaran').val(id_layanan_pendaftaran);
				if (data.pasien !== null) {
					$('#edu_pasien_nama').text(data.pasien.nama);
					$('#edu_pasien_no_rm').text(data.pasien.no_rm);
					$('#edu_pasien_tanggal_lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
					$('#edu_pasien_jenis_kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
					$('#edu_pendidikan_pasien').text(data.pasien.pendidikan)
				}

				if (data.edukasi !== null) {
					$('#edu_id').val(data.edukasi.id);
					if (data.edukasi.id !== null) {
						$('.disabled').attr('disabled', true);
					}

					if (data.edukasi.sedia_menerima_info == '0') {
						$('#edu_sedia_menerima_informasi_tidak').prop('checked', true)
					} else if (data.edukasi.sedia_menerima_info == '1') {
						$('#edu_sedia_menerima_informasi_ya').prop('checked', true)
					}

					if (data.edukasi.bahasa == 'Indonesia') {
						$('#edu_bahasa_ind').prop('checked', true);
						$('#edu_ket_bahasa_lain').val('');
					} else if (data.edukasi.bahasa == 'Inggris') {
						$('#edu_bahasa_ing').prop('checked', true);
						$('#edu_ket_bahasa_lain').val('');
					} else if (data.edukasi.bahasa == 'Lain-lain') {
						$('#edu_bahasa_lain').prop('checked', true);
						$('#edu_ket_bahasa_lain').val(data.edukasi.ket_bahasa_lain);
					}

					$('#edu_daerah').val(data.edukasi.ket_bahasa_daerah);

					if (data.edukasi.butuh_penterjemah == '0') {
						$('#edu_kebutuhan_penterjemah_tidak').prop('checked', true)
					} else if (data.edukasi.butuh_penterjemah == '1') {
						$('#edu_kebutuhan_penterjemah_ya').prop('checked', true)
					}

					if (data.edukasi.baca_tulis == 'Baik') {
						$('#edu_baca_tulis_baik').prop('checked', true)
					} else if (data.edukasi.baca_tulis == 'Kurang') {
						$('#edu_baca_tulis_kurang').prop('checked', true)
					}

					if (data.edukasi.tipe_pembelajaran == 'Tulisan') {
						$('#edu_tipe_belajar_tulisan').prop('checked', true)
					} else if (data.edukasi.tipe_pembelajaran == 'Verbal') {
						$('#edu_tipe_belajar_verbal').prop('checked', true)
					}

					if (data.edukasi.hambatan_edukasi == 'Tidak Ada') {
						$('#edu_hambatan_edukasi_tidak_ada').prop('checked', true);
					} else if (data.edukasi.hambatan_edukasi == 'Penglihatan Terganggu') {
						$('#edu_hambatan_edukasi_penglihatan_terganggu').prop('checked', true);
					} else if (data.edukasi.hambatan_edukasi == 'Bahasa') {
						$('#edu_hambatan_edukasi_bahasa').prop('checked', true);
					} else if (data.edukasi.hambatan_edukasi == 'Lain-lain') {
						$('#edu_hambatan_edukasi_lain').prop('checked', true);
						$('#edu_ket_hambatan_edukasi_lain').val(data.edukasi.ket_hambatan_edukasi)
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

					$('#btn_print_edu').hide();
					if (data.edukasi.detail.length > 0) {
						$('#btn_print_edu').show().attr('onclick', 'printEdukasi(' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ')');
						showDataDetailEdukasi(data.edukasi.detail);
					}

				}
				$('#modal_edukasi').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

	function showDataDetailEdukasi(data) {
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

				$('#table_edukasi tbody').append(html);
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

	function simpanEdukasi() {
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
					data: $('#form_edukasi').serialize(),
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
							$('#modal_edukasi').modal('hide');
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

	function addEdukasi() {
		var numb_edu = $('.numb_edu').length;
		var id_topik_edukasi = $('#edu_topik_edukasi').val();
		var label_topik_edukasi = $('#s2id_edu_topik_edukasi a .select2c-chosen').html();
		var ket_topik_edukasi = $('#edu_ket_topik_edukasi').val();
		var tanggal_edukasi = $('#edu_tanggal_edukasi').val();
		var nama_sasaran = $('#edu_nama_keluarga').val();
		var status_hubungan = $('#edu_status_hubungan').val();
		var id_edukator = $('#edu_edukator').val();
		var label_edukator = $('#s2id_edu_edukator a .select2c-chosen').html();
		var tingkat_pemahaman_awal = (typeof $('input[name="tingkat_pemahaman_awal"]:checked').val() !== 'undefined' ? $('input[name="tingkat_pemahaman_awal"]:checked').val() : '');
		var metoda_edukasi = (typeof $('input[name="metoda_edukasi"]:checked').val() !== 'undefined' ? $('input[name="metoda_edukasi"]:checked').val() : '');
		var media_edukasi = (typeof $('input[name="media_edukasi"]:checked').val() !== 'undefined' ? $('input[name="media_edukasi"]:checked').val() : '');
		var evaluasi = (typeof $('input[name="evaluasi"]:checked').val() !== 'undefined' ? $('input[name="evaluasi"]:checked').val() : '');
		var tanggal_re_edukasi = $('#edu_tanggal_re_edukasi').val();
		const signaturePasien = $('#signature-pasien')[0].toDataURL('image/png');
		const signatureEdukator = $('#signature-edukator')[0].toDataURL('image/png');

		if (id_topik_edukasi == '') {
			syams_validation('#edu_topik_edukasi', 'Topik edukasi pilih terlebih dahulu!');
			return false;
		}

		if (tanggal_edukasi == '') {
			syams_validation('#edu_tanggal_edukasi', 'Tanggal edukasi harus diisi!');
			return false;
		}

		if (nama_sasaran == '') {
			syams_validation('#edu_nama_keluarga', 'Nama sasaran edukasi harus diisi!');
			return false;
		}

		if (status_hubungan == '') {
			syams_validation('#edu_status_hubungan', 'Status hubungan harus diisi!');
			return false;
		}

		if (id_edukator == '') {
			syams_validation('#edu_edukator', 'Edukator harus dipilih!');
			return false;
		}

		if (evaluasi == 'Re-Edukasi') {
			if (tanggal_re_edukasi == '') {
				syams_validation('#edu_tanggal_re_edukasi', 'Tanggal re-edukasi harus diisi!');
				return false;
			}
		} else {
			syams_validation_remove('#edu_tanggal_re_edukasi');
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

		$('#table_edukasi tbody').append(html);
		$('#edu_topik_edukasi, #edu_ket_topik_edukasi, #edu_tanggal_edukasi, #edu_nama_keluarga, #edu_status_hubungan, #edu_edukator, #edu_tanggal_re_edukasi').val('');
		$('input[name="tingkat_pemahaman_awal"]').prop('checked', false);
		$('input[name="metoda_edukasi"]').prop('checked', false);
		$('input[name="media_edukasi"]').prop('checked', false);
		$('input[name="evaluasi"]').prop('checked', false);
		$('#s2id_edu_topik_edukasi a .select2c-chosen').html('Pilih Topik Edukasi');
		$('#s2id_edu_edukator a .select2c-chosen').html('Pilih Edukator');
		$('.ket_topik_edukasi').hide();
		clearSignatureTtdPasien()
		clearSignatureTtdEdukator()
	}

	function removeEdukasi(el) {
		var parent = el.parentNode.parentNode;
		parent.parentNode.removeChild(parent);
	}

	function printEdukasi(id_pendaftaran, id_layanan_pendaftaran) {
		window.open('<?= base_url() ?>pendaftaran_igd/printing_edukasi/' + id_pendaftaran + '/' + id_layanan_pendaftaran, 'Cetak Form Edukasi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}
</script>


<!-- Modal -->
<div class="modal fade" id="modal_edukasi">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width:95%">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title bold" id="modal_pengkajian_awal">FORM EPKT</h5>
					<h6 class="modal-title text-muted"><small>(Edukasi Pasien dan Keluarga Terintegrasi)</small></h6>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form_edukasi class=form-horizontal') ?>
				<input type="hidden" name="id_layanan_pendaftaran" id="edu_id_layanan_pendaftaran">
				<input type="hidden" name="id" id="edu_id">
				<!-- header -->
				<div class="row">
					<div class="col-lg-6">
						<div class="table-responsive">
							<table class="table table-sm table-striped">
								<tr>
									<td width="20%" class="bold">Nama Pasien</td>
									<td wdith="80%">: <span id="edu_pasien_nama"></span></td>
								</tr>
								<tr>
									<td class="bold">Tanggal Lahir</td>
									<td>: <span id="edu_pasien_tanggal_lahir"></span></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="table-responsive">
							<table class="table table-sm table-striped">
								<tr>
									<td width="30%" class="bold">No. RM</td>
									<td wdith="70%">: <span id="edu_pasien_no_rm"></span></td>
								</tr>
								<tr>
									<td class="bold">Jenis Kelamin</td>
									<td>: <span id="edu_pasien_jenis_kelamin"></span></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="col-lg-12">
						<h5 class="center"><b>FORMULIR EDUKASI PASIEN DAN KELUARGA TERINTEGRASI</b></h5>
						<table class="table table-sm table-striped table-no-border">
							<tr>
								<td colspan="3" class="bold td-dark">PERSIAPAN EDUKASI/BELAJAR</td>
							</tr>
							<tr>
								<td width="20%" class="bold"><span class="ml-4">Kesediaan Menerima Informasi</span></td>
								<td width="1%" class="bold">:</td>
								<td width="79%">
									<input type="radio" name="sedia_menerima_informasi" id="edu_sedia_menerima_informasi_ya" value="1" class="disabled mr-1" checked><label for="edu_sedia_menerima_informasi_ya">Ya</label>
									<input type="radio" name="sedia_menerima_informasi" id="edu_sedia_menerima_informasi_tidak" value="0" class="disabled mr-1 ml-3"><label for="edu_sedia_menerima_informasi_tidak">Tidak</label>
								</td>
							</tr>
							<tr>
								<td class="bold"><span class="ml-4">Bahasa</span></td>
								<td class="bold">:</td>
								<td>
									<input type="radio" name="bahasa" id="edu_bahasa_ind" value="Indonesia" class="disabled mr-1" checked><label for="edu_bahasa_ind">Indonesia</label>
									<input type="radio" name="bahasa" id="edu_bahasa_ing" value="Inggris" class="disabled mr-1 ml-3"><label for="edu_bahasa_ing">Inggris</label>
									<input type="radio" name="bahasa" id="edu_bahasa_lain" value="Lain-lain" class="disabled mr-1 ml-3"><label for="edu_bahasa_lain">Lain-lain</label>

									<input type="text" name="bahasa_lain" id="edu_ket_bahasa_lain" class="custom-form disabled-input col-lg-4 d-inline-block ml-3" placeholder="Masukkan Bahasa Lain" disabled>
									<input type="text" name="daerah" id="edu_daerah" class="custom-form disabled-input col-lg-4 d-inline-block" placeholder="Masukkan Daerah">
								</td>
							</tr>
							<tr>
								<td class="bold"><span class="ml-4">Kebutuhan Penterjemah</span></td>
								<td class="bold">:</td>
								<td>
									<input type="radio" name="kebutuhan_penterjemah" id="edu_kebutuhan_penterjemah_ya" value="1" class="disabled mr-1"><label for="edu_kebutuhan_penterjemah_ya">Ya</label>
									<input type="radio" name="kebutuhan_penterjemah" id="edu_kebutuhan_penterjemah_tidak" value="0" class="disabled mr-1 ml-3" checked><label for="edu_kebutuhan_penterjemah_tidak">Tidak</label>
								</td>
							</tr>
							<tr>
								<td class="bold"><span class="ml-4">Pendidikan Pasien</span></td>
								<td class="bold">:</td>
								<td>
									<span id="edu_pendidikan_pasien"></span>
								</td>
							</tr>
							<tr>
								<td class="bold"><span class="ml-4">Baca dan Tulis</span></td>
								<td class="bold">:</td>
								<td>
									<input type="radio" name="baca_tulis" id="edu_baca_tulis_baik" value="Baik" class="disabled mr-1" checked><label for="edu_baca_tulis_baik">Baik</label>
									<input type="radio" name="baca_tulis" id="edu_baca_tulis_kurang" value="Kurang" class="disabled mr-1 ml-3"><label for="edu_baca_tulis_kurang">Kurang</label>
								</td>
							</tr>
							<tr>
								<td class="bold"><span class="ml-4">Pilihan Tipe Pembelajaran</span></td>
								<td class="bold">:</td>
								<td>
									<input type="radio" name="tipe_belajar" id="edu_tipe_belajar_verbal" value="Verbal" class="disabled mr-1" checked><label for="edu_tipe_belajar_verbal">Verbal</label>
									<input type="radio" name="tipe_belajar" id="edu_tipe_belajar_tulisan" value="Tulisan" class="disabled mr-1 ml-3"><label for="edu_tipe_belajar_tulisan">Tulisan</label>
								</td>
							</tr>
							<tr>
								<td class="bold"><span class="ml-4">Hambatan Edukasi</span></td>
								<td class="bold">:</td>
								<td>
									<input type="radio" name="hambatan_edukasi" id="edu_hambatan_edukasi_tidak_ada" value="Tidak Ada" class="disabled mr-1" checked><label for="edu_hambatan_edukasi_tidak_ada">Tidak Ada</label>
									<input type="radio" name="hambatan_edukasi" id="edu_hambatan_edukasi_penglihatan_terganggu" value="Penglihatan Terganggu" class="disabled mr-1 ml-3"><label for="edu_hambatan_edukasi_penglihatan_terganggu">Penglihatan Terganggu</label>
									<input type="radio" name="hambatan_edukasi" id="edu_hambatan_edukasi_bahasa" value="Bahasa" class="disabled mr-1 ml-3"><label for="edu_hambatan_edukasi_bahasa">Bahasa</label>
									<input type="radio" name="hambatan_edukasi" id="edu_hambatan_edukasi_lain" value="Lain-lain" class="disabled mr-1 ml-3"><label for="edu_hambatan_edukasi_lain">Lain-lain</label>
									<input type="text" name="hambatan_edukasi_lain" id="edu_ket_hambatan_edukasi_lain" class="custom-form disabled-input col-lg-4 d-inline-block ml-3" placeholder="Masukkan Hambatan Edukasi Lain" disabled>
								</td>
							</tr>
							<tr>
								<td colspan="3" class="bold td-dark">PERENCANAAN EDUKASI</td>
							</tr>
							<tr>
								<td colspan="3">
									<input type="checkbox" name="perencanaan_edukasi[]" value="Administrasi" class="perencanaan_edukasi mr-1">Administrasi
									<input type="checkbox" name="perencanaan_edukasi[]" value="Penyakit" class="perencanaan_edukasi mr-1 ml-3">Penyakit
									<input type="checkbox" name="perencanaan_edukasi[]" value="Penggunaan Obat" class="perencanaan_edukasi mr-1 ml-3">Penggunaan Obat
									<input type="checkbox" name="perencanaan_edukasi[]" value="Peralatan Medis" class="perencanaan_edukasi mr-1 ml-3">Peralatan Medis
									<input type="checkbox" name="perencanaan_edukasi[]" value="Diet/Gizi" class="perencanaan_edukasi mr-1 ml-3">Diet/Gizi
									<input type="checkbox" name="perencanaan_edukasi[]" value="Rehabilitasi Medik" class="perencanaan_edukasi mr-1 ml-3">Rehabilitasi Medik
									<input type="checkbox" name="perencanaan_edukasi[]" value="Pelayanan Spiritual" class="perencanaan_edukasi mr-1 ml-3">Pelayanan Spiritual
								</td>
							</tr>
							<tr>
								<td colspan="3"></td>
							</tr>
						</table>
						<table class="table table-striped table-sm">
							<tr>
								<td colspan="7" class="td-dark">ENTRI EDUKASI</td>
							</tr>
							<tr>
								<td class="bold">Topik Edukasi</td>
								<td class="bold">:</td>
								<td colspan="5"><input type="text" name="topik_edukasi" id="edu_topik_edukasi" class="select2c-input"></td>
							</tr>
							<tr class="ket_topik_edukasi">
								<td class="bold"></td>
								<td class="bold"></td>
								<td colspan="5">
									<span class="bold" style="font-style:oblique" id="edu_label_ket_topik_edukasi"></span>
									<span class="text_input_ket_topik_edukasi"><input type="text" name="ket_topik_edukasi" id="edu_ket_topik_edukasi" class="custom-form col-lg-6 ml-2 d-inline-block"></span>
								</td>
							</tr>
							<tr>
								<td width="20%" class="bold">Tanggal Edukasi</td>
								<td width="1%" class="bold">:</td>
								<td width="24%"><input type="text" name="tanggal_edukasi" id="edu_tanggal_edukasi" class="custom-form col-lg-4 valid-input" value="<?= date('d/m/Y') ?>"></td>
								<td width="3%"></td>
								<td width="15%" class="bold">Tingkat Pemahaman Awal</td>
								<td width="1%" class="bold">:</td>
								<td width="36%">
									<input type="radio" name="tingkat_pemahaman_awal" id="edu_tingkat_pemahaman_awal_1" value="Hal Baru" class="mr-1"><label for="edu_tingkat_pemahaman_awal_1">Hal Baru</label>
									<input type="radio" name="tingkat_pemahaman_awal" id="edu_tingkat_pemahaman_awal_2" value="Edukasi Ulang" class="mr-1 ml-3"><label for="edu_tingkat_pemahaman_awal_2">Edukasi Ulang</label>
								</td>
							</tr>
							<tr>
								<td class="bold">Nama Sasaran Edukasi</td>
								<td class="bold">:</td>
								<td>
									<input type="text" name="nama_keluarga" id="edu_nama_keluarga" class="custom-form col-lg valid-input" placeholder="Masukkan Nama Sasaran Edukasi">
								</td>
								<td></td>
								<td class="bold">Metoda Edukasi</td>
								<td class="bold">:</td>
								<td>
									<input type="radio" name="metoda_edukasi" id="edu_metoda_edukasi_1" value="Lisan" class="mr-1"><label for="edu_metoda_edukasi_1">Lisan</label>
									<input type="radio" name="metoda_edukasi" id="edu_metoda_edukasi_2" value="Demonstrasi" class="mr-1 ml-3"><label for="edu_metoda_edukasi_2">Demonstrasi</label>
								</td>
							</tr>
							<tr>
								<td class="bold">Status Hubungan dg Pasien</td>
								<td class="bold">:</td>
								<td><input type="text" name="status_hubungan" id="edu_status_hubungan" class="custom-form col-lg valid-input" placeholder="Masukkan Status Hubungan dengan Pasien"></td>
								<td></td>
								<td class="bold">Media Edukasi</td>
								<td class="bold">:</td>
								<td>
									<input type="radio" name="media_edukasi" id="edu_media_edukasi_1" value="Leaflet" class="mr-1"><label for="edu_media_edukasi_1">Leaflet</label>
									<input type="radio" name="media_edukasi" id="edu_media_edukasi_2" value="Boklet" class="mr-1 ml-2"><label for="edu_media_edukasi_2">Boklet</label>
									<input type="radio" name="media_edukasi" id="edu_media_edukasi_3" value="Lembar Balik" class="mr-1 ml-2"><label for="edu_media_edukasi_3">Lembar Balik</label>
									<input type="radio" name="media_edukasi" id="edu_media_edukasi_4" value="Audio Visual" class="mr-1 ml-2"><label for="edu_media_edukasi_4">Audio Visual</label>
									<input type="radio" name="media_edukasi" id="edu_media_edukasi_5" value="Non Media" class="mr-1 ml-2"><label for="edu_media_edukasi_5">Non Media</label>
								</td>
							</tr>
							<tr>
								<td class="bold">Edukator</td>
								<td class="bold">:</td>
								<td><input type="text" name="edukator" id="edu_edukator" class="select2c-input"></td>
								<td></td>
								<td class="bold">Evaluasi</td>
								<td class="bold">:</td>
								<td>
									<input type="radio" name="evaluasi" id="edu_evaluasi_1" value="Sudah Mengerti" class="mr-1"><label for="edu_evaluasi_1">Sudah Mengerti</label>
									<input type="radio" name="evaluasi" id="edu_evaluasi_2" value="Re-Demonstrasi" class="mr-1 ml-2"><label for="edu_evaluasi_2">Re-Demonstrasi</label>
									<input type="radio" name="evaluasi" id="edu_evaluasi_3" value="Re-Edukasi" class="mr-1 ml-2"><label for="edu_evaluasi_3">Re-Edukasi</label>
								</td>
							</tr>
							<tr>
								<td colspan="3"></td>
								<td></td>
								<td class="bold">Tanggal Re-Edukasi</td>
								<td class="bold">:</td>
								<td>
									<input type="text" name="tanggal_re_edukasi" id="edu_tanggal_re_edukasi" class="custom-form col-lg-4 valid-input">
								</td>
							</tr>
							<tr>
								<td class="bold">Tanda Tangan Keluarga/Pasien</td>
								<td class="bold">:</td>
								<td>
									<div>
										<canvas id="signature-pasien" name="signature_pasien" width="300" height="200" disabled style="background-color: white; border: 1px solid black;"></canvas>
									</div>
									<button id="clear-signature-pasien" class="btn btn-info" type="button">Hapus Tanda Tangan</button>
								</td>
								<td></td>
								<td class="bold">Tanda Tangan Edukator</td>
								<td class="bold">:</td>
								<td>
									<div>
										<canvas id="signature-edukator" name="signature_edukator" width="300" height="200" disabled style="background-color: white; border: 1px solid black;"></canvas>
									</div>
									<button id="clear-signature-edukator" class="btn btn-info" type="button">Hapus Tanda Tangan</button>
								</td>
							</tr>
							<tr>
								<td colspan="3">
									<button type="button" class="btn btn-info btn-xs" onclick="addEdukasi()"><i class="fas fa-fw fa-arrow-circle-down mr-1"></i>Tambahkan Edukasi</button>
									<button type="button" class="btn btn-success btn-xs" id="btn_print_edu"><i class="fas fa-fw fa-print mr-1"></i>Print Form Edukasi</button>
								</td>
								<td></td>
							</tr>

						</table>

						<div class="table-responsive">
							<table class="table table-bordered table-striped table-sm color-table info-table" id="table_edukasi">
								<thead>
									<tr>
										<th class="bold center v-center" rowspan="2" width="3%"></th>
										<th class="bold center v-center" rowspan="2" width="25%">Kebutuhan Edukasi<br>Topik Edukasi</th>
										<th class="bold center v-center" rowspan="2" width="10%">Tanggal Edukasi</th>
										<th class="bold center v-center" colspan="2">Sasaran Edukasi</th>
										<th class="bold center v-center" colspan="2">Edukator</th>
										<th class="bold center v-center" rowspan="2" width="10%">Tingkat Pemahaman Awal</th>
										<th class="bold center v-center" rowspan="2" width="10%">Metoda Edukasi</th>
										<th class="bold center v-center" rowspan="2" width="10%">Media Edukasi</th>
										<th class="bold center v-center" rowspan="2" width="10%">Evaluasi</th>
										<th class="bold center v-center" rowspan="2" width="10%">Tanggal Re-Edukasi</th>
										<th class="bold center v-center" rowspan="2" width="5%"></th>
									</tr>
									<tr>
										<th class="bold center v-center" width="10%">Nama & Hubungan dengan Pasien</th>
										<th class="bold center v-center" width="10%">TTD</th>
										<th class="bold center v-center" width="10%">Nama</th>
										<th class="bold center v-center" width="10%">TTD</th>
									</tr>
								</thead>
								<tbody></tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- end header -->
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info" onclick="simpanEdukasi()"><span id="btn_edukasi"><i class="fas fa-fw fa-save mr-1"></i>Simpan</span></button>
			</div>
		</div>
	</div>
</div>