<?php
    include 'connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nume = mysqli_real_escape_string($conn, $_POST['nume']);
        $prenume = mysqli_real_escape_string($conn, $_POST['prenume']);

        //a.	Afisez cel mai scump abonament al carui membru il introduc de la tastatura
        $sql = "SELECT mb.`Nume`, mb.`Prenume`, ab.`Tip`, ab.`Pret`
            FROM `Abonamente` AS ab
            JOIN `abonamente2membrii` AS ab2mb ON ab.`AbonamentID` = ab2mb.`AbonamentID`
            JOIN `Membrii` AS mb ON ab2mb.`MembruID`= mb.`MembruID`
            WHERE mb.`Nume` = '$nume' AND mb.`Prenume` = '$prenume' AND ab.`AbonamentID` = (
                SELECT `AbonamentID`
                FROM `Abonamente`
                ORDER BY `Pret` DESC
                LIMIT 1
            )";

        // Perform the database query
        $result = $conn->query($sql);

        // Check for errors
        if (!$result) {
            die("SQL Error: " . $conn->error);
        }

        if ($result->num_rows > 0) {
            echo "<h1>The most expensive membership for $nume $prenume is: </h1>";
            echo "<h2>Nume Prenume Tip Pret</h2>";
            while ($row = $result->fetch_assoc()) {
                echo "<p>" . $row["Nume"] . " " . $row["Prenume"] . " " . $row["Tip"] . " " . $row["Pret"] . "</p>";
            }
        } else {
            echo "<p>No matching member found.</p>";
        }

        mysqli_close($conn);
    }
?>
