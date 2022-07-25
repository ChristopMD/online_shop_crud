<?php
    require_once("../Connection/Connection.php");
    require_once("../Models/Linea_pedido.php");
    

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            if (isset($_GET['id'])) {
                echo json_encode(Linea_pedido::getById($_GET['id']));
            }
            else{
                echo json_encode(Linea_pedido::getAll());
            }
            break;
        
        case 'POST':
            $datos = json_decode(file_get_contents('php://input'));
            if ($datos != NULL) {
                if (Linea_pedido::insert($datos->pedido_id, $datos->producto_id, $datos->unidades)) {
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
            $datos = json_decode(file_get_contents('php://input'));
            if ($datos != NULL) {
                if (Linea_pedido::updateById($datos->id, $datos->pedido_id, $datos->producto_id, $datos->unidades)) {
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
                if(Linea_pedido::deleteById($_GET['id'])){
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