/*8 - Faça um script que lê as duas notas parciais obtidas por um aluno numa disciplina ao
longo de um semestre, e calcule a sua média. A atribuição de conceitos obedece à tabela
abaixo:
 Média de Aproveitamento Conceito
 Entre 9.0 e 10.0 A
 Entre 7.5 e 9.0 B
 Entre 6.0 e 7.5 C
 Entre 4.0 e 6.0 D
 Entre 4.0 e zero E
O algoritmo deve mostrar na tela as notas, a média, o conceito correspondente e a
mensagem “APROVADO” se o conceito for A, B ou C ou “REPROVADO” se o conceito for
D ou E.
A saída deve ser em HTML estilizado com CSS, utilize sua criatividade para a seleção de
cores e estilos.
*/

var nota1 = parseFloat(prompt("Digite sua primeira nota:"));
var nota2 = parseFloat(prompt("Digite sua segunda nota:"));

var media = (nota1 + nota2)/2;

var mensagemStatus = "";
var letra ="";

if (media >= 9) {
   letra = "A";
}
else if (media >= 7.5) {
   letra = "B";
}
else if (media >= 6) {
   letra = "C";
}
else if (media >= 4) {
   letra = "D";
}
else {
   letra = "E";
}

if (media >= 6) {
   mensagemStatus = "Aprovado";
}
else {
   mensagemStatus = "Reprovado";
}

document.write(`<p>Sua média é ${media}, sua nota é ${letra} e você está ${mensagemStatus}</p>`)


