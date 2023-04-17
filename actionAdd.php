<?php
    session_start();
    include 'fonction.php';
    include 'db/PDO.php';
    $table = $_POST['table'];
    if ($_SESSION['page'] == 'vol'){
        $date = $_POST['date'];
        $time = $_POST['hour'];
        $price = $_POST['price'];
        $country = $_POST['country'];
        $array = array( 'NULL', $date, $time, $price, rand(0, 100), rand(0, 100), $country);
    } else if ($_SESSION['page'] == 'pilot'){
        $identity = $_POST['identity'];
        $adress = $_POST['adress'];
        $mail = $_POST['mail'];
        $phone = $_POST['phone'];
        $array = array('NULL', $identity, $phone, $mail, $adress);
    } else if ($_SESSION['page'] == 'avion'){
        $name = $_POST['name'];
        $array = array('NULL',rand(0, 100), $name);
    }

    try{
        AddData($table, $array);
        header('Location :https://www.korra.dev/projet02/'.$_SESSION['page'].'.php');
    }catch(Exception $e){
        echo $e -> getMessage();
    }
?>