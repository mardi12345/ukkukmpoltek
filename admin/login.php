<?php
include('../include/koneksi.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <link rel="shortcut icon" href="<?= $base_url ?>assets/img/logo.png" type="image/x-icon">
    <title>Aplikasi Sekolah Luar Biasa</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= $base_url ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= $base_url ?>assets/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="<?= $base_url ?>assets/img/logosl.png" alt="logo" width="150" class="shadow-light rounded" style="padding: 10px;">
                            <h4 class="mt-3">UKK & UKM POLTEK GT </h4>
                        </div><center><p>Repost by <a href='https:///' title='' target='_blank'></a></p></center>


                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login Admin</h4>
                            </div>

                            <div class="card-body">
                            <?php if (isset($_SESSION['message'])) { ?>
                                <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                                    <?= $_SESSION['message']?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php unset($_SESSION['message']); unset($_SESSION['message_type']); } ?>
                                <form method="POST" action="<?= $base_url ?>auth/proses_login_admin.php" class="needs-validation" novalidate="">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus value="admin">
                                        <div class="invalid-feedback">
                                            Please fill in your Username
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password" tabindex="2" required value="admin">
                                        <div class="invalid-feedback">
                                            please fill in your password
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" name = "login" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                        <div class="text-center mt-3">
                                            <a href="<?= base_url()?>">Halaman Utama</a>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>

                        <div class="simple-footer">
                            Copyright &copy; UKK UKM Poltek GT
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="<?= $base_url ?>assets/modules/moment.min.js"></script>
    <script src="<?= $base_url ?>assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="<?= $base_url ?>assets/js/scripts.js"></script>
    <script src="<?= $base_url ?>assets/js/custom.js"></script>
</body>

</html>