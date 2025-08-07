<style>
    .highlight {
        background-color: #ea818b;
        border-color: #f7d5d9;
        color: #fff;
    }

    .highlight-purple {
        background-color: #ae80ff;
        border-color: #e7dff7;
        color: #fff;
    }
</style>
<script>
    $(function() {
        getListReferensiDPHO(1);

        $('#bt_reload_data').click(function() {
            resetAll();
            getListReferensiDPHO(1);
        });

        $('#pencarian-dpho').keyup(debounceTime(function() {
            $('#keyword-obat-search').val('')
            $('#id-dpho').val('')

            getListReferensiDPHO(1);
            // return false;
        }, 750))

        $('#keyword-obat-search').keyup(debounceTime(function() {
            if ($('#id-dpho').val() !== '' && $('#keyword-obat-search').val() !== '') {
                getListObat(1, $('#kode-apotek').val());
            } else {
                syams_validation('#keyword-obat-search', 'Silakan pilih obat terlebih dahulu');
                $('#keyword-obat-search').focus();
                return false;
            }
            // return false;
        }, 750))

    });

    function resetAll() {
        $('input[type=text], .form-control, #id_barang, #pencarian-dpho').val('');
        syams_validation_remove('.form-control, .custom-select');
    }


    let originalRows = {};
    let previousHighlightedId = null;

    function getListReferensiDPHO(p) {
        $('#page_now_kfa').val(p)
        $('.pointer-row').removeClass('highlight');

        $.ajax({
            type: 'GET',
            url: '<?= base_url('apotek_bpjs/api/Mapping_dpho/get_mapping_dpho/page/') ?>' + p,
            data: 'pencarian_dpho=' + $('#pencarian-dpho').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListReferensiDPHO(p - 1);
                    return false;
                }

                $('#kfa_simrs_pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#kfa_simrs_summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table_kfa_simrs tbody').empty();
                originalRows = {}; // Reset dulu

                let html = '';
                $.each(data.data, function(i, v) {
                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    let setKeterangan = '';

                    if (v.total_mapping > 0) {
                        setKeterangan = `<span class="badge badge-pill badge-success"><b>${v.total_mapping}</b> Mapping</span>`;
                    }

                    let html = `
                    <tr id="kfa_simrs_${v.id}" class="pointer-row" onclick="searchReferensiDPHO('${v.id}', '${v.kode_obat}', '${v.nama_obat}')">
                        <td>${no}</td>
                        <td>${v.id}</td>
                        <td>${v.kode_obat ?? ""}</td>
                        <td>${v.nama_obat}</td>
                        <td>${setKeterangan}</td>
                    </tr>`;

                    $('#table_kfa_simrs tbody').append(html);

                    originalRows[v.id] = {
                        html: html,
                        index: i
                    };
                });

                let id_barang = $('#id-dpho').val();
                $(`#kfa_simrs_${id_barang}`).addClass('highlight');

                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
                hideLoader();
            }
        });
    }

    function searchReferensiDPHO(id_dpho, kode_apotek, nama_lengkap) {
        syams_validation_remove('#keyword-obat-search');

        $('.pointer-row').removeClass('highlight');
        $(`#kfa_simrs_${id_dpho}`).addClass('highlight');

        // Kembalikan baris sebelumnya ke posisi semula
        if (previousHighlightedId && previousHighlightedId !== id_dpho) {
            const original = originalRows[previousHighlightedId];
            if (original) {
                // Hapus dulu elemen yang sudah dipindah
                $(`#kfa_simrs_${previousHighlightedId}`).remove();

                // Sisipkan ke posisi semula
                const rows = $('#table_kfa_simrs tbody tr');
                if (rows.length > original.index) {
                    $(rows[original.index]).before(original.html);
                } else {
                    $('#table_kfa_simrs tbody').append(original.html);
                }
            }
        }

        // Pindahkan baris yang diklik ke atas
        const row = $(`#kfa_simrs_${id_dpho}`);
        $('#table_kfa_simrs tbody').prepend(row);

        $('html, body').animate({
            scrollTop: $(`#kfa_simrs_${id_dpho}`).offset().top - 350
        }, 400);

        previousHighlightedId = id_dpho;

        $('#id-dpho').val(id_dpho);
        $('#keyword-obat-search').val(nama_lengkap);

        $('#kode-apotek').val('');
        $('#kode-apotek').val(kode_apotek);
        getListObat(1, kode_apotek);
    }

    function getListObat(p, kode_apotek) {
        $('#page_now_kfa_satu_sehat').val(p)
        $('.pointer-purple').removeClass('highlight-purple');

        $.ajax({
            type: 'GET',
            url: '<?= base_url('apotek_bpjs/api/Mapping_dpho/get_mapping_dpho_bpjs/page_dpho/') ?>' + p,
            data: 'keyword_obat=' + $('#keyword-obat-search').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListObat(p - 1, kode_apotek);
                    return false;
                }

                $('#kfa_satu_sehat_pagination').html(pagination2(data.jumlah, data.limit, data.page_dpho, 1));
                $('#kfa_satu_sehat_summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page_dpho));
                $('#table_kfa_satu_sehat tbody').empty();

                let html = '';
                $.each(data.data, function(i, v) {
                    let no = ((i + 1) + ((data.page_dpho - 1) * data.limit));
                    let id_dpho = $('#id-dpho').val();
                    let highlight = '';
                    let btnDelete = '';
                    let btnUpdateMapping = `<button type="button" class="btn btn-sm btn-success btn-circle" onclick="updateMappingBarang(${v.id}, ${id_dpho}, '${kode_apotek}')" title="Update Kode Apotek">
                                                <i class="fas fa-exchange-alt"></i>
                                            </button>`;

                    if (kode_apotek === v.kode_apotek) {
                        highlight = 'highlight-purple';
                        btnUpdateMapping = '';
                        btnDelete = `<button type="button" class="btn btn-sm btn-danger btn-circle" onclick="deleteMapping(${v.id}, ${id_dpho}, '${kode_apotek}')" title="Hapus Kode Apotek">
                                        <i class="fas fa-trash-alt"></i>
                                     </button>`;
                    }

                    html += `
                            <tr id="kfa_satu_sehat_${v.id}" class="pointer-purple ${highlight}">
                                <td>${no}</td>
                                <td>${v.id}</td>
                                <td>${v.jenis}</td>
                                <td>${v.kode_apotek ?? ""}</td>
                                <td>${v.nama_lengkap}</td>
                                <td class="text-right">
                                    ${btnUpdateMapping}
                                    ${btnDelete}
                                </td>
                            </tr>`;
                });

                $('#table_kfa_satu_sehat tbody').append(html);

                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
                hideLoader();
            }
        });
    }

    function updateMappingBarang(id, id_dpho, kode_apotek) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('apotek_bpjs/api/Mapping_dpho/update_mapping_barang') ?>',
            data: {
                id_barang: id,
                id_dpho: id_dpho,
                kode_apotek: kode_apotek
            },
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                hideLoader();

                $('#kode-apotek').val(kode_apotek);
                if (data.status !== false) {
                    getListReferensiDPHO($('#page_now_kfa').val());
                    getListObat($('#page_now_kfa_satu_sehat').val(), kode_apotek);


                    $(`#kfa_simrs_${id_barang}`).addClass('highlight');
                    $(`#kfa_satu_sehat_${id}`).addClass('highlight-purple');

                    messageCustom(data.message, 'Success');
                } else {
                    messageCustom(data.message, 'Error');
                }
            },
            error: function(e) {
                accessFailed(e.status);
                hideLoader();
            }
        });
    }

    function deleteMapping(id, id_dpho, kode_apotek) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('apotek_bpjs/api/Mapping_dpho/delete_mapping_barang') ?>',
            data: {
                id_barang: id,
                id_dpho: id_dpho,
                kode_apotek: kode_apotek
            },
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                hideLoader();

                $('#kode-apotek').val(kode_apotek);
                if (data.status !== false) {
                    getListReferensiDPHO($('#page_now_kfa').val());
                    getListObat($('#page_now_kfa_satu_sehat').val(), kode_apotek);


                    $(`#kfa_simrs_${id_barang}`).addClass('highlight');
                    $(`#kfa_satu_sehat_${id}`).addClass('highlight-purple');

                    messageCustom(data.message, 'Success');
                } else {
                    messageCustom(data.message, 'Error');
                }
            },
            error: function(e) {
                accessFailed(e.status);
                hideLoader();
            }
        });
    }

    function paging(p) {
        getListReferensiDPHO(p);
    }

    function paging2(p) {
        getListObat(p, $('#kode-apotek').val());
    }
</script>