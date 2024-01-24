<?php
    include 'connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nume = mysqli_real_escape_string($conn, $_POST['nume']);
        $prenume = mysqli_real_escape_string($conn, $_POST['prenume']);
        $telefon = mysqli_real_escape_string($conn, $_POST['telefon']);


        //a.	Selectez Tipul si starea platii unui abonament al carui membru il introduce de la tastatura
        $sql = "SELECT ab.`Tip`, ab.`Stare_Plata`
                FROM `Abonamente` AS ab
                JOIN `abonamente2membrii` AS ab2mb ON ab.`AbonamentID` = ab2mb.`AbonamentID`
                JOIN `Membrii` AS mb ON ab2mb.`MembruID` = mb.`MembruID`
                WHERE mb.`Nume` = '$nume' AND mb.`Prenume` = '$prenume' AND mb.`Telefon` = '$telefon'
                GROUP BY ab.`Tip`, ab.`Stare_Plata`";
        
        // Perform the database query
        $result = $conn->query($sql);

        // Check for errors
        if (!$result) {
            die("SQL Error: " . $conn->error);
        }

        // Display the results
        if ($result->num_rows > 0) {
            echo "<h1>Abonamente for $nume $prenume:</h1>";
            echo "<h2>Tip  Stare_Plata</h2>";
            while ($row = $result->fetch_assoc()) {
                echo "<p>" . $row["Tip"] . " " . $row["Stare_Plata"] . "</p>";
            }
        } else {
            echo "<p>No abonamente found for $nume $prenume.</p>";
        }
        mysqli_close($conn);
    }
?>
