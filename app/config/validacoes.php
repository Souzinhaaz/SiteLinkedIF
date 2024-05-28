<?php



require_once("connectDB.php");

// Função que verifica se o email já foi cadastrado
// Retorna true caso já exista uma pessoa cadastrada com o email informado

function verificarEmail($email) {
    global $mysqli;

    connect();
    $sql = "SELECT email FROM alunos WHERE email = ?;";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $return = $stmt->get_result();
    $num_rows = $return->num_rows;

    if ($num_rows == 0) {
        $sql = "SELECT email FROM professores WHERE email = ?;";

        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $return = $stmt->get_result();
    
        $num_rows = $return->num_rows;
    }

    close();

    return $return->num_rows == 1 ? true : false;
}


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
            echo "<br>";
            echo var_dump($senha);
            echo "<br>";
            echo var_dump($hashed_password);
            // Verifica se a senha fornecida corresponde ao hash no banco de dados
            if (password_verify($senha, $hashed_password)) {
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
