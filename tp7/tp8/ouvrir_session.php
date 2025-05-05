<?php
session_start();
echo "<h1>Ouvrir une session</h1>";
echo "<br>ID session: " . session_id();
echo "<br>Nom session: " . session_name();
?>
<form action="create_session.php" method="post">
    <fieldset>
        <legend>Les donnees de formulaire</legend>
        <label for="">Nom : </label>
        <input type="text" name="nom" required>
        <br>
        <br>
        <br>
        <label for="">Prenom : </label>

        <input type="text" name="prenom" required>
        <br>
        <br>
        <br>
        <label for="">Age : </label>

        <input type="text" name="age" required>
        <br>
        <br>
        <br>
        <input type="submit" value="Envoyee">
    </fieldset>


</form>