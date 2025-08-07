<script>
    function lihatFORM_REM_30_01(data) {
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
        window.open('<?= base_url('pemeriksaan_poli/cetak_checklist_penerimaan_pasien_rawat_inap/') ?>' + layanan.id,
                    'Cetak Checklist Penerimaan Pasien Rawat Inap', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
    }

    function editFORM_REM_30_01(data) {
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
        cetakChecklistPenerimaanPasienRawatInap(details,action);
    }

    function tambahFORM_REM_30_01(data) {
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
        cetakChecklistPenerimaanPasienRawatInap(details,action);
    }

    
    function cetakChecklistPenerimaanPasienRawatInap(details,action) {

        $('#btn_simpan').hide();
        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        var profesi = '<?= $this->session->userdata('profesinadis') ?>';
        if (groupAccount == 'Admin') {
            profesi = 'Perawat';
        }

        if (action !== 'lihat' ) {
            $('#btn_simpan').show();
        } else {
            $('#btn_simpan').hide();
        }

        let detail = details.split('#');
        $.ajax({
            type: 'GET',
            url: '<?= base_url('rekam_medis/api/rekam_medis/check_checklist_penerimaan_pasien_rawat_inap') ?>/id/' +
                detail[0],
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // Reset all values first
                resetModalChecklistPenerimaanPasienRawatInap();

                // Set values in Penolakan Tindakan Kedokteran modal
                $('#modal-checklist-penerimaan-pasien-rawat-inap-title').html(
                    `<b>Form Checklist Penerimaan Pasien Rawat Inap</b> | No. RM: ${detail[1]}, Nama: ${detail[2]}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${detail[10]}</b></i>`
                );

                $('#id-pasien-cpri').val(detail[1]);
                $('#id-pendaftaran-cpri').val(detail[12]);
                $('#id-layanan-pendaftaran-cpri').val(detail[0]);
                $('#nama-keluarga-cpri').val(data.nama_keluarga);

                if (data.is_pasien == 1) {
                    document.getElementById("is-pasien-cpri-ya").checked = true;
                } else if (data.is_pasien == 0) {
                    document.getElementById("is-pasien-cpri-tidak").checked = true;
                }

                if (data.perawat_yang_merawat == 1) {
                    document.getElementById("informasi-tentang-perawat-yang-merawat-hari-ini-ya").checked =
                        true;
                } else if (data.perawat_yang_merawat == 0) {
                    document.getElementById("informasi-tentang-perawat-yang-merawat-hari-ini-tidak").checked =
                        true;
                }

                if (data.dokter_yang_merawat == 1) {
                    document.getElementById("informasi-tentang-dokter-yang-merawat-ya").checked = true;
                } else if (data.dokter_yang_merawat == 0) {
                    document.getElementById("informasi-tentang-dokter-yang-merawat-tidak").checked = true;
                }

                if (data.nurse_station == 1) {
                    document.getElementById("nurse-station-ya").checked = true;
                } else if (data.nurse_station == 0) {
                    document.getElementById("nurse-station-tidak").checked = true;
                }

                if (data.kamar_mandi_pasien == 1) {
                    document.getElementById("kamar-mandi-pasien-ya").checked = true;
                } else if (data.kamar_mandi_pasien == 0) {
                    document.getElementById("kamar-mandi-pasien-tidak").checked = true;
                }

                if (data.bel_pasien == 1) {
                    document.getElementById("bel-di-kamar-mandi-ya").checked = true;
                } else if (data.bel_pasien == 0) {
                    document.getElementById("bel-di-kamar-mandi-tidak").checked = true;
                }

                if (data.tempat_tidur_pasien == 1) {
                    document.getElementById("tempat-tidur-pasien-ya").checked = true;
                } else if (data.tempat_tidur_pasien == 0) {
                    document.getElementById("tempat-tidur-pasien-tidak").checked = true;
                }

                if (data.remote == 1) {
                    document.getElementById("remote-tv-ac-ya").checked = true;
                } else if (data.remote == 0) {
                    document.getElementById("remote-tv-ac-tidak").checked = true;
                }

                if (data.tempat_ibadah == 1) {
                    document.getElementById("tempat-ibadah-ya").checked = true;
                } else if (data.tempat_ibadah == 0) {
                    document.getElementById("tempat-ibadah-tidak").checked = true;
                }

                if (data.tempat_sampah == 1) {
                    document.getElementById("tempat-sampah-infeksi-dan-non-infeksi-ya").checked = true;
                } else if (data.tempat_sampah == 0) {
                    document.getElementById("tempat-sampah-infeksi-dan-non-infeksi-tidak").checked = true;
                }

                if (data.jadwal_pembagian == 1) {
                    document.getElementById("jadwal-pembagian-makan-dari-rumah-sakit-ya").checked = true;
                } else if (data.jadwal_pembagian == 0) {
                    document.getElementById("jadwal-pembagian-makan-dari-rumah-sakit-tidak").checked = true;
                }

                if (data.jadwal_visit == 1) {
                    document.getElementById("jadwal-visit-dokter-ya").checked = true;
                } else if (data.jadwal_visit == 0) {
                    document.getElementById("jadwal-visit-dokter-tidak").checked = true;
                }

                if (data.jadwal_jam_berkunjung == 1) {
                    document.getElementById("jadwal-jam-berkunjung-ya").checked = true;
                } else if (data.jadwal_jam_berkunjung == 0) {
                    document.getElementById("jadwal-jam-berkunjung-tidak").checked = true;
                }

                if (data.jadwal_ganti_linen == 1) {
                    document.getElementById("jadwal-ganti-linen-ya").checked = true;
                } else if (data.jadwal_ganti_linen == 0) {
                    document.getElementById("jadwal-ganti-linen-tidak").checked = true;
                }

                if (data.membawa_barang_sesuai_keperluan == 1) {
                    document.getElementById("perawat-menjelaskan-untuk-membawa-barang-sesuai-keperluan-ya")
                        .checked = true;
                } else if (data.membawa_barang_sesuai_keperluan == 0) {
                    document.getElementById("perawat-menjelaskan-untuk-membawa-barang-sesuai-keperluan-tidak")
                        .checked = true;
                }

                if (data.mematuhi_peraturan == 1) {
                    document.getElementById(
                            "perawat-menghimbau-untuk-mematuhi-peraturan-yang-tertempel-di-ruangan-ya")
                        .checked = true;
                } else if (data.mematuhi_peraturan == 0) {
                    document.getElementById(
                            "perawat-menghimbau-untuk-mematuhi-peraturan-yang-tertempel-di-ruangan-tidak")
                        .checked = true;
                }

                if (data.tidak_duduk_ditempat_tidur == 1) {
                    document.getElementById("menghimbau-tidak-duduk-ditempat-tidur-ya").checked = true;
                } else if (data.tidak_duduk_ditempat_tidur == 0) {
                    document.getElementById("menghimbau-tidak-duduk-ditempat-tidur-tidak").checked = true;
                }

                if (data.menyimpan_barang_berharga == 1) {
                    document.getElementById("tidak-diperkenankan-menyimpan-barang-berharga-ya").checked = true;
                } else if (data.menyimpan_barang_berharga == 0) {
                    document.getElementById("tidak-diperkenankan-menyimpan-barang-berharga-tidak").checked =
                        true;
                }

                if (data.dapat_kartu_penunggu == 1) {
                    document.getElementById("mendapat-kartu-penunggu-ya").checked = true;
                } else if (data.dapat_kartu_penunggu == 0) {
                    document.getElementById("mendapat-kartu-penunggu-tidak").checked = true;
                }

                if (data.menghargai_privasi_pasien == 1) {
                    document.getElementById("untuk-selalu-menghargai-privasi-pasien-ya").checked = true;
                } else if (data.menghargai_privasi_pasien == 0) {
                    document.getElementById("untuk-selalu-menghargai-privasi-pasien-tidak").checked = true;
                }

                if (data.gelang == 1) {
                    document.getElementById("pemasangan-dan-fungsi-gelang-ya").checked = true;
                } else if (data.gelang == 0) {
                    document.getElementById("pemasangan-dan-fungsi-gelang-tidak").checked = true;
                }

                if (data.cuci_tangan == 1) {
                    document.getElementById("cara-cuci-tangan-ya").checked = true;
                } else if (data.cuci_tangan == 0) {
                    document.getElementById("cara-cuci-tangan-tidak").checked = true;
                }

                $('#modal_checklist_penerimaan_pasien_rawat_inap').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }
    
    function resetModalChecklistPenerimaanPasienRawatInap() {
        // Undisabled fields
        $("#nama-keluarga-cpri").prop("disabled", false);

        // Set default fields
        $('#nama-keluarga-cpri').val('');
        $('#id-layanan-pendaftaran-cpri').val('');

        // Unchecked fields
        document.getElementById("informasi-tentang-perawat-yang-merawat-hari-ini-ya").checked = false;
        document.getElementById("informasi-tentang-perawat-yang-merawat-hari-ini-tidak").checked = false;
        document.getElementById("is-pasien-cpri-ya").checked = false;
        document.getElementById("is-pasien-cpri-tidak").checked = false;
        document.getElementById("informasi-tentang-perawat-yang-merawat-hari-ini-ya").checked = false;
        document.getElementById("informasi-tentang-perawat-yang-merawat-hari-ini-tidak").checked = false;
        document.getElementById("informasi-tentang-dokter-yang-merawat-ya").checked = false;
        document.getElementById("informasi-tentang-dokter-yang-merawat-tidak").checked = false;
        document.getElementById("nurse-station-ya").checked = false;
        document.getElementById("nurse-station-tidak").checked = false;
        document.getElementById("kamar-mandi-pasien-ya").checked = false;
        document.getElementById("kamar-mandi-pasien-tidak").checked = false;
        document.getElementById("bel-di-kamar-mandi-ya").checked = false;
        document.getElementById("bel-di-kamar-mandi-tidak").checked = false;
        document.getElementById("tempat-tidur-pasien-ya").checked = false;
        document.getElementById("tempat-tidur-pasien-tidak").checked = false;
        document.getElementById("remote-tv-ac-ya").checked = false;
        document.getElementById("remote-tv-ac-tidak").checked = false;
        document.getElementById("tempat-ibadah-ya").checked = false;
        document.getElementById("tempat-ibadah-tidak").checked = false;
        document.getElementById("tempat-sampah-infeksi-dan-non-infeksi-ya").checked = false;
        document.getElementById("tempat-sampah-infeksi-dan-non-infeksi-tidak").checked = false;
        document.getElementById("jadwal-pembagian-makan-dari-rumah-sakit-ya").checked = false;
        document.getElementById("jadwal-pembagian-makan-dari-rumah-sakit-tidak").checked = false;
        document.getElementById("jadwal-visit-dokter-ya").checked = false;
        document.getElementById("jadwal-visit-dokter-tidak").checked = false;
        document.getElementById("jadwal-jam-berkunjung-ya").checked = false;
        document.getElementById("jadwal-jam-berkunjung-tidak").checked = false;
        document.getElementById("jadwal-ganti-linen-ya").checked = false;
        document.getElementById("jadwal-ganti-linen-tidak").checked = false;
        document.getElementById("perawat-menjelaskan-untuk-membawa-barang-sesuai-keperluan-ya").checked = false;
        document.getElementById("perawat-menjelaskan-untuk-membawa-barang-sesuai-keperluan-tidak").checked = false;
        document.getElementById("perawat-menghimbau-untuk-mematuhi-peraturan-yang-tertempel-di-ruangan-ya").checked = false;
        document.getElementById("perawat-menghimbau-untuk-mematuhi-peraturan-yang-tertempel-di-ruangan-tidak").checked =
            false;
        document.getElementById("menghimbau-tidak-duduk-ditempat-tidur-ya").checked = false;
        document.getElementById("menghimbau-tidak-duduk-ditempat-tidur-tidak").checked = false;
        document.getElementById("tidak-diperkenankan-menyimpan-barang-berharga-ya").checked = false;
        document.getElementById("tidak-diperkenankan-menyimpan-barang-berharga-tidak").checked = false;
        document.getElementById("mendapat-kartu-penunggu-ya").checked = false;
        document.getElementById("mendapat-kartu-penunggu-tidak").checked = false;
        document.getElementById("untuk-selalu-menghargai-privasi-pasien-ya").checked = false;
        document.getElementById("untuk-selalu-menghargai-privasi-pasien-tidak").checked = false;
        document.getElementById("pemasangan-dan-fungsi-gelang-ya").checked = false;
        document.getElementById("pemasangan-dan-fungsi-gelang-tidak").checked = false;
        document.getElementById("cara-cuci-tangan-ya").checked = false;
        document.getElementById("cara-cuci-tangan-tidak").checked = false;
    }

</script>