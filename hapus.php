<?php

include_once 'dbconfig.php';
// Cek status login user  
if (!$user->isLoggedIn()) {
    header("location: login.php"); //Redirect ke halaman login  
}

// Ambil data user saat ini  
$currentUser = $user->getUser();


if (isset($_POST['btn-del'])) {
    $id_barang = $_GET['delete_id'];

    $brg->deleteData($id_barang);

    header("Location: hapus.php?deleted");
}

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <title>Halaman Hapus Data Aplikasi Kasir</title>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Bootstrap-->

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="container">

        <div class="panel panel-primary">

            <div class="panel-heading">Halaman Hapus Data</div>

            <div class="panel-body">

                <?php

                if (isset($_GET['deleted'])) {
                ?>

                    <div class="alert alert-success">

                        <strong>Info!</strong> Data berhasil dihapus...

                    </div>

                <?php
                } else {
                ?>

                    <div class="alert alert-danger">

                        <strong>Warning!</strong> apa anda yakin ingin menghapusnya ?

                    </div>

                <?php
                }

                ?>

            </div>

            <div class="container">

                <?php

                if (isset($_GET['delete_id'])) {
                    $id_barang = $_GET['delete_id']; ?>

                    <table class='table table-bordered'>

                        <tr>

                            <th>#</th>

                            <th>Nama</th>

                            <th>Stok</th>

                            <th>Harga</th>

                        </tr>

                        <?php

                        extract($brg->getID($id_barang)); ?>

                        <tr>

                            <td><?php echo $id_barang; ?></td>

                            <td><?php echo $nama; ?></td>

                            <td><?php echo $stok; ?></td>

                            <td><?php echo $harga; ?></td>

                        </tr>

                    </table>

                <?php
                }

                ?>

            </div>

            <div class="container">

                <p>

                    <?php

                    if (isset($id_barang)) {
                    ?>

                <form method="post">

                    <input type="hidden" name="id" value="<?php echo $id_barang; ?>" />

                    <button class="btn btn-large btn-primary" type="submit" name="btn-del">

                        <i class="glyphicon glyphicon-trash"></i> &nbsp; YES</button>

                    <a href="index.php" class="btn btn-large btn-success">

                        <i class="glyphicon glyphicon-backward"></i> &nbsp; NO</a>

                </form>

            <?php
                    } else {
            ?>

                <a href="index.php" class="btn btn-large btn-success">

                    <i class="glyphicon glyphicon-backward"></i> &nbsp; Kembali ke halaman utama</a>

            <?php
                    }

            ?>

            </p>

            </div>

        </div>
        <!--End: Panel-body-->

    </div>
    <!--End: Panel-->

    </div>

    <!--Bootstrap-->

    <script src="bootstrap/js/bootstrap.min.js"></script>
    
</body>

</html>