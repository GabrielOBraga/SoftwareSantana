<!DOCTYPE html>
<html>
<head>
    <title>Formulário de Cadastro de Funcionarios - Software Otica Santana</title>
    <meta name="description" content="Aprenda a criar um site completo que usa formulários em HTML">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
<h1> Formulario de Cadastro de Funcionario - Software Otica Santana</h1>
<h2> Preencha o formulário abaixo para cadastrar novo Funcionario</h2><br />

<form action="/santana/front.php/cFuncionario" method="POST">

    <!-- DADOS PESSOAIS-->
    <fieldset>
        <legend>Dados Pessoais</legend>
        <table cellspacing="10">
            <tr>
                <td>
                    <label for="nome">Nome: </label>
                </td>
                <td align="left">
                    <input type="text" name="name">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Nascimento: </label>
                </td>
                <td align="left">
                    <input type="text" name="dia" size="2" maxlength="2" placeholder="dd">
                    <input type="text" name="mes" size="2" maxlength="2" placeholder="mm">
                    <input type="text" name="ano" size="4" maxlength="4" placeholder="aaaa">
                </td>
            </tr>
            <tr>
                <td>
                    <label>CPF:</label>
                </td>
                <td align="left">
                    <input type="text" name="cpf" size="9" maxlength="9"> - <input type="text" name="cpf2" size="2" maxlength="2">
                </td>
            </tr>
        </table>
    </fieldset>

    <br />
    <!-- ENDEREÇO -->
    <fieldset>
        <legend>Dados de Endereço</legend>
        <table cellspacing="10">

            <tr>
                <td>
                    <label for="rua">Rua:</label>
                </td>
                <td align="left">
                    <input type="text" name="rua">
                </td>
                <td>
                    <label for="numero">Numero:</label>
                </td>
                <td align="left">
                    <input type="text" name="numero" size="4">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="cep">CEP: </label>
                </td>
                <td align="left">
                    <input type="text" name="cep" size="5" maxlength="5"> - <input type="text" name="cep2" size="3" maxlength="3">
                </td>
            </tr>
        </table>
    </fieldset>
    <br />
    <!-- DADOS DE LOGIN -->
    <fieldset>
        <legend>Dados de login</legend>
        <table cellspacing="10">
            <tr>
                <td>
                    <label for="email">E-mail: </label>
                </td>
                <td align="left">
                    <input type="text" name="email">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="imagem">Imagem de perfil:</label>
                </td>
                <td>
                    <input type="file" name="imagem" >

                </td>
            </tr>
            <tr>
                <td>
                    <label for="login">Login de usuário: </label>
                </td>
                <td align="left">
                    <input type="text" name="login">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="pass">Senha: </label>
                </td>
                <td align="left">
                    <input type="password" name="pass">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="passconfirm">Confirme a senha: </label>
                </td>
                <td align="left">
                    <input type="password" name="passconfirm">
                </td>
            </tr>
        </table>
    </fieldset>
    <br />
    <input type="submit">
    <input type="reset" value="Limpar">
</form>

</body>
</html>