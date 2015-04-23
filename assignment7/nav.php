<!-- ######################     Main Navigation   ########################## -->
<nav>
    <ol>
        <?php
        /* HOME */
        if ($path_parts['filename'] == "home") {
            print '<li><a href="home.php">Home</a></li>';
        } else {
            print '<li><a href="home.php">Home</a></li>';
        }

        /* PRODUCT LIST PAGE */
        if ($path_parts['filename'] == "petlist") {
            print '<li><a href="petlist.php">Pets</a></li>';
        } else {
            print '<li><a href="petlist.php">Pets</a></li>';
        }
         /* PRODUCT LIST PAGE */
        if ($path_parts['filename'] == "about") {
            print '<li><a href="about.php">About</a></li>';
        } else {
            print '<li><a href="about.php">About</a></li>';
        }
        
        /* ADMIN PAGE */
        if ($_SESSION["admin"]) {
            if ($path_parts['filename'] == "admin") {
                print '<li><a href="admin.php">Admin</a></li>';
            } else {
                print '<li><a href="admin.php">Admin</a></li>';
            }
        }
        ?>
    </ol>
</nav>