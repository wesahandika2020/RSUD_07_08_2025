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

    function lihatFORM_KEP_02_03(data) {
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
        entriSurgicalSafetyCheklisKamarOperasi(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed, action);
    }

    function editFORM_KEP_02_03(data) {
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
        entriSurgicalSafetyCheklisKamarOperasi(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed, action);
    }

    function tambahFORM_KEP_02_03(data) {
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
        entriSurgicalSafetyCheklisKamarOperasi(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed, action);
    }

    function entriSurgicalSafetyCheklisKamarOperasi(id_pendaftaran, id_layanan_pendaftaran, layanan, bed, action) {

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
            url: '<?= base_url("pelayanan/api/pelayanan/get_data_surgical_safety_cheklist_kamar_operasi") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // console.log(data);
                resetSurgicalSafetyCheklisKamarOperasi(); 
                // $('#id-pasien-sscko').val(data.pasien.no_rm);
                $('#id-layanan-pendaftaran-sscko').val(id_layanan_pendaftaran);
                $('#id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-sscko').val(id_pendaftaran);
                
                if (data.pasien !== null) {
                    $('#id-pasien-sscko').val(data.pasien.id_pasien);
                    $('#nama-pasien-sscko').text(data.pasien.nama);

                    // $('#no-rm-sscko').text(data.pasien.id);
                    $('#no-rm-sscko').text(data.pasien.no_rm);

                    $('#tgl-lahir-sscko').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#jenis-kelamin-sscko').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                    // $('#agama-sscko').text(data.pasien.agama);
                    // $('#alamat-sscko').text(data.pasien.alamat);
                }

                // TANGGAL
                $('#data-surgical-safety-cheklist-kamar-operasi').one('click', function() {
                        $('#sscko-tanggal-tindakan, #edit-sscko-tanggal-tindakan').datetimepicker({
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
                $('#data-surgical-safety-cheklist-kamar-operasi').one('click', function() {
                    $('#sscko-jam-1, #sscko-jam-2, #sscko-jam-3, #edit-sscko-jam-1, #edit-sscko-jam-2, #edit-sscko-jam-3')
                    .on('click', function() {
                        $(this).timepicker({
                            format: 'HH:mm',
                            showInputs: false,
                            showMeridian: false
                        });
                    })
                })
                
                $('#data-surgical-safety-cheklist-kamar-operasi').one('click', function() {
                    $('#sscko-perawat-sign-in, #sscko-perawat-time-out, #edit-sscko-perawat-sign-in, #edit-sscko-perawat-time-out')
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

                $('#data-surgical-safety-cheklist-kamar-operasi').one('click', function() {
                    $('#sscko-dokter-anestesi-sign-in, #sscko-dokter-anestesi-time-out, #sscko-dokter-anestesi-sign-out, #edit-sscko-dokter-anestesi-sign-in, #edit-sscko-dokter-anestesi-time-out, #edit-sscko-dokter-anestesi-sign-out, #sscko-operator-1, #edit-sscko-operator-1, #sscko-operator-2, #edit-sscko-operator-2')
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
                
                if (typeof data.surgical_safety_cheklist_kamar_operasi !== 'undefined' && data.surgical_safety_cheklist_kamar_operasi !== null) {
                    showSSurgicalSafetyCeklisKamarOperasi(data.surgical_safety_cheklist_kamar_operasi, id_pendaftaran, id_layanan_pendaftaran, bed, action);
                    showSurgicalSafetyCeklisKamarOperasi(nomer);
                } else {
                    $('#tabel-sscko .body-table').empty();
                }
                $('#bed-sscko').text(bed);

                $('#modal_surgical_safety_cheklist_kamar_operasi').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }
    
    function showSurgicalSafetyCeklisKamarOperasi(num) {
        let html = bukaLebar('Form Surgical Safety Checklist Kamar Operasi', num);
        html += /* html */ `
            <div class="modal-body">               
                <div class="row">
                    <div class="col-lg-4">
                        <table class="table table-no-border table-sm table-striped">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <div class="input-group"><b>SIGN IN</b><input type="text" name="sscko_jam_1" id="sscko-jam-1" class="custom-form clear-d-inline-block col-lg-2 ml-2" placeholder="hh:mm"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">(Dilakukan sebelum induksi anestesi, minimalnya oleh perawat dan dokter anestesi)</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td colspan="2">Pasien sudah dikonfirmasi</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td width="40%">- Identitas dan gelang pasien</td>
                                    <td><input type="checkbox" class="mr-2" name="sscko_igp" id="sscko-igp" value="1">Ya</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>- Lokasi operasi</td>
                                    <td><input type="checkbox" class="mr-2" name="sscko_lo" id="sscko-lo" value="1">Ya</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>- Prosedur</td>
                                    <td><input type="checkbox" class="mr-2" name="sscko_prosedur" id="sscko-prosedur" value="1">Ya</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>- Surat izin operasi</td>
                                    <td><input type="checkbox" class="mr-2" name="sscko_sio" id="sscko-sio" value="1">Ya</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td colspan="2">Lokasi operasi sudah diberi tanda ?</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="radio" class="mr-2" name="sscko_tanda" id="sscko-tanda-ya" value="1">Ya</td>
                                    <td><input type="radio" class="mr-2" name="sscko_tanda" id="sscko-tanda-tidak" value="2">Tidak dilakukan</td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td colspan="2">Mesin anestesi dan obat-obatan sudah di cek lengkap ?</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="2"><input type="checkbox" class="mr-2" name="sscko_mesin" id="sscko-mesin" value="1">Ya</td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td colspan="2">Monitor anestesi berfungsi baik ?</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="2"><input type="checkbox" class="mr-2" name="sscko_monitor" id="sscko-monitor" value="1">Ya</td>
                                </tr>
                                <tr>
                                    <td>5.</td>
                                    <td colspan="2">apakah pasien mempunyai riwayat alergi ?</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="radio" class="mr-2" name="sscko_alergi" id="sscko-alergi-tidak" value="2">Tidak</td>
                                    <td>
                                        <div class="input-group">
                                        <input type="radio" class="mr-2" name="sscko_alergi" id="sscko-alergi-ya" value="1"> Ya, sebutkan <input type="text" name="sscko_sebut" id="sscko-sebut" class="custom-form clear-input d-inline-block ml-1">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6.</td>
                                    <td colspan="2">Kemungkinan kesulitan jalan nafas atau risiko aspirasi ?</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="radio" class="mr-2" name="sscko_kemungkinan" id="sscko-kemungkinan-2" value="2"> Tidak
                                    <td>
                                        <div class="input-group">
                                            <input type="radio" class="mr-2" name="sscko_kemungkinan" id="sscko-kemungkinan-1" value="1">Peralatan dan asisten telah tersedia</td>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>7.</td>
                                    <td colspan="2">Risiko kehilangan darah > 500ml/kgBB pada anak ?</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="radio" class="mr-2" name="sscko_resiko" id="sscko-resiko-2" value="2">Tidak</td>
                                    <td>
                                        <div class="input-group">
                                        <input type="radio" class="mr-2" name="sscko_resiko" id="sscko-resiko-1" value="1">Ya, Tersedia dua akses intravena/sentral dan terapi cairan sudah direncanakan</td>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>8.</td>
                                    <td colspan="2">Rencana pemakaian implant ?</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="radio" class="mr-2" name="sscko_rencana" id="sscko-rencana-tidak" value="2">Tidak</td>
                                    <td>
                                        <div class="input-group">
                                        <input type="radio" class="mr-2" name="sscko_rencana" id="sscko-rencana-ya" value="1"> Ya, jenis <input type="text" name="sscko_jenis" id="sscko-jenis" class="custom-form clear-input d-inline-block ml-1">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>9.</td>
                                    <td colspan="2">Rencana anestesi</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="2">
                                        <input type="radio" name="sscko_anastesi" id="sscko-anastesi-1" value="1" class="mr-1"> Umum &nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="sscko_anastesi" id="sscko-anastesi-2" value="2" class="mr-1 ml-3"> Regional  &nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="sscko_anastesi" id="sscko-anastesi-3" value="3" class="mr-1 ml-3"> Blok  &nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="sscko_anastesi" id="sscko-anastesi-4" value="4" class="mr-1 ml-3"> Lokal 
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-lg-4">
                        <table class="table table-no-border table-sm table-striped">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <div class="input-group"><b>TIME OUT</b><input type="text" name="sscko_jam_2" id="sscko-jam-2" class="custom-form clear-d-inline-block col-lg-2 ml-2" placeholder="hh:mm"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">(Dilakukan sebelum insisi kulit, diisi oleh perawat, dokter anestesi dan operator)</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td colspan="2">Konfirmasi seluruh anggota tim (nama dan peran masing-masing)</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="checkbox" class="mr-2" name="sscko_konfirmasi" id="sscko-konfirmasi" value="1">Ya</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td colspan="2">Konfirmasi secara verbal</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td width="50%">- Nama pasien</td>
                                    <td><input type="checkbox" class="mr-2" name="sscko_np" id="sscko-np" value="1">Ya</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>- Prosedur</td>
                                    <td><input type="checkbox" class="mr-2" name="sscko_prosedurr" id="sscko-prosedurr" value="1">Ya</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>- Lokasi dimana insisi akan dibuat</td>
                                    <td><input type="checkbox" class="mr-2" name="sscko_lokasi" id="sscko-lokasi" value="1">Ya</td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td colspan="2">Antibiotik profilaksis telah diberikan selama 60 menit sebelumnya ?</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="checkbox" class="mr-2" name="sscko_antibiotik" id="sscko-antibiotik" value="1">Ya</td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td colspan="2">Antisipaasi kejadian kritis:</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="2"><b>Review dokter bedah :</b> Langkah apa yang dilakukan bila kondisi kritis atau kejadian yang tidak diharapkan, lamanya operasi, kemungkinan kehilangan darah ?</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="2"><textarea name="sscko_bedah" id="sscko-bedah" class="form-control" rows="3"></textarea></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="2"><b>Review dokter anestesi :</b> Apa ada hal khusus yang perlu diperhatikan pada pasien ?</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="2"><textarea name="sscko_anastesiii" id="sscko-anastesiii" class="form-control" rows="3"></textarea></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="2"><b>Review tim perawat :</b> Apakah peralatan sudah steril, adakah alat-alat yang perlu diperhatikan khusus atau dalam masalah ?</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="2"><textarea name="sscko_perawat" id="sscko-perawat" class="form-control" rows="3"></textarea></td>
                                </tr>
                                <tr>
                                    <td>5.</td>
                                    <td colspan="2">Foto rongent/CT scan/MRI yang diperlukan telah ditayangkan</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="radio" name="sscko_foto" id="sscko-foto-1" value="1" class="mr-1 ml-2"> Ya 
                                    <td>
                                        <div class="input-group">
                                        <input type="radio" name="sscko_foto" id="sscko-foto-2" value="2" class="mr-1 ">Tidak dilakukan</td>
                                        </div>
                                    </td>
                                </tr>                               
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-4">
                        <table class="table table-no-border table-sm table-striped">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <div class="input-group"><b>SIGN OUT</b><input type="text" name="sscko_jam_3" id="sscko-jam-3" class="custom-form clear-d-inline-block col-lg-2 ml-2" placeholder="hh:mm"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">(Dilakukan sebelum pasien meninggalkan OK, diisi oleh perawat, dokter anestesi dan operator)</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td colspan="2">Perawat melakukan konfirmasi secara verbal</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>- Nama prosedur tindakan</td>
                                    <td><input type="checkbox" class="mr-2" name="sscko_npt" id="sscko-npt" value="1">Ya</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>- Instrumen, kasa dan jarum telah dihitung secara lengkap</td>
                                    <td><input type="checkbox" class="mr-2" name="sscko_instrumen" id="sscko-instrumen" value="1">Ya</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>- Specimen telah diberi label (termasuk nama pasien & asal jaringan specimen)</td>
                                    <td><input type="checkbox" class="mr-2" name="sscko_specimen" id="sscko-specimen" value="1">Ya</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>- Apakah masalah dengan peralatan selama operasi</td>
                                    <td><input type="radio" name="sscko_adakah" id="sscko-adakah-ya" value="1"> Ya</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td><input type="radio" name="sscko_adakah" id="sscko-adakah-tidak" value="2"> Tidak</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td colspan="2">Operator dokter bedah, dokter anestesi dan perawat melakukan review masalah utama apa yang harus diperhatikan untuk penyembuhan dan manajemen pasien selanjutnya</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="checkbox" class="mr-2" name="sscko_operator" id="sscko-operator" value="1">Ya</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <div class="input-group">
                                            Tanggal tindakan verifikasi<input type="text" name="sscko_tanggal_tindakan" id="sscko-tanggal-tindakan" class="custom-form clear-d-inline-block col-lg-3 ml-2" placeholder="dd/mm/yy">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <table class="table table-sm table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="center">KEGIATAN</th>
                                                    <th class="center">PELAKSANA</th>
                                                    <th class="center" >TANDA TANGAN</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <tr>
                                                    <td rowspan="3">Sign In</td>
                                                    <td>1. Perawat Sirkuler</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="sscko_perawat_sign_in" id="sscko-perawat-sign-in" class="select2c-input"></td>
                                                    <td class="center"><input type="checkbox"name="sscko_paraf_perawat_sign_in"id="sscko-paraf-perawat-sign-in" class="mr-1"></td>
                                                </tr>                                             
                                            </tbody>
                                            <tbody>
                                                <tr>
                                                    <td rowspan="3"></td>
                                                    <td>2. Dokter Anestesi</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="sscko_dokter_anestesi_sign_in" id="sscko-dokter-anestesi-sign-in" class="select2c-input"></td>
                                                    <td class="center"><input type="checkbox"name="sscko_paraf_dokter_anestesi_sign_in"id="sscko-paraf-dokter-anestesi-sign-in" class="mr-1"></td>
                                                </tr>                                             
                                            </tbody>
                                            <tbody>
                                                <tr>
                                                    <td rowspan="3">Time Out</td>
                                                    <td>1. Operator</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="sscko_operator_1" id="sscko-operator-1" class="select2c-input"></td>
                                                    <td class="center"><input type="checkbox"name="sscko_paraf_operator_1"id="sscko-paraf-operator-1" class="mr-1"></td>
                                                </tr>                                             
                                            </tbody>
                                            <tbody>
                                                <tr>
                                                    <td rowspan="3"></td>
                                                    <td>2. Dokter Anestesi</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="sscko_dokter_anestesi_time_out" id="sscko-dokter-anestesi-time-out" class="select2c-input"></td>
                                                    <td class="center"><input type="checkbox"name="sscko_paraf_dokter_anestesi_time_out"id="sscko-paraf-dokter-anestesi-time-out" class="mr-1"></td>
                                                </tr>                                             
                                            </tbody>
                                            <tbody>
                                                <tr>
                                                    <td rowspan="3"></td>
                                                    <td>3. Perawat Sirkuler</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="sscko_perawat_time_out" id="sscko-perawat-time-out" class="select2c-input"></td>
                                                    <td class="center"><input type="checkbox"name="sscko_paraf_perawat_time_out"id="sscko-paraf-perawat-time-out" class="mr-1"></td>
                                                </tr>                                              
                                            </tbody>                                           
                                            <tbody>
                                                <tr>
                                                    <td rowspan="3">Sign Out</td>
                                                    <td>1. Operator</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="sscko_operator_2" id="sscko-operator-2" class="select2c-input"></td>
                                                    <td class="center"><input type="checkbox"name="sscko_paraf_operator_2"id="sscko-paraf-operator-2" class="mr-1"></td>
                                                </tr>                                             
                                            </tbody>
                                            <tbody>
                                                <tr>
                                                    <td rowspan="3"></td>
                                                    <td>2. Dokter Anestesi</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="sscko_dokter_anestesi_sign_out" id="sscko-dokter-anestesi-sign-out" class="select2c-input"></td>
                                                    <td class="center"><input type="checkbox"name="sscko_paraf_dokter_anestesi_sign_out"id="sscko-paraf-dokter-anestesi-sign-out" class="mr-1"></td>
                                                </tr>                                             
                                            </tbody>
                                        </table>
                                        <tr>
                                            <td colspan="6">
                                                <button type="button" title="Tambah Surgical Safety Ceklis Kamar Operasi" class="btn btn-info" onclick="tambahSurgicalSafetyCheklisKamarOperasi()"><i class="fas fa-arrow-circle-down mr-1"></i> Tambah Surgical Safety Ceklis Kamar Operasi</button>
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
                                                    <b>Catatan : Harap di perhatikan setelah mengisi form dan sebelum klik tombol Konfirmasi</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>Wajib mengklik tombol (Tambah Surgical Safety Cheklist Kamar Operasi) terlebih dahulu.</b>
                                                </td>
                                            </tr>
                                        </table>                                   
                                    </td>
                                </tr>                               
                            </tbody>
                        </table>
                    </div>
                </div>           
            </div>
        `;
        html += tutupRapet();
        $('#buka-tutup-sscko').append(html);
    }
  
    function konfirmasiSimpanSurgicalSafetyCheklistKamarOperasi() {
        if ($('#sscko-tanggal-tindakan').val() === '') {
            syams_validation('#sscko-tanggal-tindakan', 'Tanggal tindakan wajib diisi <br> klik tombol Tambah Surgical Safety Ckelis Kamar Operasi sebelum klik tombol konfirmasi.!!!');
            return false;
        } else {
            syams_validation_remove('#sscko-tanggal-tindakan');
        }

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
                simpanSurgicalSafetyCheklistKamarOperasi();
            }
        })
    }

    function simpanSurgicalSafetyCheklistKamarOperasi() {
        var id_layanan_pendaftaran_sscko = $('#id-layanan-pendaftaran-sscko').val(); 
        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/simpan_data_surgical_safety_cheklist_kamar_operasi") ?>',
            data: $('#form_surgical_safety_cheklist_kamar_operasi').serialize() + '&id-layanan-pendaftaran-sscko=' + id_layanan_pendaftaran_sscko,

            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.respon !== null) {
                    if (data.respon.show !== null) {
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
                        $('#modal_surgical_safety_cheklist_kamar_operasi').modal('hide');
                        showListForm($('#id-pendaftaran-sscko').val(), $('#id-layanan-pendaftaran-sscko').val(), $('#id-pasien-sscko').val());
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

    function resetSurgicalSafetyCheklisKamarOperasi() {
        $('#form_surgical_safety_cheklist_kamar_operasi')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false);
        
        $('#sscko-tanggal-tindakan').val('');
        $('#sscko-jam-1, #sscko-jam-2, #sscko-jam-3').val('');

        $('#s2id_sscko-perawat-sign-in a .select2c-chosen, #s2id_sscko-perawat-time-out a .select2c-chosen').empty();
        
        $('#sscko-perawat-sign-in, #sscko-perawat-time-out').val('');

        $('#s2id_sscko-dokter-anestesi-sign-in a .select2c-chosen, #s2id_sscko-operator-1 a .select2c-chosen,  #s2id_sscko-dokter-anestesi-time-out a .select2c-chosen, #s2id_sscko-operator-2 a .select2c-chosen, #s2id_sscko-dokter-anestesi-sign-out a .select2c-chosen').empty();

        $('#sscko-dokter-anestesi-sign-in, #sscko-operator-1, #sscko-dokter-anestesi-time-out, #sscko-operator-2, #sscko-dokter-anestesi-sign-out').val('');
        
        setTimeout(() => {
            $('')
                .val('#sscko-sebut, #sscko-jenis, #sscko-bedah, #sscko-anastesiii, #sscko-perawat');
            $('#form-sscko').find('input').each(function() {
                if ($(this).is(':checked')) {
                    $(this).prop('checked', false);
                }
            })
        }, 100)

        $('#buka-tutup-sscko').empty();
    }

    function showSSurgicalSafetyCeklisKamarOperasi(data, id_pendaftaran, id_layanan_pendaftaran, bed, action) {
        $('#tabel-sscko .body-table').empty();
        if (data !== null) {
            $.each(data, function(i, v) {

                let btnAksesLihat = '';
                if (action != 'lihat') {
                    btnAksesLihat = '<button type="button" class="btn btn-secondary btn-xs" onclick="editSurgicalSafetyCheklistKamarOperasi(this, ' +
                    v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                    '\')"><i class="fas fa-edit"></i> Edit</button> <button type="button" class="btn btn-secondary btn-xs" onclick="hapusSurgicalSafetyCheklisKamarOperasi(this, ' +
                    v.id +
                    ')"> <i class="fas fa-trash-alt"></i> Hapus</button>';
                }
                const selOp =
                '<td align="center"><button type="button" class="btn btn-secondary btn-xs" onclick="lihatSurgicalSafetyCheklistKamarOperasi(this, ' +
                v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                '\')"><i class="fas fa-eye"></i> Lihat</button>' +
                btnAksesLihat + 
                '</td>';
                let html = /* html */ `     
                    <tr>
                        <td class="number-terapi" align="center">${(++i)}</td>
                        <td align="center">${v.tanggal_tindakan}</td>  
                        <td align="center">${v.sscko_jam_1 || '-'}</td>                       
                        <td align="center">${v.perawat_1}</td>
                        <td align="center">${v.dokter_1}</td>                            
                        <td align="center">${v.sscko_jam_2 || '-'}</td>
                        <td align="center">${v.operator_1_dokter}</td>
                        <td align="center">${v.dokter_2}</td>
                        <td align="center">${v.perawat_2}</td>
                        <td align="center">${v.sscko_jam_3 || '-'}</td> 
                        <td align="center">${v.dokter_3}</td> 
                        <td align="center">${v.operator_2_dokter}</td>
                        <td align="center">${v.akun_user}</td>
                        ${selOp} 
                    </tr>
                `;
                $('#tabel-sscko tbody').append(html);
                numberSscko = i;
            })
        }
    }


    function lihatSurgicalSafetyCheklistKamarOperasi(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed) {   
         $('#modal-edit-surgical-safety-cheklist-kamar-operasi').modal('show');
         $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_surgical_safety_cheklist_kamar_operasi") ?>/id/' +
                id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {

                $('#update-sscko').empty();
                $('#id-surgical-safety-cheklist-kamar-operasi').val(id);

                function formatTanggalKhusus(waktu) {
                    var el = waktu.split('-');
                    var tahun = el[0];
                    var bulan = el[1];
                    var hari = el[2];
                    return hari + '/' + bulan + '/' + tahun;
                }
                let edit_tanggal_tindakan = formatTanggalKhusus(data.tanggal_tindakan);
                $('#edit-sscko-tanggal-tindakan').val(edit_tanggal_tindakan);    
                let cttntndkn = '';
                cttntndkn =
                    `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-surgical-safety-cheklist-kamar-operasi').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
                  `;
                $('#update-sscko').append(cttntndkn);

                $('#edit-sscko-jam-1').val(data.sscko_jam_1);
                $('#edit-sscko-jam-2').val(data.sscko_jam_2);
                $('#edit-sscko-jam-3').val(data.sscko_jam_3);
                data.sscko_igp == '1' ? $('#edit-sscko-igp').prop('checked', true)   : $('#edit-sscko-igp').prop('checked', false);
                data.sscko_npt == '1' ? $('#edit-sscko-npt').prop('checked', true)   : $('#edit-sscko-npt').prop('checked', false);
                data.sscko_lo == '1' ? $('#edit-sscko-lo').prop('checked', true)   : $('#edit-sscko-lo').prop('checked', false);
                data.sscko_np == '1' ? $('#edit-sscko-np').prop('checked', true)   : $('#edit-sscko-np').prop('checked', false);
                data.sscko_instrumen == '1' ? $('#edit-sscko-instrumen').prop('checked', true)   : $('#edit-sscko-instrumen').prop('checked', false);                   
                data.sscko_prosedur == '1' ? $('#edit-sscko-prosedur').prop('checked', true)   : $('#edit-sscko-prosedur').prop('checked', false);
                data.sscko_prosedurr == '1' ? $('#edit-sscko-prosedurr').prop('checked', true)   : $('#edit-sscko-prosedurr').prop('checked', false);
                data.sscko_specimen == '1' ? $('#edit-sscko-specimen').prop('checked', true)   : $('#edit-sscko-specimen').prop('checked', false);
                data.sscko_sio == '1' ? $('#edit-sscko-sio').prop('checked', true)   : $('#edit-sscko-sio').prop('checked', false);
                data.sscko_lokasi == '1' ? $('#edit-sscko-lokasi').prop('checked', true)   : $('#edit-sscko-lokasi').prop('checked', false);

                const ssckoTandaValue = data.sscko_tanda || '0';
                $('#edit-sscko-tanda-ya').prop('checked', ssckoTandaValue === '1');
                $('#edit-sscko-tanda-tidak').prop('checked', ssckoTandaValue === '2');

                const ssckoRencanaValue = data.sscko_rencana || '0';
                $('#edit-sscko-rencana-ya').prop('checked', ssckoRencanaValue === '1');
                $('#edit-sscko-rencana-tidak').prop('checked', ssckoRencanaValue === '2');

                const ssckoAdakahValue = data.sscko_adakah || '0';
                $('#edit-sscko-adakah-ya').prop('checked', ssckoAdakahValue === '1');
                $('#edit-sscko-adakah-tidak').prop('checked', ssckoAdakahValue === '2');
                
                const ssckoAlergiValue = data.sscko_alergi || '0';
                $('#edit-sscko-alergi-ya').prop('checked', ssckoAlergiValue === '1');
                $('#edit-sscko-alergi-tidak').prop('checked', ssckoAlergiValue === '2');

                const ssckoKemungkinanValue = data.sscko_kemungkinan || '0';
                $('#edit-sscko-kemungkinan-1').prop('checked', ssckoKemungkinanValue === '1');
                $('#edit-sscko-kemungkinan-2').prop('checked', ssckoKemungkinanValue === '2');

                const ssckoResikoValue = data.sscko_resiko || '0';
                $('#edit-sscko-resiko-1').prop('checked', ssckoResikoValue === '1');
                $('#edit-sscko-resiko-2').prop('checked', ssckoResikoValue === '2');

                const ssckoFotoValue = data.sscko_foto || '0';
                $('#edit-sscko-foto-1').prop('checked', ssckoFotoValue === '1');
                $('#edit-sscko-foto-2').prop('checked', ssckoFotoValue === '2');
               
                const ssckoAnastesiValue = data.sscko_anastesi || '0';
                $('#edit-sscko-anastesi-1').prop('checked', ssckoAnastesiValue === '1');
                $('#edit-sscko-anastesi-2').prop('checked', ssckoAnastesiValue === '2');
                $('#edit-sscko-anastesi-3').prop('checked', ssckoAnastesiValue === '3');
                $('#edit-sscko-anastesi-4').prop('checked', ssckoAnastesiValue === '4');

                data.sscko_antibiotik == '1' ? $('#edit-sscko-antibiotik').prop('checked', true)   : $('#edit-sscko-antibiotik').prop('checked', false);
                data.sscko_operator == '1' ? $('#edit-sscko-operator').prop('checked', true)   : $('#edit-sscko-operator').prop('checked', false);
                data.sscko_mesin == '1' ? $('#edit-sscko-mesin').prop('checked', true)   : $('#edit-sscko-mesin').prop('checked', false);
                $('#edit-sscko-bedah').val(data.sscko_bedah);                   
                data.sscko_monitor == '1' ? $('#edit-sscko-monitor').prop('checked', true)   : $('#edit-sscko-monitor').prop('checked', false);
                data.sscko_konfirmasi == '1' ? $('#edit-sscko-konfirmasi').prop('checked', true)   : $('#edit-sscko-konfirmasi').prop('checked', false);
                $('#edit-sscko-anastesiii').val(data.sscko_anastesiii);                   
                $('#edit-sscko-sebut').val(data.sscko_sebut);
                $('#edit-sscko-perawat').val(data.sscko_perawat);            
                $('#edit-sscko-jenis').val(data.sscko_jenis);           
                data.sscko_paraf_perawat_sign_in == '1' ? $('#edit-sscko-paraf-perawat-sign-in').prop('checked', true)   : $('#edit-sscko-paraf-perawat-sign-in').prop('checked', false);
                data.sscko_paraf_perawat_time_out == '1' ? $('#edit-sscko-paraf-perawat-time-out').prop('checked', true)   : $('#edit-sscko-paraf-perawat-time-out').prop('checked', false);
                data.sscko_paraf_operator_2 == '1' ? $('#edit-sscko-paraf-operator-2').prop('checked', true)   : $('#edit-sscko-paraf-operator-2').prop('checked', false); 
                data.sscko_paraf_dokter_anestesi_sign_in == '1' ? $('#edit-sscko-paraf-dokter-anestesi-sign-in').prop('checked', true)   : $('#edit-sscko-paraf-dokter-anestesi-sign-in').prop('checked', false);                     
                data.sscko_paraf_dokter_anestesi_time_out == '1' ? $('#edit-sscko-paraf-dokter-anestesi-time-out').prop('checked', true)   : $('#edit-sscko-paraf-dokter-anestesi-time-out').prop('checked', false);
                data.sscko_paraf_dokter_anestesi_sign_out == '1' ? $('#edit-sscko-paraf-dokter-anestesi-sign-out').prop('checked', true)   : $('#edit-sscko-paraf-dokter-anestesi-sign-out').prop('checked', false);
                data.sscko_paraf_operator_1 == '1' ? $('#edit-sscko-paraf-operator-1').prop('checked', true)   : $('#edit-sscko-operator-1').prop('checked', false);
                $('#edit-sscko-perawat-sign-in').val(data.sscko_perawat_sign_in);
                $('#s2id_edit-sscko-perawat-sign-in a .select2c-chosen').html(data.perawat_1);
                $('#edit-sscko-perawat-time-out').val(data.sscko_perawat_time_out);
                $('#s2id_edit-sscko-perawat-time-out a .select2c-chosen').html(data.perawat_2);              
                
                $('#edit-sscko-dokter-anestesi-sign-in').val(data.sscko_dokter_anestesi_sign_in);
                $('#s2id_edit-sscko-dokter-anestesi-sign-in a .select2c-chosen').html(data.dokter_1);
                $('#edit-sscko-operator-1').val(data.sscko_operator_1);
                $('#s2id_edit-sscko-operator-1 a .select2c-chosen').html(data.operator_1_dokter);

                $('#edit-sscko-operator-2').val(data.sscko_operator_2);
                $('#s2id_edit-sscko-operator-2 a .select2c-chosen').html(data.operator_2_dokter);

                $('#edit-sscko-dokter-anestesi-time-out').val(data.sscko_dokter_anestesi_time_out);
                $('#s2id_edit-sscko-dokter-anestesi-time-out a .select2c-chosen').html(data.dokter_2);

                $('#edit-sscko-dokter-anestesi-sign-out').val(data.sscko_dokter_anestesi_sign_out);
                $('#s2id_edit-sscko-dokter-anestesi-sign-out a .select2c-chosen').html(data.dokter_3);
                // modal.modal('show');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })      
    }


    function editSurgicalSafetyCheklistKamarOperasi(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed) {   
        const modal = $('#modal-edit-surgical-safety-cheklist-kamar-operasi');
        $('#update-sscko').children().remove();
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_surgical_safety_cheklist_kamar_operasi") ?>/id/' +
                id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                // console.log(data);
                $('#update-sscko').empty();
                $('#id-surgical-safety-cheklist-kamar-operasi').val(id);

                function formatTanggalKhusus(waktu) {
                    var el = waktu.split('-');
                    var tahun = el[0];
                    var bulan = el[1];
                    var hari = el[2];
                    return hari + '/' + bulan + '/' + tahun;
                }

                let edit_tanggal_tindakan = formatTanggalKhusus(data.tanggal_tindakan);
                $('#edit-sscko-tanggal-tindakan').val(edit_tanggal_tindakan);                 

                let cttntndkn = '';
                cttntndkn =
                    `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-surgical-safety-cheklist-kamar-operasi').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
                    <button type="button" class="btn btn-info waves-effect" onclick="updateSurgicalSafetyCheklisKamarOperasi(${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')"><i class="fas fa-save mr-1"></i>Update</button>`;
                $('#update-sscko').append(cttntndkn);

                $('#edit-sscko-jam-1').val(data.sscko_jam_1);
                $('#edit-sscko-jam-2').val(data.sscko_jam_2);
                $('#edit-sscko-jam-3').val(data.sscko_jam_3);
                data.sscko_igp == '1' ? $('#edit-sscko-igp').prop('checked', true)   : $('#edit-sscko-igp').prop('checked', false);
                data.sscko_npt == '1' ? $('#edit-sscko-npt').prop('checked', true)   : $('#edit-sscko-npt').prop('checked', false);
                data.sscko_lo == '1' ? $('#edit-sscko-lo').prop('checked', true)   : $('#edit-sscko-lo').prop('checked', false);
                data.sscko_np == '1' ? $('#edit-sscko-np').prop('checked', true)   : $('#edit-sscko-np').prop('checked', false);
                data.sscko_instrumen == '1' ? $('#edit-sscko-instrumen').prop('checked', true)   : $('#edit-sscko-instrumen').prop('checked', false);                   
                data.sscko_prosedur == '1' ? $('#edit-sscko-prosedur').prop('checked', true)   : $('#edit-sscko-prosedur').prop('checked', false);
                data.sscko_prosedurr == '1' ? $('#edit-sscko-prosedurr').prop('checked', true)   : $('#edit-sscko-prosedurr').prop('checked', false);
                data.sscko_specimen == '1' ? $('#edit-sscko-specimen').prop('checked', true)   : $('#edit-sscko-specimen').prop('checked', false);
                data.sscko_sio == '1' ? $('#edit-sscko-sio').prop('checked', true)   : $('#edit-sscko-sio').prop('checked', false);
                data.sscko_lokasi == '1' ? $('#edit-sscko-lokasi').prop('checked', true)   : $('#edit-sscko-lokasi').prop('checked', false);

                const ssckoTandaValue = data.sscko_tanda || '0';
                $('#edit-sscko-tanda-ya').prop('checked', ssckoTandaValue === '1');
                $('#edit-sscko-tanda-tidak').prop('checked', ssckoTandaValue === '2');

                const ssckoRencanaValue = data.sscko_rencana || '0';
                $('#edit-sscko-rencana-ya').prop('checked', ssckoRencanaValue === '1');
                $('#edit-sscko-rencana-tidak').prop('checked', ssckoRencanaValue === '2');

                const ssckoAdakahValue = data.sscko_adakah || '0';
                $('#edit-sscko-adakah-ya').prop('checked', ssckoAdakahValue === '1');
                $('#edit-sscko-adakah-tidak').prop('checked', ssckoAdakahValue === '2');
                
                const ssckoAlergiValue = data.sscko_alergi || '0';
                $('#edit-sscko-alergi-ya').prop('checked', ssckoAlergiValue === '1');
                $('#edit-sscko-alergi-tidak').prop('checked', ssckoAlergiValue === '2');

                const ssckoKemungkinanValue = data.sscko_kemungkinan || '0';
                $('#edit-sscko-kemungkinan-1').prop('checked', ssckoKemungkinanValue === '1');
                $('#edit-sscko-kemungkinan-2').prop('checked', ssckoKemungkinanValue === '2');

                const ssckoResikoValue = data.sscko_resiko || '0';
                $('#edit-sscko-resiko-1').prop('checked', ssckoResikoValue === '1');
                $('#edit-sscko-resiko-2').prop('checked', ssckoResikoValue === '2');

                const ssckoFotoValue = data.sscko_foto || '0';
                $('#edit-sscko-foto-1').prop('checked', ssckoFotoValue === '1');
                $('#edit-sscko-foto-2').prop('checked', ssckoFotoValue === '2');

                const ssckoAnastesiValue = data.sscko_anastesi || '0';
                $('#edit-sscko-anastesi-1').prop('checked', ssckoAnastesiValue === '1');
                $('#edit-sscko-anastesi-2').prop('checked', ssckoAnastesiValue === '2');
                $('#edit-sscko-anastesi-3').prop('checked', ssckoAnastesiValue === '3');
                $('#edit-sscko-anastesi-4').prop('checked', ssckoAnastesiValue === '4');

                data.sscko_antibiotik == '1' ? $('#edit-sscko-antibiotik').prop('checked', true)   : $('#edit-sscko-antibiotik').prop('checked', false);
                data.sscko_operator == '1' ? $('#edit-sscko-operator').prop('checked', true)   : $('#edit-sscko-operator').prop('checked', false);
                data.sscko_mesin == '1' ? $('#edit-sscko-mesin').prop('checked', true)   : $('#edit-sscko-mesin').prop('checked', false);
                $('#edit-sscko-bedah').val(data.sscko_bedah);                   
                data.sscko_monitor == '1' ? $('#edit-sscko-monitor').prop('checked', true)   : $('#edit-sscko-monitor').prop('checked', false);
                data.sscko_konfirmasi == '1' ? $('#edit-sscko-konfirmasi').prop('checked', true)   : $('#edit-sscko-konfirmasi').prop('checked', false);
                $('#edit-sscko-anastesiii').val(data.sscko_anastesiii);                   
                $('#edit-sscko-sebut').val(data.sscko_sebut);
                $('#edit-sscko-perawat').val(data.sscko_perawat);            
                $('#edit-sscko-jenis').val(data.sscko_jenis);           
                data.sscko_paraf_perawat_sign_in == '1' ? $('#edit-sscko-paraf-perawat-sign-in').prop('checked', true)   : $('#edit-sscko-paraf-perawat-sign-in').prop('checked', false);
                data.sscko_paraf_perawat_time_out == '1' ? $('#edit-sscko-paraf-perawat-time-out').prop('checked', true)   : $('#edit-sscko-paraf-perawat-time-out').prop('checked', false);
                data.sscko_paraf_operator_2 == '1' ? $('#edit-sscko-paraf-operator-2').prop('checked', true)   : $('#edit-sscko-paraf-operator-2').prop('checked', false); 
                data.sscko_paraf_dokter_anestesi_sign_in == '1' ? $('#edit-sscko-paraf-dokter-anestesi-sign-in').prop('checked', true)   : $('#edit-sscko-paraf-dokter-anestesi-sign-in').prop('checked', false);                     
                data.sscko_paraf_dokter_anestesi_time_out == '1' ? $('#edit-sscko-paraf-dokter-anestesi-time-out').prop('checked', true)   : $('#edit-sscko-paraf-dokter-anestesi-time-out').prop('checked', false);
                data.sscko_paraf_dokter_anestesi_sign_out == '1' ? $('#edit-sscko-paraf-dokter-anestesi-sign-out').prop('checked', true)   : $('#edit-sscko-paraf-dokter-anestesi-sign-out').prop('checked', false);
                data.sscko_paraf_operator_1 == '1' ? $('#edit-sscko-paraf-operator-1').prop('checked', true)   : $('#edit-sscko-operator-1').prop('checked', false);
                $('#edit-sscko-perawat-sign-in').val(data.sscko_perawat_sign_in);
                $('#s2id_edit-sscko-perawat-sign-in a .select2c-chosen').html(data.perawat_1);
                $('#edit-sscko-perawat-time-out').val(data.sscko_perawat_time_out);
                $('#s2id_edit-sscko-perawat-time-out a .select2c-chosen').html(data.perawat_2);              
                
                $('#edit-sscko-dokter-anestesi-sign-in').val(data.sscko_dokter_anestesi_sign_in);
                $('#s2id_edit-sscko-dokter-anestesi-sign-in a .select2c-chosen').html(data.dokter_1);
                $('#edit-sscko-operator-1').val(data.sscko_operator_1);
                $('#s2id_edit-sscko-operator-1 a .select2c-chosen').html(data.operator_1_dokter);

                $('#edit-sscko-operator-2').val(data.sscko_operator_2);
                $('#s2id_edit-sscko-operator-2 a .select2c-chosen').html(data.operator_2_dokter);

                $('#edit-sscko-dokter-anestesi-time-out').val(data.sscko_dokter_anestesi_time_out);
                $('#s2id_edit-sscko-dokter-anestesi-time-out a .select2c-chosen').html(data.dokter_2);

                $('#edit-sscko-dokter-anestesi-sign-out').val(data.sscko_dokter_anestesi_sign_out);
                $('#s2id_edit-sscko-dokter-anestesi-sign-out a .select2c-chosen').html(data.dokter_3);

                modal.modal('show');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }

    function updateSurgicalSafetyCheklisKamarOperasi(id_pendaftaran, id_layanan_pendaftaran, bed) {
        // console.log($('#form-edit-surgical-safety-cheklist-kamar-operasi').serialize());
        $.ajax({
            type: 'PUT',
            url: '<?= base_url("pelayanan/api/pelayanan/update_surgical_safety_cheklist_kamar_operasi") ?>',
            data: $('#form-edit-surgical-safety-cheklist-kamar-operasi').serialize(),
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data.status) {
                    messageEditSuccess();
                    entriSurgicalSafetyCheklisKamarOperasi(id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    messageEditFailed();
                }
                $('#modal-edit-surgical-safety-cheklist-kamar-operasi').modal('hide');
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    if (typeof numberSscko === 'undefined') {
        var numberSscko = 1;
    }
    
    function tambahSurgicalSafetyCheklisKamarOperasi() {      
        if ($('#sscko-tanggal-tindakan').val() === '') {
            syams_validation('#sscko-tanggal-tindakan', 'Tanggal pengkajian harus diisi.');
            return false;
        } else {
            syams_validation_remove('#sscko-tanggal-tindakan');
        }

        let html = '';
        let sscko_jam_1 = $('#sscko-jam-1').val();
        let sscko_jam_2 = $('#sscko-jam-2').val();
        let sscko_jam_3 = $('#sscko-jam-3').val();         
        let sscko_tanggal_tindakan = $('#sscko-tanggal-tindakan').val();  
        let sscko_igp = $('#sscko-igp').is(':checked');
        let sscko_npt = $('#sscko-npt').is(':checked');
        let sscko_konfirmasi = $('#sscko-konfirmasi').is(':checked');
        let sscko_lo = $('#sscko-lo').is(':checked');
        let sscko_np = $('#sscko-np').is(':checked');
        let sscko_instrumen = $('#sscko-instrumen').is(':checked');
        let sscko_prosedur = $('#sscko-prosedur').is(':checked');
        let sscko_prosedurr = $('#sscko-prosedurr').is(':checked');
        let sscko_specimen = $('#sscko-specimen').is(':checked');
        let sscko_sio = $('#sscko-sio').is(':checked');
        let sscko_lokasi = $('#sscko-lokasi').is(':checked');

        let sscko_tanda = $('#sscko-tanda-ya:checked, #sscko-tanda-tidak:checked').val();
        let sscko_alergi = $('#sscko-alergi-ya:checked, #sscko-alergi-tidak:checked').val();
        let sscko_adakah = $('#sscko-adakah-ya:checked, #sscko-adakah-tidak:checked').val();
        let sscko_rencana = $('#sscko-rencana-ya:checked, #sscko-rencana-tidak:checked').val();
        let sscko_kemungkinan = $('#sscko-kemungkinan-1:checked, #sscko-kemungkinan-2:checked').val();
        let sscko_foto = $('#sscko-foto-1:checked, #sscko-foto-2:checked').val();
        let sscko_resiko = $('#sscko-resiko-1:checked, #sscko-resiko-2:checked').val();       
        let sscko_anastesi = $('#sscko-anastesi-1:checked, #sscko-anastesi-2:checked, #sscko-anastesi-3:checked, #sscko-anastesi-4:checked').val();

        let sscko_antibiotik = $('#sscko-antibiotik').is(':checked');
        let sscko_operator = $('#sscko-operator').is(':checked');
        let sscko_mesin = $('#sscko-mesin').is(':checked');
        let sscko_bedah = $('#sscko-bedah').val();            
        let sscko_monitor = $('#sscko-monitor').is(':checked');    
        let sscko_anastesiii = $('#sscko-anastesiii').val();  
        let sscko_sebut = $('#sscko-sebut').val();  
        let sscko_perawat = $('#sscko-perawat').val(); 
        let sscko_jenis = $('#sscko-jenis').val();       
        let sscko_paraf_perawat_sign_in = $('#sscko-paraf-perawat-sign-in').is(':checked');
        let sscko_paraf_perawat_time_out = $('#sscko-paraf-perawat-time-out').is(':checked');
        let sscko_paraf_operator_2 = $('#sscko-paraf-operator-2').is(':checked');
        let perawat_1 = $('#s2id_sscko-perawat-sign-in a .select2c-chosen').html();   
        let sscko_perawat_sign_in = $('#sscko-perawat-sign-in').val();
        let perawat_2 = $('#s2id_sscko-perawat-time-out a .select2c-chosen').html();   
        let sscko_perawat_time_out = $('#sscko-perawat-time-out').val();
        let operator_2_dokter = $('#s2id_sscko-operator-2 a .select2c-chosen').html();   
        let sscko_operator_2 = $('#sscko-operator-2').val();         
        let sscko_paraf_dokter_anestesi_sign_in = $('#sscko-paraf-dokter-anestesi-sign-in').is(':checked');
        let sscko_paraf_dokter_anestesi_time_out = $('#sscko-paraf-dokter-anestesi-time-out').is(':checked');
        let sscko_paraf_dokter_anestesi_sign_out = $('#sscko-paraf-dokter-anestesi-sign-out').is(':checked');
        let sscko_paraf_operator_1 = $('#sscko-paraf-operator-1').is(':checked');
        let dokter_1 = $('#s2id_sscko-dokter-anestesi-sign-in a .select2c-chosen').html();   
        let sscko_dokter_anestesi_sign_in = $('#sscko-dokter-anestesi-sign-in').val();
        let dokter_2 = $('#s2id_sscko-dokter-anestesi-time-out a .select2c-chosen').html();   
        let sscko_dokter_anestesi_time_out = $('#sscko-dokter-anestesi-time-out').val();
        let operator_1_dokter = $('#s2id_sscko-operator-1 a .select2c-chosen').html(); 
        let sscko_operator_1 = $('#sscko-operator-1').val();          
        let dokter_3 = $('#s2id_sscko-dokter-anestesi-sign-out a .select2c-chosen').html();   
        let sscko_dokter_anestesi_sign_out = $('#sscko-dokter-anestesi-sign-out').val();        
        html = /* html */ `
            <tr class="row-in-${++numberSscko}">
                <td class="number-pengkajian" align="center">${numberSscko++}</td>
                <td align="center">
                    <input type="hidden" name="sscko_tanggal_tindakan[]" value="${sscko_tanggal_tindakan}">${sscko_tanggal_tindakan}
                </td>
                <td align="center">
                    <input type="hidden" name="sscko_jam_1[]" value="${sscko_jam_1}">${sscko_jam_1}
                </td>
                <td align="center">
                    <input type="hidden" name="sscko_perawat_sign_in[]" value="${sscko_perawat_sign_in}">${perawat_1}
                </td>
                <td align="center">
                    <input type="hidden" name="sscko_dokter_anestesi_sign_in[]" value="${sscko_dokter_anestesi_sign_in}">${dokter_1}
                </td>
                <td align="center">
                    <input type="hidden" name="sscko_jam_2[]" value="${sscko_jam_2}">${sscko_jam_2}
                </td>
                <td align="center">
                    <input type="hidden" name="sscko_operator_1[]" value="${sscko_operator_1}">${operator_1_dokter}
                </td>
                <td align="center">
                    <input type="hidden" name="sscko_dokter_anestesi_time_out[]" value="${sscko_dokter_anestesi_time_out}">${dokter_2}
                </td>
                <td align="center">
                    <input type="hidden" name="sscko_perawat_time_out[]" value="${sscko_perawat_time_out}">${perawat_2}
                </td>
                <td align="center">
                    <input type="hidden" name="sscko_jam_3[]" value="${sscko_jam_3}">${sscko_jam_3}
                </td>
                <td align="center">
                    <input type="hidden" name="sscko_operator_2[]" value="${sscko_operator_2}">${operator_2_dokter}
                </td>                
                <td align="center">
                    <input type="hidden" name="sscko_dokter_anestesi_sign_out[]" value="${sscko_dokter_anestesi_sign_out}">${dokter_3}
                </td>              
                <td align="center">
                    <?= $this->session->userdata('nama') ?>
                    <input type="hidden" name="user_pengkajian[]" value="<?= $this->session->userdata("id_translucent") ?>">
                    <input type="hidden" name="pengkajian_date_surgical_safety_cheklis_kamar_operasi[]" value="<?= date("Y-m-d H:i:s") ?>">
                    <input type="hidden" name="sscko_konfirmasi[]" value="${sscko_konfirmasi ? 1 : 0}">
                    <input type="hidden" name="sscko_igp[]" value="${sscko_igp ? 1 : 0}">
                    <input type="hidden" name="sscko_npt[]" value="${sscko_npt ? 1 : 0}">
                    <input type="hidden" name="sscko_lo[]" value="${sscko_lo ? 1 : 0}">
                    <input type="hidden" name="sscko_np[]" value="${sscko_np ? 1 : 0}">
                    <input type="hidden" name="sscko_instrumen[]" value="${sscko_instrumen ? 1 : 0}">
                    <input type="hidden" name="sscko_prosedur[]" value="${sscko_prosedur ? 1 : 0}">
                    <input type="hidden" name="sscko_prosedurr[]" value="${sscko_prosedurr ? 1 : 0}">
                    <input type="hidden" name="sscko_specimen[]" value="${sscko_specimen ? 1 : 0}">
                    <input type="hidden" name="sscko_sio[]" value="${sscko_sio ? 1 : 0}">
                    <input type="hidden" name="sscko_lokasi[]" value="${sscko_lokasi ? 1 : 0}">   

                    <input type="hidden" name="sscko_tanda[]" value="${(sscko_tanda !== undefined && sscko_tanda >= 1 && sscko_tanda <= 2) ? sscko_tanda : 0}">
                    <input type="hidden" name="sscko_alergi[]" value="${(sscko_alergi !== undefined && sscko_alergi >= 1 && sscko_alergi <= 2) ? sscko_alergi : 0}">
                    <input type="hidden" name="sscko_adakah[]" value="${(sscko_adakah !== undefined && sscko_adakah >= 1 && sscko_adakah <= 2) ? sscko_adakah : 0}">
                    <input type="hidden" name="sscko_kemungkinan[]" value="${(sscko_kemungkinan !== undefined && sscko_kemungkinan >= 1 && sscko_kemungkinan <= 2) ? sscko_kemungkinan : 0}">
                    <input type="hidden" name="sscko_foto[]" value="${(sscko_foto !== undefined && sscko_foto >= 1 && sscko_foto <= 2) ? sscko_foto : 0}">
                    <input type="hidden" name="sscko_resiko[]" value="${(sscko_resiko !== undefined && sscko_resiko >= 1 && sscko_resiko <= 2) ? sscko_resiko : 0}">
                    <input type="hidden" name="sscko_rencana[]" value="${(sscko_rencana !== undefined && sscko_rencana >= 1 && sscko_rencana <= 2) ? sscko_rencana : 0}">              
                    <input type="hidden" name="sscko_anastesi[]" value="${(sscko_anastesi !== undefined && sscko_anastesi >= 1 && sscko_anastesi <= 4) ? sscko_anastesi : 0}">

                    <input type="hidden" name="sscko_antibiotik[]" value="${sscko_antibiotik ? 1 : 0}">
                    <input type="hidden" name="sscko_operator[]" value="${sscko_operator ? 1 : 0}">
                    <input type="hidden" name="sscko_mesin[]" value="${sscko_mesin ? 1 : 0}">                     
                    <input type="hidden" name="sscko_bedah[]" value="${sscko_bedah}">
                    <input type="hidden" name="sscko_monitor[]" value="${sscko_monitor ? 1 : 0}">
                    <input type="hidden" name="sscko_anastesiii[]" value="${sscko_anastesiii}">
                    <input type="hidden" name="sscko_sebut[]" value="${sscko_sebut}">
                    <input type="hidden" name="sscko_perawat[]" value="${sscko_perawat}">     
                    <input type="hidden" name="sscko_jenis[]" value="${sscko_jenis}">                  
                    <input type="hidden" name="sscko_paraf_perawat_sign_in[]" value="${sscko_paraf_perawat_sign_in ? 1 : 0}">
                    <input type="hidden" name="sscko_paraf_perawat_time_out[]" value="${sscko_paraf_perawat_time_out ? 1 : 0}">
                    <input type="hidden" name="sscko_paraf_operator_2[]" value="${sscko_paraf_operator_2 ? 1 : 0}">
                    <input type="hidden" name="sscko_paraf_dokter_anestesi_sign_in[]" value="${sscko_paraf_dokter_anestesi_sign_in ? 1 : 0}">
                    <input type="hidden" name="sscko_paraf_dokter_anestesi_time_out[]" value="${sscko_paraf_dokter_anestesi_time_out ? 1 : 0}">
                    <input type="hidden" name="sscko_paraf_dokter_anestesi_sign_out[]" value="${sscko_paraf_dokter_anestesi_sign_out ? 1 : 0}">
                    <input type="hidden" name="sscko_paraf_operator_1[]" value="${sscko_paraf_operator_1 ? 1 : 0}">                                    
                </td>
                <td align="center">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        `;
        $('#tabel-sscko .body-table').append(html);
    }

    function hapusSurgicalSafetyCheklisKamarOperasi(obj, id) {
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
                            url: '<?= base_url("pelayanan/api/pelayanan/hapus_surgical_safety_cheklist_kamar_operasi") ?>/' +
                                id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    removeList(obj);
                                } else {
                                    customAlert('Hapus Surgical Safety Cheklis Kamar Operasi', data
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