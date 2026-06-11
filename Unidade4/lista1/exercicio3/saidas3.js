/*3 - Crie um script que peça ao usuário sua idade e classifique-a em uma das seguintes
categorias: "Criança" (0-12 anos), "Adolescente" (13-17 anos), "Adulto" (18-59 anos),
"Idoso"
*/

var idade = prompt("Digite sua idade:");

if (idade <= 12) {
   document.write(`<p>Vocễ é uma Criança</p>`)
}

else if (idade <= 17){
    document.write(`<p>Você é um Adolescente</p>`)
}
else if (idade <= 59){
    document.write(`<p>Você é um Adulto</p>`)
}



