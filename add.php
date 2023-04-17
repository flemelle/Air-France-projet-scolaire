<?php
    include 'fonction.php';
    include 'db/PDO.php';
    session_start();
    if ($_SESSION['role'] != 'user'){
        header('Location : vol.php');
    }
    include 'header.php';
    $table = $_POST['table'];
?>
<html>
    <head>
        <title>Air France</title>
        <meta charset ='utf-8'>
        <link rel ='stylesheet ' href = 'css/style.css'/>
        <link rel="icon" href="img/favicon.ico"/>
    </head>
    <body><div id = 'data'>
        <?php
            if ($_SESSION['page'] == 'vol'){
                $table = $_POST['table'];
                echo '
                <h1>Ajouter un vol</h1>
                    <div>
                        <table><thead>
                        <th>Date du vol</th>
                        <th>Heure de départ</th>
                        <th>Prix</th>
                        <th>Destination</th>
                        <th></th>
                        </thead><tbody>
    
                        <form action = "actionAdd.php" method = "post">
                        <input type = "hidden" name = "table" value = "'.$table.'">
                        <td><input type = "text" name = "date"></td>
                        <td><input type = "text" name = "hour"></td>
                        <td><input type = "text" name = "price"</td>
                        <td><input type = "text" name = "country"></td>
                        <td><input type = "submit" value = "Ajouter">
                        </form>
                        </tbody></table>
                    </div>';
                }else if ($_SESSION['page'] == 'pilot'){
                    $table = $_POST['table'];
                    echo '
                    <h1>Ajouter un pilot</h1>
                        <div>
                            <table><thead>
                            <th>Nom</th>
                            <th>Adresse</th>
                            <th>Mail</th>
                            <th>Téléphone</th>
                            <th></th>
                            </thead><tbody>
        
                            <form action = "actionAdd.php" method = "post">
                            <input type = "hidden" name = "table" value = "'.$table.'">
                            <td><input type = "text" name = "identity" ></td>
                            <td><input type = "text" name = "adress"></td>
                            <td><input type = "text" name = "mail"></td>
                            <td><input type = "text" name = "phone"></td>
                            <td><input type = "submit" value = "modifier">
                            </form>
                            </tbody></table>
                        </div>';
                    } else if ($_SESSION['page'] == 'avion'){
                        $table = $_POST['table'];
                        echo '
                        <h1>Ajouter un avion</h1>
                            <div>
                                <table><thead>
                                <th>Nom</th>
                                <th></th>
                                </thead><tbody>
                                <form action = "actionAdd.php" method = "post">
                                <input type = "hidden" name = "table" value = "'.$table.'">
                                <td><input type = "text" name = "name"></td>
                                <td><input type = "submit" value = "Ajouter">
                                </form>
                                </tbody></table>
                            </div>';
                        } else if ($_SESSION['page'] == 'aeroport'){
                            header('Location : aeroport.php');
                            }
        ?>
        <div></div>
        </div>
        <?php
        include 'footer.php';
        ?>
    </body>
</html>