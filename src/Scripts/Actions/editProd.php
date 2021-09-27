<?php
include('../Database/Connection.php');
session_start();

$idProd = $_POST['editID'];
$nome = $_POST['nomeEdit'];
$descricao = $_POST['descEdit'];
$categoria = $_POST['catEdit'];
$preco = $_POST['precoEdit'];
$condicao = $_POST['condEdit'];
$dias = $_POST['diasEdit'];
$logistica = $_POST['logisticaEdit'];
$peso = $_POST['pesoEdit'];
$largura = $_POST['largEdit'];
$comprimento = $_POST['compEdit'];
$altura = $_POST['alturaEdit'];
$imgNome = $_FILES['imgEdit']['name'];
$imgType = $_FILES['imgEdit']['type'];
$imagem = addslashes(file_get_contents($_FILES['imgEdit']['tmp_name']));


$query1 = "UPDATE Produtos SET Nome = '$nome', Descricao = '$descricao' WHERE Produtos.ID='$idProd';";
$query2 = "UPDATE Info_Produto SET Preco = '$preco', Categoria='$categoria', Condicao='$condicao'  WHERE Info_Produto.ID='$idProd';";
$query3 = "UPDATE Postagem SET Logistica ='$logistica' , Peso='$peso' , Largura='$largura', Comprimento='$comprimento',Altura='$altura', Dias_PEntrega = '$dias' WHERE Postagem.ID='$idProd';";
$query4 = "UPDATE Imagens SET Imagem ='$imagem'  WHERE Imagens.ID='$idProd';";

if (!empty($_FILES['imgEdit']['tmp_name'])) {
    mysqli_query($conn, $query4);
} else {
} // este bloco serve para identificar se uma imagem nova foi carregada
// caso nenhum arquivo seja enviado. mantem-se a imagem orignal

if (mysqli_query($conn, $query1) && mysqli_query($conn, $query2) && mysqli_query($conn, $query3)) {


    $_SESSION['edit_sucesso'] = true;

    header("Location: ../../../../Pages/home.php");
    exit();
} else {


    $_SESSION['edit_erro'] = true;

    header("Location: ../../../../Pages/home.php");
    exit();
}
mysqli_close($conn);
