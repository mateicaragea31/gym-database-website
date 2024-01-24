<?php
    include 'connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $dateConverted = date('Y-m-d', strtotime($_POST['date']));


        
        //f.	Selectez numele si prenumele angajatilor ce au rezervari in ziua introdusa de la tastatura

        $sql = "SELECT ang.`Nume`, ang.`Prenume`
                FROM Angajati AS ang
                JOIN Rezervari AS rez ON ang.`AngajatID` = rez.`AngajatID`
                WHERE rez.`Data` = '$date'";
                
        
        // Perform the database query
        $result = $conn->query($sql);

        // Check for errors
        if (!$result) {
            die("SQL Error: " . $conn->error);
        }

        // Display the results
        if ($result->num_rows > 0) {
            echo "<h1>Employees that worked on $date: </h1>";
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
