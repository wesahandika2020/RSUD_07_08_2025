<script>
    $(function() {

           
        
    });


    function konfirmasiSimpanConsent(){

        if ($('#check-consent').prop('checked') === false) {
            syams_validation('#check-consent', 'Silakan lakukan checklist pada form ini');
            $('#check-consent').focus();
            return false;
        }

        syams_validation_remove($('#check-consent'));

        let idConsent = $('#id-consent').val();
        let pageConsent = $('#page-consent').val();
        let pesan = 'Apakah Anda ingin melakukan Integrasi Consent Satu Sehat Pasien?';
        let confirm_button = 'Integrasi';

        swal.fire({
        title: 'Consent Satu Sehat Pasien',
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
                    url: '<?= base_url("satu_sehat/api/satu_sehat/consent_satu_sehat_pasien") ?>',
                    data: 'id=' + idConsent,
                    cache: false,
                    dataType: 'JSON',
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(data) {

                        if(typeof data.metaData !== 'undefined'){

                            if(data.metaData.code === 201 | data.metaData.code === 202 | data.metaData.code === 400){

                                swalAlert('warning', data.metaData.code, data.metaData.message);
                                $('#modal-consent').modal('hide');
                                getListDataPasien(pageConsent, '');

                            } else {

                                messageCustom(data.metaData.message, 'Success');
                                $('#modal-consent').modal('hide');
                                getListDataPasien(pageConsent, '');

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