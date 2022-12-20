<?php
    // delete cookie
    function delete($field){
        if (isset($_COOKIE[$field])) {
            unset($_COOKIE[$field]);
            setcookie($field, '', time() - 00, '/'); // empty value and old timestamp
        }
    }

    if (isset($_COOKIE["userId"])) {
        unset($_COOKIE["userId"]);
        setcookie('userId', '', time() - 7200, '/'); // empty value and old timestamp
    }

    if (isset($_COOKIE["nickname"])) {
        unset($_COOKIE["nickname"]);
        setcookie('nickname', '', time() - 7200, '/'); // empty value and old timestamp
    }

    if (isset($_COOKIE["email"])) {
        unset($_COOKIE["email"]);
        setcookie('email', '', time() - 7200, '/'); // empty value and old timestamp
    }

    if (isset($_COOKIE["password"])) {
        unset($_COOKIE["password"]);
        setcookie('password', '', time() - 7200, '/'); // empty value and old timestamp
    }

    if (isset($_COOKIE["proPic"])) {
        unset($_COOKIE["proPic"]);
        setcookie('proPic', '', time() - 7200, '/'); // empty value and old timestamp
    }

    if (isset($_COOKIE["birthday"])) {
        unset($_COOKIE["birthday"]);
        setcookie('birthday', '', time() - 7200, '/'); // empty value and old timestamp
    }

    if (isset($_COOKIE["gender"])) {
        unset($_COOKIE["gender"]);
        setcookie('gender', '', time() - 7200, '/'); // empty value and old timestamp
    }

    header("location:./login.php");
?>