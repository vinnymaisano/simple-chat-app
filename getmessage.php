<?php
    require_once("connect.php");

    $name = mysqli_escape_string($db, $_GET["name"]);

    $sql = 'SELECT MESSAGE FROM CHAT WHERE NAME= \'' . $name . '\'';
    $query = mysqli_query($db, $sql);

    $row = $query->fetch_assoc();
    $message = $row["MESSAGE"];

    
    if (mysqli_errno($db)) {
        print "Error getting message.";
    }
    else if (mysqli_affected_rows($db) == 0) {
        print "Invalid name.";
    }
    else {
        print $message;
    }
    
?>