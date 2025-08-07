<script>
	
    $(function() {       

        $('#btn-reload').click(function() {
            cekPilihRuangan();
        });

        $('#btn-call').click(function() {
            callRadiologi($('#kode-ruang').val());
        });

        $('#btn-recall').click(function() {
            reCallRadiologi($('#kode-ruang').val());
        });        

        $('#ruang_1').click(function() {
            cekPilihRuangan();
			if ($(this).is(":checked")) {                
                $('#ruang_1').prop('checked', true);   $('#ruang_2A').prop('checked', false);  $('#ruang_2B').prop('checked', false);
                $('#ruang_3').prop('checked', false);  $('#ruang_4').prop('checked', false);   $('#ruang_5').prop('checked', false);
            }
		});

        $('#ruang_2A').click(function() {
            cekPilihRuangan();
			if ($(this).is(":checked")) {                
                $('#ruang_1').prop('checked', false);  $('#ruang_2A').prop('checked', true);  $('#ruang_2B').prop('checked', false);
                $('#ruang_3').prop('checked', false);  $('#ruang_4').prop('checked', false);  $('#ruang_5').prop('checked', false);
            }
		});

        $('#ruang_2B').click(function() {
            cekPilihRuangan();
			if ($(this).is(":checked")) {                
                $('#ruang_1').prop('checked', false);  $('#ruang_2A').prop('checked', false);  $('#ruang_2B').prop('checked', true);
                $('#ruang_3').prop('checked', false);  $('#ruang_4').prop('checked', false);   $('#ruang_5').prop('checked', false);
            }
		});
        
        $('#ruang_3').click(function() {
            cekPilihRuangan();
			if ($(this).is(":checked")) {                
                $('#ruang_1').prop('checked', false);  $('#ruang_2A').prop('checked', false);  $('#ruang_2B').prop('checked', false);
                $('#ruang_3').prop('checked', true);   $('#ruang_4').prop('checked', false);   $('#ruang_5').prop('checked', false);
            }
		});
        
        $('#ruang_4').click(function() {
            cekPilihRuangan();
			if ($(this).is(":checked")) {                
                $('#ruang_1').prop('checked', false);  $('#ruang_2A').prop('checked', false);  $('#ruang_2B').prop('checked', false);
                $('#ruang_3').prop('checked', false);  $('#ruang_4').prop('checked', true);    $('#ruang_5').prop('checked', false);
            }
		});
        
        $('#ruang_5').click(function() {
            cekPilihRuangan();
			if ($(this).is(":checked")) {                
                $('#ruang_1').prop('checked', false);  $('#ruang_2A').prop('checked', false);  $('#ruang_2B').prop('checked', false);
                $('#ruang_3').prop('checked', false);  $('#ruang_4').prop('checked', false);   $('#ruang_5').prop('checked', true);
            }
		});
        
         
    }); 

    function cekPilihRuangan() {
        var cek_button = false;
        var id_ruang   = '';
        $('#nama-ruangan').html('');
        $('#sisa-antrian-pasien').html('');
        $('#antrian-berikutnya').html('');
        $('#antrian-sekarang').html('');

		if ($('#ruang_1').is(":checked")) {  		cek_button = true; $('#nama-ruangan').html('Ruang 1');  id_ruang='5'; kode_ruang='1';
		} else if ($('#ruang_2A').is(":checked")) { cek_button = true; $('#nama-ruangan').html('Ruang 2A'); id_ruang='7'; kode_ruang='2A';
		} else if ($('#ruang_2B').is(":checked")) { cek_button = true; $('#nama-ruangan').html('Ruang 2B'); id_ruang='1'; kode_ruang='2B';
		} else if ($('#ruang_3').is(":checked")) {  cek_button = true; $('#nama-ruangan').html('Ruang 3');  id_ruang='4'; kode_ruang='3';
		} else if ($('#ruang_4').is(":checked")) {  cek_button = true; $('#nama-ruangan').html('Ruang 4');  id_ruang='8'; kode_ruang='4';
		} else if ($('#ruang_5').is(":checked")) {  cek_button = true; $('#nama-ruangan').html('Ruang 5');  id_ruang='3'; kode_ruang='5';
		} else {			
			cek_button = false;
		}

        if(!cek_button){
            swalAlert('info', 'Pilih Ruang Radiologi', 'Ruang Radiologi tidak boleh kosong!');
        } else {
            $('#kode-ruang').val(kode_ruang);
            getDataAntrian(id_ruang);
        }
    }       

    function getDataAntrian(id_ruang) {
        let idTrans = "<?= $this->session->userdata("id_translucent") ?>";
        $.ajax({
            url: '<?= base_url('antrian_radiologi/api/antrian_radiologi/get_data_antrian') ?>',
            type: 'GET',
            data: 'id='+id_ruang,
            cache: false,
            dataType: 'JSON',
            success: function(data) {

                if(data.sisa.jumlah === null){
                    $('#sisa-antrian-pasien').html('<b>Sisa Antrian : </b> 0 Pasien');
                } else {
                    $('#sisa-antrian-pasien').html('<b>Sisa Antrian : </b> '+data.sisa.jumlah+' Pasien');
                }

                if(data.call === null){
                    $('#antrian-berikutnya').html('-');
                } else {
                    $('#antrian-berikutnya').html('<b>'+data.call.nomor_antrian+'</b>');
                }

                if(data.recall === null){
                    $('#antrian-sekarang').html('-');
                } else {
                    $('#antrian-sekarang').html('<b>'+data.recall.nomor_antrian+'</b>');
                }
            },
            error: function(e) {
                // accessFailed(e.status);
            }
        });
    }
    
    function callRadiologi(namaruangan){
        let user = "<?= $this->session->userdata("nama") ?>";
        bootbox.dialog({
            title: "Konfirmasi Panggil",
            message: "Apakah anda yakin ingin memanggil ruang "+namaruangan+" ?",
            buttons: {
                cancel: {
                    label: '<i class="fas fa-window-close"></i> Batal',
                    className: 'btn-secondary'
                },
                confirm: {
                    label: '<i class="fas fa-check"></i> Panggil',
                    className: 'btn-warning',
                    callback: function() {
                        if(namaruangan=='1') { idRuangan = 5 } else
                        if(namaruangan=='2A'){ idRuangan = 7 } else
                        if(namaruangan=='2B'){ idRuangan = 1 } else
                        if(namaruangan=='3') { idRuangan = 4 } else
                        if(namaruangan=='4') { idRuangan = 8 } else
                        if(namaruangan=='5') { idRuangan = 3 } else {
                            idRuangan=0
                        }
                        $.ajax({
                            type: 'GET',
                            url: '<?= base_url('antrian_radiologi_arduino/api/antrian_radiologi_arduino/get_call_arduino') ?>',
                            data: 'ruang=' + idRuangan +'&user='+user,
                            cache: false,
                            dataType: 'JSON',
                            beforeSend: function() {
                                showLoader();
                            },
                            success: function(data) {  
                                messageCustom('Call Antrian Radiologi  Berhasil Dilakukan', 'Success');        
                            },
                            complete: function() {
                                hideLoader();
                            },
                            error: function(e) {
                                messageCustom('Terjadi Kesalahan! | Gagal Call Antrian Radiologi')
                            }
                        });
                    }
                }
            }
        });        
    }

    function reCallRadiologi(namaruangan){
        let user = "<?= $this->session->userdata("nama") ?>";
        bootbox.dialog({
            title: "Konfirmasi Panggil Ulang",
            message: "Apakah anda yakin ingin memanggil ulang ruang "+namaruangan+" ?",
            buttons: {
                cancel: {
                    label: '<i class="fas fa-window-close"></i> Batal',
                    className: 'btn-secondary'
                },
                confirm: {
                    label: '<i class="fas fa-check"></i> Panggil Ulang',
                    className: 'btn-danger',
                    callback: function() {
                        if(namaruangan=='1') { idRuangan = 5 } else
                        if(namaruangan=='2A'){ idRuangan = 7 } else
                        if(namaruangan=='2B'){ idRuangan = 1 } else
                        if(namaruangan=='3') { idRuangan = 4 } else
                        if(namaruangan=='4') { idRuangan = 8 } else
                        if(namaruangan=='5') { idRuangan = 3 } else {
                            idRuangan=0
                        }
                        $.ajax({
                            type: 'GET',
                            url: '<?= base_url('antrian_radiologi_arduino/api/antrian_radiologi_arduino/get_recall_arduino') ?>',
                            data: 'ruang=' + idRuangan +'&user=Ruang '+user,
                            cache: false,
                            dataType: 'JSON',
                            beforeSend: function() {
                                showLoader();
                            },
                            success: function(data) {  
                                messageCustom('ReCall Antrian Radiologi Berhasil Dilakukan', 'Success');        
                            },
                            complete: function() {
                                hideLoader();
                            },
                            error: function(e) {
                                messageCustom('Terjadi Kesalahan! | Gagal ReCall Antrian Radiologi')
                            }
                        });
                    }
                }
            }
        });        
    }

    
</script>
