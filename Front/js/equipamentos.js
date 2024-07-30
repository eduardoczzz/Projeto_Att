document.addEventListener('DOMContentLoaded', function() {
    // Obtém o botão btn_ver_estoque
    var btnVerEstoque = document.getElementById("btn_ver_estoque");

    // Adiciona um evento de clique ao botão
    btnVerEstoque.addEventListener("click", function() {
        // Redireciona para estoque.php
        window.location.href = "estoque.php";
    });


    // Obtém os elementos relacionados ao popup
    var openButton = document.querySelector('#btn_adicionar_equip');
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
            document.getElementById('quantidade').value = '';
            document.getElementById('fornecedor').value = '';
            document.getElementById('nota_fiscal').value = '';
            document.getElementById('estado_uso').value = '';
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
        let quantidade = document.getElementById('quantidade').value;
        let fornecedor = document.getElementById('fornecedor').value;
        let nota_fiscal = document.getElementById('nota_fiscal').value;
        let estado_uso = document.getElementById('estado_uso').value;
    
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
            showAlert('O campo Produto não pode conter números.');
            event.preventDefault();
            return;
        }
    
        if (!numberRegex.test(quantidade) || quantidade < 0) {
            showAlert('O campo Quantidade não pode conter números negativos ou palavras.');
            event.preventDefault();
            return;
        }
    
        if (!produtoRegex.test(fornecedor)) {
            showAlert('O campo Fornecedor não pode conter números.');
            event.preventDefault();
            return;
        }
    
        if (nota_fiscal === '') {
            showAlert('O campo Nota Fiscal não pode estar vazio.');
            event.preventDefault();
            return;
        }
    
        if (estado_uso === '') {
            showAlert('O campo Estado de Uso não pode estar vazio.');
            event.preventDefault();
            return;
        }
    });
});