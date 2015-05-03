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
    $PetID = htmlentities($_GET["id"], ENT_QUOTES, "UTF-8");
// @@@@ SQL @@@
//Select product from tblProducts with the given productID
    $data = array($PetID);
    $query = "SELECT pmkProductID , fldProductName as 'fldPetName' , fldDob as 'fldAge' , fldBreed , fldGender ,  fldImages , fldDescription , fldSize , fldDateSubmitted , fldCategoryName as 'fldCategory' FROM tblProducts,tblCategories WHERE pmkProductID = ? AND pmkCategoryID = fnkCategoryID ";
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
    include "adminoptions.php";
    if ($debug) {
        print "<p>pmk = " . $PetID . "</p>";
    }
//@@@@ DISPLAY RESULTS @@@@
// check if their username is the same as the person logged in, or if admin.
// only display account information if its the user or the admin.
// PET INFO LOOP
    foreach ($results as $petdata) {
        /*
          if ($debug) {
          print_r($pet);
          }
         */
        //get all key values
        $petkeys = array_keys($petdata);
        /*
          if ($debug) {
          print_r($petkeys);
          }
         * 
         */
        $key = array();
        foreach ($petkeys as $index => $value) {
            if (!is_int($value)) {
                $key[] = substr($value, 3);
            }
        }
        if ($debug) {
            print_r($key);
            print_r($petdata);
        }
        //make array of valid pet data
        foreach ($petdata as $field => $value) {
            if (!is_int($field)) {
                if ($field == "fldImages" && empty($value)) {
                    $pet[] = 'pics/dog-silhouette-hi.png';
                }
                //if its empty, add a placeholder
                elseif (empty($value)) {
                    $pet[] = "Unknown";
                } else {
                    $pet[] = $value;
                }
            }
        }
        if ($debug) {
            print_r($pet);
        }
        //create pet page
        //title of the page is the name of the pet
        print "<h2 id='pet-name'>" . $pet[1] . "</h2>";
        print ' <main class = petinfo >';
        //Images and facts column
        print "<section>";
        print '<div id="owl-demo" class="owl-carousel owl-theme">';
        if ($handle = opendir($pet[5])) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    $img = $pet[5] . $entry;
                    list($width, $height) = getimagesize($img);
                    print "<div class ='item'><img src='" . $img . "' alt ='" . $pet[1] . "'></div>";
                }
            }
            closedir($handle);
        } elseif ($pet[9] == "dog") {
            print "<img src='pics/dog_placeholder.png'width=250 alt ='" . $pet[1] . "'>";
        } else {
            print "<img src='pics/cat_placeholder.jpg'width=250 alt ='" . $pet[1] . "'>";
        }
        print "</div>";
        //Facts section
        print"<aside>";
        print "<ol class ='PetFacts' >";
        //age div
        print "<li class = '" . $key[2] . "'>";
        //get age from birthdate
        print "<span>" . $key[2] . "</span>";
        $birthDate = $pet[2];
        $birthDate = explode("-", $birthDate);
        if ($birthDate[0] >= date("Y")) {
            $age = date("w", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]));
            print $age . " weeks old";
        } elseif ($birthDate[0] < date("Y")) {
            $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md") ? ((date("Y") - $birthDate[0]) - 1) : (date("Y") - $birthDate[0]));
            if ($age < 1) {
                $age = (12 - ($birthDate[1] - date("m")));
                print $age . " months old";
            } else {
                print $age . " years old";
            }
        }
        print "</li>";
        //breed
        print "<li class = '" . $key[3] . "'>";
        print "<span>" . $key[3] . "</span>" . $pet[3];
        print "</li>";
        //gender
        print "<li class = '" . $key[4] . "'>";
        print "<span>" . $key[4] . "</span>";
        if ($pet[4] == 1) {
            print "Male";
        } else {
            print "Female";
        }
        print "</li>";
        //size
        print "<li class = '" . $key[7] . "'>";
        print "<span>Weight</span> " . $pet[7];
        if($pet[7] != "Unknown"){ print " lbs";}
        print "</li>";
        print "</ol>";
        //description div
        print "<div class = '" . $key[6] . "'>";
        print "<p>";
        print $pet[6];
        print "</p>";
        print "</div>";
        print "</aside>";
        print "</section>";
        //ADOPTION BUTTON
        //make each pet section clickable, with class as their species
        print ' <p class ="adopt-me">Adopt Me!</p>';
        print "</main>\n";
    }
    //@@@@@@@@@@@@@@@ ADOPT ME POPOUT
    //  When the adopt button is clicked, this window pops out to the user
   
    print "<section class = 'message'>";
    print "<h3>Interested in having a best friend?</h3>";
    
    
     /*  @@@@@@@ removed contact information, shows in email
      * 
    $Contactquery = "SELECT  `fldPhoneNumber` , `fldShelterName`,  `fldStreetAdress`, `fldCity`, `fldState`, `fldZipCode` FROM `tblShelterInfo` WHERE 1";
    $Contactresults = $thisDatabase->select($Contactquery);
    foreach ($Contactresults as $ContactInfo) {
        $ContactKeys = array_keys($ContactInfo);
        $key = array();
        foreach ($ContactKeys as $index => $value) {
            if (!is_int($value)) {
                $key[] = substr($value, 3);
            }
        }
        if ($debug) {
            print "<p>contact results</p>";
            print_r($Contactresults);
            print "<p>contact keys</p>";
            print_r($key);
        }
        //  Show Shelter phone # and address to all interested visitors
        print "<div class = AdoptContactInfo>";
        print "<h4>Contact Us:</h4>";
        foreach ($ContactInfo as $index => $value) {
            if (!is_int($index)) {
                if ($index == "fldState" || $index == "fldCity") {
                    print "<span class = " . substr($index, 3) . ">" . $value . "</span>";
                } else {
                    print "<p class = " . substr($index, 3) . ">" . $value . "</p>";
                }
            }
        }
        print "</div>";
    }
    */
    
    print "<h4 class='message-or'>Or</h4>";
    // If they are logged in, ask if they are interested in the pet.
    //  If yes, email them & admin, if no, close window
    if ($_SESSION["user"]) {
        print "<p class='EmailButton'>Email</p>";
    } else {
        //if they arent logged in, ask them to login or register
        print "<p class='EmailButton-login'><a href='login.php'>Email</a></p>";
    }
    print "<p class='cancel'>Cancel</p>";
    print "</section>";
    ?>

    <section class='after-message'>
        <h3>Thank you!</h3>
        <div class="AdoptContactInfo">
            <h4>An email has been sent to:</h4>
            <p id="message-email"></p>
        </div>
        <p class="cancel">Close</p>
    </section>
    
    <?php
//@@@@@@@@ PET COMMENTS @@@@@@@@@
    print"<h3 id='pet-comments-title'>Comments</h3>\n";
    print "<section class = Comments>";
//create data array
    $data = array($PetID);
//build query
    $query = 'SELECT fldText , fldUsername  ,  fldDateSubmitted , fnkUserID ';
    $query .= " FROM tblComments, tblUsers ";
    $query .= " WHERE fnkUserID = pmkUserId ";
    $query .= "AND fnkProductID = ? ";
    $query .=" ORDER BY fldDateSubmitted DESC";
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
            print "<a href = user.php?id=" . $comment[3] . ">" . $comment[1] . "</a></span>";
            //date posted span
            print "<span class='Date'>\n";
            print "Posted: " . $comment[2] . "</span>";
            //if the same user as logged in, added edit/delete buttons
            if ($session_username == $comment[1]) {
                
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
        print"<p><a href='login.php'>Login</a> to Comment!</p>";
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