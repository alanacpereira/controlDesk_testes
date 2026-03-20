<?php
session_start();
include("conexao.php");

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit;
}

$usuario = $_SESSION['usuario'];

// CARDS
$id = $usuario['id'];

// total de chamados
$sql = "SELECT COUNT(*) as total FROM chamados WHERE usuario_id = $id";
$res = $conn->query($sql);
$total = $res->fetch_assoc()['total'];

// tempo total
$sql2 = "SELECT SUM(tempo) as tempo FROM chamados WHERE usuario_id = $id";
$res2 = $conn->query($sql2);
$tempo = $res2->fetch_assoc()['tempo'];

// tempo médio
// formatar - cálculo para não ficar número feio
function formatarTempo($minutos){
    $horas = floor($minutos / 60);
    $mins = $minutos % 60;

    return sprintf('%02d:%02d', $horas, $mins);
}

$tempoMedio = 0;

if($total > 0){
    $tempoMedio = $tempo / $total;
}

// CALENDARIO
$sql = "SELECT DAY(data_abertura) as dia 
        FROM chamados 
        WHERE usuario_id = $id";

$result = $conn->query($sql);

$dias = [];

while($row = $result->fetch_assoc()){
    $dias[] = $row['dia'];
}

$diasJS = implode(",", $dias);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Dashboard Help Desk</title>
<link rel="stylesheet" href="/css/style.css">
</head>

<script>
const diasComAtividade = <?php echo json_encode($dias); ?>;
</script>

<script src="js/script.js"></script>
<body>

<div class="layout">

    <!-- SIDEBAR (menu lateral) -->
    <aside class="sidebar" id="sidebar">
        
        <!-- Informações do usuário -->
        <div class="perfil">
            <img src="/img/user.png" class="foto-perfil">
            <!-- AQUI ENTRA PHP -->
            <h3><?php echo $usuario['nome']; ?></h3>
            <p><?php echo $usuario['email']; ?></p>
        </div>

        <!-- Menu de navegação -->
        <nav class="menu">
            <a href="index.php" class="ativo" > Dashboard</a>
            <a href="pages/chamados.php"> Central de acompanhamento</a>
            <a href="pages/abrir.php"> Abrir chamado</a>
        </nav>

    </aside>


    <!-- CONTEÚDO  PRINCIPAL-->
    <div class="main">

        <!-- TOPO (barra superior)-->
        <header class="topo">

            <!-- botão que abre/fecha sidebar -->
            <button id="menu-btn">☰</button>

            <!-- área da direita (logo + bandeira) -->
            <div class="topo-right">
                <img src="/img/logo.png" class="logo">
                <img src="/img/brasil.png" class="flag">
            </div>

        </header>

        <!-- TÍTULO -->
        <div class="titulo">
            <h1>Dashboard Analítico</h1>
            <p>Monitor de atividades e evolução de performance</p>
        </div>

        <!-- GRÁFICO (calendário) -->
        <section class="grafico">

            <!-- topo do gráfico -->
            <div class="grafico-header">
                <h2>Uso diário</h2>

                <!-- filtros (visual apenas por enquanto) -->
                <div class="filtro">
                    <span>Último mês</span>
                    <button>Mês atual</button>
                </div>
            </div>

            <!-- onde o JS vai criar os dias -->
            <div class="calendario" id="calendario"></div>

        </section>

        <!-- CARDS -->
        <section class="cards">

            <div class="card">
                <p>Sessões</p>
                <h2><?php echo $total; ?></h2> <!-- depois vem o banco -->
                <span>Dia atual</span>
            </div>

            <div class="card">
                <p>Tempo médio</p>
                <h2><?php echo $tempoMedio ? formatarTempo($tempoMedio) : "00:00"; ?></h2>
                <span>Dia atual</span>
            </div>

            <div class="card">
                <p>Tempo em sessão</p>
                <h2><?php echo $tempo ? $tempo : "00:00"; ?></h2>
                <span>Dia atual</span>
            </div>

        </section>

    </div>

</div>

</body>
</html>