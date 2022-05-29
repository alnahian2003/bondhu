<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= URL_ROOT; ?>/img/favicon.ico" type="image/x-icon">

    <!-- Boostrap 5.2 CDN -->
    <link rel="stylesheet" href="<?= URL_ROOT; ?>/css/bootstrap.min.css">

    <!-- Boostrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="<?= URL_ROOT; ?>/css/styles.css">

    <title><?= isset($site_title) ? $site_title :  SITE_NAME . " — " . SLOGAN;  ?></title>
</head>

<body>

    <!-- General Navbar -->
    <?php include "../app/views/inc/navbar.php"; ?>

    <!-- Main Container -->
    <main class="container">