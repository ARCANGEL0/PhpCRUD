<?php
define('HOST', '127.0.0.1');
define('USUARIO', '{ USUARIO }');
define('SENHA', ' {  SENHA } ');
define('DB', '{ BANCO } ');

$conn = mysqli_connect(HOST, USUARIO, SENHA, DB);
if ($conn === false) {
    die("ERRO: Não foi possivel conectar. " . mysqli_connect_error());
}
