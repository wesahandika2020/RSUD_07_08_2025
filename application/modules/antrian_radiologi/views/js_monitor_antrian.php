<script>
	
    $(function() {
        getStatusPanggil();
        console.log('atas');        
    }); 

    function initMonitor(isPanggil){

        getMonitorAntrianRadiologi();

        if(isPanggil==true){
            console.log('masuk initMonitor isPanggil true='+isPanggil);
            setTimeout(() => setInterval(() => window.location.reload(), 5000), 2000);
            
        } else {
            console.log('masuk initMonitor isPanggil false='+isPanggil);
            setTimeout(() => setInterval(() => window.location.reload(), 5000));            
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

    function getMonitorAntrianRadiologi() {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('antrian_radiologi/api/antrian_radiologi/get_monitor_antrian_radiologi') ?>',
            cache: false,
            dataType: 'JSON',
            success: function(data) {          
                if(data.panggil !== null){
                    $('#ruang-panggil').html(data.panggil.nomor_antrian);
                    $('#lokasi-ruang').html(data.panggil.ruang_radiologi);
                }
                
                console.log(data);
                data.ruang1  !== null? $('#ruang1').html(data.ruang1.nomor_antrian)  : '' ;
                data.ruang2a !== null? $('#ruang2a').html(data.ruang2a.nomor_antrian): '' ;
                data.ruang2b !== null? $('#ruang2b').html(data.ruang2b.nomor_antrian): '' ;
                data.ruang3  !== null? $('#ruang3').html(data.ruang3.nomor_antrian)  : '' ;
                data.ruang4  !== null? $('#ruang4').html(data.ruang4.nomor_antrian)  : '' ;
                data.ruang5  !== null? $('#ruang5').html(data.ruang5.nomor_antrian)  : '' ;

                data.ruang1_tunda  !== null? $('#ruang1-tunda').html(data.ruang1_tunda.nomor_antrian)  : '' ;
                data.ruang2a_tunda !== null? $('#ruang2a-tunda').html(data.ruang2a_tunda.nomor_antrian): '' ;
                data.ruang2b_tunda !== null? $('#ruang2b-tunda').html(data.ruang2b_tunda.nomor_antrian): '' ;
                data.ruang3_tunda  !== null? $('#ruang3-tunda').html(data.ruang3_tunda.nomor_antrian)  : '' ;
                data.ruang4_tunda  !== null? $('#ruang4-tunda').html(data.ruang4_tunda.nomor_antrian)  : '' ;
                data.ruang5_tunda  !== null? $('#ruang5-tunda').html(data.ruang5_tunda.nomor_antrian)  : '' ;

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
            url: '<?= base_url('antrian_radiologi/api/antrian_radiologi/status_panggil') ?>',
            cache: false,
            dataType: 'JSON',
            success: function(data) {   
			
				console.log('getStatusPanggil data='+data);
                if(data != null){
                    $('#ruang-panggil').html(data.nomor_antrian);
                    $('#lokasi-ruang').html(data.ruang_radiologi);

					let idTranslucent = "<?= $this->session->userdata('id_translucent') ?>";
                    if(idTranslucent === '1959'){ // antrian_radiologi MONITOR
                        simpanAntrianPasien(data.id,data.jenis_panggil); 
                        isPanggil = true;  
                        console.log('isPanggil = true; data.id='+data.id+' --- data.jenis_panggil='+data.jenis_panggil);
                    } else {
                        isPanggil = false;  
                        getMonitorAntrianRadiologi();
                        console.log('hanya lihat id='+idTranslucent);
                    }
                } else {                  
                    isPanggil = false;  
                    console.log('isPanggil = false');
                }      
                console.log('masuk getStatusPanggil isPanggil='+isPanggil);
                initMonitor(isPanggil);
            },
            error: function(e) {
                accessFailed(e.status);
                hideLoader();
            }
        });
    }   

    function simpanAntrianPasien(id,type){
        $.ajax({
            type: 'POST',
            url: '<?= base_url("antrian_radiologi/api/antrian_radiologi/simpan_antrian_pasien") ?>',
            data: 'id=' + id + '&type=' + type,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {
                getPanggilAntrean(id);
                messageCustom('Panggil Antrian Radiologi  Berhasil Dilakukan', 'Success');
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                messageCustom('Panggil Antrian Radiologi Gagal Dilakukan', 'Error');
            },
        });
    }
    
    function getPanggilAntrean(id) {
        let idTrans = "<?= $this->session->userdata("id_translucent") ?>";
        $.ajax({
            url: '<?= base_url('antrian_radiologi/api/antrian_radiologi/panggil_antrian') ?>',
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
                        var totalwaktu = 1000;

                        setTimeout(function() {
                                $("#audio").empty();
                                $("#audio").append('<audio class="audio" type="hidden" controls autoplay><source src="<?=resource_url()?>audio2/nourut.wav" type="audio/wav"></audio>');
                                const audio = document.querySelector("audio");
                                audio.playbackRate = 1;
                        }, totalwaktu);
                        totalwaktu=totalwaktu+1400;
                        
                        $.each(data.metaData.urutan_audio, function(i, v) {                            
                            setTimeout(function() {
                                $("#audio").empty();
                                $("#audio").append('<audio class="audio" type="hidden" controls autoplay><source src="<?=resource_url()?>audio2/'+v+'.wav" type="audio/wav"></audio>');
                                const audio = document.querySelector("audio");
                                audio.playbackRate = 1;
                            }, totalwaktu);
                            totalwaktu=totalwaktu+1000;                            
                        })
                        
                        setTimeout(function() {
                            $("#audio").empty();
                            $("#audio").append('<audio class="audio" type="hidden" controls autoplay><source src="<?=resource_url()?>audio2/ruang.wav" type="audio/wav"></audio>');
                            const audio = document.querySelector("audio");
                                audio.playbackRate = 1;
                            }, totalwaktu);
                        totalwaktu=totalwaktu+1000;

                        setTimeout(function() {
                            $("#audio").empty(); 
                            $("#audio").append('<audio class="audio" type="hidden" controls autoplay><source src="<?=resource_url()?>audio2/'+data.metaData.c+'.wav" type="audio/wav"></audio>');
                            const audio = document.querySelector("audio");
                                audio.playbackRate = 1;
                            }, totalwaktu);
                        totalwaktu=totalwaktu+800;

						setTimeout(function() {
                                $("#audio").empty();
                                $("#audio").append('<audio class="audio" type="hidden" controls autoplay><source src="<?=resource_url()?>audio2/'+data.metaData.huruf_audio+'.wav" type="audio/wav"></audio>');
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

    
</script>
