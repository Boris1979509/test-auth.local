<?php if (isset($_SESSION['message']['error'])): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $_SESSION['message']['error'];
        unset($_SESSION['message']); ?>
    </div>
<?php endif; ?>
<?php if (isset($_SESSION['message']['success'])): ?>
    <div class="alert alert-success" role="alert">
        <?php echo $_SESSION['message']['success'];
        unset($_SESSION['message']); ?>
    </div>
<?php endif; ?>

