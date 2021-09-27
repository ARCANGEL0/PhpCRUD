<?php
// Aqui o PHP inicia uma sessão, e inclui o arquivo verifyLogin.php ao carregar
session_start();
include('../Scripts/Login/Verify/adminVerify.php');

include('../Scripts/Database/Connection.php');
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Sistema de Cadastro</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/Global/css/adminlte.min.css">
  <link rel="stylesheet" href="../assets/Global/css/style.css">


  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->



      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->


        <!-- Notifications Dropdown Menu -->

        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-user"></i>&nbsp;
            ADMIN </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Logado como ADMINISTRADOR </h3>
                  <div class="dropdown-divider"></div>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#editar" class="dropdown-item dropdown-footer bg-green">Editar</a>


            <div class="dropdown-divider"></div>
            <a href="../../Scripts/Login/Logout.php" class="dropdown-item dropdown-footer bg-cyan">Fazer logout</a>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->


    <!-- ALGORITMO PARA FORMATAR INPUTS COM MASCARA DE ENTRADA -->
    <script>
      function formatar(mascara, documento) {
        var i = documento.value.length;
        var saida = mascara.substring(0, 1);
        var texto = mascara.substring(i)

        if (texto.substring(0, 1) != saida) {
          documento.value += texto.substring(0, 1);
        }
      }
    </script>

    <!-- MODAL DE REGISTRAR -->

    <div id="criarProduto" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">


        <div class="modal-content">
          <div class="modal-header">

            <h4 class="modal-title">Registrar uma novo produto</h4>
          </div>
          <div class="modal-body ">
            <form enctype="multipart/form-data" action="../Scripts/Actions/createProd.php" method="POST" id="modalform">

              <h4>Informações básicas</h4>
              <hr style="border: 1px solid #ccc">
              <input placeholder="     ID do produto" required type="number" step="1" min="1" id="id" name="id">
              <br>
              <input placeholder="     Nome do produto" required type="text" id="nome" name="nome">
              <br>
              <input placeholder="     Descricao do produto" required type="text" id="descricao" name="descricao">
              <br>
              <select required class="form-control" name="categoria" for="categoria">Categoria
                <option selected hidden disabled value=""> Categoria</option>
                <?php
                $query =  mysqli_query($conn, "SELECT * From Categoria");
                while ($row = mysqli_fetch_array($query)) {
                  echo '<option value="' . $row['ID'] . '">' . $row['Nome_Categoria'] . '</td>';
                };

                ?>

              </select>

              <br><br>
              <h4>Informações do produto</h4>
              <hr style="border: 1px solid #ccc">


              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">R$</span>
                  <input style="border-radius:0; height:100%" placeholder="  Preço de venda" min="0.50" required type="number" step=".01" id="preco" name="preco">
                </div>

              </div>
              <br>
              <select class="form-control" required name="condicao" id="condicao">
                <option hidden selected disabled value="">Condição</option>
                <option value="novo">Novo</option>
                <option value="semi">Semi Novo</option>
                <option value="usado">Usado</option>
              </select>
              <br>
              <input placeholder="     Dias para entrega" required type="number" min="2" step="1" id="dias" name="dias">
              <br>
              <input placeholder="     Logística de envio" required type="text" id="logistica" name="logistica">
              <br>
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <input style="border-radius:0; height:100%; width:100%" placeholder="     Peso do pacote" min="10" required type="text" id="peso" name="peso">

                  <span class="input-group-text" id="basic-addon1">g</span>
                </div>
              </div>

              <br>
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <input style="border-radius:0; height:100%; " placeholder="     Largura do produto" min="5" required type="text" id="largura" name="largura">

                  <span class="input-group-text" id="basic-addon1">cm</span>
                </div>
              </div>
              <br>
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <input style="border-radius:0; height:100%; " placeholder="     Comprimento do produto" min="5" required type="text" id="comprimento" name="comprimento">

                  <span class="input-group-text" id="basic-addon1">cm</span>
                </div>
              </div>
              <br>

              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <input style="border-radius:0; height:100%; " placeholder="     Altura do produto" required type="text" min="5" id="altura" name="altura">

                  <span class="input-group-text" id="basic-addon1">cm</span>
                </div>
              </div>

              <br>
              <label style="font-size:24px;height:5%; " class="btn btn-default btn-file">
                Escolher imagem <input style="display:none; " required name="imagem" type="file" id="imagem">

              </label>
              <br>


          </div>
          <div class="modal-footer">
            <button type="submit" name="registrar" id="registrar" class="btn btn-success">Registrar</button>

            <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
            </form>
          </div>
        </div>

      </div>
    </div>
    <!-- FIM MODAL REGISTRAR -->

    <!-- MODAL DE EDITAR -->

    <div id="editProd" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">


        <div class="modal-content">
          <div class="modal-header">

            <h4 class="modal-title">Registrar uma novo produto</h4>
          </div>
          <div class="modal-body ">
            <form class="editform" enctype="multipart/form-data" action="../Scripts/Actions/editProd.php" method="POST" id="modalform">

              <h4>Informações básicas</h4>
              <hr style="border: 1px solid #ccc">
              <input type="hidden" id="editID" name="editID">
              <input placeholder="     Nome do produto" required type="text" id="nomeEdit" name="nomeEdit">
              <br>
              <input placeholder="     Descricao do produto" required type="text" id="descEdit" name="descEdit">
              <br>
              <select class="form-control" name="catEdit" for="catEdit">Categoria
                <?php
                $query =  mysqli_query($conn, "SELECT * From Categoria");
                while ($row = mysqli_fetch_array($query)) {
                  echo '<option value="' . $row['ID'] . '">' . $row['Nome_Categoria'] . '</td>';
                };

                ?>

              </select>

              <br><br>
              <h4>Informações do produto</h4>
              <hr style="border: 1px solid #ccc">


              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">R$</span>
                  <input style="border-radius:0; height:100%" placeholder="  Preço de venda" required type="number" step=".01" id="precoEdit" name="precoEdit">
                </div>

              </div>
              <br>
              <select class="form-control" name="condEdit" id="condEdit">
                <option hidden selected disabled value="">Condição</option>
                <option value="novo">Novo</option>
                <option value="semi">Semi Novo</option>
                <option value="usado">Usado</option>
              </select>
              <br>
              <input placeholder="     Dias para entrega" required type="number" step="1" id="diasEdit" name="diasEdit">
              <br>
              <input placeholder="     Logística de envio" required type="text" id="logisticaEdit" name="logisticaEdit">
              <br>
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <input style="border-radius:0; height:100%; width:100%" placeholder="     Peso do pacote" required type="text" id="pesoEdit" name="pesoEdit">

                  <span class="input-group-text" id="basic-addon1">g</span>
                </div>
              </div>

              <br>
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <input style="border-radius:0; height:100%; " placeholder="     Largura do produto" required type="text" id="largEdit" name="largEdit">

                  <span class="input-group-text" id="basic-addon1">cm</span>
                </div>
              </div>
              <br>
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <input style="border-radius:0; height:100%; " placeholder="     Comprimento do produto" required type="text" id="compEdit" name="compEdit">

                  <span class="input-group-text" id="basic-addon1">cm</span>
                </div>
              </div>
              <br>

              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <input style="border-radius:0; height:100%; " placeholder="     Altura do produto" required type="text" id="alturaEdit" name="alturaEdit">

                  <span class="input-group-text" id="basic-addon1">cm</span>
                </div>
              </div>

              <br>
              <label style="font-size:24px;height:5%; " class="btn btn-default btn-file">
                Escolher imagem <input style="display:none; " name="imgEdit" type="file" id="imgEdit">

              </label>
              <br>
              <h3>Imagem atual</h3>
              <img id="currentIMG" style="width: 20%; height:20%" />


          </div>
          <div class="modal-footer">
            <button type="submit" name="registrar" id="registrar" class="btn btn-success">Registrar</button>

            <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
            </form>
          </div>
        </div>

      </div>
    </div>
    <!-- FIM MODAL EDITAR -->

    <!-- MODAL PACOTE -->

    <div id="pkgProd" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">


        <div class="modal-content">
          <div class="modal-header">


            <h2 class="modal-title">Informações de logística</h2>

          </div>
          <div class="modal-body">
            <form action="../Scripts/Actions/editProd.php" method="POST" name="editarform" id="editarform">


              <div class="innerModal">


                <div class="container ">
                  <h1 class="display-4" style="margin-left: 20vw" id="nomePkg"></h1>
                  <div class="desc justify-content-center text-center">
                    <input name="descPkg" id="descPkg"></input>
                  </div>
                  <br><br><br>

                  <div class="d-flex flex-inline bd-highlight mb-3">

                    <div class="p-2 bd-highlight">
                      <label for="">Peso do pacote</label>
                      <input style="border:none" id="pesoPkg" disabled type="text">
                    </div>

                    <div class="p-2 bd-highlight">
                      <label style="margin-left: 0vw" for="">Logistica de entrega</label>
                      <input style="border:none" id="logisticaPkg" disabled type="text">
                    </div>



                  </div>

                  <div class="d-flex flex-inline bd-highlight mb-3">

                    <div class="p-2 bd-highlight">
                      <label for="">Dias para entrega</label>
                      <input style="border:none" id="diasPkg" disabled type="text">
                    </div>

                    <div class="p-2 bd-highlight">
                      <label style="margin-left: -2vw" for="">Condicao</label>
                      <input style="border:none" id="condicaoPkg" disabled type="text">
                    </div>



                  </div>

                  <div class="d-flex flex-inline bd-highlight mb-3">
                    <div class="p-2 bd-highlight">

                      <label for="">Altura</label>
                      <input style="border:none" id="alturaPkg" disabled type="text">
                    </div>

                    <div class="p-2 bd-highlight">
                      <label style="margin-left: 5vw" for="">Largura</label>
                      <input style="border:none; margin-left: 5vw" id="larguraPkg" disabled type="text">
                    </div>



                  </div>
                  <div style="margin-left: 18vw" class="d-flex flex-inline bd-highlight mb-3">
                    <div class="p-2 bd-highlight">

                      <label style="margin-left: -2vw" for="">Comprimento</label><br>
                      <input style="border:none" id="comprimentoPkg" disabled type="text">
                    </div>
                  </div>
                </div>
              </div>





          </div>
          <div class="modal-footer">

            <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
            </form>
          </div>
        </div>

      </div>
    </div>

    <!-- FIM MODAL PACOTE -->



    <!-- MODAL INFO -->

    <div id="infoProd" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">


        <div class="modal-content">
          <div class="modal-header">


            <h2 class="modal-title">Informações do produto</h2>

          </div>
          <div class="modal-body">
            <form action="" method="POST" name="" id="">


              <div class="innerModal">


                <div class="container">
                  <h1 class="display-4" style="margin-left: 20vw" id="nomeProd"></h1>
                  <img id="prodImg" style="width: 80%; height:70%;margin-left: 5vw" src="data:image/jpg;charset=utf8;" />

                  <br><br><br>

                  <div class="text-center">

                    <input disabled name="descInfo" id="descInfo"></input>
                    <br><br>
                  </div>
                  <br><br>

                  <div class="d-flex justify-content-center">
                    <label for="">Visualizações</label>
                    <input style="border:none; width: 40%; margin-left:5px" id="views" disabled type="text">
                    <label style="margin-left: 5vw" for="">Likes</label>
                    <input style="border:none; width: 40%; margin-left:5px" id="likes" disabled type="text">


                  </div>
                  <br>
                  <div class="d-flex justify-content-center">
                    <label for="">Preço</label>
                    <input style="border:none; width: 40%; margin-left:5px" id="precoProd" disabled type="text">
                    <label style="margin-left: 2vw" for="">Nº de Vendas
                      <input style="border:none; width: 40%; margin-left:5px" id="vendas" disabled type="text">


                  </div>

                  <br>
                  <div class="d-flex justify-content-center">
                    <label for="">Condição</label>
                    <input style="border:none; width: 40%; margin-left:5px" id="condicaoProd" disabled type="text">
                    <label style="margin-left: 2vw" for="">Categoria
                      <input style="border:none; width: 40%; margin-left:5px" id="categoria" disabled type="text">


                  </div>

                </div>
              </div>





          </div>
          <div class="modal-footer">

            <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
            </form>
          </div>
        </div>

      </div>
    </div>

    <!-- FIM MODAL INFO -->


    <!-- MODAL EDITAR -->

    <div id="apagarProduto" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">


        <div class="modal-content">

          <div class="modal-body">
            <form action="../Scripts/Actions/deleteProd.php" method="POST" name="apagarForm" id="apagarForm">

              <h2>Você tem certeza?</h2>
              <input name="id" type="hidden" id="idApagar">

          </div>
          <div class="modal-footer">
            <button type="submit" name="apagar" id="apagar" class="btn btn-danger">Apagar</button>

            <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
            </form>
          </div>
        </div>

      </div>
    </div>

    <!-- FIM MODAL APAGAR -->



    <!-- Content Wrapper. Início do conteudo -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Produtos</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->




      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">



          <button class="btn btn-success" type="button" name="button" data-toggle="modal" data-target="#criarProduto"><i class="fa fa-plus"></i> &nbsp; Cadastrar um novo produto</button>

          <br><br>
          <select class="btn btn-outline-info" name="filtroBusca" id="filtroBusca">
            <option selected value="">Todas as categorias</option>

            <?php
            $query =  mysqli_query($conn, "SELECT DISTINCT cat.* from Categoria cat;");
            while ($row = mysqli_fetch_array($query)) {
              echo '<option value="' . $row['Nome_Categoria'] . '">' . $row['Nome_Categoria'] . '</td>';
            };

            ?>

          </select>
          <table class="table table-bordered display" id="tabela" width="100%" cellspacing="0">
            <form action="" id="myform">
              <thead>
                <tr style="text-align: center;">
                  <th style="width: 5%">ID</th>
                  <th style="width: 10%">Criado em</th>
                  <th style="width: 10%">Nome</th>
                  <th style="width: 20%">Descrição</th>
                  <th style="width: 20%">Categoria</th>

                  <th style="width: 30%">Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $result =  mysqli_query(
                  $conn,
                  "SELECT p.*, cat.Nome_Categoria from Produtos p inner join Info_Produto info on info.ID = p.ID inner join Categoria cat on cat.ID = info.Categoria"
                );
                while ($row = mysqli_fetch_array($result)) {
                  echo "<tr>";
                  echo "<td>" . $row['ID'] . "</td>";
                  echo "<td>" . $row['Create_Time'] . "</td>";
                  echo "<td>" . $row['Nome'] . "</td>";
                  echo "<td>" . $row['Descricao'] . "</td>";
                  echo "<td>" . $row['Nome_Categoria'] . "</td>";
                  echo '<td><a class="btn-sm  btn-secondary btnEditar" id="editar" href="#"> <i class="fa fa-pen"></i>   </a>
&nbsp;



<a class="btn-sm btn-danger  btnDelete" name="deletar" href="#"><i class="fa fa-trash"></i></a>


  <a class="btn-sm btn-info  btnInfoProduct" name="info" href="#"><i class="fa fa-info-circle"></i></a>

  <a class="btn-sm btn-warning text-white btnPackage" name="envio" href="#"><i class="fa fa-box"></i></a>


</td>';
                  echo "</tr>";
                }

                mysqli_close($conn);
                ?>



              </tbody>
          </table>
          </form>




        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">


    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>


  <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="../../plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="../../plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="../../plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="../../plugins/moment/moment.min.js"></script>
  <script src="../../plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="../../plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../assets/Global/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="../../assets/Global/js/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../assets/Global/js/demo.js"></script>
  <script src="../../plugins/toastr/toastr.min.js"></script>

  <?php
  if (isset($_SESSION['criar_success'])) :
  ?>
    <script>
      $(function() {
        $(document).ready(function() {
          toastr.success('Produto registrado!');
        });
      });
    </script>
  <?php
  endif;
  unset($_SESSION['criar_success']);

  ?>

  <?php
  if (isset($_SESSION['criar_erro'])) :
  ?>
    <script>
      $(function() {
        $(document).ready(function() {
          toastr.error('Erro ao registrar produto!');
        });
      });
    </script>
  <?php
  endif;
  unset($_SESSION['criar_erro']);

  ?>

  <?php
  if (isset($_SESSION['erro_apagar'])) :
  ?>
    <script>
      $(function() {
        $(document).ready(function() {
          toastr.error('Erro ao apagar produto!');
        });
      });
    </script>
  <?php
  endif;
  unset($_SESSION['erro_apagar']);

  ?>

  <?php
  if (isset($_SESSION['apagar_sucesso'])) :
  ?>
    <script>
      $(function() {
        $(document).ready(function() {
          toastr.success('Produto apagado!');
        });
      });
    </script>
  <?php
  endif;
  unset($_SESSION['apagar_sucesso']);

  ?>
  <?php
  if (isset($_SESSION['edit_erro'])) :
  ?>
    <script>
      $(function() {
        $(document).ready(function() {
          toastr.error('Erro ao atualizar !');
        });
      });
    </script>
  <?php
  endif;
  unset($_SESSION['edit_erro']);

  ?>

  <?php
  if (isset($_SESSION['edit_sucesso'])) :
  ?>
    <script>
      $(function() {
        $(document).ready(function() {
          toastr.success('Atualizado !');
        });
      });
    </script>
  <?php
  endif;
  unset($_SESSION['edit_sucesso']);

  ?>


  <!-- SCRIPT PARA INICIAR O JS DE DATATABLES, E CRIAR UMA TABELA INTERATIVA -->

  <script>
    $(function() {

      var table = $('#tabela').DataTable({

        "language": {
          "sEmptyTable": "Nenhum registro encontrado",
          "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
          "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
          "sInfoFiltered": "(Filtrados de _MAX_ registros)",
          "sInfoPostFix": "",
          "sInfoThousands": ".",
          "sLengthMenu": "_MENU_ resultados por página",
          "sLoadingRecords": "Carregando...",
          "sProcessing": "Processando...",
          "sZeroRecords": "Nenhum registro encontrado",
          "sSearch": "Pesquisar",
          "oPaginate": {
            "sNext": "Próximo",
            "sPrevious": "Anterior",
            "sFirst": "Primeiro",
            "sLast": "Último"
          },
          "oAria": {



            "sSortAscending": ": Ordenar colunas de forma ascendente",
            "sSortDescending": ": Ordenar colunas de forma descendente"
          }
        },
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
      });


      table.on('click', ".btnPackage", function() {


        $tr = $(this).closest('tr');

        var data = table.row($tr).data();
        var id = data[0];
        var nome = data[2];
        $.ajax({
          url: '../Scripts/Actions/getProd.php',
          type: 'post',
          data: {
            prodId: id,

          },
          dataType: 'json',
          success: function(response) {

            len1 = response.length;
            for (var i = 0; i < len1; i++) {
              var id = response[i]['id'];
              var nome = response[i]['nome'];
              var condicao = response[i]['condicao'];
              var descricao = response[i]['descricao'];
              var altura = response[i]['altura'];
              var comprimento = response[i]['comprimento'];
              var dias = response[i]['dias'];
              var logistica = response[i]['logistica'];
              var imagem = response[i]['imagem'];
              var peso = response[i]['peso'];
              var largura = response[i]['largura'];
              $("#nomePkg").text(nome)
              $("#descPkg").val(descricao);
              $("#pesoPkg").val(peso + 'g')
              $("#logisticaPkg").val(logistica)
              $("#comprimentoPkg").val(comprimento + 'cm')
              $("#alturaPkg").val(altura + 'cm')
              $("#diasPkg").val(dias + ' dias')
              $("#condicaoPkg").val(condicao)
              $("#larguraPkg").val(largura + 'cm')
            }
          }





        });

        $('#pkgProd').modal('show');

      });
      table.on('click', ".btnInfoProduct", function() {


        $tr = $(this).closest('tr');

        var data = table.row($tr).data();
        var id = data[0];
        var nome = data[2];
        $.ajax({
          url: '../Scripts/Actions/getProd.php',
          type: 'post',
          data: {
            prodId: id,

          },
          dataType: 'json',
          success: function(response) {

            len1 = response.length;
            for (var i = 0; i < len1; i++) {
              var id = response[i]['id'];
              var nome = response[i]['nome'];
              var views = response[i]['views'];
              var likes = response[i]['likes'];
              var preco = response[i]['preco'];
              var vendas = response[i]['vendas'];
              var condicao = response[i]['condicao'];
              var categoria = response[i]['categoria'];
              var desc = response[i]['descricao'];

              var imagem = response[i]['imagem'];
              $("#nomeProd").text(nome)
              $("#views").val(views)
              $("#likes").val(likes)
              $("#precoProd").val('R$' + preco)
              $("#vendas").val(vendas)
              $("#condicaoProd").val(condicao)
              $("#descInfo").val(desc)
              $("#categoria").val(categoria)
              $("#prodImg").attr("src", 'data:image/png;base64,' + imagem)
            }
          }





        });

        $('#infoProd').modal('show');

      });




      $('#filtroBusca').on('change', function() { // Este aqui muda o conteúdo com base na mudança do select
        table
          .search($(this).val()).draw();
      });





      table.on('click', '.btnEditar', function() {


        $tr = $(this).closest('tr');

        var data = table.row($tr).data();
        var id = data[0];

        $(".editform").trigger("reset");

        $.ajax({
          url: '../Scripts/Actions/getProd.php',
          type: 'post',
          data: {
            prodId: id,

          },
          dataType: 'json',
          success: function(response) {

            len1 = response.length;
            for (var i = 0; i < len1; i++) {
              var id = response[i]['id'];
              var nome = response[i]['nome'];
              var views = response[i]['views'];
              var likes = response[i]['likes'];
              var preco = response[i]['preco'];
              var vendas = response[i]['vendas'];
              var condicao = response[i]['condicao'];
              var categoria = response[i]['categoria'];
              var desc = response[i]['descricao'];
              var logi = response[i]['logistica'];
              var peso = response[i]['peso'];
              var comp = response[i]['comprimento'];
              var alt = response[i]['altura'];
              var larg = response[i]['largura'];
              var dias = response[i]['dias'];

              var imagem = response[i]['imagem'];
              $("#editID").val(id);
              $('#nomeEdit').val(nome);
              $('#descEdit').val(desc);
              $("#condEdit").val(condicao);
              $('#catEdit').val(categoria);
              $('#precoEdit').val(preco);
              $('#diasEdit').val(dias);
              $('#logisticaEdit').val(logi);
              $('#pesoEdit').val(peso);
              $('#largEdit').val(larg);
              $('#compEdit').val(comp);
              $('#alturaEdit').val(alt);


              $("#currentIMG").attr("src", 'data:image/png;base64,' + imagem)

            }
          }





        });


        $('#editProd').modal('show');
      });



      table.on('click', '.btnDelete', function() {
        $tr = $(this).closest('tr');
        var data = table.row($tr).data();
        data.splice(5, 1);
        $('#idApagar').val(data[0])

        console.log(data);



        $('#apagarProduto').modal('show');
      });


    });
  </script>

</body>

</html>