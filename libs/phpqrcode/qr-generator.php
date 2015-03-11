<?php
include_once 'phpqrcode.php';
QRcode::png($_GET['URL'], false, 6, 6);
?>