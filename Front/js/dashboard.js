document.addEventListener("DOMContentLoaded", function() {
  var btnOrcamento = document.getElementById("btn_orc");
  btnOrcamento.addEventListener("click", function() {
      window.location.href = "orcamento.php";
  });

  var botao_dash = document.getElementById("btn_dash");
  botao_dash.addEventListener("click", function() {
      window.location.href = "dashboard.html";
  });

  var botao_orcamento = document.getElementById("btn_orcamento");
  botao_orcamento.addEventListener("click", function() {
      window.location.href = "orcamento.php";
  });

  var btnEquip = document.getElementById("btn_equip");
  btnEquip.addEventListener("click", function() {
      window.location.href = "equipamentos.php";
  });

  var btnEquipamentos = document.getElementById("btn_equipamentos");
  btnEquipamentos.addEventListener("click", function() {
      window.location.href = "equipamentos.php";
  });
});
