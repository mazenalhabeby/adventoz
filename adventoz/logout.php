<?php

    Session_start(); // Start the Session

    session_unset(); // Unset the Session

    session_destroy (); // Destroy the Session

    header('Location: index.php');

    exit();