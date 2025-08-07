<script>
    $(function() {
        getListPoliHFIS();
        
        $('#btn-reload').click(function() {
            resetAll();
            getListPoliHFIS();
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

    function getListPoliHFIS() {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('poli_hfis/api/poli_hfis/get_list_poli_hfis') ?>',
            data: 'keyword=' + $('#keyword').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                if(data.response === null){

                    swalAlert('warning', 'Validasi', 'Tidak terhubung dengan Server BPJS, Server BPJS sedang bermasalah. Silahkan Hubungi Pihak IT BPJS');

                }

                $.each(data.response, function(i, v) {

                    let html = /* html */ `
                        <tr>
                            <td class="poli-hfis" align="center">${++i}</td>
                            <td>${v.nmpoli}</td>
                            <td align="left">${v.nmsubspesialis}</td>
                            <td align="center">${v.kdsubspesialis}</td>
                            <td align="center">${v.kdpoli}</td>
                            <td align="center"></td>
                        </tr>
                    `;
                    $('#table-poli-hfis tbody').append(html);

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