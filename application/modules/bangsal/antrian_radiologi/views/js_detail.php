<style>
	#parent {
		height: 200px;
		overflow-y: auto;
    }
</style>

<script>
    $(function() {

        $('#ruang_1').click(function() {
			if ($(this).is(":checked")) {                
                $('#ruang_1').prop('checked', true);   $('#ruang_2A').prop('checked', false);  $('#ruang_2B').prop('checked', false);
                $('#ruang_3').prop('checked', false);  $('#ruang_4').prop('checked', false);   $('#ruang_5').prop('checked', false);
            }
		});

        $('#ruang_2A').click(function() {
			if ($(this).is(":checked")) {                
                $('#ruang_1').prop('checked', false);  $('#ruang_2A').prop('checked', true);  $('#ruang_2B').prop('checked', false);
                $('#ruang_3').prop('checked', false);  $('#ruang_4').prop('checked', false);  $('#ruang_5').prop('checked', false);
            }
		});

        $('#ruang_2B').click(function() {
			if ($(this).is(":checked")) {                
                $('#ruang_1').prop('checked', false);  $('#ruang_2A').prop('checked', false);  $('#ruang_2B').prop('checked', true);
                $('#ruang_3').prop('checked', false);  $('#ruang_4').prop('checked', false);   $('#ruang_5').prop('checked', false);
            }
		});
        
        $('#ruang_3').click(function() {
			if ($(this).is(":checked")) {                
                $('#ruang_1').prop('checked', false);  $('#ruang_2A').prop('checked', false);  $('#ruang_2B').prop('checked', false);
                $('#ruang_3').prop('checked', true);   $('#ruang_4').prop('checked', false);   $('#ruang_5').prop('checked', false);
            }
		});
        
        $('#ruang_4').click(function() {
			if ($(this).is(":checked")) {                
                $('#ruang_1').prop('checked', false);  $('#ruang_2A').prop('checked', false);  $('#ruang_2B').prop('checked', false);
                $('#ruang_3').prop('checked', false);  $('#ruang_4').prop('checked', true);    $('#ruang_5').prop('checked', false);
            }
		});
        
        $('#ruang_5').click(function() {
			if ($(this).is(":checked")) {                
                $('#ruang_1').prop('checked', false);  $('#ruang_2A').prop('checked', false);  $('#ruang_2B').prop('checked', false);
                $('#ruang_3').prop('checked', false);  $('#ruang_4').prop('checked', false);   $('#ruang_5').prop('checked', true);
            }
		});

        $('#btn-reload-antrian-radiologi').on('click', function() {
			getListDetailAntrianRadiologi(1);
		})

    });

    function konfirmasiTambahAntrianRad(id_pendaftaran, id_layanana_pendaftaran, id_order_radiologi) {
        if(id_pendaftaran !== '' && id_layanana_pendaftaran !== '' && id_order_radiologi !== '') {
            $.ajax({
                type: 'GET',
                url: '<?= base_url("antrian_radiologi/api/antrian_radiologi/get_detail_antrian_pasien") ?>/id_pendaftaran/' + id_pendaftaran +'/id_layanana_pendaftaran/'+id_layanana_pendaftaran+'/id_order_radiologi/'+id_order_radiologi,
                cache: false,
                dataType: 'JSON',
                success: function(data) {
                    if(data !== false){

                        $('#arad-id-pendaftaran').val(id_pendaftaran);
                        $('#arad-id-layanan-pendaftaran').val(id_layanana_pendaftaran);
                        $('#arad-id-order-radiologi').val(id_order_radiologi);
                        
                        $('#arad-no-rm').html(data.no_rm);
                        $('#arad-nama-pasien').html(data.pasien +' ('+data.kelamin+')');
                        $('#arad-umur').html(hitungUmur(data.tanggal_lahir)+' ('+datefmysql(data.tanggal_lahir)+')');
                        $('#arad-asal-order').html(data.jenis_layanan+' '+data.layanan);
                        $('#arad-dokter-order').html(data.dokter);
                        $('#arad-waktu-order').html(data.waktu_order);
                        
                        if(data.ruang_radiologi !== null){
                            if (data.ruang_radiologi.length > 0) {
                                $.each(data.ruang_radiologi, function(i, v) {
                                    if(v.id_ruang_1  == 'Ya'){ 
                                        $('#ruang_1').prop('disabled', false); $('#label_r1').attr("style","font-weight: 1000");		
                                    } else { 
                                        $('#ruang_1').prop('disabled', true);  $('#label_r1').attr("style","color: grey");
                                    }

                                    if(v.id_ruang_2A  == 'Ya'){ 
                                        $('#ruang_2A').prop('disabled', false); $('#label_r2a').attr("style","font-weight: 1000");		
                                    } else { 
                                        $('#ruang_2A').prop('disabled', true);  $('#label_r2a').attr("style","color: grey");
                                    }

                                    if(v.id_ruang_2B  == 'Ya'){ 
                                        $('#ruang_2B').prop('disabled', false); $('#label_r2b').attr("style","font-weight: 1000");		
                                    } else { 
                                        $('#ruang_2B').prop('disabled', true);  $('#label_r2b').attr("style","color: grey");
                                    }

                                    if(v.id_ruang_3  == 'Ya'){ 
                                        $('#ruang_3').prop('disabled', false); $('#label_r3').attr("style","font-weight: 1000");		
                                    } else { 
                                        $('#ruang_3').prop('disabled', true);  $('#label_r3').attr("style","color: grey");
                                    }

                                    if(v.id_ruang_4  == 'Ya'){ 
                                        $('#ruang_4').prop('disabled', false); $('#label_r4').attr("style","font-weight: 1000");		
                                    } else { 
                                        $('#ruang_4').prop('disabled', true);  $('#label_r4').attr("style","color: grey");
                                    }

                                    if(v.id_ruang_5  == 'Ya'){ 
                                        $('#ruang_5').prop('disabled', false); $('#label_r5').attr("style","font-weight: 1000");		
                                    } else { 
                                        $('#ruang_5').prop('disabled', true);  $('#label_r5').attr("style","color: grey");
                                    }
                                });
                            }
                        }
                        getListDetailAntrianRadiologi(1);
                        $('#modal-tambah-antrian-radiologi').modal('show');
                    } else {
                        messageCustom('Tidak Ada Data', 'Error');
                    }
                },
                error: function(e) {
                    accessFailed(e.status);
                },
            });
        }
	}

	function konfirmasiSimpanAntrianRad() 
	{
		var cek_button = false;
		if ($('#ruang_1').is(":checked")) {  		cek_button = true;
		} else if ($('#ruang_2A').is(":checked")) { cek_button = true;
		} else if ($('#ruang_2B').is(":checked")) { cek_button = true;
		} else if ($('#ruang_3').is(":checked")) {  cek_button = true;
		} else if ($('#ruang_4').is(":checked")) {  cek_button = true;
		} else if ($('#ruang_5').is(":checked")) {  cek_button = true;
		} else {			
			cek_button = false;
		}

		if(cek_button){          

            $.ajax({
                type: 'GET',
                url: '<?= base_url('antrian_radiologi/api/antrian_radiologi/get_cek_antrian_byruangan') ?>',
                data: $('#form_tambah_antrian_radiologi').serialize(),
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {                     
                    if (data.status) {
                        messageDialog = "Pasien ini sudah memiliki antrian di "+data.ruang_radiologi+" dengan no Antrian "+data.nomor_antrian+". Anda yakin ingin tetap menambah Antrian Radiologi ? ";
                    } else {
                        messageDialog = "Anda yakin ingin menambah Antrian Radiologi ?";
                    }

                    bootbox.dialog({
                        message: messageDialog,
                        title: "Tambah Antrian Radiologi",
                        buttons: {
                            batal: {
                                label: '<i class="fas fa-fw fa-window-close"></i> Batal',
                                className: "btn-secondary",
                                callback: function () {
                                }
                            },
                            masuk: {
                                label: '<i class="fas fa-fw fa-check-circle"></i> Tambah',
                                className: "btn-info",
                                callback: function () {
                                    SimpanAntrianRad();
                                }
                            }
                        }
                    });

                },
                complete: function() {
                    hideLoader();
                },
                error: function(e) {
                    messageCustom('Terjadi Kesalahan! | Gagal Tambah Antrian')
                }
            });

			
		} else {
			swalAlert('info', 'Pilih Ruang Radiologi', 'Ruang Radiologi tidak boleh kosong!');
		}
	}

    function SimpanAntrianRad() 
	{
		$.ajax({
			type: 'POST',
            url: '<?= base_url('antrian_radiologi/api/antrian_radiologi/simpan_antrianrad') ?>',
			data: $('#form_tambah_antrian_radiologi').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function () {
				showLoader();
			},
			success: function (data) {
				$('input[name=csrf_syam]').val(data.token);
				if (data.status) {
					messageCustom('Berhasil menambah Antrian Radiologi', 'Success');
                    getListDetailAntrianRadiologi(1);
				} else {
					messageCustom('Gagal menambah Antrian Radiologi', 'Error');
				}
			},
			complete: function () {
				hideLoader();
			},
			error: function (e) {
				messageEditFailed();
			}
		});
	}

	function getListDetailAntrianRadiologi(p) {
        
        $.ajax({
            type: 'GET',
            url: '<?= base_url('antrian_radiologi/api/antrian_radiologi/get_list_detail_antrian_radiologi/page/') ?>' + p,
            data: $('#form_tambah_antrian_radiologi').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListDetailAntrianRadiologi(p - 1);
                    return false;
                }

                $('#pagination_list_detail_antrian_rad').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary_list_detail_antrian_rad').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table_list_detail_antrian_rad tbody').empty();

                let html = '';
                let btnCetakAntrian = '';
                let statusCetak = '';
                let titleBatal = '';

                $.each(data.data, function(i, v) {
                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    if (v.id !== null) {
                        btnCetakAntrian = '<button type="button" class="btn btn-info btn-xxs mr-2" onclick="cetakAntrianRad(' + v.id + ', ' + p + ')"><i class="fa fa-print"></i> Cetak</button>';
                        btnBatalAntrian = '<button type="button" class="btn btn-danger  btn-xxs mr-2" onclick="batalAntrianRad(' + v.id + ',1, ' + p + ')"><i class="fa fa-trash"></i></button>';
                        v.cetak >= 1 ? statusCetak = '<h5 style="margin-bottom: 0px;"><span class="label label-warning"> Tercetak '+v.cetak+' kali</span></h5>' : statusCetak = '';
					}
					
                    titleBatal =    `<table>
                                    <tr><td><b>Alasan </b>&nbsp;</td>   <td> : ` + (v.keterangan_batal !== null ? v.keterangan_batal : '-') + `</td></tr>
                                    <tr><td><b>Petugas </b>&nbsp;</td>  <td> : ` + (v.user_cancel !== null ? v.user_cancel : '-') + `</td></tr>
                                    <tr><td><b>Waktu </b>&nbsp;</td>    <td> : ` + (v.cancel_date !== null ? v.cancel_date : '-') + `</td></tr>
                                    </table>`;

                    if (v.status_antrian === 'Batal') {						
                        status_antrian   = '<button type="button" class="btn btn-danger btn-xs mypopover" data-container="body" data-toggle="popover" data-placement="left" data-content="' + titleBatal + '" style="padding: 0px;"><h5 style="margin-bottom: 0px;"><span class="label label-danger">Batal</span></h5> </button>' ;
                        btnCetakAntrian  = '';
                        btnBatalAntrian  = '';
                    } else if (v.status_antrian === 'Sudah') {
                        status_antrian = '<h5  style="margin-bottom: 0px;"><span class="label label-success">Sudah</span></h5>';
                    } else {
                        status_antrian = '<span><i><i class="fas fa-fw fa-spinner fa-spin m-r-5"></i>Belum</i></span>';
                    }
                    
                    var html = /* html */
                        '<tr>' +
                            '<td class="center">' + ++i + '</td>' +
                            '<td class="center">' + v.tanggal_kunjungan + '</td>' +
                            '<td class="left">'   + v.ruang_radiologi + '</td>' +
                            '<td class="center">' + v.nomor_antrian + '</td>' +
                            '<td class="center">' + (v.waktu_panggil !== null ? v.waktu_panggil : '-')+ '</td>' +
                            '<td class="center">' + (v.jumlah_panggil !== null ? v.jumlah_panggil : '-')+ '</td>' +
                            '<td class="center">' + status_antrian + '</td>' +
                            '<td class="left row">' + 
                                btnCetakAntrian + btnBatalAntrian + statusCetak +
                            '</td>' +
                        '</tr>';
                    $('#table_list_detail_antrian_rad tbody').append(html);
                });
                hideLoader();

                $('.mypopover').popover({
                    html: true,
                    trigger: 'hover',
                    sanitize: false,
                });

            },
            error: function(e) {
                accessFailed(e.status);
                hideLoader();
            }
        });
    }

    function cetakAntrianRad(id, p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('antrian_radiologi/api/antrian_radiologi/antrian_radiologi_byid') ?>',
            data: 'id=' + id,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {                
                let jmlCetak = data.cetak;
                if (jmlCetak !== '') {

                    totalCetak = parseInt(jmlCetak);

                    if (totalCetak >= 1) {

                        let pesan = ' Tiket Sudah Tercetak, Apakah ingin dicetak ulang?';
                        let confirm_button = 'Cetak';


                        swal.fire({
                            title: 'Cetak Ulang',
                            html: pesan,
                            icon: 'question',
                            showCancelButton: true,
                            confirmButtonText: '<i class="fas fa-save"></i> ' + confirm_button,
                            cancelButtonText: '<i class="fas fa-times-circle"></i> Batal',
                            reverseButtons: true,
                            allowOutsideClick: false
                        }).then((result) => {
                            if (result.value) {
                                var dWidth = $(window).width();
                                var dHeight = $(window).height();
                                var x = screen.width / 2 - dWidth / 2;
                                var y = screen.height / 2 - dHeight / 2;

                                window.open('<?= base_url() ?>antrian_radiologi/cetak_antrian_rad/' + id, 'Cetak Nomor Antrian Admisi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);

                            }
                        });

                    } else {
                        var dWidth = $(window).width();
                        var dHeight = $(window).height();
                        var x = screen.width / 2 - dWidth / 2;
                        var y = screen.height / 2 - dHeight / 2;

                        window.open('<?= base_url() ?>antrian_radiologi/cetak_antrian_rad/' + id, 'Cetak Nomor Antrian Admisi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
                    }

                } 

            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageCustom('Terjadi Kesalahan! | Gagal mencetak Antrian Radiologi')
            }

        });
    }

    function batalAntrianRad(id, kodeForm, page) {
		$('#id-antrian').val(id);
		$('#kode-form').val(kodeForm);
		$('#page-now').val(page);        
		$('#modal-batal-antrian-radiologi').modal('show');
	}

    function simpanPembatalanAntrianRadiologi() {
		$.ajax({
			type: 'POST',
			url: '<?= base_url("antrian_radiologi/api/antrian_radiologi/simpan_batal_antrian_radiologi") ?>',
			data: $('#form-batal-antrian-radiologi').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
                $('#kode-form').val() == 0 ? getListAntrianRadiologi(1) : getListDetailAntrianRadiologi(1); 
				$('#modal-batal-antrian-radiologi').modal('hide');
				messageCustom('Pembatalan Antrian Radiologi Berhasil Dilakukan', 'Success');
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				messageCustom('Pembatalan Antrian Radiologi Gagal Dilakukan', 'Error');
			},
		});
	}

</script>