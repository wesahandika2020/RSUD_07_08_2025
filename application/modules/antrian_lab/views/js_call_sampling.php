<script>
    $(function() {
        startCallSampling(); 

        $('#btn-reload').click(function() {            
            getMonitorCallSampling();
        });

        $('#btn-call').click(function()   {
            if ($('#kode-ruang').val() === '') {
                swalAlert('info', 'INFO', 'Pilih Kode, kode tidak boleh kosong !');
                return
            }            
            callLab('Sampling',$('#kode-ruang').val());
        });

        $('#btn-recall').click(function()   {
            if ($('#kode-ruang').val() === '') {
                swalAlert('info', 'INFO', 'Pilih Kode, kode tidak boleh kosong !');
                return
            }            
            reCallLab('Sampling',$('#kode-ruang').val());
        });

        $('#kode-a').on('change', function() {
            if (this.checked) {
                resetAll();
                $('#kode-ruang').val('A');
                $('#kode-a').parent().parent().attr('style','background: white');
                $('#kode-a').parent().attr('style','background: coral');
                $('#ruang-sampling-a').attr('style','background: #FB9678');
                $('#ruang-sampling-a-sisa').attr('style','background: #FB9678');
            }
        });
        
        $('#kode-b').on('change', function() {
            if (this.checked) {
                resetAll();
                $('#kode-ruang').val('B');
                $('#kode-b').parent().parent().attr('style','background: white');
                $('#kode-b').parent().attr('style','background: coral');
                $('#ruang-sampling-b').attr('style','background: #FB9678');
                $('#ruang-sampling-b-sisa').attr('style','background: #FB9678');
            }
        });

        $('#kode-c').on('change', function() {
            if (this.checked) {
                resetAll();
                $('#kode-ruang').val('C');
                $('#kode-c').parent().parent().attr('style','background: white');
                $('#kode-c').parent().attr('style','background: coral');
                $('#ruang-sampling-c').attr('style','background: #FB9678');
                $('#ruang-sampling-c-sisa').attr('style','background: #FB9678');
            }
        });

        $('#kode-d').on('change', function() {
            if (this.checked) {
                resetAll();
                $('#kode-ruang').val('D');
                $('#kode-d').parent().parent().attr('style','background: white');
                $('#kode-d').parent().attr('style','background: coral');
                $('#ruang-sampling-d').attr('style','background: #FB9678');
                $('#ruang-sampling-d-sisa').attr('style','background: #FB9678');
            }
        });

    }); 

    function startCallSampling(){
        getMonitorCallSampling();
        initCallSampling();
    }   

    function initCallSampling(){
        waktu_refresh = 10 * 1000;
        console.log('masuk initCallSampling '+waktu_refresh);        
        setTimeout(() => setInterval(() => getMonitorCallSampling(), waktu_refresh)); 
    }

    function getMonitorCallSampling() {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('antrian_lab/api/antrian_lab/get_monitor_antrian_lab') ?>',
            cache: false,
            dataType: 'JSON',
            success: function(data) {

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

    function resetAll(){
        $('#kode-a').parent().parent().attr('style','background: lightgrey');
        $('#kode-a').parent().attr('style','background: lightgrey');
        $('#kode-b').parent().parent().attr('style','background: lightgrey');
        $('#kode-b').parent().attr('style','background: lightgrey');
        $('#kode-c').parent().parent().attr('style','background: lightgrey');
        $('#kode-c').parent().attr('style','background: lightgrey');
        $('#kode-d').parent().parent().attr('style','background: lightgrey');
        $('#kode-d').parent().attr('style','background: lightgrey');

        $('#ruang-sampling-a').attr('style','background: lightgrey');
        $('#ruang-sampling-a-sisa').attr('style','background: lightgrey');
        $('#ruang-sampling-b').attr('style','background: lightgrey');
        $('#ruang-sampling-b-sisa').attr('style','background: lightgrey');
        $('#ruang-sampling-c').attr('style','background: lightgrey');
        $('#ruang-sampling-c-sisa').attr('style','background: lightgrey');
        $('#ruang-sampling-d').attr('style','background: lightgrey');
        $('#ruang-sampling-d-sisa').attr('style','background: lightgrey');
    }

    function callLab(nama_ruangan,kode_antrian){   
        $('#konfrim-nama-ruangan-sampling').val(nama_ruangan);
        $('#konfrim-kode-antrian-sampling').val(kode_antrian);
        $('#konfrim-type-sampling').val('call');
        
        $('#btn-konfirmasi-sampling').html(' Ya Panggil');
        $('#modal-konfirmasi-sampling').modal('show');
        $('#modal-konfirmasi-sampling-label').html('Konfirmasi Panggil - Sampling');    
    }

    function reCallLab(nama_ruangan,kode_antrian){     
        $('#konfrim-nama-ruangan-sampling').val(nama_ruangan);
        $('#konfrim-kode-antrian-sampling').val(kode_antrian);
        $('#konfrim-type-sampling').val('recall');
        
        $('#btn-konfirmasi-sampling').html(' Ya Panggil Ulang');
        $('#modal-konfirmasi-sampling').modal('show');
        $('#modal-konfirmasi-sampling-label').html('Konfirmasi Panggil Ulang - Sampling');
    }  

    function btnKonfirmasiSampling(type,nama_ruangan,kode_antrian){
		$('#modal-konfirmasi').modal('hide');
        type         = $('#konfrim-type-sampling').val();
        nama_ruangan = $('#konfrim-nama-ruangan-sampling').val();
        kode_antrian = $('#konfrim-kode-antrian-sampling').val();

        let user = "<?= $this->session->userdata("nama") ?>";
        if(type=='call'){
            $.ajax({
                type: 'GET',
                url: '<?= base_url('antrian_lab/api/antrian_lab/get_call_lab') ?>',
                data: 'ruang=' + nama_ruangan +'&kode_antrian='+kode_antrian +'&user='+user,
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {  
                    if(data.status === true){
                        messageCustom(data.message, 'Success');
                    } else {
                        messageCustom(data.message, 'Info');
                    }      
                },
                complete: function() {
                    hideLoader();
                },
                error: function(e) {
                    messageCustom('Terjadi Kesalahan! | Gagal Call Antrian Laboratorium')
                }
            });
        } else {
            $.ajax({
                type: 'GET',
                url: '<?= base_url('antrian_lab/api/antrian_lab/get_recall_lab') ?>',
                data: 'ruang=' + nama_ruangan +'&kode_antrian='+kode_antrian +'&user='+user,
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {  
                    if(data.status === true){
                        messageCustom(data.message, 'Success');
                    } else {
                        messageCustom(data.message, 'Info');
                    }        
                },
                complete: function() {
                    hideLoader();
                },
                error: function(e) {
                    messageCustom('Terjadi Kesalahan! | Gagal ReCall Antrian Laboratorium')
                }
            });
        }
    }

</script>
	