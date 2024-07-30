document.addEventListener('DOMContentLoaded', function() {
    // Obtém o botão btn_ver_orc
    var btnVerOrc = document.getElementById("btn_ver_orc");

    // Adiciona um evento de clique ao botão
    btnVerOrc.addEventListener("click", function() {
        // Redireciona para index.php
        window.location.href = "tabela_orcamento.php";
    });

    // Obtém os elementos relacionados ao popup
    var openButton = document.querySelector('#btn_fazer_orc');
    var closeButton = document.querySelector('.close-btn');
    var popup = document.querySelector('.popup');

    if (openButton && closeButton && popup) {
        // Adiciona evento de clique para abrir o popup
        openButton.addEventListener('click', function() {
            popup.classList.add('active');
        });

        // Adiciona evento de clique para fechar o popup
        closeButton.addEventListener('click', function() {
            popup.classList.remove('active');
            // Limpa os campos do formulário
            document.getElementById('produto').value = '';
            document.getElementById('valor').value = '';
            document.getElementById('fornecedor').value = '';
            document.getElementById('temp_entrega').value = '';  
        });
    }

    // Redireciona para dashboard.html ao clicar no botão de dashboard
    var botaoDash = document.getElementById("btn_dash");
    botaoDash.addEventListener("click", function() {
        window.location.href = "dashboard.html";
    });

    // Adiciona validação ao formulário antes de submeter
    document.querySelector('form').addEventListener('submit', function(event) {
        let produto = document.getElementById('produto').value;
        let valor = document.getElementById('valor').value;
        let fornecedor = document.getElementById('fornecedor').value;
        let temp_entrega = document.getElementById('temp_entrega').value;

        let produtoRegex = /^[a-zA-Z\s]+$/;
        let numberRegex = /^\d+$/;

        let alertPopup = document.getElementById('alert-popup');
        let alertMessage = document.getElementById('alert-message');
        let alertCloseBtn = document.querySelector('.alert-close-btn');

        function showAlert(message) {   
            alertMessage.textContent = message;
            alertPopup.style.display = 'block';
        }

        alertCloseBtn.addEventListener('click', function() {
            alertPopup.style.display = 'none';
        });

        alertPopup.style.display = 'none';

        if (!produtoRegex.test(produto)) {
            showAlert('O campo Produto não pode conter numeros.');
            event.preventDefault();
            return;
        }

        if (!numberRegex.test(valor) || valor < 0) {
            showAlert('O campo Valor não conter numeros negativos e palavras.');
            event.preventDefault();
            return;
        }

        if (!produtoRegex.test(fornecedor)) {
            showAlert('O campo Fornecedor não pode conter numeros.');
            event.preventDefault();
            return;
        }

        if (!numberRegex.test(temp_entrega) || temp_entrega < 0) {
            showAlert('O campo Tempo de Entrega não pode conter numeros negativos e palavras.');
            event.preventDefault();
            return;
        }
    });
});