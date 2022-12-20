<?php
    // print($_GET["noticeID"]);
    include "mysql-connect.php";
    $userNickname = $_COOKIE['nickname'];
    $connect = mysqli_connect($server, $user, $pw, $db);
    $userID = $_COOKIE["userId"];
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
    <link rel="stylesheet" href="./CSS_files/ViewNotice.css">

    <h1 class = "notSelected"><a href = "./ViewNotice.php"> All Notice</h1>
    <h1 class = "notSelected"><a href = "./CreateNotice.php">Create Notice</a></h1>
    <h1 class = "selected">View My Notice</h1>
    <!-- <script src="login.js"></script>  -->
    <div class="dropdown">
        <button class="dropbtn"><?php echo $userNickname; ?>
            <span class="arrow"></span>
        </button>
            <div class="dropdown-content">
                <a href="./profile.php">Profile</a>
                <a href="./logout.php">Logout</a>
            </div>
    </div>
</header>
<main>

    <div style="padding: 50px 150px">
        <h1 style="font-family: Rockwell Nova; letter-spacing: .5vw;">My Notice</h1>
    </div>
    
    <div class="noticeContainer">
        <?php
            foreach($myNotices as $notice){
                $id = $notice["noticeID"];
                $type = $notice["type"];
                $date = $notice["date"];
                $venue = $notice["venue"];
                $contact = $notice["contact"];
                $description = $notice["description"];
                $image = $notice["image"]; 
                if($type == 'lost'){
                    $class =  "background-color:red;";
                } else {
                    $class =  "background-color:greenyellow;";
                }

                echo"
                <a style='color:black;' href='./NoticeDetail.php?noticeID=$id'>
                <div class='noticeGroup'>
                    <div class='noticeGroupLeft'>
                        <div class='thumbnail'>
                                <h1><img height='200px' width='200px' src='$image' alt='' class='has-mask'/></h1>
                        </div>
                    </div>
                    <div class='noticeGroupRight'>
                        <div class='textContent'>
                            <div class='noticeText'>
                                <h1 class='typeClass' style='$class'>$type</h1>
                                <div class='noticeTextRight'>
                                    <h5 class='dateClass'>Post Date: $date</h5>
                                </div>
                            </div>
                            <h3>Venue: $venue</h3>
                            <h3>Contact: $contact</h3>
                            <p style='color: rgb(203, 203, 203)'>$description</p>
                        </div>
                    </div>
                </div>
                </a>
                ";
            }
        ?>
    
    </div>
    </main> 
</body>