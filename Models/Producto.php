<?php

    //require_once "/Connection/Connection.php";

    class Producto {
        public static function getAll(){
            $db = new Connection();
            $query = "SELECT * FROM Producto";
            $result = $db -> query($query);
            $datos = [];
            if($result -> num_rows) {
                while($row = $result->fetch_assoc()){
                    $datos[] =  [
                        'id' => $row['id'],
                        'categoria_id' => $row['categoria_id'],
                        'nombre' => $row['nombre'],
                        'descripcion' => $row['descripcion'],
                        'precio' => $row['precio'],
                        'stock' => $row['stock'],
                    ];
                }
                return $datos;
            }
            return $datos;
        }

        public static function getById($id_producto){
            $db = new Connection();
            $query = "SELECT * FROM Producto Where id = $id_producto";
            $result = $db -> query($query);
            $datos = [];
            if($result -> num_rows) {
                while($row = $result->fetch_assoc()){
                    $datos[] =  [
                        'id' => $row['id'],
                        'categoria_id' => $row['categoria_id'],
                        'nombre' => $row['nombre'],
                        'descripcion' => $row['descripcion'],
                        'precio' => $row['precio'],
                        'stock' => $row['stock'],
                    ];

                }
                return $datos;
            }
            return $datos;
        }

        public static function insert($categoria_id, $nombre, $descripcion, $precio, $stock) {
            $db = new Connection();
            $query = "INSERT INTO Producto (categoria_id, nombre, descripcion, precio, stock)
            VALUES('".$categoria_id."', '".$nombre."', '".$descripcion."', '".$precio."', '".$stock."')";
            $db -> query($query);
            if($db->affected_rows) {
                return TRUE;
            }
            return FALSE;
        }

        public static function updateById($id_producto, $categoria_id, $nombre, $descripcion, $precio, $stock) {
            $db = new Connection();
            $query = "UPDATE Producto SET
            nombre = '".$nombre."', descripcion = '".$descripcion."', precio = '".$precio."', stock = '".$stock."'
            WHERE id = $id_producto AND categoria_id = $categoria_id";
            $db -> query($query);
            if($db->affected_rows) {
                return TRUE;
            }
            return FALSE;
        }

        public static function deleteById($id_producto, $categoria_id){
            $db = new Connection();
            $query = "DELETE FROM Producto WHERE id = $id_producto AND categoria_id = $categoria_id";
            $db->query($query);
            if($db->affected_rows){
                return TRUE;
            }
            return FALSE;

        }
    }