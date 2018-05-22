
function busca_atendimento(){
    $.ajax({
        type: "POST",
        url: "../../controller/ctrlistar_atendimento.php",
        success: function (plainObject) {

            json = JSON.parse(plainObject); 
            atendimentos = json.atendimento;
          //  console.log(atendimentos);
            listar_atendimento(atendimentos);
        }//fecha sucess
    });
}

function listar_atendimento(patendimentosParaListar){
    var listagem = "";
    if(patendimentosParaListar == 0){//se a cnsulta retornar vazia, ele exibe esta mensagem
        listagem+='<tr><td>Nenhum item encontrado!</td></tr>';
    } else { 
        for ( var i = 0; i < patendimentosParaListar.length; i++) { 
            var atendimento = patendimentosParaListar[i];
           
                listagem += '<tr>' ;
                listagem += '<td >'+atendimento.nome+'</td>' ;
                listagem += '<td >'+atendimento.data+'</td>' ;
                listagem += '<td >'+atendimento.tipo+'</td>' ;
            
                listagem += '<td><button onclick="visualizaratendimento('+atendimento.idatendimento+')" title="Visualizar"></button>'; 
                listagem += '</tr>';
        }//fecha o for  
    }//fecha else    
    //alert(listagem);
    $("#lista").html(listagem);
}//fecha a função listar_atendimento
