<!-- // UPRJPN -->
<script>
    var nomer = 1;
    $(function() {
        nomer++;
 
        function showUpayaPencegahanRisikoJatuhPadaNeonatus(num) {
            let html = bukaLebar('FORM UPAYA PENCEGAHAN NEONATUS 𖣫', num);
            html += /* html */ `
                <div class="from-group">
                    <label for="uprjpn-tanggal-pengkajian">Tanggal Tindakan Pencegahan : </label>
                    <input type="text" name="uprjpn_tanggal_pengkajian" id="uprjpn-tanggal-pengkajian" class="custom-form clear-input d-inline-block col-lg-3 ml-2" placeholder="dd/mm/yyyy">
                </div>
                <hr>
                <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-uprjpn">
                    <thead>
                        <tr>
                            <th class="center" rowspan="2"><b>Tindakan Pencegahan</b></th>
                            <th class="center" colspan="2">Pagi</th>
                            <th class="center" colspan="2">Siang</th>
                            <th class="center" colspan="3">Malam</th>
                        </tr>
                        <tr>
                            <th class="center">Hand Over</th>
                            <th class="center">Jam 10</th>
                            <th class="center">Hand Over</th>
                            <th class="center">Jam 18</th>
                            <th class="center">Hand Over</th>
                            <th class="center">Jam 23</th>
                            <th class="center">Jam 4</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="8" class="bold text-uppercase"></td>
                        </tr>
                        <tr>
                            <td>Posisi tanda Risiko  jatuh tetap ada/terpasang</td> 
                            <td class="center"><input type="checkbox" name="terpasang_p_ho" id="terpasang-p-ho"></td>
                            <td class="center"><input type="checkbox" name="terpasang_p_10" id="terpasang-p-10"></td>
                            <td class="center"><input type="checkbox" name="terpasang_s_ho" id="terpasang-s-ho"></td>
                            <td class="center"><input type="checkbox" name="terpasang_s_18" id="terpasang-s-18"></td>
                            <td class="center"><input type="checkbox" name="terpasang_m_ho" id="terpasang-m-ho"></td>
                            <td class="center"><input type="checkbox" name="terpasang_m_23" id="terpasang-m-23"></td>
                            <td class="center"><input type="checkbox" name="terpasang_m_4" id="terpasang-m-4"></td>
                        </tr>
                        <tr>
                            <td>Pastikan roda box/incubator pada posisi terkunci</td>
                            <td class="center"><input type="checkbox" name="terkunci_p_ho" id="terkunci-p-ho"></td>
                            <td class="center"><input type="checkbox" name="terkunci_p_10" id="terkunci-p-10"></td>
                            <td class="center"><input type="checkbox" name="terkunci_s_ho" id="terkunci-s-ho"></td>
                            <td class="center"><input type="checkbox" name="terkunci_s_18" id="terkunci-s-18"></td>
                            <td class="center"><input type="checkbox" name="terkunci_m_ho" id="terkunci-m-ho"></td>
                            <td class="center"><input type="checkbox" name="terkunci_m_23" id="terkunci-m-23"></td>
                            <td class="center"><input type="checkbox" name="terkunci_m_4" id="terkunci-m-4"></td>
                        </tr>
                        <tr>
                            <td>Pastikan pintu inkubator tertutup bila tidak ada tindakan</td>
                            <td class="center"><input type="checkbox" name="tindakan_p_ho" id="tindakan-p-ho"></td>
                            <td class="center"><input type="checkbox" name="tindakan_p_10" id="tindakan-p-10"></td>
                            <td class="center"><input type="checkbox" name="tindakan_s_ho" id="tindakan-s-ho"></td>
                            <td class="center"><input type="checkbox" name="tindakan_s_18" id="tindakan-s-18"></td>
                            <td class="center"><input type="checkbox" name="tindakan_m_ho" id="tindakan-m-ho"></td>
                            <td class="center"><input type="checkbox" name="tindakan_m_23" id="tindakan-m-23"></td>
                            <td class="center"><input type="checkbox" name="tindakan_m_4" id="tindakan-m-4"></td>
                        </tr>
                    
                        <tr>
                            <td class="bold">Paraf</td>
                            <td class="center"><input type="checkbox" name="paraff_p_ho" id="paraff-p-ho"></td>
                            <td class="center"><input type="checkbox" name="paraff_p_10" id="paraff-p-10"></td>
                            <td class="center"><input type="checkbox" name="paraff_s_ho" id="paraff-s-ho"></td>
                            <td class="center"><input type="checkbox" name="paraff_s_18" id="paraff-s-18"></td>
                            <td class="center"><input type="checkbox" name="paraff_m_ho" id="paraff-m-ho"></td>
                            <td class="center"><input type="checkbox" name="paraff_m_23" id="paraff-m-23"></td>
                            <td class="center"><input type="checkbox" name="paraff_m_4" id="paraff-m-4"></td>
                        </tr>
                        <tr>
                            <td class="bold">Perawat</td>
                            <td colspan="2">
                                <div class="input-group">
                                    <input type="text" name="perawat_1" id= "perawat-1" class="select2c-input ml-2">  
                                </div>
                            </td>
                            <td colspan="2">
                                <div class="input-group">
                                    <input type="text" name="perawat_2" id= "perawat-2" class="select2c-input ml-2">
                                </div>
                            </td>
                            <td colspan="3">
                                <div class="input-group">
                                    <input type="text" name="perawat_3" id= "perawat-3" class="select2c-input ml-2">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="8" style="text-align: middle;">
                                <p style="font-weight: bold; color: black;"> 🤥⇛ HARAP DI PERHATIKAN* <span style="font-weight: bold; color: red;"> ⇛ SEBELUM *KONFIRMASI* ⇛ KLIK ⇛ 🫠TAMBAH UPAYA PENCEGAHAN ⇛TERLEBIH DAHULU..!!!</span></p>
                            </td>
                        </tr> 
                        <tr>
                            <td colspan="8">
                                <button type="button" title="Tambah Upaya Pencegahan" class="btn btn-info" onclick="tambahUpayaPencegahanNeonatus()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Upaya Pencegahan</button>
                            </td>
                        </tr>
                    </tbody>
                </table>`;
            html += tutupRapet();
            $('#buka-tutup-uprjpn').append(html);
        }

        $('#data-upaya-pencegahan-risiko-jatuh-pada-neonatus').one('click', function() {
        $('#perawat-1, #perawat-2, #perawat-3, #perawat-edit-1, #perawat-edit-2, #perawat-edit-3')
            .select2c({
                ajax: {
                    url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                    dataType: 'json',
                    quietMillis: 100,
                    data: function(term,
                        page) { // page is the one-based page number tracked by Select2
                        return {
                            q: term, //search term
                            page: page, // page number
                            jenis: $('#c_profesi').val(),
                        };
                    },
                    results: function(data, page) {
                        var more = (page * 20) < data
                            .total; // whether or not there are more results available

                        // notice we return the value of more so Select2 knows if more results can be loaded
                        return {
                            results: data.data,
                            more: more
                        };
                    }
                },
                formatResult: function(data) {
                    var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
                    return markup;
                },
                formatSelection: function(data) {
                    return data.nama;
                }
            });
        })

        $('#data-upaya-pencegahan-risiko-jatuh-pada-neonatus').one('click', function() {
            $('#uprjpn-perawat, #uprjpn-edit-perawat').select2c({
                ajax: {
                    url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                    dataType: 'json',
                    quietMillis: 100,
                    data: function(term,
                        page) { // page is the one-based page number tracked by Select2
                        return {
                            q: term, //search term
                            page: page, // page number
                            jenis: $('#c_profesi').val(),
                        };
                    },
                    results: function(data, page) {
                        var more = (page * 20) < data
                            .total; // whether or not there are more results available

                        // notice we return the value of more so Select2 knows if more results can be loaded
                        return {
                            results: data.data,
                            more: more
                        };
                    }
                },
                formatResult: function(data) {
                    var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
                    return markup;
                },
                formatSelection: function(data) {
                    return data.nama;
                }
            });
        })

        showUpayaPencegahanRisikoJatuhPadaNeonatus(nomer); 

    })

    function timerzmysql(waktu) {
        var tm = waktu.split(':');
        return tm[0] + ':' + tm[1];
    }

    function bukaLebar(title, num) {
        let html = /* html */ `
            <div class="accordion">
                <div class="card">
                    <div class="card-header" id="heading-${num}">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse-${num}" aria-expanded="false" aria-controls="collapse-${num}">
                                ${title}
                            </button>
                        </h2>
                    </div>
                    <div id="collapse-${num}" class="collapse" aria-labelledby="heading-${num}">
                        <div class="card-body">       
        `;

        return html;
    }

    function tutupRapet(title, num) {
        let html = /* html */ `
                        </div>
                    </div>
                </div>
            </div>
        `;

        return html;
    }

    function removeList(el) {
        var parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
    }

    function removeListTable(el) {
        var parent = el.parentNode.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
    }

    function lihatFORM_KEP_114_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';
        entriKeperawatanResikoJatuhPadaNeonatus(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function editFORM_KEP_114_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';
        entriKeperawatanResikoJatuhPadaNeonatus(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function tambahFORM_KEP_114_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';
        entriKeperawatanResikoJatuhPadaNeonatus(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function entriKeperawatanResikoJatuhPadaNeonatus(id_pendaftaran, id_layanan_pendaftaran, bed, action) {
        $('#btn-simpan').hide();
        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        var profesi = '<?= $this->session->userdata('profesinadis') ?>';
        if (groupAccount == 'Admin') {
            profesi = 'Perawat';
        }

        if (action !== 'lihat' ) {
            $('#btn-simpan').show();
        } else {
            $('#btn-simpan').hide();
        }

        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_data_entri_resiko_jatuh_pada_neonatus") ?>/id/' + id_pendaftaran +
                '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {

                $('#uprjpn-tanggal-pengkajian, #uprjpn-edit-tanggal-pengkajian')
                .datetimepicker({
                    format: 'DD/MM/YYYY',
                    maxDate: new Date(),
                    beforeShow: function(i) {
                        if ($(i).attr('readonly')) {
                            return false;
                        }
                    }
                });

                resetFormEntriUprjpn();
                $('#ek_id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#ek-id-pendaftaran').val(id_pendaftaran);
                $('#ek-id-bed').val(bed);

                if (data.pasien !== null) {
                    $('#ek_id_pasien').val(data.pasien.id_pasien);
                    $('#ek_pasien_nama').text(data.pasien.nama);
                    $('#ek_pasien_no_rm').text(data.pasien.no_rm);
                    $('#ek_pasien_tanggal_lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data
                        .pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) +
                        ')'));
                    $('#ek_pasien_jenis_kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' :
                        'Perempuan'));

                    if (data.pasien.alergi !== null) {
                        $('#ek_riwayat_alergi').val(data.pasien.alergi).attr('readonly', true)
                    };
                    $('#ek_pasien_alamat').text(data.pasien.alamat);
                }

                if (typeof data.upaya_pencegahan_risiko_jatuh_pada_neonatus !== 'undefined' || data.upaya_pencegahan_risiko_jatuh_pada_neonatus !== null) {
                    showUpayaPencegahanRisikoJatuhPadaNeonatus(data.upaya_pencegahan_risiko_jatuh_pada_neonatus, id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    $('#tabel-uprjpn .body-table').empty();

                }

                $('#ek_bed').text(bed);
                $('.ek-logo-pasien-alergi').hide();
                if (data.profil !== null) {
                    // status profil pasien
                    if (data.profil.is_alergi == 'Ya') {
                        $('.ek-logo-pasien-alergi').show();
                    }
                }
                $('#modal_resiko_jatuh_pada_neonatus').modal('show');
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                accessFailed(e.status);
            },
        });
    }

    function resetFormEntriUprjpn() {
        $('#form_entri_keperawatan')[0].reset();
        $('#s2id_perawat-1 a .select2c-chosen').empty();
        $('#s2id_perawat-2 a .select2c-chosen').empty();
        $('#s2id_perawat-3 a .select2c-chosen').empty();
        $('#uprjpn-tanggal-pengkajian').val('');
        $('#perawat-1').val('');
        $('#perawat-2').val('');
        $('#perawat-3').val('');
        setTimeout(() => {
            $('#form-uprjpn').find('input').each(function() {
                if ($(this).is(':checked')) {
                    $(this).prop('checked', false);
                }
            })
        }, 100)
    }

    function konfirmasiSimpanEntriResikoJatuhPadaNeonatus() {
        swal.fire({
            title: 'Simpan Entri Keperawatan',
            text: "Apakah anda yakin akan Data?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
            cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                simpanEntriResikoJatuhPadaNeonatus();
            }
        })     
    }

    function simpanEntriResikoJatuhPadaNeonatus() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/simpan_resiko_jatuh_pada_neonatus") ?>',
            data: $('#form_entri_keperawatan').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                if (data.respon !== null) {

                    if (data.respon.show !== null) {

                        if (data.respon.add_show !== undefined) {

                            if (data.respon.id !== undefined) {
                                $(data.respon.id).addClass('show');
                            }

                        } else {

                            if (data.respon.id !== undefined) {
                                $(data.respon.id).addClass('show');
                            }

                        }

                        if (data.respon.status === false) {

                            bootbox.dialog({
                                message: data.respon.message,
                                title: "Penyimpanan Data Gagal",
                                buttons: {
                                    batal: {
                                        label: '<i class=" fas fa-times-circle"></i> Close',
                                        className: "btn-danger",
                                        callback: function() {

                                        }
                                    }

                                }
                            });

                        }

                    }

                } else {

                    $('input[name=csrf_syam]').val(data.token);
                    if (data.status) {
                        messageAddSuccess();
                        $('#modal_resiko_jatuh_pada_neonatus').modal('hide');
                        showListForm($('#ek-id-pendaftaran').val(), $('#ek_id_layanan_pendaftaran').val(), $('#ek_id_pasien').val());
                    } else {
                        messageAddFailed();
                    }
                }

            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageAddFailed();
            }
        });
    } 

    function editUpayaPencegahanRisikoJatuhPadaNeonatus(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed) {
        const modal = $('#modal-edit-upaya-pencegahan-risiko-jatuh-pada-neonatus');
        $('#update-uprjpn').children().remove();
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_upaya_pencegahan_risiko_jatuh_pada_neonatus") ?>/id/' +
                id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {

                $('#update-uprjpn').empty();
                $('#id-upaya-pencegahan-risiko-jatuh-pada-neonatus').val(id);

                function formatTanggalKhusus(waktu) {
                    var el = waktu.split('-');
                    var tahun = el[0];
                    var bulan = el[1];
                    var hari = el[2];
                    return hari + '/' + bulan + '/' + tahun;
                }
                let edit_tanggal_pengkajian = formatTanggalKhusus(data.tanggal_pengkajian);
                $('#uprjpn-edit-tanggal-pengkajian').val(edit_tanggal_pengkajian);
                let cttntndkn = '';
                cttntndkn =
                    `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-upaya-pencegahan-risiko-jatuh-pada-neonatus').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
							<button type="button" class="btn btn-info waves-effect" onclick="updateUpayaPencegahanRisikoJatuhPadaNeonatus(${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')"><i class="fas fa-save mr-1"></i>Update</button>`;
                $('#update-uprjpn').append(cttntndkn);

                // Posisi tanda Risiko  jatuh tetap ada/terpasang
                data.terpasang_p_ho == '1' ? $('#terpasang-edit-p-ho').prop('checked', true) : $('#terpasang-edit-p-ho').prop('checked', false);
                data.terpasang_p_10 == '1' ? $('#terpasang-edit-p-10').prop('checked', true) : $('#terpasang-edit-p-10').prop('checked', false);
                data.terpasang_s_ho == '1' ? $('#terpasang-edit-s-ho').prop('checked', true) : $('#terpasang-edit-s-ho').prop('checked', false);
                data.terpasang_s_18 == '1' ? $('#terpasang-edit-s-18').prop('checked', true) : $('#terpasang-edit-s-18').prop('checked', false);
                data.terpasang_m_ho == '1' ? $('#terpasang-edit-m-ho').prop('checked', true) : $('#terpasang-edit-m-ho').prop('checked', false);
                data.terpasang_m_23 == '1' ? $('#terpasang-edit-m-23').prop('checked', true) : $('#terpasang-edit-m-23').prop('checked', false);
                data.terpasang_m_4 == '1' ? $('#terpasang-edit-m-4').prop('checked', true)   : $('#terpasang-edit-m-4').prop('checked', false);

                // Pastikan roda box/incubator pada posisi terkunci
                data.terkunci_p_ho == '1' ? $('#terkunci-edit-p-ho').prop('checked', true) : $('#terkunci-edit-p-ho').prop('checked', false);
                data.terkunci_p_10 == '1' ? $('#terkunci-edit-p-10').prop('checked', true) : $('#terkunci-edit-p-10').prop('checked', false);
                data.terkunci_s_ho == '1' ? $('#terkunci-edit-s-ho').prop('checked', true) : $('#terkunci-edit-s-ho').prop('checked', false);
                data.terkunci_s_18 == '1' ? $('#terkunci-edit-s-18').prop('checked', true) : $('#terkunci-edit-s-18').prop('checked', false);
                data.terkunci_m_ho == '1' ? $('#terkunci-edit-m-ho').prop('checked', true) : $('#terkunci-edit-m-ho').prop('checked', false);
                data.terkunci_m_23 == '1' ? $('#terkunci-edit-m-23').prop('checked', true) : $('#terkunci-edit-m-23').prop('checked', false);
                data.terkunci_m_4 == '1' ? $('#terkunci-edit-m-4').prop('checked', true)   : $('#terkunci-edit-m-4').prop('checked', false);

                // Pastikan pintu inkubator tertutup bila tidak ada tindakan
                data.tindakan_p_ho == '1' ? $('#tindakan-edit-p-ho').prop('checked', true) : $('#tindakan-edit-p-ho').prop('checked', false);
                data.tindakan_p_10 == '1' ? $('#tindakan-edit-p-10').prop('checked', true) : $('#tindakan-edit-p-10').prop('checked', false);
                data.tindakan_s_ho == '1' ? $('#tindakan-edit-s-ho').prop('checked', true) : $('#tindakan-edit-s-ho').prop('checked', false);
                data.tindakan_s_18 == '1' ? $('#tindakan-edit-s-18').prop('checked', true) : $('#tindakan-edit-s-18').prop('checked', false);
                data.tindakan_m_ho == '1' ? $('#tindakan-edit-m-ho').prop('checked', true) : $('#tindakan-edit-m-ho').prop('checked', false);
                data.tindakan_m_23 == '1' ? $('#tindakan-edit-m-23').prop('checked', true) : $('#tindakan-edit-m-23').prop('checked', false);
                data.tindakan_m_4 == '1' ? $('#tindakan-edit-m-4').prop('checked', true)   : $('#tindakan-edit-m-4').prop('checked', false);

                // Paraf
                data.paraff_p_ho == '1' ? $('#paraff-edit-p-ho').prop('checked', true) : $('#paraff-edit-p-ho').prop('checked', false);
                data.paraff_p_10 == '1' ? $('#paraff-edit-p-10').prop('checked', true) : $('#paraff-edit-p-10').prop('checked', false);
                data.paraff_s_ho == '1' ? $('#paraff-edit-s-ho').prop('checked', true) : $('#paraff-edit-s-ho').prop('checked', false);
                data.paraff_s_18 == '1' ? $('#paraff-edit-s-18').prop('checked', true) : $('#paraff-edit-s-18').prop('checked', false);
                data.paraff_m_ho == '1' ? $('#paraff-edit-m-ho').prop('checked', true) : $('#paraff-edit-m-ho').prop('checked', false);
                data.paraff_m_23 == '1' ? $('#paraff-edit-m-23').prop('checked', true) : $('#paraff-edit-m-23').prop('checked', false);
                data.paraff_m_4 == '1' ? $('#paraff-edit-m-4').prop('checked', true)   : $('#paraff-edit-m-4').prop('checked', false);

                $('#perawat-edit-1').val(data.id_perawat_1);
                $('#s2id_perawat-edit-1 a .select2c-chosen').html(data.perawat_1);

                $('#perawat-edit-2').val(data.id_perawat_2);
                $('#s2id_perawat-edit-2 a .select2c-chosen').html(data.perawat_2);

                $('#perawat-edit-3').val(data.id_perawat_3);
                $('#s2id_perawat-edit-3 a .select2c-chosen').html(data.perawat_3);

                modal.modal('show');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }
 
    function showUpayaPencegahanRisikoJatuhPadaNeonatus(data, id_pendaftaran, id_layanan_pendaftaran, bed) {
        $('#tabel-uprjpn .body-table').empty();
        if (data !== null) {
            $.each(data, function(i, v) {
                const selOp =
                    '<td align="center"><button type="button" class="btn btn-success btn-xs" onclick="editUpayaPencegahanRisikoJatuhPadaNeonatus(this, ' +
                    v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                    '\')"><i class="fas fa-edit"></i> </button> <button type="button" class="btn btn-danger btn-xs" onclick="hapusUpayaPencegahanResikoJatuhPadaNeonatus(this, ' +
                    v.id + ')"> <i class="fas fa-trash-alt"></i> </button> </td>';

                let html = /* html */ `
                    <tr>
                        <td class="number-terapi" align="center">${(++i)}</td>
                        <td class="center">${v.tanggal_pengkajian ? datefmysql(v.tanggal_pengkajian) : '-'}</td>
                        <td align="center">${v.perawat_1 || '-' }</td>
                        <td align="center">${v.perawat_2 || '-'}</td>
                        <td align="center">${v.perawat_3 || '-'}</td>
                        <td align="center">${v.akun_user}</td>
                        ${selOp}
						<td align="center"><button type="button" class="btn btn-info btn-xxs" data-toggle="collapse" data-target="#data-collapse-${i}" aria-expanded="false" aria-controls="data-collapse-${i}"><i class="fas fa-expand"></i> Expand</button></td>
                    </tr>
					<tr class="collapse" id="data-collapse-${i}">
						<td colspan="8">
							<table class="table table-sm table-striped table-bordered" style="margin-top: .5rem">
								<thead>
								<tr>
									<th class="center" rowspan="2"><b>Tindakan Pencegahan</b></th>
									<th class="center" colspan="2">Pagi</th>
									<th class="center" colspan="2">Siang</th>
									<th class="center" colspan="3">Malam</th>
								</tr>
								<tr>
									<th class="center">Hand Over</th>
									<th class="center">Jam 10</th>
									<th class="center">Hand Over</th>
									<th class="center">Jam 18</th>
									<th class="center">Hand Over</th>
									<th class="center">Jam 23</th>
									<th class="center">Jam 4</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td colspan="8" class="bold text-uppercase"></td>
								</tr>
								<tr>
									<td>Posisi tanda Risiko  jatuh tetap ada/terpasang</td>
									<td class="center">${v.terpasang_p_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.terpasang_p_10 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.terpasang_s_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.terpasang_s_18 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.terpasang_m_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.terpasang_m_23 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.terpasang_m_4 == '1' ? '&check;' : ''}</td>
								</tr>
								<tr>
									<td>Pastikan roda box/incubator pada posisi terkunci</td>
									<td class="center">${v.terkunci_p_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.terkunci_p_10 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.terkunci_s_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.terkunci_s_18 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.terkunci_m_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.terkunci_m_23 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.terkunci_m_4 == '1' ? '&check;' : ''}</td>
								</tr>
								<tr>
									<td>Pastikan pintu inkubator tertutup bila tidak ada tindakan</td>
									<td class="center">${v.tindakan_p_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.tindakan_p_10 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.tindakan_s_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.tindakan_s_18 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.tindakan_m_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.tindakan_m_23 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.tindakan_m_4 == '1' ? '&check;' : ''}</td>
								</tr>
					
								<tr>
									<td class="bold">Paraf</td>
									<td class="center">${v.paraff_p_ho == '1' ? '&check;' : '&#10006;'}</td>
									<td class="center">${v.paraff_p_10 == '1' ? '&check;' : '&#10006;'}</td>
									<td class="center">${v.paraff_s_ho == '1' ? '&check;' : '&#10006;'}</td>
									<td class="center">${v.paraff_s_18 == '1' ? '&check;' : '&#10006;'}</td>
									<td class="center">${v.paraff_m_ho == '1' ? '&check;' : '&#10006;'}</td>
									<td class="center">${v.paraff_m_23 == '1' ? '&check;' : '&#10006;'}</td>
									<td class="center">${v.paraff_m_4 == '1' ? '&check;' : '&#10006;'}</td>
								</tr>
								</tbody>
							</table>
						</td>
					</tr>
                `;
                $('#tabel-uprjpn .body-table').append(html);
                numberUprjpn = i;
            })
        }
    }

    function updateUpayaPencegahanRisikoJatuhPadaNeonatus(id_pendaftaran, id_layanan_pendaftaran, bed) {
        $.ajax({
            type: 'PUT',
            url: '<?= base_url("pelayanan/api/pelayanan/update_upaya_pencegahan_risiko_jatuh_pada_neonatus") ?>',
            data: $('#form-edit-upaya-pencegahan-risiko-jatuh-pada-neonatus').serialize(),
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data.status) {
                    messageEditSuccess();
                    entriKeperawatanResikoJatuhPadaNeonatus(id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    messageEditFailed();
                }
                $('#modal-edit-upaya-pencegahan-risiko-jatuh-pada-neonatus').modal('hide');
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    if (typeof numberUprjp === 'undefined') {
        var numberUprjpn = 1;
    }

    function tambahUpayaPencegahanNeonatus() {
        if ($('#uprjpn-tanggal-pengkajian').val() === '') {
            syams_validation('#uprjpn-tanggal-pengkajian', 'Tanggal Pengkajian harus diisi.');
            return false;
        } else {
            syams_validation_remove('#uprjpn-tanggal-pengkajian');
        }

        if ($('#uprjpn-perawat').val() === '') {
            syams_validation('#uprjpn-perawat', 'Nama perawat belum diisi.');
            return false;
        } else {
            syams_validation_remove('#uprjpn-perawat');
        }

        let html = '';
        let uprjpn_tanggal_pengkajian = $('#uprjpn-tanggal-pengkajian').val();
        let nama_perawat_1 = $('#s2id_perawat-1 a .select2c-chosen').html();
        let nama_perawat_2 = $('#s2id_perawat-2 a .select2c-chosen').html();
        let nama_perawat_3 = $('#s2id_perawat-3 a .select2c-chosen').html();
        let id_perawat_1 = $('#perawat-1').val();
        let id_perawat_2 = $('#perawat-2').val();
        let id_perawat_3 = $('#perawat-3').val();

        // Posisi tanda Risiko  jatuh tetap ada/terpasang
        let terpasang_p_ho = $('#terpasang-p-ho').is(':checked');
        let terpasang_p_10 = $('#terpasang-p-10').is(':checked');
        let terpasang_s_ho = $('#terpasang-s-ho').is(':checked');
        let terpasang_s_18 = $('#terpasang-s-18').is(':checked');
        let terpasang_m_ho = $('#terpasang-m-ho').is(':checked');
        let terpasang_m_23 = $('#terpasang-m-23').is(':checked');
        let terpasang_m_4 = $('#terpasang-m-4').is(':checked');

        // Pastikan roda box/incubator pada posisi terkunci
        let terkunci_p_ho = $('#terkunci-p-ho').is(':checked');
        let terkunci_p_10 = $('#terkunci-p-10').is(':checked');
        let terkunci_s_ho = $('#terkunci-s-ho').is(':checked');
        let terkunci_s_18 = $('#terkunci-s-18').is(':checked');
        let terkunci_m_ho = $('#terkunci-m-ho').is(':checked');
        let terkunci_m_23 = $('#terkunci-m-23').is(':checked');
        let terkunci_m_4 = $('#terkunci-m-4').is(':checked');

        // Pastikan pintu inkubator tertutup bila tidak ada tindakan
        let tindakan_p_ho = $('#tindakan-p-ho').is(':checked');
        let tindakan_p_10 = $('#tindakan-p-10').is(':checked');
        let tindakan_s_ho = $('#tindakan-s-ho').is(':checked');
        let tindakan_s_18 = $('#tindakan-s-18').is(':checked');
        let tindakan_m_ho = $('#tindakan-m-ho').is(':checked');
        let tindakan_m_23 = $('#tindakan-m-23').is(':checked');
        let tindakan_m_4 = $('#tindakan-m-4').is(':checked');

        // Paraf
        let paraff_p_ho = $('#paraff-p-ho').is(':checked');
        let paraff_p_10 = $('#paraff-p-10').is(':checked');
        let paraff_s_ho = $('#paraff-s-ho').is(':checked');
        let paraff_s_18 = $('#paraff-s-18').is(':checked');
        let paraff_m_ho = $('#paraff-m-ho').is(':checked');
        let paraff_m_23 = $('#paraff-m-23').is(':checked');
        let paraff_m_4 = $('#paraff-m-4').is(':checked');

        html = /* html */ `
            <tr class="row-in-${++numberUprjpn}">
                <td class="number-pengkajian" align="center">${numberUprjpn}</td>
                <td align="center">
                	<input type="hidden" name="uprjpn_tanggal_pengkajian[]" value="${uprjpn_tanggal_pengkajian}">${uprjpn_tanggal_pengkajian}
                </td>
                <td align="center">
                	<input type="hidden" name="perawat_1[]" value="${id_perawat_1}">${nama_perawat_1}
                </td>
                <td align="center">
                	<input type="hidden" name="perawat_2[]" value="${id_perawat_2}">${nama_perawat_2}
                </td>
                <td align="center">
                	<input type="hidden" name="perawat_3[]" value="${id_perawat_3}">${nama_perawat_3}
                </td>
                <td align="center">
					<?= $this->session->userdata('nama') ?>
					<input type="hidden" name="user_pengkajian[]" value="<?= $this->session->userdata("id_translucent") ?>">
					<input type="hidden" name="pencegahan_date_neonatus[]" value="<?= date("Y-m-d H:i:s") ?>">

					<input type="hidden" name="terpasang_p_ho[]" value="${terpasang_p_ho ? 1 : 0}">
					<input type="hidden" name="terpasang_p_10[]" value="${terpasang_p_10 ? 1 : 0}">
					<input type="hidden" name="terpasang_s_ho[]" value="${terpasang_s_ho ? 1 : 0}">
					<input type="hidden" name="terpasang_s_18[]" value="${terpasang_s_18 ? 1 : 0}">
					<input type="hidden" name="terpasang_m_ho[]" value="${terpasang_m_ho ? 1 : 0}">
					<input type="hidden" name="terpasang_m_23[]" value="${terpasang_m_23 ? 1 : 0}">
					<input type="hidden" name="terpasang_m_4[]" value="${terpasang_m_4 ? 1 : 0}">

					<input type="hidden" name="terkunci_p_ho[]" value="${terkunci_p_ho ? 1 : 0}">
					<input type="hidden" name="terkunci_p_10[]" value="${terkunci_p_10 ? 1 : 0}">
					<input type="hidden" name="terkunci_s_ho[]" value="${terkunci_s_ho ? 1 : 0}">
					<input type="hidden" name="terkunci_s_18[]" value="${terkunci_s_18 ? 1 : 0}">
					<input type="hidden" name="terkunci_m_ho[]" value="${terkunci_m_ho ? 1 : 0}">
					<input type="hidden" name="terkunci_m_23[]" value="${terkunci_m_23 ? 1 : 0}">
					<input type="hidden" name="terkunci_m_4[]" value="${terkunci_m_4 ? 1 : 0}">

					<input type="hidden" name="tindakan_p_ho[]" value="${tindakan_p_ho ? 1 : 0}">
					<input type="hidden" name="tindakan_p_10[]" value="${tindakan_p_10 ? 1 : 0}">
					<input type="hidden" name="tindakan_s_ho[]" value="${tindakan_s_ho ? 1 : 0}">
					<input type="hidden" name="tindakan_s_18[]" value="${tindakan_s_18 ? 1 : 0}">
					<input type="hidden" name="tindakan_m_ho[]" value="${tindakan_m_ho ? 1 : 0}">
					<input type="hidden" name="tindakan_m_23[]" value="${tindakan_m_23 ? 1 : 0}">
					<input type="hidden" name="tindakan_m_4[]" value="${tindakan_m_4 ? 1 : 0}">

					<input type="hidden" name="paraff_p_ho[]" value="${paraff_p_ho ? 1 : 0}">
					<input type="hidden" name="paraff_p_10[]" value="${paraff_p_10 ? 1 : 0}">
					<input type="hidden" name="paraff_s_ho[]" value="${paraff_s_ho ? 1 : 0}">
					<input type="hidden" name="paraff_s_18[]" value="${paraff_s_18 ? 1 : 0}">
					<input type="hidden" name="paraff_m_ho[]" value="${paraff_m_ho ? 1 : 0}">
					<input type="hidden" name="paraff_m_23[]" value="${paraff_m_23 ? 1 : 0}">
					<input type="hidden" name="paraff_m_4[]" value="${paraff_m_4 ? 1 : 0}">
                </td>
                <td align="center">
                    <button type="button" id="pepel" class="btn btn-secondary btn-xxs" onclick="(() => {$(this).parent().parent().parent().find('.row-in-' + numberUprjpn).remove(); numberUprjpn--;})()"><i class="fas fa-trash-alt"></i></button>
                </td>
                <td align="center"><button type="button" class="btn btn-info btn-xxs" data-toggle="collapse" data-target="#data-collapse-${numberUprjpn}" aria-expanded="false" aria-controls="data-collapse-${numberUprjpn}"><i class="fas fa-expand"></i> Expand</button></td>
            </tr>
            <tr class="collapse row-in-${numberUprjpn}" id="data-collapse-${numberUprjpn}">
            	<td colspan="8">
            		<table class="table table-sm table-striped table-bordered" style="margin-top: .5rem">
						<thead>
						<tr>
							<th class="center" rowspan="2"><b>Tindakan Pencegahan</b></th>
							<th class="center" colspan="2">Pagi</th>
							<th class="center" colspan="2">Siang</th>
							<th class="center" colspan="3">Malam</th>
						</tr>
						<tr>
							<th class="center">Hand Over</th>
							<th class="center">Jam 10</th>
							<th class="center">Hand Over</th>
							<th class="center">Jam 18</th>
							<th class="center">Hand Over</th>
							<th class="center">Jam 23</th>
							<th class="center">Jam 4</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td colspan="8" class="bold text-uppercase"></td>
						</tr>
						<tr>
							<td>Posisi tanda Risiko  jatuh tetap ada/terpasang</td>
							<td class="center">${terpasang_p_ho ? '&check;' : ''}</td>
							<td class="center">${terpasang_p_10 ? '&check;' : ''}</td>
							<td class="center">${terpasang_s_ho ? '&check;' : ''}</td>
							<td class="center">${terpasang_s_18 ? '&check;' : ''}</td>
							<td class="center">${terpasang_m_ho ? '&check;' : ''}</td>
							<td class="center">${terpasang_m_23 ? '&check;' : ''}</td>
							<td class="center">${terpasang_m_4 ? '&check;' : ''}</td>
						</tr>
						<tr>
							<td>Pastikan roda box/incubator pada posisi terkunci</td>
							<td class="center">${terkunci_p_ho ? '&check;' : ''}</td>
							<td class="center">${terkunci_p_10 ? '&check;' : ''}</td>
							<td class="center">${terkunci_s_ho ? '&check;' : ''}</td>
							<td class="center">${terkunci_s_18 ? '&check;' : ''}</td>
							<td class="center">${terkunci_m_ho ? '&check;' : ''}</td>
							<td class="center">${terkunci_m_23 ? '&check;' : ''}</td>
							<td class="center">${terkunci_m_4 ? '&check;' : ''}</td>
						</tr>
						<tr>
							<td>Pastikan pintu inkubator tertutup bila tidak ada tindakan</td>
							<td class="center">${tindakan_p_ho ? '&check;' : ''}</td>
							<td class="center">${tindakan_p_10 ? '&check;' : ''}</td>
							<td class="center">${tindakan_s_ho ? '&check;' : ''}</td>
							<td class="center">${tindakan_s_18 ? '&check;' : ''}</td>
							<td class="center">${tindakan_m_ho ? '&check;' : ''}</td>
							<td class="center">${tindakan_m_23 ? '&check;' : ''}</td>
							<td class="center">${tindakan_m_4 ? '&check;' : ''}</td>
						</tr>

						<tr>
							<td class="bold">Paraf</td>
							<td class="center">${paraff_p_ho ? '&check;' : '&#10006;'}</td>
							<td class="center">${paraff_p_10 ? '&check;' : '&#10006;'}</td>
							<td class="center">${paraff_s_ho ? '&check;' : '&#10006;'}</td>
							<td class="center">${paraff_s_18 ? '&check;' : '&#10006;'}</td>
							<td class="center">${paraff_m_ho ? '&check;' : '&#10006;'}</td>
							<td class="center">${paraff_m_23 ? '&check;' : '&#10006;'}</td>
							<td class="center">${paraff_m_4 ? '&check;' : '&#10006;'}</td>
						</tr>
						</tbody>
					</table>
            	</td>
            </tr>
        `;
        $('#tabel-uprjpn .body-table').append(html);
    }

    function hapusUpayaPencegahanResikoJatuhPadaNeonatus(obj, id) {
        bootbox.dialog({
            message: "Anda yakin akan menghapus data ini?",
            title: "Hapus Data",
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                hapus: {
                    label: '<i class="fas fa-trash-alt mr-1"></i>Hapus',
                    className: "btn-info",
                    callback: function() {
                        $.ajax({
                            type: 'DELETE',
                            url: '<?= base_url("pelayanan/api/pelayanan/hapus_upaya_pencegahan_risiko_jatuh_pada_neonatus") ?>/' +
                                id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    removeList(obj);
                                } else {
                                    customAlert('Hapus Pengkajian Uang Resiko Jatuh Pada Neonatus', data
                                        .message);
                                }
                            },
                            error: function(e) {
                                messageDeleteFailed();
                            }
                        });
                    }
                }
            }
        });
    }

</script>