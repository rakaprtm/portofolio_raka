<?php
require_once "../koneksi.php";
session_start();

$blog = mysqli_query(
    $conn,
    "SELECT blog.*, categories.nama_kategori FROM blog JOIN categories ON blog.id_kategori = categories.id"
);
$rows = mysqli_fetch_all($blog, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
    $idDel = base64_decode($_GET['delete']);
    if (!is_numeric($idDel)) {
        die("ID tidak valid.");
    }

    $q_delete = mysqli_query($conn, "DELETE FROM blog WHERE id = $idDel");

    header("Location: blog.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Components / Accordion - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <?php require_once "../inc/navbar.php"; ?>
    <?php require_once "../inc/sidebar.php"; ?>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Blank Page</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active">Blank</li>
                </ol>
            </nav>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Project</h5>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <a href="../admin/tambahblog.php" class="btn btn-primary mb-3">Create</a>
                                    <div class="card table-container">
                                        <table class="table table-bordered text-center" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>isi</th>
                                                    <th>Penulis</th>
                                                    <th>Kategori</th>
                                                    <th>Foto</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($rows as $row) {
                                                ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $row['isi'] ?></td>
                                                        <td><?= $row['penulis'] ?></td>
                                                        <td><?= $row['nama_kategori'] ?></td>
                                                        <td><img src="<?php echo "../assets/uploads/" . $row['foto'] ?>" width="50" height="50"></td>
                                                        <td>
                                                            <?php
                                                            switch ($row['status']) {
                                                                case '1':
                                                                    echo '<span class="badge bg-success">Published</span>';
                                                                    break;

                                                                default:
                                                                    echo '<span class="badge bg-secondary">Unknown</span>';
                                                            }
                                                            ?></td>
                                                        <td><a href="tambahblog.php?edit=<?php echo base64_encode($row['id']) ?>" class="btn btn-success btn-sm">Edit</a><br>
                                                            <a href="blog.php?delete=<?php echo base64_encode($row['id']); ?>" class="btn btn-danger" onclick="return confirm('yakin mau menghapus profile?');">Delete</a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/chart.js/chart.umd.js"></script>
    <script src="../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../assets/vendor/quill/quill.js"></script>
    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-2.2.2/datatables.min.js" integrity="sha384-k90VzuFAoyBG5No1d5yn30abqlaxr9+LfAPp6pjrd7U3T77blpvmsS8GqS70xcnH" crossorigin="anonymous"></script>
    <script>
        let dataTable = new DataTable("#myTable");
    </script>
</body>
<!-- if (mysqli_num_rows($querySetting) > 0) {
        $fillQupdate = '';
        if ($logo['error'] == 0) {
            $fileName = uniqid() . "_" . basename($logo['name']);
            $filepath = "../assets/uploads/" . $fileName;
            if (move_uploaded_file($logo['tmp_name'], $filepath)) {
                $rowLogo = $rowEdt['logo'];
                if ($rowLogo && file_exists("../assets/uploads/" . $rowLogo)) {
                    unlink("../assets/uploads/" . $rowLogo);
                }
            } else {
                echo "GAGAL UPLOAD";
            }
        }
        $fillQupdate = "logo='$fileName'";
        $update = mysqli_query($conn, "UPDATE setting SET nama_website='$nama_website', alamat_website='$alamat_website', email='$email', tlpn='$tlpn', alamat='$alamat', $fillQupdate WHERE id = 1");
        header("location:setting.php?ubah=berhasil");
    } else {
        if ($logo['error'] == 0) {
            $fileName = uniqid() . "_" . basename($logo['name']);
            $filepath = "../assets/uploads/" . $fileName;
            move_uploaded_file($logo['tmp_name'], $filepath);

            $insert = mysqli_query($conn, "INSERT INTO setting (nama_website, alamat_website, email, tlpn, alamat, logo) VALUES('$nama_website', '$alamat_website', '$email', '$tlpn', '$alamat', '$fileName')");
            header("location:setting.php?tambah=berhasil");
        }
    }
}
if (isset($_GET['idDel'])) {
    $id = $_GET['idDel'];
    if ($rowEdt['logo']) {
        unlink("../assets/uploads/" . $rowEdt['logo']);
        $delete = mysqli_query($conn, "DELETE FROM setting WHERE id = $id");
        $alterAI = mysqli_query($conn, "ALTER TABLE setting AUTO_INCREMENT = 1");
        if ($delete & $alterAI) {
            header("location: setting.php");
        }
    }
} -->

</html>