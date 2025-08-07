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
    <meta name="language" content="Indonesian, English">
    <meta name="revisit-after" content="1 days">
    <meta name="author" content="Faiz Muhammad Syam, S.Kom, MTI">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="theme-color" content="#0f5b91">

    <title>SIMRS | <?php echo $hospital->nama ?></title>
    <link rel="icon" type="image/png" href="<?= resource_url() ?>images/favicons/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?= resource_url() ?>images/favicons/favicon-16x16.png" sizes="16x16" />

    <!-- Custom CSS -->
    <link href="<?= resource_url() ?>hospital/dist/css/pages/stylish-tooltip.css" rel="stylesheet">
    <link href="<?= resource_url() ?>assets/css/all.css" rel="stylesheet">

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="<?= resource_url() ?>assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="<?= resource_url() ?>assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css">

    <!-- All JS -->
    <script src="<?= resource_url() ?>assets/node_modules/jquery/jquery-3.6.0.js"></script>
    <script src="<?= resource_url() ?>assets/node_modules/wizard/bwizard.js"></script>
    <script src="<?= resource_url() ?>assets/summernote/summernote-bs4.js"></script>
    <script src="<?= resource_url() ?>assets/js/popper.min.js"></script>
    <script src="<?= resource_url() ?>assets/bootstrap/js/bootstrap.js"></script>
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
    <script src="<?= resource_url() ?>assets/js/select2.js"></script>
    <script src="<?= resource_url() ?>assets/js/select2c.js"></script>
    <script src="<?= resource_url() ?>assets/js/relCopy.jquery.js"></script>
    <script src="<?= resource_url() ?>assets/node_modules/moment/moment.js"></script>
    <script src="<?= resource_url() ?>assets/node_modules/moment/id.js"></script>
    <script src="<?= resource_url() ?>assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
    <script src="<?= resource_url() ?>assets/node_modules/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script src="<?= resource_url() ?>assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="<?= resource_url() ?>assets/js/jquery.treetable.js"></script>
    <script src="<?= resource_url() ?>assets/js/bootstrap-multiselect.js"></script>
    <script src="<?= resource_url() ?>assets/js/mousetrap.min.js"></script>
    <script src="<?= resource_url() ?>assets/datetimepicker/js/moment.js"></script>
    <script src="<?= resource_url() ?>assets/datetimepicker/js/bootstrap-datetimepicker.js"></script>
    <script src="<?= resource_url() ?>assets/node_modules/sweetalert-2/sweetalert2.js"></script>
    <script src="<?= resource_url() ?>assets/js/highcharts.js"></script>
    <script src="<?= resource_url() ?>assets/js/jq-signature.js"></script>
    <script src="<?= resource_url() ?>assets/js/jquery.scannerdetection.js"></script>
    <script src="<?= resource_url() ?>assets/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= resource_url() ?>assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script> -->
    <script src="<?= resource_url() ?>assets/node_modules/button/dataTables.buttons.min.js"></script>

    <?php $this->load->view('layouts/js'); ?>
</head>