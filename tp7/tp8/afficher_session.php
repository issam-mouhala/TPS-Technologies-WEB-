<?php
session_start();
?> <fieldset>
    <legend>Affichage des variables de session</legend>
    <br>
    <br>
    <?php
    echo' Vous avey consulte cette page '.$_SESSION['compteur'].' fois';
    echo "<br>ID session: " . session_id();
    echo "<br>Nom session: " . session_name();
    echo "<br>Nom: " . $_SESSION['nom'];
    echo "<br>Prénom: " . $_SESSION['prenom'];
    echo "<br>Age: " . $_SESSION['age'];
    ?>
    <br><a href="menu.html">Retour menu</a>
</fieldset>