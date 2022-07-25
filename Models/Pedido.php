<?php

    //require_once "/Connection/Connection.php";

    //NOTA: El coste lo sacamos con una funcion de acuerdo a la informacion de Linea_pedido y lo agregamos luego en la tabla con un insert

    class Pedido {
        public static function getAll(){
            $db = new Connection();
            $query = "SELECT * FROM Pedido";
            $result = $db -> query($query);
            $datos = [];
            if($result -> num_rows) {
                while($row = $result->fetch_assoc()){
                    $datos[] =  [
                        'id' => $row['id'],
                        'usuario_id' => $row['usuario_id'],
                        'provincia' => $row['provincia'],
                        'localidad' => $row['localidad'],
                        'direccion' => $row['direccion'],
                        'coste' => $row['coste'],
                        'fecha' => $row['fecha']
                    ];
                }
                return $datos;
            }
            return $datos;
        }

        public static function getById($id_pedido){
            $db = new Connection();
            $query = "SELECT * FROM Pedido Where id = $id_pedido";
            $result = $db -> query($query);
            $datos = [];
            if($result -> num_rows) {
                while($row = $result->fetch_assoc()){
                    $datos[] =  [
                        'id' => $row['id'],
                        'usuario_id' => $row['usuario_id'],
                        'provincia' => $row['provincia'],
                        'localidad' => $row['localidad'],
                        'direccion' => $row['direccion'],
                        'coste' => $row['coste'],
                        'fecha' => $row['fecha']
                    ];

                }
                return $datos;
            }
            return $datos;
        }

        public static function insert($usuario_id, $provincia, $localidad, $direccion, $fecha) {
            $db = new Connection();
            $query = "INSERT INTO Pedido (usuario_id, provincia, localidad, direccion, fecha)
            VALUES('".$usuario_id."', '".$provincia."', '".$localidad."', '".$direccion."', '".$fecha."')";
            $db -> query($query);
            if($db->affected_rows) {
                return TRUE;
            }
            return FALSE;
        }

        public static function updateById($id_pedido, $usuario_id, $provincia, $localidad, $direccion, $fecha) {
            $db = new Connection();
            $query = "UPDATE Pedido SET
            provincia = '".$provincia."', localidad = '".$localidad."', direccion = '".$direccion."', fecha = '".$fecha."'
            WHERE id = $id_pedido AND usuario_id = $usuario_id";
            $db -> query($query);
            if($db->affected_rows) {
                return TRUE;
            }
            return FALSE;
        }

        public static function deleteById($id_pedido, $usuario_id){
            $db = new Connection();
            $query = "DELETE FROM Pedido WHERE id = $id_pedido AND usuario_id = $usuario_id";
            $db->query($query);
            if($db->affected_rows){
                return TRUE;
            }
            return FALSE;

        }
    }