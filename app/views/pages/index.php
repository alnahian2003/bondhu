<?php
// Include Header
require APP_ROOT . "/views/inc/header.php";
?>

<!-- General Navbar -->
<?php include "../app/views/inc/navbar.php"; ?>

<!-- Main Container -->
<div class="container">

    <h1><?= $data["title"]; ?></h1>
    <h6><?= $data["subtitle"]; ?></h6>

    <?php
    // Include Footer
    require APP_ROOT . "/views/inc/footer.php";
    ?>