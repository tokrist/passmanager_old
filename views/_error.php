<?php
    /** @var $exception \Exception */

    $this->title = $exception->getCode() . ' | PassManager';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->title; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <script src="/assets/plugins/fontawesome/js/fontawesome.js"></script>
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/css/adminlte.min.css">
    <!-- Favicon -->
    <link rel="icon" href="/assets/images/logo.png" type="image/png">
</head>
<body>

<div>
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-warning"><?php echo $exception->getCode(); ?></h2>
            <div class="error-content">
                <h3><i class="fas fa-exclamation-triangle text-warning"></i> <?php echo $exception->getMessage(); ?></h3>
                <p>
                    Ellenőrizze, hogy jó oldalra keresett-e, esetleg elírta annak elérési útját, vagy térjen vissza a <a href="/">kezdőlapra</a>.
                </p>
            </div>
    </section>
</div>

<!-- jQuery -->
<script src="/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/assets/js/adminlte.min.js"></script>
</body>
</html>