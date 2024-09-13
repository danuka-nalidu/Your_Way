<?php
session_start();                    
require_once('config.php');         
require_once('functions.php');      
// Login session handler function
redirect_invalid_session();         

echo $_SESSION['USERTYPE'];

?>

<h1>Profile</h1>

<a href="customerDelete.php">Delete customer</a>