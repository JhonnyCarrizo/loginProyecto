<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="img/icono.png">
    <title>Login</title>
</head>
<body>
    <div id="BoxCuerpo" >
        <div id="BoxLeft" >
            <h1>U.E.DR. MÁXIMO <br> ARTEAGA PÉREZ</h1>
            <H2>Misión y visión <br> de la institución</H2>
        </div>
        <div id="BoxRight" >
            <form action="procesar.php" method="post" onsubmit="return enviar()" autocomplete="off" >

                <div id="BoxUsuario" >
                    <label for="usuario">Usuario</label><br>
                    <input type="text"  id="usuario" name="usuario" placeholder="Usuario">
                </div>
                <div id="BoxContraseña" >
                    <label for="contraseña">Contraseña</label>
                    <input type="password" id="contraseña" name="contraseña" placeholder="Contraseña" autocomplete="new-password">
                    <div id="BoxVerContraseña">
                        <button type="button" id="VerContraseñaBtn">
                            <img src="img/vista.png" id="VerContraseñaImg">
                        </button>
                    </div>
                </div>
                <div id="BoxEntrar" ><input type="submit" name="entrar" value="Entrar"></div>
                <!-- <div id="recuperar" ><a href="recuperar.php">¿Has olvidado la contraseña?</a></div> -->
            </form>
        </div>
    </div>
    <script src="login.js" ></script>
</body>
</html>