<?php
    session_Start();
    $pageTitle = 'New Feeds';
    if (isset($_SESSION['user'])) {
        include 'init.php';

        $stmt = $con->prepare("SELECT * FROM Users");
        $stmt->execute();
        $count = $stmt->fetchAll();

        include 'search.php';

    } else {

        header('Location: index.php');

        exit();

    };?>
<?php
include $tpl . 'footer.php'; ?>
