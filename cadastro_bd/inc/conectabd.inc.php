  <?php
  // conectabd.inc.php
  $link = mysqli_connect("localhost", "root", "1234567#", "curso");
  
  // mysqli_connect_errno - devolve o código do erro
  if (mysqli_connect_errno()) {
	  // mysqli_connect_error - devolve a mensagem de erro
	  printf("Erro ao conectar ao banco de dados: %s<br> ", mysqli_connect_error() );
	  exit();
  }

 // var_dump($link);
 //   echo 'aqui <br>';