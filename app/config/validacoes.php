<?php

require_once("connectDB.php");

// Função que verifica se o email já foi cadastrado
// Retorna true caso já exista uma pessoa cadastrada com o email informado
function verificarEmail($email, $idTabela, $tabela) {
    global $mysqli;

    connect();
    $sql = "SELECT $idTabela FROM $tabela WHERE email = ?;";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $return = $stmt->get_result();
    close();

    $return->num_rows == 1 ? true : false;
}
