<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agencia</title>
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
    <h1>Ingresar Persona Agencia</h1>

<form action="../api/ApiAgencia.php?apicall=createPersona" method="POST">
    <label>Nombre:</label>    
        <input type="text" name="nombre" placeholder="Nombre" required> 
    <br>
    <br>
    <label>Apellido:</label>    
        <input type="text" name="apellido" placeholder="Apellido" required> 
    <br>
    <br>
    <label>Telefono:</label>    
        <input type="text" name="telefono" placeholder="Telefono" required> 
    <br>
    <br>
    <label>Pais:</label>    
    <select name="pais" required>
        <option value="" selected>--SELECCIONE--</option>
        <option value="Peru">Peru</option>
        <option value="Brasil" >Brasil</option>
        <option value="Argentina">Argentina</option>
    </select>
    <br>
    <br>
        <input type="submit" value="Ingresar"> 
</form>
    </div>
    <center>
        
    </center>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
