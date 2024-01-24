<?php
// Include the database connection file
include 'connection.php';

echo "<pre>";
print_r($_POST);
echo "</pre>";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $telefon = mysqli_real_escape_string($conn, $_POST['telefon']);

    // Construct the SQL query to delete the record
    $sql = "DELETE m, ab, ab2mb
            FROM `Membrii` m
            INNER JOIN `abonamente2membrii` AS ab2mb ON m.`MembruID` = ab2mb.`MembruID`
            INNER JOIN `Abonamente` AS ab ON ab2mb.`AbonamentID` = ab.`AbonamentID`
            WHERE m.`Telefon` = '$telefon'";

    // Echo the SQL query for debugging
    echo "SQL Query: " . $sql . "<br>";

    // Execute the query and handle errors
    if (mysqli_query($conn, $sql)) {
        // Successful deletion
        echo "Query deleted successfully <br>";
        header("Location: mb.php?success=1");
    } else {
        // Error in deletion
        echo "Error: " . mysqli_error($conn) . "<br>";
        echo "SQL Query: " . $sql . "<br>";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
