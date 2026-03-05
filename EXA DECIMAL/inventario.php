<?php
    require_once('clase/regis_herra.php');
    require_once('clase/condicion.php');
    $busCondiciones = Condicion::buscarTodo();
    $busHerramienta= Herramienta::buscarTodo();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link rel="stylesheet" href="assets/css/inventario.css">
    <link rel="icon" href="img/logo.png" >
</head>

<body>

<div id="boxPadre">
        <div id="boxTitulo" ><h1>Buscador de herramientas</h1></div>
    <form method="POST" action="pro_herr.php" onsubmit="return enviar()">
    <?php
        if($busHerramienta->num_rows == 0)  {
            echo 'No existen registros en la base de datos';
        } else {
            echo '<div id="boxTabla" >';
            echo '<table>';
            echo '<tr>';
            echo '
            <th>Herramienta</th>
            <th>Serie</th>
            <th>Marca</th>
            <th>Diagnóstico de Estado</th>
            <th>Condición Operativa</th>';
            
             echo '</tr>';
            while($data = $busHerramienta->fetch_array()) {
                echo '<tr>';
                    echo '
                    <td>'.$data['tools'].'</td>
                    <td>'.$data['serie'].'</td>
                    <td>'.$data['marca'].'</td>
                    <td id="estado">'.$data['estado'].'</td>
                    <td>'.$data['condicion'].'</td>';
                echo '</tr>';
            }
            echo '</table>';
            '</div>';
        }
    ?>
</div>
</body>
</html>