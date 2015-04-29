<?php
include "top.php";


$debug = false;

if (isset($_GET["debug"])) { // ONLY do this in a classroom environment
    $debug = true;
}

if ($debug)
    print "<p>DEBUG MODE IS ON</p>";
// if the admin is viewing the product list, have 'add a product' link at the top of the page







$yourURL = $domain . $phpSelf;


//Get all product data to be displayed
$query = "SELECT pmkProductID as 'ID' , fldProductName as 'Name' , fldDob as 'Age' , fldDescription as 'Description' , fldImages as 'Image' , fldCategoryName as 'Category' FROM tblProducts,tblCategories WHERE fnkCategoryID = pmkCategoryID ";
$data = array();
$results = $thisDatabase->select($query, $data);



//QUERY CHECK DEBUG
if ($debug) {
    print "<p> query: </p>";
    print $query;
    print "<p> username: </p>";
    print $username;

    print "<p> results: </p>";
    print_r($results);
    print $results[0]['Image'];
}





//MAIN ARTICLE
print "<article id=main>";
//PAGE TITLE
print "<h2>Pets</h2>";

// PET COUNTER
$numberRecords = count($results);
print "<h3>Total Pets: " . $numberRecords . "</h3>";


//@@@@@@@@ ADMIN ONLY BUTTONS
if ($_SESSION["admin"]) {
    print "<div class = 'adminoptions'>";
    print "<p class = 'edit'><a href = 'addpet.php'>Add</a></p>";
    print "</div>";
}

print "<section id = petlist>";



// @@@@@@@@@ PET SECTIONS LOOP
foreach ($results as $pet) {
    if ($debug) {
        print_r($pet);
    }

    $PetID = $pet[0];

    //make each pet section clickable, with class as their species
    print ' <section class =" ' . $pet[5] . '" onclick="location.href= ';
    print " 'pet.php?id=" . $PetID . "' ";
    print ' " >';

    foreach ($pet as $key => $value) {

        //indexed array skips the int value doubling   
        if (!is_int($key) && $key != "ID" && $key != "Category" && $key != "Description") {

            //create a div for each field/value pair with class of the field name
            print "<div class='" . $key . "'>\n";

            //image check
            if ($key == "Image") {
                if ($handle = opendir($value)) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    $img = $value . $entry;
                    list($width, $height) = getimagesize($img);
                    print "<img src='" . $img . "' height=200 width=266 alt ='" . $pet[1] . "'>";
                }
            }
            closedir($handle);
        }
            }

            //Date of birth check
            elseif ($key == "Age") {
                //date in yyyy-mm-dd
                $birthDate = $value;

                //explode the date to get month, day and year
                $birthDate = explode("-", $birthDate);


                
                //get age from birthdate
                if ($birthDate[0] >= date("Y")) {
                    $age = date("w", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]));
                    print $age . " weeks old";
                } elseif ($birthDate[2] < date("Y")) {
                    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md") ? ((date("Y") - $birthDate[0]) - 1) : (date("Y") - $birthDate[0]));
                    print $age . " years old";
                }
            } 
            else {
                print $value . "\n";
            }

            print "</div>\n";
        }
    }
    if ($_SESSION["admin"]) {
        print "<div class = 'adminoptions'>";


  //EDIT BUTTON
        print ' <p class ="edit" onclick="location.href= ';
        print " 'addpet.php?id=" . $PetID . "' ";
        print ' " ><a href ="addpet.php?id='.$PetID.'" >Edit</a></p>';


//DELETE BUTTON   
        print ' <p class ="delete" onclick="location.href= ';
        print " 'delete.php?id=" . $PetID . "' ";
        print ' " ><a href ="delete.php?id='.$PetID.'" >Delete</a></p>';




        print "</div>";
    }
    print "</section>\n";
}


print "</section>";





if ($debug)
    print "<p>END OF PROCESSING</p>";
?>
</article>
<?php
include "footer.php";
?>
</body>
</html>
