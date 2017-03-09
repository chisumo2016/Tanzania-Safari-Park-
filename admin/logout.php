<?php
//delete session varibales and redirect to home page
 unset($_SESSION);
 session_destroy();
 header("location: ../index.php");exit;
?>
