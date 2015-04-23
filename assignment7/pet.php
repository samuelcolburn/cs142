<?php
//this is a  page to display a product.
include "top.php";



$debug = true;

if (isset($_GET["debug"])) { // ONLY do this in a classroom environment
    $debug = true;
}

if ($debug)
    print "<p>DEBUG MODE IS ON</p>";


//get username
if (isset($_GET["id"])) {

    //sanitize username
    $pmkProductID = htmlentities($_GET["id"], ENT_QUOTES, "UTF-8");

    // @@@@ SQL @@@
    //Select product from tblProducts with the given productID
    $data = array($pmkProductID);

    $query = "SELECT pmkProductID , fldProductName , fldDescription , fldDateSubmitted , fldPrice , fldImage, fldCategoryName as 'fldCategory' FROM tblProducts,tblCategories WHERE pmkProductID = ? AND pmkCategoryID = fnkCategoryID ";

    //@@@ STORE  results
    $results = $thisDatabase->select($query, $data);
    //@@@ STORE  results
    $results = $thisDatabase->select($query, $data);
    $ProductName = $results[0]["fldProductName"];
    $Description = $results[0]["fldDescription"];
    $DateSubmitted = $results[0]["fldDateSubmitted"];
    $Price = $results[0]["fldPrice"];
    $Image = $results[0]["fldImage"];
    $CategoryID = $results[0]["fnkCategoryID"];
    $CategoryName = $results[0]["fldCategoryName"];

    if ($debug) {

        print "<p>Product:</p>";
        print_r($data);
        print $query;
        print_r($results);
    }

    //basic tags
    print "<article id=main>";

    //title of the page is the name of the user
    print "<h2>" . $ProductName . "</h2>";
    // print edit and delte buttons only if user or admin 
    if ($_SESSION["admin"]) {
        print"<p><a href = addproduct.php?id=" . $pmkProductID . ">Edit</a></p>";

        print"<p><a href = 'delete.php?id=" . $pmkProductID . "&amp;table=tblProducts'>DELETE</a></p>";
    }



    if ($debug) {
        print "<p>pmk = " . $ProductID . "</p>";
    }




    //@@@@ DISPLAY RESULTS @@@@
    // check if their username is the same as the person logged in, or if admin.
    // only display account information if its the user or the admin.



    print "<section class = petinfo>";
    foreach ($results as $key => $value) {

        //indexed array skips the int value doubling   
        if (!is_int($key) && $key != "ID" && $key != "Category") {

            //create a div for each field/value pair with class of the field
            print "<div class='" . $key . "'>\n";

            //image check
            if ($key == "fldImage") {
                print "<img src='" . $value . "' height=200 width=266>";
            } 
            
            
            else {
                print $value . "\n";
            }

            print "</div>\n";
            
        }
        
    }
    print "</section>\n";


//@@@@@@@@ PET COMMENTS @@@@@@@@@
    print"<h3>Comments</h3>\n";

    //create data array
    $data = array($pmkProductID);

    //build query
    $query = 'SELECT  fldRating , fldText , fldUsername  ,  fldDateSubmitted ';
    $query .= " FROM tblComments, tblUsers ";
    $query .= " WHERE fnkUserID = pmkUserId ";
    $query .= "AND fnkProductID = ? ";
    $query .=" ORDER BY fldDateSubmitted ";

    //execute query
    $comments = $thisDatabase->select($query, $data);

    if (!empty($comments)) {
        
        //@@@@ DEBUG
        if ($debug) {

            print "<p>Product:</p>";
            print_r($data);
            print "<p>query:" . $query . "</p>";
            print_r($results);
        }
        
        //@@@@ COMMENTS
        foreach ($comments as $comment) {
            if ($debug) {
                print_r($comment);
            }

            $CommentID = $comment[0];

            //make each pet section clickable, with class as their species
            print ' <section class =" ' . $pet[5] . '" >';

            foreach ($comment as $key => $value) {

                //indexed array skips the int value doubling   
                if (!is_int($key)) {
                    $key = substr($key, 3);
                    //create a div for each field/value pair with class of the field
                    print "<div class='" . $key . "'>\n";

                    print "<p>" . $key . ":</p>";
                    print "<p>" . $value . "</p>";


                    print "</div>\n";
                }
            }

            print "</section>\n";
        }
    } else {
        print"<p>No comments yet!</p>";
    }
    if ($_SESSION["user"]) {
        include "comment.php";
    } else {
        print"<p><a href='login.php'>Login</a> or <a href='register.php'>Register</a> to Comment!</p>";
    }
} else {
    print "<p>Sorry, that product cannot be found.</p>";
}
//@@ FOOTER @@
include "footer.php";

if ($debug)
    print "<p>END OF PROCESSING</p>";
?>
</article>
</body>
</html>