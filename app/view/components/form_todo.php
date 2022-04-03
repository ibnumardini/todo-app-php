<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
    <div class="mb-3">
        <label for="todo" class="form-label">Your todo?</label>
        <input type="text" name="todo" class="form-control" id="todo" aria-describedby="todo_help" value="<?=is_edit_mode() ? $data['todo']->todo : ''?>">
        <div id="todo_help" class="form-text"><?=is_edit_mode() ? 'Update your' : 'Create something'?>  great activity.</div>
    </div>
    <div class="mb-3">
        <input type="hidden" name="action" value="<?=is_edit_mode() ? 'update' : 'save'?>">
        <button type="submit" class="btn btn-primary"><?=is_edit_mode() ? 'Update' : 'Create <i class="bi bi-plus-lg"></i>'?></button>
        <?php if(is_edit_mode()) : ?>
            <input type="hidden" name="id" value="<?= $data['todo']->id ?>">
            <a href="<?= $_SERVER['PHP_SELF'] ?>" class="btn btn-danger">Cancel <i class="bi bi-x-lg"></i></a>
        <?php endif; ?>
    </div>
</form>
