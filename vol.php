<!DOCTYPE html>
<?php
    include 'db/PDO.php';
    include 'fonction.php';
    session_start();
    if (!isset($_SESSION['role'])){
        session_unset();
        session_destroy();
        header('Location : index.php');
    }
    $_SESSION['page'] = 'vol';
?>
<html>
    <head>
        <title>Air France</title>
        <meta charset ='utf-8'>
        <link rel ='stylesheet ' href = 'css/style.css'/>
        <link rel="icon" href="img/favicon.ico" />
    </head>
    <body>
        <?php
            include 'header.php';
        ?>
        <div id = 'data'>
            <h1>Liste des vols disponibles</h1>
        <?php
            try{
                $table = 'projet02_vol';
                $data = SelectData($table);
                //echo count($data);
            } catch (Exception $e){
                echo $e -> getMessage();
            }
            if ($_SESSION['name'] == 'user'){
                echo '<table><thead>
                    <th>Date du vol</th>
                    <th>Heure de départ</th>
                    <th>Aéroport</th>
                    <th>Pilote</th>
                    <th>Destination</th>
                    <th>Prix</th>
                    <th colspan = "2">Edition</th>
                    </thead><tbody>';
                echo '<tr><td colspan = "6"></td>
                    <td colspan = "2">
                    <form method = "post" action = "add.php">
                    <input type = "hidden" name ="table" value = "'.$table.'">
                    <input type = "image" src = "img/icons8-plus-2-mathématique-100.png" alt = "Submit">
                    </form></td></tr>';
                foreach ($data as $row){
                    $date = date_create($row['date'].' '.$row['hour']);
                    echo'<tr>';
                    //echo'<td>'.$row['id'].'</td>';
                    echo'<td>'.date_format($date,"d/m/Y").'</td>';
                    echo'<td>'.date_format($date,"h:i").'</td>';
                    echo'<td>'.SelectElementDataWhere('country', 'projet02_aeroport', 'id', $row['idAeroport']).'</td>';
                    echo'<td>'.SelectElementDataWhere('identity', 'projet02_pilot', 'id', $row['idPilot']).'</td>';
                    echo'<td>'.$row['country'].'</td>';
                    echo'<td>'.$row['price'].' €</td>';
                    echo'<td><form method = "post" action = "sup.php">
                        <input type = "hidden" name ="table" value = "'.$table.'">
                        <input type = "hidden" name = "id" value = "'.$row['id'].'">
                        <input type = "image" src = "img/icons8-effacer-64.png" alt = "Submit" value = "Suppession">
                        </form>
                        </td>';

                    echo'<td><form method = "post" action = "update.php">
                        <input type = "hidden" name ="table" value = "'.$table.'">
                        <input type = "hidden" name = "id" value = "'.$row['id'].'">
                        <input type = "image" src = "img/icons8-modifier-96.png" alt = "Submit"value = "Update">
                        </form>
                        </td>';
                    echo '</tr>';
                }
                echo '</tbody></table>';
            }else if ($_SESSION['name'] == 'pilot'){
                echo '<table><thead>
                    <th>Date du vol</th>
                    <th>Heure de départ</th>
                    <th>Aéroport</th>
                    <th>Pilote</th>
                    <th>Destination</th>
                    <th>Prix</th>
                    </thead><tbody>';
                foreach ($data as $row){
                    $date = date_create($row['date'].' '.$row['hour']);
                    echo'<tr>';
                    //echo'<td>'.$row['id'].'</td>';
                    echo'<td>'.date_format($date,"d/m/Y").'</td>';
                    echo'<td>'.date_format($date,"h:i").'</td>';
                    echo'<td>'.SelectElementDataWhere('country', 'projet02_aeroport', 'id', $row['idAeroport']).'</td>';
                    echo'<td>'.SelectElementDataWhere('identity', 'projet02_pilot', 'id', $row['idPilot']).'</td>';
                    echo'<td>'.$row['country'].'</td>';
                    echo'<td>'.$row['price'].' €</td>';
                    echo '</tr>';
                }
                echo '</tbody></table>';
            }
        ?>
        </div>
        <?php
            include 'footer.php';
        ?>
    </body>
</html>