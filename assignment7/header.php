<!-- ######################     Page header   ############################## -->
<header>
    <div class =toolbar>
        <?php
        if ($_SESSION["user"]){
            print'<span class="login"> <a href = "user.php?user='.$session_username.' ">'.$session_username.'</a></span>';
            print'<span class="logout"><a href = "logout.php">Logout</a></span>';
        }
        else{ ?>
                <span class="logout"><a href ='register.php'>Register</a></span>
        <span class="login"><a href ='login.php'>Login</a></span>
            
            <?php
        }       ?>

    </div>
    <h1><a href = 'home.php'>Adopt a Pet</a></h1>
</header>