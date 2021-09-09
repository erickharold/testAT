<?php

require_once "../controller/AgenciaController.php";


function isTheseParametersAvailable($params)
{
    //suponiendo que todos los parametros estan disponlible
    $available = true;
    $missingParams = "";

    foreach($params as $param)
    {
        if(!isset($_POST[$param]) || strlen($_POST[$param]) <= 0)
        {
            $available = false;
            $missingParams = $missingParams .", ".$param;
        }
    }

    //si faltan parametros
    if(!$available)
    {
        $response = array();
        $response['error'] = true;
        $response['message'] = 'Parametro'. substr($missingParams, 1, strlen($missingParams)) . ' vacio';

        //error de visualizacion
        echo json_encode($response);        
        //detener la ejecucion adicional
        die();
    }
}


$response = array();

if(isset($_GET['apicall']))
{
    //Aqui iran todos los llamados de nuestra Api

    switch($_GET['apicall'])
    {
        case 'createPersona' :
            
            isTheseParametersAvailable(array('nombre', 'apellido', 'telefono', 'pais'));
            $db = new Controller();
            $result = $db->CreatePersonaController($_POST['nombre'], $_POST['apellido'], $_POST['telefono'], $_POST['pais']);
            
            if($result)
            {
                //significa que no hay ningun error
                $response['error'] = false;
                //mensaje que se ejecuto correctamente
                $response['message'] = 'Persona agregado correctamente';

                header("Location: ../vista");
            }
            else
            {
                $response['error'] = true;
                $response['message'] = 'Ocurrio un error, intenta nuevamente';
                header("Location: ../vista");
            }
        break;

        case 'readPersonas' :
            $db = new Controller();
            $response['error'] = false;
            $response['message'] = 'Solicitud completada correctamente';
            $response['contenido'] = $db->ReadPersonasController();
        break;
        
        case 'searchPersonaById' :
            if(isset($_GET['id']) && !empty($_GET['id']))
            {
                $db = new Controller();
                $response['error'] = false;
                $response['message'] = 'Persona obtenida correctamente';
                $response['contenido'] = $db->SearchPersonaByIdController($_GET['id']);
                if($response['contenido'] == "")
                {
                    $response['message'] = 'No se encontro registros';
                }
            }
            

        break;

        case 'updatePersona' :
            isTheseParametersAvailable(array('id', 'nombre', 'apellido', 'telefono', 'pais'));
            $db = new Controller();
            $result = $db->UpdatePersonaController($_POST['id'], $_POST['nombre'], $_POST['apellido'], $_POST['telefono'], $_POST['pais']);

            if($result)
            {
                $response['error'] = false;
                $response['message'] = 'Persona editada correctamente';
                header("Location: ../vista");
            }
            else
            {
                $response['error'] = true;
                $response['message'] = 'Ocurrio un error, intenta nuevamente';
            }
            header("Location: ../vista");
        break;

        case 'deletePersona' :
            if(isset($_GET['id']) && !empty($_GET['id']))
            {
                $db = new Controller();
                if($db->DeletePersonaController($_GET['id']))
                {
                    $response['error'] = false;
                    $response['message'] = 'Persona eliminada';
                    header("Location: ../vista");
                }
                else
                {
                    $response['error'] = true;
                    $response['message'] = 'La Persona no fue eliminada';
                }
            }
        break;
    }
}
else
{
    $response['error'] = true;
    $response['message'] = 'Invalid Api Call';
}

echo json_encode($response);



?>