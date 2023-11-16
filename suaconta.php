<?php
require_once '../projetoquartosemestre/classes/usuarios.php';


session_start();
if(!isset($_SESSION['id'])){
  header("location: login2.php"); 
  exit;
  }


$objUsuario = new Usuario();
$objUsuario-> conectar( "cadastro_cliente", "localhost", "root", "admin");



$usuario = $objUsuario->obterDadosUsuarioLogado();
$dadosEndereco = $objUsuario->SelectEndereco($usuario['id']);





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sua Conta</title>
    <link rel="stylesheet" type="text/css" href="suaconta.css">
    <link rel="shortcut icon" href="https://i.imgur.com/gBQhCJ6.png" type="x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    
    
<body>
    <a href="telainicial.html"></a>
    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <a class="logo"> <img class="logo2" src="https://i.imgur.com/gBQhCJ6.png" height="60"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="cabecalho-item" href="notificacoes.html">Notificações<ion-icon class="icon" name="notifications-outline"></ion-icon></a>
            </li>
            <li class="nav-item">
              <a class="cabecalho-item" href="telainicial.html">Inicio <ion-icon class="icon" name="home-outline"></ion-icon>
            <li class="nav-item">
              <a class="cabecalho-item" href="salvos.html">Salvos <ion-icon class="icon" name="heart-outline"></ion-icon></a>
            </li>
            <li class="nav-item">
              <a class="cabecalho-item" href="suaconta.php">Minha Conta <ion-icon  class="icon" name="person-outline"></ion-icon></a>
            </li>
            <li class="nav-item">
              <a class="cabecalho-item" href="carrinho.html">Sacola <ion-icon name="bag-handle-outline"></ion-icon></a>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search">
            <button class="btn-1" type="submit">Pesquisa</button>
          </form>
        </div>
      </div>
    </nav>

    <section class="bg-light">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 mb-4 mb-sm-5">
                  <div class="card card-style1 border-0">
                      <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                          <div class="row align-items-center">
                              <div class="col-lg-6 px-xl-10">
                                  <div class="bg-secondary d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded">
                                      <h3 class="h2 text-white mb-0">Dados Pessoais</h3>
                                  </div>
                                  <ul class="list-unstyled mb-1-9">
                                      <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Nome:</span> <?php  echo $usuario['nome'] ." ". $usuario['sobrenome'];?></li>
                                      <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Email:</span>  <?php  echo $usuario['email'] . "<br>";?></li>
                                      <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Data de Nascimento:</span>  <?php  echo $usuario['data_nasc'] . "<br>";?></li>
                                      <li> <a href="editar.php">Alterar Dados</a> <ion-icon name="create-outline"></ion-icon></li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="container">
                <div class="row">
                    <div class="col-lg-12 mb-4 mb-sm-5">
                        <div class="card card-style1 border-0">
                            <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 px-xl-10">
                                        <div class="bg-secondary d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded">
                                            <h3 class="h2 text-white mb-0">Endereço</h3>
                                            <li> <a href="endereco.html">Adicionar Endereço</a> <ion-icon name="add-outline"></ion-icon></li>
                                        </div>
                                        <ul class="list-unstyled mb-1-9">
                                        <ul class="list-unstyled mb-1-9">
    <?php
        // Verificar se há endereço cadastrado
        if (!empty($dadosEndereco)) {
            echo '<li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Endereço:</span>' . $dadosEndereco['endereco'] . '</li>';
            echo '<li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Cidade:</span>' . $dadosEndereco['cidade'] . '</li>';
            echo '<li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Bairro:</span>' . $dadosEndereco['bairro'] . '</li>';
            echo '<li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Estado:</span>' . $dadosEndereco['estado'] . '</li>';
            echo '<li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">CEP:</span>' . $dadosEndereco['cep'] . '</li>';
            echo '<li><a href="editarEndereco.php">Editar Endereço</a> <ion-icon name="create-outline"></ion-icon></li>';
            echo '<form name="Endereco" method="POST" id="enderecoForm">';
            echo ' <li><a href="#" onclick="removerEndereco()">Remover Endereço</a> <ion-icon name="create-outline"></ion-icon></li>
            </form>';
        } else {
            echo '<li>Nenhum endereço cadastrado. <a href="testeEndereco.php">Adicionar Endereço</a> <ion-icon name="add-outline"></ion-icon></li>';
        }
    ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                      <div class="row">
                          <div class="col-lg-12 mb-4 mb-sm-5">
                              <div class="card card-style1 border-0">
                                  <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                                      <div class="row align-items-center">
                                          <div class="col-lg-6 px-xl-10">
                                              <div class="bg-secondary d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded">
                                                  <h3 class="h2 text-white mb-0">Cartões</h3>
                                              </div>
                                              <ul class="list-unstyled mb-1-9">
                                                <li> <a href="cartao.html">Adicionar Cartão</a> <ion-icon name="add-outline"></ion-icon></li>
                                              </ul>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
      </section>
      <?php
      echo '<form method="post" onsubmit="return confirm(\'Tem certeza que deseja excluir sua conta?\');">';
      echo '<input class="btn-2" type="submit" name="excluir" value="Excluir Conta">';
      echo '</form>';
      if (isset($_POST['excluir'])) {
        // Chame o método deletar para excluir o usuário
        $objUsuario->deletar($usuario['id']);
        //destruindo a sessao
        session_destroy();
        // Redirecione para a página de logout ou qualquer outra página após excluir o usuário
        // Use JavaScript para redirecionar após a confirmação
        echo '<script>window.location.href = "telainicial.html";</script>';
        exit(); // Certifique-se de encerrar o script após o redirecionamento
    }
      ?>

      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn-3" type="button" href="sair.php">Sair da Conta</href=></a>
      </div>
     


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['removerEndereco'])) {
  // Execute a exclusão do endereço
  if ($objUsuario->DeleteEndereco($usuario['id'])) {
      echo "Endereço excluído com sucesso!";
  } else {
      echo "Erro ao excluir o endereço.";
  }
}
?>
<script>
function removerEndereco() {
    // Confirmar com o usuário antes de excluir
    if (confirm("Tem certeza que deseja remover o endereço?")) {
        // Obter o formulário pelo ID
        var form = document.getElementById('enderecoForm');

        // Adicionar um campo oculto ao formulário para indicar a exclusão
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'removerEndereco';
        input.value = '1'; // Pode ser qualquer valor, apenas para indicar a exclusão
        form.appendChild(input);

        // Enviar o formulário
        form.submit();
    }
}
</script>

