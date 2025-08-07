<!-- // PR -->
<script>
    var nomer = 1;
        nomer++;
   
        $('#btn-expand-all-pengkajian-restrain').click(function() {
            $('.multi-collapse').addClass('show');
        });

        $('#btn-collapse-all-pengkajian-restrain').click(function() {
            $('.multi-collapse').removeClass('show');
        });
        
        $("#wizard-pengkajian-restrain").bwizard();

        // PERAWAT OR BIDAN // PR
        $('#perawat-bidan-pr').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
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
        
        // PRR
        function removeList(el) {
           var parent = el.parentNode.parentNode;
            parent.parentNode.removeChild(parent);
        } 

        // PRR
        function removeListTable(el) {
            var parent = el.parentNode.parentNode.parentNode;
            parent.parentNode.removeChild(parent);
        }

        // PRR
        function timerzmysql(waktu) {
            var tm = waktu.split(':');
            return tm[0] + ':' + tm[1];
        }

        // PRR
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

        // PRR
        function tutupRapet(title, num) {
            let html = /* html */ `
                            </div>
                        </div>
                    </div>
                </div>
            `;

            return html;
        }    

        function lihatFORM_KEP_105_00(data) {
            let pasien = data.pasien;
            let layanan = data.layanan;
            let bed;

            if (layanan.bangsal_ic && layanan.no_bed_ic) {
                bed = `${layanan.bangsal_ic} No. Bed ${layanan.no_bed_ic}`;
            } else if (layanan.bangsal && layanan.kelas && layanan.no_ruang && layanan.no_bed) {
                bed = `${layanan.bangsal} kelas ${layanan.kelas} ruang ${layanan.no_ruang} No. Bed ${layanan.no_bed}`;
            } else {
                bed = `${layanan.jenis_layanan}`;
            }
            
            let action = 'lihat';
            entriPengkajianRestrain(layanan.id_pendaftaran, layanan.id, layanan.layanan, layanan.tanggal_layanan, bed, action);
        }

        function editFORM_KEP_105_00(data) {
            let pasien = data.pasien;
            let layanan = data.layanan;
            let bed;

            if (layanan.bangsal_ic && layanan.no_bed_ic) {
                bed = `${layanan.bangsal_ic} No. Bed ${layanan.no_bed_ic}`;
            } else if (layanan.bangsal && layanan.kelas && layanan.no_ruang && layanan.no_bed) {
                bed = `${layanan.bangsal} kelas ${layanan.kelas} ruang ${layanan.no_ruang} No. Bed ${layanan.no_bed}`;
            } else {
                bed = `${layanan.jenis_layanan}`;
            }
            
            let action = 'edit';
            entriPengkajianRestrain(layanan.id_pendaftaran, layanan.id, layanan.layanan, layanan.tanggal_layanan, bed, action);
        }

        function tambahFORM_KEP_105_00(data) {
            let pasien = data.pasien;
            let layanan = data.layanan;
            let bed;

            if (layanan.bangsal_ic && layanan.no_bed_ic) {
                bed = `${layanan.bangsal_ic} No. Bed ${layanan.no_bed_ic}`;
            } else if (layanan.bangsal && layanan.kelas && layanan.no_ruang && layanan.no_bed) {
                bed = `${layanan.bangsal} kelas ${layanan.kelas} ruang ${layanan.no_ruang} No. Bed ${layanan.no_bed}`;
            } else {
                bed = `${layanan.jenis_layanan}`;
            }
            
            let action = 'tambah';
            entriPengkajianRestrain(layanan.id_pendaftaran, layanan.id, layanan.layanan, layanan.tanggal_layanan, bed, action);
        }
       
        // PRR 
        function showPemantauanRestrain(num) {
            let html = bukaLebar('Form Pemantauan Restrain', num);
            html += /* html */ `
                <div class="from-group">
                    <label for="pr-tanggal-pemantauan">Tanggal Tindakan : </label>
                    <input type="text" name="pr_tanggal_pemantauan"id="pr-tanggal-pemantauan" class="custom-form clear-input d-inline-block col-lg-3 ml-2" placeholder="dd/mm/yyyy">
                </div>
                <hr>
                <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-pr">
                    <thead>
                        <tr>
                            <th class="center" rowspan="2"><b>Tindakan</b></th>
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
                            <td>Posisi Restrain</td> 
                            <td class="center"><input type="checkbox" name="posisi_p_ho" id="posisi-p-ho"></td>
                            <td class="center"><input type="checkbox" name="posisi_p_10" id="posisi-p-10"></td>
                            <td class="center"><input type="checkbox" name="posisi_s_ho" id="posisi-s-ho"></td>
                            <td class="center"><input type="checkbox" name="posisi_s_18" id="posisi-s-18"></td>
                            <td class="center"><input type="checkbox" name="posisi_m_ho" id="posisi-m-ho"></td>
                            <td class="center"><input type="checkbox" name="posisi_m_23" id="posisi-m-23"></td>
                            <td class="center"><input type="checkbox" name="posisi_m_4" id="posisi-m-4"></td>
                        </tr>
                        <tr>
                            <td>Edukasi kepada pasien dan keluarga</td>
                            <td class="center"><input type="checkbox" name="edukasi_p_ho" id="edukasi-p-ho"></td>
                            <td class="center"><input type="checkbox" name="edukasi_p_10" id="edukasi-p-10"></td>
                            <td class="center"><input type="checkbox" name="edukasi_s_ho" id="edukasi-s-ho"></td>
                            <td class="center"><input type="checkbox" name="edukasi_s_18" id="edukasi-s-18"></td>
                            <td class="center"><input type="checkbox" name="edukasi_m_ho" id="edukasi-m-ho"></td>
                            <td class="center"><input type="checkbox" name="edukasi_m_23" id="edukasi-m-23"></td>
                            <td class="center"><input type="checkbox" name="edukasi_m_4" id="edukasi-m-4"></td>
                        </tr>
                        <tr>
                            <td>Cedera pada pasien</td>
                            <td class="center"><input type="checkbox" name="cedera_p_ho" id="cedera-p-ho"></td>
                            <td class="center"><input type="checkbox" name="cedera_p_10" id="cedera-p-10"></td>
                            <td class="center"><input type="checkbox" name="cedera_s_ho" id="cedera-s-ho"></td>
                            <td class="center"><input type="checkbox" name="cedera_s_18" id="cedera-s-18"></td>
                            <td class="center"><input type="checkbox" name="cedera_m_ho" id="cedera-m-ho"></td>
                            <td class="center"><input type="checkbox" name="cedera_m_23" id="cedera-m-23"></td>
                            <td class="center"><input type="checkbox" name="cedera_m_4" id="cedera-m-4"></td>
                        </tr>
                        <tr>
                            <td>Restrain di longgarkan setiap jam 2 selama 15 menit </td>
                            <td class="center"><input type="checkbox" name="restrain_p_ho" id="restrain-p-ho"></td>
                            <td class="center"><input type="checkbox" name="restrain_p_10" id="restrain-p-10"></td>
                            <td class="center"><input type="checkbox" name="restrain_s_ho" id="restrain-s-ho"></td>
                            <td class="center"><input type="checkbox" name="restrain_s_18" id="restrain-s-18"></td>
                            <td class="center"><input type="checkbox" name="restrain_m_ho" id="restrain-m-ho"></td>
                            <td class="center"><input type="checkbox" name="restrain_m_23" id="restrain-m-23"></td>
                            <td class="center"><input type="checkbox" name="restrain_m_4" id="restrain-m-4"></td>
                        </tr>               
                        <tr>
                            <td class="bold">Paraf</td>
                            <td class="center"><input type="checkbox" name="ttd_p_ho" id="ttd-p-ho"></td>
                            <td class="center"><input type="checkbox" name="ttd_p_10" id="ttd-p-10"></td>
                            <td class="center"><input type="checkbox" name="ttd_s_ho" id="ttd-s-ho"></td>
                            <td class="center"><input type="checkbox" name="ttd_s_18" id="ttd-s-18"></td>
                            <td class="center"><input type="checkbox" name="ttd_m_ho" id="ttd-m-ho"></td>
                            <td class="center"><input type="checkbox" name="ttd_m_23" id="ttd-m-23"></td>
                            <td class="center"><input type="checkbox" name="ttd_m_4" id="ttd-m-4"></td>
                        </tr>
                        <tr>
                            <td class="bold">Perawat</td>
                            <td colspan="2">
                                <div class="input-group">
                                    <input type="text" name="inisial_perawat_1" id= "inisial-perawat-1" class="select2c-input ml-2">  
                                </div>
                            </td>
                            <td colspan="2">
                                <div class="input-group">
                                    <input type="text" name="inisial_perawat_2" id= "inisial-perawat-2" class="select2c-input ml-2">
                                </div>
                            </td>
                            <td colspan="3">
                                <div class="input-group">
                                    <input type="text" name="inisial_perawat_3" id= "inisial-perawat-3" class="select2c-input ml-2">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <button type="button" title="Tambah Pemantauan Restrain" class="btn btn-info" onclick="tambahPemantauanRestrain()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Pemantauan Restrain</button>
                            </td>
                        </tr>
                    </tbody>
                </table>`;
            html += tutupRapet();
            $('#buka-tutup-pr').append(html);
        }     

        // PR +
        function entriPengkajianRestrain(id_pendaftaran, id_layanan_pendaftaran, layanan, tanggal, bed, action ) {
            // $('#modal_pengkajian_restrain').modal('show');  

            $('#wizard-pengkajian-restrain').bwizard('show', '0');

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
                url: '<?= base_url("pelayanan/api/pelayanan/get_data_pengkajian_restrain") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function (data) {

                    console.log(data);

                    resetFormPengkajianRestrian(); 
                    // resetFormPemantauanRestrian(); 
                    $('#id-layanan-pendaftaran-pr').val(id_layanan_pendaftaran);
                    // $('#id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                    $('#id-pendaftaran-pr').val(id_pendaftaran);
                    if (data.pasien !== null) {
                        $('#id-pasien-pr').val(data.pasien.id_pasien);
                        $('#nama-pasien-pr').text(data.pasien.nama);
                        $('#no-pr').text(data.pasien.no_rm);
                        $('#tanggal-lahir-pr').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                        $('#jenis-kelamin-pr').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));                       
                    }

                    // PR
                    let pengkajian_restrain = data.pengkajian_restrain;
                    if (data.pengkajian_restrain !== null) {  

                        $('#btn_cetak_pengkajian_restain').show();  // Menampilkan tombol cetak
                        $('#btn_cetak_pengkajian_restain').on('click', function() {
                            konfirmasiCetakPengkajianRestrain(id_pendaftaran, id_layanan_pendaftaran);  // Fungsi ini hanya dipanggil setelah tombol diklik
                        });


                        $('#id-pr').val(data.pengkajian_restrain.id);
                       
                        const gcs_pr = JSON.parse(data.pengkajian_restrain.gcs_pr);                  
                        if (gcs_pr.gcs_pr_1 !== null) {$('#gcs-pr-1').val(gcs_pr.gcs_pr_1);}
                        if (gcs_pr.gcs_pr_2 !== null) {$('#gcs-pr-2').val(gcs_pr.gcs_pr_2);}
                        if (gcs_pr.gcs_pr_3 !== null) {$('#gcs-pr-3').val(gcs_pr.gcs_pr_3);}
                        if (gcs_pr.gcs_pr_4 !== null) {$('#gcs-pr-4').val(gcs_pr.gcs_pr_4);}
                        if (gcs_pr.gcs_pr_5 !== null) {$('#gcs-pr-5').val(gcs_pr.gcs_pr_5);}
                        if (gcs_pr.gcs_pr_6 !== null) {$('#gcs-pr-6').val(gcs_pr.gcs_pr_6);}

                        const tanda_pr = JSON.parse(data.pengkajian_restrain.tanda_pr);                  
                        if (tanda_pr.tanda_pr_1 !== null) {$('#tanda-pr-1').val(tanda_pr.tanda_pr_1);}
                        if (tanda_pr.tanda_pr_2 !== null) {$('#tanda-pr-2').val(tanda_pr.tanda_pr_2);}
                        if (tanda_pr.tanda_pr_3 !== null) {$('#tanda-pr-3').val(tanda_pr.tanda_pr_3);}
                        if (tanda_pr.tanda_pr_4 !== null) {$('#tanda-pr-4').val(tanda_pr.tanda_pr_4);}
                        if (tanda_pr.tanda_pr_5 !== null) {$('#tanda-pr-5').val(tanda_pr.tanda_pr_5);}

                        const hasil_pr = JSON.parse(data.pengkajian_restrain.hasil_pr);  
                        if (hasil_pr.hasil_pr_1 !== null) { $('#hasil-pr-1').prop('checked', true) }
                        if (hasil_pr.hasil_pr_2 !== null) { $('#hasil-pr-2').prop('checked', true) }
                        if (hasil_pr.hasil_pr_3 !== null) { $('#hasil-pr-3').prop('checked', true) }

                        const pertimbangan_pr = JSON.parse(data.pengkajian_restrain.pertimbangan_pr);  
                        if (pertimbangan_pr.pertimbangan_pr_1 !== null) { $('#pertimbangan-pr-1').prop('checked', true) }
                        if (pertimbangan_pr.pertimbangan_pr_2 !== null) { $('#pertimbangan-pr-2').prop('checked', true) }
            
                        const penilaian_pr = JSON.parse(data.pengkajian_restrain.penilaian_pr);                  
                        if (penilaian_pr.penilaian_pr_1 !== null) { $('#penilaian-pr-1').prop('checked', true) }
                        if (penilaian_pr.penilaian_pr_2 !== null) { $('#penilaian-pr-2').prop('checked', true) }
                        if (penilaian_pr.penilaian_pr_3 !== null) { $('#penilaian-pr-3').prop('checked', true) }
                        if (penilaian_pr.penilaian_pr_4 !== null) { $('#penilaian-pr-4').prop('checked', true) }
                        if (penilaian_pr.penilaian_pr_5 !== null) { $('#penilaian-pr-5').prop('checked', true) }
                        if (penilaian_pr.penilaian_pr_6 !== null) {$('#penilaian-pr-6').val(penilaian_pr.penilaian_pr_6);}
                        if (penilaian_pr.penilaian_pr_7 !== null) {$('#penilaian-pr-7').val(penilaian_pr.penilaian_pr_7);}
                        if (penilaian_pr.penilaian_pr_8 !== null) {$('#penilaian-pr-8').val(penilaian_pr.penilaian_pr_8);}

                        // if (data.pengkajian_restrain.pendidikan_pr !== null) { $('#pendidikan-pr').prop('checked', true) }

                        if (data.pengkajian_restrain.pendidikan_pr == '1') { $('#pendidikan-pr').prop('checked', true) }
        
                        if (data.pengkajian_restrain.perawat_bidan_pr !== null) { $('#perawat-bidan-pr').select2c('readonly', false)}
                        $('#perawat-bidan-pr').val(data.pengkajian_restrain.perawat_bidan_pr);
                        $('#s2id_perawat-bidan-pr a .select2c-chosen').html(data.pengkajian_restrain.perawat_bidan);

                        $('#keluarga-pr').val(data.pengkajian_restrain.keluarga_pr);   
                        
                    }   

                    // PRR TGL
                    $('#data-pemantauan-restrain').one('click', function() {
                            $('#pr-tanggal-pemantauan, #pr-edit-tanggal-pemantauan').datetimepicker({
                            format: 'DD/MM/YYYY',
                            maxDate: new Date(),
                            beforeShow: function(i) {
                                if ($(i).attr('readonly')) {
                                    return false;
                                }
                            }
                        });
                    })

                   
                    // // PRR              
                    // if (typeof data.pemantauan_restrain !== 'undefined' || data.pemantauan_restrain !== null) {
                    //             showPPemantauanRestrain(data.pemantauan_restrain,id_pendaftaran, id_layanan_pendaftaran, bed);
                    //             showPemantauanRestrain(nomer)
                    //     } else {

                    //         $('#tabel-pr .body-table').empty();

                    //     }
                                     
                    if (typeof data.pemantauan_restrain !== 'undefined' && data.pemantauan_restrain !== null) {
                        showPPemantauanRestrain(data.pemantauan_restrain, id_pendaftaran, id_layanan_pendaftaran, bed);
                        showPemantauanRestrain(nomer);
                    } else {
                        $('#tabel-pr .body-table').empty();

                    }
                    $('#bed-pr').text(bed);
                    $('#tanggal-jam-pr').text(tanggal);
                    $('#modal_pengkajian_restrain').modal('show');
                    
                },

                complete: function() {
                    hideLoader();
                },
                error: function(e) {
                    accessFailed(e.status);
                }
            })
        }       


        function konfirmasiCetakPengkajianRestrain(id_pendaftaran, id_layanan_pendaftaran){
            window.open('<?= base_url('pendaftaran_igd/cetak_pengkajian_restrain/') ?>' + id_pendaftaran + '/' + id_layanan_pendaftaran,
            'Cetak Form Pengkajian Restrain', 'width=' + dWidth + ', height=' +
            dHeight +
            ', left=' + x + ', top=' + y);
        }


        
        // function konfirmasiSimpanPengkajianRestrain() {
        //     var stop = false;
        //     if ($('#perawat-bidan-pr').val() === '') {
        //         syams_validation('#perawat-bidan-pr', 'Kolom perawat/bidan harus dipilih!');
        //         $('#wizard-pengkajian-restrain').bwizard('show', '0');
        //         stop = true;
        //     }

        //     if (!stop) {
        //         var id_prjogd = $('#id-pr').val();
        //         var text;
        //         var btnTextConfirmPr;

        //         if (id_Pr) {
        //             text = 'Apakah anda yakin ingin mengupdate data ini ?';
        //             btnTextConfirmPr = 'Update';
        //         } else {
        //             text = 'Apakah anda yakin ingin menyimpan data ini ?';
        //             btnTextConfirmPr = 'Simpan';
        //         }

        //         swal.fire({
        //             title: 'Konfirmasi ?',
        //             html: text,
        //             icon: 'question',
        //             showCancelButton: true,
        //             confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>' + btnTextConfirmPr,
        //             cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
        //             reverseButtons: true
        //         }).then((result) => {
        //             if (result.value) {
        //                 simpanPengkajianRestrain();
        //             }
        //         });
        //     }
        // }

        function konfirmasiSimpanPengkajianRestrain() {
            swal.fire({
                title: 'Konfirmasi',
                text: "Apakah anda yakin akan menyimpan datan ini ?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
                cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    simpanPengkajianRestrain();
                }
            })
        }

        // function konfirmasiSimpanPengkajianRestrain() {
        function simpanPengkajianRestrain() {
            var id_layanan_pendaftaran_pr = $('#id-layanan-pendaftaran-pr').val(); 
            $.ajax({
                type: 'POST',
                url: '<?= base_url("pelayanan/api/pelayanan/simpan_data_pengkajian_restrain") ?>',
                data: $('#form_pengkajian_restrain').serialize() + '&id-layanan-pendaftaran-pr=' + id_layanan_pendaftaran_pr,

                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {

                    if (data.respon !== null) {

                        if (data.respon.show !== null) {

                            $('#wizard-pengkajian-restrain').bwizard('show', data.respon.show);

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
                            $('#modal_pengkajian_restrain').modal('hide');
                            showListForm($('#id-pendaftaran-pr').val(), $('#id-layanan-pendaftaran-pr').val(), $('#id-pasien-pr').val());
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

        // GCS
        $('.gcsr').on('keyup', function() {
            let sum = 0
            $('.gcsr').each(function() {
                sum += Number($(this).val());
            });
            $('#gcs-pr-4').val(sum);
        })
       
        // PRR
        $('#data-pemantauan-restrain').one('click', function() {
            $('#inisial-perawat-1, #inisial-perawat-2, #inisial-perawat-3, #inisial-perawat-edit-1, #inisial-perawat-edit-2, #inisial-perawat-edit-3')
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


        // PRR
        $('#data-pemantauan-restrain').one('click', function() {
            $('#pr-perawat, #pr-edit-perawat').select2c({
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


        // PRR   
        function showPPemantauanRestrain(data, id_pendaftaran, id_layanan_pendaftaran, bed) {
            $('#tabel-pr .body-table').empty();

            if (data !== null) {
                $.each(data, function(i, v) {
                    const selOp =
                        '<td align="center"><button type="button" class="btn btn-secondary btn-xs" onclick="editPemantauanRestrain(this, ' +
                        v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                        '\')"><i class="fas fa-edit"></i> </button> <button type="button" class="btn btn-secondary btn-xs" onclick="hapusPemantauanRestrain(this, ' +
                        v.id + ')"> <i class="fas fa-trash-alt"></i> </button> </td>';

                    let html = /* html */ `
                        <tr>
                            <td class="number-terapi" align="center">${(++i)}</td>
                            <td align="center">${v.tanggal_pemantauan}</td>
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
                                        <th class="center" rowspan="2"><b>Tindakan</b></th>
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
                                        <td>Posisi Restrain</td>
                                        <td class="center">${v.posisi_p_ho == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.posisi_p_10 == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.posisi_s_ho == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.posisi_s_18 == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.posisi_m_ho == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.posisi_m_23 == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.posisi_m_4 == '1' ? '&check;' : ''}</td>
                                    </tr>
                                    <tr>
                                        <td>Edukasi kepada pasien dan keluarga</td>
                                        <td class="center">${v.edukasi_p_ho == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.edukasi_p_10 == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.edukasi_s_ho == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.edukasi_s_18 == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.edukasi_m_ho == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.edukasi_m_23 == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.edukasi_m_4 == '1' ? '&check;' : ''}</td>
                                    </tr>
                                    <tr>
                                        <td>Cedera pada pasien</td>
                                        <td class="center">${v.cedera_p_ho == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.cedera_p_10 == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.cedera_s_ho == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.cedera_s_18 == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.cedera_m_ho == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.cedera_m_23 == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.cedera_m_4 == '1' ? '&check;' : ''}</td>
                                    </tr>

                                    <tr>
                                        <td>Restrain di longgarkan setiap 2 jam selama 15 menit</td>
                                        <td class="center">${v.restrain_p_ho == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.restrain_p_10 == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.restrain_s_ho == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.restrain_s_18 == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.restrain_m_ho == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.restrain_m_23 == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.restrain_m_4 == '1' ? '&check;' : ''}</td>
                                    </tr>
                        
                                    <tr>
                                        <td class="bold">Paraf</td>
                                        <td class="center">${v.ttd_p_ho == '1' ? '&check;' : '&#10006;'}</td>
                                        <td class="center">${v.ttd_p_10 == '1' ? '&check;' : '&#10006;'}</td>
                                        <td class="center">${v.ttd_s_ho == '1' ? '&check;' : '&#10006;'}</td>
                                        <td class="center">${v.ttd_s_18 == '1' ? '&check;' : '&#10006;'}</td>
                                        <td class="center">${v.ttd_m_ho == '1' ? '&check;' : '&#10006;'}</td>
                                        <td class="center">${v.ttd_m_23 == '1' ? '&check;' : '&#10006;'}</td>
                                        <td class="center">${v.ttd_m_4 == '1' ? '&check;' : '&#10006;'}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    `;
                    $('#tabel-pr .body-table').append(html);
                    numberPr = i;
                })
            }
        }

     
        function resetFormPengkajianRestrian() {
            $('#wizard-pengkajian-restrain').bwizard('show', '0');
            $('#form_pengkajian_restrain')[0].reset();
            $("input[type='checkbox']").prop('checked',false);
            $("input[type='radio']").prop('checked',false);
            $('#id-pr').val('');
            $('#s2id_perawat-bidan-pr a .select2c-chosen').html('Pilih Perawat/Bidan');
            $('#perawat-bidan-pr').val('');
            $('#s2id_perawat-bidan-pr a .select2c-chosen').empty();
            $('#perawat-bidan-pr').select2c('readonly',false);

            $('#buka-tutup-pr').empty();

            // PRR
            $('#s2id_inisial-perawat-1 a .select2c-chosen').empty();
            $('#s2id_inisial-perawat-2 a .select2c-chosen').empty();
            $('#s2id_inisial-perawat-3 a .select2c-chosen').empty();
            $('#pr-tanggal-pemantauan').val('');
            $('#inisial-perawat-1').val('');
            $('#inisial-perawat-2').val('');
            $('#inisial-perawat-3').val('');
            setTimeout(() => {
                $('#form-pr').find('input').each(function() {
                    if ($(this).is(':checked')) {
                        $(this).prop('checked', false);
                    }
                })
            }, 100)
        }

        // function resetFormPemantauanRestrian() {
        //     $('#buka-tutup-pr').empty();
        // }

        // PRR
        function editPemantauanRestrain(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed){
            // console.log('12345');
            const modal = $('#modal-edit-pemantauan-restrain');
            $('#update-pr').children().remove();
            $.ajax({
                type: 'GET',
                url: '<?= base_url("pelayanan/api/pelayanan/get_pemantauan_restrain") ?>/id/' +
                    id,
                cache: false,
                dataType: 'JSON',
                success: function(data) {

                    // console.log(data);
                    $('#update-pr').empty();
                    $('#id-pemantauan-restrain').val(id);

                    function formatTanggalKhusus(waktu) {
                        var el = waktu.split('-');
                        var tahun = el[0];
                        var bulan = el[1];
                        var hari = el[2];
                        return hari + '/' + bulan + '/' + tahun;
                    }
                    let edit_tanggal_pemantauan = formatTanggalKhusus(data.tanggal_pemantauan);
                    $('#pr-edit-tanggal-pemantauan').val(edit_tanggal_pemantauan);
                    let cttntndkn = '';
                    cttntndkn =
                        `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-pemantauan-restrain').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
        						<button type="button" class="btn btn-info waves-effect" onclick="updatePemantauanRestrain(${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')"><i class="fas fa-save mr-1"></i>Update</button>`;
                    $('#update-pr').append(cttntndkn);
                  
                    data.posisi_p_ho == '1' ? $('#posisi-edit-p-ho').prop('checked', true) : $('#posisi-edit-p-ho').prop('checked', false);
                    data.posisi_p_10 == '1' ? $('#posisi-edit-p-10').prop('checked', true) : $('#posisi-edit-p-10').prop('checked', false);
                    data.posisi_s_ho == '1' ? $('#posisi-edit-s-ho').prop('checked', true) : $('#posisi-edit-s-ho').prop('checked', false);
                    data.posisi_s_18 == '1' ? $('#posisi-edit-s-18').prop('checked', true) : $('#posisi-edit-s-18').prop('checked', false);
                    data.posisi_m_ho == '1' ? $('#posisi-edit-m-ho').prop('checked', true) : $('#posisi-edit-m-ho').prop('checked', false);
                    data.posisi_m_23 == '1' ? $('#posisi-edit-m-23').prop('checked', true) : $('#posisi-edit-m-23').prop('checked', false);
                    data.posisi_m_4 == '1' ? $('#posisi-edit-m-4').prop('checked', true)   : $('#posisi-edit-m-4').prop('checked', false);
                
                    data.edukasi_p_ho == '1' ? $('#edukasi-edit-p-ho').prop('checked', true) : $('#edukasi-edit-p-ho').prop('checked', false);
                    data.edukasi_p_10 == '1' ? $('#edukasi-edit-p-10').prop('checked', true) : $('#edukasi-edit-p-10').prop('checked', false);
                    data.edukasi_s_ho == '1' ? $('#edukasi-edit-s-ho').prop('checked', true) : $('#edukasi-edit-s-ho').prop('checked', false);
                    data.edukasi_s_18 == '1' ? $('#edukasi-edit-s-18').prop('checked', true) : $('#edukasi-edit-s-18').prop('checked', false);
                    data.edukasi_m_ho == '1' ? $('#edukasi-edit-m-ho').prop('checked', true) : $('#edukasi-edit-m-ho').prop('checked', false);
                    data.edukasi_m_23 == '1' ? $('#edukasi-edit-m-23').prop('checked', true) : $('#edukasi-edit-m-23').prop('checked', false);
                    data.edukasi_m_4 == '1' ? $('#edukasi-edit-m-4').prop('checked', true)   : $('#edukasi-edit-m-4').prop('checked', false);

                    data.cedera_p_ho == '1' ? $('#cedera-edit-p-ho').prop('checked', true) : $('#cedera-edit-p-ho').prop('checked', false);
                    data.cedera_p_10 == '1' ? $('#cedera-edit-p-10').prop('checked', true) : $('#cedera-edit-p-10').prop('checked', false);
                    data.cedera_s_ho == '1' ? $('#cedera-edit-s-ho').prop('checked', true) : $('#cedera-edit-s-ho').prop('checked', false);
                    data.cedera_s_18 == '1' ? $('#cedera-edit-s-18').prop('checked', true) : $('#cedera-edit-s-18').prop('checked', false);
                    data.cedera_m_ho == '1' ? $('#cedera-edit-m-ho').prop('checked', true) : $('#cedera-edit-m-ho').prop('checked', false);
                    data.cedera_m_23 == '1' ? $('#cedera-edit-m-23').prop('checked', true) : $('#cedera-edit-m-23').prop('checked', false);
                    data.cedera_m_4 == '1' ? $('#cedera-edit-m-4').prop('checked', true)   : $('#cedera-edit-m-4').prop('checked', false);

                    data.restrain_p_ho == '1' ? $('#restrain-edit-p-ho').prop('checked', true) : $('#restrain-edit-p-ho').prop('checked', false);
                    data.restrain_p_10 == '1' ? $('#restrain-edit-p-10').prop('checked', true) : $('#restrain-edit-p-10').prop('checked', false);
                    data.restrain_s_ho == '1' ? $('#restrain-edit-s-ho').prop('checked', true) : $('#restrain-edit-s-ho').prop('checked', false);
                    data.restrain_s_18 == '1' ? $('#restrain-edit-s-18').prop('checked', true) : $('#restrain-edit-s-18').prop('checked', false);
                    data.restrain_m_ho == '1' ? $('#restrain-edit-m-ho').prop('checked', true) : $('#restrain-edit-m-ho').prop('checked', false);
                    data.restrain_m_23 == '1' ? $('#restrain-edit-m-23').prop('checked', true) : $('#restrain-edit-m-23').prop('checked', false);
                    data.restrain_m_4 == '1' ? $('#restrain-edit-m-4').prop('checked', true)   : $('#restrain-edit-m-4').prop('checked', false);
                  
                    data.ttd_p_ho == '1' ? $('#ttd-edit-p-ho').prop('checked', true) : $('#ttd-edit-p-ho').prop('checked', false);
                    data.ttd_p_10 == '1' ? $('#ttd-edit-p-10').prop('checked', true) : $('#ttd-edit-p-10').prop('checked', false);
                    data.ttd_s_ho == '1' ? $('#ttd-edit-s-ho').prop('checked', true) : $('#ttd-edit-s-ho').prop('checked', false);
                    data.ttd_s_18 == '1' ? $('#ttd-edit-s-18').prop('checked', true) : $('#ttd-edit-s-18').prop('checked', false);
                    data.ttd_m_ho == '1' ? $('#ttd-edit-m-ho').prop('checked', true) : $('#ttd-edit-m-ho').prop('checked', false);
                    data.ttd_m_23 == '1' ? $('#ttd-edit-m-23').prop('checked', true) : $('#ttd-edit-m-23').prop('checked', false);
                    data.ttd_m_4 == '1' ? $('#ttd-edit-m-4').prop('checked', true)   : $('#ttd-edit-m-4').prop('checked', false);

                    $('#inisial-perawat-edit-1').val(data.inisial_perawat_1);
                    $('#s2id_inisial-perawat-edit-1 a .select2c-chosen').html(data.perawat_1);

                    $('#inisial-perawat-edit-2').val(data.inisial_perawat_2);
                    $('#s2id_inisial-perawat-edit-2 a .select2c-chosen').html(data.perawat_2);

                    $('#inisial-perawat-edit-3').val(data.inisial_perawat_3);
                    $('#s2id_inisial-perawat-edit-3 a .select2c-chosen').html(data.perawat_3);

                    modal.modal('show');
                },
                error: function(e) {
                    accessFailed(e.status);
                }
            })
        }

        // PRR
        function updatePemantauanRestrain(id_pendaftaran, id_layanan_pendaftaran, bed) {
            $.ajax({
                type: 'PUT',
                url: '<?= base_url("pelayanan/api/pelayanan/update_pemantauan_restrain") ?>',
                data: $('#form-edit-pemantauan-restrain').serialize(),
                cache: false,
                dataType: 'JSON',
                success: function(data) {
                    if (data.status) {
                        messageEditSuccess();
                        $('#wizard-pengkajian-restrain').bwizard('show', '0');
                        entriPengkajianRestrain(id_pendaftaran, id_layanan_pendaftaran, bed);
                    } else {
                        messageEditFailed();
                    }

                    $('#modal-edit-pemantauan-restrain').modal('hide');
                },
                error: function(e) {
                    messageEditFailed();
                }
            });
        }

        // PRR
        if (typeof numberPr === 'undefined') {
            var numberPr = 1;
        }

        function tambahPemantauanRestrain() {
            // console.log('kontol')        
            if ($('#pr-tanggal-pemantauan').val() === '') {
                syams_validation('#pr-tanggal-pemantauan', 'Tanggal Pemantauan harus diisi.');
                return false;
            } else {
                syams_validation_remove('#pr-tanggal-pemantauan');
            }

            if ($('#pr-perawat').val() === '') {
                syams_validation('#pr-perawat', 'Nama perawat belum diisi.');
                return false;
            } else {
                syams_validation_remove('#pr-perawat');
            }

            let html = '';
            let pr_tanggal_pemantauan = $('#pr-tanggal-pemantauan').val();
            let perawat_1 = $('#s2id_inisial-perawat-1 a .select2c-chosen').html();
            let perawat_2 = $('#s2id_inisial-perawat-2 a .select2c-chosen').html();
            let perawat_3 = $('#s2id_inisial-perawat-3 a .select2c-chosen').html();
            let inisial_perawat_1 = $('#inisial-perawat-1').val();
            let inisial_perawat_2 = $('#inisial-perawat-2').val();
            let inisial_perawat_3 = $('#inisial-perawat-3').val();

            
            let posisi_p_ho = $('#posisi-p-ho').is(':checked');
            let posisi_p_10 = $('#posisi-p-10').is(':checked');
            let posisi_s_ho = $('#posisi-s-ho').is(':checked');
            let posisi_s_18 = $('#posisi-s-18').is(':checked');
            let posisi_m_ho = $('#posisi-m-ho').is(':checked');
            let posisi_m_23 = $('#posisi-m-23').is(':checked');
            let posisi_m_4 = $('#posisi-m-4').is(':checked');

            
            let edukasi_p_ho = $('#edukasi-p-ho').is(':checked');
            let edukasi_p_10 = $('#edukasi-p-10').is(':checked');
            let edukasi_s_ho = $('#edukasi-s-ho').is(':checked');
            let edukasi_s_18 = $('#edukasi-s-18').is(':checked');
            let edukasi_m_ho = $('#edukasi-m-ho').is(':checked');
            let edukasi_m_23 = $('#edukasi-m-23').is(':checked');
            let edukasi_m_4 = $('#edukasi-m-4').is(':checked');

            
            let cedera_p_ho = $('#cedera-p-ho').is(':checked');
            let cedera_p_10 = $('#cedera-p-10').is(':checked');
            let cedera_s_ho = $('#cedera-s-ho').is(':checked');
            let cedera_s_18 = $('#cedera-s-18').is(':checked');
            let cedera_m_ho = $('#cedera-m-ho').is(':checked');
            let cedera_m_23 = $('#cedera-m-23').is(':checked');
            let cedera_m_4 = $('#cedera-m-4').is(':checked');

        
            let restrain_p_ho = $('#restrain-p-ho').is(':checked');
            let restrain_p_10 = $('#restrain-p-10').is(':checked');
            let restrain_s_ho = $('#restrain-s-ho').is(':checked');
            let restrain_s_18 = $('#restrain-s-18').is(':checked');
            let restrain_m_ho = $('#restrain-m-ho').is(':checked');
            let restrain_m_23 = $('#restrain-m-23').is(':checked');
            let restrain_m_4 = $('#restrain-m-4').is(':checked');

            
            let ttd_p_ho = $('#ttd-p-ho').is(':checked');
            let ttd_p_10 = $('#ttd-p-10').is(':checked');
            let ttd_s_ho = $('#ttd-s-ho').is(':checked');
            let ttd_s_18 = $('#ttd-s-18').is(':checked');
            let ttd_m_ho = $('#ttd-m-ho').is(':checked');
            let ttd_m_23 = $('#ttd-m-23').is(':checked');
            let ttd_m_4 = $('#ttd-m-4').is(':checked');

            html = /* html */ `
                <tr class="row-in-${++numberPr}">
                    <td class="number-pemantauan" align="center">${numberPr}</td>
                    <td align="center">
                    	<input type="hidden" name="pr_tanggal_pemantauan[]" value="${pr_tanggal_pemantauan}">${pr_tanggal_pemantauan}
                    </td>
                    <td align="center">
                    	<input type="hidden" name="inisial_perawat_1[]" value="${inisial_perawat_1}">${perawat_1}
                    </td>
                    <td align="center">
                    	<input type="hidden" name="inisial_perawat_2[]" value="${inisial_perawat_2}">${perawat_2}
                    </td>
                    <td align="center">
                    	<input type="hidden" name="inisial_perawat_3[]" value="${inisial_perawat_3}">${perawat_3}
                    </td>
                    <td align="center">
        				<?= $this->session->userdata('nama') ?>
        				<input type="hidden" name="user_pemantauan[]" value="<?= $this->session->userdata("id_translucent") ?>">
        				<input type="hidden" name="pencegahan_date_pr[]" value="<?= date("Y-m-d H:i:s") ?>">

        				<input type="hidden" name="posisi_p_ho[]" value="${posisi_p_ho ? 1 : 0}">
        				<input type="hidden" name="posisi_p_10[]" value="${posisi_p_10 ? 1 : 0}">
        				<input type="hidden" name="posisi_s_ho[]" value="${posisi_s_ho ? 1 : 0}">
        				<input type="hidden" name="posisi_s_18[]" value="${posisi_s_18 ? 1 : 0}">
        				<input type="hidden" name="posisi_m_ho[]" value="${posisi_m_ho ? 1 : 0}">
        				<input type="hidden" name="posisi_m_23[]" value="${posisi_m_23 ? 1 : 0}">
        				<input type="hidden" name="posisi_m_4[]" value="${posisi_m_4 ? 1 : 0}">

        				<input type="hidden" name="edukasi_p_ho[]" value="${edukasi_p_ho ? 1 : 0}">
        				<input type="hidden" name="edukasi_p_10[]" value="${edukasi_p_10 ? 1 : 0}">
        				<input type="hidden" name="edukasi_s_ho[]" value="${edukasi_s_ho ? 1 : 0}">
        				<input type="hidden" name="edukasi_s_18[]" value="${edukasi_s_18 ? 1 : 0}">
        				<input type="hidden" name="edukasi_m_ho[]" value="${edukasi_m_ho ? 1 : 0}">
        				<input type="hidden" name="edukasi_m_23[]" value="${edukasi_m_23 ? 1 : 0}">
        				<input type="hidden" name="edukasi_m_4[]" value="${edukasi_m_4 ? 1 : 0}">

        				<input type="hidden" name="cedera_p_ho[]" value="${cedera_p_ho ? 1 : 0}">
        				<input type="hidden" name="cedera_p_10[]" value="${cedera_p_10 ? 1 : 0}">
        				<input type="hidden" name="cedera_s_ho[]" value="${cedera_s_ho ? 1 : 0}">
        				<input type="hidden" name="cedera_s_18[]" value="${cedera_s_18 ? 1 : 0}">
        				<input type="hidden" name="cedera_m_ho[]" value="${cedera_m_ho ? 1 : 0}">
        				<input type="hidden" name="cedera_m_23[]" value="${cedera_m_23 ? 1 : 0}">
        				<input type="hidden" name="cedera_m_4[]" value="${cedera_m_4 ? 1 : 0}">

                        <input type="hidden" name="restrain_p_ho[]" value="${restrain_p_ho ? 1 : 0}">
        				<input type="hidden" name="restrain_p_10[]" value="${restrain_p_10 ? 1 : 0}">
        				<input type="hidden" name="restrain_s_ho[]" value="${restrain_s_ho ? 1 : 0}">
        				<input type="hidden" name="restrain_s_18[]" value="${restrain_s_18 ? 1 : 0}">
        				<input type="hidden" name="restrain_m_ho[]" value="${restrain_m_ho ? 1 : 0}">
        				<input type="hidden" name="restrain_m_23[]" value="${restrain_m_23 ? 1 : 0}">
        				<input type="hidden" name="restrain_m_4[]" value="${restrain_m_4 ? 1 : 0}">

        				<input type="hidden" name="ttd_p_ho[]" value="${ttd_p_ho ? 1 : 0}">
        				<input type="hidden" name="ttd_p_10[]" value="${ttd_p_10 ? 1 : 0}">
        				<input type="hidden" name="ttd_s_ho[]" value="${ttd_s_ho ? 1 : 0}">
        				<input type="hidden" name="ttd_s_18[]" value="${ttd_s_18 ? 1 : 0}">
        				<input type="hidden" name="ttd_m_ho[]" value="${ttd_m_ho ? 1 : 0}">
        				<input type="hidden" name="ttd_m_23[]" value="${ttd_m_23 ? 1 : 0}">
        				<input type="hidden" name="ttd_m_4[]" value="${ttd_m_4 ? 1 : 0}">
                    </td>
                    <td align="center">
                        <button type="button" id="pepel" class="btn btn-secondary btn-xxs" onclick="(() => {$(this).parent().parent().parent().find('.row-in-' + numberPr).remove(); numberPr--;})()"><i class="fas fa-trash-alt"></i></button>
                    </td>
                    <td align="center"><button type="button" class="btn btn-info btn-xxs" data-toggle="collapse" data-target="#data-collapse-${numberPr}" aria-expanded="false" aria-controls="data-collapse-${numberPr}"><i class="fas fa-expand"></i> Expand</button></td>
                </tr>
                <tr class="collapse row-in-${numberPr}" id="data-collapse-${numberPr}">
                	<td colspan="8">
                		<table class="table table-sm table-striped table-bordered" style="margin-top: .5rem">
        					<thead>
        					<tr>
        						<th class="center" rowspan="2"><b>Tindakan</b></th>
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
        						<td>Posisi Restrain</td>
        						<td class="center">${posisi_p_ho ? '&check;' : ''}</td>
        						<td class="center">${posisi_p_10 ? '&check;' : ''}</td>
        						<td class="center">${posisi_s_ho ? '&check;' : ''}</td>
        						<td class="center">${posisi_s_18 ? '&check;' : ''}</td>
        						<td class="center">${posisi_m_ho ? '&check;' : ''}</td>
        						<td class="center">${posisi_m_23 ? '&check;' : ''}</td>
        						<td class="center">${posisi_m_4 ? '&check;' : ''}</td>
        					</tr>
        					<tr>
        						<td>Edukasi kepada pasien dan keluarga</td>
        						<td class="center">${edukasi_p_ho ? '&check;' : ''}</td>
        						<td class="center">${edukasi_p_10 ? '&check;' : ''}</td>
        						<td class="center">${edukasi_s_ho ? '&check;' : ''}</td>
        						<td class="center">${edukasi_s_18 ? '&check;' : ''}</td>
        						<td class="center">${edukasi_m_ho ? '&check;' : ''}</td>
        						<td class="center">${edukasi_m_23 ? '&check;' : ''}</td>
        						<td class="center">${edukasi_m_4 ? '&check;' : ''}</td>
        					</tr>
        					<tr>
        						<td>Cedera pada pasien</td>
        						<td class="center">${cedera_p_ho ? '&check;' : ''}</td>
        						<td class="center">${cedera_p_10 ? '&check;' : ''}</td>
        						<td class="center">${cedera_s_ho ? '&check;' : ''}</td>
        						<td class="center">${cedera_s_18 ? '&check;' : ''}</td>
        						<td class="center">${cedera_m_ho ? '&check;' : ''}</td>
        						<td class="center">${cedera_m_23 ? '&check;' : ''}</td>
        						<td class="center">${cedera_m_4 ? '&check;' : ''}</td>
        					</tr>

                            <tr>
        						<td>Restrain di longgarkan setiap 2 jam selama 15 menit</td>
        						<td class="center">${restrain_p_ho ? '&check;' : ''}</td>
        						<td class="center">${restrain_p_10 ? '&check;' : ''}</td>
        						<td class="center">${restrain_s_ho ? '&check;' : ''}</td>
        						<td class="center">${restrain_s_18 ? '&check;' : ''}</td>
        						<td class="center">${restrain_m_ho ? '&check;' : ''}</td>
        						<td class="center">${restrain_m_23 ? '&check;' : ''}</td>
        						<td class="center">${restrain_m_4 ? '&check;' : ''}</td>
        					</tr>

        					<tr>
        						<td class="bold">Paraf</td>
        						<td class="center">${ttd_p_ho ? '&check;' : '&#10006;'}</td>
        						<td class="center">${ttd_p_10 ? '&check;' : '&#10006;'}</td>
        						<td class="center">${ttd_s_ho ? '&check;' : '&#10006;'}</td>
        						<td class="center">${ttd_s_18 ? '&check;' : '&#10006;'}</td>
        						<td class="center">${ttd_m_ho ? '&check;' : '&#10006;'}</td>
        						<td class="center">${ttd_m_23 ? '&check;' : '&#10006;'}</td>
        						<td class="center">${ttd_m_4 ? '&check;' : '&#10006;'}</td>
        					</tr>
        					</tbody>
        				</table>
                	</td>
                </tr>
            `;
            $('#tabel-pr .body-table').append(html);
        }

        // PRR
        function hapusPemantauanRestrain(obj, id) {
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
                                url: '<?= base_url("pelayanan/api/pelayanan/pemantauan_restrain") ?>/' +
                                    id,
                                cache: false,
                                dataType: 'JSON',
                                success: function(data) {
                                    if (data.status) {
                                        messageCustom(data.message, 'Success');
                                        removeList(obj);
                                    } else {
                                        customAlert('Hapus Pemantauan Restrain', data
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