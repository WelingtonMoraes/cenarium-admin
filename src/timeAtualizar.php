<?php

include('consfig.php');
include('classCurl.php');

$url = $urlApi . "team";

$arrayTeam = getRequest($url);

?>

<?php include('header.php'); ?>

<!-- Page Wrapper -->
<div id="content">

    <?php include('topNavBar.php'); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">



        </div>
        <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

</div>

<?php include('footer.php') ?>