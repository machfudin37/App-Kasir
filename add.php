<?php

include_once 'dbconfig.php';
// Cek status login user  
if (!$user->isLoggedIn()) {
    header("location: login.php"); //Redirect ke halaman login  
}

// Ambil data user saat ini  
$currentUser = $user->getUser();


if (isset($_POST['btn-save'])) {
    $id_barang      = strtoupper($_POST['id_barang']);

    $nama           = $_POST['nama'];

    $stok          = $_POST['stok'];

    $harga           = $_POST['harga'];

    if ($brg->insertData($id_barang, $nama, $stok, $harga)) {
        header("Location: add.php?inserted");
    } else {
        header("Location: add.php?failure");
    }
}

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <title>Halaman Tambah Data Aplikasi Kasir</title>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Bootstrap-->

    <!--Bootstrap-->

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="container">

        <div class="panel panel-primary">

            <div class="panel-heading">Form Tambah Data</div>

            <div class="panel-body">

                <?php

                if (isset($_GET['inserted'])) {
                ?>

                    <div class="container">

                        <div class="alert alert-info">

                            <strong>Info!</strong> Data berhasil tersimpan! Silakan klik di <a href="index.php">sini</a> untuk kembali ke beranda.

                        </div>

                    </div>

                <?php
                } elseif (isset($_GET['failure'])) {
                ?>

                    <div class="container">

                        <div class="alert alert-warning">

                            <strong>Warning!</strong> Data gagal disimpan !

                        </div>

                    </div>

                <?php
                }

                ?>

                <div class="clearfix"></div><br />

                <form method='post'>

                    <table class='table table-bordered'>

                        <tr>

                            <td>Id Barang</td>

                            <td><input type='text' name='id_barang' class='form-control' required maxlength="10" autofocus></td>

                        </tr>

                        <tr>

                            <td>Nama Barang</td>

                            <td><input type='text' name='nama' class='form-control' required maxlength="50"></td>

                        </tr>

                        <tr>

                            <td>Stok</td>

                            <td><input type='text' name='stok' class='form-control' required></td>

                        </tr>

                        <tr>

                            <td>Harga</td>

                            <td><input type='text' name='harga' class='form-control' required></td>

                        </tr>

                        <tr>

                            <td colspan="2">

                                <button type="submit" class="btn btn-primary" name="btn-save">Simpan

                                </button>

                                <button type="reset" class="btn btn-primary" name="btn-reset">Reset

                                </button> <br /><br />

                                <a href="index.php" class="btn btn-large btn-success">

                                    <i class="glyphicon glyphicon-backward"></i> &nbsp; Kembali ke halaman utama</a>

                            </td>

                        </tr>

                    </table>

                </form>

            </div>
            <!--End: Panel-body-->

        </div>
        <!--End: Panel-->

    </div>

    <!--Bootstrap-->

    <script src="bootstrap/js/bootstrap.min.js"></script>

</body>

</html>