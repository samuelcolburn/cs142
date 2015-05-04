<!-- ######################     Page header   ############################## -->
<header id="header-top">
    <a href="home.php">
        <div>
            <img src="pics/logo.gif" alt="logo">
            <h1>Burlington Animals</h1>
        </div>
    </a>
    <nav>
        <a href="home.php">home</a>
        <a href="petlist.php">pets</a>
    </nav>
    <section>
        <?php
        if ($_SESSION["user"]){
            print'<a class = "account" href = "user.php?user='.$session_username.' ">account</a>';
            if($_SESSION['admin']){
                print'<a class = "account admin" href = "admin.php">admin</a>';
            }
            print'<a class = "account" href = "logout.php">logout</a>';
        }
        else {
            print'<a class="account" href="login.php">sign in</a>';
        }
        ?>
    </section>
    <a id="scroll-top" href="#header-top"></a>
</header>