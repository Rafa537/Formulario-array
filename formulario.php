<?php
      // recoger.php
    // Recoger datos del formulario
    $nombre = $_POST['nombre'] ?? '';
    $email = $_POST['email'] ?? '';
    $ubicacion = $_POST['ubicacion'] ?? '';
    $plantas = isset($_POST['plantas']);
    $agua = isset($_POST['agua']) ? $_POST['agua'] : [];
    $fertilizante = $_POST['fertilizante'] ?? '';
    $acepta = isset($_POST['acepta']) ? 'Sí' : 'No';
    require 'funciones.php';
    $recoger_plantas = getPlantas(); // Función para obtener las plantas
    $recoger_ubicaciones = getUbicaciones(); // Función para obtener las ubicaciones
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario</title>
        <link rel="stylesheet" href="medidas.css">
    </head>
    <body>
        <header class="header-principal">
            <div class="titulo-principal">Registro</div>
        </header>
        <nav class="nav-principal">
            <ul class="menu">
                <li><a href="cambio-climatico.html">Inicio</a></li>
                <li><a href="formulario.html">Registro</a></li>
                <li class="causas">
                    <a href="causas.html">Otros tipos de causas (despliegue con submenú)</a>
                    <ul class="caja-causas">
                        <li><a href="#mecanismos">Mecanismos de adaptación de las plantas</a></li>
                        <li><a href="#ayuda">¿Qué podemos hacer para ayudar a las plantas?</a></li>
                        <li><a href="#afecta">Cómo afecta a las plantas</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <main class="contenedor-principal">
            <h2 class="titulo-seccion">Formulario</h2>
            <form action="recoger(v2).php" method="post">
                <fieldset>
                    <legend>Sección 1: Información básica</legend>
                    <label for="nombre">Nombre (opcional):</label><br>
                    <input type="text" id="nombre" name="nombre"><br><br>

                    <label for="email">Correo electrónico (opcional):</label><br>
                    <input type="email" id="email" name="email"><br><br>

                    <label for="ubicacion">Ubicación (país/región):</label><br>
                    <select id="ubicacion" name="ubicacion">
                        <?php 
                        foreach($recoger_ubicaciones as $indiceUbi => $valorUbi) {
                            echo '<option value="'.$indiceUbi.'">'.$valorUbi.'</option>';
                        }
                    ?>
                    </select><br><br>
                </fieldset>
                <fieldset>
                    <legend>Sección 2: Prácticas de cuidado de plantas</legend>
                    <label>¿Qué tipo de plantas cultivas principalmente?</label><br>
                    <?php 
                        foreach($recoger_plantas as $indicePl => $valorPl) {
                            echo '<label>
                                    <input type = "checkbox" name = "plantas[]" value="'.$indicePl.'">'.$valorPl.'<br></input>
                                </label>';
                        }
                    ?>

                    <label>¿Cómo obtienes el agua para regar tus plantas?</label><br>
                    <input type="checkbox" id="llave" name="agua[]" value="Agua de la llave">
                    <label for="llave">Agua de la llave</label><br>
                    <input type="checkbox" id="lluvia" name="agua[]" value="Recolección de agua de lluvia">
                    <label for="lluvia">Recolección de agua de lluvia</label><br>
                    <input type="checkbox" id="reutilizo" name="agua[]" value="Reutilizo agua (por ejemplo, del lavado de vegetales)">
                    <label for="reutilizo">Reutilizo agua (por ejemplo, del lavado de vegetales)</label><br>
                    <input type="checkbox" id="noriego" name="agua[]" value="No riego (solo uso plantas que no lo necesitan)">
                    <label for="noriego">No riego (solo uso plantas que no lo necesitan)</label><br><br>

                    <label>¿Usas fertilizantes?</label><br>
                    <input type="radio" id="quimicos" name="fertilizante" value="Sí, químicos">
                    <label for="quimicos">Sí, químicos</label><br>
                    <input type="radio" id="compost" name="fertilizante" value="Sí, compost o abono orgánico">
                    <label for="compost">Sí, compost o abono orgánico</label><br>
                    <input type="radio" id="nofertilizante" name="fertilizante" value="No uso">
                    <label for="nofertilizante">No uso</label><br><br>
                </fieldset>
                <fieldset>
                    <legend>Sección 3: Acepta los términos y condiciones</legend>
                    <input type="checkbox" id="acepta" name="acepta" value="si" required>
                    <label for="acepta">Aceptar términos y condiciones</label><br><br>
                </fieldset>
                <input type="submit" value="Enviar">
                <input type="reset" value="Limpiar">
            </form>
        </main>
        <footer class="footer-privacidad">
            Política de privacidad de la página web
        </footer>
    </body>
</html>