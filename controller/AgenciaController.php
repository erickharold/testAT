<?php

require_once "../model/ModelAgencia.php";

class Controller
{
    public function CreatePersonaController($nombre, $apellido, $telefono, $pais)
    {
        $datosController = array("nombre" => $nombre, "apellido" => $apellido, "telefono" => $telefono, "pais" => $pais);

        $respuesta = Datos::CreatePersonaModel($datosController, "persona");

        return $respuesta;
    }

    public function ReadPersonasController()
    {
        $respuesta = Datos::ReadPersonaModel("persona");
        return $respuesta;
    }

    public function SearchPersonaByIdController($id)
    {
        $respuesta = Datos::SearchPersonaByIdModel($id, "persona");

        return $respuesta;

    }

    public function UpdatePersonaController($id, $nombre, $apellido, $telefono, $pais)
    {
        $datosController = array("id"=>$id, "nombre" => $nombre, "apellido" => $apellido, "telefono" => $telefono, "pais" => $pais);

        $respuesta = Datos::UpdatePersonaModel($datosController, "persona");
        return $respuesta;
    }

    public function DeletePersonaController($id)
    {
        $respuesta = Datos::DeletePersonaModel($id, "persona");
        return $respuesta;
    }
}





?>