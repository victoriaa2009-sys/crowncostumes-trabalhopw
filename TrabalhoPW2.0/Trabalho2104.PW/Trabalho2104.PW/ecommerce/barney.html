```html
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Crown Costumes</title>
  <link href="estilos.css" rel="stylesheet">

  <style>

    .mensagem-carrinho {
      display: none;
      margin-top: 20px;
      padding: 15px;
      color: #faf06b;
      background: rgba(240, 247, 203, 0.35);
      border: 1px solid rgba(100, 92, 3, 0.4);
      border-radius: 8px;
      text-align: center;
      font-weight: bold;
    }

    .valor-parcial {
      font-size: 20px;
      font-weight: bold;
      color: #8b6b20;
    }
    
  </style>
</head>

<body>

  <div class="topo">
    <form class="barra" action="barney.html">

      <div class="marca">
        <img src="fotos/logopreta.png" class="logopreta" alt="logo preta">
        <a href="paginainicial.php" class="nome-barra">Crown Costumes</a>
      </div>

      <div>
        <span class="busca-container">
          <input type="text" placeholder="Buscar fantasias..." name="busca" id="campo-busca" autocomplete="off">
          <input type="submit" value="Buscar" class="btn-busca">
          <div id="sugestoes"></div>
        </span>
      </div>

      <div class="acoes">
        <button formaction="login.php">Login</button>
        <button formaction="cadastro.html">Cadastro</button>
        <button formaction="carrinho.php">Carrinho</button>
        <button formaction="sobre.html">Sobre</button>
      </div>

    </form>
  </div>


  <section class="produto-container" id="barney">

    <div class="produto-img">
      <img src="fotos/unissex/uni3.jpg" alt="Fantasia do Barney">
    </div>

    <div class="produto-info">

      <h2>Fantasia do Barney</h2>

      <p class="preco">R$ 200,00 à vista</p>

      <p class="parcelado">ou 2x de R$ 100,00 sem juros</p>

      <p class="entrega">Entrega em até 5 dias úteis</p>

      <label for="quantidade">Quantidade:</label>

      <input type="number" id="quantidade" value="1" min="1" step="1">

      <p id="valorParcial" class="valor-parcial">
        Valor total: R$ 200,00
      </p>

      <h3>Formas de pagamento</h3>

      <ul>
        <li>Cartão de crédito (Visa e Mastercard)</li>
        <li>Cartão de débito</li>
        <li>PIX</li>
        <li>Boleto bancário</li>
      </ul>

      <button class="btn" id="adicionarCarrinho" type="button">
        Adicionar ao Carrinho
      </button>

      <div id="mensagemCarrinho" class="mensagem-carrinho"></div>

    </div>

  </section>


  <section class="produto-descricao">

    <div>

      <h2>Descrição do Produto</h2>

      <p>
        Fantasia completa Barney, perfeita para festas, aniversários
        e eventos temáticos. Confortável, leve e divertida.
      </p>

    </div>

    <div>

      <h2>Características</h2>

      <ul>
        <li>Material: poliéster confortável</li>
        <li>Tamanhos: 15 a 60+ anos</li>
        <li>Inclui: conjunto + cabeça do Barney</li>
        <li>Cor: rosa e verde</li>
      </ul>

    </div>

  </section>


  <section>

    <h2>Avaliações</h2>

    <div class="avaliacao">
      <p>⭐⭐⭐⭐⭐</p>
      <p>"Súper confortável! Amei."</p>
      <p>12/03/2026</p>
    </div>

    <div class="avaliacao">
      <p>⭐⭐⭐</p>
      <p>"Demorou um pouco pra chegar, mas gostei."</p>
      <p>05/03/2026</p>
    </div>

    <div class="avaliacao">
      <p>⭐⭐⭐⭐⭐</p>
      <p>"Amei! Igual à foto."</p>
      <p>28/02/2026</p>
    </div>

    <div class="avaliacao">
      <p>⭐⭐⭐</p>
      <p>"Boa, mas o pacote veio rasgado."</p>
      <p>20/02/2026</p>
    </div>

  </section>


  <script>

    // Preço unitário do produto
    const precoProduto = 200;

    const quantidade = document.getElementById("quantidade");
    const valorParcial = document.getElementById("valorParcial");
    const botaoAdicionar = document.getElementById("adicionarCarrinho");
    const mensagemCarrinho = document.getElementById("mensagemCarrinho");


    // Formata o preço em reais
    function formatarPreco(valor) {

      return valor.toLocaleString("pt-BR", {
        style: "currency",
        currency: "BRL"
      });

    }


    // Atualiza o preço conforme a quantidade
    function atualizarPreco() {

      let qtd = Number(quantidade.value);

      if (!Number.isInteger(qtd) || qtd < 1) {
        valorParcial.textContent = "Informe uma quantidade válida.";
        return;
      }

      const total = precoProduto * qtd;

      valorParcial.textContent = "Valor total: " + formatarPreco(total);

    }


    quantidade.addEventListener("input", atualizarPreco);
    quantidade.addEventListener("change", atualizarPreco);


    // Adiciona o produto ao carrinho
    botaoAdicionar.addEventListener("click", function() {

      const qtd = Number(quantidade.value);

      if (!Number.isInteger(qtd) || qtd < 1) {

        mensagemCarrinho.style.display = "block";
        mensagemCarrinho.textContent = "Escolha uma quantidade válida!";

        return;

      }

      const produto = {

        nome: "Fantasia do Barney",
        preco: precoProduto,
        quantidade: qtd,
        imagem: "fotos/unissex/uni3.jpg"

      };


      let carrinho = JSON.parse(sessionStorage.getItem("carrinho")) || [];


      const produtoExistente = carrinho.find(function(item) {

        return item.nome === produto.nome;

      });


      if (produtoExistente) {

        produtoExistente.quantidade += qtd;

      } else {

        carrinho.push(produto);

      }


      sessionStorage.setItem("carrinho", JSON.stringify(carrinho));


      // Mostra a mensagem de confirmação
      mensagemCarrinho.style.display = "block";

      mensagemCarrinho.innerHTML =
        "✓ Produto adicionado ao carrinho!<br><br>" +
        "Quantidade: " + qtd + "<br>" +
        "Valor: " + formatarPreco(precoProduto * qtd);

    });


    // Mostra o preço inicial
    atualizarPreco();

  </script>


  <footer>
    <p>© 2026 Crown Costumes</p>
  </footer>

</body>
