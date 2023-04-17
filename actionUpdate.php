<?php
    session_start();
    include 'fonction.php';
    include 'db/PDO.php';
    $table = $_POST['table'];
    $id = $_POST['id'];
    if ($_SESSION['page'] == 'vol'){
        $date = $_POST['date'];
        $time = $_POST['hour'];
        $price = $_POST['price'];
        $country = $_POST['country'];
        $array = array(
            array('id', $id),
            array('date', $date),
            array('hour', $time),
            array('country', $country),
            array('price', $price));
    } else if ($_SESSION['page'] == 'pilot'){
        $identity = $_POST['identity'];
        $adress = $_POST['adress'];
        $mail = $_POST['mail'];
        $phone = $_POST['phone'];
        $array = array(
            array('id', $id),
            array('identity', $identity),
            array('adress', $adress),
            array('mail', $mail),
            array('phone', $phone));
    } else if ($_SESSION['page'] == 'avion'){
        $name = $_POST['name'];
        $array = array(
            array('id', $id),
            array('name', $name));
    }




    
    try{
        UpdateData($table, $array, $id);
        //echo 'update done';
        header('Location :https://www.korra.dev/projet02/'.$_SESSION['page'].'.php');
    }catch(Exception $e){
        echo $e -> getMessage();
    }
?>