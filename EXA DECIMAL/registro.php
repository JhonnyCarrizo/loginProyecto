<?php
    require_once('clase/condicion.php');
    require_once('clase/regis_herra.php');
    $busCondiciones = Condicion::buscarTodo();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/registro.css">
    <link rel="icon" href="img/logo.png">
    <title>Registro</title>
</head>
<body>
    <form action="controlador/pro_herr.php" method="POST" onsubmit="return enviar()" autocomplete="off">
        <div id="boxTitulo"><h1>Registro de herramientas</h1></div>
        <div id="boxLeft">
            <div id="boxTools">
                <label for="tools" class="left">Herramienta</label>
                <input type="text" name="tools" id="tools" class="left">
            </div>
            <div id="boxSerie" >
                <label for="serie" class="left">Serie</label>
                <input type="text" name="serie" id="serie" class="left">
            </div>
            <div id="boxMarca" >
                <label for="marca" class="left">Marca</label>
                <input type="text" name="marca" id="marca" class="left">
            </div>
        </div>
        <div id="boxMedium">
            <label for="estado" class="medium">Diagnóstico de Estado</label>
            <textarea name="estado" id="estado" class="medium"></textarea>
        </div>
        <div id="boxRight">
        <label>Condición Operativa</label><br>
        <?php

            while ($datCond = $busCondiciones->fetch_assoc()) {

                echo
                '
                    <label>
                    <input type="radio" name="condiciones[]" value="'.$datCond['id'].'">
                ';
                echo $datCond['condicion'];
                echo '</label><br>';
            }
        ?>
         </div>
        <div id="boxEntrar"><input type="submit" name="guardar" value="Envíar"></div>
    </form>
    <script src="assets/javascript/registro.js"></script>
</body>
</html>