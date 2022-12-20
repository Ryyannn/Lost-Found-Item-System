<?php
    include 'mysql-connect.php';
    $error = '';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $connect = mysqli_connect($server, $user, $pw, $db);
        $userId = $_POST['userID'];
        $password = $_POST['password'];
        $s = "SELECT * FROM  user WHERE BINARY userID = '$userId' && BINARY pw = '$password'";
        $result = mysqli_query($connect, $s);
        if(mysqli_num_rows($result) == 1){
            while($i = mysqli_fetch_assoc($result)) {
                setcookie("userId", $i["userID"], time() + (86400 * 30), "/");
                setcookie("nickname", $i["nickname"], time() + (86400 * 30), "/");
                setcookie("email", $i["email"], time() + (86400 * 30), "/");
                setcookie("password", $i["pw"], time() + (86400 * 30), "/");
                setcookie("birthday", $i["birthday"], time() + (86400 * 30), "/");
                setcookie("proPic", $i["proPic"], time() + (86400 * 30), "/");
                setcookie("gender", $i["gender"], time() + (86400 * 30), "/");
            }

            if($userId == "admin" && $password == "adminpass"){
                header("location:RegisteredUser.php");
            }else{
                header("location:ViewNotice.php");
            }
        }else{
            $error = 'UserID or Password is not correct!';
            // header("location:login.php");
        }
    }
?>