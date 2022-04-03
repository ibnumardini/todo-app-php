<div class="alert alert-<?= $_SESSION['alert'][0] ?> alert-dismissible fade show" role="alert">
    <?php foreach ($_SESSION['alert'][1] as $msg) : ?>
        <strong><?= $msg ?>!</strong>
    <?php endforeach; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>