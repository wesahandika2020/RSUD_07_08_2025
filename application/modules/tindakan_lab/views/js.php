<script>
    $(function() {
        // tabs
        $('#tab_tind a:first').tab('show');
        syams_ajax('<?= base_url("tindakan_lab/page_pk") ?>', '#tab1');

        $(document).on('click', '.nav-item', function() {
            let id_tab = $(this).attr('id');

            switch (id_tab) {
                case 'pk_tab':
                    if ($('#tab1').html() == '') {
                        syams_ajax('<?= base_url("tindakan_lab/page_pk") ?>', '#tab1');
                    }
                    break;

                case 'mb_tab':
                    if ($('#tab2').html() == '') {
                        syams_ajax('<?= base_url("tindakan_lab/page_mb") ?>', '#tab2');
                    }
                    break;

            }

            return false;
        });
    });

    // function paging(page, tab) {
    //     switch (tab) {
    //         case 1:
    //             getListJabatan(page);
    //             $('#page_now_jabatan').val(page);
    //             break;

    //         case 2:
    //             getListKepegawaian(page);
    //             $('#page_now_kepegawaian').val(page);
    //             break;

    //         case 3:
    //             getListTenagaMedis(page);
    //             $('#page_now_tenaga_medis').val(page);
    //             break;

    //         default:

    //             break;
    //     }
    // }
</script>