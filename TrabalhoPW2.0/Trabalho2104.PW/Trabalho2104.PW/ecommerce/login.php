
<?php
session_start();

require_once "php/conexao.php";

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $usuario = trim($_POST["usuario"] ?? "");
    $senha = $_POST["senha"] ?? "";

    if ($usuario === "" || $senha === "") {

        $mensagem = "Preencha o usuário e a senha.";

    } else {

        $sql = "SELECT id, nome, usuario, senha
                FROM usuarios
                WHERE usuario = ?";

        $stmt = $conn->prepare($sql);

        if ($stmt) {

            $stmt->bind_param("s", $usuario);
            $stmt->execute();

            $resultado = $stmt->get_result();

            if ($resultado->num_rows === 1) {

                $dadosUsuario = $resultado->fetch_assoc();

                if (password_verify($senha, $dadosUsuario["senha"])) {

                    session_regenerate_id(true);

                    $_SESSION["usuario_id"] = $dadosUsuario["id"];
                    $_SESSION["usuario_nome"] = $dadosUsuario["nome"];
                    $_SESSION["usuario"] = $dadosUsuario["usuario"];

                    header("Location: paginainicial.php");
                    exit;

                } else {

                    $mensagem = "Usuário ou senha incorretos.";

                }

            } else {

                $mensagem = "Usuário ou senha incorretos.";

            }

            $stmt->close();

        } else {

            $mensagem = "Não foi possível realizar o login.";

        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Crown Costumes</title>
    <link href="estilos.css" rel="stylesheet">
</head>

<body class="pagina-form">

    <div class="login-container">

        <form
            class="login-box"
            id="formLogin"
            action="login.php"
            method="post"
        >

            <h1>Login</h1>

            <?php if ($mensagem !== "") { ?>
                <div class="mensagem-login">
                    <?php echo htmlspecialchars($mensagem); ?>
                </div>
            <?php } ?>

            <label for="usuario">
                Usuário:
            </label>

            <input
                type="text"
                id="usuario"
                name="usuario"
                required
            >

            <label for="senha">
                Senha:
            </label>

            <input
                type="password"
                id="senha"
                name="senha"
                required
            >

            <button type="submit">
                Entrar
            </button>

            <p class="link-login">
                Ainda não tem conta?
                <a href="cadastro.php">Cadastrar</a>
            </p>

        </form>

    </div>

</body>
</html>
