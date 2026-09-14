/*============================================================
PESQUISA E AUTOCOMPLETE
============================================================*/

const produtos = [

    { nome: "Mickey Mouse", pagina: "mickeykids.html" },
    { nome: "Harry Potter", pagina: "harrypotter.html" },
    { nome: "Maskara", pagina: "maskara.html" },
    { nome: "Alice, de Alice no País das Maravilhas", pagina: "alice.html" },
    { nome: "David Bowie", pagina: "davidbowie.html" },
    { nome: "Chapéu de Bruxa", pagina: "acessorios6.html" },

    { nome: "Bela, de Bela e a Fera", pagina: "belaeafera.html" },
    { nome: "Mágica", pagina: "magica.html" },
    { nome: "Edward, de Edward Mãos de Tesoura", pagina: "edwardfem.html" },
    { nome: "Super Mario FEM", pagina: "mariofem.html" },

    { nome: "Pânico", pagina: "panico.html" },
    { nome: "Pikachu", pagina: "pikachu.html" },
    { nome: "Luigi", pagina: "luigi.html" },
    { nome: "Barney", pagina: "barney.html" },

    { nome: "Minions", pagina: "acessorios1.html" },
    { nome: "Espião", pagina: "acessorios2.html" },
    { nome: "Mágico", pagina: "acessorios4.html" },
    { nome: "Peruca verde e amarelo", pagina: "perucaverde.html" },

    { nome: "Palhaço", pagina: "palhacokids.html" },
    { nome: "Branca de Neve", pagina: "brancadenevekids.html" }

];


const campoBusca =
    document.getElementById("campo-busca");

const sugestoes =
    document.getElementById("sugestoes");


if (campoBusca && sugestoes) {

    campoBusca.addEventListener("input", function() {

        const texto =
            campoBusca.value.toLowerCase().trim();

        sugestoes.innerHTML = "";


        if (texto === "") {
            return;
        }


        const resultados =
            produtos.filter(function(produto) {

                return produto.nome
                    .toLowerCase()
                    .includes(texto);

            });


        resultados.forEach(function(produto) {

            const sugestao =
                document.createElement("div");


            sugestao.textContent =
                produto.nome;


            sugestao.classList.add("sugestao");


            sugestao.addEventListener("click", function() {

                window.location.href =
                    produto.pagina;

            });


            sugestoes.appendChild(sugestao);

        });

    });

}


/*============================================================
LOGIN
============================================================*/

const formLogin =
    document.getElementById("formLogin");


if (formLogin) {

    const usuario =
        document.getElementById("usuario");

    const senha =
        document.getElementById("senha");

    const mensagemLogin =
        document.getElementById("mensagemLogin");


    formLogin.addEventListener("submit", function(event) {


        if (
            usuario.value.trim() === "" &&
            senha.value.trim() === ""
        ) {

            event.preventDefault();

            mensagemLogin.textContent =
                "Digite seu usuário e sua senha.";

        }


        else if (usuario.value.trim() === "") {

            event.preventDefault();

            mensagemLogin.textContent =
                "Digite seu usuário.";

        }


        else if (senha.value.trim() === "") {

            event.preventDefault();

            mensagemLogin.textContent =
                "Digite sua senha.";

        }


        else {

            mensagemLogin.textContent = "";

        }

    });

}


/*============================================================
CADASTRO
============================================================*/

const formCadastro =
    document.getElementById("formCadastro");


if (formCadastro) {

    const mensagemCadastro =
        document.getElementById("mensagemCadastro");


    formCadastro.addEventListener("submit", function(event) {

        event.preventDefault();


        let faltando = [];


        const nome =
            document.getElementById("nome")
                .value.trim();


        const usuario =
            document.getElementById("usuario")
                .value.trim();


        const senha =
            document.getElementById("senha")
                .value.trim();


        const cpf =
            document.getElementById("cpf")
                .value.trim();


        const dataNascimento =
            document.getElementById("dataNascimento")
                .value;


        const email =
            document.getElementById("email")
                .value.trim();


        if (nome === "") {
            faltando.push("Nome");
        }


        if (usuario === "") {
            faltando.push("Usuário");
        }


        if (senha === "") {
            faltando.push("Senha");
        }


        if (cpf === "") {
            faltando.push("CPF");
        }


        if (dataNascimento === "") {
            faltando.push("Data de nascimento");
        }


        if (email === "") {
            faltando.push("Email");
        }


        if (faltando.length > 0) {

            mensagemCadastro.textContent =
                "Faltou preencher: " +
                faltando.join(", ") +
                ".";

        }


        else {

            mensagemCadastro.textContent = "";

            alert(
                "Cadastro realizado com sucesso!"
            );

        }

    });

}


/*============================================================
QUANTIDADE E VALOR PARCIAL
============================================================*/
const precos = {

    acessorios1: 87.90,
    acessorios2: 87.90,
    acessorios4: 87.90,
    acessorios6: 87.90,

    alice: 150.00,
    barney: 200.00,
    belaeafera: 150.00,
    brancadenevekids: 148.98,
    davidbowie: 148.98,
    edwardfem: 150.00,
    harrypotter: 200.00,
    magica: 150.00,
    magico: 148.98,
    mariofem: 150.00,
    maskara: 148.98,
    mickeykids: 188.99,
    moanakids: 148.98,
    palhaco: 148.98,
    palhacokids: 148.98,
    panico: 148.98,
    perucaverdessss: 87.90,
    pikachu: 200.00,
    piratakids: 168.78,
    woody: 148.98

};


const produto = document.querySelector(".produto-container");

const quantidade = document.getElementById("quantidade");

const preco = document.getElementById("preco");

const valorParcial = document.getElementById("valorParcial");


if (produto && quantidade && preco) {

    const idProduto = produto.id;

    const precoProduto = precos[idProduto];


    quantidade.addEventListener("input", function() {

        let qtd = parseInt(quantidade.value);


        if (qtd < 1 || isNaN(qtd)) {

            qtd = 1;

            quantidade.value = 1;

        }


        const total = precoProduto * qtd;


        preco.textContent =
            "R$ " +
            total.toFixed(2).replace(".", ",") +
            " à vista";


        if (valorParcial) {

            valorParcial.textContent =
                "Valor parcial: R$ " +
                total.toFixed(2).replace(".", ",");

        }

    });

}