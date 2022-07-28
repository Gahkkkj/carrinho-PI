<?php
	session_start();	
	//Incluindo a conexão com banco de dados
	include_once("../App/db/database.php");	
	//O campo usuário e PINCODE preenchido entra no if para validar
	if((isset($_POST['EMAIL'])) && (isset($_POST['PINCODE']))){
		$usuario = mysqli_real_escape_string($conn, $_POST['EMAIL']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
		$PINCODE = mysqli_real_escape_string($conn, $_POST['PINCODE']);
	
			
		//Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
		$result_usuario = "SELECT * FROM usuario WHERE EMAIL = '$usuario' && PINCODE = '$PINCODE' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		$resultado = mysqli_fetch_assoc($resultado_usuario);
		
		//Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
		if(isset($resultado)){
			$_SESSION['usuarioId'] = $resultado['UID'];
			$_SESSION['usuarioNome'] = $resultado['NAME'];
			$_SESSION['usuarioNiveisAcessoId'] = $resultado['niveis_acesso_id'];
			$_SESSION['usuarioEMAIL'] = $resultado['EMAIL'];
			if($_SESSION['usuarioNiveisAcessoId'] == "1"){
				header("Location: ../index.php");
			}elseif($_SESSION['usuarioNiveisAcessoId'] == "2"){
				header("Location: ../indexClient.php");	
			}
			//Não foi encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
			//redireciona o usuario para a página de login
			}else{	
			//Váriavel global recebendo a mensagem de erro
			$_SESSION['loginErro'] = "Usuário ou PINCODE Inválido";
			header("Location: login.php");
		}
	//O campo usuário e PINCODE não preenchido entra no else e redireciona o usuário para a página de login
	}else{
		$_SESSION['loginErro'] = "Usuário ou PINCODE inválido";
		header("Location: login.php");
	}
?>