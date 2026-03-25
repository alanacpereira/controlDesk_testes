<?php
// Configurações dinâmicas do site (Poderiam vir de um banco de dados no futuro)
// mudança do email
$nomeSistema = "Control Desk";
$grupo = "Grupo Solvia";
$emailContato = "solviaent@email.com";
// array para os telefones - facilita manutenção
$telefones = ["(XX) XXXX-XXXX", "(XX) XXXX-XXXX"];

// Texto "Quem Somos" baseado na sua descrição anterior
$quemSomosTexto = "O ControlDesk é um helpdesk planejado pelo " . $grupo . " com o objetivo de sanar problemas, conduzindo demandas e incidentes por um fluxo organizado e eficiente até sua resolução total.";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $nomeSistema; ?> - Helpdesk</title>
    <link rel="stylesheet" href="/QUEMSOMOS/css/style.css">
</head>

<body>
    <!-- ===========================
     MENU SUPERIOR
    =========================== -->
    <!-- Uso o header pois estou criando um cabeçalho do sistema, "O rodapé" -->
    <header class="menu">

        <!-- Logo do sistema - imagem da logo, nome do sistema, quebra de linha-->
        <div class="logo">
            <img id="logo" src="/QUEMSOMOS/img/logo.png" alt="logo Control Desk">
            <span>Control </br> Desk</span>
        </div>

        <!-- Menu de navegação -->
        <!-- Crio ul/li para listas ordenadas
        para ter um cabeçalho onde a pessoa pode visualizar o sistema -->
        <nav>
            <ul>
                <li><a href="index.php">Início</a></li>
                <li><a href="#quem" class="ativo">Quem Somos</a></li>
                <li><a href="#">Serviços</a></li>
            </ul>
        </nav>

        <!-- Botões do lado direito (Login/Comece já)-->
        <div class="btn-menu">

            <a href="login.php" class="login">Login</a>
            <a href="cadastro.php" class="btn-comecar">Comece já!</a>

        </div>
    </header>

    <!-- =========================
     SEÇÃO PRINCIPAL (HERO)
    ========================= -->
    <!-- Aqui estou criando a parte principal da página(hero)
    Crio assim seções para fazer isso(se necessário posso criar várias seções
    cada uma conterá algo diferente realizado nele) -->
    <section class="quem-somos" id="quem">

        <!-- Conteúdo do lado esquerdo -->
        <div class="container-quem">

            <!-- TEXTO -->
            <div class="texto-quem">
                <h2>Quem somos?</h2>

                <p>
                    <!-- ControlDesk é um helpdesk planejado pelo Grupo Solvia com o objetivo de
                    sanar problemas conduzindo demandas e incidentes por um fluxo organizado
                    até sua resolução. -->
                    <?php echo $quemSomosTexto; ?>
                </p>

                <div class="assinatura">
                    <strong>Solvia Entertainment</strong>
                    <img src="/QUEMSOMOS/img/logo.png">
                </div>
            </div>

            <!-- IMAGEM  -->
            <div class="img-quem">
                <img src="/QUEMSOMOS/img/equipe.jpg" alt="Nossa Equipe">
            </div>

        </div>
    </section>

    <!--CONTATOS-->
    <section class="contatos">

        <h3>Contatos</h3>

        <div class="box-contato">
            <span><?php echo $emailContato; ?></span>
            <?php 
            /**
             * ESTRUTURA DE REPETIÇÃO (FOREACH)
             * Percorre o array de telefones e cria um <span> para cada um.
             * Isso prova que seu código é escalável (funciona para 1 ou 100 telefones).
             */
            foreach ($telefones as $tel) {
                echo "<span>$tel</span>";
            }
            ?>
        </div>

    </section>
    <script src="/QUEMSOMOS/js/script.js"></script>
</body>

</html>