<style>
	#parent {
		height: 200px;
		overflow-y: auto;
    }
</style>

<script>
    $(function() {
        getListJadwalDokter(1);
        
        $('#time-start-tambah, #time-start-detail').timepicker({
            timeFormat: 'HH:mm',
            interval: 5, 
            minTime: '07:30',
            maxTime: '14:00',
            startTime: '07:30',
            dynamic: false,
            dropdown: true,
            scrollbar: true,
            showSecond: false,
            showMeridian: false,
            disableTimeRanges: [
                ['00:00', '07:29'],
                ['14:01', '23:59'] 
            ],
        });
        
        $('#time-end-tambah, #time-end-detail').timepicker({
            timeFormat: 'HH:mm',
            interval: 5, // Set interval pilihan waktu (5 menit)
            minTime: '16:00',
            maxTime: '20:00',
            startTime: '16:00',
            dynamic: false,
            dropdown: true,
            scrollbar: true,
            showSecond: false,
            showMeridian: false
        });

        $('#bt_tambah_jadwal_dokter').click(function() {
            let accountGroup = "<?= $this->session->userdata('account_group') ?>";
            let idTranslucent = "<?= $this->session->userdata('id_translucent') ?>";
            if((accountGroup === 'Admin') || (accountGroup === 'Admin Pelayanan Medik') || (accountGroup === 'Koordinator Radiologi') 
				|| (accountGroup === 'Koordinator Laboratorium') || (accountGroup === 'Koordinator Rehabilitasi Medik')  
			    || (idTranslucent === '1854') || (idTranslucent === '1025')  || (idTranslucent === '1701') ){
				// 1701 Djuwita Apriani
                resetTambah();
                getListJadwalDokter(1);
                $('#poli-id').hide();
                $('#poli-bpjs').hide();
                $('#dokter-id').hide();
                $('#dokter-bpjs').hide();

                $('#modal-tambah-jadwal-dokter-label').html('Tambah Jadwal Dokter');
                $('#modal_tambah_jadwal_dokter').modal('show');
            } else {     
				messageCustom('Hubungi Admin Pelayanan Medik atau Administrator untuk penambahan Jadwal Dokter !!', 'Info');           
            }

        });

        $('#bt_lihat_kunjungan_dokter').click(function() {
            let accountGroup  = "<?= $this->session->userdata('account_group') ?>";
            let idTranslucent = "<?= $this->session->userdata('id_translucent') ?>";
            //1694 Nurseha - 1701 Djuwita Apriani - 2014 Monitor Jadwal IT
            if((accountGroup === 'Admin') || (idTranslucent === '1701') || (idTranslucent === '2014') ){
                getListJmlKunjDoker(null);
                $('#modal_kunjungan_dokter_label').html('Tambah Jadwal Dokter');
                $('#modal_kunjungan_dokter').modal('show');
            } else {     
				messageCustom('Hubungi Administrator untuk melihat Jumlah Kunjungan Dokter !', 'Info');           
            }

        });

        $('#bt_reload_data').click(function() {
            resetAll();
            getListJadwalDokter(1);
        });

        $('.form-control').keyup(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        $('#layanan').change(function() {
            getListJadwalDokter(1);
        });

        $('#pencarian_jadwal_dokter').change(function() {
            getListJadwalDokter(1);
        });

        $('#tanggal-awal').change(function() {
            getListJadwalDokter(1);
        });

        $('#tanggal-akhir').change(function() {
            getListJadwalDokter(1);
        });

        $('#shift-poli').change(function() {
            getListJadwalDokter(1);
        });

        $('.form-control').change(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        $('.select2-input').change(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        // datepicker search tanggal
        $('#tanggal-awal, #tanggal-akhir, #tanggal-tambah').datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function() {
            $(this).datepicker('hide');
        });

        $('#tanggal-jml-kunj').datepicker({
            format: 'yyyy-mm-dd'
        }).on('changeDate', function() {
            $(this).datepicker('hide');
        });

        $('#tanggal-jml-kunj, #shift-poli-kunj').change(function() {
            getListJmlKunjDoker(null);
        });

        let id_poli_sementara = '';
        let id_poli_sementara_tambah = '';
        $('#unitkerja, #unitkerja-tambah').change(function() {
            if ($(this).is(':checked') === false) {
                id_poli_sementara        = $('#id-poli-detail').val();
                id_poli_sementara_tambah = $('#id-poli-tambah').val();
                $('#id-poli-detail').val('');
                $('#id-poli-tambah').val('');
            } else {
                $('#id-poli-detail').val(id_poli_sementara);
                $('#id-poli-tambah').val(id_poli_sementara_tambah);
            }
        });

        $('#shift-poli-tambah').change(function() {
            if($('#shift-poli-tambah').val() == 'Pagi'){
                $('#time-start-tambah').val('07:30');
                $('#time-end-tambah').val('14:00');
            } else if($('#shift-poli-tambah').val() == 'Sore'){
                $('#time-start-tambah').val('16:00');
                $('#time-end-tambah').val('20:00');
            } else {
                $('#time-start-tambah').val('');
                $('#time-end-tambah').val('');
            }
        });
        
    });

    function convertToMinutes(time) {
        var parts = time.split(':');
        return parseInt(parts[0]) * 60 + parseInt(parts[1]);
    }

    function resetAll() {
        $(' #id, #pencarian_jadwal_dokter, #dokter-jadwal').val('');
        $('a .select2-chosen').html('Silahkan pilih Dokter');
        syams_validation_remove('.form-control, .select2-input');
        $('#id-detail').val('');
        $('#id-poli-detail').val('');
        $('#kode-tanggal-detail').val('');
        $('#kode-poli-detail').val('');
        $('#shift-poli-detail').val('');   
        resetEdit();
        resetTambah();
    }

    function resetEdit() {       
        syams_validation_remove('.form-control, .select2-input');
        $('#unitkerja').prop("checked", true);   
        $('#s2id_dokter-jadwal a .select2-chosen').empty();
        $('#nama-dokter').val('');
        $('#kode-dokter').val('');
        $('#bpjs-dokter').val('');
    }

    function resetTambah() {       
        $('#unitkerja-tambah').prop("checked", true);   
        $('#table-tambah-jadwal-dokter tbody').empty();
        $('#s2id_poli-tambah a .select2-chosen').empty();
        $('#s2id_dokter-tambah a .select2-chosen').empty();
        $('#tanggal-tambah').val('');
        $('#nama-dokter-tambah').val('');
        $('#kode-dokter-tambah').val('');
        $('#bpjs-dokter-tambah').val('');
        $('#nama-poli-tambah').val('');
        $('#kode-poli-tambah').val('');
        $('#bpjs-poli-tambah').val('');     
        $('#kuota').val('');     

        $('#shift-poli-tambah').val('Pagi');        
        $('#time-start-tambah').val('07:30');        
        $('#time-end-tambah').val('14:00');        
    }

    function getListJadwalDokter(p) {
        
		let accountGroup = "<?= $this->session->userdata('account_group') ?>";
		let idTranslucent = "<?= $this->session->userdata('id_translucent') ?>";
        $.ajax({
            type: 'GET',
            url: '<?= base_url('jadwal_dokter/api/jadwal_dokter/get_list_jadwal_dokter/page/') ?>' + p,
            data: 'keyword=' + $('#pencarian_jadwal_dokter').val() + '&layanan=' + $('#layanan').val() + 
                  '&tanggal_awal=' + $('#tanggal-awal').val() + '&tanggal_akhir=' + $('#tanggal-akhir').val() + '&shift_poli=' + $('#shift-poli').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListJadwalDokter(p - 1);
                    return false;
                }

                $('#jadwal_dokter_pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#jadwal_dokter_summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table_jadwal_dokter tbody').empty();

                let html = '';
                $.each(data.data, function(i, v) {
                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    let status = '';
                    let background = '';
                    if (v.status == 0) {
                        status = '<span class="label label-danger">Not Active</span>';
                        background = 'style="background-color:red;"';
                    } else {
                        status = '<span class="label label-success">Active</span>';
                        background = '';
                    }

					let background_kuota = '';
                        background_kuota = 'style="background-color:#ff9eb5;"';
                    if (v.kuota-v.jml_kunjung < 0 && v.kuota!=null) {
                        background_kuota = 'style="background-color:#c1121f; color: white;"';
                    } else if (v.kuota-v.jml_kunjung == 0 && v.kuota!=null) {
                        background_kuota = 'style="background-color:#ff9eb5;"';
                    } else if (v.kuota-v.jml_kunjung <= 5 && v.kuota!=null) {
                        background_kuota = 'style="background-color:#FDCFB3;"';
                    } else {
                        background_kuota = '';
                    }
					
					let unitkerja = '';
					if(v.poli!==v.unit_kerja && v.unit_kerja!== null){
						unitkerja = "<font color='#ff0000'><br><b>(Unit Kerja: "+v.unit_kerja+")</b>";
					} else if(v.unit_kerja === null){
						unitkerja = "<font color='#ff0000'><br><b>(Unit Kerja: <i>kosong</i>)</b>";
					} else {
						unitkerja = '';
					}
					
					let log_status= '';
                    if(v.logs=='1'){
                        log_status='style="color:#E46A76"';
					} else {
                        log_status='';
					}                    
                    
                    let btnExpand = '';
                    if(v.history.length >= '2'){
                        btnExpand = '<a type="button" data-toggle="collapse" href="#show' + v.id + '" class="btn btn-info btn-xs" aria-expanded="false" id="btn-expand-form-all' + v.id + '" style="margin-right: 5px;"><i id="expand-icon' + v.id + '" class="fas fa-fw fa-expand mr-1"></i>Expand All </a>';
                    } else {
                        btnExpand = '';
                    }
					
                    let shift_poli = '';
                    if((v.shift_poli !== null) && (v.id !== null)){
                        shift_poli = v.shift_poli == 'Pagi' ?  
                            '<span class="label label-success" style="font-size: small;">Pagi ' + v.time_start + ' - ' + v.time_end+'</span>' 
                            :'<span class="label label-primary" style="font-size: small;">Sore ' + v.time_start + ' - ' + v.time_end+'</span>';
                    } else if((v.shift_poli == null) && (v.id !== null)){
                        shift_poli = "<font color='#ff0000'><b><i>kosong</i></b>";
                    } else {
                        shift_poli = "-";
                    }

                    optionButton ='';
					if(v.dokter !== null){
                        btnEdit    = '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="editJadwalDokter(\'' + v.id + '\',\'' + v.tanggal+ '\',\'' + v.id_poli+ '\',\'' + v.poli+ '\',\'' + v.id_dokter+ '\',\'' + v.dokter+ '\',\'' + v.kode_bpjs_dokter+ '\',\'' + v.shift_poli+ '\',\'' + v.time_start+ '\',\'' + v.time_end+ '\',\'' + v.kuota+ '\',\'' + v.jml_kunjung+ '\',\'' + v.created_user+ '\',\'' + v.created_date + '\','+ data.page + ')" title="Klik untuk EDIT jadwal dokter"><i class="fas fa-edit"></i></button> ';
                        btnDelete  = '<button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="deleteJadwalDokter(\'' + v.id + '\',\'' + v.jml_kunjung + '\', ' + data.page + ')" title="Klik untuk HAPUS jadwal dokter"><i class="fas fa-trash"></i></button> ';
                        btnHistory = '<button type="button" class="btn btn-secondary btn-xs" onclick="historyEdit(\'' + v.id + '\',\'' + v.tanggal+ '\',\'' + v.poli + '\',\'' + v.dokter + '\',\'' + v.shift_poli + '\',\'' + v.time_start + '\',\'' + v.time_end + '\',\'' + v.kuota+ '\',\'' + v.created_user+ '\',\'' + v.created_date + '\')" title="Klik untuk HISTORY EDIT jadwal dokter"><i class="fas fa-eye mr-1"  ' +log_status+ '></i></button>';
												
						// 1701 Djuwita Apriani - 1854 dr Puja Ratnasari Putri - 1025 SAEPUL HADI
						if((accountGroup === 'Admin') || (accountGroup === 'Admin Pelayanan Medik') || (accountGroup === 'Koordinator Radiologi') || 
                            (accountGroup === 'Koordinator Laboratorium') || (accountGroup === 'Koordinator Rehabilitasi Medik') || (idTranslucent === '1701') || 
                            (idTranslucent === '1854') || ((idTranslucent === '1025') && (v.poli === 'Hemodialisa')) ){
							   
                            optionButton = btnEdit + btnDelete + btnHistory;
                        }
					}
					
                    $(document).ready(function() {
							$('#btn-expand-form-all' + v.id).click(function() {
								const isExpanded = $(this).attr('aria-expanded') === 'true';
								$('#expand-icon' + v.id).toggleClass('active', isExpanded);
								$(this).html(`<i class="fas fa-fw ${isExpanded ? 'fa-expand' : 'fa-compress'} mr-1"></i>${isExpanded ? 'Expand All' : 'Collapse All'}`);
								$(this).toggleClass('btn-danger', !isExpanded);
								$(this).toggleClass('btn-info', isExpanded);
								history.replaceState({}, document.title, window.location.pathname);
							});
						});

                    let html = '<tr ' + background + background_kuota + '>' +
                        '<td align="center">' + no + '</td>' +
                        '<td align="center">' + v.hari + '</td>' +
						'<td align="center" class="nowrap">' + ((v.tanggal !== null) ? datefmysql(v.tanggal) : '') + '</td>' +
                        '<td align="left">' + v.poli + '</td>' +
                        '<td align="center">' + shift_poli + '</td>' +
                        '<td align="left">' + ((v.dokter !== null) ? v.dokter + unitkerja : '-') + '</td>' +
                        '<td align="center"><b>' + ((v.kuota !== null) ? v.kuota : '-') + '</b></td>' +
                        '<td align="center"><b>' + ((v.jml_kunjung !== null) ? v.jml_kunjung : '-') + '</b></td>' +
						'<td align="center"><b>' + ((v.kuota !== null) ? (v.kuota-v.jml_kunjung) : '-') + '</b></td>' +
						'<td align="center"><b>' + ((v.ab_booking !== null) ? (v.ab_booking) : '-') + '</b></td>' +
						'<td align="center"><b>' + ((v.ab_checkin !== null) ? (v.ab_checkin) : '-') + '</b></td>' +
                        '<td align="right">' +
                            (v.history.length >= 1 ? btnExpand : '')+optionButton+
                        '</td>' ;

                        html2 = `
							<tr id="show${v.id}" class="collapse">
								<td style="background-color: white;" colspan="5"></td>
								<td style="background-color: #b4d8e9; font-weight: bold;" colspan="4" class="left">DOKTER</td>
								<td style="background-color: #b4d8e9; font-weight: bold;" class="center">JML BOOKING</td>
								<td style="background-color: #b4d8e9; font-weight: bold;" class="center">JML CHECK IN</td>
								<td style="background-color: white;"></td>
							</tr> `;

                        $.each(v.history, function(key, value) {
                        html2 += `
							<tr id="show${v.id}" class="collapse">
								<td style="background-color: white;" colspan="5"></td>
								<td style="background-color: #d8eef9;" colspan="4" class="left">${value.nama}</td>
								<td style="background-color: #d8eef9;" class="center">${value.jumlah_booking}</td>
								<td style="background-color: #d8eef9;" class="center">${value.jumlah_chickin}</td>
								<td style="background-color: white;"></td>
							</tr> `;
                        });
                       


                    $('#table_jadwal_dokter tbody').append(html+html2+'</tr>');
                });

                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
                hideLoader();
            }
        });
    }

    function hitumJumlahTabel(number) {
        return Math.ceil(number / 3);
    }

    function getListJmlKunjDoker(response = null) {
		let idTranslucent = "<?= $this->session->userdata('id_translucent') ?>";
        $.ajax({
            type: 'POST',
            url: '<?= base_url('jadwal_dokter/api/jadwal_dokter/list_kunjungan_dokter') ?>'+'/tanggal/'+$('#tanggal-jml-kunj').val()+'/shift_poli/'+$('#shift-poli-kunj').val(),
            data: {response},
            cache: false,
            dataType: 'JSON',
            // beforeSend: function() {
            //     showLoader();            
            // },
            success: function(data) {
                
                $('#table-kunjungan-dokter1 tbody').empty();
                $('#table-kunjungan-dokter2 tbody').empty();
                $('#table-kunjungan-dokter3 tbody').empty();

                let html = '';
                let tanggal = $('#tanggal-jml-kunj').val();
                let shift_poli = $('#shift-poli-kunj').val();

                $('#title-notif').html('');
                let jmlData = data.data.length;
                let jmlTbl1 = hitumJumlahTabel(jmlData)-1;
                let jmlTbl2 = (jmlTbl1 * 2)+1;

                console.log(jmlData);
                if( jmlData >= 1 ){
                    $.each(data.data, function(i, v) {
                            if (parseInt(v.kuota) == parseInt(v.jadwal_jml)) {
                                font_color = 'style="color:blue"';
                            } else if (parseInt(v.kuota) < parseInt(v.jadwal_jml)) {
                                font_color = 'style="color:red"';
                            } else { 
                                font_color = 'style="color:black"';
                            } 
                            
                        if(i<=jmlTbl1){
                            let no = ((i + 1));
                            let background_kuota = '';
                            
                            if (v.jadwal_jml != v.real_kunjungan) {
                                background_kuota = 'style="background-color:#ff9eb5;"';
                            } else { 
                                background_kuota = '';
                            } 				
                            let html = '<tr '+background_kuota+'>' +
                                '<td align="center">' + no + '</td>' +
                                '<td align="left">' + v.tanggal + '</td>' +
                                '<td align="left" '+font_color+'>' + v.nama_poli + '</td>' +
                                '<td align="left" '+font_color+'>' + v.shift_poli + '</td>' +
                                '<td align="left" '+font_color+'>' + v.nama_dokter + '</td>' +
                                '<td align="center" '+font_color+'>' + v.kuota + '</td>' +
                                '<td align="center">' + v.jadwal_jml + '</td>' +
                                '<td align="center">' + v.real_kunjungan + '</td>' +
                                '</tr>';
                            $('#table-kunjungan-dokter1 tbody').append(html);
                        } else if(i<=jmlTbl2){
                            let no = ((i + 1));
                            let background_kuota = '';
                            if (v.jadwal_jml != v.real_kunjungan) {
                                background_kuota = 'style="background-color:#ff9eb5;"';  
                            } else { 
                                background_kuota = '';
                            } 				
                            let html = '<tr '+background_kuota+'>' +
                                '<td align="center">' + no + '</td>' +
                                '<td align="left">' + v.tanggal + '</td>' +
                                '<td align="left" '+font_color+'>' + v.nama_poli + '</td>' +
                                '<td align="left" '+font_color+'>' + v.shift_poli + '</td>' +
                                '<td align="left" '+font_color+'>' + v.nama_dokter + '</td>' +
                                '<td align="center" '+font_color+'>' + v.kuota + '</td>' +
                                '<td align="center">' + v.jadwal_jml + '</td>' +
                                '<td align="center">' + v.real_kunjungan + '</td>' +
                                '</tr>';
                            $('#table-kunjungan-dokter2 tbody').append(html);
                        } else {
                            let no = ((i + 1));
                            let background_kuota = '';
                            if (v.jadwal_jml != v.real_kunjungan) {
                                background_kuota = 'style="background-color:#ff9eb5;"';
                            } else { 
                                background_kuota = '';
                            } 				
                            let html = '<tr '+background_kuota+'>' +
                                '<td align="center">' + no + '</td>' +
                                '<td align="left">' + v.tanggal + '</td>' +
                                '<td align="left" '+font_color+'>' + v.nama_poli + '</td>' +
                                '<td align="left" '+font_color+'>' + v.shift_poli + '</td>' +
                                '<td align="left" '+font_color+'>' + v.nama_dokter + '</td>' +
                                '<td align="center" '+font_color+'>' + v.kuota + '</td>' +
                                '<td align="center">' + v.jadwal_jml + '</td>' +
                                '<td align="center">' + v.real_kunjungan + '</td>' +
                                '</tr>';
                            $('#table-kunjungan-dokter3 tbody').append(html);   
                        }
                    });
                
                    // 1460=Putri - 1461=Lina - 2014=Monitor Jadwal IT
                    if((idTranslucent == '1460') || (idTranslucent == '1461') || (idTranslucent == '2014')){
                        updateJmlKunjDokter(tanggal,shift_poli)
                    }

                    hideLoader();
                    getListJmlKunjDoker(data);
                } else {
                    $('#title-notif').html('Jadwal Dokter tidak ditemukan !');
                    $('#table-kunjungan-dokter1 tbody').empty();
                    $('#table-kunjungan-dokter2 tbody').empty();
                    $('#table-kunjungan-dokter3 tbody').empty();    
                }
               
            },
            error: function(e) {
                accessFailed(e.status);
                hideLoader();
            }
        });
    }

    function konfirmasiUpdateJmlKunjDokter() {
        
        if ($('#tanggal-jml-kunj').val() === '') {
            syams_validation('#tanggal-jml-kunj', 'Tanggal harus dipilih !');
			return false;
        }

        bootbox.dialog({
            message: "Apakah anda yakin akan mengupdate Jumlah Kunjungan Dokter Tanggal "+$('#tanggal-jml-kunj').val()+" ?",
            title: "Update Jumlah Kunjungan Dokter",
            buttons: {
                batal: {
                    label: '<i class="fas fa-window-close m-r-5"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                masuk: {
                    label: '<i class="fas fa-check-circle m-r-5"></i>Ya, Update',
                    className: "btn-info",
                    callback: function() {
                        updateJmlKunjDokter($('#tanggal-jml-kunj').val(),$('#shift-poli-kunj').val());
                    }
                }
            }
        }); 
    }

    function updateJmlKunjDokter(tanggal,shift_poli) {
        $.ajax({
            type: 'POST',           
            url: '<?= base_url('jadwal_dokter/api/jadwal_dokter/edit_jml_kunjungan_dokter') ?>',
            data: {tanggal: tanggal, shift_poli:shift_poli},
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                
                $('input[name=csrf_syam]').val(data.token);
                $('#modal_edit_jadwal_dokter').modal('hide');
                
                $('#tanggal').val();
                messageEditSuccess();

                
                // getListJmlKunjDoker(null);
                
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }


    function editJadwalDokter(id,tanggal,id_poli,poli,id_dokter,dokter,kode_bpjs_dokter,shift_poli,time_start,time_end,kuota,kuota_terpakai,created_user,created_date, p) {
        resetEdit();
        id_poli_sementara = id_poli;
        $('#id-detail').val(id);
        $('#tanggal-detail').html(tanggal);
        $('#kode-tanggal-detail').val(tanggal);
        $('#id-poli-detail').val(id_poli);
        $('#kode-poli-detail').val(id_poli);      
        $('#shift-poli-detail').val(shift_poli);         

        $('#poli-detail').html(poli + ' <b>('+shift_poli+')</b>');
        $('#shift-poli-detail').html(shift_poli);        
        $('#dokter-detail').html(dokter);        
        $('#kuota-now').html(kuota);
        $('#kuota-terpakai').html(kuota_terpakai);
        $('#user-detail').html(created_user+' ('+created_date+')' );
    
        $('#kuota-dokter').val(kuota);
        $('#s2id_dokter-jadwal a .select2-chosen').html(dokter)
        $('#dokter-jadwal').val(id_dokter);
        $('#nama-dokter').val(dokter);
        $('#kode-dokter').val(id_dokter);
        $('#bpjs-dokter').val(kode_bpjs_dokter);
        
        $('#shift-poli-nama').val(shift_poli);
        $('#time-start-detail').val(time_start);
        $('#time-end-detail').val(time_end);

        $('#page_now_jadwal_dokter').val(p);
        $('#modal_edit_jadwal_dokter').modal('show');
        $('#modal_edit_jadwal_dokter_label').html('Form Edit Jadwal Dokter');
        
    }
    
    function historyEdit(id,tgl,poli,dokter,shift_poli,time_start,time_end,kuota,created_user,created_date) {
        $('#tgl-history').html(tgl);
        $('#poli-history').html(poli + ' ( Kuota: '+kuota+' )' );
        $('#dokter-history').html(dokter+ ' ( ' + shift_poli + ' ' + time_start + ' - ' + time_end + ' )' );
        $('#user-history').html(created_user+' ( '+created_date+ ' )' );
        $('#table_history_jadwal_dokter tbody').empty();
        
		$.ajax({
			type: 'GET',
			url: '<?= base_url('jadwal_dokter/api/jadwal_dokter/get_history_jadwal_dokter') ?>/' + id,
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				$.each(data.data, function(i, v) {
                    let shift_poli = '';
                    if((v.shift_poli !== null) && (v.id !== null)){
                        shift_poli = v.shift_poli == 'Pagi' ?  
                            '<span class="label label-success" style="font-size: small;">Pagi ' + v.time_start + ' - ' + v.time_end+'</span>' 
                            :'<span class="label label-primary" style="font-size: small;">Sore ' + v.time_start + ' - ' + v.time_end+'</span>';
                    } else if((v.shift_poli == null) && (v.id !== null)){
                        shift_poli = "<font color='#ff0000'><b><i>kosong</i></b>";
                    } else {
                        shift_poli = "-";
                    }

					var html = /* html */ 
                        '<tr>' +
                            '<th class="center">' + ++i + '</th>' +
                            '<th class="left">' + v.nama_dokter + '</th>' +
                            '<th class="left">' + shift_poli+ '</th>' +
                            '<th class="center">' + v.kuota + '</th>' +
                            '<th class="center">' + ((v.created_user !== null)     ? v.created_user : '-')             + '</th>' +
                            '<th class="center">' + ((v.created_date !== null)     ? v.created_date : '-')     + '</th>' +
                            '<th class="center">' + ((v.user_log !== null)         ? v.user_log : '-')         + '</th>' +
                            '<th class="center">' + ((v.created_date_log !== null) ? v.created_date_log : '-') + '</th>' +
						'</tr>'
					;
					$('#table_history_jadwal_dokter tbody').append(html);
				})

                $('#modal_history_jadwal_dokter').modal('show');
                $('#modal_history_jadwal_dokter_label').html('Form History Jadwal Dokter');
			},
			error: function(e) {
				accessFailed('Terjadi Kesalahan | Gagal mengambil data');
			}
		});
    }

    function deleteJadwalDokter(id,jml_kunjung, p) {
		if(jml_kunjung > '0'){
            messageCustom('Jadwal tidak bisa dihapus, jumlah kuota terpakai '+jml_kunjung+' pasien.', 'Error');
        } else { 
			bootbox.dialog({
				title: "Konfirmasi Hapus",
				message: "Apakah anda yakin ingin menghapus data ini ?",
				buttons: {
					cancel: {
						label: '<i class="fas fa-window-close"></i> Batal',
						className: 'btn-secondary'
					},
					confirm: {
						label: '<i class="fas fa-check"></i> Hapus',
						className: 'btn-danger',
						callback: function() {
							$.ajax({
								type: 'DELETE',
								url: '<?= base_url('jadwal_dokter/api/jadwal_dokter/delete_jadwal_dokter') ?>/id/' + id,
								cache: false,
								dataType: 'JSON',
								success: function(data) {
									messageDeleteSuccess();
									getListJadwalDokter(p);
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
    }

    function paging(p) {
        getListJadwalDokter(p);
    }

    $('#dokter-jadwal').select2({ 
        ajax: {            
            url: "<?= base_url('jadwal_dokter/api/jadwal_dokter/get_dokter_spesialisasi') ?>",
            dataType: 'json',
            quietMillis: 100,
            data: function(term, page) { 
                return {
                    q: term, 
                    id_dokter : $('#id-poli-detail').val(),
                    page: page, 
                };
            },
            results: function(data, page) {
                var more = (page * 20) < data.total;
                return {
                    results: data.data,
                    more: more
                };
            }
        },
        formatResult: function(data) {
            var markup = '<b>' + data.nama + '</b>'+' - '+'<i>' + data.spesialisasi + '</i>';
            return markup;
        },
        formatSelection: function(data) {
            $('#nama-dokter').val(data.nama);
            $('#kode-dokter').val(data.id);
            $('#bpjs-dokter').val(data.kode_bpjs);
            return data.nama;
        }
    });

    $('#dokter-tambah').select2({ 
        ajax: {            
            url: "<?= base_url('jadwal_dokter/api/jadwal_dokter/get_dokter_spesialisasi') ?>",
            dataType: 'json',
            quietMillis: 100,
            data: function(term, page) { 
                return {
                    q: term, 
                    id_dokter : $('#id-poli-tambah').val(),
                    page: page, 
                };
            },
            results: function(data, page) {
                var more = (page * 20) < data.total;
                return {
                    results: data.data,
                    more: more
                };
            }
        },
        formatResult: function(data) {
            var markup = '<b>' + data.nama + '</b>'+' - '+'<i>' + data.spesialisasi + '</i>';
            return markup;
        },
        formatSelection: function(data) {
            $('#nama-dokter-tambah').val(data.nama);
            $('#kode-dokter-tambah').val(data.id);
            $('#bpjs-dokter-tambah').val(data.kode_bpjs);

            return data.nama;
        }
    });

    $('#poli-tambah').select2({ 
        ajax: {            
            url: "<?= base_url('jadwal_dokter/api/jadwal_dokter/get_poli') ?>",
            dataType: 'json',
            quietMillis: 100,
            data: function(term, page) { 
                return {
                    q: term, 
                    page: page, 
                };
            },
            results: function(data, page) {
                var more = (page * 20) < data.total;
                return {
                    results: data.data,
                    more: more
                };
            }
        },
        formatResult: function(data) {
            var markup = '<b>' + data.nama + '</b>';
            return markup;
        },
        formatSelection: function(data) {
            $('#nama-poli-tambah').val(data.nama);
            $('#kode-poli-tambah').val(data.id);
            $('#bpjs-poli-tambah').val(data.kode_bpjs);
            $('#id-poli-tambah').val(data.id);

            if(data.id==='12' || data.id==='27' || data.id==='31' || data.id==='32'  ){ //Bedah Mulut , Orthodonti , Penyakit Mulut , Periodonti
                $('#kuota').val('35');  
            } else if(data.id==='22' || data.id==='23'){ //Kedokteran Gigi Anak, Konservasi Gigi
                $('#kuota').val('25');  
			} else if(data.id==='34'){ //Rehab Medik
                $('#kuota').val('200'); 
            } else {
                $('#kuota').val('60');  
            }

            return data.nama;
        }
    });

    function konfirmasiEditJadwalDokter() {
        
		if (parseInt($('#kuota-dokter').val()) < parseInt($('#kuota-terpakai').html()) ) {
            syams_validation('#kuota-dokter', 'Kuota tidak boleh lebih kecil dari kuota terpakai ('+$('#kuota-terpakai').html()+' pasien) !');
			return false;
        }

        if ($('#dokter').val() === '') {
            syams_validation('#dokter', 'Dokter harus dipilih !');
			return false;
        }

        if ($('#time-start-detail').val() === '') {
            syams_validation('#time-start-detail', 'Waktu Mulai harus dipilih !');
			return false;
        }

        if ($('#time-end-detail').val() === '') {
            syams_validation('#time-end-detail', 'Waktu Selesai harus dipilih !');
			return false;
        }

        bootbox.dialog({
            message: "Apakah anda akan mengedit jdwal dokter ?",
            title: "Edit Jadwal Dokter",
            buttons: {
                batal: {
                    label: '<i class="fas fa-window-close m-r-5"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                masuk: {
                    label: '<i class="fas fa-check-circle m-r-5"></i>Simpan',
                    className: "btn-info",
                    callback: function() {
                        simpanEditJadwalDokter();
                    }
                }
            }
        }); 
    }
    
    function simpanEditJadwalDokter() {
        let id = $('#id-detail').val();

        $.ajax({
            type: 'POST',
            url: '<?= base_url("jadwal_dokter/api/jadwal_dokter/edit_jadwal_dokter") ?>/' + id,
            data: $('#form_edit_jadwal_dokter').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                
                $('input[name=csrf_syam]').val(data.token);
                $('#modal_edit_jadwal_dokter').modal('hide');
                
                $('#tanggal').val();

                if(data.status){
                    messageEditSuccess();
                } else {
                    swalCustom('warning', 'Gagal Ubah Jadwal Dokter', 'Dokter tujuan anda, sudah memiliki jadwal di hari dan poli yang sama.');
                }
                
                getListJadwalDokter(1);
                
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    function set_validation_tambah(){
        var stop = false;

        if ($('#tanggal-tambah').val() === '') {
            syams_validation('#tanggal-tambah', 'Tanggal harus diisi!');
            stop = true;   
        };

        if ($('#poli-tambah').val() === '') {
            syams_validation('#poli-tambah', 'Poliklinik harus diisi!');
            stop = true; 
        };

        if ($('#dokter-tambah').val() === '') {
            syams_validation('#dokter-tambah', 'Dokter harus diisi!');
            stop = true;   
        };

        if ($('#shift-poli-tambah').val() === '') {
            syams_validation('#shift-poli-tambah', 'Shift Poli harus diisi!');
            stop = true; 
        };

        if ($('#time-start-tambah').val() === '') {
            syams_validation('#time-start-tambah', 'Waktu Mulai harus diisi!');
            stop = true; 
        };

        if ($('#time-end-tambah').val() === '') {
            syams_validation('#time-end-tambah', 'Waktu Selesai harus diisi!');
            stop = true; 
        };        

        if ($('#kuota').val() === '') {
            syams_validation('#kuota', 'Kuota harus diisi!');
            stop = true; 
        };

        waktu_mulai = convertToMinutes($('#time-start-tambah').val());
        waktu_selesai = convertToMinutes($('#time-end-tambah').val());

        if($('#shift-poli-tambah').val() == 'Pagi'){
            if (( waktu_mulai  < convertToMinutes('07:30') ) || ( waktu_mulai > convertToMinutes('14:00') )) {
                syams_validation('#time-start-tambah', 'Waktu poli PAGI antara 07:30 sd 14:00 !');
                stop = true; 
            }

            if (( waktu_selesai < convertToMinutes('07:30') ) || ( waktu_selesai > convertToMinutes('14:00') )) {
                syams_validation('#time-end-tambah', 'Waktu poli PAGI antara 07:30 sd 14:00 !');
                stop = true; 
            }

        } else {
            if (( waktu_mulai  < convertToMinutes('16:00') ) || ( waktu_mulai  > convertToMinutes('20:00') )) {
                syams_validation('#time-start-tambah', 'Waktu poli SORE antara 16:00 sd 20:00 !');
                stop = true; 
            }

            if (( waktu_selesai < convertToMinutes('16:00') ) || ( waktu_selesai > convertToMinutes('20:00') )) {
                syams_validation('#time-end-tambah', 'Waktu poli SORE antara 16:00 sd 20:00 !');
                stop = true; 
            }
        }        

        return stop;
    }

    function tambah_item_jadwal_dokter(){

        if (set_validation_tambah()) {
            return false;
        };

        var str = '';
        var numb = $('.number_jadwal_dokter').length;
     
        var tanggalTambah    = date2mysql($('#tanggal-tambah').val());//$('#tanggal-tambah').val();
        var namaDokterTambah = $('#nama-dokter-tambah').val();
        var kodeDokterTambah = $('#kode-dokter-tambah').val();
        var bpjsDokterTambah = $('#bpjs-dokter-tambah').val();
        var namaPoliTambah   = $('#nama-poli-tambah').val();
        var kodePoliTambah   = $('#kode-poli-tambah').val();
        var bpjsPoliTambah   = $('#bpjs-poli-tambah').val();
        var shiftPoliTambah  = $('#shift-poli-tambah').val();
        var timeStartTambah  = $('#time-start-tambah').val();
        var timeEndTambah    = $('#time-end-tambah').val();
        var kuotaTambah      = $('#kuota').val();

  
        str = '<tr>'+
            '<td class="number_jadwal_dokter" align="center">'+ (++numb) +'</td>'+
            '<td align="center">        <input type="hidden" name="tgl_jd[]"         value="'+tanggalTambah+'"/>'+tanggalTambah+'</td>'+
            '<td align="center">        <input type="hidden" name="nama_dokter_jd[]" value="'+namaDokterTambah+'"/>'+namaDokterTambah+'</td>'+ 
            '<td align="center" hidden> <input type="hidden" name="kode_dokter_jd[]" value="'+kodeDokterTambah+'" />'+kodeDokterTambah+'</td>'+
            '<td align="center" hidden> <input type="hidden" name="bpjs_dokter_jd[]" value="'+bpjsDokterTambah+'" />'+bpjsDokterTambah+'</td>'+
            '<td align="center">        <input type="hidden" name="nama_poli_jd[]"   value="'+namaPoliTambah+'" />'+namaPoliTambah+'</td>'+
            '<td align="center" hidden> <input type="hidden" name="kode_poli_jd[]"   value="'+kodePoliTambah+'" />'+kodePoliTambah+'</td>'+
            '<td align="center" hidden> <input type="hidden" name="bpjs_poli_jd[]"   value="'+bpjsPoliTambah+'" />'+bpjsPoliTambah+'</td>'+
            '<td align="center">        <input type="hidden" name="shift_poli_jd[]"  value="'+shiftPoliTambah+'" />'+shiftPoliTambah+'</td>'+
            '<td align="center">        <input type="hidden" name="time_start_jd[]"  value="'+timeStartTambah+'" />'+timeStartTambah+'</td>'+
            '<td align="center">        <input type="hidden" name="time_end_jd[]"    value="'+timeEndTambah+'" />'+timeEndTambah+'</td>'+
            '<td align="center">        <input type="hidden" name="kuota_jd[]"       value="'+kuotaTambah+'" />'+kuotaTambah+'</td>'+
            '<td align="center">        <button type="button" class="btn btn-secondary btn-xxs" onclick="hapus_list(this);"><i class="fas fa-trash-alt"></i></button>'+
            '</tr>';

        $('#table-tambah-jadwal-dokter tbody').append(str);
    }

    function hapus_list(el) {
        var parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
    }
    
    function konfirmasiSimpanJadwalDokter() {
        bootbox.dialog({
            message: "Anda yakin akan menyimpan jadwal dokter ?",
            title: "Simpan Pemeriksaan Poliklinik",
            buttons: {
                batal: {
                    label: '<i class="fas fa-fw fa-window-close"></i> Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                masuk: {
                    label: '<i class="fas fa-fw fa-check-circle"></i> Simpan',
                    className: "btn-info",
                    callback: function() {
                        simpan_jadwal_dokter();
                    }
                }
            }
        });
    }

    function simpan_jadwal_dokter(){
        $.ajax({
            type : 'POST',
            url: '<?= base_url("jadwal_dokter/api/jadwal_dokter/tambah_jadwal_dokter") ?>/',
            data: $('#form_tambah_jadwal_dokter').serialize(),
            cache: false,
            dataType : 'json',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status == '') {
                    tipe = 'Error';
                } else {
                    tipe = data.status;
                }
                
                messageCustom(data.message, tipe);                
                $('input[type=checkbox]').removeAttr('checked');
                $('#modal_tambah_jadwal_dokter').modal('hide');
                
                getListJadwalDokter(1);
            },
            complete: function() {
                hideLoader();
            },
            error: function(e){
                messageCustom('Gagal Simpan Jadwal Dokter '+e, 'Error');
            }
        });
        
    }

</script>