<?php

if (isset($_GET['file'])) {
   if (unlink(htmlentities( $_GET['file']))) {
     echo "delete";
   }
}
   ?>