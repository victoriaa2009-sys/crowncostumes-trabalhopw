/*- 6 – Construa um script para a leitura de duas notas parciais de um aluno. O script deve
calcular a média alcançada por aluno e apresentar:
• A mensagem "Aprovado", se a média alcançada for maior ou igual a sete;
• A mensagem "Reprovado", se a média for menor do que sete;
• A mensagem "Aprovado com Distinção", se a média for igual a dez.
*/

var nota1 = parseFloat(prompt("Digite sua primeira nota:"));
var nota2 = parseFloat(prompt("Digite sua segunda nota:"));

var media = (nota1 + nota2)/2;

if (media === 10) {
   document.write(`<p> Aprovado com Distinção</p>`)
}
else if (media >= 7) {
   document.write(`<p> Aprovado</p>`)
}
else {
   document.write(`<p> Reprovado</p>`)
}




