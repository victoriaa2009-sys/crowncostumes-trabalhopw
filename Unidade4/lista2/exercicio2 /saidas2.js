/* 2 – Peça ao usuário para inserir uma classificação indicativa de filme (L, 10, 12, 14, 16,
18) e, usando switch, exiba uma descrição da faixa etária.
*/

alert("Menu de Classificação Indicativa: L, 10, 12, 14, 16, 18");

var classi = (prompt("Insira uma classificação indicativa: "));

switch(classi){
    case "L":
        document.write("<p class='status-classi livre'>[L] - Livre: Conteúdo para todos os públicos.</p>");
        break;
    case "10":
        document.write("<p class='status-classi dez'>[10] - Não recomendado para menores de 10 anos.</p>");
        break;
    case "12":
        document.write("<p class='status-classi doze'>[12] - Não recomendado para menores de 12 anos.</p>");
        break;
    case "14":
        document.write("<p class='status-classi quatorze'>[14] - Não recomendado para menores de 14 anos.</p>");
        break;
    case "16":
        document.write("<p class='status-classi dezesseis'>[16] - Não recomendado para menores de 16 anos.</p>");
        break;
    case "18":
        document.write("<p class='status-classi dezoito'>[18] - Não recomendado para menores de 18 anos (Proibido para menores).</p>");
        break;
    default:
        document.write("<p class='status-classi erro'>Classificação inválida! Digite L, 10, 12, 14, 16 ou 18.</p>"); 
        break;
}

