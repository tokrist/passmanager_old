<?php
    use app\core\Application;

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->title; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <script src="/assets/plugins/fontawesome/js/fontawesome.js"></script>
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/css/adminlte.min.css">
    <!-- Favicon -->
    <link rel="icon" href="/assets/images/logo.png" type="image/png">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="/assets/images/logo.png" alt="PassManager Logo" height="60" width="60">
</div>

<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
<!--        <ul class="navbar-nav">-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>-->
<!--            </li>-->
<!--            <li class="nav-item d-none d-sm-inline-block">-->
<!--                <a href="../../index3.html" class="nav-link">Home</a>-->
<!--            </li>-->
<!--            <li class="nav-item d-none d-sm-inline-block">-->
<!--                <a href="#" class="nav-link">Contact</a>-->
<!--            </li>-->
<!--        </ul>-->

        <ul class="navbar-nav ml-auto">
            <li class="nav-item d-none d-sm-inline-block">
                <span class="nav-link"><i class="fas fa-building"></i>&nbsp;<strong>Szervezet:</strong> Minta szervezet <i class="fa-solid fa-code"></i> Fejlesztő</span>
            </li>
            <li class="nav-item d-sm-inline-block">
                <span class="nav-link"><i class="fas fa-clock"></i>&nbsp;<span id="time"><?php echo date('Y. m. d. H:i:s') ?></span></span>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/home/dashboard" class="brand-link">
            <img src="/assets/images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light"><strong>Pass</strong>Manager</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?php echo Application::$app->auth->decryptData(Application::$app->user->userFullname); ?></a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <!-- Sidebar goes here -->
            </nav>
        </div>
    </aside>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Irányítópult</h1>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> DEV 0.1
        </div>
        <strong>Copyright &copy; <?php echo date('Y'); ?> | <a href="https://tokrist.hu" target="_blank">tokrist.hu</a> | </strong> Minden jog fenntartva.
    </footer>
</div>

<script>
    function time(){
        var now = new Date();

        document.getElementById("time").innerHTML = now.getFullYear() + ". " + ("0" + (now.getMonth()+1)).slice(-2) + ". " + ("0" + now.getDate()).slice(-2) + ". " + ("0" + now.getHours()).slice(-2) +":" + ("0" + now.getMinutes()).slice(-2) + ":" + ("0" + now.getSeconds()).slice(-2);
    }

    setInterval(time, 1000);
</script>

<!-- jQuery -->
<script src="/assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- AdminLTE App -->
<script src="/assets/js/adminlte.js"></script>
</body>
</html>

<!--<!doctype html>-->
<!--<html lang="hu">-->
<!--<head>-->
<!--    <meta charset="utf-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
<!--    <title>--><?php //echo $this->title; ?><!--</title>-->
<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"-->
<!--          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">-->
<!--</head>-->
<!--<body>-->
<!--<nav class="navbar navbar-expand-lg bg-light">-->
<!--    <div class="container-fluid">-->
<!--        <a class="navbar-brand" href="/">Navbar</a>-->
<!--        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"-->
<!--                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">-->
<!--            <span class="navbar-toggler-icon"></span>-->
<!--        </button>-->
<!--        <div class="collapse navbar-collapse" id="navbarSupportedContent">-->
<!--            <ul class="navbar-nav me-auto mb-2 mb-lg-0">-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link active" aria-current="page" href="/">Home</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" href="/contact">Contact</a>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </div>-->
<!--        <div class="d-flex">-->
<!--            --><?php //if(Application::$app->isGuest()): ?>
<!--            <ul class="navbar-nav me-auto mb-2 mb-lg-0">-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" href="/login">Login</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" href="/register">Register</a>-->
<!--                </li>-->
<!--            </ul>-->
<!--            --><?php //else: ?>
<!--            <ul class="navbar-nav me-auto mb-2 mb-lg-0">-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" href="/profile">Profile</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" href="/logout">Logout</a>-->
<!--                </li>-->
<!--            </ul>-->
<!--            --><?php //endif ?>
<!--        </div>-->
<!--    </div>-->
<!--</nav>-->
<!---->
<!--<div class="container">-->
<!--   --><?php //if(Application::$app->session->getFlash('success')): ?>
<!--    <div class="alert alert-success">-->
<!--        --><?php //echo  Application::$app->session->getFlash('success');?>
<!--    </div>-->
<!--    --><?php //endif; ?>
<!--    {{content}}-->
<!--</div>-->
<!---->
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"-->
<!--        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"-->
<!--        crossorigin="anonymous"></script>-->
<!--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"-->
<!--        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"-->
<!--        crossorigin="anonymous"></script>-->
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"-->
<!--        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk"-->
<!--        crossorigin="anonymous"></script>-->
<!--</body>-->
<!--</html>-->