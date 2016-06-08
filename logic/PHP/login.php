<?php

    include "../../config/PHPconfig.php";
    
    $u_name = stripcslashes($_POST['u_name']);
    $u_pwd = sha1(stripcslashes($_POST['u_pwd']));
  
    $dbq = "SELECT * FROM cms_usrs";
    $dbr = $mysqli->query($dbq);
    
    while($data = $dbr->fetch_assoc()){
        if($data['uname'] == $u_name && $data['upwd'] == $u_pwd){
            header("Location:../../views/CMSindex.php");
        }else{
            header("Location:../../views/login.php");
        }
    }
    
?>