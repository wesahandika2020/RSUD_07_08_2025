<script>
    $(function() {

        $("#wizard-advance-form").bwizard();

        $('#tanggal_lahir_avsearch').datepicker({
            format: 'dd/mm/yyyy',
            endDate: new Date()
        }).on('changeDate', function() {
            $(this).datepicker('hide')
        })

        $('#modal_search_advanced_pasien').on('shown.bs.modal', function () {
            $('#no_rm_avsearch').focus()
        })

        $('#filter-advance').change(function() {
            pencarianAntreanBPJSList(1);
        });
    })

    function pencarianAdvancedPasien() {
        if ($('#domisili').val() == '') {
            syams_validation('#domisili', 'Silahkan pilih domisili terlebih dahulu')
            return false;
        }

        pencarianAdvancedPasienReset()
        pencarianAntreanBPJSReset();
        $('#modal_search_advanced_pasien').modal('show')
    }

    function pencarianAntreanBPJSReset() {
        $('.antrean').val('')
        $('#pagination-anbpjs, #summary-anbpjs').html('')
        
        pencarianAntreanBPJSList(1)

    }

    function pencarianAdvancedPasienReset() {
        $('.avsearch').val('')
        $('#pagination_avsearch, #summary_avsearch').html('')
        
        $('#table_avsearch tbody').empty();
       // pencarianAdvancedPasienList(1)

    }

    function paging2(p) {
        pencarianAntreanBPJSList(p);
    }

    function pencarianAntreanBPJSList(page) {

        let accountGroup = "<?= $this->session->userdata('account_group') ?>";

        if(accountGroup !== 'Security'){
            $('#table-antrean-bpjs tbody').empty()

            $.ajax({
                type: 'GET',
                url: '<?php echo site_url('antrian_bpjs/api/antrian_bpjs/antrean_list/page/') ?>' + page,
                data: $('#form-antrean-bpjs').serialize() + '&loket=' + $('#filter-advance').val(),
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader()
                },
                success: function (data) {

                    if ((page > 1) & (data.respon.data.length === 0)) {
                        pencarianAntreanBPJSList(page - 1)
                        return false;
                    }

                    $('#pagination-anbpjs').html(pagination2(data.respon.jumlah, data.respon.limit, data.respon.page, 1))
                    $('#summary-anbpjs').html(page_summary(data.respon.jumlah, data.respon.data.length, data.respon.limit, data.respon.page))
                    
                    let html = '';
                    $.each(data.respon.data, function(i, v) {
                        // let no = ((i + 1) + ((data.respon.page - 1) * data.respon.limit))
                            let button_ceklist = '';

                            if (v.poli !== null) {
                                button_ceklist = '<button type="button" title="Klik untuk memilih pasien" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="pilihAntrean(' + v.id + ', \'' + v.kode_booking + '\')"><i class="fas fa-check-circle"></i></button> ';
                            } else {
                                button_ceklist = 'Informasi/ Finger Print ';
                            }
                        
                            let html = '<tr>' +
                                '<td>' + v.kode_booking + '</td>' +
                                '<td>' + v.nomor_antrean + '</td>' +
                                '<td>' + ((v.status_jkn !== null) ? v.status_jkn : '') + '</td>' +
                                '<td>' + v.lokasi_data + '</td>' +
                                '<td>' + ((v.poli !== null) ? v.poli : '') + '</td>' +
                                '<td>' + ((v.nama_dokter !== null) ? v.nama_dokter : '') + '</td>' +
                                '<td align="right" class="nowrap">' +
                                    button_ceklist +
                                    '<button type="button" title="Klik Untuk membatalkan Antrean" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="batalAntrean(' + v.id + ', \'' + v.kode_booking + '\', \'' + v.tanggal_kunjungan + '\', ' + v.id_dokter + ',' + page + ')"><i class="fas fa-trash"></i></button> ' +
                                '</td>' +
                                '</tr>';
                            $('#table-antrean-bpjs tbody').append(html);
                        
                    })
                },
                complete: function () {
                    hideLoader()
                },
                error: function (e) {
                    accessFailed(e.status)
                }
            })

        }
            
    }

    function batalAntrean(id, kode_booking, tanggal, id_dokter, p) {
        $('#page-batal').val(p);
        $('#kode-batal-booking').val(kode_booking);
        $('#tanggal-kunjungan-batal').val(tanggal);
        $('#kode-batal-dokter').val(id_dokter);
        $('#id-batal').val(id);
        $('#modal-batal-antrean').modal('show');
        
    }

    function simpanBatalAntrean() {
        $('#modal-batal-antrean').modal('hide');
        let pesan = 'Apakah anda ingin membatalkan Antrean pada pasien ini ?';
        let confirm_button = 'Simpan';
        let waktuBatal = new Date().getTime();
        
        swal.fire({
            title: 'Konfirmasi',
            html: pesan,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-save"></i> ' + confirm_button,
            cancelButtonText: '<i class="fas fa-times-circle"></i> Batal',
            reverseButtons: true,
            allowOutsideClick: false
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url("antrian_bpjs/api/antrian_bpjs/batal_antrian") ?>',
                    data: $('#form-batal-antrean').serialize() + '&waktu_batal=' + waktuBatal,
                    cache: false,
                    dataType: 'JSON',
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(data) {

                        if(typeof data.metaData !== 'undefined'){

                            if(data.metaData.code === 201){

                                swalAlert('warning', data.metaData.code, data.metaData.message);
                                

                            } else {

                                messageCustom('Batal Antrian Berhasil', 'Success');
                                pencarianAntreanBPJSList($('#page-batal').val());
                            }

                        }
                            
                    },
                    complete: function() {
                        hideLoader();
                    },
                    error: function(e) {
                        messageCustom('Terjadi Kesalahan! | Gagal menyimpan/mengubah data')
                    }
                })
            }
        });

    }

    function pilihAntrean(id, kode_booking) {

        $('#kode-booking-online').val(kode_booking);
        $('#kode-booking-bpjs').val(kode_booking);
        
        $.ajax({
            type: 'GET',
            url: '<?php echo site_url('pendaftaran/api/pendaftaran/get_pasien_antrian/id/') ?>' + id,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function (data) {

                if(data.data !== null){

                    pencarianAdvancedPasienReset()
                    pencarianAntreanBPJSReset();
                    fillDataAntrean(data.data)
                    $('#modal_search_advanced_pasien').modal('hide')

                } else {

                    $.ajax({
                        type: 'GET',
                        url: '<?php echo site_url('pendaftaran/api/pendaftaran/get_id_antrian/id/') ?>' + kode_booking,
                        cache: false,
                        dataType: 'JSON',
                        beforeSend: function() {
                            showLoader()
                        },
                        success: function (data) {
                            pencarianAdvancedPasienReset();
                            pencarianAntreanBPJSReset();
                            fillDataAntrean(data)
                            $('#modal_search_advanced_pasien').modal('hide');

                        },
                        complete: function () {
                            hideLoader()
                        }
                    })

                }


            },
            complete: function () {
                hideLoader()
            }
        })
        
        

        
    }

    function pencarianAdvancedPasienList(page) {

        let accountGroup = "<?= $this->session->userdata('account_group') ?>";

        if(accountGroup === 'Security'){

            $.ajax({
                type: 'GET',
                url: '<?php echo site_url('pasien/api/pasien/get_list_kode_daftar/page/') ?>' + page,
                data: $('#form_search_advanced').serialize(),
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader()
                },
                success: function (data) {
                    if ((page > 1) & (data.data.length === 0)) {
                        pencarianAdvancedPasienList(page - 1)
                        return false;
                    }

                    $('#pagination_avsearch').html(pagination(data.jumlah, data.limit, data.page, 2))
                    $('#summary_avsearch').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))
                    $('#table_avsearch tbody').empty()

                    let html = '';
                    $.each(data.data, function(i, v) {
                        let no = ((i + 1) + ((data.page - 1) * data.limit));

                        let butPilih = '';

                        if(v.dilayani === 'Sudah'){

                            butPilih = '';


                        } else {

                            butPilih = '<button type="button" title="Klik untuk memilih pasien" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="pilihPasien(\'' + v.id + '\',\'' + v.nik + '\', \'' + v.status + '\', \'' + v.dilayani + '\', \'' + v.id_pasien + '\')"><i class="fas fa-check-circle"></i></button> ';
                        }

                        let html = '<tr>' +
                            '<td>' + v.id + '</td>' +
                            '<td>' + v.nama + '</td>' +
                            '<td class="center">' + ((v.id_pasien !== null) ? v.id_pasien : '') + '</td>' +
                            '<td>' + v.nik + '</td>' +
                            '<td>' + datefmysql((v.tgl_kunjungan !== null) ? v.tgl_kunjungan : '') + '</td>' +
                            '<td>' + ((v.nama_unit !== null) ? v.nama_unit : '') + '</td>' +
                            '<td>' + ((v.nama_dokter !== null) ? v.nama_dokter : '') + '</td>' +
                            '<td>' + ((v.cara_bayar !== null) ? v.cara_bayar : '') + '</td>' +
                            '<td>' + ((v.no_polish !== null) ? v.no_polish : '') + '</td>' +
                            '<td>' + ((v.no_rujukan !== null) ? v.no_rujukan : '') + '</td>' +
                            '<td>' + v.status + '</td>' +
                            '<td>' + v.dilayani + '</td>' +
                            '<td align="right" class="nowrap">' +
                            butPilih +    
                            '</td>' +
                            '</tr>';
                        $('#table_avsearch tbody').append(html)
                    })
                },
                complete: function () {
                    hideLoader()
                },
                error: function (e) {
                    accessFailed(e.status)
                }
            })

        } else {

            $.ajax({
                type: 'GET',
                url: '<?php echo site_url('pasien/api/pasien/get_list_pasien/page/') ?>' + page,
                data: $('#form_search_advanced').serialize(),
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader()
                },
                success: function (data) {
                    if ((page > 1) & (data.data.length === 0)) {
                        pencarianAdvancedPasienList(page - 1)
                        return false;
                    }

                    $('#pagination_avsearch').html(pagination(data.jumlah, data.limit, data.page, 2))
                    $('#summary_avsearch').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))
                    $('#table_avsearch tbody').empty()

                    let html = '';
                    $.each(data.data, function(i, v) {
                        let no = ((i + 1) + ((data.page - 1) * data.limit))
                        let kelamin = '';
                        if (v.kelamin == 'L') {
                            kelamin = 'Laki - laki';
                        } else {
                            kelamin = 'Perempuan';
                        }

                        let html = '<tr>' +
                            '<td>' + v.id + '</td>' +
                            '<td>' + v.nama + '</td>' +
                            '<td>' + kelamin + '</td>' +
                            '<td>' + datefmysql((v.tanggal_lahir !== null) ? v.tanggal_lahir : '') + '</td>' +
                            '<td>' + v.telp + '</td>' +
                            '<td>' + v.alamat + '</td>' +
                            '<td align="right" class="nowrap">' +
                                '<button type="button" title="Klik untuk memilih pasien" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="choosePasien(\'' + v.id + '\')"><i class="fas fa-check-circle"></i></button> ' +
                            '</td>' +
                            '</tr>';
                        $('#table_avsearch tbody').append(html)
                    })
                },
                complete: function () {
                    hideLoader()
                },
                error: function (e) {
                    accessFailed(e.status)
                }
            })

        }
            
    }

    function pilihPasien(id, nik, status, dilayani, no_rm) {

        if(status === null | status === ''){

            swalAlert('warning', 'Validasi', 'Status Pasien Kosong');

        }

        if(dilayani === 'Sudah'){

            swalAlert('warning', 'Validasi', 'Pasien Sudah Terdaftar');

        }

        $('#nik_search').val(nik);

        if(status === 'Lama' && no_rm !== ''){

            $.ajax({
            type: 'GET',
            url: '<?php echo site_url('pasien/api/pasien/get_pasien_wa_lama/id/') ?>' + no_rm + '/id_wa/' + id,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function (data) {
                    pencarianAdvancedPasienReset()
                    $('#no_rm').val(data.data.id)
                    $('#no-rm').val(data.data.id)
                    $('#s2id_no_rm a .select2-chosen').html(data.data.id)
                    $('#s2id_no-rm a .select2-chosen').html(data.data.id)

                    fillDataPasien(data.data)
                    $('#modal_search_advanced_pasien').modal('hide')
                },
                complete: function () {
                    hideLoader()
                }
            })

        } else

        if(status === 'Baru' && (no_rm === 'null' | no_rm === '')){

            $.ajax({
                type: 'GET',
                url: '<?php echo site_url('pasien/api/pasien/get_pasien_wa_baru/nik/') ?>' + nik + '/id_wa/' + id,
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader()
                },
                success: function (data) {

                    if(data.data === null){

                        swalAlert('warning', 'Validasi', 'Pasien Belum mengirim biodata');

                    } else {

                        pencarianAdvancedPasienReset();
                        $('#no_rm').val(data.data.id);
                        $('#no-rm').val(data.data.id);
                        $('#s2id_no_rm a .select2-chosen').html(data.data.id);
                        $('#s2id_no-rm a .select2-chosen').html(data.data.id);
                        fillDataPasien(data.data);
                        $('#modal_search_advanced_pasien').modal('hide');

                    }
                },
                complete: function () {
                    hideLoader()
                }
            })

        }

        
    }

    function choosePasien(no_rm) {

        $.ajax({
            type: 'GET',
            url: '<?php echo site_url('pasien/api/pasien/get_pasien/id/') ?>' + no_rm,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function (data) {
                pencarianAdvancedPasienReset()
                $('#no_rm').val(data.data.id)
                $('#no-rm').val(data.data.id)
                $('#s2id_no_rm a .select2-chosen').html(data.data.id)
                $('#s2id_no-rm a .select2-chosen').html(data.data.id)
                fillDataPasien(data.data)
                $('#modal_search_advanced_pasien').modal('hide')
            },
            complete: function () {
                hideLoader()
            }
        })
    }

