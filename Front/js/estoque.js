$(document).ready(function() {
    $('#example').DataTable({
      "fnCreatedRow": function(nRow, aData, iDataIndex) {
        $(nRow).attr('id', aData[0]);
      },
      'serverSide': 'true',
      'processing': 'true',
      'paging': 'true',
      'order': [],
      'ajax': {
        'url': '../back/buscar_dados.php',
        'type': 'post',
      },
      "aoColumnDefs": [{
          "bSortable": false,
          "aTargets": [6]
        },

      ]
    });
  });
  $(document).on('submit', '#updateUser', function(e) {
    e.preventDefault();
    //var tr = $(this).closest('tr');
    var produto = $('#produtoField').val();
    var quantidade = $('#quantidadeField').val();
    var fornecedor = $('#fornecedorField').val();
    var nota_fiscal = $('#nota_fiscalField').val();
    var estado_uso = $('#estado_usoField').val();
    var trid = $('#trid').val();
    var id = $('#id').val();
    if (produto != '' && valor != '' && fornecedor != '' && temp_entrega != '') {
      $.ajax({
        url: "../back/atualizar_estoque.php",
        type: "post",
        data: {
          produto: produto,
          quantidade: quantidade,
          fornecedor: fornecedor,
          nota_fiscal: nota_fiscal,
          estado_uso: estado_uso,
          id: id
        },
        success: function(data) {
          var json = JSON.parse(data);
          var status = json.status;
          if (status == 'true') {
            table = $('#example').DataTable();
            // table.cell(parseInt(trid) - 1,0).data(id);
            // table.cell(parseInt(trid) - 1,1).data(username);
            // table.cell(parseInt(trid) - 1,2).data(email);
            // table.cell(parseInt(trid) - 1,3).data(mobile);
            // table.cell(parseInt(trid) - 1,4).data(city);
            var button = '<td><a href="javascript:void();" data-id="' + id + '" class="btn btn-info btn-sm editbtn">Editar</a>  <a href="#!"  data-id="' + id + '"  class="btn btn-danger btn-sm deleteBtn">Deletar</a></td>';
            var row = table.row("[id='" + trid + "']");
            row.row("[id='" + trid + "']").data([id, produto, valor, fornecedor, temp_entrega, button]);
            $('#exampleModal').modal('hide');
          } else {
            alert('failed');
          }
        }
      });
    } else {
      alert('Fill all the required fields');
    }
  });
  $('#example').on('click', '.editbtn ', function(event) {
    var table = $('#example').DataTable();
    var trid = $(this).closest('tr').attr('id');
    // console.log(selectedRow);
    var id = $(this).data('id');
    $('#exampleModal').modal('show');

    $.ajax({
      url: "../back/buscar_dados.php",
      data: {
        id: id
      },
      type: 'post',
      success: function(data) {
        var json = JSON.parse(data);
        $('#produtoField').val(json.produto);
        $('#quantidadeField').val(json.quantidade);
        $('#fornecedorField').val(json.fornecedor);
        $('#nota_fiscalField').val(json.nota_fiscal);
        $('#estado_usoField').val(json.estado_uso);
        $('#id').val(id);
        $('#trid').val(trid);
      }
    })
  });

  $(document).on('click', '.deleteBtn', function(event) {
    var table = $('#example').DataTable();
    event.preventDefault();
    var id = $(this).data('id');
    if (confirm("Voce quer deletar mesmo esse equipamento?")) {
      $.ajax({
        url: "../back/deletar_produto.php",
        data: {
          id: id
        },
        type: "post",
        success: function(data) {
          var json = JSON.parse(data);
          status = json.status;
          if (status == 'success') {
            //table.fnDeleteRow( table.$('#' + id)[0] );
            //$("#example tbody").find(id).remove();
            //table.row($(this).closest("tr")) .remove();
            $("#" + id).closest('tr').remove();
          } else {
            alert('Failed');
            return;
          }
        }
      });
    } else {
      return null;
    }



  })