// Created by TDawg4Lyf3 in 2015
// Just something i was thinking about, nothing special.
// Not debugged, i am not that good at PHP, just to show the idea.

<?php
    $id = $_GET['id'];
    $name = $_GET['name'];
    $rating = $_GET['rating'];
    $review = $_GET['rating'];
    
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "databasename";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql1 = "SELECT averagerating FROM data_$id";
    $sql2 = "SELECT rating FROM reviews_$id";
    $result1 = $conn->query($sql1);
    $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0) {
        $ratingcalc = ($averagerating * $result2->num_rows) + $rating;
        $ratingcalcfinal = $ratingcalc / ($result2->num_rows + 1);
        $sql4 = "UPDATE data_$id SET averagerating=$ratingcalcfinal WHERE id=1";
    } else {
        $sql4 = "UPDATE data_$id SET averagerating=$rating WHERE id=1";
    }
    if ($conn->query($sql4) === FALSE) {
        $conn->close();
        die('Error while editing database');
    }
    
    $sql3 = "INSERT INTO reviews_$id (name, rating, text)
    VALUES ($name, $rating, $text)";
    
    if ($conn->query($sql3) === TRUE) {
        echo "Review created successfully";
    } else {
        echo "Error while editing database";
    }
    $conn->close();
?>
