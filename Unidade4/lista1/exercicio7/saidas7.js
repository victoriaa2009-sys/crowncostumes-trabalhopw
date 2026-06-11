/*7 – Programe um script que leia o nome de um(a) estudante juntamente com suas três
notais parciais. O script deve calcular a média alcançada e apresentar a média, o nome
do(a) estudante, juntamente da mensagem:
• A mensagem "Aprovado", se a média for maior ou igual a 7, com a respectiva
média alcançada;
• A mensagem "Reprovado", se a média for menor do que 7, com a respectiva média
alcançada;
• A mensagem "Aprovado com Distinção", se a média for igual a 10.
A saída deve ser em HTML estilizado com CSS, utilize sua criatividade para a seleção de
cores e estilos.
*/

var nome = prompt ("Digite seu nome: ")
var nota1 = parseFloat(prompt("Digite sua primeira nota:"));
var nota2 = parseFloat(prompt("Digite sua segunda nota:"));
var nota3 = parseFloat(prompt("Digite sua terceira nota:"));

var media = (nota1 + nota2 + nota3)/3;

if (media === 10) {
   document.write(`<p>${nome} Aprovado com Distinção</p>`)
}
else if (media >= 7) {
   document.write(`<p>${nome} Aprovado</p>`)
}
else {
   document.write(`<p>${nome} Reprovado</p>`)
}



