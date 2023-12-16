<?php

class Conexao
{
    public static function getConexao()
    {
        $host = "localhost";//getenv('MYSQL_HOST');
        $dbName = "projeto_final";//getenv('MYSQL_DATABASE');
        $user = "root";//getenv('MYSQL_USER');
        $pass = "";//getenv('MYSQL_PASSWORD');

        $dsn = "mysql:host=$host;dbname=$dbName";
        return new PDO($dsn, $user, $pass);
    }

}