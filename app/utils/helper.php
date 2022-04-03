<?php

function view($view, $data = [])
{
    $path = './app/views';

    $data = $data;

    include_once sprintf("%s/%s", $path, $view);
}

function component($component, $data = [])
{
    view(sprintf("components/%s", $component), $data);
}

function get_session($key)
{
    return $_SESSION[$key];
}

function start_session()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

function kill_session($name)
{
    if (get_session($name)) {
        unset($_SESSION[$name]);
    }
}

function is_edit_mode()
{
    if (isset($_GET['action'])) {
        if ($_GET['action'] === "edit") {
            return true;
        }
    }

    return false;
}
