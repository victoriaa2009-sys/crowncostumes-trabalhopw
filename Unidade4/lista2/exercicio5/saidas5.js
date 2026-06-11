/*5 – Utilizando switch, codifique um script que pergunte ao usuário sua nota final (de 0 a
10) e exiba a classificação: A, B, C, D ou F, onde:
• A: 9-10;
• B: 7-8;
• C: 5-6;
• D: 3-4;
• F: 0-2.
*/

var nota = parseFloat(prompt("Digite sua nota final (0 a 10):"));

switch (true) {
    case (nota >= 9 && nota <= 10):
        document.write("<p class=nota>Classificação: A</p>");
        break;
    case (nota >= 7 && nota < 9):
        document.write("<p class=nota>Classificação: B</p>");
        break;
    case (nota >= 5 && nota < 7):
        document.write("<p class=nota>Classificação: C</p>");
        break;
    case (nota >= 3 && nota < 5):
        document.write("<p class=nota>Classificação: D</p>");
        break;
    case (nota >= 0 && nota < 3):
        document.write("<p class=nota>Classificação: F</p>");
        break;
    default:
        document.write("<p class=nota-errada>Nota inválida. Por favor, digite um valor entre 0 e 10.</p>");
}



