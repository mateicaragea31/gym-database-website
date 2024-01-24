<?php 
    include("connection.php");
    ?>
    
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    
    <body>
        <div class = "box">
            <h1>Good to see you again!</h1>
            <h3>Everything sorted by a click.</h3>
            <a href="#" class="fa fa-linkedin"></a>
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-instagram"></a>
        </div>
        <div id="form">
            <h1>Please Login to Your Account</h1>
            <form name="form" action="login.php" onsubmit="return isvalid()" method="POST">
                <label><b>Username: </b></label>
                <input type="text" id="user" name="user" value=""></br></br>
                <label><b>Password:</b></label>
                <input type="password" id="pass" name="pass" value=""></br></br>
                <center><input type="submit"  id="btn" value="Login" name = "submit"/></center>
                <br><a href="#" class="forgot-password">Forgot Password?</a></br>
            </form>
        </div>
        <script>
            function isvalid(){
                var user = document.form.user.value;
                var pass = document.form.pass.value;
                if(user.length=="" && pass.length==""){
                    alert(" Username and password field is empty!!!");
                    return false;
                }
                else if(user.length==""){
                    alert(" Username field is empty!!!");
                    return false;
                }
                else if(pass.length==""){
                    alert(" Password field is empty!!!");
                    return false;
                }
                
            }
        </script>
    </body>
</html>