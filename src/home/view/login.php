<!DOCTYPE html>
<?php include(__DIR__ . "/../view/fix/header.php") ?>

<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Bootstrap CSS -->
    <link href="../../santana/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div style=" margin: 5% 12.5%; position: relative; top:0 ">

<ul class="nav navbar-nav" style="align-items: center">
    <li align="right">
    <form action="/santana/front.php/login" method="POST" >

        <div class="container">
            <label><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>
        </div>
        <div class="container">
            <label><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <button type="submit">Login</button>
        </div>

        <div class="container">
            <button type="button" class="cancelbtn">Cancel</button>
            <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
</form>
    </li>
</ul>
</div>
<!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
<script src="../../santana/bootstrap/js/jquery.js"></script>
<script src="../../santana/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>