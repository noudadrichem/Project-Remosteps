<?php
        include "../config/PHPconfig.php";
        // error_reporting(0);
        $page = $_GET['p'];
        $rma = $_GET['rma'] ?: "no";
        $dataLang = $_GET['dataLang'] ?: 'ENG';
        define("PAGE",$page);
        //checks what page its on and queries the corresponding data
        switch ($page) {
            case "navigation":
                $sql = "SELECT * FROM Content WHERE Partof = 'navigation'";
                break;
            
            case "body":
                $sql = "SELECT * FROM Content WHERE Partof = 'quote'";
                break;
                
            case "footer":
                $sql = "SELECT * FROM Content WHERE Partof = 'footer'";
                break;
                
            case "headerButton":
                $sql = "SELECT * FROM Content WHERE Partof = 'headerButton'";
                break;
            case "info":
                $sql = "SELECT * FROM Content WHERE Partof = 'info'";
                break;
            case "preview":
                $sql = "SELECT * FROM Content WHERE Partof = 'preview'";
                break;
            case "quote":
                $sql = "SELECT * FROM Content WHERE Partof = 'quote'";
                break;
            default:
                $sql = "SELECT * FROM Content WHERE Partof = 'navigation'";
        }
        $result = $mysqli->query($sql);
        //checks if there are any rows from the query
        if ($result->num_rows > 0) {
            echo "";
            while($row = $result->fetch_assoc()){
                if(PAGE == 'navigation'){
                    echo '<div class="sideItem"><form class="bigClick" method="post" action="?p='.$page.'&id='.$row['id'].'"><input type="hidden" value="'.$page.'" name="p"><button type="submit" class="btn bigButton"><p>'.$row['content_ENG_Title'].'</p></button></form><form method="post" action="../logic/PHP/dataDestroy.php?id='.$row['id'].'"><input type="hidden" name="rethead" value="?p='.$page.'&id='.$row['id'].'&dataLang='.$dataLang.'"><button type="submit" class="btn trash"><i class="fa fa-trash-o fa-2x fa-inverse"></i></button></form></div>';
                }else if(PAGE == 'footer'){
                    echo '<div class="sideItem"><form class="bigClick" method="post" action="?p='.$page.'&id='.$row['id'].'"><input type="hidden" value="'.$page.'" name="p"><button type="submit" class="btn bigButton"><p>'.$row['content_ENG_Title'].'</p></button></form><form method="post" action="../logic/PHP/dataDestroy.php?id='.$row['id'].'"><input type="hidden" name="rethead" value="?p='.$page.'&id='.$row['id'].'&dataLang='.$dataLang.'"><button type="submit" class="btn trash"><i class="fa fa-trash-o fa-2x fa-inverse"></i></button></form></div>';
                }else{
                    echo '<div class="sideItem"><form class="bigClick" method="post" action="?p='.$page.'&id='.$row['id'].'"><input type="hidden" value="'.$page.'" name="p"><button type="submit" class="btn bigButton"><p>'.$row['content_ENG_Title'].'</p></button></form></div>';

                }
            }
            } else {
               
            }
        $mysqli->close();
        
        //nav and footer may be edited. others may not
?>

