<!--  2 -->

<?php

    $connection = mysqli_connect("localhost", "root", "  ", "phpdatabase");

    if (!$connection) {

        echo "will connect to MySQL.". mysqli_connect_error();

        exit();

    }

?>



<!--  3 -->

<?php

    $row = mysqli_fetch_object($result);

    $db_userid = $row->admin_id;

    $db_password = $row→admin_password;

    $encryptpasswd = sha1($userPasswd); 

    $db_name = $row->admin_name;



    if ($db_userid != $userid || $db_password != $encryptpasswd) {

        $query = "INSERT INTO administrator (admin_id, admin_password, admin_name)

                  VALUES ($db_userid, $encryptpasswd, $db_name)";

        $result = mysqli_query($connection, $query);

        if (!$result) {

            echo ("Insert to administrator failed. ". mysqli_error($connection));

            exit();

        }

    }

?>