<style>
	#parent {
		height: 200px;
		overflow-y: auto;
    }
</style>

<script>
    $(function() {       

        let pageVal = '';
        setInterval(function(){
            let pg  = $('#page-now').val();
            pg      === undefined ? pg = '1' : '' ;
            pageVal = pg;
            
            if(typeof $('#pencarian_anrad').val() !== 'undefined'){
                getListAntrianRadiologi(pageVal);
            }
            
        }, 10000);

        $('#tgl-order-tambah').change(function() {
            //BELUM DI CEK UNTUK APA
			let id_order_radiologi  = $('#tgl-order-tambah').val();
            if(id_order_radiologi != null){
                $.getJSON('<?= base_url('antrian_radiologi/api/antrian_radiologi/detail_order_radiologi') ?>?id='+id_order_radiologi+'&type=id_order_radiologi', function(data){
                    $.each(data, function (index, value) {
                        $('#id-pendaftaran-tambah').val(value.id_pendaftaran);
                        $('#id-layanan-pendaftaran-tambah').val(value.id_layanan_pendaftaran); 
                        $('#id-order-tambah').val(value.id); 
                        $('#konfrim-order-tambah').val(value.status); 
                    })
                })
            } else {
                $('#tgl-order-tambah').empty();
                $('#tgl-order-tambah').append("<option value=''>Kunjungan tidak ada !</option>")
            }
		})

        getListAntrianRadiologi(1);
        $('#bt_reload_data').click(function() {
            resetAll();
            getListAntrianRadiologi(1);
        });

        $('#filter-panggil, #status-antrian, #tanggal, #ruang-radiologi, #pencarian_anrad').change(function() {
            getListAntrianRadiologi(1);
        });

        $('#tanggal').datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function() {
            $(this).datepicker('hide');
        });

        $('#bt_tambah').click(function() {
            let accountGroup = "<?= $this->session->userdata('account_group') ?>";
            if((accountGroup === 'Admin') || (accountGroup === 'Admin Radiologi') || (accountGroup === 'Koordinator Radiologi') ){         
                $('#tgl-order-tambah').empty();
                $('#tgl-order-tambah').append("<option value=''>Pilih Pasien Terlebih dahulu</option>")
                $('#s2id_pasien-order-tambah a .select2-chosen').html('Pilih Pasien');
				$('#id-pasien-tambah').val();
				$('#id-order-tambah').val();
			    $('#form_tambah_antrian_radiologi_pasien')[0].reset();
                $('#modal-tambah-antrian-radiologi-pasien').modal('show');
            } else {     
				messageCustom('Hubungi Admin Radiologi / Administrator untuk menambah Antrian Radiologi !', 'Info');           
            }
        });

        $('#call1').click(function()   { callRadiologi('1')  });
        $('#recall1').click(function() { reCallRadiologi('1')});

        $('#call2a').click(function()  { callRadiologi('2A')  });
        $('#recall2a').click(function(){ reCallRadiologi('2A')});

        $('#call2b').click(function()  { callRadiologi('2B')  });
        $('#recall2b').click(function(){ reCallRadiologi('2B')});

        $('#call3').click(function()   { callRadiologi('3')  });
        $('#recall3').click(function() { reCallRadiologi('3')});

        $('#call4').click(function()   { callRadiologi('4')  });
        $('#recall4').click(function() { reCallRadiologi('4')});

        $('#call5').click(function()   { callRadiologi('5')  });
        $('#recall5').click(function() { reCallRadiologi('5')});
        
        $('#pasien-order-tambah').select2({
            ajax: {
                url: "<?= base_url('registrations/api/registrations_auto/pasien_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) {
                    return {
                        q: term,
                        page: page,
                    };
                },
                results: function(data, page) {
                    var more = (page * 20) < data.total;
                    return {
                        results: data.data,
                        more: more
                    };
                }
            },
            formatResult: function(data) {
                var markup = '<b>' + data.id + ' ' + data.nama +  ' </b> (' + datefmysql(data.tanggal_lahir) + ')' + '<br/>' + data.alamat;
                return markup;
            },
            formatSelection: function(data) {
				let umur = '';
                data.tanggal_lahir !== null ? umur = hitungUmur(data.tanggal_lahir) + ' (' + datefmysql(data.tanggal_lahir) + ')' : '';
                
                $.getJSON('<?= base_url('antrian_radiologi/api/antrian_radiologi/detail_order_radiologi') ?>?id='+data.id+'&type=id_pasien', function(data){

                    $('#tgl-order-tambah').val('');
                    $('#id-pendaftaran-tambah').val('');
                    $('#id-layanan-pendaftaran-tambah').val('');                    
                    $('#tgl-order-tambah').empty();

                    if (data) {
                        $.each(data, function (index, value) {
                            $('#tgl-order-tambah').append("<option value='"+value.id+"'>"+value.waktu_order+" - "+value.jenis_layanan+" - "+value.status+"</option>")
                        })
                        $('#tgl-order-tambah').change();                        
                    } else {
                        $('#tgl-order-tambah').append("<option value=''>Pilih Pasien Terlebih dahulu</option>")
                    }
                })
				$('#id-pasien-tambah').val(data.id);
                return data.id+' '+data.nama;
            }
		})	

    });

    function paging(p) {
        getListAntrianRadiologi(p);
    }

    function getListAntrianRadiologi(p) {
        $('#page-now').val(p);
		let accountGroup = "<?= $this->session->userdata('account_group') ?>";
        $.ajax({
            type: 'GET',
            url: '<?= base_url('antrian_radiologi/api/antrian_radiologi/get_list_antrian_radiologi/page/') ?>' + p,
            data: 'keyword=' + $('#pencarian_anrad').val() + '&status_antrian=' + $('#status-antrian').val() + '&ruang_radiologi=' + $('#ruang-radiologi').val() + '&filter_panggil=' + $('#filter-panggil').val() + '&tanggal=' + $('#tanggal').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListAntrianRadiologi(p - 1);
                    return false;
                }

                $('#pagination_antrian_radiologi').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary_antrian_radiologi').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table_list_antrian_radiologi tbody').empty();

                let html        = '';
                let btnCall     = '';
                let btnCetakAntrian = '';
                let btnBatalAntrian = '';
                let titleBatal = '';

                $.each(data.data, function(i, v) {
                    let no = ((i + 1) + ((data.page - 1) * data.limit));
					
                    if (v.id !== null) {
                        let statusCall = 'Call';
                        let collorCall = 'warning';
                        let id_type    = '1';
                        if(v.jumlah_panggil >= 1){
                            statusCall = 'Recall';
                            collorCall = 'primary';
                            id_type    = '2';

                        }
                        btnCall         = '<button type="button" class="btn btn-'+collorCall+' btn-xxs mr-2" onclick="btn_panggil(' + v.id + ', \'' + v.id_pasien + '\', \'' + v.nama_pasien + '\', \'' + v.nomor_antrian + '\', \'' + v.ruang_radiologi + '\', \'' + statusCall + '\')"> <div style="width: 50px;"><h6 style="margin-bottom: 0px;"><span style="padding-right: 5px; padding-left: 5px;"> '+statusCall+' </span></h6></div></button>';
                        btnCetakAntrian = '<button type="button" class="btn btn-info btn-xxs mr-2" onclick="cetakAntrianRad(' + v.id + ', ' + p + ')" title="Cetak Antrian"><i class="fa fa-print"></i></button>';
                        btnBatalAntrian = '<button type="button" class="btn btn-danger  btn-xxs mr-2" onclick="batalAntrianRad(' + v.id + ', 0 , ' + p + ')" title="Hapus Antrian"><i class="fa fa-trash"></i></button>';
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
                        status_antrian = 'Aktif';
                    }

                    let jenisLayanan = '';
					if (v.layanan === 'Rawat Inap') { jenisLayanan = v.bangsal; }
					else if (v.layanan === 'IGD')   { jenisLayanan = v.jenis_igd; }

                    var html = /* html */
                        '<tr>' +
                            '<td class="center">' + no + '</td>' +
                            '<td class="center">' + v.tanggal_kunjungan + '</td>' +
                            '<td class="center">' + v.id_pasien + '</td>' +
                            '<td class="left">'   + v.nama_pasien + '</td>' +
                            '<td class="center">' + v.layanan + ' ' + jenisLayanan +'</td>' +
                            '<td class="center">' + v.waktu_order + '</td>' +
                            '<td class="center">' + v.ruang_radiologi + '</td>' +
                            '<td class="center">' + v.nomor_antrian + '</td>' +
                            '<td class="center">' + (v.waktu_panggil !== null ? v.waktu_panggil : '-') + '</td>' +
                            '<td class="center">' + (v.jumlah_panggil !== null ? v.jumlah_panggil : '0') + '</td>' +
                            '<td class="center">' + 'Tercetak ' + (v.cetak !== null ? v.cetak : '0') + ' kali' + '</td>' +
                            '<td class="center">' + status_antrian + '</td>' +
                            '<td class="left" style="display:flex;float:left">' + 
                                btnCetakAntrian + btnBatalAntrian +
                            '</td>' +
                        '</tr>';
                    $('#table_list_antrian_radiologi tbody').append(html);
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

    function resetAll() {
        $(' #id, #pencarian_anrad').val('');
        $('a .select2-chosen').html('Silahkan pilih');
        syams_validation_remove('.form-control, .select2-input');
    }
	
    function btn_tambah_antrian_radiologi() {        
        if($('#konfrim-order-tambah').val() == 'KONFIRM'){
            $('#modal-tambah-antrian-radiologi-pasien').modal('hide');
            konfirmasiTambahAntrianRad($('#id-pendaftaran-tambah').val(),$('#id-layanan-pendaftaran-tambah').val(),$('#id-order-tambah').val())
        } else {
            swalAlert('info', 'Order Radiologi Belum di KONFRIM', 'Silahkan konfrim order Radiologi di menu List Order Radiologi') 
        }	
	}

    
    function btn_panggil(id, norm, nama, nomor_antrian, ruang_radiologi, statusCall) {

        $('#call-id-antrin').val(id);
        $('#call-status-call').val(statusCall);
        $('#call-no-rm').html(norm);
        $('#call-nama-pasien').html(nama);
        $('#call-nomor-antrin').html(nomor_antrian);
        $('#call-ruang-radiologi').html(ruang_radiologi);
        $('#modal-call-antrin').modal('show');        
    }

    function cekDelayPanggilan(){
        let id   = $('#call-id-antrin').val();
        let type = $('#call-status-call').val();
        let delay_call = 8; //hitungan detik

        $('#modal-call-antrin').modal('hide');     

        $.ajax({
            type: 'GET',
            url: '<?= base_url('antrian_radiologi/api/antrian_radiologi/delay_panggilan') ?>',
            // data: 'id=' + id + '&type=' + type,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {  
                if(data.selisih_detik >= delay_call){ //hitungan detik
                    simpanAntrianPasien(id,type)
                } else {                    
                    swalAlert('warning', 'Waktu Tunggu', 'Jarak panggil antrian '+delay_call+' detik, setiap panggilan.');
                }              
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageCustom('Terjadi Kesalahan! | Gagal Memanggil Antrian')
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
                            data: 'ruang=' + idRuangan +'&user='+user,
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