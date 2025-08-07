<script>
var dWidth = $(window).width();
var dHeight = $(window).height();
var x = screen.width / 2 - dWidth / 2;
var y = screen.height / 2 - dHeight / 2;

$(function() {

    $("#wizard-form-pa").bwizard();
    $('#jns-hasil').change(function() {
        resetDataLabPA();
        $('.anamnesa, .makros, .mikros, .kondisi, .rincian').hide();

        if ($(this).val() === 'FN' | $(this).val() === 'ST') {
            $('.anamnesa').show();
            $('.mikros').show();
        }

        if ($(this).val() === 'PS') {
            $('.kondisi').show();
            $('.rincian').show();
        }

        if ($(this).val() === 'HP') {
            $('.makros').show();
            $('.mikros').show();
        }

    });

    getListDataHasilLaboratorium(1);
    $('#btn-print-hasil').css('display', 'none');

    $('#btn-search').click(function() {
        $('#modal-search').modal('show');
    })

    $('#btn-reload').click(function() {
        resetAllData();
        getListDataHasilLaboratorium(1);
    });

    $('#jenis-laboratorium').change(function() {
        getListDataHasilLaboratorium(1);
    });

    $('#catatan-field').summernote({
        height: 200,
        focus: true,
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ],
        callbacks: {
            onPaste: function(e) {
                var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData)
                    .getData('Text');

                e.preventDefault();

                // Firefox fix
                setTimeout(function() {
                    document.execCommand('insertText', false, bufferText);
                }, 10);
            }
        }
    });

    $('.form-control').keyup(function() {
        if ($(this).val() !== '') {
            syams_validation_remove(this);
        }
    });

    $('.select2-input').change(function() {
        if ($(this).val() !== '') {
            syams_validation_remove(this);
        }
    });

    $('#dokter-pjwb-auto').select2c({
        ajax: {
            url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
            dataType: 'json',
            quietMillis: 100,
            data: function(term, page) { // page is the one-based page number tracked by Select2
                return {
                    q: term, //search term
                    page: page, // page number
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

function getListDataHasilLaboratorium(page) {
    $('#page-now').val(page);
    $.ajax({
        type: 'GET',
        url: '<?= base_url("hasil_laboratorium/api/hasil_laboratorium/get_list_hasil_laboratorium") ?>/page/' +
            page,
        data: $('#form-search').serialize() + '&jenis_laboratorium=' + $('#jenis-laboratorium').val(),
        cache: false,
        dataType: 'JSON',
        beforeSend: function() {
            showLoader()
        },
        success: function(data) {
            if ((page - 1) & (data.data.length === 0)) {
                getListDataHasilLaboratorium(page - 1);
                return false;
            }

            $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
            $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

            $('#table-data tbody').empty();
            $.each(data.data, function(i, v) {

                let disabled = '';
                let status_keluar = '';
                let status_konsul = '';
                let batal_status = '';
                let disabledCancel = 'disabled';
                let updateHasil = '';
                let editTindakan = '';
                let deleteHasil = '';
                let statusHasilLAB = '-';

                let profesiLab = '<?= $this->session->userdata('account_group'); ?>';


                // 1 = Patologi Klinik | 2 = Patologi Anatomi | 3 = Mikrobiologi
                let jenisLab = '1';
                if (v.jenis_laboratorium === 'Patologi Anatomi') {
                    jenisLab = '2';
                }
                if (v.jenis_laboratorium === 'Mikrobiologi') {
                    jenisLab = '3';
                }

                if (v.tindak_lanjut !== null | v.status_hasil === 'Batal') {

                    if (v.status_hasil === 'Batal') {

                        disabled = 'disabled';
                        disabledCancel = '';
                        statusHasilLAB = 'Batal';

                    } else if (v.status_hasil !== 'Batal' &&  v.tindak_lanjut !== null) {
						//v.tagihan !== 'Sudah' &&
						
                        disabled = 'disabled';
                        disabledCancel = '';
                        statusHasilLAB = v.tindak_lanjut;
                        editTindakan =
                            `<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="editTindakan(${v.id})"><i class="fas fa-fw fa-pencil-alt m-r-5"></i>Edit Tindakan</a>`;

                        deleteHasil =
                            `<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="batalHasilLab(${page}, ${v.kode}, ${v.id})"><i class="fas fa-fw fa-trash-alt mr-1"></i>Batal Hasil</a>`;

                    } else {

                        disabled = 'disabled';
                        disabledCancel = '';
                        statusHasilLAB = '-';

                    }


                } else {

                    editTindakan =
                        `<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="editTindakan(${v.id})"><i class="fas fa-fw fa-pencil-alt m-r-5"></i>Edit Tindakan</a>`;

                    deleteHasil =
                        `<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="batalHasilLab(${page}, ${v.kode}, ${v.id})"><i class="fas fa-fw fa-trash-alt mr-1"></i>Batal Hasil</a>`;

                }

                if (v.jenis_layanan === 'Laboratorium') {

                    status_keluar =
                        `<a class="dropdown-item ${disabled} waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="formTindakLanjut(${v.id_pendaftaran}, ${v.id_layanan_pendaftaran}, 0, ${v.id_dokter_pjwb}, '${v.dokter_penanggung_jawab}', 'Laboratorium')"><i class="fas fa-fw fa-arrow-circle-right mr-1"></i>Status Keluar</a>`;

                    status_konsul =
                        `<a class="dropdown-item ${disabled} waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="konsulKlinikLain(${v.id_pendaftaran}, ${v.id_layanan_pendaftaran}, 'Laboratorium')"><i class="fas fa-fw fa-plus m-r-5"></i>Konsul Klinik Lain</a>`;



                    if (disabled === 'disabled') {

                        batal_status =
                            `<a class="dropdown-item ${disabledCancel} btn-xs" href="javascript:void(0)" onclick="pembatalanStatusKeluarLaboratorium(${v.id_pendaftaran}, ${v.id_layanan_pendaftaran})"><i class="fas fa-fw fa-times-circle mr-1"></i>Pembatalan Status Keluar</a>`;
                    }

                }

                let html = /* html */ `
						<tr>
							<td class="center">${((i+1) + ((data.page - 1) * data.limit))}</td>
							<td class="center nowrap">${(v.kode !== null ? v.kode : '')}</td>
							<td class="nowrap">${((v.waktu_order !== null) ? datetimefmysql(v.waktu_order) : '')}</td>
							<td class="nowrap">${((v.waktu_konfirm !== null) ? datetimefmysql(v.waktu_konfirm) : '')}</td>
							<td>${v.no_register}</td>
							<td>${v.id_pasien}</td>
							<td class="nowrap">${v.nama}</td>
							<td class="nowrap">${v.dokter_penanggung_jawab}</td>
							<td class="nowrap">${v.jenis_layanan} ${v.layanan}</td>
							<td class="nowrap">${v.jenis_laboratorium}</td>
							<td class="nowrap">${statusHasilLAB}</td>
							<td class="right">
								<div style="display:flex;justify-content:flex-end">
									<div class="dropdown">
										<button class="btn waves-effect waves-light btn-secondary btn-xs dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="fas fa-fw fa-cog mr-1"></i>
										</button>
										<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
											<a class="dropdown-item btn-xs" href="javascript:void(0)" onclick="detailPemeriksaan(${v.id_pendaftaran}, ${v.id_layanan_pendaftaran}, ${v.id},  ${jenisLab})"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri Hasil</a>
											${editTindakan}
											${deleteHasil}
											${status_konsul}
											${status_keluar}
											${batal_status}
											<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakPemeriksaan(${v.id})"><i class="fas fa-fw fa-print"></i> Print List</a>
										</div>
									</div>
								</div>
							</td>
						</tr>
					`;

                $('#table-data tbody').append(html);
            });

        },
        complete: function() {
            hideLoader()
        },
        error: function(e) {
            accessFailed(e.status);
        },
    });
}

function editTindakan(id_lab) {

    $('#modal-edit-tindakan').modal('show');

    $.ajax({
        type: 'GET',
        url: '<?= base_url("hasil_laboratorium/api/hasil_laboratorium/getDataOrderLaboratorium") ?>/id/' +
            id_lab,
        cache: false,
        dataType: 'JSON',
        success: function(data) {

            $('#id-order-detail').text(data.id_order_laboratorium);
            $('#id-ono').text(data.ono);
            $('#waktu-order-detail').text((data.waktu_order !== '') ? datetimefmysql(data.waktu_order) :
            '');
            $('#dokter-lab-pasien').text((data.dokter_pj !== '') ? data.dokter_pj : '');
            $('#analis-pasien').text((data.analis !== '') ? data.analis : '');
            $('#dokter-order-detail').text(data.dokter);
            $('#no-rm-pasien').text(data.no_rm);
            $('#nama-pasien').text(data.pasien);
            $('#ktp-pasien').text(data.no_identitas);
            $('#layanan-detail').text(data.jenis_pendaftaran + ' ' + data.layanan);
            let kelamin = '';
            if (data.kelamin === 'L') {
                kelamin = 'Laki-laki';
            } else {
                kelamin = 'Perempuan';
            }
            $('#kelamin-pasien').text(kelamin);
            let umur = '';
            if (data.tanggal_lahir !== null) {
                umur = hitungUmur(data.tanggal_lahir) + ' (' + datefmysql(data.tanggal_lahir) + ')';
            }
            $('#umur-pasien').text(umur);
            $('#id-footer-lis').empty();
            let statusLIS = data.status_lis;

            if (statusLIS === '201') {

                $('#id-status-lis').text('Berhasil');

            }

        },
        error: function(e) {
            accessFailed(e.status);
        },
    });

    $.ajax({
        type: 'GET',
        url: '<?= base_url("hasil_laboratorium/api/hasil_laboratorium/getOrderLaboratorium") ?>/id/' + id_lab,
        cache: false,
        dataType: 'JSON',
        success: function(data) {


            if (data.length > 0) {

                let totalBiaya = 0;
                let renum = 0;
                let totalNominal = 0;

                $('#table-order tbody').empty();

                $.each(data, function(i, v) {

                    if (v.cito === 1) {
                        if (v.kelas === 'III') {
                            renum = 25;
                        } else {
                            renum = 20;
                        }

                        totalBiaya = ((renum / 100) * parseFloat(v.total)) + parseInt(v.total);
                    } else {
                        totalBiaya = v.total;
                    }

                    let html = /* html */ `
							<tr>
								<td class="center">
									${i + 1}
								</td>
								<td>${v.layanan}</td>
								<td class="left">${v.jenis}</td>
								<td class="center">
									<input type="hidden" value="${v.cito}">${((v.cito === '1') ? '&checkmark;' : '')}
								</td>
								<td>${((v.penjamin !== null) ? v.penjamin : '-')}</td>
								<td class="center">${v.kelas}</td>
								<td class="right">${numberToCurrency(v.total)}</td>
								<td class="center">
									<button type="button" class="btn btn-secondary btn-xs" onclick="hapusTindakanLaboratorium(this, ${v.id_tarif}, ${v.id_laboratorium}, ${data.length})"><i class="fas fa-trash-alt"></i></button>
								</td>
							</tr>
						`;

                    totalNominal += parseInt(totalBiaya);
                    $('#table-order tbody').append(html);




                    $('.mypopover').popover({
                        html: true,
                        trigger: 'hover'
                    });




                })

                html = /* html */ `
						<tr>
							<td colspan="5"></td>
							<td class="center"><b>Total</b></td>
							<td class="right"><b>${numberToCurrency(totalNominal)}</b></td>
							<td></td>
						</tr>
					`;

                $('#table-order tbody').append(html);

            }



        },
        error: function(e) {
            accessFailed(e.status);
        },
    });
}


function hapusTindakanLaboratorium(obj, id, id_lab, pj) {

    if (pj > 1) {

        bootbox.dialog({
            message: "Anda yakin akan menghapus tindakan ini?",
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
                            url: '<?= base_url("hasil_laboratorium/api/hasil_laboratorium/hapusTindakanLaboratorium") ?>/' +
                                id + '/' + id_lab,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    removeMe(obj);
                                    editTindakan(id_lab);

                                } else {
                                    customAlert('Hapus Tindakan Laboratorium', data.message);
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

    } else {

        swalAlert('warning', 'Validasi', 'Item ini Tidak Dapat dihapus, harap hapus melalui Batal Hasil');

    }
}

function batalHasilLab(page, id_ono, id_lab) {

    $.ajax({
        type: 'GET',
        url: '<?= base_url("hasil_laboratorium/api/hasil_laboratorium/perbaharuiHasil") ?>/ono/' + id_ono +
            '/id_lab/' + id_lab,
        cache: false,
        dataType: 'json',
        beforeSend: function() {
            showLoader()
        },
        success: function(data) {

            if (data.response === 200) {

                let tipe = 'Error';
                messageCustom('Hasil Sudah Tersedia di LIS, Data tidak dapat diperbaharui', tipe);

                bootbox.dialog({
                    message: "Hasil Sudah Tersedia di LIS, Anda yakin akan menghapus tindakan ini?",
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
                                    url: '<?= base_url("hasil_laboratorium/api/hasil_laboratorium/batalHasilLab") ?>/' +
                                        id_lab,
                                    cache: false,
                                    dataType: 'JSON',
                                    success: function(data) {
                                        if (data.status) {
                                            messageCustom(data.message, 'Success');
                                            getListDataHasilLaboratorium(page)

                                        } else {
                                            customAlert(
                                                'Batalkan Hasil Laboratorium',
                                                data.message);
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

        },
        complete: function() {
            hideLoader()
        },
        error: function(data) {

            if (data.status === 404) {

                let tipe = 'Success';
                messageCustom('Data LIS Belum Tersedia Silakan Lanjutkan Perbaharui Hasil Lab', tipe);

                bootbox.dialog({
                    message: "Anda yakin akan menghapus Hasil Laboratorium ini?",
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
                                    url: '<?= base_url("hasil_laboratorium/api/hasil_laboratorium/batalHasilLab") ?>/' +
                                        id_lab,
                                    cache: false,
                                    dataType: 'JSON',
                                    success: function(data) {
                                        if (data.status) {
                                            messageCustom(data.message, 'Success');
                                            getListDataHasilLaboratorium(page)

                                        } else {
                                            customAlert(
                                                'Batalkan Hasil Laboratorium',
                                                data.message);
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


        },
    });
}

function paging(page) {
    getListDataHasilLaboratorium(page);
}

function resetAllData() {
    var filter_lab = $('#jenis-laboratorium').val();
    $('#id, .form-control, .select2-input, #pencarian, #antrian, #no-lab-search #nama-search, #no-rm-search').val('');
    syams_validation_remove('.validate_input');
    syams_validation_remove('.select2-input');
    syams_validation_remove('.select2c-input');
    $('#tanggal-awal, #tanggal-akhir').val('<?= date("d/m/Y") ?>');
    $('#hasil-pemeriksaan-laboratorium').empty();
    $('input[type=checkbox]').prop('checked', false);
    $('#jenis-laboratorium').val(filter_lab);
}

function detailPemeriksaan(id_pendaftaran, id_layanan_pendaftaran, id_laboratorium, jenis_laboratorium) {

    if (jenis_laboratorium == '1') {
        $('#row-pk').show();
    } else {
        $('#row-pk').hide();
    }

    if (jenis_laboratorium == '2') {
        $('#row-pa').show();
    } else {
        $('#row-pa').hide();
    }

    if (jenis_laboratorium == '3') {
        // $('#row-mb').show();
        $('#row-pk').show();
    } else {
        $('#row-mb').hide();
    }

    $('#id-layanan-pendaftaran').val(id_layanan_pendaftaran);
    $('#id-daftar').val(id_pendaftaran);
    $('#list-order-lab').empty();
	
    getHasilLabWa(id_pendaftaran, id_layanan_pendaftaran, id_laboratorium, jenis_laboratorium);
    getHasilLab(id_laboratorium);
    $.ajax({
        type: 'GET',
        url: '<?= base_url("pelayanan/api/pelayanan/get_layanan_pendaftaran_detail") ?>/id/' + id_pendaftaran +
            '/id_layanan/' + id_layanan_pendaftaran,
        cache: false,
        dataType: 'JSON',
        beforeSend: function() {
            showLoader()
        },
        success: function(data) {



            let pasien = '';
            pasien = data.pasien;
            if (pasien !== null) {

                let kelamin = '';
                if (pasien.kelamin == 'L') {
                    kelamin = 'Laki - laki';
                } else if (pasien.kelamin == 'P') {
                    kelamin = 'Perempuan';
                }

                let umur = '';
                if (pasien.tanggal_lahir !== null | pasien.tanggal_lahir !== '') {
                    umur = hitungUmur(pasien.tanggal_lahir) + ' (' + datefmysql(pasien.tanggal_lahir) + ')';
                }

                $('#id-pasien').val(pasien.id_pasien); //tambahan lina
                $('#no-rm-detail').text(pasien.id_pasien);
                $('#no-register-detail').text(pasien.no_register);
                $('#nama-detail').text(pasien.nama);
                $('#ktp-detail').text(pasien.no_identitas);
                $('#alamat-detail').text(pasien.alamat);
                $('#telp-detail').text(pasien.telp);
                $('#kelamin-detail').text(kelamin);
                $('#umur-detail').text(umur);
                $('#dokter-rujuk').text(data.layanan.dokter);
                $('#nama-pjwb-detail').text(pasien.nama_pjwb);
                $('#alamat-pjwb-detail').text(pasien.alamat_pjwb);
                $('#telp-pjwb-detail').text(pasien.telp_pjwb);
                $('#instansi-perujuk-detail').text(pasien.instansi_perujuk);
                $('#tenaga-medis-perujuk-detail').text(pasien.nadis_perujuk);
            }

            let layanan = '';

            layanan = data.layanan;
            if (layanan !== null) {
                let kelasTindakan = layanan.kelas;
                let jenisTindakan = layanan.jenis_layanan;
                if (jenisTindakan !== 'Rawat Inap') {
                    jenisTindakan = 'Rawat Jalan';
                    kelasTindakan = '<?= $kelas_tindakan ?>';
                }

                if (layanan.jenis_layanan === 'Laboratorium') {

                    let list_order = /* html */ `
		                    <div class="card">
		                        <div class="card-header" id="headingTwo">
		                            <h2 class="mb-0">
		                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
		                                    <i class="fas fa-list mr-1"></i>List Order Laboratorium
		                                </button>
		                            </h2>
		                        </div>
		                        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
		                            <div class="card-body">
		                                <div class="row">
		                                    <div class="col-lg-12">
		                                        <div class="box-well">
		                                            <div id="daftar-order-laboratorium"></div>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                `;

                    $('#list-order-lab').append(list_order);

                    getListOrderLab(id_layanan_pendaftaran)

                    $('#order-lab').show();

                } else {

                    $('#order-lab').hide();

                }
            }

            $('#modal-detail-pemeriksaan').modal('show');
        },
        complete: function() {
            hideLoader()
        },
        error: function(e) {
            accessFailed(e.status);
        },
    });
}

function getListOrderLab(id_layanan_pendaftaran) {
    $('#daftar-order-laboratorium').empty();
    $.ajax({
        type: 'GET',
        url: '<?= base_url("pelayanan/api/pelayanan/pemeriksaan_pendaftaran_laboratorium") ?>/id/' +
            id_layanan_pendaftaran,
        cache: false,
        dataType: 'json',
        success: function(data) {

            if (data.length > 0) {
                var str = '';
                str = '<div class="row mt-3" id="item-lab">' +
                    '<div class="col-md-12">' +
                    '<div class="widget">' +
                    '<div class="widget-header">' +
                    '</div>' +
                    '<div class="widget-body">' +
                    '<table class="table table-hover table-striped table-sm color-table info-table">' +
                    '<thead>' +
                    '<tr>' +
                    '<th width="10%">ONO</th>' +
                    '<th width="10%">Item</th>' +
                    '<th width="10%" class="center">Waktu Order</th>' +
                    '<th width="10%" class="center">Status</th>' +
                    '</tr>' +
                    '</thead>' +
                    '<tbody>';



                $.each(data, function(i, v) {

                    var data_lab = v;

                    str += /* html */ `
                                            <tr>
                                            	<td class="v-center">${((data_lab.ono !== null)?data_lab.ono:'')}</td>
                                            	<td class="v-center">

                                            `;





                    $.each(v.detail, function(a, b) {


                        if (a === 'Laboratorium Sysmex') {

                            for (x = 0; x <= (b.length - 1); x++) {

                                str += /* html */ `${b[x].layanan_lab}`;

                                if (x < (b.length - 1)) {

                                    str += /* html */ `, `;

                                } else {

                                    str += /* html */ ``;
                                }

                            }

                        }

                    });


                    str += /* html */ `
		                                            	</td>
		                                                <td class="v-center center">${((data_lab.waktu_konfirm !== null)?datetimefmysql(data_lab.waktu_konfirm):'')}</td>
		                                        `;

                    if (data_lab.respon_lab === null | data_lab.respon_lab === undefined) {
                        str += /* html */ `
			                        	     <td class="v-center center">gagal order LIS</td>
			                                            </tr>`;

                    } else if (data_lab.respon_lab == 201) {

                        str += /* html */ `
			                        	     <td class="v-center center">${data_lab.status}</td>
			                                            </tr>`;

                    } else {

                        str += /* html */ `
			                        	     <td class="v-center center">gagal order LIS</td>
			                                            </tr>`;
                    }


                });




                str += /* html */ `
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                      
                                `;
                $('#daftar-order-laboratorium').append(str);

            }
        },
        complete: function() {
            hideLoader()
        },
        error: function(e) {
            accessFailed(e.status);
        },
    });

}

function riwayatDiagnosis() {
    $('#wizard-form-pa').bwizard('show', '0');
    let id_pendaftaran = $('#id-daftar').val();
    let id_layanan = $('#id-layanan-pendaftaran').val();

    $.ajax({
        type: 'GET',
        url: '<?= base_url("pelayanan/api/pelayanan/get_layanan_pendaftaran_detail") ?>/id/' + id_pendaftaran +
            '/id_layanan/' + id_layanan,
        cache: false,
        dataType: 'JSON',
        success: function(data) {

            let pasien = data.pasien;
            let umur = '';

            if (pasien.tanggal_lahir !== null) {

                umur = hitungUmur(pasien.tanggal_lahir) + ' (' + datefmysql(pasien.tanggal_lahir) + ')';

            }

            $('#identitas-pasien-diagnosis').html(pasien.id_pasien + ' / ' + pasien.nama + ' / ' + umur);

            if (data.diagnosa.length > 0) {
                showPADiagnosis(data.diagnosa);
            } else {
                $('#table-diagnosis tbody').empty();
            }

            $('#modal-pa-diagnosis').modal('show');
            $('#modal-pa-diagnosis-label').html('Riwayat Diagnosis Pasien');
        },
        complete: function() {
            hideLoader();
        },
        error: function(e) {

        }
    });
}

function riwayatDataPasien() {

    let id_pasien = $('#id-pasien').val();
    $.ajax({
        type: 'GET',
        url: '<?= base_url('pasien/api/pasien/get_pasien') ?>/id/' + id_pasien,
        cache: false,
        dataType: 'JSON',
        success: function(data) {

            $('#no-rm').html(data.data.id)
            $('#nama').html(data.data.nama)
            $('#status-pasien').html(data.data.status)
            $('#kelamin').html(data.data.kelamin)
            $('#tempat-lahir').html(data.data.tempat_lahir)
            $('#tanggal-lahir').html(data.data.tanggal_lahir)
            $('#alamat').html(data.data.alamat)
            $('#rt').html(data.data.no_rt)
            $('#rw').html(data.data.no_rw)
            $('#no-rumah').html(data.data.no_rumah)
            $('#provinsi').html(data.data.nama_prop)
            $('#kabupaten').html(data.data.nama_kab)
            $('#kecamatan').html(data.data.nama_kec)
            $('#kelurahan').html(data.data.nama_kel)
            $('#agama').html(data.data.agama)
            $('#golongan-darah').html(data.data.gol_darah)
            $('#pendidikan').html(data.data.pendidikan)
            $('#pekerjaan').html(data.data.pekerjaan)
            $('#status-kawin').html(data.data.status_kawin)
            $('#status-kawin').html(data.data.status_kawin)
            $('#nama-ayah').html(data.data.nama_ayah)
            $('#nama-ibu').html(data.data.nama_ibu)
            $('#nama-ibu').html(data.data.nama_ibu)
            $('#nik').html(data.data.no_identitas)
            $('#telepon').html(data.data.telp)
            $('#telepon').html(data.data.telp)
            $('#etnis').html(data.data.etnis)
            $('#status').html(data.data.status)

            $('#modal-data-pasien').modal('show');
            $('#modal-data-pasien-label').html('Riwayat Data Pasien');
        },
        complete: function() {
            hideLoader();
        },
        error: function(e) {

        }
    });
}

function showPADiagnosis(data) {
    $('#table-pa-diagnosis tbody').empty();
    if (data !== null) {
        $.each(data, function(i, v) {
            let kodeDiagnosa = '';
            let diagnosa = '';
            if (v.diangnosa_manual == 1) {
                diagnosa =
                    `<input type="hidden" name="gol_sebab_sakit_lain[]" value> ${((v.golongan_sebab_sakit_lain !== null) ? v.golongan_sebab_sakit_lain : '')}
                                <input type="hidden" name="id_golongan_sebab_sakit[]" value> ${((v.golongan_sebab_sakit !== null) ? v.golongan_sebab_sakit : '')}`;
            } else {
                diagnosa =
                    `<input type="hidden" name="id_golongan_sebab_sakit[]" value> ${((v.golongan_sebab_sakit !== null) ? v.golongan_sebab_sakit : '')}
                                <input type="hidden" name="gol_sebab_sakit_lain[]" value> ${((v.golongan_sebab_sakit_lain !== null) ? v.golongan_sebab_sakit_lain : '')}`;
                kodeDiagnosa = v.golongan_sebab_sakit.substr(0, 3);
            }

            let html = /* html */ `
                    <tr>
                        <td class="number-diag center">
                            <input type="hidden"> ${(++i)}
                            <input type="hidden"">
                        </td>
                        <td class="nowrap">
                            ${v.dokter}
                        </td>
                        
                        <td>
                            ${diagnosa}
                        </td>
                        <td>
                            ${(v.diagnosa_klinis == 1) ? 'Ya' : 'Tidak' }
                        </td>
                        <td>
                            ${(v.prioritas)}
                        </td>
                        <td>
                            ${(v.diagnosa_banding)}
                        </td>
                        <td>
                            ${(v.diagnosa_akhir == 1) ? 'Ya' : 'Tidak' }
                        </td>
                        <td>
                            ${(v.penyebab_kematian == 1) ? 'Ya' : 'Tidak' }
                        </td>
                    </tr>
                `;

            $('#table-pa-diagnosis tbody').append(html);
        });

    }
}

function getHasilLab(id_laboratorium) {
    $.ajax({
        type: 'GET',
        url: '<?= base_url("hasil_laboratorium/api/hasil_laboratorium/get_permintaan_pemeriksaan_laboratorium") ?>/id/' +
            id_laboratorium,
        cache: false,
        dataType: 'JSON',
        beforeSend: function() {
            showLoader()
        },
        success: function(data) {
            let kode_ono = data.kode;
            $('#hasil-pemeriksaan-laboratorium').empty();
            if (data !== null) {
                $('#id-laboratorium').val(data.id);
                $('#no-laboratorium-detail').text(data.kode);
                $('#no-ono').val(data.kode);
                $('#dokter-pjwb-auto').val(data.id_dokter_pjwb);
                $('#s2id_dokter-pjwb-auto a .select2c-chosen').html(data.dokter_pjwb);
                $('#analis-detail').text(data.lab_analis)
                $('#catatan-field').summernote('code', data.catatan);

                if (data.jenis === 'Patologi Anatomi') {

                    $('#id-sync-lab').val(kode_ono);

                    if (kode_ono !== null) {

                        getPALab(data.id, data.kode);

                    } else {

                        checkOrderLAB(data.id);
                    }




                } else {

                    $('#id-sync-lab').val(kode_ono);

                    if (kode_ono !== null) {
                        curlLab(data.kode, data.id);
                        checkOrderLAB(data.id);
                    } else {

                        checkOrderLAB(data.id);
                    }

                }
            }
        },
        complete: function() {
            hideLoader()
        },
        error: function(e) {
            accessFailed(e.status);
        },
    });

}

/*
	button di bawah ${value.test_nm}
	<button type="button" title="Pembatalan item pemeriksaan laboratorium" class="btn btn-danger btn-xs" onclick="hapusItemLaboratorium()"><i class="fas fa-trash-alt mr-1"></i>Hapus Item Pemeriksaan</button>
*/

function getPALab(id_lab, kode) {
    $.ajax({
        type: 'GET',
        url: '<?= base_url("hasil_laboratorium/api/hasil_laboratorium_pa/get_hasil_laboratorium_pa") ?>/id/' +
            id_lab,
        cache: false,
        dataType: 'json',
        beforeSend: function() {
            showLoader()
        },
        success: function(data) {
            if (data.hasil === 'Available') {


                $.each(data, function(i, value) {


                    let html = /* html */ `
										<div class="row mt-3" id="item-lab">
											<div class="col-md-12">
												<div class="widget">
													<div class="widget-header">
														<div class="title"> `;

                    if (value.jenis_pemeriksaan === 'PS') {

                        html += /* html */ `
															<h6>
																<b>HASIL PEMERIKSAAN PAP SMEAR</b>
															</h6>
														</div>
													</div>
													<div class="widget-body">
														<table class="table table-hover table-striped table-sm info-table">
															<thead>
																<tr>
																	<th width="30%"><h6><b>DIAGNOSIS KLINIS</b></h6></th>
																</tr>
															</thead>
															<tbody>

															`;
                        html += /* html */ `
												<tr>
													<td class="v-center">${value.diagnosa_klinik}</td>
												</tr>
											`;

                        html += /* html */ `
															</tbody>
														</table>
													</div>
											`;

                        html += /* html */ `
											
									<div class="widget-body">
										<table class="table table-hover table-striped table-sm info-table">
											<thead>
												<tr>
													<th width="30%"><h6><b>KONDISI</b></h6></th>
												</tr>
											</thead>
											<tbody>

											`;
                        html += /* html */ `
												<tr>
													<td class="v-center">${value.kondisi}</td>
												</tr>
											`;

                        html += /* html */ `
														</tbody>
													</table>
												</div>
										`;

                        html += /* html */ `
											
									<div class="widget-body">
										<table class="table table-hover table-striped table-sm info-table">
											<thead>
												<tr>
													<th width="30%"><h6><b>RINCIAN</b></h6></th>
												</tr>
											</thead>
											<tbody>

											`;
                        html += /* html */ `
												<tr>
													<td class="v-center">${value.rincian}</td>
												</tr>
											`;

                        html += /* html */ `
														</tbody>
													</table>
												</div>
										`;

                        html += /* html */ `
											
									<div class="widget-body">
										<table class="table table-hover table-striped table-sm info-table">
											<thead>
												<tr>
													<th width="30%"><h6><b>KESIMPULAN</b></h6></th>
												</tr>
											</thead>
											<tbody>

											`;
                        html += /* html */ `
												<tr>
													<td class="v-center">${value.kesimpulan}</td>
												</tr>
											`;

                        html += /* html */ `
														</tbody>
													</table>
												</div>
										`;

                        html += /* html */ `
											
									<div class="widget-body">
										<table class="table table-hover table-striped table-sm info-table">
											<thead>
												<tr>
													<th width="30%"><h6><b>ANJURAN</b></h6></th>
												</tr>
											</thead>
											<tbody>

											`;
                        html += /* html */ `
												<tr>
													<td class="v-center">${value.anjuran}</td>
												</tr>
											`;

                        html += /* html */ `
														</tbody>
													</table>
												</div>
										`;

                        html += /* html */ `
															
												</div>
											</div>
										</div>

											`;

                    } else if (value.jenis_pemeriksaan === 'HP') {

                        html += /* html */ `
															<h6>
																<b>HASIL PEMERIKSAAN HISTOPATOLOGI</b>
															</h6>
														</div>
													</div>
													<div class="widget-body">
														<table class="table table-hover table-striped table-sm info-table">
															<thead>
																<tr>
																	<th width="30%"><h6><b>DIAGNOSIS KLINIS</b></h6></th>
																</tr>
															</thead>
															<tbody>

															`;
                        html += /* html */ `
												<tr>
													<td class="v-center">${value.diagnosa_klinik}</td>
												</tr>
											`;

                        html += /* html */ `
															</tbody>
														</table>
													</div>
											`;

                        html += /* html */ `
											
									<div class="widget-body">
										<table class="table table-hover table-striped table-sm info-table">
											<thead>
												<tr>
													<th width="30%"><h6><b>MAKROSKOPIS</b></h6></th>
												</tr>
											</thead>
											<tbody>

											`;
                        html += /* html */ `
												<tr>
													<td class="v-center">${value.makroskopik}</td>
												</tr>
											`;

                        html += /* html */ `
														</tbody>
													</table>
												</div>
										`;

                        html += /* html */ `
											
									<div class="widget-body">
										<table class="table table-hover table-striped table-sm info-table">
											<thead>
												<tr>
													<th width="30%"><h6><b>MIKROSKOPIS</b></h6></th>
												</tr>
											</thead>
											<tbody>

											`;
                        html += /* html */ `
												<tr>
													<td class="v-center">${value.mikroskopik}</td>
												</tr>
											`;

                        html += /* html */ `
														</tbody>
													</table>
												</div>
										`;

                        html += /* html */ `
											
									<div class="widget-body">
										<table class="table table-hover table-striped table-sm info-table">
											<thead>
												<tr>
													<th width="30%"><h6><b>KESIMPULAN</b></h6></th>
												</tr>
											</thead>
											<tbody>

											`;
                        html += /* html */ `
												<tr>
													<td class="v-center">${value.kesimpulan}</td>
												</tr>
											`;

                        html += /* html */ `
														</tbody>
													</table>
												</div>
										`;

                        html += /* html */ `
											
									<div class="widget-body">
										<table class="table table-hover table-striped table-sm info-table">
											<thead>
												<tr>
													<th width="30%"><h6><b>ANJURAN</b></h6></th>
												</tr>
											</thead>
											<tbody>

											`;
                        html += /* html */ `
												<tr>
													<td class="v-center">${value.anjuran}</td>
												</tr>
											`;

                        html += /* html */ `
														</tbody>
													</table>
												</div>
										`;

                        html += /* html */ `
															
												</div>
											</div>
										</div>

											`;

                    } else if (value.jenis_pemeriksaan == 'FN') {

                        html += /* html */ `
											<h6>
												<b>HASIL PEMERIKSAAN FNAB</b>
											</h6>
										</div>
									</div>
									<div class="widget-body">
										<table class="table table-hover table-striped table-sm info-table">
											<thead>
												<tr>
													<th width="30%"><h6><b>DIAGNOSIS KLINIS</b></h6></th>
												</tr>
											</thead>
											<tbody>

											`;
                        html += /* html */ `
												<tr>
													<td class="v-center">${value.diagnosa_klinik}</td>
												</tr>
											`;

                        html += /* html */ `
															</tbody>
														</table>
													</div>
											`;

                        html += /* html */ `
											
									<div class="widget-body">
										<table class="table table-hover table-striped table-sm info-table">
											<thead>
												<tr>
													<th width="30%"><h6><b>ANAMNESA</b></h6></th>
												</tr>
											</thead>
											<tbody>

											`;
                        html += /* html */ `
												<tr>
													<td class="v-center">${value.anamnesa}</td>
												</tr>
											`;

                        html += /* html */ `
														</tbody>
													</table>
												</div>
										`;

                        html += /* html */ `
											
									<div class="widget-body">
										<table class="table table-hover table-striped table-sm info-table">
											<thead>
												<tr>
													<th width="30%"><h6><b>MIKROSKOPIS</b></h6></th>
												</tr>
											</thead>
											<tbody>

											`;
                        html += /* html */ `
												<tr>
													<td class="v-center">${value.mikroskopik}</td>
												</tr>
											`;

                        html += /* html */ `
														</tbody>
													</table>
												</div>
										`;

                        html += /* html */ `
											
									<div class="widget-body">
										<table class="table table-hover table-striped table-sm info-table">
											<thead>
												<tr>
													<th width="30%"><h6><b>KESIMPULAN</b></h6></th>
												</tr>
											</thead>
											<tbody>

											`;
                        html += /* html */ `
												<tr>
													<td class="v-center">${value.kesimpulan}</td>
												</tr>
											`;

                        html += /* html */ `
														</tbody>
													</table>
												</div>
										`;

                        html += /* html */ `
											
									<div class="widget-body">
										<table class="table table-hover table-striped table-sm info-table">
											<thead>
												<tr>
													<th width="30%"><h6><b>ANJURAN</b></h6></th>
												</tr>
											</thead>
											<tbody>

											`;
                        html += /* html */ `
												<tr>
													<td class="v-center">${value.anjuran}</td>
												</tr>
											`;

                        html += /* html */ `
														</tbody>
													</table>
												</div>
										`;

                        html += /* html */ `
															
												</div>
											</div>
										</div>

											`;

                    } else if (value.jenis_pemeriksaan === 'ST') {

                        html += /* html */ `
											<h6>
												<b>HASIL PEMERIKSAAN SITOLOGI</b>
											</h6>
										</div>
									</div>
									<div class="widget-body">
										<table class="table table-hover table-striped table-sm color-table info-table">
											<thead>
												<tr>
													<th width="30%">DIAGNOSIS KLINIS</th>
												</tr>
											</thead>
											<tbody>
									`;

                        html += /* html */ `
												<tr>
													<td class="v-center">${value.diagnosa_klinik}</td>
												</tr>
											`;

                        html += /* html */ `
															</tbody>
														</table>
													</div>
											`;

                        html += /* html */ `
											
									<div class="widget-body">
										<table class="table table-hover table-striped table-sm info-table">
											<thead>
												<tr>
													<th width="30%"><h6><b>MAKROSKOPIK</b></h6></th>
												</tr>
											</thead>
											<tbody>

											`;
                        html += /* html */ `
												<tr>
													<td class="v-center">${value.anamnesa}</td>
												</tr>
											`;

                        html += /* html */ `
														</tbody>
													</table>
												</div>
										`;

                        html += /* html */ `
											
									<div class="widget-body">
										<table class="table table-hover table-striped table-sm info-table">
											<thead>
												<tr>
													<th width="30%"><h6><b>MIKROSKOPIK</b></h6></th>
												</tr>
											</thead>
											<tbody>

											`;
                        html += /* html */ `
												<tr>
													<td class="v-center">${value.mikroskopik}</td>
												</tr>
											`;

                        html += /* html */ `
														</tbody>
													</table>
												</div>
										`;

                        html += /* html */ `
											
									<div class="widget-body">
										<table class="table table-hover table-striped table-sm info-table">
											<thead>
												<tr>
													<th width="30%"><h6><b>KESIMPULAN</b></h6></th>
												</tr>
											</thead>
											<tbody>

											`;
                        html += /* html */ `
												<tr>
													<td class="v-center">${value.kesimpulan}</td>
												</tr>
											`;

                        html += /* html */ `
														</tbody>
													</table>
												</div>
										`;

                        html += /* html */ `
											
									<div class="widget-body">
										<table class="table table-hover table-striped table-sm info-table">
											<thead>
												<tr>
													<th width="30%"><h6><b>ANJURAN</b></h6></th>
												</tr>
											</thead>
											<tbody>

											`;
                        html += /* html */ `
												<tr>
													<td class="v-center">${value.anjuran}</td>
												</tr>
											`;

                        html += /* html */ `
														</tbody>
													</table>
												</div>
										`;

                        html += /* html */ `
															
												</div>
											</div>
										</div>

											`;

                    }



                    $('#hasil-pemeriksaan-laboratorium').append(html);




                })

                checkOrderLAB(id_lab);

            } else {

                curlLab(kode, id_lab);
                checkOrderLAB(id_lab);
            }





        },
        complete: function() {
            hideLoader()
        },
        error: function(data) {



            let html = /* html */ `
										<div class="row mt-3" id="item-lab">
											<div class="col-md-12">
												<div class="widget">
													<div class="widget-header">
														<div class="title">
															<h6>
																<i class="fas fa-angle-right mr-1"></i><b>Data Tidak Tersedia</b>
															</h6>
														</div>
													</div>
													<div class="widget-body">
														<table class="table table-hover table-striped table-sm color-table info-table">
															<thead>
																<tr>
																	<th width="30%">Jenis Pemeriksaan</th>
																	<th width="20%" class="center">Hasil</th>
																	<th width="15%" class="center">Nilai Normal</th>
																	<th width="10%" class="center">Keabnormalan</th>
																</tr>
															</thead>
															<tbody>


						`;



            html += /* html */ `
									<tr>
										<td class="v-center"></td>
										<td class="v-center center"></td>
										<td class="v-center center"></td>
										<td class="v-center center"></td>
									</tr>
								`;

            html += /* html */ `
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>						
						`;

            $('#hasil-pemeriksaan-laboratorium').append(html);




        },
    });

}

function curlLab(id_ono, id_lab) {
    $('#hasil-pemeriksaan-laboratorium').empty();

    $.ajax({
        type: 'GET',
        url: '<?= base_url("pelayanan/api/pelayanan/curlLAB") ?>/ono/' + id_ono + '/id_lab/' + id_lab,
        cache: false,
        dataType: 'json',
        beforeSend: function() {
            showLoader()
        },
        success: function(data) {

            var tipe = 'Success';
            messageCustom(data.message, tipe);
            obj = data.response;
            let html = /* html */ `
									<div class="row mt-3" id="item-lab">
										<div class="col-md-12">
											<div class="widget">
												<div class="widget-header">
												</div>
												<div class="widget-body">
													<table class="table table-hover table-striped table-sm color-table info-table">
														<thead>
															<tr>
																<th width="30%">Jenis Pemeriksaan</th>
																<th width="1%"></th>
																<th width="29%" class="center">Hasil</th>
																<th width="15%" class="center">Satuan</th>
																<th width="15%" class="center">Nilai Rujukan</th>
																<th width="10%"></th>
															</tr>
														</thead>
														<tbody>

								`;


            function groupAndSort(array, groupField, sortField) {
                var groups = {};
                for (var i = 0; i < array.length; i++) {
                    var row = array[i];
                    var groupValue = row[groupField];
                    groups[groupValue] = groups[groupValue] || [];
                    groups[groupValue].push(row);
                }
                // Sort each group
                for (var groupValue in groups) {
                    groups[groupValue] = groups[groupValue].sort(function(a, b) {
                        // return a[sortField] - b[sortField];
                        var firstCase = a[sortField].toLowerCase();
                        var secondCase = b[sortField].toLowerCase();
                        if (firstCase < secondCase) {
                            return -1;
                        } else if (firstCase > secondCase) {
                            return 1;
                        } else {
                            return 0;
                        }

                    });
                }
                // Return the results
                return groups;
            }


            var statVal = [];
            var iVal = [];

            statVal.push(obj);

            function urutan(maSuk) {

                iVal.push(maSuk);
                return iVal.sort(function(a, b) {
                    var firstCase = a.test_group.toLowerCase();
                    var secondCase = b.test_group.toLowerCase();
                    if (firstCase < secondCase) {
                        return -1;
                    } else if (firstCase > secondCase) {
                        return 1;
                    } else {
                        return 0;
                    }

                });

            }

            $.each(statVal, function(a, value) {

                $.each(value, function(b, c) {

                    urutan(c);

                })
            })

            var groupedTegr = groupAndSort(iVal, "test_group", "test_group");

            $.each(groupedTegr, function(i, value) {


                html += /* html */ `
													<tr>
														<td style="padding-left:40px;" class="v-center bold">${i}</td>
														<td class="v-center bold"></td>
														<td class="v-center bold"></td>
														<td class="v-center bold"></td>
														<td class="v-center bold"></td>
														<td class="v-center bold"></td>
													</tr>
													<tr>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
												`;



                var groupedOtname = groupAndSort(value, "order_testnm", "order_testnm");

                $.each(groupedOtname, function(j, k) {


                    html += /* html */ `
										<tr>
											<td style="padding-left:60px;" class="v-center bold">${j}</td>
											<td class="v-center bold"></td>
											<td class="v-center bold"></td>
											<td class="v-center bold"></td>
											<td class="v-center bold"></td>
											<td class="v-center bold"></td>
										</tr>
										<tr>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
									`;

                    html += /* html */ `<tr>`;

                    var status = [];

                    status.push(k);

                    $.each(status, function(l, m) {

                        const sorter = (a, b) => {
                            return parseFloat(a.disp_seq.replace(/[_]/g, "")) -
                                parseFloat(b.disp_seq.replace(/[_]/g, ""));
                        };
                        const sortByAge = arr => {
                            arr.sort(sorter);
                        };

                        sortByAge(m);

                        $.each(m, function(y, z) {

                            if (Array.isArray(z.nama) && !z.nama.length) {

                                html += /* html */ `
															
																<td style="padding-left:80px;" class="v-center"></td>
															
														`;

                            } else {

                                $.each(z.nama, function(n, o) {

                                    if (o.nama === 'Hitung Jenis') {
                                        html += /* html */ `
															
																<td style="padding-left:80px;" class="v-center bold" >${(o.nama !== null ? o.nama : '')}</td>
															
														`;

                                    } else {

                                    	if(z.nama[0].nama === 'HBsAg (Rapid)' && z.nama[1].nama === 'Rapid HBsAg (Dinkes Kota)'){

                                        	html += /* html */ `
															
																<td style="padding-left:80px;" class="v-center" >${(z.nama[1].nama !== null ? z.nama[1].nama : '')}</td>
															
														`;

											return false;

										} else {

											html += /* html */ `
															
																<td style="padding-left:80px;" class="v-center" >${(o.nama !== null ? o.nama : '')}</td>
															
														`;

										}

                                    }



                                })
                            }

                            let mFlag = '';
                            let sResult = '';
                            if (z.flag === 'N') {

                                mFlag = `<td class="v-center center"></td>`;

                            } else {

                                mFlag =
                                    `<td style="color:red;" class="v-center center">${z.flag}</td>`;
                            }

                            if (z.unit === '' && z.ref_range === '') {

                                if (z.result_value.length < 15) {

                                    sResult = /* html */ ` 
												<td class="v-center center">${z.result_value}</td>
												<td class="v-center center">${z.unit}</td>
												<td class="v-center center">${z.ref_range}</td>`;

                                } else {

                                    sResult = /* html */ ` 

											<td class="v-center center" colspan="3">${z.result_value}</td> `;

                                }

                            } else {

                                sResult = /* html */ ` 
												<td class="v-center center">${z.result_value}</td>
												<td class="v-center center">${z.unit}</td>
												<td class="v-center center">${z.ref_range}</td>`;

                            }

                            html += /* html */ `
												${mFlag}
												${sResult}
												<td class="v-center center">${(z.test_comment !== null ? z.test_comment : '')}</td>
											</tr>
											`;
                        })

                    })

                })

            })





            html += /* html */ `
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>						
								`;

            $('#hasil-pemeriksaan-laboratorium').append(html);



        },
        complete: function() {
            hideLoader()
        },
        error: function(data) {

            if (data.responseJSON.status === false && data.responseJSON.response !== null) {

                let tipe = 'Error';
                messageCustom(data.responseJSON.message, tipe);

                obj = data.responseJSON.response;



                $.each(obj, function(i, value) {

                    let html = /* html */ `
										<div class="row mt-3" id="item-lab">
											<div class="col-md-12">
												<div class="widget">
													<div class="widget-header">
														<div class="title">
															<h6>
																<i class="fas fa-angle-right mr-1"></i><b>${value.test_nm}</b>
															</h6>
														</div>
													</div>
													<div class="widget-body">
														<table class="table table-hover table-striped table-sm color-table info-table">
															<thead>
																<tr>
																	<th width="30%">Jenis Pemeriksaan</th>
																	<th width="20%" class="center">Hasil</th>
																	<th width="15%" class="center">Nilai Normal</th>
																	<th width="10%" class="center">Keabnormalan</th>
																</tr>
															</thead>
															<tbody>


						`;



                    html += /* html */ `
									<tr>
										<td class="v-center">${value.test_group}</td>
										<td class="v-center center">${value.result_value}</td>
										<td class="v-center center">${value.ref_range}</td>
										<td class="v-center center">${value.flag}</td>
									</tr>
								`;

                    html += /* html */ `
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>						
						`;

                    $('#hasil-pemeriksaan-laboratorium').append(html);

                })

            } else {



                let tipe = 'Error';
                messageCustom(data.responseJSON.message, tipe);

                let html = /* html */ `
										<div class="row mt-3" id="item-lab">
											<div class="col-md-12">
												<div class="widget">
													<div class="widget-header">
														<div class="title">
															<h6>
																<i class="fas fa-angle-right mr-1"></i><b>Data Tidak Tersedia</b>
															</h6>
														</div>
													</div>
													<div class="widget-body">
														<table class="table table-hover table-striped table-sm color-table info-table">
															<thead>
																<tr>
																	<th width="30%">Jenis Pemeriksaan</th>
																	<th width="20%" class="center">Hasil</th>
																	<th width="15%" class="center">Nilai Normal</th>
																	<th width="10%" class="center">Keabnormalan</th>
																</tr>
															</thead>
															<tbody>


						`;



                html += /* html */ `
									<tr>
										<td class="v-center"></td>
										<td class="v-center center"></td>
										<td class="v-center center"></td>
										<td class="v-center center"></td>
									</tr>
								`;

                html += /* html */ `
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>						
						`;

                $('#hasil-pemeriksaan-laboratorium').append(html);

            }


        },
    });

}

function checkOrderLAB(id_lab) {
    $('#sinkronisasi-lis').empty();

    $.ajax({
        type: 'GET',
        url: '<?= base_url("hasil_laboratorium/api/hasil_laboratorium/checkOrderLAB") ?>/id_lab/' + id_lab,
        cache: false,
        dataType: 'json',
        beforeSend: function() {
            showLoader()
        },
        success: function(data) {

            if (data.status_lis === 1) {

                $('#sinkronisasi-lis').text('Sudah disinkronisasi dengan LIS');

            } else {

                $('#sinkronisasi-lis').text('Belum disinkronisasi dengan LIS');
            }



        },
        complete: function() {
            hideLoader()
        },
        error: function(data) {

            if (data.responseJSON === undefined) {

                $('#sinkronisasi-lis').text('Belum disinkronisasi dengan LIS');

            } else {

                $('#sinkronisasi-lis').text('Belum disinkronisasi dengan LIS');
                let tipe = 'Error';
                messageCustom(data.responseJSON.message, tipe);

            }


        },
    });

}

function getRequestLaboratorium(id_laboratorium) {
    $('#hasil-pemeriksaan-laboratorium').empty();
    $.ajax({
        type: 'GET',
        url: '<?= base_url("hasil_laboratorium/api/hasil_laboratorium/get_permintaan_pemeriksaan_laboratorium") ?>/id/' +
            id_laboratorium,
        cache: false,
        dataType: 'JSON',
        beforeSend: function() {
            showLoader()
        },
        success: function(data) {
            if (data !== null) {
                $('#id-laboratorium').val(data.id);
                $('#no-laboratorium-detail').text(data.kode);

                $('#dokter-pjwb-auto').val(data.id_dokter_pjwb);
                $('#s2id_dokter-pjwb-auto a .select2c-chosen').html(data.dokter_pjwb);
                $('#analis-detail').text(data.lab_analis)
                $('#catatan-field').summernote('code', data.catatan);

                let select2 = 1;
                let j = 1;
                let htmlNilai = '';
                let htmlNilaiItem = '';

                if (data.jenis === 'Mikrobiologi') {
                    // htmlNilai= '<th width="15%" class="center">Nilai Normal</th>';
                    htmlNilai = '<th width="30%">Jenis Pemeriksaan</th>' +
                        '<th width="20%" class="center">Hasil</th>' +
                        '<th width="10%" class="center">Keabnormalan</th>' +
                        '<th width="55%">Catatan</th>';
                } else if (data.jenis === 'Laboratorium PA') {
                    htmlNilai = '';
                    htmlNilaiItem = '';
                } else {
                    htmlNilai = '<th width="30%">Jenis Pemeriksaan</th>' +
                        '<th width="20%" class="center">Hasil</th>' +
                        '<th width="15%" class="center">Nilai Normal</th>' +
                        '<th width="10%" class="center">Keabnormalan</th>' +
                        '<th width="40%">Catatan</th>';
                    let htmlNilaiItem = '<td class="v-center center"><h6>${x.nilai_normal}</h6></td>';
                }

                $.each(data.detail, function(i, value) {
                    let html = /* html */ `
							<div class="row mt-3" id="item-lab${j}">
								<div class="col-md-12">
									<div class="widget">
										<div class="widget-header">
											<div class="title">
												<h6>
													<i class="fas fa-angle-right mr-1"></i><b>${value.layanan}</b>
													<button type="button" title="Pembatalan item pemeriksaan laboratorium" class="btn btn-danger btn-xs" onclick="hapusItemLaboratorium(${j},${value.id})"><i class="fas fa-trash-alt mr-1"></i>Hapus Item Pemeriksaan</button>
												</h6>
											</div>
										</div>
										<div class="widget-body">
											<table class="table table-hover table-striped table-sm color-table info-table">
												<thead>
													<tr>
														` + htmlNilai + `
													</tr>
												</thead>
												<tbody>
						`;

                    $.each(value.item, function(j, x) {
                        let btnKeabnormalan = '<center><button type="button" id="btn-idl-' +
                            x.id + '" class="btn btn-secondary btn-xs" data-id="' + x.id +
                            '" data-abnormal="' + x.abnormal +
                            '" onclick="formKeabnormalan($(this))" title="Ubah"><span id="lb-idl-' +
                            x.id + '">' + keabnormalan(x.abnormal)['label'] +
                            '</span><i class="fa fas-edit"></i></button></center>';

                        if (data.jenis === 'Mikrobiologi') {
                            html += /* html */ `
									<tr>
										<td class="v-center"><input type="hidden" name="id_hasil_laboratorium[]" value="${x.id}">${x.item_laboratorium}</td>
										<td class="v-center center">
											<div class="input-group col-lg-12">
												<input type="text" name="input_hasil_lab[]" id="hasil-lab${select2}" class="custom-form echo-form" value="${x.hasil}">
											</div>
										</td>
										<td class="v-center center">${btnKeabnormalan}</td>
										<td class="v-center">
											<textarea name="catatan[]" id="catatan${select2}" class="form-control">${(x.catatan !== null ? x.catatan : '')}</textarea>
										</td>
									</tr>
								`;
                        } else if (data.jenis === 'Laboratorium PA') {

                        } else {
                            html += /* html */ `
									<tr>
										<td class="v-center"><input type="hidden" name="id_hasil_laboratorium[]" value="${x.id}">${x.item_laboratorium}</td>
										<td class="v-center center">
											<div class="input-group col-lg-12">
												<input type="text" name="input_hasil_lab[]" id="hasil-lab${select2}" class="custom-form echo-form" value="${x.hasil}">
												<div class="input-group-append">
													${(x.satuan !== '' ? '<span class="input-group-custom">' + x.satuan +'</span>' : '')}
												</div>
											</div>
										</td>
										<td class="v-center center"><h6>${x.nilai_normal}</h6></td>
										<td class="v-center center">${btnKeabnormalan}</td>
										<td class="v-center">
											<textarea name="catatan[]" id="catatan${select2}" class="form-control">${(x.catatan !== null ? x.catatan : '')}</textarea>
										</td>
									</tr>
								`;
                        }



                        // let htmlNilaiItem=``;
                        // let htmlSatuan=``;
                        // if (data.jenis !== 'Mikrobiologi') {
                        // 	htmlNilaiItem=`<td class="v-center center"><h6>${x.nilai_normal}</h6></td>`;
                        //     htmlSatuan=`<div class="input-group-append">
                        // 					${(x.satuan !== '' ? '<span class="input-group-custom">' + x.satuan +'</span>' : '')}
                        // 				</div>`;
                        // }

                        // html += /* html */ `
                        // 	<tr>
                        // 		<td class="v-center"><input type="hidden" name="id_hasil_laboratorium[]" value="${x.id}">${x.item_laboratorium}</td>
                        // 		<td class="v-center center">
                        // 			<div class="input-group col-lg-12">
                        // 				<input type="text" name="input_hasil_lab[]" id="hasil-lab${select2}" class="custom-form echo-form" value="${x.hasil}">
                        // 				`+htmlSatuan+`
                        // 			</div>
                        // 		</td>
                        // 		`+htmlNilaiItem+`
                        // 		<td class="v-center center">${btnKeabnormalan}</td>
                        // 		<td class="v-center">
                        // 			<textarea name="catatan[]" id="catatan${select2}" class="form-control">${(x.catatan !== null ? x.catatan : '')}</textarea>
                        // 		</td>
                        // 	</tr>
                        // `;

                        select2++;
                    });

                    html += /* html */ `
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>						
						`;


                    $('#hasil-pemeriksaan-laboratorium').append(html);
                    j++;
                });
            }
        },
        complete: function() {
            hideLoader()
        },
        error: function(e) {
            accessFailed(e.status);
        },
    });
}

function formKeabnormalan(obj) {
    let id = $(obj).attr('data-id');
    let abnormal = $(obj).attr('data-abnormal');
    let sel = selAbnormal({
        data: abnormal,
        name: 'abnormal',
        class: 'form-control'
    });
    $('#form-keabnormalan input').val(id);
    $('#modal-keabnormalan-body').html(sel);
    $('#modal-keabnormalan').modal('show');
}

function selAbnormal(param = null) {
    let data = null;
    if ('data' in param) {
        data = param['data'];
    }

    let id = '';
    if ('id' in param) {
        id = param['id'];
    }

    let cl = '';
    if ('class' in param) {
        cl = param['class'];
    }

    let nm = '';
    if ('name' in param) {
        nm = param['name'];
    }

    let hasil = '<select id="' + id + '" class="' + cl + '" name="' + nm + '">';

    $.each(keabnormalan(), function(k, v) {
        if (data != null) {
            var op = (k == data ? 'selected' : '');
            hasil += '<option value="' + k + '" ' + op + '>' + v['label'] + '</option>';
        } else {
            hasil += '<option value="' + k + '">' + v['label'] + '</option>';
        }
    });
    hasil += '</select>';

    return hasil;
}


function updateKeabnormalan(obj) {
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url("hasil_laboratorium/api/hasil_laboratorium/update_keabnormalan") ?>',
        data: $(obj).serialize(),
        cache: false,
        dataType: 'JSON',
        success: function(data) {
            if (data.status === false) {
                messageCustom(data.message, 'Error');
            } else {
                let id = $('#form-keabnormalan input').val();
                let selVal = $('#form-keabnormalan select').val();
                let selLb = $('#form-keabnormalan select option:selected').text();

                $('#btn-idl-' + id).attr('data-abnormal', selVal);
                $('#lb-idl-' + id).html(selLb);

                messageCustom(data.message, 'Success');
            }

            $('#modal-keabnormalan').modal('hide');
        },
        error: function(e) {
            messageEditFailed();
        }
    });
}


function konfirmasiSimpanHasil() {
    Swal.fire({
        title: 'Konfirmasi Simpan Hasil',
        html: "Apakah anda yakin ingin mengentrikan <br> data hasil Laboratorium ini ?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: '<i class="fas fa-save mr-1"></i>Simpan',
        cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            simpanHasil();
        }
    })
}

function simpanHasil() {
    let catatan = $('#catatan-field').summernote('code');
    $.ajax({
        type: 'POST',
        url: '<?= base_url("hasil_laboratorium/api/hasil_laboratorium/simpan_hasil_laboratorium") ?>',
        data: $('#form-detail-pemeriksaan').serialize() + "&catatan_global=" + catatan,
        cache: false,
        dataType: 'JSON',
        beforeSend: function() {
            showLoader()
        },
        success: function(data) {
            if (data.status === false) {
                messageAddFailed();
            } else {
                messageAddSuccess();
            }

            getListDataHasilLaboratorium($('#page-now').val());
        },
        complete: function() {
            hideLoader()
        },
        error: function(e) {
            swalAlert('error', e.status, e.statusText);
        },
    });
}

function hapusItemLaboratorium(object, id) {
    swal.fire({
        title: 'Konfirmasi Hapus',
        html: "Apakah anda yakin ingin akan menghapus item pemeriksaan Laboratorium ? <br> Menghapus item pemeriksaan akan mengubah billing yang sudah tercatat",
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: '<i class="fas fa-save mr-1"></i>Simpan',
        cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: 'DELETE',
                url: '<?= base_url("hasil_laboratorium/api/hasil_laboratorium/hapus_pemeriksaan_laboratorium_detail") ?>/' +
                    id,
                cache: false,
                dataType: 'JSON',
                success: function(data) {
                    $('#item-lab' + object).remove();
                    if (data.status === false) {
                        messageCustom(data.message, 'Info');
                    } else {
                        // removeMe(object);
                        messageCustom(data.message, 'Success');
                    }
                },
                error: function(e) {
                    messageCustom('Terjadi Kesalahan saat hapus item pemeriksaan Laboratorium',
                        'Error');
                }
            });
        }
    })
}

function removeMe(el) {
    var parent = el.parentNode.parentNode;
    parent.parentNode.removeChild(parent);
}


// Laboratorium PA
$(function() {
    $('#anamnesa-field, #kondisi-field, #rincian-field, #diag-field, #makro-field, #mikro-field, #kesimpulan-field, #anjuran-field')
        .summernote({
            height: 200, //set editable area's height
            focus: true //set focus editable area after Initialize summernote
        });
});

function editHasilLaboratoriumPA() {
    $('#jns-hasil').val('');
    $('.anamnesa, .makros, .mikros, .kondisi, .rincian').hide();
    let id_lab = $('#id-laboratorium').val();
    resetDataLabPA();

    $.ajax({
        type: 'GET',
        url: '<?= base_url("hasil_laboratorium/api/hasil_laboratorium_pa/get_hasil_laboratorium_pa") ?>/id/' +
            id_lab,
        cache: false,
        dataType: 'JSON',
        success: function(data) {
            if (data.hasil === 'Available') {
                let hasil_pemeriksaan = data.data.jenis_pemeriksaan;
                if (hasil_pemeriksaan === "PS") {

                    $('.kondisi, .rincian').show();
                    $('#jns-hasil').val(data.data.jenis_pemeriksaan);
                    $('#no-lab-pa').val(data.data.no_lab_pa);
                    $('#diag-field').summernote('code', (data.data.diagnosa_klinik !== null ? data.data
                        .diagnosa_klinik : '-'));
                    $('#kondisi-field').summernote('code', (data.data.kondisi !== null ? data.data.kondisi :
                        '-'));
                    $('#rincian-field').summernote('code', (data.data.rincian !== null ? data.data.rincian :
                        '-'));
                    $('#kesimpulan-field').summernote('code', (data.data.kesimpulan !== null ? data.data
                        .kesimpulan : '-'));
                    $('#anjuran-field').summernote('code', (data.data.anjuran !== null ? data.data.anjuran :
                        '-'));

                } else if (hasil_pemeriksaan === "HP") {

                    $('.makros, .mikros').show();
                    $('#jns-hasil').val(data.data.jenis_pemeriksaan);
                    $('#no-lab-pa').val(data.data.no_lab_pa);
                    $('#diag-field').summernote('code', (data.data.diagnosa_klinik !== null ? data.data
                        .diagnosa_klinik : '-'));
                    $('#makro-field').summernote('code', (data.data.makroskopik !== null ? data.data
                        .makroskopik : '-'));
                    $('#mikro-field').summernote('code', (data.data.mikroskopik !== null ? data.data
                        .mikroskopik : '-'));
                    $('#kesimpulan-field').summernote('code', (data.data.kesimpulan !== null ? data.data
                        .kesimpulan : '-'));
                    $('#anjuran-field').summernote('code', (data.data.anjuran !== null ? data.data.anjuran :
                        '-'));

                } else {

                    $('.anamnesa, .mikros').show();
                    $('#jns-hasil').val(data.data.jenis_pemeriksaan);
                    $('#no-lab-pa').val(data.data.no_lab_pa);
                    $('#diag-field').summernote('code', (data.data.diagnosa_klinik !== null ? data.data
                        .diagnosa_klinik : '-'));
                    $('#anamnesa-field').summernote('code', (data.data.anamnesa !== null ? data.data
                        .anamnesa : '-'));
                    $('#mikro-field').summernote('code', (data.data.mikroskopik !== null ? data.data
                        .mikroskopik : '-'));
                    $('#kesimpulan-field').summernote('code', (data.data.kesimpulan !== null ? data.data
                        .kesimpulan : '-'));
                    $('#anjuran-field').summernote('code', (data.data.anjuran !== null ? data.data.anjuran :
                        '-'));

                }

            };

            $('#modal-hasil-laboratorium-pa').modal('show');
        },
        error: function(e) {
            accessFailed(e.status);
        }
    });
}

function resetDataLabPA() {
    $('#no-lab-pa').val('');
    $('#diag-field').summernote('code', '');
    $('#anamnesa-field').summernote('code', '');
    $('#makro-field').summernote('code', '');
    $('#mikro-field').summernote('code', '');
    $('#kondisi-field').summernote('code', '');
    $('#rincian-field').summernote('code', '');
    $('#kesimpulan-field').summernote('code', '');
    $('#anjuran-field').summernote('code', '');
}

function konfirmasiSimpanHasilPA() {

    if ($('#no-lab-pa').val() === '') {
        $('#modal-hasil-laboratorium-pa').animate({
            scrollTop: 0
        }, '100');
        syams_validation('#no-lab-pa', 'Silakan isi No. Laboratorium PA Terlebih dahulu!');
        return false;
    }

    if ($('#jns-hasil').val() === '') {
        $('#modal-hasil-laboratorium-pa').animate({
            scrollTop: 0
        }, '100');
        syams_validation('#jns-hasil', 'Silakan Pilih Hasil Pemeriksaan Terlebih dahulu!');
        return false;
    }

    Swal.fire({
        title: 'Konfirmasi Simpan Hasil',
        html: "Apakah anda yakin ingin mengentrikan <br> data hasil Laboratorium PA ini ?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: '<i class="fas fa-save mr-1"></i>Simpan',
        cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            simpanHasilPA();
        }
    })
}

function simpanHasilPA() {

    let id_laboratorium = $('#id-laboratorium').val();
    let id_layanan_pendaftaran = $('#id-layanan-pendaftaran').val();
    let id_pendaftaran = $('#id-daftar').val();

    let diag = $('#diag-field').summernote('code');
    let anamnesa = $('#anamnesa-field').summernote('code');
    let makro = $('#makro-field').summernote('code');
    let mikro = $('#mikro-field').summernote('code');
    let kondisi = $('#kondisi-field').summernote('code');
    let rincian = $('#rincian-field').summernote('code');
    let kesimpulan = $('#kesimpulan-field').summernote('code');
    let anjuran = $('#anjuran-field').summernote('code');

    $.ajax({
        type: 'POST',
        url: '<?= base_url("hasil_laboratorium/api/hasil_laboratorium_pa/simpan_hasil_laboratorium_pa") ?>',
        data: $('#form-hasil-laboratorium-pa').serialize() + '&jenis_pemeriksaan=' + $('#jns-hasil').val() +
            '&diagnosa_klinik=' + diag + '&anamnesa=' + anamnesa + '&makroskopik=' + makro + '&mikroskopik=' +
            mikro + '&kondisi=' + kondisi + '&rincian=' + rincian + '&kesimpulan=' + kesimpulan + '&anjuran=' +
            anjuran + '&id_laboratorium=' + id_laboratorium,
        cache: false,
        dataType: 'JSON',
        beforeSend: function() {
            showLoader()
        },
        success: function(data) {
            if (data.status === false) {
                messageAddFailed();
            } else {
                messageAddSuccess();
            }

            detailPemeriksaan(id_pendaftaran, id_layanan_pendaftaran, id_laboratorium, 2);
            $('#modal-hasil-laboratorium-pa').modal('hide');
        },
        complete: function() {
            hideLoader()
        },
        error: function(e) {
            swalAlert('error', e.status, e.statusText);
        },
    });
}

function cetakPemeriksaan(id_order) {
    window.open('<?php echo base_url() ?>hasil_laboratorium/printing_list_pemeriksaan_laboratorium/' + id_order,
        'Cetak List Pemeriksaan Laboratorium', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' +
        y);
}

function cetakHasilLaboratoriumHALAB() {
    var id_laboratorium = $('#id-laboratorium').val();
    window.open('<?php echo base_url() ?>hasil_laboratorium/printing_hasil_laboratorium/' + id_laboratorium,
        'Cetak Hasil Laboratorium', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
}

function cetakHasilPDF() {
    var ono = $('#no-ono').val();
    window.open('<?php echo base_url() ?>hasil_laboratorium/cetak_pdf_laboratorium/' + ono,
        'Cetak PDF Hasil Laboratorium', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
}

function cetakHasilLaboratoriumHALABPA() {
    var id_laboratorium = $('#id-laboratorium').val();
    window.open('<?php echo base_url() ?>hasil_laboratorium/printing_hasil_laboratorium_pa/' + id_laboratorium,
        'Cetak Hasil Laboratorium PA', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
}

function cetakHasilLaboratoriumHALABMB() {
    var id_laboratorium = $('#id-laboratorium').val();
    window.open('<?php echo base_url() ?>hasil_laboratorium/printing_hasil_laboratorium_mb/' + id_laboratorium,
        'Cetak Hasil Laboratorium MB', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
}

function getHasilLabWa(id_pendaftaran, id_layanan_pendaftaran, id_laboratorium, jenis_laboratorium) {
    $.ajax({
        type: 'GET',
        url: '<?= base_url("hasil_laboratorium/api/hasil_laboratorium/get_kirim_lab_wa") ?>/id_pendaftaran/' 
                    + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran + '/id_laboratorium/' + id_laboratorium + '/jenis_laboratorium/' + jenis_laboratorium ,
        cache: false,
        dataType: 'JSON',
        beforeSend: function() {
            showLoader()
        },
        success: function(data) {
            
			let accountGroup = "<?= $this->session->userdata('account_group') ?>"
            let btn_simpan   = `<button type="button" class="btn btn-success btn-xs" onclick="simpanHasilLabWa(${id_pendaftaran}, ${id_layanan_pendaftaran}, ${id_laboratorium}, ${jenis_laboratorium})"><i class="fab fa-whatsapp  mr-1"></i>Kirim Via Whatsapp</button>`;
            let btn_update   = `<button type="button" class="btn btn-success btn-xs" onclick="simpanHasilLabWa(${id_pendaftaran}, ${id_layanan_pendaftaran}, ${id_laboratorium}, ${jenis_laboratorium})"><i class="fab fa-whatsapp  mr-1"></i>Kirim Ulang Via Whatsapp</button>`;
            let btn_admin    = ``;
            accountGroup == 'Admin' ? btn_admin = btn_update : btn_admin = '';
			
            $('#kirim-lab-wa').empty();
            if (data.data !== null) {
                if(data.data.status == 'Gagal'){
                    $('#kirim-lab-wa').append(`<div style="display: flex; justify-content: space-between;"><span style="color: red;">Pengiriman gagal. (`+data.data.respon+`)</span> ` + btn_update + `</div>`);
                } else if(data.data.status == 'Berhasil'){                    
                    $('#kirim-lab-wa').append(`<span style="color: black;">Pengiriman Hasil Lab Berhasil. </span>` + btn_admin + `</div>`)
                } else {
                    $('#kirim-lab-wa').append(`<div style="display: flex; justify-content: space-between;"><span style="color: black;">Proses pengiriman WA terkendala, harap refresh data. Jika notifikasi ini masih muncul hubungi IT !</span> ` + btn_admin + `</div>`)
                }
            } else {
                $('#kirim-lab-wa').append(`<div style="display: flex; justify-content: flex-end;">` + btn_simpan + `</div>`);
            }            
        },
        complete: function() {
            hideLoader()
        },
        error: function(e) {
            accessFailed(e.status);
        },
    });
}

function simpanHasilLabWa(id_pendaftaran, id_layanan_pendaftaran, id_laboratorium, jenis_laboratorium) {
    $.ajax({
        type : 'GET',
        url: '<?= base_url("hasil_laboratorium/api/hasil_laboratorium/simpan_kirim_lab_wa")  ?>/id_pendaftaran/' 
                    + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran + '/id_laboratorium/' + id_laboratorium + '/jenis_laboratorium/' + jenis_laboratorium ,
        cache: false,
        dataType : 'json',
        beforeSend: function() {
            showLoader();
        },
        success: function(data) {
            if(data.status == true){
                no_hp       = data.no_hp;
                nama_pasien = data.nama_pasien;
                tgl_layanan = data.tgl_layanan;
                pass        = data.pass;
                nama_file   = data.nama_file;
                kirimHasilLabWa(id_pendaftaran, id_layanan_pendaftaran, id_laboratorium, jenis_laboratorium, no_hp, nama_pasien, tgl_layanan, pass, nama_file)  
                
            } else {                
                messageCustom('Kirim hasil lab via Wa, Gagal !', 'Error');
            }
        },
        complete: function() {
            // hideLoader();
        },
        error: function(e){
            messageCustom('Gagal Simpan Jadwal Dokter '+e, 'Error');
        }
    });    
}
        
function kirimHasilLabWa(id_pendaftaran, id_layanan_pendaftaran, id_laboratorium, jenis_laboratorium, no_hp, nama_pasien, tgl_layanan, pass, nama_file) {
    $('#kirim-lab-wa').empty();  
    $('#kirim-lab-wa').append(`<span style="color: red;">Harap tunggu pengiriman dalam proses ! </span>`)     
    $.ajax({
        type : 'GET',   
        url: '<?= base_url("whatsapp/api/whatsapp/kirim_hasil_lab")  ?>/no_hp/' + no_hp + '/nama_pasien/' + nama_pasien + '/tgl_layanan/' + tgl_layanan + '/pass/' + pass + '/nama_file/' + nama_file ,
        cache: false,
        dataType : 'json',
        beforeSend: function() {
            // showLoader();
        },
        success: function(data) {
			if(data.status){
                responHasilLabWa(id_pendaftaran, id_layanan_pendaftaran, id_laboratorium, jenis_laboratorium, data.status, data.message);
            }else {
                responHasilLabWa(id_pendaftaran, id_layanan_pendaftaran, id_laboratorium, jenis_laboratorium, 'false', data.message);
                messageCustom(data.message, 'Error');
                $('#kirim-lab-wa').append(`<div style="display: flex; justify-content: space-between;"><span style="color: red;">Pengiriman gagal. (`+data.data.respon+`)</span> ` + btn_update + `</div>`);
            }
        },
        complete: function() {
            // hideLoader();
        },
        error: function(e){
            messageCustom('Gagal Simpan Jadwal Dokter '+e, 'Error');
        }
    });    
}


function responHasilLabWa(id_pendaftaran, id_layanan_pendaftaran, id_laboratorium, jenis_laboratorium, status, respon) {
    $.ajax({
        type : 'GET',
        url: '<?= base_url("hasil_laboratorium/api/hasil_laboratorium/respon_kirim_lab_wa")  ?>/id_pendaftaran/' 
                    + id_pendaftaran + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran + '/id_laboratorium/' + id_laboratorium + '/jenis_laboratorium/' + jenis_laboratorium 
                    + '/status/' + status + '/respon/' + respon ,
        cache: false,
        dataType : 'json',
        beforeSend: function() {
            // showLoader();
        },
        success: function(data) {
            
            let btn_update   = `<button type="button" class="btn btn-success btn-xs" onclick="simpanHasilLabWa(${id_pendaftaran}, ${id_layanan_pendaftaran}, ${id_laboratorium}, ${jenis_laboratorium})"><i class="fab fa-whatsapp  mr-1"></i>Kirim Ulang Via Whatsapp</button>`;
            $('#kirim-lab-wa').empty();  
                    
            if(status == true){
                messageCustom('Kirim hasil lab via Wa, Berhasil !', 'Success');
                $('#kirim-lab-wa').append(`<span style="color: black;">Pengiriman Hasil Lab Berhasil. </span>`)           
            } else {           
                messageCustom('Kirim hasil lab via Wa, Gagal !', 'Error');
                $('#kirim-lab-wa').append(`<div style="display: flex; justify-content: space-between;"><span style="color: red;">Pengiriman gagal. (`+data.data.respon+`)</span> ` + btn_update + `</div>`);
            }

        },
        complete: function() {
            hideLoader();
        },
        error: function(e){
            messageCustom('Gagal Simpan Jadwal Dokter '+e, 'Error');
        }
    });    
}

function editNoTelp() {
    $('#id-pendaftaran-edit-telp').val($('#id-daftar').val());
    $('#id-pasien-edit-telp').val($('#no-rm-detail').text());
    $('#no-telp-edit-telp').val($('#telp-detail').text());

    if(($('#id-pendaftaran-edit-telp').val() == '') || ($('#id-pasien-edit-telp').val() == '') || ($('#no-telp-edit-telp').val() == '') ){
        messageCustom('Edit No Telp eror, Silahkan refresh dan ulangi !', 'Error');
    } else {
        $('#modal_edit_no_telp').modal('show');
        $('#modal_edit_no_telp_label').html('Edit No. Telp (Whatsapp Aktif)');
    }
}

function simpanNoTelp() {
    id        = $('#id-pendaftaran-edit-telp').val();
    id_pasien = $('#id-pasien-edit-telp').val();
    telp      = $('#no-telp-edit-telp').val();

    $.ajax({
        type: 'PUT',
        url: '<?= base_url("hasil_lab_kirim_wa/api/hasil_lab_kirim_wa/update_notlp") ?>',
        data: 'id=' + id + '&id_pasien=' + id_pasien + '&telp=' + telp,
        cache: false,
        dataType: 'JSON',
        beforeSend: function() {
            showLoader();
        },
        success: function(data) {
            if (data.status) {
                messageEditSuccess();
                $('#telp-detail').text(telp);
                $('#modal_edit_no_telp').modal('hide');
            } else {
                messageEditFailed();
            }
        },
        complete: function() {
            hideLoader();
        },
        error: function(e) {
            accessFailed(e.status);
        }
    });
}

</script>