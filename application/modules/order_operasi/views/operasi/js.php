<script>
	$(function() {
		$('#wizard2').bwizard()
		getListDataOperasi(1)

		$('#btn-search2').click(function() {
			$('#modal-search2').modal('show')
		})

		$('#btn-reload2').click(function() {
			resetDataOperasi()
			getListDataOperasi(1)
		})

		$('#btn-upload-file').click(function() {
			uploadFileRM($('#id-pendaftaran').val(), $('#id-layanan').val(), $('#id-pasien').val());
		})

		$('#tanggal-awal2, #tanggal-akhir2').datepicker({
			format: 'dd/mm/yyyy'
		}).on('changeDate', function() {
			$(this).datepicker('hide')
		})

		$('#pasien-search2').select2({
			ajax: {
				url: "<?= base_url('registrations/api/registrations_auto/pasien_auto') ?>",
				dataType: 'json',
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
				var markup = '<b>' + data.id + '</b>' + ' ' + data.nama + '<br/>' + data.alamat;
				return markup;
			},
			formatSelection: function(data) {
				$('#alamat').val(data.alamat)
				return data.id + ' ' + data.nama;
			}
		})

		$('#tindakan-search2').select2({
			width: '100%',
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/layanan_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						jenis: 'Pelayanan Pembedahan',
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
				return data.nama;
			}
		})

		$('#ruang-operasi-search2').select2({
			width: '100%',
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/kamar_operasi_auto') ?>",
				dataType: 'json',
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
				return data.nama;
			}
		})

		$('#tarif-operasi2').select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/tarif_pelayanan_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						jenis_pemeriksaan: 'Pelayanan Pembedahan',
						page: page, // page number
						kelas: ''
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
				var total = data.total;
				var kelas = (data.kelas !== null) ? (', kelas ') + data.kelas : '';
				var markup = '<b>' + data.layanan + '</b> <br/>' + data.jenis + ', ' + data.bobot + ' - ' + kelas + '<br/>' + numberToCurrency(total);
				return markup;
			},
			formatSelection: function(data) {
				$('#tarif-tindakan').val(data.total);
				return data.layanan;
			}
		})

		$('#operator-auto2').select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
						jenis: 'medis'
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

		$('#tindakan-auto2').select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/tarif_pelayanan_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						jenis_pemeriksaan: 'Pelayanan Pembedahan',
						page: page, // page number
						kelas: ''
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
				var total = data.total;
				var kelas = (data.kelas !== null) ? (', kelas ') + data.kelas : '';
				var markup = '<b>' + data.layanan + '</b> <br/>' + data.jenis + ', ' + data.bobot + ' - ' + kelas + '<br/>' + numberToCurrency(total);
				return markup;
			},
			formatSelection: function(data) {
				$('#tarif-tindakan').val(data.total);
				return data.layanan;
			}
		})

		$('#barang-bhp2').select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/barang_with_stok_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page // page number
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
				var markup = data.nama + ' <br><b>Sisa: ' + (data.sisa !== null ? data.sisa : '0') + '</b>'
				return markup;
			},
			formatSelection: function(data) {
				$.getJSON('<?= base_url("barang/api/barang/get_kemasan_barang") ?>?id=' + data.id, function(data2) {
					$('#kemasan-bhp2').html('');
					if (data2 === null) {
						alert('Kemasan barang tidak tersedia !');
					} else {
						$.each(data2, function(index, value) {
							$('#kemasan-bhp2').append("<option value='" + value.id_kemasan + "'>" + value.nama + "</option>");
						});
					}
				});
				$('#kemasan-bhp2').focus();
				$('#jumlah-bhp2').val('1');
				// return data.nama+' Sisa: ' + (data.sisa_stok !== null ? data.sisa_stok : '');
				return data.nama;
			}
		})

		$('.form-control, .custom-form .select2-input, .select2c-input').change(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this)
			}
		})

		$('.form-control, .custom-form').keyup(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this)
			}
		})

		$('#dokterhide').select2c({
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
					var more = (page * 20) < data.total; // whether or not there are more results available

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

	function resetDataOperasi() {
		$('input[type=text], input[type=hidden], select, textarea').val('')
		$('a .select2c-chosen').html('')
		$('#tanggal-awal2, #tanggal-akhir2').val('<?= date('d/m/Y') ?>')
	}

	function editResep(id, edit = 1) {
		$('#salin-resep').hide();
		$('.obkrs').show();
		$('#res-resep-ranap').html('');
		$('[data-toggle="popover"]').popover('hide');
		klik = null;
		date_time('tanggal-resep-realtime', 'html');
		let title_mode = '';
		let cek_stok = 0;
		if (edit > 0) {
			$('input[name=tanggal_resep]').attr('id', 'tanggal-resep-edit');
		} else {
			$('#no_r').val('');
			$('input[name=tanggal_resep]').attr('id', 'tanggal-resep');
			title_mode = '(Salin)';
			cek_stok = 1;
		}
		$('input[name=tanggal_resep]').attr('id', 'tanggal-resep-edit');

		$.ajax({
			type: 'GET',
			url: '<?= base_url('pelayanan/api/pelayanan/get_data_resep') ?>',
			data: {
				id: id,
				cek_stok: cek_stok
			},
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				var hasil = data;
				var data = data.data[0];
				$('#modal-form-resep-label').html(`
                    <b>Form Resep OK Central ${title_mode}</b> | No. RM : ${data.id_pasien}, Nama: ${data.pasien}, 
                    <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data.telp}</b></i></span>
                `);
				$('#modal-form-resep').modal('show');

				$('#list-resep').html('');
				if (edit > 0) {
					$('#no-resep, #id').val(id);
					$('#id-pk').val(data.id_layanan_pendaftaran);
				} else {
					$('#no-resep, #id').val('');
					$('#salin-resep').show();
				}

				// $('#dokterhide').val(data.id_dokter);
				// $('#s2id_dokterhide a .select2c-chosen').html(data.dokter);
				$('#pasien-auto').html(data.id_pasien + ' / ' + data.pasien);
				$('#pasienhide').val(data.id_pasien);
				$('#usia-pasien').html(hitungUmur(data.tanggal_lahir));
				$('#jenis-pk').html(data.jenis_layanan);
				$('#penjamin-pasien').html(data.penjamin);
				$('#jasa').val(money_format(data.toeslag));
				$('#tanggal-resep-label').html(datetimefmysql(data.tanggal_resep));

				$.each(data.resep_r, function(i, v) {
					let list = /* html */ `
                        <div id="wrap${v.no_r}" class="wrap">
                            <table class="table-no-border">
                                <tr><td><input type=hidden name="no_r${v.no_r}" id="no-r${v.no_r}" value="${v.no_r}" class="no-r"></td></tr>
                                <tr><td></td></tr>
                                <tr><td><input type=hidden name="jt${v.no_r}" id="jt${v.no_r}" value="${v.tebus_r_jumlah}" class="jt"></td></tr>
                                <tr><td><input type=hidden name="ap${v.no_r}" id="ap${v.no_r}" value="${v.aturan_pakai}" class="ap"></td></tr>
                                <tr><td><input type=hidden name="ap2${v.no_r}" id="ap2${v.no_r}" value="${v.ket_aturan_pakai}" class="ap2"></td></tr>
                                <tr><td><input type=hidden name="it${v.no_r}" id="it${v.no_r}" value="${v.iter}" class="it"></td></tr>
                                <tr><td><input type=hidden name="ja${v.no_r}" id="ja${v.no_r}" value="${v.id_tarif_tuslah}" class="ja"></td></tr>
                                <tr><td><input type=hidden name="cara_buat${v.no_r}" id="cara-buat${v.no_r}" value="${v.cara_pembuatan}" class="cara-buat"></td></tr>
                                <tr>
                                    <td>
                                        <input type=hidden name="timing${v.no_r}" id="timing${v.no_r}" value="${v.timing}" class="timing">
                                        <input type=hidden name="jmlnor" id="jmlnor${v.no_r}" class="jmlnor" value="${v.no_r}">
                                        <input type=hidden name="waktu_pemberian${v.no_r}" id="waktu-pemberian${v.no_r}" class="waktu-pemberian" value="${v.admin_time}">
                                    </td>
                                </tr>
                            </table>
                            <table id="table-list-resep${v.no_r}" width="100%" class="input-resep table-no-border">
                                <thead>
                                    <tr>
                                        <td colspan="4">
                                            <strong id="nomor-r${v.no_r}">&nbsp;&nbsp;R/&nbsp;${v.no_r}&nbsp;</strong>
                                            &nbsp;&nbsp;|&nbsp;<span id="cara-buat-r${v.no_r}" colspan=4 style="padding-left:20px;">${v.cara_pembuatan} &nbsp;&nbsp;|&nbsp; Permintaan <input id="jp${v.no_r}" class="jp custom-form" type="text" name="jp${v.no_r}" value="${parseInt(v.resep_r_jumlah)}" style="width:50px; display:unset;" onkeypress="return hanyaAngka(event)" > &nbsp; &nbsp; | &nbsp; &nbsp; ${v.aturan_pakai} &nbsp; &nbsp; | &nbsp; &nbsp; ${v.admin_time}</span> 
                                            <button type="button" title="Klik untuk hapus R /" class="btn btn-secondary btn-xs" onclick="removeR($(this));"><i class="fas fa-trash-alt"></i> Delete R /</button>
                                        </td>
                                        <tr>
                                            <td colspan="4">
                                                <div style="display: inline-flex;margin-left: 12px;margin-top: 6px;"><b>Keterangan : </b><input type="text" name="keterangan_resep${v.no_r}" id="keterangan_resep${v.no_r}" style="width:300px;margin-left:5px" class="custom-form" value="${v.keterangan_resep ? v.keterangan_resep : ''}"></div>
                                            </td>
                                        </tr>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    `;

					$('#list-resep').append(list);

					let subtotal = 0;
					let obatkronistxt = '';

					$.each(v.resep_r_detail, function(j, val) {
						obatkronis = '';
						if (val.kronis === '1') {
							obatkronistxt = '<i class="blinker">Obat Kronis</i>';
						}

						var ada = true;
						if (edit == 0) {
							if (val['stok_akhir'] < 0) {
								ada = false;
							}
						}

						if (ada) {
							let listResep = /* html */ `
                                <tr class="tr-rows${v.no_r}">
                                    <td width="50%" style="padding-left:20px">
                                        <span class="brg"><input type=hidden name="id_barang${v.no_r}[]" id="id-barang${v.no_r}${i}" class="barang" value="${val.id_barang}"></span>
                                        <span class="krs"><input type=hidden name="obatkronis${v.no_r}[]" id="obatkronis${v.no_r}${i}" class="barang" value="${val.kronis}"></span>
                                        ${val.nama_barang}&nbsp;${obatkronistxt}
                                    </td>
                                    <td width="20%" class="center">
                                        Dosis Racik
                                        <input class="jmlpakai custom-form" type="text" value="${val.dosis_racik}" style="width:50px; display:unset;" onkeypress="return hanyaAngka(event)">
                                    </td>
                                    <td width="20%" class="center">
                                        Jml Pakai
                                        <input class="jmlpakai custom-form" type="text" name="jmlpakai${v.no_r}[]" id="jmlpakai${v.no_r}${i}" value="${val.jumlah_pakai}" style="width:50px; display:unset;" data-jual_harga="${val.jual_harga}" data-id="${val.id}" onchange="chRDetail($(this))" onkeypress="return hanyaAngka(event)">
                                    </td>
                                    <td width="10%" class="right">
                                        <input type=hidden name="dosisracik${v.no_r}[]" id="dosisracik${v.no_r}${i}" value="${val.dosis_racik}">
                                        <span id="hb-${val.id}" class="harga-barang">${money_format(precise_round(val.jumlah_pakai * val.jual_harga, 2))}</span>
                                    </td>
                                    <td width="5%" class="right">
                                        <button type="button" title="Klik untuk hapus" class="btn btn-secondary btn-xs" onclick="removeElement(${v.no_r}, this)"><i class="fas fa-times-circle"></i></button>
                                        <input type=hidden name="jmldetail${v.no_r}" id="jmldetail${v.no_r}${i}" class="jmldetail" value="${v.no_r}">
                                    </td>
                                </tr>
                            `;

							$('#table-list-resep' + v.no_r + ' tbody').append(listResep);
							subtotal = subtotal + (val.jumlah_pakai * val.jual_harga);
						}
					});
				});

				try {
					var warning = hasil['status']['warning'];
					$('#res-resep-ranap').html(notification(hasil));
				} catch (e) {
					console.log(e)
				}
			},
			complete: function() {
				hideLoader();
				totalHargaBarang();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

	function getListDataOperasi(page) {
		$('#page-now2').val(page);
		$('#modal-search2').modal('hide');
		let accountGroup = "<?= $this->session->userdata('account_group') ?>";
		$.ajax({
			type: 'GET',
			url: '<?= base_url("order_operasi/api/order_operasi/get_list_data_operasi") ?>/page/' + page,
			data: $('#form-search2').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page > 1) & (data.data.length === 0)) {
					getListDataOperasi(page - 1)
					return false;
				};

				$('#pagination2').html(pagination(data.jumlah, data.limit, data.page, 3))
				$('#summary2').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))

				$('#table-data2 tbody').empty()
				$.each(data.data, function(i, v) {

					if (v.tanggal_keluar === null) {

						disabled_resep = '';

					} else {

						disabled_resep = '';
					}

					let detailResep = v.id_layanan_pendaftaran + '#' + v.id_pasien + '#' + v.nama_pasien + '#' + v.dokter + '#' + v.id_dokter + '#' + hitungUmur(v.tanggal_lahir) + '#' + v.layanan + '#' + v.id_penjamin + '#' + v.penjamin + '#' + v.cara_bayar + '#' + v.telp + '#ok';

					// console.log(detailResep);
					let status = '<em class="blinker"><i class="fas fa-spinner fa-spin mr-1"></i>Belum</em>';
					if (v.id_tim_operasi !== null) {
						status = '<h5><span class="label label-success"><i class="fas fa-fw fa-thumbs-up mr-1"></i>Sudah</span></h5>'
					}
					let disabled = '';
					if (v.id_history_pembayaran) {
						disabled = 'disabled';
						disabled_resep = 'disabled';
					}
					let detail = v.id + '#' + v.id_pasien + '#' + v.nama_pasien + '#' + v.operasi + ', <i>' + v.parent + '</i>#' + v.ruang_operasi + '#' + v.klasifikasi + '#' + datetimefmysql(v.mulai) + '#' + datetimefmysql(v.selesai) + '#' + v.kelamin + '#' + v.tanggal_lahir + '#' + v.id_layanan_pendaftaran + '#' + v.id_tarif;
					let attribut = 'onclick="pelayananOperasi(\'' + detail + '\')"';
					if (v.diperiksa === 'Sudah') {
						attribut = 'onclick="getDataPelayananOperasi(' + v.id + ', \'' + detail + '\', \'' + disabled + '\')"';
					}
					let klasifikasi = '';
					if (v.klasifikasi === 'Standard') {
						klasifikasi = 'Sedang'
					}
					if (v.klasifikasi === 'Minor') {
						klasifikasi = 'Kecil'
					}
					if (v.klasifikasi === 'Mayor') {
						klasifikasi = 'Besar'
					}
					if (v.klasifikasi === 'Khusus') {
						klasifikasi = 'Khusus'
					}

					let disable_viewonly = '';
					let accountGroup  = "<?= $this->session->userdata('account_group') ?>"
		            let idTranslucent = "<?= $this->session->userdata('id_translucent') ?>";
					
					if ((accountGroup === 'Komite Keperawatan')) { //READ ONLY
						disable_viewonly = 'disabled';
					} else {
						disable_viewonly = '';
					}

					if (disable_viewonly == '') {
						riwayat_rekammedis = '';
					} else {
						riwayat_rekammedis = '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="riwayatPasien(\'' + v.id_pasien + '\')"><i class="fas fa-eye m-r-5"></i> Lihat Riwayat Rekam Medis Pasien</a>';
					}

					tindak_lanjut_pengirim = '';
					v.tindak_lanjut_pengirim != null ? tindak_lanjut_pengirim = v.tindak_lanjut_pengirim : '';
					v.tindak_lanjut_pengirim == 'cco sementara it' ? tindak_lanjut_pengirim = 'Cco Sementara Billing' : '';

					disabled_co = '';
					title_resep = 'Klik untuk input resep';
					title_tombol = '';
					if ((v.tindak_lanjut_pengirim == 'Atas Izin Dokter') || (v.tindak_lanjut_pengirim == 'Batal') || (v.tindak_lanjut_pengirim == 'Batal Berkunjung') || (v.tindak_lanjut_pengirim == 'Batal Konsul') ||
						(v.tindak_lanjut_pengirim == 'Melarikan Diri') || (v.tindak_lanjut_pengirim == 'Pulang') || (v.tindak_lanjut_pengirim == 'Pulang APS') || (v.tindak_lanjut_pengirim == 'RS Lain')) {
						if (accountGroup != 'Admin' || idTranslucent != '1841'){
							disabled_co = 'disabled';
							title_resep = 'Resep tidak bisa diinput, pasien sudah di CO oleh pengirim';
							title_tombol = 'title="Tidak bisa diinput, pasien sudah di CO oleh pengirim"';
						}
					}

					let html = /* html */ `
						<tr>
							<td class="wrapper center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
							<td class="wrapper center">${datetimefmysql(v.mulai)}</td>
							<td class="wrapper center">${datetimefmysql(v.selesai)}</td>
							<td class="wrapper">${v.ruang_operasi}</td>
							<td class="wrapper">${v.id_pasien}</td>
							<td class="wrapper">${v.nama_pasien}</td>
							<td class="wrapper">${v.jenis_layanan}</td>
							<td class="wrapper">${tindak_lanjut_pengirim}</td>
							<td>${v.operasi}</td>
							<td class="wrapper center">${klasifikasi}</td>
							<td class="wrapper center">${((v.timing === 'Terjadwal') ? 'Elektif' : 'Cito')}</td>
							<td class="wrapper center">${status}</td>
							<td class="wrapper center">
                                <button ${disabled_resep} ${disable_viewonly} ${disabled_co} type="button" class="btn btn-secondary btn-xs mr-1" title="${title_resep}" onclick="inputResep('${detailResep}')"><i class="fas fa-plus-circle mr-1"></i> Resep</button>
                            </td>
							<td align="right">
                                <div class="btn-group"><button type="button" ${title_tombol} class="btn waves-effect waves-light btn-secondary btn-xs dropdown-toggle" data-toggle="dropdown"><i class="fas fa-fw fa-cog"></i></button> 
                                    <div class="dropdown-menu">
                                        ${riwayat_rekammedis}
                                        <a class="dropdown-item ${disable_viewonly} ${disabled_co} waves-effect waves-light btn-xs" title="Klik untuk melakukan pemeriksaan" href="javascript:void(0)" ${attribut}><i class="fas fa-stethoscope m-r-5"></i>Entri Pemeriksaan</a>
                                        <a hidden class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakResumeMedis(${v.id_layanan_pendaftaran})"><i class="fas fa-print m-r-5"></i>Resume Medis</a>
										${accountGroup === 'Admin' ?
						'<a class="dropdown-item btn-xs" href="javascript:void(0)" onclick="entriCPPT(' + v.id_pendaftaran + ',' + v.id_layanan_pendaftaran + ',\'' + v.ruang_operasi + '\',\'OK\')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri CPPT</a>'
						: '<a class="dropdown-item ' + disabled + ' btn-xs" href="javascript:void(0)" onclick="entriCPPT(' + v.id_pendaftaran + ',' + v.id_layanan_pendaftaran + ',\'' + v.ruang_operasi + '\',\'OK\')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri CPPT</a>'
					}

					${'<a class="dropdown-item ' + ' btn-xs" href="javascript:void(0)" onclick="showListForm(' + v.id_pendaftaran + ',' + v.id_layanan_pendaftaran + ',' + v.id_pasien + ')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri Form</a>'}
										
                                    </div>
                                </div>
                            </td>
						</tr>
					`;
					$('#table-data2 tbody').append(html)
				})
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status);
			},
		})
	}

	function cetakResumeMedis(id) {
		window.open('<?= base_url('pengkodean_icd_x/cetak_resume_medis/') ?>' + id, 'Cetak Resume Medis', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}

	function pelayananOperasi(data) {
		let val = data.split('#')

		$('#id-pasien').val(val[1]); //tambahan lina
		$('#nama-detail2').html(val[2])
		$('#no-rm-detail2').html(val[1])
		$('#kelamin-detail2').html(val[8])
		$('#umur-detail2').html(hitungUmur(val[9]) + ', ' + datefmysql(val[9]))
		$('#id-jadwal-operasi').val(val[0])
		$('#tarif-operasi2').val(val[11])
		$('#id-tarif-operasi-asli').val(val[11])
		$('#s2id_tarif-operasi2 a .select2c-chosen').html(val[3])
		$('#diagnosa-pra, #diagnosa-pasca, #dokter-bedah, #dokter-bedah-asisten, #dokter-anesthesi, #perawat, #asisten-operator, #instrumental, #sirkuler, #dokter-resusitasi').html('')
		getLayananPendaftaran(val[1], val[10])
		get_pemeriksaan_lab(val[10]);
		// get_pemeriksaan_rad(val[10]);
		$('#table-bhp tbody').empty()
	}

	function getLayananPendaftaran(id_pasien, id_layanan_pendaftaran) {
		$('#wizard2').bwizard('show', '0')
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pelayanan/api/pelayanan_auto/get_layanan_pendaftaran") ?>/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if (data != null) {
					if (data.id !== undefined) {
						$('#id-layanan').val(id_layanan_pendaftaran)
						$('#id-pendaftaran').val(data.id_pendaftaran)
						$('#cara-bayar-detail2').html(data.cara_bayar + ' ' + ((data.penjamin !== null) ? '(' + data.penjamin + ')' : ''))
						$('#datang-dari-detail2').html(data.dari)
						$('#kelas-detail2').html(data.kelas)
						$('#kelas-check').val(data.id_kelas)
						$('#no-register-detail2').html(data.no_register)
						$('#modal-pelayanan-operasi').modal('show')
					} else {
						swalAlert('info', 'Informasi', 'Pasien ini pada bagian lain dinyatakan <b>Sudah Keluar</b> dari Rumah Sakit!')
						return false;
					}
				}
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status);
			},
		})
	}

	function tambahDataDiagnosisPra() {
		let i = $('.diagnosa-pra').length;
		let html = /* html */ `
			<div id="pra${i}" style="vertical-align:middle !important">
				<input type="text" name="diagpra[]" id="diagnosa-pra${i}" class="diagnosa-pra mb-2">
				<button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeDiagnosisPra(${i})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
			</div>
		`;
		$('#diagnosa-pra').append(html)
		$('#diagnosa-pra' + i).select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/golongan_sebab_sakit_auto') ?>",
				dataType: 'json',
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
				var kode_icdx = (data.kode_icdx !== null) ? (data.kode_icdx + ' | ') : '';

				var markup = '<b>' + kode_icdx + '</b>' + data.nama + '<br/>';
				return markup;
			},
			formatSelection: function(data) {
				return data.kode_icdx_rinci + ' | ' + data.nama;
			}
		})
	}

	function tambahDataDiagnosisPasca() {
		let i = $('.diagnosa-pasca').length;
		let html = /* html */ `
			<div id="pasca${i}" style="vertical-align:middle !important">
				<input type="text" name="diagpasca[]" id="diagnosa-pasca${i}" class="diagnosa-pasca mb-2">
				<button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeDiagnosisPasca(${i})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
			</div>
		`;
		$('#diagnosa-pasca').append(html)
		$('#diagnosa-pasca' + i).select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/golongan_sebab_sakit_auto') ?>",
				dataType: 'json',
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
				var kode_icdx = (data.kode_icdx !== null) ? (data.kode_icdx + ' | ') : '';

				var markup = '<b>' + kode_icdx + '</b>' + data.nama + '<br/>';
				return markup;
			},
			formatSelection: function(data) {
				return data.kode_icdx_rinci + ' | ' + data.nama;
			}
		})
	}

	function removeDiagnosisPra(i) {
		$('#pra' + i).remove()
	}

	function removeDiagnosisPasca(i) {
		$('#pasca' + i).remove()
	}

	function tambahDokterBedah() {
		let i = $('.dokter-bedah').length;
		let html = /* html */ `
			<div id="dinamic1${i}" style="vertical-align:middle !important" class="dinamic1 nadis">
				<input type="text" name="dokter_bedah[]" id="dokter-bedah${i}" class="dokter-bedah mb-2">
				<button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeDokterBedah(${i})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
			</div>
		`;
		$('#dokter-bedah').append(html)
		$('#dokter-bedah' + i).select2c({
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
	}

	function removeDokterBedah(i) {
		$('#dinamic1' + i).remove()
		var jml = $('.dokter-bedah').length;
		var urut = 0;
		for (j = 0; j <= jml - 1; j++) {
			$('.dinamic1:eq(' + urut + ')').attr('id', 'dinamic1' + j)
			$('.dinamic1:eq(' + urut + ')').children('.dokter-bedah').attr('id', 'dokter-bedah' + j)
			$('.dinamic1:eq(' + urut + ')').children('button').attr('onclick', 'removeDokterBedah(' + j + ')')
			urut++;
		}
	}

	// function tambahDokterPendamping() {
	// 	let i = $('.dokter-pendamping').length;
	// 	let html = /* html */ `
	// 		<div id="dinamic2${i}" style="vertical-align:middle !important" class="dinamic2 nadis">
	// 			<input type="text" name="dokter_pendamping[]" id="dokter-pendamping${i}" class="dokter-pendamping mb-2">
	// 			<button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeDokterPendamping(${i})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
	// 		</div>
	// 	`;
	// 	$('#dokter-pendamping').append(html)
	// 	$('#dokter-pendamping' + i).select2c({
	// 		ajax: {
	// 			url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
	// 			dataType: 'json',
	// 			quietMillis: 100,
	// 			data: function(term, page) { // page is the one-based page number tracked by Select2
	// 				return {
	// 					q: term, //search term
	// 					jenis: 'medis',
	// 					page: page, // page number
	// 				};
	// 			},
	// 			results: function(data, page) {
	// 				var more = (page * 20) < data.total; // whether or not there are more results available

	// 				// notice we return the value of more so Select2 knows if more results can be loaded
	// 				return {
	// 					results: data.data,
	// 					more: more
	// 				};
	// 			}
	// 		},
	// 		formatResult: function(data) {
	// 			var markup = '<b>' + data.nama + '</b> <br/>' + data.spesialisasi;
	// 			return markup;
	// 		},
	// 		formatSelection: function(data) {
	// 			return data.nama;
	// 		}
	// 	})
	// }

	// function removeDokterPendamping(i) {
	// 	$('#dinamic2' + i).remove()
	// 	var jml = $('.dokter-pendamping').length;
	// 	var urut = 0;
	// 	for (j = 0; j <= jml - 1; j++) {
	// 		$('.dinamic2:eq(' + urut + ')').attr('id', 'dinamic2' + j)
	// 		$('.dinamic2:eq(' + urut + ')').children('.dokter-pendamping').attr('id', 'dokter-pendamping' + j)
	// 		$('.dinamic2:eq(' + urut + ')').children('button').attr('onclick', 'removeDokterPendamping(' + j + ')')
	// 		urut++;
	// 	}
	// }

	function tambahAsistenOperator() {
		let i = $('.asisten-operator').length;
		let html = /* html */ `
			<div id="dinamic2${i}" style="vertical-align:middle !important" class="dinamic2 nadis">
				<input type="text" name="asisten_operator[]" id="asisten-operator${i}" class="asisten-operator mb-2">
				<button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeAsistenOperator(${i})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
			</div>
		`;
		$('#asisten-operator').append(html)
		$('#asisten-operator' + i).select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						jenis: 'medis',
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
	}

	function removeAsistenOperator(i) {
		$('#dinamic2' + i).remove()
		var jml = $('.asisten-operator').length;
		var urut = 0;
		for (j = 0; j <= jml - 1; j++) {
			$('.dinamic2:eq(' + urut + ')').attr('id', 'dinamic2' + j)
			$('.dinamic2:eq(' + urut + ')').children('.asisten-operator').attr('id', 'asisten-operator' + j)
			$('.dinamic2:eq(' + urut + ')').children('button').attr('onclick', 'removeAsistenOperator(' + j + ')')
			urut++;
		}
	}

	function tambahInstrumental() {
		let i = $('.instrumental').length;
		let html = /* html */ `
			<div id="dinamic5${i}" style="vertical-align:middle !important" class="dinamic5 nadis">
				<input type="text" name="instrumental[]" id="instrumental${i}" class="instrumental mb-2">
				<button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeInstrumental(${i})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
			</div>
		`;
		$('#instrumental').append(html)
		$('#instrumental' + i).select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						jenis: 'medis',
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
	}

	function removeInstrumental(i) {
		$('#dinamic5' + i).remove()
		var jml = $('.instrumental').length;
		var urut = 0;
		for (j = 0; j <= jml - 1; j++) {
			$('.dinamic5:eq(' + urut + ')').attr('id', 'dinamic5' + j)
			$('.dinamic5:eq(' + urut + ')').children('.instrumental').attr('id', 'instrumental' + j)
			$('.dinamic5:eq(' + urut + ')').children('button').attr('onclick', 'removeInstrumental(' + j + ')')
			urut++;
		}
	}

	function tambahSirkuler() {
		let i = $('.sirkuler').length;
		let html = /* html */ `
			<div id="dinamic6${i}" style="vertical-align:middle !important" class="dinamic6 nadis">
				<input type="text" name="sirkuler[]" id="sirkuler${i}" class="sirkuler mb-2">
				<button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeSirkuler(${i})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
			</div>
		`;
		$('#sirkuler').append(html)
		$('#sirkuler' + i).select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						jenis: 'medis',
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
	}

	function removeSirkuler(i) {
		$('#dinamic6' + i).remove()
		var jml = $('.sirkuler').length;
		var urut = 0;
		for (j = 0; j <= jml - 1; j++) {
			$('.dinamic6:eq(' + urut + ')').attr('id', 'dinamic6' + j)
			$('.dinamic6:eq(' + urut + ')').children('.sirkuler').attr('id', 'sirkuler' + j)
			$('.dinamic6:eq(' + urut + ')').children('button').attr('onclick', 'removeSirkuler(' + j + ')')
			urut++;
		}
	}

	function tambahDokterAnesthesi() {
		let i = $('.dokter-anesthesi').length;
		let html = /* html */ `
			<div id="dinamic3${i}" style="vertical-align:middle !important" class="dinamic3 nadis">
				<input type="text" name="dokter_anesthesi[]" id="dokter-anesthesi${i}" class="dokter-anesthesi mb-2">
				<button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeDokterAnesthesi(${i})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
			</div>
		`;
		$('#dokter-anesthesi').append(html)
		$('#dokter-anesthesi' + i).select2c({
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
	}

	function removeDokterAnesthesi(i) {
		$('#dinamic3' + i).remove()
		var jml = $('.dokter-anesthesi').length;
		var urut = 0;
		for (j = 0; j <= jml - 1; j++) {
			$('.dinamic3:eq(' + urut + ')').attr('id', 'dinamic3' + j)
			$('.dinamic3:eq(' + urut + ')').children('.dokter-anesthesi').attr('id', 'dokter-anesthesi' + j)
			$('.dinamic3:eq(' + urut + ')').children('button').attr('onclick', 'removeDokterAnesthesi(' + j + ')')
			urut++;
		}
	}

	function tambahPerawat() {
		let i = $('.perawat').length;
		let html = /* html */ `
			<div id="dinamic4${i}" style="vertical-align:middle !important" class="dinamic4 nadis">
				<input type="text" name="perawat[]" id="perawat${i}" class="perawat mb-2">
				<button type="button" class="btn btn-danger btn-xs mb-2" onclick="removePerawat(${i})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
			</div>
		`;
		$('#perawat').append(html)
		$('#perawat' + i).select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						jenis: '18',
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
	}

	function removePerawat(i) {
		$('#dinamic4' + i).remove()
		var jml = $('.perawat').length;
		var urut = 0;
		for (j = 0; j <= jml - 1; j++) {
			$('.dinamic4:eq(' + urut + ')').attr('id', 'dinamic4' + j)
			$('.dinamic4:eq(' + urut + ')').children('.perawat').attr('id', 'perawat' + j)
			$('.dinamic4:eq(' + urut + ')').children('button').attr('onclick', 'removePerawat(' + j + ')')
			urut++;
		}
	}

	function tambahDokterResusitasi() {
		let i = $('.dokter-resusitasi').length;
		let html = /* html */ `
			<div id="dinamic7${i}" style="vertical-align:middle !important" class="dinamic7 nadis">
				<input type="text" name="dokter_resusitasi[]" id="dokter-resusitasi${i}" class="dokter-resusitasi mb-2">
				<button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeDokterResusitasi(${i})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
			</div>
		`;

		$('#dokter-resusitasi').append(html)
		$('#dokter-resusitasi' + i).select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						jenis: 'spesialis_anak',
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
		});
	}

	function removeDokterResusitasi(i) {
		$('#dinamic7' + i).remove()
		var jml = $('.dokter-resusitasi').length;
		var urut = 0;
		for (j = 0; j <= jml - 1; j++) {
			$('.dinamic7:eq(' + urut + ')').attr('id', 'dinamic7' + j)
			$('.dinamic7:eq(' + urut + ')').children('.dokter-resusitasi').attr('id', 'dokter-resusitasi' + j)
			$('.dinamic7:eq(' + urut + ')').children('button').attr('onclick', 'removeDokterResusitasi(' + j + ')')
			urut++;
		}
	}

	function addTindakan() {
		if ($('#operator-auto2').val() === '') {
			syams_validation('#operator-auto2', 'Kolom dokter harus diisi.')
			return false;
		}

		if ($('#tindakan-auto2').val() === '') {
			syams_validation('#tindakan-auto2', 'Kolom tindakan harus diisi.')
			return false;
		}

		let html = '';
		let number = $('.number-tindakan').length;
		let operator = $('#s2id_operator-auto2 a .select2c-chosen').html()
		let id_operator = $('#operator-auto2').val()
		let tindakan = $('#s2id_tindakan-auto2 a .select2c-chosen').html()
		let id_tindakan = $('#tindakan-auto2').val()
		let tarif = $('#tarif-tindakan').val()

		$.get('<?= base_url("pelayanan/api/pelayanan/check_tindakan_operasi") ?>', {
			id_layanan_pendaftaran: $('#id-layanan').val(),
			id_tindakan,
		}, function(res){
			if(!res.success){
				swalAlert('info', 'Informasi', 'Tindakan pemeriksaan dan konsultasi tidak dapat diinput lebih dari satu kali untuk dokter yang sama dalam satu kunjungan (visit) yang sama.')
			}else{
				html = /* html */ `
					<tr>
						<td class="number-tindakan center">${++number}</td>
						<td><input type="hidden" name="id_operator[]" value="${id_operator}">${operator}</td>
						<td><input type="hidden" name="id_tindakan[]" value="${id_tindakan}">${tindakan}</td>
						<td class="right">${numberToCurrency(tarif)}</span></td>
						<td class="right">
							<button type="button" class="btn btn-secondary btn-xxs" onclick="removeThis(this)"><i class="fas fa-trash-alt"></i></button>
						</td>
					</tr>
				`;
				$('#table-tindakan2 tbody').append(html)
				$('#tindakan-auto2, #tarif-tindakan').val('')
				$('#s2id_tindakan-auto2 a .select2c-chosen').html('')
			}
		})
	}

	function removeThis(el) {
		var parent = el.parentNode.parentNode;
		parent.parentNode.removeChild(parent);
	}

	function addBHP() {
		let id_barang = $('#barang-bhp2').val()
		let nama_barang = $('#s2id_barang-bhp2 a .select2c-chosen').html()
		let jumlah_barang = $('#jumlah-bhp2').val()
		let id_kemasan_barang = $('#kemasan-bhp2').val()
		if (id_barang === '') {
			syams_validation('#barang-bhp2', 'Pilih barang terlebih dahulu!')
			return false;
		}
		if (id_kemasan_barang === '') {
			syams_validation('#kemasan-bhp2', 'Pilih kemasan terlebih dahulu!')
			return false;
		}
		addNewsRowsBHP(id_barang, nama_barang, jumlah_barang, id_kemasan_barang)
		$('#barang-bhp2, #jumlah-bhp2').val('')
		$('#s2id_barang-bhp2 a .select2c-chosen').html('Pilih Barang BHP')
		$('#kemasan-bhp2').html('<option value=""></option>')
	}

	function addNewsRowsBHP(id_barang, nama_barang, jumlah_barang, id_kemasan_barang) {
		if (id_kemasan_barang === null) {
			swalAlert('warning', 'Validasi', 'Kemasan Barang tidak boleh kosong!')
			return false;
		}
		let i = $('.rows').length + 1;
		let kemasan_barang = $('#kemasan-bhp2 option:selected').text()
		let html = /* html */ `
			<tr class="rows">
				<td class="center">${i}</td>
				<td>${nama_barang}<input type="hidden" name="id_barang[]" value="${id_barang}" class="id-barang" id="id-barang${i}"></td>
				<td><span id="nama-kemasan${i}">${kemasan_barang}</span><input type="hidden" name="kemasan[]" value="" class="kemasan" id="kemasan${i}"></td>
				<td><input type="text" name="jumlah[]" id="jumlah${i}" class="jumlah custom-form center" value="${jumlah_barang}"></td>
				<td><span id="sisa${i}"></span><input type="hidden" name="hna[]" id="hna${i}" class="hna"></td><input type="hidden" name="hja[]" id="hja${i}" class="hja"></td>
				<td class="right" id="hargajual${i}"></td>
				<td class="right"><span id="diskonrp${i}"></span><input type="hidden" name="diskon_rp[]" id="diskon-rp${i}" class="diskon-rp"></td>
				<td class="right" id="subtotal${i}"></td>
				<td class="center"><button type="button" class="btn btn-danger btn-xs" onclick="removeThisBHP(this)"><i class="fas fa-trash-alt"></i></button></td>
			</tr>
		`;

		$('#table-bhp2 tbody').append(html)
		$('#jumlah' + i).keyup(function() {
			let hargajual = money_format_save($('#hargajual' + i).html())
			let jumlah = parseFloat($('#jumlah' + i).val())
			let diskon = money_format_save($('#diskonrp' + i).html())
			let subtotal = (parseFloat(hargajual) - parseFloat(diskon)) * jumlah;
			$('#subtotal' + i).html(money_format(subtotal))
			hitungEstimasi()
		})
		$('#diskonrp' + i).html(0)
		syams_validation_remove('.select2c-input')
		syams_validation_remove('.custom-form')
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pelayanan/api/pelayanan/get_detail_harga_barang_penjualan") ?>',
			data: 'id=' + id_barang + '&id_kemasan=' + id_kemasan_barang,
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				if (data !== null) {
					let subtotal = Math.ceil(data.harga_jual_nr) * jumlah_barang;
					let is_amhp = $('#is-amhp').is(':checked')

					$('#hna' + i).val(money_format_save(money_format(data.hna)))
					$('#hja' + i).val(money_format_save(money_format(data.harga_jual_nr)))
					$('#hargajual' + i).html(money_format(data.harga_jual_nr))
					$('#subtotal' + i).html(money_format(subtotal))

					$('#kemasan' + i).val(data.id_packing)
					$('#nama-kemasan' + i).html(data.nama_kemasan)
					$('#sisa' + i).html(data.sisa + ' ' + data.kemasan_kecil)
					hitungEstimasi()
				}
			},
			error: function(e) {
				accessFailed(e.status)
			}
		})
	}

	function hitungEstimasi() {
		var jml_baris = $('.rows').length;
		var estimasi = 0;
		for (i = 1; i <= jml_baris; i++) {
			var subtotal = money_format_save($('#subtotal' + i).html());
			estimasi = estimasi + parseFloat(subtotal);
		}
		var disc_pr = $('#diskon-pr').val();
		var disc_rp = $('#diskon-rp').val();
		var diskon = 0;

		if (disc_pr !== '0' && disc_pr !== '' && disc_pr <= 100) {
			diskon = estimasi * (disc_pr / 100);
		}
		if (disc_rp !== '0' && disc_rp !== '' && disc_rp <= estimasi) {
			diskon = money_format_save(disc_rp);
		}
		if (disc_pr > 100) {
			syams_validation('#diskon-pr', 'Diskon tidak boleh melebihi 100 %');
		}
		if (disc_rp > estimasi) {
			syams_validation('#diskon-rp', 'Diskon tidak boleh melebihi ' + money_format(estimasi));
		}
		var total = estimasi - diskon;

		$('#total').val(estimasi);
		$('#estimasi').html(money_format(total));
	}

	function removeThisBHP(el, id_detail, id_operasi) {
		swal.fire({
			title: 'Konfirmasi Hapus',
			html: "Anda yakin ingin menghapus data ini?",
			icon: 'question',
			showCancelButton: true,
			buttonsStyling: true,
			confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Ya',
			cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				if (id_detail !== undefined) {
					$.ajax({
						type: 'DELETE',
						url: '<?= base_url('order_operasi/api/order_operasi/hapus_detail_bhp_operasi') ?>',
						data: 'id_detail=' + id_detail + '&id_operasi=' + id_operasi,
						dataType: 'JSON',
						beforeSend: function() {
							showLoader()
						},
						success: function(data) {
							if (data.status) {
								messageDeleteSuccess()
								var parent = el.parentNode.parentNode;
								parent.parentNode.removeChild(parent);
								var jml = $('.rows').length;
								var col = 0;

								for (i = 1; i <= jml; i++) {
									$('.rows:eq(' + col + ')').children('td:eq(0)').html(i);
									$('.rows:eq(' + col + ')').children('td:eq(1)').children('.id-barang').attr('id', 'id-barang' + i);
									$('.rows:eq(' + col + ')').children('td:eq(2)').children('.kemasan').attr('id', 'kemasan' + i);
									$('.rows:eq(' + col + ')').children('td:eq(3)').children('.jumlah').attr('id', 'jumlah' + i);
									$('.rows:eq(' + col + ')').children('td:eq(4)').children('span').attr('id', 'sisa' + i);
									$('.rows:eq(' + col + ')').children('td:eq(4)').children('.hna').attr('id', 'hna' + i);
									$('.rows:eq(' + col + ')').children('td:eq(4)').children('.hja').attr('id', 'hja' + i);
									$('.rows:eq(' + col + ')').children('td:eq(5)').attr('id', 'hargajual' + i);
									$('.rows:eq(' + col + ')').children('td:eq(6)').children('span').attr('id', 'diskonrp' + i);
									$('.rows:eq(' + col + ')').children('td:eq(6)').children('.diskon-rp').attr('id', 'diskon-rp' + i);
									$('.rows:eq(' + col + ')').children('td:eq(7)').attr('id', 'subtotal' + i);
									col++;
								}
								hitungEstimasi()
							} else {
								swalAlert('info', 'Hapus BHP Operasi', '<h5 style="display:inline-block">' + data.message + '</h5>')
							}
						},
						complete: function() {
							hideLoader()
						},
						error: function(e) {
							messageDeleteFailed()
						}
					})
				} else {
					var parent = el.parentNode.parentNode;
					parent.parentNode.removeChild(parent);
					var jml = $('.rows').length;
					var col = 0;

					for (i = 1; i <= jml; i++) {
						$('.rows:eq(' + col + ')').children('td:eq(0)').html(i);
						$('.rows:eq(' + col + ')').children('td:eq(1)').children('.id-barang').attr('id', 'id-barang' + i);
						$('.rows:eq(' + col + ')').children('td:eq(2)').children('.kemasan').attr('id', 'kemasan' + i);
						$('.rows:eq(' + col + ')').children('td:eq(3)').children('.jumlah').attr('id', 'jumlah' + i);
						$('.rows:eq(' + col + ')').children('td:eq(4)').children('span').attr('id', 'sisa' + i);
						$('.rows:eq(' + col + ')').children('td:eq(4)').children('.hna').attr('id', 'hna' + i);
						$('.rows:eq(' + col + ')').children('td:eq(4)').children('.hja').attr('id', 'hja' + i);
						$('.rows:eq(' + col + ')').children('td:eq(5)').attr('id', 'hargajual' + i);
						$('.rows:eq(' + col + ')').children('td:eq(6)').children('span').attr('id', 'diskonrp' + i);
						$('.rows:eq(' + col + ')').children('td:eq(6)').children('.diskon-rp').attr('id', 'diskon-rp' + i);
						$('.rows:eq(' + col + ')').children('td:eq(7)').attr('id', 'subtotal' + i);
						col++;
					}
					hitungEstimasi()
				}
			}
		})
	}

	function konfirmasiSimpan() {
		swal.fire({
			title: 'Konfirmasi Simpan',
			html: "Anda yakin ingin menyimpan transaksi operasi ini?",
			icon: 'question',
			showCancelButton: true,
			buttonsStyling: true,
			confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Ya',
			cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				simpanPelayananOperasi()
			}
		})
	}

	function simpanPelayananOperasi() {
		let jml_nadis = $('.nadis').length;
		if (jml_nadis === 0) {
			swalAlert('warning', 'Validasi', 'Data Tenaga Kesehatan belum dientrikan!')
			$('#wizard2').bwizard('show', '2')
			return false;
		}
		let update = '';
		if ($('#id').val() !== '') {
			update = '/id/' + $('#id').val()
		}

		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("order_operasi/api/order_operasi/simpan_pelayanan_operasi") ?>' + update,
			data: $('#form-pelayanan-operasi').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if (data.status) {
					messageCustom('Berhasil menyimpan transaksi pelayanan operasi', 'Success')
					getListDataOperasi($('#page-now2').val())
					$('#modal-pelayanan-operasi').modal('hide')
				} else {
					messageCustom(data.message, 'Error')
				}
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				messageCustom('Terjadi Kesalahan Sistem, Gagal melakukan Transaksi Pelayanan Operasi', 'Error')
			}
		})
	}

	function getDataPelayananOperasi(id_operasi, data, disabled) {
		$('#wizard2').bwizard('show', '0')
		$('#table-bhp2 tbody').empty()
		pelayananOperasi(data)
		loadDataPemeriksaanOperasi(id_operasi, disabled)
		loadDataBHPOperasi(id_operasi)
	}

	function loadDataPemeriksaanOperasi(id_operasi, disabled) {
		$('#table-tindakan2 tbody').empty()
		$('#dokter-bedah-hide').empty()
		$('#asisten-operator-hide').empty()
		$('#instrumental-hide').empty()
		$('#sirkuler-hide').empty()
		$('#dokter-pendamping-hide').empty()
		$('#dokter-anesthesi-hide').empty()
		$('#perawat-hide').empty()
		$('#dokter-resusitasi-hide').empty()
		$.ajax({
			type: 'GET',
			url: '<?= base_url("order_operasi/api/order_operasi/get_tindakan_tambahan_operasi") ?>',
			data: 'id=' + id_operasi,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				$.each(data, function(i, v) {
					let html = /* html */ `
                        <tr>
                            <td class="number-tindakan center">${++i}</td>
                            <td>
                                <input type="hidden" name="id_operator[]" value="${v.id_nadis}">
                                <input type="hidden" name="id_operator_before[]" value="${v.nadis}">
                                ${v.nadis}
                            </td>
                            <td>
                                <input type="hidden" name="id_tindakan[]" value="${v.id_tarif}">
                                <input type="hidden" name="id_tindakan_before[]" value="${v.nama_tarif}">
                                ${v.nama_tarif}
                            </td>
                            <td class="right">${numberToCurrency(v.total)}</td>
                            <td class="right">
                                <button type="button" ${disabled} class="btn btn-secondary btn-xxs" onclick="removeThis(this)"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    `;
					$('#table-tindakan2 tbody').append(html)
				})
			},
			complete: function() {
				hideLoader()
			}
		})
		$.ajax({
			type: 'GET',
			url: '<?= base_url("order_operasi/api/order_operasi/get_diagnosis_operasi") ?>',
			data: 'id=' + id_operasi,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				let no = 0;
				let noo = 0;
				$.each(data, function(i, v) {
					if (v.id_golongan_sebab_sakit_pra !== null) {
						let html = /* html */ `
                            <div id="pra${no}" style="vertical-align:middle !important">
                                <input type="text" name="diagpra[]" id="diagnosa-pra${no}" class="diagnosa-pra mb-2" value="${v.id_golongan_sebab_sakit_pra}">
                                <button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeDiagnosisPra(${no})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
                            </div>
                        `;
						$('#diagnosa-pra').append(html)
						$('#diagnosa-pra' + i).select2c({
							ajax: {
								url: "<?= base_url('masterdata/api/masterdata_auto/golongan_sebab_sakit_auto') ?>",
								dataType: 'json',
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
								var kode_icdx = (data.kode_icdx !== null) ? (data.kode_icdx + ' | ') : '';

								var markup = '<b>' + kode_icdx + '</b>' + data.nama + '<br/>';
								return markup;
							},
							formatSelection: function(data) {
								return data.kode_icdx_rinci + ' | ' + data.nama;
							}
						})
						$('#s2id_diagnosa-pra' + no + ' a .select2c-chosen').html(v.diagnosis)
						no++;
					}
					if (v.id_golongan_sebab_sakit_pasca !== null) {
						let html = /* html */ `
                            <div id="pasca${noo}" style="vertical-align:middle !important">
                                <input type="text" name="diagpasca[]" id="diagnosa-pasca${noo}" class="diagnosa-pasca mb-2" value="${v.id_golongan_sebab_sakit_pasca}">
                                <button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeDiagnosisPra(${noo})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
                            </div>
                        `;
						$('#diagnosa-pasca').append(html)
						$('#diagnosa-pasca' + noo).select2c({
							ajax: {
								url: "<?= base_url('masterdata/api/masterdata_auto/golongan_sebab_sakit_auto') ?>",
								dataType: 'json',
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
								var kode_icdx = (data.kode_icdx !== null) ? (data.kode_icdx + ' | ') : '';

								var markup = '<b>' + kode_icdx + '</b>' + data.nama + '<br/>';
								return markup;
							},
							formatSelection: function(data) {
								return data.kode_icdx_rinci + ' | ' + data.nama;
							}
						})
						$('#s2id_diagnosa-pasca' + noo + ' a .select2c-chosen').html(v.diagnosis)
						noo++;
					}
				})
			},
			complete: function() {
				hideLoader()
			}
		})
		$.ajax({
			type: 'GET',
			url: '<?= base_url("order_operasi/api/order_operasi/get_tim_operasi") ?>',
			data: 'id=' + id_operasi,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				let a = 0;
				let b = 0;
				let c = 0;
				let d = 0;
				let e = 0;
				$.each(data, function(i, v) {
					if (v.status === 'Dokter Operator') {
						let html = /* html */ `
                            <div id="dinamic1${a}" style="vertical-align:middle !important" class="dinamic1 nadis">
                                <input type="text" name="dokter_bedah[]" id="dokter-bedah${a}" class="dokter-bedah mb-2" value="${v.id_nadis}">
                                <button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeDokterBedah(${a})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
                            </div>
                        `;
						$('#dokter-bedah').append(html)
						let html_hide = /* html */ `
                            <input type="text" name="dokter_bedah_before[]" id="dokter-bedah-before${a}" class="dokter-bedah mb-2" value="${v.nadis}">
                        `;
						$('#dokter-bedah-hide').append(html_hide)
						$('#dokter-bedah' + a).select2c({
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
						$('#s2id_dokter-bedah' + a + ' a .select2c-chosen').html(v.nadis)
						a++;
					}
					// if (v.status === 'Dokter Pendamping') {
					// 	let html = /* html */ `
					//         <div id="dinamic2${b}" style="vertical-align:middle !important" class="dinamic2 nadis">
					//             <input type="text" name="dokter_pendamping[]" id="dokter-pendamping${b}" class="dokter-pendamping mb-2" value="${v.id_nadis}">
					//             <button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeDokterPendamping(${b})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
					//         </div>
					//     `;
					// 	$('#dokter-pendamping').append(html)
					// 	let html_hide = /* html */ `
					//         <input type="text" name="dokter_pendamping_before[]" id="dokter-pendamping-before${a}" class="dokter-pendamping mb-2" value="${v.nadis}">
					//     `;
					// 	$('#dokter-pendamping-hide').append(html_hide)
					// 	$('#dokter-pendamping' + b).select2c({
					// 		ajax: {
					// 			url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
					// 			dataType: 'json',
					// 			quietMillis: 100,
					// 			data: function(term, page) { // page is the one-based page number tracked by Select2
					// 				return {
					// 					q: term, //search term
					// 					jenis: 'medis',
					// 					page: page, // page number
					// 				};
					// 			},
					// 			results: function(data, page) {
					// 				var more = (page * 20) < data.total; // whether or not there are more results available

					// 				// notice we return the value of more so Select2 knows if more results can be loaded
					// 				return {
					// 					results: data.data,
					// 					more: more
					// 				};
					// 			}
					// 		},
					// 		formatResult: function(data) {
					// 			var markup = '<b>' + data.nama + '</b> <br/>' + data.spesialisasi;
					// 			return markup;
					// 		},
					// 		formatSelection: function(data) {
					// 			return data.nama;
					// 		}
					// 	})
					// 	$('#s2id_dokter-pendamping' + b + ' a .select2c-chosen').html(v.nadis)
					// 	b++;
					// }
					if (v.status === 'Asisten Operator') {
						let html = /* html */ `
                            <div id="dinamic2${b}" style="vertical-align:middle !important" class="dinamic2 nadis">
                                <input type="text" name="asisten_operator[]" id="asisten-operator${b}" class="asisten-operator mb-2" value="${v.id_nadis}">
                                <button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeAsistenOperator(${b})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
                            </div>
                        `;
						$('#asisten-operator').append(html)
						let html_hide = /* html */ `
                            <input type="text" name="asisten_operator_before[]" id="asisten-operator-before${a}" class="asisten-operator mb-2" value="${v.nadis}">
                        `;
						$('#asisten-operator-hide').append(html_hide)
						$('#asisten-operator' + b).select2c({
							ajax: {
								url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
								dataType: 'json',
								quietMillis: 100,
								data: function(term, page) { // page is the one-based page number tracked by Select2
									return {
										q: term, //search term
										jenis: 'medis',
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
						$('#s2id_asisten-operator' + b + ' a .select2c-chosen').html(v.nadis)
						b++;
					}
					if (v.status === 'Instrumental') {
						let html = /* html */ `
                            <div id="dinamic5${b}" style="vertical-align:middle !important" class="dinamic5 nadis">
                                <input type="text" name="instrumental[]" id="instrumental${b}" class="instrumental mb-2" value="${v.id_nadis}">
                                <button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeInstrumental(${b})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
                            </div>
                        `;
						$('#instrumental').append(html)
						let html_hide = /* html */ `
                            <input type="text" name="instrumental_before[]" id="instrumental-before${a}" class="instrumental mb-2" value="${v.nadis}">
                        `;
						$('#instrumental-hide').append(html_hide)
						$('#instrumental' + b).select2c({
							ajax: {
								url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
								dataType: 'json',
								quietMillis: 100,
								data: function(term, page) { // page is the one-based page number tracked by Select2
									return {
										q: term, //search term
										jenis: 'medis',
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
						$('#s2id_instrumental' + b + ' a .select2c-chosen').html(v.nadis)
						b++;
					}
					if (v.status === 'Sirkuler') {
						let html = /* html */ `
                            <div id="dinamic6${b}" style="vertical-align:middle !important" class="dinamic6 nadis">
                                <input type="text" name="sirkuler[]" id="sirkuler${b}" class="sirkuler mb-2" value="${v.id_nadis}">
                                <button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeSirkuler(${b})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
                            </div>
                        `;
						$('#sirkuler').append(html)
						let html_hide = /* html */ `
                            <input type="text" name="sirkuler_before[]" id="sirkuler-before${a}" class="sirkuler mb-2" value="${v.nadis}">
                        `;
						$('#sirkuler-hide').append(html_hide)
						$('#sirkuler' + b).select2c({
							ajax: {
								url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
								dataType: 'json',
								quietMillis: 100,
								data: function(term, page) { // page is the one-based page number tracked by Select2
									return {
										q: term, //search term
										jenis: 'medis',
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
						$('#s2id_sirkuler' + b + ' a .select2c-chosen').html(v.nadis)
						b++;
					}
					if (v.status === 'Dokter Anesthesi') {
						let html = /* html */ `
                            <div id="dinamic3${c}" style="vertical-align:middle !important" class="dinamic3 nadis">
                                <input type="text" name="dokter_anesthesi[]" id="dokter-anesthesi${c}" class="dokter-anesthesi mb-2" value="${v.id_nadis}">
                                <button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeDokterAnesthesi(${c})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
                            </div>
                        `;
						$('#dokter-anesthesi').append(html)
						let html_hide = /* html */ `
                            <input type="text" name="dokter_anesthesi_before[]" id="dokter-anesthesi-before${a}" class="dokter-anesthesi mb-2" value="${v.nadis}">
                        `;
						$('#dokter-anesthesi-hide').append(html_hide)
						$('#dokter-anesthesi' + c).select2c({
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
						$('#s2id_dokter-anesthesi' + c + ' a .select2c-chosen').html(v.nadis)
						c++;
					}
					if (v.status === 'Perawat Anesthesi') {
						let html = /* html */ `
                            <div id="dinamic4${d}" style="vertical-align:middle !important" class="dinamic4 nadis">
                                <input type="text" name="perawat[]" id="perawat${d}" class="perawat mb-2" value="${v.id_nadis}">
                                <button type="button" class="btn btn-danger btn-xs mb-2" onclick="removePerawat(${d})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
                            </div>
                        `;
						$('#perawat').append(html)
						let html_hide = /* html */ `
                            <input type="text" name="perawat_before[]" id="perawat-before${a}" class="perawat mb-2" value="${v.nadis}">
                        `;
						$('#perawat-hide').append(html_hide)
						$('#perawat' + d).select2c({
							ajax: {
								url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
								dataType: 'json',
								quietMillis: 100,
								data: function(term, page) { // page is the one-based page number tracked by Select2
									return {
										q: term, //search term
										jenis: '18',
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
						$('#s2id_perawat' + d + ' a .select2c-chosen').html(v.nadis)
						d++;
					}

					if (v.status === 'Dokter Resusitasi') {
						let html = /* html */ `
                            <div id="dinamic7${e}" style="vertical-align:middle !important" class="dinamic7 nadis">
                                <input type="text" name="dokter_resusitasi[]" id="dokter-resusitasi${e}" class="dokter-resusitasi mb-2" value="${v.id_nadis}">
                                <button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeDokterResusitasi(${e})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
                            </div>
                        `;
						$('#dokter-resusitasi').append(html)
						let html_hide = /* html */ `
                            <input type="text" name="dokter_resusitasi_before[]" id="dokter-resusitasi-before${a}" class="dokter-resusitasi mb-2" value="${v.nadis}">
                        `;
						$('#dokter-resusitasi-hide').append(html_hide)
						$('#dokter-resusitasi' + e).select2c({
							ajax: {
								url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
								dataType: 'json',
								quietMillis: 100,
								data: function(term, page) { // page is the one-based page number tracked by Select2
									return {
										q: term, //search term
										jenis: 'spesialis_anak',
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
						$('#s2id_dokter-resusitasi' + e + ' a .select2c-chosen').html(v.nadis)
						e++;
					}
				})
			},
			complete: function() {
				hideLoader()
			}
		})

	}

	function loadDataBHPOperasi(id_operasi) {
		$('#table-bhp2 tbody').empty()
		$.ajax({
			type: 'GET',
			url: '<?= base_url("order_operasi/api/order_operasi/get_bhp_tambahan_operasi") ?>',
			data: 'id=' + id_operasi,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if (data.total !== null) {
					$('#cektotal').val(data.total.total)
				}
				let no = 1;
				$.each(data.list, function(i, v) {
					let html = /* html */ `
                        <tr class="rows">
                            <td class="center">${i + 1}</td>
                            <td>${v.nama_barang}</td>
                            <td><span id="nama-kemasan${no}">${v.kemasan}</span></td>
                            <td class="center">${v.qty}</td>
                            <td><span id="sisa${no}"><i></i></span></td>
                            <td class="right" id="hargajual${no}">${money_format(v.harga_jual)}</td>
                            <td class="right"><span id="diskonrp${no}">${money_format(v.disc_rp)}</span><input type="hidden" name="diskon_rp[]" id="diskon-rp${no}" class="diskon-rp" value="${money_format(v.disc_rp)}"></td>
                            <td class="right" id="subtotal${no}">${money_format(roundToTwo(v.harga_jual - v.disc_rp) * v.qty)}</td>
                            <td class="center"><button type="button" class="btn btn-danger btn-xs" onclick="removeThisBHP(this, ${v.id_detail_penjualan}, ${v.id_operasi})"><i class="fas fa-trash-alt"></i></button></td>
                        </tr>
                    `;
					$('#table-bhp2 tbody').append(html)
					no++;
				})
				hitungEstimasi()
			},
			complete: function() {
				hideLoader()
			}
		})
	}

	// function cetakLaporanOperasi(id_layanan_pendaftaran) {
	// 	$.ajax({
	// 		type: 'GET',
	// 		url: '<?= base_url('order_operasi/api/order_operasi/laporan_operasi') ?>/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
	// 		cache: false,
	// 		dataType: 'JSON',
	// 		beforeSend: function () {
	// 			showLoader();
	// 		},
	// 		success: function (data) {

	// 			// Set all values first
	// 			resetModalLaporanOperasi();

	// 			// Set values in Penolakan Tindakan Kedokteran modal
	// 			$('#modal-laporan-operasi-title').html(`<b>Form Laporan Operasi</b> | No. RM: ${data.pendaftaran_detail.pasien.id_pasien}, Nama: ${data.pendaftaran_detail.pasien.nama}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data.pendaftaran_detail.pasien.telp}</b></i>`);
	// 			$('#id-layanan-pendaftaran-lap-operasi').val(id_layanan_pendaftaran);
	// 			if (data.laporan_operasi) {
	// 				$('#diagnosa-pra-bedah').val((data.laporan_operasi.diagnosa_pra_bedah = null ? "" : data.laporan_operasi.diagnosa_pra_bedah));
	// 				$('#diagnosa-pasca-bedah').val(data.laporan_operasi.diagnosa_pasca_bedah);
	// 				$('#prosedur-operasi').val(data.laporan_operasi.prosedur_operasi);
	// 				$('#lainnya-operasi').val(data.laporan_operasi.pemeriksaan_specimen_lain);
	// 				$('#komplikasi-operasi').val(data.laporan_operasi.komplikasi);
	// 				$('#jumlah-darah-operasi').val(data.laporan_operasi.jumlah_darah_hilang);
	// 				$('#jenis-jumlah-operasi').val(data.laporan_operasi.jenis_jumlah);
	// 				$('#jaringan-eksisi-operasi').val(data.laporan_operasi.jaringan_eksisi);
	// 				$('#laporan-tanggal-operasi').val(datefmysql(data.laporan_operasi.tanggal_operasi));

	// 				$('#laporan-jam-mulai-operasi').val(data.laporan_operasi.mulai_waktu_operasi);
	// 				$('#laporan-jam-selesai-operasi').val(data.laporan_operasi.selesai_waktu_operasi);
	// 				$('#laporan-durasi-operasi').val(data.laporan_operasi.waktu_operasi);
	// 				$('#asisten-operasi').val(data.laporan_operasi.id_asisten);
	// 				$('#insumentator-operasi').val(data.laporan_operasi.id_instrumentator);
	// 				$('#sirkuler-operasi').val(data.laporan_operasi.id_sirkuler);
	// 				$('#laporan-catatan-operasi').val(data.laporan_operasi.catatan);

	// 				$('#laporan-dokter-bedah-operasi').val(data.laporan_operasi.id_dokter_bedah);
	// 				$('#s2id_laporan-dokter-bedah-operasi a .select2c-chosen').html(data.laporan_operasi.nama_dokter);

	// 				$('#asisten-operasi').val(data.laporan_operasi.id_asisten);
	// 				$('#s2id_asisten-operasi a .select2c-chosen').html(data.laporan_operasi.nama_dokter);

	// 				$('#insumentator-operasi').val(data.laporan_operasi.id_instrumentator);
	// 				$('#s2id_insumentator-operasi a .select2c-chosen').html(data.laporan_operasi.instrumentator);

	// 				$('#sirkuler-operasi').val(data.laporan_operasi.id_sirkuler);
	// 				$('#s2id_sirkuler-operasi a .select2c-chosen').html(data.laporan_operasi.sirkuler);


	// 				if (data.laporan_operasi.pemeriksaan_specimen == 'Tidak') {
	// 					document.getElementById("tidak-operasi").checked = true;
	// 				} else if (data.laporan_operasi.pemeriksaan_specimen == 'PA') {
	// 					document.getElementById("pa-operasi").checked = true;
	// 				} else if (data.laporan_operasi.pemeriksaan_specimen == 'Kultur') {
	// 					document.getElementById("kultur-operasi").checked = true;
	// 				} else if (data.laporan_operasi.pemeriksaan_specimen == 'Sitologi') {
	// 					document.getElementById("sitologi-operasi").checked = true;
	// 				} else if (data.laporan_operasi.pemeriksaan_specimen == 'Lainnya') {
	// 					document.getElementById("specimen-lainnya").checked = true;
	// 				}

	// 				if (data.laporan_operasi.golongan_operasi == 'Kecil') {
	// 					document.getElementById("golongan-operasi-kecil").checked = true;
	// 				} else if (data.laporan_operasi.golongan_operasi == 'Khusus') {
	// 					document.getElementById("golongan-operasi-khusus").checked = true;
	// 				} else if (data.laporan_operasi.golongan_operasi == 'Sedang') {
	// 					document.getElementById("golongan-operasi-sedang").checked = true;
	// 				} else if (data.laporan_operasi.golongan_operasi == 'Besar') {
	// 					document.getElementById("golongan-operasi-besar").checked = true;
	// 				}

	// 				if (data.laporan_operasi.kategori_operasi == 'Cito') {
	// 					document.getElementById("kategori-operasi-cito").checked = true;
	// 				} else if (data.laporan_operasi.kategori_operasi == 'Elektif') {
	// 					document.getElementById("kategori-operasi-elektif").checked = true;
	// 				}

	// 				if (data.laporan_operasi.transfusi == 'Ya') {
	// 					document.getElementById("tranfusi-operasi-ya").checked = true;
	// 				} else if (data.laporan_operasi.transfusi == 'Tidak') {
	// 					document.getElementById("tranfusi-operasi-tidak").checked = true;
	// 				}

	// 				if (data.laporan_operasi.pemasangan_implan == 'Ya') {
	// 					document.getElementById("pemasangan-implan-operasi-ya").checked = true;
	// 				} else if (data.laporan_operasi.pemasangan_implan == 'Tidak') {
	// 					document.getElementById("pemasangan-implan-operasi-tidak").checked = true;
	// 				}

	// 				if (data.laporan_operasi.jenis_anestesi == 'Regional') {
	// 					document.getElementById("regional-operasi").checked = true;
	// 				} else if (data.laporan_operasi.jenis_anestesi == 'General') {
	// 					document.getElementById("general-operasi").checked = true;
	// 				} else if (data.laporan_operasi.jenis_anestesi == 'Lokal') {
	// 					document.getElementById("lokal-operasi").checked = true;
	// 				}

	// 				if (data.laporan_operasi.jenis_operasi == 'Bersih') {
	// 					document.getElementById("bersih-operasi").checked = true;
	// 				} else if (data.laporan_operasi.jenis_operasi == 'Bersih Terkontaminasi') {
	// 					document.getElementById("bersih-kontra-operasi").checked = true;
	// 				} else if (data.laporan_operasi.jenis_operasi == 'Kotor') {
	// 					document.getElementById("kotor-operasi").checked = true;
	// 				}
	// 			}


	// 			$('#modal_laporan_operasi').modal('show');
	// 		},
	// 		complete: function () {
	// 			hideLoader();
	// 		},
	// 		error: function (e) {
	// 			accessFailed(e.status);
	// 		}
	// 	});
	// }

	// function resetModalLaporanOperasi() {
	// 	$('#diagnosa-pra-bedah').val('');
	// 	$('#diagnosa-pasca-bedah').val('');
	// 	$('#prosedur-operasi').val('');
	// 	$('#lainnya-operasi').val('');
	// 	$('#komplikasi-operasi').val('');
	// 	$('#jumlah-darah-operasi').val('');
	// 	$('#jenis-jumlah-operasi').val('');
	// 	$('#jaringan-eksisi-operasi').val('');
	// 	$('#laporan-tanggal-operasi').val('');

	// 	$('#laporan-jam-mulai-operasi').val('');
	// 	$('#laporan-jam-selesai-operasi').val('');
	// 	$('#laporan-durasi-operasi').val('');
	// 	$('#asisten-operasi').val('');
	// 	$('#insumentator-operasi').val('');
	// 	$('#sirkuler-operasi').val('');
	// 	$('#laporan-catatan-operasi').val('');

	// 	$('#laporan-dokter-bedah-operasi').val('');
	// 	$('#s2id_laporan-dokter-bedah-operasi a .select2c-chosen').html('Silahkan Pilih..');

	// 	$('#asisten-operasi').val('')
	// 	$('#s2id_asisten-operasi a .select2c-chosen').html('Silahkan Pilih..');

	// 	$('#insumentator-operasi').val('');
	// 	$('#s2id_insumentator-operasi a .select2c-chosen').html('Silahkan Pilih..');

	// 	$('#sirkuler-operasi').val('');
	// 	$('#s2id_sirkuler-operasi a .select2c-chosen').html('Silahkan Pilih..');

	// 	document.getElementById("tidak-operasi").checked = false;
	// 	document.getElementById("pa-operasi").checked = false;
	// 	document.getElementById("kultur-operasi").checked = false;
	// 	document.getElementById("sitologi-operasi").checked = false;
	// 	document.getElementById("specimen-lainnya").checked = false;


	// 	document.getElementById("golongan-operasi-kecil").checked = false;
	// 	document.getElementById("golongan-operasi-khusus").checked = false;
	// 	document.getElementById("golongan-operasi-sedang").checked = false;
	// 	document.getElementById("golongan-operasi-besar").checked = false;

	// 	document.getElementById("kategori-operasi-cito").checked = false;
	// 	document.getElementById("kategori-operasi-elektif").checked = false;

	// 	document.getElementById("tranfusi-operasi-ya").checked = false;
	// 	document.getElementById("tranfusi-operasi-tidak").checked = false;

	// 	document.getElementById("pemasangan-implan-operasi-ya").checked = false;
	// 	document.getElementById("pemasangan-implan-operasi-tidak").checked = false;

	// 	document.getElementById("regional-operasi").checked = false;
	// 	document.getElementById("general-operasi").checked = false;
	// 	document.getElementById("lokal-operasi").checked = false;

	// 	document.getElementById("bersih-operasi").checked = false;
	// 	document.getElementById("bersih-kontra-operasi").checked = false;
	// 	document.getElementById("kotor-operasi").checked = false;

	// }
</script>