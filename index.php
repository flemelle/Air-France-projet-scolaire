<!DOCTYPE html>
<?php
    include 'db/PDO.php';
    include 'fonction.php';
?>
<html>
    <head>
        <title>Air France</title>
        <meta charset ='utf-8'>
        <link rel ='stylesheet ' href = 'css/style.css'/>
        <link rel="icon" href="img/favicon.ico" />
    </head>
    <body>
        <div><img src ='img/header-1.webp'></div>
        <div id = 'connexion'>
            <h1>Connexion</h1>
            <form method ='post' action ='connexion.php'>
                <input type = 'text' name ='identifiant' placeholder = 'identifiant' required autofocus >
                <input type = 'password' name = 'password' placeholder = 'password'required>
                <input type = 'submit' value = 'connexion'>
            </form>
        </div>
    
        <?php
            include 'footer.php';
        ?>
    </body>
</html>