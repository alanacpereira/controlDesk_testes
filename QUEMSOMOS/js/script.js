// Arquivo JavaScript da página inicial
// Exemplo simples de interação
// Quando o botão "Abra seu Chamado" for clicado
// irá para a tela de login, para criar a conta

// Seleciona o botão "Abrir Chamado"
let botaoChamado = document.querySelector(".btn-abrir");

// Quando o botão for clicado
botaoChamado.addEventListener("click", function () {
    // Redireciona para outra página HTML
    window.location.href = "html/login.html";
});