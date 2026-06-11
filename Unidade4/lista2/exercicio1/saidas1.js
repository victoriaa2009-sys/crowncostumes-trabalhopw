/* 1 – Utilizando switch, crie um script que receba um código de pagamento (1 para débito, 2
para crédito, 3 para dinheiro) e exiba uma mensagem correspondente ao método de
pagamento
*/

alert("Menu de códigos: 1- débito 2- crédito 3- dinheiro");

var codigo = parseInt(prompt("Digite seu código de pagamento: "));

switch(codigo){
    case 1:
        document.write("<p class='sucesso'>Seu método de Pagamento é: Débito</p>");
        break;
    case 2:
         document.write("<p class='sucesso'>Seu método de Pagamento é: Crédito</p>");
        break;
    case 3:
         document.write("<p class='sucesso'>Seu método de Pagamento é: Dinheiro</p>");
        break;
    default:
         document.write("<p class='erro'>Seu método de Pagamento é: Opção inválida</p>"); 
        break;
}



