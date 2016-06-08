<?php
include "../../config/PHPconfig.php";
error_reporting(0);
$id = $_POST['id'];
$language = $_POST['updateLang'];
$full_col = "Content_".$language;
$full_col_title = "content_".$language."_Title";
$updateDatatitle = $_POST['u_title'];
$updateDataContent = $_POST['u_input'];
$updateDataLink  = $_POST['u_link'] ?: 'none';
$rethead = $_POST['rethead'];
$page = $_POST['p'];


             
if($page = 'navigation'){
    $query = " UPDATE Content SET ".$full_col_title."='".$updateDatatitle."', ".$full_col."='".$updateDataContent."', link ='".$updateDataLink."' WHERE id = ".$id."";

}else{
    $query = " UPDATE Content SET ".$full_col_title."='".$updateDatatitle."', ".$full_col."='".$updateDataContent."' WHERE id = ".$id."";
}
$result = $mysqli->query($query);



header("Location:../../views/CMSindex.php".$rethead);

?>