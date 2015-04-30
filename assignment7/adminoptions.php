<?php

if ($_SESSION["admin"]) {
    print "<div class = 'adminoptions'>";

    print "<h3>Admin Options</h3>";
    //EDIT BUTTON
    print ' <p class ="edit" onclick="location.href= ';
    print " 'addpet.php?id=" . $PetID . "' ";
    print ' " ><a href ="addpet.php?id=' . $PetID . '" >Edit</a></p>';


//DELETE BUTTON   
    print ' <p class ="delete" onclick="location.href= ';
    print " 'delete.php?id=" . $PetID . "&amp;table='tblProducts'";
    print ' " ><a href ="delete.php?id=' . $PetID . '&amp;table='
            . 'tblProducts'
            . '" >Delete</a></p>';




    print "</div>";
}
?>