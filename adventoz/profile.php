<?php
    session_Start();
    $pageTitle = 'profile';
    if (isset($_SESSION['user'])) {
        include 'init.php';

        include 'profile.html';

    } else {

        header('Location: index.php');

        exit();

    };?>
<?php
include $tpl . 'footer.php'; ?>