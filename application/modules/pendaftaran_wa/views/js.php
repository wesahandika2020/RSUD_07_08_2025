<script>
    $(function() {
        getListPendaftaranWa(1);

        $('#bt_reload_data').click(function() {
            resetAll();
            getListPendaftaranWa(1);
        });

        $('.form-control').keyup(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

         // select filter layanan
        $('#layanan').change(function() {
            getListPendaftaranWa(1);
        });

        $('#pencarian_pendaftaran_wa').change(function() {
            getListPendaftaranWa(1);
        });

        $('#tanggal').change(function() {
            getListPendaftaranWa(1);
        });

        $('.form-control').change(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        $('.select2-input').change(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        // datepicker search tanggal
        $('#tanggal').datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function() {
            $(this).datepicker('hide');
        });

        $('.form-control, .select2-input').change(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this);
			}
		}); 

        $('#jenis-kasus').change(function() {
            $('#pasien-search').html();
            
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
                var markup = '<b>' + data.id + '</b>' + ' ' + data.nama + '<br/>' + data.no_identitas + '<br/>' + data.alamat;
                return markup;
            },
            formatSelection: function(data) {
                $('#id-pasien').val(data.id);
                // $('#nik-pilihan').html(data.no_identitas);

               
                if ($('#noktp-detail').html() === data.no_identitas ) {
                    $('#note-pilihan').html('   No KTP sesuai');
                    
                } else if (data.no_identitas === '') {
                    $('#note-pilihan').html('');
                } else {
                    $('#note-pilihan').html('   No KTP BERBEDA !!!');
                }

                return data.id + ' - ' + data.nama + ' - ' + data.no_identitas;
            }
        });

    });

    function resetAll() {
        $('input[type=text], .form-control, #id, #pencarian_pendaftaran_wa').val('');
        // $('a .select2-chosen').html('Silahkan pilih Kepala Instalasi');
        syams_validation_remove('.form-control, .select2-input');
    }

    function getListPendaftaranWa(p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('pendaftaran_wa/api/pendaftaran_wa/get_list_pendaftaran_wa/page/') ?>' + p,
            // data: 'keyword=' + $('#pencarian_pendaftaran_wa').val() + '&layanan=' + $('#layanan').val() ,
            data: 'keyword=' + $('#pencarian_pendaftaran_wa').val() + '&layanan=' + $('#layanan').val() + '&tanggal=' + $('#tanggal').val() ,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListPendaftaranWa(p - 1);
                    return false;
                }

                $('#pendaftaran_wa_pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#pendaftaran_wa_summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table_pendaftaran_wa tbody').empty();

                let html = '';
                $.each(data.data, function(i, v) {

                    
                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    let background = '';
                    if (v.status == 'Baru') {
                        background = 'style="background-color:#ffe6e6;"';
                    } else {
                        background = '';
                    }
                    
                    let account_group = "<?= $this->session->userdata('account_group') ?>";
					let buttonOpsion ='';
                    if(account_group === 'Admin'){
                        buttonOpsion = 
                        '<td class="right" style="display:flex;float:right">' +
                            '<div class="btn-group"><button type="button" class="btn waves-effect waves-light btn-secondary btn-xs dropdown-toggle"  data-toggle="dropdown"><i class="fas fa-cog"></i></button> ' +
                                '<div class="dropdown-menu">' +
                                //    '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="editNoPolish(' + v.id_layanan_pendaftaran + ',\'' + ((v.no_polish !== null) ? v.no_polish : '') + '\', ' + data.page + ')"><i class="fas fa-edit"></i> Edit Poliklinik</a>' +  
                                    // '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="editNoRM('+ '\''+ v.nik + '\',\'' + v.nama + '\',\'' + ((v.no_rm_wa !== null) ? v.no_rm_wa : '') + '\', ' + data.page + ')"><i class="fas fa-edit"></i> Edit Status Pasien</a>'
                                    '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="bt_edit_status_pasien('+ '\''+ v.id + '\',\'' + v.nik+ '\',\'' + v.nama+ '\',\''+ v.status+ '\',\'' + v.no_rm_wa + '\''+ ')"><i class="fas fa-edit"></i> Edit Status Pasien</a>'
                                '</div>' +
                            '</div>' +
                        '</td>';
                    }
							
					if (v.checkin === 'Sudah') {
                        checkin  = '<h5><span class="label label-success"><i class="fas fa-fw fa-check-circle m-r-5"></i> Sudah</span></h5>';
                    } else if (v.checkin === 'Batal') {
                       checkin = '<h5><span class="label label-danger"><i class="fas fa-minus-circle"></i> Batal</span></h5>';
                    } else {                        
                        checkin = '<span class="blinker"><i><i class="fas fa-fw fa-spinner fa-spin m-r-5"></i>'+v.checkin+'</i></span>';
                    }
					
                    let html = '<tr ' + background + '>' +
                        '<td align="center">' + no + '</td>' +
                        '<td align="center">' + v.tgl_kunjungan + '</td>' +
                        '<td align="center">' + v.no_bukti_daftar + '</td>' +
                        '<td align="center">' + v.nik + '</td>' +
                        '<td align="center">' + ((v.no_rm_wa !== null) ? v.no_rm_wa : '') + '</td>' +
                        '<td align="left">' + v.nama + '</td>' +
                        '<td align="center">' + ((v.telp !== null) ? v.telp : '') + '</td>' +
                        '<td align="center">' + ((v.telp_wa !== null) ? v.telp_wa : '') + '</td>' +
                        '<td align="center">' + v.tujuan_poli + '</td>' +
                        '<td align="left">' + v.dokter + '</td>' +
                        '<td align="center">' + v.penjamin + '</td>' +
                        '<td align="center">' + v.status + '</td>' +
                        '<td align="center">' + checkin + '</td>' +
                        '<td align="right">' + buttonOpsion + '</td>' +
                        '</tr>';
                    $('#table_pendaftaran_wa tbody').append(html);
                });

                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
                hideLoader();
            }
        });
    }

    function bt_edit_status_pasien(id,nik,nama,status,no_rm_wa) {
        $('#id-pendaftaran-wa').val(id);
        $('#noktp-detail').html(nik);
        $('#nama-detail').html(nama);

        if(status === 'Lama'){
            no_rm_wa=' ('+no_rm_wa+')';
        } else {no_rm_wa=''; }
        
        $('#status-detail').html(status+no_rm_wa);
        
        $('#modal_edit_status_pasien').modal('show');
        $('#modal_edit_status_pasien_label').html('Edit Status Pasien');
        // $('#form_search_formulir')[0].reset();
        // resetAllData();
    }


    function konfirmasiSimpanEditStatus() {

        if ($('#jenis-kasus').val() === '') {
            syams_validation('#jenis-kasus', 'Status baru harus diisi !');
			return false;
        }

        bootbox.dialog({
            message: "Apakah anda akan mengedit status pasien ?",
            title: "Edit Pendaftaran",
            buttons: {
                batal: {
                    label: '<i class="fas fa-window-close m-r-5"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                masuk: {
                    label: '<i class="fas fa-check-circle m-r-5"></i>Simpan',
                    className: "btn-info",
                    callback: function() {
                        simpanEditStatus();
                    }
                }
            }
        });
    }

    function simpanEditStatus() {
        let id_pendaftaran_wa = $('#id-pendaftaran-wa').val();
        $.ajax({
            type: 'POST',
            url: '<?= base_url("pendaftaran_wa/api/pendaftaran_wa/edit_staus_pasien") ?>/' + id_pendaftaran_wa,
            data: $('#form_edit_status_pasien').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                $('#modal_edit_status_pasien').modal('hide');
                
                messageEditSuccess();
                getListPendaftaranWa(1);
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    function editNoRM(nik, nama, id_layanan, page) {

        
        // var polish = no_polish;
        // if (polish === 'null') {
        //     polish = '';
        // }

        // <input id="no_polish_edit" name="nopolish" type="text" value="${id_layanan}" placeholder="No. Polish" class="form-control">
        
        // <input type="text" name="pasien" id="pasien-search-wa" class="select2-input" placeholder="Pilih Pasien...">

        // <form class="form-horizontal">
        //                             <div class="form-group row"  style="padding-bottom: 0rem; padding-top: 0rem;">
        //                                 <label class="col-lg-3 col-form-label" for="name">Input no RM</label>
        //                                 <div class="col-lg-9">
        //                                     <input type="text" name="pasien_wa" id="pasien-search-wa" class="select2-input" placeholder="Pilih Pasien...">
        //                                 </div>
        //                             </div>
        //                         </form>

        bootbox.dialog({
            title: "Edit Status Pasien ",
            message: `<div class="row">
                            <div class="col-lg-12" style="padding: 0 1.5rem 0 1.5rem">     
                                <input type="hidden" name="id_pasien_search"  id="id_pasien_search">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="name"  style="padding-bottom: 0px; padding-top: 0px;">NIK  </label>                       
                                    <label class="col-lg-9 col-form-label" for="name"  style="padding-bottom: 0px; padding-top: 0px;">${nik}</label>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="name" style="padding-bottom: 0px; padding-top: 0px;">Nama  </label>                       
                                    <label class="col-lg-9 col-form-label" for="name"  style="padding-bottom: 0px; padding-top: 0px;">${nama}</label>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Pasien</label>
                                    <div class="col-md-9">
                                        <input type="text" name="pasien" id="pasien-search" class="select2-input" placeholder="Pilih Pasien...">
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>`,
            buttons: {
                success: {
                    label: '<i class="fas fa-save"></i> Simpan',
                    className: "btn-info",
                    callback: function() {
                        var no_polish_edit = $('#no_polish_edit').val();
                        simpanNoPolish(id_layanan, no_polish_edit);

                    }
                }
            }
        });

        // $('#formeditpolish').submit(function() {
        //     var no_polish_edit = $('#no_polish_edit').val();
        //     simpanNoPolish(id_layanan, no_polish_edit);
        //     $('.bootbox').modal('hide');
        //     return false;
        // });
    }

    function paging(p) {
        getListPendaftaranWa(p);
    }
</script>