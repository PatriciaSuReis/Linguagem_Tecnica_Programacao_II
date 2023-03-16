<?php
    include_once ("Sequencia.class.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 129</title>
</head>
<body>


    <form action="Exercicio129.php" method="post">

    <label for="inicio">Selecione o valor incial:</label>
    <select name="inicio" id="inicio">
        <option value="0" selected disabled>Selecione</option>
        <?php
            for ($i=1; $i <= 100 ; $i++) { 
                echo "<option value=".$i."> $i </option>";
            }
        ?>
    </select>

            <br>

    <label for="fim">Selecione o valor final:</label>
    <select name="fim" id="fim">
        <option value="" selected disabled>Selecione</option>
        <?php
            for ($i=1; $i <= 100 ; $i++) { 
                echo "<option value=".$i."> $i </option>";
            }
        ?>
    </select>
            <br><br>
    <label for="mostrar">Mostrar:</label> <br>
        <input type="radio" name="mostrar" value="todos">
        <label for="todos">Todas</label><br>

        <input type="radio" name="mostrar" value="par"> 
        <label for="par">Apenas os pares</label><br>

        <input type="radio" name="mostrar" value="impar">
        <label for="impar">Apenas os ímpares</label><br><br>

        <input type="submit" name="enviar" value="Enviar">
        

        <!-- ENVIAR PARA A CLASSE -->
        <?php

            if (isset($_POST["mostrar"])) {

                $inicio = $_POST["inicio"];
                $fim = $_POST["fim"];
                $op = $_POST["mostrar"];

                $sequencia = new Sequencia();

                $sequencia->setInicio($inicio);
                $sequencia->setFim($fim);

                switch ($op) {
                    case "todos":
                        $saida = $sequencia->exibirPares();
                        break;
                    
                    case "par":
                        $saida = $sequencia->exibirPares();
                        break;
                    
                    case "impar":
                        $saida = $sequencia->exibirImpares();
                        break;
                } 

        ?>

    </form>
    
    <h3>Resultado: <h3>

    <?php
    
        foreach ($saida as $key => $value) {
            echo $value . " - ";
        }
    }

    ?>
  

</body>
</html>