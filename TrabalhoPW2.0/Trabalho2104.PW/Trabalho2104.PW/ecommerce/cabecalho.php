
<div class="topo">

    <div class="barra">

        <div class="marca">
            <img src="fotos/logopreta.png" class="logopreta" alt="Logo preta">

            <a href="paginainicial.php" class="nome-barra">
                Crown Costumes
            </a>
        </div>

        <form class="busca-container"
              action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
              method="get">

            <input
                type="text"
                placeholder="Buscar fantasias..."
                name="busca"
                id="campo-busca"
                autocomplete="off"
            >

            <input
                type="submit"
                value="Buscar"
                class="btn-busca"
            >

            <div id="sugestoes"></div>

        </form>

        <div class="acoes">

            <span>
                Olá, <?php echo htmlspecialchars($_SESSION["usuario_nome"]); ?>!
            </span>

            <a href="carrinho.php" class="btn">Carrinho</a>

            <a href="sobre.html" class="btn">Sobre</a>

            <a href="logout.php" class="btn">Sair</a>

        </div>

    </div>

</div>
