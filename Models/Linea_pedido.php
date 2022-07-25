<?php

    //require_once "/Connection/Connection.php";

    class Linea_pedido {
        public static function getAll(){
            $db = new Connection();
            $query = "SELECT * FROM Linea_pedido";
            $result = $db -> query($query);
            $datos = [];
            if($result -> num_rows) {
                while($row = $result->fetch_assoc()){
                    $datos[] =  [
                        'id' => $row['id'],
                        'pedido_id' => $row['pedido_id'],
                        'producto_id' => $row['producto_id'],
                        'unidades' => $row['unidades']

                    ];
                }
                return $datos;
            }
            return $datos;
        }

        public static function getById($id_linea_pedido){
            $db = new Connection();
            $query = "SELECT * FROM Linea_pedido Where id = $id_linea_pedido";
            $result = $db -> query($query);
            $datos = [];
            if($result -> num_rows) {
                while($row = $result->fetch_assoc()){
                    $datos[] =  [
                        'id' => $row['id'],
                        'pedido_id' => $row['pedido_id'],
                        'producto_id' => $row['producto_id'],
                        'unidades' => $row['unidades']
                    ];

                }
                return $datos;
            }
            return $datos;
        }

        public static function insert($pedido_id, $producto_id, $unidades) {
            $db = new Connection();
            $query = "INSERT INTO Linea_pedido (pedido_id, producto_id, unidades)
            VALUES('".$pedido_id."', '".$producto_id."', '".$unidades."')";
            $db -> query($query);
            if($db->affected_rows) {
                return TRUE;
            }
            return FALSE;
        }

        public static function updateById($id_linea_pedido, $pedido_id, $producto_id, $unidades) {
            $db = new Connection();
            $query = "UPDATE Linea_pedido SET
            pedido_id = '".$pedido_id."', producto_id = '".$producto_id."', unidades = '".$unidades."'
            WHERE id = $id_linea_pedido";
            $db -> query($query);
            if($db->affected_rows) {
                return TRUE;
            }
            return FALSE;
        }

        public static function deleteById($id_linea_pedido){
            $db = new Connection();
            $query = "DELETE FROM Linea_pedido WHERE id = $id_linea_pedido";
            $db->query($query);
            if($db->affected_rows){
                return TRUE;
            }
            return FALSE;

        }
    }