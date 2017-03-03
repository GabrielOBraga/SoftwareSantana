<!DOCTYPE html>
<?php include(__DIR__ . "/../view/fix/header.php") ?>

<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Bootstrap CSS -->
    <link href="../../santana/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../santana/bootstrap/css/jquery.fileupload.css">
    <link rel="stylesheet" href="../../santana/bootstrap/css/jquery.fileupload-ui.css">
    <link rel="stylesheet" href="../../santana/bootstrap/css/style.css">
</head>
<body>

<form action="/santana/front.php/vendas" method="get">
    <button class="btn btn-link">Vendas</button>
</form>

<form action="/santana/front.php/cProdutos" method="get">
    <button class="btn btn-link">Cadastrar Produtos</button>
</form>


<!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
<script src="../../santana/bootstrap/js/jquery.js"></script>
<script src="../../santana/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>