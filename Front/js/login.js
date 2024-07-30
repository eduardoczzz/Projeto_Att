document.getElementById("loginBotao").addEventListener("click", function(event) {
    event.preventDefault();

    var usuario = document.getElementById("usuario").value;
    var senha = document.getElementById("senha").value;

    var validUsuario = "Eduardo";
    var validSenha = "123";

    if (usuario === validUsuario && senha === validSenha){
        window.location.href = "dashboard.html";
    } else {
        alert("Credenciais incorretas. Tente novamente!")
    }
});

