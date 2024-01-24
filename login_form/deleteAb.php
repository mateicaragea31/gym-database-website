<?php
// Include the database connection file
include 'connection.php';

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

    // Construct the SQL query to delete the record
    $sql = "DELETE ab, ab2mb
            FROM `Abonamente` ab
            INNER JOIN `abonamente2membrii` AS ab2mb ON ab.`AbonamentID` = ab2mb.`AbonamentID`
            INNER JOIN `Membrii` AS m ON ab2mb.`MembruID` = m.`MembruID`
            WHERE   ab.`Tip` = '$tip'
                    AND ab.`Pret` = '$pret'
                    AND ab.`Stare_Plata` = '$stare_plata'
                    AND m.`Telefon` = '$telefon'";

    // Echo the SQL query for debugging
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
