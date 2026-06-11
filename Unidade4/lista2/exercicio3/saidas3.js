/*3 – Crie um script que receba um número de 1 a 12 e imprima o nome do mês
correspondente. Utilize a estrutura switch.
*/

var num = parseFloat(prompt("Digite um número de 1 a 12:"));

switch (num) {
    case 1:
        document.write("<p class='mes'>Seu mês é Janeiro</p>");
        break;
    case 2:
         document.write("<p class='mes'>Seu mês é Fevereiro</p>");
        break;
    case 3:
         document.write("<p class='mes'>Seu mês é Março</p>");
        break;
    case 4:
         document.write("<p class='mes'>Seu mês é Abril</p>"); 
        break;
    case 5:
        document.write("<p class='mes'>Seu mês é Maio</p>");
        break;
    case 6:
         document.write("<p class='mes'>Seu mês é Junho</p>");
        break;
    case 7:
         document.write("<p class='mes'>Seu mês é Julho</p>");
        break;
    case 8:
         document.write("<p class='mes'>Seu mês é Agosto</p>"); 
        break;
    case 9:
        document.write("<p class='mes'>Seu mês é Setembro</p>");
        break;
    case 10:
         document.write("<p class='mes'>Seu mês é Outubro</p>");
        break;
    case 11:
         document.write("<p class='mes'>Seu mês é Novembro</p>");
        break;
    case 12:
         document.write("<p class='mes'>Seu mês é Dezembro</p>"); 
        break;
    default:
        document.write("<p class='mes erro'>Mês inválido! Digite um número de 1 a 12.</p>"); 
        break;
}






