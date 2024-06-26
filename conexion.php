<?php

class Conexion
{
    static public function conectar()
    {
        try {
            // Para Local
            $server = "localhost";
            $user =  "root";
            $password = "";
            $dbname = "super";


            $link = new PDO("mysql:host=$server; dbname=$dbname", $user, $password);

            $link->exec("set names utf8");

            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $link;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
