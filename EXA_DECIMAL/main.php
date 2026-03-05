<?php
    require_once('clase/condicion.php');
    require_once('clase/regis_herra.php');
    $busCondiciones = Condicion::buscarTodo();
    $busHerramienta = Herramienta::buscarTodo();
    $tools = '';
    $serie = '';
    $marca = '';
    $estado = '';
    $method = 'POST';
    if (isset($_GET['accion']) && $_GET['accion'] == 'cargarRegistro') {
        $method = 'GET';
        $data = Herramienta::findById($_GET['herramientaId']);
        $tools = $data['tools']??'';
        $serie = $data['serie']??'';
        $marca = $data['marca']??'';
        $estado = $data['estado']??'';
        $condicionesAsignados = $data['condiciones']??[];
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
<link rel="stylesheet" href="assets/css/main.css"></head>

<body>
    <!-- Registro -->
    <div id="boxPadre">
            <form method="<?php echo $method?>" action="controlador/pro_herr.php" onsubmit="return enviar()">
        <?php 
            if (isset($_GET['herramientaId'])) {
                echo '<input type="hidden" name="herramientaId" value='.$_GET['herramientaId'].' >';
            }
        ?>
       <div id="boxTitulo"><h1>Registro de herramientas</h1></div>
        <div id="boxLeft">
            <div id="boxTools">
                <label for="tools" class="left">Herramienta</label>
                <input type="text" name="tools" id="tools" class="left" value="<?php echo $tools; ?>">
        </div>
        <div id="boxSerie" >
            <label for="serie" class="left">Serie</label>
            <input type="text" name="serie" id="serie" class="left" value="<?php echo $serie; ?>">
        </div>
        <div id="boxMarca" >
            <label for="marca" class="left">Marca</label>
            <input type="text" name="marca" id="marca" class="left" value="<?php echo $marca; ?>">
        </div>
    </div>
    <div id="boxMedium">
        <label for="estado" class="medium">Diagnóstico de Estado</label>
        <textarea name="estado" id="estado" class="medium"><?php echo $estado; ?></textarea>
    </div>
        <div id="boxRight">
                    <label class="right" >Condición Operativa</label><br>
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
    </div>
    <!-- Registro -->

    <!-- Inventario -->
    <div id="boxInventario" >
        <div id="boxTitulo" ><h1>Inventario</h1></div>
    <div id="boxTabla" >
                    <?php
         if($busHerramienta->num_rows == 0)  {
            echo 'No existen registros en la base de datos';
        } else {
            echo '<table border=1 >';
            echo '<tr>
                    <td>Herramienta</td>
                    <td>Serie</td>
                    <td>Marca</td>
                    <td>Estado</td>
                    <td>Condiciones</td>
                    <td>Acción</td>
                  </tr>';

            foreach ($busHerramienta as $data) {
                echo '<tr>';
                    echo '<td>' . $data['tools'] . '</td>';
                    echo '<td>' . $data['serie'] . '</td>';
                    echo '<td>' . $data['marca'] . '</td>';
                    echo '<td>' . $data['estado'] . '</td>';
                    echo '<td>';
                    echo '<ul>';
                    
                    if (isset($data['condicion'])) {
                        echo '<li>' . $data['condicion'] . '</li>';
                    } else {
                        echo '<li>Sin condiciones</li>';
                    }
                    
                    echo '</ul>';
                    echo '</td>';
                    
                    $idEditar = isset($data['id']) ? $data['id'] : '';
                    
                    echo '<td><a href="main.php?accion=cargarRegistro&herramientaId='.$idEditar.'">Editar</a></td>';
                echo '</tr>';
            }
            echo '</table>';
        }
    ?>
    </div>
    </div>

    <script src="assets/javascript/main.js"></script>
</body>
</html>