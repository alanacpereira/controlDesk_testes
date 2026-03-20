<?php
session_start();
include("conexao.php");

if($_POST){

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $user = $result->fetch_assoc();

        $_SESSION['usuario'] = $user;

        header("Location: index.php");
    }else{
        echo "Login inválido";
    }
}
?>

<form method="POST">
<input type="email" name="email">
<input type="password" name="senha">
<button>Entrar</button>
</form>