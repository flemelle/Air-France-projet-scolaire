<?php
    include 'fonction.php';
    include 'db/PDO.php';
    session_start();
    if ($_SESSION['role'] != 'user'){
        header('Location : vol.php');
    }
    $id = $_POST['id'];
    include 'header.php';
    //echo 'Modification from table '.$table .' where id = '. $id;
?>
<html>
    <head>
        <title>Air France</title>
        <meta charset ='utf-8'>
        <link rel ='stylesheet ' href = 'css/style.css'/>
        <link rel="icon" href="img/favicon.ico" />
    </head>
    <body>
    <div id = 'data'>
        <?php
            if ($_SESSION['page'] == 'vol'){
            $table = $_POST['table'];
            $data = SelectDataWhere($table, 'id', $id);
            echo '
            <h1>Modifier le vol</h1>
                <div>
                    <table><thead>
                    <th>Date du vol</th>
                    <th>Heure de départ</th>
                    <th>Prix</th>
                    <th>Destination</th>
                    <th></th>
                    </thead><tbody>

                    <form action = "actionUpdate.php" method = "post">
                    <input type = "hidden" name = "id" value = "'.$id.'">
                    <input type = "hidden" name = "table" value = "'.$table.'">
                    <td><input type = "text" name = "date" value = "'.$data['date'].'"></td>
                    <td><input type = "text" name = "hour" value = "'.$data['hour'].'"></td>
                    <td><input type = "text" name = "price" value = "'.$data['price'].'"></td>
                    <td><input type = "text" name = "country" value = "'.$data['country'].'"></td>
                    <td><input type = "submit" value = "modifier">
                    </form>
                    </tbody></table>
                </div>';
            }else if ($_SESSION['page'] == 'pilot'){
                $table = $_POST['table'];
                $data = SelectDataWhere($table, 'id', $id);
                echo '
                <h1>Modifier le pilot</h1>
                    <div>
                        <table><thead>
                        <th>Nom</th>
                        <th>Adresse</th>
                        <th>Mail</th>
                        <th>Téléphone</th>
                        <th></th>
                        </thead><tbody>
    
                        <form action = "actionUpdate.php" method = "post">
                        <input type = "hidden" name = "id" value = "'.$id.'">
                        <input type = "hidden" name = "table" value = "'.$table.'">
                        <td><input type = "text" name = "identity" value = "'.$data['identity'].'"></td>
                        <td><input type = "text" name = "adress" value = "'.$data['adress'].'"></td>
                        <td><input type = "text" name = "mail" value = "'.$data['mail'].'"></td>
                        <td><input type = "text" name = "phone" value = "'.$data['phone'].'"></td>
                        <td><input type = "submit" value = "modifier">
                        </form>
                        </tbody></table>
                    </div>';
                } else if ($_SESSION['page'] == 'avion'){
                    $table = $_POST['table'];
                    $data = SelectDataWhere($table, 'id', $id);
                    echo '
                    <h1>Modifier l\'avion</h1>
                        <div>
                            <table><thead>
                            <th>Nom</th>
                            <th></th>
                            </thead><tbody>
                            <form action = "actionUpdate.php" method = "post">
                            <input type = "hidden" name = "id" value = "'.$id.'">
                            <input type = "hidden" name = "table" value = "'.$table.'">
                            <td><input type = "text" name = "name" value = "'.$data['name'].'"></td>
                            <td><input type = "submit" value = "modifier">
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