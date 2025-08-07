<script>
	var klik = null;
	(function($) {
		$.fn.delayKeyup = function(callback, ms) {
			var timer = 0;
			$(this).keyup(function() {
				clearTimeout(timer);
				timer = setTimeout(callback, ms);
			});
			return $(this);
		};
	})(jQuery);

	$(function() {
		$('input[name=tanggal_resep]').attr('id', 'tanggal_resep');
		getListResep(1);

		$('#bangsal').change(function() {
			getListResep(1);
		});

		$('#keyword').delayKeyup(function() {
			getListResep(1);
		}, 800);

		$('#btn-search').click(function() {
			$('#keyword').val('');
			$('#modal-search').modal('show');
		});

		$('#modal-search').on('shown.bs.modal', function() {
			setTimeout(function() {
				$('#nama-search').focus();
			}, 100);
		});

		$('#btn-reload').click(function() {
			$('#keyword').focus();
			resetForm();
			getListResep(1);
		});

		$('#no-rm-search, #nama-search').keyup(function(e) {
			if (e.keyCode === 13) {
				getListResep(1);
			}
			if (e.keyCode === 16) {
				getListResep(1);
			}
		});

		$("#tanggal-awal, #tanggal-akhir").datepicker({
			format: 'dd/mm/yyyy'
		}).on('changeDate', function() {
			$(this).datepicker('hide');
		});

		$('body').on('click', function(e) {
			$('[data-toggle=popover]').each(function() {
				// hide any open popovers when the anywhere else in the body is clicked
				if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
					$(this).popover('hide');
				}
			});
		});

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
	});

	function resetForm() {
		$('a .select2c-chosen').html('');
		$('#bhp-label').html('-');
		$('input[type=text], input[type=hidden], select, textarea').val('');
		$('#tanggal-awal, #tanggal-akhir').val('<?= date("d/m/Y") ?>');
	}

	function getListResep(p, id_layanan_pendaftaran) {
		$('#page-now').val(p);
		let id = '';
		if (id_layanan_pendaftaran !== undefined) {
			id = id_layanan_pendaftaran;
		}

		$.ajax({
			type: 'GET',
			url: '<?= base_url("resep_ranap/api/resep_ranap/get_list_resep_ranap") ?>/page/' + p + '/jenis/Rawat Inap/id/' + id,
			data: $('#form-search').serialize() + '&keyword=' + $('#keyword').val() + '&bangsal=' + $('#bangsal').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				if ((p > 1) & (data.data.length === 0)) {
					getListResep(p - 1);
					return false;
				}

				$('#pagination-ranap').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#page-summary-ranap').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

				$('#table-data tbody').empty();
				$.each(data.data, function(i, v) {
					let html = '';
					let status = '';
					let disable = '';
					let disableTe = '';
					let status_resep = '';
					if (v.list_resep.length === 0) {
						status = '<span class="blinker"><i><i class="fas fa-spinner fa-spin mr-1"></i>Belum</i></span>';
					} else {
						status = '<h5><span class="label label-success"><i class="fas fa-thumbs-up mr-1"></i>Sudah</span></h5>';
					}

					if (v.status_terlayani === 'Batal') {
						disable = 'disabled';
					}

					if (v.tindak_lanjut !== null && v.tindak_lanjut !== 'cco sementara' && v.tindak_lanjut !== 'cco sementara it' || v.status_terlayani === 'Batal') {
						disableTe = 'disabled';
					}


					let detail = v.id + '#' + v.id_pasien + '#' + v.nama + '#' + v.dokter + '#' + v.id_dokter + '#' + hitungUmur(v.tanggal_lahir) + '#' + v.jenis_layanan + '#' + v.id_penjamin + '#' + v.penjamin + '#' + v.cara_bayar + '#' + v.telp + '#resep';

					let tanggal = [];
					$.each(v.list_resep, function(k, nil) {
						var hasil = /* html */ `
                            <span style='margin-bottom:2px; display:inline-block;'>&checkmark; Resep Tanggal: ${datetimefmysql(nil.tanggal_resep)} 
                                <button class='btn btn-success btn-xs' onclick='cetakBuktiPelayanan(${nil.id_resep}, 1)'><i class='fas fa-print mr-1'></i>Nota</button> 
                                <button class='btn btn-warning btn-xs' onclick='cetakSemuaEtiket(${nil.id_resep_tebus})'><i class='fas fa-copy mr-1'></i>Etiket</button>
                            </span>
                        `;
						tanggal.push(hasil);
					});

					let edit = [];
					$.each(v.list_resep, function(k, nil) {
						let btn = 'btn-success';
						let icon = 'fa-check-circle';
						if (nil.resp_diterima === null) {
							btn = 'btn-info';
							icon = 'fa-clock-o';
						}
						let hasil = /* html */ `
                            <span style='margin-bottom:2px; display:inline-block;'>&checkmark; Resep Tanggal: ${datetimefmysql(nil.tanggal_resep)}
                                <button class='btn btn-secondary btn-xs' onclick='editResep(${nil.id_resep}, 1)'><i class='fas fa-edit mr-1'></i>Edit</button>
                                <button class='btn btn-danger btn-xs' onclick='deleteResep(${nil.id}, ${data.page})'><i class='fas fa-trash-alt mr-1'></i>Delete</button>
                            </span>
                        `;
						edit.push(hasil);
					});

					html = /* html */ `
                        <tr>
                            <td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
                            <td>${((v.tanggal_daftar !== null) ? datefmysql(v.tanggal_daftar) : '')}</td>
                            <td>${v.id_pasien}</td>
                            <td>${v.nama}</td>
                            <td><small>${v.alamat}</small></td>
                            <td>${v.jenis_layanan}</td>
                            <td>${v.bed}</td>
                            <td>${v.dokter}</td>
                            <td class="nowrap">${((v.cara_bayar === 'Tunai') ? 'Umum' : v.penjamin)}</td>
                            <td class="nowrap">${status}</td>
							<td class="center">${v.tindak_lanjut !== null ? v.tindak_lanjut : '-'}</td>
                            <td class="right nowrap">`;
					if (v.list_resep.length === 0) {
						html += /* html */ `
                                        <button ${disableTe} type="button" class="btn btn-secondary btn-xs" title="Klik untuk input resep" onclick="inputResep('${detail}')">
                                            <i class="fas fa-plus-circle"></i>
                                        </button>
                                    `;
					}

					if (v.list_resep.length >= 1) {
						html += /* html */ `
                                        <button ${disableTe} type="button" class="btn btn-secondary btn-xs" title="Klik untuk input resep" onclick="inputResep('${detail}')">
                                            <i class="fas fa-plus-circle"></i>
                                        </button>
                                    `;
						html += /* html */ `
                                        <button ${disableTe} type="button" class="btn btn-secondary btn-xs" title="Klik untuk edit resep" data-trigger="focus" data-toggle="popover" data-content="${edit.join(' <br/>')}"><i class="fas fa-edit"></i></button>
                                    `;
						html += /* html */ `
                                        <button ${disable} type="button" class="btn btn-secondary btn-xs" title="Klik untuk print bukti pelayanan resep" data-trigger="focus" data-toggle="popover" data-content="${tanggal.join(' <br/>')}">
                                            <i class="fas fa-print"></i>
                                        </button>
                                    `;
					}


					html += /* html */ `
                            </td>
                        </tr>
                    `;

					$('#table-data tbody').append(html);
					var options = {
						animation: true,
						html: true,
						sanitize: false,
						placement: function(context, source) {
							var position = $(source).position();
							if (position.left > 515) {
								return "left";
							}
							if (position.left < 515) {
								return "right";
							}
							if (position.top < 110) {
								return "bottom";
							}
							return "top";
						},
						trigger: "click"
					};

					$('[data-toggle="popover"]').popover(options);
				});
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		})
	}

	function paging(p, tab) {
		if (tab === 1) {
			getListResep(p);
		} else {
			getListHistoryResep(p);
		}
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
				// get data current pasien
				$.ajax({
					type: 'GET',
					url: '<?= base_url('pelayanan/api/pelayanan/get_data_layanan_current_pasien') ?>/id/' + data.id_layanan_pendaftaran,
					success: function(data) {
						if(data.tindak_lanjut === 'cco sementara'){
							$('#form-resep').hide();
							$('#data-resep').children().click()
							swalAlert('info', 'Info', 'Jika ingin menambah resep, silahkan hubungi <b>Kasir</b>');
						}
					}
				});
				$('#modal-form-resep-label').html(`
                    <b>Form Resep Rawat Inap ${title_mode}</b> | No. RM : ${data.id_pasien}, Nama: ${data.pasien}, 
                    <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data.telp}</b></i></span>
                `);
				$('#modal-form-resep').modal('show');
				const $terapiPulang = $('#is-terapi-pulang');
				if(data.is_terapi_pulang === '1'){
					$terapiPulang.prop('checked', true);
				} else {
					$terapiPulang.prop('checked', false);
				}
				$terapiPulang.prop('disabled', true).parent().parent().parent().show()

				$('#list-resep').html('');
				if (edit > 0) {
					$('#no-resep, #id').val(id);
					$('#id-pk').val(data.id_layanan_pendaftaran);
				} else {
					$('#no-resep, #id').val('');
					$('#salin-resep').show();
				}

				$('#dokterhide').val(data.id_dokter);
				$('#s2id_dokterhide a .select2c-chosen').html(data.dokter);
				$('#pasien-auto').html(data.id_pasien + ' / ' + data.pasien);
				$('#pasienhide').val(data.id_pasien);
				$('#dokterhide').val(data.id_dokter);
				$('#usia-pasien').html(hitungUmur(data.tanggal_lahir));
				$('#jenis-pk').html(data.jenis_layanan);
				$('#penjamin-pasien').html(data.penjamin);
				$('#jasa').val(money_format(data.toeslag));
				$('#tanggal-resep-label').html(datetimefmysql(data.tanggal_resep));

				$('#no-r').val(data.resep_r.length + 1);

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
                            <div id="table-list-resep${v.no_r}" class="input-resep" style="width: 100%; display: flex; flex-direction: column; gap:.5rem">
								<div style="display: flex;gap: 1rem; justify-content: space-between">
									<div style="display: flex;gap: 1rem;align-items: center">
										<strong id="nomor-r${v.no_r}">R/${v.no_r}</strong>
										<label for="is-racik${v.no_r}" style="display: flex; gap:.3rem;">
											<input
												type="hidden"
												name="is_racik${v.no_r}"
												id="is-racik${v.no_r}"
												title="Apakah ini resep racikan?"
												class="check-is-racik"
												value="${v.is_racik}"
											>
											<div style="display: flex; align-items: center; gap: .5rem">
												Racikan ${v.is_racik !== '1' ? `<i class="fas fa-times-circle"></i>` : `<i class="fas fa-check-circle"></i>`}
											</div>
										</label>
										|
										<div id="cara-buat-r${v.no_r}" style="display: flex; gap:0.4rem">
											<div>${v.cara_pembuatan}</div>
											<div>|</div>
											<span style="display: flex; gap: .2rem">Permintaan <input id="jp${v.no_r}" class="jp custom-form" type="number" name="jp${v.no_r}" value="${parseInt(v.resep_r_jumlah)}" onkeypress="return hanyaAngka(event)" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></span>
											<div>|</div>
											<div>${v.aturan_pakai_manual == 1 ? v.ket_aturan_pakai_manual : v.aturan_pakai}</div>
											<div>|</div>
											<div>${v.admin_time}</div>
										</div>
										|
										<div class="jam-pemberian-input jpi${v.no_r}">
										</div>
										<button type="button" class="btn btn-info btn-xs jam-pemberian ${data.is_terapi_pulang === '0' ? 'hide': ''}">
											<i class="fas fa-plus"></i> Jam pemberian
										</button>
										<button type="button" title="Klik untuk hapus R /" class="btn btn-secondary btn-xs" onclick="removeREdit($(this));"><i class="fas fa-trash-alt"></i> Delete R /</button>
									</div>

									${v.is_racik !== '1' ? '' : /* html */ `
										<label for="sediaan${v.no_r}" class="sediaan" style="display: flex; gap:.3rem;align-items: center;">
											Sediaan:
											<input type="text" name="sediaan${v.no_r}" id="sediaan${v.no_r}" class="sediaan_auto select2c-input">
										</label>
									`}
								</div>
								<div style="display: inline-flex;margin-left: 12px;" class="kr">
									<b>Keterangan : </b>
									<input type="text" name="keterangan_resep${v.no_r}" id="keterangan_resep${v.no_r}" style="width:300px;margin-left:5px" class="custom-form" value="${v.keterangan_resep ? v.keterangan_resep : ''}">
								</div>
								<div class="tr-row" style="display: flex; flex-direction: column;">
								</div>
							</div>
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
							// let listResep = /* html */ `
							//     <tr class="tr-rows${v.no_r}">
							//         <td width="50%" style="padding-left:20px">
							//             <span class="brg"><input type=hidden name="id_barang${v.no_r}[]" id="id-barang${v.no_r}${i}" class="barang" value="${val.id_barang}"></span>
							//             <span class="krs"><input type=hidden name="obatkronis${v.no_r}[]" id="obatkronis${v.no_r}${i}" class="barang" value="${val.kronis}"></span>
							//             ${val.nama_barang}&nbsp;${obatkronistxt}
							//         </td>
							//         <td width="20%" class="center">
							//             Dosis Racik
							//             <input class="jmlpakai custom-form" type="text" value="${val.dosis_racik}" style="width:50px; display:unset;" onkeypress="return hanyaAngka(event)" readonly>
							//         </td>
							//         <td width="20%" class="center">
							//             Jml Pakai
							//             <input class="jmlpakai custom-form" type="text" name="jmlpakai${v.no_r}[]" id="jmlpakai${v.no_r}${i}" value="${val.jumlah_pakai}" style="width:50px; display:unset;" data-jual_harga="${val.jual_harga}" data-id="${val.id}" onchange="chRDetail($(this))" onkeypress="return hanyaAngka(event)">
							//         </td>
							//         <td width="10%" class="right">
							//             <input type=hidden name="dosisracik${v.no_r}[]" id="dosisracik${v.no_r}${i}" value="${val.dosis_racik}">
							//             <span id="hb-${val.id}" class="harga-barang">${money_format(precise_round(val.jumlah_pakai * val.jual_harga, 2))}</span>
							//         </td>
							//         <td width="5%" class="right">
							//             <button type="button" title="Klik untuk hapus" class="btn btn-secondary btn-xs" onclick="removeElement(${v.no_r}, this)"><i class="fas fa-times-circle"></i></button>
							//             <input type=hidden name="jmldetail${v.no_r}" id="jmldetail${v.no_r}${i}" class="jmldetail" value="${v.no_r}">
							//         </td>
							//     </tr>
							// `;
							let listResep = /* html */ `
								<div class="tr-rows${v.no_r}" style="width:100%">
									<div style="display: flex; justify-content: space-between; margin-left: 1.5rem">
										<span class="brg" style="display: none"><input type=hidden name="id_barang${v.no_r}[]" id="id-barang${v.no_r}${i}" class="barang" value="${val.id_barang}"></span>
										<span class="krs" style="display: none"><input type=hidden name="obatkronis${v.no_r}[]" id="obatkronis${v.no_r}${i}" class="obat-kronis" value="${val.kronis}"></span>
										<p>
											${val.nama_barang}&nbsp;${obatkronistxt}
											<input type="hidden" class="kekuatan-obat" id="kekuatan${v.no_r}${i}" value="${val.kekuatan}"/>
											<input type="hidden" class="harga-jual-barang" id="harga-jual-barang${v.no_r}${i}" value="${val.jual_harga}"/>
											<input type="hidden" class="sisa-stok" id="sisa-stok${v.no_r}${i}" value="${val.stok_akhir}"/>
										</p>
										<div style="display: flex; justify-content: space-between; align-items: center; gap: 2.4rem">
											<div style="display: flex; gap:.5rem">
												Dosis Racik
												<input class="dosisracik custom-form" type="text" name="dosisracik${v.no_r}[]" id="dosisracik${v.no_r}${i}" value="${val.dosis_racik}" style="width:50px; display:unset;" onkeypress="return hanyaAngka(event)" readonly>
												${val.satuan_kekuatan}
											</div>
											<div style="display: flex; gap:.5rem; align-items: center">
												Jml Pakai
												<input class="jmlpakai custom-form" type="text" name="jmlpakai${v.no_r}[]" id="jmlpakai${v.no_r}${i}" value="${val.jumlah_pakai}" style="width:50px; display:unset;" data-jual_harga="${val.jual_harga}" data-id="${v.no_r}${i}n" onchange="chRDetail($(this))" onkeypress="return hanyaAngka(event)">
											</div>
											<div style="display: flex; gap:.5rem">
												<span id="hb-${v.no_r}${i}n" class="harga-barang">${money_format(precise_round(val.jumlah_pakai * val.jual_harga, 2))}</span>
											</div>
											<div style="display: flex; gap:.2rem">
												<button type="button" title="Klik untuk hapus" class="btn btn-secondary btn-xs" onclick="removeElement(${v.no_r}, $(this))"><i class="fas fa-times-circle"></i></button>
												<input type=hidden name="jmldetail${v.no_r}[]" id="jmldetail${v.no_r}${i}" class="jmldetail" value="${v.no_r}">
											</div>
										</div>
									</div>
								</div>
							`;

							$('#table-list-resep' + v.no_r + ' .tr-row').append(listResep);
							subtotal = subtotal + (val.jumlah_pakai * val.jual_harga);
						}
					});

					sediaanAuto(v.no_r);
					$(`#sediaan${v.no_r}`).val(v.id_sediaan)
					$(`#s2id_sediaan${v.no_r} a .select2c-chosen`).html(v.nama_sediaan);

					if(data.is_terapi_pulang === '1'){
						const $jpi = $(`.jpi${v.no_r}`)
						for(let i = 1; i <= 6; i++){
							if(v[`jam_pemberian_${i}`]){
								const input = `
									<input type="text" name="jam_pemberian_${i}${v.no_r}" id="jam-pemberian-${i}${v.no_r}" class="custom-form clear-input d-inline-block input-jam-pemberian-resep-r" style="width: 50px" placeholder="jam ${i}" value="${v[`jam_pemberian_${i}`]}">
								`;
								$jpi.append(input);

								$(`#jam-pemberian-${i}${v.no_r}`).on('click', function() {
									$(this).timepicker({
										format: 'HH:mm',
										showInputs: false,
										showMeridian: false
									});
								})
							}
						}
					}

					$('.jam-pemberian').on('click', function(){
						const $this = $(this);
						const jamPemberianInputContainer = $this.siblings('.jam-pemberian-input')
						const length = jamPemberianInputContainer.children().length + 1;

						if(length > 6){
							return false;
						}

						const input = `
							<input type="text" name="jam_pemberian_${length}${v.no_r}" id="jam-pemberian-${length}${v.no_r}" class="custom-form clear-input d-inline-block input-jam-pemberian-resep-r" style="width: 50px" placeholder="jam ${length}">
						`;

						jamPemberianInputContainer.append(input);

						$(`#jam-pemberian-${length}${v.no_r}`).on('click', function() {
							$(this).timepicker({
								format: 'HH:mm',
								showInputs: false,
								showMeridian: false
							});
						})
					})

					$(`#jp${v.no_r}`).on('keyup', function() {
						let permintaan = parseInt($(this).val());
						$(this).parent().parent().parent().parent().siblings('table').find(`#jt${v.no_r}`).val(permintaan)

						$(this)
							.parent()
							.parent()
							.parent()
							.parent()
							.siblings('.tr-row')
							.children()
							.each(function(index, element) {
								const dose = `#dosisracik${v.no_r}${index}`;
								const strength = `#kekuatan${v.no_r}${index}`;
								const price = `#harga-jual-barang${v.no_r}${index}`;
								const usedAmount = `#jmlpakai${v.no_r}${index}`;
								const salePrice = `#hb-${v.no_r}${index}n`;

								if (permintaan) {
									const dosisRacik = parseFloat($(element).find(dose).val());
									const kekuatan = parseFloat($(element).find(strength).val()) || permintaan;
									const hargaJualBarang = parseFloat($(element).find(price).val());
									const sisaStok = parseInt($(`#sisa-stok${v.no_r}${index}`).val())

									const jumlahPakai = (dosisRacik * permintaan) / kekuatan;
									const hargaJual = roundToTwo(jumlahPakai * hargaJualBarang);

									if (jumlahPakai > sisaStok) {
										syams_validation(`#jmlpakai${v.no_r}${index}`, 'Sisa stok tidak cukup! sisa stok : ' + $(`#sisa-stok${v.no_r}${index}`).val());
									} else {
										syams_validation_remove(`#jmlpakai${v.no_r}${index}`);
									}

									$(element).find(usedAmount).val(roundToTwo(jumlahPakai));
									$(element).find(salePrice).html(money_format(hargaJual));
								} else {
									$(element).find(usedAmount).val(0);
									$(element).find(salePrice).html(0.00);
								}
							});

						totalHargaBarang()
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

	function deleteResep(id_penjualan, page) {
		swal.fire({
			title: 'Konfirmasi Hapus',
			html: "Apakah anda yakin akan menghapus data ini ?",
			icon: 'question',
			showCancelButton: true,
			buttonsStyling: true,
			confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Ya',
			cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'DELETE',
					url: '<?= base_url('pelayanan/api/pelayanan/delete_penjualan') ?>/id/' + id_penjualan,
					beforeSend: function() {
						showLoader();
					},
					success: function(data) {
						if (data.status === true) {
							messageDeleteSuccess();
							getListResep(page);
						} else {
							messageDeleteFailed();
						}

						$('[data-toggle="popover"]').popover('hide');
					},
					complete: function() {
						hideLoader();
					}
				})
			}
		})
	}

	function cetakBuktiPelayanan(id_resep, pengambilan_ke) {
		let wWidth = $(window).width();
		let dWidth = wWidth * 1;
		let wHeight = $(window).height();
		let dHeight = wHeight * 1;
		let x = screen.width / 2 - dWidth / 2;
		let y = screen.height / 2 - dHeight / 2;
		window.open('<?= base_url('resep/printing_bukti_pelayanan_obat') ?>/' + id_resep + '/' + pengambilan_ke, 'Cetak Bukti Resep Rawat Jalan', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
	}

	function cetakSemuaEtiket(id_resep) {
		let wWidth = $(window).width();
		let dWidth = wWidth * 1;
		let wHeight = $(window).height();
		let dHeight = wHeight * 1;
		let x = screen.width / 2 - dWidth / 2;
		let y = screen.height / 2 - dHeight / 2;
		window.open('<?= base_url('resep/printing_all_etiket') ?>/' + id_resep, 'Cetak All Etiket', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
	}
</script>