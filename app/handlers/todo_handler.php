<?php

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'save':
            save_todo();
            break;
        case 'done':
            change_status('done');
            break;
        case 'undone':
            change_status('undone');
            break;
        case 'delete':
            delete_todo();
            break;
        case 'update':
            update_todo();
            break;
    }
}

if (isset($_GET['action'])) {
    switch ($_POST['action']) {
        case 'edit':
            get_todo();
            break;
    }
}

function todos()
{
    global $mysqli;

    $todos = mysqli_query($mysqli, "SELECT * FROM todos ORDER BY updated_at DESC");

    return $todos;
}

function save_todo()
{
    $todo = htmlspecialchars($_POST['todo']);

    global $mysqli;

    $input = mysqli_query($mysqli, "INSERT INTO todos(todo) VALUES('" . $todo . "')");

    if ($input) {
        $_SESSION['alert'] = ['success', ['Success to create']];
    } else {
        $_SESSION['alert'] = ['danger', ['Failed to create']];
    }
}

function change_status($status)
{
    $id = htmlspecialchars($_POST['id']);

    global $mysqli;

    if ($status === "done") {
        $update = mysqli_query($mysqli, sprintf("UPDATE todos SET status='%s', done_at='%s', updated_at='%s' WHERE id='%s'", 1, date('Y-m-d H:i:s'), date('Y-m-d H:i:s'), $id));
    } else if ($status === "undone") {
        $update = mysqli_query($mysqli, sprintf("UPDATE todos SET status='%s', updated_at='%s' WHERE id='%s'", 0, date('Y-m-d H:i:s'), $id));
    }

    if ($update) {
        $_SESSION['alert'] = ['success', ['Success to update']];
    } else {
        $_SESSION['alert'] = ['danger', ['Failed to update']];
    }
}

function delete_todo()
{
    $id = htmlspecialchars($_POST['id']);

    global $mysqli;

    $input = mysqli_query($mysqli, "DELETE FROM todos WHERE id = $id");

    if ($input) {
        $_SESSION['alert'] = ['success', ['Success to delete']];
    } else {
        $_SESSION['alert'] = ['danger', ['Failed to delete']];
    }
}

function get_todo()
{
    $id = htmlspecialchars($_GET['id']);

    global $mysqli;

    $result = mysqli_query($mysqli, "SELECT * FROM todos WHERE id = $id");

    return mysqli_fetch_object($result);
}

function update_todo()
{
    $id = htmlspecialchars($_POST['id']);
    $todo = htmlspecialchars($_POST['todo']);

    global $mysqli;

    $update = mysqli_query($mysqli, sprintf("UPDATE todos SET todo='%s', updated_at='%s' WHERE id='%s'", $todo, date('Y-m-d H:i:s'), $id));

    if ($update) {
        $_SESSION['alert'] = ['success', ['Success to update']];
    } else {
        $_SESSION['alert'] = ['danger', ['Failed to update']];
    }
}
