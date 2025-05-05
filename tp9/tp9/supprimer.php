<?php
$servername = "localhost";
$username = "root";
$password = "";
$DBname = "bd1";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$DBname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifier que l'ID est bien passé dans l'URL
    if (isset($_REQUEST["id"])) {
        $id = $_REQUEST["id"];

        // Requête SQL sécurisée avec prepare
        $sql = "DELETE FROM livre WHERE Num_livre = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            // Rediriger vers la liste après suppression
            header("Location: livre.php");
            exit;
        } else {
            echo "Erreur lors de la suppression.";
        }
    } else {
        echo "ID non fourni.";
    }

} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>