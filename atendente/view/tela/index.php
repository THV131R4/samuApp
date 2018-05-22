
<?PHP
//ini_set('display_errors', 0);
require_once('../../model/class_bd.php');
$bd = new BD(); //cria objeto bd da classe BD para conectar ao banco
// as variáveis login e senha recebem os dados digitados na página anterior
$login = $_POST['login'];
$senha = $_POST['senha'];

//Conexão mysql
//$conexao = mysql_connect($hostname, $username, $password) or die ("Erro na conexão do banco de dados.");

//Seleciona o banco de dados
//$selecionabd = mysql_select_db($database,$conexao) or die ("Banco de dados inexistente.");

//Comando SQL de verificação de autenticação
 $query = "
	                  SELECT * FROM usuario
	                  WHERE login=" . $login . " 
	                  AND senha=".$senha."
	                  ;
	        "; //fecha $query 

//$resultado = mysql_query($sql,$conexao) or die ("Erro na seleção da tabela.");
$resultado = $bd->query($query);

//Caso consiga logar cria a sessão
if (count($resultado) > 0) {
	// session_start inicia a sessão
	session_start();
	
	$_SESSION['login'] = $login;
	$_SESSION['senha'] = $senha;
	header('location:home.php');
}

//Caso contrário redireciona para a página de autenticação
else {
	//Destrói
	session_destroy();

	//Limpa
	unset ($_SESSION['login']);
	unset ($_SESSION['senha']);

	//Redireciona para a página de autenticação
	header('location:login.php');
	
}

?>