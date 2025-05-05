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
    // Connexion à la base de données avec PDO
    $conn = new PDO("mysql:host=$servername;dbname=$DBname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupération des données POST
    if (isset($_POST["titre"])) {
        $titre = $_POST["titre"];
    }
    if (isset($_POST["isbn"])) {
        $isbn = $_POST["isbn"];
    }
    if (isset($_POST["auteur"])) {
        $auteur = $_POST["auteur"];
    }
    if (isset($_POST["editeur"])) {
        $editeur = $_POST["editeur"];
    }
    if (isset($_POST["date"])) {
        $date = $_POST["date"];
    }

    if ($_SERVER["REQUEST_METHOD"]) {
        // Requête SQL préparée
        $sql = "INSERT INTO livre (Titre_livre, Num_ISBN_livre, Auteur_livre, Editeur_livre, Date_achat)
                VALUES (:titre, :isbn, :auteur, :editeur, :date)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':isbn', $isbn);
        $stmt->bindParam(':auteur', $auteur);
        $stmt->bindParam(':editeur', $editeur);
        $stmt->bindParam(':date', $date);

        if ($stmt->execute()) {
            echo "New record created successfully";
            header(header: "Location: livre.php");

        } else {
            echo "Error during insertion";
        }
    }

} catch (PDOException $e) {
    die("La connexion a échoué: " . $e->getMessage());
}
?>