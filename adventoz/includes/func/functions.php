<?php


/*
 ** Title Function (change the Title page with th page of the page
*/

    function getPageName() {
        global $pageTitle;
        if (isset($pageTitle)) {
            echo $pageTitle;
        } else {
            echo 'Default';
        }
    }
/*
** Check Items Function
*/

    function checkItem($select, $from, $value) {

        global $con;

        $statment = $con->prepare("SELECT $select FROM $from WHERE $select = ?");

        $statment->execute(array($value));

        $con = $statment->rowCount();

    }
