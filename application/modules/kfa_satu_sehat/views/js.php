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
        getListKFA(1);

        $('#bt_reload_data').click(function() {
            resetAll();
            getListKFA(1);
        });

        $('#pencarian-kfa').keyup(debounceTime(function() {
            $('#keyword-obat-search').val('')
            $('#id-barang').val('')

            getListKFA(1);
            // return false;
        }, 750))

        $('#keyword-obat-search').keyup(debounceTime(function() {
            if ($('#id-barang').val() !== '' && $('#keyword-obat-search').val() !== '') {
                getListKFASatuSehat(1, $('#code-kfa').val());
            } else {
                syams_validation('#keyword-obat-search', 'Silakan pilih obat terlebih dahulu');
                $('#keyword-obat-search').focus();
                return false;
            }
            // return false;
        }, 750))

    });

    function resetAll() {
        $('input[type=text], .form-control, #id_barang, #pencarian-kfa').val('');
        syams_validation_remove('.form-control, .custom-select');
    }

    function getListKFA(p) {
        $('#page_now_kfa').val(p)
        $('.pointer-row').removeClass('highlight');

        $.ajax({
            type: 'GET',
            url: '<?= base_url('kfa_satu_sehat/api/kfa_satu_sehat/get_list_kfa/page/') ?>' + p,
            data: 'pencarian_kfa=' + $('#pencarian-kfa').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListKFA(p - 1);
                    return false;
                }

                $('#kfa_simrs_pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#kfa_simrs_summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table_kfa_simrs tbody').empty();


                let html = '';
                $.each(data.data, function(i, v) {
                    let no = ((i + 1) + ((data.page - 1) * data.limit));

                    let html = `
                    <tr id="kfa_simrs_${v.id}" class="pointer-row" onclick="searchKFASatuSehat('${v.id}', '${v.code}', '${v.nama_lengkap}')">
                        <td>${no}</td>
                        <td>${v.id}</td>
                        <td>${v.code}</td>
                        <td>${v.nama_lengkap}</td>
                    </tr>`;

                    $('#table_kfa_simrs tbody').append(html);
                });

                let id_barang = $('#id-barang').val();
                $(`#kfa_simrs_${id_barang}`).addClass('highlight');

                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
                hideLoader();
            }
        });
    }

    function searchKFASatuSehat(id_barang, code_kfa, nama_lengkap) {
        syams_validation_remove('#keyword-obat-search');

        $('.pointer-row').removeClass('highlight');
        $(`#kfa_simrs_${id_barang}`).addClass('highlight');

        $('#id-barang').val(id_barang);
        $('#keyword-obat-search').val(nama_lengkap);

        $('#code-kfa').val('');
        $('#code-kfa').val(code_kfa);
        getListKFASatuSehat(1, code_kfa);
    }

    function getListKFASatuSehat(p, code_kfa) {
        $('#page_now_kfa_satu_sehat').val(p)
        $('.pointer-purple').removeClass('highlight-purple');

        $.ajax({
            type: 'GET',
            url: '<?= base_url('kfa_satu_sehat/api/kfa_satu_sehat/get_list_kfa_satu_sehat/page_kfa/') ?>' + p,
            data: 'keyword_obat=' + $('#keyword-obat-search').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListKFASatuSehat(p - 1, code_kfa);
                    return false;
                }

                $('#kfa_satu_sehat_pagination').html(pagination2(data.jumlah, data.limit, data.page_kfa, 1));
                $('#kfa_satu_sehat_summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page_kfa));
                $('#table_kfa_satu_sehat tbody').empty();

                let html = '';
                $.each(data.data, function(i, v) {
                    let no = ((i + 1) + ((data.page_kfa - 1) * data.limit));
                    let id_barang = $('#id-barang').val();
                    let highlight = '';
                    let disabled = '';

                    if (code_kfa === v.code_kfa) {
                        highlight = 'highlight-purple';
                        disabled = 'disabled';
                    }

                    html += `
                            <tr id="kfa_satu_sehat_${v.id}" class="pointer-purple ${highlight}">
                                <td>${no}</td>
                                <td>${v.jenis}</td>
                                <td>${v.code_kfa}</td>
                                <td>${v.nama}</td>
                                <td class="text-right">
                                    <button type="button" class="btn btn-sm btn-danger btn-circle" onclick="updateCodeBarang(${v.id}, ${id_barang}, '${v.code_kfa}')" ${disabled}>
                                        <i class="fas fa-exchange-alt"></i>
                                    </button>
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

    function updateCodeBarang(id, id_barang, code_kfa) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('kfa_satu_sehat/api/kfa_satu_sehat/update_code_barang') ?>',
            data: {
                id_barang: id_barang,
                code_kfa: code_kfa
            },
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                hideLoader();

                $('#code-kfa').val(code_kfa);
                if (data.status !== false) {
                    getListKFA($('#page_now_kfa').val());
                    getListKFASatuSehat($('#page_now_kfa_satu_sehat').val(), code_kfa);


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
        getListKFA(p);
    }

    function paging2(p) {
        getListKFASatuSehat(p, $('#code-kfa').val());
    }
</script>