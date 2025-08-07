<script>
	// IPI
	var nomer = 1;
	nomer++;

	$('#tanggal-ipi').datetimepicker({
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

	function removeList(el) {
        if (el && el.parentNode && el.parentNode.parentNode) {
            var parent = el.parentNode.parentNode;
            parent.parentNode.removeChild(parent);
        }
    }

    function removeListTable(el) {
        if (el && el.parentNode && el.parentNode.parentNode && el.parentNode.parentNode.parentNode) {
            var parent = el.parentNode.parentNode.parentNode;
            parent.parentNode.removeChild(parent);
        }
    }

	function lihatFORM_KEP_111_00(data) {
		let pasien = data.pasien;
		let layanan = data.layanan;
		let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
		let action = 'lihat';

		// Memanggil fungsi cetakIndikasiPasienMasukICUFORMRM
		cetakIndikasiPasienMasukICUFORMRM(id, layanan.id_pendaftaran, layanan.id, action, bed);
		
		// Menyembunyikan tombol dengan ID 'btn-ipi'
		let btnIpi = document.getElementById('btn-ipi');
		if (btnIpi) {
			btnIpi.style.display = 'none'; // Mengatur tampilan tombol menjadi tersembunyi
		}
		tabelIndikasiTamBahan();
	}

    function editFORM_KEP_111_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';
        cetakIndikasiPasienMasukICUFORMRM(id, layanan.id_pendaftaran, layanan.id, action,  bed);
    }

    function tambahFORM_KEP_111_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';
		let id ='';
        cetakIndikasiPasienMasukICUFORMRM(id, layanan.id_pendaftaran, layanan.id, action,  bed);
    }

	$('#btn-ipi').on('click', function() {
		var tglValue    = $('#tanggal-ipi').val(); // Mengambil nilai dari elemen HTML dengan ID 'tanggal-ipi' (misalnya, input tanggal) dan menyimpannya ke dalam variabel 'tglValue'.
		var ajaxData = {
			tgl: tglValue, // Mengisi properti 'tgl' dalam objek 'ajaxData' dengan nilai 'tglValue' (nilai tanggal yang diambil dari input).
			nama_pasien: $('#namapasien-ipi').val(),  // Mengambil nilai dari elemen dengan ID 'namapasien-ipi' (nama pasien) dan mengisinya ke dalam properti 'nama_pasien'.
			diagnosa: $('#diagnosa-pasien-indikasi-icu').val(), // Mengambil nilai dari elemen dengan ID 'diagnosa-pasien-indikasi-icu' (diagnosa pasien) dan mengisinya ke dalam properti 'diagnosa'.
			ruang : $('#ruangasal-ipi').val(), // Mengambil nilai dari elemen dengan ID 'ruangasal-ipi' (ruangan asal pasien) dan mengisinya ke dalam properti 'ruang'.
			id: $('#id-indikasi-pasien-masuk-icu').val(),   // Mengambil nilai dari elemen dengan ID 'id-indikasi-pasien-masuk-icu' (ID indikasi pasien masuk ICU) dan mengisinya ke dalam properti 'id'.
			id_user: <?= $this->session->userdata("id_translucent") ?>, // Mengambil data ID pengguna (user) dari sesi pengguna yang sedang login, diambil menggunakan fungsi PHP `$this->session->userdata()` 
			// dan dimasukkan ke dalam properti 'id_user'. 'id_translucent' adalah nama variabel sesi yang menyimpan ID pengguna.
			id_pendaftaran: $('#id-pendaftaran-indikasi-pasien-masuk-icu').val(),   // Mengambil nilai dari elemen dengan ID 'id-pendaftaran-indikasi-pasien-masuk-icu' (ID pendaftaran pasien) dan mengisinya ke dalam properti 'id_pendaftaran'.
			id_layanan_pendaftaran: $('#id-layanan-pendaftaran-indikasi-pasien-masuk-icu').val() // Mengambil nilai dari elemen dengan ID 'id-layanan-pendaftaran-indikasi-pasien-masuk-icu' (ID layanan pendaftaran) dan mengisinya ke dalam properti 'id_layanan_pendaftaran'.
		};
		$.ajax({
			type: 'POST',
			url: '<?= base_url("rawat_inap/api/rawat_inap/simpan_ipi") ?>',
			data: ajaxData,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {	
				// console.log(data);
				hideLoader();
				$.each(data, function(i, v) {
					let action = 'edit';
					cetakIndikasiPasienMasukICUFORMRM(v.id, v.id_pendaftaran, v.id_layanan_pendaftaran, action);
				});
			},
			error: function(e) {
				console.error("AJAX Error:", e);
				hideLoader(); // Hide loader on error
				messageAddFailed();
			}
		});
		$('#tanggal-ipi').val('');       
	});

	function cetakIndikasiPasienMasukICUFORMRM(id, id_pendaftaran, id_layanan_pendaftaran, action, layanan, bed) {
		var groupAccount = '<?= $this->session->userdata('account_group') ?>';
		var profesi = '<?= $this->session->userdata('profesinadis') ?>';
		if (groupAccount == 'Admin') {
			profesi = 'Perawat';
		}
		if (action !== 'lihat') {
			$('#btn_simpan').show();
		} else {
			$('#btn_simpan').hide();
		}

		$.ajax({
			type: 'GET',
            url: '<?= base_url("rawat_inap/api/rawat_inap/get_indikasi_pasien_masuk_icu") ?>/id/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {	
				resetModalIndikasiPasienMasukICUFORMRM()

				if (!data.indikasi_pasien_masuk_icu) {
					$('#diagnosa-pasien-indikasi-icu').val(data.indikasi_pasien_masuk_icu[0].diagnosa_pasien);
				}

				let lainnya = data.diagnosa 
					.filter(diagnosa => diagnosa.log !== '1') // Menggunakan fungsi .filter() untuk memfilter data 'diagnosa', 
					// hanya diagnosa yang properti 'log'-nya tidak sama dengan '1' yang disertakan dalam hasil.					
					.map(diagnosa => { // Menggunakan fungsi .map() untuk memproses setiap diagnosa yang lolos filter.					
						let item = diagnosa.item; // Variabel 'item' diisi dengan nilai properti 'item' dari setiap diagnosa.						
						if (diagnosa.prioritas === 'Utama') { 
							item += " (Utama)"; 
							// Jika prioritas diagnosa adalah 'Utama', maka teks "(Utama)" ditambahkan ke dalam 'item'.
						}					
						return item + "."; // Mengembalikan nilai 'item' yang ditambahkan tanda titik (".") di akhir.
					})					
					.join('<br>'); // Menggabungkan semua item yang sudah diproses menjadi satu string, dipisahkan dengan '<br>' (baris baru dalam HTML).

				$('#diagnosa-last').html(lainnya).val(lainnya); // Menggunakan jQuery untuk mengubah isi HTML dan nilai dari elemen dengan ID 'diagnosa-last' menjadi string 'lainnya'.
				$('#diagnosa-pasien-indikasi-icu').html(lainnya).val(lainnya); // Menggunakan jQuery untuk mengubah isi HTML dan nilai dari elemen dengan ID 'diagnosa-pasien-indikasi-icu' menjadi string 'lainnya'.

				let layanan = data.pendaftaran_detail.layanan; // Mendeklarasikan variabel 'layanan' dan mengisinya dengan data dari 'data.pendaftaran_detail.layanan'.
				let bangsal = layanan.bangsal; // Mendeklarasikan variabel 'bangsal' yang mengambil nilai dari properti 'bangsal' di dalam objek 'layanan'.
				let bangsalItem = layanan.layanan; // Mendeklarasikan variabel 'bangsalItem' yang mengambil nilai dari properti 'layanan' di dalam objek 'layanan'.
				bangsal = bangsal != "" ? bangsal : bangsalItem; // Mengecek apakah 'bangsal' tidak kosong; jika kosong, maka 'bangsal' diisi dengan nilai 'bangsalItem'.
				$('#ruangasal-ipi').text(bangsal).val(bangsal); // Menggunakan jQuery untuk mengubah teks dan nilai dari elemen HTML dengan ID 'ruangasal-ipi' menjadi nilai 'bangsal'.

				let pasien = data.pendaftaran_detail ? data.pendaftaran_detail.pasien : null; 
				// Mengecek apakah 'data.pendaftaran_detail' ada (tidak null atau undefined). 
				// Jika ada, variabel 'pasien' diisi dengan nilai 'data.pendaftaran_detail.pasien'. Jika tidak, 'pasien' diisi dengan null.
				let namaPasien = pasien ? pasien.nama : ''; 
				// Mengecek apakah 'pasien' ada (tidak null atau undefined). 
				// Jika ada, variabel 'namaPasien' diisi dengan nilai 'pasien.nama'. Jika tidak, 'namaPasien' diisi dengan string kosong ('').
				$('#namapasien-ipi').text(namaPasien).val(namaPasien); 
				// Menggunakan jQuery untuk mengubah teks dan nilai dari elemen HTML dengan ID 'namapasien-ipi' menjadi nilai 'namaPasien'.

				$('#modal-indikasi-pasien-masuk-icu-title').html(
					`<b>Form Indikasi Pasien Masuk ICU</b> | No. RM: ${data.pendaftaran_detail.pasien.id_pasien}, Nama: ${data.pendaftaran_detail.pasien.nama}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data.pendaftaran_detail.pasien.telp}</b></i>`
				);
				$('#id-indikasi-pasien-masuk-icu').val(id);
				$('#id-pendaftaran-indikasi-pasien-masuk-icu').val(id_pendaftaran);
				$('#id-layanan-pendaftaran-indikasi-pasien-masuk-icu').val(id_layanan_pendaftaran);
				$('#id-pasien-indikasi-pasien-masuk-icu').val(data.pendaftaran_detail.pasien.id_pasien);
				$('#modal_indikasi_pasien_masuk_icu_ipi').modal('show');
				
				if (typeof data.tabel_indikasi_tambahan !== 'undefined' || data.tabel_indikasi_tambahan !== null) {
                    tabelIndikasiTamBahan(data.tabel_indikasi_tambahan, id_pendaftaran, id_layanan_pendaftaran, action, lainnya, bangsal, namaPasien);
                } else {
                    $('#table-indikasi-wesa .body-table').empty();
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

	function tabelIndikasiTamBahan(data, id_pendaftaran, id_layanan_pendaftaran, action, lainnya, bangsal, namaPasien) {
		$('#table-indikasi-wesa .body-table').empty();
		if (data !== null) {	
			$.each(data, function(index, v) {	
				let deleteButton = ''; 				
				// Jika action bukan 'lihat', tampilkan tombol hapus
				if (action !== 'lihat') {
					deleteButton = `
						<button type="button" class="btn btn-warning btn-xs" onclick="konfirmasihapusIndikasiPasienICU('${v.id}', '${v.id_pendaftaran}', '${v.id_layanan_pendaftaran}')">
							<i class="fas fa-trash-alt"></i> Hapus
						</button>
					`;
				}
				let html = /* html */ `
					<tr>
						<td class="number-terapi" align="center">${index + 1}</td>
						<td align="center">
							<span>${datefmysql(v.tanggal_ipi)}</span>
							<input type="hidden" class="custom-form tanggal-edit clear-input d-inline-block col-lg-5" value="${datefmysql(v.tanggal_ipi)}">
						</td>
						<td align="center">${namaPasien}</td>
						<td> ${v.diagnosa}</td>
						<td align="center">${v.ruang}</td>
						<td align="center">${v.petugas}</td>
						<td class="center" colspan="2">
							<button type="button" class="btn btn-success btn-xs" onclick="simpanIndikasiPasienICU('${v.id}', '${v.id_pendaftaran}', '${v.id_layanan_pendaftaran}')">
								<i class="fas fa-fw fa-save mr-1"></i> Print
							</button>
							${deleteButton}
						</td>
					</tr>
				`;
				$('#table-indikasi-wesa tbody').append(html);
			});
		}
	}

	function konfirmasihapusIndikasiPasienICU(id, id_pendaftaran, id_layanan_pendaftaran) {
        swal.fire({
            title: 'Hapus Data',
            text: "Apakah anda yakin akan menghapus ?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-trash-alt mr-1"></i>Hapus',
            cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
				let action ='edit';
                hapusIndikasiPasienICU(id, id_pendaftaran, id_layanan_pendaftaran, action);
            }
        })
    }

	function hapusIndikasiPasienICU(id, id_pendaftaran, id_layanan_pendaftaran, action) {
        $.ajax({
            type: 'DELETE',
            url: '<?= base_url("rawat_inap/api/rawat_inap/hapus_indikasi_pasien_icu") ?>/' + id + '/' + id_pendaftaran + '/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {			
                hideLoader(); 
                if (data.respon !== null) {
                    cetakIndikasiPasienMasukICUFORMRM(id, id_pendaftaran, id_layanan_pendaftaran, action);
                }
            },
            error: function(e) {
                console.error("AJAX Error:", e);
                hideLoader(); // Hide loader on error
                messageAddFailed();
            }
        });
    }

	function resetModalIndikasiPasienMasukICUFORMRM() {
		$('#indikasi-pasien-masuk-icu').val('');
		$('#diagnosa-pasien-indikasi-icu').val('');
		$('#diagnosa-last').val('');
	}

	function simpanIndikasiPasienICU(id, id_pendaftaran, id_layanan_pendaftaran) {	
        $.ajax({
            type: 'POST',
			url: '<?= base_url("rawat_inap/api/rawat_inap/simpan_indikasi_pasien_masuk_icu") ?>/id/' + id + '/id_pendaftaran/' + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
				// console.log(data);		
                if (data !== '' || data !== null || data !== undifined) {					
					// Lebar dan tinggi jendela
					var dWidth = $(window).width();
					var dHeight = $(window).height();
					var x = (screen.width / 2) - (dWidth / 2);
					var y = (screen.height / 2) - (dHeight / 2);

					var diagnosa = data.diagnosa;
					var id_pendaftaran = data.id_pendaftaran;
					var id_layanan = data.id_layanan_pendaftaran;
					var id_pasien = data.id_pasien;
					var id = data.id;
                    window.open('<?= base_url('rawat_inap/cetak_indikasi_pasien_masuk_icu/') ?>' + id + '/' + id_pendaftaran + '/' + id_layanan, 'Cetak Indikasi Pasien Masuk ICU', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
                    messageCustom(data.message, 'Success');
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

</script>


