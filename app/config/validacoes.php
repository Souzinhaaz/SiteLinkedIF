<?php

require_once("connectDB.php");

require_once("sessionStart.php");

// Função que verifica se o email já foi cadastrado
// Retorna true caso já exista uma pessoa cadastrada com o email informado
function verificarEmail($email)
{
    global $mysqli;

    connect();
    try {
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

        if ($return->num_rows == 0) {
            return false;
        }
        return true;

    } catch (Exception $e) {
        echo "Ocorreu um erro no servidor {$e->getMessage()}";
    }
}

// Função que verifica se a senha oferecida bate com a da pessoa do email.
// Retorna true se o email e a senha baterem.
function verificarSenha($email, $senha)
{
    global $mysqli;

    try {
        connect();
        // Verifica na tabela de alunos
        $sql_alunos = "SELECT id_aluno, nome, senha FROM alunos WHERE email = ?;";
        $stmt = $mysqli->prepare($sql_alunos);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result_alunos = $stmt->get_result();
    
        // Se o email não for encontrado na tabela de alunos, verifique na tabela de professores
        if ($result_alunos->num_rows == 0) {
            $sql_professores = "SELECT id_professor, nome, senha FROM professores WHERE email = ?;";
            $stmt = $mysqli->prepare($sql_professores);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result_professores = $stmt->get_result();
    
            // Se encontrado na tabela de professores, verifica a senha
            if ($result_professores->num_rows == 1) {
                $professor = $result_professores->fetch_object();
                // Verifica se a senha fornecida corresponde ao hash no banco de dados
                if (password_verify($senha, $professor->senha)) {
                    $_SESSION['id_professor'] = $professor->id_professor;
                    $_SESSION['name'] = $professor->nome;
                    close();
                    header("Location: ../pages/private/areaProf.php");
                    return;
                }
            }
        } else {
            // Se encontrado na tabela de alunos, verifica a senha
            $aluno = $result_alunos->fetch_object();
            // Verifica se a senha fornecida corresponde ao hash no banco de dados
            if (password_verify($senha, $aluno->senha)) {
                $_SESSION['id_aluno'] = $aluno->id_aluno;
                $_SESSION['name'] = $aluno->nome;
                close();
                header("Location: ../pages/private/areaAluno.php");
                return;
            }
        }
    
        close();
        $msg = "Usuário ou senha incorretos";
        header("Location: ../pages/public/login.php?msg-error={$msg}");
    } catch (Exception $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }
}