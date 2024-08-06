<?php
require_once("../config/connectDB.php");
require_once("../config/validacoes.php");
$finalRoute = require_once("../config/getRoute.php");
$msg;

if (empty($_POST['name'])) {            
    $msg = "Preencha o campo do nome";
} else if (empty($_POST['email'])) {
    $msg = "Por favor, preencha o campo do email";
} else if (empty($_POST['password'])) {
    $msg = "Por favor, insira a sua senha";
} else if (empty($_POST['telephone'])) {
    $msg = "Por favor, insira o seu número de telefone";
} else if (empty($_POST['cpf'])) {
    $msg = "Por favor, insira o seu número de CPF";
} else if(verificarEmail($_POST['email'])){
    $msg = "Email já cadastrado. Por favor, informe outro email.";
} else {
    $nome = $_POST['name'];
    $email = $_POST['email'];
    $telefone = $_POST['telephone'];
    $senha = password_hash($_POST['password'], PASSWORD_DEFAULT);   
    $cpf = $_POST['cpf'];       

    
    connect();
 
    $sql = "INSERT INTO alunos(nome, email, telefone, senha, cpf) VALUES (?, ?, ?, ?, ?);";

    $stmt = $mysqli->prepare($sql);

    if (!$stmt) {
        die("Erro ao inserir, Problema no acesso ao banco de dados");
    }

    $stmt->bind_param("sssss", $nome, $email, $telefone, $senha, $cpf);

    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $msg = "Aluno cadastrado com sucesso!";
        if ($finalRoute == "areaAluno.php") {
            header("Location: ../pages/private/admin/formAluno.php?msg-success={$msg}");
        }
        header("Location: ../pages/public/login.php?msg-sucesso={$msg}");
    } else {
        $msg = "Erro ao cadastrar o aluno!";
        header("Location: ../pages/private/admin/formAluno.php?msg-success={$msg}");
    }

    close();
}
