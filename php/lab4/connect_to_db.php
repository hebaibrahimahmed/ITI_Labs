<?php
const DB_HOST = "localhost";
const DB_USER = "root";
const DB_PASSWORD = "";
const DB_DATABASE = "iti";


function connect_to_db(){

    try {

        $dsn  = 'mysql:host=127.0.0.1;port=3306;dbname=iti';

        $db = new PDO($dsn, DB_USER, DB_PASSWORD);

        return $db;

        } catch (Exception $e){

                echo $e->getMessage();
    }
}

// var_dump(connect_to_db());