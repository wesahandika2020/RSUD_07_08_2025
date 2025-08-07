<!-- // LEMBAR OBSERVASI -->
<script>
    var num = 1;
    num++;

    var numberTable = 0;

    $(function() {
        
        $('#data_lo, #edit_data_lo').on('click', function() {
            $('#lo_tgl, #edit_lo_tgl').datetimepicker({
                format: 'DD/MM/YYYY HH:mm',
                maxDate: new Date(),
                beforeShow: function(i) {
                    if ($(i).attr('readonly')) {
                        return false;
                    }
                }
            });
        });
    })

    function timerzmysql(waktu) {
        var tm = waktu.split(':');
        return tm[0] + ':' + tm[1];
    }

    function resetLo() {
        $('#lo_id, #lo_lo_id_layanan_pendaftaran, #lo_id_pendaftaran, #lo_id_user, #lo_id_pasien, #lo_tgl, #lo_td, #lo_n, #lo_r, #lo_s, #lo_sat, #lo_djj, #lo_his, #lo_tfu, #lo_kontraksi, #lo_perdarahan, #lo_urin, #lo_ket').val('');

        $('#tabel_lo .body-table').empty();
        $('#tabel_edit_lo .body-table').empty();
        
        numberTable = 0;
        $('#lo_buka_tutup').empty();
    }

    function resetEditLo() {
        $('#edit_lo_id, #edit_lo_lo_id_layanan_pendaftaran, #edit_lo_id_pendaftaran, #edit_lo_id_user, #edit_lo_id_pasien, #edit_lo_tgl, #edit_lo_td, #edit_lo_n, #edit_lo_r, #edit_lo_s, #edit_lo_sat, #edit_lo_djj, #edit_lo_his, #edit_lo_tfu, #edit_lo_kontraksi, #edit_lo_perdarahan, #edit_lo_urin, #edit_lo_ket').val('');
    }

    function tambahFORM_KEP_73_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';
        resetLo();
        entriLo(layanan.id_pendaftaran, layanan.id, bed, action);

    }

    function lihatFORM_KEP_73_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';
        resetLo();
        entriLo(layanan.id_pendaftaran, layanan.id, bed, action);
        
    }

    function editFORM_KEP_73_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';

        resetLo();
        entriLo(layanan.id_pendaftaran, layanan.id, bed, action);

    }

    function entriLo(id_pendaftaran, id_layanan_pendaftaran, bed, action) {

        $('#btn_simpan_lo').hide();
        $('#action_lo').val(action);

        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        var profesi = '<?= $this->session->userdata('profesinadis') ?>';
        if (groupAccount == 'Admin') {
            profesi = 'Perawat';
        }

        if (action !== 'lihat') {
			$('#btn_simpan_lo').show();
			$('#lo_alat').show();
		} else {
			$('#btn_simpan_lo').hide();
			$('#lo_alat').hide();
            $('#lo_buka_tutup').hide();
		}
        $('#lo_bed').val(bed);

        $.ajax({
			type: 'GET',
            // url: '<!?= base_url("pelayanan/api/pelayanan/get_data_entri_keperawatan") ?>/id/' + id_pendaftaran +'/id_layanan/' + id_layanan_pendaftaran,
            url: '<?= base_url("pelayanan/api/pelayanan/get_data_lembar_observasi") ?>/id/' + id_pendaftaran +'/id_layanan/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {

				// Pasien
				resetLo();
                $('#lo_id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#lo_id_pendaftaran').val(id_pendaftaran);
                if (data.pasien !== null) {
                    $('#lo_id_pasien, #lo_no_rm').val(data.pasien.id_pasien).text(data.pasien.id_pasien);
                    $('#lo_nama_pasien').text(data.pasien.nama);
                    $('#lo_tanggal_lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#lo_jenis_kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                    $('#lo_alamat').text(data.pasien.alamat);
                }

                if (typeof data.lo !== 'undefined' && data.lo !== null && data.lo !== '') {
                    showDataLembarObservasi(data.lo, action);
                    showInputLembarObservasi(num);
                }
                
				$('#modal_lembar_observasi').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});

    }

    // function showInputLembarObservasi(num) {
    //     // let html = bukaLebar('Lembar Observasi', num);
    //     let html = `
    //         <div class="card shadow-md rounded-xl border border-blue-200 p-4 mb-4 transition-all duration-300 hover:shadow-lg">
    //             <div class="flex justify-between items-center mb-2">
    //             <h2 class="text-xl font-semibold text-blue-700">📋 Lembar Observasi</h2>
    //             <span class="text-sm text-gray-500 italic">Klik untuk membuka Form ⇲</span>
    //             </div>
    //             ${bukaLebar('LEMBAR OBSERVASI ⮃', num)}
    //         </div>
    //         `;
    //     html += /* html */ `

    //         <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-pr">
    //             <thead style="background-color:rgba(226, 148, 250, 1);">
    //                 <tr>
    //                     <th width="" class="text-center">Tanggal & jam</th>
    //                     <th width="" class="text-center">TD</th>
    //                     <th width="3%" class="text-center">N</th>
    //                     <th width="3%" class="text-center">R</th>
    //                     <th width="3%" class="text-center">S</th>
    //                     <th width="" class="text-center">SAT</th>
    //                     <th width="" class="text-center">DJJ</th>
    //                     <th width="" class="text-center">HIS</th>
    //                     <th width="" class="text-center">TFU</th>
    //                     <th width="" class="text-center">KONTRAKSI UTERUS</th>
    //                     <th width="" class="text-center">PERDARAHAN</th>
    //                     <th width="" class="text-center">URIN</th>
    //                     <th width="" class="text-center">KET</th>
    //                 </tr>
    //             </thead>
    //             <tbody>
    //                 <tr>
    //                     <td><input type="text" id="lo_tgl" class="custom-form clear-input d-inline-block col-lg-12" placeholder="dd/mm/yyyy hh:ii"></td>
    //                     <td><input type="text" id="lo_td" class="custom-form clear-input d-inline-block col-lg-12"></td>
    //                     <td><input type="text" id="lo_n" class="custom-form clear-input d-inline-block col-lg-12"></td>
    //                     <td><input type="text" id="lo_r" class="custom-form clear-input d-inline-block col-lg-12"></td>
    //                     <td><input type="text" id="lo_s" class="custom-form clear-input d-inline-block col-lg-12"></td>
    //                     <td><input type="text" id="lo_sat" class="custom-form clear-input d-inline-block col-lg-12"></td>
    //                     <td><input type="text" id="lo_djj" class="custom-form clear-input d-inline-block col-lg-12"></td>
    //                     <td><input type="text" id="lo_his" class="custom-form clear-input d-inline-block col-lg-12"></td>
    //                     <td><input type="text" id="lo_tfu" class="custom-form clear-input d-inline-block col-lg-12"></td>
    //                     <td><input type="text" id="lo_kontraksi" class="custom-form clear-input d-inline-block col-lg-12"></td>
    //                     <td><input type="text" id="lo_perdarahan" class="custom-form clear-input d-inline-block col-lg-12"></td>
    //                     <td><input type="text" id="lo_urin" class="custom-form clear-input d-inline-block col-lg-12"></td>
    //                     <td><input type="text" id="lo_ket" class="custom-form clear-input d-inline-block col-lg-12"></td>
    //                 </tr>
    //                 <tr>
    //                     <td colspan="13">
    //                         <button type="button" title="Tambah Data" class="btn btn-info" onclick="tambahLo()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Data</button>
    //                     </td>
    //                 </tr>
    //             </tbody>
    //         </table>
    //     `;
    //     html += tutupRapet();
    //     $('#lo_buka_tutup').append(html);
    // }

    function showInputLembarObservasi(num) {
        // let html = bukaLebar('Lembar Observasi', num);
        let html = `
            <div class="card shadow-md rounded-xl border border-blue-200 p-4 mb-4 transition-all duration-300 hover:shadow-lg">
                <div class="flex justify-between items-center mb-2">
                <h2 class="text-xl font-semibold text-blue-700">📋 Lembar Observasi</h2>
                <span class="text-sm text-gray-500 italic">Klik untuk membuka Form ⇲</span>
                </div>
                ${bukaLebar('LEMBAR OBSERVASI ⮃', num)}
            </div>
            `;
        html += /* html */ `

            <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-pr">
               <thead style="background-color:rgba(178, 236, 108, 1);">
                    <tr>
                        <th width="7%" class="text-center">Tanggal & jam</th>
                        <th width="5%" class="text-center">TD</th>
                        <th width="4%" class="text-center">N</th>
                        <th width="4%" class="text-center">R</th>
                        <th width="4%" class="text-center">S</th>
                        <th width="4%" class="text-center">SAT</th>
                        <th width="7%" class="text-center">DJJ</th>
                        <th width="7%" class="text-center">HIS</th>
                        <th width="4%" class="text-center">TFU</th>
                        <th width="9%" class="text-center">KONTRAKSI UTERUS</th>
                        <th width="7%" class="text-center">PERDARAHAN</th>
                        <th width="4%" class="text-center">URIN</th>
                        <th width="10%" class="text-center">KETERANGAN</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" id="lo_tgl" class="custom-form clear-input d-inline-block col-lg-12" placeholder="dd/mm/yyyy hh:ii"></td>
                        <td><input type="text" id="lo_td" class="custom-form clear-input d-inline-block col-lg-12"></td>
                        <td><input type="text" id="lo_n" class="custom-form clear-input d-inline-block col-lg-12"></td>
                        <td><input type="text" id="lo_r" class="custom-form clear-input d-inline-block col-lg-12"></td>
                        <td><input type="text" id="lo_s" class="custom-form clear-input d-inline-block col-lg-12"></td>
                        <td><input type="text" id="lo_sat" class="custom-form clear-input d-inline-block col-lg-12"></td>
                        <td><textarea id="lo_djj" class="form-control clear-input" rows="2"></textarea></td>
                        <td><textarea id="lo_his" class="form-control clear-input" rows="2"></textarea></td>
                        <td><input type="text" id="lo_tfu" class="custom-form clear-input d-inline-block col-lg-12"></td>
                        <td><textarea id="lo_kontraksi" class="form-control clear-input" rows="2"></textarea></td>
                        <td><textarea id="lo_perdarahan" class="form-control clear-input" rows="2"></textarea></td>
                        <td><input type="text" id="lo_urin" class="custom-form clear-input d-inline-block col-lg-12"></td>
                        <td><textarea id="lo_ket" class="form-control clear-input" rows="2"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="13">
                            <button type="button" title="Tambah Data" class="btn btn-info" onclick="tambahLo()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Data</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        `;
        html += tutupRapet();
        $('#lo_buka_tutup').append(html);
    }

    function showDataLembarObservasi(data, action) {
        if (data !== null) {
            $.each(data, function(i, v) {
                let selOp = '';
                if (action !== 'lihat') {
                    selOp = `
                        <td align="center">
                            <button type="button" class="btn btn-success btn-xs" onclick="editLo(${v.id}, ${v.id_pendaftaran}, ${v.id_layanan_pendaftaran})">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-xs" onclick="hapusLo(${v.id})">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    `;
                }

                let html = `
                    <tr>
                        <td class="number-pemantauan" align="center">${i + 1}</td>
                        <td align="center">${v.lo_tgl ? datetimefmysql(v.lo_tgl) : ''}</td>
                        <td align="center">${v.lo_td ?? ''}</td>
                        <td align="center">${v.lo_n ?? ''}</td>
                        <td align="center">${v.lo_r ?? ''}</td>
                        <td align="center">${v.lo_s ?? ''}</td>
                        <td align="center">${v.lo_sat ?? ''}</td>
                        <td align="center">${v.lo_djj ?? ''}</td>
                        <td align="center">${v.lo_his ?? ''}</td>
                        <td align="center">${v.lo_tfu ?? ''}</td>
                        <td align="center">${v.lo_kontraksi ?? ''}</td>
                        <td align="center">${v.lo_perdarahan ?? ''}</td>
                        <td align="center">${v.lo_urin ?? ''}</td>
                        <td align="center">${v.lo_ket ?? ''}</td>
                        <td align="center">${v.nama_user ?? ''}</td>
                        ${selOp}
                    </tr>
                `;
                $('#tabel_lo .body-table').append(html);
            });
        }
    }

    function editLo(id, id_pendaftaran, id_layanan) {
        $.ajax({
			type: 'GET',
            url: '<?= base_url("form_rekam_medis/api/entri_keperawatan/get_edit_lo") ?>/' + id + '/' + id_pendaftaran + '/' + id_layanan,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				resetEditLo();

                let lo = data.lo_detail;
                if (lo !== null) {
                    $('#edit_lo_id').val(lo.id);
                    $('#edit_lo_id_pendaftaran').val(lo.id_pendaftaran);
                    $('#edit_lo_id_layanan_pendaftaran').val(lo.id_layanan_pendaftaran);

                    $('#edit_lo_tgl').val((lo.lo_tgl !== null ? datetimefmysql(lo.lo_tgl) : ''));
                    $('#edit_lo_td').val(lo.lo_td);
                    $('#edit_lo_n').val(lo.lo_n);
                    $('#edit_lo_r').val(lo.lo_r);
                    $('#edit_lo_s').val(lo.lo_s);
                    $('#edit_lo_sat').val(lo.lo_sat);
                    $('#edit_lo_djj').val(lo.lo_djj);
                    $('#edit_lo_his').val(lo.lo_his);
                    $('#edit_lo_tfu').val(lo.lo_tfu);
                    $('#edit_lo_kontraksi').val(lo.lo_kontraksi);
                    $('#edit_lo_perdarahan').val(lo.lo_perdarahan);
                    $('#edit_lo_urin').val(lo.lo_urin);
                    $('#edit_lo_ket').val(lo.lo_ket);
                }
                
				$('#modal_edit_lembar_observasi').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});

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

    function tutupRapet() {
        let html = /* html */ `
                        </div>
                    </div>
                </div>
            </div>
        `;

        return html;
    }

    function tambahLo() {
        if ($('#lo_tgl').val() === '') {
            syams_validation('#lo_tgl', 'Tanggal harus diisi.');
            return false;
        } else {
            syams_validation_remove('#lo_tgl');
        }

        let lo_tgl = $('#lo_tgl').val();
        let lo_td = $('#lo_td').val();
        let lo_n = $('#lo_n').val();
        let lo_r = $('#lo_r').val();
        let lo_s = $('#lo_s').val();
        let lo_sat = $('#lo_sat').val();
        let lo_djj = $('#lo_djj').val();
        let lo_his = $('#lo_his').val();
        let lo_tfu = $('#lo_tfu').val();
        let lo_kontraksi = $('#lo_kontraksi').val();
        let lo_perdarahan = $('#lo_perdarahan').val();
        let lo_urin = $('#lo_urin').val();
        let lo_ket = $('#lo_ket').val();

        numberTable++;

        let html = `
            <tr>
                <td class="number-pemantauan" align="center">${numberTable}</td>
                <td align="center"><input type="hidden" name="lo_tgl[]" value="${lo_tgl}">${lo_tgl}</td>
                <td align="center"><input type="hidden" name="lo_td[]" value="${lo_td}">${lo_td}</td>
                <td align="center"><input type="hidden" name="lo_n[]" value="${lo_n}">${lo_n}</td>
                <td align="center"><input type="hidden" name="lo_r[]" value="${lo_r}">${lo_r}</td>
                <td align="center"><input type="hidden" name="lo_s[]" value="${lo_s}">${lo_s}</td>
                <td align="center"><input type="hidden" name="lo_sat[]" value="${lo_sat}">${lo_sat}</td>
                <td align="center"><input type="hidden" name="lo_djj[]" value="${lo_djj}">${lo_djj}</td>
                <td align="center"><input type="hidden" name="lo_his[]" value="${lo_his}">${lo_his}</td>
                <td align="center"><input type="hidden" name="lo_tfu[]" value="${lo_tfu}">${lo_tfu}</td>
                <td align="center"><input type="hidden" name="lo_kontraksi[]" value="${lo_kontraksi}">${lo_kontraksi}</td>
                <td align="center"><input type="hidden" name="lo_perdarahan[]" value="${lo_perdarahan}">${lo_perdarahan}</td>
                <td align="center"><input type="hidden" name="lo_urin[]" value="${lo_urin}">${lo_urin}</td>
                <td align="center"><input type="hidden" name="lo_ket[]" value="${lo_ket}">${lo_ket}</td>
                <td align="center"><input type="hidden" name="id_user[]" value="<?= $this->session->userdata("id_translucent") ?>"><?= $this->session->userdata('nama') ?></td>
                <td align="center">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="removeRow(this)"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        `;
        $('#tabel_lo .body-table').append(html);
        $('#lo_tgl, #lo_td, #lo_n, #lo_r, #lo_s, #lo_sat, #lo_djj, #lo_his, #lo_tfu, #lo_kontraksi, #lo_perdarahan, #lo_urin, #lo_ket').val('');
    }

    function removeRow(el) {
        $(el).closest('tr').remove();
        updateRowNumbers();
    }

    function updateRowNumbers() {
        $('#tabel_lo .body-table .number-pemantauan').each(function(index) {
            $(this).text(index + 1);
        });
        numberTable = $('#tabel_lo .body-table tr').length;
    }

    function konfirmasiSimpanEntriLo() {
        var stop = false;

        if ($('#lo_tanggal').val() === '') {
            syams_validation('#lo_tanggal', 'Nama tindakan harus diisi!');
            stop = true;
        }

        if ($('#lo_dokter').val() === '') {
            syams_validation('#lo_dokter', 'Dokter harus diisi!');
            stop = true;
        }

        if ($('#lo_tanggal').val() !== '' && $('#lo_dokter').val() !== '') {
            swal.fire({
                title: 'Simpan Entri Keperawatan',
                text: "Apakah anda yakin akan menyimpan form ini?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
                cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    simpanEntriLo();
                }
            })
        }
    }

    function simpanEntriLo() {
        var id_layanan_pendaftaran = $('#lo_id_layanan_pendaftaran').val();
        var id_pendaftaran = $('#lo_id_pendaftaran').val();
        var id_pasien = $('#lo_id_pasien').val();

        $.ajax({
            type: 'POST',
            url: '<?= base_url("form_rekam_medis/api/entri_keperawatan/simpan_lo") ?>',
            data: $('#form_lembar_observasi').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.respon) {
                    if (data.respon.show) {
                        if (data.respon.status === false) {
                            bootbox.dialog({
                                message: data.respon.message,
                                title: "Penyimpanan Data Gagal",
                                buttons: {
                                    batal: {
                                        label: '<i class="fas fa-times-circle"></i> Close',
                                        className: "btn-danger",
                                    }
                                }
                            });
                            return;
                        }
                    }
                } else {
                    $('input[name=csrf_syam]').val(data.token);
                    if (data.status) {
                        messageAddSuccess();
                        $('#modal_lembar_observasi').modal('hide');
                        resetLo();
                        showListForm(id_pendaftaran, id_layanan_pendaftaran, id_pasien);
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


    function updateLo() {
        var id_layanan_pendaftaran = $('#lo_id_layanan_pendaftaran').val();
        var id_pendaftaran = $('#lo_id_pendaftaran').val();
        var bed = $('#lo_bed').val();

        $.ajax({
            type: 'PUT',
            url: '<?= base_url("form_rekam_medis/api/entri_keperawatan/update_lo") ?>',
            data: $('#form_edit_lembar_observasi').serialize(),
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data.status) {
                    messageEditSuccess();
                    entriLo(id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    messageEditFailed();
                }

                $('#modal_edit_lembar_observasi').modal('hide');
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    function hapusLo(id) {
        var id_layanan_pendaftaran = $('#lo_id_layanan_pendaftaran').val();
        var id_pendaftaran = $('#lo_id_pendaftaran').val();
        var bed = $('#lo_bed').val();
        
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
                            url: '<?= base_url("form_rekam_medis/api/entri_keperawatan/hapus_lo") ?>/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageEditSuccess();
                                    entriLo(id_pendaftaran, id_layanan_pendaftaran, bed);
                                } else {
                                    messageEditFailed();
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

    function cekDateTime(id, form) {
        // ekspresi reguler untuk mencocokkan format tanggal yang dibutuhkan
        re = /^(\d{1,2})[-\/](\d{1,2})[-\/](\d{4})$/;
        if (form != '') {

            if (regs = form.match(re)) {
                // nilai hari antara 1 s.d 31
                if (regs[1] < 1 || regs[1] > 31) {
                    alert("Nilai tidak valid untuk hari: " + regs[1]);
                    syams_validation(id, 'Format Tanggal tidak sesuai');
                    return false;
                }
                // nilai bulan antara 1 s.d 12
                if (regs[2] < 1 || regs[2] > 12) {
                    alert("Nilai tidak valid untuk bulan: " + regs[2]);
                    syams_validation(id, 'Format Tanggal tidak sesuai');
                    return false;
                }
                // nilai tahun antara 2000 s.d sekarang
                if (regs[3] < ((new Date()).getFullYear()) - 1 || regs[3] > ((new Date()).getFullYear()) + 1) {
                    alert("Nilai tidak valid untuk tahun: " + regs[3] + " - harus antara " + (((new Date()).getFullYear()) -
                        1) + " dan " + (((new Date()).getFullYear()) + 1));
                    syams_validation(id, 'Format Tanggal tidak sesuai');
                    return false;
                }

            } else {

                syams_validation(id, 'Format Tanggal tidak sesuai');
                return false;

            }
        }

    }



</script>