</script>

<div id="modal_search_advanced_pasien" class="modal fade" role="dialog">
    <div class="modal-dialog" style="min-width:80%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_search_advanced_pasien_label">Pencarian Advanced Pasien</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div id="wizard-advance-form">
                    <ol>
                        <li>DAFTAR RM</li>
                        <li>BOOKING ANTRIAN</li>
                    </ol>
                    <div class="form-daftar-rm">
                        <?= form_open('', 'id=form_search_advanced role=form class=form-horizontal') ?>
                        <div class="row">
                            <div class="col-md-6">
                                <?php if ($this->session->userdata('account_group') === 'Security') : ?>
                                    <div class="form-group row tight">
                                        <label class="col-md-3 col-form-label">Kode Daftar</label>
                                        <div class="col-md-9">
                                            <input type="text" name="kode_wa" id="kode-wa" class="form-control" placeholder="Masukkan Kode Daftar ..." value="<?= date('Ymd') ?>">
                                        </div>
                                    </div>
                                <?php endif ?>
                                <div class="form-group row tight">
                                    <label class="col-md-3 col-form-label">No. RM</label>
                                    <div class="col-md-9">
                                        <input type="text" name="no_rm" id="no_rm_avsearch" class="form-control avsearch" placeholder="Masukkan No. Rekam Medis ...">
                                    </div>
                                </div>
                                <div class="form-group row tight">
                                    <label class="col-md-3 col-form-label">NIK</label>
                                    <div class="col-md-9">
                                        <input type="text" name="nik" id="nik_avsearch" class="form-control avsearch" placeholder="Masukkan NIK ...">
                                    </div>
                                </div>
                                <div class="form-group row tight">
                                    <label class="col-md-3 col-form-label">Nama</label>
                                    <div class="col-md-9">
                                        <input type="text" name="nama" id="nama_avsearch" class="form-control avsearch" placeholder="Masukkan Nama ...">
                                    </div>
                                </div>
                                <?php if ($this->session->userdata('account_group') === 'Security') : ?>
                                <?php else : ?>
                                <div class="form-group row tight">
                                    <label class="col-md-3 col-form-label">Jenis Kelamin</label>
                                    <div class="col-md-9">
                                        <?php echo form_dropdown('kelamin', $kelamin, array(), 'class="form-control avsearch" id="kelamin_avsearch"') ?>
                                    </div>
                                </div>
                                <?php endif ?>
                                <div class="form-group row tight">
                                    <label class="col-md-3 col-form-label"></label>
                                    <div class="col-md-9">
                                        <button type="button" onclick="pencarianAdvancedPasienList(1)" class="btn btn-info"><i class="fas fa-search mr-1"></i>Cari</button>
                                        <button type="button" onclick="pencarianAdvancedPasienReset()" class="btn btn-secondary"><i class="fas fa-sync-alt mr-1"></i>Reset</button>
                                    </div>
                                </div>
                            </div>
                            <?php if ($this->session->userdata('account_group') === 'Security') : ?>
                            <?php else : ?>
                            <div class="col-md-6">
                                <div class="form-group row tight">
                                    <label class="col-md-3 col-form-label">Tanggal Lahir</label>
                                    <div class="col-md-9">
                                        <input type="text" name="tanggal_lahir" id="tanggal_lahir_avsearch" class="form-control avsearch" placeholder="Pilih Tanggal Lahir ...">
                                    </div>
                                </div>
                                <div class="form-group row tight">
                                    <label class="col-md-3 col-form-label">Umur</label>
                                    <div class="col-md-9">
                                        <input type="text" name="umur" id="umur_avsearch" class="form-control avsearch" placeholder="Masukkan Umur ...">
                                    </div>
                                </div>
                                <div class="form-group row tight">
                                    <label class="col-md-3 col-form-label">Alamat</label>
                                    <div class="col-md-9">
                                        <input type="text" name="alamat" id="alamat_avsearch" class="form-control avsearch" placeholder="Masukkan Alamat ...">
                                    </div>
                                </div>
                                <div class="form-group row tight">
                                    <label class="col-md-3 col-form-label">Telp.</label>
                                    <div class="col-md-9">
                                        <input type="text" name="telp" id="telp_avsearch" class="form-control avsearch" placeholder="Masukkan No. Telp ...">
                                    </div>
                                </div>
                            </div>
                            <?php endif ?>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <h5 class="bold">Hasil Pencarian</h5>
                                    <table id="table_avsearch" class="table table-hover table-striped table-sm color-table info-table">
                                        <thead>
                                            <tr>
                                                <?php if ($this->session->userdata('account_group') === 'Security') : ?>
                                                <th width="5%">Kode Daftar</th>
                                                <th width="15%">Nama</th>
                                                <th class="center" width="7%">No. RM</th>
                                                <th width="7%">NIK</th>
                                                <th width="7%">Tanggal Kunjungan</th>
                                                <th width="10%">Nama Poli</th>
                                                <th width="10%">Nama Dokter</th>
                                                <th width="7%">Cara Bayar</th>
                                                <th width="10%">No Polish</th>
                                                <th width="10%">No Rujukan</th>
                                                <th width="5%">Status Pasien</th>
                                                <th width="5%">Status Layanan</th>
                                                <th width="5%"></th>
                                                <?php else : ?>
                                                <th class="center" width="5%">No. RM</th>
                                                <th width="20%">Nama</th>
                                                <th width="7%">Jenis Kelamin</th>
                                                <th width="10%">Tanggal Lahir</th>
                                                <th width="10%">No. Telp</th>
                                                <th width="40%">Alamat</th>
                                                <th width="5%"></th>
                                                <?php endif ?>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="pagination_avsearch" class="float-left"></div>
                                <div id="summary_avsearch" class="float-right text-sm"></div>
                            </div>
                        </div>
                        <?= form_close() ?>
                    </div>
                    <div class="form-booking-antrian">
                        <?php if ($this->session->userdata('account_group') === 'Security') : ?>
                        <?php else : ?>
                        <?= form_open('', 'id=form-antrean-bpjs role=form class=form-horizontal') ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row tight">
                                    <label class="col-md-3 col-form-label">Kode Booking</label>
                                    <div class="col-md-9">
                                        <input type="text" name="kode_booking_bpjs" id="kode-booking-antrean" class="form-control antrean" placeholder="Masukkan Kode Booking ...">
                                    </div>
                                </div>
                                <div class="form-group row tight">
                                    <label class="col-md-3 col-form-label">No. Antrean</label>
                                    <div class="col-md-9">
                                        <input type="text" name="no_antrean_bpjs" id="no-antrean" class="form-control antrean" placeholder="Masukkan No. Antrean ...">
                                    </div>
                                </div>
                                <div class="form-group row tight">
                                    <label class="col-md-3 col-form-label">NIK</label>
                                    <div class="col-md-9">
                                        <input type="text" name="nik_bpjs" id="nik-antrean" class="form-control antrean" placeholder="Masukkan NIK ...">
                                    </div>
                                </div>
                                <div class="form-group row tight">
                                    <label class="col-md-3 col-form-label"></label>
                                    <div class="col-md-9">
                                        <button type="button" onclick="pencarianAntreanBPJSList(1)" class="btn btn-info"><i class="fas fa-search mr-1"></i>Cari</button>
                                        <button type="button" onclick="pencarianAntreanBPJSReset()" class="btn btn-secondary"><i class="fas fa-sync-alt mr-1"></i>Reset</button>&nbsp;
                                        <?php if ($this->session->userdata('account_group') === 'Pendaftaran' | $this->session->userdata('account_group') === 'Admin Rekam Medis' | $this->session->userdata('account_group') === 'Rekam Medis' | $this->session->userdata('account_group') === 'Admin') : ?>
                                            <?= form_dropdown('filter_advance', $filter_advance, array(), 'id=filter-advance class="btn btn-secondary waves-effect"') ?>&nbsp;
                                         <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <h5 class="bold">Antrean Online BPJS</h5>
                                    <table id="table-antrean-bpjs" class="table table-hover table-striped table-sm color-table info-table">
                                        <thead>
                                            <tr>
                                                <th width="12%">Kode Booking</th>    
                                                <th width="7%">Nomor</th>
                                                <th width="12%">JKN/NON JKN</th>
                                                <th width="12%">Lokasi Daftar</th>
                                                <th width="12%">Poli</th>
                                                <th width="21%">Nama Dokter</th>
                                                <th width="7%"></th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="pagination-anbpjs" class="float-left"></div>
                                <div id="summary-anbpjs" class="float-right text-sm"></div>
                            </div>
                        </div>
                        <?= form_close() ?>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Batal Antrean -->
<div id="modal-batal-antrean" data-backdrop="static" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-batal-antrean-label">Status Batal Antrean</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-batal-antrean role=form class=form-horizontal') ?>
                <input type="hidden" name="page_batal" id="page-batal">
                <input type="hidden" name="id_batal" id="id-batal">
                <input type="hidden" name="tanggal_kunjungan_batal" id="tanggal-kunjungan-batal">
                <input type="hidden" name="kode_batal_dokter" id="kode-batal-dokter">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group row tight">
                            <label class="col-3 col-form-label">Kode Booking:</label>
                            <div class="col">
                                <input type="text" name="kode_batal_booking" class="form-control" id="kode-batal-booking" readonly>
                            </div>
                        </div>
                        <div class="form-group row tight">
                            <label class="col-3 col-form-label">Keterangan Batal:</label>
                            <div class="col">
                               <textarea name="keterangan_batal" id="keterangan-batal" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                
                <?= form_close() ?>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button><button type="button" class="btn btn-info waves-effect" onclick="simpanBatalAntrean()"><i class="fas fa-plus-circle"></i> Simpan</button>
                
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Batal Antrean -->

