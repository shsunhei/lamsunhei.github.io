<?php
    //when user log out,remove the information in session.
    session_start ();
    session_destroy ();
    setcookie("loginuser", "", time()-3600);
    header ( "location:index.php" );
?>