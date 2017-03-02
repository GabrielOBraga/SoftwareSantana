<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de produtos - Software Ótica Santana</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>


<body>
<h1> Cadastro de produtos - Software Ótica Santana</h1>
<h2> Preencha o formulário abaixo com os dados do novo produto:</h2><br />

<form action="/santana/front.php/cProdutos" method="POST">

    <fieldset>
        <legend>Dados do produto</legend>
        <table cellspacing="10">
            <tr>
                <td>
                    <label for="descricao">Descrição: </label>
                </td>
                <td align="left">
                    <input type="text" name="descricao" placeholder="Descrição do produto...">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="valor">Valor de venda: </label>
                </td>
                <td align="left">
                    <input type="text" name="valor" placeholder="R$ 00,00">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="estoque">Quantidade em estoque: </label>
                </td>
                <td align="left">
                    <input type="int" name="estoque" placeholder="000">
                </td>
            </tr>
        </table>
    </fieldset>
</form>

</body>
</html>
