<?php

$host = "localhost";
$user = "root";
$password = "";
$db_name = "linkedif";

$mysqli;

function connect() {
    global $host, $user, $password, $db_name, $mysqli;

    $mysqli = new mysqli($host, $user, $password, $db_name);

    if ($mysqli->connect_errno) { 
        echo "Erro ao conectar como o banco". $mysqli->connect_error;
    } else {
        echo "Conexão feita com sucesso!";
    }
}

function close() {
    global $mysqli;
    $mysqli->close();
}

connect();
close();
