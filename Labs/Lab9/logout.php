 <?php
session_start();  //starting or resuming existing session
session_unset();
session_destroy();  //kills session

header("Location: index.php");


?> 