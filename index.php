<?php include 'views/layouts/header.php' ?>
<body>
<div class="container mt-5">
    <?php include 'views/partials/_flash.php' ?>
    <div class="row">
        <?php if (isset($_SESSION['auth'])) {
            include 'views/home/index.php';
        } else {
            include 'views/partials/_auth.php';
        } ?>
    </div>
</div>
<?php include 'views/layouts/footer.php' ?>
