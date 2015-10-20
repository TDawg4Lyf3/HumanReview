// Created by TDawg4Lyf3 in 2015
// Just something i was thinking about, nothing special.
// Not debugged, i am not that good at PHP, just to show the idea.

<html>
    <head>
        <?php
            $personid = $_GET['id'];
            $servername = "localhost";
            $username = "username";
            $password = "password";
            $dbname = "dbname";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $query2 = "SELECT name, rating, text FROM reviews_$personid";
            $result1 = $conn->query("SELECT name, sex, age, imagelink, averagerating FROM data_$personid");
            $result2 = $conn->query("SELECT name, rating, text FROM reviews_$personid");
            $result3 = $conn->query("SELECT badgename, why FROM badges_$personid");
            $result1proc = mysqli_fetch_assoc($result1);
            $name = $result1proc[1];
            $sex = $result1proc[2];
            $age = $result1proc[3];
            $imagelink = $result1proc[4];
            $averagerating = $result1proc[5];
        ?>
        <title>HumanAdvisor - Rating people since 2015</title>
    </head>
    <body>
        <h1 style="font-style: italic; text-align: center;">HumanAdvisor</h1>
        <div style="background:#eee;border:1px solid #ccc;padding:5px 10px;">
            <h2>Profile of <?php echo $name ?></h2>
            <p><img alt="" img="" src="<?php $imagelink ?>" /></p>
            <p>Age: <?php echo $age ?></p>
            <p>Sex: <?php echo $sex ?></p>
            <p>Average Rating: <?php echo $averagerating ?></p>
            <h3>Badges</h3>
            <?php
                if (mysqli_num_rows($result3) > 0) {
                    while($row = mysqli_fetch_assoc($result3)) {
                        echo '<div style="background:#eee;border:1px solid #ccc;padding:5px 10px;">
                        <h5>Badge name: '.$row[1].'</h5>
                        <p>'.$row[2].'</p>
                        </div>';
                    }
                } else {
                    echo '<div style="background:#eee;border:1px solid #ccc;padding:5px 10px;"><p>Is not stupid or cool, nobody really knows him.</p></div>';
                }
            ?>
        </div>
        <h2>Ratings of <?php echo $name ?></h2>
        <p><a href="writereview.php?id=<?php $personid ?>">Post a rating?<a></p>
        <?php
            if (mysqli_num_rows($result2) > 0) {
                while($row = mysqli_fetch_assic($result2)) {
                    if ($row[1] == "") {
                        $name = "Anonymous";
                    } else {
                        $name = $row[1]
                    }
                    echo '<div style="background:#eee;border:1px solid #ccc;padding:5px 10px;">
                    <h5>Name of writer: $name</h5>
                    <h5>Rating: '.$row[2].'</h5>
                    <p>'.$row[3].'</p>
                    </div>';
                }
            } else {
                echo '<div style="background:#eee;border:1px solid #ccc;padding:5px 10px;">No reviews yet, he is not really famous i guess...</div>';
            }
        ?>
    </body>
</html>
<?php
    $conn -> close();
?>
