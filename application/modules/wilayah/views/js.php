<script>
    $(function() {
        // tabs
        $('#tab_wilayah a:first').tab('show');
        syams_ajax('<?= base_url("wilayah/page_provinsi") ?>', '#tab1');

        $(document).on('click', '.nav-item', function() {
            let id_tab = $(this).attr('id');

            switch (id_tab) {
                case 'provinsi_tab':
                    if ($('#tab1').html() == '') {
                        syams_ajax('<?= base_url("wilayah/page_provinsi") ?>', '#tab1');
                    }
                    break;

                case 'kota_kabupaten_tab':
                    if ($('#tab2').html() == '') {
                        syams_ajax('<?= base_url("wilayah/page_kota_kabupaten") ?>', '#tab2');
                    }
                    break;

                case 'kecamatan_tab':
                    if ($('#tab3').html() == '') {
                        syams_ajax('<?= base_url("wilayah/page_kecamatan") ?>', '#tab3');
                    }
                    break;

                case 'kelurahan_tab':
                    if ($('#tab4').html() == '') {
                        syams_ajax('<?= base_url("wilayah/page_kelurahan") ?>', '#tab4');
                    }
                    break;
            }

            return false;
        });
    });

    function paging(page, tab) {
        switch (tab) {
            case 1:
                getListProvinsi(page);
                $('#page_now_provinsi').val(page);
                break;

            case 2:
                getListKotaKabupaten(page);
                $('#page_now_kota_kabupaten').val(page);
                break;

            case 3:
                getListKecamatan(page);
                $('#page_now_kecamatan').val(page);
                break;

            case 4:
                getListKelurahan(page);
                $('#page_now_kelurahan').val(page);
                break;

            default:

                break;
        }
    }
</script>