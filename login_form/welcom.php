<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="styleWelcom.css">
</head>
<body>

<div class="header">
  <a href="#default" class="logo">CompanyLogo</a>
  <div class="header-right">
    <a class = "active" href = "mb.php">Membrii</a>
    <a class ="active" href = "ab.php">Abonamente</a>
    <a class = "active" href = "ab2mb.php">Abonamente2Membrii</a>
    <a class = "active" href = "index.php">Log Out</a>
  </div>
</div>

<div style="padding-left:20px">
  <h1>Login Successful!</h1>
  <h2>Admin Page</h2>

  <form id="searchForm" method="post" action="interogare1.php">
    <p>1. Enter the Name of the Member you wish to search:</p>
        <label for="nume"> Nume:</label>
        <input type="text" id="nume" name="nume" required></br>

        <label for="prenume"> Prenume:</label>
        <input type="text" id="prenume" name="prenume" required></br>

        <label for="telefon">Telefon:</label>
        <input type="tel" id="telefon" name="telefon" required><br>

        <input type="submit" value="Submit">
    </form>

    <form id="searchForm" method="post" action="interogare2.php">
    <p>2. Enter the Expiring date you wish to search:</p>
        <label for="data_expirare"> Data Expirare</label>
        <input type="date" id="data_expirare" name="endDate" required></br>

        <input type="submit" value="Submit"></br>
    </form>

    <form id="searchForm" method="post" action="interogare3.php">
    <p>3. Enter the Abonament type you wish find members for:  </p>
        <label for="tip"> Data Expirare</label>
        <input type="text" id="tip" name="tip" required></br>

        <input type="submit" value="Submit">
    </form>

    <form id="searchForm" method="post" action="interogare4.php">
    <p>4. Enter the Date and Start Hour you wish to find members for:</p>
        <label for="datetime">Date/Time Start:</label>
        <input type="datetime-local" id="datetime" name="datetime" required></br>
 
        <input type="submit" value="Submit">
    </form>

    <form id="searchForm" method="post" action="interogare5.php">
    <p>5. Enter the Name : </p>
        <label for="name">Date:</label>
        <input type="name" id="name" name="nume" required></br>
 
        <input type="submit" value="Submit">
    </form>

    <form id="searchForm" method="post" action="interogare6.php">
    <p>6. Enter the Date from which you wish to employees: </p>
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required></br>
 
        <input type="submit" value="Submit">
    </form>

</p>Subcereri</p>

    <form id="searchForm" method="post" action="subcerere1.php">
    <p>1. Enter the Name of the member to find his most expensive membership: </p>
        <label for="name">Nume:</label>
        <input type="name" id="name" name="nume" required></br>

        <label for="name">Prenume:</label>
        <input type="name" id="name" name="prenume" required></br>
 
        <input type="submit" value="Submit">
    </form>

    <form id="searchForm" method="post" action="subcerere2.php">
    <p>2. Enter the Type of membership you want to count in a day: </p>
        <label for="tip">Tip:</label>
        <input type="text" id="tip" name="tip" required></br>
 
        <input type="submit" value="Submit">
    </form>

    <form id="searchForm" method="post" action="subcerere3.php">
    <p>3. Enter the Name of the class you want to find the employee with the most attendances: </p>
        <label for="nume">Nume Clasa:</label>
        <input type="text" id="nume" name="nume" required></br>
 
        <input type="submit" value="Submit">
    </form>

    <form id="searchForm" method="post" action="subcerere4.php">
    <p>4. Enter the Name of the employee to find the member with the most attendances: </p>
    <label for="numeAngajat">Nume Angajat:</label>
    <input type="text" id="numeAngajat" name="numeAngajat" required>

    <label for="prenumeAngajat">Prenume Angajat:</label>
    <input type="text" id="prenumeAngajat" name="prenumeAngajat" required>

    <input type="submit" value="Submit">
    </form>

</div>

</body>
</html>