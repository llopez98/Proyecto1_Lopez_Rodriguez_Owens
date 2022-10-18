<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrando</title>
</head>

<body>
    <?php
    require_once("class/actividades.php");

    if (array_key_exists('registrar', $_POST)) {
        if (array_key_exists('repetir', $_POST)) {
            $obj_actividad = new actividad();
            $registrar = $obj_actividad->registrar_actividad($_POST['titulo'], $_POST['fecha'], $_POST['ubicacion'], $_POST['correo'], 1, $_POST['repetir_inicio'], $_POST['repetir_final'], $_POST['tipo'], $_POST['hora']);

            print("Actualizado!");
        } else {
            $obj_actividad = new actividad();
            $registrar = $obj_actividad->registrar_actividad($_POST['titulo'], $_POST['fecha'], $_POST['ubicacion'], $_POST['correo'], 0, $_POST['repetir_inicio'], $_POST['repetir_final'], $_POST['tipo'], $_POST['hora']);

            print("Actualizado!");
        }
    }
    else if (array_key_exists('editar', $_POST)) {
        if (array_key_exists('repetir', $_POST)) {
            $obj_actividad = new actividad();
            $registrar = $obj_actividad->actualizar_actividad($_POST['id'], $_POST['titulo'], $_POST['fecha'], $_POST['ubicacion'], $_POST['correo'], 1, $_POST['repetir_inicio'], $_POST['repetir_final'], $_POST['tipo'], $_POST['hora']);

            print("Registrado!");
        } else {
            $obj_actividad = new actividad();
            $registrar = $obj_actividad->actualizar_actividad($_POST['id'], $_POST['titulo'], $_POST['fecha'], $_POST['ubicacion'], $_POST['correo'], 0, $_POST['repetir_inicio'], $_POST['repetir_final'], $_POST['tipo'], $_POST['hora']);

            print("Registrado!");
        }
    }
    else if (array_key_exists('eliminar', $_POST)) {

            $obj_actividad = new actividad();
            $registrar = $obj_actividad->eliminar_actividad($_POST['id']);

            print("Eliminado!");
    }
    ?>
</body>

</html>