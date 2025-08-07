<script>
    var jenisLayanan = 'inap';

    $(function() {
        getListPendaftaran(1);

        $('#bt_search_data').click(function() {
            $('#modal_search').modal('show');
        });

        $('#bt_reload_data').click(function() {
            location.reload();
        });

        $("#tanggal_awal, #tanggal_akhir, #tanggal_pulang_update, #tanggal_meninggal_update").datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function() {
            $(this).datepicker('hide');
        });

        $('#klinik').change(function() {
            getListPendaftaran(1);
        });

        $('#status_pulang_update').change(function() {
            if ($(this).val() == 4) {
                $('.meninggal_bpjs').show()
            } else {
                $('.meninggal_bpjs').hide()
            }
        })
    });

    $('#asal').on('change', function(){
		getListPendaftaran(1)
	})

    function getListPendaftaran(p) {
        $('#page_now').val(p);
        $.ajax({
            type: 'GET',
            url: '<?= base_url("rawat_inap/api/rawat_inap/get_list_sep_rawat_inap") ?>/page/' + p + '/asal/' + $('#asal').val(),
            data: $('#form_search').serialize() + '&bangsal=' + $('#bangsal').val() + '&jenis_sep=inap',
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListPendaftaran(p - 1);
                    return false;
                }

                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));


                let disable = '';
                let disable_sep = '';
                let disable_edit = '';
                let nosep = '';
                let btn_sep = '';
                let btn_rujukan = '';

                $('#table_data tbody').empty();
                $.each(data.data, function(i, v) {
                    if (v.waktu_keluar !== null) {
                        disable = 'disabled';
                        disable_edit = 'disabled';
                    }

                    if (v.cara_bayar === 'Tunai') {
                        disable = 'disabled';
                        disable_sep = 'disabled';
                        disable_edit = 'disabled';
                    }

                    if (v.no_sep !== null) {
                        nosep = v.no_sep;
                        disable_sep = '';
                        btn_sep = '<a title="Update SEP" class="dropdown-item ' + disable + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="formUpdateSEP(\'' + v.no_sep + '\', \'' + v.layanan + '\', \'inap\')"><i class="fas fa-edit m-r-5"></i>Update SEP</a> ';
                        btn_rujukan = '<a title="Update Rujukan" class="dropdown-item waves-effect waves-light btn-xs" onclick="updateRujukan(\'' + v.id_pendaftaran + '\', \'' + nosep + '\', \'' + '' + '\')"><i class="fas fa-plus-circle m-r-5"></i>Buat Surat Rujukan</a></li>';
                    } 
                    // else {
                    //     nosep = '';
                    //     disable_sep = 'disabled';
                    //     btn_sep = '<a title="Klik untuk membuat SEP" class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="pembuatanSEP(\'' + v.id_pasien + '\' ,' + v.id + ', \'' + v.no_polish + '\', \'' + v.kode_bpjs + '\', \'' + v.waktu_daftar + '\', \'' + 'igd' + '\')"><i class="fas fa-plus-circle m-r-5"></i>Buat SEP</a> ';
                    //     btn_rujukan = '';
                    // }

                    // if(v.no_sep !== null && (v.nosep_igd === '-' && v.nosep_rajal === '-') || v.nosep_ranap === '-'){
					// 	let jenisSep = '';

					// 	if(v.nosep_rajal === '-'){
					// 		jenisSep = 'poli';
					// 	}

					// 	if(v.nosep_igd === '-'){
					// 		jenisSep = 'igd';
					// 	}

					// 	if(v.nosep_ranap === '-'){
					// 		jenisSep = 'inap';
					// 	}

					// 	nosep = '';
					// 	disable_sep = 'disabled';
					// 	btn_sep += '<a title="Klik untuk membuat SEP" class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="pembuatanSEP(\'' + v.id_pasien + '\' ,' + v.id + ', \'' + v.no_polish + '\', \'' + v.kode_bpjs + '\', \'' + v.waktu_daftar + '\', \'' + jenisSep + '\')"><i class="fas fa-plus-circle m-r-5"></i>Buat SEP </a> ';
					// 	btn_rujukan = '';
					// }

                    if((v.nosep_igd === '-' || v.nosep_igd === null) && (v.nosep_ranap === '-' || v.nosep_ranap === null)){
						nosep = '';
						disable_sep = 'disabled';
						btn_sep = '<a title="Klik untuk membuat SEP" class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="pembuatanSEP(\'' + v.id_pasien + '\' ,' + v.id + ', \'' + v.no_polish + '\', \'' + v.kode_bpjs + '\', \'' + v.waktu_daftar + '\', \'' + 'igd' + '\')"><i class="fas fa-plus-circle m-r-5"></i>Buat SEP</a> ';
						btn_rujukan = '';
                    }else if((v.nosep_igd === '-' || v.nosep_igd === null) && (v.nosep_ranap !== '-' || v.nosep_ranap !== null)){
						nosep = '';
						disable_sep = '';
						btn_sep = '<a title="Klik untuk membuat SEP" class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="pembuatanSEP(\'' + v.id_pasien + '\' ,' + v.id + ', \'' + v.no_polish + '\', \'' + v.kode_bpjs + '\', \'' + v.waktu_daftar + '\', \'' + 'igd' + '\')"><i class="fas fa-plus-circle m-r-5"></i>Buat SEP</a> ';
						btn_rujukan = '';
					}else if((v.nosep_igd !== '-' || v.nosep_igd !== null) && (v.nosep_ranap === '-' || v.nosep_ranap === null)){
						nosep = '';
						disable_sep = 'disabled';
						btn_sep = '<a title="Klik untuk membuat SEP" class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="pembuatanSEP(\'' + v.id_pasien + '\' ,' + v.id + ', \'' + v.no_polish + '\', \'' + v.kode_bpjs + '\', \'' + v.waktu_daftar + '\', \'' + 'inap' + '\')"><i class="fas fa-plus-circle m-r-5"></i>Buat SEP</a> ';
						btn_rujukan = '';
					}

                    if (v.no_rujukan != null) {
                        btn_rujukan = '<a title="Update Rujukan" class="dropdown-item waves-effect waves-light btn-xs" onclick="updateRujukan(\'' + v.id_pendaftaran + '\', \'' + nosep + '\', \'' + v.no_rujukan + '\')"><i class="fas fa-edit m-r-5"></i>Update Surat Rujukan</a>' +
                            '<a title="Hapus Rujukan" class="dropdown-item waves-effect waves-light btn-xs" onclick="hapusRujukan(\'' + v.no_rujukan + '\')"><i class="fas fa-trash m-r-5"></i>Hapus Surat Rujukan</a>' +
                            '<a title="Cetak Rujukan" class="dropdown-item waves-effect waves-light btn-xs" onclick="cetakRujukan(\'' + v.no_rujukan + '\')"><i class="fas fa-print m-r-5"></i>Cetak Surat Rujukan</a>';
                    }

                    var bed = v.bangsal+' Kelas '+v.kelas+' Ruang '+v.no_ruang+' No. Bed '+v.no_bed;

					v.nosep_igd !== '-'   && v.nosep_igd !== null ? is_igd    = ' <span class="label-warning" style="padding: 5px; margin-right: 5px;"> IGD</span>'+ v.nosep_igd : is_igd ='';	
                    v.nosep_rajal !== '-' && v.nosep_rajal !== null ? is_rajal = ' <span class="label-primary" style="padding: 5px; margin-right: 5px;"> Poli</span>'+ v.nosep_rajal : is_rajal ='';	
                    tgl_sep    = ((v.tgl_sepasal !== null) ? datetimefmysql(v.tgl_sepasal) : 'Belum cek!') ;	
                    if(v.no_polish  !== null) {	
                       btn_asal_sep = ' <button type="button" title="'+tgl_sep+'" class="btn btn-secondary btn-xs waves-effect waves-light nowrap mr-1" onclick="listAsalSep(\'' + v.id_pendaftaran + '\',\''+v.id + '\',\''+v.no_polish + '\', \'' + ((v.tanggal_daftar !== null) ? datetime2mysql(v.tanggal_daftar) : null)  + '\', \'' + ((v.tanggal_keluar !== null) ? datetime2mysql(v.tanggal_keluar) : null) + '\')"><i class="fas fa-sync-alt"></i></button> '	
                                   + is_igd + is_rajal ;	
                    } else {	
                        v.id_penjamin==1 ? btn_asal_sep = '<span ><i style="color:red"> No BPJS Kosong </i></span>' : btn_asal_sep = '<span ><i style="color:red"> - </i></span>';	
                    }	
                    v.nosep_ranap !== v.no_sep ? btn_cek_sep = '<i class="fas fa-times-circle"></i> ' : btn_cek_sep = '';	
					let no = ((i + 1) + ((data.page - 1) * data.limit));
                    let html = '<tr>' +	
                        '<td class="center">' + no + '</td>' +
                        '<td class="center">' + v.no_register + '</td>' +	
                        '<td class="center">' + ((v.tanggal_daftar !== null) ? datetimefmysql(v.tanggal_daftar) : '') + '</td>' +	
                        '<td class="center">' + ((v.tanggal_keluar !== null) ? datetimefmysql(v.tanggal_keluar) : '') + '</td>' +	
                        '<td class="center">' + v.id_pasien + '</td>' +	
                        '<td>' + v.nama + '</td>' +	
                        '<td class="center">' + v.cara_bayar + ((v.penjamin !== null) ? ' ('+v.penjamin+')' : '') +'</td>' +	
                        '<td class="center">' + ((v.no_polish !== null) ? v.no_polish : '') + '</td>' +	
                        '<td class="left">' + btn_asal_sep + '</td>' +	
                        '<td class="left">' + btn_cek_sep + ((v.nosep_ranap !== null) ? v.nosep_ranap : '') + '</td>' +	
                        '<td>' + ((v.user_sep !== null) ? v.user_sep : '') + '</td>' +
                        '<td align="right">' +
                        '<div class="btn-group"><button type="button" class="btn waves-effect waves-light btn-secondary btn-xs dropdown-toggle" data-toggle="dropdown"><i class="fas fa-cog"></i></button> ' +
                        '<div class="dropdown-menu">' +
                        btn_sep +
                        '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="editNoPolish(' + v.id + ',\'' + ((v.no_polish !== null) ? v.no_polish : '') + '\', ' + data.page + ')"><i class="fas fa-edit m-r-5"></i>Edit No Kartu Peserta</a>' +
                        '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="editNoSEP(' + v.id + ',\'' + ((v.no_sep !== null) ? v.no_sep : '') + '\', ' + data.page + ')"><i class="fas fa-edit m-r-5"></i>Edit No SEP Peserta</a>' +
                        '<a class="dropdown-item ' + disable_sep + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="updateTglPulangSEP(\'' + ((v.no_sep !== null) ? v.no_sep : '') + '\', ' + data.page + ')"><i class="fas fa-edit m-r-5"></i>Update Tgl Pulang SEP</a>' +
                        '<a class="dropdown-item ' + disable_sep + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakNotaSEP(\'' + ((v.no_sep !== null) ? v.no_sep : '') + '\')"><i class="fas fa-print m-r-5"></i>Cetak Nota SEP</a>' +
                        '<a class="dropdown-item ' + disable_sep + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="hapusSEP(\'' + ((v.no_sep !== null) ? v.no_sep : '') + '\', ' + data.page + ', ' + v.id_pendaftaran + ')"><i class="fas fa-trash m-r-5"></i>Hapus Data SEP</a>' +
                        btn_rujukan +
                        '</div>' +
                        '</div>' +
                        '</>' +
                        '</tr>';
                    $('#table_data tbody').append(html);
                });
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function paging(p) {
        getListPendaftaran(p)
    }

    function hapusSEP(no_sep = '', page, id_pendaftaran) {
        if (no_sep) {
            Swal.fire({
                title: 'Hapus SEP?',
                text: "Apakah anda yakin ingin menghapus SEP",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: '<i class="fas fa-window-close"></i> Batal',
                confirmButtonText: '<i class="fas fa-check-circle"></i> Ya, Hapus!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: 'DELETE',
                        url: '<?= base_url(URL_VCLAIM."hapus_sep") ?>',
                        data: 'no_sep=' + no_sep + '&id_pendaftaran=' + id_pendaftaran,
                        cache: false,
                        dataType: 'JSON',
                        success: function(data) {
                            var hasil = data[0];
                            if (hasil.metaData.code === "200") {
                                swalCustom('success', 'Hapus Data', 'No SEP. ' + hasil.response + ' telah berhasil dihapus');
                                getListPendaftaran(page);
                            } else {
                                swalCustom('warning', 'Hapus Data', hasil.metaData.message);
                            }
                        },
                        error: function(e) {
                            messageDeleteFailed();
                        }
                    });
                }
            });
        } else {
            swalCustom('warning', 'Hapus SEP', 'No. SEP Tidak ada, Silahkan buat SEP terlebih dahulu');
        }
    }

    function updateTglPulangSEP(no_sep, page) {
        if (no_sep === '') {
            swalCustom('warning', 'Informasi', 'No. SEP Tidak ada, Silahkan buat SEP terlebih dahulu');
            return false;
        }
        $('#no_sep_update').val(no_sep);
        $('#modal_tgl_pulang_sep').modal('show');
    }

    function doUpdateTglPulang() {
        $.ajax({
            type: 'PUT',
            url: '<?= base_url(URL_VCLAIM."update_tgl_pulang_sep") ?>',
            data: $('#form_tgl_pulang_sep').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                let hasil = data[0];
                if (hasil.metaData.code === "200") {
                    swalCustom('success', 'Update Tanggal Pulang SEP', 'Tgl Pulang dengan No SEP.' + hasil.response + ' telah berhasil diupdate');
                    getListPendaftaran(1);
                    $('#tanggal_pulang_update').val('');
                    $('#modal_tgl_pulang_sep').modal('hide');
                } else {
                    swalCustom('warning', 'Update Tanggal Pulang SEP', hasil.metaData.message);
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

     function pembuatanSEP(no_rm, id_layanan, nopol, kode_bpjs, waktu_daftar, jenisSep) {
        $('#no_rm_bpjs').val(no_rm);
        $('#no_rm2_bpjs').val(no_rm);
        $('#kode_poli').val(jenisSep === 'igd' ? 'IGD' : '');
        $('#id_layanan_pendaftaran_bpjs').val(id_layanan);
        $('#nokartu_bpjs').val(nopol);
        $('#waktu_daftar').val(waktu_daftar);
		$('#kode_bpjs').val(kode_bpjs);

        if (nopol === '') {
            swalAlert('warning', 'Validasi', 'Peserta belum memasukkan no. kartu asuransi');
        } else {
            getDataPesertaBPJS(nopol, 'nopolish', jenisSep, '', no_rm, waktu_daftar);
        }
    }
	
	function listAsalSep(id_pendaftaran,id_layanan_pendaftaran,no_polish,tanggal_daftar,tanggal_keluar) {
        tanggal_daftar = formatDate(tanggal_daftar) ;
        tanggal_keluar = ((tanggal_keluar !== 'null') ? formatDate(tanggal_keluar) : null);
        $.ajax({
            type: 'GET',
            url: '<?= base_url(URL_VCLAIM."get_history_sep") ?>/nokartu/' + no_polish,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {
                if (data.response !== null) {
                    let historiSep = [];
                    $.each(data.response.histori, function(i, v) {

                        if(tanggal_keluar != null){
                            if(new Date(tanggal_daftar).getTime() <= new Date(v.tglSep).getTime()  &&  new Date(tanggal_keluar).getTime() >= new Date(v.tglSep).getTime() && v.ppkPelayanan=='RSUD KOTA TANGERANG'){
                                historiSep.push(v)
                            }
                        } else {
                            if(new Date(tanggal_daftar).getTime() <= new Date(v.tglSep).getTime() && v.ppkPelayanan=='RSUD KOTA TANGERANG'){
                                historiSep.push(v)
                            }
                        }                        
                    })
                    
                    igd = '-' ;
                    rajal = '-' ; 
                    ranap = '-' ; 

                    let arHistoriSep = [...new Set(historiSep)];
                    $.each(arHistoriSep, function(i, v) {

                        v.jnsPelayanan=='1'? ranap = v.noSep : '' ; 
                        if(v.jnsPelayanan=='2'){
                            v.poliTujSep=='IGD' ? igd = v.noSep   : '' ; 
                            v.poliTujSep!='IGD' ? rajal = v.noSep : '' ; 
                        }

                        $.ajax({
                            type: 'POST',
                            url: '<?= base_url("sep_ranap/api/sep_ranap/sep_asal/id_pendaftaran/") ?>'+id_pendaftaran+'/id_layanan_pendaftaran/'+id_layanan_pendaftaran+'/igd/'+igd+'/rajal/'+rajal+'/ranap/'+ranap,
                            cache: false,
                            dataType: 'JSON',
                            beforeSend: function () {
                                showLoader();
                            },
                            success: function (data) {
                                $('input[name=csrf_syam]').val(data.token);
                                if (data.status) {
                                    messageEditSuccess();
                                    getListPendaftaran($('#page_now').val());
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
                    });
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

    function formatDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2) 
            month = '0' + month;
        if (day.length < 2) 
            day = '0' + day;

        return [year, month, day].join('-');
    }
	
</script>