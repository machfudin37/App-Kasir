<?php

// Lampirkan dbconfig  
require_once "dbconfig.php";

// Cek status login user  
if (!$user->isLoggedIn()) {
    header("location: login.php"); //Redirect ke halaman login  
}

// Ambil data user saat ini  
$currentUser = $user->getUser();

?>


<!DOCTYPE html>

<html lang="en">

<head>

    <title>Halaman Home Aplikasi Kasir</title>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Bootstrap-->

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="container">

        <div class="panel panel-primary">

            <div class="panel-heading">Aplikasi Kasir</div>
            <div class="info">
                <h2>&nbsp; Selamat datang <?php echo $currentUser['name'] ?></h2>
            </div>

            <div class="panel-body">

                <a href="add.php" class="btn btn-large btn-default">

                    <i class="glyphicon glyphicon-plus"></i>

                    &nbsp; Tambah Data</a>

                <br /><br />

                <table class='table table-bordered table-responsive'>

                    <tr>

                        <th>ID Barang</th>

                        <th>Nama Barang</th>

                        <th>Stok</th>

                        <th>Harga</th>

                        <th colspan="2">
                            <center>Actions</center>
                        </th>

                    </tr>

                    <?php

                    $query = "SELECT * FROM barang";

                    $records_per_page = 5;

                    $newquery = $brg->paging($query, $records_per_page);

                    $brg->viewData($newquery);

                    ?>

                    <tr>

                        <td colspan="7" align="center">

                            <div class="pagination-wrap">

                                <?php $brg->paginglink($query, $records_per_page); ?>

                            </div>

                        </td>

                    </tr>

                </table>
                <a href="logout.php" class="btn btn-large btn-default">

                    <i class="glyphicon"></i>

                    Logout</a>

                <br /><br />

            </div>
            <!--End: Panel-body-->

        </div>
        <!--End: Panel-->

    </div>

    <!--Bootstrap-->

    <script src="bootstrap/js/bootstrap.min.js"></script>

</body>

</html>