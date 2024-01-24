<?php
// Include the database connection file
include 'connection.php';

// Enable MySQLi error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

echo "<pre>";
print_r($_POST);
echo "</pre>";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $tip = mysqli_real_escape_string($conn, $_POST['tip']);
    $pret = mysqli_real_escape_string($conn, $_POST['pret']);
    $stare_plata = mysqli_real_escape_string($conn, $_POST['stare_plata']);
    $telefon = mysqli_real_escape_string($conn, $_POST['telefon']);

    // Construct the SQL query to update the table
    $sql = "UPDATE `Abonamente` AS ab
            INNER JOIN `abonamente2membrii` AS ab2mb ON ab.`AbonamentID` = ab2mb.`AbonamentID`
            INNER JOIN `Membrii` AS m ON ab2mb.`MembruID` = m.`MembruID`
            SET ab.`Tip` = '$tip',
                ab.`Pret` = '$pret',
                ab.`Stare_Plata` = '$stare_plata'
            WHERE m.`Telefon` = '$telefon'";

    // Debugging output
    echo "SQL Query: " . $sql . "<br>";

    try {
        // Execute the query
        if (mysqli_query($conn, $sql)) {
            // Successful update
            echo "Query updated successfully <br>";
            header("Location: ab.php?success=1");
            exit();
        } else {
            // Error in update
            echo "Error: Update query execution failed <br>";
        }
    } catch (Exception $e) {
        // Exception handling
        echo "Caught exception: " . $e->getMessage() . "<br>";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
