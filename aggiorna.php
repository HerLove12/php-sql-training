<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aggiorna Voto Recensione</title>
</head>
<body>

<?php
// Connessione al database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cinema_finale";

try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    $id_recensione = $_POST['id_recensione'];
    if($_POST["gender"] == "aggiorna"){
        // Recupero dei dati dal form
        $nuovo_voto = $_POST['nuovo_voto'];

        // Query per l'aggiornamento del voto della recensione
        $sql = "UPDATE recensioni SET Voto = '$nuovo_voto' WHERE IDRecensione = '$id_recensione'";

        if ($conn->query($sql) === TRUE &&$conn->affected_rows > 0) {
            echo " Recensione  aggiornata correttamente";
        } else {
            throw new Exception("Errore durante l'aggiornamento");
        }
    } else if($_POST["gender"] == "cancella"){
        $sql = "DELETE FROM recensioni WHERE IDRecensione = '$id_recensione'";

        if ($conn->query($sql) === TRUE && $conn->affected_rows > 0) {
            echo "Recensione eliminata correttamente";
        } else {
            throw new Exception("Errore durante l'eliminazione");
        }
    }
    echo "<br>affected rows:  ".$conn->affected_rows;
    $conn->close();
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<!-- Link per tornare alla home page -->
<p><a href="index.html">Torna alla Home Page</a></p>

</body>
</html>
