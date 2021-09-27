<?php
include('../Database/Connection.php');
session_start();
// Inclusão do arquivo para conectar ao Banco de Dados


if (empty($_POST['loginUsuario'])) { // Verifica se o campo de usuário está vazio
	$_SESSION['semUsuario'] = true;  // Caso ele estiver vazio, redireciona para o login com a sessão semUsuario
	header('Location: ../../index.php'); // Exibindo um alerta "Digite um usuário"
	exit();
}


if (empty($_POST['loginSenha'])) { // Verifica se o campo da senha está vazio
	$_SESSION['semSenha'] = true; // Caso ele estiver vazio, redireciona para o login com a sessão semSenha
	header('Location: ../../index.php'); // Exibindo um alerta "Digite a senha!"
	exit();
}
// Definição das variáveis dos campos de login
$usuario = $_POST['loginUsuario'];
$senha = $_POST['loginSenha'];

$queryADMIN = mysqli_query($conn, "SELECT * FROM Login WHERE Usuario='$usuario' AND Senha='$senha'"); // Query do SQL

$rowsADMIN = mysqli_num_rows($queryADMIN); // Variável para o número de registros




// Aqui começa um block de else if's verificando nivel por nivel
if ($rowsADMIN == 1) { // Se as credenciais baterem, então irá aparecer apenas 1 registro, e essa condicional testa se é verdadeiro
	$_SESSION['login'] = true;
	$_SESSION['usuario'] = $usuario;

	//define a sessão loginAdmin e redireciona para o painel
	header("Location: ../../Pages/home.php");

	exit();
}
// Caso não encontre nada
else {

	$_SESSION['nao_autenticado'] = true; // Caso retorne falso, é porque não apareceu nenhum registro
	header('Location: ../../index.php'); // Logo, as credenciais estão erradas, e irá voltar ao login cm a sessão nao_autenticado
	exit();
} // Exibindo um alerta de usuario ou senha errados

mysqli_close($conn); // Fechando conexão
