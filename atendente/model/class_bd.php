<?php
	class BD{//abro classe do banco de dados	
		//http://php.net/manual/pt_BR/mysqli-stmt.prepare.php
		public $dsn = 'mysql:dbname=dashboardbd;host=127.0.0.1',//sgbd:nome do banco; meu endereço do servidor
				$user ='root',//usuario que acessa o banco de dados
				$password='',//senha para acesso ao banco de dados de acordo com o usuario
				$conexao;//este atributo se tornara obejto da classe pdo ao passar pelo construtor 
				
		public function __construct(){//construtor da classe bd
			try {//tenta conectar, se nao conseguir ele retorna o erro que ocorreu ao tentar conectar 
			   $this->conexao = new PDO($this->dsn, $this->user, $this->password);//a conexao é estabelecida usando PDO, conexao se torna objeto da classe PDO
			  //echo "Conectado ao banco!<br>";//se ele conseguiu conectar ele retorna a mensagem de que conectou ao banco
			} catch (PDOException $erro) {//se tentou conectar e nao conseguiu guarda esta exceção no atributo $erro
			   echo 'Erro na conexao: ' . $erro->getMessage();//imprime na ela qual o erro da conexao, o metodo getMEssage puxa a mensagem do erro
			}// fecha catch
		}//fecha metodo construtor		
		//este metodo recebera as querys das classes para executa-las no banco de dados
		public function query($query){// abre o metodo "query" e recebe o parametro query(atributo) que vem de outras classes com o comando a ser execultado no banco dados, seja dml, dql, ou qualquer outro procedimento 
			//echo "O metodo query esta recebendo a seguinte query: ".$query."<br>";//imprime qual o procedimento que ira ser executado no banco de dados
			//echo (empty($query) ? "query vazia!<br>" : "query ocupada!<br>");// imprime se o atributo query esta recebendo para execuçao no banco de dados
			$query = $this->conexao->prepare($query);//preparo o banco para receber a query 
			if ($query->execute()){//se conseguir executar procedimento retorna a query
				return $query;//retorno query
				//echo "Procedimento feito com sucesso!";//impreime que a execçao do comando ao banco de dads ocorreu bem
			} else {//senão imprime que houve erro ao executar a query e fornece as informaçoes do erro
				//echo "Erro ao executar este procedimento!";//imorime que ocorreu um erro ao executar o procedimento
				//echo "<script>alert('nao deu certo')</script>";
				print_r($this->conexao->errorInfo());// imprime um array fornecendo imformaçoes deste erro
			}//fecha else
		}//fecha metodo query		
		//esta funcao força a desconexao com o banco de dados
		public function desconectar(){//funçao para desconectar banco
			$this->conexao = NULL;//chama o atributo da conexao(que agora é objeto da classe pdo) e eatribui valor nulo forçando a desconexao
		}//fecha metodo desconectar
	}//fecha classe bd	  
?>
