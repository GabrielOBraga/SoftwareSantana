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

<div class="container-fluid">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Software Santana | Login</div>
                <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Esqueceu a senha?</a></div>
            </div>

            <div style="padding-top:30px" class="panel-body" >

                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                <ul class="nav navbar-nav" style="align-items: center">
    <li align="right">
       <div>

            <form action="/santana/front.php/login" method="POST" class="form-horizontal" role="form">

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="uname" type="text" class="form-control" name="uname" value="" placeholder="Usuário">
                </div>

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="psw" type="password" class="form-control" name="psw" placeholder="Senha">
                </div>

                <div class="input-group">
                    <div class="checkbox">
                        <label>
                            <input id="login-remember" type="checkbox" name="remember" value="1"> Lembrar
                        </label>
                    </div>
                </div>

                <div style="margin-top:10px" class="form-group">
                    <!-- Button -->

                    <div class="col-sm-12 controls">
                        <button id=btn-login" type="submit"  class="btn btn-success">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </li>
</ul>
</div>
        </div>
    </div>
</div>
</div>

<!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
<script src="../../santana/bootstrap/js/jquery.js"></script>
<script src="../../santana/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>