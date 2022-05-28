<?php
// Include Header
require APP_ROOT . "/views/inc/header.php";
?>

<!-- Intro Part Only. Remove This Part -->

<style>
    body {
        padding: 0;
        margin: 0;
        font-family: "Montserrat", sans-serif;
    }

    * {
        transition: 0.3s;
    }

    .heroSection {
        height: 100vh;
        color: #ddd !important;
        background: white;
        background-size: cover;
        display: flex;
        flex-flow: column;
        justify-content: center;
        align-items: center;
        padding: 1rem;
    }

    .heroText {
        text-align: center;
        color: #555;
    }

    .heroText h1 {
        font-size: 3em;
        line-height: 1;
        margin: 0;
        color: black;
    }
</style>

<div class="heroSection">
    <div class="heroText">
        <h1><?= $data["title"]; ?></h1>
        <h2><?= $data["subtitle"]; ?></h2>
        <p>Push yourself, no one else is going to do it for you.</p>

        <!-- Place this tag where you want the button to render. -->
        <a class="github-button" href="https://github.com/alnahian2003" data-color-scheme="no-preference: dark; light: light; dark: dark;" data-size="large" data-show-count="true" aria-label="Follow @alnahian2003 on GitHub">Follow @alnahian2003</a>
        <br>

        <!-- Place this tag where you want the button to render. -->
        <a class="github-button" href="https://github.com/alnahian2003/alanmvc" data-color-scheme="no-preference: dark; light: light; dark: dark;" data-size="large" data-show-count="true" aria-label="Star alnahian2003/alanmvc on GitHub">Star</a>

        <!-- Place this tag where you want the button to render. -->
        <a class="github-button" href="https://github.com/alnahian2003/alanmvc/archive/refs/heads/master.zip" data-color-scheme="no-preference: dark; light: light; dark: dark;" data-size="large" aria-label="Download alnahian2003/alanmvc on GitHub">Download</a>

    </div>
</div>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- End: Intro Part Only -->

<?php
// Include Footer
require APP_ROOT . "/views/inc/footer.php";
?>