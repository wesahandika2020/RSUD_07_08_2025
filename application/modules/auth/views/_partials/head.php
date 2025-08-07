<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="SIMRS">
    <meta name="description" content="Ini adalah aplikasi sistem informasi rumah sakit">
    <meta name="keywords" content="simrs, application, farmasi, klinik, rumah sakit, billing, inventory, rs, Clinical system, Clinic, Klinik, Apotek, Farmasi, Pharmacy">
    <meta name="robots" content="index, follow">
    <meta name="language" content="English">
    <meta name="revisit-after" content="1 days">
    <meta name="author" content="Faiz Muhammad Syam, S.Kom, MTI">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="theme-color" content="#255882">

    <title>SIMRS | <?php echo $hospital->nama  ?></title>
    <link rel="icon" type="image/png" href="<?= resource_url() ?>images/favicons/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?= resource_url() ?>images/favicons/favicon-16x16.png" sizes="16x16" />

    <!-- Custom CSS -->
    <link href="<?= resource_url() ?>assets/css/all.css" rel="stylesheet">
    <link href="<?= resource_url() ?>hospital/dist/css/pages/login-register-lock.css" rel="stylesheet">

    <style>
        @media (max-width: 767px) {
            .error-box, .login-register, .login-sidebar .login-box {
                position: relative;
            }

            .login-box {
                width: 100%;
            }

            #wrapper {
                background-image: linear-gradient(-140deg, #0091d4, #004a6b);
            }

            .box-image-login {
                display: none;
            }
        }
    </style>

    <!-- All JS -->
    <script src="<?= resource_url() ?>assets/node_modules/jquery/jquery-3.6.0.js"></script>
    <script src="<?= resource_url() ?>assets/bootstrap/js/bootstrap.js"></script>
    <script src="<?= resource_url() ?>assets/js/popper.min.js"></script>
    <script src="<?= resource_url() ?>assets/js/toastr.min.js"></script>
    <script src="<?= resource_url() ?>hospital/dist/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?= resource_url() ?>hospital/dist/js/waves.js"></script>
    <script src="<?= resource_url() ?>hospital/dist/js/sidebarmenu.js"></script>
    <script src="<?= resource_url() ?>assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?= resource_url() ?>assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?= resource_url() ?>hospital/dist/js/custom.min.js"></script>
    <script src="<?= resource_url() ?>assets/js/jquery.blockui.js"></script>
    <script src="<?= resource_url() ?>assets/js/syams-libraries.js"></script>
    <script src="<?= resource_url() ?>assets/js/bootbox.js"></script>
    <script src="<?= resource_url() ?>assets/js/starback.js"></script>

    <script>
        $(document).on("select2:open", () => {
            document.querySelector(".select2-container--open .select2-search__field").focus()
        })
    </script>
</head>