<?php

require_once("../config/connectDB.php");
require_once("../config/validacoes.php");

$msg;

if (empty($_POST['name'])) {
    $msg = "Preencha o campo do nome";
} else if (empty($_POST['email'])) {
    $msg = "Por favor, preencha o campo do email";
    if (verificarEmail($_POST['email'], "id_professor", "professores")) {
        $msg = "Email já cadastrado. Por favor, informe outro endereço de Email";
    }

} else if (empty($_POST['password'])) {
    $msg = "Por favor, insira a sua senha";
} else if (empty($_POST['phone-number'])) {
    $msg = "Por favor, insira o seu número de telefone";
} else if (empty($_POST['cpf'])) {
    $msg = "Por favor, insira o seu número de CPF";
} else {

    $nome = $_POST['name'];
    $email = $_POST['email'];
    $telefone = $_POST['phone-number'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);   
    $cpf = $_POST['cpf'];

    connect();

    $sql = "INSERT INTO professores(nome, email, telefone, senha, CPF) VALUES (?, ?, ?, ?, ?);";

    $stmt = $mysqli->prepare($sql);

    if (!$stmt) {
        die("Erro ao inserir, Problema no acesso ao banco de dados");
    }

    $stmt->bind_param("sssss", $nome, $email, $telefone, $senha, $cpf);

    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $msg = "Professor cadastrado com sucesso!";
    } else {
        $msg = "Erro ao cadastrar o professor!";
    }

    close();
}

header("Location: ../pages/cadProfForm.php?msg={$msg}");