<?php

require_once("../config/connectDB.php");
require_once("../config/validacoes.php");

$msg;

if (empty($_POST['email'])) {
    $msg = "O campo email esta vazio.";
} else if (empty($_POST["password"])) {
    $msg = "O campo da senha esta vazio";
} else {

    $email = $_POST["email"];
    $password = $_POST["password"];
    

    if (verificarEmail($email)) {
        if(verificarSenha($email, $password)) {
            echo "Passou senha";
            header("Location: ../pages/cursos.php?msg={$msg}");
        };
    } else {
        $msg = "Usuario ou senha estao incorretos.";
    };

}

