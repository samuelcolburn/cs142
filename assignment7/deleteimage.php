<?php
if ($_SESSION["admin"]) {
if (isset($_GET['file'])) {
    echo htmlentities( $_GET['file']);
   if (unlink(htmlentities( $_GET['file']))) {
     echo "delete";
   }
}
}
   ?>