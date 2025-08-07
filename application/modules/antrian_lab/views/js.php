<script>
	$(function() {
        startListLab();
        // getListAntrianLab(1);

        $('#bt_reload_data').click(function() {
            resetAll();
            getListAntrianLab($('#page-now').val());
        });

        $('#calla').click(function()   { konfirmasiCallLab('Admin','A')});
        $('#recalla').click(function() { konfirmasReCallLab('Admin','A')});

        $('#callb').click(function()  { konfirmasiCallLab('Admin','B')});
        $('#recallb').click(function(){ konfirmasReCallLab('Admin','B')});

        $('#callc').click(function()  { konfirmasiCallLab('Admin','C')});
        $('#recallc').click(function(){ konfirmasReCallLab('Admin','C')});

        $('#calld').click(function()   { konfirmasiCallLab('Admin','D')});
        $('#recalld').click(function() { konfirmasReCallLab('Admin','D')});

        $('#calle').click(function()   { konfirmasiCallLab('Admin','E')});
        $('#recalle').click(function() { konfirmasReCallLab('Admin','E')});

        $('#tanggal, #ruang-lab, #kode-antrian, #status-antrian, #pencarian_lab').change(function() {
            getListAntrianLab($('#page-now').val());
		});

        $('#tanggal').datepicker({
			format: 'dd/mm/yyyy',
			startDate: '+0d'
		}).on('changeDate', function() {
			$(this).datepicker('hide');
		});

        $('#edit-waktu-refresh').val('10');        
        $('#waktu-refresh').html($('#edit-waktu-refresh').val());

        $('#bt_waktu_refresh').click(function()   {
            $('#modal-edit-waktu-refresh').modal('show');
        });
    })

    function startListLab(){        
        getListAntrianLab(1);
        initListLab();
    }   

    function initListLab(){      
        setTimeout(() => setInterval(() => getListAntrianLab(1), 20000)); 
    }


    function simpanEditWaktuRefresh() {
        if($('#edit-waktu-refresh').val() < 10 ){
            swalAlert('info', 'INFO', 'Waktu Refresh Otomatis tidak boleh kurang dari 10 detik !');
            $('#edit-waktu-refresh').val('10');
        } else {
            $('#waktu-refresh').html($('#edit-waktu-refresh').val());
            $('#modal-edit-waktu-refresh').modal('hide');
            initListLab();
        }
    }

	function paging(p) {
        getListAntrianLab(p);
    }

    function getListAntrianLab(p) {
        $('#page-now').val(p);  p <= 0 ? p=1 : '';
		let accountGroup = "<?= $this->session->userdata('account_group') ?>";

        if(typeof $('#pencarian_lab').val() !== 'undefined'){
        
            $.ajax({
                type: 'GET',
                url: '<?= base_url('antrian_lab/api/antrian_lab/get_list_antrian_lab/page/') ?>' + p,
                data: 'keyword=' + $('#pencarian_lab').val() + '&status_antrian=' + $('#status-antrian').val() + '&ruang_lab=' + $('#ruang-lab').val() + '&tanggal=' + $('#tanggal').val()+ '&kode_antrian=' + $('#kode-antrian').val(),
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {
                    if ((p > 1) & (data.data.length === 0)) {
                        getListAntrianLab(p - 1);
                        return false;
                    }

                    $('#pagination_antrian_lab').html(pagination(data.jumlah, data.limit, data.page, 1));
                    $('#summary_antrian_lab').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                    $('#table_list_antrian_lab tbody').empty();

                    data.ruang_admin_a_sisa !== null? $('#label-admin-a').html('<b>Kode A - Poli Umum ('+data.ruang_admin_a_sisa+')</b>') : $('#label-admin-a').html('<b>Kode A - Poli Umum (0)') ;
                    data.ruang_admin_b_sisa !== null? $('#label-admin-b').html('<b>Kode B - Poli Khusus ('+data.ruang_admin_b_sisa+')</b>') : $('#label-admin-b').html('<b>Kode B - Poli Khusus (0)</b>') ;
                    data.ruang_admin_c_sisa !== null? $('#label-admin-c').html('<b>Kode C - Cito ('+data.ruang_admin_c_sisa+')</b>') : $('#label-admin-c').html('<b>Kode C - Cito (0)</b>') ;
                    data.ruang_admin_d_sisa !== null? $('#label-admin-d').html('<b>Kode D - Prioritas ('+data.ruang_admin_d_sisa+')</b>') : $('#label-admin-d').html('<b>Kode D - Prioritas (0)</b>') ;
                    data.ruang_admin_e_sisa !== null? $('#label-admin-e').html('<b>Kode E - Hasil ('+data.ruang_admin_e_sisa+')</b>') : $('#label-admin-e').html('<b>Kode E - Hasil (0)</b>') ;

                    let html            = '';
                    let btnCetakAntrian = '';
                    let btnBatalAntrian = '';
                    let titleBatal      = '';
                    let isSamplingDisabled = '';
                    
                    $.each(data.data, function(i, v) {
                        let id_layanan_pendaftaran = v.id_layanan_pendaftaran.replace(/[{}]/g, '');
                        let no = ((i + 1) + ((data.page - 1) * data.limit));
                        
                        if (v.id !== null) {        
                            let statusCall = 'Call';
                            let collorCall = 'warning';
                            let id_type    = '1';
                            if(v.jml_panggil_admin >= 1){
                                statusCall = 'Recall';
                                collorCall = 'primary';
                                id_type    = '2';
                            }
                            btnCetakAntrian = '<button type="button" class="btn btn-info btn-xxs mr-2" onclick="cetakAntrianLab(' + v.id + ', ' + p + ')" title="Cetak Antrian"><i class="fa fa-print"></i></button>';
                            btnBatalAntrian = '';

                            if(v.jml_panggil_admin <= 0 ){
                                btnBatalAntrian = `<button type="button" class="btn btn-danger btn-xxs mr-2" onclick="batalAntrianLab(` + v.id + `,'`+ id_layanan_pendaftaran + `',` + p + `)" title="Hapus Antrian"><i class="fa fa-trash"></i></button>`;
                            }                    
                        }
                        
                        titleBatal =    `<table>
                                        <tr><td><b>Alasan </b>&nbsp;</td>   <td> : ` + (v.keterangan_batal !== null ? v.keterangan_batal : '-') + `</td></tr>
                                        <tr><td><b>Petugas </b>&nbsp;</td>  <td> : ` + (v.user_cancel !== null ? v.user_cancel : '-') + `</td></tr>
                                        <tr><td><b>Waktu </b>&nbsp;</td>    <td> : ` + (v.cancel_date !== null ? v.cancel_date : '-') + `</td></tr>
                                        </table>`;

                        isSamplingDisabled = '';
                        if (v.status_antrian === 'Batal') {						
                            status_antrian   = '<button type="button" class="btn btn-danger btn-xs mypopover" data-container="body" data-toggle="popover" data-placement="left" data-content="' + titleBatal + '" style="padding: 0px;"><h5 style="margin-bottom: 0px;"><span class="label label-danger">Batal</span></h5> </button>' ;
                            btnCetakAntrian  = '';
                            btnBatalAntrian  = '';
                            isSamplingDisabled = 'disabled';
                        } else if (v.jml_panggil_admin >=1) {
                            status_antrian = '<h5><span class="label label-success"><i class="fas fa-fw fa-check-circle m-r-5"></i>Sudah</span></h5>';		
                        } else {
                            status_antrian = '<span class="blinker"><i><i class="fas fa-fw fa-spinner fa-spin m-r-5"></i>Belum</i></span>';
                        }
                    
                        let panggil_sampling = ``;
                        if(v.kode_antrian !==  'E'){
                            panggil_sampling = `<div class="custom-control custom-switch disabled">
                                                <input type="checkbox" `+isSamplingDisabled+` class="custom-control-input" id="sampling_${v.id}" onclick="konfirmasiSetSampling(${v.id}, ${v.is_sampling})" ${(v.is_sampling == 1 ? 'checked' : '')}>
                                                <label class="custom-control-label" for="sampling_${v.id}">${(v.is_sampling == 1 ? '<h5><span class="label label-success">Ya</span></h5>' : '<h5><span class="label label-danger">Tidak</span></h5>')}</label>
                                                </div>`;
                        }
                        
						let background = '';
                        if (v.kode_antrian == 'C') {
                            background = 'style="background-color:#ff9eb5;"';
                        }
						
                        var html = /* html */
                            '<tr ' + background + '>' +
                                '<td class="center">' + no + '</td>' +
                                '<td class="center">' + v.tanggal_kunjungan + '</td>' +
                                '<td class="center">' + v.id_pasien + '</td>' +
                                '<td class="left">'   + v.nama_pasien + '</td>' +
                                '<td class="center">' + (v.nama_poli !== null ? v.nama_poli : 'Pendaftaran') +'</td>' +
                                '<td class="center">' + v.ruang_panggil + '</td>' +
                                '<td class="center">' + v.nomor_antrian + '</td>' +
                                '<td class="center">' + (v.jml_panggil_admin !== null ? v.jml_panggil_admin : '0') + '</td>' +
                                '<td class="center">' + (v.jml_panggil_sampling !== null ? v.jml_panggil_sampling : '0') + '</td>' +
                                '<td class="center">' + 'Tercetak ' + (v.cetak !== null ? v.cetak : '0') + ' kali' + '</td>' +
                                '<td class="center">' + status_antrian + '</td>' +
                                '<td class="center">' + panggil_sampling + '</td>' +
                                '<td class="left" style="display:flex;float:left">' + 
                                    btnCetakAntrian + btnBatalAntrian +
                                '</td>' +
                            '</tr>';
                        $('#table_list_antrian_lab tbody').append(html);

                    });

                    $('.mypopover').popover({
                        html: true,
                        trigger: 'hover',
                        sanitize: false,
                    });

                    hideLoader();
                },
                error: function(e) {
                    accessFailed(e.status);
                    hideLoader();
                }
            });
            
        }
    }

	function batalAntrianLab(id, id_layanan_pendaftaran, page) {
        $.ajax({
			type: 'GET',
			url: '<?= base_url("antrian_lab/api/antrian_lab/cek_tunda_aktif") ?>',
            data: 'id=' + id,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
                if(data.status === true){
                    $('#id-antrian').val(id);
                    $('#page-now').val(page);        
                    $('#id-layanan-pendaftaran').val(id_layanan_pendaftaran);
                    $('#keterangan').val('');        
                    $('#modal-batal-antrian-lab').modal('show');
                } else {
                    messageCustom(data.message, 'Info');
                }   

                getListAntrianLab($('#page-now').val()); 
				$('#modal-batal-antrian-lab').modal('hide');
				// messageCustom('Pembatalan Antrian Laboratorium Berhasil Dilakukan', 'Success');
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				messageCustom('Pembatalan Antrian Laboratorium Gagal Dilakukan', 'Error');
			},
		});
	}

	function simpanPembatalanAntrianLab() {
        if ($('#keterangan').val() === '') {
            syams_validation($('#keterangan'), 'Keterangan Batal tidak boleh kosong !')
            return
        } else {
            syams_validation_remove($('#keterangan'))
        }

		$.ajax({
			type: 'POST',
			url: '<?= base_url("antrian_lab/api/antrian_lab/simpan_batal_antrian_lab") ?>',
			data: $('#form-batal-antrian-lab').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
                getListAntrianLab($('#page-now').val()); 
				$('#modal-batal-antrian-lab').modal('hide');
				messageCustom('Pembatalan Antrian Laboratorium Berhasil Dilakukan', 'Success');
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				messageCustom('Pembatalan Antrian Laboratorium Gagal Dilakukan', 'Error');
			},
		});
	}

    function resetAll() {
        $('#id, #pencarian_lab').val('');
        $('a .select2-chosen').html('Silahkan pilih');
        syams_validation_remove('.form-control, .select2-input');

        $('#tanggal').val('<?= date('d/m/Y') ?>');
        $('#ruang-lab').val('1');
        $('#status-antrian').val('4');
        $('#kode-antrian').val('ABCD');
    }

    function konfirmasiSetSampling(id,is_sampling){        

        // let setMessage = '';

        // if(is_sampling==1){
        //     setMessage = 'menonaktifkan Panggilan Ruang Sampling ?';
        // } else {
        //     setMessage = 'mengaktifkan Panggilan Ruang Sampling ?';
        // }

        // bootbox.dialog({
        //     title: "Konfirmasi Ubah Panggilan Ruang Sampling",
        //     message: "Apakah Anda yakin ingin "+setMessage,
        //     buttons: {
        //         cancel: {
        //             label: '<i class="fas fa-window-close"></i> Batal',
        //             className: 'btn-secondary'
        //         },
        //         confirm: {
        //             label: '<i class="fas fa-check"></i> Ya',
        //             className: 'btn-info',
        //             callback: function() {
                        $.ajax({
                            type: 'GET',
                            url: '<?= base_url('antrian_lab/api/antrian_lab/update_sampling') ?>',
                            data: 'id=' + id + '&is_sampling=' + is_sampling,
                            cache: false,
                            dataType: 'JSON',
                            beforeSend: function() {
                                showLoader();
                            },
                            success: function(data) {  
                                if(data.status === true){
                                    messageCustom(data.message, 'Success');
                                } else {
                                    messageCustom(data.message, 'Info');
                                }   

                                getListAntrianLab($('#page-now').val());      
                            },
                            complete: function() {
                                hideLoader();
                            },
                            error: function(e) {
                                messageCustom('Terjadi Kesalahan! | Gagal Ubah Panggilan Ruang Sampling')
                            }
                        });
                    // }
        //         }
        //     }
        // });      
        
        // getListAntrianLab($('#page-now').val());              
    }
	
    function konfirmasiCallLab(nama_ruangan,kode_antrian){        
        $('#konfrim-nama-ruangan').val(nama_ruangan);
        $('#konfrim-kode-antrian').val(kode_antrian);
        $('#konfrim-type').val('call');
        
        $('#btn-konfirmasi').html(' Ya Panggil');
        $('#modal-konfirmasi').modal('show');
        $('#modal-konfirmasi-label').html('Konfirmasi Panggil');    
    }

    function konfirmasReCallLab(nama_ruangan,kode_antrian){     
        $('#konfrim-nama-ruangan').val(nama_ruangan);
        $('#konfrim-kode-antrian').val(kode_antrian);
        $('#konfrim-type').val('recall');
        
        $('#btn-konfirmasi').html(' Ya Panggil Ulang');
        $('#modal-konfirmasi').modal('show');
        $('#modal-konfirmasi-label').html('Konfirmasi Panggil Ulang');
    }   

    function btnKonfirmasi(type,nama_ruangan,kode_antrian){		
        $('#modal-konfirmasi').modal('hide');
        type         = $('#konfrim-type').val();
        nama_ruangan = $('#konfrim-nama-ruangan').val();
        kode_antrian = $('#konfrim-kode-antrian').val();

        let user = "<?= $this->session->userdata("nama") ?>";
        if(type=='call'){
            $.ajax({
                type: 'GET',
                url: '<?= base_url('antrian_lab/api/antrian_lab/get_call_lab') ?>',
                data: 'ruang=' + nama_ruangan +'&kode_antrian='+kode_antrian +'&user='+user,
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {  
                    if(data.status === true){
                        messageCustom(data.message, 'Success');
                    } else {
                        messageCustom(data.message, 'Info');
                    }      
                },
                complete: function() {
                    hideLoader();
                },
                error: function(e) {
                    messageCustom('Terjadi Kesalahan! | Gagal Call Antrian Laboratorium')
                }
            });
        } else {
            $.ajax({
                type: 'GET',
                url: '<?= base_url('antrian_lab/api/antrian_lab/get_recall_lab') ?>',
                data: 'ruang=' + nama_ruangan +'&kode_antrian='+kode_antrian +'&user='+user,
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {  
                    if(data.status === true){
                        messageCustom(data.message, 'Success');
                    } else {
                        messageCustom(data.message, 'Info');
                    }        
                },
                complete: function() {
                    hideLoader();
                },
                error: function(e) {
                    messageCustom('Terjadi Kesalahan! | Gagal ReCall Antrian Laboratorium')
                }
            });
        }
    }
    

</script>