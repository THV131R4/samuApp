<!DOCTYPE html>

<?PHP
	/*session_start();

	//Caso o usuário não esteja autenticado, limpa os dados e redireciona
	if ( !isset($_SESSION['login']) and !isset($_SESSION['senha']) ) {
		//Destrói
		session_destroy();

		//Limpa
		unset ($_SESSION['login']);
		unset ($_SESSION['senha']);
		
		//Redireciona para a página de autenticação
		header('location:login.php');
	}*/

	
?>

<html>
<head>
	<title>Home</title>
	<script src="../js/atendimento.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body onload="busca_atendimento()">
	<h1>Logado</h1>
	<tbody id="lista">
          <!--javascript insere aqui dentro-->
    </tbody>

</body>
</html>