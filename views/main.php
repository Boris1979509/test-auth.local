<?php require_once 'layouts/header.php' ?>
<body>
<div class="container mt-5">
    <?php require_once 'partials/_flash.php' ?>
    <div class="row">
        <?php if (isset($_SESSION['auth'])) {
            require_once 'home/index.php';
        } else {
            require_once 'partials/_auth.php';
        } ?>
    </div>
</div>
<?php require_once 'layouts/footer.php' ?>

