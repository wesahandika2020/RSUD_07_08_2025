<script>
    $(function() {
        
        getSatuSehat();

        // $('#tabs-satu-sehat a:first').tab('show');
        $('#tabs3 a:first').tab('show');
        syams_ajax('<?= base_url("satu_sehat/page_pasien") ?>', '#tabtiga');

        $(document).on('click', '.nav-item', function() {
            let id_tab = $(this).attr('id');

            switch (id_tab) {
                case 'tabs1':
                    if ($('#tabone').html() == '') {
                        syams_ajax('<?= base_url("satu_sehat/page_organisasi") ?>', '#tabone');
                    }
                break;

                case 'tabs2':
                    if ($('#tabtwo').html() == '') {
                        syams_ajax('<?= base_url("satu_sehat/page_lokasi") ?>', '#tabtwo');
                    }
                break;

               case 'tabs3':
                    if ($('#tabtiga').html() == '') {
                        syams_ajax('<?= base_url("satu_sehat/page_pasien") ?>', '#tabtiga');
                    }
                break;

                case 'tabs4':
                    if ($('#tabempat').html() == '') {
                        syams_ajax('<?= base_url("satu_sehat/page_tenaga_medis") ?>', '#tabempat');
                    }
                break;

                case 'tabs5':
                    if ($('#tablima').html() == '') {
                        syams_ajax('<?= base_url("satu_sehat/page_encounter_kunjungan") ?>', '#tablima');
                    }
                break;
                case 'tabs6':
                    if ($('#tabenam').html() == '') {
                        syams_ajax('<?= base_url("satu_sehat/page_condition_primary") ?>', '#tabenam');
                    }
                break;
                case 'tabs7':
                    if ($('#tabtujuh').html() == '') {
                        syams_ajax('<?= base_url("satu_sehat/page_condition_secondary") ?>', '#tabtujuh');
                    }
                break;
                case 'tabs8':
                    if ($('#tabdelapan').html() == '') {
                        syams_ajax('<?= base_url("satu_sehat/page_procedure") ?>', '#tabdelapan');
                    }
                break;
                case 'tabs9':
                    if ($('#tabsembilan').html() == '') {
                        syams_ajax('<?= base_url("satu_sehat/page_observasi") ?>', '#tabsembilan');
                    }
                break;
                case 'tabs10':
                    if ($('#tabsepuluh').html() == '') {
                        syams_ajax('<?= base_url("satu_sehat/page_medication") ?>', '#tabsepuluh');
                    }
                break;
            case 'tabs11':
                    if ($('#tabsebelas').html() == '') {
                        syams_ajax('<?= base_url("satu_sehat/page_medication_dispense") ?>', '#tabsebelas');
                    }
                break;
            }
            return false;
        });


    });

    function getSatuSehat() {

        $.ajax({
            url: '<?= base_url('satu_sehat/api/satu_sehat/autentikasi_user') ?>',
            type: 'POST',
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                
                if(typeof data.metaData !== 'undefined'){

                    if(data.metaData.code === 201){

                        messageCustom('Autentikasi Gagal', 'Error');
                        
                    } else {

                        messageCustom('Autentikasi Berhasil', 'Success');
                        
                    }

                }

            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
        
    }

</script>