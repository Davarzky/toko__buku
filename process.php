<?php
session_start();
include 'koneksi/config.php'; 
$module = $_REQUEST['module'];
$action = $_REQUEST['action'];

include 'module/'.$module.'/process.php';