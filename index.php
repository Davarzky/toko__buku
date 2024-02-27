<?php
session_start();
include 'koneksi/config.php'; 
$module = isset($_GET['module']) ? $_GET['module'] : "kasir";
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bukutopia</title>
  <link rel="shortcut icon" type="image/png" href="/assets/images/logos/download.png" />
  <link rel="stylesheet" href="/assets/css/styles.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <?php include 'layout/menu.php' ?>

    <div class="body-wrapper">
        <?php include 'layout/header.php' ?>

        <div class="container-fluid">
        <?php include 'module/'.$module.'/'. $action . '.php' ?>
        </div>
    </div>

    <?php include 'layout/footer.php' ?>
  </div>


    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
    
    <script> @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css");</script>
    
</body>
</html>