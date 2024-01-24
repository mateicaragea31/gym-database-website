<?php
    include 'connection.php';

    error_reporting(E_ALL);
ini_set('display_errors', '1');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $numeAngajat = mysqli_real_escape_string($conn, $_POST['nume']);
        $prenumeAngajat = mysqli_real_escape_string($conn, $_POST['prenume']);


        //d.	Afisez membrul cu cele mai multe aparitii la rezervarile sustinute de un angajat introdus de la tastatura
        $sql = "SELECT m.`Nume`, m.`Prenume`, (
            SELECT COUNT(*)
            FROM `Rezervari` AS rez
            JOIN `Membrii` AS mem ON rez.`MembruID` = mem.`MembruID`
            JOIN `Angajati` AS ang ON rez.`AngajatID` = ang.`AngajatID`
            WHERE ang.`Nume` = '$numeAngajat' AND ang.`Prenume` = '$prenumeAngajat'
        ) AS NumarAparitii
        FROM `Membrii` AS m
        LIMIT 1";

        // Perform the database query
        $result = $conn->query($sql);

        // Check for errors
        if ($result->num_rows > 0) {
            echo "<h1>The member with the most appearances for employee '$numeAngajat $prenumeAngajat' is: </h1>";
            echo "<h2>Nume | Prenume | Număr de Apariții</h2>";
            while ($row = $result->fetch_assoc()) {
                echo "<p>" . $row["Nume"] . " | " . $row["Prenume"] . " | " . $row["NumarAparitii"] . "</p>";
            }
        } else {
            echo "<p>No member found for employee '$numeAngajat $prenumeAngajat'.</p>";
        }

        mysqli_close($conn);
    }
?>
