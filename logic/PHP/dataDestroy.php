<?php
include "../../config/PHPconfig.php";

$tid = $_GET['id'];
$rethead = $_POST['rethead'];

$q = "DELETE FROM Content WHERE id = ".$tid."";
$r = $mysqli->query($q);
// var_dump($q);
header("Location:../../views/CMSindex.php".$rethead);


?>