<footer>
                <div class="card text-center">
                  <div class="card-header">
                    Tons de Beleza
                  </div>
                  <div class="card-body">
                    <ul>
                      <li class="prod1" > 
                        <a class="link" href="# ">Sobre</a>
                      </li>
                      <li class="prod1"> 
                        <a class="link" href="# ">Contato</a>
                      </li>
                      <li class="prod1"> 
                        <a class="link" href="trabalheconosco.html">Trabalhe Conosco</a>
                      </li>
                    </ul>
                  </div>
                  <div class="icon1">
                  <ion-icon class="icon1" name="logo-instagram"> instagram</ion-icon>
                  <ion-icon class="icon1" name="logo-twitter">x</ion-icon>
                  <ion-icon class="icon1" name="logo-tiktok">tik tok</ion-icon>
                </div>
                <p>
                Na Tons de Beleza, acreditamos que a maquiagem é uma forma de expressão, é pra quem quiser pra quem sonha, quem tem luta e quem tem fé, e pra quem tem empoderamento. Oferecemos uma ampla gama de produtos de beleza de alta qualidade para realçar sua beleza única. Nossa missão é ajudar você a se sentir confiante e deslumbrante todos os dias.
                </p>
                </div>
                
                
              </footer>


  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script> 

</body>
  
</html>