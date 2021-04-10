<?php
    require_once 'classes/usuarios.php';
    $u = new Usuario();
    include_once 'bar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href = "index.css" rel = "stylesheet"/>
    <title>Registro</title>
</head>
<body>
    <div class = "form">
        <h3 class = 'principal'>Registre-se</h3>
        <form action = '#' method= "POST">      
            <input type = "text" id = "Nome" placeholder = "Nome" name = "Nome" required></br>
            <input type = "email" id = "Email" placeholder = "Email" name = "Email" required></br>
            <input type="password" id = "Senha" name= "Senha" placeholder = "Senha" minlength="8" required></br>
            <input type="password" id = "ConfirmarSenha" name="ConfirmarSenha" placeholder = "Confirme a Senha" minlength="8" required></br>
            <input type = "submit" class = "enviar" value = "Enviar"></br> 
            <p> voce ja tem uma conta? <a href = 'login.php'>Logar</a></p>
        </form>
    </div>    
</body>
</html>    
<?php

    if(isset($_POST['Nome']))
    {
        $Nome = addslashes($_POST['Nome']);
        $Email = addslashes($_POST['Email']);
        $Senha = addslashes($_POST['Senha']);
        $ConfirmarSenha = addslashes($_POST['ConfirmarSenha']);
    }
    if(!empty($Nome) && !empty($Email) && !empty($Senha) && !empty($ConfirmarSenha))
    {
        $u->conectar("db_teste","localhost","root","");
        if(md5($Senha) == md5($ConfirmarSenha))
        {
            if($u->cadastrar($Nome,$Email,$Senha))
            {
                ?>
                <p class = 'p'>cadastrado com sucesso!</p>
                <?php
                header("location: login.php"); 
            }
            else{
                ?>
                <p class = 'p'>email ja cadastrado!</p>
                <?php
                header("location: login.php");
            }
        }
        else{
            echo("Senha e Confirmar senha não coincidem");
        }
    }
   else{
    echo("preencha todos os campos!");
   }
?>