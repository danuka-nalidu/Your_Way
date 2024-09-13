<?php
//Include to the projects of other members
function is_valid_login(){
    $result = false;
    if(isset($_SESSION['AUTH']) && $_SESSION['AUTH'] == true){
        $result = true;
    }
    return $result;
}

function redirect_invalid_session(){
    if(is_valid_login() == false){
       header('Location: index.php');
       exit;
       //echo 'false';
    }//else{
       // echo 'true';
    //}
}
