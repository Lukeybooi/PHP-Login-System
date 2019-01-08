<?php
require 'config.php';

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['first_name']) && isset($_POST['last_name'])) {
    $username = htmlentities($_POST['username']);
    $password = htmlentities($_POST['password']);
    $first_name = htmlentities($_POST['first_name']);
    $last_name = htmlentities($_POST['last_name']);

    try {
        $data = new Database;
        $data->setQuery('SELECT `Username` FROM `credential`');
        if (!$data->fetchUsername($username)) {
            $data->setQuery("INSERT INTO `credential` (`Username`, `Password`, `First_Name`, `Last_Name`) VALUES ('{$username}', '{$password}', '{$first_name}', '{$last_name}')");
            echo 'INSERTED';
        } else {
            echo 'EXISTS';
        }
    } catch (PDOExeption $ex) {
        echo 'FAILED';
    }
}
