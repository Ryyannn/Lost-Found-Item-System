        <?php
            include "mysql-connect.php";
            $error = [];
            $success = 0;
            $duplicate = 0;
            for ($i = 0; $i < 7; $i++) {
                $error[$i] = null;
            }
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $connect = mysqli_connect($server, $user, $pw, $db);
                if (!$connect) {
                    die("Connection failesd: " . mysqli_connect_error());
                }

                $userID = $_POST['userID'];
                $nickname = $_POST['nickname'];
                $email = $_POST['email'];
                $gender = $_POST['gender'];
                $pw = $_POST['password'];
                $birthday = $_POST['birthday'];
                $proPic = $_POST['proPic'];
                if ($userID == '')
                    $error[0] = 'This field has to be filled!';
                if ($nickname == '')
                    $error[1] = 'This field has to be filled!';
                if ($email == '')
                    $error[2] = 'This field has to be filled!';
                if ($gender == '')
                    $error[3] = 'This field has to be filled!';
                if ($pw == '')
                    $error[4] = 'This field has to be filled!';
                if ($birthday == '')
                    $error[5] = 'This field has to be filled!';
                if ($proPic == '') {
                    $error[6] = 'This field has to be filled!';
                } else {
                    $extract = "SELECT * FROM user WHERE userID = '$userID'";
                    
            
                    $result = mysqli_query($connect, $extract);
                    if (mysqli_num_rows($result) > 0) {
                        // print($userID);
                        $duplicate = 1;
                        $remove = "DELETE FROM user WHERE userID = '$userID'";
                        mysqli_query($connect, $remove);
                    }

                    $insert1 = "INSERT INTO user (userID, nickname, email, gender, pw, birthday, proPic) VALUES ('$userID', '$nickname', '$email', '$gender', '$pw', '$birthday', '$proPic')";

                    setcookie("userId", $userID, time() + (86400 * 30), "/");
                    setcookie("nickname", $nickname, time() + (86400 * 30), "/");
                    setcookie("email", $email, time() + (86400 * 30), "/");
                    setcookie("password", $pw, time() + (86400 * 30), "/");
                    setcookie("birthday", $birthday, time() + (86400 * 30), "/");
                    setcookie("proPic", $proPic, time() + (86400 * 30), "/");
                    setcookie("gender", $gender, time() + (86400 * 30), "/");

                    if (mysqli_query($connect, $insert1)) {
                        $success = 1;
                    } 
                }
                    
                if ($success == 1) {

                    header("location:/project/ViewNotice.php");
                    // echo "<meta http-equiv = \"\refresh\"\ content = \"\0; url = ./ViewNotice.php\"\ />";
                } else {
                    if($duplicate == 1){
                        header("location:/project/UpdateProfile.php");
                    }
                
                }


                mysqli_close($connect);
            }
        ?>

