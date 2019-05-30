<?php
$msgError = $_SESSION['msg']['error'] ?? null;
unset($_SESSION['msg']['error']);
$msgSuccess = $_SESSION['msg']['success'] ?? null;
unset($_SESSION['msg']['success']);
?>

<?php if($msgError) : ?>
    <p class="alert alert-danger"><?= $msgError ?></p>
<?php endif; ?>
<?php if($msgSuccess) : ?>
    <p class="alert alert-success"><?= $msgSuccess ?></p>
<?php endif; ?>