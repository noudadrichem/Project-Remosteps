<?php
include "../config/PHPconfig.php";
$page = $_GET['p'] ?: 'navigation';
$id = $_GET['id'];
$dataLang = $_GET['dataLang'] ?: 'ENG';
$language_full = 'Content_' . $dataLang;
$language_title = 'content_'.$dataLang.'_Title';

$q = "SELECT * FROM Content WHERE id = ".$id."";

$qq = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA . COLUMNS WHERE TABLE_SCHEMA = 'duckofdoom_Remo_Steps' AND TABLE_NAME = 'Content'";
$qqq = "SHOW COLUMNS FROM Content";
$r = $mysqli->query($q);

$rr = $mysqli->query($qqq);


$container = [];
if($rr->num_rows > 0){
    while($data = $rr->fetch_assoc()){
        if(strpos($data['Field'],'Content_') !== FALSE){
            $xplode = explode("_", $data['Field']);
            array_push($container, $xplode[1]);
        }
    }
}
echo "<form method='post' action='../logic/PHP/dataSend.php'>";
echo "<nav id='nav'>";

echo "<button type='submit' class='topButton active btnSpec'><p>Edit</p></button>";

if($page == 'footer'){
   echo "<a href='?p=footer'><div class='topButton firstLeft pdTop active'><p>footer</p></div></a>"; 
}else{
   echo "<a href='?p=footer'><div class='topButton firstLeft pdTop'><p>footer</p></div></a>"; 
}
if($page == 'preview'){
    echo "<a href='?p=preview'><div class='topButton  pdTop active'><p>preview</p></div></a>";
}else{
    echo "<a href='?p=preview'><div class='topButton  pdTop'><p>preview</p></div></a>";
}

if($page == 'info'){
    echo "<a href='?p=info'><div class='topButton  pdTop active'><p>info</p></div></a>";
}else{
    echo "<a href='?p=info'><div class='topButton  pdTop'><p>info</p></div></a>";
}

if($page == 'navigation'){
    echo "<a href='?p=navigation'><div class='topButton  pdTop active'><p>navigation</p></div></a>";
}else{
   echo "<a href='?p=navigation'><div class='topButton  pdTop'><p>navigation</p></div></a>"; 
}

if($page == 'quote'){
    echo "<a href='?p=quote'><div class='topButton  pdTop active'><p>quote</p></div></a>";
}else{
    echo "<a href='?p=quote'><div class='topButton  pdTop'><p>quote</p></div></a>";
}

if($page == 'headerButton'){
    echo "<a href='?p=headerButton'><div class='topButton  pdTop active'><p>headerButton</p></div></a>";
}else{
    echo "<a href='?p=headerButton'><div class='topButton  pdTop'><p>headerButton</p></div></a>";
}





echo "</nav>";


echo "<div id='editorPanel'>";
echo "<div id='languageStrip'>";
echo "<div id='subLanguageStrip'>";
for($i = -1; $i < count($container); $i++){
        echo "<form method='post' action='?p=".$page."&id=".$id."&dataLang=".$container[$i]."'><button type='submit' class='languageStripButton btn'><p><b><i>".$container[$i]."</i></b></p></button></form>";
}
echo "</div>";
echo "<div id='alf' class='languageStripButton btn addLanguage'><b><i><p>Add Language</i></b></p><i class='fa fa-plus fa-2x fr'></i></div>";

echo "</div>";

echo "<div id='maskLayer'>";
    echo "<div id='addLanguageField'>";
        echo "<div id='addLanguageFieldTop'>";
            echo "<p>please enter the 3 initials in all caps of the language you wish to add</p><p id='close'>[X]</p>";
        echo "</div>";
        echo "<form method='post' action='../logic/PHP/newLanguage.php'><input id='newLangInput' maxlength='3' type='text' name='newLang' placeHolder='Example: ENG'><input name='rethead' type='hidden' value='?p=".$page."&id=".$id."&dataLang=".$dataLang."'><button class='btn confirm' type='submit'>
              <i class='fa fa-check fa-3x grey'></button></i></form>";
    echo "</div>";
echo "</div>";


if ($r->num_rows > 0) {
    while($data = $r->fetch_assoc()){
        echo "<div id='dataPanelBig'>";
        echo "<div id='dataPanelTop'>";
        if($page == 'navigation'){
            echo "<p class='small'>".$data[$language_full]."</p>";
            echo "<input type='hidden' value='".$data[$language_full]."' name='u_title'>";
            echo "<input type='text' value='".$data['link']."' placeHolder='link to' name='u_link' id='linkField'>"; 
        }else if($page == 'footer'){
            echo "<p class='small'>".$data[$language_full]."</p>";
            echo "<input type='hidden' value='".$data[$language_full]."' name='u_title'>";
            echo "<input type='text' value='".$data['link']."' placeHolder='link to' name='u_link' id='linkField'>"; 
        }else{
            echo "<input id='content_title_edit' type='text' name='u_title' value='".$data[$language_title]."'>";
        }
        echo "</div>";
        echo "<textarea name='u_input' class='dataPanelTextarea' maxlength='255'>";
        echo $data[$language_full];
        echo "</textarea>";
        echo "</div>";
        echo "<input type='hidden' name='id' value='".$id."'>";
        echo "<input type='hidden' name='updateLang' value='".$dataLang."'>";
        echo "<input type='hidden' name='rethead' value='?p=".$page."&id=".$id."&dataLang=".$dataLang."'>";
        echo "<input type='hidden' name='p' value=".$page."";
    }
}else{
    echo "<div id='selectMssg'><p> <b> < To edit. Select from the menu on the left. </b></p></div>";
}
echo "</div>";
echo "</form>";



/////////////////////////////////////
/////////////form names//////////////
/////////////////////////////////////
//textarea -> u_input ///////////////
//title    -> u_title ///////////////
/////////////////////////////////////


//note make language settings for the titles aswell
?>

