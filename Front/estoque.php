  <?php include('../banco/config.php'); ?>
<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../front/css/bootstrap5.0.1.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../front/css/datatables-1.10.25.min.css" />
  <title>Estoque</title>
  <style type="text/css">
    .btnAdd {
      text-align: right;
      width: 83%;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <h2 class="text-center">Estoque</h2>
    <div class="row">
      <div class="container">
        <div class="btnAdd">
        <a href="equipamentos.php" class="btn btn-success btn-sm">Voltar</a>
        </div>
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <table id="example" class="table">
              <thead>
                <th>Id</th>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Fornecedor</th>
                <th>Nota Fiscal</th>
                <th>Estado de Uso</th>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
          <div class="col-md-2"></div>
        </div>
      </div>
    </div>
  </div>

  <script src="../front/js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <script src="../front/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../front/js/dt-1.10.25datatables.min.js"></script>
  <script src="../front/js/estoque.js"></script>

  
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Atualizar equipamento</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="updateUser">
            <input type="hidden" name="id" id="id" value="">
            <input type="hidden" name="trid" id="trid" value="">
            <div class="mb-3 row">  
              <label for="produtoField" class="col-md-3 form-label">Produto</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="produtoField" name="produto">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="quantidadeField" class="col-md-3 form-label">Quantidade</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="quantidadeField" name="quantidade">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="fornecedorField" class="col-md-3 form-label">Fornecedor</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="fornecedorField" name="fornecedor">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="notaFiscalField" class="col-md-3 form-label">Nota Fiscal</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="notaFiscalField" name="nota_fiscal">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="estadoUsoField" class="col-md-3 form-label">Estado de Uso</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="estadoUsoField" name="estado_uso">
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Confirmar</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
