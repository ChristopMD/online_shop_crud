<?php
    require_once("../Connection/Connection.php");
    require_once("../Models/Producto.php");
    

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            if (isset($_GET['id'])) {
                echo json_encode(Pedido::getById($_GET['id']));
            }
            else{
                echo json_encode(Pedido::getAll());
            }
            break;
        
        case 'POST':
            $datos = json_decode(file_get_contents('php://input'));
            if ($datos != NULL) {
                if (Pedido::insert($datos->categoria_id, $datos->nombre, $datos->descripcion, $datos->precio, $datos->stock)) {
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
                if (Pedido::updateById($datos->id, $datos->categoria_id, $datos->nombre, $datos->descripcion, $datos->precio)) {
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
            if (isset($_GET['id']) && isset($_GET['categoria_id'])) {
                if(Pedido::deleteById($_GET['id'], $_GET['categoria_id'])){
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