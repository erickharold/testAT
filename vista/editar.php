<?php

require_once "../controller/AgenciaController.php";

    $persona = Controller::SearchPersonaByIdController($_GET['id']);

    $paises = Controller::ReadAllPaises();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

<STYLE>
    A {
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
    <h1>Editar Persona</h1>

        <form action="../api/ApiAgencia.php?apicall=updatePersona" method="POST">
            
            <input type="hidden" name="id" value="<?= $persona["id"]?>">
            <label>Nombre:</label>   
                <input type="text" name="nombre" placeholder="Nombre" value="<?= $persona["nombre"]?>" required>
            <br>
            <br>
            <label>Apellido:</label>    
                <input type="text" name="apellido" placeholder="Apellido" value="<?= $persona["apellido"]?>" required>
            <br>
            <br>
            <label>Telefono:</label>    
                <input type="text" name="telefono" placeholder="Telefono" value="<?= $persona["telefono"]?>" required>
            <br>
            <br>
            <label>Pais:</label>    
            <select name="pais">
               <?php
               
                    foreach($paises as $item)
                    {
                        if ($item["Nombre"] == $persona["pais"])
                        {
                            ?>
                            
                                <option value="<?= $persona["pais"]?>" selected><?= $persona["pais"]?></option>
                         
                            <?php
                        }
                        else
                        {
                            ?>
                                
                                <option value="<?= $item["Nombre"]?>"><?= $item["Nombre"]?></option>
                            <?php
                        }
                        
                    }
               ?>
                </select>
                <!--<select name="pais" required>
                    <option value="Peru">Peru</option>
                    <option value="Brasil" >Brasil</option>
                    <option value="Argentina">Argentina</option>
                </select>-->
            <br>
            <br>
            <input type="submit" value="Editar">
        </form>
    </div>
    
</body>
</html>