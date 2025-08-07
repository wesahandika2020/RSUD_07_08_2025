<script>
    function lihatFORM_REM_33_00(data) {
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
        window.open('<?= base_url('pemeriksaan_poli/cetak_persetujuan_tindakan_operasi/') ?>' + layanan.id,
                    'Cetak Persetujuan Tindakan Operasi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);							
    }



    function editFORM_REM_33_00(data) {
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
        cetakPersetujuanTindakanOperasi(details,action);
    }



    function tambahFORM_REM_33_00(data) {
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
        cetakPersetujuanTindakanOperasi(details,action);
    }



    function cetakPersetujuanTindakanOperasi(details,action) {
        // console.log(details,action);
        $('#btn_simpan').hide();
        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        var profesi = '<?= $this->session->userdata('profesinadis') ?>';
        groupAccount == 'Admin' ? profesi = 'Perawat' : '' ;
        action !== 'lihat' ? $('#btn_simpan').show() : $('#btn_simpan').hide();

        let detail = details.split('#');
        $.ajax({
            type: 'GET',
            url: '<?= base_url('rekam_medis/api/rekam_medis/check_persetujuan_tindakan_operasi') ?>/id/' + detail[
                0],
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                resetModalPersetujuanTindakanOperasi();

                $('#modal-persetujuan-tindakan-operasi-title').html(
                    `<b>Form Persetujuan Tindakan Operasi</b> | No. RM: ${detail[1]}, Nama: ${detail[2]}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[10]}</b></i>`
                );
                $('#nama-keluarga-mpto').val(data.nama_keluarga);
                $('#tanggal-lahir-mpto').val(datefmysql(data.tanggal_lahir));
                $('#id-pasien-form-mpto').val(detail[1]);
                $('#id-pendaftaran-form-mpto').val(detail[12]);
                $('#id-layanan-pendaftaran-form-mpto').val(detail[0]);
                $('#alamat-form-rekam-medis-mpto').val(data.alamat);
                $('#hubungan-keluarga-mpto').val(data.hubungan_keluarga);
                $('#tindakan-mpto').val(data.tindakan);
                $('#id-saksi-1-mpto').val(data.id_saksi_1);
                $('#id-saksi-2-mpto').val(data.id_saksi_2);
                $('#s2id_saksi-1-mpto a .select2c-chosen').html(data.nama_saksi_1);
                $('#s2id_saksi-2-mpto a .select2c-chosen').html(data.nama_saksi_2);

                if (data.is_pasien === '1') {
                    document.getElementById("is-pasien-ya-mpto").checked = true;
                    $("#nama-keluarga-mpto").prop("disabled", true);
                    $("#tanggal-lahir-mpto").prop("disabled", true);
                    $("#laki-laki-mpto").prop("disabled", true);
                    $("#perempuan-mpto").prop("disabled", true);
                    $("#alamat-form-rekam-medis-mpto").prop("disabled", true);
                    $("#hubungan-keluarga-mpto").prop("disabled", true);
                } else if (data.is_pasien === '0') {
                    document.getElementById("is-pasien-tidak-mpto").checked = true;
                    $("#nama-keluarga-mpto").prop("disabled", false);
                    $("#tanggal-lahir-mpto").prop("disabled", false);
                    $("#laki-laki-mpto").prop("disabled", false);
                    $("#perempuan-mpto").prop("disabled", false);
                    $("#alamat-form-rekam-medis-mpto   ").prop("disabled", false);
                    $("#hubungan-keluarga-mpto").prop("disabled", false);
                }

                if (data.jenis_kelamin == 'Laki-laki') {
                    document.getElementById("laki-laki-mpto").checked = true;
                } else if (data.jenis_kelamin == 'Perempuan') {
                    document.getElementById("perempuan-mpto").checked = true;
                }

                $('#modal-persetujuan-tindakan-operasi').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

	function resetModalPersetujuanTindakanOperasi() {
        $('#id-layanan-pendaftaran-form-mpto').val('');
        $('#nama-keluarga-mpto').val('');
        $('#tanggal-lahir-mpto').val('');
        $('#alamat-form-rekam-medis-mpto').val('');
        $('#hubungan-keluarga-mpto').val('');
        $('#tindakan-mpto').val('');
        $('#id-saksi-1-mpto').val('');
        $('#id-saksi-2-mpto').val('');
        $('#s2id_saksi-1-mpto a .select2c-chosen').html('Silahkan dipilih');
        $('#s2id_saksi-2-mpto a .select2c-chosen').html('Silahkan dipilih');

        document.getElementById("laki-laki-mpto").checked = false;
        document.getElementById("perempuan-mpto").checked = false;
        document.getElementById("is-pasien-ya-mpto").checked = false;
        document.getElementById("is-pasien-tidak-mpto").checked = false;

        $("#nama-keluarga-mpto").prop("disabled", false);
        $("#tanggal-lahir-mpto").prop("disabled", false);
        $("#laki-laki-mpto").prop("disabled", false);
        $("#perempuan-mpto").prop("disabled", false);
        $("#alamat-form-rekam-medis-mpto").prop("disabled", false);
        $("#hubungan-keluarga-mpto").prop("disabled", false);
    }

</script>