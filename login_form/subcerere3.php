<?php
    include 'connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nume = mysqli_real_escape_string($conn, $_POST['nume']);


        //c.	Afisez angajatul cu cele mai multe rezervari sustinute pentru clasa introdusa de la tastatura
        $sql = "SELECT a.`Nume`, a.`Prenume`, (
                SELECT COUNT(*)
                FROM `Rezervari` AS r
                JOIN `Clase` AS c ON r.`ClasaID` = c.`ClasaID`
                WHERE a.`AngajatID` = r.`AngajatID` AND c.`Nume` = '$nume'
            ) AS NumarClase
            FROM `Angajati` AS a
            ORDER BY NumarClase DESC
            LIMIT 1";

        // Realizează interogarea în baza de date
        $result = $conn->query($sql);

        // Verifică erorile
        if (!$result) {
            die("Eroare SQL: " . $conn->error);
        }

        if ($result->num_rows > 0) {
            echo "<h1>Angajatul cu cele mai multe clase susținute pentru clasa '$nume' este: </h1>";
            echo "<h2>Nume | Prenume | Număr de Clase</h2>";
            while ($row = $result->fetch_assoc()) {
                echo "<p>" . $row["Nume"] . " | " . $row["Prenume"] . " | " . $row["NumarClase"] . "</p>";
            }
        } else {
            echo "<p>Niciun angajat găsit pentru clasa '$numeClasa'.</p>";
        }

        mysqli_close($conn);
    }
?>
