/*4 – Utilizando a estrutura de controle switch, faça um script que receba o nome de uma
fruta que comece com A e emita breve descrição sobre essa fruta (exemplos: “essa fruta é
verde e doce”, “essa fruta é azeda”, etc.). No caso de ser digitado um nome de fruta
inesperado, deve-se informar “Não sei nada sobre essa fruta”.
*/

var fruta = prompt("Digite o nome de uma fruta que comece com a letra A:");

switch (fruta.toLowerCase()) {//toLowerCase é para a variável ser válida minuscula ou maiusucula
    case "abacate":
        document.write(`<p class=fruta>${fruta} é verde e cremoso.</p>`);
        break;
    case "abacaxi":
        document.write(`<p class=fruta>${fruta} é amarelo e doce.</p>`);
        break;
    case "ameixa":
        document.write(`<p class=fruta>${fruta} é roxa e suculenta.</p>`);
        break;
    case "acerola":
        document.write(`<p class=fruta>${fruta} é pequena e azeda.</p>`);
        break;
    case "açaí":
        document.write(`<p class=fruta>${fruta} uma fruta amazônica.</p>`);
        break;
    case "amora":
        document.write(`<p class=fruta>${fruta} é pequena e escura.</p>`);
        break;
    default:
        document.write("<p class=fruta-desconhecida>Não sei nada sobre essa fruta.</p>");
}


