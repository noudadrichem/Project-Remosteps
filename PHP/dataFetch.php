<?php
  

    // function dataGrep($language, $section, $type){
    //     include "config/PHPconfig.php";
    //     if($type = 'title'){
    //         $fullQ  = 'content_'.$language.'_Title';
    //     }else if($type = 'content'){
    //         $fullQ  = 'Content_'.$language;
    //     }
    //     $query = "SELECT ".$fullQ." FROM Content WHERE Partof = '".$section."'";
    //     $result = $mysqli->query($query);
    //     while($data = $result->fetch_assoc()){
    //         echo $data[$fullQ];
    //     }
    // }
    
    function langDataGrep(){
        include "config/PHPconfig.php";
        $qqq = "SHOW COLUMNS FROM Content";
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
        for($i = 0; $i < count($container); $i++){
            echo "<div class='block'><a href='?lang=".$container[$i]."'>".$container[$i]."</a></div>";
        }
    }
    
    function quoteContentDataGrep($language){
         include "config/PHPconfig.php";
         $fullQ = "content_".$language;
         $query = "SELECT ".$fullQ." FROM Content WHERE Partof = 'quote'";
         $result = $mysqli->query($query);
         while($data = $result->fetch_assoc()){
             return $data[$fullQ];
         }
    }
    
    function headerButtonContentDataGrep($language){
         include "config/PHPconfig.php";
         $fullQ = "content_".$language;
         $query = "SELECT ".$fullQ." FROM Content WHERE Partof = 'headerButton'";
         $result = $mysqli->query($query);
         while($data = $result->fetch_assoc()){
             return $data[$fullQ];
         }
    }
    
    function infoTitleDataGrep($language){
        include "config/PHPconfig.php";
        $retArray = [];
        $fullQ = "content_".$language."_Title";
        $query = "SELECT ".$fullQ." FROM Content WHERE Partof = 'info'";
        $result = $mysqli->query($query);
        while($data = $result->fetch_assoc()){
            array_push($retArray, $data[$fullQ]);
        }
        return $retArray;
    }
    
    function infoContentDataGrep($language){
        include "config/PHPconfig.php";
        $retArray = [];
        $fullQ = "Content_".$language;
        $query = "SELECT ".$fullQ." FROM Content WHERE Partof = 'info'";
        $result = $mysqli->query($query);
        while($data = $result->fetch_assoc()){
            array_push($retArray, $data[$fullQ]);
        }
        return $retArray;
        
    }
    
    
    function navGrep($language){
        include "config/PHPconfig.php";
        $query = "SELECT * FROM Content WHERE Partof = 'navigation'";
        $result = $mysqli->query($query);
        $fullQ = 'Content_'.$language;
        while($data = $result->fetch_assoc()){
            echo "<li><a href=".$data['link'].">".$data[$fullQ]."</a></li>";
        }
    }
    
    function previewTitleDataGrep($language){
        include "config/PHPconfig.php";
        $retArray = [];
        $fullQ = "content_".$language."_Title";
        $query = "SELECT ".$fullQ." FROM Content WHERE Partof = 'preview'";
        $result = $mysqli->query($query);
        while($data = $result->fetch_assoc()){
            array_push($retArray, $data[$fullQ]);
        }
        return $retArray;
    }
    
    function previewContentDataGrep($language){
        include "config/PHPconfig.php";
        $retArray = [];
        $fullQ = "Content_".$language;
        $query = "SELECT ".$fullQ." FROM Content WHERE Partof = 'preview'";
        $result = $mysqli->query($query);
        while($data = $result->fetch_assoc()){
            array_push($retArray, $data[$fullQ]);
        }
        return $retArray;
    }
    
    function footerDataGrep($language){
        include "config/PHPconfig.php";
        $fullQ  = "Content_".$language;
        $query = "SELECT ".$fullQ." FROM Content WHERE Partof = 'footer'";
        $result = $mysqli->query($query);
        while($data = $result->fetch_assoc()){
            echo "<li><a href='".$data['link']."'>".$data[$fullQ]."</a></li>";
        }
    }
    
    
?>