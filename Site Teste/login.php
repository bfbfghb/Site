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
    <title>Login</title>
</head>
<body>
    <div class = "form">
	<form action = '#' method="POST">
            <input type = "email" id = "Email" placeholder = "Email" name = "Email" required></br>
            <input type="password" id = "Senha" name= "Senha" placeholder = "Senha" minlength="8" required></br>
            <input type = "submit" class = "enviar" value = "Enviar"></br> 
	</form>
    </div>
</body>
</html>
<?php
if(isset($_POST['Email']))
{
	$Email = addslashes($_POST['Email']);
	$Senha = addslashes($_POST['Senha']);	
	if(!empty($Email) && !empty($Senha))
	{
		$u->conectar("db_teste","localhost","root","");
		if($u->msgErro == "")
		{
			if($u->logar($Email,$Senha))
			{
				header("location: index.php");
			}
			else{
			    echo("Email e/ou senha estão incorretos!");
			}
		}
		else
		{
		    echo "Erro: ".$u->msgErro;
		}
	}else
	{
		echo("Preencha todos os campos!");
	}
}
?>