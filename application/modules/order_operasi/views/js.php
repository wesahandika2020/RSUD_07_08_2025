<script>
    $(function() {
        // tabs
        $('#tabs-operasi a:first').tab('show');
        syams_ajax('<?= base_url("order_operasi/page_permintaan_operasi") ?>', '#tabone');

        $(document).on('click', '.nav-item', function() {
            let id_tab = $(this).attr('id');

            switch (id_tab) {
                case 'tabs1':
                    if ($('#tabone').html() == '') {
                        syams_ajax('<?= base_url("order_operasi/page_permintaan_operasi") ?>', '#tabone');
                    }
                    break;

                case 'tabs2':
                    if ($('#tabtwo').html() == '') {
                        syams_ajax('<?= base_url("order_operasi/page_data_operasi") ?>', '#tabtwo');
                    }
                    break;
            }
            return false;
        });
    });

    function paging(page, tab) {
        switch (tab) {
            case 1:
                getListJadwalOperasi(page);
                $('#page-now1').val(page);
                break;
            case 2:
                getListHistoryResep(page);
                break;
            case 3:
                getListDataOperasi(page);
                $('#page-now2').val(page);
                break;
            default:
                break;
        }
    }
</script>