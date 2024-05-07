<?php

define("host", "127.0.0.1:5555");
define("user", "root");
define("password", "");
define("db", "linkedif");
$mysqli;

function connect() {
    global $mysqli;

    $mysqli = new mysqli(host, user, password, db);
    if ($mysqli->connect_errno) { 
        echo "Erro ao conectar como o banco". $mysqli->connect_error;
    } 
}

function close() {
    global $mysqli;
    $mysqli->close();
}

