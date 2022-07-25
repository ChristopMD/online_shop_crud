<?php

    //require_once "/Connection/Connection.php";

    class Usuario {
        public static function getAll(){
            $db = new Connection();
            $query = "SELECT * FROM Usuario";
            $result = $db -> query($query);
            $datos = [];
            if($result -> num_rows) {
                while($row = $result->fetch_assoc()){
                    $datos[] =  [
                        'id' => $row['id'],
                        'nombre' => $row['nombre'],
                        'apellido' => $row['apellido'],
                        'email' => $row['email'],
                        'fecha_de_nacimiento' => $row['fecha_de_nacimiento'],
                        'genero' => $row['genero']
                    ];
                }
                return $datos;
            }
            return $datos;
        }

        public static function getById($id_usuario){
            $db = new Connection();
            $query = "SELECT * FROM Usuario Where id = $id_usuario";
            $result = $db -> query($query);
            $datos = [];
            if($result -> num_rows) {
                while($row = $result->fetch_assoc()){
                    $datos[] =  [
                        'id' => $row['id'],
                        'nombre' => $row['nombre'],
                        'apellido' => $row['apellido'],
                        'email' => $row['email'],
                        'fecha_de_nacimiento' => $row['fecha_de_nacimiento'],
                        'genero' => $row['genero']
                    ];

                }
                return $datos;
            }
            return $datos;
        }

        public static function insert($nombre, $apellido, $email, $fecha_de_nacimiento, $genero) {
            $db = new Connection();
            $query = "INSERT INTO Usuario (nombre, apellido, email, fecha_de_nacimiento, genero)
            VALUES('".$nombre."', '".$apellido."', '".$email."', '".$fecha_de_nacimiento."', '".$genero."')";
            $db -> query($query);
            if($db->affected_rows) {
                return TRUE;
            }
            return FALSE;
        }

        //No se puede actualizar el email si lo creaste como tipo "unique" en sql
        public static function updateById($id_usuario, $nombre, $apellido, $email, $fecha_de_nacimiento, $genero) {
            $db = new Connection();
            $query = "UPDATE Usuario SET
            nombre = '".$nombre."', apellido = '".$apellido."', email = '".$email."', fecha_de_nacimiento = '".$fecha_de_nacimiento."', genero = '".$genero."'
            WHERE id = $id_usuario";
            $db -> query($query);
            if($db->affected_rows) {
                return TRUE;
            }
            return FALSE;
        }

        public static function deleteById($id_usuario){
            $db = new Connection();
            $query = "DELETE FROM Usuario WHERE id = $id_usuario";
            $db->query($query);
            if($db->affected_rows){
                return TRUE;
            }
            return FALSE;

        }
    }