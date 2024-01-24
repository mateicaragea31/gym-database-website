<?php
// Check if the success parameter is set
if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo '<script>alert("Insert successful");</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="tabels.css">
    <title>Abonamente</title>
</head>

<body>
    <h1>Abonamente Table Page</h1>
    <br><br>

    <!-- Insert Form -->
    <form id="insertForm" method="post" action="insert.php">
        <h2> - - Insert - -</h2>
        <label for="nume_insert">Nume:</label>
        <input type="text" id="nume_insert" name="nume" required><br>

        <label for="prenume_insert">Prenume:</label>
        <input type="text" id="prenume_insert" name="prenume" required><br>

        <label for="email_insert">Email:</label>
        <input type="email" id="email_insert" name="email" required><br>

        <label for="adresa_insert">Adresa:</label>
        <input type="text" id="adresa_insert" name="adresa" required><br>

        <label for="telefon_insert">Telefon:</label>
        <input type="tel" id="telefon_insert" name="telefon" required><br>

        <label for="tip_insert">Tip Abonament:</label>
        <input type="text" id="tip_insert" name="tip" required><br>

        <label for="pret_insert">Pret Abonament:</label>
        <input type="number" id="pret_insert" name="pret" required><br>

        <label for="stare_plata">Status Plata Abonament:</label>
        <input type="text" id="stare_plata" name="stare_plata" required><br>

        <label for="stDate">Data Inregistrare</label>
        <input type="date" id="stDate" name="stDate" required><br>

        <label for="endDate">Data Expirare</label>
        <input type="date" id="endDate" name="endDate" required><br>

        <button id="insertButton" type="submit">Insert</button>
    </form>
    <br><br><br>
    <!-- Update Form -->
    <form id="updateForm" method="post" action="updateAb.php">
        <h2>- - Update - -</h2>
        <label for="tip_insert">Tip Abonament:</label>
        <input type="text" id="tip_insert" name="tip" required><br>

        <label for="pret_insert">Pret Abonament:</label>
        <input type="number" id="pret_insert" name="pret" required><br>

        <label for="stare_plata">Status Plata Abonament:</label>
        <input type="text" id="stare_plata" name="stare_plata" required><br>

        <label for="telefon_update">Telefon:</label>
        <input type="tel" id="telefon_update" name="telefon" required><br>

        <!-- Additional fields for update, if needed -->

        <button id="updateButton" type="submit">Update</button>
    </form>
    <br><br><br>
    <!-- Delete Form -->
    <form id="deleteForm" method="post" action="deleteAb.php">
        <h2>- - Delete - -</h2>
        <label for="tip_insert">Tip Abonament:</label>
        <input type="text" id="tip_insert" name="tip" required><br>

        <label for="pret_insert">Pret Abonament:</label>
        <input type="number" id="pret_insert" name="pret" required><br>

        <label for="stare_plata">Status Plata Abonament:</label>
        <input type="text" id="stare_plata" name="stare_plata" required><br>

        <label for="telefon_update">Telefon:</label>
        <input type="tel" id="telefon_update" name="telefon" required><br>

        <button id="deleteButton" type="submit">Delete</button><br><br>
    </form>
    <br><br><br>
    <!-- Go Back Button -->
    <button id="goBackButton" onclick="goBackFunction()">Go Back</button>

    <script>
        function goBackFunction() {
            window.location.href = 'welcom.php';
        }
        
    </script>
</body>

</html>
