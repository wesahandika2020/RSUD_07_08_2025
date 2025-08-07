<script>
    // For Disabled Right Click
    // $(document).bind("contextmenu", function(e) {
    //     return false;
    // }); 

    $(function() {
        // For Disabled Shortcut Keyboard Inspect Element and View Page Source
        document.onkeydown = function(e) {
            // if (e.keyCode == 123) {
            //     return false;
            // }
            // if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
            //     return false;
            // }
            // if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
            //     return false;
            // }
            // if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
            //     return false;
            // }

            // if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
            //     return false;
            // }      
        }

        // For Solved Synchronous XMLHttpRequest on the main thread is deprecated
        $.ajaxPrefilter(function(options, original_Options, jqXHR) {
            options.async = true;
        });

        let accountGroup = '<?= $this->session->userdata('account_group') ?>';
        let idTrans = "<?= $this->session->userdata("id_translucent") ?>";

        if(accountGroup === 'Pendaftaran' | accountGroup === 'Admin Rekam Medis' | accountGroup === 'Rekam Medis'){

            setInterval(function(){
               getPanggilAntrean();
               getPanggilLantaiDua();
            }, 1000);

        }

        $(document).ajaxError(function(event, jqxhr, settings, thrownError) {
            let url = settings.url;
            let res = jqxhr.responseText;
            let status = jqxhr.statusText;
            let code_status = jqxhr.status;
            // let menu = localStorage.getItem("sm_nama_menu");
            console.log(jqxhr)
            console.log(code_status)
            if (code_status == 401) {
                // UNAUTHORIZED
                bootbox.dialog({
                    message: "Session login telah expired, silahkan login kembali",
                    title: "Session Timeout",
                    buttons: {
                        ok: {
                            label: '<i class="fa fa-check"></i> OK',
                            className: "btn-info",
                            callback: function() {
                                location.reload();
                            }
                        }
                    }
                });
                return false;
            }

            if (code_status != 404 && code_status != 0 && status != 'abort') {
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url("logs/api/logs/record_logs") ?>',
                    data: "url=" + url + "&response=" + res + "&status=" + status + "&menu=" + menu,
                    cache: false,
                    success: function(data) {

                    }
                });
            } else if (code_status == 403) {
                return false;
            }
        });

        requestAnimationFrame(clock);

        let sm_menu = localStorage.getItem('sm_menu');
        let nama_modul = localStorage.getItem('sm_modul');
        let sm_nama_menu = localStorage.getItem('sm_nama_menu');

        if (sm_nama_menu !== '') {
            setBreadcrumb(sm_nama_menu, nama_modul);
        }

        if (nama_modul == '') {
            localStorage.setItem('sm_menu', '');
            localStorage.setItem('sm_nama_menu', '');
            localStorage.setItem('sm_modul', '');
        }

        if (sm_menu !== '') {
            $.ajax({
                url: sm_menu,
                data: '',
                cache: false,
                success: function(data) {
                    $('.main-content').empty();
                    $('.main-content').html(data)
                    // $('.main-content').html(data).addClass('bounceIn animated');
                    // setTimeout(function() {
                    //     $('.main-content').removeClass('bounceIn animated');
                    // }, 400);
                }
            });
        } else {
            loadMenu('apps/page_dashboard', 'Dashboard', '', 'Welcome to SIMRS | <b><i><?php echo $hospital->nama ?></i></b>');
        }

        $('.iconic').hover(function() {
            var isHover = $(this).is(':hover')
            if (isHover) {
                $(this).addClass('tada animated')
            } else {
                $(this).removeClass('tada animated')
            }
        })

        // check jika jabatan dokter spesialis 
        if (('<?php echo $this->session->userdata('jabatan') ?>' === 'Dokter Spesialis') || ('<?php echo $this->session->userdata('account') ?>' === 'faizmsyam')) {
            $('.btn_unit').show()
        }

        if ('<?php echo $this->session->userdata('jabatan') ?>' === 'Dokter Umum') {
            $('.btn_unit').show()
        }

        if ('<?php echo $this->session->userdata('jabatan') ?>' === 'Pengelola Jaringan Komputer') {
            $('.btn_unit').show()
        }

        if ('<?php echo $this->session->userdata('id_unit') ?>' === '') {
            openChooseUnit()
        }

        if(
            '<?= $this->session->userdata('id_unit') ?>' !== '' &&
            ('<?= $this->session->userdata('account_group') ?>' === 'Dokter Anestesi' ||
            '<?= $this->session->userdata('account_group') ?>' === 'Dokter Laboratorium' ||
            '<?= $this->session->userdata('account_group') ?>' === 'Dokter Medical Checkup' ||
            '<?= $this->session->userdata('account_group') ?>' === 'Dokter Radiologi' ||
            '<?= $this->session->userdata('account_group') ?>' === 'Dokter Spesialis' ||
            '<?= $this->session->userdata('account_group') ?>' === 'Dokter Spesialis RM' ||
            '<?= $this->session->userdata('account_group') ?>' === 'Dokter Spesialis RM Rehab' ||
            '<?= $this->session->userdata('account_group') ?>' === 'Dokter Umum')
        ){
            openTtdDialog()
        }

        $('#unit_auth').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/unit_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                    };
                },
                results: function (data, page) {
                    var more = (page * 20) < data.total; // whether or not there are more results available
         
                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {results: data.data, more: more};
                }
            },
            formatResult: function(data){
                var markup = data.nama;
                return markup;
            }, 
            formatSelection: function(data){
                return data.nama;
            }
        })

        $('#unit_auth').change(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this)
            }
        })
    });

    function getPanggilAntrean() {

        let idTrans = "<?= $this->session->userdata("id_translucent") ?>";

        $.ajax({
            url: '<?= base_url('panggil_pasien/api/panggil_pasien/panggil_antrian') ?>',
            type: 'GET',
            data: 'trans=' + idTrans,
            cache: false,
            dataType: 'JSON',
            success: function(data) {

                if(typeof data.metaData !== 'undefined'){

                    if(data.metaData.code === 201){

                        // messageCustom(data.metaData.message, 'Success');
                    
                    } else {

                        let urutan = data.metaData.angka_audio;

                        var totalwaktu = 1000;

                        setTimeout(function() {
                                $("#audio").empty();
                                $("#audio").append('<audio class="audio" type="hidden" controls autoplay><source src="<?=resource_url()?>audio/'+data.metaData.huruf_audio+'.wav" type="audio/wav"></audio>');
                                const audio = document.querySelector("audio");
                                audio.playbackRate = 1;
                        }, totalwaktu);
                        totalwaktu=totalwaktu+800;
                        
                        $.each(data.metaData.urutan_audio, function(i, v) {

                            
                            setTimeout(function() {
                                $("#audio").empty();
                                $("#audio").append('<audio class="audio" type="hidden" controls autoplay><source src="<?=resource_url()?>audio/'+v+'.wav" type="audio/wav"></audio>');
                                const audio = document.querySelector("audio");
                                audio.playbackRate = 1;
                            }, totalwaktu);
                            totalwaktu=totalwaktu+1000;
                            
                        })
                        
                        setTimeout(function() {
                               $("#audio").empty();
                               $("#audio").append('<audio class="audio" type="hidden" controls autoplay><source src="<?=resource_url()?>audio/loket.wav" type="audio/wav"></audio>');
                               const audio = document.querySelector("audio");
                                audio.playbackRate = 1;
                            }, totalwaktu);

                        totalwaktu=totalwaktu+800;

                        setTimeout(function() {
                               $("#audio").empty(); 
                               $("#audio").append('<audio class="audio" type="hidden" controls autoplay><source src="<?=resource_url()?>audio/'+data.metaData.c+'.wav" type="audio/wav"></audio>');
                               const audio = document.querySelector("audio");
                                audio.playbackRate = 1;

                            }, totalwaktu);
                        totalwaktu=totalwaktu+800;

                        setTimeout(function() {
                               $("#audio").empty(); 
                               
                            }, totalwaktu);

                        
                    }
                } 
                
            },
            error: function(e) {
                // accessFailed(e.status);
            }
        });
    }


    function getPanggilLantaiDua() {

        let idTrans = "<?= $this->session->userdata("id_translucent") ?>";

        $.ajax({
            url: '<?= base_url('panggil_pasien/api/panggil_pasien/panggil_antrian_lantai_dua') ?>',
            type: 'GET',
            data: 'trans=' + idTrans,
            cache: false,
            dataType: 'JSON',
            success: function(data) {

                if(typeof data.metaData !== 'undefined'){

                    if(data.metaData.code === 201){

                        // messageCustom(data.metaData.message, 'Success');
                    
                    } else {

                        let urutan = data.metaData.angka_audio;

                        var totalwaktu = 0;

                        setTimeout(function() {
                                $("#audio").empty();
                                $("#audio").append('<audio class="audio" type="hidden" controls autoplay><source src="<?=resource_url()?>audio/'+data.metaData.huruf_audio+'.wav" type="audio/wav"></audio>');
                                const audio = document.querySelector("audio");
                                audio.playbackRate = 1;
                        }, totalwaktu);
                        totalwaktu=totalwaktu+800;
                        
                        $.each(data.metaData.urutan_audio, function(i, v) {

                            
                            setTimeout(function() {
                                $("#audio").empty();
                                $("#audio").append('<audio class="audio" type="hidden" controls autoplay><source src="<?=resource_url()?>audio/'+v+'.wav" type="audio/wav"></audio>');
                                const audio = document.querySelector("audio");
                                audio.playbackRate = 1;
                            }, totalwaktu);
                            totalwaktu=totalwaktu+1000;
                            
                        })
                        
                        setTimeout(function() {
                               $("#audio").empty();
                               $("#audio").append('<audio class="audio" type="hidden" controls autoplay><source src="<?=resource_url()?>audio/loket.wav" type="audio/wav"></audio>');
                               const audio = document.querySelector("audio");
                                audio.playbackRate = 1;
                            }, totalwaktu);

                        totalwaktu=totalwaktu+800;

                        setTimeout(function() {
                               $("#audio").empty(); 
                               $("#audio").append('<audio class="audio" type="hidden" controls autoplay><source src="<?=resource_url()?>audio/'+data.metaData.c+'.wav" type="audio/wav"></audio>');
                               const audio = document.querySelector("audio");
                                audio.playbackRate = 1;

                            }, totalwaktu);
                        totalwaktu=totalwaktu+800;

                        setTimeout(function() {
                               $("#audio").empty(); 
                               
                            }, totalwaktu);

                        
                    }
                } 
                
            },
            error: function(e) {
                // accessFailed(e.status);
            }
        });
    }

    function cekAllx(){

        $.ajax({
            type: 'POST',
            url: '<?= base_url("panggil_pasien/api/panggil_pasien/cekAllx") ?>',
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                
            },
            success: function(data) {

            },
            complete: function() {
                
            },
            error: function(e) {
                
            }
        })

    }

    function showLoader() {
        $('body').block({
            message: '<span><img src="<?= resource_url() ?>images/loaders/funnel.gif"/>&nbsp;&nbsp;Mohon Tunggu...</span>',
            css: {
                border: '1px solid #ccc',
                padding: '5px 5px 5px 5px',
                backgroundColor: '#f4f4f4',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: 1,
                width: '180px',
                color: '#1981cd',
                zIndex: 9999999
            },
            overlayCSS: {
                backgroundColor: '#000',
                opacity: 0.1,
                cursor: 'wait',
                overflowY: 'hidden',
                position: 'fixed',
                zIndex: 9999999
            },
        });
    }

    function showLoaderWithMessage(msg) {
        $('body').block({
            message: '<span><img src="<?= resource_url() ?>images/loaders/funnel.gif"/>&nbsp;&nbsp;' + msg + '</span>',
            css: {
                border: '1px solid #ccc',
                padding: '5px 5px 5px 5px',
                backgroundColor: '#f4f4f4',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: 1,
                width: 'auto',
                color: '#1981cd',
                zIndex: 9999999
            },
            overlayCSS: {
                backgroundColor: '#000',
                opacity: 0.1,
                cursor: 'wait',
                overflowY: 'hidden',
                position: 'fixed',
                zIndex: 9999999
            },
        });
    }

    function hideLoader() {
        $('body').unblock();
    }


    function clock() {
        var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];

        var date = new Date();
        var day = date.getDate();
        var month = date.getMonth();
        var thisDay = date.getDay(),
            thisDay = myDays[thisDay];

        var yy = date.getYear();

        var year = (yy < 1000) ? yy + 1900 : yy;

        var Hari = '<i class="far fa-calendar-alt"></i>  ' + thisDay + ', ' + day + ' ' + months[month] + ' ' + year;
        //document.write();

        var now = new Date();
        var secs = ('0' + now.getSeconds()).slice(-2);
        var mins = ('0' + now.getMinutes()).slice(-2);
        var hr = ('0' + now.getHours()).slice(-2);
        var Time = " - <i class='far fa-clock'></i> : " + hr + " : " + mins + " : " + secs + " WIB";
        document.getElementById("jam").innerHTML = Hari + Time;
        requestAnimationFrame(clock);
    }

    function backToHome() {
        localStorage.setItem("sm_menu", '');
        localStorage.setItem("sm_nama_menu", '');
        localStorage.setItem("sm_modul", '');

        loadMenu('apps/page_dashboard', 'Dashboard', '', 'Welcome to SIMRS | <b><i><?php echo $hospital->nama ?></i></b>');
        location.href = '<?= base_url() ?>';
    }

    function loadMenu(url, nama_modul, modul, menu) {
        localStorage.setItem('sm_menu', '<?= base_url("' + url + '") ?>');
        localStorage.setItem('sm_nama_menu', menu);
        localStorage.setItem('sm_modul', nama_modul);
        setBreadcrumb(menu, nama_modul);

        $.ajax({
            url: '<?= base_url("' + url + '") ?>',
            data: '',
            cache: false,
            success: function(data) {
                $('.main-content').empty();
                $('.main-content').html(data)
                // $('.main-content').html(data).addClass('bounceIn animated');
                // setTimeout(function() {
                //     $('.main-content').removeClass('bounceIn animated');
                // }, 300);
            }
        });

        // location.reload();
    }

    function setBreadcrumb(menu, nama_modul) {
        $('#heading').html(menu);
        $('#active').html(nama_modul);
        $('#menu').html(menu);
    }

    function logout() {
        sessionStorage.clear();
        location.href = '<?= base_url('auth/logout') ?>';
    }

    function openChooseUnit() {
        $('#units_modal').modal('show')
    }

    function setUnit(id_unit, unit) {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('auth/dinamic_unit_set') ?>',
            data: 'id_unit=' + id_unit + '&unit=' + unit,
            dataType: 'JSON',
            success: function(data) {
                if (data.status === true) {
                    location.reload()
                } else {
                    location.reload()
                }
            }
        })
    }

    function setUnit2(id_unit, unit) {
        var id_unit = $('#unit_auth').val();
        var unit = $('#s2id_unit_auth a .select2-chosen').html();
        if (id_unit === '') {
            syams_validation('#unit_auth','Unit harus diiisikan!'); return false;
        }
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('auth/dinamic_unit_set') ?>',
            data: 'id_unit=' + id_unit + '&unit=' + unit,
            dataType: 'JSON',
            success: function(data) {
                if (data.status === true) {
                    location.reload()
                } else {
                    location.reload()
                }
            }
        })
    }

    function openTtdDialog(){
        const sessionTtd = sessionStorage.getItem('ttd');

        if(sessionTtd !== null){
            return false;
        }

        sessionStorage.setItem('ttd', '1');
        $.ajax({
            type: 'GET',
            url: '<?= base_url('profile/api/profile/get_ttd_dokter') ?>',
            dataType: 'JSON',
            success: function(data) {
                if(data.tanda_tangan === null){
                    bootbox.dialog({
                        message: "Dokter belum menambahkan tanda tangan. Apakah ingin menambahkan tanda tangan sekarang?",
                        title: "<b>Tambahkan Tanda Tangan Dokter</b>",
                        buttons: {
                            nanti_saja: {
                                label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                                className: "btn-secondary",
                                callback: function() {
                                }
                            },
                            tambah: {
                                label: '<i class="fas fa-plus mr-1"></i>Tambah',
                                className: "btn-info",
                                callback: function() {
                                    loadMenu('profile/page_profile', 'Profile', 'My Profile', 'My Profile');
                                }
                            }
                        }
                    });
                }
            },
            error: function(e) {
                messageCustom(e.status, 'Error');
            }
        })
    }
</script>

<div class="modal fade" id="units_modal" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Pilih Posisi Unit Anda Sekarang.</b></h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label><em>Pilih Unit :</em></label>
                            <input type="text" id="unit_auth" class="select2-input">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="setUnit2()" class="btn btn-info"><i class="fas fa-fw fa-map-marker-alt mr-1"></i>Set</button>
            </div>
        </div>
    </div>
</div>