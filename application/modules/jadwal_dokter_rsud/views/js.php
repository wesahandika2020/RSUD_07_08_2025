<script>
    $(function() {
        getJadwalDokterRSUD(1);

        $('#filter-jadwal').click(function() {
            $('#modal-filter-jadwal').modal('show');
            $('#modal-jadwal-label').html('Filter Jadwal Dokter');
        });
        
        $('#btn-reload').click(function() {
            resetAll();
            getJadwalDokterRSUD(1);
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

        let tindakanDate = new Date();
        $('#tanggal-jadwal').datetimepicker({
            format: 'DD/MM/YYYY',
            maxDate: new Date(tindakanDate.getFullYear(), tindakanDate.getMonth()+3, 0),
            beforeShow: function(i) { if ($(i).attr('readonly')) { return false; } }
            
        });

        $('#layanan-auto').select2({
            width: '100%',
            ajax: {
                url: "<?= base_url('jadwal_dokter_rsud/api/jadwal_dokter_rsud/kode_bpjs') ?>",
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
                var kode = '';
                if (data.kode !== '') {
                    kode = '<b>' + data.kode + '</b> - ';
                };
                var markup = kode + data.nama;
                return markup;
            },
            formatSelection: function(data) {
                $('#kode-bpjs').val(data.id);
                return data.nama;
            }
        });

        
        
    });

    function resetAll() {
        $('input[type=text], #keyword').val('');
        syams_validation_remove('.form-control, .select2-input');
    }

    function getJadwalDokterRSUD(p) {
        $('#modal-filter-jadwal').modal('hide');
        $('#page-now').val(p);
        $.ajax({
            url: '<?= base_url('jadwal_dokter_rsud/api/jadwal_dokter_rsud/data_jadwal_dokter_rsud') ?>/page/' + p,
            data: $('#form-jadwal-search').serialize(),
            type: 'GET',
            cache: false,
            dataType: 'JSON',
            success: function(data) {

                if ((p > 1) & (data.data.length === 0)) {
                    getAntrianBPJS(p - 1);
                    return false;
                }

                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

                $('#table-jadwal-dokter-rsud tbody').empty();



                
                $.each(data.data, function(i, v) {

                    let no = ((i + 1) + ((data.page - 1) * data.limit));

                    let html = '<tr>' +
                        '<td class="center">' + no + '</td>' +
                        '<td class="center">' + ((v.tanggal !== null) ? datefmysql(v.tanggal) : '') + '</td>' +
                        '<td class="center">' + ((v.nama_poli !== null) ? v.nama_poli : '') + '</td>' +
                        '<td class="left">' + ((v.nama_dokter !== null) ? v.nama_dokter : '') + '</td>' +
                        '<td class="center">' + ((v.kuota !== null) ? v.kuota : '') + '</td>' +
                        '<td class="center">' + ((v.jml_kunjung !== null) ? v.jml_kunjung : '') + '</td>' +
                        '<td class="center" style="display:flex;float:right">' +
                        '</td>' +
                        '</tr>';
                    $('#table-jadwal-dokter-rsud tbody').append(html);

                });

            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function paging(p) {
        
        getJadwalDokterRSUD(p);
        
    }

    
</script>