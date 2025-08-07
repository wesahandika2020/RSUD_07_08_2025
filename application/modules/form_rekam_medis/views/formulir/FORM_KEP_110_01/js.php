<script>
    $(function() {
        $('#buka-tutup-surgical-safety-ceklis').one('click', function() {

            // dokter
            $('#dko_dokter_sign_in, #dko_operator_time_out, #dko_dokter_time_out, #dko_operator_sign_out, #dko_dokter_sign_out').select2c({
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

            // perawat dan bidan
            $('#dko_perawat_sign_in, #dko_perawat_time_out').select2c({
                ajax: {
                    url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
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

            // jam
            $('#dko_jam_sign_in, #dko_jam_time_out, #dko_jam_sign_out').datetimepicker({
                format: 'HH:mm',
                maxDate: new Date(),
                beforeShow: function(i) {
                    if ($(i).attr('readonly')) {
                        return false;
                    }
                }
            });

            // tanggal
            $('#dko_tanggal_verifikasi').datetimepicker({
                format: 'DD/MM/YYYY',
                maxDate: new Date(),
                beforeShow: function(i) {
                    if ($(i).attr('readonly')) {
                        return false;
                    }
                }
            });

            // disable keterangan alergi
            $('input[type=radio][name=dko_alergi]').change(function() {
                if (this.value == '0') {
                    $('#dko_alergi_ket').val('');
                    $('#dko_alergi_ket').prop('disabled', true);
                } else {
                    $('#dko_alergi_ket').val('');
                    $('#dko_alergi_ket').prop('disabled', false);
                }
            });
            
        })

        showFormSurgicalSafetyCeklis(); 

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

    function lihatFORM_KEP_110_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';

        entriKeperawatan(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function editFORM_KEP_110_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';

        entriKeperawatan(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function tambahFORM_KEP_110_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';

        entriKeperawatan(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function entriKeperawatan(id_pendaftaran, id_layanan_pendaftaran, bed, action) {
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
            url: '<?= base_url("pelayanan/api/pelayanan/get_data_entri_keperawatan") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {
                resetFormEntriKeperawatan();
                // data pasien
                $('#ek_id_layanan_pendaftaran').val(data.layanan.id);
                $('#ek_id_pendaftaran').val(data.layanan.id_pendaftaran);
                if (data.pasien.tanggal_lahir !== null) {
					umur = hitungUmur(data.pasien.tanggal_lahir) + ' (' + datefmysql(data.pasien.tanggal_lahir) + ')';
				}
                $('#ek_pasien_nama').text(data.pasien.nama);
                $('#ek_pasien_no_rm').text(data.pasien.no_rm);
                $('#ek_pasien_tanggal_lahir').text(umur);
                $('#ek_pasien_jenis_kelamin').text(data.pasien.kelamin == 'L' ? 'Laki-laki' : 'Perempuan');
                $('#ek_pasien_alamat').text(data.pasien.alamat);
                $('#ek_bed').text(bed);
                $('.ek-logo-pasien-alergi').hide();
                if (data.profil !== null) {
                    // status profil pasien
                    if (data.profil.is_alergi == 'Ya') {
                        $('.ek-logo-pasien-alergi').show();
                    }
                }
                
                // show surgical safety ceklis
                if (typeof data.surgical_luar_kamar !== 'undefined' | data.surgical_luar_kamar !== null) {
                    showSurgicalSafetyCeklis(data.surgical_luar_kamar, id_pendaftaran,
                        id_layanan_pendaftaran, bed, action);
                } else {
                    $('#tabel-surgical-safety-ceklis').empty();
                }
                // $('#tabel-surgical-safety-ceklis').empty();

                $('#modal_entri_keperawatan_rm').modal('show');
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                accessFailed(e.status);
            },
        });
    }

    function showFormSurgicalSafetyCeklis() {

        let html = bukaLebar('Form Surgical Safety Ceklis');

        html += /* html */ `
            <div class="row">
                <div class="col-lg-4">
                    <table class="table table-no-border table-sm table-striped">
                        <thead>
                            <tr>
                                <td colspan="3">
                                    <div class="input-group"><b>SIGN IN</b><input type="text" name="dko_jam_sign_in" id="dko_jam_sign_in" class="custom-form clear-d-inline-block col-lg-2 ml-2" placeholder="hh:mm"></div>
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
                                <td><input type="checkbox" class="mr-2" name="dko_gelang" id="dko_gelang" value="1">Ya</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>- Lokasi operasi</td>
                                <td><input type="checkbox" class="mr-2" name="dko_lokasi" id="dko_lokasi" value="1">Ya</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>- Prosedur</td>
                                <td><input type="checkbox" class="mr-2" name="dko_prosedur" id="dko_prosedur" value="1">Ya</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>- Surat izin opreasi</td>
                                <td><input type="checkbox" class="mr-2" name="dko_izin" id="dko_izin" value="1">Ya</td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td colspan="2">Lokasi operasi sudah diberi tanda ?</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="radio" class="mr-2" name="dko_tanda" id="dko_tanda_ya" value="1">Ya</td>
                                <td><input type="radio" class="mr-2" name="dko_tanda" id="dko_tanda_tidak" value="0">Tidak dilakukan</td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td colspan="2">Obat-obatan sudah dicek lengkap ?</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2"><input type="checkbox" class="mr-2" name="dko_obat" id="dko_obat" value="1">Ya</td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td colspan="2">Apakah pasien mempunyai riwayat alergi ?</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="radio" class="mr-2" name="dko_alergi" id="dko_alergi_tidak" value="0">Tidak</td>
                                <td>
                                    <div class="input-group">
                                        <input type="radio" class="mr-2" name="dko_alergi" id="dko_alergi_ya" value="1">Ya, sebutkan <input type="text" name="dko_alergi_ket" id="dko_alergi_ket" class="custom-form clear-input d-inline-block ml-1" disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>5.</td>
                                <td colspan="2">Kemungkinan kesullitan jalan nafas atau risiko aspirasi ?</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="radio" class="mr-2" name="dko_aspirasi" id="dko_aspirasi_tidak" value="0">Tidak</td>
                                <td><input type="radio" class="mr-2" name="dko_aspirasi" id="dko_aspirasi_ya" value="1">Peralatan dan asisten telah tersedia</td>
                            </tr>
                            <tr>
                                <td>6.</td>
                                <td colspan="2">Risiko kehilangan darah > 500ml (7ml/kgBB pada anak) ?</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="radio" class="mr-2" name="dko_darah" id="dko_darah_tidak" value="0">Tidak</td>
                                <td><input type="radio" class="mr-2" name="dko_darah" id="dko_darah_ya" value="1">Ya, tersedia dua akses intravena/sentral dan terapi cairan sudah direncanakan</td>
                            </tr>
                            <tr>
                                <td>7.</td>
                                <td colspan="2">Rencana anestesi</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">
                                    <input type="radio" class="mr-1" name="dko_anestesi" id="dko_anestesi_umum" value="0">Umum
                                    <input type="radio" class="mr-1 ml-3" name="dko_anestesi" id="dko_anestesi_regional" value="1">Regional
                                    <input type="radio" class="mr-1 ml-3" name="dko_anestesi" id="dko_anestesi_blok" value="2">Blok
                                    <input type="radio" class="mr-1 ml-3" name="dko_anestesi" id="dko_anestesi_lokal" value="3">Lokal
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
                                    <div class="input-group"><b>TIME OUT</b><input type="text" name="dko_jam_time_out" id="dko_jam_time_out" class="custom-form clear-d-inline-block col-lg-2 ml-2" placeholder="hh:mm"></div>
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
                                <td><input type="checkbox" class="mr-2" name="dko_konfirmasi" id="dko_konfirmasi" value="1">Ya</td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td colspan="2">Konfirmasi secara verbal</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td width="50%">- Nama pasien</td>
                                <td><input type="checkbox" class="mr-2" name="dko_nama" id="dko_nama" value="1">Ya</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>- Prosedur</td>
                                <td><input type="checkbox" class="mr-2" name="dko_prosedur_time_out" id="dko_prosedur_time_out" value="1">Ya</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>- Lokasi dimana insisi akan dibuat</td>
                                <td><input type="checkbox" class="mr-2" name="dko_insisi" id="dko_insisi" value="1">Ya</td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td colspan="2">Antibiotik profilaksis telah diberikan selama 60 menit sebelumnya ?</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="checkbox" class="mr-2" name="dko_profilaksis" id="dko_profilaksis" value="1">Ya</td>
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
                                <td colspan="2"><textarea name="dko_dokter_bedah_ket" id="dko_dokter_bedah_ket" class="form-control" rows="3"></textarea></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2"><b>Review dokter anestesi :</b> Apa ada hal khusus yang perlu diperhatikan pada pasien ?</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2"><textarea name="dko_dokter_anestesi_ket" id="dko_dokter_anestesi_ket" class="form-control" rows="3"></textarea></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2"><b>Review tim perawat :</b> Apakah peralatan sudah steril, adakah alat-alat yang perlu diperhatikan khusus atau dalam masalah ?</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2"><textarea name="dko_perawat_ket" id="dko_perawat_ket" class="form-control" rows="3"></textarea></td>
                            </tr>
                            <tr>
                                <td>5.</td>
                                <td colspan="2">Foto rongent/CT scan/MRI yang diperlukan telah ditayangkan</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="radio" class="mr-2" name="dko_foto" id="dko_foto_ya" value="1">Ya</td>
                                <td><input type="radio" class="mr-2" name="dko_foto" id="dko_foto_tidak" value="0">Tidak dilakukan</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4">
                    <table class="table table-no-border table-sm table-striped">
                        <thead>
                            <tr>
                                <td colspan="3">
                                    <div class="input-group"><b>SIGN OUT</b><input type="text" name="dko_jam_sign_out" id="dko_jam_sign_out" class="custom-form clear-d-inline-block col-lg-2 ml-2" placeholder="hh:mm"></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">(Dilakukan sebelum pasien meninggalkan OK, diisi oleh perawat, dokter anestesi dan operator)</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td colspan="2">Perawat melakukan konvirmasi secara verbal</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>- Nama prosedur tindakan</td>
                                <td><input type="checkbox" class="mr-2" name="dko_tindakan" id="dko_tindakan" value="1">Ya</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>- Instrumen, kasa dan jarum telah dihitung secara lengkap</td>
                                <td><input type="checkbox" class="mr-2" name="dko_instrumen" id="dko_instrumen" value="1">Ya</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>- Specimen telah diberi label (termasuk nama pasien & asal jaringan specimen)</td>
                                <td><input type="checkbox" class="mr-2" name="dko_specimen" id="dko_specimen" value="1">Ya</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>- Apakah masalah dengan peralatan selama operasi</td>
                                <td><input type="radio" class="mr-2" name="dko_masalah" id="dko_masalah_ya" value="1">Ya</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><input type="radio" class="mr-2" name="dko_masalah" id="dko_masalah_tidak" value="0 ">Tidak</td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td colspan="2">Operator dokter bedah, dokter anestesi dan perawat melaukan review masalah utama apa yang harus diperhatikan untuk penyembuhan dan manajemen pasien selanjutnya</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="checkbox" class="mr-2" name="dko_review" id="dko_review" value="1">Ya</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div class="input-group">
                                        Tanggal tindakan verifikasi<input type="text" name="dko_tanggal_verifikasi" id="dko_tanggal_verifikasi" class="custom-form clear-d-inline-block col-lg-3 ml-2" placeholder="dd/mm/yy">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <table class="table table-sm table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <th>KEGIATAN</th>
                                                <th>PELAKSANA</th>
                                                <th>TANDA TANGAN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td rowspan="4">Sign In</td>
                                                <td>1. Perawat/Bidan</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="dko_perawat_sign_in" id="dko_perawat_sign_in" class="select2c-input"></td>
                                                <td><input type="checkbox" name="dko_ttd_perawat_sign_in" id="dko_ttd_perawat_sign_in" class="custom-form col-lg-4 mx-auto" value="1"></td>
                                            </tr>
                                            <tr>
                                                <td>2. Dokter Anestesi</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="dko_dokter_sign_in" id="dko_dokter_sign_in" class="select2c-input"></td>
                                                <td><input type="checkbox" name="dko_ttd_dokter_sign_in" id="dko_ttd_dokter_sign_in" class="custom-form col-lg-4 mx-auto" value="1"></td>
                                            </tr>
                                            <tr>
                                                <td rowspan="6">Time Out</td>
                                                <td>1. Operator</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="dko_operator_time_out" id="dko_operator_time_out" class="select2c-input"></td>
                                                <td><input type="checkbox" name="dko_ttd_operator_time_out" id="dko_ttd_operator_time_out" class="custom-form col-lg-4 mx-auto" value="1"></td>
                                            </tr>
                                            <tr>
                                                <td>2. Dokter Anestesi</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="dko_dokter_time_out" id="dko_dokter_time_out" class="select2c-input"></td>
                                                <td><input type="checkbox" name="dko_ttd_dokter_time_out" id="dko_ttd_dokter_time_out" class="custom-form col-lg-4 mx-auto" value="1"></td>
                                            </tr>
                                            <tr>
                                                <td>3. Perawat/Bidan</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="dko_perawat_time_out" id="dko_perawat_time_out" class="select2c-input"></td>
                                                <td><input type="checkbox" name="dko_ttd_perawat_time_out" id="dko_ttd_perawat_time_out" class="custom-form col-lg-4 mx-auto" value="1"></td>
                                            </tr>
                                            <tr>
                                                <td rowspan="4">Sign Out</td>
                                                <td>1. Operator</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="dko_operator_sign_out" id="dko_operator_sign_out" class="select2c-input"></td>
                                                <td><input type="checkbox" name="dko_ttd_operator_sign_out" id="dko_ttd_operator_sign_out" class="custom-form col-lg-4 mx-auto" value="1"></td>
                                            </tr>
                                            <tr>
                                                <td>2. Dokter Anestesi</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="dko_dokter_sign_out" id="dko_dokter_sign_out" class="select2c-input"></td>
                                                <td><input type="checkbox" name="dko_ttd_dokter_sign_out" id="dko_ttd_dokter_sign_out" class="custom-form col-lg-4 mx-auto" value="1"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-end">
                    <button type="button" title="Tambah Surgical Safety Ceklis" class="btn btn-info" onclick="tambahSurgicalSafetyCeklis()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Surgical Safety Ceklis</button>
                </div>
            </div>
        `;


        html += tutupRapet();

        $('#buka-tutup-surgical-safety-ceklis').append(html);
    }

    function tambahSurgicalSafetyCeklis() {

        if ($('#dko_tanggal_verifikasi').val() === '') {
            syams_validation('#dko_tanggal_verifikasi', 'Tanggal Surgical Safety Ceklis Kamar Operasi harus diisi.');
            return false;
        } else {
            syams_validation_remove('#dko_tanggal_verifikasi');
        }

        let html = '';
        let number = $('.nomer-surgical').length;
        let id_pendaftaran = $('#ek_id_pendaftaran').val();
        let id_layanan_pendaftaran = $('#ek_id_layanan_pendaftaran').val();
        let dko_tanggal_verifikasi = $('#dko_tanggal_verifikasi').val();

        // sign in
        let dko_jam_sign_in = $('#dko_jam_sign_in').val() || null;
        let view_dko_jam_sign_in = $('#dko_jam_sign_in').val() || '';
        let dko_gelang = $('#dko_gelang').is(':checked') ? $('#dko_gelang').val() : null;
        let dko_lokasi = $('#dko_lokasi').is(':checked') ? $('#dko_lokasi').val() : null;
        let dko_prosedur = $('#dko_prosedur').is(':checked') ? $('#dko_prosedur').val() : null;
        let dko_izin = $('#dko_izin').is(':checked') ? $('#dko_izin').val() : null;
        let dko_tanda = $(':radio[name="dko_tanda"]:checked').val() || null;
        let dko_obat = $('#dko_obat').is(':checked') ? $('#dko_obat').val() : null;
        let dko_alergi = $(':radio[name="dko_alergi"]:checked').val() || null;
        let dko_alergi_ket = $('#dko_alergi_ket').val() || null;
        let dko_aspirasi = $(':radio[name="dko_aspirasi"]:checked').val() || null;
        let dko_darah = $(':radio[name="dko_darah"]:checked').val() || null;
        let dko_anestesi = $(':radio[name="dko_anestesi"]:checked').val() || null;

        // time out
        let dko_jam_time_out = $('#dko_jam_time_out').val() || null;
        let view_dko_jam_time_out = $('#dko_jam_time_out').val() || '';
        let dko_konfirmasi = $('#dko_konfirmasi').is(':checked') ? $('#dko_konfirmasi').val() : null;
        let dko_nama = $('#dko_nama').is(':checked') ? $('#dko_nama').val() : null;
        let dko_prosedur_time_out = $('#dko_prosedur_time_out').is(':checked') ? $('#dko_prosedur_time_out').val() : null;
        let dko_insisi = $('#dko_insisi').is(':checked') ? $('#dko_insisi').val() : null;
        let dko_profilaksis = $('#dko_profilaksis').is(':checked') ? $('#dko_profilaksis').val() : null;
        let dko_dokter_bedah_ket = $('#dko_dokter_bedah_ket').val() || null;
        let dko_dokter_anestesi_ket = $('#dko_dokter_anestesi_ket').val() || null;
        let dko_perawat_ket = $('#dko_perawat_ket').val() || null;
        let dko_foto = $(':radio[name="dko_foto"]:checked').val() || null;

        // sign out
        let dko_jam_sign_out = $('#dko_jam_sign_out').val() || null;
        let view_dko_jam_sign_out = $('#dko_jam_sign_out').val() || '';
        let dko_tindakan = $('#dko_tindakan').is(':checked') ? $('#dko_tindakan').val() : null;
        let dko_instrumen = $('#dko_instrumen').is(':checked') ? $('#dko_instrumen').val() : null;
        let dko_specimen = $('#dko_specimen').is(':checked') ? $('#dko_specimen').val() : null;
        let dko_masalah = $(':radio[name="dko_masalah"]:checked').val() || null;
        let dko_review = $('#dko_review').is(':checked') ? $('#dko_review').val() : null;

        // tanda tangan dokter dan perawat
        // Sign In
        let dko_perawat_sign_in = $('#s2id_dko_perawat_sign_in a .select2c-chosen').text();
        let id_dko_perawat_sign_in = $('#dko_perawat_sign_in').val() || null;
        let dko_ttd_perawat_sign_in = $('#dko_ttd_perawat_sign_in').is(':checked') ? $('#dko_ttd_perawat_sign_in').val() : null;

        let dko_dokter_sign_in = $('#s2id_dko_dokter_sign_in a .select2c-chosen').text();
        let id_dko_dokter_sign_in = $('#dko_dokter_sign_in').val() || null;
        let dko_ttd_dokter_sign_in = $('#dko_ttd_dokter_sign_in').is(':checked') ? $('#dko_ttd_dokter_sign_in').val() : null;

        // Time Out
        let dko_operator_time_out = $('#s2id_dko_operator_time_out a .select2c-chosen').text();
        let id_dko_operator_time_out = $('#dko_operator_time_out').val() || null;
        let dko_ttd_operator_time_out = $('#dko_ttd_operator_time_out').is(':checked') ? $('#dko_ttd_operator_time_out').val() : null;

        let dko_dokter_time_out = $('#s2id_dko_dokter_time_out a .select2c-chosen').text();
        let id_dko_dokter_time_out = $('#dko_dokter_time_out').val() || null;
        let dko_ttd_dokter_time_out = $('#dko_ttd_dokter_time_out').is(':checked') ? $('#dko_ttd_dokter_time_out').val() : null;

        let dko_perawat_time_out = $('#s2id_dko_perawat_time_out a .select2c-chosen').text();
        let id_dko_perawat_time_out = $('#dko_perawat_time_out').val() || null;
        let dko_ttd_perawat_time_out = $('#dko_ttd_perawat_time_out').is(':checked') ? $('#dko_ttd_perawat_time_out').val() : null;

        // Sign Out
        let dko_operator_sign_out = $('#s2id_dko_operator_sign_out a .select2c-chosen').text();
        let id_dko_operator_sign_out = $('#dko_operator_sign_out').val() || null;
        let dko_ttd_operator_sign_out = $('#dko_ttd_operator_sign_out').is(':checked') ? $('#dko_ttd_operator_sign_out').val() : null;

        let dko_dokter_sign_out = $('#s2id_dko_dokter_sign_out a .select2c-chosen').text();
        let id_dko_dokter_sign_out = $('#dko_dokter_sign_out').val() || null;
        let dko_ttd_dokter_sign_out = $('#dko_ttd_dokter_sign_out').is(':checked') ? $('#dko_ttd_dokter_sign_out').val() : null;

        html = /* html */ `
        <tbody>
            <input type="hidden" name="id_pendaftaran[]" value="${id_pendaftaran}">
            <input type="hidden" name="id_layanan_pendaftaran[]" value="${id_layanan_pendaftaran}">
            
            <input type="hidden" name="dko_jam_sign_in[]" value="${dko_jam_sign_in}">
            <input type="hidden" name="dko_gelang[]" value="${dko_gelang}">
            <input type="hidden" name="dko_lokasi[]" value="${dko_lokasi}">
            <input type="hidden" name="dko_prosedur[]" value="${dko_prosedur}">
            <input type="hidden" name="dko_izin[]" value="${dko_izin}">
            <input type="hidden" name="dko_tanda[]" value="${dko_tanda}">
            <input type="hidden" name="dko_obat[]" value="${dko_obat}">
            <input type="hidden" name="dko_alergi[]" value="${dko_alergi}">
            <input type="hidden" name="dko_alergi_ket[]" value="${dko_alergi_ket}">
            <input type="hidden" name="dko_aspirasi[]" value="${dko_aspirasi}">
            <input type="hidden" name="dko_darah[]" value="${dko_darah}">
            <input type="hidden" name="dko_anestesi[]" value="${dko_anestesi}">

            <input type="hidden" name="dko_jam_time_out[]" value="${dko_jam_time_out}">
            <input type="hidden" name="dko_konfirmasi[]" value="${dko_konfirmasi}">
            <input type="hidden" name="dko_nama[]" value="${dko_nama}">
            <input type="hidden" name="dko_prosedur_time_out[]" value="${dko_prosedur_time_out}">
            <input type="hidden" name="dko_insisi[]" value="${dko_insisi}">
            <input type="hidden" name="dko_profilaksis[]" value="${dko_profilaksis}">
            <input type="hidden" name="dko_dokter_bedah_ket[]" value="${dko_dokter_bedah_ket}">
            <input type="hidden" name="dko_dokter_anestesi_ket[]" value="${dko_dokter_anestesi_ket}">
            <input type="hidden" name="dko_perawat_ket[]" value="${dko_perawat_ket}">
            <input type="hidden" name="dko_foto[]" value="${dko_foto}">

            <input type="hidden" name="dko_jam_sign_out[]" value="${dko_jam_sign_out}">
            <input type="hidden" name="dko_tindakan[]" value="${dko_tindakan}">
            <input type="hidden" name="dko_instrumen[]" value="${dko_instrumen}">
            <input type="hidden" name="dko_specimen[]" value="${dko_specimen}">
            <input type="hidden" name="dko_masalah[]" value="${dko_masalah}">
            <input type="hidden" name="dko_review[]" value="${dko_review}">
            
            <input type="hidden" name="dko_tanggal_verifikasi[]" value="${dko_tanggal_verifikasi}">
            <input type="hidden" name="dko_perawat_sign_in[]" value="${id_dko_perawat_sign_in}">
            <input type="hidden" name="dko_ttd_perawat_sign_in[]" value="${dko_ttd_perawat_sign_in}">
            <input type="hidden" name="dko_dokter_sign_in[]" value="${id_dko_dokter_sign_in}">
            <input type="hidden" name="dko_ttd_dokter_sign_in[]" value="${dko_ttd_dokter_sign_in}">
            <input type="hidden" name="dko_operator_time_out[]" value="${id_dko_operator_time_out}">
            <input type="hidden" name="dko_ttd_operator_time_out[]" value="${dko_ttd_operator_time_out}">
            <input type="hidden" name="dko_dokter_time_out[]" value="${id_dko_dokter_time_out}">
            <input type="hidden" name="dko_ttd_dokter_time_out[]" value="${dko_ttd_dokter_time_out}">
            <input type="hidden" name="dko_perawat_time_out[]" value="${id_dko_perawat_time_out}">
            <input type="hidden" name="dko_ttd_perawat_time_out[]" value="${dko_ttd_perawat_time_out}">
            <input type="hidden" name="dko_operator_sign_out[]" value="${id_dko_operator_sign_out}">
            <input type="hidden" name="dko_ttd_operator_sign_out[]" value="${dko_ttd_operator_sign_out}">
            <input type="hidden" name="dko_dokter_sign_out[]" value="${id_dko_dokter_sign_out}">
            <input type="hidden" name="dko_ttd_dokter_sign_out[]" value="${dko_ttd_dokter_sign_out}">

            <input type="hidden" name="user_dko[]" value="<?= $this->session->userdata("id_translucent") ?>">

            <tr>
                <td class="nomer-surgical text-center">${++number}</td>
                <td>${dko_tanggal_verifikasi}</td>
                <td>${view_dko_jam_sign_in}</td>
                <td>${dko_perawat_sign_in}</td>
                <td>${dko_dokter_sign_in}</td>
                <td>${view_dko_jam_time_out}</td>
                <td>${dko_operator_time_out}</td>
                <td>${dko_dokter_time_out}</td>
                <td>${dko_perawat_time_out}</td>
                <td>${view_dko_jam_sign_out}</td>
                <td>${dko_operator_sign_out}</td>
                <td>${dko_dokter_sign_out}</td>
                <td><?= $this->session->userdata('nama') ?></td>
                <td><button type="button" class="btn btn-secondary btn-xxs" onclick="removeListTable(this)"><i class="fas fa-trash-alt"></i></button></td>
            </tr>
        </tbody>
        `;

        $('#tabel-surgical-safety-ceklis').append(html);

    }

    function showSurgicalSafetyCeklis(data, id_pendaftaran, id_layanan_pendaftaran, bed, action) {
        $('#tabel-surgical-safety-ceklis tbody').empty();
        let accountGroup = "<?= $this->session->userdata('account_group') ?>";
        if (data !== null) {
            $.each(data, function(i, v) {

                let btnAksesLihat = '';
                if (action != 'lihat') {
                    btnAksesLihat = '<button type="button" class="btn btn-secondary btn-xs" onclick="editSurgicalSafetyCeklis(this, ' + v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed + '\')"><i class="fas fa-edit"></i></button> <button type="button" class="btn btn-secondary btn-xs" onclick="hapusSurgicalSafetyCeklis(this, ' + v.id + ')"> <i class="fas fa-trash-alt"></i></button>';
                }
                
                const selOp ='<td align="center" id="tombol_action"><button type="button" class="btn btn-secondary btn-xs" onclick="detailSurgicalSafetyCeklis(this, ' + v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed + '\')"><i class="fas fa-eye"></i></button>' + btnAksesLihat +  '</td>';
                let html = /* html */ `
                    <tbody>
                        <tr>
                            <td class="nomer-surgical text-center">${(++i)}</td>
                            <td class="text-center">
                            ${v.tanggal_verifikasi !== null ? v.tanggal_verifikasi:''}
                            </td>
                            <td class="text-center">
                            ${v.jam_sign_in !== null ? v.jam_sign_in:''}
                            </td>
                            <td class="text-center">
                            ${v.perawat_sign_in !== null ? v.perawat_sign_in:''}
                            </td>
                            <td class="text-center">
                            ${v.dokter_sign_in !== null ? v.dokter_sign_in:''}
                            </td>
                            <td class="text-center">
                            ${v.jam_time_out !== null ? v.jam_time_out:''}
                            </td>
                            <td class="text-center">
                            ${v.operator_time_out !== null ? v.operator_time_out:''}
                            </td>
                            <td class="text-center">
                            ${v.dokter_time_out !== null ? v.dokter_time_out:''}
                            </td>
                            <td class="text-center">
                            ${v.perawat_time_out !== null ? v.perawat_time_out:''}
                            </td>
                            <td class="text-center">
                            ${v.jam_sign_out !== null ? v.jam_sign_out:''}
                            </td>
                            <td class="text-center">
                            ${v.operator_sign_out !== null ? v.operator_sign_out:''}
                            </td>
                            <td class="text-center">
                            ${v.dokter_sign_out !== null ? v.dokter_sign_out:''}
                            </td>
                            <td class="text-center">
                            ${v.akun_user !== null ? v.akun_user:''}
                            </td>
                            ${selOp}
                        </tr>
                        
                    </tbody>
                `;
                $('#tabel-surgical-safety-ceklis').append(html);
            })
        }
    }

    function detailSurgicalSafetyCeklis(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed) {
        $('#modal-detail-surgical-safety-ceklis').modal('show');
        $('#detail_dko').empty();
        $('#detail_surgical_safety_luar_kamar').empty();

        let html = /* html */ `
            <div class="row">
                <div class="col-lg-4">
                    <table class="table table-no-border table-sm table-striped">
                        <thead>
                            <tr>
                                <td colspan="3">
                                    <div class="input-group"><b class="mr-1">SIGN IN</b> (Pukul<span id="ddko_jam_sign_in" class="ml-1"></span>)</div>
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
                                <td><span id="ddko_gelang" class="mr-1"></span>Ya</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>- Lokasi operasi</td>
                                <td><span id="ddko_lokasi" class="mr-1"></span>Ya</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>- Prosedur</td>
                                <td><span id="ddko_prosedur" class="mr-1"></span>Ya</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>- Surat izin opreasi</td>
                                <td><span id="ddko_izin" class="mr-1"></span>Ya</td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td colspan="2">Lokasi operasi sudah diberi tanda ?</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span class="mr-1" id="ddko_tanda_ya"></span>Ya</td>
                                <td><span class="mr-1" id="ddko_tanda_tidak"></span>Tidak dilakukan</td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td colspan="2">Obat-obatan sudah dicek lengkap ?</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span class="mr-1" id="ddko_obat"></span>Ya</td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td colspan="2">Apakah pasien mempunyai riwayat alergi ?</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span class="mr-1" id="ddko_alergi_tidak"></span>Tidak</td>
                                <td>
                                    <div class="input-group">
                                        <span class="mr-1" id="ddko_alergi_ya"></span>Ya, <span class="ml-1" id="ddko_alergi_ket"></span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>5.</td>
                                <td colspan="2">Kemungkinan kesullitan jalan nafas atau risiko aspirasi ?</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span class="mr-1" id="ddko_aspirasi_tidak"></span>Tidak</td>
                                <td><span class="mr-1" id="ddko_aspirasi_ya">Tidak</span>Peralatan dan asisten telah tersedia</td>
                            </tr>
                            <tr>
                                <td>6.</td>
                                <td colspan="2">Risiko kehilangan darah > 500ml (7ml/kgBB pada anak) ?</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span class="mr-1" id="ddko_darah_tidak"></span>Tidak</td>
                                <td><span class="mr-1" id="ddko_darah_ya"></span>Ya, tersedia dua akses intravena/sentral dan terapi cairan sudah direncanakan</td>
                            </tr>
                            <tr>
                                <td>7.</td>
                                <td colspan="2">Rencana anestesi</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">
                                    <span class="mr-1" id="ddko_anestesi_umum"></span>Umum
                                    <span class="mr-1 ml-2" id="ddko_anestesi_regional"></span>Regional
                                    <span class="mr-1 ml-2" id="ddko_anestesi_blok"></span>Blok
                                    <span class="mr-1 ml-2" id="ddko_anestesi_lokal"></span>Lokal
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
                                    <div class="input-group"><b class="mr-1">TIME OUT</b> (Pukul<span id="ddko_jam_time_out" class="ml-1"></span>)</div>
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
                                <td><span id="ddko_konfirmasi" class="mr-1"></span>Ya</td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td colspan="2">Konfirmasi secara verbal</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td width="50%">- Nama pasien</td>
                                <td><span id="ddko_nama" class="mr-1"></span>Ya</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>- Prosedur</td>
                                <td><span id="ddko_prosedur_time_out" class="mr-1"></span>Ya</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>- Lokasi dimana insisi akan dibuat</td>
                                <td><span id="ddko_insisi" class="mr-1"></span>Ya</td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td colspan="2">Antibiotik profilaksis telah diberikan selama 60 menit sebelumnya ?</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span id="ddko_profilaksis" class="mr-1"></span>Ya</td>
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
                                <td colspan="2"><span id="ddko_dokter_bedah_ket"></span></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2"><b>Review dokter anestesi :</b> Apa ada hal khusus yang perlu diperhatikan pada pasien ?</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2"><span id="ddko_dokter_anestesi_ket"></span></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2"><b>Review tim perawat :</b> Apakah peralatan sudah steril, adakah alat-alat yang perlu diperhatikan khusus atau dalam masalah ?</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2"><span id="ddko_perawat_ket"></span></td>
                            </tr>
                            <tr>
                                <td>5.</td>
                                <td colspan="2">Foto rongent/CT scan/MRI yang diperlukan telah ditayangkan</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span id="ddko_foto_ya" class="mr-1"></span>Ya</td>
                                <td><span id="ddko_foto_tidak" class="mr-1"></span>Tidak</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4">
                    <table class="table table-no-border table-sm table-striped">
                        <thead>
                            <tr>
                                <td colspan="3">
                                    <div class="input-group"><b class="mr-1">SIGN OUT</b> (Pukul<span id="ddko_jam_sign_out" class="ml-1"></span>)</div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">(Dilakukan sebelum pasien meninggalkan OK, diisi oleh perawat, dokter anestesi dan operator)</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td colspan="2">Perawat melakukan konvirmasi secara verbal</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>- Nama prosedur tindakan</td>
                                <td><span id="ddko_tindakan" class="mr-1"></span>Ya</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>- Instrumen, kasa dan jarum telah dihitung secara lengkap</td>
                                <td><span id="ddko_instrumen" class="mr-1"></span>Ya</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>- Specimen telah diberi label (termasuk nama pasien & asal jaringan specimen)</td>
                                <td><span id="ddko_specimen" class="mr-1"></span>Ya</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>- Apakah masalah dengan peralatan selama operasi</td>
                                <td><span id="ddko_masalah_ya" class="mr-1"></span>Ya</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><span id="ddko_masalah_tidak" class="mr-1"></span>Tidak</td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td colspan="2">Operator dokter bedah, dokter anestesi dan perawat melaukan review masalah utama apa yang harus diperhatikan untuk penyembuhan dan manajemen pasien selanjutnya</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span id="ddko_review" class="mr-1"></span>Ya</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div class="input-group">
                                        Tanggal tindakan verifikasi<span id="ddko_tanggal_verifikasi" class="ml-1"></span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <table class="table table-sm table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <th>KEGIATAN</th>
                                                <th>PELAKSANA</th>
                                                <th>TANDA TANGAN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td rowspan="4">Sign In</td>
                                                <td>1. Perawat/Bidan</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><span id="ddko_perawat_sign_in"></span></td>
                                                <td><span id="ddko_ttd_perawat_sign_in"></span></td>
                                            </tr>
                                            <tr>
                                                <td>2. Dokter Anestesi</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><span id="ddko_dokter_sign_in"></span></td>
                                                <td><span id="ddko_ttd_dokter_sign_in"></span></td>
                                            </tr>
                                            <tr>
                                                <td rowspan="6">Time Out</td>
                                                <td>1. Operator</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><span id="ddko_operator_time_out"></span></td>
                                                <td><span id="ddko_ttd_operator_time_out"></span></td>
                                            </tr>
                                            <tr>
                                                <td>2. Dokter Anestesi</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><span id="ddko_dokter_time_out"></span></td>
                                                <td><span id="ddko_ttd_dokter_time_out"></span></td>
                                            </tr>
                                            <tr>
                                                <td>3. Perawat/Bidan</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><span id="ddko_perawat_time_out"></span></td>
                                                <td><span id="ddko_ttd_perawat_time_out"></span></td>
                                            </tr>
                                            <tr>
                                                <td rowspan="4">Sign Out</td>
                                                <td>1. Operator</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><span id="ddko_operator_sign_out"></span></td>
                                                <td><span id="ddko_ttd_operator_sign_out"></span></td>
                                            </tr>
                                            <tr>
                                                <td>2. Dokter Anestesi</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><span id="ddko_dokter_sign_out"></span></td>
                                                <td><span id="ddko_ttd_dokter_sign_out"></span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        `;
        $('#detail_surgical_safety_luar_kamar').append(html);

        let html2 = `
            <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-detail-surgical-safety-ceklis').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
        `;
        $('#detail_dko').append(html2);

        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_surgical_luar_kamar") ?>/id/' +
                id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                // sign in
                $('#ddko_jam_sign_in').html(data.jam_sign_in !== null ? data.jam_sign_in : '- - : - -');
                $('#ddko_gelang').html(data.dko_gelang === '1' ? '&check;' : '&#10006;');
                $('#ddko_lokasi').html(data.dko_lokasi === '1' ? '&check;' : '&#10006;');
                $('#ddko_prosedur').html(data.dko_prosedur === '1' ? '&check;' : '&#10006;');
                $('#ddko_izin').html(data.dko_izin === '1' ? '&check;' : '&#10006;');
                $('#ddko_tanda_ya').html(data.dko_tanda === '1' ? '&check;' : '&#10006;');
                $('#ddko_tanda_tidak').html(data.dko_tanda === '0' ? '&check;' : '&#10006;');
                $('#ddko_obat').html(data.dko_obat === '1' ? '&check;' : '&#10006;');
                $('#ddko_alergi_tidak').html(data.dko_alergi === '0' ? '&check;' : '&#10006;');
                $('#ddko_alergi_ya').html(data.dko_alergi === '1' ? '&check;' : '&#10006;');
                $('#ddko_alergi_ket').html(data.dko_alergi_ket !== null ? data.dko_alergi_ket : '....');
                $('#ddko_aspirasi_tidak').html(data.dko_aspirasi === '0' ? '&check;' : '&#10006;');
                $('#ddko_aspirasi_ya').html(data.dko_aspirasi === '1' ? '&check;' : '&#10006;');
                $('#ddko_darah_tidak').html(data.dko_darah === '0' ? '&check;' : '&#10006;');
                $('#ddko_darah_ya').html(data.dko_darah === '1' ? '&check;' : '&#10006;');
                $('#ddko_anestesi_umum').html(data.dko_anestesi === '0' ? '&check;' : '&#10006;');
                $('#ddko_anestesi_regional').html(data.dko_anestesi === '1' ? '&check;' : '&#10006;');
                $('#ddko_anestesi_blok').html(data.dko_anestesi === '2' ? '&check;' : '&#10006;');
                $('#ddko_anestesi_lokal').html(data.dko_anestesi === '3' ? '&check;' : '&#10006;');

                // time out
                $('#ddko_jam_time_out').html(data.jam_time_out !== null ? data.jam_time_out : '- - : - -');
                $('#ddko_konfirmasi').html(data.dko_konfirmasi === '1' ? '&check;' : '&#10006;');
                $('#ddko_nama').html(data.dko_nama === '1' ? '&check;' : '&#10006;');
                $('#ddko_prosedur_time_out').html(data.dko_prosedur_time_out === '1' ? '&check;' : '&#10006;');
                $('#ddko_insisi').html(data.dko_insisi === '1' ? '&check;' : '&#10006;');
                $('#ddko_profilaksis').html(data.dko_profilaksis === '1' ? '&check;' : '&#10006;');
                $('#ddko_dokter_bedah_ket').html(data.dko_dokter_bedah_ket !== null ? data.dko_dokter_bedah_ket : '....');
                $('#ddko_dokter_anestesi_ket').html(data.dko_dokter_anestesi_ket !== null ? data.dko_dokter_anestesi_ket : '....');
                $('#ddko_perawat_ket').html(data.dko_perawat_ket !== null ? data.dko_perawat_ket : '....');
                $('#ddko_foto_tidak').html(data.dko_foto === '0' ? '&check;' : '&#10006;');

                // sign out
                $('#ddko_jam_sign_out').html(data.jam_sign_out !== null ? data.jam_sign_out : '- - : - -');
                $('#ddko_tindakan').html(data.dko_tindakan === '1' ? '&check;' : '&#10006;');
                $('#ddko_instrumen').html(data.dko_instrumen === '1' ? '&check;' : '&#10006;');
                $('#ddko_specimen').html(data.dko_specimen === '1' ? '&check;' : '&#10006;');
                $('#ddko_masalah_ya').html(data.dko_masalah === '1' ? '&check;' : '&#10006;');
                $('#ddko_masalah_tidak').html(data.dko_masalah === '0' ? '&check;' : '&#10006;');
                $('#ddko_review').html(data.dko_review === '1' ? '&check;' : '&#10006;');
                $('#ddko_tanggal_verifikasi').html(data.tanggal_verifikasi !== null ? data.tanggal_verifikasi : '....');

                // perawat dan dokter
                $('#ddko_perawat_sign_in').html(data.perawat_sign_in !== null ? data.perawat_sign_in : '....');
                $('#ddko_ttd_perawat_sign_in').html(data.dko_ttd_perawat_sign_in === '1' ? '&check;' : '&#10006;');
                $('#ddko_dokter_sign_in').html(data.dokter_sign_in !== null ? data.dokter_sign_in : '....');
                $('#ddko_ttd_dokter_sign_in').html(data.dko_ttd_dokter_sign_in === '1' ? '&check;' : '&#10006;');
                $('#ddko_operator_time_out').html(data.operator_time_out !== null ? data.operator_time_out : '....');
                $('#ddko_ttd_operator_time_out').html(data.dko_ttd_operator_time_out === '1' ? '&check;' : '&#10006;');
                $('#ddko_dokter_time_out').html(data.dokter_time_out !== null ? data.dokter_time_out : '....');
                $('#ddko_ttd_dokter_time_out').html(data.dko_ttd_dokter_time_out === '1' ? '&check;' : '&#10006;');
                $('#ddko_perawat_time_out').html(data.perawat_time_out !== null ? data.perawat_time_out : '....');
                $('#ddko_ttd_perawat_time_out').html(data.dko_ttd_perawat_time_out === '1' ? '&check;' : '&#10006;');
                $('#ddko_operator_sign_out').html(data.operator_sign_out !== null ? data.operator_sign_out : '....');
                $('#ddko_ttd_operator_sign_out').html(data.dko_ttd_operator_sign_out === '1' ? '&check;' : '&#10006;');
                $('#ddko_dokter_sign_out').html(data.dokter_sign_out !== null ? data.dokter_sign_out : '....');
                $('#ddko_ttd_dokter_sign_out').html(data.dko_ttd_dokter_sign_out === '1' ? '&check;' : '&#10006;');

            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }

    function editSurgicalSafetyCeklis(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed) {

        $('#modal-edit-surgical-safety-ceklis').modal('show');
        $('#edit_dko').empty();
        $('#edit_surgical_safety_luar_kamar').empty();

        let html = /* html */ `
            <div class="row">
                <div class="col-lg-4">
                    <table class="table table-no-border table-sm table-striped">
                        <thead>
                            <tr>
                                <td colspan="3">
                                    <div class="input-group"><b>SIGN IN</b><input type="text" name="dko_jam_sign_in" id="edko_jam_sign_in" class="custom-form clear-d-inline-block col-lg-2 ml-2" placeholder="hh:mm"></div>
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
                                <td><input type="checkbox" class="mr-2" name="dko_gelang" id="edko_gelang" value="1">Ya</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>- Lokasi operasi</td>
                                <td><input type="checkbox" class="mr-2" name="dko_lokasi" id="edko_lokasi" value="1">Ya</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>- Prosedur</td>
                                <td><input type="checkbox" class="mr-2" name="dko_prosedur" id="edko_prosedur" value="1">Ya</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>- Surat izin opreasi</td>
                                <td><input type="checkbox" class="mr-2" name="dko_izin" id="edko_izin" value="1">Ya</td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td colspan="2">Lokasi operasi sudah diberi tanda ?</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="radio" class="mr-2" name="dko_tanda" id="edko_tanda_ya" value="1">Ya</td>
                                <td><input type="radio" class="mr-2" name="dko_tanda" id="edko_tanda_tidak" value="0">Tidak dilakukan</td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td colspan="2">Obat-obatan sudah dicek lengkap ?</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2"><input type="checkbox" class="mr-2" name="dko_obat" id="edko_obat" value="1">Ya</td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td colspan="2">Apakah pasien mempunyai riwayat alergi ?</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="radio" class="mr-2" name="dko_alergi" id="edko_alergi_tidak" value="0">Tidak</td>
                                <td>
                                    <div class="input-group">
                                        <input type="radio" class="mr-2" name="dko_alergi" id="edko_alergi_ya" value="1">Ya, sebutkan <input type="text" name="dko_alergi_ket" id="edko_alergi_ket" class="custom-form clear-input d-inline-block ml-1" disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>5.</td>
                                <td colspan="2">Kemungkinan kesullitan jalan nafas atau risiko aspirasi ?</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="radio" class="mr-2" name="dko_aspirasi" id="edko_aspirasi_tidak" value="0">Tidak</td>
                                <td><input type="radio" class="mr-2" name="dko_aspirasi" id="edko_aspirasi_ya" value="1">Peralatan dan asisten telah tersedia</td>
                            </tr>
                            <tr>
                                <td>6.</td>
                                <td colspan="2">Risiko kehilangan darah > 500ml (7ml/kgBB pada anak) ?</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="radio" class="mr-2" name="dko_darah" id="edko_darah_tidak" value="0">Tidak</td>
                                <td><input type="radio" class="mr-2" name="dko_darah" id="edko_darah_ya" value="1">Ya, tersedia dua akses intravena/sentral dan terapi cairan sudah direncanakan</td>
                            </tr>
                            <tr>
                                <td>7.</td>
                                <td colspan="2">Rencana anestesi</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">
                                    <input type="radio" class="mr-1" name="dko_anestesi" id="edko_anestesi_umum" value="0">Umum
                                    <input type="radio" class="mr-1 ml-3" name="dko_anestesi" id="edko_anestesi_regional" value="1">Regional
                                    <input type="radio" class="mr-1 ml-3" name="dko_anestesi" id="edko_anestesi_blok" value="2">Blok
                                    <input type="radio" class="mr-1 ml-3" name="dko_anestesi" id="edko_anestesi_lokal" value="3">Lokal
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
                                    <div class="input-group"><b>TIME OUT</b><input type="text" name="dko_jam_time_out" id="edko_jam_time_out" class="custom-form clear-d-inline-block col-lg-2 ml-2" placeholder="hh:mm"></div>
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
                                <td><input type="checkbox" class="mr-2" name="dko_konfirmasi" id="edko_konfirmasi" value="1">Ya</td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td colspan="2">Konfirmasi secara verbal</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td width="50%">- Nama pasien</td>
                                <td><input type="checkbox" class="mr-2" name="dko_nama" id="edko_nama" value="1">Ya</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>- Prosedur</td>
                                <td><input type="checkbox" class="mr-2" name="dko_prosedur_time_out" id="edko_prosedur_time_out" value="1">Ya</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>- Lokasi dimana insisi akan dibuat</td>
                                <td><input type="checkbox" class="mr-2" name="dko_insisi" id="edko_insisi" value="1">Ya</td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td colspan="2">Antibiotik profilaksis telah diberikan selama 60 menit sebelumnya ?</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="checkbox" class="mr-2" name="dko_profilaksis" id="edko_profilaksis" value="1">Ya</td>
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
                                <td colspan="2"><textarea name="dko_dokter_bedah_ket" id="edko_dokter_bedah_ket" class="form-control" rows="3"></textarea></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2"><b>Review dokter anestesi :</b> Apa ada hal khusus yang perlu diperhatikan pada pasien ?</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2"><textarea name="dko_dokter_anestesi_ket" id="edko_dokter_anestesi_ket" class="form-control" rows="3"></textarea></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2"><b>Review tim perawat :</b> Apakah peralatan sudah steril, adakah alat-alat yang perlu diperhatikan khusus atau dalam masalah ?</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2"><textarea name="dko_perawat_ket" id="edko_perawat_ket" class="form-control" rows="3"></textarea></td>
                            </tr>
                            <tr>
                                <td>5.</td>
                                <td colspan="2">Foto rongent/CT scan/MRI yang diperlukan telah ditayangkan</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="radio" class="mr-2" name="dko_foto" id="edko_foto_ya" value="1">Ya</td>
                                <td><input type="radio" class="mr-2" name="dko_foto" id="edko_foto_tidak" value="0">Tidak dilakukan</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4">
                    <table class="table table-no-border table-sm table-striped">
                        <thead>
                            <tr>
                                <td colspan="3">
                                    <div class="input-group"><b>SIGN OUT</b><input type="text" name="dko_jam_sign_out" id="edko_jam_sign_out" class="custom-form clear-d-inline-block col-lg-2 ml-2" placeholder="hh:mm"></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">(Dilakukan sebelum pasien meninggalkan OK, diisi oleh perawat, dokter anestesi dan operator)</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td colspan="2">Perawat melakukan konvirmasi secara verbal</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>- Nama prosedur tindakan</td>
                                <td><input type="checkbox" class="mr-2" name="dko_tindakan" id="edko_tindakan" value="1">Ya</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>- Instrumen, kasa dan jarum telah dihitung secara lengkap</td>
                                <td><input type="checkbox" class="mr-2" name="dko_instrumen" id="edko_instrumen" value="1">Ya</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>- Specimen telah diberi label (termasuk nama pasien & asal jaringan specimen)</td>
                                <td><input type="checkbox" class="mr-2" name="dko_specimen" id="edko_specimen" value="1">Ya</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>- Apakah masalah dengan peralatan selama operasi</td>
                                <td><input type="radio" class="mr-2" name="dko_masalah" id="edko_masalah_ya" value="1">Ya</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><input type="radio" class="mr-2" name="dko_masalah" id="edko_masalah_tidak" value="0 ">Tidak</td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td colspan="2">Operator dokter bedah, dokter anestesi dan perawat melaukan review masalah utama apa yang harus diperhatikan untuk penyembuhan dan manajemen pasien selanjutnya</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="checkbox" class="mr-2" name="dko_review" id="edko_review" value="1">Ya</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div class="input-group">
                                        Tanggal tindakan verifikasi<input type="text" name="dko_tanggal_verifikasi" id="edko_tanggal_verifikasi" class="custom-form clear-d-inline-block col-lg-3 ml-2" placeholder="dd/mm/yy">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <table class="table table-sm table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <th>KEGIATAN</th>
                                                <th>PELAKSANA</th>
                                                <th>TANDA TANGAN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td rowspan="4">Sign In</td>
                                                <td>1. Perawat/Bidan</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="dko_perawat_sign_in" id="edko_perawat_sign_in" class="select2c-input"></td>
                                                <td><input type="checkbox" name="dko_ttd_perawat_sign_in" id="edko_ttd_perawat_sign_in" class="custom-form col-lg-4 mx-auto" value="1"></td>
                                            </tr>
                                            <tr>
                                                <td>2. Dokter Anestesi</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="dko_dokter_sign_in" id="edko_dokter_sign_in" class="select2c-input"></td>
                                                <td><input type="checkbox" name="dko_ttd_dokter_sign_in" id="edko_ttd_dokter_sign_in" class="custom-form col-lg-4 mx-auto" value="1"></td>
                                            </tr>
                                            <tr>
                                                <td rowspan="6">Time Out</td>
                                                <td>1. Operator</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="dko_operator_time_out" id="edko_operator_time_out" class="select2c-input"></td>
                                                <td><input type="checkbox" name="dko_ttd_operator_time_out" id="edko_ttd_operator_time_out" class="custom-form col-lg-4 mx-auto" value="1"></td>
                                            </tr>
                                            <tr>
                                                <td>2. Dokter Anestesi</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="dko_dokter_time_out" id="edko_dokter_time_out" class="select2c-input"></td>
                                                <td><input type="checkbox" name="dko_ttd_dokter_time_out" id="edko_ttd_dokter_time_out" class="custom-form col-lg-4 mx-auto" value="1"></td>
                                            </tr>
                                            <tr>
                                                <td>3. Perawat/Bidan</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="dko_perawat_time_out" id="edko_perawat_time_out" class="select2c-input"></td>
                                                <td><input type="checkbox" name="dko_ttd_perawat_time_out" id="edko_ttd_perawat_time_out" class="custom-form col-lg-4 mx-auto" value="1"></td>
                                            </tr>
                                            <tr>
                                                <td rowspan="4">Sign Out</td>
                                                <td>1. Operator</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="dko_operator_sign_out" id="edko_operator_sign_out" class="select2c-input"></td>
                                                <td><input type="checkbox" name="dko_ttd_operator_sign_out" id="edko_ttd_operator_sign_out" class="custom-form col-lg-4 mx-auto" value="1"></td>
                                            </tr>
                                            <tr>
                                                <td>2. Dokter Anestesi</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="dko_dokter_sign_out" id="edko_dokter_sign_out" class="select2c-input"></td>
                                                <td><input type="checkbox" name="dko_ttd_dokter_sign_out" id="edko_ttd_dokter_sign_out" class="custom-form col-lg-4 mx-auto" value="1"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        `;
        $('#edit_surgical_safety_luar_kamar').append(html);

        let html2 = `
            <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-surgical-safety-ceklis').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
            <button type="button" class="btn btn-info waves-effect" onclick="updateSurgicalSafetyCeklis(${id}, ${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')"><i class="fas fa-save mr-1"></i>Update</button>
        `;
        $('#edit_dko').append(html2);

        // dokter
        $('#edko_dokter_sign_in, #edko_operator_time_out, #edko_dokter_time_out, #edko_operator_sign_out, #edko_dokter_sign_out').select2c({
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

        // perawat dan bidan
        $('#edko_perawat_sign_in, #edko_perawat_time_out').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
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

        // jam
        $('#edko_jam_sign_in, #edko_jam_time_out, #edko_jam_sign_out').datetimepicker({
            format: 'HH:mm',
            maxDate: new Date(),
            beforeShow: function(i) {
                if ($(i).attr('readonly')) {
                    return false;
                }
            }
        });

        // tanggal
        $('#edko_tanggal_verifikasi').datetimepicker({
            format: 'DD/MM/YYYY',
            maxDate: new Date(),
            beforeShow: function(i) {
                if ($(i).attr('readonly')) {
                    return false;
                }
            }
        });

        // disable keterangan alergi
        $('input[type=radio][name=dko_alergi]').change(function() {
            if (this.value == '0') {
                $('#edko_alergi_ket').val('');
                $('#edko_alergi_ket').prop('disabled', true);
            } else {
                $('#edko_alergi_ket').val('');
                $('#edko_alergi_ket').prop('disabled', false);
            }
        });

        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_surgical_luar_kamar") ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#id-surgical-safety-ceklis').val(data.id);

                //  sign in
                if (data.jam_sign_in !== null) {
                    $('#edko_jam_sign_in').val(data.jam_sign_in);
                }
                $('#edko_gelang').prop('checked', data.dko_gelang === '1');
                $('#edko_lokasi').prop('checked', data.dko_lokasi === '1');
                $('#edko_prosedur').prop('checked', data.dko_prosedur === '1');
                $('#edko_izin').prop('checked', data.dko_izin === '1');
                $('#edko_tanda_ya').prop('checked', data.dko_tanda === '1');
                $('#edko_tanda_tidak').prop('checked', data.dko_tanda === '0');
                $('#edko_obat').prop('checked', data.dko_obat === '1');
                $('#edko_alergi_ya').prop('checked', data.dko_alergi === '1');
                $('#edko_alergi_tidak').prop('checked', data.dko_alergi === '0');
                $('#edko_alergi_ket').prop('disabled', data.dko_alergi === '0');
                if (data.dko_alergi_ket !== null) {
                    $('#edko_alergi_ket').val(data.dko_alergi_ket).prop('disabled', false);
                }
                $('#edko_aspirasi_ya').prop('checked', data.dko_aspirasi === '1');
                $('#edko_aspirasi_tidak').prop('checked', data.dko_aspirasi === '0');
                $('#edko_darah_ya').prop('checked', data.dko_darah === '1');
                $('#edko_darah_tidak').prop('checked', data.dko_darah === '0');
                $('#edko_anestesi_umum').prop('checked', data.dko_anestesi === '0');
                $('#edko_anestesi_regional').prop('checked', data.dko_anestesi === '1');
                $('#edko_anestesi_blok').prop('checked', data.dko_anestesi === '2');
                $('#edko_anestesi_lokal').prop('checked', data.dko_anestesi === '3');

                //  time out
                if (data.jam_time_out !== null) {
                    $('#edko_jam_time_out').val(data.jam_time_out);
                }
                $('#edko_konfirmasi').prop('checked', data.dko_konfirmasi === '1');
                $('#edko_nama').prop('checked', data.dko_nama === '1');
                $('#edko_prosedur_time_out').prop('checked', data.dko_prosedur_time_out === '1');
                $('#edko_insisi').prop('checked', data.dko_insisi === '1');
                $('#edko_profilaksis').prop('checked', data.dko_profilaksis === '1');
                if (data.dko_dokter_bedah_ket !== null) {
                    $('#edko_dokter_bedah_ket').val(data.dko_dokter_bedah_ket);
                }
                if (data.dko_dokter_anestesi_ket !== null) {
                    $('#edko_dokter_anestesi_ket').val(data.dko_dokter_anestesi_ket);
                }
                if (data.dko_perawat_ket !== null) {
                    $('#edko_perawat_ket').val(data.dko_perawat_ket);
                }
                $('#edko_foto_tidak').prop('checked', data.dko_foto === '0');
                $('#edko_foto_ya').prop('checked', data.dko_foto === '1');

                //  sign out
                if (data.jam_sign_out !== null) {
                    $('#edko_jam_sign_out').val(data.jam_sign_out);
                }
                $('#edko_tindakan').prop('checked', data.dko_tindakan === '1');
                $('#edko_instrumen').prop('checked', data.dko_instrumen === '1');
                $('#edko_specimen').prop('checked', data.dko_specimen === '1');
                $('#edko_masalah_tidak').prop('checked', data.dko_masalah === '0');
                $('#edko_masalah_ya').prop('checked', data.dko_masalah === '1');
                $('#edko_review').prop('checked', data.dko_review === '1');
                if (data.tanggal_verifikasi !== null) {
                    $('#edko_tanggal_verifikasi').val(data.tanggal_verifikasi);
                }

                // perawat dan dokter
                $('#edko_perawat_sign_in').val(data.dko_perawat_sign_in);
                $('#s2id_edko_perawat_sign_in a .select2c-chosen').html(data.perawat_sign_in);
                $('#edko_ttd_perawat_sign_in').prop('checked', data.dko_ttd_perawat_sign_in === '1');

                $('#edko_dokter_sign_in').val(data.dko_dokter_sign_in);
                $('#s2id_edko_dokter_sign_in a .select2c-chosen').html(data.dokter_sign_in);
                $('#edko_ttd_dokter_sign_in').prop('checked', data.dko_ttd_dokter_sign_in === '1');

                $('#edko_operator_time_out').val(data.dko_operator_time_out);
                $('#s2id_edko_operator_time_out a .select2c-chosen').html(data.operator_time_out);
                $('#edko_ttd_operator_time_out').prop('checked', data.dko_ttd_operator_time_out === '1');

                $('#edko_dokter_time_out').val(data.dko_dokter_time_out);
                $('#s2id_edko_dokter_time_out a .select2c-chosen').html(data.dokter_time_out);
                $('#edko_ttd_dokter_time_out').prop('checked', data.dko_ttd_dokter_time_out === '1');

                $('#edko_perawat_time_out').val(data.dko_perawat_time_out);
                $('#s2id_edko_perawat_time_out a .select2c-chosen').html(data.perawat_time_out);
                $('#edko_ttd_perawat_time_out').prop('checked', data.dko_ttd_perawat_time_out === '1');

                $('#edko_operator_sign_out').val(data.dko_operator_sign_out);
                $('#s2id_edko_operator_sign_out a .select2c-chosen').html(data.operator_sign_out);
                $('#edko_ttd_operator_sign_out').prop('checked', data.dko_ttd_operator_sign_out === '1');

                $('#edko_dokter_sign_out').val(data.dko_dokter_sign_out);
                $('#s2id_edko_dokter_sign_out a .select2c-chosen').html(data.dokter_sign_out);
                $('#edko_ttd_dokter_sign_out').prop('checked', data.dko_ttd_dokter_sign_out === '1');

            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }

    function updateSurgicalSafetyCeklis(id, id_pendaftaran, id_layanan_pendaftaran, bed) {
        if ($('#edko_tanggal_verifikasi').val() === '' || $('#edko_tanggal_verifikasi').val() === null) {
            syams_validation('#edko_tanggal_verifikasi', 'Tanggal Surgical Safety Ceklis Kamar Operasi harus diisi.');
            return false;
        } else {
            syams_validation_remove('#edko_tanggal_verifikasi');
        }

        $.ajax({
            type: 'PUT',
            url: '<?= base_url("pelayanan/api/pelayanan/update_surgical_luar_kamar") ?>',
            data: $('#form-edit-surgical-luar-kamar').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status) {
                    messageEditSuccess();
                    entriKeperawatan(id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    messageEditFailed();
                }
                $('#modal-edit-surgical-safety-ceklis').modal('hide');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    function hapusSurgicalSafetyCeklis(obj, id) {
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
                            url: '<?= base_url("pelayanan/api/pelayanan/hapus_surgical_luar_kamar") ?>/' +
                                id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    removeListTable(obj);
                                } else {
                                    customAlert('Hapus Surgical Safety Ceklis', data.message);
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

    function resetFormEntriKeperawatan() {
        $('#form_entri_keperawatan')[0].reset();

        // readonly
        $('#dko_perawat_sign_in, #dko_dokter_sign_in, #dko_operator_time_out, #dko_dokter_time_out, #dko_perawat_time_out, #dko_operator_sign_out, #dko_dokter_sign_out').select2c('readonly', false);

        // input text
        $('#dko_jam_sign_in, #dko_alergi_ket, #dko_jam_time_out, #dko_jam_sign_out, #dko_tanggal_verifikasi, #dko_perawat_sign_in, #dko_operator_time_out, #dko_dokter_time_out, #dko_perawat_time_out, #dko_operator_sign_out, #dko_dokter_sign_out').val('');

        // textarea
        $('#dko_dokter_bedah_ket, #dko_dokter_anestesi_ket, #dko_perawat_ket').val('');

        // show & hide tanda tangan
        // $('#dko_ttd_perawat_sign_in, #dko_ttd_dokter_sign_in, #dko_ttd_operator_time_out, #dko_ttd_dokter_time_out, #dko_ttd_perawat_time_out, #dko_ttd_operator_sign_out, #dko_ttd_dokter_sign_out').show();
        // $('#').hide();
        // $('#plsp_ttd_petugas_verified').hide();
        
        // checkbox
        $('#dko_gelang, #dko_lokasi, #dko_prosedur, #dko_izin, #dko_obat, #dko_konfirmasi, #dko_nama, #dko_prosedur_time_out, #dko_insisi, #dko_profilaksis, #dko_tindakan, #dko_instrumen, #dko_specimen, #dko_review, #dko_ttd_perawat_sign_in, #dko_ttd_dokter_sign_in, #dko_ttd_operator_time_out, #dko_ttd_dokter_time_out, #dko_ttd_perawat_time_out, #dko_ttd_operator_sign_out, #dko_ttd_dokter_sign_out').prop('checked', false);
        
        // radio
        $('#dko_tanda_ya, #dko_tanda_tidak, #dko_alergi_tidak, #dko_alergi_ya, #dko_aspirasi_tidak, #dko_aspirasi_ya, #dko_darah_tidak, #dko_darah_ya, #dko_anestesi_umum, #dko_anestesi_regional, #dko_anestesi_blok, #dko_anestesi_lokal, #dko_foto_ya, #dko_foto_tidak, #dko_masalah_ya, #dko_masalah_tidak').prop('checked', false);

        // nama dokter dan perawat
        $('#s2id_dko_perawat_sign_in a .select2c-chosen').empty();
        $('#dko_perawat_sign_in').val('');

        $('#s2id_dko_dokter_sign_in a .select2c-chosen').empty();
        $('#dko_dokter_sign_in').val('');

        $('#s2id_dko_operator_time_out a .select2c-chosen').empty();
        $('#dko_operator_time_out').val('');

        $('#s2id_dko_dokter_time_out a .select2c-chosen').empty();
        $('#dko_dokter_time_out').val('');

        $('#s2id_dko_perawat_time_out a .select2c-chosen').empty();
        $('#dko_perawat_time_out').val('');

        $('#s2id_dko_operator_sign_out a .select2c-chosen').empty();
        $('#dko_operator_sign_out').val('');

        $('#s2id_dko_dokter_sign_out a .select2c-chosen').empty();
        $('#dko_dokter_sign_out').val('');
        

    }

    function konfirmasiSimpanEntriKeperawatan() {
        swal.fire({
            title: 'Simpan Entri Keperawatan',
            text: "Apakah anda yakin akan menyimpan Form Surgical Safety Cheklist Di Luar Kamar Operasi?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
            cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                simpanEntriKeperawatan();
            }
        })

      
    }

    function simpanEntriKeperawatan() {
        if ($('#dko_tanggal_verifikasi').val() === '') {
            syams_validation('#dko_tanggal_verifikasi', 'Tanggal Surgical Safety Ceklis Kamar Operasi harus diisi.');
            return false;
        } else {
            syams_validation_remove('#dko_tanggal_verifikasi');
        }
        $.ajax({
            type: 'POST',
            url: '<?= base_url("form_rekam_medis/api/entri_keperawatan/simpan_entri_keperawatan") ?>',
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
                        $('#modal_entri_keperawatan_rm').modal('hide');
                        showListForm($('#ek_id_pendaftaran').val(), $('#ek_id_layanan_pendaftaran').val(), $('#ek_id_pasien').val());
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

</script>