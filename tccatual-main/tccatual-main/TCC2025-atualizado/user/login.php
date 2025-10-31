<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./user/user.css">
</head>
<body>

<div class="circle">
        <img class="imgSign" src="./user/userImg/user1.png" alt="">
        <div class="contanerBranco">
            <h2 class="h2">Sign in</h2>
                <div class="icons-container">
                    <img class="icons" src="./user/userImg/facebook.png" alt="">
                    <img class="icons" src="./user/userImg/google.png" alt="">
                    <img class="icons" src="./user/userImg/linkedin.png" alt="">
                </div>

                <div class="inputs">
                <form method="POST" action="">
                <input class="inputLogin" type="text" name="nome" placeholder="User" required>
                <input class="inputLogin" type="text" name="Senha" placeholder="Senha" required>
                </form>
                 </div>

                <div class="EsqueciS">
                <input type="checkbox" id="mostrarSenha">
                <label for="mostrarSenha">Mostrar senha</label>
                <a class="senha" href="#">Esqueci senha</a>
                </div>

                <input class="button" type="submit" value="Enviar">
            

        
</div>

</body>
</html>