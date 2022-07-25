<?php
    require_once("../Connection/Connection.php");
    require_once("../Models/Usuario.php");
    

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            if (isset($_GET['id'])) {
                echo json_encode(Usuario::getById($_GET['id']));
            }
            else{
                echo json_encode(Usuario::getAll());
            }
            break;
        
        case 'POST':
            $datos = json_decode(file_get_contents('php://input'));
            if ($datos != NULL) {
                if (Usuario::insert($datos->nombre, $datos->apellido, $datos->email, $datos->fecha_de_nacimiento, $datos->genero)) {
                    http_response_code(200);
                }
                else {
                    http_response_code(400);
                }
            }
            else {
                http_response_code(405);
            }
            break;
        
        case 'PUT':
            //No se puede actualizar el email si lo creaste como tipo "unique" en sql
            $datos = json_decode(file_get_contents('php://input'));
            if ($datos != NULL) {
                if (Usuario::updateById($datos->id, $datos->nombre, $datos->apellido, $datos->email, $datos->fecha_de_nacimiento, $datos->genero)) {
                    http_response_code(200);
                }
                else {
                    http_response_code(400);
                }
            }
            else {
                http_response_code(405);
            }
            break;
        
        case 'DELETE':
            if (isset($_GET['id'])) {
                if(Usuario::deleteById($_GET['id'])){
                    http_response_code(200);
                }
                else{
                    http_response_code(400);
                }
            }
            else{
                http_response_code(405);
            }
            break;

            default:
            http_response_code(405);
            break;
    }