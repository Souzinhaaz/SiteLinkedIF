<?php

require_once("connectDB.php");

// Função que verifica se o email já foi cadastrado
// Retorna true caso já exista uma pessoa cadastrada com o email informado
function verificarEmail($email) {
    global $mysqli;

    connect();
    // query sql para buscar o email no banco de dados do aluno.
    $sql_alunos = "SELECT email FROM alunos WHERE email = ?;";

    // preparando a query sql para executar.
    $stmt = $mysqli->prepare($sql_alunos);
    if (!$stmt) {
        die("Erro ao buscar o aluno, Problema no acesso ao banco de dados");
    }
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $return = $stmt->get_result();
    $num_rows = $return->num_rows;

    if ($num_rows == 0) {
        $sql_professores = "SELECT email FROM professores WHERE email = ?;";

        $stmt = $mysqli->prepare($sql_professores);
        if (!$stmt) {
            die("Erro ao buscar o professor, Problema no acesso ao banco de dados");
        }
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $return = $stmt->get_result();
    
        $num_rows = $return->num_rows;
    }

    close();

    if (!isset($_SESSION)) {
        session_start();
    }
    
    // Se o número de linhas encontradas for igual a 1 vai retornar true, senão false.
    return $return->num_rows == 1 ? true : false;
}

// Função que verifica se a senha oferecida bate com a da pessoa do email.
// Retorna true se o email e a senha baterem.
function verificarSenha($email, $senha) {
    global $mysqli;

    connect();
    // Verifica na tabela de alunos
    $sql_alunos = "SELECT senha FROM alunos WHERE email = ?;";
    $stmt = $mysqli->prepare($sql_alunos);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result_alunos = $stmt->get_result();

    // Se o email não for encontrado na tabela de alunos, verifique na tabela de professores
    if ($result_alunos->num_rows == 0) {
        $sql_professores = "SELECT senha FROM professores WHERE email = ?;";
        $stmt = $mysqli->prepare($sql_professores);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result_professores = $stmt->get_result();

        // Se encontrado na tabela de professores, verifica a senha
        if ($result_professores->num_rows == 1) {
            $row = $result_professores->fetch_assoc();
            $hashed_password = $row['senha'];
            // Verifica se a senha fornecida corresponde ao hash no banco de dados
            if (password_verify($senha, $hashed_password)) {
                if (!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION['id'] = $row["id_professor"];
                $_SESSION['name'] = $row["nome"];

                close();
                return true;
            }
        }
    } else {
        // Se encontrado na tabela de alunos, verifica a senha
        $row = $result_alunos->fetch_assoc();
        $hashed_password = $row['senha'];
        echo var_dump($senha);
        echo "<br>";
        echo var_dump($hashed_password);
        echo "<br>";
        echo var_dump(password_verify($senha, $hashed_password));
        // Verifica se a senha fornecida corresponde ao hash no banco de dados
        if (password_verify($senha, $hashed_password)) {
            close();
            return true;
        }
    }

    close();
    return false; // Retorna false se a senha estiver incorreta ou se o email não for encontrado
}
