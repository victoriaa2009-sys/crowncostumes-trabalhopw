/*5 - Escreva um script que solicite ao usuário uma senha. Se a senha for "12345", exiba
"Acesso concedido". Caso contrário, exiba "Senha incorreta".
*/

var senha = prompt("Digite a sua senha:");

if (senha == 12345) {
   document.write(`<p>Acesso concedido</p>`)
}
else {
   document.write(`<p>Senha incorreta</p>`)
}




