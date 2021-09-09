<?php

    require_once "../controller/AgenciaController.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agencia</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

<STYLE>
a {
    text-decoration: none;
}
#centro{
    background-color: #fafafa;
  margin: 1rem;
  padding: 1rem;
  border: 2px solid #ccc;
    text-align: center;
}
</STYLE>

</head>
<body>
    <div id="centro">
    <h1>Lista de personas</h1>
        <a href="registrar.php">
            <button class="btn btn-success">
                Crear nueva persona
            </button>
        </a>        
        <table class="table table-responsive table-hover">
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>APELLIDOS</th>
                <th>TELEFONO</th>
                <th>PAIS</th>
                <th>OPCIONES</th>
            </tr>
            <?php foreach(Controller::ReadPersonasController() as $fila) : ?>
            <tr>
                <td>
                    <?= $fila["id"] ?>
                </td>a
                <td>
                    <?= $fila["nombre"] ?>
                </td>
                <td>
                    <?= $fila["apellido"] ?>
                </td>
                <td>
                    <?= $fila["telefono"] ?>
                </td>
                <td>
                    <?= $fila["pais"] ?>
                </td>
                <td>
                    <a href="editar.php?id=<?= $fila["id"]?>">
                        <button class="btn btn-sm btn-info">
                            Editar
                        </button>
                    </a>
                    <a href="../api/ApiAgencia.php?apicall=deletePersona&id=<?=$fila["id"]?>" onclick="return confirm('¿Desea eliminar el dato?')">
                        <button class="btn btn-sm btn-danger">
                                Eliminar
                        </button>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
