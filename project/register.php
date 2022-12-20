<?php
    include $_SERVER['DOCUMENT_ROOT'] .'/project/registeration.php';
?>
<body>
    <header>
        <h1>Register Account</h1>
        <link rel="stylesheet" href="./CSS_files/register.css">
        <script src="login.js"></script> 
    </header>
    <main>
        <form id="register_form" class="form_class" action="" method="post">
            <div class="form_div">
                <table>
                    <tr>
                        <th><label>UserID:</label></th>
                        <th><input class="field_class" name="userID" type="text" placeholder="userID" autofocus></th>
                    </tr>
                    <tr>
                        <th>&nbsp;</th>
                        <th><p class="error_class"><?php echo $error[0] ?></p></th>
                    </tr>
                    <tr>
                        <th><label>Nickname:</label></th>
                        <th><input id="pass" class="field_class" name="nickname" type="text" placeholder="nickname"></th>
                    </tr>
                    <tr>
                        <th>&nbsp;</th>
                        <th><p class="error_class"><?php echo $error[1] ?></p></th>
                    </tr>
                    <tr>
                        <th><label>Email:</label></th>
                        <th><input id="pass" class="field_class" name="email" type="email" placeholder="email"></th>
                    </tr>
                    <tr>
                        <th>&nbsp;</th>
                        <th><p class="error_class"><?php echo $error[2] ?></p></th>
                    </tr>
                    <tr>
                        <th><label>Gender:</label></th>
                        <th><input id="pass" class="field_class" name="gender" type="text" placeholder="gender"></th>
                    </tr>
                    <tr>
                        <th>&nbsp;</th>
                        <th><p class="error_class"><?php echo $error[3] ?></p></th>
                    </tr>
                    <tr>
                        <th><label>Password:</label></th>
                        <th><input id="pass" class="field_class" name="password" type="password" placeholder="password"></th>
                    </tr>
                    <tr>
                        <th>&nbsp;</th>
                        <th><p class="error_class"><?php echo $error[4] ?></p></th>
                    </tr>
                    <tr>
                        <th><label>Profile Picture:</label></th>
                        <th><input id="pass" class="field_class" name="proPic" type="file"></th>
                    </tr>
                    <tr>
                        <th>&nbsp;</th>
                        <th><p class="error_class"><?php echo $error[5] ?></p></th>
                    </tr>
                    <tr>
                        <th><label>Birthday:</label></th>
                        <th><input id="pass" class="field_class" name="birthday" type="date"></th>
                    </tr>
                    <tr>
                        <th>&nbsp;</th>
                        <th><p class="error_class"><?php echo $error[6] ?></p></th>
                    </tr>
                    <tr>
                        <th>&nbsp;</th>
                        <th><button class="submit_class" type="submit" form="register_form" onclick="">submit</button></th>
                    </tr>
                    
                </table>
            </div>
        </form>
        
    </main>
    <footer>
        <p>Back to <a href="./login.php">Login</a> page</p>
    </footer>
</body>