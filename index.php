<?php
include_once './app/utils/helper.php';
include_once './app/configs/db.php';
include_once './app/handlers/todo_handler.php';
?>

<?php view('master/header.php'); ?>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <?=get_session('alert') ? component('alert.php') : ''?>
        <div class="card mb-3">
            <div class="card-body">
                <div class="card-title fw-bold fs-3">
                    Todo-App
                </div>
                <?php component('form_todo.php', ['todo' => is_edit_mode() ? get_todo() : []])?>
            </div>
        </div>
        <?php component('list_todo.php', ['todos' => todos()])?>
        <?php component('copyright.php')?>
    </div>
    <div class="col-md-3"></div>
</div>

<?php
view('master/footer.php');

kill_session('alert');
?>
