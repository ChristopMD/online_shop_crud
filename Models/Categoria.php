<?php

    //require_once "/Connection/Connection.php";

    class Categoria {
        public static function getAll(){
            $db = new Connection();
            $query = "SELECT * FROM Categoria";
            $result = $db -> query($query);
            $datos = [];
            if($result -> num_rows) {
                while($row = $result->fetch_assoc()){
                    $datos[] =  [
                        'id' => $row['id'],
                        'nombre' => $row['nombre']
                    ];
                }
                return $datos;
            }
            return $datos;
        }

        public static function getById($id_categoria){
            $db = new Connection();
            $query = "SELECT * FROM Categoria Where id = $id_categoria";
            $result = $db -> query($query);
            $datos = [];
            if($result -> num_rows) {
                while($row = $result->fetch_assoc()){
                    $datos[] =  [
                        'id' => $row['id'],
                        'nombre' => $row['nombre']
                    ];

                }
                return $datos;
            }
            return $datos;
        }

        public static function insert($nombre) {
            $db = new Connection();
            $query = "INSERT INTO Categoria (nombre)
            VALUES('".$nombre."')";
            $db -> query($query);
            if($db->affected_rows) {
                return TRUE;
            }
            return FALSE;
        }

        public static function updateById($id_categoria, $nombre) {
            $db = new Connection();
            $query = "UPDATE Categoria SET
            nombre = '".$nombre."'
            WHERE id = $id_categoria";
            $db -> query($query);
            if($db->affected_rows) {
                return TRUE;
            }
            return FALSE;
        }

        public static function deleteById($id_categoria){
            $db = new Connection();
            $query = "DELETE FROM Categoria WHERE id = $id_categoria";
            $db->query($query);
            if($db->affected_rows){
                return TRUE;
            }
            return FALSE;

        }
    }