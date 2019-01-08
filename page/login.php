<?php
require 'config.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = htmlentities($_POST['username']);
    $password = htmlentities($_POST['password']);

    $data = new Database;
    $data->setQuery('SELECT * FROM `credential`');
    $log = $data->fetchClass($username, $password, 5);

    if ($log) {
        echo 'LOGGED';
        session_start();
        $_SESSION['name'] = $log;
    } else {
        echo 'FAILED';
    }
}
