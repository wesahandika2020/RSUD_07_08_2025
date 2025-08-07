

<script>
    
    // NAMA PERAWAT
    $('#perawat-prdnr-1, #perawat-prdnr-2').select2c({
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

    // NAMA DOKTER 
    $('#dokter-prdnr, #dokter-pelaksana, #dokter-pemberi').select2c({
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
            var markup = '<b>' + data.nama + '</b><br/><i>' + data.spesialisasi + '</i>';
            return markup;
        },
        formatSelection: function(data) {
            return data.nama;
        }
    });

    $('#btn-expand-all-prdnr').click(function() {
        $('.multi-collapse').addClass('show');
    });

    $('#btn-collapse-all-prdnr').click(function() {
        $('.multi-collapse').removeClass('show');
    });
        
    function lihatFORM_KEP_113_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';

        // PRDNR
        $('#modal-penolakan-resusitas-lihat').modal('show');

        cetakFormSuratPenolakanResusitas = function() {
            window.open('<?= base_url("pendaftaran_igd/cetak_surat_penolakan_resusitas/") ?>' + layanan.id, 'Cetak Surat Penolakan Resusitas', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
        }

        cetakSuratPenolakanResusitas = function() {
            window.open('<?= base_url("pendaftaran_igd/cetak_form_surat_penolakan_resusitas/") ?>' + layanan.id, 'Cetak Surat Penolakan Resusitas', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
        }
    }

    function editFORM_KEP_113_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';
        cetakPR(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function tambahFORM_KEP_113_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';
        cetakPR(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    // On change for radio button is pasien 1
	$('input[type=radio][name=pr_prdnr]').change(function(){ 
		if (this.value === 'ya') {
			// Set fields to empty string
			$('#nama-prdnr').val('');
			$('#tgl-lahir-prdnr').val('');
			document.getElementById("jk-prdnr-1").checked = false;
			document.getElementById("jk-prdnr-2").checked = false;
			$('#alamat-prdnr').val('');
			$('#hubungan-keluarga-prdnr').val('');
			
			// Disabled fields
			$( "#nama-prdnr" ).prop( "disabled", true );
			$( "#tgl-lahir-prdnr" ).prop( "disabled", true );
			$( "#jk-prdnr-1" ).prop( "disabled", true );
			$( "#jk-prdnr-2" ).prop( "disabled", true );
			$( "#alamat-prdnr" ).prop( "disabled", true );
			$( "#hubungan-keluarga-prdnr" ).prop( "disabled", true );	

		} else if (this.value === 'tidak') {
			// Undisabled fields
            $( "#nama-prdnr" ).prop( "disabled", false );
			$( "#tgl-lahir-prdnr" ).prop( "disabled", false );
			$( "#jk-prdnr-1" ).prop( "disabled", false );
			$( "#jk-prdnr-2" ).prop( "disabled", false );
			$( "#alamat-prdnr" ).prop( "disabled", false );
			$( "#hubungan-keluarga-prdnr" ).prop( "disabled", false );  		
		}
	});

    function cetakPR(id_pendaftaran, id_layanan_pendaftaran, bed, action) {
        // $('#modal-penolakan-resusitas').modal('show');
        $('#btn-simpan').hide();
        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        if (action !== 'lihat') {
            $('#btn-simpan').show();
        } else {
            $('#btn-simpan').hide();
        }

        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/form_penolakan_resusitas") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // console.log(data);
                $('#modal-penolakan-resusitas').modal('show');
                resetPenolakanResusitas(); 
                $('#id-layanan-pendaftaran-prdnr').val(id_layanan_pendaftaran);
                $('#id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-prdnr').val(id_pendaftaran);
                
                if (data.pasien !== null) {
                    $('#id-pasien-prdnr').val(data.pasien.id_pasien);
                    $('#nama-pasien-form').text(data.pasien.nama);
                    $('#norm-pasien-form').text(data.pasien.no_rm);
                    $('#ttl-pasien-form').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#jk-pasien-form').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                }

                let penolakan_resusitas = data.penolakan_resusitas;
                    if (data.penolakan_resusitas !== null) {  
                        $('#id-pasien-prdnr').val(data.penolakan_resusitas.id);                      
                        $('#dokter-pelaksana').val(data.penolakan_resusitas.dokter_pelaksana);
                        $('#s2id_dokter-pelaksana a .select2c-chosen').html(data.penolakan_resusitas.nama_dokter_1);
                        $('#dokter-pemberi').val(data.penolakan_resusitas.dokter_pemberi);
                        $('#s2id_dokter-pemberi a .select2c-chosen').html(data.penolakan_resusitas.nama_dokter_2);
                        $('#penerima-form-1').val(data.penolakan_resusitas.penerima_form_1);
                        $('#diagnosis-form').val(data.penolakan_resusitas.diagnosis_form);                 
                        $('#alasan-form').val(data.penolakan_resusitas.alasan_form);                   
                        $('#tata-form').val(data.penolakan_resusitas.tata_form);                
                        $('#tujuan-form').val(data.penolakan_resusitas.tujuan_form);                
                        $('#resiko-form').val(data.penolakan_resusitas.resiko_form);              
                        $('#prognosis-form').val(data.penolakan_resusitas.prognosis_form);                
                        $('#alternatif-form').val(data.penolakan_resusitas.alternatif_form);            
                        $('#hal-form').val(data.penolakan_resusitas.hal_form);
                        if (data.penolakan_resusitas.tanda_form_1 == '1') { $('#tanda-form-1').prop('checked', true) }    
                        if (data.penolakan_resusitas.tanda_form_2 == '1') { $('#tanda-form-2').prop('checked', true) }    
                        if (data.penolakan_resusitas.tanda_form_3 == '1') { $('#tanda-form-3').prop('checked', true) }    
                        if (data.penolakan_resusitas.tanda_form_4 == '1') { $('#tanda-form-4').prop('checked', true) }    
                        if (data.penolakan_resusitas.tanda_form_5 == '1') { $('#tanda-form-5').prop('checked', true) }    
                        if (data.penolakan_resusitas.tanda_form_6 == '1') { $('#tanda-form-6').prop('checked', true) }    
                        if (data.penolakan_resusitas.tanda_form_7 == '1') { $('#tanda-form-7').prop('checked', true) }    
                        if (data.penolakan_resusitas.tanda_form_8 == '1') { $('#tanda-form-8').prop('checked', true) }  
                                  
                        if (data.penolakan_resusitas.pr_prdnr === '1') {
                            document.getElementById("pr-prdnr-1").checked = true;
                            // Disabled fields
                            $("#nama-prdnr").prop("disabled", true);
                            $("#tgl-lahir-prdnr").prop("disabled", true);
                            $("#jk-prdnr-1").prop("disabled", true);
                            $("#jk-prdnr-2").prop("disabled", true);
                            $("#alamat-prdnr").prop("disabled", true);
                            $("#hubungan-keluarga-prdnr").prop("disabled", true);
                        } else if (data.penolakan_resusitas.pr_prdnr === '0') {
                            document.getElementById("pr-prdnr-2").checked = true;
                            // Undisabled fields
                            $("#nama-prdnr").prop("disabled", false);
                            $("#tgl-lahir-prdnr").prop("disabled", false);
                            $("#jk-prdnr-1").prop("disabled", false);
                            $("#jk-prdnr-2").prop("disabled", false);
                            $("#alamat-prdnr").prop("disabled", false);
                            $("#hubungan-keluarga-prdnr").prop("disabled", false);
                        }
                        
                        $('#nama-prdnr').val(data.penolakan_resusitas.nama_prdnr);
                        $('#tgl-lahir-prdnr').val(data.penolakan_resusitas.tgl_lahir_prdnr); 
                        $('#alamat-prdnr').val(data.penolakan_resusitas.alamat_prdnr);
                        $('#tindakan-prdnr').val(data.penolakan_resusitas.tindakan_prdnr);                          
                        $('#hubungan-keluarga-prdnr').val(data.penolakan_resusitas.hubungan_keluarga_prdnr);
                        $('#tgl-prdnr').val(data.penolakan_resusitas.tgl_prdnr);
                        $('#jam-prdnr').val(data.penolakan_resusitas.jam_prdnr);
                        $('#dokter-prdnr').val(data.penolakan_resusitas.dokter_prdnr);
                        $('#s2id_dokter-prdnr a .select2c-chosen').html(data.penolakan_resusitas.dokter);
                        $('#perawat-prdnr-1').val(data.penolakan_resusitas.perawat_prdnr_1);
                        $('#s2id_perawat-prdnr-1 a .select2c-chosen').html(data.penolakan_resusitas.perawat_1);
                        $('#perawat-prdnr-2').val(data.penolakan_resusitas.perawat_prdnr_2);
                        $('#s2id_perawat-prdnr-2 a .select2c-chosen').html(data.penolakan_resusitas.perawat_2);
              
                        if (data.penolakan_resusitas.jk_prdnr == 'Laki-laki') {
                        document.getElementById("jk-prdnr-1").checked = true;
                        } else if (data.penolakan_resusitas.jk_prdnr == 'Perempuan') {
                            document.getElementById("jk-prdnr-2").checked = true;
                        }             
                    }            
                    // console.log(pasien);
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function CetakPenolakanResusitas() {
        const id = $('#id-layanan-pendaftaran-prdnr').val();
        $.ajax({
            type: 'post',
            url: '<?= base_url('pendaftaran_igd/api/pendaftaran_igd/simpan_cetak_penolakan_resusitas') ?>',
            data: $('#form-penolakan-resusitas').serialize(),
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

                    window.open('<?= base_url('pendaftaran_igd/cetak_surat_penolakan_resusitas/') ?>' + id, 'Cetak Surat Penolakan Resusitas', 'width=' + dWidth + ', height=' +
                        dHeight + ', left=' + x + ', top=' + y);

                    // $('#modal-prdnr').modal('hide');

                    showListForm($('#id-pendaftaran-prdnr').val(), $('#id-layanan-pendaftaran-prdnr').val(), $('#id-pasien-prdnr').val());
                } else {
                    messageCustom(data.message, 'Error');
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
  
    function CetakFormPenolakanResusitas() {

        if ($('#tgl-prdnr').val() === '') {
            syams_validation('#tgl-prdnr', 'Tanggal Belum diisi.');
            return false;
        } else {
            syams_validation_remove('#tgl-prdnr');
        }
        if ($('#jam-prdnr').val() === '') {
            syams_validation('#jam-prdnr', 'jam Belum diisi.');
            return false;
        } else {
            syams_validation_remove('#jam-prdnr');
        }

        const id = $('#id-layanan-pendaftaran-prdnr').val();
        $.ajax({
            type: 'post',
            url: '<?= base_url('pendaftaran_igd/api/pendaftaran_igd/simpan_form_cetak_penolakan_resusitas') ?>',
            data: $('#form-penolakan-resusitas').serialize(),
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
                    var y = screen.height / 2 - dHeight / 2;;

                    window.open('<?= base_url('pendaftaran_igd/cetak_form_surat_penolakan_resusitas/') ?>' + id, 'Cetak Surat Penolakan Resusitas', 'width=' + dWidth + ', height=' +
                        dHeight + ', left=' + x + ', top=' + y);

                    // $('#modal-prdnr').modal('hide');

                    showListForm($('#id-pendaftaran-prdnr').val(), $('#id-layanan-pendaftaran-prdnr').val(), $('#id-pasien-prdnr').val());
                } else {
                    messageCustom(data.message, 'Error');
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
















    function resetPenolakanResusitas() {
        $('#form-penolakan-resusitas')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false);

		$('#id-layanan-pendaftaran-prdnr').val('');


        $('#dokter-pelaksana').val('');
		$('#s2id_dokter-pelaksana a .select2c-chosen').html('Pilih Dokter');
        $('#dokter-pemberi').val('');
		$('#s2id_dokter-pemberi a .select2c-chosen').html('Pilih Dokter');
        $('#penerima-form-1').val('');
        $('#diagnosis-form').val('');
        $('#alasan-form').val('');
        $('#tata-form').val('');
        $('#tujuan-form').val('');
        $('#resiko-form').val('');
        $('#prognosis-form').val('');
        $('#alternatif-form').val('');
        $('#hal-form').val('');




		// Unchecked fields
		$('#nama-prdnr').val('');
		$('#tgl-lahir-prdnr').val('');
		$('#alamat-prdnr').val('');
		$('#tindakan-prdnr').val('');
		$('#hubungan-keluarga-prdnr').val('');
		$('#dokter-prdnr').val('');
		$('#s2id_dokter-prdnr a .select2c-chosen').html('Pilih Dokter');
		$('#perawat-prdnr-1').val('');
		$('#s2id_perawat-prdnr-1 a .select2c-chosen').html('Pilih Perawat');
		$('#perawat-prdnr-2').val('');
		$('#s2id_perawat-prdnr-2 a .select2c-chosen').html('Pilih Perawat');

        document.getElementById("pr-prdnr-1").checked = false;
		document.getElementById("pr-prdnr-2").checked = false;	
        document.getElementById("jk-prdnr-1").checked = false;
		document.getElementById("jk-prdnr-2").checked = false;

        $("#nama-prdnr").prop("disabled", false);
		$("#tgl-lahir-prdnr").prop("disabled", false);
		$("#alamat-prdnr").prop("disabled", false);
		$("#tindakan-prdnr").prop("disabled", false);
		$("#hubungan-keluarga-prdnr").prop("disabled", false);
        $("#jk-prdnr-1").prop("disabled", false);
		$("#jk-prdnr-2").prop("disabled", false);

	
	}










</script>