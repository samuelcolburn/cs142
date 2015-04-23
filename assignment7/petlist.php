<?php
include "top.php";


$debug = false;

if (isset($_GET["debug"])) { // ONLY do this in a classroom environment
    $debug = true;
}

if ($debug)
    print "<p>DEBUG MODE IS ON</p>";
// if the admin is viewing the product list, have 'add a product' link at the top of the page

if ($_SESSION["admin"]) {
    print "<p><a href = 'addproduct.php'>Add a Pet</a></p>";
}





$yourURL = $domain . $phpSelf;


//Get all product data to be displayed
$query = "SELECT pmkProductID as 'ID' , fldProductName as 'Name' , fldPrice as 'Price' , fldDescription as 'Description' , fldImage as 'Image' , fldCategoryName as 'Category' FROM tblProducts,tblCategories WHERE fnkCategoryID = pmkCategoryID ";
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



//PAGE TITLE
print "<h2>Pets</h2>";

//PET COUNTER
$numberRecords = count($results);
print "<h3>Total Pets: " . $numberRecords . "</h3>";

//MAIN ARTICLE
print "<article id=main>";



// PET SECTIONS LOOP
foreach ($results as $pet) {
    if ($debug) {
        print_r($pet);
    }

    $PetID = $pet[0];

        //make each pet section clickable, with class as their species
      print ' <section class =" '. $pet[5] .'" onclick="location.href= ';
      print " 'pet.php?id=".$PetID."' ";
      print ' " >';
     
    foreach ($pet as $key => $value) {

        //indexed array skips the int value doubling   
        if (!is_int($key) && $key != "ID" && $key != "Category") {

            //create a div for each field/value pair with class of the field
            print "<div class='" . $key . "'>\n";

            //image check
            if ($key == "Image") {
                print "<img src='" . $value . "' height=200 width=266>";
            } 
            
            
            else {
                print $value . "\n";
            }

            print "</div>\n";
            
        }
        
    }
    print "</section>\n";
    
}





if ($debug)
    print "<p>END OF PROCESSING</p>";
?>
</article>
<?php
include "footer.php";
?>
</body>
</html>
