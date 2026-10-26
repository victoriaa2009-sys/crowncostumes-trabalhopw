
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
                $tipoMensagem = "sucesso";

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
    <title>Crown Costumes - Cadastro</title>
    <link href="estilos.css" rel="stylesheet">
</head>

<body class="pagina-form">

    <div class="login-container">

        <form class="login-box" id="formCadastro" method="post" action="cadastro.php">

            <h2>Cadastro</h2>

            <?php if ($mensagem !== "") { ?>
                <div class="mensagem-login">
                    <?php echo htmlspecialchars($mensagem); ?>
                </div>
            <?php } ?>

            <input
                type="text"
                id="nome"
                name="nome"
                placeholder="Nome"
                value="<?php echo htmlspecialchars($nome); ?>"
                required
            >

            <input
                type="text"
                id="usuario"
                name="usuario"
                placeholder="Usuário"
                value="<?php echo htmlspecialchars($usuario); ?>"
                required
            >

            <input
                type="password"
                id="senha"
                name="senha"
                placeholder="Senha"
                required
            >

            <input
                type="text"
                id="cpf"
                name="cpf"
                placeholder="CPF"
                value="<?php echo htmlspecialchars($cpf); ?>"
                required
            >

            <input
                type="date"
                id="dataNascimento"
                name="dataNascimento"
                value="<?php echo htmlspecialchars($dataNascimento); ?>"
                required
            >

            <input
                type="email"
                id="email"
                name="email"
                placeholder="Email"
                value="<?php echo htmlspecialchars($email); ?>"
                required
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

</body>
</html>
