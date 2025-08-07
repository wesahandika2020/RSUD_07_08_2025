<script>
    function lihatFORM_REM_12_00(data) {
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
        
        let action  = 'lihat';
        window.open('<?= base_url('pendaftaran_poli/cetak_visum_et_repertum/') ?>' + layanan.id,
                    'Cetak Visum Et Repertum', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);				
    }

    function editFORM_REM_12_00(data) {
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
        
        let action  = 'edit';
		let details = layanan.id + '#' + pasien.id_pasien + '#' + pasien.nama + '#' + layanan.dokter + '#' + layanan.id_dokter + '#' + hitungUmur(pasien.tanggal_lahir) + '#' + layanan.jenis_layanan + '#' + layanan.id_penjamin + '#' + layanan.penjamin + '#' + layanan.cara_bayar + '#' + pasien.telp + '#rajal' + '#' + layanan.id_pendaftaran;
        cetakVisumEtRepertum(details,action);
    }

    function tambahFORM_REM_12_00(data) {
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
        
        let action  = 'tambah';
		let details = layanan.id + '#' + pasien.id_pasien + '#' + pasien.nama + '#' + layanan.dokter + '#' + layanan.id_dokter + '#' + hitungUmur(pasien.tanggal_lahir) + '#' + layanan.jenis_layanan + '#' + layanan.id_penjamin + '#' + layanan.penjamin + '#' + layanan.cara_bayar + '#' + pasien.telp + '#rajal' + '#' + layanan.id_pendaftaran;
        cetakVisumEtRepertum(details,action);
    }

    function cetakVisumEtRepertum(details,action){
        $('#btn_simpan').hide();
        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        var profesi = '<?= $this->session->userdata('profesinadis') ?>';
        groupAccount == 'Admin' ? profesi = 'Perawat' : '' ;
        action !== 'lihat' ? $('#btn_simpan').show() : $('#btn_simpan').hide();

        let detail = details.split('#');
        $.ajax({
            type: 'GET',
            url: '<?= base_url('rekam_medis/api/rekam_medis/check_visum_et_repertum') ?>/id/' + detail[0],
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // Set all values first
                resetModalVisumEtRepertum();

                // Set values in Penolakan Tindakan Kedokteran modal
                $('#modal-visum-et-repertum-title').html(`<b>Form Visum Et Repertum</b> | No. RM: ${detail[2]}, Nama: ${detail[1]}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[3]}</b></i>`);
                $('#id-pasien-ver').val(detail[1]);
                $('#id-pendaftaran-ver-asli').val(detail[12]);
                $('#id-pendaftaran-ver').val(detail[0]);
                $('#id-dokter-jaga-idg-ver').val(data.id_dokter_igd);
                $('#nomor-visum-ver').val(data.nomor_visum);
                $('#nomor-surat-ver').val(data.nomor_surat);
                $('#tahun-surat-ver').val(data.tahun_surat);
                $('#diperiksa-ver').val(datetimefmysql(data.diperiksa));
                $('#diterima-ver').val(datetimefmysql(data.diterima));
                $('#nomor-polisi-ver').val(data.nomor_polisi);
                $('#ditandatangani-oleh-ver').val(data.ditandatangani_oleh);
                $('#pangkat-ver').val(data.pangkat);
                $('#nrp-ver').val(data.nrp);
                $('#berat-badan-ver').val(data.berat_badan);
                $('#panjang-badan-ver').val(data.panjang_badan);
                $('#warna-kulit-ver').val(data.warna_kulit);
                $('#warna-pelangi-mata-ver').val(data.warna_pelangi_mata);
                $('#warna-rambut-ver').val(data.warna_rambut);
                $('#warna-pakaian-ver').val(data.warna_pakaian);
                $('#bahan-pakaian-ver').val(data.bahan_pakaian);
                $('#merk-pakaian-ver').val(data.merk_pakaian);
                $('#ukuran-pakaian-ver').val(data.ukuran_pakaian);
                $('#gambar-lambang-pakaian-ver').val(data.gambar_lambang_pakaian);
                $('#warna-celana-ver').val(data.warna_celana);
                $('#ukuran-celana-ver').val(data.ukuran_celana);
                $('#merk-celana-ver').val(data.merk_celana);
                $('#perhiasan-ver').val(data.perhiasan);
                $('#lain-lain-identitas-pasien-ver').val(data.lain_lain_identitas_pasien);
                $('#tubuh-ver').val(data.tubuh);
                $('#anggota-gerak-atas-kanan-ver').val(data.anggota_gerak_atas_kanan);
                $('#anggota-gerak-atas-kiri-ver').val(data.anggota_gerak_atas_kiri);
                $('#anggota-gerak-bawah-kanan-ver').val(data.anggota_gerak_bawah_kanan);
                $('#anggota-gerak-bawah-kiri-ver').val(data.anggota_gerak_bawah_kiri);
                $('#alis-mata-ver').val(data.alis_mata);
                $('#bulu-mata-ver').val(data.bulu_mata);
                $('#selaput-kelopak-mata-ver').val(data.selaput_kelopak_mata);
                $('#selaput-bening-mata-ver').val(data.selaput_biji_mata);
                $('#selaput-biji-mata-ver').val(data.selaput_biji_mata);
                $('#bentuk-pupil-mata-ver').val(data.bentuk_pupil);
                $('#ukuran-pupil-mata-ver').val(data.ukuran_pupil);
                $('#garis-tengah-pupil-mata-ver').val(data.garis_tengah);
                $('#garis-kanan-pupil-mata-ver').val(data.garis_kanan);
                $('#garis-kiri-pupil-mata-ver').val(data.garis_kiri);
                $('#pelangi-mata-ver').val(data.pelangi_mata);
                $('#kesimpulan-ver').val(data.kesimpulan);
                $('#s2id_dokter-jaga-igd-ver a .select2c-chosen').html(data.nama_dokter_jaga_igd);
                $("#bulan-surat-ver").val(data.bulan_surat).change();

                if (data.ciri_rambut == 'Pendek') {
                    document.getElementById("pendek-ver").checked = true;
                } else if (data.ciri_rambut == 'Panjang') {
                    document.getElementById("panjang-ver").checked = true;
                }

                if (data.keadaan_gizi == 'Kurang') {
                    document.getElementById("kurang-ver").checked = true;
                } else if (data.keadaan_gizi == 'Cukup') {
                    document.getElementById("cukup-ver").checked = true;
                } else if (data.keadaan_gizi == 'Lebih') {
                    document.getElementById("lebih-ver").checked = true;
                }

                if (data.pakaian == 'Baju lengan panjang') {
                    document.getElementById("pakaian-lengan-panjang-ver").checked = true;
                } else if (data.pakaian == 'Baju lengan pendek') {
                    document.getElementById("pakaian-lengan-pendek-ver").checked = true;
                }

                if (data.tampak_pakaian == 'Ada darah') {
                    document.getElementById("ada-darah-ver").checked = true;
                } else if (data.tampak_pakaian == 'Tidak ada darah') {
                    document.getElementById("tidak-ada-darah-ver").checked = true;
                }

                if (data.bentuk_hidung == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-bentuk-hidung-ver").checked = true;
                } else if (data.bentuk_hidung == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-bentuk-hidung-ver").checked = true;
                }

                if (data.permukaan_kulit_hidung == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-permukaan-kulit-hidung-ver").checked = true;
                } else if (data.permukaan_kulit_hidung == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-permukaan-kulit-hidung-ver").checked = true;
                }

                if (data.lubang_hidung == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-lubang-hidung-ver").checked = true;
                } else if (data.lubang_hidung == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-lubang-hidung-ver").checked = true;
                }

                if (data.bentuk_telinga == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-bentuk-telinga-ver").checked = true;
                } else if (data.bentuk_telinga == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-bentuk-telinga-ver").checked = true;
                }

                if (data.permukaan_telinga == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-permukaan-telinga-ver").checked = true;
                } else if (data.permukaan_telinga == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-permukaan-telinga-ver").checked = true;
                }

                if (data.lubang_telinga == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-lubang-telinga-ver").checked = true;
                } else if (data.lubang_telinga == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-lubang-telinga-ver").checked = true;
                }

                if (data.bibir_atas == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-bibir-atas-ver").checked = true;
                } else if (data.bibir_atas == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-bibir-atas-ver").checked = true;
                }

                if (data.celana == 'Celana panjang') {
                    document.getElementById("celana-panjang-ver").checked = true;
                } else if (data.celana == 'Rok') {
                    document.getElementById("rok-ver").checked = true;
                } else if (data.celana == 'Kain') {
                    document.getElementById("kain-ver").checked = true;
                }

                if (data.tato == 'Tidak') {
                    document.getElementById("tato-tidak-ada-ver").checked = true;
                } else if (data.tato == 'Ada') {
                    document.getElementById("tato-ada-ver").checked = true;
                    $('#posisi-tato-ver').val(data.posisi_tato);
                    $("#posisi-tato-ver").prop("disabled", false);
                }

                if (data.jaringan_parut == 'Tidak') {
                    document.getElementById("jaringan-parut-tidak-ada-ver").checked = true;
                } else if (data.jaringan_parut == 'Ada') {
                    document.getElementById("jaringan-parut-ada-ver").checked = true;
                    $('#posisi-jaringan-parut-ver').val(data.posisi_jaringan_parut);
                    $("#posisi-jaringan-parut-ver").prop("disabled", false);
                }

                if (data.tahi_lalat == 'Tidak') {
                    document.getElementById("tahi-lalat-tidak-ada-ver").checked = true;
                } else if (data.tahi_lalat == 'Ada') {
                    document.getElementById("tahi-lalat-ada-ver").checked = true;
                    $('#posisi-tahi-lalat-ver').val(data.posisi_tahi_lalat);
                    $("#posisi-tahi-lalat-ver").prop("disabled", false);
                }

                if (data.tanda_lahir == 'Tidak') {
                    document.getElementById("tanda-lahir-tidak-ada-ver").checked = true;
                } else if (data.tanda_lahir == 'Ada') {
                    document.getElementById("tanda-lahir-ada-ver").checked = true;
                    $('#posisi-tanda-lahir-ver').val(data.posisi_tanda_lahir);
                    $("#posisi-tanda-lahir-ver").prop("disabled", false);
                }

                if (data.cacat_fisik == 'Tidak') {
                    document.getElementById("cacat-fisik-tidak-ada-ver").checked = true;
                } else if (data.cacat_fisik == 'Ada') {
                    document.getElementById("cacat-fisik-ada-ver").checked = true;
                    $('#posisi-cacat-fisik-ver').val(data.posisi_cacat_fisik);
                    $("#posisi-cacat-fisik-ver").prop("disabled", false);
                }

                if (data.daerah_berambut == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-daerah-berambut-ver").checked = true;
                } else if (data.daerah_berambut == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-daerah-berambut-ver").checked = true;
                    $('#kelainan-daerah-berambut-ver').val(data.kelainan_daerah_rambut);
                    $("#kelainan-daerah-berambut-ver").prop("disabled", false);
                }

                if (data.bentuk_kepala == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-bentuk-kepala-ver").checked = true;
                } else if (data.bentuk_kepala == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-bentuk-kepala-ver").checked = true;
                    $('#kelainan-bentuk-kepala-ver').val(data.kelainan_bentuk_kepala);
                    $("#kelainan-bentuk-kepala-ver").prop("disabled", false);
                }

                if (data.wajah == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-wajah-ver").checked = true;
                } else if (data.wajah == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-wajah-ver").checked = true;
                    $('#kelainan-wajah-ver').val(data.kelainan_wajah);
                    $("#kelainan-wajah-ver").prop("disabled", false);
                }

                if (data.leher == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-leher-ver").checked = true;
                } else if (data.leher == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-leher-ver").checked = true;
                    $('#kelainan-leher-ver').val(data.kelainan_leher);
                    $("#kelainan-leher-ver").prop("disabled", false);
                }

                if (data.bahu == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-bahu-ver").checked = true;
                } else if (data.bahu == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-bahu-ver").checked = true;
                    $('#kelainan-bahu-ver').val(data.kelainan_bahu);
                    $("#kelainan-bahu-ver").prop("disabled", false);
                }

                if (data.dada == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-dada-ver").checked = true;
                } else if (data.dada == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-dada-ver").checked = true;
                    $('#kelainan-dada-ver').val(data.kelainan_dada);
                    $("#kelainan-dada-ver").prop("disabled", false);
                }

                if (data.punggung == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-punggung-ver").checked = true;
                } else if (data.punggung == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-punggung-ver").checked = true;
                    $('#kelainan-punggung-ver').val(data.kelainan_punggung);
                    $("#kelainan-punggung-ver").prop("disabled", false);
                }

                if (data.perut == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-perut-ver").checked = true;
                } else if (data.perut == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-perut-ver").checked = true;
                    $('#kelainan-perut-ver').val(data.kelainan_perut);
                    $("#kelainan-perut-ver").prop("disabled", false);
                }

                if (data.bokong == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-bokong-ver").checked = true;
                } else if (data.bokong == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-bokong-ver").checked = true;
                    $('#kelainan-bokong-ver').val(data.kelainan_bokong);
                    $("#kelainan-bokong-ver").prop("disabled", false);
                }

                if (data.dubur == 'Tidak ada kelainan') {
                    document.getElementById("tidak-ada-kelainan-dubur-ver").checked = true;
                } else if (data.dubur == 'Ada kelainan') {
                    document.getElementById("ada-kelainan-dubur-ver").checked = true;
                    $('#kelainan-dubur-ver').val(data.kelainan_dubur);
                    $("#kelainan-dubur-ver").prop("disabled", false);
                }

                $('#modal-visum-et-repertum').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function resetModalVisumEtRepertum() {
        // Set default fields
        $('#id-pasien-ver').val('');
        $('#id-pendaftaran-ver-asli').val('');
        $('#id-pendaftaran-ver').val('');
        $('#id-dokter-jaga-idg-ver').val('');
        $('#nomor-visum-ver').val('');
        $('#nomor-surat-ver').val('');
        $('#tahun-surat-ver').val('');
        $('#nomor-polisi-ver').val('');
        $('#ditandatangani-oleh-ver').val('');
        $('#pangkat-ver').val('');
        $('#nrp-ver').val('');
        $('#berat-badan-ver').val('');
        $('#panjang-badan-ver').val('');
        $('#warna-kulit-ver').val('');
        $('#warna-pelangi-mata-ver').val('');
        $('#warna-rambut-ver').val('');
        $('#warna-pakaian-ver').val('');
        $('#bahan-pakaian-ver').val('');
        $('#merk-pakaian-ver').val('');
        $('#ukuran-pakaian-ver').val('');
        $('#gambar-lambang-pakaian-ver').val('');
        $('#warna-celana-ver').val('');
        $('#ukuran-celana-ver').val('');
        $('#merk-celana-ver').val('');
        $('#perhiasan-ver').val('');
        $('#lain-lain-identitas-pasien-ver').val('');
        $('#tubuh-ver').val('');
        $('#anggota-gerak-atas-kanan-ver').val('');
        $('#anggota-gerak-atas-kiri-ver').val('');
        $('#anggota-gerak-bawah-kanan-ver').val('');
        $('#anggota-gerak-bawah-kiri-ver').val('');
        $('#alis-mata-ver').val('');
        $('#bulu-mata-ver').val('');
        $('#selaput-kelopak-mata-ver').val('');
        $('#selaput-bening-mata-ver').val('');
        $('#selaput-biji-mata-ver').val('');
        $('#bentuk-pupil-mata-ver').val('');
        $('#ukuran-pupil-mata-ver').val('');
        $('#garis-tengah-pupil-mata-ver').val('');
        $('#garis-kanan-pupil-mata-ver').val('');
        $('#garis-kiri-pupil-mata-ver').val('');
        $('#pelangi-mata-ver').val('');
        $('#kesimpulan-ver').val('');
        $('#posisi-tato-ver').val('');
        $('#posisi-jaringan-parut-ver').val('');
        $('#posisi-tahi-lalat-ver').val('');
        $('#posisi-tanda-lahir-ver').val('');
        $('#posisi-cacat-fisik-ver').val('');
        $('#kelainan-daerah-berambut-ver').val('');
        $('#kelainan-bentuk-kepala-ver').val('');
        $('#kelainan-wajah-ver').val('');
        $('#kelainan-leher-ver').val('');
        $('#kelainan-bahu-ver').val('');
        $('#kelainan-dada-ver').val('');
        $('#kelainan-punggung-ver').val('');
        $('#kelainan-perut-ver').val('');
        $('#kelainan-bokong-ver').val('');
        $('#kelainan-dubur-ver').val('');
        $("#bulan-surat-ver").val('Januari').change();
        $('#s2id_dokter-jaga-igd-ver a .select2c-chosen').html('');

        // Unchecked fields
        document.getElementById("pendek-ver").checked = false;
        document.getElementById("panjang-ver").checked = false;
        document.getElementById("kurang-ver").checked = false;
        document.getElementById("cukup-ver").checked = false;
        document.getElementById("lebih-ver").checked = false;
        document.getElementById("pakaian-lengan-panjang-ver").checked = false;
        document.getElementById("pakaian-lengan-pendek-ver").checked = false;
        document.getElementById("ada-darah-ver").checked = false;
        document.getElementById("tidak-ada-darah-ver").checked = false;
        document.getElementById("ada-kelainan-bentuk-hidung-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-bentuk-hidung-ver").checked = false;
        document.getElementById("ada-kelainan-permukaan-kulit-hidung-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-permukaan-kulit-hidung-ver").checked = false;
        document.getElementById("ada-kelainan-lubang-hidung-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-lubang-hidung-ver").checked = false;
        document.getElementById("ada-kelainan-bentuk-telinga-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-bentuk-telinga-ver").checked = false;
        document.getElementById("ada-kelainan-permukaan-telinga-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-permukaan-telinga-ver").checked = false;
        document.getElementById("ada-kelainan-lubang-telinga-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-lubang-telinga-ver").checked = false;
        document.getElementById("ada-kelainan-bibir-atas-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-bibir-atas-ver").checked = false;
        document.getElementById("celana-panjang-ver").checked = false;
        document.getElementById("rok-ver").checked = false;
        document.getElementById("kain-ver").checked = false;
        document.getElementById("tato-tidak-ada-ver").checked = false;
        document.getElementById("tato-ada-ver").checked = false;
        document.getElementById("jaringan-parut-tidak-ada-ver").checked = false;
        document.getElementById("jaringan-parut-ada-ver").checked = false;
        document.getElementById("tahi-lalat-tidak-ada-ver").checked = false;
        document.getElementById("tahi-lalat-ada-ver").checked = false;
        document.getElementById("tanda-lahir-tidak-ada-ver").checked = false;
        document.getElementById("tanda-lahir-ada-ver").checked = false;
        document.getElementById("cacat-fisik-tidak-ada-ver").checked = false;
        document.getElementById("cacat-fisik-ada-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-daerah-berambut-ver").checked = false;
        document.getElementById("ada-kelainan-daerah-berambut-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-bentuk-kepala-ver").checked = false;
        document.getElementById("ada-kelainan-bentuk-kepala-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-wajah-ver").checked = false;
        document.getElementById("ada-kelainan-wajah-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-leher-ver").checked = false;
        document.getElementById("ada-kelainan-leher-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-bahu-ver").checked = false;
        document.getElementById("ada-kelainan-bahu-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-dada-ver").checked = false;
        document.getElementById("ada-kelainan-dada-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-punggung-ver").checked = false;
        document.getElementById("ada-kelainan-punggung-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-perut-ver").checked = false;
        document.getElementById("ada-kelainan-perut-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-bokong-ver").checked = false;
        document.getElementById("ada-kelainan-bokong-ver").checked = false;
        document.getElementById("tidak-ada-kelainan-dubur-ver").checked = false;
        document.getElementById("ada-kelainan-dubur-ver").checked = false;

        // Disabled fields
        $("#posisi-tato-ver").prop("disabled", true);
        $("#posisi-jaringan-parut-ver").prop("disabled", true);
        $("#posisi-tahi-lalat-ver").prop("disabled", true);
        $("#posisi-tanda-lahir-ver").prop("disabled", true);
        $("#posisi-cacat-fisik-ver").prop("disabled", true);
        $("#kelainan-daerah-berambut-ver").prop("disabled", true);
        $("#kelainan-bentuk-kepala-ver").prop("disabled", true);
        $("#kelainan-wajah-ver").prop("disabled", true);
        $("#kelainan-leher-ver").prop("disabled", true);
        $("#kelainan-bahu-ver").prop("disabled", true);
        $("#kelainan-dada-ver").prop("disabled", true);
        $("#kelainan-punggung-ver").prop("disabled", true);
        $("#kelainan-perut-ver").prop("disabled", true);
        $("#kelainan-bokong-ver").prop("disabled", true);
        $("#kelainan-dubur-ver").prop("disabled", true);
    }

</script>