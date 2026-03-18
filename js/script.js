// Simular dados do sistema

// guarda os valores determinados as variáveis
let sessoes = 12
let tempoMedio = "00:15:20"
let tempoSessao = "02:10:00"

// procurando elementos pelo id - ATUALIZAR DADOS
document.getElementById("sessao").innerText = sessoes
document.getElementById("tempoMedio").innerText = tempoMedio
document.getElementById("tempoSessao").innerText = tempoSessao

const btn = document.getElementById("menu-btn")
const sidebar = document.getElementById("sidebar")

btn.addEventListener("click", function(){

// adiciona na classe - sidebar aberta diferente da sidebar fechada
sidebar.classList.toggle("close")

})

// MENU LATERAL

const btn = document.getElementById("menu-btn");
const sidebar = document.getElementById("sidebar");

btn.addEventListener("click", function () {
    sidebar.classList.toggle("close");
});


// CALENDÁRIO DINAMICO 
const calendario = document.getElementById("calendario");

// data atual
const hoje = new Date();
const diaAtual = hoje.getDate();

// último dia do mês
const ultimoDia = new Date(hoje.getFullYear(), hoje.getMonth() + 1, 0).getDate();

for (let i = 1; i <= ultimoDia; i++) {
    const dia = document.createElement("div");
    dia.innerText = i.toString().padStart(2, "0");

    // dia atual
    if (i === diaAtual) {
        dia.classList.add("hoje");
    }

    // dias com uso
    if (diasComAtividade.includes(i)) {
        dia.classList.add("ativo");
    }

    calendario.appendChild(dia);

    dia.addEventListener("click", () => {
    alert("Dia " + i + " clicado");
});
}