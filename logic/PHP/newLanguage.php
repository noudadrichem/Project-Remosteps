<?php
include "../../config/PHPconfig.php";
$new_language = $_POST['newLang'];
$return_header = $_POST['rethead'];

$fullInsertName = "Content_".$new_language;
$lwrFIN = "content_".$new_language;

$query = "ALTER TABLE Content ADD ".$fullInsertName."  VARCHAR(255)  NOT NULL AFTER spacer ";
$qwewwy = "ALTER TABLE Content ADD ".$lwrFIN."_Title  VARCHAR(255)  NOT NULL AFTER id ";

$result = $mysqli->query($query);
$rewsuwlt = $mysqli->query($qwewwy);

header("Location:../../views/CMSindex.php".$return_header."");

?>