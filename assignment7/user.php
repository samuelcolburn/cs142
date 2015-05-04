<?php
//this is a  page to display a user's profile.
include "top.php";
print "<article id=main>";
$debug = false;
if (isset($_GET["debug"])) { // ONLY do this in a classroom environment
    $debug = true;
}
if ($debug)
    print "<p>DEBUG MODE IS ON</p>";
//get username
if (isset($_GET["user"])) {
    //sanitize username
    $username = htmlentities($_GET["user"], ENT_QUOTES, "UTF-8");
    //basic tags
    
    //title of the page is the name of the user
    print "<h2>" . $username . "</h2>";
    if ($debug) {
        print "<p>username = " . $username . "</p>";
    }
    // @@@@ SQL @@@
    //Select user from tblUsers with the given username
    $data = array($username);
    $query = "SELECT fldUsername , fldEmail , fldDateJoined , pmkUserId FROM tblUsers WHERE fldUsername = ?";
    //@@@ STORE  results
    $results = $thisDatabase->select($query, $data);
    $UserID = $results[0]["pmkUserId"];
    if ($debug) {
        print "<p>pmk=" . $UserID . "</p>";
        print "<p>query = " . $query . "</p>";
        print "<p>data:</p>";
        print_r($data);
         print "<p>results:</p>";
        print_r($results);
    }
    //@@@@ DISPLAY RESULTS @@@@
    // check if their username is the same as the person logged in, or if admin.
    // only display account information if its the user or the admin.
    if ($_SESSION["user"] == $username Or $_SESSION["admin"]) {
        print "<section class = userinfo>";
        print "<h3> Account Information </h3>";
        print "<section>";
        foreach ($results as $row) {
            foreach ($row as $field => $value) {
                if (!is_int($field) && $field != "pmkUserId") {
                    $field = preg_replace(' /(?<! )(?<!^)(?<![A-Z])[A-Z]/', ' $0', substr($field, 3));
                    print "<p class =' " . $field . " ' >";
                    print '<span class="field" >';
                    print $field;
                    print "</span>";
                    print '<span class="value" >'. $value;
                    print "</span>";
                    print"</p>";
                }
            }
        }
         print"</section>";
            print"</section>";
    }
 
    //@@@ Select information from tblProfile connected to the user @@@
    $data = array($UserID);
    $query = "SELECT fldFirstName, fldLastName , fldGender , fldAge , fldAboutMe  FROM tblProfile WHERE fnkUserId = ? ";
    //@@@ STORE  query results @@@
    $results = $thisDatabase->select($query, $data);
    // @@@@ DISPLAY PROFILE RESULTS @@@
    if ($debug) {
        print "<p>pmk=" . $UserID . "</p>";
        print "<p>query = " . $query . "</p>";
        print_r($data);
        print_r($results);
    }
    if (empty($results)) {
        print "<p>You haven't created a profile yet! Click the edit button below to create one.</p>";
    } else {
        print "<section class = personalinfo>";
        print "<h3>Personal Profile</h3>";
           print"<section>";
        foreach ($results as $row) {
            foreach ($row as $field => $value) {
                if (!is_int($field)) {
                    $field = preg_replace(' /(?<! )(?<!^)(?<![A-Z])[A-Z]/', ' $0', substr($field, 3));
                    print "<p class ='".$field."'>";
                    print "<span class='field' >" . $field . "</span>";
                    print "<span class='value' >" . $value . "</span>";
                    print"</p>\n";
                }
            }
        }
    }
       print"</section>";
    print"</section>";
    // print edit and delte buttons only if user or admin 
    if ($_SESSION["user"] == $username Or $_SESSION["admin"]) {
        print "<section class = user-admin-options>";
        print"<p><a href = edituser.php?user=" . $username . ">Edit</a></p>";
        print"<p><a href = 'delete.php?id=" . $UserID . "&amp;table=tblUsers' >DELETE</a></p>";
        print "</section>";
    }
}
if ($debug)
    print "<p>END OF PROCESSING</p>";
?>
</article>
<?php include "footer.php"; ?>
</body>
</html>