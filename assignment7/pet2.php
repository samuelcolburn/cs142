<?php
//this is a  page to display a product.
include "top.php";



$debug = false;

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

    $query = "SELECT pmkProductID , fldProductName as 'fldPetName' , fldImages, fldDob as 'fldAge' , fldDescription , fldDateSubmitted , fldCategoryName as 'fldCategory' FROM tblProducts,tblCategories WHERE pmkProductID = ? AND pmkCategoryID = fnkCategoryID ";

//@@@ STORE  results
    $results = $thisDatabase->select($query, $data);
    /* /@@@ STORE  results
      $ProductName = $results[0]["fldProductName"];
      $Description = $results[0]["fldDescription"];
      $DateSubmitted = $results[0]["fldDateSubmitted"];
      $Dob = $results[0]["fldDob"];
      $Image = $results[0]["fldImages"];
      $CategoryID = $results[0]["fnkCategoryID"];
      $CategoryName = $results[0]["fldCategoryName"];
     */


    if ($debug) {
        print "<p>data:</p>";
        print_r($data);
        print "<p>query:</p>";
        print $query;
        print "<p>results:</p>";
        print_r($results);
    }

//basic tags
    print "<article id=main>";

// print edit and delete buttons only if user or admin 
    if ($_SESSION["admin"]) {
        print "<div class = 'adminoptions'>";


//EDIT BUTTON
        print ' <p class ="edit" onclick="location.href= ';
        print " 'addpet.php?id=" . $pmkProductID . "' ";
        print ' " >Edit</p>';



//DELETE BUTTON   
        print ' <p class ="delete" onclick="location.href= ';
        print " 'delete.php?id=" . $pmkProductID . "' ";
        print ' " >Delete</p>';



        print "</div>";
    }



    if ($debug) {
        print "<p>pmk = " . $pmkProductID . "</p>";
    }




//@@@@ DISPLAY RESULTS @@@@
// check if their username is the same as the person logged in, or if admin.
// only display account information if its the user or the admin.
// PET INFO LOOP
    foreach ($results as $pet) {
        if ($debug) {
            print_r($pet);
        }

        //get all key values
        $petkeys = array_keys($pet);

        if($debug){
        print_r($petkeys);
        }
        
        $key = array();
        foreach($petkeys as $index => $value){
            if(!is_int($value)){
            $key[] = substr($value,3);
            }
        }
        
        if($debug){
        print_r($key);
        }

        //create pet page
        //title of the page is the name of the pet
        print "<h2>" . $pet[1] . "</h2>";
        
        print ' <section class ="petinfo" >';
        
        //image column
        print "<main>";
        print "<div class = ".$key[2].">";
        print "<img src='" . $pet[2] . "' height=200 width=266 alt ='" . $pet[1] . "'>";
        print "</div>";
                //age div
        print "<div class = ".$key[3].">";
                    //get age from birthdate
                    $birthDate = $pet[3];

                    $birthDate = explode("-", $birthDate);

                    if ($birthDate[0] >= date("Y")) {
                        $age = date("w", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]));
                        print $age . " weeks old.";
                    } elseif ($birthDate[2] < date("Y")) {
                        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md") ? ((date("Y") - $birthDate[0]) - 1) : (date("Y") - $birthDate[0]));
                        print $age . " years old";
                    }
                    
        print "</div>";
        print "</main>";
        //description column
        print "<aside>";
        

        
        //description div
        print "<div class = ".$key[4].">";
        
        print "<p>";
        
        print $pet[4];
        
        print "</p>";
        
        print "</div>";
        
        
          //ADOPTION BUTTON
    //make each pet section clickable, with class as their species
    print ' <p class ="AdoptMe" onclick="location.href= ';
    print " 'adopt.php?id=" . $pmkProductID . "' ";
    print ' " >Adopt Me!</p>';

        print "</aside>";       

        print "</section>\n";
    }
  
//@@@@@@@@ PET COMMENTS @@@@@@@@@
    print"<h3>Comments</h3>\n";
    print "<section class = Comments>";

//create data array
    $data = array($pmkProductID);

//build query
    $query = 'SELECT fldText , fldUsername  ,  fldDateSubmitted ';
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
            print "<section class ='comment'>\n";

            //comment text
            print "<p class ='Text'>";
            print $comment[0];
            print "</p>";

            //username & date box
            print "<p class = 'CommentInfo'>";

            //username span
            print "<span class='Username'>\n";
            print $comment[1] . "</span>";

            //date posted span
            print "<span class='Date'>\n";
            print $comment[2] . "</span>";


            //if the same user as logged in, added edit/delete buttons
            if ($session_username == $comment[1]) {
                print "<span class = 'CommentDelete' >";
                print "<a href=''>Delete</a>";
                print "</span>";

                print "<span class = 'CommentEdit' >";
                print "Edit";
                print "</span>";
            }


            print "</p>";

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


    print "</section>";
} else {
    print "<p>Sorry, that product cannot be found.</p>";
}

if ($debug)
    print "<p>END OF PROCESSING</p>";
?>
</article>

<?php
//@@ FOOTER @@
include "footer.php";
?>


</body>
</html>