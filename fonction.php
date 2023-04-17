<?php
    include 'db/PDO.php';
    function SelectData($table){
        include 'db/PDO.php';
        try{
            $rqt = $db -> prepare ("SELECT * FROM $table");
            $rqt -> execute();
            $result = $rqt -> fetchAll();
            //echo $result[0][0];
            return $result;
        }catch(Exception $e){
            echo $e -> getMessage();
        }
    }
    function SelectElementDataWhere($element, $table, $condition, $equal){
        include 'db/PDO.php';
        //echo 'selectDataWhere en cours d\'utilisation';
        //echo "SELECT $element FROM $table where $condition = $equal";
        $clause = '"'.$equal.'"';
        try{
            $rqt = $db -> prepare ("SELECT $element FROM $table where $condition = $clause");
            $rqt -> execute();
            $result = $rqt -> fetch();
            /* foreach ($result as $piece){
                echo ' /br piece : '.$piece;
            }; */
            return $result[0];
        }catch(Exception $e){
            echo $e -> getMessage();
        }
    }
    function SelectDataWhere($table, $condition, $equal){
        include 'db/PDO.php';
        //echo 'selectDataWhere en cours d\'utilisation';
        //echo "SELECT * FROM $table where $condition = $equal";
        $clause = '"'.$equal.'"';
        try{
            $rqt = $db -> prepare ("SELECT * FROM $table where $condition = $clause");
            $rqt -> execute();
            $result = $rqt -> fetch();
            //echo $result -> getColumnMeta(0);
            //echo var_dump($result);
            return $result;
        }catch(Exception $e){
            echo $e -> getMessage();
        }
    }
    function SuppressionData($table, $id){
        include 'db/PDO.php';
        try{
            $rqt = $db -> prepare ("DELETE FROM $table WHERE id = $id");
            $rqt -> execute();
            //echo 'Suppression done';
        }catch(Exception $e){
            echo $e -> getMessage();
        }
    }
    function AddData($table, $array){
        include 'db/PDO.php';
        $values = '';
        for ($i = 0; $i < count($array); $i++){
            //echo count($array);
            if ($i < count($array)-1){
                $values .= '"'.$array[$i].'", ';
            }
            else {
                $values .= '"'.$array[$i].'" ';
            }
        }echo $values;
        try{
            $rqt = $db -> prepare ("INSERT INTO $table VALUES ($values)");
            $rqt -> execute();
        }catch(Exception $e){
            echo $e ->getMessage();
        }
    }
    function UpdateData($table, $array, $id){
        include 'db/PDO.php';
        $values = '';
        for ($i = 0; $i < count($array); $i++){
            //echo count($array);
            if ($i < count($array)-1){
                $values .= $array[$i][0].' = "'.$array[$i][1].'",';
            }
            else {
                $values .= $array[$i][0].' = "'.$array[$i][1].'"';
            }
        }echo $values;
        try{
            $rqt = $db -> prepare ("UPDATE $table SET $values WHERE id = $id");
            $rqt -> execute();
        }catch(Exception $e){
            echo $e ->getMessage();
        }
    }
?>