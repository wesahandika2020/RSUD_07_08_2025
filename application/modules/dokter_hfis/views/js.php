<script>
    $(function() {
        getListDokterHFIS();
        
        $('#btn-reload').click(function() {
            resetAll();
            getListDokterHFIS();
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

        
        
    });

    function resetAll() {
        $('input[type=text], #keyword').val('');
        syams_validation_remove('.form-control, .select2-input');
    }

    function getListDokterHFIS() {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('dokter_hfis/api/dokter_hfis/get_list_d_hfis') ?>',
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                $.each(data, function(i, v) {

                    if(data.length === undefined){

                        if(data.metaData.code === 400){

                            swalAlert('warning', 'Validasi', 'Tidak terhubung dengan Server BPJS, Server BPJS sedang bermasalah. Silahkan Hubungi Pihak IT BPJS');

                        }

                    } else {

                        let html = /* html */ `
                            <tr>
                                <td class="dokter-hfis" align="center">${++i}</td>
                                <td align="left">${v.namadokter}</td>
                                <td align="center">${v.kodedokter}</td>
                                <td align="center"></td>
                            </tr>
                        `;
                        $('#table-dokter-hfis tbody').append(html);

                    }

                })   

            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    
</script>