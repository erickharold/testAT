<?php
class Conexion
{
    public function conectar()
    {
        $localhost = "localhost";
        $database = "agencia";
        $user = "root";
        $password = "";

        $link = new PDO("mysql:host=$localhost; dbname=$database", $user, $password);

        return $link;
    }
}
?>