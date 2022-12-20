<?php
    // include $_SERVER['DOCUMENT_ROOT'] .'/project/SaveCookie.php';

    // print($_GET["noticeID"]);
    include "mysql-connect.php";
    // $userNickname = $_COOKIE['nickname'];
    $connect = mysqli_connect($server, $user, $pw, $db);
    // $userID = $_COOKIE["userId"];
    if (!$connect) {
        die("Connection failed: " .mysqli_connect_error());
    }
    $found= "SELECT * FROM notices WHERE type = 'found'";
    $lost= "SELECT * FROM notices WHERE type = 'lost'";

    // $userQuery= "SELECT * FROM notice WHERE noticeID = $userID";
    $result1 = mysqli_query($connect, $found);
    $result2 = mysqli_query($connect, $lost);
    if (!$result1 || !$result2) {
        die("Connection failed: " .mysqli_connect_error());
    }

    $foundInfo = array();
    if(mysqli_num_rows($result1) > 0){
        while($i = mysqli_fetch_assoc($result1)) {
            array_push($foundInfo, $i);
        }
    }

    $lostInfo = array();
    if(mysqli_num_rows($result2) > 0){
        while($i = mysqli_fetch_assoc($result2)) {
            array_push($lostInfo, $i);
        }
    }
    mysqli_close($connect);
?>

<body>
<header>
    <link rel="stylesheet" href="./CSS_files/userDetail.css">

    <h1 class = "notSelected"><a href = "./RegisteredUser.php">Registered User</a></h1>
    <h1 class = "selected">All Notices</h1>
    <!-- <script src="login.js"></script>  -->
    <div class="dropdown">
        <button class="dropbtn">Admin
            <span class="arrow"></span>
        </button>
            <div class="dropdown-content">
                <a href="./profile.php">Profile</a>
                <a href="./logout.php">Logout</a>
            </div>
    </div>
</header>
<main>
<div class='typeClass'>
    <h1 style='background-color: red; border-radius: 5px; padding:10px 10px;'>Lost</h1>
</div>
<div class="container">
        <div class='titleGroup'>
                    <!-- <div class='noticeGroupLeft'> -->
                    <!-- </div> -->
                    <!-- <div class='noticeGroupRight'> -->
                        <div class='textContent'>
                            <h3>NoticeID</h3>
                        </div>
                        <div class='textContent'>
                            <h3>UserID</h3>
                        </div>
                        <div class='textContent'>
                            <h3>Type</h3>
                        </div>
                        <div class='textContent'>
                            <h3>venue</h3>
                        </div>
                        <div class='textContent'>
                            <h3>date</h3>
                        </div>
                        <div class='textContent' >
                            <h3 style="width: 120px;">description</h3>
                        </div>
                        <div class='textContent'>
                            <h3>contact<h3>
                        </div>
                        <div class='thumbnail'>
                            <h3>Image</h3>
                        </div>
                    <!-- </div> -->
        </div>
    <?php
        foreach($lostInfo as $info){
                $id = $info["noticeID"];
                $UserID = $info['userID']; 
                $type = $info["type"];
                $date = $info["date"];
                $venue = $info["venue"];
                $contact = $info["contact"];
                $description = $info["description"];
                $image = $info["image"]; 
        
        
        echo"
        <div class='userGroup'>
                    <!-- <div class='noticeGroupLeft'> -->
                    <!-- </div> -->
                    <!-- <div class='noticeGroupRight'> -->
                    <div class='textContent'>
                        <h3>$id</h3>
                    </div>
                    <div class='textContent'>
                        <h3>$UserID</h3>
                    </div>
                    <div class='textContent'>
                        <h3>$type</h3>
                    </div>
                    <div class='textContent'>
                        <h3>$venue</h3>
                    </div>
                    <div class='textContent'>
                        <h3>$date</h3>
                    </div>
                    <div class='textContent'>
                        <p style='width: 120px;'>$description<p>
                    </div>
                    <div class='textContent'>
                        <h3>$contact<h3>
                    </div>
                    <div class='thumbnail'>
                        <h3><img height='150px' width='150px' src='$image' alt='' class='has-mask'/></h3>
                    </div>
        </div>";
        }
    ?>
    </div>
 <div class='typeClass'>
    <h1 style='background-color: greenyellow; border-radius: 5px; padding:10px 10px;'>Found</h1>
</div>
<div class="container">
        <div class='titleGroup'>
                    <!-- <div class='noticeGroupLeft'> -->
                    <!-- </div> -->
                    <!-- <div class='noticeGroupRight'> -->
                        <div class='textContent'>
                            <h3>NoticeID</h3>
                        </div>
                        <div class='textContent'>
                            <h3>UserID</h3>
                        </div>
                        <div class='textContent'>
                            <h3>Type</h3>
                        </div>
                        <div class='textContent'>
                            <h3>venue</h3>
                        </div>
                        <div class='textContent'>
                            <h3>date</h3>
                        </div>
                        <div class='textContent' >
                            <h3 style="width: 120px;">description</h3>
                        </div>
                        <div class='textContent'>
                            <h3>contact<h3>
                        </div>
                        <div class='thumbnail'>
                            <h3>Image</h3>
                        </div>
                    <!-- </div> -->
        </div>
    <?php
        foreach($foundInfo as $info){
                $id = $info["noticeID"];
                $UserID = $info['userID']; 
                $type = $info["type"];
                $date = $info["date"];
                $venue = $info["venue"];
                $contact = $info["contact"];
                $description = $info["description"];
                $image = $info["image"]; 
        
        
        echo"
        <div class='userGroup'>
                    <!-- <div class='noticeGroupLeft'> -->
                    <!-- </div> -->
                    <!-- <div class='noticeGroupRight'> -->
                    <div class='textContent'>
                        <h3>$id</h3>
                    </div>
                    <div class='textContent'>
                        <h3>$UserID</h3>
                    </div>
                    <div class='textContent'>
                        <h3>$type</h3>
                    </div>
                    <div class='textContent'>
                        <h3>$venue</h3>
                    </div>
                    <div class='textContent'>
                        <h3>$date</h3>
                    </div>
                    <div class='textContent'>
                        <p style='width: 120px;'>$description<p>
                    </div>
                    <div class='textContent'>
                        <h3>$contact<h3>
                    </div>
                    <div class='thumbnail'>
                        <h3><img height='200px' width='200px' src='$image' alt='' class='has-mask'/></h3>
                    </div>
        </div>";
        }
    ?>
</main>