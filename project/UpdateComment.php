 
<html>
    <head>
        <title>MySQL Query</title>
    </head>

    <body>
        <?php
            // include $_SERVER['DOCUMENT_ROOT'] .'/project/SaveCookie.php';
            include "mysql-connect.php";
            $connect = mysqli_connect($server, $user, $pw, $db);
            if (!$connect) {
                die("Connection failesd: " .mysqli_connect_error());
            }
            

            $userID = $_COOKIE['userId'];
            $notiID = $_POST['button'];
            // $noticeID = 12341234;
            
            $comment = $_POST['comment'];
            $date = date("Y-m-d");
            $insert1 = "INSERT INTO comments (noticeID, userID, comment, commentDate) VALUES ('$notiID', '$userID', '$comment', '$date')";
           

            if (mysqli_query($connect, $insert1)) {
                header("location:/project/NoticeDetail.php?noticeID=$notiID");
                // print("hello");
                // echo "<meta http-equiv = \"\refresh\"\ content = \"\0; url = ./ViewNotice.php\"\ />";
            }else{
                // return a warning
                trigger_error("Update unsuccessful!", E_USER_ERROR);
            }

            mysqli_close($connect);
        ?>
    </body>
</html>
