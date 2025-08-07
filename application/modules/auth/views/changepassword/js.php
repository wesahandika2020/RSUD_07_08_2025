<script type="text/javascript">
    $(function() {
        set_awal();

        $('#old_password').keyup(function() {
            var lama = $(this).val();
            var user = $('#id').val();

            $.ajax({
                type: 'POST',
                url: '<?= base_url("auth/check_password") ?>',
                data: 'username=' + user + '&password=' + lama,
                cache: false,
                dataType: 'json',
                success: function(data) {
                    if (data.status == true) {
                        $('#new_password').removeAttr('disabled');
                        $('#message').html(' Enter your new password');
                        $('#new_password').focus();
                    } else {
                        set_awal();
                    }
                }
            });
        });

        $('#new_password').keyup(function() {
            if ($(this).val() !== '') {
                $('#password_konf').removeAttr('disabled');
            } else {
                $('#password_konf').attr('disabled', 'disabled');
            }
        });

        $('#new_password').blur(function() {
            if ($(this).val() !== '') {
                $('#password_konf').removeAttr('disabled');
                $('#message').html(' Re-type your new password');
            } else {
                $('#password_konf').attr('disabled', 'disabled');
                $('#message').html(' Enter your new password first!');
            }

        });

        $('#password_konf').keyup(function() {
            var konf = $(this).val();
            var baru = $('#new_password').val();

            if (konf === baru) {
                $('#btnChange').removeAttr('disabled');
                $('#message').html(' Please save your new password');
            } else {
                $('#btnChange').attr('disabled', 'disabled');
                $('#message').html(' Confirmation of the new password is not appropriate');
            }
        });

        $('#btnChange').click(function() {
            bootbox.dialog({
                message: "Are you sure you want to change this password ?",
                title: "Confirm Change Password",
                buttons: {
                    close: {
                        label: 'Cancel',
                        className: 'btn btn-secondary',
                        callback: function() {

                        }
                    },
                    save: {
                        label: 'Change Password',
                        className: 'btn btn-info',
                        callback: function() {
                            changePassword();
                        }
                    }
                }
            });
        });

    });

    function changePassword() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url("auth/save_password") ?>',
            data: $('#formadd').serialize(),
            cache: false,
            dataType: 'json',
            success: function(data) {
                if (data.status == true) {
                    messageCustom('Change Password Successfully', 'Success');
                    reset();
                    setTimeout(logout, 500);
                } else {
                    messageCustom('Change Password Failed', 'Error');
                }
            }
        });
    }

    function set_awal() {
        $('#message').html(' Enter your old password');
        $('#password_konf, #new_password, #btnChange').attr('disabled', 'disabled');
    }

    function reset() {
        $('#password_konf, #new_password, #old_password, #id').val('');
        set_awal();
        $('#old_password').focus();
    }
</script>