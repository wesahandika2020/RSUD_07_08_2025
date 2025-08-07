<style>
	#parent {
		height: 200px;
		overflow-y: auto;
    }
</style>

<script>
    $(function() {

        $('#bt_tambah_skk').click(function() {
            let accountGroup = "<?= $this->session->userdata('account_group') ?>";
            if((accountGroup === 'Admin') || (accountGroup === 'Admin Rekam Medis') || (accountGroup === 'Pendaftaran') || (accountGroup === 'Kepala Instalasi Rawat Jalan') || (accountGroup === 'Nurse Station')){         

                $('#tgl-search').empty();
                $('#tgl-search').append("<option value=''>Pilih Pasien Terlebih dahulu</option>")
                $('#s2id_pasien-search a .select2-chosen').html('Pilih Pasien');
				$('#id_pasien_search').val();
				$('#status_terlayani').val();
			    $('#form_surat_ket_kontrol_tambah')[0].reset();
                $('#modal_surat_ket_kontrol_tambah').modal('show');
            } else {     
				messageCustom('Hubungi Rekam Medis / Dokter DPJP / Administrator untuk menambah SKK !', 'Info');           
            }
        });

        $(':checkbox[readonly]').click(function(){
            return false;
        });

        getListSKD(1);
        $('#bt_reload_data').click(function() {
            resetAll();
            getListSKD(1);
        });

        // $('.form-control').keyup(function() {
        //     if ($(this).val() !== '') {
        //         syams_validation_remove(this);
        //     }
        // });

        $('#filtertgl, #tanggal-awal, #tanggal-akhir, #layanan, #pencarian_skd, #kategori').change(function() {
            getListSKD(1);
        });

        // $('.form-control').change(function() {
        //     if ($(this).val() !== '') {
        //         syams_validation_remove(this);
        //     }
        // });

        $('.select2-input').change(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        // datepicker search tanggal
        $('#tanggal-awal, #tanggal-akhir').datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function() {
            $(this).datepicker('hide');
        });

        $('#pasien-search').select2({
            ajax: {
                url: "<?= base_url('registrations/api/registrations_auto/pasien_auto') ?>",
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
                var markup = '<b>' + data.id + ' ' + data.nama +  ' </b> (' + datefmysql(data.tanggal_lahir) + ')' + '<br/>' + data.alamat;
                return markup;
            },
            formatSelection: function(data) {
				let umur = '';
                data.tanggal_lahir !== null ? umur = hitungUmur(data.tanggal_lahir) + ' (' + datefmysql(data.tanggal_lahir) + ')' : '';
                
                $.getJSON('<?= base_url('surat_ket_kontrol/api/surat_ket_kontrol/tgl_kunjungan') ?>?idpasien='+data.id, function(data){
                    $('#tgl-search').val('');
                    $('#id_pendaftaran_search').val('');
                    $('#id_layanan_pendaftaran_search').val('');                    
                    $('#tgl-search').empty();

                    if (data) {
                        $.each(data, function (index, value) {
                            $('#tgl-search').append("<option value='"+value.id+"'>"+value.tanggal+" - "+value.jenis_pendaftaran+"</option>")
                        })
                        $('#tgl-search').change();                        
                    } else {
                        $('#tgl-search').append("<option value=''>Pilih Pasien Terlebih dahulu</option>")
                    }
                })
				$('#id_pasien_search').val(data.id);
                return data.id+' '+data.nama;
            }
		})		

        
        $('#tgl-search').change(function() {
			let id_layanan_pendaftran  = $('#tgl-search').val();
            if(id_layanan_pendaftran != null){
                $.getJSON('<?= base_url('surat_ket_kontrol/api/surat_ket_kontrol/detail_kunjungan') ?>?id_layanan_pendaftran='+id_layanan_pendaftran, function(data){
                    $.each(data, function (index, value) {
                        $('#id_pendaftaran_search').val(value.id);
                        $('#id_layanan_pendaftaran_search').val(value.id_layanan_pendaftran); 
                        $('#status_terlayani').val(value.status_terlayani); 
                        $('#jenis_pendaftaran').val(value.jenis_pendaftaran); 

                    })
                })
            } else {
                $('#tgl-search').empty();
                $('#tgl-search').append("<option value=''>Kunjungan tidak ada !</option>")
            }
		})

    });

    function resetAll() {
        $(' #id, #pencarian_skd').val('');
        $('a .select2-chosen').html('Silahkan pilih Dokter');
        syams_validation_remove('.form-control, .select2-input');
    }

    function paging(p) {
        getListSKD(p);
    }

    function getListSKD(p) {
        
		let accountGroup = "<?= $this->session->userdata('account_group') ?>";
        $.ajax({
            type: 'GET',
            url: '<?= base_url('surat_ket_kontrol/api/surat_ket_kontrol/get_list_skd/page/') ?>' + p,
            data: 'keyword=' + $('#pencarian_skd').val() + '&layanan=' + $('#layanan').val() + '&filtertgl=' + $('#filtertgl').val() + '&tanggal_awal=' + $('#tanggal-awal').val() + '&tanggal_akhir=' + $('#tanggal-akhir').val() + '&kategori=' + $('#kategori').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListSKD(p - 1);
                    return false;
                }

                $('#pagination_skd').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary_skd').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table_skd_list tbody').empty();

                let html           = '';
                let jawabinternal  = '';
                let detail         = '';
                let detailInternal = '';
                let optionShow     = '';
                let optionCetak    = '';
                let optionUpdate   = '';
                let hakAkses       = '';

                $.each(data.data, function(i, v) {
                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    if (v.id !== null) {

						responSKB = `<tr><td colspan='2'>.</td></tr>
									<tr><td colspan='2'><i><b>- Respon SKB - </b></i></td></tr>
									<tr><td>Code &nbsp;</td>    <td> : ` + (v.skb_code !== null ? v.skb_code : '-') + ` </td></tr>
									<tr><td>Message &nbsp;</td> <td> : ` + (v.skb_message !== null ? v.skb_message : '-') + ` </td></tr>`;
									
                        dataSKK = `<tr><td>Poliklinik Asal &nbsp;</td> <td> : ` + (v.poli_asal !== null ? v.poli_asal : '-') + `</td></tr>
                                    <tr><td>Dokter Asal &nbsp;</td>    <td> : ` + (v.dokter_asal !== null ? v.dokter_asal : '-') + ` </td></tr>
                                    <tr><td>Tanggal Buat &nbsp;</td>   <td> : ` + (v.created_date !== null ? v.created_date : '-') + ` </td></tr>
                                    <tr><td>Petugas &nbsp;</td>        <td> : ` + (v.nama_user !== null ? v.nama_user : '-') + ` </td></tr>
                                    <tr><td>PRB &nbsp;</td>            <td> : ` + (v.prb !== null ? v.prb : '-') + ` </td></tr>`;

                        if (v.jenis == 'Surat Kontrol') {
                            jawabinternal ='';
                            detail = `<table>
                                      `+dataSKK+`<tr><td>.</td><td>.</td></tr>
                                      <tr><td>Alasan Kontrol&nbsp;</td><td> : ` + (v.alasan_kontrol !== null ? v.alasan_kontrol : '-') + `</td></tr>
                                      <tr><td>Rencana Tindak&nbsp;</td><td> : ` + (v.rencana_tindak_lanjut !== null ? v.rencana_tindak_lanjut : '-') + ` </td></tr>
									  `+responSKB+`
                                      </table>`;
                        } else if (v.jenis == 'Surat Kontrol Internal') {
                            let jenis_bantuan = ''; 
                            if(v.jenis_bantuan != null){
                                var jb = JSON.parse(v.jenis_bantuan);                                
                                if (jb.konsul == '1') { jenis_bantuan == '' ? jenis_bantuan='Konsultasi' : jenis_bantuan=jenis_bantuan+' & Konsultasi'}
                                if (jb.raber == '1')  { jenis_bantuan == '' ? jenis_bantuan='Perawatan bersama'  : jenis_bantuan=jenis_bantuan+' & Perawatan bersama' }
                                if (jb.alih == '1')   { jenis_bantuan == '' ? jenis_bantuan='Alih rawat'   : jenis_bantuan=jenis_bantuan+' & Alih rawat' }
                            }

                            if(v.id_kontrol_jawab != null){
                                jawabinternal = ' (Sudah)';
                                detailJawab = ` <tr><td colspan='2'><i><b>- Jawaban kontrol internal - </b></i></td></tr>
                                <tr><td>Hasil Pemeriksaan &nbsp;</td>    <td> : ` + (v.pemeriksaan !== null ? v.pemeriksaan : '-') + ` </td></tr>
                                <tr><td>Saran &nbsp;</td>                <td> : ` + (v.saran !== null ? v.saran : '-') + ` </td></tr>`;
                            } else {
                                jawabinternal =`<b style='color:red;'> (Belum)`;
                                detailJawab = `<tr><td colspan='2'><i style='color:red;'><b>- Kontrol internal belum dijawab - </b></i></td></tr>`;
                            }

                            detail = `<table>
                                      `+dataSKK+`<tr><td>.</td><td>.</td></tr>
                                      <tr><td>Jenis Bantuan &nbsp;</td>      <td> : ` + (jenis_bantuan !== '' ? jenis_bantuan : '-') + `</td></tr>
                                      <tr><td>Dirawat Dengan &nbsp;</td>     <td> : ` + (v.dirawat_dengan !== null ? v.dirawat_dengan : '-') + ` </td></tr>
                                      <tr><td>Keterangan &nbsp;</td>         <td> : ` + (v.keterangan !== null ? v.keterangan : '-') + ` </td></tr>
                                      <tr><td>.</td><td>.</td></tr>
                                      <tr><td>Respon SKB</td><td> </td></tr>
                                      <tr><td>Code &nbsp;</td>               <td> : ` + (v.skb_code !== null ? v.skb_code : '-') + ` </td></tr>
                                      <tr><td>Message &nbsp;</td>            <td> : ` + (v.skb_message !== null ? v.skb_message : '-') + ` </td></tr>
                                      `+detailJawab+responSKB+`
                                      </table>`;
                        } else {
                            detail = ``;
                        }                       
                                
                        if (v.status === 'Check In') {                        
						    booking = '<h6><span class="badge badge-success">Check In</span></h6>';
                            disabled_book_edit ='disabled';
                            disabled_book_cetak = '';
                        } else if (v.status === 'Booking') {						
                            booking = '<h6><span class="badge badge-warning">Booking</span></h6>';
                            disabled_book_edit ='';
                            disabled_book_cetak = '';
                        } else if (v.status === 'Batal') {						
                            booking = '<h6><span class="badge badge-danger">Batal</span></h6>';
                            disabled_book_edit ='disabled';
                            disabled_book_cetak = 'disabled';
                        } else {
                            booking = '<span class="blinker"><i><i class="fas fa-fw fa-spinner fa-spin m-r-5"></i>Belum</i></span>';
                            disabled_book_edit ='disabled';
                            disabled_book_cetak = 'disabled';
                        }

                        v.booking == 'Sudah' ?      disabled_skk ='disabled'       : disabled_skk ='';
                        v.no_surat_bpjs !== null ?  disabled_skb_cetak ='disabled' : disabled_skb_cetak ='';
                        v.no_surat_bpjs == null ?   disabled_skb_edit ='disabled'  : disabled_skb_edit ='';

                        if(accountGroup == 'Admin' || accountGroup == 'Kepala Instalasi Rawat Jalan' || accountGroup == 'Pendaftaran' || accountGroup == 'Nurse Station'){
                            hakAkses='';
						} else if( (accountGroup == 'Koordinator Rehabilitasi Medik' || accountGroup == 'Dokter Spesialis RM Rehab' ) && (v.id_spesialisasi == 34) ){
                            hakAkses='';
                        } else {
                            hakAkses=' disabled ';
                        }

                        optionShow   = '<button type="button" class="btn btn-secondary btn-xs mypopover" data-container="body" data-toggle="popover" data-placement="left" data-title="' + v.jenis + '" data-content="' + detail + '"><i class="fas fa-eye"></i> </button>' ;
                        buttonOpsion = '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakSuratKetKontrol(\''+v.id+'\',\''+v.id_pendaftaran+'\',\''+v.id_layanan_pendaftaran+'\',\''+v.jenis+'\')"><i class="fas fa-fw fa-print"></i> Surat Ket Kontrol (SKK) - Cetak</a>'+
                                       '<a class="'+ hakAkses + disabled_skk +' dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="konfirmasiEditDataSKD(\''+v.id+'\',\''+v.id_pendaftaran+'\',\''+v.id_layanan_pendaftaran+'\')"><i class="fas fa-fw fa-edit"></i> Surat Ket Kontrol (SKK) - Edit</a>'+
                                       '<a class="'+ disabled_skb_edit+' dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakSuratKontrol(\''+v.no_surat_bpjs+'\')"><i class="fas fa-fw fa-print"></i> Surat Kontrol BPJS (SKB) - Cetak</a>' +
                                       '<a class="'+ hakAkses + disabled_skb_cetak+' dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="inputSKB(\''+v.id+'\',\''+v.id_pendaftaran+'\',\''+v.id_layanan_pendaftaran+'\',\''+v.id_pasien+'\',\''+v.nama_pasien+'\',\''+v.no_polish+'\')"><i class="fas fa-fw fa-plus"></i>  Surat Kontrol BPJS (SKB) - Input Manual</a>'+
                                       '<a class="'+ disabled_book_cetak +' dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="handleCetakAntrian(\''+v.id_antrian+'\')"><i class="fas fa-fw fa-print"></i> Booking - Cetak</a>'
                                       ;
                                    //    '<a class="'+ hakAkses + disabled_book_edit +' dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick=""><i class="fas fa-fw fa-edit"></i> Booking - Edit</a>'
                                       
					}
					
                    const string = v.tanggal_daftar;
                    const parts = string.split(" ");

                    var html = /* html */
                        '<tr>' +
                           '<th class="center">' + no + '</th>' +
                            '<th class="center">' + parts[0] + '</th>' +
                            '<th class="center">' + v.id_pasien + '</th>' +
                            '<th class="left">'   + v.nama_pasien + '</th>' +
                            '<th class="center">' + (v.jenis !== null ? v.jenis : '-') + '</th>' +
                            '<th class="center">' + v.tanggal + '</th>' +
                            '<th class="left">'   + (v.poli_asal !== null ? v.poli_asal : '-') + '<br>' +(v.dokter_asal !== null ? v.dokter_asal : '-') + '</th>' +
                            '<th class="left">'   + (v.poli_tujuan !== null ? v.poli_tujuan : '-') + '<br>' +(v.dokter_tujuan !== null ? v.dokter_tujuan : '-') + '</th>' +
                            '<th class="center">' + (v.kode_booking !== null ? v.kode_booking : '-') + '</th>' +
                            '<th class="center">' + (v.no_surat_bpjs !== null ? v.no_surat_bpjs : '-') + '</th>' +
                            '<th class="center">' + booking + '</th>' +
                            '<td class="right" style="display:flex;float:right">' + 
                                optionShow +
                                '<div class="btn-group"><button type="button" class="btn waves-effect waves-light btn-secondary btn-xs dropdown-toggle"  data-toggle="dropdown"><i class="fas fa-cog"></i></button> ' +
                                    '<div class="dropdown-menu">' +
                                        buttonOpsion +
                                    '</div>' +
                                '</div>' +
                            '</td>' +
                        '</tr>';
                    $('#table_skd_list tbody').append(html);
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

    function handleCetakAntrian(id) {
		const dWidth = $(window).width()
		const dHeight = $(window).height()
		const x = screen.width / 2 - dWidth / 2
		const y = screen.height / 2 - dHeight / 2

		window.open('<?= base_url() ?>booking_poliklinik/cetak_bukti_boooking/' + id, 'Cetak Bukti Booking', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y)
	}

    function cetakSuratKetKontrol(id, id_pendaftaran, id_layanan_pendaftaran,jenis) {
		window.open('<?= base_url() ?>surat_ket_kontrol/printing_surat_ket_kontrol?id=' + id + '&id_pendaftaran=' + id_pendaftaran + '&id_layanan_pendaftaran=' + id_layanan_pendaftaran+ '&jenis=' + jenis, 'Cetak Surat Kontrol', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}
    
    function konfirmasiEditDataSKD(id,id_pendaftaran, id_layanan_pendaftaran) {        
		let accountGroup = "<?= $this->session->userdata('account_group') ?>";
        if((accountGroup === 'Admin') || (accountGroup === 'Admin Rekam Medis') || (accountGroup === 'Pendaftaran') || (accountGroup === 'Kepala Instalasi Rawat Jalan') || (accountGroup === 'Nurse Station') ){         
			$('#modal-surat-kontrol-dokter').modal('show');
			formSuratKontrolDoker(id_pendaftaran, id_layanan_pendaftaran,'ns');
			editDataSKD(id);
			$('#skd-id-unit-layanan-tujuan').select2('readonly', true);

			$('#skd-prb').attr('disabled', true);			
			$('#skd-preoperasi').attr('disabled', true);
			$('#skd-alasan-kontrol').attr('disabled', true);
			$('#skd-tindak-lanjut').attr('disabled', true);
			$('#skd-konsul').prop('checked', false);
			$('#skd-raber').prop('checked', false);
			$('#skd-alih').prop('checked', false);
			$('#skd-dirawat-dengan').attr('readonly', true);
			$('#skd-keterangan').attr('disabled', true);

			$('.tableskd').hide(); 
		} else {     
			messageCustom('Hubungi Rekam Medis / Dokter DPJP / Administrator untuk mengubah SKD !', 'Info');           
		}
    }      

    // function addSKB(){
    //     $('#modal_surat_kontrol').modal('show')
    //     $('#modal_surat_kontrol_label').html('Pembuatan Surat Kontrol/SPRI')
    // }

    function btn_tambah_skk() {        
        $('#modal_surat_ket_kontrol_tambah').modal('hide');
		if($('#jenis_pendaftaran').val() == 'IGD'){
            swalAlert('info', 'SSK gagal Tambah', 'Asal kunjungan dari IGD. Tidak dapat membuat Surat Keterangan Kontrol') 
        } else {
            if($('#status_terlayani').val() == 'Batal'){
                swalAlert('info', 'Pasien batal berkunjung', 'SKK tidak dapat dibuat!') 
            }else if($('#status_terlayani').val() == 'Belum'){
                swalAlert('info', 'Pasien belum dilayani', 'SKK tidak dapat dibuat, silahkan hubungi layanan untuk melakukan pelayanan !') 
            } else {
                formSuratKontrolDoker($('#id_pendaftaran_search').val(), $('#id_layanan_pendaftaran_search').val(), 'dokter');
            }	
        }
	}

    function inputSKB(id,id_pendaftaran, id_layanan_pendaftaran,id_pasien,nama_pasien,no_polish) { 
        riset_skb_manual();
        $('#id-pasien-skb').html(id_pasien);
        $('#nama-inputskb').html(nama_pasien);
        $('#nobpjs-inputskb').html(no_polish=='null'? '<i style="color:red">Tidak diisi<i>' : no_polish );
        $('#id-pasien-inputskb').val(id_pasien);
        $('#id-skk-inputskb').val(id);
        $('#id-pendaftaran-inputskb').val(id_pendaftaran);
        $('#id-layanan-pendaftaran-inputskb').val(id_layanan_pendaftaran);
        $('#modal_surat_ket_kontrol_skb_manual').modal('show');
    }   

    function btn_cek_skb() {
        no_surat_kontrol = $('#no-skb').val();
		$.ajax({
			type: 'GET',
			url: '<?php echo base_url(URL_VCLAIM.'get_surat_kontrol_by_no_surat') ?>',
			// data: 'no_surat=0223R0380523K001310',
			data: 'no_surat=' + no_surat_kontrol,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoaderWithMessage('Mohon Tunggu, Proses Pencarian Data...')
			},
			success: function(data) {
				if (data.metaData.code === "200") {
					if (data.response !== null) {
						$('#skb-nama').val(data.response.sep.peserta.nama);
						$('#skb-nobpjs').val(data.response.sep.peserta.noKartu);
						$('#skb-tgl-lahir').val(data.response.sep.peserta.tglLahir);
						$('#skb-jenis-kontrol').val(data.response.jnsKontrol);
						$('#skb-poli').val(data.response.namaPoliTujuan);
						$('#skb-dokter').val(data.response.namaDokter);
						$('#skb-tgl-kontrol').val(data.response.tglRencanaKontrol);
						
					} else {
						swalAlert('warning', 'Informasi', 'Gagal mendapatkan data, Silahkan coba kembali.')
					}
				} else {
					swalAlert('warning', 'Informasi', data.metaData.message)
				}
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {

			}
		})
	}

    function riset_skb_manual() {
        $('#id-pasien-skb').html('');
        $('#nama-inputskb').html('');
        $('#nobpjs-inputskb').html('');
        $('#id-pasien-inputskb').val('');
        $('#id-skk-inputskb').val('');
        $('#id-pendaftaran-inputskb').val('');
        $('#id-layanan-pendaftaran-inputskb').val('');

        $('#no-skb').val('');
        $('#skb-nama').val('');
        $('#skb-nobpjs').val('');
        $('#skb-tgl-lahir').val('');
        $('#skb-jenis-kontrol').val('');
        $('#skb-poli').val('');
        $('#skb-dokter').val('');
        $('#skb-tgl-kontrol').val('');
    }

	function cetakSuratKontrol(no_surat) {
		window.open('<?= base_url(URL_VCLAIM_PRINT) ?>surat_kontrol_bpjs/' + no_surat, 'Cetak Surat Kontrol ', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
	}

    function konfirmasiSimpanSKB() {
		if ($('#skb-nama').val() === '' || $('#skb-nobpjs').val() === '' || $('#skb-tgl-lahir').val() === '' || $('#skb-poli').val() === '' || $('#skb-dokter').val() === '' || $('#skb-tgl-kontrol').val() === '') {
            swalAlert('warning', 'Informasi', 'Data Surat Kontrol BPJS tidak boleh kosong.')
			return false;
		}

		bootbox.dialog({
			message: "Anda yakin akan menyimpan Data Surat Kontrol BPJS?",
			title: "Simpan Data Surat Kontrol BPJS",
			buttons: {
				batal: {
					label: '<i class="fas fa-fw fa-window-close"></i> Batal',
					className: "btn-secondary",
					callback: function () {

					}
				},
				masuk: {
					label: '<i class="fas fa-fw fa-check-circle"></i> Simpan',
					className: "btn-info",
					callback: function () {
						SimpanDataSKB();
					}
				}
			}
		});
	}

    function SimpanDataSKB() {
		$.ajax({
			type: 'POST',
            url: '<?= base_url('surat_ket_kontrol/api/surat_ket_kontrol/simpan_skb') ?>',
			data: $('#form_surat_ket_kontrol_skb_manual').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function () {
				showLoader();
			},
			success: function (data) {
				$('input[name=csrf_syam]').val(data.token);
				if (data.status) {
					messageEditSuccess();
					$('#modal_surat_ket_kontrol_skb_manual').modal('hide');
                    getListSKD(1);
				} else {
					messageEditFailed();
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

</script>