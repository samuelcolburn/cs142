<?php
//this is a  page to display a user's profile.
include "top.php";



$debug = false;

if (isset($_GET["debug"])) { // ONLY do this in a classroom environment
    $debug = true;
}

if ($debug)
    print "<p>DEBUG MODE IS ON</p>";

$message = '<h2> ACCESS DENIED</h2>';

print '<article>';

if ($_SESSION["admin"]) {

    $message = "<p><a href = 'userlist.php'>User List</a></p>";
    $message .= " <p><a href = 'petlist.php'>Pet List</a></p>";
 //   $message .="<p><a href = 'addproduct.php'>Add a Product</a></p>";
 //   $message .="<p><a href = 'addcategory.php'>Add a Product Category</a></p>";
    $message .="<p><a href = 'categorylist.php'>Pet Types</a></p>";
}//ending if admin else clause
//
//~~~~~~ print relevant message
print $message;


if ($debug)
    print "<p>END OF PROCESSING</p>";
?>
</article>
<?php include "footer.php"; ?>
</body>
</html>
