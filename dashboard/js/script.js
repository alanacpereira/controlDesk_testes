// Simular dados do sistema

// guarda os valores determinados as variáveis
let sessoes = 12
let tempoMedio = "00:15:20"
let tempoSessao = "02:10:00"

// procurando elementos pelo id
document.getElementById("sessao").innerText = sessoes
document.getElementById("tempoMedio").innerText = tempoMedio
document.getElementById("tempoSessao").innerText = tempoSessao

const btn = document.getElementById("menu-btn")
const sidebar = document.getElementById("sidebar")

btn.addEventListener("click", function(){

// adiciona na classe - sidebar aberta diferente da sidebar fechada
sidebar.classList.toggle("close")

})