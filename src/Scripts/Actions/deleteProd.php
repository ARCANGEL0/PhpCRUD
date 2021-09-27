<?php
include('../Database/Connection.php');
session_start();

$idProd = $_POST['id'];



$query = "delete from Produtos where Produtos.ID = '$idProd';
";
if (mysqli_query($conn, $query)) {

    $_SESSION['apagar_sucesso'] = true;

    header("Location: ../../../../Pages/home.php");
    exit();
} else {

    $_SESSION['apagar_erro'] = true;

    header("Location: ../../../../Pages/home.php");
    exit();
}
mysqli_close($conn);
