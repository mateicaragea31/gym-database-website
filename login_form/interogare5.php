<?php
    include 'connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nume = mysqli_real_escape_string($conn, $_POST['nume']);


        //e.	Selectez numele si prenumele angajatilor a caror nume de clasa il introduc de la tastatura
        $sql = "SELECT ang.`Nume`, ang.`Prenume`
                FROM `Angajati` AS ang
                JOIN `Rezervari` AS rez ON ang.`AngajatID` = rez.`AngajatID`
                JOIN `Clase` as c ON rez.`ClaseID` = c.`ClaseID`
                WHERE c.`Nume_Clasa` = '$nume'";
                
        
        // Perform the database query
        $result = $conn->query($sql);

        // Check for errors
        if (!$result) {
            die("SQL Error: " . $conn->error);
        }

        // Display the results
        if ($result->num_rows > 0) {
            echo "<h1>Classes $nume have the employees: </h1>";
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
