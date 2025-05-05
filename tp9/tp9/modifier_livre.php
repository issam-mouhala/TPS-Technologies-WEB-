<?php
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
    $conn = new PDO("mysql:host=$servername;dbname=$DBname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifie que l'ID est passé
    if (isset($_REQUEST["id"])) {
        $id = $_REQUEST["id"];
        $sql = "SELECT * FROM livre WHERE Num_livre = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $livre = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($livre) {
                $titre = $livre["Titre_livre"];
                $isbn = $livre["Num_ISBN_livre"];
                $auteur = $livre["Auteur_livre"];
                $editeur = $livre["Editeur_livre"];
                $date = $livre["Date_achat"];
            }
        }
    }

} catch (PDOException $e) {
    die("La connexion a échoué: " . $e->getMessage());
}
?>
<form action="modifier_livre.php" method="post">
    <fieldset style="padding: 10px;">
        <legend>Modifier un livre</legend>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">


        <label for="titre">Titre du livre :</label>
        <input type="text" name="titre" id="titre" value="<?php echo htmlspecialchars($titre); ?>" required>
        <br><br>

        <label for="isbn">Num ISBN du livre :</label>
        <input type="text" name="isbn" id="isbn" value="<?php echo htmlspecialchars($isbn); ?>" required>
        <br><br>

        <label for="auteur">Auteur du livre :</label>
        <input type="text" name="auteur" id="auteur" value="<?php echo htmlspecialchars($auteur); ?>" required>
        <br><br>

        <label for="editeur">Editeur du livre :</label>
        <input type="text" name="editeur" id="editeur" value="<?php echo htmlspecialchars($editeur); ?>" required>
        <br><br>

        <label for="date">Date d'achat :</label>
        <input type="date" name="date" id="date" value="<?php echo htmlspecialchars($date); ?>" required>
        <br><br>

        <input type="submit" value="Modifier" name="mo">
    </fieldset>
</form>
<?php
   if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["mo"])) {
    $id = $_POST["id"];
    $titre = $_POST["titre"];
    $isbn = $_POST["isbn"];
    $auteur = $_POST["auteur"];
    $editeur = $_POST["editeur"];
    $date = $_POST["date"];

    $sql = "UPDATE livre SET 
                Titre_livre = :titre, 
                Num_ISBN_livre = :isbn, 
                Auteur_livre = :auteur, 
                Editeur_livre = :editeur, 
                Date_achat = :date 
            WHERE Num_livre = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":titre", $titre);
    $stmt->bindParam(":isbn", $isbn);
    $stmt->bindParam(":auteur", $auteur);
    $stmt->bindParam(":editeur", $editeur);
    $stmt->bindParam(":date", $date);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "";
        header(header: "Location: livre.php?message=yes");

        
    } else {
        echo "<p style='color: red;'>Erreur lors de la mise à jour.</p>";
    }
}
?>