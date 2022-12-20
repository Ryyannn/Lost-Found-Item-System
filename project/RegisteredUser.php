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
    $userQuery= "SELECT a.userID, a.nickname, a.email, a.pw, a.birthday, a.gender, a.proPic, a.countNoti, count(comments.userID) AS countCom 
    FROM (SELECT user.*, COUNT(notices.userID) AS countNoti FROM user LEFT JOIN notices ON user.userID = notices.userID 
    GROUP BY user.userID)a LEFT JOIN comments ON comments.userID = a.userID GROUP BY a.userID ORDER BY a.nickname;";
    $result = mysqli_query($connect, $userQuery);
    if (!$result) {
        die("Connection failed: " .mysqli_connect_error());
    }

    $userInfo = array();
    if(mysqli_num_rows($result) > 0){
        while($i = mysqli_fetch_assoc($result)) {
            array_push($userInfo, $i);
        }
    }

    mysqli_close($connect);
?>

<body>
<header>
    <link rel="stylesheet" href="./CSS_files/RegisteredUser.css">

    <h1 class = "selected">Registered User</h1>
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
                            <h3>UserID</h3>
                        </div>
                        <div class='textContent'>
                            <h3>Nickname</h3>
                        </div>
                        <div class='textContent'>
                            <h3>Email</h3>
                        </div>
                        <div class='textContent'>
                            <h3>Password</h3>
                        </div>
                        <div class='textContent'>
                            <h3>Birthday</h3>
                        </div>
                        <div class='textContent'>
                            <h3>Gender</h3>
                        </div>
                        <div class='textContent'>
                            <h3>Notices Related</h3>
                        </div>
                        <div class='textContent'>
                            <h3>Comments Related</h3>
                        </div>
                        <div class='thumbnail'>
                            <h3>Profile Picutre</h3>
                        </div>
                    <!-- </div> -->
        </div>
    <?php
        foreach($userInfo as $info){
            $id = $info["userID"];
            $nickname = $info["nickname"];
            $email = $info["email"];
            $gender = $info["gender"];
            $pw = $info["pw"];
            $birthday = $info["birthday"];
            $proPic = $info["proPic"]; 
            $countNoti = $info['countNoti'];
            $countComm = $info['countCom'];

        
        
        echo"
        <a style='color:black;' href='./userDetail.php?userID=$id'>
        <div class='userGroup'>
                    <!-- <div class='noticeGroupLeft'> -->
                    <!-- </div> -->
                    <!-- <div class='noticeGroupRight'> -->
                        <div class='textContent'>
                            <h3>$id</h3>
                        </div>
                        <div class='textContent'>
                            <h3>$nickname</h3>
                        </div>
                        <div class='textContent' style='max-width: 150px'>
                            <h4>$email</h4>
                        </div>
                        <div class='textContent'>
                            <h3>$pw</h3>
                        </div>
                        <div class='textContent'>
                            <h3>$birthday</h3>
                        </div>
                        <div class='textContent'>
                            <h3>$gender</h3>
                        </div>
                        <div class='textContent'>
                            <h3>$countNoti</h3>
                        </div>
                        <div class='textContent'>
                            <h3>$countComm</h3>
                        </div>
                        <div class='thumbnail'>
                            <h3 ><img height='150px' width='150px' src='$proPic' alt='' class='has-mask'/></h3>
                        </div>
                    <!-- </div> -->
        </div>";
        }
    ?>
    </div>
</main>

<!-- <h3 ><img height='150px' width='150px' src='$proPic' alt='' class='has-mask'/></h3> -->