<script type="text/javascript">
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()

        $('.form-control').keyup(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this)
            }
        })

        $('.toggle-password').click(function() {
            $(this).toggleClass('fa-eye fa-eye-slash')
            var input = $($(this).attr('toggle'))
            if (input.attr('type') == 'password') {
                input.attr('type', 'text')
            } else {
                input.attr('type', 'password')
            }
        })

        let wrapper = document.querySelector('#wrapper')
        const starback = new Starback("#canvas", {
            width: wrapper.clientWidth,
            height: wrapper.clientHeight,
            type: 'dot',
            quantity: 100,
            starSize: [1,5],
            direction: 20,
            starColor: '#d3d6eb',
            randomOpacity: [0.7, 1],
            backgroundColor: 'transparent'
        })
    })

    function checkShift() {
        var shiftNow = $('#shift').val()
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url('auth/checkshift/') ?>' + shiftNow,
            dataType: 'JSON',
            beforeSend: function() {
                // showLoader()
            },
            success: function(data) {
                var message = data.message;
                if (data.status === false) {
                    bootbox.dialog({
                        message: message,
                        title: "Informasi",
                        buttons: {
                            batal: {
                                label: '<i class="fas fa-sync mr-2"></i>Sesuaikan dengan shift sekarang',
                                className: "btn-secondary",
                                callback: function() {
                                    $('#shift').val(data.shift)
                                }
                            },
                            hapus: {
                                label: '<i class="fas fa-paper-plane mr-2"></i>Lanjutkan',
                                className: "btn-info",
                                callback: function() {
                                    login()
                                }
                            }
                        }
                    })
                } else {
                    login()
                }
            },
            complete: function() {
                hideLoader()
            }
        })
    }

    function login() {
        let stop = false;

        if ($('#account').val() === '') {
            syams_validation('#account', 'Username tidak boleh kosong')
            stop = true;
        }

        if ($('#key').val() === '') {
            syams_validation('#key', 'Password tidak boleh kosong')
            stop = true;
        }

        if (stop) {
            return false;
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url('auth/translucent') ?>',
            data: $('#loginform').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                // showLoader()
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token)
                if (data.status === false) {
                    alertLogin(data.message, 'Error')
                    $('#key').val('')
                } else if (data.status === true) {
                    alertLogin(data.message, 'Success')
                    location.reload()
                    localStorage.setItem("sm_menu", '')
                    localStorage.setItem("sm_nama_menu", '')
                    localStorage.setItem("sm_modul", '')
                }

                if (data.error) {
                    alertLogin(data.error, 'Error')
                }
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                alertLogin(e.status, 'Error')
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
</script>