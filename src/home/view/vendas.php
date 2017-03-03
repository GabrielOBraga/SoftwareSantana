<!DOCTYPE html>
<?php include(__DIR__ . "/../view/fix/header.php") ?>

<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de produtos - Software Ótica Santana</title>

    <!-- Bootstrap CSS -->
    <link href="../../santana/bootstrap/css/bootstrap.min.css" rel="stylesheet">


</head>

<body>

<h1> Nova Vendas - Software Ótica Santana</h1>


<div id="main" class="container-fluid">
    <h3 class="page-header">Adicionar Vendas</h3>

    <form action="/santana/front.php/cProdutos" method="POST">
        <!-- area de campos do form -->

        <select class="selector">
            <?php foreach($_SESSION->$produto as $produto){
                $a = $a."<option vaule='volvo'>Volvo</option>";
            } ?>
            <option value="volvo">Volvo</option>
        </select>


        <div id="actions" class="row">

                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="/santana/front.php/adm" class="btn btn-default">Cancelar</a>
            </div>

        </div>

    </form>

    <!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
    <script src="../../santana/bootstrap/js/jquery.js"></script>
    <script src="../../santana/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
