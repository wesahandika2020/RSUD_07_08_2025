<script>
    function cetakAntrianLab(id, p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('antrian_lab/api/antrian_lab/antrian_lab_byid') ?>',
            data: 'id=' + id,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {                
                let jmlCetak = data.cetak;
                if (jmlCetak !== '') {

                    totalCetak = parseInt(jmlCetak);
                    if (totalCetak >= 1) {
                        let pesan = ' Tiket Sudah Tercetak, Apakah ingin dicetak ulang?';
                        let confirm_button = 'Cetak';

                        swal.fire({
                            title: 'Cetak Ulang',
                            html: pesan,
                            icon: 'question',
                            showCancelButton: true,
                            confirmButtonText: '<i class="fas fa-save"></i> ' + confirm_button,
                            cancelButtonText: '<i class="fas fa-times-circle"></i> Batal',
                            reverseButtons: true,
                            allowOutsideClick: false
                        }).then((result) => {
                            if (result.value) {
                                var dWidth = $(window).width();
                                var dHeight = $(window).height();
                                var x = screen.width / 2 - dWidth / 2;
                                var y = screen.height / 2 - dHeight / 2;
                                window.open('<?= base_url() ?>antrian_lab/cetak_antrian_lab/' + id, 'Cetak Nomor Antrian Admisi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
                                (p >= 1) ? getListAntrianLab(p) : resetField();
                            }
                        });

                    } else {
                        var dWidth = $(window).width();
                        var dHeight = $(window).height();
                        var x = screen.width / 2 - dWidth / 2;
                        var y = screen.height / 2 - dHeight / 2;
                        window.open('<?= base_url() ?>antrian_lab/cetak_antrian_lab/' + id, 'Cetak Nomor Antrian Admisi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);
                        (p >= 1) ? getListAntrianLab(p) : resetField();
                    }                    
                } 
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageCustom('Terjadi Kesalahan! | Gagal mencetak Antrian Laboratorium')
            }
        });
    }
</script>