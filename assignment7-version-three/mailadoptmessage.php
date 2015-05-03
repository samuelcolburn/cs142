<?php
session_start(session_id());
if ($_SESSION["user"]) {
//get the pet name from ajax
    if (isset($_GET['petname'])) {
        $petname = htmlentities($_GET['petname']);
    }
    //include libraries
    require_once('../bin/lib/security.php');
    include "../bin/lib/validation-functions.php";
    include "../bin/lib/mail-message.php";
    require_once('../bin/myDatabase.php');
    //intialize the databse
    $dbUserName = 'smcolbur' . '_reader';
    $whichPass = "r"; //flag for which one to use.
    $dbName = strtoupper('smcolbur') . '_Product';
    $thisDatabase = new myDatabase($dbUserName, $whichPass, $dbName);
    //get username
    $user = htmlentities($_SESSION["user"], ENT_QUOTES, "UTF-8");
    //create data
    $data = array($user);
    //run query to database for user information
    $query = "SELECT `pmkUserId`, `fldEmail`, `fldUsername` FROM `tblUsers` WHERE fldUsername = ?";
    //store those results
    $user_results = $thisDatabase->select($query, $data);
    //store them in variables
    $user_username = $user_results[0]['fldUsername'];
    $user_email = $user_results[0]['fldEmail'];
    //get contact information for shelter
    $Contactquery = "SELECT  `fldPhoneNumber` , `fldShelterName`,  `fldStreetAdress`, `fldCity`, `fldState`, `fldZipCode` FROM `tblShelterInfo` WHERE 1";
    $Contactresults = $thisDatabase->select($Contactquery);
    //generate message for visitor
    $messageA = '<h2>Thank you for your Interest in ' . $petname . '!</h2>';
    $messageB = "<p>Dear " . $user_username . ",</p>"
            . "<p>All of our animals would love a forever home, I hope you're the lucky one to have a best friend for life!</p>"
            . "<p>We well try our best to get back to you shortly on your interest in " . $petname . "."
            . " If you have any further questions or would like to know more feel free to contact us any time or stop by the shelter and see these"
            . "beautiful animals in person! They always love a visit. </p>";
    $messageC = "<h3>Contact Infomation:</h3>";
    foreach ($Contactresults as $ContactInfo) {
        $ContactKeys = array_keys($ContactInfo);
        $key = array();
        foreach ($ContactInfo as $index => $value) {
            if (!is_int($index)) {
                if ($index == "fldPhoneNumber") {
                    $messageC.= "<p class = " . substr($index, 3) . ">Phone Number:" . $value . "</p>";
                } elseif ($index == "fldCity") {
                    $messageC.= "<span class = " . substr($index, 3) . ">" . $value . "</span>";
                } elseif ($index == "fldState") {
                    $messageC.= "<span class = " . substr($index, 3) . ">, " . $value . "</span>";
                } else {
                    $messageC.= "<p class = " . substr($index, 3) . ">" . $value . "</p>";
                }
            }
        }
    }
    //##############################################################
    //
            // email the notification to the user
    //
    $to = $user_email;
    $cc = "samuel.colburn@uvm.edu";
    $bcc = "";
    $from = "Burlington Animals <samuel.colburn@uvm.edu>";
    $subject = "Thank you for your Interest in " . $petname . "!";
    $mailed = sendMail($to, $cc, $bcc, $from, $subject, $messageA . $messageB . $messageC);
    
    
    if ($mailed) {
        $arr = array(
            'email' => $user_email,
        );
        echo json_encode($arr); 
        exit(); 
    }
}
?>