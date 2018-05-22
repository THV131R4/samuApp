<?php
    include_once ('../model/class_bd.php');
    ini_set( 'display_errors', 0 );
    $bd = new BD();//crio objeto bd para estabelecer conexao com banco de dados   

   
        $query="SELECT * FROM samu.atendimento;";

        $atendimentos = $bd->query($query);

        $json = '
                        {"atendimento":[
        ';

        while ($linha = $atendimentos->fetch(PDO::FETCH_ASSOC)) {

            $json .= '  {
                                "idatendimento":"' . $linha['idatendimento'] . '",
                                "nome":"' . $linha['nomeatendimento'] . '",
                                "data":"' . $linha['data'] . '",
                                "tipo":"' . $linha['tipo'] . '"
            },';
        }// FECHA while    

        $json = substr($json, 1, -1);
        $json .= "]}";//fecha json
        echo $json;   
        $bd->desconectar();//desconecta o banco
           
    
   
?>