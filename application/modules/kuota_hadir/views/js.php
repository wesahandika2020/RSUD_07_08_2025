<script>
    $(function() {
        getKuotaHadir(1);
        dashboardKuotaHadir(null);

        $('#btn-search').click(function() {
            $('#modal-filter-kuota').modal('show');
            $('#modal-jadwal-label').html('Filter Jadwal Dokter');
        });

        $('#btn-detail').click(function() {
            $('#modal-detail-kuota').modal('show');
        });

        $('#btn-reload').click(function() {
            resetAll();
            getKuotaHadir(1);
        });

        $('.form-control').keyup(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        $('.form-control, .select2-input').change(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        $('#tanggal-awal, #tanggal-akhir, #tanggal-harian').datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function() {
            $(this).datepicker('hide')
        });

        $('#layanan-auto').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/spesialisasi_auto') ?>",
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
                var markup = data.nama;
                return markup;
            },
            formatSelection: function(data) {
                return data.nama;
            }
        });

        setInterval(function() {
            $('#jam-kuota').html('<h4><b>'+$('#jam').html()+'</b></h4>')
        }, 1000);

    });

    function resetAll() {
        $('input[type=text], #keyword').val('');
        syams_validation_remove('.form-control, .select2-input');
    }

    function getKuotaHadir(p) {
        $('#modal-filter-kuota').modal('hide');
        $('#page-now').val(p);
        $.ajax({
            url: '<?= base_url('kuota_hadir/api/kuota_hadir/data_kuota_hadir') ?>/page/' + p,
            data: $('#form-kuota-search').serialize(),
            type: 'GET',
            cache: false,
            dataType: 'JSON',
            success: function(data) {

                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

                $('#progress-bar-kuota').empty();
                $('#table-kuota-hadir tbody').empty();
                $('#hidden-tr').hide();


                $.each(data.data, function(i, v) {

                    let hidden_tr = "hidden";
                    $('#btn-expand-all').click(function() {
                        hidden_tr = "";
                    });

                    let no = ((i + 1) + ((data.page - 1) * data.limit));

                    sudah_terlayani = parseInt(v.antrian_onsite_sudah) + parseInt(v.antrian_mobile_sudah) + parseInt(v.antrian_wa_sudah);
                    belum_terlayani = parseInt(v.antrian_onsite_belum) + parseInt(v.antrian_mobile_belum) + parseInt(v.antrian_mobile_sudah_batal) + parseInt(v.antrian_onsite_sudah_batal) + parseInt(v.antrian_wa_belum);

                    let html =
                        '<tbody>' +
                        '<tr>' +
                        '<td class="center">' + no + '</td>' +
                        '<td class="left">' + ((v.nama !== null) ? v.nama : '') + '</td>' +
                        '<td class="center">' + ((v.tanggal !== null) ? datefmysql(v.tanggal) : '') + '</td>' +
                        '<td class="center">' + ((v.antrian_wa_sudah !== null) ? v.antrian_wa_sudah : '') + '</td>' +
                        '<td class="center">' + ((v.antrian_wa_belum !== null) ? v.antrian_wa_belum : '') + '</td>' +
                        '<td class="center">' + ((v.antrian_wa !== null) ? v.antrian_wa : '') + '</td>' +
                        '<td class="center">' + ((v.antrian_mobile_sudah !== null) ? v.antrian_mobile_sudah : '') + '</td>' +
                        '<td class="center">' + ((v.antrian_mobile_sudah_batal !== null) ? v.antrian_mobile_sudah_batal : '') + '</td>' +
                        '<td class="center">' + ((v.antrian_mobile_belum !== null) ? v.antrian_mobile_belum : '') + '</td>' +
                        '<td class="center">' + ((v.antrian_mobile !== null) ? v.antrian_mobile : '') + '</td>' +
                        '<td class="center">' + ((v.antrian_onsite_sudah !== null) ? v.antrian_onsite_sudah : '') + '</td>' +
                        '<td class="center">' + ((v.antrian_onsite_sudah_batal !== null) ? v.antrian_onsite_sudah_batal : '') + '</td>' +
                        '<td class="center">' + ((v.antrian_onsite_belum !== null) ? v.antrian_onsite_belum : '') + '</td>' +
                        '<td class="center">' + ((v.antrian_onsite !== null) ? v.antrian_onsite : '') + '</td>' +
                        '<td class="center">' + (belum_terlayani) + '</td>' +
                        '<td class="center">' + (sudah_terlayani) + '</td>' +
                        '<td class="center">' + ((v.total_seluruh !== null) ? v.total_seluruh : '') + '</td>' +
                        '<td class="center">' + ((v.kuota !== null) ? v.kuota : '') + '</td>' +
                        '<td class="right">' +
                        ((v.detail.length > 0) ? '<a type="button" data-toggle="collapse" href="#show' + v.id + '" class="btn btn-info btn-xs" aria-expanded="false" id="btn-expand-all"><i class="fas fa-fw fa-expand mr-1"></i>Show</a>' : '') +
                        '</td>' +
                        '</tr>' +
                        '<tr id="show' + v.id + '" class="collapse">' +
                        '<td colspan="19" class="">' +
                        '<div class="card-body">' +
                        '<div class="text-right">' +
                        '<button type="button" id="btn-detail" class="btn btn-success waves-effect text-right mr-1" onclick="getDetailKuota(' + v.id + ')">' +
                        '<i class="fas fa-eye mr-1"></i>Detail Keterangan' +
                        '</button>' +
                        '</div>' +
                        '<table class="table table-hover table-striped table-sm color-table info-table m-t-5">' +
                        '<thead>' +
                        '<tr>' +
                        '<th class="center">No.</th>' +
                        '<th class="center">No. RM</th>' +
                        '<th class="center">Nama Pasien</th>' +
                        '<th class="center">Cara Bayar</th>' +
                        '<th class="center">Dokter</th>' +
                        '<th class="center">Status Keluar</th>' +
                        '</tr>' +
                        '</thead>' +
                        '<tbody>';
                    let noo = 1;
                    $.each(v.detail, function(key, val) {
                        html +=
                            '<tr>' +
                            '<td class="center">' + (noo++) + '</td>' +
                            '<td class="center">' + val.no_rm + '</td>' +
                            '<td class="left">' + val.nama + '</td>' +
                            '<td class="center">' + val.cara_bayar + '</td>' +
                            '<td class="left">' + (val.dokter !== null ? val.dokter : '-') + '</td>' +
                            '<td class="center">' + (val.status_keluar !== null ? val.status_keluar : "-") + '</td>' +
                            '</tr>';
                    });
                    html +=
                        '</tbody>' +
                        '</table>' +
                        '</div>'
                    '</td>' +
                    '</tr>' +
                    '</tbody>';

                    $('#table-kuota-hadir').append(html);
                });

            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function getDetailKuota(id_poli) {
        $('#modal-detail-kuota').modal('show');

        $.ajax({
            url: '<?= base_url('kuota_hadir/api/kuota_hadir/data_detail_kuota') ?>/id/' + id_poli,
            data: $('#form-kuota-search').serialize(),
            type: 'GET',
            cache: false,
            dataType: 'JSON',
            success: function(data) {

                $('#table-detail-antrian tbody').empty();
                $('#table-detail-layanan tbody').empty();

                $.each(data.data, function(i, v) {

                    jumlahAntrian = 0;
                    $.each(v.list_antrian, function(key, val) {
                        html1 =
                            '<tr>' +
                            '<td class="center">' + v.nama + '</td>' +
                            '<td class="center">' + (val.poli !== null ? val.poli : '- Tidak Pilih Poli -') + '</td>' +
                            '<td class="center">' + val.jml + '</td>' +
                            '</tr>';

                        jumlahAntrian += parseInt(val.jml);

                        $('#total-kuota-antrian').html(jumlahAntrian);
                        $('#table-detail-antrian tbody').append(html1);
                    });

                    jumlahLayanan = 0;
                    $.each(v.list_layanan, function(key, val) {
                        html2 =
                            '<tr>' +
                            '<td class="center">' + (val.poli !== null ? val.poli : '- Tidak Pilih Poli -') + '</td>' +
                            '<td class="center">' + v.nama + '</td>' +
                            '<td class="center">' + val.jml + '</td>' +
                            '</tr>';

                        jumlahLayanan += parseInt(val.jml);

                        $('#total-kuota-layanan').html(jumlahLayanan);
                        $('#table-detail-layanan tbody').append(html2);
                    });

                });
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    var elem = document.getElementById("dashboard-kuota");

    function openFullscreen() {
        if (elem.requestFullscreen) {
            elem.requestFullscreen();
        } else if (elem.webkitRequestFullscreen) {
            /* Safari */
            elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) {
            /* IE11 */
            elem.msRequestFullscreen();
        }
    }

    function closeFullscreen() {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.webkitExitFullscreen) {
            /* Safari */
            document.webkitExitFullscreen();
        } else if (document.msExitFullscreen) {
            /* IE11 */
            document.msExitFullscreen();
        }
    }

    function dashboardKuotaHadir(response = null) {
        $.ajax({
            url: '<?= base_url('kuota_hadir/api/kuota_hadir/data_dashboard_kuota') ?>',
            data: {
                response
            },
            type: 'POST',
            cache: false,
            dataType: 'JSON',
            success: function(data) {

                $('#progress-bar-kuota-lt-1').empty();
                $('#progress-bar-kuota-lt-4').empty();

                $.each(data.data, function(i, v) {
                    let sisa_kuota = ((v.sisa) == 0 & v.id_poli == "0" ? '-' : (v.kuota - v.total_seluruh));
                    let progress_bar = (isNaN(((v.total_seluruh / v.kuota) * 100)) ? '100' : ((v.total_seluruh / v.kuota) * 100));
                    let progress_bar_list = (v.sisa == 0 & v.id_poli == "0" ? 'TUTUP' : number_format(((v.total_seluruh / v.kuota) * 100), 0, ',', '.') + '%');
                    let kuota_list = (sisa_kuota == 0 ? 'Habis' : sisa_kuota);
                    let nama = "";

                    let bg_color = "";
                    if (v.id_poli != "0") {
                        bg_color = (v.sisa == 0 ? 'bg-success' : 'bg-info');
                    } else {
                        bg_color = 'bg-danger';
                    }

                    if (v.nama == 'Kedokteran Gigi Anak') {
                        nama = 'K Gigi Anak';
                    } else if (v.nama == 'POLIKLINIK ILI') {
                        nama = 'Poliklinik ILI';
                    } else if (v.nama == 'KLINIK NYERI') {
                        nama = 'Klinik Nyeri';
                    } else if (v.nama == 'Medical Check Up') {
                        nama = 'MCU';
                    } else {
                        nama = v.nama;
                    }

                    if (v.lantai == 'lt-1') {
                        let html_lt1 =
                            '<div class="col-md-2 mt-4">' +
                            // '<h5 class="modal-title left"><b>TOTAL ANTRIAN</b></h5>' +
                            '<h5 class="card-title float-right"><small>Sisa Kuota </small>' + kuota_list + '</h5>' +
                            '<h5 class="card-title left">' + nama + ' </h5>' +
                            '<div class="progress m-t-5">' +
                            '<div class="progress-bar ' + bg_color + '" style="width: ' + progress_bar + '%;" role="progressbar">' + progress_bar_list + '</div>' +
                            '</div>'
                        '</div>';

                        $('#progress-bar-kuota-lt-1').append(html_lt1);

                    } else {
                        let html_lt4 =
                            '<div class="col-md-2 mt-4">' +
                            // '<h5 class="modal-title left"><b>TOTAL ANTRIAN</b></h5>' +
                            '<h5 class="card-title float-right"><small>Sisa Kuota </small>' + kuota_list + '</h5>' +
                            '<h5 class="card-title left">' + nama + ' </h5>' +
                            '<div class="progress m-t-5">' +
                            '<div class="progress-bar ' + bg_color + '" style="width: ' + progress_bar + '%;" role="progressbar">' + progress_bar_list + '</div>' +
                            '</div>'
                        '</div>';

                        $('#progress-bar-kuota-lt-4').append(html_lt4);
                    }

                });
                dashboardKuotaHadir(data);
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function paging(p) {

        getKuotaHadir(p);

    }
</script>