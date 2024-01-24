<?php
    include 'connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $datetime = mysqli_real_escape_string($conn, $_POST['datetime']);

        //d.	Selectez numele si prenumele membrilor a caror clase incep la ora introdusa de la tastatura
        $sql = "SELECT m.`Nume`, m.`Prenume`
                FROM `Membrii` AS m
                JOIN `Rezervari` AS rez ON m.`MembruID` = rez.`MembruID`
                JOIN `Clase` AS c ON rez.`ClasaID` = c.`ClasaID`
                WHERE c.`Ora_Incepere` = '$datetime'";
                
        
        // Perform the database query
        $result = $conn->query($sql);

        // Check for errors
        if (!$result) {
            die("SQL Error: " . $conn->error);
        }

        // Display the results
        if ($result->num_rows > 0) {
            echo "<h1>Members whom Classes begin  at $datetime are :</h1>";
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
