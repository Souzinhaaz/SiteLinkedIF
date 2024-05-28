<?php
session_start();
require_once("../config/connectDB.php");
require_once("../config/validacoes.php");

$msg;
    
// Essa função retira os espaços em branco, retira as barras invertidas e muda
// os caracteres especiais html.
function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$email = validate($_POST['email']);
$password = validate($_POST['password']);

if (empty($email)) {
    $msg = "O campo email esta vazio.";
} else if (empty($password)) {
    $msg = "O campo da senha esta vazio";
} else {

    if (verificarEmail($email)) {
        if(verificarSenha($email, $password)) {
            $msg = "Usuário Logado com sucesso";
            header("Location: ../pages/cursos.php?msg={$msg}");
        };
    } else {
        $msg = "Usuario ou senha estao incorretos.";
    };

}

