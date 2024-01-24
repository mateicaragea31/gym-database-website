<?php
    include 'connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $tip = mysqli_real_escape_string($conn, $_POST['tip']);

        //b.	Afisez ziua cu cel mai mare nr de abonamente create pentru un tip introdus de la tastatura
        $sql = "SELECT DATE_FORMAT(a2m.`DataInregistrare`, '%Y-%m-%d') AS RegistrationDate, COUNT(*) AS MembershipCount
            FROM `abonamente2membrii` AS a2m
            WHERE a2m.`AbonamentID` IN (
                SELECT `AbonamentID`
                FROM `Abonamente`
                WHERE `Tip` = '$tip'
            )
            GROUP BY RegistrationDate
            ORDER BY MembershipCount DESC
            LIMIT 1";

        // Perform the database query
        $result = $conn->query($sql);

        // Check for errors
        if (!$result) {
            die("SQL Error: " . $conn->error);
        }

        if ($result->num_rows > 0) {
            echo "<h1>The day with the most memberships created for type $tip is: </h1>";
            echo "<h2>RegistrationDate | MembershipCount</h2>";
            while ($row = $result->fetch_assoc()) {
                echo "<p>" . $row["RegistrationDate"] . " | " . $row["MembershipCount"] . "</p>";
            }
        } else {
            echo "<p>No memberships found for type '$membershipType'.</p>";
        }

        mysqli_close($conn);
    }
?>
