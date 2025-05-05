<?php
if (isset($_GET["message"])) {
    if ($_GET["message"] === "yes") {
        echo "<p style='color: green;'>Le livre a été Modifier avec succès.</p>";
    } elseif ($_GET["message"] === "non") {
        echo "<p style='color: red;'>Erreur lors de la modification du livre.</p>";
    }
}
?><?php
$servername = "localhost";
$username = "root";
$password = "";
$DBname = "bd1";
$titre = "";
$isbn = "";
$auteur = "";
$editeur = "";
$date = "";

try {
    // Connexion à la base de données avec PDO
    $conn = new PDO("mysql:host=$servername;dbname=$DBname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("La connexion a échoué: " . $e->getMessage());
}?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre</title>
</head>
<style>
body {
    background-color: #f0f0f0;
    font-family: Arial, sans-serif;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th,
td {
    padding: 10px;
    text-align: left;

}

th {
    background-color: #4CAF50;
    color: white;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #ddd;
}
</style>

<body>
    <form action="ajouter_livre.php" method="post">
        <fieldset style="padding: 10px;">
            <legend>Ajouter un livre</legend>
            <label for="titre">Titre du livre :</label>
            <input type="text" name="titre" id="titre" required>
            <br>
            <br>
            <label for="isbn">Num ISBN du livre :</label>
            <input type="text" name="isbn" id="isbn" required>
            <br>
            <br>
            <label for="auteur">Auteur du livre : </label>
            <input type="text" name="auteur" id="auteur" required>
            <br>
            <br>
            <label for="editeur">Editeur du livre : </label>
            <input type="text" name="editeur" id="editeur" required>
            <br>
            <br>
            <label for="date">Date d'achat : </label>
            <input type="date" name="date" id="date" required>
            <br>
            <br>
            <input type="submit" value="Envoyer">

        </fieldset>

    </form>
    <table border="4">
        <thead>
            <tr>
                <th>Numero du livre </th>
                <th>Titre du livre</th>
                <th>Num ISBN du livre</th>
                <th>Auteur </th>
                <th>Editeur</th>
                <th>Date d'achat</th>
                <th rowspan="2">Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php 
          $sql = "SELECT * FROM livre";
          $result = $conn->query($sql);
          $livres = array();
          
          if ($result) {
              // Utiliser fetchAll si tu veux tout stocker dans $livres, sinon boucle directement
              while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                  echo "<tr>";
                  echo "<td>" . $row["Num_livre"] . " </td>
                        <td> " . $row["Titre_livre"] . "</td>
                        <td> " . $row["Num_ISBN_livre"] . "</td>
                        <td>" . $row["Auteur_livre"] . " </td>
                        <td>" . $row["Editeur_livre"] . "</td>
                        <td> " . $row["Date_achat"] . "</td>
                        <td>
                          <form action='supprimer.php' method='post'>
                            <input type='hidden' name='id' value='" . $row["Num_livre"] . "'>
                            <input type='submit' name='supp' value='Supprimer' id='supp'>
                          </form>
                          <form action='modifier_livre.php' method='post'>
                            <input type='hidden' name='id' value='" . $row["Num_livre"] . "'>
                            <input type='submit' name='modif' value='Modifier' id='modif'>
                          </form>
                        </td>";
                  echo "</tr>";
              }
          } else {
              echo "0 results";
          }?>

        </tbody>
    </table>
    <div class="confirmation">


    </div>
    </dbody>

</html>