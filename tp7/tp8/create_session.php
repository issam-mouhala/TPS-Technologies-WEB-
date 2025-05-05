<?php
session_start();
// enregistrements des variables de session
$_SESSION['nom'] = $_REQUEST['nom'];
$_SESSION['prenom'] = $_REQUEST['prenom'];
$_SESSION['age'] = $_REQUEST['age'];
$_SESSION['compteur'] = isset($_SESSION['compteur']) ? (int) $_SESSION['compteur'] + 1 : 0;
?>

<html>

<body>
    <h1>Variables de session créées</h1>
    <?php
    echo "<br>ID session: " . session_id();
    echo "<br>Nom session: " . session_name();
    echo "<br>Nom: " . $_SESSION['nom'];
    echo "<br>Prénom: " . $_SESSION['prenom'];
    echo "<br>Age: " . $_SESSION['age'];
    ?>
    <br><a href="menu.html">Retour menu</a>
</body>

</html>