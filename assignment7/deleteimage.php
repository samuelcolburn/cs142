<?php
session_start(session_id());
echo " admin ";
print $_SESSION["admin"];

if ($_SESSION["admin"]) {
    echo " admin pass ";
    if (isset($_GET['file'])) {
        echo htmlentities($_GET['file']);
        if (unlink(htmlentities($_GET['file']))) {
            echo "delete";
        }
    }
}
?>