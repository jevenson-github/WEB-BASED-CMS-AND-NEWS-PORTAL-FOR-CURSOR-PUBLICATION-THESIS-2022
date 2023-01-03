<?php
    require 'dbConnect.php';

    $query = "SELECT * FROM contents LEFT OUTER JOIN staffs ON contents.author = staffs.staffID WHERE slug='" .$_GET['slug']. "' AND stage='Published'";
    $result = mysqli_query($dbConnect, $query);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            # ARTICLE CONTENT
            $title = $row['title'];
            $section = $row['section'];
            $timestamp = $row['timestamp'];
            $leadVisual = $row['leadVisual'];
            $leadText = $row['leadText'];
            $content = $row['content'];
            $image = $row['image'];
            $slug = $row['slug'];
            
            # AUTHOR CONTENT
            $author = $row['fName'] . " " . $row['lName'];
            $image = $row['image'];
            $position = $row['position'];
            $username = $row['username'];
        }
    }

    else {
        header('HTTP/1.1 404 Not Found'); //This may be put inside err.php instead
            $_GET['e'] = 404; //Set the variable for the error code (you cannot have a
                                // querystring in an include directive).
            //include 'err.php';
            exit; //Do not do any more work in this script.
    }
