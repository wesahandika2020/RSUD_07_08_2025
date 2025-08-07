<script>
	
    $(function() {
        getStatusPanggil();
        console.log('atas');        
    }); 

    function initMonitor(isPanggil){

        getMonitorAntrianLaboratorium();

        if(isPanggil==true){
            console.log('masuk initMonitor isPanggil true='+isPanggil);
            setTimeout(() => setInterval(() => window.location.reload(), 3000), 8000);
            
        } else {
            console.log('masuk initMonitor isPanggil false='+isPanggil);
            setTimeout(() => setInterval(() => window.location.reload(), 3000));            
        }
    }

    var elem = document.getElementById("monitor-antrian");

    function openFullscreen() {
        if (elem.requestFullscreen) {
            elem.requestFullscreen();
        } else if (elem.webkitRequestFullscreen) {
            elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) {  
            elem.msRequestFullscreen();
        }
    }

    function closeFullscreen() {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.webkitExitFullscreen) {
            document.webkitExitFullscreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        }
    }

    function getMonitorAntrianLaboratorium() {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('antrian_lab/api/antrian_lab/get_monitor_antrian_lab') ?>',
            cache: false,
            dataType: 'JSON',
            success: function(data) {       
                // if(data.panggil !== null){
                //     $('#ruang-panggil').html(data.panggil.nomor_antrian);   
                //     $('#lokasi-ruang').html('Ruang '+data.panggil.ruang_laboratorium);
                // }
                 
                if(data.panggil_admin !== null){
                    $('#ruang-panggil-admin').html(data.panggil_admin.nomor_antrian);
                }
                 
                if(data.panggil_sampling !== null){
                    $('#ruang-panggil-sampling').html(data.panggil_sampling.nomor_antrian);
                }
                
                console.log(data);
                data.ruang_admin_a !== null? $('#ruang-admin-a').html(data.ruang_admin_a.nomor_antrian)  : $('#ruang-admin-a').html('-') ;
                data.ruang_admin_b !== null? $('#ruang-admin-b').html(data.ruang_admin_b.nomor_antrian)  : $('#ruang-admin-b').html('-') ;
                data.ruang_admin_c !== null? $('#ruang-admin-c').html(data.ruang_admin_c.nomor_antrian)  : $('#ruang-admin-c').html('-') ;
                data.ruang_admin_d !== null? $('#ruang-admin-d').html(data.ruang_admin_d.nomor_antrian)  : $('#ruang-admin-d').html('-') ;
                data.ruang_admin_e !== null? $('#ruang-admin-e').html(data.ruang_admin_e.nomor_antrian)  : $('#ruang-admin-e').html('-') ;

                data.ruang_admin_a_sisa !== null? $('#ruang-admin-a-sisa').html(data.ruang_admin_a_sisa) : $('#ruang-admin-a-sisa').html('0') ;
                data.ruang_admin_b_sisa !== null? $('#ruang-admin-b-sisa').html(data.ruang_admin_b_sisa) : $('#ruang-admin-b-sisa').html('0') ;
                data.ruang_admin_c_sisa !== null? $('#ruang-admin-c-sisa').html(data.ruang_admin_c_sisa) : $('#ruang-admin-c-sisa').html('0') ;
                data.ruang_admin_d_sisa !== null? $('#ruang-admin-d-sisa').html(data.ruang_admin_d_sisa) : $('#ruang-admin-d-sisa').html('0') ;
                data.ruang_admin_e_sisa !== null? $('#ruang-admin-e-sisa').html(data.ruang_admin_e_sisa) : $('#ruang-admin-e-sisa').html('0') ;

                data.ruang_sampling_a !== null? $('#ruang-sampling-a').html(data.ruang_sampling_a.nomor_antrian): $('#ruang-sampling-a').html('-') ;
                data.ruang_sampling_b !== null? $('#ruang-sampling-b').html(data.ruang_sampling_b.nomor_antrian): $('#ruang-sampling-b').html('-') ;
                data.ruang_sampling_c !== null? $('#ruang-sampling-c').html(data.ruang_sampling_c.nomor_antrian): $('#ruang-sampling-c').html('-') ;
                data.ruang_sampling_d !== null? $('#ruang-sampling-d').html(data.ruang_sampling_d.nomor_antrian): $('#ruang-sampling-d').html('-') ;

                data.ruang_sampling_a_sisa  !== null? $('#ruang-sampling-a-sisa').html(data.ruang_sampling_a_sisa) : $('#ruang-sampling-a-sisa').html('0') ;
                data.ruang_sampling_b_sisa  !== null? $('#ruang-sampling-b-sisa').html(data.ruang_sampling_b_sisa) : $('#ruang-sampling-b-sisa').html('0') ;
                data.ruang_sampling_c_sisa  !== null? $('#ruang-sampling-c-sisa').html(data.ruang_sampling_c_sisa) : $('#ruang-sampling-c-sisa').html('0') ;
                data.ruang_sampling_d_sisa  !== null? $('#ruang-sampling-d-sisa').html(data.ruang_sampling_d_sisa) : $('#ruang-sampling-d-sisa').html('0') ;
            },
            error: function(e) {
                accessFailed(e.status);
                hideLoader();
            }
        });
    }

    function getStatusPanggil() {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('antrian_lab/api/antrian_lab/status_panggil') ?>',
            cache: false,
            dataType: 'JSON',
            success: function(data) {   
                if(data != null){
                    $('#ruang-panggil').html(data.nomor_antrian);
                    $('#lokasi-ruang').html(data.ruang_laboratorium);
                    
		            let idTranslucent = "<?= $this->session->userdata('id_translucent') ?>";
					if(idTranslucent === '1987'){ // 1987 antrian_lab_monitor  // 1460 Putri
                        simpanAntrianPasien(data.id,data.jenis_panggil,data.ruang_laboratorium); 
                        isPanggil = true;  
                        console.log('isPanggil = true; data.id='+data.id+' --- data.jenis_panggil='+data.jenis_panggil);
                    } else {
                        isPanggil = false;  
                        getMonitorAntrianLaboratorium();
                    }                   
                } else {                  
                    isPanggil = false;  
                    console.log('isPanggil = false');
                }      
                console.log('masuk get StatusPanggil isPanggil='+isPanggil);
                initMonitor(isPanggil);
            },
            error: function(e) {
                accessFailed(e.status);
                hideLoader();
            }
        });
    }   

    function simpanAntrianPasien(id,type,ruang_laboratorium){
        $.ajax({
            type: 'POST',
            url: '<?= base_url("antrian_lab/api/antrian_lab/simpan_antrian_pasien") ?>',
            data: 'id=' + id + '&type=' + type + '&ruang=' + ruang_laboratorium,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {
                getPanggilAntrean(id);
                messageCustom('Panggil Antrian Laboratrium  Berhasil Dilakukan', 'Success');
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                messageCustom('Panggil Antrian Laboratrium Gagal Dilakukan', 'Error');
            },
        });
    }
    
    function getPanggilAntrean(id) {
        getMonitorAntrianLaboratorium();
        let idTrans = "<?= $this->session->userdata("id_translucent") ?>";
        $.ajax({
            url: '<?= base_url('antrian_lab/api/antrian_lab/panggil_antrian') ?>',
            type: 'GET',
            data: 'trans=' + idTrans +'&id='+id,
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
                                $("#audio").append('<audio class="audio" type="hidden" controls autoplay><source src="<?=resource_url()?>audio_lab/nourut.wav" type="audio/wav"></audio>');
                                const audio = document.querySelector("audio");
                                audio.playbackRate = 1;
                        }, totalwaktu);
                        totalwaktu=totalwaktu+1700;

                        setTimeout(function() {
                                $("#audio").empty();
                                $("#audio").append('<audio class="audio" type="hidden" controls autoplay><source src="<?=resource_url()?>audio_lab/'+data.metaData.huruf_audio+'.wav" type="audio/wav"></audio>');
                                const audio = document.querySelector("audio");
                                audio.playbackRate = 1;
                        }, totalwaktu);
                        totalwaktu=totalwaktu+500;

                        $.each(data.metaData.urutan_audio, function(i, v) {            
                            console.log(data.metaData.urutan_audio);                
                            setTimeout(function() {
                                $("#audio").empty();
                                $("#audio").append('<audio class="audio" type="hidden" controls autoplay><source src="<?=resource_url()?>audio_lab/'+v+'.wav" type="audio/wav"></audio>');
                                const audio = document.querySelector("audio");
                                audio.playbackRate = 1;
                            }, totalwaktu);
                            totalwaktu=totalwaktu+900;                            
                        })

                        ruang_panggil = '';
                        if(data.metaData.ruang=='Admin'){
                            ruang_panggil = 'loket';
                        } else if(data.metaData.ruang=='Sampling'){
                            ruang_panggil = 'sampling';
                        } 

                        setTimeout(function() {
                            $("#audio").empty(); 
                            $("#audio").append('<audio class="audio" type="hidden" controls autoplay><source src="<?=resource_url()?>audio_lab/'+ruang_panggil+'.wav" type="audio/wav"></audio>');
                            const audio = document.querySelector("audio");
                                audio.playbackRate = 1;
                            }, totalwaktu);
                        totalwaktu=totalwaktu+1500;                        
						
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

    
</script>
