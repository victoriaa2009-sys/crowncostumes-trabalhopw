/*4 - Crie um script que calcule o valor total de uma compra. Se o valor for maior que R$
100, aplique um desconto de 10% e exiba o valor final com o desconto. Caso contrário,
exiba o valor original.
*/

var compra = prompt("Digite o valor da sua compra:");

if (compra > 100) {
   compra = compra - (compra/100 * 10) 
}

document.write(`<p>O valor total da sua compra é R$ ${compra}</p>`)



