<?php
    include 'fonction.php';
    include 'db/PDO.php';
    $identifiant = '';
    $identifiant = $_POST['identifiant'];
    $pass = $_POST['password'];
    $table = 'projet02_roleAirFrance';
    try{
        $data = SelectElementDataWhere('pass', $table, 'name', $identifiant);
        if ($data == $pass){
            session_start();
            $_SESSION['role'] = $identifiant;
            $_SESSION['name'] = $identifiant;
            //echo 'connexion réussit';
            header('Location : vol.php');
        }else {
            echo 'Echec de connexion';
            header('Location : index.php');
        }
    }catch(PDOException $e){
        echo $e -> getMessage();
    }
?>