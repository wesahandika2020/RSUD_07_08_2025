<script>
    $(function() {
        $('#layanan-antri').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/spesialisasi_auto') ?>",
                dataType: 'JSON',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                    };
                },
                results: function(data, page) {
                    var more = (page * 20) < data.total; // whether or not there are more results available

                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {
                        results: data.data,
                        more: more
                    };
                }
            },
            formatResult: function(data) {
                var kode = '';
                if (data.kode !== '') {
                    kode = '<b>' + data.kode + '</b> - ';
                };
                var markup = kode + data.nama;
                return markup;
            },
            formatSelection: function(data) {
                getDokterSpesialis(data.id);
                return data.nama;
            }
        });

    });

    // Dokter Spesialis
    function getDokterSpesialis(id_spesialisasi = null, id_dokter = null) {
        $.ajax({
            url: '<?= base_url('pelayanan/api/pelayanan/get_dokter_spesialisasi') ?>/id_spesialisasi/' + id_spesialisasi + '/id_dokter/' + id_dokter,
            type: 'GET',
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                let html = '';
                html += '<option value="">Pilih Dokter</option>';
                $.each(data, function(i, v) {
                    const kuota = Math.abs(parseInt(v.kuota) - parseInt(v.jml_kunjung))
                    html += `<option value="${v.id_dokter}" ${kuota === 0 ? 'disabled' : ''} class="${kuota === 0 ? 'text-danger' : ''}"><b>${v.shift_poli} - ${v.nama_dokter}</b> - <small>${v.nama_poli} (${v.jml_kunjung}/${v.kuota}) ${kuota === 0 ? '- Full' : ''}</small></option>`
                });

                $('#dokter-konsul').html(html);
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }


    function konsulKlinikLain(id_pendaftaran, id_layanan_pendaftaran, id_unit_layanan = null) {

        $('#layanan-antri, #dokter-konsul').val('');
        $('#table-konsul tbody').empty();
        $('#id-unit-layanan-konsul').val(id_unit_layanan);
        $('#id-pendaftaran-konsul').val(id_pendaftaran);
        $('#id-layanan-pendaftaran-konsul').val(id_layanan_pendaftaran);
        $('#s2id_layanan-antri a .select2-chosen').html('Pilih Klinik');
        $('#modal-konsul').modal('show');

    }

    function addKonsul() {
        let html = '';
        let numb = $('.number-konsul').length;
        let layanan = $('#s2id_layanan-antri a .select2-chosen').html();
        let id_layanan = $('#layanan-antri').val();
        let dokter = $('#dokter-konsul option:selected').text();
        let id_dokter = $('#dokter-konsul').val();
        let keterangan = $('#keterangan').val(); //tambahan lina ket.konsul


        let stop = false;
        if ($('#layanan-antri').val() === '') {
            syams_validation('#layanan-antri', 'Layanan harus diisi!');
            stop = true;
        }

        if ($('#dokter-konsul').val() === '') {
            syams_validation('#dokter-konsul', 'Dokter harus diisi!');
            stop = true;
        }

        if ($('#id-unit-layanan-konsul').val() === id_layanan) {
            swalAlert('warning', 'Validasi', 'Anda tidak dapat merujuk pasien ke unit anda sendiri.');
            stop = true;
        }

        if (stop) {
            return false;
        }

        html = /* html */ `
            <tr>
                <td class="number-konsul center">${(++numb)}</td>
                <td><input type="hidden" name="layanan[]" value="${id_layanan}">${layanan}</td>
                <td><input type="hidden" name="dokter[]" value="${id_dokter}">${dokter}</td>
                <td><input type="hidden" name="keterangan[]" value="${keterangan}">${keterangan}</td>
                <td class="right"><button type="button" class="btn btn-secondary btn-xs" onclick="removeKonsul(this)"><i class="fas fa-trash"></i></button></td>
            </tr>
        `;

        $('#table-konsul tbody').append(html);
        $('#s2id_layanan-antri a .select2-chosen').html('Pilih Klinik');
        $('#layanan-antri, #dokter-konsul, #keterangan').val('');
        syams_validation_remove('#dokter-konsul')

    }

    function removeKonsul(el) {
        var parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
    }

    function entriKonsul() {
        let stop = false;
        if ($('.number-konsul').length < 1) {
            swalAlert('warning', 'Validasi', 'Masukkan terlebih dahulu klinik konsul tujuan');
            stop = true;
        }

        if (stop) {
            return false;
        }

        let klinik_asal = $('#id-unit-layanan-konsul').val();

        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/simpan_konsul") ?>',
            data: $('#form-konsul').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('#modal-konsul').modal('hide');
                if (klinik_asal === 'Laboratorium') {

                    getListDataHasilLaboratorium($('#page-now').val());

                } else {

                    getListPemeriksaan($('#page_now').val());

                }

                messageCustom('Berhasil konsul ke klinik lain', 'Success');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageCustom('Gagal konsul ke klinik lain', 'Error');
            }
        });
    }
</script>