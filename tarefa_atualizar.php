<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        //Inclue a conexão de dados e o CSS
        include "referencias.php";

        //1º PASSO: Capturar o ID que será removido
        $id = $_POST["txtId"];
        $responsavel = $_POST["txtResponsavel"];
        $descricao = $_POST["txtDescricao"];
        $data_entrega = $_POST["txtData"];
        $prioridade = $_POST["txtPrioridade"];

        //2º PASSO: Construir o comando SQL que será executado
        $sql = "UPDATE tarefa SET responsavel = ?, descricao = ?, data_entrega = ?, prioridade = ? WHERE id = ?";

        //3º PASSO: Vincular onde o código SQL com a conexão
        //ou seja em que conexão de dados será executado
        $comando = $conexao->prepare($sql);

        //4º PASSO: Relacionar cada parametro (?) com o seu valor
        $comando->bind_param("ssssi",$responsavel,$descricao,$data_entrega,$prioridade,$id);

        //5º PASSO: Executar o comando no BDA
        if ($comando->execute())
        {
            echo "<h1>Tarefa Atualizada!</h1>";
        }
        else
        {
            echo "<h1>Não conseguimos atualizar</h1>";
        }


    ?>
</body>
</html>