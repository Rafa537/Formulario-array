<?php
    // recoger.php (versión para mostrar resultados claros)

    // Nombre
    if (empty($_POST['nombre'])) {
        echo '<h3>Se envió vacío el campo Nombre (opcional)</h3>';
    } else {
        echo '<h3>Nombre: ' . $_POST['nombre'] . '</h3>';
    }

    // Email
    if (empty($_POST['email'])) {
        echo '<h3>Se envió vacío el campo Correo electrónico (opcional)</h3>';
    } else {
        echo '<h3>Email: ' . $_POST['email'] . '</h3>';
    }

    // Ubicación
    if (isset($_POST['ubicacion']) && $_POST['ubicacion'] !== '') {
        echo '<h3>Ubicación: ' . $_POST['ubicacion'] . '</h3>';
    } else {
        echo '<h3>No seleccionó ninguna ubicación</h3>';
    }

    // Plantas (checkboxes)
    $hay = false;
    if (isset($_POST['plantas'])) {
        foreach ($_POST['plantas'] as $planta) {
            echo '<h3>Planta: ' . $planta . '</h3>';
        }
        $hay = true;
    }

    // Agua (checkboxes)
    $hayAgua = false;
    if (isset($_POST['agua']) && is_array($_POST['agua'])) {
        foreach ($_POST['agua'] as $tipoAgua) {
            echo '<h3>Agua: ' . $tipoAgua . '</h3>';
        }
        $hayAgua = true;
    }
    if ($hayAgua === false) {
        echo '<h3>No seleccionó ninguna opción de agua</h3>';
    }

    // Fertilizante (radios)
    if (isset($_POST['fertilizante']) && $_POST['fertilizante'] !== '') {
        echo '<h3>Fertilizante: ' . $_POST['fertilizante'] . '</h3>';
    } else {
        echo '<h3>No seleccionó ningún tipo de fertilizante</h3>';
    }

    // Acepta términos
    if (isset($_POST['acepta'])) {
        echo '<h3>Ha aceptado los términos y condiciones</h3>';
    } else {
        echo '<h3>No aceptó los términos y condiciones</h3>';
    }
?>

