// Created by TDawg4Lyf3 in 2015
// Just something i was thinking about, nothing special.
// Not debugged, i am not that good at PHP, just to show the idea.

<?php
    // Function isImage() got from post of Emil H. in StackOverflow
    function isImage($url)
    {
        $params = array('http' => array(
            'method' => 'HEAD'
        ));
        $ctx = stream_context_create($params);
        $fp = @fopen($url, 'rb', false, $ctx);
        if (!$fp) 
            return false;

        $meta = stream_get_meta_data($fp);
        if ($meta === false)
        {
            fclose($fp);
            return false;
        }

        $wrapper_data = $meta["wrapper_data"];
        if(is_array($wrapper_data)){
            foreach(array_keys($wrapper_data) as $hh){
                if (substr($wrapper_data[$hh], 0, 19) == "Content-Type: image")
                {
                    fclose($fp);
                    return true;
                }
            }
        }
        fclose($fp);
        return false;
    }
    
    $name = $_GET['name'];
    $age = $_GET['age'];
    $sex = $_GET['sex'];
    $imagelink = $_GET['imagelink'];
    
    if (isImage($imagelink) == false or $imagelink == ">AwesomeAssMemes") {
        // I was bored... Yeah, you can replace this with the things in comments
        $number = rand(0,12);
        if ($number == 0) {
            $imagelink = "http://i2.kym-cdn.com/entries/icons/original/000/000/007/rickroll.jpg";
        }
        if ($number == 1) {
            $imagelink = "http://i3.kym-cdn.com/entries/icons/original/000/013/564/aP2dv.gif";
        }
        if ($number == 2) {
            $imagelink = "http://i0.kym-cdn.com/entries/icons/original/000/010/496/asdf.jpg";
        }
        if ($number == 3) {
            $imagelink = "http://i0.kym-cdn.com/entries/icons/original/000/017/529/b_chan.png";
        }
        if ($number == 4) {
            $imagelink = "http://i1.kym-cdn.com/entries/icons/original/000/000/139/pools-closed.jpg";
        }
        if ($number == 5) {
            $imagelink = "http://i3.kym-cdn.com/entries/icons/original/000/000/225/yotsuba.gif";
        }
        if ($number == 6) {
            $imagelink = "http://i1.kym-cdn.com/entries/icons/original/000/000/087/Boxxy_Sweet.jpg";
        }
        if ($number == 7) {
            $imagelink = "http://i2.kym-cdn.com/entries/icons/original/000/015/182/diary.JPG";
        }
        if ($number == 8) {
            $imagelink = "http://i1.kym-cdn.com/entries/icons/original/000/017/248/superbowl_shark.jpg";
        }
        if ($number == 9) {
            $imagelink = "http://i0.kym-cdn.com/entries/icons/original/000/001/593/peopledie.jpg";
        }
        if ($number == 10) {
            $imagelink = "http://i1.kym-cdn.com/photos/images/original/000/996/144/e0f.jpg";
        }
        if ($number == 11) {
            $imagelink = "http://i2.kym-cdn.com/entries/icons/original/000/017/104/0e9.jpg";
        }
        if ($number == 12) {
            $imagelink = "http://i0.kym-cdn.com/entries/icons/original/000/002/830/sad_frog.jpg";
        } 
        // Replace the code above with this if you don't want no memes up until the if statement with the isImage function
        // $imagelink = "";
        // You can do a picture of your choice in this variable
    }
    if ($name == "") {
        die("Why don't you just get a name"); 
    }
    if ($age == "") {
        $age = "Not specified";
    }
    if ($sex == "") {
        $sex = "Not specified";
    }
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "dbname";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT id FROM people";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $id = $result->num_rows + 1;
    } else {
        $id = 0;
    }
    
    $sql2 = "CREATE TABLE data_$id (
    id INT() UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(40) NOT NULL,
    age VARCHAR(14) NOT NULL,
    sex VARCHAR(14) NOT NULL,
    imagelink VARCHAR() NOT NULL,
    averagerating INT() NOT NULL
    )
    INSERT INTO data_$id (id, name, age, sex, imagelink)
    VALUES ($id, $name, $age, $sex, $imaeglink, 2.5)
    CREATE TABLE review_$id (
    name VARCHAR(40) PRIMARY KEY,
    rating INT(),
    text VARCHAR()
    )
    CREATE TABLE badges_$id (
    badgename VARCHAR(30) PRIMARY KEY,
    why VARCHAR()
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Done! Please click <a href="person.php?$id">here</a>;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>
