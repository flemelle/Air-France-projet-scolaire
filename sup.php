<?php
    include 'fonction.php';
    include 'db/PDO.php';
    session_start();
    $table = $_POST['table'];
    $id = $_POST['id'];
    //echo 'Suppression from table '.$table .' where id = '. $id;
    try{
        SuppressionData($table, $id);
        header('Location :https://www.korra.dev/projet02/'.$_SESSION['page'].'.php');
    }catch(Exception $e){
        echo $e -> getMessage();
    }
?>