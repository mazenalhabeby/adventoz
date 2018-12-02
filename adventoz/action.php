<?php
    // check If there`s no Error proceed the user add
    include 'connect.php';
           
        $sign_email =       $_POST['regsEmailPhp'];
        $sign_firstName =   $_POST['regsFnamePhp'];
        $sign_lastName =    $_POST['regsLnamePhp'];
        $sign_pass =        $_POST['regsPassPhp'];


        // Ckeck If User Exist in the Database

        $req_stmt = $con->prepare("SELECT email FROM users WHERE email = ?");
        $req_stmt->execute(array($sign_email));
        $count = $req_stmt->rowCount();

        if ($count > 0) {
            exit('<p class="success-style">this Email already exist</p>');
            } else {
            $data = [
                'firstname' => $sign_firstName,
                'lastname' => $sign_lastName,
                'email' => $sign_email,
                'pass' => sha1($sign_pass)
            ];
            $sql = "INSERT INTO users (firstname, lastname, email, pass) VALUES (:firstname, :lastname, :email, :pass)";
            $stmt= $con->prepare($sql);
            $stmt->execute($data);
            exit('<p class="success-style">success</p>');
        }
     
?>