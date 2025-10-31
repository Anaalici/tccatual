<?php
include 'conexao.php';

$mensagem = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nome = $_POST['nomeUsuario'] ?? '';
    $dataNasc = $_POST['dataNasc'] ?? '';
    $cpf = $_POST['cpf'] ?? '';
    $email = $_POST['email'] ?? '';
    $contato = $_POST['contato'] ?? '';
    $senha = $_POST['senha'] ?? '';
    
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
    
    $sql_check = "SELECT cpf FROM usuario WHERE cpf = '$cpf'";
    $result_check = $conexao->query($sql_check);

    if ($result_check->num_rows > 0) {
        $mensagem = "ERRO: Já existe um usuário cadastrado com este CPF.";
    } else {
        $sql_insert = "INSERT INTO usuario (nomeUsuario, dataNasc, cpf, email, contato, senha) 
                       VALUES ('$nome', '$dataNasc', '$cpf', '$email', '$contato', '$senha_hash')";
        
        if ($conexao->query($sql_insert) === TRUE) {
            $mensagem = "USUÁRIO CADASTRADO COM SUCESSO! Redirecionando...";
            header("refresh:3; url=PRINCIPAL.php");
            exit();
        } else {
            $mensagem = "ERRO AO CADASTRAR: " . $conexao->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADASTRO - Tabela Usuario</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <CENTER><h2>FORMULÁRIO DE CADASTRO</h2></CENTER>
    
    <div style="text-align: center; color: yellow; margin-bottom: 15px;"><?php echo $mensagem; ?></div>

    <form method="POST" action="index.php">
        
        <label for="nomeUsuario">Nome Completo:</label>
        <input type="text" name="nomeUsuario" required autocomplete="off">

        <label for="dataNasc">Data de Nasc.:</label>
        <input type="date" name="dataNasc" required>
        
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" maxlength="14" required autocomplete="off">

        <label for="email">E-mail:</label>
        <input type="email" name="email" required autocomplete="off">

        <label for="contato">Contato:</label>
        <input type="text" name="contato" maxlength="11" required autocomplete="off">

        <label for="senha">Senha:</label>
        <div class="senha-container">
            <input type="password" id="senha" name="senha" required autocomplete="off">
            <span class="toggle-senha" onclick="togglePasswordVisibility()">👁️</span>
        </div>
        
        <input type="submit" name="cadastrar" value="CADASTRAR">
    </form>
    
    <script>
        function togglePasswordVisibility() {
            const senhaInput = document.getElementById('senha');
            const toggleSpan = document.querySelector('.toggle-senha');

            if (senhaInput.type === 'password') {
                senhaInput.type = 'text';
                toggleSpan.textContent = '🙈';
            } else {
                senhaInput.type = 'password';
                toggleSpan.textContent = '👁️';
            }
        }
    </script>
    
</body>
</html>