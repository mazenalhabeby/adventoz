<?php

    include 'connect.php';

    //Routes

        $tpl    = 'includes/tpl/'; // Template Directory
        $lang   = 'includes/lang/'; // languages Directory
        $func   = 'includes/func/'; // functions Directory
        $css    = 'layout/css/'; // Stylesheet Directory
        $js     = 'layout/js/'; // javascript Directory
        $img    = 'layout/Images/'; // images Directory


    // include all the Important Files

        include $func . 'functions.php';
        include $lang .'english.php';
        include $tpl . 'header.php';

    // Include NavBar on all pages expect the one with $nonavbar var

        if (!isset($noNavbar)) { include $tpl . "navbar.php"; }