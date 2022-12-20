<?php
    // print($_GET["noticeID"]);
    $userID = $_COOKIE['userId'];
    $userPic = $_COOKIE['proPic'];
    $userNickname = $_COOKIE['nickname'];
    include "mysql-connect.php";
    $connect = mysqli_connect($server, $user, $pw, $db);
    $noticeID = $_GET["noticeID"];
    if (!$connect) {
        die("Connection failed: " .mysqli_connect_error());
    }
    $userQuery= "SELECT notices.*, user.* FROM notices INNER JOIN user ON notices.userID = user.userID WHERE notices.noticeID = $noticeID";
    $commentQuery = "SELECT user.nickname as 'nickname', user.proPic as 'propic', comments.comment as 'comment', comments.commentDate as 'date' FROM comments INNER JOIN user on user.userID = comments.userID WHERE comments.userID = '$userID' AND comments.noticeID = '$noticeID';";
    $result = mysqli_query($connect, $userQuery);
    $result2 =  mysqli_query($connect, $commentQuery);
    $haveData = 0;
    if(mysqli_num_rows($result2) == 0){
        $haveData = 1;

    }
    if (!$result || !$result2) {
        die("Connection failed: " .mysqli_connect_error());
    }


    $myNotices = array();
    if(mysqli_num_rows($result) > 0){
        while($i = mysqli_fetch_assoc($result)) {
            array_push($myNotices, $i);
        }
    }

    $myComment = array();
    if(mysqli_num_rows($result) > 0){
        while($i = mysqli_fetch_assoc($result2)) {
            array_push($myComment, $i);
        }
    }


    mysqli_close($connect);
?>
<!DOCTYPE html>
<body>
<header>
    <link rel="stylesheet" href="./CSS_files/NoticeDetail.css">

    <h1 class = "notSelected"><a href = "./ViewNotice.php"> All Notice</h1>
    <h1 class = "notSelected"><a href = "./CreateNotice.php">Create Notice</a></h1>
    <h1 class = "notSelected"><a href = "./ViewMyNotice.php">View My Notice</h1>
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

    <div style="padding: 50px 30px">
        <h1>Notice Detail</h1>
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
                    $class =  "background-color:green;";
                }

                echo"
                <div class='noticeGroup'>
                    <div class='noticeRow'>
                        <div class='notice'>
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
                        <div class='commentSession'>";
                
                    foreach($myComment as $comment){
                        $nickname = $comment['nickname'];
                        $propic = $comment['propic'];
                        $commentDescription = $comment['comment'];
                        $date = $comment['date'];
                    
                        echo"    
                            <div class='comment'>
                                    <div class='commentLeft'>
                                        <div class='thumbnail'>
                                            <h1><img height='100px' width='100px' src='$propic' alt='' class='proPic'/></h1>
                                        </div>
                                    </div>
                                    <div class='commentRight'>
                                        <div class='noticeText'>
                                            <h2>$nickname</h2>
                                            <div class='noticeTextRight'>
                                                <h5 class='dateClass'>Post Date: $date</h5>
                                            </div>
                                        </div>
                                        <p>$commentDescription</p>
                                    </div>
                                </div>";
                        
                    }
                echo"  
                            <div class='addComment'>
                            <div class='commentLeft'>
                                <div class='thumbnail'>
                                    <h1><img height='100px' width='100px' src='$userPic' alt='' class='proPic'/></h1>
                                </div>
                            </div>
                            <form action='UpdateComment.php' method='post'>
                            <div class='commentRight'>
                                <input class='commentBox' name='comment' type='text' placeholder='Add Comment'>
                                <h6 style='color: rgb(236, 236, 236);' name='noti'>$noticeID</h6>
                                <button class='submit' name='button' value='$noticeID' type='submit'>Post</button>
                            </div>
                            </form>
                        </div>
                    
                        </div>  
                    </div>
                </div>
                ";
            }


        ?> 
    </div>

    </main> 
</body>