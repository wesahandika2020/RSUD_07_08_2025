<script>
    function lihatFORM_PMD_20_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed;

        if (layanan.bangsal_ic && layanan.no_bed_ic) {
            bed = `${layanan.bangsal_ic} No. Bed ${layanan.no_bed_ic}`;
        } else if (layanan.bangsal && layanan.kelas && layanan.no_ruang && layanan.no_bed) {
            bed = `${layanan.bangsal} kelas ${layanan.kelas} ruang ${layanan.no_ruang} No. Bed ${layanan.no_bed}`;
        } else {
            bed = `${layanan.jenis_layanan}`;
        }
        
        let action  = 'lihat';
        window.open('<?= base_url('pemeriksaan_poli/cetak_surat_keterangan_pemeriksaan_mata/') ?>' + layanan.id,
                    'Cetak Surat Keterangan Pemeriksaan Mata', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
    }

    function editFORM_PMD_20_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed;

        if (layanan.bangsal_ic && layanan.no_bed_ic) {
            bed = `${layanan.bangsal_ic} No. Bed ${layanan.no_bed_ic}`;
        } else if (layanan.bangsal && layanan.kelas && layanan.no_ruang && layanan.no_bed) {
            bed = `${layanan.bangsal} kelas ${layanan.kelas} ruang ${layanan.no_ruang} No. Bed ${layanan.no_bed}`;
        } else {
            bed = `${layanan.jenis_layanan}`;
        }
        
        let action  = 'edit';
		let details = layanan.id + '#' + pasien.id_pasien + '#' + pasien.nama + '#' + layanan.dokter + '#' + layanan.id_dokter + '#' + hitungUmur(pasien.tanggal_lahir) + '#' + layanan.jenis_layanan + '#' + layanan.id_penjamin + '#' + layanan.penjamin + '#' + layanan.cara_bayar + '#' + pasien.telp + '#rajal' + '#' + layanan.id_pendaftaran;
        cetakSuratKeteranganPemeriksaanMata(details,action);
    }

    function tambahFORM_PMD_20_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed;

        if (layanan.bangsal_ic && layanan.no_bed_ic) {
            bed = `${layanan.bangsal_ic} No. Bed ${layanan.no_bed_ic}`;
        } else if (layanan.bangsal && layanan.kelas && layanan.no_ruang && layanan.no_bed) {
            bed = `${layanan.bangsal} kelas ${layanan.kelas} ruang ${layanan.no_ruang} No. Bed ${layanan.no_bed}`;
        } else {
            bed = `${layanan.jenis_layanan}`;
        }
        
        let action  = 'tambah';
		let details = layanan.id + '#' + pasien.id_pasien + '#' + pasien.nama + '#' + layanan.dokter + '#' + layanan.id_dokter + '#' + hitungUmur(pasien.tanggal_lahir) + '#' + layanan.jenis_layanan + '#' + layanan.id_penjamin + '#' + layanan.penjamin + '#' + layanan.cara_bayar + '#' + pasien.telp + '#rajal' + '#' + layanan.id_pendaftaran;
        cetakSuratKeteranganPemeriksaanMata(details,action);
    }

    function cetakSuratKeteranganPemeriksaanMata(details,action) {
        $('#btn_simpan').hide();
        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        var profesi = '<?= $this->session->userdata('profesinadis') ?>';
        groupAccount == 'Admin' ? profesi = 'Perawat' : '' ;
        action !== 'lihat' ? $('#btn_simpan').show() : $('#btn_simpan').hide();

		let detail = details.split('#');
		// console.log(detail);
		// $('#modal_surat_keterangan_pemeriksaan_mata').modal('show');
		$.ajax({
			type: 'GET',
			url: '<?= base_url('rekam_medis/api/rekam_medis/surat_keterangan_pemeriksaan_mata') ?>/id/' + detail[0],
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				resetModalSuratKeteranganPemeriksaanMata();
				// Set values in Penolakan Tindakan Kedokteran modal
				$('#modal-surat-keterangan-pemeriksaan-mata-title').html(`<b>Form Surat Keterangan Pemeriksaan Mata</b> | No. RM: ${detail[2]}, Nama: ${detail[1]}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[3]}</b></i>`);
				$('#id-pasien-skpm').val(detail[1]);
                $('#id-pendaftaran-skpm').val(detail[12]);
                $('#id-layanan-pendaftaran-skpm').val(detail[0]);
				$('#id-users').val(data.id_users);
				$('#nama-skpm').val(data.nama_skpm);
				$('#no-rm-skpm').val(data.no_rm_skpm);
				$('#usia-skpm').val(data.usia_skpm);
				$('#ktp-skpm').val(data.ktp_skpm);
				$('#alamat-skpm').val(data.alamat_skpm);
				$('#tlp-skpm').val(data.tlp_skpm);

				if (data.ya_skpm === '1') {
					document.getElementById("ya-skpm-1").checked = true;
					// Disabled fields
					$("#nama-skpm").prop("disabled", true);
					$("#l-skpm-1").prop("disabled", true);
					$("#p-skpm-2").prop("disabled", true);
					$("#no-rm-skpm").prop("disabled", true);
					$("#usia-skpm").prop("disabled", true);
					$("#ktp-skpm").prop("disabled", true);
					$("#alamat-skpm").prop("disabled", true);
					$("#tlp-skpm").prop("disabled", true);
				} else if (data.ya_skpm === '0') {
					document.getElementById("tidak-skpm-2").checked = true;
					// Undisabled fields
					$("#nama-skpm").prop("disabled", false);
					$("#l-skpm-1").prop("disabled", false);
					$("#p-skpm-2").prop("disabled", false);
					$("#no-rm-skpm").prop("disabled", false);
					$("#usia-skpm").prop("disabled", false);
					$("#ktp-skpm").prop("disabled", false);
					$("#alamat-skpm").prop("disabled", false);
					$("#tlp-skpm").prop("disabled", false);
				}
				if (data.skpm == 'L') {
					document.getElementById("l-skpm-1").checked = true;
				} else if (data.skpm == 'P') {
					document.getElementById("p-skpm-2").checked = true;
				}
				$('#tajam-pengelihatan-skpm').val(data.tajam_pengelihatan_skpm);
				$('#mata-kanan-skpm').val(data.mata_kanan_skpm);
				$('#mata-kiri-skpm').val(data.mata_kiri_skpm);
				$('#anterior-kanan-skpm').val(data.anterior_kanan_skpm);
				$('#anterior-kiri-skpm').val(data.anterior_kiri_skpm);
				$('#posterior-kanan-skpm').val(data.posterior_kanan_skpm);
				$('#posterior-kiri-skpm').val(data.posterior_kiri_skpm);
				$('#p-warna-skpm').val(data.p_warna_skpm);
				$('#catatan-skpm').val(data.catatan_skpm);
				if (data.tanpa_kacamata_kanan_skpm === '1') {
					document.getElementById("tanpa-kacamata-kanan-skpm").checked = true;
				}
				if (data.tanpa_kacamata_kiri_skpm === '1') {
					document.getElementById("tanpa-kacamata-kiri-skpm").checked = true;
				}
				if (data.anterior_mata_kanan_skpm === '1') {
					document.getElementById("anterior-mata-kanan-skpm").checked = true;
				}
				if (data.anterior_mata_kiri_skpm === '1') {
					document.getElementById("anterior-mata-kiri-skpm").checked = true;
				}
				if (data.posterior_mata_kanan_skpm === '1') {
					document.getElementById("posterior-mata-kanan-skpm").checked = true;
				}
				if (data.posterior_mata_kiri_skpm === '1') {
					document.getElementById("posterior-mata-kiri-skpm").checked = true;
				}
				$('#tanggal-skpm').val(data.tanggal_skpm);
				$('#ttd-dokter-skpm').val(data.ttd_dokter_skpm);
				$('#s2id_ttd-dokter-skpm a .select2c-chosen').html(data.nama_dokter_1);
				if (data.ceklis_dokter_skpm === '1') {
					document.getElementById("ceklis-dokter-skpm").checked = true;
				}
				$('#modal_surat_keterangan_pemeriksaan_mata').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
	}

	function resetModalSuratKeteranganPemeriksaanMata() {
		// Set default fields
		$('#id-layanan-pendaftaran-skpm').val('');
		$('#id-users').val('');
		$('#nama-skpm').val('');
		$('#no-rm-skpm').val('');
		$('#usia-skpm').val('');
		$('#ktp-skpm').val('');
		$('#alamat-skpm').val('');
		$('#tlp-skpm').val('');
		$('#tajam-pengelihatan-skpm').val('');
		$('#mata-kanan-skpm').val('');
		$('#mata-kiri-skpm').val('');
		$('#anterior-kanan-skpm').val('');
		$('#anterior-kiri-skpm').val('');
		$('#posterior-kanan-skpm').val('');
		$('#posterior-kiri-skpm').val('');
		$('#p-warna-skpm').val('');
		$('#catatan-skpm').val('');
		$('#tanggal-skpm').val('');
		$('#ttd-dokter-skpm').val('');
		document.getElementById("l-skpm-1").checked = false;
		document.getElementById("p-skpm-2").checked = false;
		document.getElementById("tanpa-kacamata-kanan-skpm").checked = false;
		document.getElementById("tanpa-kacamata-kiri-skpm").checked = false;
		document.getElementById("anterior-mata-kanan-skpm").checked = false;
		document.getElementById("anterior-mata-kiri-skpm").checked = false;
		document.getElementById("posterior-mata-kanan-skpm").checked = false;
		document.getElementById("posterior-mata-kiri-skpm").checked = false;
		document.getElementById("ceklis-dokter-skpm").checked = false;
		$("#nama-skpm").prop("disabled", false);
		$("#l-skpm-1").prop("disabled", false);
		$("#p-skpm-2").prop("disabled", false);
		$("#no-rm-skpm").prop("disabled", false);
		$("#usia-skpm").prop("disabled", false);
		$("#ktp-skpm").prop("disabled", false);
		$("#alamat-skpm").prop("disabled", false);
		$("#tlp-skpm").prop("disabled", false);
	}
	
</script>