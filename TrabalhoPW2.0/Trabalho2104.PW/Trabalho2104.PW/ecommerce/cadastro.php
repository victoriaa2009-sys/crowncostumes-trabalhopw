
<?php
require_once "php/conexao.php";

$mensagem = "";
$tipoMensagem = "";

$nome = "";
$usuario = "";
$cpf = "";
$dataNascimento = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome = trim($_POST["nome"] ?? "");
    $usuario = trim($_POST["usuario"] ?? "");
    $senha = $_POST["senha"] ?? "";
    $cpf = trim($_POST["cpf"] ?? "");
    $dataNascimento = $_POST["dataNascimento"] ?? "";
    $email = trim($_POST["email"] ?? "");

    if (
        $nome === "" ||
        $usuario === "" ||
        $senha === "" ||
        $cpf === "" ||
        $dataNascimento === "" ||
        $email === ""
    ) {

        $mensagem = "Preencha todos os campos.";
        $tipoMensagem = "erro";

    } else {

        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios
                (nome, usuario, senha, cpf, data_nascimento, email)
                VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        if ($stmt) {

            $stmt->bind_param(
                "ssssss",
                $nome,
                $usuario,
                $senhaHash,
                $cpf,
                $dataNascimento,
                $email
            );

            if ($stmt->execute()) {

                $mensagem = "Cadastro realizado com sucesso!";
                
                $nome = "";
                $usuario = "";
                $cpf = "";
                $dataNascimento = "";
                $email = "";

            } else {

                if ($stmt->errno === 1062) {
                    $mensagem = "Este usuário, CPF ou e-mail já está cadastrado.";
                } else {
                    $mensagem = "Não foi possível realizar o cadastro.";
                }

                $tipoMensagem = "erro";
            }

            $stmt->close();

        } else {

            $mensagem = "Não foi possível preparar o cadastro.";
            $tipoMensagem = "erro";
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

    <style>
        .mensagem-login {
            color: rgb(250, 215, 112);
            margin-bottom: 15px;
            text-align: left;
            font-size: 14px;
        }

        .mensagem-login ul {
            padding-left: 20px;
        }
    </style>
</head>

<body class="pagina-form">

    <div class="login-container">

        <form class="login-box" id="formCadastro"
              method="POST" action="cadastro.php">

            <h2>Cadastro</h2>

            <div id="mensagemCadastro" class="mensagem-login">
                <?php if ($mensagem !== "") { ?>
                    <?php echo htmlspecialchars($mensagem); ?>
                <?php } ?>
            </div>

            <input
                type="text"
                id="nome"
                name="nome"
                placeholder="Nome"
                value="<?php echo htmlspecialchars($nome); ?>"
            >

            <input
                type="text"
                id="usuario"
                name="usuario"
                placeholder="Usuário"
                value="<?php echo htmlspecialchars($usuario); ?>"
            >

            <input
                type="password"
                id="senha"
                name="senha"
                placeholder="Senha"
            >

            <input
                type="text"
                id="cpf"
                name="cpf"
                placeholder="CPF"
                value="<?php echo htmlspecialchars($cpf); ?>"
            >

            <input
                type="date"
                id="dataNascimento"
                name="dataNascimento"
                value="<?php echo htmlspecialchars($dataNascimento); ?>"
            >

            <input
                type="email"
                id="email"
                name="email"
                placeholder="Email"
                value="<?php echo htmlspecialchars($email); ?>"
            >

            <button class="btn" type="submit">
                Cadastrar
            </button>

            <p class="link-login">
                Já tem conta?
                <a href="login.html">Entrar</a>
            </p>

        </form>

    </div>

    <script>
        const form = document.getElementById("formCadastro");

        form.addEventListener("submit", function(event) {

            const mensagem = document.getElementById("mensagemCadastro");

            let faltando = [];

            if (document.getElementById("nome").value.trim() === "") {
                faltando.push("Falta preencher o nome.");
            }

            if (document.getElementById("usuario").value.trim() === "") {
                faltando.push("Falta preencher o usuário.");
            }

            if (document.getElementById("senha").value.trim() === "") {
                faltando.push("Falta preencher a senha.");
            }

            if (document.getElementById("cpf").value.trim() === "") {
                faltando.push("Falta preencher o CPF.");
            }

            if (document.getElementById("dataNascimento").value === "") {
                faltando.push("Falta preencher a data de nascimento.");
            }

            if (document.getElementById("email").value.trim() === "") {
                faltando.push("Falta preencher o email.");
            }

            if (faltando.length > 0) {

                event.preventDefault();

                mensagem.innerHTML =
                    "<strong>Não foi possível realizar o cadastro!</strong><ul><li>" +
                    faltando.join("</li><li>") +
                    "</li></ul>";

            }

        });
    </script>

</body>
</html>
