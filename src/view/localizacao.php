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
<?php echo $e ?>
<div style=" margin: 5% 12.5%; position: relative; top:0 ">

    <h1>Otica Movel</h1>

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <section>
        <article>
            <p><span id="status">Por favor aguarde enquanto nós tentamos locar você...</span></p>
        </article>
    </section>

</div>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyACRVtG_hhiP2-1D3fMjmGJyGXj44K9iGw&amp;sensor=false"></script>
<script src="../../santana/bootstrap/js/mapa.js"></script>
<script src="../../santana/bootstrap/js/jquery.js"></script>
<script src="../../santana/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>