
<?php
include('../Database/Connection.php');



$id = $_POST['prodId'];

$array = array();

$sql = "SELECT prod.*, info.*,cat.Nome_Categoria,post.*, img.Imagem from  Produtos prod 
inner join Imagens img on img.ID = prod.ID
inner join Info_Produto info on info.ID = prod.ID
inner join Categoria cat on cat.ID = info.Categoria
inner join Postagem post on post.ID = prod.ID
where prod.ID = '$id';";

$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {
    $id = $row['ID'];
    $nome = $row['Nome'];
    $descricao = $row['Descricao'];
    $logistica = $row['Logistica'];
    $peso = $row['Peso'];
    $largura = $row['Largura'];
    $comprimento = $row['Comprimento'];
    $altura = $row['Altura'];
    $dias = $row[Dias_PEntrega];
    $views = $row['Visualizacoes'];
    $likes = $row['Likes'];
    $preco = $row['Preco'];
    $vendas  = $row['Vendas'];
    $condicao = $row['Condicao'];
    $categoria = $row['Nome_Categoria'];
    $imagem = base64_encode($row['Imagem']);
    $array[] = array(
        "id" => $id,
        "nome" => $nome,
        "views" => $views,
        "likes" => $likes,
        "preco" => $preco,
        "vendas" => $vendas,
        "condicao" => $condicao,
        "categoria" => $categoria,
        "descricao" => $descricao,
        "peso" => $peso,
        "largura" => $largura,
        "altura" => $altura,
        "comprimento" => $comprimento,
        "dias" => $dias,
        "logistica" => $logistica,
        "imagem" => $imagem
    );
}

// encoding array to json format
echo json_encode($array);
