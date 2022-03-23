<?php include '../connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Etix - Tambah Penumpang</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="../style/main.css" rel="stylesheet" />
</head>

<body>
    <div class="page-dashboard">
        <div class="d-flex" id="wrapper" data-aos="fade-right">
            <!-- Sidebar -->
            <div class="border-right" id="sidebar-wrapper">
                <div class="sidebar-heading text-center">
                    <img src="../images/logo.png" alt="" class="my-4" />
                </div>
                <div class="list-group list-group-flush">
                    <a href="../" class="list-group-item list-group-item-action">Dashboard</a>
                    <a href="index.php" class="list-group-item list-group-item-action active">Penumpang</a>
                    <a href="../kereta" class="list-group-item list-group-item-action">Kereta</a>
                    <a href="../tiket" class="list-group-item list-group-item-action">Tiket</a>
                </div>
            </div>

            <!-- Konten -->
            <div id="page-content-wrapper">
                <!-- Navigasi -->
                <nav class="navbar navbar-store navbar-expand-lg navbar-light fixed-top" data-aos="fade-down">
                    <button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-toggle">
                        &laquo; Menu
                    </button>

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto d-none d-lg-flex">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <img src="/images/icon-user.png" alt=""
                                        class="rounded-circle mr-2 profile-picture" />
                                    Hi, Admin
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-inline-block mt-2" href="#">
                                    <img src="/images/icon-cart-empty.svg" alt="" />
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- Isi -->
                <div class="section-content section-dashboard-home" data-aos="fade-up">
                    <div class="container-fluid">

                        <!-- Heading -->
                        <div class="dashboard-heading">
                            <h2 class="dashboard-title">Penumpang</h2>
                            <p class="dashboard-subtitle">
                                Tambah Penumpang
                            </p>
                        </div>

                        <!-- Valen -->
                        <div class="dashboard-content">

                            <div class="row p-2 card-body">
                                <form method="POST" action="">
                                    ID:
                                    <input required type="number" name="id"><br>
                                    NAMA:
                                    <input required type="text" name="nama"><br>
                                    GENDER:
                                    <select name="gender">
                                        <option value="L">L</option>
                                        <option value="P">P</option>
                                    </select><br>
                                    ALAMAT:<br>
                                    <textarea required name="alamat"></textarea><br>
                                    <input type="submit" name="submit" value="TAMBAH">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript -->
    <script src="/vendor/jquery/jquery.slim.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $gender = $_POST['gender'];
    $alamat = $_POST['alamat'];

    $query = ociparse($conn, 
    "INSERT INTO penumpang
    VALUES ($id, '$nama', '$gender', '$alamat', 0)");
    $hasil = ociexecute($query);
    
    if ($hasil == true) {
        showMessage("Berhasil menambahkan data penumpang!");
        redirect("index.php");
    } else
        showMessage("Gagal menambahkan data penumpang!");
}
oci_close($conn);
?>