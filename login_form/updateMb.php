<?php
// Include the database connection file
include 'connection.php';

echo "<pre>";
print_r($_POST);
echo "</pre>";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $nume = mysqli_real_escape_string($conn, $_POST['nume']);
    $prenume = mysqli_real_escape_string($conn, $_POST['prenume']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $adresa = mysqli_real_escape_string($conn, $_POST['adresa']);
    $telefon = mysqli_real_escape_string($conn, $_POST['telefon']);
    
    // Construct the SQL query to update the table
    $sql = "UPDATE `Membrii` SET 
        `Nume` = '$nume', 
        `Prenume` = '$prenume', 
        `Email` = '$email', 
        `Adresa` = '$adresa' 
        WHERE `Membrii`.`Telefon` = '$telefon'";

    // Execute the query and handle errors
    if (mysqli_query($conn, $sql)) {
        // Successful update
        echo "Query updated successfully <br>";
        header("Location: mb.php?success=1");
        exit();
    } else {
        // Error in update
        echo "Error: " . mysqli_error($conn) . "<br>";
        echo "SQL Query: " . $sql . "<br>";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
