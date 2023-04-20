<?php
$alunos = [array("nome"=>"Pedro","media"=>"5","sexo"=>"M"),
array("nome"=>"Jadir","media"=>"7","sexo"=>"ND"),
array("nome"=>"Maria","media"=>"8","sexo"=>"F")];

/*1) exibir os dados do vetor $nomes como uma tabela HTML e acrescentar mais uma coluna com a
Situação do aluno.
2) Se a Média for maior ou igual a 6 (seis) a situação será “Aprovado” senão a situação será
“Reprovado”.*/

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>
    body * {
        font-size: 110%;
    }
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    </style>
    

</head>
<body>
    
<table>
    <thead>
        <tr>
            <?php
            foreach (array_keys($alunos[0]) as $cabecalho):
                echo "<th>{$cabecalho}</th>";     
            endforeach;
            ?>
            <th>Situação</th>
        </tr>
    </thead>

    <tbody>

<?php

    foreach ($alunos as $chave => $aluno):

        echo "<tr>";

        foreach ($alunos[$chave] as $celula):
            echo "<td>" . $celula . "</td>";
        endforeach;

        if ($aluno['media'] >= 6) {
            $situcao = "Aprovado";
        }
        else {
            $situcao = "Reprovado";
        }
        
        echo "<td>$situcao</td>";

        echo "</tr>";

    endforeach;


?>

    <tbody>
</table>


</body>
</html>