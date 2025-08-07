<script>
	var klik = null;
	$(function() {
		$.fn.modal.Constructor.prototype._enforceFocus = function() {};
		$('#modal-form-resep').on('shown.bs.modal', function() {
			setTimeout(() => {
				$('#is-terapi-pulang').prop('checked', false);
			}, 100)
		});
		
		let options = {
			html: true,
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
		}

		$('.jenis_resep').on('click', function() {
			resetInputResep();

			if ($('#list-resep .wrap').length > 0 && $(this).val() === '0' && !$(this).hasClass('btn-info')) {
				const currentNoR = $('#no-r').val();
				const addNoR = $('#list-resep .wrap').length + 1;
				$('#no-r').val(addNoR);
			}

			$('.jenis_resep').removeClass('btn-info').addClass('btn-secondary');
			$(this).removeClass('btn-secondary').addClass('btn-info');
			$('#load-jam-minum').empty();
			$('#jenis-resep').val($(this).val());
			$('.ket-aturan-pakai-manual').addClass('hide')
			$('.aturanpakai-auto').removeClass('hide')
			$('#aturan-pakai-manual').prop('checked', false);
			$('#ket-aturan-pakai-manual').val('');

			if ($(this).val() === '1') {
				$('#kekuatan').parent().parent().parent().parent().show();
				$('#dosisracik').parent().parent().parent().parent().show();
				// $('#jml-tebus').parent().parent().show();
				// $('#jumlah').parent().parent().show();
				$('#permintaan').parent().parent().hide();
				$('#no-r').prop('readonly', false);
			} else {
				$('#kekuatan').parent().parent().parent().parent().hide();
				$('#dosisracik').parent().parent().parent().parent().hide();
				$('#jml-tebus').parent().parent().hide();
				$('#jumlah').parent().parent().hide();
				$('#permintaan').parent().parent().show();
				$('#no-r').prop('readonly', true);
			}
		});

		$('#btn-cari-resep-history').on('click', function(){
			getListHistoryResep(1);
		})

		// pelarut
		$('#add-pelarut').popover(options);
		updateScroll('list-resep');

		// permintaan
		$('#permintaan').keyup(function() {
			let permintaan = $(this).val();
			$('#jml-tebus').val(permintaan);
		});

		// resep tab
		$('#resep-tab a:first').tab('show');

		// pindah tab data resep
		$('#data-resep').click(function() {
			getListHistoryResep(1);
		});

		// hide info
		$('#info-resep').hide();

		// remove autodate
		$('#remove-autodate').click(function() {
			$('input[name=tanggal_resep]').attr('id', 'tanggal-resep-edit').val('');
			$('#tanggal-resep-edit').datetimepicker({
				format: 'DD/MM/YYYY HH:mm'
			}).on('blur', function() {
				let nilai = $(this).val().split(' ');
				$('#tanggal-resep-label').html(indo_tgl(date2mysql(nilai[0])));
			});
		});

		// enter form-add-resep
		$("#form-add-resep").on('keydown', 'input', function(event) {
			if (event.which === 13) {
				event.preventDefault();
				let $this = $(event.target);
				let index = parseFloat($this.attr('data-index'));
				$('[data-index="' + (index + 1).toString() + '"]').focus();
			}
		});

		// info klik pindah tab data-resep
		$('#klikdisini').click(function() {
			$('#resep-tab a:last').tab('show');
			$('#data-resep').click();
		});

		// open modal focus input no-r
		$('#modal-form-resep').on('shown.bs.modal', function() {
			setTimeout(function() {
				$('#no-r').focus();
				$('#iterasi').val('0');
			}, 100);
		});

		// simpan shorchut
		$('#last-press').keydown(function(e) {
			if (e.keyCode === 9) {
				return false;
			}
		});

		$('input, select, textarea, button').keyup(function(e) {
			if (e.keyCode === 119) {
				if ($('#modal-form-resep').is(':visible')) {
					simpanDataResep();
				}
			}
			return false;
		});

		// simpan shorchut F8
		Mousetrap.bind(['f8'], function() {
			if ($('#modal-form-resep').is(':visible')) {
				simpanDataResep();
			}
			return false;
		});

		//fix modal force focus
		$.fn.modal.Constructor.prototype.enforceFocus = function() {
			var that = this;
			$(document).on('focusin.modal', function(e) {
				if ($(e.target).hasClass('select2c-input')) {
					return true;
				}

				if (that.$element[0] !== e.target && !that.$element.has(e.target).length) {
					that.$element.focus();
				}
			});
		};

		// select2 barang
		$('#barang-auto, #barang-auto-history').select2c({
			minimumInputLength: 3,
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/barang_with_stok2_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2

					var switcher = $('#myonoffswitch').is(':checked');
					if (switcher === true) {
						id_penjamin = $('#id-penjamin-pasien').val();
					} else {
						id_penjamin = '';
					}
					return {
						q: term, //search term
						id_penjamin: id_penjamin,
						cekstok: true,
						jenis_pk: $('#jenis-pk').html(),
						is_farmasi: 'Ya',
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
				var markup = data.nama + ', <br><b>Sisa:</b> ' + data.sisa + ', Harga: Rp.' + money_format(data.harga_jual);
				// var markup = data.nama+', Harga: Rp.'+money_format(data.harga_jual);
				return markup;
			},
			formatSelection: function(data) {
				if (parseFloat(data.sisa) <= 0) {
					$('#s2id_barang-auto a .select2c-chosen').html('');
					$('#barang-auto').val('');
					swalAlert('warning', 'Validasi', '<h4>Stok barang yang kosong tidak dapat digunakan !<h4>');
					return false;
				}
				if (parseFloat(data.sisa) <= 0) {
					$('#kekuatan, #dosisracik, .satuan-kekuatan').val('');
					swalAlert('warning', 'Validasi', 'Barang dengan sisa stok 0 tidak dapat dipilih !');
					return false;
				} else {
					if (data.kekuatan === null || data.kekuatan === '0' || data.kekuatan === '') {
						$('#kekuatan').val('1');
						$('#dosisracik').val('1');
						$('.satuan-kekuatan').html(data.satuan_kekuatan);
						hitungJmlPakai();
						$('#jumlah').focus();
					} else {
						$('#kemasan').focus();
						$('#kekuatan').val(data.kekuatan);
						$('#dosisracik').val(data.kekuatan);
						$('.satuan-kekuatan').html(data.satuan_kekuatan);
						hitungJmlPakai();
						$('#jumlah').focus();
					}
					$('#harga-jual-barang').val(data.harga_jual);
					$('#kategori-barang').val(data.id_kategori);
					$('#adm-r-barang').val(data.roa);

					if (data.id_kategori !== '1') {
						$('#load-jam-minum').empty();
						$('.showhide').hide();
						$('#aturanpakai, #aturanpakai2, #aturanpakai_auto, #timing, #cara-pembuatan').val('');
						$('#iterasi').val('0');
						$('.obkrs').hide();
					} else {
						if (data.roa === 'Topikal' || data.roa === 'Injeksi' || data.roa === 'Infus' || data.roa === 'Rektal') {
							$('#load-jam-minum').empty();
							$('.showhide').hide();
							$('#aturanpakai, #aturanpakai2, #aturanpakai_auto, #timing, #cara-pembuatan').val('');
							$('#iterasi').val('0');
						} else {
							$('.showhide').show();
							var jenis_form_resep = $('#jenis-form-resep').val();
							if (jenis_form_resep === 'Penunjang') {
								$('.aturanpakai-hidden').hide();
							}
						}

						$('.obkrs').show();
					}

					$('#timing').val('PC');
					$('#sisa-stok').val(parseFloat(data.sisa));
					$('#id-sediaan').val(data.id_sediaan);
					return data.nama + ', <b>Sisa:</b> ' + data.sisa;
					// return data.nama;
				}
			}
		});

		$('#iterasi, #cara-pembuatan').keydown(function(e) {
			if (e.keyCode === 13) {
				addToResep();
				$('#no-r').focus();
			}
		});

		// select2 aturan pakai
		$('#aturanpakai-auto').select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/aturan_pakai_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2

					var switcher = $('#myonoffswitch').is(':checked');
					if (switcher === true) {
						id_penjamin = $('#id-penjamin-pasien').val();
					} else {
						id_penjamin = '';
					}
					return {
						q: term, //search term
						page: page, // page number
						id_sediaan: $('#id-sediaan').val()
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
				var markup = data.signa + ' ' + data.keterangan;
				return markup;
			},
			formatSelection: function(data) {
				$('#aturanpakai').val(data.signa);
				$('#aturanpakai2').val(data.keterangan);
				$('#timing').focus();
				dinamicJamMinum(parseFloat(data.jml_pemberian));
				updateCountAturanPakai(data.id)
				return data.signa;
			}
		});

		// remove validation .custom-form
		// $('.custom-form').change(function() {
		//     if($(this).val() !== '') {
		//         syams_validation_remove(this);
		//     }
		// });

		// tambah pelarut klik
		$('#tambahkan-pelarut').on('click', function() {
			var ket = [];
			$(':checkbox').each(function() {
				if ($(this).is(':checked')) {
					var hasil = $(this).val();
					ket.push(hasil);
				}
			});
			$('#keterangan-pelarut').val(ket.join(','));
			$('#label-pelarut').html(ket.join(','));
			$('#add-pelarut').popover('hide');
		});

		$('#aturan-pakai-manual').on('change', async function() {
			if ($(this).is(':checked')) {
				$('.ket-aturan-pakai-manual').removeClass('hide')
				$('.aturanpakai-auto').addClass('hide')
				$('#load-jam-minum').empty().append(`<button type="button" class="btn btn-xs btn-info mb-1" id="btn-tambah-waktu-pemberian" onclick="tambahJamMinum()"><i class="fas fa-plus mr-1"></i>Tambah</button>`);
			
				let i = $('.load-jam-minum').length;

				const response = await fetch('<?= base_url('pelayanan/api/pelayanan_auto/waktu_pemberian_auto') ?>' + '?waktu_pemberian=1')
				const waktuPemberian = await response.json()

				let html = /* html */ `
					<div id="dinamic${i}" class="dinamic load-jam-minum">
						<select id="admintime${i}" onchange="change_time(${i});" class="custom-form admintime" style="width:70px; float:left; margin-right:3px; margin-bottom:3px;">
				`;
				waktuPemberian.forEach(item => {
					html += `<option value="${item.kode}">${item.timing}</option>`
				})

				html += `</select>
					<button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeAdmintime(${i})"><i class="fas fa-trash-alt"></i></button>
				</div>`;
				$('#load-jam-minum').append(html);
				$('#admintime0').prop('selectedIndex', 3);
			} else {
				$('.ket-aturan-pakai-manual').addClass('hide')
				$('.aturanpakai-auto').removeClass('hide')
				$('#load-jam-minum').empty()
			}
		})
	});

	async function tambahJamMinum() {
		let i = $('.load-jam-minum').length;

		if (i > 3) return;

		const response = await fetch('<?= base_url('pelayanan/api/pelayanan_auto/waktu_pemberian_auto') ?>' + '?waktu_pemberian=1')
		const waktuPemberian = await response.json()

		let html = /* html */ `
			<div id="dinamic${i}" class="dinamic load-jam-minum">
				<select id="admintime${i}" onchange="change_time(${i});" class="custom-form admintime" style="width:70px; float:left; margin-right:3px; margin-bottom:3px;">
		`;
		waktuPemberian.forEach(item => {
			html += `<option value="${item.kode}">${item.timing}</option>`
		})

		html += `</select>
				<button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeAdmintime(${i})"><i class="fas fa-trash-alt"></i></button>
			</div>`;
		$('#load-jam-minum').append(html);

		$('#admintime0').prop('selectedIndex', 3);
		$('#admintime1').prop('selectedIndex', 0);
		$('#admintime2').prop('selectedIndex', 1);
		$('#admintime3').prop('selectedIndex', 2);
	}

	function removeAdmintime(i) {
		$('#dinamic' + i).remove()
		var jml = $('.load-jam-minum').length;
		var urut = 0;
		for (j = 0; j <= jml - 1; j++) {
			$('.dinamic:eq(' + urut + ')').attr('id', 'dinamic' + j)
			$('.dinamic:eq(' + urut + ')').children('.load-jam-minum').attr('id', 'admintime' + j)
			$('.dinamic:eq(' + urut + ')').children('button').attr('onclick', 'removeAdmintime(' + j + ')')
			urut++;
		}
	}

	async function dinamicJamMinum(n) {
		$('#load-jam-minum').empty();
		var tabidx = 100;
		if (n <= 1) {
			tabidx = 7;
		}
		const response = await fetch('<?= base_url('pelayanan/api/pelayanan_auto/waktu_pemberian_auto') ?>' + '?waktu_pemberian=1')
		const waktuPemberian = await response.json()

		for (i = 0; i < n; i++) {
			let html = /* html */ `<select tabindex="${tabidx}" id="admintime${i}" onchange="change_time(${i});" class="custom-form admintime" style="width:70px; float:left; margin-right:3px; margin-bottom:3px;">`;
			waktuPemberian.forEach(item => {
				html += `<option value="${item.kode}">${item.timing}</option>`
			})
			html += '</select>'
			$('#load-jam-minum').append(html);
		}
		if (n === 1) {
			$('#admintime0').prop('selectedIndex', 3);
		}
		if (n === 2) {
			$('#admintime0').prop('selectedIndex', 3);
			$('#admintime1').prop('selectedIndex', 1);
		}
		if (n === 3) {
			$('#admintime0').prop('selectedIndex', 3);
			$('#admintime1').prop('selectedIndex', 0);
			$('#admintime2').prop('selectedIndex', 1);
		}
		if (n === 4) {
			$('#admintime0').prop('selectedIndex', 3);
			$('#admintime1').prop('selectedIndex', 0);
			$('#admintime2').prop('selectedIndex', 1);
			$('#admintime3').prop('selectedIndex', 2);
		}
	}

	function hapusList(obj) {
		var parent = obj.parentNode.parentNode;
		parent.parentNode.removeChild(parent);
	}

	function totalJasaFarmasi() {
		var jml_r = $('.entrian-resep').length;
		var tunggal = 0;
		var racik30 = 0;
		var racik31 = 0;
		for (i = 1; i <= jml_r; i++) {
			var jml_obat_tiap_r = $('.tr-rows' + i).length;
			if (jml_obat_tiap_r === 1) {
				tunggal++;
			}
			if (jml_obat_tiap_r > 1 && jml_obat_tiap_r <= 30) {
				racik30++;
			}
			if (jml_obat_tiap_r > 30) {
				racik31++;
			}
		}
		var jasa_farmasi = (tunggal * 1000) + (racik30 * 3000) + (racik31 * 4000);
		$('#jasa').val(money_format(jasa_farmasi));
		totalHargaBarang();
	}

	function totalHargaBarang() {
		var subtotal = 0;
		var jml = $('.harga-barang').length;
		for (i = 0; i <= (jml - 1); i++) {
			var harga = parseFloat(currencyToNumber($('.harga-barang:eq(' + i + ')').html()));
			subtotal += harga;
		}
		var jasa_farmasi = parseFloat(currencyToNumber($('#jasa').val()));
		$('#total-resep').html(money_format(jasa_farmasi + subtotal, 2));

		// $.ajax({
		// 	type: 'GET',
		// 	url: '<!?= base_url('pelayanan/api/pelayanan/get_data_layanan_current_pasien') ?>/id/' + $('#id-pk').val(),
		// 	success: function(data) {
		// 		if(data.jenis_layanan === 'Poliklinik' && (data.id_penjamin === '1' || data.id_penjamin === '11' || data.id_penjamin === '16')){
		// 			if(subtotal > 50000 && $('#no-r').val() < 3){
		// 				swalAlert('warning', 'Validasi', `Mohon maaf penggunaan resep pasien sudah melebihi <b>Rp. 50.000,-</b> !`);
		// 			}
		// 		}
		// 	}
		// });
		
		$('#total-harga-barang').html(money_format(subtotal));
	}

	function generateNoResep() {
		$.ajax({
			url: '<?= base_url('pelayanan/api/pelayanan_auto/generate_no_resep') ?>',
			dataType: 'JSON',
			data: 'tanggal=<?= date("d/m/Y") ?>',
			success: function(data) {
				$('#no-resep').val(data);
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

	function resetForm() {
		$('input[type=text], input[type=number], select, textarea').val('');
		$('a .select2c-chosen').html('');
		$('#list-resep').html('');
		$('#tanggal-awal, #tanggal-akhir').val('<?= date("d/m/Y") ?>');
		$('#total-resep, #total-harga-barang').html('');
		$('#timing').prop('selectedIndex', 2);
	}

	function resetDataResep() {
		var tanggalAwal = $('#tanggal-awal').val();
		var tanggalAkhir = $('#tanggal-akhir').val();
		$('input[type=text], input[type=hidden], input[type=number], select, textarea').val('');
		$('a .select2c-chosen').html('');
		$('#list-resep').html('');
		$('#total-resep, #total-harga-barang').html('');
		$('#tanggal-awal').val(tanggalAwal);
		$('#tanggal-akhir').val(tanggalAkhir);
		$('#timing').prop('selectedIndex', 2);
		$('[name="page_now"]').val(1)
	}

	function inputResep(detail, form) {
		resetDataResep();
		$('#obatkronis').val('0');
		$('#res-resep-ranap').html('');
		$('#salin-resep').hide();
		$('.obkrs').show();
		$('#keyword').val('');
		$('#resep-tab a:first').tab('show');

		klik = null;
		$('.showhide').show();
		$('#load-jam-minum').html('');
		if (form === 'Penunjang') {
			$('.aturanpakai-hidden').hide();
		}
		$('input[name=tanggal_resep]').attr('id', 'tanggal-resep');
		$('#jenis-form-resep').val(form);

		date_time('tanggal-resep-realtime', 'html');
		date_time('tanggal-resep', 'val');

		let data = detail.split('#');
		var vip = $('#vip-search').val();

		$('#vip-search').val(vip);

		if (data[3] === '') {
			swalAlert('warning', 'Validasi', 'Pasien <b>' + data[2] + '</b> belum dilakukan pemeriksaan, silahkan entri pemeriksaan terlebih dahulu!');
			return false;
		}

		$('[name="asal_input_resep"]').val(data[11])
		$('#dokterhide').val(((data[4] !== 'null') ? data[4] : ''));
		$('#s2id_dokterhide a .select2c-chosen').html(data[3]);
		$('#pasien-auto').html(data[1] + ' - ' + data[2]);
		$('#pasienhide').val(data[1]);
		$('#id-pk').val(data[0]);
		$('#usia-pasien').html(data[5]);
		$('#jenis-pk').html(data[6]);

		if (data[9] === 'Tunai') {
			$('.onoff').hide();
			$('#id-penjamin-pasien').val('');
			$('#penjamin-pasien').html('Umum');
		}
		if (data[9] === 'Asuransi' || data[9] === 'Perusahaan') {
			$('.onoff').show();
			$('#penjamin-obat, #penjamin-pasien').html(data[8]);
			$('#id-penjamin-pasien').val(data[7]);
		}

		$('#id-penunjang').val(data[10]);
		$('#jenis-penunjang').val(data[11]);
		$('#no-r').val('1');
		$('#tanggal').val('<?= date("d/m/Y") ?>');
		$('#tanggal-resep').val('<?= date("d/m/Y H:i") ?>');
		$('#tanggal-resep-label').html(indo_tgl('<?= date("Y-m-d") ?>'));
		$('#id-layanan-pendaftaran-for-resep').val(data[0])

		// get pasien last resep
		$.ajax({
			type: 'GET',
			url: '<?= base_url('pelayanan/api/pelayanan/get_pasien_last_resep') ?>/id/' + data[1],
			success: function(data) {
				if (data.length === 0) {
					$('#info-resep').hide();
				} else {
					$('#info-resep').show();
					$('#tanggal-resep-last').html(data.selisih + ' hari yang lalu<br/>pada tanggal ' + indo_tgl(data.tanggal));
				}
			}
		});

		// get data current pasien
		$.ajax({
			type: 'GET',
			url: '<?= base_url('pelayanan/api/pelayanan/get_data_layanan_current_pasien') ?>/id/' + data[0],
			success: function(data) {
				if(data.tindak_lanjut === 'cco sementara'){
					$('#form-resep').hide();
					$('#data-resep').children().click()
					swalAlert('info', 'Info', 'Jika ingin menambah resep, silahkan hubungi <b>Kasir</b>');
				}

				if(data.jenis_layanan === 'Poliklinik'){
					$('#resep-prioritas').html(`
					<td><b>Resep Prioritas</b></td>
					<td>:</td>
					<td>
						<input type="radio" name="resep_prioritas" id="rsp-ya" value="1" class="mr-1"><label for="edu_evaluasi_1">Ya</label>
						<input type="radio" name="resep_prioritas" id="rsp-tidak" value="0" class="mr-1 ml-2" checked><label for="edu_evaluasi_2">Tidak</label>
					</td>
					`)
				}
			}
		});

		// get waktu pemberian obat
		$.ajax({
			type: 'GET',
			url: '<?= base_url('pelayanan/api/pelayanan_auto/waktu_pemberian_auto') ?>' + '?waktu_pemberian=0',
			success: function(data) {
				data.forEach(item => {
					$('#timing').append(`<option value="${item.kode}">${item.timing}</option>`)
				})
			}
		});
		
		$('#cp-id-resep').select2c({
			ajax: {
				url: '<?php echo base_url('pelayanan/api/pelayanan_auto/get_resep_pasien'); ?>',
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) {
					return {
						def: {
							id: '',
							id_penjualan: '',
							id_layanan_pendaftaran: '',
							total: '',
							tanggal_resep: '',
							waktu_resep: '',
							id_resep: '',
							lb_resep_pasien: '-'
						},
						q: term, //search term
						id_pasien: $('#pasienhide').val(),
						page: page // page number
					};
				},
				results: function(hasil, page) {
					var more = (page * 20) < hasil['meta']['total']; // whether or not there are more results available

					// notice we return the value of more so Select2 knows if more results can be loaded
					return {
						results: hasil['data'],
						more: more
					};
				}
			},
			formatResult: function(hasil) {
				var lb = '-';
				if (hasil.id != '') {
					lb = hasil['lb_resep_pasien'];
				}
				return lb;
			},
			formatSelection: function(hasil) {
				var lb = '-';
				if (hasil['id'] != '') {
					lb = hasil['lb_resep_pasien'];
					editResep(hasil['id_resep'], 0);
				}
				return lb;
			}
		});

		let profesiNadis = '<?= $this->session->userdata('profesi_nadis') ?>';

		if (data[6] === 'Rawat Inap' || data[6] === 'Laboratorium' || data[6] === 'Radiologi' || data[6] === 'Fisioterapi' || data[6] === 'Hemodialisa') {
			$('#salin-resep').hide();
		} else {
			$('#salin-resep').show();
		}


		var titleModal = ''

		if (data[12] === 'penunjang') {
			titleModal = 'Penunjang';
			$('#salin-resep').hide();
		} else if (data[11] === 'radiologi' | data[11] === 'hemodialisa') {
			titleModal = 'Penunjang';
			$('#salin-resep').hide();
		} else if (data[11] === 'ok' || data[6] === 'OK') {
			titleModal = 'OK Central';
		} else if (profesiNadis === 'Dokter Spesialis' || profesiNadis === 'Dokter Umum' || profesiNadis === 'Dokter Anestesi' || profesiNadis === 'Dokter Spesialis RM') {
			$('#is-terapi-pulang').parent().parent().parent().show()
			$('#salin-resep').show();
		} else if (data[6] === 'Rawat Inap') {
			titleModal = 'Rawat Inap';
			let accountGroup = '<?= $this->session->userdata('account_group') ?>';
			if(accountGroup === 'Admin'){
				$('#is-terapi-pulang').parent().parent().parent().show()
				$('#salin-resep').show();
			}
		} else if (data[6] === 'Poliklinik' || data[6] === 'IGD') {
			titleModal = 'Rawat Jalan';
		} else if (data[6] === 'Laboratorium' || data[6] === 'Radiologi' || data[6] === 'Fisioterapi' || data[6] === 'Hemodialisa') {
			titleModal = 'Penunjang';
		}

		$('#modal-form-resep-label').html(`
            <b>Form Resep ${titleModal}</b> | No. RM: ${data[1]}, Nama: ${data[2]}, 
            <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data[10]}</b></i></span>
        `);

		$('#modal-form-resep').modal('show', function() {
			$('#permintaan').focus();
		});

		$('#is-terapi-pulang').on('click', function() {
			if ($(this).is(':checked')) {
				$('.jam-pemberian').show();
			} else {
				$('.jam-pemberian').hide();
				$('.jam-pemberian-input').html('');
			}
		});
	}

	function hitungJmlPakai() {
		let dosis_racik = parseFloat($('#dosisracik').val());
		let jumlah_tbs = parseFloat($('#jml-tebus').val());
		let kekuatan = parseFloat($('#kekuatan').val());

		if (!isNaN(jumlah_tbs)) {
			let jumlah_pakai = (dosis_racik * jumlah_tbs) / kekuatan;
			let jml_pakai = isNaN(jumlah_pakai) ? '' : jumlah_pakai;
			$('#jumlah').val(roundToTwo(jml_pakai));
		}
	}

	function hitungEstimasi() {
		let jml_baris = $('.tr-rows').length;
		let estimasi = 0;
		for (i = 1; i <= jml_baris; i++) {
			let subtotal = parseInt(currencyToNumber($('#subtotal' + i).html()));
			estimasi = estimasi + subtotal;
		}
		$('#estimasi').html(numberToCurrency(parseInt(estimasi)));
	}

	function addToResep() {
		let no_r = $('#no-r').val();
		let permintaan = $('#permintaan').val();
		let jml_tebus = $('#jml-tebus').val();
		let aturan = $('#aturanpakai').val();
		let aturan2 = $('#aturanpakai2').val();
		let timing = $('#timing').val();
		let iterasi = $('#iterasi').val();
		let id_jasa = $('#jasa').val();
		let jasa_text = $('#jasa option:selected').text();
		let barang = $('#barang-auto').val();
		let jenis_form = $('#jenis-form-resep').val();
		let adm_r_barang = $('#adm-r-barang').val();
		let adm_r_value = true;
		let allow = true;
		let obatkronis = $('#obatkronis').val();
		let keterangan_resep = $('#keterangan-resep').val();
		let aturanManual = $('#ket-aturan-pakai-manual').val();
		let isAturanPakaiManual = $('#aturan-pakai-manual').is(':checked')
		let obatkronistxt = '';
		if (obatkronis === '1') {
			obatkronistxt = '<i class="blinker">Obat Kronis</i>';
		}

		let nama_barang = $('#s2id_barang-auto a .select2c-chosen').html();
		let jml_pakai = parseFloat($('#jumlah').val());
		let sisa_stok = parseFloat($('#sisa-stok').val());

		let pemberian = [];
		$('.admintime').each(function(i) {
			let value = $(this).val();
			pemberian.push(value);
		});

		fetch('<?= base_url("pelayanan/api/pelayanan/check_layanan_pasien") ?>' + '?id_layanan_pendaftaran=' + $('#id-layanan-pendaftaran-for-resep').val())
			.then(response => response.json())
			.then(data => {
				if(data.status){
					fetch('<?= base_url("pelayanan/api/pelayanan/check_resep_2_minggu_sebelum") ?>' + '?id_pasien=' + $('#pasienhide').val() + '&id_barang=' + barang)
						.then(response => response.json())
						.then(data => {
							if(data.status){
								swalAlert('info', 'Pemberitahuan', 'Obat <b>' + data.nama_barang + '</b> dengan jumlah <b>'+ data.jumlah_pakai +'</b> sudah pernah diresepkan, pada tanggal <b style="font-size: 20px;">' + datefmysql(data.tanggal_resep) + '</b>');
							}
						})
				}
			})

		let nm_brg = nama_barang.split(',');
		if (jml_pakai > sisa_stok) {
			swalAlert('warning', 'Validasi', 'Sisa stok <b>' + nm_brg[0] + '</b> tidak mencukupi, <br/>sisa stok <b style="font-size: 20px;">' + sisa_stok + '</b> jumlah yang diresepkan <b style="font-size:20px;">' + jml_pakai + '</b>');
			return false;
		}

		/* Validasi dimatakikan karena poli mata ada 2 resep dengan racikan berbeda */
		// $('.barang').each(function(i) {
		// 	if (barang === $(this).val()) {
		// 		allow = false;
		// 		swalAlert('warning', 'Validasi', 'Barang <b>'+nama_barang+'</b> sudah di input kan pada baris No. <b>'+(i+1)+'</b>'); return false;
		// 	}
		// });

		if (allow === false) {
			return false;
		}

		let only_nama = nama_barang.split(',');
		let barang_text = only_nama[0];
		let harga_brg = parseFloat($('#harga-jual-barang').val());

		let dosisracik = $('#dosisracik').val();
		let jumlah = $('#jumlah').val();
		let cara_buat = $('#cara-pembuatan').val();
		let kekuatanstn = $('.satuan-kekuatan').html();

		let harga_jual = parseFloat(jumlah || 0) * parseFloat(harga_brg || 0);
		if (adm_r_barang === 'Topikal') {
			adm_r_value = false;
		} else if (adm_r_barang === 'Injeksi') {
			adm_r_value = false;
		} else if (adm_r_barang === 'Infus') {
			adm_r_value = false;
		} else if (adm_r_barang === 'Rektal') {
			adm_r_value = false;
		} else {
			adm_r_value = true;
		}

		if (no_r === '') {
			syams_validation('#no-r', 'Kolom No. R tidak boleh kosong');
			return false;
		}
		// if (permintaan === '') {
		// 	syams_validation('#permintaan', 'Kolom jumlah permintaan tidak boleh kosong');
		// 	return false;
		// }
		// if (jml_tebus === '') {
		// 	syams_validation('#jml-tebus', 'Kolom jumlah tebus tidak boleh kosong');
		// 	return false;
		// }
		if (jenis_form !== 'Penunjang') { // jika form nya bukan form resep penunjang
			if ($('#kategori-barang').val() === '1') {
				if (adm_r_value === true) { // jika bukan merupakan topikal atau injeksi
					if (aturan === '' && !isAturanPakaiManual) {
						syams_validation('#aturanpakai', 'Kolom aturan pakai tidak boleh kosong');
						return false;
					}
				}
			}
		}
		if (aturan !== '' && aturan2 !== '') {
			syams_validation_remove('#aturanpakai');
			syams_validation_remove('#aturanpakai2');
		}
		if (isAturanPakaiManual && aturanManual === '') {
			syams_validation('#ket-aturan-pakai-manual', 'Kolom aturan pakai tidak boleh kosong');
			return false;
		} else {
			syams_validation_remove('#ket-aturan-pakai-manual');
		}

		const showAturanPakai = isAturanPakaiManual ? aturanManual : aturan;

		$('#itinialr').hide();
		let label = /* html */ `
            <div id="wrap${no_r}" class="wrap">
                <table class="table-no-border">
                    <tr><td><input type=hidden name="no_r${no_r}" id="no-r${no_r}" value="${no_r}" class="no-r"></td></tr>
                    <tr><td></td></tr>
                    <tr><td><input type=hidden name="jt${no_r}" id="jt${no_r}" value="${jml_tebus}" class="jt"></td></tr>
                    <tr><td><input type=hidden name="ap${no_r}" id="ap${no_r}" value="${aturan}" class="ap"></td></tr>
                    <tr><td><input type=hidden name="apm${no_r}" id="apm${no_r}" value="${aturanManual}" class="apm"></td></tr>
                    <tr><td><input type=hidden name="isapm${no_r}" id="isapm${no_r}" value="${isAturanPakaiManual}" class="isapm"></td></tr>
                    <tr><td><input type=hidden name="ap2${no_r}" id="ap2${no_r}" value="${aturan2}" class="ap2"></td></tr>
                    <tr><td><input type=hidden name="it${no_r}" id="it${no_r}" value="${iterasi}" class="it"></td></tr>
                    <tr><td><input type=hidden name="ja${no_r}" id="ja${no_r}" value="${id_jasa}" class="ja"></td></tr>
                    <tr><td><input type=hidden name="cara_buat${no_r}" id="cara-buat${no_r}" value="${cara_buat}" class="cara-buat"></td></tr>
                    <tr>
                        <td>
                            <input type=hidden name="timing${no_r}" id="timing${no_r}" value="${timing}" class="timing">
                            <input type=hidden name="jmlnor" id="jmlnor${no_r}" class="jmlnor" value="${no_r}">
                            <input type=hidden name="waktu_pemberian${no_r}" id="waktu-pemberian${no_r}" class="waktu-pemberian" value="${(pemberian.join(', '))}">
                        </td>
                    </tr>
                </table>
                <div id="table-list-resep${no_r}" class="input-resep" style="width: 100%; display: flex; flex-direction: column; gap:.5rem">
					<div style="display: flex;gap: 1rem; justify-content: space-between">
						<div style="display: flex;gap: 1rem;align-items: center">
							<strong id="nomor-r${no_r}">R/${no_r}</strong>
							<label for="is-racik${no_r}" style="display: flex; gap:.3rem;">
								<input
									type="hidden"
									name="is_racik${no_r}"
									id="is-racik${no_r}"
									title="Apakah ini resep racikan?"
									class="check-is-racik"
									value="${$('#jenis-resep').val() !== '1' ? 0 : 1}"
								>
								<div style="display: flex; align-items: center; gap: .5rem">
									Racikan ${$('#jenis-resep').val() !== '1' ? `<i class="fas fa-times-circle"></i>` : `<i class="fas fa-check-circle"></i>`}
								</div>
							</label>
							|
							<span id="cara-buat-r${no_r}">
								${cara_buat} |
								Permintaan <input id="jp${no_r}" class="jp custom-form" type="number" name="jp${no_r}" value="${permintaan}" onkeypress="return hanyaAngka(event)" data-toggle="tooltip" data-placement="top" title="Tooltip on top"> |
								${showAturanPakai} |
								${(pemberian.join(', '))}
							</span>
							|
							<div class="jam-pemberian-input">
							</div>
							<div style="display:flex; gap: .2rem">
							<button type="button" id="jam-pemberian${no_r}" class="btn btn-info btn-xs jam-pemberian ${$('#is-terapi-pulang').is(':checked') ? '' : 'hide'}">
								<i class="fas fa-plus"></i> <i class="fas fa-clock"></i>
							</button>
							<button type="button" id="jam-pemberian-minus${no_r}" class="btn btn-danger btn-xs hide">
								<i class="fas fa-minus"></i> <i class="fas fa-clock"></i>
							</button>
							</div>
							<button type="button" title="Klik untuk hapus R /" class="btn btn-secondary btn-xs" onclick="removeR($(this));"><i class="fas fa-trash-alt"></i> Delete R /</button>
						</div>

						${$('#jenis-resep').val() !== '1' ? '' : /* html */ `
							<label for="sediaan${no_r}" class="sediaan" style="display: flex; gap:.3rem;align-items: center;">
								Sediaan:
								<input type="text" name="sediaan${no_r}" id="sediaan${no_r}" class="sediaan_auto select2c-input">
							</label>
						`}
					</div>
					<div style="display: inline-flex;margin-left: 12px;" class=".kr">
						<b>Keterangan : </b>
						<input type="text" name="keterangan_resep${no_r}" id="keterangan_resep${no_r}" style="width:300px;margin-left:5px" class="custom-form" value="${keterangan_resep}">
					</div>
					<div class="tr-row" style="display: flex; flex-direction: column;">
					</div>
				</div>
            </div>
        `;

		let cekTableLabel = $('#nomor-r' + no_r).length;
		$('#no-r' + no_r).val(no_r);
		// $('#jp'+no_r).val(permintaan);
		$('#jt' + no_r).val(jml_tebus);
		$('#ap' + no_r).val(aturan);
		$('#apm' + no_r).val(aturanManual);
		$('#ap2' + no_r).val(aturan2);
		$('#it' + no_r).val(iterasi);
		$('#cara-buat' + no_r).val(cara_buat);
		if (cekTableLabel === 0) {
			$('#list-resep').append(label);
		}

		let i = $('.tr-rows' + no_r).length;
		let list = /* html */ `
            <div class="tr-rows${no_r}" style="width:100%">
				<div style="display: flex; justify-content: space-between; margin-left: 1.5rem">
					<span class="brg" style="display: none"><input type=hidden name="id_barang${no_r}[]" id="id-barang${no_r}${i}" class="barang" value="${barang}"></span>
                    <span class="krs" style="display: none"><input type=hidden name="obatkronis${no_r}[]" id="obatkronis${no_r}${i}" class="obat-kronis" value="${obatkronis}"></span>
					<p>
						${barang_text}&nbsp;${obatkronistxt}
						<input type="hidden" class="kekuatan-obat" id="kekuatan${no_r}${i}" value="${$('#kekuatan').val()}"/>
						<input type="hidden" class="harga-jual-barang" id="harga-jual-barang${no_r}${i}" value="${$('#harga-jual-barang').val()}"/>
						<input type="hidden" class="sisa-stok" id="sisa-stok${no_r}${i}" value="${$('#sisa-stok').val()}"/>
					</p>
					<div style="display: flex; justify-content: space-between; align-items: center; gap: 2.4rem">
						<div style="display: flex; gap:.5rem">
							Dosis Racik
							<input class="dosisracik custom-form" type="text" name="dosisracik${no_r}[]" id="dosisracik${no_r}${i}" value="${dosisracik}" style="width:50px; display:unset;" onkeypress="return hanyaAngka(event)" readonly>
							${kekuatanstn}
						</div>
						<div style="display: flex; gap:.5rem; align-items: center">
							Jml Pakai
                    		<input class="jmlpakai custom-form" type="text" name="jmlpakai${no_r}[]" id="jmlpakai${no_r}${i}" value="${jumlah}" style="width:50px; display:unset;" data-jual_harga="${harga_brg}" data-id="${no_r}${i}n" onchange="chRDetail($(this))" onkeypress="return hanyaAngka(event)">
						</div>
						<div style="display: flex; gap:.5rem">
                    		<span id="hb-${no_r}${i}n" class="harga-barang">${money_format(precise_round(harga_jual, 2))}</span>
						</div>
						<div style="display: flex; gap:.2rem">
							<button type="button" title="Klik untuk hapus" class="btn btn-secondary btn-xs" onclick="removeElement(${no_r}, $(this))"><i class="fas fa-times-circle"></i></button>
                    		<input type=hidden name="jmldetail${no_r}[]" id="jmldetail${no_r}${i}" class="jmldetail" value="${no_r}">
						</div>
					</div>
				</div>
			</div>
        `;

		$('#waktu-pemberian' + no_r).val(pemberian.join(', '));
		$('#cara-buat-r' + no_r).html(cara_buat + ' Permintaan <input id="jp' + no_r + '" class="jp custom-form" type="text" name="jp' + no_r + '" value="' + permintaan + '" style="width:50px; display:unset;" data-toggle="tooltip" data-placement="top" title="Masukkan Jumlah Permintaan"> &nbsp; &nbsp; | &nbsp; &nbsp; ' + showAturanPakai + ' &nbsp; &nbsp; | &nbsp; &nbsp; ' + (pemberian.join(', ')));
		if (barang !== '') {
			$('#table-list-resep' + no_r + ' .tr-row').append(list);
		}
		resetInputResep();
		if ($('#jenis-resep').val() !== '1') {
			$('#no-r').val(parseFloat(no_r) + 1);
		}

		totalHargaBarang();
		totalJasaFarmasi();
		updateScroll('list-resep');

		$('#permintaan').val('');
		$('#jml-tebus').val('');
		$('#jumlah').val('');
		$('#obatkronis').val('0');

		syams_validation_remove('.custom-form');
		sediaanAuto(no_r);

		const jumlahPermintaan = $(`#jp${no_r}`)
		if ($('#jenis-resep').val() === '1' && jumlahPermintaan.val() === '') {
			setTimeout(() => jumlahPermintaan.tooltip('show'), 10);
			setTimeout(() => {
				jumlahPermintaan.tooltip('hide');
				jumlahPermintaan.tooltip('disable')
			}, 3000);
		}

		const $jamPemberian = $(`#jam-pemberian${no_r}`)

		$jamPemberian.unbind('click')
		$jamPemberian.on('click', function(){
			const $this = $(this);
			const jamPemberianInputContainer = $this.parent().siblings('.jam-pemberian-input')
			const length = jamPemberianInputContainer.children().length + 1;

			if(length > 6){
				return false;
			}

			const input = `
				<input type="text" name="jam_pemberian_${length}${no_r}" id="jam-pemberian-${length}${no_r}" class="custom-form clear-input d-inline-block input-jam-pemberian-resep-r" style="width: 50px" placeholder="jam ${length}">
			`;

			jamPemberianInputContainer.append(input);

			const $btnMinus = $this.siblings(`#jam-pemberian-minus${no_r}`);
			$btnMinus.show();
			$btnMinus.on('click', function(){
				const $this = $(this);
				const jamPemberianInputContainer = $this.parent().siblings('.jam-pemberian-input')
				const length = jamPemberianInputContainer.children().length;

				if(length > 0){
					jamPemberianInputContainer.children().last().remove();
				}

				if(length === 1){
					$this.hide();
				}
			})

			$(`#jam-pemberian-${length}${no_r}`).on('click', function() {
				$(this).timepicker({
					format: 'HH:mm',
					showInputs: false,
					showMeridian: false
				});
			})
		})

		jumlahPermintaan.on('keyup', function() {
			let permintaan = parseInt($(this).val());
			$(this).parent().parent().parent().parent().siblings('table').find(`#jt${no_r}`).val(permintaan)

			$(this)
				.parent()
				.parent()
				.parent()
				.siblings('.tr-row')
				.children()
				.each(function(index, element) {
					const dose = `#dosisracik${no_r}${index}`;
					const strength = `#kekuatan${no_r}${index}`;
					const price = `#harga-jual-barang${no_r}${index}`;
					const usedAmount = `#jmlpakai${no_r}${index}`;
					const salePrice = `#hb-${no_r}${index}n`;

					console.log('asdasd')

					if (permintaan) {
						const dosisRacik = parseFloat($(element).find(dose).val());
						const kekuatan = parseFloat($(element).find(strength).val());
						const hargaJualBarang = parseFloat($(element).find(price).val());
						const sisaStok = parseInt($(`#sisa-stok${no_r}${index}`).val())

						const jumlahPakai = (dosisRacik * permintaan) / kekuatan;
						const hargaJual = roundToTwo(jumlahPakai * hargaJualBarang);

						if (jumlahPakai > sisaStok) {
							syams_validation(`#jmlpakai${no_r}${index}`, 'Sisa stok tidak cukup! sisa stok : ' + $(`#sisa-stok${no_r}${index}`).val());
						} else {
							syams_validation_remove(`#jmlpakai${no_r}${index}`);
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
	}

	function resetInputResep() {
		$('#s2id_barang-auto a .select2c-chosen, .satuan-kekuatan').html('');
		$('#barang-auto, #kekuatan, #dosisracik, #jumlah, #keterangan-resep, #permintaan').val('');
		$('#btn-tambah-waktu-pemberian').remove();
		if ($('#jenis-resep').val() !== '1') {
			$('.ket-aturan-pakai-manual').addClass('hide')
			$('.aturanpakai-auto').removeClass('hide')
			$('#aturan-pakai-manual').prop('checked', false);
			$('#ket-aturan-pakai-manual').val('');
			$('#aturanpakai-auto').val('');
			$('#s2id_aturanpakai-auto a .select2c-chosen').html('');
			$('#aturanpakai').val('')
		}

		$('#load-jam-minum').empty();
		$('#no-r').focus();
	}

	function chRDetail(obj) {
		// console.log(obj.data('id'))
		let id = obj.data('id');
		let jual_harga = obj.data('jual_harga');
		let new_harga = money_format(precise_round((obj.val() * jual_harga), 2));
		$('#hb-' + id).html(new_harga);
		totalHargaBarang();
	}

	function removeElement(nor, el) {
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
				let parent = el.parent().parent().parent().parent().remove();
				let jumlah = $(`.tr-rows${nor}`).length;
				let col = 0;
				for (i = 0; i <= jumlah; i++) {
					let rowElem = $(`.tr-rows${nor}:eq(${col})`);
					let barangElem = rowElem.find('.barang').attr('id', `id-barang${nor}${i}`);
					let obatkronisElem = barangElem.parent().siblings('span').children().attr('id', `obatkronis${nor}${i}`);
					let pElemChildren = obatkronisElem.parent().siblings('p').children();

					pElemChildren.filter('.kekuatan-obat').attr('id', `kekuatan${nor}${i}`);
					pElemChildren.filter('.harga-jual-barang').attr('id', `harga-jual-barang${nor}${i}`);

					let divElem = pElemChildren.parent().siblings('div');
					let dosisracikElem = divElem.find('.dosisracik').attr('id', `dosisracik${nor}${i}`);
					let dpElem = dosisracikElem.parent().parent();

					dpElem.find('.jmlpakai').attr('id', `jmlpakai${nor}${i}`);
					dpElem.find('.harga-barang').attr('id', `hb-${nor}${i}n`);
					dpElem.find('.jmldetail').attr('id', `jmldetail${nor}${i}`);

					col++;
				}

				totalHargaBarang();
				totalJasaFarmasi();
			}
		})
	}

	function removeR(el) {
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
				el.parent().parent().parent().parent().remove();

				// new
				$('.wrap').each(function(indexResep, elementResep) {
					const resepR = indexResep + 1;
					const listResep = $(elementResep).attr('id', `warp${resepR}`)

					listResep.children('table').find('.no-r').attr('id', `no-r${resepR}`).attr('name', `no_r${resepR}`).val(resepR)
					listResep.children('table').find('.jt').attr('id', `jt${resepR}`).attr('name', `jt${resepR}`)
					listResep.children('table').find('.ap').attr('id', `ap${resepR}`).attr('name', `ap${resepR}`)
					listResep.children('table').find('.apm').attr('id', `apm${resepR}`).attr('name', `apm${resepR}`)
					listResep.children('table').find('.ap2').attr('id', `ap2${resepR}`).attr('name', `ap2${resepR}`)
					listResep.children('table').find('.it').attr('id', `it${resepR}`).attr('name', `it${resepR}`)
					listResep.children('table').find('.isapm').attr('id', `isapm${resepR}`).attr('name', `isapm${resepR}`)
					listResep.children('table').find('.ja').attr('id', `ja${resepR}`).attr('name', `ja${resepR}`)
					listResep.children('table').find('.cara-buat').attr('id', `cara_buat${resepR}`).attr('name', `cara_buat${resepR}`)
					listResep.children('table').find('.timing').attr('id', `timing${resepR}`).attr('name', `timing${resepR}`)
					listResep.children('table').find('.jmlnor').attr('id', `jmlnor${resepR}`).val(resepR)
					listResep.children('table').find('.waktu-pemberian').attr('id', `waktu_pemberian${resepR}`).attr('name', `waktu_pemberian${resepR}`)

					listResep.children('div').attr('id', 'table-list-resep' + resepR).find('strong').attr('id', 'nomor_r' + resepR).html('R/ ' + resepR)
						.siblings('label').attr('for', 'is-racik' + resepR).children('input').attr('id', 'is-racik' + resepR).attr('name', 'is_racik' + resepR)
						.parent().siblings('span').attr('id', 'cara-buat-r' + resepR).children('input').attr('id', 'jp' + resepR).attr('name', 'jp' + resepR)
						.parent().parent().siblings('.kr').children('input').attr('name', 'keterangan_resep' + resepR).attr('id', 'keterangan_resep' + resepR)

					listResep.find('.sediaan').attr('for', 'sediaan' + resepR).children('input').attr('id', 'sediaan' + resepR).attr('name', 'sediaan' + resepR)
					listResep.children('.tr-row').children().attr('class', 'tr-rows' + resepR)

					listResep.find('.tr-row').children().each(function(indexObat, elementObat) {
						let rowElem = $(elementObat).attr('class', 'tr-rows' + resepR);
						let barangElem = rowElem.find('.barang').attr({
							id: `id-barang${resepR}${indexObat}`,
							name: `id_barang${resepR}[]`
						});
						let obatkronisElem = barangElem.parent().siblings('span').children().attr({
							id: `obatkronis${resepR}${indexObat}`,
							name: `obatkronis${resepR}[]`
						});
						let pElemChildren = obatkronisElem.parent().siblings('p').children();

						pElemChildren.filter('.kekuatan-obat').attr('id', `kekuatan${resepR}${indexObat}`);
						pElemChildren.filter('.harga-jual-barang').attr('id', `harga-jual-barang${resepR}${indexObat}`);
						pElemChildren.filter('.sisa-stok').attr('id', `sisa-stok${resepR}${indexObat}`);

						let divElem = pElemChildren.parent().siblings('div');
						let dosisracikElem = divElem.find('.dosisracik').attr({
							id: `dosisracik${resepR}${indexObat}`,
							name: `dosisracik${resepR}[]`
						});
						let dpElem = dosisracikElem.parent().parent();

						dpElem.find('.jmlpakai').attr({
							id: `jmlpakai${resepR}${indexObat}`,
							name: `jmlpakai${resepR}[]`
						});
						dpElem.find('.harga-barang').attr('id', `hb-${resepR}${indexObat}n`);
						dpElem.find('.jmldetail').attr({
							id: `jmldetail${resepR}${indexObat}`,
							name: `jmldetail${resepR}[]`
						});
					});

				});

				$('#no-r').val($('.wrap').length + 1)

				// old
				// let i = 0;
				// for (let n = 1; n <= jml_r; n++) {
				// 	const $warp = $('.wrap:eq(' + i + ')');

				// $warp.attr('id', 'wrap' + n);
				// $warp.children('table:eq(0)').attr('id', 'table_r' + n);
				// $warp.children('table:eq(1)').children('thead').children('tr:eq(0)').children('td:eq(0)').children().children('strong').html('R/ ' + n);
				// $('.no-r:eq(' + i + ')').attr('id', 'no-r' + n);
				// $('.no-r:eq(' + i + ')').attr('name', 'no_r' + n);
				// $('.no-r:eq(' + i + ')').attr('value', n);
				// $('.jp:eq(' + i + ')').attr('id', 'jp' + n);
				// $('.jp:eq(' + i + ')').attr('name', 'jp' + n);
				// $('.jt:eq(' + i + ')').attr('id', 'jt' + n);
				// $('.jt:eq(' + i + ')').attr('name', 'jt' + n);
				// $('.ap:eq(' + i + ')').attr('id', 'ap' + n);
				// $('.ap:eq(' + i + ')').attr('name', 'ap' + n);
				// $('.ap2:eq(' + i + ')').attr('id', 'ap2' + n);
				// $('.ap2:eq(' + i + ')').attr('name', 'ap2' + n);
				// $('.it:eq(' + i + ')').attr('id', 'it' + n);
				// $('.it:eq(' + i + ')').attr('name', 'it' + n);
				// $('.ja:eq(' + i + ')').attr('id', 'ja' + n);
				// $('.ja:eq(' + i + ')').attr('name', 'ja' + n);
				// $('.cara-buat:eq(' + i + ')').attr('id', 'cara-buat' + n);
				// $('.cara_buat:eq(' + i + ')').attr('name', 'cara_buat' + n);
				// $('.timing:eq(' + i + ')').attr('id', 'timing' + n);
				// $('.timing:eq(' + i + ')').attr('name', 'timing' + n);
				// $('.jmlnor:eq(' + i + ')').attr('id', 'jmlnor' + n);
				// $('.jmlnor:eq(' + i + ')').attr('value', n);
				// $('.waktu-pemberian:eq(' + i + ')').attr('id', 'waktu-pemberian' + n);
				// $('.waktu-pemberian:eq(' + i + ')').attr('name', 'waktu_pemberian' + n);

				// $warp.children('table:eq(1)').attr('id', 'table-list-resep' + n);
				// $warp.children('table:eq(1)').children('tfoot').children('tr').attr('class', 'tr-rows-foot' + n);
				// $warp.children('table:eq(1)').children('thead').children('tr').children('td').children('strong').attr('id', 'nomor_r' + n);
				// $warp.children('table:eq(1)').children('thead').children('tr').children('td').children('button').attr('onclick', 'removeR(' + $(this) + ')');
				// $warp.children('table:eq(1)').children('thead').children('tr').children('td').children('span').attr('id', 'cara-buat-r' + n);

				// $warp.children('table:eq(1)').children('tbody').children('tr').attr('class', 'tr-rows' + n);

				// new

				// var jml_detail = $(`.tr-rows${n}`).length;
				// for (let h = 0; h <= (jml_detail - 1); h++) {

				// $('.tr-rows' + n + ':eq(' + h + ')').children('td:eq(0)').children('span.brg').children('input').attr('name', 'id_barang' + n + '[]');
				// $('.tr-rows' + n + ':eq(' + h + ')').children('td:eq(0)').children('span.brg').children('input').attr('id', 'id-barang' + n + '' + h);

				// $('.tr-rows' + n + ':eq(' + h + ')').children('td:eq(0)').children('span.krs').children('input').attr('name', 'obatkronis' + n + '[]');
				// $('.tr-rows' + n + ':eq(' + h + ')').children('td:eq(0)').children('span.krs').children('input').attr('id', 'obatkronis' + n + '' + h);

				// $('.tr-rows' + n + ':eq(' + h + ')').children('td:eq(1)').children('input').attr('name', 'dosisracik' + n + '[]');
				// $('.tr-rows' + n + ':eq(' + h + ')').children('td:eq(1)').children('input').attr('id', 'dosisracik' + n + '' + h);

				// $('.tr-rows' + n + ':eq(' + h + ')').children('td:eq(2)').children('input').attr('name', 'jmlpakai' + n + '[]');
				// $('.tr-rows' + n + ':eq(' + h + ')').children('td:eq(2)').children('input').attr('id', 'jmlpakai' + n + '' + h);

				// $('.tr-rows' + n + ':eq(' + h + ')').children('td:eq(3)').children('input').attr('name', 'jmldetail' + n + '[]');
				// $('.tr-rows' + n + ':eq(' + h + ')').children('td:eq(3)').children('input').attr('id', 'jmldetail' + n + '' + h);

				// $('.tr-rows' + n + ':eq(' + h + ')').children('td:eq(3)').children('button').attr('onclick', 'removeElement(' + n + ',this)');
				// }
				// 	i++;
				// }

				totalHargaBarang();
				totalJasaFarmasi();
			}
		})
	}

	function removeREdit(el) {
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
				el.parent().parent().parent().parent().remove();

				// new
				$('.wrap').each(function(indexResep, elementResep) {
					const resepR = indexResep + 1;
					const listResep = $(elementResep).attr('id', `warp${resepR}`)

					listResep.children('table').find('.no-r').attr('id', `no-r${resepR}`).attr('name', `no_r${resepR}`).val(resepR)
					listResep.children('table').find('.jt').attr('id', `jt${resepR}`).attr('name', `jt${resepR}`)
					listResep.children('table').find('.ap').attr('id', `ap${resepR}`).attr('name', `ap${resepR}`)
					listResep.children('table').find('.apm').attr('id', `apm${resepR}`).attr('name', `apm${resepR}`)
					listResep.children('table').find('.ap2').attr('id', `ap2${resepR}`).attr('name', `ap2${resepR}`)
					listResep.children('table').find('.it').attr('id', `it${resepR}`).attr('name', `it${resepR}`)
					listResep.children('table').find('.isapm').attr('id', `isapm${resepR}`).attr('name', `isapm${resepR}`)
					listResep.children('table').find('.ja').attr('id', `ja${resepR}`).attr('name', `ja${resepR}`)
					listResep.children('table').find('.cara-buat').attr('id', `cara_buat${resepR}`).attr('name', `cara_buat${resepR}`)
					listResep.children('table').find('.timing').attr('id', `timing${resepR}`).attr('name', `timing${resepR}`)
					listResep.children('table').find('.jmlnor').attr('id', `jmlnor${resepR}`).val(resepR)
					listResep.children('table').find('.waktu-pemberian').attr('id', `waktu_pemberian${resepR}`).attr('name', `waktu_pemberian${resepR}`)

					listResep.children('div').attr('id', 'table-list-resep' + resepR).find('strong').attr('id', 'nomor_r' + resepR).html('R/ ' + resepR)
						.siblings('label').attr('for', 'is-racik' + resepR).children('input').attr('id', 'is-racik' + resepR).attr('name', 'is_racik' + resepR)
						.parent().siblings('div').attr('id', 'cara-buat-r' + resepR).children().find('.jp').attr('id', 'jp' + resepR).attr('name', 'jp' + resepR)
						.parent().parent().parent().parent().siblings('.kr').children('input').attr('name', 'keterangan_resep' + resepR).attr('id', 'keterangan_resep' + resepR)

					listResep.find('.sediaan').attr('for', 'sediaan' + resepR).children('input').attr('id', 'sediaan' + resepR).attr('name', 'sediaan' + resepR)
					listResep.children('.tr-row').children().attr('class', 'tr-rows' + resepR)

					listResep.find('.tr-row').children().each(function(indexObat, elementObat) {
						let rowElem = $(elementObat).attr('class', `tr-rows${resepR}`);
						let barangElem = rowElem.find('.barang').attr({
							id: `id-barang${resepR}${indexObat}`,
							name: `id_barang${resepR}[]`
						});
						let obatkronisElem = barangElem.parent().siblings('span').children().attr({
							id: `obatkronis${resepR}${indexObat}`,
							name: `obatkronis${resepR}[]`
						});
						let pElemChildren = obatkronisElem.parent().siblings('p').children();

						pElemChildren.filter('.kekuatan-obat').attr('id', `kekuatan${resepR}${indexObat}`);
						pElemChildren.filter('.harga-jual-barang').attr('id', `harga-jual-barang${resepR}${indexObat}`);
						pElemChildren.filter('.sisa-stok').attr('id', `sisa-stok${resepR}${indexObat}`);

						let divElem = pElemChildren.parent().siblings('div');
						let dosisracikElem = divElem.find('.dosisracik').attr({
							id: `dosisracik${resepR}${indexObat}`,
							name: `dosisracik${resepR}[]`
						});
						let dpElem = dosisracikElem.parent().parent();

						dpElem.find('.jmlpakai').attr({
							id: `jmlpakai${resepR}${indexObat}`,
							name: `jmlpakai${resepR}[]`
						});
						dpElem.find('.harga-barang').attr('id', `hb-${resepR}${indexObat}n`);
						dpElem.find('.jmldetail').attr({
							id: `jmldetail${resepR}${indexObat}`,
							name: `jmldetail${resepR}[]`
						});
					});

				});

				$('#no-r').val($('.wrap').length + 1)

				// old
				// let i = 0;
				// for (let n = 1; n <= jml_r; n++) {
				// 	const $warp = $('.wrap:eq(' + i + ')');

				// $warp.attr('id', 'wrap' + n);
				// $warp.children('table:eq(0)').attr('id', 'table_r' + n);
				// $warp.children('table:eq(1)').children('thead').children('tr:eq(0)').children('td:eq(0)').children().children('strong').html('R/ ' + n);
				// $('.no-r:eq(' + i + ')').attr('id', 'no-r' + n);
				// $('.no-r:eq(' + i + ')').attr('name', 'no_r' + n);
				// $('.no-r:eq(' + i + ')').attr('value', n);
				// $('.jp:eq(' + i + ')').attr('id', 'jp' + n);
				// $('.jp:eq(' + i + ')').attr('name', 'jp' + n);
				// $('.jt:eq(' + i + ')').attr('id', 'jt' + n);
				// $('.jt:eq(' + i + ')').attr('name', 'jt' + n);
				// $('.ap:eq(' + i + ')').attr('id', 'ap' + n);
				// $('.ap:eq(' + i + ')').attr('name', 'ap' + n);
				// $('.ap2:eq(' + i + ')').attr('id', 'ap2' + n);
				// $('.ap2:eq(' + i + ')').attr('name', 'ap2' + n);
				// $('.it:eq(' + i + ')').attr('id', 'it' + n);
				// $('.it:eq(' + i + ')').attr('name', 'it' + n);
				// $('.ja:eq(' + i + ')').attr('id', 'ja' + n);
				// $('.ja:eq(' + i + ')').attr('name', 'ja' + n);
				// $('.cara-buat:eq(' + i + ')').attr('id', 'cara-buat' + n);
				// $('.cara_buat:eq(' + i + ')').attr('name', 'cara_buat' + n);
				// $('.timing:eq(' + i + ')').attr('id', 'timing' + n);
				// $('.timing:eq(' + i + ')').attr('name', 'timing' + n);
				// $('.jmlnor:eq(' + i + ')').attr('id', 'jmlnor' + n);
				// $('.jmlnor:eq(' + i + ')').attr('value', n);
				// $('.waktu-pemberian:eq(' + i + ')').attr('id', 'waktu-pemberian' + n);
				// $('.waktu-pemberian:eq(' + i + ')').attr('name', 'waktu_pemberian' + n);

				// $warp.children('table:eq(1)').attr('id', 'table-list-resep' + n);
				// $warp.children('table:eq(1)').children('tfoot').children('tr').attr('class', 'tr-rows-foot' + n);
				// $warp.children('table:eq(1)').children('thead').children('tr').children('td').children('strong').attr('id', 'nomor_r' + n);
				// $warp.children('table:eq(1)').children('thead').children('tr').children('td').children('button').attr('onclick', 'removeR(' + $(this) + ')');
				// $warp.children('table:eq(1)').children('thead').children('tr').children('td').children('span').attr('id', 'cara-buat-r' + n);

				// $warp.children('table:eq(1)').children('tbody').children('tr').attr('class', 'tr-rows' + n);

				// new

				// var jml_detail = $(`.tr-rows${n}`).length;
				// for (let h = 0; h <= (jml_detail - 1); h++) {

				// $('.tr-rows' + n + ':eq(' + h + ')').children('td:eq(0)').children('span.brg').children('input').attr('name', 'id_barang' + n + '[]');
				// $('.tr-rows' + n + ':eq(' + h + ')').children('td:eq(0)').children('span.brg').children('input').attr('id', 'id-barang' + n + '' + h);

				// $('.tr-rows' + n + ':eq(' + h + ')').children('td:eq(0)').children('span.krs').children('input').attr('name', 'obatkronis' + n + '[]');
				// $('.tr-rows' + n + ':eq(' + h + ')').children('td:eq(0)').children('span.krs').children('input').attr('id', 'obatkronis' + n + '' + h);

				// $('.tr-rows' + n + ':eq(' + h + ')').children('td:eq(1)').children('input').attr('name', 'dosisracik' + n + '[]');
				// $('.tr-rows' + n + ':eq(' + h + ')').children('td:eq(1)').children('input').attr('id', 'dosisracik' + n + '' + h);

				// $('.tr-rows' + n + ':eq(' + h + ')').children('td:eq(2)').children('input').attr('name', 'jmlpakai' + n + '[]');
				// $('.tr-rows' + n + ':eq(' + h + ')').children('td:eq(2)').children('input').attr('id', 'jmlpakai' + n + '' + h);

				// $('.tr-rows' + n + ':eq(' + h + ')').children('td:eq(3)').children('input').attr('name', 'jmldetail' + n + '[]');
				// $('.tr-rows' + n + ':eq(' + h + ')').children('td:eq(3)').children('input').attr('id', 'jmldetail' + n + '' + h);

				// $('.tr-rows' + n + ':eq(' + h + ')').children('td:eq(3)').children('button').attr('onclick', 'removeElement(' + n + ',this)');
				// }
				// 	i++;
				// }

				totalHargaBarang();
				totalJasaFarmasi();
			}
		})
	}

	function getListHistoryResep(p, id_resep) {
		let id = '';
		if (id_resep !== undefined) {
			id = id_resep;
			$('#id-resep-history').val(id_resep)
		}

		$.ajax({
			type: 'GET',
			url: '<?= base_url("pelayanan/api/pelayanan/get_list_history_resep") ?>/page/' + p + '/jenis/Rawat Jalan/id/' + id,
			data: $('#form-search-resep').serialize() + '&pasien=' + $('#pasienhide').val() + '&barang=' + $('#barang-auto-history').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				if ((p > 1) & (data.data.length === 0)) {
					getListHistoryResep(p - 1);
					return false;
				}

				$('#pagination-resep').html(pagination(data.jumlah, data.limit, data.page, 2));
				$('#page-summary-resep').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

				$('#table-data-resep tbody').empty();
				let no = '';
				let num = 1;
				let html = '';
				let tempId = '';
				$.each(data.data, function(i, v) {
					let isSame = tempId === v.id;
					tempId = v.id
					html = /* html */ `
                        <tr style="font-size: 15px">
                            <td class="center">${((i + 1) + ((data.page - 1) * 20))}</td>
                            <td class="center">${isSame ? '' : v.id}</td>
                            <td class="center">${isSame ? '' : datefmysql(v.tanggal)}</td>
                            <td>${isSame ? '' : v.dokter}</td>
                            <td>${isSame ? '' : `${v.jenis_layanan} ${v.nama_poli || ''}`} <b>${isSame ? '' : `${(v.layanan_ok == 'OK' ? '<i class="fas fa-arrow-circle-right mr-1"></i>OK Central' : '')}`}</b></td>
                            <td>${v.no_r}</td>
                            <td>${v.nama_barang}</td>
                            <td class="center">${v.jumlah}</td>
                            <td class="center">${v.dosis_racik} ${v.satuan || ''}</td>
                            <td>${v.aturan_pakai}</td>
                            <td class="center">${(v.ket_resep !== null ? v.ket_resep : '-')} </td>
                        </tr>
                    `;
					html += '<tr></tr>'

					$('#table-data-resep tbody').append(html);
					if (no !== v.id) {
						num++;
					}
					no = v.id;
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

	function konfirmasiSimpanDataResep() {
		if ($('#jasa').val() === '' || $('#jasa').val() === 'undefined') {
			syams_validation('#jasa', 'Jasa farmasi harus diisikan!');
			$('#jasa').focus;
			return false;
		}
		syams_validation_remove('#jasa');
		swal.fire({
			title: 'Konfirmasi Simpan',
			html: "Apakah anda yakin akan menyimpan transaksi resep ini ?",
			icon: 'question',
			showCancelButton: true,
			buttonsStyling: true,
			confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Ya',
			cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				simpanDataResep();
			}
		})
	}

	function simpanDataResep() {
		let jml = $('.wrap').length;
		if (jml === 0) {
			swalAlert('warning', 'Validasi', 'Nama barang masih kosong');
			return false;
		}
		if ($('input[name=tanggal_resep]').val() === '') {
			swalAlert('warning', 'Validasi', 'Tanggal resep harus diisi');
			return false;
		}
		for (i = 1; i <= (jml); i++) {
			var jml_barang = $('.tr-rows' + i).length;
			if (jml_barang === 0) {
				swalAlert('warning', 'Validasi', 'Nama barang pada <b> R/ ' + i + '</b> masih kosong !');
				return false;
			}
		}
		if ($('#dokterhide').val() === '') {
			syams_validation('#dokterhide', 'Kolom nama dokter harus dipilih !');
			return false;
		}
		syams_validation_remove('#dokterhide');
		if ($('#jasa').val() === '' || $('#jasa').val() === 'undefined') {
			$('#resep-tab a:first').tab('show');
			syams_validation('#jasa', 'Jasa farmasi harus diisikan !');
			$('#jasa').focus();
			return false;
		}
		let update = '';
		if ($('#id').val() !== '') {
			update = 'id/' + $('#id').val();
		}

		const isResepPrioritas = $('#rsp-ya').is(':checked') ? 1 : 0;
		const isTerapiPulang = $('#is-terapi-pulang').is(':checked') ? 1 : 0
		if(isTerapiPulang === 1){
			setTimeout(() => {
				$('#is-terapi-pulang').click().props('checked', false);
			}, 1000);
		}

		if (klik === null) {
			klik = $.ajax({
				type: 'POST',
				url: '<?= base_url("pelayanan/api/pelayanan/simpan_data_resep") ?>/' + update,
				data: $('#form-add-resep').serialize() + `&is_resep_prioritas=${isResepPrioritas}&is_terapi_pulang=${isTerapiPulang}&obat_pulang=`,
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader();
				},
				success: function(data) {
					console.log(data.asal_input_resep);
					$('input[name=csrf_syam]').val(data.token);
					let page = $('#page-now').val();
					$('#modal-form-resep').modal('hide');

					if (data.asal_input_resep !== 'resep' && data.asal_input_resep !== '') {

						if (data.asal_input_resep === 'radiologi') {

							getListDataHasilRadiologi(1);

						} else if (data.asal_input_resep === 'ok') {

							getListDataOperasi(1);

						} else {

							getListPemeriksaan(1);

						}
					} else {
						if (data.act === 'edit') {
							messageEditSuccess();
							getListResep(1, data.id_lp);
						} else {
							messageAddSuccess();
							getListResep(1, data.id_lp);
							cetakBuktiPelayanan(data.id, 1);
						}
					}
				},
				complete: function() {
					hideLoader();
				},
				error: function(e) {
					if ($('#id').val() !== '') {
						messageEditFailed();
					} else {
						messageAddFailed();
					}
				}
			});
		}
	}

	function sediaanAuto(no_r) {
		$(`#sediaan${no_r}`).select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/sediaan_auto') ?>",
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
		});
	}

	function updateCountAturanPakai(id) {
		$.ajax({
			type: 'POST',
			url: '<?= base_url("pelayanan/api/pelayanan/update_selected_aturan_pakai") ?>',
			data: {
				id
			},
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				console.log(data);
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}
</script>