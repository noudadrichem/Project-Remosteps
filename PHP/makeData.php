<?php
include "../../config/PHPconfig.php";
// include "../../config/CMSConfig.php";
$page = $_POST['p'];
$partof = $_GET['po'];
$rethead = $_POST['rethead'];
$qf = "SHOW COLUMNS FROM Content";
$rr = $mysqli->query($qf);


$container = "";
$containerTwo = "";
$valuesContainer = "";
$valuesContainerTwo = "";
if($rr->num_rows > 0){
    while($data = $rr->fetch_assoc()){
        if(strpos($data['Field'],'Content_') !== FALSE){
            $container .= $data['Field'].", ";
            $valuesContainer .= "'".$data['Field']."_ph', ";
        }else if(strpos($data['Field'],"content_") !== FALSE){
            $containerTwo .= $data['Field'].",";
            $valuesContainerTwo .= "'".$data['Field']."_Title_ph', ";
        }
    }
}

if($page = 'navigation'){
    $q = "INSERT INTO Content (".$containerTwo."spacer,".$container." Font_size, Partof,link) VALUES (".$valuesContainerTwo."'spacer',".$valuesContainer."'14','".$partof."','link')";
}else{
    $q = "INSERT INTO Content (".$containerTwo."spacer,".$container." Font_size, Partof) VALUES (".$valuesContainerTwo."'spacer',".$valuesContainer."'14','".$partof."')";

}
$result = $mysqli->query($q);




header("Location:../../views/CMSindex.php".$rethead);

?>