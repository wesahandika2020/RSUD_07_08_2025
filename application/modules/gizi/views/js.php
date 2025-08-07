<script type="text/javascript" src="<?= resource_url() ?>assets/node_modules/wizard/bwizard.js"></script>
<script>
    var dWidth = $(window).width();
    var dHeight = $(window).height();
    var x = screen.width / 2 - dWidth / 2;
    var y = screen.height / 2 - dHeight / 2;

    var GROUP = '<?= $group ?>';
    var baseUrl = '<?= base_url('gizi/api/gizi') ?>';

    $(function() {
        getListDaftarPMP(1);
        $("#wizard-gizi-form").bwizard();
        
        //btn search data
        $('#btn-search-data').click(function() {
            $('#modal-search').modal('show');
        });

        // btn reload data
        $('#btn-reload-data').click(function() {
            getListDaftarPMP(1);
        });

        // select filter layanan
        $('#layanan').change(function() {
            getListDaftarPMP(1);
        });

        // datepicker search tanggal
        $('#tanggal-awal, #tanggal-akhir').datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function() {
            $(this).datepicker('hide');
        });

        // remove validasi keyup
        $('.validasi-input, .form-control').keyup(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        // remove validasi change
        $('.validasi-input, .select2-input, .select2c-input, .custom-form').change(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        // select filter bangsal
        $('#bangsal, #status_pasien').change(function() {
            getListDaftarPMP(1);
        });

        

    });

    function getListDaftarPMP(p) {
        $('#page-now').val(p);

        var filter_dokter = '';
        // if ('<?= $this->session->userdata('profesi_nadis') ?>' == 'Dokter Spesialis') {
        //     filter_dokter = '&id_dokter=' + '<?= $this->session->userdata('id_translucent') ?>'
        // }

        $.ajax({
            type: 'GET',
            url: baseUrl + '/get_list_permintaan_makanan_pasien/page/' + p,
            cache: false,
            data: $('#form_search_gizi').serialize() + '&status_pasien=' + $('#status_pasien').val() + '&bangsal=' + $('#bangsal').val() + filter_dokter,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListDaftarPMP(p - 1);
                    return false;
                }

                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

                $('#table-permintaan-makan tbody').empty();
                

                $.each(data.data, function(i, v) {

                    let status = '';

                    let bangsal_bed = '';
                    
                    let btnKonfirmasi = '';
                    let btnBatal = '';
                    let bed_ri = v.bangsal_ri;
                    let bed_ic = v.bangsal_ic;
                    let statusOrd = '';

                    if(v.jenis_layanan === 'Rawat Inap'){

                        bangsal_bed = bed_ri + ' kelas ' + v.kelas_ri + ' ruang ' + v.ruang_ri + ' No. Bed ' + v.bed_ri;

                    } else if(v.jenis_layanan === 'Intensive Care'){

                        bangsal_bed = bed_ic + ' kelas ' + v.kelas_ic + ' ruang ' + v.ruang_ic + ' No. Bed ' + v.bed_ic;
                    
                    } else {

                        bangsal_bed = '';
                    }

                    let activeStyle = '';

                    if (v.status_order === 'Belum') {
                        statusOrd = '<span class="blinker"><i><i class="fas fa-fw fa-spinner fa-spin m-r-5"></i>Belum</i></span>';
                        btnKonfirmasi = '<button type="button" title="Konfirmasi Order DPMP" class="btn btn-secondary btn-xs mr-1" onclick="konfirmasiOrderDPMP(' + v.od_id + ', ' + data.page + ')"><i class="fas fa-check-circle mr-1"></i>Konfirmasi</button>';
                        btnBatal = '<button type="button" title="Batal Order DPMP" class="btn btn-secondary btn-xs mr-1" onclick="batalOrderDPMP(' + v.od_id + ', ' + data.page + ')"><i class="fas fa-times-circle mr-1"></i>Batal</button>';
                    } else if (v.status_order === 'Batal') {
                        activeStyle = 'active-status';
                        statusOrd = '<h5><span class="label label-danger"><i class="fas fa-fw fa-times m-r-5"></i>Batal</span></h5>';
                    } else if (v.status_order === 'Konfirm') {
                        statusOrd = '<h5><span class="label label-success"><i class="fas fa-fw fa-check-circle m-r-5"></i>Dikonfirmasi</span></h5>';
                        btnKonfirmasi = '<div class="dropdown">' +
                                            '<button class="btn waves-effect waves-light btn-secondary btn-xs dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-cog mr-1"></i></button>' +
                                            '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">' +
                                                '<a class="dropdown-item btn-xs" href="javascript:void(0)" onclick="entriDPMP2('+ v.id_pendaftaran +', '+ v.id_layanan_pendaftaran +', \''+ bangsal_bed +'\')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri DPMP New</a>' +
                                                '<a class="dropdown-item btn-xs" href="javascript:void(0)" onclick="entriDPMP('+ v.id_pendaftaran +', '+ v.id_layanan_pendaftaran +', \''+ bangsal_bed +'\')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri DPMP</a>' +
                                                '<a class="dropdown-item btn-xs" href="javascript:void(0)" onclick="entriGizi('+ v.id_pendaftaran +', '+ v.id_layanan_pendaftaran +', \''+ bangsal_bed +'\')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri Gizi</a>' +
                                            '</div>' +
                                        '</div>';
                    }

                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    let html = '<tr class="' + activeStyle + '">' +
                                    '<td class="center v-center">' + no + '</td>' +
                                    '<td class="center v-center">' + v.no_register + '</td>' +
                                    '<td class="nowrap v-center">' + ((v.waktu_order !== null) ? datetimefmysql(v.waktu_order) : '') + '</td>' +
                                    '<td class="nowrap v-center">' + v.id_pasien + '</td>' +
                                    '<td class="nowrap v-center">' + v.nama + '</td>' +
                                    '<td class="v-center">'+ bangsal_bed +'</td>' +
                                    '<td class="v-center">' + v.jenis_layanan + '</td>' +
                                    '<td class="nowrap v-center">' + v.dokter + '</td>' +
                                    '<td class="nowrap v-center">' + statusOrd + '</td>' +
                                    '<td class="center v-center">' + ((v.tindak_lanjut !== null) ? 'Selesai' : '-') + '</td>' +
                                    '<td class="right v-center">' +
                                     btnKonfirmasi + btnBatal + 
                                    '</td>' +
                                '</tr>';
                    $('#table-permintaan-makan tbody').append(html);
                });

            },
            complete: function() {
                hideLoader();
                $('#modal-search').modal('hide')
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }

   

    function paging(p) {
        getListDaftarPMP(p);
    }

    function konfirmasiOrderDPMP(id, page) {
        let pesan = 'Apakah anda ingin melakukan konfirmasi untuk Order ini ?';
        let confirm_button = 'Simpan';
        

        swal.fire({
            title: 'Konfirmasi',
            html: pesan,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-save"></i> ' + confirm_button,
            cancelButtonText: '<i class="fas fa-times-circle"></i> Batal',
            reverseButtons: true,
            allowOutsideClick: false
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url("gizi/api/gizi/order_dpmp") ?>',
                    data: 'id_order=' + id,
                    cache: false,
                    dataType: 'JSON',
                    beforeSend: function() {
                        showLoader()
                    },
                    success: function(data) {
                        if (data.status === true) {
                            messageCustom(data.pesan, 'Success');
                            getListDaftarPMP(page);
                        }else{
                            messageCustom(data.pesan, 'Error');
                            getListDaftarPMP(page);
                        }
                        
                    },
                    complete: function() {
                        hideLoader()
                    },
                    error: function(e) {
                        messageCustom('Data tidak ada', 'Error');
                    }
                })
            }
        });
        
    }

    function batalOrderDPMP(id, page) {

        let pesan = 'Apakah Anda ingin Membatalkan Order ini ?';
        let confirm_button = 'Simpan';
        

        swal.fire({
            title: 'Konfirmasi',
            html: pesan,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-save"></i> ' + confirm_button,
            cancelButtonText: '<i class="fas fa-times-circle"></i> Batal',
            reverseButtons: true,
            allowOutsideClick: false
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url("gizi/api/gizi/batal_order_dpmp") ?>',
                    data: 'id_order=' + id,
                    cache: false,
                    dataType: 'JSON',
                    beforeSend: function() {
                        showLoader()
                    },
                    success: function(data) {
                        if (data.status === true) {
                            messageCustom(data.pesan, 'Success');
                            getListDaftarPMP(page);
                        }else{
                            messageCustom(data.pesan, 'Error');
                            getListDaftarPMP(page);
                        }
                    },
                    complete: function() {
                        hideLoader()
                    },
                    error: function(e) {
                        messageCustom('Data tidak ada', 'Error');
                    }
                })
            }
        });
    }

</script>