// Created by TDawg4Lyf3 in 2015
// Just something i was thinking about, nothing special.
// Not debugged, i am not that good at PHP, just to show the idea.

<html>
    <head>
        <?php
            $id = $_GET['id']
        ?>
        <title>HumanReview - Rating people since 2015</title>
    </head>
    <body>
        <h1 style="text-align: center;"><em>HumanReview</em></h1>
        <h2>Post review</h2>
        <form action="inputdata.php?<?php $id ?>" method="post" name="input">
            <p>Name: &nbsp;&nbsp;<input maxlength="30" name="name" size="30" type="text" /></p>
            <p>Rating: &nbsp;<select name="rating" size="10"><option value="1">Worst person ever</option><option value="1.5">Terrible</option><option value="2">Kind of terrible</option><option value="2.5">Average</option><option value="3">Kind of cool</option><option value="3.5">Pretty awesome</option><option value="4">Cool</option><option value="4.5">Very awesome</option><option value="5">MLG Pro</option></select></p>
            <p>Review:&nbsp;<textarea cols="5" name="review" rows="5" style="margin: 2px; width: 450px; height: 112px;"></textarea></p>
            <input type="submit">
        </form>
    </body>
</html>
