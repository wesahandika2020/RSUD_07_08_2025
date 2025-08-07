<script>
    var nomer = 1;
        nomer++;

    function removeList(el) {
        var parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
    } 

    function removeListTable(el) {
        var parent = el.parentNode.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
    }

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

    function lihatFORM_KEP_108_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed;

        if (layanan.bangsal_ic && layanan.no_bed_ic) {
            bed = `${layanan.bangsal_ic} No. Bed ${layanan.no_bed_ic}`;
        } else if (layanan.bangsal && layanan.kelas && layanan.no_ruang && layanan.no_bed) {
            bed = `${layanan.bangsal} kelas ${layanan.kelas} ruang ${layanan.no_ruang} No. Bed ${layanan.no_bed}`;
        }     
       
        let action = 'lihat';
        entriBuktiKondisiSterilisasi(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed, action);
    }

    function editFORM_KEP_108_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed;

        if (layanan.bangsal_ic && layanan.no_bed_ic) {
            bed = `${layanan.bangsal_ic} No. Bed ${layanan.no_bed_ic}`;
        } else if (layanan.bangsal && layanan.kelas && layanan.no_ruang && layanan.no_bed) {
            bed = `${layanan.bangsal} kelas ${layanan.kelas} ruang ${layanan.no_ruang} No. Bed ${layanan.no_bed}`;
        }
        
        let action = 'edit';
        entriBuktiKondisiSterilisasi(layanan.id_pendaftaran, layanan.id, layanan.layanan,  bed,  action);
    }

    function tambahFORM_KEP_108_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed;

        if (layanan.bangsal_ic && layanan.no_bed_ic) {
            bed = `${layanan.bangsal_ic} No. Bed ${layanan.no_bed_ic}`;
        } else if (layanan.bangsal && layanan.kelas && layanan.no_ruang && layanan.no_bed) {
            bed = `${layanan.bangsal} kelas ${layanan.kelas} ruang ${layanan.no_ruang} No. Bed ${layanan.no_bed}`;
        }
        let action = 'tambah';
        entriBuktiKondisiSterilisasi(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed,  action);
    }

    function entriBuktiKondisiSterilisasi(id_pendaftaran, id_layanan_pendaftaran, layanan,  bed, action) {
        // $('#modal_bukti_kondisi_sterilisasi').modal('show');
        // showBuktiKondisiSterilisasi(nomer);
        $('#btn-simpan').hide();

        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        var profesi = '<?= $this->session->userdata('profesi_nadis') ?>';
        if (groupAccount == 'Admin') {
            profesi = 'Perawat';
        }

        if (action !== 'lihat') {
            $('#btn-simpan').show();
        } else {
            $('#btn-simpan').hide();
        } 

        $.ajax({
            type: 'GET',
            url: '<?= base_url("order_operasi/api/Order_operasi/get_data_bukti_kondisi_sterilisasi") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                resetBuktiKondisiSterilisasi(); 
      
                $('#id-layanan-pendaftaran-bks').val(id_layanan_pendaftaran);
                $('#id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-bks').val(id_pendaftaran);
                
                if (data.pasien !== null) {
                    $('#id-pasien-bks').val(data.pasien.id_pasien);
                    $('#nama-pasien-bks').text(data.pasien.nama);

                    // $('#no-rm-bks').text(data.pasien.id);
                    $('#no-rm-bks').text(data.pasien.no_rm);

                    $('#tgl-lahir-bks').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#jenis-kelamin-bks').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));

                    $('#dokter-bks-1').text(data.id_nadis);  

                }


                // TANGGAL
                $('#data-bukti-kondisi-sterilisasi').one('click', function() {
                        $('#tgl-operasi-bks, #edit-tgl-operasi-bks, #tanggal-steril-bks, #edit-tanggal-steril-bks').datetimepicker({
                        format: 'DD/MM/YYYY',
                        maxDate: new Date(),
                        beforeShow: function(i) {
                            if ($(i).attr('readonly')) {
                                return false;
                            }
                        }
                    });
                })

                // JAM
                $('#data-bukti-kondisi-sterilisasi').one('click', function() {
                    $('#jam-mulai-op-bks, #edit-jam-mulai-op-bks, #jam-selesai-op-bks, #edit-jam-selesai-op-bks')
                    .on('click', function() {
                        $(this).timepicker({
                            format: 'HH:mm',
                            showInputs: false,
                            showMeridian: false
                        });
                    })
                })
                
                // Perawat
                $('#data-bukti-kondisi-sterilisasi').one('click', function() {
                    $('#perawat-bks-1,  #edit-perawat-bks-1, #perawat-bks-2,  #edit-perawat-bks-2, #perawat-bks-3,  #edit-perawat-bks-3 , #perawat-bks-4,  #edit-perawat-bks-4, #perawat-bks-5,  #edit-perawat-bks-5')
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

                // Dokter
                $('#data-bukti-kondisi-sterilisasi').one('click', function() {
                    $('#dokter-bks-1, #edit-dokter-bks-1, #dokter-bks-2, #edit-dokter-bks-2, #dokter-bedah')
                    .select2c({
                        ajax: {
                            url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
                            dataType: 'json',
                            quietMillis: 100,
                            data: function(term,
                                page) { // page is the one-based page number tracked by Select2
                                return {
                                    q: term, //search term
                                    page: page, // page number
                                    jenis: 18,
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

                // Nama Operasi
                
                $('#data-bukti-kondisi-sterilisasi').one('click', function() {
                    $('#jenis-nama-operasi-bks, #edit-jenis-nama-operasi-bks').select2c({
                        ajax: {
                            url: "<?= base_url('masterdata/api/masterdata_auto/tarif_pelayanan_auto') ?>",
                            dataType: 'json',
                            quietMillis: 100,
                            data: function (term, page) { // page is the one-based page number tracked by Select2
                                return {
                                    q: term, //search term
                                    jenis_pemeriksaan: 'Pelayanan Pembedahan',
                                    page: page, // page number
                                    kelas: ''
                                };
                            },
                            results: function (data, page) {
                                var more = (page * 20) < data.total; // whether or not there are more results available

                                // notice we return the value of more so Select2 knows if more results can be loaded
                                return {
                                    results: data.data,
                                    more: more
                                };
                            }
                        },
                        formatResult: function (data) {
                            var total = data.total;
                            var kelas = (data.kelas !== null) ? (', kelas ') + data.kelas : '';
                            var markup = '<b>' + data.layanan + '</b> <br/>' + data.jenis + ', ' + data.bobot + ' - ' + kelas + '<br/>' + numberToCurrency(total);
                            return markup;
                        },
                        formatSelection: function (data) {
                            $('#tarif-tindakan').val(data.total);
                            return data.layanan;
                        }
                    })
                })

                
                if (typeof data.bukti_kondisi_sterilisasi !== 'undefined' && data.bukti_kondisi_sterilisasi !== null) {
                    showBBuktiKondisiSterilisasi(data.bukti_kondisi_sterilisasi, id_pendaftaran, id_layanan_pendaftaran, bed, action);
                    showBuktiKondisiSterilisasi(nomer);
                  
                } else {
                    $('#tabel-bks .body-table').empty();
                }
                $('#bed-bks').text(bed);
                
                
				if (action === 'lihat') {
					// Disable semua input dan textarea, kecuali tombol close & tombol cetak
					$('#modal_bukti_kondisi_sterilisasi :input')
						.not('[data-dismiss="modal"], #btn-cetak-bks')
						.prop('disabled', true);

					$('#modal_bukti_kondisi_sterilisasi textarea').prop('readonly', true);
					$('#btn-simpan').hide();

					// Disable select dan Select2
					$('#modal_bukti_kondisi_sterilisasi select')
						.not('[data-dismiss="modal"]')
						.prop('disabled', true)
						.trigger('change.select2c');

					$('#modal_bukti_kondisi_sterilisasi [id^="s2id_"]').css({
						'pointer-events': 'none',
						'opacity': 0.6
					});
				}

                $('#modal_bukti_kondisi_sterilisasi').modal('show');
            },

            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }
          
    function showBuktiKondisiSterilisasi(num) {
        // let html = bukaLebar('FORM BUKTI KONDISI STERILISASI 𖣫');
        let html = bukaLebar(`
            <div style="text-align:center; color:#009688; font-size: 17px; font-weight:bold;">
                🩺 FORM BUKTI KONDISI STERILISASI 𖣫 🏥 <br>👩‍⚕️👨‍⚕️
            </div>
        `);

        html += /* html */ `
            <div class="modal-body">               
                <div class="row">
                    <div class="col-lg-4">
                        <table class="table table-sm table-striped table-bordered">
                            <thead>
                                <tr>
                                    <td colspan="3" style="background-color:rgb(141, 185, 243);"> <b>Ahli Bedah : </b></td>                                     
                                </tr>
                                <tr>   
                                                                     
                                <td>
                                    <input type="text" name="dokter_bks_1" id="dokter-bks-1" class="select2c-input">
                                </td>
                                                              
                                </tr>
                                <tr>
                                    <td colspan="3"> <b>Ahli Anestesiologi :</b></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" name="dokter_bks_2" id="dokter-bks-2" class="select2c-input">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3"> <b>Jenis / Nama Operasi :</b> </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" name="jenis_nama_operasi_bks" id="jenis-nama-operasi-bks" class="select2c-input">
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    </div>

                    <div class="col-lg-4">
                        <table class="table table-sm table-striped table-bordered">
                            <thead>
                                <tr>
                                    <td colspan="3" style="background-color:rgb(141, 185, 243);"> <b>Asisten I : </b></td>                                     
                                </tr>
                                <tr>   
                                    <td>
                                        <input type="text" name="perawat_bks_1" id="perawat-bks-1" class="select2c-input">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3"> <b>Asisten II :</b></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" name="perawat_bks_2" id="perawat-bks-2" class="select2c-input">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3"> <b> Asisten Anestesi :</b> </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" name="perawat_bks_3" id="perawat-bks-3" class="select2c-input">
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    </div>


                    <div class="col-lg-4">
                        <table class="table table-sm table-striped table-bordered">
                            <thead>
                                <tr>
                                    <td colspan="3"style="background-color:rgb(141, 185, 243);"> <b>Instrument : </b></td>                                     
                                </tr>
                                <tr>   
                                    <td>
                                        <input type="text" name="perawat_bks_4" id="perawat-bks-4" class="select2c-input">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3"> <b>Sirkuler :</b></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" name="perawat_bks_5" id="perawat-bks-5" class="select2c-input">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3"> <b> Jenis Anestesi :</b> </td>
                                </tr>
                                <tr>
                                    <td>
                                        <textarea name="jenis_anastesi_bks" id="jenis-anastesi-bks" class="form-control" rows="2"></textarea>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    </div>
         

                    <table class="table table-sm table-striped table-bordered">
                        <thead>
                            <tr>
                                <td colspan="3">
                                    <div class="input-group"><b>Tgl. Operasi :</b><input type="text" name="tgl_operasi_bks" id="tgl-operasi-bks" class="custom-form clear-d-inline-block col-lg-3 ml-2" placeholder="dd/mm/yy"></div>
                                </td>
                                <td colspan="3">
                                    <div class="input-group"><b>Jam Mulai Operasi :</b><input type="text" name="jam_mulai_op_bks" id="jam-mulai-op-bks" class="custom-form clear-d-inline-block col-lg-2 ml-2" placeholder="hh:mm"></div>
                                </td>
                                <td colspan="3">
                                    <div class="input-group"><b>Jam Selesai Operasi :</b><input type="text" name="jam_selesai_op_bks" id="jam-selesai-op-bks" class="custom-form clear-d-inline-block col-lg-2 ml-2" placeholder="hh:mm"></div>
                                </td>
                                <td colspan="3">
                                    <div class="input-group"><b>Lama Operasi : &nbsp;&nbsp;</b><textarea name="lama_operasi_bks" id="lama-operasi-bks" class="form-control" rows="2"></textarea></div>
                                </td>
                            </tr>
                        </thead>
                    </table>


                    <table class="table table-no-border table-sm table-striped">
                        <thead>
                            <tr>
                                <td colspan="3">
                                    <div class="input-group"><b>INDIKATOR STERILISASI &nbsp;&nbsp;</b><textarea name="indikator_sterilisasi_bks" id="indikator-sterilisasi-bks" class="form-control" rows="2"></textarea></div>
                                </td>
                            </tr>
                        </thead>
                    </table>

                    <table class="table table-no-border table-sm table-striped">
                        <thead>
                            <tr>
                                <td colspan="3">
                                    <div class="input-group"><b>Tgl. Steril : &nbsp;&nbsp;</b><input type="text" name="tanggal_steril_bks" id="tanggal-steril-bks" class="custom-form clear-d-inline-block col-lg-1 ml-2" placeholder="dd/mm/yy"></div>
                                </td>
                            </tr>
                        </thead>
                    </table>

                    <table class="table table-no-border table-sm table-striped">
                        <thead>
                            <tr>
                                <td colspan="3">
                                    <div class="input-group"><b>Alat / Item : &nbsp;&nbsp;</b><textarea name="alat_item_bks" id="alat-item-bks" class="form-control" rows="2"></textarea></div>
                                </td>
                            </tr>
                        </thead>
                    </table



                    <tr>
                        <td colspan="3">
                            <button type="button" title="Tambah Bukti Kondisi Sterilisasi" class="btn btn-info" onclick="tambahBuktiKondisiSterilisasi()"><i class="fas fa-arrow-circle-down mr-1"></i> Tambah Bukti Kondisi Sterilisasi</button>
                        </td>
                    </tr>
                    <br>
                    <table class="table table-no-border table-sm table-striped" style="margin-top:15px">
                        <tr>
                            <td>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b style="color: red;">Catatan: Harap diperhatikan setelah mengisi form dan sebelum klik tombol Konfirmasi</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b style="color: red;">Wajib mengklik tombol (Tambah Bukti Kondisi Sterilisasi) terlebih dahulu.</b>
                            </td>
                        </tr>

                    </table>  
                </div>           
            </div>
        `;
        html += tutupRapet();
        $('#buka-tutup-bks').append(html);
        // $('#tambah-alat').empty();  
    }


    function tambahAlatItem() {
        let i = $('.tambah-alat').length;
       
        let html = /* html */ `
            <table class="table table-no-border table-sm table-striped">
                <thead>
                    <tr>
                        <td colspan="3">
                            <div id="tambah-alat${i}" style="vertical-align:middle !important" class="tambah-alat"></div>
                            <div class="input-group">
                                <b>Tgl. Steril : &nbsp;&nbsp;</b>
                                <input type="text" name="tgl_steril_bks_${i}" id="tgl-steril-bks-${i}" class="custom-form clear-d-inline-block col-lg-1 ml-2 datetimepicker" placeholder="DD/MM/YYYY">
                            </div>
                        </td>
                    </tr>
                </thead>
            </table>
            <table class="table table-no-border table-sm table-striped">
                <thead>
                    <tr>
                        <td colspan="3">
                            <div class="input-group">
                                <b>Alat / Item : &nbsp;&nbsp;</b>
                                <textarea name="alat_item_bks_${i}" id="alat-item-bks-${i}" class="form-control" rows="2"></textarea>
                            </div>
                        </td>
                    </tr>
                </thead>
            </table>          
        `;
        $('#tambah-alat').append(html);

        $(`#tgl-steril-bks-${i}`).datetimepicker({
            format: 'DD/MM/YYYY',
            maxDate: new Date(),
            allowInputToggle: true,
            ignoreReadonly: true
        });       
    }

  
    function konfirmasiSimpanBuktiKondisiSterilisasi() {
        swal.fire({
            title: 'Simpan Entri Operasi',
            text: "Apakah anda yakin akan menyimpan data Operasi ini ?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
            cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                simpanBuktiKondisiSterilisasi();
            }
        })
    }

    function simpanBuktiKondisiSterilisasi() {
        var id_pendaftaran = $('#id-pendaftaran-bks').val();
        var id_layanan_pendaftaran = $('#id-layanan-pendaftaran-bks').val(); 
        $.ajax({
            type: 'POST',
            url: '<?= base_url("order_operasi/api/Order_operasi/simpan_data_bukti_kondisi_sterilisasi") ?>',
            data: $('#form_bukti_kondisi_sterilisasi').serialize() + '&id-layanan-pendaftaran-bks=' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },

            success: function(data) {
				if (data.status) {
					messageCustom(data.message, 'Success');

					var dWidth = $(window).width();
					var dHeight = $(window).height();
					var x = screen.width / 2 - dWidth / 2;
					var y = screen.height / 2 - dHeight / 2;
					entriBuktiKondisiSterilisasi(id_pendaftaran, id_layanan_pendaftaran);
					showListForm($('#id-pendaftaran-bks').val(), $('#id-layanan-pendaftaran-bks').val(), $('#id-pasien-bks').val());
				} else {
					messageCustom(data.message, 'Error');
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
 

    function CetakBuktiKondisiSterilisasi(id, id_pendaftaran) {
        window.open('<?= base_url('order_operasi/bukti_kondisi_sterilisasi/') ?>' + id_pendaftaran + '/' + id, 'Bukti Kondisi Sterilisasi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
    }


    // function showBBuktiKondisiSterilisasi(data, id_pendaftaran, id_layanan_pendaftaran, bed, action) {
    //     $('#tabel-bks .body-table').empty();
    //     if (data !== null) {
    //         $.each(data, function(i, v) {
    //             let btnAksesPrint = '';
    //             if (action != 'lihat') {
    //                 btnAksesPrint = '<button type="button" class="btn btn-success btn-xs" onclick="editBuktiKondisiSterilisasi(this, ' +
    //                 v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
    //                 '\')"><i class="fas fa-edit"></i> Edit </button> <button type="button" class="btn btn-warning btn-xs" onclick="hapusBuktiKondisiSterilisasi(this, ' +
    //                 v.id +
    //                 ')"> <i class="fas fa-trash-alt"></i> Hapus </button>';  
    //             }

    //             const selOp =
    //             '<td align="center"> <button id="btn-cetak-bks" type="button" class="btn btn-primary btn-xs" onclick="CetakBuktiKondisiSterilisasi(' +
    //             v.id + ', ' + id_pendaftaran + ')"><i class="fas fa-print"></i> Print </button>' +
    //             btnAksesPrint +
    //             '</td>';         
    //             let html = /* html */ `     
    //                 <tr>
    //                     <td class="number-terapi" align="center">${(++i)}</td>
    //                     <td class="center">${v.tgl_operasi_bks ? datefmysql(v.tgl_operasi_bks) : '-'}</td>
    //                     <td align="center">${v.jam_mulai_op_bks || '-'}</td>                       
    //                     <td align="center">${v.jam_selesai_op_bks || '-'}</td>
    //                     <td align="center">${v.dokter_1 || '-'}</td>                            
    //                     <td align="center">${v.dokter_2 || '-'}</td>
    //                     <td align="center">${v.perawat_3 || '-'}</td>
    //                     <td align="center">${v.perawat_1 || '-'}</td>
    //                     <td align="center">${v.perawat_2 || '-'}</td>
    //                     ${selOp} 
    //                 </tr>
    //             `;
    //             $('#tabel-bks tbody').append(html);
    //             numberBks = i;
    //         })
    //     }
    // }
    // <td align="center">${v.akun_user}</td>

    function showBBuktiKondisiSterilisasi(data, id_pendaftaran, id_layanan_pendaftaran, bed, action) {
        $('#tabel-bks .body-table').empty();
        if (data !== null) {
            $.each(data, function(i, v) {
                let btnAksesPrint = '';
                if (action != 'lihat') {
                    btnAksesPrint = `
                        <button type="button" class="btn btn-success btn-xs me-1" onclick="editBuktiKondisiSterilisasi(this, ${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button type="button" class="btn btn-warning btn-xs me-1" onclick="hapusBuktiKondisiSterilisasi(this, ${v.id})">
                            <i class="fas fa-trash-alt"></i> Hapus
                        </button>
                    `;
                }

                const selOp = `
                    <td align="center">
                        <button id="btn-cetak-bks" type="button" class="btn btn-primary btn-xs me-1" onclick="CetakBuktiKondisiSterilisasi(${v.id}, ${id_pendaftaran})">
                            <i class="fas fa-print"></i> Print
                        </button>
                        ${btnAksesPrint}
                    </td>
                `;

                let html = `
                    <tr>
                        <td class="number-terapi" align="center">${(++i)}</td>
                        <td class="center">${v.tgl_operasi_bks ? datefmysql(v.tgl_operasi_bks) : '-'}</td>
                        <td align="center">${v.jam_mulai_op_bks || '-'}</td>                       
                        <td align="center">${v.jam_selesai_op_bks || '-'}</td>
                        <td align="center">${v.dokter_1 || '-'}</td>                            
                        <td align="center">${v.dokter_2 || '-'}</td>
                        <td align="center">${v.perawat_3 || '-'}</td>
                        <td align="center">${v.perawat_1 || '-'}</td>
                        <td align="center">${v.perawat_2 || '-'}</td>
                        ${selOp} 
                    </tr>
                `;

                $('#tabel-bks tbody').append(html);
                numberBks = i;
            });
        }
    }

    function resetBuktiKondisiSterilisasi() {
        $('#form_bukti_kondisi_sterilisasi')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false);
        
        $('#tgl-operasi-bks').val('');
        $('#tgl-steril-bks').val('');

        $('#buka-tutup-bks').empty();
 
        $('#jam-mulai-op-bks, #jam-selesai-op-bks').val('');

        $('#s2id_perawat-bks-1 a .select2c-chosen, #s2id_perawat-bks-2 a .select2c-chosen, #s2id_perawat-bks-3 a .select2c-chosen, #s2id_perawat-bks-4 a .select2c-chosen, #s2id_perawat-bks-5 a .select2c-chosen').empty();
        
        $('#perawat-bks-1, #perawat-bks-2, #perawat-bks-3, #perawat-bks-4, #perawat-bks-5').val('');

        $('#s2id_dokter-bks-1 a .select2c-chosen, #s2id_dokter-bks-2 a .select2c-chosen').empty();

        $('#dokter-bks-1, #dokter-bks-2').val('');  

        $('#jenis-nama-operasi-bks').val('');
        $('#s2id_jenis-nama-operasi-bks a .select2c-chosen').empty();
       
        setTimeout(() => {
            $('')
                .val('#jenis-anastesi-bks, #lama-operasi-bks, #indikator-sterilisasi-bks, #alat-item-bks');
            $('#form-bks').find('input').each(function() {
                if ($(this).is(':checked')) {
                    $(this).prop('checked', false);
                }
            })
        }, 100)

        // $('#tambah-alat').empty();  
        // $('#buka-tutup-bks').empty();
    }

    function editBuktiKondisiSterilisasi(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed) {   
        const modal = $('#modal-edit-bukti-kondisi-sterilisasi');
        $('#update-bks').children().remove();
        // $('#tambah-alat').children().remove();
        $('#tambah-alat').empty();            
        $('tambah-alat-hide').empty();
        // $(tambahAlatItem()).empty();
    
        $.ajax({
            type: 'GET',
            url: '<?= base_url("order_operasi/api/Order_operasi/get_bukti_kondisi_sterilisasi") ?>/id/' +
                id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#update-bks').empty();
                $('#id-bukti-kondisi-sterilisasi').val(id);
                function formatTanggalKhusus(waktu) {
                    // Memeriksa apakah waktu bukan null
                    if (waktu !== null) {
                        var el = waktu.split('-');
                        var tahun = el[0];
                        var bulan = el[1];
                        var hari = el[2];
                        return hari + '/' + bulan + '/' + tahun;
                    } else {
                        // Mengembalikan nilai default atau melakukan tindakan yang sesuai jika waktu null
                        // return 'Tanggal tidak tersedia'; // Atau, sesuaikan dengan logika Anda
                    }
                }

                let edit_tgl_operasi_bks = formatTanggalKhusus(data.tgl_operasi_bks);
                $('#edit-tgl-operasi-bks').val(edit_tgl_operasi_bks);   

                let edit_tanggal_steril_bks = formatTanggalKhusus(data.tanggal_steril_bks);
                $('#edit-tanggal-steril-bks').val(edit_tanggal_steril_bks);   

                let tgl_steril_bks_0 = (data.tgl_steril_bks_0);
                $('#tgl-steril-bks-0').val(tgl_steril_bks_0);

                let tgl_steril_bks_1 = (data.tgl_steril_bks_1);
                $('#tgl-steril-bks-1').val(tgl_steril_bks_1);

                let tgl_steril_bks_2 = (data.tgl_steril_bks_2);
                $('#tgl-steril-bks-2').val(tgl_steril_bks_2);

                let tgl_steril_bks_3 = (data.tgl_steril_bks_3);
                $('#tgl-steril-bks-3').val(tgl_steril_bks_3);

                let tgl_steril_bks_4 = (data.tgl_steril_bks_4);
                $('#tgl-steril-bks-4').val(tgl_steril_bks_4);

                let tgl_steril_bks_5 = (data.tgl_steril_bks_5);
                $('#tgl-steril-bks-5').val(tgl_steril_bks_5);

                let tgl_steril_bks_6 = (data.tgl_steril_bks_6);
                $('#tgl-steril-bks-6').val(tgl_steril_bks_6);

                let tgl_steril_bks_7 = (data.tgl_steril_bks_7);
                $('#tgl-steril-bks-7').val(tgl_steril_bks_7);

                let tgl_steril_bks_8 = (data.tgl_steril_bks_8);
                $('#tgl-steril-bks-8').val(tgl_steril_bks_8);

                let tgl_steril_bks_9 = (data.tgl_steril_bks_9);
                $('#tgl-steril-bks-9').val(tgl_steril_bks_9);

                let tgl_steril_bks_10 = (data.tgl_steril_bks_10);
                $('#tgl-steril-bks-10').val(tgl_steril_bks_10);

                let tgl_steril_bks_11 = (data.tgl_steril_bks_11);
                $('#tgl-steril-bks-11').val(tgl_steril_bks_11);

                let tgl_steril_bks_12 = (data.tgl_steril_bks_12);
                $('#tgl-steril-bks-12').val(tgl_steril_bks_12);

                let tgl_steril_bks_13 = (data.tgl_steril_bks_13);
                $('#tgl-steril-bks-13').val(tgl_steril_bks_13);

                let tgl_steril_bks_14 = (data.tgl_steril_bks_14);
                $('#tgl-steril-bks-14').val(tgl_steril_bks_14);


                let alat_item_bks_0 = data.alat_item_bks_0 !== null ? data.alat_item_bks_0 : '';
                let alat_item_bks_1 = data.alat_item_bks_1 !== null ? data.alat_item_bks_1 : '';
                let alat_item_bks_2 = data.alat_item_bks_2 !== null ? data.alat_item_bks_2 : '';
                let alat_item_bks_3 = data.alat_item_bks_3 !== null ? data.alat_item_bks_3 : '';
                let alat_item_bks_4 = data.alat_item_bks_4 !== null ? data.alat_item_bks_4 : '';
                let alat_item_bks_5 = data.alat_item_bks_5 !== null ? data.alat_item_bks_5 : '';
                let alat_item_bks_6 = data.alat_item_bks_6 !== null ? data.alat_item_bks_6 : '';
                let alat_item_bks_7 = data.alat_item_bks_7 !== null ? data.alat_item_bks_7 : '';
                let alat_item_bks_8 = data.alat_item_bks_8 !== null ? data.alat_item_bks_8 : '';
                let alat_item_bks_9 = data.alat_item_bks_9 !== null ? data.alat_item_bks_9 : '';
                let alat_item_bks_10 = data.alat_item_bks_10 !== null ? data.alat_item_bks_10 : '';
                let alat_item_bks_11 = data.alat_item_bks_11 !== null ? data.alat_item_bks_11 : '';
                let alat_item_bks_12 = data.alat_item_bks_12 !== null ? data.alat_item_bks_12 : '';
                let alat_item_bks_13 = data.alat_item_bks_13 !== null ? data.alat_item_bks_13 : '';
                let alat_item_bks_14 = data.alat_item_bks_14 !== null ? data.alat_item_bks_14 : '';

                if (tambahAlatItem !== null && tgl_steril_bks_0 !== null && tgl_steril_bks_0 !== "tgl_steril_bks_0" && moment(tgl_steril_bks_0).isValid()) {
                    tgl_steril_bks_0 = moment(tgl_steril_bks_0);
                    let html = /* html */ `
                        <table class="table table-no-border table-sm table-striped">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <div id="tambah-alat${i}" style="vertical-align:middle !important" class="tambah-alat"></div>
                                            <div class="input-group">
                                                <b>Tgl. Steril : &nbsp;&nbsp;</b>
                                                <input type="text" name="tgl_steril_bks_0" id="tgl-steril-bks-0" value="${tgl_steril_bks_0.format('DD/MM/YYYY')}" class="custom-form clear-d-inline-block col-lg-1 ml-2 datetimepicker" placeholder="dd/mm/yy">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                        <table class="table table-no-border table-sm table-striped">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                  
                                        <div class="input-group">
                                            <b>Alat / Item : &nbsp;&nbsp;</b>
                                            <textarea name="alat_item_bks_0" id="alat-item-bks-0" class="form-control" rows="2">${alat_item_bks_0}</textarea>
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    `;
                    $('#tambah-alat').append(html);
                    $('#tgl-steril-bks-0').datetimepicker({
                        format: 'DD/MM/YYYY',
                        maxDate: moment(),
                        allowInputToggle: true,
                        ignoreReadonly: true
                    });
                }

                if (tambahAlatItem !== null && tgl_steril_bks_1 !== null && tgl_steril_bks_1 !== "tgl_steril_bks_1" && moment(tgl_steril_bks_1).isValid()) {
                    tgl_steril_bks_1 = moment(tgl_steril_bks_1);
                    let html = /* html */ `
                        <table class="table table-no-border table-sm table-striped">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <div id="tambah-alat${i}" style="vertical-align:middle !important" class="tambah-alat"></div>
                                            <div class="input-group">
                                                <b>Tgl. Steril : &nbsp;&nbsp;</b>
                                                <input type="text" name="tgl_steril_bks_1" id="tgl-steril-bks-1" value="${tgl_steril_bks_1.format('DD/MM/YYYY')}" class="custom-form clear-d-inline-block col-lg-1 ml-2 datetimepicker" placeholder="dd/mm/yy">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                        <table class="table table-no-border table-sm table-striped">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <div class="input-group">
                                            <b>Alat / Item : &nbsp;&nbsp;</b>
                                            <textarea name="alat_item_bks_1" id="alat-item-bks-1" class="form-control" rows="2">${alat_item_bks_1}</textarea>
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    `;
                    $('#tambah-alat').append(html);
                    $('#tgl-steril-bks-1').datetimepicker({
                        format: 'DD/MM/YYYY',
                        maxDate: moment(),
                        allowInputToggle: true,
                        ignoreReadonly: true
                    });
                }

                if (tambahAlatItem !== null && tgl_steril_bks_2 !== null && tgl_steril_bks_2 !== "tgl_steril_bks_2" && moment(tgl_steril_bks_2).isValid()) {
                    tgl_steril_bks_2 = moment(tgl_steril_bks_2);
                    let html = /* html */ `
                        <table class="table table-no-border table-sm table-striped">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <div id="tambah-alat${i}" style="vertical-align:middle !important" class="tambah-alat"></div>
                                            <div class="input-group">
                                                <b>Tgl. Steril : &nbsp;&nbsp;</b>
                                                <input type="text" name="tgl_steril_bks_2" id="tgl-steril-bks-2" value="${tgl_steril_bks_2.format('DD/MM/YYYY')}" class="custom-form clear-d-inline-block col-lg-1 ml-2 datetimepicker" placeholder="dd/mm/yy">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                        <table class="table table-no-border table-sm table-striped">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <div class="input-group">
                                            <b>Alat / Item : &nbsp;&nbsp;</b>
                                            <textarea name="alat_item_bks_2" id="alat-item-bks-2" class="form-control" rows="2">${alat_item_bks_2}</textarea>
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    `;
                    $('#tambah-alat').append(html);
                    $('#tgl-steril-bks-2').datetimepicker({
                        format: 'DD/MM/YYYY',
                        maxDate: moment(),
                        allowInputToggle: true,
                        ignoreReadonly: true
                    });
                }

                if (tambahAlatItem !== null && tgl_steril_bks_3 !== null && tgl_steril_bks_3 !== "tgl_steril_bks_3" && moment(tgl_steril_bks_3).isValid()) {
                    tgl_steril_bks_3 = moment(tgl_steril_bks_3);
                    let html = /* html */ `
                        <table class="table table-no-border table-sm table-striped">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <div id="tambah-alat${i}" style="vertical-align:middle !important" class="tambah-alat"></div>
                                            <div class="input-group">
                                                <b>Tgl. Steril : &nbsp;&nbsp;</b>
                                                <input type="text" name="tgl_steril_bks_3" id="tgl-steril-bks-3" value="${tgl_steril_bks_3.format('DD/MM/YYYY')}" class="custom-form clear-d-inline-block col-lg-1 ml-2 datetimepicker" placeholder="dd/mm/yy">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                        <table class="table table-no-border table-sm table-striped">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <div class="input-group">
                                            <b>Alat / Item : &nbsp;&nbsp;</b>
                                            <textarea name="alat_item_bks_3" id="alat-item-bks-3" class="form-control" rows="2">${alat_item_bks_3}</textarea>
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    `;
                    $('#tambah-alat').append(html);
                    $('#tgl-steril-bks-3').datetimepicker({
                        format: 'DD/MM/YYYY',
                        maxDate: moment(),
                        allowInputToggle: true,
                        ignoreReadonly: true
                    });
                }

                if (tambahAlatItem !== null && tgl_steril_bks_4 !== null && tgl_steril_bks_4 !== "tgl_steril_bks_4" && moment(tgl_steril_bks_4).isValid()) {
                    tgl_steril_bks_4 = moment(tgl_steril_bks_4);
                    let html = /* html */ `
                        <table class="table table-no-border table-sm table-striped">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <div id="tambah-alat${i}" style="vertical-align:middle !important" class="tambah-alat"></div>
                                            <div class="input-group">
                                                <b>Tgl. Steril : &nbsp;&nbsp;</b>
                                                <input type="text" name="tgl_steril_bks_4" id="tgl-steril-bks-4" value="${tgl_steril_bks_4.format('DD/MM/YYYY')}" class="custom-form clear-d-inline-block col-lg-1 ml-2 datetimepicker" placeholder="dd/mm/yy">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                        <table class="table table-no-border table-sm table-striped">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <div class="input-group">
                                            <b>Alat / Item : &nbsp;&nbsp;</b>
                                            <textarea name="alat_item_bks_4" id="alat-item-bks-4" class="form-control" rows="2">${alat_item_bks_4}</textarea>
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    `;
                    $('#tambah-alat').append(html);
                    $('#tgl-steril-bks-4').datetimepicker({
                        format: 'DD/MM/YYYY',
                        maxDate: moment(),
                        allowInputToggle: true,
                        ignoreReadonly: true
                    });
                }

                if (tambahAlatItem !== null && tgl_steril_bks_5 !== null && tgl_steril_bks_5 !== "tgl_steril_bks_5" && moment(tgl_steril_bks_5).isValid()) {
                    tgl_steril_bks_5 = moment(tgl_steril_bks_5);
                    let html = /* html */ `
                        <table class="table table-no-border table-sm table-striped">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <div id="tambah-alat${i}" style="vertical-align:middle !important" class="tambah-alat"></div>
                                            <div class="input-group">
                                                <b>Tgl. Steril : &nbsp;&nbsp;</b>
                                                <input type="text" name="tgl_steril_bks_5" id="tgl-steril-bks-5" value="${tgl_steril_bks_5.format('DD/MM/YYYY')}" class="custom-form clear-d-inline-block col-lg-1 ml-2 datetimepicker" placeholder="dd/mm/yy">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                        <table class="table table-no-border table-sm table-striped">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <div class="input-group">
                                            <b>Alat / Item : &nbsp;&nbsp;</b>
                                            <textarea name="alat_item_bks_5" id="alat-item-bks-5" class="form-control" rows="2">${alat_item_bks_5}</textarea>
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    `;
                    $('#tambah-alat').append(html);
                    $('#tgl-steril-bks-5').datetimepicker({
                        format: 'DD/MM/YYYY',
                        maxDate: moment(),
                        allowInputToggle: true,
                        ignoreReadonly: true
                    });
                }

                if (tambahAlatItem !== null && tgl_steril_bks_6 !== null && tgl_steril_bks_6 !== "tgl_steril_bks_6" && moment(tgl_steril_bks_6).isValid()) {
                    tgl_steril_bks_6 = moment(tgl_steril_bks_6);
                    let html = /* html */ `
                        <table class="table table-no-border table-sm table-striped">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <div id="tambah-alat${i}" style="vertical-align:middle !important" class="tambah-alat"></div>
                                            <div class="input-group">
                                                <b>Tgl. Steril : &nbsp;&nbsp;</b>
                                                <input type="text" name="tgl_steril_bks_6" id="tgl-steril-bks-6" value="${tgl_steril_bks_6.format('DD/MM/YYYY')}" class="custom-form clear-d-inline-block col-lg-1 ml-2 datetimepicker" placeholder="dd/mm/yy">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                        <table class="table table-no-border table-sm table-striped">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <div class="input-group">
                                            <b>Alat / Item : &nbsp;&nbsp;</b>
                                            <textarea name="alat_item_bks_6" id="alat-item-bks-6" class="form-control" rows="2">${alat_item_bks_6}</textarea>
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    `;
                    $('#tambah-alat').append(html);
                    $('#tgl-steril-bks-6').datetimepicker({
                        format: 'DD/MM/YYYY',
                        maxDate: moment(),
                        allowInputToggle: true,
                        ignoreReadonly: true
                    });
                }

                if (tambahAlatItem !== null && tgl_steril_bks_7 !== null && tgl_steril_bks_7 !== "tgl_steril_bks_7" && moment(tgl_steril_bks_7).isValid()) {
                    tgl_steril_bks_7 = moment(tgl_steril_bks_7);
                    let html = /* html */ `
                        <table class="table table-no-border table-sm table-striped">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <div id="tambah-alat${i}" style="vertical-align:middle !important" class="tambah-alat"></div>
                                            <div class="input-group">
                                                <b>Tgl. Steril : &nbsp;&nbsp;</b>
                                                <input type="text" name="tgl_steril_bks_7" id="tgl-steril-bks-7" value="${tgl_steril_bks_7.format('DD/MM/YYYY')}" class="custom-form clear-d-inline-block col-lg-1 ml-2 datetimepicker" placeholder="dd/mm/yy">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                        <table class="table table-no-border table-sm table-striped">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <div class="input-group">
                                            <b>Alat / Item : &nbsp;&nbsp;</b>
                                            <textarea name="alat_item_bks_7" id="alat-item-bks-7" class="form-control" rows="2">${alat_item_bks_7}</textarea>
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    `;
                    $('#tambah-alat').append(html);
                    $('#tgl-steril-bks-7').datetimepicker({
                        format: 'DD/MM/YYYY',
                        maxDate: moment(),
                        allowInputToggle: true,
                        ignoreReadonly: true
                    });
                }

                if (tambahAlatItem !== null && tgl_steril_bks_8 !== null && tgl_steril_bks_8 !== "tgl_steril_bks_8" && moment(tgl_steril_bks_8).isValid()) {
                    tgl_steril_bks_8 = moment(tgl_steril_bks_8);
                    let html = /* html */ `
                        <table class="table table-no-border table-sm table-striped">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <div id="tambah-alat${i}" style="vertical-align:middle !important" class="tambah-alat"></div>
                                            <div class="input-group">
                                                <b>Tgl. Steril : &nbsp;&nbsp;</b>
                                                <input type="text" name="tgl_steril_bks_8" id="tgl-steril-bks-8" value="${tgl_steril_bks_8.format('DD/MM/YYYY')}" class="custom-form clear-d-inline-block col-lg-1 ml-2 datetimepicker" placeholder="dd/mm/yy">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                        <table class="table table-no-border table-sm table-striped">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <div class="input-group">
                                            <b>Alat / Item : &nbsp;&nbsp;</b>
                                            <textarea name="alat_item_bks_8" id="alat-item-bks-8" class="form-control" rows="2">${alat_item_bks_8}</textarea>
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    `;
                    $('#tambah-alat').append(html);
                    $('#tgl-steril-bks-8').datetimepicker({
                        format: 'DD/MM/YYYY',
                        maxDate: moment(),
                        allowInputToggle: true,
                        ignoreReadonly: true
                    });
                }

                if (tambahAlatItem !== null && tgl_steril_bks_9 !== null && tgl_steril_bks_9 !== "tgl_steril_bks_9" && moment(tgl_steril_bks_9).isValid()) {
                    tgl_steril_bks_9 = moment(tgl_steril_bks_9);
                    let html = /* html */ `
                        <table class="table table-no-border table-sm table-striped">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <div id="tambah-alat${i}" style="vertical-align:middle !important" class="tambah-alat"></div>
                                            <div class="input-group">
                                                <b>Tgl. Steril : &nbsp;&nbsp;</b>
                                                <input type="text" name="tgl_steril_bks_9" id="tgl-steril-bks-9" value="${tgl_steril_bks_9.format('DD/MM/YYYY')}" class="custom-form clear-d-inline-block col-lg-1 ml-2 datetimepicker" placeholder="dd/mm/yy">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                        <table class="table table-no-border table-sm table-striped">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <div class="input-group">
                                            <b>Alat / Item : &nbsp;&nbsp;</b>
                                            <textarea name="alat_item_bks_9" id="alat-item-bks-9" class="form-control" rows="2">${alat_item_bks_9}</textarea>
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    `;
                    $('#tambah-alat').append(html);
                    $('#tgl-steril-bks-9').datetimepicker({
                        format: 'DD/MM/YYYY',
                        maxDate: moment(),
                        allowInputToggle: true,
                        ignoreReadonly: true
                    });
                }

                if (tambahAlatItem !== null && tgl_steril_bks_10 !== null && tgl_steril_bks_10 !== "tgl_steril_bks_10" && moment(tgl_steril_bks_10).isValid()) {
                    tgl_steril_bks_10 = moment(tgl_steril_bks_10);
                    let html = /* html */ `
                        <table class="table table-no-border table-sm table-striped">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <div id="tambah-alat${i}" style="vertical-align:middle !important" class="tambah-alat"></div>
                                            <div class="input-group">
                                                <b>Tgl. Steril : &nbsp;&nbsp;</b>
                                                <input type="text" name="tgl_steril_bks_10" id="tgl-steril-bks-10" value="${tgl_steril_bks_10.format('DD/MM/YYYY')}" class="custom-form clear-d-inline-block col-lg-1 ml-2 datetimepicker" placeholder="dd/mm/yy">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                        <table class="table table-no-border table-sm table-striped">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <div class="input-group">
                                            <b>Alat / Item : &nbsp;&nbsp;</b>
                                            <textarea name="alat_item_bks_10" id="alat-item-bks-10" class="form-control" rows="2">${alat_item_bks_10}</textarea>
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    `;
                    $('#tambah-alat').append(html);
                    $('#tgl-steril-bks-10').datetimepicker({
                        format: 'DD/MM/YYYY',
                        maxDate: moment(),
                        allowInputToggle: true,
                        ignoreReadonly: true
                    });
                }

                if (tambahAlatItem !== null && tgl_steril_bks_11 !== null && tgl_steril_bks_11 !== "tgl_steril_bks_11" && moment(tgl_steril_bks_11).isValid()) {
                    tgl_steril_bks_11 = moment(tgl_steril_bks_11);
                    let html = /* html */ `
                        <table class="table table-no-border table-sm table-striped">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <div id="tambah-alat${i}" style="vertical-align:middle !important" class="tambah-alat"></div>
                                            <div class="input-group">
                                                <b>Tgl. Steril : &nbsp;&nbsp;</b>
                                                <input type="text" name="tgl_steril_bks_11" id="tgl-steril-bks-11" value="${tgl_steril_bks_11.format('DD/MM/YYYY')}" class="custom-form clear-d-inline-block col-lg-1 ml-2 datetimepicker" placeholder="dd/mm/yy">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                        <table class="table table-no-border table-sm table-striped">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <div class="input-group">
                                            <b>Alat / Item : &nbsp;&nbsp;</b>
                                            <textarea name="alat_item_bks_11" id="alat-item-bks-11" class="form-control" rows="2">${alat_item_bks_11}</textarea>
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    `;
                    $('#tambah-alat').append(html);
                    $('#tgl-steril-bks-11').datetimepicker({
                        format: 'DD/MM/YYYY',
                        maxDate: moment(),
                        allowInputToggle: true,
                        ignoreReadonly: true
                    });
                }

                if (tambahAlatItem !== null && tgl_steril_bks_12 !== null && tgl_steril_bks_12 !== "tgl_steril_bks_12" && moment(tgl_steril_bks_12).isValid()) {
                    tgl_steril_bks_12 = moment(tgl_steril_bks_12);
                    let html = /* html */ `
                        <table class="table table-no-border table-sm table-striped">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <div id="tambah-alat${i}" style="vertical-align:middle !important" class="tambah-alat"></div>
                                            <div class="input-group">
                                                <b>Tgl. Steril : &nbsp;&nbsp;</b>
                                                <input type="text" name="tgl_steril_bks_12" id="tgl-steril-bks-12" value="${tgl_steril_bks_12.format('DD/MM/YYYY')}" class="custom-form clear-d-inline-block col-lg-1 ml-2 datetimepicker" placeholder="dd/mm/yy">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                        <table class="table table-no-border table-sm table-striped">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <div class="input-group">
                                            <b>Alat / Item : &nbsp;&nbsp;</b>
                                            <textarea name="alat_item_bks_12" id="alat-item-bks-12" class="form-control" rows="2">${alat_item_bks_12}</textarea>
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    `;
                    $('#tambah-alat').append(html);
                    $('#tgl-steril-bks-12').datetimepicker({
                        format: 'DD/MM/YYYY',
                        maxDate: moment(),
                        allowInputToggle: true,
                        ignoreReadonly: true
                    });
                }

                if (tambahAlatItem !== null && tgl_steril_bks_13 !== null && tgl_steril_bks_13 !== "tgl_steril_bks_13" && moment(tgl_steril_bks_13).isValid()) {
                    tgl_steril_bks_13 = moment(tgl_steril_bks_13);
                    let html = /* html */ `
                        <table class="table table-no-border table-sm table-striped">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <div id="tambah-alat${i}" style="vertical-align:middle !important" class="tambah-alat"></div>
                                            <div class="input-group">
                                                <b>Tgl. Steril : &nbsp;&nbsp;</b>
                                                <input type="text" name="tgl_steril_bks_13" id="tgl-steril-bks-13" value="${tgl_steril_bks_13.format('DD/MM/YYYY')}" class="custom-form clear-d-inline-block col-lg-1 ml-2 datetimepicker" placeholder="dd/mm/yy">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                        <table class="table table-no-border table-sm table-striped">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <div class="input-group">
                                            <b>Alat / Item : &nbsp;&nbsp;</b>
                                            <textarea name="alat_item_bks_13" id="alat-item-bks-13" class="form-control" rows="2">${alat_item_bks_13}</textarea>
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    `;
                    $('#tambah-alat').append(html);
                    $('#tgl-steril-bks-13').datetimepicker({
                        format: 'DD/MM/YYYY',
                        maxDate: moment(),
                        allowInputToggle: true,
                        ignoreReadonly: true
                    });
                }

                if (tambahAlatItem !== null && tgl_steril_bks_14 !== null && tgl_steril_bks_14 !== "tgl_steril_bks_14" && moment(tgl_steril_bks_14).isValid()) {
                    tgl_steril_bks_14 = moment(tgl_steril_bks_14);
                    let html = /* html */ `
                        <table class="table table-no-border table-sm table-striped">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <div id="tambah-alat${i}" style="vertical-align:middle !important" class="tambah-alat"></div>
                                            <div class="input-group">
                                                <b>Tgl. Steril : &nbsp;&nbsp;</b>
                                                <input type="text" name="tgl_steril_bks_14" id="tgl-steril-bks-14" value="${tgl_steril_bks_14.format('DD/MM/YYYY')}" class="custom-form clear-d-inline-block col-lg-1 ml-2 datetimepicker" placeholder="dd/mm/yy">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                        <table class="table table-no-border table-sm table-striped">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <div class="input-group">
                                            <b>Alat / Item : &nbsp;&nbsp;</b>
                                            <textarea name="alat_item_bks_14" id="alat-item-bks-14" class="form-control" rows="2">${alat_item_bks_14}</textarea>
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    `;
                    $('#tambah-alat').append(html);
                    $('#tgl-steril-bks-14').datetimepicker({
                        format: 'DD/MM/YYYY',
                        maxDate: moment(),
                        allowInputToggle: true,
                        ignoreReadonly: true
                    });
                }

                let cttntndkn = '';
                cttntndkn =
                    `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-bukti-kondisi-sterilisasi').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>

                    <button type="button" class="btn btn-info waves-effect" onclick="updateBuktiKondisiSterilisasi(${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')"><i class="fas fa-save mr-1"></i>Update</button>`;
                $('#update-bks').append(cttntndkn);

                $('#edit-dokter-bks-1').val(data.dokter_bks_1);
                $('#s2id_edit-dokter-bks-1 a .select2c-chosen').html(data.dokter_1);
                $('#edit-dokter-bks-2').val(data.dokter_bks_2);
                $('#s2id_edit-dokter-bks-2 a .select2c-chosen').html(data.dokter_2);      
                
                $('#edit-jenis-nama-operasi-bks').val(data.jenis_nama_operasi_bks);
                $('#s2id_edit-jenis-nama-operasi-bks a .select2c-chosen').html(data.jenis_nama_operasi)

                $('#edit-perawat-bks-1').val(data.perawat_bks_1);
                $('#s2id_edit-perawat-bks-1 a .select2c-chosen').html(data.perawat_1);
                $('#edit-perawat-bks-2').val(data.perawat_bks_2);
                $('#s2id_edit-perawat-bks-2 a .select2c-chosen').html(data.perawat_2); 
                $('#edit-perawat-bks-3').val(data.perawat_bks_3);
                $('#s2id_edit-perawat-bks-3 a .select2c-chosen').html(data.perawat_3);
                $('#edit-perawat-bks-4').val(data.perawat_bks_4);
                $('#s2id_edit-perawat-bks-4 a .select2c-chosen').html(data.perawat_4);  
                $('#edit-perawat-bks-5').val(data.perawat_bks_5);
                $('#s2id_edit-perawat-bks-5 a .select2c-chosen').html(data.perawat_5); 

                $('#edit-jenis-anastesi-bks').val(data.jenis_anastesi_bks);
                $('#edit-jam-mulai-op-bks').val(data.jam_mulai_op_bks);
                $('#edit-jam-selesai-op-bks').val(data.jam_selesai_op_bks);
                $('#edit-lama-operasi-bks').val(data.lama_operasi_bks);

                $('#edit-indikator-sterilisasi-bks').val(data.indikator_sterilisasi_bks);
                $('#edit-alat-item-bks').val(data.alat_item_bks);
                modal.modal('show');           
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }

    if (typeof numberBks === 'undefined') {
        var numberBks = 1;
    }

    function tambahBuktiKondisiSterilisasi() {      
        if ($('#tgl-operasi-bks').val() === '') {
            syams_validation('#tgl-operasi-bks', 'Tanggal Operasi harus diisi.');
            return false;
        } else {
            syams_validation_remove('#tgl-operasi-bks');
        }

        if ($('#tanggal-steril-bks').val() === '') {
            syams_validation('#tanggal-steril-bks', 'Tanggal Steril harus diisi.');
            return false;
        } else {
            syams_validation_remove('#tanggal-steril-bks');
        }

        if ($('#dokter-bks-1').val() === '') {
            syams_validation('#dokter-bks-1', 'Ahli Bedah harus diisi.');
            return false;
        } else {
            syams_validation_remove('#dokter-bks-1');
        }

        if ($('#dokter-bks-2').val() === '') {
            syams_validation('#dokter-bks-2', 'Ahli Anestesiologi harus diisi.');
            return false;
        } else {
            syams_validation_remove('#dokter-bks-2');
        }

        if ($('#jenis-nama-operasi-bks').val() === '') {
            syams_validation('#jenis-nama-operasi-bks', 'Jenis/nama operasi harus diisi.');
            return false;
        } else {
            syams_validation_remove('#jenis-nama-operasi-bks');
        }

        let html = '';
        let tgl_operasi_bks = $('#tgl-operasi-bks').val();  
        let tanggal_steril_bks = $('#tanggal-steril-bks').val();
        let tgl_steril_bks_0 = $('#tgl-steril-bks-0').val();
        let tgl_steril_bks_1 = $('#tgl-steril-bks-1').val();
        let tgl_steril_bks_2 = $('#tgl-steril-bks-2').val();
        let tgl_steril_bks_3 = $('#tgl-steril-bks-3').val();
        let tgl_steril_bks_4 = $('#tgl-steril-bks-4').val();
        let tgl_steril_bks_5 = $('#tgl-steril-bks-5').val();
        let tgl_steril_bks_6 = $('#tgl-steril-bks-6').val();
        let tgl_steril_bks_7 = $('#tgl-steril-bks-7').val();
        let tgl_steril_bks_8 = $('#tgl-steril-bks-8').val();
        let tgl_steril_bks_9 = $('#tgl-steril-bks-9').val();
        let tgl_steril_bks_10 = $('#tgl-steril-bks-10').val();
        let tgl_steril_bks_11 = $('#tgl-steril-bks-11').val();
        let tgl_steril_bks_12 = $('#tgl-steril-bks-12').val();
        let tgl_steril_bks_13 = $('#tgl-steril-bks-13').val();
        let tgl_steril_bks_14 = $('#tgl-steril-bks-14').val();
        
        let alat_item_bks_0 = $('#alat-item-bks-0').val();
        let alat_item_bks_1 = $('#alat-item-bks-1').val();
        let alat_item_bks_2 = $('#alat-item-bks-2').val();
        let alat_item_bks_3 = $('#alat-item-bks-3').val();
        let alat_item_bks_4 = $('#alat-item-bks-4').val();
        let alat_item_bks_5 = $('#alat-item-bks-5').val();
        let alat_item_bks_6 = $('#alat-item-bks-6').val();
        let alat_item_bks_7 = $('#alat-item-bks-7').val();
        let alat_item_bks_8 = $('#alat-item-bks-8').val();
        let alat_item_bks_9 = $('#alat-item-bks-9').val();
        let alat_item_bks_10 = $('#alat-item-bks-10').val();
        let alat_item_bks_11 = $('#alat-item-bks-11').val();
        let alat_item_bks_12 = $('#alat-item-bks-12').val();
        let alat_item_bks_13 = $('#alat-item-bks-13').val();
        let alat_item_bks_14 = $('#alat-item-bks-14').val();
       
        let dokter_1 = $('#s2id_dokter-bks-1 a .select2c-chosen').html();   
        let dokter_bks_1 = $('#dokter-bks-1').val();
        let dokter_2 = $('#s2id_dokter-bks-2 a .select2c-chosen').html();   
        let dokter_bks_2 = $('#dokter-bks-2').val();
        let jenis_nama_operasi = $('#s2id_jenis-nama-operasi-bks a .select2c-chosen').html();   
        let jenis_nama_operasi_bks = $('#jenis-nama-operasi-bks').val();
        let perawat_1 = $('#s2id_perawat-bks-1 a .select2c-chosen').html();   
        let perawat_bks_1 = $('#perawat-bks-1').val();
        let perawat_2 = $('#s2id_perawat-bks-2 a .select2c-chosen').html();   
        let perawat_bks_2 = $('#perawat-bks-2').val();
        let perawat_3 = $('#s2id_perawat-bks-3 a .select2c-chosen').html();   
        let perawat_bks_3 = $('#perawat-bks-3').val();
        let perawat_4 = $('#s2id_perawat-bks-4 a .select2c-chosen').html();   
        let perawat_bks_4 = $('#perawat-bks-4').val();
        let perawat_5 = $('#s2id_perawat-bks-5 a .select2c-chosen').html();   
        let perawat_bks_5 = $('#perawat-bks-5').val();
        let jenis_anastesi_bks = $('#jenis-anastesi-bks').val();
        let jam_mulai_op_bks = $('#jam-mulai-op-bks').val();
        let jam_selesai_op_bks = $('#jam-selesai-op-bks').val();
        let lama_operasi_bks = $('#lama-operasi-bks').val();
        let indikator_sterilisasi_bks = $('#indikator-sterilisasi-bks').val();
        let alat_item_bks = $('#alat-item-bks').val();
        html = /* html */ `
            <tr class="row-in-${++numberBks}">
                <td class="number-pengkajian" align="center">${numberBks++}</td>
                <td align="center">
                    <input type="hidden" name="tgl_operasi_bks[]" value="${tgl_operasi_bks}">${tgl_operasi_bks}
                </td>
                <td align="center">
                    <input type="hidden" name="jam_mulai_op_bks[]" value="${jam_mulai_op_bks}">${jam_mulai_op_bks}
                </td>
                <td align="center">
                    <input type="hidden" name="jam_selesai_op_bks[]" value="${jam_selesai_op_bks}">${jam_selesai_op_bks}
                </td>
                <td align="center">
                    <input type="hidden" name="dokter_bks_1[]" value="${dokter_bks_1}">${dokter_1}
                </td>
                <td align="center">
                    <input type="hidden" name="dokter_bks_2[]" value="${dokter_bks_2}">${dokter_2}
                </td>
                <td align="center">
                    <input type="hidden" name="perawat_bks_1[]" value="${perawat_bks_1}">${perawat_1}
                </td>
                <td align="center">
                    <input type="hidden" name="perawat_bks_2[]" value="${perawat_bks_2}">${perawat_2}
                </td>
                <td align="center">
                    <input type="hidden" name="perawat_bks_3[]" value="${perawat_bks_3}">${perawat_3}
                </td>
                
                <td align="center">
                    <input type="hidden" name="user_pengkajian[]" value="<?= $this->session->userdata("id_translucent") ?>">
                    <input type="hidden" name="pengkajian_date_bukti_kondisi[]" value="<?= date("Y-m-d H:i:s") ?>"> 
                    <input type="hidden" name="perawat_bks_4[]" value="${perawat_bks_4}">
                    <input type="hidden" name="perawat_bks_5[]" value="${perawat_bks_5}">
                    <input type="hidden" name="jenis_nama_operasi_bks[]" value="${jenis_nama_operasi_bks}">                   
                    <input type="hidden" name="jenis_anastesi_bks[]" value="${jenis_anastesi_bks}">
                    <input type="hidden" name="lama_operasi_bks[]" value="${lama_operasi_bks}">
                    <input type="hidden" name="indikator_sterilisasi_bks[]" value="${indikator_sterilisasi_bks}">
                    <input type="hidden" name="alat_item_bks[]" value="${alat_item_bks}">
                    <input type="hidden" name="tanggal_steril_bks[]" value="${tanggal_steril_bks}">                    
                    <input type="hidden" name="tgl_steril_bks_0[]" value="${tgl_steril_bks_0}">   
                    <input type="hidden" name="tgl_steril_bks_1[]" value="${tgl_steril_bks_1}">   
                    <input type="hidden" name="tgl_steril_bks_2[]" value="${tgl_steril_bks_2}">   
                    <input type="hidden" name="tgl_steril_bks_3[]" value="${tgl_steril_bks_3}">   
                    <input type="hidden" name="tgl_steril_bks_4[]" value="${tgl_steril_bks_4}">   
                    <input type="hidden" name="tgl_steril_bks_5[]" value="${tgl_steril_bks_5}">   
                    <input type="hidden" name="tgl_steril_bks_6[]" value="${tgl_steril_bks_6}">   
                    <input type="hidden" name="tgl_steril_bks_7[]" value="${tgl_steril_bks_7}">   
                    <input type="hidden" name="tgl_steril_bks_8[]" value="${tgl_steril_bks_8}">   
                    <input type="hidden" name="tgl_steril_bks_9[]" value="${tgl_steril_bks_9}">   
                    <input type="hidden" name="tgl_steril_bks_10[]" value="${tgl_steril_bks_10}">   
                    <input type="hidden" name="tgl_steril_bks_11[]" value="${tgl_steril_bks_11}">   
                    <input type="hidden" name="tgl_steril_bks_12[]" value="${tgl_steril_bks_12}">   
                    <input type="hidden" name="tgl_steril_bks_13[]" value="${tgl_steril_bks_13}">   
                    <input type="hidden" name="tgl_steril_bks_14[]" value="${tgl_steril_bks_14}">                      
                    <input type="hidden" name="alat_item_bks_0[]" value="${alat_item_bks_0}">
                    <input type="hidden" name="alat_item_bks_1[]" value="${alat_item_bks_1}">
                    <input type="hidden" name="alat_item_bks_2[]" value="${alat_item_bks_2}">
                    <input type="hidden" name="alat_item_bks_3[]" value="${alat_item_bks_3}">
                    <input type="hidden" name="alat_item_bks_4[]" value="${alat_item_bks_4}">
                    <input type="hidden" name="alat_item_bks_5[]" value="${alat_item_bks_5}">
                    <input type="hidden" name="alat_item_bks_6[]" value="${alat_item_bks_6}">
                    <input type="hidden" name="alat_item_bks_7[]" value="${alat_item_bks_7}">
                    <input type="hidden" name="alat_item_bks_8[]" value="${alat_item_bks_8}">
                    <input type="hidden" name="alat_item_bks_9[]" value="${alat_item_bks_9}">
                    <input type="hidden" name="alat_item_bks_10[]" value="${alat_item_bks_10}">
                    <input type="hidden" name="alat_item_bks_11[]" value="${alat_item_bks_11}">
                    <input type="hidden" name="alat_item_bks_12[]" value="${alat_item_bks_12}">
                    <input type="hidden" name="alat_item_bks_13[]" value="${alat_item_bks_13}">
                    <input type="hidden" name="alat_item_bks_14[]" value="${alat_item_bks_14}">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        `;
        $('#tabel-bks .body-table').append(html);
    }

    // <!?= $this->session->userdata('nama') ?>

    // function updateBuktiKondisiSterilisasi(id_pendaftaran, id_layanan_pendaftaran, bed) {
    //     $('#buka-tutup-bks').children().remove(); 
    //     $.ajax({
    //         type: 'PUT',
    //         url: '<?= base_url("order_operasi/api/Order_operasi/update_bukti_kondisi_sterilisasi") ?>',
    //         data: $('#form-edit-bukti-kondisi-sterilisasi').serialize(),
    //         cache: false,
    //         dataType: 'JSON',
    //         success: function(data) {
    //             if (data.status) {
    //                 messageEditSuccess();
    //                 entriBuktiKondisiSterilisasi(id_pendaftaran, id_layanan_pendaftaran, bed);
    //             } else {
    //                 messageEditFailed();
    //             }
    //             $('#modal-edit-bukti-kondisi-sterilisasi').modal('hide');
    //         },
    //         error: function(e) {
    //             messageEditFailed();
    //         }
    //     });
    // }

    // function hapusBuktiKondisiSterilisasi(obj, id) {
    //     // console.log(obj, id)
    //     bootbox.dialog({
    //         message: "Anda yakin akan menghapus data ini?",
    //         title: "Hapus Data",
    //         buttons: {
    //             batal: {
    //                 label: '<i class="fas fa-times-circle mr-1"></i>Batal',
    //                 className: "btn-secondary",
    //                 callback: function() {
    //                 }
    //             },
    //             hapus: {
    //                 label: '<i class="fas fa-trash-alt mr-1"></i>Hapus',
    //                 className: "btn-info",
    //                 callback: function() {
    //                     $.ajax({
    //                         type: 'DELETE',
    //                         url: '<?= base_url("order_operasi/api/Order_operasi/hapus_bukti_kondisi_sterilisasi") ?>/' +
    //                             id,
    //                         cache: false,
    //                         dataType: 'JSON',
    //                         success: function(data) {
    //                             if (data.status) {
    //                                 messageCustom(data.message, 'Success');
    //                                 removeList(obj);
    //                             } else {
    //                                 customAlert('Hapus Bukti Kondisi Sterilisasi', data
    //                                     .message);
    //                             }
    //                         },
    //                         error: function(e) {
    //                             messageDeleteFailed();
    //                         }
    //                     });
    //                 }
    //             }
    //         }
    //     });
    // }

    function updateBuktiKondisiSterilisasi(id_pendaftaran, id_layanan_pendaftaran, bed) {
        $('#buka-tutup-bks').children().remove(); 
        // Ambil ID user dari input hidden
        const id_user = $('#id-user').val();

        $.ajax({
            type: 'PUT',
            url: '<?= base_url("order_operasi/api/Order_operasi/update_bukti_kondisi_sterilisasi") ?>',
            data: $('#form-edit-bukti-kondisi-sterilisasi').serialize() + '&id_user=' + id_user, // tetap kirim juga kalau butuh
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                console.log('User yang update:', id_user); // debug

                if (data.status) {
                    messageEditSuccess();
                    entriBuktiKondisiSterilisasi(id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    messageEditFailed();
                }
                $('#modal-edit-bukti-kondisi-sterilisasi').modal('hide');
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    function hapusBuktiKondisiSterilisasi(obj, id) {
        const id_user = $('#id-user').val();
        bootbox.dialog({
            message: "Anda yakin akan menghapus data ini?",
            title: "Hapus Data",
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {}
                },
                hapus: {
                    label: '<i class="fas fa-trash-alt mr-1"></i>Hapus',
                    className: "btn-info",
                    callback: function() {
                        $.ajax({
                            type: 'DELETE',
                            url: '<?= base_url("order_operasi/api/Order_operasi/hapus_bukti_kondisi_sterilisasi") ?>/' + id,
                            data: { id_user: id_user }, // kirim id_user
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                            console.log('User yang hapus:', id_user); // debug

                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    obj.closest('tr').remove();
                                } else {
                                    customAlert('Hapus Data', data.message);
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