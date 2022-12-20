<?php
    include $_SERVER['DOCUMENT_ROOT'] .'/project/SaveCookie.php';
?>
<body>
    <header>
        <h1>Login Page</h1>
        <link rel="stylesheet" href="./CSS_files/login.css">
    </header>
    <main>
        <form id="login_form" class="form_class" action="" method="post">
            <div class="form_div">
                <label>Login:</label>
                <input class="field_class" name="userID" type="text" placeholder="userID" autofocus>
                <label>Password:</label>
                <input id="pass" class="field_class" name="password" type="password" placeholder="password">
                <p style="color: red;"><?php echo $error ?></p>
                <button class="submit_class" type="submit">Login</button>
            </div>
        </form>
    </main>
    <footer>
        <p>Don't have an account yet? <a href="./register.php">Sign in</a></p>
    </footer>
</body>