<?php include '../connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Etix - Manage Tiket</title>

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
                    <a href="../penumpang/" class="list-group-item list-group-item-action">Penumpang</a>
                    <a href="../kereta/" class="list-group-item list-group-item-action">Kereta</a>
                    <a href="index.php" class="list-group-item list-group-item-action active">Tiket</a>
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
                            <h2 class="dashboard-title">Kereta</h2>
                            <p class="dashboard-subtitle">
                                Manage Kereta
                            </p>
                        </div>

                        <!-- Valen -->
                        <div class="dashboard-content">
                            <div class="row">
                                <a class="btn btn-success nav-link px-4 text-white mb-3" href="add.php">Tambah
                                    Tiket</a>
                            </div>
                            <div class="row p-2 card-body">
                                <?php
                                $query = "SELECT * FROM tiket";
                                $sql = ociparse($conn, $query);
                                ociexecute($sql);
                                print_query($sql);
                                ?>
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