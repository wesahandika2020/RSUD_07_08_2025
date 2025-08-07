<script>
    $(function() {
        // tabs
        $('#tarif_tab a:first').tab('show');
        syams_ajax('<?= base_url("tarif/page_tarif_pelayanan") ?>', '#tab1');

        $(document).on('click', '.nav-item', function() {
            let id_tab = $(this).attr('id');

            switch (id_tab) {
                case 'tarif_pelayanan_tab':
                    if ($('#tab1').html() == '') {
                        syams_ajax('<?= base_url("tarif/page_tarif_pelayanan") ?>', '#tab1');
                    }
                    break;

                case 'tarif_kamar_ranap_tab':
                    if ($('#tab2').html() == '') {
                        syams_ajax('<?= base_url("tarif/page_tarif_kamar_ranap") ?>', '#tab2');
                    }
                    break;

                case 'tarif_kamar_operasi_tab':
                    if ($('#tab3').html() == '') {
                        syams_ajax('<?= base_url("tarif/page_tarif_kamar_operasi") ?>', '#tab3');
                    }
                    break;
                case 'tarif_perbekalan_kesehatan_tab':
                    if ($('#tab4').html() == '') {
                        syams_ajax('<?= base_url("tarif/page_tarif_perbekalan_kesehatan") ?>', '#tab4');
                    }
                    break;
            }

            return false;
        });
    });

    function paging(page, tab) {
        switch (tab) {
            case 1:
                getListTarifPelayanan(page);
                $('#page_now_tarif_pelayanan').val(page);
                break;

            case 2:
                getListTariKamarRanap(page);
                $('#page-now-tarif-kamar-ranap').val(page);
                break;

            case 3:
                getListTariKamarOperasi(page);
                $('#page-now-tarif-kamar-operasi').val(page);
                break;

            default:

                break;
        }
    }
</script>