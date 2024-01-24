<?php
    include 'connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $tip = mysqli_real_escape_string($conn, $_POST['tip']);


        //c.	Selectez numele si prenumele membrilor al caror tip de abonament il introduc de la tastatura
        $sql = "SELECT m.`Nume`, m.`Prenume`
                FROM `Membrii` AS m
                JOIN `abonamente2membrii` AS ab2mb ON m.`MembruID` = ab2mb.`MembruID`
                JOIN `Abonamente` AS ab ON ab2mb.`AbonamentID` = ab.`AbonamentID`
                WHERE ab.`Tip` = '$tip'";
                
        
        // Perform the database query
        $result = $conn->query($sql);

        // Check for errors
        if (!$result) {
            die("SQL Error: " . $conn->error);
        }

        // Display the results
        if ($result->num_rows > 0) {
            echo "<h1>Members whom Memberships are type $tip :</h1>";
            echo "<h2>Nume Prenume</h2>";
            while ($row = $result->fetch_assoc()) {
                echo "<p>" . $row["Nume"] . " " . $row["Prenume"] . "</p>";
            }
        } else {
            echo "<p>No members found for $endDateConverted.</p>";
        }
        mysqli_close($conn);
    }
?>
