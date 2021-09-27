<?php
include('../Database/Connection.php');
session_start();

$idProd = $_POST['id'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$categoria = $_POST['categoria'];
$preco = $_POST['preco'];
$condicao = $_POST['condicao'];
$dias = $_POST['dias'];
$logistica = $_POST['logistica'];
$peso = $_POST['peso'];
$largura = $_POST['largura'];
$comprimento = $_POST['comprimento'];
$altura = $_POST['altura'];
$imgNome = $_FILES['imagem']['name'];
$imgType = $_FILES['imagem']['type'];
$imagem = addslashes(file_get_contents($_FILES['imagem']['tmp_name']));



$query1 = "INSERT into Produtos (ID, Nome, Descricao) VALUES ( '$idProd', '$nome','$descricao');";
$query2 = "INSERT into Info_Produto (ID, Preco, Categoria, Condicao) VALUES ( '$idProd', '$preco','$categoria','$condicao');";
$query3 = "INSERT into Postagem (ID, Logistica, Peso,Largura,Comprimento,Altura,Dias_PEntrega) VALUES ( '$idProd', '$logistica','$peso','$largura','$comprimento','$altura','$dias');";
$query4 = "INSERT into Imagens (ID, Imagem) VALUES ('$idProd','$imagem' );";


if (mysqli_query($conn, $query1) && mysqli_query($conn, $query2) && mysqli_query($conn, $query3) && mysqli_query($conn, $query4)) {


    $_SESSION['criar_success'] = true;

    header("Location: ../../../../Pages/home.php");
    exit();
} else {


    $_SESSION['criar_erro'] = true;

    header("Location: ../../../../Pages/home.php");
    exit();
}
mysqli_close($conn);
