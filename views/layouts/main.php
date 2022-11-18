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
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <script src="/assets/plugins/fontawesome/js/fontawesome.js"></script>
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/css/adminlte.min.css">
    <!-- Custom style overriding basic styles -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <!-- Favicon -->
    <link rel="icon" href="/assets/images/logo.png" type="image/png">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="/assets/images/logo.png" alt="PassManager Logo" height="60" width="60">
</div>

<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa-solid fa-bars"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item d-none d-sm-inline-block">
                <span class="nav-top-item"><iclass="fas fa-building"></i>&nbsp
                    <strong>Szervezet:</strong> PassManager
                    <?php echo Application::$app->user->getUserRole()['roleIcon'] . ' ' . Application::$app->user->getUserRole()['roleName']; ?>
                </span>
            </li>
            <li class="nav-item d-sm-inline-block">
                <span class="nav-top-item"><i class="fas fa-clock"></i>&nbsp
                    <span id="time"><?php echo date('Y. m. d. H:i:s') ?></span>
                </span>
            </li>
        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="/home/dashboard" class="brand-link">
            <img src="/assets/images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light"><strong>Pass</strong>Manager</span>
        </a>

        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?php echo Application::$app->user->getUserPicturePath();?>"
                         class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="/manage/profile" class="d-block">
                        <?php echo Application::$app->user->getUserFullname();?>
                    </a>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="/home/dashboard" class="nav-link">
                            <i class="nav-icon fa-solid fa-th"></i>
                            <p>Irányítópult</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fa-solid fa-user"></i>
                            <p>Profil</p>
                        </a>
                    </li>

                    <li class="nav-header">Szervezet</li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fa-solid fa-plus"></i>
                            <p>Új szervezet létrehozása</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fa-solid fa-building"></i>
                            <p>Szervezetek<i class="fa-solid fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="fa-regular fa-building-circle-arrow-right nav-icon"></i>
                                    <p>Szervezet 1</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="fa-regular fa-building-circle-arrow-right nav-icon"></i>
                                    <p>Szervezet 2</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="fa-regular fa-building-circle-arrow-right nav-icon"></i>
                                    <p>Szervezet 3</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-header">Mappák</li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fa-solid fa-folder-plus"></i>
                            <p>Új mappa létrehozása</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fa-solid fa-folder"></i>
                            <p>Mappák<i class="fa-solid fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="fa-regular fa-folder-open nav-icon"></i>
                                    <p>Mappa 1</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="fa-regular fa-folder-open nav-icon"></i>
                                    <p>Mappa 2</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="fa-regular fa-folder-open nav-icon"></i>
                                    <p>Mappa 3</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-header">Kilépés</li>
                    <li class="nav-item">
                        <a href="/logout" class="nav-link">
                            <i class="nav-icon fa-solid fa-right-from-bracket"></i>
                            <p>Kilépés</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <div class="content-wrapper">
        {{content}}
    </div>

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> DEV 0.1
        </div>
        <strong>Copyright &copy; <?php echo date('Y'); ?> |
            <a href="https://tokrist.hu" target="_blank">tokrist.hu</a> | </strong> Minden jog fenntartva.
    </footer>
</div>

<script>
    function time() {
        let now = new Date();

        document.getElementById("time").innerHTML = now.getFullYear() + ". " + ("0" + (now.getMonth() + 1)).slice(-2) + ". " + ("0" + now.getDate()).slice(-2) + ". " + ("0" + now.getHours()).slice(-2) + ":" + ("0" + now.getMinutes()).slice(-2) + ":" + ("0" + now.getSeconds()).slice(-2);
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