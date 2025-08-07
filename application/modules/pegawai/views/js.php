<script>
    $(function() {
        // tabs
        $('#tab_pegawai a:first').tab('show');
        syams_ajax('<?= base_url("pegawai/page_jabatan") ?>', '#tab1');

        $(document).on('click', '.nav-item', function() {
            let id_tab = $(this).attr('id');

            switch (id_tab) {
                case 'jabatan_tab':
                    if ($('#tab1').html() == '') {
                        syams_ajax('<?= base_url("pegawai/page_jabatan") ?>', '#tab1');
                    }
                    break;

                case 'kepegawaian_tab':
                    if ($('#tab2').html() == '') {
                        syams_ajax('<?= base_url("pegawai/page_kepegawaian") ?>', '#tab2');
                    }
                    break;

                case 'tenadis_tab':
                    if ($('#tab3').html() == '') {
                        syams_ajax('<?= base_url("pegawai/page_tenaga_medis") ?>', '#tab3');
                    }
                    break;

            }

            return false;
        });
    });

    function paging(page, tab) {
        switch (tab) {
            case 1:
                getListJabatan(page);
                $('#page_now_jabatan').val(page);
                break;

            case 2:
                getListKepegawaian(page);
                $('#page_now_kepegawaian').val(page);
                break;

            case 3:
                getListTenagaMedis(page);
                $('#page_now_tenaga_medis').val(page);
                break;

            default:

                break;
        }
    }
</script>