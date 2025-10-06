<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefa :: Inserir</title>
    <?php 
        include "referencias.php";
    ?>
</head>
<body>
    <?php
        //OPERAÇÃO DE INSERT 
        //1º PASSO: CAPTURAR CADA REGISTRO DEVE SER INSERIDO NA TABELA
        // INSERT INTO () VALUES ()

        $descricao = $_POST["txtDescricao"];
        $data_entrega = $_POST["txtData"];
        $prioridade = $_POST["txtPrioridade"];
        $responsavel = $_POST["txtResponsavel"];

        //2º PREPARAR O COMANDO SQL QUE SERÁ EXECUTADO
        //Criamos uma variável e passamos os parametros como (?)
        //Cada parametro ficará com Interrogação (?)

        $sql = "INSERT INTO tarefa(descricao,data_entrega,prioridade,responsavel) VALUES (?,?,?,?)";

        //3º VINCULAR ONDE O COMANDO SQL SERÁ EXECUTADO
        $comando = $conexao->prepare($sql);

        //4º ASSOCIAR CADA (?) COM SEUS VALORES RESPECTIVOS
        $comando->bind_param("ssss",$descricao,$data_entrega,$prioridade,$responsavel);

        //5º EXECUTAR O COMANDO NA CONEXÃO DE DADOS

        if ($comando->execute())
        {
            echo "<h1>Tarefa marcada!</h1>";
        }
        else
        {
            echo "<h1>Erro!Confira os dados!</h1>";
        }




    ?>
  
    
</body>
</html>