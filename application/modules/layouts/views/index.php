<?php $this->load->view('layouts/_partials/head'); ?>

<body class="skin-megna fixed-layout mini-sidebar" id="body">

    <!-- Main wrapper - style you can find in pages.scss -->
    <div id="main-wrapper">

        <!-- Topbar header - style you can find in pages.scss -->
        <?php $this->load->view('layouts/_partials/navbar'); ?>
        <!-- End Topbar header -->

        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <?php $this->load->view('layouts/_partials/sidebar'); ?>
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->

        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Bread crumb and right sidebar toggle -->
                <?php $this->load->view('layouts/_partials/breadcrumb'); ?>
                <!-- End Bread crumb and right sidebar toggle -->

                <!-- Start Page Content -->
                <div class="main-content">

                </div>
                <!-- End Page Content -->
            </div>
            <!-- End Container fluid  -->
        </div>
        <!-- End Page wrapper  -->

        <!-- footer -->
        <?php $this->load->view('layouts/_partials/footer'); ?>
        <!-- End footer -->
    </div>
    <!-- End Wrapper -->
</body>

</html>