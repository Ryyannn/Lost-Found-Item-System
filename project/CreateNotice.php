


<body>
    <head>
        <link rel="stylesheet" href="./CSS_files/CreateNotice.css">
    </head>
    <header>
        <h1 class = "notSelected"><a href = "./ViewNotice.php"> All Notice</a></h1>
        <h1 class = "selected">Create Notice</h1>
        <h1 class = "notSelected"><a href = "./ViewMyNotice.php">View My Notice</a></h1>
        <!-- <script src="login.js"></script>  -->
        <div class="dropdown">
            <button class="dropbtn">
                    <?php 
                        $userNickname = $_COOKIE['nickname'];
                        echo $userNickname; 
                    ?>
                <span class="arrow"></span>
            </button>
                <div class="dropdown-content">
                    <a href="./profile.php">Profile</a>
                    <a href="./login.php">Logout</a>
                </div>
        </div>
        
    </header>

    <main>
    <div class='profileContainer'>
        <form id="login_form" class="form_class" action="UpdateNotice.php" method="post">
            <div class='profileGroup'>
                <div class='divison'>
                    <h1 style='font-size: 15px;'>Status: </h1>
                    <select name="type" id="type">
                        <optgroup label="Status">
                            <option value="lost">Lost</option>
                            <option value="found">Found</option>
                        </optgroup>
                    </select>
                </div>
                <div class='divison' >
                    <h1 style='font-size: 15px;'>Date: </h1>
                    <input class="field_class" name="date" type="date" placeholder="date" autofocus>
                </div>
                <div class='divison'>
                    <h1 style='font-size: 15px;'>Venue</h1>
                    <input class="field_class" name="venue" type="text" placeholder="venue" autofocus>
                </div>
                <div class='divison'>
                    <h1 style='font-size: 15px;'>Contact: </h1>
                    <input class="field_class" name="contact" type="text" placeholder="contact number" autofocus>
                </div>
                <div class='divison'>
                    <h1 style='font-size: 15px;'>Description: </h1>
                    <input class="field_class" name="description" type="text" placeholder="description" autofocus>
                </div>
                <div class='divison'>
                    <h1 style='font-size: 15px;'>Image: </h1>
                    <input class="field_class" name="image" type="file" placeholder="image" autofocus>
                </div>
                <div>
                    <button class='editProfile' type='submit'>Create Notice</button>
                </div>
            </div>
        </form>
    </div>
    </main>