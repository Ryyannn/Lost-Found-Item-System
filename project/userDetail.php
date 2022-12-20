<?php
    // print($_GET["noticeID"]);
    include "mysql-connect.php";
    // $userNickname = $_COOKIE['nickname'];
    $connect = mysqli_connect($server, $user, $pw, $db);
    $userID = $_GET["userID"];
    // $userID = '000000';
    if (!$connect) {
        die("Connection failed: " .mysqli_connect_error());
    }
    $userQuery= "SELECT * FROM notices WHERE userID = $userID";
    // $userQuery= "SELECT * FROM notice WHERE noticeID = $userID";
    $result = mysqli_query($connect, $userQuery);
    if (!$result) {
        die("Connection failed: " .mysqli_connect_error());
    }

    $myNotices = array();
    if(mysqli_num_rows($result) > 0){
        while($i = mysqli_fetch_assoc($result)) {
            array_push($myNotices, $i);
        }
    }
    mysqli_close($connect);
?>
<!DOCTYPE html>
<body>
<header>
    <link rel="stylesheet" href="./CSS_files/userDetail.css">

    <h1 class = "notSelected"><a href = "./RegisteredUser.php">Registered User</a></h1>
    <h1 class = "notSelected"><a href = "./AllNotice.php">All Notices</a></h1>
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
                            <h3>Profile Picutre</h3>
                        </div>
                    <!-- </div> -->
        </div>
    <?php
        foreach($myNotices as $info){
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
    </div>
</main>
</body>