<?php
if (isset($_POST['submit'])) {

    include_once('../banco/config.php');

    $produto = $_POST['produto'];
    $valor = $_POST['valor'];
    $fornecedor = $_POST['fornecedor'];
    $temp_entrega = $_POST['temp_entrega'];

    $produtoRegex = '/^[a-zA-Z\s]+$/';
    $numberRegex = '/^\d+$/';

    if (!preg_match($produtoRegex, $produto)) {
        die('O campo Produto deve conter apenas letras.');
    }

    if (!preg_match($numberRegex, $valor) || $valor < 0) {
        die('O campo Valor deve conter apenas números não negativos.');
    }

    if (!preg_match($produtoRegex, $fornecedor)) {
        die('O campo Fornecedor deve conter apenas letras.');
    }

    if (!preg_match($numberRegex, $temp_entrega) || $temp_entrega < 0) {
        die('O campo Tempo de Entrega deve conter apenas números não negativos.');
    }

    $result = mysqli_query($conexao, "INSERT INTO orcamento(produto, valor, fornecedor, temp_entrega) VALUES ('$produto', '$valor', '$fornecedor', '$temp_entrega')");
    
}
?>



<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Front/css/orcamento.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <title>Dashboard</title>
</head>

<body>
  <div class="container">
    <nav>
      <ul>
        <li><a href="#" class="logo">
            <img src="" alt="">
            <span class="nav-item">Smart Estoque</span>
          </a></li>
        <li><a href="#">
            <i class="fas fa-home"></i>
            <span id="btn_dash" class="nav-item">Dashboard</span>
          </a></li>
        <li><a href="">
            <i class="fas fa-laptop"></i>
            <span class="nav-item">Computadores</span>
          </a></li>
        <li><a href="">
            <i class="fas fa-plus"></i>
            <span class="nav-item">Orçamento</span>
          </a></li>
        <li><a href="">
            <i class="fas fa-keyboard"></i>
            <span class="nav-item">Equipamentos</span>
          </a></li>
        <li><a href="">
            <i class="fas fa-file-code"></i>
            <span class="nav-item">Relatorios</span>
          </a></li>
        <li><a href="" class="logout">
            <i class="fas fa-sign-out-alt"></i>
            <span class="nav-item">Sair</span>
          </a></li>
      </ul>
    </nav>

    <section class="main">
      <div class="main-top">
        <br>
        <i class="fas fa-user-cog"></i>
      </div>
      <div class="main-skills">
        <div class="card">
          <i class="fas fa-plus"></i>
          <h3>Orçamento</h3>
          <button id="btn_fazer_orc">Fazer orçamento</button>
        </div>
        <div class="card">
          <i class="fas fa-plus"></i>
          <h3>Visualizar orçamento pronto</h3>
          <button id="btn_ver_orc">Selecionar</button>
        </div>
      </div>

      <div class="popup">
        <div class="close-btn">&times;</div>
        <form action="orcamento.php" method="POST">
          <fieldset>
        <div class="form">
          <h2>Registrar item</h2>
          <div class="form-element">
          <label for="produto" class="labelInput">Produto:</label>
            <input type="text" name="produto" id="produto" class="inputUser" require placeholder="Produto:">
          </div>
          <div class="form-element">
          <label for="valor" class="labelInput">Valor:</label>
            <input type="text" name="valor" id="valor" class="inputUser" placeholder="Valor:">
          </div>
          <div class="form-element">
          <label for="fornecedor" class="labelInput">Fornecedor:</label>
            <input type="text" name="fornecedor" id="fornecedor" class="inputUser" placeholder="Fornecedor:">
          </div>
          <div class="form-element">
          <label for="temp_entrega" class="labelInput">Tempo de entrega:</label>
            <input type="text" name="temp_entrega" id="temp_entrega" class="inputUser" placeholder="Tempo de Entrega:">
          </div>
          <div class="form-element">
            <button type="submit" name="submit" id="submit">Cadastrar</button>  
          </div>
        </div>
      </fieldset>
      </form>
      </div>
      
      <!-- Popup de alerta -->
      <div id="alert-popup" class="alert-popup">
        <div class="alert-popup-content">
          <span class="alert-close-btn">&times;</span>
          <p id="alert-message"></p>
        </div>
      </div>
    </section>
  </div>

  <script src="../front/js/orcamento.js"></script>
</body>

</html>
