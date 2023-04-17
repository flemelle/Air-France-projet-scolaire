<?php
    session_start();
    echo '
    <header>
        <div id = "menue">
            <img src = "img/index.png">
            <div id = "navigation">
                <div id = "name">
                    <p>Bonjour '.$_SESSION['name'].'</p>
                    <a href = "deconnexion.php"><img src = "img/off.png"></a>
                </div>
                <ul>
                    <li><img src = "img/icons8-décollage-d\'avion-100.png"><a href = "vol.php">VOL</a></li>
                    <li><img src = "img/icons8-bâtiments-de-la-ville-100.png"><a href = "aeroport.php">AEROPORT</a></li>
                    <li><img src = "img/icons8-aéroport-100.png"><a href = "avion.php">AVION</a></li>
                    ';
    if ($_SESSION['name'] == 'user'){
        echo '<li><img src = "img/icons8-utilisateur-96.png"><a href = "pilot.php">PILOTE</a></li>';
    }
    echo'
                </ul>
            </div>
        </div>
    </header>';
?>



