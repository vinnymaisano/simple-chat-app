<?php
    require_once("connect.php");

    $username = mysqli_escape_string($db, $_GET["username"]);
    $password = mysqli_escape_string($db, $_GET["password"]);
    $message = mysqli_escape_string($db, $_GET["message"]);

    $sql = 'SELECT * FROM CHAT WHERE NAME = \'' . $username . '\' AND PASSWORD = \'' . $password . '\'';
    $query = mysqli_query($db, $sql);

    if ($query->num_rows == 0) {
        print "Invalid name or password, could not send.";
        exit();
    }
    

    $sql = 'UPDATE CHAT SET MESSAGE = \'' . $message . '\' WHERE NAME = \'' . $username . '\' AND PASSWORD = \''. $password . '\'';
    $query = mysqli_query($db, $sql);

    
    if (mysqli_errno($db)) {
        print "Error sending message.";
    }
    else {
        print "Message updated.";
    }
?>