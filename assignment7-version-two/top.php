<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Adopt a Pet</title>
        <meta charset="utf-8">
        <meta name="author" content="Sam Colburn">
        <meta name="description" content="Adopt a Pet">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--[if lt IE 9]>
        <script src="//html5shim.googlecode.com/sin/trunk/html5.js"></script>
        <![endif]-->


        <!-- Important Owl stylesheet -->
        <link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="assets/owl-carousel/owl.carousel.css">

        <!-- Default Theme -->
        <link rel="stylesheet" href="assets/owl-carousel/owl.theme.css">

        <link rel="stylesheet" href="style.css" type="text/css" media="screen">

        <!-- Jquery Library -->
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>


        <!-- Include js plugin -->
        <script src="assets/owl-carousel/owl.carousel.js"></script>

 <!-- Include javascript file -->
        <script src="javascript.js"></script>
        <script src="content-filter.js"></script>



        <?php
        // Start the session
        session_start();
        $debug = false;

// %^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// PATH SETUP
//
//  $domain = "https://www.uvm.edu" or http://www.uvm.edu;

        $domain = "http://";
        if (isset($_SERVER['HTTPS'])) {
            if ($_SERVER['HTTPS']) {
                $domain = "https://";
            }
        }
        $server = htmlentities($_SERVER['SERVER_NAME'], ENT_QUOTES, "UTF-8");
        $domain .= $server;
        $phpSelf = htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES, "UTF-8");
        $path_parts = pathinfo($phpSelf);
        if ($debug) {
            print "<p>Domain" . $domain;
            print "<p>php Self" . $phpSelf;
            print "<p>Path Parts<pre>";
            print_r($path_parts);
            print "</pre>";
        }
// %^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// inlcude all libraries
//
        require_once('../bin/lib/security.php');
        include "../bin/lib/validation-functions.php";
        include "../bin/lib/mail-message.php";
        require_once('../bin/myDatabase.php');
        $dbUserName = 'smcolbur' . '_writer';
        $whichPass = "w"; //flag for which one to use.
        $dbName = strtoupper('smcolbur') . '_Product';
        $thisDatabase = new myDatabase($dbUserName, $whichPass, $dbName);
        // CHECK USER SESSION
        if ($debug) {
            print $_SESSION["user"];
        }
        if (!empty($_SESSION["user"])) {
            $user = htmlentities($_SESSION["user"], ENT_QUOTES, "UTF-8");
            $data = array($user);
            $query = "SELECT fldUsername , pmkUserId FROM tblUsers  WHERE fldUsername = ? ";
            $session_results = $thisDatabase->select($query, $data);
            $session_username = $session_results[0]['fldUsername'];
            $session_pmkUserID = $session_results[0]['pmkUserId'];
            if ($debug) {
                print"<p>Data </p>";
                print_r($data);
                print "sql = " . $query;
                print"<p> results = </p>";
                print_r($session_results);
            }
        }
        ?>	

    </head>
    <!-- ################ body section ######################### -->

    <?php
    print '<body id="' . $path_parts['filename'] . '">';
    include "header.php";
    ?>