<script>
	var dWidth = $(window).width();
    var dHeight= $(window).height();
    var x = screen.width/2 - dWidth/2;
	var y = screen.height/2 - dHeight/2;
	
	$(function() {
		$('#alasan_pjwb_aps').summernote({
			height: 200,
			focus: true,
			toolbar: [
				// [groupName, [list of button]]
				['style', ['bold', 'italic', 'underline', 'clear']],
				['fontname', ['fontname']],
				['font', ['strikethrough', 'superscript', 'subscript']],
				['fontsize', ['fontsize']],
				['color', ['color']],
				['para', ['ul', 'ol', 'paragraph']],
				['height', ['height']]
			],
			callbacks: {
				onPaste: function(e) {
					var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

					e.preventDefault();

					// Firefox fix
					setTimeout(function() {
						document.execCommand('insertText', false, bufferText);
					}, 10);
				}
			}
		});

		$('.btn_cek_nik').click(function() {
			$('#nik_pjwb_aps').focus();
			if ($('#nik_pjwb_aps').val() === '') {
                swalAlert('warning', 'Validasi', 'Harap masukkan NIK terlebih dahulu!');
                return false;
			}
			
			let nik = '/nik/' + $('#nik_pjwb_aps').val();
            $.ajax({
                type: 'GET',
                url: '<?= base_url('registrations/api/registrations_auto/cek_nik') ?>' + nik,
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {
                    if (data.data.success === true) {
                        let field = data.data.decode[0];
                        $('#nama_pjwb_aps').val(field.NAMA_LGKP);

                        if (field.JENIS_KLMIN == 'Perempuan') {
                            $('#kelamin_pjwb_aps_p').prop('checked', true);
                        } else {
                            $('#kelamin_pjwb_aps_l').prop('checked', true);
                        }

                        let str = field.TGL_LHR;
                        let str_split = str.split('-');
                        let tanggal_lahir = str_split[2] + '/' + str_split[1] + '/' + str_split[0];
                        $('#tgl_lahir_pjwb_aps').datepicker('setDate', tanggal_lahir);

                        let kode_pos = '';
                        if (field.KODE_POS == null) {
                            kode_pos = '';
                        } else {
                            kode_pos = field.KODE_POS;
                        }

                        $('#alamat_pjwb_aps').val(field.ALAMAT + ' RT. 0' + field.NO_RT + '/0' + field.NO_RW + ' ' + field.NAMA_KEL + ' ' + field.NAMA_KEC + ' ' + field.NAMA_KAB + ' ' + field.NAMA_PROP + ' ' + kode_pos);
                        $('#telp_pjwb_aps').focus();
                        messageCustom(data.data.message, 'Success');
                    } else if (data.data.success === false) {
						swalAlert('warning', 'Informasi NIK', data.data.message);
                    }
                },
                complete: function() {
                    hideLoader();
                },
                error: function(e) {
                    messageCustom('Gagal menghubungi server dukcapil, Silahkan coba kembali', 'Error');
                }
            })
		});

		// tanggal lahir
        $('#tgl_lahir_pjwb_aps').datepicker({
            format: 'dd/mm/yyyy',
            endDate: "1d"
        }).on('changeDate', function() {
			var tgl = $(this).val();
            $('#umur_pjwb_aps').html('');
            if (tgl !== '') {
				var umur = getAge(date2mysql(tgl));
                $('#umur_pjwb_aps').html(umur);
            }

            $(this).datepicker('hide');
        });
	});

	function pembuatanSuratAPS(id_pendaftaran, id_layanan_pendaftaran, id_rawat_inap) {
		$('#id_layanan_pendaftaran_aps').val(id_layanan_pendaftaran);
		$('#btn_cetak_surat_aps').hide();
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pelayanan/api/pelayanan/get_data_surat") ?>/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				if (data !== null) {
					$('#id_surat_aps').val(data.id);
					$('#nik_pjwb_aps').val(data.nik);
					$('#nama_pjwb_aps').val(data.nama);
					$('#tgl_lahir_pjwb_aps').val((data.tanggal_lahir !== null ? datefmysql(data.tanggal_lahir) : ''));
					if (data.kelamin === 'P') {
						$('#kelamin_pjwb_aps_p').prop('checked', true);
					} else if (data.kelamin === 'L') {
						$('#kelamin_pjwb_aps_l').prop('checked', true);
					}
					$('#alamat_pjwb_aps').val(data.alamat);
					$('#telp_pjwb_aps').val(data.no_telp);
					$('#status_hubungan_pjwb_aps').val(data.status_hubungan);
					$('#alasan_pjwb_aps').summernote('code', data.alasan);
					$('#jenis_surat_aps').val(data.jenis_surat);
	
					$('#btn_cetak_surat_aps').attr('onclick', 'cetakSuratAPS('+data.id+', '+data.id_layanan_pendaftaran+', \''+data.jenis_surat+'\')').show();
					$('#nik_pjwb_aps, #nama_pjwb_aps, #tgl_lahir_pjwb_aps, #alamat_pjwb_aps, #telp_pjwb_aps, #status_hubungan_pjwb_aps, #jenis_surat_aps').attr('readonly', true);
				}
				$('#modal_surat_aps').modal('show');
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

	function konfirmasiSimpan() {
		var stop = false;
		if ($('#nama_pjwb_aps').val() === '') {
			syams_validation('#nama_pjwb_aps', 'Kolom nama penanggung wajib diisi!');
			stop = true;
		}
		if ($('#tgl_lahir_pjwb_aps').val() === '') {
			syams_validation('#tgl_lahir_pjwb_aps', 'Kolom tanggal lahir penanggung wajib diisi!');
			stop = true;
		}
		if ($('#alamat_pjwb_aps').val() === '') {
			syams_validation('#alamat_pjwb_aps', 'Kolom alamat penanggung wajib diisi!');
			stop = true;
		}
		if ($('#telp_pjwb_aps').val() === '') {
			syams_validation('#telp_pjwb_aps', 'Kolom no telp penanggung wajib diisi!');
			stop = true;
		}
		if ($('#status_hubungan_pjwb_aps').val() === '') {
			syams_validation('#status_hubungan_pjwb_aps', 'Pilih status hubungan dengan pasien!');
			stop = true;
		}
		if ($('#jenis_surat_aps').val() === '') {
			syams_validation('#jenis_surat_aps', 'Pilih jenis surat!');
			stop = true;
		}

		if (stop) {
			return false;
		}

		swal.fire({
			title: 'Konfirmasi',
			html: 'Apakah anda yakin ingin menyimpan data penanggung jawab ini dan mencetakknya',
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-print"></i> Cetak & Simpan',
			cancelButtonText: '<i class="fas fa-times-circle"></i> Batal',
			reverseButtons: true,
			allowOutsideClick: false
		}).then((result) => {
			if (result.value) {
				simpanSuratAPS();
			}
		});

	}

	function simpanSuratAPS() {
		var alasan = $('#alasan_pjwb_aps').summernote('code');
		if (alasan === '') {
			swalAlert('warning', 'Validasi', 'Silahkan isi alasan dengan jelas!');
			return false;
		}

		$.ajax({
			type: 'POST',
			url: '<?= base_url("pelayanan/api/pelayanan/simpan_surat") ?>',
			data: $('#form_aps').serialize() + '&alasan=' + alasan,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				if (data.status === false) {
					messageCustom(data.message, 'Error');
				} else {
					if (data.id) {
						messageCustom(data.message, 'Success');
						cetakSuratAPS(data.id, data.id_layanan_pendaftaran, data.type);
						$('#modal_surat_aps').modal('hide');
					}
				}
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				messageCustom('Terjadi kesalahan, Gagal menyimpan dan mencetak surat APS', 'Error');
			}
		})
	}

	function cetakSuratAPS(id, id_layanan_pendaftaran, type) {
		window.open('<?= base_url() ?>rawat_inap/printing_surat_aps?id=' + id + '&id_layanan_pendaftaran=' + id_layanan_pendaftaran + '&type=' + type, 'Cetak Surat Pulang APS', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}
</script>

<!-- Modal -->
<div class="modal fade" id="modal_surat_aps">
	<div class="modal-dialog" style="max-width:80%">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title bold" id="modal_pengkajian_awal">PEMBUATAN SURAT PULANG APS</h5>
					<h6 class="modal-title text-muted"><small>Pulang Atas Permintaan Sendiri</small></h6>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form_aps class=form-horizontal') ?>
					<input type="hidden" name="id" id="id_surat_aps">
					<input type="hidden" name="id_layanan_pendaftaran" id="id_layanan_pendaftaran_aps">
					<div class="row">
						<div class="col-lg-6">
							<h6 class="text-red mb-2"><em><small>*) Isikan data penanggung jawab atas pasien!</small></em></h6>
							<div class="form-group row tight">
								<label class="col-label-form col-lg-3">NIK : </label>
								<div class="col-lg-5">
									<input type="text" name="nik_pjwb_aps" id="nik_pjwb_aps" maxlength="16" class="form-control" placeholder="NIK Penanggung Jawab" onkeypress="return hanyaAngka(event)">
								</div>
							</div>
							<div class="form-group row tight">
								<label class="col-label-form col-lg-3"></label>
								<div class="col-lg-9">
									<button type="button" class="btn btn-info btn-xs btn_cek_nik"><i class="fas fa-fw fa-search mr-1"></i>Cari Data Penanggung Jawab Berdasarkan NIK</button>
								</div>
							</div>
							<div class="form-group row tight">
								<label class="col-label-form col-lg-3">Nama : </label>
								<div class="col-lg-9">
									<input type="text" name="nama_pjwb_aps" id="nama_pjwb_aps" class="form-control" placeholder="Nama Penanggung Jawab">
								</div>
							</div>
							<div class="form-group row tight">
								<label class="col-label-form col-lg-3">Tanggal Lahir : </label>
								<div class="col-lg-5">
									<input type="text" name="tgl_lahir_pjwb_aps" id="tgl_lahir_pjwb_aps" class="form-control" placeholder="dd/mm/yyyy" onchange="clearValidate(this)">
								</div>
							</div>
							<div class="form-group row tight">
								<label class="col-label-form col-lg-3">Umur : </label>
								<div class="col-lg-5">
									<span id="umur_pjwb_aps" class="bold"></span>
								</div>
							</div>
							<div class="form-group row tight">
								<label class="col-label-form col-lg-3">Kelamin : </label>
								<div class="col-lg-9">
									<input type="radio" name="kelamin_pjwb_aps" id="kelamin_pjwb_aps_l" value="L" class="mr-1">Laki-laki
									<input type="radio" name="kelamin_pjwb_aps" id="kelamin_pjwb_aps_p" value="P" class="mr-1 ml-3">Perempuan
								</div>
							</div>
							<div class="form-group row tight">
								<label class="col-label-form col-lg-3">Alamat : </label>
								<div class="col-lg-9">
									<textarea name="alamat_pjwb_aps" id="alamat_pjwb_aps" rows="3" class="form-control" placeholder="Alamat Lengkap Penanggung Jawab"></textarea>
								</div>
							</div>
							<div class="form-group row tight">
								<label class="col-label-form col-lg-3">No. HP : </label>
								<div class="col-lg-5">
									<input type="text" name="telp_pjwb_aps" id="telp_pjwb_aps" maxlength="13" class="form-control" placeholder="No. Telp / WA" onkeypress="return hanyaAngka(event)">
								</div>
							</div>
							<div class="form-group row tight">
								<label class="col-label-form col-lg-3"></label>
								<div class="col-lg-9">
									<span class="text-red"><small><em>*) Harap memasukkan nomor telpon yang dapat dihubungi!</em></small></span>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group row tight">
								<label class="col-label-form col-lg-3">Status Hubungan</label>
								<div class="col-lg-9">
									<?= form_dropdown('status_hubungan_pjwb_aps', $status_hubungan, array(), 'id=status_hubungan_pjwb_aps class=form-control onchange="clearValidate(this)"') ?>
								</div>
							</div>
							<div class="form-group row tight">
								<label class="col-label-form col-lg-3">Jenis Surat</label>
								<div class="col-lg-9">
									<?= form_dropdown('jenis_surat_aps', $jenis_surat, array(), 'id=jenis_surat_aps class=form-control onchange="clearValidate(this)"') ?>
								</div>
							</div>
							<div class="form-group tight">
								<label>Alasan Untuk Membawa Pulang Pasien</label>
								<div id="alasan_pjwb_aps"></div>
							</div>
						</div>
					</div>	
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-success" id="btn_cetak_surat_aps"><i class="fas fa-fw fa-print mr-1"></i>Cetak Surat</button>
				<button type="button" class="btn btn-info" onclick="konfirmasiSimpan()"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
			</div>
		</div>
	</div>
</div>