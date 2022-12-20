<?php
    // include $_SERVER['DOCUMENT_ROOT'] .'/project/SaveCookie.php';

    // print($_GET["noticeID"]);
    include "mysql-connect.php";
    $nickname = $_COOKIE['nickname'];
    $connect = mysqli_connect($server, $user, $pw, $db);
    $id = $_COOKIE["userId"];
    $email = $_COOKIE["email"];
    $gender = $_COOKIE["gender"];
    $birthday = $_COOKIE["birthday"];
    $propic = $_COOKIE["proPic"];
    $gender = $_COOKIE["gender"];
    // if (!$connect) {
    //     die("Connection failed: " .mysqli_connect_error());
    // }
    // $userQuery= "SELECT * FROM user WHERE nickname = $userNickname";
    // // $userQuery= "SELECT * FROM notice WHERE noticeID = $userID";
    // $result = mysqli_query($connect, $userQuery);
    // if (!$result) {
    //     die("Connection failed: " .mysqli_connect_error());
    // }

    // $userInfo = array();
    // if(mysqli_num_rows($result) > 0){
    //     while($i = mysqli_fetch_assoc($result)) {
    //         array_push($userInfo, $i);
    //     }
    // }
    // mysqli_close($connect);
?>
<body>
    <head>
        <link rel="stylesheet" href="./CSS_files/profile.css">
    </head>
    <header>
        <h1 class = "notSelected"><a href = "./ViewNotice.php"> All Notice</a></h1>
        <h1 class = "notSelected"><a href = "./CreateNotice.php">Create Notice</a></h1>
        <h1 class = "notSelected"><a href = "./ViewMyNotice.php">View My Notice</a></h1>
        <!-- <script src="login.js"></script>  -->
        <div class="dropdown">
            <button class="dropbtn"><?php echo $nickname; ?>
                <span class="arrow"></span>
            </button>
                <div class="dropdown-content">
                    <a href="./profile.php">Profile</a>
                    <a href="./login.php">Logout</a>
                </div>
        </div>
        
    </header>

    <main>
    <?php
        // foreach($userInfo as $info){
        //     $id = $info["userID"];
        //     $nickname = $info["nickname"];
        //     $email = $info["email"];
        //     $gender = $info["gender"];
        //     $pw = $info["pw"];
        //     $birthday = $info["birthday"];
        //     $proPic = $info["proPic"]; 
        // }
        
        echo "<div class='profileContainer'>
            <div class='profileGroup'>
                <div class='divison'>
                    <h1><img height='200px' width='200px' src='$propic' alt='' class='has-mask'/></h1>
                </div>
                <div class='divison' >
                    <h1 style='font-size: 15px;'>$id</h1>
                </div>
                <div class='divison'>
                    <h1 style='font-size: 15px;'>$nickname</h1>
                </div>
                <div class='divison'>
                    <h1 style='font-size: 15px;'>$email</h1>
                </div>
                <div class='divison'>
                    <h1 style='font-size: 15px;'>$gender</h1>
                </div>
                <div class='divison'>
                    <h1 style='font-size: 15px;'>$birthday</h1>
                </div>
                <div>
                    <button class='editProfile' type='button' onclick=''><a href='./UpdateProfile.php' style='color: black; font-family: Candara;'>Edit Profile<a></button>
                </div>
            </div>
        </div>";

        ?>
    </main>