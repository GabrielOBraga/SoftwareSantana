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
<div style="margin: 0 5%; position: relative ; align-items: center ; padding-top: 0">

<!-- /.container -->
<div class="container" style="align-items: center  ; position: relative ; padding-top: 5%">

    <div class="row" style="margin: 0 5%; width: 90% ;align-items: center ">
        <div class="box" style="align-items: center ">
            <div class="col-lg-12 text-center" style="align-items: center">
                <div id="carousel-example-generic" class="carousel slide" style="align-items: center ">
                    <!-- Indicators -->
                    <ol class="carousel-indicators hidden-xs">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner"  >
                        <div class="item active">
                            <img class="img-responsive img-full" src="/santana/img/produto01.jpg" style="width:auto ;height: 440px">
                        </div>
                        <div class="item">
                            <img class="img-responsive img-full" src="/santana/img/produto02.jpg" style="width:auto ;height: 440px">
                        </div>
                        <div class="item">
                            <img class="img-responsive img-full" src="/santana/img/produto03.jpg" style="width:auto ;height: 440px">
                        </div>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="icon-prev"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="icon-next"></span>
                    </a>
                </div>
                <h2 class="brand-before">
                    <small>Welcome to</small>
                </h2>
                <h1 class="brand-name">Business Casual</h1>
                <hr class="tagline-divider">
                <h2>
                    <small>By
                        <strong>Start Bootstrap</strong>
                    </small>
                </h2>

                Bem vindo a nossa home page!

                Na area de Otica Movel pode se encontrar nosso novo e unico serviço de Otica na porta da sua casa
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