<?php

Class Usuario
{
	private $pdo;
	public $msgErro = "";

	public function conectar($nome, $host, $usuario, $senha)
	{
		global $pdo;
		try 
		{
			$pdo = new PDO("mysql:dbname=".$nome,$usuario,$senha);
		} catch (PDOException $e) {
			$msgErro = $e->getMessage();
		}
	}

	public function cadastrar($Nome, $Email, $Senha)
	{
		global $pdo;
		//verificar se já existe o email cadastrado
		$sql = $pdo->prepare("SELECT id FROM dbs WHERE email = :e");
		$sql->bindValue(":e",$Email);
		$sql->execute();
		if($sql->rowCount() > 0)
		{
			return false; //ja esta cadastrado
		}
		else
		{
			//caso nao, Cadastrar
			$sql = $pdo->prepare("INSERT INTO dbs (nome, email, senha) VALUES (:n, :e, :s)");
			$sql->bindValue(":n",$Nome);
			$sql->bindValue(":e",$Email);
			$sql->bindValue(":s",md5($Senha));
			$sql->execute();
			return true; //tudo ok
		}
	}


	public function logar($Email, $Senha)
	{
		global $pdo;
		//verificar se o email e senha estao cadastrados, se sim
		$sql = $pdo->prepare("SELECT id FROM dbs WHERE email = :e AND senha = :s");
		$sql->bindValue(":e",$Email);
		$sql->bindValue(":s",md5($Senha));
		$sql->execute();
		if($sql->rowCount() > 0)
		{
			//entrar no sistema (sessao)
			$dado = $sql->fetch();
			session_start();
			$_SESSION['id'] = $dado['id'];
			return true; //cadastrado com sucesso
		}
		else
		{
			return false;//nao foi possivel logar
		}
	}
}







?>