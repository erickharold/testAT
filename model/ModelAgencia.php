<?php

require_once "Conexion.php";

class Datos extends Conexion
{
    public function CreatePersonaModel($datosModel, $tabla)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, apellido, telefono, pais) VALUES (:nombre, :apellido, :telefono, :pais)");

        $stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":apellido", $datosModel["apellido"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datosModel["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":pais", $datosModel["pais"], PDO::PARAM_STR);

        if($stmt->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function ReadPersonaModel($tabla)
    {
        $stmt = Conexion::conectar()->prepare("SELECT id, nombre, apellido, telefono, pais FROM $tabla");
        $stmt->execute();

        $stmt->bindColumn("id", $id);
        $stmt->bindColumn("nombre", $nombre);
        $stmt->bindColumn("apellido", $apellido);
        $stmt->bindColumn("telefono", $telefono);
        $stmt->bindColumn("pais", $pais);

        $personas = array();

        while($fila = $stmt->fetch(PDO::FETCH_BOUND))
        {
            $per = array();
            $per["id"] = utf8_encode($id);
            $per["nombre"] = utf8_encode($nombre);
            $per["apellido"] = utf8_encode($apellido);
            $per["telefono"] = utf8_encode($telefono);
            $per["pais"] = utf8_encode($pais);

            array_push($personas, $per);
        }

        return $personas;
    }

    public function SearchPersonaByIdModel($id, $tabla)
    {
        $stmt = Conexion::conectar()->prepare("SELECT id, nombre, apellido, telefono, pais FROM $tabla WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        $stmt->execute();

        $stmt->bindColumn("id", $id);
        $stmt->bindColumn("nombre", $nombre);
        $stmt->bindColumn("apellido", $apellido);
        $stmt->bindColumn("telefono", $telefono);
        $stmt->bindColumn("pais", $pais);
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $fila;
    }

    public function UpdatePersonaModel($datosModel, $tabla)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla set nombre = :nombre, apellido = :apellido, telefono = :telefono, pais = :pais WHERE id = :id");

        $stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
        $stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":apellido", $datosModel["apellido"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datosModel["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":pais", $datosModel["pais"], PDO::PARAM_STR);
        

        if($stmt->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function DeletePersonaModel($id, $tabla)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        if($stmt->execute())
        {
            return true;
        }
        else
        {
            return false;
        }

    }

}


?>

