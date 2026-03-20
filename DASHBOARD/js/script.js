// MENU
// pega botõa menu
const btn = document.getElementById("menu-btn")
// pega sidebar
const sidebar = document.getElementById("sidebar")

// quando clicar no botão
btn.addEventListener("click", ()=>{
    // adiciona ou remove a classe "close"
    sidebar.classList.toggle("close")
})


// CALENDÁRIO DINÂMICO
const calendario = document.getElementById("calendario")

// pega data atual
const hoje = new Date()

const ano = hoje.getFullYear()
const mes = hoje.getMonth()

// pega quantos dias tem o mês
const ultimoDia = new Date(ano, mes + 1, 0).getDate()

// dia atual
const diaHoje = hoje.getDate()

// EXEMPLO (depois vem do banco)
const diasComAtividade = [2, 5, 10, 18, 22]
console.log(diasComAtividade)

// cria os dias
for(let dia = 1; dia <= ultimoDia; dia++){

    let div = document.createElement("div")
    div.innerText = dia

    if(dia === diaHoje){
        div.classList.add("hoje")
    }

    // se teve atividades
    if(diasComAtividade.includes(dia)){
        div.classList.add("ativo")
    }

    calendario.appendChild(div)
}