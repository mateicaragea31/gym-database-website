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
    $tip = mysqli_real_escape_string($conn, $_POST['tip']);
    $pret = mysqli_real_escape_string($conn, $_POST['pret']);
    $stare_plata = mysqli_real_escape_string($conn, $_POST['stare_plata']);
    
    $stDateConverted = date('Y-m-d', strtotime($_POST['stDate']));
    $endDateConverted = date('Y-m-d', strtotime($_POST['endDate']));

    // SQL query to insert data into the 'Membrii' table
    $sql1 = "INSERT INTO Membrii (Nume, Prenume, Email, Adresa, Telefon)
            VALUES ('$nume', '$prenume', '$email', '$adresa', '$telefon');";

    // SQL query to insert data into the 'Abonamente' table
    $sql2 = "INSERT INTO Abonamente (Tip, Pret, Stare_Plata)
            VALUES ('$tip', '$pret', '$stare_plata');";

    // Execute the multiple queries and handle errors
    // Execute the first query
    if (mysqli_query($conn, $sql1)) {
        // Successful insertion
        echo "First query inserted successfully <br>";
    } else {
        // Error in insertion
        echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
    }

    // Execute the second query
    if (mysqli_query($conn, $sql2)) {
        // Successful insertion
        echo "Second query inserted successfully <br>";
        } else {
        // Error in insertion
            echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
        }

    $queryMembrii = "SELECT MembruID FROM Membrii WHERE Nume = '$nume' AND Prenume = '$prenume'";
    $resultMembrii = mysqli_query($conn, $queryMembrii);

    if (!$resultMembrii) {
        // Error in querying Membrii
        echo "Error: " . $queryMembrii . "<br>" . mysqli_error($conn);
    } else {
        $rowMembrii = mysqli_fetch_assoc($resultMembrii);
        $membruID = $rowMembrii['MembruID'];

        // Query to get AbonamentID from Abonamente table
        $queryAbonamente = "SELECT AbonamentID FROM Abonamente WHERE Tip = '$tip'";
        $resultAbonamente = mysqli_query($conn, $queryAbonamente);

        if (!$resultAbonamente) {
            // Error in querying Abonamente
            echo "Error: " . $queryAbonamente . "<br>" . mysqli_error($conn);
        } else {
            $rowAbonamente = mysqli_fetch_assoc($resultAbonamente);
            $abonamentID = $rowAbonamente['AbonamentID'];

            // Insert data into abonamente2membrii table with valid foreign keys
            $sql3 = "INSERT INTO abonamente2membrii (MembruID, AbonamentID, DataInregistrare, DataExpirare)
                            VALUES ('$membruID', '$abonamentID', '$stDateConverted', '$endDateConverted')";

            if (mysqli_query($conn, $sql3)) {
                // Successful insertion
                echo "Third query inserted successfully";
                header("Location: mb.php?success=1");
                exit();
            } else {
                // Error in insertion
                echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
            }
        }
    }

}

// Close the database connection
mysqli_close($conn);
?>
