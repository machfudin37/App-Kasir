<?php

try {
    $con = new PDO('mysql:host=localhost;dbname=app-kasir', 'root', '', array(PDO::ATTR_PERSISTENT => true));
} catch (PDOException $e) {
    echo $e->getMessage();
}

include_once 'Auth.php';
include_once 'barang_class.php';

$user = new Auth($con);
$brg = new barang($con);
