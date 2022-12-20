 
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
            $userQuery= "SELECT noticeID FROM notices";
            // $userQuery= "SELECT * FROM notice WHERE noticeID = $userID";
            $result = mysqli_query($connect, $userQuery);
            if (!$result) {
                die("Connection failed: " .mysqli_connect_error());
            }

            $existNoticeID = array();
            if(mysqli_num_rows($result) > 0){
                while($i = mysqli_fetch_assoc($result)) {
                    array_push($existNoticeID, $i);
                }
            }

            $userID = $_COOKIE['userId'];
            
          
            do{
                $duplicate = 0;
                $noticeID = rand(1,100);
                foreach($existNoticeID as $id){
                    if($noticeID == $id){
                        $duplicate = 1;
                    }

                }
            }  while($duplicate == 1);

            // $noticeID = 12341234;
            
            $type = $_POST['type'];
            $date = $_POST['date'];
            $venue = $_POST['venue'];
            $contact = $_POST['contact'];
            $description = $_POST['description'];
            $img = $_POST['image'];
            $insert1 = "INSERT INTO notices (noticeID, userID,type, date, venue, contact, description, image) VALUES ($noticeID, '$userID', '$type', '$date', '$venue', '$contact', '$description', '$img')";
           

            if (mysqli_query($connect, $insert1)) {
                header("location:/project/ViewNotice.php");
                // echo "<meta http-equiv = \"\refresh\"\ content = \"\0; url = ./ViewNotice.php\"\ />";
            }else{
                // return a warning
                trigger_error("Update unsuccessful!", E_USER_ERROR);
                header("location:/project/CreateNotice.php");
            }

            mysqli_close($connect);
        ?>
    </body>
</html>
