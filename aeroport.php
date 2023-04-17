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
    $_SESSION['page'] = 'aeroport';
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
            <h1>Liste des aéroports</h1>
        <?php
            try{
                $table = 'projet02_aeroport';
                $data = SelectData($table);
                //echo count($data);
            } catch (Exception $e){
                echo $e -> getMessage();
            }
            if ($_SESSION['name'] == 'user'){
                echo '<table><thead>
                    <th>Pays</th>
                    </thead><tbody>';
                foreach ($data as $row){
                    echo'<tr>';
                    echo'<td>'.$row['country'].'</td>';
                    echo '</tr>';
                }
                echo '</tbody></table>';
            }else if ($_SESSION['name'] == 'pilot'){
                echo '<table><thead>
                    <th>Pays</th>
                    </thead><tbody>';
                foreach ($data as $row){
                    echo'<tr>';
                    echo'<td>'.$row['country'].'</td>';
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