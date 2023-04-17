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
    $_SESSION['page'] = 'avion';
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
            <h1>Liste des avions</h1>
        <?php
            try{
                $table = 'projet02_avion';
                $data = SelectData($table);
                //echo count($data);
            } catch (Exception $e){
                echo $e -> getMessage();
            }
            if ($_SESSION['name'] == 'user'){
                echo '<table><thead>
                    <th>Nom</th>
                    <th>Aéroport</th>
                    <th colspan = "2">Edition</th>
                    </thead><tbody>';
                echo '<tr><td colspan = "2"></td>
                    <td colspan = "2">
                    <form method = "post" action = "add.php">
                    <input type = "hidden" name ="table" value = "'.$table.'">
                    <input type = "image" src = "img/icons8-plus-2-mathématique-100.png" alt = "Submit">
                    </form></td></tr>
                    <div id = "sub_data">'
                    ;
                foreach ($data as $row){
                    echo'<tr>';
                    //echo'<td>'.$row['id'].'</td>';
                    echo'<td>'.$row['name'].'</td>';
                    echo'<td>'.SelectElementDataWhere('country', 'projet02_aeroport', 'id', $row['idAeroport']).'</td>';
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
                    echo '</tr></div>';
                }
                echo '</tbody></table>';
            }else if ($_SESSION['name'] == 'pilot'){
                echo '<table><thead>
                    <th>Nom</th>
                    <th>Aéroport</th>
                    </thead><tbody><div id = "sub_data">';
                foreach ($data as $row){
                    echo'<tr>';
                    //echo'<td>'.$row['id'].'</td>';
                    echo'<td>'.$row['name'].'</td>';
                    echo'<td>'.SelectElementDataWhere('country', 'projet02_aeroport', 'id', $row['idAeroport']).'</td>';
                    echo '</tr></div>';
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