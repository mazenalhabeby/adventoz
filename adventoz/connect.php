<?php
/**
 * Created by PhpStorm.
 * User: Damir
 * Date: 8/20/2018
 * Time: 12:16 AM
 */
    $dsn = 'mysql:host=localhost;dbname=adventoz';
    $user = 'root';
    $pass = '';
    $option = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    );

    try {
        $con = new PDO($dsn, $user, $pass, $option);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    catch(PDOException $e) {
        echo 'Failed To Connent ' . $e->getMessage();
    }
