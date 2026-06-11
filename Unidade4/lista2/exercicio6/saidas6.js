/*6 – Peça ao usuário para inserir sua idade e, usando switch, classifique-o em:
• Criança (0-12);
• Adolescente (13-17);
• Adulto (18-59);
• Idoso (60+).
*/

var idade = parseInt(prompt("Digite sua idade:"));

switch (true) {
    case (idade >= 0 && idade <= 12):
        document.write("<p class=idade>Classificação: Criança</p>");
        break;
    case (idade >= 13 && idade <= 17):
        document.write("<p class=idade>Classificação: Adolescente</p>");
        break;
    case (idade >= 18 && idade <= 59):
        document.write("<p class=idade>Classificação: Adulto</p>");
        break;
    case (idade >= 60):
        document.write("<p class=idade>Classificação: Idoso</p>");
        break;
    default:
        document.write("<p class=idade-errada>Idade inválida.</p>");
}



