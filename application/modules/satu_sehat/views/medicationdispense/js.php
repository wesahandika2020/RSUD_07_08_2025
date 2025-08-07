<script>
$(function() {

    $("#wizard-medication-dispense").bwizard();

    getDataMedicationDispense(1);
    getIntegrasiMedicationDispense(1);

    $('#tanggal-awal, #tanggal-akhir,#tanggal-awal-layanan, #tanggal-akhir-layanan').datepicker({
        format: 'dd/mm/yyyy'
    }).on('changeDate', function() {
        $(this).datepicker('hide');
    });
    
    $('#bt-search-medication-dispense').click(function() {
        $('#modal-search-medication-dispense').modal('show');
        $('#modal-search-label-medication-dispense').html('Parameter Pencarian');
    });

    $('#bt-integrasi-medication-dispense').click(function() {
        $('#modal-search-integrasi-medication-dispense').modal('show');
        $('#modal-search-integrasi-label-medication-dispense').html('Parameter Pencarian');
    });

    $('#btn-reload-medication-dispense').click(function() {
        getDataMedicationDispense(1);
    });

    $('#btn-reload-int-medication-dispense').click(function() {
        getIntegrasiMedicationDispense(1);
    });


})

function paging(p) {
        
    getDataMedicationDispense(p);
    
}

function cariDataMedicationDispense() {
    getDataMedicationDispense(1);
    $('#modal-search-medication-dispense').modal('hide');
}

function getDataMedicationDispense(page) {

    $('#page-medication-dispense').val(page);
    $.ajax({
        url: '<?= base_url('satu_sehat/api/satu_sehat/ambil_medication_dispense/page/') ?>' + page,
        data: $('#form-search-medication-dispense').serialize(),
        type: 'GET',
        cache: false,
        dataType: 'JSON',
        success: function(data) {

            if ((page > 1) & (data.data.length === 0)) {
                getDataMedicationDispense(page - 1);
                return false;
            }

            $('#pagination-medication-dispense').html(pagination(data.jumlah, data.limit, data.page, 1));
            $('#summary-medication-dispense').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

            $('#table-satset-medication-dispense tbody').empty();

            $.each(data.data, function(i, v) {

                let no = ((i + 1) + ((data.page - 1) * data.limit));

                let html = '<tr>' +
                    '<td class="center">' + no + '</td>' +
                    '<td class="center">' + ((v.waktu !== null) ? datetime2date(v.waktu) : '') + '</td>' +
                    '<td class="center">' + v.no_rm + '</td>' +
                    '<td class="left">' + v.nama_pasien + '</td>' +
                    '<td class="left">' + ((v.nama_poli !== null) ? v.nama_poli : '') + '</td>' +
                    '<td class="left">' + ((v.nama_barang !== null) ? v.nama_barang : '') + '</td>' +
                    '<td class="center">' + ((v.id_medication_dispense !== null) ? 'OK' : '') + '</td>' +
                    '</tr>';

                $('#table-satset-medication-dispense tbody').append(html);

            });

        },
        error: function(e) {
            accessFailed(e.status);
        }
    });

}

function paging2(p) {
    getIntegrasiMedicationDispense(p);
}

function cariIntegrasiMedicationDispense() {
    getIntegrasiMedicationDispense(1);
    $('#modal-search-integrasi-medication-dispense').modal('hide');
}

function getIntegrasiMedicationDispense(p) {
    $('#hal-medication-dispense').val(p);
    $.ajax({
        url: '<?= base_url('satu_sehat/api/satu_sehat/integrasi_medication_dispense') ?>/page/' + p,
        data: $('#form-kirim-medication-dispense').serialize(),
        type: 'GET',
        cache: false,
        dataType: 'JSON',
        success: function(data) {

            if ((p > 1) & (data.data.length === 0)) {
                getIntegrasiMedicationDispense(p - 1);
                return false;
            }

            $('#kirim-pagination-medication-dispense').html(pagination2(data.jumlah, data.limit, data.page, 1));
            $('#kirim-summary-medication-dispense').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

            $('#table-satset-kirim-medication-dispense tbody').empty();

            let statusRespon = '';
            
            $.each(data.data, function(i, v) {

                let no = ((i + 1) + ((data.page - 1) * data.limit));

                let html = '<tr>' +
                    '<td class="center">' + no + '</td>' +
                    '<td class="center">' + ((v.waktu !== null) ? datetime2date(v.waktu) : '') + '</td>' +
                    '<td class="center">' + v.no_rm + '</td>' +
                    '<td class="left">' + v.nama_pasien + '</td>' +
                    '<td class="left">' + ((v.nama_poli !== null) ? v.nama_poli : '') + '</td>' +
                    '<td class="left">' + ((v.nama_barang !== null) ? v.nama_barang : '') + '</td>' +
                    '<td class="right" style="display:flex;float:right">' +
                        '<div class="btn-group"><button type="button" class="btn waves-effect waves-light btn-secondary btn-xs dropdown-toggle" data-toggle="dropdown"><i class="fas fa-fw fa-cog"></i></button> ' +
                        '<div class="dropdown-menu">' +
                        '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="integrasiMedicationDispense(' + v.id + ',  ' + p + ')"><i class="fas fa-fw fa-pencil-alt m-r-5"></i>Integrasi Medication</a>' +
                        '</div>' +
                        '</div>' +
                    '</td>' +
                    '</tr>';

                $('#table-satset-kirim-medication-dispense tbody').append(html);

            });

        },
        error: function(e) {
            accessFailed(e.status);
        }
    });

}

function integrasiMedicationDispense(id, p) {

    let pesan = 'Apakah Anda ingin melakukan Integrasi?';
    let confirm_button = 'Integrasi';
                
    swal.fire({
        title: 'Integrasi',
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
                url: '<?= base_url("satu_sehat/api/satu_sehat/integrasiMedicationDispense") ?>',
                data: 'id=' + id,
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {

                    if(typeof data.metaData !== 'undefined'){

                        if(data.metaData.code === 201){

                            messageCustom(data.metaData.message, 'Success');
                            getIntegrasiMedicationDispense(p);
                            getDataMedicationDispense(1);

                        } else {

                            messageCustom(data.metaData.message, 'Error');
                            getIntegrasiMedicationDispense(p);
                            getDataMedicationDispense(1);

                        }

                    }
                        
                },
                complete: function() {
                    hideLoader();
                },
                error: function(e) {
                    messageCustom('Terjadi Kesalahan! | Gagal menyimpan/mengubah data')
                }
            })

        }
    });

}



</script>