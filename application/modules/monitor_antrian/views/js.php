<script>
    $(function() {
      
        $('#label-monitor-antrian').html('MONITOR ANTRIAN RSUD KOTA TANGERANG');

        $('#loket-satu').empty();
        $('#loket-dua').empty();
        $('#loket-tiga').empty();
        $('#loket-empat').empty();
        $('#loket-lima').empty();
        $('#loket-enam').empty();
        $('#loket-tujuh').empty();
        $('#loket-delapan').empty();
        $('#loket-sembilan').empty();
        $('#loket-sepuluh').empty();

        setInterval(function() {
            $('#jam-antrian').html('<h4><b>'+$('#jam').html()+'</b></h4>')
            getMonitorAntrian();
        }, 1000);


    });

    var elem = document.getElementById("monitor-antrian");

    function openFullscreen() {
        if (elem.requestFullscreen) {
            elem.requestFullscreen();
        } else if (elem.webkitRequestFullscreen) {
            /* Safari */
            elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) {
            /* IE11 */
            elem.msRequestFullscreen();
        }
    }

    function closeFullscreen() {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.webkitExitFullscreen) {
            /* Safari */
            document.webkitExitFullscreen();
        } else if (document.msExitFullscreen) {
            /* IE11 */
            document.msExitFullscreen();
        }
    }

    function getMonitorAntrian() {

        $.ajax({
            url: '<?= base_url('monitor_antrian/api/monitor_antrian/data_monitor_antrian') ?>',
            type: 'GET',
            cache: false,
            dataType: 'JSON',
            success: function(data) {

                getLoketSatu(data.loket_satu);
                getLoketDua(data.loket_dua);
                getLoketTiga(data.loket_tiga);
                getLoketEmpat(data.loket_empat);
                getLoketLima(data.loket_lima);
                getLoketEnam(data.loket_enam);
                getLoketTujuh(data.loket_tujuh);
                getLoketDelapan(data.loket_delapan);
                getLoketSembilan(data.loket_sembilan);
                getLoketSepuluh(data.loket_sepuluh);

            },
            error: function(e) {
                accessFailed(e.status);
            }
        });

    }

    function getLoketSatu(data) {

        if (data !== null) {

            $('#loket-satu').empty();

            let arLokSatu = [];

            $.each(data, function(i, v) {

                arLokSatu.push(v.nomor_antrean);

            });

            let loketSatu = [...new Set(arLokSatu)];

            $.each(loketSatu, function(i, v) {

                let html = '<tr>' +
                    '<td class="center"><h2><b>' + v + '</b></h2></td>' +
                    '</tr>';
                $('#loket-satu').append(html);


            });

        }

    }

    function getLoketDua(data) {

        if (data !== null) {

            $('#loket-dua').empty();

            let arLokDua = [];

            $.each(data, function(i, v) {

                arLokDua.push(v.nomor_antrean);

            });

            let loketDua = [...new Set(arLokDua)];

            $.each(loketDua, function(i, v) {

                let html = '<tr>' +
                    '<td class="center"><h2><b>' + v + '</b></h2></td>' +
                    '</tr>';
                $('#loket-dua').append(html);

            });

        }

    }

    function getLoketTiga(data) {

        if (data !== null) {

            $('#loket-tiga').empty();

            let arLokTiga = [];

            $.each(data, function(i, v) {

                arLokTiga.push(v.nomor_antrean);

            });

            let loketTiga = [...new Set(arLokTiga)];

            $.each(loketTiga, function(i, v) {

                let html = '<tr>' +
                    '<td class="center"><h2><b>' + v + '</b></h2></td>' +
                    '</tr>';
                $('#loket-tiga').append(html);


            });

        }
    }

    function getLoketEmpat(data) {

        if (data !== null) {

            $('#loket-empat').empty();

            let arLokEmpat = [];

            $.each(data, function(i, v) {

                arLokEmpat.push(v.nomor_antrean);

            });

            let loketEmpat = [...new Set(arLokEmpat)];

            $.each(loketEmpat, function(i, v) {

                let html = '<tr>' +
                    '<td class="center"><h2><b>' + v + '</b></h2></td>' +
                    '</tr>';
                $('#loket-empat').append(html);


            });

        }

    }

    function getLoketLima(data) {

        if (data !== null) {

            $('#loket-lima').empty();

            let arLokLima = [];

            $.each(data, function(i, v) {

                arLokLima.push(v.nomor_antrean);

            });

            let loketLima = [...new Set(arLokLima)];

            $.each(loketLima, function(i, v) {

                let html = '<tr>' +
                    '<td class="center"><h2><b>' + v + '</b></h2></td>' +
                    '</tr>';
                $('#loket-lima').append(html);


            });

        }

    }

    function getLoketEnam(data) {

        if (data !== null) {

            $('#loket-enam').empty();

            let arLokEnam = [];

            $.each(data, function(i, v) {

                arLokEnam.push(v.nomor_antrean);

            });

            let loketEnam = [...new Set(arLokEnam)];

            $.each(loketEnam, function(i, v) {

                let html = '<tr>' +
                    '<td class="center"><h2><b>' + v + '</b></h2></td>' +
                    '</tr>';
                $('#loket-enam').append(html);


            });

        }

    }

    function getLoketTujuh(data) {

        if (data !== null) {

            $('#loket-tujuh').empty();

            let arLokTujuh = [];

            $.each(data, function(i, v) {

                arLokTujuh.push(v.nomor_antrean);

            });

            let loketTujuh = [...new Set(arLokTujuh)];

            $.each(loketTujuh, function(i, v) {

                let html = '<tr>' +
                    '<td class="center"><h2><b>' + v + '</b></h2></td>' +
                    '</tr>';
                $('#loket-tujuh').append(html);


            });

        }

    }

    function getLoketDelapan(data) {

        if (data !== null) {

            $('#loket-delapan').empty();

            let arLokDelapan = [];

            $.each(data, function(i, v) {

                arLokDelapan.push(v.nomor_antrean);

            });

            let loketDelapan = [...new Set(arLokDelapan)];

            $.each(loketDelapan, function(i, v) {

                let html = '<tr>' +
                    '<td class="center"><h2><b>' + v + '</b></h2></td>' +
                    '</tr>';
                $('#loket-delapan').append(html);


            });

        }

    }

    function getLoketSembilan(data) {

        if (data !== null) {

            $('#loket-sembilan').empty();

            let arLokSembilan = [];

            $.each(data, function(i, v) {

                arLokSembilan.push(v.nomor_antrean);

            });

            let loketSembilan = [...new Set(arLokSembilan)];

            $.each(loketSembilan, function(i, v) {

                let html = '<tr>' +
                    '<td class="center"><h2><b>' + v + '</b></h2></td>' +
                    '</tr>';
                $('#loket-sembilan').append(html);


            });

        }

    }

    function getLoketSepuluh(data) {

        if (data !== null) {

            $('#loket-sepuluh').empty();

            let arLokSepuluh = [];

            $.each(data, function(i, v) {

                arLokSepuluh.push(v.nomor_antrean);

            });

            let loketSepuluh = [...new Set(arLokSepuluh)];

            $.each(loketSepuluh, function(i, v) {

                let html = '<tr>' +
                    '<td class="center"><h2><b>' + v + '</b></h2></td>' +
                    '</tr>';
                $('#loket-sepuluh').append(html);


            });

        }

    }
</script>