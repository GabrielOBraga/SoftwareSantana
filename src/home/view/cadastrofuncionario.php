<!DOCTYPE html>
<?php include(__DIR__ . "/../view/fix/header.php") ?>

<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Formulário de Cadastro de Funcionarios - Software Otica Santana</title>

    <!-- Bootstrap CSS -->
    <link href="../../santana/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<h1> Formulario de Cadastro de Funcionario - Software Otica Santana</h1>
<h2> Preencha o formulário abaixo para cadastrar novo Funcionario</h2><br />

<form action="/santana/front.php/cFuncionario" method="POST" id="basicBootstrapForm" class="form-horizontal">

    <fieldset>
        <legend>Dados do Funcionário</legend>
    <div class="form-group">
        <label class="col-xs-3 control-label">Nome Completo</label>
        <div class="col-xs-4">
            <input type="text" class="form-control" name="firstName" placeholder="Primeio Nome" />
        </div>
        <div class="col-xs-4">
            <input type="text" class="form-control" name="lastName" placeholder="Sobrenome" />
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-3 control-label">CPF</label>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="cpf" placeholder="Ex: 123.456.789-12" />
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-3 control-label">Data de Nascimento</label>
        <div class="col-xs-1">
            <input type="number"  maxlength="2" class="form-control" name="dia" placeholder="dd" />
        </div>
        <div class="col-xs-1">
            <input type="number"  maxlength="2" class="form-control" name="mes" placeholder="mm" />
        </div>
        <div class="col-xs-1">
            <input type="number"  maxlength="4" class="form-control" name="ano" placeholder="aaaa" />
        </div>
    </div>
    </fieldset>

    <fieldset>
        <legend>Endereço</legend>
        <div class="form-group">
            <label class="col-xs-3 control-label">Rua</label>
            <div class="col-xs-4">
                <input type="text" class="form-control" name="rua" placeholder="Ex: Av. Predo Ludovico" />
            </div>
            <div class="col-xs-4">
                <input type="text" class="form-control" name="numerorua" placeholder="Ex: 2020" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-3 control-label">CEP</label>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="cep" placeholder="Ex: 75.091-125" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-3 control-label">Data de Nascimento</label>
            <div class="col-xs-1">
                <input type="number"  maxlength="2" class="form-control" name="dia" placeholder="dd" />
            </div>
            <div class="col-xs-1">
                <input type="number"  maxlength="2" class="form-control" name="mes" placeholder="mm" />
            </div>
            <div class="col-xs-1">
                <input type="number"  maxlength="4" class="form-control" name="ano" placeholder="aaaa" />
            </div>
        </div>
    </fieldset>

    <fieldset>
    <legend>Dados de login</legend>

    <div class="form-group">
        <label class="col-xs-3 control-label">Username</label>
        <div class="col-xs-5">
            <input type="text" class="form-control" name="username" />
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-3 control-label">Email</label>
        <div class="col-xs-5">
            <input type="email" class="form-control" name="email" />
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-3 control-label">Login do Funcionário</label>
        <div class="col-xs-5">
            <input type="text" class="form-control" name="username" />
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-3 control-label">Senha</label>
        <div class="col-xs-5">
            <input type="password" class="form-control" name="password" />
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-3 control-label">Confirme a Senha</label>
        <div class="col-xs-5">
            <input type="password" class="form-control" name="checkpassword" />
        </div>
    </div>
    </fieldset>

    <div class="form-group">
        <div class="col-xs-9 col-xs-offset-3">
            <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Salvar</button>
        </div>
    </div>
</form>

<!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
<script src="../../santana/bootstrap/js/jquery.js"></script>
<script src="../../santana/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>