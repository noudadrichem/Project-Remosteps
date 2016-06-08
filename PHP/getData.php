<?php
    include "config/PHPconfig.php";



function getLanguage($section,$mysqli){

    $query  = "SELECT * FROM Content WHERE Partof = '".$section."'";
    $result = $mysqli->query($query);

    return $result;
}

?>