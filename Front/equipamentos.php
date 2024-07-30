<?php
if (isset($_POST['submit'])) {

    include_once('../banco/config.php');

    $produto = $_POST['produto'];
    $quantidade = $_POST['quantidade'];
    $fornecedor = $_POST['fornecedor'];
    $nota_fiscal = $_POST['nota_fiscal'];
    $estado_uso = $_POST['estado_uso'];

    $produtoRegex = '/^[a-zA-Z\s]+$/';
    $numberRegex = '/^\d+$/';

    // Validação dos campos
    if (!preg_match($produtoRegex, $produto)) {
        die('O campo Produto deve conter apenas letras.');
    }

    if (!preg_match($numberRegex, $quantidade) || $quantidade < 0) {
        die('O campo Quantidade deve conter apenas números não negativos.');
    }

    if (!preg_match($produtoRegex, $fornecedor)) {
        die('O campo Fornecedor deve conter apenas letras.');
    }

    if (empty($nota_fiscal)) {
        die('O campo Nota Fiscal não pode estar vazio.');
    }

    if (empty($estado_uso)) {
        die('O campo Estado de Uso não pode estar vazio.');
    }

    // Preparar e executar a consulta de inserção
    $stmt = $conexao->prepare("INSERT INTO estoque (produto, quantidade, fornecedor, nota_fiscal, estado_uso) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sisss", $produto, $quantidade, $fornecedor, $nota_fiscal, $estado_uso);

    if ($stmt->execute()) {
        echo "Item cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar item: " . $stmt->error;
    }

    // Fechar a declaração e a conexão
    $stmt->close();
    $conexao->close();
}
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Front/css/equipamentos.css">
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
          <h3>Equipamentos</h3>
          <button id="btn_adicionar_equip">Adicionar equipamentos</button>
        </div>
        <div class="card">
          <i class="fas fa-plus"></i>
          <h3>Visualizar Estoque</h3>
          <button id="btn_ver_estoque">Selecionar</button>
        </div>
      </div>

      <div class="popup">
    <div class="close-btn">&times;</div>
    <form action="equipamentos.php" method="POST">
        <fieldset>
            <div class="form">
                <h2>Adicionar item</h2>
                <div class="form-element">
                    <label for="produto" class="labelInput">Produto:</label>
                    <input type="text" name="produto" id="produto" class="inputUser" required placeholder="Produto:">
                </div>
                <div class="form-element">
                    <label for="quantidade" class="labelInput">Quantidade:</label>
                    <input type="text" name="quantidade" id="quantidade" class="inputUser" required placeholder="Quantidade:">
                </div>
                <div class="form-element">
                    <label for="fornecedor" class="labelInput">Fornecedor:</label>
                    <input type="text" name="fornecedor" id="fornecedor" class="inputUser" required placeholder="Fornecedor:">
                </div>
                <div class="form-element">
                    <label for="nota_fiscal" class="labelInput">Nota Fiscal:</label>
                    <input type="text" name="nota_fiscal" id="nota_fiscal" class="inputUser" required placeholder="Nota Fiscal:">
                </div>
                <div class="form-element">
                    <label for="estado_uso" class="labelInput">Estado de Uso:</label>
                    <input type="text" name="estado_uso" id="estado_uso" class="inputUser" required placeholder="Estado de Uso:">
                </div>
                <div class="form-element">
                    <button type="submit" name="submit" id="submit">Adicionar</button>  
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

  <script src="../front/js/equipamentos.js"></script>
</body>

</html>