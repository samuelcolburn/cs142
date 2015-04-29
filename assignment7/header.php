<!-- ######################     Page header   ############################## -->
<header>
    <div class =toolbar>
        <?php
        if ($_SESSION["user"]){
            print'<span class="login"><a href = "user.php?user='.$session_username.' ">'.$session_username.'</a></span>';
            print'<span class="register"><a href = "logout.php">Logout</a></span>';
        }
        else{ ?>
                
        <span class="login"><a href ='login.php'>Login</a></span>
        <span class="register"><a href ='register.php'>Register</a></span>  
            <?php
        }       ?>

    </div>
    <h1><a href = 'home.php'>Burlington Animal Shelter</a></h1>
    <h4>Suck a Dick!</h4>
</header>