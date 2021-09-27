<?php

// Este arquivo serve para identificar se o usuário possui uma sessão ativa em loginAdmin
// Caso ele não possua uma sessão, irá ser redirecionado para a página de login
session_start();
if(!$_SESSION['login']) {
	header('Location: ../../index.php');
	exit();
}
